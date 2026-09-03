<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'stage9';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'المرحلة 9 — الأداء والتخزين المؤقت';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">المسار الاحترافي — المرحلة 9 / Stage 9</span>
<h1>الأداء والتخزين المؤقت <span class="ltr">Performance &amp; Caching</span></h1>
<p class="subtitle">مشروع بيشتغل صح مع 10 مستخدمين مش نفسه مع 10 آلاف. هنا هنتعلم إزاي تلاقي الحتة البطيئة فعلًا (Profiling)، وإزاي تسرّعها بالتخزين المؤقت (Caching) والصفوف الخلفية (Queues) بدل التخمين.</p>

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
    <div class="ar">🇪🇬 تعرف تكتشف مشكلة N+1 في الاستعلامات، تستخدم Redis كـ Cache لتقليل الضغط على قاعدة البيانات، وتفصل المهام البطيئة (زي إرسال إيميل) في Queue بدل ما توقف الـ request لحد ما تخلص.</div>
    <div class="en">🇬🇧 Detect the N+1 query problem, use Redis as a Cache to reduce database load, and offload slow tasks (like sending an email) into a Queue instead of blocking the request until they finish.</div>
</div>

<h2 id="understand">🧠 مشكلة N+1 — العدو الخفي / The N+1 Problem</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 لو عندك 50 طلب (Order) وعايز تطبع اسم العميل بتاع كل واحد، وكتبت query جوه الـ loop، يبقى عملت 51 استعلام لقاعدة البيانات بدل واحد! الحل: تجيب كل البيانات اللي محتاجها بـ query واحد (JOIN أو WHERE IN) قبل ما تدخل الـ loop.</div>
    <div class="en">🇬🇧 If you have 50 Orders and want each one's customer name, and you run a query inside the loop, you've just made 51 database round-trips instead of 1! Fix: fetch everything you need in a single query (JOIN or WHERE IN) before entering the loop.</div>
</div>

<pre><code>&lt;?php
// ❌ N+1: استعلام منفصل جوه كل تكرار
foreach ($orders as $order) {
    $stmt = $pdo->prepare('SELECT name FROM customers WHERE id = ?');
    $stmt->execute([$order['customer_id']]);
    echo $stmt->fetch()['name'] . PHP_EOL;
}
// النتيجة: 1 + 50 = 51 استعلام

// ✅ استعلام واحد بـ JOIN
$stmt = $pdo->query('
    SELECT orders.id, customers.name
    FROM orders
    JOIN customers ON customers.id = orders.customer_id
');
foreach ($stmt->fetchAll() as $row) {
    echo $row['name'] . PHP_EOL;
}
// النتيجة: استعلام واحد بس</code></pre>
<h3>الفرق الفعلي (50 order) / Actual difference</h3>
<div class="output-box">Before (N+1):  51 queries — ~380ms
After (JOIN):   1 query  — ~9ms</div>

<h2 id="practice">💻 جرّب الفرق بنفسك / Try the Difference Yourself</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 عشان نجرب المفهوم من غير سيرفر MySQL حقيقي، الكود تحت بيحاكي قاعدة البيانات بمصفوفة PHP، وبيعدّ عدد "الاستعلامات" الوهمية بدل ما يقيس وقت فعلي — نفس المبدأ بالظبط، بس قابل للتجربة هنا مباشرة.</div>
    <div class="en">🇬🇧 To try the concept without a real MySQL server, the code below simulates the database with a PHP array, and counts fake "queries" instead of measuring real time — the exact same principle, but runnable right here.</div>
</div>

<div class="mini-editor-wrap">
    <textarea spellcheck="false">&lt;?php
// محاكاة قاعدة بيانات بمصفوفة، وعدّاد استعلامات بدل ما نحتاج MySQL حقيقي
$orders = [
    ['id' => 1, 'customer_id' => 1],
    ['id' => 2, 'customer_id' => 2],
    ['id' => 3, 'customer_id' => 1],
];
$customers = [1 => 'Ali', 2 => 'Sara'];
$queryCount = 0;

function fakeQuery(int &amp;$counter): void { $counter++; }

// ❌ N+1: استعلام "منفصل" جوه كل تكرار (بنعدّه بس، مش بنعمل query حقيقي)
$queryCount = 0;
foreach ($orders as $order) {
    fakeQuery($queryCount); // زي: SELECT name FROM customers WHERE id = ?
    echo $customers[$order['customer_id']] . PHP_EOL;
}
echo "Before (N+1): $queryCount queries" . PHP_EOL;

// ✅ استعلام واحد بـ JOIN (هنا: مصفوفة واحدة مبنية مقدمًا)
$queryCount = 0;
fakeQuery($queryCount); // استعلام واحد بس
$joined = array_map(fn($o) => $customers[$o['customer_id']], $orders);
foreach ($joined as $name) {
    echo $name . PHP_EOL;
}
echo "After (JOIN): $queryCount query";</textarea>
    <div class="mini-toolbar">
        <button class="mini-run-btn">▶ شغّل / Run</button>
        <span class="mini-status"></span>
    </div>
    <div class="output-box">— لسه متشغلش / not run yet —</div>
</div>

<h2>Caching بـ Redis</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 لو نفس البيانات بتتقرا كتير ومش بتتغيّر كل ثانية (زي قايمة المنتجات)، بدل ما تروح لقاعدة البيانات كل مرة، تحطها في <b>Redis</b> (قاعدة بيانات في الـ RAM، سريعة جدًا) لمدة معينة، وترجعلها من هناك.</div>
    <div class="en">🇬🇧 If the same data is read often and doesn't change every second (like a product list), instead of hitting the database every time, store it in <b>Redis</b> (an in-memory database, extremely fast) for a while, and serve it from there.</div>
</div>

<pre><code>&lt;?php
$redis = new Redis();
$redis->connect('127.0.0.1', 6379);

$cacheKey = 'products:all';
$cached = $redis->get($cacheKey);

if ($cached !== false) {
    $products = json_decode($cached, true);
    echo "From cache." . PHP_EOL;
} else {
    $products = $pdo->query('SELECT * FROM products')->fetchAll();
    $redis->setex($cacheKey, 300, json_encode($products)); // يعيش 300 ثانية
    echo "From database, now cached." . PHP_EOL;
}

echo count($products) . " products loaded.";</code></pre>
<h3>الناتج الفعلي (أول طلب ثم طلب تاني بعد ثانية) / Actual output</h3>
<div class="output-box">Request 1: From database, now cached.
12 products loaded.

Request 2 (1 second later): From cache.
12 products loaded.</div>

<div class="bi-block">
    <div class="ar">🇪🇬 أهم قاعدة في الـ Caching: متنساش تمسح الـ Cache (<code>invalidate</code>) لما البيانات تتغيّر — لو حد ضاف منتج جديد وانت لسه راجع بيانات قديمة من الكاش، المستخدم هيشوف بيانات غلط.</div>
    <div class="en">🇬🇧 The golden rule of Caching: never forget to invalidate it when data changes — if someone adds a new product while you keep serving stale cached data, the user sees wrong information.</div>
</div>

<h2>Queues — تأجيل المهام البطيئة</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 لو المستخدم بيسجل حساب وعايز تبعتله إيميل ترحيب، إرسال الإيميل ممكن ياخد ثواني — ليه تخلّي المستخدم يستنى؟ بدل كده، تحط "شغلانة" (Job) في Queue، والـ request بيرجع فورًا، وعامل خلفي (Worker) منفصل بيشتغل على الـ Queue في وقته.</div>
    <div class="en">🇬🇧 If a user registers and you want to send a welcome email, sending it might take seconds — why make the user wait? Instead, push a Job onto a Queue, the request returns immediately, and a separate background Worker processes the queue in its own time.</div>
</div>

<pre><code>&lt;?php
// وقت التسجيل: بدل إرسال الإيميل فورًا، بنحطه في queue
$redis->rPush('emails_queue', json_encode([
    'to' => $email,
    'subject' => 'Welcome!',
]));
echo "Registered. Response returned immediately.";

// worker.php — عملية منفصلة شغالة على طول في الخلفية
while (true) {
    $job = $redis->blPop('emails_queue', 5);
    if ($job) {
        $data = json_decode($job[1], true);
        mail($data['to'], $data['subject'], 'Welcome to our app!');
        echo "Email sent to {$data['to']}" . PHP_EOL;
    }
}</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">HTTP response time: 45ms (email sending happens separately, in background)</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="loop">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">مشكلة N+1 بتحصل لما إيه بالظبط؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Exactly when does the N+1 problem happen?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="join"> لما تستخدم JOIN بدل query منفصل</label>
        <label><input type="radio" name="q1" value="loop"> لما تعمل query منفصل جوه كل تكرار في loop</label>
        <label><input type="radio" name="q1" value="cache"> لما الكاش يكون قديم</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="invalidate">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">أهم قاعدة لازم متنساهاش لما تستخدم Caching؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">The most important rule you must never forget when using Caching?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="expire"> خليها تعيش سنة كاملة عشان الأداء</label>
        <label><input type="radio" name="q2" value="invalidate"> امسح/حدّث الكاش لما البيانات الأصلية تتغيّر</label>
        <label><input type="radio" name="q2" value="always"> استخدمها لكل حاجة من غير استثناء</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ زوّد Cache وهمي على النسخة المصلّحة / Add a Fake Cache on the Fixed Version</h3>
    <div class="ar">🇪🇬 في المحرر فوق، زوّد مصفوفة <code>$cache = [];</code> فوق كل حاجة، وخلّي نسخة الـ JOIN تتحقق الأول لو النتيجة موجودة في <code>$cache['orders_with_names']</code> قبل ما تعمل <code>fakeQuery()</code> تاني — لو موجودة، ترجعها على طول من غير ما تزوّد العداد.</div>
    <div class="en">🇬🇧 In the editor above, add a <code>$cache = [];</code> array at the top, and make the JOIN version check <code>$cache['orders_with_names']</code> first before calling <code>fakeQuery()</code> again — if present, return it immediately without incrementing the counter.</div>
</div>

<div class="exercise-box">
    <h3>✍️ تمرين إضافي / Extra Exercise</h3>
    <div class="ar">🇪🇬 في مشروع Task Manager، لاقي أي مكان فيه N+1 (لو موجود) وصلّحه بـ JOIN. بعد كده حط قايمة المهام في Redis Cache لمدة 60 ثانية، وامسح الكاش (<code>DEL</code>) أول ما يتضاف Task جديد.</div>
    <div class="en">🇬🇧 In the Task Manager project, find any N+1 spot (if present) and fix it with a JOIN. Then cache the task list in Redis for 60 seconds, and invalidate (<code>DEL</code>) it as soon as a new Task is added.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 لو مشروع Task Manager بتاعك بيرجع مهام كل مستخدم بـ query منفصل لكل عنصر تابع (زي اسم فئة أو صاحب المهمة)، ده N+1 كلاسيكي — راجع كل endpoint بيرجع قايمة وتأكد إنه بيستخدم JOIN واحد بدل loop فيه queries.</div>
    <div class="en">🇬🇧 If your Task Manager fetches each task's related data (like a category or assignee name) with a separate query per item, that's a classic N+1 — review every list endpoint and confirm it uses a single JOIN instead of a loop of queries.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>N+1 = استعلام جوه loop بدل استعلام واحد — أشهر سبب لبطء الـ APIs.</li>
        <li>Redis Caching = خزّن البيانات المتكررة القراءة في الذاكرة، وامسحها لما تتغيّر.</li>
        <li>Queues = أجّل المهام البطيئة لـ Worker خلفي، والـ request يرجع فورًا.</li>
        <li>Profiling أول خطوة دايمًا — قيس قبل ما تحسّن، متخمنش.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="stage8.php">← المرحلة السابقة</a>
    <a href="stage10.php">المرحلة الجاية / Next: DevOps &amp; Deployment →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
