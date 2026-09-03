<?php
// Executes student PHP code in an isolated temp file and returns the real output.
// Local-only learning tool (XAMPP/localhost) — not exposed to the internet.

header('Content-Type: application/json');

// Refuse anything not coming from this same local app (basic guard, not real auth).
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
$file = $sandboxDir . "/run_$id.php";

// Cap runaway loops from inside the executed script itself.
$wrapped = "<?php\ndeclare(strict_types=0);\nset_time_limit(5);\nini_set('memory_limit', '64M');\n?>\n" . $code;
file_put_contents($file, $wrapped);

// Under mod_php (running inside Apache), PHP_BINARY points to httpd.exe itself —
// spawning that would launch a nested Apache process, not run our script.
// Locate the real php-cli binary instead, using the XAMPP layout (htdocs and php
// are sibling folders under the XAMPP root).
$phpBinary = PHP_BINARY;
if (stripos(basename($phpBinary), 'httpd') !== false) {
    $xamppRoot = dirname($_SERVER['DOCUMENT_ROOT']);
    $candidate = $xamppRoot . '/php/php.exe';
    if (!is_file($candidate)) {
        @unlink($file);
        echo json_encode(['error' => "Could not locate the PHP CLI binary (expected at $candidate)."]);
        exit;
    }
    $phpBinary = $candidate;
}

$descriptors = [
    0 => ['pipe', 'r'],
    1 => ['pipe', 'w'],
    2 => ['pipe', 'w'],
];

$process = proc_open([$phpBinary, $file], $descriptors, $pipes, $sandboxDir);

$output = '';
$errorOutput = '';
$timedOut = false;

if (is_resource($process)) {
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
    proc_close($process);
}

@unlink($file);

if ($timedOut) {
    echo json_encode([
        'output' => $output,
        'error' => "Execution timed out after {$timeoutSeconds}s (infinite loop?)",
    ]);
    exit;
}

echo json_encode([
    'output' => $output,
    'error' => $errorOutput !== '' ? $errorOutput : null,
]);
