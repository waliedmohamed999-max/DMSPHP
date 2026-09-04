<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'auth-registration-deep-dive';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'تسجيل مستخدم جديد بأمان — تعمّق — Secure Registration Deep Dive';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">Stage 10 · Authentication & Authorization</span>
<h1>تسجيل مستخدم جديد بأمان — تعمّق <span class="ltr">Secure Registration — a Deep Dive</span></h1>
<p class="subtitle">فحص إيميل مكرر، قوة كلمة المرور، وتأكيد الباسورد — أبعد من التسجيل الأساسي. <span class="ltr">Duplicate-email checks, password strength, and password confirmation — beyond the basic register flow.</span></p>

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
    <div class="ar">🇪🇬 في <a href="project3-auth-system.php">مشروع 3</a> بنينا <code>register()</code> بسيطة: تتحقق من الإيميل المكرر وتخزّن الباسورد بـ <code>password_hash()</code>. ده كافي كبداية، لكن أي فورم تسجيل حقيقي بيتعامل مع حاجات المستخدم بينساها أو بيغلط فيها كل يوم: كتابة باسورد قصير جدًا، أو الغلط في كتابة تأكيد الباسورد. الدرس ده هيبني <code>registerUser()</code> أوسع بتتحقق من 3 حاجات بالترتيب: تطابق الباسورد مع تأكيده، طول الباسورد (كحد أدنى بسيط وقابل للتحقق فعليًا)، وعدم تكرار الإيميل — وهنشغّلها فعليًا ضد الـ Sandbox في كل الحالات دي.</div>
    <div class="en">🇬🇧 In <a href="project3-auth-system.php">Project 3</a> we built a simple <code>register()</code>: it checked for a duplicate email and hashed the password with <code>password_hash()</code>. That's a fine start, but every real registration form deals with things users forget or get wrong every day: typing a password that's too short, or mistyping their password confirmation. This lesson builds a wider <code>registerUser()</code> that checks three things in order: the password matches its confirmation, the password meets a minimum length (a simple, actually-checkable rule), and the email isn't already taken — and we'll run it for real against the sandbox for every one of those cases.</div>
</div>

<h2 id="understand">🧠 ترتيب الفحوصات مهم / The Order of Checks Matters</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ الترتيب في الدالة تحت: أولًا نتأكد إن الباسورد وتأكيده متطابقين، بعدين نتحقق من طول الباسورد، وأخيرًا نستعلم عن الإيميل في قاعدة البيانات. ليه الترتيب ده؟ لإن الاستعلام في قاعدة البيانات (<code>SELECT</code>) أغلى من فحص نصوص في الذاكرة — منطقي إننا نرفض الطلبات "الرخيصة الفحص" (زي باسورد قصير أو تأكيد غلط) قبل ما نتعب قاعدة البيانات بيه أصلًا. الفحص نفسه لطول الباسورد بسيط ومباشر: <code>strlen($password) < 8</code> — قاعدة واضحة وقابلة للاختبار، مش "قوة كلمة مرور" غامضة.</div>
    <div class="en">🇬🇧 Notice the order in the function below: first we confirm the password matches its confirmation, then we check the password's length, and only last do we query the database for the email. Why that order? Because a database query (<code>SELECT</code>) is more expensive than an in-memory string check — it makes sense to reject the "cheap to check" requests (a too-short password, a mismatched confirmation) before ever bothering the database. The length check itself is simple and direct: <code>strlen($password) < 8</code> — a clear, testable rule, not vague "strong password" hand-waving.</div>
</div>

<pre><code>&lt;?php
require __DIR__ . '/../db-sandbox/schema.php';
$pdo = build_sandbox_pdo();

// Same migration-style extension as Project 3: the sandbox users table
// wasn't originally built with auth in mind, so we add a password column.
$pdo-&gt;exec('ALTER TABLE users ADD COLUMN password TEXT');

function registerUser(PDO $pdo, string $name, string $email, string $password, string $passwordConfirm): array
{
    if ($password !== $passwordConfirm) {
        return ['ok' =&gt; false, 'error' =&gt; 'Password and confirmation do not match.'];
    }

    if (strlen($password) &lt; 8) {
        return ['ok' =&gt; false, 'error' =&gt; 'Password must be at least 8 characters long.'];
    }

    $check = $pdo-&gt;prepare('SELECT id FROM users WHERE email = ?');
    $check-&gt;execute([$email]);
    if ($check-&gt;fetch()) {
        return ['ok' =&gt; false, 'error' =&gt; 'Email is already registered.'];
    }

    $hash = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $pdo-&gt;prepare('INSERT INTO users (name, email, role, created_at, password) VALUES (?, ?, ?, ?, ?)');
    $stmt-&gt;execute([$name, $email, 'user', date('Y-m-d'), $hash]);

    return ['ok' =&gt; true, 'id' =&gt; (int) $pdo-&gt;lastInsertId()];
}

echo "1) Fully valid registration:" . PHP_EOL;
$r1 = registerUser($pdo, 'Nourhan Tarek', 'nourhan@example.com', 'MyP@ssw0rd', 'MyP@ssw0rd');
echo '   ' . json_encode($r1) . PHP_EOL;

echo "2) Duplicate email (nourhan@example.com already registered above):" . PHP_EOL;
$r2 = registerUser($pdo, 'Someone Else', 'nourhan@example.com', 'AnotherPass1', 'AnotherPass1');
echo '   ' . json_encode($r2) . PHP_EOL;

echo "3) Mismatched confirmation:" . PHP_EOL;
$r3 = registerUser($pdo, 'Khaled Samir', 'khaled@example.com', 'MyP@ssw0rd', 'MyP@ssw0rdX');
echo '   ' . json_encode($r3) . PHP_EOL;

echo "4) Too-short password:" . PHP_EOL;
$r4 = registerUser($pdo, 'Mona Adel', 'mona@example.com', 'abc123', 'abc123');
echo '   ' . json_encode($r4) . PHP_EOL;</code></pre>
<h3 id="output1">الناتج الفعلي / Actual output</h3>
<div class="output-box">1) Fully valid registration:
   {"ok":true,"id":6}
2) Duplicate email (nourhan@example.com already registered above):
   {"ok":false,"error":"Email is already registered."}
3) Mismatched confirmation:
   {"ok":false,"error":"Password and confirmation do not match."}
4) Too-short password:
   {"ok":false,"error":"Password must be at least 8 characters long."}</div>

<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ إن الحالة الرابعة (<code>"abc123"</code>) رفضت بسبب الطول (6 أحرف بس) رغم إنها فيها أرقام وحروف — القاعدة هنا واضحة ومحدّدة: 8 أحرف على الأقل، مفيش تخمين لـ"قوة" الباسورد غير الطول ده. كمان لاحظ إن الحالة الرابعة كان ممكن تفشل أصلًا لسبب تاني لو الإيميل كان مستخدم، لكن بما إن فحص الطول جه الأول في ترتيب الدالة، الرسالة اللي رجعت كانت عن الطول تحديدًا.</div>
    <div class="en">🇬🇧 Notice case 4 (<code>"abc123"</code>) was rejected for length (only 6 characters) even though it mixes letters and digits — the rule here is explicit and fixed: at least 8 characters, no guessing at "strength" beyond that length. Also notice case 4 could have failed for a different reason if the email had been taken, but since the length check runs first in the function's order, the message that came back was specifically about length.</div>
</div>

<div class="bi-block">
    <div class="ar">🇪🇬 جرّب بنفسك في المحرر تحت: غيّر الباسورد في الحالة الرابعة لـ <code>"exactly8"</code> (8 أحرف بالظبط) وشوف هل بتعدي الفحص ولا لأ، وجرّب كمان إيميل جديد كليًا بدل المستخدم.</div>
    <div class="en">🇬🇧 Try it yourself in the editor below: change case 4's password to <code>"exactly8"</code> (exactly 8 characters) and see whether it now passes the check, and try a brand-new email instead of the taken one.</div>
</div>

<div class="mini-editor-wrap">
    <textarea spellcheck="false">&lt;?php
require __DIR__ . '/../db-sandbox/schema.php';
$pdo = build_sandbox_pdo();
$pdo-&gt;exec('ALTER TABLE users ADD COLUMN password TEXT');

function registerUser(PDO $pdo, string $name, string $email, string $password, string $passwordConfirm): array
{
    if ($password !== $passwordConfirm) {
        return ['ok' =&gt; false, 'error' =&gt; 'Password and confirmation do not match.'];
    }
    if (strlen($password) &lt; 8) {
        return ['ok' =&gt; false, 'error' =&gt; 'Password must be at least 8 characters long.'];
    }
    $check = $pdo-&gt;prepare('SELECT id FROM users WHERE email = ?');
    $check-&gt;execute([$email]);
    if ($check-&gt;fetch()) {
        return ['ok' =&gt; false, 'error' =&gt; 'Email is already registered.'];
    }
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $pdo-&gt;prepare('INSERT INTO users (name, email, role, created_at, password) VALUES (?, ?, ?, ?, ?)');
    $stmt-&gt;execute([$name, $email, 'user', date('Y-m-d'), $hash]);
    return ['ok' =&gt; true, 'id' =&gt; (int) $pdo-&gt;lastInsertId()];
}

// Try changing this password to "exactly8" or use a brand-new email:
$result = registerUser($pdo, 'Test User', 'ahmed@example.com', 'abc123', 'abc123');
echo json_encode($result) . PHP_EOL;</textarea>
    <div class="mini-toolbar">
        <button class="mini-run-btn">▶ شغّل / Run</button>
        <span class="mini-status"></span>
    </div>
    <div class="output-box">— لسه متشغلش / not run yet —</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="length">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">حسب الكود فوق، إيه قاعدة قوة الباسورد المستخدمة بالظبط؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Per the code above, what exact password-strength rule is used?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="length"> على الأقل 8 أحرف (strlen($password) &lt; 8)</label>
        <label><input type="radio" name="q1" value="regex"> لازم يحتوي رمز خاص و regex معقد</label>
        <label><input type="radio" name="q1" value="none"> مفيش أي فحص قوة</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="order">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">ليه فحص التطابق والطول بيحصلوا قبل استعلام قاعدة البيانات عن الإيميل؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Why do the match and length checks happen before querying the database for the email?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="order"> فحوصات الذاكرة أرخص، فمنطقي نرفض بيها الأول قبل ما نتعب قاعدة البيانات</label>
        <label><input type="radio" name="q2" value="random"> الترتيب عشوائي ومفيش سبب</label>
        <label><input type="radio" name="q2" value="required"> PHP بتجبرك على الترتيب ده</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="dup">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">حسب الناتج الفعلي فوق، محاولة التسجيل التانية بنفس إيميل nourhan@example.com رجّعت إيه؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Per the actual output above, what did the second registration attempt with the same nourhan@example.com return?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="dup"> {"ok":false,"error":"Email is already registered."}</label>
        <label><input type="radio" name="q3" value="ok"> {"ok":true} وحساب تاني اتسجل بنفس الإيميل</label>
        <label><input type="radio" name="q3" value="crash"> Fatal Error توقف السكريبت</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="strcmp">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">إزاي بنتأكد إن الباسورد وتأكيده متطابقين في الكود فوق؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">How does the code above confirm the password matches its confirmation?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="strcmp"> $password !== $passwordConfirm</label>
        <label><input type="radio" name="q4" value="hashcompare"> بمقارنة الهاش بتاع كل واحد فيهم</label>
        <label><input type="radio" name="q4" value="verify"> password_verify($password, $passwordConfirm)</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ فحص إضافي: لازم رقم / Extra Check: Require a Digit</h3>
    <div class="ar">🇪🇬 في <a href="../playground/index.php">محرر الكود</a> (أو المحرر المصغّر فوق): زوّد فحص رابع جوه <code>registerUser()</code> بيرفض الباسورد لو مفيهوش رقم واحد على الأقل (فكّر في <code>preg_match('/[0-9]/', $password)</code>). جرّبها بـ <code>"abcdefgh"</code> (8 أحرف بس من غير رقم) وشوف هل بترفض دلوقتي ولا لأ.</div>
    <div class="en">🇬🇧 In the <a href="../playground/index.php">Playground</a> (or the mini editor above): add a fourth check inside <code>registerUser()</code> that rejects a password with no digit at all (think <code>preg_match('/[0-9]/', $password)</code>). Test it with <code>"abcdefgh"</code> (8 characters, no digit) and see whether it's now rejected.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 دلوقتي عندنا تسجيل قوي بيرفض المدخلات الغلط بوضوح. لكن التسجيل لوحده مش كفاية — لازم نوصّل النجاح ده بحاجة تفتكر "مين المستخدم ده" في باقي الطلبات الجاية. الدرس الجاي هياخد مستخدم مسجّل فعليًا زي دول ويعمله تسجيل دخول حقيقي، ويربط النتيجة بـ <code>$_SESSION</code>.</div>
    <div class="en">🇬🇧 We now have solid registration that clearly rejects bad input. But registration alone isn't enough — that success needs to connect to something that remembers "who this user is" across the requests that follow. The next lesson takes an actually-registered user like these and logs them in for real, wiring the result to <code>$_SESSION</code>.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>ترتيب الفحوصات مهم: افحص الأرخص (تطابق الباسورد، الطول) قبل الأغلى (استعلام قاعدة البيانات).</li>
        <li>قاعدة قوة الباسورد هنا واضحة وقابلة للاختبار: <code>strlen($password) &lt; 8</code> — مش وصف غامض.</li>
        <li>فحص الإيميل المكرر لازم يكون <code>SELECT</code> حقيقي بـ Prepared Statement قبل أي <code>INSERT</code>.</li>
        <li>كل الحالات الأربعة (نجاح، إيميل مكرر، تأكيد غلط، باسورد قصير) اتشغّلت فعليًا وطلعت نتائج حقيقية مختلفة.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="../index.php">← الرجوع للدروس / Back to Lessons</a>
    <a href="auth-login-sessions.php">الدرس الجاي / Next: Login &amp; Sessions →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
