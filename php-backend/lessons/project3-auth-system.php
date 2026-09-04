<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'project3-auth-system';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = '🚀 مشروع 3: نظام تسجيل دخول — Authentication System';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">Stage 18 · Projects</span>
<h1>🚀 مشروع 3: نظام تسجيل دخول <span class="ltr">🚀 Project 3: Authentication System</span></h1>
<p class="subtitle">Register/Login/Logout حقيقي بـ password_hash وSessions — بداية كل مشروع Backend فيه مستخدمين.</p>

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
    <div class="ar">🇪🇬 نظام تسجيل الدخول هو أول حاجة بتبنيها في أي مشروع Backend فيه "مستخدمين" — Task Manager، متجر، منصة تعليمية زي دي. المشروع ده هيبني <code>register()</code> و<code>login()</code> حقيقيين: تخزين مستخدم جديد بباسورد مُشفّر (مش نص عادي أبدًا)، والتحقق من الباسورد وقت الدخول من غير ما نحتاج نفك التشفير أصلًا.</div>
    <div class="en">🇬🇧 An authentication system is the first thing you build in any Backend project with "users" — a task manager, a store, an education platform like this one. This project builds a real <code>register()</code> and <code>login()</code>: storing a new user with a hashed password (never plain text), and verifying the password at login without ever needing to decrypt anything.</div>
</div>

<h2 id="understand">🧠 المواصفات المطلوبة / Requirements</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 النظام لازم يحقق النقط دي:</div>
</div>
<div class="recap-box">
    <h3>📋 قائمة المتطلبات / Checklist</h3>
    <ul>
        <li><code>register($pdo, $name, $email, $password)</code> — يتأكد الإيميل مش مستخدم قبل كده، يشفّر الباسورد بـ <code>password_hash()</code>، ويسجّله بـ Prepared Statement حقيقي.</li>
        <li><code>login($pdo, $email, $password)</code> — يجيب المستخدم بالإيميل، ويتحقق من الباسورد بـ <code>password_verify()</code> ضد الـ Hash المخزّن — مش مقارنة نصوص عادية أبدًا.</li>
        <li>الباسورد ميتخزنش ولا يترجع في أي مكان كنص عادي، لا في قاعدة البيانات ولا في أي رسالة رد.</li>
        <li>محاولة تسجيل بإيميل موجود بالفعل لازم ترفض بوضوح، مش تنشئ حساب مكرر.</li>
    </ul>
</div>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>ملاحظة صريحة عن قاعدة البيانات:</b> في مشروع حقيقي، ده هيكون جدول <code>users</code> في MySQL فعلي، دايم وموجود على السيرفر. هنا، بدل ما نخاطر بأي حاجة، بنستخدم نفس الـ Sandbox المعزولة اللي استخدمتها في الـ <a href="../db-sandbox/index.php">Database Playground</a> — قاعدة SQLite في الذاكرة بتتبني من جديد مع كل تشغيل، عشان المشروع ده يشتغل بأمان تام لكل متعلّم من غير أي إعداد. الجدول <code>users</code> في الـ Sandbox ده مبني أصلًا لدروس تانية (زي العلاقات بين الجداول) ومفيهوش عمود باسورد، فهنوسّعه بأمر <code>ALTER TABLE ... ADD COLUMN</code> — بالظبط زي أي Migration حقيقية بتضيف عمود لميزة جديدة على جدول موجود.</div>
    <div class="en">🇬🇧 <b>An honest note about the database:</b> in a real project, this would be an actual <code>users</code> table in MySQL, persistent and living on the server. Here, instead of risking anything, we use the same isolated sandbox you used in the <a href="../db-sandbox/index.php">Database Playground</a> — an in-memory SQLite database rebuilt fresh on every run, so this project runs safely for every learner with zero setup. That sandbox's <code>users</code> table was originally built for other lessons (like table relationships) and has no password column, so we extend it with <code>ALTER TABLE ... ADD COLUMN</code> — exactly like a real migration adding a column for a new feature on an existing table.</div>
</div>

<h2 id="practice">💻 التنفيذ / Implementation</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <code>register()</code> بتتحقق الأول إن مفيش مستخدم بنفس الإيميل (عن طريق <code>SELECT</code> بـ Prepared Statement)، بعدين تشفّر الباسورد بـ <code>password_hash()</code> (اللي بترجع Hash مختلف في كل مرة حتى لنفس الباسورد — عشان كده منقارنش الـ Hashes ببعض مباشرة)، وتسجّل المستخدم بـ <code>INSERT</code> بـ Prepared Statement. <code>login()</code> بتجيب صف المستخدم بالإيميل، وتستخدم <code>password_verify($password, $hash)</code> اللي بتاخد الباسورد الخام والـ Hash المخزّن وترجع <code>true</code>/<code>false</code> من غير ما تحتاج "تفك" أي تشفير — الـ Hashing عملية اتجاه واحد بس.</div>
    <div class="en">🇬🇧 <code>register()</code> first checks no user already exists with that email (via a prepared <code>SELECT</code>), then hashes the password with <code>password_hash()</code> (which returns a different hash every time even for the same password — which is why you never compare hashes directly), and inserts the user with a prepared <code>INSERT</code>. <code>login()</code> fetches the user row by email, and uses <code>password_verify($password, $hash)</code>, which takes the raw password and the stored hash and returns <code>true</code>/<code>false</code> without ever needing to "decrypt" anything — hashing is a one-way operation only.</div>
</div>

<pre><code>&lt;?php
require __DIR__ . '/../db-sandbox/schema.php';
$pdo = build_sandbox_pdo();

// The sandbox `users` table is shared with other lessons (Database Playground,
// db-relationships, etc.) and wasn't built with auth in mind, so it has no
// password column. We extend it with a migration-style ALTER TABLE, exactly
// like you'd evolve a real schema when a new feature needs a new column.
$pdo->exec('ALTER TABLE users ADD COLUMN password TEXT');

function register(PDO $pdo, string $name, string $email, string $password): array {
    $check = $pdo->prepare('SELECT id FROM users WHERE email = ?');
    $check->execute([$email]);
    if ($check->fetch()) {
        return ['ok' => false, 'error' => 'Email already registered.'];
    }

    $hash = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $pdo->prepare('INSERT INTO users (name, email, role, created_at, password) VALUES (?, ?, ?, ?, ?)');
    $stmt->execute([$name, $email, 'user', date('Y-m-d'), $hash]);

    return ['ok' => true, 'id' => (int) $pdo->lastInsertId()];
}

function login(PDO $pdo, string $email, string $password): array {
    $stmt = $pdo->prepare('SELECT id, name, password FROM users WHERE email = ?');
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user || $user['password'] === null) {
        return ['ok' => false, 'error' => 'Invalid email or password.'];
    }
    if (!password_verify($password, $user['password'])) {
        return ['ok' => false, 'error' => 'Invalid email or password.'];
    }
    return ['ok' => true, 'id' => (int) $user['id'], 'name' => $user['name']];
}

echo "1) Register a new user:" . PHP_EOL;
$r1 = register($pdo, 'Waleed Mohamed', 'waleed@example.com', 'S3cur3P@ss');
echo '   ' . json_encode($r1) . PHP_EOL;

echo "2) Login with the correct password:" . PHP_EOL;
$r2 = login($pdo, 'waleed@example.com', 'S3cur3P@ss');
echo '   ' . json_encode($r2) . PHP_EOL;

echo "3) Login with the wrong password:" . PHP_EOL;
$r3 = login($pdo, 'waleed@example.com', 'wrong-password');
echo '   ' . json_encode($r3) . PHP_EOL;

echo "4) Register again with the same (now-taken) email:" . PHP_EOL;
$r4 = register($pdo, 'Someone Else', 'waleed@example.com', 'AnotherPass1');
echo '   ' . json_encode($r4) . PHP_EOL;</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">1) Register a new user:
   {"ok":true,"id":6}
2) Login with the correct password:
   {"ok":true,"id":6,"name":"Waleed Mohamed"}
3) Login with the wrong password:
   {"ok":false,"error":"Invalid email or password."}
4) Register again with the same (now-taken) email:
   {"ok":false,"error":"Email already registered."}</div>

<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ حاجتين مهمين: أولًا، الـ <code>id</code> اللي رجع 6 مش 1 — لإن الـ Sandbox جاهزة بـ 5 مستخدمين اتزرعوا فيها مسبقًا لدروس تانية، فالمستخدم الجديد بياخد أول ID متاح. ثانيًا، محاولة تسجيل دخول بباسورد غلط ومحاولة تسجيل حساب بإيميل مكرر رجّعوا نفس شكل الرد ({"ok": false, "error": ...}) — من غير ما الباسورد أو الـ Hash يظهروا في أي مكان في الرد نفسه.</div>
    <div class="en">🇬🇧 Notice two things: first, the returned <code>id</code> is 6, not 1 — because the sandbox comes pre-seeded with 5 users for other lessons, so the new user gets the next available ID. Second, a wrong-password login attempt and a duplicate-email registration attempt both returned the same response shape ({"ok": false, "error": ...}) — with the password or its hash never appearing anywhere in the response itself.</div>
</div>

<div class="bi-block">
    <div class="ar">🇪🇬 <b>تمرين عملي قبل ما تكمل:</b> جرّب بنفسك في <a href="../playground/index.php">محرر الكود</a> إنك تطبع <code>$hash</code> مرتين لنفس الباسورد (زي <code>password_hash("test123", PASSWORD_DEFAULT)</code> مرتين) — هتلاقي الناتجين مختلفين تمامًا رغم إن الباسورد الأصلي واحد. ده مقصود: <code>password_hash()</code> بتضيف "Salt" عشوائي مختلف كل مرة، وعشان كده مينفعش تقارن Hash بـ Hash — لازم تستخدم <code>password_verify()</code> دايمًا.</div>
    <div class="en">🇬🇧 <b>Try this before moving on:</b> in the <a href="../playground/index.php">Playground</a>, print <code>$hash</code> twice for the same password (e.g. <code>password_hash("test123", PASSWORD_DEFAULT)</code> called twice) — you'll get two completely different results even though the original password is identical. That's intentional: <code>password_hash()</code> adds a different random "salt" every time, which is exactly why you can never compare hash-to-hash — you must always use <code>password_verify()</code>.</div>
</div>

<h2>Logout — ليه مش هنجربه هنا / Why We Won't Demo This Here</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <code>logout()</code> في مشروع حقيقي بسيطة جدًا في الكود: <code>session_destroy()</code> بعد <code>session_start()</code>. المشكلة مش في الكود — المشكلة إن الـ Session أساسًا مبنية على HTTP: السيرفر بيحط Cookie اسمها <code>PHPSESSID</code> في المتصفح، وأي طلب جاي بعد كده بيبعتها تاني عشان السيرفر يعرف "مين ده". الدرس ده بيتشغّل عن طريق PHP CLI (سطر أوامر) مش متصفح حقيقي بيبعت ويستقبل Cookies، فمفيش طريقة نجرب بيها Session حقيقية هنا ونحصل على ناتج فعلي يستاهل نصدّقه — أي محاولة هتكون تمثيل مش تنفيذ حقيقي، وده عكس قاعدة الدرس ده بالظبط.</div>
    <div class="en">🇬🇧 <code>logout()</code> in a real project is simple code: <code>session_destroy()</code> after <code>session_start()</code>. The issue isn't the code — it's that sessions are fundamentally built on HTTP: the server sets a <code>PHPSESSID</code> cookie in the browser, and every subsequent request sends it back so the server knows "who this is". This lesson runs via PHP CLI (a command line), not a real browser sending and receiving cookies, so there's no way to demo a real session here and get an actual result worth trusting — any attempt would be a simulation, not real execution, which is exactly against this platform's own rule.</div>
</div>
<pre><code>&lt;?php
// login.php -- after a successful login() call above
session_start();
$_SESSION['user_id'] = $result['id'];
$_SESSION['user_name'] = $result['name'];

// logout.php -- in a real browser session, this is the entire thing
session_start();
$_SESSION = [];
session_destroy();
// redirect back to the login page</code></pre>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="verify">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">إزاي بنتحقق إن الباسورد اللي دخل بيه المستخدم صح، من غير ما "نفك" الـ Hash؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">How do we check a login password is correct without ever "decrypting" the hash?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="decrypt"> بفك تشفير الـ Hash ومقارنته بالباسورد</label>
        <label><input type="radio" name="q1" value="verify"> بـ password_verify($password, $hash)</label>
        <label><input type="radio" name="q1" value="equals"> بمقارنة $hash1 == $hash2 مباشرة</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="different">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">لو عملت <code>password_hash()</code> لنفس الباسورد مرتين، إيه اللي هيحصل؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">If you call <code>password_hash()</code> on the same password twice, what happens?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="same"> نفس الـ Hash بالظبط في المرتين</label>
        <label><input type="radio" name="q2" value="different"> Hash مختلف في كل مرة بسبب الـ Salt العشوائي</label>
        <label><input type="radio" name="q2" value="error"> بترمي Error</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="duplicate">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">حسب الناتج الفعلي فوق، محاولة تسجيل حساب بإيميل موجود بالفعل رجّعت إيه؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Per the actual output above, what did registering with an already-taken email return?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="ok"> {"ok":true} وحساب جديد اتسجل</label>
        <label><input type="radio" name="q3" value="duplicate"> {"ok":false,"error":"Email already registered."}</label>
        <label><input type="radio" name="q3" value="crash"> رسالة Fatal Error</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="cli">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">ليه <code>logout()</code> مش موضّحة بناتج فعلي متنفّذ زي <code>register()</code> و<code>login()</code>؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Why isn't <code>logout()</code> shown with real executed output like <code>register()</code> and <code>login()</code>?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="cli"> لإن الدرس بيتشغّل عن طريق CLI ومفيش متصفح حقيقي يبعت/يستقبل Cookies الـ Session</label>
        <label><input type="radio" name="q4" value="hard"> لإن session_destroy() صعبة جدًا في الكتابة</label>
        <label><input type="radio" name="q4" value="unnecessary"> لإن Logout مش مهم في الأمان</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ قوّة الباسورد / Password Strength</h3>
    <div class="ar">🇪🇬 في <a href="../playground/index.php">محرر الكود</a>: زوّد فحص جديد جوه <code>register()</code> (أو دالة منفصلة <code>isStrongPassword(string $password): bool</code>) بيرفض الباسورد لو أقل من 8 أحرف، أو لو مفيهوش رقم واحد على الأقل. جرّبها بباسوردات مختلفة ("123"، "password"، "S3cur3P@ss") وشوف كل واحدة بترجع إيه.</div>
    <div class="en">🇬🇧 In the <a href="../playground/index.php">Playground</a>: add a new check inside <code>register()</code> (or a separate <code>isStrongPassword(string $password): bool</code> function) that rejects passwords shorter than 8 characters, or with no digit at all. Test it against different passwords ("123", "password", "S3cur3P@ss") and see what each one returns.</div>
</div>

<h2 id="project">🚀 اللي بعد كده / What Comes Next</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 دلوقتي عندك آلة حاسبة (المشروع 1)، فورم Validation كامل (المشروع 2)، ونظام تسجيل دخول حقيقي بقاعدة بيانات (المشروع 3) — تلات لبنات أساسية بيتبني عليهم أي Backend حقيقي. المشروع 4 المخطط له ("Blog Backend") لسه مش مبني في المنصة، لكن هتلاقي كل المهارات اللي محتاجها ليه (CRUD كامل، علاقات بين جداول، صلاحيات) مجمّعة ومطبّقة في <a href="capstone.php">مشروع التخرج</a> اللي جاي بعد باقي الدروس — وهو بيضم بالظبط نفس فكرة الـ Authentication اللي بنيتها هنا، بس داخل REST API كامل فيه CRUD وحماية وبنية منظمة.</div>
    <div class="en">🇬🇧 You now have a calculator (Project 1), full form validation (Project 2), and a real database-backed authentication system (Project 3) — three fundamental building blocks every real Backend is built on. Project 4 ("Blog Backend") is planned but not yet built on this platform, but you'll find every skill it would need (full CRUD, table relationships, permissions) already assembled and applied in the <a href="capstone.php">Capstone Project</a> further ahead — which includes the exact same authentication idea you built here, inside a complete REST API with CRUD, security, and clean structure.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>الباسورد بيتخزن دايمًا بـ <code>password_hash()</code> أبدًا مش كنص عادي.</li>
        <li>التحقق وقت الدخول بـ <code>password_verify($password, $hash)</code> — مفيش "فك تشفير" ولا مقارنة Hash بـ Hash.</li>
        <li>تسجيل بإيميل موجود لازم يترفض بوضوح بـ SELECT قبل أي INSERT.</li>
        <li>Logout معتمد على Sessions، وده معتمد على HTTP الحقيقي (Cookies) — مش حاجة نقدر نجربها بأمانة عن طريق CLI.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="project2-contact-form.php">← المشروع 2 / Contact Form</a>
    <a href="capstone.php">مشروع التخرج / Next: Capstone Project →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
