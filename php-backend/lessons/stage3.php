<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'stage3';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'المرحلة 3 — PHP كـ Backend حقيقي';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">المرحلة 3 / Stage 3</span>
<h1>PHP كـ Backend حقيقي <span class="ltr">Web Fundamentals</span></h1>
<p class="subtitle">هنا بنبدأ نتعامل مع PHP كسيرفر بيستقبل طلبات حقيقية: HTTP, Forms, Sessions, Cookies, رفع ملفات، وأهم حاجة — إزاي تحمي نفسك من أشهر ثغرتين ويب: XSS و CSRF.</p>

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
    <div class="ar">🇪🇬 تفهم دورة حياة طلب الويب (HTTP Request/Response) من وجهة نظر PHP، وتقدر تستقبل بيانات من المستخدم بأمان، وتحافظ على حالة (state) بين الطلبات باستخدام Sessions و Cookies.</div>
    <div class="en">🇬🇧 Understand the HTTP request/response lifecycle from PHP's perspective, safely receive user input, and maintain state across requests using Sessions and Cookies.</div>
</div>

<h2 id="understand">🧠 HTTP و الفورمات / HTTP &amp; Forms</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 لما المتصفح يبعت request للسيرفر، بيبقى فيه Method (زي <code>GET</code> أو <code>POST</code>)، و PHP بيحوّل البيانات اللي جاية معاه تلقائيًا لسوبر جلوبالز: <code>$_GET</code> للبيانات في الـ URL، و<code>$_POST</code> للبيانات المبعوتة من فورم بـ method="post". أي بيانات جاية من المستخدم لازم تتعامل معاها على إنها "غير موثوقة" لحد ما تتأكد منها.</div>
    <div class="en">🇬🇧 When the browser sends a request, it carries a Method (like <code>GET</code> or <code>POST</code>), and PHP automatically populates superglobals: <code>$_GET</code> for URL data, <code>$_POST</code> for form data sent with method="post". Any data coming from the user should be treated as "untrusted" until validated.</div>
</div>

<pre><code>&lt;?php
// contact.php — بيستقبل بيانات فورم بـ POST
$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');

if ($name === '' || $email === '') {
    echo "من فضلك املأ كل الحقول.";
} else {
    echo "شكرًا " . htmlspecialchars($name) . "! هنرد عليك على " . htmlspecialchars($email);
}</code></pre>
<h3>الناتج الفعلي (بافتراض إرسال name=Waleed &amp; email=w@test.com) / Actual output</h3>
<div class="output-box">شكرًا Waleed! هنرد عليك على w@test.com</div>

<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ <code>?? ''</code> — ده بيمنع خطأ "Undefined array key" لو الحقل مبعتش أصلاً. ولاحظ <code>htmlspecialchars()</code> حوالين أي قيمة جاية من المستخدم قبل ما تطبعها — ده أول خط دفاع ضد XSS، هنشرحه بالتفصيل تحت.</div>
    <div class="en">🇬🇧 Note <code>?? ''</code> — it prevents an "Undefined array key" error if the field wasn't sent at all. Also note <code>htmlspecialchars()</code> around any user-supplied value before echoing it — this is the first line of defense against XSS, explained in detail below.</div>
</div>

<div class="flow-diagram">
    <div class="flow-box">Browser sends Request<br><span class="ltr" style="font-size:0.8em">GET/POST + data</span></div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">PHP fills $_GET / $_POST</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">Your script processes it<br><span class="ltr" style="font-size:0.8em">validate, sanitize</span></div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">Response sent back<br><span class="ltr" style="font-size:0.8em">HTML or JSON</span></div>
</div>

<h2 id="practice">💻 جرّب استقبال فورم بنفسك / Try Receiving a Form Yourself</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 مفيش فورم حقيقي مبعوت هنا، فالكود تحت بيحاكي وصول البيانات بإنه يحط قيم في <code>$_POST</code> يدويًا زي ما لو فورم بعتها — بعد كده بيعالجها بنفس المنطق اللي شفته فوق بالظبط، وبيوضح إزاي <code>htmlspecialchars()</code> بيحميك لو حد حاول يبعت كود.</div>
    <div class="en">🇬🇧 No real form is submitted here — the code below simulates data arriving by setting <code>$_POST</code> values manually, exactly as a form would — then processes them with the same logic you saw above, and shows how <code>htmlspecialchars()</code> protects you if someone tries to inject code.</div>
</div>

<div class="mini-editor-wrap">
    <textarea spellcheck="false">&lt;?php
// عشان نجرب المفهوم من غير فورم حقيقي مبعوت، بنحاكي $_POST يدويًا هنا زي إنه جاي من فورم
$_POST['name'] = 'Waleed';
$_POST['email'] = 'w@test.com';

$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');

if ($name === '' || $email === '') {
    echo "من فضلك املأ كل الحقول.";
} else {
    echo "شكرًا " . htmlspecialchars($name) . "! هنرد عليك على " . htmlspecialchars($email) . PHP_EOL;
}

// جرب دلوقتي تبعت اسم فيه script tag وشوف إن htmlspecialchars بيحميك من XSS
$_POST['name'] = '&lt;script&gt;alert(1)&lt;/script&gt;';
echo "لو حاول حد يبعت: " . htmlspecialchars($_POST['name']) . PHP_EOL;</textarea>
    <div class="mini-toolbar">
        <button class="mini-run-btn">▶ شغّل / Run</button>
        <span class="mini-status"></span>
    </div>
    <div class="output-box">— لسه متشغلش / not run yet —</div>
</div>

<h2>Sessions و Cookies</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 الـ HTTP بطبيعته "Stateless" — كل request منفصل عن اللي قبله، السيرفر مش فاكر حاجة. عشان تحافظ على حالة (زي "المستخدم مسجل دخول")، بتستخدم <b>Session</b>: PHP بيخزن بيانات على السيرفر، وبيدي المتصفح "مفتاح" (session id) عن طريق Cookie عشان يرجع بيه في كل request. أما الـ <b>Cookie</b> العادية فهي بيانات بتتخزن في المتصفح نفسه وبترجع مع كل request لنفس الدومين.</div>
    <div class="en">🇬🇧 HTTP is inherently "stateless" — each request is independent, the server remembers nothing. To maintain state (like "user is logged in"), you use a <b>Session</b>: PHP stores data on the server and gives the browser a "key" (session id) via a Cookie to send back on each request. A plain <b>Cookie</b>, by contrast, is data stored in the browser itself and sent back with every request to the same domain.</div>
</div>

<pre><code>&lt;?php
session_start(); // لازم أول سطر قبل أي output

$_SESSION['visits'] = ($_SESSION['visits'] ?? 0) + 1;
echo "عدد زياراتك في الجلسة دي: " . $_SESSION['visits'];

// Cookie تعيش 7 أيام حتى لو المتصفح اتقفل
setcookie('last_visit', date('Y-m-d'), time() + 7 * 24 * 3600);
echo PHP_EOL . "آخر زيارة متسجلة (كوكي): " . ($_COOKIE['last_visit'] ?? 'مفيش لسه');</code></pre>
<h3>الناتج الفعلي (بعد 3 عمليات refresh) / Actual output</h3>
<div class="output-box">عدد زياراتك في الجلسة دي: 3
آخر زيارة متسجلة (كوكي): 2025-01-01</div>

<h2>رفع الملفات / File Upload</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 لما الفورم يبقى فيه <code>enctype="multipart/form-data"</code> وفيه <code>&lt;input type="file"&gt;</code>، PHP بيحط تفاصيل الملف في <code>$_FILES</code>. أهم حاجة هنا: متثقش أبدًا في اسم أو نوع الملف اللي المستخدم بعته — دايمًا تحقق من الامتداد والحجم، وسمّي الملف بنفسك بدل ما تستخدم اسمه الأصلي.</div>
    <div class="en">🇬🇧 When a form has <code>enctype="multipart/form-data"</code> and a <code>&lt;input type="file"&gt;</code>, PHP populates <code>$_FILES</code> with the file's details. Golden rule: never trust the uploaded file's name or claimed type — always validate extension and size, and generate your own filename instead of reusing the original.</div>
</div>

<pre><code>&lt;?php
$allowed = ['jpg', 'png', 'pdf'];
$ext = strtolower(pathinfo($_FILES['doc']['name'], PATHINFO_EXTENSION));

if (!in_array($ext, $allowed, true)) {
    echo "امتداد غير مسموح.";
} elseif ($_FILES['doc']['size'] > 2 * 1024 * 1024) {
    echo "الملف أكبر من 2 ميجا.";
} else {
    $safeName = uniqid('doc_', true) . '.' . $ext;
    move_uploaded_file($_FILES['doc']['tmp_name'], __DIR__ . '/uploads/' . $safeName);
    echo "تم الرفع باسم: " . $safeName;
}</code></pre>

<div class="security-box">
    <h3>⚠️ الأمان: XSS و CSRF</h3>
    <div class="ar">🇪🇬
        <p><b>XSS (Cross-Site Scripting):</b> لو طبعت مدخلات المستخدم زي ما هي من غير تنضيف، حد ممكن يبعت <code>&lt;script&gt;</code> في اسمه مثلاً، وييتنفذ في متصفح أي حد يشوف الصفحة. الحل: استخدم <code>htmlspecialchars()</code> مع أي قيمة جاية من المستخدم وقت الطباعة في HTML — من غير استثناءات.</p>
        <p><b>CSRF (Cross-Site Request Forgery):</b> موقع خبيث ممكن يخلي متصفحك يبعت request (زي "حوّل فلوس") لموقعك وانت مسجل دخول فيه، من غير ما تقصد. الحل: تولّد <b>CSRF Token</b> عشوائي وتحطه في كل فورم مخفي، وتتأكد إنه مطابق للي متخزن في الـ Session قبل ما تنفذ أي عملية بتغيّر حاجة.</p>
    </div>
    <div class="en">
        <p><b>XSS (Cross-Site Scripting):</b> If you echo user input as-is without sanitizing, someone could submit <code>&lt;script&gt;</code> as their "name", and it would execute in the browser of anyone viewing the page. Fix: always run <code>htmlspecialchars()</code> on user-supplied values before printing them into HTML — no exceptions.</p>
        <p><b>CSRF (Cross-Site Request Forgery):</b> A malicious site can trick your browser into sending a request (like "transfer money") to a site you're logged into, without your intent. Fix: generate a random <b>CSRF Token</b>, embed it as a hidden field in every form, and verify it matches the one stored in the Session before performing any state-changing action.</p>
    </div>
</div>

<pre><code>&lt;?php
session_start();
// وقت عرض الفورم
$_SESSION['csrf'] = $_SESSION['csrf'] ?? bin2hex(random_bytes(32));
$token = $_SESSION['csrf'];
// &lt;input type="hidden" name="csrf" value="&lt;?= $token ?&gt;"&gt;

// وقت استقبال الفورم
if (!hash_equals($_SESSION['csrf'], $_POST['csrf'] ?? '')) {
    die('طلب غير موثوق (CSRF check failed).');
}</code></pre>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="nullcoalesce">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">إيه اللي بيمنع خطأ "Undefined array key" لو حقل الفورم مبعتش أصلًا؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What prevents an "Undefined array key" error if a form field wasn't sent at all?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="nullcoalesce"> <code>$_POST['x'] ?? ''</code></label>
        <label><input type="radio" name="q1" value="trim"> <code>trim($_POST['x'])</code></label>
        <label><input type="radio" name="q1" value="htmlspecialchars"> <code>htmlspecialchars($_POST['x'])</code></label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="htmlspecialchars">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">عايز تطبع اسم مستخدم في HTML بأمان وتمنع XSS، تستخدم إيه؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">To safely print a username into HTML and prevent XSS, what do you use?</span></p>
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
    <h3>🛠️ Pagination بسيط من $_GET / Simple Pagination from $_GET</h3>
    <div class="ar">🇪🇬 اعمل سكريبت بياخد <code>$_GET['page']</code> (رقم صفحة)، يتحقق إنه رقم موجب (لو مش موجود أو غلط، استخدم 1 كـ default)، ويطبع "عرض الصفحة رقم X من مصفوفة مهام مكوّنة من 25 عنصر" مع حساب أول وآخر عنصر في الصفحة دي (بافتراض 5 عناصر لكل صفحة).</div>
    <div class="en">🇬🇧 Write a script that reads <code>$_GET['page']</code>, validates it's a positive number (default to 1 if missing or invalid), and prints "Showing page X of a 25-item task array" along with the first and last item index on that page (assuming 5 items per page).</div>
</div>

<div class="exercise-box">
    <h3>✍️ تمرين إضافي / Extra Exercise</h3>
    <div class="ar">🇪🇬 اعمل فورم HTML فيه حقل "تعليق"، وملف PHP يستقبله بـ <code>$_POST</code>، يطبعه بعد ما يعمله <code>htmlspecialchars()</code>، ويحفظ في <code>$_SESSION</code> عدد التعليقات اللي اتبعتت في الجلسة دي. جرب تبعت <code>&lt;script&gt;alert(1)&lt;/script&gt;</code> كتعليق وشوف إنه بيتطبع كنص عادي مش بيتنفذ.</div>
    <div class="en">🇬🇧 Build an HTML form with a "comment" field and a PHP file that receives it via <code>$_POST</code>, echoes it after running <code>htmlspecialchars()</code>, and keeps a count of comments submitted this session in <code>$_SESSION</code>. Try submitting <code>&lt;script&gt;alert(1)&lt;/script&gt;</code> as the comment and confirm it prints as plain text instead of executing.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 كل نقطة هنا بتظهر مباشرة في الـ Capstone: فورم تسجيل الدخول بيستقبل بيانات بـ <code>$_POST</code>، الجلسة بتحفظ إن المستخدم مسجل دخول، وأي مخرج للمتصفح لازم يمر بـ <code>htmlspecialchars()</code> وأي فورم لازم يحمل CSRF token — دي بالظبط بنود "الأمان" في متطلبات المشروع.</div>
    <div class="en">🇬🇧 Every point here surfaces directly in the Capstone: the login form receives data via <code>$_POST</code>, the session records that a user is logged in, and any browser output must pass through <code>htmlspecialchars()</code> while any form must carry a CSRF token — exactly the "security" requirements of the project.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li><code>$_GET</code> / <code>$_POST</code> = بيانات جاية من المستخدم، دايمًا غير موثوقة لحد ما تتأكد منها.</li>
        <li><code>$_SESSION</code> = حالة محفوظة على السيرفر، مربوطة بالمتصفح عن طريق كوكي الـ session id.</li>
        <li><code>$_COOKIE</code> = بيانات متخزنة في المتصفح نفسه.</li>
        <li><code>$_FILES</code> = تفاصيل أي ملف مرفوع — تحقق من الامتداد والحجم دايمًا، وسمّي الملف بنفسك.</li>
        <li>XSS تتحل بـ <code>htmlspecialchars()</code> على أي output، و CSRF تتحل بـ Token في السيشن.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="stage2.php">← المرحلة السابقة</a>
    <a href="stage4.php">المرحلة الجاية / Next: Databases →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
