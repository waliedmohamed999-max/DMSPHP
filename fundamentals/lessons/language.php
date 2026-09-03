<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'language';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'لغة البرمجة — أساسيات البرمجة';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">المرحلة 1 / Stage 1</span>
<h1>لغة البرمجة <span class="ltr">Programming Language</span></h1>
<p class="subtitle">مفيش أي خبرة سابقة مطلوبة. هنبدأ من أول سؤال: إيه هي البرمجة أصلًا؟ وهنستخدم PHP كلغة نتعلم بيها المبادئ — نفس المبادئ دي هتلاقيها زي ما هي في أي لغة تانية تختارها بعد كده.</p>

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
    <div class="ar">🇪🇬 تفهم إيه معنى "برمجة" أصلًا، تكتب وتشغّل أول برنامج ليك، وتتعلم أربع لبنات بناء موجودة في كل لغة برمجة في الدنيا: المتغيرات، الأنواع، هياكل التحكم، والدوال.</div>
    <div class="en">🇬🇧 Understand what "programming" actually means, write and run your first program, and learn four building blocks that exist in every programming language on earth: variables, types, control structures, and functions.</div>
</div>

<h2 id="understand">إيه هي البرمجة؟ / What is Programming?</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 البرمجة هي إنك تكتب مجموعة تعليمات واضحة ومرتبة للكمبيوتر عشان ينفذها بالظبط زي ما كتبتها — تمامًا زي وصفة طبخ: "حط 2 كوب دقيق، بعدين بيضة، بعدين اخلط". الكمبيوتر غبي جدًا وسريع جدًا في نفس الوقت — هينفذ اللي انت كاتبه بالظبط، مش اللي انت قاصده، فلازم تكون دقيق.</div>
    <div class="en">🇬🇧 Programming means writing a clear, ordered set of instructions for a computer to execute exactly as written — just like a recipe: "add 2 cups of flour, then an egg, then mix." A computer is both extremely dumb and extremely fast at the same time — it executes exactly what you wrote, not what you meant, so precision matters.</div>
</div>
<div class="bi-block">
    <div class="ar">🇪🇬 "لغة البرمجة" هي الوسيلة اللي بتكتب بيها التعليمات دي بطريقة الكمبيوتر يقدر يفهمها. هنستخدم <b>PHP</b> هنا لإنها بسيطة وسهلة تشوف نتيجتها فورًا، لكن أساسيات البرمجة اللي هتتعلمها دلوقتي (متغيرات، شروط، حلقات، دوال) موجودة بنفس المعنى بالظبط في Python وJavaScript وC++ وأي لغة تانية.</div>
    <div class="en">🇬🇧 A "programming language" is the medium you write these instructions in so the computer can understand them. We use <b>PHP</b> here because it's simple and shows results instantly, but the fundamentals you'll learn now (variables, conditions, loops, functions) exist with the exact same meaning in Python, JavaScript, C++, and every other language.</div>
</div>

<h2>1) أول برنامج / Your First Program</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 كل ملف PHP بيبدأ بـ <code>&lt;?php</code> عشان يقول للسيرفر "اللي جاي ده كود PHP، نفّذه". الأمر <code>echo</code> بيطبع حاجة على الشاشة. أي سطر بيبدأ بـ <code>//</code> هو "تعليق" — ملاحظة للبشر بس، الكمبيوتر بيتجاهلها تمامًا.</div>
    <div class="en">🇬🇧 Every PHP file starts with <code>&lt;?php</code> to tell the server "what follows is PHP code, execute it." The <code>echo</code> command prints something to the screen. Any line starting with <code>//</code> is a "comment" — a note for humans only; the computer ignores it entirely.</div>
</div>

<pre><code>&lt;?php
// ده أول برنامج ليا
echo "أهلاً بيك في عالم البرمجة!";</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">أهلاً بيك في عالم البرمجة!</div>

<h2>2) المتغيرات والأنواع / Variables &amp; Types</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 المتغير هو "صندوق" له اسم بتخزن فيه قيمة عشان تستخدمها تاني بعدين. في PHP بيبدأ اسم المتغير بـ <code>$</code>. كل قيمة ليها "نوع" — نص (<code>string</code>)، رقم صحيح (<code>int</code>)، رقم عشري (<code>float</code>)، أو true/false (<code>bool</code>).</div>
    <div class="en">🇬🇧 A variable is a named "box" that stores a value for later use. In PHP, a variable name starts with <code>$</code>. Every value has a "type" — text (<code>string</code>), whole number (<code>int</code>), decimal number (<code>float</code>), or true/false (<code>bool</code>).</div>
</div>

<pre><code>&lt;?php
$name = "Waleed";
$age = 25;
$height = 1.78;
$isLearning = true;

echo "Name: $name" . PHP_EOL;
echo "Age: $age, type: " . gettype($age) . PHP_EOL;
echo "Height: $height, type: " . gettype($height) . PHP_EOL;
echo "Learning: " . var_export($isLearning, true) . PHP_EOL;</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">Name: Waleed
Age: 25, type: integer
Height: 1.78, type: double
Learning: true</div>

<h2>3) هياكل التحكم / Control Structures</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 أي برنامج محتاج ياخد "قرارات" (لو كذا اعمل كذا) ويكرر عمل حاجة (كذا مرة). دي أهم فكرة في البرمجة كلها — القدرة على التحكم في تدفق التنفيذ بدل ما الكود يمشي من فوق لتحت بس.</div>
    <div class="en">🇬🇧 Any program needs to make "decisions" (if this then that) and repeat an action (do this N times). This is the single most important idea in programming — the ability to control execution flow instead of code just running top to bottom.</div>
</div>

<div class="flow-diagram">
    <div class="flow-box">Start</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">Check condition (if)</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">Repeat action (for)</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">Continue / End</div>
</div>
<div class="bi-block">
    <div class="ar">🇪🇬 كل برنامج تقريبًا بيمشي بنفس الشكل ده: يبدأ، يتحقق من شرط عشان ياخد قرار، يكرر خطوة معينة عدد مرات محدد، وبعدين يكمل أو يخلص. المثال الجاي بيطبّق بالظبط الشكل ده.</div>
    <div class="en">🇬🇧 Almost every program follows this same shape: it starts, checks a condition to make a decision, repeats a step a set number of times, then continues or ends. The example below applies exactly this shape.</div>
</div>

<pre><code>&lt;?php
$age = 20;

if ($age >= 18) {
    echo "Adult" . PHP_EOL;
} else {
    echo "Minor" . PHP_EOL;
}

for ($i = 1; $i <= 5; $i++) {
    echo "Counting: $i" . PHP_EOL;
}</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">Adult
Counting: 1
Counting: 2
Counting: 3
Counting: 4
Counting: 5</div>

<div class="bi-block">
    <div class="ar">🇪🇬 <code>if</code> شافت إن <code>$age >= 18</code> صح، فطبعت "Adult" ومتحققتش من الـ <code>else</code> خالص. الـ <code>for</code> كرر نفس الجملة 5 مرات، وكل مرة قيمة <code>$i</code> بتزيد واحد — كده وفّرنا كتابة 5 أسطر <code>echo</code> منفصلة.</div>
    <div class="en">🇬🇧 <code>if</code> found <code>$age >= 18</code> true, so it printed "Adult" and never checked the <code>else</code> branch at all. The <code>for</code> repeated the same statement 5 times, incrementing <code>$i</code> by one each time — saving us from writing 5 separate <code>echo</code> lines.</div>
</div>

<h2>4) الدوال / Functions</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 الدالة هي "بلوك كود" ليه اسم، بتكتبه مرة واحدة وتستخدمه أد ما انت عايز من غير ما تكرر نفس الكود. بتاخد مدخلات (Parameters) وممكن ترجع نتيجة (Return).</div>
    <div class="en">🇬🇧 A function is a named block of code you write once and reuse as many times as you want, without repeating the same code. It can take inputs (Parameters) and may return a result (Return).</div>
</div>

<pre><code>&lt;?php
function greet(string $name): string {
    return "Hello, $name!";
}

echo greet("Waleed") . PHP_EOL;
echo greet("Sara") . PHP_EOL;</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">Hello, Waleed!
Hello, Sara!</div>

<h2 id="practice">💻 جرّب بنفسك / Try It Yourself</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 المحرر تحت فيه نفس مثال المتغيرات والأنواع اللي شفته فوق — لكن دلوقتي تقدر تعدّل عليه فعليًا وتشغّله وتشوف الناتج الحقيقي. جرب تغيّر القيم أو تضيف متغير جديد بنوع مختلف.</div>
    <div class="en">🇬🇧 The editor below has the same variables-and-types example from above — but now you can actually edit it and run it to see the real output. Try changing the values or adding a new variable of a different type.</div>
</div>

<div class="mini-editor-wrap">
    <textarea spellcheck="false">&lt;?php
$name = "Waleed";
$age = 25;
$height = 1.78;
$isLearning = true;

echo "Name: $name" . PHP_EOL;
echo "Age: $age, type: " . gettype($age) . PHP_EOL;
echo "Height: $height, type: " . gettype($height) . PHP_EOL;
echo "Learning: " . var_export($isLearning, true) . PHP_EOL;</textarea>
    <div class="mini-toolbar">
        <button class="mini-run-btn">▶ شغّل / Run</button>
        <span class="mini-status"></span>
    </div>
    <div class="output-box">— لسه متشغلش / not run yet —</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="double">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">إيه نوع القيمة <code>1.78</code> في PHP؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What type is the value <code>1.78</code> in PHP?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="integer"> integer</label>
        <label><input type="radio" name="q1" value="double"> double (float)</label>
        <label><input type="radio" name="q1" value="string"> string</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="5">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">في <code>for ($i = 1; $i &lt;= 5; $i++)</code>، كام مرة هيتكرر الجسم بتاع الحلقة؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">In <code>for ($i = 1; $i &lt;= 5; $i++)</code>, how many times does the loop body run?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="4"> 4</label>
        <label><input type="radio" name="q2" value="5"> 5</label>
        <label><input type="radio" name="q2" value="6"> 6</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ ابني دالة isEven كاملة / Build a Complete isEven Function</h3>
    <div class="ar">🇪🇬 استخدم <a href="../playground/index.php">محرر الكود</a> (أو المحرر المصغّر فوق) وابني دالة <code>isEven(int $number): bool</code> ترجع <code>true</code> لو الرقم زوجي و<code>false</code> لو فردي (استخدم <code>%</code>). بعد كده استخدمها جوه <code>foreach</code> على مصفوفة من 6 أرقام مختلفة، واطبع لكل رقم هل هو زوجي ولا فردي.</div>
    <div class="en">🇬🇧 Use the <a href="../playground/index.php">Playground</a> (or the mini editor above) to build a function <code>isEven(int $number): bool</code> that returns <code>true</code> if even, <code>false</code> if odd (use <code>%</code>). Then use it inside a <code>foreach</code> over an array of 6 different numbers, printing whether each is even or odd.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 المتغيرات، الأنواع، هياكل التحكم، والدوال اللي اتعلمتها هنا هي "أبجدية" كل حاجة جاية في المسار ده — من حل المشكلات لحد مرحلة "البرامج التطبيقية" (Applications) اللي هتبني فيها 3 برامج كاملة تستخدم بالظبط نفس الأربع لبنات دي مجمّعة مع بعض في كلاسات ومنطق أعقد.</div>
    <div class="en">🇬🇧 The variables, types, control structures, and functions you learned here are the "alphabet" of everything coming next in this track — from Problem Solving all the way to the Applications stage, where you'll build 3 complete programs using exactly these same four building blocks combined into classes and more complex logic.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>البرمجة = تعليمات دقيقة ومرتبة للكمبيوتر ينفذها بالظبط زي ما كتبتها.</li>
        <li>المتغيرات (<code>$name</code>) بتخزن قيم، وكل قيمة ليها نوع (string, int, float, bool).</li>
        <li>هياكل التحكم (<code>if/else</code>, <code>for</code>) بتاخد قرارات وتكرر تنفيذ كود.</li>
        <li>الدوال بتخليك تكتب كود مرة وتستخدمه أد ما انت عايز.</li>
        <li>المبادئ دي نفسها موجودة في أي لغة برمجة تانية هتتعلمها بعد كده.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <span></span>
    <a href="problem-solving-1.php">المرحلة الجاية / Next: Problem Solving →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
