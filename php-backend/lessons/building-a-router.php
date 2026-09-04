<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'building-a-router';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'بناء Router — Building a Router';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">Stage 12 · Clean Architecture &amp; MVC</span>
<h1>بناء Router بسيط بـ PHP خام <span class="ltr">Building a Simple Router in Plain PHP</span></h1>
<p class="subtitle"><span class="ltr">$router->get('/users', ...)</span> — من الصفر، من غير أي framework. <span class="ltr">From scratch, with no framework.</span></p>

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
    <div class="ar">🇪🇬 في <a href="mvc-explained.php">الدرس اللي فات</a> شفنا Controller وModel وView حقيقيين، بس افترضنا إن حد "قرر" يستدعي الـ Controller الصح. الدرس ده هيبني الجزء ده فعليًا: كلاس <code>Router</code> حقيقي بيسجّل مسارات GET/POST، وبيوجّه أي طلب لمكانه الصح — أو يرجع رد 404 واضح لو مفيش تطابق.</div>
    <div class="en">🇬🇧 In the <a href="mvc-explained.php">previous lesson</a> we saw a real Controller, Model, and View, but assumed someone "decided" to call the right Controller. This lesson builds that piece for real: an actual <code>Router</code> class that registers GET/POST routes and dispatches any request to the right place — or returns a clear 404 response when nothing matches.</div>
</div>

<h2 id="understand">🧠 فكرة الـ Router / The Router Idea</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 الـ Router في جوهره حاجة بسيطة جدًا: مصفوفة بتخزن "لما يجي HTTP Method معين على مسار معين، شغّل الدالة دي". <code>->get()</code> و<code>->post()</code> بيسجلوا المسارات، و<code>->dispatch()</code> بيدور على تطابق ويشغّله. أي framework زي Laravel أو Symfony بيعمل بالظبط الفكرة دي — بس بميزات إضافية زي المسارات الديناميكية (<code>/users/{id}</code>) والـ Middleware.</div>
    <div class="en">🇬🇧 At its core, a Router is a very simple idea: an array that stores "when this HTTP Method hits this path, run this function." <code>->get()</code> and <code>->post()</code> register routes, and <code>->dispatch()</code> looks for a match and runs it. Every framework like Laravel or Symfony does exactly this idea — with extra features like dynamic paths (<code>/users/{id}</code>) and middleware.</div>
</div>

<h2 id="practice">💻 الكود الحقيقي / The Real Code</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 الكلاس تحت بيدعم <code>get()</code> و<code>post()</code> لتسجيل المسارات، و<code>dispatch()</code> بتاخد Method وURI حقيقيين وتلاقي وتشغّل الـ handler المطابق — أو ترجع array فيه <code>status</code> و<code>body</code> واضحين لو مفيش تطابق. الكود ده اتنفذ فعليًا، مش مجرد تعريف.</div>
    <div class="en">🇬🇧 The class below supports <code>get()</code> and <code>post()</code> for registering routes, and <code>dispatch()</code> takes a real Method and URI and finds/runs the matching handler — or returns an array with a clear <code>status</code> and <code>body</code> when nothing matches. This code was actually run, not just defined.</div>
</div>

<pre><code>&lt;?php

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

$router = new Router();

$users = [
    ['id' => 1, 'name' => 'Ahmed Hassan'],
    ['id' => 2, 'name' => 'Sara Ali'],
];

$router->get('/users', function () use (&$users) {
    return ['status' => 200, 'body' => $users];
});

$router->post('/users', function () use (&$users) {
    $newUser = ['id' => 3, 'name' => 'Omar Khaled'];
    $users[] = $newUser;
    return ['status' => 201, 'body' => $newUser];
});

// 1) A matching GET
$result1 = $router->dispatch('GET', '/users');
echo "GET /users" . PHP_EOL;
echo "HTTP {$result1['status']}" . PHP_EOL;
echo json_encode($result1['body']) . PHP_EOL . PHP_EOL;

// 2) A matching POST
$result2 = $router->dispatch('POST', '/users');
echo "POST /users" . PHP_EOL;
echo "HTTP {$result2['status']}" . PHP_EOL;
echo json_encode($result2['body']) . PHP_EOL . PHP_EOL;

// 3) An unmatched path
$result3 = $router->dispatch('GET', '/comments');
echo "GET /comments" . PHP_EOL;
echo "HTTP {$result3['status']}" . PHP_EOL;
echo json_encode($result3['body']) . PHP_EOL;</code></pre>
<h3>الناتج الفعلي (تم تنفيذه فعليًا) / Actual output (really executed)</h3>
<div class="output-box">GET /users
HTTP 200
[{"id":1,"name":"Ahmed Hassan"},{"id":2,"name":"Sara Ali"}]

POST /users
HTTP 201
{"id":3,"name":"Omar Khaled"}

GET /comments
HTTP 404
{"error":"Route not found"}</div>

<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ 3 حالات مختلفة اتنفذت فعليًا: <code>GET /users</code> رجّع الاتنين المسجلين، <code>POST /users</code> فعليًا ضاف مستخدم تالت ورجّعه بـ <code>201 Created</code>، و<code>GET /comments</code> (مسار ملوش handler خالص) رجّع <code>404</code> مع رسالة واضحة بدل Fatal Error. الشرط <code>if (!$handler)</code> هو اللي بيمنع الانهيار — من غيره، السطر اللي بعده كان هيحاول يستدعي <code>null()</code> ويوقف البرنامج.</div>
    <div class="en">🇬🇧 Notice 3 different cases actually ran: <code>GET /users</code> returned the two registered users, <code>POST /users</code> genuinely added a third user and returned it with <code>201 Created</code>, and <code>GET /comments</code> (a path with no handler at all) returned <code>404</code> with a clear message instead of a Fatal Error. The <code>if (!$handler)</code> check is what prevents the crash — without it, the next line would try to call <code>null()</code> and halt the program.</div>
</div>

<h2>ليه <code>callable</code> بدل اسم Controller ثابت؟ / Why <code>callable</code> Instead of a Fixed Controller Name?</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 الـ handler هنا <code>callable</code> — ممكن يكون Closure (زي فوق) أو <code>[ControllerClass::class, 'method']</code>. في مشروع حقيقي، غالبًا هتستخدم الشكل التاني عشان تربط كل مسار بـ Controller حقيقي من درس MVC اللي فات، بدل Closures صغيرة. الاتنين شغالين مع نفس <code>dispatch()</code> من غير أي تغيير في الـ Router نفسه.</div>
    <div class="en">🇬🇧 The handler here is <code>callable</code> — it can be a Closure (as above) or <code>[ControllerClass::class, 'method']</code>. In a real project you'd usually use the latter to wire each route to a real Controller from the previous MVC lesson, instead of small Closures. Both work with the exact same <code>dispatch()</code>, with no change to the Router itself.</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="404">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">حسب الناتج الفعلي فوق، إيه اللي رجّعه <code>dispatch('GET', '/comments')</code>؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Based on the actual output above, what did <code>dispatch('GET', '/comments')</code> return?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="crash"> Fatal Error</label>
        <label><input type="radio" name="q1" value="404"> array فيه status 404 وbody فيها رسالة خطأ واضحة</label>
        <label><input type="radio" name="q1" value="empty"> array فاضية</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="separate">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">ليه <code>$this->routes['GET'][...]</code> و<code>$this->routes['POST'][...]</code> منفصلين، مش نفس المفتاح؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Why are <code>$this->routes['GET'][...]</code> and <code>$this->routes['POST'][...]</code> separate, not the same key?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="separate"> عشان نفس المسار (زي /users) ممكن يعمل حاجة مختلفة تمامًا حسب الـ Method</label>
        <label><input type="radio" name="q2" value="speed"> عشان يشتغل أسرع</label>
        <label><input type="radio" name="q2" value="required"> PHP بيرفض مفتاح واحد لقيمتين</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="handler">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">لو مسحت شرط <code>if (!$handler)</code> من <code>dispatch()</code> وطلبت مسار مش مسجل، إيه اللي هيحصل؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">If you removed the <code>if (!$handler)</code> check and requested an unregistered path, what happens?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="handler"> Fatal Error لإن الكود هيحاول يستدعي null كـ دالة</label>
        <label><input type="radio" name="q3" value="fine"> هيرجع 200 عادي</label>
        <label><input type="radio" name="q3" value="skip"> PHP هيتجاهل السطر أوتوماتيك</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="callable">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">إيه نوع الـ parameter اللي بتستقبله <code>get()</code> و<code>post()</code> كـ handler، واللي بيسمح إما بـ Closure أو <code>[Class::class, 'method']</code>؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What parameter type do <code>get()</code> and <code>post()</code> accept as a handler, allowing either a Closure or <code>[Class::class, 'method']</code>?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="callable"> callable</label>
        <label><input type="radio" name="q4" value="string"> string فقط</label>
        <label><input type="radio" name="q4" value="array"> array فقط</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ زوّد <code>delete()</code> و<code>PUT</code> / Add <code>delete()</code> and <code>PUT</code></h3>
    <div class="ar">🇪🇬 في <a href="../playground/index.php">محرر الكود</a>، خد كلاس <code>Router</code> فوق واضف method جديدة <code>delete(string $path, callable $handler)</code> ومسار PUT مسجّل يدويًا عن طريق <code>$router-&gt;routes</code> (أو أضف method <code>put()</code> شبه <code>get()</code>). بعدين اعمل dispatch لـ <code>DELETE /users/2</code> وتأكد إنها بترجع 404 لو مسجّلتش المسار.</div>
    <div class="en">🇬🇧 In the <a href="../playground/index.php">Playground</a>, take the <code>Router</code> class above and add a new <code>delete(string $path, callable $handler)</code> method (and similarly a <code>put()</code> method mirroring <code>get()</code>). Then dispatch <code>DELETE /users/2</code> and confirm it returns 404 if you haven't registered that path.</div>
</div>

<div class="exercise-box">
    <h3>✍️ تمرين إضافي / Extra Exercise</h3>
    <div class="ar">🇪🇬 وصّل الـ Router ده بـ <code>PostController</code> من <a href="mvc-explained.php">درس MVC</a> اللي فات: سجّل <code>GET /posts</code> يستدعي <code>$controller-&gt;index()</code> فعليًا، وشغّل <code>dispatch('GET', '/posts')</code> وشوف الناتج.</div>
    <div class="en">🇬🇧 Wire this Router up to the <code>PostController</code> from the <a href="mvc-explained.php">previous MVC lesson</a>: register <code>GET /posts</code> to actually call <code>$controller-&gt;index()</code>, then run <code>dispatch('GET', '/posts')</code> and see the result.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 عندك دلوقتي Model وView وController (من الدرس اللي فات) وRouter حقيقي (الدرس ده). الحاجة الوحيدة الناقصة قبل مشروع إعادة الهيكلة الكامل: مبادئ تخليك تكتب كل جزء من دول بشكل نظيف وسهل الصيانة — وده موضوع الدرس الجاي.</div>
    <div class="en">🇬🇧 You now have a Model, View, and Controller (previous lesson) and a real Router (this lesson). The one thing missing before the full refactor project: the principles that keep each of these pieces clean and maintainable — that's the next lesson.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>Router = مصفوفة بتربط (Method + Path) بـ handler، مع دالة dispatch بتدور على تطابق وتشغّله.</li>
        <li><code>get()</code>/<code>post()</code> بيسجلوا المسارات، <code>dispatch()</code> بينفّذ الطلب الحقيقي.</li>
        <li>لو مفيش تطابق، لازم ترجع رد واضح (404) بدل ما تنهار بـ Fatal Error.</li>
        <li>الـ handler بيقبل أي <code>callable</code> — Closure أو <code>[Controller::class, 'method']</code>.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="mvc-explained.php">← المرحلة السابقة</a>
    <a href="clean-code-principles.php">المرحلة الجاية / Next: Clean Code Principles →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
