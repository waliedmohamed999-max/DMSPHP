<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'project-ladder-overview';
$isDone = !empty(load_progress()[$stageKey]);
$progress = load_progress();

$page_title = 'خريطة المشاريع الثمانية — The 8-Project Ladder';
$base = '..';
include __DIR__ . '/../includes/header.php';

$projects = [
    ['num' => 1, 'title_ar' => 'آلة حاسبة CLI', 'title_en' => 'PHP CLI Calculator', 'key' => 'project1-cli-calculator', 'file' => 'project1-cli-calculator.php', 'desc_ar' => 'أول مشروع حقيقي — تشتغل من التيرمينال'],
    ['num' => 2, 'title_ar' => 'فورم تواصل', 'title_en' => 'Contact Form', 'key' => 'project2-contact-form', 'file' => 'project2-contact-form.php', 'desc_ar' => 'Validation كامل ورسائل خطأ واضحة'],
    ['num' => 3, 'title_ar' => 'نظام تسجيل دخول', 'title_en' => 'Authentication System', 'key' => 'project3-auth-system', 'file' => 'project3-auth-system.php', 'desc_ar' => 'Register/Login حقيقي بـ password_hash'],
    ['num' => 4, 'title_ar' => 'CRUD Task Manager', 'title_en' => 'CRUD Task Manager', 'key' => 'crud-planning-setup', 'file' => 'crud-planning-setup.php', 'desc_ar' => 'مشروع كامل عبر مرحلة "تطبيق CRUD كامل" — 5 دروس متتالية تبني نظام مهام حقيقي'],
    ['num' => 5, 'title_ar' => 'Blog Backend', 'title_en' => 'Blog Backend', 'key' => 'project5-blog-backend', 'file' => 'project5-blog-backend.php', 'desc_ar' => 'مقالات، تعليقات، وفئات — قراءة عامة وإدارة'],
    ['num' => 6, 'title_ar' => 'REST API', 'title_en' => 'REST API', 'key' => 'rest-products-api-project', 'file' => 'rest-products-api-project.php', 'desc_ar' => 'مشروع كامل عبر مرحلة "بناء REST API" — GET/POST/PUT/DELETE حقيقيين على /api/products'],
    ['num' => 7, 'title_ar' => 'E-Commerce Backend', 'title_en' => 'E-Commerce Backend', 'key' => 'project7-ecommerce-backend', 'file' => 'project7-ecommerce-backend.php', 'desc_ar' => 'منتجات، عربة، وأوردرات بـ Transaction حقيقية'],
    ['num' => 8, 'title_ar' => 'مشروع التخرج', 'title_en' => 'Final Backend Project', 'key' => 'capstone', 'file' => 'capstone.php', 'desc_ar' => 'كل حاجة اتعلمتها في مشروع Backend واحد متكامل'],
];
$doneCount = 0;
foreach ($projects as $p) {
    if (!empty($progress[$p['key']])) $doneCount++;
}
?>

<span class="badge">Stage 18 · Projects</span>
<h1>🗺️ خريطة المشاريع الثمانية <span class="ltr">🗺️ The 8-Project Ladder</span></h1>
<p class="subtitle">مش مسار مشاريع متفرقة — دي سلّم تصاعدي، كل مشروع بيبني على اللي قبله. <span class="ltr">Not scattered projects — a progressive ladder, each one building on the last.</span></p>

<div class="progress-bar-wrap"><div class="progress-bar" style="width: <?= round($doneCount / count($projects) * 100) ?>%"></div></div>
<div class="progress-label"><?= $doneCount ?> / <?= count($projects) ?> مشروع خلص</div>

<h2>📋 المشاريع بالترتيب / Projects in Order</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 المشروعين 4 و6 مش ملفات مستقلة صغيرة — لإنهم كبيرين بما فيه الكفاية إنهم يبقوا مرحلة كاملة في المنهج (CRUD Application وREST API Development)، بدل ما نكرر نفس المحتوى في ملف تاني. اضغط على أي مشروع للبداية.</div>
    <div class="en">🇬🇧 Projects 4 and 6 aren't small standalone files — they're substantial enough to be a full curriculum stage each (CRUD Application and REST API Development), rather than repeating the same content in another file. Click any project to start.</div>
</div>

<div class="stage-list">
<?php foreach ($projects as $p):
    $isProjDone = !empty($progress[$p['key']]);
?>
    <div class="stage-card <?= $isProjDone ? 'done' : '' ?>">
        <a href="<?= htmlspecialchars($p['file']) ?>" class="stage-body" style="text-decoration:none;color:inherit;">
            <div class="stage-title">مشروع <?= $p['num'] ?>: <?= htmlspecialchars($p['title_ar']) ?> <span class="ltr">Project <?= $p['num'] ?>: <?= htmlspecialchars($p['title_en']) ?></span></div>
            <div class="stage-desc"><?= htmlspecialchars($p['desc_ar']) ?></div>
        </a>
        <?php if ($isProjDone): ?><span class="badge done">✓ خلص</span><?php endif; ?>
    </div>
<?php endforeach; ?>
</div>

<div class="recap-box">
    <h3>🏁 بعد المشروع 8 / After Project 8</h3>
    <div class="ar">🇪🇬 لما تخلّص المشروع الأخير، روح لـ <a href="final-assessment.php">التقييم النهائي</a> — 8 محاور بتغطي المسار كله، مش بس مشروع واحد.</div>
    <div class="en">🇬🇧 After finishing the last project, go to the <a href="final-assessment.php">Final Assessment</a> — 8 dimensions covering the whole track, not just one project.</div>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="../index.php">لوحة الدروس / Dashboard</a>
    <a href="project1-cli-calculator.php">ابدأ / Start: Project 1 →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
