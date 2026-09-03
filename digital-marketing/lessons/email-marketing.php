<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'email-marketing';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'التسويق عبر البريد الإلكتروني';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">المرحلة 5 / Stage 5</span>
<h1>التسويق عبر البريد الإلكتروني <span class="ltr">Email Marketing</span></h1>
<p class="subtitle">الإيميل هو القناة الوحيدة اللي بتملكها بالكامل — مفيش خوارزمية بتحدد مين هيشوف رسالتك زي السوشيال ميديا.</p>

<div class="step-tracker">
    <a href="#read">📖 Read</a>
    <a href="#understand">🧠 Understand</a>
    <a href="#quiz">🧠 Quiz</a>
    <a href="#challenge">🛠️ Challenge</a>
    <a href="#project">🚀 Project</a>
</div>

<h2 id="read">الهدف / Goal</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 تفهم إزاي تبني قائمة بريدية بمغناطيس عملاء (lead magnet) ونماذج اشتراك فعالة، ليه تقسيم الجمهور (segmentation) بيرفع نتائجك، تقدر تصمم سلسلة ترحيب تلقائية بسيطة من 3 إيميلات، وتفهم إزاي تختبر عناوين الإيميل (A/B testing) عشان تحسّن نتائجك بالأرقام مش بالتخمين.</div>
    <div class="en">🇬🇧 Understand how to build an email list with a lead magnet and effective opt-in forms, why audience segmentation improves your results, be able to design a simple 3-email automated welcome sequence, and understand how to A/B test subject lines to improve results with data instead of guessing.</div>
</div>

<h2 id="understand">بناء القائمة البريدية / Building the List</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 محدش هيدي إيميله مجانًا من غير مقابل. المغناطيس (lead magnet) هو حاجة مجانية وقيمتها واضحة فورًا بتقدمها مقابل الإيميل: خصم 10% على أول طلب، كتاب إلكتروني قصير، قائمة تحقق (checklist)، أو نسخة تجريبية مجانية. الشرط الأساسي إن المغناطيس يكون مرتبط جدًا بمنتجك — لو بتبيع أدوات تصوير، مغناطيس زي "5 أخطاء بتخلي صورك مظلمة" هيجيب ناس فعلًا مهتمة بالتصوير، مش ناس عايزين هدية مجانية بس وخلاص.</div>
    <div class="en">🇬🇧 Nobody hands over their email for free without something in return. A lead magnet is a free item with immediately obvious value that you offer in exchange for the email: a 10% discount on the first order, a short ebook, a checklist, or a free trial. The key requirement is that the magnet must be tightly related to your product — if you sell camera gear, a magnet like "5 mistakes that make your photos dark" will attract people genuinely interested in photography, not just people chasing any free gift.</div>
</div>

<h2>أماكن نموذج الاشتراك: تكتيكات نمو القائمة / Opt-in Placement: List-Growth Tactics</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 المغناطيس القوي مش هيجيب أي إيميل لو محدش شافه في المكان الصح. نموذج الاشتراك (opt-in form) لازم يظهر في اللحظة اللي الزائر أكتر استعداد فيها يدي إيميله. أهم الأماكن: <b>نافذة نية المغادرة (Exit-intent popup):</b> بتظهر بس لما الماوس يتحرك ناحية إغلاق التبويب — بتمسك زائر كان هيسيب الموقع من غير أي فايدة. <b>نموذج داخل المحتوى (In-content opt-in):</b> صندوق صغير في نص المقال نفسه بيقول "عايز الدليل الكامل كـ PDF؟" — قوي لأن القارئ أصلًا مهتم بالموضوع في نفس اللحظة. <b>صفحة هبوط مخصصة (Dedicated landing page):</b> صفحة كاملة هدفها الوحيد جمع الإيميل، بتُستخدم غالبًا مع إعلان مدفوع. <b>خانة عند الدفع (Checkout opt-in):</b> خانة اختيارية "اشترك في نشرتنا" في صفحة الدفع نفسها — أسهل تحويل لأن العميل أصلًا بيثق فيك ودافع فلوسه.</div>
    <div class="en">🇬🇧 A strong lead magnet won't get a single email if nobody sees it at the right moment. The opt-in form needs to appear at the point where the visitor is most ready to hand over their email. Key placements: <b>Exit-intent popup:</b> appears only when the mouse moves toward closing the tab — catches a visitor about to leave with zero benefit. <b>In-content opt-in:</b> a small box mid-article saying "want the full guide as a PDF?" — strong because the reader is already engaged with the topic at that exact moment. <b>Dedicated landing page:</b> a full page whose only goal is collecting the email, usually paired with a paid ad. <b>Checkout opt-in:</b> an optional "subscribe to our newsletter" checkbox on the checkout page itself — the easiest conversion since the customer already trusts you and just paid.</div>
</div>

<div class="bi-block">
    <div class="ar">🇪🇬 مثال ملموس: متجر أونلاين لاحظ إن 70% من الزوار بيسيبوا الموقع من غير ما يشتروا ومن غير ما يسيبوا إيميلهم. أضافوا نافذة نية مغادرة تظهر بس للزوار اللي هيسيبوا الموقع، بعنوان "استنى! خد 10% خصم على أول طلب" مع خانة إيميل واحدة بسيطة. النتيجة: 8% من الزوار اللي كانوا هيغادروا سجّلوا إيميلهم بدل ما يختفوا نهائيًا — ومن غير النافذة دي، الـ 8% دول كانوا هيروحوا من غير أي أثر.</div>
    <div class="en">🇬🇧 Concrete example: an online store noticed 70% of visitors left without buying or leaving an email. They added an exit-intent popup shown only to visitors about to leave, headlined "Wait! Get 10% off your first order" with a single simple email field. Result: 8% of the visitors who were about to leave signed up instead of vanishing entirely — without that popup, that 8% would have left with zero trace.</div>
</div>

<h2>تقسيم الجمهور / Segmentation</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 إرسال نفس الإيميل لكل القائمة بدون تفرقة هو أكبر سبب لضعف نتائج التسويق بالإيميل. التقسيم (segmentation) معناه تقسيم قائمتك لمجموعات حسب سلوك أو اهتمام مختلف، وترسل لكل مجموعة محتوى مناسب لها. مثال: عميل اشترى قبل كده محتاج إيميلات عن منتجات مكملة أو عروض ولاء، بينما عميل سجل بس ولسه ما اشتراش محتاج إيميلات تبني ثقة وتشرح فايدة المنتج. لو بعتلهم نفس الرسالة، العميل القديم هيحس إن الرسالة مش موجهة له، والعميل الجديد ممكن يحس بضغط بيع مبكر قوي.</div>
    <div class="en">🇬🇧 Sending the exact same email to your entire list is the single biggest reason email marketing underperforms. Segmentation means splitting your list into groups based on different behavior or interest, and sending each group content that fits them. Example: a customer who already bought needs emails about complementary products or loyalty offers, while someone who just signed up but hasn't bought yet needs trust-building emails that explain the product's value. Send them the same message and the returning customer feels unaddressed, while the new signup may feel early sales pressure.</div>
</div>

<h2>مثال محلول: سلسلة ترحيب تلقائية من 3 إيميلات / Worked Example: A 3-Email Automated Welcome Sequence</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 لما حد يسجل إيميله جديد (بعد ما ياخد المغناطيس)، بتشتغل سلسلة تلقائية (بدون تدخل يدوي منك) بالترتيب ده:</div>
</div>
<div class="flow-diagram">
    <div class="flow-box">Signup + Lead Magnet</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">Email 1: Deliver + Welcome</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">Email 2: Trust (Story/Proof)</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">Email 3: Special Offer (Action)</div>
</div>
<div class="output-box">📧 إيميل 1 (فورًا): "خد هديتك + أهلًا بيك"
   الهدف: تسليم المغناطيس فورًا (عشان الثقة)، وتعريف بسيط بمين انت.

📧 إيميل 2 (بعد يومين): "قصة نجاح / إزاي بنحل المشكلة دي"
   الهدف: بناء ثقة أعمق بمثال حقيقي أو شهادة عميل، من غير أي طلب شراء مباشر.

📧 إيميل 3 (بعد 4 أيام من الإيميل التاني): "عرض خاص لأول عملية شراء"
   الهدف: أول دعوة فعلية للشراء، بخصم بسيط محدود بوقت، بعد ما بنينا ثقة كافية.</div>
<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ الترتيب: قيمة → ثقة → طلب. لو بدأت بالإيميل التالت من أول رسالة (طلب شراء مباشر لحد لسه ما يعرفكش)، معدل التحويل هيكون ضعيف جدًا لأن مفيش ثقة اتبنت لسه.</div>
    <div class="en">🇬🇧 Notice the order: value → trust → ask. If you led with the third email as your very first message (a direct purchase ask to someone who doesn't know you yet), conversion rate would be very weak because no trust has been built yet.</div>
</div>

<h2>اختبار A/B لعناوين الإيميل / A/B Testing Subject Lines</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 عنوان الإيميل (subject line) هو العامل الوحيد اللي بيحدد هل العميل هيفتح الإيميل أصلًا ولا لأ — حتى لو محتوى الإيميل جوه ممتاز، مفيش حد هيشوفه لو العنوان ضعيف. اختبار A/B معناه إنك تبعت نسختين مختلفتين من العنوان لجزء صغير من القائمة، وتشوف أنهي واحد حقق نسبة فتح (open rate) أعلى، وبعدين تبعت النسخة الفايزة للباقي.</div>
    <div class="en">🇬🇧 The subject line is the single factor determining whether a customer opens the email at all — even excellent email content is worthless if nobody sees it because the subject line was weak. A/B testing means sending two different subject line versions to a small slice of your list, seeing which achieves a higher open rate, then sending the winning version to everyone else.</div>
</div>

<h2>مثال محلول: مقارنة عنوانين فعليين / Worked Example: Comparing Two Real Subject Lines</h2>
<div class="output-box">نسخة أ: "خصم 20% على كل المنتجات"
   نسبة الفتح: 18%

نسخة ب: "نسيت حاجة في السلة يا [الاسم] 👀"
   نسبة الفتح: 34%

الفرق: نسخة (ب) ضاعفت نسبة الفتح تقريبًا</div>
<div class="bi-block">
    <div class="ar">🇪🇬 ليه نسخة (ب) فازت رغم إن نسخة (أ) فيها عرض أقوى ظاهريًا (خصم فعلي)؟ ثلاث أسباب: (1) <b>التخصيص (Personalization)</b> — ذكر اسم المستلم بيخلي الرسالة تحس إنها موجهة له شخصيًا مش رسالة جماعية. (2) <b>الفضول (Curiosity)</b> — "نسيت حاجة" بيثير سؤال محدد (إيه اللي نسيته؟) بينما "خصم 20%" عرض عام شافه القارئ في مية إيميل تاني. (3) <b>السياق الشخصي</b> — الرسالة بتشير لفعل قام بيه العميل نفسه (سلة متروكة)، مش عرض عشوائي مرسل للجميع. الدرس المهم: العرض الأقوى موضوعيًا (خصم فعلي) مش هو اللي بيكسب دايمًا — العنوان اللي بيلمس سلوك أو فضول شخصي غالبًا بيفوز.</div>
    <div class="en">🇬🇧 Why did version (B) win despite version (A) having an objectively stronger offer (an actual discount)? Three reasons: (1) <b>Personalization</b> — naming the recipient makes the message feel individually addressed, not a mass blast. (2) <b>Curiosity</b> — "forgot something" raises a specific question (what did I forget?) while "20% off" is a generic offer the reader has seen in a hundred other emails. (3) <b>Personal context</b> — the message references an action the customer themselves took (an abandoned cart), not a random offer blasted to everyone. The key lesson: the objectively stronger offer (an actual discount) doesn't always win — a subject line that touches personal behavior or curiosity usually does.</div>
</div>

<div class="recap-box">
    <h3>🗺️ خريطة تدفق العميل / Customer Flow Map</h3>
    <ul>
        <li><b>المغناطيس (Lead Magnet):</b> يجذب الإيميل — لازم يكون قيمته واضحة ومرتبطة بالمنتج.</li>
        <li><b>مكان النموذج (Opt-in Placement):</b> نافذة نية مغادرة، داخل المحتوى، صفحة هبوط، أو خانة عند الدفع.</li>
        <li><b>التقسيم (Segmentation):</b> يحدد مين يستقبل إيه — عميل جديد ≠ عميل قديم.</li>
        <li><b>سلسلة الترحيب (Welcome Sequence):</b> قيمة أولًا، ثقة تانيًا، طلب شراء أخيرًا.</li>
        <li><b>اختبار A/B:</b> عنوان شخصي/فضولي غالبًا بيفوز على عرض عام حتى لو أضعف ظاهريًا.</li>
    </ul>
</div>

<div class="exercise-box">
    <h3>✍️ تمرين عملي / Hands-on Exercise</h3>
    <div class="ar">🇪🇬 اختار منتج وهمي، واكتب: (1) مغناطيس عملاء (lead magnet) واحد مناسب له ولماذا يجذب الجمهور الصح، (2) عنوان (subject line) لكل إيميل من سلسلة الترحيب الثلاثة، مع جملة توضح هدف كل إيميل بالظبط.</div>
    <div class="en">🇬🇧 Pick a hypothetical product, and write: (1) one lead magnet suited to it and why it attracts the right audience, (2) a subject line for each of the three welcome-sequence emails, with a sentence explaining each email's exact purpose.</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="exit">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">نموذج اشتراك بيظهر بس لما الزائر يحرك الماوس ناحية إغلاق التبويب، بيتسمى إيه؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">An opt-in form that appears only when the visitor moves their mouse toward closing the tab is called what?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="exit"> نافذة نية المغادرة (Exit-intent popup)</label>
        <label><input type="radio" name="q1" value="checkout"> خانة عند الدفع</label>
        <label><input type="radio" name="q1" value="landing"> صفحة هبوط مخصصة</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="personal">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">في المثال المحلول، "نسيت حاجة في السلة 👀" حقق نسبة فتح أعلى من "خصم 20% على كل المنتجات" رغم إن الخصم عرض أقوى ظاهريًا. ليه؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">In the worked example, "you forgot something in your cart" beat "20% off everything" in open rate despite the discount being objectively stronger. Why?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="cheaper"> لأن الخصم كان مزيف</label>
        <label><input type="radio" name="q2" value="personal"> لأنه شخصي ومبني على سلوك العميل الفعلي، وأثار فضول محدد</label>
        <label><input type="radio" name="q2" value="shorter"> لأنه كان أقصر بحرف واحد بس</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ صمم تكتيك نمو + اختبار A/B / Design a Growth Tactic + an A/B Test</h3>
    <div class="ar">🇪🇬 اختار منتج وهمي مختلف عن أمثلة الدرس، وحدد: (1) أنهي نوع نموذج اشتراك هتستخدمه (نافذة مغادرة / داخل محتوى / صفحة هبوط / خانة دفع) ولماذا يناسب رحلة عميلك بالذات، (2) اكتب نسختين مختلفتين لعنوان إيميل واحد (subject line A/B test)، وفسّر توقعك لأنهي نسخة هتفوز واستنادًا لإيه من مبادئ الدرس (تخصيص، فضول، سياق شخصي).</div>
    <div class="en">🇬🇧 Pick a hypothetical product different from the lesson's examples, and decide: (1) which opt-in type you'd use (exit popup / in-content / landing page / checkout box) and why it fits your customer's journey specifically, (2) write two different versions of one email subject line (an A/B test), and explain which version you'd predict wins and based on which lesson principle (personalization, curiosity, personal context).</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 كل حاجة عملتها هنا (مغناطيس، تقسيم، سلسلة ترحيب) هدفها ياخد عميل محتمل لنقطة قرار الشراء بدون ما تحتاج تدفع فلوس إعلانات. لكن أحيانًا محتاج سرعة أكبر من كده — الدرس الجاي (الإعلانات المدفوعة) هيوريك إزاي تدفع عشان توصل لعميل لسه معندوش إيميلك أصلًا، وهيربط لك مفهوم "إعادة الاستهداف" بزوار موقعك اللي سابوا سلة بدون شراء — بالظبط زي مثال العنوان اللي شفته هنا.</div>
    <div class="en">🇬🇧 Everything you did here (magnet, segmentation, welcome sequence) aims to move a potential customer toward a purchase decision without spending ad money. But sometimes you need more speed than that — the next lesson (Paid Advertising) shows you how to pay to reach a customer who doesn't have your email yet, and connects to the "retargeting" concept for site visitors who abandoned a cart without buying — exactly like the subject-line example you just saw.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>المغناطيس لازم يكون قيمته واضحة فورًا ومرتبط بمنتجك، وموجود في المكان الصح (نافذة مغادرة، داخل محتوى، صفحة هبوط، أو خانة دفع).</li>
        <li>التقسيم بيمنع إرسال نفس الرسالة لعملاء في مراحل مختلفة تمامًا.</li>
        <li>سلسلة الترحيب الناجحة بتتبع ترتيب: قيمة → ثقة → طلب شراء.</li>
        <li>اختبار A/B بيثبت بالأرقام: عنوان شخصي ومثير للفضول غالبًا بيفوز على عرض عام أقوى ظاهريًا.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="social-media.php">← المرحلة السابقة</a>
    <a href="paid-ads.php">المرحلة الجاية / Next: Paid Ads →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
