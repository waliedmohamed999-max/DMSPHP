<?php
require __DIR__ . '/includes/progress.php';
$curriculum = require __DIR__ . '/includes/curriculum.php';
$progress = load_progress();

$total = count($curriculum);
$done = count(array_filter($progress));
$percent = $total > 0 ? round(($done / $total) * 100) : 0;

$page_title = 'تصميم UX/UI — لوحة الدروس';
$base = '.';
include __DIR__ . '/includes/header.php';
?>

<h1>مسار تصميم UX/UI</h1>
<p class="subtitle"><span class="ltr">UI/UX Design</span> — من فهم الفرق بين تجربة وشكل الاستخدام، لمبادئ التصميم، الألوان، الطباعة، وصولاً لاختبار قابلية الاستخدام الفعلي.</p>

<div class="progress-bar-wrap"><div class="progress-bar" style="width: <?= $percent ?>%"></div></div>
<div class="progress-label"><?= $done ?> / <?= $total ?> مراحل خلصت (<?= $percent ?>%)</div>

<div class="stage-list">
<?php foreach ($curriculum as $key => $stage):
    $isDone = !empty($progress[$key]);
    $lessonFile = __DIR__ . "/lessons/{$key}.php";
    $hasContent = file_exists($lessonFile);
?>
    <div class="stage-card <?= $isDone ? 'done' : '' ?>">
        <button class="stage-check <?= $isDone ? 'checked' : '' ?>" data-stage="<?= $key ?>" title="علّم كمخلّص / Mark done">✓</button>
        <a href="<?= $hasContent ? "lessons/{$key}.php" : '#' ?>" class="stage-body" style="text-decoration:none;color:inherit;<?= $hasContent ? '' : 'opacity:.5;pointer-events:none;' ?>">
            <div class="stage-title"><?= htmlspecialchars($stage['title_ar']) ?> <span class="ltr"><?= htmlspecialchars($stage['title_en']) ?></span></div>
            <div class="stage-desc"><?= htmlspecialchars($stage['desc_ar']) ?></div>
        </a>
        <?php if (!$hasContent): ?><span class="badge">قريبًا / soon</span><?php endif; ?>
    </div>
<?php endforeach; ?>
</div>

<script>
document.querySelectorAll('.stage-check').forEach(btn => {
    btn.addEventListener('click', async () => {
        const stage = btn.dataset.stage;
        const res = await fetch('toggle_progress.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: 'stage=' + encodeURIComponent(stage),
        });
        const data = await res.json();
        if (data.progress) location.reload();
    });
});
</script>

<?php include __DIR__ . '/includes/footer.php'; ?>
