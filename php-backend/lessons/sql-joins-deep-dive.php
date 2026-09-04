<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'sql-joins-deep-dive';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'SQL: JOIN بعمق — JOINs in Depth';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">Stage 7 · MySQL & SQL</span>
<h1>SQL: JOIN بعمق <span class="ltr">SQL: JOINs in Depth</span></h1>
<p class="subtitle">INNER JOIN مقابل LEFT JOIN بالفرق الفعلي في النتائج، مش بس التعريف. <span class="ltr">INNER JOIN vs LEFT JOIN with the actual difference in results, not just the definition.</span></p>

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
    <div class="ar">🇪🇬 تقدر تربط جدولين بـ <code>INNER JOIN</code> عشان تجيب صفوف ليها تطابق في الاتنين، وتفهم بالضبط إمتى <code>LEFT JOIN</code> بيرجّع صفوف زيادة (بـ <code>NULL</code>) إن الـ <code>INNER JOIN</code> كان هيرميها. مش هنكتفي بالتعريف — هنعمل سيناريو حقيقي يوضّح الفرق في عدد الصفوف والمحتوى.</div>
    <div class="en">🇬🇧 Connect two tables with <code>INNER JOIN</code> to get rows that match in both, and understand exactly when <code>LEFT JOIN</code> returns extra rows (with <code>NULL</code>) that an <code>INNER JOIN</code> would have dropped. We won't stop at the definition — we'll build a real scenario that shows the difference in row count and content.</div>
</div>

<h2 id="understand">🧠 1) INNER JOIN — بس المتطابق</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <code>INNER JOIN</code> بيرجّع صف بس لو فيه تطابق في الجدولين حسب شرط <code>ON</code>. لو مستخدم مالوش أي مقال، مش هيظهر في نتيجة <code>posts INNER JOIN users</code> أصلًا — مش هيتحذف من <code>users</code>، بس مش هيظهر في النتيجة دي تحديدًا.</div>
    <div class="en">🇬🇧 <code>INNER JOIN</code> returns a row only when both tables match on the <code>ON</code> condition. If a user has no posts at all, they won't appear in a <code>posts INNER JOIN users</code> result at all — they're not deleted from <code>users</code>, they simply don't show up in this particular result.</div>
</div>

<pre><code>&lt;?php
require __DIR__ . '/../db-sandbox/schema.php';
$pdo = build_sandbox_pdo();

$rows = $pdo->query("
    SELECT posts.title, users.name AS author
    FROM posts
    INNER JOIN users ON posts.user_id = users.id
    ORDER BY posts.id
")->fetchAll(PDO::FETCH_ASSOC);
foreach ($rows as $r) {
    echo "{$r['title']} — {$r['author']}" . PHP_EOL;
}
echo "Total rows: " . count($rows) . PHP_EOL;</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">Getting Started with PDO — Ahmed Hassan
Why Prepared Statements Matter — Ahmed Hassan
My First REST API — Sara Ali
Database Design 101 — Laila Mostafa
Debugging a Tricky Bug — Sara Ali
Understanding JOINs — Omar Khaled
Sessions vs Cookies — Youssef Adel
Indexing for Performance — Laila Mostafa
Total rows: 8</div>
<div class="bi-block">
    <div class="ar">🇪🇬 8 صفوف — واحد لكل مقال، لإن كل مقال في الـ Sandbox ليه <code>user_id</code> بيطابق مستخدم موجود فعلًا. لسه مفيش أي مستخدم "ضايع" من النتيجة، لإن كل الـ 5 مستخدمين عندهم مقال واحد على الأقل.</div>
    <div class="en">🇬🇧 8 rows — one per post, because every post in the sandbox has a <code>user_id</code> matching a real user. No user is "missing" from the result yet, because all 5 users have at least one post.</div>
</div>

<h2>2) الفرق الحقيقي: نضيف مستخدم من غير مقالات / The Real Difference: Adding a User With No Posts</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 عشان نشوف الفرق الفعلي، هنضيف مستخدم سادس اسمه "Nour Fathy" ومالوش أي مقال، وهنشغّل نفس المقارنة (<code>INNER JOIN</code> ضد <code>LEFT JOIN</code>) من ناحية <code>users</code> بدل <code>posts</code> — عشان نشوف تأثير المستخدم الجديد.</div>
    <div class="en">🇬🇧 To see the actual difference, we'll add a sixth user, "Nour Fathy", with zero posts, and run the same comparison (<code>INNER JOIN</code> vs <code>LEFT JOIN</code>) starting from <code>users</code> instead of <code>posts</code> — to see the new user's effect.</div>
</div>

<pre><code>&lt;?php
$pdo->exec("INSERT INTO users (id, name, email, role, created_at) VALUES (6, 'Nour Fathy', 'nour@example.com', 'user', '2024-04-05')");

echo "--- INNER JOIN (users -> posts) ---" . PHP_EOL;
$rows = $pdo->query("
    SELECT users.name, posts.title
    FROM users
    INNER JOIN posts ON posts.user_id = users.id
    ORDER BY users.id
")->fetchAll(PDO::FETCH_ASSOC);
foreach ($rows as $r) {
    echo "{$r['name']} -> {$r['title']}" . PHP_EOL;
}
echo "Row count (INNER JOIN): " . count($rows) . PHP_EOL;

echo PHP_EOL . "--- LEFT JOIN (users -> posts) ---" . PHP_EOL;
$rows = $pdo->query("
    SELECT users.name, posts.title
    FROM users
    LEFT JOIN posts ON posts.user_id = users.id
    ORDER BY users.id
")->fetchAll(PDO::FETCH_ASSOC);
foreach ($rows as $r) {
    echo "{$r['name']} -> " . ($r['title'] ?? 'NULL') . PHP_EOL;
}
echo "Row count (LEFT JOIN): " . count($rows) . PHP_EOL;</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">--- INNER JOIN (users -> posts) ---
Ahmed Hassan -> Getting Started with PDO
Ahmed Hassan -> Why Prepared Statements Matter
Sara Ali -> My First REST API
Sara Ali -> Debugging a Tricky Bug
Omar Khaled -> Understanding JOINs
Laila Mostafa -> Database Design 101
Laila Mostafa -> Indexing for Performance
Youssef Adel -> Sessions vs Cookies
Row count (INNER JOIN): 8

--- LEFT JOIN (users -> posts) ---
Ahmed Hassan -> Getting Started with PDO
Ahmed Hassan -> Why Prepared Statements Matter
Sara Ali -> Debugging a Tricky Bug
Sara Ali -> My First REST API
Omar Khaled -> Understanding JOINs
Laila Mostafa -> Database Design 101
Laila Mostafa -> Indexing for Performance
Youssef Adel -> Sessions vs Cookies
Nour Fathy -> NULL
Row count (LEFT JOIN): 9</div>

<div class="security-box">
    <h3>⚠️ ده بالظبط الفرق / This is exactly the difference</h3>
    <div class="ar">🇪🇬 <code>INNER JOIN</code> فضل عند 8 صفوف — "Nour Fathy" اختفى تمامًا من النتيجة لإن مالوش أي مقال يتطابق معاه. أما <code>LEFT JOIN</code> رجّع 9 صفوف — كل مستخدمي <code>users</code> (بما فيهم Nour) ظهروا، وعمود <code>posts.title</code> بقى <code>NULL</code> للمستخدم اللي مالوش مقالات. <code>LEFT JOIN</code> بيحافظ على كل صفوف الجدول الشمال (<code>users</code> هنا) حتى لو مفيش تطابق في الجدول اليمين.</div>
    <div class="en">🇬🇧 <code>INNER JOIN</code> stayed at 8 rows — "Nour Fathy" disappeared entirely from the result because no post matches him. <code>LEFT JOIN</code>, on the other hand, returned 9 rows — every single user in <code>users</code> (Nour included) showed up, with <code>posts.title</code> becoming <code>NULL</code> for the user with no posts. <code>LEFT JOIN</code> preserves every row of the left table (<code>users</code> here) even when there's no match on the right.</div>
</div>

<h2 id="practice">💻 جرّبها بنفسك / Try It Yourself</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 المحرر تحت فيه نفس السيناريو. جرّب تشيل <code>LEFT</code> وسيبها <code>JOIN</code> عادي (اللي هو <code>INNER JOIN</code> ضمنيًا) وشوف "Nour Fathy" بيختفي تاني.</div>
    <div class="en">🇬🇧 The editor below has the same scenario. Try removing <code>LEFT</code> and leaving plain <code>JOIN</code> (which is implicitly an <code>INNER JOIN</code>) and watch "Nour Fathy" disappear again.</div>
</div>

<div class="mini-editor-wrap">
    <textarea spellcheck="false">&lt;?php
require __DIR__ . '/../db-sandbox/schema.php';
$pdo = build_sandbox_pdo();
$pdo->exec("INSERT INTO users (id, name, email, role, created_at) VALUES (6, 'Nour Fathy', 'nour@example.com', 'user', '2024-04-05')");

$rows = $pdo->query("
    SELECT users.name, posts.title
    FROM users
    LEFT JOIN posts ON posts.user_id = users.id
    ORDER BY users.id
")->fetchAll(PDO::FETCH_ASSOC);
foreach ($rows as $r) {
    echo "{$r['name']} -> " . ($r['title'] ?? 'NULL') . PHP_EOL;
}
echo "Row count: " . count($rows) . PHP_EOL;

// جرّب تشيل LEFT وسيبها JOIN بس، وشوف Nour Fathy بيختفي من النتيجة</textarea>
    <div class="mini-toolbar">
        <button class="mini-run-btn">▶ شغّل / Run</button>
        <span class="mini-status"></span>
    </div>
    <div class="output-box">— لسه متشغلش / not run yet —</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="eight">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">بعد إضافة Nour Fathy (مالوش مقالات)، كام صف رجّع <code>INNER JOIN</code>؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">After adding Nour Fathy (no posts), how many rows did <code>INNER JOIN</code> return?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="nine"> 9</label>
        <label><input type="radio" name="q1" value="eight"> 8</label>
        <label><input type="radio" name="q1" value="six"> 6</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="nine">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">وكام صف رجّع <code>LEFT JOIN</code> في نفس الحالة؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">And how many rows did <code>LEFT JOIN</code> return in the same case?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="eight"> 8</label>
        <label><input type="radio" name="q2" value="nine"> 9</label>
        <label><input type="radio" name="q2" value="five"> 5</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="null">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">في نتيجة <code>LEFT JOIN</code>، عمود <code>posts.title</code> لصف Nour Fathy كان إيه؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">In the <code>LEFT JOIN</code> result, what was <code>posts.title</code> for Nour Fathy's row?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="empty"> نص فاضي ""</label>
        <label><input type="radio" name="q3" value="null"> NULL</label>
        <label><input type="radio" name="q3" value="error"> خطأ — الاستعلام بيفشل</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="left">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question"><code>LEFT JOIN</code> بيحافظ على كل صفوف أنهي جدول، حتى لو مفيش تطابق؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Which table's rows does <code>LEFT JOIN</code> always preserve, even without a match?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="left"> الجدول الشمال (اللي بعد FROM)</label>
        <label><input type="radio" name="q4" value="right"> الجدول اليمين (اللي بعد JOIN)</label>
        <label><input type="radio" name="q4" value="both"> الاتنين بالتساوي زي INNER JOIN</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ مقالات من غير تعليقات / Posts With No Comments</h3>
    <div class="ar">🇪🇬 في <a href="../db-sandbox/index.php">Database Playground</a>: استخدم <code>LEFT JOIN</code> بين <code>posts</code> و<code>comments</code>، وبعدين فلتر بـ <code>WHERE comments.id IS NULL</code> عشان تجيب المقالات اللي <b>مالهاش أي تعليق خالص</b> — تقنية مشهورة جدًا اسمها "Anti-Join" أو "Find the Missing Rows".</div>
    <div class="en">🇬🇧 In the <a href="../db-sandbox/index.php">Database Playground</a>: use a <code>LEFT JOIN</code> between <code>posts</code> and <code>comments</code>, then filter with <code>WHERE comments.id IS NULL</code> to get posts with <b>zero comments at all</b> — a well-known pattern called an "Anti-Join" or "Find the Missing Rows".</div>
    <p class="ltr" style="color:var(--muted);font-size:0.85em">Verified working query: <code>SELECT posts.title FROM posts LEFT JOIN comments ON comments.post_id = posts.id WHERE comments.id IS NULL</code> — returns an empty array in the sandbox, because every one of the 8 seeded posts already has at least one comment. That empty result is itself the proof the technique works: try deleting a post's comments first (like the DELETE example from the INSERT/UPDATE/DELETE lesson) and re-run this query to see a real post appear.</p>
</div>

<div class="exercise-box">
    <h3>✍️ تمرين إضافي / Extra Exercise</h3>
    <div class="ar">🇪🇬 اكتب <code>INNER JOIN</code> بين 3 جداول: <code>comments</code>, <code>posts</code>, <code>users</code> — يجيب لكل تعليق: نص التعليق (<code>comments.body</code>)، عنوان المقال (<code>posts.title</code>)، واسم صاحب التعليق (<code>users.name</code>، عن طريق <code>comments.user_id</code>).</div>
    <div class="en">🇬🇧 Write an <code>INNER JOIN</code> across 3 tables: <code>comments</code>, <code>posts</code>, <code>users</code> — returning, for each comment: the comment text (<code>comments.body</code>), the post's title (<code>posts.title</code>), and the commenter's name (<code>users.name</code>, via <code>comments.user_id</code>).</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 كل الاستعلامات اللي كتبناها لحد دلوقتي بتستخدم <code>$pdo->query()</code> مباشرة على نصوص ثابتة — لكن أي قيمة جاية من مستخدم (زي إيميل بحث) لازم تتبعت عن طريق Prepared Statements، مش تتحط جوه النص. الدرس الجاي بيوريك ليه ده مهم وإزاي تستخدمه صح. الدرس الجاي: <a href="pdo-prepared-statements.php">PDO &amp; Prepared Statements</a>.</div>
    <div class="en">🇬🇧 Every query we've written so far used <code>$pdo->query()</code> directly on fixed strings — but any value coming from a user (like a search email) must be passed via Prepared Statements, never embedded in the string. The next lesson shows you why that matters and how to use it correctly. Next lesson: <a href="pdo-prepared-statements.php">PDO &amp; Prepared Statements</a>.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li><code>INNER JOIN</code> — بيرجّع بس الصفوف اللي فيها تطابق في الجدولين حسب <code>ON</code>.</li>
        <li><code>LEFT JOIN</code> — بيحافظ على كل صفوف الجدول الشمال، وبيحط <code>NULL</code> لأعمدة الجدول اليمين لو مفيش تطابق.</li>
        <li>في مثالنا: 8 صفوف INNER JOIN مقابل 9 صفوف LEFT JOIN — الفرق هو Nour Fathy، المستخدم اللي مالوش مقالات.</li>
        <li>تقنية <code>LEFT JOIN ... WHERE right.col IS NULL</code> بتجيب "الصفوف الناقصة" — زي مقالات مالهاش تعليقات.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="sql-groupby-having.php">← المرحلة السابقة</a>
    <a href="pdo-prepared-statements.php">الدرس الجاي / Next: PDO &amp; Prepared Statements →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
