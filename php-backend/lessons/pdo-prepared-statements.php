<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'pdo-prepared-statements';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'PDO و Prepared Statements — PDO & Prepared Statements';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">Stage 7 · MySQL & SQL</span>
<h1>PDO و Prepared Statements <span class="ltr">PDO &amp; Prepared Statements</span></h1>
<p class="subtitle">إزاي PHP بتتكلم مع MySQL بأمان — نفس الأساس اللي بنى عليه معمل SQL Injection. <span class="ltr">How PHP talks to MySQL safely — the same foundation the SQL Injection lab was built on.</span></p>

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
    <div class="ar">🇪🇬 كل الاستعلامات اللي كتبناها في الدروس اللي فاتت استخدمت <code>$pdo->query()</code> على نص SQL ثابت — وده مقبول لما مفيش قيمة جاية من مستخدم. لكن بمجرد ما قيمة (إيميل، اسم بحث، id) تيجي من خارج الكود، لازم تتبعت عن طريق <b>Prepared Statement</b>: <code>prepare()</code> + <code>execute()</code>. الدرس ده هيوريك الشكلين (<code>?</code> و<code>:name</code>) شغالين فعليًا، وهيشرح ليه الأسلوب ده موجود من الأساس.</div>
    <div class="en">🇬🇧 Every query in previous lessons used <code>$pdo->query()</code> on a fixed SQL string — fine when no value comes from a user. But the moment a value (an email, a search term, an id) comes from outside your code, it must be sent through a <b>Prepared Statement</b>: <code>prepare()</code> + <code>execute()</code>. This lesson shows both forms (<code>?</code> and <code>:name</code>) actually working, and explains why this pattern exists at all.</div>
</div>

<h2 id="understand">🧠 ليه الأسلوب ده موجود / Why This Pattern Exists</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 لو دمجت متغيّر جوه نص SQL مباشرة (زي <code>"WHERE email = '$email'"</code>)، أي حاجة يكتبها المستخدم بتتحط <b>حرفيًا</b> جوه الجملة — وده بالظبط ثغرة <code>SQL Injection</code>. <code>prepare()</code> بيجهّز الجملة بعلامات مكان القيم (<code>?</code> أو <code>:name</code>)، و<code>execute()</code> بيبعت القيم منفصلة تمامًا، فقاعدة البيانات بتتعامل معاها كبيانات فقط — مفيش أي طريقة تغيّر معنى الجملة. الشرح والهجوم الكامل خطوة بخطوة موجودين في <a href="security-sql-injection.php">🔐 معمل: SQL Injection</a> — هنا هنركّز على الاستخدام العادي للـ Prepared Statements، مش تكرار نفس الديمو.</div>
    <div class="en">🇬🇧 If you concatenate a variable directly into a SQL string (like <code>"WHERE email = '$email'"</code>), anything the user types gets inserted <b>literally</b> into the statement — that's exactly the <code>SQL Injection</code> hole. <code>prepare()</code> compiles the statement with placeholders (<code>?</code> or <code>:name</code>) instead of values, and <code>execute()</code> sends the values completely separately, so the database treats them as pure data — there's no way to change what the statement means. The full step-by-step explanation and attack demo live in <a href="security-sql-injection.php">🔐 Lab: SQL Injection</a> — here we focus on everyday Prepared Statement usage, not repeating that same demo.</div>
</div>

<h2 id="practice">💻 الشكل الأول: Positional (?) / Form One: Positional (?)</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 مع <code>?</code>، بتبعت القيم كمصفوفة مرتّبة بنفس ترتيب علامات الاستفهام في الجملة.</div>
    <div class="en">🇬🇧 With <code>?</code>, you pass values as an array in the same order the placeholders appear in the statement.</div>
</div>

<pre><code>&lt;?php
require __DIR__ . '/../db-sandbox/schema.php';
$pdo = build_sandbox_pdo();

$stmt = $pdo->prepare('SELECT * FROM users WHERE email = ?');
$stmt->execute(['sara@example.com']);
print_r($stmt->fetch(PDO::FETCH_ASSOC));</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">Array
(
    [id] => 2
    [name] => Sara Ali
    [email] => sara@example.com
    [role] => user
    [created_at] => 2024-01-15
)</div>

<h2>الشكل الثاني: Named (:name) / Form Two: Named (:name)</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 مع الـ Named Placeholders، بتبعت مصفوفة associative بمفاتيح بنفس أسماء الـ placeholders — أوضح لما الاستعلام فيه أكتر من قيمة، لإن الاسم بيوضّح كل قيمة بتمثّل إيه.</div>
    <div class="en">🇬🇧 With named placeholders, you pass an associative array whose keys match the placeholder names — clearer when a query has several values, since the name documents what each one represents.</div>
</div>

<pre><code>&lt;?php
$stmt = $pdo->prepare('SELECT * FROM users WHERE email = :email');
$stmt->execute(['email' => 'omar@example.com']);
print_r($stmt->fetch(PDO::FETCH_ASSOC));

// أكتر من named placeholder في نفس الاستعلام
$stmt = $pdo->prepare('SELECT * FROM posts WHERE user_id = :uid AND views > :minViews');
$stmt->execute(['uid' => 1, 'minViews' => 100]);
print_r($stmt->fetchAll(PDO::FETCH_ASSOC));</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">Array
(
    [id] => 3
    [name] => Omar Khaled
    [email] => omar@example.com
    [role] => user
    [created_at] => 2024-02-02
)
Array
(
    [0] => Array
        (
            [id] => 1
            [user_id] => 1
            [title] => Getting Started with PDO
            [body] => PDO gives PHP a single, consistent way to talk to any database.
            [views] => 120
            [created_at] => 2024-01-12
        )

    [1] => Array
        (
            [id] => 2
            [user_id] => 1
            [title] => Why Prepared Statements Matter
            [body] => Prepared statements are the real fix for SQL injection.
            [views] => 340
            [created_at] => 2024-01-20
        )

)</div>
<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ إن الاستعلام التاني فيه شرطين (<code>user_id</code> و<code>views</code>) — لو استخدمنا <code>?</code> هنا كنا هنحتاج نفتكر ترتيبهم بالظبط جوه المصفوفة، لكن <code>:uid</code> و<code>:minViews</code> بيوضّحوا نفسهم.</div>
    <div class="en">🇬🇧 Notice the second query has two conditions (<code>user_id</code> and <code>views</code>) — with <code>?</code> we'd need to remember their exact order in the array, but <code>:uid</code> and <code>:minViews</code> are self-documenting.</div>
</div>

<h2>bindValue — الشكل الصريح / bindValue — The Explicit Form</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 بدل ما تبعت كل القيم دفعة واحدة في <code>execute()</code>، تقدر تربط كل واحدة لوحدها بـ <code>bindValue()</code> قبل التنفيذ — ده مفيد لما محتاج تحدد نوع القيمة بدقة (<code>PDO::PARAM_STR</code>, <code>PDO::PARAM_INT</code>...).</div>
    <div class="en">🇬🇧 Instead of passing every value at once in <code>execute()</code>, you can bind each one individually with <code>bindValue()</code> before executing — useful when you need to specify the value's type precisely (<code>PDO::PARAM_STR</code>, <code>PDO::PARAM_INT</code>...).</div>
</div>

<pre><code>&lt;?php
$stmt = $pdo->prepare('SELECT name, role FROM users WHERE role = :role');
$stmt->bindValue(':role', 'editor', PDO::PARAM_STR);
$stmt->execute();
print_r($stmt->fetchAll(PDO::FETCH_ASSOC));</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">Array
(
    [0] => Array
        (
            [name] => Laila Mostafa
            [role] => editor
        )

)</div>

<div class="bi-block">
    <div class="ar">🇪🇬 جرّب بنفسك في المحرر تحت — غيّر الإيميل أو الـ role وشوف النتيجة الحقيقية.</div>
    <div class="en">🇬🇧 Try it yourself in the editor below — change the email or role and see the real result.</div>
</div>

<div class="mini-editor-wrap">
    <textarea spellcheck="false">&lt;?php
require __DIR__ . '/../db-sandbox/schema.php';
$pdo = build_sandbox_pdo();

// جرّب positional
$stmt = $pdo->prepare('SELECT name, email FROM users WHERE email = ?');
$stmt->execute(['youssef@example.com']);
print_r($stmt->fetch(PDO::FETCH_ASSOC));

// جرّب named
$stmt = $pdo->prepare('SELECT title FROM posts WHERE user_id = :uid AND views > :minViews');
$stmt->execute(['uid' => 4, 'minViews' => 200]);
print_r($stmt->fetchAll(PDO::FETCH_ASSOC));</textarea>
    <div class="mini-toolbar">
        <button class="mini-run-btn">▶ شغّل / Run</button>
        <span class="mini-status"></span>
    </div>
    <div class="output-box">— لسه متشغلش / not run yet —</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="sara">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">في مثال الـ Positional Placeholder، مين المستخدم اللي رجع لإيميل <code>sara@example.com</code>؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">In the positional placeholder example, which user came back for <code>sara@example.com</code>?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="sara"> Sara Ali</label>
        <label><input type="radio" name="q1" value="omar"> Omar Khaled</label>
        <label><input type="radio" name="q1" value="none"> محدش — النتيجة فاضية</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="assoc">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">مع Named Placeholders (<code>:email</code>)، شكل الـ array اللي بتبعته لـ <code>execute()</code> إيه؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">With named placeholders (<code>:email</code>), what shape is the array passed to <code>execute()</code>?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="indexed"> Indexed array بترتيب الظهور</label>
        <label><input type="radio" name="q2" value="assoc"> Associative array بمفاتيح نفس أسماء الـ placeholders</label>
        <label><input type="radio" name="q2" value="string"> نص واحد فيه كل القيم</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="two">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">استعلام <code>WHERE user_id = :uid AND views > :minViews</code> بـ <code>uid=1, minViews=100</code> رجّع كام مقال؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">The query <code>WHERE user_id = :uid AND views > :minViews</code> with <code>uid=1, minViews=100</code> returned how many posts?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="one"> 1</label>
        <label><input type="radio" name="q3" value="two"> 2</label>
        <label><input type="radio" name="q3" value="zero"> 0</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="data">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">ليه <code>prepare()</code>/<code>execute()</code> بيمنع SQL Injection؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Why do <code>prepare()</code>/<code>execute()</code> prevent SQL Injection?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="data"> لإن القيم بتتبعت منفصلة وبتتعامل كبيانات فقط، مش كجزء من الجملة</label>
        <label><input type="radio" name="q4" value="magic"> لإن PDO بيشفّر القيم تلقائيًا</label>
        <label><input type="radio" name="q4" value="filter"> لإنها بتفلتر كلمات زي OR وSELECT من المدخل</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ دالة بحث آمنة / A Safe Search Function</h3>
    <div class="ar">🇪🇬 في <a href="../playground/index.php">محرر الكود</a>: اكتب دالة <code>findUserByEmail(PDO $pdo, string $email): array|false</code> باستخدام Prepared Statement بـ <code>?</code>، وجرّبها بإيميلين مختلفين من الـ Sandbox، وبعدين اكتب نسخة تانية بنفس المنطق لكن بـ Named Placeholder (<code>:email</code>) وتأكد إن النتيجة نفسها.</div>
    <div class="en">🇬🇧 In the <a href="../playground/index.php">Playground</a>: write a <code>findUserByEmail(PDO $pdo, string $email): array|false</code> function using a Prepared Statement with <code>?</code>, test it with two different sandbox emails, then write a second version with the same logic but a named placeholder (<code>:email</code>) and confirm the result matches.</div>
</div>

<div class="exercise-box">
    <h3>✍️ تمرين إضافي / Extra Exercise</h3>
    <div class="ar">🇪🇬 اكتب دالة <code>postsByAuthorAndMinViews(PDO $pdo, int $userId, int $minViews): array</code> باستخدام Named Placeholders (<code>:uid</code>, <code>:minViews</code>) زي المثال فوق، وجرّبها بقيم مختلفة. لو عايز تفهم لماذا هذا يهمك من ناحية الأمان بعمق أكتر، راجع <a href="security-sql-injection.php">معمل SQL Injection</a>.</div>
    <div class="en">🇬🇧 Write a <code>postsByAuthorAndMinViews(PDO $pdo, int $userId, int $minViews): array</code> function using named placeholders (<code>:uid</code>, <code>:minViews</code>) like the example above, and test it with different values. For a deeper look at why this matters for security, revisit the <a href="security-sql-injection.php">SQL Injection Lab</a>.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 كل عملية قاعدة بيانات في مشروع Task Manager (الـ Capstone) وفي أي API هتبنيها في المسار ده هتستخدم Prepared Statements — من غير استثناء. الدرس الجاي بيوريك إزاي تجمع كذا عملية في وحدة واحدة "تنجح كلها أو تفشل كلها" بـ Transactions. الدرس الجاي: <a href="sql-transactions.php">Transactions: BEGIN, COMMIT, ROLLBACK</a>.</div>
    <div class="en">🇬🇧 Every database operation in the Capstone Task Manager, and any API you build in this track, uses Prepared Statements — no exceptions. The next lesson shows you how to bundle several operations into one unit that "all succeed or all fail" with Transactions. Next lesson: <a href="sql-transactions.php">Transactions: BEGIN, COMMIT, ROLLBACK</a>.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li><code>prepare($sql)</code> بيجهّز الجملة بعلامات مكان القيم (<code>?</code> أو <code>:name</code>)؛ <code>execute()</code> بيبعت القيم منفصلة.</li>
        <li>Positional (<code>?</code>) — array مرتّبة بنفس ترتيب الظهور. Named (<code>:name</code>) — associative array بأسماء موضّحة، أوضح مع عدة قيم.</li>
        <li><code>bindValue()</code> بيديك تحكم صريح في نوع كل قيمة قبل التنفيذ.</li>
        <li>الأمان (منع SQL Injection) هو نتيجة جانبية للأسلوب ده، مش الغرض الوحيد منه — التفاصيل الكاملة في <a href="security-sql-injection.php">معمل SQL Injection</a>.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="sql-joins-deep-dive.php">← المرحلة السابقة</a>
    <a href="sql-transactions.php">الدرس الجاي / Next: Transactions: BEGIN, COMMIT, ROLLBACK →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
