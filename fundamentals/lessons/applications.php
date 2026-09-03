<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'applications';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'البرامج التطبيقية';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">المرحلة 11 / Stage 11</span>
<h1>البرامج التطبيقية <span class="ltr">Applications</span></h1>
<p class="subtitle">لحد دلوقتي كل حاجة كانت دالة واحدة أو مسألة صغيرة. في المرحلة دي هنبني 3 برامج متكاملة صغيرة توظف أكتر من فكرة مع بعض — كلاسات، مصفوفات، حلقات، ودوال — بالظبط زي ما هيحصل في مشروع حقيقي.</p>

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
    <div class="ar">🇪🇬 تشوف إزاي كل المفاهيم المنفصلة اللي اتعلمتها (متغيرات، شروط، حلقات، دوال، كلاسات، تكرارية) بتتجمع مع بعض في برنامج واحد متكامل بيحل مشكلة حقيقية من أول لآخر.</div>
    <div class="en">🇬🇧 See how all the separate concepts you've learned (variables, conditions, loops, functions, classes, recursion) come together in one complete program solving a real problem end to end.</div>
</div>

<h2 id="understand">1) مدير قائمة مهام <span class="ltr">To-Do List Manager</span></h2>
<div class="flow-diagram">
    <div class="flow-box">add("title")</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">complete(index)</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">remove(index)</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">render()</div>
</div>
<div class="bi-block">
    <div class="ar">🇪🇬 كلاس بسيط بيدير مصفوفة من المهام، كل مهمة عندها عنوان، حالة (خلصت ولا لأ)، وعلم أولوية (Priority). فيه دوال لإضافة مهمة، تحديدها كمُنجزة، تحديد أولويتها، حذفها، وعرض القائمة كلها.</div>
    <div class="en">🇬🇧 A simple class managing an array of tasks, each with a title, a done/not-done status, and a priority flag. It has methods to add a task, mark it complete, set its priority, remove it, and render the whole list.</div>
</div>
<pre><code>&lt;?php
class TodoList {
    private array $tasks = [];

    public function add(string $title, bool $highPriority = false): void {
        $this->tasks[] = ['title' => $title, 'done' => false, 'priority' => $highPriority];
    }

    public function complete(int $index): void {
        if (isset($this->tasks[$index])) {
            $this->tasks[$index]['done'] = true;
        }
    }

    public function setPriority(int $index, bool $highPriority): void {
        if (isset($this->tasks[$index])) {
            $this->tasks[$index]['priority'] = $highPriority;
        }
    }

    public function remove(int $index): void {
        unset($this->tasks[$index]);
        $this->tasks = array_values($this->tasks);
    }

    public function render(): void {
        foreach ($this->tasks as $i => $task) {
            $mark = $task['done'] ? '[x]' : '[ ]';
            $flag = $task['priority'] ? ' [!] HIGH PRIORITY' : '';
            echo "$i. $mark {$task['title']}$flag" . PHP_EOL;
        }
    }
}

$todo = new TodoList();
$todo->add("Learn PHP arrays");
$todo->add("Learn recursion");
$todo->add("Build a mini project");

$todo->setPriority(1, true);

echo "-- List with priority flag --" . PHP_EOL;
$todo->render();

$todo->complete(0);
$todo->setPriority(2, true);

echo "-- After completing task 0 and flagging task 2 --" . PHP_EOL;
$todo->render();</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">-- List with priority flag --
0. [ ] Learn PHP arrays
1. [ ] Learn recursion [!] HIGH PRIORITY
2. [ ] Build a mini project
-- After completing task 0 and flagging task 2 --
0. [x] Learn PHP arrays
1. [ ] Learn recursion [!] HIGH PRIORITY
2. [ ] Build a mini project [!] HIGH PRIORITY</div>
<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ إن <code>add</code> اتغيّرت لتاخد باراميتر اختياري تاني <code>$highPriority = false</code> — القيمة الافتراضية دي مهمة عشان الكود القديم اللي بينادي <code>add($title)</code> من غير الباراميتر الجديد يفضل شغال من غير أي تعديل. ده مبدأ اسمه "توافقية للخلف" (Backward Compatibility)، وهتقابله كتير وانت بتوسّع كلاسات موجودة بالفعل.</div>
    <div class="en">🇬🇧 Notice <code>add</code> changed to take a second, optional parameter <code>$highPriority = false</code> — that default value matters, so existing code calling <code>add($title)</code> without the new parameter keeps working unchanged. This principle is called "backward compatibility," and you'll run into it constantly when extending classes that already exist.</div>
</div>
<div class="bi-block">
    <div class="ar">🇪🇬 وبالمناسبة، دالة <code>remove</code> لسه بتستخدم <code>array_values</code> بعد <code>unset</code> عشان "تعيد ترقيم" المصفوفة من صفر تاني — من غيرها كانت هتفضل فجوة في الفهرس (Index) بتاع العنصر المحذوف.</div>
    <div class="en">🇬🇧 By the way, <code>remove</code> still uses <code>array_values</code> after <code>unset</code> to "re-index" the array from zero again — without it, there would be a gap at the removed element's index.</div>
</div>

<h2>2) آلة حاسبة بسيطة <span class="ltr">Simple Calculator</span></h2>
<div class="bi-block">
    <div class="ar">🇪🇬 دالة بتاخد رقمين وعملية (كنص زي "+" أو "*") وتقرر إيه هي العملية المطلوبة باستخدام <code>match</code> (زي <code>switch</code> بس أحدث وأنضف). لو العملية غير معروفة أو حصلت قسمة على صفر، بترمي استثناء (Exception).</div>
    <div class="en">🇬🇧 A function taking two numbers and an operator (as a string like "+" or "*"), deciding what to do with <code>match</code> (like <code>switch</code> but newer and cleaner). If the operator is unknown or division by zero occurs, it throws an exception.</div>
</div>
<pre><code>&lt;?php
function calculate(float $a, float $b, string $operator): float {
    return match ($operator) {
        '+' => $a + $b,
        '-' => $a - $b,
        '*' => $a * $b,
        '/' => $b !== 0.0 ? $a / $b : throw new InvalidArgumentException("Division by zero"),
        default => throw new InvalidArgumentException("Unknown operator: $operator"),
    };
}

echo calculate(10, 5, '+') . PHP_EOL;
echo calculate(10, 5, '-') . PHP_EOL;
echo calculate(10, 5, '*') . PHP_EOL;
echo calculate(10, 5, '/') . PHP_EOL;

try {
    calculate(10, 0, '/');
} catch (InvalidArgumentException $e) {
    echo "Error: " . $e->getMessage() . PHP_EOL;
}</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">15
5
50
2
Error: Division by zero</div>
<div class="bi-block">
    <div class="ar">🇪🇬 <code>match</code> بيقارن بمقارنة صارمة (زي <code>===</code>) وبيرمي خطأ تلقائيًا لو مفيش حالة مطابقة ومفيش <code>default</code> — عكس <code>switch</code> اللي بيكمل صامت. الـ <code>try/catch</code> هنا بيمسك الاستثناء بدل ما البرنامج يتوقف فجأة بخطأ.</div>
    <div class="en">🇬🇧 <code>match</code> compares strictly (like <code>===</code>) and automatically throws if nothing matches and there's no <code>default</code> — unlike <code>switch</code>, which silently continues. The <code>try/catch</code> here catches the exception instead of letting the program crash abruptly.</div>
</div>

<h2>3) عدّاد تكرار الكلمات <span class="ltr">Word Frequency Counter</span></h2>
<div class="bi-block">
    <div class="ar">🇪🇬 دالة بتاخد جملة وترجع عدد مرات ظهور كل كلمة فيها، مرتبة من الأكتر تكرارًا للأقل. بتستخدم <code>str_word_count</code> بمعامل تاني (<code>1</code>) عشان ترجع مصفوفة كلمات بدل ما ترجع رقم بس.</div>
    <div class="en">🇬🇧 A function taking a sentence and returning how many times each word appears, sorted from most to least frequent. It uses <code>str_word_count</code> with a second argument (<code>1</code>) to return an array of words instead of just a count.</div>
</div>
<pre><code>&lt;?php
function wordFrequency(string $sentence): array {
    $words = str_word_count(strtolower($sentence), 1);
    $counts = [];
    foreach ($words as $word) {
        $counts[$word] = ($counts[$word] ?? 0) + 1;
    }
    arsort($counts);
    return $counts;
}

$sentence = "the quick brown fox jumps over the lazy dog the fox runs";
foreach (wordFrequency($sentence) as $word => $count) {
    echo "$word: $count" . PHP_EOL;
}</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">the: 3
fox: 2
quick: 1
brown: 1
jumps: 1
over: 1
lazy: 1
dog: 1
runs: 1</div>
<div class="bi-block">
    <div class="ar">🇪🇬 نفس نمط "عدّ باستخدام مصفوفة جمعية" اللي شفناه في مسألة "الحرف الأكتر تكرارًا" — لكن هنا على مستوى كلمات مش حروف. لاحظ إزاي حل مسألة قديمة بيتعمم بسهولة على مسألة جديدة شبيهة.</div>
    <div class="en">🇬🇧 The same "counting with an associative array" pattern from the "most frequent character" problem — but here at the word level instead of characters. Notice how solving one problem generalizes easily to a similar new one.</div>
</div>

<h2 id="practice">💻 جرّب بنفسك / Try It Yourself</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 المحرر تحت فيه الآلة الحاسبة اللي شفتها فوق، بالـ <code>try/catch</code> كامل. جرّب تضيف عملية جديدة زي <code>%</code>، أو غيّر الأرقام وشوف إزاي الـ Exception بتتصرف.</div>
    <div class="en">🇬🇧 The editor below has the calculator from above, full <code>try/catch</code> included. Try adding a new operator like <code>%</code>, or change the numbers and see how the exception behaves.</div>
</div>

<div class="mini-editor-wrap">
    <textarea spellcheck="false">&lt;?php
function calculate(float $a, float $b, string $operator): float {
    return match ($operator) {
        '+' => $a + $b,
        '-' => $a - $b,
        '*' => $a * $b,
        '/' => $b !== 0.0 ? $a / $b : throw new InvalidArgumentException("Division by zero"),
        default => throw new InvalidArgumentException("Unknown operator: $operator"),
    };
}

echo calculate(10, 5, '+') . PHP_EOL;
echo calculate(10, 5, '-') . PHP_EOL;
echo calculate(10, 5, '*') . PHP_EOL;
echo calculate(10, 5, '/') . PHP_EOL;

try {
    calculate(10, 0, '/');
} catch (InvalidArgumentException $e) {
    echo "Error: " . $e->getMessage() . PHP_EOL;
}</textarea>
    <div class="mini-toolbar">
        <button class="mini-run-btn">▶ شغّل / Run</button>
        <span class="mini-status"></span>
    </div>
    <div class="output-box">— لسه متشغلش / not run yet —</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="values">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">في <code>TodoList::remove</code>، ليه لازم نستخدم <code>array_values</code> بعد <code>unset</code>؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">In <code>TodoList::remove</code>, why must we use <code>array_values</code> after <code>unset</code>?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="values"> عشان نعيد ترقيم المصفوفة من صفر ونشيل الفجوة / to re-index the array from zero and remove the gap</label>
        <label><input type="radio" name="q1" value="sort"> عشان نرتب المهام أبجديًا / to sort the tasks alphabetically</label>
        <label><input type="radio" name="q1" value="required3"> <code>unset</code> مبتشتغلش من غيرها / <code>unset</code> doesn't work without it</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="throw">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">إيه اللي بيحصل لو استدعينا <code>calculate(10, 0, '/')</code> من غير <code>try/catch</code>؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What happens if <code>calculate(10, 0, '/')</code> is called without <code>try/catch</code>?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="zero"> بترجع 0 / it returns 0</label>
        <label><input type="radio" name="q2" value="throw"> البرنامج بيتوقف بخطأ غير ممسوك (Uncaught Exception) / the program crashes with an uncaught exception</label>
        <label><input type="radio" name="q2" value="infinity"> بترجع INF / it returns INF</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="silent">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">لو نادينا <code>$todo->setPriority(99, true)</code> على قائمة فيها مهمتين بس (فهرس 0 و1)، إيه اللي هيحصل؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">If we call <code>$todo->setPriority(99, true)</code> on a list with only two tasks (index 0 and 1), what happens?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="silent"> مفيش حاجة بتتغيّر ولا Error — الشرط <code>isset</code> بيحمي من الفهرس غير الموجود بهدوء / nothing changes and no error — the <code>isset</code> check silently guards against the missing index</label>
        <label><input type="radio" name="q3" value="crash"> البرنامج بيتوقف بـ Fatal Error فورًا / the program crashes with a Fatal Error immediately</label>
        <label><input type="radio" name="q3" value="autocreate"> بتتضاف مهمة جديدة فارغة عند الفهرس 99 / a new empty task gets created at index 99</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="backward">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">ليه لازم <code>$highPriority = false</code> تحديدًا تكون قيمة افتراضية في <code>add(string $title, bool $highPriority = false)</code>؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Why must <code>$highPriority = false</code> specifically be a default value in <code>add(string $title, bool $highPriority = false)</code>?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="backward"> عشان أي كود قديم بينادي <code>add($title)</code> من غير الباراميتر الجديد يفضل شغال من غير تعديل / so any old code calling <code>add($title)</code> without the new parameter keeps working unmodified</label>
        <label><input type="radio" name="q4" value="required4"> PHP بترفض الدوال اللي مفيهاش قيمة افتراضية للباراميتر التاني / PHP rejects functions without a default for the second parameter</label>
        <label><input type="radio" name="q4" value="performance"> بتخلي الكود أسرع في التنفيذ / it makes the code execute faster</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ وسّع البرنامجين الأولين كاملين / Extend Both Programs Fully</h3>
    <div class="ar">🇪🇬 في <a href="../playground/index.php">محرر الكود</a> (أو المحرر المصغّر فوق)، ابنِ <code>TodoList</code> كاملة وضيف لها دالة <code>edit(int $index, string $newTitle)</code> تعدّل عنوان مهمة موجودة. بعدين وسّع الآلة الحاسبة بإضافة عملية <code>%</code> (باقي القسمة) لدالة <code>calculate</code> — لازم تتعامل مع القسمة على صفر بنفس أسلوب <code>throw</code> الموجود.</div>
    <div class="en">🇬🇧 In the <a href="../playground/index.php">Playground</a> (or the mini editor above), build a complete <code>TodoList</code> and add an <code>edit(int $index, string $newTitle)</code> method that changes an existing task's title. Then extend the calculator by adding a <code>%</code> (modulo) operator to <code>calculate</code> — handle division by zero the same way, with <code>throw</code>.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 المرحلة دي هي أقرب حاجة لمشروع تخرج جوه مسار الأساسيات — نفس فكرة "كلاس بيدير بيانات + دوال بتشتغل عليها" هي أساس أي تطبيق حقيقي، وهتشوفها تاني بحجم أكبر بكتير في هيكلية MVC لمسار Back-End. آخر حاجة في المسار ده، مرحلة "الوظائف البرمجية"، هتساعدك تختار فين تطبّق المهارة دي بعد كده.</div>
    <div class="en">🇬🇧 This stage is the closest thing to a capstone inside the Fundamentals track — the same idea of "a class managing data plus functions operating on it" is the foundation of every real application, and you'll see it again at a much larger scale in the Back-End track's MVC architecture. The track's final stage, Programming Careers, will help you decide where to apply this skill next.</div>
</div>

<div class="exercise-box">
    <h3>✍️ تمرين إضافي / Extra Exercise</h3>
    <div class="ar">🇪🇬 جرّب تضيف method <code>pending(): array</code> لكلاس <code>TodoList</code> ترجع بس المهام اللي مش خلصت لسه (استخدم <code>array_filter</code> من المرحلة اللي فاتت).</div>
    <div class="en">🇬🇧 Try adding a <code>pending(): array</code> method to <code>TodoList</code> returning only the not-yet-done tasks (use <code>array_filter</code> from the previous stage).</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>برنامج حقيقي هو تجميع منظم لمفاهيم بسيطة اتعلمتها كل واحدة لوحدها.</li>
        <li>الكلاسات بتساعدك تجمع بيانات (المهام) مع السلوكيات اللي بتشتغل عليها (add, complete, remove) في مكان واحد.</li>
        <li><code>match</code> و<code>try/catch</code> بيخلوا الكود يتعامل مع حالات غير متوقعة بأمان.</li>
        <li>نفس نمط الحل (زي عدّ العناصر بمصفوفة جمعية) بيتكرر في مسائل مختلفة كتير.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="problem-solving-4.php">← المرحلة السابقة</a>
    <a href="other-languages.php">المرحلة الجاية / Next: A Look at Other Languages →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
