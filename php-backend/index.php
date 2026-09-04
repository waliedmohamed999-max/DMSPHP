<?php
require __DIR__ . '/includes/progress.php';
$curriculum = require __DIR__ . '/includes/curriculum.php';
$progress = load_progress();

$total = count($curriculum);
$done = count(array_filter($progress));
$percent = $total > 0 ? round(($done / $total) * 100) : 0;

$skillLabels = [
    'php'          => 'PHP',
    'mysql'        => 'MySQL',
    'oop'          => 'OOP',
    'apis'         => 'APIs',
    'security'     => 'Security',
    'architecture' => 'Architecture',
    'deployment'   => 'Deployment',
];

$skillStats = [];
foreach ($skillLabels as $skill => $label) {
    $skillStats[$skill] = ['total' => 0, 'done' => 0];
}
foreach ($curriculum as $key => $stage) {
    $skill = $stage['skill'];
    if (!isset($skillStats[$skill])) {
        $skillStats[$skill] = ['total' => 0, 'done' => 0];
    }
    $skillStats[$skill]['total']++;
    if (!empty($progress[$key])) {
        $skillStats[$skill]['done']++;
    }
}

// The full 18-stage roadmap, so stages with no lessons yet still show on the
// dashboard as "coming soon" rather than silently vanishing.
$stageTitles = [
    1 => ['أساسيات الـ Backend', 'Backend Foundations'],
    2 => ['أساسيات لغة PHP', 'PHP Fundamentals'],
    3 => ['PHP متوسط', 'PHP Intermediate'],
    4 => ['الويب و HTTP', 'Web & HTTP'],
    5 => ['الفورمات، الجلسات، والكوكيز', 'Forms, Sessions & Cookies'],
    6 => ['الملفات، JSON، والـ APIs', 'Files, JSON & APIs'],
    7 => ['MySQL و SQL', 'MySQL & SQL'],
    8 => ['تصميم قواعد البيانات', 'Database Design'],
    9 => ['تطبيق CRUD كامل', 'CRUD Application'],
    10 => ['المصادقة والتفويض', 'Authentication & Authorization'],
    11 => ['البرمجة الكائنية', 'Object-Oriented PHP'],
    12 => ['بنية نظيفة و MVC', 'Clean Architecture & MVC'],
    13 => ['بناء REST API', 'REST API Development'],
    14 => ['الأمان', 'Security'],
    15 => ['اختبار، تصحيح، وأداء', 'Testing, Debugging & Performance'],
    16 => ['النشر و DevOps', 'Deployment & DevOps Basics'],
    17 => ['أساسيات تصميم الأنظمة', 'System Design Basics'],
    18 => ['المشاريع', 'Projects'],
];

$stageGroups = [];
foreach ($stageTitles as $num => [$ar, $en]) {
    $stageGroups[$num] = ['title_ar' => $ar, 'title_en' => $en, 'lessons' => []];
}
foreach ($curriculum as $key => $stage) {
    $stageGroups[$stage['stage']]['lessons'][$key] = $stage;
}
ksort($stageGroups, SORT_NUMERIC);

$page_title = 'PHP Backend Tutor — لوحة الدروس';
$base = '.';
include __DIR__ . '/includes/header.php';

function render_backend_stage_card(string $key, array $stage, array $progress): void
{
    $isDone = !empty($progress[$key]);
    $lessonFile = __DIR__ . "/lessons/{$key}.php";
    $hasContent = file_exists($lessonFile);
    ?>
    <div class="stage-card <?= $isDone ? 'done' : '' ?>">
        <button class="stage-check <?= $isDone ? 'checked' : '' ?>" data-stage="<?= $key ?>" title="علّم كمخلّص / Mark done" <?= $hasContent ? '' : 'disabled' ?>>✓</button>
        <a href="<?= $hasContent ? "lessons/{$key}.php" : '#' ?>" class="stage-body" style="text-decoration:none;color:inherit;<?= $hasContent ? '' : 'opacity:.5;pointer-events:none;' ?>">
            <div class="stage-title"><?= htmlspecialchars($stage['title_ar']) ?> <span class="ltr"><?= htmlspecialchars($stage['title_en']) ?></span></div>
            <div class="stage-desc"><?= htmlspecialchars($stage['desc_ar']) ?></div>
        </a>
        <?php if (!$hasContent): ?><span class="badge">قريبًا / soon</span><?php endif; ?>
    </div>
    <?php
}
?>

<h1>معلّم PHP Backend الخصوصي</h1>
<p class="subtitle"><span class="ltr">Personal PHP Backend Tutor</span> — من الصفر لمستوى Junior/Mid-level Backend Developer، بالتنفيذ الفعلي مش بالحفظ.</p>

<div class="progress-bar-wrap"><div class="progress-bar" style="width: <?= $percent ?>%"></div></div>
<div class="progress-label"><?= $done ?> / <?= $total ?> درس خلص (<?= $percent ?>%)</div>

<h2 style="margin-top:2em;">📊 توزيع مهاراتك / Skills Breakdown</h2>
<div class="skills-panel">
<?php foreach ($skillStats as $skill => $stat):
    if ($stat['total'] === 0) continue;
    $label = $skillLabels[$skill] ?? $skill;
    $pct = round(($stat['done'] / $stat['total']) * 100);
?>
    <div class="skill-row">
        <div class="skill-row-top">
            <span class="skill-row-name"><?= htmlspecialchars($label) ?></span>
            <span class="skill-row-count"><?= $stat['done'] ?>/<?= $stat['total'] ?></span>
        </div>
        <div class="skill-bar-wrap"><div class="skill-bar" style="width: <?= $pct ?>%"></div></div>
    </div>
<?php endforeach; ?>
</div>

<?php foreach ($stageGroups as $num => $group): ?>
    <div class="stage-group">
        <div class="stage-group-header">
            <span class="stage-num-badge">Stage <?= $num ?></span>
            <span class="stage-group-title"><?= htmlspecialchars($group['title_ar']) ?> <span class="ltr"><?= htmlspecialchars($group['title_en']) ?></span></span>
        </div>
        <?php if (empty($group['lessons'])): ?>
            <div class="stage-card" style="opacity:.5">
                <span class="stage-body"><div class="stage-desc">قريبًا / Coming soon</div></span>
            </div>
        <?php else: ?>
        <div class="stage-list">
        <?php foreach ($group['lessons'] as $key => $stage): render_backend_stage_card($key, $stage, $progress); endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
<?php endforeach; ?>

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
