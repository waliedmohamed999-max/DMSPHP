<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'stage1';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'المرحلة 1 — أساسيات اللغة';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">المرحلة 1 / Stage 1</span>
<h1>أساسيات اللغة <span class="ltr">PHP Fundamentals</span></h1>
<p class="subtitle">أساسيات PHP الكاملة: المتغيرات والأنواع، هياكل التحكم، المصفوفات، النصوص، والدوال — كل موضوع بشرح، كود، وناتج فعلي.</p>

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
    <div class="ar">🇪🇬 تفهم إزاي PHP بتخزن البيانات، تتحكم في تدفق الكود بالشروط والحلقات، تتعامل مع المصفوفات والنصوص بأشهر الدوال المستخدمة، وتكتب دوال منظمة بمدخلات ومخرجات واضحة.</div>
    <div class="en">🇬🇧 Understand how PHP stores data, control code flow with conditionals and loops, work with arrays and strings using the most common functions, and write well-organized functions with clear inputs and outputs.</div>
</div>

<h2 id="understand">🧠 1) المتغيرات والأنواع / Variables &amp; Types</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 المتغير في PHP بيبدأ دايمًا بعلامة <code>$</code>. PHP لغة "Dynamically Typed" — مش لازم تحدد نوع المتغير مقدمًا زي C أو Java، النوع بيتحدد أوتوماتيك من القيمة. الأنواع الأساسية: <code>string</code>, <code>int</code>, <code>float</code>, <code>bool</code>, <code>array</code>, <code>null</code>.</div>
    <div class="en">🇬🇧 A variable always starts with <code>$</code>. PHP is dynamically typed — no upfront type declaration like C or Java; the type is inferred from the value. Basic types: <code>string</code>, <code>int</code>, <code>float</code>, <code>bool</code>, <code>array</code>, <code>null</code>.</div>
</div>
<div class="bi-block">
    <div class="ar">🇪🇬 "Type Juggling" معناها إن PHP بتحوّل النوع أوتوماتيك وقت الحاجة — زي جمع رقم مع نص شكله رقم. مفيد بس ممكن يسبب مفاجآت لو مش منتبه.</div>
    <div class="en">🇬🇧 "Type Juggling" means PHP auto-converts types when needed — like adding a number to a numeric-looking string. Useful, but can surprise you if you're not careful.</div>
</div>

<pre><code>&lt;?php
$name = "Waleed";
$age = 25;
$price = 19.99;
$isStudent = true;

echo "Name: $name" . PHP_EOL;
echo "Age: $age (" . gettype($age) . ")" . PHP_EOL;
echo "Price: $price (" . gettype($price) . ")" . PHP_EOL;

$ageAsString = "25";
$sum = $ageAsString + 5;
echo "Type juggling: '25' + 5 = $sum (" . gettype($sum) . ")" . PHP_EOL;</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">Name: Waleed
Age: 25 (integer)
Price: 19.99 (double)
Type juggling: '25' + 5 = 30 (integer)</div>

<h2>2) هياكل التحكم / Control Structures</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <code>if/elseif/else</code> بتاخد قرار حسب شرط. <code>match</code> (نسخة حديثة وأنضف من <code>switch</code>) بتقارن قيمة بعدة احتمالات وترجع نتيجة مباشرة. الحلقات <code>for</code>, <code>while</code>, <code>foreach</code> بتكرر تنفيذ كود — <code>foreach</code> هي الأكتر استخدامًا مع المصفوفات.</div>
    <div class="en">🇬🇧 <code>if/elseif/else</code> makes decisions based on a condition. <code>match</code> (a cleaner, modern alternative to <code>switch</code>) compares a value against several cases and returns a result directly. Loops <code>for</code>, <code>while</code>, <code>foreach</code> repeat code — <code>foreach</code> is the most-used one with arrays.</div>
</div>

<pre><code>&lt;?php
$score = 78;

if ($score >= 90) {
    $grade = 'A';
} elseif ($score >= 75) {
    $grade = 'B';
} else {
    $grade = 'C';
}
echo "Grade: $grade" . PHP_EOL;

// match — أنضف من switch ومفيش "fall-through"
$grade2 = match (true) {
    $score >= 90 => 'A',
    $score >= 75 => 'B',
    default => 'C',
};
echo "Grade (match): $grade2" . PHP_EOL;

for ($i = 1; $i <= 3; $i++) {
    echo "for loop: $i" . PHP_EOL;
}

$i = 0;
while ($i < 3) {
    echo "while loop: $i" . PHP_EOL;
    $i++;
}</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">Grade: B
Grade (match): B
for loop: 1
for loop: 2
for loop: 3
while loop: 0
while loop: 1
while loop: 2</div>

<h2 id="practice">💻 3) المصفوفات / Arrays</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 مصفوفة <b>Indexed</b> بتستخدم أرقام كمفاتيح تلقائيًا (0, 1, 2...). مصفوفة <b>Associative</b> بتستخدم مفاتيح نصية انت بتحددها. الدوال زي <code>array_map</code> (تطبّق دالة على كل عنصر) و<code>array_filter</code> (تفلتر حسب شرط) بتخليك تتعامل مع المصفوفات من غير ما تكتب loop يدوي.</div>
    <div class="en">🇬🇧 An <b>indexed</b> array uses automatic numeric keys (0, 1, 2...). An <b>associative</b> array uses string keys you define. Functions like <code>array_map</code> (apply a function to every element) and <code>array_filter</code> (filter by a condition) let you process arrays without a manual loop.</div>
</div>

<pre><code>&lt;?php
$fruits = ["apple", "banana", "mango"]; // Indexed
$book = ["title" => "Clean Code", "price" => 45.99]; // Associative

foreach ($fruits as $i => $fruit) {
    echo ($i + 1) . ") $fruit" . PHP_EOL;
}
echo "Book: {$book['title']} - \${$book['price']}" . PHP_EOL;

$prices = [10, 25, 40, 55];
$withTax = array_map(fn($p) => $p * 1.14, $prices);
$expensive = array_filter($prices, fn($p) => $p > 20);

echo "With tax: " . implode(', ', $withTax) . PHP_EOL;
echo "Expensive (>20): " . implode(', ', $expensive) . PHP_EOL;
echo "Count: " . count($prices) . PHP_EOL;</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">1) apple
2) banana
3) mango
Book: Clean Code - $45.99
With tax: 11.4, 28.5, 45.6, 62.7
Expensive (>20): 25, 40, 55
Count: 4</div>

<div class="bi-block">
    <div class="ar">🇪🇬 جرّب الكود ده بنفسك في المحرر تحت — عدّل الأسعار أو زوّد فاكهة جديدة وشوف الناتج بيتغيّر إزاي.</div>
    <div class="en">🇬🇧 Try this code yourself in the editor below — tweak the prices or add a new fruit and see how the output changes.</div>
</div>

<div class="mini-editor-wrap">
    <textarea spellcheck="false">&lt;?php
$fruits = ["apple", "banana", "mango"]; // Indexed
$book = ["title" => "Clean Code", "price" => 45.99]; // Associative

foreach ($fruits as $i => $fruit) {
    echo ($i + 1) . ") $fruit" . PHP_EOL;
}
echo "Book: {$book['title']} - \${$book['price']}" . PHP_EOL;

$prices = [10, 25, 40, 55];
$withTax = array_map(fn($p) => $p * 1.14, $prices);
$expensive = array_filter($prices, fn($p) => $p > 20);

echo "With tax: " . implode(', ', $withTax) . PHP_EOL;
echo "Expensive (>20): " . implode(', ', $expensive) . PHP_EOL;
echo "Count: " . count($prices) . PHP_EOL;</textarea>
    <div class="mini-toolbar">
        <button class="mini-run-btn">▶ شغّل / Run</button>
        <span class="mini-status"></span>
    </div>
    <div class="output-box">— لسه متشغلش / not run yet —</div>
</div>

<h2>4) النصوص / Strings</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 فيه طريقتين لدمج نص: <code>.</code> (Concatenation) أو كتابة المتغير جوه <code>"..."</code> مباشرة (Interpolation) — الشكل التاني أوضح غالبًا. أشهر دوال النصوص: <code>strlen</code> (الطول), <code>str_replace</code> (استبدال), <code>explode/implode</code> (تقسيم/دمج), <code>trim</code> (إزالة الفراغات), <code>strtoupper/strtolower</code>.</div>
    <div class="en">🇬🇧 Two ways to combine strings: <code>.</code> (Concatenation) or writing the variable directly inside <code>"..."</code> (Interpolation) — usually clearer. Common string functions: <code>strlen</code>, <code>str_replace</code>, <code>explode/implode</code>, <code>trim</code>, <code>strtoupper/strtolower</code>.</div>
</div>

<pre><code>&lt;?php
$first = "Clean";
$second = "Code";

$concat = $first . " " . $second;
$interpolated = "$first $second";

echo $concat . PHP_EOL;
echo $interpolated . PHP_EOL;
echo "Length: " . strlen($concat) . PHP_EOL;
echo str_replace("Clean", "Messy", $concat) . PHP_EOL;

$csv = "php, mysql, javascript";
$parts = explode(", ", $csv);
echo "Parts: " . implode(" | ", $parts) . PHP_EOL;
echo strtoupper(trim("  hello  ")) . PHP_EOL;</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">Clean Code
Clean Code
Length: 10
Messy Code
Parts: php | mysql | javascript
HELLO</div>

<h2>5) الدوال / Functions</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 الدالة بتاخد مدخلات (Parameters) وبترجع مخرج (Return). في PHP الحديثة، تقدر تحدد نوع كل Parameter ونوع الـ Return عشان الكود يبقى أوضح ويمنع أخطاء. الـ "Arrow Functions" (<code>fn</code>) هي شكل مختصر لدوال بسطر واحد.</div>
    <div class="en">🇬🇧 A function takes Parameters and returns a value. In modern PHP, you can type-hint each Parameter and the Return type to make code clearer and catch mistakes. "Arrow Functions" (<code>fn</code>) are a shorthand for one-line functions.</div>
</div>

<pre><code>&lt;?php
function greet(string $name, string $greeting = "Hello"): string {
    return "$greeting, $name!";
}

echo greet("Waleed") . PHP_EOL;
echo greet("Sara", "Welcome") . PHP_EOL;

// Arrow function — نفس فكرة fn($p) => $p * 1.14 اللي استخدمناها فوق
$square = fn(int $n): int => $n * $n;
echo "Square of 5: " . $square(5) . PHP_EOL;

function sumAll(int ...$numbers): int {
    return array_sum($numbers);
}
echo "Sum: " . sumAll(1, 2, 3, 4) . PHP_EOL;</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">Hello, Waleed!
Welcome, Sara!
Square of 5: 25
Sum: 10</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="integer">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">حسب مثال Type Juggling فوق، <code>"25" + 5</code> بترجع 30 من نوع إيه؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Based on the Type Juggling example above, <code>"25" + 5</code> returns 30 of what type?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="string"> string</label>
        <label><input type="radio" name="q1" value="integer"> integer</label>
        <label><input type="radio" name="q1" value="double"> double</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="filter">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">عايز تاخد من مصفوفة أسعار بس اللي أكبر من 20، أنهي دالة الأنسب؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">To keep only prices above 20 from an array, which function fits?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="map"> array_map</label>
        <label><input type="radio" name="q2" value="filter"> array_filter</label>
        <label><input type="radio" name="q2" value="sum"> array_sum</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ نظام تقييم طلبة / A Student Grading System</h3>
    <div class="ar">🇪🇬 في <a href="../playground/index.php">محرر الكود</a> (أو المحرر المصغّر فوق): اعمل مصفوفة associative فيها 5 طلبة ودرجاتهم، استخدم <code>match</code> جوه دالة <code>gradeFor(int $score): string</code> ترجع الحرف المناسب (A/B/C/F)، وبعدين استخدم <code>array_map</code> عشان تطبع كل طالب مع تقديره جنب اسمه.</div>
    <div class="en">🇬🇧 In the <a href="../playground/index.php">Playground</a> (or the mini editor above): build an associative array of 5 students and their scores, use <code>match</code> inside a <code>gradeFor(int $score): string</code> function returning the right letter grade (A/B/C/F), then use <code>array_map</code> to print each student next to their grade.</div>
</div>

<div class="exercise-box">
    <h3>✍️ تمرين إضافي / Extra Exercise</h3>
    <div class="ar">🇪🇬 في <a href="../playground/index.php">محرر الكود</a>: اعمل مصفوفة associative لـ 3 منتجات (اسم وسعر لكل واحد)، استخدم <code>foreach</code> تطبع كل منتج، استخدم <code>array_filter</code> تجيب المنتجات اللي سعرها أكتر من رقم معيّن، واكتب دالة <code>formatPrice(float $price): string</code> ترجع السعر بصيغة <code>"$19.99"</code>.</div>
    <div class="en">🇬🇧 In the <a href="../playground/index.php">Playground</a>: create an associative array of 3 products (name and price each), use <code>foreach</code> to print each one, use <code>array_filter</code> to get products above a certain price, and write a <code>formatPrice(float $price): string</code> function returning <code>"$19.99"</code>-style output.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 المهارات دي مش نظرية — كل منطق التحقق من المهام في مشروع Task Manager (زي "هل العنوان فاضي؟" أو "اعرض بس المهام اللي لسه مش خلصت") مبني على نفس الشروط، الحلقات، المصفوفات، والدوال اللي اتعلمتها هنا.</div>
    <div class="en">🇬🇧 These skills aren't theory — every piece of task-validation logic in the Capstone Task Manager (like "is the title empty?" or "show only unfinished tasks") is built on exactly the conditionals, loops, arrays, and functions you learned here.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>المتغيرات بتبدأ بـ <code>$</code>، والنوع بيتحدد أوتوماتيك (Dynamically Typed) مع Type Juggling وقت الحاجة.</li>
        <li>هياكل التحكم: <code>if/elseif/else</code>, <code>match</code>, <code>for</code>, <code>while</code>, <code>foreach</code>.</li>
        <li>مصفوفات Indexed (مفاتيح رقمية) وAssociative (مفاتيح نصية)، مع <code>array_map</code>/<code>array_filter</code> بدل loops يدوية.</li>
        <li>نصوص: Concatenation (<code>.</code>) مقابل Interpolation (<code>"$var"</code>)، ودوال زي <code>explode/implode</code>, <code>trim</code>, <code>str_replace</code>.</li>
        <li>الدوال بتاخد Parameters بأنواع محددة وترجع Return type واضح، والـ Arrow Functions (<code>fn</code>) اختصار للدوال البسيطة.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="tools.php">← المرحلة السابقة</a>
    <a href="stage2.php">المرحلة الجاية / Next: OOP in PHP →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
