<?php
// Deployment self-check — run this ONCE right after uploading to a new host
// (Hostinger, a VPS, anywhere) to see immediately whether the live-execution
// features will work, instead of discovering it lesson-by-lesson.
//
// SECURITY NOTE: this page reveals server configuration details (PHP version,
// disabled functions, paths). Delete it or password-protect it once you've
// confirmed your deployment — don't leave it permanently public.

$results = [];
$overallOk = true;

function check(string $label, bool $ok, string $detail = ''): array
{
    return ['label' => $label, 'ok' => $ok, 'detail' => $detail];
}

// 1) PHP version — the codebase uses match() and other PHP 8.0+ syntax.
$phpVersion = PHP_VERSION;
$phpOk = version_compare($phpVersion, '8.0.0', '>=');
$results[] = check('PHP Version', $phpOk, "Running $phpVersion — needs 8.0+ (match() expressions are used throughout)");
if (!$phpOk) $overallOk = false;

// 2) proc_open — required by every track's code Playground (PHP and Python).
$procOpenExists = function_exists('proc_open');
$procOpenReallyWorks = false;
$procOpenDetail = '';
if ($procOpenExists) {
    $descriptors = [1 => ['pipe', 'w'], 2 => ['pipe', 'w']];
    $testProcess = @proc_open([PHP_BINARY, '-v'], $descriptors, $pipes);
    if (is_resource($testProcess)) {
        $out = stream_get_contents($pipes[1]);
        fclose($pipes[1]);
        fclose($pipes[2]);
        proc_close($testProcess);
        $procOpenReallyWorks = trim($out) !== '';
        $procOpenDetail = $procOpenReallyWorks
            ? 'Spawned a real subprocess successfully — the PHP/Python Playgrounds will work.'
            : 'proc_open() exists but produced no output when tested — investigate before relying on it.';
    } else {
        $procOpenDetail = 'proc_open() exists but calling it failed (possibly restricted by open_basedir or a security module like SELinux/AppArmor).';
    }
} else {
    $procOpenDetail = 'proc_open() is disabled (likely in disable_functions in php.ini) — ALL code Playgrounds across every track will show a clear "disabled" message instead of running code. Ask your host to enable it, or move to a VPS.';
}
$results[] = check('proc_open() — Code Playgrounds', $procOpenReallyWorks, $procOpenDetail);
if (!$procOpenReallyWorks) $overallOk = false;

// 3) pdo_sqlite — required specifically by the PHP Backend track's Database Playground.
$pdoSqliteOk = extension_loaded('pdo_sqlite');
$pdoSqliteDetail = $pdoSqliteOk
    ? 'The PHP Backend track\'s Database Playground (real SQL execution) will work.'
    : 'The pdo_sqlite extension is missing — the Database Playground will show a clear "unavailable" message. Ask your host to enable it (ships with PHP by default almost everywhere).';
$results[] = check('pdo_sqlite — Database Playground', $pdoSqliteOk, $pdoSqliteDetail);
if (!$pdoSqliteOk) $overallOk = false;

// 4) Sessions — used by lessons that demonstrate real $_SESSION behavior.
$sessionOk = false;
$sessionDetail = '';
try {
    if (session_status() !== PHP_SESSION_ACTIVE) {
        @session_start();
    }
    $sessionOk = session_status() === PHP_SESSION_ACTIVE;
    $sessionDetail = $sessionOk ? 'Session storage is working.' : 'session_start() did not activate a session.';
} catch (Throwable $e) {
    $sessionDetail = 'session_start() threw: ' . $e->getMessage();
}
$results[] = check('Sessions', $sessionOk, $sessionDetail);

// 5) Writable data/ and sandbox/ directories across every track — actually
// write and delete a real file rather than trusting is_writable(), which can
// be unreliable under some shared-hosting ACL setups.
$tracksToCheck = ['php-backend', 'fundamentals', 'frontend', 'fullstack', 'python-web',
    'ai-tools', 'digital-marketing', 'data-analysis', 'ui-ux-design', 'graphic-design', 'english'];
$writeIssues = [];
foreach ($tracksToCheck as $track) {
    foreach (['data', 'sandbox'] as $sub) {
        $dir = __DIR__ . "/$track/$sub";
        if (!is_dir($dir)) {
            @mkdir($dir, 0777, true);
        }
        $testFile = $dir . '/.deploy_check_' . bin2hex(random_bytes(4));
        $wrote = @file_put_contents($testFile, 'test') !== false;
        if ($wrote) {
            @unlink($testFile);
        } else {
            $writeIssues[] = "$track/$sub";
        }
    }
}
$writableOk = empty($writeIssues);
$results[] = check(
    'Writable data/ + sandbox/ directories (' . (count($tracksToCheck) * 2) . ' checked)',
    $writableOk,
    $writableOk ? 'Every track can save progress and run code.' : 'NOT writable: ' . implode(', ', $writeIssues) . ' — fix folder permissions (755 or 775, owned by the web server user) or progress-saving and code execution will silently fail there.'
);
if (!$writableOk) $overallOk = false;

// 6) disable_functions — show the full list so nothing else is a silent surprise.
$disabled = ini_get('disable_functions');
$disabledList = $disabled ? array_map('trim', explode(',', $disabled)) : [];
$results[] = check(
    'disable_functions (informational)',
    empty($disabledList),
    empty($disabledList) ? 'Nothing disabled at the php.ini level.' : implode(', ', $disabledList)
);

// 7) open_basedir — informational, explains why sandboxing works the way it does.
$openBasedir = ini_get('open_basedir');
$results[] = check(
    'open_basedir (informational)',
    true,
    $openBasedir ? "Restricted to: $openBasedir" : 'Not set — this app sets its own open_basedir per sandbox execution regardless.'
);

$page_title = 'Deployment Self-Check — Sila';
?>
<!doctype html>
<html lang="en" dir="ltr">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= htmlspecialchars($page_title) ?></title>
<style>
    :root { --bg:#0f1117; --panel:#171a23; --border:#2a2f3f; --text:#e6e8ef; --muted:#9aa1b4; --ok:#62d9a8; --bad:#ff6b6b; }
    * { box-sizing: border-box; }
    body { margin:0; background:var(--bg); color:var(--text); font-family: -apple-system, "Segoe UI", sans-serif; line-height:1.6; }
    .container { max-width: 820px; margin: 0 auto; padding: 32px 20px 60px; }
    h1 { font-size: 1.5rem; }
    .subtitle { color: var(--muted); margin-top: -8px; }
    .summary { padding: 16px 20px; border-radius: 10px; font-weight: 700; margin: 20px 0; }
    .summary.ok { background: rgba(98,217,168,0.12); border: 1px solid var(--ok); color: var(--ok); }
    .summary.bad { background: rgba(255,107,107,0.1); border: 1px solid var(--bad); color: var(--bad); }
    .check { background: var(--panel); border: 1px solid var(--border); border-inline-start: 4px solid var(--border); border-radius: 8px; padding: 14px 18px; margin-bottom: 10px; }
    .check.ok { border-inline-start-color: var(--ok); }
    .check.bad { border-inline-start-color: var(--bad); }
    .check-label { font-weight: 700; display: flex; align-items: center; gap: 8px; }
    .check-detail { color: var(--muted); font-size: 0.9rem; margin-top: 6px; font-family: Consolas, monospace; word-break: break-word; }
    .warn-box { background: rgba(245,166,35,0.1); border: 1px solid #f5a623; border-radius: 8px; padding: 14px 18px; margin-top: 30px; color: #f5a623; font-size: 0.9rem; }
</style>
</head>
<body>
<div class="container">
    <h1>🩺 Deployment Self-Check</h1>
    <p class="subtitle">Run once after deploying to a new host. Tests real behavior, not just settings.</p>

    <div class="summary <?= $overallOk ? 'ok' : 'bad' ?>">
        <?= $overallOk
            ? '✅ Everything that matters for this platform is working on this server.'
            : '⚠️ One or more critical checks failed — see details below before considering this deployment ready.' ?>
    </div>

    <?php foreach ($results as $r): ?>
        <div class="check <?= $r['ok'] ? 'ok' : 'bad' ?>">
            <div class="check-label"><?= $r['ok'] ? '✅' : '❌' ?> <?= htmlspecialchars($r['label']) ?></div>
            <?php if ($r['detail']): ?><div class="check-detail"><?= htmlspecialchars($r['detail']) ?></div><?php endif; ?>
        </div>
    <?php endforeach; ?>

    <div class="warn-box">
        ⚠️ Delete this file (<code>deploy-check.php</code>) or restrict access to it once you've confirmed your deployment — it reveals server configuration details that shouldn't stay permanently public.
    </div>
</div>
</body>
</html>
