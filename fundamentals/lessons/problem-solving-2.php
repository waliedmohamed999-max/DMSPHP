<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'problem-solving-2';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'حل المشكلات — المستوى الثاني';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">المرحلة 3 / Stage 3</span>
<h1>حل المشكلات — المستوى الثاني <span class="ltr">Problem Solving — Level 2</span></h1>
<p class="subtitle">هنكمل نفس الأسلوب من المرحلة اللي فاتت: تفكير قبل كود. المشاكل دلوقتي هتلمس زوايا جديدة — تلاعب بالأرقام من غير متغيرات مساعدة، تعامل مع النصوص، وتتبّع أكتر من قيمة في نفس الوقت جوه حلقة واحدة.</p>

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
    <div class="ar">🇪🇬 تحل 7 مشاكل جديدة تبني عضلة "التفكير المنطقي" بتاعتك أكتر، وتتعرف على حيل صغيرة (زي التبديل من غير متغير مؤقت) بتفرق كتير في فهمك للغة.</div>
    <div class="en">🇬🇧 Solve 7 new problems that further build your "logical thinking" muscle, and learn small tricks (like swapping without a temp variable) that deepen your understanding of the language.</div>
</div>

<h2 id="understand">مشكلة 1: تبديل قيمتين من غير متغير مؤقت</h2>
<div class="flow-diagram">
    <div class="flow-box">a = a + b</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">b = a - b <span class="ltr" style="color:var(--muted)">(old a)</span></div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">a = a - b <span class="ltr" style="color:var(--muted)">(old b)</span></div>
</div>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>المطلوب:</b> تبدّل قيمة متغيرين مع بعض من غير ما تستخدم متغير تالت مؤقت. <b>التفكير:</b> ممكن تستخدم الجمع والطرح: اجمع القيمتين في الأولى، بعدين اطرح منها التانية عشان تجيب قيمة الأولى الأصلية، وأخيرًا اطرح القيمة الجديدة من الأولى عشان تجيب التانية.</div>
    <div class="en">🇬🇧 <b>Task:</b> swap two variables' values without using a third temporary variable. <b>Thinking:</b> use addition and subtraction: add both into the first, subtract the second from it to recover the original first value, then subtract the new value from the first to recover the second.</div>
</div>
<pre><code>&lt;?php
function swapNumbers(int $a, int $b): array {
    $a = $a + $b;
    $b = $a - $b;
    $a = $a - $b;
    return [$a, $b];
}

[$x, $y] = swapNumbers(5, 10);
echo "x = $x, y = $y" . PHP_EOL;

[$x2, $y2] = swapNumbers(3, 3);
echo "x2 = $x2, y2 = $y2" . PHP_EOL;</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">x = 10, y = 5
x2 = 3, y2 = 3</div>
<div class="bi-block">
    <div class="ar">🇪🇬 في PHP الحقيقية غالبًا هتستخدم <code>[$a, $b] = [$b, $a];</code> لإنها أوضح، لكن الحيلة دي مهمة عشان تفهم إن التبديل ممكن يحصل بعمليات حسابية بحتة من غير مساحة تخزين إضافية — ده مبدأ بيتسأل عنه كتير في مقابلات الشغل.</div>
    <div class="en">🇬🇧 In real PHP you'd usually write <code>[$a, $b] = [$b, $a];</code> since it's clearer, but this trick matters because it shows swapping can happen with pure arithmetic and no extra storage — a concept commonly asked about in job interviews.</div>
</div>

<h2>مشكلة 2: عدد الحروف المتحركة في نص</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>المطلوب:</b> دالة تعد الحروف المتحركة الإنجليزية (a, e, i, o, u) في كلمة. <b>التفكير:</b> حوّل الكلمة لحروف صغيرة، امشِ حرف حرف، وتحقق هل الحرف موجود في مصفوفة الحروف المتحركة.</div>
    <div class="en">🇬🇧 <b>Task:</b> a function counting English vowels (a, e, i, o, u) in a word. <b>Thinking:</b> lowercase the word, walk character by character, and check if it's in a vowels array.</div>
</div>
<pre><code>&lt;?php
function countVowels(string $word): int {
    $count = 0;
    $vowels = ['a', 'e', 'i', 'o', 'u'];
    foreach (str_split(strtolower($word)) as $ch) {
        if (in_array($ch, $vowels)) {
            $count++;
        }
    }
    return $count;
}

foreach (["Programming", "Rhythm", "Education"] as $w) {
    echo "$w: " . countVowels($w) . PHP_EOL;
}</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">Programming: 3
Rhythm: 0
Education: 5</div>

<h2>مشكلة 3: هل الرقم مربّع كامل؟</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>المطلوب:</b> تتحقق هل رقم هو "مربع كامل" (Perfect Square) زي 16 (= 4×4). <b>التفكير:</b> جيب الجذر التربيعي بـ <code>sqrt</code>، حوّله لعدد صحيح، وارفعه للقوة 2 تاني — لو رجع نفس الرقم الأصلي، يبقى مربع كامل.</div>
    <div class="en">🇬🇧 <b>Task:</b> check if a number is a Perfect Square like 16 (= 4×4). <b>Thinking:</b> get the square root with <code>sqrt</code>, cast it to an integer, and square it back — if it matches the original number, it's a perfect square.</div>
</div>
<pre><code>&lt;?php
function isPerfectSquare(int $n): bool {
    if ($n < 0) {
        return false;
    }
    $root = (int) sqrt($n);
    return $root * $root === $n;
}

foreach ([16, 20, 81, 0, 2] as $n) {
    echo "$n: " . (isPerfectSquare($n) ? "perfect square" : "not") . PHP_EOL;
}</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">16: perfect square
20: not
81: perfect square
0: perfect square
2: not</div>

<h2>مشكلة 4: ثاني أكبر رقم في مصفوفة</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>المطلوب:</b> تلاقي ثاني أكبر قيمة مختلفة في مصفوفة. <b>التفكير:</b> تتبّع متغيرين: <code>$largest</code> و<code>$second</code>. لو رقم جديد أكبر من الأكبر الحالي، الأكبر القديم يبقى هو الثاني، والرقم الجديد يبقى الأكبر. لو الرقم مش أكبر من الأكبر لكنه أكبر من الثاني (ومش مساوي للأكبر)، حدّث الثاني بس.</div>
    <div class="en">🇬🇧 <b>Task:</b> find the second-largest distinct value in an array. <b>Thinking:</b> track two variables, <code>$largest</code> and <code>$second</code>. If a new number beats the current largest, the old largest becomes second, and the new number becomes largest. If it doesn't beat largest but beats second (and isn't equal to largest), update second only.</div>
</div>
<pre><code>&lt;?php
function secondLargest(array $numbers): ?int {
    $largest = null;
    $second = null;
    foreach ($numbers as $n) {
        if ($largest === null || $n > $largest) {
            $second = $largest;
            $largest = $n;
        } elseif ($n !== $largest && ($second === null || $n > $second)) {
            $second = $n;
        }
    }
    return $second;
}

echo (secondLargest([10, 5, 20, 8, 20]) ?? 'null') . PHP_EOL;
echo (secondLargest([4, 4, 4]) ?? 'null') . PHP_EOL;</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">10
null</div>
<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ الحالة الحدّية (Edge Case): لو كل عناصر المصفوفة متساوية زي <code>[4, 4, 4]</code>، مفيش "ثاني أكبر" حقيقي، فالدالة بترجع <code>null</code>. التفكير في الحالات الحدّية زي دي هو اللي بيفرّق بين حل شغال وحل كامل.</div>
    <div class="en">🇬🇧 Notice the edge case: if every element is equal, like <code>[4, 4, 4]</code>, there's no real "second largest," so the function returns <code>null</code>. Thinking about edge cases like this is what separates a working solution from a complete one.</div>
</div>

<h2>مشكلة 5: تحويل درجة الحرارة بين مئوي وفهرنهايت</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>المطلوب:</b> دالتين للتحويل بين الاتنين. <b>التفكير:</b> المعادلة الرياضية جاهزة ومعروفة: °F = °C × 9/5 + 32، والعكس °C = (°F − 32) × 5/9. الشغلانة كلها إنك تترجم المعادلة لكود بالظبط.</div>
    <div class="en">🇬🇧 <b>Task:</b> two conversion functions between them. <b>Thinking:</b> the formula is known: °F = °C × 9/5 + 32, and the reverse °C = (°F − 32) × 5/9. The whole job is translating the formula into code exactly.</div>
</div>
<pre><code>&lt;?php
function celsiusToFahrenheit(float $c): float {
    return $c * 9 / 5 + 32;
}

function fahrenheitToCelsius(float $f): float {
    return ($f - 32) * 5 / 9;
}

echo celsiusToFahrenheit(0) . PHP_EOL;
echo celsiusToFahrenheit(100) . PHP_EOL;
echo round(fahrenheitToCelsius(98.6), 1) . PHP_EOL;</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">32
212
37</div>

<h2>مشكلة 6: هل النص يمثّل رقم؟</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>المطلوب:</b> تتحقق هل نص (String) ممكن يتقرا كرقم صحيح أو عشري، زي "12.5" أو "-7". <b>التفكير:</b> PHP فيها دالة جاهزة <code>is_numeric</code> بتعمل بالظبط كده — بتفهم صيغ كتير زي الأرقام السالبة والعلمية (زي "3e2").</div>
    <div class="en">🇬🇧 <b>Task:</b> check whether a string can be read as an integer or decimal number, like "12.5" or "-7". <b>Thinking:</b> PHP has a built-in <code>is_numeric</code> that does exactly this — it understands many formats including negatives and scientific notation (like "3e2").</div>
</div>
<pre><code>&lt;?php
function isNumericString(string $s): bool {
    return is_numeric($s);
}

foreach (["123", "12.5", "12a", "-7", "", "3e2"] as $s) {
    $label = $s === '' ? '(empty)' : $s;
    echo "$label: " . (isNumericString($s) ? "numeric" : "not numeric") . PHP_EOL;
}</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">123: numeric
12.5: numeric
12a: not numeric
-7: numeric
(empty): not numeric
3e2: numeric</div>
<div class="bi-block">
    <div class="ar">🇪🇬 "3e2" ده تدوين علمي (Scientific Notation) معناه 3 × 10² = 300، وPHP بتفهمه كرقم صحيح. مش كل حاجة "شكلها رقم" بالعين البشرية هي اللي PHP بتعتبرها رقم، والعكس صحيح — دايمًا اختبر دالة زي دي بحالات متنوعة.</div>
    <div class="en">🇬🇧 "3e2" is scientific notation meaning 3 × 10² = 300, and PHP correctly reads it as a number. What looks like a number to a human eye isn't always what PHP considers numeric, and vice versa — always test a function like this with varied cases.</div>
</div>

<h2>مشكلة 7: مجموع أرقام رقم معيّن</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>المطلوب:</b> اجمع أرقام (خانات) رقم مع بعض، يعني 1234 → 1+2+3+4 = 10. <b>التفكير:</b> نفس فكرة "عكس الرقم" اللي شفناها قبل كده — استخرج آخر خانة بـ <code>% 10</code>، ضيفها للمجموع، واحذفها من الرقم بـ <code>intdiv</code>، وكرر لحد ما الرقم يخلص.</div>
    <div class="en">🇬🇧 <b>Task:</b> sum the digits of a number, so 1234 → 1+2+3+4 = 10. <b>Thinking:</b> the same idea as reversing a number from before — extract the last digit with <code>% 10</code>, add it to a total, drop it with <code>intdiv</code>, and repeat until nothing's left.</div>
</div>
<pre><code>&lt;?php
function sumOfDigits(int $n): int {
    $n = abs($n);
    $sum = 0;
    while ($n > 0) {
        $sum += $n % 10;
        $n = intdiv($n, 10);
    }
    return $sum;
}

echo sumOfDigits(1234) . PHP_EOL;
echo sumOfDigits(90210) . PHP_EOL;</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">10
12</div>

<h2 id="practice">💻 جرّب بنفسك / Try It Yourself</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 المحرر تحت فيه دالة <code>secondLargest</code> اللي شفتها فوق، بما فيها التعامل مع الحالة الحدّية. جرّب تغيّر المصفوفة المُدخلة وشوف إزاي النتيجة بتتغير.</div>
    <div class="en">🇬🇧 The editor below has the <code>secondLargest</code> function from above, edge case included. Try changing the input array and see how the result changes.</div>
</div>

<div class="mini-editor-wrap">
    <textarea spellcheck="false">&lt;?php
function secondLargest(array $numbers): ?int {
    $largest = null;
    $second = null;
    foreach ($numbers as $n) {
        if ($largest === null || $n > $largest) {
            $second = $largest;
            $largest = $n;
        } elseif ($n !== $largest && ($second === null || $n > $second)) {
            $second = $n;
        }
    }
    return $second;
}

echo (secondLargest([10, 5, 20, 8, 20]) ?? 'null') . PHP_EOL;
echo (secondLargest([4, 4, 4]) ?? 'null') . PHP_EOL;</textarea>
    <div class="mini-toolbar">
        <button class="mini-run-btn">▶ شغّل / Run</button>
        <span class="mini-status"></span>
    </div>
    <div class="output-box">— لسه متشغلش / not run yet —</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="null">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">إيه اللي بترجعه <code>secondLargest([4, 4, 4])</code>؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What does <code>secondLargest([4, 4, 4])</code> return?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="4"> 4</label>
        <label><input type="radio" name="q1" value="null"> null</label>
        <label><input type="radio" name="q1" value="0"> 0</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="numeric2">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">هل <code>is_numeric("3e2")</code> بترجع <code>true</code> ولا <code>false</code>؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Does <code>is_numeric("3e2")</code> return <code>true</code> or <code>false</code>?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="numeric1"> false، لأن فيها حرف / false, because it contains a letter</label>
        <label><input type="radio" name="q2" value="numeric2"> true، لأنها تدوين علمي صحيح (300) / true, because it's valid scientific notation (300)</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ ابني دالة Title Case كاملة / Build a Complete Title Case Function</h3>
    <div class="ar">🇪🇬 في <a href="../playground/index.php">محرر الكود</a> (أو المحرر المصغّر فوق)، ابني دالة <code>toTitleCase(string $sentence): string</code> تحوّل أول حرف من كل كلمة لكابيتال (زي "hello world" → "Hello World"). فكّك الجملة لكلمات بـ <code>explode(' ', ...)</code>، وحوّل أول حرف كل كلمة بـ <code>strtoupper($word[0])</code>، وجمّعهم تاني بـ <code>implode</code>.</div>
    <div class="en">🇬🇧 In the <a href="../playground/index.php">Playground</a> (or the mini editor above), build a function <code>toTitleCase(string $sentence): string</code> that capitalizes each word's first letter (e.g. "hello world" → "Hello World"). Split the sentence into words with <code>explode(' ', ...)</code>, uppercase each word's first letter with <code>strtoupper($word[0])</code>, and rejoin with <code>implode</code>.</div>
</div>

<div class="exercise-box">
    <h3>✍️ تمارين إضافية / More Exercises to Try Yourself</h3>
    <div class="ar">🇪🇬 في <a href="../playground/index.php">محرر الكود</a>، جرّب: 1) دالة تحسب أصغر رقم في مصفوفة من غير استخدام <code>min()</code>. 2) دالة تحسب المتوسط الحسابي (Average) لمصفوفة أرقام.</div>
    <div class="en">🇬🇧 In the <a href="../playground/index.php">Playground</a>, try: 1) a function finding the smallest number in an array without using <code>min()</code>. 2) a function computing the average of an array of numbers.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 حيل زي التبديل بحسابات بحتة، وتتبّع أكتر من قيمة في حلقة واحدة، هتلاقيها بتظهر تاني جوه برامج أكبر — زي عدّاد تكرار الكلمات في مرحلة "البرامج التطبيقية" (Applications) اللي بيتتبّع أكتر من عدّاد في نفس الوقت جوه مصفوفة جمعية واحدة.</div>
    <div class="en">🇬🇧 Tricks like swapping with pure arithmetic, and tracking multiple values in one loop, resurface inside bigger programs — like the word-frequency counter in the Applications stage, which tracks many counters at once inside a single associative array.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>مش كل مشكلة محتاجة متغير إضافي — أحيانًا الحسابات نفسها كفاية (زي التبديل).</li>
        <li>لما تتبّع أكتر من قيمة في حلقة واحدة (زي الأكبر والثاني)، فكّر في كل الحالات: أكبر، وسط، ومتساوي.</li>
        <li>الحالات الحدّية (Edge Cases) — زي مصفوفة كل عناصرها متشابهة — لازم تتفكر فيها من البداية.</li>
        <li>PHP عندها دوال جاهزة قوية (<code>is_numeric</code>) بتوفر عليك إعادة اختراع العجلة.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="problem-solving-1.php">← المرحلة السابقة</a>
    <a href="functions-1.php">المرحلة الجاية / Next: Function Implementation →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
