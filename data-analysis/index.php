<?php
require __DIR__ . '/includes/progress.php';
$curriculum = require __DIR__ . '/includes/curriculum.php';
$progress = load_progress();

$total = count($curriculum);
$done = count(array_filter($progress));
$percent = $total > 0 ? round(($done / $total) * 100) : 0;

$skillLabels = [
    'python'        => 'Python',
    'pandas'        => 'Pandas',
    'cleaning'      => 'Cleaning',
    'statistics'    => 'Statistics',
    'sql'           => 'SQL',
    'visualization' => 'Visualization',
    'eda'           => 'EDA',
    'projects'      => 'Projects',
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

$stageTitles = [
    1 => ['أساسيات تحليل البيانات', 'Data Analysis Foundations'],
    2 => ['Python لتحليل البيانات', 'Python for Data Analysis'],
    3 => ['أساسيات NumPy', 'NumPy Essentials'],
    4 => ['أساسيات Pandas', 'Pandas Fundamentals'],
    5 => ['تنظيف البيانات', 'Data Cleaning'],
    6 => ['تحويل واستكشاف البيانات', 'Data Transformation & Exploration'],
    7 => ['الإحصاء لتحليل البيانات', 'Statistics for Data Analysis'],
    8 => ['SQL لتحليل البيانات', 'SQL for Data Analysis'],
    9 => ['تصور البيانات', 'Data Visualization'],
    10 => ['التحليل الاستكشافي (EDA)', 'Exploratory Data Analysis'],
    11 => ['التحليل التجاري', 'Business Analysis'],
    12 => ['تحليل متقدم', 'Advanced Data Analysis'],
    13 => ['مشاريع واقعية', 'Real-World Projects'],
    14 => ['مشروع التخرج والتقييم النهائي', 'Final Capstone & Assessment'],
];

$stageGroups = [];
foreach ($stageTitles as $num => [$ar, $en]) {
    $stageGroups[$num] = ['title_ar' => $ar, 'title_en' => $en, 'lessons' => []];
}
foreach ($curriculum as $key => $stage) {
    $stageGroups[$stage['stage']]['lessons'][$key] = $stage;
}
ksort($stageGroups, SORT_NUMERIC);

$page_title = 'تحليل البيانات — لوحة الدروس';
$base = '.';
include __DIR__ . '/includes/header.php';

function render_da_stage_card(string $key, array $stage, array $progress): void
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

<h1>مسار تحليل البيانات</h1>
<p class="subtitle"><span class="ltr">Data Analysis</span> — من أساسيات Python وPandas لتنظيف البيانات وتحليلها وتصورها بيانيًا، وصولاً لمشاريع تحليل حقيقية ومشروع تخرج على بيانات لم تراها من قبل.</p>

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
        <?php foreach ($group['lessons'] as $key => $stage): render_da_stage_card($key, $stage, $progress); endforeach; ?>
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
