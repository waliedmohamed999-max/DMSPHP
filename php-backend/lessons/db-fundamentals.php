<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'db-fundamentals';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'أساسيات قواعد البيانات — Database Fundamentals';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">Stage 7 · MySQL & SQL</span>
<h1>أساسيات قواعد البيانات: Table, Row, Column, Keys <span class="ltr">Database Fundamentals: Tables, Rows, Columns, Keys</span></h1>
<p class="subtitle">المصطلحات الأساسية قبل أي سطر SQL: Primary Key, Foreign Key, Index, Constraint. <span class="ltr">The core vocabulary before a single line of SQL: primary key, foreign key, index, constraint.</span></p>

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
    <div class="ar">🇪🇬 قبل ما تكتب أي جملة <code>SELECT</code> أو <code>INSERT</code>، لازم تعرف بنفس الوضوح إيه هو الـ Table، الـ Row، الـ Column، الـ Primary Key، الـ Foreign Key، الـ Index، والـ Constraint. المصطلحات دي مش تفاصيل أكاديمية — هي اللي بتخليك تفهم أي Schema تشوفه، بما فيها الـ Schema الحقيقية اللي شغالة في <a href="../db-sandbox/index.php">Database Playground</a> بتاع المنصة، واللي هنستخدمها كمثال حي طول الدروس السبعة دي.</div>
    <div class="en">🇬🇧 Before writing a single <code>SELECT</code> or <code>INSERT</code>, you need equally clear footing on what a Table, Row, Column, Primary Key, Foreign Key, Index, and Constraint actually are. These aren't academic trivia — they're what lets you read any schema you encounter, including the real schema powering this platform's <a href="../db-sandbox/index.php">Database Playground</a>, which we'll use as a running example across all seven lessons in this stage.</div>
</div>

<h2 id="understand">🧠 1) Table, Row, Column — الجدول، الصف، العمود</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>Table</b> (جدول) هو حاوية لبيانات من نوع واحد — زي <code>users</code> لكل المستخدمين، أو <code>posts</code> لكل المقالات. <b>Row</b> (صف) هو سجل واحد جوه الجدول — مستخدم واحد بعينه، أو مقال واحد بعينه. <b>Column</b> (عمود) هو خاصية موجودة في كل صف — زي <code>name</code> أو <code>email</code> أو <code>views</code>. فكّر في الجدول كـ Excel Sheet: كل عمود له اسم ونوع بيانات ثابت (نص، رقم، تاريخ...)، وكل صف هو سطر فيه قيمة لكل عمود.</div>
    <div class="en">🇬🇧 A <b>Table</b> holds data of one kind — <code>users</code> for every user, <code>posts</code> for every article. A <b>Row</b> is one record inside a table — one specific user, one specific post. A <b>Column</b> is an attribute every row has — <code>name</code>, <code>email</code>, <code>views</code>. Think of a table like a spreadsheet: every column has a fixed name and data type (text, number, date...), and every row is a line holding one value per column.</div>
</div>

<div class="flow-diagram">
    <div class="flow-box">Table: <code>users</code></div>
    <div class="flow-arrow">columns →</div>
    <div class="flow-box"><code>id</code> | <code>name</code> | <code>email</code> | <code>role</code> | <code>created_at</code></div>
    <div class="flow-arrow">one row ↓</div>
    <div class="flow-box"><code>1</code> | <code>Ahmed Hassan</code> | <code>ahmed@example.com</code> | <code>admin</code> | <code>2024-01-10</code></div>
</div>

<h2>2) Primary Key — المفتاح الأساسي</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 الـ <b>Primary Key</b> هو العمود (أو مجموعة أعمدة) اللي بيحدد كل صف بشكل فريد ومالوش نظير في الجدول كله. في جدول <code>users</code> بتاع الـ Sandbox، العمود <code>id</code> هو الـ Primary Key — مفيش صفين نفس الـ <code>id</code>، ومينفعش يكون فاضي (<code>NULL</code>). عادة بيكون <code>INTEGER</code> بيزيد أوتوماتيك (<code>AUTOINCREMENT</code> في SQLite، أو <code>AUTO_INCREMENT</code> في MySQL) — إنت مش بتحدد قيمته، قاعدة البيانات هي اللي بتوزّعه.</div>
    <div class="en">🇬🇧 The <b>Primary Key</b> is the column (or set of columns) that uniquely identifies every row, with no duplicates anywhere in the table. In the sandbox's <code>users</code> table, the <code>id</code> column is the Primary Key — no two rows share an <code>id</code>, and it can never be <code>NULL</code>. It's usually an auto-incrementing <code>INTEGER</code> (<code>AUTOINCREMENT</code> in SQLite, <code>AUTO_INCREMENT</code> in MySQL) — you don't set its value, the database assigns it.</div>
</div>

<h2>3) Foreign Key — المفتاح الأجنبي</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 الـ <b>Foreign Key</b> هو عمود في جدول بيشاور على الـ Primary Key بتاع جدول تاني، وده اللي بيربط الجداول ببعض. في الـ Sandbox، عمود <code>posts.user_id</code> هو Foreign Key بيشاور على <code>users.id</code> — كل مقال "بيعرف" صاحبه من غير ما يكرر اسمه أو إيميله. لو حاولت تحط <code>posts.user_id</code> برقم مالوش صف مطابق في <code>users</code>، الـ Constraint المفروض يمنعك (لو الـ Foreign Key checks مفعّلة).</div>
    <div class="en">🇬🇧 A <b>Foreign Key</b> is a column in one table that points at the Primary Key of another table, and that's exactly what links tables together. In the sandbox, <code>posts.user_id</code> is a Foreign Key pointing at <code>users.id</code> — every post "knows" its author without duplicating their name or email. If you tried to set <code>posts.user_id</code> to a number with no matching row in <code>users</code>, the constraint should block it (when foreign key checks are enabled).</div>
</div>

<pre><code>&lt;?php
require __DIR__ . '/../db-sandbox/schema.php';
$pdo = build_sandbox_pdo();

// إثبات إن الـ Schema شغالة فعليًا، مش مجرد وصف نظري
$stmt = $pdo->query('
    SELECT posts.id AS post_id, posts.title, posts.user_id, users.name AS author
    FROM posts
    JOIN users ON posts.user_id = users.id
    WHERE posts.id = 1
');
print_r($stmt->fetch(PDO::FETCH_ASSOC));</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">Array
(
    [post_id] => 1
    [title] => Getting Started with PDO
    [user_id] => 1
    [author] => Ahmed Hassan
)</div>
<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ إن <code>posts.user_id = 1</code> بالظبط هو نفس <code>users.id = 1</code> — ده الرابط الفعلي بين الجدولين، مش مجرد تشابه اسم.</div>
    <div class="en">🇬🇧 Notice <code>posts.user_id = 1</code> is exactly <code>users.id = 1</code> — that is the actual link between the two tables, not just a naming coincidence.</div>
</div>

<h2 id="practice">💻 4) Index و Constraint</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 الـ <b>Index</b> هو هيكل إضافي بتبنيه قاعدة البيانات على عمود معيّن عشان تلاقي الصفوف بسرعة من غير ما "تقرأ" الجدول كله سطر سطر — زي فهرس آخر الكتاب. الـ Primary Key بيتعمله Index أوتوماتيك. الـ <b>Constraint</b> هو قاعدة قاعدة البيانات بترفض أي بيانات تكسرها — زي <code>NOT NULL</code> (العمود لازم يكون له قيمة)، <code>UNIQUE</code> (مفيش قيمتين متطابقتين، زي <code>users.email</code>)، و<code>DEFAULT</code> (قيمة تلقائية لو محددتش حاجة، زي <code>posts.views</code> اللي بتبدأ بـ 0).</div>
    <div class="en">🇬🇧 An <b>Index</b> is an extra structure the database builds on a column so it can find rows fast instead of scanning the whole table row by row — like a book's index. A Primary Key gets an index automatically. A <b>Constraint</b> is a rule the database enforces, rejecting any data that breaks it — <code>NOT NULL</code> (the column must have a value), <code>UNIQUE</code> (no two rows share a value, like <code>users.email</code>), and <code>DEFAULT</code> (an automatic value when none is given, like <code>posts.views</code> starting at 0).</div>
</div>

<pre><code>&lt;?php
require __DIR__ . '/../db-sandbox/schema.php';
$pdo = build_sandbox_pdo();

// UNIQUE على users.email بيمنع إيميل مكرر
try {
    $pdo->exec("INSERT INTO users (id, name, email, role, created_at) VALUES (99, 'Fake Ahmed', 'ahmed@example.com', 'user', '2024-05-01')");
} catch (Throwable $e) {
    echo "Rejected: " . $e->getMessage() . PHP_EOL;
}

// DEFAULT على posts.views: مش لازم تحدده، بيبقى 0
$pdo->exec("INSERT INTO posts (id, user_id, title, body, created_at) VALUES (99, 2, 'No views column given', 'testing DEFAULT', '2024-05-01')");
$row = $pdo->query('SELECT id, title, views FROM posts WHERE id = 99')->fetch(PDO::FETCH_ASSOC);
print_r($row);</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">Rejected: SQLSTATE[23000]: Integrity constraint violation: 19 UNIQUE constraint failed: users.email
Array
(
    [id] => 99
    [title] => No views column given
    [views] => 0
)</div>

<div class="bi-block">
    <div class="ar">🇪🇬 جرّب بنفسك: غيّر الإيميل في محاولة الإدراج الأولى لإيميل مش موجود، وشوف إنه بيتسجّل عادي من غير أي رفض.</div>
    <div class="en">🇬🇧 Try it yourself: change the email in the first insert attempt to one that doesn't exist, and watch it insert cleanly with no rejection.</div>
</div>

<div class="mini-editor-wrap">
    <textarea spellcheck="false">&lt;?php
require __DIR__ . '/../db-sandbox/schema.php';
$pdo = build_sandbox_pdo();

try {
    $pdo->exec("INSERT INTO users (id, name, email, role, created_at) VALUES (99, 'Fake Ahmed', 'ahmed@example.com', 'user', '2024-05-01')");
    echo "Inserted with no problem." . PHP_EOL;
} catch (Throwable $e) {
    echo "Rejected: " . $e->getMessage() . PHP_EOL;
}

$pdo->exec("INSERT INTO posts (id, user_id, title, body, created_at) VALUES (99, 2, 'No views column given', 'testing DEFAULT', '2024-05-01')");
$row = $pdo->query('SELECT id, title, views FROM posts WHERE id = 99')->fetch(PDO::FETCH_ASSOC);
print_r($row);</textarea>
    <div class="mini-toolbar">
        <button class="mini-run-btn">▶ شغّل / Run</button>
        <span class="mini-status"></span>
    </div>
    <div class="output-box">— لسه متشغلش / not run yet —</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="row">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">مستخدم واحد بعينه (زي "Ahmed Hassan") جوه جدول <code>users</code> بيتمثّل بإيه؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">One specific user (like "Ahmed Hassan") inside the <code>users</code> table is represented by what?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="table"> Table</label>
        <label><input type="radio" name="q1" value="row"> Row</label>
        <label><input type="radio" name="q1" value="column"> Column</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="fk">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question"><code>posts.user_id</code> اللي بيشاور على <code>users.id</code> بيتسمى إيه؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em"><code>posts.user_id</code>, which points at <code>users.id</code>, is called what?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="pk"> Primary Key</label>
        <label><input type="radio" name="q2" value="fk"> Foreign Key</label>
        <label><input type="radio" name="q2" value="index"> Index</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="unique">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">في المثال فوق، أنهي Constraint اللي رفض إدراج إيميل <code>ahmed@example.com</code> تاني؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">In the example above, which constraint rejected inserting <code>ahmed@example.com</code> again?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="notnull"> NOT NULL</label>
        <label><input type="radio" name="q3" value="unique"> UNIQUE</label>
        <label><input type="radio" name="q3" value="default"> DEFAULT</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="zero">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">في المثال فوق، لما عملنا INSERT لبوست جديد من غير ما نحدد <code>views</code>، إيه القيمة اللي اتحطت بسبب <code>DEFAULT</code>؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">When we inserted a new post without specifying <code>views</code>, what value did <code>DEFAULT</code> set?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="null"> NULL</label>
        <label><input type="radio" name="q4" value="zero"> 0</label>
        <label><input type="radio" name="q4" value="error"> خطأ Constraint</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ اقرأ Schema بعينك / Read a Schema by Eye</h3>
    <div class="ar">🇪🇬 من غير ما تشغّل أي كود، افتح <code>php-backend/db-sandbox/schema.php</code> واكتب (بالورقة أو في دماغك): أسماء الجداول التلاتة، الـ Primary Key بتاع كل واحد، كل Foreign Key موجود، وأي Constraint (<code>UNIQUE</code>, <code>NOT NULL</code>, <code>DEFAULT</code>) شايفه. بعدين افتح <a href="../db-sandbox/index.php">Database Playground</a> وتأكد من إجاباتك بتشغيل <code>SELECT * FROM sqlite_master WHERE type='table'</code>.</div>
    <div class="en">🇬🇧 Without running any code, open <code>php-backend/db-sandbox/schema.php</code> and write down: the three table names, each one's Primary Key, every Foreign Key present, and any constraint (<code>UNIQUE</code>, <code>NOT NULL</code>, <code>DEFAULT</code>) you spot. Then open the <a href="../db-sandbox/index.php">Database Playground</a> and verify your answers by running <code>SELECT * FROM sqlite_master WHERE type='table'</code>.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 المصطلحات دي مش نظرية منفصلة — كل درس جاي في المرحلة دي هيستخدمها مباشرة: هتكتب <code>SELECT</code> على أعمدة حقيقية، وتفلتر بـ <code>WHERE</code> على Primary/Foreign Keys، وتربط جداول بـ <code>JOIN</code> باستخدام نفس Foreign Keys اللي شفتها هنا. الدرس الجاي: <a href="sql-select-where-orderby.php">SQL: SELECT, WHERE, ORDER BY</a>.</div>
    <div class="en">🇬🇧 This vocabulary isn't separate theory — every upcoming lesson in this stage uses it directly: you'll write <code>SELECT</code> against real columns, filter with <code>WHERE</code> on Primary/Foreign Keys, and connect tables with <code>JOIN</code> using the exact Foreign Keys you saw here. Next lesson: <a href="sql-select-where-orderby.php">SQL: SELECT, WHERE, ORDER BY</a>.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>Table = حاوية بيانات نوع واحد، Row = سجل واحد، Column = خاصية موجودة في كل صف.</li>
        <li>Primary Key = بيحدد كل صف بشكل فريد (زي <code>users.id</code>) — مالوش نظير ومينفعش يكون فاضي.</li>
        <li>Foreign Key = عمود في جدول بيشاور على Primary Key لجدول تاني (زي <code>posts.user_id</code> → <code>users.id</code>) — وده اللي بيربط الجداول.</li>
        <li>Index = هيكل بيسرّع البحث؛ Constraint (<code>NOT NULL</code>, <code>UNIQUE</code>, <code>DEFAULT</code>) = قاعدة بترفض بيانات مخالفة.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="../index.php">← لوحة التحكم / Dashboard</a>
    <a href="sql-select-where-orderby.php">الدرس الجاي / Next: SQL: SELECT, WHERE, ORDER BY →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
