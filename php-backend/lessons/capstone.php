<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'capstone';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'مشروع التخرج — Capstone Project';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">مشروع التخرج / Capstone</span>
<h1>مشروع التخرج <span class="ltr">Capstone Project</span></h1>
<p class="subtitle">مفيش درس جديد هنا — دلوقتي المطلوب إنك تجمع كل حاجة اتعلمتها من المرحلة 0 لحد 6 في مشروع Backend واحد متكامل. ده الفرق بين "فهمت المفاهيم" و"قادر تبني بيها حاجة فعلية".</p>

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
    <div class="ar">🇪🇬 تبني REST API كامل لإدارة "مهام" (Task Manager) — فيه تسجيل مستخدمين حقيقي، عمليات CRUD متصلة بقاعدة بيانات، بنية MVC منظمة، وحماية من أشهر الثغرات. المشروع ده هو دليلك إنك جاهز تشتغل Backend Developer.</div>
    <div class="en">🇬🇧 Build a complete REST API for managing "Tasks" — with real user registration, CRUD operations backed by a database, an organized MVC structure, and protection against the most common vulnerabilities. This project is your proof that you're ready to work as a Backend Developer.</div>
</div>

<h2 id="understand">🧠 المواصفات المطلوبة / Requirements</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 المشروع لازم يغطي كل نقطة من دول، وكل واحدة مربوطة بمرحلة اتعلمتها قبل كده:</div>
</div>

<div class="recap-box">
    <h3>📋 قائمة المتطلبات / Checklist</h3>
    <ul>
        <li><b>Authentication</b> — تسجيل حساب جديد وتسجيل دخول، الباسورد مخزّن بـ <code>password_hash()</code>، والجلسة محفوظة بـ <code>$_SESSION</code>. <span class="ltr">(Stage 3 &amp; 5)</span></li>
        <li><b>Database</b> — جدول <code>users</code> وجدول <code>tasks</code> (كل Task مربوطة بـ <code>user_id</code>)، كل الاستعلامات عن طريق PDO + Prepared Statements. <span class="ltr">(Stage 4)</span></li>
        <li><b>CRUD كامل على المهام</b> — كل مستخدم يقدر يضيف، يعرض، يعدّل، ويحذف المهام بتاعته هو بس. <span class="ltr">(Stage 4)</span></li>
        <li><b>REST API منظم</b> — Routing بيوجّه <code>GET/POST/PUT/DELETE /tasks</code> لـ Controllers منفصلة عن الـ Models، ورد الـ API دايمًا JSON. <span class="ltr">(Stage 5)</span></li>
        <li><b>أمان</b> — <code>htmlspecialchars()</code> لأي output، CSRF token لأي فورم، والتحقق إن المستخدم بيعدّل بياناته هو بس مش بيانات حد تاني. <span class="ltr">(Stage 3)</span></li>
        <li><b>تنظيم احترافي</b> — إعدادات قاعدة البيانات في <code>.env</code>، وأي خطأ يتسجل في log بدل ما يظهر للمستخدم. <span class="ltr">(Stage 6)</span></li>
    </ul>
</div>

<h2>هيكل المشروع المقترح / Suggested Structure</h2>
<pre><code>task-manager/
├── .env
├── config.php              // يقرأ .env ويفتح اتصال PDO
├── index.php                // نقطة الدخول + Router
├── models/
│   ├── UserModel.php
│   └── TaskModel.php
├── controllers/
│   ├── AuthController.php   // register / login
│   └── TaskController.php   // CRUD على المهام
└── database/
    └── schema.sql           // CREATE TABLE users, tasks</code></pre>

<h2>أمثلة على الـ Endpoints / Example Endpoints</h2>
<pre><code>POST   /register        { "email": "...", "password": "..." }
POST   /login           { "email": "...", "password": "..." }
GET    /tasks           → قايمة مهام المستخدم المسجل دخوله فقط
POST   /tasks           { "title": "..." }
PUT    /tasks/{id}      { "title": "...", "is_done": true }
DELETE /tasks/{id}</code></pre>
<h3>مثال ناتج فعلي (GET /tasks بعد تسجيل دخول) / Example actual output</h3>
<div class="output-box">{"tasks":[{"id":1,"title":"Learn PDO","is_done":true},{"id":2,"title":"Build the API","is_done":false}]}</div>

<h2 id="practice">💻 Practice</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 قبل ما تبني المشروع الكامل بقاعدة بيانات حقيقية، جرّب المنطق الأساسي لـ <code>TaskModel</code> و<code>TaskController</code> بمصفوفة بدل PDO — بالظبط نفس الفكرة اللي رجعت الناتج فوق (GET /tasks).</div>
    <div class="en">🇬🇧 Before building the full project against a real database, try the core <code>TaskModel</code>/<code>TaskController</code> logic with a plain array instead of PDO — exactly the idea behind the output above (GET /tasks).</div>
</div>

<div class="mini-editor-wrap">
    <textarea spellcheck="false">&lt;?php
// نسخة مصغّرة من فكرة TaskModel + TaskController في المشروع النهائي — بمصفوفة بدل قاعدة بيانات
class TaskModel {
    private array $tasks = [
        ['id' => 1, 'title' => 'Learn PDO', 'is_done' => true],
        ['id' => 2, 'title' => 'Build the API', 'is_done' => false],
    ];
    public function allForUser(): array {
        return $this->tasks;
    }
}

class TaskController {
    public function __construct(private TaskModel $model) {}
    public function index(): void {
        echo json_encode(['tasks' => $this->model->allForUser()]);
    }
}

(new TaskController(new TaskModel()))->index();</textarea>
    <div class="mini-toolbar">
        <button class="mini-run-btn">▶ شغّل / Run</button>
        <span class="mini-status"></span>
    </div>
    <div class="output-box">— لسه متشغلش / not run yet —</div>
</div>

<h2>سيناريو قبول محدد: عنوان فاضي / A Concrete Acceptance Scenario: Empty Title</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 "المشروع بيشتغل" مش كفاية — أي حد بيراجع المشروع (أو Reviewer حقيقي) هيجرب مدخلات حدّية عمدًا. سيناريو قبول واضح لازم يكون فيه مدخل محدد ورد متوقع محدد. مثال: <b>مدخل:</b> <code>POST /tasks</code> بـ <code>{"title": ""}</code> (عنوان فاضي بعد <code>trim</code>). <b>الناتج المتوقع:</b> HTTP <code>422</code> مع <code>{"error": "Title is required."}</code> — مش <code>201</code>، ومش مهمة اتضافت بعنوان فاضي في قاعدة البيانات.</div>
    <div class="en">🇬🇧 "It works" isn't enough — anyone reviewing the project (or a real Reviewer) will deliberately try edge-case input. A clear acceptance scenario needs a specific input and a specific expected response. Example: <b>Input:</b> <code>POST /tasks</code> with <code>{"title": ""}</code> (empty title after <code>trim</code>). <b>Expected output:</b> HTTP <code>422</code> with <code>{"error": "Title is required."}</code> — not <code>201</code>, and no task added to the database with an empty title.</div>
</div>
<pre><code>&lt;?php
class TaskController {
    public function store(array $input): array
    {
        $title = trim($input['title'] ?? '');
        if ($title === '') {
            return ['status' => 422, 'body' => ['error' => 'Title is required.']];
        }
        return ['status' => 201, 'body' => ['id' => 3, 'title' => $title, 'is_done' => false]];
    }
}

$controller = new TaskController();

$result1 = $controller->store(['title' => '']);
echo "POST /tasks {title: \"\"} -&gt; {$result1['status']} " . json_encode($result1['body']) . PHP_EOL;

$result2 = $controller->store(['title' => 'Write the report']);
echo "POST /tasks {title: \"Write the report\"} -&gt; {$result2['status']} " . json_encode($result2['body']) . PHP_EOL;</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">POST /tasks {title: ""} -> 422 {"error":"Title is required."}
POST /tasks {title: "Write the report"} -> 201 {"id":3,"title":"Write the report","is_done":false}</div>
<div class="bi-block">
    <div class="ar">🇪🇬 لو مشروعك بيرجّع <code>201</code> (أو حتى <code>200</code>) لأول حالة دي بدل <code>422</code>، يبقى فيه ثغرة تحقق حقيقية — مش تفصيلة صغيرة. أضف نفس فكرة السيناريو ده على باقي المتطلبات (باسورد قصير جدًا، تسجيل دخول ببيانات غلط، تعديل مهمة مستخدم تاني) قبل ما تعتبر المشروع جاهز للتسليم.</div>
    <div class="en">🇬🇧 If your project returns <code>201</code> (or even <code>200</code>) for the first case instead of <code>422</code>, that's a real validation gap — not a minor detail. Apply this same scenario shape to the rest of the requirements (a too-short password, wrong login credentials, editing another user's task) before considering the project ready to submit.</div>
</div>

<div class="security-box">
    <h3>⚠️ راجع قبل التسليم / Final security checklist</h3>
    <div class="ar">🇪🇬
        <ul>
            <li>كل query بتستخدم Prepared Statements؟ ولا فيه أي مكان لسه بيلصق متغير جوه الـ SQL؟</li>
            <li>أي مدخل من المستخدم بيتطبع، مرّ على <code>htmlspecialchars()</code>؟</li>
            <li>الباسورد متخزنش أبدًا كنص عادي؟</li>
            <li>مستخدم A مش قادر يشوف أو يعدّل مهام مستخدم B عن طريق تغيير الـ id في الرابط؟</li>
        </ul>
    </div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="userid">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">إزاي المشروع يضمن إن مستخدم A مش يقدر يشوف مهام مستخدم B عن طريق تغيير الـ id في الرابط؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">How does the project ensure user A can't view user B's tasks by changing the id in the URL?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="hide"> بإخفاء الـ id تمامًا</label>
        <label><input type="radio" name="q1" value="userid"> بالتحقق إن Task.user_id = المستخدم المسجل دخوله في كل query</label>
        <label><input type="radio" name="q1" value="nothing"> مش محتاج تحقق، الـ Session كفاية</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="hash">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">حسب قائمة المتطلبات فوق، الباسورد المفروض يتخزن إزاي؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Per the checklist above, how should the password be stored?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="plain"> نص عادي في جدول users</label>
        <label><input type="radio" name="q2" value="hash"> بـ password_hash()</label>
        <label><input type="radio" name="q2" value="session"> في $_SESSION بس، مش في قاعدة البيانات</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="422">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">حسب سيناريو القبول فوق، <code>POST /tasks</code> بـ <code>{"title": ""}</code> المفروض يرجع إيه؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Per the acceptance scenario above, what should <code>POST /tasks</code> with <code>{"title": ""}</code> return?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="201"> 201 مع مهمة جديدة بعنوان فاضي</label>
        <label><input type="radio" name="q3" value="422"> 422 مع رسالة "Title is required."</label>
        <label><input type="radio" name="q3" value="200"> 200 من غير أي رسالة</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="gap">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">لو جرّبت المشروع بتاعك ولقيت إنه بيرجّع 201 لعنوان فاضي، إيه ده؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Testing your project and finding it returns 201 for an empty title — what does that indicate?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="fine"> تفصيلة بسيطة، ممكن تتجاهلها</label>
        <label><input type="radio" name="q4" value="gap"> ثغرة تحقق حقيقية لازم تتصلح قبل التسليم</label>
        <label><input type="radio" name="q4" value="feature"> سلوك مقصود ومطلوب</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="exercise-box">
    <h3>🎓 المهمة / The Task</h3>
    <div class="ar">🇪🇬 ابني المشروع كامل بالمواصفات فوق، جرّبه بنفسك من المتصفح أو من أداة زي Postman، وارجع لقايمة المتطلبات فوق وتأكد إنك عامل كل نقطة فيها قبل ما تعتبر نفسك خلصت.</div>
    <div class="en">🇬🇧 Build the full project to the spec above, test it yourself from the browser or a tool like Postman, and walk back through the checklist above to confirm every item is done before considering yourself finished.</div>
</div>

<h2>📊 معايير التقييم / Grading Rubric</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 التقييم مش رقم عشوائي — كل معيار هنا بيتحقق منه بسؤال محدد. راجع مشروعك بنفسك على كل بند قبل ما تعتبره جاهز.</div>
    <div class="en">🇬🇧 Grading isn't an arbitrary number — every criterion here maps to a specific, checkable question. Review your own project against each line before calling it done.</div>
</div>
<div class="sql-schema-box" style="white-space:normal">
<table style="width:100%;border-collapse:collapse;direction:ltr;text-align:left">
<tr style="border-bottom:1px solid var(--border)"><th style="padding:8px 6px">Criterion</th><th style="padding:8px 6px">Weight</th><th style="padding:8px 6px">What's checked</th></tr>
<tr style="border-bottom:1px solid var(--border)"><td style="padding:8px 6px">Code Quality</td><td style="padding:8px 6px">15%</td><td style="padding:8px 6px">Clear names, small functions, no duplication (DRY)</td></tr>
<tr style="border-bottom:1px solid var(--border)"><td style="padding:8px 6px">Database</td><td style="padding:8px 6px">15%</td><td style="padding:8px 6px">Schema is normalized, real foreign keys, sensible indexes</td></tr>
<tr style="border-bottom:1px solid var(--border)"><td style="padding:8px 6px">Security</td><td style="padding:8px 6px">15%</td><td style="padding:8px 6px">No SQL injection, XSS escaped, passwords hashed, ownership checked</td></tr>
<tr style="border-bottom:1px solid var(--border)"><td style="padding:8px 6px">Architecture</td><td style="padding:8px 6px">15%</td><td style="padding:8px 6px">Real MVC separation, not one tangled file</td></tr>
<tr style="border-bottom:1px solid var(--border)"><td style="padding:8px 6px">API Design</td><td style="padding:8px 6px">10%</td><td style="padding:8px 6px">Correct verbs/status codes, consistent JSON shape</td></tr>
<tr style="border-bottom:1px solid var(--border)"><td style="padding:8px 6px">Validation</td><td style="padding:8px 6px">10%</td><td style="padding:8px 6px">Every endpoint rejects bad input with a clear 422, not a crash</td></tr>
<tr style="border-bottom:1px solid var(--border)"><td style="padding:8px 6px">Error Handling</td><td style="padding:8px 6px">5%</td><td style="padding:8px 6px">No raw SQLSTATE/stack traces ever shown to the end user</td></tr>
<tr style="border-bottom:1px solid var(--border)"><td style="padding:8px 6px">Testing</td><td style="padding:8px 6px">5%</td><td style="padding:8px 6px">Each acceptance scenario (like the empty-title one above) actually verified</td></tr>
<tr style="border-bottom:1px solid var(--border)"><td style="padding:8px 6px">Performance</td><td style="padding:8px 6px">5%</td><td style="padding:8px 6px">No obvious N+1 queries, sensible pagination on list endpoints</td></tr>
<tr><td style="padding:8px 6px">Documentation</td><td style="padding:8px 6px">5%</td><td style="padding:8px 6px">A README explaining setup and listing every endpoint</td></tr>
</table>
</div>
<div class="bi-block">
    <div class="ar">🇪🇬 لو عايز تختبر جاهزيتك بشكل أوسع من مشروع واحد، في الدرس الجاي "التقييم النهائي" هتلاقي 8 محاور منفصلة (PHP, SQL, Database, Security, Architecture, API, Debugging, Project) بتغطي المسار كله مش بس المشروع ده.</div>
    <div class="en">🇬🇧 If you want to test your readiness more broadly than one project, the next lesson — the Final Assessment — covers 8 separate dimensions (PHP, SQL, Database, Security, Architecture, API, Debugging, Project) spanning the whole track, not just this project.</div>
</div>

<h2 id="project">🚀 لما تخلّص / When You're Done</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 لما تخلّص، هيبقى عندك REST API حقيقي شغال، بتصميم MVC منظم، بقاعدة بيانات فعلية، بحماية من XSS/CSRF/SQL Injection، وبـ Authentication حقيقي — يعني مشروع تقدر تحطه في الـ Portfolio بتاعك وتوريه لأي حد بيقيّم شغلك كـ Backend Developer.</div>
    <div class="en">🇬🇧 When you're done, you'll have a real, working REST API with an organized MVC design, backed by a real database, protected against XSS/CSRF/SQL Injection, with real Authentication — a project you can put in your Portfolio and show anyone evaluating your work as a Backend Developer.</div>
</div>

<div class="recap-box">
    <h3>🏁 مبروك / Congratulations</h3>
    <div class="ar">🇪🇬 لو خلّصت المشروع ده وشغّال صح، يبقى فعلاً عدّيت من "بتحفظ syntax" لـ "بتبني Backend حقيقي" — كده انت جاهز للشغل. لكن لو هدفك إنك توصل لمستوى محترف عالمي (Senior/Staff)، فيه مسار كامل جاي بعد كده.</div>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="stage6.php">← المرحلة السابقة</a>
    <a href="final-assessment.php">التقييم النهائي / Next: Final Assessment →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
