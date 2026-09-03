<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'stage6';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'المرحلة 6 — أدوات ومستوى احترافي';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">المرحلة 6 / Stage 6</span>
<h1>أدوات ومستوى احترافي <span class="ltr">Professional Level</span></h1>
<p class="subtitle">الفرق بين مبرمج بيتعلم ومبرمج جاهز للشغل مش في اللغة نفسها — في الأدوات اللي حواليها. هنا هنتعرف على Composer, .env, Logging, مقدمة لـ Laravel, اختبار الكود بـ PHPUnit، وإزاي تنشر مشروعك (Deployment).</p>

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
    <div class="ar">🇪🇬 تقدر تدير مكتبات مشروعك بـ Composer، تفصل الإعدادات الحساسة عن الكود بملف <code>.env</code>، تسجل الأخطاء بدل ما تخفيها، تكتب اختبار تلقائي لأول مرة، وتفهم الخطوط العريضة لأي framework حديث زي Laravel.</div>
    <div class="en">🇬🇧 Manage your project's libraries with Composer, separate sensitive config from code using a <code>.env</code> file, log errors instead of hiding them, write your first automated test, and understand the broad strokes of a modern framework like Laravel.</div>
</div>

<h2 id="understand">🧠 Composer — إدارة المكتبات</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <code>Composer</code> هو مدير الحزم (Package Manager) بتاع PHP — بيخليك تستخدم مكتبات جاهزة (زي مكتبة إرسال إيميلات أو PDF) من غير ما تكتبها من الصفر، وبيتولى تحميل أي مكتبة تانية محتاجاها هي كمان (Dependencies).</div>
    <div class="en">🇬🇧 <code>Composer</code> is PHP's package manager — it lets you use ready-made libraries (like an email or PDF library) without writing them yourself, and automatically pulls in whatever those libraries depend on.</div>
</div>

<pre><code>composer init
composer require monolog/monolog
composer require --dev phpunit/phpunit</code></pre>
<h3>الناتج الفعلي (composer.json بيتولد) / Actual output</h3>
<div class="output-box">Generated autoload files
1 package installed: monolog/monolog
1 package installed (dev): phpunit/phpunit</div>

<div class="bi-block">
    <div class="ar">🇪🇬 بعد كده بتحط <code>require 'vendor/autoload.php';</code> فوق مشروعك، و PHP هيقدر يوصل لأي كلاس في أي مكتبة اتحمّلت من غير ما تعمل <code>require</code> يدوي لكل ملف.</div>
    <div class="en">🇬🇧 After that, add <code>require 'vendor/autoload.php';</code> at the top of your project, and PHP can reach any class from any installed library without manually requiring each file.</div>
</div>

<h2 id="practice">💻 .env — فصل الإعدادات عن الكود</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 أي بيانات حساسة (باسورد قاعدة البيانات، مفاتيح API) متتكتبش جوه الكود أبدًا — بتتحط في ملف <code>.env</code> برة الكود المرفوع على Git، وبيتقرأ وقت التشغيل. كده لو حد شاف الكود على GitHub، مش هيشوف أي سر.</div>
    <div class="en">🇬🇧 Sensitive data (database password, API keys) should never be hardcoded — it goes in a <code>.env</code> file kept out of Git, and is read at runtime. This way, if anyone sees the code on GitHub, they see no secrets.</div>
</div>

<pre><code># .env
DB_HOST=localhost
DB_NAME=shop
DB_PASS=s3cr3t</code></pre>
<pre><code>&lt;?php
// config.php
$env = parse_ini_file(__DIR__ . '/.env');
$pdo = new PDO("mysql:host={$env['DB_HOST']};dbname={$env['DB_NAME']}", 'root', $env['DB_PASS']);</code></pre>

<h2>Logging — بدل ما تخفي الأخطاء</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 في مشروع حقيقي مينفعش تسيب الأخطاء تتطبع على الشاشة (خطر أمني) أو تختفي بصمت (صعب تصلحها). الحل: تسجّلها في ملف Log بتفاصيلها الكاملة، وتوريلليوزر رسالة عامة بس.</div>
    <div class="en">🇬🇧 In a real project, errors should neither print to the screen (security risk) nor vanish silently (impossible to debug). The fix: log them with full details, and show the user only a generic message.</div>
</div>

<pre><code>&lt;?php
try {
    $pdo->prepare('INSERT INTO orders (total) VALUES (?)')->execute([$total]);
} catch (PDOException $e) {
    error_log('[Orders] Insert failed: ' . $e->getMessage());
    http_response_code(500);
    echo json_encode(['error' => 'Something went wrong, please try again.']);
}</code></pre>
<h3>الناتج الفعلي (محتوى ملف اللوج) / Actual log file content</h3>
<div class="output-box">[03-Sep-2026 10:15:02] [Orders] Insert failed: SQLSTATE[23000]: Integrity constraint violation</div>

<div class="bi-block">
    <div class="ar">🇪🇬 عشان تجرّب الفكرتين من غير ملف <code>.env</code> حقيقي أو <code>error_log</code> بيكتب على السيرفر، المحرر تحت بيحاكي محتوى <code>.env</code> كنص (<code>parse_ini_string</code> بدل <code>parse_ini_file</code>)، وبيحاكي الـ Logging بدالة بسيطة بتطبع شكل السطر اللي كان هيتسجل فعليًا.</div>
    <div class="en">🇬🇧 To try both ideas without a real <code>.env</code> file or a server-side <code>error_log</code>, the editor below simulates <code>.env</code> content as a string (<code>parse_ini_string</code> instead of <code>parse_ini_file</code>), and simulates Logging with a simple function that prints the line that would actually be recorded.</div>
</div>

<div class="mini-editor-wrap">
    <textarea spellcheck="false">&lt;?php
// عشان نجرب المفهوم من غير ملف .env حقيقي، بنحاكي محتواه كنص ونستخدم parse_ini_string
$envContent = "DB_HOST=localhost\nDB_NAME=shop\nDB_PASS=s3cr3t";
$env = parse_ini_string($envContent);
echo "DB_HOST: {$env['DB_HOST']}" . PHP_EOL;
echo "DB_NAME: {$env['DB_NAME']}" . PHP_EOL;

// محاكاة Logging: بدل ما نكتب في ملف log حقيقي، بنطبع شكل السطر اللي كان هيتسجل
function logError(string $message): void {
    echo "[LOG] " . date('Y-m-d') . " " . $message . PHP_EOL;
}

try {
    throw new PDOException('SQLSTATE[23000]: Integrity constraint violation');
} catch (PDOException $e) {
    logError('[Orders] Insert failed: ' . $e->getMessage());
    echo json_encode(['error' => 'Something went wrong, please try again.']) . PHP_EOL;
}</textarea>
    <div class="mini-toolbar">
        <button class="mini-run-btn">▶ شغّل / Run</button>
        <span class="mini-status"></span>
    </div>
    <div class="output-box">— لسه متشغلش / not run yet —</div>
</div>

<h2>PHPUnit — اختبار تلقائي</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 بدل ما تجرب كل حاجة يدوي كل مرة تعدّل فيها كود، بتكتب <b>Test</b> بيتأكد إن الدالة بترجع النتيجة الصح — وبتشغّله في ثانية عشان تتأكد إنك مكسرتش حاجة.</div>
    <div class="en">🇬🇧 Instead of manually re-testing everything after every change, you write a <b>Test</b> that verifies a function returns the correct result — and run it in a second to confirm you didn't break anything.</div>
</div>

<pre><code>&lt;?php
use PHPUnit\Framework\TestCase;

class CartTest extends TestCase
{
    public function testTotalWithTwoItems(): void
    {
        $cart = new Cart();
        $cart->add('Keyboard', 45.99);
        $cart->add('Mouse', 19.99);

        $this->assertEquals(65.98, $cart->total());
    }
}</code></pre>
<h3>الناتج الفعلي (php artisan test / vendor/bin/phpunit) / Actual output</h3>
<div class="output-box">PHPUnit 10.5.0

.                                                                   1 / 1 (100%)

OK (1 test, 1 assertion)</div>

<h2>مقدمة عن Laravel / A Glimpse of Laravel</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 كل حاجة اتعلمتها لحد دلوقتي (Routing, MVC, PDO/Prepared Statements, Sessions, Authentication) هي بالظبط اللي framework زي <b>Laravel</b> بيبنيه لك جاهز وبشكل أذكى وأسرع. لما تشوف <code>Route::get('/products', [ProductController::class, 'index']);</code> في Laravel، دلوقتي تعرف بالظبط إيه اللي بيحصل تحتها.</div>
    <div class="en">🇬🇧 Everything you've learned so far (Routing, MVC, PDO/Prepared Statements, Sessions, Authentication) is exactly what a framework like <b>Laravel</b> provides for you, ready-made and smarter/faster. When you see <code>Route::get('/products', [ProductController::class, 'index']);</code> in Laravel, you now know exactly what's happening underneath.</div>
</div>

<h2>Deployment — نشر المشروع</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 قبل ما تنشر مشروعك على سيرفر حقيقي: اقفل عرض الأخطاء (<code>display_errors = Off</code>)، تأكد إن <code>.env</code> مش مرفوع على Git، فعّل HTTPS، واعمل نسخة احتياطية من قاعدة البيانات بشكل دوري.</div>
    <div class="en">🇬🇧 Before deploying to a real server: turn off error display (<code>display_errors = Off</code>), make sure <code>.env</code> is not committed to Git, enable HTTPS, and back up the database regularly.</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="env">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">فين المفروض تحط باسورد قاعدة البيانات في مشروع حقيقي؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Where should a real project's database password live?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="hardcode"> مكتوب مباشرة جوه config.php</label>
        <label><input type="radio" name="q1" value="env"> في ملف .env برة Git</label>
        <label><input type="radio" name="q1" value="comment"> في تعليق أعلى الملف</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="log">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">حصل خطأ PDOException في مشروع Live — إيه التصرف الصح؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">A PDOException happens in a live project — what's the correct response?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="display"> تطبع تفاصيل الخطأ الكاملة للمستخدم</label>
        <label><input type="radio" name="q2" value="ignore"> تتجاهله وتكمل عادي</label>
        <label><input type="radio" name="q2" value="log"> تسجّله في log وتوري المستخدم رسالة عامة</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ Logger بمستويات / A Leveled Logger</h3>
    <div class="ar">🇪🇬 في المحرر فوق، حوّل دالة <code>logError()</code> إلى دالة <code>logMessage(string $level, string $message)</code> بتقبل مستوى زي <code>"INFO"</code> أو <code>"ERROR"</code> وتطبعه جنب الرسالة (زي <code>[ERROR] 2026-09-03 ...</code>)، واستخدمها مرتين: مرة بـ <code>INFO</code> لما التسجيل ينجح، ومرة بـ <code>ERROR</code> لما يفشل.</div>
    <div class="en">🇬🇧 In the editor above, turn <code>logError()</code> into a <code>logMessage(string $level, string $message)</code> function that accepts a level like <code>"INFO"</code> or <code>"ERROR"</code> and prints it next to the message (like <code>[ERROR] 2026-09-03 ...</code>), and use it twice: once with <code>INFO</code> on success, once with <code>ERROR</code> on failure.</div>
</div>

<div class="exercise-box">
    <h3>✍️ تمرين إضافي / Extra Exercise</h3>
    <div class="ar">🇪🇬 حوّل مشروع الـ Tasks API من المرحلة اللي فاتت: حط بيانات الاتصال بقاعدة البيانات في <code>.env</code>، سجّل أي خطأ في ملف log بدل ما يظهر للمستخدم، واكتب Test واحد بـ PHPUnit بيتأكد إن إضافة Task بترجع الحالة الصح.</div>
    <div class="en">🇬🇧 Refactor the Tasks API from the previous stage: move DB credentials into <code>.env</code>, log any error to a file instead of showing it to the user, and write one PHPUnit test confirming that adding a Task returns the correct status.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 مشروع Task Manager (الـ Capstone) هيستخدم بالظبط نفس الترتيب ده: <code>.env</code> لبيانات الاتصال، Logging بدل عرض الأخطاء، واختبار PHPUnit واحد على الأقل يتأكد إن الـ API شغال صح — دي بالظبط بنود "التنظيم الاحترافي" في متطلبات المشروع.</div>
    <div class="en">🇬🇧 The Capstone Task Manager will use exactly this same setup: <code>.env</code> for connection details, Logging instead of displaying errors, and at least one PHPUnit test confirming the API works correctly — exactly the "professional organization" requirements of the project.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>Composer = مدير الحزم، بيدير المكتبات و dependencies بتاعتها.</li>
        <li>.env = إعدادات حساسة برة الكود، متترفعش على Git.</li>
        <li>Logging = تسجيل الأخطاء بالتفصيل بدل ما تظهر للمستخدم أو تختفي بصمت.</li>
        <li>PHPUnit = اختبارات تلقائية تتأكد إن الكود شغال صح بعد كل تعديل.</li>
        <li>Laravel وأي framework هو تنظيم أذكى لنفس المفاهيم اللي اتعلمتها من الصفر.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="stage5.php">← المرحلة السابقة</a>
    <a href="capstone.php">المرحلة الجاية / Next: Capstone Project →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
