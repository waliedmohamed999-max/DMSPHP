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

<h2>مثال ملموس: أول 90 يوم في تخصص Back-End <span class="ltr">A Concrete Example: The First 90 Days in Back-End</span></h2>
<div class="bi-block">
    <div class="ar">🇪🇬 "اختار Back-End" جملة عامة، لكن إيه اللي المفروض تعمله فعليًا في أول 3 شهور؟ ده مثال واقعي لخريطة طريق (Roadmap) شهر بشهر، مبني على إنك خلّصت مسار الأساسيات بالظبط زي ما انت دلوقتي.</div>
    <div class="en">🇬🇧 "Pick Back-End" is a general sentence, but what should you actually do in the first 3 months? Here's a realistic month-by-month roadmap, built on the assumption that you just finished Fundamentals exactly as you have now.</div>
</div>

<div class="flow-diagram">
    <div class="flow-box">Month 1: PHP OOP + HTTP basics</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">Month 2: Databases + a small CRUD app</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">Month 3: APIs + auth + a portfolio project</div>
</div>

<div class="bi-block">
    <div class="ar">🇪🇬 <b>الشهر الأول (الأسابيع 1–4):</b> اتعلم البرمجة الكائنية بعمق أكبر (Classes, Inheritance, Interfaces) — أساسيات المسار ده لمستها بالفعل في مرحلة "البرامج التطبيقية"، لكن هنا هتوسّعها. بالتوازي، افهم أساسيات HTTP: إيه الفرق بين GET وPOST، إيه هو Request وResponse. اختبر نفسك: ابنِ 2-3 كلاسات بتتعامل مع بعض (زي <code>User</code> و<code>Order</code>) بعلاقة بسيطة بينهم.</div>
    <div class="en">🇬🇧 <b>Month 1 (weeks 1–4):</b> learn object-oriented programming in more depth (classes, inheritance, interfaces) — you touched this track's basics in Applications, but now you'll expand it. In parallel, understand HTTP fundamentals: the difference between GET and POST, what a request and response are. Test yourself: build 2-3 classes that interact (like <code>User</code> and <code>Order</code>) with a simple relationship between them.</div>
</div>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>الشهر الثاني (الأسابيع 5–8):</b> اتعلم PDO (الطريقة الآمنة تتعامل بيها مع قواعد البيانات من PHP)، وطبّق المفاهيم اللي شفتها في مرحلة "مبادئ قواعد البيانات" فعليًا: SELECT/INSERT/UPDATE/DELETE، لكن دلوقتي من كود حقيقي. المشروع المقترح: تطبيق CRUD بسيط (زي مدير مهام يحفظ في قاعدة بيانات فعليًا بدل مصفوفة في الذاكرة).</div>
    <div class="en">🇬🇧 <b>Month 2 (weeks 5–8):</b> learn PDO (the safe way to work with databases from PHP), and actually apply the concepts from Database Fundamentals: SELECT/INSERT/UPDATE/DELETE, but now from real code. Suggested project: a simple CRUD app (like a task manager that persists to a real database instead of an in-memory array).</div>
</div>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>الشهر التالت (الأسابيع 9–12):</b> اتعلم إزاي تبني API بسيطة (نقاط نهاية بترجع JSON بدل صفحات HTML)، ومقدمة في التوثيق (Authentication) — إزاي تتأكد مين المستخدم اللي بيتكلم مع السيرفر. اختم الـ90 يوم بمشروع واحد متكامل تحطه في بورتفوليو (CV) بتاعك، يجمع كل حاجة اتعلمتها التلات شهور دول.</div>
    <div class="en">🇬🇧 <b>Month 3 (weeks 9–12):</b> learn how to build a simple API (endpoints returning JSON instead of HTML pages), and an introduction to authentication — how you confirm who's talking to the server. Close out the 90 days with one complete project for your portfolio, combining everything learned across the three months.</div>
</div>
<div class="bi-block">
    <div class="ar">🇪🇬 نفس شكل الخريطة ده (شهر أساسيات أعمق → شهر تطبيق عملي → شهر مشروع متكامل) ينطبق بنفس المنطق على أي تخصص تاني تختاره — الأسماء بس بتتغيّر (React بدل PDO، مثلاً، في Front-End).</div>
    <div class="en">🇬🇧 This same roadmap shape (a month of deeper fundamentals → a month of hands-on application → a month of a complete project) applies with the same logic to any other specialization you pick — only the names change (React instead of PDO, for instance, in Front-End).</div>
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

<div class="quiz-box" data-correct="pdo">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">في خريطة أول 90 يوم لـ Back-End، أنهي مهارة المفروض تتعلمها في الشهر التاني تحديدًا؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">In the Back-End 90-day roadmap, which skill is specifically slated for month 2?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="pdo"> PDO والتعامل الآمن مع قواعد البيانات / PDO and safely working with databases</label>
        <label><input type="radio" name="q3" value="oop3"> البرمجة الكائنية من الصفر / object-oriented programming from scratch</label>
        <label><input type="radio" name="q3" value="api3"> بناء API كاملة / building a complete API</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="shape">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">لو اخترت Front-End بدل Back-End، هل شكل خريطة الـ90 يوم (أساسيات أعمق → تطبيق → مشروع) هيتغيّر؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">If you picked Front-End instead of Back-End, would the 90-day roadmap's shape change?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="shape"> لأ، نفس الشكل (أساسيات → تطبيق → مشروع) بيتكرر، بس الأدوات المحددة بتتغيّر (React بدل PDO مثلًا) / no, the same shape repeats, only the specific tools change (React instead of PDO, for instance)</label>
        <label><input type="radio" name="q4" value="notneeded"> آه، Front-End أصلًا مش محتاج خطة زمنية منظمة / yes, Front-End doesn't need a structured timeline at all</label>
        <label><input type="radio" name="q4" value="shorter"> آه، هيبقى أسبوع واحد بس مش 90 يوم / yes, it would be just one week instead of 90 days</label>
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
