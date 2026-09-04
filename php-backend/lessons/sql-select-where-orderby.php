<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'sql-select-where-orderby';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'SQL: SELECT, WHERE, ORDER BY';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">Stage 7 · MySQL & SQL</span>
<h1>SQL: SELECT, WHERE, ORDER BY</h1>
<p class="subtitle">أول 3 أوامر SQL هتستخدمها في كل استعلام تقريبًا — حقيقي ضد الـ Sandbox. <span class="ltr">The first 3 SQL commands you'll use in almost every query — real, against the sandbox.</span></p>

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
    <div class="ar">🇪🇬 تقدر تكتب <code>SELECT</code> تجيب أعمدة معيّنة (مش كل حاجة دايمًا)، تفلتر الصفوف بـ <code>WHERE</code> حسب شرط، وترتّب النتيجة بـ <code>ORDER BY</code> — تصاعديًا أو تنازليًا. الثلاثة دول بيتكرروا في كل استعلام تقريبًا هتكتبه في حياتك المهنية.</div>
    <div class="en">🇬🇧 Write a <code>SELECT</code> that fetches specific columns (not always everything), filter rows with <code>WHERE</code> using a condition, and order the result with <code>ORDER BY</code> — ascending or descending. These three show up in nearly every query you'll ever write professionally.</div>
</div>

<h2 id="understand">🧠 1) SELECT — إيه الأعمدة اللي عايزها</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <code>SELECT * FROM posts</code> بيرجّع كل الأعمدة. لكن في الغالب مش محتاج كل حاجة — <code>SELECT title, views FROM posts</code> بيرجّع بس اللي طلبته، وده أسرع وأوضح، خصوصًا لما الجدول فيه أعمدة كبيرة زي نصوص طويلة مش محتاجها كل مرة.</div>
    <div class="en">🇬🇧 <code>SELECT * FROM posts</code> returns every column. But you often don't need everything — <code>SELECT title, views FROM posts</code> returns only what you asked for, which is faster and clearer, especially when a table has large columns (like long text) you don't need every time.</div>
</div>

<h2>2) WHERE — فلترة الصفوف</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <code>WHERE</code> بيحدد أنهي صفوف تتحط في النتيجة، بناءً على شرط. تقدر تستخدم <code>=</code>, <code>&gt;</code>, <code>&lt;</code>, <code>&gt;=</code>, <code>&lt;=</code>, <code>!=</code>، وتجمع شروط بـ <code>AND</code>/<code>OR</code>. من غير <code>WHERE</code>، الاستعلام بيرجّع كل الصفوف من غير استثناء.</div>
    <div class="en">🇬🇧 <code>WHERE</code> decides which rows make it into the result, based on a condition. Use <code>=</code>, <code>&gt;</code>, <code>&lt;</code>, <code>&gt;=</code>, <code>&lt;=</code>, <code>!=</code>, and combine conditions with <code>AND</code>/<code>OR</code>. Without <code>WHERE</code>, the query returns every row with no exceptions.</div>
</div>

<h2>3) ORDER BY — الترتيب</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <code>ORDER BY column ASC</code> (الافتراضي، تصاعدي) أو <code>ORDER BY column DESC</code> (تنازلي) بيرتّب النتيجة النهائية. تقدر ترتّب على أكتر من عمود، وتضيف <code>LIMIT</code> عشان تاخد أول N صف بس.</div>
    <div class="en">🇬🇧 <code>ORDER BY column ASC</code> (default, ascending) or <code>ORDER BY column DESC</code> (descending) sorts the final result. You can sort on multiple columns, and add <code>LIMIT</code> to take only the first N rows.</div>
</div>

<h2 id="practice">💻 الثلاثة مع بعض على بيانات حقيقية / All Three Together on Real Data</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 الكود ده بينفّذ فعليًا ضد نفس الـ Schema اللي في <a href="../db-sandbox/index.php">Database Playground</a> بتاع المنصة (5 مستخدمين، 8 مقالات، 12 تعليق).</div>
    <div class="en">🇬🇧 This code actually runs against the same schema powering this platform's <a href="../db-sandbox/index.php">Database Playground</a> (5 users, 8 posts, 12 comments).</div>
</div>

<pre><code>&lt;?php
require __DIR__ . '/../db-sandbox/schema.php';
$pdo = build_sandbox_pdo();

// 1) المقالات اللي عدد مشاهداتها أكتر من 100، مرتبة تنازليًا
$rows = $pdo->query("SELECT * FROM posts WHERE views > 100 ORDER BY views DESC")->fetchAll(PDO::FETCH_ASSOC);
foreach ($rows as $r) {
    echo "{$r['title']} — {$r['views']} views" . PHP_EOL;
}</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">Why Prepared Statements Matter — 340 views
Indexing for Performance — 300 views
Database Design 101 — 210 views
Understanding JOINs — 175 views
Getting Started with PDO — 120 views</div>

<pre><code>&lt;?php
// 2) المستخدمين اللي دورهم admin بالظبط
$rows = $pdo->query("SELECT * FROM users WHERE role = 'admin'")->fetchAll(PDO::FETCH_ASSOC);
print_r($rows);</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">Array
(
    [0] => Array
        (
            [id] => 1
            [name] => Ahmed Hassan
            [email] => ahmed@example.com
            [role] => admin
            [created_at] => 2024-01-10
        )

)</div>

<pre><code>&lt;?php
// 3) أقل 3 مقالات مشاهدة، بترتيب تصاعدي، وبأعمدة محددة بس
$rows = $pdo->query("SELECT title, views FROM posts WHERE views < 100 ORDER BY views ASC LIMIT 3")->fetchAll(PDO::FETCH_ASSOC);
print_r($rows);</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">Array
(
    [0] => Array
        (
            [title] => Debugging a Tricky Bug
            [views] => 60
        )

    [1] => Array
        (
            [title] => My First REST API
            [views] => 85
        )

    [2] => Array
        (
            [title] => Sessions vs Cookies
            [views] => 95
        )

)</div>

<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ في المثال التالت إن الـ <code>SELECT</code> جاب <code>title</code> و<code>views</code> بس، مش كل أعمدة <code>posts</code> — و<code>LIMIT 3</code> وقّف النتيجة عند أول 3 صفوف بعد الترتيب، مش قبله.</div>
    <div class="en">🇬🇧 Notice in the third example the <code>SELECT</code> fetched only <code>title</code> and <code>views</code>, not every column in <code>posts</code> — and <code>LIMIT 3</code> cut the result to the first 3 rows after sorting, not before.</div>
</div>

<div class="bi-block">
    <div class="ar">🇪🇬 جرّب بنفسك في المحرر تحت — غيّر <code>role = 'admin'</code> لـ <code>role = 'editor'</code> أو <code>role = 'user'</code>، أو غيّر <code>ORDER BY views DESC</code> لـ <code>ASC</code>، وشوف الفرق فعليًا.</div>
    <div class="en">🇬🇧 Try it yourself in the editor below — change <code>role = 'admin'</code> to <code>role = 'editor'</code> or <code>role = 'user'</code>, or flip <code>ORDER BY views DESC</code> to <code>ASC</code>, and see the real difference.</div>
</div>

<div class="mini-editor-wrap">
    <textarea spellcheck="false">&lt;?php
require __DIR__ . '/../db-sandbox/schema.php';
$pdo = build_sandbox_pdo();

$rows = $pdo->query("SELECT * FROM users WHERE role = 'admin' ORDER BY created_at DESC")->fetchAll(PDO::FETCH_ASSOC);
foreach ($rows as $r) {
    echo "{$r['name']} <{$r['email']}> - {$r['role']}" . PHP_EOL;
}

echo PHP_EOL . "-- posts with views between 90 and 250 --" . PHP_EOL;
$rows = $pdo->query("SELECT title, views FROM posts WHERE views >= 90 AND views <= 250 ORDER BY views DESC")->fetchAll(PDO::FETCH_ASSOC);
foreach ($rows as $r) {
    echo "{$r['title']} — {$r['views']} views" . PHP_EOL;
}</textarea>
    <div class="mini-toolbar">
        <button class="mini-run-btn">▶ شغّل / Run</button>
        <span class="mini-status"></span>
    </div>
    <div class="output-box">— لسه متشغلش / not run yet —</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="five">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">في المثال الأول (<code>views > 100 ORDER BY views DESC</code>)، كام مقال رجع فعليًا؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">In the first example (<code>views > 100 ORDER BY views DESC</code>), how many posts actually came back?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="eight"> 8</label>
        <label><input type="radio" name="q1" value="five"> 5</label>
        <label><input type="radio" name="q1" value="three"> 3</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="all">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">لو كتبت <code>SELECT * FROM posts</code> من غير <code>WHERE</code>، هيرجع كام صف؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">If you write <code>SELECT * FROM posts</code> with no <code>WHERE</code>, how many rows come back?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="all"> كل الصفوف (8 في الـ Sandbox)</label>
        <label><input type="radio" name="q2" value="none"> صفر — لازم WHERE دايمًا</label>
        <label><input type="radio" name="q2" value="one"> صف واحد بس</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="after">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">في المثال الثالث، <code>LIMIT 3</code> بيوقّف النتيجة عند أول 3 صفوف قبل الترتيب ولا بعده؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">In the third example, does <code>LIMIT 3</code> cut the result before or after <code>ORDER BY</code> sorts it?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="before"> قبل الترتيب</label>
        <label><input type="radio" name="q3" value="after"> بعد الترتيب</label>
        <label><input type="radio" name="q3" value="random"> بترتيب عشوائي مالوش علاقة بـ ORDER BY</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="two">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question"><code>SELECT title, views FROM posts</code> هيرجع كام عمود لكل صف؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">How many columns per row does <code>SELECT title, views FROM posts</code> return?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="six"> 6 (كل أعمدة posts)</label>
        <label><input type="radio" name="q4" value="two"> 2 (title و views بس)</label>
        <label><input type="radio" name="q4" value="one"> 1</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ استعلام مركّب / A Compound Query</h3>
    <div class="ar">🇪🇬 في <a href="../db-sandbox/index.php">Database Playground</a>: اكتب استعلام واحد يجيب <code>name</code> و<code>email</code> من <code>users</code> للمستخدمين اللي <code>role</code> بتاعهم مش <code>'user'</code> (يعني admin أو editor)، مرتبين حسب <code>created_at</code> تصاعديًا (الأقدم الأول).</div>
    <div class="en">🇬🇧 In the <a href="../db-sandbox/index.php">Database Playground</a>: write one query that returns <code>name</code> and <code>email</code> from <code>users</code> for anyone whose <code>role</code> is not <code>'user'</code> (i.e. admin or editor), ordered by <code>created_at</code> ascending (oldest first).</div>
    <p class="ltr" style="color:var(--muted);font-size:0.85em">Verified working answer: <code>SELECT name, email FROM users WHERE role != 'user' ORDER BY created_at ASC</code> — returns Ahmed Hassan (admin, 2024-01-10) then Laila Mostafa (editor, 2024-02-20).</p>
</div>

<div class="exercise-box">
    <h3>✍️ تمرين إضافي / Extra Exercise</h3>
    <div class="ar">🇪🇬 اكتب استعلام يجيب كل التعليقات (<code>comments</code>) اللي اتكتبت على البوست رقم 4 أو رقم 6، مرتبة بـ <code>created_at</code> تنازليًا (الأحدث الأول). فكّر: هتحتاج <code>WHERE post_id = 4 OR post_id = 6</code> — أو ببساطة أكتر <code>WHERE post_id IN (4, 6)</code>.</div>
    <div class="en">🇬🇧 Write a query that returns every comment left on post 4 or post 6, ordered by <code>created_at</code> descending (newest first). Hint: you'll need <code>WHERE post_id = 4 OR post_id = 6</code> — or more simply, <code>WHERE post_id IN (4, 6)</code>.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <code>SELECT</code>/<code>WHERE</code>/<code>ORDER BY</code> هي أساس أي شاشة عرض بيانات هتبنيها — من قايمة منتجات لصفحة بروفايل. الدرس الجاي بيكمّل الصورة: إزاي تغيّر البيانات فعليًا بـ <code>INSERT</code>, <code>UPDATE</code>, <code>DELETE</code>. الدرس الجاي: <a href="sql-insert-update-delete.php">SQL: INSERT, UPDATE, DELETE</a>.</div>
    <div class="en">🇬🇧 <code>SELECT</code>/<code>WHERE</code>/<code>ORDER BY</code> are the foundation of any data screen you'll build — from a product list to a profile page. The next lesson completes the picture: actually changing data with <code>INSERT</code>, <code>UPDATE</code>, <code>DELETE</code>. Next lesson: <a href="sql-insert-update-delete.php">SQL: INSERT, UPDATE, DELETE</a>.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li><code>SELECT column1, column2 FROM table</code> — حدّد الأعمدة اللي محتاجها، أو <code>*</code> لكل الأعمدة.</li>
        <li><code>WHERE condition</code> — بيفلتر الصفوف؛ من غيره بترجع كل الصفوف.</li>
        <li><code>ORDER BY column ASC|DESC</code> — بيرتّب النتيجة النهائية؛ <code>LIMIT n</code> بياخد أول n صف بعد الترتيب.</li>
        <li>الثلاثة بيشتغلوا مع بعض في نفس الاستعلام، بالترتيب: <code>WHERE</code> يفلتر، <code>ORDER BY</code> يرتّب، <code>LIMIT</code> يقصّ.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="db-fundamentals.php">← المرحلة السابقة</a>
    <a href="sql-insert-update-delete.php">الدرس الجاي / Next: SQL: INSERT, UPDATE, DELETE →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
