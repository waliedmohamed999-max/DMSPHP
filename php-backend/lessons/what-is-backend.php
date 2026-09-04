<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'what-is-backend';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'إيه هو الـ Backend أصلًا؟ — What Is Backend, Really?';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">Stage 1 · Backend Foundations</span>
<h1>إيه هو الـ Backend أصلًا؟ <span class="ltr">What Is Backend, Really?</span></h1>
<p class="subtitle">قبل ما تكتب سطر PHP واحد، لازم تفهم مكانك في الصورة الكبيرة. <span class="ltr">Before writing a single line of PHP, you need to understand where you fit in the bigger picture.</span></p>

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
    <div class="ar">🇪🇬 تفهم الفرق الحقيقي بين Frontend وBackend، تعرف كل طرف في المنظومة (Client, Server, Browser, Web Server, Application Server, Database) بيعمل إيه بالظبط، وتشوف بعينك مثال حقيقي على حاجة الـ Frontend مقدرش يعملها لوحده أبدًا.</div>
    <div class="en">🇬🇧 Understand the real difference between Frontend and Backend, know exactly what each player in the system (Client, Server, Browser, Web Server, Application Server, Database) actually does, and see a real example of something Frontend alone can never do.</div>
</div>

<h2 id="understand">🧠 Frontend مقابل Backend / Frontend vs Backend</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>Frontend</b> هو كل حاجة بتشتغل جوه متصفح المستخدم — HTML بيرسم الشكل، CSS بيلوّنه، JavaScript بيحرّكه. المستخدم شايفه ولامسه مباشرة. <b>Backend</b> هو كل حاجة بتشتغل على السيرفر، بعيد عن عين المستخدم — بيستقبل الطلبات، بيتكلم مع قاعدة البيانات، بيتحقق من الصلاحيات، وبيرجّع النتيجة. المستخدم عمره ما هيشوف كود الـ Backend، بس هو اللي بيضمن إن كل حاجة صح وآمنة.</div>
    <div class="en">🇬🇧 <b>Frontend</b> is everything running inside the user's browser — HTML draws the shape, CSS colors it, JavaScript animates it. The user sees and touches it directly. <b>Backend</b> is everything running on the server, out of the user's sight — it receives requests, talks to the database, checks permissions, and sends back the result. The user never sees Backend code, but it's what guarantees everything is correct and safe.</div>
</div>
<div class="bi-block">
    <div class="ar">🇪🇬 قاعدة سريعة: أي حاجة ممكن المستخدم "يغشّها" (زي يفتح Developer Tools ويغيّر كود JavaScript) لازم تتأكد منها تاني في الـ Backend. لو التحقق من صحة الإيميل موجود بس في الـ Frontend، أي حد يقدر يتجاوزه بسهولة.</div>
    <div class="en">🇬🇧 A quick rule: anything the user could "cheat" (like opening Developer Tools and changing JavaScript) must be re-checked on the Backend. If email validation only exists in the Frontend, anyone can bypass it easily.</div>
</div>

<h2>🌐 اللاعبين في المنظومة / The Players in the System</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>Client</b>: أي جهاز بيطلب خدمة — متصفحك، أو تطبيق موبايل. <b>Browser</b>: البرنامج اللي بيعرض صفحات الويب (Chrome, Firefox) — هو نوع من الـ Client. <b>Server</b>: جهاز (أو مجموعة أجهزة) شغّال 24 ساعة، بينتظر طلبات ويردّ عليها. <b>Web Server</b> (زي Nginx أو Apache): البرنامج اللي بيستقبل طلبات HTTP فعليًا ويوجّهها. <b>Application Server</b>: البيئة اللي بتشغّل كود التطبيق نفسه (PHP في حالتنا). <b>Database</b>: المكان اللي البيانات بتتخزن فيه بشكل دائم (MySQL في مسارنا).</div>
    <div class="en">🇬🇧 <b>Client</b>: any device requesting a service — your browser, or a mobile app. <b>Browser</b>: the program that displays web pages (Chrome, Firefox) — a type of Client. <b>Server</b>: a machine (or a group of machines) running 24/7, waiting for requests and answering them. <b>Web Server</b> (like Nginx or Apache): the program that actually receives HTTP requests and routes them. <b>Application Server</b>: the environment that runs your application's own code (PHP, in our track). <b>Database</b>: where data is permanently stored (MySQL in our track).</div>
</div>

<div class="flow-diagram">
    <div class="flow-box">Browser (Client)</div>
    <div class="flow-arrow">↓ HTTP Request</div>
    <div class="flow-box">Web Server (Nginx/Apache)</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">Application Server (PHP)</div>
    <div class="flow-arrow">↓ SQL Query</div>
    <div class="flow-box">Database (MySQL)</div>
    <div class="flow-arrow">↑ Data</div>
    <div class="flow-box">Application Server (PHP)</div>
    <div class="flow-arrow">↑ HTTP Response</div>
    <div class="flow-box">Browser (Client)</div>
</div>
<div class="bi-block">
    <div class="ar">🇪🇬 لو عايز الرحلة الكاملة بالتفصيل — إيه اللي بيحصل بالظبط لما تكتب رابط وتدوس Enter — هتلاقيها في درس <a href="http-request-response.php">طلب واستجابة HTTP</a> في مرحلة الويب وHTTP.</div>
    <div class="en">🇬🇧 For the full detailed journey — exactly what happens when you type a URL and hit Enter — see the <a href="http-request-response.php">HTTP Request &amp; Response</a> lesson in the Web &amp; HTTP stage.</div>
</div>

<h2 id="practice">💻 مثال حقيقي: حاجة الـ Frontend مقدرش يعملها / A Real Example: Something Frontend Can't Do</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 JavaScript في المتصفح مقدرش يقرا ملف من السيرفر مباشرة، ولا يتصل بقاعدة بيانات، ولا يخزن سر (زي مفتاح API) من غير ما يظهر لأي حد بيفتح Developer Tools. الكود تحت PHP حقيقي بيقرا ملف إعدادات من على السيرفر — حاجة الـ Frontend عمره ما هيقدر يعملها بأمان.</div>
    <div class="en">🇬🇧 JavaScript in the browser can't read a file from the server directly, can't connect to a database, and can't hold a secret (like an API key) without it being visible to anyone who opens Developer Tools. The code below is real PHP reading a config file that lives on the server — something Frontend can never safely do.</div>
</div>

<pre><code>&lt;?php
// ملف إعدادات "سري" موجود بس على السيرفر — الـ Frontend عمره ما هيشوفه
$config = [
    'app_name' => 'Sila Task Manager',
    'db_host' => 'localhost',
    'api_secret' => 'sk_live_9f8e7d6c5b4a...', // لو ده كان في JavaScript، أي حد يقدر يشوفه
];

echo "App: {$config['app_name']}" . PHP_EOL;
echo "DB Host: {$config['db_host']}" . PHP_EOL;
echo "Secret length: " . strlen($config['api_secret']) . " chars (never sent to the browser)" . PHP_EOL;</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">App: Sila Task Manager
DB Host: localhost
Secret length: 23 chars (never sent to the browser)</div>
<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ إن السطر الأخير طبع طول السر بس (23 حرف)، مش السر نفسه — كده الـ Backend بيستخدم السر (زي للاتصال بخدمة خارجية) من غير ما يسرّبه لأي حد. لو حاولت تعمل نفس الحاجة بـ JavaScript، أي حد بيفتح "View Source" أو Developer Tools هيشوف السر كامل.</div>
    <div class="en">🇬🇧 Notice the last line only printed the secret's length (23 characters), not the secret itself — this is how the Backend uses a secret (say, to talk to an external service) without ever leaking it. Try the same thing in JavaScript, and anyone opening "View Source" or Developer Tools would see the whole secret.</div>
</div>

<div class="mini-editor-wrap">
    <textarea spellcheck="false">&lt;?php
$config = [
    'app_name' => 'Sila Task Manager',
    'db_host' => 'localhost',
    'api_secret' => 'sk_live_9f8e7d6c5b4a...',
];

echo "App: {$config['app_name']}" . PHP_EOL;
echo "DB Host: {$config['db_host']}" . PHP_EOL;
echo "Secret length: " . strlen($config['api_secret']) . " chars (never sent to the browser)" . PHP_EOL;

// جرّب تضيف مفتاح إعدادات جديد وتطبعه
</textarea>
    <div class="mini-toolbar">
        <button class="mini-run-btn">▶ شغّل / Run</button>
        <span class="mini-status"></span>
    </div>
    <div class="output-box">— لسه متشغلش / not run yet —</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="backend">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">التحقق من صحة كلمة مرور (طولها، فيها رقم) لازم يتعمل فين عشان يبقى آمن فعلًا؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Where must password validation happen to be genuinely secure?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="frontend"> Frontend بس (JavaScript)</label>
        <label><input type="radio" name="q1" value="backend"> Backend (حتى لو موجود في الـ Frontend كمان للسرعة)</label>
        <label><input type="radio" name="q1" value="neither"> مش محتاج تحقق خالص</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>
<div class="quiz-box" data-correct="webserver">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">أنهي مكوّن بيستقبل طلب HTTP فعليًا من الإنترنت أول حاجة؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Which component actually receives the HTTP request from the internet first?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="database"> Database</label>
        <label><input type="radio" name="q2" value="webserver"> Web Server (زي Nginx/Apache)</label>
        <label><input type="radio" name="q2" value="browser"> Browser</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>
<div class="quiz-box" data-correct="secret">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">ليه مفتاح API "سري" لازم يتخزن في الـ Backend مش في كود JavaScript؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Why must a "secret" API key live in the Backend, not in JavaScript code?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="secret"> لإن أي حد بيفتح Developer Tools/View Source هيشوف كود JavaScript كامل</label>
        <label><input type="radio" name="q3" value="speed"> عشان يبقى أسرع بس</label>
        <label><input type="radio" name="q3" value="nodiff"> مفيش فرق حقيقي</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>
<div class="quiz-box" data-correct="appserver">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">فين كود PHP بتاعك بيتشغّل فعليًا؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Where does your PHP code actually run?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="browser"> جوه المتصفح مع الـ HTML</label>
        <label><input type="radio" name="q4" value="appserver"> على السيرفر، جوه Application Server</label>
        <label><input type="radio" name="q4" value="database"> جوه قاعدة البيانات مباشرة</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ صنّف المهام / Classify the Tasks</h3>
    <div class="ar">🇪🇬 اكتب قايمة من 6 مهام في تطبيق (زي: "تلوين الزرار لما تحوم عليه بالماوس"، "التأكد إن الإيميل مش مكرر في قاعدة البيانات"، "حساب الضريبة على الفاتورة"، "عرض Animation لما تفتح قايمة"، "منع مستخدم من حذف بيانات مستخدم تاني"، "التحقق من طول كلمة المرور وقت الكتابة") وصنّف كل واحدة: Frontend ولا Backend ولا الاتنين؟</div>
    <div class="en">🇬🇧 Write a list of 6 tasks in an app (e.g. "coloring a button on hover", "checking an email isn't already registered", "calculating tax on an invoice", "showing an animation when a menu opens", "preventing a user from deleting another user's data", "checking password length while typing") and classify each: Frontend, Backend, or both?</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 كل مشروع هتبنيه في المسار ده — من آلة حاسبة بسيطة لـ E-Commerce كامل — هيكون Backend بمعنى الكلمة: كود بيشتغل على السيرفر، بعيد عن عين المستخدم، مسؤول عن الصحة والأمان. المرحلة الجاية هتاخدك لمهارات المطور الحقيقية اللي هتحتاجها طول الطريق.</div>
    <div class="en">🇬🇧 Every project you'll build in this track — from a simple calculator to a full E-Commerce backend — will be Backend in the true sense: code running on the server, out of the user's sight, responsible for correctness and safety. The next lesson takes you through the real developer skills you'll need the whole way.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>Frontend = جوه المتصفح، المستخدم شايفه. Backend = على السيرفر، بعيد عن عينه.</li>
        <li>أي تحقق أمني لازم يتعمل في الـ Backend، حتى لو موجود في الـ Frontend كمان.</li>
        <li>Client → Web Server → Application Server → Database، ورجوع بنفس الترتيب.</li>
        <li>أسرار زي مفاتيح API لازم تعيش في الـ Backend بس.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <span></span>
    <a href="developer-skills.php">المرحلة الجاية / Next: مهارات المطور الحقيقية →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
