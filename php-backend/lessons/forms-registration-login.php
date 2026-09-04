<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'forms-registration-login';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'الفورمات، الجلسات، والكوكيز — بناء فورم تسجيل ودخول حقيقي';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">Stage 5 · Forms, Sessions & Cookies</span>
<h1>بناء فورم تسجيل ودخول حقيقي <span class="ltr">Building a Real Registration &amp; Login Form</span></h1>
<p class="subtitle">من الـ HTML للـ $_POST لمنطق التحقق — فورم تسجيل كامل خطوة بخطوة. <span class="ltr">From HTML to $_POST to validation logic — a complete registration form, step by step.</span></p>

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
    <div class="ar">🇪🇬 تفهم رحلة الفورم الكاملة: تكتب HTML فيه حقول (اسم، إيميل، باسورد، تأكيد باسورد)، المتصفح يبعتها كـ <code>$_POST</code> لما المستخدم يضغط "إرسال"، وبعدين PHP بتاخد المصفوفة دي وتتأكد إنها صح قبل ما تعمل بيها أي حاجة (زي حفظها في قاعدة بيانات).</div>
    <div class="en">🇬🇧 Understand the full form journey: you write HTML with fields (name, email, password, confirm password), the browser sends them as <code>$_POST</code> when the user clicks "submit", and then PHP takes that array and verifies it's correct before doing anything with it (like saving it to a database).</div>
</div>

<h2 id="understand">🧠 1) نموذج الـ HTML / The HTML Form</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 الفورم لازم يكون <code>method="post"</code> عشان البيانات متتبعتش ظاهرة في الـ URL (زي ما بيحصل مع <code>get</code>)، وكل حقل لازم يكون له <code>name</code> — ده هو المفتاح اللي هيظهر بيه جوه <code>$_POST</code> في PHP. الـ HTML ده مجرد Markup، مش كود بيتنفذ، فمفيش "ناتج فعلي" ليه لوحده — الناتج الحقيقي بيبان لما نعالج البيانات اللي جاية منه.</div>
    <div class="en">🇬🇧 The form must use <code>method="post"</code> so data isn't sent visibly in the URL (like with <code>get</code>), and every field needs a <code>name</code> — that's the key it will appear under inside PHP's <code>$_POST</code>. This HTML is just markup, not executable code, so it has no "actual output" on its own — the real output shows up once we process the data it sends.</div>
</div>

<pre><code>&lt;form method="post" action="register.php"&gt;
    &lt;label&gt;الاسم / Name&lt;/label&gt;
    &lt;input type="text" name="name"&gt;

    &lt;label&gt;الإيميل / Email&lt;/label&gt;
    &lt;input type="email" name="email"&gt;

    &lt;label&gt;كلمة المرور / Password&lt;/label&gt;
    &lt;input type="password" name="password"&gt;

    &lt;label&gt;تأكيد كلمة المرور / Confirm Password&lt;/label&gt;
    &lt;input type="password" name="confirm_password"&gt;

    &lt;button type="submit"&gt;تسجيل / Register&lt;/button&gt;
&lt;/form&gt;</code></pre>

<h2 id="practice">💻 2) منطق التحقق (Validation) / Validation Logic</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <strong>ملحوظة صدق:</strong> ده محرر كود مش سيرفر ويب حقيقي بيستقبل فورمات — عشان كده هنعمل <code>$_POST</code> يدوي (Simulated) بنفس القيم اللي هيبعتها متصفح حقيقي لو المستخدم دوّس "إرسال". لكن الكود اللي بيتحقق من البيانات دي — <code>filter_var</code>, <code>empty</code>, ومقارنة الباسوردين — بيتنفذ فعليًا، ومش نتيجة متخيّلة.</div>
    <div class="en">🇬🇧 <strong>Honesty note:</strong> this is a code editor, not a real web server receiving form submissions — so we build a manual (simulated) <code>$_POST</code> with the same values a real browser would send if the user clicked "submit". But the code that validates this data — <code>filter_var</code>, <code>empty</code>, and comparing the two passwords — genuinely executes, it's not an imagined result.</div>
</div>

<pre><code>&lt;?php
function validateRegistration(array $data): array {
    $errors = [];
    foreach (['name', 'email', 'password', 'confirm_password'] as $field) {
        if (empty($data[$field])) {
            $errors[] = "Missing required field: $field";
        }
    }
    if (!empty($data['email']) && !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
    }
    if (!empty($data['password']) && !empty($data['confirm_password'])
        && $data['password'] !== $data['confirm_password']) {
        $errors[] = "Passwords do not match";
    }
    return $errors;
}

// Simulating what $_POST would contain after a real form submission
$cases = [
    'Case 1: valid data' => [
        'name' => 'Ahmed Ali', 'email' => 'ahmed@example.com',
        'password' => 'Secret123', 'confirm_password' => 'Secret123',
    ],
    'Case 2: missing name' => [
        'name' => '', 'email' => 'ahmed@example.com',
        'password' => 'Secret123', 'confirm_password' => 'Secret123',
    ],
    'Case 3: invalid email' => [
        'name' => 'Ahmed Ali', 'email' => 'not-an-email',
        'password' => 'Secret123', 'confirm_password' => 'Secret123',
    ],
    'Case 4: password mismatch' => [
        'name' => 'Ahmed Ali', 'email' => 'ahmed@example.com',
        'password' => 'Secret123', 'confirm_password' => 'Different456',
    ],
];

foreach ($cases as $label => $data) {
    echo "=== $label ===" . PHP_EOL;
    $errors = validateRegistration($data);
    if (empty($errors)) {
        echo "Result: VALID - account would be created." . PHP_EOL;
    } else {
        echo "Result: INVALID" . PHP_EOL;
        foreach ($errors as $e) {
            echo " - $e" . PHP_EOL;
        }
    }
    echo PHP_EOL;
}</code></pre>
<h3>الناتج الفعلي (اتنفّذ فعليًا) / Actual output (really executed)</h3>
<div class="output-box">=== Case 1: valid data ===
Result: VALID - account would be created.

=== Case 2: missing name ===
Result: INVALID
 - Missing required field: name

=== Case 3: invalid email ===
Result: INVALID
 - Invalid email format

=== Case 4: password mismatch ===
Result: INVALID
 - Passwords do not match</div>

<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ إن <code>filter_var($email, FILTER_VALIDATE_EMAIL)</code> بترجع القيمة نفسها لو الإيميل صحيح، أو <code>false</code> لو غلط — عشان كده استخدمناها جوه <code>!</code> (النفي) في الشرط. ودايمًا اتأكد الحقل مش فاضي الأول قبل ما تقارن الباسوردين، وإلا هتقارن قيمتين فاضيين وهما "متطابقين" غلط.</div>
    <div class="en">🇬🇧 Notice <code>filter_var($email, FILTER_VALIDATE_EMAIL)</code> returns the value itself if the email is valid, or <code>false</code> if not — that's why we negate it with <code>!</code> in the condition. Also always check a field isn't empty before comparing the two passwords, or you'd be comparing two empty values that "match" incorrectly.</div>
</div>

<div class="mini-editor-wrap">
    <textarea spellcheck="false">&lt;?php
function validateRegistration(array $data): array {
    $errors = [];
    foreach (['name', 'email', 'password', 'confirm_password'] as $field) {
        if (empty($data[$field])) {
            $errors[] = "Missing required field: $field";
        }
    }
    if (!empty($data['email']) && !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
    }
    if (!empty($data['password']) && !empty($data['confirm_password'])
        && $data['password'] !== $data['confirm_password']) {
        $errors[] = "Passwords do not match";
    }
    return $errors;
}

$data = [
    'name' => 'Sara',
    'email' => 'sara@example.com',
    'password' => 'MyPass1',
    'confirm_password' => 'MyPass1',
];

$errors = validateRegistration($data);
if (empty($errors)) {
    echo "VALID - account would be created." . PHP_EOL;
} else {
    foreach ($errors as $e) echo "- $e" . PHP_EOL;
}</textarea>
    <div class="mini-toolbar">
        <button class="mini-run-btn">▶ شغّل / Run</button>
        <span class="mini-status"></span>
    </div>
    <div class="output-box">— لسه متشغلش / not run yet —</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="post">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">فورم HTML بـ <code>method="post"</code>، البيانات بتوصل لـ PHP في أنهي متغيّر عالمي؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">An HTML form with <code>method="post"</code> — which superglobal does the data arrive in?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="get"> $_GET</label>
        <label><input type="radio" name="q1" value="post"> $_POST</label>
        <label><input type="radio" name="q1" value="session"> $_SESSION</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="false">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question"><code>filter_var('not-an-email', FILTER_VALIDATE_EMAIL)</code> بترجع إيه؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What does <code>filter_var('not-an-email', FILTER_VALIDATE_EMAIL)</code> return?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="true"> true</label>
        <label><input type="radio" name="q2" value="false"> false</label>
        <label><input type="radio" name="q2" value="throw"> بترمي Exception</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="mismatch">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">حسب Case 4 المنفّذ فوق (<code>password = Secret123</code>, <code>confirm_password = Different456</code>)، إيه الخطأ الوحيد الظاهر؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Based on Case 4 executed above, what is the single error shown?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="empty"> Missing required field</label>
        <label><input type="radio" name="q3" value="mismatch"> Passwords do not match</label>
        <label><input type="radio" name="q3" value="email"> Invalid email format</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="reach">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">ليه لازم نتحقق من البيانات في PHP (Server-Side) حتى لو الفورم فيه <code>required</code> في الـ HTML؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Why validate on the PHP (server) side even if the HTML form has <code>required</code>?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="reach"> لإن أي حد يقدر يبعت طلب POST مباشرة (زي بـ curl) ويتخطى الـ HTML خالص</label>
        <label><input type="radio" name="q4" value="speed"> عشان يخلي الصفحة تحمّل أسرع</label>
        <label><input type="radio" name="q4" value="style"> مالوش داعي، الـ HTML كفاية دايمًا</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ إضافة شرط قوة الباسورد / Adding a Password Strength Rule</h3>
    <div class="ar">🇪🇬 في <a href="../playground/index.php">محرر الكود</a> (أو المحرر المصغّر فوق): عدّل <code>validateRegistration</code> عشان تضيف شرط جديد — الباسورد لازم يكون 8 أحرف على الأقل ويحتوي على رقم واحد على الأقل (استخدم <code>strlen</code> و<code>preg_match('/[0-9]/', $password)</code>). جرّبها بباسورد قصير وباسورد من غير أرقام، واطبع رسالة الخطأ المناسبة.</div>
    <div class="en">🇬🇧 In the <a href="../playground/index.php">Playground</a> (or the mini editor above): extend <code>validateRegistration</code> with a new rule — the password must be at least 8 characters and contain at least one digit (use <code>strlen</code> and <code>preg_match('/[0-9]/', $password)</code>). Test it with a short password and one with no digits, printing the right error each time.</div>
</div>

<div class="exercise-box">
    <h3>✍️ تمرين إضافي / Extra Exercise</h3>
    <div class="ar">🇪🇬 اعمل فورم تسجيل دخول بسيط (إيميل وباسورد بس)، واكتب دالة <code>validateLogin(array $data): array</code> بتتأكد إن الحقلين مش فاضيين وإن الإيميل شكله صحيح — من غير التحقق من كلمة السر الفعلية (ده موضوع الدروس الجاية).</div>
    <div class="en">🇬🇧 Build a simple login form (email and password only), and write a <code>validateLogin(array $data): array</code> function that checks both fields aren't empty and the email looks valid — without checking the actual password value yet (that's for a later lesson).</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 لسه المستخدم بعد ما يسجّل مش "متفكّره" السيرفر — كل طلب بعد كده PHP بيعامله كأنه غريب. الدرس الجاي هيوريك إزاي السيرفر بيفتكر مين المستخدم عبر أكتر من طلب باستخدام الـ Sessions.</div>
    <div class="en">🇬🇧 After registering, the server still doesn't "remember" the user — every following request PHP treats as a stranger. The next lesson shows how the server remembers who a user is across multiple requests using Sessions.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>فورم HTML بـ <code>method="post"</code> وكل حقل له <code>name</code> بيوصل PHP كـ <code>$_POST[name]</code>.</li>
        <li>Validation بيتحقق من: الحقول المطلوبة (<code>empty</code>)، شكل الإيميل (<code>filter_var</code>)، وتطابق الباسوردين.</li>
        <li>التحقق لازم يحصل على السيرفر (PHP) دايمًا، حتى لو فيه تحقق في الـ HTML، لإن أي حد يقدر يتخطى الـ HTML.</li>
        <li>في بيئة تعليمية زي دي، بنحاكي <code>$_POST</code> بمصفوفة يدوية عشان نقدر ننفذ الكود فعليًا بدون سيرفر ويب حقيقي.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="../index.php">← المرحلة السابقة</a>
    <a href="sessions-basics.php">الدرس الجاي / Next: Sessions →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
