<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'stage5';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'المرحلة 5 — بناء Backend منظم';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">المرحلة 5 / Stage 5</span>
<h1>بناء Backend منظم <span class="ltr">Architecture: MVC &amp; REST</span></h1>
<p class="subtitle">لحد دلوقتي كل درس كان ملف واحد. دلوقتي هنتعلم إزاي نبني الكود بشكل منظم يقدر يكبر: فصل المسؤوليات (MVC)، توجيه الطلبات (Routing) من غير framework، وبناء REST API حقيقي مع Authentication.</p>

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
    <div class="ar">🇪🇬 تفهم فكرة MVC وليه بنفصل المنطق عن العرض، تبني Router بسيط من الصفر يوجّه كل request للكود المسؤول عنه، وتبني REST API بيرجع JSON مع نظام Authentication حقيقي.</div>
    <div class="en">🇬🇧 Understand MVC and why logic is separated from presentation, build a simple Router from scratch that dispatches each request to the right code, and build a REST API returning JSON with real Authentication.</div>
</div>

<h2 id="understand">🧠 MVC — فصل المسؤوليات / Separation of Concerns</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>Model</b> = المسؤول عن البيانات ومنطق العمل (زي التعامل مع قاعدة البيانات). <b>View</b> = المسؤول عن العرض بس (HTML/JSON). <b>Controller</b> = الوسيط اللي بياخد الـ request، يكلم الـ Model، ويقرر إيه الـ View اللي هيترجع. الفايدة: لو غيّرت شكل الصفحة، مش هتلمس منطق قاعدة البيانات، والعكس صحيح.</div>
    <div class="en">🇬🇧 <b>Model</b> = owns data and business logic (e.g. talking to the database). <b>View</b> = owns presentation only (HTML/JSON). <b>Controller</b> = the middleman that receives the request, talks to the Model, and decides which View to return. Benefit: changing how a page looks never touches database logic, and vice versa.</div>
</div>

<div class="flow-diagram">
    <div class="flow-box">Route</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">Controller</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">Model</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">Database</div>
</div>
<div class="bi-block">
    <div class="ar">🇪🇬 الطلب بيدخل من الـ Route، يوصل للـ Controller (اللي بيفهم إيه المطلوب بالظبط)، الـ Controller بيكلم الـ Model (اللي بيتكلم مع قاعدة البيانات فعليًا)، والنتيجة بترجع لفوق تاني في نفس الاتجاه العكسي لحد ما توصل رد للمستخدم.</div>
    <div class="en">🇬🇧 A request comes in through the Route, reaches the Controller (which figures out exactly what's needed), the Controller talks to the Model (which actually talks to the database), and the result travels back up in reverse until it becomes a response to the user.</div>
</div>

<h2>Routing من الصفر / Routing from Scratch</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 بدل ما يكون عندك ملف PHP منفصل لكل صفحة، بتعمل نقطة دخول واحدة (<code>index.php</code>) بتقرأ الـ URL والـ Method، وتوجّه الطلب للـ Controller الصح. ده أساس أي framework زي Laravel — هما بس بيعملوه بشكل أكبر وأذكى.</div>
    <div class="en">🇬🇧 Instead of a separate PHP file per page, you create a single entry point (<code>index.php</code>) that reads the URL and Method, and dispatches to the correct Controller. This is the foundation of every framework like Laravel — they just do it bigger and smarter.</div>
</div>

<h2>REST API و Authentication حقيقي / REST API &amp; Real Authentication</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 REST API بيتعامل بـ HTTP Methods كـ "أفعال": <code>GET</code> = هات، <code>POST</code> = أضف، <code>PUT/PATCH</code> = عدّل، <code>DELETE</code> = احذف. أما الـ Authentication الحقيقي فمعناها إنك متخزنش الباسورد نفسه أبدًا — بتخزن Hash بتاعه، وتتحقق باستخدام دوال PHP المخصصة لكده.</div>
    <div class="en">🇬🇧 A REST API treats HTTP Methods as "verbs": <code>GET</code> = fetch, <code>POST</code> = create, <code>PUT/PATCH</code> = update, <code>DELETE</code> = remove. Real Authentication means you never store the password itself — you store its Hash, and verify using PHP's dedicated functions.</div>
</div>

<div class="security-box">
    <h3>⚠️ الأمان: الباسورد ممنوع يتخزن نص عادي</h3>
    <div class="ar">🇪🇬 <code>password_hash()</code> بيستخدم خوارزمية <code>bcrypt</code> ومعاها "Salt" عشوائي تلقائي — يعني حتى لو اتسرقت قاعدة البيانات، محدش هيقدر يرجّع الباسورد الأصلي بسهولة. متستخدمش <code>md5()</code> أو <code>sha1()</code> للباسوردات أبدًا، دول سريعين جدًا وسهل كسرهم.</div>
    <div class="en">🇬🇧 <code>password_hash()</code> uses the <code>bcrypt</code> algorithm with an automatic random Salt — so even if the database is stolen, recovering the original password is impractical. Never use <code>md5()</code> or <code>sha1()</code> for passwords — they're far too fast and trivially crackable.</div>
</div>

<h2 id="practice">💻 مثال عملي / Practical Example</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 الكود ده بيوضح Model وController شغالين مع بعض — جرّبه بنفسك في المحرر تحت مباشرة، عدّل عليه، وشغّله شوف الناتج.</div>
    <div class="en">🇬🇧 This code shows a Model and Controller working together — try it yourself in the editor right below, tweak it, and run it to see the result.</div>
</div>

<pre><code>&lt;?php
// Model: ProductModel.php
class ProductModel {
    public function __construct(private PDO $pdo) {}
    public function all(): array {
        return $this->pdo->query('SELECT * FROM products')->fetchAll();
    }
}

// Controller: ProductController.php
class ProductController {
    public function __construct(private ProductModel $model) {}
    public function index(): void {
        $products = $this->model->all();
        header('Content-Type: application/json');
        echo json_encode($products); // "View" هنا JSON مش HTML
    }
}</code></pre>
<h3>الناتج الفعلي (بافتراض جدول فيه منتجين) / Actual output</h3>
<div class="output-box">[{"id":1,"name":"Keyboard","price":45.99},{"id":2,"name":"Mouse","price":19.99}]</div>

<div class="bi-block">
    <div class="ar">🇪🇬 عشان تجرّب المفهوم من غير ما تحتاج قاعدة بيانات فعلية، المثال تحت بيحاكي نفس الفكرة بمصفوفة PHP بدل PDO — جرّبه وعدّل عليه:</div>
    <div class="en">🇬🇧 To try the concept without needing a real database, the example below simulates the same idea with a plain PHP array instead of PDO — try it and tweak it:</div>
</div>

<div class="mini-editor-wrap">
    <textarea spellcheck="false">&lt;?php
class ProductModel {
    private array $products = [
        ['id' => 1, 'name' => 'Keyboard', 'price' => 45.99],
        ['id' => 2, 'name' => 'Mouse', 'price' => 19.99],
    ];
    public function all(): array {
        return $this->products;
    }
}

class ProductController {
    public function __construct(private ProductModel $model) {}
    public function index(): void {
        echo json_encode($this->model->all());
    }
}

(new ProductController(new ProductModel()))->index();</textarea>
    <div class="mini-toolbar">
        <button class="mini-run-btn">▶ شغّل / Run</button>
        <span class="mini-status"></span>
    </div>
    <div class="output-box">— لسه متشغلش / not run yet —</div>
</div>

<h2>Router بيربط كل حاجة / The Router Ties It Together</h2>
<pre><code>&lt;?php
// index.php — نقطة الدخول الوحيدة
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];

$routes = [
    'GET'  => ['/products' => [ProductController::class, 'index']],
    'POST' => ['/products' => [ProductController::class, 'store']],
];

$handler = $routes[$method][$uri] ?? null;

if (!$handler) {
    http_response_code(404);
    echo json_encode(['error' => 'Route not found']);
    exit;
}

[$class, $action] = $handler;
(new $class(new ProductModel($pdo)))->$action();</code></pre>
<h3>الناتج الفعلي (GET /products) / Actual output</h3>
<div class="output-box">[{"id":1,"name":"Keyboard","price":45.99},{"id":2,"name":"Mouse","price":19.99}]</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="controller">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">أين تتم معالجة منطق الطلب (استقبال الـ request واتخاذ القرار) في نمط MVC؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Where is the request's logic processed in the MVC pattern?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="model"> Model</label>
        <label><input type="radio" name="q1" value="view"> View</label>
        <label><input type="radio" name="q1" value="controller"> Controller</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="hash">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">إزاي المفروض تخزن باسورد المستخدم في قاعدة البيانات؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">How should you store a user's password in the database?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="plain"> كنص عادي / As plain text</label>
        <label><input type="radio" name="q2" value="md5"> بـ md5()</label>
        <label><input type="radio" name="q2" value="hash"> بـ password_hash()</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ ابني Controller يعرض قائمة المنتجات / Build a Products Controller</h3>
    <div class="ar">🇪🇬 استخدم <a href="../playground/index.php">محرر الكود</a> (أو المحرر المصغّر فوق) واعمل <code>ProductModel</code> جديد فيه 4 منتجات على الأقل، و<code>ProductController</code> بـ method اسمها <code>index()</code> تطبع المنتجات كـ JSON. بعد كده زوّد method جديدة اسمها <code>show($id)</code> ترجع منتج واحد بس حسب الـ id.</div>
    <div class="en">🇬🇧 Use the <a href="../playground/index.php">Playground</a> (or the mini editor above) to build a new <code>ProductModel</code> with at least 4 products, and a <code>ProductController</code> with an <code>index()</code> method that prints the products as JSON. Then add a new <code>show($id)</code> method that returns just one product by its id.</div>
</div>

<div class="exercise-box">
    <h3>✍️ تمرين إضافي / Extra Exercise</h3>
    <div class="ar">🇪🇬 ابني Router بسيط بيدعم <code>GET /tasks</code> (يعرض قايمة) و<code>POST /tasks</code> (يضيف عنصر) و<code>DELETE /tasks/{id}</code>. استخدم Model منفصل للتعامل مع قاعدة بيانات <code>tasks</code> من المرحلة اللي فاتت.</div>
    <div class="en">🇬🇧 Build a simple Router supporting <code>GET /tasks</code> (list), <code>POST /tasks</code> (create), and <code>DELETE /tasks/{id}</code>. Use a separate Model to talk to the <code>tasks</code> table from the previous stage.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 كل حاجة اتعلمتها هنا (MVC، Routing، REST، Authentication) هي بالظبط البنية اللي مشروع التخرج (Task Manager) في آخر المسار مبني عليها. لما توصله، هتكون بتطبّق نفس الأربع مفاهيم دي على مستوى أكبر — Model وController منفصلين لكل من المستخدمين والمهام، Router بيوجّه كل الـ endpoints، وAuthentication حقيقي يحمي بيانات كل مستخدم.</div>
    <div class="en">🇬🇧 Everything you learned here (MVC, Routing, REST, Authentication) is exactly the structure the Capstone Task Manager project is built on. When you reach it, you'll apply these same four concepts at a larger scale — separate Models and Controllers for users and tasks, a Router dispatching every endpoint, and real Authentication protecting each user's data.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>MVC = Model (بيانات ومنطق) + View (عرض) + Controller (وسيط بينهم).</li>
        <li>Routing = نقطة دخول واحدة بتوجّه كل request للكود الصح حسب الـ URL و الـ Method.</li>
        <li>REST = استخدام HTTP Methods كأفعال (GET, POST, PUT, DELETE) على "Resources".</li>
        <li>الباسورد يتخزن بـ <code>password_hash()</code> ويتحقق بـ <code>password_verify()</code> — أبدًا نص عادي.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="stage4.php">← المرحلة السابقة</a>
    <a href="stage6.php">المرحلة الجاية / Next: Professional Level →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
