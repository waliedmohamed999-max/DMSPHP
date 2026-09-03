<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'intro';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'مقدمة في التصميم الجرافيكي';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">المرحلة 1 / Stage 1</span>
<h1>مقدمة في التصميم الجرافيكي <span class="ltr">Intro to Graphic Design</span></h1>
<p class="subtitle">التصميم الجرافيكي مش "رسم شكل حلو" — هو توصيل رسالة بصريًا بأوضح وأسرع طريقة ممكنة، سواء كان شعار، بوستر، أو منشور سوشيال ميديا.</p>

<div class="step-tracker">
    <a href="#read">📖 Read</a>
    <a href="#understand">🧠 Understand</a>
    <a href="#quiz">🧠 Quiz</a>
    <a href="#challenge">🛠️ Challenge</a>
    <a href="#project">🚀 Project</a>
</div>

<h2 id="read">الهدف / Goal</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 تفهم إيه هو التصميم الجرافيكي فعليًا، وتتعرف على أهم مجالاته الثلاثة، وتفهم ليه "التصميم الجميل" مش هو المقياس الوحيد للنجاح — وكمان تفرّق بينه وبين مجالات قريبة منه بيتلخبط فيها المبتدئين زي UI/UX والفن التشكيلي.</div>
    <div class="en">🇬🇧 Understand what graphic design actually is, learn its three main fields, understand why "a beautiful design" isn't the only measure of success — and also tell it apart from nearby fields beginners often confuse it with, like UI/UX and fine art.</div>
</div>

<h2 id="understand">إيه هو التصميم الجرافيكي؟ / What Is Graphic Design?</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 التصميم الجرافيكي هو استخدام عناصر بصرية (نصوص، صور، ألوان، أشكال) لتوصيل رسالة محددة لجمهور محدد. أهم سؤال يسأله أي مصمم قبل ما يفتح أي برنامج: "إيه الرسالة اللي المفروض التصميم ده يوصّلها، ولمين؟" — مش "إيه شكل حلو أقدر أعمله؟".</div>
    <div class="en">🇬🇧 Graphic design is using visual elements (text, images, color, shape) to communicate a specific message to a specific audience. The most important question any designer asks before opening any software: "what message should this design communicate, and to whom?" — not "what looks cool?"</div>
</div>

<h2>المجالات الثلاثة الأساسية / The Three Main Fields</h2>
<div class="recap-box">
    <h3>🗺️ خريطة المجال / Field Map</h3>
    <ul>
        <li><b>التصميم المطبوع (Print):</b> بوسترات، بروشورات، بطاقات أعمال — لازم تراعي دقة الطباعة (DPI) وألوان CMYK.</li>
        <li><b>التصميم الرقمي (Digital):</b> منشورات سوشيال ميديا، بانرات مواقع، صور إعلانات — بيراعي أحجام مختلفة لكل منصة.</li>
        <li><b>الهوية البصرية (Branding):</b> شعار، ألوان، وخطوط علامة تجارية كاملة — هنتعمق فيه في آخر المسار ده.</li>
    </ul>
</div>

<h2>ليه "الجميل" مش كفاية / Why "Beautiful" Isn't Enough</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 بوستر جميل جدًا فنيًا لكن محدش فاهم منه العرض أو التاريخ أو مكان الحدث هو تصميم فاشل — مهما كان شكله حلو. النجاح الحقيقي = رسالة واضحة + شكل جذاب، مش شكل جذاب بس. عشان كده أول مرحلتين جايين (عناصر التصميم ونظرية الألوان) هيركزوا على "إزاي توصل رسالة" قبل "إزاي تخلي الحاجة حلوة".</div>
    <div class="en">🇬🇧 A visually gorgeous poster that nobody can tell the offer, date, or venue from is a failed design — no matter how good it looks. Real success = a clear message + an attractive look, not just an attractive look. That's why the next two stages (design elements and color theory) focus on "how to communicate" before "how to make it pretty."</div>
</div>

<h2>التصميم الجرافيكي مقابل UI/UX والفن التشكيلي / Graphic Design vs. UI/UX vs. Illustration &amp; Fine Art</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 أشهر لخبطة عند المبتدئين: الثلاثة مجالات دول بيستخدموا نفس الأدوات أحيانًا، لكن هدفهم مختلف تمامًا. <b>التصميم الجرافيكي</b> بيركز على "الرسالة الثابتة" — شعار أو بوستر أو منشور، المستخدم بيشوفه وخلاص، مفيهوش "تفاعل" منه. <b>تصميم UI/UX</b> بيركز على "التجربة التفاعلية" — إزاي المستخدم بيضغط، يتنقل، ويكمل مهمة جوه تطبيق أو موقع؛ يعني فيه طبقة إضافية اسمها سهولة الاستخدام (Usability) مش موجودة في بوستر ثابت. <b>الرسم التوضيحي/الفن التشكيلي (Illustration/Fine Art)</b> بيركز على التعبير أو سرد قصة بصرية، والفنان غالبًا حر يعبّر عن نفسه، بينما المصمم الجرافيكي بيحل مشكلة تواصل محددة لعميل بقيود واضحة (رسالة، جمهور، مساحة).</div>
    <div class="en">🇬🇧 The most common beginner confusion: these three fields sometimes use the same software, but their goals are completely different. <b>Graphic design</b> focuses on a "fixed message" — a logo, poster, or post the user simply looks at, with no interaction involved. <b>UI/UX design</b> focuses on the "interactive experience" — how a user clicks, navigates, and completes a task inside an app or website; it adds a layer called usability that a static poster doesn't have. <b>Illustration/fine art</b> focuses on expression or visual storytelling, and the artist is usually free to express themselves, while a graphic designer solves a specific communication problem for a client within clear constraints (message, audience, space).</div>
</div>

<div class="recap-box">
    <h3>🗺️ مقارنة سريعة / Quick Comparison</h3>
    <ul>
        <li><b>تصميم جرافيكي:</b> رسالة ثابتة لجمهور محدد (شعار، بوستر) — مفيش تفاعل.</li>
        <li><b>UI/UX:</b> تجربة تفاعلية داخل تطبيق/موقع — الهدف سهولة الاستخدام مش بس الشكل.</li>
        <li><b>رسم/فن تشكيلي:</b> تعبير أو سرد قصة — حرية أكبر، قيود أقل من العميل.</li>
    </ul>
</div>

<div class="exercise-box">
    <h3>✍️ تمرين عملي / Hands-on Exercise</h3>
    <div class="ar">🇪🇬 دوّر على إعلان أو بوستر شفته مؤخرًا (في الشارع، أونلاين، أو حتى في تطبيق) وحاول تحدد: إيه الرسالة اللي المفروض يوصّلها؟ ولمين؟ هل فعلًا نجح يوصّلها في أول 3 ثواني نظر ولا لأ؟</div>
    <div class="en">🇬🇧 Find an ad or poster you saw recently (on the street, online, or even in an app) and try to identify: what message was it supposed to communicate? To whom? Did it actually succeed within the first 3 seconds of looking at it?</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="usability">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">إيه أهم فرق بين التصميم الجرافيكي وتصميم UI/UX؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What's the key difference between graphic design and UI/UX design?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="colors"> UI/UX بيستخدم ألوان أكتر</label>
        <label><input type="radio" name="q1" value="usability"> UI/UX بيضيف طبقة تفاعل وسهولة استخدام غير موجودة في تصميم ثابت</label>
        <label><input type="radio" name="q1" value="same"> محصلش فرق حقيقي، الاتنين نفس الحاجة</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="constraints">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">إيه اللي بيميّز المصمم الجرافيكي عن الفنان التشكيلي (Fine Artist)؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What sets a graphic designer apart from a fine artist?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="tools"> المصمم بيستخدم برامج والفنان بيستخدم ورقة وقلم بس</label>
        <label><input type="radio" name="q2" value="constraints"> المصمم بيحل مشكلة تواصل لعميل بقيود محددة، الفنان بيعبّر عن نفسه بحرية</label>
        <label><input type="radio" name="q2" value="none"> مفيش فرق، الاتنين شغلهم فني بحت</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ صنّف الثلاثة / Classify the Three</h3>
    <div class="ar">🇪🇬 خد الثلاث حالات دي: (1) شاشة تسجيل دخول في تطبيق بنكي، (2) بوستر إعلان لحفلة موسيقية، (3) لوحة معروضة في معرض فني. لكل حالة، حدد: هل هي تصميم جرافيكي، UI/UX، ولا فن تشكيلي؟ واكتب سطر واحد يوضح "إيه القيد أو الحرية" اللي خلتك تحدد كده.</div>
    <div class="en">🇬🇧 Take these three cases: (1) a login screen in a banking app, (2) a poster ad for a music concert, (3) a painting displayed in an art gallery. For each, decide: is it graphic design, UI/UX, or fine art? Write one line explaining what constraint (or freedom) led you to that answer.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 كل مرحلة جاية في المسار ده (العناصر، الألوان، الخطوط، الأدوات) بتبني فوق بعضها لحد ما توصل لمرحلة "الهوية البصرية" (Branding) — هي أوضح مثال على تصميم جرافيكي استراتيجي بحت: مفيهاش تفاعل زي UI/UX، ومفيهاش حرية تعبير مطلقة زي الفن التشكيلي، لكن كل قرار فيها (لون، خط، شكل شعار) بيخدم رسالة محددة لعميل محدد. خليك فاكر الفرق ده وإحنا بنتقدم في المسار.</div>
    <div class="en">🇬🇧 Every upcoming stage in this track (elements, colors, typography, tools) builds on the last until you reach the "Brand Identity" stage — the clearest example of purely strategic graphic design: no interactivity like UI/UX, and no absolute creative freedom like fine art, but every decision (color, font, logo shape) serves a specific message for a specific client. Keep that distinction in mind as we move forward.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>التصميم الجرافيكي = توصيل رسالة بصريًا لجمهور محدد، مش بس "شكل حلو".</li>
        <li>3 مجالات أساسية: مطبوع، رقمي، وهوية بصرية.</li>
        <li>السؤال الأول دايمًا: "إيه الرسالة، ولمين؟" — قبل أي تفاصيل بصرية.</li>
        <li>التصميم الجرافيكي ≠ UI/UX (اللي فيه تفاعل وسهولة استخدام) ≠ الفن التشكيلي (اللي فيه حرية تعبير مطلقة).</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <span></span>
    <a href="design-elements.php">المرحلة الجاية / Next: Elements of Design →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
