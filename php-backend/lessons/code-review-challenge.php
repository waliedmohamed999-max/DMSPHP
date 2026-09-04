<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'code-review-challenge';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'تحدي مراجعة الكود — Code Review Challenge';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">Stage 15 · Testing, Debugging & Performance</span>
<h1>🔍 تحدي مراجعة الكود <span class="ltr">🔍 Code Review Challenge</span></h1>
<p class="subtitle">تطبيق PHP حقيقي فيه مشاكل أمان، بنية، أداء، وجودة كود — دورك تلاقيها كلها زي أي Code Reviewer محترف. <span class="ltr">A real PHP application with security, architecture, performance, and code-quality problems — find them all like a professional reviewer.</span></p>

<div class="step-tracker">
    <a href="#read">📖 Read</a>
    <a href="#understand">🔍 Review</a>
    <a href="#quiz">🧠 Quiz</a>
    <a href="#challenge">🛠️ Challenge</a>
    <a href="#project">🚀 Project</a>
</div>

<h2 id="read">📖 الهدف / Goal</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 في شغل حقيقي، مش هتكتب كود جديد بس — هتراجع كود زمايلك (Pull Requests) باستمرار. المهارة دي مختلفة عن الكتابة: لازم تشوف كود شغّال ظاهريًا وتلاقي فيه مشاكل مش واضحة من أول نظرة. الدرس ده بيديك تطبيق PHP كامل (نظام تعليقات بسيط) وعايزينك تلاقي 4 أنواع مشاكل فيه: أمان، بنية، أداء، وجودة كود.</div>
    <div class="en">🇬🇧 In real work, you won't just write new code — you'll constantly review your teammates' code (Pull Requests). That's a different skill from writing: you must look at code that appears to work and spot problems that aren't obvious at first glance. This lesson gives you a complete PHP application (a simple comments system) and asks you to find 4 categories of problems in it: security, architecture, performance, and code quality.</div>
</div>

<h2 id="understand">🔍 التطبيق تحت المراجعة / The Application Under Review</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 التطبيق ده "بيشتغل" ظاهريًا — هيعرض تعليقات ويقبل تعليق جديد. اقراه بعناية قبل ما تشوف قائمة المشاكل تحت.</div>
    <div class="en">🇬🇧 This application "works" on the surface — it displays comments and accepts a new one. Read it carefully before looking at the problem list below.</div>
</div>

<pre><code>&lt;?php
// comments_page.php
$conn = mysqli_connect("localhost", "root", "", "blog_db");

function getComments($postId) {
    global $conn;
    $query = "SELECT * FROM comments WHERE post_id = " . $_GET['post_id'];
    $result = mysqli_query($conn, $query);
    $comments = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $comments[] = $row;
    }
    return $comments;
}

function displayComments($postId) {
    $comments = getComments($postId);
    foreach ($comments as $c) {
        echo "&lt;div class='comment'&gt;";
        echo "&lt;b&gt;" . $c['author'] . "&lt;/b&gt;: " . $c['body'];
        echo "&lt;/div&gt;";

        $u = mysqli_query($GLOBALS['conn'], "SELECT * FROM users WHERE id=" . $c['user_id']);
        $userData = mysqli_fetch_assoc($u);
        echo "&lt;span&gt;Posted by: " . $userData['name'] . "&lt;/span&gt;";
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $author = $_POST['author'];
    $body = $_POST['body'];
    $postId = $_POST['post_id'];
    mysqli_query($conn, "INSERT INTO comments (post_id, author, body) VALUES ($postId, '$author', '$body')");
    echo "Comment added!";
}

displayComments($_GET['post_id']);</code></pre>

<div class="security-box">
    <h3>🔐 مشاكل الأمان (دوّر عليها بنفسك الأول) / Security Problems (find them yourself first)</h3>
    <div class="ar">🇪🇬 فكّر: إيه اللي ممكن يحصل لو حد كتب في الرابط <code>?post_id=1 OR 1=1</code>؟ إيه اللي ممكن يحصل لو <code>$_POST['body']</code> فيه <code>&lt;script&gt;</code>؟ إيه اللي بيتطبع من غير أي <code>htmlspecialchars()</code>؟</div>
    <div class="en">🇬🇧 Think: what could happen if someone put <code>?post_id=1 OR 1=1</code> in the URL? What if <code>$_POST['body']</code> contains <code>&lt;script&gt;</code>? What's printed with no <code>htmlspecialchars()</code> at all?</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك — لاقيت المشاكل؟ / Test Your Understanding — Did You Find Them?</h2>
<div class="quiz-box" data-correct="sqli">
    <h3>سؤال 1 / Question 1 — Security</h3>
    <p class="quiz-question">في <code>getComments()</code>، <code>$_GET['post_id']</code> بيتلزّق مباشرة جوه SQL string. لو حد كتب <code>?post_id=1 OR 1=1</code>، إيه اللي هيحصل؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">In <code>getComments()</code>, <code>$_GET['post_id']</code> is concatenated directly into the SQL string. If someone visits with <code>?post_id=1 OR 1=1</code>, what happens?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="nothing"> مفيش أي تأثير، MySQL بترفضها أوتوماتيك</label>
        <label><input type="radio" name="q1" value="sqli"> SQL Injection — الاستعلام هيرجّع كل التعليقات في الجدول كله، مش بس بوست واحد</label>
        <label><input type="radio" name="q1" value="error"> خطأ Fatal يوقف السيرفر كله</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>
<div class="quiz-box" data-correct="xss">
    <h3>سؤال 2 / Question 2 — Security</h3>
    <p class="quiz-question">في <code>displayComments()</code>، السطر <code>echo "&lt;b&gt;" . $c['author'] . "&lt;/b&gt;: " . $c['body'];</code> فيه إيه؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What's wrong with printing <code>$c['author']</code>/<code>$c['body']</code> raw like this?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="xss"> XSS — لو المحتوى فيه &lt;script&gt;، هيتنفّذ في متصفح أي حد بيشوف الصفحة</label>
        <label><input type="radio" name="q2" value="fine"> مفيش مشكلة، النص بيتطبع عادي بس</label>
        <label><input type="radio" name="q2" value="slow"> بس بطيء، مفيش مشكلة أمان</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>
<div class="quiz-box" data-correct="nplus1">
    <h3>سؤال 3 / Question 3 — Performance</h3>
    <p class="quiz-question">جوه الـ <code>foreach</code>، فيه استعلام <code>SELECT * FROM users WHERE id=...</code> بينفّذ لكل تعليق لوحده. المشكلة دي اسمها إيه، ولو فيه 100 تعليق هيحصل كام استعلام؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">A query running once per comment inside the loop — what's this problem called, and with 100 comments, how many queries run?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="nplus1"> مشكلة N+1 — 101 استعلام (1 للتعليقات + 100 للمستخدمين) بدل JOIN واحد</label>
        <label><input type="radio" name="q3" value="fine2"> ده الأداء الطبيعي، مفيش مشكلة</label>
        <label><input type="radio" name="q3" value="onlyone"> استعلام واحد بس بيتنفّذ في كل الحالات</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>
<div class="quiz-box" data-correct="global">
    <h3>سؤال 4 / Question 4 — Architecture &amp; Code Quality</h3>
    <p class="quiz-question">استخدام <code>global $conn;</code> و<code>$GLOBALS['conn']</code> جوه الدوال، بدل تمرير الاتصال كـ Parameter، مشكلته إيه؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What's wrong with <code>global $conn;</code>/<code>$GLOBALS['conn']</code> inside functions instead of passing it as a parameter?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="global"> بيخلي الدالة صعبة الاختبار والفهم — اعتمادية مخفية على متغير خارجي مش واضحة من التوقيع</label>
        <label><input type="radio" name="q4" value="fast"> بيخلي الكود أسرع بشكل ملحوظ</label>
        <label><input type="radio" name="q4" value="required"> ده الشكل الوحيد الصحيح للاتصال بقاعدة البيانات في PHP</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge — اكتب المراجعة الكاملة / Write the Full Review</h2>
<div class="challenge-box">
    <h3>🎓 المهمة / The Task</h3>
    <div class="ar">🇪🇬 اكتب مراجعة كود كاملة (زي تعليق Pull Request حقيقي) لكل المشاكل اللي لقيتها في التطبيق فوق، مقسّمة لـ4 أقسام: 🔐 Security، 🏗️ Architecture، ⚡ Performance، 🧹 Code Quality. لكل مشكلة: اذكر السطر، اشرح المخاطرة، واقترح الحل (استخدم PDO + Prepared Statements، <code>htmlspecialchars()</code>، JOIN بدل N+1، Dependency Injection بدل global). بعد كده، اكتب نسخة مُصلَّحة من <code>getComments()</code> فقط باستخدام PDO الحقيقي ضد <code>db-sandbox/schema.php</code> وشغّلها في المحرر تحت.</div>
    <div class="en">🇬🇧 Write a complete code review (like a real Pull Request comment) for every problem you found above, split into 4 sections: 🔐 Security, 🏗️ Architecture, ⚡ Performance, 🧹 Code Quality. For each: cite the line, explain the risk, and suggest the fix (PDO + Prepared Statements, <code>htmlspecialchars()</code>, a JOIN instead of N+1, dependency injection instead of global). Then write a fixed version of just <code>getComments()</code> using real PDO against <code>db-sandbox/schema.php</code> and run it in the editor below.</div>
</div>

<div class="mini-editor-wrap">
    <textarea spellcheck="false">&lt;?php
require __DIR__ . '/../db-sandbox/schema.php';
$pdo = build_sandbox_pdo();

// نسخة مُصلَّحة: Prepared Statement بدل تلزيق المتغير، وJOIN بدل استعلام في اللوب
function getPostsWithAuthor(PDO $pdo, int $postId): array
{
    $stmt = $pdo->prepare(
        'SELECT posts.title, users.name AS author
         FROM posts
         JOIN users ON posts.user_id = users.id
         WHERE posts.id = ?'
    );
    $stmt->execute([$postId]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$rows = getPostsWithAuthor($pdo, 3);
foreach ($rows as $row) {
    echo htmlspecialchars($row['title']) . " by " . htmlspecialchars($row['author']) . PHP_EOL;
}

// جرّب نفس الفكرة مع دخل خبيث زي "3 OR 1=1" وشوف إنه بيتعامل كنص عادي مش شرط SQL
</textarea>
    <div class="mini-toolbar">
        <button class="mini-run-btn">▶ شغّل / Run</button>
        <span class="mini-status"></span>
    </div>
    <div class="output-box">— لسه متشغلش / not run yet —</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 كل مشكلة لقيتها هنا موجودة فعليًا في مشاريع حقيقية كل يوم — SQL Injection زي معمل الأمان اللي عملته، N+1 زي اللي هتقابله في أي API بيرجّع قوايم، وglobal state زي اللي اتعلمت تتجنبه في درس Dependency Injection. لما تراجع أي Pull Request بعد كده، دوّر على نفس الأنماط دي.</div>
    <div class="en">🇬🇧 Every problem you found here shows up in real projects every day — SQL Injection like the security lab you did, N+1 like you'll meet in any list-returning API, and global state like you learned to avoid in the Dependency Injection lesson. When you review any Pull Request going forward, look for exactly these patterns.</div>
</div>

<div class="bi-block">
    <div class="ar">🇪🇬 💡 كتابة تعليق مراجعة كود واضح ومهذب بالإنجليزي مهارة لوحدها — لو عايز تحسّن إنجليزيتك التقنية في السياق ده بالظبط (تعليقات Code Review، وصف Pull Request، رسائل Slack)، شوف درس <a href="../../english/lessons/code-review-english.php">الإنجليزية في مراجعة الكود</a> في مسار اللغة الإنجليزية.</div>
    <div class="en">🇬🇧 💡 Writing a clear, polite code review comment in English is its own skill — if you want to sharpen your technical English in exactly this context (code review comments, PR descriptions, Slack messages), see <a href="../../english/lessons/code-review-english.php">English for Code Reviews &amp; Technical Communication</a> in the English Language track.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>مراجعة الكود مهارة منفصلة عن كتابته — دوّر على مشاكل مش ظاهرة من أول نظرة.</li>
        <li>SQL Injection: أي متغير متلزّق جوه SQL string من غير Prepared Statement.</li>
        <li>XSS: أي output من غير <code>htmlspecialchars()</code>.</li>
        <li>N+1: استعلام جوه Loop بدل JOIN واحد.</li>
        <li>global/$GLOBALS: اعتمادية مخفية بدل Dependency Injection واضحة.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="debugging-lab.php">← المرحلة السابقة</a>
    <a href="project1-cli-calculator.php">المرحلة الجاية / Next: مشروع 1 →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
