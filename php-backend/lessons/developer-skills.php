<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'developer-skills';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'مهارات المطور الحقيقية — Real Developer Skills';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">Stage 1 · Backend Foundations</span>
<h1>مهارات المطور الحقيقية <span class="ltr">Real Developer Skills</span></h1>
<p class="subtitle">Syntax مهم، لكنه مش اللي هيفرّق بينك وبين مطور محترف. اللي بيفرّق هو المهارات دي. <span class="ltr">Syntax matters, but it's not what separates you from a professional developer. These skills are.</span></p>

<div class="step-tracker">
    <a href="#read">📖 Read</a>
    <a href="#understand">🧠 Understand</a>
    <a href="#practice">💻 Practice</a>
    <a href="#quiz">🧠 Quiz</a>
    <a href="#challenge">🛠️ Challenge</a>
    <a href="#project">🚀 Project</a>
</div>

<h2 id="read">📖 الهدف / Goal</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 تتعرف على 6 مهارات مش مكتوبة في أي دليل PHP، لكنها اللي بتفرّق بين حد "بيحفظ Syntax" وحد "بيحل مشاكل حقيقية" — قراءة التوثيق، البحث عن الأخطاء، فهم كود غريب، تقسيم مشكلة كبيرة، قراءة أخطاء SQL، وكتابة Commit مفيد.</div>
    <div class="en">🇬🇧 Learn 6 skills that aren't written in any PHP manual, but are what separate someone who "memorizes syntax" from someone who "solves real problems" — reading documentation, searching for errors, understanding unfamiliar code, breaking down a big problem, reading SQL errors, and writing a useful commit.</div>
</div>

<h2 id="understand">🧠 1) قراءة التوثيق / Reading Documentation</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 مفيش مطور بيحفظ كل الدوال. المهارة الحقيقية إنك تعرف تقرا صفحة توثيق (زي php.net) بسرعة وتلاقي اللي محتاجه. صفحة أي دالة في php.net بتتكون من: اسم الدالة والـ Signature (المدخلات والمخرجات)، وصف مختصر، أمثلة (Examples) — دايمًا ابدأ بيهم، وقائمة Parameters بالتفصيل.</div>
    <div class="en">🇬🇧 No developer memorizes every function. The real skill is reading a documentation page (like php.net) fast and finding what you need. Any php.net function page has: the function name and signature (inputs/outputs), a short description, Examples — always start there — and a detailed Parameters list.</div>
</div>
<div class="exercise-box">
    <h3>✍️ تمرين / Exercise</h3>
    <div class="ar">🇪🇬 افتح <code>php.net/array_column</code> بنفسك، اقرا الـ Example الأول بس، وجرّب تكتب سطر واحد يستخدمها على مصفوفة مستخدمين عندك من غير ما ترجع لأي درس في المسار.</div>
    <div class="en">🇬🇧 Open <code>php.net/array_column</code> yourself, read only the first Example, and try writing one line using it on a users array of your own, without going back to any lesson in this track.</div>
</div>

<h2>🔎 2) البحث عن الأخطاء / Searching for Errors</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 لما تشوف رسالة خطأ متعرفهاش، متبقاش تايه — انسخ النص المهم منها (اسم الخطأ + الجزء المميز، مش المسار الكامل للملف على جهازك) والصقه في محرك بحث. رسالة زي <code>PHP Fatal error: Uncaught TypeError: calculateTotal(): Argument #1 ($quantity) must be of type int, string given</code> — الجزء المهم للبحث هو <code>TypeError: Argument must be of type int, string given</code>، مش المسار الكامل ولا رقم السطر.</div>
    <div class="en">🇬🇧 When you see an error you don't recognize, don't panic — copy the meaningful part (the error name + the distinctive part, not your full local file path) and search it. A message like <code>PHP Fatal error: Uncaught TypeError: calculateTotal(): Argument #1 ($quantity) must be of type int, string given</code> — the useful part to search is <code>TypeError: Argument must be of type int, string given</code>, not the full path or line number.</div>
</div>

<h2 id="practice">💻 3) قراءة أخطاء SQL / Reading SQL Errors</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 أخطاء SQL بتقول لك بالظبط المشكلة لو قريتها صح. جرّب الكود تحت وشوف رسالة الخطأ الحقيقية.</div>
    <div class="en">🇬🇧 SQL errors tell you exactly what's wrong if you read them right. Try the code below and see the real error message.</div>
</div>
<pre><code>&lt;?php
require __DIR__ . '/../db-sandbox/schema.php';
$pdo = build_sandbox_pdo();

try {
    $pdo->query('SELECT nam FROM users'); // typo: nam instead of name
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage() . PHP_EOL;
}

try {
    $pdo->query('SELECT * FROM userss'); // typo: table doesn't exist
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage() . PHP_EOL;
}</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">Error: SQLSTATE[HY000]: General error: 1 no such column: nam
Error: SQLSTATE[HY000]: General error: 1 no such table: userss</div>
<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ إن كل رسالة بتقول بالظبط المشكلة: "no such column: nam" معناها فيه عمود اسمه بالظبط <code>nam</code> مش موجود — يبقى غالبًا Typo. "no such table: userss" نفس الفكرة بالظبط على مستوى الجدول. اتعلم تقرا الرسالة دي بدل ما تتجاهلها.</div>
    <div class="en">🇬🇧 Notice each message states the problem exactly: "no such column: nam" means a column literally named <code>nam</code> doesn't exist — probably a typo. "no such table: userss" is the same idea at the table level. Learn to read this message instead of skipping past it.</div>
</div>

<h2>🧩 4) تقسيم مشكلة كبيرة / Breaking Down a Big Problem</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 لما تقابل مطلب كبير زي "ابني نظام تسجيل دخول"، متحاولش تكتبه في نفس اللحظة. قسّمه لخطوات صغيرة قابلة للاختبار: (1) فورم HTML بس، (2) استقبال البيانات وطباعتها للتأكد، (3) التحقق من صحة البيانات، (4) البحث عن المستخدم في قاعدة البيانات، (5) التحقق من الباسورد، (6) حفظ الجلسة. كل خطوة تقدر تختبرها لوحدها قبل ما تكمل اللي بعدها.</div>
    <div class="en">🇬🇧 When you face a big requirement like "build a login system," don't try to write it all at once. Break it into small, testable steps: (1) just the HTML form, (2) receive and print the data to confirm it arrives, (3) validate it, (4) look up the user in the database, (5) verify the password, (6) save the session. You can test each step alone before moving to the next.</div>
</div>

<h2>📖 5) فهم كود غريب / Understanding Unfamiliar Code</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 لما تفتح مشروع مكتوب بواسطة حد تاني (أو حتى بواسطتك بس من 3 شهور)، ابدأ من نقطة دخول واحدة (زي <code>index.php</code> أو Route معيّن)، وتتبّع تدفّق البيانات: مين بينادي مين؟ إيه اللي بيتبعت؟ إيه اللي بيرجع؟ متحاولش تفهم كل الملف مرة واحدة — تتبّع سيناريو واحد محدد (زي "لما المستخدم يضغط Login") من أوله لآخره.</div>
    <div class="en">🇬🇧 When you open a project written by someone else (or even by you, 3 months ago), start from one entry point (like <code>index.php</code> or a specific route) and trace the data flow: who calls whom? What gets passed? What comes back? Don't try to understand the whole file at once — trace one specific scenario (like "when the user clicks Login") from start to end.</div>
</div>

<h2>📝 6) كتابة Commit مفيد / Writing a Useful Commit</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <code>git commit -m "fix"</code> مالوش أي معنى بعد 3 شهور. Commit جيد بيقول "إيه اللي اتغيّر وليه" في سطر واحد واضح.</div>
    <div class="en">🇬🇧 <code>git commit -m "fix"</code> means nothing 3 months later. A good commit says "what changed and why" in one clear line.</div>
</div>
<div class="output-box">❌ fix
❌ update code
❌ changes

✅ Fix task deletion allowing users to delete others' tasks
✅ Add email validation to registration form
✅ Add pagination to the tasks list endpoint</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="column">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">رسالة "SQLSTATE[HY000]: no such column: nam" بتقول إيه بالظبط؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What does "no such column: nam" tell you exactly?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="table"> الجدول كله مش موجود</label>
        <label><input type="radio" name="q1" value="column"> فيه عمود اسمه "nam" بالظبط مش موجود — غالبًا Typo</label>
        <label><input type="radio" name="q1" value="connection"> مشكلة في الاتصال بقاعدة البيانات</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>
<div class="quiz-box" data-correct="steps">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">أفضل طريقة تتعامل بيها مع مطلب كبير زي "ابني نظام تسجيل دخول"؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Best way to approach a big requirement like "build a login system"?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="onego"> تكتبه كله مرة واحدة من غير اختبار</label>
        <label><input type="radio" name="q2" value="steps"> تقسّمه لخطوات صغيرة قابلة للاختبار كل واحدة لوحدها</label>
        <label><input type="radio" name="q2" value="skip"> تتجاهله وتنتقل لحاجة تانية</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>
<div class="quiz-box" data-correct="clear">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">أنهي Commit message أفضل؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Which commit message is better?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="vague"> "fix"</label>
        <label><input type="radio" name="q3" value="clear"> "Fix task deletion allowing users to delete others' tasks"</label>
        <label><input type="radio" name="q3" value="empty"> من غير أي رسالة خالص</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>
<div class="quiz-box" data-correct="examples">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">لما تفتح صفحة توثيق دالة جديدة عليك في php.net، أنهي جزء الأنسب تبدأ بيه؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Opening a php.net page for a function new to you, which part should you start with?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="examples"> قسم الـ Examples</label>
        <label><input type="radio" name="q4" value="comments"> تعليقات المستخدمين في الآخر مباشرة</label>
        <label><input type="radio" name="q4" value="history"> تاريخ إضافة الدالة بس</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ فكّك مشكلة حقيقية / Break Down a Real Problem</h3>
    <div class="ar">🇪🇬 خد المطلب ده: "ابني ميزة تسمح للمستخدم يرفع صورة بروفايل". اكتب 5-6 خطوات صغيرة قابلة للاختبار لوحدها، بنفس أسلوب مثال تسجيل الدخول فوق.</div>
    <div class="en">🇬🇧 Take this requirement: "build a feature letting a user upload a profile picture." Write 5-6 small, individually-testable steps, in the same style as the login example above.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 المهارات دي مش نظرية منفصلة عن باقي المسار — هتستخدمها فعليًا في كل مشروع جاي: قراءة رسالة SQL خطأ في مشروع الـ CRUD، تفكيك متطلبات E-Commerce لخطوات، وكتابة Commits واضحة وانت بترفع كل مشروع على GitHub.</div>
    <div class="en">🇬🇧 These skills aren't theory separate from the rest of the track — you'll actually use them in every upcoming project: reading a real SQL error message in the CRUD project, breaking down E-Commerce requirements into steps, and writing clear commits as you push every project to GitHub.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>ابدأ بقراءة الـ Examples في أي صفحة توثيق قبل أي حاجة تانية.</li>
        <li>ابحث عن اسم الخطأ + الجزء المميز منه، مش المسار الكامل.</li>
        <li>رسائل خطأ SQL بتقول المشكلة بالظبط لو قريتها بعناية.</li>
        <li>قسّم أي مطلب كبير لخطوات صغيرة قابلة للاختبار.</li>
        <li>Commit جيد = "إيه اللي اتغيّر وليه" في سطر واحد واضح.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="what-is-backend.php">← المرحلة السابقة</a>
    <a href="html.php">المرحلة الجاية / Next: أساسيات HTML →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
