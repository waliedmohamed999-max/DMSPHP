<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'linux-basics-backend';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'أساسيات Linux للـ Backend — Linux Basics for Backend Developers';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">Stage 16 · Deployment &amp; DevOps Basics</span>
<h1>أساسيات Linux لمطوري الـ Backend <span class="ltr">Linux Basics for Backend Developers</span></h1>
<p class="subtitle">pwd, ls, cd, chmod، والفرق بين Process وPort — أوامر هتحتاجها في أي سيرفر حقيقي. <span class="ltr">pwd, ls, cd, chmod, and the process-vs-port distinction — commands you'll need on any real server.</span></p>

<div class="step-tracker">
    <a href="#read">📖 Read</a>
    <a href="#understand">🧠 Understand</a>
    <a href="#quiz">🧠 Quiz</a>
    <a href="#challenge">🛠️ Challenge</a>
    <a href="#project">🚀 Project</a>
</div>

<h2 id="read">📖 الهدف / Goal</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 أي سيرفر حقيقي هتنشر عليه مشروع PHP (شركة استضافة، VPS، أو Cloud) غالبًا بيشتغل بنظام Linux. تتعرف على أوامر التيرمينال الأساسية، ومفاهيم Process/Port/Environment Variables/Logs/Services. زي درس Git، نفس التنبيه الصريح: منصة الدروس بتشغّل PHP فعليًا في كل درس تاني، لكن أوامر Linux دي بتتعامل مع نظام تشغيل حقيقي مش قابل للتنفيذ الآمن جوه الـ Sandbox هنا — فالأوامر والنواتج تحت توضيحية (Illustrative)، مكتوبة بدقة لكن مش نتيجة تشغيل فعلي.</div>
    <div class="en">🇬🇧 Any real server you deploy a PHP project to (a hosting company, a VPS, or the Cloud) almost always runs Linux. Learn the core terminal commands, and the Process/Port/Environment Variables/Logs/Services concepts. Same honest note as the Git lesson: this platform runs real PHP in every other lesson, but these Linux commands operate on a real operating system that can't be safely executed inside this platform's sandbox — so the commands and outputs below are illustrative, accurately written but not the result of an actual run.</div>
</div>

<h2 id="understand">🧠 أوامر أساسية / Core Commands</h2>
<pre><code>pwd</code></pre>
<p class="ltr" style="color:var(--muted);font-size:0.85em">Typical output (illustrative — run this yourself in a real terminal to see your own):</p>
<div class="output-box">/var/www/task-manager</div>
<div class="bi-block">
    <div class="ar">🇪🇬 <code>pwd</code> (Print Working Directory) بيوريك المسار الكامل للمجلد اللي انت فيه دلوقتي — أول حاجة تتأكد منها لما تدخل سيرفر جديد.</div>
    <div class="en">🇬🇧 <code>pwd</code> (Print Working Directory) shows the full path of the folder you're currently in — the first thing to check when you SSH into a new server.</div>
</div>

<pre><code>ls -la</code></pre>
<p class="ltr" style="color:var(--muted);font-size:0.85em">Typical output (illustrative — run this yourself in a real terminal to see your own):</p>
<div class="output-box">drwxr-xr-x  4 waleed www-data  4096 Sep  3 10:15 .
drwxr-xr-x 12 root   root      4096 Aug 20 08:00 ..
-rw-r--r--  1 waleed www-data   512 Sep  3 09:50 .env
-rw-r--r--  1 waleed www-data  1834 Sep  1 14:22 index.php
drwxr-xr-x  3 waleed www-data  4096 Sep  1 14:22 src</div>
<div class="bi-block">
    <div class="ar">🇪🇬 <code>-la</code> بتوري كل الملفات (حتى المخفية زي <code>.env</code>) بتفاصيل كاملة: الصلاحيات (<code>drwxr-xr-x</code>)، المالك (<code>waleed</code>)، المجموعة (<code>www-data</code>)، والحجم والتاريخ.</div>
    <div class="en">🇬🇧 <code>-la</code> shows every file (even hidden ones like <code>.env</code>) with full detail: permissions (<code>drwxr-xr-x</code>), owner (<code>waleed</code>), group (<code>www-data</code>), size, and date.</div>
</div>

<pre><code>cd src
cd ..
cd ~</code></pre>
<p class="ltr" style="color:var(--muted);font-size:0.85em">Typical output (illustrative — run this yourself in a real terminal to see your own):</p>
<div class="output-box">(no output — cd only changes the current directory, confirm with `pwd`)</div>

<pre><code>mkdir logs
cp config.example.php config.php
mv old-name.php new-name.php
rm temp-file.txt</code></pre>
<p class="ltr" style="color:var(--muted);font-size:0.85em">Typical output (illustrative — run this yourself in a real terminal to see your own):</p>
<div class="output-box">(no output on success for any of these)</div>
<div class="bi-block">
    <div class="ar">🇪🇬 <code>mkdir</code> بيعمل مجلد، <code>cp</code> بينسخ ملف، <code>mv</code> بينقل أو يعيد تسمية، <code>rm</code> بيمسح. تنبيه مهم: <code>rm</code> مفيهوش "سلة مهملات" على Linux — الملف بيتمسح فورًا وبشكل نهائي.</div>
    <div class="en">🇬🇧 <code>mkdir</code> creates a folder, <code>cp</code> copies a file, <code>mv</code> moves or renames, <code>rm</code> deletes. Important warning: <code>rm</code> has no "trash can" on Linux — the file is deleted immediately and permanently.</div>
</div>

<pre><code>cat .env</code></pre>
<p class="ltr" style="color:var(--muted);font-size:0.85em">Typical output (illustrative — run this yourself in a real terminal to see your own):</p>
<div class="output-box">DB_HOST=localhost
DB_NAME=task_manager
DB_PASS=s3cr3t</div>
<div class="bi-block">
    <div class="ar">🇪🇬 <code>cat</code> بيطبع محتوى ملف كامل على الشاشة — مفيد لملفات صغيرة زي <code>.env</code> أو ملفات إعدادات، مش عملي لملفات كبيرة.</div>
    <div class="en">🇬🇧 <code>cat</code> prints a file's entire content to the screen — handy for small files like <code>.env</code> or config files, not practical for large ones.</div>
</div>

<pre><code>grep "ERROR" storage/logs/app.log</code></pre>
<p class="ltr" style="color:var(--muted);font-size:0.85em">Typical output (illustrative — run this yourself in a real terminal to see your own):</p>
<div class="output-box">[03-Sep-2026 10:15:02] ERROR: Orders insert failed: SQLSTATE[23000]
[03-Sep-2026 11:02:41] ERROR: Undefined array key "email"</div>
<div class="bi-block">
    <div class="ar">🇪🇬 <code>grep</code> بيدور على نص معين جوه ملف (أو أكتر) ويطبع بس السطور اللي فيها التطابق — بدل ما تفتح ملف log فيه آلاف السطور وتدور بعينك.</div>
    <div class="en">🇬🇧 <code>grep</code> searches for text inside a file (or several) and prints only the matching lines — instead of opening a log file with thousands of lines and searching by eye.</div>
</div>

<pre><code>find /var/www -name "*.env"</code></pre>
<p class="ltr" style="color:var(--muted);font-size:0.85em">Typical output (illustrative — run this yourself in a real terminal to see your own):</p>
<div class="output-box">/var/www/task-manager/.env
/var/www/old-project/.env</div>

<pre><code>chmod 644 config.php
chmod 755 storage/
chown www-data:www-data storage/</code></pre>
<p class="ltr" style="color:var(--muted);font-size:0.85em">Typical output (illustrative — run this yourself in a real terminal to see your own):</p>
<div class="output-box">(no output on success — verify with `ls -la`)</div>
<div class="bi-block">
    <div class="ar">🇪🇬 <code>chmod</code> بيغيّر الصلاحيات (مين يقرا/يكتب/ينفّذ). <code>644</code> معناها المالك يقرا ويكتب، والباقي يقرا بس — مناسب لملف عادي. <code>755</code> بتضيف صلاحية التنفيذ/الدخول للمالك والباقي — مناسب لمجلد. <code>chown</code> بيغيّر المالك والمجموعة — مهم عشان PHP-FPM أو Apache (اللي بيشتغلوا كـ <code>www-data</code> غالبًا) يقدروا يكتبوا في مجلد زي <code>storage/</code>.</div>
    <div class="en">🇬🇧 <code>chmod</code> changes permissions (who can read/write/execute). <code>644</code> means the owner can read and write, everyone else read-only — fine for a regular file. <code>755</code> adds execute/enter permission for the owner and everyone — needed for a folder. <code>chown</code> changes the owner and group — important so PHP-FPM or Apache (which usually run as <code>www-data</code>) can actually write to a folder like <code>storage/</code>.</div>
</div>

<h2>Process, Port، وEnvironment Variables</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>Process (عملية):</b> برنامج شغال فعليًا في الذاكرة — زي PHP-FPM أو MySQL. كل process ليه رقم (PID) تقدر تشوفه بأمر <code>ps aux</code>. <b>Port (منفذ):</b> رقم بيحدد "الباب" اللي عملية معينة بتسمع منه طلبات الشبكة — مثلًا، سيرفرك بتاع PHP-FPM بيسمع عادة على <code>Port 9000</code>، وMySQL على <code>Port 3306</code>، وأي موقع HTTPS بيتكلم على <code>Port 443</code>. لو عمليتين حاولوا يستخدموا نفس الـ Port في نفس الوقت، هتاخد خطأ "Address already in use". <b>Environment Variable:</b> قيمة متاحة لأي عملية شغالة على السيرفر، بتتقرأ وقت التشغيل — زي <code>DB_PASSWORD</code> في ملف <code>.env</code>، عشان السر ميتكتبش جوه الكود المرفوع على Git.</div>
    <div class="en">🇬🇧 <b>Process:</b> a program actually running in memory — like PHP-FPM or MySQL. Every process has a number (PID) you can see with <code>ps aux</code>. <b>Port:</b> a number identifying the "door" a given process listens on for network requests — for example, your PHP-FPM server usually listens on <b>Port 9000</b>, MySQL on <b>Port 3306</b>, and any HTTPS site on <b>Port 443</b>. If two processes try to use the same port at once, you get an "Address already in use" error. <b>Environment Variable:</b> a value available to any process running on the server, read at runtime — like <code>DB_PASSWORD</code> in an <code>.env</code> file, so the secret is never written inside code pushed to Git.</div>
</div>

<pre><code>ps aux | grep php-fpm</code></pre>
<p class="ltr" style="color:var(--muted);font-size:0.85em">Typical output (illustrative — run this yourself in a real terminal to see your own):</p>
<div class="output-box">www-data  1234  0.2  1.1  215432 22016 ?  S  09:00  0:03 php-fpm: master process
www-data  1235  0.0  0.9  215432 18420 ?  S  09:00  0:00 php-fpm: pool www</div>

<h2>Logs و Services / Logs &amp; Services</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>Logs:</b> ملفات نصية بتسجل كل حاجة حصلت — أخطاء PHP، طلبات HTTP، محاولات دخول فاشلة. أول مكان تدوّر فيه لما حاجة تعطل على السيرفر (زي <code>error_log</code> من درس Professional Level بتاع مسار MVC). <b>Service:</b> برنامج بيشتغل باستمرار في الخلفية (زي <code>nginx</code> أو <code>mysql</code>)، وبيتحكم فيه بأمر زي <code>systemctl</code>.</div>
    <div class="en">🇬🇧 <b>Logs:</b> text files recording everything that happened — PHP errors, HTTP requests, failed login attempts. The first place to check when something breaks on a server (the same <code>error_log</code> idea from the MVC track's Professional Level lesson). <b>Service:</b> a program that keeps running in the background (like <code>nginx</code> or <code>mysql</code>), controlled with a command like <code>systemctl</code>.</div>
</div>
<pre><code>sudo systemctl status nginx
sudo systemctl restart php8.2-fpm</code></pre>
<p class="ltr" style="color:var(--muted);font-size:0.85em">Typical output (illustrative — run this yourself in a real terminal to see your own):</p>
<div class="output-box">● nginx.service - A high performance web server
     Loaded: loaded (/lib/systemd/system/nginx.service; enabled)
     Active: active (running) since Wed 2026-09-03 08:00:12 UTC; 2h 14min ago</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="pwd">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">عايز تعرف المسار الكامل للمجلد اللي انت فيه دلوقتي — أنهي أمر؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">You want the full path of your current folder — which command?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="pwd"> pwd</label>
        <label><input type="radio" name="q1" value="ls"> ls</label>
        <label><input type="radio" name="q1" value="cat"> cat</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="port">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">MySQL بيسمع طلبات الشبكة على 3306، وPHP-FPM على 9000 — إيه اللي بيحدد الرقم ده؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">MySQL listens on 3306, PHP-FPM on 9000 — what does this number represent?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="port"> الـ Port اللي العملية بتسمع منه</label>
        <label><input type="radio" name="q2" value="pid"> رقم الـ Process ID</label>
        <label><input type="radio" name="q2" value="permission"> رقم صلاحيات الملف</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="env">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">ليه <code>DB_PASSWORD</code> بيتحط في Environment Variable (زي ملف .env) بدل ما يتكتب مباشرة جوه كود PHP؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Why does <code>DB_PASSWORD</code> go in an Environment Variable (like an .env file) instead of directly in PHP code?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="env"> عشان السر متتكتبش جوه الكود اللي بيترفع على Git</label>
        <label><input type="radio" name="q3" value="speed"> عشان يشتغل أسرع</label>
        <label><input type="radio" name="q3" value="required"> PHP بيرفض قراءة باسورد من كود مباشر</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="chmod">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">مجلد <code>storage/</code> محتاج PHP-FPM (بيشتغل كـ www-data) يقدر يكتب فيه — أنهي أمر مسؤول عن ده؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">A <code>storage/</code> folder needs PHP-FPM (running as www-data) to write into it — which command handles this?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="chmod"> chmod و chown لضبط الصلاحيات والمالك</label>
        <label><input type="radio" name="q4" value="grep"> grep</label>
        <label><input type="radio" name="q4" value="find"> find</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ استكشف سيرفر حقيقي (أو WSL/Git Bash) / Explore a Real Server (or WSL/Git Bash)</h3>
    <div class="ar">🇪🇬 على جهازك: افتح Terminal حقيقي (Git Bash على ويندوز، أو WSL، أو أي سيرفر Linux لو متاح). شغّل <code>pwd</code>، <code>ls -la</code>، اعمل مجلد بـ <code>mkdir test-folder</code>، ادخله بـ <code>cd</code>، اعمل ملف واكتب فيه سطر، واطبعه بـ <code>cat</code>. قارن الناتج الحقيقي عندك بالأمثلة التوضيحية فوق.</div>
    <div class="en">🇬🇧 On your machine: open a real Terminal (Git Bash on Windows, WSL, or any Linux server you have). Run <code>pwd</code>, <code>ls -la</code>, create a folder with <code>mkdir test-folder</code>, <code>cd</code> into it, create a file with a line of text, and print it with <code>cat</code>. Compare your real output to the illustrative examples above.</div>
</div>

<div class="exercise-box">
    <h3>✍️ تمرين إضافي / Extra Exercise</h3>
    <div class="ar">🇪🇬 لو عندك وصول لـ VPS أو خدمة استضافة بتدعم SSH، جرّب <code>ps aux | grep php</code> و<code>grep "ERROR"</code> على أي ملف log موجود، وشوف الفرق بين الناتج الحقيقي والأمثلة هنا.</div>
    <div class="en">🇬🇧 If you have SSH access to a VPS or hosting service, try <code>ps aux | grep php</code> and <code>grep "ERROR"</code> on any existing log file, and compare the real output to the examples here.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 لما تيجي تنشر Task Manager على سيرفر حقيقي، هتحتاج بالظبط الأوامر دي: <code>cd</code> لمجلد المشروع، <code>chmod/chown</code> عشان PHP يقدر يكتب في مجلدات الـ Logs، و<code>grep</code> على ملف الـ Log لما حاجة تفشل. الدرس الجاي بيوريك الرحلة الكاملة اللي بتحصل من لحظة ما تكتب اسم موقعك في المتصفح لحد ما الطلب يوصل لكود PHP بتاعك على نفس السيرفر ده.</div>
    <div class="en">🇬🇧 When you actually deploy the Task Manager to a real server, you'll need exactly these commands: <code>cd</code> into the project folder, <code>chmod/chown</code> so PHP can write to log folders, and <code>grep</code> on a log file when something fails. The next lesson shows the full journey from typing your site's name in a browser to the request reaching your PHP code on that very server.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>pwd/ls/cd للتنقل، mkdir/cp/mv/rm لإدارة الملفات، cat/grep/find لقراءة والبحث.</li>
        <li>chmod يضبط الصلاحيات (مين يقرا/يكتب/ينفّذ)، chown يضبط المالك — أساسيان لأي مجلد PHP لازم يكتب فيه.</li>
        <li>Process = برنامج شغال، Port = الرقم اللي بيسمع منه شبكيًا، Environment Variable = قيمة سرية بتتقرأ وقت التشغيل بدل ما تتكتب في الكود.</li>
        <li>كل الأوامر والنواتج هنا توضيحية 100% (Illustrative) — جرّبها بنفسك في تيرمينال حقيقي.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="git-github-basics.php">← المرحلة السابقة</a>
    <a href="deployment-flow.php">المرحلة الجاية / Next: The Deployment Journey →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
