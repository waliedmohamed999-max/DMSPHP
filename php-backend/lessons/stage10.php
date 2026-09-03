<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'stage10';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'المرحلة 10 — DevOps والنشر الاحترافي';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">المسار الاحترافي — المرحلة 10 / Stage 10</span>
<h1>DevOps والنشر الاحترافي <span class="ltr">DevOps &amp; Deployment</span></h1>
<p class="subtitle">"شغال عندي على جهازي" مش كفاية. هنا هنتعلم إزاي تحزم مشروعك بـ Docker عشان يشتغل بنفس الطريقة في أي حتة، وتبني Pipeline بيختبر وينشر الكود أوتوماتيك، وتراقب المشروع بعد ما ينزل فعليًا.</p>

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
    <div class="ar">🇪🇬 تفهم فايدة Docker في توحيد بيئة التشغيل، تبني CI/CD Pipeline بسيط بيشغّل الاختبارات أوتوماتيك مع كل push، وتعرف الأساسيات اللي لازم تراقبها بعد ما مشروعك ينزل على سيرفر حقيقي.</div>
    <div class="en">🇬🇧 Understand Docker's role in unifying runtime environments, build a simple CI/CD Pipeline that runs tests automatically on every push, and know the basics you must monitor once your project is live on a real server.</div>
</div>

<h2 id="understand">🧠 Docker — "شغال عندي" يبقى "شغال في كل مكان"</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 المشكلة الكلاسيكية: مشروعك شغال عندك بـ PHP 8.2، بس السيرفر فيه 7.4، فحاجات بتتكسر. <b>Docker</b> بيحل المشكلة دي بإنه "يحزّم" مشروعك مع نسخة PHP المحددة وكل الإعدادات في "Container" واحد، بحيث يشتغل بنفس الطريقة بالظبط على أي جهاز.</div>
    <div class="en">🇬🇧 The classic problem: your project runs on PHP 8.2 locally, but the server has 7.4, so things break. <b>Docker</b> solves this by "packaging" your project with the exact PHP version and all its config into one Container, so it behaves identically on any machine.</div>
</div>

<pre><code># Dockerfile
FROM php:8.2-apache
RUN docker-php-ext-install pdo pdo_mysql
COPY . /var/www/html/
EXPOSE 80</code></pre>

<pre><code># docker-compose.yml — يشغّل السيرفر وقاعدة البيانات مع بعض
services:
  app:
    build: .
    ports: ["8080:80"]
    depends_on: [db]
  db:
    image: mysql:8.0
    environment:
      MYSQL_DATABASE: shop
      MYSQL_ROOT_PASSWORD: secret</code></pre>
<h3>الناتج الفعلي (docker compose up) / Actual output</h3>
<div class="output-box">✔ Container project-db-1   Started
✔ Container project-app-1  Started
App running at http://localhost:8080</div>

<div class="flow-diagram">
    <div class="flow-box">Dockerfile</div>
    <div class="flow-arrow">↓ docker build</div>
    <div class="flow-box">Image (PHP + your code baked in)</div>
    <div class="flow-arrow">↓ docker compose up</div>
    <div class="flow-box">Running Containers (app + db)</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">Identical behavior on any machine</div>
</div>

<h2>CI/CD Pipeline — اختبار ونشر أوتوماتيك</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>CI (Continuous Integration):</b> كل مرة تعمل push، سيرفر بعيد بيشغّل الاختبارات (PHPUnit) والـ Static Analysis (PHPStan) أوتوماتيك، عشان محدش يقدر يدخل كود بايظ للمشروع. <b>CD (Continuous Deployment):</b> لو الاختبارات عدّت، الكود بينزل على السيرفر تلقائيًا من غير تدخل بشري.</div>
    <div class="en">🇬🇧 <b>CI (Continuous Integration):</b> every push triggers a remote server to run tests (PHPUnit) and Static Analysis (PHPStan) automatically, so broken code can't slip in. <b>CD (Continuous Deployment):</b> if tests pass, the code deploys to the server automatically, with no manual step.</div>
</div>

<pre><code># .github/workflows/ci.yml
name: CI
on: [push]
jobs:
  test:
    runs-on: ubuntu-latest
    steps:
      - uses: actions/checkout@v4
      - uses: shivammathur/setup-php@v2
        with: { php-version: '8.2' }
      - run: composer install
      - run: vendor/bin/phpunit
      - run: vendor/bin/phpstan analyse src --level=8</code></pre>
<h3>الناتج الفعلي (على GitHub Actions) / Actual output</h3>
<div class="output-box">✔ Checkout code
✔ Setup PHP 8.2
✔ composer install (12 packages)
✔ PHPUnit: OK (24 tests, 61 assertions)
✔ PHPStan: [OK] No errors
All checks passed — ready to deploy.</div>

<h2 id="practice">💻 مراقبة المشروع بعد النشر / Monitoring in Production</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 لما مشروعك يبقى شغال فعليًا وناس بتستخدمه، محتاج تعرف لو حصلت مشكلة قبل ما المستخدمين يشتكوا: <b>Health Check</b> endpoint بيتأكد إن السيرفر وقاعدة البيانات شغالين، و<b>Centralized Logging</b> بيجمع كل الأخطاء من كل السيرفرات في مكان واحد بدل ما تفتش فيهم واحد واحد.</div>
    <div class="en">🇬🇧 Once your project is live with real users, you need to know about problems before users complain: a <b>Health Check</b> endpoint confirms the server and database are up, and <b>Centralized Logging</b> collects errors from every server in one place instead of checking each one manually.</div>
</div>

<pre><code>&lt;?php
// health.php — بيتفحص كل ثواني قليلة من نظام مراقبة خارجي
try {
    $pdo->query('SELECT 1');
    http_response_code(200);
    echo json_encode(['status' => 'ok', 'db' => 'connected']);
} catch (Exception $e) {
    http_response_code(503);
    echo json_encode(['status' => 'down', 'db' => 'unreachable']);
}</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">{"status":"ok","db":"connected"}</div>

<div class="bi-block">
    <div class="ar">🇪🇬 عشان تجرّب فكرة الـ Health Check من غير قاعدة بيانات حقيقية، الكود تحت بيمثّل حالة الاتصال بمتغير <code>bool</code> إحنا اللي بنتحكم فيه — جرّبه بقيمة <code>true</code> و<code>false</code> وشوف الرد بيتغيّر إزاي.</div>
    <div class="en">🇬🇧 To try the Health Check idea without a real database, the code below represents the connection state with a <code>bool</code> we control ourselves — try it with <code>true</code> and <code>false</code> and see the response change.</div>
</div>

<div class="mini-editor-wrap">
    <textarea spellcheck="false">&lt;?php
// محاكاة /health endpoint من غير قاعدة بيانات حقيقية — بنتحكم إحنا في حالة الاتصال
function checkHealth(bool $dbIsUp): array {
    if ($dbIsUp) {
        return ['status' => 'ok', 'db' => 'connected'];
    }
    return ['status' => 'down', 'db' => 'unreachable'];
}

echo json_encode(checkHealth(true)) . PHP_EOL;
echo json_encode(checkHealth(false)) . PHP_EOL;</textarea>
    <div class="mini-toolbar">
        <button class="mini-run-btn">▶ شغّل / Run</button>
        <span class="mini-status"></span>
    </div>
    <div class="output-box">— لسه متشغلش / not run yet —</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="unify">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">إيه المشكلة الأساسية اللي Docker بيحلّها؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What core problem does Docker solve?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="unify"> اختلاف بيئة التشغيل بين جهازك والسيرفر</label>
        <label><input type="radio" name="q1" value="speed"> بطء PHP نفسه</label>
        <label><input type="radio" name="q1" value="db"> نسيان تصميم قاعدة البيانات</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="ci">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">تشغيل PHPUnit و PHPStan أوتوماتيك مع كل <code>push</code> قبل ما الكود يوصل للمستخدم — ده جزء من إيه؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Automatically running PHPUnit and PHPStan on every push before code reaches users — this is part of what?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="ci"> CI (Continuous Integration)</label>
        <label><input type="radio" name="q2" value="dockerfile"> Dockerfile</label>
        <label><input type="radio" name="q2" value="cache"> Redis Caching</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ Health Check بيفحص أكتر من حاجة / A Health Check That Checks More</h3>
    <div class="ar">🇪🇬 في المحرر فوق، حوّل <code>checkHealth()</code> لتاخد باراميترين <code>bool $dbIsUp</code> و<code>bool $cacheIsUp</code>، وترجع <code>status: ok</code> بس لو الاتنين شغالين، وإلا ترجع <code>status: degraded</code> مع توضيح مين الواقع بالظبط.</div>
    <div class="en">🇬🇧 In the editor above, change <code>checkHealth()</code> to take two parameters, <code>bool $dbIsUp</code> and <code>bool $cacheIsUp</code>, returning <code>status: ok</code> only if both are up, otherwise <code>status: degraded</code> with details on exactly which one is down.</div>
</div>

<div class="exercise-box">
    <h3>✍️ تمرين إضافي / Extra Exercise</h3>
    <div class="ar">🇪🇬 اعمل <code>Dockerfile</code> و <code>docker-compose.yml</code> لمشروع Task Manager بحيث يشتغل PHP وMySQL مع بعض بأمر واحد. بعد كده اكتب ملف GitHub Actions بسيط بيشغّل PHPUnit مع كل push، وأضف endpoint اسمه <code>/health</code>.</div>
    <div class="en">🇬🇧 Write a <code>Dockerfile</code> and <code>docker-compose.yml</code> for the Task Manager so PHP and MySQL run together with one command. Then write a simple GitHub Actions file that runs PHPUnit on every push, and add a <code>/health</code> endpoint.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 مشروع Task Manager بتاعك يستاهل يتحزّم بـ Docker عشان أي حد يشغّله بأمر واحد، وياخد pipeline بسيط يتأكد إن الاختبارات شغالة قبل أي تعديل يتنشر، وendpoint <code>/health</code> يطمنّك إنه شغال بعد ما يبقى Live.</div>
    <div class="en">🇬🇧 Your Task Manager deserves to be packaged with Docker so anyone can run it with one command, a simple pipeline that confirms tests pass before any change deploys, and a <code>/health</code> endpoint that reassures you it's alive once it's Live.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>Docker = يحزّم المشروع وبيئته في Container واحد، شغال بنفس الشكل في كل مكان.</li>
        <li>CI = اختبار الكود أوتوماتيك مع كل push، قبل ما يوصل للمستخدم أصلًا.</li>
        <li>CD = نشر أوتوماتيك بعد ما الاختبارات تعدّي.</li>
        <li>Health Checks + Logging مركزي = تعرف بمشكلة قبل ما المستخدم يشتكي.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="stage9.php">← المرحلة السابقة</a>
    <a href="stage11.php">المرحلة الجاية / Next: System Design →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
