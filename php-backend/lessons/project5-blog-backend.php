<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'project5-blog-backend';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = '🚀 مشروع 5: Blog Backend';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">Stage 18 · Projects</span>
<h1>🚀 مشروع 5: Blog Backend <span class="ltr">🚀 Project 5: Blog Backend</span></h1>
<p class="subtitle">مقالات، تعليقات، وفئات — واجهة عامة للقراءة وواجهة إدارة للكتابة.</p>

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
    <div class="ar">🇪🇬 أي منصة مدونة حقيقية (زي Medium أو WordPress) مبنية على فكرة بسيطة: مقالات (Posts) كتبها مستخدمين (Users)، وتعليقات (Comments) عليها من مستخدمين تانيين. المشروع ده هيبني الطبقة الخلفية (Backend) الكاملة لده — واجهة عامة (Public) بتعرض المقالات المنشورة مع كاتبها، وواجهة إدارة (Admin) بتضيف وتحذف مقالات فعليًا في قاعدة بيانات حقيقية، مش مصفوفة وهمية.</div>
    <div class="en">🇬🇧 Any real blog platform (Medium, WordPress) is built on a simple idea: Posts written by Users, and Comments on them from other Users. This project builds the full backend for that — a public view that lists published posts with their author, and an admin view that actually creates and deletes posts against a real database, not a fake in-memory array.</div>
</div>

<h2 id="understand">🧠 المواصفات المطلوبة / Requirements</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 النظام لازم يحقق النقط دي:</div>
</div>
<div class="recap-box">
    <h3>📋 قائمة المتطلبات / Checklist</h3>
    <ul>
        <li><code>getPublishedPosts($pdo): array</code> — يرجّع كل المقالات مع اسم الكاتب (JOIN حقيقي مع <code>users</code>)، مرتبة من الأحدث للأقدم.</li>
        <li><code>getPostWithComments($pdo, $postId): array</code> — يرجّع مقال واحد مع كل تعليقاته الحقيقية، وكل تعليق معاه اسم صاحبه (JOIN تاني مع <code>users</code>).</li>
        <li><code>createPost($pdo, $authorId, $title, $body): int</code> — تُنشئ مقال جديد فعليًا وترجع الـ id بتاعه، بـ Prepared Statement.</li>
        <li>حذف مقال لازم يمسح تعليقاته الأول (لأن فيه Foreign Key حقيقي بيربطهم)، وبعدين يمسح المقال نفسه.</li>
    </ul>
</div>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>ملاحظة عن قاعدة البيانات:</b> بدل ما نبني جداول جديدة من الصفر، هنستخدم بالظبط نفس جداول <code>users</code> و<code>posts</code> و<code>comments</code> الموجودة أصلًا في الـ <a href="../db-sandbox/index.php">Database Sandbox</a> — دي بالظبط شكل مدونة حقيقية: 5 مستخدمين، 8 مقالات، و12 تعليق متوزعين عليهم. مفيش داعي نخترع بيانات — دي البيانات اللي البروجيكت ده اتصمم عشانها بالظبط.</div>
    <div class="en">🇬🇧 <b>A note on the database:</b> instead of building new tables from scratch, we use the exact same <code>users</code>, <code>posts</code>, and <code>comments</code> tables already seeded in the <a href="../db-sandbox/index.php">Database Sandbox</a> — this is already shaped like a real blog: 5 users, 8 posts, and 12 comments spread across them. No need to invent data — this is exactly what that sandbox exists for.</div>
</div>

<h2 id="practice">💻 التنفيذ / Implementation</h2>

<h3>1) الواجهة العامة: كل المقالات المنشورة / Public view: all published posts</h3>
<div class="bi-block">
    <div class="ar">🇪🇬 <code>getPublishedPosts()</code> بتعمل <code>JOIN</code> بسيط بين <code>posts</code> و<code>users</code> عشان تجيب اسم الكاتب مع كل مقال — مفيش داعي لأكتر من Query واحدة. الترتيب بـ <code>ORDER BY posts.created_at DESC</code> عشان الأحدث يظهر الأول، بالظبط زي أي صفحة مدونة حقيقية.</div>
    <div class="en">🇬🇧 <code>getPublishedPosts()</code> does a simple <code>JOIN</code> between <code>posts</code> and <code>users</code> to fetch the author's name alongside each post — no need for more than one query. Ordering by <code>posts.created_at DESC</code> shows the newest first, exactly like a real blog homepage.</div>
</div>

<pre><code>&lt;?php
require __DIR__ . '/../db-sandbox/schema.php';
$pdo = build_sandbox_pdo();

function getPublishedPosts(PDO $pdo): array {
    $stmt = $pdo->query('
        SELECT posts.id, posts.title, posts.views, posts.created_at, users.name AS author
        FROM posts
        JOIN users ON users.id = posts.user_id
        ORDER BY posts.created_at DESC
    ');
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$posts = getPublishedPosts($pdo);
foreach ($posts as $p) {
    echo "#{$p['id']} [{$p['created_at']}] \"{$p['title']}\" by {$p['author']} ({$p['views']} views)" . PHP_EOL;
}</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">#8 [2024-03-22] "Indexing for Performance" by Laila Mostafa (300 views)
#7 [2024-03-15] "Sessions vs Cookies" by Youssef Adel (95 views)
#6 [2024-03-10] "Understanding JOINs" by Omar Khaled (175 views)
#5 [2024-03-01] "Debugging a Tricky Bug" by Sara Ali (60 views)
#4 [2024-02-22] "Database Design 101" by Laila Mostafa (210 views)
#3 [2024-02-01] "My First REST API" by Sara Ali (85 views)
#2 [2024-01-20] "Why Prepared Statements Matter" by Ahmed Hassan (340 views)
#1 [2024-01-12] "Getting Started with PDO" by Ahmed Hassan (120 views)</div>

<h3>2) مقال واحد مع تعليقاته / A single post with its comments</h3>
<div class="bi-block">
    <div class="ar">🇪🇬 صفحة مقال واحد محتاجة Query تانية منفصلة: الأول تجيب المقال نفسه (مع اسم كاتبه)، وبعدين تجيب كل التعليقات اللي <code>post_id</code> بتاعها بيساوي id المقال ده — وكل تعليق معاه اسم صاحبه بـ JOIN تاني مع <code>users</code>. النتيجة النهائية مصفوفة "متداخلة" (Nested): مقال جواه مصفوفة تعليقات.</div>
    <div class="en">🇬🇧 A single post page needs a separate query: first fetch the post itself (with its author's name), then fetch every comment whose <code>post_id</code> matches — each comment joined to <code>users</code> again for the commenter's name. The final result is a nested array: a post containing an array of comments.</div>
</div>

<pre><code>&lt;?php
function getPostWithComments(PDO $pdo, int $postId): array {
    $postStmt = $pdo->prepare('
        SELECT posts.id, posts.title, posts.body, users.name AS author
        FROM posts JOIN users ON users.id = posts.user_id
        WHERE posts.id = ?
    ');
    $postStmt->execute([$postId]);
    $post = $postStmt->fetch(PDO::FETCH_ASSOC);
    if (!$post) {
        return ['ok' => false, 'error' => 'Post not found.'];
    }

    $commentsStmt = $pdo->prepare('
        SELECT comments.id, comments.body, comments.created_at, users.name AS commenter
        FROM comments JOIN users ON users.id = comments.user_id
        WHERE comments.post_id = ?
        ORDER BY comments.created_at ASC
    ');
    $commentsStmt->execute([$postId]);
    $post['comments'] = $commentsStmt->fetchAll(PDO::FETCH_ASSOC);
    return ['ok' => true, 'post' => $post];
}

echo json_encode(getPostWithComments($pdo, 4), JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">{
    "ok": true,
    "post": {
        "id": 4,
        "title": "Database Design 101",
        "body": "Normalizing a schema early saves you from painful migrations later.",
        "author": "Laila Mostafa",
        "comments": [
            {
                "id": 5,
                "body": "Normalization examples were super clear.",
                "created_at": "2024-02-23",
                "commenter": "Sara Ali"
            },
            {
                "id": 6,
                "body": "Do you have a follow-up on many-to-many?",
                "created_at": "2024-02-24",
                "commenter": "Youssef Adel"
            }
        ]
    }
}</div>

<h3>3) واجهة الإدارة: إنشاء مقال / Admin view: creating a post</h3>
<div class="bi-block">
    <div class="ar">🇪🇬 <code>createPost()</code> بسيطة: <code>INSERT</code> بـ Prepared Statement، وبعدين <code>$pdo->lastInsertId()</code> عشان نعرف الـ id اللي اتحط فعلاً. أهم حاجة هنا إننا منصدقش الدالة بس — لازم نتحقق فعليًا بـ <code>SELECT</code> تانية إن الصف اتسجل صح بالبيانات الصح.</div>
    <div class="en">🇬🇧 <code>createPost()</code> is simple: a prepared <code>INSERT</code>, then <code>$pdo->lastInsertId()</code> to know the id that was actually assigned. The important part here is not just trusting the function — we verify with a real follow-up <code>SELECT</code> that the row was actually stored with the correct data.</div>
</div>

<pre><code>&lt;?php
function createPost(PDO $pdo, int $authorId, string $title, string $body): int {
    $stmt = $pdo->prepare('INSERT INTO posts (user_id, title, body, views, created_at) VALUES (?, ?, ?, 0, ?)');
    $stmt->execute([$authorId, $title, $body, date('Y-m-d')]);
    return (int) $pdo->lastInsertId();
}

$newId = createPost($pdo, 2, 'Mastering PDO Transactions', 'Transactions let you group several writes into one all-or-nothing unit.');
echo "createPost() returned new id: $newId" . PHP_EOL;

$check = $pdo->prepare('SELECT id, user_id, title, views FROM posts WHERE id = ?');
$check->execute([$newId]);
echo "Follow-up SELECT: " . json_encode($check->fetch(PDO::FETCH_ASSOC)) . PHP_EOL;</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">createPost() returned new id: 9
Follow-up SELECT: {"id":9,"user_id":2,"title":"Mastering PDO Transactions","views":0}</div>
<div class="bi-block">
    <div class="ar">🇪🇬 الـ id رجع 9 مش 1 — لإن الـ Sandbox فيها 8 مقالات متزروعة مسبقًا لدروس تانية، فالمقال الجديد بياخد أول id متاح بعدهم بالظبط زي ما شفنا في مشروع الـ Authentication مع جدول <code>users</code>.</div>
    <div class="en">🇬🇧 The id came back as 9, not 1 — the sandbox already has 8 pre-seeded posts from other lessons, so the new post gets the next available id, exactly like we saw with the <code>users</code> table in the Authentication project.</div>
</div>

<h3>4) واجهة الإدارة: حذف مقال بأمان / Admin view: safely deleting a post</h3>
<div class="bi-block">
    <div class="ar">🇪🇬 جدول <code>comments</code> فيه <code>FOREIGN KEY (post_id) REFERENCES posts(id)</code> — يعني كل تعليق "بيشاور" على مقال موجود فعلاً. لو حاولت تمسح المقال مباشرة والتعليقات لسه بتشاور عليه، هتسيب "تعليقات يتيمة" (Orphan Rows) بتشاور على مقال مش موجود — ده بالظبط اللي الـ Foreign Key وُجد عشان يمنعه (أو على الأقل ينبهك له). الحل: تمسح التعليقات الأول (<code>DELETE FROM comments WHERE post_id = ?</code>)، وبعدين تمسح المقال نفسه — عمليتين منفصلتين بترتيب محدد، مش عملية واحدة.</div>
    <div class="en">🇬🇧 The <code>comments</code> table has a <code>FOREIGN KEY (post_id) REFERENCES posts(id)</code> — every comment "points at" a post that actually exists. If you delete the post directly while comments still reference it, you'd leave "orphan rows" pointing at a post that no longer exists — exactly what the foreign key exists to prevent (or at least flag). The fix: delete the comments first (<code>DELETE FROM comments WHERE post_id = ?</code>), then delete the post itself — two separate statements, in a specific order, not one operation.</div>
</div>

<pre><code>&lt;?php
function deletePost(PDO $pdo, int $postId): void {
    // Comments reference posts via a real foreign key, so they must go first —
    // deleting the post while comments still point at it would leave orphan rows.
    $pdo->prepare('DELETE FROM comments WHERE post_id = ?')->execute([$postId]);
    $pdo->prepare('DELETE FROM posts WHERE id = ?')->execute([$postId]);
}

$before = $pdo->query('SELECT COUNT(*) FROM comments WHERE post_id = 4')->fetchColumn();
echo "Comments on post #4 before delete: $before" . PHP_EOL;

deletePost($pdo, 4);

$afterComments = $pdo->query('SELECT COUNT(*) FROM comments WHERE post_id = 4')->fetchColumn();
$afterPost = $pdo->prepare('SELECT COUNT(*) FROM posts WHERE id = ?');
$afterPost->execute([4]);
echo "Comments on post #4 after delete: $afterComments" . PHP_EOL;
echo "Post #4 rows remaining after delete: " . $afterPost->fetchColumn() . PHP_EOL;</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">Comments on post #4 before delete: 2
Comments on post #4 after delete: 0
Post #4 rows remaining after delete: 0</div>

<div class="bi-block">
    <div class="ar">🇪🇬 جرّب بنفسك في المحرر المصغّر تحت — نسخة ذاتية الاكتفاء (Self-Contained) بجدولين صغيرين وبيانات مختلفة، عدّل الـ JOIN أو رتّب النتيجة بشكل مختلف (زي الترتيب حسب <code>views</code> بدل التاريخ) وشوف الناتج بيتغيّر إزاي.</div>
    <div class="en">🇬🇧 Try it yourself in the mini editor below — a self-contained version with two small tables and different data. Tweak the JOIN or order the result differently (e.g. by <code>views</code> instead of date) and see how the output changes.</div>
</div>

<div class="mini-editor-wrap">
    <textarea spellcheck="false">&lt;?php
// نسخة صغيرة ذاتية الاكتفاء (مفيهاش require لملفات تانية) عشان تشتغل هنا مباشرة
$pdo = new PDO('sqlite::memory:');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$pdo->exec('CREATE TABLE users (id INTEGER PRIMARY KEY, name TEXT)');
$pdo->exec('CREATE TABLE posts (id INTEGER PRIMARY KEY, user_id INTEGER, title TEXT, views INTEGER, created_at TEXT)');

$pdo->exec("INSERT INTO users VALUES (1, 'Nora'), (2, 'Kareem')");
$pdo->exec("INSERT INTO posts VALUES
    (1, 1, 'Intro to Arrays', 40, '2024-05-01'),
    (2, 2, 'Closures Explained', 90, '2024-05-05'),
    (3, 1, 'Working with Dates', 15, '2024-05-10')");

// جرّب تغيّر ORDER BY posts.views DESC بدل created_at وشوف الفرق
$stmt = $pdo->query('
    SELECT posts.title, posts.views, users.name AS author
    FROM posts JOIN users ON users.id = posts.user_id
    ORDER BY posts.created_at DESC
');
foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $p) {
    echo "\"{$p['title']}\" by {$p['author']} ({$p['views']} views)" . PHP_EOL;
}</textarea>
    <div class="mini-toolbar">
        <button class="mini-run-btn">▶ شغّل / Run</button>
        <span class="mini-status"></span>
    </div>
    <div class="output-box">— لسه متشغلش / not run yet —</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="join">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">إزاي <code>getPublishedPosts()</code> بتجيب اسم كاتب كل مقال من غير Query منفصلة لكل مقال؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">How does <code>getPublishedPosts()</code> fetch each post's author name without a separate query per post?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="loop"> بعمل <code>foreach</code> واستعلام جديد لكل مقال</label>
        <label><input type="radio" name="q1" value="join"> بعمل <code>JOIN</code> واحد بين <code>posts</code> و<code>users</code></label>
        <label><input type="radio" name="q1" value="cache"> بحفظ كل الأسماء في Cache مسبقًا</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="nine">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">حسب الناتج الفعلي فوق، <code>createPost()</code> رجّعت id رقم كام، وليه مش 1؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Per the actual output above, what id did <code>createPost()</code> return, and why not 1?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="one"> 1، لإنه أول مقال في المصفوفة</label>
        <label><input type="radio" name="q2" value="nine"> 9، لإن الـ Sandbox فيها 8 مقالات متزروعة مسبقًا</label>
        <label><input type="radio" name="q2" value="zero"> 0، لإن الإدراج فشل</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="commentsfirst">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">ليه لازم نمسح التعليقات قبل ما نمسح المقال نفسه؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Why must comments be deleted before deleting the post itself?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="commentsfirst"> لإن <code>comments.post_id</code> فيها Foreign Key بتشاور على المقال، فمسحه الأول هيسيب صفوف يتيمة</label>
        <label><input type="radio" name="q3" value="faster"> عشان الأداء بس، مفيش سبب بنيوي</label>
        <label><input type="radio" name="q3" value="notneeded"> مش لازم أصلًا، الترتيب مش مهم</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="nested">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">شكل النتيجة اللي بترجعها <code>getPostWithComments()</code> إيه؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What shape does <code>getPostWithComments()</code>'s result take?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="flat"> مصفوفة مسطّحة فيها كل التعليقات والمقال في نفس المستوى</label>
        <label><input type="radio" name="q4" value="nested"> مصفوفة متداخلة: المقال جواه مفتاح <code>comments</code> بيحمل مصفوفة التعليقات</label>
        <label><input type="radio" name="q4" value="string"> نص JSON خام مش مصفوفة PHP</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ فلترة حسب الفئة / Filter by Category</h3>
    <div class="ar">🇪🇬 في <a href="../playground/index.php">محرر الكود</a>: زوّد دالة <code>getPostsByCategory(PDO $pdo, int $categoryId): array</code> بترجع بس المقالات اللي تابعة لفئة معينة. مشكلة: جدول <code>posts</code> في الـ Sandbox الأساسية مفهوش عمود <code>category_id</code> ولا جدول <code>categories</code> أصلًا — لو عايز بيانات فئات حقيقية تشتغل عليها، ارجع لدرس <a href="db-schema-design-lab.php">Database Schema Design Lab</a> اللي بيوسّع نفس الـ Sandbox بجدول <code>categories</code> وعمود <code>posts.category_id</code> بعلاقة One-to-Many حقيقية.</div>
    <div class="en">🇬🇧 In the <a href="../playground/index.php">Playground</a>: add a <code>getPostsByCategory(PDO $pdo, int $categoryId): array</code> function that returns only posts belonging to a given category. Problem: the base sandbox's <code>posts</code> table has no <code>category_id</code> column and no <code>categories</code> table at all — if you want real category data to query against, go back to the <a href="db-schema-design-lab.php">Database Schema Design Lab</a> lesson, which extends this same sandbox with a <code>categories</code> table and a <code>posts.category_id</code> column in a real One-to-Many relationship.</div>
</div>

<h2 id="project">🚀 اللي بعد كده / What Comes Next</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 دلوقتي بنيت طبقة قراءة/كتابة كاملة على جداول مترابطة بـ Foreign Keys حقيقية — دي بالظبط نفس المهارة اللي أي متجر إلكتروني محتاجها، غير إن فيه تحدي إضافي: مش بس CRUD، لازم كمان تضمن إن العمليات المالية (زي إنقاص المخزون) تحصل بالكامل أو متحصلش خالص. ده موضوع <a href="project7-ecommerce-backend.php">المشروع الجاي: E-Commerce Backend</a> اللي هيقدّم Database Transactions حقيقية.</div>
    <div class="en">🇬🇧 You've now built a full read/write layer over related tables with real foreign keys — exactly the skill an online store needs, plus one extra challenge: it's not just CRUD, you also need financial-style operations (like decrementing stock) to happen completely or not at all. That's the subject of the <a href="project7-ecommerce-backend.php">next project: E-Commerce Backend</a>, which introduces real database transactions.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li><code>getPublishedPosts()</code> بتستخدم <code>JOIN</code> واحد بدل استعلام لكل صف، مرتبة بـ <code>ORDER BY ... DESC</code>.</li>
        <li><code>getPostWithComments()</code> بترجع نتيجة متداخلة: مقال + مصفوفة تعليقات، كل تعليق فيه اسم صاحبه عن طريق JOIN تاني.</li>
        <li><code>createPost()</code> بترجع id حقيقي بـ <code>lastInsertId()</code>، ولازم تتأكد بـ SELECT تانية إن البيانات اتسجلت صح.</li>
        <li>حذف مقال له علاقات Foreign Key لازم يمسح الصفوف التابعة (التعليقات) الأول، وبعدين الصف الأساسي.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="../index.php">← الدروس / Lessons</a>
    <a href="project7-ecommerce-backend.php">مشروع 7 / Next: E-Commerce Backend →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
