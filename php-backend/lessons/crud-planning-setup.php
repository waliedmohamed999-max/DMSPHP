<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'crud-planning-setup';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'تخطيط مشروع Task Management — Planning the Task Management Project';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">Stage 9 · CRUD Application</span>
<h1>تخطيط مشروع Task Management <span class="ltr">Planning the Task Management Project</span></h1>
<p class="subtitle">المتطلبات، تصميم جداول Users/Tasks/Categories، وهيكل الملفات قبل أول سطر كود. <span class="ltr">Requirements, designing the Users/Tasks/Categories tables, and file structure before the first line of code.</span></p>

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
    <div class="ar">🇪🇬 المرحلة دي هتبني مشروع حقيقي كامل: <b>Task Management System</b> — نظام لإدارة مهام لمستخدمين، كل مهمة تقدر تتصنّف تحت فئة (Category)، وتتعلّم تعمل عليها Create/Read/Update/Delete حقيقي بـ PDO. قبل أي سطر كود، الدرس ده بيغطي المتطلبات الدقيقة وتصميم الجداول اللي كل الدروس الجاية هتبني عليها.</div>
    <div class="en">🇬🇧 This stage builds a complete real project: a <b>Task Management System</b> — managing tasks for users, where each task can optionally belong to a category, with real Create/Read/Update/Delete operations against PDO. Before writing a single line of code, this lesson covers the exact requirements and the table design every following lesson builds on.</div>
</div>

<h2 id="understand">🧠 1) المتطلبات / The Requirements</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 قبل تصميم أي Schema، لازم تكتب المتطلبات بوضوح — دي أهم خطوة بيتجاهلها المبتدئين وبيقفزوا على الكود على طول. متطلبات مشروعنا بالظبط:<br>
    • مستخدم واحد (<code>users</code> — موجود بالفعل في الـ Sandbox) عنده <b>أكتر من مهمة</b> (One-to-Many).<br>
    • المهمة (<code>tasks</code>) ليها <b>مالك واحد بس</b> (<code>user_id</code>)، وده لازم يكون <code>NOT NULL</code> — مفيش مهمة من غير صاحب.<br>
    • المهمة ممكن (اختياريًا) تنتمي لفئة واحدة (<code>task_categories</code>) — يعني <code>category_id</code> لازم يكون قابل يبقى <code>NULL</code>.<br>
    • المهمة ليها حالة: <b>خلصت</b> أو <b>لسه</b> — عمود <code>is_done</code> رقم صحيح (0 أو 1)، افتراضيًا 0.<br>
    • كل مهمة ليها تاريخ إنشاء (<code>created_at</code>).<br>
    • كل فئة (Category) ليها اسم بس، زي "Work" أو "Personal".</div>
    <div class="en">🇬🇧 Before designing any schema, you need to write down requirements clearly — this is the step beginners skip most, jumping straight to code. Our project's exact requirements:<br>
    • One user (<code>users</code> — already in the sandbox) has <b>many tasks</b> (One-to-Many).<br>
    • A task (<code>tasks</code>) has <b>exactly one owner</b> (<code>user_id</code>), and this must be <code>NOT NULL</code> — no task without an owner.<br>
    • A task can (optionally) belong to one category (<code>task_categories</code>) — so <code>category_id</code> must be nullable.<br>
    • A task has a status: <b>done</b> or <b>pending</b> — an <code>is_done</code> integer column (0 or 1), defaulting to 0.<br>
    • Every task has a creation date (<code>created_at</code>).<br>
    • Every category just has a name, like "Work" or "Personal".</div>
</div>

<h2>2) تصميم الجداول / Table Design</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 من المتطلبات فوق، العلاقات واضحة: <code>users</code> ↔ <code>tasks</code> هي One-to-Many (زي <code>users</code>/<code>posts</code> اللي شفتها في درس العلاقات)، و<code>task_categories</code> ↔ <code>tasks</code> برضو One-to-Many لكن اختيارية (الـ Foreign Key قابل يبقى NULL). لاحظ إن <code>tasks</code> هي الجدول اللي فيه الـ Foreign Keys الاتنين — لإنها الجدول "الكتير" في العلاقتين مع بعض.</div>
    <div class="en">🇬🇧 From the requirements above, the relationships are clear: <code>users</code> ↔ <code>tasks</code> is One-to-Many (just like <code>users</code>/<code>posts</code> from the relationships lesson), and <code>task_categories</code> ↔ <code>tasks</code> is also One-to-Many, but optional (the Foreign Key is nullable). Notice <code>tasks</code> holds both Foreign Keys — it's the "many" side of both relationships at once.</div>
</div>

<div class="flow-diagram">
    <div class="flow-box">users (id, name, ...) — 1</div>
    <div class="flow-arrow">↓ user_id (required)</div>
    <div class="flow-box">tasks (id, user_id, category_id, title, is_done, created_at) — many</div>
    <div class="flow-arrow">↑ category_id (optional)</div>
    <div class="flow-box">task_categories (id, name) — 1</div>
</div>

<pre><code>CREATE TABLE task_categories (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT NOT NULL
);
CREATE TABLE tasks (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    user_id INTEGER NOT NULL,
    category_id INTEGER,
    title TEXT NOT NULL,
    is_done INTEGER NOT NULL DEFAULT 0,
    created_at TEXT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (category_id) REFERENCES task_categories(id)
);</code></pre>

<div class="bi-block">
    <div class="ar">🇪🇬 هيكل الملفات اللي هنستخدمه في باقي المرحلة بسيط: دالة <code>createTask()</code> و<code>listTasksForUser()</code> (درس Create/Read)، <code>markTaskDone()</code> و<code>deleteTask()</code> (درس Update/Delete)، ودوال بحث/فلترة/ترقيم صفحات (درس Search/Filter/Pagination)، وكلها بتتحقق قبل ما توصل لقاعدة البيانات (درس Validation). كل دالة بتاخد <code>PDO $pdo</code> كأول Parameter — نفس نمط الـ Dependency Injection البسيط اللي بيسهّل الاختبار.</div>
    <div class="en">🇬🇧 The file structure for the rest of this stage is simple: a <code>createTask()</code> and <code>listTasksForUser()</code> (Create/Read lesson), <code>markTaskDone()</code> and <code>deleteTask()</code> (Update/Delete lesson), and search/filter/pagination functions (that lesson), all validated before touching the database (Validation lesson). Every function takes <code>PDO $pdo</code> as its first parameter — a simple dependency-injection pattern that makes testing easy.</div>
</div>

<h2 id="practice">💻 3) تنفيذ الـ Schema فعليًا / Actually Running the Schema</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 كفاية كلام — الكود تحت بيشغّل جمل <code>CREATE TABLE</code> فعليًا ضد <code>build_sandbox_pdo()</code> (نفس الـ Sandbox اللي فيها <code>users</code> جاهزين بالفعل)، بيضيف 3 فئات، وبيزرع كام مهمة لمستخدمين مختلفين، وبيطبع تأكيد حقيقي (عدد الصفوف) مش افتراضي.</div>
    <div class="en">🇬🇧 Enough talk — the code below actually runs <code>CREATE TABLE</code> statements against <code>build_sandbox_pdo()</code> (the same sandbox that already has <code>users</code> ready), adds 3 categories, seeds a few tasks for different users, and prints real confirmation (row counts) — not a guess.</div>
</div>

<pre><code>&lt;?php
require __DIR__ . '/../db-sandbox/schema.php';
$pdo = build_sandbox_pdo();

$pdo-&gt;exec('
    CREATE TABLE task_categories (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        name TEXT NOT NULL
    )
');
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
echo "Tables created: task_categories, tasks" . PHP_EOL;

$catStmt = $pdo-&gt;prepare('INSERT INTO task_categories (id, name) VALUES (?, ?)');
foreach ([[1, 'Work'], [2, 'Personal'], [3, 'Shopping']] as $c) {
    $catStmt-&gt;execute($c);
}
$catCount = $pdo-&gt;query('SELECT COUNT(*) FROM task_categories')-&gt;fetchColumn();
echo "Categories inserted: $catCount row(s)" . PHP_EOL;

$taskStmt = $pdo-&gt;prepare('INSERT INTO tasks (user_id, category_id, title, is_done, created_at) VALUES (?, ?, ?, ?, ?)');
$seedTasks = [
    [1, 1, 'Finish the PDO lesson', 0, '2026-09-01'],
    [1, 2, 'Buy groceries', 0, '2026-09-01'],
    [2, 1, 'Review pull request', 1, '2026-09-02'],
];
foreach ($seedTasks as $t) {
    $taskStmt-&gt;execute($t);
}
$taskCount = $pdo-&gt;query('SELECT COUNT(*) FROM tasks')-&gt;fetchColumn();
echo "Tasks inserted: $taskCount row(s)" . PHP_EOL;

echo PHP_EOL . '--- tasks with owner and category ---' . PHP_EOL;
$rows = $pdo-&gt;query('
    SELECT tasks.id, users.name AS owner, task_categories.name AS category, tasks.title, tasks.is_done
    FROM tasks
    JOIN users ON users.id = tasks.user_id
    LEFT JOIN task_categories ON task_categories.id = tasks.category_id
    ORDER BY tasks.id
')-&gt;fetchAll(PDO::FETCH_ASSOC);
foreach ($rows as $row) {
    $status = $row['is_done'] ? 'done' : 'pending';
    echo "#{$row['id']} [{$row['category']}] {$row['title']} (owner: {$row['owner']}, $status)" . PHP_EOL;
}</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">Tables created: task_categories, tasks
Categories inserted: 3 row(s)
Tasks inserted: 3 row(s)

--- tasks with owner and category ---
#1 [Work] Finish the PDO lesson (owner: Ahmed Hassan, pending)
#2 [Personal] Buy groceries (owner: Ahmed Hassan, pending)
#3 [Work] Review pull request (owner: Sara Ali, done)</div>

<div class="bi-block">
    <div class="ar">🇪🇬 <b>ملحوظة مهمة وصريحة:</b> كل درس جاي في المرحلة دي هيعيد نفس جمل <code>CREATE TABLE</code> دي من الأول جوه كود الأمثلة بتاعته. مش لإن ده أسلوب كسول — كل صفحة درس بتشتغل كـ Script مستقل من الصفر (الـ Sandbox في الذاكرة وبتتصفّر مع كل تشغيلة)، فمفيش طريقة "تورّث" جدول اتعمل في صفحة تانية. في مشروع حقيقي، الـ Schema بتتعمل مرة واحدة في migration، ومش بتتكرر كده — التكرار هنا خاص بطبيعة إن كل درس تعليمي مستقل بذاته.</div>
    <div class="en">🇬🇧 <b>An honest, explicit note:</b> every following lesson in this stage repeats these exact <code>CREATE TABLE</code> statements at the top of its own example code. This isn't laziness — every lesson page runs as an independent, from-scratch script (the sandbox is in-memory and resets on every run), so there's no way to "inherit" a table created on another page. In a real project, the schema is created once via a migration and never repeated like this — the repetition here is specific to each lesson being a self-contained teaching unit.</div>
</div>

<div class="bi-block">
    <div class="ar">🇪🇬 جرّب بنفسك في المحرر تحت — زوّد فئة رابعة (زي "Health")، أو غيّر عناوين المهام، وشوف الناتج بيتغيّر إزاي.</div>
    <div class="en">🇬🇧 Try it yourself in the editor below — add a fourth category (like "Health"), or change the task titles, and see how the output changes.</div>
</div>

<div class="mini-editor-wrap">
    <textarea spellcheck="false">&lt;?php
// نسخة مستقلة تمامًا (بدون require) عشان تشتغل جوه المحرر المصغّر
$pdo = new PDO('sqlite::memory:', null, null, [
    PDO::ATTR_ERRMODE =&gt; PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE =&gt; PDO::FETCH_ASSOC,
]);
$pdo-&gt;exec('CREATE TABLE users (id INTEGER PRIMARY KEY AUTOINCREMENT, name TEXT NOT NULL)');
$pdo-&gt;exec('CREATE TABLE task_categories (id INTEGER PRIMARY KEY AUTOINCREMENT, name TEXT NOT NULL)');
$pdo-&gt;exec('CREATE TABLE tasks (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    user_id INTEGER NOT NULL,
    category_id INTEGER,
    title TEXT NOT NULL,
    is_done INTEGER NOT NULL DEFAULT 0,
    created_at TEXT NOT NULL
)');

$pdo-&gt;exec("INSERT INTO users (id, name) VALUES (1, 'Ahmed Hassan'), (2, 'Sara Ali')");

$catStmt = $pdo-&gt;prepare('INSERT INTO task_categories (id, name) VALUES (?, ?)');
foreach ([[1, 'Work'], [2, 'Personal'], [3, 'Shopping']] as $c) {
    $catStmt-&gt;execute($c);
}

$taskStmt = $pdo-&gt;prepare('INSERT INTO tasks (user_id, category_id, title, is_done, created_at) VALUES (?, ?, ?, ?, ?)');
foreach ([
    [1, 1, 'Finish the PDO lesson', 0, '2026-09-01'],
    [1, 2, 'Buy groceries', 0, '2026-09-01'],
    [2, 1, 'Review pull request', 1, '2026-09-02'],
] as $t) {
    $taskStmt-&gt;execute($t);
}

$rows = $pdo-&gt;query('
    SELECT tasks.id, users.name AS owner, task_categories.name AS category, tasks.title, tasks.is_done
    FROM tasks
    JOIN users ON users.id = tasks.user_id
    LEFT JOIN task_categories ON task_categories.id = tasks.category_id
    ORDER BY tasks.id
')-&gt;fetchAll();
foreach ($rows as $row) {
    $status = $row['is_done'] ? 'done' : 'pending';
    echo "#{$row['id']} [{$row['category']}] {$row['title']} (owner: {$row['owner']}, $status)" . PHP_EOL;
}</textarea>
    <div class="mini-toolbar">
        <button class="mini-run-btn">▶ شغّل / Run</button>
        <span class="mini-status"></span>
    </div>
    <div class="output-box">— لسه متشغلش / not run yet —</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="notnull">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">ليه <code>tasks.user_id</code> لازم يكون <code>NOT NULL</code> بينما <code>tasks.category_id</code> ممكن يبقى NULL؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Why must <code>tasks.user_id</code> be <code>NOT NULL</code> while <code>tasks.category_id</code> can be NULL?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="random"> بدون سبب، ده اختيار عشوائي</label>
        <label><input type="radio" name="q1" value="notnull"> كل مهمة لازم يكون ليها صاحب (متطلب أساسي)، لكن الفئة اختيارية حسب المتطلبات</label>
        <label><input type="radio" name="q1" value="speed"> عشان الأداء بس</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="tasks">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">أنهي جدول فيه الـ Foreign Keys الاتنين (<code>user_id</code> و<code>category_id</code>)؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Which table holds both Foreign Keys (<code>user_id</code> and <code>category_id</code>)?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="users"> <code>users</code></label>
        <label><input type="radio" name="q2" value="tasks"> <code>tasks</code> — لإنها الجدول "الكتير" في العلاقتين</label>
        <label><input type="radio" name="q2" value="categories"> <code>task_categories</code></label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="onetomany">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">علاقة <code>users</code> بـ <code>tasks</code> إيه نوعها؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What kind of relationship is <code>users</code> to <code>tasks</code>?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="onetoone"> One-to-One</label>
        <label><input type="radio" name="q3" value="onetomany"> One-to-Many</label>
        <label><input type="radio" name="q3" value="manytomany"> Many-to-Many</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="repeat">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">ليه هنعيد كتابة نفس جمل <code>CREATE TABLE</code> في كل درس جاي في المرحلة دي؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Why do we repeat the same <code>CREATE TABLE</code> statements in every following lesson in this stage?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="mistake"> غلطة في الموقع، ملحوظش حد</label>
        <label><input type="radio" name="q4" value="repeat"> كل درس بيشتغل كـ Script مستقل، والـ Sandbox في الذاكرة بتتصفّر كل تشغيلة</label>
        <label><input type="radio" name="q4" value="performance"> عشان يبقى الكود أسرع</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ زوّد فئة وربط أعمق / Add a Category and a Deeper Link</h3>
    <div class="ar">🇪🇬 في المحرر المصغّر فوق (أو <a href="../playground/index.php">الـ Playground</a>): زوّد فئة رابعة اسمها "Health"، اعمل مهمة جديدة للمستخدم رقم 2 (Sara Ali) في الفئة دي، وعدّل الاستعلام عشان يعرض <b>عدد المهام لكل فئة</b> باستخدام <code>GROUP BY category_id</code> بدل عرض كل مهمة لوحدها.</div>
    <div class="en">🇬🇧 In the mini editor above (or the <a href="../playground/index.php">Playground</a>): add a fourth category "Health", create a new task for user 2 (Sara Ali) in it, and modify the query to show <b>the count of tasks per category</b> using <code>GROUP BY category_id</code> instead of listing each task individually.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 الـ Schema اللي صممناها هنا هي الأساس لكل حاجة جاية: في الدرس الجاي هنكتب أول دوال حقيقية — <code>createTask()</code> و<code>listTasksForUser()</code> — وهنشغّلها فعليًا ضد نفس الجداول دي.</div>
    <div class="en">🇬🇧 The schema we designed here is the foundation for everything next: in the next lesson we'll write the first real functions — <code>createTask()</code> and <code>listTasksForUser()</code> — and actually run them against these same tables.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>المتطلبات: مستخدم له مهام كتير (One-to-Many)، مهمة ممكن (اختياريًا) تنتمي لفئة، ومهمة ليها حالة خلصت/لسه.</li>
        <li><code>tasks.user_id</code> إجباري (<code>NOT NULL</code>)، <code>tasks.category_id</code> اختياري (قابل NULL).</li>
        <li>الـ Schema اتنفّذت فعليًا ضد <code>build_sandbox_pdo()</code> مع فئات ومهام حقيقية — مش نظري.</li>
        <li>كل درس جاي في المرحلة هيعيد نفس الـ Schema دي لإنه بيشتغل كـ Script مستقل.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="../index.php">← الرئيسية / Home</a>
    <a href="crud-create-read.php">المرحلة الجاية / Next: CRUD Create & Read →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
