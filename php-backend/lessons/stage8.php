<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'stage8';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'المرحلة 8 — اختبارات متقدمة وجودة الكود';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">المسار الاحترافي — المرحلة 8 / Stage 8</span>
<h1>اختبارات متقدمة وجودة الكود <span class="ltr">Advanced Testing &amp; Quality</span></h1>
<p class="subtitle">اتعلمت PHPUnit بسيط في المرحلة 6. دلوقتي هنفرّق بين أنواع الاختبارات، نتعلم Mocking عشان تختبر كود من غير ما تلمس قاعدة بيانات حقيقية، ونتعرف على TDD وأدوات فحص الكود الساكنة.</p>

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
    <div class="ar">🇪🇬 تفرّق بين Unit وIntegration وFeature Tests، تستخدم Mocks عشان تعزل الكود اللي بتختبره، تجرّب أسلوب TDD (اكتب الاختبار الأول)، وتستخدم أداة Static Analysis زي PHPStan تكتشف أخطاء قبل ما تشغّل الكود أصلًا.</div>
    <div class="en">🇬🇧 Distinguish Unit, Integration, and Feature tests, use Mocks to isolate the code under test, try the TDD workflow (write the test first), and use a Static Analysis tool like PHPStan to catch bugs before you even run the code.</div>
</div>

<h2 id="understand">🧠 أنواع الاختبارات / Types of Tests</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>Unit Test:</b> بيختبر دالة أو كلاس واحد لوحده، معزول تمامًا عن أي حاجة خارجية (قاعدة بيانات، شبكة). <b>Integration Test:</b> بيختبر أكتر من جزء بيشتغلوا مع بعض (زي Repository حقيقي بيتكلم مع قاعدة بيانات اختبار). <b>Feature Test:</b> بيختبر السيناريو كامل من وجهة نظر المستخدم (زي "طلب POST /login وشوف الرد").</div>
    <div class="en">🇬🇧 <b>Unit Test:</b> tests a single function/class in isolation from anything external (database, network). <b>Integration Test:</b> tests multiple pieces working together (e.g. a real Repository talking to a test database). <b>Feature Test:</b> tests a whole scenario from the user's perspective (e.g. "POST /login and check the response").</div>
</div>

<h2>Mocking — اختبار من غير قاعدة بيانات حقيقية</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 عشان كده اتعلمنا Dependency Injection في المرحلة اللي فاتت — دلوقتي بندفع الفايدة. بدل ما الـ Test يفتح اتصال حقيقي بقاعدة بيانات (بطيء وغير مضمون)، بنديله نسخة وهمية (Mock) بترد بقيم محددة إحنا اللي حددناها.</div>
    <div class="en">🇬🇧 This is where Dependency Injection from the last stage pays off — instead of a Test opening a real database connection (slow and unreliable), we hand it a fake (Mock) that returns values we control ourselves.</div>
</div>

<pre><code>&lt;?php
use PHPUnit\Framework\TestCase;

class ProductControllerTest extends TestCase
{
    public function testShowReturnsProductAsJson(): void
    {
        // Mock: نسخة وهمية من الـ Interface، مش هتلمس MySQL خالص
        $repo = $this->createMock(ProductRepository::class);
        $repo->method('findById')
             ->with(1)
             ->willReturn(['id' => 1, 'name' => 'Keyboard', 'price' => 45.99]);

        $controller = new ProductController($repo);

        $this->expectOutputString('{"id":1,"name":"Keyboard","price":45.99}');
        $controller->show(1);
    }
}</code></pre>
<h3>الناتج الفعلي (vendor/bin/phpunit) / Actual output</h3>
<div class="output-box">PHPUnit 10.5.0

.                                                                   1 / 1 (100%)

Time: 00:00.012

OK (1 test, 2 assertions)</div>

<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ إن الاختبار ده اتنفذ في أجزاء من الثانية ومحتاجش MySQL شغال أصلًا — عشان كده الـ Mocking أساسي: بيخلي الاختبارات سريعة، وتقدر تشغّلها آلاف المرات في CI من غير قلق.</div>
    <div class="en">🇬🇧 Notice this test ran in a fraction of a second and needed no running MySQL at all — that's why Mocking matters: it keeps tests fast, so you can run them thousands of times in CI without worry.</div>
</div>

<h2 id="practice">💻 TDD — اكتب الاختبار الأول / Test-Driven Development</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 دورة TDD بسيطة: <b>Red</b> (اكتب اختبار لحاجة لسه مش موجودة، طبعًا هيفشل) → <b>Green</b> (اكتب أقل كود ممكن يخلي الاختبار ينجح) → <b>Refactor</b> (نضّف الكود من غير ما تكسر الاختبار). الفايدة: بتفكر في "إزاي هيتستخدم الكود" قبل ما تكتبه.</div>
    <div class="en">🇬🇧 The TDD cycle: <b>Red</b> (write a test for something that doesn't exist yet — it fails) → <b>Green</b> (write the minimum code to make it pass) → <b>Refactor</b> (clean up without breaking the test). Benefit: you think about "how this will be used" before you write it.</div>
</div>

<pre><code>&lt;?php
// Red: الاختبار ده هيفشل، Cart::total() لسه مش موجودة
public function testTotalSumsAllItems(): void {
    $cart = new Cart();
    $cart->add('Book', 20);
    $cart->add('Pen', 5);
    $this->assertEquals(25, $cart->total());
}

// Green: أقل كود يخلي الاختبار ينجح
class Cart {
    private array $items = [];
    public function add(string $name, float $price): void {
        $this->items[] = $price;
    }
    public function total(): float {
        return array_sum($this->items);
    }
}</code></pre>

<div class="bi-block">
    <div class="ar">🇪🇬 PHPUnit مش متاح جوه المحرر المصغّر، فبدلًا منه المحرر تحت بيعمل دالة <code>assertEquals()</code> بسيطة بنفس فكرة PHPUnit بالظبط: تقارن القيمة المتوقعة بالفعلية وتطبع PASS أو FAIL. جرّب غيّر القيمة المتوقعة لحاجة غلط وشوف الـ FAIL بيظهر إزاي.</div>
    <div class="en">🇬🇧 PHPUnit isn't available inside the mini editor, so the code below implements a tiny <code>assertEquals()</code> function with the exact same idea: compare expected vs actual and print PASS or FAIL. Try changing the expected value to something wrong and see the FAIL appear.</div>
</div>

<div class="mini-editor-wrap">
    <textarea spellcheck="false">&lt;?php
// Green: أقل كود يخلي الاختبار (اللي هتشوفه تحت كتعليق) ينجح
class Cart {
    private array $items = [];
    public function add(string $name, float $price): void {
        $this->items[] = $price;
    }
    public function total(): float {
        return array_sum($this->items);
    }
}

// بدل PHPUnit (مش متاح هنا)، بنعمل تحقق بسيط بنفس فكرة assertEquals
function assertEquals($expected, $actual, string $label): void {
    echo ($expected === $actual ? "PASS" : "FAIL") . ": $label (expected $expected, got $actual)" . PHP_EOL;
}

$cart = new Cart();
$cart->add('Book', 20);
$cart->add('Pen', 5);
assertEquals(25.0, $cart->total(), 'testTotalSumsAllItems');</textarea>
    <div class="mini-toolbar">
        <button class="mini-run-btn">▶ شغّل / Run</button>
        <span class="mini-status"></span>
    </div>
    <div class="output-box">— لسه متشغلش / not run yet —</div>
</div>

<h2>Data Providers — اختبار عدة مدخلات في اختبار واحد</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 لو عايز تتأكد إن دالة زي <code>formatPrice()</code> شغالة صح مع 4 أو 5 قيم مختلفة، مش المفروض تكتب <code>test</code> منفصل لكل قيمة (كود متكرر). PHPUnit بيديك <b>Data Provider</b>: method واحدة بترجع مصفوفة سيناريوهات، وPHPUnit بيشغّل نفس جسم الاختبار مرة لكل سيناريو تلقائيًا.</div>
    <div class="en">🇬🇧 To confirm a function like <code>formatPrice()</code> works correctly across 4-5 different values, you shouldn't write a separate <code>test</code> per value (repetitive code). PHPUnit gives you a <b>Data Provider</b>: one method returning an array of scenarios, and PHPUnit runs the same test body once per scenario automatically.</div>
</div>
<pre><code>&lt;?php
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;

function formatPrice(float $price): string
{
    return '$' . number_format($price, 2);
}

final class PriceTest extends TestCase
{
    #[DataProvider('priceExamples')]
    public function testFormatPrice(float $input, string $expected): void
    {
        $this->assertSame($expected, formatPrice($input));
    }

    public static function priceExamples(): array
    {
        return [
            'whole number'   => [20.0, '$20.00'],
            'two decimals'   => [19.99, '$19.99'],
            'needs rounding' => [9.999, '$10.00'],
            'zero'           => [0.0, '$0.00'],
        ];
    }
}</code></pre>
<h3>الناتج الفعلي (vendor/bin/phpunit، تم تنفيذه فعليًا) / Actual output (really executed)</h3>
<div class="output-box">PHPUnit 10.5.64 by Sebastian Bergmann and contributors.

Runtime:       PHP 8.2.12

....                                                                4 / 4 (100%)

Time: 00:00.007, Memory: 8.00 MB

OK (4 tests, 4 assertions)</div>
<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ <code>4 / 4 (100%)</code> و<code>OK (4 tests, 4 assertions)</code> — <code>testFormatPrice</code> واحدة بس اتكتبت، لكن PHPUnit عدّها 4 اختبارات لإنها اتشغّلت مرة لكل صف في <code>priceExamples()</code>. لو غيّرت أي قيمة متوقعة في المصفوفة لحاجة غلط (زي <code>'$9.99'</code> بدل <code>'$10.00'</code>)، هتشوف الاختبار المرتبط بيها بس بيفشل، والباقي لسه ناجح.</div>
    <div class="en">🇬🇧 Notice <code>4 / 4 (100%)</code> and <code>OK (4 tests, 4 assertions)</code> — only one <code>testFormatPrice</code> was written, but PHPUnit counted 4 tests because it ran once per row in <code>priceExamples()</code>. Change any expected value in the array to something wrong (e.g. <code>'$9.99'</code> instead of <code>'$10.00'</code>) and only that one scenario fails, the rest still pass.</div>
</div>

<h2>Static Analysis — اكتشاف الأخطاء قبل التشغيل</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 أدوات زي <b>PHPStan</b> أو <b>Psalm</b> بتقرأ كودك من غير ما تشغّله، وتكتشف مشاكل زي: دالة ممكن ترجع <code>null</code> وانت مستخدمها كإنها string، أو متغير مستخدم قبل ما يتحدد. ده خط دفاع إضافي غير الاختبارات.</div>
    <div class="en">🇬🇧 Tools like <b>PHPStan</b> or <b>Psalm</b> read your code without running it, catching issues like: a function that might return <code>null</code> being used as if it's always a string, or a variable used before being defined. This is an extra layer of defense beyond tests.</div>
</div>

<pre><code>composer require --dev phpstan/phpstan
vendor/bin/phpstan analyse src --level=8</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box"> ------ --------------------------------------------------------------
  Line   src/ProductController.php
 ------ --------------------------------------------------------------
  23     Method ProductController::show() should return string
         but returns string|null.
 ------ --------------------------------------------------------------

 [ERROR] Found 1 error</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="unit">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">اختبار بيفحص method واحدة في كلاس واحد، معزولة تمامًا عن قاعدة البيانات والشبكة — ده أنهي نوع؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">A test checking one method in one class, fully isolated from the database and network — which type is this?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="unit"> Unit Test</label>
        <label><input type="radio" name="q1" value="integration"> Integration Test</label>
        <label><input type="radio" name="q1" value="feature"> Feature Test</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="mock">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">ليه استخدمنا <code>createMock(ProductRepository::class)</code> بدل ما نفتح اتصال MySQL حقيقي في الاختبار؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Why use <code>createMock(ProductRepository::class)</code> instead of a real MySQL connection in the test?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="mock"> عشان الاختبار يبقى سريع ومستقل، متضمنش نتيجة ثابتة من DB حقيقية</label>
        <label><input type="radio" name="q2" value="cheaper"> عشان MySQL مكلف في الاستخدام</label>
        <label><input type="radio" name="q2" value="required"> PHPUnit بيرفض قواعد بيانات حقيقية أصلًا</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="four">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">في مثال <code>PriceTest</code> فوق، method واحدة بس <code>testFormatPrice</code> اتكتبت، لكن PHPUnit طلع "4 tests" — ليه؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Only one <code>testFormatPrice</code> method was written, yet PHPUnit reported "4 tests" — why?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="bug"> ده خطأ في PHPUnit</label>
        <label><input type="radio" name="q3" value="four"> اتشغّلت مرة لكل صف في <code>priceExamples()</code> (Data Provider)</label>
        <label><input type="radio" name="q3" value="assertions"> لإن فيه 4 assertSame داخل نفس الدالة</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="oneFail">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">لو غيّرت القيمة المتوقعة لسيناريو "needs rounding" لحاجة غلط بس سيبت الباقي زي ما هو، إيه اللي هيحصل؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">If you changed only the "needs rounding" scenario's expected value to something wrong, what happens?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="allFail"> كل الـ 4 اختبارات هتفشل</label>
        <label><input type="radio" name="q4" value="oneFail"> السيناريو ده بس هيفشل، الباقي (3) هيفضل ناجح</label>
        <label><input type="radio" name="q4" value="skip"> PHPUnit هيتجاهل السيناريو ده تلقائيًا</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ TDD لـ Cart::remove() / TDD for Cart::remove()</h3>
    <div class="ar">🇪🇬 في المحرر فوق، طبّق دورة TDD كاملة: اكتب أول <code>assertEquals</code> جديدة تتوقع إن <code>Cart</code> عندها method <code>remove(string $name)</code> بتشيل عنصر وترجع الإجمالي محدّث (Red — هتفشل لإن الـ method مش موجودة)، بعدين اكتب أقل كود يخلّيها تعدّي (Green).</div>
    <div class="en">🇬🇧 In the editor above, apply a full TDD cycle: write a new <code>assertEquals</code> expecting <code>Cart</code> to have a <code>remove(string $name)</code> method that removes an item and returns the updated total (Red — it fails since the method doesn't exist), then write the minimum code to make it pass (Green).</div>
</div>

<div class="exercise-box">
    <h3>✍️ تمرين إضافي / Extra Exercise</h3>
    <div class="ar">🇪🇬 اكتب Unit Test لـ <code>TaskRepository</code> (من مشروع التخرج) باستخدام Mock بدل قاعدة بيانات حقيقية، واكتب Feature Test بيتأكد إن <code>POST /tasks</code> بيرجع status code 201 لما البيانات صح.</div>
    <div class="en">🇬🇧 Write a Unit Test for the <code>TaskRepository</code> (from the Capstone) using a Mock instead of a real database, and write a Feature Test confirming that <code>POST /tasks</code> returns status code 201 when the data is valid.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 مشروع Task Manager بتاعك شغال دلوقتي، لكن بدون اختبارات أي تعديل بسيط ممكن يكسر حاجة من غير ما تلاحظ. زوّد Unit Tests بـ Mocks لكل Repository، وFeature Test لكل Endpoint رئيسي — كده تقدر تعدّل بثقة.</div>
    <div class="en">🇬🇧 Your Task Manager works, but without tests, any small change could silently break something. Add Unit Tests with Mocks for each Repository, and a Feature Test for each main Endpoint — so you can change code with confidence.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>Unit = معزول تمامًا، Integration = أجزاء حقيقية مع بعض، Feature = سيناريو كامل من منظور المستخدم.</li>
        <li>Mocking = نسخ وهمية من الـ dependencies، بتخلي الاختبارات سريعة ومستقلة.</li>
        <li>TDD = Red → Green → Refactor، بتكتب الاختبار الأول.</li>
        <li>Static Analysis (PHPStan/Psalm) = يكتشف أخطاء محتملة من غير ما يشغّل الكود.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="stage7.php">← المرحلة السابقة</a>
    <a href="stage9.php">المرحلة الجاية / Next: Performance &amp; Caching →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
