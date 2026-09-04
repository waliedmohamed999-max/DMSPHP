<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'security-passwords-sessions';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'الأمان — أمان كلمات المرور والجلسات';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">Stage 14 · Security</span>
<h1>أمان كلمات المرور والجلسات <span class="ltr">Password &amp; Session Security</span></h1>
<p class="subtitle">password_hash/verify, Session Fixation, Session Regeneration, Secure Cookies. <span class="ltr">password_hash/verify, session fixation, session regeneration, secure cookies.</span></p>

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
    <div class="ar">🇪🇬 تتعلم إزاي تخزن كلمات مرور المستخدمين بأمان باستخدام <code>password_hash()</code>/<code>password_verify()</code> (وليه أبدًا متخزنهاش كنص عادي أو حتى بـ <code>md5()</code>)، وتفهم هجوم <code>Session Fixation</code> وإزاي <code>session_regenerate_id()</code> بيمنعه، وتعرف أهمية أعلام الكوكيز الآمنة (<code>httponly</code>, <code>secure</code>, <code>samesite</code>).</div>
    <div class="en">🇬🇧 Learn how to store user passwords safely with <code>password_hash()</code>/<code>password_verify()</code> (and why you should never store them as plain text or even with <code>md5()</code>), understand the <code>Session Fixation</code> attack and how <code>session_regenerate_id()</code> prevents it, and know why secure cookie flags (<code>httponly</code>, <code>secure</code>, <code>samesite</code>) matter.</div>
</div>

<h2 id="understand">🧠 تخزين كلمات المرور / Storing Passwords</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 متخزّنش كلمة المرور كنص عادي أبدًا — لو قاعدة البيانات اتسربت، كل حسابات المستخدمين هتتكشف فورًا. <code>md5()</code>/<code>sha1()</code> كمان مش كافيين لإنهم سريعين جدًا في الحساب، فمهاجم يقدر يجرّب بلايين الاحتمالات في الثانية (Brute Force). الحل: <code>password_hash($plain, PASSWORD_DEFAULT)</code> — بتستخدم خوارزمية <code>bcrypt</code> (أو أحدث) مصمّمة تكون <b>بطيئة عمدًا</b> عشان تبطّئ أي محاولة تخمين، وبتضيف <code>salt</code> عشوائي أوتوماتيك فمفيش هاش متكرر حتى لو كلمتين سر متطابقتين.</div>
    <div class="en">🇬🇧 Never store a password as plain text — if the database leaks, every user's account is exposed instantly. <code>md5()</code>/<code>sha1()</code> aren't safe either, because they're extremely fast to compute, letting an attacker try billions of guesses per second (brute force). The fix: <code>password_hash($plain, PASSWORD_DEFAULT)</code> — it uses the <code>bcrypt</code> algorithm (or newer) which is <b>deliberately slow</b> to throttle guessing attempts, and it automatically adds a random <code>salt</code> so no two hashes are identical even for the same password.</div>
</div>

<pre><code>&lt;?php
$plain = 'secret123';
$hash = password_hash($plain, PASSWORD_DEFAULT);
echo "Password: $plain" . PHP_EOL;
echo "Hash: $hash" . PHP_EOL;
echo "Hash length: " . strlen($hash) . PHP_EOL;

var_dump(password_verify('secret123', $hash));   // كلمة السر الصح
var_dump(password_verify('wrongpass', $hash));   // كلمة سر غلط</code></pre>
<h3>الناتج الفعلي (الهاش هيختلف في كل تشغيل — ده مقصود) / Actual output (the hash differs on every run — that's by design)</h3>
<div class="output-box">Password: secret123
Hash: $2y$10$Pl83O.vpfod4PK2tGc6caeJ2abGZzDk5Al//gnk89H5PhuuihUUG6
Hash length: 60
bool(true)
bool(false)</div>

<div class="bi-block">
    <div class="ar">🇪🇬 <strong>ملحوظة مهمة:</strong> لو تشغّل نفس الكود تاني، <code>$hash</code> هيبقى نص مختلف تمامًا عن اللي فوق — ده طبيعي وليس خطأ، لإن كل استدعاء لـ <code>password_hash()</code> بيولّد <code>salt</code> عشوائي جديد. اللي مهم إن <code>password_verify()</code> برضه هيرجع <code>true</code> مع أي هاش صحيح لنفس كلمة السر، مهما اختلف شكله.</div>
    <div class="en">🇬🇧 <strong>Important note:</strong> if you run the same code again, <code>$hash</code> will be a completely different string from the one above — that's expected, not a bug, because every call to <code>password_hash()</code> generates a new random <code>salt</code>. What matters is that <code>password_verify()</code> still returns <code>true</code> against any correct hash for the same password, regardless of what it looks like.</div>
</div>

<h2 id="practice">💻 Session Fixation و Regeneration / Session Fixation &amp; Regeneration</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <code>Session Fixation</code> هجوم بيحصل لما مهاجم "يزرع" Session ID معروف عند الضحية (مثلاً عن طريق لينك فيه <code>?PHPSESSID=xxx</code>) قبل ما يسجّل دخول. لو الموقع مغيّرش الـ Session ID بعد تسجيل الدخول، المهاجم اللي عارف نفس الـ ID يقدر "يشارك" جلسة الضحية بعد ما تسجّل دخول من غير ما يعرف كلمة سرها. الحل: نادِ <code>session_regenerate_id(true)</code> فورًا بعد أي تسجيل دخول ناجح — بيولّد ID جديد كليًا ويلغي القديم.</div>
    <div class="en">🇬🇧 <code>Session Fixation</code> is an attack where an attacker "plants" a known session ID on the victim (e.g. via a link like <code>?PHPSESSID=xxx</code>) before they log in. If the site doesn't change the session ID after login, the attacker — who knows that same ID — can "share" the victim's session once they've logged in, without ever knowing their password. The fix: call <code>session_regenerate_id(true)</code> immediately after every successful login — it generates a completely new ID and invalidates the old one.</div>
</div>

<pre><code>&lt;?php
// ob_start() هنا بيسمح لينا نطبع كلام قبل استدعاء session_regenerate_id() —
// من غيرها PHP بيرفض تغيير الـ Session ID بعد ما أي Output يتبعت فعليًا.
ob_start();

session_start();
$beforeId = session_id();
echo "Session ID before login: $beforeId" . PHP_EOL;

// محاكاة تسجيل دخول ناجح: نولّد ID جديد بالكامل
session_regenerate_id(true);
$afterId = session_id();
echo "Session ID after login (regenerated): $afterId" . PHP_EOL;
var_dump($beforeId === $afterId);</code></pre>
<h3>الناتج الفعلي (اتنفّذ فعليًا — الـ IDs هتختلف في كل تشغيل) / Actual output (really executed — the IDs differ on every run)</h3>
<div class="output-box">Session ID before login: r7m8kh97acurtuh181ssi2q19l
Session ID after login (regenerated): jhlt4eef1u0t2f6608l3v4m0mv
bool(false)</div>

<div class="bi-block">
    <div class="ar">🇪🇬 <code>bool(false)</code> يعني إن الـ ID قبل وبعد <b>مختلفين</b> — بالظبط المطلوب. أي ID كان المهاجم زرعه قبل تسجيل الدخول بقى عديم الفايدة، لإن الجلسة دلوقتي شغالة بـ ID تاني تمامًا مش معروف له.</div>
    <div class="en">🇬🇧 <code>bool(false)</code> means the before/after IDs are <b>different</b> — exactly the goal. Any ID an attacker had planted before login is now useless, because the session is running under a completely different ID they don't know.</div>
</div>

<div class="mini-editor-wrap">
    <textarea spellcheck="false">&lt;?php
ob_start(); // يسمح بالطباعة قبل session_regenerate_id() من غير تحذير

session_start();
$beforeId = session_id();

// --- password_hash / password_verify ---
$plain = 'secret123';
$hash = password_hash($plain, PASSWORD_DEFAULT);
echo "Password: $plain" . PHP_EOL;
echo "Hash: $hash" . PHP_EOL;
var_dump(password_verify('secret123', $hash));
var_dump(password_verify('wrongpass', $hash));

// --- session regeneration on login ---
echo "Session ID before login: $beforeId" . PHP_EOL;
session_regenerate_id(true);
$afterId = session_id();
echo "Session ID after login: $afterId" . PHP_EOL;
var_dump($beforeId === $afterId);
</textarea>
    <div class="mini-toolbar">
        <button class="mini-run-btn">▶ شغّل / Run</button>
        <span class="mini-status"></span>
    </div>
    <div class="output-box">— لسه متشغلش / not run yet —</div>
</div>

<div class="security-box">
    <h3>⚠️ أعلام الكوكيز الآمنة / Secure Cookie Flags</h3>
    <div class="ar">🇪🇬 لما تظبط إعدادات الـ Session Cookie (مثلاً بـ <code>session_set_cookie_params()</code> قبل <code>session_start()</code>)، فعّل الأعلام دي: <code>httponly</code> يمنع JavaScript من قراءة الكوكي (بيقلل تأثير XSS)، <code>secure</code> يخلي المتصفح يبعتها بس عبر HTTPS، و<code>samesite => 'Lax'</code> أو <code>'Strict'</code> يمنع المتصفح من إرفاقها مع طلبات جاية من مواقع تانية — وده دفاع إضافي ضد CSRF.</div>
    <div class="en">🇬🇧 When configuring the session cookie (e.g. with <code>session_set_cookie_params()</code> before <code>session_start()</code>), enable these flags: <code>httponly</code> prevents JavaScript from reading the cookie (reduces XSS impact), <code>secure</code> makes the browser only send it over HTTPS, and <code>samesite => 'Lax'</code> or <code>'Strict'</code> stops the browser from attaching it to requests originating from other sites — an extra layer of defense against CSRF.</div>
</div>

<pre><code>&lt;?php
session_set_cookie_params([
    'lifetime' =&gt; 0,
    'path' =&gt; '/',
    'domain' =&gt; '',
    'secure' =&gt; true,     // بس عبر HTTPS
    'httponly' =&gt; true,   // JavaScript متقدرش تقراها
    'samesite' =&gt; 'Lax',  // متتبعتش مع طلبات من مواقع تانية
]);
session_start();</code></pre>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="hash">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">إيه أفضل طريقة لتخزين كلمة مرور مستخدم في قاعدة البيانات؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What's the best way to store a user's password in the database?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="hash"> نتيجة password_hash($plain, PASSWORD_DEFAULT)</label>
        <label><input type="radio" name="q1" value="plain"> النص العادي كما كتبها المستخدم</label>
        <label><input type="radio" name="q1" value="md5"> md5($plain)</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="verify">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">إزاي تتأكد إن كلمة مرور مُدخلة مطابقة للهاش المخزّن؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">How do you check that an entered password matches the stored hash?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="verify"> password_verify($plain, $hash)</label>
        <label><input type="radio" name="q2" value="eq"> $plain === $hash</label>
        <label><input type="radio" name="q2" value="rehash"> password_hash($plain) === $hash</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="regen">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">إيه الحل ضد Session Fixation؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What is the fix against Session Fixation?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="regen"> استدعاء session_regenerate_id(true) فورًا بعد تسجيل الدخول</label>
        <label><input type="radio" name="q3" value="destroy"> استدعاء session_destroy() قبل تسجيل الدخول</label>
        <label><input type="radio" name="q3" value="hash"> تشفير كل بيانات الجلسة</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="httponly">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">أنهي علم كوكي بيمنع JavaScript من قراءة كوكي الجلسة؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Which cookie flag prevents JavaScript from reading the session cookie?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="httponly"> httponly</label>
        <label><input type="radio" name="q4" value="secure"> secure</label>
        <label><input type="radio" name="q4" value="samesite"> samesite</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ نظام تسجيل دخول آمن / A Secure Login Flow</h3>
    <div class="ar">🇪🇬 في <a href="../playground/index.php">محرر الكود</a> (أو المحرر المصغّر فوق): اعمل مصفوفة associative فيها 3 مستخدمين واحفظ هاش كلمة سر كل واحد بـ <code>password_hash()</code> وقت الإنشاء. اكتب دالة <code>attemptLogin(array $users, string $email, string $password): bool</code> بتدور على المستخدم وتستخدم <code>password_verify()</code>، وبعد نجاح تسجيل الدخول نادِ <code>session_regenerate_id(true)</code> واطبع الـ Session ID قبل وبعد.</div>
    <div class="en">🇬🇧 In the <a href="../playground/index.php">Playground</a> (or the mini editor above): build an associative array of 3 users and store each password's hash with <code>password_hash()</code> at creation time. Write an <code>attemptLogin(array $users, string $email, string $password): bool</code> function that finds the user and uses <code>password_verify()</code>, and after a successful login call <code>session_regenerate_id(true)</code> and print the session ID before and after.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 لحد دلوقتي أمّنّا الاستعلامات، الطباعة، الطلبات، وهوية المستخدم — الدرس الجاي بيأمّن حاجة الناس غالبًا بتستهين بيها: رفع الملفات. هتشوف ليه متتحققش من نوع الملف من الامتداد أو من <code>$_FILES['x']['type']</code> بس، وإزاي تولّد اسم ملف عشوائي آمن.</div>
    <div class="en">🇬🇧 So far we've secured queries, output, requests, and user identity — the next lesson secures something people often underestimate: file uploads. You'll see why you shouldn't trust just the extension or <code>$_FILES['x']['type']</code>, and how to generate a safe random filename.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>متخزّنش كلمات المرور كنص عادي أو بـ <code>md5()</code> — استخدم <code>password_hash()</code>/<code>password_verify()</code> دايمًا.</li>
        <li>كل هاش <code>password_hash()</code> مختلف حتى لنفس كلمة السر (Salt عشوائي) — ده طبيعي.</li>
        <li><code>Session Fixation</code>: مهاجم بيزرع Session ID قبل تسجيل الدخول — الحل <code>session_regenerate_id(true)</code> بعد كل تسجيل دخول ناجح.</li>
        <li>أعلام الكوكي الآمنة: <code>httponly</code>, <code>secure</code>, <code>samesite</code>.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="security-csrf.php">← الدرس السابق / Prev: 🔐 Lab: CSRF</a>
    <a href="security-file-upload.php">الدرس الجاي / Next: File Upload Security →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
