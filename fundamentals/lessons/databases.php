<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'databases';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'مبادئ قواعد البيانات';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">المرحلة 13 / Stage 13</span>
<h1>مبادئ قواعد البيانات <span class="ltr">Database Fundamentals</span></h1>
<p class="subtitle">لحد دلوقتي كل البيانات اللي استخدمناها كانت بتتخزن في متغيرات ومصفوفات، وبتختفي أول ما البرنامج يخلص تنفيذه. قاعدة البيانات هي الحل لمشكلة "إزاي أخزن بيانات تفضل موجودة بعد ما البرنامج يقفل؟" هنا مقدمة مفاهيمية بس — مفيش كود هنشغّله، لأن التطبيق العملي الحقيقي هتلاقيه في مسار الباك إند.</p>

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
    <div class="ar">🇪🇬 تفهم إيه هي قاعدة البيانات، إيه الفرق بين الأنواع الرئيسية، وتشوف شكل أوامر SQL الأساسية — من غير ما ندخل في التفاصيل العملية اللي هتتعلمها بعمق في مسار تاني.</div>
    <div class="en">🇬🇧 Understand what a database is, the main types available, and see the shape of basic SQL commands — without diving into the practical details you'll learn deeply in another track.</div>
</div>

<h2 id="understand">إيه هي قاعدة البيانات؟ <span class="ltr">What is a Database?</span></h2>
<div class="bi-block">
    <div class="ar">🇪🇬 قاعدة البيانات هي مكان منظم لتخزين بيانات بشكل دائم على القرص الصلب (Disk)، بحيث تفضل موجودة حتى لو البرنامج قفل أو السيرفر اتعمله Restart. عكس المتغيرات اللي بتختفي فورًا.</div>
    <div class="en">🇬🇧 A database is an organized place to store data permanently on disk, so it persists even after the program closes or the server restarts — unlike variables, which vanish instantly.</div>
</div>

<h2>SQL مقابل NoSQL — نظرة سريعة</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>قواعد بيانات علائقية (SQL)</b> زي MySQL وPostgreSQL: البيانات متخزنة في جداول (Tables) بصفوف وأعمدة، زي شيت إكسيل منظم جدًا، وفيها علاقات واضحة بين الجداول. <b>قواعد بيانات غير علائقية (NoSQL)</b> زي MongoDB: البيانات متخزنة بشكل أكتر مرونة (زي مستندات JSON)، مفيدة لما شكل البيانات بيتغير كتير أو مش منظّم بنفس الطريقة دايمًا.</div>
    <div class="en">🇬🇧 <b>Relational (SQL)</b> databases like MySQL and PostgreSQL: data lives in tables of rows and columns, like a very organized spreadsheet, with clear relationships between tables. <b>Non-relational (NoSQL)</b> databases like MongoDB: data is stored more flexibly (like JSON documents), useful when data shape varies a lot or isn't always structured the same way.</div>
</div>

<div class="flow-diagram">
    <div class="flow-box">Request comes in</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">PHP builds a SQL query</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">Database executes it</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">Rows come back to PHP</div>
</div>

<h2 id="practice">شكل أوامر SQL الأساسية <span class="ltr">Basic SQL Syntax</span></h2>
<div class="bi-block">
    <div class="ar">🇪🇬 دي أمثلة توضيحية بس لشكل اللغة — مش كود هنشغّله فعليًا هنا، لأن مفيش قاعدة بيانات متصلة بالدرس ده. الهدف إنك تتعرف على الشكل العام قبل ما تدخل تفاصيله بعمق.</div>
    <div class="en">🇬🇧 These are illustrative examples of the language's shape only — not code we're running here, since no database is connected to this lesson. The goal is recognizing the general shape before diving into details.</div>
</div>

<h3>SELECT — قراءة بيانات</h3>
<pre><code>SELECT name, email FROM users WHERE age >= 18;</code></pre>

<h3>INSERT — إضافة بيانات جديدة</h3>
<pre><code>INSERT INTO users (name, email, age) VALUES ('Waleed', 'waleed@example.com', 25);</code></pre>

<h3>UPDATE — تعديل بيانات موجودة</h3>
<pre><code>UPDATE users SET age = 26 WHERE email = 'waleed@example.com';</code></pre>

<h3>DELETE — حذف بيانات</h3>
<pre><code>DELETE FROM users WHERE age < 18;</code></pre>

<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ التشابه مع العمليات اللي عملناها على مصفوفات PHP طول الكورس: <code>SELECT</code> شبه الفلترة (<code>array_filter</code>)، <code>INSERT</code> شبه إضافة عنصر، <code>UPDATE</code> شبه تعديل قيمة موجودة، و<code>DELETE</code> شبه حذف عنصر. الفرق إن دي بتتخزن دائمًا على القرص، مش في الذاكرة المؤقتة بس.</div>
    <div class="en">🇬🇧 Notice the resemblance to operations we did on PHP arrays throughout the course: <code>SELECT</code> is like filtering (<code>array_filter</code>), <code>INSERT</code> is like adding an element, <code>UPDATE</code> is like changing an existing value, and <code>DELETE</code> is like removing an element. The difference is these persist permanently on disk, not just in temporary memory.</div>
</div>

<div class="security-box">
    <h3>⚠️ ملحوظة مهمة / Important Note</h3>
    <div class="ar">🇪🇬 الدرس ده مقدمة مفاهيمية خفيفة بس. التطبيق العملي الكامل — الاتصال الفعلي بقاعدة بيانات من كود PHP باستخدام PDO، تنفيذ الاستعلامات بأمان، وحماية من هجمات زي SQL Injection — هتلاقيه بالتفصيل في المرحلة الرابعة من مسار "PHP Back-End" على سيلا.</div>
    <div class="en">🇬🇧 This lesson is a light conceptual introduction only. The full hands-on treatment — actually connecting to a database from PHP code with PDO, running queries safely, and defending against attacks like SQL Injection — is covered in depth in Stage 4 of the "PHP Back-End" track on Sila.</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="select">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">أنهي أمر SQL بتستخدمه عشان "تقرأ" بيانات موجودة؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Which SQL command do you use to "read" existing data?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="select"> SELECT</label>
        <label><input type="radio" name="q1" value="insert"> INSERT</label>
        <label><input type="radio" name="q1" value="delete"> DELETE</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="nosql">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">أنهي نوع قواعد بيانات بيخزن بيانات على شكل مستندات مرنة (زي JSON) بدل جداول ثابتة؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Which database type stores data as flexible documents (like JSON) instead of fixed tables?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="sql"> SQL (Relational)</label>
        <label><input type="radio" name="q2" value="nosql"> NoSQL</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ اكتب أوامر SQL بنفسك / Write Your Own SQL Commands</h3>
    <div class="ar">🇪🇬 مفيش محرر كود هنا لأن الدرس ده مفاهيمي بس (مفيش قاعدة بيانات متصلة). بدل كده، اكتب على ورقة أو في أي محرر نصوص جملة <code>SELECT</code> تجيب أسماء وإيميلات كل المستخدمين اللي عمرهم أقل من 18، وجملة <code>UPDATE</code> تغيّر إيميل مستخدم معيّن. راجع الأمثلة فوق كمرجع.</div>
    <div class="en">🇬🇧 There's no code editor here since this lesson is conceptual only (no database is connected). Instead, write on paper or in any text editor a <code>SELECT</code> statement fetching the names and emails of every user under 18, and an <code>UPDATE</code> statement changing a specific user's email. Use the examples above as reference.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 الدرس ده مقدمة خفيفة قصدًا — مفيش مرحلة تانية جوه مسار الأساسيات هتستخدم قواعد بيانات فعليًا. لكن المفاهيم دي (SELECT/INSERT/UPDATE/DELETE) هي بالظبط اللي هتلاقيها بالتفصيل الكامل في مسار "PHP Back-End"، ومرحلة "الوظائف البرمجية" الجاية هتوريك إزاي المسارات دي بتترابط مع بعضها.</div>
    <div class="en">🇬🇧 This lesson is intentionally a light introduction — no other stage in the Fundamentals track actually uses a database. But these concepts (SELECT/INSERT/UPDATE/DELETE) are exactly what you'll find in full depth in the "PHP Back-End" track, and the upcoming Programming Careers stage will show you how these tracks connect.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>قاعدة البيانات بتخزن بيانات بشكل دائم، عكس المتغيرات اللي بتختفي مع نهاية البرنامج.</li>
        <li>SQL (جداول منظمة) مقابل NoSQL (مستندات مرنة) — كل نوع مناسب لحالات مختلفة.</li>
        <li>أوامر SQL الأساسية: <code>SELECT</code>, <code>INSERT</code>, <code>UPDATE</code>, <code>DELETE</code>.</li>
        <li>التطبيق العملي الكامل ينتظرك في مسار PHP Back-End.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="other-languages.php">← المرحلة السابقة</a>
    <a href="careers.php">المرحلة الجاية / Next: Programming Careers →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
