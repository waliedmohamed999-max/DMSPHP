<?php
// Executes a learner's real SQL against a fresh, isolated, in-memory SQLite
// database (see schema.php) and returns the REAL result — actual columns and
// rows for a SELECT, or the actual affected-row count for INSERT/UPDATE/DELETE,
// or the actual PDOException message if the query is invalid. No fake output.
//
// Why SQLite and not the platform's real MySQL: this sandbox is reachable by
// the public internet, and a public "run any SQL" endpoint must never be able
// to touch real, shared, persistent data. An in-memory SQLite database is
// created fresh for this one request and destroyed the instant it ends, so
// even DROP TABLE or a runaway UPDATE only ever affects that single request's
// throwaway copy — there is nothing shared to damage.

header('Content-Type: application/json');
require __DIR__ . '/schema.php';

if (($_SERVER['REQUEST_METHOD'] ?? '') !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'POST only']);
    exit;
}

if (!extension_loaded('pdo_sqlite')) {
    echo json_encode([
        'error' => 'The Database Playground needs the pdo_sqlite PHP extension, which is not enabled on this server. Ask your host to enable it (it ships with PHP by default on almost every host, but some restrict it manually).',
    ]);
    exit;
}

$sql = $_POST['sql'] ?? '';
if (!is_string($sql) || trim($sql) === '') {
    echo json_encode(['error' => 'Empty query']);
    exit;
}
if (strlen($sql) > 4000) {
    echo json_encode(['error' => 'Query too long']);
    exit;
}

// --- Rate limiting: max 30 runs per minute per IP (shares the sandbox dir's rate-limit pattern used by the PHP Playground) ---
$sandboxDir = __DIR__ . '/../sandbox';
if (!is_dir($sandboxDir)) {
    mkdir($sandboxDir, 0777, true);
}
$ip = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
$rateFile = $sandboxDir . '/.sqlrate_' . md5($ip);
$now = time();
$hits = [];
if (is_file($rateFile)) {
    $hits = json_decode(file_get_contents($rateFile), true) ?: [];
}
$hits = array_values(array_filter($hits, fn($t) => $now - $t < 60));
if (count($hits) >= 30) {
    http_response_code(429);
    echo json_encode(['error' => 'Too many queries — wait a moment and try again.']);
    exit;
}
$hits[] = $now;
file_put_contents($rateFile, json_encode($hits));

// Only one statement per run, and never allow ATTACH — the one way SQLite
// could otherwise reach outside this in-memory sandbox onto real disk files.
$firstStatement = trim(explode(';', $sql)[0]);
if ($firstStatement === '') {
    echo json_encode(['error' => 'Empty query']);
    exit;
}
if (preg_match('/\battach\b/i', $firstStatement)) {
    echo json_encode(['error' => 'ATTACH is disabled in this sandbox for safety.']);
    exit;
}

set_time_limit(5);

try {
    $pdo = build_sandbox_pdo();
    $isSelect = (bool) preg_match('/^\s*(select|pragma\s+table_info|with)\b/i', $firstStatement);

    if ($isSelect) {
        $stmt = $pdo->query($firstStatement);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $columns = $rows ? array_keys($rows[0]) : ($stmt->columnCount() > 0 ? array_map(
            fn($i) => $stmt->getColumnMeta($i)['name'] ?? "col$i",
            range(0, $stmt->columnCount() - 1)
        ) : []);
        $capped = array_slice($rows, 0, 500);
        echo json_encode([
            'type' => 'rows',
            'columns' => $columns,
            'rows' => $capped,
            'row_count' => count($rows),
            'truncated' => count($rows) > 500,
        ]);
    } else {
        $affected = $pdo->exec($firstStatement);
        echo json_encode([
            'type' => 'exec',
            'affected_rows' => $affected === false ? 0 : $affected,
        ]);
    }
} catch (Throwable $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
