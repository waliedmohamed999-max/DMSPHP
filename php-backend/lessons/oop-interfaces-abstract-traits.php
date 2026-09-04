<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'oop-interfaces-abstract-traits';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'Stage 11 — Interfaces, Abstract Classes & Traits';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">Stage 11 · Object-Oriented PHP</span>
<h1>Interfaces، Abstract Classes، و Traits <span class="ltr">Interfaces, Abstract Classes &amp; Traits</span></h1>
<p class="subtitle">
    🇪🇬 الفرق بين الثلاثة، ومتى تختار كل واحد لمشروعك.<br>
    <span class="ltr">🇬🇧 The difference between the three, and when to pick each one for your project.</span>
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
    <div class="ar">🇪🇬 الدرس ده بيحل لخبطة شائعة جدًا: إمتى أستخدم Interface، إمتى أستخدم Abstract Class، وإمتى Trait؟ الثلاثة بيشتركوا في إنهم "أدوات لمشاركة أو فرض سلوك"، بس كل واحد ليه غرض مختلف تمامًا. هنبني مثال حقيقي لكل واحد، نشغّله، ونقارن بينهم بوضوح.</div>
    <div class="en">🇬🇧 This lesson resolves a very common confusion: when do I use an Interface, when an Abstract Class, and when a Trait? All three are "tools for sharing or enforcing behavior," but each serves a distinct purpose. We'll build a real example of each, run it, and compare them clearly.</div>
</div>

<h2 id="understand">🧠 1) Interface: عقد بحت من غير أي تنفيذ / Interface: A Pure Contract, No Implementation</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <code>interface Payable</code> بتقول: "أي كلاس بينفذني لازم يوفر <code>pay(float $amount): string</code>" — بدون ما تحدد إزاي. <code>CreditCardPayment</code> و<code>CashPayment</code> بينفذوا نفس العقد بسلوك مختلف تمامًا (رسوم مقابل من غير رسوم).</div>
    <div class="en">🇬🇧 <code>interface Payable</code> says: "any implementing class must provide <code>pay(float $amount): string</code>" — without dictating how. <code>CreditCardPayment</code> and <code>CashPayment</code> implement the same contract with completely different behavior (a fee vs. no fee).</div>
</div>

<pre><code>&lt;?php
interface Payable
{
    public function pay(float $amount): string;
}

class CreditCardPayment implements Payable
{
    public function __construct(private string $cardNumber) {}

    public function pay(float $amount): string
    {
        $last4 = substr($this-&gt;cardNumber, -4);
        return sprintf("Charged $%.2f to card ending in %s (3%% fee: $%.2f)", $amount, $last4, $amount * 0.03);
    }
}

class CashPayment implements Payable
{
    public function pay(float $amount): string
    {
        return sprintf("Collected $%.2f in cash. No processing fee.", $amount);
    }
}

$methods = [
    new CreditCardPayment("4111111111111234"),
    new CashPayment(),
];
foreach ($methods as $method) {
    echo get_class($method) . ': ' . $method-&gt;pay(100) . PHP_EOL;
}</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">CreditCardPayment: Charged $100.00 to card ending in 1234 (3% fee: $3.00)
CashPayment: Collected $100.00 in cash. No processing fee.</div>

<h2>2) Abstract Class: عقد + كود مشترك حقيقي / Abstract Class: A Contract Plus Real Shared Code</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 الفرق الجوهري عن Interface: الـ Abstract Class تقدر تحط فيها method كاملة التنفيذ (مش مجردة) يستفيد منها كل الأبناء من غير ما يكرروها. في المثال، <code>generate()</code> منطقها مكتوب مرة واحدة في الأب <code>Report</code> (Header + Body + Footer)، وكل ابن بيوفر بس جزء الـ <code>body()</code> الخاص بيه. استخدم Abstract Class لما يكون عندك سلوك مشترك فعلي، مش بس توقيع method.</div>
    <div class="en">🇬🇧 The core difference from an Interface: an Abstract Class can hold a fully-implemented (non-abstract) method that every child reuses without repeating it. In the example, <code>generate()</code>'s logic is written once in the parent <code>Report</code> (header + body + footer), and each child only supplies its own <code>body()</code>. Use an Abstract Class when you have genuinely shared behavior, not just a method signature.</div>
</div>

<pre><code>&lt;?php
abstract class Report
{
    public function generate(): string
    {
        // Shared "template method" logic every subclass reuses as-is
        return "[Report Header]\n" . $this-&gt;body() . "\n[End of Report]";
    }

    abstract protected function body(): string;
}

class SalesReport extends Report
{
    protected function body(): string
    {
        return "Total sales this month: $12,450";
    }
}

class UsersReport extends Report
{
    protected function body(): string
    {
        return "New users this month: 87";
    }
}

echo (new SalesReport())-&gt;generate() . PHP_EOL;
echo (new UsersReport())-&gt;generate() . PHP_EOL;</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">[Report Header]
Total sales this month: $12,450
[End of Report]
[Report Header]
New users this month: 87
[End of Report]</div>

<h2 id="practice">💻 3) Trait: كود جاهز لكلاسات مالهاش علاقة ببعض / Trait: Ready-Made Code for Unrelated Classes</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 PHP بترفض الوراثة المتعددة، فمينفعش كلاس يـ <code>extends</code> من أكتر من أب. الـ <code>trait Loggable</code> بيحل ده: كود جاهز (<code>log()</code>) تقدر "تدمجه" بـ <code>use</code> جوه أي كلاس، حتى لو الكلاسات دي (<code>Order</code> و<code>CreditCardPaymentGateway</code>) ملهاش أي علاقة وراثية ببعض.</div>
    <div class="en">🇬🇧 PHP disallows multiple inheritance, so a class can never <code>extends</code> more than one parent. The <code>trait Loggable</code> solves this: ready-made code (<code>log()</code>) you "mix in" with <code>use</code> into any class, even when those classes (<code>Order</code> and <code>CreditCardPaymentGateway</code>) have no inheritance relationship whatsoever.</div>
</div>

<pre><code>&lt;?php
trait Loggable
{
    public function log(string $message): void
    {
        echo "[" . static::class . " LOG] $message" . PHP_EOL;
    }
}

class Order
{
    use Loggable;
}

class CreditCardPaymentGateway
{
    use Loggable;
}

(new Order())-&gt;log("Order #501 created");
(new CreditCardPaymentGateway())-&gt;log("Payment gateway initialized");</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">[Order LOG] Order #501 created
[CreditCardPaymentGateway LOG] Payment gateway initialized</div>

<div class="bi-block">
    <div class="ar">🇪🇬 <b>مقارنة سريعة: امتى تختار إيه؟</b></div>
    <div class="en">🇬🇧 <b>Quick comparison: when to reach for each?</b></div>
</div>
<div class="bi-block">
    <div class="ar">🇪🇬
        <ul>
            <li><b>Interface</b>: عايز تفرض "لازم توفر الـ method دي" على كلاسات مختلفة تمامًا في التنفيذ، من غير ما تشاركهم أي كود. مثال: <code>Payable</code> بين Credit Card وCash.</li>
            <li><b>Abstract Class</b>: عايز عقد + كود مشترك حقيقي بينفّذ مرة واحدة في الأب. مثال: <code>Report::generate()</code> اللي بيستخدمه كل أنواع التقارير.</li>
            <li><b>Trait</b>: عايز تشارك سلوك جاهز بين كلاسات ملهاش علاقة وراثية ببعض خالص. مثال: <code>Loggable</code> بين <code>Order</code> و<code>CreditCardPaymentGateway</code>.</li>
        </ul>
    </div>
    <div class="en">
        <ul>
            <li><b>Interface</b>: you need to force "must provide this method" across classes with completely different implementations, without sharing any code. Example: <code>Payable</code> across Credit Card and Cash.</li>
            <li><b>Abstract Class</b>: you need a contract plus real shared code implemented once in the parent. Example: <code>Report::generate()</code> used by every report type.</li>
            <li><b>Trait</b>: you need to share ready-made behavior across classes with no inheritance relationship at all. Example: <code>Loggable</code> across <code>Order</code> and <code>CreditCardPaymentGateway</code>.</li>
        </ul>
    </div>
</div>

<div class="mini-editor-wrap">
    <textarea spellcheck="false">&lt;?php
interface Payable
{
    public function pay(float $amount): string;
}

class BankTransferPayment implements Payable
{
    public function pay(float $amount): string
    {
        return sprintf("Wired $%.2f via bank transfer (1-3 business days).", $amount);
    }
}

trait Loggable
{
    public function log(string $message): void
    {
        echo "[" . static::class . " LOG] $message" . PHP_EOL;
    }
}

class Invoice
{
    use Loggable;
}

$payment = new BankTransferPayment();
echo $payment-&gt;pay(250) . PHP_EOL;

(new Invoice())-&gt;log("Invoice #77 marked as paid");</textarea>
    <div class="mini-toolbar">
        <button class="mini-run-btn">▶ شغّل / Run</button>
        <span class="mini-status"></span>
    </div>
    <div class="output-box">— لسه متشغلش / not run yet —</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="interface">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">عندك <code>CreditCardPayment</code> و<code>CashPayment</code> بسلوك مختلف تمامًا لكن عايزهم يوفروا نفس الـ method بدون كود مشترك — تستخدم إيه؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">You need <code>CreditCardPayment</code> and <code>CashPayment</code> to provide the same method with totally different behavior and no shared code — what do you use?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="interface"> Interface</label>
        <label><input type="radio" name="q1" value="trait"> Trait</label>
        <label><input type="radio" name="q1" value="abstract"> Abstract Class</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="abstract">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">في مثال <code>Report</code>، إيه اللي خلّى Abstract Class الاختيار الصح بدل Interface؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">In the <code>Report</code> example, what made Abstract Class the right choice over Interface?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="abstract"> عشان generate() فيها كود مشترك حقيقي بيتنفذ مرة واحدة في الأب</label>
        <label><input type="radio" name="q2" value="interface"> Interface كانت هتدي نفس النتيجة بالظبط</label>
        <label><input type="radio" name="q2" value="random"> مفيش سبب، الاتنين متطابقين في PHP</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="trait">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question"><code>Order</code> و<code>CreditCardPaymentGateway</code> ملهومش أي علاقة وراثية، وعايزهم يشاركوا نفس <code>log()</code> — أنهي أداة الأنسب؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em"><code>Order</code> and <code>CreditCardPaymentGateway</code> have no inheritance relationship, and you want them to share the same <code>log()</code> — which tool fits?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="interface"> Interface</label>
        <label><input type="radio" name="q3" value="trait"> Trait</label>
        <label><input type="radio" name="q3" value="abstract"> Abstract Class</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="notallowed">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">لو عملت كلاس <code>extends ReportA, ReportB</code> (وراثة من كلاسين أب مباشرة) هيحصل إيه في PHP؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">If you write a class that <code>extends ReportA, ReportB</code> (extending two parents directly), what happens in PHP?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="allowed"> مسموح عادي</label>
        <label><input type="radio" name="q4" value="notallowed"> خطأ Syntax — PHP مش بتدعم وراثة كلاسات متعددة، Traits هي البديل</label>
        <label><input type="radio" name="q4" value="warning"> بيشتغل بس مع Warning</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ Trait للتوقيت + Interface للتصدير / A Timestamp Trait + an Export Interface</h3>
    <div class="ar">🇪🇬 في <a href="../playground/index.php">محرر الكود</a>: اعمل <code>interface Exportable</code> بـ method <code>export(): string</code>، وكلاسين <code>CsvExporter</code> و<code>JsonExporter</code> ينفذوها بشكل مختلف. بعد كده اعمل <code>trait Timestamped</code> بـ method <code>timestamp(): string</code> ترجع <code>date('H:i:s')</code>، ودمجها في الكلاسين عشان كل تصدير يظهر معاه وقته.</div>
    <div class="en">🇬🇧 In the <a href="../playground/index.php">Playground</a>: create an <code>interface Exportable</code> with an <code>export(): string</code> method, and two classes <code>CsvExporter</code> and <code>JsonExporter</code> implementing it differently. Then build a <code>trait Timestamped</code> with a <code>timestamp(): string</code> method returning <code>date('H:i:s')</code>, and mix it into both classes so every export shows its time.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 دلوقتي عندك الأدوات الخمسة الأساسية للـ OOP: Class/Object، Encapsulation، Inheritance/Polymorphism، وInterface/Abstract/Trait. الدرس الأخير — وهو مشروع كامل — هياخدهم كلهم ويطبّقهم مع بعض عشان يفكّك كلاس <code>User</code> واحد "بيعمل كل حاجة" لأربع كلاسات منظمة بمبدأ Dependency Injection.</div>
    <div class="en">🇬🇧 You now have the five core OOP tools: Class/Object, Encapsulation, Inheritance/Polymorphism, and Interface/Abstract/Trait. The final lesson — a full project — brings them all together to break apart one "does everything" <code>User</code> class into four organized classes using Dependency Injection.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>Interface = عقد بحت من غير أي كود، لكلاسات ممكن يكون تنفيذها مختلف تمامًا.</li>
        <li>Abstract Class = عقد + كود مشترك حقيقي بيتنفذ مرة واحدة في الأب.</li>
        <li>Trait = كود جاهز يتدمج بـ <code>use</code> في كلاسات ملهاش علاقة وراثية ببعض — بديل الوراثة المتعددة الممنوعة في PHP.</li>
        <li>القرار العملي: اختلاف تنفيذ تام → Interface. سلوك مشترك حقيقي في تسلسل هرمي → Abstract Class. مشاركة كود بين كلاسات غير مرتبطة → Trait.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="oop-inheritance-polymorphism.php">← المرحلة السابقة</a>
    <a href="oop-dependency-injection-project.php">المرحلة الجاية / Next: 🚀 Project: Dependency Injection →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
