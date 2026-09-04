<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'rest-pagination-filtering-sorting';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'Pagination, Filtering & Sorting في APIs';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">Stage 13 · REST API Development</span>
<h1>Pagination, Filtering, و Sorting في APIs <span class="ltr">Pagination, Filtering &amp; Sorting in APIs</span></h1>
<p class="subtitle">?page=2&amp;sort=price&amp;category=books — إزاي تصمم Query Parameters نضيفة ومفيدة. <span class="ltr">?page=2&amp;sort=price&amp;category=books — designing clean, useful query parameters.</span></p>

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
    <div class="ar">🇪🇬 <code>GET /api/products</code> اللي بنيناه في الدرس اللي فات بيرجّع كل صفوف الجدول مرة واحدة — كويس لـ 6 منتجات، كارثة لو الجدول فيه 50,000 صف. الدرس ده بيعلّمك تضيف <b>Pagination</b> (تقسيم النتائج لصفحات)، <b>Sorting</b> (ترتيب حسب عمود)، و<b>Filtering</b> (تضييق النتائج بشرط) — كلهم عن طريق Query Parameters زي <code>?page=2&amp;sort=-price&amp;category=books</code>، وهنبني وننفذ Handler حقيقي بيقرأهم ويبني SQL صحيح منهم.</div>
    <div class="en">🇬🇧 The <code>GET /api/products</code> we built last lesson returns every row at once — fine for 6 products, a disaster for a table with 50,000 rows. This lesson teaches adding <b>Pagination</b> (splitting results into pages), <b>Sorting</b> (ordering by a column), and <b>Filtering</b> (narrowing results by a condition) — all via query parameters like <code>?page=2&amp;sort=-price&amp;category=books</code>. We build and actually run a real handler that reads them and builds correct SQL from them.</div>
</div>

<h2 id="understand">🧠 1) الجدول الموسّع / The Extended Table</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 نفس فكرة جدول <code>products</code>، بس هنا زوّدنا عمود <code>category</code> (عشان الـ Filtering يبقى له معنى)، وزرعنا 12 صف (مش 5 أو 6) عشان الـ Pagination يبقى فعليًا محسوس.</div>
    <div class="en">🇬🇧 Same <code>products</code> idea, but here we add a <code>category</code> column (so Filtering means something), and seed 12 rows (not just 5 or 6) so Pagination is actually meaningful.</div>
</div>

<pre><code>&lt;?php
$pdo = new PDO('sqlite::memory:');
$pdo-&gt;setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo-&gt;exec('
    CREATE TABLE products (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        name TEXT NOT NULL,
        price REAL NOT NULL,
        stock INTEGER NOT NULL DEFAULT 0,
        category TEXT NOT NULL,
        created_at TEXT NOT NULL
    )
');

$seed = [
    ['Wireless Mouse', 12.99, 50, 'accessories', '2024-04-01'],
    ['Mechanical Keyboard', 59.50, 20, 'accessories', '2024-04-02'],
    ['USB-C Hub', 24.00, 35, 'accessories', '2024-04-03'],
    ['27" Monitor', 189.99, 8, 'displays', '2024-04-04'],
    ['Laptop Stand', 15.75, 40, 'accessories', '2024-04-05'],
    ['Webcam 1080p', 29.99, 15, 'accessories', '2024-04-06'],
    ['4K Monitor', 349.00, 5, 'displays', '2024-04-07'],
    ['Clean Code', 34.99, 60, 'books', '2024-04-08'],
    ['The Pragmatic Programmer', 39.99, 45, 'books', '2024-04-09'],
    ['Refactoring', 44.50, 22, 'books', '2024-04-10'],
    ['Mechanical Pencil Set', 6.25, 100, 'accessories', '2024-04-11'],
    ['Ultra-wide Monitor', 499.00, 3, 'displays', '2024-04-12'],
];
$stmt = $pdo-&gt;prepare('INSERT INTO products (name, price, stock, category, created_at) VALUES (?, ?, ?, ?, ?)');
foreach ($seed as $p) {
    $stmt-&gt;execute($p);
}</code></pre>

<h2 id="practice">💻 2) الـ Handler الحقيقي / The Real Handler</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 الطلب الحقيقي اللي عميل هيبعته:</div>
    <div class="en">🇬🇧 The real request a client would send:</div>
</div>
<pre><code>GET /api/products?page=2&amp;sort=-price&amp;category=accessories HTTP/1.1
Accept: application/json</code></pre>
<div class="bi-block">
    <div class="ar">🇪🇬 في سيرفر حقيقي، دي هتتقرا من <code>$_GET</code>. هنا هنحاكيها بمصفوفة <code>$queryParams</code> جاهزة، ونمررها للـ Handler الحقيقي اللي بيبني SQL ديناميكي: <code>WHERE</code> للفلترة (لو موجودة)، <code>ORDER BY</code> للترتيب، و<code>LIMIT</code>/<code>OFFSET</code> للصفحات. لاحظ إزاي بنمنع SQL Injection في اسم العمود بمقارنته بقايمة أعمدة مسموح بيها (Allowlist) — عمود الترتيب مينفعش يتحط كـ Parameter عادي زي القيم.</div>
    <div class="en">🇬🇧 On a real server, this would be read from <code>$_GET</code>. Here we simulate it with a ready <code>$queryParams</code> array, and pass it to the real handler that builds dynamic SQL: <code>WHERE</code> for filtering (if present), <code>ORDER BY</code> for sorting, and <code>LIMIT</code>/<code>OFFSET</code> for pages. Notice how we prevent SQL injection in the column name by checking it against an allowlist of columns — a sort column can't be bound as a regular parameter the way values can.</div>
</div>

<pre><code>&lt;?php
function handleListProducts(PDO $pdo, array $queryParams): array
{
    $perPage = 4;
    $page = max(1, (int) ($queryParams['page'] ?? 1));
    $offset = ($page - 1) * $perPage;

    $where = [];
    $bind = [];
    if (!empty($queryParams['category'])) {
        $where[] = 'category = ?';
        $bind[] = $queryParams['category'];
    }
    $whereSql = $where ? ('WHERE ' . implode(' AND ', $where)) : '';

    $sortParam = $queryParams['sort'] ?? 'id';
    $direction = 'ASC';
    $column = $sortParam;
    if (str_starts_with($sortParam, '-')) {
        $direction = 'DESC';
        $column = substr($sortParam, 1);
    }
    // Allowlist: never interpolate a column/direction name from the client directly.
    $allowedColumns = ['id', 'name', 'price', 'stock', 'created_at'];
    if (!in_array($column, $allowedColumns, true)) {
        $column = 'id';
    }

    $countStmt = $pdo-&gt;prepare("SELECT COUNT(*) FROM products $whereSql");
    $countStmt-&gt;execute($bind);
    $total = (int) $countStmt-&gt;fetchColumn();

    $sql = "SELECT id, name, price, stock, category FROM products $whereSql ORDER BY $column $direction LIMIT ? OFFSET ?";
    $stmt = $pdo-&gt;prepare($sql);
    $i = 1;
    foreach ($bind as $b) {
        $stmt-&gt;bindValue($i++, $b);
    }
    $stmt-&gt;bindValue($i++, $perPage, PDO::PARAM_INT);
    $stmt-&gt;bindValue($i++, $offset, PDO::PARAM_INT);
    $stmt-&gt;execute();

    return [
        'data' =&gt; $stmt-&gt;fetchAll(PDO::FETCH_ASSOC),
        'meta' =&gt; [
            'page' =&gt; $page,
            'per_page' =&gt; $perPage,
            'total' =&gt; $total,
            'total_pages' =&gt; (int) ceil($total / $perPage),
        ],
    ];
}</code></pre>

<h3>صفحة 1 مقابل صفحة 2 / Page 1 vs Page 2</h3>
<pre><code>echo json_encode(handleListProducts($pdo, ['page' =&gt; 1]), JSON_PRETTY_PRINT);
echo json_encode(handleListProducts($pdo, ['page' =&gt; 2]), JSON_PRETTY_PRINT);</code></pre>
<h4>الناتج الفعلي (صفحة 1) / Actual output (page 1)</h4>
<div class="output-box">{
    "data": [
        { "id": 1, "name": "Wireless Mouse", "price": 12.99, "stock": 50, "category": "accessories" },
        { "id": 2, "name": "Mechanical Keyboard", "price": 59.5, "stock": 20, "category": "accessories" },
        { "id": 3, "name": "USB-C Hub", "price": 24, "stock": 35, "category": "accessories" },
        { "id": 4, "name": "27\" Monitor", "price": 189.99, "stock": 8, "category": "displays" }
    ],
    "meta": { "page": 1, "per_page": 4, "total": 12, "total_pages": 3 }
}</div>
<h4>الناتج الفعلي (صفحة 2) / Actual output (page 2)</h4>
<div class="output-box">{
    "data": [
        { "id": 5, "name": "Laptop Stand", "price": 15.75, "stock": 40, "category": "accessories" },
        { "id": 6, "name": "Webcam 1080p", "price": 29.99, "stock": 15, "category": "accessories" },
        { "id": 7, "name": "4K Monitor", "price": 349, "stock": 5, "category": "displays" },
        { "id": 8, "name": "Clean Code", "price": 34.99, "stock": 60, "category": "books" }
    ],
    "meta": { "page": 2, "per_page": 4, "total": 12, "total_pages": 3 }
}</div>
<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ إن الصفحتين رجّعوا صفوف مختلفة تمامًا (id 1-4 مقابل id 5-8)، ونفس الـ <code>total: 12</code> و<code>total_pages: 3</code> في الاتنين — الـ <code>meta</code> بتفضل ثابتة عبر الصفحات لإنها بتوصف الجدول كله، مش الصفحة الحالية بس.</div>
    <div class="en">🇬🇧 Notice the two pages returned entirely different rows (id 1-4 vs id 5-8), while <code>total: 12</code> and <code>total_pages: 3</code> stay the same in both — <code>meta</code> stays constant across pages because it describes the whole table, not just the current page.</div>
</div>

<h3>sort=price مقابل sort=-price / sort=price vs sort=-price</h3>
<pre><code>$sortedAsc = handleListProducts($pdo, ['sort' =&gt; 'price']);
foreach ($sortedAsc['data'] as $p) { echo "{$p['name']}: \${$p['price']}\n"; }

$sortedDesc = handleListProducts($pdo, ['sort' =&gt; '-price']);
foreach ($sortedDesc['data'] as $p) { echo "{$p['name']}: \${$p['price']}\n"; }</code></pre>
<h4>الناتج الفعلي (sort=price) / Actual output (sort=price)</h4>
<div class="output-box">Mechanical Pencil Set: $6.25
Wireless Mouse: $12.99
Laptop Stand: $15.75
USB-C Hub: $24</div>
<h4>الناتج الفعلي (sort=-price) / Actual output (sort=-price)</h4>
<div class="output-box">Ultra-wide Monitor: $499
4K Monitor: $349
27" Monitor: $189.99
Mechanical Keyboard: $59.5</div>
<div class="bi-block">
    <div class="ar">🇪🇬 علامة <code>-</code> قبل اسم العمود (اصطلاح شائع في APIs حقيقية) بتعني "تنازلي". لاحظ إن كل نتيجة هنا بترجع أول 4 نتائج بس (Page 1 الافتراضية) — Sorting وPagination بيشتغلوا مع بعض دايمًا، مش بديل لبعض.</div>
    <div class="en">🇬🇧 A leading <code>-</code> before the column name (a common convention in real APIs) means "descending". Notice each result here only returns the first 4 (the default Page 1) — Sorting and Pagination always work together, not as alternatives.</div>
</div>

<h3>Filtering بـ category=books</h3>
<pre><code>echo json_encode(handleListProducts($pdo, ['category' =&gt; 'books']), JSON_PRETTY_PRINT);</code></pre>
<h4>الناتج الفعلي / Actual output</h4>
<div class="output-box">{
    "data": [
        { "id": 8, "name": "Clean Code", "price": 34.99, "stock": 60, "category": "books" },
        { "id": 9, "name": "The Pragmatic Programmer", "price": 39.99, "stock": 45, "category": "books" },
        { "id": 10, "name": "Refactoring", "price": 44.5, "stock": 22, "category": "books" }
    ],
    "meta": { "page": 1, "per_page": 4, "total": 3, "total_pages": 1 }
}</div>
<div class="bi-block">
    <div class="ar">🇪🇬 هنا <code>total: 3</code> مش 12 — الـ <code>COUNT(*)</code> اتنفذ بنفس شرط الـ <code>WHERE</code> بتاع الفلتر، فالـ <code>meta</code> بتعكس النتائج المفلترة بس، مش الجدول كله.</div>
    <div class="en">🇬🇧 Here <code>total: 3</code>, not 12 — the <code>COUNT(*)</code> runs with the same <code>WHERE</code> the filter uses, so <code>meta</code> reflects only the filtered results, not the whole table.</div>
</div>

<div class="bi-block">
    <div class="ar">🇪🇬 جرّب بنفسك تحت — غيّر <code>page</code>، <code>sort</code>، أو <code>category</code> في <code>$queryParams</code> وشوف الفرق.</div>
    <div class="en">🇬🇧 Try it yourself below — change <code>page</code>, <code>sort</code>, or <code>category</code> in <code>$queryParams</code> and see the difference.</div>
</div>

<div class="mini-editor-wrap">
    <textarea spellcheck="false">&lt;?php
$pdo = new PDO('sqlite::memory:');
$pdo-&gt;setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo-&gt;exec('CREATE TABLE products (
    id INTEGER PRIMARY KEY AUTOINCREMENT, name TEXT NOT NULL, price REAL NOT NULL,
    stock INTEGER NOT NULL DEFAULT 0, category TEXT NOT NULL, created_at TEXT NOT NULL
)');
$seed = [
    ['Wireless Mouse', 12.99, 50, 'accessories', '2024-04-01'],
    ['Mechanical Keyboard', 59.50, 20, 'accessories', '2024-04-02'],
    ['USB-C Hub', 24.00, 35, 'accessories', '2024-04-03'],
    ['27" Monitor', 189.99, 8, 'displays', '2024-04-04'],
    ['Laptop Stand', 15.75, 40, 'accessories', '2024-04-05'],
    ['4K Monitor', 349.00, 5, 'displays', '2024-04-07'],
    ['Clean Code', 34.99, 60, 'books', '2024-04-08'],
];
$stmt = $pdo-&gt;prepare('INSERT INTO products (name, price, stock, category, created_at) VALUES (?, ?, ?, ?, ?)');
foreach ($seed as $p) { $stmt-&gt;execute($p); }

function handleListProducts(PDO $pdo, array $queryParams): array
{
    $perPage = 3;
    $page = max(1, (int) ($queryParams['page'] ?? 1));
    $offset = ($page - 1) * $perPage;
    $where = [];
    $bind = [];
    if (!empty($queryParams['category'])) {
        $where[] = 'category = ?';
        $bind[] = $queryParams['category'];
    }
    $whereSql = $where ? ('WHERE ' . implode(' AND ', $where)) : '';
    $sortParam = $queryParams['sort'] ?? 'id';
    $direction = 'ASC';
    $column = $sortParam;
    if (str_starts_with($sortParam, '-')) { $direction = 'DESC'; $column = substr($sortParam, 1); }
    $allowedColumns = ['id', 'name', 'price', 'stock', 'created_at'];
    if (!in_array($column, $allowedColumns, true)) { $column = 'id'; }
    $sql = "SELECT id, name, price, category FROM products $whereSql ORDER BY $column $direction LIMIT ? OFFSET ?";
    $stmt = $pdo-&gt;prepare($sql);
    $i = 1;
    foreach ($bind as $b) { $stmt-&gt;bindValue($i++, $b); }
    $stmt-&gt;bindValue($i++, $perPage, PDO::PARAM_INT);
    $stmt-&gt;bindValue($i++, $offset, PDO::PARAM_INT);
    $stmt-&gt;execute();
    return ['data' =&gt; $stmt-&gt;fetchAll(PDO::FETCH_ASSOC), 'page' =&gt; $page];
}

// Try: ['page' =&gt; 2], ['sort' =&gt; '-price'], ['category' =&gt; 'displays']
echo json_encode(handleListProducts($pdo, ['sort' =&gt; 'price']), JSON_PRETTY_PRINT) . PHP_EOL;</textarea>
    <div class="mini-toolbar">
        <button class="mini-run-btn">▶ شغّل / Run</button>
        <span class="mini-status"></span>
    </div>
    <div class="output-box">— لسه متشغلش / not run yet —</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="desc">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question"><code>sort=-price</code> بيعني إيه؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What does <code>sort=-price</code> mean?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="asc"> ترتيب تصاعدي حسب السعر</label>
        <label><input type="radio" name="q1" value="desc"> ترتيب تنازلي حسب السعر</label>
        <label><input type="radio" name="q1" value="negative"> فلترة الأسعار السالبة بس</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="allowlist">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">ليه <code>handleListProducts</code> بيقارن اسم عمود الترتيب بـ <code>$allowedColumns</code> بدل ما يستخدمه زي ما هو؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Why does <code>handleListProducts</code> check the sort column against <code>$allowedColumns</code> instead of using it as-is?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="perf"> لتحسين الأداء بس</label>
        <label><input type="radio" name="q2" value="allowlist"> عشان اسم العمود مينفعش يتحط كـ bound parameter، والسماح بأي اسم بيفتح باب لـ SQL Injection</label>
        <label><input type="radio" name="q2" value="style"> مجرد تفضيل أسلوب كتابة</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="same">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">في الناتج الفعلي فوق، <code>meta.total</code> فرق بين صفحة 1 وصفحة 2 (من غير فلتر)؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">In the actual output above, does <code>meta.total</code> differ between page 1 and page 2 (with no filter)?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="same"> لا، فضل 12 في الاتنين لإنه بيوصف الجدول كله</label>
        <label><input type="radio" name="q3" value="diff"> أيوه، 12 في الأولى و8 في التانية</label>
        <label><input type="radio" name="q3" value="zero"> لأ، بيبقى صفر في صفحة 2</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="three">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">في الناتج الفعلي بتاع <code>category=books</code>، <code>meta.total</code> رجع كام؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">In the actual <code>category=books</code> output, what did <code>meta.total</code> come back as?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="twelve"> 12</label>
        <label><input type="radio" name="q4" value="three"> 3</label>
        <label><input type="radio" name="q4" value="four"> 4</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ فلترة بسعر أدنى / Filter by Minimum Price</h3>
    <div class="ar">🇪🇬 في <a href="../playground/index.php">محرر الكود</a> (أو المحرر المصغّر فوق): زوّد <code>handleListProducts</code> بدعم <code>min_price</code> — لو موجود في <code>$queryParams</code>، ضيف شرط <code>price &gt;= ?</code> على الـ <code>WHERE</code> الموجود (مع <code>AND</code> لو فيه فلتر category كمان). جرّبها بـ <code>['min_price' =&gt; 30]</code> وشوف بس المنتجات اللي سعرها 30 أو أكتر بترجع.</div>
    <div class="en">🇬🇧 In the <a href="../playground/index.php">Playground</a> (or the mini editor above): extend <code>handleListProducts</code> to support <code>min_price</code> — if present in <code>$queryParams</code>, add a <code>price &gt;= ?</code> condition to the existing <code>WHERE</code> (combined with <code>AND</code> if a category filter is also present). Test it with <code>['min_price' =&gt; 30]</code> and confirm only products priced 30 or above come back.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 الـ API دلوقتي بيرجّع بيانات صح، لكن لسه بيرجّع نفس الشكل سواء نجح أو فشل. الدرس الجاي بيثبّت شكل موحّد للأخطاء (404, 422) عشان أي عميل يقدر يتعامل معاهم بمنطق واحد.</div>
    <div class="en">🇬🇧 The API now returns correct data, but still returns the same shape whether it succeeds or fails. The next lesson locks in a consistent error shape (404, 422) so any client can handle them with one piece of logic.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>Pagination: <code>LIMIT</code>/<code>OFFSET</code> محسوبين من <code>page</code> و<code>per_page</code> ثابت.</li>
        <li>Sorting: علامة <code>-</code> قبل اسم العمود = تنازلي، واسم العمود لازم يتحقق منه بـ Allowlist مش يتحط في الـ SQL زي ما هو.</li>
        <li>Filtering: شروط <code>WHERE</code> بتتبني ديناميكيًا حسب الـ Query Parameters الموجودة فعلًا.</li>
        <li><code>meta</code> (total, total_pages) بتُحسب بنفس شروط الـ WHERE بتاعة النتائج، عشان تعكس النطاق الصحيح.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="rest-products-api-project.php">← الدرس السابق / Prev: Products REST API Project</a>
    <a href="rest-error-responses.php">المرحلة الجاية / Next: API Error Responses →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
