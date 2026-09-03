<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'stage2';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'المرحلة 2 — البرمجة الكائنية';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">المرحلة 2 / Stage 2</span>
<h1>البرمجة الكائنية <span class="ltr">OOP in PHP</span></h1>
<p class="subtitle">OOP كاملة: Classes & Objects، Inheritance، Interfaces، Traits، وExceptions — أساس أي Backend حقيقي بيكبر.</p>

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
    <div class="ar">🇪🇬 تفهم إزاي تجمع بيانات وسلوك في Class واحدة، إزاي تعيد استخدام كود عن طريق الوراثة والـ Traits، إزاي تفرض "عقود" على الكلاسات بالـ Interfaces، وإزاي تتعامل مع الأخطاء بشكل منظم بالـ Exceptions.</div>
    <div class="en">🇬🇧 Understand how to bundle data and behavior into a Class, reuse code via Inheritance and Traits, enforce "contracts" on classes with Interfaces, and handle errors in a structured way with Exceptions.</div>
</div>

<h2 id="understand">🧠 1) الكلاسات والكائنات / Classes &amp; Objects</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 الـ Class هي "مخطط" بتوصف شكل البيانات (Properties) والأفعال (Methods). الـ Object هو النسخة الفعلية اللي بتتبني من الكلاس — زي "مخطط بيت" مش بيت حقيقي، لكن كل بيت بتبنيه من نفس المخطط هو Object.</div>
    <div class="en">🇬🇧 A Class is a blueprint describing data (Properties) and actions (Methods). An Object is the actual instance built from that class — like a house blueprint isn't a real house, but every house built from it is an Object.</div>
</div>
<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ <code>private</code> جنب <code>$stock</code> — دي بتمنع أي حد برة الكلاس إنه يعدّل الكمية مباشرة، ويجبره يستخدم method زي <code>sell()</code>. ده مبدأ <b>Encapsulation</b>: البيانات الحساسة متتعدلش من أي حتة، لازم من خلال طريقة محكومة.</div>
    <div class="en">🇬🇧 Notice <code>private</code> next to <code>$stock</code> — it prevents outside code from modifying the quantity directly, forcing use of a method like <code>sell()</code>. This is <b>Encapsulation</b>: sensitive data should only change through a controlled method.</div>
</div>

<pre><code>&lt;?php
class Book
{
    public string $title;
    public float $price;
    private int $stock;

    public function __construct(string $title, float $price, int $stock)
    {
        $this->title = $title;
        $this->price = $price;
        $this->stock = $stock;
    }

    public function sell(int $quantity): string
    {
        if ($quantity > $this->stock) {
            return "Not enough stock for '{$this->title}'.";
        }
        $this->stock -= $quantity;
        return "Sold $quantity of '{$this->title}'. Remaining: {$this->stock}";
    }
}

$book = new Book("Clean Code", 49.99, 5);
echo $book->title . " costs $" . $book->price . PHP_EOL;
echo $book->sell(2) . PHP_EOL;
echo $book->sell(10) . PHP_EOL;</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">Clean Code costs $49.99
Sold 2 of 'Clean Code'. Remaining: 3
Not enough stock for 'Clean Code'.</div>

<h2>2) الوراثة / Inheritance</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <code>extends</code> بتخلي كلاس ياخد كل Properties وMethods كلاس تاني (الأب) ويضيف أو يعدّل فوقها. <code>parent::</code> بتنادي على method الأب من جوه الابن — مفيدة لما عايز تضيف سلوك من غير ما تكرر كود الأب بالكامل.</div>
    <div class="en">🇬🇧 <code>extends</code> lets a class inherit all Properties and Methods from another (parent) class and add to or override them. <code>parent::</code> calls the parent's method from inside the child — useful when you want to add behavior without duplicating the parent's code entirely.</div>
</div>

<pre><code>&lt;?php
class Employee
{
    public function __construct(protected string $name, protected float $baseSalary) {}

    public function calculateSalary(): float
    {
        return $this->baseSalary;
    }
}

class Manager extends Employee
{
    public function __construct(string $name, float $baseSalary, private float $bonus)
    {
        parent::__construct($name, $baseSalary);
    }

    public function calculateSalary(): float
    {
        return parent::calculateSalary() + $this->bonus; // بيستخدم منطق الأب ويضيف عليه
    }
}

$emp = new Employee("Ali", 8000);
$mgr = new Manager("Sara", 10000, 3000);

echo "{$emp->calculateSalary()}" . PHP_EOL;
echo "{$mgr->calculateSalary()}" . PHP_EOL;</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">8000
13000</div>

<div class="flow-diagram">
    <div class="flow-box">Manager::calculateSalary()</div>
    <div class="flow-arrow">↓ parent::calculateSalary()</div>
    <div class="flow-box">Employee::calculateSalary()</div>
    <div class="flow-arrow">↓ returns baseSalary</div>
    <div class="flow-box">Manager adds $bonus → final result</div>
</div>
<div class="bi-block">
    <div class="ar">🇪🇬 لما <code>$mgr-&gt;calculateSalary()</code> بينفّذ، الكود بيروح لنسخة <code>Manager</code> الأول (لإنها الأقرب)، وهي بدورها بتنادي <code>parent::calculateSalary()</code> عشان تاخد نتيجة الأب، وبعدين تضيف عليها الـ bonus — مش بتعيد كتابة منطق الأب من الصفر.</div>
    <div class="en">🇬🇧 When <code>$mgr-&gt;calculateSalary()</code> runs, PHP dispatches to <code>Manager</code>'s version first (the closest one), which itself calls <code>parent::calculateSalary()</code> to get the parent's result, then adds the bonus on top — it never re-implements the parent's logic from scratch.</div>
</div>

<h2>3) الواجهات / Interfaces</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 الـ Interface بتحدد "عقد" — مجموعة methods أي كلاس بينفذها (<code>implements</code>) لازم يكتبها، من غير ما تفرض إزاي يكتبها بالظبط. الفايدة: تقدر تتعامل مع أي كلاس بينفذ نفس الـ Interface بنفس الطريقة، حتى لو تنفيذهم الداخلي مختلف تمامًا.</div>
    <div class="en">🇬🇧 An Interface defines a "contract" — a set of methods any implementing class must provide, without dictating how. Benefit: you can treat any class implementing the same Interface the same way, even if their internal implementation is completely different.</div>
</div>

<pre><code>&lt;?php
interface Notifiable
{
    public function send(string $message): string;
}

class EmailNotifier implements Notifiable
{
    public function send(string $message): string
    {
        return "Email sent: $message";
    }
}

class SmsNotifier implements Notifiable
{
    public function send(string $message): string
    {
        return "SMS sent: $message";
    }
}

function notifyUser(Notifiable $notifier, string $message): void
{
    echo $notifier->send($message) . PHP_EOL; // مش عارف ولا محتاج يعرف نوع الـ Notifier
}

notifyUser(new EmailNotifier(), "Your order shipped!");
notifyUser(new SmsNotifier(), "Your order shipped!");</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">Email sent: Your order shipped!
SMS sent: Your order shipped!</div>

<h2>4) الـ Traits — إعادة استخدام الكود</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 PHP بترفض الوراثة المتعددة (كلاس واحد يورّث من أب واحد بس). الـ <b>Trait</b> بيحل المشكلة دي: كود جاهز (methods) تقدر "تدمجه" جوه أي كلاس بـ <code>use</code>، حتى لو الكلاسات دي مالهاش علاقة ببعض في التسلسل الهرمي.</div>
    <div class="en">🇬🇧 PHP disallows multiple inheritance (a class can only extend one parent). A <b>Trait</b> solves this: ready-made methods you "mix in" to any class with <code>use</code>, even across unrelated classes in the hierarchy.</div>
</div>

<pre><code>&lt;?php
trait Loggable
{
    public function log(string $message): string
    {
        return "[" . static::class . "] $message";
    }
}

class Order
{
    use Loggable;
}

class PaymentProcessor
{
    use Loggable; // كلاس تاني تمامًا، بس بيستخدم نفس الـ Trait
}

echo (new Order())->log("Created") . PHP_EOL;
echo (new PaymentProcessor())->log("Charged $50") . PHP_EOL;</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">[Order] Created
[PaymentProcessor] Charged $50</div>

<h2 id="practice">💻 5) الاستثناءات / Exceptions</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 بدل ما تسيب الكود "ينهار" (Fatal Error) أو ترجع قيمة غريبة زي <code>-1</code> عشان تقول "فيه مشكلة"، بترمي (<code>throw</code>) Exception، وبتمسكها (<code>catch</code>) في المكان اللي عارف يتصرف صح. تقدر كمان تعمل Exception خاصة بيك عشان الأخطاء تبقى واضحة المعنى.</div>
    <div class="en">🇬🇧 Instead of letting code crash (Fatal Error) or returning a magic value like <code>-1</code> to signal a problem, you <code>throw</code> an Exception and <code>catch</code> it where it can be handled properly. You can also create your own Exception classes so errors carry clear meaning.</div>
</div>

<pre><code>&lt;?php
class InsufficientStockException extends Exception {}

class Inventory
{
    private int $stock = 3;

    public function reserve(int $quantity): void
    {
        if ($quantity > $this->stock) {
            throw new InsufficientStockException("Only {$this->stock} left in stock.");
        }
        $this->stock -= $quantity;
    }
}

$inventory = new Inventory();

try {
    $inventory->reserve(2);
    echo "Reserved 2 successfully." . PHP_EOL;
    $inventory->reserve(5);
} catch (InsufficientStockException $e) {
    echo "Failed: " . $e->getMessage() . PHP_EOL;
} finally {
    echo "Reservation attempt finished." . PHP_EOL;
}</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">Reserved 2 successfully.
Failed: Only 1 left in stock.
Reservation attempt finished.</div>

<div class="bi-block">
    <div class="ar">🇪🇬 <code>finally</code> بيتنفذ دايمًا سواء الكود نجح أو فشل — مفيد لحاجات زي قفل ملف أو اتصال لازم يتقفل في الحالتين.</div>
    <div class="en">🇬🇧 <code>finally</code> always runs whether the code succeeded or failed — useful for things like closing a file or connection that must close either way.</div>
</div>

<div class="bi-block">
    <div class="ar">🇪🇬 الكود ده نفسه شغال في المحرر تحت من غير أي تعديل — جرّبه، وعدّل رقم الكمية أو الـ stock الابتدائي وشوف الرسايل بتتغيّر إزاي.</div>
    <div class="en">🇬🇧 This exact code runs in the editor below with no changes needed — try it, and tweak the quantity or initial stock to see the messages change.</div>
</div>

<div class="mini-editor-wrap">
    <textarea spellcheck="false">&lt;?php
class InsufficientStockException extends Exception {}

class Inventory
{
    private int $stock = 3;

    public function reserve(int $quantity): void
    {
        if ($quantity > $this->stock) {
            throw new InsufficientStockException("Only {$this->stock} left in stock.");
        }
        $this->stock -= $quantity;
    }
}

$inventory = new Inventory();

try {
    $inventory->reserve(2);
    echo "Reserved 2 successfully." . PHP_EOL;
    $inventory->reserve(5);
} catch (InsufficientStockException $e) {
    echo "Failed: " . $e->getMessage() . PHP_EOL;
} finally {
    echo "Reservation attempt finished." . PHP_EOL;
}</textarea>
    <div class="mini-toolbar">
        <button class="mini-run-btn">▶ شغّل / Run</button>
        <span class="mini-status"></span>
    </div>
    <div class="output-box">— لسه متشغلش / not run yet —</div>
</div>

<h2>6) Polymorphism الحقيقي: نفس الـ Interface جوه Loop / Real Polymorphism: Same Interface in a Loop</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 مثال <code>Notifiable</code> فوق كان بينادي كل Notifier في سطر منفصل. الفايدة الحقيقية من الـ Interface بتظهر أوضح لما يكون عندك <b>مصفوفة</b> فيها أنواع مختلفة تمامًا من الكلاسات، وبتلف عليها بـ <code>foreach</code> واحدة، من غير ما تحتاج <code>if/else</code> ولا واحدة تتأكد من نوع كل عنصر — ده بالظبط اسمه <b>Polymorphism</b>: نفس الاستدعاء (<code>send()</code>)، سلوك مختلف حسب الكلاس الفعلي.</div>
    <div class="en">🇬🇧 The <code>Notifiable</code> example above called each Notifier on a separate line. The real payoff of an Interface shows more clearly when you have an <b>array</b> of completely different class types and loop over it once with <code>foreach</code>, needing zero <code>if/else</code> checks on each item's type — this is exactly <b>Polymorphism</b>: the same call (<code>send()</code>), different behavior depending on the actual class.</div>
</div>

<pre><code>&lt;?php
class PushNotifier implements Notifiable
{
    public function send(string $message): string
    {
        return "Push sent: $message";
    }
}

// مصفوفة فيها أنواع Notifier مختلفة تمامًا، لكن كلها بتنفذ نفس الـ Interface
$channels = [new EmailNotifier(), new SmsNotifier(), new PushNotifier()];

foreach ($channels as $channel) {
    // الحلقة مش عارفة ولا محتاجة تعرف نوع الكلاس بالظبط — بس إنه Notifiable
    echo get_class($channel) . ': ' . $channel->send('Order #501 shipped!') . PHP_EOL;
}</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">EmailNotifier: Email sent: Order #501 shipped!
SmsNotifier: SMS sent: Order #501 shipped!
PushNotifier: Push sent: Order #501 shipped!</div>

<div class="bi-block">
    <div class="ar">🇪🇬 لو ضفت نوع Notifier رابع بكرة (زي <code>SlackNotifier</code>)، الـ <code>foreach</code> ده مش هيحتاج يتعدّل ولا سطر — تضيفه للمصفوفة بس وهو هيشتغل، لإن كل حاجة بتتعامل من خلال العقد (<code>Notifiable</code>) مش من خلال اسم الكلاس.</div>
    <div class="en">🇬🇧 If you add a fourth Notifier type tomorrow (like <code>SlackNotifier</code>), this <code>foreach</code> needs zero changes — just add it to the array and it works, because everything interacts through the contract (<code>Notifiable</code>), never through the class name.</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="private">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">في مثال <code>Book</code> فوق، ليه <code>$stock</code> كانت <code>private</code> مش <code>public</code>؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">In the <code>Book</code> example, why was <code>$stock</code> declared <code>private</code> instead of <code>public</code>?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="speed"> عشان الكود يشتغل أسرع</label>
        <label><input type="radio" name="q1" value="private"> عشان محدش يعدّلها مباشرة من برة، لازم يمر بـ sell()</label>
        <label><input type="radio" name="q1" value="required"> PHP بترفض properties عامة في الكلاسات</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="trait">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">عندك كلاسين مالهمش علاقة ببعض (<code>Order</code> و<code>PaymentProcessor</code>) وعايز الاتنين يشاركوا نفس method <code>log()</code> من غير وراثة مشتركة — تستخدم إيه؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Two unrelated classes need to share the same <code>log()</code> method with no common parent — what do you use?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="interface"> Interface</label>
        <label><input type="radio" name="q2" value="trait"> Trait</label>
        <label><input type="radio" name="q2" value="exception"> Exception</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="noedit">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">في مثال الـ <code>$channels</code> array فوق، لو ضفت <code>SlackNotifier implements Notifiable</code> جديدة، إيه اللي محتاج يتغيّر في كود الـ <code>foreach</code> نفسه؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">In the <code>$channels</code> array example, if you add a new <code>SlackNotifier implements Notifiable</code>, what needs to change in the <code>foreach</code> code itself?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="noedit"> ولا سطر — بس تضيفه للمصفوفة</label>
        <label><input type="radio" name="q3" value="ifelse"> لازم تضيف <code>if</code> جديد يتأكد من نوعه</label>
        <label><input type="radio" name="q3" value="rewrite"> لازم تعيد كتابة الـ foreach من الصفر</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="polymorphism">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">نفس استدعاء <code>$channel->send()</code> بيرجع نص مختلف حسب نوع الكلاس الفعلي (Email/Sms/Push) — الاسم التقني للسلوك ده إيه؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">The same call <code>$channel->send()</code> returns different text depending on the actual class (Email/Sms/Push) — what's this behavior called?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="encapsulation"> Encapsulation</label>
        <label><input type="radio" name="q4" value="polymorphism"> Polymorphism</label>
        <label><input type="radio" name="q4" value="inheritance"> Inheritance فقط</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ Notifier جديد + Trait مشترك / A New Notifier + Shared Trait</h3>
    <div class="ar">🇪🇬 ارجع لمثال <code>Notifiable</code> فوق وزوّد كلاس ثالث <code>PushNotifier implements Notifiable</code>. بعد كده اعمل <code>trait Timestamped</code> فيه method <code>now(): string</code> بترجع <code>date('H:i:s')</code>، ودمجها في <code>EmailNotifier</code> و<code>PushNotifier</code> عشان كل رسالة تتبعت تظهر معاها الوقت.</div>
    <div class="en">🇬🇧 Go back to the <code>Notifiable</code> example above and add a third class, <code>PushNotifier implements Notifiable</code>. Then create a <code>trait Timestamped</code> with a <code>now(): string</code> method returning <code>date('H:i:s')</code>, and mix it into both <code>EmailNotifier</code> and <code>PushNotifier</code> so every sent message shows the time.</div>
</div>

<div class="exercise-box">
    <h3>✍️ تمرين إضافي / Extra Exercise</h3>
    <div class="ar">🇪🇬 في <a href="../playground/index.php">محرر الكود</a>: اعمل <code>abstract class Shape</code> بـ method مجردة <code>area()</code>، وكلاسين <code>Circle</code> و<code>Rectangle</code> يورثوا منها وينفذوا <code>area()</code> كل واحد بطريقته. بعد كده اعمل <code>InvalidShapeException</code> ترميها لو الطول أو العرض سالب.</div>
    <div class="en">🇬🇧 In the <a href="../playground/index.php">Playground</a>: create an <code>abstract class Shape</code> with an abstract <code>area()</code> method, and two classes <code>Circle</code> and <code>Rectangle</code> extending it, each implementing <code>area()</code> differently. Then create an <code>InvalidShapeException</code> thrown when width or height is negative.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 كل كلاس هتبنيه في مشروع Task Manager (<code>UserModel</code>, <code>TaskModel</code>, <code>AuthController</code>...) مبني على نفس المفاهيم دي بالظبط: Encapsulation تحمي بيانات المستخدم، Interfaces تفصل العقد عن التنفيذ، وException مخصصة زي <code>TaskNotFoundException</code> بتخليك تتعامل مع الأخطاء بوضوح.</div>
    <div class="en">🇬🇧 Every class you'll build in the Task Manager (<code>UserModel</code>, <code>TaskModel</code>, <code>AuthController</code>...) is built on exactly these concepts: Encapsulation protects user data, Interfaces separate contract from implementation, and a custom Exception like <code>TaskNotFoundException</code> lets you handle errors clearly.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>Class = مخطط، Object = نسخة فعلية، Encapsulation = حماية البيانات بـ <code>private</code> + methods محكومة.</li>
        <li>Inheritance (<code>extends</code>, <code>parent::</code>) = إعادة استخدام وتوسيع سلوك كلاس أب.</li>
        <li>Interface (<code>implements</code>) = عقد يفرض methods من غير ما يحدد تنفيذها.</li>
        <li>Trait (<code>use</code>) = كود جاهز يتدمج في كلاسات مالهاش علاقة ببعض — بديل الوراثة المتعددة.</li>
        <li>Exceptions (<code>throw</code>/<code>try</code>/<code>catch</code>/<code>finally</code>) = تعامل منظم مع الأخطاء بدل الانهيار أو القيم الغريبة.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="stage1.php">← المرحلة السابقة</a>
    <a href="stage3.php">المرحلة الجاية / Next: Web Fundamentals →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
