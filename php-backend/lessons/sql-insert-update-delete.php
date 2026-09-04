<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'sql-insert-update-delete';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'SQL: INSERT, UPDATE, DELETE';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">Stage 7 · MySQL & SQL</span>
<h1>SQL: INSERT, UPDATE, DELETE</h1>
<p class="subtitle">تعديل البيانات فعليًا — وليه WHERE في UPDATE/DELETE أهم سطر هتكتبه في حياتك. <span class="ltr">Actually changing data — and why the WHERE in UPDATE/DELETE is the most important line you'll ever write.</span></p>

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
    <div class="ar">🇪🇬 تقدر تضيف صف جديد بـ <code>INSERT</code>، تعدّل صف موجود بـ <code>UPDATE</code>، وتحذف صف بـ <code>DELETE</code> — وتفهم بعمق ليه نسيان <code>WHERE</code> في آخر عمليتين ممكن يمسح أو يعدّل جدول كامل في لحظة واحدة، من غير أي طريقة للرجوع لو مفيش Backup.</div>
    <div class="en">🇬🇧 Add a new row with <code>INSERT</code>, modify an existing row with <code>UPDATE</code>, and remove a row with <code>DELETE</code> — and deeply understand why forgetting <code>WHERE</code> on the last two can wipe or rewrite an entire table in one instant, with no way back if there's no backup.</div>
</div>

<h2 id="understand">🧠 1) INSERT — إضافة صف جديد</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <code>INSERT INTO table (col1, col2, ...) VALUES (val1, val2, ...)</code> بيضيف صف جديد. لو الجدول فيه Primary Key بيزيد أوتوماتيك (زي <code>posts.id</code>)، مش بتحدده — قاعدة البيانات بترجّعه لك بعد الإدراج (في PHP: <code>$pdo->lastInsertId()</code>).</div>
    <div class="en">🇬🇧 <code>INSERT INTO table (col1, col2, ...) VALUES (val1, val2, ...)</code> adds a new row. If the table has an auto-incrementing Primary Key (like <code>posts.id</code>), you don't set it — the database hands it back to you after inserting (in PHP: <code>$pdo->lastInsertId()</code>).</div>
</div>

<pre><code>&lt;?php
require __DIR__ . '/../db-sandbox/schema.php';
$pdo = build_sandbox_pdo();

$stmt = $pdo->prepare("INSERT INTO posts (user_id, title, body, views, created_at) VALUES (?, ?, ?, ?, ?)");
$stmt->execute([3, 'Learning SQL the Real Way', 'Running every example against a real sandbox instead of just reading.', 0, '2024-04-01']);
echo "New post id: " . $pdo->lastInsertId() . PHP_EOL;

$row = $pdo->query("SELECT * FROM posts WHERE id = " . $pdo->lastInsertId())->fetch(PDO::FETCH_ASSOC);
print_r($row);</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">New post id: 9
Array
(
    [id] => 9
    [user_id] => 3
    [title] => Learning SQL the Real Way
    [body] => Running every example against a real sandbox instead of just reading.
    [views] => 0
    [created_at] => 2024-04-01
)</div>
<div class="bi-block">
    <div class="ar">🇪🇬 الـ Sandbox كان فيه 8 مقالات بالـ <code>id</code> من 1 لـ 8، فالمقال الجديد أخد <code>id = 9</code> أوتوماتيك — من غير ما نحدده إحنا.</div>
    <div class="en">🇬🇧 The sandbox already had 8 posts with <code>id</code> 1 through 8, so the new post automatically got <code>id = 9</code> — we never set it ourselves.</div>
</div>

<h2>2) UPDATE — تعديل صف موجود</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <code>UPDATE table SET column = value WHERE condition</code> بيعدّل بس الصفوف اللي بتحقق الشرط. <code>views = views + 1</code> مثال شائع: بتزوّد القيمة الحالية بواحد بدل ما تكتبها يدوي.</div>
    <div class="en">🇬🇧 <code>UPDATE table SET column = value WHERE condition</code> modifies only the rows matching the condition. <code>views = views + 1</code> is a common pattern: increment the current value instead of writing it by hand.</div>
</div>

<pre><code>&lt;?php
// قبل التعديل
$before = $pdo->query("SELECT id, title, views FROM posts WHERE id = 3")->fetch(PDO::FETCH_ASSOC);
echo "Before: "; print_r($before);

$stmt = $pdo->prepare("UPDATE posts SET views = views + 1 WHERE id = ?");
$stmt->execute([3]);
echo "Rows updated: " . $stmt->rowCount() . PHP_EOL;

// بعد التعديل
$after = $pdo->query("SELECT id, title, views FROM posts WHERE id = 3")->fetch(PDO::FETCH_ASSOC);
echo "After: "; print_r($after);</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">Before: Array
(
    [id] => 3
    [title] => My First REST API
    [views] => 85
)
Rows updated: 1
After: Array
(
    [id] => 3
    [title] => My First REST API
    [views] => 86
)</div>
<div class="bi-block">
    <div class="ar">🇪🇬 <code>views</code> اتغيّرت من 85 لـ 86 بالظبط — <code>WHERE id = 3</code> ضمن إن التعديل يمس صف واحد بس، مش أي صف تاني.</div>
    <div class="en">🇬🇧 <code>views</code> went from exactly 85 to 86 — <code>WHERE id = 3</code> guaranteed the update touched exactly one row, and no other.</div>
</div>

<h2>3) DELETE — حذف صف</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <code>DELETE FROM table WHERE condition</code> بيمسح الصفوف اللي بتحقق الشرط بشكل نهائي. زي <code>UPDATE</code>، لازم <code>WHERE</code> يكون دقيق عشان تمسح اللي محتاج تمسحه بالظبط.</div>
    <div class="en">🇬🇧 <code>DELETE FROM table WHERE condition</code> permanently removes the matching rows. Like <code>UPDATE</code>, the <code>WHERE</code> needs to be precise so it deletes exactly what you meant to.</div>
</div>

<pre><code>&lt;?php
$before = $pdo->query("SELECT * FROM comments WHERE id = 5")->fetch(PDO::FETCH_ASSOC);
echo "Before delete: "; print_r($before);

$stmt = $pdo->prepare("DELETE FROM comments WHERE id = ?");
$stmt->execute([5]);
echo "Rows deleted: " . $stmt->rowCount() . PHP_EOL;

$after = $pdo->query("SELECT * FROM comments WHERE id = 5")->fetch(PDO::FETCH_ASSOC);
var_dump($after);</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">Before delete: Array
(
    [id] => 5
    [post_id] => 4
    [user_id] => 2
    [body] => Normalization examples were super clear.
    [created_at] => 2024-02-23
)
Rows deleted: 1
bool(false)</div>
<div class="bi-block">
    <div class="ar">🇪🇬 <code>fetch()</code> رجّع <code>false</code> بعد الحذف — يعني فعلاً مفيش صف بـ <code>id = 5</code> جوه <code>comments</code> ولا حتى واحد. التعليق اتشال نهائيًا.</div>
    <div class="en">🇬🇧 <code>fetch()</code> returned <code>false</code> after the delete — meaning there really is no row with <code>id = 5</code> in <code>comments</code> anymore, not even one. The comment is permanently gone.</div>
</div>

<h2 id="practice">💻 الخطر الحقيقي: UPDATE/DELETE من غير WHERE / The Real Danger: UPDATE/DELETE Without WHERE</h2>
<div class="security-box">
    <h3>⚠️ لو نسيت WHERE في UPDATE/DELETE</h3>
    <div class="ar">🇪🇬 <code>WHERE</code> مش اختياري نفسيًا — هو اللي بيحدد "الصفوف دي بس". لو نسيته في <code>UPDATE</code> أو <code>DELETE</code>، الجملة بتتطبق على <b>كل صف في الجدول</b> من غير استثناء. الديمو التالي شغّل <code>UPDATE posts SET views = 0</code> من غير <code>WHERE</code> على نسخة منعزلة تمامًا من الـ Sandbox (عشان محدش يتأثر غير المثال ده)، وده اللي حصل فعليًا.</div>
    <div class="en">🇬🇧 <code>WHERE</code> isn't cosmetically optional — it's what defines "these rows only". Forget it on an <code>UPDATE</code> or <code>DELETE</code> and the statement applies to <b>every single row in the table</b>, no exceptions. The demo below actually ran <code>UPDATE posts SET views = 0</code> with no <code>WHERE</code> against a fully isolated copy of the sandbox (so nothing else is affected), and this is exactly what happened.</div>
</div>

<pre><code>&lt;?php
// نسخة منعزلة تمامًا — build_sandbox_pdo() جديدة، عشان الديمو الخطير ده منعزل بالكامل
$pdo2 = build_sandbox_pdo();

echo "-- Before: views لكل الـ 8 مقالات --" . PHP_EOL;
print_r($pdo2->query("SELECT id, title, views FROM posts ORDER BY id")->fetchAll(PDO::FETCH_ASSOC));

// ⚠️ نسينا WHERE هنا عمدًا عشان نثبت الخطر
$affected = $pdo2->exec("UPDATE posts SET views = 0");
echo "Rows affected: $affected" . PHP_EOL;

echo "-- After: كل الـ views بقت 0 --" . PHP_EOL;
print_r($pdo2->query("SELECT id, title, views FROM posts ORDER BY id")->fetchAll(PDO::FETCH_ASSOC));</code></pre>
<h3>الناتج الفعلي (منعزل تمامًا عن أي مثال تاني في الصفحة دي) / Actual output (fully isolated from every other example on this page)</h3>
<div class="output-box">-- Before --
Array
(
    [0] => Array ( [id] => 1 [title] => Getting Started with PDO [views] => 120 )
    [1] => Array ( [id] => 2 [title] => Why Prepared Statements Matter [views] => 340 )
    [2] => Array ( [id] => 3 [title] => My First REST API [views] => 85 )
    [3] => Array ( [id] => 4 [title] => Database Design 101 [views] => 210 )
    [4] => Array ( [id] => 5 [title] => Debugging a Tricky Bug [views] => 60 )
    [5] => Array ( [id] => 6 [title] => Understanding JOINs [views] => 175 )
    [6] => Array ( [id] => 7 [title] => Sessions vs Cookies [views] => 95 )
    [7] => Array ( [id] => 8 [title] => Indexing for Performance [views] => 300 )
)
Rows affected: 8

-- After --
Array
(
    [0] => Array ( [id] => 1 [title] => Getting Started with PDO [views] => 0 )
    [1] => Array ( [id] => 2 [title] => Why Prepared Statements Matter [views] => 0 )
    [2] => Array ( [id] => 3 [title] => My First REST API [views] => 0 )
    [3] => Array ( [id] => 4 [title] => Database Design 101 [views] => 0 )
    [4] => Array ( [id] => 5 [title] => Debugging a Tricky Bug [views] => 0 )
    [5] => Array ( [id] => 6 [title] => Understanding JOINs [views] => 0 )
    [6] => Array ( [id] => 7 [title] => Sessions vs Cookies [views] => 0 )
    [7] => Array ( [id] => 8 [title] => Indexing for Performance [views] => 0 )
)</div>
<div class="security-box">
    <h3>⚠️ 8 صفوف اتأثرت بجملة واحدة / 8 rows destroyed by one statement</h3>
    <div class="ar">🇪🇬 <code>Rows affected: 8</code> — كل مقال في الجدول، مش واحد بس. لو ده كان جدول <code>orders</code> أو <code>accounts</code> على سيرفر حقيقي بدل الـ Sandbox، كنت مسحت أو صفّرت بيانات حقيقية لكل عميل، من غير أي طريقة ترجع بيها من غير Backup. القاعدة الذهبية: اكتب الـ <code>SELECT</code> بنفس الشرط الأول، شوف إنه بيرجّع الصفوف الصح، وبعدين حوّله لـ <code>UPDATE</code>/<code>DELETE</code> — متكتبش <code>UPDATE</code>/<code>DELETE</code> مباشرة من غير ما تتأكد.</div>
    <div class="en">🇬🇧 <code>Rows affected: 8</code> — every post in the table, not just one. If this had been an <code>orders</code> or <code>accounts</code> table on a real server instead of the sandbox, you'd have wiped or zeroed real data for every customer, with no way back without a backup. The golden rule: write the <code>SELECT</code> with the same condition first, confirm it returns exactly the rows you mean, then turn it into the <code>UPDATE</code>/<code>DELETE</code> — never write <code>UPDATE</code>/<code>DELETE</code> directly without checking first.</div>
</div>

<div class="bi-block">
    <div class="ar">🇪🇬 جرّب بنفسك في المحرر تحت: شغّل نفس الديمو، وبعدين قارن لما تضيف <code>WHERE id = 1</code> — هتلاقي إن مقال واحد بس هو اللي بيتأثر.</div>
    <div class="en">🇬🇧 Try it yourself in the editor below: run the same demo, then compare adding <code>WHERE id = 1</code> — you'll see only one post gets affected.</div>
</div>

<div class="mini-editor-wrap">
    <textarea spellcheck="false">&lt;?php
require __DIR__ . '/../db-sandbox/schema.php';
$pdo = build_sandbox_pdo();

echo "-- Safe version: WHERE id = 1 --" . PHP_EOL;
$affected = $pdo->exec("UPDATE posts SET views = 0 WHERE id = 1");
echo "Rows affected: $affected" . PHP_EOL;
print_r($pdo->query("SELECT id, title, views FROM posts ORDER BY id")->fetchAll(PDO::FETCH_ASSOC));

// جرّب تشيل "WHERE id = 1" من السطر فوق وشوف الفرق</textarea>
    <div class="mini-toolbar">
        <button class="mini-run-btn">▶ شغّل / Run</button>
        <span class="mini-status"></span>
    </div>
    <div class="output-box">— لسه متشغلش / not run yet —</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="nine">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">في مثال INSERT، إيه الـ <code>id</code> اللي أخده المقال الجديد؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">In the INSERT example, what <code>id</code> did the new post get?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="one"> 1</label>
        <label><input type="radio" name="q1" value="nine"> 9</label>
        <label><input type="radio" name="q1" value="zero"> 0</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="86">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">بعد <code>UPDATE posts SET views = views + 1 WHERE id = 3</code>، إيه قيمة <code>views</code> النهائية (كانت 85)؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">After <code>UPDATE posts SET views = views + 1 WHERE id = 3</code>, what's the final <code>views</code> value (it was 85)?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="85"> 85 (متغيرتش)</label>
        <label><input type="radio" name="q2" value="86"> 86</label>
        <label><input type="radio" name="q2" value="0"> 0</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="false">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">بعد <code>DELETE FROM comments WHERE id = 5</code>، إيه اللي رجّعه <code>fetch()</code> لما دورنا على نفس التعليق؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">After <code>DELETE FROM comments WHERE id = 5</code>, what did <code>fetch()</code> return when we looked for that same comment?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="array"> Array فيه بيانات التعليق</label>
        <label><input type="radio" name="q3" value="false"> false</label>
        <label><input type="radio" name="q3" value="error"> خطأ Exception</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="eight">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">في ديمو الخطر (<code>UPDATE posts SET views = 0</code> من غير WHERE)، كام صف اتصفّر فعليًا؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">In the danger demo (<code>UPDATE posts SET views = 0</code> with no WHERE), how many rows actually got zeroed?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="one"> 1 — بس المقصود</label>
        <label><input type="radio" name="q4" value="eight"> 8 — كل المقالات في الجدول</label>
        <label><input type="radio" name="q4" value="zero"> 0 — SQLite بترفض تنفيذها</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ CRUD كامل على جدول جديد / Full CRUD on a New Table</h3>
    <div class="ar">🇪🇬 في <a href="../db-sandbox/index.php">Database Playground</a>: اعمل جدول <code>tasks</code> (<code>id</code>, <code>title</code>, <code>is_done</code>)، ضيف 3 مهام بـ <code>INSERT</code>، علّم واحدة "خلصت" بـ <code>UPDATE ... SET is_done = 1 WHERE id = ?</code>، وامسح واحدة بـ <code>DELETE ... WHERE id = ?</code>. بعد كل خطوة، اعمل <code>SELECT</code> تتأكد من النتيجة فعليًا بعينك، مش تفترضها.</div>
    <div class="en">🇬🇧 In the <a href="../db-sandbox/index.php">Database Playground</a>: create a <code>tasks</code> table (<code>id</code>, <code>title</code>, <code>is_done</code>), insert 3 tasks with <code>INSERT</code>, mark one done with <code>UPDATE ... SET is_done = 1 WHERE id = ?</code>, and remove one with <code>DELETE ... WHERE id = ?</code>. After each step, run a <code>SELECT</code> to actually verify the result with your own eyes, not assume it.</div>
</div>

<div class="exercise-box">
    <h3>✍️ تمرين إضافي / Extra Exercise</h3>
    <div class="ar">🇪🇬 قبل ما تكتب أي <code>DELETE</code> على جدول حقيقي، اتعوّد على العادة دي: اكتب <code>SELECT * FROM table WHERE <شرطك>;</code> الأول، شوف عدد الصفوف اللي هتتأثر، وبعدين وبعدين بس حوّل <code>SELECT *</code> لـ <code>DELETE</code>. جرّب الخطوة دي على جدول <code>comments</code> بشرط <code>WHERE user_id = 1</code> — كام تعليق هيتأثر؟</div>
    <div class="en">🇬🇧 Before writing any <code>DELETE</code> against a real table, build this habit: write <code>SELECT * FROM table WHERE <your condition>;</code> first, see how many rows would be affected, and only then turn <code>SELECT *</code> into <code>DELETE</code>. Try this on the <code>comments</code> table with <code>WHERE user_id = 1</code> — how many comments would be affected?</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 كل عملية Create/Update/Delete هتعملها في مشروع Task Manager (الـ Capstone) هتستخدم بالظبط نفس الأنماط اللي اتعلمتها هنا — بما فيها عادة "اتأكد بـ SELECT الأول". الدرس الجاي هيوريك إزاي تجمّع صفوف تشابهت لإحصائيات مفيدة. الدرس الجاي: <a href="sql-groupby-having.php">SQL: GROUP BY &amp; HAVING</a>.</div>
    <div class="en">🇬🇧 Every Create/Update/Delete you'll do in the Capstone Task Manager uses exactly the patterns you learned here — including the "verify with SELECT first" habit. The next lesson shows you how to group similar rows into useful statistics. Next lesson: <a href="sql-groupby-having.php">SQL: GROUP BY &amp; HAVING</a>.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li><code>INSERT INTO table (cols) VALUES (vals)</code> — بيضيف صف؛ Primary Key اللي بيزيد أوتوماتيك بترجعه <code>lastInsertId()</code>.</li>
        <li><code>UPDATE table SET col = val WHERE condition</code> — بيعدّل بس الصفوف المطابقة للشرط.</li>
        <li><code>DELETE FROM table WHERE condition</code> — بيمسح بس الصفوف المطابقة، بشكل نهائي.</li>
        <li>نسيان <code>WHERE</code> في UPDATE/DELETE = تنفيذها على كل صف في الجدول — تحقق دايمًا بـ SELECT بنفس الشرط الأول.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="sql-select-where-orderby.php">← المرحلة السابقة</a>
    <a href="sql-groupby-having.php">الدرس الجاي / Next: SQL: GROUP BY &amp; HAVING →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
