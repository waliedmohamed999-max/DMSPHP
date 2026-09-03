<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'algorithms';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'الخوارزميات';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">المرحلة 5 / Stage 5</span>
<h1>الخوارزميات <span class="ltr">Algorithms</span></h1>
<p class="subtitle">الخوارزمية (Algorithm) هي ببساطة "خطوات مرتبة لحل مشكلة" — زي وصفة طبخ لكن للكمبيوتر. هنشوف تلات خوارزميات كلاسيكية جدًا: البحث الخطي، البحث الثنائي، وترتيب فقاعي، وهنفهم ليه بعضها أسرع من بعض بمصطلح اسمه "التعقيد الزمني".</p>

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
    <div class="ar">🇪🇬 تفرّق بين طرق مختلفة لحل نفس المشكلة، وتفهم إزاي تقيس "كفاءة" خوارزمية من غير ما تشغّلها فعليًا — دي مهارة أساسية في أي مقابلة شغل برمجة.</div>
    <div class="en">🇬🇧 Distinguish between different ways to solve the same problem, and understand how to measure an algorithm's "efficiency" without actually running it — a core skill in any programming job interview.</div>
</div>

<h2 id="understand">1) البحث الخطي <span class="ltr">Linear Search</span></h2>
<div class="bi-block">
    <div class="ar">🇪🇬 أبسط طريقة بحث: تفتش عنصر عنصر من الأول للآخر لحد ما تلاقي اللي بتدور عليه. بتشتغل مع أي مصفوفة، مرتبة أو مش مرتبة، لكنها ممكن تكون بطيئة مع مصفوفات كبيرة جدًا.</div>
    <div class="en">🇬🇧 The simplest search: check elements one by one from start to end until you find what you're looking for. It works on any array, sorted or not, but can be slow on very large arrays.</div>
</div>
<pre><code>&lt;?php
function linearSearch(array $items, $target): int {
    for ($i = 0; $i < count($items); $i++) {
        if ($items[$i] === $target) {
            return $i;
        }
    }
    return -1;
}

$numbers = [8, 3, 19, 4, 22, 7];
echo "Index of 4: " . linearSearch($numbers, 4) . PHP_EOL;
echo "Index of 99: " . linearSearch($numbers, 99) . PHP_EOL;</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">Index of 4: 3
Index of 99: -1</div>

<h2>2) البحث الثنائي <span class="ltr">Binary Search</span></h2>
<div class="bi-block">
    <div class="ar">🇪🇬 أسرع بكتير من البحث الخطي، لكن ليها شرط: <b>المصفوفة لازم تكون مرتبة</b>. الفكرة: شوف العنصر النص، لو أكبر من اللي بتدور عليه، دور في النص الأول بس؛ لو أصغر، دور في النص التاني بس — كده بتقسم منطقة البحث بالنص كل مرة.</div>
    <div class="en">🇬🇧 Much faster than linear search, but with one requirement: <b>the array must be sorted</b>. Idea: check the middle element; if it's bigger than your target, search only the left half; if smaller, search only the right half — halving the search space every time.</div>
</div>

<div class="flow-diagram">
    <div class="flow-box">Check middle</div>
    <div class="flow-arrow">↓ target bigger</div>
    <div class="flow-box">Search right half</div>
    <div class="flow-arrow">↓ target smaller</div>
    <div class="flow-box">Search left half</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">Repeat until found</div>
</div>

<pre><code>&lt;?php
function binarySearch(array $sortedItems, $target): int {
    $low = 0;
    $high = count($sortedItems) - 1;
    $steps = 0;

    while ($low <= $high) {
        $steps++;
        $mid = intdiv($low + $high, 2);
        if ($sortedItems[$mid] === $target) {
            echo "Found at index $mid in $steps step(s)" . PHP_EOL;
            return $mid;
        }
        if ($sortedItems[$mid] < $target) {
            $low = $mid + 1;
        } else {
            $high = $mid - 1;
        }
    }

    echo "Not found after $steps step(s)" . PHP_EOL;
    return -1;
}

$sorted = [2, 5, 8, 12, 16, 23, 38, 45, 56, 72, 91];
binarySearch($sorted, 23);
binarySearch($sorted, 100);</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">Found at index 5 in 1 step(s)
Not found after 4 step(s)</div>
<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ إن 23 موجود بالظبط في نص المصفوفة، فلقيناه من أول محاولة! ده يوضح قوة البحث الثنائي — حتى مع مصفوفة فيها 11 عنصر، أقصى عدد محاولات ممكن هو 4 بس.</div>
    <div class="en">🇬🇧 Notice 23 sits exactly at the array's middle, so we found it on the first try! This shows binary search's power — even with 11 elements, the worst case is only 4 attempts.</div>
</div>

<h2>3) الترتيب الفقاعي <span class="ltr">Bubble Sort</span></h2>
<div class="bi-block">
    <div class="ar">🇪🇬 خوارزمية ترتيب بسيطة (مش الأسرع، لكن الأسهل للفهم): تمشي على المصفوفة كذا مرة، وفي كل مرة تقارن كل عنصرين متجاورين — لو الأول أكبر من التاني، بدّلهم. العناصر الكبيرة "تطفو" لآخر المصفوفة زي الفقاعة، ولذلك اسمها كده.</div>
    <div class="en">🇬🇧 A simple sorting algorithm (not the fastest, but the easiest to understand): pass through the array multiple times, and each time compare every adjacent pair — if the first is bigger than the second, swap them. Large elements "bubble up" to the end, hence the name.</div>
</div>
<pre><code>&lt;?php
function bubbleSort(array $items): array {
    $n = count($items);
    for ($i = 0; $i < $n - 1; $i++) {
        for ($j = 0; $j < $n - $i - 1; $j++) {
            if ($items[$j] > $items[$j + 1]) {
                $temp = $items[$j];
                $items[$j] = $items[$j + 1];
                $items[$j + 1] = $temp;
            }
        }
    }
    return $items;
}

$unsorted = [5, 2, 9, 1, 5, 6];
echo implode(', ', bubbleSort($unsorted)) . PHP_EOL;</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">1, 2, 5, 5, 6, 9</div>
<div class="bi-block">
    <div class="ar">🇪🇬 الحلقة الخارجية <code>$i</code> بتحدد عدد "المرات" اللي هنمر فيها على المصفوفة، والحلقة الداخلية <code>$j</code> هي اللي بتعمل المقارنة والتبديل الفعلي. الشرط <code>$n - $i - 1</code> تحسين بسيط: بعد كل مرور، أكبر عنصر يبقى في مكانه الصحيح في الآخر، فمش محتاجين نراجعه تاني.</div>
    <div class="en">🇬🇧 The outer loop <code>$i</code> controls how many "passes" we make over the array, and the inner loop <code>$j</code> does the actual comparing and swapping. The <code>$n - $i - 1</code> bound is a small optimization: after each pass, the largest remaining element settles at the end, so we don't need to recheck it.</div>
</div>

<h2>التعقيد الزمني بالكلام العادي <span class="ltr">Big O, in Plain Language</span></h2>
<div class="bi-block">
    <div class="ar">🇪🇬 "التعقيد الزمني" (Big O) هو مقياس لعدد الخطوات اللي خوارزمية محتاجاها كل ما حجم البيانات يكبر — مش قياس بالثانية، لكن قياس "إزاي الأداء بيتأثر بحجم المدخلات". البحث الخطي في أسوأ حالة بيحتاج يشوف كل عنصر، يعني <code>O(n)</code>. البحث الثنائي بيقسم المشكلة بالنص كل مرة، يعني <code>O(log n)</code> — فرق هائل مع البيانات الكبيرة.</div>
    <div class="en">🇬🇧 "Time complexity" (Big O) measures how many steps an algorithm needs as data size grows — not seconds, but how performance scales with input size. Linear search, worst case, must check every element: <code>O(n)</code>. Binary search halves the problem each time: <code>O(log n)</code> — a massive difference at scale.</div>
</div>
<pre><code>&lt;?php
$size = 1000000;
$linearMax = $size;
$binaryMax = (int) ceil(log($size, 2));
echo "Linear search worst case: $linearMax checks" . PHP_EOL;
echo "Binary search worst case: $binaryMax checks" . PHP_EOL;</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">Linear search worst case: 1000000 checks
Binary search worst case: 20 checks</div>
<div class="bi-block">
    <div class="ar">🇪🇬 دي مش مبالغة — مع مليون عنصر، أسوأ حالة للبحث الخطي هي مليون محاولة، لكن البحث الثنائي محتاج بحد أقصى 20 محاولة بس. الفرق ده هو سبب أهمية اختيار الخوارزمية الصح، مش بس "خوارزمية شغالة".</div>
    <div class="en">🇬🇧 This isn't an exaggeration — with a million elements, linear search's worst case is a million tries, but binary search needs at most 20. This gap is exactly why choosing the right algorithm matters, not just "an algorithm that works."</div>
</div>

<h2 id="practice">💻 جرّب بنفسك / Try It Yourself</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 المحرر تحت فيه <code>bubbleSort</code> اللي شفتها فوق. جرّب مصفوفات مختلفة، أو ضيف <code>echo</code> جوه الحلقة الداخلية عشان تشوف كل مرور بيحصل فيه إيه بالظبط.</div>
    <div class="en">🇬🇧 The editor below has <code>bubbleSort</code> from above. Try different arrays, or add an <code>echo</code> inside the inner loop to see exactly what happens on each pass.</div>
</div>

<div class="mini-editor-wrap">
    <textarea spellcheck="false">&lt;?php
function bubbleSort(array $items): array {
    $n = count($items);
    for ($i = 0; $i < $n - 1; $i++) {
        for ($j = 0; $j < $n - $i - 1; $j++) {
            if ($items[$j] > $items[$j + 1]) {
                $temp = $items[$j];
                $items[$j] = $items[$j + 1];
                $items[$j + 1] = $temp;
            }
        }
    }
    return $items;
}

$unsorted = [5, 2, 9, 1, 5, 6];
echo implode(', ', bubbleSort($unsorted)) . PHP_EOL;</textarea>
    <div class="mini-toolbar">
        <button class="mini-run-btn">▶ شغّل / Run</button>
        <span class="mini-status"></span>
    </div>
    <div class="output-box">— لسه متشغلش / not run yet —</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="sorted">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">إيه الشرط اللازم عشان تقدر تستخدم البحث الثنائي؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What's required before you can use binary search?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="sorted"> المصفوفة لازم تكون مرتبة / the array must be sorted</label>
        <label><input type="radio" name="q1" value="small"> المصفوفة لازم تكون صغيرة / the array must be small</label>
        <label><input type="radio" name="q1" value="nothing"> مفيش شرط / no requirement</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="logn">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">إيه تعقيد البحث الثنائي (Big O) في أسوأ الحالات؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What's binary search's worst-case time complexity (Big O)?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="n"> O(n)</label>
        <label><input type="radio" name="q2" value="logn"> O(log n)</label>
        <label><input type="radio" name="q2" value="n2"> O(n²)</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ رتّب تنازليًا واحسب المحاولات / Sort Descending &amp; Count Attempts</h3>
    <div class="ar">🇪🇬 في <a href="../playground/index.php">محرر الكود</a> (أو المحرر المصغّر فوق)، عدّل <code>bubbleSort</code> عشان ترتب المصفوفة تنازليًا (من الأكبر للأصغر) بدل تصاعديًا — كل اللي محتاجه تغيير اتجاه المقارنة. بعدين ابنِ مصفوفة مرتبة من 20 عنصر، وشغّل <code>binarySearch</code> عليها مع طباعة عدد المحاولات (<code>$steps</code>) لعنصر موجود وعنصر مش موجود.</div>
    <div class="en">🇬🇧 In the <a href="../playground/index.php">Playground</a> (or the mini editor above), modify <code>bubbleSort</code> to sort descending — you only need to flip the comparison direction. Then build a sorted 20-element array and run <code>binarySearch</code> on it, printing the number of attempts (<code>$steps</code>) for both a present and an absent value.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 التفكير في "كفاءة" حل مش بس "هل بيشتغل" هو نفس التفكير اللي هتحتاجه وانت بتصمم البرامج الكاملة في مرحلة "البرامج التطبيقية" (Applications) — زي اختيار إزاي تبحث عن مهمة في قائمة، أو تعد كلمات في جملة طويلة بكفاءة.</div>
    <div class="en">🇬🇧 Thinking about a solution's "efficiency," not just whether it works, is the same mindset you'll need designing the complete programs in the Applications stage — like choosing how to search for a task in a list, or efficiently counting words in a long sentence.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>البحث الخطي بسيط ويشتغل مع أي مصفوفة، لكنه بطيء مع البيانات الكبيرة.</li>
        <li>البحث الثنائي أسرع جدًا، لكنه محتاج المصفوفة تكون مرتبة الأول.</li>
        <li>الترتيب الفقاعي بيقارن ويبدّل عناصر متجاورة على عدة مرات مرور.</li>
        <li>Big O بيقيس إزاي عدد الخطوات بيكبر مع حجم البيانات — <code>O(n)</code> vs <code>O(log n)</code> فرق هائل عمليًا.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="functions-1.php">← المرحلة السابقة</a>
    <a href="data-structures.php">المرحلة الجاية / Next: Data Structures →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
