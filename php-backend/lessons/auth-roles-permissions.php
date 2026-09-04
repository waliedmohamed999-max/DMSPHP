<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'auth-roles-permissions';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'الأدوار والصلاحيات — Roles & Permissions';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">Stage 10 · Authentication & Authorization</span>
<h1>الأدوار والصلاحيات <span class="ltr">Roles &amp; Permissions</span></h1>
<p class="subtitle">من "مسجّل دخول؟" لـ "مسموحله يعمل إيه؟" — Authentication مقابل Authorization. <span class="ltr">From "are you logged in?" to "what are you allowed to do?" — Authentication vs Authorization.</span></p>

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
    <div class="ar">🇪🇬 الدرس اللي فات خلّانا نعرف "مين المستخدم ده؟" عن طريق <code>$_SESSION</code>. السؤال هنا مختلف تمامًا: "المستخدم ده، مسموحله يعمل الحاجة دي بالذات؟". الدرس ده بيفرّق بوضوح بين <b>Authentication</b> (المصادقة) و<b>Authorization</b> (التفويض)، وبيبني دالة فحص صلاحيات حقيقية <code>canDeletePost()</code> نشغّلها ضد بيانات حقيقية من الـ Sandbox (مستخدمين بأدوار مختلفة، ومنشورات مملوكة لمستخدمين محددين).</div>
    <div class="en">🇬🇧 The previous lesson let us know "who is this user?" via <code>$_SESSION</code>. The question here is entirely different: "is this specific user allowed to do this specific thing?". This lesson draws a clear line between <b>Authentication</b> and <b>Authorization</b>, and builds a real permission-check function, <code>canDeletePost()</code>, that we run against real sandbox data (users with different roles, and posts owned by specific users).</div>
</div>

<h2 id="understand">🧠 Authentication مقابل Authorization / Authentication vs Authorization</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>Authentication (المصادقة)</b> = "مين انت؟" — بتحصل مرة واحدة وقت تسجيل الدخول، عن طريق <code>password_verify()</code>، وناتجها هوية محفوظة (زي <code>$_SESSION['user_id']</code>). <b>Authorization (التفويض)</b> = "مسموحلك تعمل إيه؟" — بتتحقق منها في كل مرة المستخدم بيحاول يعمل فيها حاجة معينة (يحذف بوست، يعدّل مستخدم تاني، يشوف صفحة إدارية)، وممكن تختلف الإجابة حسب الـ Role بتاعه أو حسب ملكيته للحاجة اللي بيحاول يعدّلها. مستخدم ممكن يكون "Authenticated" (مسجّل دخول فعلًا) لكن "Not Authorized" (مش مسموحله) يعمل حاجة معينة.</div>
    <div class="en">🇬🇧 <b>Authentication</b> = "who are you?" — happens once, at login, via <code>password_verify()</code>, and its result is a stored identity (like <code>$_SESSION['user_id']</code>). <b>Authorization</b> = "what are you allowed to do?" — checked every time a user tries to do something specific (delete a post, edit another user, view an admin page), and the answer can depend on their role or on whether they own the thing they're trying to change. A user can be fully "Authenticated" (genuinely logged in) yet "Not Authorized" to do a particular thing.</div>
</div>

<div class="bi-block">
    <div class="ar">🇪🇬 قاعدة الصلاحية اللي هنطبّقها: مستخدم يقدر يحذف بوست لو (أ) هو <code>admin</code> — بيقدر يحذف أي بوست — أو (ب) هو صاحب البوست نفسه (<code>$user['id'] === $post['user_id']</code>) — حتى لو مش admin. أي حالة تانية غير كده، الحذف مرفوض.</div>
    <div class="en">🇬🇧 The permission rule we'll apply: a user can delete a post if (a) they are an <code>admin</code> — able to delete any post — or (b) they own that specific post (<code>$user['id'] === $post['user_id']</code>) — even without being an admin. Anything else, and deletion is denied.</div>
</div>

<pre><code>&lt;?php
require __DIR__ . '/../db-sandbox/schema.php';
$pdo = build_sandbox_pdo();

function canDeletePost(array $user, array $post): bool
{
    return $user['role'] === 'admin' || $user['id'] === $post['user_id'];
}

function fetchUser(PDO $pdo, int $id): array
{
    $stmt = $pdo-&gt;prepare('SELECT * FROM users WHERE id = ?');
    $stmt-&gt;execute([$id]);
    return $stmt-&gt;fetch(PDO::FETCH_ASSOC);
}

function fetchPost(PDO $pdo, int $id): array
{
    $stmt = $pdo-&gt;prepare('SELECT * FROM posts WHERE id = ?');
    $stmt-&gt;execute([$id]);
    return $stmt-&gt;fetch(PDO::FETCH_ASSOC);
}

// Real seeded rows: user #1 Ahmed Hassan is 'admin'. user #2 Sara Ali is 'user'.
// Post #3 belongs to user_id 2 (Sara). Post #1 belongs to user_id 1 (Ahmed).
$admin = fetchUser($pdo, 1);
$sara  = fetchUser($pdo, 2);
$omar  = fetchUser($pdo, 3);

$saraPost  = fetchPost($pdo, 3); // Sara's own post
$adminPost = fetchPost($pdo, 1); // Ahmed's post

echo "Admin: {$admin['name']} (role={$admin['role']}, id={$admin['id']})" . PHP_EOL;
echo "Sara: {$sara['name']} (role={$sara['role']}, id={$sara['id']})" . PHP_EOL;
echo "Omar: {$omar['name']} (role={$omar['role']}, id={$omar['id']})" . PHP_EOL;
echo "Post #{$saraPost['id']}: \"{$saraPost['title']}\" belongs to user_id={$saraPost['user_id']}" . PHP_EOL;
echo "Post #{$adminPost['id']}: \"{$adminPost['title']}\" belongs to user_id={$adminPost['user_id']}" . PHP_EOL;
echo PHP_EOL;

echo "1) Admin deleting someone else's post (Sara's post #3):" . PHP_EOL;
var_dump(canDeletePost($admin, $saraPost));

echo "2) Sara deleting her own post (#3):" . PHP_EOL;
var_dump(canDeletePost($sara, $saraPost));

echo "3) Omar (regular user) deleting someone else's post (Sara's #3):" . PHP_EOL;
var_dump(canDeletePost($omar, $saraPost));

echo "4) Omar (regular user) deleting Ahmed's post (#1) too, for good measure:" . PHP_EOL;
var_dump(canDeletePost($omar, $adminPost));</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">Admin: Ahmed Hassan (role=admin, id=1)
Sara: Sara Ali (role=user, id=2)
Omar: Omar Khaled (role=user, id=3)
Post #3: "My First REST API" belongs to user_id=2
Post #1: "Getting Started with PDO" belongs to user_id=1

1) Admin deleting someone else's post (Sara's post #3):
bool(true)
2) Sara deleting her own post (#3):
bool(true)
3) Omar (regular user) deleting someone else's post (Sara's #3):
bool(false)
4) Omar (regular user) deleting Ahmed's post (#1) too, for good measure:
bool(false)</div>

<div class="bi-block">
    <div class="ar">🇪🇬 الأربع نتايج دي بتلخّص قاعدة الصلاحية بالكامل: الـ Admin بيعدّي دايمًا (حالة 1)، صاحب المحتوى بيعدّي حتى من غير Admin (حالة 2)، وأي حد تاني (لا Admin ولا صاحب) بيترفض دايمًا (حالتين 3 و4). لاحظ إن الأربع مستخدمين دول <b>كلهم Authenticated</b> بمعنى إنهم مستخدمين حقيقيين موجودين في قاعدة البيانات — الفرق اللي بيحدد النتيجة هو Authorization بس، حسب الـ role وملكية المحتوى.</div>
    <div class="en">🇬🇧 These four results summarize the whole permission rule: an admin always passes (case 1), the content's owner passes even without being admin (case 2), and anyone else (neither admin nor owner) is always denied (cases 3 and 4). Notice all four are <b>equally authenticated</b> — real users that exist in the database. The only thing deciding the outcome is authorization, based on role and content ownership.</div>
</div>

<div class="bi-block">
    <div class="ar">🇪🇬 جرّب في المحرر تحت: غيّر <code>role</code> بتاع Omar يدويًا لـ <code>'admin'</code> وشوف الحالة التالتة بتتغير إزاي — كده هتشوف بعينك تأثير الـ Authorization في نفس اللحظة اللي الهوية (Authentication) فيها متغيّرتش خالص.</div>
    <div class="en">🇬🇧 Try it in the editor below: manually change Omar's <code>role</code> to <code>'admin'</code> and watch case 3 flip — you'll see authorization's effect while authentication itself never changed at all.</div>
</div>

<div class="mini-editor-wrap">
    <textarea spellcheck="false">&lt;?php
require __DIR__ . '/../db-sandbox/schema.php';
$pdo = build_sandbox_pdo();

function canDeletePost(array $user, array $post): bool
{
    return $user['role'] === 'admin' || $user['id'] === $post['user_id'];
}

function fetchUser(PDO $pdo, int $id): array
{
    $stmt = $pdo-&gt;prepare('SELECT * FROM users WHERE id = ?');
    $stmt-&gt;execute([$id]);
    return $stmt-&gt;fetch(PDO::FETCH_ASSOC);
}

function fetchPost(PDO $pdo, int $id): array
{
    $stmt = $pdo-&gt;prepare('SELECT * FROM posts WHERE id = ?');
    $stmt-&gt;execute([$id]);
    return $stmt-&gt;fetch(PDO::FETCH_ASSOC);
}

$omar = fetchUser($pdo, 3);
$omar['role'] = 'admin'; // try flipping this back to 'user'
$saraPost = fetchPost($pdo, 3);

echo "Can Omar (role={$omar['role']}) delete Sara's post? ";
var_dump(canDeletePost($omar, $saraPost));</textarea>
    <div class="mini-toolbar">
        <button class="mini-run-btn">▶ شغّل / Run</button>
        <span class="mini-status"></span>
    </div>
    <div class="output-box">— لسه متشغلش / not run yet —</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="auth">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">إيه الفرق الأساسي بين Authentication وAuthorization؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What's the fundamental difference between Authentication and Authorization?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="auth"> Authentication = مين انت؟ (تسجيل الدخول) — Authorization = مسموحلك تعمل إيه؟</label>
        <label><input type="radio" name="q1" value="same"> نفس الحاجة بالظبط، مجرد اسمين مختلفين</label>
        <label><input type="radio" name="q1" value="reverse"> Authorization = مين انت؟ — Authentication = مسموحلك تعمل إيه؟</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="owner">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">حسب <code>canDeletePost()</code>، إمتى يقدر مستخدم عادي (مش admin) يحذف بوست؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Per <code>canDeletePost()</code>, when can a regular (non-admin) user delete a post?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="owner"> لما يكون هو صاحب البوست (user_id بتاعه بيطابق user_id البوست)</label>
        <label><input type="radio" name="q2" value="never"> أبدًا، بس الـ admin هو اللي يقدر</label>
        <label><input type="radio" name="q2" value="anyone"> أي مستخدم يقدر يحذف أي بوست</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="false">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">حسب الناتج الفعلي فوق، هل Omar (مستخدم عادي) يقدر يحذف بوست Sara؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Per the actual output above, can Omar (a regular user) delete Sara's post?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="true"> true، لإنه مستخدم مسجّل دخول</label>
        <label><input type="radio" name="q3" value="false"> false، لإنه مش admin ولا صاحب البوست</label>
        <label><input type="radio" name="q3" value="error"> بيرمي Exception</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="both">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">في المثال، هل Omar وAhmed (الـ Admin) كلاهما "Authenticated"؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">In the example, are both Omar and Ahmed (the admin) "Authenticated"?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="both"> أيوه، الاتنين مستخدمين حقيقيين موجودين — الفرق بينهم في الـ Authorization بس</label>
        <label><input type="radio" name="q4" value="onlyadmin"> لأ، بس Ahmed هو الـ Authenticated لإنه admin</label>
        <label><input type="radio" name="q4" value="neither"> لأ، محدش فيهم Authenticated لإننا في CLI</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ صلاحية تعديل بدل حذف / An Edit Permission Instead of Delete</h3>
    <div class="ar">🇪🇬 في <a href="../playground/index.php">محرر الكود</a> (أو المحرر المصغّر فوق): اكتب دالة جديدة <code>canEditPost(array $user, array $post): bool</code> بقاعدة مختلفة شوية: الـ Admin أو الـ editor role يقدروا يعدّلوا أي بوست، لكن مستخدم عادي (role = 'user') يقدر يعدّل بوستاته هو بس. جرّبها مع Laila Mostafa (id=4, role='editor') على بوست مش بتاعها.</div>
    <div class="en">🇬🇧 In the <a href="../playground/index.php">Playground</a> (or the mini editor above): write a new function <code>canEditPost(array $user, array $post): bool</code> with a slightly different rule: an admin or an editor role can edit any post, but a regular user (role = 'user') can only edit their own. Test it with Laila Mostafa (id=4, role='editor') on a post that isn't hers.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 دلوقتي عندنا دالة صلاحيات بتشتغل على مستوى "عنصر واحد" (بوست واحد، مستخدم واحد). الدرس الجاي — وهو المشروع الختامي للمرحلة دي — هياخد الفكرة دي لمستوى الصفحة كلها: صفحتين مختلفتين تمامًا (Admin Dashboard وUser Dashboard) بيتقرر شكلهم بالكامل حسب <code>role</code> المستخدم، بالظبط زي ما قررنا هنا هل يقدر يحذف ولا لأ.</div>
    <div class="en">🇬🇧 We now have a permission function working at the level of "one item" (one post, one user). The next lesson — this stage's capstone project — takes this idea to the level of an entire page: two completely different pages (Admin Dashboard and User Dashboard) whose entire content is decided by the user's <code>role</code>, exactly the way we decided delete permission here.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>Authentication = مين انت؟ (تسجيل الدخول، لحظة واحدة). Authorization = مسموحلك تعمل إيه؟ (بتتفحص كل مرة).</li>
        <li>مستخدم ممكن يكون Authenticated بالكامل ومع ذلك Not Authorized لحاجة معينة.</li>
        <li>قاعدة صلاحية بسيطة وحقيقية: <code>$user['role'] === 'admin' || $user['id'] === $post['user_id']</code>.</li>
        <li>نفس الدالة رجّعت 4 نتايج مختلفة (2 true، 2 false) حسب مين المستخدم ومين صاحب البوست — من غير أي تغيير في الكود نفسه.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="auth-login-sessions.php">← الدرس السابق / Prev: Login &amp; Sessions</a>
    <a href="auth-admin-user-dashboards.php">الدرس الجاي / Next: 🚀 Admin &amp; User Dashboards →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
