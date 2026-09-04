<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'final-assessment';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'التقييم النهائي — Final Backend Developer Assessment';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">Stage 18 · Projects</span>
<h1>🏆 التقييم النهائي لمطور Backend <span class="ltr">🏆 Final Backend Developer Assessment</span></h1>
<p class="subtitle">مش Quiz عادي. 8 محاور منفصلة — كل واحد بيثبت مهارة حقيقية لازم تكون معاك قبل ما تقول إنك جاهز. <span class="ltr">Not a regular quiz — 8 separate dimensions, each proving a real skill you need before calling yourself ready.</span></p>

<div class="step-tracker">
    <a href="#read">📖 Read</a>
    <a href="#php">🐘 PHP</a>
    <a href="#sql">🗄️ SQL</a>
    <a href="#security">🔐 Security</a>
    <a href="#architecture">🏗️ Architecture</a>
    <a href="#api">🌐 API</a>
    <a href="#debugging">🐛 Debugging</a>
    <a href="#project">🚀 Project</a>
</div>

<h2 id="read">📖 إزاي تستخدم التقييم ده / How to Use This Assessment</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 كل محور تحت بيمثّل مهارة أساسية لازم تتقنها كمطور Backend. جاوب على الأسئلة بصدق مع نفسك — الهدف مش إنك "تعدي" الاختبار، الهدف إنك تكتشف فين لسه ضعيف قبل ما تروح لمقابلة شغل حقيقية. لو لقيت نفسك بتغلط في محور معيّن، ارجع للمراحل المرتبطة بيه في المنهج قبل ما تكمل.</div>
    <div class="en">🇬🇧 Each dimension below represents a core skill you need to master as a Backend developer. Answer honestly with yourself — the goal isn't to "pass" the quiz, it's to discover where you're still weak before a real job interview. If you find yourself getting a dimension wrong, go back to its related stages in the curriculum before moving on.</div>
</div>

<h2 id="php">🐘 1) PHP — كتابة كود صحيح / Writing Correct Code</h2>
<div class="quiz-box" data-correct="typeerror">
    <h3>سؤال 1.1</h3>
    <p class="quiz-question">مع <code>declare(strict_types=1)</code>، إيه اللي بيحصل لو ناديت <code>function total(int $qty, float $price): float</code> بـ <code>total("3", "9.99")</code>؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">With <code>declare(strict_types=1)</code>, what happens calling <code>total(int $qty, float $price): float</code> with <code>total("3", "9.99")</code>?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="qphp1" value="works"> بتشتغل عادي، PHP بتحوّل النوع أوتوماتيك</label>
        <label><input type="radio" name="qphp1" value="typeerror"> بترمي TypeError فورًا</label>
        <label><input type="radio" name="qphp1" value="returns0"> بترجع 0 من غير خطأ</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>
<div class="quiz-box" data-correct="reference">
    <h3>سؤال 1.2</h3>
    <p class="quiz-question">دالة `function addItem(array &amp;$cart, string $item)` بتستخدم `&amp;` قبل `$cart` — ده معناه إيه؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">A function using `&amp;` before `$cart` — what does that mean?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="qphp2" value="reference"> أي تعديل جوه الدالة بيأثر على المتغير الأصلي بره</label>
        <label><input type="radio" name="qphp2" value="copy"> بتاخد نسخة منفصلة تمامًا، والأصلي مايتأثرش</label>
        <label><input type="radio" name="qphp2" value="constant"> بتمنع أي تعديل على المصفوفة خالص</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="sql">🗄️ 2) SQL — تصميم استعلام / Designing a Query</h2>
<div class="quiz-box" data-correct="leftjoin">
    <h3>سؤال 2.1</h3>
    <p class="quiz-question">عايز تجيب كل المستخدمين حتى اللي معندهمش بوستات خالص (بوستاتهم تبقى NULL في النتيجة) — أنهي JOIN؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">You want every user, including ones with zero posts (their post columns should be NULL) — which JOIN?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="qsql1" value="inner"> INNER JOIN</label>
        <label><input type="radio" name="qsql1" value="leftjoin"> LEFT JOIN (users LEFT JOIN posts)</label>
        <label><input type="radio" name="qsql1" value="none"> مش ممكن بـ SQL عادي</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>
<div class="quiz-box" data-correct="having">
    <h3>سؤال 2.2</h3>
    <p class="quiz-question">عايز بس المستخدمين اللي عندهم أكتر من 3 بوستات — بعد `GROUP BY user_id`، تستخدم إيه للفلترة؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Only users with more than 3 posts, after `GROUP BY user_id` — what do you filter with?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="qsql2" value="where"> WHERE COUNT(*) > 3</label>
        <label><input type="radio" name="qsql2" value="having"> HAVING COUNT(*) > 3</label>
        <label><input type="radio" name="qsql2" value="orderby"> ORDER BY COUNT(*) > 3</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="database">🗂️ 3) Database — تصميم Schema / Schema Design</h2>
<div class="quiz-box" data-correct="junction">
    <h3>سؤال 3.1</h3>
    <p class="quiz-question">علاقة Many-to-Many بين Students وCourses (كل طالب في كذا كورس، كل كورس فيه كذا طالب) بتتصمم إزاي؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">How do you design a Many-to-Many relationship between Students and Courses?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="qdb1" value="fk"> عمود course_id واحد في جدول students</label>
        <label><input type="radio" name="qdb1" value="junction"> جدول وسيط (Junction Table) فيه student_id و course_id</label>
        <label><input type="radio" name="qdb1" value="json"> تخزين قايمة الكورسات كـ JSON في عمود واحد</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>
<div class="quiz-box" data-correct="denormalized">
    <h3>سؤال 3.2</h3>
    <p class="quiz-question">جدول <code>orders</code> فيه عمود <code>customer_name</code> و<code>customer_email</code> مكرر في كل صف بدل ما يرتبط بجدول <code>customers</code> — ده مثال على إيه؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">An orders table repeating customer_name/customer_email in every row instead of linking to a customers table — an example of what?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="qdb2" value="denormalized"> تصميم غير مُطبّع (Denormalized) — لازم يتصلح</label>
        <label><input type="radio" name="qdb2" value="fine"> تصميم سليم ومفيش مشكلة فيه</label>
        <label><input type="radio" name="qdb2" value="index"> ده اسمه Indexing مش له علاقة بالتطبيع</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="security">🔐 4) Security — اكتشاف الثغرة / Spotting a Vulnerability</h2>
<div class="security-box">
    <h3>🔍 دوّر على المشكلة / Find the Problem</h3>
    <pre><code>&lt;?php
$comment = $_POST['comment'];
$stmt = $pdo-&gt;prepare("INSERT INTO comments (body) VALUES ('$comment')");
$stmt-&gt;execute();
echo "Comment saved: " . $comment;</code></pre>
</div>
<div class="quiz-box" data-correct="two">
    <h3>سؤال 4.1</h3>
    <p class="quiz-question">الكود فوق فيه كام ثغرة أمنية مختلفة؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">How many distinct security vulnerabilities does the code above have?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="qsec1" value="zero"> صفر — الكود آمن لإنه بيستخدم prepare()</label>
        <label><input type="radio" name="qsec1" value="two"> اتنين: SQL Injection (الـ $comment لسه متلزّق جوه SQL رغم prepare) وXSS (الـ echo من غير htmlspecialchars)</label>
        <label><input type="radio" name="qsec1" value="one"> واحدة بس: XSS</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>
<div class="quiz-box" data-correct="regenerate">
    <h3>سؤال 4.2</h3>
    <p class="quiz-question">إيه اللي بيمنع هجوم Session Fixation بعد تسجيل الدخول؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What prevents a Session Fixation attack after login?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="qsec2" value="regenerate"> session_regenerate_id(true) فورًا بعد نجاح تسجيل الدخول</label>
        <label><input type="radio" name="qsec2" value="hash"> تشفير الباسورد بـ password_hash()</label>
        <label><input type="radio" name="qsec2" value="cookie"> حذف كل الكوكيز عند الدخول</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="architecture">🏗️ 5) Architecture — اختيار البنية المناسبة / Choosing the Right Architecture</h2>
<div class="quiz-box" data-correct="repository">
    <h3>سؤال 5.1</h3>
    <p class="quiz-question">عايز تسهّل استبدال SQLite بـ MySQL من غير ما تلمس منطق الـ Business Logic — أنهي Pattern يساعدك؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">You want to swap SQLite for MySQL without touching business logic — which pattern helps?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="qarch1" value="repository"> Repository Pattern — الـ Service بيتكلم مع Repository مش مع PDO مباشرة</label>
        <label><input type="radio" name="qarch1" value="global"> متغيرات Global للاتصال بقاعدة البيانات</label>
        <label><input type="radio" name="qarch1" value="hardcode"> تكتب اسم قاعدة البيانات جوه كل query</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>
<div class="quiz-box" data-correct="controller">
    <h3>سؤال 5.2</h3>
    <p class="quiz-question">جوه بنية MVC، فين المفروض تحط منطق "لو المستخدم مش Admin، ارجع 403"؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">In MVC, where should "if not admin, return 403" logic live?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="qarch2" value="controller"> Controller (أو Middleware) — قبل ما توصل للـ Model خالص</label>
        <label><input type="radio" name="qarch2" value="view"> View — تتحقق وانت بتطبع الـ HTML</label>
        <label><input type="radio" name="qarch2" value="model"> Model — جوه استعلام قاعدة البيانات نفسه</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="api">🌐 6) API — تصميم Endpoint / Designing an Endpoint</h2>
<div class="api-lab">
    <h3>🌐 صمّم / Design It</h3>
    <p>عايز API لإلغاء طلب (Order) موجود. صمّم الـ Endpoint (الفعل + المسار) والـ Status Code المتوقع في حالتين: الإلغاء نجح، والطلب مش موجود أصلًا.</p>
    <p class="ltr" style="color:var(--muted)">Design an API endpoint to cancel an existing order. Specify the verb + path, and the expected status code for: cancellation succeeds, and the order doesn't exist.</p>
</div>
<div class="quiz-box" data-correct="patch">
    <h3>سؤال 6.1</h3>
    <p class="quiz-question">أنهي فعل الأنسب لإلغاء أوردر (تغيير حالته لـ "cancelled")، مش حذفه بالكامل؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Which verb best fits canceling an order (changing its status), not deleting it entirely?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="qapi1" value="delete"> DELETE — لازم تمسحه بالكامل من القاعدة</label>
        <label><input type="radio" name="qapi1" value="patch"> PATCH /orders/{id} بـ {"status": "cancelled"}</label>
        <label><input type="radio" name="qapi1" value="get"> GET /orders/{id}/cancel</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>
<div class="quiz-box" data-correct="404">
    <h3>سؤال 6.2</h3>
    <p class="quiz-question">لو طلبت إلغاء أوردر رقم 9999 ومش موجود أصلًا، الـ API المفروض يرجّع أنهي Status Code؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Requesting to cancel order #9999 which doesn't exist — what status code should the API return?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="qapi2" value="200"> 200 مع {"cancelled": false}</label>
        <label><input type="radio" name="qapi2" value="404"> 404 Not Found</label>
        <label><input type="radio" name="qapi2" value="500"> 500 Internal Server Error</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="debugging">🐛 7) Debugging — إصلاح خطأ حقيقي / Fixing a Real Bug</h2>
<div class="debug-lab">
    <h3>🐞 دوّر على المشكلة / Find the Bug</h3>
    <pre class="bug-code"><code>&lt;?php
function applyDiscount(array $prices, float $percent): array
{
    foreach ($prices as $price) {
        $price = $price - ($price * $percent / 100);
    }
    return $prices;
}

print_r(applyDiscount([100, 200, 50], 10));</code></pre>
    <p>الكود ده المفروض يرجّع كل الأسعار بعد خصم 10% — لكنه بيرجّع الأسعار الأصلية زي ما هي من غير أي تغيير. ليه؟</p>
    <p class="ltr" style="color:var(--muted)">This should return all prices after a 10% discount — but it returns the original prices unchanged. Why?</p>
</div>
<div class="quiz-box" data-correct="byvalue">
    <h3>سؤال 7.1</h3>
    <p class="quiz-question">إيه سبب الباگ ده؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What causes this bug?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="qdbg1" value="byvalue"> foreach ($prices as $price) بتاخد نسخة (By Value)، فالتعديل جوه الحلقة مابيأثرش على المصفوفة الأصلية</label>
        <label><input type="radio" name="qdbg1" value="syntax"> فيه خطأ Syntax في الكود</label>
        <label><input type="radio" name="qdbg1" value="type"> percent لازم تبقى int مش float</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>
<div class="quiz-box" data-correct="reference">
    <h3>سؤال 7.2</h3>
    <p class="quiz-question">أنهي إصلاح صح للباگ ده؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Which is a correct fix?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="qdbg2" value="reference"> foreach ($prices as &amp;$price) — تعديل بالمرجع (By Reference)</label>
        <label><input type="radio" name="qdbg2" value="rename"> تغيير اسم المتغير $price لاسم تاني بس</label>
        <label><input type="radio" name="qdbg2" value="static"> إضافة static قبل $price</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="project">🚀 8) Project — بناء ميزة كاملة / Building a Complete Feature</h2>
<div class="challenge-box">
    <h3>🎓 المهمة الختامية / The Final Task</h3>
    <div class="ar">🇪🇬 بناءً على كل حاجة اتعلمتها في المسار، ابني Endpoint واحد جديد بالكامل: <code>POST /api/products/{id}/reviews</code> — يضيف تقييم (نجوم من 1-5 + تعليق نصي) لمنتج معيّن. لازم يغطي: Validation (النجوم بين 1-5، التعليق مش فاضي)، ربط بالمستخدم المسجل دخوله (من الجلسة)، حفظ حقيقي بـ Prepared Statement، ورد JSON بـ Status Code مناسب (201 لو نجح، 422 لو فشل التحقق، 404 لو المنتج مش موجود). ده تطبيق مباشر لمحاور PHP وSQL وSecurity وArchitecture وAPI وValidation كلها مع بعض في ميزة واحدة حقيقية.</div>
    <div class="en">🇬🇧 Building on everything from this track, build one complete new endpoint from scratch: <code>POST /api/products/{id}/reviews</code> — adds a review (1-5 stars + a text comment) to a product. It must cover: validation (stars between 1-5, comment not empty), linking to the logged-in user (from the session), real persistence via a prepared statement, and a JSON response with the right status code (201 on success, 422 on validation failure, 404 if the product doesn't exist). This is a direct application of PHP, SQL, Security, Architecture, API, and Validation — all at once, in one real feature.</div>
</div>

<div class="recap-box">
    <h3>🏁 نتيجتك / Your Result</h3>
    <div class="ar">🇪🇬 لو جاوبت صح على أغلب الأسئلة فوق وقدرت تبني الميزة الختامية، يبقى فعلًا وصلت لمستوى Junior/Mid-level Backend Developer. لو لقيت نفسك بتغلط في محور معيّن، ارجع للمراحل المرتبطة بيه (PHP: مرحلة 2-3، SQL: مرحلة 7، Security: مرحلة 14، Architecture: مرحلة 11-12، API: مرحلة 13، Debugging: معمل التصحيح) قبل ما تعتبر نفسك جاهز فعلًا.</div>
    <div class="en">🇬🇧 If you answered most questions correctly and could build the final feature, you've genuinely reached a Junior/Mid-level Backend Developer level. If you found yourself struggling on a dimension, revisit its related stages (PHP: Stages 2-3, SQL: Stage 7, Security: Stage 14, Architecture: Stages 11-12, API: Stage 13, Debugging: the Debugging Lab) before considering yourself truly ready.</div>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ التقييم مكتمل / Assessment Completed' : '✓ Complete Assessment' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="capstone.php">← Capstone Project</a>
    <a href="stage7.php">المسار الاحترافي / Next: Design Patterns →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
