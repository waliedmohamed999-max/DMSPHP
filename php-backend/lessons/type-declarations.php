<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'type-declarations';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'PHP متوسط — Type Declarations: Nullable و Union Types';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">Stage 3 · PHP Intermediate</span>
<h1>Type Declarations: Nullable و Union Types <span class="ltr">Type Declarations: Nullable &amp; Union Types</span></h1>
<p class="subtitle">?string, int|string, وليه التصريح بالأنواع بيمنع فئة كاملة من الأخطاء بدري. <span class="ltr">?string, int|string, and why type declarations catch a whole class of bugs early.</span></p>

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
    <div class="ar">🇪🇬 شفت في المرحلة الأولى إن الدالة تقدر تحدد نوع الباراميتر والـ Return (زي <code>string</code>, <code>int</code>). دلوقتي هتتعلم حالتين أدق: <code>?string</code> (Nullable — النوع ده أو <code>null</code>)، و<code>int|string</code> (Union — أكتر من نوع مسموح). وهتشوف بعينك إيه اللي بيحصل فعليًا لما تخالف النوع المحدد — <code>TypeError</code> حقيقي، مش مجرد تحذير.</div>
    <div class="en">🇬🇧 In Stage 1 you saw a function can declare a parameter and return type (like <code>string</code>, <code>int</code>). Now you'll learn two more precise cases: <code>?string</code> (nullable — this type, or <code>null</code>), and <code>int|string</code> (union — more than one allowed type). And you'll see with your own eyes what actually happens when you violate the declared type — a real <code>TypeError</code>, not just a warning.</div>
</div>

<h2 id="understand">🧠 1) Nullable Types — ?string / The Nullable Type</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <code>?string $name</code> معناها "الباراميتر ده لازم يبقى <code>string</code>، أو ممكن يبقى <code>null</code>" — مفيش نوع تالت مسموح. نفس الفكرة على الـ Return Type: <code>function findUser(int $id): ?array</code> معناها الدالة أما هترجع <code>array</code> فعلي، أو <code>null</code> بالظبط لو المستخدم مش موجود. ده أفضل بكتير من إرجاع مصفوفة فاضية <code>[]</code> — لأن <code>[]</code> ممكن يبقى معناها الحقيقي "مستخدم موجود بس بياناته فاضية"، بينما <code>null</code> واضح إنه "مفيش مستخدم أصلًا".</div>
    <div class="en">🇬🇧 <code>?string $name</code> means "this parameter must be a <code>string</code>, or it can be <code>null</code>" — no third type allowed. Same idea on a return type: <code>function findUser(int $id): ?array</code> means the function either returns a real <code>array</code>, or exactly <code>null</code> if the user doesn't exist. That's much better than returning an empty array <code>[]</code> — because <code>[]</code> could legitimately mean "user exists but has empty data", while <code>null</code> unambiguously means "no such user at all".</div>
</div>

<pre><code>&lt;?php
function findUser(int $id): ?array
{
    $users = [
        1 => ['id' => 1, 'name' => 'Ahmed'],
        2 => ['id' => 2, 'name' => 'Sara'],
    ];
    return $users[$id] ?? null;
}

$user = findUser(1);
echo "User 1: " . ($user['name'] ?? 'not found') . PHP_EOL;

$missing = findUser(99);
var_dump($missing);
echo "User 99: " . ($missing['name'] ?? 'not found') . PHP_EOL;

function formatUserName(?string $name): string
{
    return $name === null ? 'Guest' : ucfirst($name);
}
echo formatUserName('waleed') . PHP_EOL;
echo formatUserName(null) . PHP_EOL;</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">User 1: Ahmed
NULL
User 99: not found
Waleed
Guest</div>

<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ إن الكود اللي بينادي <code>findUser</code> مضطر يتعامل مع احتمال إن الناتج <code>null</code> (زي استخدام <code>??</code> فوق) — ده بالظبط الفايدة: التصريح <code>?array</code> بيجبر أي حد يستخدم الدالة إنه يفكّر في حالة "المستخدم مش موجود" بدل ما ينساها ويطلعله خطأ وقت التشغيل.</div>
    <div class="en">🇬🇧 Notice the calling code is forced to handle the possibility of a <code>null</code> result (like the <code>??</code> above) — that's exactly the benefit: declaring <code>?array</code> forces anyone using the function to consider the "user not found" case instead of forgetting it and getting a runtime error later.</div>
</div>

<h2>2) Union Types — int|string / The Union Type</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 أحيانًا باراميتر منطقيًا ممكن يوصل بأكتر من شكل صحيح — زي ID ممكن يبقى رقم صحيح جاي من قاعدة بيانات، أو نص جاي من URL. <code>int|string $id</code> بتصرّح بالاحتمالين الاثنين بوضوح، بدل ما تسيب النوع عام (<code>mixed</code>) وتفقد أي حماية، أو تحدد نوع واحد بس وترفض حالة صحيحة فعلًا.</div>
    <div class="en">🇬🇧 Sometimes a parameter can legitimately arrive in more than one valid shape — like an ID that might be an integer from a database, or a string from a URL. <code>int|string $id</code> explicitly declares both possibilities, instead of leaving the type wide open (<code>mixed</code>) and losing all protection, or picking just one type and rejecting a genuinely valid case.</div>
</div>

<pre><code>&lt;?php
function normalizeId(int|string $id): string
{
    return 'ID-' . trim((string) $id);
}

echo normalizeId(42) . PHP_EOL;
echo normalizeId('  7 ') . PHP_EOL;
echo normalizeId('ABC-99') . PHP_EOL;

function priceOf(int|float $amount): string
{
    return sprintf('$%.2f', $amount);
}
echo priceOf(20) . PHP_EOL;
echo priceOf(19.5) . PHP_EOL;</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">ID-42
ID-7
ID-ABC-99
$20.00
$19.50</div>

<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ إن <code>int|string</code> لسه بترفض أي نوع تالت — لو حاولت تمرر <code>array</code> أو <code>bool</code>، هياخد <code>TypeError</code> زي الظبط اللي هنشوفه دلوقتي. الفرق عن <code>mixed</code> إن <code>mixed</code> بتقبل أي حاجة من غير أي حماية خالص.</div>
    <div class="en">🇬🇧 Notice <code>int|string</code> still rejects any third type — passing an <code>array</code> or <code>bool</code> would raise a <code>TypeError</code>, exactly like what you'll see next. The difference from <code>mixed</code> is that <code>mixed</code> accepts absolutely anything with zero protection.</div>
</div>

<h2 id="practice">💻 3) مخالفة النوع فعليًا — TypeError حقيقي / Actually Violating a Type — a Real TypeError</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 من غير <code>declare(strict_types=1)</code>، PHP بتحاول تحوّل النوع تلقائيًا (زي <code>"3"</code> لـ <code>3</code>) قبل ما تشتكي — ده "Weak Typing". مع <code>declare(strict_types=1)</code> في أول الملف، PHP بترفض أي نوع مش مطابق تمامًا وترمي <code>TypeError</code> فورًا — ده اللي بيخلّي الأخطاء تظهر بدري وواضحة، بدل ما تتحول لقيمة غلط تسيح جوه الكود من غير حد يلاحظ.</div>
    <div class="en">🇬🇧 Without <code>declare(strict_types=1)</code>, PHP tries to auto-convert the type (like <code>"3"</code> into <code>3</code>) before complaining — that's "weak typing". With <code>declare(strict_types=1)</code> at the top of the file, PHP rejects anything that doesn't exactly match the declared type and throws a <code>TypeError</code> immediately — this is what surfaces mistakes early and loudly, instead of a wrong value silently leaking through the code unnoticed.</div>
</div>

<pre><code>&lt;?php
declare(strict_types=1);

function calculateTotal(int $quantity, float $unitPrice): float
{
    return $quantity * $unitPrice;
}

echo "Correct call: " . calculateTotal(3, 9.99) . PHP_EOL;

try {
    $result = calculateTotal("3", 9.99);
    echo "Never reached: $result" . PHP_EOL;
} catch (TypeError $e) {
    echo "Caught TypeError: " . $e->getMessage() . PHP_EOL;
}</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">Correct call: 29.97
Caught TypeError: calculateTotal(): Argument #1 ($quantity) must be of type int, string given, called in E:\xampp\htdocs\PHP LEARN\php-backend\sandbox\ex10_typeerror.php on line 12</div>

<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ إننا استخدمنا <code>try/catch</code> عشان نمسك الـ <code>TypeError</code> ده — لو ما مسكناهوش، الاسكريبت كان هيتوقف تمامًا (Fatal Error) عند السطر ده. الرسالة نفسها بتقولك بالظبط الباراميتر رقم كام، اسمه، النوع المتوقع، والنوع اللي فعلًا اتبعت — معلومة كافية تصلّح بيها الخطأ من غير تخمين.</div>
    <div class="en">🇬🇧 Notice we used <code>try/catch</code> to catch this <code>TypeError</code> — without it, the script would have stopped completely (a fatal error) right at that line. The message itself tells you exactly which argument, its name, the expected type, and the type that was actually passed — enough information to fix the mistake without guessing.</div>
</div>

<div class="bi-block">
    <div class="ar">🇪🇬 جرّب الكود ده بنفسك في المحرر تحت — شيل <code>declare(strict_types=1)</code> وشوف إيه اللي بيحصل بدل الـ TypeError (PHP هتحوّل <code>"3"</code> لـ <code>3</code> بهدوء)، أو جرّب باراميتر نوعه غلط تمامًا زي <code>true</code>.</div>
    <div class="en">🇬🇧 Try this code yourself in the editor below — remove <code>declare(strict_types=1)</code> and see what happens instead of the TypeError (PHP will quietly coerce <code>"3"</code> into <code>3</code>), or try a completely wrong type like <code>true</code>.</div>
</div>

<div class="mini-editor-wrap">
    <textarea spellcheck="false">&lt;?php
declare(strict_types=1);

function findUser(int $id): ?array
{
    $users = [1 => ['id' => 1, 'name' => 'Ahmed']];
    return $users[$id] ?? null;
}

function calculateTotal(int $quantity, float $unitPrice): float
{
    return $quantity * $unitPrice;
}

$user = findUser(2);
echo "Find user 2: " . ($user['name'] ?? 'not found') . PHP_EOL;

try {
    calculateTotal(2, "9.99"); // نوع غلط تمامًا مع strict_types
} catch (TypeError $e) {
    echo "Caught: " . $e->getMessage() . PHP_EOL;
}

// جرّب تشيل declare(strict_types=1) وشغّل تاني — هتلاحظ الفرق
</textarea>
    <div class="mini-toolbar">
        <button class="mini-run-btn">▶ شغّل / Run</button>
        <span class="mini-status"></span>
    </div>
    <div class="output-box">— لسه متشغلش / not run yet —</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="null">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">في <code>function findUser(int $id): ?array</code>، إيه معنى علامة <code>?</code> قبل <code>array</code>؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">In <code>function findUser(int $id): ?array</code>, what does the <code>?</code> before <code>array</code> mean?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="opt"> الباراميتر اختياري</label>
        <label><input type="radio" name="q1" value="null"> الدالة ترجع array فعلي أو null بالظبط</label>
        <label><input type="radio" name="q1" value="any"> الدالة ترجع أي نوع تحبه</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="reject">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">لو دالة باراميترها <code>int|string $id</code>، وحاولت تمرّرلها <code>array</code>، إيه اللي هيحصل؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">If a function's parameter is <code>int|string $id</code> and you pass it an <code>array</code>, what happens?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="reject"> هيتم رفضها — TypeError، لإن array مش من ضمن الاتحاد المصرّح بيه</label>
        <label><input type="radio" name="q2" value="accept"> هتتقبل عادي، لإن Union Type بتقبل أي نوع</label>
        <label><input type="radio" name="q2" value="convert"> PHP هتحولها لـ string تلقائيًا</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="typeerror">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">مع <code>declare(strict_types=1)</code>، لو ناديت دالة باراميترها <code>int</code> بقيمة نصية <code>"3"</code>، إيه اللي هيحصل؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">With <code>declare(strict_types=1)</code>, calling a function whose parameter is <code>int</code> with the string <code>"3"</code> does what?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="silent"> PHP هتحوّلها لـ int بهدوء من غير أي مشكلة</label>
        <label><input type="radio" name="q3" value="typeerror"> بترمي TypeError فورًا لإن النوع مش مطابق تمامًا</label>
        <label><input type="radio" name="q3" value="warning"> بتطبع Warning بس وتكمل عادي</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="specific">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">ليه <code>?array</code> غالبًا أفضل من إرجاع مصفوفة فاضية <code>[]</code> لما المستخدم مش موجود؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Why is <code>?array</code> usually better than returning an empty array <code>[]</code> when the user isn't found?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="specific"> null معناها واضح "مفيش نتيجة أصلًا"، بينما [] ممكن تلخبط مع "نتيجة موجودة لكن فاضية"</label>
        <label><input type="radio" name="q4" value="faster"> null بتخلي الكود يشتغل أسرع</label>
        <label><input type="radio" name="q4" value="same"> مفيش فرق حقيقي بينهم</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ دالة بحث آمنة / A Safe Lookup Function</h3>
    <div class="ar">🇪🇬 في <a href="../playground/index.php">محرر الكود</a>: اكتب <code>function findProductPrice(int|string $sku): int|float|null</code> بتدور في مصفوفة associative عن منتج بـ SKU، وترجع سعره (رقم) لو موجود أو <code>null</code> لو مش موجود. أضف <code>declare(strict_types=1)</code> في أول الملف، وجرّب تنادي الدالة بـ <code>true</code> كباراميتر داخل <code>try/catch</code> وشوف رسالة الـ <code>TypeError</code> الحقيقية.</div>
    <div class="en">🇬🇧 In the <a href="../playground/index.php">Playground</a>: write <code>function findProductPrice(int|string $sku): int|float|null</code> that looks up a product by SKU in an associative array and returns its price (a number) if found, or <code>null</code> if not. Add <code>declare(strict_types=1)</code> at the top of the file, then call the function with <code>true</code> as the argument inside a <code>try/catch</code> and see the real <code>TypeError</code> message.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 الـ <code>TypeError</code> اللي شفته دلوقتي كان استثناء عام جاهز من PHP — الدرس الجاي هيوريك إزاي تبني الاستثناءات (Exceptions) بتاعتك انت، خاصة بمشروعك، عشان كود الاستدعاء يقدر يفرّق بوضوح بين "بيانات غلط" و"رصيد مش كافي" بدل ما يمسك <code>Exception</code> عامة ويحاول يخمّن إيه اللي حصل بالظبط.</div>
    <div class="en">🇬🇧 The <code>TypeError</code> you just saw was a ready-made generic exception from PHP — the next lesson shows you how to build your own project-specific exceptions, so calling code can clearly tell "invalid data" apart from "insufficient funds" instead of catching a generic <code>Exception</code> and guessing what actually went wrong.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li><code>?type</code> (Nullable) = النوع ده أو <code>null</code> بالظبط، مناسب لحالة "مفيش نتيجة" بدون استثناء.</li>
        <li><code>typeA|typeB</code> (Union) = أكتر من نوع صحيح مسموح، مع رفض أي نوع تالت.</li>
        <li>من غير <code>declare(strict_types=1)</code>: PHP بتحاول تحوّل النوع تلقائيًا (Weak Typing).</li>
        <li>مع <code>declare(strict_types=1)</code>: مخالفة النوع بترمي <code>TypeError</code> حقيقي فورًا، ممكن تتمسك بـ <code>try/catch</code>.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="closures-callbacks.php">← الدرس السابق / Previous: Closures &amp; Callbacks</a>
    <a href="custom-exceptions.php">الدرس الجاي / Next: Custom Exceptions →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
