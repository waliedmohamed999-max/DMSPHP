<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'stage7';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'المرحلة 7 — أنماط التصميم والكود النظيف';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">المسار الاحترافي — المرحلة 7 / Stage 7</span>
<h1>أنماط التصميم والكود النظيف <span class="ltr">Design Patterns &amp; Clean Code</span></h1>
<p class="subtitle">مبروك على خلاص مشروع التخرج. دلوقتي بنبدأ المسار اللي بيفرّق بين مبرمج "شغّال" ومبرمج "محترف": إزاي تكتب كود سهل التغيير، وتستخدم حلول جرّبها آلاف المهندسين قبلك بدل ما تخترع من الصفر.</p>

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
    <div class="ar">🇪🇬 تفهم مبادئ SOLID وتطبّقها، وتتعرف على 3 أنماط تصميم (Design Patterns) الأكتر استخدامًا في Backend حقيقي: Dependency Injection, Repository, و Factory/Strategy.</div>
    <div class="en">🇬🇧 Understand and apply the SOLID principles, and learn the 3 most-used design patterns in real Backend code: Dependency Injection, Repository, and Factory/Strategy.</div>
</div>

<h2 id="understand">🧠 SOLID — خمس مبادئ للكود القابل للتغيير</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 SOLID مش قواعد صارمة، هي مبادئ بتساعدك تسأل "هل الكود ده هيتعب لو المشروع كبر؟". أهمهم اتنين هنركز عليهم دلوقتي:</div>
</div>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>S — مسؤولية واحدة (Single Responsibility):</b> كل كلاس لازم يكون ليه سبب واحد بس يتغيّر عشانه. لو الكلاس بيتحقق من البيانات، وبيكلم قاعدة البيانات، وبيبعت إيميل — ده 3 مسؤوليات في كلاس واحد، وأي تعديل في حتة ممكن يكسر التانية.</div>
    <div class="en">🇬🇧 <b>S — Single Responsibility:</b> every class should have exactly one reason to change. If a class validates data, talks to the database, AND sends emails — that's 3 responsibilities in one class, and a change to one can break another.</div>
</div>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>D — عكس الاعتماد (Dependency Inversion):</b> الكود بتاعك لازم يعتمد على "عقد" (Interface) مش على تفاصيل تنفيذ محددة. ده أساس فكرة Dependency Injection اللي جايه دلوقتي.</div>
    <div class="en">🇬🇧 <b>D — Dependency Inversion:</b> your code should depend on a "contract" (Interface), not on a specific implementation's details. This is the foundation of Dependency Injection, covered next.</div>
</div>

<h2>Dependency Injection</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 بدل ما الكلاس يعمل <code>new</code> للحاجة اللي محتاجها جوه نفسه (وده بيربطه بيها بشكل صلب)، بتديله إياها من برة (عن طريق الـ Constructor غالبًا). الفايدة الكبيرة: تقدر تستبدلها بنسخة تانية بسهولة — زي نسخة وهمية (Mock) وقت الاختبار.</div>
    <div class="en">🇬🇧 Instead of a class creating what it needs internally with <code>new</code> (which hard-couples it), you hand it in from outside (usually via the Constructor). The big win: you can swap it for a different implementation easily — like a fake (Mock) one during testing.</div>
</div>

<pre><code>&lt;?php
// ❌ بدون Dependency Injection — الكلاس مربوط بـ PDO مباشرة
class OrderService {
    public function place(array $data): void {
        $pdo = new PDO('mysql:host=localhost;dbname=shop', 'root', '');
        $pdo->prepare('INSERT INTO orders ...')->execute($data);
    }
}

// ✅ مع Dependency Injection — الكلاس بيستقبل اللي محتاجه
class OrderService {
    public function __construct(private PDO $pdo) {}

    public function place(array $data): void {
        $this->pdo->prepare('INSERT INTO orders ...')->execute($data);
    }
}

// وقت الاستخدام الفعلي
$service = new OrderService($pdo);
// وقت الاختبار: تقدر تديله نسخة وهمية بدل ما تفتح اتصال حقيقي بقاعدة بيانات</code></pre>
<h3>الفايدة الفعلية / Actual benefit</h3>
<div class="output-box">Testable: swap PDO for a fake connection in tests, no real database needed.
Reusable: OrderService no longer knows or cares how the connection was configured.</div>

<div class="flow-diagram">
    <div class="flow-box">OrderService needs a PDO</div>
    <div class="flow-arrow">↓ received via constructor, not created internally</div>
    <div class="flow-box">Caller decides what to inject</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">Production: real PDO&nbsp;&nbsp;|&nbsp;&nbsp;Tests: fake/mock connection</div>
</div>

<h2>Repository Pattern</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 نفس فكرة الـ Model من قبل كده، لكن أوضح: الـ Repository بيبقى المكان الوحيد في المشروع كله اللي بيعرف يكتب SQL. أي حتة تانية في الكود بتكلم الـ Repository بأسماء واضحة زي <code>findById()</code> مش بتكتب queries بنفسها.</div>
    <div class="en">🇬🇧 Similar to the earlier Model idea, but stricter: the Repository is the single place in the entire project that knows how to write SQL. Everywhere else talks to it through clear method names like <code>findById()</code>, never writing queries itself.</div>
</div>

<pre><code>&lt;?php
interface ProductRepository {
    public function findById(int $id): ?array;
    public function all(): array;
}

class MysqlProductRepository implements ProductRepository {
    public function __construct(private PDO $pdo) {}

    public function findById(int $id): ?array {
        $stmt = $this->pdo->prepare('SELECT * FROM products WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch() ?: null;
    }

    public function all(): array {
        return $this->pdo->query('SELECT * FROM products')->fetchAll();
    }
}

// الـ Controller بيتعامل مع الـ Interface بس، مش عارف ولا محتاج يعرف إنها MySQL
class ProductController {
    public function __construct(private ProductRepository $repo) {}
    public function show(int $id): void {
        echo json_encode($this->repo->findById($id) ?? ['error' => 'Not found']);
    }
}</code></pre>
<h3>الناتج الفعلي (GET /products/1) / Actual output</h3>
<div class="output-box">{"id":1,"name":"Keyboard","price":45.99}</div>

<div class="bi-block">
    <div class="ar">🇪🇬 الفايدة الحقيقية: لو غيّرت قاعدة البيانات بالكامل من MySQL لـ MongoDB بكرة، هتعمل <code>MongoProductRepository</code> جديدة تنفّذ نفس الـ Interface، والـ Controller مش هيحتاج يتغيّر ولا سطر واحد.</div>
    <div class="en">🇬🇧 The real payoff: if you switch databases entirely from MySQL to MongoDB tomorrow, you write a new <code>MongoProductRepository</code> implementing the same Interface, and the Controller doesn't change by a single line.</div>
</div>

<h2 id="practice">💻 Factory &amp; Strategy Patterns</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>Factory:</b> كلاس مسؤول بس عن إنشاء objects معقدة، عشان باقي الكود ميعرفش تفاصيل الإنشاء. <b>Strategy:</b> بتخلي "الطريقة" اللي بيتم بيها حاجة قابلة للتبديل وقت التشغيل — زي طرق دفع مختلفة بنفس العقد.</div>
    <div class="en">🇬🇧 <b>Factory:</b> a class solely responsible for creating complex objects, so the rest of the code doesn't know construction details. <b>Strategy:</b> makes "how" something is done swappable at runtime — like different payment methods behind the same contract.</div>
</div>

<pre><code>&lt;?php
interface PaymentStrategy {
    public function pay(float $amount): string;
}

class CreditCardPayment implements PaymentStrategy {
    public function pay(float $amount): string {
        return "Charged $amount to credit card.";
    }
}

class PaypalPayment implements PaymentStrategy {
    public function pay(float $amount): string {
        return "Sent $amount via PayPal.";
    }
}

class Checkout {
    public function __construct(private PaymentStrategy $strategy) {}
    public function complete(float $amount): string {
        return $this->strategy->pay($amount);
    }
}

echo (new Checkout(new CreditCardPayment()))->complete(99.99) . PHP_EOL;
echo (new Checkout(new PaypalPayment()))->complete(50.00) . PHP_EOL;</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">Charged 99.99 to credit card.
Sent 50 via PayPal.</div>

<div class="bi-block">
    <div class="ar">🇪🇬 الكود ده شغال زي ما هو من غير أي تعديل — جرّبه في المحرر تحت، وحاول تضيف طريقة دفع تالتة زي هيتشرحلك في الـ Challenge.</div>
    <div class="en">🇬🇧 This code runs as-is with no changes needed — try it in the editor below, and try adding a third payment method as described in the Challenge.</div>
</div>

<div class="mini-editor-wrap">
    <textarea spellcheck="false">&lt;?php
interface PaymentStrategy {
    public function pay(float $amount): string;
}

class CreditCardPayment implements PaymentStrategy {
    public function pay(float $amount): string {
        return "Charged $amount to credit card.";
    }
}

class PaypalPayment implements PaymentStrategy {
    public function pay(float $amount): string {
        return "Sent $amount via PayPal.";
    }
}

class Checkout {
    public function __construct(private PaymentStrategy $strategy) {}
    public function complete(float $amount): string {
        return $this->strategy->pay($amount);
    }
}

echo (new Checkout(new CreditCardPayment()))->complete(99.99) . PHP_EOL;
echo (new Checkout(new PaypalPayment()))->complete(50.00) . PHP_EOL;</textarea>
    <div class="mini-toolbar">
        <button class="mini-run-btn">▶ شغّل / Run</button>
        <span class="mini-status"></span>
    </div>
    <div class="output-box">— لسه متشغلش / not run yet —</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="di">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">إيه اللي بيخلي <code>OrderService</code> قابل للاختبار من غير قاعدة بيانات حقيقية؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What makes <code>OrderService</code> testable without a real database?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="static"> استخدام static methods</label>
        <label><input type="radio" name="q1" value="di"> استقبال الـ PDO من برة (Dependency Injection) بدل ما يعمل new لنفسه</label>
        <label><input type="radio" name="q1" value="trait"> استخدام Trait بدل Class</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="repository">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">عايز تغيّر قاعدة البيانات بالكامل من MySQL لـ MongoDB من غير ما تلمس الـ Controllers، إيه النمط اللي يخليك تعمل كده؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Which pattern lets you fully switch databases without touching Controllers?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="repository"> Repository Pattern (خلف Interface)</label>
        <label><input type="radio" name="q2" value="strategy"> Strategy Pattern دايمًا</label>
        <label><input type="radio" name="q2" value="none"> مفيش نمط بيساعد في كده</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ زوّد طريقة دفع تالتة / Add a Third Payment Method</h3>
    <div class="ar">🇪🇬 في المحرر فوق، زوّد كلاس <code>BankTransferPayment implements PaymentStrategy</code>، واستخدمه مع <code>Checkout</code> من غير ما تعدّل ولا سطر واحد في كلاس <code>Checkout</code> نفسه — ده بالظبط مبدأ "Open/Closed" من SOLID: مفتوح للإضافة، مقفول للتعديل.</div>
    <div class="en">🇬🇧 In the editor above, add a <code>BankTransferPayment implements PaymentStrategy</code> class and use it with <code>Checkout</code> without changing a single line in the <code>Checkout</code> class itself — this is exactly SOLID's "Open/Closed" principle: open for extension, closed for modification.</div>
</div>

<div class="exercise-box">
    <h3>✍️ تمرين إضافي / Extra Exercise</h3>
    <div class="ar">🇪🇬 ارجع لمشروع Task Manager (Capstone) وطبّق Repository Pattern على جدول <code>tasks</code>: اعمل <code>TaskRepository</code> Interface و <code>MysqlTaskRepository</code> ينفذه، وخلّي الـ Controller يستخدم الـ Interface بس عن طريق Dependency Injection.</div>
    <div class="en">🇬🇧 Go back to the Task Manager (Capstone) and apply the Repository Pattern to the <code>tasks</code> table: create a <code>TaskRepository</code> Interface and a <code>MysqlTaskRepository</code> implementation, and have the Controller depend only on the Interface via Dependency Injection.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 مشروع Task Manager بتاعك شغال، بس هيبقى "احترافي" فعلًا لما تطبّق عليه دي: Repository لكل جدول بدل SQL متناثر جوه الـ Controllers، Dependency Injection عشان تقدر تختبره من غير قاعدة بيانات حقيقية، وStrategy لو ضفت أكتر من طريقة إشعار أو دفع مستقبلًا.</div>
    <div class="en">🇬🇧 Your Task Manager already works, but it becomes truly professional once you apply these: a Repository per table instead of SQL scattered across Controllers, Dependency Injection so you can test it without a real database, and Strategy if you add more than one notification or payment method later.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>Single Responsibility = كل كلاس ليه سبب واحد بس يتغيّر عشانه.</li>
        <li>Dependency Injection = الكلاس بياخد اللي محتاجه من برة بدل ما يعمله بنفسه — بيسهّل الاختبار والاستبدال.</li>
        <li>Repository Pattern = مكان واحد بيعرف يكتب SQL، وباقي الكود بيتكلم معاه بأسماء واضحة.</li>
        <li>Factory/Strategy = فصل "إزاي بيتعمل الشيء" عن "مين بيستخدمه"، وبيخلي الاستبدال وقت التشغيل ممكن.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="capstone.php">← مشروع التخرج</a>
    <a href="stage8.php">المرحلة الجاية / Next: Advanced Testing →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
