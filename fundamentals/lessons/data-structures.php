<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'data-structures';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'هياكل البيانات';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">المرحلة 6 / Stage 6</span>
<h1>هياكل البيانات <span class="ltr">Data Structures</span></h1>
<p class="subtitle">"هيكل البيانات" هو ببساطة طريقة لتنظيم مجموعة من القيم عشان يسهل التعامل معاها. المصفوفة (Array) اللي بتستخدمها من زمان هي هيكل بيانات، لكن دلوقتي هنشوف طرق مختلفة نستخدم بيها نفس المصفوفة عشان نبني هياكل تانية زي المكدس (Stack)، الطابور (Queue)، والقائمة المترابطة (Linked List).</p>

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
    <div class="ar">🇪🇬 تفهم إن اختيار "شكل" تخزين البيانات (مش بس نوعها) بيأثر على سهولة وسرعة العمليات اللي هتعملها عليها، وتبني بنفسك Stack وQueue وLinked List بسيطة.</div>
    <div class="en">🇬🇧 Understand that choosing how data is shaped (not just its type) affects how easy and fast operations on it are, and build your own simple Stack, Queue, and Linked List.</div>
</div>

<h2 id="understand">1) المكدس <span class="ltr">Stack</span> — آخر داخل أول خارج</h2>
<div class="flow-diagram">
    <div class="flow-box">push("plate 1")</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">push("plate 2")</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">push("plate 3")</div>
    <div class="flow-arrow">↓ pop()</div>
    <div class="flow-box">returns "plate 3" (last in)</div>
</div>
<div class="bi-block">
    <div class="ar">🇪🇬 المكدس بيشتغل بمبدأ "آخر داخل أول خارج" (LIFO — Last In, First Out) — زي كومة أطباق: بتحط الطبق الجديد فوق، وبتاخد من فوق كمان. في PHP بنستخدم <code>array_push</code> للإضافة و<code>array_pop</code> لإخراج آخر عنصر.</div>
    <div class="en">🇬🇧 A stack follows "Last In, First Out" (LIFO) — like a stack of plates: you add a new plate on top, and you take from the top too. In PHP we use <code>array_push</code> to add and <code>array_pop</code> to remove the last element.</div>
</div>
<pre><code>&lt;?php
$stack = [];

array_push($stack, "plate 1");
array_push($stack, "plate 2");
array_push($stack, "plate 3");
echo "Stack: " . implode(', ', $stack) . PHP_EOL;

$top = array_pop($stack);
echo "Popped: $top" . PHP_EOL;
echo "Stack now: " . implode(', ', $stack) . PHP_EOL;</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">Stack: plate 1, plate 2, plate 3
Popped: plate 3
Stack now: plate 1, plate 2</div>
<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ إن اللي اتشال هو "plate 3" — آخر حاجة اتضافت. المكدس مفيد جدًا في حاجات زي "تراجع" (Undo) في برامج التحرير، أو تتبّع استدعاءات الدوال جوه اللغة نفسها.</div>
    <div class="en">🇬🇧 Notice "plate 3" — the last thing added — was removed. Stacks are useful for things like "Undo" in editing software, or how the language itself tracks function calls.</div>
</div>

<h2>2) الطابور <span class="ltr">Queue</span> — أول داخل أول خارج</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 الطابور عكس المكدس تمامًا: "أول داخل أول خارج" (FIFO — First In, First Out) — زي طابور بني آدمين في محل، أول واحد دخل هو أول واحد بيتقضّى. بنضيف بـ <code>array_push</code>، لكن بنشيل من الأول بـ <code>array_shift</code>.</div>
    <div class="en">🇬🇧 A queue is the opposite: "First In, First Out" (FIFO) — like a line of people at a shop, the first one in is the first one served. We add with <code>array_push</code>, but remove from the front with <code>array_shift</code>.</div>
</div>
<pre><code>&lt;?php
$queue = [];

array_push($queue, "customer 1");
array_push($queue, "customer 2");
array_push($queue, "customer 3");
echo "Queue: " . implode(', ', $queue) . PHP_EOL;

$served = array_shift($queue);
echo "Served: $served" . PHP_EOL;
echo "Queue now: " . implode(', ', $queue) . PHP_EOL;</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">Queue: customer 1, customer 2, customer 3
Served: customer 1
Queue now: customer 2, customer 3</div>
<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ إن اللي اتخدم هو "customer 1" — أول واحد دخل. الطابور مثالي لأي نظام معالجة بالترتيب، زي طابور طباعة الملفات أو معالجة الطلبات بالترتيب اللي وصلت بيه.</div>
    <div class="en">🇬🇧 Notice "customer 1" — the first to arrive — was served. Queues are ideal for any in-order processing system, like a print queue or handling requests in the order they arrived.</div>
</div>

<h2>3) القائمة المترابطة <span class="ltr">Linked List</span></h2>
<div class="bi-block">
    <div class="ar">🇪🇬 القائمة المترابطة مختلفة عن المصفوفة: كل عنصر ("عقدة" — Node) بيخزن قيمته + إشارة (Reference) للعنصر اللي بعده، بدل ما تكون كل العناصر متلاصقة في الذاكرة زي المصفوفة. هنبني كلاس <code>Node</code> بسيط وكلاس <code>LinkedList</code> يستخدمه.</div>
    <div class="en">🇬🇧 A linked list differs from an array: each element ("node") stores its value plus a reference to the next element, rather than all elements sitting contiguously in memory like an array. We'll build a simple <code>Node</code> class and a <code>LinkedList</code> class that uses it.</div>
</div>
<pre><code>&lt;?php
class Node {
    public $value;
    public ?Node $next = null;

    public function __construct($value) {
        $this->value = $value;
    }
}

class LinkedList {
    private ?Node $head = null;

    public function append($value): void {
        $newNode = new Node($value);
        if ($this->head === null) {
            $this->head = $newNode;
            return;
        }
        $current = $this->head;
        while ($current->next !== null) {
            $current = $current->next;
        }
        $current->next = $newNode;
    }

    public function toArray(): array {
        $result = [];
        $current = $this->head;
        while ($current !== null) {
            $result[] = $current->value;
            $current = $current->next;
        }
        return $result;
    }
}

$list = new LinkedList();
$list->append("A");
$list->append("B");
$list->append("C");
echo implode(' -> ', $list->toArray()) . PHP_EOL;</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">A -> B -> C</div>
<div class="bi-block">
    <div class="ar">🇪🇬 <code>append</code> بتمشي من أول عقدة (<code>head</code>) لحد ما تلاقي عقدة مفيش بعدها حاجة (<code>next === null</code>)، وتربط العنصر الجديد هناك. ده الفرق الجوهري عن المصفوفة: مفيش "فهرس" (Index) تقدر توصل بيه مباشرة، لازم تمشي من الأول كل مرة.</div>
    <div class="en">🇬🇧 <code>append</code> walks from the first node (<code>head</code>) until it finds a node with nothing after it (<code>next === null</code>), and links the new element there. This is the fundamental difference from arrays: there's no "index" to jump to directly — you must traverse from the start each time.</div>
</div>

<h2>4) امتى تختار Stack ومتى تختار Queue؟ <span class="ltr">Stack vs Queue: A Real-World Choice</span></h2>
<div class="bi-block">
    <div class="ar">🇪🇬 الاختيار بين Stack وQueue مش شكلي — بيتحدد بسؤال واحد: "آخر حاجة اتضافت هي اللي المفروض تتعالج الأول (Stack)، ولا أول حاجة اتضافت (Queue)؟" مثالين حقيقيين هيوضحوا الفرق: <b>تاريخ التراجع (Undo History)</b> في محرر نصوص — آخر حاجة عملتها هي أول حاجة تتلغي، فده Stack. <b>طابور طباعة الملفات (Print Queue)</b> — أول ملف بعتّه للطابعة المفروض يطبع الأول، فده Queue.</div>
    <div class="en">🇬🇧 Choosing between a Stack and a Queue isn't cosmetic — it comes down to one question: "should the last thing added be handled first (Stack), or the first thing added (Queue)?" Two real examples make the difference concrete: <b>Undo History</b> in a text editor — the last action you did is the first one to undo, so that's a Stack. <b>A Print Job Queue</b> — the first file you sent to the printer should print first, so that's a Queue.</div>
</div>

<pre><code>&lt;?php
// Scenario 1: Undo history (Stack) — LIFO
class UndoHistory {
    private array $actions = [];

    public function do(string $action): void {
        array_push($this->actions, $action);
        echo "Did: $action" . PHP_EOL;
    }

    public function undo(): void {
        if (empty($this->actions)) {
            echo "Nothing to undo" . PHP_EOL;
            return;
        }
        $last = array_pop($this->actions);
        echo "Undoing: $last" . PHP_EOL;
    }
}

$editor = new UndoHistory();
$editor->do("type 'Hello'");
$editor->do("bold text");
$editor->do("insert image");
$editor->undo();
$editor->undo();</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">Did: type 'Hello'
Did: bold text
Did: insert image
Undoing: insert image
Undoing: bold text</div>

<pre><code>&lt;?php
// Scenario 2: Print job queue (Queue) — FIFO
class PrintQueue {
    private array $jobs = [];

    public function addJob(string $doc): void {
        array_push($this->jobs, $doc);
        echo "Queued: $doc" . PHP_EOL;
    }

    public function printNext(): void {
        if (empty($this->jobs)) {
            echo "No jobs left" . PHP_EOL;
            return;
        }
        $job = array_shift($this->jobs);
        echo "Printing: $job" . PHP_EOL;
    }
}

$printer = new PrintQueue();
$printer->addJob("report.pdf");
$printer->addJob("invoice.pdf");
$printer->addJob("photo.png");
$printer->printNext();
$printer->printNext();</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">Queued: report.pdf
Queued: invoice.pdf
Queued: photo.png
Printing: report.pdf
Printing: invoice.pdf</div>
<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ إن <code>undo()</code> رجّعت "insert image" الأول (آخر حاجة اتعملت)، لكن <code>printNext()</code> طبعت "report.pdf" الأول (أول حاجة اتضافت) رغم إن الاتنين مبنيين على مصفوفة PHP عادية — الفرق كله في الدالة اللي بتشيل بيها: <code>array_pop</code> (من الآخر) مقابل <code>array_shift</code> (من الأول).</div>
    <div class="en">🇬🇧 Notice <code>undo()</code> returned "insert image" first (the last thing done), while <code>printNext()</code> printed "report.pdf" first (the first thing added) — even though both are built on a plain PHP array. The entire difference is which removal function you use: <code>array_pop</code> (from the end) versus <code>array_shift</code> (from the front).</div>
</div>

<h2 id="practice">💻 جرّب بنفسك / Try It Yourself</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 المحرر تحت فيه مثال الـ Stack اللي شفته فوق. جرّب تضيف عنصر رابع، أو تعمل <code>array_pop</code> مرتين على التوالي وشوف الترتيب اللي بيرجع بيه.</div>
    <div class="en">🇬🇧 The editor below has the Stack example from above. Try adding a fourth element, or calling <code>array_pop</code> twice in a row and see the order things come back in.</div>
</div>

<div class="mini-editor-wrap">
    <textarea spellcheck="false">&lt;?php
$stack = [];

array_push($stack, "plate 1");
array_push($stack, "plate 2");
array_push($stack, "plate 3");
echo "Stack: " . implode(', ', $stack) . PHP_EOL;

$top = array_pop($stack);
echo "Popped: $top" . PHP_EOL;
echo "Stack now: " . implode(', ', $stack) . PHP_EOL;</textarea>
    <div class="mini-toolbar">
        <button class="mini-run-btn">▶ شغّل / Run</button>
        <span class="mini-status"></span>
    </div>
    <div class="output-box">— لسه متشغلش / not run yet —</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="lifo">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">المكدس (Stack) بيشتغل بمبدأ إيه؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What principle does a Stack follow?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="lifo"> آخر داخل أول خارج (LIFO)</label>
        <label><input type="radio" name="q1" value="fifo"> أول داخل أول خارج (FIFO)</label>
        <label><input type="radio" name="q1" value="random"> ترتيب عشوائي</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="shift">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">أنهي دالة PHP بتشيل أول عنصر من مصفوفة (زي الطابور)؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Which PHP function removes the first element from an array (like a queue)?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="pop"> array_pop</label>
        <label><input type="radio" name="q2" value="shift"> array_shift</label>
        <label><input type="radio" name="q2" value="push"> array_push</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="hello">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">لو نادينا <code>undo()</code> تالت مرة على نفس <code>$editor</code> (بعد النداءين اللي فوق)، إيه اللي هيطبع؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">If we call <code>undo()</code> a third time on the same <code>$editor</code> (after the two calls above), what prints?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="hello"> Undoing: type 'Hello' — آخر عنصر متبقي / Undoing: type 'Hello' — the one remaining action</label>
        <label><input type="radio" name="q3" value="nothing3"> Nothing to undo</label>
        <label><input type="radio" name="q3" value="repeat3"> Undoing: bold text تاني / Undoing: bold text again</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="breaks">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">لو استبدلنا <code>array_pop($this->actions)</code> بـ <code>array_shift($this->actions)</code> جوه <code>UndoHistory::undo</code>، هل التراجع هيفضل شغال صح؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">If we replaced <code>array_pop($this->actions)</code> with <code>array_shift($this->actions)</code> inside <code>UndoHistory::undo</code>, would undo still work correctly?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="breaks"> لأ — هيلغي أقدم حاجة اتعملت بدل آخر حاجة، وده عكس معنى Undo تمامًا / no — it would undo the oldest action instead of the latest, the exact opposite of what Undo means</label>
        <label><input type="radio" name="q4" value="samebehavior"> آه، نفس السلوك بالظبط، بس أبطأ شوية / yes, exactly the same behavior, just slightly slower</label>
        <label><input type="radio" name="q4" value="error5"> لأ، PHP هترمي Error فورًا / no, PHP would throw an immediate error</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ ابني LinkedList كاملة بـ prepend / Build a Complete LinkedList with prepend</h3>
    <div class="ar">🇪🇬 في <a href="../playground/index.php">محرر الكود</a>، ابنِ كلاس <code>LinkedList</code> كامل (زي اللي فوق) وضيف له دالة <code>prepend($value)</code> تضيف عنصر جديد في <b>أول</b> القائمة بدل آخرها (خلّي العنصر الجديد هو الـ <code>head</code> الجديد ويشاور على القديم). اطبع القائمة بعد كل عملية <code>append</code> و<code>prepend</code> عشان تتأكد من الترتيب.</div>
    <div class="en">🇬🇧 In the <a href="../playground/index.php">Playground</a>, build a complete <code>LinkedList</code> class (like above) and add a <code>prepend($value)</code> method that adds a new element at the <b>start</b> instead of the end (make the new node the new <code>head</code>, pointing at the old one). Print the list after each <code>append</code> and <code>prepend</code> to confirm the order.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 كلاس <code>TodoList</code> اللي هتبنيه في مرحلة "البرامج التطبيقية" (Applications) هو في الأساس هيكل بيانات مشابه — مصفوفة من العناصر بتتضاف وتتشال منها بعمليات محددة، بالظبط زي Stack و Queue اللي بنيتهم هنا لكن بقواعد مختلفة شوية.</div>
    <div class="en">🇬🇧 The <code>TodoList</code> class you'll build in the Applications stage is fundamentally a similar data structure — an array of elements added to and removed from with defined operations, just like the Stack and Queue you built here, with slightly different rules.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>Stack = آخر داخل أول خارج (LIFO)، مفيد للتراجع وتتبّع الاستدعاءات.</li>
        <li>Queue = أول داخل أول خارج (FIFO)، مفيد للمعالجة بالترتيب.</li>
        <li>Linked List بتخزن كل عنصر مع إشارة للي بعده، بدل التخزين المتلاصق زي المصفوفة.</li>
        <li>كل هيكل بيانات ليه استخدامات معينة بيتفوق فيها على غيره.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="algorithms.php">← المرحلة السابقة</a>
    <a href="problem-solving-3.php">المرحلة الجاية / Next: Problem Solving — Intermediate →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
