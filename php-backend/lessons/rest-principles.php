<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'rest-principles';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'مبادئ REST — REST Principles';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">Stage 13 · REST API Development</span>
<h1>مبادئ REST <span class="ltr">REST Principles</span></h1>
<p class="subtitle">Resources، Endpoints، وHTTP Verbs — إزاي تصمم API يفهمه أي مطور من أول نظرة. <span class="ltr">Resources, endpoints, and HTTP verbs — designing an API any developer understands at a glance.</span></p>

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
    <div class="ar">🇪🇬 لحد دلوقتي، تعاملت مع صفحات HTML بترجع ورجعت PDO تجيب بيانات لصفحة بتتعرض في المتصفح. الدرس ده بيبدأ مسار جديد: بناء <b>API</b> — واجهة برمجية بترجع بيانات (عادةً JSON) عشان أي عميل (تطبيق موبايل، صفحة JavaScript، سيرفر تاني) يقدر يتعامل معاها، مش بس متصفح بيعرض HTML. هتفهم إزاي REST بيسمّي الأشياء (Resources)، إزاي بيستخدم أفعال HTTP (Verbs) للعمليات، وإزاي بيرجّع أكواد حالة (Status Codes) واضحة لكل نتيجة.</div>
    <div class="en">🇬🇧 So far you've dealt with HTML pages and PDO queries feeding data into a page rendered by a browser. This lesson starts a new track: building an <b>API</b> — a programmatic interface that returns data (usually JSON) so any client (a mobile app, a JavaScript frontend, another server) can consume it, not just a browser rendering HTML. You'll learn how REST names things (Resources), how it uses HTTP verbs for operations, and how it returns clear status codes for every outcome.</div>
</div>

<h2 id="understand">🧠 1) Resources: أسماء مش أفعال / Resources: Nouns, Not Verbs</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 القاعدة الأهم في REST: الـ URL بيمثّل <b>Resource</b> (مورد/شيء)، يعني اسم — مش عملية بتتنفذ، يعني مش فعل. تكتب <code>/products</code> (كل المنتجات، اسم جمع)، أو <code>/products/5</code> (منتج واحد بالـ id بتاعه). النمط الغلط اللي هتشوفه في APIs قديمة هو حاجة زي <code>/getProducts</code> أو <code>/deleteProduct?id=5</code> — هنا الفعل اتحط في الـ URL نفسه، وده بيكرر المعلومة لإن أصلًا فعل HTTP (GET/DELETE) هو اللي المفروض يقول العملية.</div>
    <div class="en">🇬🇧 REST's most important rule: a URL represents a <b>Resource</b> — a noun, not an action being performed, so not a verb. You write <code>/products</code> (all products, plural noun), or <code>/products/5</code> (one product by its id). The wrong pattern you'll see in older APIs is something like <code>/getProducts</code> or <code>/deleteProduct?id=5</code> — the verb is baked into the URL itself, which duplicates information, since the HTTP verb (GET/DELETE) is what's already supposed to say what operation happens.</div>
</div>
<div class="bi-block">
    <div class="ar">🇪🇬 ليه ده مهم عمليًا؟ لإن أي مطور شاف <code>/products</code> بيعرف على طول إنها "قايمة المنتجات"، من غير ما يقرا وثائق. الاتساق ده بيبني توقّعات: لو فيه <code>/products</code>، متوقّع يكون فيه <code>/orders</code> و<code>/customers</code> بنفس الشكل، مش <code>/getOrderList</code> فجأة.</div>
    <div class="en">🇬🇧 Why does this matter practically? Because any developer seeing <code>/products</code> instantly knows it's "the list of products" without reading docs. This consistency builds expectations: if there's a <code>/products</code>, you'd expect a matching <code>/orders</code> and <code>/customers</code>, not a sudden <code>/getOrderList</code>.</div>
</div>

<h2>2) أفعال HTTP وتحويلها لعمليات / HTTP Verbs Mapped to Actions</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 نفس الـ URL (<code>/products</code> أو <code>/products/5</code>) بيعمل حاجة مختلفة حسب فعل HTTP المستخدم:</div>
    <div class="en">🇬🇧 The same URL (<code>/products</code> or <code>/products/5</code>) does something different depending on which HTTP verb is used:</div>
</div>
<div class="ltr" style="overflow-x:auto">
<table class="sql-result-table">
<tr><th>Verb</th><th>URL Pattern</th><th>Action</th></tr>
<tr><td>GET</td><td><code>/products</code></td><td>List all products (read)</td></tr>
<tr><td>GET</td><td><code>/products/5</code></td><td>Read one product</td></tr>
<tr><td>POST</td><td><code>/products</code></td><td>Create a new product</td></tr>
<tr><td>PUT</td><td><code>/products/5</code></td><td>Update (replace) an existing product</td></tr>
<tr><td>DELETE</td><td><code>/products/5</code></td><td>Delete a product</td></tr>
</table>
</div>

<div class="bi-block">
    <div class="ar">🇪🇬 مفيش مكتبة راوتينج حقيقية هنا، لكن نقدر نكتب دالة صغيرة بتقلّد بالظبط الفكرة: تاخد فعل HTTP + مسار، وترجع أنهي Handler هيتنفذ. الكود ده حقيقي وشغال فعليًا:</div>
    <div class="en">🇬🇧 There's no real routing library here, but we can write a small function that mimics exactly this idea: take an HTTP verb + path, and return which handler would run. This code is real and actually executes:</div>
</div>

<pre><code>&lt;?php
function resolveRoute(string $method, string $path): string
{
    return match (true) {
        $method === 'GET'    &amp;&amp; $path === '/products'        =&gt; 'handleGetProducts (list all)',
        $method === 'GET'    &amp;&amp; preg_match('#^/products/\d+$#', $path) === 1 =&gt; 'handleGetProduct (one resource)',
        $method === 'POST'   &amp;&amp; $path === '/products'        =&gt; 'handleCreateProduct (create)',
        $method === 'PUT'    &amp;&amp; preg_match('#^/products/\d+$#', $path) === 1 =&gt; 'handleUpdateProduct (update)',
        $method === 'DELETE' &amp;&amp; preg_match('#^/products/\d+$#', $path) === 1 =&gt; 'handleDeleteProduct (delete)',
        default =&gt; 'NO MATCH -&gt; 404 Not Found',
    };
}

$requests = [
    ['GET', '/products'],
    ['GET', '/products/5'],
    ['POST', '/products'],
    ['PUT', '/products/5'],
    ['DELETE', '/products/5'],
    ['GET', '/getProducts'], // wrong style: a verb baked into the URL
    ['PATCH', '/products/5'],
];

foreach ($requests as [$method, $path]) {
    printf("%-6s %-15s -&gt; %s\n", $method, $path, resolveRoute($method, $path));
}</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">GET    /products       -> handleGetProducts (list all)
GET    /products/5     -> handleGetProduct (one resource)
POST   /products       -> handleCreateProduct (create)
PUT    /products/5     -> handleUpdateProduct (update)
DELETE /products/5     -> handleDeleteProduct (delete)
GET    /getProducts    -> NO MATCH -> 404 Not Found
PATCH  /products/5     -> NO MATCH -> 404 Not Found</div>

<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ حاجتين: <code>/getProducts</code> ما لقتش تطابق برغم إنها GET، لإن المسار نفسه غلط (فيه فعل جواه). و<code>PATCH</code> ما لقاش تطابق لإننا هنا عرّفنا بس الأفعال الخمسة الأساسية — في APIs حقيقية، <code>PATCH</code> بتستخدم أحيانًا للتحديث الجزئي (بعض الحقول بس) مقابل <code>PUT</code> اللي بيستبدل المورد بالكامل.</div>
    <div class="en">🇬🇧 Notice two things: <code>/getProducts</code> found no match despite being GET, because the path itself is wrong (a verb baked in). And <code>PATCH</code> found no match because we only defined the five core verbs here — in real APIs, <code>PATCH</code> is sometimes used for a partial update (just some fields) versus <code>PUT</code> which replaces the whole resource.</div>
</div>

<div class="flow-diagram">
    <div class="flow-box">Client (browser / mobile app / another server)</div>
    <div class="flow-arrow">↓ HTTP Request (verb + URL + body)</div>
    <div class="flow-box">Router — matches verb + path to a handler</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">Handler — validates input, applies business logic</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">Database (PDO / SQL)</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">HTTP Response (status code + JSON body)</div>
</div>

<h2 id="practice">💻 3) أكواد الحالة / Status Codes</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 كل استجابة HTTP بترجع رقم حالة (Status Code) بيقول للعميل إيه اللي حصل، من غير ما يضطر يقرا الرسالة نفسها. مجموعة الأرقام دي هي اللي API لازم يستخدمها صح:</div>
    <div class="en">🇬🇧 Every HTTP response returns a status code that tells the client what happened, without it needing to parse the message itself. This is the set an API needs to use correctly:</div>
</div>
<div class="ltr" style="overflow-x:auto">
<table class="sql-result-table">
<tr><th>Code</th><th>Meaning</th><th>When to use it</th></tr>
<tr><td>200 OK</td><td>Success</td><td>GET/PUT/DELETE succeeded and returns data (or confirmation)</td></tr>
<tr><td>201 Created</td><td>Resource created</td><td>POST successfully created a new resource</td></tr>
<tr><td>400 Bad Request</td><td>Malformed request</td><td>The request body/params are structurally invalid (bad JSON, wrong type)</td></tr>
<tr><td>404 Not Found</td><td>Resource missing</td><td>GET/PUT/DELETE on an id that doesn't exist</td></tr>
<tr><td>422 Unprocessable Entity</td><td>Validation failed</td><td>Well-formed request, but a required field is missing/invalid (e.g. no "name")</td></tr>
<tr><td>500 Internal Server Error</td><td>Server-side bug</td><td>An unexpected exception/crash on the server, not the client's fault</td></tr>
</table>
</div>
<div class="bi-block">
    <div class="ar">🇪🇬 الفرق بين 400 و422 غالبًا بيلخبط: 400 معناها الطلب نفسه مش مفهوم (JSON تالف مثلًا)، أما 422 معناها الطلب مفهوم كويس لكن قيمه غلط أو ناقصة (زي منتج من غير اسم). هتشوف الفرق ده بالتفصيل وبكود حقيقي في درس "استجابات الأخطاء" الجاي.</div>
    <div class="en">🇬🇧 The 400 vs 422 distinction often confuses people: 400 means the request itself couldn't be parsed (malformed JSON, say), while 422 means the request was parsed fine but its values are invalid or missing (like a product with no name). You'll see this distinction in detail with real code in the upcoming "Error Responses" lesson.</div>
</div>

<div class="bi-block">
    <div class="ar">🇪🇬 جرّب الكود بتاع الـ Router تحت — زوّد فعل أو مسار جديد وشوف النتيجة.</div>
    <div class="en">🇬🇧 Try the router code below — add a new verb or path and see the result.</div>
</div>

<div class="mini-editor-wrap">
    <textarea spellcheck="false">&lt;?php
function resolveRoute(string $method, string $path): string
{
    return match (true) {
        $method === 'GET'    &amp;&amp; $path === '/products'        =&gt; 'handleGetProducts (list all)',
        $method === 'GET'    &amp;&amp; preg_match('#^/products/\d+$#', $path) === 1 =&gt; 'handleGetProduct (one resource)',
        $method === 'POST'   &amp;&amp; $path === '/products'        =&gt; 'handleCreateProduct (create)',
        $method === 'PUT'    &amp;&amp; preg_match('#^/products/\d+$#', $path) === 1 =&gt; 'handleUpdateProduct (update)',
        $method === 'DELETE' &amp;&amp; preg_match('#^/products/\d+$#', $path) === 1 =&gt; 'handleDeleteProduct (delete)',
        default =&gt; 'NO MATCH -&gt; 404 Not Found',
    };
}

$requests = [
    ['GET', '/products'],
    ['GET', '/products/5'],
    ['POST', '/products'],
    ['PUT', '/products/5'],
    ['DELETE', '/products/5'],
    ['GET', '/getProducts'],
    ['PATCH', '/products/5'],
];

foreach ($requests as [$method, $path]) {
    printf("%-6s %-15s -&gt; %s\n", $method, $path, resolveRoute($method, $path));
}</textarea>
    <div class="mini-toolbar">
        <button class="mini-run-btn">▶ شغّل / Run</button>
        <span class="mini-status"></span>
    </div>
    <div class="output-box">— لسه متشغلش / not run yet —</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="noun">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">أنهي URL أقرب لأسلوب REST الصحيح؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Which URL best follows correct REST style?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="verb"> <code>/getAllProducts</code></label>
        <label><input type="radio" name="q1" value="noun"> <code>/products</code></label>
        <label><input type="radio" name="q1" value="verb2"> <code>/deleteProduct?id=5</code></label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="post">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">عايز تنشئ منتج جديد على <code>/products</code>، أنهي فعل HTTP تستخدم؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">To create a new product at <code>/products</code>, which HTTP verb do you use?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="get"> GET</label>
        <label><input type="radio" name="q2" value="post"> POST</label>
        <label><input type="radio" name="q2" value="delete"> DELETE</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="201">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">عملية POST نجحت وأنشأت منتج جديد، أنهي Status Code الأنسب؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">A POST succeeds and creates a new product — which status code fits best?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="200"> 200 OK</label>
        <label><input type="radio" name="q3" value="201"> 201 Created</label>
        <label><input type="radio" name="q3" value="404"> 404 Not Found</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="notfound">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">في مثال <code>resolveRoute</code> فوق، <code>GET /getProducts</code> رجّع "NO MATCH" ليه بالظبط؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">In the <code>resolveRoute</code> example above, why exactly did <code>GET /getProducts</code> return "NO MATCH"?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="notfound"> المسار نفسه مش مطابق لأي pattern معرّف (فيه فعل جواه بدل ما يكون اسم مورد)</label>
        <label><input type="radio" name="q4" value="wrongverb"> GET مش فعل HTTP صحيح</label>
        <label><input type="radio" name="q4" value="bug"> فيه خطأ برمجي في الدالة</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ وسّع الـ Router / Extend the Router</h3>
    <div class="ar">🇪🇬 في <a href="../playground/index.php">محرر الكود</a> (أو المحرر المصغّر فوق): زوّد <code>resolveRoute</code> بحالة سادسة لـ <code>PATCH /products/{id}</code> ترجع <code>'handlePatchProduct (partial update)'</code>، وجرّب طلب زي <code>['PATCH', '/products/9']</code> وتأكد إنه بقى بيطابق صح.</div>
    <div class="en">🇬🇧 In the <a href="../playground/index.php">Playground</a> (or the mini editor above): add a sixth case to <code>resolveRoute</code> for <code>PATCH /products/{id}</code> returning <code>'handlePatchProduct (partial update)'</code>, and test a request like <code>['PATCH', '/products/9']</code> to confirm it now matches correctly.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 دلوقتي وانت فاهم Resources، Verbs، وStatus Codes، هتبني في الدرس الجاي أول API حقيقي من الصفر: <code>/api/products</code> بعمليات GET/POST/DELETE فعلية شغالة على جدول حقيقي.</div>
    <div class="en">🇬🇧 Now that you understand Resources, Verbs, and Status Codes, the next lesson builds your first real API from scratch: <code>/api/products</code> with real, working GET/POST/DELETE operations against a real table.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>الـ URL بيمثّل Resource (اسم/مورد) زي <code>/products</code> — مش فعل زي <code>/getProducts</code>.</li>
        <li>فعل HTTP هو اللي بيحدد العملية: GET=قراءة، POST=إنشاء، PUT=تحديث كامل، DELETE=حذف.</li>
        <li>Status Codes بتوصّل النتيجة بدون قراءة الرسالة: 200 نجاح، 201 تم الإنشاء، 400 طلب غير مفهوم، 404 المورد مش موجود، 422 فشل تحقق، 500 خطأ سيرفر.</li>
        <li>الرحلة الكاملة: Client → HTTP Request → Router → Handler → Database → HTTP Response.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="../index.php">← الرئيسية / Home</a>
    <a href="rest-products-api-project.php">المرحلة الجاية / Next: Products REST API Project →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
