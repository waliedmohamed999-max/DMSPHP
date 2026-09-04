<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'mvc-explained';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'شرح MVC — MVC Explained';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">Stage 12 · Clean Architecture &amp; MVC</span>
<h1>شرح MVC: Model, View, Controller <span class="ltr">MVC Explained</span></h1>
<p class="subtitle">ليه بنفصل البيانات عن العرض عن منطق التحكم — بمثال حقيقي قبل وبعد. <span class="ltr">Why we separate data from presentation from control logic — with a real before-and-after example.</span></p>

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
    <div class="ar">🇪🇬 لحد دلوقتي كتبت كود بيعمل كل حاجة في نفس المكان: يقرأ من قاعدة البيانات، يقرر إيه اللي يحصل، ويطبع HTML — كل ده في نفس السطور. الدرس ده هيوريك ليه الخلطة دي بتبقى مشكلة لما المشروع يكبر، وإزاي فصل المسؤوليات لـ Model وView وController بيحل المشكلة دي فعليًا — بكود Model→Controller→View حقيقي متنفّذ، مش بس كلام نظري.</div>
    <div class="en">🇬🇧 So far you've written code that does everything in one place: reads from the database, decides what happens, and prints HTML — all in the same lines. This lesson shows why that mix becomes a real problem as a project grows, and how splitting responsibilities into Model, View, and Controller actually fixes it — with a real, executed Model→Controller→View chain, not just theory.</div>
</div>

<h2 id="understand">🧠 قبل: كل حاجة في ملف واحد / Before: Everything in One File</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 ده نمط شائع جدًا في مشاريع المبتدئين — "Spaghetti Code": استعلام SQL، منطق قرار (هل فيه بوستات؟)، وHTML كلهم متداخلين في نفس السطور. المشكلة مش إن الكود "غلط" — هو فعلًا بيشتغل — المشكلة إنه صعب تتبعه، صعب تختبره من غير متصفح، وأي تعديل في العرض ممكن يكسر منطق البيانات بالغلط.</div>
    <div class="en">🇬🇧 This is an extremely common beginner pattern — "spaghetti code": an SQL query, decision logic (are there posts?), and HTML all tangled in the same lines. The problem isn't that it's "wrong" — it genuinely works — the problem is it's hard to follow, impossible to test without a browser, and a presentation tweak can accidentally break the data logic.</div>
</div>

<pre><code>&lt;?php
// posts_page.php — Database + business logic + HTML, all tangled together
$pdo = new PDO('mysql:host=localhost;dbname=blog', 'root', '');
$userId = (int) $_GET['user_id'];

$stmt = $pdo->prepare('SELECT title, views FROM posts WHERE user_id = ? ORDER BY id DESC LIMIT 5');
$stmt->execute([$userId]);
$posts = $stmt->fetchAll();

echo "&lt;html&gt;&lt;body&gt;";
echo "&lt;h1&gt;Posts&lt;/h1&gt;";
if (count($posts) === 0) {
    echo "&lt;p&gt;No posts found.&lt;/p&gt;";
} else {
    echo "&lt;ul&gt;";
    foreach ($posts as $p) {
        // HTML-building logic mixed with the loop that reads the DB result
        echo "&lt;li&gt;" . $p['title'] . " (" . $p['views'] . " views)&lt;/li&gt;";
    }
    echo "&lt;/ul&gt;";
}
echo "&lt;/body&gt;&lt;/html&gt;";</code></pre>
<div class="bi-block">
    <div class="ar">🇪🇬 عايز تختبر إن منطق "لو مفيش بوستات اطبع رسالة" شغال صح؟ لازم تفتح متصفح، تحط <code>?user_id=</code> بقيمة مالهاش بوستات، وتقرا الـ HTML بعينك. مفيش طريقة تختبر المنطق ده لوحده من غير قاعدة بيانات ومن غير HTML.</div>
    <div class="en">🇬🇧 Want to verify the "if there are no posts, print a message" logic works? You have to open a browser, pass a <code>user_id</code> with no posts, and read the HTML by eye. There's no way to test that logic in isolation, without a database and without HTML.</div>
</div>

<h2>بعد: Model + Controller + View منفصلين / After: Separated Model, Controller, View</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>Model</b> — كلاس مسؤول بس عن جلب البيانات (استعلام SQL جواه، ومحدش برة يحتاج يعرف تفاصيله). <b>View</b> — دالة بتاخد بيانات (array) وترجع نص HTML — مش بتطبع، بترجع، وده اللي بيخليها قابلة للاختبار (تقدر تتأكد من الـ string اللي رجعته من غير متصفح). <b>Controller</b> — الوسيط: بيسأل الـ Model عن البيانات، وبيقرر يديها لأنهي View. الكود تحت حقيقي 100% — الـ Model بيتصل فعليًا بنفس الـ Schema اللي في <a href="../db-sandbox/index.php">Database Playground</a> بتاع المنصة، والـ View بترجع HTML string حقيقي بنطبعه.</div>
    <div class="en">🇬🇧 <b>Model</b> — a class responsible only for fetching data (the SQL query lives inside it, and nobody outside needs to know its details). <b>View</b> — a function that takes data (an array) and returns an HTML string — it doesn't echo, it returns, which is exactly what makes it testable (you can verify the returned string with no browser). <b>Controller</b> — the middleman: it asks the Model for data, and decides which View to hand it to. The code below is 100% real — the Model genuinely connects to the same schema powering this platform's <a href="../db-sandbox/index.php">Database Playground</a>, and the View returns a real HTML string we echo.</div>
</div>

<div class="flow-diagram">
    <div class="flow-box">Request</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">Router</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">Controller</div>
    <div class="flow-arrow">↓ asks for data</div>
    <div class="flow-box">Model</div>
    <div class="flow-arrow">↓ SQL</div>
    <div class="flow-box">Database</div>
    <div class="flow-arrow">↑ rows</div>
    <div class="flow-box">Model returns array</div>
    <div class="flow-arrow">↓ Controller passes array to</div>
    <div class="flow-box">View (returns HTML string)</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">Response</div>
</div>

<pre><code>&lt;?php
require __DIR__ . '/../db-sandbox/schema.php';

// ---- Model: owns data access, knows nothing about HTML ----
class PostModel
{
    public function __construct(private PDO $pdo) {}

    public function recentByUser(int $userId, int $limit = 5): array
    {
        $stmt = $this->pdo->prepare(
            'SELECT title, views FROM posts WHERE user_id = ? ORDER BY id DESC LIMIT ?'
        );
        $stmt->bindValue(1, $userId, PDO::PARAM_INT);
        $stmt->bindValue(2, $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

// ---- View: a function that takes data and returns an HTML string ----
function render_posts_view(array $posts): string
{
    if (!$posts) {
        return "&lt;ul&gt;\n  &lt;li&gt;No posts found.&lt;/li&gt;\n&lt;/ul&gt;";
    }
    $html = "&lt;ul&gt;\n";
    foreach ($posts as $p) {
        $html .= "  &lt;li&gt;{$p['title']} ({$p['views']} views)&lt;/li&gt;\n";
    }
    $html .= "&lt;/ul&gt;";
    return $html;
}

// ---- Controller: orchestrates Model -> View, has no SQL and no HTML of its own ----
class PostController
{
    public function __construct(private PostModel $model) {}

    public function index(int $userId): string
    {
        $posts = $this->model->recentByUser($userId);
        return render_posts_view($posts);
    }
}

// ---- Actually run the full chain ----
$pdo = build_sandbox_pdo();
$controller = new PostController(new PostModel($pdo));

echo "Request: GET /users/1/posts" . PHP_EOL;
echo $controller->index(1) . PHP_EOL;

echo PHP_EOL . "Request: GET /users/3/posts" . PHP_EOL;
echo $controller->index(3) . PHP_EOL;

echo PHP_EOL . "Request: GET /users/99/posts (no posts)" . PHP_EOL;
echo $controller->index(99) . PHP_EOL;</code></pre>
<h3 id="practice">💻 الناتج الفعلي (تم تنفيذه فعليًا) / Actual output (really executed)</h3>
<div class="output-box">Request: GET /users/1/posts
&lt;ul&gt;
  &lt;li&gt;Why Prepared Statements Matter (340 views)&lt;/li&gt;
  &lt;li&gt;Getting Started with PDO (120 views)&lt;/li&gt;
&lt;/ul&gt;

Request: GET /users/3/posts
&lt;ul&gt;
  &lt;li&gt;Understanding JOINs (175 views)&lt;/li&gt;
&lt;/ul&gt;

Request: GET /users/99/posts (no posts)
&lt;ul&gt;
  &lt;li&gt;No posts found.&lt;/li&gt;
&lt;/ul&gt;</div>

<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ حاجتين: أولًا، <code>$controller->index(1)</code> رجّعت أحدث بوستين لأحمد (id=1) مرتبين من الأحدث للأقدم — بالظبط زي ما الـ SQL بيقول <code>ORDER BY id DESC LIMIT 5</code>. ثانيًا، <code>render_posts_view()</code> اتنفذت فعليًا 3 مرات برجعت 3 نصوص HTML مختلفة — تقدر تتأكد من كل نص لوحده (زي Unit Test) من غير ما تحتاج متصفح أو حتى قاعدة بيانات حقيقية، لإن الدالة بتاخد array عادي وترجع string عادي.</div>
    <div class="en">🇬🇧 Notice two things: first, <code>$controller->index(1)</code> returned Ahmed's (id=1) two most recent posts, newest first — exactly what <code>ORDER BY id DESC LIMIT 5</code> says. Second, <code>render_posts_view()</code> genuinely ran 3 times and returned 3 different HTML strings — you can verify each string on its own (like a Unit Test) with no browser and not even a real database, because the function just takes a plain array and returns a plain string.</div>
</div>

<h2>ليه ده أفضل فعليًا / Why This Is Actually Better</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 لو حبيت تغيّر شكل الـ HTML لجدول بدل قائمة، تلمس <code>render_posts_view()</code> بس — <code>PostModel</code> و<code>PostController</code> ميتغيّروش سطر واحد. لو غيّرت الاستعلام (زي إضافة فلتر تاريخ)، تلمس <code>PostModel</code> بس. كل جزء بيتغيّر لسبب واحد بس — ده بالظبط أساس مبدأ Single Responsibility اللي هتشوفه بعمق في <a href="clean-code-principles.php">درس الكود النظيف</a>.</div>
    <div class="en">🇬🇧 Want the HTML to become a table instead of a list? You only touch <code>render_posts_view()</code> — <code>PostModel</code> and <code>PostController</code> don't change a single line. Want to change the query (e.g. add a date filter)? You only touch <code>PostModel</code>. Each piece changes for exactly one reason — this is exactly the Single Responsibility idea you'll see in depth in the <a href="clean-code-principles.php">Clean Code lesson</a>.</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="view">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">في مثال <code>render_posts_view()</code> فوق، ليه الدالة بترجع string بدل ما تعمل <code>echo</code> مباشرة؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Why does <code>render_posts_view()</code> return a string instead of echoing directly?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="fast"> عشان الكود يشتغل أسرع</label>
        <label><input type="radio" name="q1" value="view"> عشان تقدر تتأكد من النتيجة (تختبرها) من غير متصفح أو echo مباشر</label>
        <label><input type="radio" name="q1" value="required"> PHP بيرفض echo جوه دالة</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="model">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">لو عايز تضيف فلتر جديد للاستعلام (زي بوستات آخر 30 يوم بس)، أنهي جزء تلمسه؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">To add a new query filter (e.g. only posts from the last 30 days), which part do you touch?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="model"> PostModel</label>
        <label><input type="radio" name="q2" value="view"> render_posts_view()</label>
        <label><input type="radio" name="q2" value="controller"> PostController</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="empty">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">حسب الناتج الفعلي فوق، <code>$controller->index(99)</code> رجّعت إيه بالظبط؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Based on the actual output above, what did <code>$controller->index(99)</code> return exactly?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="error"> Fatal Error لإن المستخدم 99 مش موجود</label>
        <label><input type="radio" name="q3" value="empty"> نص HTML فيه "No posts found."، لإن الاستعلام رجّع مصفوفة فاضية</label>
        <label><input type="radio" name="q3" value="null"> null</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="controller">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">مين المسؤول عن "طلب البيانات من Model وتحديد أنهي View هيستخدمها" في المثال فوق؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Who's responsible for "asking the Model for data and deciding which View uses it" in the example above?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="model"> PostModel</label>
        <label><input type="radio" name="q4" value="controller"> PostController</label>
        <label><input type="radio" name="q4" value="db"> قاعدة البيانات نفسها</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ زوّد View جديدة / Add a New View</h3>
    <div class="ar">🇪🇬 في <a href="../playground/index.php">محرر الكود</a>، خد نفس <code>PostModel</code> و<code>PostController</code> فوق واكتب دالة View جديدة اسمها <code>render_posts_table(array $posts): string</code> ترجع نفس البيانات كـ <code>&lt;table&gt;</code> بدل <code>&lt;ul&gt;</code> — من غير ما تلمس <code>PostModel</code> ولا <code>PostController</code> ولا سطر واحد.</div>
    <div class="en">🇬🇧 In the <a href="../playground/index.php">Playground</a>, take the same <code>PostModel</code> and <code>PostController</code> above and write a new View function called <code>render_posts_table(array $posts): string</code> that returns the same data as an <code>&lt;table&gt;</code> instead of a <code>&lt;ul&gt;</code> — without touching <code>PostModel</code> or <code>PostController</code> by a single line.</div>
</div>

<div class="exercise-box">
    <h3>✍️ تمرين إضافي / Extra Exercise</h3>
    <div class="ar">🇪🇬 ارجع لمثال "قبل" فوق، وحوّله بنفسك خطوة بخطوة لنفس شكل Model/Controller/View — ده بالظبط التمرين اللي هتعمله بشكل أكبر في <a href="mvc-refactor-project.php">مشروع إعادة الهيكلة</a> آخر المسار ده.</div>
    <div class="en">🇬🇧 Go back to the "Before" example above and refactor it yourself, step by step, into the same Model/Controller/View shape — exactly the exercise you'll do at a larger scale in the <a href="mvc-refactor-project.php">Refactoring Project</a> at the end of this track.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 دلوقتي عندك Model وView حقيقيين، لكن لسه ناقص جزء واحد: مين بيقرر إن <code>GET /users/1/posts</code> هو اللي يستدعي <code>PostController::index</code> أصلًا؟ ده بالظبط موضوع الدرس الجاي: بناء Router من الصفر.</div>
    <div class="en">🇬🇧 You now have a real Model and View, but one piece is still missing: who decides that <code>GET /users/1/posts</code> is what calls <code>PostController::index</code> in the first place? That's exactly the next lesson: building a Router from scratch.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>"Spaghetti Code" = SQL + منطق + HTML متداخلين في نفس الملف — بيشتغل، بس صعب يتغيّر أو يتاختبر.</li>
        <li>Model = بيانات فقط (استعلام SQL جواه). View = دالة بترجع HTML string، مبتطبعش. Controller = الوسيط بينهم.</li>
        <li>الفصل ده بيخلي كل جزء يتغيّر لوحده من غير ما يكسر التاني، وبيخلي الـ View قابلة للاختبار من غير متصفح.</li>
        <li>الرحلة الكاملة: Request → Router → Controller → Model → Database → View → Response.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="../index.php">← الرئيسية / Home</a>
    <a href="building-a-router.php">المرحلة الجاية / Next: Building a Router →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
