<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'sessions-basics';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'الفورمات، الجلسات، والكوكيز — الجلسات (Sessions)';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">Stage 5 · Forms, Sessions & Cookies</span>
<h1>الجلسات (Sessions) <span class="ltr">Sessions</span></h1>
<p class="subtitle">$_SESSION, session_start(), وإزاي السيرفر "بيفتكر" مستخدم عبر أكتر من طلب. <span class="ltr">$_SESSION, session_start(), and how the server "remembers" a user across multiple requests.</span></p>

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
    <div class="ar">🇪🇬 HTTP بروتوكول "Stateless" — كل طلب (Request) بيوصل السيرفر منفصل تمامًا عن اللي قبله، والسيرفر مالوش أي ذاكرة طبيعية إنك "نفس الشخص" اللي طلب قبل شوية. الـ Session هي الحل: السيرفر بيحتفظ ببيانات على جهازه هو (مش عندك)، ومربوطها بمعرّف صغير (Session ID) بيتخزن في كوكي على متصفحك عشان يعرف يربط طلباتك ببعضها.</div>
    <div class="en">🇬🇧 HTTP is "stateless" — every request that reaches the server is completely disconnected from the one before it, and the server has no natural memory that you're "the same person" who asked a moment ago. A Session is the fix: the server keeps data on its own side (not yours), tied to a small identifier (a Session ID) stored in a cookie on your browser so it can link your requests together.</div>
</div>

<h2 id="understand">🧠 1) session_start() و $_SESSION / session_start() and $_SESSION</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <code>session_start()</code> لازم تتنادى في أول كل صفحة عايزة تستخدم الجلسة، قبل أي طباعة. أول مرة، PHP بتولّد Session ID عشوائي، تخزن بياناته في ملف على السيرفر، وتبعت الكوكي دي للمتصفح. في أي طلب بعد كده، المتصفح بيرجّع نفس الكوكي، فـ <code>session_start()</code> بتلاقي نفس الملف وتحمّل بياناته جوه <code>$_SESSION</code> تاني.</div>
    <div class="en">🇬🇧 <code>session_start()</code> must be called at the top of every page that needs the session, before any output. The first time, PHP generates a random Session ID, stores its data in a file on the server, and sends that cookie to the browser. On every following request, the browser sends the same cookie back, so <code>session_start()</code> finds the same file and loads its data back into <code>$_SESSION</code>.</div>
</div>

<pre><code>&lt;?php
session_start();
$_SESSION['user'] = 'Ahmed';
echo "Set \$_SESSION['user'] = 'Ahmed'" . PHP_EOL;
echo "Reading it back immediately: " . $_SESSION['user'] . PHP_EOL;</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">Set $_SESSION['user'] = 'Ahmed'
Reading it back immediately: Ahmed</div>

<h2 id="practice">💻 2) إثبات الاستمرارية عبر طلبين حقيقيين / Proving Persistence Across Two Real Requests</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 الجزء المهم هنا مش إن نقرأ ونكتب في نفس السطر (ده أي متغيّر عادي يعمله) — المهم إن القيمة تفضل موجودة في "طلب" منفصل تمامًا. عشان نثبت ده بصدق بدون سيرفر ويب فعلي، شغّلنا PHP CLI مرتين — كل مرة عملية (Process) مستقلة تمامًا، زي طلبين حقيقيين — وحطينا نفس الـ Session ID يدويًا بـ <code>session_id()</code> قبل <code>session_start()</code> عشان نحاكي "نفس الكوكي راجع من نفس المتصفح".</div>
    <div class="en">🇬🇧 The important part isn't reading and writing on the same line (any ordinary variable does that) — it's that the value survives in a completely separate "request". To prove this honestly without a real web server, we ran PHP CLI twice — each run a fully independent process, like two real requests — and manually set the same Session ID with <code>session_id()</code> before <code>session_start()</code> to simulate "the same cookie coming back from the same browser".</div>
</div>

<pre><code>&lt;?php
// --- Script A: run #1 (simulating the FIRST request) ---
session_id('demosession12345');
session_start();
echo "Session ID: " . session_id() . PHP_EOL;
$_SESSION['user'] = 'Ahmed';
echo "Set \$_SESSION['user'] = 'Ahmed'" . PHP_EOL;
echo "Reading it back immediately: " . $_SESSION['user'] . PHP_EOL;
session_write_close();</code></pre>
<h3>الناتج الفعلي لأول عملية تشغيل / Actual output of run #1</h3>
<div class="output-box">Session ID: demosession12345
Set $_SESSION['user'] = 'Ahmed'
Reading it back immediately: Ahmed</div>

<pre><code>&lt;?php
// --- Script B: run #2, a SEPARATE PHP process (simulating a SECOND request) ---
session_id('demosession12345'); // same ID = same "cookie" coming back
session_start();
echo "Session ID: " . session_id() . PHP_EOL;
echo "Value of \$_SESSION['user'] in this NEW script run: " . ($_SESSION['user'] ?? '(not set)') . PHP_EOL;
session_write_close();</code></pre>
<h3>الناتج الفعلي لثاني عملية تشغيل (عملية PHP منفصلة تمامًا) / Actual output of run #2 (a totally separate PHP process)</h3>
<div class="output-box">Session ID: demosession12345
Value of $_SESSION['user'] in this NEW script run: Ahmed</div>

<div class="bi-block">
    <div class="ar">🇪🇬 <code>Ahmed</code> ظهرت في عملية تشغيل تانية خالص، معندهاش أي متغيّرات مشتركة مع الأولى في الذاكرة — القيمة الوحيدة اللي وصلت من هناك هي <code>demosession12345</code>. ده بالظبط اللي بيحصل بين متصفحك والسيرفر: المتصفح مش بيبعت "Ahmed"، بيبعت بس الـ Session ID، والسيرفر هو اللي بيرجع لملفه ويلاقي "Ahmed" مخزّنة جواه.</div>
    <div class="en">🇬🇧 <code>Ahmed</code> showed up in an entirely separate run, sharing no in-memory variables with the first one — the only thing that carried over was <code>demosession12345</code>. That's exactly what happens between your browser and the server: the browser doesn't send "Ahmed", it just sends the Session ID, and the server is the one that goes back to its file and finds "Ahmed" stored inside.</div>
</div>

<div class="mini-editor-wrap">
    <textarea spellcheck="false">&lt;?php
session_start();

if (!isset($_SESSION['visits'])) {
    $_SESSION['visits'] = 0;
}
$_SESSION['visits']++;

echo "Session ID: " . session_id() . PHP_EOL;
echo "Visits this run: " . $_SESSION['visits'] . PHP_EOL;
echo "(Note: the mini editor runs a fresh process each time, so 'visits'\nwon't accumulate across clicks here the way it would across real\nbrowser requests to the same PHP app.)" . PHP_EOL;</textarea>
    <div class="mini-toolbar">
        <button class="mini-run-btn">▶ شغّل / Run</button>
        <span class="mini-status"></span>
    </div>
    <div class="output-box">— لسه متشغلش / not run yet —</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="stateless">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">ليه احتجنا Sessions أصلًا؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Why do we need Sessions in the first place?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="stateless"> لإن HTTP بروتوكول Stateless ومش بيفتكر حاجة بين الطلبات لوحده</label>
        <label><input type="radio" name="q1" value="speed"> عشان الموقع يحمّل أسرع</label>
        <label><input type="radio" name="q1" value="db"> عشان نستغني عن قواعد البيانات</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="server">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">بيانات <code>$_SESSION</code> فعليًا بتتخزن فين؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Where is <code>$_SESSION</code> data actually stored?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="browser"> جوه المتصفح نفسه</label>
        <label><input type="radio" name="q2" value="server"> على السيرفر (ملف أو تخزين آخر)، والمتصفح شايل الـ ID بس</label>
        <label><input type="radio" name="q2" value="url"> في الـ URL دايمًا</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="ahmed">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">حسب المثال المنفّذ فوق (Script A ثم Script B بنفس الـ Session ID)، إيه اللي طبعه Script B لـ <code>$_SESSION['user']</code>؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Based on the executed example, what did Script B print for <code>$_SESSION['user']</code>?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="notset"> (not set)</label>
        <label><input type="radio" name="q3" value="ahmed"> Ahmed</label>
        <label><input type="radio" name="q3" value="error"> Fatal Error</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="before">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question"><code>session_start()</code> لازم تتنادى إمتى بالظبط؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Exactly when must <code>session_start()</code> be called?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="before"> قبل أي طباعة أو Output في الصفحة</label>
        <label><input type="radio" name="q4" value="after"> بعد ما تخلص الصفحة كل الطباعة</label>
        <label><input type="radio" name="q4" value="anytime"> في أي وقت، مش فارقة</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ عداد زيارات باستخدام Session / A Visit Counter Using a Session</h3>
    <div class="ar">🇪🇬 في <a href="../playground/index.php">محرر الكود</a>: اكتب كود بيستخدم <code>session_id()</code> ثابت، يتأكد لو <code>$_SESSION['count']</code> مش موجودة يبدأها بـ 0، وبعدين يزوّدها بـ 1 ويطبعها. شغّله مرتين متتاليتين (زي الدرس فوق) بنفس الـ Session ID وشوف هل العداد فعلًا بيزيد.</div>
    <div class="en">🇬🇧 In the <a href="../playground/index.php">Playground</a>: write code using a fixed <code>session_id()</code> that initializes <code>$_SESSION['count']</code> to 0 if not set, then increments and prints it. Run it twice in a row (like the lesson above) with the same Session ID and see whether the counter genuinely increases.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 الـ Session قوية بس بتتخزن على السيرفر بس — إيه لو عايز تفتكر حاجة بسيطة زي "المستخدم بيفضّل الوضع الداكن" حتى لو السيرفر يعيد تشغيل أو الجلسة تنتهي؟ الدرس الجاي بيقدّم الـ Cookies، اللي بتتخزن على جهاز المستخدم نفسه.</div>
    <div class="en">🇬🇧 Sessions are powerful but only live on the server — what if you want to remember something simple like "the user prefers dark mode" even if the server restarts or the session expires? The next lesson introduces Cookies, which are stored on the user's own device.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>HTTP بروتوكول Stateless — كل طلب منفصل، والـ Session هي طريقة السيرفر يربط الطلبات ببعضها.</li>
        <li><code>session_start()</code> لازم تتنادى قبل أي Output، وبتحمّل بيانات <code>$_SESSION</code> المرتبطة بالـ ID الجاي من الكوكي.</li>
        <li>بيانات الجلسة بتتخزن على السيرفر (زي ملف)، والمتصفح شايل بس الـ Session ID جوه كوكي.</li>
        <li>أثبتنا الاستمرارية فعليًا بتشغيل عمليتين PHP منفصلتين بنفس الـ Session ID، مش بمثال متخيّل.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="forms-registration-login.php">← الدرس السابق / Prev: Building a Real Registration &amp; Login Form</a>
    <a href="cookies-basics.php">الدرس الجاي / Next: Cookies →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
