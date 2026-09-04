<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'security-validation-vs-sanitization';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'الأمان — Validation مقابل Sanitization';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">Stage 14 · Security</span>
<h1>Validation مقابل Sanitization <span class="ltr">Validation vs Sanitization</span></h1>
<p class="subtitle">الفرق اللي كتير من المطورين بيلخبطوه — ومتى تحتاج كل واحد فيهم. <span class="ltr">The distinction many developers confuse — and when you need each one.</span></p>

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
    <div class="ar">🇪🇬 تفهم الفرق الجوهري بين <code>Validation</code> (هل المدخل ده صحيح شكلًا ومعنى؟ — قرار قبول/رفض) و<code>Sanitization</code> (تنظيف/تعديل المدخل بإزالة أو تحويل حروف معيّنة — من غير ما يضمن إن الناتج "صحيح")، وتشوف الفرق ده بأمثلة حقيقية منفّذة على <code>filter_var()</code>.</div>
    <div class="en">🇬🇧 Understand the fundamental difference between <code>Validation</code> (is this input correct in shape and meaning? — an accept/reject decision) and <code>Sanitization</code> (cleaning/modifying input by removing or transforming certain characters — without guaranteeing the result is "correct"), and see that difference through real examples executed with <code>filter_var()</code>.</div>
</div>

<h2 id="understand">🧠 الفرق الجوهري / The Fundamental Difference</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>Validation</b> بتسأل سؤال بـ true/false: "هل ده إيميل صحيح؟" — لو لأ، بترفض المدخل بالكامل وتوقف المعالجة. <b>Sanitization</b> مختلفة تمامًا: بتاخد المدخل "زي ما هو" وتحاول تنضّفه بإزالة حروف مش مسموحة — لكن من غير ما تتحقق إن الناتج بقى "صحيح" فعلًا. كتير من المطورين بيستخدموا Sanitization وحدها ظنًا إنها بديل عن Validation — وده غلط، لإن مدخل تمامًا غلط (زي <code>"not-an-email"</code>) ممكن يعدّي من الـ Sanitization من غير أي تغيير، لإنه أصلًا مفيهوش حروف "خطيرة" تتشال.</div>
    <div class="en">🇬🇧 <b>Validation</b> asks a true/false question: "is this a correct email?" — if not, it rejects the input entirely and stops processing. <b>Sanitization</b> is entirely different: it takes the input "as-is" and tries to clean it by removing disallowed characters — without confirming the result is actually "correct". Many developers use sanitization alone thinking it's a substitute for validation — that's wrong, because a completely invalid input (like <code>"not-an-email"</code>) can pass through sanitization unchanged, since it doesn't contain any "dangerous" characters to strip in the first place.</div>
</div>

<pre><code>&lt;?php
$emails = [
    'user@example.com',
    'not-an-email',
    'weird"quote@example.com',
    'Waleed &lt;bad&gt;@example.com',
];

foreach ($emails as $email) {
    $isValid = filter_var($email, FILTER_VALIDATE_EMAIL);
    $sanitized = filter_var($email, FILTER_SANITIZE_EMAIL);
    echo "Input:      '$email'" . PHP_EOL;
    echo "Validate -&gt; " . ($isValid === false ? 'FALSE (rejected)' : "'$isValid' (accepted as-is)") . PHP_EOL;
    echo "Sanitize -&gt; '$sanitized' (characters stripped, still just a best-effort cleanup)" . PHP_EOL;
    echo str_repeat('-', 40) . PHP_EOL;
}</code></pre>
<h3>الناتج الفعلي (اتنفّذ فعليًا) / Actual output (really executed)</h3>
<div class="output-box">Input:      'user@example.com'
Validate -> 'user@example.com' (accepted as-is)
Sanitize -> 'user@example.com' (characters stripped, still just a best-effort cleanup)
----------------------------------------
Input:      'not-an-email'
Validate -> FALSE (rejected)
Sanitize -> 'not-an-email' (characters stripped, still just a best-effort cleanup)
----------------------------------------
Input:      'weird"quote@example.com'
Validate -> FALSE (rejected)
Sanitize -> 'weirdquote@example.com' (characters stripped, still just a best-effort cleanup)
----------------------------------------
Input:      'Waleed <bad>@example.com'
Validate -> FALSE (rejected)
Sanitize -> 'Waleedbad@example.com' (characters stripped, still just a best-effort cleanup)
----------------------------------------</div>

<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ أهم سطرين: <code>'not-an-email'</code> — <code>Validate</code> رفضه بحق (<code>FALSE</code>)، لكن <code>Sanitize</code> رجّعه <b>كما هو تمامًا</b>، لإنه أصلًا مفيهوش أي حرف "ممنوع" يتشال. وده الدليل العملي إن Sanitization <b>مش</b> بديل عن Validation — لو استخدمت الـ Sanitized value في قاعدة بيانات على إنه إيميل صحيح، هتخزّن <code>"not-an-email"</code> كإيميل مستخدم، وده غلط منطقيًا حتى لو مفيهوش أي خطر أمني مباشر.</div>
    <div class="en">🇬🇧 Notice the most important two lines: <code>'not-an-email'</code> — <code>Validate</code> correctly rejected it (<code>FALSE</code>), but <code>Sanitize</code> returned it <b>completely unchanged</b>, since it has no "disallowed" characters to strip in the first place. This is the practical proof that sanitization is <b>not</b> a substitute for validation — if you used the sanitized value in a database as a valid email, you'd store <code>"not-an-email"</code> as a user's email, which is logically wrong even though it carries no direct security risk.</div>
</div>

<h2 id="practice">💻 امتى تستخدم كل واحد / When to Use Each</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>استخدم Validation</b> لما محتاج تقرر "أقبل ولا أرفض؟" — إيميل تسجيل، عمر بين 18 و99، رقم موبايل بصيغة معيّنة. <b>استخدم Sanitization</b> لما محتاج "تنضّف" مدخل قبل ما تستخدمه في سياق معيّن — زي إزالة وسوم HTML من تعليق قبل تخزينه، أو تحويل نص لإيميل "مبدئي" قبل ما تعمله Validate. القاعدة الذهبية: <b>Validate الأول، وبعدين لو محتاج، Sanitize للسياق اللي هيتحط فيه</b> — الاتنين مكملين لبعض، مش بدلاء عن بعض.</div>
    <div class="en">🇬🇧 <b>Use Validation</b> when you need to decide "accept or reject?" — a signup email, an age between 18 and 99, a phone number in a specific format. <b>Use Sanitization</b> when you need to "clean" input before using it in a particular context — like stripping HTML tags from a comment before storing it, or normalizing text into a "candidate" email before validating it. The golden rule: <b>validate first, then sanitize for the context it will be placed in if needed</b> — the two complement each other, they don't replace each other.</div>
</div>

<pre><code>&lt;?php
function registerEmail(string $rawInput): string
{
    // الخطوة 1: نضف الشكل العام الأول (تنضيف بسيط، مش قرار قبول/رفض)
    $candidate = trim($rawInput);

    // الخطوة 2: القرار الحقيقي — Validation
    $valid = filter_var($candidate, FILTER_VALIDATE_EMAIL);
    if ($valid === false) {
        throw new InvalidArgumentException("Invalid email: $rawInput");
    }

    return $valid;
}

try {
    echo registerEmail('  user@example.com  ') . PHP_EOL;
    echo registerEmail('not-an-email') . PHP_EOL;
} catch (InvalidArgumentException $e) {
    echo "Rejected: " . $e->getMessage() . PHP_EOL;
}</code></pre>
<h3>الناتج الفعلي (اتنفّذ فعليًا) / Actual output (really executed)</h3>
<div class="output-box">user@example.com
Rejected: Invalid email: not-an-email</div>

<div class="bi-block">
    <div class="ar">🇪🇬 جرّب الكود ده بنفسك في المحرر تحت — غيّر <code>$rawInput</code> لإيميلات مختلفة (صحيحة وغلط) وشوف إمتى بيتقبل وإمتى بيترفض.</div>
    <div class="en">🇬🇧 Try this code yourself in the editor below — change <code>$rawInput</code> to different emails (valid and invalid) and see when it's accepted versus rejected.</div>
</div>

<div class="mini-editor-wrap">
    <textarea spellcheck="false">&lt;?php
function registerEmail(string $rawInput): string
{
    $candidate = trim($rawInput);

    $valid = filter_var($candidate, FILTER_VALIDATE_EMAIL);
    if ($valid === false) {
        throw new InvalidArgumentException("Invalid email: $rawInput");
    }

    return $valid;
}

$testInputs = [
    '  user@example.com  ',
    'not-an-email',
    'admin@sila.dev',
    'weird"quote@example.com',
];

foreach ($testInputs as $input) {
    try {
        echo "'" . $input . "' -&gt; ACCEPTED: " . registerEmail($input) . PHP_EOL;
    } catch (InvalidArgumentException $e) {
        echo "'" . $input . "' -&gt; " . $e->getMessage() . PHP_EOL;
    }
}
</textarea>
    <div class="mini-toolbar">
        <button class="mini-run-btn">▶ شغّل / Run</button>
        <span class="mini-status"></span>
    </div>
    <div class="output-box">— لسه متشغلش / not run yet —</div>
</div>

<div class="security-box">
    <h3>⚠️ ملحوظة أمان / Security Note</h3>
    <div class="ar">🇪🇬 لا Validation ولا Sanitization بتغنيك عن الحلول المتخصصة اللي شفناها في باقي الدروس: Prepared Statements ضد SQL Injection، و<code>htmlspecialchars()</code> ضد XSS. فكّر فيهم كطبقة أولى (هل المدخل منطقي؟)، مش كبديل عن الحماية المخصصة لكل سياق (SQL, HTML, الملفات...).</div>
    <div class="en">🇬🇧 Neither Validation nor Sanitization replaces the specialized fixes covered in the other lessons: Prepared Statements against SQL Injection, and <code>htmlspecialchars()</code> against XSS. Think of them as a first layer (does this input make sense?), not a substitute for context-specific protection (SQL, HTML, files...).</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="validate">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">أنهي مفهوم بيرجع قرار true/false (قبول أو رفض)؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Which concept returns an accept/reject (true/false) decision?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="validate"> Validation</label>
        <label><input type="radio" name="q1" value="sanitize"> Sanitization</label>
        <label><input type="radio" name="q1" value="both"> الاتنين نفس الحاجة بالظبط</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="unchanged">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">حسب الديمو المنفّذ فوق، <code>filter_var('not-an-email', FILTER_SANITIZE_EMAIL)</code> رجّع إيه؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Based on the executed demo above, what did <code>filter_var('not-an-email', FILTER_SANITIZE_EMAIL)</code> return?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="unchanged"> 'not-an-email' بدون أي تغيير</label>
        <label><input type="radio" name="q2" value="false"> false</label>
        <label><input type="radio" name="q2" value="empty"> نص فاضي ''</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="no">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">هل Sanitization بديل كافي عن Validation؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Is Sanitization a sufficient substitute for Validation?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="yes"> أيوه، لإن الاتنين بينضّفوا المدخل بنفس الطريقة</label>
        <label><input type="radio" name="q3" value="no"> لأ، لإن مدخل غلط تمامًا ممكن يعدّي من Sanitization من غير أي تغيير</label>
        <label><input type="radio" name="q3" value="sometimes"> بس لو المدخل نص قصير</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="rejected">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">في مثال <code>registerEmail()</code> فوق، إيه اللي حصل مع <code>'not-an-email'</code>؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">In the <code>registerEmail()</code> example above, what happened with <code>'not-an-email'</code>?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="accepted"> اتقبل وتم تخزينه كما هو</label>
        <label><input type="radio" name="q4" value="rejected"> رمى InvalidArgumentException واتّرفض</label>
        <label><input type="radio" name="q4" value="sanitized"> اتنضّف واتحول لإيميل صحيح</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ فورم تسجيل مستخدم / A User Registration Form</h3>
    <div class="ar">🇪🇬 في <a href="../playground/index.php">محرر الكود</a> (أو المحرر المصغّر فوق): اكتب دالة <code>registerUser(string $name, string $email, string $age): array</code> بترجع <code>['ok' => bool, 'errors' => array]</code>. استخدم <code>Validation</code> على الإيميل (<code>FILTER_VALIDATE_EMAIL</code>) والعمر (رقم بين 13 و120)، واستخدم <code>Sanitization</code> على الاسم (<code>htmlspecialchars</code> أو <code>filter_var</code> مع <code>FILTER_SANITIZE_FULL_SPECIAL_CHARS</code>) قبل ما تحطه في الناتج. جرّبها بـ 3 حالات مختلفة واطبع النتيجة.</div>
    <div class="en">🇬🇧 In the <a href="../playground/index.php">Playground</a> (or the mini editor above): write a <code>registerUser(string $name, string $email, string $age): array</code> function returning <code>['ok' => bool, 'errors' => array]</code>. Use <code>Validation</code> on the email (<code>FILTER_VALIDATE_EMAIL</code>) and age (a number between 13 and 120), and use <code>Sanitization</code> on the name (<code>htmlspecialchars</code> or <code>filter_var</code> with <code>FILTER_SANITIZE_FULL_SPECIAL_CHARS</code>) before placing it in the result. Test it with 3 different cases and print the outcome.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 كده خلّصنا مرحلة الأمان كاملة: SQL Injection، XSS، CSRF، أمان كلمات المرور والجلسات، رفع الملفات، وأخيرًا Validation مقابل Sanitization. الخطوة الجاية هي معمل التصحيح (Debugging Lab) — هتاخد 5 أنواع Bugs حقيقية (Syntax, Logic, Type, SQL, Validation) وتلاقيها وتفهمها وتصلحها وتختبرها، بنفس روح "الكود الحقيقي" اللي شفتها في مرحلة الأمان دي.</div>
    <div class="en">🇬🇧 That wraps up the entire Security stage: SQL Injection, XSS, CSRF, password &amp; session security, file uploads, and finally Validation vs Sanitization. Next up is the Debugging Lab — you'll take 5 real bug types (syntax, logic, type, SQL, validation), find them, understand them, fix them, and test them, in the same "real code" spirit you saw throughout this Security stage.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li><code>Validation</code> = قرار قبول/رفض (هل المدخل صحيح؟). <code>Sanitization</code> = تنظيف/تعديل المدخل من غير ضمان صحته.</li>
        <li>مدخل غلط تمامًا ممكن يعدّي من Sanitization من غير أي تغيير — الديمو المنفّذ أثبت كده بـ <code>'not-an-email'</code>.</li>
        <li>القاعدة: Validate الأول (قرار)، وSanitize لو محتاج (تنظيف حسب السياق) — مش بديل واحد عن التاني.</li>
        <li>الاتنين مايغنوش عن حلول متخصصة زي Prepared Statements و<code>htmlspecialchars()</code>.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="security-file-upload.php">← الدرس السابق / Prev: File Upload Security</a>
    <a href="../index.php">لوحة التحكم / Dashboard →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
