<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'stage0';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'المرحلة 0 — تجهيز البيئة';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">المرحلة 0 / Stage 0</span>
<h1>تجهيز البيئة <span class="ltr">Environment Setup</span></h1>

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
    <div class="ar">🇪🇬 هنتأكد إن PHP شغال عندك صح، ونفهم الفرق بين إننا نشغّل PHP كـ سكريبت عادي (CLI) وبين إننا نشغّله كـ سيرفر بيرد على طلبات الويب.</div>
    <div class="en">🇬🇧 We'll confirm PHP is correctly installed, and understand the difference between running PHP as a CLI script vs. running it as a web server that responds to HTTP requests.</div>
</div>

<h2 id="understand">🧠 الشرح / Explanation</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 PHP ممكن تشتغل بطريقتين مختلفتين تمامًا: <b>CLI (Command Line Interface)</b> يعني بتشغّل ملف PHP زي أي سكريبت عادي من التيرمينال وبياخد الآوتبوت على طول — ده بتستخدمه للـ scripts والـ automation. والطريقة التانية هي <b>Web Server mode</b>، وهنا PHP بيشتغل كسيرفر بيستنى طلبات HTTP (زي لما تفتح رابط في المتصفح) ويرجع رد (response) — ده الوضع اللي فيه الـ Backend الحقيقي بيشتغل.</div>
    <div class="en">🇬🇧 PHP can run in two fundamentally different modes: <b>CLI (Command Line Interface)</b>, where you run a PHP file like any regular script from the terminal and get output immediately — used for scripts and automation. And <b>Web Server mode</b>, where PHP acts as a server waiting for HTTP requests (like when you open a link in a browser) and returns a response — this is the mode real Backend work happens in.</div>
</div>
<div class="bi-block">
    <div class="ar">🇪🇬 تشبيه: فكّر في CLI زي إنك بتكلم PHP مباشرة وجهًا لوجه، وWeb Server زي إنك حاطط PHP وراء باب بيرد بس لما حد يدق عليه (request).</div>
    <div class="en">🇬🇧 Analogy: Think of CLI as talking to PHP face-to-face directly, while Web Server mode is like putting PHP behind a door that only answers when someone knocks (a request).</div>
</div>

<h2 id="practice">💻 مثال 1 — CLI mode</h2>
<pre><code>&lt;?php
echo "Hello, PHP World!" . PHP_EOL;
echo "PHP version: " . phpversion() . PHP_EOL;</code></pre>
<h3>الناتج الفعلي (تم تنفيذه فعليًا) / Actual output</h3>
<div class="output-box">Hello, PHP World!
PHP version: 8.2.12</div>

<h2>مثال 2 — Web Server mode</h2>
<p>شغّلت <code>php -S localhost:8000</code> وعملت request حقيقي بـ curl على <code>index.php</code>:</p>
<pre><code>&lt;?php
echo "&lt;h1&gt;Hello from PHP Web Server!&lt;/h1&gt;";
echo "&lt;p&gt;Request method: " . $_SERVER['REQUEST_METHOD'] . "&lt;/p&gt;";
echo "&lt;p&gt;Server software: " . $_SERVER['SERVER_SOFTWARE'] . "&lt;/p&gt;";</code></pre>
<h3>الناتج الفعلي (تم تنفيذه فعليًا) / Actual output</h3>
<div class="output-box">&lt;h1&gt;Hello from PHP Web Server!&lt;/h1&gt;&lt;p&gt;Request method: GET&lt;/p&gt;&lt;p&gt;Server software: PHP 8.2.12 Development Server&lt;/p&gt;</div>

<h2>تحليل النتيجة / Walkthrough</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 في المثال الأول، PHP شغّل الكود من غير أي "سيرفر" — نفّذ echo على طول وطلع النتيجة في التيرمينال. في المثال التاني، PHP كان شغال كسيرفر حقيقي، وأنا بعتّله طلب HTTP بـ curl (زي المتصفح بالظبط)، وهو رجّعلي HTML، وكمان قدرنا نشوف متغير <code>$_SERVER['REQUEST_METHOD']</code> اللي بيقولنا نوع الطلب (GET) — ده هيبقى أساسي جدًا لما نوصل لموضوع الـ Forms والـ APIs.</div>
    <div class="en">🇬🇧 In the first example, PHP ran the code with no "server" involved — it just executed the echo and printed to the terminal. In the second, PHP was running as an actual server, I sent an HTTP request with curl (exactly like a browser), and it returned HTML — we also saw <code>$_SERVER['REQUEST_METHOD']</code>, essential later for Forms and APIs.</div>
</div>

<h2>تجهيز المحرر / Editor Setup</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 أي محرر نصوص يقدر يفتح ملف <code>.php</code>، بس عشان تشتغل بكفاءة محتاج على الأقل: إضافة تلوين الكود (Syntax Highlighting)، وإضافة PHP Intelephense أو مشابه لها لو بتستخدم VS Code — بتديك اقتراحات أثناء الكتابة وتوريك الأخطاء قبل ما تشغّل الكود أصلًا.</div>
    <div class="en">🇬🇧 Any text editor can open a <code>.php</code> file, but to work efficiently you want at least: Syntax Highlighting, and an extension like PHP Intelephense if you use VS Code — it gives you autocomplete and flags errors before you even run the code.</div>
</div>

<div class="bi-block">
    <div class="ar">🇪🇬 جرّب دلوقتي بنفسك — الكود تحت شغال زي CLI mode بالظبط: بيتنفذ فورًا ويرجّعلك النتيجة، من غير أي سيرفر. عدّل الاسم أو ضيف سطر <code>echo</code> جديد وشغّله.</div>
    <div class="en">🇬🇧 Try it yourself now — the code below runs exactly like CLI mode: it executes immediately and returns the result, with no server involved. Tweak the name or add a new <code>echo</code> line and run it.</div>
</div>

<div class="mini-editor-wrap">
    <textarea spellcheck="false">&lt;?php
echo "Hello, PHP World!" . PHP_EOL;
echo "PHP version: " . phpversion() . PHP_EOL;

// جرب دلوقتي تضيف دالة بسيطة وتشغّلها هنا زي أي سكريبت CLI عادي
function greet(string $name): string {
    return "Welcome to Backend development, $name!";
}
echo greet("Waleed") . PHP_EOL;</textarea>
    <div class="mini-toolbar">
        <button class="mini-run-btn">▶ شغّل / Run</button>
        <span class="mini-status"></span>
    </div>
    <div class="output-box">— لسه متشغلش / not run yet —</div>
</div>

<h2>أخطاء شائعة للمبتدئين: Windows مقابل Mac/Linux / Common Beginner Mistakes: Windows vs Mac/Linux</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 قبل ما تكمل، فيه شوية اختلافات بسيطة بين الأنظمة بتوقع مبتدئين كتير — اعرفها من الأول بدل ما تستغرب لما الأمر "الصح" مايشتغلش عندك:</div>
    <div class="en">🇬🇧 Before continuing, a few small cross-platform differences trip up most beginners — know them upfront instead of being confused when the "correct" command doesn't work on your machine:</div>
</div>
<div class="flow-diagram">
    <div class="flow-box">Windows (PowerShell/CMD)<br><span class="ltr" style="font-size:0.8em">paths use \, case-insensitive files, "php" needs adding to PATH manually after install</span></div>
    <div class="flow-arrow">↔</div>
    <div class="flow-box">Mac / Linux (bash/zsh)<br><span class="ltr" style="font-size:0.8em">paths use /, case-SENSITIVE files, "php" usually already on PATH via package manager</span></div>
</div>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>1) فاصل المسارات:</b> Windows بيستخدم <code>\</code> (زي <code>C:\Users\Waleed</code>)، وMac/Linux بيستخدم <code>/</code>. في كود PHP نفسه، متكتبش مسار بـ <code>\</code> يدوي أبدًا — استخدم <code>/</code> أو ثابت PHP زي <code>DIRECTORY_SEPARATOR</code>، وهو شغال صح على النظامين.</div>
    <div class="en">🇬🇧 <b>1) Path separators:</b> Windows uses <code>\</code> (e.g. <code>C:\Users\Waleed</code>), Mac/Linux use <code>/</code>. In PHP code itself, never hardcode a <code>\</code> path — use <code>/</code> or the <code>DIRECTORY_SEPARATOR</code> constant, which works correctly on both.</div>
</div>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>2) حساسية حالة الأحرف:</b> على Windows/Mac، ملف اسمه <code>Config.php</code> و<code>config.php</code> ممكن يتعاملوا كـ نفس الملف أحيانًا. على Linux (اللي غالبية سيرفرات الإنتاج شغالة عليه)، هما ملفين مختلفين تمامًا — لو مشروعك شغال عندك على Windows بحرف كبير غلط في اسم الملف، ممكن ينهار فجأة أول ما يترفع على سيرفر Linux.</div>
    <div class="en">🇬🇧 <b>2) Case sensitivity:</b> On Windows/Mac, <code>Config.php</code> and <code>config.php</code> can sometimes be treated as the same file. On Linux (what most production servers run), they're completely different files — a project that works locally on Windows with a wrong-case filename can suddenly break the moment it's deployed to a Linux server.</div>
</div>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>3) أمر "php" مش متعرف:</b> على Windows، تثبيت XAMPP لوحده مبيضيفش <code>php</code> لـ PATH أوتوماتيك — لازم تضيفه يدوي عشان تقدر تكتب <code>php file.php</code> من أي مجلد بدل ما تكتب المسار الكامل كل مرة. على Mac/Linux غالبًا بيتحط تلقائي مع أدوات زي Homebrew أو apt.</div>
    <div class="en">🇬🇧 <b>3) "php" not recognized:</b> On Windows, installing XAMPP alone doesn't automatically add <code>php</code> to PATH — you must add it manually to type <code>php file.php</code> from any folder instead of the full path every time. On Mac/Linux it's usually added automatically by tools like Homebrew or apt.</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="cli">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">لما تشغّل ملف PHP من التيرمينال مباشرة (<code>php me.php</code>) وتاخد الناتج فورًا من غير أي متصفح، ده أنهي وضع؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Running a PHP file directly from the terminal and getting output immediately, with no browser — which mode is this?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="webserver"> Web Server mode</label>
        <label><input type="radio" name="q1" value="cli"> CLI mode</label>
        <label><input type="radio" name="q1" value="database"> Database mode</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="server">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">المتغير <code>$_SERVER['REQUEST_METHOD']</code> ظهر في مثال الـ Web Server مش في مثال الـ CLI — ليه؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Why did <code>$_SERVER['REQUEST_METHOD']</code> appear in the Web Server example but not the CLI one?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="random"> صدفة، مفيش سبب / Random, no reason</label>
        <label><input type="radio" name="q2" value="server"> لإنه معلومة عن HTTP request، ومفيش request أصلًا في CLI</label>
        <label><input type="radio" name="q2" value="version"> بيظهر بس في نسخة PHP الحديثة</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="linux">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">مشروعك شغال تمام على جهازك (Windows) بس فيه <code>require 'Config.php'</code> بينما اسم الملف فعليًا <code>config.php</code>. رفعته على سيرفر Linux — إيه المتوقع؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Your project works fine on Windows but has <code>require 'Config.php'</code> while the file is actually <code>config.php</code>. You deploy to Linux — what happens?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="fine"> هيشتغل عادي زي Windows بالظبط</label>
        <label><input type="radio" name="q3" value="linux"> هيديك خطأ "file not found" لإن Linux حساس لحالة الأحرف</label>
        <label><input type="radio" name="q3" value="auto"> PHP هيصلحه أوتوماتيك</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="separator">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">عايز تكتب مسار ملف جوه كود PHP يشتغل صح على Windows وLinux وMac كلهم من غير تعديل، تستخدم إيه؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">To write a file path in PHP code that works correctly on Windows, Linux, and Mac without changes, what do you use?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="backslash"> <code>\</code> مكتوبة يدويًا دايمًا</label>
        <label><input type="radio" name="q4" value="separator"> <code>/</code> أو ثابت <code>DIRECTORY_SEPARATOR</code></label>
        <label><input type="radio" name="q4" value="none"> محتاج نسخة كود مختلفة لكل نظام</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ شغّل PHP كسيرفر حقيقي / Run PHP as a Real Server</h3>
    <div class="ar">🇪🇬 افتح التيرمينال في مجلد فيه ملف PHP، وشغّل <code>php -S localhost:8000</code>. افتح المتصفح على <code>http://localhost:8000/اسم_الملف.php</code> وشوف الناتج. بعد كده جرّب تطبع <code>$_SERVER['REQUEST_METHOD']</code> و<code>$_SERVER['SERVER_SOFTWARE']</code> وقارن الناتج بمثال الـ CLI فوق.</div>
    <div class="en">🇬🇧 Open a terminal in a folder with a PHP file, and run <code>php -S localhost:8000</code>. Open the browser at <code>http://localhost:8000/yourfile.php</code> and see the result. Then print <code>$_SERVER['REQUEST_METHOD']</code> and <code>$_SERVER['SERVER_SOFTWARE']</code> and compare with the CLI example above.</div>
</div>

<div class="exercise-box">
    <h3>✍️ تمرين إضافي / Extra Exercise</h3>
    <div class="ar">🇪🇬 اعمل ملف اسمه <code>me.php</code>، واستخدم <code>echo</code> عشان يطبع اسمك، اليوم الحالي (استخدم <code>date()</code>)، والرسالة "I'm learning PHP Backend". جرب شغّله في <a href="../playground/index.php">محرر الكود</a>.</div>
    <div class="en">🇬🇧 Create a file called <code>me.php</code>, use <code>echo</code> to print your name, today's date (use <code>date()</code>), and "I'm learning PHP Backend". Try it in the <a href="../playground/index.php">Playground</a>.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 كل الأدوات دي هتستخدمها طول المسار: هتشغّل مشروع Task Manager (الـ Capstone) بالظبط بنفس أمر <code>php -S</code>، وأي مشكلة في PHP نفسه هتشخصها بتشغيل ملف بسيط من CLI الأول قبل ما تدور جوه المتصفح.</div>
    <div class="en">🇬🇧 You'll use these tools throughout the path: you'll run the Capstone Task Manager with the exact same <code>php -S</code> command, and diagnose any PHP-level issue by running a simple file from the CLI first before digging through the browser.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>PHP CLI = تشغيل مباشر من التيرمينال، مفيش سيرفر.</li>
        <li><span class="ltr">PHP Web Server (php -S host:port)</span> = بيستقبل طلبات HTTP فعلية زي أي Backend حقيقي.</li>
        <li><code>$_SERVER</code> سوبر جلوبال بيدّينا معلومات عن الـ request.</li>
        <li>PHP 8.2.12 شغال وجاهز للمرحلة الجاية.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="html.php">← المرحلة السابقة</a>
    <a href="tools.php">المرحلة الجاية / Next: Developer Tools →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
