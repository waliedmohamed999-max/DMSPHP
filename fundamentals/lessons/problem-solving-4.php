<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'problem-solving-4';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'حل المشكلات — فوق المتوسط';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">المرحلة 10 / Stage 10</span>
<h1>حل المشكلات — فوق المتوسط <span class="ltr">Problem Solving — Upper-Intermediate</span></h1>
<p class="subtitle">بعد كل اللي اتعلمناه، جاي وقت مفهوم قوي جدًا اسمه "التكرارية" (Recursion) — دالة بتنادي نفسها عشان تحل مشكلة عن طريق تقسيمها لنسخ أصغر منها. المشاكل الخمسة دي كلها هتتحل بالتكرارية.</p>

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
    <div class="ar">🇪🇬 تفهم إزاي تفكر بأسلوب تكراري: "إيه أبسط حالة ممكن تحلها فورًا (Base Case)؟" و"إزاي أحول المشكلة الكبيرة لنسخة أصغر من نفسها؟"</div>
    <div class="en">🇬🇧 Understand how to think recursively: "what's the simplest case I can solve immediately (base case)?" and "how do I turn the big problem into a smaller version of itself?"</div>
</div>

<h2 id="understand">مشكلة 1: المضروب (Factorial) بالتكرارية</h2>
<div class="flow-diagram">
    <div class="flow-box">factorial(5)</div>
    <div class="flow-arrow">↓ 5 × factorial(4)</div>
    <div class="flow-box">factorial(4)</div>
    <div class="flow-arrow">↓ 4 × factorial(3)</div>
    <div class="flow-box">factorial(3) ... factorial(1)</div>
    <div class="flow-arrow">↓ base case</div>
    <div class="flow-box">return 1, then unwind: 1×2×3×4×5 = 120</div>
</div>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>المطلوب:</b> احسب !n (يعني n × (n-1) × ... × 1) بالتكرارية. <b>التفكير:</b> الحالة الأساسية: !1 = 1 (أو !0 = 1). أي رقم تاني: !n = n × !(n-1) — يعني الدالة بتنادي نفسها برقم أصغر بواحد في كل مرة.</div>
    <div class="en">🇬🇧 <b>Task:</b> compute n! (n × (n-1) × ... × 1) recursively. <b>Thinking:</b> base case: 1! = 1 (or 0! = 1). Any other number: n! = n × (n-1)! — the function calls itself with a number one smaller each time.</div>
</div>
<pre><code>&lt;?php
function factorial(int $n): int {
    if ($n <= 1) {
        return 1;
    }
    return $n * factorial($n - 1);
}

echo factorial(5) . PHP_EOL;
echo factorial(0) . PHP_EOL;
echo factorial(7) . PHP_EOL;</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">120
1
5040</div>
<div class="bi-block">
    <div class="ar">🇪🇬 بدون <code>if ($n <= 1) return 1;</code> (الحالة الأساسية)، الدالة كانت هتنادي نفسها للأبد من غير ما توقف — الحالة الأساسية هي اللي بتمنع "التكرارية اللانهائية".</div>
    <div class="en">🇬🇧 Without <code>if ($n <= 1) return 1;</code> (the base case), the function would call itself forever without stopping — the base case is what prevents "infinite recursion".</div>
</div>

<h2>مشكلة 2: متتالية فيبوناتشي بالتكرارية</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>المطلوب:</b> كل رقم في المتتالية هو مجموع الرقمين اللي قبله (0, 1, 1, 2, 3, 5, 8...). <b>التفكير:</b> حالتين أساسيتين: fib(0) = 0 وfib(1) = 1. أي رقم تاني: fib(n) = fib(n-1) + fib(n-2).</div>
    <div class="en">🇬🇧 <b>Task:</b> each number in the sequence is the sum of the two before it (0, 1, 1, 2, 3, 5, 8...). <b>Thinking:</b> two base cases: fib(0) = 0 and fib(1) = 1. Any other number: fib(n) = fib(n-1) + fib(n-2).</div>
</div>
<pre><code>&lt;?php
function fibonacci(int $n): int {
    if ($n <= 1) {
        return $n;
    }
    return fibonacci($n - 1) + fibonacci($n - 2);
}

for ($i = 0; $i < 10; $i++) {
    echo fibonacci($i) . ' ';
}
echo PHP_EOL;</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">0 1 1 2 3 5 8 13 21 34 </div>
<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ إن الدالة هنا بتنادي نفسها مرتين مش مرة واحدة — ده بيخليها أبطأ بكتير مع أرقام كبيرة (لأنها بتحسب نفس القيم أكتر من مرة). في مسارات متقدمة هتتعلم تقنية اسمها "Memoization" بتحل المشكلة دي بتخزين النتائج اللي حسبتها قبل كده.</div>
    <div class="en">🇬🇧 Notice the function calls itself twice, not once — this makes it much slower for large numbers (since it recomputes the same values repeatedly). In advanced tracks you'll learn "Memoization," a technique that fixes this by caching previously computed results.</div>
</div>

<h2>مشكلة 3: مجموع أرقام رقم بالتكرارية</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>المطلوب:</b> نفس مشكلة "مجموع الأرقام" اللي حليناها بحلقة قبل كده، لكن دلوقتي بالتكرارية. <b>التفكير:</b> الحالة الأساسية: لو الرقم أصغر من 10 (خانة واحدة)، هو نفسه المجموع. غير كده: اجمع آخر خانة + نتيجة نفس المسألة على باقي الرقم (بعد حذف آخر خانة).</div>
    <div class="en">🇬🇧 <b>Task:</b> the same "sum of digits" problem we solved with a loop before, now recursively. <b>Thinking:</b> base case: a single-digit number is its own sum. Otherwise: add the last digit to the same problem's result on the rest of the number (after dropping the last digit).</div>
</div>
<pre><code>&lt;?php
function sumOfDigitsRec(int $n): int {
    $n = abs($n);
    if ($n < 10) {
        return $n;
    }
    return $n % 10 + sumOfDigitsRec(intdiv($n, 10));
}

echo sumOfDigitsRec(1234) . PHP_EOL;
echo sumOfDigitsRec(9) . PHP_EOL;
echo sumOfDigitsRec(90210) . PHP_EOL;</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">10
9
12</div>

<h2>مشكلة 4: فحص توازن الأقواس</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>المطلوب:</b> تتحقق هل الأقواس في نص متوازنة صح، زي <code>([a+b])</code> صح لكن <code>(a+b]</code> غلط. <b>التفكير:</b> دي مسألة كلاسيكية للـ Stack (اللي اتعلمناه في مرحلة هياكل البيانات): كل قوس فتح، ادفعه (Push) في المكدس؛ كل قوس قفل، شيل (Pop) آخر قوس فتح وتأكد إنه بينطبق معاه.</div>
    <div class="en">🇬🇧 <b>Task:</b> check whether brackets in a string are properly balanced, like <code>([a+b])</code> is valid but <code>(a+b]</code> isn't. <b>Thinking:</b> a classic Stack problem (from the Data Structures stage): push every opening bracket; for every closing bracket, pop the last opening bracket and confirm it matches.</div>
</div>
<pre><code>&lt;?php
function isBalanced(string $s): bool {
    $stack = [];
    $pairs = [')' => '(', ']' => '[', '}' => '{'];

    foreach (str_split($s) as $ch) {
        if (in_array($ch, ['(', '[', '{'])) {
            array_push($stack, $ch);
        } elseif (isset($pairs[$ch])) {
            if (empty($stack) || array_pop($stack) !== $pairs[$ch]) {
                return false;
            }
        }
    }
    return empty($stack);
}

foreach (["(a+b)", "([a+b])", "(a+b]", "((a)"] as $s) {
    echo "$s: " . (isBalanced($s) ? "balanced" : "not balanced") . PHP_EOL;
}</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">(a+b): balanced
([a+b]): balanced
(a+b]: not balanced
((a): not balanced</div>
<div class="bi-block">
    <div class="ar">🇪🇬 المشكلة دي مش تكرارية بحتة في التنفيذ، لكنها معروضة هنا لأنها من أشهر تطبيقات الـ Stack في مقابلات الشغل، ومكانها الطبيعي بعد ما اتعلمنا التكرارية والهياكل مع بعض.</div>
    <div class="en">🇬🇧 This one isn't implemented recursively, but it's included here because it's one of the most famous Stack applications in job interviews, and fits naturally now that you've learned both recursion and data structures.</div>
</div>

<h2>مشكلة 5: البحث الثنائي بالتكرارية</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>المطلوب:</b> نفس البحث الثنائي اللي عملناه بحلقة <code>while</code> في مرحلة الخوارزميات، لكن بالتكرارية. <b>التفكير:</b> بدل ما نحدّث <code>$low</code> و<code>$high</code> ونكرر الحلقة، الدالة بتنادي نفسها بحدود جديدة (<code>$low</code> أو <code>$high</code> جديدة) لحد ما تلاقي العنصر أو الحدود تتقاطع.</div>
    <div class="en">🇬🇧 <b>Task:</b> the same binary search we built with a <code>while</code> loop in Algorithms, now recursively. <b>Thinking:</b> instead of updating <code>$low</code>/<code>$high</code> and looping, the function calls itself with new bounds until it finds the element or the bounds cross.</div>
</div>
<pre><code>&lt;?php
function binarySearchRec(array $items, $target, int $low = 0, ?int $high = null): int {
    if ($high === null) {
        $high = count($items) - 1;
    }
    if ($low > $high) {
        return -1;
    }
    $mid = intdiv($low + $high, 2);
    if ($items[$mid] === $target) {
        return $mid;
    }
    if ($items[$mid] < $target) {
        return binarySearchRec($items, $target, $mid + 1, $high);
    }
    return binarySearchRec($items, $target, $low, $mid - 1);
}

$sorted = [2, 5, 8, 12, 16, 23, 38, 45, 56, 72, 91];
echo binarySearchRec($sorted, 45) . PHP_EOL;
echo binarySearchRec($sorted, 3) . PHP_EOL;</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">7
-1</div>
<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ إن الحالة الأساسية هنا <code>if ($low > $high) return -1;</code> — لما الحدود "تتقاطع" كده، معناه دورنا في كل المصفوفة ومفيش العنصر. أي حل تكراري بيحتاج حالة أساسية واضحة زي دي عشان يوقف صح.</div>
    <div class="en">🇬🇧 Notice the base case <code>if ($low > $high) return -1;</code> — when the bounds "cross" like this, it means we've searched the whole array and the element isn't there. Every recursive solution needs a clear base case like this to terminate correctly.</div>
</div>

<h2 id="practice">💻 جرّب بنفسك / Try It Yourself</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 المحرر تحت فيه دالة <code>factorial</code> اللي شفتها فوق. جرّب أرقام مختلفة، أو ضيف <code>echo "calling factorial($n)" . PHP_EOL;</code> جوه الدالة عشان تشوف كل نداء تكراري بيحصل امتى بالظبط.</div>
    <div class="en">🇬🇧 The editor below has <code>factorial</code> from above. Try different numbers, or add <code>echo "calling factorial($n)" . PHP_EOL;</code> inside the function to see exactly when each recursive call happens.</div>
</div>

<div class="mini-editor-wrap">
    <textarea spellcheck="false">&lt;?php
function factorial(int $n): int {
    if ($n <= 1) {
        return 1;
    }
    return $n * factorial($n - 1);
}

echo factorial(5) . PHP_EOL;
echo factorial(0) . PHP_EOL;
echo factorial(7) . PHP_EOL;</textarea>
    <div class="mini-toolbar">
        <button class="mini-run-btn">▶ شغّل / Run</button>
        <span class="mini-status"></span>
    </div>
    <div class="output-box">— لسه متشغلش / not run yet —</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="basecase">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">إيه اللي بيمنع دالة تكرارية من إنها تنادي نفسها للأبد؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What stops a recursive function from calling itself forever?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="basecase"> الحالة الأساسية (Base Case)</label>
        <label><input type="radio" name="q1" value="loop"> استخدام حلقة for جواها</label>
        <label><input type="radio" name="q1" value="type"> تحديد نوع الإرجاع (Return Type)</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="twice">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">ليه <code>fibonacci</code> التكرارية البسيطة بطيئة مع الأرقام الكبيرة؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Why is simple recursive <code>fibonacci</code> slow for large numbers?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="twice"> بتنادي نفسها مرتين في كل استدعاء، فبتعيد حساب نفس القيم كتير / it calls itself twice per call, recomputing the same values repeatedly</label>
        <label><input type="radio" name="q2" value="php"> PHP بطيئة في التكرارية بشكل عام / PHP is generally slow at recursion</label>
        <label><input type="radio" name="q2" value="array"> لأنها بترجع مصفوفة كبيرة / because it returns a large array</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ ابني power تكرارية كاملة / Build a Complete Recursive power</h3>
    <div class="ar">🇪🇬 في <a href="../playground/index.php">محرر الكود</a> (أو المحرر المصغّر فوق)، اكتب دالة تكرارية <code>power(int $base, int $exp): int</code> تحسب <code>$base</code> مرفوعة للقوة <code>$exp</code> (زي 2^5 = 32) من غير استخدام عامل <code>**</code> ولا دالة <code>pow</code>. فكّر في الحالة الأساسية الأول: <code>power($base, 0)</code> بترجع إيه؟</div>
    <div class="en">🇬🇧 In the <a href="../playground/index.php">Playground</a> (or the mini editor above), write a recursive <code>power(int $base, int $exp): int</code> function computing <code>$base</code> raised to <code>$exp</code> (like 2^5 = 32) without using the <code>**</code> operator or <code>pow</code>. Think about the base case first: what should <code>power($base, 0)</code> return?</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 التكرارية نفسها مش هتظهر بشكل مباشر جوه البرامج التلاتة في مرحلة "البرامج التطبيقية" (Applications)، لكن طريقة التفكير اللي بنيتها هنا — تفكيك مشكلة لنسخة أصغر من نفسها — هي نفسها اللي هتحتاجها في أي مشكلة معقدة تقابلها في مسارات لاحقة تتعامل مع بيانات متداخلة أو أشجار (Trees).</div>
    <div class="en">🇬🇧 Recursion itself won't appear directly inside the three Applications-stage programs, but the way of thinking you built here — breaking a problem into a smaller version of itself — is exactly what you'll need for any complex problem involving nested data or trees in later tracks.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>كل دالة تكرارية محتاجة "حالة أساسية" (Base Case) توقف عندها، وإلا هتنادي نفسها للأبد.</li>
        <li>التكرارية بتحول مشكلة كبيرة لنسخة أصغر من نفس المشكلة + خطوة بسيطة.</li>
        <li>فيبوناتشي التكراري البسيط بطيء مع الأرقام الكبيرة — كفاءة الحل مش دايمًا مرتبطة بجماله.</li>
        <li>مشاكل زي توازن الأقواس بتربط بين مفاهيم مختلف اتعلمناها (Stack + منطق شرطي).</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="deep-dive.php">← المرحلة السابقة</a>
    <a href="applications.php">المرحلة الجاية / Next: Applications →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
