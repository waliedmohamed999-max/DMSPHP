<?php
// Executes student Python code in an isolated temp file and returns the real output.
//
// This engine is exposed to the public internet. IMPORTANT — Python has no
// interpreter-level equivalent of PHP's `disable_functions`/`open_basedir`,
// so the protection here is weaker by nature: a static keyword blocklist plus
// resource limits, not a hard interpreter-enforced sandbox. A sufficiently
// determined attacker can likely defeat a text blocklist (e.g. via string
// concatenation or encoding tricks). Treat this as a deterrent against casual
// abuse, not a guarantee — see README's "Security Notes" section. For real
// public-scale safety, Python execution should run as a dedicated low-privilege
// OS user (or inside a per-request container) with no network access, which
// requires VPS/root-level setup this script alone cannot provide.

header('Content-Type: application/json');

if (($_SERVER['REQUEST_METHOD'] ?? '') !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'POST only']);
    exit;
}

// Many cheap shared-hosting plans disable proc_open() at the php.ini level as
// a blanket security policy. Detect that up front and say so plainly, rather
// than silently returning "(no output)" and leaving the learner confused.
if (!function_exists('proc_open')) {
    echo json_encode([
        'error' => 'Live code execution is disabled on this server (proc_open is unavailable — likely blocked by your hosting provider). Ask your host to enable proc_open, or run this project on a VPS instead of shared hosting. See the README\'s Deployment section for details.',
    ]);
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

// Best-effort static blocklist — see the caveat in the header comment above.
$forbiddenPatterns = [
    '/\bimport\s+os\b/', '/\bos\s*\./',
    '/\bimport\s+subprocess\b/', '/\bsubprocess\s*\./',
    '/\bimport\s+socket\b/', '/\bsocket\s*\./',
    '/\bimport\s+shutil\b/', '/\bshutil\s*\./',
    '/\bimport\s+ctypes\b/', '/\bctypes\s*\./',
    '/\bimportlib\b/',
    '/__import__/',
    '/\beval\s*\(/', '/\bexec\s*\(/', '/\bcompile\s*\(/',
    '/\bopen\s*\(/',
];
foreach ($forbiddenPatterns as $pattern) {
    if (preg_match($pattern, $code)) {
        http_response_code(422);
        echo json_encode(['error' => "Blocked: this Playground doesn't allow filesystem/process/network access (os, subprocess, socket, eval/exec, open, ...). Use in-memory data (lists, dicts, io.StringIO) instead."]);
        exit;
    }
}

$sandboxDir = __DIR__ . '/../sandbox';
if (!is_dir($sandboxDir)) {
    mkdir($sandboxDir, 0777, true);
}

// --- Rate limiting: max 20 runs per minute per IP ---
$ip = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
$rateFile = $sandboxDir . '/.rate_' . md5($ip);
$now = time();
$hits = [];
if (is_file($rateFile)) {
    $hits = json_decode(file_get_contents($rateFile), true) ?: [];
}
$hits = array_values(array_filter($hits, fn($t) => $now - $t < 60));
if (count($hits) >= 20) {
    http_response_code(429);
    echo json_encode(['error' => 'Too many runs — wait a moment and try again.']);
    exit;
}
$hits[] = $now;
file_put_contents($rateFile, json_encode($hits));

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
$maxOutputBytes = 200 * 1024; // 200 KB cap so a print-flood can't exhaust memory/disk

// Note: Python's `-I` (isolated mode) and `-S` (no site) flags would be a nice
// hardening layer, but both disable user-site-packages — which is exactly
// where `pip install --user` put pandas/matplotlib/django/flask on this
// machine, breaking every Data Analysis and Django/Flask lesson. Left plain.
$pyFlags = ['-u'];

foreach ($candidates as $pythonBinary) {
    $descriptors = [
        0 => ['pipe', 'r'],
        1 => ['pipe', 'w'],
        2 => ['pipe', 'w'],
    ];

    $process = @proc_open(array_merge([$pythonBinary], $pyFlags, [$file]), $descriptors, $pipes, $sandboxDir);

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
        if (strlen($output) < $maxOutputBytes) {
            $output .= stream_get_contents($pipes[1]);
        }
        if (strlen($errorOutput) < $maxOutputBytes) {
            $errorOutput .= stream_get_contents($pipes[2]);
        }

        if (strlen($output) > $maxOutputBytes || strlen($errorOutput) > $maxOutputBytes) {
            proc_terminate($process, 9);
            $output = substr($output, 0, $maxOutputBytes) . "\n... (output truncated)";
            break;
        }
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

    if (strlen($output) < $maxOutputBytes) {
        $output .= stream_get_contents($pipes[1]);
    }
    if (strlen($errorOutput) < $maxOutputBytes) {
        $errorOutput .= stream_get_contents($pipes[2]);
    }

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
