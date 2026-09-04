<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'array-string-functions';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'PHP متوسط — دوال متقدمة على المصفوفات والنصوص';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">Stage 3 · PHP Intermediate</span>
<h1>دوال متقدمة على المصفوفات والنصوص <span class="ltr">Advanced Array &amp; String Functions</span></h1>
<p class="subtitle">array_reduce, usort, array_column, sprintf, وأشهر الدوال اللي بتوفّر عليك loops يدوية. <span class="ltr">array_reduce, usort, array_column, sprintf, and the functions that save you manual loops.</span></p>

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
    <div class="ar">🇪🇬 اتعلمت قبل كده <code>array_map</code> و<code>array_filter</code> في المرحلة الأولى — دلوقتي هنروح أعمق: <code>array_reduce</code> لتلخيص مصفوفة كاملة في قيمة واحدة (زي إجمالي فاتورة)، <code>usort</code> لترتيب مصفوفة بمنطق مخصص إنت بتحدده، <code>array_column</code> لسحب عمود واحد بس من مصفوفة فيها عناصر associative، و<code>sprintf</code>/<code>number_format</code> عشان تطبع أرقام بشكل منسّق زي ما بيظهر في أي تطبيق حقيقي.</div>
    <div class="en">🇬🇧 You already met <code>array_map</code> and <code>array_filter</code> in Stage 1 — this lesson goes deeper: <code>array_reduce</code> to collapse a whole array into a single value (like an invoice total), <code>usort</code> to sort an array with your own custom logic, <code>array_column</code> to pull just one field out of an array of associative arrays, and <code>sprintf</code>/<code>number_format</code> to print numbers formatted the way a real application actually shows them.</div>
</div>

<h2 id="understand">🧠 1) array_reduce — تلخيص مصفوفة في قيمة واحدة / Collapsing an Array into One Value</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <code>array_reduce($array, $callback, $initial)</code> بتمرّ على كل عنصر وبتراكم نتيجة واحدة — الـ Callback بياخد "القيمة المتراكمة لحد دلوقتي" (Carry) والعنصر الحالي، ويرجع القيمة الجديدة المتراكمة. ده أنضف من <code>foreach</code> فيه متغيّر خارجي بتزوّده يدويًا، خصوصًا لما العملية بسيطة زي الجمع.</div>
    <div class="en">🇬🇧 <code>array_reduce($array, $callback, $initial)</code> walks every element and accumulates a single result — the callback receives the "carry" (the accumulated value so far) and the current item, and returns the new accumulated value. It's cleaner than a <code>foreach</code> with a manually-incremented external variable, especially for a simple aggregation like a sum.</div>
</div>

<pre><code>&lt;?php
$cart = [
    ['name' => 'Keyboard', 'price' => 45.50, 'qty' => 1],
    ['name' => 'Mouse',    'price' => 15.00, 'qty' => 2],
    ['name' => 'Monitor',  'price' => 120.00, 'qty' => 1],
];

$total = array_reduce($cart, function (float $carry, array $item): float {
    return $carry + ($item['price'] * $item['qty']);
}, 0.0);

echo "Order total: " . $total . PHP_EOL;

$itemCount = array_reduce($cart, fn($carry, $item) => $carry + $item['qty'], 0);
echo "Total items: $itemCount" . PHP_EOL;</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">Order total: 195.5
Total items: 4</div>

<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ باراميتر <code>0.0</code> الأخير — ده القيمة الابتدائية للـ Carry قبل ما تشوف أي عنصر. لو نسيته، PHP هتستخدم أول عنصر في المصفوفة كقيمة ابتدائية، وده غالبًا مش اللي انت عايزه.</div>
    <div class="en">🇬🇧 Notice the final <code>0.0</code> argument — that's the starting value of the carry before any element is seen. Skip it, and PHP uses the array's first element as the starting value instead, which is rarely what you actually want.</div>
</div>

<h2>2) usort — ترتيب بمنطق مخصص / Sorting with Custom Logic</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <code>sort()</code> العادية بترتب أرقام أو نصوص بسيطة، لكن مش بتعرف إزاي ترتب مصفوفة من الـ arrays (زي منتجات فيها اسم وسعر). <code>usort($array, $comparator)</code> بتاخد Closure بترجع رقم سالب لو العنصر الأول أصغر، موجب لو أكبر، صفر لو متساويين — واختصار عملي لده هو الـ Spaceship Operator <code>&lt;=&gt;</code>.</div>
    <div class="en">🇬🇧 The plain <code>sort()</code> can order simple numbers or strings, but has no idea how to order an array of arrays (like products with a name and price). <code>usort($array, $comparator)</code> takes a closure that returns a negative number if the first item comes first, positive if it comes after, zero if equal — and the practical shortcut for that is the spaceship operator <code>&lt;=&gt;</code>.</div>
</div>

<pre><code>&lt;?php
$products = [
    ['name' => 'Laptop',  'price' => 899.99],
    ['name' => 'Charger', 'price' => 19.99],
    ['name' => 'Backpack','price' => 49.50],
];

usort($products, function (array $a, array $b): int {
    return $a['price'] &lt;=&gt; $b['price'];
});

foreach ($products as $p) {
    echo "{$p['name']}: {$p['price']}" . PHP_EOL;
}

echo PHP_EOL . "-- sorted descending --" . PHP_EOL;
usort($products, fn($a, $b) => $b['price'] &lt;=&gt; $a['price']);
foreach ($products as $p) {
    echo "{$p['name']}: {$p['price']}" . PHP_EOL;
}</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">Charger: 19.99
Backpack: 49.5
Laptop: 899.99

-- sorted descending --
Laptop: 899.99
Backpack: 49.5
Charger: 19.99</div>

<div class="bi-block">
    <div class="ar">🇪🇬 <code>usort</code> بتعدّل المصفوفة الأصلية "بالمكان" (In-place) وبتعيد ترقيم المفاتيح من صفر — لو عندك مفاتيح مهمة (زي IDs) واستخدمتها كـ associative keys، استخدم <code>uasort</code> بدلًا منها عشان تحافظ على المفاتيح.</div>
    <div class="en">🇬🇧 <code>usort</code> modifies the array in place and re-indexes the keys from zero — if your keys matter (like IDs used as associative keys), use <code>uasort</code> instead to preserve them.</div>
</div>

<h2 id="practice">💻 3) array_column — سحب عمود واحد / Extracting One Field</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 لو عندك مصفوفة من الـ users كل واحد فيها associative array، و عايز بس قايمة الإيميلات، مش لازم <code>foreach</code> وتبني مصفوفة جديدة يدويًا — <code>array_column($array, $columnKey)</code> بتعمل ده مباشرة. ولو مررت باراميتر تالت (<code>$indexKey</code>)، هتستخدم عمود تاني كمفتاح للنتيجة — مفيد جدًا لعمل "قاموس" سريع بالـ ID.</div>
    <div class="en">🇬🇧 If you have an array of users, each one an associative array, and you just want the list of emails, you don't need a manual <code>foreach</code> building a new array — <code>array_column($array, $columnKey)</code> does exactly that. Pass a third argument (<code>$indexKey</code>) and it uses another column as the result's key — great for building a quick lookup "dictionary" by ID.</div>
</div>

<pre><code>&lt;?php
$users = [
    ['id' => 1, 'name' => 'Ahmed', 'email' => 'ahmed@example.com'],
    ['id' => 2, 'name' => 'Sara',  'email' => 'sara@example.com'],
    ['id' => 3, 'name' => 'Omar',  'email' => 'omar@example.com'],
];

$emails = array_column($users, 'email');
echo "Emails: " . implode(', ', $emails) . PHP_EOL;

$byId = array_column($users, 'name', 'id');
print_r($byId);</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">Emails: ahmed@example.com, sara@example.com, omar@example.com
Array
(
    [1] => Ahmed
    [2] => Sara
    [3] => Omar
)</div>

<h2>4) sprintf و number_format — تنسيق الأرقام / Formatting Numbers</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 لما تطبع سعر أو رقم كبير، محتاج تنسيق ثابت — مش أوقات <code>19.9</code> وأوقات <code>19.90</code>. <code>sprintf("%.2f", $n)</code> بترجع نص برقمين عشريين دايمًا. <code>number_format($n, $decimals)</code> بتعمل نفس الحاجة، وكمان بتضيف فواصل الآلاف (زي <code>1,234,567.89</code>) — مفيدة جدًا لأي رقم كبير هيتعرض للمستخدم.</div>
    <div class="en">🇬🇧 When printing a price or a large number, you need consistent formatting — not sometimes <code>19.9</code> and sometimes <code>19.90</code>. <code>sprintf("%.2f", $n)</code> always returns a string with exactly two decimal places. <code>number_format($n, $decimals)</code> does the same, plus it adds thousands separators (like <code>1,234,567.89</code>) — very useful for any large number shown to a user.</div>
</div>

<pre><code>&lt;?php
$price = 19.9;
$big = 1234567.891;

echo sprintf("Price: $%.2f", $price) . PHP_EOL;
echo "Price (number_format): $" . number_format($price, 2) . PHP_EOL;
echo "Big number: " . number_format($big, 2) . PHP_EOL;
echo sprintf("%-10s | %8s", "Item", "Price") . PHP_EOL;
echo sprintf("%-10s | %8s", "Keyboard", "$45.50") . PHP_EOL;</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">Price: $19.90
Price (number_format): $19.90
Big number: 1,234,567.89
Item       |    Price
Keyboard   |   $45.50</div>

<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ <code>%-10s</code> (نص بمحاذاة لليسار في عرض 10 خانات) مقابل <code>%8s</code> (محاذاة لليمين في عرض 8 خانات) — <code>sprintf</code> مش بس للأرقام، ده أداة عامة لبناء جداول نصية منظّمة في التيرمينال أو أي مكان تحتاج فيه محاذاة ثابتة.</div>
    <div class="en">🇬🇧 Notice <code>%-10s</code> (left-aligned in a 10-character width) versus <code>%8s</code> (right-aligned in an 8-character width) — <code>sprintf</code> isn't just for numbers, it's a general tool for building aligned text tables in a terminal or anywhere you need consistent spacing.</div>
</div>

<div class="bi-block">
    <div class="ar">🇪🇬 جرّب الكود ده بنفسك في المحرر تحت — غيّر أسعار الكارت، زوّد منتج، أو جرّب <code>array_column</code> بعمود تاني.</div>
    <div class="en">🇬🇧 Try this code yourself in the editor below — change the cart's prices, add a product, or try <code>array_column</code> with a different field.</div>
</div>

<div class="mini-editor-wrap">
    <textarea spellcheck="false">&lt;?php
$cart = [
    ['name' => 'Keyboard', 'price' => 45.50, 'qty' => 1],
    ['name' => 'Mouse',    'price' => 15.00, 'qty' => 2],
    ['name' => 'Monitor',  'price' => 120.00, 'qty' => 1],
];

$total = array_reduce($cart, fn($carry, $item) => $carry + ($item['price'] * $item['qty']), 0.0);
echo "Order total: " . number_format($total, 2) . PHP_EOL;

usort($cart, fn($a, $b) => $b['price'] &lt;=&gt; $a['price']);
foreach ($cart as $item) {
    echo sprintf("%-10s $%6.2f", $item['name'], $item['price']) . PHP_EOL;
}

$names = array_column($cart, 'name');
echo "Items (most expensive first): " . implode(', ', $names) . PHP_EOL;

// جرّب تضيف منتج جديد للكارت أو تغيّر الكمية وشوف الإجمالي بيتغيّر إزاي
</textarea>
    <div class="mini-toolbar">
        <button class="mini-run-btn">▶ شغّل / Run</button>
        <span class="mini-status"></span>
    </div>
    <div class="output-box">— لسه متشغلش / not run yet —</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="sum">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">إيه اللي بيرجعه <code>array_reduce</code>؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What does <code>array_reduce</code> return?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="array"> مصفوفة جديدة بنفس عدد العناصر</label>
        <label><input type="radio" name="q1" value="sum"> قيمة واحدة متراكمة من كل العناصر</label>
        <label><input type="radio" name="q1" value="bool"> true أو false بس</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="spaceship">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">جوه الـ Comparator اللي بتمرره لـ <code>usort</code>، إيه أسهل طريقة تقارن بيها رقمين؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Inside the comparator passed to <code>usort</code>, what's the easiest way to compare two numbers?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="spaceship"> Spaceship Operator <code>&lt;=&gt;</code></label>
        <label><input type="radio" name="q2" value="equals"> عامل المساواة <code>==</code></label>
        <label><input type="radio" name="q2" value="concat"> عامل الدمج <code>.</code></label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="one">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">في مثال <code>array_column($users, 'name', 'id')</code>، إيه اللي بيتحط كمفتاح لكل عنصر في النتيجة؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">In <code>array_column($users, 'name', 'id')</code>, what becomes the key of each element in the result?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="zero"> ترقيم تلقائي من صفر (0, 1, 2)</label>
        <label><input type="radio" name="q3" value="one"> قيمة عمود الـ <code>id</code></label>
        <label><input type="radio" name="q3" value="name"> قيمة عمود الـ <code>name</code></label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="fixed">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">ليه نستخدم <code>number_format()</code> أو <code>sprintf("%.2f", ...)</code> بدل ما نطبع الـ float مباشرة؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Why use <code>number_format()</code> or <code>sprintf("%.2f", ...)</code> instead of printing the float directly?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="fixed"> عشان تضمن عدد ثابت من الخانات العشرية دايمًا (زي 19.90 مش 19.9)</label>
        <label><input type="radio" name="q4" value="faster"> عشان تخلي الكود أسرع في التنفيذ</label>
        <label><input type="radio" name="q4" value="int"> عشان تحوّل الرقم لـ integer</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ تقرير مبيعات / A Sales Report</h3>
    <div class="ar">🇪🇬 في <a href="../playground/index.php">محرر الكود</a> (أو المحرر المصغّر فوق): اعمل مصفوفة من 5 طلبات، كل واحدة فيها <code>customer</code> و<code>total</code>. استخدم <code>array_reduce</code> عشان تحسب إجمالي كل المبيعات، استخدم <code>usort</code> عشان ترتبهم من الأكبر للأصغر، استخدم <code>array_column</code> عشان تجيب أسماء العملاء بس، وأخيرًا اطبع كل طلب بـ <code>sprintf</code> بحيث السعر يظهر بخانتين عشريين دايمًا.</div>
    <div class="en">🇬🇧 In the <a href="../playground/index.php">Playground</a> (or the mini editor above): build an array of 5 orders, each with a <code>customer</code> and a <code>total</code>. Use <code>array_reduce</code> to compute the grand total, <code>usort</code> to sort them highest-to-lowest, <code>array_column</code> to pull just the customer names, and finally print each order with <code>sprintf</code> so the price always shows two decimal places.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 كل الدوال دي بتاخد دالة تانية كباراميتر (الـ Callback اللي مرّرته لـ <code>array_reduce</code> أو <code>usort</code>) — الدرس الجاي هياخدك خطوة لجوّه بالظبط في المفهوم ده: <code>Closures</code> و<code>Callbacks</code>، وإزاي دالة تقدر "تتذكر" متغيّر من بيئتها.</div>
    <div class="en">🇬🇧 Every function here takes another function as a parameter (the callback you passed to <code>array_reduce</code> or <code>usort</code>) — the next lesson goes one level deeper into exactly that idea: <code>Closures</code> and <code>Callbacks</code>, and how a function can "remember" a variable from its environment.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li><code>array_reduce($array, $callback, $initial)</code> بيلخّص مصفوفة كاملة في قيمة واحدة (زي إجمالي فاتورة).</li>
        <li><code>usort($array, $comparator)</code> بيرتّب بمنطق مخصص، عادة بالـ Spaceship Operator <code>&lt;=&gt;</code> — وبيعيد ترقيم المفاتيح.</li>
        <li><code>array_column($array, $column, $indexKey)</code> بيسحب عمود واحد، مع إمكانية استخدام عمود تاني كمفتاح.</li>
        <li><code>sprintf</code> و<code>number_format</code> بيضمنوا تنسيق ثابت للأرقام بدل الاعتماد على تحويل PHP التلقائي للـ float.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="../index.php">← لوحة التحكم / Dashboard</a>
    <a href="closures-callbacks.php">الدرس الجاي / Next: Closures &amp; Callbacks →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
