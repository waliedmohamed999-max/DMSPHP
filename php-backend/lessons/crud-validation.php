<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'crud-validation';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'التحقق من صحة بيانات CRUD — CRUD Validation';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">Stage 9 · CRUD Application</span>
<h1>التحقق من صحة بيانات CRUD <span class="ltr">CRUD Validation</span></h1>
<p class="subtitle">منع Task فاضية، تواريخ غلط، وفئات مش موجودة — قبل ما توصل لقاعدة البيانات أصلًا. <span class="ltr">Preventing empty tasks, invalid dates, and non-existent categories — before they ever reach the database.</span></p>

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
    <div class="ar">🇪🇬 <code>createTask()</code> اللي كتبناها بدري بتثق في اللي جاي ليها 100%. لو حد بعت عنوان فاضي أو <code>category_id</code> مش موجود أصلًا، الدالة هتنفّذ الـ <code>INSERT</code> عادي (أو ترمي خطأ Foreign Key غامض). في الدرس ده هتكتب <code>validateTaskInput()</code> اللي بتفحص البيانات <b>قبل</b> أي اتصال بقاعدة البيانات فعليًا — ما عدا فحص واحد لازم يلمس قاعدة البيانات: التأكد إن الفئة موجودة أصلًا.</div>
    <div class="en">🇬🇧 The <code>createTask()</code> function written earlier trusts its input completely. If someone sends an empty title or a <code>category_id</code> that doesn't exist, the function just runs the <code>INSERT</code> anyway (or throws an obscure Foreign Key error). In this lesson you'll write <code>validateTaskInput()</code>, which checks the data <b>before</b> touching the database for real — except for one check that genuinely must touch the database: confirming the category actually exists.</div>
</div>

<h2 id="understand">🧠 1) ليه <code>trim()</code> ضروري مع فحص الفراغ / Why <code>trim()</code> Matters for an Empty Check</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 فحص ساذج زي <code>$title === ''</code> هيفوّت حالة خطيرة: عنوان قيمته <code>"   "</code> (مسافات بس) مش <code>""</code> فاضي رسميًا، بس منطقيًا هو فاضي. الحل: <code>trim((string) $title) === ''</code> — بتشيل المسافات من الطرفين الأول، وبعدين تقارن. لو بعد الـ <code>trim</code> النتيجة فاضية، يبقى العنوان مالوش محتوى حقيقي.</div>
    <div class="en">🇬🇧 A naive check like <code>$title === ''</code> misses a dangerous case: a title of <code>"   "</code> (just spaces) isn't technically empty, but it is logically. The fix: <code>trim((string) $title) === ''</code> — strip whitespace from both ends first, then compare. If the trimmed result is empty, the title has no real content.</div>
</div>

<h2>2) الفحص اللي لازم يلمس قاعدة البيانات: <code>category_id</code> الموجود فعلًا</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 مش كل Validation ممكن يتم بدون قاعدة بيانات. لو المستخدم بعت <code>category_id = 999</code> ومفيش فئة بالرقم ده، الفحص الوحيد اللي بيكتشف ده هو <code>SELECT COUNT(*) FROM task_categories WHERE id = ?</code> فعلي — فحص النوع (<code>is_int</code>) مش كفاية، لإن 999 رقم صحيح تمامًا لكنه مش موجود في الجدول. لاحظ إن الفحص ده اختياري: لو <code>category_id</code> مبعوتش أصلًا أو كان <code>null</code>، منعملوش أي استعلام (الفئة اختيارية زي ما اتفقنا في درس التخطيط).</div>
    <div class="en">🇬🇧 Not all validation can be done without a database. If the user sends <code>category_id = 999</code> and no category with that id exists, the only way to catch it is a real <code>SELECT COUNT(*) FROM task_categories WHERE id = ?</code> — a type check (<code>is_int</code>) isn't enough, since 999 is a perfectly valid integer that just doesn't exist in the table. Note this check is conditional: if <code>category_id</code> wasn't sent at all, or is <code>null</code>, we skip the query entirely (the category is optional, as agreed in the planning lesson).</div>
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
$pdo-&gt;exec("INSERT INTO task_categories (id, name) VALUES (1, 'Work'), (2, 'Personal')");

function validateTaskInput(array $input, PDO $pdo): array
{
    $errors = [];

    $title = $input['title'] ?? '';
    if (trim((string) $title) === '') {
        $errors['title'] = 'Title is required.';
    }

    if (isset($input['category_id']) &amp;&amp; $input['category_id'] !== null) {
        $stmt = $pdo-&gt;prepare('SELECT COUNT(*) FROM task_categories WHERE id = ?');
        $stmt-&gt;execute([$input['category_id']]);
        if ((int) $stmt-&gt;fetchColumn() === 0) {
            $errors['category_id'] = 'Selected category does not exist.';
        }
    }

    return $errors;
}

$cases = [
    'valid'              =&gt; ['title' =&gt; 'Write the validation lesson', 'category_id' =&gt; 1],
    'empty title'        =&gt; ['title' =&gt; '', 'category_id' =&gt; 1],
    'whitespace title'   =&gt; ['title' =&gt; '   ', 'category_id' =&gt; 2],
    'non-existent category' =&gt; ['title' =&gt; 'Ship the release', 'category_id' =&gt; 999],
];

foreach ($cases as $label =&gt; $input) {
    $errors = validateTaskInput($input, $pdo);
    echo "--- case: $label ---" . PHP_EOL;
    echo 'input: ' . json_encode($input) . PHP_EOL;
    echo 'errors: ' . json_encode($errors) . PHP_EOL;
    echo PHP_EOL;
}</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">--- case: valid ---
input: {"title":"Write the validation lesson","category_id":1}
errors: []

--- case: empty title ---
input: {"title":"","category_id":1}
errors: {"title":"Title is required."}

--- case: whitespace title ---
input: {"title":"   ","category_id":2}
errors: {"title":"Title is required."}

--- case: non-existent category ---
input: {"title":"Ship the release","category_id":999}
errors: {"category_id":"Selected category does not exist."}</div>

<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ حالتين مهمتين: الـ "valid" case رجّع <code>errors: []</code> (Array فاضي — يعني مفيش أخطاء)، والحالتين "empty title" و"whitespace title" رجّعوا نفس رسالة الخطأ بالظبط رغم إن القيمتين مختلفتين شكليًا (<code>""</code> و<code>"   "</code>) — ده بالظبط سبب استخدام <code>trim()</code> قبل المقارنة.</div>
    <div class="en">🇬🇧 Notice two important things: the "valid" case returned <code>errors: []</code> (an empty array — meaning no errors), and both "empty title" and "whitespace title" produced the exact same error message despite looking different (<code>""</code> vs <code>"   "</code>) — exactly why <code>trim()</code> is used before the comparison.</div>
</div>

<div class="bi-block">
    <div class="ar">🇪🇬 جرّب بنفسك في المحرر تحت — ضيف حالة اختبار خامسة (زي عنوان طويل جدًا، أو <code>category_id</code> نصي بدل رقمي) وشوف الدالة بترد إزاي.</div>
    <div class="en">🇬🇧 Try it yourself in the editor below — add a fifth test case (like a very long title, or a string <code>category_id</code> instead of numeric) and see how the function responds.</div>
</div>

<div class="mini-editor-wrap">
    <textarea spellcheck="false">&lt;?php
$pdo = new PDO('sqlite::memory:', null, null, [
    PDO::ATTR_ERRMODE =&gt; PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE =&gt; PDO::FETCH_ASSOC,
]);
$pdo-&gt;exec('CREATE TABLE task_categories (id INTEGER PRIMARY KEY AUTOINCREMENT, name TEXT NOT NULL)');
$pdo-&gt;exec("INSERT INTO task_categories (id, name) VALUES (1, 'Work'), (2, 'Personal')");

function validateTaskInput(array $input, PDO $pdo): array
{
    $errors = [];

    $title = $input['title'] ?? '';
    if (trim((string) $title) === '') {
        $errors['title'] = 'Title is required.';
    }

    if (isset($input['category_id']) &amp;&amp; $input['category_id'] !== null) {
        $stmt = $pdo-&gt;prepare('SELECT COUNT(*) FROM task_categories WHERE id = ?');
        $stmt-&gt;execute([$input['category_id']]);
        if ((int) $stmt-&gt;fetchColumn() === 0) {
            $errors['category_id'] = 'Selected category does not exist.';
        }
    }

    return $errors;
}

// جرّب حالة جديدة هنا
$myCase = ['title' =&gt; 'A brand new task', 'category_id' =&gt; 50];
$errors = validateTaskInput($myCase, $pdo);
echo 'input: ' . json_encode($myCase) . PHP_EOL;
echo 'errors: ' . json_encode($errors) . PHP_EOL;</textarea>
    <div class="mini-toolbar">
        <button class="mini-run-btn">▶ شغّل / Run</button>
        <span class="mini-status"></span>
    </div>
    <div class="output-box">— لسه متشغلش / not run yet —</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="empty">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">لو <code>validateTaskInput()</code> رجّعت <code>[]</code> (Array فاضي)، ده معناه إيه؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">If <code>validateTaskInput()</code> returns <code>[]</code> (an empty array), what does that mean?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="empty"> البيانات صحيحة تمامًا، مفيش أخطاء</label>
        <label><input type="radio" name="q1" value="fail"> فيه خطأ لكنه اختفى</label>
        <label><input type="radio" name="q1" value="crash"> الدالة اتعطلت</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="trim">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">ليه فحص <code>$title === ''</code> وحده مش كافي لاكتشاف عنوان قيمته <code>"   "</code> (مسافات بس)؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Why isn't <code>$title === ''</code> alone enough to catch a title of <code>"   "</code> (just whitespace)?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="trim"> لإن <code>"   "</code> مش <code>===</code> لـ <code>""</code>، لازم <code>trim()</code> الأول</label>
        <label><input type="radio" name="q2" value="type"> لإن PHP بترمي Error أوتوماتيك</label>
        <label><input type="radio" name="q2" value="nodiff"> مفيش فرق، الفحص كافي زي ما هو</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="query">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">عشان تتأكد إن <code>category_id = 999</code> فئة موجودة فعلًا ولا لأ، إيه اللي محتاجه؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">To confirm whether <code>category_id = 999</code> is an actually existing category, what do you need?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="type"> فحص نوع البيانات بس (<code>is_int</code>)</label>
        <label><input type="radio" name="q3" value="query"> استعلام حقيقي على قاعدة البيانات (<code>SELECT COUNT(*) ...</code>)</label>
        <label><input type="radio" name="q3" value="regex"> Regular Expression</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="samemsg">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">في الناتج الفعلي فوق، حالتي "empty title" و"whitespace title" رجّعوا إيه؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">In the actual output above, what did the "empty title" and "whitespace title" cases return?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="samemsg"> نفس رسالة الخطأ بالظبط ("Title is required.")</label>
        <label><input type="radio" name="q4" value="different"> رسالتين مختلفتين</label>
        <label><input type="radio" name="q4" value="noerr"> مفيش أخطاء في الاتنين</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ حد أقصى لطول العنوان / A Maximum Title Length</h3>
    <div class="ar">🇪🇬 في المحرر المصغّر فوق (أو <a href="../playground/index.php">الـ Playground</a>): ضيف فحص جديد جوه <code>validateTaskInput()</code> — لو طول العنوان (بعد <code>trim</code>) أكبر من 100 حرف، ضيف <code>$errors['title'] = 'Title is too long (max 100 characters).'</code>. اختبرها بعنوان طويل حقيقي (استخدم <code>str_repeat('a', 150)</code> مثلًا) وشوف رسالة الخطأ بتظهر إزاي.</div>
    <div class="en">🇬🇧 In the mini editor above (or the <a href="../playground/index.php">Playground</a>): add a new check inside <code>validateTaskInput()</code> — if the trimmed title's length exceeds 100 characters, set <code>$errors['title'] = 'Title is too long (max 100 characters).'</code>. Test it with a genuinely long title (try <code>str_repeat('a', 150)</code>) and see how the error message appears.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 بكده خلّصنا مرحلة الـ CRUD الكاملة: تخطيط، Create/Read، Update/Delete بحماية Ownership، بحث/فلترة/ترقيم، وValidation قبل ما توصل لقاعدة البيانات. لكن لسه فيه سؤال أساسي محلّناهوش: مين بالظبط اللي بيقول "أنا user 1"؟ المرحلة الجاية — <b>Authentication &amp; Authorization</b> — هتغطي بالظبط ده: تسجيل دخول حقيقي بـ <code>password_hash</code>/<code>password_verify</code>، وربط هوية المستخدم بالـ Session، عشان كل الـ <code>$userId</code> اللي استخدمناها في المرحلة دي (زي في <code>WHERE user_id = ?</code>) تيجي من مصدر موثوق فعلًا مش من قيمة بعتها الفورم كده كده.</div>
    <div class="en">🇬🇧 That completes the full CRUD stage: planning, Create/Read, Update/Delete with Ownership protection, search/filter/pagination, and validation before data ever reaches the database. But one fundamental question remains unanswered: who exactly is saying "I'm user 1"? The next stage — <b>Authentication &amp; Authorization</b> — covers exactly that: real login with <code>password_hash</code>/<code>password_verify</code>, and wiring the user's identity to the session, so every <code>$userId</code> used throughout this stage (like in <code>WHERE user_id = ?</code>) comes from a trustworthy source, not just a value the form happened to send.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li><code>trim((string) $title) === ''</code> بيكتشف العنوان الفاضي والعنوان اللي مسافات بس، بنفس الفحص.</li>
        <li>مش كل Validation ممكن يتم من غير قاعدة بيانات — التأكد إن <code>category_id</code> موجود فعلًا لازم <code>SELECT</code> حقيقي.</li>
        <li>الدالة بترجع Array أخطاء (<code>[]</code> يعني مفيش أخطاء) بدل ما تطبع أو ترمي Exception فورًا.</li>
        <li>4 حالات (صحيحة، عنوان فاضي، عنوان مسافات، فئة مش موجودة) اتنفّذوا فعليًا وطبعوا الأخطاء الحقيقية بـ <code>json_encode</code>.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="crud-search-filter-pagination.php">← المرحلة السابقة / Previous: Search, Filter & Pagination</a>
    <a href="../index.php">الرئيسية / Home →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
