<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'problem-solving-3';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'حل المشكلات — مستوى متوسط';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">المرحلة 7 / Stage 7</span>
<h1>حل المشكلات — مستوى متوسط <span class="ltr">Problem Solving — Intermediate</span></h1>
<p class="subtitle">دلوقتي وانت عارف خوارزميات وهياكل بيانات، جاهز لمشاكل أعقد شوية بتحتاج توظيف أكتر من فكرة مع بعض — مقارنة بين نصوص، تتبّع قيم شفتها قبل كده، والتعامل مع مصفوفات ثنائية الأبعاد.</p>

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
    <div class="ar">🇪🇬 تحل 6 مشاكل متوسطة الصعوبة بتظهر كتير في مقابلات الشغل، وتتمرن على دمج أدوات اتعلمتها في مراحل مختلفة (فرز، بحث، هياكل بيانات بسيطة) في حل واحد.</div>
    <div class="en">🇬🇧 Solve 6 intermediate problems that show up often in job interviews, practicing how to combine tools from different stages (sorting, searching, simple data structures) into one solution.</div>
</div>

<h2 id="understand">مشكلة 1: هل كلمتين متناظرتان لفظيًا (Anagram)؟</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>المطلوب:</b> تتحقق هل كلمتين فيهم بالظبط نفس الحروف بس بترتيب مختلف، زي "listen" و"silent". <b>التفكير:</b> لو رتّبت حروف كل كلمة أبجديًا، الكلمتين المتناظرتين هيبقوا متطابقين تمامًا.</div>
    <div class="en">🇬🇧 <b>Task:</b> check if two words contain exactly the same letters in a different order, like "listen" and "silent". <b>Thinking:</b> if you sort each word's letters alphabetically, true anagrams become identical.</div>
</div>
<pre><code>&lt;?php
function isAnagram(string $a, string $b): bool {
    $a = str_split(strtolower(str_replace(' ', '', $a)));
    $b = str_split(strtolower(str_replace(' ', '', $b)));
    sort($a);
    sort($b);
    return $a === $b;
}

var_dump(isAnagram("listen", "silent"));
var_dump(isAnagram("hello", "world"));</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">bool(true)
bool(false)</div>

<h2>مشكلة 2: زوج بمجموع معيّن (Two Sum)</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>المطلوب:</b> تلاقي رقمين في مصفوفة مجموعهم يساوي رقم مستهدف معيّن. <b>التفكير:</b> بدل ما تقارن كل زوج بكل زوج (بطيء)، امشِ مرة واحدة على المصفوفة وتتبّع "المكمّل" (Target - الرقم الحالي) في مصفوفة <code>$seen</code> — لو لقيته قبل كده، يبقى لقيت الزوج.</div>
    <div class="en">🇬🇧 <b>Task:</b> find two numbers in an array that sum to a target. <b>Thinking:</b> instead of comparing every pair (slow), pass through once and track each number's "complement" (target - current) in a <code>$seen</code> array — if you've already seen it, you found your pair.</div>
</div>

<div class="flow-diagram">
    <div class="flow-box">Take next number n</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">complement = target − n</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">complement in $seen ?</div>
    <div class="flow-arrow">↓ yes</div>
    <div class="flow-box">Pair found</div>
</div>

<pre><code>&lt;?php
function findPairWithSum(array $numbers, int $target): ?array {
    $seen = [];
    foreach ($numbers as $n) {
        $complement = $target - $n;
        if (in_array($complement, $seen)) {
            return [$complement, $n];
        }
        $seen[] = $n;
    }
    return null;
}

print_r(findPairWithSum([2, 7, 11, 15], 9));
var_dump(findPairWithSum([1, 2, 3], 100));</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">Array
(
    [0] => 2
    [1] => 7
)
NULL</div>
<div class="bi-block">
    <div class="ar">🇪🇬 الطريقة دي بتحل المشكلة في مرور واحد بس على المصفوفة (<code>O(n)</code>) بدل ما تحتاج تدور جوه حلقة تانية على كل عنصر (<code>O(n²)</code>) — نفس فكرة التعقيد الزمني اللي اتعلمناها في مرحلة الخوارزميات.</div>
    <div class="en">🇬🇧 This solves the problem in a single pass (<code>O(n)</code>) instead of needing a nested loop over every element (<code>O(n²)</code>) — the same time-complexity idea from the Algorithms stage.</div>
</div>

<h2>مشكلة 3: مجموع الصفوف والأعمدة في مصفوفة ثنائية</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>المطلوب:</b> مصفوفة ثنائية الأبعاد (Matrix) — احسب مجموع كل صف، ومجموع كل عمود. <b>التفكير:</b> مجموع الصفوف سهل بـ <code>array_map</code> مع <code>array_sum</code> على كل صف. مجموع الأعمدة محتاج تجميع (Accumulator) لكل عمود بيتحدّث وانت ماشي على كل صف.</div>
    <div class="en">🇬🇧 <b>Task:</b> given a 2D matrix, compute each row's sum and each column's sum. <b>Thinking:</b> row sums are easy with <code>array_map</code> plus <code>array_sum</code> per row. Column sums need one accumulator per column, updated as you walk each row.</div>
</div>
<pre><code>&lt;?php
function rowSums(array $matrix): array {
    return array_map(fn($row) => array_sum($row), $matrix);
}

function colSums(array $matrix): array {
    $sums = array_fill(0, count($matrix[0]), 0);
    foreach ($matrix as $row) {
        foreach ($row as $i => $value) {
            $sums[$i] += $value;
        }
    }
    return $sums;
}

$matrix = [
    [1, 2, 3],
    [4, 5, 6],
    [7, 8, 9],
];

echo "Row sums: " . implode(', ', rowSums($matrix)) . PHP_EOL;
echo "Col sums: " . implode(', ', colSums($matrix)) . PHP_EOL;</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">Row sums: 6, 15, 24
Col sums: 12, 15, 18</div>

<h2>مشكلة 4: عكس نص من غير دوال جاهزة</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>المطلوب:</b> تعكس نص من غير استخدام <code>strrev</code>. <b>التفكير:</b> امشِ من آخر حرف في النص للأول، وابني نص جديد حرف حرف — بالظبط زي ما عملنا في تنفيذ <code>myStrrev</code> قبل كده.</div>
    <div class="en">🇬🇧 <b>Task:</b> reverse a string without using <code>strrev</code>. <b>Thinking:</b> walk from the last character to the first, building a new string one character at a time — exactly what we did implementing <code>myStrrev</code> earlier.</div>
</div>
<pre><code>&lt;?php
function reverseString(string $s): string {
    $result = '';
    for ($i = strlen($s) - 1; $i >= 0; $i--) {
        $result .= $s[$i];
    }
    return $result;
}

echo reverseString("Sila") . PHP_EOL;
echo reverseString("Programming") . PHP_EOL;</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">aliS
gnimmargorP</div>

<h2>مشكلة 5: إزالة التكرار من مصفوفة</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>المطلوب:</b> ترجع مصفوفة جديدة من غير أي قيم مكررة، بنفس ترتيب الظهور الأول. <b>التفكير:</b> ابنِ مصفوفة نتيجة فاضية، وضيف كل عنصر ليها بس لو مش موجود فيها بالفعل.</div>
    <div class="en">🇬🇧 <b>Task:</b> return a new array with no duplicate values, preserving first-appearance order. <b>Thinking:</b> build an empty result array and only add an element if it isn't already in it.</div>
</div>
<pre><code>&lt;?php
function removeDuplicates(array $items): array {
    $result = [];
    foreach ($items as $item) {
        if (!in_array($item, $result)) {
            $result[] = $item;
        }
    }
    return $result;
}

print_r(removeDuplicates([1, 2, 2, 3, 1, 4, 4, 4]));</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">Array
(
    [0] => 1
    [1] => 2
    [2] => 3
    [3] => 4
)</div>
<div class="bi-block">
    <div class="ar">🇪🇬 PHP فيها فعليًا دالة جاهزة <code>array_unique</code> بتعمل نفس الحاجة دي — لكن الهدف هنا إنك تفهم إزاي هي شغالة من جوه.</div>
    <div class="en">🇬🇧 PHP actually has a built-in <code>array_unique</code> that does the same thing — but the goal here is understanding how it works internally.</div>
</div>

<h2>مشكلة 6: الحرف الأكتر تكرارًا في نص</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>المطلوب:</b> تلاقي الحرف اللي اتكرر أكتر عدد مرات في نص. <b>التفكير:</b> ابنِ مصفوفة جمعية (Associative Array) بتخزن كل حرف ومعاه عدد مرات ظهوره، وبعدين رتّبها تنازليًا بـ <code>arsort</code> وخد أول مفتاح.</div>
    <div class="en">🇬🇧 <b>Task:</b> find the most frequently occurring character in a string. <b>Thinking:</b> build an associative array mapping each character to its count, then sort it descending with <code>arsort</code> and take the first key.</div>
</div>
<pre><code>&lt;?php
function mostFrequentChar(string $s): string {
    $counts = [];
    foreach (str_split(strtolower(str_replace(' ', '', $s))) as $ch) {
        $counts[$ch] = ($counts[$ch] ?? 0) + 1;
    }
    arsort($counts);
    return array_key_first($counts);
}

echo mostFrequentChar("programming") . PHP_EOL;
echo mostFrequentChar("hello world") . PHP_EOL;</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">r
l</div>
<div class="bi-block">
    <div class="ar">🇪🇬 العبارة <code>$counts[$ch] ?? 0</code> بتستخدم عامل "Null Coalescing" — معناها "لو المفتاح ده مش موجود، استخدم صفر بدل ما تدي Warning". دي طريقة نظيفة جدًا لعدّ عناصر في PHP.</div>
    <div class="en">🇬🇧 The expression <code>$counts[$ch] ?? 0</code> uses the "Null Coalescing" operator — meaning "if this key doesn't exist, use zero instead of raising a warning." It's a very clean way to count elements in PHP.</div>
</div>

<h2 id="practice">💻 جرّب بنفسك / Try It Yourself</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 المحرر تحت فيه حل Two Sum اللي شفته فوق. جرّب مصفوفات وأرقام مستهدفة مختلفة، وشوف الحالة اللي مفيش فيها حل خالص (بترجع <code>null</code>).</div>
    <div class="en">🇬🇧 The editor below has the Two Sum solution from above. Try different arrays and targets, and see the case where no solution exists at all (returns <code>null</code>).</div>
</div>

<div class="mini-editor-wrap">
    <textarea spellcheck="false">&lt;?php
function findPairWithSum(array $numbers, int $target): ?array {
    $seen = [];
    foreach ($numbers as $n) {
        $complement = $target - $n;
        if (in_array($complement, $seen)) {
            return [$complement, $n];
        }
        $seen[] = $n;
    }
    return null;
}

print_r(findPairWithSum([2, 7, 11, 15], 9));
var_dump(findPairWithSum([1, 2, 3], 100));</textarea>
    <div class="mini-toolbar">
        <button class="mini-run-btn">▶ شغّل / Run</button>
        <span class="mini-status"></span>
    </div>
    <div class="output-box">— لسه متشغلش / not run yet —</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="on">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">إيه تعقيد حل Two Sum بالمصفوفة <code>$seen</code> (مرور واحد)؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What's the time complexity of the one-pass <code>$seen</code> Two Sum solution?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="on"> O(n)</label>
        <label><input type="radio" name="q1" value="on2"> O(n²)</label>
        <label><input type="radio" name="q1" value="ologn"> O(log n)</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="sort">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">في <code>isAnagram</code>، ليه بنرتب حروف الكلمتين قبل المقارنة؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">In <code>isAnagram</code>, why sort each word's letters before comparing?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="sort"> عشان الكلمتين المتناظرتين لفظيًا هيبقوا متطابقين تمامًا بعد الترتيب / true anagrams become identical once sorted</label>
        <label><input type="radio" name="q2" value="speed2"> عشان الكود يشتغل أسرع / to make the code faster</label>
        <label><input type="radio" name="q2" value="required2"> <code>strtolower</code> محتاجة مصفوفة مرتبة / <code>strtolower</code> requires a sorted array</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ ابني Flatten كاملة لمصفوفة ثنائية / Build a Complete 2D Array Flatten</h3>
    <div class="ar">🇪🇬 في <a href="../playground/index.php">محرر الكود</a> (أو المحرر المصغّر فوق)، ابنِ دالة <code>flatten(array $matrix): array</code> تحوّل مصفوفة ثنائية الأبعاد (زي <code>$matrix</code> اللي فوق) لمصفوفة أحادية فيها كل العناصر بترتيب ظهورها. امشِ على كل صف بـ <code>foreach</code>، وجوّاه امشِ على كل عنصر وضيفه لمصفوفة النتيجة.</div>
    <div class="en">🇬🇧 In the <a href="../playground/index.php">Playground</a> (or the mini editor above), build a function <code>flatten(array $matrix): array</code> that turns a 2D array (like <code>$matrix</code> above) into a 1D array containing every element in appearance order. Loop each row with <code>foreach</code>, and inside it, loop each element and append it to a result array.</div>
</div>

<div class="exercise-box">
    <h3>✍️ تمرين إضافي / Extra Exercise</h3>
    <div class="ar">🇪🇬 اكتب دالة تتحقق هل مصفوفتين متطابقتان في القيم بغض النظر عن الترتيب، ودالة تحسب عدد الكلمات في جملة من غير <code>str_word_count</code>.</div>
    <div class="en">🇬🇧 Write a function checking if two arrays have the same values regardless of order, and a function counting words in a sentence without <code>str_word_count</code>.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 نمط "العدّ بمصفوفة جمعية" اللي استخدمناه في مسألة "الحرف الأكتر تكرارًا" هو حرفيًا نفس النمط اللي هتستخدمه في دالة <code>wordFrequency</code> جوه مرحلة "البرامج التطبيقية" (Applications) — نفس الفكرة، على مستوى كلمات بدل حروف.</div>
    <div class="en">🇬🇧 The "counting with an associative array" pattern used in the "most frequent character" problem is literally the same pattern you'll use in the <code>wordFrequency</code> function in the Applications stage — the same idea, at the word level instead of characters.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>مشاكل زي Two Sum بتتحل أسرع بكتير بتتبّع القيم اللي شفتها قبل كده بدل مقارنة كل زوج.</li>
        <li>المصفوفات ثنائية الأبعاد محتاجة تفكير في اتجاهين: صف وعمود.</li>
        <li>مصفوفات جمعية (<code>$counts[$ch]</code>) هي أداة قوية جدًا لأي مسألة "عدّ" أو "تتبّع".</li>
        <li>فهمك لتنفيذ الدوال الجاهزة من المرحلة اللي فاتت بيسهّل حل مشاكل جديدة زي دي.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="data-structures.php">← المرحلة السابقة</a>
    <a href="functions-2.php">المرحلة الجاية / Next: Function Implementation — Advanced →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
