<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'intro';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'مقدمة في التسويق الإلكتروني';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">المرحلة 1 / Stage 1</span>
<h1>مقدمة في التسويق الإلكتروني <span class="ltr">Intro to Digital Marketing</span></h1>
<p class="subtitle">قبل ما تتعلم SEO أو إعلانات ممولة، لازم تفهم الخريطة الكاملة: إيه هي القنوات المتاحة، وليه منتج معين بيحتاج قناة مختلفة عن منتج تاني.</p>

<div class="step-tracker">
    <a href="#read">📖 Read</a>
    <a href="#understand">🧠 Understand</a>
    <a href="#quiz">🧠 Quiz</a>
    <a href="#challenge">🛠️ Challenge</a>
    <a href="#project">🚀 Project</a>
</div>

<h2 id="read">الهدف / Goal</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 تفهم إيه هو التسويق الإلكتروني بالظبط، تتعرف على أهم القنوات المتاحة، وتقدر تفكر إزاي تختار القناة المناسبة حسب المنتج والجمهور المستهدف — وحسب كون عميلك شركة (B2B) أو مستهلك عادي (B2C).</div>
    <div class="en">🇬🇧 Understand exactly what digital marketing is, learn the main available channels, and be able to reason about which channel fits a given product, audience, and whether your customer is a business (B2B) or an everyday consumer (B2C).</div>
</div>

<h2 id="understand">إيه هو التسويق الإلكتروني؟ / What Is Digital Marketing?</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 التسويق الإلكتروني ببساطة هو الوصول للعميل المحتمل والتأثير عليه عن طريق قنوات رقمية (الإنترنت) بدل الوسائل التقليدية (لافتة، جريدة، تلفزيون). الفرق الجوهري: تقدر تقيس كل حاجة بالأرقام — كام واحد شاف الإعلان، كام واحد ضغط، وكام واحد اشترى فعلًا.</div>
    <div class="en">🇬🇧 Digital marketing simply means reaching and influencing a potential customer through digital channels (the internet) instead of traditional means (a billboard, a newspaper, TV). The fundamental difference: you can measure everything with numbers — how many saw the ad, how many clicked, and how many actually bought.</div>
</div>

<h2>القنوات الأساسية / The Main Channels</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 مش كل القنوات مناسبة لكل منتج. الجدول ده هيوريك الفكرة العامة، وهنتعمق في كل قناة في مرحلتها الخاصة:</div>
</div>

<div class="recap-box">
    <h3>🗺️ خريطة القنوات / Channel Map</h3>
    <ul>
        <li><b>SEO (تحسين محركات البحث):</b> نتائج مجانية على المدى الطويل — مناسب لمنتج بيتباع بحث فعلي عليه (زي "أفضل مطعم بيتزا في القاهرة").</li>
        <li><b>تسويق المحتوى:</b> بناء ثقة قبل البيع — مناسب لمنتجات محتاجة شرح أو تعليم قبل الشراء.</li>
        <li><b>السوشيال ميديا:</b> بناء علاقة وتفاعل مباشر — مناسب للمنتجات اللي جمهورها موجود بكثافة على منصة معينة (زي منتجات الموضة على Instagram).</li>
        <li><b>البريد الإلكتروني:</b> التواصل مع عملاء موجودين بالفعل — الأرخص لكل عميل تكلمه.</li>
        <li><b>الإعلانات المدفوعة:</b> نتائج سريعة مضمونة — مناسبة لما تحتاج مبيعات فورية أو تجرب فكرة بسرعة.</li>
    </ul>
</div>

<h2>إزاي تختار القناة الصح؟ / Choosing the Right Channel</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 السؤال مش "إيه أحسن قناة؟" — السؤال الصح هو "فين عميلي المستهدف بيقضي وقته، وإيه اللي بيدور عليه؟". لو بتبيع لمهندسين محترفين، LinkedIn غالبًا أنسب من TikTok. لو بتبيع منتج مرئي جدًا (زي ملابس أو ديكور)، Instagram أو Pinterest هيفيدوك أكتر من مقال SEO طويل.</div>
    <div class="en">🇬🇧 The question isn't "what's the best channel?" — it's "where does my target customer spend time, and what are they searching for?" If you sell to professional engineers, LinkedIn is usually a better fit than TikTok. If your product is highly visual (like clothing or decor), Instagram or Pinterest will serve you better than a long SEO article.</div>
</div>

<h2>B2B مقابل B2C: أولويات القنوات مختلفة تمامًا / B2B vs B2C: Completely Different Channel Priorities</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 أهم فرق ما زلناش اتكلمنا عنه هو نوع العميل نفسه. <b>B2B (Business-to-Business)</b> معناه إنك بتبيع لشركة تانية (زي برنامج محاسبة لشركات صغيرة)، و<b>B2C (Business-to-Consumer)</b> معناه إنك بتبيع لمستهلك عادي بيشتري لنفسه (زي حذاء رياضي). الفرق مش بس "مين بيشتري" — هو فرق جوهري في طول رحلة الشراء ومين بيتخذ القرار: في B2B غالبًا أكتر من شخص لازم يوافق (موظف يقترح، مدير يوافق، مسؤول مشتريات يوقع)، والقرار بياخد أسابيع أو شهور. في B2C الشخص اللي بيشوف الإعلان هو نفسه اللي بيقرر ويدفع، وممكن يحصل ده في دقايق.</div>
    <div class="en">🇬🇧 A key difference we haven't covered yet is the customer type itself. <b>B2B (Business-to-Business)</b> means you sell to another company (like accounting software for small businesses), and <b>B2C (Business-to-Consumer)</b> means you sell to an everyday consumer buying for themselves (like running shoes). The difference isn't just "who buys" — it's a fundamental difference in the buying journey's length and who decides: in B2B, often several people must agree (an employee proposes, a manager approves, procurement signs off), and the decision takes weeks or months. In B2C, the person who sees the ad is the same person who decides and pays, and that can happen in minutes.</div>
</div>

<table style="width:100%;border-collapse:collapse;margin:16px 0;font-size:0.92rem;">
    <thead>
        <tr style="border-bottom:2px solid var(--accent);">
            <th style="text-align:right;padding:10px 8px;color:var(--text);">القناة / Channel</th>
            <th style="text-align:right;padding:10px 8px;color:var(--accent-2);">B2B — أولوية</th>
            <th style="text-align:right;padding:10px 8px;color:var(--accent-2);">B2C — أولوية</th>
        </tr>
    </thead>
    <tbody>
        <tr style="border-bottom:1px solid var(--border);">
            <td style="padding:10px 8px;"><b>LinkedIn</b></td>
            <td style="padding:10px 8px;">عالية جدًا — صناع القرار وأصحاب المناصب موجودين هناك فعلًا</td>
            <td style="padding:10px 8px;color:var(--muted);">منخفضة عادة — الجمهور مش في وضع "شراء استهلاكي"</td>
        </tr>
        <tr style="border-bottom:1px solid var(--border);">
            <td style="padding:10px 8px;"><b>Instagram / TikTok</b></td>
            <td style="padding:10px 8px;color:var(--muted);">منخفضة — إلا في حالات نادرة (توظيف، صورة العلامة)</td>
            <td style="padding:10px 8px;">عالية جدًا — قرار شراء بصري وسريع</td>
        </tr>
        <tr style="border-bottom:1px solid var(--border);">
            <td style="padding:10px 8px;"><b>تسويق المحتوى (مقالات/أدلة)</b></td>
            <td style="padding:10px 8px;">عالية جدًا — قرار طويل يحتاج إقناع منطقي بالأرقام والحالات (case studies)</td>
            <td style="padding:10px 8px;">متوسطة — مفيد لكن أقل حسمًا من الصورة والسعر</td>
        </tr>
        <tr style="border-bottom:1px solid var(--border);">
            <td style="padding:10px 8px;"><b>البريد الإلكتروني</b></td>
            <td style="padding:10px 8px;">عالية جدًا — أساسي لتغذية عميل محتمل (nurturing) على مدار أسابيع</td>
            <td style="padding:10px 8px;">متوسطة إلى عالية — ممتاز لعملاء سابقين ومتابعة سلة متروكة</td>
        </tr>
        <tr>
            <td style="padding:10px 8px;"><b>الإعلانات المدفوعة</b></td>
            <td style="padding:10px 8px;">متوسطة — مفيدة لجذب أول اهتمام (leads) بس نادرًا ما تبيع مباشرة</td>
            <td style="padding:10px 8px;">عالية جدًا — ممكن تنتج بيع مباشر من أول ضغطة</td>
        </tr>
    </tbody>
</table>

<div class="bi-block">
    <div class="ar">🇪🇬 السبب الجذري وراء الجدول ده: عميل B2B بيحتاج ثقة منطقية (بيانات، عائد استثمار متوقع، شهادات شركات تانية) لأنه بيخاطر بميزانية شركته وسمعته الشخصية لو الاختيار غلط — فالقنوات اللي بتبني حجة منطقية طويلة (محتوى + إيميل + LinkedIn) بتفوز. عميل B2C بيخاطر بس بفلوسه الشخصية وممكن يرجع المنتج لو مش عاجبه، فالقرار عاطفي وسريع أكتر — فالقنوات البصرية السريعة (سوشيال + إعلانات) بتفوز.</div>
    <div class="en">🇬🇧 The root reason behind this table: a B2B buyer needs logical trust (data, expected ROI, other companies' testimonials) because they're risking their company's budget and their own reputation on a wrong choice — so channels that build a long logical case (content + email + LinkedIn) win. A B2C buyer only risks their own money and can usually return the product if unhappy, so the decision is faster and more emotional — so fast visual channels (social + ads) win.</div>
</div>

<div class="exercise-box">
    <h3>✍️ تمرين عملي / Hands-on Exercise</h3>
    <div class="ar">🇪🇬 اختار منتج أو خدمة وهمية (زي "دورة أونلاين لتعلم الطبخ")، وحدد: مين الجمهور المستهدف بالظبط (العمر، الاهتمامات)، وإيه أول قناتين هتركز عليهم وليه، مش بس "كل القنوات".</div>
    <div class="en">🇬🇧 Pick a hypothetical product or service (like "an online cooking course"), and define: exactly who the target audience is (age, interests), and which two channels you'd focus on first and why — not just "all of them."</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="linkedin">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">شركة بتبيع نظام إدارة مخزون لمصانع كبيرة (عميلها شركة تانية، يعني B2B) — إيه أفضل قناة أولى تركز عليها حسب جدول الأولويات؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">A company sells inventory-management software to large factories (its customer is another business, i.e. B2B) — which channel should it prioritize first per the priority table?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="tiktok"> TikTok</label>
        <label><input type="radio" name="q1" value="linkedin"> LinkedIn وتسويق المحتوى</label>
        <label><input type="radio" name="q1" value="instagram"> Instagram فقط</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="longer">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">ليه رحلة الشراء في B2B عادة أطول من B2C؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Why is the B2B buying journey usually longer than B2C?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="expensive"> لأن كل منتجات B2B غالية بس</label>
        <label><input type="radio" name="q2" value="longer"> لأن أكتر من شخص لازم يوافق على القرار، ومخاطرة الشركة أعلى</label>
        <label><input type="radio" name="q2" value="noads"> لأن B2B ممنوع يستخدم إعلانات مدفوعة</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ اختر القناتين الصح لعميلين مختلفين تمامًا / Pick the Right Two Channels for Two Very Different Clients</h3>
    <div class="ar">🇪🇬 عندك عميلان وهميان: (أ) شركة SaaS بتبيع برنامج إدارة مشاريع لشركات مقاولات (B2B)، (ب) علامة تجارية بتبيع منتجات عناية بالبشرة للفتيات الشابات (B2C). لكل عميل، حدد أفضل قناتين حسب جدول B2B/C فوق، واكتب جملة واحدة توضح السبب بالرجوع للجدول (مش رأي عام).</div>
    <div class="en">🇬🇧 You have two hypothetical clients: (A) a B2B SaaS company selling project-management software to construction firms, (B) a B2C skincare brand for young women. For each, pick the best two channels using the B2B/C table above, and write one sentence justifying each choice by referencing the table (not a general opinion).</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 الخريطة اللي بنيتها هنا (القنوات + B2B مقابل B2C) هي البوصلة اللي هتستخدمها في كل درس جاي. الدرس الجاي (SEO) هيوريك إزاي تتصدر نتائج البحث المجانية — قناة أساسية سواء كان عميلك B2B أو B2C، بس بطريقة مختلفة شوية حسب نوع الكلمات اللي بيدوروا عليها.</div>
    <div class="en">🇬🇧 The map you built here (channels + B2B vs B2C) is the compass you'll use in every lesson ahead. The next lesson (SEO) shows you how to rank in free search results — a foundational channel whether your customer is B2B or B2C, just with a slightly different flavor depending on what they're actually searching for.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>التسويق الإلكتروني = وصول وتأثير قابل للقياس بالأرقام عبر قنوات رقمية.</li>
        <li>كل قناة ليها نقطة قوة مختلفة: SEO للمدى الطويل، الإعلانات للسرعة، السوشيال للتفاعل.</li>
        <li>اختيار القناة بيبدأ من سؤال "فين عميلي؟" مش "إيه القناة الأشهر؟".</li>
        <li>B2B = قرار طويل بيشترك فيه أكتر من شخص → LinkedIn/محتوى/إيميل تفوز. B2C = قرار سريع وفردي → سوشيال/إعلانات تفوز.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <span></span>
    <a href="seo.php">المرحلة الجاية / Next: SEO →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
