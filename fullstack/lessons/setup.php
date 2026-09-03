<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'setup';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'الأدوات والإعدادات — Full Stack Developer';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">المرحلة 2 / Stage 2</span>
<h1>الأدوات والإعدادات <span class="ltr">Tools &amp; Setup</span></h1>
<p class="subtitle">قبل ما تكتب أي كود، محتاج تجهّز 3 حاجات بس: محرر أكواد، متصفح، وسيرفر محلي يشغّل PHP. خمس دقايق إعداد دلوقتي هيوفروا عليك ساعات لخبطة بعدين.</p>

<div class="step-tracker">
    <a href="#read">📖 Read</a>
    <a href="#understand">🧠 Understand</a>
    <a href="#quiz">🧠 Quiz</a>
    <a href="#challenge">🛠️ Challenge</a>
    <a href="#project">🚀 Project</a>
</div>

<h2 id="read">الهدف / Goal</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 تجهّز بيئة العمل بتاعتك بالكامل: محرر أكواد فيه الإضافات الصح، متصفح تستخدم أدواته للفحص، وسيرفر محلي (XAMPP) يشغّل PHP وMySQL على جهازك.</div>
    <div class="en">🇬🇧 Fully set up your work environment: a code editor with the right extensions, a browser using its inspection tools, and a local server (XAMPP) running PHP and MySQL on your machine.</div>
</div>

<h2 id="understand">1) محرر الأكواد / Code Editor</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>VS Code</b> هو الاختيار الأشهر والمجاني — خفيف وله إضافات (Extensions) لكل حاجة. أهم إضافتين لمسار Full Stack: <b>PHP Intelephense</b> (اقتراحات وأخطاء PHP وانت بتكتب) و<b>Live Server</b> (يفتح صفحاتك HTML ويحدّثها أوتوماتيك أول ما تحفظ).</div>
    <div class="en">🇬🇧 <b>VS Code</b> is the most popular free choice — lightweight, with Extensions for everything. The two most important for a Full Stack track: <b>PHP Intelephense</b> (PHP autocomplete and error-checking as you type) and <b>Live Server</b> (opens your HTML pages and auto-refreshes on save).</div>
</div>

<h2>2) المتصفح وأدوات الفحص / Browser &amp; DevTools</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 أي متصفح حديث (Chrome, Edge, Firefox) فيه <b>DevTools</b> — تفتحها بـ <code>F12</code>. تبويب <b>Elements</b> بيوريك HTML/CSS الصفحة وتقدر تعدّل عليهم مباشرة تجريبيًا. تبويب <b>Console</b> بيوريك أخطاء JavaScript ورسائل <code>console.log</code>. تبويب <b>Network</b> بيوريك كل طلب اتبعت للسيرفر (مهم جدًا لما تشتغل بفورمات أو APIs).</div>
    <div class="en">🇬🇧 Any modern browser (Chrome, Edge, Firefox) has <b>DevTools</b> — open with <code>F12</code>. The <b>Elements</b> tab shows the page's HTML/CSS and lets you experiment live. The <b>Console</b> tab shows JavaScript errors and <code>console.log</code> messages. The <b>Network</b> tab shows every request sent to the server (essential once you work with forms or APIs).</div>
</div>

<h2>3) سيرفر محلي (XAMPP) / Local Server</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 PHP لازم تشتغل جوه سيرفر عشان تجرّبها (عكس HTML/CSS/JS اللي بتفتحها كملف مباشرة). <b>XAMPP</b> بيدّيك Apache (السيرفر) وMySQL (قاعدة البيانات) وPHP كلهم في تثبيت واحد. بعد التثبيت، أي ملف بتحطه في مجلد <code>htdocs</code> بيبقى متاح على <code>http://localhost/</code>.</div>
    <div class="en">🇬🇧 PHP must run inside a server to be tested (unlike HTML/CSS/JS which you can open directly as a file). <b>XAMPP</b> bundles Apache (the server), MySQL (the database), and PHP in one install. After installing, any file you place in the <code>htdocs</code> folder becomes available at <code>http://localhost/</code>.</div>
</div>

<div class="bi-block">
    <div class="ar">🇪🇬 من المفيد تتخيل رحلة أي طلب (Request) من متصفحك لحد ما يرجعلك رد — ده اللي هيحصل مع كل صفحة PHP هتكتبها من هنا لآخر المسار.</div>
    <div class="en">🇬🇧 It helps to picture the journey of a Request from your browser until a response comes back — this is what happens with every PHP page you write from here to the end of the track.</div>
</div>

<div class="flow-diagram">
    <div class="flow-box">Browser طلب صفحة</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">Apache (XAMPP)</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">محرك PHP بيشغّل الملف</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">HTML/JSON يرجع للـ Browser</div>
</div>
<div class="bi-block">
    <div class="ar">🇪🇬 المتصفح بيطلب صفحة، <b>Apache</b> (السيرفر جوه XAMPP) بيستقبل الطلب ويلاقي الملف المطلوب، لو كان ملف <code>.php</code> بيسلّمه لمحرك PHP يشغّله سطر سطر، والناتج (HTML عادة) هو اللي بيرجع للمتصفح يعرضه. ده بالظبط اللي بيفرق PHP عن ملف HTML عادي بتفتحه مباشرة من غير سيرفر.</div>
    <div class="en">🇬🇧 The browser requests a page, <b>Apache</b> (the server inside XAMPP) receives it and locates the file, and if it's a <code>.php</code> file it hands it to the PHP engine to execute line by line — the result (usually HTML) is what returns to the browser to display. This is exactly what separates PHP from a plain HTML file you open directly without a server.</div>
</div>

<div class="exercise-box">
    <h3>✍️ تمرين عملي / Hands-on Exercise</h3>
    <div class="ar">🇪🇬 افتح DevTools (<code>F12</code>) على أي موقع بتزوره دلوقتي، روح لتبويب Elements، ودوّس على أي عنصر وعدّل نص فيه أو لون خلفيته من الـ Styles جنبه — شوف التغيير بيحصل فورًا (وهيرجع تاني لو عملت Refresh، التعديل ده تجريبي بس على جهازك).</div>
    <div class="en">🇬🇧 Open DevTools (<code>F12</code>) on any site you're currently visiting, go to the Elements tab, click any element, and edit its text or background color in the Styles panel next to it — watch the change apply instantly (it resets on refresh, this is just a local experiment).</div>
</div>

<h2>مشاكل شائعة عند الإعداد وحلولها / Common Setup Errors &amp; Fixes</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 كل مبتدئ تقريبًا بيقابل واحدة من المشاكل التلاتة دي أول ما يثبّت XAMPP — اعرفها الأول عشان متضيّعش وقت وانت لسه بادئ.</div>
    <div class="en">🇬🇧 Almost every beginner hits one of these three problems right after installing XAMPP — know them upfront so you don't waste time before you've even started.</div>
</div>

<div class="security-box">
    <h3>⚠️ المشكلة 1: Apache مش عايز يشتغل ("Port 80 in use")</h3>
    <div class="ar">🇪🇬 لوحة تحكم XAMPP بتوريك Apache باللون الأحمر ورسالة فيها <code>Port 80 in use</code>. السبب: برنامج تاني (غالبًا Skype القديم، أو Windows IIS، أو حتى VMware) حاجز نفس الـ Port. <b>الحل الأسرع:</b> افتح <code>httpd.conf</code> من زرار "Config" جنب Apache في XAMPP، وغيّر <code>Listen 80</code> و<code>ServerName localhost:80</code> إلى Port تاني زي <code>8080</code>. بعدها هتفتح مشاريعك على <span class="ltr">http://localhost:8080/</span> بدل 80.</div>
    <div class="en">🇬🇧 The XAMPP control panel shows Apache in red with <code>Port 80 in use</code>. Cause: another program (often old Skype, Windows IIS, or even VMware) is holding the same port. <b>Fastest fix:</b> open <code>httpd.conf</code> via the "Config" button next to Apache, change <code>Listen 80</code> and <code>ServerName localhost:80</code> to a different port like <code>8080</code>. You'll then open projects at <span class="ltr">http://localhost:8080/</span> instead of 80.</div>
</div>

<div class="security-box">
    <h3>⚠️ المشكلة 2: MySQL مش عايز يشتغل ("Port 3306 in use")</h3>
    <div class="ar">🇪🇬 نفس فكرة المشكلة الأولى، بس لـ MySQL على Port <code>3306</code> — غالبًا السبب نسخة MySQL تانية متثبتة على الجهاز من قبل (زي WAMP أو MySQL Workbench بيثبت نسخته الخاصة). <b>الحل:</b> إما توقف الخدمة التانية من "Services" في ويندوز، أو تغيّر Port MySQL في XAMPP من "Config" → <code>my.ini</code> → غيّر <code>port=3306</code> لـ <code>3307</code> مثلًا.</div>
    <div class="en">🇬🇧 Same idea as the first problem, but for MySQL on port <code>3306</code> — usually caused by another MySQL install already on the machine (like WAMP, or MySQL Workbench's own instance). <b>Fix:</b> either stop the other service via Windows "Services", or change MySQL's port in XAMPP via "Config" → <code>my.ini</code> → change <code>port=3306</code> to e.g. <code>3307</code>.</div>
</div>

<div class="security-box">
    <h3>⚠️ المشكلة 3: "403 Forbidden" أو صفحة فاضية على localhost</h3>
    <div class="ar">🇪🇬 فتحت <span class="ltr">http://localhost/my-project/</span> ولقيت "Forbidden" أو صفحة بيضاء. الأسباب الشائعة: (1) المجلد فيه ملفات بس مفيش <code>index.php</code> أو <code>index.html</code> — Apache مش عارف أي ملف يعرض. (2) غلطت في اسم المجلد أو المسار. (3) لسه محتفظ بملف قديم اسمه <code>index.html</code> جنب <code>index.php</code> بتاعك — Apache بيفضّل <code>index.html</code> افتراضيًا فبيعرضه هو بدل ملفك. تأكد إن ملفك اسمه بالظبط <code>index.php</code> ومفيش نسخة <code>.html</code> منافسة له في نفس المجلد.</div>
    <div class="en">🇬🇧 You open <span class="ltr">http://localhost/my-project/</span> and get "Forbidden" or a blank page. Common causes: (1) the folder has files but no <code>index.php</code> or <code>index.html</code> — Apache doesn't know which file to serve. (2) a typo in the folder name or path. (3) a leftover <code>index.html</code> sitting next to your <code>index.php</code> — Apache defaults to serving <code>index.html</code> first, so it shows that instead of your file. Make sure your file is named exactly <code>index.php</code> and there's no competing <code>.html</code> version in the same folder.</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="apache">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">مين المسؤول عن استقبال طلب المتصفح وتشغيل ملف PHP في XAMPP؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">In XAMPP, what receives the browser's request and runs the PHP file?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="mysql"> MySQL</label>
        <label><input type="radio" name="q1" value="apache"> Apache</label>
        <label><input type="radio" name="q1" value="vscode"> VS Code</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="network">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">أي تبويب في DevTools بيوريك كل طلب اتبعت للسيرفر؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Which DevTools tab shows every request sent to the server?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="elements"> Elements</label>
        <label><input type="radio" name="q2" value="console"> Console</label>
        <label><input type="radio" name="q2" value="network"> Network</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="port">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">لوحة تحكم XAMPP بتوريك Apache باللون الأحمر ورسالة <code>Port 80 in use</code>. إيه أقرب تفسير؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">The XAMPP panel shows Apache in red with <code>Port 80 in use</code>. What's the most likely explanation?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="corrupt"> ملفات XAMPP اتلفت ولازم تتثبت من جديد</label>
        <label><input type="radio" name="q3" value="port"> برنامج تاني على جهازك حاجز نفس الـ Port</label>
        <label><input type="radio" name="q3" value="internet"> مفيش اتصال إنترنت</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="indexhtml">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">فتحت مشروعك ولقيت صفحة فاضية بدل صفحتك، ولقيت جوه المجلد <code>index.html</code> قديم جنب <code>index.php</code> بتاعك. إيه الأرجح إنه بيحصل؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">You find a blank page instead of yours, and an old <code>index.html</code> sitting next to your <code>index.php</code>. What's likely happening?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="indexhtml"> Apache بيعرض الـ index.html الافتراضي بدل ملف PHP بتاعك</label>
        <label><input type="radio" name="q4" value="mysql"> MySQL واقف وده سبب الصفحة الفاضية</label>
        <label><input type="radio" name="q4" value="php"> PHP اتشال من الجهاز تمامًا</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ شغّل PHP فعليًا لأول مرة / Run PHP for the First Time, for Real</h3>
    <div class="ar">🇪🇬 لو مش مثبّت XAMPP لسه، ثبّته دلوقتي. بعد كده اعمل ملف اسمه <code>info.php</code> جوه <code>htdocs</code> وحط فيه <code>&lt;?php phpinfo(); ?&gt;</code>، وافتح <span class="ltr">http://localhost/info.php</span> في المتصفح. لو شفت صفحة فيها كل تفاصيل إعدادات PHP، يبقى السيرفر شغال صح وجاهز للمسار كامل.</div>
    <div class="en">🇬🇧 If XAMPP isn't installed yet, install it now. Then create a file named <code>info.php</code> inside <code>htdocs</code> containing <code>&lt;?php phpinfo(); ?&gt;</code>, and open <span class="ltr">http://localhost/info.php</span> in your browser. If you see a page full of PHP configuration details, your server is running correctly and ready for the whole track.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 نفس XAMPP اللي هتجهّزه دلوقتي هو اللي هيشغّل مشروعي التخرج (Contact Form وOnline Store) — من غيره مش هتقدر تجرّب ولا سطر PHP فيهم. الوقت اللي هتاخده دلوقتي في الإعداد الصح هيوفّرلك أي مشاكل بيئة عمل بعدين.</div>
    <div class="en">🇬🇧 The same XAMPP you're setting up now is what will run the two capstone projects (Contact Form and Online Store) — without it, you can't test a single line of PHP in them. The time you invest now getting the setup right saves you environment headaches later.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>VS Code + PHP Intelephense + Live Server = بيئة كتابة كاملة لـ Full Stack.</li>
        <li>DevTools (F12): Elements للـ HTML/CSS، Console لأخطاء JS، Network لطلبات السيرفر.</li>
        <li>XAMPP = Apache + MySQL + PHP في تثبيت واحد، وملفاتك في <code>htdocs</code>.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="intro.php">← المرحلة السابقة</a>
    <a href="faq.php">المرحلة الجاية / Next: أهم الأسئلة →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
