<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'functions-1';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'تنفيذ الدوال الجاهزة — المستوى الأول';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">المرحلة 4 / Stage 4</span>
<h1>تنفيذ الدوال الجاهزة — المستوى الأول <span class="ltr">Function Implementation — Level 1</span></h1>
<p class="subtitle">بتستخدم دوال زي <code>strlen</code> و<code>max</code> كل يوم من غير ما تفكر إزاي بتشتغل من جوه. في المرحلة دي هنعمل نسخة بسيطة من كل دالة بنفسنا، ونقارن نتيجتها بنتيجة الدالة الأصلية عشان نتأكد إن فهمنا صح.</p>

<div class="step-tracker">
    <a href="#read">📖 Read</a>
    <a href="#understand">🧠 Understand</a>
    <a href="#practice">💻 Practice</a>
    <a href="#quiz">🧠 Quiz</a>
    <a href="#challenge">🛠️ Challenge</a>
    <a href="#project">🚀 Project</a>
</div>

<h2 id="read">الهدف / Goal</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 تفهم إن الدوال الجاهزة (Built-in Functions) مش "سحر" — هي مجرد كود مكتوب مسبقًا بيعمل حاجة معينة، وممكن تكتبه بنفسك بنفس المنطق. ده بيخليك تفهم أعمق وتقدر تكتب دوالك الخاصة بثقة.</div>
    <div class="en">🇬🇧 Understand that built-in functions aren't "magic" — they're just pre-written code doing a specific job, and you can write the same logic yourself. This deepens your understanding and gives you confidence writing your own functions.</div>
</div>

<h2 id="understand">1) طول النص — <span class="ltr">myStrlen() vs strlen()</span></h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>الفكرة:</b> <code>strlen</code> بترجع عدد الحروف في نص. نقدر نعملها بنفسنا بإننا نفكك النص لحروف بـ <code>str_split</code> ونعد كل حرف في حلقة.</div>
    <div class="en">🇬🇧 <b>Idea:</b> <code>strlen</code> returns the number of characters in a string. We can build it ourselves by splitting the string into characters with <code>str_split</code> and counting each one in a loop.</div>
</div>
<pre><code>&lt;?php
function myStrlen(string $s): int {
    $count = 0;
    foreach (str_split($s) as $ch) {
        $count++;
    }
    return $count;
}

$test = "Sila Learning";
echo "myStrlen: " . myStrlen($test) . PHP_EOL;
echo "strlen:   " . strlen($test) . PHP_EOL;</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">myStrlen: 13
strlen:   13</div>

<h2>2) مجموع مصفوفة — <span class="ltr">myArraySum() vs array_sum()</span></h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>الفكرة:</b> <code>array_sum</code> بترجع مجموع كل عناصر مصفوفة أرقام. الفكرة كلاسيكية: متغير تجميع (Accumulator) بيبدأ من صفر، وبنضيفله كل عنصر في حلقة.</div>
    <div class="en">🇬🇧 <b>Idea:</b> <code>array_sum</code> returns the total of a numeric array's elements. Classic pattern: an accumulator variable starting at zero, adding each element in a loop.</div>
</div>
<pre><code>&lt;?php
function myArraySum(array $numbers): float {
    $total = 0;
    foreach ($numbers as $n) {
        $total += $n;
    }
    return $total;
}

$nums = [4, 8, 15, 16, 23, 42];
echo "myArraySum: " . myArraySum($nums) . PHP_EOL;
echo "array_sum:  " . array_sum($nums) . PHP_EOL;</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">myArraySum: 108
array_sum:  108</div>

<h2>3) البحث عن عنصر — <span class="ltr">myInArray() vs in_array()</span></h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>الفكرة:</b> <code>in_array</code> بتتحقق هل قيمة معينة موجودة جوه مصفوفة. نمشي على كل عنصر ونقارنه بالقيمة اللي بندور عليها بـ <code>===</code> (مقارنة صارمة تتأكد من النوع كمان).</div>
    <div class="en">🇬🇧 <b>Idea:</b> <code>in_array</code> checks whether a value exists inside an array. We walk each element and compare it to the search value with <code>===</code> (strict comparison, which also checks type).</div>
</div>

<div class="flow-diagram">
    <div class="flow-box">Walk each item</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">item === needle ?</div>
    <div class="flow-arrow">↓ yes</div>
    <div class="flow-box">return true (stop early)</div>
</div>

<pre><code>&lt;?php
function myInArray($needle, array $haystack): bool {
    foreach ($haystack as $item) {
        if ($item === $needle) {
            return true;
        }
    }
    return false;
}

$fruits = ["apple", "mango", "banana"];
foreach (["mango", "grape"] as $search) {
    $mine = myInArray($search, $fruits) ? 'true' : 'false';
    $real = in_array($search, $fruits) ? 'true' : 'false';
    echo "$search -> myInArray: $mine, in_array: $real" . PHP_EOL;
}</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">mango -> myInArray: true, in_array: true
grape -> myInArray: false, in_array: false</div>
<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ إننا برجّع فورًا <code>return true</code> أول ما نلاقي تطابق، مش لازم نكمل نمشي على باقي المصفوفة. ده تحسين مهم — مفيش داعي تفتش في حاجة لقيتها بالفعل.</div>
    <div class="en">🇬🇧 Notice we return <code>true</code> immediately on the first match — no need to keep scanning. This is an important optimization: don't keep searching for something you've already found.</div>
</div>

<h2>4) أكبر قيمة — <span class="ltr">myMax() vs max()</span></h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>الفكرة:</b> بالظبط زي "أكبر رقم في مصفوفة" اللي حليناه قبل كده كمشكلة — نفترض إن أول عنصر هو الأكبر، ونحدّثه كل ما نلاقي أكبر منه.</div>
    <div class="en">🇬🇧 <b>Idea:</b> exactly like the "largest number in an array" problem we solved earlier — assume the first element is largest, update whenever we find bigger.</div>
</div>
<pre><code>&lt;?php
function myMax(array $numbers) {
    $max = $numbers[0];
    foreach ($numbers as $n) {
        if ($n > $max) {
            $max = $n;
        }
    }
    return $max;
}

$nums = [3, 55, 12, 8, 91, 4];
echo "myMax: " . myMax($nums) . PHP_EOL;
echo "max:   " . max($nums) . PHP_EOL;</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">myMax: 91
max:   91</div>

<h2>5) عكس نص — <span class="ltr">myStrrev() vs strrev()</span></h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>الفكرة:</b> بدل ما نستخدم <code>strrev</code>، هنمشي على النص من آخر حرف للأول، ونضيف كل حرف لنتيجة جديدة. في PHP تقدر توصل لحرف معين في نص بـ <code>$s[$i]</code> بالظبط زي مصفوفة.</div>
    <div class="en">🇬🇧 <b>Idea:</b> instead of using <code>strrev</code>, we walk the string from the last character to the first, appending each to a new result. In PHP you can access a specific character with <code>$s[$i]</code>, just like an array.</div>
</div>
<pre><code>&lt;?php
function myStrrev(string $s): string {
    $result = '';
    for ($i = strlen($s) - 1; $i >= 0; $i--) {
        $result .= $s[$i];
    }
    return $result;
}

$word = "fundamentals";
echo "myStrrev: " . myStrrev($word) . PHP_EOL;
echo "strrev:   " . strrev($word) . PHP_EOL;</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">myStrrev: slatnemadnuf
strrev:   slatnemadnuf</div>

<h2 id="practice">💻 جرّب بنفسك / Try It Yourself</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 المحرر تحت فيه <code>myInArray</code> اللي شفتها فوق. جرّب تدور على قيم تانية، أو تضيف عناصر تانية للمصفوفة، وشوف إزاي النتيجة بتتطابق مع <code>in_array</code> الحقيقية.</div>
    <div class="en">🇬🇧 The editor below has <code>myInArray</code> from above. Try searching for different values, or add more elements, and see how the result matches the real <code>in_array</code>.</div>
</div>

<div class="mini-editor-wrap">
    <textarea spellcheck="false">&lt;?php
function myInArray($needle, array $haystack): bool {
    foreach ($haystack as $item) {
        if ($item === $needle) {
            return true;
        }
    }
    return false;
}

$fruits = ["apple", "mango", "banana"];
foreach (["mango", "grape"] as $search) {
    $mine = myInArray($search, $fruits) ? 'true' : 'false';
    $real = in_array($search, $fruits) ? 'true' : 'false';
    echo "$search -> myInArray: $mine, in_array: $real" . PHP_EOL;
}</textarea>
    <div class="mini-toolbar">
        <button class="mini-run-btn">▶ شغّل / Run</button>
        <span class="mini-status"></span>
    </div>
    <div class="output-box">— لسه متشغلش / not run yet —</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="strict">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">ليه <code>myInArray</code> بتستخدم <code>===</code> بدل <code>==</code> للمقارنة؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Why does <code>myInArray</code> use <code>===</code> instead of <code>==</code> for comparison?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="strict"> عشان تتحقق من النوع كمان مش بس القيمة / it also checks type, not just value</label>
        <label><input type="radio" name="q1" value="faster"> عشان أسرع في التنفيذ / because it's faster to execute</label>
        <label><input type="radio" name="q1" value="required"> PHP بترفض <code>==</code> جوه foreach / PHP rejects <code>==</code> inside foreach</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="max">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">دالة <code>myMax</code> بتستخدم نفس منطق أنهي مشكلة اتحلت في مرحلة سابقة؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Which earlier-stage problem does <code>myMax</code> reuse the exact same logic from?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="max"> "أكبر رقم في مصفوفة" من حل المشكلات / "largest number in an array" from Problem Solving</label>
        <label><input type="radio" name="q2" value="prime"> "هل الرقم أوّلي؟" / "is the number prime?"</label>
        <label><input type="radio" name="q2" value="fizz"> FizzBuzz</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ ابني myArrayReverse كاملة / Build a Complete myArrayReverse</h3>
    <div class="ar">🇪🇬 في <a href="../playground/index.php">محرر الكود</a> (أو المحرر المصغّر فوق)، اعمل نسختك الخاصة من <code>array_reverse</code> (اسمها <code>myArrayReverse</code>) من غير استخدام الدالة الجاهزة — امشِ من آخر عنصر في المصفوفة للأول وابنِ مصفوفة نتيجة جديدة. قارن نتيجتك بـ <code>array_reverse</code> الحقيقية على نفس المصفوفة.</div>
    <div class="en">🇬🇧 In the <a href="../playground/index.php">Playground</a> (or the mini editor above), write your own <code>myArrayReverse</code> without using the built-in — walk from the array's last element to the first, building a new result array. Compare your result against real <code>array_reverse</code> on the same array.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 فهمك الدقيق لتفاصيل زي "الإرجاع الفوري" و"المقارنة الصارمة" هيسهّل عليك كتير حل مشاكل أعقد لاحقًا (زي Two Sum في المستوى المتوسط)، وهيبان بوضوح في البرامج الكاملة اللي هتبنيها في مرحلة "البرامج التطبيقية" (Applications).</div>
    <div class="en">🇬🇧 Your precise understanding of details like "returning immediately" and "strict comparison" will make solving harder problems later much easier (like Two Sum at the Intermediate level), and will show clearly in the complete programs you build in the Applications stage.</div>
</div>

<div class="exercise-box">
    <h3>✍️ تمرين إضافي / Extra Exercise</h3>
    <div class="ar">🇪🇬 قارن أداء <code>myInArray</code> و<code>in_array</code> على مصفوفة كبيرة، وفكّر ليه الدالة الجاهزة غالبًا هتكون أسرع شوية حتى لو نفس المنطق.</div>
    <div class="en">🇬🇧 Compare <code>myInArray</code> and <code>in_array</code>'s performance on a large array, and think about why the built-in is usually slightly faster even with the same logic.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>كل دالة جاهزة هي في الأساس منطق بسيط ممكن تكتبه بنفسك.</li>
        <li>تنفيذ دالة بنفسك بيكشفلك التفاصيل اللي بتستخدمها كل يوم من غير ما تلاحظها.</li>
        <li>مقارنة نتيجتك بنتيجة الدالة الحقيقية هي أفضل طريقة تتأكد إن فهمك صح.</li>
        <li>تحسينات بسيطة زي "ارجع فورًا لما تلاقي النتيجة" بتفرق في كفاءة الكود.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="problem-solving-2.php">← المرحلة السابقة</a>
    <a href="algorithms.php">المرحلة الجاية / Next: Algorithms →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
