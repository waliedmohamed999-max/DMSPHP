<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'sql-groupby-having';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'SQL: GROUP BY & HAVING';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">Stage 7 · MySQL & SQL</span>
<h1>SQL: GROUP BY و HAVING <span class="ltr">SQL: GROUP BY &amp; HAVING</span></h1>
<p class="subtitle">تجميع الصفوف لإحصائيات (عدد، مجموع، متوسط)، والفلترة بعد التجميع بـ HAVING. <span class="ltr">Grouping rows for statistics (count, sum, average), and filtering after grouping with HAVING.</span></p>

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
    <div class="ar">🇪🇬 تقدر تجمّع صفوف متشابهة في مجموعات بـ <code>GROUP BY</code>، وتحسب إحصائية لكل مجموعة بدوال زي <code>COUNT</code>, <code>SUM</code>, <code>AVG</code>، وتفلتر المجموعات نفسها (مش الصفوف) بـ <code>HAVING</code>. الفرق بين <code>WHERE</code> و<code>HAVING</code> هنا أهم نقطة في الدرس.</div>
    <div class="en">🇬🇧 Group similar rows together with <code>GROUP BY</code>, compute a per-group statistic with functions like <code>COUNT</code>, <code>SUM</code>, <code>AVG</code>, and filter the groups themselves (not the rows) with <code>HAVING</code>. The difference between <code>WHERE</code> and <code>HAVING</code> is the single most important point in this lesson.</div>
</div>

<h2 id="understand">🧠 1) GROUP BY — تجميع الصفوف</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <code>GROUP BY column</code> بيجمع كل الصفوف اللي عندها نفس قيمة <code>column</code> في مجموعة واحدة، وبيرجّع صف واحد لكل مجموعة. عادة بتستخدمه مع دالة تجميع (Aggregate Function) زي <code>COUNT(*)</code> عشان تحسب حاجة عن كل مجموعة — زي "كام مقال كتب كل مستخدم؟".</div>
    <div class="en">🇬🇧 <code>GROUP BY column</code> collapses every row sharing the same <code>column</code> value into one group, returning a single row per group. You typically pair it with an aggregate function like <code>COUNT(*)</code> to compute something about each group — like "how many posts did each user write?".</div>
</div>

<pre><code>&lt;?php
require __DIR__ . '/../db-sandbox/schema.php';
$pdo = build_sandbox_pdo();

$rows = $pdo->query("SELECT user_id, COUNT(*) as post_count FROM posts GROUP BY user_id")->fetchAll(PDO::FETCH_ASSOC);
print_r($rows);</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">Array
(
    [0] => Array ( [user_id] => 1 [post_count] => 2 )
    [1] => Array ( [user_id] => 2 [post_count] => 2 )
    [2] => Array ( [user_id] => 3 [post_count] => 1 )
    [3] => Array ( [user_id] => 4 [post_count] => 2 )
    [4] => Array ( [user_id] => 5 [post_count] => 1 )
)</div>
<div class="bi-block">
    <div class="ar">🇪🇬 الـ 8 مقالات في <code>posts</code> اترجعوا كـ 5 صفوف بس — واحد لكل <code>user_id</code> مختلف — وكل صف معاه <code>COUNT(*)</code> لعدد المقالات اللي كتبها المستخدم ده.</div>
    <div class="en">🇬🇧 The 8 rows in <code>posts</code> collapsed into just 5 rows — one per distinct <code>user_id</code> — each carrying <code>COUNT(*)</code> for how many posts that user wrote.</div>
</div>

<h2>2) HAVING — فلترة المجموعات بعد التجميع</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <code>WHERE</code> بيفلتر الصفوف <b>قبل</b> التجميع، و<code>HAVING</code> بيفلتر المجموعات <b>بعد</b> ما تتجمع — عشان كده مينفعش تكتب <code>WHERE COUNT(*) > 1</code> (الصفوف الخام لسه ماعندهاش <code>COUNT</code>)، لازم <code>HAVING COUNT(*) > 1</code>. مثال: أنهي مقالات فيها أكتر من تعليق واحد؟</div>
    <div class="en">🇬🇧 <code>WHERE</code> filters rows <b>before</b> grouping, while <code>HAVING</code> filters the groups <b>after</b> they're formed — which is why you can't write <code>WHERE COUNT(*) > 1</code> (raw rows don't have a <code>COUNT</code> yet), you need <code>HAVING COUNT(*) > 1</code>. Example: which posts have more than one comment?</div>
</div>

<pre><code>&lt;?php
$rows = $pdo->query("SELECT post_id, COUNT(*) as comment_count FROM comments GROUP BY post_id HAVING COUNT(*) > 1")->fetchAll(PDO::FETCH_ASSOC);
print_r($rows);</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">Array
(
    [0] => Array ( [post_id] => 1 [comment_count] => 2 )
    [1] => Array ( [post_id] => 4 [comment_count] => 2 )
    [2] => Array ( [post_id] => 6 [comment_count] => 2 )
    [3] => Array ( [post_id] => 8 [comment_count] => 2 )
)</div>
<div class="bi-block">
    <div class="ar">🇪🇬 من أصل 8 مقالات، 4 بس هي اللي عندها أكتر من تعليق (المقالات 1، 4، 6، 8 — كل واحدة بيها تعليقين بالظبط). المقالات التانية (2، 3، 5، 7) اتشالت لإن <code>HAVING</code> رفضها بعد ما شاف إن <code>COUNT(*)</code> بتاعها 1 أو أقل.</div>
    <div class="en">🇬🇧 Out of 8 posts, only 4 have more than one comment (posts 1, 4, 6, 8 — each with exactly two comments). The rest (2, 3, 5, 7) were dropped because <code>HAVING</code> rejected them once it saw their <code>COUNT(*)</code> was 1 or fewer.</div>
</div>

<h2 id="practice">💻 SUM و AVG معًا / SUM and AVG Together</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 تقدر تحط أكتر من دالة تجميع في نفس الاستعلام. المثال ده بيحسب لكل مستخدم: عدد مقالاته، مجموع المشاهدات (<code>SUM</code>)، ومتوسط المشاهدات (<code>AVG</code>) — ومرتّب حسب مجموع المشاهدات تنازليًا.</div>
    <div class="en">🇬🇧 You can combine multiple aggregate functions in the same query. This example computes, per user: their post count, total views (<code>SUM</code>), and average views (<code>AVG</code>) — ordered by total views descending.</div>
</div>

<pre><code>&lt;?php
$rows = $pdo->query("
    SELECT user_id, COUNT(*) as post_count, SUM(views) as total_views, AVG(views) as avg_views
    FROM posts
    GROUP BY user_id
    ORDER BY total_views DESC
")->fetchAll(PDO::FETCH_ASSOC);
print_r($rows);</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">Array
(
    [0] => Array ( [user_id] => 4 [post_count] => 2 [total_views] => 510 [avg_views] => 255 )
    [1] => Array ( [user_id] => 1 [post_count] => 2 [total_views] => 460 [avg_views] => 230 )
    [2] => Array ( [user_id] => 3 [post_count] => 1 [total_views] => 175 [avg_views] => 175 )
    [3] => Array ( [user_id] => 2 [post_count] => 2 [total_views] => 145 [avg_views] => 72.5 )
    [4] => Array ( [user_id] => 5 [post_count] => 1 [total_views] => 95 [avg_views] => 95 )
)</div>
<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ user_id=4 (Laila Mostafa) عنده أعلى <code>total_views</code> (510) مع بوستين بس، بينما user_id=2 (Sara Ali) عنده نفس عدد البوستات (2) لكن <code>total_views</code> أقل بكتير (145) — يعني <code>AVG</code> بتاعه (72.5) أقل نص من متوسط Laila.</div>
    <div class="en">🇬🇧 Notice user_id=4 (Laila Mostafa) has the highest <code>total_views</code> (510) with just 2 posts, while user_id=2 (Sara Ali) has the same post count (2) but far fewer <code>total_views</code> (145) — meaning her <code>AVG</code> (72.5) is roughly half Laila's.</div>
</div>

<div class="bi-block">
    <div class="ar">🇪🇬 جرّب بنفسك: غيّر <code>HAVING COUNT(*) > 1</code> لـ <code>HAVING COUNT(*) >= 2</code> (نفس النتيجة) أو <code>> 2</code> (هترجع فاضية — مفيش مقال بأكتر من تعليقين في الـ Sandbox).</div>
    <div class="en">🇬🇧 Try it yourself: change <code>HAVING COUNT(*) > 1</code> to <code>HAVING COUNT(*) >= 2</code> (same result) or <code>> 2</code> (returns empty — no post in the sandbox has more than 2 comments).</div>
</div>

<div class="mini-editor-wrap">
    <textarea spellcheck="false">&lt;?php
require __DIR__ . '/../db-sandbox/schema.php';
$pdo = build_sandbox_pdo();

echo "-- posts with more than 2 comments --" . PHP_EOL;
$rows = $pdo->query("SELECT post_id, COUNT(*) as comment_count FROM comments GROUP BY post_id HAVING COUNT(*) > 2")->fetchAll(PDO::FETCH_ASSOC);
print_r($rows);
echo count($rows) === 0 ? "(empty — confirmed no post has more than 2 comments)" . PHP_EOL : '';

echo PHP_EOL . "-- comments per user, only users with 3+ comments --" . PHP_EOL;
$rows2 = $pdo->query("SELECT user_id, COUNT(*) as comment_count FROM comments GROUP BY user_id HAVING COUNT(*) >= 3")->fetchAll(PDO::FETCH_ASSOC);
print_r($rows2);</textarea>
    <div class="mini-toolbar">
        <button class="mini-run-btn">▶ شغّل / Run</button>
        <span class="mini-status"></span>
    </div>
    <div class="output-box">— لسه متشغلش / not run yet —</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="five">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question"><code>SELECT user_id, COUNT(*) FROM posts GROUP BY user_id</code> بيرجّع كام صف من أصل 8 مقالات؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">How many rows does <code>SELECT user_id, COUNT(*) FROM posts GROUP BY user_id</code> return, out of 8 posts?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="eight"> 8 — صف لكل مقال</label>
        <label><input type="radio" name="q1" value="five"> 5 — صف لكل مستخدم مختلف كتب مقال</label>
        <label><input type="radio" name="q1" value="one"> 1 — صف واحد إجمالي</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="after">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question"><code>HAVING</code> بيفلتر إيه بالظبط؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What exactly does <code>HAVING</code> filter?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="before"> الصفوف الخام قبل التجميع</label>
        <label><input type="radio" name="q2" value="after"> المجموعات بعد ما تتجمع (زي نتيجة COUNT)</label>
        <label><input type="radio" name="q2" value="columns"> أعمدة الجدول نفسها</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="four">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">في مثال <code>HAVING COUNT(*) > 1</code> على <code>comments</code>، كام مقال (post_id) فعليًا عنده أكتر من تعليق؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">In the <code>HAVING COUNT(*) > 1</code> example on <code>comments</code>, how many posts actually have more than one comment?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="eight"> 8 — كل المقالات</label>
        <label><input type="radio" name="q3" value="four"> 4</label>
        <label><input type="radio" name="q3" value="zero"> 0</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="laila">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">في مثال SUM/AVG، مين المستخدم اللي عنده أعلى <code>total_views</code> (510)؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">In the SUM/AVG example, which user has the highest <code>total_views</code> (510)?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="sara"> Sara Ali (user_id 2)</label>
        <label><input type="radio" name="q4" value="laila"> Laila Mostafa (user_id 4)</label>
        <label><input type="radio" name="q4" value="ahmed"> Ahmed Hassan (user_id 1)</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ أكتر المعلّقين نشاطًا / The Most Active Commenters</h3>
    <div class="ar">🇪🇬 في <a href="../db-sandbox/index.php">Database Playground</a>: اكتب استعلام يجمّع جدول <code>comments</code> حسب <code>user_id</code>، يحسب <code>COUNT(*)</code> كـ <code>comment_count</code>، ويستخدم <code>HAVING COUNT(*) >= 2</code> عشان يعرض بس المستخدمين اللي علّقوا مرتين أو أكتر، مرتّبين تنازليًا حسب <code>comment_count</code>.</div>
    <div class="en">🇬🇧 In the <a href="../db-sandbox/index.php">Database Playground</a>: write a query that groups <code>comments</code> by <code>user_id</code>, computes <code>COUNT(*)</code> as <code>comment_count</code>, and uses <code>HAVING COUNT(*) >= 2</code> to show only users who commented twice or more, ordered by <code>comment_count</code> descending.</div>
    <p class="ltr" style="color:var(--muted);font-size:0.85em">Verified working (real result): user_id 1 → 3 comments, user_id 2 → 3 comments, user_id 4 → 2 comments — the rest have 1 or fewer and are filtered out.</p>
</div>

<div class="exercise-box">
    <h3>✍️ تمرين إضافي / Extra Exercise</h3>
    <div class="ar">🇪🇬 اكتب استعلام يجيب <code>role</code> من <code>users</code> مع <code>COUNT(*)</code> لعدد المستخدمين في كل دور (<code>GROUP BY role</code>)، من غير <code>HAVING</code>. فكّر: هل النتيجة هترجع 3 صفوف (admin, user, editor) بعدد صحيح لكل واحد؟</div>
    <div class="en">🇬🇧 Write a query that returns <code>role</code> from <code>users</code> with <code>COUNT(*)</code> of users per role (<code>GROUP BY role</code>), no <code>HAVING</code> needed. Think: does the result come back as 3 rows (admin, user, editor) with the right count each?</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <code>GROUP BY</code>/<code>HAVING</code> هي أساس أي Dashboard إحصائي هتبنيه — "أكتر منتج مبيعًا"، "متوسط تقييم لكل مطعم"، "عدد الطلبات لكل عميل". الدرس الجاي بيوريك إزاي تجيب بيانات من جدولين مرتبطين في استعلام واحد بـ JOIN، وهيستخدم بالظبط نفس أعمدة الـ Foreign Key اللي شفتها في درس Fundamentals. الدرس الجاي: <a href="sql-joins-deep-dive.php">SQL: JOINs in Depth</a>.</div>
    <div class="en">🇬🇧 <code>GROUP BY</code>/<code>HAVING</code> underpin any statistics dashboard you'll build — "best-selling product", "average rating per restaurant", "order count per customer". The next lesson shows you how to pull data from two related tables in one query with JOIN, using the exact same Foreign Key columns you saw in the Fundamentals lesson. Next lesson: <a href="sql-joins-deep-dive.php">SQL: JOINs in Depth</a>.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li><code>GROUP BY column</code> — بيجمّع الصفوف المتشابهة في صف واحد لكل مجموعة.</li>
        <li>دوال التجميع: <code>COUNT(*)</code>, <code>SUM(column)</code>, <code>AVG(column)</code> — بتحسب إحصائية لكل مجموعة.</li>
        <li><code>WHERE</code> بيفلتر الصفوف قبل التجميع، <code>HAVING</code> بيفلتر المجموعات بعد التجميع — مش نفس الحاجة.</li>
        <li>تقدر تجمع أكتر من دالة تجميع وتاخد <code>ORDER BY</code> على أي منها.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="sql-insert-update-delete.php">← المرحلة السابقة</a>
    <a href="sql-joins-deep-dive.php">الدرس الجاي / Next: SQL: JOINs in Depth →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
