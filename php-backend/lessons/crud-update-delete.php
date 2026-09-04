<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'crud-update-delete';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'CRUD: Update و Delete — CRUD: Update & Delete';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">Stage 9 · CRUD Application</span>
<h1>CRUD: Update و Delete <span class="ltr">CRUD: Update &amp; Delete</span></h1>
<p class="subtitle">تعديل حالة Task (خلصت/لسه) وحذفها — مع التأكد إن المستخدم بيعدّل مهامه هو بس. <span class="ltr">Updating a task's status (done/pending) and deleting it — while making sure a user only edits their own tasks.</span></p>

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
    <div class="ar">🇪🇬 تكتب <code>markTaskDone()</code> و<code>deleteTask()</code> — بس المهم مش الكود نفسه، المهم نمط أساسي في أي نظام فيه مستخدمين: <b>Ownership Check</b>. لازم تتأكد إن المستخدم اللي بيعدّل أو بيمسح مهمة هو صاحبها فعلًا، وإلا أي مستخدم هيقدر يمسح مهام أي حد تاني بس لو عرف الـ <code>id</code> بتاعها.</div>
    <div class="en">🇬🇧 You'll write <code>markTaskDone()</code> and <code>deleteTask()</code> — but the real point isn't the code itself, it's a fundamental pattern in any multi-user system: the <b>Ownership Check</b>. You must confirm the user editing or deleting a task actually owns it, or else any user could delete anyone else's tasks just by guessing the <code>id</code>.</div>
</div>

<h2 id="understand">🧠 1) النمط الخطير: تحديث بدون تحقق من الملكية / The Dangerous Pattern: Updating Without an Ownership Check</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 تخيّل كتبت الكود كده: <code>UPDATE tasks SET is_done = 1 WHERE id = ?</code> بس بالـ <code>id</code> اللي جاي من الـ Request، من غير ما تتأكد إن الـ <code>id</code> ده ملك المستخدم الحالي. أي مستخدم مسجّل دخول (حتى لو مستخدم عادي) يقدر يبعت <code>id</code> مهمة حد تاني ويعدّلها أو يمسحها — الثغرة دي اسمها <b>Insecure Direct Object Reference (IDOR)</b> ومن أشهر الثغرات في أنظمة الـ CRUD الضعيفة.</div>
    <div class="en">🇬🇧 Imagine writing: <code>UPDATE tasks SET is_done = 1 WHERE id = ?</code> using an <code>id</code> straight from the request, without checking that <code>id</code> belongs to the current user. Any logged-in user (even a regular one) could send someone else's task <code>id</code> and edit or delete it — this vulnerability is called an <b>Insecure Direct Object Reference (IDOR)</b>, one of the most common flaws in weak CRUD systems.</div>
</div>

<h2>2) النمط الصح: <code>WHERE id = ? AND user_id = ?</code></h2>
<div class="bi-block">
    <div class="ar">🇪🇬 الحل بسيط جدًا: ضيف <code>AND user_id = ?</code> في شرط الـ <code>WHERE</code> بتاع الـ <code>UPDATE</code> والـ <code>DELETE</code>. لو الصف موجود بس بيخص مستخدم تاني، الشرط مش هيتحقق، فـ SQLite/MySQL هيرجع <code>affected_rows = 0</code> — يعني العملية "نجحت" من ناحية التنفيذ لكن ملهاش تأثير، بدل ما تعدّل أو تمسح صف مش بتاعك. الدالة بترجع <code>bool</code> بناءً على <code>rowCount() &gt; 0</code> عشان الكود اللي بينادي عليها يعرف هل العملية فعلًا أثّرت ولا لأ.</div>
    <div class="en">🇬🇧 The fix is simple: add <code>AND user_id = ?</code> to the <code>WHERE</code> clause of both the <code>UPDATE</code> and the <code>DELETE</code>. If the row exists but belongs to a different user, the condition simply won't match, so the database reports <code>affected_rows = 0</code> — the operation "runs" but touches nothing, instead of editing or deleting a row that isn't yours. The function returns a <code>bool</code> based on <code>rowCount() &gt; 0</code> so calling code knows whether anything actually changed.</div>
</div>

<h2 id="practice">💻 التنفيذ الفعلي — إثبات إن الحماية شغالة / Actually Running It — Proving the Protection Works</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 الكود تحت مش بيقول "الحماية شغالة" بس — بيثبتها فعليًا: بينفّذ محاولة حقيقية من مستخدم رقم 2 إنه يعدّل مهمة مستخدم رقم 1، وبيطبع النتيجة الحقيقية (<code>affected_rows = 0</code>)، وبعدين بيتأكد إن المهمة فضلت زي ما هي.</div>
    <div class="en">🇬🇧 The code below doesn't just claim "the protection works" — it actually proves it: it runs a real attempt by user 2 to edit user 1's task, prints the real result (<code>affected_rows = 0</code>), and then confirms the task was left untouched.</div>
</div>

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
$pdo-&gt;exec("INSERT INTO task_categories (id, name) VALUES (1, 'Work'), (2, 'Personal')");
$taskStmt = $pdo-&gt;prepare('INSERT INTO tasks (id, user_id, category_id, title, is_done, created_at) VALUES (?, ?, ?, ?, ?, ?)');
foreach ([
    [1, 1, 1, 'Finish the PDO lesson', 0, '2026-09-01'],
    [2, 1, 2, 'Buy groceries', 0, '2026-09-01'],
    [3, 2, 1, 'Review pull request', 0, '2026-09-02'],
] as $t) {
    $taskStmt-&gt;execute($t);
}

function markTaskDone(PDO $pdo, int $taskId, int $userId): bool
{
    $stmt = $pdo-&gt;prepare('UPDATE tasks SET is_done = 1 WHERE id = ? AND user_id = ?');
    $stmt-&gt;execute([$taskId, $userId]);
    return $stmt-&gt;rowCount() &gt; 0;
}

function deleteTask(PDO $pdo, int $taskId, int $userId): bool
{
    $stmt = $pdo-&gt;prepare('DELETE FROM tasks WHERE id = ? AND user_id = ?');
    $stmt-&gt;execute([$taskId, $userId]);
    return $stmt-&gt;rowCount() &gt; 0;
}

echo '--- markTaskDone: user 1 marks their OWN task #1 done ---' . PHP_EOL;
$ok = markTaskDone($pdo, 1, 1);
echo 'Result: ' . ($ok ? 'true (affected_rows=1)' : 'false (affected_rows=0)') . PHP_EOL;

echo PHP_EOL . '--- markTaskDone: user 2 tries to mark task #1 (owned by user 1) done ---' . PHP_EOL;
$blocked = markTaskDone($pdo, 1, 2);
echo 'Result: ' . ($blocked ? 'true (affected_rows=1)' : 'false (affected_rows=0)') . PHP_EOL;

echo PHP_EOL . '--- proof: task #1 state after the blocked attempt ---' . PHP_EOL;
$row = $pdo-&gt;query('SELECT id, user_id, title, is_done FROM tasks WHERE id = 1')-&gt;fetch(PDO::FETCH_ASSOC);
echo "Task #{$row['id']} (owner user_id={$row['user_id']}): is_done={$row['is_done']} - untouched by user 2's attempt" . PHP_EOL;

echo PHP_EOL . '--- deleteTask: user 1 deletes their OWN task #2 ---' . PHP_EOL;
$delOk = deleteTask($pdo, 2, 1);
echo 'Result: ' . ($delOk ? 'true (affected_rows=1)' : 'false (affected_rows=0)') . PHP_EOL;

echo PHP_EOL . "--- deleteTask: user 1 tries to delete task #3 (owned by user 2) ---" . PHP_EOL;
$delBlocked = deleteTask($pdo, 3, 1);
echo 'Result: ' . ($delBlocked ? 'true (affected_rows=1)' : 'false (affected_rows=0)') . PHP_EOL;

echo PHP_EOL . '--- final tasks table ---' . PHP_EOL;
$rows = $pdo-&gt;query('SELECT id, user_id, title, is_done FROM tasks ORDER BY id')-&gt;fetchAll(PDO::FETCH_ASSOC);
foreach ($rows as $r) {
    echo "#{$r['id']} (user_id={$r['user_id']}) {$r['title']} - is_done={$r['is_done']}" . PHP_EOL;
}</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">--- markTaskDone: user 1 marks their OWN task #1 done ---
Result: true (affected_rows=1)

--- markTaskDone: user 2 tries to mark task #1 (owned by user 1) done ---
Result: false (affected_rows=0)

--- proof: task #1 state after the blocked attempt ---
Task #1 (owner user_id=1): is_done=1 - untouched by user 2's attempt

--- deleteTask: user 1 deletes their OWN task #2 ---
Result: true (affected_rows=1)

--- deleteTask: user 1 tries to delete task #3 (owned by user 2) ---
Result: false (affected_rows=0)

--- final tasks table ---
#1 (user_id=1) Finish the PDO lesson - is_done=1
#3 (user_id=2) Review pull request - is_done=0</div>

<div class="bi-block">
    <div class="ar">🇪🇬 دي إثبات فعلي مش نظري: task #1 فضلت <code>is_done=1</code> (من تعديل صاحبها الحقيقي بس)، ومحاولة user 2 رجّعت <code>false</code> من غير ما تغيّر حاجة. وفي الـ <code>DELETE</code>، task #3 (بتاعة user 2) فضلت موجودة في الجدول النهائي رغم محاولة user 1 يمسحها — الـ Ownership Check منعت الاتنين.</div>
    <div class="en">🇬🇧 This is real proof, not theory: task #1 stayed <code>is_done=1</code> (only its real owner's update took effect), and user 2's attempt returned <code>false</code> without changing anything. And in the <code>DELETE</code> case, task #3 (belonging to user 2) is still present in the final table despite user 1's attempt to delete it — the Ownership Check blocked both.</div>
</div>

<div class="bi-block">
    <div class="ar">🇪🇬 جرّب بنفسك في المحرر تحت — غيّر الـ <code>user_id</code> في المحاولات وشوف امتى الـ Ownership Check بتمنع العملية وامتى بتسمح بيها.</div>
    <div class="en">🇬🇧 Try it yourself in the editor below — change the <code>user_id</code> in the attempts and see when the Ownership Check blocks the operation and when it allows it.</div>
</div>

<div class="mini-editor-wrap">
    <textarea spellcheck="false">&lt;?php
$pdo = new PDO('sqlite::memory:', null, null, [
    PDO::ATTR_ERRMODE =&gt; PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE =&gt; PDO::FETCH_ASSOC,
]);
$pdo-&gt;exec('CREATE TABLE tasks (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    user_id INTEGER NOT NULL,
    title TEXT NOT NULL,
    is_done INTEGER NOT NULL DEFAULT 0
)');
$taskStmt = $pdo-&gt;prepare('INSERT INTO tasks (id, user_id, title, is_done) VALUES (?, ?, ?, 0)');
foreach ([[1, 1, 'Finish the PDO lesson'], [2, 2, 'Review pull request']] as $t) {
    $taskStmt-&gt;execute($t);
}

function markTaskDone(PDO $pdo, int $taskId, int $userId): bool
{
    $stmt = $pdo-&gt;prepare('UPDATE tasks SET is_done = 1 WHERE id = ? AND user_id = ?');
    $stmt-&gt;execute([$taskId, $userId]);
    return $stmt-&gt;rowCount() &gt; 0;
}

// جرّب تغيير الـ user_id هنا (1 أو 2) وشوف الفرق
$taskIdToUpdate = 2;
$actingUserId = 1; // task #2 ملك user 2 — user 1 هيتمنع
$result = markTaskDone($pdo, $taskIdToUpdate, $actingUserId);
echo "markTaskDone(task=$taskIdToUpdate, user=$actingUserId) -&gt; " . ($result ? 'true' : 'false') . PHP_EOL;

$row = $pdo-&gt;query("SELECT id, user_id, is_done FROM tasks WHERE id = $taskIdToUpdate")-&gt;fetch();
echo "Task #{$row['id']} (owner={$row['user_id']}): is_done={$row['is_done']}" . PHP_EOL;</textarea>
    <div class="mini-toolbar">
        <button class="mini-run-btn">▶ شغّل / Run</button>
        <span class="mini-status"></span>
    </div>
    <div class="output-box">— لسه متشغلش / not run yet —</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="idor">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">لو كتبت <code>UPDATE tasks SET is_done = 1 WHERE id = ?</code> بدون التحقق من <code>user_id</code>، إيه اسم الثغرة دي؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">If you write <code>UPDATE tasks SET is_done = 1 WHERE id = ?</code> without checking <code>user_id</code>, what is this vulnerability called?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="xss"> XSS</label>
        <label><input type="radio" name="q1" value="idor"> IDOR (Insecure Direct Object Reference)</label>
        <label><input type="radio" name="q1" value="csrf"> CSRF</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="zero">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">في المثال الفعلي فوق، لما user 2 حاول يعدّل task #1 (ملك user 1)، إيه قيمة <code>rowCount()</code>؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">In the actual example above, when user 2 tried to update task #1 (owned by user 1), what was <code>rowCount()</code>?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="one"> 1</label>
        <label><input type="radio" name="q2" value="zero"> 0</label>
        <label><input type="radio" name="q2" value="error"> رمى Exception</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="both">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">جملة <code>WHERE id = ? AND user_id = ?</code> بتتأكد من إيه؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What does <code>WHERE id = ? AND user_id = ?</code> confirm?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="idonly"> إن الـ <code>id</code> موجود بس</label>
        <label><input type="radio" name="q3" value="both"> إن الصف موجود <b>و</b> إنه ملك نفس المستخدم اللي بيطلب العملية</label>
        <label><input type="radio" name="q3" value="useronly"> إن المستخدم موجود بس</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="remains">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">لما user 1 حاول يمسح task #3 (ملك user 2)، إيه اللي حصل لـ task #3 في الجدول النهائي؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">When user 1 tried to delete task #3 (owned by user 2), what happened to task #3 in the final table?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="remains"> فضلت موجودة زي ما هي — المحاولة اتمنعت</label>
        <label><input type="radio" name="q4" value="deleted"> اتمسحت رغم إنها مش ملكه</label>
        <label><input type="radio" name="q4" value="transferred"> اتنقلت ملكيتها لـ user 1</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ دالة "إلغاء الإنجاز" / An "Undo Done" Function</h3>
    <div class="ar">🇪🇬 في المحرر المصغّر فوق (أو <a href="../playground/index.php">الـ Playground</a>): اكتب دالة <code>markTaskPending(PDO $pdo, int $taskId, int $userId): bool</code> بنفس نمط <code>markTaskDone()</code> بالظبط (بما فيها الـ Ownership Check)، بس بترجّع <code>is_done</code> لـ 0. اختبرها على مهمة خلصت بالفعل، وعلى مهمة مستخدم تاني.</div>
    <div class="en">🇬🇧 In the mini editor above (or the <a href="../playground/index.php">Playground</a>): write a <code>markTaskPending(PDO $pdo, int $taskId, int $userId): bool</code> function following the exact same pattern as <code>markTaskDone()</code> (Ownership Check included), but setting <code>is_done</code> back to 0. Test it on an already-done task, and on another user's task.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 دلوقتي عندنا CRUD كامل: Create، Read، Update، Delete — كله بأمان بفضل الـ Ownership Check. الدرس الجاي هيوسّع الـ Read: إزاي تبحث في المهام، تفلترها حسب الفئة، وتقسّمها على صفحات — بدل ما ترجع كل المهام في استعلام واحد ضخم.</div>
    <div class="en">🇬🇧 Now we have a complete CRUD: Create, Read, Update, Delete — all secured by the Ownership Check. The next lesson expands Read: how to search tasks, filter them by category, and split them across pages — instead of returning every task in one giant query.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>أي <code>UPDATE</code>/<code>DELETE</code> على صف يخص مستخدم لازم يتحقق من الملكية بـ <code>WHERE id = ? AND user_id = ?</code>.</li>
        <li>من غير الشرط ده، الثغرة اسمها IDOR — أي مستخدم يقدر يعدّل/يمسح بيانات حد تاني.</li>
        <li><code>rowCount() &gt; 0</code> بيفرّق بين "العملية أثّرت فعلًا" و"العملية اتنفّذت بس ملهاش تأثير".</li>
        <li>الإثبات هنا حقيقي: نفّذنا محاولة user 2 على مهمة user 1، وشفنا <code>affected_rows=0</code> فعليًا.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="crud-create-read.php">← المرحلة السابقة / Previous: Create & Read</a>
    <a href="crud-search-filter-pagination.php">المرحلة الجاية / Next: Search, Filter & Pagination →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
