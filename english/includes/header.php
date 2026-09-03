<?php
$page_title = $page_title ?? 'مسار تعلم اللغة الإنجليزية';
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
    <a href="<?= $base ?>/index.php" class="brand">🇬🇧 اللغة الإنجليزية</a>
    <nav>
        <a href="<?= $base ?>/index.php">الدروس <span class="ltr">Lessons</span></a>
        <a href="<?= $base ?>/../index.php">مسارات سيلا <span class="ltr">Sila Tracks</span></a>
    </nav>
</header>
<main class="container">
