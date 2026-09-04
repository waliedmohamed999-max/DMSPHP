<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'namespaces-autoloading';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'PHP متوسط — Namespaces و Autoloading';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">Stage 3 · PHP Intermediate</span>
<h1>Namespaces و Autoloading <span class="ltr">Namespaces &amp; Autoloading</span></h1>
<p class="subtitle">ليه محتاج Namespaces في مشروع فيه ملفات كتير، ومبدأ الـ Autoloading من غير Composer. <span class="ltr">Why you need namespaces once a project has many files, and the idea behind autoloading without Composer.</span></p>

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
    <div class="ar">🇪🇬 في مشروع صغير، class واحد اسمه <code>Logger</code> مفيهوش أي مشكلة. لكن في مشروع كبير فيه ملفات كتير — جزء بيسجّل خدمات، جزء تاني أدوات مساعدة — ممكن يوصل الاثنين يحتاجوا class اسمه <code>Logger</code> برضه، وده هيصطدم فورًا لو اتحطوا في نفس المساحة. <code>Namespace</code> بيحل ده بإنه يدّي كل class "عنوان" كامل يميّزه. وبعد كده، هتفهم مبدأ الـ <code>Autoloading</code>: إزاي تخلي PHP تحمّل ملف الـ class تلقائيًا أول ما تحتاجه، من غير ما تكتب <code>require</code> يدوي لكل class في المشروع.</div>
    <div class="en">🇬🇧 In a small project, one class named <code>Logger</code> causes no problem. But in a large project with many files — one part logging services, another part utility helpers — both parts might independently need a class called <code>Logger</code> too, and that collides immediately if they land in the same space. A <code>Namespace</code> solves this by giving every class a full "address" that distinguishes it. Then you'll learn the <code>Autoloading</code> concept: how to make PHP load a class's file automatically the first time it's needed, without writing a manual <code>require</code> for every class in the project.</div>
</div>

<h2 id="understand">🧠 1) نفس اسم الكلاس، Namespaces مختلفة / Same Class Name, Different Namespaces</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 المثال ده بيعرّف <code>Logger</code> مرتين — مرة جوه <code>namespace App\Services</code> ومرة جوه <code>namespace App\Utils</code> — نفس الاسم بالظبط، لكن في "عنوانين" مختلفين، فمفيش أي تصادم. بعدين، بـ <code>use App\Services\Logger as ServiceLogger</code> و<code>use App\Utils\Logger as UtilLogger</code>، بنقدر نستخدم الاتنين مع بعض في نفس السكريبت بأسماء واضحة ومميزة.</div>
    <div class="en">🇬🇧 This example defines <code>Logger</code> twice — once inside <code>namespace App\Services</code> and once inside <code>namespace App\Utils</code> — the exact same name, but at two different "addresses", so there's no collision at all. Then, with <code>use App\Services\Logger as ServiceLogger</code> and <code>use App\Utils\Logger as UtilLogger</code>, we can use both together in the same script under clear, distinct names.</div>
</div>

<pre><code>&lt;?php
namespace App\Services {
    class Logger
    {
        public function log(string $message): void
        {
            echo "[Services\Logger] $message" . PHP_EOL;
        }
    }
}

namespace App\Utils {
    class Logger
    {
        public function log(string $message): void
        {
            echo "[Utils\Logger] $message" . PHP_EOL;
        }
    }
}

namespace {
    use App\Services\Logger as ServiceLogger;
    use App\Utils\Logger as UtilLogger;

    $serviceLogger = new ServiceLogger();
    $utilLogger = new UtilLogger();

    $serviceLogger-&gt;log('User registered');
    $utilLogger-&gt;log('Cache cleared');

    echo "Service logger class: " . get_class($serviceLogger) . PHP_EOL;
    echo "Util logger class: " . get_class($utilLogger) . PHP_EOL;
}</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">[Services\Logger] User registered
[Utils\Logger] Cache cleared
Service logger class: App\Services\Logger
Util logger class: App\Utils\Logger</div>

<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ <code>get_class()</code> رجّعت الاسم الكامل بالـ Namespace (<code>App\Services\Logger</code>) — ده "العنوان" الحقيقي للـ class، والـ <code>as ServiceLogger</code> كان مجرد لقب مستعار (Alias) محلي في السكريبت ده بس عشان يسهّل الكتابة، مش اسم بديل للـ class نفسه.</div>
    <div class="en">🇬🇧 Notice <code>get_class()</code> returned the fully-qualified name with its namespace (<code>App\Services\Logger</code>) — that's the class's real "address", and <code>as ServiceLogger</code> was just a local alias in this script to make writing it easier, not a replacement name for the class itself.</div>
</div>

<div class="bi-block">
    <div class="ar">🇪🇬 في مشروع حقيقي، كل <code>namespace</code> بيتحط في ملفه الخاص (مش في نفس الملف زي المثال ده اللي دمجناهم فيه بس عشان يشتغل في سكريبت واحد قابل للتنفيذ) — عادةً بمسار مطابق للـ Namespace، زي <code>App/Services/Logger.php</code> و<code>App/Utils/Logger.php</code>.</div>
    <div class="en">🇬🇧 In a real project, each namespace normally lives in its own file (not combined in one file like this example, which merges them purely so it runs as one executable script) — typically at a path matching the namespace, like <code>App/Services/Logger.php</code> and <code>App/Utils/Logger.php</code>.</div>
</div>

<h2 id="practice">💻 2) Autoloading: تحميل الكلاس تلقائيًا / Autoloading: Loading a Class Automatically</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 من غير Autoloading، لازم تكتب <code>require 'path/to/Product.php'</code> يدوي في أول أي ملف هيستخدم <code>Product</code> — وده بيبقى مرهق ومعرّض للنسيان في مشروع فيه عشرات الـ classes. <code>spl_autoload_register()</code> بتسجّل دالة PHP بتنادها تلقائيًا أول ما تحاول تستخدم class لسه مش معروف لها، وبتديها اسم الـ class عشان تحوّله لمسار ملف وتعمله <code>require</code> بنفسها — مرة واحدة بس، وبتشتغل مع أي class جديد تضيفه بعد كده من غير أي تعديل تاني.</div>
    <div class="en">🇬🇧 Without autoloading, you'd manually write <code>require 'path/to/Product.php'</code> at the top of any file that uses <code>Product</code> — tedious and easy to forget in a project with dozens of classes. <code>spl_autoload_register()</code> registers a PHP function that gets called automatically the first time you try to use a class it doesn't yet know, handing it the class name so it can map that to a file path and <code>require</code> it itself — set up once, and it works for every new class you add afterward with no further changes.</div>
</div>

<pre><code>&lt;?php
// ملف: classes/App/Models/Product.php
namespace App\Models;

class Product
{
    public function __construct(private string $name)
    {
        echo "Product class file loaded on first use for: {$this-&gt;name}" . PHP_EOL;
    }

    public function describe(): string
    {
        return "Product: {$this-&gt;name}";
    }
}</code></pre>

<pre><code>&lt;?php
// ملف: index.php — مفيش أي require لـ Product هنا
spl_autoload_register(function (string $className): void {
    $path = __DIR__ . '/classes/' . str_replace('\\', '/', $className) . '.php';
    if (file_exists($path)) {
        echo "[Autoloader] mapping '$className' -&gt; $path" . PHP_EOL;
        require $path;
    }
});

echo "Before using the class: no require/include was written for it." . PHP_EOL;

$product = new \App\Models\Product('Wireless Mouse');
echo $product-&gt;describe() . PHP_EOL;</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">Before using the class: no require/include was written for it.
[Autoloader] mapping 'App\Models\Product' -> E:\xampp\htdocs\PHP LEARN\php-backend\sandbox/classes/App/Models/Product.php
Product class file loaded on first use for: Wireless Mouse
Product: Wireless Mouse</div>

<div class="bi-block">
    <div class="ar">🇪🇬 السطر التاني في الناتج هو الدليل: <code>[Autoloader] mapping ...</code> اتطبع من <b>جوه</b> دالة الـ Autoloader، مش من الكود الرئيسي — يعني هي فعلًا اللي اتنفّذت أوتوماتيك أول ما PHP قابلت <code>new \App\Models\Product(...)</code> ومالقتش الـ class معرّفة بالفعل. لاحظ كمان إن اسم الـ Namespace الكامل (<code>App\Models\Product</code>) اتحوّل مباشرة لمسار مجلدات (<code>App/Models/Product.php</code>) — ده الاتفاق (Convention) اللي بيستخدمه Composer نفسه (اسمه PSR-4)، وإنت دلوقتي بنيت نسخة مبسّطة منه بإيدك.</div>
    <div class="en">🇬🇧 The second output line is the proof: <code>[Autoloader] mapping ...</code> was printed from <b>inside</b> the autoloader function, not from the main code — meaning it really did run automatically the moment PHP encountered <code>new \App\Models\Product(...)</code> and found the class wasn't defined yet. Also notice the full namespace (<code>App\Models\Product</code>) was mapped directly to a folder path (<code>App/Models/Product.php</code>) — that's the same convention (called PSR-4) that Composer itself uses under the hood, and you just built a simplified version of it by hand.</div>
</div>

<div class="bi-block">
    <div class="ar">🇪🇬 جرّب الفكرة بنفسك في المحرر تحت — هنا الـ class اتعرّفت جوه نفس السكريبت (المحرر المصغّر مش بيدعم ملفات متعددة)، لكن دالة الـ Autoloader لسه بتتسجل وبتتنادى بنفس الطريقة، وهتشوف رسالة الـ mapping بتتطبع قبل استخدام الـ class فعليًا.</div>
    <div class="en">🇬🇧 Try the idea yourself in the editor below — here the class is defined inside the same script (the mini editor doesn't support multiple files), but the autoloader function is still registered and invoked the same way, and you'll see the mapping message print before the class is actually used.</div>
</div>

<div class="mini-editor-wrap">
    <textarea spellcheck="false">&lt;?php
namespace App\Models {
    class Order
    {
        public function __construct(private int $id)
        {
            echo "Order #{$this->id} constructed (imagine this came from an autoloaded file)." . PHP_EOL;
        }
    }
}

namespace {
    spl_autoload_register(function (string $className) {
        // في مشروع حقيقي: هنا كنا هنحوّل $className لمسار ملف ونعمله require
        echo "[Autoloader] PHP asked for class: $className" . PHP_EOL;
    });

    // بما إن Order معرّفة بالفعل فوق، الـ Autoloader مش هينادى ليها،
    // لكن جرّب تستخدم class مش معرّفة زي \App\Models\Invoice وشوف الـ Autoloader بينادى إمتى بالظبط
    $order = new \App\Models\Order(101);

    try {
        new \App\Models\Invoice(1);
    } catch (\Error $e) {
        echo "Expected error (no real file mapped): " . $e->getMessage() . PHP_EOL;
    }
}
</textarea>
    <div class="mini-toolbar">
        <button class="mini-run-btn">▶ شغّل / Run</button>
        <span class="mini-status"></span>
    </div>
    <div class="output-box">— لسه متشغلش / not run yet —</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="address">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">إزاي فيه class اسمه <code>Logger</code> في <code>App\Services</code> و<code>Logger</code> تاني بنفس الاسم في <code>App\Utils</code> من غير ما يصطدموا؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">How can a <code>Logger</code> class in <code>App\Services</code> and another <code>Logger</code> with the same name in <code>App\Utils</code> coexist without colliding?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="address"> كل واحد ليه "عنوان" مختلف كامل هو الـ Namespace + اسم الكلاس</label>
        <label><input type="radio" name="q1" value="random"> PHP بتختار واحد عشوائيًا وقت التشغيل</label>
        <label><input type="radio" name="q1" value="impossible"> ده مش ممكن أصلًا، لازم تغيّر أحد الاسمين</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="alias">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">في <code>use App\Services\Logger as ServiceLogger</code>، إيه هو <code>ServiceLogger</code>؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">In <code>use App\Services\Logger as ServiceLogger</code>, what is <code>ServiceLogger</code>?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="alias"> لقب محلي (Alias) في السكريبت ده بس، مش اسم بديل حقيقي للـ class</label>
        <label><input type="radio" name="q2" value="newclass"> class جديد كليًا مختلف عن الأصلي</label>
        <label><input type="radio" name="q2" value="namespace"> Namespace جديد</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="ondemand">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">دالة <code>spl_autoload_register()</code> بتتنادى إمتى بالظبط؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Exactly when does the function registered with <code>spl_autoload_register()</code> get called?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="start"> أول ما الاسكريبت يبدأ، على كل الملفات مرة واحدة</label>
        <label><input type="radio" name="q3" value="ondemand"> أول مرة PHP تحتاج class معيّن ومتلاقيهوش متعرّف بالفعل</label>
        <label><input type="radio" name="q3" value="end"> بعد ما الاسكريبت يخلّص تنفيذه</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="convention">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">في مثال الـ Autoloader، إزاي الدالة عرفت مسار الملف من اسم الـ class <code>App\Models\Product</code>؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">In the autoloader example, how did the function figure out the file path from the class name <code>App\Models\Product</code>?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="convention"> باتفاق (Convention): استبدال \ بـ / وإضافة .php، فيتطابق مع بنية المجلدات</label>
        <label><input type="radio" name="q4" value="database"> بالبحث في قاعدة بيانات لكل الكلاسات</label>
        <label><input type="radio" name="q4" value="random"> PHP بتحزره تلقائيًا من غير أي منطق مكتوب</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ Autoloader صغير من الصفر / A Tiny Autoloader from Scratch</h3>
    <div class="ar">🇪🇬 في <a href="../playground/index.php">محرر الكود</a>: عرّف نيمسبيس <code>namespace App\Repositories</code> فيه class اسمه <code>UserRepository</code> بدالة <code>find(int $id): ?array</code>، ونيمسبيس تاني <code>namespace App\Repositories</code> برضه فيه class تاني اسمه <code>OrderRepository</code> بنفس الفكرة (استخدم بلوكات namespace منفصلة زي مثال Logger). بعدين اكتب <code>spl_autoload_register()</code> بيطبع اسم أي class بيتحاول PHP توصله ومتلاقيهوش (استخدم class غير معرّف عن قصد للتجربة) عشان تتأكد إن الدالة فعلًا بتتنادى.</div>
    <div class="en">🇬🇧 In the <a href="../playground/index.php">Playground</a>: define a namespace <code>App\Repositories</code> with a <code>UserRepository</code> class exposing <code>find(int $id): ?array</code>, and inside another block, an <code>OrderRepository</code> class with the same idea (use separate namespace blocks like the Logger example). Then write an <code>spl_autoload_register()</code> callback that prints the name of any class PHP tries to reach and can't find (deliberately reference an undefined class to test it) to confirm the function is really being invoked.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 المرحلة دي (PHP متوسط) خلصت — عندك دلوقتي دوال مصفوفات ونصوص متقدمة، Closures وCallbacks، Type Declarations دقيقة، استثناءات مخصصة، وNamespaces مع Autoloading. الخطوة الجاية هي مرحلة "الويب و HTTP" (Forms, Sessions, Cookies) اللي بتاخدك من دوال PHP المجردة لبناء فورمات حقيقية وإدارة حالة المستخدم عبر الطلبات — فريق تاني شغّال عليها بالتوازي دلوقتي.</div>
    <div class="en">🇬🇧 This stage (PHP Intermediate) is done — you now have advanced array/string functions, closures and callbacks, precise type declarations, custom exceptions, and namespaces with autoloading. The next step is the "Web & HTTP" stage (Forms, Sessions, Cookies), taking you from abstract PHP functions to building real forms and managing user state across requests — another effort is building that stage in parallel right now.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li><code>Namespace</code> بيدّي كل class "عنوان" كامل (زي <code>App\Services\Logger</code>) فمفيش تصادم بين أسماء متكررة في مشروع كبير.</li>
        <li><code>use ... as ...</code> بتعمل لقب محلي (Alias) لتسهيل الاستخدام، مش تغيير حقيقي في اسم الـ class.</li>
        <li><code>spl_autoload_register()</code> بتسجل دالة PHP بتنادها تلقائيًا أول ما تحتاج class مش معروف، عشان تحوّل اسمه لمسار ملف وتعمله require.</li>
        <li>الاتفاق الشائع (PSR-4): اسم الـ Namespace الكامل بيتطابق مباشرة مع بنية مجلدات الملفات.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="custom-exceptions.php">← الدرس السابق / Previous: Custom Exceptions</a>
    <a href="../index.php">لوحة التحكم / Dashboard →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
