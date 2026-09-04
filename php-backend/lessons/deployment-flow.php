<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'deployment-flow';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'رحلة النشر — The Deployment Journey';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">Stage 16 · Deployment &amp; DevOps Basics</span>
<h1>رحلة النشر: من الكود للسيرفر <span class="ltr">The Deployment Journey: From Code to Server</span></h1>
<p class="subtitle">Domain → DNS → Server → Nginx/Apache → PHP → Application → Database، خطوة خطوة. <span class="ltr">Domain → DNS → Server → Nginx/Apache → PHP → Application → Database, step by step.</span></p>

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
    <div class="ar">🇪🇬 بعد Git (الدرس اللي فات) وLinux (اللي قبله)، عندك الأدوات. الدرس ده هيوريك "الصورة الكاملة": إيه اللي بيحصل بالظبط من لحظة ما حد يكتب اسم موقعك في المتصفح لحد ما كود الـ PHP بتاعك يرد عليه فعليًا — Domain، DNS, Server، Nginx/Apache، PHP، Application، Database. وهتشوف نقطة تنفيذ حقيقية واحدة: إزاي الكود بيقرأ Environment Variables فعليًا وقت التشغيل.</div>
    <div class="en">🇬🇧 After Git (previous lesson) and Linux (before it), you have the tools. This lesson gives you "the full picture": exactly what happens from the moment someone types your site's name in a browser to your PHP code actually responding — Domain, DNS, Server, Nginx/Apache, PHP, Application, Database. And you'll see one real executable proof point: how code genuinely reads Environment Variables at runtime.</div>
</div>

<h2 id="understand">🧠 الرحلة الكاملة / The Full Journey</h2>
<div class="flow-diagram">
    <div class="flow-box">Domain (example.com)</div>
    <div class="flow-arrow">↓ DNS lookup</div>
    <div class="flow-box">DNS (returns server's IP)</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">Server (a real machine, at that IP)</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">Nginx / Apache (web server, port 443/80)</div>
    <div class="flow-arrow">↓ forwards PHP requests</div>
    <div class="flow-box">PHP (PHP-FPM, port 9000)</div>
    <div class="flow-arrow">↓ runs your code</div>
    <div class="flow-box">Application (your MVC code — Router → Controller → Model)</div>
    <div class="flow-arrow">↓ SQL</div>
    <div class="flow-box">Database (MySQL)</div>
</div>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>Domain:</b> الاسم اللي بيكتبه المستخدم (زي <code>example.com</code>) — مش مكان فعلي، مجرد اسم سهل للتذكر. <b>DNS:</b> "دليل تليفونات" الإنترنت — بيحوّل الاسم لعنوان IP حقيقي (زي <code>192.0.2.10</code>) بيعرف يوصل بيه المتصفح للسيرفر. <b>Server:</b> جهاز حقيقي شغال 24 ساعة، بينتظر طلبات على IP ده. <b>Nginx/Apache:</b> برنامج "بواب" بيستقبل كل الطلبات على الـ Server، ولو الطلب لملف PHP، بيمرره لـ PHP-FPM. <b>PHP:</b> بينفّذ كودك الفعلي ويرجع النتيجة. <b>Application:</b> نفس بنية MVC/Router اللي بنيتها في المرحلة اللي فاتت. <b>Database:</b> فين البيانات محفوظة فعليًا.</div>
    <div class="en">🇬🇧 <b>Domain:</b> the name a user types (like <code>example.com</code>) — not an actual location, just a memorable name. <b>DNS:</b> the internet's "phone book" — translates the name into a real IP address (like <code>192.0.2.10</code>) the browser can actually reach a server through. <b>Server:</b> a real machine running 24/7, waiting for requests at that IP. <b>Nginx/Apache:</b> a "gatekeeper" program that receives every request hitting the server, and if it's for a PHP file, forwards it to PHP-FPM. <b>PHP:</b> executes your actual code and returns the result. <b>Application:</b> the same MVC/Router structure you built in the previous stage. <b>Database:</b> where the data actually lives.</div>
</div>

<h2>الفرق بين بيئة التطوير والإنتاج / Development vs Production</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 على جهازك (Development)، مفيد إن الأخطاء تظهر كاملة على الشاشة (<code>display_errors = On</code>) عشان تصلحها بسرعة. على السيرفر الحي (Production)، ده خطر أمني — رسالة خطأ PHP ممكن تكشف مسار ملفات أو تفاصيل قاعدة بيانات لأي زائر. القاعدة: <code>display_errors = Off</code> في Production، والأخطاء تتسجل في Log بدل ما تظهر (بالظبط زي درس Professional Level في مسار MVC).</div>
    <div class="en">🇬🇧 On your machine (Development), it's helpful for errors to show fully on screen (<code>display_errors = On</code>) so you can fix them fast. On a live server (Production), that's a security risk — a PHP error message can expose file paths or database details to any visitor. The rule: <code>display_errors = Off</code> in Production, with errors logged instead of shown (exactly like the Professional Level lesson in the MVC track).</div>
</div>

<h2 id="practice">💻 Environment Variables — قراءة حقيقية وقت التشغيل / Environment Variables — Really Read at Runtime</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 على السيرفر الحقيقي، ملف <code>.env</code> (أو إعدادات الاستضافة) بيحدد Environment Variables زي <code>DB_PASSWORD</code> أو <code>APP_ENV</code>، وPHP بيقرأها وقت التشغيل بـ <code>getenv()</code>. الكود تحت حقيقي 100% ومتنفّذ فعليًا: <code>putenv()</code> هنا بيحاكي دور الاستضافة (أو مكتبة تحميل <code>.env</code>) في ضبط المتغير، و<code>getenv()</code> هو نفسه اللي كودك الحقيقي هيستخدمه.</div>
    <div class="en">🇬🇧 On a real server, an <code>.env</code> file (or hosting config) sets Environment Variables like <code>DB_PASSWORD</code> or <code>APP_ENV</code>, and PHP reads them at runtime with <code>getenv()</code>. The code below is 100% real and actually executed: <code>putenv()</code> here simulates the hosting environment's (or an <code>.env</code>-loading library's) role in setting the variable, and <code>getenv()</code> is the exact call your real code would use.</div>
</div>

<pre><code>&lt;?php

echo "DB_PASSWORD before putenv: " . var_export(getenv('DB_PASSWORD'), true) . PHP_EOL;

// Simulating what a real .env loader (or the OS shell) does: setting an
// environment variable that the running process can then read back.
putenv('DB_PASSWORD=s3cr3t_from_env');
putenv('APP_ENV=production');

echo "DB_PASSWORD after putenv:  " . getenv('DB_PASSWORD') . PHP_EOL;
echo "APP_ENV:                   " . getenv('APP_ENV') . PHP_EOL;

$dbPassword = getenv('DB_PASSWORD') ?: 'fallback-if-not-set';
echo "Value the app would actually use to connect: $dbPassword" . PHP_EOL;

echo "APP_DEBUG (never set): " . var_export(getenv('APP_DEBUG'), true) . PHP_EOL;</code></pre>
<h3>الناتج الفعلي (تم تنفيذه فعليًا) / Actual output (really executed)</h3>
<div class="output-box">DB_PASSWORD before putenv: false
DB_PASSWORD after putenv:  s3cr3t_from_env
APP_ENV:                   production
Value the app would actually use to connect: s3cr3t_from_env
APP_DEBUG (never set): false</div>
<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ إن <code>getenv('DB_PASSWORD')</code> رجّعت <code>false</code> قبل ما نضبطها — مش string فاضي، <code>false</code> فعليًا، وده بالظبط ليه استخدام <code>?: 'fallback-if-not-set'</code> مفيد: لو المتغير مش موجود أصلًا، الكود بيقع على قيمة افتراضية آمنة بدل ما يحاول يتصل بـ <code>false</code> كباسورد. وده نفس السبب اللي هيخليك تتأكد دايمًا إن كل Environment Variable مطلوبة فعليًا متظبطة على السيرفر قبل ما تنشر.</div>
    <div class="en">🇬🇧 Notice <code>getenv('DB_PASSWORD')</code> returned <code>false</code> before being set — not an empty string, actually <code>false</code> — which is exactly why <code>?: 'fallback-if-not-set'</code> is useful: if the variable isn't set at all, the code falls back to a safe default instead of trying to connect using <code>false</code> as a password. This is also why you should always confirm every required Environment Variable is genuinely set on the server before deploying.</div>
</div>

<h2>صلاحيات الملفات، اللوجز، والنسخ الاحتياطية / File Permissions, Logs &amp; Backups</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>File Permissions:</b> زي ما شفت في درس Linux — مجلدات زي <code>storage/</code> أو <code>uploads/</code> لازم PHP-FPM (اللي بيشتغل كـ <code>www-data</code>) يقدر يكتب فيها، لكن باقي الملفات (كود المشروع) الأفضل تفضل للقراءة بس عشان لو حد اخترق السيرفر مايقدرش يعدّل كودك. <b>Logs:</b> ملف <code>error.log</code> بتاع Nginx/Apache وملف الـ PHP log هما أول مكان تدوّر فيه لما حاجة تتعطل بعد النشر. <b>Backups:</b> نسخة احتياطية دورية من قاعدة البيانات (زي <code>mysqldump</code> يومي) — من غيرها، أي غلطة أو اختراق ممكن يمسح بيانات المستخدمين للأبد.</div>
    <div class="en">🇬🇧 <b>File Permissions:</b> as seen in the Linux lesson — folders like <code>storage/</code> or <code>uploads/</code> need PHP-FPM (running as <code>www-data</code>) to write to them, but the rest (your project's code) is best kept read-only, so a server compromise can't modify your code. <b>Logs:</b> Nginx/Apache's <code>error.log</code> and the PHP log are the first place to check when something breaks after deployment. <b>Backups:</b> a regular database backup (like a daily <code>mysqldump</code>) — without one, any mistake or breach can permanently wipe user data.</div>
</div>

<h2>ليه HTTPS مهم / Why HTTPS Matters</h2>
<div class="security-box">
    <h3>⚠️ من غير HTTPS، أي حد على نفس الشبكة يقدر يقرا بياناتك</h3>
    <div class="ar">🇪🇬 HTTPS بيشفّر البيانات بين المتصفح والسيرفر باستخدام شهادة (Certificate) صادرة من جهة موثوقة (زي Let's Encrypt مجانًا). من غيره (HTTP عادي)، أي حد على نفس شبكة الـ WiFi مثلًا يقدر "يشم" البيانات المرسلة — كلمة سر تسجيل الدخول، بيانات بطاقة ائتمان، أي حاجة. الشهادة بتضمن كمان إن السيرفر اللي بتتكلم معاه هو فعلًا اللي بيدّعي إنه هو (مش موقع مزوّر بينتحل شخصيته).</div>
    <div class="en">🇬🇧 HTTPS encrypts data between the browser and server using a Certificate issued by a trusted authority (like Let's Encrypt, for free). Without it (plain HTTP), anyone on the same network — say, the same WiFi — can "sniff" the data being sent: a login password, credit card details, anything. The certificate also guarantees the server you're talking to is genuinely who it claims to be (not a fake site impersonating it).</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="dns">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">مين المسؤول عن تحويل <code>example.com</code> لعنوان IP حقيقي؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What's responsible for translating <code>example.com</code> into a real IP address?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="dns"> DNS</label>
        <label><input type="radio" name="q1" value="nginx"> Nginx</label>
        <label><input type="radio" name="q1" value="php"> PHP-FPM</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="false">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">حسب الناتج الفعلي فوق، <code>getenv('DB_PASSWORD')</code> رجّعت إيه قبل <code>putenv()</code>؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Based on the actual output above, what did <code>getenv('DB_PASSWORD')</code> return before <code>putenv()</code>?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="false"> false</label>
        <label><input type="radio" name="q2" value="empty"> نص فاضي ""</label>
        <label><input type="radio" name="q2" value="error"> Fatal Error</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="display">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">ليه <code>display_errors</code> لازم يكون <code>Off</code> في Production؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Why should <code>display_errors</code> be <code>Off</code> in Production?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="display"> عشان رسالة الخطأ ممكن تكشف تفاصيل حساسة (مسارات، قاعدة بيانات) لأي زائر</label>
        <label><input type="radio" name="q3" value="speed"> عشان الموقع يشتغل أسرع</label>
        <label><input type="radio" name="q3" value="required"> PHP بيمنعها في Production تلقائيًا</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="https">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">إيه اللي بيحصل لو موقعك شغال بـ HTTP عادي بدون HTTPS؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What happens if your site runs on plain HTTP without HTTPS?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="https"> أي حد على نفس الشبكة يقدر "يشم" ويقرا البيانات المرسلة زي كلمات السر</label>
        <label><input type="radio" name="q4" value="slow"> الموقع هيبقى أبطأ فقط</label>
        <label><input type="radio" name="q4" value="nothing"> مفيش فرق حقيقي غير شكل القفل في المتصفح</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ محاكاة تبديل بيئة / Simulate Switching Environments</h3>
    <div class="ar">🇪🇬 في <a href="../playground/index.php">محرر الكود</a>، خد الكود اللي فيه <code>putenv()</code>/<code>getenv()</code> فوق وزوّد متغير <code>APP_ENV</code> يتغيّر بين <code>"development"</code> و<code>"production"</code>، واكتب دالة <code>shouldShowErrors(string $env): bool</code> ترجع <code>true</code> بس لو <code>$env === 'development'</code>. جرّبها بالقيمتين وشوف الناتج.</div>
    <div class="en">🇬🇧 In the <a href="../playground/index.php">Playground</a>, take the <code>putenv()</code>/<code>getenv()</code> code above and add an <code>APP_ENV</code> variable switching between <code>"development"</code> and <code>"production"</code>, and write a <code>shouldShowErrors(string $env): bool</code> function returning <code>true</code> only when <code>$env === 'development'</code>. Try it with both values.</div>
</div>

<div class="exercise-box">
    <h3>✍️ تمرين إضافي / Extra Exercise</h3>
    <div class="ar">🇪🇬 ارسم (بالورقة أو في دماغك) الرحلة الكاملة لطلب <code>POST /login</code> على Task Manager بتاعك من لحظة ما المستخدم يدوس زرار "دخول" لحد ما يشوف رسالة نجاح — حدد فين بالظبط كل خطوة من الـ flow diagram فوق بتحصل.</div>
    <div class="en">🇬🇧 Sketch (on paper or mentally) the full journey of a <code>POST /login</code> request on your Task Manager from the moment the user clicks "Login" to seeing a success message — pinpoint exactly where each step of the flow diagram above happens.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 دلوقتي عندك الصورة الكاملة لرحلة النشر، وعرفت إزاي كودك يقرأ Environment Variables فعليًا. الحاجة الوحيدة الناقصة: إزاي تضمن إن Task Manager بتاعك يشتغل بنفس الطريقة بالظبط على أي سيرفر، من غير "شغال عندي بس". ده بالظبط موضوع الدرس الأخير: Docker.</div>
    <div class="en">🇬🇧 You now have the full picture of the deployment journey, and know how your code genuinely reads Environment Variables. One thing's still missing: how to guarantee your Task Manager behaves identically on any server, without "works on my machine only." That's exactly the final lesson: Docker.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>الرحلة: Domain → DNS → Server → Nginx/Apache → PHP → Application → Database.</li>
        <li>Development مقابل Production: الأخطاء تتعرض في الأول، وتتسجل في Log بدون عرض في التاني.</li>
        <li><code>getenv()</code>/<code>putenv()</code> حقيقيان — جربناهم فعليًا، ورجعوا <code>false</code> لو المتغير مش موجود.</li>
        <li>File Permissions, Logs, Backups, وHTTPS كلهم أساسيات لازم تكون جاهزة قبل أي نشر حقيقي.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="linux-basics-backend.php">← المرحلة السابقة</a>
    <a href="docker-fundamentals.php">المرحلة الجاية / Next: Docker Fundamentals →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
