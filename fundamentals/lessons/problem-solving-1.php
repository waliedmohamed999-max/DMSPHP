<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'problem-solving-1';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'حل المشكلات — المستوى الأول';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">المرحلة 2 / Stage 2</span>
<h1>حل المشكلات — المستوى الأول <span class="ltr">Problem Solving — Level 1</span></h1>
<p class="subtitle">تعلّم المتغيرات والشروط والحلقات مش كفاية — لازم توظّفهم في حل مشاكل حقيقية عشان يترسّخ "المنطق البرمجي" بدل ما يفضل معلومة نظرية. هنحل 9 مشاكل كلاسيكية، كل واحدة بالتفكير خطوة بخطوة قبل الكود.</p>

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
    <div class="ar">🇪🇬 تتعلم إزاي "تفكك" مشكلة لخطوات بسيطة قبل ما تكتب أي كود، وتشوف نفس الأدوات (if, loops, functions) وهي بتتستخدم في سياقات مختلفة تمامًا عن بعضها.</div>
    <div class="en">🇬🇧 Learn how to break a problem into simple steps before writing any code, and see the same tools (if, loops, functions) used across completely different contexts.</div>
</div>

<h2 id="understand">مشكلة 1: أكبر رقم بين اتنين</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>المطلوب:</b> دالة تاخد رقمين وترجع الأكبر منهم. <b>التفكير:</b> قارن الرقمين بـ <code>if</code> — لو الأول أكبر رجّعه، غير كده رجّع التاني.</div>
    <div class="en">🇬🇧 <b>Task:</b> a function that takes two numbers and returns the larger one. <b>Thinking:</b> compare them with <code>if</code> — if the first is larger, return it; otherwise return the second.</div>
</div>
<pre><code>&lt;?php
function maxOfTwo(float $a, float $b): float {
    if ($a > $b) {
        return $a;
    }
    return $b;
}

echo maxOfTwo(7, 12) . PHP_EOL;
echo maxOfTwo(50, 3) . PHP_EOL;</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">12
50</div>

<h2>مشكلة 2: هل الرقم زوجي ولا فردي؟</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>المطلوب:</b> دالة ترجع <code>true</code> لو الرقم زوجي. <b>التفكير:</b> الرقم الزوجي بيتقسم على 2 من غير باقي — عامل <code>%</code> (Modulo) بيديك الباقي بالظبط.</div>
    <div class="en">🇬🇧 <b>Task:</b> a function returning <code>true</code> if a number is even. <b>Thinking:</b> an even number divides by 2 with no remainder — the <code>%</code> (Modulo) operator gives exactly that remainder.</div>
</div>
<pre><code>&lt;?php
function isEven(int $number): bool {
    return $number % 2 === 0;
}

foreach ([4, 7, 10, 15] as $n) {
    echo "$n is " . (isEven($n) ? "even" : "odd") . PHP_EOL;
}</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">4 is even
7 is odd
10 is even
15 is odd</div>

<h2>مشكلة 3: مجموع الأرقام من 1 لحد N</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>المطلوب:</b> مجموع كل الأرقام من 1 لحد رقم معيّن. <b>التفكير:</b> محتاج متغير يجمع فيه القيمة أول بأول (<code>$sum</code>، بيبدأ من صفر)، وحلقة تمر على كل رقم وتضيفه.</div>
    <div class="en">🇬🇧 <b>Task:</b> sum all numbers from 1 up to a given number. <b>Thinking:</b> you need an accumulator variable (<code>$sum</code>, starting at zero) and a loop that adds each number to it.</div>
</div>
<pre><code>&lt;?php
function sumUpTo(int $n): int {
    $sum = 0;
    for ($i = 1; $i <= $n; $i++) {
        $sum += $i;
    }
    return $sum;
}

echo sumUpTo(5) . PHP_EOL;
echo sumUpTo(10) . PHP_EOL;</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">15
55</div>

<h2>مشكلة 4: هل الرقم أوّلي؟</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>المطلوب:</b> دالة تتحقق هل رقم أوّلي (Prime) — يعني مش بيتقسم إلا على نفسه وعلى 1. <b>التفكير:</b> جرّب تقسّمه على كل رقم من 2 لحد جذره التربيعي؛ لو انقسم على أي حد منهم من غير باقي، يبقى مش أوّلي.</div>
    <div class="en">🇬🇧 <b>Task:</b> check whether a number is Prime — divisible only by itself and 1. <b>Thinking:</b> try dividing it by every number from 2 up to its square root; if any divides evenly, it's not prime.</div>
</div>

<div class="flow-diagram">
    <div class="flow-box">n &lt; 2 ?</div>
    <div class="flow-arrow">↓ no</div>
    <div class="flow-box">try i = 2 .. sqrt(n)</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">n % i === 0 ?</div>
    <div class="flow-arrow">↓ never</div>
    <div class="flow-box">prime = true</div>
</div>

<pre><code>&lt;?php
function isPrime(int $n): bool {
    if ($n < 2) {
        return false;
    }
    for ($i = 2; $i * $i <= $n; $i++) {
        if ($n % $i === 0) {
            return false;
        }
    }
    return true;
}

foreach ([1, 2, 9, 17, 20] as $n) {
    echo "$n: " . (isPrime($n) ? "prime" : "not prime") . PHP_EOL;
}</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">1: not prime
2: prime
9: not prime
17: prime
20: not prime</div>
<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ إننا بنجرب لحد <code>$i * $i <= $n</code> بس مش لحد <code>$n</code> نفسه — لو رقم مش هينقسم على أي حاجة أقل من جذره التربيعي، مش هينقسم على أي حاجة أكبر منه من الأساس. ده يوفر وقت تنفيذ كبير مع الأرقام الكبيرة.</div>
    <div class="en">🇬🇧 Notice we only try up to <code>$i * $i <= $n</code>, not all the way to <code>$n</code> — if a number has no divisor below its square root, it can't have one above it either. This saves significant time with large numbers.</div>
</div>

<h2>مشكلة 5: عكس رقم</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>المطلوب:</b> تقلب رقم زي 1234 يبقى 4321. <b>التفكير:</b> في كل خطوة، اطلع آخر رقم (باستخدام <code>% 10</code>)، ضيفه للنتيجة بعد ما تزود قيمتها، وبعدين احذف آخر رقم من الرقم الأصلي (باستخدام <code>intdiv</code>).</div>
    <div class="en">🇬🇧 <b>Task:</b> reverse a number like 1234 into 4321. <b>Thinking:</b> at each step, extract the last digit (using <code>% 10</code>), append it to the result, then drop the last digit from the original number (using <code>intdiv</code>).</div>
</div>
<pre><code>&lt;?php
function reverseNumber(int $n): int {
    $reversed = 0;
    while ($n > 0) {
        $digit = $n % 10;
        $reversed = $reversed * 10 + $digit;
        $n = intdiv($n, 10);
    }
    return $reversed;
}

echo reverseNumber(1234) . PHP_EOL;
echo reverseNumber(900) . PHP_EOL;</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">4321
9</div>

<h2>مشكلة 6: هل الكلمة Palindrome؟</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>المطلوب:</b> تتحقق هل كلمة بتتقرا نفسها من الآخر للأول (زي "level"). <b>التفكير:</b> اقلب الكلمة بدالة <code>strrev</code> وقارنها بالأصل — لو متطابقين، يبقى Palindrome.</div>
    <div class="en">🇬🇧 <b>Task:</b> check if a word reads the same backward (like "level"). <b>Thinking:</b> reverse the word with <code>strrev</code> and compare it to the original — if identical, it's a Palindrome.</div>
</div>
<pre><code>&lt;?php
function isPalindrome(string $word): bool {
    $clean = strtolower(str_replace(' ', '', $word));
    return $clean === strrev($clean);
}

foreach (["level", "hello", "madam"] as $w) {
    echo "$w: " . (isPalindrome($w) ? "palindrome" : "not palindrome") . PHP_EOL;
}</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">level: palindrome
hello: not palindrome
madam: palindrome</div>

<h2>مشكلة 7: FizzBuzz — السؤال الأشهر في مقابلات الشغل</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>المطلوب:</b> اطبع أرقام من 1 لـ 15، لكن: مضاعفات 3 اطبع "Fizz"، مضاعفات 5 اطبع "Buzz"، مضاعفات الاتنين مع بعض (يعني 15) اطبع "FizzBuzz". <b>التفكير:</b> الترتيب مهم جدًا — لازم تتحقق من الشرط المشترك (÷15) الأول، قبل ما تتحقق من ÷3 أو ÷5 لوحدهم.</div>
    <div class="en">🇬🇧 <b>Task:</b> print numbers 1 to 15, but: multiples of 3 print "Fizz", multiples of 5 print "Buzz", multiples of both (i.e. 15) print "FizzBuzz". <b>Thinking:</b> order matters a lot — you must check the combined condition (÷15) first, before checking ÷3 or ÷5 alone.</div>
</div>
<pre><code>&lt;?php
for ($i = 1; $i <= 15; $i++) {
    if ($i % 15 === 0) {
        echo "FizzBuzz" . PHP_EOL;
    } elseif ($i % 3 === 0) {
        echo "Fizz" . PHP_EOL;
    } elseif ($i % 5 === 0) {
        echo "Buzz" . PHP_EOL;
    } else {
        echo $i . PHP_EOL;
    }
}</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">1
2
Fizz
4
Buzz
Fizz
7
8
Fizz
Buzz
11
Fizz
13
14
FizzBuzz</div>

<h2>مشكلة 8: أكبر رقم في مصفوفة</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>المطلوب:</b> تلاقي أكبر رقم في مجموعة أرقام. <b>التفكير:</b> ابدأ بافتراض إن أول عنصر هو الأكبر، وامشي على الباقي — أي رقم أكبر من "الأكبر الحالي" يبقى هو الأكبر الجديد.</div>
    <div class="en">🇬🇧 <b>Task:</b> find the largest number in a collection. <b>Thinking:</b> start by assuming the first element is the largest, then walk through the rest — any number bigger than the "current largest" becomes the new largest.</div>
</div>
<pre><code>&lt;?php
function findMax(array $numbers): int {
    $max = $numbers[0];
    foreach ($numbers as $n) {
        if ($n > $max) {
            $max = $n;
        }
    }
    return $max;
}

echo findMax([3, 55, 12, 8, 91, 4]) . PHP_EOL;</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">91</div>

<h2>مشكلة 9: أكبر قاسم مشترك (GCD)</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>المطلوب:</b> دالة ترجع أكبر رقم بيقسم رقمين معًا من غير باقي — زي GCD(48, 18) = 6. <b>التفكير:</b> نستخدم خوارزمية إقليدس (Euclidean Algorithm)، وهي واحدة من أقدم الخوارزميات في التاريخ: طول ما <code>$b</code> مش صفر، خد باقي قسمة <code>$a</code> على <code>$b</code>، وحوّل <code>$a</code> لقيمة <code>$b</code> و<code>$b</code> للباقي، وكرر. لما <code>$b</code> يوصل صفر، <code>$a</code> هو الجواب.</div>
    <div class="en">🇬🇧 <b>Task:</b> a function returning the largest number dividing two numbers with no remainder — e.g. GCD(48, 18) = 6. <b>Thinking:</b> use the Euclidean Algorithm, one of the oldest algorithms in history: while <code>$b</code> isn't zero, take the remainder of <code>$a</code> divided by <code>$b</code>, then shift <code>$a</code> to <code>$b</code>'s value and <code>$b</code> to that remainder, repeat. When <code>$b</code> hits zero, <code>$a</code> is the answer.</div>
</div>

<div class="flow-diagram">
    <div class="flow-box">gcd(48, 18)</div>
    <div class="flow-arrow">↓ 48 % 18 = 12</div>
    <div class="flow-box">gcd(18, 12)</div>
    <div class="flow-arrow">↓ 18 % 12 = 6</div>
    <div class="flow-box">gcd(12, 6)</div>
    <div class="flow-arrow">↓ 12 % 6 = 0</div>
    <div class="flow-box">b = 0 → return a = 6</div>
</div>

<pre><code>&lt;?php
function gcd(int $a, int $b): int {
    while ($b !== 0) {
        $remainder = $a % $b;
        $a = $b;
        $b = $remainder;
    }
    return $a;
}

echo gcd(48, 18) . PHP_EOL;
echo gcd(17, 5) . PHP_EOL;</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">6
1</div>
<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ <code>gcd(17, 5)</code> رجّعت 1 — معناه إن 17 و5 "أوّليان نسبيًا" (Coprime)، مفيش بينهم قاسم مشترك غير الواحد. خوارزمية إقليدس دي بتتحل بحلقة (زي هنا) أو بالتكرارية، وهتشوفها تاني كمرجع في مسائل تانية زي تبسيط الكسور.</div>
    <div class="en">🇬🇧 Notice <code>gcd(17, 5)</code> returned 1 — meaning 17 and 5 are "coprime," sharing no common divisor but 1. The Euclidean algorithm can be solved with a loop (as here) or recursively, and you'll see it referenced again in problems like simplifying fractions.</div>
</div>

<h2 id="practice">💻 جرّب بنفسك / Try It Yourself</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 المحرر تحت فيه دالة <code>isPrime</code> اللي شفتها فوق، جاهزة تعدّل وتشغّل. جرّب تضيف أرقام تانية للمصفوفة، أو تتحقق يدويًا هل النتيجة منطقية.</div>
    <div class="en">🇬🇧 The editor below has the <code>isPrime</code> function from above, ready to edit and run. Try adding more numbers to the array, or manually double-check whether the result makes sense.</div>
</div>

<div class="mini-editor-wrap">
    <textarea spellcheck="false">&lt;?php
function isPrime(int $n): bool {
    if ($n < 2) {
        return false;
    }
    for ($i = 2; $i * $i <= $n; $i++) {
        if ($n % $i === 0) {
            return false;
        }
    }
    return true;
}

foreach ([1, 2, 9, 17, 20] as $n) {
    echo "$n: " . (isPrime($n) ? "prime" : "not prime") . PHP_EOL;
}</textarea>
    <div class="mini-toolbar">
        <button class="mini-run-btn">▶ شغّل / Run</button>
        <span class="mini-status"></span>
    </div>
    <div class="output-box">— لسه متشغلش / not run yet —</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="15">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">في مشكلة FizzBuzz، ليه لازم نتحقق من <code>$i % 15 === 0</code> قبل ما نتحقق من <code>% 3</code> أو <code>% 5</code> لوحدهم؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">In FizzBuzz, why must we check <code>$i % 15 === 0</code> before checking <code>% 3</code> or <code>% 5</code> alone?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="15"> لأن 15 هي مضاعف الاتنين معًا وأكثر تحديدًا / because 15 is the combined, more specific case</label>
        <label><input type="radio" name="q1" value="speed"> عشان الكود يشتغل أسرع / to make the code run faster</label>
        <label><input type="radio" name="q1" value="random"> الترتيب مش مهم خالص / the order doesn't matter at all</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="sqrt">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">في <code>isPrime</code>، ليه بنوقف التجربة عند <code>$i * $i &lt;= $n</code> بدل ما نكمل لحد <code>$n</code> نفسه؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">In <code>isPrime</code>, why stop trying at <code>$i * $i &lt;= $n</code> instead of going all the way to <code>$n</code>?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="sqrt"> لو مفيش قاسم أقل من الجذر التربيعي، مفيش قاسم أكبر منه برضو / if no divisor exists below the square root, none exists above it either</label>
        <label><input type="radio" name="q2" value="syntax"> لازم كده في PHP / PHP requires it syntactically</label>
        <label><input type="radio" name="q2" value="random2"> مفيش سبب حقيقي، بس أسهل في الكتابة / no real reason, just easier to write</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="five">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">إيه ناتج <code>gcd(0, 5)</code> على منطق دالة <code>gcd</code> اللي فوق؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What does <code>gcd(0, 5)</code> return, given the <code>gcd</code> function above?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="zero"> 0</label>
        <label><input type="radio" name="q3" value="five"> 5 (لأن 0 % 5 = 0 فتوقف الحلقة على الفور و<code>$a</code> بقى 5) / 5 (since 0 % 5 = 0, the loop stops immediately and <code>$a</code> becomes 5)</label>
        <label><input type="radio" name="q3" value="error"> Error، لأن مينفعش تقسم على صفر / Error, because you can't divide by zero</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="order">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">لو بدّلنا ترتيب السطرين جوه الحلقة كده: <code>$b = $remainder; $a = $b;</code> بدل <code>$a = $b; $b = $remainder;</code>، هل <code>gcd(48, 18)</code> هترجع 6 برضو؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">If we swap the two lines to <code>$b = $remainder; $a = $b;</code> instead of <code>$a = $b; $b = $remainder;</code>, will <code>gcd(48, 18)</code> still return 6?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="same"> آه، الترتيب مش مهم / Yes, order doesn't matter</label>
        <label><input type="radio" name="q4" value="order"> لأ، هترجع 0 غلط — لأن <code>$a</code> هياخد القيمة الجديدة لـ <code>$b</code> بدل القيمة القديمة / No, it wrongly returns 0 — because <code>$a</code> ends up taking <code>$b</code>'s new value instead of its old one</label>
        <label><input type="radio" name="q4" value="samevalue"> آه هترجع 6 برضو بس أبطأ شوية / Yes, still 6, just slightly slower</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ ابني حاسبة إحصائيات لمصفوفة / Build an Array Stats Calculator</h3>
    <div class="ar">🇪🇬 في <a href="../playground/index.php">محرر الكود</a> (أو المحرر المصغّر فوق)، ابني دالة <code>arrayStats(array $numbers): array</code> ترجع مصفوفة جمعية فيها 3 مفاتيح: <code>min</code> (أصغر رقم)، <code>max</code> (أكبر رقم)، و<code>average</code> (المتوسط). استخدم نفس أسلوب "الأكبر رقم" اللي شفناه فوق، بس اعمل نسخة لأصغر رقم كمان، وحسّب المتوسط بقسمة المجموع على العدد.</div>
    <div class="en">🇬🇧 In the <a href="../playground/index.php">Playground</a> (or the mini editor above), build a function <code>arrayStats(array $numbers): array</code> returning an associative array with 3 keys: <code>min</code>, <code>max</code>, and <code>average</code>. Use the same "find the largest" pattern shown above, but also track the smallest, and compute the average as sum divided by count.</div>
</div>

<div class="exercise-box">
    <h3>✍️ تمارين إضافية / More Exercises to Try Yourself</h3>
    <div class="ar">🇪🇬 في <a href="../playground/index.php">محرر الكود</a>، جرّب تحل المشاكل دي بنفسك من غير ما تشوف حل جاهز: 1) دالة تحسب <code>factorial</code> لرقم (5! = 5×4×3×2×1). 2) دالة ترجع أصغر رقم في مصفوفة. 3) دالة تعد عدد الحروف المتحركة (a, e, i, o, u) في كلمة إنجليزية.</div>
    <div class="en">🇬🇧 In the <a href="../playground/index.php">Playground</a>, try solving these yourself without looking at a solution: 1) a function computing the <code>factorial</code> of a number (5! = 5×4×3×2×1). 2) a function returning the smallest number in an array. 3) a function counting vowels (a, e, i, o, u) in an English word.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 المشاكل الكلاسيكية اللي حليتها هنا (زوجي/فردي، أوّلي، FizzBuzz) مش تمارين معزولة — نفس أنماط التفكير دي (شروط متسلسلة، متغيرات تجميع) بتتكرر جوه برامج أكبر، زي الآلة الحاسبة وعدّاد تكرار الكلمات اللي هتبنيهم في مرحلة "البرامج التطبيقية" (Applications).</div>
    <div class="en">🇬🇧 The classic problems you solved here (even/odd, prime, FizzBuzz) aren't isolated drills — these same thinking patterns (chained conditions, accumulator variables) reappear inside larger programs, like the calculator and word-frequency counter you'll build in the Applications stage.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>قبل ما تكتب كود، فكّك المشكلة لخطوات بسيطة بالكلام العادي الأول.</li>
        <li><code>%</code> (Modulo) بيديك الباقي — مفيد جدًا لأي مسألة "زوجي/فردي" أو "مضاعفات".</li>
        <li>متغيرات "تجميع" (Accumulator) زي <code>$sum</code> أو <code>$max</code> بتتحدث جوه الحلقة خطوة بخطوة.</li>
        <li>ترتيب شروط <code>if/elseif</code> مهم — الشرط الأكثر تحديدًا (زي ÷15) لازم يتحقق منه الأول.</li>
        <li>نفس الأدوات القليلة (if, loops, functions) قادرة تحل مشاكل متنوعة جدًا لما تتركب صح.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="language.php">← المرحلة السابقة</a>
    <a href="problem-solving-2.php">المرحلة الجاية / Next: Problem Solving — Level 2 →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
