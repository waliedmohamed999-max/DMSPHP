<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'json-login-example';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'مثال متكامل: POST /login بـ JSON — A Complete Example: POST /login with JSON';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">Stage 4 · Web & HTTP</span>
<h1>مثال متكامل: POST /login بـ JSON <span class="ltr">A Complete Example: POST /login with JSON</span></h1>
<p class="subtitle">من الطلب لحد الاستجابة — كل جزء من مثال تسجيل الدخول الكامل بـ JSON مشروح. <span class="ltr">From request to response — every part of a complete JSON login example explained.</span></p>

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
    <div class="ar">🇪🇬 تجمع كل حاجة اتعلمتها في المرحلة دي (الرحلة الكاملة، Method، Status Code، Content-Type) في مثال واحد واقعي بالكامل: <code class="ltr">POST /login</code> ببيانات JSON، ومنطق تحقق حقيقي بـ <code>password_verify()</code> ضد مستخدم حقيقي في الـ Sandbox، مش مجرد <code class="ltr">if ($email === 'admin')</code> تجريبي.</div>
    <div class="en">🇬🇧 Bring together everything you learned in this stage (the full journey, Method, Status Code, Content-Type) into one fully realistic example: <code class="ltr">POST /login</code> with a JSON body, and real verification logic with <code>password_verify()</code> against a real user in the Sandbox — not a toy <code class="ltr">if ($email === 'admin')</code>.</div>
</div>

<h2 id="understand">🧠 من الطلب الخام لحد نداء PHP / From the Raw Request to a PHP Call</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 لما فورم تسجيل دخول حديث (زي React أو JavaScript خام) يبعت بيانات، غالبًا مش بيستخدم <code class="ltr">$_POST</code> العادي — بيبني جسم الطلب بنفسه كـ JSON خام ويحط <code class="ltr">Content-Type: application/json</code>. الشكل ده أهم في الـ APIs اللي بتتفاهم مع تطبيقات موبايل أو Frontend منفصل تمامًا عن PHP.</div>
    <div class="en">🇬🇧 When a modern login form (React or plain JavaScript) sends data, it usually doesn't use plain <code class="ltr">$_POST</code> — it builds the request body itself as raw JSON and sets <code class="ltr">Content-Type: application/json</code>. This shape matters most for APIs talking to a mobile app or a frontend that's fully decoupled from PHP.</div>
</div>

<h3>نص الطلب الحقيقي كما يُرسل فعليًا / The real request text, exactly as sent on the wire</h3>
<pre><code>POST /login HTTP/1.1
Host: example.com
Content-Type: application/json
Content-Length: 46

{"email":"user@example.com","password":"secret"}
</code></pre>

<h3>نص الاستجابة الناجحة / A successful response</h3>
<pre><code>HTTP/1.1 200 OK
Content-Type: application/json
Content-Length: 15

{"success":true}
</code></pre>

<h3>نص الاستجابة الفاشلة / A failed response</h3>
<pre><code>HTTP/1.1 401 Unauthorized
Content-Type: application/json
Content-Length: 53

{"success":false,"error":"Invalid email or password"}
</code></pre>

<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ إن الاستجابة الفاشلة رجّعت <code class="ltr">401 Unauthorized</code>، مش <code class="ltr">200 OK</code> مع <code class="ltr">"success": false</code> جوه الـ Body بس. ده مهم — Status Code غلط (زي 200 لطلب فشل فعليًا) بيخلي أي كود عميل بيفحص الـ status الأول (زي <code class="ltr">if (response.ok)</code> في JavaScript) يفتكر إن الطلب نجح، حتى لو الـ Body بيقول العكس.</div>
    <div class="en">🇬🇧 Notice the failed response returned <code class="ltr">401 Unauthorized</code>, not <code class="ltr">200 OK</code> with just <code class="ltr">"success": false</code> in the body. This matters — a wrong status code (like 200 for a genuinely failed request) tricks any client code that checks status first (like <code class="ltr">if (response.ok)</code> in JavaScript) into thinking the request succeeded, even though the body says otherwise.</div>
</div>

<h2 id="practice">💻 المنطق الحقيقي: handleLogin() ضد مستخدم فعلي / The Real Logic: handleLogin() Against a Real User</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 في طلب حقيقي، PHP بتقرأ الـ Body الخام بـ <code class="ltr">json_decode(file_get_contents('php://input'), true)</code> عشان تحوّل نص الـ JSON لمصفوفة PHP. تحت CLI معندناش طلب حقيقي وصل، فهنحاكي المصفوفة دي يدويًا (موضّح بوضوح تحت) — لكن كل حاجة بعد كده حقيقية 100%: بنجيب مستخدمة اسمها Sara من نفس Sandbox قاعدة البيانات اللي بتستخدمها دروس تانية في المسار، نديها باسورد حقيقي بـ <code>password_hash()</code>، وبعدين نتحقق منه بـ <code>password_verify()</code> فعليًا — مرة بباسورد صح ومرة بباسورد غلط.</div>
    <div class="en">🇬🇧 In a real request, PHP reads the raw body with <code class="ltr">json_decode(file_get_contents('php://input'), true)</code> to turn the JSON text into a PHP array. Under CLI we have no real incoming request, so we simulate that array manually (clearly labeled below) — but everything after that is 100% real: we fetch a user named Sara from the same Sandbox database other lessons in this track use, give her a real password with <code>password_hash()</code>, then genuinely verify it with <code>password_verify()</code> — once with the correct password, once with a wrong one.</div>
</div>

<pre><code>&lt;?php
require __DIR__ . '/../db-sandbox/schema.php';
$pdo = build_sandbox_pdo();
$pdo-&gt;exec('ALTER TABLE users ADD COLUMN password TEXT');
$pdo-&gt;exec("UPDATE users SET password = '" . password_hash('S3cur3P@ss', PASSWORD_DEFAULT) . "' WHERE email = 'sara@example.com'");

function handleLogin(PDO $pdo, array $body): array
{
    $email = $body['email'] ?? '';
    $password = $body['password'] ?? '';

    $stmt = $pdo-&gt;prepare('SELECT id, name, password FROM users WHERE email = ?');
    $stmt-&gt;execute([$email]);
    $user = $stmt-&gt;fetch(PDO::FETCH_ASSOC);

    if (!$user || $user['password'] === null || !password_verify($password, $user['password'])) {
        return ['success' =&gt; false, 'error' =&gt; 'Invalid email or password'];
    }

    return ['success' =&gt; true];
}

// Simulated parsed request bodies — in a real request this would come from
// json_decode(file_get_contents('php://input'), true)
$bodyCorrect = ['email' =&gt; 'sara@example.com', 'password' =&gt; 'S3cur3P@ss'];
$bodyWrong   = ['email' =&gt; 'sara@example.com', 'password' =&gt; 'wrong-password'];

echo "POST /login" . PHP_EOL;
echo "Request body: " . json_encode($bodyCorrect) . PHP_EOL;
$result1 = handleLogin($pdo, $bodyCorrect);
http_response_code($result1['success'] ? 200 : 401);
echo "Response status: " . http_response_code() . PHP_EOL;
echo "Response body: " . json_encode($result1) . PHP_EOL;

echo PHP_EOL;

echo "POST /login" . PHP_EOL;
echo "Request body: " . json_encode($bodyWrong) . PHP_EOL;
$result2 = handleLogin($pdo, $bodyWrong);
http_response_code($result2['success'] ? 200 : 401);
echo "Response status: " . http_response_code() . PHP_EOL;
echo "Response body: " . json_encode($result2) . PHP_EOL;</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">POST /login
Request body: {"email":"sara@example.com","password":"S3cur3P@ss"}
Response status: 200
Response body: {"success":true}

POST /login
Request body: {"email":"sara@example.com","password":"wrong-password"}
Response status: 401
Response body: {"success":false,"error":"Invalid email or password"}</div>

<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ إن <code>handleLogin()</code> نفسها معندهاش أي علاقة بـ HTTP — مالهاش <code>header()</code> ولا <code>http_response_code()</code> جواها، هي بس بترجع مصفوفة PHP عادية <code class="ltr">['success' =&gt; ..., ...]</code>. اللي بيحوّل النتيجة دي لاستجابة HTTP فعلية (الكود، والـ JSON، والـ Header لو ضفناه) هو الكود اللي بينادي عليها، مش الدالة نفسها. الفصل ده مهم جدًا: نفس <code>handleLogin()</code> ممكن تتنادى من كود ويب حقيقي، أو من اختبار (Unit Test) من غير أي HTTP خالص — لإنها منطق عمل نضيف من غير تفاصيل بروتوكول.</div>
    <div class="en">🇬🇧 Notice <code>handleLogin()</code> itself has nothing to do with HTTP — no <code>header()</code>, no <code>http_response_code()</code> inside it, just a plain PHP array returned <code class="ltr">['success' =&gt; ..., ...]</code>. What turns that result into an actual HTTP response (the code, the JSON, the header if we add one) is the calling code, not the function itself. This separation matters: the same <code>handleLogin()</code> can be called from real web-facing code, or from a unit test with no HTTP involved at all — because it's clean business logic with no protocol details baked in.</div>
</div>

<div class="mini-editor-wrap">
    <textarea spellcheck="false">&lt;?php
require __DIR__ . '/../db-sandbox/schema.php';
$pdo = build_sandbox_pdo();
$pdo-&gt;exec('ALTER TABLE users ADD COLUMN password TEXT');
$pdo-&gt;exec("UPDATE users SET password = '" . password_hash('S3cur3P@ss', PASSWORD_DEFAULT) . "' WHERE email = 'sara@example.com'");

function handleLogin(PDO $pdo, array $body): array
{
    $email = $body['email'] ?? '';
    $password = $body['password'] ?? '';
    $stmt = $pdo-&gt;prepare('SELECT id, name, password FROM users WHERE email = ?');
    $stmt-&gt;execute([$email]);
    $user = $stmt-&gt;fetch(PDO::FETCH_ASSOC);
    if (!$user || $user['password'] === null || !password_verify($password, $user['password'])) {
        return ['success' =&gt; false, 'error' =&gt; 'Invalid email or password'];
    }
    return ['success' =&gt; true];
}

// Try a wrong email instead of a wrong password, or an email that doesn't exist at all
$body = ['email' =&gt; 'nobody@example.com', 'password' =&gt; 'S3cur3P@ss'];

$result = handleLogin($pdo, $body);
http_response_code($result['success'] ? 200 : 401);
echo "Status: " . http_response_code() . PHP_EOL;
echo "Body: " . json_encode($result) . PHP_EOL;</textarea>
    <div class="mini-toolbar">
        <button class="mini-run-btn">▶ شغّل / Run</button>
        <span class="mini-status"></span>
    </div>
    <div class="output-box">— لسه متشغلش / not run yet —</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="input">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">في طلب حقيقي بـ Content-Type: application/json، PHP بتقرأ جسم الطلب (Body) بإيه؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">In a real request with Content-Type: application/json, how does PHP read the request body?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="input"> json_decode(file_get_contents('php://input'), true)</label>
        <label><input type="radio" name="q1" value="post"> $_POST['body'] مباشرة</label>
        <label><input type="radio" name="q1" value="get"> $_GET['json']</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="401">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">حسب الناتج الفعلي فوق، محاولة الدخول بباسورد غلط رجّعت أنهي Status Code؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Per the actual output above, what status code did the wrong-password attempt return?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="200"> 200 دايمًا، بغض النظر عن النتيجة</label>
        <label><input type="radio" name="q2" value="401"> 401 — لإن الدخول فشل فعليًا</label>
        <label><input type="radio" name="q2" value="500"> 500 لإن password_verify() بترمي خطأ</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="nohttp">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">إيه الصح بخصوص دالة <code>handleLogin()</code> نفسها في المثال؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What's true about the <code>handleLogin()</code> function itself in the example?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="nohttp"> مالهاش أي علاقة بـ HTTP — بترجع مصفوفة PHP عادية بس، والكود المنادي هو اللي بيحوّلها لاستجابة</label>
        <label><input type="radio" name="q3" value="header"> بتستدعي header() بنفسها جواها</label>
        <label><input type="radio" name="q3" value="statuscode"> بترجع http_response_code() مباشرة بدل مصفوفة</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="verify">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">إيه اللي فعليًا بيتحقق من صحة الباسورد في <code>handleLogin()</code>؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What actually verifies the password's correctness in <code>handleLogin()</code>?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="compare"> مقارنة نصية مباشرة زي $password === $user['password']</label>
        <label><input type="radio" name="q4" value="verify"> password_verify($password, $user['password']) ضد الـ Hash المخزّن</label>
        <label><input type="radio" name="q4" value="length"> طول الباسورد بس</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ زوّد سبب فشل أوضح / Add a Clearer Failure Reason</h3>
    <div class="ar">🇪🇬 في <a href="../playground/index.php">محرر الكود</a> (أو المحرر المصغّر فوق): عدّل <code>handleLogin()</code> عشان تفرّق بين "الإيميل مش موجود أصلًا" و"الإيميل موجود بس الباسورد غلط" — من غير ما تكشف للمستخدم أي واحدة فيهم في رسالة الخطأ النهائية (سبب أمني: عشان محدش يقدر "يجرّب" إيميلات موجودة). بدل كده، سجّل الفرق داخليًا بس (زي متغير <code class="ltr">$reason</code> منفصل) واطبعه في echo إضافي للتوضيح فقط.</div>
    <div class="en">🇬🇧 In the <a href="../playground/index.php">Playground</a> (or the mini editor above): modify <code>handleLogin()</code> to distinguish "email doesn't exist at all" from "email exists but password is wrong" — without exposing which one to the user in the final error message (a security reason: so no one can "probe" which emails exist). Instead, track the distinction only internally (e.g. a separate <code class="ltr">$reason</code> variable) and print it via an extra echo purely for your own inspection.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 كده خلّصت مرحلة الويب و HTTP كاملة — من فهم الرحلة، للـ Methods وأكواد الحالة، للـ Headers، ولحد مثال JSON متكامل بمنطق تحقق حقيقي. المسار بيكمل بعد كده لـ <a href="forms-registration-login.php">بناء فورم تسجيل ودخول حقيقي</a> — المرة دي بفورم HTML فعلي بيبعت بـ <code class="ltr">$_POST</code> التقليدي بدل JSON، عشان تشوف الاتنين وتقدر تختار المناسب حسب المشروع.</div>
    <div class="en">🇬🇧 That completes the full Web &amp; HTTP stage — from understanding the journey, through methods and status codes, headers, and a complete JSON example with real verification logic. The track continues into <a href="forms-registration-login.php">Building a Real Registration &amp; Login Form</a> — this time with an actual HTML form sending traditional <code class="ltr">$_POST</code> instead of JSON, so you see both and can pick whichever fits your project.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>طلب JSON حقيقي: <code class="ltr">POST /login</code> + <code class="ltr">Content-Type: application/json</code> + جسم <code class="ltr">{"email":...,"password":...}</code>.</li>
        <li>الاستجابة الناجحة والفاشلة لازم يبقى ليهم Status Code مختلف (200 مقابل 401)، مش بس <code class="ltr">success: false</code> جوه الـ Body.</li>
        <li><code>handleLogin()</code> منطق عمل نضيف، مالوش علاقة بـ HTTP نفسه — الكود المنادي هو اللي بيحوّل نتيجتها لاستجابة فعلية.</li>
        <li>التحقق الحقيقي بـ <code>password_verify()</code> ضد باسورد Hash مخزّن، مش مقارنة نصية مباشرة أبدًا.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="headers-content-type.php">← الدرس السابق / Prev: Headers &amp; Content-Type</a>
    <a href="forms-registration-login.php">الدرس الجاي / Next: Building a Real Registration &amp; Login Form →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
