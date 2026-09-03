<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'careers';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'الوظائف البرمجية';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">المرحلة 14 / Stage 14</span>
<h1>الوظائف البرمجية <span class="ltr">Programming Careers</span></h1>
<p class="subtitle">وصلت لآخر مرحلة في مسار أساسيات البرمجة — مبروك! دلوقتي عندك أساس قوي في المنطق البرمجي يخليك تدخل أي مسار تاني بثقة. السؤال دلوقتي: تكمل فين؟ الدرس ده مش هيعلّمك مهارة جديدة، لكنه هيساعدك تختار وجهتك الجاية.</p>

<div class="step-tracker">
    <a href="#read">📖 Read</a>
    <a href="#understand">🧠 Understand</a>
    <a href="#practice">💻 Practice</a>
    <a href="#quiz">🧠 Quiz</a>
    <a href="#challenge">🛠️ Challenge</a>
    <a href="#project">🚀 Project</a>
</div>

<h2 id="read">الهدف / Goal</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 تتعرف على أشهر مسارات العمل في البرمجة، وإيه طبيعة كل مسار، عشان تقدر تختار المسار المناسب ليك على سيلا بناءً على اهتماماتك.</div>
    <div class="en">🇬🇧 Get familiar with the most common programming career paths and what each involves, so you can pick the right next track on Sila based on your interests.</div>
</div>

<div class="flow-diagram">
    <div class="flow-box">Fundamentals (done!)</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">Pick a specialization</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">Deliberate practice</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">Career</div>
</div>

<h2 id="understand">Front-End — واجهات المستخدم</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 مسؤول عن كل حاجة بتشوفها وتتفاعل معاها في المتصفح: التصميم، الأزرار، الحركة، والاستجابة لأفعال المستخدم. بيعتمد بشكل أساسي على HTML وCSS وJavaScript. مناسب لو بتحب الجانب البصري والتفاعل المباشر مع المستخدم.</div>
    <div class="en">🇬🇧 Responsible for everything you see and interact with in the browser: design, buttons, animation, and responding to user actions. Relies mainly on HTML, CSS, and JavaScript. A good fit if you enjoy the visual side and direct user interaction.</div>
</div>

<h2>Back-End — منطق السيرفر والبيانات</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 الجزء اللي بيشتغل على السيرفر بعيد عن عين المستخدم: معالجة الطلبات، التعامل مع قواعد البيانات، تطبيق قواعد العمل (Business Logic)، والأمان. اللي اتعلمته في مسار الأساسيات (PHP) هو نفسه اللي هتبني عليه هنا مباشرة.</div>
    <div class="en">🇬🇧 The part that runs on the server, out of the user's sight: handling requests, working with databases, applying business logic, and security. What you learned in Fundamentals (PHP) is exactly what you'll build on here directly.</div>
</div>

<h2>Full Stack — الاتنين مع بعض</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 مبرمج قادر يشتغل على الواجهة والسيرفر مع بعض — يبني تطبيق كامل من أول شاشة المستخدم لحد قاعدة البيانات. مطلوب كتير في الشركات الصغيرة والمتوسطة اللي محتاجة شخص يغطي المشروع كله.</div>
    <div class="en">🇬🇧 A developer capable of working on both the interface and the server — building a complete application from the user's screen down to the database. Highly sought after in small and mid-size companies needing someone to cover the whole project.</div>
</div>

<h2>Mobile Development — تطبيقات الموبايل</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 بناء تطبيقات للموبايل (Android وiOS)، إما بلغات مخصصة لكل منصة، أو بأدوات "Cross-Platform" بتخليك تكتب كود واحد يشتغل على المنصتين. مناسب لو مهتم بتجربة المستخدم على الأجهزة المحمولة تحديدًا.</div>
    <div class="en">🇬🇧 Building applications for mobile (Android and iOS), either with platform-specific languages or cross-platform tools that let you write one codebase for both. A good fit if you're specifically interested in the mobile user experience.</div>
</div>

<h2>Data — البيانات والتحليل والذكاء الاصطناعي</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 التعامل مع كميات كبيرة من البيانات: تحليلها، استخراج أنماط منها، وبناء نماذج تعلّم آلي (Machine Learning). بيعتمد بشكل كبير على الرياضيات والإحصاء، ومناسب لو بتحب الأرقام والاستنتاج المنطقي منها.</div>
    <div class="en">🇬🇧 Working with large amounts of data: analyzing it, finding patterns, and building machine learning models. Relies heavily on math and statistics — a good fit if you enjoy numbers and drawing logical conclusions from them.</div>
</div>

<h2>DevOps — تشغيل وصيانة الأنظمة</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 مسؤول عن إن التطبيقات تشتغل بثبات ويتم نشرها بأمان (Deployment)، وإدارة السيرفرات، والمراقبة المستمرة للأداء. بيربط بين البرمجة وإدارة البنية التحتية، ومناسب لو بتحب الجانب التقني للأنظمة أكتر من الكود نفسه.</div>
    <div class="en">🇬🇧 Responsible for keeping applications running reliably, deploying them safely, managing servers, and continuously monitoring performance. Bridges programming and infrastructure management — a good fit if you enjoy the technical systems side more than writing application code itself.</div>
</div>

<h2 id="practice">💻 طبّق اللي قرأته / Apply What You Read</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 مفيش محرر كود هنا — مفيش حاجة نشغّلها، الدرس ده اختياري بالكامل. بدل كده، ارجع لوصف كل مسار فوق واعمل ترتيب ذهني بسيط: حط المسارات من الأكتر إثارة لاهتمامك للأقل. أي مسار جه في المركز الأول؟</div>
    <div class="en">🇬🇧 There's no code editor here — nothing to run, this lesson is entirely reflective. Instead, go back over each track description above and make a simple mental ranking: order the tracks from most to least exciting to you. Which one came first?</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="backend">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">أنهي مسار هيبني مباشرة على PHP اللي اتعلمتها في مسار الأساسيات؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Which track builds directly on the PHP you learned in Fundamentals?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="frontend"> Front-End</label>
        <label><input type="radio" name="q1" value="backend"> Back-End</label>
        <label><input type="radio" name="q1" value="mobile"> Mobile Development</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="data">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">أنهي مسار بيعتمد بشكل كبير على الرياضيات والإحصاء؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Which track relies heavily on math and statistics?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="devops"> DevOps</label>
        <label><input type="radio" name="q2" value="data"> Data</label>
        <label><input type="radio" name="q2" value="fullstack"> Full Stack</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ اكتب قرارك واسبابه / Write Down Your Decision and Why</h3>
    <div class="ar">🇪🇬 ارجع لوصف كل مسار فوق، واكتب (في ملاحظة أو ورقة) اسم المسار اللي شدّك أكتر وأنت باقراه، مع سبب واحد محدد ليه. بعد كده اكتب مسار تاني كخيار بديل. القرار ده مش نهائي، لكنه خطوة عملية أفضل من مجرد "التفكير".</div>
    <div class="en">🇬🇧 Go back over each track description above, and write down (in a note or on paper) the track that pulled you in the most while reading it, with one specific reason why. Then write a second track as a backup option. This decision isn't final, but writing it down is a more concrete step than just "thinking about it."</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 المرحلة دي هي آخر حاجة في مسار الأساسيات، فمفيش "مرحلة جاية" جوه نفس المسار نربطها بيها. المشروع الحقيقي دلوقتي هو الخطوة الجاية فعليًا: اختيار المسار المناسب ليك من <a href="../../index.php">مسارات سيلا</a> وتطبيق كل المنطق البرمجي اللي بنيته على مشروع حقيقي هناك.</div>
    <div class="en">🇬🇧 This is the last stage in the Fundamentals track, so there's no "next stage" within the same track to bridge to. The real project now is the actual next step: choosing the right track for you from <a href="../../index.php">Sila's Tracks</a> and applying everything you've built here to a real project there.</div>
</div>

<div class="recap-box">
    <h3>✅ مبروك! أنهيت مسار أساسيات البرمجة / Congratulations — you finished Programming Fundamentals!</h3>
    <ul>
        <li>اتعلمت أساسيات اللغة، حللت عشرات المشاكل، وبنيت هياكل بيانات وخوارزميات وبرامج كاملة بنفسك.</li>
        <li>المنطق البرمجي اللي بنيته دلوقتي هيفضل معاك في أي لغة أو مسار تختاره بعد كده.</li>
        <li>الخطوة الجاية: اختار تخصصك من <a href="../../index.php">مسارات سيلا / Sila Tracks</a> وكمل رحلتك.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="databases.php">← المرحلة السابقة</a>
    <a href="../index.php">لوحة الدروس / Dashboard</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
