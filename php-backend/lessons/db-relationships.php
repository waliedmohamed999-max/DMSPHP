<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'db-relationships';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'العلاقات بين الجداول — Table Relationships';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">Stage 8 · Database Design</span>
<h1>العلاقات بين الجداول <span class="ltr">Table Relationships</span></h1>
<p class="subtitle">One-to-One, One-to-Many, Many-to-Many — وإزاي تعرف تختار الصح. <span class="ltr">One-to-one, one-to-many, many-to-many — and how to know which one you need.</span></p>

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
    <div class="ar">🇪🇬 قبل ما تكتب أي جملة SQL، لازم تفهم إزاي الجداول "بتتكلم مع بعض". في الدرس ده هتتعلم الثلاث أشكال الوحيدة اللي أي علاقة بين جدولين ممكن تاخدها: One-to-One (واحد لواحد)، One-to-Many (واحد لمتعدد)، Many-to-Many (متعدد لمتعدد) — وإزاي تقرر أنهي واحدة فيهم تناسب المشكلة اللي قدامك، باستخدام الـ Schema الحقيقية اللي شغالة في الـ Database Playground بتاع المنصة.</div>
    <div class="en">🇬🇧 Before writing a single line of SQL, you need to understand how tables relate to each other. This lesson covers the only three shapes a relationship between two tables can take: One-to-One, One-to-Many, and Many-to-Many — and how to decide which one fits the problem in front of you, using the real schema that powers this platform's Database Playground.</div>
</div>

<h2 id="understand">🧠 1) One-to-One — واحد لواحد</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 في One-to-One، صف واحد في الجدول الأول بيتوافق مع صف واحد بالظبط في الجدول التاني — مش أكتر. المثال الكلاسيكي: <code>users</code> و<code>user_profiles</code> — كل مستخدم ليه بروفايل واحد بس (سيرة ذاتية، صورة). بتفرضها في الـ Schema بعمل عمود <code>user_id</code> في الجدول التاني وتحطله قيد <code>UNIQUE</code> — من غير <code>UNIQUE</code> يبقى One-to-Many مش One-to-One.</div>
    <div class="en">🇬🇧 In a One-to-One relationship, exactly one row in the first table matches exactly one row in the second — never more. The classic example: <code>users</code> and <code>user_profiles</code> — every user has exactly one profile (a bio, an avatar). You enforce this in the schema with a <code>user_id</code> column that carries a <code>UNIQUE</code> constraint — without <code>UNIQUE</code> it's actually a One-to-Many, not a One-to-One.</div>
</div>

<pre><code>&lt;?php
$pdo-&gt;exec('CREATE TABLE demo_users (id INTEGER PRIMARY KEY AUTOINCREMENT, name TEXT NOT NULL)');
$pdo-&gt;exec('CREATE TABLE user_profiles (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    user_id INTEGER NOT NULL UNIQUE,
    bio TEXT,
    avatar_url TEXT,
    FOREIGN KEY (user_id) REFERENCES demo_users(id)
)');

$pdo-&gt;exec("INSERT INTO demo_users (id, name) VALUES (1, 'Ahmed Hassan'), (2, 'Sara Ali')");
$pdo-&gt;exec("INSERT INTO user_profiles (user_id, bio, avatar_url) VALUES (1, 'Backend dev, loves PHP.', 'ahmed.png')");
// Sara has no profile row yet — "one-to-one" really means "at most one", proven with LEFT JOIN below

$rows = $pdo-&gt;query('
    SELECT demo_users.name, user_profiles.bio
    FROM demo_users
    LEFT JOIN user_profiles ON user_profiles.user_id = demo_users.id
    ORDER BY demo_users.id
')-&gt;fetchAll(PDO::FETCH_ASSOC);
foreach ($rows as $row) {
    echo "{$row['name']}: " . ($row['bio'] ?? '(no profile yet)') . PHP_EOL;
}

echo PHP_EOL . '-- trying to give Ahmed a second profile fails, because user_id is UNIQUE --' . PHP_EOL;
try {
    $pdo-&gt;exec("INSERT INTO user_profiles (user_id, bio) VALUES (1, 'A second bio')");
} catch (Throwable $e) {
    echo 'Insert rejected: ' . $e-&gt;getMessage() . PHP_EOL;
}</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">Ahmed Hassan: Backend dev, loves PHP.
Sara Ali: (no profile yet)

-- trying to give Ahmed a second profile fails, because user_id is UNIQUE --
Insert rejected: SQLSTATE[23000]: Integrity constraint violation: 19 UNIQUE constraint failed: user_profiles.user_id</div>

<h2>2) One-to-Many — واحد لمتعدد</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 ده الشكل الأكتر شيوعًا، وهو بالظبط شكل <code>users</code> و<code>posts</code> في الـ <a href="../db-sandbox/index.php">Database Playground</a> بتاع المنصة: مستخدم واحد ممكن يكتب عدد أي من البوستات، لكن كل بوست ليه صاحب واحد بس. بتنفّذها بعمود <code>user_id</code> في الجدول "الكتير" (<code>posts</code>) بيرجع لـ <code>id</code> بتاع الجدول "الواحد" (<code>users</code>) — من غير <code>UNIQUE</code> هنا، عشان نفس الـ <code>user_id</code> يتكرر في أكتر من صف.</div>
    <div class="en">🇬🇧 This is the most common shape, and it's exactly the shape of <code>users</code> and <code>posts</code> in this platform's <a href="../db-sandbox/index.php">Database Playground</a>: one user can write any number of posts, but each post has exactly one owner. You implement it with a <code>user_id</code> column on the "many" side (<code>posts</code>) referencing the <code>id</code> on the "one" side (<code>users</code>) — no <code>UNIQUE</code> here, since the same <code>user_id</code> is expected to repeat across many rows.</div>
</div>

<pre><code>&lt;?php
require __DIR__ . '/../db-sandbox/schema.php'; // the platform's real seed schema
$pdo = build_sandbox_pdo();

$stmt = $pdo-&gt;query('
    SELECT users.name AS author, posts.title, posts.views
    FROM posts
    JOIN users ON posts.user_id = users.id
    WHERE users.id = 1
    ORDER BY posts.id
');
foreach ($stmt-&gt;fetchAll(PDO::FETCH_ASSOC) as $row) {
    echo "{$row['author']} -&gt; \"{$row['title']}\" ({$row['views']} views)" . PHP_EOL;
}

echo PHP_EOL . '--- all users with their post count ---' . PHP_EOL;
$stmt2 = $pdo-&gt;query('
    SELECT users.name, COUNT(posts.id) AS post_count
    FROM users
    LEFT JOIN posts ON posts.user_id = users.id
    GROUP BY users.id
    ORDER BY users.id
');
foreach ($stmt2-&gt;fetchAll(PDO::FETCH_ASSOC) as $row) {
    echo "{$row['name']}: {$row['post_count']} post(s)" . PHP_EOL;
}</code></pre>
<h3>الناتج الفعلي (تم تنفيذه فعليًا على نفس الـ Schema اللي في الـ Playground) / Actual output (really executed against the same schema the Playground uses)</h3>
<div class="output-box">Ahmed Hassan -> "Getting Started with PDO" (120 views)
Ahmed Hassan -> "Why Prepared Statements Matter" (340 views)

--- all users with their post count ---
Ahmed Hassan: 2 post(s)
Sara Ali: 2 post(s)
Omar Khaled: 1 post(s)
Laila Mostafa: 2 post(s)
Youssef Adel: 1 post(s)</div>

<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ إن Ahmed Hassan (صاحب أعلى صلاحية، admin) عنده بوستين — الـ <code>JOIN</code> جاب اسمه مرتين، مرة لكل بوست. ده بالظبط تعريف One-to-Many: صف واحد في <code>users</code> اترابط مع أكتر من صف في <code>posts</code>.</div>
    <div class="en">🇬🇧 Notice Ahmed Hassan has two posts — the <code>JOIN</code> returned his name twice, once per post. That's exactly the definition of One-to-Many: one row in <code>users</code> matches multiple rows in <code>posts</code>.</div>
</div>

<h2>3) Many-to-Many — متعدد لمتعدد</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 هنا كل صف في الجدول الأول ممكن يترابط مع أكتر من صف في التاني، والعكس صحيح. المثال الكلاسيكي: بوست ممكن يكون ليه أكتر من Tag، والـ Tag نفسه (زي "PHP") ممكن يتحط على أكتر من بوست. المشكلة إنك مش هتقدر تحط عمود <code>tag_id</code> جوه <code>posts</code> — أنهي واحد تختار لو البوست ليه 3 Tags؟ الحل: جدول ثالث اسمه <b>Junction Table</b> (أو Pivot Table) زي <code>post_tags</code>، مفهوش غير عمودين (<code>post_id</code>, <code>tag_id</code>) وبيربط بين الجدولين، وده بيحوّل المشكلة لعلاقتين One-to-Many عاديين.</div>
    <div class="en">🇬🇧 Here, each row in the first table can relate to many rows in the second, and vice versa. The classic example: a post can have multiple tags, and the same tag (like "PHP") can be attached to multiple posts. You can't put a <code>tag_id</code> column directly on <code>posts</code> — which one would you pick if a post has 3 tags? The fix: a third table called a <b>Junction Table</b> (or Pivot Table) like <code>post_tags</code>, holding just two columns (<code>post_id</code>, <code>tag_id</code>) that link the two tables — turning the problem into two ordinary One-to-Many relationships.</div>
</div>

<div class="flow-diagram">
    <div class="flow-box">posts (id, title, ...)</div>
    <div class="flow-arrow">↓ post_id</div>
    <div class="flow-box">post_tags (post_id, tag_id) — Junction Table</div>
    <div class="flow-arrow">↑ tag_id</div>
    <div class="flow-box">tags (id, name)</div>
</div>

<pre><code>&lt;?php
require __DIR__ . '/../db-sandbox/schema.php';
$pdo = build_sandbox_pdo();

// Extending the seed schema with a Many-to-Many example: Posts &lt;-&gt; Tags
$pdo-&gt;exec('CREATE TABLE tags (id INTEGER PRIMARY KEY AUTOINCREMENT, name TEXT NOT NULL UNIQUE)');
$pdo-&gt;exec('CREATE TABLE post_tags (
    post_id INTEGER NOT NULL,
    tag_id INTEGER NOT NULL,
    PRIMARY KEY (post_id, tag_id),
    FOREIGN KEY (post_id) REFERENCES posts(id),
    FOREIGN KEY (tag_id) REFERENCES tags(id)
)');

$tagStmt = $pdo-&gt;prepare('INSERT INTO tags (id, name) VALUES (?, ?)');
foreach ([[1, 'PHP'], [2, 'PDO'], [3, 'Security'], [4, 'Performance']] as $t) {
    $tagStmt-&gt;execute($t);
}

$linkStmt = $pdo-&gt;prepare('INSERT INTO post_tags (post_id, tag_id) VALUES (?, ?)');
foreach ([[1, 1], [1, 2], [2, 1], [2, 3], [8, 1], [8, 4]] as $l) {
    $linkStmt-&gt;execute($l);
}

echo '--- posts with all their tags (Many-to-Many via post_tags) ---' . PHP_EOL;
$stmt = $pdo-&gt;query('
    SELECT posts.title, GROUP_CONCAT(tags.name, ", ") AS tags
    FROM posts
    JOIN post_tags ON post_tags.post_id = posts.id
    JOIN tags ON tags.id = post_tags.tag_id
    GROUP BY posts.id
    ORDER BY posts.id
');
foreach ($stmt-&gt;fetchAll(PDO::FETCH_ASSOC) as $row) {
    echo "{$row['title']} -&gt; [{$row['tags']}]" . PHP_EOL;
}</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">--- posts with all their tags (Many-to-Many via post_tags) ---
Getting Started with PDO -> [PHP, PDO]
Why Prepared Statements Matter -> [PHP, Security]
Indexing for Performance -> [PHP, Performance]</div>

<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ إن "Getting Started with PDO" مرتبط بـ Tag واحد اسمه "PHP"، وبرضو "Why Prepared Statements Matter" و"Indexing for Performance" مرتبطين بنفس الـ "PHP" — يعني صف واحد في <code>tags</code> (PHP) اترابط مع 3 صفوف في <code>posts</code>. وفي نفس الوقت، بوست واحد ("Getting Started with PDO") اترابط مع أكتر من Tag (PHP و PDO). العلاقة شغالة في الاتجاهين — وده بالظبط تعريف Many-to-Many.</div>
    <div class="en">🇬🇧 Notice "Getting Started with PDO" is linked to a tag called "PHP", and so are "Why Prepared Statements Matter" and "Indexing for Performance" — meaning one row in <code>tags</code> (PHP) relates to 3 rows in <code>posts</code>. At the same time, one post ("Getting Started with PDO") relates to more than one tag (PHP and PDO). The relationship works in both directions — exactly the definition of Many-to-Many.</div>
</div>

<h2 id="lab">🗄️ معمل قواعد البيانات / Database Lab</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 جرّب الاستعلام الحقيقي بتاع One-to-Many تحت — نفس الـ Schema اللي شفتها فوق، شغالة فعليًا. تقدر تعدّل الشرط أو تجرب استعلامات تانية.</div>
    <div class="en">🇬🇧 Try the real One-to-Many query below — same schema you saw above, actually running. Feel free to tweak the condition or try other queries.</div>
</div>

<div class="sql-playground">
    <textarea spellcheck="false" rows="4">SELECT users.name AS author, posts.title, posts.views
FROM posts
JOIN users ON posts.user_id = users.id
WHERE users.id = 1
ORDER BY posts.id;</textarea>
    <div>
        <button class="sql-run-btn">▶ نفّذ / Run Query</button>
        <span class="sql-status"></span>
    </div>
    <div class="sql-result-wrap"></div>
</div>

<p class="ltr" style="color:var(--muted);font-size:0.9em">Full playground with the complete schema and more ideas to try: <a href="../db-sandbox/index.php">../db-sandbox/index.php</a></p>

<div class="db-lab">
    <h3>🗄️ تمرين تصميم: Students ↔ Courses</h3>
    <div class="ar">🇪🇬 تخيّل نظام مدرسي: طالب واحد بياخد أكتر من مادة، والمادة الواحدة (زي "رياضيات") بياخدها أكتر من طالب. من غير ما تكتب أي SQL، جاوب:<br>
    1) نوع العلاقة بين <code>students</code> و<code>courses</code> إيه؟<br>
    2) هل تقدر تحط <code>course_id</code> جوه جدول <code>students</code> مباشرة؟ ليه لأ؟<br>
    3) اكتب (بالورقة أو في دماغك) اسم الجدول الثالث اللي هتحتاجه وأعمدته.</div>
    <div class="en">🇬🇧 Imagine a school system: one student takes many courses, and one course (like "Math") has many students. Without writing any SQL, answer:<br>
    1) What kind of relationship is this between <code>students</code> and <code>courses</code>?<br>
    2) Could you put a <code>course_id</code> column directly on <code>students</code>? Why not?<br>
    3) Name the third table you'd need, and its columns.</div>
    <p class="ltr" style="color:var(--muted);font-size:0.85em">Answer: Many-to-Many. No — a student can have several courses at once, one column can't hold several values. You need a junction table, e.g. <code>student_courses (student_id, course_id)</code>, mirroring exactly the <code>post_tags</code> pattern above.</p>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="onetomany">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">علاقة <code>users</code> و<code>posts</code> في الـ Playground إيه نوعها؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What kind of relationship is <code>users</code> to <code>posts</code> in the Playground?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="onetoone"> One-to-One</label>
        <label><input type="radio" name="q1" value="onetomany"> One-to-Many</label>
        <label><input type="radio" name="q1" value="manytomany"> Many-to-Many</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="junction">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">عشان تربط <code>posts</code> بـ <code>tags</code> (Many-to-Many)، محتاج إيه؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">To connect <code>posts</code> with <code>tags</code> (Many-to-Many), what do you need?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="fk"> عمود <code>tag_id</code> واحد جوه <code>posts</code></label>
        <label><input type="radio" name="q2" value="junction"> جدول Junction (زي <code>post_tags</code>) فيه <code>post_id</code> و<code>tag_id</code></label>
        <label><input type="radio" name="q2" value="unique"> قيد <code>UNIQUE</code> على <code>posts.id</code></label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="posts">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">في علاقة One-to-Many زي <code>users</code>/<code>posts</code>، الـ Foreign Key (<code>user_id</code>) بيتحط في أنهي جدول؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">In a One-to-Many relationship like <code>users</code>/<code>posts</code>, which table holds the Foreign Key (<code>user_id</code>)?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="users"> الجدول "الواحد" — <code>users</code></label>
        <label><input type="radio" name="q3" value="posts"> الجدول "الكتير" — <code>posts</code></label>
        <label><input type="radio" name="q3" value="both"> الاتنين مع بعض</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="unique">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">إيه اللي بيفرّق One-to-One عن One-to-Many في الـ Schema بالظبط؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What exactly distinguishes One-to-One from One-to-Many in the schema?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="unique"> قيد <code>UNIQUE</code> على عمود الـ Foreign Key</label>
        <label><input type="radio" name="q4" value="name"> اسم العمود لازم يكون <code>id</code></label>
        <label><input type="radio" name="q4" value="table"> عدد الجداول</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ Join بثلاث جداول / A Three-Table Join</h3>
    <div class="ar">🇪🇬 في <a href="../db-sandbox/index.php">الـ Playground الكامل</a>: اكتب استعلام يجيب لكل تعليق عنوان البوست اللي اتكتب عليه (<code>posts.title</code>) واسم صاحب التعليق (<code>users.name</code>) — يعني <code>JOIN</code> على 3 جداول: <code>comments</code>، <code>posts</code>، <code>users</code>.</div>
    <div class="en">🇬🇧 In the <a href="../db-sandbox/index.php">full Playground</a>: write a query that returns, for every comment, the title of the post it was left on (<code>posts.title</code>) and the commenter's name (<code>users.name</code>) — a <code>JOIN</code> across 3 tables: <code>comments</code>, <code>posts</code>, <code>users</code>.</div>
    <p class="ltr" style="color:var(--muted);font-size:0.85em">Verified working (first 5 rows): [Getting Started with PDO] Sara Ali: This finally made PDO click for me, thanks! — and more, ordered by comment id.</p>
</div>

<div class="exercise-box">
    <h3>✍️ تمرين إضافي / Extra Exercise</h3>
    <div class="ar">🇪🇬 في <a href="../db-sandbox/index.php">الـ Playground</a>: اعمل جدول <code>likes</code> فيه <code>user_id</code> و<code>post_id</code> بس (Many-to-Many بين <code>users</code> و<code>posts</code> — إعجاب المستخدم بالبوست)، وحاول تفهم ليه <code>PRIMARY KEY (user_id, post_id)</code> بيمنع المستخدم من عمل Like مرتين على نفس البوست.</div>
    <div class="en">🇬🇧 In the <a href="../db-sandbox/index.php">Playground</a>: create a <code>likes</code> table with just <code>user_id</code> and <code>post_id</code> (a Many-to-Many between <code>users</code> and <code>posts</code> — a user liking a post), and figure out why <code>PRIMARY KEY (user_id, post_id)</code> stops a user from liking the same post twice.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 فهم العلاقات هنا هو الأساس اللي هتبني عليه في الدرس الجاي: التطبيع (Normalization) — هتشوف إزاي غياب فهم العلاقات الصح هو السبب الرئيسي وراء تكرار البيانات ومشاكل التصميم.</div>
    <div class="en">🇬🇧 Understanding relationships here is the foundation for the next lesson: Normalization — you'll see how failing to model relationships correctly is exactly what causes data duplication and design problems.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>One-to-One: صف واحد ↔ صف واحد بالظبط، بقيد <code>UNIQUE</code> على الـ Foreign Key (زي <code>users</code>/<code>user_profiles</code>).</li>
        <li>One-to-Many: صف واحد ↔ عدة صفوف، الـ Foreign Key بيتحط في جدول "الكتير" (زي <code>users</code>/<code>posts</code> في الـ Playground).</li>
        <li>Many-to-Many: محتاج جدول Junction/Pivot بعمودين Foreign Key (زي <code>post_tags</code>) — بيحوّل العلاقة المعقدة لعلاقتين One-to-Many.</li>
        <li>القرار بيتحدد بسؤال واحد: كام صف في الجدول التاني ممكن يترابط مع صف واحد في الجدول ده؟</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="../index.php">← الرئيسية / Home</a>
    <a href="db-normalization.php">المرحلة الجاية / Next: Normalization →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
