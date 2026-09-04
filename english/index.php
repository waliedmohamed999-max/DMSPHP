<?php
require __DIR__ . '/includes/progress.php';
$curriculum = require __DIR__ . '/includes/curriculum.php';
$progress = load_progress();

$total = count($curriculum);
$done = count(array_filter($progress));
$percent = $total > 0 ? round(($done / $total) * 100) : 0;

$levelLabels = [
    'a1' => ['badge' => 'A1', 'title_ar' => 'مبتدئ', 'title_en' => 'Beginner'],
    'a2' => ['badge' => 'A2', 'title_ar' => 'أساسي', 'title_en' => 'Elementary'],
    'b1' => ['badge' => 'B1', 'title_ar' => 'متوسط', 'title_en' => 'Intermediate'],
    'b2' => ['badge' => 'B2', 'title_ar' => 'متوسط متقدم', 'title_en' => 'Upper-Intermediate'],
    'c1' => ['badge' => 'C1', 'title_ar' => 'متقدم واحترافي', 'title_en' => 'Advanced / Professional'],
];
$skillLabels = [
    'grammar'     => 'القواعد',
    'vocabulary'  => 'المفردات',
    'reading'     => 'القراءة',
    'writing'     => 'الكتابة',
    'speaking'    => 'التحدث',
    'listening'   => 'الاستماع',
    'business'    => 'إنجليزي الأعمال',
    'technical'   => 'الإنجليزية التقنية',
    'situational' => 'مواقف حياتية',
];

// Skills breakdown: how many lessons per skill exist vs are completed.
$skillStats = [];
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

// Split curriculum into the two paths, each grouped by CEFR level (order preserved).
$paths = ['core' => [], 'practical' => []];
foreach ($curriculum as $key => $stage) {
    $paths[$stage['group']][$stage['level']][$key] = $stage;
}

$page_title = 'اللغة الإنجليزية — لوحة الدروس';
$base = '.';
include __DIR__ . '/includes/header.php';

function render_stage_card(string $key, array $stage, array $progress): void
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

<h1>مسار تعلم اللغة الإنجليزية</h1>
<p class="subtitle"><span class="ltr">English Language</span> — من الصفر لمستوى احترافي: القواعد، المفردات، الكتابة، مواقف حياتية حقيقية، والإنجليزية التقنية للمبرمجين.</p>

<div class="progress-bar-wrap"><div class="progress-bar" style="width: <?= $percent ?>%"></div></div>
<div class="progress-label"><?= $done ?> / <?= $total ?> درس خلص (<?= $percent ?>%)</div>

<h2 style="margin-top:2em;">📊 توزيع مهاراتك / Skills Breakdown</h2>
<div class="skills-panel">
<?php foreach ($skillStats as $skill => $stat):
    $label = $skillLabels[$skill] ?? $skill;
    $pct = $stat['total'] > 0 ? round(($stat['done'] / $stat['total']) * 100) : 0;
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

<h2 id="core-path" style="margin-top:2.4em;">🧭 المسار الأساسي / Core Path</h2>
<p class="subtitle">القواعد، المفردات، الكتابة، والإنجليزية الاحترافية — بالترتيب من الصفر للاحتراف.</p>
<?php foreach ($paths['core'] as $level => $stages): $lvl = $levelLabels[$level]; ?>
    <div class="level-group">
        <div class="level-group-header">
            <span class="level-badge"><?= $lvl['badge'] ?></span>
            <span class="level-group-title"><?= htmlspecialchars($lvl['title_ar']) ?> <span class="ltr"><?= htmlspecialchars($lvl['title_en']) ?></span></span>
        </div>
        <div class="stage-list">
        <?php foreach ($stages as $key => $stage): render_stage_card($key, $stage, $progress); endforeach; ?>
        </div>
    </div>
<?php endforeach; ?>

<h2 id="practical-path" style="margin-top:2.4em;">🌍 المسار العملي: مواقف حياتية واستماع / Practical Track</h2>
<p class="subtitle">مسار موازٍ للمسار الأساسي — مواقف حياتية حقيقية (تسوق، سفر، دكتور، مقابلات) وتمارين استماع بمستويات متدرجة.</p>
<?php foreach ($paths['practical'] as $level => $stages): $lvl = $levelLabels[$level]; ?>
    <div class="level-group">
        <div class="level-group-header">
            <span class="level-badge"><?= $lvl['badge'] ?></span>
            <span class="level-group-title"><?= htmlspecialchars($lvl['title_ar']) ?> <span class="ltr"><?= htmlspecialchars($lvl['title_en']) ?></span></span>
        </div>
        <div class="stage-list">
        <?php foreach ($stages as $key => $stage): render_stage_card($key, $stage, $progress); endforeach; ?>
        </div>
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
