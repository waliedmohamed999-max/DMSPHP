<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'oop-classes-objects';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'Stage 11 — Classes & Objects: Getting Started';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">Stage 11 · Object-Oriented PHP</span>
<h1>Classes و Objects: البداية <span class="ltr">Classes &amp; Objects: Getting Started</span></h1>
<p class="subtitle">
    🇪🇬 أول Class حقيقي، الفرق بين الـ Class والـ Object، الـ Properties والـ Methods والـ Constructor.<br>
    <span class="ltr">🇬🇧 Your first real class, the class-vs-object distinction, properties, methods, and the constructor.</span>
</p>

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
    <div class="ar">🇪🇬 <code>stage2.php</code> ورّاك OOP كمقدمة سريعة على كل حاجة مرة واحدة. هنا هنقعد أكتر مع أول خطوة بس: إزاي تصمم Class حقيقية، تفهم بالظبط الفرق بين الـ Class نفسها وبين الـ Object اللي بتتبني منها، وتشوف إن كل Object بياخد نسخته الخاصة من البيانات — مش نسخة مشتركة.</div>
    <div class="en">🇬🇧 <code>stage2.php</code> gave you a fast tour of all of OOP at once. Here we slow down on the very first step: how to design a real class, understand precisely the difference between the class itself and an object built from it, and see that every object carries its own independent copy of the data — never a shared one.</div>
</div>

<h2 id="understand">🧠 1) الـ Class = المخطط، الـ Object = النسخة الفعلية / Class = Blueprint, Object = Real Instance</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 الـ <b>Class</b> مجرد وصف: "أي مستخدم عنده اسم وإيميل، ويقدر يسلّم على نفسه (<code>greet()</code>)". هي نفسها مش بتخزن بيانات حقيقية. لما تكتب <code>new User(...)</code>، PHP بتبني <b>Object</b> فعلي في الذاكرة، وبتدّيله نسخته الخاصة من الـ Properties. الفرق ده مهم جدًا: تقدر تعمل عدد لا نهائي من الـ Objects من نفس الـ Class، وكل واحد فيهم مستقل تمامًا عن التاني.</div>
    <div class="en">🇬🇧 A <b>Class</b> is just a description: "any User has a name and an email, and can greet itself (<code>greet()</code>)." The class itself stores no real data. When you write <code>new User(...)</code>, PHP builds an actual <b>Object</b> in memory and gives it its own copy of the properties. This distinction matters: you can create unlimited objects from the same class, and each one is completely independent of the others.</div>
</div>
<div class="bi-block">
    <div class="ar">🇪🇬 الـ <b>Constructor</b> (<code>__construct</code>) هو الـ method اللي بتتنفذ أوتوماتيك أول ما تعمل <code>new</code> — دوره إنه "يجهّز" الـ Object بالقيم الأولية بدل ما تسيبه فاضي وتملأه يدوي كل مرة.</div>
    <div class="en">🇬🇧 The <b>Constructor</b> (<code>__construct</code>) is the method that runs automatically the moment you write <code>new</code> — its job is to "set up" the object with initial values instead of leaving it empty and filling it manually every time.</div>
</div>

<pre><code>&lt;?php
class User
{
    public string $name;
    public string $email;

    public function __construct(string $name, string $email)
    {
        $this-&gt;name = $name;
        $this-&gt;email = $email;
    }

    public function greet(): string
    {
        return "Hi, I'm {$this-&gt;name} ({$this-&gt;email})";
    }
}

$user1 = new User("Waleed", "waleed@example.com");
$user2 = new User("Sara", "sara@example.com");
$user3 = new User("Omar", "omar@example.com");

echo $user1-&gt;greet() . PHP_EOL;
echo $user2-&gt;greet() . PHP_EOL;
echo $user3-&gt;greet() . PHP_EOL;</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">Hi, I'm Waleed (waleed@example.com)
Hi, I'm Sara (sara@example.com)
Hi, I'm Omar (omar@example.com)</div>

<h2>2) إثبات إن كل Object مستقل / Proving Each Object Is Independent</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <code>$user1</code> و<code>$user2</code> اتبنوا من نفس الـ Class بالظبط (<code>User</code>)، بس هما مش نفس الحاجة. لما نغيّر اسم <code>$user1</code> بس، <code>$user2</code> ميتأثرش خالص — دليل إن كل Object معاه نسخته الخاصة من الـ Properties في الذاكرة، مش مرجع لنفس البيانات.</div>
    <div class="en">🇬🇧 <code>$user1</code> and <code>$user2</code> were built from the exact same class (<code>User</code>), but they are not the same thing. Changing only <code>$user1</code>'s name leaves <code>$user2</code> completely unaffected — proof that each object holds its own copy of the properties in memory, not a shared reference to the same data.</div>
</div>

<pre><code>&lt;?php
echo "Proving separate objects:" . PHP_EOL;
echo "user1 name: {$user1-&gt;name}" . PHP_EOL;
echo "user2 name: {$user2-&gt;name}" . PHP_EOL;

$user1-&gt;name = "Waleed (updated)";
echo "After changing user1 only -&gt; user1: {$user1-&gt;name}, user2: {$user2-&gt;name}" . PHP_EOL;

var_dump($user1 === $user2);
var_dump($user1 instanceof User);</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">Proving separate objects:
user1 name: Waleed
user2 name: Sara
After changing user1 only -> user1: Waleed (updated), user2: Sara
bool(false)
bool(true)</div>

<div class="bi-block">
    <div class="ar">🇪🇬 <code>$user1 === $user2</code> رجعت <code>false</code> لإنهم Objects مختلفة تمامًا في الذاكرة، حتى لو خصائصهم كانت متطابقة. <code>$user1 instanceof User</code> رجعت <code>true</code> لإنه فعلاً اتبنى من كلاس <code>User</code>. ده الفرق العملي بين "المخطط" و"البيت المبني منه": مخطط واحد، لكن بيوت لا نهائية، كل واحد فيها منفصل عن التاني.</div>
    <div class="en">🇬🇧 <code>$user1 === $user2</code> returned <code>false</code> because they are entirely different objects in memory, even if their properties happened to match. <code>$user1 instanceof User</code> returned <code>true</code> because it really was built from the <code>User</code> class. This is the practical difference between "the blueprint" and "the houses built from it": one blueprint, unlimited houses, each one separate from the rest.</div>
</div>

<h2 id="practice">💻 جرّب بنفسك / Try It Yourself</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 عدّل الأسماء والإيميلات تحت، أو زوّد Object رابع، وشوف إزاي كل واحد بيفضل مستقل بذاته.</div>
    <div class="en">🇬🇧 Tweak the names and emails below, or add a fourth object, and see how each one stays independent.</div>
</div>

<div class="mini-editor-wrap">
    <textarea spellcheck="false">&lt;?php
class User
{
    public string $name;
    public string $email;

    public function __construct(string $name, string $email)
    {
        $this-&gt;name = $name;
        $this-&gt;email = $email;
    }

    public function greet(): string
    {
        return "Hi, I'm {$this-&gt;name} ({$this-&gt;email})";
    }
}

$u1 = new User("Nour", "nour@example.com");
$u2 = new User("Khaled", "khaled@example.com");

echo $u1-&gt;greet() . PHP_EOL;
echo $u2-&gt;greet() . PHP_EOL;</textarea>
    <div class="mini-toolbar">
        <button class="mini-run-btn">▶ شغّل / Run</button>
        <span class="mini-status"></span>
    </div>
    <div class="output-box">— لسه متشغلش / not run yet —</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="blueprint">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">إيه الوصف الأدق للفرق بين الـ Class والـ Object؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What's the most accurate description of the Class vs Object difference?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="samething"> نفس الحاجة، بس اسمين مختلفين</label>
        <label><input type="radio" name="q1" value="blueprint"> الـ Class مخطط، والـ Object نسخة فعلية ببيانات حقيقية</label>
        <label><input type="radio" name="q1" value="onlyone"> تقدر تعمل Object واحد بس من كل Class</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="construct">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">أنهي method بتتنفذ أوتوماتيك أول ما تعمل <code>new User(...)</code>؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Which method runs automatically the moment you write <code>new User(...)</code>?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="greet"> greet()</label>
        <label><input type="radio" name="q2" value="construct"> __construct()</label>
        <label><input type="radio" name="q2" value="none"> ولا واحدة، لازم تناديها بنفسك</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="false">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">في المثال فوق، <code>$user1 === $user2</code> رجعت إيه، ولية؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">In the example above, what did <code>$user1 === $user2</code> return, and why?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="true"> true، لإنهم من نفس الـ Class</label>
        <label><input type="radio" name="q3" value="false"> false، لإنهم Objects مختلفين في الذاكرة</label>
        <label><input type="radio" name="q3" value="error"> بترمي خطأ لإن المقارنة مش مسموحة على Objects</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="independent">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">لما غيّرنا <code>$user1-&gt;name</code> بس، إيه اللي حصل لـ <code>$user2-&gt;name</code>؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">When we changed only <code>$user1-&gt;name</code>, what happened to <code>$user2-&gt;name</code>?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="independent"> ولا اتأثر، لإن كل Object عنده نسخته الخاصة من البيانات</label>
        <label><input type="radio" name="q4" value="changed"> اتغيّر هو كمان تلقائيًا</label>
        <label><input type="radio" name="q4" value="crash"> السكريبت وقع بخطأ</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ كلاس Product / A Product Class</h3>
    <div class="ar">🇪🇬 في <a href="../playground/index.php">محرر الكود</a>: اعمل كلاس <code>Product</code> بـ Properties <code>name</code> و<code>price</code> و<code>quantity</code>، ودالة <code>totalValue(): float</code> بترجع <code>price * quantity</code>. اعمل 3 Objects بقيم مختلفة، ولف عليهم بـ <code>foreach</code> واطبع كل منتج مع قيمته الإجمالية — لاحظ إزاي كل Object محتفظ بقيمته الخاصة.</div>
    <div class="en">🇬🇧 In the <a href="../playground/index.php">Playground</a>: build a <code>Product</code> class with <code>name</code>, <code>price</code>, and <code>quantity</code> properties, and a <code>totalValue(): float</code> method returning <code>price * quantity</code>. Create 3 objects with different values, loop over them with <code>foreach</code>, and print each product with its total value — notice how each object keeps its own value.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 الدرس الجاي بياخد نفس الـ <code>User</code> ده خطوة أعمق: هنخبي الإيميل بـ <code>private</code> ونمنع أي حد يحطله قيمة غلط مباشرة — ده اسمه <b>Encapsulation</b>.</div>
    <div class="en">🇬🇧 The next lesson takes this exact <code>User</code> a step deeper: we'll hide the email behind <code>private</code> and stop anyone from assigning it garbage directly — that's called <b>Encapsulation</b>.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>الـ Class = مخطط يوصف Properties وMethods، مش بيانات فعلية.</li>
        <li>الـ Object = نسخة فعلية اتبنت بـ <code>new</code>، ومعاها نسخة خاصة بيها من البيانات.</li>
        <li>الـ Constructor (<code>__construct</code>) بيتنفذ أوتوماتيك عند الإنشاء عشان يجهّز القيم الأولية.</li>
        <li>Objects مختلفة من نفس الـ Class مستقلة تمامًا عن بعض — تغيير واحد ميأثرش على التاني.</li>
        <li><code>===</code> بتقارن هوية الـ Object في الذاكرة، و<code>instanceof</code> بتتأكد من نوعه.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="../index.php">← المرحلة السابقة</a>
    <a href="oop-encapsulation.php">المرحلة الجاية / Next: Encapsulation & Visibility →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
