<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'auth-login-sessions';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'تسجيل الدخول وربطه بالجلسة — Login & Wiring It to a Session';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">Stage 10 · Authentication & Authorization</span>
<h1>تسجيل الدخول وربطه بالجلسة <span class="ltr">Login &amp; Wiring It to a Session</span></h1>
<p class="subtitle">بعد password_verify() الناجح، إزاي تحفظ هوية المستخدم في $_SESSION لباقي الطلبات. <span class="ltr">After a successful password_verify(), how to store the user's identity in $_SESSION for the rest of their requests.</span></p>

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
    <div class="ar">🇪🇬 <code>password_verify()</code> بترجع <code>true</code>/<code>false</code> بس — لحظة واحدة، مش حالة مستمرة. HTTP نفسه "بينسى" كل حاجة بين طلب وطلب (Stateless)، فلو متسجّلتش هوية المستخدم في حاجة، أي صفحة تانية هتحتاج منه يسجّل دخول تاني. الحل هو <code>$_SESSION</code>: بعد نجاح <code>password_verify()</code>، بنحفظ <code>$_SESSION['user_id']</code> و<code>$_SESSION['role']</code> عشان أي كود جاي بعد كده (في نفس الطلب أو طلبات تانية) يقدر يسأل "مين ده؟" من غير ما يطلب باسورد تاني. الدرس ده هيبني الخطوتين مع بعض ويشغّلهم فعليًا: تسجيل الدخول، وبعدين قراءة نفس الـ Session اللي اتكتبت.</div>
    <div class="en">🇬🇧 <code>password_verify()</code> returns just <code>true</code>/<code>false</code> — a single moment, not an ongoing state. HTTP itself "forgets" everything between requests (it's stateless), so unless the user's identity is stored somewhere, every other page would need them to log in again. The fix is <code>$_SESSION</code>: after a successful <code>password_verify()</code>, we store <code>$_SESSION['user_id']</code> and <code>$_SESSION['role']</code> so any following code (in the same request or a later one) can ask "who is this?" without asking for a password again. This lesson builds both steps together and actually runs them: logging in, then reading back that same session.</div>
</div>

<h2 id="understand">🧠 من password_verify() لـ $_SESSION / From password_verify() to $_SESSION</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <code>session_start()</code> و<code>$_SESSION</code> فعلاً بتشتغل تحت PHP CLI — PHP بينشئ ملف Session حقيقي على القرص حتى من غير متصفح. اللي مش موجود في CLI هو الـ HTTP Cookie (<code>PHPSESSID</code>) اللي بتخلي المتصفح "يفتكر" نفس الـ Session في الطلب الجاي — ده محتاج سيرفر حقيقي وطلبات متتالية فعلية. لكن الجزء اللي بنعلّمه هنا (إزاي تخزّن هوية المستخدم في الـ Session وتقراها تاني) بيتنفذ فعليًا 100% وهنشوف ناتجه الحقيقي.</div>
    <div class="en">🇬🇧 <code>session_start()</code> and <code>$_SESSION</code> genuinely work under PHP CLI — PHP creates a real session file on disk even with no browser involved. What CLI doesn't have is the HTTP cookie (<code>PHPSESSID</code>) that lets a browser "remember" the same session on its next request — that needs a real server and actual successive requests. But the part we're teaching here (how to store a user's identity in the session and read it back) genuinely executes 100%, and we'll see its real output.</div>
</div>

<pre><code>&lt;?php
ob_start(); // allow echo output before session_start() without a warning
require __DIR__ . '/../db-sandbox/schema.php';
$pdo = build_sandbox_pdo();
$pdo-&gt;exec('ALTER TABLE users ADD COLUMN password TEXT');
// Give Sara a real password hash so we have something to verify against
$pdo-&gt;exec("UPDATE users SET password = '" . password_hash('S3cur3P@ss', PASSWORD_DEFAULT) . "' WHERE email = 'sara@example.com'");

function loginUser(PDO $pdo, string $email, string $password): array
{
    $stmt = $pdo-&gt;prepare('SELECT id, name, role, password FROM users WHERE email = ?');
    $stmt-&gt;execute([$email]);
    $user = $stmt-&gt;fetch(PDO::FETCH_ASSOC);

    if (!$user || $user['password'] === null || !password_verify($password, $user['password'])) {
        return ['ok' =&gt; false, 'error' =&gt; 'Invalid email or password.'];
    }

    return ['ok' =&gt; true, 'id' =&gt; (int) $user['id'], 'name' =&gt; $user['name'], 'role' =&gt; $user['role']];
}

echo "1) Attempt login with correct password:" . PHP_EOL;
$result = loginUser($pdo, 'sara@example.com', 'S3cur3P@ss');
echo '   ' . json_encode($result) . PHP_EOL;

if ($result['ok']) {
    session_start();
    $_SESSION['user_id'] = $result['id'];
    $_SESSION['role'] = $result['role'];
    echo "2) session_start() called, \$_SESSION written." . PHP_EOL;
    echo "   Session ID: " . session_id() . PHP_EOL;
    echo "   \$_SESSION now contains: " . json_encode($_SESSION) . PHP_EOL;
}

echo "3) Later in the SAME script, a different block checks the session:" . PHP_EOL;
if (isset($_SESSION['user_id'])) {
    echo "   Logged in as user #" . $_SESSION['user_id'] . " with role '" . $_SESSION['role'] . "'" . PHP_EOL;
} else {
    echo "   Not logged in." . PHP_EOL;
}

echo "4) Attempt login with the wrong password:" . PHP_EOL;
$bad = loginUser($pdo, 'sara@example.com', 'wrong-password');
echo '   ' . json_encode($bad) . PHP_EOL;</code></pre>
<h3>الناتج الفعلي (Session ID بيختلف كل تشغيل — ده طبيعي) / Actual output (the Session ID differs on every run — that's expected)</h3>
<div class="output-box">1) Attempt login with correct password:
   {"ok":true,"id":2,"name":"Sara Ali","role":"user"}
2) session_start() called, $_SESSION written.
   Session ID: g4n2l6tqccpdforb0j4gshsaig
   $_SESSION now contains: {"user_id":2,"role":"user"}
3) Later in the SAME script, a different block checks the session:
   Logged in as user #2 with role 'user'
4) Attempt login with the wrong password:
   {"ok":false,"error":"Invalid email or password."}</div>

<div class="bi-block">
    <div class="ar">🇪🇬 النقطة الأهم في الناتج ده: البلوك رقم 3 مالوش أي علاقة بـ <code>loginUser()</code> ولا بقاعدة البيانات — هو بس بيسأل <code>isset($_SESSION['user_id'])</code>. ده بالظبط اللي بيحصل في مشروع حقيقي: صفحة <code>dashboard.php</code> منفصلة تمامًا عن صفحة <code>login.php</code>، ومش محتاجة تعرف حاجة عن الباسورد أو قاعدة البيانات — بس محتاجة تقرأ <code>$_SESSION</code> اللي اتكتبت قبل كده. لاحظ كمان إن محاولة الدخول الغلط (البلوك 4) مأثرتش على الـ Session اللي اتسجلت لسارة فعلًا — لإننا مانديناش <code>session_start()</code> تاني ولا غيّرنا القيم.</div>
    <div class="en">🇬🇧 The key thing in this output: block 3 has nothing to do with <code>loginUser()</code> or the database — it only asks <code>isset($_SESSION['user_id'])</code>. That's exactly what happens in a real project: a <code>dashboard.php</code> page is entirely separate from <code>login.php</code>, and doesn't need to know anything about the password or the database — it just needs to read the <code>$_SESSION</code> written earlier. Also notice the failed login attempt (block 4) didn't touch Sara's already-established session — we didn't call <code>session_start()</code> again or change its values.</div>
</div>

<div class="bi-block">
    <div class="ar">🇪🇬 جرّب في المحرر تحت: غيّر <code>role</code> اللي بيتخزن في الـ Session لقيمة تانية زي <code>'admin'</code> يدويًا، وشوف البلوك 3 هيطبع إيه — ده هيوضّحلك إن الـ Session بترجع بالظبط اللي انت حطيته فيها، ومفيهاش أي تحقق تاني.</div>
    <div class="en">🇬🇧 Try it in the editor below: manually change the <code>role</code> stored in the session to something else like <code>'admin'</code>, and see what block 3 prints — this makes it clear the session returns exactly what you put into it, with no extra verification of its own.</div>
</div>

<div class="mini-editor-wrap">
    <textarea spellcheck="false">&lt;?php
ob_start();
require __DIR__ . '/../db-sandbox/schema.php';
$pdo = build_sandbox_pdo();
$pdo-&gt;exec('ALTER TABLE users ADD COLUMN password TEXT');
$pdo-&gt;exec("UPDATE users SET password = '" . password_hash('S3cur3P@ss', PASSWORD_DEFAULT) . "' WHERE email = 'sara@example.com'");

function loginUser(PDO $pdo, string $email, string $password): array
{
    $stmt = $pdo-&gt;prepare('SELECT id, name, role, password FROM users WHERE email = ?');
    $stmt-&gt;execute([$email]);
    $user = $stmt-&gt;fetch(PDO::FETCH_ASSOC);
    if (!$user || $user['password'] === null || !password_verify($password, $user['password'])) {
        return ['ok' =&gt; false, 'error' =&gt; 'Invalid email or password.'];
    }
    return ['ok' =&gt; true, 'id' =&gt; (int) $user['id'], 'name' =&gt; $user['name'], 'role' =&gt; $user['role']];
}

$result = loginUser($pdo, 'sara@example.com', 'S3cur3P@ss');
if ($result['ok']) {
    session_start();
    $_SESSION['user_id'] = $result['id'];
    $_SESSION['role'] = 'admin'; // try changing this back to $result['role']
}

if (isset($_SESSION['user_id'])) {
    echo "Logged in as user #" . $_SESSION['user_id'] . " with role '" . $_SESSION['role'] . "'" . PHP_EOL;
} else {
    echo "Not logged in." . PHP_EOL;
}</textarea>
    <div class="mini-toolbar">
        <button class="mini-run-btn">▶ شغّل / Run</button>
        <span class="mini-status"></span>
    </div>
    <div class="output-box">— لسه متشغلش / not run yet —</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="two">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">إيه أهم متغيرين اتخزنوا في $_SESSION بعد تسجيل الدخول الناجح في المثال فوق؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What are the two key values stored in $_SESSION after the successful login above?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="two"> user_id و role</label>
        <label><input type="radio" name="q1" value="pass"> الباسورد نفسه والـ Hash بتاعه</label>
        <label><input type="radio" name="q1" value="none"> مفيش حاجة، $_SESSION فاضية دايمًا في CLI</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="isset">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">إزاي كود لاحق (زي صفحة Dashboard) بيتأكد إن المستخدم مسجّل دخول من غير ما يعيد فحص الباسورد؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">How does later code (like a dashboard page) confirm a user is logged in without re-checking the password?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="isset"> بفحص isset($_SESSION['user_id'])</label>
        <label><input type="radio" name="q2" value="reverify"> بعمل password_verify() تاني في كل صفحة</label>
        <label><input type="radio" name="q2" value="cookie"> بقراءة الباسورد من الكوكي مباشرة</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="works">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">بالنسبة لـ session_start() و$_SESSION تحت PHP CLI (زي الدرس ده)، إيه الصح؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Regarding session_start() and $_SESSION under PHP CLI (like this lesson), what's true?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="works"> بتشتغل فعليًا وبتنشئ ملف Session حقيقي — اللي مش موجود هو الكوكي بين طلبات متصفح حقيقية</label>
        <label><input type="radio" name="q3" value="fake"> مستحيل تشتغل أبدًا تحت CLI</label>
        <label><input type="radio" name="q3" value="db"> بتحتاج قاعدة بيانات منفصلة عشان تشتغل</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="invalid">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">حسب الناتج الفعلي فوق، محاولة الدخول بباسورد غلط (البلوك 4) رجّعت إيه؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Per the actual output above, what did the wrong-password login attempt (block 4) return?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="invalid"> {"ok":false,"error":"Invalid email or password."}</label>
        <label><input type="radio" name="q4" value="ok"> {"ok":true} برضه لإنها Sara Ali معروفة</label>
        <label><input type="radio" name="q4" value="crash"> مسحت الـ Session اللي كانت متسجّلة قبل كده</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ اطبع رسالة "مرحبًا" مخصصة / Print a Personalized Welcome</h3>
    <div class="ar">🇪🇬 في <a href="../playground/index.php">محرر الكود</a> (أو المحرر المصغّر فوق): بعد نجاح تسجيل الدخول وحفظ الـ Session، زوّد <code>$_SESSION['name']</code> كمان (مش بس id وrole)، واكتب بلوك جديد بيطبع "Welcome back, {name}! You are logged in as a {role}." باستخدام قيم الـ Session بس، من غير ما ترجع تستعلم من قاعدة البيانات تاني.</div>
    <div class="en">🇬🇧 In the <a href="../playground/index.php">Playground</a> (or the mini editor above): after a successful login writes the session, also store <code>$_SESSION['name']</code> (not just id and role), and write a new block that prints "Welcome back, {name}! You are logged in as a {role}." using only the session values, without querying the database again.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 دلوقتي عندنا مستخدم "مسجّل دخول" بمعنى حقيقي — هويته محفوظة في الـ Session وأي كود لاحق يقدر يقرأها. لكن السؤال الجاي مش "هل ده مسجّل دخول؟" — السؤال هو "هل مسموحله يعمل الحاجة دي بالذات؟". الدرس الجاي هيفرّق بوضوح بين الاتنين (Authentication مقابل Authorization) ويبني فحص صلاحيات حقيقي على بيانات المستخدمين والمنشورات في الـ Sandbox.</div>
    <div class="en">🇬🇧 We now have a user who's "logged in" in a real sense — their identity is stored in the session and any following code can read it. But the next question isn't "are they logged in?" — it's "are they allowed to do this specific thing?". The next lesson draws a clear line between the two (Authentication vs Authorization) and builds a real permission check on the sandbox's users and posts data.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>الجلوس على <code>password_verify()</code> لوحدها مش كفاية — لازم تربط النتيجة بـ <code>$_SESSION</code> عشان تستمر بين الطلبات.</li>
        <li><code>session_start()</code> و<code>$_SESSION</code> بيشتغلوا فعليًا تحت CLI؛ اللي محتاج متصفح حقيقي هو الكوكي بين طلبات منفصلة.</li>
        <li>كود لاحق (Dashboard مثلًا) بيتحقق من هوية المستخدم بـ <code>isset($_SESSION['user_id'])</code> بس، من غير ما يعيد أي فحص باسورد.</li>
        <li>محاولة دخول فاشلة معندهاش أي تأثير على Session سابقة ناجحة.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="auth-registration-deep-dive.php">← الدرس السابق / Prev: Registration Deep Dive</a>
    <a href="auth-roles-permissions.php">الدرس الجاي / Next: Roles &amp; Permissions →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
