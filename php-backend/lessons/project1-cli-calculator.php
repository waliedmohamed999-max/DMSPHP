<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'project1-cli-calculator';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = '🚀 مشروع 1: آلة حاسبة CLI — PHP CLI Calculator';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">Stage 18 · Projects</span>
<h1>🚀 مشروع 1: آلة حاسبة CLI <span class="ltr">🚀 Project 1: PHP CLI Calculator</span></h1>
<p class="subtitle">أول مشروع حقيقي — آلة حاسبة تشتغل من التيرمينال، تطبّق عليها فنكشنز ومعالجة أخطاء.</p>

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
    <div class="ar">🇪🇬 خلاص خلّصت النظرية الأساسية والـ Debugging Lab. دلوقتي هتبني أول مشروع حقيقي كامل من الصفر: آلة حاسبة بتشتغل من التيرمينال (CLI = Command Line Interface)، بتطبّق فيها أربع عمليات حسابية كدوال منفصلة، وبتتعامل مع الأخطاء (زي القسمة على صفر) بطريقة منظمة بـ Exceptions بدل ما تسيب البرنامج ينهار.</div>
    <div class="en">🇬🇧 You've finished the core fundamentals and the Debugging Lab. Now you'll build your first complete project from scratch: a calculator that runs from the terminal (CLI = Command Line Interface), implementing four arithmetic operations as separate functions, and handling errors (like division by zero) in a structured way using Exceptions instead of letting the program crash.</div>
</div>

<h2 id="understand">🧠 المواصفات المطلوبة / Requirements</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 المشروع لازم يحقق النقط دي:</div>
</div>
<div class="recap-box">
    <h3>📋 قائمة المتطلبات / Checklist</h3>
    <ul>
        <li>أربع دوال منفصلة: <code>add()</code>، <code>subtract()</code>، <code>multiply()</code>، <code>divide()</code> — كل واحدة بمدخلات ومخرج <code>float</code> محدد النوع.</li>
        <li><code>divide()</code> لازم ترمي <code>Exception</code> (أو نوع فرعي منها) لو المقسوم عليه صفر — مش ترجع <code>0</code> أو <code>false</code> بصمت.</li>
        <li>حلقة (<code>foreach</code>) بتعالج قايمة عمليات متعددة واحدة ورا التانية، وبتستمر حتى لو عملية فيها خطأ (بـ <code>try/catch</code>) بدل ما توقف البرنامج كله.</li>
        <li>كل نتيجة (أو رسالة خطأ) بتتطبع بشكل واضح تقدر تفهمه من غير ما ترجع للكود.</li>
    </ul>
</div>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>ملاحظة صريحة عن الإدخال:</b> في تيرمينال حقيقي، هتستخدم <code>readline()</code> عشان تقرا كل عملية من المستخدم لحظة بلحظة، زي: <code>$op = readline("Operation: ");</code>. لكن محرر الكود المصغّر هنا (وأي Playground تشغيل عن بعد) مبيدعمش إدخال تفاعلي حقيقي من الـ Terminal (Interactive stdin) — الكود بيتبعت، يتشغّل، ويرجع الناتج مرة واحدة، من غير حد يقعد يكتب حاجة وهو شغال. عشان كده بنحاكي (Simulate) جلسة مستخدم كاملة بمصفوفة <code>$operations</code> مُجهّزة مسبقًا بدل الانتظار على إدخال حي — نفس منطق الحاسبة بالظبط، غير طريقة وصول البيانات بس.</div>
    <div class="en">🇬🇧 <b>An honest note about input:</b> in a real terminal, you'd use <code>readline()</code> to read each operation from the user live, like <code>$op = readline("Operation: ");</code>. But the mini-editor here (and any remote-execution playground) doesn't support real interactive terminal input (interactive stdin) — code is sent, executed, and its output returned all at once, with no one typing while it runs. So we simulate a full user session with a pre-built <code>$operations</code> array instead of waiting on live input — the exact same calculator logic, just a different way the data arrives.</div>
</div>

<h2 id="practice">💻 التنفيذ / Implementation</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 كل دالة عملية بسيطة وواضحة الغرض. <code>divide()</code> هي الوحيدة اللي فيها منطق إضافي: تتحقق من المقسوم عليه قبل ما تقسم، ولو كان صفر بترمي <code>InvalidArgumentException</code> (نوع فرعي من <code>Exception</code> مخصص بالظبط لمدخلات غلط). الحلقة الرئيسية بتلف على كل عملية، تستخدم <code>match</code> لاختيار الدالة المناسبة، ولافّة بـ <code>try/catch</code> عشان لو عملية واحدة فشلت، الباقي يكمل عادي.</div>
    <div class="en">🇬🇧 Each operation function is simple and single-purpose. <code>divide()</code> is the only one with extra logic: it checks the divisor before dividing, and throws an <code>InvalidArgumentException</code> (a subtype of <code>Exception</code> made exactly for invalid arguments) if it's zero. The main loop iterates over every operation, uses <code>match</code> to pick the right function, and wraps the call in <code>try/catch</code> so one failing operation doesn't stop the rest from running.</div>
</div>

<pre><code>&lt;?php
function add(float $a, float $b): float { return $a + $b; }
function subtract(float $a, float $b): float { return $a - $b; }
function multiply(float $a, float $b): float { return $a * $b; }
function divide(float $a, float $b): float {
    if ($b == 0) {
        throw new InvalidArgumentException("Division by zero is not allowed.");
    }
    return $a / $b;
}

// In a real terminal you'd read these one at a time with readline(), e.g.:
//   $op = readline("Operation (add/subtract/multiply/divide/quit): ");
// Interactive stdin doesn't work in this online mini-editor/playground, so we
// simulate a full user session with a hardcoded list of operations instead --
// the calculator logic below is identical either way.
$operations = [
    ['op' => 'add',      'a' => 12, 'b' => 8],
    ['op' => 'subtract', 'a' => 20, 'b' => 5],
    ['op' => 'multiply', 'a' => 6,  'b' => 7],
    ['op' => 'divide',   'a' => 10, 'b' => 2],
    ['op' => 'divide',   'a' => 9,  'b' => 0], // triggers the error path on purpose
];

foreach ($operations as $i => $entry) {
    $n = $i + 1;
    ['op' => $op, 'a' => $a, 'b' => $b] = $entry;
    try {
        $result = match ($op) {
            'add'      => add($a, $b),
            'subtract' => subtract($a, $b),
            'multiply' => multiply($a, $b),
            'divide'   => divide($a, $b),
            default    => throw new InvalidArgumentException("Unknown operation: $op"),
        };
        echo "#$n: $a $op $b = $result" . PHP_EOL;
    } catch (InvalidArgumentException $e) {
        echo "#$n: $a $op $b -> Error: " . $e->getMessage() . PHP_EOL;
    }
}</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">#1: 12 add 8 = 20
#2: 20 subtract 5 = 15
#3: 6 multiply 7 = 42
#4: 10 divide 2 = 5
#5: 9 divide 0 -> Error: Division by zero is not allowed.</div>

<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ إن العملية #5 اترمت فيها Exception، بس البرنامج ما وقفش — الـ <code>try/catch</code> جوه الحلقة لقط الخطأ، طبع رسالة واضحة، وكمل على باقي العمليات لو كانت موجودة. ده الفرق بين برنامج "بيقع" وبرنامج "بيتعامل مع المشاكل بشكل احترافي".</div>
    <div class="en">🇬🇧 Notice operation #5 threw an exception, but the program didn't stop — the <code>try/catch</code> inside the loop caught the error, printed a clear message, and moved on to any remaining operations. That's the difference between a program that "crashes" and one that "handles problems professionally".</div>
</div>

<div class="bi-block">
    <div class="ar">🇪🇬 جرّب الكود ده بنفسك تحت — غيّر الأرقام، زوّد عملية جديدة للمصفوفة، أو خلّي <code>$b</code> يبقى صفر في عملية تانية وشوف الـ Exception بتتلقط في كل مرة.</div>
    <div class="en">🇬🇧 Try it yourself below — change the numbers, add a new operation to the array, or make <code>$b</code> zero in a different operation and watch the exception get caught every time.</div>
</div>

<div class="mini-editor-wrap">
    <textarea spellcheck="false">&lt;?php
function add(float $a, float $b): float { return $a + $b; }
function subtract(float $a, float $b): float { return $a - $b; }
function multiply(float $a, float $b): float { return $a * $b; }
function divide(float $a, float $b): float {
    if ($b == 0) {
        throw new InvalidArgumentException("Division by zero is not allowed.");
    }
    return $a / $b;
}

$operations = [
    ['op' => 'add',      'a' => 12, 'b' => 8],
    ['op' => 'subtract', 'a' => 20, 'b' => 5],
    ['op' => 'multiply', 'a' => 6,  'b' => 7],
    ['op' => 'divide',   'a' => 10, 'b' => 2],
    ['op' => 'divide',   'a' => 9,  'b' => 0],
];

foreach ($operations as $i => $entry) {
    $n = $i + 1;
    ['op' => $op, 'a' => $a, 'b' => $b] = $entry;
    try {
        $result = match ($op) {
            'add'      => add($a, $b),
            'subtract' => subtract($a, $b),
            'multiply' => multiply($a, $b),
            'divide'   => divide($a, $b),
            default    => throw new InvalidArgumentException("Unknown operation: $op"),
        };
        echo "#$n: $a $op $b = $result" . PHP_EOL;
    } catch (InvalidArgumentException $e) {
        echo "#$n: $a $op $b -> Error: " . $e->getMessage() . PHP_EOL;
    }
}</textarea>
    <div class="mini-toolbar">
        <button class="mini-run-btn">▶ شغّل / Run</button>
        <span class="mini-status"></span>
    </div>
    <div class="output-box">— لسه متشغلش / not run yet —</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="exception">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">إزاي المفروض <code>divide()</code> تتعامل مع القسمة على صفر؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">How should <code>divide()</code> handle division by zero?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="zero"> ترجع 0 بصمت</label>
        <label><input type="radio" name="q1" value="exception"> ترمي Exception بتوضّح المشكلة</label>
        <label><input type="radio" name="q1" value="false"> ترجع false</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="continues">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">في مثال العمليات فوق، بعد ما العملية #5 (القسمة على صفر) ترمي Exception، إيه اللي بيحصل للحلقة؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">In the example above, after operation #5 throws, what happens to the loop?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="stops"> البرنامج كله بيتوقف فورًا</label>
        <label><input type="radio" name="q2" value="continues"> الـ try/catch بيلقط الخطأ والحلقة تكمل</label>
        <label><input type="radio" name="q2" value="silent"> الخطأ بيتجاهل بصمت</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="simulate">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">ليه المشروع ده بيستخدم مصفوفة <code>$operations</code> مُجهّزة مسبقًا بدل <code>readline()</code>؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Why does this project use a pre-built <code>$operations</code> array instead of <code>readline()</code>?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="simulate"> لأن المحرر المصغّر مبيدعمش إدخال تفاعلي حقيقي (Interactive stdin)</label>
        <label><input type="radio" name="q3" value="faster"> عشان الكود يشتغل أسرع بس</label>
        <label><input type="radio" name="q3" value="required"> readline() مش موجودة في PHP أصلاً</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="42">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">حسب الناتج الفعلي فوق، عملية <code>multiply(6, 7)</code> رجّعت كام؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Per the actual output above, what did <code>multiply(6, 7)</code> return?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="13"> 13</label>
        <label><input type="radio" name="q4" value="42"> 42</label>
        <label><input type="radio" name="q4" value="error"> Error</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ زوّد عملية جديدة / Add a New Operation</h3>
    <div class="ar">🇪🇬 في المحرر المصغّر فوق (أو <a href="../playground/index.php">محرر الكود</a>): زوّد دالة <code>modulo(int $a, int $b): int</code> (باقي القسمة، عملية <code>%</code>) أو <code>power(float $base, float $exp): float</code> (الأس، دالة <code>pow()</code> المدمجة في PHP). لازم الدالة الجديدة تتعامل مع نفس نوع الخطأ لو محتاجة (زي <code>modulo</code> اللي محتاجة نفس فحص القسمة على صفر)، وضيف عملية أو اتنين بيستخدموها في مصفوفة <code>$operations</code> وشوف الناتج.</div>
    <div class="en">🇬🇧 In the mini-editor above (or the <a href="../playground/index.php">Playground</a>): add a <code>modulo(int $a, int $b): int</code> function (remainder, the <code>%</code> operator) or a <code>power(float $base, float $exp): float</code> function (exponent, using PHP's built-in <code>pow()</code>). The new function should handle errors the same way where relevant (e.g. <code>modulo</code> needs the same divide-by-zero check), and add one or two operations using it to the <code>$operations</code> array to see the result.</div>
</div>

<h2 id="project">🚀 المشروع الجاي / Next Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 الحاسبة دي كانت أول مشروع كامل من الصفر — مدخلات، دوال، ومعالجة أخطاء. في المشروع الجاي هتاخد خطوة قدام: بدل أرقام هتتعامل مع مدخلات مستخدم حقيقية (اسم، إيميل، رسالة) من فورم تواصل، وهتكتب منطق Validation كامل بيرفض المدخلات الغلط برسائل خطأ واضحة — نفس فكرة "لو المدخل غلط، ارمي/ارجع خطأ واضح" اللي استخدمتها هنا مع <code>divide()</code>، بس على مستوى فورم كامل.</div>
    <div class="en">🇬🇧 This calculator was your first complete project from scratch — input, functions, and error handling. In the next project you'll take a step forward: instead of numbers, you'll handle real user input (name, email, message) from a contact form, and write full validation logic that rejects bad input with clear error messages — the same "if the input is invalid, raise/return a clear error" idea you used here with <code>divide()</code>, applied to a full form.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>كل عملية حسابية دالة منفصلة بمدخلات ومخرج <code>float</code> محدد النوع.</li>
        <li><code>divide()</code> بترمي <code>InvalidArgumentException</code> عند القسمة على صفر بدل ما ترجع نتيجة غلط بصمت.</li>
        <li><code>try/catch</code> جوه حلقة <code>foreach</code> بيخلّي عملية واحدة فاشلة متوقفش باقي العمليات.</li>
        <li>مفيش إدخال تفاعلي حقيقي (readline) في المحرر — بنحاكيه بمصفوفة عمليات مُجهّزة مسبقًا.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="code-review-challenge.php">← تحدي مراجعة الكود</a>
    <a href="project2-contact-form.php">المشروع 2 / Next: Contact Form →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
