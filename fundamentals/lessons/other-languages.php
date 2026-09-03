<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'other-languages';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'نظرة على لغات أخرى';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">المرحلة 12 / Stage 12</span>
<h1>نظرة على لغات أخرى <span class="ltr">A Look at Other Languages</span></h1>
<p class="subtitle">اتعلمت PHP، لكن المبادئ اللي اتعلمتها (متغيرات، شروط، حلقات، دوال، تكرارية) موجودة في كل لغة برمجة تقريبًا. عشان تشوف ده بعينك، هنكتب نفس البرنامج الشهير — FizzBuzz — بتلات لغات مختلفة: PHP، Python، وJavaScript، ونقارن بينهم.</p>

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
    <div class="ar">🇪🇬 تفهم إن "تعلّم لغة برمجة جديدة" بعد PHP مش هيبقى بدايةً من الصفر — هتبقى بتتعلم "بناء الجملة" (Syntax) الجديد بس، لأن المنطق نفسه اللي في دماغك خلاص جاهز.</div>
    <div class="en">🇬🇧 Understand that learning a new programming language after PHP won't start from zero — you'll just be learning new syntax, because the logic itself is already in your head.</div>
</div>

<div class="flow-diagram">
    <div class="flow-box">Same logic (loop + condition)</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">PHP syntax / Python syntax / JS syntax</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">Identical output</div>
</div>

<h2 id="understand">FizzBuzz بلغة PHP</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 الكود اللي شفناه قبل كده في مرحلة حل المشكلات — اطبع الأرقام من 1 لـ 15، مع استبدال مضاعفات 3 بـ "Fizz"، مضاعفات 5 بـ "Buzz"، ومضاعفات الاتنين بـ "FizzBuzz".</div>
    <div class="en">🇬🇧 The code we saw earlier in Problem Solving — print numbers 1 to 15, replacing multiples of 3 with "Fizz", multiples of 5 with "Buzz", and multiples of both with "FizzBuzz".</div>
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
<h3>الناتج الفعلي / Actual output (PHP — verified)</h3>
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

<h2>نفس البرنامج بلغة Python</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 Python مفيهاش أقواس <code>{}</code> للكتل الشرطية أو الحلقات — بدل كده، بتعتمد على المسافات البادئة (Indentation) عشان تحدد إيه اللي جوه الشرط أو الحلقة. وبرضو مفيش <code>$</code> قبل أسماء المتغيرات.</div>
    <div class="en">🇬🇧 Python has no <code>{}</code> braces for conditional or loop blocks — it relies on indentation to define what's inside a condition or loop. There's also no <code>$</code> before variable names.</div>
</div>
<pre><code>for i in range(1, 16):
    if i % 15 == 0:
        print("FizzBuzz")
    elif i % 3 == 0:
        print("Fizz")
    elif i % 5 == 0:
        print("Buzz")
    else:
        print(i)</code></pre>
<h3>الناتج الفعلي / Actual output (Python — verified)</h3>
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
<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ إن الناتج متطابق حرفيًا مع PHP — نفس المنطق بالظبط، بس بشكل كتابة مختلف. <code>range(1, 16)</code> بتولّد أرقام من 1 لحد 15 (16 مش متضمن)، و<code>==</code> في Python هي المكافئ لـ <code>===</code> في PHP للمقارنة بين نفس النوع.</div>
    <div class="en">🇬🇧 Notice the output is literally identical to PHP — the exact same logic, just different syntax. <code>range(1, 16)</code> generates numbers 1 through 15 (16 excluded), and Python's <code>==</code> is the equivalent of PHP's <code>===</code> for same-type comparison.</div>
</div>

<h2>نفس البرنامج بلغة JavaScript</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 JavaScript شكلها قريب جدًا من PHP في هياكل التحكم (أقواس <code>{}</code>، بناء <code>for</code> نفسه)، لكن المتغيرات بتتعرف بـ <code>let</code> أو <code>const</code> بدل <code>$</code>، والطباعة بتكون بـ <code>console.log</code> بدل <code>echo</code>.</div>
    <div class="en">🇬🇧 JavaScript looks very close to PHP in its control structures (<code>{}</code> braces, the same <code>for</code> construct), but variables are declared with <code>let</code> or <code>const</code> instead of <code>$</code>, and output uses <code>console.log</code> instead of <code>echo</code>.</div>
</div>
<pre><code>for (let i = 1; i <= 15; i++) {
    if (i % 15 === 0) {
        console.log("FizzBuzz");
    } else if (i % 3 === 0) {
        console.log("Fizz");
    } else if (i % 5 === 0) {
        console.log("Buzz");
    } else {
        console.log(i);
    }
}</code></pre>
<div class="bi-block">
    <div class="ar">🇪🇬 ملحوظة: الكود ده معروض هنا للمقارنة البصرية بس، ومتأكدناش من ناتجه فعليًا بتشغيل JavaScript (عكس PHP وPython اللي شغّلناهم فعلًا وطلع الناتج مطابق تمامًا). لو عايز تتأكد بنفسك، جرّبه في Console المتصفح (اضغط F12) أو في Node.js.</div>
    <div class="en">🇬🇧 Note: this code is shown here for visual comparison only, and we did not actually run it to verify its output (unlike PHP and Python, which we did run and confirmed produce identical output). If you want to verify it yourself, try it in your browser's Console (press F12) or in Node.js.</div>
</div>

<h2>إيه اللي اختلف، وإيه اللي فضل زي ما هو؟</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>اللي اختلف:</b> شكل التعليقات، طريقة تعريف المتغيرات، وجود أقواس من عدمها، طريقة الطباعة. <b>اللي فضل زي ما هو تمامًا:</b> فكرة الحلقة (كرر N مرة)، فكرة الشرط المتسلسل (تحقق من الحالة الأدق الأول)، وعامل الباقي <code>%</code> ومعناه.</div>
    <div class="en">🇬🇧 <b>What changed:</b> comment style, how variables are declared, whether braces exist, how output works. <b>What stayed exactly the same:</b> the idea of looping (repeat N times), the idea of chained conditions (check the most specific case first), and the modulo operator <code>%</code> and its meaning.</div>
</div>

<h2>مثال تاني: فلترة الأرقام الزوجية <span class="ltr">A Second Comparison: Filtering Even Numbers</span></h2>
<div class="bi-block">
    <div class="ar">🇪🇬 FizzBuzz وضّح إن نفس منطق الحلقات والشروط بيتكرر في كل لغة. المثال ده هيوضّح حاجة مختلفة: أحيانًا اللغات مش بس بتختلف في الشكل، لكن كمان في "الأسلوب" المفضّل عندها لحل نفس المشكلة بالظبط — هنا فلترة الأرقام الزوجية من قائمة.</div>
    <div class="en">🇬🇧 FizzBuzz showed that the same loop-and-condition logic repeats across languages. This example shows something different: sometimes languages don't just differ in shape, but in their preferred "style" for solving the exact same problem — here, filtering even numbers from a list.</div>
</div>
<pre><code>&lt;?php
$numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
$evens = array_filter($numbers, fn($n) => $n % 2 === 0);
echo implode(', ', $evens) . PHP_EOL;</code></pre>
<h3>الناتج الفعلي / Actual output (PHP — verified)</h3>
<div class="output-box">2, 4, 6, 8, 10</div>

<div class="bi-block">
    <div class="ar">🇪🇬 PHP هنا استخدمت <code>array_filter</code> — دالة جاهزة بتاخد دالة "شرط" (Arrow Function <code>fn($n) => ...</code>) كمدخل، بالظبط زي ما اتعلمنا في مرحلة تنفيذ الدوال المتقدمة.</div>
    <div class="en">🇬🇧 PHP here uses <code>array_filter</code> — a built-in taking a predicate function (an arrow function <code>fn($n) => ...</code>) as input, exactly as we learned in the Advanced Function Implementation stage.</div>
</div>

<pre><code>numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10]
evens = [n for n in numbers if n % 2 == 0]
print(', '.join(str(n) for n in evens))</code></pre>
<h3>الناتج الفعلي / Actual output (Python — verified)</h3>
<div class="output-box">2, 4, 6, 8, 10</div>
<div class="bi-block">
    <div class="ar">🇪🇬 Python استخدمت "List Comprehension" (<code>[n for n in numbers if n % 2 == 0]</code>) — أسلوب مختصر جدًا ومحبوب في بايثون لبناء قائمة جديدة من قائمة موجودة بشرط، في سطر واحد. المنطق مطابق تمامًا لـ <code>array_filter</code>، لكن الشكل مختلف جذريًا — PHP فضّلت "دالة بتاخد دالة"، وPython فضّلت "بناء جملة مخصص" للمهمة الشائعة دي.</div>
    <div class="en">🇬🇧 Python uses a "List Comprehension" (<code>[n for n in numbers if n % 2 == 0]</code>) — a very concise, beloved Python style for building a new filtered list from an existing one in a single line. The logic is identical to <code>array_filter</code>, but the shape is radically different — PHP prefers "a function taking a function," while Python prefers dedicated syntax for this common task.</div>
</div>

<h2 id="practice">💻 جرّب بنفسك / Try It Yourself</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 المحرر تحت فيه نسخة PHP من FizzBuzz — الوحيدة من التلاتة اللي نقدر نشغّلها فعليًا هنا. جرّب تغيّر حدود الحلقة أو تضيف قاعدة جديدة (زي مضاعفات 7 تطبع "Bazz").</div>
    <div class="en">🇬🇧 The editor below has the PHP version of FizzBuzz — the only one of the three we can actually run here. Try changing the loop bounds or adding a new rule (like multiples of 7 printing "Bazz").</div>
</div>

<div class="mini-editor-wrap">
    <textarea spellcheck="false">&lt;?php
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
}</textarea>
    <div class="mini-toolbar">
        <button class="mini-run-btn">▶ شغّل / Run</button>
        <span class="mini-status"></span>
    </div>
    <div class="output-box">— لسه متشغلش / not run yet —</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="indent">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">إزاي Python بتحدد إيه اللي جوه شرط أو حلقة، من غير أقواس <code>{}</code>؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">How does Python define what's inside a condition or loop, without <code>{}</code> braces?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="indent"> بالمسافات البادئة (Indentation)</label>
        <label><input type="radio" name="q1" value="colon"> بعلامة <code>:</code> بس من غير حاجة تانية</label>
        <label><input type="radio" name="q1" value="semicolon"> بالفاصلة المنقوطة <code>;</code></label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="syntax">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">إيه اللي بيتغيّر لما تتعلم لغة جديدة بعد PHP، وإيه اللي بيفضل زي ما هو؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What changes when you learn a new language after PHP, and what stays the same?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="syntax"> الـ Syntax بيتغيّر، لكن منطق الحل (loops, conditions) بيفضل زي ما هو / syntax changes, but the solving logic stays the same</label>
        <label><input type="radio" name="q2" value="logic"> منطق الحل بيتغيّر بالكامل من لغة للتانية / the solving logic changes completely between languages</label>
        <label><input type="radio" name="q2" value="nothing"> كل حاجة بتتغيّر، ولازم تتعلم من الصفر / everything changes, and you must learn from scratch</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="odds">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">لو غيّرنا الشرط في مثال PHP لـ <code>fn($n) => $n % 2 !== 0</code> (بدل <code>=== 0</code>)، إيه الناتج؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">If we changed the PHP condition to <code>fn($n) => $n % 2 !== 0</code> (instead of <code>=== 0</code>), what's the output?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="odds"> 1, 3, 5, 7, 9 — الأرقام الفردية / 1, 3, 5, 7, 9 — the odd numbers</label>
        <label><input type="radio" name="q3" value="same5"> 2, 4, 6, 8, 10 — نفس الناتج القديم / 2, 4, 6, 8, 10 — same as before</label>
        <label><input type="radio" name="q3" value="empty5"> مصفوفة فاضية / an empty array</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="style">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question"><code>array_filter</code> في PHP و List Comprehension في Python بيحلوا نفس المسألة بشكل مختلف — إيه اللي بيوضحه الفرق ده فعليًا؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">PHP's <code>array_filter</code> and Python's List Comprehension solve the same problem differently — what does this difference actually show?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="style"> نفس المنطق تمامًا، لكن كل لغة عندها أسلوب/Syntax مفضّل مختلف لنفس المهمة الشائعة / the exact same logic, but each language has a different preferred style/syntax for the same common task</label>
        <label><input type="radio" name="q4" value="pyfaster"> Python دايمًا أسرع من PHP في فلترة المصفوفات / Python is always faster than PHP at filtering arrays</label>
        <label><input type="radio" name="q4" value="phpcant"> PHP مش قادرة تعمل فلترة بشكل مختصر زي Python خالص / PHP simply can't filter concisely like Python at all</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ ترجم isPrime بنفسك / Translate isPrime Yourself</h3>
    <div class="ar">🇪🇬 اختار مسألة حليتها قبل كده في PHP — "هل الرقم أوّلي؟" من مرحلة حل المشكلات الأولى مثالية — واكتبها بالكامل بلغة Python أو JavaScript على ورقة أو في أي محرر نصوص، من غير ما ترجع تشوف حل PHP. مفيش تنفيذ فعلي مطلوب هنا (المحرر المصغّر فوق PHP بس)؛ الهدف إنك "تكتب" الترجمة صح، مش تشغّلها.</div>
    <div class="en">🇬🇧 Pick a problem you solved earlier in PHP — "is this number prime?" from Problem Solving Level 1 is a great fit — and write it completely in Python or JavaScript on paper or in any text editor, without looking back at the PHP solution. No actual execution is required here (the mini editor above is PHP-only); the goal is writing the translation correctly, not running it.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 القدرة على "قراءة منطق وترجمته لغة تانية" هتفيدك مباشرة وانت بتقرأ كود جاهز في مرحلة "البرامج التطبيقية" (Applications)، وأكتر لما تختار مسارك الجاي من مرحلة "الوظائف البرمجية" وتلاقي نفسك محتاج تتعلم لغة أو Framework جديد بسرعة.</div>
    <div class="en">🇬🇧 The ability to "read logic and translate it to another language" directly helps you when reading existing code in the Applications stage, and even more when you pick your next track from Programming Careers and find yourself needing to pick up a new language or framework quickly.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>نفس المنطق البرمجي بيتكرر في كل اللغات — الاختلاف الحقيقي هو في الـ Syntax بس.</li>
        <li>Python بتعتمد على المسافات البادئة بدل الأقواس.</li>
        <li>JavaScript قريبة جدًا من PHP في شكل هياكل التحكم.</li>
        <li>تعلّم لغة تانية بعد PHP أسرع بكتير من تعلّم PHP نفسها من الصفر.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="applications.php">← المرحلة السابقة</a>
    <a href="databases.php">المرحلة الجاية / Next: Database Fundamentals →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
