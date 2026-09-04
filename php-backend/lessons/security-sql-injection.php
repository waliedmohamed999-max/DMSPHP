<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'security-sql-injection';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'الأمان — 🔐 معمل: SQL Injection';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">Stage 14 · Security</span>
<h1>🔐 معمل: SQL Injection <span class="ltr">🔐 Lab: SQL Injection</span></h1>
<p class="subtitle">كود حقيقي معرّض للاختراق، تشوف الهجوم بنفسك، وتصلحه بـ Prepared Statements. <span class="ltr">Real vulnerable code, see the attack happen yourself, then fix it with Prepared Statements.</span></p>

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
    <div class="ar">🇪🇬 تفهم إزاي دمج مدخلات المستخدم مباشرة جوه جملة SQL بيفتح ثغرة اسمها <code>SQL Injection</code>، تشوف بعينك هجوم حقيقي شغال ضد كود حقيقي، وبعدين تتعلم الحل الوحيد المضمون: <code>Prepared Statements</code>. الديمو هنا بيشتغل على SQLite في الذاكرة (نفس قاعدة بيانات الـ Sandbox في المنصة) عشان يبقى قابل للتنفيذ عندك وعند أي متعلم من غير أي سيرفر حقيقي.</div>
    <div class="en">🇬🇧 Understand how concatenating user input directly into a SQL string opens a hole called <code>SQL Injection</code>, watch a real attack actually work against real code, then learn the one reliable fix: <code>Prepared Statements</code>. This demo runs against an in-memory SQLite database (the same flavor as this platform's sandbox) so it's fully runnable for you and every learner, with no real server required.</div>
</div>

<h2 id="understand">🧠 الكود المعرّض للاختراق / The Vulnerable Code</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 الدالة دي بتدور على مستخدم بالإيميل باستخدام دمج نصوص (String Concatenation) مباشرة جوه جملة الـ SQL. المشكلة: أي حاجة يكتبها المستخدم بتتحط <b>حرفيًا</b> جوه الجملة، فلو كتب حاجة زي <code>' OR '1'='1</code>، الجملة بتتغيّر معناها بالكامل من "دوّر على إيميل محدد" لـ "رجّع كل صف لإن الشرط بقى دايمًا صح".</div>
    <div class="en">🇬🇧 This function looks up a user by email using raw string concatenation directly inside the SQL string. The problem: whatever the user types gets inserted <b>literally</b> into the statement, so an input like <code>' OR '1'='1</code> completely changes its meaning from "find one specific email" to "return every row, because the condition is now always true".</div>
</div>

<pre><code>&lt;?php
// ⚠️ معرّض للاختراق — متستخدمش الكود ده في مشروع حقيقي
function vulnerableLogin(PDO $pdo, string $email): array
{
    $sql = "SELECT * FROM users WHERE email = '$email'";
    return $pdo->query($sql)->fetchAll();
}

$attack = "' OR '1'='1";

$rows = vulnerableLogin($pdo, 'sara@example.com');
echo "Normal email -> rows: " . count($rows) . PHP_EOL;

$rows = vulnerableLogin($pdo, $attack);
echo "Attack input -> rows: " . count($rows) . PHP_EOL;
foreach ($rows as $r) {
    echo "Leaked: {$r['name']} &lt;{$r['email']}&gt; role={$r['role']}" . PHP_EOL;
}</code></pre>
<h3>الناتج الفعلي (اتنفّذ فعليًا على SQLite في الذاكرة) / Actual output (really executed against an in-memory SQLite DB)</h3>
<div class="output-box">Normal email -> rows: 1
Attack input -> rows: 2
Leaked: Ahmed Hassan &lt;ahmed@example.com&gt; role=admin
Leaked: Sara Ali &lt;sara@example.com&gt; role=user</div>

<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ الخطورة: المستخدم كان بيحاول يسجّل دخول بإيميل مزيّف، لكن رجعله <b>كل</b> المستخدمين — بما فيهم حساب الـ Admin — لإن الجملة اتحوّلت لـ <code>WHERE email = '' OR '1'='1'</code>، والشرط <code>'1'='1'</code> صح دايمًا لكل صف.</div>
    <div class="en">🇬🇧 Notice the severity: the user was trying to log in with a fake email, but got back <b>every</b> user — including the admin account — because the statement became <code>WHERE email = '' OR '1'='1'</code>, and <code>'1'='1'</code> is true for every single row.</div>
</div>

<h2 id="practice">💻 الحل: Prepared Statements / The Fix: Prepared Statements</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 مع <code>prepare()</code>, جملة الـ SQL بتتجهّز الأول بعلامة استفهام <code>?</code> مكان القيمة، وبعدين <code>execute([$email])</code> بتبعت القيمة منفصلة تمامًا عن الجملة. قاعدة البيانات بتتعامل مع القيمة كـ <b>بيانات فقط</b>، مش كجزء من الأوامر — فمفيش أي طريقة إن <code>' OR '1'='1</code> يغيّر معنى الجملة.</div>
    <div class="en">🇬🇧 With <code>prepare()</code>, the SQL statement is compiled first with a <code>?</code> placeholder instead of the value, and then <code>execute([$email])</code> sends the value completely separately from the statement. The database treats the value as <b>pure data</b>, never as part of the command — so there's no way for <code>' OR '1'='1</code> to change what the query means.</div>
</div>

<pre><code>&lt;?php
// ✅ آمن — Prepared Statement
function safeLogin(PDO $pdo, string $email): array
{
    $stmt = $pdo->prepare('SELECT * FROM users WHERE email = ?');
    $stmt->execute([$email]);
    return $stmt->fetchAll();
}

$attack = "' OR '1'='1";

$rows = safeLogin($pdo, $attack);
echo "Attack input (safe function) -> rows: " . count($rows) . PHP_EOL;

$rows = safeLogin($pdo, 'sara@example.com');
echo "Normal email (safe function) -> rows: " . count($rows) . PHP_EOL;</code></pre>
<h3>الناتج الفعلي (نفس هجوم فعليًا، لكن ضد الدالة الآمنة) / Actual output (the same attack, but against the safe function)</h3>
<div class="output-box">Attack input (safe function) -> rows: 0
Normal email (safe function) -> rows: 1</div>

<div class="bi-block">
    <div class="ar">🇪🇬 نفس المدخل الخبيث بالظبط — لكن دلوقتي رجّع <b>صفر</b> صفوف، لإن مفيش مستخدم إيميله حرفيًا <code>' OR '1'='1</code>. جرّب الكود الآمن بنفسك في المحرر تحت (لاحظ إنه بيبني قاعدة بيانات SQLite صغيرة في الذاكرة أول حاجة، بالظبط زي محرر الكود في المنصة).</div>
    <div class="en">🇬🇧 The exact same malicious input — but now it returns <b>zero</b> rows, because no user's email is literally the string <code>' OR '1'='1</code>. Try the secure code yourself in the editor below (notice it first builds a small in-memory SQLite database, exactly like this platform's code editor does).</div>
</div>

<div class="mini-editor-wrap">
    <textarea spellcheck="false">&lt;?php
$pdo = new PDO('sqlite::memory:', null, null, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
]);
$pdo->exec('CREATE TABLE users (id INTEGER PRIMARY KEY AUTOINCREMENT, name TEXT, email TEXT, role TEXT)');
$stmt = $pdo->prepare('INSERT INTO users (name, email, role) VALUES (?, ?, ?)');
$stmt->execute(['Ahmed Hassan', 'ahmed@example.com', 'admin']);
$stmt->execute(['Sara Ali', 'sara@example.com', 'user']);

// ✅ آمن — Prepared Statement
function safeLogin(PDO $pdo, string $email): array
{
    $stmt = $pdo->prepare('SELECT * FROM users WHERE email = ?');
    $stmt->execute([$email]);
    return $stmt->fetchAll();
}

$attack = "' OR '1'='1";

$rows = safeLogin($pdo, $attack);
echo "Attack input -> rows: " . count($rows) . PHP_EOL;

$rows = safeLogin($pdo, 'sara@example.com');
echo "Normal email -> rows: " . count($rows) . PHP_EOL;

// جرّب تغيّر $attack أو تضيف مستخدم جديد وشوف الناتج
</textarea>
    <div class="mini-toolbar">
        <button class="mini-run-btn">▶ شغّل / Run</button>
        <span class="mini-status"></span>
    </div>
    <div class="output-box">— لسه متشغلش / not run yet —</div>
</div>

<div class="security-box">
    <h3>⚠️ قاعدة ذهبية / Golden Rule</h3>
    <div class="ar">🇪🇬 متبنيش أي جملة SQL بدمج متغيرات جواها أبدًا — لا بـ <code>.</code> ولا بـ <code>"$var"</code> — حتى لو حسّيت إن المتغيّر ده "مش هيوصله input خطير". استخدم <code>prepare()</code>/<code>execute()</code> دايمًا، من غير استثناءات، حتى في أبسط استعلام.</div>
    <div class="en">🇬🇧 Never build a SQL statement by concatenating variables into it — not with <code>.</code>, not with <code>"$var"</code> — even if you think "this variable can't receive dangerous input". Always use <code>prepare()</code>/<code>execute()</code>, no exceptions, even for the simplest query.</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="true">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">في المثال الأول، ليه <code>' OR '1'='1</code> رجّع كل الصفوف؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">In the first example, why did <code>' OR '1'='1</code> return every row?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="true"> لإن الجملة بقت <code>WHERE email = '' OR '1'='1'</code>، وهو شرط صحيح دايمًا</label>
        <label><input type="radio" name="q1" value="a"> لإن PDO فيه Bug</label>
        <label><input type="radio" name="q1" value="b"> لإن SQLite مختلفة عن MySQL</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="prepare">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">إيه الحل الوحيد المضمون ضد SQL Injection؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What is the one reliable fix against SQL Injection?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="escape"> استخدام <code>addslashes()</code> على المدخل</label>
        <label><input type="radio" name="q2" value="prepare"> استخدام <code>prepare()</code>/<code>execute()</code> (Prepared Statements)</label>
        <label><input type="radio" name="q2" value="filter"> فلترة الكلمات الخطيرة زي "OR" و"SELECT"</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="zero">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">لما استخدمنا <code>safeLogin()</code> مع نفس مدخل الهجوم، كام صف رجع فعليًا؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">When we used <code>safeLogin()</code> with the same attack input, how many rows actually came back?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="two"> 2</label>
        <label><input type="radio" name="q3" value="one"> 1</label>
        <label><input type="radio" name="q3" value="zero"> 0</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="data">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">في Prepared Statement، إزاي قاعدة البيانات بتتعامل مع القيمة اللي في <code>execute([$email])</code>؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">In a Prepared Statement, how does the database treat the value passed to <code>execute([$email])</code>?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="data"> كبيانات فقط، مش كجزء من أوامر SQL</label>
        <label><input type="radio" name="q4" value="code"> كجزء من نص جملة SQL نفسها</label>
        <label><input type="radio" name="q4" value="ignore"> بيتجاهلها لو فيها علامات اقتباس</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ لاقي واصلح الثغرة / Find and Fix the Vulnerability</h3>
    <div class="ar">🇪🇬 في <a href="../playground/index.php">محرر الكود</a>: اكتب دالة <code>findPostsByTitle(PDO $pdo, string $title): array</code> بتدور في جدول <code>posts</code> عن عنوان معيّن بدمج نص (زي المثال الأول)، جرّبها بمدخل <code>' OR '1'='1</code> وشوف إنها بترجع كل المقالات، وبعدين اكتبها تاني بـ <code>prepare()</code>/<code>execute()</code> وتأكد إن نفس المدخل بيرجع صفر نتائج.</div>
    <div class="en">🇬🇧 In the <a href="../playground/index.php">Playground</a>: write a <code>findPostsByTitle(PDO $pdo, string $title): array</code> function that searches the <code>posts</code> table by title using string concatenation (like the first example), test it with <code>' OR '1'='1</code> and confirm it returns every post, then rewrite it with <code>prepare()</code>/<code>execute()</code> and confirm the same input now returns zero results.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 SQL Injection كان أول باب أمان فتحناه — الباب اللي جاي هو الأخطر لما بيوصل للمتصفح مباشرة: <code>XSS</code>. في الدرس الجاي، هتشوف إزاي مدخلات المستخدم ممكن تتحول لـ JavaScript خبيث لو طبعتها من غير حماية، وإزاي <code>htmlspecialchars()</code> بيقفل الباب ده.</div>
    <div class="en">🇬🇧 SQL Injection was the first door we closed — the next one is the most dangerous when it reaches the browser directly: <code>XSS</code>. In the next lesson, you'll see how user input can turn into malicious JavaScript when echoed unprotected, and how <code>htmlspecialchars()</code> shuts that door.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>دمج مدخلات المستخدم جوه جملة SQL مباشرة (Concatenation) = ثغرة <code>SQL Injection</code> حقيقية.</li>
        <li>مدخل زي <code>' OR '1'='1</code> بيغيّر معنى الشرط بالكامل ويخلّيه صحيح دايمًا.</li>
        <li>الحل الوحيد المضمون: <code>Prepared Statements</code> — <code>prepare()</code> بجملة فيها <code>?</code>، و<code>execute([$values])</code> بيبعت القيم منفصلة كبيانات.</li>
        <li>نفس المدخل الخبيث ضد <code>safeLogin()</code> رجّع صفر صفوف بدل كل الجدول.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="../index.php">← لوحة التحكم / Dashboard</a>
    <a href="security-xss.php">الدرس الجاي / Next: 🔐 Lab: Cross-Site Scripting →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
