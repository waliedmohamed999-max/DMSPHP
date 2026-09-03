<?php
// Executes student Python code in an isolated temp file and returns the real output.
// Local-only learning tool (XAMPP/localhost) — not exposed to the internet.

header('Content-Type: application/json');

if (($_SERVER['REQUEST_METHOD'] ?? '') !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'POST only']);
    exit;
}

$code = $_POST['code'] ?? '';
if (!is_string($code) || trim($code) === '') {
    echo json_encode(['error' => 'Empty code']);
    exit;
}
if (strlen($code) > 20000) {
    echo json_encode(['error' => 'Code too long']);
    exit;
}

$sandboxDir = __DIR__ . '/../sandbox';
if (!is_dir($sandboxDir)) {
    mkdir($sandboxDir, 0777, true);
}

$id = bin2hex(random_bytes(8));
$file = $sandboxDir . "/run_$id.py";
file_put_contents($file, $code);

// Try the 'python' launcher first (works if PATH is inherited by the web server
// process); fall back to the known install location found on this machine.
$candidates = ['python', 'C:\\Python314\\python.exe'];

$output = '';
$errorOutput = '';
$timedOut = false;
$ran = false;

foreach ($candidates as $pythonBinary) {
    $descriptors = [
        0 => ['pipe', 'r'],
        1 => ['pipe', 'w'],
        2 => ['pipe', 'w'],
    ];

    $process = @proc_open([$pythonBinary, '-u', $file], $descriptors, $pipes, $sandboxDir);

    if (!is_resource($process)) {
        continue;
    }

    $ran = true;
    fclose($pipes[0]);
    stream_set_blocking($pipes[1], false);
    stream_set_blocking($pipes[2], false);

    $start = microtime(true);
    $timeoutSeconds = 6;

    while (true) {
        $status = proc_get_status($process);
        $output .= stream_get_contents($pipes[1]);
        $errorOutput .= stream_get_contents($pipes[2]);

        if (!$status['running']) {
            break;
        }
        if (microtime(true) - $start > $timeoutSeconds) {
            $timedOut = true;
            proc_terminate($process, 9);
            break;
        }
        usleep(50000);
    }

    $output .= stream_get_contents($pipes[1]);
    $errorOutput .= stream_get_contents($pipes[2]);

    fclose($pipes[1]);
    fclose($pipes[2]);
    $exitCode = proc_close($process);

    // "python" launcher missing entirely surfaces as a near-instant failure
    // with no output at all on Windows — try the next candidate in that case.
    if ($exitCode !== 0 && $output === '' && $errorOutput === '' && !$timedOut) {
        $ran = false;
        continue;
    }

    break;
}

@unlink($file);

if (!$ran) {
    echo json_encode(['error' => 'Could not locate a Python interpreter on this server.']);
    exit;
}

if ($timedOut) {
    echo json_encode([
        'output' => $output,
        'error' => "Execution timed out after 6s (infinite loop?)",
    ]);
    exit;
}

echo json_encode([
    'output' => $output,
    'error' => $errorOutput !== '' ? $errorOutput : null,
]);
