<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'debugging-lab';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = '🐛 معمل التصحيح — Debugging Lab';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">Stage 15 · Debugging</span>
<h1>🐛 معمل التصحيح <span class="ltr">🐛 Debugging Lab</span></h1>
<p class="subtitle">5 أنواع Bugs حقيقية (Syntax, Logic, Type, SQL, Validation) — تلاقيها، تفهمها، تصلحها، تختبرها.</p>

<div class="step-tracker">
    <a href="#read">📖 Read</a>
    <a href="#debug">🐛 Debug</a>
    <a href="#quiz">🧠 Quiz</a>
    <a href="#challenge">🛠️ Challenge</a>
    <a href="#project">🚀 Project</a>
</div>

<h2 id="read">📖 الهدف / Goal</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 لحد دلوقتي، الكود اللي اتعلمته كان "صح من الأول". في الشغل الحقيقي، مش هتقعد تكتب كود مثالي — هتقعد تصلح كود موجود وفيه مشاكل، بتاعك انت أو بتاع حد تاني. الدرس ده معمل تدريب على 5 أنواع Bugs بتتكرر يوميًا في أي مشروع PHP: Syntax، Logic، Type، SQL، وValidation. كل واحد فيهم بنفس الترتيب: تلاقي الخطأ، تفهم السبب، تصلحه، وتتأكد إن الحل شغال فعلاً — مش تخمين.</div>
    <div class="en">🇬🇧 Up to now, the code you've seen was "correct from the start". In real work, you won't just write perfect code — you'll spend a lot of time fixing existing code, yours or someone else's. This lesson is a hands-on lab on 5 bug types that show up constantly in real PHP projects: Syntax, Logic, Type, SQL, and Validation. Each one follows the same loop: find the bug, understand why it happens, fix it, and verify the fix actually works — not just guess.</div>
</div>
<div class="bi-block">
    <div class="ar">🇪🇬 كل مثال هنا كود حقيقي اتشغّل فعليًا — الناتج اللي هتشوفه (سواء رسالة خطأ أو نتيجة غلط) هو الناتج الحقيقي اللي PHP رجّعه، مش نص متخيّل.</div>
    <div class="en">🇬🇧 Every example here is real code that was actually executed — what you see (whether an error message or a wrong result) is PHP's real output, not invented text.</div>
</div>

<h2 id="debug">🐛 معمل التصحيح / The Debugging Lab</h2>

<div class="debug-lab">
    <h3>🐞 Bug #1 — خطأ في الصياغة <span class="ltr">Syntax Error</span></h3>
    <h4>🔍 Find / ابحث</h4>
    <div class="bi-block">
        <div class="ar">🇪🇬 الدالة دي المفروض تطبع تحية للمستخدم. شغّلها في دماغك الأول قبل ما تشوف الناتج — تقدر تلاقي السطر اللي فيه المشكلة؟</div>
        <div class="en">🇬🇧 This function is supposed to print a greeting. Read it first before scrolling to the output — can you spot the broken line?</div>
    </div>
    <div class="bug-code"><pre><code>&lt;?php
function greetUser($name) {
    $message = "Hello, " . $name
    echo $message . PHP_EOL;
}
greetUser("Sara");</code></pre></div>
    <h4>💥 الناتج الفعلي عند التشغيل / Real output when run</h4>
    <div class="output-box">PHP Parse error:  syntax error, unexpected token "echo" in tmp_dbg1_buggy.php on line 4

Parse error: syntax error, unexpected token "echo" in tmp_dbg1_buggy.php on line 4</div>
    <h4>🧠 Explain / اشرح</h4>
    <div class="bi-block">
        <div class="ar">🇪🇬 السطر <code>$message = "Hello, " . $name</code> ناقصه فاصلة منقوطة <code>;</code> في الآخر. PHP بتحتاج كل جملة (Statement) تنتهي بـ <code>;</code> عشان تعرف "خلصت هنا وابدأ اللي بعدها". لما مبتلاقيهاش، بتحاول تكمل قراءة السطر اللي بعده كأنه امتداد لنفس الجملة، فبتتفاجئ بكلمة <code>echo</code> في مكان مش متوقع — عشان كده رسالة الخطأ بتشاور على السطر اللي بعد الخطأ الحقيقي (4) مش السطر اللي فيه هو (3).</div>
        <div class="en">🇬🇧 The line <code>$message = "Hello, " . $name</code> is missing a trailing semicolon <code>;</code>. PHP needs every statement to end with <code>;</code> so it knows where one ends and the next begins. Without it, PHP tries to keep parsing the next line as part of the same statement and chokes on the unexpected <code>echo</code> — which is why the parse error points at line 4, one line after the actual mistake (line 3).</div>
    </div>
    <h4>🛠️ Fix / اصلح</h4>
    <div class="bug-code"><pre><code>&lt;?php
function greetUser($name) {
    $message = "Hello, " . $name;
    echo $message . PHP_EOL;
}
greetUser("Sara");</code></pre></div>
    <h4>✅ Test / اختبر</h4>
    <div class="output-box">Hello, Sara</div>
</div>

<div class="debug-lab">
    <h3>🐞 Bug #2 — خطأ منطقي <span class="ltr">Logic Error</span></h3>
    <h4>🔍 Find / ابحث</h4>
    <div class="bi-block">
        <div class="ar">🇪🇬 الكود ده المفروض يدي خصم 10% بس للمنتجات اللي سعرها بالظبط 100. جرب تتوقع الناتج قبل ما تشوفه.</div>
        <div class="en">🇬🇧 This code should give a 10% discount only to items priced at exactly 100. Try to predict the output before reading on.</div>
    </div>
    <div class="bug-code"><pre><code>&lt;?php
$prices = [50, 100, 150, 100, 75];
$discounted = [];
foreach ($prices as $price) {
    if ($price = 100) { // bug: assignment (=) instead of comparison (==)
        $discounted[] = $price * 0.9;
    } else {
        $discounted[] = $price;
    }
}
echo "Original: " . implode(', ', $prices) . PHP_EOL;
echo "Discounted: " . implode(', ', $discounted) . PHP_EOL;</code></pre></div>
    <h4>💥 الناتج الفعلي (غلط) / Real (wrong) output</h4>
    <div class="output-box">Original: 50, 100, 150, 100, 75
Discounted: 90, 90, 90, 90, 90</div>
    <h4>🧠 Explain / اشرح</h4>
    <div class="bi-block">
        <div class="ar">🇪🇬 <code>if ($price = 100)</code> فيها <code>=</code> (تسنيد/Assignment) مش <code>==</code> (مقارنة/Comparison). السطر ده مش بيقارن <code>$price</code> بـ 100 — هو بيحط 100 جوه <code>$price</code> نفسها! وبما إن نتيجة التسنيد هي القيمة المسندة (100)، والقيمة دي "Truthy" (مش صفر)، الشرط بيبقى صح دايمًا لكل عنصر، وكمان كل الأسعار بتتحول فعليًا لـ 100 جوه الحلقة قبل ما يتضربوا في 0.9 — عشان كده كل النتايج طلعت 90.</div>
        <div class="en">🇬🇧 <code>if ($price = 100)</code> uses <code>=</code> (assignment) instead of <code>==</code> (comparison). That line doesn't compare <code>$price</code> to 100 — it overwrites <code>$price</code> with 100! Since an assignment expression evaluates to the assigned value (100), which is truthy (non-zero), the condition is true on every iteration, and every price gets silently replaced with 100 before being multiplied by 0.9 — which is why every result is 90.</div>
    </div>
    <h4>🛠️ Fix / اصلح</h4>
    <div class="bug-code"><pre><code>&lt;?php
$prices = [50, 100, 150, 100, 75];
$discounted = [];
foreach ($prices as $price) {
    if ($price == 100) { // fixed: comparison, not assignment
        $discounted[] = $price * 0.9;
    } else {
        $discounted[] = $price;
    }
}
echo "Original: " . implode(', ', $prices) . PHP_EOL;
echo "Discounted: " . implode(', ', $discounted) . PHP_EOL;</code></pre></div>
    <h4>✅ Test / اختبر (الناتج الصح / correct output)</h4>
    <div class="output-box">Original: 50, 100, 150, 100, 75
Discounted: 50, 90, 150, 90, 75</div>
    <div class="bi-block">
        <div class="ar">🇪🇬 نصيحة عملية: كتير من المطورين بيتعودوا يكتبوا الشرط بالمقلوب <code>if (100 == $price)</code> عشان لو نسيوا علامة <code>=</code>، PHP نفسها هترمي خطأ (مينفعش تسند قيمة لرقم ثابت) بدل ما تسيب الباج يمر بصمت.</div>
        <div class="en">🇬🇧 A practical habit: some developers write the condition reversed, <code>if (100 == $price)</code>, so that if they typo a missing <code>=</code>, PHP itself throws an error (you can't assign to a literal number) instead of letting the bug pass silently.</div>
    </div>
</div>

<div class="debug-lab">
    <h3>🐞 Bug #3 — خطأ في النوع <span class="ltr">Type Error</span></h3>
    <h4>🔍 Find / ابحث</h4>
    <div class="bi-block">
        <div class="ar">🇪🇬 الدالة دي بتاخد <code>int</code> و<code>float</code>، بس اتنادت بنصوص ("3" و"9.99"). إيه اللي هيحصل؟</div>
        <div class="en">🇬🇧 This function expects an <code>int</code> and a <code>float</code>, but it's called with strings ("3" and "9.99"). What happens?</div>
    </div>
    <div class="bug-code"><pre><code>&lt;?php
function calculateTotal(int $quantity, float $price): float {
    return $quantity * $price;
}

echo "Total: " . calculateTotal("3", "9.99") . PHP_EOL;</code></pre></div>
    <h4>💥 الناتج الفعلي بدون strict_types / Real output without strict_types</h4>
    <div class="output-box">Total: 29.97</div>
    <h4>🧠 Explain / اشرح</h4>
    <div class="bi-block">
        <div class="ar">🇪🇬 من غير <code>declare(strict_types=1)</code>، PHP شغالة بوضع "Coercive Typing" — يعني لو بعتّ نص فيه رقم صحيح زي <code>"3"</code> لمكان متوقع فيه <code>int</code>، PHP بتحوّله أوتوماتيك. ده مريح، لكنه بيخفي أخطاء حقيقية: لو حد بعت <code>"three"</code> بدل <code>"3"</code> بالغلط، مكنتش هتاخد تحذير واضح فورًا في كل الحالات. دلوقتي شوف نفس الكود بعد ما نضيف <code>declare(strict_types=1)</code> في أول الملف.</div>
        <div class="en">🇬🇧 Without <code>declare(strict_types=1)</code>, PHP runs in "coercive typing" mode — a numeric string like <code>"3"</code> passed where an <code>int</code> is expected gets silently converted. That's convenient, but it hides real mistakes: if someone accidentally passed <code>"three"</code> instead of <code>"3"</code>, you wouldn't get an immediate, obvious warning in every case. Now watch the same code after adding <code>declare(strict_types=1)</code> at the top of the file.</div>
    </div>
    <div class="bug-code"><pre><code>&lt;?php
declare(strict_types=1);

function calculateTotal(int $quantity, float $price): float {
    return $quantity * $price;
}

echo "Total: " . calculateTotal("3", "9.99") . PHP_EOL;</code></pre></div>
    <h4>💥 الناتج الفعلي مع strict_types (خطأ حقيقي) / Real output with strict_types (real error)</h4>
    <div class="output-box">PHP Fatal error:  Uncaught TypeError: calculateTotal(): Argument #1 ($quantity) must be of type int, string given, called in tmp_dbg3_strict.php on line 8 and defined in tmp_dbg3_strict.php:4
Stack trace:
#0 tmp_dbg3_strict.php(8): calculateTotal('3', '9.99')
#1 {main}
  thrown in tmp_dbg3_strict.php on line 4</div>
    <h4>🛠️ Fix / اصلح</h4>
    <div class="bi-block">
        <div class="ar">🇪🇬 الحل الصح مش إننا نشيل <code>strict_types</code> — الحل إننا نبعت النوع الصح من الأساس. لو الأرقام جايالك من فورم (<code>$_POST</code>)، حوّلها بنفسك بـ <code>(int)</code>/<code>(float)</code> أو <code>(int) $_POST['qty']</code> قبل ما تبعتها للدالة.</div>
        <div class="en">🇬🇧 The right fix isn't removing <code>strict_types</code> — it's passing the correct type in the first place. If the numbers come from a form (<code>$_POST</code>), cast them yourself with <code>(int)</code>/<code>(float)</code> before passing them to the function.</div>
    </div>
    <div class="bug-code"><pre><code>&lt;?php
declare(strict_types=1);

function calculateTotal(int $quantity, float $price): float {
    return $quantity * $price;
}

echo "Total: " . calculateTotal(3, 9.99) . PHP_EOL;</code></pre></div>
    <h4>✅ Test / اختبر</h4>
    <div class="output-box">Total: 29.97</div>
</div>

<div class="debug-lab">
    <h3>🐞 Bug #4 — خطأ في الاستعلام <span class="ltr">SQL Bug</span></h3>
    <h4>🔍 Find / ابحث</h4>
    <div class="bi-block">
        <div class="ar">🇪🇬 نفس الـ Sandbox بتاع الـ SQL Playground (جدولي <code>comments</code> و<code>posts</code>). المفروض الاستعلام ده يجيب كل تعليق مع عنوان البوست اللي اتكتب عليه. شوف شرط الـ <code>JOIN</code> كويس.</div>
        <div class="en">🇬🇧 Same sandbox database as the SQL Playground (<code>comments</code> and <code>posts</code> tables). This query should return every comment with the title of the post it was written on. Look closely at the <code>JOIN</code> condition.</div>
    </div>
    <div class="bug-code"><pre><code>&lt;?php
require __DIR__ . '/../db-sandbox/schema.php';
$pdo = build_sandbox_pdo();

$sql = "SELECT c.body AS comment, p.title AS post_title
        FROM comments c
        JOIN posts p ON c.id = p.id
        ORDER BY c.id";
$rows = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
echo "Rows returned: " . count($rows) . PHP_EOL;
foreach ($rows as $row) {
    echo substr($row['comment'], 0, 30) . "... -> \"" . $row['post_title'] . "\"" . PHP_EOL;
}</code></pre></div>
    <h4>💥 الناتج الفعلي (غلط) / Real (wrong) output</h4>
    <div class="output-box">Rows returned: 8
This finally made PDO click fo... -> "Getting Started with PDO"
Great intro, looking forward t... -> "Why Prepared Statements Matter"
Wish I had read this before my... -> "My First REST API"
Nice first API, the pagination... -> "Database Design 101"
Normalization examples were su... -> "Debugging a Tricky Bug"
Do you have a follow-up on man... -> "Understanding JOINs"
The diagram made INNER vs LEFT... -> "Sessions vs Cookies"
Bookmarking this one.... -> "Indexing for Performance"</div>
    <h4>🧠 Explain / اشرح</h4>
    <div class="bi-block">
        <div class="ar">🇪🇬 الجدول <code>comments</code> فيه عمود <code>post_id</code> بالظبط عشان يربط كل تعليق بالبوست بتاعه — لكن الاستعلام بيقارن <code>c.id = p.id</code> (رقم التعليق نفسه برقم البوست نفسه)، مش <code>c.post_id = p.id</code>. النتيجة: كل تعليق اتلزّق بأي بوست عنده نفس الرقم بالصدفة (تعليق #5 مع بوست #5)، مش البوست اللي اتكتب عليه فعلاً. وكمان في <code>comments</code> 12 صف لكن <code>posts</code> بس 8، فالتعليقات من رقم 9 لـ 12 اختفت تمامًا من النتيجة من غير أي رسالة خطأ — ده أخطر نوع باج: مفيش Exception ولا تحذير، بس البيانات غلط.</div>
        <div class="en">🇬🇧 The <code>comments</code> table has a <code>post_id</code> column precisely to link each comment to its post — but the query compares <code>c.id = p.id</code> (the comment's own id vs the post's id), not <code>c.post_id = p.id</code>. Result: each comment got paired with whatever post happens to share its id number (comment #5 with post #5), not the post it was actually written on. Also, <code>comments</code> has 12 rows but <code>posts</code> only has 8, so comments 9 through 12 silently vanished from the result with no error at all — this is the most dangerous kind of bug: no exception, no warning, just wrong data.</div>
    </div>
    <h4>🛠️ Fix / اصلح</h4>
    <div class="bug-code"><pre><code>&lt;?php
require __DIR__ . '/../db-sandbox/schema.php';
$pdo = build_sandbox_pdo();

$sql = "SELECT c.body AS comment, p.title AS post_title
        FROM comments c
        JOIN posts p ON c.post_id = p.id
        ORDER BY c.id";
$rows = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
echo "Rows returned: " . count($rows) . PHP_EOL;
foreach ($rows as $row) {
    echo substr($row['comment'], 0, 30) . "... -> \"" . $row['post_title'] . "\"" . PHP_EOL;
}</code></pre></div>
    <h4>✅ Test / اختبر (الناتج الصح / correct output)</h4>
    <div class="output-box">Rows returned: 12
This finally made PDO click fo... -> "Getting Started with PDO"
Great intro, looking forward t... -> "Getting Started with PDO"
Wish I had read this before my... -> "Why Prepared Statements Matter"
Nice first API, the pagination... -> "My First REST API"
Normalization examples were su... -> "Database Design 101"
Do you have a follow-up on man... -> "Database Design 101"
The diagram made INNER vs LEFT... -> "Understanding JOINs"
Bookmarking this one.... -> "Understanding JOINs"
Short and to the point, exactl... -> "Sessions vs Cookies"
Which column did you index?... -> "Indexing for Performance"
Indexes are underrated, good w... -> "Indexing for Performance"
Off-by-one bugs get everyone e... -> "Debugging a Tricky Bug"</code></div>
    <div class="bi-block">
        <div class="ar">🇪🇬 دلوقتي الـ 12 تعليق موجودين، وكل واحد متربط بالبوست الصح بتاعه فعلاً (لاحظ إزاي كذا تعليق بقوا مربوطين بنفس البوست، وده طبيعي جدًا).</div>
        <div class="en">🇬🇧 Now all 12 comments are present, and each is correctly linked to the post it was actually written on (notice multiple comments now correctly pointing at the same post — that's expected).</div>
    </div>
</div>

<div class="debug-lab">
    <h3>🐞 Bug #5 — خطأ في التحقق <span class="ltr">Validation Bug</span></h3>
    <h4>🔍 Find / ابحث</h4>
    <div class="bi-block">
        <div class="ar">🇪🇬 فورم تسجيل بيتحقق إن السن (Age) اتبعت. جرّب تتخيل: إيه اللي هيحصل لو السن المبعوت هو <code>0</code> (زي حالة مولود عمره أقل من سنة، أو أي حقل رقمي تاني ممكن قيمته الصحيحة تبقى صفر — زي عدد قطع في عربية تسوق، أو نسبة خصم)؟</div>
        <div class="en">🇬🇧 A registration form checks that an age was submitted. Think it through: what happens if the submitted age is <code>0</code> (like a baby under a year old, or any numeric field whose legitimate value can be zero — a cart item count, a discount percentage)?</div>
    </div>
    <div class="bug-code"><pre><code>&lt;?php
function validateAge(array $input): array {
    $errors = [];
    if (empty($input['age'])) {
        $errors[] = 'Age is required.';
    }
    return $errors;
}

// $input simulates $_POST since this runs via CLI, not a real HTTP request.
$input = ['age' => 0];
$errors = validateAge($input);
echo $errors ? "Invalid: " . implode(', ', $errors) : "Valid";
echo PHP_EOL;</code></pre></div>
    <h4>💥 الناتج الفعلي (غلط) / Real (wrong) output</h4>
    <div class="output-box">Invalid: Age is required.</div>
    <h4>🧠 Explain / اشرح</h4>
    <div class="bi-block">
        <div class="ar">🇪🇬 دالة <code>empty()</code> بترجع <code>true</code> مش بس لما القيمة مش موجودة، لكن كمان لما تكون <code>0</code>، <code>"0"</code>، <code>""</code>، <code>null</code>، أو <code>false</code>. يعني <code>empty(0)</code> بترجع <code>true</code> — فالسن <code>0</code> (قيمة صحيحة وحقيقية) بيتعامل معاها الكود كأنها "مبعوتش خالص"، وده باج شائع جدًا في أي حقل رقمي ممكن قيمته الطبيعية تبقى صفر.</div>
        <div class="en">🇬🇧 The <code>empty()</code> function returns <code>true</code> not just when a value is missing, but also when it's <code>0</code>, <code>"0"</code>, <code>""</code>, <code>null</code>, or <code>false</code>. So <code>empty(0)</code> is <code>true</code> — meaning a legitimate age of <code>0</code> gets treated as "never submitted", a very common gotcha for any numeric field whose valid value can be zero.</div>
    </div>
    <h4>🛠️ Fix / اصلح</h4>
    <div class="bi-block">
        <div class="ar">🇪🇬 الحل: نتحقق بشكل صريح إن القيمة "مش موجودة أصلاً" (<code>isset</code>) أو "فاضية كنص" (<code>=== ''</code>) أو "مش رقم" (<code>is_numeric</code>) — بدل ما نستخدم <code>empty()</code> اللي بتلخبط "مفيش قيمة" مع "القيمة صفر".</div>
        <div class="en">🇬🇧 The fix: explicitly check whether the value is "not set at all" (<code>isset</code>), "an empty string" (<code>=== ''</code>), or "not numeric" (<code>is_numeric</code>) — instead of <code>empty()</code>, which conflates "no value" with "the value is zero".</div>
    </div>
    <div class="bug-code"><pre><code>&lt;?php
function validateAge(array $input): array {
    $errors = [];
    if (!isset($input['age']) || $input['age'] === '' || !is_numeric($input['age'])) {
        $errors[] = 'Age is required.';
    } elseif ($input['age'] < 0) {
        $errors[] = 'Age cannot be negative.';
    }
    return $errors;
}

$testCases = [
    'age = 0 (newborn, should be valid)' => ['age' => 0],
    'age missing entirely'               => [],
    'age = -5 (invalid)'                 => ['age' => -5],
];

foreach ($testCases as $label => $input) {
    $errors = validateAge($input);
    $result = $errors ? "Invalid: " . implode(', ', $errors) : "Valid";
    echo "$label -> $result" . PHP_EOL;
}</code></pre></div>
    <h4>✅ Test / اختبر (الناتج الصح / correct output)</h4>
    <div class="output-box">age = 0 (newborn, should be valid) -> Valid
age missing entirely -> Invalid: Age is required.
age = -5 (invalid) -> Invalid: Age cannot be negative.</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 لكل سؤال، اقرأ الكود الجديد وحدد أنهي نوع من الـ 5 أنواع اللي اتعلمناها فوق بيمثّله.</div>
    <div class="en">🇬🇧 For each question, read the new snippet and identify which of the 5 bug types above it represents.</div>
</div>

<div class="quiz-box" data-correct="syntax">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">إيه نوع الباج في الكود ده؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What kind of bug is this?</span></p>
    <pre class="bug-code"><code>if ($x > 5) {
    echo "big"
}</code></pre>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="syntax"> Syntax Error — فاصلة منقوطة ناقصة بعد "big"</label>
        <label><input type="radio" name="q1" value="logic"> Logic Error</label>
        <label><input type="radio" name="q1" value="type"> Type Error</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="logic">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">إيه نوع الباج في الكود ده؟ (لو كل الأرقام في <code>$numbers</code> سالبة، <code>$max</code> بتفضل 0 غلط)<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What kind of bug is this? (if every number in <code>$numbers</code> is negative, <code>$max</code> incorrectly stays 0)</span></p>
    <pre class="bug-code"><code>$max = 0;
foreach ($numbers as $n) {
    if ($n > $max) {
        $max = $n;
    }
}</code></pre>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="syntax"> Syntax Error</label>
        <label><input type="radio" name="q2" value="logic"> Logic Error — القيمة الابتدائية 0 غلط لمصفوفة كلها سالب</label>
        <label><input type="radio" name="q2" value="sql"> SQL Bug</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="type">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">إيه نوع الباج في الكود ده؟ (هيرمي TypeError فعلي عند التشغيل)<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What kind of bug is this? (it throws a real TypeError when run)</span></p>
    <pre class="bug-code"><code>declare(strict_types=1);
function double(int $n): int { return $n * 2; }
echo double("5");</code></pre>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="validation"> Validation Bug</label>
        <label><input type="radio" name="q3" value="type"> Type Error — "5" نص مش int مع strict_types</label>
        <label><input type="radio" name="q3" value="logic"> Logic Error</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="validation">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">إيه نوع الباج في الكود ده؟ (خصم 0% قيمة صحيحة، لكن الكود بيرفضها)<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What kind of bug is this? (a 0% discount is a valid value, but the code rejects it)</span></p>
    <pre class="bug-code"><code>if (empty($input['discount'])) {
    $errors[] = 'Discount is required.';
}</code></pre>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="syntax"> Syntax Error</label>
        <label><input type="radio" name="q4" value="sql"> SQL Bug</label>
        <label><input type="radio" name="q4" value="validation"> Validation Bug — نفس مشكلة empty() مع السن في Bug #5</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ لاقي الباج بنفسك / Find Your Own Bug</h3>
    <div class="ar">🇪🇬 في <a href="../playground/index.php">محرر الكود</a>: اكتب دالة <code>isValidUsername(string $username): bool</code> المفروض ترجع <code>true</code> لو الاسم بين 3 و20 حرف. اكتبها الأول بشرط فيه Off-by-one مقصود (زي <code>strlen($username) > 3</code> بدل <code>&gt;= 3</code>)، جرّبها بأسماء حدّية (3 أحرف بالظبط، 20 حرف بالظبط)، ولاحظ الفرق بين اللي متوقعينه واللي طلع فعليًا — بالظبط زي Bug #2 فوق.</div>
    <div class="en">🇬🇧 In the <a href="../playground/index.php">Playground</a>: write a function <code>isValidUsername(string $username): bool</code> that should return <code>true</code> for names between 3 and 20 characters. Write it first with a deliberate off-by-one (e.g. <code>strlen($username) > 3</code> instead of <code>&gt;= 3</code>), test it with edge-case names (exactly 3 characters, exactly 20), and compare what you expected vs what actually happened — exactly like Bug #2 above.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 مهارة اكتشاف وإصلاح الأخطاء دي مش هدف في حد ذاتها — هي المهارة اللي هتستخدمها في كل سطر تكتبه من هنا لآخر مسارك. في الدرس الجاي هتبني أول مشروع حقيقي كامل من الصفر: آلة حاسبة CLI فيها دوال، معالجة أخطاء بـ Exceptions، وحلقة بتعالج عمليات متعددة — نفس عقلية "لاقي المشكلة وصلحها" اللي اتدربت عليها هنا هتستخدمها وانت بتبني وتختبر المشروع ده.</div>
    <div class="en">🇬🇧 This debugging skill isn't a goal on its own — it's the skill you'll use in every line you write for the rest of this track. In the next lesson you'll build your first complete project from scratch: a CLI calculator with functions, exception-based error handling, and a loop processing multiple operations — you'll use the exact "find it, fix it" mindset you practiced here while building and testing that project.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li><b>Syntax Error</b>: خطأ في تركيب اللغة نفسها (زي فاصلة منقوطة ناقصة) — PHP بترفض تشغّل الكود من الأساس.</li>
        <li><b>Logic Error</b>: الكود بيشتغل من غير أخطاء، بس بيدي نتيجة غلط — زي <code>=</code> بدل <code>==</code>.</li>
        <li><b>Type Error</b>: مدخل من نوع غلط لمكان محدد نوعه — بيظهر بوضوح مع <code>declare(strict_types=1)</code>.</li>
        <li><b>SQL Bug</b>: شرط JOIN أو اسم عمود غلط بيدي نتايج غلط أو ناقصة من غير أي رسالة خطأ.</li>
        <li><b>Validation Bug</b>: استخدام <code>empty()</code> (أو فحص مشابه) بيلخبط "مفيش قيمة" مع "القيمة صفر/فاضية بس صحيحة".</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="../index.php">← الرئيسية / Home</a>
    <a href="project1-cli-calculator.php">المشروع 1 / Next: CLI Calculator →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
