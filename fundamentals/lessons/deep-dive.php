<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'deep-dive';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'التعمق في اللغة';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">المرحلة 9 / Stage 9</span>
<h1>التعمق في اللغة <span class="ltr">Language Deep Dive</span></h1>
<p class="subtitle">لحد دلوقتي بنستخدم PHP بأسلوب بسيط ومباشر. في المرحلة دي هنشوف 4 مزايا أعمق في اللغة بتفتحلك طرق جديدة تكتب بيها كود — المراجع، الدوال متغيرة العدد، الدوال المجهولة، والمتغيرات الساكنة.</p>

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
    <div class="ar">🇪🇬 تتعرف على مزايا لغوية أعمق مش هتستخدمها كل يوم، لكن لما تحتاجها هتفرق كتير في نظافة وقوة الكود اللي بتكتبه — خصوصًا وانت رايح لمسارات زي الباك إند اللي بتعتمد عليها بكثرة.</div>
    <div class="en">🇬🇧 Learn deeper language features you won't use every day, but which matter a lot for clean, powerful code when you need them — especially as you head toward tracks like Back-End that rely on them heavily.</div>
</div>

<h2 id="understand">1) المراجع <span class="ltr">References (&amp;)</span></h2>
<div class="bi-block">
    <div class="ar">🇪🇬 عادةً لما تمرر متغير لدالة، PHP بتاخد "نسخة" منه — أي تعديل جوه الدالة مش بيأثر على الأصلي. المرجع (<code>&amp;</code>) بيغيّر ده: بدل النسخة، الدالة بتشتغل على "نفس" المتغير الأصلي مباشرة.</div>
    <div class="en">🇬🇧 Normally, when you pass a variable to a function, PHP takes a "copy" of it — changes inside the function don't affect the original. A reference (<code>&amp;</code>) changes this: instead of a copy, the function works directly on the same original variable.</div>
</div>
<pre><code>&lt;?php
function addBonus(array &$scores, int $bonus): void {
    foreach ($scores as &$score) {
        $score += $bonus;
    }
    unset($score);
}

$scores = [10, 20, 30];
addBonus($scores, 5);
echo implode(', ', $scores) . PHP_EOL;

$a = 1;
$b = &$a;
$b = 99;
echo "a = $a" . PHP_EOL;</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">15, 25, 35
a = 99</div>
<div class="bi-block">
    <div class="ar">🇪🇬 لاحظين حاجتين: أولًا، الدالة عدّلت المصفوفة الأصلية مباشرة من غير ما ترجّع حاجة (بفضل <code>&amp;$scores</code>). ثانيًا، <code>unset($score)</code> بعد الـ <code>foreach</code> مهم جدًا — من غيرها، <code>$score</code> بتفضل "مرجع" على آخر عنصر وممكن تسبب مشاكل غريبة لو استخدمت المتغير تاني بعدين.</div>
    <div class="en">🇬🇧 Two things to notice: first, the function modified the original array directly with no return, thanks to <code>&amp;$scores</code>. Second, <code>unset($score)</code> after the <code>foreach</code> is important — without it, <code>$score</code> stays a "reference" to the last element and can cause weird bugs if reused later.</div>
</div>

<h3>⚠️ Gotcha: البق اللي بيحصل فعلًا لو نسيت unset</h3>
<div class="bi-block">
    <div class="ar">🇪🇬 الكلام اللي فات مش نظري — ده بق حقيقي جدًا وشائع. المثال ده بيوريك البق بيحصل بالظبط إزاي: حلقة أولى بمرجع (<code>&amp;$item</code>) من غير <code>unset</code>، وبعدها حلقة تانية "بريئة الشكل" بتقرا بس (من غير <code>&amp;</code>) — لكنها فعليًا بتكتب فوق آخر عنصر في المصفوفة من غير ما تقصد.</div>
    <div class="en">🇬🇧 This isn't theoretical — it's a very real and common bug. This example shows exactly how it happens: a first loop with a reference (<code>&amp;$item</code>) with no <code>unset</code>, followed by a second, innocent-looking read-only loop (no <code>&amp;</code>) — which ends up unintentionally overwriting the array's last element.</div>
</div>
<pre><code>&lt;?php
echo "=== Buggy version (no unset) ===" . PHP_EOL;
$numbers = [1, 2, 3];

foreach ($numbers as &$item) {
    $item *= 2;
}
// BUG: forgot unset($item) here — $item is still a reference to $numbers[2]

echo "After doubling: " . implode(', ', $numbers) . PHP_EOL;

foreach ($numbers as $item) {
    // looks completely harmless — just reading values
}

echo "After an innocent read-only foreach: " . implode(', ', $numbers) . PHP_EOL;</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">=== Buggy version (no unset) ===
After doubling: 2, 4, 6
After an innocent read-only foreach: 2, 4, 4</div>
<div class="bi-block">
    <div class="ar">🇪🇬 شفت المشكلة؟ العنصر الأخير اتحوّل لـ 4 بدل ما يفضل 6! السبب: بعد الحلقة الأولى، <code>$item</code> فضلت "مرجع" (Reference) لآخر عنصر في <code>$numbers</code>. في الحلقة التانية، PHP بتحط كل قيمة من المصفوفة جوه <code>$item</code> في كل تكرار — وبما إن <code>$item</code> دلوقتي هي فعليًا نفس خانة آخر عنصر، فكل تكرار كان بيكتب فوقها. آخر قيمة اتكتبت كانت قيمة العنصر اللي قبل الأخير (4)، فده اللي فضل.</div>
    <div class="en">🇬🇧 See the problem? The last element became 4 instead of staying 6! Why: after the first loop, <code>$item</code> remained a reference to the array's last element. In the second loop, PHP assigns each value into <code>$item</code> on every iteration — and since <code>$item</code> now literally is that last slot, every iteration wrote over it. The last value written was the second-to-last element's value (4), so that's what stuck.</div>
</div>
<pre><code>&lt;?php
echo "=== Fixed version (with unset) ===" . PHP_EOL;
$numbers2 = [1, 2, 3];

foreach ($numbers2 as &$item) {
    $item *= 2;
}
unset($item);

echo "After doubling: " . implode(', ', $numbers2) . PHP_EOL;

foreach ($numbers2 as $item) {
    // safe now
}

echo "After an innocent read-only foreach: " . implode(', ', $numbers2) . PHP_EOL;</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">=== Fixed version (with unset) ===
After doubling: 2, 4, 6
After an innocent read-only foreach: 2, 4, 6</div>
<div class="bi-block">
    <div class="ar">🇪🇬 سطر واحد (<code>unset($item);</code>) هو كل الفرق — بيقطع الرابط بين <code>$item</code> والعنصر الأخير فورًا بعد الحلقة، فالحلقة التانية بترجع تتصرف بشكل طبيعي (مجرد متغير عادي في كل تكرار). القاعدة الذهبية: أي <code>foreach</code> بمرجع (<code>&amp;</code>) لازم <code>unset()</code> على متغيرها فور ما تخلص.</div>
    <div class="en">🇬🇧 One line (<code>unset($item);</code>) is the entire fix — it breaks the link between <code>$item</code> and the last element right after the loop, so the second loop behaves normally again (just an ordinary variable each iteration). The golden rule: any <code>foreach</code> using a reference (<code>&amp;</code>) must <code>unset()</code> its variable the moment it's done.</div>
</div>

<h2>2) الدوال متغيرة عدد المدخلات <span class="ltr">Variadic Functions (...$args)</span></h2>
<div class="bi-block">
    <div class="ar">🇪🇬 أحيانًا مش عارف مقدمًا هتمرر كام قيمة لدالة. <code>...$args</code> بتخلي الدالة تقبل أي عدد من المدخلات وتجمعهم في مصفوفة واحدة اسمها <code>$args</code> جواها.</div>
    <div class="en">🇬🇧 Sometimes you don't know in advance how many values you'll pass to a function. <code>...$args</code> lets a function accept any number of arguments, collected into a single array called <code>$args</code> inside it.</div>
</div>
<pre><code>&lt;?php
function sumAll(...$numbers): int {
    $total = 0;
    foreach ($numbers as $n) {
        $total += $n;
    }
    return $total;
}

echo sumAll(1, 2, 3) . PHP_EOL;
echo sumAll(10, 20, 30, 40, 50) . PHP_EOL;
echo sumAll() . PHP_EOL;</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">6
150
0</div>
<div class="bi-block">
    <div class="ar">🇪🇬 نفس الدالة اشتغلت مع 3 مدخلات، 5 مدخلات، وحتى صفر مدخلات من غير ما نكتب نسخ متعددة منها. دي بالظبط طريقة عمل دوال زي <code>max()</code> و<code>implode()</code> اللي بتقبل عدد مفتوح من المدخلات.</div>
    <div class="en">🇬🇧 The same function worked with 3 arguments, 5 arguments, and even zero, without writing multiple versions. This is exactly how functions like <code>max()</code> and <code>implode()</code> accept an open-ended number of arguments.</div>
</div>

<h2>3) الدوال المجهولة والإغلاقات <span class="ltr">Closures &amp; use</span></h2>
<div class="bi-block">
    <div class="ar">🇪🇬 الدالة المجهولة (Anonymous Function / Closure) هي دالة من غير اسم، ممكن تخزنها في متغير أو ترجعها من دالة تانية. الكلمة <code>use</code> بتخليها "تتذكر" متغيرات من السياق اللي اتعرفت فيه، حتى بعد ما الدالة اللي أنشأتها تخلص تنفيذها.</div>
    <div class="en">🇬🇧 An anonymous function (closure) is a function with no name, which you can store in a variable or return from another function. The <code>use</code> keyword lets it "remember" variables from the context it was created in, even after the creating function finishes.</div>
</div>

<div class="flow-diagram">
    <div class="flow-box">makeMultiplier(2)</div>
    <div class="flow-arrow">↓ returns closure remembering factor=2</div>
    <div class="flow-box">$double(5)</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">10</div>
</div>

<pre><code>&lt;?php
function makeMultiplier(int $factor): callable {
    return function (int $n) use ($factor): int {
        return $n * $factor;
    };
}

$double = makeMultiplier(2);
$triple = makeMultiplier(3);

echo $double(5) . PHP_EOL;
echo $triple(5) . PHP_EOL;</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">10
15</div>
<div class="bi-block">
    <div class="ar">🇪🇬 <code>makeMultiplier(2)</code> رجّعت دالة "تتذكر" إن <code>$factor</code> = 2، و<code>makeMultiplier(3)</code> رجّعت دالة تانية تتذكر 3 — كل واحدة فيهم محتفظة بنسختها الخاصة من <code>$factor</code>. ده اسمه "Closure" لأن الدالة "بتقفل" على المتغيرات دي وتحملها معاها.</div>
    <div class="en">🇬🇧 <code>makeMultiplier(2)</code> returned a function "remembering" <code>$factor</code> = 2, while <code>makeMultiplier(3)</code> returned another remembering 3 — each keeps its own copy of <code>$factor</code>. This is called a "closure" because the function "closes over" these variables and carries them along.</div>
</div>

<h2>4) المتغيرات الساكنة <span class="ltr">Static Variables</span></h2>
<div class="bi-block">
    <div class="ar">🇪🇬 عادةً كل متغير جوه دالة بيتصفّر كل ما الدالة تتنادى تاني. الكلمة <code>static</code> بتخلي متغير "يفضل محتفظ بقيمته" بين الاستدعاءات المختلفة لنفس الدالة، بدل ما يترمى.</div>
    <div class="en">🇬🇧 Normally every variable inside a function resets each time it's called. The <code>static</code> keyword lets a variable "keep its value" across separate calls to the same function, instead of being discarded.</div>
</div>
<pre><code>&lt;?php
function nextId(): int {
    static $id = 0;
    $id++;
    return $id;
}

echo nextId() . PHP_EOL;
echo nextId() . PHP_EOL;
echo nextId() . PHP_EOL;</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">1
2
3</div>
<div class="bi-block">
    <div class="ar">🇪🇬 لو <code>$id</code> كانت متغير عادي، كانت هترجع 1 في كل مرة (لأنها بتتصفّر من جديد). بفضل <code>static</code>، الدالة "فاكرة" آخر قيمة من المرة اللي فاتت. ده مفيد جدًا لحاجات زي عدّادات أو توليد معرّفات فريدة.</div>
    <div class="en">🇬🇧 If <code>$id</code> were a regular variable, it would return 1 every time (reset each call). Thanks to <code>static</code>, the function "remembers" the last value from the previous call. This is very useful for things like counters or generating unique IDs.</div>
</div>

<h2 id="practice">💻 جرّب بنفسك / Try It Yourself</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 المحرر تحت فيه <code>makeMultiplier</code> اللي شفتها فوق. جرّب تعمل <code>$quadruple = makeMultiplier(4);</code> وشغّلها على أرقام مختلفة، وشوف إزاي كل Closure محتفظة بنسختها الخاصة من <code>$factor</code>.</div>
    <div class="en">🇬🇧 The editor below has <code>makeMultiplier</code> from above. Try adding <code>$quadruple = makeMultiplier(4);</code> and running it on different numbers, and see how each closure keeps its own copy of <code>$factor</code>.</div>
</div>

<div class="mini-editor-wrap">
    <textarea spellcheck="false">&lt;?php
function makeMultiplier(int $factor): callable {
    return function (int $n) use ($factor): int {
        return $n * $factor;
    };
}

$double = makeMultiplier(2);
$triple = makeMultiplier(3);

echo $double(5) . PHP_EOL;
echo $triple(5) . PHP_EOL;</textarea>
    <div class="mini-toolbar">
        <button class="mini-run-btn">▶ شغّل / Run</button>
        <span class="mini-status"></span>
    </div>
    <div class="output-box">— لسه متشغلش / not run yet —</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="own">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">لما <code>$double = makeMultiplier(2)</code> و<code>$triple = makeMultiplier(3)</code>، إيه اللي بيحصل لـ <code>$factor</code>؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">When <code>$double = makeMultiplier(2)</code> and <code>$triple = makeMultiplier(3)</code>, what happens to <code>$factor</code>?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="own"> كل Closure بتحتفظ بنسختها الخاصة / each closure keeps its own separate copy</label>
        <label><input type="radio" name="q1" value="shared"> الاتنين بيشاركوا نفس القيمة الأخيرة / both share the same last value</label>
        <label><input type="radio" name="q1" value="lost"> القيمة بتتفقد بعد ما makeMultiplier تخلص / the value is lost after makeMultiplier finishes</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="123">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">إيه ناتج 3 استدعاءات متتالية لـ <code>nextId()</code> (اللي فيها <code>static $id = 0;</code>)؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What's the output of 3 consecutive calls to <code>nextId()</code> (with <code>static $id = 0;</code>)?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="111"> 1, 1, 1</label>
        <label><input type="radio" name="q2" value="123"> 1, 2, 3</label>
        <label><input type="radio" name="q2" value="000"> 0, 0, 0</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="four">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">في مثال الـ Gotcha، ليه آخر عنصر في <code>$numbers</code> طلع 4 بدل 6 بعد الحلقة التانية؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">In the Gotcha example, why did the last element of <code>$numbers</code> end up 4 instead of 6 after the second loop?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="four"> لأن <code>$item</code> فضلت مرجع لآخر عنصر، فالحلقة التانية كتبت فوقه بقيمة العنصر اللي قبله / because <code>$item</code> remained a reference to the last element, so the second loop overwrote it with the previous element's value</label>
        <label><input type="radio" name="q3" value="bug2"> ده Bug في PHP نفسها ومفيش تفسير منطقي / it's a bug in PHP itself with no logical explanation</label>
        <label><input type="radio" name="q3" value="random4"> <code>implode</code> بترتب المصفوفة عشوائيًا / <code>implode</code> randomly reorders the array</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="unsetfix">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">أنهي إصلاح كان هيمنع البق ده في المثال المُصلَّح؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Which fix prevented this bug in the fixed version?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="unsetfix"> إضافة <code>unset($item);</code> فورًا بعد الحلقة اللي فيها المرجع / adding <code>unset($item);</code> immediately after the loop with the reference</label>
        <label><input type="radio" name="q4" value="renamefix"> تسمية المتغير في الحلقة التانية باسم مختلف بس / just renaming the variable in the second loop differently</label>
        <label><input type="radio" name="q4" value="sortfix"> ترتيب المصفوفة قبل الحلقة الثانية / sorting the array before the second loop</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ ابني makeCounter بـ static / Build makeCounter with static</h3>
    <div class="ar">🇪🇬 في <a href="../playground/index.php">محرر الكود</a> (أو المحرر المصغّر فوق)، اعمل دالة <code>makeCounter()</code> ترجع Closure من غير أي مدخلات، وكل مرة تتنادى فيها بترجع رقم أكبر بواحد من المرة اللي فاتت (استخدم <code>static</code> جوه الـ Closure نفسه، مش <code>use</code>). اختبرها بإنك تعمل عدّادين منفصلين وتتأكد إن كل واحد بيعد لوحده.</div>
    <div class="en">🇬🇧 In the <a href="../playground/index.php">Playground</a> (or the mini editor above), write a <code>makeCounter()</code> function returning a closure with no arguments, where each call returns a number one higher than the last (use <code>static</code> inside the closure itself, not <code>use</code>). Test it by creating two separate counters and confirming each counts independently.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 المزايا دي مش هتظهر بشكل مباشر جوه البرامج الصغيرة اللي هتبنيها في مرحلة "البرامج التطبيقية" (Applications) — لكنها بالظبط الأساس اللي هتبني عليه لما تدخل مسارات زي Back-End، فين المراجع والـ Closures بتستخدم كتير جدًا في التعامل مع قواعد البيانات وبناء الـ APIs.</div>
    <div class="en">🇬🇧 These features won't show up directly in the small programs you'll build in the Applications stage — but they're exactly the foundation you'll build on when you move into tracks like Back-End, where references and closures are used constantly in database work and building APIs.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>المراجع (<code>&amp;</code>) بتخلي الدالة تعدّل على المتغير الأصلي مباشرة، من غير نسخ.</li>
        <li><code>...$args</code> بيخلي الدالة تقبل عدد غير محدد من المدخلات.</li>
        <li>الـ Closures مع <code>use</code> بتخلي دالة "تتذكر" قيم من السياق اللي اتعرفت فيه.</li>
        <li><code>static</code> بيخلي متغير جوه دالة يحتفظ بقيمته بين استدعاء وتاني.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="functions-2.php">← المرحلة السابقة</a>
    <a href="problem-solving-4.php">المرحلة الجاية / Next: Problem Solving — Upper-Intermediate →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
