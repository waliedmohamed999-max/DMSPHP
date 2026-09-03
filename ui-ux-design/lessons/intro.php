<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'intro';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'الفرق بين UX وUI';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">المرحلة 1 / Stage 1</span>
<h1>الفرق بين UX وUI <span class="ltr">UX vs UI</span></h1>
<p class="subtitle">أشهر لخبطة عند المبتدئين: UX وUI مش نفس الحاجة، ومش بديلين عن بعض — هما طبقتين مختلفتين لازم يشتغلوا مع بعض عشان المنتج ينجح.</p>

<div class="step-tracker">
    <a href="#read">📖 Read</a>
    <a href="#understand">🧠 Understand</a>
    <a href="#practice">💻 Practice</a>
    <a href="#quiz">🧠 Quiz</a>
    <a href="#challenge">🛠️ Challenge</a>
    <a href="#project">🚀 Project</a>
</div>

<h2 id="read">الهدف / Goal</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 تفهم الفرق الدقيق بين UX وUI بمثالين ملموسين، وتقدر تحدد لما تشوف تصميم إيه اللي بيمثل UX فيه وإيه اللي بيمثل UI.</div>
    <div class="en">🇬🇧 Understand the precise difference between UX and UI with two concrete examples, and be able to identify which part of a design represents UX and which represents UI.</div>
</div>

<h2 id="understand">UX — تجربة الاستخدام / User Experience</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 الـ UX بيهتم بـ "هل المستخدم قادر يحقق هدفه بسهولة؟" — مش شكل الحاجة، إحساسه وهو بيستخدمها. لو تطبيق توصيل طعام محتاج 8 خطوات عشان تطلب وجبة، ده مشكلة UX حتى لو الألوان جميلة جدًا.</div>
    <div class="en">🇬🇧 UX cares about "can the user achieve their goal easily?" — not what things look like, but how it feels to use it. If a food delivery app needs 8 steps to order a meal, that's a UX problem even if the colors are beautiful.</div>
</div>

<h2>UI — الواجهة المرئية / User Interface</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 الـ UI هو كل حاجة تشوفها فعليًا: الألوان، الخطوط، شكل الأزرار، الأيقونات، المسافات. لو زرار "اطلب دلوقتي" شكله جميل ومتناسق مع باقي التصميم، ده UI كويس.</div>
    <div class="en">🇬🇧 UI is everything you actually see: colors, fonts, button shapes, icons, spacing. If the "Order Now" button looks great and matches the rest of the design, that's good UI.</div>
</div>

<h2>مثال 1: المطعم / Example 1: The Restaurant</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 فكّر في مطعم: <b>UX</b> هو ترتيب المنيو، سهولة إنك توصل للطاولة، وسرعة الأوردر — تجربتك ككل. <b>UI</b> هو تصميم المنيو نفسه (الخط، الصور، الألوان)، وشكل الكراسي والإضاءة. مطعم ممكن يكون UI جميل جدًا (ديكور فخم) لكن UX سيئ (خدمة بطيئة، منيو مربك) — والعكس صحيح.</div>
    <div class="en">🇬🇧 Think of a restaurant: <b>UX</b> is the menu's organization, how easily you reach your table, and how fast your order arrives — your overall experience. <b>UI</b> is the menu's visual design (font, photos, colors), and the chairs and lighting. A restaurant can have gorgeous UI (fancy decor) but poor UX (slow service, confusing menu) — and vice versa.</div>
</div>

<h2>مثال 2: الدفع في متجر إلكتروني / Example 2: E-commerce Checkout</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 مثال تاني أقرب لشغل مصمم UI/UX فعليًا: شاشة إتمام الشراء (Checkout) في متجر إلكتروني. <b>UX</b> هنا = عدد الخطوات اللي المستخدم محتاجها عشان يشتري (هل هو 5 صفحات منفصلة، ولا صفحة واحدة بسيطة؟)، وهل بيطلب منه معلومات زيادة عن اللازم؟ <b>UI</b> = شكل حقول الفورم، لون وحجم زرار "إتمام الشراء"، وهل واضح فين هو دلوقتي في العملية. ممكن يكون عندك خطوة دفع واحدة بس (UX ممتاز) لكن الفورم شكله مبعثر وغير واضح (UI سيء) — أو العكس: شاشة دفع جميلة جدًا (UI ممتاز) لكن بتاخد 6 خطوات معقدة (UX سيء).</div>
    <div class="en">🇬🇧 A second example closer to real UI/UX work: an e-commerce checkout screen. <b>UX</b> here = how many steps the user needs to complete a purchase (5 separate pages, or one simple page?), and whether it asks for more information than necessary. <b>UI</b> = the shape of the form fields, the color and size of the "Complete Purchase" button, and whether it's clear where the user currently is in the process. You could have a single checkout step (great UX) with a messy, unclear form (bad UI) — or the reverse: a gorgeous checkout screen (great UI) that takes 6 confusing steps (bad UX).</div>
</div>

<h2 id="practice">💻 مثال بصري: خطوات الدفع الإلكتروني / Visual Example: Checkout Steps</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 شوف الفرق بعينك: نفس هدف "إتمام الشراء"، لكن بتنفيذ مختلف تمامًا في عدد الخطوات (UX) وفي شكل العناصر (UI).</div>
    <div class="en">🇬🇧 See the difference with your own eyes: the same "complete purchase" goal, but implemented very differently in step count (UX) and element styling (UI).</div>
</div>

<h3>قبل / Before — خطوات كتير وواجهة مبعثرة / Many steps, messy UI</h3>
<iframe class="render-box" style="height:210px" sandbox srcdoc='<html><body style="font-family:Tahoma,sans-serif;padding:16px;font-size:12px;color:#555">
<div>الخطوة 3 من 5: الشحن</div>
<div style="margin-top:10px">الاسم<br><input style="border:1px solid #999;margin-top:2px;width:90%"></div>
<div style="margin-top:8px">العنوان<br><input style="border:1px solid #999;margin-top:2px;width:90%"></div>
<div style="margin-top:8px">رقم الهاتف<br><input style="border:1px solid #999;margin-top:2px;width:90%"></div>
<div style="margin-top:8px">هاتف بديل (اختياري)<br><input style="border:1px solid #999;margin-top:2px;width:90%"></div>
<button style="margin-top:10px;background:#ddd;color:#555;border:1px solid #aaa;padding:6px 14px">التالي</button>
</body></html>'></iframe>
<h3>بعد / After — خطوة واحدة وواجهة واضحة / One step, clear UI</h3>
<iframe class="render-box" style="height:210px" sandbox srcdoc='<html><body style="font-family:Tahoma,sans-serif;padding:16px;font-size:13px;color:#333">
<div style="font-weight:bold;font-size:15px;color:#111">إتمام الطلب</div>
<div style="margin-top:12px;color:#555;font-size:12px">الاسم والعنوان</div>
<input style="border:1px solid #ddd;border-radius:6px;margin-top:4px;width:90%;padding:8px">
<div style="margin-top:10px;color:#555;font-size:12px">رقم الهاتف</div>
<input style="border:1px solid #ddd;border-radius:6px;margin-top:4px;width:90%;padding:8px">
<button style="margin-top:16px;background:#e63946;color:white;border:none;padding:10px 26px;border-radius:8px;font-weight:bold">إتمام الشراء الآن</button>
</body></html>'></iframe>
<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ: النسخة "بعد" حسّنت الاتنين مع بعض — قللت الخطوات وحذفت الحقل الاختياري غير الضروري (UX)، وكمان حسّنت شكل الحقول والزرار (UI). ده بالظبط معنى إن UX وUI بيشتغلوا مع بعض.</div>
    <div class="en">🇬🇧 Notice: the "after" version improved both together — fewer steps and the unnecessary optional field removed (UX), plus better-styled fields and button (UI). That's exactly what it means for UX and UI to work together.</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="steps">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">أي من التالي مثال على مشكلة UX (مش UI)؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Which of the following is an example of a UX problem (not UI)?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="colors"> ألوان الأزرار غير متناسقة مع بعضها</label>
        <label><input type="radio" name="q1" value="steps"> المستخدم محتاج 8 خطوات عشان يطلب وجبة واحدة</label>
        <label><input type="radio" name="q1" value="font"> الخط المستخدم صعب القراءة</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="button-style">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">في مثال شاشة الدفع الإلكتروني، أي من هذا يمثّل UI؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">In the checkout example, which of this represents UI?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="step-count"> عدد خطوات إتمام الشراء</label>
        <label><input type="radio" name="q2" value="button-style"> شكل ولون زرار "إتمام الشراء"</label>
        <label><input type="radio" name="q2" value="extra-fields"> عدد الحقول الإضافية المطلوبة</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="exercise-box">
    <h3>✍️ تمرين عملي / Hands-on Exercise</h3>
    <div class="ar">🇪🇬 افتح أي تطبيق على موبايلك بتستخدمه كتير، وحاول تفصل: اكتب 3 حاجات عجباك في الـ UX بتاعه (سهولة، سرعة)، و3 حاجات عجباك في الـ UI بتاعه (ألوان، أيقونات، خطوط) بشكل منفصل تمامًا.</div>
    <div class="en">🇬🇧 Open any app on your phone that you use often, and try to separate: write down 3 things you like about its UX (ease, speed), and 3 things you like about its UI (colors, icons, fonts) — completely separately.</div>
</div>

<div class="challenge-box">
    <h3>🛠️ صنّف المشاكل / Classify the Problems</h3>
    <div class="ar">🇪🇬 تخيل موقع فيه المشاكل دي: (1) عشان تسجّل حساب جديد لازم تعدي على 4 صفحات منفصلة، (2) زرار "تسجيل" لونه رمادي فاتح بالكاد يتشاف، (3) نفس المعلومة (رقم الهاتف) بتتطلب مرتين في فورمين مختلفين، (4) العناوين والنصوص كلهم بنفس حجم الخط. اكتب جدول بعمودين: "المشكلة" و"UX ولا UI؟" وصنّف كل مشكلة من الأربعة، واقترح حل واحد لكل مشكلة.</div>
    <div class="en">🇬🇧 Imagine a site with these problems: (1) signing up requires going through 4 separate pages, (2) the "Sign Up" button is light gray and barely visible, (3) the same info (phone number) is requested twice in two different forms, (4) all headings and body text use the same font size. Write a two-column table: "Problem" and "UX or UI?" and classify each of the four, then suggest one fix for each.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 التمييز بين UX وUI اللي اتعلمته هنا هو الأساس اللي هيتبني عليه باقي المسار كله — كل درس جاي (ألوان، خطوط، مسافات) هو تفصيل داخل UI، وكل درس عن الـ Wireframing وقابلية الاستخدام هو تفصيل داخل UX. وفي آخر المسار، لما تبني بورتفوليو (درس "أدوات التصميم والعمل في المجال")، هتكتب كل مشروع إعادة تصميم بنفس الصيغة: "المشكلة" (غالبًا UX) و"الحل" (غالبًا UI) — بالظبط زي ما صنّفت هنا في التحدي.</div>
    <div class="en">🇬🇧 The UX/UI distinction you learned here is the foundation the rest of the track builds on — every upcoming lesson (color, typography, spacing) is a detail within UI, and every lesson on wireframing and usability is a detail within UX. Later in the track, when you build a portfolio (the "Tools & Careers" lesson), you'll write every redesign project in this exact shape: "the problem" (usually UX) and "the solution" (usually UI) — exactly like you classified in the challenge above.</div>
</div>

<div class="recap-box">
    <h3>🗺️ خلاصة الفرق / The Difference at a Glance</h3>
    <ul>
        <li><b>UX يسأل:</b> "هل ده منطقي وسهل؟" — بيهتم بالبنية والتدفق (Flow).</li>
        <li><b>UI يسأل:</b> "هل ده جميل ومتناسق؟" — بيهتم بالشكل النهائي.</li>
        <li>منتج ناجح محتاج الاتنين مع بعض — UX كويس بدون UI جميل حيبقى "شغال بس مش جذاب"، وUI جميل بدون UX كويس حيبقى "جذاب بس محبط".</li>
        <li>مثال الدفع الإلكتروني: تقليل الخطوات = UX، تحسين شكل الحقول والزرار = UI.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <span></span>
    <a href="design-principles.php">المرحلة الجاية / Next: مبادئ التصميم →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
