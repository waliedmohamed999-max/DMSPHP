<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'crud-create-read';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'CRUD: Create و Read — CRUD: Create & Read';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">Stage 9 · CRUD Application</span>
<h1>CRUD: Create و Read <span class="ltr">CRUD: Create &amp; Read</span></h1>
<p class="subtitle">إضافة Task جديدة وعرض القايمة — حقيقي بـ PDO ضد الـ Sandbox. <span class="ltr">Adding a new task and listing them — real, with PDO against the sandbox.</span></p>

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
    <div class="ar">🇪🇬 تكتب أول دالتين حقيقيتين في مشروع Task Manager: <code>createTask()</code> اللي بتضيف مهمة جديدة وترجع الـ <code>id</code> بتاعها، و<code>listTasksForUser()</code> اللي بتجيب كل مهام مستخدم معيّن. الاتنين هيشتغلوا فعليًا على نفس الـ Schema اللي صممناها في الدرس اللي فات — من غير أي "نتيجة متخيّلة".</div>
    <div class="en">🇬🇧 You'll write the first two real functions in the Task Manager project: <code>createTask()</code>, which adds a new task and returns its <code>id</code>, and <code>listTasksForUser()</code>, which fetches all tasks belonging to a given user. Both actually run against the same schema designed in the previous lesson — no imagined output.</div>
</div>

<h2 id="understand">🧠 1) نفس الـ Schema، من الأول / Same Schema, From Scratch</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 زي ما اتشرح في الدرس اللي فات، كل درس صفحة مستقلة، فهنعيد <code>CREATE TABLE task_categories</code> و<code>CREATE TABLE tasks</code> هنا تاني قبل ما نستخدمهم — مش تكرار غلط، ده متطلب لإن الـ Sandbox بتاعت PHP بتتصفّر مع كل تشغيلة Script.</div>
    <div class="en">🇬🇧 As explained in the previous lesson, every lesson page is an independent script, so we re-run <code>CREATE TABLE task_categories</code> and <code>CREATE TABLE tasks</code> here again before using them — not a mistake, it's necessary because PHP's sandbox resets on every script run.</div>
</div>

<h2>2) <code>createTask()</code> — إضافة مهمة</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <code>createTask()</code> بتاخد <code>PDO</code>، رقم المستخدم، العنوان، وفئة اختيارية (<code>?int $categoryId</code> — علامة <code>?</code> معناها الـ Parameter ممكن يكون <code>null</code>)، بتعمل <code>INSERT</code> بـ Prepared Statement، وبترجع الـ <code>id</code> الجديد بـ <code>$pdo-&gt;lastInsertId()</code>. رجوع الـ <code>id</code> مهم عمليًا: أي كود تاني (زي redirect لصفحة المهمة الجديدة) محتاجه فورًا.</div>
    <div class="en">🇬🇧 <code>createTask()</code> takes a <code>PDO</code>, the user id, the title, and an optional category (<code>?int $categoryId</code> — the <code>?</code> means the parameter can be <code>null</code>), runs an <code>INSERT</code> with a prepared statement, and returns the new <code>id</code> via <code>$pdo-&gt;lastInsertId()</code>. Returning the id matters in practice: other code (like redirecting to the new task's page) needs it right away.</div>
</div>

<h2>3) <code>listTasksForUser()</code> — عرض المهام</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <code>listTasksForUser()</code> بتاخد <code>PDO</code> ورقم مستخدم، وبترجع Array فيها كل مهامه (باستخدام <code>WHERE tasks.user_id = ?</code>) مع اسم الفئة عن طريق <code>LEFT JOIN</code> — <code>LEFT JOIN</code> مش <code>JOIN</code> عادي عشان المهام اللي مالهاش فئة (<code>category_id IS NULL</code>) تفضل تظهر بدل ما تختفي.</div>
    <div class="en">🇬🇧 <code>listTasksForUser()</code> takes a <code>PDO</code> and a user id, returning an array of all their tasks (using <code>WHERE tasks.user_id = ?</code>) with the category name via <code>LEFT JOIN</code> — <code>LEFT JOIN</code>, not a plain <code>JOIN</code>, so tasks with no category (<code>category_id IS NULL</code>) still show up instead of disappearing.</div>
</div>

<h2 id="practice">💻 التنفيذ الفعلي / Actually Running It</h2>
<pre><code>&lt;?php
require __DIR__ . '/../db-sandbox/schema.php';
$pdo = build_sandbox_pdo();

$pdo-&gt;exec('CREATE TABLE task_categories (id INTEGER PRIMARY KEY AUTOINCREMENT, name TEXT NOT NULL)');
$pdo-&gt;exec('
    CREATE TABLE tasks (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        user_id INTEGER NOT NULL,
        category_id INTEGER,
        title TEXT NOT NULL,
        is_done INTEGER NOT NULL DEFAULT 0,
        created_at TEXT NOT NULL,
        FOREIGN KEY (user_id) REFERENCES users(id),
        FOREIGN KEY (category_id) REFERENCES task_categories(id)
    )
');
$catStmt = $pdo-&gt;prepare('INSERT INTO task_categories (id, name) VALUES (?, ?)');
foreach ([[1, 'Work'], [2, 'Personal']] as $c) {
    $catStmt-&gt;execute($c);
}

function createTask(PDO $pdo, int $userId, string $title, ?int $categoryId): int
{
    $stmt = $pdo-&gt;prepare('
        INSERT INTO tasks (user_id, category_id, title, is_done, created_at)
        VALUES (?, ?, ?, 0, ?)
    ');
    $stmt-&gt;execute([$userId, $categoryId, $title, date('Y-m-d')]);
    return (int) $pdo-&gt;lastInsertId();
}

function listTasksForUser(PDO $pdo, int $userId): array
{
    $stmt = $pdo-&gt;prepare('
        SELECT tasks.id, tasks.title, tasks.is_done, task_categories.name AS category
        FROM tasks
        LEFT JOIN task_categories ON task_categories.id = tasks.category_id
        WHERE tasks.user_id = ?
        ORDER BY tasks.id
    ');
    $stmt-&gt;execute([$userId]);
    return $stmt-&gt;fetchAll(PDO::FETCH_ASSOC);
}

$id1 = createTask($pdo, 1, 'Write the CRUD lesson', 1);
$id2 = createTask($pdo, 1, 'Pick up dry cleaning', 2);
echo "createTask() -&gt; new task id: $id1" . PHP_EOL;
echo "createTask() -&gt; new task id: $id2" . PHP_EOL;

echo PHP_EOL . '--- listTasksForUser(pdo, 1) ---' . PHP_EOL;
foreach (listTasksForUser($pdo, 1) as $row) {
    $status = $row['is_done'] ? 'done' : 'pending';
    $cat = $row['category'] ?? '(no category)';
    echo "#{$row['id']} {$row['title']} [{$cat}] - $status" . PHP_EOL;
}</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">createTask() -> new task id: 1
createTask() -> new task id: 2

--- listTasksForUser(pdo, 1) ---
#1 Write the CRUD lesson [Work] - pending
#2 Pick up dry cleaning [Personal] - pending</div>

<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ إن <code>createTask()</code> رجّعت 1 وبعدين 2 — دي نفس منطق <code>AUTOINCREMENT</code> اللي شفته قبل كده، وبيثبت إن <code>lastInsertId()</code> بيتبع فعليًا الـ INSERT اللي حصل، مش رقم ثابت.</div>
    <div class="en">🇬🇧 Notice <code>createTask()</code> returned 1, then 2 — this is the same <code>AUTOINCREMENT</code> logic seen earlier, proving <code>lastInsertId()</code> genuinely tracks the INSERT that just happened, not a fixed number.</div>
</div>

<div class="bi-block">
    <div class="ar">🇪🇬 جرّب بنفسك في المحرر تحت — ضيف مهمة تالتة بفئة مختلفة (أو من غير فئة أصلًا بـ <code>null</code>)، وشوف <code>listTasksForUser()</code> بترجع إيه.</div>
    <div class="en">🇬🇧 Try it yourself in the editor below — add a third task with a different category (or none at all, using <code>null</code>), and see what <code>listTasksForUser()</code> returns.</div>
</div>

<div class="mini-editor-wrap">
    <textarea spellcheck="false">&lt;?php
$pdo = new PDO('sqlite::memory:', null, null, [
    PDO::ATTR_ERRMODE =&gt; PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE =&gt; PDO::FETCH_ASSOC,
]);
$pdo-&gt;exec('CREATE TABLE task_categories (id INTEGER PRIMARY KEY AUTOINCREMENT, name TEXT NOT NULL)');
$pdo-&gt;exec('CREATE TABLE tasks (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    user_id INTEGER NOT NULL,
    category_id INTEGER,
    title TEXT NOT NULL,
    is_done INTEGER NOT NULL DEFAULT 0,
    created_at TEXT NOT NULL
)');
$catStmt = $pdo-&gt;prepare('INSERT INTO task_categories (id, name) VALUES (?, ?)');
foreach ([[1, 'Work'], [2, 'Personal']] as $c) {
    $catStmt-&gt;execute($c);
}

function createTask(PDO $pdo, int $userId, string $title, ?int $categoryId): int
{
    $stmt = $pdo-&gt;prepare('INSERT INTO tasks (user_id, category_id, title, is_done, created_at) VALUES (?, ?, ?, 0, ?)');
    $stmt-&gt;execute([$userId, $categoryId, $title, date('Y-m-d')]);
    return (int) $pdo-&gt;lastInsertId();
}

function listTasksForUser(PDO $pdo, int $userId): array
{
    $stmt = $pdo-&gt;prepare('
        SELECT tasks.id, tasks.title, tasks.is_done, task_categories.name AS category
        FROM tasks
        LEFT JOIN task_categories ON task_categories.id = tasks.category_id
        WHERE tasks.user_id = ?
        ORDER BY tasks.id
    ');
    $stmt-&gt;execute([$userId]);
    return $stmt-&gt;fetchAll();
}

createTask($pdo, 1, 'Write the CRUD lesson', 1);
createTask($pdo, 1, 'Pick up dry cleaning', 2);
createTask($pdo, 1, 'A task with no category yet', null); // try changing this

foreach (listTasksForUser($pdo, 1) as $row) {
    $status = $row['is_done'] ? 'done' : 'pending';
    $cat = $row['category'] ?? '(no category)';
    echo "#{$row['id']} {$row['title']} [{$cat}] - $status" . PHP_EOL;
}</textarea>
    <div class="mini-toolbar">
        <button class="mini-run-btn">▶ شغّل / Run</button>
        <span class="mini-status"></span>
    </div>
    <div class="output-box">— لسه متشغلش / not run yet —</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="lastid">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">إيه اللي بيرجعه <code>$pdo-&gt;lastInsertId()</code> بعد <code>INSERT</code>؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What does <code>$pdo-&gt;lastInsertId()</code> return after an <code>INSERT</code>?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="count"> عدد الصفوف في الجدول</label>
        <label><input type="radio" name="q1" value="lastid"> الـ <code>id</code> اللي اتولّد أوتوماتيك للصف اللي اتضاف</label>
        <label><input type="radio" name="q1" value="bool"> true أو false بس</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="leftjoin">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">ليه <code>listTasksForUser()</code> بتستخدم <code>LEFT JOIN</code> بدل <code>JOIN</code> عادي مع <code>task_categories</code>؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Why does <code>listTasksForUser()</code> use <code>LEFT JOIN</code> instead of a plain <code>JOIN</code> with <code>task_categories</code>?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="fast"> عشان يبقى أسرع</label>
        <label><input type="radio" name="q2" value="leftjoin"> عشان المهام من غير فئة (<code>category_id IS NULL</code>) تفضل تظهر</label>
        <label><input type="radio" name="q2" value="syntax"> مفيش فرق، الاختيار عشوائي</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="nullable">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">في توقيع <code>createTask(PDO $pdo, int $userId, string $title, ?int $categoryId): int</code>، علامة <code>?</code> قبل <code>int $categoryId</code> معناها إيه؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">In <code>createTask(PDO $pdo, int $userId, string $title, ?int $categoryId): int</code>, what does the <code>?</code> before <code>int $categoryId</code> mean?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="optional"> إن الـ Parameter اختياري ومش لازم تديله قيمة أصلًا</label>
        <label><input type="radio" name="q3" value="nullable"> إن الـ Parameter ممكن يكون <code>int</code> أو <code>null</code></label>
        <label><input type="radio" name="q3" value="array"> إنه Array من الأرقام</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="one">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">في المثال الفعلي فوق، بعد ما اتنادت <code>createTask()</code> مرتين، إيه قيمة <code>$id1</code>؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">In the actual example above, after calling <code>createTask()</code> twice, what is <code>$id1</code>?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="one"> 1</label>
        <label><input type="radio" name="q4" value="two"> 2</label>
        <label><input type="radio" name="q4" value="zero"> 0</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ عدّاد المهام لكل مستخدم / A Task Counter per User</h3>
    <div class="ar">🇪🇬 في المحرر المصغّر فوق (أو <a href="../playground/index.php">الـ Playground</a>): اكتب دالة <code>countTasksForUser(PDO $pdo, int $userId): int</code> بترجع عدد مهام المستخدم باستخدام <code>SELECT COUNT(*)</code>، واختبرها بعد ما تضيف 3 مهام لمستخدم واحد.</div>
    <div class="en">🇬🇧 In the mini editor above (or the <a href="../playground/index.php">Playground</a>): write a <code>countTasksForUser(PDO $pdo, int $userId): int</code> function that returns the user's task count using <code>SELECT COUNT(*)</code>, and test it after adding 3 tasks for one user.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 دلوقتي عندنا مهام بتتضاف وتتعرض. الدرس الجاي هيكمّل الصورة: إزاي تعدّل حالة مهمة (خلصت/لسه) أو تمسحها، وليه لازم تتأكد إن المستخدم بيعدّل مهامه هو بس — مش مهام حد تاني.</div>
    <div class="en">🇬🇧 Now we have tasks being created and listed. The next lesson completes the picture: how to update a task's status (done/pending) or delete it, and why you must make sure a user only touches their own tasks — never someone else's.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li><code>createTask()</code>: <code>INSERT</code> بـ Prepared Statement، بترجع <code>lastInsertId()</code>.</li>
        <li><code>listTasksForUser()</code>: <code>SELECT ... WHERE user_id = ?</code> مع <code>LEFT JOIN</code> على الفئة عشان المهام من غير فئة تفضل تظهر.</li>
        <li><code>?int $categoryId</code> يعني الـ Parameter نوعه <code>int</code> أو <code>null</code> — بالظبط زي عمود <code>category_id</code> القابل NULL.</li>
        <li>كل استعلام هنا نفّذ فعليًا وطبع نتيجة حقيقية، مش نص متخيّل.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="crud-planning-setup.php">← المرحلة السابقة / Previous: Planning</a>
    <a href="crud-update-delete.php">المرحلة الجاية / Next: Update & Delete →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
