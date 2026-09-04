<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'closures-callbacks';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'PHP متوسط — Closures و Callbacks';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">Stage 3 · PHP Intermediate</span>
<h1>Closures و Callbacks <span class="ltr">Closures &amp; Callbacks</span></h1>
<p class="subtitle">إزاي دالة "تتذكر" متغيرات من بيئتها بـ use()، ومتى تستخدم Callback بدل تكرار كود. <span class="ltr">How a function "remembers" variables from its environment with use(), and when a callback beats duplicated code.</span></p>

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
    <div class="ar">🇪🇬 "Closure" هي دالة مجهولة (Anonymous Function) بتقدر "تاخد معاها" متغيرات من البيئة اللي اتعرّفت فيها، حتى بعد ما الدالة اللي أنشأتها تخلّص تنفيذها. "Callback" ببساطة هو تمرير دالة كباراميتر لدالة تانية عشان تتنفّذ جواها — نفس الفكرة اللي شفتها في <code>array_map</code>/<code>usort</code>، لكن دلوقتي هتبنيها بنفسك من الصفر.</div>
    <div class="en">🇬🇧 A "closure" is an anonymous function that can "carry" variables from the scope it was created in, even after the function that created it has finished running. A "callback" simply means passing a function as a parameter to another function so it runs inside it — the same idea you saw in <code>array_map</code>/<code>usort</code>, but now you'll build it yourself from scratch.</div>
</div>

<h2 id="understand">🧠 1) Closure بتتذكر متغيّر — use() / A Closure Remembering a Variable</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 الدالة <code>makeDiscountCalculator(float $rate)</code> بترجع Closure جواها. الـ Closure دي مش بتاخد <code>$rate</code> كباراميتر — لأ، هي "التقطته" من بيئة الدالة الخارجية بـ <code>use ($rate)</code> وقت إنشائها، وبتفضل متذكراه كل مرة تتنفّذ فيها بعد كده، حتى لو الدالة الخارجية خلصت من زمان.</div>
    <div class="en">🇬🇧 <code>makeDiscountCalculator(float $rate)</code> returns a closure. That closure doesn't receive <code>$rate</code> as a parameter — it "captured" it from the outer function's scope via <code>use ($rate)</code> at creation time, and keeps remembering it on every later call, long after the outer function has returned.</div>
</div>

<pre><code>&lt;?php
function makeDiscountCalculator(float $rate): Closure
{
    return function (float $price) use ($rate): float {
        return round($price - ($price * $rate), 2);
    };
}

$tenPercentOff = makeDiscountCalculator(0.10);
$thirtyPercentOff = makeDiscountCalculator(0.30);

echo "10% off $50: " . $tenPercentOff(50) . PHP_EOL;
echo "10% off $200: " . $tenPercentOff(200) . PHP_EOL;
echo "30% off $200: " . $thirtyPercentOff(200) . PHP_EOL;</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">10% off $50: 45
10% off $200: 180
30% off $200: 140</div>

<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ إن <code>$tenPercentOff</code> و<code>$thirtyPercentOff</code> كل واحدة فيهم لسه "فاكرة" نسبتها الخاصة، رغم إن الاتنين جايين من نفس الدالة <code>makeDiscountCalculator</code>. ده استخدام عملي جدًا: بدل ما تكرر دالة الخصم لكل نسبة، دالة واحدة بتنتج نسخ مختلفة كل واحدة بحالتها الخاصة.</div>
    <div class="en">🇬🇧 Notice <code>$tenPercentOff</code> and <code>$thirtyPercentOff</code> each still "remember" their own rate, even though both came from the same <code>makeDiscountCalculator</code> function. This is genuinely useful: instead of duplicating a discount function per rate, one function produces distinct instances, each with its own private state.</div>
</div>

<h2>2) use($var) بالقيمة مقابل use(&amp;$var) بالمرجع / By Value vs. By Reference</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <code>use ($var)</code> بتاخد <b>نسخة</b> من قيمة المتغيّر وقت إنشاء الـ Closure — أي تعديل جواها بعد كده ما بيأثرش على المتغيّر الأصلي برّه، ولا العكس. <code>use (&amp;$var)</code> بتاخد <b>مرجع</b> حقيقي لنفس المتغيّر — أي تعديل جوه الـ Closure بيتفّذ فعليًا على المتغيّر الأصلي، وبيفضل موجود بين استدعاء واستدعاء.</div>
    <div class="en">🇬🇧 <code>use ($var)</code> takes a <b>copy</b> of the variable's value at the moment the closure is created — changing it inside the closure afterward never touches the original outside variable, or vice versa. <code>use (&amp;$var)</code> takes a real <b>reference</b> to the same variable — any change inside the closure actually happens to the original variable, and persists across calls.</div>
</div>

<pre><code>&lt;?php
$count = 0;

$incByValue = function () use ($count) {
    $count++;
    echo "Inside (by value): $count" . PHP_EOL;
};

$incByValue();
$incByValue();
echo "Outside after by-value calls: $count" . PHP_EOL;

echo PHP_EOL;

$count = 0;
$incByRef = function () use (&$count) {
    $count++;
    echo "Inside (by reference): $count" . PHP_EOL;
};

$incByRef();
$incByRef();
echo "Outside after by-reference calls: $count" . PHP_EOL;</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">Inside (by value): 1
Inside (by value): 1
Outside after by-value calls: 0

Inside (by reference): 1
Inside (by reference): 2
Outside after by-reference calls: 2</div>

<div class="bi-block">
    <div class="ar">🇪🇬 ده أوضح دليل ممكن تشوفه: مع <code>use ($count)</code>، كل استدعاء للـ Closure بيشتغل على نسخته الخاصة اللي فضلت <code>0</code> من البداية، فكل مرة بتطبع <code>1</code>، والمتغيّر برّه فضل <code>0</code> نهائيًا. مع <code>use (&amp;$count)</code>، نفس المتغيّر بالظبط بيزيد فعليًا مع كل استدعاء — <code>1</code> ثم <code>2</code> — وده اللي بيظهر برّه كمان.</div>
    <div class="en">🇬🇧 This is the clearest possible proof: with <code>use ($count)</code>, every call operates on its own private copy that started at <code>0</code>, so it prints <code>1</code> every time, and the outer variable stays <code>0</code> permanently. With <code>use (&amp;$count)</code>, the exact same variable actually increments across calls — <code>1</code> then <code>2</code> — and that's what shows up outside too.</div>
</div>

<h2 id="practice">💻 3) Callback: دالة كباراميتر / A Function as a Parameter</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 دلوقتي هتبني نسخة مبسّطة من <code>array_filter</code> بنفسك عشان تفهم بالظبط إيه اللي بيحصل جوّاها. <code>myArrayFilter(array $items, callable $fn)</code> بتاخد مصفوفة ودالة — لأي عنصر، بتنادي <code>$fn($value)</code> وتشوف لو رجّعت <code>true</code>، تحطه في النتيجة. الـ <code>callable</code> type hint بيقبل Closure، اسم دالة كنص، أو أي حاجة PHP تقدر "تناديها".</div>
    <div class="en">🇬🇧 Now you'll build a simplified version of <code>array_filter</code> yourself to see exactly what happens inside it. <code>myArrayFilter(array $items, callable $fn)</code> takes an array and a function — for each element, it calls <code>$fn($value)</code> and, if it returns <code>true</code>, keeps it in the result. The <code>callable</code> type hint accepts a closure, a function name as a string, or anything PHP can "call".</div>
</div>

<pre><code>&lt;?php
function myArrayFilter(array $items, callable $fn): array
{
    $result = [];
    foreach ($items as $key => $value) {
        if ($fn($value)) {
            $result[$key] = $value;
        }
    }
    return $result;
}

$numbers = [3, 8, 12, 15, 20, 27];

$evens = myArrayFilter($numbers, function (int $n): bool {
    return $n % 2 === 0;
});
echo "Evens: " . implode(', ', $evens) . PHP_EOL;

$aboveTen = myArrayFilter($numbers, fn($n) => $n > 10);
echo "Above 10: " . implode(', ', $aboveTen) . PHP_EOL;

function isPrime(int $n): bool
{
    if ($n &lt; 2) return false;
    for ($i = 2; $i * $i &lt;= $n; $i++) {
        if ($n % $i === 0) return false;
    }
    return true;
}
$primes = myArrayFilter($numbers, 'isPrime');
echo "Primes: " . implode(', ', $primes) . PHP_EOL;</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">Evens: 8, 12, 20
Above 10: 12, 15, 20, 27
Primes: 3</div>

<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ آخر سطر — مررنا اسم الدالة <code>'isPrime'</code> كـ <b>نص</b>، مش Closure، ولسه اشتغلت عادي، لأن PHP بتقبل أي اسم دالة عادية كـ <code>callable</code> برضه. ده اللي بيخلّي <code>myArrayFilter</code> (وكل الدوال المشابهة زي <code>array_filter</code> الحقيقية) مرنة: تقدر تمرّرلها Closure، Arrow Function، أو دالة عادية موجودة بالفعل.</div>
    <div class="en">🇬🇧 Notice the last line — we passed the function name <code>'isPrime'</code> as a plain <b>string</b>, not a closure, and it still worked, because PHP accepts any regular function name as a <code>callable</code> too. That's what makes <code>myArrayFilter</code> (and every similar function, including the real <code>array_filter</code>) flexible: you can pass it a closure, an arrow function, or an existing regular function.</div>
</div>

<div class="mini-editor-wrap">
    <textarea spellcheck="false">&lt;?php
function makeDiscountCalculator(float $rate): Closure
{
    return function (float $price) use ($rate): float {
        return round($price - ($price * $rate), 2);
    };
}

$blackFriday = makeDiscountCalculator(0.50);
echo "50% off $80: " . $blackFriday(80) . PHP_EOL;

function myArrayFilter(array $items, callable $fn): array
{
    $result = [];
    foreach ($items as $key => $value) {
        if ($fn($value)) {
            $result[$key] = $value;
        }
    }
    return $result;
}

$prices = [12, 45, 99, 150, 8];
$cheap = myArrayFilter($prices, fn($p) => $p &lt; 50);
echo "Under $50: " . implode(', ', $cheap) . PHP_EOL;

// جرّب تغيّر النسبة أو الشرط جوه fn() وشوف الناتج بيتغيّر إزاي
</textarea>
    <div class="mini-toolbar">
        <button class="mini-run-btn">▶ شغّل / Run</button>
        <span class="mini-status"></span>
    </div>
    <div class="output-box">— لسه متشغلش / not run yet —</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="carry">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">إيه اللي بيخلّي <code>$tenPercentOff</code> و<code>$thirtyPercentOff</code> يفضلوا فاكرين نسبة مختلفة، رغم إنهم جايين من نفس الدالة؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What lets <code>$tenPercentOff</code> and <code>$thirtyPercentOff</code> each remember a different rate, even though both come from the same function?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="carry"> كل Closure التقطت قيمة <code>$rate</code> الخاصة بيها بـ use() وقت إنشائها</label>
        <label><input type="radio" name="q1" value="global"> PHP بتخزن كل الأرقام في متغيّر global واحد</label>
        <label><input type="radio" name="q1" value="static"> لازم تستخدم static properties عشان كده يشتغل</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="zero">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">في مثال <code>use ($count)</code> (بالقيمة)، بعد استدعاء <code>$incByValue()</code> مرتين، قيمة <code>$count</code> برّه الـ Closure بقت كام؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">In the <code>use ($count)</code> (by value) example, after calling <code>$incByValue()</code> twice, what is <code>$count</code> outside the closure?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="two"> 2</label>
        <label><input type="radio" name="q2" value="one"> 1</label>
        <label><input type="radio" name="q2" value="zero"> 0 — لإنها اتاخدت بالقيمة، مش بالمرجع</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="ref">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">عايز تعمل Closure بتزوّد عداد فعليًا موجود برّه كل مرة تتنفّذ، أنهي صياغة صح؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">To make a closure that actually increments an outer counter each time it runs, which syntax is correct?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="val"> use ($count)</label>
        <label><input type="radio" name="q3" value="ref"> use (&amp;$count)</label>
        <label><input type="radio" name="q3" value="none"> مفيش داعي لـ use() خالص</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="string">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">في مثال <code>myArrayFilter</code>، إزاي مررنا <code>isPrime</code> كـ Callback من غير ما نكتبها Closure؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">In the <code>myArrayFilter</code> example, how did we pass <code>isPrime</code> as a callback without writing it as a closure?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="string"> مررنا اسمها كنص <code>'isPrime'</code> — PHP بتقبله كـ callable</label>
        <label><input type="radio" name="q4" value="array"> لازم تتحط جوه array الأول</label>
        <label><input type="radio" name="q4" value="cant"> ده مش ممكن أصلًا، لازم Closure دايمًا</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ عداد مخزون بالمرجع / A Stock Counter by Reference</h3>
    <div class="ar">🇪🇬 في <a href="../playground/index.php">محرر الكود</a>: اعمل دالة <code>makeStockTracker(int &amp;$stock)</code> بترجع مصفوفة فيها Closure اسمها <code>sell</code> (بتاخد كمية وتقللها من <code>$stock</code> بـ <code>use (&amp;$stock)</code>) و Closure تانية اسمها <code>restock</code> (بتزوّد الكمية). نادي <code>sell</code> و<code>restock</code> كذا مرة واطبع <code>$stock</code> برّه بعد كل استدعاء عشان تتأكد إنه فعليًا بيتغيّر.</div>
    <div class="en">🇬🇧 In the <a href="../playground/index.php">Playground</a>: write <code>makeStockTracker(int &amp;$stock)</code> returning an array with a <code>sell</code> closure (takes a quantity and reduces <code>$stock</code> via <code>use (&amp;$stock)</code>) and a <code>restock</code> closure (increases it). Call <code>sell</code> and <code>restock</code> a few times, printing the outer <code>$stock</code> after each call to confirm it's really changing.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 الـ <code>callable</code> type hint اللي استخدمته في <code>myArrayFilter</code> كان مجرّد نوع بسيط — الدرس الجاي هيوسّع الفكرة دي لكل الأنواع في PHP: Nullable Types زي <code>?string</code>، Union Types زي <code>int|string</code>، وليه التصريح الدقيق بالنوع بيمنعك من أخطاء كتير قبل ما توصل لحظة التشغيل أصلًا.</div>
    <div class="en">🇬🇧 The <code>callable</code> type hint used in <code>myArrayFilter</code> was just one simple type — the next lesson widens that idea across PHP's type system: nullable types like <code>?string</code>, union types like <code>int|string</code>, and why precise type declarations catch a whole class of mistakes before runtime even starts.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>Closure = دالة مجهولة ممكن "تاخد معاها" متغيرات من بيئتها بـ <code>use()</code>.</li>
        <li><code>use ($var)</code> بتاخد نسخة (بالقيمة) — تعديلات جوّا الـ Closure ما بتأثرش على المتغيّر الأصلي.</li>
        <li><code>use (&amp;$var)</code> بتاخد مرجع حقيقي — تعديلات جوّا الـ Closure بتتفّذ على نفس المتغيّر الأصلي.</li>
        <li>Callback = تمرير دالة (Closure، Arrow Function، أو اسم دالة كنص) كباراميتر لدالة تانية، زي <code>callable $fn</code>.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="array-string-functions.php">← الدرس السابق / Previous: Advanced Array &amp; String Functions</a>
    <a href="type-declarations.php">الدرس الجاي / Next: Type Declarations →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
