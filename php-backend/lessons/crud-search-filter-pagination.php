<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'crud-search-filter-pagination';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'بحث، فلترة، وترقيم الصفحات — Search, Filter & Pagination';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">Stage 9 · CRUD Application</span>
<h1>بحث، فلترة، وترقيم الصفحات <span class="ltr">Search, Filter &amp; Pagination</span></h1>
<p class="subtitle">LIKE للبحث، WHERE للفلترة حسب الفئة، وLIMIT/OFFSET لتقسيم النتائج على صفحات. <span class="ltr">LIKE for search, WHERE for filtering by category, and LIMIT/OFFSET to split results into pages.</span></p>

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
    <div class="ar">🇪🇬 <code>listTasksForUser()</code> اللي كتبناها في درس Create/Read بترجع <b>كل</b> مهام المستخدم دفعة واحدة — كويس مع 5 مهام، كارثة مع 5000. في الدرس ده هتتعلم 3 أدوات أساسية بتحل المشكلة دي: البحث بـ <code>LIKE</code>، الفلترة بـ <code>WHERE category_id</code>، والترقيم بـ <code>LIMIT</code>/<code>OFFSET</code> — وهتشوفهم شغالين مع بعض في استعلام واحد حقيقي.</div>
    <div class="en">🇬🇧 The <code>listTasksForUser()</code> function from the Create/Read lesson returns <b>every</b> task at once — fine with 5 tasks, a disaster with 5000. This lesson covers the three essential tools that fix this: searching with <code>LIKE</code>, filtering with <code>WHERE category_id</code>, and paging with <code>LIMIT</code>/<code>OFFSET</code> — and you'll see them work together in one real query.</div>
</div>

<h2 id="understand">🧠 1) البحث بـ <code>LIKE</code></h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <code>LIKE</code> بيدوّر على نص جوه عمود نصي. علامة <code>%</code> معناها "أي عدد من أي حروف". يعني <code>WHERE title LIKE '%write%'</code> بيرجع أي مهمة كلمة "write" موجودة فيها في أي مكان — مش بس أول الكلمة. لازم تحط الـ <code>%</code> يدويًا حوالين المتغير قبل ما تبعته لـ <code>execute()</code>، مش جوه الـ SQL نفسه، عشان يفضل Prepared Statement آمن.</div>
    <div class="en">🇬🇧 <code>LIKE</code> searches for text inside a text column. The <code>%</code> wildcard means "any number of any characters". So <code>WHERE title LIKE '%write%'</code> returns any task where "write" appears anywhere — not just at the start. You wrap the <code>%</code> around the variable yourself before passing it to <code>execute()</code>, not inside the raw SQL, so it stays a safe prepared statement.</div>
</div>

<h2>2) الفلترة بـ <code>WHERE category_id</code></h2>
<div class="bi-block">
    <div class="ar">🇪🇬 الفلترة أبسط من البحث — مطابقة تامة بدل بحث جزئي: <code>WHERE category_id = ?</code> بترجع بس المهام اللي فئتها بالظبط هي دي. الفرق المهم: البحث (<code>LIKE</code>) بيدوّر جوه نص، والفلترة (<code>=</code>) بتقارن قيمة كاملة.</div>
    <div class="en">🇬🇧 Filtering is simpler than search — an exact match instead of a partial one: <code>WHERE category_id = ?</code> returns only tasks in exactly that category. The key difference: search (<code>LIKE</code>) looks inside text, filtering (<code>=</code>) compares a whole value.</div>
</div>

<h2>3) الترقيم بـ <code>LIMIT</code>/<code>OFFSET</code></h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <code>LIMIT ?</code> بيحدد أقصى عدد صفوف ترجع (حجم الصفحة)، و<code>OFFSET ?</code> بيقول "اتخطى أول كام صف". الصيغة العامة: <code>OFFSET = (page - 1) * pageSize</code>. يعني صفحة 1 بحجم 5: <code>LIMIT 5 OFFSET 0</code>. صفحة 2: <code>LIMIT 5 OFFSET 5</code>. لازم <code>ORDER BY</code> ثابت (زي <code>id</code>) وإلا الترتيب ممكن يتغيّر بين الصفحات ويطلع نفس الصف في صفحتين.</div>
    <div class="en">🇬🇧 <code>LIMIT ?</code> caps how many rows come back (the page size), and <code>OFFSET ?</code> says "skip this many rows first". The general formula: <code>OFFSET = (page - 1) * pageSize</code>. So page 1 with a page size of 5: <code>LIMIT 5 OFFSET 0</code>. Page 2: <code>LIMIT 5 OFFSET 5</code>. You need a stable <code>ORDER BY</code> (like <code>id</code>) or the ordering could shift between pages and the same row could show up on two pages.</div>
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
$pdo-&gt;exec("INSERT INTO task_categories (id, name) VALUES (1, 'Work'), (2, 'Personal'), (3, 'Shopping')");

$seed = [
    [1, 1, 'Write the CRUD lesson', '2026-08-01'],
    [1, 1, 'Review pull request', '2026-08-02'],
    [1, 2, 'Buy groceries', '2026-08-03'],
    [1, 1, 'Refactor the search query', '2026-08-04'],
    [1, 3, 'Order a new keyboard', '2026-08-05'],
    [1, 2, 'Book dentist appointment', '2026-08-06'],
    [1, 1, 'Write unit tests for tasks', '2026-08-07'],
    [1, 3, 'Buy a birthday gift', '2026-08-08'],
    [1, 2, 'Plan weekend trip', '2026-08-09'],
    [1, 1, 'Fix the pagination bug', '2026-08-10'],
    [1, 3, 'Renew gym membership', '2026-08-11'],
    [1, 1, 'Write project documentation', '2026-08-12'],
];
$stmt = $pdo-&gt;prepare('INSERT INTO tasks (user_id, category_id, title, is_done, created_at) VALUES (?, ?, ?, 0, ?)');
foreach ($seed as $s) {
    $stmt-&gt;execute($s);
}
echo 'Seeded ' . $pdo-&gt;query('SELECT COUNT(*) FROM tasks')-&gt;fetchColumn() . ' tasks for user 1' . PHP_EOL;

echo PHP_EOL . "--- search: title LIKE '%write%' ---" . PHP_EOL;
$stmt = $pdo-&gt;prepare("SELECT id, title FROM tasks WHERE user_id = ? AND title LIKE ? ORDER BY id");
$stmt-&gt;execute([1, '%' . 'write' . '%']);
foreach ($stmt-&gt;fetchAll(PDO::FETCH_ASSOC) as $r) {
    echo "#{$r['id']} {$r['title']}" . PHP_EOL;
}

echo PHP_EOL . '--- filter: category_id = 1 (Work) ---' . PHP_EOL;
$stmt = $pdo-&gt;prepare('SELECT id, title FROM tasks WHERE user_id = ? AND category_id = ? ORDER BY id');
$stmt-&gt;execute([1, 1]);
foreach ($stmt-&gt;fetchAll(PDO::FETCH_ASSOC) as $r) {
    echo "#{$r['id']} {$r['title']}" . PHP_EOL;
}

echo PHP_EOL . '--- pagination: page 1 (LIMIT 5 OFFSET 0) ---' . PHP_EOL;
$stmt = $pdo-&gt;prepare('SELECT id, title FROM tasks WHERE user_id = ? ORDER BY id LIMIT ? OFFSET ?');
$stmt-&gt;execute([1, 5, 0]);
foreach ($stmt-&gt;fetchAll(PDO::FETCH_ASSOC) as $r) {
    echo "#{$r['id']} {$r['title']}" . PHP_EOL;
}

echo PHP_EOL . '--- pagination: page 2 (LIMIT 5 OFFSET 5) ---' . PHP_EOL;
$stmt = $pdo-&gt;prepare('SELECT id, title FROM tasks WHERE user_id = ? ORDER BY id LIMIT ? OFFSET ?');
$stmt-&gt;execute([1, 5, 5]);
foreach ($stmt-&gt;fetchAll(PDO::FETCH_ASSOC) as $r) {
    echo "#{$r['id']} {$r['title']}" . PHP_EOL;
}

echo PHP_EOL . "--- combined: search 'e', category Work (1), page 1 (LIMIT 3 OFFSET 0) ---" . PHP_EOL;
$stmt = $pdo-&gt;prepare('
    SELECT id, title FROM tasks
    WHERE user_id = ? AND category_id = ? AND title LIKE ?
    ORDER BY id
    LIMIT ? OFFSET ?
');
$stmt-&gt;execute([1, 1, '%e%', 3, 0]);
foreach ($stmt-&gt;fetchAll(PDO::FETCH_ASSOC) as $r) {
    echo "#{$r['id']} {$r['title']}" . PHP_EOL;
}</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">Seeded 12 tasks for user 1

--- search: title LIKE '%write%' ---
#1 Write the CRUD lesson
#7 Write unit tests for tasks
#12 Write project documentation

--- filter: category_id = 1 (Work) ---
#1 Write the CRUD lesson
#2 Review pull request
#4 Refactor the search query
#7 Write unit tests for tasks
#10 Fix the pagination bug
#12 Write project documentation

--- pagination: page 1 (LIMIT 5 OFFSET 0) ---
#1 Write the CRUD lesson
#2 Review pull request
#3 Buy groceries
#4 Refactor the search query
#5 Order a new keyboard

--- pagination: page 2 (LIMIT 5 OFFSET 5) ---
#6 Book dentist appointment
#7 Write unit tests for tasks
#8 Buy a birthday gift
#9 Plan weekend trip
#10 Fix the pagination bug

--- combined: search 'e', category Work (1), page 1 (LIMIT 3 OFFSET 0) ---
#1 Write the CRUD lesson
#2 Review pull request
#4 Refactor the search query</div>

<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ حاجتين: أولًا، البحث عن <code>%write%</code> لقى "Write the CRUD lesson" رغم إنها كتبت بحرف كبير (W) — لإن <code>LIKE</code> في SQLite بيتجاهل حالة الأحرف افتراضيًا للنصوص الإنجليزية العادية. ثانيًا، صفحة 1 وصفحة 2 رجّعوا صفوف مختلفة تمامًا (1-5 و6-10) من نفس الـ 12 مهمة — إثبات فعلي إن <code>OFFSET</code> بيتخطى صفوف حقيقية.</div>
    <div class="en">🇬🇧 Notice two things: first, searching for <code>%write%</code> matched "Write the CRUD lesson" despite its capital W — <code>LIKE</code> in SQLite is case-insensitive by default for plain ASCII text. Second, page 1 and page 2 returned entirely different rows (1-5 and 6-10) out of the same 12 tasks — real proof that <code>OFFSET</code> genuinely skips rows.</div>
</div>

<div class="bi-block">
    <div class="ar">🇪🇬 جرّب بنفسك في المحرر تحت — غيّر كلمة البحث، رقم الفئة، أو حجم الصفحة (<code>LIMIT</code>) وشوف النتيجة بتتغيّر إزاي.</div>
    <div class="en">🇬🇧 Try it yourself in the editor below — change the search term, the category id, or the page size (<code>LIMIT</code>) and see how the result changes.</div>
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
    category_id INTEGER,
    title TEXT NOT NULL
)');
$stmt = $pdo-&gt;prepare('INSERT INTO tasks (user_id, category_id, title) VALUES (?, ?, ?)');
foreach ([
    [1, 1, 'Write the CRUD lesson'],
    [1, 1, 'Review pull request'],
    [1, 2, 'Buy groceries'],
    [1, 1, 'Refactor the search query'],
    [1, 3, 'Order a new keyboard'],
    [1, 2, 'Book dentist appointment'],
] as $t) {
    $stmt-&gt;execute($t);
}

// جرّب تغيير القيم دي
$searchTerm = 'e';
$categoryId = 1;
$page = 1;
$pageSize = 2;
$offset = ($page - 1) * $pageSize;

$stmt = $pdo-&gt;prepare('
    SELECT id, title FROM tasks
    WHERE user_id = ? AND category_id = ? AND title LIKE ?
    ORDER BY id
    LIMIT ? OFFSET ?
');
$stmt-&gt;execute([1, $categoryId, '%' . $searchTerm . '%', $pageSize, $offset]);
foreach ($stmt-&gt;fetchAll() as $r) {
    echo "#{$r['id']} {$r['title']}" . PHP_EOL;
}</textarea>
    <div class="mini-toolbar">
        <button class="mini-run-btn">▶ شغّل / Run</button>
        <span class="mini-status"></span>
    </div>
    <div class="output-box">— لسه متشغلش / not run yet —</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="anywhere">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question"><code>WHERE title LIKE '%bug%'</code> بترجع إيه بالظبط؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What exactly does <code>WHERE title LIKE '%bug%'</code> return?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="starts"> بس العناوين اللي بتبدأ بكلمة "bug"</label>
        <label><input type="radio" name="q1" value="anywhere"> أي عنوان كلمة "bug" موجودة فيه في أي مكان</label>
        <label><input type="radio" name="q1" value="exact"> بس العنوان اللي هو "bug" بالظبط</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="ten">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">لو <code>pageSize = 5</code>، إيه قيمة <code>OFFSET</code> الصحيحة لصفحة 3؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">If <code>pageSize = 5</code>, what's the correct <code>OFFSET</code> for page 3?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="five"> 5</label>
        <label><input type="radio" name="q2" value="ten"> 10 — لإن <code>(3 - 1) * 5 = 10</code></label>
        <label><input type="radio" name="q2" value="fifteen"> 15</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="different">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">في المثال الفعلي فوق، صفحة 1 وصفحة 2 (كل واحدة <code>LIMIT 5</code>) رجّعوا إيه؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">In the actual example above, page 1 and page 2 (each <code>LIMIT 5</code>) returned what?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="same"> نفس الصفوف بالظبط</label>
        <label><input type="radio" name="q3" value="different"> صفوف مختلفة تمامًا (1-5 و6-10)</label>
        <label><input type="radio" name="q3" value="empty"> صفحة 2 كانت فاضية</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="equals">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">الفرق الأساسي بين الفلترة (<code>category_id = ?</code>) والبحث (<code>title LIKE ?</code>) إيه؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What's the fundamental difference between filtering (<code>category_id = ?</code>) and search (<code>title LIKE ?</code>)?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="equals"> الفلترة مطابقة تامة، البحث بيدوّر جوه النص</label>
        <label><input type="radio" name="q4" value="samething"> مفيش فرق، الاتنين نفس الحاجة</label>
        <label><input type="radio" name="q4" value="speedonly"> الفرق في السرعة بس، مفيش فرق في النتيجة</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ دالة بحث شاملة / A Combined Search Function</h3>
    <div class="ar">🇪🇬 في المحرر المصغّر فوق (أو <a href="../playground/index.php">الـ Playground</a>): اكتب دالة <code>searchTasks(PDO $pdo, int $userId, ?string $search, ?int $categoryId, int $page, int $pageSize): array</code> بتبني الاستعلام ديناميكيًا — لو <code>$search</code> كان <code>null</code> متضيفش شرط <code>LIKE</code>، ولو <code>$categoryId</code> كان <code>null</code> متضيفش شرط الفئة. اختبرها بكل التوليفات (بحث بس، فلترة بس، الاتنين، ولا واحد).</div>
    <div class="en">🇬🇧 In the mini editor above (or the <a href="../playground/index.php">Playground</a>): write a <code>searchTasks(PDO $pdo, int $userId, ?string $search, ?int $categoryId, int $page, int $pageSize): array</code> function that builds the query dynamically — skip the <code>LIKE</code> condition if <code>$search</code> is <code>null</code>, and skip the category condition if <code>$categoryId</code> is <code>null</code>. Test every combination (search only, filter only, both, neither).</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 دلوقتي عندنا CRUD كامل وقابل للبحث والفلترة والترقيم. لكن كل حاجة لغاية دلوقتي بتفترض إن البيانات اللي داخلة صح دايمًا. الدرس الأخير في المرحلة هيسدّ الفجوة دي: إزاي تتأكد من صحة بيانات المهمة (عنوان مش فاضي، فئة موجودة فعلًا) <b>قبل</b> ما توصل لقاعدة البيانات أصلًا.</div>
    <div class="en">🇬🇧 Now we have a complete, searchable, filterable, paginated CRUD. But everything so far assumes the incoming data is always valid. The final lesson in this stage closes that gap: validating task data (non-empty title, a category that actually exists) <b>before</b> it ever reaches the database.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>البحث: <code>WHERE title LIKE ?</code> مع <code>%</code> ملفوفة حوالين المتغير في الـ PHP، مش جوه SQL خام.</li>
        <li>الفلترة: <code>WHERE category_id = ?</code> — مطابقة تامة، مش بحث جزئي.</li>
        <li>الترقيم: <code>LIMIT pageSize OFFSET (page-1)*pageSize</code>، دايمًا مع <code>ORDER BY</code> ثابت.</li>
        <li>الثلاثة بيتجمعوا في استعلام واحد، واتنفّذوا فعليًا وأثبتوا إن صفحة 1 وصفحة 2 مختلفتين.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="crud-update-delete.php">← المرحلة السابقة / Previous: Update & Delete</a>
    <a href="crud-validation.php">المرحلة الجاية / Next: CRUD Validation →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
