<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'auth-admin-user-dashboards';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = '🚀 مشروع: لوحات تحكم Admin و User — Admin & User Dashboards';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">Stage 10 · Authentication & Authorization</span>
<h1>🚀 مشروع: لوحات تحكم Admin و User <span class="ltr">🚀 Project: Admin &amp; User Dashboards</span></h1>
<p class="subtitle">صفحتين مختلفتين حسب الدور، وحماية صفحة الـ Admin من مستخدم عادي بيحاول يدخلها بالرابط المباشر. <span class="ltr">Two different pages based on role, and protecting the admin page from a regular user hitting its URL directly.</span></p>

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
    <div class="ar">🇪🇬 ده مشروع ختامي لمرحلة "المصادقة والتفويض" كلها: بنجمع Session (من الدرس التاني) وفحص الصلاحيات (من الدرس التالت) في سيناريو واحد واقعي — لوحة تحكم بتعرض محتوى مختلف تمامًا حسب <code>role</code> المستخدم. الـ Admin بيشوف كل المستخدمين في النظام؛ المستخدم العادي بيشوف بس منشوراته هو. الفرق كله قرار واحد بسيط: <code>if ($currentUser['role'] === 'admin')</code>.</div>
    <div class="en">🇬🇧 This is the capstone project for the whole "Authentication & Authorization" stage: we combine sessions (lesson 2) and permission checks (lesson 3) into one realistic scenario — a dashboard that shows entirely different content depending on the user's <code>role</code>. An admin sees every user in the system; a regular user sees only their own posts. The entire difference comes down to one simple decision: <code>if ($currentUser['role'] === 'admin')</code>.</div>
</div>

<h2 id="understand">🧠 استعلام مختلف حسب الدور / A Different Query Based on Role</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ إن الفرق مش بس "إخفاء زرار" في الواجهة — الفرق استعلام قاعدة بيانات مختلف تمامًا. الـ Admin بيشغّل <code>SELECT * FROM users</code> (يشوف الكل). المستخدم العادي بيشغّل <code>SELECT * FROM posts WHERE user_id = ?</code> (يشوف بياناته هو بس، حتى لو حاول يغيّر أي حاجة في الواجهة، مفيش طريقة يوصل لبيانات حد تاني لإن الاستعلام نفسه محدود بـ <code>user_id</code> بتاعه). ده فرق جوهري: التفويض هنا بيتفرض على مستوى الاستعلام، مش بس على مستوى العرض.</div>
    <div class="en">🇬🇧 Notice the difference isn't just "hiding a button" in the UI — it's an entirely different database query. The admin runs <code>SELECT * FROM users</code> (sees everyone). The regular user runs <code>SELECT * FROM posts WHERE user_id = ?</code> (sees only their own data — even if they tampered with the UI, there's no way to reach someone else's data because the query itself is scoped to their own <code>user_id</code>). This is the essential point: authorization is enforced at the query level here, not just at the display level.</div>
</div>

<pre><code>&lt;?php
require __DIR__ . '/../db-sandbox/schema.php';
$pdo = build_sandbox_pdo();

function fetchUser(PDO $pdo, int $id): array
{
    $stmt = $pdo-&gt;prepare('SELECT * FROM users WHERE id = ?');
    $stmt-&gt;execute([$id]);
    return $stmt-&gt;fetch(PDO::FETCH_ASSOC);
}

function dashboardFor(PDO $pdo, array $currentUser): array
{
    if ($currentUser['role'] === 'admin') {
        // Admin view: every user in the system
        $stmt = $pdo-&gt;query('SELECT id, name, email, role FROM users');
        return ['view' =&gt; 'admin', 'rows' =&gt; $stmt-&gt;fetchAll(PDO::FETCH_ASSOC)];
    }

    // Regular-user view: only their own posts
    $stmt = $pdo-&gt;prepare('SELECT id, title, views FROM posts WHERE user_id = ?');
    $stmt-&gt;execute([$currentUser['id']]);
    return ['view' =&gt; 'user', 'rows' =&gt; $stmt-&gt;fetchAll(PDO::FETCH_ASSOC)];
}

$admin = fetchUser($pdo, 1); // Ahmed Hassan, role=admin
$sara  = fetchUser($pdo, 2); // Sara Ali, role=user

echo "1) Admin (Ahmed Hassan) loads the dashboard:" . PHP_EOL;
$adminView = dashboardFor($pdo, $admin);
echo "   view = {$adminView['view']}" . PHP_EOL;
foreach ($adminView['rows'] as $row) {
    echo "   - #{$row['id']} {$row['name']} &lt;{$row['email']}&gt; ({$row['role']})" . PHP_EOL;
}

echo PHP_EOL . "2) Regular user (Sara Ali) loads the dashboard:" . PHP_EOL;
$userView = dashboardFor($pdo, $sara);
echo "   view = {$userView['view']}" . PHP_EOL;
foreach ($userView['rows'] as $row) {
    echo "   - #{$row['id']} \"{$row['title']}\" ({$row['views']} views)" . PHP_EOL;
}</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">1) Admin (Ahmed Hassan) loads the dashboard:
   view = admin
   - #1 Ahmed Hassan &lt;ahmed@example.com&gt; (admin)
   - #2 Sara Ali &lt;sara@example.com&gt; (user)
   - #3 Omar Khaled &lt;omar@example.com&gt; (user)
   - #4 Laila Mostafa &lt;laila@example.com&gt; (editor)
   - #5 Youssef Adel &lt;youssef@example.com&gt; (user)

2) Regular user (Sara Ali) loads the dashboard:
   view = user
   - #3 "My First REST API" (85 views)
   - #5 "Debugging a Tricky Bug" (60 views)</div>

<div class="bi-block">
    <div class="ar">🇪🇬 نفس دالة <code>dashboardFor()</code> اتنادت مرتين بمستخدم مختلف، ورجّعت نتيجتين مختلفتين تمامًا في الشكل والمحتوى — من غير أي <code>if</code> إضافي بره الدالة نفسها. Sara شافت بس بوستاتها هي (#3 و#5)، مش أي بوست تاني في الجدول رغم إن فيه 8 بوستات في الـ Sandbox كلها. ده هو معنى "Authorization enforced at the query level" عمليًا.</div>
    <div class="en">🇬🇧 The same <code>dashboardFor()</code> function was called twice with a different user, and returned two completely different results in shape and content — with no extra <code>if</code> outside the function itself. Sara saw only her own posts (#3 and #5), not any of the other posts in the table even though the sandbox has 8 posts total. That's what "authorization enforced at the query level" means in practice.</div>
</div>

<div class="bi-block">
    <div class="ar">🇪🇬 جرّب في المحرر تحت: بدّل الطلب لـ Omar Khaled (id=3, role='user') بدل Sara، وشوف بوستاته هو مختلفين إزاي (لاحظ من الـ Schema إن Omar عنده بوست واحد بس: #6).</div>
    <div class="en">🇬🇧 Try it in the editor below: switch the request to Omar Khaled (id=3, role='user') instead of Sara, and see how his own posts differ (from the schema, Omar has only one post: #6).</div>
</div>

<div class="mini-editor-wrap">
    <textarea spellcheck="false">&lt;?php
require __DIR__ . '/../db-sandbox/schema.php';
$pdo = build_sandbox_pdo();

function fetchUser(PDO $pdo, int $id): array
{
    $stmt = $pdo-&gt;prepare('SELECT * FROM users WHERE id = ?');
    $stmt-&gt;execute([$id]);
    return $stmt-&gt;fetch(PDO::FETCH_ASSOC);
}

function dashboardFor(PDO $pdo, array $currentUser): array
{
    if ($currentUser['role'] === 'admin') {
        $stmt = $pdo-&gt;query('SELECT id, name, email, role FROM users');
        return ['view' =&gt; 'admin', 'rows' =&gt; $stmt-&gt;fetchAll(PDO::FETCH_ASSOC)];
    }
    $stmt = $pdo-&gt;prepare('SELECT id, title, views FROM posts WHERE user_id = ?');
    $stmt-&gt;execute([$currentUser['id']]);
    return ['view' =&gt; 'user', 'rows' =&gt; $stmt-&gt;fetchAll(PDO::FETCH_ASSOC)];
}

// Try changing id=3 to id=1 (the admin) and see the view flip entirely
$omar = fetchUser($pdo, 3);
$view = dashboardFor($pdo, $omar);
echo "view = {$view['view']}" . PHP_EOL;
foreach ($view['rows'] as $row) {
    echo '   ' . json_encode($row) . PHP_EOL;
}</textarea>
    <div class="mini-toolbar">
        <button class="mini-run-btn">▶ شغّل / Run</button>
        <span class="mini-status"></span>
    </div>
    <div class="output-box">— لسه متشغلش / not run yet —</div>
</div>

<h2>🚧 حماية صفحة الـ Admin من مستخدم عادي / Protecting the Admin Page from a Regular User</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 في مشروع حقيقي، مش كفاية إن الـ Dashboard تعرض محتوى مختلف — لازم كمان تمنع مستخدم عادي من الوصول لصفحة <code>admin.php</code> نفسها لو حاول يكتب رابطها مباشرة في المتصفح، حتى لو مفيش زرار بيوديه لها في الواجهة. القرار اللي بيحدد ده بسيط جدًا (نفس فكرة <code>canDeletePost()</code> من الدرس اللي فات): <code>$currentUser['role'] === 'admin'</code>. الجزء ده — الشرط نفسه — قابل للتنفيذ والاختبار هنا فعليًا.</div>
    <div class="en">🇬🇧 In a real project, it's not enough for the dashboard to show different content — you also need to stop a regular user from reaching the <code>admin.php</code> page itself if they type its URL directly into the browser, even with no link to it in the UI. The decision behind that is simple (the same idea as <code>canDeletePost()</code> from the previous lesson): <code>$currentUser['role'] === 'admin'</code>. That part — the condition itself — is genuinely executable and testable here.</div>
</div>

<pre><code>&lt;?php
function canAccessAdminPage(array $currentUser): bool
{
    return $currentUser['role'] === 'admin';
}

$admin = fetchUser($pdo, 1); // Ahmed Hassan, role=admin
$sara  = fetchUser($pdo, 2); // Sara Ali, role=user

echo "1) Ahmed Hassan (role={$admin['role']}) requests admin.php -&gt; allowed?" . PHP_EOL;
var_dump(canAccessAdminPage($admin));

echo "2) Sara Ali (role={$sara['role']}) requests admin.php -&gt; allowed?" . PHP_EOL;
var_dump(canAccessAdminPage($sara));</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">1) Ahmed Hassan (role=admin) requests admin.php -> allowed?
bool(true)
2) Sara Ali (role=user) requests admin.php -> allowed?
bool(false)</div>

<div class="bi-block">
    <div class="ar">🇪🇬 <b>ملاحظة صريحة:</b> إن <code>canAccessAdminPage()</code> بترجع <code>false</code> هو النص القابل للتنفيذ والاختبار هنا. لكن الخطوة اللي بعدها في مشروع حقيقي — إعادة توجيه Sara فعليًا لصفحة تانية (<code>header('Location: /login.php'); exit;</code>) ومنعها من رؤية أي جزء من <code>admin.php</code> — محتاجة سيرفر HTTP حقيقي بيبعت استجابة Redirect فعلية لمتصفح، وده مش حاجة نقدر نجربها بأمانة عن طريق CLI. الجزء اللي اتنفّذ فعليًا هنا (الشرط نفسه) هو بالظبط الجزء القابل لإعادة الاستخدام في أي مكان تاني محتاج حماية مشابهة.</div>
    <div class="en">🇬🇧 <b>An honest note:</b> that <code>canAccessAdminPage()</code> returns <code>false</code> is the part genuinely executed and tested here. But the next step in a real project — actually redirecting Sara away (<code>header('Location: /login.php'); exit;</code>) and stopping her from ever seeing any part of <code>admin.php</code> — needs a real HTTP server sending an actual redirect response to a browser, which isn't something we can honestly demo via CLI. Expected behavior in a real browser/server (not verifiable via CLI). What genuinely executed here (the condition itself) is exactly the reusable part for anywhere else that needs similar protection.</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="admin">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">حسب <code>dashboardFor()</code>، أنهي استعلام بيتنفذ لو <code>$currentUser['role'] === 'admin'</code>؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Per <code>dashboardFor()</code>, which query runs if <code>$currentUser['role'] === 'admin'</code>?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="admin"> SELECT id, name, email, role FROM users (يشوف كل المستخدمين)</label>
        <label><input type="radio" name="q1" value="posts"> SELECT id, title, views FROM posts WHERE user_id = ?</label>
        <label><input type="radio" name="q1" value="none"> مفيش استعلام، بيرجع مصفوفة فاضية</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="scoped">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">ليه Sara معندهاش طريقة توصل لبوستات مستخدم تاني حتى لو حاولت تغيّر حاجة في الواجهة؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Why can't Sara reach another user's posts even by tampering with the UI?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="scoped"> لإن الاستعلام نفسه محدود بـ WHERE user_id = ? بتاعها هي، مش بس مخفي في الواجهة</label>
        <label><input type="radio" name="q2" value="ui"> لإن الزرار مخفي بس في الواجهة، والاستعلام نفسه بيرجع كل حاجة</label>
        <label><input type="radio" name="q2" value="password"> لإن قاعدة البيانات بتطلب باسورد تاني</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="false">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">حسب الناتج الفعلي، <code>canAccessAdminPage($sara)</code> رجّعت إيه؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Per the actual output, what did <code>canAccessAdminPage($sara)</code> return?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="false"> bool(false)</label>
        <label><input type="radio" name="q3" value="true"> bool(true)</label>
        <label><input type="radio" name="q3" value="null"> NULL</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="cli">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">ليه إعادة توجيه Sara فعليًا لصفحة تانية (Redirect حقيقي) متوضّحش بناتج CLI متنفّذ زي باقي الأمثلة؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Why isn't actually redirecting Sara away (a real redirect) shown with executed CLI output like the other examples?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="cli"> لإنها محتاجة سيرفر HTTP حقيقي وطلب من متصفح فعلي، ومش حاجة CLI تقدر تثبتها بأمانة</label>
        <label><input type="radio" name="q4" value="hard"> لإن header('Location: ...') صعبة الكتابة</label>
        <label><input type="radio" name="q4" value="unneeded"> لإن الحماية دي مش مهمة فعليًا</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ احمِ إجراء "حذف أي مستخدم" / Protect a "Delete Any User" Admin Action</h3>
    <div class="ar">🇪🇬 في <a href="../playground/index.php">محرر الكود</a> (أو المحرر المصغّر فوق): تخيّل إجراء إداري افتراضي "حذف مستخدم" — اكتب دالة <code>canDeleteAnyUser(array $currentUser): bool</code> بنفس نمط <code>canDeletePost()</code> من الدرس السابق (بترجع <code>true</code> لو <code>role === 'admin'</code> بس، من غير أي استثناء ملكية لإن حذف مستخدم مش زي حذف بوستك انت). جرّبها مع Ahmed (admin)، Sara (user)، وLaila (editor) — واطبع النتيجة الحقيقية للتلاتة.</div>
    <div class="en">🇬🇧 In the <a href="../playground/index.php">Playground</a> (or the mini editor above): imagine a hypothetical "delete user" admin action — write a <code>canDeleteAnyUser(array $currentUser): bool</code> function in the same style as <code>canDeletePost()</code> from the previous lesson (returning <code>true</code> only for <code>role === 'admin'</code>, with no ownership exception since deleting a user isn't like deleting your own post). Test it with Ahmed (admin), Sara (user), and Laila (editor) — and print the real result for all three.</div>
</div>

<h2 id="project">🚀 اللي بعد كده / What Comes Next</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 كل المصادقة والتفويض اللي بنيناها في المرحلة دي — تسجيل آمن، Session، أدوار وصلاحيات، ولوحات تحكم مختلفة حسب الدور — كانت كلها جوه صفحات PHP بتطبع HTML مباشرة. الخطوة الطبيعية الجاية هي تبني نفس الأفكار دي جوه <b>REST API</b>: نفس فكرة "مين انت؟" و"مسموحلك تعمل إيه؟"، لكن الرد بيرجع JSON مش صفحة، وطرق التحقق بتختلف شوية (Session كوكيز غالبًا مش كافية لـ API بيتستهلك من تطبيقات موبايل مثلًا). المرحلة الجاية ("بناء REST API") هتبدأ بمبادئ REST الأساسية، وهتوصل لمفاهيم مصادقة الـ API (Session, Token, JWT) اللي بتبني فوق بالظبط نفس أساس Authentication/Authorization اللي اتعلمته هنا.</div>
    <div class="en">🇬🇧 All the authentication and authorization we built in this stage — secure registration, sessions, roles and permissions, and role-based dashboards — lived inside PHP pages printing HTML directly. The natural next step is building the same ideas inside a <b>REST API</b>: the same "who are you?" and "what are you allowed to do?", but the response comes back as JSON instead of a page, and the verification methods differ slightly (session cookies alone usually aren't enough for an API consumed by, say, a mobile app). The next stage ("REST API Development") starts with core REST principles, and works up to API authentication concepts (Session, Token, JWT) that build directly on the exact Authentication/Authorization foundation you learned here.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>نفس الدالة (<code>dashboardFor()</code>) رجّعت استعلامات ونتائج مختلفة تمامًا حسب <code>role</code> المستخدم — قرار واحد بسيط (<code>if</code>) بيحدد كل حاجة.</li>
        <li>التفويض الحقيقي بيتفرض على مستوى الاستعلام (<code>WHERE user_id = ?</code>)، مش بس بإخفاء عناصر في الواجهة.</li>
        <li>حماية صفحة كاملة (زي admin.php) بتبدأ بنفس فكرة فحص الصلاحيات على عنصر واحد: <code>$currentUser['role'] === 'admin'</code>.</li>
        <li>الشرط نفسه قابل للتنفيذ والاختبار بالكامل عن طريق CLI؛ الـ Redirect الفعلي لمتصفح محتاج سيرفر HTTP حقيقي.</li>
        <li>المرحلة الجاية: REST API Development — نفس Authentication/Authorization لكن بردود JSON وطرق مصادقة زي Token وJWT.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="auth-roles-permissions.php">← الدرس السابق / Prev: Roles &amp; Permissions</a>
    <a href="../index.php">الرجوع للدروس / Back to Lessons →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
