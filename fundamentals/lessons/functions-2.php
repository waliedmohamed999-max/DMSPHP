<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'functions-2';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'تنفيذ الدوال الجاهزة — المستوى المتقدم';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">المرحلة 8 / Stage 8</span>
<h1>تنفيذ الدوال الجاهزة — المستوى المتقدم <span class="ltr">Function Implementation — Advanced</span></h1>
<p class="subtitle">في المرحلة اللي فاتت نفّذنا دوال بسيطة بترجع قيمة واحدة. دلوقتي هنتعامل مع نوع مختلف من الدوال الجاهزة: دوال بتاخد <b>دالة تانية</b> كمدخل (Callback) وتستخدمها على كل عنصر في مصفوفة — <code>array_map</code>، <code>array_filter</code>، و<code>array_reduce</code>.</p>

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
    <div class="ar">🇪🇬 تفهم إزاي الدوال ممكن "تاخد دوال" كمدخلات (مفهوم اسمه Higher-Order Functions)، وتشوف إن التلاتة دوال دول بيعتمدوا على نفس الفكرة الأساسية: حلقة + دالة بتتنفذ على كل عنصر.</div>
    <div class="en">🇬🇧 Understand how functions can accept other functions as inputs (a concept called Higher-Order Functions), and see that all three built-ins rely on the same core idea: a loop plus a function applied to each element.</div>
</div>

<div class="flow-diagram">
    <div class="flow-box">array_map: transform each</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">array_filter: keep some</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">array_reduce: collapse to one value</div>
</div>

<h2 id="understand">1) تحويل كل عنصر — <span class="ltr">myArrayMap() vs array_map()</span></h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <code>array_map</code> بتاخد دالة ومصفوفة، وترجع مصفوفة جديدة كل عنصر فيها هو نتيجة تطبيق الدالة على العنصر المقابل في الأصلية. المفتاح: بدل ما نكرر نفس الحلقة لكل نوع تحويل، بنمرر "إيه اللي هيتعمل" كدالة.</div>
    <div class="en">🇬🇧 <code>array_map</code> takes a function and an array, returning a new array where each element is the result of applying that function to the corresponding original element. The key: instead of repeating the same loop for every kind of transformation, we pass "what to do" as a function.</div>
</div>
<pre><code>&lt;?php
function myArrayMap(callable $fn, array $items): array {
    $result = [];
    foreach ($items as $key => $value) {
        $result[$key] = $fn($value);
    }
    return $result;
}

$numbers = [1, 2, 3, 4];
$double = fn($n) => $n * 2;

print_r(myArrayMap($double, $numbers));
print_r(array_map($double, $numbers));</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">Array
(
    [0] => 2
    [1] => 4
    [2] => 6
    [3] => 8
)
Array
(
    [0] => 2
    [1] => 4
    [2] => 6
    [3] => 8
)</div>
<div class="bi-block">
    <div class="ar">🇪🇬 <code>fn($n) => $n * 2</code> هي "Arrow Function" — طريقة مختصرة لكتابة دالة صغيرة في سطر واحد. هنتعمق فيها وفي أخواتها في المرحلة الجاية.</div>
    <div class="en">🇬🇧 <code>fn($n) => $n * 2</code> is an "Arrow Function" — a shorthand way to write a small one-line function. We'll dive deeper into these and their relatives in the next stage.</div>
</div>

<h2>2) فلترة العناصر — <span class="ltr">myArrayFilter() vs array_filter()</span></h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <code>array_filter</code> بتاخد دالة "شرط" (بترجع true/false) وترجع مصفوفة جديدة فيها بس العناصر اللي الشرط اتحقق معاها. مختلفة عن <code>array_map</code>: هنا العدد بيقل، مش القيم بس اللي بتتغير.</div>
    <div class="en">🇬🇧 <code>array_filter</code> takes a "predicate" function (returns true/false) and returns a new array containing only elements that pass. Unlike <code>array_map</code>, the count shrinks — values don't just change.</div>
</div>
<pre><code>&lt;?php
function myArrayFilter(callable $fn, array $items): array {
    $result = [];
    foreach ($items as $key => $value) {
        if ($fn($value)) {
            $result[$key] = $value;
        }
    }
    return $result;
}

$numbers = [1, 2, 3, 4, 5, 6, 7, 8];
$isEven = fn($n) => $n % 2 === 0;

print_r(myArrayFilter($isEven, $numbers));
print_r(array_filter($numbers, $isEven));</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">Array
(
    [1] => 2
    [3] => 4
    [5] => 6
    [7] => 8
)
Array
(
    [1] => 2
    [3] => 4
    [5] => 6
    [7] => 8
)</div>
<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ إن المفاتيح (Keys) الأصلية اتحافظ عليها (1, 3, 5, 7) بدل ما تتبدأ من صفر تاني — ده سلوك <code>array_filter</code> الحقيقي فعلًا، ونفّذناه بالظبط بنفس الطريقة.</div>
    <div class="en">🇬🇧 Notice the original keys (1, 3, 5, 7) are preserved instead of restarting from zero — that's real <code>array_filter</code>'s actual behavior, and we replicated it exactly.</div>
</div>

<h2>3) تجميع لقيمة واحدة — <span class="ltr">myArrayReduce() vs array_reduce()</span></h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <code>array_reduce</code> هي الأعقد من التلاتة: بتاخد دالة "دمج" ومصفوفة وقيمة ابتدائية، وبتمشي على المصفوفة عنصر عنصر وهي بتحدّث "قيمة مجمّعة" (Accumulator) بنفس منطق دالة الدمج، لحد ما توصل لقيمة نهائية واحدة.</div>
    <div class="en">🇬🇧 <code>array_reduce</code> is the most complex of the three: it takes a "combining" function, an array, and an initial value, walking the array while updating an accumulator using the combiner's logic, until it reaches one final value.</div>
</div>
<pre><code>&lt;?php
function myArrayReduce(callable $fn, array $items, $initial = null) {
    $accumulator = $initial;
    foreach ($items as $value) {
        $accumulator = $fn($accumulator, $value);
    }
    return $accumulator;
}

$numbers = [1, 2, 3, 4, 5];
$sum = fn($carry, $item) => $carry + $item;

echo "myArrayReduce: " . myArrayReduce($sum, $numbers, 0) . PHP_EOL;
echo "array_reduce:  " . array_reduce($numbers, $sum, 0) . PHP_EOL;</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">myArrayReduce: 15
array_reduce:  15</div>
<div class="bi-block">
    <div class="ar">🇪🇬 اسم <code>$carry</code> هنا هو القيمة المتراكمة لحد اللحظة دي، و<code>$item</code> هو العنصر الحالي. <code>array_reduce</code> قوية جدًا — ممكن تستخدمها تعمل بيها حتى <code>array_map</code> أو <code>array_filter</code> لو حبيت، لأنها في الأساس "الدالة الأم" اللي بتلخّص مصفوفة لقيمة واحدة.</div>
    <div class="en">🇬🇧 <code>$carry</code> is the value accumulated so far, and <code>$item</code> is the current element. <code>array_reduce</code> is remarkably powerful — you could even build <code>array_map</code> or <code>array_filter</code> on top of it, since it's fundamentally the "parent function" that collapses an array into one value.</div>
</div>

<h2 id="practice">💻 جرّب بنفسك / Try It Yourself</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 المحرر تحت فيه <code>myArrayReduce</code> اللي شفتها فوق بتجمع مصفوفة أرقام. جرّب تغيّر دالة الدمج <code>$sum</code> لحاجة تانية (زي ضرب بدل جمع) وشوف الناتج بيتغيّر إزاي.</div>
    <div class="en">🇬🇧 The editor below has <code>myArrayReduce</code> from above, summing an array. Try changing the combining function <code>$sum</code> to something else (like multiplication instead of addition) and see how the result changes.</div>
</div>

<div class="mini-editor-wrap">
    <textarea spellcheck="false">&lt;?php
function myArrayReduce(callable $fn, array $items, $initial = null) {
    $accumulator = $initial;
    foreach ($items as $value) {
        $accumulator = $fn($accumulator, $value);
    }
    return $accumulator;
}

$numbers = [1, 2, 3, 4, 5];
$sum = fn($carry, $item) => $carry + $item;

echo "myArrayReduce: " . myArrayReduce($sum, $numbers, 0) . PHP_EOL;
echo "array_reduce:  " . array_reduce($numbers, $sum, 0) . PHP_EOL;</textarea>
    <div class="mini-toolbar">
        <button class="mini-run-btn">▶ شغّل / Run</button>
        <span class="mini-status"></span>
    </div>
    <div class="output-box">— لسه متشغلش / not run yet —</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="filter">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">أنهي دالة من التلاتة بتقلل عدد عناصر المصفوفة (مش بس تغيّر قيمها)؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Which of the three functions can reduce the array's element count (not just change values)?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="map"> array_map</label>
        <label><input type="radio" name="q1" value="filter"> array_filter</label>
        <label><input type="radio" name="q1" value="reduce"> array_reduce يفضّل نفس العدد / array_reduce keeps the same count</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="hof">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">إيه اسم المفهوم اللي بيوصف دالة بتاخد دالة تانية كمدخل؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What's the concept called when a function accepts another function as input?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="hof"> Higher-Order Functions</label>
        <label><input type="radio" name="q2" value="closure"> Closures</label>
        <label><input type="radio" name="q2" value="static"> Static Variables</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ استخدم reduce تلاقي أكبر رقم / Use Reduce to Find the Maximum</h3>
    <div class="ar">🇪🇬 في <a href="../playground/index.php">محرر الكود</a> (أو المحرر المصغّر فوق)، استخدم <code>myArrayReduce</code> بتاعتك عشان تلاقي أكبر رقم في مصفوفة — بدل ما تجمع، اكتب دالة دمج بتقارن <code>$carry</code> بـ <code>$item</code> وترجع الأكبر بينهم. ده هيوريك إزاي <code>reduce</code> أقوى بكتير من مجرد الجمع.</div>
    <div class="en">🇬🇧 In the <a href="../playground/index.php">Playground</a> (or the mini editor above), use your own <code>myArrayReduce</code> to find the maximum in an array — instead of summing, write a combining function comparing <code>$carry</code> to <code>$item</code> and returning the larger. This shows how much more powerful <code>reduce</code> is than plain summing.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <code>array_map</code>، <code>array_filter</code>، و<code>array_reduce</code> مش هتظهر بكودهم الحرفي في المشاريع الصغيرة اللي جاية في مرحلة "البرامج التطبيقية" (زي <code>TodoList</code> والآلة الحاسبة)، لكن نفس فكرة "تمرير سلوك كمدخل لدالة" هي أساس أي كود PHP احترافي هتقابله بعد كده، خصوصًا في مسارات زي الباك إند.</div>
    <div class="en">🇬🇧 <code>array_map</code>, <code>array_filter</code>, and <code>array_reduce</code> won't appear verbatim in the small Applications-stage projects (like <code>TodoList</code> and the calculator), but the same idea of "passing behavior as an input to a function" underlies virtually all professional PHP code you'll encounter afterward, especially in tracks like Back-End.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>دوال بتاخد دوال تانية كمدخلات (Callbacks) بتسمى Higher-Order Functions.</li>
        <li><code>array_map</code>: يحوّل كل عنصر، نفس العدد يفضل.</li>
        <li><code>array_filter</code>: يبقي بس العناصر اللي حققت شرط معين، العدد بيقل.</li>
        <li><code>array_reduce</code>: يلخّص المصفوفة كلها لقيمة واحدة نهائية.</li>
        <li>التلاتة دوال دول بيعتمدوا على نفس الأساس: حلقة + دالة بتتنفذ على كل عنصر.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="problem-solving-3.php">← المرحلة السابقة</a>
    <a href="deep-dive.php">المرحلة الجاية / Next: Language Deep Dive →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
