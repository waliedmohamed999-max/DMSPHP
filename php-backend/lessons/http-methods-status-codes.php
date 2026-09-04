<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'http-methods-status-codes';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'HTTP Methods و Status Codes — HTTP Methods & Status Codes';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">Stage 4 · Web & HTTP</span>
<h1>HTTP Methods و Status Codes <span class="ltr">HTTP Methods &amp; Status Codes</span></h1>
<p class="subtitle">GET/POST/PUT/PATCH/DELETE، وأشهر أكواد الحالة (200, 301, 404, 500) ومعناها الحقيقي. <span class="ltr">GET/POST/PUT/PATCH/DELETE, and the most common status codes (200, 301, 404, 500) and what they really mean.</span></p>

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
    <div class="ar">🇪🇬 تفهم إن كل طلب HTTP بيحمل "نية" (Method) — عايز إيه بالظبط من السيرفر — وإن كل استجابة بترجع "حكم" (Status Code) على النتيجة. الاتنين دول جزء من نص الطلب/الاستجابة اللي شفته في الدرس اللي فات، وPHP بتقرأ الأول وتتحكم في التاني.</div>
    <div class="en">🇬🇧 Understand that every HTTP request carries an "intent" (a Method) — exactly what it wants from the server — and every response returns a "verdict" (a Status Code) on the outcome. Both are parts of the request/response text you saw in the previous lesson, and PHP reads the former and controls the latter.</div>
</div>

<h2 id="understand">🧠 HTTP Methods</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 الـ Method مش مجرد تسمية — هو اتفاق (Convention) بين كل الأنظمة على الويب عن "نوع العملية" اللي الطلب ده بيطلبها. الجدول تحت بيلخص أشهر 5 Methods واللي بتستخدمها له عادة.</div>
    <div class="en">🇬🇧 The Method isn't just a label — it's a convention every system on the web agrees on for "what kind of operation" a request is asking for. The table below summarizes the 5 most common methods and what they're typically used for.</div>
</div>

<div class="output-box" style="overflow-x:auto;padding:0;">
<table style="width:100%;border-collapse:collapse;">
<tr style="background:var(--panel-2);"><th style="padding:10px 14px;text-align:left;border:1px solid var(--border);">Method</th><th style="padding:10px 14px;text-align:left;border:1px solid var(--border);">Typical purpose</th></tr>
<tr><td style="padding:10px 14px;border:1px solid var(--border);"><b>GET</b></td><td style="padding:10px 14px;border:1px solid var(--border);">Read/fetch data, no side effects (e.g. <code>GET /products</code>) — data goes in the URL query string</td></tr>
<tr><td style="padding:10px 14px;border:1px solid var(--border);"><b>POST</b></td><td style="padding:10px 14px;border:1px solid var(--border);">Create a new resource, or submit data that changes state (e.g. <code>POST /login</code>) — data goes in the request body</td></tr>
<tr><td style="padding:10px 14px;border:1px solid var(--border);"><b>PUT</b></td><td style="padding:10px 14px;border:1px solid var(--border);">Replace an existing resource entirely (e.g. <code>PUT /products/5</code> with the full new object)</td></tr>
<tr><td style="padding:10px 14px;border:1px solid var(--border);"><b>PATCH</b></td><td style="padding:10px 14px;border:1px solid var(--border);">Partially update a resource — only the fields sent change (e.g. <code>PATCH /products/5</code> with just <code>{"price": 20}</code>)</td></tr>
<tr><td style="padding:10px 14px;border:1px solid var(--border);"><b>DELETE</b></td><td style="padding:10px 14px;border:1px solid var(--border);">Remove a resource (e.g. <code>DELETE /products/5</code>)</td></tr>
</table>
</div>

<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ الفرق بين PUT وPATCH — غلطة شائعة إن الناس تستخدمهم كـ مترادفين. PUT معناها "استبدل الكائن كله بده" (لو نسيت حقل، ممكن يتصفر)، PATCH معناها "عدّل بس الحقول اللي بعتها". في PHP، الـ Method بييجي في <code>$_SERVER['REQUEST_METHOD']</code> — وPHP مالهاش <code>$_PUT</code> أو <code>$_PATCH</code> جاهزين زي <code>$_POST</code>؛ لازم تقرأ الـ body يدويًا بـ <code>file_get_contents('php://input')</code>.</div>
    <div class="en">🇬🇧 Notice the difference between PUT and PATCH — a common mistake is treating them as synonyms. PUT means "replace the whole object with this" (forget a field, and it may get zeroed out); PATCH means "only change the fields I sent." In PHP, the method arrives in <code>$_SERVER['REQUEST_METHOD']</code> — and PHP has no ready-made <code>$_PUT</code> or <code>$_PATCH</code> like <code>$_POST</code>; you read the body manually with <code>file_get_contents('php://input')</code>.</div>
</div>

<h2 id="practice">💻 HTTP Status Codes</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 كود الحالة رقم من 3 خانات بيبقى أول حاجة في سطر الاستجابة (زي <code class="ltr">HTTP/1.1 404 Not Found</code>). أول رقم بيحدد الفئة العامة: 2xx نجاح، 3xx تحويل، 4xx خطأ من العميل، 5xx خطأ من السيرفر. الجدول تحت بيوضح أشهر الأكواد وسيناريو واقعي لكل واحد.</div>
    <div class="en">🇬🇧 The status code is a 3-digit number that leads the response line (e.g. <code class="ltr">HTTP/1.1 404 Not Found</code>). The first digit sets the general category: 2xx success, 3xx redirection, 4xx client error, 5xx server error. The table below shows the most common codes and a realistic scenario for each.</div>
</div>

<div class="output-box" style="overflow-x:auto;padding:0;">
<table style="width:100%;border-collapse:collapse;">
<tr style="background:var(--panel-2);"><th style="padding:10px 14px;text-align:left;border:1px solid var(--border);">Code</th><th style="padding:10px 14px;text-align:left;border:1px solid var(--border);">Meaning</th><th style="padding:10px 14px;text-align:left;border:1px solid var(--border);">Realistic scenario</th></tr>
<tr><td style="padding:10px 14px;border:1px solid var(--border);"><b>200</b> OK</td><td style="padding:10px 14px;border:1px solid var(--border);">Request succeeded</td><td style="padding:10px 14px;border:1px solid var(--border);"><code>GET /products/5</code> returns the product data</td></tr>
<tr><td style="padding:10px 14px;border:1px solid var(--border);"><b>201</b> Created</td><td style="padding:10px 14px;border:1px solid var(--border);">A new resource was created</td><td style="padding:10px 14px;border:1px solid var(--border);"><code>POST /products</code> succeeds and a new product row now exists</td></tr>
<tr><td style="padding:10px 14px;border:1px solid var(--border);"><b>301</b> Moved Permanently</td><td style="padding:10px 14px;border:1px solid var(--border);">Resource permanently moved to a new URL</td><td style="padding:10px 14px;border:1px solid var(--border);"><code>/old-blog</code> now always redirects to <code>/blog</code></td></tr>
<tr><td style="padding:10px 14px;border:1px solid var(--border);"><b>302</b> Found</td><td style="padding:10px 14px;border:1px solid var(--border);">Resource temporarily at a different URL</td><td style="padding:10px 14px;border:1px solid var(--border);">After login, redirect once to <code>/dashboard</code></td></tr>
<tr><td style="padding:10px 14px;border:1px solid var(--border);"><b>400</b> Bad Request</td><td style="padding:10px 14px;border:1px solid var(--border);">The request itself is malformed</td><td style="padding:10px 14px;border:1px solid var(--border);">Sending invalid JSON as the request body</td></tr>
<tr><td style="padding:10px 14px;border:1px solid var(--border);"><b>401</b> Unauthorized</td><td style="padding:10px 14px;border:1px solid var(--border);">Not authenticated (or bad credentials)</td><td style="padding:10px 14px;border:1px solid var(--border);"><code>POST /login</code> with the wrong password</td></tr>
<tr><td style="padding:10px 14px;border:1px solid var(--border);"><b>403</b> Forbidden</td><td style="padding:10px 14px;border:1px solid var(--border);">Authenticated, but not allowed to do this</td><td style="padding:10px 14px;border:1px solid var(--border);">A regular user hitting an admin-only endpoint</td></tr>
<tr><td style="padding:10px 14px;border:1px solid var(--border);"><b>404</b> Not Found</td><td style="padding:10px 14px;border:1px solid var(--border);">No resource at this URL</td><td style="padding:10px 14px;border:1px solid var(--border);"><code>GET /products/9999</code> for an id that doesn't exist</td></tr>
<tr><td style="padding:10px 14px;border:1px solid var(--border);"><b>422</b> Unprocessable Entity</td><td style="padding:10px 14px;border:1px solid var(--border);">Well-formed request, but validation failed</td><td style="padding:10px 14px;border:1px solid var(--border);"><code>POST /register</code> with an email missing "@"</td></tr>
<tr><td style="padding:10px 14px;border:1px solid var(--border);"><b>500</b> Internal Server Error</td><td style="padding:10px 14px;border:1px solid var(--border);">The server itself crashed/errored</td><td style="padding:10px 14px;border:1px solid var(--border);">An uncaught PHP exception while querying the database</td></tr>
</table>
</div>

<div class="bi-block">
    <div class="ar">🇪🇬 الفرق بين 400 و422 بالذات محيّر لبعض المطورين: 400 معناها الطلب نفسه "مكسور" (JSON غلط الصياغة مثلاً، السيرفر مقدرش حتى يفهمه)، أما 422 معناها الطلب "مفهوم تمامًا" لكن القيم جواه مخالفة لقواعد العمل (زي إيميل موجود قبل كده، أو حقل مطلوب فاضي). PHP بترسل كود الحالة بدالة واحدة: <code>http_response_code()</code>.</div>
    <div class="en">🇬🇧 The 400 vs 422 distinction trips up some developers: 400 means the request itself is "broken" (malformed JSON, for instance — the server can't even parse it), while 422 means the request is "perfectly understood" but the values inside violate business rules (like an email that already exists, or a required field left empty). PHP sends the status code with one function: <code>http_response_code()</code>.</div>
</div>

<pre><code>&lt;?php
$codes = [200, 201, 301, 302, 400, 401, 403, 404, 422, 500];
foreach ($codes as $c) {
    http_response_code($c);
    echo "Set to $c -&gt; http_response_code() now returns " . http_response_code() . PHP_EOL;
}

// The exact proof: set a 404 and read it right back
http_response_code(404);
echo "Final check: " . http_response_code() . PHP_EOL;</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">Set to 200 -> http_response_code() now returns 200
Set to 201 -> http_response_code() now returns 201
Set to 301 -> http_response_code() now returns 301
Set to 302 -> http_response_code() now returns 302
Set to 400 -> http_response_code() now returns 400
Set to 401 -> http_response_code() now returns 401
Set to 403 -> http_response_code() now returns 403
Set to 404 -> http_response_code() now returns 404
Set to 422 -> http_response_code() now returns 422
Set to 500 -> http_response_code() now returns 500
Final check: 404</div>

<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ إن ده تنفيذ حقيقي، مش مجرد توثيق — <code>http_response_code()</code> من غير قيمة بترجع الكود الحالي، فالكود ده بيثبت إن الاستدعاء فعلًا بيغيّر الحالة الداخلية وإن قراءتها ترجع بالظبط آخر قيمة اتحطت. تحت CLI مفيش استجابة HTTP حقيقية بتترسل لمتصفح، لكن دالة <code>http_response_code()</code> نفسها بتشتغل وترجع قيمة حقيقية من غير أي خطأ.</div>
    <div class="en">🇬🇧 Notice this is real execution, not just documentation — <code>http_response_code()</code> called with no argument returns the currently-set code, so this proves the call genuinely changes internal state and reading it back returns exactly the last value set. Under CLI, no real HTTP response is sent to a browser, but the <code>http_response_code()</code> function itself runs and returns a real value with no error.</div>
</div>

<div class="mini-editor-wrap">
    <textarea spellcheck="false">&lt;?php
function statusFor(string $scenario): int
{
    return match ($scenario) {
        'new product created' =&gt; 201,
        'wrong password' =&gt; 401,
        'not an admin' =&gt; 403,
        'product id not found' =&gt; 404,
        'email missing @' =&gt; 422,
        default =&gt; 200,
    };
}

$scenarios = ['new product created', 'wrong password', 'not an admin', 'product id not found', 'email missing @'];
foreach ($scenarios as $s) {
    $code = statusFor($s);
    http_response_code($code);
    echo "$s -&gt; " . http_response_code() . PHP_EOL;
}</textarea>
    <div class="mini-toolbar">
        <button class="mini-run-btn">▶ شغّل / Run</button>
        <span class="mini-status"></span>
    </div>
    <div class="output-box">— لسه متشغلش / not run yet —</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="patch">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">عايز تعدّل بس السعر في منتج موجود من غير ما تلمس باقي حقوله، أنهي Method الأنسب؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">To update only a product's price without touching its other fields, which method fits best?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="put"> PUT</label>
        <label><input type="radio" name="q1" value="patch"> PATCH</label>
        <label><input type="radio" name="q1" value="get"> GET</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="422">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">مستخدم بعت فورم تسجيل صحيح الصياغة، بس بريده الإلكتروني مسجّل قبل كده — أنهي كود حالة الأنسب؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">A user submits a well-formed registration form, but their email is already registered — which status code fits best?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="400"> 400 Bad Request</label>
        <label><input type="radio" name="q2" value="422"> 422 Unprocessable Entity</label>
        <label><input type="radio" name="q2" value="500"> 500 Internal Server Error</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="403">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">مستخدم عادي (مسجّل دخول فعلًا) بيحاول يوصل لصفحة إدارة مخصصة للـ Admin بس — أنهي كود؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">A regular, already-logged-in user tries to access an admin-only page — which code?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="401"> 401 Unauthorized</label>
        <label><input type="radio" name="q3" value="403"> 403 Forbidden</label>
        <label><input type="radio" name="q3" value="404"> 404 Not Found</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="returns">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">حسب الناتج الفعلي فوق، استدعاء <code>http_response_code()</code> من غير باراميتر بيعمل إيه؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Per the actual output above, what does calling <code>http_response_code()</code> with no argument do?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="returns"> بيرجع الكود الحالي المضبوط من آخر استدعاء بباراميتر</label>
        <label><input type="radio" name="q4" value="resets"> بيصفّر الكود دايمًا لـ 200</label>
        <label><input type="radio" name="q4" value="error"> بيرمي Error لإنه محتاج باراميتر إجباري</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ دالة statusFor() لتصنيف السيناريوهات / A statusFor() Scenario Classifier</h3>
    <div class="ar">🇪🇬 في <a href="../playground/index.php">محرر الكود</a> (أو المحرر المصغّر فوق): زوّد دالة <code>statusFor()</code> اللي فوق بسيناريوهين إضافيين — <code class="ltr">'server crashed'</code> يرجّع 500، و<code class="ltr">'moved to new url'</code> يرجّع 301 — وشغّلها واطبع النتائج بـ <code>http_response_code()</code> زي المثال.</div>
    <div class="en">🇬🇧 In the <a href="../playground/index.php">Playground</a> (or the mini editor above): extend the <code>statusFor()</code> function above with two more scenarios — <code class="ltr">'server crashed'</code> returning 500, and <code class="ltr">'moved to new url'</code> returning 301 — and run them, printing results with <code>http_response_code()</code> like the example.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 دلوقتي عارف الـ Method وكود الحالة — لكن دول مش كل حاجة في الاستجابة. السيرفر والمتصفح كمان لازم "يتفقوا" على شكل البيانات اللي جوه الـ Body — هل هي HTML؟ JSON؟ ملف؟ ده اللي الدرس الجاي هيشرحه عن طريق الـ Headers، وأهمها <code class="ltr">Content-Type</code>.</div>
    <div class="en">🇬🇧 You now know the Method and status code — but those aren't everything in a response. The server and browser also need to "agree" on the shape of the data inside the Body — is it HTML? JSON? A file? That's what the next lesson explains through Headers, most importantly <code class="ltr">Content-Type</code>.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>GET يقرأ، POST ينشئ/يعالج، PUT يستبدل بالكامل، PATCH يعدّل جزئيًا، DELETE يحذف.</li>
        <li>2xx نجاح، 3xx تحويل، 4xx خطأ من العميل، 5xx خطأ من السيرفر.</li>
        <li>400 = الطلب نفسه مكسور؛ 422 = الطلب مفهوم لكن قيمه مخالفة لقواعد العمل.</li>
        <li><code>http_response_code($code)</code> بتضبط كود الحالة، ونفس الدالة من غير باراميتر بترجع القيمة الحالية — تنفيذ حقيقي في PHP، مش مجرد توثيق.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="http-request-response.php">← الدرس السابق / Prev: HTTP Request &amp; Response</a>
    <a href="headers-content-type.php">الدرس الجاي / Next: Headers &amp; Content-Type →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
