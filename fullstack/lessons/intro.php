<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'intro';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'معنى Full Stack Developer';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">المرحلة 1 / Stage 1</span>
<h1>معنى Full Stack Developer <span class="ltr">What is a Full Stack Developer?</span></h1>
<p class="subtitle">قبل ما تدخل في المسار الطويل ده، لازم تفهم بالظبط إيه اللي هتبقى قادر تعمله في الآخر، وإيه اللي مطلوب منك فعليًا في سوق الشغل.</p>

<div class="step-tracker">
    <a href="#read">📖 Read</a>
    <a href="#understand">🧠 Understand</a>
    <a href="#quiz">🧠 Quiz</a>
    <a href="#challenge">🛠️ Challenge</a>
    <a href="#project">🚀 Project</a>
</div>

<h2 id="read">الهدف / Goal</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 تفهم الفرق بين Front-End وBack-End وFull Stack، وتعرف بالظبط إيه اللي هتحتاج تتعلمه في المسار ده وليه مرتب بالترتيب ده بالذات.</div>
    <div class="en">🇬🇧 Understand the difference between Front-End, Back-End, and Full Stack, and know exactly what you'll learn in this track and why it's ordered this way.</div>
</div>

<h2 id="understand">Front-End مقابل Back-End</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>Front-End Developer</b> مسؤول عن كل حاجة المستخدم بيشوفها ويتفاعل معاها في المتصفح — الشكل والتخطيط (HTML/CSS) والتفاعل (JavaScript). <b>Back-End Developer</b> مسؤول عن اللي مش ظاهر: السيرفر، قاعدة البيانات، منطق العمل (زي "هل الباسورد صح؟" أو "فيه مخزون كفاية؟").</div>
    <div class="en">🇬🇧 A <b>Front-End Developer</b> owns everything the user sees and interacts with in the browser — appearance and layout (HTML/CSS) and interactivity (JavaScript). A <b>Back-End Developer</b> owns what's invisible: the server, the database, and business logic (like "is this password correct?" or "is there enough stock?").</div>
</div>

<h2>يبقى إيه هو الـ Full Stack؟</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 الـ <b>Full Stack Developer</b> قادر يشتغل على الاتنين — يصمم الواجهة، وكمان يبني السيرفر وقاعدة البيانات اللي وراها. ده مش معناه إنك هتبقى "خبير عالمي" في كل حاجة من أول يوم — معناه إنك تقدر توصل فكرة كاملة من الصفر لمنتج شغال بمفردك، حتى لو محتاج بعد كده تخصص أكتر في جزء معين.</div>
    <div class="en">🇬🇧 A <b>Full Stack Developer</b> can work on both sides — design the interface, and also build the server and database behind it. This doesn't mean being a "world expert" at everything from day one — it means being able to take an idea from zero to a working product on your own, even if you later specialize further in one part.</div>
</div>

<h2>ليه المسار مرتب كده بالظبط؟</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 المسار هيدّيك الـ Front-End الأول (HTML → CSS → JavaScript → أطر عمل) لإنك محتاج "تشوف" نتيجة شغلك بصريًا من أول يوم وده بيحافظ على حماسك. بعد كده هتاخد الـ Back-End (PHP → MySQL) عشان تقدر تحول الصفحات الجامدة دي لتطبيق حقيقي بيحفظ بيانات ويستقبل مستخدمين. وفي الآخر، مشروعين عمليين (Contact Form وOnline Store) بيجمعوا الاتنين مع بعض.</div>
    <div class="en">🇬🇧 The track gives you Front-End first (HTML → CSS → JavaScript → frameworks) because you need to visually "see" your work from day one — that keeps you motivated. Then Back-End (PHP → MySQL) so you can turn those static pages into a real application that stores data and serves users. Finally, two practical projects (Contact Form and Online Store) tie both halves together.</div>
</div>

<h2>إيه المطلوب منك في سوق الشغل؟</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 معظم شركات الـ Full Stack مش بتنتظر منك تكون بنفس عمق متخصص Front-End بحت أو Back-End بحت في كل التفاصيل — لكن بتنتظر منك تقدر تاخد "ticket" (مهمة) وتنفذها كاملة من الواجهة لحد قاعدة البيانات من غير ما تستنى حد تاني. وده بالظبط اللي المسار ده هيأهلك ليه.</div>
    <div class="en">🇬🇧 Most Full Stack roles don't expect you to match a pure specialist's depth in every Front-End or Back-End detail — but they do expect you to take a ticket and implement it completely, from the interface down to the database, without waiting on someone else. That's exactly what this track prepares you for.</div>
</div>

<h2>يوم في حياة Full Stack Developer / A Day in the Life</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 عشان الكلام النظري فوق يتحول لصورة واقعية، تعالى نتابع تذكرة (Ticket) واحدة من الصفر للنشر، بالظبط زي ما بتحصل في أي شركة: <b>"العميل عايز يقدر يفلتر المنتجات في المتجر حسب السعر (من كذا لحد كذا)."</b></div>
    <div class="en">🇬🇧 To turn the theory above into a real picture, let's follow one Ticket from start to deployment, exactly as it happens at any company: <b>"The client wants to filter store products by price (from X to Y)."</b></div>
</div>

<div class="flow-diagram">
    <div class="flow-box">1) اقرأ التذكرة واسأل</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">2) Front-End: فورم الفلتر</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">3) Back-End: تحقق + استعلام</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">4) اختبار الحالات الشاذة</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">5) نشر وإبلاغ الفريق</div>
</div>

<div class="bi-block">
    <div class="ar">🇪🇬 <b>1) اقرأ التذكرة واسأل:</b> أول حاجة، مش هتفتح محرر الكود على طول. هتسأل: "هل الفلتر بيرجع فورًا وانت بتكتب ولا بعد ما تدوس زرار؟" و"هل ممكن المستخدم يسيب الحد الأدنى أو الأقصى فاضي؟" — الأسئلة دي بتوفر عليك ساعات إعادة كتابة بعدين.<br><b>2) Front-End:</b> بتبني فورم بسيط فيه حقلين (الحد الأدنى والأقصى) وزرار "طبّق"، وبتبعت القيم دي للسيرفر كـ Query String زي <code>?min=100&amp;max=500</code>.<br><b>3) Back-End:</b> هنا أهم خطوة أمنية — <b>مينفعش تثق في القيم الجايه من المتصفح</b> (المستخدم ممكن يعدّل الرابط يدويًا ويحط أي حاجة). لازم تتحقق إن القيم أرقام فعلًا وإن الحد الأدنى أقل من أو يساوي الأقصى، قبل ما تستخدمها في استعلام SQL.</div>
    <div class="en">🇬🇧 <b>1) Read the ticket and ask:</b> the first thing isn't opening your editor — you ask: "does the filter apply live while typing, or after clicking a button?" and "can the user leave min or max empty?" These questions save hours of rework later.<br><b>2) Front-End:</b> you build a simple form with two fields (min and max) and an "Apply" button, sending those values to the server as a query string like <code>?min=100&amp;max=500</code>.<br><b>3) Back-End:</b> the most important security step — <b>never trust values coming from the browser</b> (a user can edit the URL by hand and put anything there). You must verify the values are actually numbers and that min is less than or equal to max, before using them in an SQL query.</div>
</div>

<pre><code>&lt;?php
// جزء الـ Back-End من التذكرة — يتحقق من المدخلات قبل أي استعلام SQL
function validatePriceFilter(?string $min, ?string $max): array {
    $errors = [];
    $minVal = is_numeric($min) ? (float) $min : null;
    $maxVal = is_numeric($max) ? (float) $max : null;

    if ($min !== null && $min !== '' && $minVal === null) {
        $errors[] = 'الحد الأدنى لازم يكون رقم.';
    }
    if ($max !== null && $max !== '' && $maxVal === null) {
        $errors[] = 'الحد الأقصى لازم يكون رقم.';
    }
    if ($minVal !== null && $maxVal !== null && $minVal > $maxVal) {
        $errors[] = 'الحد الأدنى لازم يكون أقل من أو يساوي الحد الأقصى.';
    }

    return $errors;
}

// حالة 1: المستخدم كتب min أكبر من max غلط
print_r(validatePriceFilter('500', '100'));

// حالة 2: حد بيلعب بالـ URL يدويًا وحط نص مش رقم
print_r(validatePriceFilter('abc', '100'));

// حالة 3: مدخلات صحيحة
var_dump(empty(validatePriceFilter('100', '500')));</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">Array
(
    [0] =&gt; الحد الأدنى لازم يكون أقل من أو يساوي الحد الأقصى.
)
Array
(
    [0] =&gt; الحد الأدنى لازم يكون رقم.
)
bool(true)</div>

<div class="bi-block">
    <div class="ar">🇪🇬 <b>4) اختبار الحالات الشاذة:</b> إيه لو الاتنين فاضيين؟ إيه لو المستخدم غيّر الرابط يدويًا؟ الكود فوق بيغطي بالظبط الحالات دي.<br><b>5) النشر والإبلاغ:</b> بعد ما تتأكد كل الحالات شغالة، بترفع الكود، وتقفل التذكرة، وتقول للفريق "خلصانة" — بالظبط زي ما هتعمل في مشروع Online Store في آخر المسار ده.</div>
    <div class="en">🇬🇧 <b>4) Testing edge cases:</b> what if both are empty? What if the user edits the URL by hand? The code above covers exactly these cases.<br><b>5) Deploy &amp; report:</b> once every case works, you push the code, close the ticket, and tell the team "done" — exactly what you'll do on the Online Store project at the end of this track.</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="backend">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">مين المسؤول عن التحقق من إن الباسورد صح والتأكد إن فيه مخزون كفاية؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Who is responsible for verifying a password is correct and checking there's enough stock?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="frontend"> Front-End</label>
        <label><input type="radio" name="q1" value="backend"> Back-End</label>
        <label><input type="radio" name="q1" value="browser"> المتصفح نفسه فقط</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="both">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">الـ Full Stack Developer معناه إيه بالظبط؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What does "Full Stack Developer" actually mean?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="frontend-only"> متخصص Front-End بس بعمق أكبر</label>
        <label><input type="radio" name="q2" value="both"> يقدر يبني الواجهة والسيرفر وقاعدة البيانات مع بعض</label>
        <label><input type="radio" name="q2" value="none"> مش بيكتب كود أصلًا، بيدير الفريق بس</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="reject">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">في تذكرة فلترة الأسعار، لو مستخدم عدّل الرابط يدويًا وحط <code>min=abc</code>، إيه اللي المفروض يحصل؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">In the price-filter ticket, if a user manually edits the URL to set <code>min=abc</code>, what should happen?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="crash"> الموقع يتعطل بالكامل</label>
        <label><input type="radio" name="q3" value="reject"> الباك إند يرفض القيمة ويرجّع رسالة خطأ واضحة</label>
        <label><input type="radio" name="q3" value="trust"> الباك إند يثق في القيمة ويكمل الاستعلام عادي</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="verify">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">زميلك قال "الفرونت إند خلّص شغله، مفيش داعي الباك إند يتحقق من القيم تاني". رأيك في الكلام ده إيه؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">A colleague says "Front-End already validated it, Back-End doesn't need to check again." What's your take?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="agree"> صح، مفيش داعي نكرر نفس الشغل مرتين</label>
        <label><input type="radio" name="q4" value="verify"> غلط، الباك إند لازم يتحقق دايمًا لإن أي حد يقدر يتخطى الفرونت إند</label>
        <label><input type="radio" name="q4" value="depends"> يعتمد بس على حجم الموقع</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ صنّف مهام وظيفة حقيقية / Classify a Real Job's Tasks</h3>
    <div class="ar">🇪🇬 افتح أي إعلان وظيفة "Full Stack Developer" على LinkedIn أو Wuzzuf، واقرأ قائمة المسؤوليات (Responsibilities). اعمل قائمتين: "دي مهام Front-End" و"دي مهام Back-End" وحط كل سطر من الإعلان في القائمة المناسبة. لو لقيت سطر مش عارف تصنّفه، ده بالظبط نوع السؤال اللي المسار ده هيجاوبك عليه بعدين.</div>
    <div class="en">🇬🇧 Open any "Full Stack Developer" job posting on LinkedIn or Wuzzuf and read its responsibilities list. Make two columns: "Front-End tasks" and "Back-End tasks" and sort each line into the right one. If you find a line you can't classify, that's exactly the kind of question this track will answer for you later.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 آخر حاجة هتوصلها في المسار ده هي مشروع <b>متجر إلكتروني (Online Store)</b> كامل — واجهة متجاوبة، سلة مشتريات، تسجيل دخول حقيقي، وقاعدة بيانات. هو بالظبط التطبيق العملي لكل حاجة هتتعلمها هنا: Front-End في الشكل والتفاعل، Back-End في الأمان وحفظ البيانات. كل درس جاي هو خطوة بتقرّبك منه.</div>
    <div class="en">🇬🇧 The final thing you'll reach in this track is a complete <b>Online Store</b> project — a responsive interface, a shopping cart, real authentication, and a database. It's the practical application of everything you'll learn here: Front-End for appearance and interactivity, Back-End for security and data. Every lesson ahead is a step closer to it.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>Front-End = الواجهة والتفاعل الظاهر للمستخدم. Back-End = السيرفر وقاعدة البيانات ومنطق العمل.</li>
        <li>Full Stack = القدرة على بناء الاتنين وتوصيل فكرة كاملة بمفردك.</li>
        <li>المسار مرتب: Front-End أولاً (نتيجة بصرية سريعة) ثم Back-End (تطبيق حقيقي) ثم مشاريع تجمعهم.</li>
        <li>المطلوب فعليًا في الشغل: تنفيذ مهمة كاملة من الواجهة لقاعدة البيانات، مش عمق نظري في كل تفصيلة.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <span></span>
    <a href="setup.php">المرحلة الجاية / Next: الأدوات والإعدادات →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
