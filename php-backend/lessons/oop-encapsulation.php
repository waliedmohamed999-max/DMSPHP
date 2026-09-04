<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'oop-encapsulation';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'Stage 11 — Encapsulation & Visibility';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">Stage 11 · Object-Oriented PHP</span>
<h1>التغليف (Encapsulation) ومستويات الوصول <span class="ltr">Encapsulation &amp; Visibility</span></h1>
<p class="subtitle">
    🇪🇬 public/private/protected، وليه إخفاء التفاصيل الداخلية بيحمي الكود من نفسه.<br>
    <span class="ltr">🇬🇧 public/private/protected, and why hiding internal details protects code from itself.</span>
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
    <div class="ar">🇪🇬 في الدرس اللي فات، كل Properties كلاس <code>User</code> كانت <code>public</code> — أي كود برة الكلاس يقدر يحطلها أي قيمة، صح أو غلط. هنا هناخد نفس الـ <code>User</code> ونحمي الإيميل بمستوى وصول أضيق (<code>private</code>)، ونجبر أي تعديل عليه إنه يمر على تحقق (Validation) قبل ما يتقبل.</div>
    <div class="en">🇬🇧 In the previous lesson, every property on the <code>User</code> class was <code>public</code> — any outside code could assign it any value, valid or not. Here we take that same <code>User</code> and protect the email with a narrower visibility (<code>private</code>), forcing any change to it through validation before it's accepted.</div>
</div>

<h2 id="understand">🧠 1) مستويات الوصول الثلاثة / The Three Visibility Levels</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <code>public</code>: أي حد من جوه أو برة الكلاس يقدر يوصله. <code>protected</code>: بس الكلاس نفسه والكلاسات اللي بترثه (هنشوفها بالتفصيل في درس الوراثة). <code>private</code>: الكلاس نفسه بس — ولا حتى الكلاسات الوارثة تقدر توصله مباشرة. كل ما ضيّقت الوصول، كل ما قلّلت الأماكن اللي ممكن تكسر البيانات من غيرها.</div>
    <div class="en">🇬🇧 <code>public</code>: accessible from anywhere, inside or outside the class. <code>protected</code>: only the class itself and classes that extend it (we'll cover this in the Inheritance lesson). <code>private</code>: only the class itself — not even child classes can reach it directly. The narrower the access, the fewer places that can accidentally corrupt the data.</div>
</div>

<h2>2) ليه <code>public</code> على بيانات حساسة مشكلة / Why Public Access on Sensitive Data Is a Problem</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 لو <code>email</code> كانت <code>public</code>، أي جزء من البرنامج يقدر يكتب <code>$user->email = "أي حاجة";</code> من غير أي فحص. مفيش مكان مركزي يتأكد إن القيمة شكلها إيميل فعلاً. المثال ده بيوضح المشكلة باستخدام <code>stdClass</code> (كائن عام بدون أي حماية) عشان نشوف بالظبط إيه اللي ممكن يحصل من غير تغليف.</div>
    <div class="en">🇬🇧 If <code>email</code> were <code>public</code>, any part of the program could write <code>$user->email = "anything";</code> with zero checks. There's no central place that verifies the value actually looks like an email. This example demonstrates the problem using <code>stdClass</code> (a generic object with no protection at all) to show exactly what can happen without encapsulation.</div>
</div>

<pre><code>&lt;?php
echo "What public access would allow (simulated with a stdClass):" . PHP_EOL;
$looseUser = new stdClass();
$looseUser-&gt;email = "sara@example.com";
$looseUser-&gt;email = "totally garbage, no @ or dot"; // nothing stops this
echo "Public property now holds: " . $looseUser-&gt;email . PHP_EOL;</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">What public access would allow (simulated with a stdClass):
Public property now holds: totally garbage, no @ or dot</div>

<div class="bi-block">
    <div class="ar">🇪🇬 مفيش حاجة اتكسرت أو رمت خطأ — وده بالظبط الخطر. القيمة اتقبلت بهدوء وهي فاسدة، وأي كود بعد كده هيتعامل معاها على إنها إيميل حقيقي.</div>
    <div class="en">🇬🇧 Nothing broke or threw an error — and that's exactly the danger. The bad value was quietly accepted, and any later code will treat it as if it were a real email.</div>
</div>

<h2 id="practice">💻 3) الحل: private + getter/setter بيتحقق / The Fix: private + a Validating getter/setter</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 دلوقتي بنخلي <code>$email</code> بس <code>private</code>، ونوفر <code>getEmail()</code> للقراءة و<code>setEmail()</code> للكتابة. <code>setEmail()</code> هي المكان الوحيد اللي ممكن يعدّل الإيميل، وهي اللي بتتحقق باستخدام <code>filter_var(..., FILTER_VALIDATE_EMAIL)</code> قبل ما تقبل أي قيمة. لو القيمة غلط، بترمي <code>InvalidArgumentException</code> بدل ما تقبلها بصمت.</div>
    <div class="en">🇬🇧 Now we make <code>$email</code> <code>private</code>, and expose <code>getEmail()</code> for reading and <code>setEmail()</code> for writing. <code>setEmail()</code> is the only place that can change the email, and it validates with <code>filter_var(..., FILTER_VALIDATE_EMAIL)</code> before accepting any value. If it's invalid, it throws an <code>InvalidArgumentException</code> instead of silently accepting it.</div>
</div>

<pre><code>&lt;?php
class User
{
    public string $name;
    private string $email;

    public function __construct(string $name, string $email)
    {
        $this-&gt;name = $name;
        $this-&gt;setEmail($email);
    }

    public function getEmail(): string
    {
        return $this-&gt;email;
    }

    public function setEmail(string $email): void
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException("'$email' is not a valid email address.");
        }
        $this-&gt;email = $email;
    }
}

$user = new User("Sara", "sara@example.com");
echo "Created user with email: " . $user-&gt;getEmail() . PHP_EOL;

echo PHP_EOL . "Trying a valid update:" . PHP_EOL;
$user-&gt;setEmail("sara.new@example.com");
echo "Updated email: " . $user-&gt;getEmail() . PHP_EOL;

echo PHP_EOL . "Trying an invalid update:" . PHP_EOL;
try {
    $user-&gt;setEmail("not-an-email");
    echo "Updated email: " . $user-&gt;getEmail() . PHP_EOL;
} catch (InvalidArgumentException $e) {
    echo "Rejected: " . $e-&gt;getMessage() . PHP_EOL;
}
echo "Email is still: " . $user-&gt;getEmail() . PHP_EOL;</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">Created user with email: sara@example.com

Trying a valid update:
Updated email: sara.new@example.com

Trying an invalid update:
Rejected: 'not-an-email' is not a valid email address.
Email is still: sara.new@example.com</div>

<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ آخر سطر: "Email is still: sara.new@example.com" — القيمة الفاسدة اترفضت بالكامل ومحاولش حتى نص تحديث. لو كانت <code>email</code> <code>public</code>، ده كان مستحيل تضمنه؛ أي حد ممكن يكتب فوقها مباشرة.</div>
    <div class="en">🇬🇧 Notice the last line: "Email is still: sara.new@example.com" — the bad value was rejected entirely, not even partially applied. If <code>email</code> were <code>public</code>, this guarantee would be impossible; anyone could overwrite it directly.</div>
</div>

<div class="mini-editor-wrap">
    <textarea spellcheck="false">&lt;?php
class User
{
    public string $name;
    private string $email;

    public function __construct(string $name, string $email)
    {
        $this-&gt;name = $name;
        $this-&gt;setEmail($email);
    }

    public function getEmail(): string
    {
        return $this-&gt;email;
    }

    public function setEmail(string $email): void
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException("'$email' is not a valid email address.");
        }
        $this-&gt;email = $email;
    }
}

$user = new User("Omar", "omar@example.com");

try {
    $user-&gt;setEmail("omar[at]example.com");
} catch (InvalidArgumentException $e) {
    echo "Rejected: " . $e-&gt;getMessage() . PHP_EOL;
}
echo "Still valid: " . $user-&gt;getEmail() . PHP_EOL;</textarea>
    <div class="mini-toolbar">
        <button class="mini-run-btn">▶ شغّل / Run</button>
        <span class="mini-status"></span>
    </div>
    <div class="output-box">— لسه متشغلش / not run yet —</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="private">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">ليه خلّينا <code>$email</code> <code>private</code> بدل <code>public</code>؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Why did we make <code>$email</code> <code>private</code> instead of <code>public</code>?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="speed"> عشان الكود يشتغل أسرع</label>
        <label><input type="radio" name="q1" value="private"> عشان نجبر أي تعديل يمر على setEmail() ويتحقق منه الأول</label>
        <label><input type="radio" name="q1" value="required"> PHP بتفرض إن الإيميل private إجباري</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="rejected">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">لما ناديت <code>$user->setEmail("not-an-email")</code>، إيه اللي حصل فعليًا؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">When <code>$user->setEmail("not-an-email")</code> was called, what actually happened?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="accepted"> القيمة اتقبلت زي ما هي</label>
        <label><input type="radio" name="q2" value="rejected"> اترمى InvalidArgumentException والقيمة القديمة فضلت زي ما هي</label>
        <label><input type="radio" name="q2" value="crash"> السكريبت وقع بـ Fatal Error</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="protected">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">أنهي مستوى وصول بيسمح للكلاس نفسه وللكلاسات اللي بترثه بس، مش لأي كود خارجي؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Which visibility level allows only the class itself and its subclasses, not outside code?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="public"> public</label>
        <label><input type="radio" name="q3" value="protected"> protected</label>
        <label><input type="radio" name="q3" value="private"> private</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="stdclass">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">في مثال الـ <code>stdClass</code> فوق، ليه القيمة الفاسدة اتقبلت من غير أي خطأ؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">In the <code>stdClass</code> example above, why was the bad value accepted with no error?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="stdclass"> لإن Property عامة (public) بلا أي تحقق — أي حد يكتب فيها أي قيمة</label>
        <label><input type="radio" name="q4" value="bug"> بسبب Bug في PHP</label>
        <label><input type="radio" name="q4" value="typeerror"> المفروض PHP ترمي TypeError هنا</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ حماية السعر / Protecting a Price</h3>
    <div class="ar">🇪🇬 في <a href="../playground/index.php">محرر الكود</a>: اعمل كلاس <code>Product</code> بـ <code>private float $price</code>، مع <code>getPrice()</code> و<code>setPrice(float $price)</code> بترفض أي قيمة سالبة أو صفر برمي <code>InvalidArgumentException</code>. جرّب تحديث السعر بقيمة سالبة واطبع رسالة الرفض.</div>
    <div class="en">🇬🇧 In the <a href="../playground/index.php">Playground</a>: build a <code>Product</code> class with a <code>private float $price</code>, plus <code>getPrice()</code> and <code>setPrice(float $price)</code> that rejects zero or negative values by throwing an <code>InvalidArgumentException</code>. Try updating the price to a negative value and print the rejection message.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 دلوقتي عندنا <code>User</code> واحد بيحمي بياناته. الدرس الجاي هياخد فكرة تانية تمامًا: إزاي كلاسات مختلفة (زي <code>EmailNotification</code> و<code>SmsNotification</code>) ترد بشكل مختلف على نفس النداء بالظبط — الوراثة وتعدد الأشكال.</div>
    <div class="en">🇬🇧 Now we have a single <code>User</code> that protects its own data. The next lesson takes a different idea entirely: how different classes (like <code>EmailNotification</code> and <code>SmsNotification</code>) respond differently to the exact same call — inheritance and polymorphism.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li><code>public</code>: وصول من أي مكان. <code>protected</code>: الكلاس وورثته بس. <code>private</code>: الكلاس نفسه بس.</li>
        <li>خلي البيانات الحساسة <code>private</code>، واعرض <code>getX()</code>/<code>setX()</code> بدل السماح بالوصول المباشر.</li>
        <li><code>setX()</code> هي المكان الوحيد المسؤول عن قبول أو رفض قيمة جديدة — تحقق مركزي بدل تحقق متفرق في كل الكود.</li>
        <li>وصول <code>public</code> غير محمي بيقبل أي قيمة بصمت، حتى لو فاسدة — <code>private</code> + validation بيمنع ده من الأساس.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="oop-classes-objects.php">← المرحلة السابقة</a>
    <a href="oop-inheritance-polymorphism.php">المرحلة الجاية / Next: Inheritance & Polymorphism →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
