<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'custom-exceptions';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'PHP متوسط — استثناءات مخصصة';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">Stage 3 · PHP Intermediate</span>
<h1>استثناءات مخصصة <span class="ltr">Custom Exceptions</span></h1>
<p class="subtitle">تبني هيكل Exceptions خاص بمشروعك بدل الاعتماد على رسائل عامة. <span class="ltr">Building your own exception hierarchy instead of relying on generic messages.</span></p>

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
    <div class="ar">🇪🇬 <code>Exception</code> العامة بتقولك بس "حصل خطأ ورسالته كذا" — لو عندك أكتر من سبب فشل ممكن يحصل (بيانات غلط، رصيد مش كافي، ...)، كود الاستدعاء مضطر "يقرأ" رسالة الخطأ كنص عشان يعرف يتصرف إزاي، وده هش وعرضة للأخطاء. هتتعلم دلوقتي تبني <code>class</code> مخصص لكل نوع فشل — بيرث من <code>Exception</code> — بحيث كود الاستدعاء يقدر يمسك كل نوع لوحده بـ <code>catch</code> مختلف، وحتى يضيف بيانات إضافية للاستثناء نفسه.</div>
    <div class="en">🇬🇧 A generic <code>Exception</code> only tells you "something failed, and here's a message" — if you have several distinct failure reasons (invalid data, insufficient funds, ...), calling code is forced to "read" the error message as text to decide how to react, which is fragile and error-prone. You'll now build a dedicated <code>class</code> for each failure type — extending <code>Exception</code> — so calling code can catch each one separately with its own <code>catch</code> block, and even attach extra data to the exception itself.</div>
</div>

<h2 id="understand">🧠 1) بناء هيكل الاستثناءات / Building the Exception Hierarchy</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <code>ValidationException</code> بتحمل معاها اسم الحقل اللي فشل (<code>$field</code>) عشان الكود اللي بيمسكها يعرف مين المسؤول عن الخطأ بالظبط. <code>InsufficientFundsException</code> بتحمل معاها <code>$shortfallAmount</code> — مش بس "الرصيد مش كافي"، لكن "ناقص كام بالظبط" — قيمة تقدر تستخدمها مباشرة في رسالة للمستخدم أو منطق تاني، من غير ما "تحلل" نص الرسالة.</div>
    <div class="en">🇬🇧 <code>ValidationException</code> carries the name of the field that failed (<code>$field</code>), so the code catching it knows exactly what caused the error. <code>InsufficientFundsException</code> carries a <code>$shortfallAmount</code> — not just "insufficient funds", but "short by exactly this much" — a value you can use directly in a user message or other logic, without ever parsing the error string.</div>
</div>

<pre><code>&lt;?php
class ValidationException extends Exception
{
    public function __construct(private string $field, string $message)
    {
        parent::__construct($message);
    }

    public function getField(): string
    {
        return $this->field;
    }
}

class InsufficientFundsException extends Exception
{
    public function __construct(private float $shortfallAmount, string $message)
    {
        parent::__construct($message);
    }

    public function getShortfallAmount(): float
    {
        return $this->shortfallAmount;
    }
}</code></pre>

<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ استدعاء <code>parent::__construct($message)</code> — ده بيبعت الرسالة لمُنشئ <code>Exception</code> الأصلي، عشان <code>getMessage()</code> العادية تفضل شغالة زي ما هي. الخاصية الإضافية (<code>$field</code> أو <code>$shortfallAmount</code>) دي إضافة خاصة بيك فوق سلوك <code>Exception</code> العادي، مش بديل عنه.</div>
    <div class="en">🇬🇧 Notice the call to <code>parent::__construct($message)</code> — it forwards the message to the original <code>Exception</code> constructor, so the normal <code>getMessage()</code> keeps working as expected. The extra property (<code>$field</code> or <code>$shortfallAmount</code>) is your own addition on top of standard <code>Exception</code> behavior, not a replacement for it.</div>
</div>

<h2 id="practice">💻 2) رمي ومسك أنواع مختلفة / Throwing and Catching Different Types</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 لما عندك أكتر من <code>catch</code> لأنواع مختلفة، PHP بتفحصهم بالترتيب من فوق لتحت وتنفّذ أول واحد يطابق نوع الاستثناء المرمي. لازم الأنواع الأكثر تحديدًا (<code>ValidationException</code>) تيجي قبل الأنواع الأعم (<code>Exception</code>) — لو عكست الترتيب، الـ <code>catch (Exception $e)</code> العام هيمسك كل حاجة وهيبقى مفيش فرصة للأنواع المخصصة إنها توصل أصلًا.</div>
    <div class="en">🇬🇧 With multiple <code>catch</code> blocks for different types, PHP checks them top to bottom and runs the first one matching the thrown exception's type. More specific types (<code>ValidationException</code>) must come before more general ones (<code>Exception</code>) — reverse the order and the generic <code>catch (Exception $e)</code> would catch everything, leaving the specific types no chance to ever be reached.</div>
</div>

<pre><code>&lt;?php
function validateAge(int $age): void
{
    if ($age &lt; 18) {
        throw new ValidationException('age', "Age $age is below the minimum of 18");
    }
}

function withdraw(float $balance, float $amount): float
{
    if ($amount &gt; $balance) {
        $shortfall = $amount - $balance;
        throw new InsufficientFundsException($shortfall, "Cannot withdraw $amount, balance is only $balance");
    }
    return $balance - $amount;
}

function processRequest(string $type): void
{
    try {
        if ($type === 'age') {
            validateAge(15);
        } elseif ($type === 'withdraw') {
            withdraw(100.0, 250.0);
        }
    } catch (ValidationException $e) {
        echo "[Validation error on field '{$e-&gt;getField()}']: " . $e-&gt;getMessage() . PHP_EOL;
    } catch (InsufficientFundsException $e) {
        echo "[Insufficient funds, short by \${$e-&gt;getShortfallAmount()}]: " . $e-&gt;getMessage() . PHP_EOL;
    } catch (Exception $e) {
        echo "[Generic error]: " . $e-&gt;getMessage() . PHP_EOL;
    }
}

processRequest('age');
processRequest('withdraw');

echo PHP_EOL . "-- calling withdraw() directly, uncaught type shows in catch(Exception) --" . PHP_EOL;
try {
    withdraw(50.0, 80.0);
} catch (Exception $e) {
    echo "Caught as generic Exception too, class is: " . get_class($e) . PHP_EOL;
}</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">[Validation error on field 'age']: Age 15 is below the minimum of 18
[Insufficient funds, short by $150]: Cannot withdraw 250, balance is only 100

-- calling withdraw() directly, uncaught type shows in catch(Exception) --
Caught as generic Exception too, class is: InsufficientFundsException</div>

<div class="bi-block">
    <div class="ar">🇪🇬 الجزء الأخير مهم: حتى لما مسكنا <code>InsufficientFundsException</code> بـ <code>catch (Exception $e)</code> العام (لإن كل استثناء مخصص وارث من <code>Exception</code> في النهاية)، لسه قادرين نعرف نوعها الحقيقي بـ <code>get_class($e)</code>. الفرق العملي: لو كتبت <code>catch (InsufficientFundsException $e)</code> بذاتها، تقدر تنادي <code>$e-&gt;getShortfallAmount()</code> مباشرة — حاجة مش موجودة أصلًا في <code>Exception</code> العامة.</div>
    <div class="en">🇬🇧 The last part matters: even though we caught <code>InsufficientFundsException</code> with a generic <code>catch (Exception $e)</code> (since every custom exception ultimately extends <code>Exception</code>), we can still discover its real type via <code>get_class($e)</code>. The practical difference: catching <code>InsufficientFundsException</code> specifically lets you call <code>$e->getShortfallAmount()</code> directly — something that doesn't exist at all on a plain <code>Exception</code>.</div>
</div>

<div class="bi-block">
    <div class="ar">🇪🇬 جرّب الكود ده بنفسك في المحرر تحت — غيّر العمر أو مبلغ السحب وشوف أنهي استثناء بيتمسك.</div>
    <div class="en">🇬🇧 Try this code yourself in the editor below — change the age or the withdrawal amount and see which exception gets caught.</div>
</div>

<div class="mini-editor-wrap">
    <textarea spellcheck="false">&lt;?php
class ValidationException extends Exception
{
    public function __construct(private string $field, string $message)
    {
        parent::__construct($message);
    }
    public function getField(): string { return $this->field; }
}

class InsufficientFundsException extends Exception
{
    public function __construct(private float $shortfallAmount, string $message)
    {
        parent::__construct($message);
    }
    public function getShortfallAmount(): float { return $this->shortfallAmount; }
}

function withdraw(float $balance, float $amount): float
{
    if ($amount &gt; $balance) {
        throw new InsufficientFundsException($amount - $balance, "Cannot withdraw $amount, balance is only $balance");
    }
    return $balance - $amount;
}

try {
    // جرّب تغيّر الأرقام دي
    $newBalance = withdraw(100.0, 130.0);
    echo "New balance: $newBalance" . PHP_EOL;
} catch (InsufficientFundsException $e) {
    echo "Short by: \${$e->getShortfallAmount()}" . PHP_EOL;
    echo "Message: " . $e->getMessage() . PHP_EOL;
}
</textarea>
    <div class="mini-toolbar">
        <button class="mini-run-btn">▶ شغّل / Run</button>
        <span class="mini-status"></span>
    </div>
    <div class="output-box">— لسه متشغلش / not run yet —</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="specific">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">ليه نبني <code>ValidationException</code> و<code>InsufficientFundsException</code> بدل ما نرمي <code>Exception</code> عامة دايمًا؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Why build <code>ValidationException</code> and <code>InsufficientFundsException</code> instead of always throwing a generic <code>Exception</code>?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="specific"> عشان كود الاستدعاء يقدر يفرّق ويتصرف بشكل مختلف مع كل نوع فشل بـ catch منفصل</label>
        <label><input type="radio" name="q1" value="fast"> عشان الكود يشتغل أسرع</label>
        <label><input type="radio" name="q1" value="required"> PHP بترفض رمي Exception عامة أصلًا</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="150">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">في المثال، لما <code>withdraw(100.0, 250.0)</code> فشلت، قيمة <code>$shortfallAmount</code> اللي طبعناها كانت كام؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">In the example, when <code>withdraw(100.0, 250.0)</code> failed, what was the printed <code>$shortfallAmount</code>?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="250"> 250</label>
        <label><input type="radio" name="q2" value="150"> 150</label>
        <label><input type="radio" name="q2" value="100"> 100</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="specific_first">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">لو عندك <code>catch (Exception $e)</code> قبل <code>catch (ValidationException $e)</code> في نفس الـ try، إيه اللي هيحصل؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">If <code>catch (Exception $e)</code> comes before <code>catch (ValidationException $e)</code> in the same try, what happens?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="specific_first"> الـ catch العام هيمسك كل حاجة، والـ catch الخاص لن يوصله شيء أبدًا (Unreachable)</label>
        <label><input type="radio" name="q3" value="both"> الاتنين هيتنفذوا مع بعض</label>
        <label><input type="radio" name="q3" value="error"> PHP هترمي خطأ Syntax مباشرة</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="parent">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">لما بنكتب Constructor مخصص جوه class وارث من Exception، إيه اللي بيضمن إن <code>getMessage()</code> لسه شغالة؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">When writing a custom constructor inside a class extending Exception, what guarantees <code>getMessage()</code> still works?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="parent"> استدعاء <code>parent::__construct($message)</code> جوه الـ Constructor</label>
        <label><input type="radio" name="q4" value="auto"> بتشتغل أوتوماتيك من غير أي استدعاء</label>
        <label><input type="radio" name="q4" value="override"> لازم نكتب getMessage() بأنفسنا من الصفر</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ نظام تسجيل بأخطاء واضحة / A Registration System with Clear Errors</h3>
    <div class="ar">🇪🇬 في <a href="../playground/index.php">محرر الكود</a>: اعمل <code>class DuplicateEmailException extends Exception</code> بخاصية <code>$email</code> و<code>class WeakPasswordException extends Exception</code> بخاصية <code>$reasons</code> (array). اكتب دالة <code>registerUser(string $email, string $password): void</code> تفحص لو الإيميل موجود بالفعل في مصفوفة ثابتة (ارمي <code>DuplicateEmailException</code>)، ولو الباسورد أقل من 8 حروف (ارمي <code>WeakPasswordException</code>). نادِ الدالة بمدخلات مختلفة جوه <code>try/catch</code> بـ catch منفصل لكل نوع وتأكد إن كل رسالة بتظهر صح.</div>
    <div class="en">🇬🇧 In the <a href="../playground/index.php">Playground</a>: create <code>class DuplicateEmailException extends Exception</code> with an <code>$email</code> property, and <code>class WeakPasswordException extends Exception</code> with a <code>$reasons</code> (array) property. Write <code>registerUser(string $email, string $password): void</code> that throws <code>DuplicateEmailException</code> if the email already exists in a fixed array, and <code>WeakPasswordException</code> if the password is under 8 characters. Call it with different inputs inside a <code>try/catch</code> with a separate catch per type, and confirm each message prints correctly.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 كل الاستثناءات اللي بنيتها هنا عاشت في نفس الملف — بس في مشروع حقيقي فيه عشرات الـ classes، ممكن يبقى عندك أكتر من <code>class</code> بنفس الاسم في أجزاء مختلفة من المشروع (زي أكتر من <code>Logger</code>). الدرس الجاي هيوريك إزاي <code>Namespaces</code> بتحل المشكلة دي، وإزاي تحمّل كل class تلقائيًا بـ Autoloading من غير <code>require</code> يدوي لكل ملف.</div>
    <div class="en">🇬🇧 Every exception you built here lived in the same file — but in a real project with dozens of classes, you can end up with more than one <code>class</code> sharing a name in different parts of the project (like more than one <code>Logger</code>). The next lesson shows how <code>Namespaces</code> solve that, and how to load every class automatically via autoloading, without a manual <code>require</code> for each file.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>Class مخصص وارث من <code>Exception</code> بيقدر يحمل بيانات إضافية (زي <code>$field</code> أو <code>$shortfallAmount</code>) مش موجودة في الاستثناء العام.</li>
        <li><code>parent::__construct($message)</code> لازم تتنادى جوه Constructor مخصص عشان <code>getMessage()</code> تفضل شغالة.</li>
        <li>ترتيب الـ <code>catch</code> مهم: الأنواع المحددة الأول، بعدين الأعم — عكس كده بيخلّي الأنواع المحددة Unreachable.</li>
        <li>كود الاستدعاء اللي بيفرّق بين أنواع الأخطاء بـ <code>catch</code> منفصل بيقدر يتصرف بذكاء (رسالة مخصصة، إعادة محاولة، ...) بدل ما "يخمّن" من نص الرسالة.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="type-declarations.php">← الدرس السابق / Previous: Type Declarations</a>
    <a href="namespaces-autoloading.php">الدرس الجاي / Next: Namespaces &amp; Autoloading →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
