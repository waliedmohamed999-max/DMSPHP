<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'mvc-refactor-project';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'مشروع: إعادة هيكلة لـ MVC — Refactoring into MVC';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">Stage 12 · Clean Architecture &amp; MVC</span>
<h1>🚀 مشروع: إعادة هيكلة لـ MVC <span class="ltr">Project: Refactoring into MVC</span></h1>
<p class="subtitle">تاخد كود متلخبط وتقسّمه لـ Router/Controller/Model/View حقيقيين. <span class="ltr">Take tangled code and split it into a real Router/Controller/Model/View.</span></p>

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
    <div class="ar">🇪🇬 ده الدرس اللي بيربط الـ 3 اللي فاتوا مع بعض: <a href="mvc-explained.php">MVC</a>، <a href="building-a-router.php">Router</a>، و<a href="clean-code-principles.php">DRY/KISS/YAGNI</a>. هتاخد تطبيق صغير متلخبط (list-posts + create-post في ملف واحد)، وتحوّله بنفسك لـ Model/Controller/View/Router حقيقيين — وهتشوف الحل المرجعي بتاعي كامل ومتنفذ فعليًا.</div>
    <div class="en">🇬🇧 This is the lesson that ties the previous three together: <a href="mvc-explained.php">MVC</a>, <a href="building-a-router.php">the Router</a>, and <a href="clean-code-principles.php">DRY/KISS/YAGNI</a>. You'll take a small tangled app (list-posts + create-post in one file) and refactor it yourself into a real Model/Controller/View/Router — and see my complete, actually-executed reference solution.</div>
</div>

<h2 id="challenge">🛠️ التحدي: طبّق التطبيق ده متلخبط / The Challenge: This App, Tangled</h2>
<div class="challenge-box">
    <h3>🛠️ Mini Blog — قبل إعادة الهيكلة / Mini Blog — Before Refactoring</h3>
    <div class="ar">🇪🇬 الكود تحت بيعرض قائمة بوستات، وبيسمح بإضافة بوست جديد — كل ده جوه <code>if/else</code> واحدة بتحدد حسب الـ Method، والاستعلامات والـ HTML متداخلين مع بعض. مهمتك: قسّمه لـ <code>PostModel</code> (بيانات)، دوال View (HTML)، <code>PostController</code> (تنسيق)، و<code>Router</code> (توجيه) — بنفس شكل الدروس اللي فاتت. جرّب تعمل ده بنفسك في <a href="../playground/index.php">محرر الكود</a> قبل ما تشوف الحل تحت.</div>
    <div class="en">🇬🇧 The code below lists posts and lets you add a new one — all inside one <code>if/else</code> branching on the Method, with queries and HTML tangled together. Your task: split it into a <code>PostModel</code> (data), View functions (HTML), a <code>PostController</code> (orchestration), and a <code>Router</code> (dispatching) — matching the shape of the previous lessons. Try this yourself in the <a href="../playground/index.php">Playground</a> before looking at the solution below.</div>
    <pre><code>&lt;?php
// mini_blog.php — everything tangled together
$pdo = new PDO('mysql:host=localhost;dbname=blog', 'root', '');
$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'GET') {
    $stmt = $pdo->query('SELECT id, title, views FROM posts ORDER BY id');
    $posts = $stmt->fetchAll();
    echo "&lt;ul&gt;";
    foreach ($posts as $p) {
        echo "&lt;li&gt;#{$p['id']} {$p['title']} ({$p['views']} views)&lt;/li&gt;";
    }
    echo "&lt;/ul&gt;";
} elseif ($method === 'POST') {
    $title = $_POST['title'] ?? '';
    if (trim($title) === '') {
        echo "&lt;p&gt;Error: title is required.&lt;/p&gt;";
    } else {
        $stmt = $pdo->prepare('INSERT INTO posts (user_id, title, body, views, created_at) VALUES (1, ?, ?, 0, ?)');
        $stmt->execute([$title, $_POST['body'] ?? '', date('Y-m-d')]);
        $id = $pdo->lastInsertId();
        echo "&lt;p&gt;Created post #$id: \"$title\"&lt;/p&gt;";
    }
}</code></pre>
</div>

<h2 id="understand">🧠 لماذا هذا مشكلة / Why This Is a Problem</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 نفس مشاكل درس MVC الأول: مفيش طريقة تختبر "هل التحقق من العنوان الفاضي شغال؟" من غير ما تشغّل استعلام حقيقي وتطبع HTML. ولو عايز تضيف مسار تالت (زي <code>DELETE /posts/{id}</code>)، هتضيف <code>elseif</code> جديدة في نفس الملف الطويل بدل توجيه واضح.</div>
    <div class="en">🇬🇧 Same problems as the first MVC lesson: there's no way to test "does the empty-title validation work?" without running a real query and printing HTML. And adding a third route (like <code>DELETE /posts/{id}</code>) means another <code>elseif</code> in the same growing file instead of clear dispatching.</div>
</div>

<h2 id="practice">💻 الحل المرجعي — منفذ فعليًا بالكامل / The Reference Solution — Fully Executed</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 الكود تحت هو حل حقيقي كامل: <code>PostModel</code> بيتصل فعليًا بالـ Schema بتاعة الـ <a href="../db-sandbox/index.php">Database Playground</a>، دالتين View بترجعوا HTML، <code>PostController</code> بينسّق، والـ <code>Router</code> من الدرس التاني بيوصل كل حاجة. اتنفذ فعليًا من الأول للآخر: <code>GET /posts</code> قبل الإضافة، <code>POST /posts</code>، وبعدين <code>GET /posts</code> تاني لإثبات إن البوست الجديد اتضاف.</div>
    <div class="en">🇬🇧 The code below is a complete, real solution: a <code>PostModel</code> genuinely connecting to the <a href="../db-sandbox/index.php">Database Playground</a>'s schema, two View functions returning HTML, a <code>PostController</code> orchestrating, and the Router from the previous lesson wiring everything. It was actually run end-to-end: <code>GET /posts</code> before adding, <code>POST /posts</code>, then <code>GET /posts</code> again to prove the new post was really added.</div>
</div>

<pre><code>&lt;?php
require __DIR__ . '/../db-sandbox/schema.php';

// ---- Router (same shape as the Router lesson) ----
class Router
{
    private array $routes = [];

    public function get(string $path, callable $handler): void
    {
        $this->routes['GET'][$path] = $handler;
    }

    public function post(string $path, callable $handler): void
    {
        $this->routes['POST'][$path] = $handler;
    }

    public function dispatch(string $method, string $uri): array
    {
        $handler = $this->routes[$method][$uri] ?? null;
        if (!$handler) {
            return ['status' => 404, 'body' => ['error' => 'Route not found']];
        }
        return $handler();
    }
}

// ---- Model ----
class PostModel
{
    public function __construct(private PDO $pdo) {}

    public function all(): array
    {
        return $this->pdo->query('SELECT id, title, views FROM posts ORDER BY id')->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create(int $userId, string $title, string $body): array
    {
        $stmt = $this->pdo->prepare(
            'INSERT INTO posts (user_id, title, body, views, created_at) VALUES (?, ?, ?, 0, ?)'
        );
        $stmt->execute([$userId, $title, $body, date('Y-m-d')]);
        $id = (int) $this->pdo->lastInsertId();

        $find = $this->pdo->prepare('SELECT id, title, views FROM posts WHERE id = ?');
        $find->execute([$id]);
        return $find->fetch(PDO::FETCH_ASSOC);
    }
}

// ---- View ----
function render_post_list(array $posts): string
{
    $html = "&lt;ul&gt;\n";
    foreach ($posts as $p) {
        $html .= "  &lt;li&gt;#{$p['id']} {$p['title']} ({$p['views']} views)&lt;/li&gt;\n";
    }
    $html .= "&lt;/ul&gt;";
    return $html;
}

function render_post_created(array $post): string
{
    return "&lt;p&gt;Created post #{$post['id']}: \"{$post['title']}\"&lt;/p&gt;";
}

// ---- Controller ----
class PostController
{
    public function __construct(private PostModel $model) {}

    public function index(): array
    {
        $posts = $this->model->all();
        return ['status' => 200, 'body' => render_post_list($posts)];
    }

    public function store(int $userId, string $title, string $body): array
    {
        if (trim($title) === '') {
            return ['status' => 422, 'body' => '&lt;p&gt;Error: title is required.&lt;/p&gt;'];
        }
        $post = $this->model->create($userId, $title, $body);
        return ['status' => 201, 'body' => render_post_created($post)];
    }
}

// ---- Wiring it all through the Router ----
$pdo = build_sandbox_pdo();
$controller = new PostController(new PostModel($pdo));
$router = new Router();

$router->get('/posts', fn() => $controller->index());
$router->post('/posts', fn() => $controller->store(1, 'My New Post', 'Some content about MVC.'));

echo "GET /posts (before creating)" . PHP_EOL;
$r1 = $router->dispatch('GET', '/posts');
echo "HTTP {$r1['status']}" . PHP_EOL;
echo $r1['body'] . PHP_EOL . PHP_EOL;

echo "POST /posts" . PHP_EOL;
$r2 = $router->dispatch('POST', '/posts');
echo "HTTP {$r2['status']}" . PHP_EOL;
echo $r2['body'] . PHP_EOL . PHP_EOL;

echo "GET /posts (after creating)" . PHP_EOL;
$r3 = $router->dispatch('GET', '/posts');
echo "HTTP {$r3['status']}" . PHP_EOL;
echo $r3['body'] . PHP_EOL;</code></pre>
<h3>الناتج الفعلي (تم تنفيذه فعليًا) / Actual output (really executed)</h3>
<div class="output-box">GET /posts (before creating)
HTTP 200
&lt;ul&gt;
  &lt;li&gt;#1 Getting Started with PDO (120 views)&lt;/li&gt;
  &lt;li&gt;#2 Why Prepared Statements Matter (340 views)&lt;/li&gt;
  &lt;li&gt;#3 My First REST API (85 views)&lt;/li&gt;
  &lt;li&gt;#4 Database Design 101 (210 views)&lt;/li&gt;
  &lt;li&gt;#5 Debugging a Tricky Bug (60 views)&lt;/li&gt;
  &lt;li&gt;#6 Understanding JOINs (175 views)&lt;/li&gt;
  &lt;li&gt;#7 Sessions vs Cookies (95 views)&lt;/li&gt;
  &lt;li&gt;#8 Indexing for Performance (300 views)&lt;/li&gt;
&lt;/ul&gt;

POST /posts
HTTP 201
&lt;p&gt;Created post #9: "My New Post"&lt;/p&gt;

GET /posts (after creating)
HTTP 200
&lt;ul&gt;
  &lt;li&gt;#1 Getting Started with PDO (120 views)&lt;/li&gt;
  &lt;li&gt;#2 Why Prepared Statements Matter (340 views)&lt;/li&gt;
  &lt;li&gt;#3 My First REST API (85 views)&lt;/li&gt;
  &lt;li&gt;#4 Database Design 101 (210 views)&lt;/li&gt;
  &lt;li&gt;#5 Debugging a Tricky Bug (60 views)&lt;/li&gt;
  &lt;li&gt;#6 Understanding JOINs (175 views)&lt;/li&gt;
  &lt;li&gt;#7 Sessions vs Cookies (95 views)&lt;/li&gt;
  &lt;li&gt;#8 Indexing for Performance (300 views)&lt;/li&gt;
  &lt;li&gt;#9 My New Post (0 views)&lt;/li&gt;
</div>

<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ إن <code>#9 My New Post</code> ظهرت في الـ <code>GET</code> التاني بس مش الأول — دليل حقيقي إن الـ <code>INSERT</code> جوه <code>PostModel::create()</code> اتنفذ فعليًا على نفس الـ PDO connection، مش مجرد نص ثابت. ولاحظ إن <code>PostController::store()</code> بيتحقق من العنوان الفاضي قبل ما يكلم الـ Model خالص — التحقق ده منطق Controller (قرار)، مش منطق Model (بيانات).</div>
    <div class="en">🇬🇧 Notice <code>#9 My New Post</code> only appears in the second <code>GET</code>, not the first — real proof that the <code>INSERT</code> inside <code>PostModel::create()</code> genuinely ran against the same PDO connection, not just hardcoded text. Also notice <code>PostController::store()</code> validates the empty title before ever talking to the Model — that's Controller logic (a decision), not Model logic (data).</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="controller">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">التحقق من إن العنوان مش فاضي (<code>if (trim($title) === '')</code>) اتحط في <code>PostController::store()</code>، مش في <code>PostModel</code>. ليه؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">The empty-title check lives in <code>PostController::store()</code>, not <code>PostModel</code>. Why?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="controller"> ده قرار عمل (validate/reject) قبل الوصول لقاعدة البيانات، مش تخزين بيانات</label>
        <label><input type="radio" name="q1" value="random"> مفيش سبب معيّن، المكانين سواء</label>
        <label><input type="radio" name="q1" value="faster"> عشان يشتغل أسرع</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="proof">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">إيه الدليل في الناتج الفعلي فوق إن <code>POST /posts</code> فعليًا ضاف صف جديد في قاعدة البيانات؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What's the evidence in the actual output above that <code>POST /posts</code> really added a new database row?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="proof"> #9 My New Post ظهرت في الـ GET التاني بس، مش الأول</label>
        <label><input type="radio" name="q2" value="status"> HTTP 201 لوحده كافي كدليل</label>
        <label><input type="radio" name="q2" value="none"> مفيش دليل حقيقي في الناتج</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="mixed">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">إيه أكبر مشكلة في نسخة "قبل" (mini_blog.php المتلخبطة) بالمقارنة بالحل المرجعي؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What's the biggest problem with the "Before" tangled version compared to the reference solution?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="mixed"> استعلام SQL ومنطق القرار وHTML كلهم متداخلين في نفس الـ if/elseif</label>
        <label><input type="radio" name="q3" value="slow"> بتشتغل أبطأ فعليًا</label>
        <label><input type="radio" name="q3" value="wrong"> بترجع نتيجة غلط</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="router">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">مين اللي قرر إن <code>POST /posts</code> يستدعي <code>$controller-&gt;store(...)</code> بالظبط في الحل المرجعي؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">In the reference solution, who decides that <code>POST /posts</code> calls <code>$controller-&gt;store(...)</code> exactly?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="router"> الـ Router، عن طريق <code>$router-&gt;post('/posts', ...)</code></label>
        <label><input type="radio" name="q4" value="model"> PostModel</label>
        <label><input type="radio" name="q4" value="view"> render_post_created()</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2>🛠️ التحدي: كمّل الـ CRUD / The Challenge: Complete the CRUD</h2>
<div class="challenge-box">
    <h3>🛠️ زوّد <code>DELETE /posts/{id}</code></h3>
    <div class="ar">🇪🇬 في <a href="../playground/index.php">محرر الكود</a>، خد الحل المرجعي فوق وزوّد: method جديدة <code>delete(int $id): bool</code> في <code>PostModel</code>، method <code>destroy(int $id)</code> في <code>PostController</code> ترجع 200 لو الحذف نجح أو 404 لو الـ id مش موجود، ومسار جديد في الـ Router. تأكد إن <code>GET /posts</code> بعد الحذف مبقاش فيها البوست المحذوف.</div>
    <div class="en">🇬🇧 In the <a href="../playground/index.php">Playground</a>, take the reference solution above and add: a new <code>delete(int $id): bool</code> method on <code>PostModel</code>, a <code>destroy(int $id)</code> method on <code>PostController</code> returning 200 on success or 404 if the id doesn't exist, and a new route on the Router. Confirm <code>GET /posts</code> no longer lists the deleted post afterward.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 كل حاجة بنيتها في المرحلة دي (MVC، Router، DRY/KISS/YAGNI، وإعادة الهيكلة الكاملة) هي بالظبط الأساس اللي مشروع التخرج (Task Manager) مبني عليه. المرحلة الجاية بتتحول من "بنية الكود" لموضوع مختلف تمامًا لكن مهم بنفس القدر: إزاي تاخد الكود ده وتنشره على سيرفر حقيقي يقدر أي حد يوصله — Git وGitHub، Linux، رحلة النشر، وDocker.</div>
    <div class="en">🇬🇧 Everything built in this stage (MVC, the Router, DRY/KISS/YAGNI, and this full refactor) is exactly the foundation the Capstone Task Manager is built on. The next stage shifts from "code structure" to something just as important: how to take this code and actually deploy it to a real server anyone can reach — Git and GitHub, Linux, the deployment journey, and Docker.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>نفس منطق "قبل" المتلخبط، بعد التقسيم بقى: Model (بيانات) + View (HTML) + Controller (قرارات) + Router (توجيه).</li>
        <li>الدليل إن التقسيم شغال فعليًا: بوست جديد اتضاف فعليًا وظهر في GET التالي — مش مجرد تعريف كلاسات.</li>
        <li>Controller هو مكان قرارات التحقق (زي "العنوان فاضي؟")، مش Model.</li>
        <li>Router هو نقطة الدخول الوحيدة اللي بتقرر أنهي Controller method يتنفّذ لكل (Method + Path).</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="clean-code-principles.php">← المرحلة السابقة</a>
    <a href="git-github-basics.php">المرحلة الجاية / Next: Git &amp; GitHub Basics →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
