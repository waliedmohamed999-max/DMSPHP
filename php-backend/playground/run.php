<?php
// Executes student PHP code in an isolated temp file and returns the real output.
//
// This engine is exposed to the public internet, so it is hardened at three layers:
//   1. Rate limiting per IP (a simple file-based counter) to blunt abuse/DoS.
//   2. Hard resource caps (time, memory, output size) on the spawned process.
//   3. `-d disable_functions=...` + `-d open_basedir=...` passed directly to the
//      PHP CLI binary, so dangerous functions are refused by the interpreter
//      itself (not a regex blocklist that variable functions could dodge), and
//      the process can only touch files inside its own sandbox directory.
// This is defense-in-depth, not a full container sandbox — see README's
// "Security Notes" section before relying on it for a high-traffic public site.

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
$file = $sandboxDir . "/run_$id.php";

// Cap runaway loops/memory from inside the executed script itself.
$wrapped = "<?php\ndeclare(strict_types=0);\nset_time_limit(5);\nini_set('memory_limit', '32M');\n?>\n" . $code;
file_put_contents($file, $wrapped);

// Under mod_php (running inside Apache), PHP_BINARY points to httpd.exe itself —
// spawning that would launch a nested Apache process, not run our script.
// Locate the real php-cli binary instead. Try the XAMPP layout first (htdocs
// and php are sibling folders under the XAMPP root); fall back to whatever
// `php` resolves to on PATH for non-XAMPP/Linux hosting.
$phpBinary = PHP_BINARY;
if (stripos(basename($phpBinary), 'httpd') !== false || stripos(basename($phpBinary), 'apache') !== false) {
    $xamppRoot = dirname($_SERVER['DOCUMENT_ROOT']);
    $candidate = $xamppRoot . '/php/php.exe';
    if (is_file($candidate)) {
        $phpBinary = $candidate;
    } else {
        $phpBinary = 'php'; // rely on PATH (typical on Linux hosting)
    }
}

// Functions a learner never legitimately needs in a one-shot teaching snippet,
// and which are the classic building blocks of a remote-code-execution exploit.
$disabledFunctions = implode(',', [
    'exec', 'shell_exec', 'system', 'passthru', 'popen', 'proc_open', 'proc_close',
    'proc_get_status', 'proc_terminate', 'proc_nice',
    'pcntl_exec', 'pcntl_fork',
    'putenv', 'ini_alter', 'dl',
    'symlink', 'link', 'chgrp', 'chown', 'chmod',
    'mail', 'syslog',
    'fsockopen', 'pfsockopen', 'curl_init',
]);

$cliArgs = [
    $phpBinary,
    '-d', "disable_functions=$disabledFunctions",
    '-d', "open_basedir=$sandboxDir",
    '-d', 'allow_url_fopen=0',
    '-d', 'allow_url_include=0',
    '-d', 'expose_php=0',
    $file,
];

$descriptors = [
    0 => ['pipe', 'r'],
    1 => ['pipe', 'w'],
    2 => ['pipe', 'w'],
];

$process = proc_open($cliArgs, $descriptors, $pipes, $sandboxDir);

$output = '';
$errorOutput = '';
$timedOut = false;
$maxOutputBytes = 200 * 1024; // 200 KB cap so a print-flood can't exhaust memory/disk

if (is_resource($process)) {
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
