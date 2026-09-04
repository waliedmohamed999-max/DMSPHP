<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'db-schema-design-lab';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'معمل: صمّم Schema بلوج — Lab: Design a Blog Schema';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">Stage 8 · Database Design</span>
<h1>🗄️ معمل: صمّم Schema بلوج <span class="ltr">Lab: Design a Blog Schema</span></h1>
<p class="subtitle">تصمّم Users/Posts/Comments/Categories بنفسك، وتختبر الـ Schema فعليًا في الـ SQL Playground. <span class="ltr">Design Users/Posts/Comments/Categories yourself, and test the schema for real in the SQL Playground.</span></p>

<div class="step-tracker">
    <a href="#read">📖 Read</a>
    <a href="#understand">🧠 Understand</a>
    <a href="#lab">🗄️ Database Lab</a>
    <a href="#quiz">🧠 Quiz</a>
    <a href="#challenge">🛠️ Challenge</a>
    <a href="#project">🚀 Project</a>
</div>

<h2 id="read">📖 الهدف / Goal</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 ده معمل تطبيقي — مفيش شرح جديد، بس تجميع كل حاجة اتعلمتها في درسي العلاقات والتطبيع. المطلوب: تاخد Schema الـ Playground الحالية (<code>users</code>, <code>posts</code>, <code>comments</code>) وتوسّعها بنفسك بإضافة <code>categories</code>، وتربطها بـ <code>posts</code> بعلاقة One-to-Many صح، وتختبر تصميمك فعليًا بتشغيل SQL حقيقي.</div>
    <div class="en">🇬🇧 This is a hands-on lab — no new theory, just applying everything from the Relationships and Normalization lessons. The task: take the current Playground schema (<code>users</code>, <code>posts</code>, <code>comments</code>) and extend it yourself by adding <code>categories</code>, connecting it to <code>posts</code> with a correct One-to-Many relationship, and testing your design by actually running real SQL.</div>
</div>

<h2 id="understand">🧠 المتطلبات / The Requirements</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 المتطلبات بالظبط:<br>
    • كل بوست لازم يكون منتمي لـ <b>Category واحدة بس</b> (زي "Backend", "Databases", "Security").<br>
    • كل Category ليها <b>اسم</b> (<code>name</code>) لازم يكون فريد (<code>UNIQUE</code>).<br>
    • بوست ممكن (اختياريًا) ميكونش له Category لسه — يعني مش لازم يكون <code>NOT NULL</code>.<br>
    • كل حاجة تانية (<code>users</code>, <code>posts</code>, <code>comments</code>) زي ما هي، متعرفها فعلًا من الدرسين اللي فاتوا.<br>
    فكّر: العلاقة بين <code>categories</code> و<code>posts</code> إيه نوعها؟ لو رجّعت لدرس العلاقات، هتلاقيها نفس شكل <code>users</code>/<code>posts</code> بالظبط.</div>
    <div class="en">🇬🇧 The exact requirements:<br>
    • Every post must belong to <b>exactly one category</b> (like "Backend", "Databases", "Security").<br>
    • Every category has a <b>name</b> (<code>name</code>) that must be unique (<code>UNIQUE</code>).<br>
    • A post may (optionally) have no category yet — so it should not be <code>NOT NULL</code>.<br>
    • Everything else (<code>users</code>, <code>posts</code>, <code>comments</code>) stays as-is — you already know it from the last two lessons.<br>
    Think: what kind of relationship is <code>categories</code> to <code>posts</code>? Going back to the relationships lesson, you'll find it's exactly the same shape as <code>users</code>/<code>posts</code>.</div>
</div>

<h2 id="lab">🗄️ معمل قواعد البيانات / Database Lab</h2>
<div class="db-lab">
    <h3>🗄️ صمّم بنفسك / Design It Yourself</h3>
    <div class="ar">🇪🇬 قبل ما تشوف أي حل، جرّب تكتب بنفسك:<br>
    1) جملة <code>CREATE TABLE categories</code> — فيها <code>id</code> (Primary Key) و<code>name</code> (نص، فريد، مش فاضي).<br>
    2) جملة <code>ALTER TABLE posts ADD COLUMN</code> تضيف عمود <code>category_id</code> لجدول <code>posts</code> الموجود بالفعل، يشاور على <code>categories(id)</code>.<br>
    استخدم الـ SQL Playground تحت — الـ Schema بتاعته فيها <code>users</code>/<code>posts</code>/<code>comments</code> جاهزين، ومعزولة تمامًا وبترجع لأصلها مع كل مرة تفتح الصفحة، فمفيش خطر إنك "تكسرها". لاحظ: الـ Playground بينفّذ أول جملة SQL بس في كل ضغطة تشغيل — يعني لازم تشغّل <code>CREATE TABLE</code> لوحدها، وبعدين <code>ALTER TABLE</code> لوحدها في تشغيلة تانية.</div>
    <div class="en">🇬🇧 Before looking at any solution, try writing these yourself:<br>
    1) A <code>CREATE TABLE categories</code> statement — with an <code>id</code> (Primary Key) and a <code>name</code> (text, unique, not empty).<br>
    2) An <code>ALTER TABLE posts ADD COLUMN</code> statement that adds a <code>category_id</code> column to the existing <code>posts</code> table, pointing at <code>categories(id)</code>.<br>
    Use the SQL Playground below — its schema already has <code>users</code>/<code>posts</code>/<code>comments</code> ready to go, and it's fully isolated, resetting fresh every time you load the page, so there's zero risk of "breaking" it. Note: the Playground only executes the first SQL statement per Run click — so run <code>CREATE TABLE</code> on its own, then <code>ALTER TABLE</code> on its own in a separate run.</div>
</div>

<div class="sql-playground">
    <textarea spellcheck="false" rows="4">-- This sandbox already has: users, posts, comments (see the schema note below)
-- Your task: replace this comment with a CREATE TABLE categories statement, run it,
-- then (in a separate run) an ALTER TABLE posts ADD COLUMN category_id statement.</textarea>
    <div>
        <button class="sql-run-btn">▶ نفّذ / Run Query</button>
        <span class="sql-status"></span>
    </div>
    <div class="sql-result-wrap"></div>
</div>

<div class="sql-schema-box">users     (id, name, email, role, created_at)
posts     (id, user_id, title, body, views, created_at)
comments  (id, post_id, user_id, body, created_at)</div>

<p class="ltr" style="color:var(--muted);font-size:0.9em">The full playground (more room to work, more ideas to try): <a href="../db-sandbox/index.php">../db-sandbox/index.php</a></p>

<div class="db-lab">
    <h3>✅ تحقق من نفسك بعد المحاولة / Verify Yourself After Trying</h3>
    <div class="ar">🇪🇬 جرّبت بنفسك؟ لحل مرجعي واحد (مش الوحيد الصح) اتّجرب فعليًا وشغال 100% على نفس الـ Schema، شوف الكود والناتج تحت.</div>
    <div class="en">🇬🇧 Tried it yourself? Here's one reference solution (not the only correct one) that was actually run and works 100% against the same schema — see the code and output below.</div>
</div>

<pre><code>&lt;?php
require __DIR__ . '/../db-sandbox/schema.php';
$pdo = build_sandbox_pdo();

$pdo-&gt;exec('CREATE TABLE categories (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT NOT NULL UNIQUE
)');
$pdo-&gt;exec('ALTER TABLE posts ADD COLUMN category_id INTEGER REFERENCES categories(id)');

$catStmt = $pdo-&gt;prepare('INSERT INTO categories (id, name) VALUES (?, ?)');
foreach ([[1, 'Backend'], [2, 'Databases'], [3, 'Security']] as $c) {
    $catStmt-&gt;execute($c);
}

$pdo-&gt;exec('UPDATE posts SET category_id = 2 WHERE id IN (4)');
$pdo-&gt;exec('UPDATE posts SET category_id = 1 WHERE id IN (1, 3, 5, 7, 8)');
$pdo-&gt;exec('UPDATE posts SET category_id = 3 WHERE id IN (2)');
// post id 6 ("Understanding JOINs") stays uncategorized on purpose — category_id is nullable

$rows = $pdo-&gt;query('
    SELECT posts.title, categories.name AS category
    FROM posts
    LEFT JOIN categories ON categories.id = posts.category_id
    ORDER BY posts.id
')-&gt;fetchAll(PDO::FETCH_ASSOC);
foreach ($rows as $row) {
    echo "{$row['title']} -&gt; " . ($row['category'] ?? '(uncategorized)') . PHP_EOL;
}</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">--- posts joined with their category (LEFT JOIN so uncategorized posts still show) ---
Getting Started with PDO -> Backend
Why Prepared Statements Matter -> Security
My First REST API -> Backend
Database Design 101 -> Databases
Debugging a Tricky Bug -> Backend
Understanding JOINs -> (uncategorized)
Sessions vs Cookies -> Backend
Indexing for Performance -> Backend

--- count of posts per category ---
Backend: 5 post(s)
Databases: 1 post(s)
Security: 1 post(s)</div>

<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ استخدام <code>LEFT JOIN</code> مش <code>JOIN</code> عادي: لو استخدمت <code>JOIN</code>، بوست "Understanding JOINs" (اللي مالوش Category) كان هيختفي تمامًا من النتيجة بدل ما يظهر بـ "(uncategorized)". ده بالظبط سبب خلي <code>category_id</code> قابل يكون NULL في المتطلبات فوق.</div>
    <div class="en">🇬🇧 Notice the use of <code>LEFT JOIN</code> instead of a plain <code>JOIN</code>: with a plain <code>JOIN</code>, the "Understanding JOINs" post (which has no category) would disappear from the result entirely instead of showing as "(uncategorized)". That's exactly why the requirements above allow <code>category_id</code> to be nullable.</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="onetomany">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">علاقة <code>categories</code> بـ <code>posts</code> إيه نوعها؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What kind of relationship is <code>categories</code> to <code>posts</code>?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="onetoone"> One-to-One</label>
        <label><input type="radio" name="q1" value="onetomany"> One-to-Many (زي <code>users</code>/<code>posts</code> بالظبط)</label>
        <label><input type="radio" name="q1" value="manytomany"> Many-to-Many، محتاجة Junction Table</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="posts">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">عمود <code>category_id</code> (الـ Foreign Key) لازم يتحط في أنهي جدول؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Which table should the <code>category_id</code> Foreign Key column go on?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="categories"> <code>categories</code></label>
        <label><input type="radio" name="q2" value="posts"> <code>posts</code> (الجدول "الكتير")</label>
        <label><input type="radio" name="q2" value="users"> <code>users</code></label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="alter">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">عشان تضيف عمود جديد لجدول <code>posts</code> الموجود بالفعل من غير ما تمسحه، تستخدم إيه؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">To add a new column to the existing <code>posts</code> table without dropping it, what do you use?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="create"> <code>CREATE TABLE posts</code> من جديد</label>
        <label><input type="radio" name="q3" value="alter"> <code>ALTER TABLE posts ADD COLUMN ...</code></label>
        <label><input type="radio" name="q3" value="drop"> <code>DROP TABLE posts</code> ثم إعادة إنشاءه</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="leftjoin">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">عشان بوست "Understanding JOINs" (من غير Category) يفضل يظهر في نتيجة الاستعلام بدل ما يختفي، تستخدم إيه؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">To make the "Understanding JOINs" post (no category) still appear in the result instead of disappearing, what do you use?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="innerjoin"> <code>JOIN</code> عادي (INNER JOIN)</label>
        <label><input type="radio" name="q4" value="leftjoin"> <code>LEFT JOIN</code></label>
        <label><input type="radio" name="q4" value="where"> <code>WHERE category_id IS NOT NULL</code></label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ زوّد Tags على نفس الـ Schema / Add Tags to the Same Schema</h3>
    <div class="ar">🇪🇬 في <a href="../db-sandbox/index.php">الـ Playground الكامل</a>: كمّل تصميمك بإضافة نظام Tags للبوستات (زي درس العلاقات) — يعني بوست ممكن يكون ليه أكتر من Tag، والـ Tag الواحد على أكتر من بوست. اعمل جدولي <code>tags</code> و<code>post_tags</code> (Junction Table)، واكتب استعلام يجيب كل بوست مع Category بتاعته (Many-to-One) <b>و</b> كل الـ Tags بتاعته (Many-to-Many) في نفس الوقت.</div>
    <div class="en">🇬🇧 In the <a href="../db-sandbox/index.php">full Playground</a>: complete your design by adding a tagging system to posts (like the relationships lesson) — a post can have multiple tags, and a tag can be on multiple posts. Build <code>tags</code> and <code>post_tags</code> (a junction table), then write a query that returns each post with its category (Many-to-One) <b>and</b> all its tags (Many-to-Many) at once.</div>
</div>

<div class="exercise-box">
    <h3>✍️ تمرين إضافي / Extra Exercise</h3>
    <div class="ar">🇪🇬 فكّر: إيه اللي كان هيحصل لو خليت <code>categories.name</code> من غير <code>UNIQUE</code>؟ اكتب سيناريو حقيقي لمشكلة كانت هتظهر (فكّر في التطبيع اللي اتعلمته في الدرس اللي فات).</div>
    <div class="en">🇬🇧 Think: what would go wrong if <code>categories.name</code> had no <code>UNIQUE</code> constraint? Write a real scenario for a problem that would appear (think back to normalization from the last lesson).</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 المرحلة الجاية بعد "تصميم قواعد البيانات" هي مرحلة "تطبيق CRUD حقيقي" — هتاخد Schema زي اللي صممتها هنا (Users/Posts/Comments/Categories) وتبني عليها تطبيق كامل بعمليات Create/Read/Update/Delete حقيقية على قاعدة بيانات فعلية. <b>ملحوظة: الدرس ده لسه متبنيش في المنصة.</b></div>
    <div class="en">🇬🇧 The next stage after "Database Design" is a "Real CRUD Application" stage — you'll take a schema like the one you designed here (Users/Posts/Comments/Categories) and build a full application on top of it with real Create/Read/Update/Delete operations against an actual database. <b>Note: this lesson has not been built on the platform yet.</b></div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>كملّت المسار الكامل: العلاقات (One-to-One/Many/Many-to-Many) ← التطبيع (1NF/2NF/3NF) ← تصميم Schema فعلي بإضافة <code>categories</code>.</li>
        <li><code>categories</code> ↔ <code>posts</code> = One-to-Many، بالظبط زي <code>users</code> ↔ <code>posts</code>.</li>
        <li><code>ALTER TABLE ... ADD COLUMN</code> بيوسّع جدول موجود من غير ما يمسح بياناته.</li>
        <li><code>LEFT JOIN</code> بيحافظ على الصفوف اللي مالهاش تطابق في الجدول التاني (زي بوست من غير Category).</li>
        <li>كل تصميم اتعمل هنا اتجرب فعليًا وشغال على الـ Database Playground الحقيقي — مش نظري.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="db-normalization.php">← المرحلة السابقة / Previous: Normalization</a>
    <a href="../index.php">الرئيسية / Home →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
