<?php
$page_title = $page_title ?? 'PHP Backend Tutor';
$base = $base ?? '.';
?>
<!doctype html>
<html lang="ar" dir="rtl">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= htmlspecialchars($page_title) ?></title>
<link rel="stylesheet" href="<?= $base ?>/includes/style.css">
</head>
<body>
<header class="topbar">
    <a href="<?= $base ?>/index.php" class="brand">🐘 PHP Backend Tutor</a>
    <nav>
        <a href="<?= $base ?>/index.php">الدروس <span class="ltr">Lessons</span></a>
        <a href="<?= $base ?>/playground/index.php">محرر الكود <span class="ltr">Playground</span></a>
        <a href="<?= $base ?>/db-sandbox/index.php">🗄️ SQL <span class="ltr">Database</span></a>
        <a href="<?= $base ?>/about.php">المميزات <span class="ltr">Features</span></a>
        <a href="<?= $base ?>/../index.php">مسارات سيلا <span class="ltr">Sila Tracks</span></a>
    </nav>
</header>
<main class="container">
