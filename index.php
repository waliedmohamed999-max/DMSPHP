<?php
$tracks = require __DIR__ . '/includes/tracks.php';
$available = count(array_filter($tracks, fn($t) => $t['status'] === 'available'));
$page_title = 'Sila — for Learning Programming';

$sections = [
    'programming' => [
        'icon'     => '💻',
        'title_ar' => 'قسم البرمجة',
        'title_en' => 'Programming',
        'desc_ar'  => 'من أول سطر كود لمستوى محترف عالمي في تخصصك.',
    ],
    'digital' => [
        'icon'     => '🚀',
        'title_ar' => 'قسم المهارات الرقمية',
        'title_en' => 'Digital Skills',
        'desc_ar'  => 'تسويق، تحليل بيانات، وتصميم — مهارات رقمية مطلوبة برة عالم البرمجة البحت.',
    ],
];

$tracksBySection = [];
foreach ($tracks as $track) {
    $tracksBySection[$track['section']][] = $track;
}

include __DIR__ . '/includes/header.php';
?>

<div class="container">

<section class="hero">
    <span class="eyebrow">🚀 منصة تعلّم برمجة عملية</span>
    <h1>اتعلّم البرمجة <span class="grad">بالتنفيذ الفعلي</span><br>مش بالحفظ</h1>
    <p class="subtitle">سيلا مش مجموعة فيديوهات — هي أدوات تفاعلية بتخليك تكتب كود حقيقي، تشغّله فعليًا، وتشوف الناتج بعينك، في مسارات مصممة من الصفر لحد الاحتراف العالمي.<br>
    <span class="ltr">Sila isn't a video library — it's hands-on tools that let you write real code, run it for real, and see the actual output, across tracks built from zero to world-class.</span></p>

    <div class="stat-row">
        <div class="stat-item"><div class="stat-num"><?= $available ?></div><div class="stat-label">مسار متاح حاليًا<br><span class="ltr">Available now</span></div></div>
        <div class="stat-item"><div class="stat-num"><?= count($tracks) - $available ?></div><div class="stat-label">مسارات جاية<br><span class="ltr">Coming soon</span></div></div>
        <div class="stat-item"><div class="stat-num">100%</div><div class="stat-label">تنفيذ فعلي<br><span class="ltr">Real execution</span></div></div>
    </div>
</section>

<?php foreach ($sections as $sectionKey => $section): ?>
    <?php if (empty($tracksBySection[$sectionKey])) continue; ?>
    <h2 class="section-title"><?= $section['icon'] ?> <?= htmlspecialchars($section['title_ar']) ?> <span class="ltr"><?= htmlspecialchars($section['title_en']) ?></span></h2>
    <p class="section-sub"><?= htmlspecialchars($section['desc_ar']) ?></p>

    <div class="track-grid">
    <?php foreach ($tracksBySection[$sectionKey] as $track): ?>
        <?php if ($track['status'] === 'available'): ?>
        <a href="<?= htmlspecialchars($track['url']) ?>" class="track-card available">
        <?php else: ?>
        <div class="track-card soon">
        <?php endif; ?>
            <div class="track-top">
                <span class="track-icon"><?= $track['icon'] ?></span>
                <span class="track-status <?= $track['status'] ?>"><?= $track['status'] === 'available' ? 'متاح الآن' : 'قريبًا' ?></span>
            </div>
            <h3><?= htmlspecialchars($track['title_ar']) ?> <span class="en ltr"><?= htmlspecialchars($track['title_en']) ?></span></h3>
            <div class="track-tagline"><?= htmlspecialchars($track['tagline_ar']) ?></div>
            <p class="track-desc"><?= htmlspecialchars($track['desc_ar']) ?></p>
            <div class="track-footer">
                <span class="track-stages"><?= $track['stage_count'] ? $track['stage_count'] . ' مرحلة' : '—' ?></span>
                <span class="track-cta"><?= $track['status'] === 'available' ? 'ابدأ المسار' : 'قريبًا' ?></span>
            </div>
        <?php echo $track['status'] === 'available' ? '</a>' : '</div>'; ?>
    <?php endforeach; ?>
    </div>
<?php endforeach; ?>

<h2 class="section-title">ليه سيلا؟ / Why Sila</h2>
<div class="why-grid">
    <div class="why-card">
        <div class="icon">▶️</div>
        <h4>تنفيذ فعلي حقيقي</h4>
        <p>كل أداة فيها محرر كود بيشغّل الكود فعليًا على السيرفر ويطلعلك الناتج الحقيقي.</p>
    </div>
    <div class="why-card">
        <div class="icon">🇪🇬🇬🇧</div>
        <h4>شرح ثنائي اللغة</h4>
        <p>كل مفهوم متشرح بالعربي والإنجليزي جنب بعض عشان الفهم يترسّخ صح.</p>
    </div>
    <div class="why-card">
        <div class="icon">🗺️</div>
        <h4>مسارات كاملة</h4>
        <p>مش دروس متفرقة — مسار مرحلي من أول سطر كود لحد مستوى محترف عالمي.</p>
    </div>
    <div class="why-card">
        <div class="icon">🧩</div>
        <h4>مسارات بتتزاد</h4>
        <p>المنصة مبنية عشان تستوعب مسارات جديدة باستمرار غير الـ PHP.</p>
    </div>
</div>

</div>

<?php include __DIR__ . '/includes/footer.php'; ?>
