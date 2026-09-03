<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'contact-form-project';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'تطبيق عملي: نموذج تواصل — Full Stack Developer';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">مشروع تطبيقي 1 / Project 1</span>
<h1>نموذج تواصل (Contact Form) <span class="ltr">Practical Project</span></h1>
<p class="subtitle">أول مشروع بيجمع كل حاجة اتعلمتها من الجزئين: تصميم بـ HTML/CSS، وتحقق ومعالجة حقيقية بـ PHP. مشروع بسيط في المظهر، لكنه بيغطي كل خطوة هتقابلها في أي فورم حقيقي.</p>

<div class="step-tracker">
    <a href="#read">📖 Read</a>
    <a href="#understand">🧠 Understand</a>
    <a href="#practice">💻 Practice</a>
    <a href="#quiz">🧠 Quiz</a>
    <a href="#challenge">🛠️ Challenge</a>
    <a href="#project">🚀 Project</a>
</div>

<h2 id="read">الهدف / Goal</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 تبني فورم تواصل كامل: تصميمه بـ HTML/CSS، تستقبل بياناته بـ PHP، تتحقق منها (Validation)، تحميه من XSS، وترجع رسالة نجاح أو أخطاء واضحة للمستخدم من غير ما الصفحة تعمل Reload كامل.</div>
    <div class="en">🇬🇧 Build a complete contact form: design it with HTML/CSS, receive its data with PHP, validate it, protect it from XSS, and return a clear success message or errors to the user without a full page reload.</div>
</div>

<h2 id="understand">1) الواجهة / The Form</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 فورم بسيط بـ 3 حقول: اسم، إيميل، ورسالة. لاحظ إن كل حقل ليه <code>name</code> واضح — ده اللي هيوصل PHP في <code>$_POST</code>.</div>
    <div class="en">🇬🇧 A simple form with 3 fields: name, email, and message. Notice each field has a clear <code>name</code> attribute — that's what arrives in PHP's <code>$_POST</code>.</div>
</div>

<pre><code>&lt;form id="contact-form"&gt;
    &lt;label for="name"&gt;الاسم&lt;/label&gt;
    &lt;input type="text" id="name" name="name" required&gt;

    &lt;label for="email"&gt;الإيميل&lt;/label&gt;
    &lt;input type="email" id="email" name="email" required&gt;

    &lt;label for="message"&gt;الرسالة&lt;/label&gt;
    &lt;textarea id="message" name="message" rows="4" required&gt;&lt;/textarea&gt;

    &lt;button type="submit"&gt;إرسال&lt;/button&gt;
    &lt;div id="form-status"&gt;&lt;/div&gt;
&lt;/form&gt;</code></pre>

<h2 id="practice">2) التحقق من البيانات في PHP / Server-side Validation</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 مهما تحقق الـ Front-End من البيانات (زي <code>required</code>)، متثقش فيه أبدًا — أي حد يقدر يبعت طلب مباشر للسيرفر من غير ما يمر بالفورم أصلًا. التحقق الحقيقي والوحيد اللي تقدر تعتمد عليه دايمًا في الـ Back-End.</div>
    <div class="en">🇬🇧 No matter how much the Front-End validates (like <code>required</code>), never trust it alone — anyone can send a request straight to the server, bypassing the form entirely. The real, reliable validation always lives in the Back-End.</div>
</div>

<pre><code>&lt;?php
function validateContact(array $data): array {
    $errors = [];

    $name = trim($data['name'] ?? '');
    $email = trim($data['email'] ?? '');
    $message = trim($data['message'] ?? '');

    if ($name === '') {
        $errors['name'] = 'الاسم مطلوب.';
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'الإيميل غير صحيح.';
    }
    if (strlen($message) < 10) {
        $errors['message'] = 'الرسالة قصيرة جدًا (10 أحرف على الأقل).';
    }

    return $errors;
}

// حالة 1: بيانات ناقصة
$test1 = validateContact(['name' => '', 'email' => 'not-an-email', 'message' => 'hi']);
print_r($test1);

// حالة 2: بيانات صحيحة
$test2 = validateContact(['name' => 'Waleed', 'email' => 'waleed@example.com', 'message' => 'Hello, I need help with my order.']);
var_dump(empty($test2));</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">Array
(
    [name] => الاسم مطلوب.
    [email] => الإيميل غير صحيح.
    [message] => الرسالة قصيرة جدًا (10 أحرف على الأقل).
)
bool(true)</div>

<div class="bi-block">
    <div class="ar">🇪🇬 <code>filter_var(..., FILTER_VALIDATE_EMAIL)</code> هي الطريقة الرسمية في PHP للتحقق من صيغة الإيميل — أدق بكتير من أي Regex هتكتبه بنفسك. لاحظ إن <code>$test2</code> كانت فاضية من الأخطاء (<code>empty()</code> رجعت <code>true</code>) لإن البيانات كلها كانت صحيحة.</div>
    <div class="en">🇬🇧 <code>filter_var(..., FILTER_VALIDATE_EMAIL)</code> is PHP's official way to validate an email format — far more reliable than any regex you'd write yourself. Notice <code>$test2</code> came back empty of errors (<code>empty()</code> returned <code>true</code>) because all the data was valid.</div>
</div>

<div class="bi-block">
    <div class="ar">🇪🇬 جرّب الدالة دي بنفسك — عدّل البيانات في <code>$test1</code> أو <code>$test2</code> وشغّلها شوف رسائل الخطأ بتتغير إزاي:</div>
    <div class="en">🇬🇧 Try this function yourself — edit the data in <code>$test1</code> or <code>$test2</code> and run it to see how the error messages change:</div>
</div>

<div class="mini-editor-wrap">
    <textarea spellcheck="false">&lt;?php
function validateContact(array $data): array {
    $errors = [];

    $name = trim($data['name'] ?? '');
    $email = trim($data['email'] ?? '');
    $message = trim($data['message'] ?? '');

    if ($name === '') {
        $errors['name'] = 'الاسم مطلوب.';
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'الإيميل غير صحيح.';
    }
    if (strlen($message) < 10) {
        $errors['message'] = 'الرسالة قصيرة جدًا (10 أحرف على الأقل).';
    }

    return $errors;
}

// حالة 1: بيانات ناقصة
$test1 = validateContact(['name' => '', 'email' => 'not-an-email', 'message' => 'hi']);
print_r($test1);

// حالة 2: بيانات صحيحة
$test2 = validateContact(['name' => 'Waleed', 'email' => 'waleed@example.com', 'message' => 'Hello, I need help with my order.']);
var_dump(empty($test2));</textarea>
    <div class="mini-toolbar">
        <button class="mini-run-btn">▶ شغّل / Run</button>
        <span class="mini-status"></span>
    </div>
    <div class="output-box">— لسه متشغلش / not run yet —</div>
</div>

<h2>3) endpoint الاستقبال (handle.php) / The Receiving Endpoint</h2>
<pre><code>&lt;?php
header('Content-Type: application/json');

$errors = validateContact($_POST);

if (!empty($errors)) {
    http_response_code(422);
    echo json_encode(['errors' => $errors]);
    exit;
}

$safeName = htmlspecialchars(trim($_POST['name']));
// هنا في مشروع حقيقي: تبعت إيميل، أو تخزن الرسالة في قاعدة بيانات.
echo json_encode(['message' => "شكرًا $safeName! هنرد عليك قريب."]);</code></pre>
<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ <code>htmlspecialchars()</code> حوالين اسم المستخدم قبل ما يترجع في الرسالة — حماية أساسية ضد XSS، حتى لو كان بيترجع في JSON مش HTML مباشر (دايمًا عادة كويسة).</div>
    <div class="en">🇬🇧 Notice <code>htmlspecialchars()</code> around the user's name before it's returned in the message — a basic XSS defense, even when returned as JSON rather than raw HTML (a good habit regardless).</div>
</div>

<div class="bi-block">
    <div class="ar">🇪🇬 <code>$_POST</code> مش متاح لما تشغّل الكود في المحرر المصغّر لوحده (مفيش فورم حقيقي بيبعته)، فالنسخة تحت بتحاكيه بمصفوفة PHP عادية اسمها <code>$fakePost</code> بدل ما تعتمد على طلب HTTP فعلي — جرّب تغيّر بياناتها وشغّلها:</div>
    <div class="en">🇬🇧 <code>$_POST</code> isn't available when running code in the standalone mini editor (there's no real form submitting it), so the version below simulates it with a plain PHP array called <code>$fakePost</code> instead of relying on a real HTTP request — try changing its data and running it:</div>
</div>

<div class="mini-editor-wrap">
    <textarea spellcheck="false">&lt;?php
function validateContact(array $data): array {
    $errors = [];
    $name = trim($data['name'] ?? '');
    $email = trim($data['email'] ?? '');
    $message = trim($data['message'] ?? '');
    if ($name === '') {
        $errors['name'] = 'الاسم مطلوب.';
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'الإيميل غير صحيح.';
    }
    if (strlen($message) < 10) {
        $errors['message'] = 'الرسالة قصيرة جدًا (10 أحرف على الأقل).';
    }
    return $errors;
}

function handleContact(array $fakePost): string {
    $errors = validateContact($fakePost);
    if (!empty($errors)) {
        return json_encode(['errors' => $errors], JSON_UNESCAPED_UNICODE);
    }
    $safeName = htmlspecialchars(trim($fakePost['name']));
    return json_encode(['message' => "شكرًا $safeName! هنرد عليك قريب."], JSON_UNESCAPED_UNICODE);
}

// محاكاة طلب POST حقيقي جاي من الفورم (بدل $_POST)
$fakePost = ['name' => 'Waleed', 'email' => 'waleed@example.com', 'message' => 'Hello, I need help with my order.'];
echo handleContact($fakePost) . "\n";

$badPost = ['name' => '', 'email' => 'bad-email', 'message' => 'hi'];
echo handleContact($badPost) . "\n";</textarea>
    <div class="mini-toolbar">
        <button class="mini-run-btn">▶ شغّل / Run</button>
        <span class="mini-status"></span>
    </div>
    <div class="output-box">— لسه متشغلش / not run yet —</div>
</div>

<h2>4) ربط الفورم بالسيرفر بـ JavaScript / Wiring the Form with JavaScript</h2>
<pre><code>document.getElementById('contact-form').addEventListener('submit', async (e) =&gt; {
    e.preventDefault();
    const form = e.target;
    const status = document.getElementById('form-status');

    const res = await fetch('handle.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: new URLSearchParams(new FormData(form)),
    });
    const data = await res.json();

    if (data.errors) {
        status.textContent = Object.values(data.errors).join(' / ');
    } else {
        status.textContent = data.message;
        form.reset();
    }
});</code></pre>
<div class="bi-block">
    <div class="ar">🇪🇬 <code>e.preventDefault()</code> بيمنع الفورم من عمل Reload كامل للصفحة، و<code>fetch</code> بيبعت البيانات في الخلفية ويستقبل رد JSON — ده أساس أي فورم حديث بيحس المستخدم إنه "سريع" من غيره.</div>
    <div class="en">🇬🇧 <code>e.preventDefault()</code> stops the form from fully reloading the page, and <code>fetch</code> sends the data in the background and receives a JSON reply — the foundation of any modern form that feels "fast" to the user.</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="backend">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">لو مستخدم بعت طلب مباشر لـ <code>handle.php</code> من غير ما يمر بالفورم أصلًا، مين هيوقفه لو البيانات غلط؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">If a user sends a request straight to <code>handle.php</code> bypassing the form, what stops bad data?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="required"> خاصية <code>required</code> في HTML</label>
        <label><input type="radio" name="q1" value="backend"> التحقق في PHP (Back-End)</label>
        <label><input type="radio" name="q1" value="nothing"> مفيش، هتترفض تلقائي</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="htmlspecialchars">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">أي دالة بتحمي من XSS لما ترجّع بيانات المستخدم في الرد؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Which function protects against XSS when echoing user data back?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="trim"> <code>trim()</code></label>
        <label><input type="radio" name="q2" value="htmlspecialchars"> <code>htmlspecialchars()</code></label>
        <label><input type="radio" name="q2" value="strlen"> <code>strlen()</code></label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ زوّد حقل وقاعدة تحقق جديدة / Add a Field and a New Validation Rule</h3>
    <div class="ar">🇪🇬 في المحرر المصغّر فوق، زوّد حقل جديد اسمه <code>phone</code> على <code>validateContact()</code>، وحط قاعدة تحقق: الرقم لازم يبدأ بـ <code>01</code> ويكون طوله 11 رقم بالظبط (استخدم <code>str_starts_with()</code> و<code>strlen()</code>). جرّبه برقم صح وبرقم غلط وشوف رسالة الخطأ بتظهر صح.</div>
    <div class="en">🇬🇧 In the mini editor above, add a new <code>phone</code> field to <code>validateContact()</code>, with a rule: the number must start with <code>01</code> and be exactly 11 digits long (use <code>str_starts_with()</code> and <code>strlen()</code>). Test it with a valid and an invalid number and confirm the right error message appears.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 كل تقنية استخدمتها هنا — Server-side Validation، <code>htmlspecialchars()</code> ضد XSS، وربط الفورم بـ <code>fetch</code> من غير Reload — هتستخدمها تاني بالظبط في مشروع <b>Online Store</b> الجاي، بس على نطاق أكبر: فورم تسجيل حساب، فورم تسجيل دخول، وفورم Checkout، كل واحد فيهم لازم نفس مستوى التحقق والحماية اللي اتعلمته هنا.</div>
    <div class="en">🇬🇧 Every technique you used here — server-side validation, <code>htmlspecialchars()</code> against XSS, and wiring a form with <code>fetch</code> without a reload — you'll reuse exactly in the upcoming <b>Online Store</b> project, just at a larger scale: a registration form, a login form, and a checkout form, each needing the same level of validation and protection you just learned.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>التحقق الحقيقي دايمًا في الـ Back-End، مهما كان الـ Front-End بيتحقق.</li>
        <li><code>filter_var(FILTER_VALIDATE_EMAIL)</code> للتحقق من الإيميل، و<code>htmlspecialchars()</code> لحماية أي output.</li>
        <li><code>fetch</code> + <code>e.preventDefault()</code> = فورم بيتواصل مع السيرفر من غير Reload كامل.</li>
    </ul>
</div>

<div class="exercise-box">
    <h3>✍️ تمرين عملي / Hands-on Exercise</h3>
    <div class="ar">🇪🇬 ابني المشروع كامل في XAMPP: صفحة <code>index.html</code> فيها الفورم منسّق بـ CSS، وملف <code>handle.php</code> بمنطق التحقق فوق. جرّب تبعت بيانات ناقصة وشوف رسالة الخطأ، وبعدين بيانات صحيحة وشوف رسالة النجاح — كل ده من غير ما الصفحة تعمل refresh.</div>
    <div class="en">🇬🇧 Build the full project in XAMPP: an <code>index.html</code> page with the form styled via CSS, and a <code>handle.php</code> file with the validation logic above. Try submitting incomplete data and see the error message, then valid data and see the success message — all without a page refresh.</div>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="../index.php">لوحة الدروس / Dashboard</a>
    <a href="online-store-project.php">المرحلة الجاية / Next: Online Store →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
