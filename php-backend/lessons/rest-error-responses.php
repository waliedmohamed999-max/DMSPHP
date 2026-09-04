<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'rest-error-responses';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'استجابات الأخطاء في APIs — API Error Responses';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">Stage 13 · REST API Development</span>
<h1>استجابات الأخطاء في APIs <span class="ltr">API Error Responses</span></h1>
<p class="subtitle">شكل موحّد لأي خطأ (404, 422, 500)، بدل رسائل مختلفة كل مرة. <span class="ltr">A consistent shape for every error (404, 422, 500), instead of a different message every time.</span></p>

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
    <div class="ar">🇪🇬 لو كل Endpoint في الـ API بيرجّع شكل خطأ مختلف (مرة نص، مرة مصفوفة، مرة مفاتيح مختلفة)، أي عميل هيحتاج كود خاص لكل حالة — ده كابوس صيانة. الحل: شكل واحد ثابت لأي خطأ، بغض النظر عن نوعه، زي <code>{"error": {"code": "NOT_FOUND", "message": "..."}}</code>. الدرس ده بيثبّت الشكل ده وينفذه فعليًا لحالتين حقيقيتين: 404 (منتج مش موجود) و422 (بيانات ناقصة).</div>
    <div class="en">🇬🇧 If every endpoint in an API returns a different error shape (sometimes a string, sometimes an array, sometimes different keys), any client needs special-case code for each situation — a maintenance nightmare. The fix: one fixed shape for every error, regardless of its kind, like <code>{"error": {"code": "NOT_FOUND", "message": "..."}}</code>. This lesson locks in that shape and actually runs it for two real cases: 404 (product not found) and 422 (missing data).</div>
</div>

<h2 id="understand">🧠 1) الشكل الموحّد / The Consistent Shape</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 كل خطأ بيرجع جوه مفتاح <code>error</code> واحد، وجواه دايمًا <code>code</code> (نص ثابت للبرنامج يفحصه، مش للعرض) و<code>message</code> (نص مفهوم للبشر). ده معناه إن الفرونت-إند يقدر يكتب دالة واحدة تتعامل مع أي خطأ، بدل ما تفحص شكل الرد كل مرة.</div>
    <div class="en">🇬🇧 Every error returns under a single <code>error</code> key, always containing a <code>code</code> (a stable string for programs to check, not for display) and a <code>message</code> (human-readable text). This means a frontend can write one function to handle any error, instead of inspecting the response shape every time.</div>
</div>

<pre><code>&lt;?php
function errorResponse(string $code, string $message): array
{
    return ['error' =&gt; ['code' =&gt; $code, 'message' =&gt; $message]];
}</code></pre>

<h2 id="practice">💻 2) حالة 404 — منتج مش موجود / Case 404 — Product Not Found</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 الطلب الحقيقي:</div>
    <div class="en">🇬🇧 The real request:</div>
</div>
<pre><code>GET /api/products/999 HTTP/1.1
Accept: application/json</code></pre>
<pre><code>&lt;?php
function handleGetProduct(PDO $pdo, int $id): array
{
    $stmt = $pdo-&gt;prepare('SELECT id, name, price, stock FROM products WHERE id = ?');
    $stmt-&gt;execute([$id]);
    $row = $stmt-&gt;fetch(PDO::FETCH_ASSOC);
    if (!$row) {
        return errorResponse('NOT_FOUND', 'Product not found.');
    }
    return ['data' =&gt; $row];
}

http_response_code(404); // what a real server would send alongside this body
echo json_encode(handleGetProduct($pdo, 999), JSON_PRETTY_PRINT);</code></pre>
<h4>الناتج الفعلي / Actual output</h4>
<div class="output-box">{
    "error": {
        "code": "NOT_FOUND",
        "message": "Product not found."
    }
}</div>

<h2>3) حالة 422 — حقل ناقص / Case 422 — Missing Required Field</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 الطلب الحقيقي (جسم POST من غير <code>name</code>):</div>
    <div class="en">🇬🇧 The real request (a POST body missing <code>name</code>):</div>
</div>
<pre><code>POST /api/products HTTP/1.1
Content-Type: application/json

{
    "price": 9.99
}</code></pre>
<pre><code>&lt;?php
function handleCreateProduct(PDO $pdo, array $body): array
{
    if (empty($body['name'])) {
        return errorResponse('VALIDATION_ERROR', 'The "name" field is required.');
    }
    $stmt = $pdo-&gt;prepare('INSERT INTO products (name, price, stock, created_at) VALUES (?, ?, ?, ?)');
    $stmt-&gt;execute([$body['name'], $body['price'] ?? 0, $body['stock'] ?? 0, date('Y-m-d')]);
    $newId = (int) $pdo-&gt;lastInsertId();
    return handleGetProduct($pdo, $newId);
}

http_response_code(422);
// simulating json_decode(file_get_contents('php://input'), true) with a missing "name"
echo json_encode(handleCreateProduct($pdo, ['price' =&gt; 9.99]), JSON_PRETTY_PRINT);</code></pre>
<h4>الناتج الفعلي / Actual output</h4>
<div class="output-box">{
    "error": {
        "code": "VALIDATION_ERROR",
        "message": "The \"name\" field is required."
    }
}</div>

<div class="bi-block">
    <div class="ar">🇪🇬 للمقارنة، ده نفس الـ Handler على حالة نجاح — لاحظ إن مفتاح <code>data</code> هو اللي بيتغيّر، مش شكل الـ JSON كله:</div>
    <div class="en">🇬🇧 For contrast, here's the same handler on a success case — notice only the <code>data</code> key changes, not the overall JSON shape:</div>
</div>
<pre><code>echo json_encode(handleGetProduct($pdo, 1), JSON_PRETTY_PRINT);</code></pre>
<h4>الناتج الفعلي / Actual output</h4>
<div class="output-box">{
    "data": {
        "id": 1,
        "name": "Wireless Mouse",
        "price": 12.99,
        "stock": 50
    }
}</div>

<h2>4) مقابل: الأسلوب العشوائي (متجنّبه) / Contrast: The Ad-Hoc Approach (avoid this)</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 عشان الفرق يبقى واضح، ده نفس المنطق لكن بشكل خطأ مختلف كل مرة — نفس المشكلة اللي بتحصل لما فريق مختلف يكتب كل Endpoint من غير معيار موحّد:</div>
    <div class="en">🇬🇧 To make the contrast concrete, here's the same logic but with a different error shape each time — the exact problem that happens when a different endpoint is written without a shared standard:</div>
</div>
<pre><code>&lt;?php
function badHandleGetProduct(PDO $pdo, int $id)
{
    $stmt = $pdo-&gt;prepare('SELECT id, name FROM products WHERE id = ?');
    $stmt-&gt;execute([$id]);
    $row = $stmt-&gt;fetch(PDO::FETCH_ASSOC);
    if (!$row) {
        return 'Error: no product with that id'; // just a string!
    }
    return $row;
}

function badHandleCreateProduct(array $body)
{
    if (empty($body['name'])) {
        return ['ok' =&gt; false, 'msg' =&gt; 'name missing']; // different shape entirely!
    }
    return ['ok' =&gt; true];
}

var_export(badHandleGetProduct($pdo, 999));
echo PHP_EOL;
var_export(badHandleCreateProduct(['price' =&gt; 9.99]));</code></pre>
<h4>الناتج الفعلي / Actual output</h4>
<div class="output-box">'Error: no product with that id'
array (
  'ok' => false,
  'msg' => 'name missing',
)</div>
<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ الفرق: الأول رجع نص عادي، والتاني رجع مصفوفة بمفاتيح <code>ok</code>/<code>msg</code> مختلفة تمامًا عن <code>error.code</code>/<code>error.message</code>. أي كود فرونت-إند هيحتاج <code>if</code> منفصل لكل واحد فيهم — بينما بالشكل الموحّد، دالة واحدة زي <code>if (isset(data.error))</code> بتكفي لكل الحالات.</div>
    <div class="en">🇬🇧 Notice the difference: the first returned a plain string, the second an array with <code>ok</code>/<code>msg</code> keys entirely different from <code>error.code</code>/<code>error.message</code>. Frontend code would need a separate <code>if</code> for each — whereas with the consistent shape, one check like <code>if (isset(data.error))</code> covers every case.</div>
</div>

<div class="bi-block">
    <div class="ar">🇪🇬 جرّب بنفسك تحت — غيّر الـ id أو الـ body وشوف شكل الخطأ بيفضل ثابت.</div>
    <div class="en">🇬🇧 Try it yourself below — change the id or the body and see the error shape stay consistent.</div>
</div>

<div class="mini-editor-wrap">
    <textarea spellcheck="false">&lt;?php
$pdo = new PDO('sqlite::memory:');
$pdo-&gt;setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo-&gt;exec('CREATE TABLE products (id INTEGER PRIMARY KEY AUTOINCREMENT, name TEXT NOT NULL, price REAL NOT NULL, stock INTEGER NOT NULL DEFAULT 0, created_at TEXT NOT NULL)');
$pdo-&gt;exec("INSERT INTO products (name, price, stock, created_at) VALUES ('Wireless Mouse', 12.99, 50, '2024-04-01')");

function errorResponse(string $code, string $message): array
{
    return ['error' =&gt; ['code' =&gt; $code, 'message' =&gt; $message]];
}

function handleGetProduct(PDO $pdo, int $id): array
{
    $stmt = $pdo-&gt;prepare('SELECT id, name, price, stock FROM products WHERE id = ?');
    $stmt-&gt;execute([$id]);
    $row = $stmt-&gt;fetch(PDO::FETCH_ASSOC);
    if (!$row) {
        return errorResponse('NOT_FOUND', 'Product not found.');
    }
    return ['data' =&gt; $row];
}

// Try id 1 (found) vs id 999 (not found):
echo json_encode(handleGetProduct($pdo, 999), JSON_PRETTY_PRINT) . PHP_EOL;</textarea>
    <div class="mini-toolbar">
        <button class="mini-run-btn">▶ شغّل / Run</button>
        <span class="mini-status"></span>
    </div>
    <div class="output-box">— لسه متشغلش / not run yet —</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="error">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">في الشكل الموحّد، كل خطأ بيتحط جوه أنهي مفتاح؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">In the consistent shape, every error is nested under which key?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="error"> <code>error</code></label>
        <label><input type="radio" name="q1" value="data"> <code>data</code></label>
        <label><input type="radio" name="q1" value="msg"> <code>msg</code></label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="422">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">POST من غير حقل <code>name</code> المطلوب — أنهي Status Code؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">A POST missing the required <code>name</code> field — which status code?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="404"> 404 Not Found</label>
        <label><input type="radio" name="q2" value="422"> 422 Unprocessable Entity</label>
        <label><input type="radio" name="q2" value="500"> 500 Internal Server Error</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="program">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question"><code>error.code</code> (زي <code>NOT_FOUND</code>) الغرض منه إيه بالتحديد؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What is <code>error.code</code> (like <code>NOT_FOUND</code>) specifically for?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="display"> يتعرض للمستخدم النهائي مباشرة</label>
        <label><input type="radio" name="q3" value="program"> نص ثابت يفحصه الكود (الفرونت-إند) برمجيًا، مش للعرض المباشر</label>
        <label><input type="radio" name="q3" value="log"> بس لأغراض الـ logging الداخلي</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="inconsistent">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">مشكلة <code>badHandleGetProduct</code> و<code>badHandleCreateProduct</code> فوق كانت إيه بالظبط؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What exactly was the problem with <code>badHandleGetProduct</code> and <code>badHandleCreateProduct</code> above?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="slow"> الكود بطيء</label>
        <label><input type="radio" name="q4" value="inconsistent"> كل واحدة رجّعت شكل خطأ مختلف تمامًا (نص، ثم مصفوفة بمفاتيح مختلفة)</label>
        <label><input type="radio" name="q4" value="syntax"> فيه خطأ Syntax في الكود</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ أضف تحقق من السعر / Add Price Validation</h3>
    <div class="ar">🇪🇬 في <a href="../playground/index.php">محرر الكود</a> (أو المحرر المصغّر فوق): زوّد <code>handleCreateProduct</code> بشرط تاني — لو <code>$body['price']</code> مش موجود أو أقل من أو يساوي صفر، رجّع <code>errorResponse('VALIDATION_ERROR', 'Price must be greater than zero.')</code> بدل ما تكمل الـ INSERT. جرّبها بـ <code>['name' =&gt; 'Test', 'price' =&gt; -5]</code>.</div>
    <div class="en">🇬🇧 In the <a href="../playground/index.php">Playground</a> (or the mini editor above): add a second check to <code>handleCreateProduct</code> — if <code>$body['price']</code> is missing or less than or equal to zero, return <code>errorResponse('VALIDATION_ERROR', 'Price must be greater than zero.')</code> instead of proceeding with the INSERT. Test it with <code>['name' =&gt; 'Test', 'price' =&gt; -5]</code>.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 الـ API دلوقتي بيرجّع بيانات وأخطاء بشكل موحّد وموثوق. آخر حاجة ناقصة: مين اللي مسموحله يستخدم الـ API أصلًا؟ الدرس الجاي بيغطي مفاهيم المصادقة (Authentication) — Session، API Keys، Bearer Tokens، وJWT.</div>
    <div class="en">🇬🇧 The API now returns data and errors in a reliable, consistent shape. One thing's left: who's even allowed to use the API? The next lesson covers authentication concepts — Sessions, API Keys, Bearer Tokens, and JWT.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>كل خطأ بيرجع بنفس الشكل: <code>{"error": {"code": "...", "message": "..."}}</code>.</li>
        <li>404 = المورد مش موجود، 422 = بيانات ناقصة أو غير صالحة رغم إن الطلب مفهوم.</li>
        <li><code>error.code</code> نص ثابت للبرنامج (زي <code>NOT_FOUND</code>)، <code>error.message</code> نص مقروء للبشر.</li>
        <li>الشكل غير الموحّد (نص أحيانًا، مصفوفة بمفاتيح مختلفة أحيانًا) بيكسر أي منطق فرونت-إند عام للتعامل مع الأخطاء.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="rest-pagination-filtering-sorting.php">← الدرس السابق / Prev: Pagination, Filtering &amp; Sorting</a>
    <a href="rest-api-authentication-concepts.php">المرحلة الجاية / Next: API Authentication Concepts →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
