<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'analytics';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'تحليلات التسويق';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">المرحلة 7 / Stage 7</span>
<h1>تحليلات التسويق <span class="ltr">Marketing Analytics</span></h1>
<p class="subtitle">من غير قياس، أي رأي عن حملتك هو مجرد تخمين. التحليلات هي اللي بتحول التسويق من فن لعلم.</p>

<div class="step-tracker">
    <a href="#read">📖 Read</a>
    <a href="#understand">🧠 Understand</a>
    <a href="#quiz">🧠 Quiz</a>
    <a href="#challenge">🛠️ Challenge</a>
    <a href="#project">🚀 Project</a>
</div>

<h2 id="read">الهدف / Goal</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 تفهم أهم مقاييس Google Analytics بدقة (الجلسات، معدل الارتداد، معدل التحويل)، تفهم فكرة قمع التحويل (conversion funnel)، تفهم أساسيات الإسناد (attribution) وليه القناة اللي بتقفل البيع مش دايمًا القناة اللي عملت الفرق الحقيقي، وتقدر تبني لوحة تقارير أسبوعية بسيطة بأهم 4-5 مقاييس بدل الاعتماد على مقاييس وهمية.</div>
    <div class="en">🇬🇧 Understand key Google Analytics metrics precisely (sessions, bounce rate, conversion rate), grasp the conversion funnel concept, understand attribution basics and why the channel that closes the sale isn't always the one that made the real difference, and be able to build a simple weekly reporting dashboard with 4-5 key metrics instead of relying on vanity metrics.</div>
</div>

<h2 id="understand">أساسيات Google Analytics / Google Analytics Basics</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>الجلسة (Session):</b> فترة تفاعل واحدة لزائر مع موقعك، بتنتهي بعد 30 دقيقة من عدم النشاط أو عند منتصف الليل. زائر واحد ممكن يعمل عدة جلسات في أيام مختلفة. <b>معدل الارتداد (Bounce Rate):</b> النسبة المئوية للجلسات اللي الزائر فيها شاف صفحة واحدة بس وغادر من غير أي تفاعل تاني (ضغطة، تمرير له معنى، انتقال لصفحة تانية). معدل ارتداد عالي جدًا (فوق 70% مثلًا لصفحة هبوط مخصصة لحملة) بيدل غالبًا على إن المحتوى ما طابقش توقع الزائر اللي جه من الإعلان أو نتيجة البحث. <b>معدل التحويل (Conversion Rate):</b> النسبة المئوية من الزوار اللي عملوا الهدف المطلوب (شراء، تسجيل إيميل، ملء نموذج) من إجمالي الزوار.</div>
    <div class="en">🇬🇧 <b>Session:</b> one period of interaction by a visitor with your site, ending after 30 minutes of inactivity or at midnight. One visitor can generate multiple sessions across different days. <b>Bounce Rate:</b> the percentage of sessions where the visitor viewed only one page and left without any further meaningful interaction (a click, meaningful scroll, or moving to another page). A very high bounce rate (say, above 70% on a dedicated campaign landing page) usually signals the content didn't match what the visitor expected from the ad or search result. <b>Conversion Rate:</b> the percentage of visitors who completed the desired goal (a purchase, email signup, form submission) out of total visitors.</div>
</div>

<h2>قمع التحويل / The Conversion Funnel</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 قمع التحويل هو تصور بصري لرحلة العميل من أول مرة يعرف بيك لحد ما يشتري، وكل مرحلة فيها بيقل فيها عدد الناس بشكل طبيعي (زي شكل القمع، واسع من فوق وضيق من تحت). المراحل الكلاسيكية: الوعي (Awareness — شاف إعلانك) → الاهتمام (Interest — دخل موقعك) → الرغبة (Desire — حط منتج في السلة) → الفعل (Action — دفع فعلًا). فايدة القمع إنه بيوريك بالظبط فين بتفقد الناس أكتر — لو 1000 زائر دخلوا الموقع و 300 حطوا منتج في السلة لكن 20 بس دفعوا، المشكلة مش في جذب الزوار، المشكلة في خطوة الدفع نفسها (سعر شحن مفاجئ، نموذج دفع معقد، إلخ).</div>
    <div class="en">🇬🇧 The conversion funnel is a visual representation of the customer's journey from first hearing about you to purchasing, and each stage naturally loses people (hence the funnel shape — wide at top, narrow at bottom). The classic stages: Awareness (saw your ad) → Interest (visited your site) → Desire (added a product to cart) → Action (actually paid). The funnel's value is showing exactly where you're losing people most — if 1,000 visitors land on the site and 300 add to cart but only 20 pay, the problem isn't attracting visitors, it's the checkout step itself (a surprise shipping fee, a complicated payment form, etc.).</div>
</div>

<h2>أساسيات الإسناد: آخر نقرة مقابل أول نقرة / Attribution Basics: Last-Click vs First-Click</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 نادرًا ما يشتري عميل من أول لمسة. الرحلة الحقيقية غالبًا بتمر بأكتر من قناة قبل الشراء — شاف إعلان على Instagram، بعد أسبوع دور على اسم البراند في جوجل، وفي الآخر ضغط على إيميل عرض واشترى. <b>الإسناد (Attribution)</b> هو نموذج بيحدد "أنهي قناة تستاهل الفضل" في البيعة دي. <b>إسناد آخر نقرة (Last-click):</b> النموذج الافتراضي في أغلب الأدوات — بيدي 100% من الفضل لآخر قناة قبل الشراء (هنا: الإيميل). <b>إسناد أول نقرة (First-click):</b> بيدي 100% من الفضل لأول قناة عرّفت العميل بيك (هنا: إعلان Instagram). المشكلة: الاتنين بيتجاهلوا باقي الرحلة تمامًا.</div>
    <div class="en">🇬🇧 A customer rarely buys on the very first touch. The real journey often crosses several channels before purchase — saw an Instagram ad, searched the brand name on Google a week later, and finally clicked an email offer and bought. <b>Attribution</b> is a model deciding "which channel deserves credit" for that sale. <b>Last-click attribution:</b> the default model in most tools — gives 100% of the credit to the last channel before purchase (here: the email). <b>First-click attribution:</b> gives 100% of the credit to the first channel that introduced the customer to you (here: the Instagram ad). The problem: both completely ignore the rest of the journey.</div>
</div>

<h2>مثال محلول: نفس الرحلة، فضل مختلف تمامًا / Worked Example: Same Journey, Completely Different Credit</h2>
<div class="output-box">رحلة العميل الفعلية:
   يوم 1: شاف إعلان Meta على Instagram (اكتشاف أول مرة)
   يوم 8: دور على اسم البراند في جوجل (تأكيد وبحث)
   يوم 10: ضغط على إيميل فيه عرض خصم، واشترى

إسناد Last-click: الإيميل ياخد 100% من الفضل. Instagram وGoogle = 0%.
إسناد First-click: إعلان Instagram ياخد 100% من الفضل. الإيميل وGoogle = 0%.</div>
<div class="bi-block">
    <div class="ar">🇪🇬 ليه الفرق ده خطير؟ لو الشركة بتحلل بنموذج Last-click بس، هتشوف إن حملة Instagram "معملتش أي مبيعات" (0% فضل) وهتقرر توقفها لتوفير الميزانية — رغم إنها فعليًا كانت سبب اكتشاف العميل للبراند من الأساس، ومن غيرها ماكانش هيدور على البراند في جوجل ولا هيفتح الإيميل. القرار الصح هنا مش الاعتماد على نموذج واحد بس، لازم تسأل "لو شلت القناة دي، هل الرحلة كلها كانت هتحصل؟" — ده أساس التفكير في نماذج الإسناد متعددة اللمسات (multi-touch attribution) اللي بتوزع الفضل على كل القنوات بدل ما تدّيه لواحدة بس.</div>
    <div class="en">🇬🇧 Why is this difference dangerous? If a company only analyzes with a Last-click model, it'll see the Instagram campaign "generated zero sales" (0% credit) and decide to cut it to save budget — even though it was actually why the customer discovered the brand at all, and without it they'd never have searched the brand on Google or opened the email. The right approach isn't relying on one model alone — ask "if I removed this channel, would the whole journey have happened?" This is the basis of multi-touch attribution models, which spread credit across every channel instead of giving it all to one.</div>
</div>

<h2>بناء لوحة تقارير أسبوعية / Building a Weekly Reporting Dashboard</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 مراجعة عشوائية لأي رقم يظهر قدامك مش تقرير — تقرير أسبوعي مفيد بيركز على 4-5 مقاييس ثابتة بس، متكررة كل أسبوع، عشان تقدر تقارن الاتجاه (trend) بمرور الوقت. اختيار المقاييس دي بيعتمد على هدف البيزنس، لكن مجموعة قوية شائعة:</div>
</div>
<div class="output-box">لوحة تقارير أسبوعية مقترحة لمتجر أونلاين:

1. الجلسات (Sessions) — هل حجم الزوار عمومًا بيزيد أو بينقص؟
2. معدل التحويل (Conversion Rate) — هل نفس الزوار بيشتروا أكتر أو أقل؟
3. تكلفة الاكتساب CPA (لو فيه إعلانات) — هل بنكتسب عملاء بكفاءة؟
4. الإيرادات (Revenue) — الرقم النهائي اللي كل حاجة تانية بتخدمه
5. معدل الارتداد على صفحات الهبوط الرئيسية — مؤشر مبكر على مشكلة في التجربة قبل ما تأثر على الإيرادات</div>
<div class="bi-block">
    <div class="ar">🇪🇬 كل مقياس هنا بيجاوب سؤال مختلف: الجلسات = "هل بنجذب ناس؟"، معدل التحويل = "هل بنقنعهم؟"، CPA = "هل التكلفة معقولة؟"، الإيرادات = "هل ده كله بيترجم لفلوس؟"، ومعدل الارتداد = "فين ممكن نلاقي مشكلة قبل ما تكبر؟". لو ركزت بس على مقياس واحد (زي الجلسات) هتفوتك الصورة الكاملة — جلسات زايدة مع إيرادات ثابتة معناها إنك بتجذب زوار مش مهتمين فعلًا.</div>
    <div class="en">🇬🇧 Each metric here answers a different question: Sessions = "are we attracting people?", Conversion Rate = "are we convincing them?", CPA = "is the cost reasonable?", Revenue = "is all this translating into money?", and Bounce Rate = "where might a problem be hiding before it grows?". Focusing on just one metric (like Sessions) misses the full picture — rising sessions with flat revenue means you're attracting visitors who aren't genuinely interested.</div>
</div>

<h2>مثال محلول: تحديد KPI ذو معنى / Worked Example: Defining a Meaningful KPI</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 تخيل عندك متجر أونلاين وهدفك الشهر ده هو زيادة المبيعات. المقياس الوهمي السهل هو "عدد زيارات الموقع" — ده بيحسسك بتقدم بس معندوش علاقة مباشرة بالمبيعات. الـ KPI ذو المعنى هنا هو معدل التحويل من "إضافة للسلة" إلى "دفع فعلي" (cart-to-purchase rate)، لأنه بيقيس بالظبط الخطوة اللي بتحول اهتمام لفلوس فعلية.</div>
</div>
<div class="output-box">مقياس وهمي: 5000 زيارة للموقع هذا الشهر (لا يوضح شيئًا عن الإيرادات).

KPI ذو معنى: معدل التحويل من السلة للدفع.
الشهر الماضي: 300 إضافة للسلة → 30 عملية دفع = 10% معدل تحويل.
هذا الشهر (بعد تبسيط صفحة الدفع): 300 إضافة للسلة → 51 عملية دفع = 17% معدل تحويل.

النتيجة: نفس عدد الزوار بالضبط، لكن الإيرادات زادت 70% لأننا حسّنا الخطوة الصحيحة.</div>
<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ إن الـ KPI ده مرتبط مباشرة بهدف العمل (زيادة المبيعات)، وقابل للقياس بدقة، وبيوريك فعل واضح تقدر تاخده (تبسيط صفحة الدفع) — دي الصفات التلاتة اللي لازم تدور عليها في أي KPI: مرتبط بالهدف، قابل للقياس، وقابل للتصرف بناءً عليه.</div>
    <div class="en">🇬🇧 Notice this KPI is directly tied to the business goal (increasing sales), precisely measurable, and points to a clear action you can take (simplify checkout) — these are the three qualities to look for in any KPI: goal-relevant, measurable, and actionable.</div>
</div>

<div class="recap-box">
    <h3>🗺️ خريطة المقاييس الأساسية / Core Metrics Map</h3>
    <ul>
        <li><b>الجلسة:</b> فترة تفاعل واحدة، بتنتهي بعد 30 دقيقة خمول.</li>
        <li><b>معدل الارتداد:</b> نسبة الزوار اللي غادروا من صفحة واحدة بدون تفاعل.</li>
        <li><b>معدل التحويل:</b> نسبة الزوار اللي حققوا الهدف من إجمالي الزوار.</li>
        <li><b>قمع التحويل:</b> وعي → اهتمام → رغبة → فعل — يوريك فين بتفقد الناس أكتر.</li>
        <li><b>الإسناد:</b> Last-click وFirst-click بيديو فضل 100% لقناة واحدة فقط ويتجاهلوا الباقي — احذر قرارات ميزانية مبنية على نموذج واحد بس.</li>
        <li><b>لوحة أسبوعية:</b> 4-5 مقاييس ثابتة تجاوب أسئلة مختلفة (جذب، إقناع، تكلفة، إيراد، تحذير مبكر).</li>
        <li><b>KPI جيد:</b> مرتبط بالهدف + قابل للقياس + قابل للتصرف بناءً عليه — مش مجرد عدد زيارات.</li>
    </ul>
</div>

<div class="exercise-box">
    <h3>✍️ تمرين عملي / Hands-on Exercise</h3>
    <div class="ar">🇪🇬 تخيل موقعك استقبل 2000 زائر، منهم 400 دخلوا صفحة منتج معين، ومنهم 60 بس حطوا المنتج في السلة، ومنهم 8 بس دفعوا. ارسم قمع التحويل بالأرقام دي، وحدد: في أنهي مرحلة بتفقد أكبر نسبة من الناس؟ واقترح KPI واحد ذو معنى (مش وهمي) لتتبع تحسّن هذه المرحلة بالذات الشهر الجاي.</div>
    <div class="en">🇬🇧 Suppose your site got 2,000 visitors, 400 of whom viewed a specific product page, 60 of whom added it to cart, and only 8 of whom paid. Map the conversion funnel with these numbers, and identify: at which stage do you lose the highest percentage of people? Propose one meaningful (not vanity) KPI to track improvement at that specific stage next month.</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="zero">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">عميل شاف إعلان Instagram، وبعدين بحث عن البراند في جوجل، وفي الآخر اشترى من خلال إيميل. حسب نموذج Last-click، كام % فضل ياخده إعلان Instagram؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">A customer saw an Instagram ad, then searched the brand on Google, then bought via an email link. Under Last-click attribution, what % credit does the Instagram ad get?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="hundred"> 100%</label>
        <label><input type="radio" name="q1" value="zero"> 0%</label>
        <label><input type="radio" name="q1" value="fifty"> 50%</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="checkout">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">موقع فيه 1000 زائر، 300 حطوا منتج في السلة، لكن 20 بس دفعوا. أنهي مرحلة في القمع محتاجة تحسين فوري؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">A site has 1,000 visitors, 300 add to cart, but only 20 pay. Which funnel stage needs urgent improvement?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="awareness"> جذب زوار جدد (Awareness)</label>
        <label><input type="radio" name="q2" value="checkout"> خطوة الدفع نفسها (السلة → الدفع)</label>
        <label><input type="radio" name="q2" value="none"> مفيش حاجة تحتاج تحسين</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ حلل رحلة عميل بأكتر من نموذج إسناد / Analyze a Customer Journey with Multiple Attribution Models</h3>
    <div class="ar">🇪🇬 اخترع رحلة عميل بثلاث لمسات مختلفة عبر ثلاث قنوات (زي: فيديو TikTok → مقال مدونة → إعلان Google أدى للشراء). احسب الفضل حسب Last-click وحسب First-click، وحدد: لو الشركة اعتمدت على Last-click بس، أنهي قناة هتُظلم (تاخد 0% رغم دورها الحقيقي)؟ ثم صمم لوحة تقارير أسبوعية بـ 5 مقاييس لمتجر وهمي يبيع منتج مختلف عن أمثلة الدرس، واشرح سطر واحد لكل مقياس ليه اخترته.</div>
    <div class="en">🇬🇧 Invent a customer journey with three different touches across three channels (e.g.: TikTok video → blog article → Google ad leading to purchase). Calculate credit under Last-click and under First-click, and identify: if the company relied on Last-click alone, which channel gets unfairly zeroed out despite its real role? Then design a 5-metric weekly dashboard for a hypothetical store selling a product different from the lesson's examples, explaining in one line per metric why you chose it.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 الأرقام وحدها مش كفاية — لازم تتحول لكلام مقنع يخلي حد يتخذ قرار (يشتري، يوافق على ميزانية، يثق فيك). الدرس الجاي (الكتابة الإعلانية) هيوريك إزاي تاخد نفس الفهم العميق للعميل اللي بنيته هنا من التحليلات، وتحوله لكلام بيقنع فعليًا.</div>
    <div class="en">🇬🇧 Numbers alone aren't enough — they need to turn into persuasive language that makes someone act (buy, approve a budget, trust you). The next lesson (Copywriting) shows you how to take the same deep customer understanding you built here through analytics, and turn it into language that actually persuades.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>الجلسة، معدل الارتداد، ومعدل التحويل هي أساس قراءة أي موقع.</li>
        <li>قمع التحويل بيوريك بالظبط فين العميل بيسيبك، مش مجرد "قلة مبيعات" عامة.</li>
        <li>نماذج الإسناد (Last-click/First-click) بتديك صورة جزئية بس — القناة اللي "معملتش مبيعات" ظاهريًا ممكن تكون سبب كل الرحلة.</li>
        <li>لوحة تقارير أسبوعية قوية = 4-5 مقاييس ثابتة تجاوب: جذب، إقناع، تكلفة، إيراد، وتحذير مبكر.</li>
        <li>KPI ذو معنى لازم يكون مرتبط بالهدف، قابل للقياس، وقابل للتصرف بناءً عليه — مش مجرد عدد زيارات.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="paid-ads.php">← المرحلة السابقة</a>
    <a href="copywriting.php">المرحلة الجاية / Next: Copywriting →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
