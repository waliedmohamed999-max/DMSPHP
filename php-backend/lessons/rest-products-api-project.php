<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'rest-products-api-project';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'مشروع: REST API لمنتجات — Products REST API Project';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">Stage 13 · REST API Development</span>
<h1>🚀 مشروع: REST API لمنتجات <span class="ltr">🚀 Project: A Products REST API</span></h1>
<p class="subtitle">GET/POST/PUT/DELETE حقيقيين على /api/products — الـ API الأول اللي تبنيه من الصفر. <span class="ltr">Real GET/POST/PUT/DELETE on /api/products — the first API you build from scratch.</span></p>

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
    <div class="ar">🇪🇬 هتبني أول API حقيقي: <code>/api/products</code>. عشان الدرس يشتغل بدون سيرفر HTTP حقيقي، هنعمل حاجتين بصراحة كاملة: (1) نعرض شكل الطلب الحقيقي اللي عميل هيبعته (فعل + URL + جسم JSON)، و(2) نكتب وننفّذ فعليًا دالة الـ Handler اللي المفروض تستقبل الطلب ده، بمدخلات محاكاة بدل بيانات HTTP حقيقية. منطق قاعدة البيانات (SELECT/INSERT/DELETE) هيتنفذ فعليًا 100%، وهتشوف الناتج الحقيقي.</div>
    <div class="en">🇬🇧 You'll build your first real API: <code>/api/products</code>. So the lesson works without a real HTTP server, we do two things honestly: (1) show what the real request a client would send looks like (verb + URL + JSON body), and (2) actually write and run the handler function that would receive it, called with simulated input standing in for real HTTP data. The database logic (SELECT/INSERT/DELETE) genuinely executes, and you'll see the real output.</div>
</div>

<h2 id="understand">🧠 1) الجدول والبيانات / The Table &amp; Seed Data</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 أول خطوة: جدول <code>products</code> بأعمدة <code>id, name, price, stock, created_at</code>، مبني على نفس فكرة <code>build_sandbox_pdo()</code> اللي شفتها في دروس قواعد البيانات — PDO في الذاكرة (SQLite)، بس هنا هنضيف الجدول ده بنفسنا لإنه خاص بمشروع الـ API ده.</div>
    <div class="en">🇬🇧 First step: a <code>products</code> table with columns <code>id, name, price, stock, created_at</code>, built on the same <code>build_sandbox_pdo()</code> idea from the database lessons — an in-memory PDO (SQLite), but here we add this table ourselves since it's specific to this API project.</div>
</div>

<pre><code>&lt;?php
require __DIR__ . '/../db-sandbox/schema.php';
$pdo = build_sandbox_pdo();

$pdo-&gt;exec('
    CREATE TABLE products (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        name TEXT NOT NULL,
        price REAL NOT NULL,
        stock INTEGER NOT NULL DEFAULT 0,
        created_at TEXT NOT NULL
    )
');

$seed = [
    ['Wireless Mouse', 12.99, 50, '2024-04-01'],
    ['Mechanical Keyboard', 59.50, 20, '2024-04-02'],
    ['USB-C Hub', 24.00, 35, '2024-04-03'],
    ['27" Monitor', 189.99, 8, '2024-04-04'],
    ['Laptop Stand', 15.75, 40, '2024-04-05'],
    ['Webcam 1080p', 29.99, 15, '2024-04-06'],
];
$stmt = $pdo-&gt;prepare('INSERT INTO products (name, price, stock, created_at) VALUES (?, ?, ?, ?)');
foreach ($seed as $p) {
    $stmt-&gt;execute($p);
}</code></pre>

<h2 id="practice">💻 2) الأربع عمليات (CRUD) / The Four Operations (CRUD)</h2>

<h3>أ) GET /api/products — قايمة كل المنتجات / List all products</h3>
<div class="bi-block">
    <div class="ar">🇪🇬 ده الطلب الحقيقي اللي عميل (زي متصفح أو تطبيق موبايل) هيبعته:</div>
    <div class="en">🇬🇧 This is the real request a client (a browser, a mobile app) would send:</div>
</div>
<pre><code>GET /api/products HTTP/1.1
Host: example.com
Accept: application/json</code></pre>
<div class="bi-block">
    <div class="ar">🇪🇬 والـ Handler اللي المفروض يستقبله ويرد عليه، بننفذه فعليًا بدون سيرفر:</div>
    <div class="en">🇬🇧 The handler that would receive and answer it, actually run without a server:</div>
</div>
<pre><code>&lt;?php
function handleGetProducts(PDO $pdo): array
{
    $stmt = $pdo-&gt;query('SELECT id, name, price, stock, created_at FROM products ORDER BY id');
    return $stmt-&gt;fetchAll(PDO::FETCH_ASSOC);
}

echo json_encode(handleGetProducts($pdo), JSON_PRETTY_PRINT);</code></pre>
<h4>الناتج الفعلي / Actual output</h4>
<div class="output-box">[
    {
        "id": 1,
        "name": "Wireless Mouse",
        "price": 12.99,
        "stock": 50,
        "created_at": "2024-04-01"
    },
    {
        "id": 2,
        "name": "Mechanical Keyboard",
        "price": 59.5,
        "stock": 20,
        "created_at": "2024-04-02"
    },
    {
        "id": 3,
        "name": "USB-C Hub",
        "price": 24,
        "stock": 35,
        "created_at": "2024-04-03"
    },
    {
        "id": 4,
        "name": "27\" Monitor",
        "price": 189.99,
        "stock": 8,
        "created_at": "2024-04-04"
    },
    {
        "id": 5,
        "name": "Laptop Stand",
        "price": 15.75,
        "stock": 40,
        "created_at": "2024-04-05"
    },
    {
        "id": 6,
        "name": "Webcam 1080p",
        "price": 29.99,
        "stock": 15,
        "created_at": "2024-04-06"
    }
]</div>

<h3>ب) GET /api/products/{id} — منتج واحد / A single product</h3>
<div class="bi-block">
    <div class="ar">🇪🇬 الطلب الحقيقي (الـ id بيبقى جزء من الـ URL نفسه):</div>
    <div class="en">🇬🇧 The real request (the id lives right in the URL):</div>
</div>
<pre><code>GET /api/products/3 HTTP/1.1
Accept: application/json</code></pre>
<pre><code>&lt;?php
function handleGetProduct(PDO $pdo, int $id): ?array
{
    $stmt = $pdo-&gt;prepare('SELECT id, name, price, stock, created_at FROM products WHERE id = ?');
    $stmt-&gt;execute([$id]);
    $row = $stmt-&gt;fetch(PDO::FETCH_ASSOC);
    return $row ?: null;
}

// simulating the id parsed from the URL /api/products/3
echo json_encode(handleGetProduct($pdo, 3), JSON_PRETTY_PRINT) . PHP_EOL;

// simulating GET /api/products/999 — an id that doesn't exist
var_dump(handleGetProduct($pdo, 999));</code></pre>
<h4>الناتج الفعلي / Actual output</h4>
<div class="output-box">{
    "id": 3,
    "name": "USB-C Hub",
    "price": 24,
    "stock": 35,
    "created_at": "2024-04-03"
}
NULL</div>
<div class="bi-block">
    <div class="ar">🇪🇬 لما الدالة ترجع <code>null</code>، ده اللي بيخلي الـ Handler الحقيقي (لما يكون فعلًا وراه سيرفر) يرجّع 404 Not Found بدل ما يحاول يطبع بيانات مش موجودة — هتشوف الشكل الرسمي لده في درس "استجابات الأخطاء".</div>
    <div class="en">🇬🇧 When the function returns <code>null</code>, that's what lets the real handler (once it's actually behind a server) return a 404 Not Found instead of trying to print data that doesn't exist — you'll see the formal shape for this in the "Error Responses" lesson.</div>
</div>

<h3>ج) POST /api/products — إنشاء منتج / Create a product</h3>
<div class="bi-block">
    <div class="ar">🇪🇬 الطلب الحقيقي بيبعت جسم JSON فيه بيانات المنتج الجديد:</div>
    <div class="en">🇬🇧 The real request sends a JSON body with the new product's data:</div>
</div>
<pre><code>POST /api/products HTTP/1.1
Content-Type: application/json

{
    "name": "Noise-Cancelling Headphones",
    "price": 89.00,
    "stock": 12
}</code></pre>
<div class="bi-block">
    <div class="ar">🇪🇬 في سيرفر حقيقي، الجسم ده كان هيتقرا بـ <code>json_decode(file_get_contents('php://input'), true)</code>. هنا هنحاكي النتيجة بمصفوفة PHP جاهزة، ونمرّرها للـ Handler الحقيقي:</div>
    <div class="en">🇬🇧 On a real server, that body would be read with <code>json_decode(file_get_contents('php://input'), true)</code>. Here we simulate the result with a ready PHP array, and pass it to the real handler:</div>
</div>
<pre><code>&lt;?php
function handleCreateProduct(PDO $pdo, array $body): array
{
    $stmt = $pdo-&gt;prepare('INSERT INTO products (name, price, stock, created_at) VALUES (?, ?, ?, ?)');
    $stmt-&gt;execute([$body['name'], $body['price'], $body['stock'] ?? 0, date('Y-m-d')]);
    $newId = (int) $pdo-&gt;lastInsertId();
    return handleGetProduct($pdo, $newId);
}

// simulating json_decode(file_get_contents('php://input'), true)
$body = ['name' =&gt; 'Noise-Cancelling Headphones', 'price' =&gt; 89.00, 'stock' =&gt; 12];
echo json_encode(handleCreateProduct($pdo, $body), JSON_PRETTY_PRINT);</code></pre>
<h4>الناتج الفعلي / Actual output</h4>
<div class="output-box">{
    "id": 7,
    "name": "Noise-Cancelling Headphones",
    "price": 89,
    "stock": 12,
    "created_at": "2026-09-04"
}</div>
<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ إن الـ <code>id</code> الراجع (7) بقى صف حقيقي بعد الستة اللي زرعناهم — يعني الـ <code>INSERT</code> فعلًا حصل، مش بس محاكاة. وفي سيرفر حقيقي، ده كان لازم يرجّع Status Code <b>201 Created</b> مش 200.</div>
    <div class="en">🇬🇧 Notice the returned <code>id</code> (7) comes right after the six we seeded — meaning the <code>INSERT</code> genuinely happened, not just a simulation. On a real server, this should return status code <b>201 Created</b>, not 200.</div>
</div>

<h3>د) DELETE /api/products/{id} — حذف منتج / Delete a product</h3>
<div class="bi-block">
    <div class="ar">🇪🇬 الطلب الحقيقي:</div>
    <div class="en">🇬🇧 The real request:</div>
</div>
<pre><code>DELETE /api/products/2 HTTP/1.1</code></pre>
<pre><code>&lt;?php
function handleDeleteProduct(PDO $pdo, int $id): bool
{
    $stmt = $pdo-&gt;prepare('DELETE FROM products WHERE id = ?');
    $stmt-&gt;execute([$id]);
    return $stmt-&gt;rowCount() &gt; 0;
}

$deleted = handleDeleteProduct($pdo, 2);
var_dump($deleted);

// confirming it's REALLY gone with a follow-up real SELECT
$check = handleGetProduct($pdo, 2);
var_dump($check);</code></pre>
<h4>الناتج الفعلي / Actual output</h4>
<div class="output-box">bool(true)
NULL</div>
<div class="bi-block">
    <div class="ar">🇪🇬 <code>$deleted</code> رجع <code>true</code> (صف اتحذف فعلًا)، وبعدين <code>SELECT</code> تانٍ حقيقي على نفس الـ id رجع <code>null</code> — يعني الحذف مش مجرد ادعاء، اتأكد بطلب تاني منفصل.</div>
    <div class="en">🇬🇧 <code>$deleted</code> came back <code>true</code> (a row was really deleted), and a second real <code>SELECT</code> on the same id then returned <code>null</code> — so the deletion isn't just claimed, it's verified with a separate follow-up query.</div>
</div>

<div class="bi-block">
    <div class="ar">🇪🇬 جرّب الكود الكامل بنفسك تحت — غيّر id الحذف أو بيانات الإنشاء وشوف الناتج.</div>
    <div class="en">🇬🇧 Try the full code yourself below — change the delete id or the creation data and see the result.</div>
</div>

<div class="mini-editor-wrap">
    <textarea spellcheck="false">&lt;?php
$pdo = new PDO('sqlite::memory:');
$pdo-&gt;setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo-&gt;exec('CREATE TABLE products (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT NOT NULL,
    price REAL NOT NULL,
    stock INTEGER NOT NULL DEFAULT 0,
    created_at TEXT NOT NULL
)');
$seed = [
    ['Wireless Mouse', 12.99, 50, '2024-04-01'],
    ['Mechanical Keyboard', 59.50, 20, '2024-04-02'],
    ['USB-C Hub', 24.00, 35, '2024-04-03'],
];
$stmt = $pdo-&gt;prepare('INSERT INTO products (name, price, stock, created_at) VALUES (?, ?, ?, ?)');
foreach ($seed as $p) { $stmt-&gt;execute($p); }

function handleGetProduct(PDO $pdo, int $id): ?array
{
    $stmt = $pdo-&gt;prepare('SELECT id, name, price, stock, created_at FROM products WHERE id = ?');
    $stmt-&gt;execute([$id]);
    $row = $stmt-&gt;fetch(PDO::FETCH_ASSOC);
    return $row ?: null;
}

function handleCreateProduct(PDO $pdo, array $body): array
{
    $stmt = $pdo-&gt;prepare('INSERT INTO products (name, price, stock, created_at) VALUES (?, ?, ?, ?)');
    $stmt-&gt;execute([$body['name'], $body['price'], $body['stock'] ?? 0, date('Y-m-d')]);
    $newId = (int) $pdo-&gt;lastInsertId();
    return handleGetProduct($pdo, $newId);
}

// Try changing this body:
$body = ['name' =&gt; 'Desk Lamp', 'price' =&gt; 19.99, 'stock' =&gt; 30];
echo json_encode(handleCreateProduct($pdo, $body), JSON_PRETTY_PRINT) . PHP_EOL;</textarea>
    <div class="mini-toolbar">
        <button class="mini-run-btn">▶ شغّل / Run</button>
        <span class="mini-status"></span>
    </div>
    <div class="output-box">— لسه متشغلش / not run yet —</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="null">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question"><code>handleGetProduct($pdo, 999)</code> بترجع إيه لما المنتج مش موجود؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What does <code>handleGetProduct($pdo, 999)</code> return when the product doesn't exist?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="empty"> مصفوفة فاضية <code>[]</code></label>
        <label><input type="radio" name="q1" value="null"> <code>null</code></label>
        <label><input type="radio" name="q1" value="false"> <code>false</code></label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="input">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">في سيرفر حقيقي، جسم POST بيتقرا بـ <code>json_decode(file_get_contents(...))</code> — أنهي مصدر بيتقرا منه؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">On a real server, a POST body is read via <code>json_decode(file_get_contents(...))</code> — which source is that reading from?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="get"> <code>$_GET</code></label>
        <label><input type="radio" name="q2" value="input"> <code>php://input</code></label>
        <label><input type="radio" name="q2" value="session"> <code>$_SESSION</code></label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="rowcount">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question"><code>handleDeleteProduct</code> بيعرف الحذف حصل فعلًا إزاي؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">How does <code>handleDeleteProduct</code> know the delete actually happened?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="try"> بيحوطها بـ try/catch</label>
        <label><input type="radio" name="q3" value="rowcount"> بيفحص <code>$stmt-&gt;rowCount() &gt; 0</code></label>
        <label><input type="radio" name="q3" value="select"> بيعمل SELECT قبلها يدويًا</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="201">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">بعد نجاح <code>POST /api/products</code>، أنهي Status Code كان المفروض يترجع في سيرفر حقيقي؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">After a successful <code>POST /api/products</code>, which status code should a real server return?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="200"> 200 OK</label>
        <label><input type="radio" name="q4" value="201"> 201 Created</label>
        <label><input type="radio" name="q4" value="204"> 204 No Content</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ أضف PUT /api/products/{id} / Add PUT /api/products/{id}</h3>
    <div class="ar">🇪🇬 في <a href="../playground/index.php">محرر الكود</a> (أو المحرر المصغّر فوق): اكتب دالة <code>handleUpdateProduct(PDO $pdo, int $id, array $body): ?array</code> بتعمل <code>UPDATE products SET name = ?, price = ?, stock = ? WHERE id = ?</code>، وبعدين ترجع المنتج المحدّث بمناداة <code>handleGetProduct</code>. جرّبها على منتج موجود وشوف القيم اتغيّرت فعلًا.</div>
    <div class="en">🇬🇧 In the <a href="../playground/index.php">Playground</a> (or the mini editor above): write a <code>handleUpdateProduct(PDO $pdo, int $id, array $body): ?array</code> function that runs <code>UPDATE products SET name = ?, price = ?, stock = ? WHERE id = ?</code>, then returns the updated product via <code>handleGetProduct</code>. Test it on an existing product and confirm the values actually changed.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 الـ API دلوقتي شغال بس بيرجّع كل المنتجات دفعة واحدة من غير تحكم. الدرس الجاي هيضيف Pagination وFiltering وSorting — بالظبط زي أي API حقيقي محتاج يتعامل مع آلاف الصفوف.</div>
    <div class="en">🇬🇧 The API now works, but returns every product at once with no control. The next lesson adds Pagination, Filtering, and Sorting — exactly what any real API needs when handling thousands of rows.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>كل عملية REST = طلب HTTP حقيقي (فعل + URL + جسم اختياري) + Handler حقيقي بيتنفذ.</li>
        <li><code>handleGetProducts</code> بترجع كل الصفوف، <code>handleGetProduct</code> بترجع صف واحد أو <code>null</code> لو مش موجود.</li>
        <li><code>handleCreateProduct</code> بتحاكي جسم JSON بمصفوفة، وبتنفذ <code>INSERT</code> حقيقي، وبترجع الصف الجديد.</li>
        <li><code>handleDeleteProduct</code> بترجع <code>bool</code> حسب <code>rowCount()</code>، والتأكد بيتم بـ SELECT تاني حقيقي.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="rest-principles.php">← الدرس السابق / Prev: REST Principles</a>
    <a href="rest-pagination-filtering-sorting.php">المرحلة الجاية / Next: Pagination, Filtering &amp; Sorting →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
