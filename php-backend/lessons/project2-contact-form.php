<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'project2-contact-form';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = '🚀 مشروع 2: فورم تواصل — Contact Form';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">Stage 18 · Projects</span>
<h1>🚀 مشروع 2: فورم تواصل <span class="ltr">🚀 Project 2: Contact Form</span></h1>
<p class="subtitle">فورم حقيقي بـ Validation كامل، حماية من الأخطاء الشائعة، ورسائل خطأ واضحة.</p>

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
    <div class="ar">🇪🇬 أي موقع فيه فورم تواصل بيواجه نفس المشكلة: مينفعش تثق في أي حاجة جاية من المستخدم. المشروع ده بيبني فورم تواصل حقيقي (اسم، إيميل، رسالة) مع دالة Validation كاملة في السيرفر بترفض أي مدخل غلط قبل ما يوصل لأي مكان تاني، وترجع رسائل خطأ واضحة توضح بالظبط إيه اللي غلط.</div>
    <div class="en">🇬🇧 Every site with a contact form faces the same problem: you can never trust anything coming from the user. This project builds a real contact form (name, email, message) with a complete server-side validation function that rejects any bad input before it goes anywhere else, and returns clear error messages explaining exactly what's wrong.</div>
</div>

<h2 id="understand">🧠 المواصفات المطلوبة / Requirements</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 الـ Validation لازم تتحقق من 3 حقول:</div>
</div>
<div class="recap-box">
    <h3>📋 قائمة المتطلبات / Checklist</h3>
    <ul>
        <li><b>الاسم (name)</b> — مطلوب، مينفعش يبقى فاضي بعد <code>trim()</code>.</li>
        <li><b>الإيميل (email)</b> — مطلوب، ولازم يكون بصيغة إيميل صحيحة بـ <code>filter_var(..., FILTER_VALIDATE_EMAIL)</code> — مش مجرد "فيه @".</li>
        <li><b>الرسالة (message)</b> — لازم تكون 10 أحرف على الأقل بعد <code>trim()</code>، عشان نمنع رسائل زي "hi" أو رسائل فاضية.</li>
    </ul>
</div>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>ملاحظة صريحة عن الإدخال:</b> لأن الدرس ده بيتشغّل عن طريق PHP CLI (مش سيرفر ويب حقيقي فيه فورم مُرسل فعليًا)، منطق التحقق بيتاخد مصفوفة <code>$input</code> بدل <code>$_POST</code> مباشرة — بالظبط نفس شكل البيانات اللي هتوصل من <code>$_POST</code> في فورم حقيقي، غير إننا كتبناها يدويًا هنا عشان نقدر نجرب حالات محددة (Test Cases) ونتأكد إن كل واحدة بترجع النتيجة المتوقعة بالظبط.</div>
    <div class="en">🇬🇧 <b>An honest note about input:</b> because this lesson runs via PHP CLI (not a real web server with an actual submitted form), the validation logic takes an <code>$input</code> array instead of <code>$_POST</code> directly — the exact same shape of data that would arrive via <code>$_POST</code> in a real form, just written by hand here so we can try specific test cases and verify each one returns exactly the expected result.</div>
</div>

<h2 id="practice">💻 التنفيذ / Implementation</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 دالة <code>validateContactForm()</code> بترجع مصفوفة أخطاء (Associative Array مفتاحها اسم الحقل). لو المصفوفة رجعت فاضية، يبقى المدخل كله صحيح. الطريقة دي (إرجاع مصفوفة أخطاء بدل <code>true</code>/<code>false</code>) مهمة لأنها بتخلّيك تعرض رسالة مخصصة تحت كل حقل غلط، مش رسالة عامة واحدة للفورم كله.</div>
    <div class="en">🇬🇧 The <code>validateContactForm()</code> function returns an array of errors (an associative array keyed by field name). If that array comes back empty, the whole input is valid. This approach — returning an errors array instead of just <code>true</code>/<code>false</code> — matters because it lets you show a specific message under each broken field, instead of one generic message for the whole form.</div>
</div>

<pre><code>&lt;?php
function validateContactForm(array $input): array {
    $errors = [];

    $name = trim($input['name'] ?? '');
    if ($name === '') {
        $errors['name'] = 'Name is required.';
    }

    $email = trim($input['email'] ?? '');
    if ($email === '') {
        $errors['email'] = 'Email is required.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Please enter a valid email address.';
    }

    $message = trim($input['message'] ?? '');
    if (strlen($message) < 10) {
        $errors['message'] = 'Message must be at least 10 characters long.';
    }

    return $errors;
}

// $input simulates $_POST from a submitted contact form.
$testCases = [
    'Valid submission'   => ['name' => 'Waleed', 'email' => 'waleed@example.com', 'message' => 'Hi, I would like to know more about your services.'],
    'Missing name'       => ['name' => '', 'email' => 'waleed@example.com', 'message' => 'Hi, I would like to know more about your services.'],
    'Invalid email'      => ['name' => 'Waleed', 'email' => 'not-an-email', 'message' => 'Hi, I would like to know more about your services.'],
    'Too-short message'  => ['name' => 'Waleed', 'email' => 'waleed@example.com', 'message' => 'Hi'],
];

foreach ($testCases as $label => $input) {
    $errors = validateContactForm($input);
    echo "$label:" . PHP_EOL;
    echo '  ' . ($errors ? json_encode($errors) : 'No errors -- valid!') . PHP_EOL;
}</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">Valid submission:
  No errors -- valid!
Missing name:
  {"name":"Name is required."}
Invalid email:
  {"email":"Please enter a valid email address."}
Too-short message:
  {"message":"Message must be at least 10 characters long."}</div>

<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ إن كل حالة رجّعت بالظبط الخطأ المتوقع منها لوحدها — مفيش حالة "غلط" رجّعت مصفوفة فاضية، ومفيش حالة "صح" رجّعت أي خطأ. ده بالظبط شكل الـ Test Cases اللي المفروض تجربها على أي دالة Validation قبل ما تثق فيها.</div>
    <div class="en">🇬🇧 Notice each case returned exactly the error expected of it alone — no "bad" case came back with an empty errors array, and no "good" case came back with any error. This is exactly the shape of test cases you should try on any validation function before trusting it.</div>
</div>

<div class="bi-block">
    <div class="ar">🇪🇬 جرّب الكود بنفسك تحت — زوّد Test Case جديدة (زي إيميل فيه فراغ، أو اسم فيه أرقام بس) وشوف الدالة بترد إزاي.</div>
    <div class="en">🇬🇧 Try it yourself below — add a new test case (like an email with a space, or a name that's just numbers) and see how the function responds.</div>
</div>

<div class="mini-editor-wrap">
    <textarea spellcheck="false">&lt;?php
function validateContactForm(array $input): array {
    $errors = [];

    $name = trim($input['name'] ?? '');
    if ($name === '') {
        $errors['name'] = 'Name is required.';
    }

    $email = trim($input['email'] ?? '');
    if ($email === '') {
        $errors['email'] = 'Email is required.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Please enter a valid email address.';
    }

    $message = trim($input['message'] ?? '');
    if (strlen($message) < 10) {
        $errors['message'] = 'Message must be at least 10 characters long.';
    }

    return $errors;
}

$testCases = [
    'Valid submission'  => ['name' => 'Waleed', 'email' => 'waleed@example.com', 'message' => 'Hi, I would like to know more about your services.'],
    'Missing name'      => ['name' => '', 'email' => 'waleed@example.com', 'message' => 'Hi, I would like to know more about your services.'],
    'Invalid email'     => ['name' => 'Waleed', 'email' => 'not-an-email', 'message' => 'Hi, I would like to know more about your services.'],
    'Too-short message' => ['name' => 'Waleed', 'email' => 'waleed@example.com', 'message' => 'Hi'],
];

foreach ($testCases as $label => $input) {
    $errors = validateContactForm($input);
    echo "$label:" . PHP_EOL;
    echo '  ' . ($errors ? json_encode($errors) : 'No errors -- valid!') . PHP_EOL;
}</textarea>
    <div class="mini-toolbar">
        <button class="mini-run-btn">▶ شغّل / Run</button>
        <span class="mini-status"></span>
    </div>
    <div class="output-box">— لسه متشغلش / not run yet —</div>
</div>

<h2>نموذج الفورم HTML / The HTML Form</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 دي الصورة الكاملة: الفورم اللي هيبعت البيانات دي فعليًا عن طريق <code>POST</code>. مش هنشغّل الـ HTML ده (عرض صفحة مش هدف الدرس ده)، بس مهم تشوف إزاي أسماء الحقول (<code>name="name"</code>, <code>name="email"</code>, <code>name="message"</code>) هي نفسها المفاتيح اللي الدالة فوق بتقرا منها في <code>$_POST</code> على أرض الواقع.</div>
    <div class="en">🇬🇧 This is the full picture: the form that would actually submit this data via <code>POST</code>. We won't execute this HTML (rendering a page isn't this lesson's point), but it's important to see how the field names (<code>name="name"</code>, <code>name="email"</code>, <code>name="message"</code>) are the exact same keys the function above reads from <code>$_POST</code> in real life.</div>
</div>
<pre><code>&lt;form method="POST" action="/contact.php"&gt;
    &lt;label for="name"&gt;Name&lt;/label&gt;
    &lt;input type="text" id="name" name="name" required&gt;

    &lt;label for="email"&gt;Email&lt;/label&gt;
    &lt;input type="email" id="email" name="email" required&gt;

    &lt;label for="message"&gt;Message&lt;/label&gt;
    &lt;textarea id="message" name="message" rows="5" required&gt;&lt;/textarea&gt;

    &lt;button type="submit"&gt;Send&lt;/button&gt;
&lt;/form&gt;

&lt;?php
// contact.php -- the real entry point in production
$errors = validateContactForm($_POST);
if ($errors) {
    // re-render the form with $errors under each broken field
} else {
    // safe to process: send an email, save to a database, etc.
}</code></pre>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="filter_var">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">أنهي دالة الأنسب للتحقق إن نص شكله إيميل صحيح فعلاً؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Which function correctly checks that a string is a genuinely valid email?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="strpos"> strpos($email, '@')</label>
        <label><input type="radio" name="q1" value="filter_var"> filter_var($email, FILTER_VALIDATE_EMAIL)</label>
        <label><input type="radio" name="q1" value="strlen"> strlen($email) &gt; 5</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="array">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">ليه <code>validateContactForm()</code> بترجع مصفوفة أخطاء بدل <code>true</code>/<code>false</code>؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Why does <code>validateContactForm()</code> return an errors array instead of <code>true</code>/<code>false</code>?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="array"> عشان تقدر تعرض رسالة خطأ مخصصة تحت كل حقل غلط</label>
        <label><input type="radio" name="q2" value="speed"> عشان الكود يشتغل أسرع</label>
        <label><input type="radio" name="q2" value="required"> PHP بتجبرك تستخدم مصفوفة دايمًا</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="required">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">حسب الناتج الفعلي فوق، إيه اللي بيرجع لو الاسم فاضي؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Per the actual output above, what's returned when the name is empty?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="valid"> No errors -- valid!</label>
        <label><input type="radio" name="q3" value="required"> {"name":"Name is required."}</label>
        <label><input type="radio" name="q3" value="crash"> رسالة Fatal Error</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="10">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">حسب المتطلبات فوق، أقل عدد أحرف مسموح بيه للرسالة (بعد trim)؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Per the requirements above, what's the minimum allowed message length (after trim)?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="5"> 5</label>
        <label><input type="radio" name="q4" value="10"> 10</label>
        <label><input type="radio" name="q4" value="0"> لا يوجد حد أدنى</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ زوّد قاعدة تحقق جديدة / Add a New Validation Rule</h3>
    <div class="ar">🇪🇬 في المحرر المصغّر فوق (أو <a href="../playground/index.php">محرر الكود</a>): زوّد قاعدة تحقق جديدة على <code>validateContactForm()</code> — مثلًا: ارفض الرسالة لو طولها أكتر من 500 حرف (Spam طويل جدًا)، أو ارفض الاسم لو فيه أرقام بـ <code>preg_match()</code>. جرّب القاعدة الجديدة بـ Test Case مخصصة ليها، وتأكد إن باقي القواعد لسه شغالة صح.</div>
    <div class="en">🇬🇧 In the mini-editor above (or the <a href="../playground/index.php">Playground</a>): add a new validation rule to <code>validateContactForm()</code> — for example: reject messages longer than 500 characters (spam-length), or reject names containing digits using <code>preg_match()</code>. Test the new rule with a dedicated test case, and confirm the existing rules still work correctly.</div>
</div>

<h2 id="project">🚀 المشروع الجاي / Next Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 دلوقتي عندك Validation حقيقي شغال. المشروع الجاي هياخدك خطوة أهم: بدل ما ترفض/تقبل رسالة، هتبني نظام Register/Login/Logout حقيقي — يعني تخزين مستخدمين فعليًا في قاعدة بيانات، تشفير الباسورد بـ <code>password_hash()</code>، والتحقق منه وقت الدخول بـ <code>password_verify()</code>. ده أول مرة هتربط منطق Validation زي اللي بنيته هنا مع قاعدة بيانات حقيقية.</div>
    <div class="en">🇬🇧 You now have real, working validation. The next project takes a bigger step: instead of accepting/rejecting a message, you'll build a real Register/Login/Logout system — actually storing users in a database, hashing passwords with <code>password_hash()</code>, and verifying them at login with <code>password_verify()</code>. It's the first time you'll connect validation logic like what you built here to a real database.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li><code>filter_var($email, FILTER_VALIDATE_EMAIL)</code> هي الطريقة الصح للتحقق من صيغة إيميل، مش <code>strpos</code> أو <code>preg_match</code> يدوي.</li>
        <li>إرجاع مصفوفة أخطاء (بدل <code>true</code>/<code>false</code>) بيسمح بعرض رسالة مخصصة تحت كل حقل.</li>
        <li>لازم تجرّب Test Cases واضحة: مدخل صحيح، وكل نوع مدخل غلط لوحده، وتتأكد كل حالة بترجع النتيجة المتوقعة بالظبط.</li>
        <li>الفورم في HTML وبيانات <code>$_POST</code> بيوصلوا بنفس أسماء الحقول اللي الدالة بتقرا منها.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="project1-cli-calculator.php">← المشروع 1 / CLI Calculator</a>
    <a href="project3-auth-system.php">المشروع 3 / Next: Authentication System →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
