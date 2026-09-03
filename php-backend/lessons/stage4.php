<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'stage4';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'المرحلة 4 — قواعد البيانات';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">المرحلة 4 / Stage 4</span>
<h1>قواعد البيانات <span class="ltr">Databases with PHP</span></h1>
<p class="subtitle">أي Backend حقيقي محتاج يخزن بيانات ويرجعلها. هنا هنتعلم إزاي PHP بيتكلم مع MySQL بأمان باستخدام PDO، من غير ما نفتح الباب لأخطر ثغرة في تاريخ الويب: SQL Injection.</p>

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
    <div class="ar">🇪🇬 تقدر تتصل بقاعدة بيانات MySQL من PHP، وتعمل عمليات CRUD كاملة (إضافة، قراءة، تعديل، حذف) بأمان باستخدام Prepared Statements، وتفهم إمتى تستخدم Transactions.</div>
    <div class="en">🇬🇧 Connect to a MySQL database from PHP, perform full CRUD operations (Create, Read, Update, Delete) safely using Prepared Statements, and understand when to use Transactions.</div>
</div>

<h2 id="understand">🧠 الاتصال باستخدام PDO / Connecting with PDO</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <code>PDO</code> (PHP Data Objects) هي الطريقة الحديثة والموصى بيها للتعامل مع قواعد البيانات في PHP — بتشتغل مع MySQL, SQLite, PostgreSQL بنفس الـ API تقريبًا. أول خطوة دايمًا: افتح اتصال، وفعّل وضع رمي الأخطاء (Exceptions) عشان أي مشكلة تظهر بوضوح بدل ما تختفي بصمت.</div>
    <div class="en">🇬🇧 <code>PDO</code> (PHP Data Objects) is the modern, recommended way to talk to databases in PHP — it works with MySQL, SQLite, PostgreSQL using nearly the same API. First step, always: open a connection and enable exception mode so any problem surfaces clearly instead of failing silently.</div>
</div>

<pre><code>&lt;?php
$dsn = 'mysql:host=localhost;dbname=shop;charset=utf8mb4';
$pdo = new PDO($dsn, 'root', '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
]);

echo "Connected successfully.";</code></pre>
<h3>الناتج الفعلي (على سيرفر MySQL شغال) / Actual output</h3>
<div class="output-box">Connected successfully.</div>

<div class="security-box">
    <h3>⚠️ الأمان: SQL Injection</h3>
    <div class="ar">🇪🇬 متبنيش الـ query أبدًا عن طريق لصق متغيرات جوه النص (زي <code>"SELECT * FROM users WHERE email = '$email'"</code>) — لو المستخدم كتب <code>' OR '1'='1</code> ممكن يفضح كل الجدول أو يمسحه. الحل الوحيد المضمون: <b>Prepared Statements</b> — تكتب الـ query بعلامات استفهام (placeholders) وتبعت القيم منفصلة، فقاعدة البيانات نفسها بتعامل معاها كبيانات مش كأوامر.</div>
    <div class="en">🇬🇧 Never build a query by concatenating variables into the string (e.g. <code>"SELECT * FROM users WHERE email = '$email'"</code>) — if the user enters <code>' OR '1'='1</code>, it could expose or wipe the entire table. The only reliable fix: <b>Prepared Statements</b> — write the query with placeholders and send values separately, so the database treats them strictly as data, never as commands.</div>
</div>

<h2 id="practice">💻 CRUD كامل / Full CRUD</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <code>prepare()</code> بيجهّز الـ query مرة واحدة، و<code>execute()</code> بيبعت القيم. لاحظ إن نفس النمط بيتكرر في العمليات الأربعة: Create, Read, Update, Delete.</div>
    <div class="en">🇬🇧 <code>prepare()</code> compiles the query once, and <code>execute()</code> sends the values. Notice the same pattern repeats across all four operations: Create, Read, Update, Delete.</div>
</div>

<div class="flow-diagram">
    <div class="flow-box">$pdo-&gt;prepare($sql)</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">$stmt-&gt;execute($values)</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">MySQL treats $values strictly as data</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">Result: rows / lastInsertId / rowCount</div>
</div>

<pre><code>&lt;?php
// Create
$stmt = $pdo->prepare('INSERT INTO products (name, price) VALUES (?, ?)');
$stmt->execute(['Keyboard', 45.99]);
echo "New product id: " . $pdo->lastInsertId() . PHP_EOL;

// Read (one row)
$stmt = $pdo->prepare('SELECT * FROM products WHERE id = ?');
$stmt->execute([1]);
$product = $stmt->fetch();
echo $product['name'] . ' - $' . $product['price'] . PHP_EOL;

// Read (all rows)
$all = $pdo->query('SELECT name FROM products')->fetchAll();
foreach ($all as $row) {
    echo "- " . $row['name'] . PHP_EOL;
}

// Update
$stmt = $pdo->prepare('UPDATE products SET price = ? WHERE id = ?');
$stmt->execute([39.99, 1]);
echo "Rows updated: " . $stmt->rowCount() . PHP_EOL;

// Delete
$stmt = $pdo->prepare('DELETE FROM products WHERE id = ?');
$stmt->execute([1]);
echo "Rows deleted: " . $stmt->rowCount();</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">New product id: 4
Keyboard - $45.99
- Keyboard
- Mouse
- Monitor
- Keyboard
Rows updated: 1
Rows deleted: 1</div>

<div class="bi-block">
    <div class="ar">🇪🇬 عشان تجرّب الكود ده من غير سيرفر MySQL حقيقي، المحرر تحت بيستخدم <code>PDO</code> بنفس الـ API بالظبط لكن على <code>SQLite</code> في الذاكرة (<code>sqlite::memory:</code>) — نفس <code>prepare()</code>/<code>execute()</code>، بس مش محتاج سيرفر منفصل.</div>
    <div class="en">🇬🇧 To try this code without a real MySQL server, the editor below uses the exact same <code>PDO</code> API against an in-memory <code>SQLite</code> database (<code>sqlite::memory:</code>) — same <code>prepare()</code>/<code>execute()</code>, no separate server needed.</div>
</div>

<div class="mini-editor-wrap">
    <textarea spellcheck="false">&lt;?php
// عشان نجرب المفهوم من غير سيرفر MySQL حقيقي، بنستخدم SQLite في الذاكرة — نفس PDO API بالظبط
$pdo = new PDO('sqlite::memory:', null, null, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
]);
$pdo->exec('CREATE TABLE products (id INTEGER PRIMARY KEY AUTOINCREMENT, name TEXT, price REAL)');

// Create
$stmt = $pdo->prepare('INSERT INTO products (name, price) VALUES (?, ?)');
$stmt->execute(['Keyboard', 45.99]);
$stmt->execute(['Mouse', 19.99]);
echo "New product id: " . $pdo->lastInsertId() . PHP_EOL;

// Read (one row)
$stmt = $pdo->prepare('SELECT * FROM products WHERE id = ?');
$stmt->execute([1]);
$product = $stmt->fetch();
echo $product['name'] . ' - $' . $product['price'] . PHP_EOL;

// Read (all rows)
$all = $pdo->query('SELECT name FROM products')->fetchAll();
foreach ($all as $row) {
    echo "- " . $row['name'] . PHP_EOL;
}

// Update
$stmt = $pdo->prepare('UPDATE products SET price = ? WHERE id = ?');
$stmt->execute([39.99, 1]);
echo "Rows updated: " . $stmt->rowCount() . PHP_EOL;

// Delete
$stmt = $pdo->prepare('DELETE FROM products WHERE id = ?');
$stmt->execute([1]);
echo "Rows deleted: " . $stmt->rowCount();</textarea>
    <div class="mini-toolbar">
        <button class="mini-run-btn">▶ شغّل / Run</button>
        <span class="mini-status"></span>
    </div>
    <div class="output-box">— لسه متشغلش / not run yet —</div>
</div>

<h2>Transactions</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 لما تحتاج تنفّذ أكتر من عملية كوحدة واحدة "كلها بتنجح أو كلها بترجع زي ما كانت" — زي تحويل فلوس بين حسابين — تستخدم <b>Transaction</b>. لو حصل أي خطأ في النص، <code>rollBack()</code> بيرجّع كل حاجة زي ما كانت قبل ما تبدأ.</div>
    <div class="en">🇬🇧 When you need multiple operations to succeed or fail as one unit — like transferring money between two accounts — use a <b>Transaction</b>. If anything fails midway, <code>rollBack()</code> restores everything to how it was before you started.</div>
</div>

<pre><code>&lt;?php
try {
    $pdo->beginTransaction();

    $pdo->prepare('UPDATE accounts SET balance = balance - ? WHERE id = ?')
        ->execute([100, 1]);
    $pdo->prepare('UPDATE accounts SET balance = balance + ? WHERE id = ?')
        ->execute([100, 2]);

    $pdo->commit();
    echo "Transfer completed.";
} catch (Exception $e) {
    $pdo->rollBack();
    echo "Transfer failed, nothing changed: " . $e->getMessage();
}</code></pre>
<h3>الناتج الفعلي (لو الحسابين موجودين ورصيدهم كافي) / Actual output</h3>
<div class="output-box">Transfer completed.</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="prepared">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">إيه الحماية الوحيدة الموثوقة ضد SQL Injection؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What's the only reliable protection against SQL Injection?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="concat"> دمج المتغيرات جوه النص مباشرة</label>
        <label><input type="radio" name="q1" value="prepared"> Prepared Statements (placeholders + execute)</label>
        <label><input type="radio" name="q1" value="trim"> استخدام <code>trim()</code> على المدخلات</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="transaction">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">عندك عمليتين لازم يحصلوا مع بعض (خصم من حساب وإضافة لحساب تاني)، لو التانية فشلت لازم الأولى ترجع زي ما كانت — تستخدم إيه؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Two operations must succeed together (debit one account, credit another); if the second fails the first must roll back — what do you use?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="transaction"> Transaction (<code>beginTransaction</code>/<code>commit</code>/<code>rollBack</code>)</label>
        <label><input type="radio" name="q2" value="lastinsertid"> <code>lastInsertId()</code></label>
        <label><input type="radio" name="q2" value="fetchall"> <code>fetchAll()</code></label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ جدول Tasks كامل بـ SQLite / A Full Tasks Table with SQLite</h3>
    <div class="ar">🇪🇬 في المحرر فوق (أو <a href="../playground/index.php">محرر الكود</a>): زوّد جدول جديد <code>tasks</code> (<code>id</code>, <code>title</code>, <code>is_done</code>) بنفس أسلوب <code>CREATE TABLE</code> اللي شفته، ضيف 3 مهام بـ Prepared Statements، واكتب query بـ <code>WHERE is_done = 0</code> يعرض بس المهام اللي لسه مش خلصت.</div>
    <div class="en">🇬🇧 In the editor above (or the <a href="../playground/index.php">Playground</a>): add a new <code>tasks</code> table (<code>id</code>, <code>title</code>, <code>is_done</code>) using the same <code>CREATE TABLE</code> approach, insert 3 tasks with Prepared Statements, and write a query with <code>WHERE is_done = 0</code> that shows only unfinished tasks.</div>
</div>

<div class="exercise-box">
    <h3>✍️ تمرين إضافي / Extra Exercise</h3>
    <div class="ar">🇪🇬 اعمل جدول <code>tasks</code> فيه <code>id</code>, <code>title</code>, <code>is_done</code>. اكتب سكريبت PHP بيضيف 3 مهام، يعرضهم كلهم، يعلّم واحدة منهم "خلصت" (Update)، وبعدين يحذف واحدة. استخدم Prepared Statements في كل خطوة.</div>
    <div class="en">🇬🇧 Create a <code>tasks</code> table with <code>id</code>, <code>title</code>, <code>is_done</code>. Write a PHP script that inserts 3 tasks, lists them all, marks one as done (Update), then deletes one. Use Prepared Statements at every step.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 جدولي <code>users</code> و<code>tasks</code> في مشروع Task Manager (الـ Capstone) هيتبنوا بنفس PDO API اللي اتعلمتها هنا بالظبط، وكل عملية CRUD على المهام هتستخدم Prepared Statements — من غير استثناء واحد.</div>
    <div class="en">🇬🇧 The <code>users</code> and <code>tasks</code> tables in the Capstone Task Manager will be built with the exact same PDO API you learned here, and every CRUD operation on tasks will use Prepared Statements — with zero exceptions.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>PDO = الطريقة الموحدة للتعامل مع قواعد بيانات مختلفة من PHP.</li>
        <li>Prepared Statements (<code>prepare()</code> + <code>execute()</code>) = حماية أساسية ضد SQL Injection، مش اختيارية.</li>
        <li>CRUD = Create, Read, Update, Delete — نفس النمط في كل عملية.</li>
        <li>Transactions (<code>beginTransaction</code>, <code>commit</code>, <code>rollBack</code>) = لضمان إن مجموعة عمليات تنجح مع بعض أو ترجع زي ما كانت.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="stage3.php">← المرحلة السابقة</a>
    <a href="stage5.php">المرحلة الجاية / Next: MVC &amp; REST →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
