<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'oop-inheritance-polymorphism';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'Stage 11 — Inheritance & Polymorphism';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">Stage 11 · Object-Oriented PHP</span>
<h1>الوراثة وتعدد الأشكال <span class="ltr">Inheritance &amp; Polymorphism</span></h1>
<p class="subtitle">
    🇪🇬 extends، override method، وإزاي كائنات مختلفة ترد على نفس النداء بشكل مختلف.<br>
    <span class="ltr">🇬🇧 extends, method overriding, and how different objects respond differently to the same call.</span>
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
    <div class="ar">🇪🇬 <code>stage2.php</code> شرح الوراثة بمثال <code>Employee</code>/<code>Manager</code>. هنا هنشتغل على مثال أقرب لأي Backend حقيقي: نظام إشعارات (Notifications) — <code>abstract class Notification</code> بيفرض على كل نوع إنه يعرف يـ <code>send()</code>، وكل نوع بينفذها بطريقته الخاصة. وهنشوف تعدد الأشكال (Polymorphism) بشكله الحقيقي: مصفوفة فيها أنواع مختلفة، ونفس النداء بيدي نتايج مختلفة تمامًا لكل نوع.</div>
    <div class="en">🇬🇧 <code>stage2.php</code> covered inheritance with an <code>Employee</code>/<code>Manager</code> example. Here we work through something closer to a real backend: a notification system — an <code>abstract class Notification</code> forces every type to know how to <code>send()</code>, and each type implements it its own way. We'll see polymorphism in its real form: an array of mixed types where the same call produces completely different results per type.</div>
</div>

<h2 id="understand">🧠 1) Abstract Class: عقد + إجبار على الوراثة / Abstract Class: A Contract That Forces Inheritance</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <code>abstract class Notification</code> معناها إنها مينفعش تتعمل منها Object مباشرة — لازم تتوّرث. الـ method <code>send()</code> اتحطتلها <code>abstract</code> كمان، يعني كل كلاس بيورّث لازم يكتبها بنفسه (Override)، وإلا PHP هترفض. الـ Constructor المشترك (<code>$recipient</code>, <code>$message</code>) موجود في الأب عشان الكلاسات الوارثة متكررش نفس الكود.</div>
    <div class="en">🇬🇧 <code>abstract class Notification</code> means you can never instantiate it directly — it must be extended. The <code>send()</code> method is also marked <code>abstract</code>, meaning every subclass must implement it (override it) or PHP rejects the class. The shared constructor (<code>$recipient</code>, <code>$message</code>) lives in the parent so subclasses don't repeat the same code.</div>
</div>

<pre><code>&lt;?php
abstract class Notification
{
    public function __construct(protected string $recipient, protected string $message) {}

    abstract public function send(): string;
}

class EmailNotification extends Notification
{
    public function send(): string
    {
        return "📧 Emailing {$this-&gt;recipient}: \"{$this-&gt;message}\"";
    }
}

class SmsNotification extends Notification
{
    public function send(): string
    {
        return "📱 Texting {$this-&gt;recipient}: \"{$this-&gt;message}\" (160 chars max)";
    }
}

class PushNotification extends Notification
{
    public function send(): string
    {
        return "🔔 Push to {$this-&gt;recipient}'s device: \"{$this-&gt;message}\"";
    }
}</code></pre>

<h2>2) Polymorphism: نفس النداء، سلوك مختلف / Polymorphism: Same Call, Different Behavior</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 دلوقتي نبني مصفوفة فيها الثلاث أنواع مع بعض، ونلف عليها بـ <code>foreach</code> واحد بينادي <code>send()</code> على كل عنصر — من غير ما نحتاج <code>if</code> ولا واحدة نتأكد "هو ده Email ولا Sms؟". كل Object عارف يرد على النداء بطريقته الخاصة، وده جوهر الـ Polymorphism.</div>
    <div class="en">🇬🇧 Now we build an array containing all three types together, and loop over it with one <code>foreach</code> that calls <code>send()</code> on every element — without needing a single <code>if</code> to check "is this an Email or an Sms?". Every object knows how to respond to the call its own way, and that's the essence of Polymorphism.</div>
</div>

<pre><code>&lt;?php
$queue = [
    new EmailNotification("ahmed@example.com", "Your order has shipped"),
    new SmsNotification("+20100000000", "Your OTP is 4821"),
    new PushNotification("device-Sara-01", "New message from support"),
];

foreach ($queue as $notification) {
    echo get_class($notification) . ' -&gt; ' . $notification-&gt;send() . PHP_EOL;
}

echo PHP_EOL . "Trying to instantiate the abstract class directly:" . PHP_EOL;
try {
    $bad = new Notification("x@example.com", "test");
} catch (Error $e) {
    echo "Error: " . $e-&gt;getMessage() . PHP_EOL;
}</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">EmailNotification -> 📧 Emailing ahmed@example.com: "Your order has shipped"
SmsNotification -> 📱 Texting +20100000000: "Your OTP is 4821" (160 chars max)
PushNotification -> 🔔 Push to device-Sara-01's device: "New message from support"

Trying to instantiate the abstract class directly:
Error: Cannot instantiate abstract class Notification</div>

<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ حاجتين: أولًا، الرسايل الثلاثة مختلفة تمامًا مع إن الاستدعاء نفسه (<code>$notification->send()</code>) — ده Polymorphism فعليًا مش نظريًا. ثانيًا، محاولة عمل <code>new Notification(...)</code> مباشرة رمت <code>Error</code> فوريًا، لإن PHP بترفض إنشاء Object من كلاس Abstract — ده بالظبط الغرض من <code>abstract</code>: إجبارك تستخدم نوع فرعي حقيقي دايمًا.</div>
    <div class="en">🇬🇧 Notice two things: first, all three messages are completely different despite the identical call (<code>$notification->send()</code>) — that's Polymorphism in practice, not just theory. Second, trying <code>new Notification(...)</code> directly threw an <code>Error</code> immediately, because PHP refuses to instantiate an abstract class — that's exactly the point of <code>abstract</code>: forcing you to always use a real subtype.</div>
</div>

<h2 id="practice">💻 جرّب بنفسك / Try It Yourself</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 زوّد نوع رابع <code>SlackNotification</code> وشوف إزاي الـ <code>foreach</code> اشتغل معاه من غير ما تعدّل فيه سطر واحد.</div>
    <div class="en">🇬🇧 Add a fourth type, <code>SlackNotification</code>, and see how the <code>foreach</code> works with it without changing a single line.</div>
</div>

<div class="mini-editor-wrap">
    <textarea spellcheck="false">&lt;?php
abstract class Notification
{
    public function __construct(protected string $recipient, protected string $message) {}

    abstract public function send(): string;
}

class EmailNotification extends Notification
{
    public function send(): string
    {
        return "📧 Emailing {$this-&gt;recipient}: \"{$this-&gt;message}\"";
    }
}

class SlackNotification extends Notification
{
    public function send(): string
    {
        return "💬 Posting to Slack for {$this-&gt;recipient}: \"{$this-&gt;message}\"";
    }
}

$queue = [
    new EmailNotification("laila@example.com", "Weekly report ready"),
    new SlackNotification("#general", "Deploy finished successfully"),
];

foreach ($queue as $n) {
    echo $n-&gt;send() . PHP_EOL;
}</textarea>
    <div class="mini-toolbar">
        <button class="mini-run-btn">▶ شغّل / Run</button>
        <span class="mini-status"></span>
    </div>
    <div class="output-box">— لسه متشغلش / not run yet —</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="cannot">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">إيه اللي بيحصل لو حاولت <code>new Notification("x@example.com", "test")</code> مباشرة؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What happens if you try <code>new Notification("x@example.com", "test")</code> directly?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="works"> بتشتغل عادي زي أي كلاس</label>
        <label><input type="radio" name="q1" value="cannot"> PHP بترمي Error لإنها abstract class</label>
        <label><input type="radio" name="q1" value="warning"> بتطبع Warning بس وتكمل</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="must">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">لو عملت <code>class WhatsappNotification extends Notification</code> ونسيت تكتب <code>send()</code> فيها، إيه اللي هيحصل؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">If you create <code>class WhatsappNotification extends Notification</code> and forget to implement <code>send()</code>, what happens?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="default"> هتاخد نسخة افتراضية فاضية من send()</label>
        <label><input type="radio" name="q2" value="must"> PHP هترفض الكلاس لإن abstract method لازم تتنفذ</label>
        <label><input type="radio" name="q2" value="silent"> هتشتغل عادي وترجع null</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="noedit">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">لو ضفت نوع رابع لمصفوفة <code>$queue</code>، إيه اللي محتاج يتغيّر في كود الـ <code>foreach</code> نفسه؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">If you add a fourth type to the <code>$queue</code> array, what needs to change in the <code>foreach</code> code itself?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="noedit"> ولا سطر — بس تضيفه للمصفوفة</label>
        <label><input type="radio" name="q3" value="ifelse"> لازم تضيف if جديد للنوع الجديد</label>
        <label><input type="radio" name="q3" value="loop"> لازم تعمل foreach منفصل لكل نوع</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="polymorphism">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">نفس استدعاء <code>send()</code> بيرجع نص مختلف تمامًا حسب نوع الكلاس الفعلي — الاسم التقني للسلوك ده إيه؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">The same <code>send()</code> call returns completely different text depending on the actual class — what's this behavior called?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="encapsulation"> Encapsulation</label>
        <label><input type="radio" name="q4" value="polymorphism"> Polymorphism</label>
        <label><input type="radio" name="q4" value="abstraction"> Abstraction فقط</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ نظام دفع بالوراثة / A Payment Hierarchy</h3>
    <div class="ar">🇪🇬 في <a href="../playground/index.php">محرر الكود</a>: اعمل <code>abstract class PaymentMethod</code> بـ method مجردة <code>process(float $amount): string</code>، وكلاسين <code>Wallet</code> و<code>BankTransfer</code> يورثوا منها وينفذوا <code>process()</code> كل واحد برسالة مختلفة. اعمل مصفوفة فيها الاتنين، ولف عليها بـ <code>foreach</code> واطبع نتيجة كل واحد.</div>
    <div class="en">🇬🇧 In the <a href="../playground/index.php">Playground</a>: create an <code>abstract class PaymentMethod</code> with an abstract <code>process(float $amount): string</code> method, and two classes <code>Wallet</code> and <code>BankTransfer</code> extending it, each implementing <code>process()</code> with a different message. Build an array of both, loop over it with <code>foreach</code>, and print each result.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 الوراثة بتديك كلاس واحد أب لكذا كلاس ابن. الدرس الجاي بيوسّع الفكرة: أحيانًا مش محتاج علاقة أب-ابن خالص، بس محتاج "عقد" (Interface) أو كود مشترك بين كلاسات مالهاش علاقة ببعض (Trait) — هنشوف الفرق بين الثلاثة ومتى تستخدم كل واحد.</div>
    <div class="en">🇬🇧 Inheritance gives you one parent class for several child classes. The next lesson widens the idea: sometimes you don't need a parent-child relationship at all, just a "contract" (Interface) or shared code between unrelated classes (Trait) — we'll see the difference between all three and when to use each.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li><code>abstract class</code> مينفعش يتعمل منها Object مباشرة، وبتفرض على الأبناء تنفيذ methods معينة.</li>
        <li>الـ Constructor والكود المشترك بيتحطوا في الأب، فمش بيتكرروا في كل ابن.</li>
        <li>Polymorphism = نفس النداء (<code>send()</code>) على أنواع مختلفة بيدي سلوك مختلف، من غير ما المستدعي يعرف نوع الكلاس.</li>
        <li>مصفوفة مختلطة من الأنواع الوارثة + <code>foreach</code> واحد = إضافة أنواع جديدة من غير تعديل كود الاستدعاء.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="oop-encapsulation.php">← المرحلة السابقة</a>
    <a href="oop-interfaces-abstract-traits.php">المرحلة الجاية / Next: Interfaces, Abstract Classes & Traits →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
