<?php
$curriculum = require __DIR__ . '/includes/curriculum.php';
$page_title = 'المميزات — PHP Backend Tutor';
$base = '.';
include __DIR__ . '/includes/header.php';
?>

<section class="hero">
    <span class="badge">🐘 عن الأداة / About</span>
    <h1>من الصفر لمحترف Backend عالمي</h1>
    <p class="subtitle">مش كورس فيديو بتتفرج عليه — أداة بتخليك تكتب كود PHP حقيقي، تشغّله فعليًا، وتشوف الناتج بعينك، من أول سطر لحد Design Patterns وSystem Design ومستوى محترف عالمي.<br>
    <span class="ltr">A hands-on tool, not a video course — from your very first line of PHP to Design Patterns, System Design, and world-class engineering practices.</span></p>

    <div class="hero-actions">
        <a href="index.php" class="btn btn-primary">ابدأ الدروس / Start Learning</a>
        <a href="playground/index.php" class="btn btn-outline">جرّب المحرر / Try the Playground</a>
    </div>

    <div class="stat-row">
        <div class="stat-item"><div class="stat-num"><?= count($curriculum) ?></div><div class="stat-label">مراحل تعليمية<br><span class="ltr">Stages</span></div></div>
        <div class="stat-item"><div class="stat-num">2</div><div class="stat-label">لغة شرح<br><span class="ltr">AR + EN</span></div></div>
        <div class="stat-item"><div class="stat-num">100%</div><div class="stat-label">تنفيذ فعلي<br><span class="ltr">Real execution</span></div></div>
    </div>
</section>

<h2>إيه اللي بتقدّمهولك الأداة / What it offers</h2>
<div class="feature-grid">
    <div class="feature-card">
        <div class="icon">🗺️</div>
        <h3>منهج مرحلي متكامل <span class="ltr">Structured Curriculum</span></h3>
        <p>من تجهيز البيئة لمشروع تخرج كامل، مقسّم <?= count($curriculum) ?> مراحل واضحة، كل مرحلة مبنية على اللي قبلها.</p>
    </div>
    <div class="feature-card">
        <div class="icon">🇪🇬🇬🇧</div>
        <h3>شرح ثنائي اللغة <span class="ltr">Bilingual Explanations</span></h3>
        <p>كل مفهوم متشرح بالعربي والإنجليزي جنب بعض، عشان تبني فهم سليم وتقدر كمان تقرأ أي مصدر إنجليزي بعدين براحتك.</p>
    </div>
    <div class="feature-card">
        <div class="icon">▶️</div>
        <h3>تنفيذ فعلي حقيقي <span class="ltr">Real Code Execution</span></h3>
        <p>محرر الكود (Playground) بيشغّل كود PHP فعلي على السيرفر بتاعك ويطلعلك الناتج الحقيقي — مفيش محاكاة أو نتيجة متخيّلة.</p>
    </div>
    <div class="feature-card">
        <div class="icon">📊</div>
        <h3>تتبع التقدم <span class="ltr">Progress Tracking</span></h3>
        <p>علّم كل مرحلة خلصتها بضغطة واحدة، وشوف نسبة تقدمك في لوحة الدروس — محفوظة تلقائيًا من غير أي تسجيل حساب.</p>
    </div>
    <div class="feature-card">
        <div class="icon">📝</div>
        <h3>تمارين عملية <span class="ltr">Hands-on Exercises</span></h3>
        <p>كل درس بينتهي بتمرين تطبّقه بنفسك مباشرة في المحرر، عشان الفهم يترسّخ بالتنفيذ مش بالحفظ.</p>
    </div>
    <div class="feature-card">
        <div class="icon">🛡️</div>
        <h3>وعي أمني مدمج <span class="ltr">Security-first Mindset</span></h3>
        <p>صناديق تحذير مخصصة لأشهر الثغرات (XSS, CSRF, SQL Injection) مدمجة جوه الدروس نفسها، مش موضوع منفصل بتتجاهله.</p>
    </div>
    <div class="feature-card">
        <div class="icon">💾</div>
        <h3>أمثلة + نواتج فعلية <span class="ltr">Real Output, Every Time</span></h3>
        <p>كل مثال كود في الدروس مرفق بالناتج الحقيقي اللي طلع فعلاً، عشان تقارن بنفسك وتتأكد إنك فاهم صح.</p>
    </div>
    <div class="feature-card">
        <div class="icon">🎓</div>
        <h3>مشروع تخرج شامل <span class="ltr">Capstone Project</span></h3>
        <p>مرحلة بتجمع كل الأساسيات في مشروع Backend حقيقي: Authentication, CRUD, Database, REST API, وأمان.</p>
    </div>
    <div class="feature-card">
        <div class="icon">🚀</div>
        <h3>مسار احترافي عالمي <span class="ltr">Senior-Level Track</span></h3>
        <p>بعد الأساسيات، مسار كامل لمستوى Senior: Design Patterns, اختبارات متقدمة, Caching, DevOps, وSystem Design.</p>
    </div>
</div>

<h2>خريطة المراحل / The Roadmap</h2>
<div class="roadmap-mini">
<?php foreach ($curriculum as $key => $stage): ?>
    <a href="lessons/<?= $key ?>.php" class="roadmap-mini-item">
        <span class="n"><?= strtoupper($key) ?></span>
        <span class="t"><?= htmlspecialchars($stage['title_ar']) ?></span>
        <span class="d"><?= htmlspecialchars($stage['desc_ar']) ?></span>
    </a>
<?php endforeach; ?>
</div>

<div class="cta-band">
    <h2 style="margin-top:0;border:none;padding:0;">جاهز تبدأ؟ <span class="ltr">Ready to start?</span></h2>
    <p class="subtitle">من غير تسجيل، من غير إعدادات — افتح أول درس وابدأ تكتب كود PHP حقيقي دلوقتي.</p>
    <div class="hero-actions">
        <a href="index.php" class="btn btn-primary">روح للوحة الدروس / Go to Dashboard</a>
    </div>
</div>

<?php include __DIR__ . '/includes/footer.php'; ?>
