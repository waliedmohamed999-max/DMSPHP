<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'oop-dependency-injection-project';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'Stage 11 — Project: Refactoring with Dependency Injection';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">Stage 11 · Object-Oriented PHP</span>
<h1>🚀 مشروع: إعادة هيكلة بـ Dependency Injection <span class="ltr">🚀 Project: Refactoring with Dependency Injection</span></h1>
<p class="subtitle">
    🇪🇬 من كلاس User واحد لـ User/UserRepository/UserService/AuthService — ولماذا التقسيم ده أفضل.<br>
    <span class="ltr">🇬🇧 From one User class to User/UserRepository/UserService/AuthService — and why that split is better.</span>
</p>

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
    <div class="ar">🇪🇬 ده الدرس الختامي لمرحلة OOP — مشروع كامل بيجمع كل حاجة اتعلمناها (Classes، Encapsulation، Inheritance، Interfaces) عشان نحل مشكلة حقيقية جدًا: كلاس واحد "بيعمل كل حاجة" وبيبقى صعب الصيانة. هنشوف المشكلة، وبعدين نعيد بنائها بمبدأ <b>Dependency Injection</b> لكلاسات صغيرة كل واحدة ليها مسؤولية واحدة واضحة.</div>
    <div class="en">🇬🇧 This is the closing lesson of the OOP stage — a full project that brings together everything so far (Classes, Encapsulation, Inheritance, Interfaces) to solve a very real problem: one class that "does everything" and becomes hard to maintain. We'll see the problem, then rebuild it using <b>Dependency Injection</b> into small classes, each with one clear responsibility.</div>
</div>

<h2 id="understand">🧠 1) المشكلة: كلاس User واحد بيعمل كل حاجة / The Problem: One User Class Doing Everything</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 شوف الكلاس ده (متعمّد إنه مش هيتشغل — بس عشان توضيح المشكلة). <code>UserBloated</code> بيتحقق من صحة البيانات، بيتكلم مباشرة مع الداتابيز عن طريق <code>PDO</code>, وبيحتوي منطق الأعمال (تسجيل مستخدم) — كل ده جوه Method واحدة.</div>
    <div class="en">🇬🇧 Look at this class (deliberately not run — it's here only to illustrate the problem). <code>UserBloated</code> validates data, talks directly to the database via <code>PDO</code>, and contains business logic (registering a user) — all inside a single method.</div>
</div>

<pre><code>&lt;?php
// ⚠️ هذا الكلاس عرض توضيحي للمشكلة فقط — لن يتم تشغيله
class UserBloated
{
    public string $name;
    public string $email;

    public function register(string $name, string $email, string $plainPassword): void
    {
        // 1) Validation
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException("Invalid email.");
        }

        // 2) Direct database access
        $pdo = new PDO('mysql:host=localhost;dbname=app', 'root', '');
        $stmt = $pdo->prepare('SELECT id FROM users WHERE email = ?');
        $stmt->execute([$email]);
        if ($stmt->fetch()) {
            throw new RuntimeException("Email already registered.");
        }

        // 3) Business logic (hashing, saving)
        $hash = password_hash($plainPassword, PASSWORD_BCRYPT);
        $insert = $pdo->prepare('INSERT INTO users (name, email, password) VALUES (?, ?, ?)');
        $insert->execute([$name, $email, $hash]);

        $this->name = $name;
        $this->email = $email;
    }
}</code></pre>

<div class="bi-block">
    <div class="ar">🇪🇬 المشاكل الحقيقية في ده مش نظرية:
        <ul>
            <li><b>صعب الاختبار (Testing)</b>: مينفعش تختبر منطق الـ Validation من غير ما تفتح اتصال حقيقي بقاعدة بيانات — الكلاس بيخلق الـ <code>PDO</code> بنفسه جوه الـ method.</li>
            <li><b>صعب إعادة الاستخدام</b>: لو عايز تسجّل مستخدم من مصدر تاني (CLI script مثلًا)، هتضطر تنسخ نفس المنطق أو تستدعي method مرتبطة بالكامل بقاعدة بيانات معينة.</li>
            <li><b>مخالفة Single Responsibility</b>: الكلاس بيغيّر لأي سبب من التلاتة (تغيير الـ Validation، تغيير نوع قاعدة البيانات، تغيير منطق التسجيل) — لازم يكون له سبب واحد بس للتغيير.</li>
        </ul>
    </div>
    <div class="en">🇬🇧 The real problems here aren't theoretical:
        <ul>
            <li><b>Hard to test</b>: you can't test the validation logic without opening a real database connection — the class creates its own <code>PDO</code> inside the method.</li>
            <li><b>Hard to reuse</b>: if you want to register a user from another entry point (say, a CLI script), you'd have to duplicate the logic or call a method tightly coupled to one specific database.</li>
            <li><b>Violates Single Responsibility</b>: the class changes for any of three unrelated reasons (validation changes, database type changes, registration logic changes) — a class should have exactly one reason to change.</li>
        </ul>
    </div>
</div>

<h2 id="practice">💻 2) الحل: تقسيم بمسؤولية واحدة لكل كلاس / The Fix: One Responsibility per Class</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 هنقسّم الكلاس الواحد ده لأربع كلاسات:
        <ul>
            <li><code>User</code>: مجرد حامل بيانات (Data Holder) — مفيهاش أي منطق.</li>
            <li><code>UserRepository</code>: مسؤول وحيد عن التخزين (PDO) — إزاي نجيب/نحفظ مستخدم.</li>
            <li><code>UserService</code>: منطق الأعمال — "تسجيل مستخدم جديد" بكل قواعده.</li>
            <li><code>AuthService</code>: منطق تسجيل الدخول.</li>
        </ul>
        الأهم: <code>UserService</code> و<code>AuthService</code> مش بيعملوا <code>new UserRepository()</code> جوّاهم — هما بياخدوها جاهزة في الـ Constructor (<code>__construct(UserRepository $repo)</code>). ده اسمه <b>Constructor Injection</b>: الكلاس بيقول "أنا محتاج Repository"، ومش هو اللي بيقرر إزاي يتبني.
    </div>
    <div class="en">🇬🇧 We split that one class into four:
        <ul>
            <li><code>User</code>: a plain data holder — no logic at all.</li>
            <li><code>UserRepository</code>: solely responsible for persistence (PDO) — how to fetch/save a user.</li>
            <li><code>UserService</code>: business logic — "register a new user" with all its rules.</li>
            <li><code>AuthService</code>: login logic.</li>
        </ul>
        The key part: <code>UserService</code> and <code>AuthService</code> never do <code>new UserRepository()</code> internally — they receive it ready-made through the constructor (<code>__construct(UserRepository $repo)</code>). This is called <b>Constructor Injection</b>: the class says "I need a Repository," and it's not the one deciding how it gets built.
    </div>
</div>

<pre><code>&lt;?php
require __DIR__ . '/../db-sandbox/schema.php';

// Plain data holder
class User
{
    public ?int $id = null;

    public function __construct(
        public string $name,
        public string $email,
        public string $passwordHash
    ) {}
}

// Handles persistence only
class UserRepository
{
    public function __construct(private PDO $pdo) {}

    public function findByEmail(string $email): ?User
    {
        $stmt = $this-&gt;pdo-&gt;prepare('SELECT id, name, email, role FROM users WHERE email = ?');
        $stmt-&gt;execute([$email]);
        $row = $stmt-&gt;fetch(PDO::FETCH_ASSOC);
        if (!$row) {
            return null;
        }
        $user = new User($row['name'], $row['email'], 'seeded-hash');
        $user-&gt;id = (int) $row['id'];
        return $user;
    }

    public function save(User $user): User
    {
        $stmt = $this-&gt;pdo-&gt;prepare(
            'INSERT INTO users (name, email, role, created_at) VALUES (?, ?, ?, ?)'
        );
        $stmt-&gt;execute([$user-&gt;name, $user-&gt;email, 'user', date('Y-m-d')]);
        $user-&gt;id = (int) $this-&gt;pdo-&gt;lastInsertId();
        return $user;
    }
}

// Business logic: registration
class UserService
{
    public function __construct(private UserRepository $repository) {}

    public function register(string $name, string $email, string $plainPassword): User
    {
        if ($this-&gt;repository-&gt;findByEmail($email) !== null) {
            throw new RuntimeException("Email '$email' is already registered.");
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException("'$email' is not a valid email.");
        }
        $hash = password_hash($plainPassword, PASSWORD_BCRYPT);
        $user = new User($name, $email, $hash);
        return $this-&gt;repository-&gt;save($user);
    }
}

// Business logic: login
class AuthService
{
    public function __construct(private UserRepository $repository) {}

    public function login(string $email, string $plainPassword): string
    {
        $user = $this-&gt;repository-&gt;findByEmail($email);
        if ($user === null) {
            return "Login failed: no account for '$email'.";
        }
        // NOTE: real password check is skipped here since the sandbox
        // 'users' table has no password column; this demonstrates flow only.
        return "Login success: welcome back, {$user-&gt;name} (id #{$user-&gt;id}).";
    }
}</code></pre>

<h2>3) تشغيل التدفق الكامل: تسجيل ثم دخول / Running the Full Flow: Register Then Log In</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 هنبني الاعتماديات مرة واحدة في نقطة الدخول (<code>$pdo</code> → <code>$repository</code> → الخدمات)، وبعدين نستخدم <code>UserService</code> عشان نسجّل مستخدم جديد، ثم <code>AuthService</code> عشان نسجّل دخول بنفس الإيميل. لاحظ إن الاتنين بيستخدموا <code>$repository</code> نفسها، من غير ما أي منهم يعرف إزاي اتبنت.</div>
    <div class="en">🇬🇧 We build the dependencies once at the entry point (<code>$pdo</code> → <code>$repository</code> → the services), then use <code>UserService</code> to register a new user, followed by <code>AuthService</code> to log in with the same email. Notice both use the same <code>$repository</code>, without either knowing how it was built.</div>
</div>

<pre><code>&lt;?php
$pdo = build_sandbox_pdo();
$repository = new UserRepository($pdo);
$userService = new UserService($repository);
$authService = new AuthService($repository);

echo "-- Registering a new user through UserService --" . PHP_EOL;
$newUser = $userService-&gt;register("Mona Tarek", "mona@example.com", "s3cret-pass");
echo "Registered: {$newUser-&gt;name} &lt;{$newUser-&gt;email}&gt; with id #{$newUser-&gt;id}" . PHP_EOL;

echo PHP_EOL . "-- Trying to register the same email again --" . PHP_EOL;
try {
    $userService-&gt;register("Mona Duplicate", "mona@example.com", "another-pass");
} catch (RuntimeException $e) {
    echo "Rejected: " . $e-&gt;getMessage() . PHP_EOL;
}

echo PHP_EOL . "-- Logging in through AuthService --" . PHP_EOL;
echo $authService-&gt;login("mona@example.com", "s3cret-pass") . PHP_EOL;
echo $authService-&gt;login("nobody@example.com", "whatever") . PHP_EOL;</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">-- Registering a new user through UserService --
Registered: Mona Tarek <mona@example.com> with id #6

-- Trying to register the same email again --
Rejected: Email 'mona@example.com' is already registered.

-- Logging in through AuthService --
Login success: welcome back, Mona Tarek (id #6).
Login failed: no account for 'nobody@example.com'.</div>

<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ الـ <code>id #6</code> — الـ Sandbox بتيجي جاهزة بـ 5 مستخدمين افتراضيين (شوفهم في <a href="../db-sandbox/index.php">SQL Sandbox</a>)، فمستخدمنا الجديد أخد الـ id التالي فعليًا من قاعدة البيانات، مش رقم تخيلي.</div>
    <div class="en">🇬🇧 Notice <code>id #6</code> — the sandbox comes pre-seeded with 5 default users (see them in the <a href="../db-sandbox/index.php">SQL Sandbox</a>), so our new user really got the next id from the database, not a made-up number.</div>
</div>

<div class="bi-block">
    <div class="ar">🇪🇬 <b>ليه Constructor Injection بالذات؟</b> لو <code>AuthService</code> كانت بتعمل <code>new UserRepository(new PDO(...))</code> جوّاها، مستحيل تختبرها من غير قاعدة بيانات حقيقية. بما إنها بتاخد <code>UserRepository</code> جاهزة من برة، تقدر نظريًا تمرّرلها كلاس وهمي (Mock) بنفس شكل <code>UserRepository</code> بس من غير أي اتصال حقيقي — الكود بتاع <code>AuthService</code> نفسه مش هيتغيّر ولا سطر. إحنا مش هنبني الـ Mock هنا، بس البنية دي هي اللي بتخلّي ده ممكن أصلًا.</div>
    <div class="en">🇬🇧 <b>Why constructor injection specifically?</b> If <code>AuthService</code> did <code>new UserRepository(new PDO(...))</code> internally, you could never test it without a real database. Since it receives a ready-made <code>UserRepository</code> from outside, you could in principle pass in a fake/mock class shaped like <code>UserRepository</code> but with no real connection — not one line of <code>AuthService</code>'s own code would need to change. We won't build that mock here, but this structure is exactly what makes it possible.</div>
</div>

<div class="mini-editor-wrap">
    <textarea spellcheck="false">&lt;?php
require __DIR__ . '/../db-sandbox/schema.php';

class User
{
    public ?int $id = null;

    public function __construct(
        public string $name,
        public string $email,
        public string $passwordHash
    ) {}
}

class UserRepository
{
    public function __construct(private PDO $pdo) {}

    public function findByEmail(string $email): ?User
    {
        $stmt = $this-&gt;pdo-&gt;prepare('SELECT id, name, email FROM users WHERE email = ?');
        $stmt-&gt;execute([$email]);
        $row = $stmt-&gt;fetch(PDO::FETCH_ASSOC);
        if (!$row) {
            return null;
        }
        $user = new User($row['name'], $row['email'], 'seeded-hash');
        $user-&gt;id = (int) $row['id'];
        return $user;
    }
}

class AuthService
{
    public function __construct(private UserRepository $repository) {}

    public function login(string $email): string
    {
        $user = $this-&gt;repository-&gt;findByEmail($email);
        return $user
            ? "Login success: welcome back, {$user-&gt;name}."
            : "Login failed: no account for '$email'.";
    }
}

$pdo = build_sandbox_pdo();
$auth = new AuthService(new UserRepository($pdo));

echo $auth-&gt;login("sara@example.com") . PHP_EOL;
echo $auth-&gt;login("ghost@example.com") . PHP_EOL;</textarea>
    <div class="mini-toolbar">
        <button class="mini-run-btn">▶ شغّل / Run</button>
        <span class="mini-status"></span>
    </div>
    <div class="output-box">— لسه متشغلش / not run yet —</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="srp">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">أكبر مشكلة في <code>UserBloated</code> الأصلي كانت إيه؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What was the biggest problem with the original <code>UserBloated</code>?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="slow"> الكود بطيء في التنفيذ</label>
        <label><input type="radio" name="q1" value="srp"> بيخلط Validation + Database + Business Logic في مكان واحد، فمفيهوش مسؤولية واحدة</label>
        <label><input type="radio" name="q1" value="syntax"> فيه خطأ Syntax</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="repo">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">أنهي كلاس من الأربعة هو المسؤول الوحيد عن التعامل مع <code>PDO</code>؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Which of the four classes is solely responsible for talking to <code>PDO</code>?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="user"> User</label>
        <label><input type="radio" name="q2" value="repo"> UserRepository</label>
        <label><input type="radio" name="q2" value="service"> UserService</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="injection">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question"><code>UserService</code> بتاخد <code>UserRepository</code> إزاي؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">How does <code>UserService</code> obtain its <code>UserRepository</code>?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="new"> بتعمل new UserRepository() بنفسها جوه الكلاس</label>
        <label><input type="radio" name="q3" value="injection"> بتستلمها جاهزة عن طريق الـ Constructor (Dependency Injection)</label>
        <label><input type="radio" name="q3" value="global"> بتقراها من متغير global</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="testable">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">ليه Constructor Injection بتخلي <code>AuthService</code> "قابلة للاختبار" (Testable) أكتر من لو كانت بتعمل الاتصال بنفسها؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Why does constructor injection make <code>AuthService</code> more testable than if it created its own connection?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="faster"> لإنها بتخلي الكود يشتغل أسرع</label>
        <label><input type="radio" name="q4" value="testable"> لإنك تقدر تمررلها Repository وهمي (Mock) من غير قاعدة بيانات حقيقية</label>
        <label><input type="radio" name="q4" value="none"> مفيش فرق حقيقي بين الاتنين</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ ProfileService بنفس المبدأ / A ProfileService With the Same Pattern</h3>
    <div class="ar">🇪🇬 في <a href="../playground/index.php">محرر الكود</a>: باستخدام نفس <code>UserRepository</code> فوق، ابني <code>ProfileService</code> بـ Constructor Injection ليها method <code>updateName(int $userId, string $newName): string</code> بتجيب المستخدم بالـ <code>id</code>، تتأكد إنه موجود، وترجع رسالة تأكيد. جرّبها مع id موجود وid مش موجود.</div>
    <div class="en">🇬🇧 In the <a href="../playground/index.php">Playground</a>: using the same <code>UserRepository</code> above, build a <code>ProfileService</code> with constructor injection and an <code>updateName(int $userId, string $newName): string</code> method that fetches the user by <code>id</code>, confirms it exists, and returns a confirmation message. Try it with both an existing and a non-existent id.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 التقسيم اللي عملناه هنا (Repository لفصل التخزين، Service لفصل منطق الأعمال) هو بالظبط أساس بنية الـ <b>MVC</b> اللي هتشوفها في مرحلة "بنية نظيفة و MVC" الجاية — هناك هنضيف طبقة <b>Controller</b> بتستقبل طلبات HTTP وتنادي نفس الـ Services دي، من غير ما تعرف حاجة عن قاعدة البيانات ولا حتى عن HTML.</div>
    <div class="en">🇬🇧 The split we made here (a Repository for persistence, a Service for business logic) is exactly the foundation of the <b>MVC</b> architecture you'll see in the upcoming "Clean Architecture & MVC" stage — there we'll add a <b>Controller</b> layer that receives HTTP requests and calls these same Services, knowing nothing about the database or even HTML.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>كلاس واحد بيعمل Validation + Database + Business Logic معًا صعب في الاختبار وإعادة الاستخدام، ومخالف لـ Single Responsibility.</li>
        <li>الحل: <code>User</code> (بيانات فقط)، <code>UserRepository</code> (تخزين فقط)، <code>UserService</code> (تسجيل)، <code>AuthService</code> (دخول).</li>
        <li>Dependency Injection عن طريق الـ Constructor = الكلاس بياخد اعتمادياته جاهزة من برة، بدل ما يبنيها بنفسه.</li>
        <li>الفايدة العملية: تقدر تستبدل <code>UserRepository</code> الحقيقية بواحدة وهمية (Mock) للاختبار من غير ما تلمس كود <code>UserService</code> أو <code>AuthService</code>.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="oop-interfaces-abstract-traits.php">← المرحلة السابقة</a>
    <a href="../index.php">المرحلة الجاية / Next: Clean Architecture & MVC →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
