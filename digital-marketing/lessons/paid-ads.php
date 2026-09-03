<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'paid-ads';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'الإعلانات المدفوعة';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">المرحلة 6 / Stage 6</span>
<h1>الإعلانات المدفوعة <span class="ltr">Paid Advertising</span></h1>
<p class="subtitle">Google Ads وMeta Ads بيشتغلوا بمنطق مختلف تمامًا — الأول بيلحق نية بحث موجودة، والتاني بيقاطع اهتمام قبل ما يظهر. وفي الاتنين، الفوز في المزاد مش بس مين بيدفع أكتر.</p>

<div class="step-tracker">
    <a href="#read">📖 Read</a>
    <a href="#understand">🧠 Understand</a>
    <a href="#quiz">🧠 Quiz</a>
    <a href="#challenge">🛠️ Challenge</a>
    <a href="#project">🚀 Project</a>
</div>

<h2 id="read">الهدف / Goal</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 تفهم الفرق الجوهري بين Google Ads وMeta Ads، تفهم إزاي مزاد الإعلانات فعليًا بيشتغل (مش مين بيدفع أكتر بس)، تفرّق بين الاستهداف البارد وإعادة الاستهداف (retargeting)، وتقدر تحسب أرقام بسيطة زي تكلفة النقرة (CPC) وتكلفة الاكتساب (CPA) من ميزانية افتراضية.</div>
    <div class="en">🇬🇧 Understand the fundamental difference between Google Ads and Meta Ads, understand how the ad auction actually works (not just who pays more), distinguish cold targeting from retargeting, and be able to calculate simple numbers like cost-per-click (CPC) and cost-per-acquisition (CPA) from a hypothetical budget.</div>
</div>

<h2 id="understand">Google Ads: نية البحث / Google Ads: Search Intent</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 Google Ads بيعتمد على "نية البحث" (search intent) — العميل نفسه بيكتب كلمة في جوجل عن حاجة محتاج يشتريها أو يعرفها دلوقتي، وإعلانك بيظهر فوق النتائج العادية بالظبط وقت الحاجة دي. الإعلان بيتحدد ظهوره بمزايدة (bidding) على كلمات مفتاحية: كل مرة حد يدور على كلمة اشتريتها (زي "شراء لابتوب جيمنج")، بيحصل مزاد لحظي بين كل المعلنين اللي اختاروا نفس الكلمة، والفايز (بناءً على قيمة المزايدة + جودة الإعلان) هو اللي يظهر.</div>
    <div class="en">🇬🇧 Google Ads relies on "search intent" — the customer themselves types a query into Google about something they need to buy or know right now, and your ad appears above the normal results at exactly that moment of need. Ad visibility is decided by bidding on keywords: every time someone searches a keyword you've targeted (like "buy gaming laptop"), an instant auction runs among every advertiser targeting that keyword, and the winner (based on bid amount plus ad quality) is the one shown.</div>
</div>

<h2>مزاد الإعلانات: نقاط الجودة مش بس أعلى سعر / The Ad Auction: Quality Score, Not Just the Highest Bid</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 غلطة شائعة جدًا إن "اللي بيدفع أكتر هو اللي بيفوز". الحقيقة إن Google Ads بيحسب "ترتيب الإعلان" (Ad Rank) بالمعادلة: <b>Ad Rank = المزايدة (Bid) × نقاط الجودة (Quality Score)</b>. نقاط الجودة (من 1 إلى 10) بتقيس مدى ملاءمة إعلانك وصفحة الهبوط لكلمة البحث ونسبة النقر المتوقعة — يعني إعلان مكتوب كويس ورابط لصفحة مناسبة فعلًا بيقدر يهزم منافس بيدفع أكتر منه لكن إعلانه وصفحته ضعيفين. في Meta Ads المنطق مشابه باسم "درجة الملاءمة" أو "ترتيب جودة الإعلان" (Ad Relevance/Quality Ranking) — إعلان بيلاقي تفاعل كويس من الجمهور المستهدف بيكلفك أقل لكل 1000 ظهور (CPM) من إعلان ضعيف حتى لو نفس الميزانية بالظبط.</div>
    <div class="en">🇬🇧 A very common mistake is thinking "whoever pays more wins." The reality is Google Ads calculates "Ad Rank" as: <b>Ad Rank = Bid × Quality Score</b>. Quality Score (1 to 10) measures how relevant your ad and landing page are to the search term, plus expected click-through rate — meaning a well-written ad linking to a genuinely relevant page can beat a competitor paying more but with a weaker ad and page. Meta Ads works on similar logic called "Ad Relevance" or "Quality Ranking" — an ad that gets good engagement from its target audience costs you less per 1,000 impressions (CPM) than a weak ad, even with the exact same budget.</div>
</div>

<h2>مثال محلول: حساب Ad Rank لمعلنين متنافسين / Worked Example: Calculating Ad Rank for Competing Advertisers</h2>
<div class="output-box">المعلن أ: مزايدة 5 جنيه للنقرة × نقاط جودة 8 = Ad Rank = 40
المعلن ب: مزايدة 8 جنيه للنقرة × نقاط جودة 3 = Ad Rank = 24

النتيجة: المعلن (أ) يفوز بالظهور رغم إنه دافع أقل من (ب)!</div>
<div class="bi-block">
    <div class="ar">🇪🇬 المعلن (أ) فاز لأن إعلانه أكثر ملاءمة (نقاط جودة أعلى)، وده معناه Google واثق إن ناس أكتر هتضغط عليه وهيحققلهم تجربة أفضل. الفايدة العملية: تحسين نقاط الجودة (بكتابة إعلان دقيق مرتبط بالكلمة المفتاحية، وربطه بصفحة هبوط سريعة ومطابقة للوعد) ممكن يقلل تكلفة النقرة الفعلية اللي بتدفعها، مش بس يرفع ترتيبك — يعني الجودة بتوفر فلوس فعليًا، مش مجرد "تحسين شكلي".</div>
    <div class="en">🇬🇧 Advertiser (A) won because their ad is more relevant (higher Quality Score), signaling to Google that more people will click it and have a better experience. The practical benefit: improving Quality Score (by writing an ad tightly matched to the keyword, linking to a fast landing page that matches the promise) can actually lower the real cost-per-click you pay, not just raise your ranking — quality genuinely saves money, it's not just a cosmetic improvement.</div>
</div>

<h2>Meta Ads: الاستهداف بالاهتمامات والسلوك / Meta Ads: Interest &amp; Behavior Targeting</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 على عكس Google، مفيش حد بيكتب "عايز أشتري كوتش رياضي" في فيسبوك أو انستجرام. Meta Ads بيشتغل بمنطق "المقاطعة": بيستهدف ناس بناءً على اهتماماتهم وسلوكهم (صفحات بيتابعوها، منتجات اتفاعلوا معاها قبل كده، بيانات ديموغرافية) وبيظهرلهم الإعلان وسط فيدهم العادي، من غير ما يكونوا بيدوروا على المنتج ده دلوقتي. ده معناه إعلانات Meta غالبًا بتحتاج تلفت الانتباه بصريًا بشكل أقوى، لأن العميل مش في وضع "بحث نشط" زي جوجل.</div>
    <div class="en">🇬🇧 Unlike Google, nobody types "I want to buy running shoes" into Facebook or Instagram. Meta Ads works on an "interruption" logic: it targets people based on their interests and behavior (pages they follow, products they've engaged with, demographic data) and shows the ad inside their normal feed, without them actively searching for that product right now. This means Meta ads generally need to grab visual attention more strongly, since the customer isn't in an "active search" mindset like on Google.</div>
</div>

<h2>الاستهداف البارد مقابل إعادة الاستهداف / Cold Targeting vs Retargeting</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>الاستهداف البارد (Cold Targeting)</b> معناه عرض إعلانك لناس محدش منهم زار موقعك أو سمع عنك قبل كده — بيعتمد بس على الاهتمامات والبيانات الديموغرافية، ومعدل التحويل فيه منخفض عادة لأن الثقة صفر. <b>إعادة الاستهداف (Retargeting/Remarketing)</b> بالعكس تمامًا: بيستهدف بس ناس زارت موقعك بالفعل، أو حطت منتج في السلة، أو شافت فيديو منك، لكن ماكملتش الشراء. بيشتغل عن طريق "بكسل تتبع" (tracking pixel) بيتحط في موقعك بيسجل الزوار دول، وبعدين تعرض عليهم إعلان مخصص يفكّرهم بالمنتج اللي شافوه أو حطوه في السلة.</div>
    <div class="en">🇬🇧 <b>Cold Targeting</b> means showing your ad to people who never visited your site or heard of you before — it relies purely on interests and demographics, and conversion rate is usually low since trust is zero. <b>Retargeting/Remarketing</b> is the opposite: it targets only people who already visited your site, added a product to cart, or watched a video from you, but didn't complete a purchase. It works via a "tracking pixel" placed on your site that logs these visitors, then shows them a custom ad reminding them of the exact product they viewed or added to cart.</div>
</div>

<div class="flow-diagram">
    <div class="flow-box">Cold Audience</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">Ad → Website Visit</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">No Purchase (Pixel Logs Visitor)</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">Retargeting Ad Shown</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">Purchase</div>
</div>

<h2>مثال محلول: استهداف بارد مقابل إعادة استهداف بالأرقام / Worked Example: Cold vs Retargeting by the Numbers</h2>
<div class="output-box">حملة استهداف بارد:
   الميزانية: 1000 جنيه، 10,000 ظهور، نسبة نقر 1% = 100 نقرة، 2 عملية شراء
   CPA = 1000 ÷ 2 = 500 جنيه للعميل

حملة إعادة استهداف (لنفس الميزانية، لكن لزوار سابقين شافوا المنتج):
   الميزانية: 1000 جنيه، 3,000 ظهور فقط (جمهور أصغر)، نسبة نقر 4.5% = 135 نقرة، 14 عملية شراء
   CPA = 1000 ÷ 14 ≈ 71 جنيه للعميل</div>
<div class="bi-block">
    <div class="ar">🇪🇬 نفس الميزانية بالظبط، لكن CPA حملة إعادة الاستهداف أقل بأكتر من 7 أضعاف. السبب: الجمهور في إعادة الاستهداف عنده ثقة وسبق تفاعل بالفعل (شافوا المنتج، عرفوا السعر، فكروا فيه)، فمحتاجين بس "تذكير" أو دفعة أخيرة (زي خصم بسيط)، بينما الجمهور البارد لسه محتاج يتعرف على المنتج من الصفر بالكامل. القاعدة العملية: خصص جزء من ميزانيتك دايمًا لإعادة الاستهداف حتى لو صغير، لأنه غالبًا بيكون أرخص مصدر للمبيعات الفعلية.</div>
    <div class="en">🇬🇧 The exact same budget, but the retargeting campaign's CPA is more than 7x lower. Why: the retargeting audience already has trust and prior interaction (they saw the product, knew the price, considered it), so they just need a "reminder" or a final nudge (like a small discount), while the cold audience still needs to learn about the product from zero. Practical rule: always allocate part of your budget to retargeting even if small, since it's usually your cheapest source of actual sales.</div>
</div>

<h2>أساسيات الميزانية والمزايدة / Budget &amp; Bidding Basics</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 أهم مصطلحين لازم تفهمهم: CPC (تكلفة النقرة الواحدة — Cost Per Click) هو المبلغ اللي بتدفعه في المتوسط كل ما حد يضغط على إعلانك. CPA (تكلفة الاكتساب — Cost Per Acquisition) هو المبلغ اللي بتدفعه في المتوسط عشان تحصل على عميل فعلي (اشترى أو سجل)، مش بس ضغط. CPA دايمًا أعلى من CPC لأن مش كل نقرة بتتحول لعملية شراء.</div>
    <div class="en">🇬🇧 The two most important terms: CPC (Cost Per Click) is the average amount you pay each time someone clicks your ad. CPA (Cost Per Acquisition) is the average amount you pay to get one actual customer (a purchase or signup), not just a click. CPA is always higher than CPC because not every click converts into a purchase.</div>
</div>

<h2>مثال محلول: حساب CPC وCPA من ميزانية صغيرة / Worked Example: Calculating CPC &amp; CPA from a Small Budget</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 تخيل صرفت 1000 جنيه على حملة إعلانية، وجابتلك 500 نقرة، ومن الـ 500 نقرة دول 20 شخص اشتروا فعلًا. احسب:</div>
</div>
<div class="output-box">الميزانية: 1000 جنيه
عدد النقرات: 500 نقرة
عدد المشتريات (التحويلات): 20 عملية شراء

CPC = الميزانية ÷ عدد النقرات = 1000 ÷ 500 = 2 جنيه لكل نقرة

CPA = الميزانية ÷ عدد المشتريات = 1000 ÷ 20 = 50 جنيه لكل عميل

معدل التحويل (Conversion Rate) = (المشتريات ÷ النقرات) × 100 = (20 ÷ 500) × 100 = 4%</div>
<div class="bi-block">
    <div class="ar">🇪🇬 الأرقام دي بتوريك حاجة مهمة: لو المنتج بيتباع بـ 80 جنيه ربح صافي للقطعة، فالحملة ناجحة لأن CPA (50 جنيه) أقل من الربح (80 جنيه). لكن لو ربح القطعة 30 جنيه بس، الحملة دي فعليًا بتخسرك فلوس رغم إنها "جابت مبيعات" — وده بالظبط ليه لازم تحسب CPA مش بس تفرح بعدد المبيعات الخام.</div>
    <div class="en">🇬🇧 These numbers reveal something important: if the product's net profit per unit is 80 EGP, the campaign is profitable because CPA (50 EGP) is less than the profit (80 EGP). But if profit per unit is only 30 EGP, this campaign is actually losing you money despite "generating sales" — which is exactly why you must calculate CPA instead of just celebrating raw sales counts.</div>
</div>

<div class="recap-box">
    <h3>🗺️ خريطة Google مقابل Meta / Google vs Meta Map</h3>
    <ul>
        <li><b>Google Ads:</b> يلحق نية بحث موجودة بالفعل — مناسب لمنتج العميل بيدور عليه بنفسه.</li>
        <li><b>Meta Ads:</b> يقاطع اهتمام قبل ما يظهر — مناسب لمنتج بصري جديد العميل ممكن يكتشفه بالصدفة.</li>
        <li><b>Ad Rank = Bid × Quality Score:</b> الجودة ممكن تخلي معلن بميزانية أقل يفوز، وبيقلل تكلفة النقرة الفعلية.</li>
        <li><b>الاستهداف البارد:</b> جمهور جديد، ثقة صفر، CPA أعلى عادة.</li>
        <li><b>إعادة الاستهداف:</b> زوار سابقين، ثقة موجودة بالفعل، CPA أقل بكتير عادة.</li>
        <li><b>CPC:</b> تكلفة النقرة الواحدة. <b>CPA:</b> تكلفة العميل الفعلي — المقياس الحقيقي اللي يحدد لو الحملة رابحة أو خسرانة.</li>
    </ul>
</div>

<div class="exercise-box">
    <h3>✍️ تمرين عملي / Hands-on Exercise</h3>
    <div class="ar">🇪🇬 تخيل عندك ميزانية 2000 جنيه، وحملتك جابت 800 نقرة و 25 عملية شراء. احسب CPC وCPA ومعدل التحويل. بعد كده حدد: هل تختار Google Ads ولا Meta Ads لمنتج "برنامج محاسبة للشركات الصغيرة"؟ ولمنتج "إكسسوارات موبايل ملونة"؟ وضّح السبب لكل قرار.</div>
    <div class="en">🇬🇧 Suppose you have a 2000 EGP budget, and your campaign generated 800 clicks and 25 purchases. Calculate CPC, CPA, and conversion rate. Then decide: would you choose Google Ads or Meta Ads for a "small business accounting software" product? And for "colorful phone accessories"? Explain your reasoning for each choice.</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="a">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">معلن (أ) بيدفع 5 جنيه بنقاط جودة 8، ومعلن (ب) بيدفع 8 جنيه بنقاط جودة 3. مين هيفوز بالظهور حسب معادلة Ad Rank؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Advertiser (A) bids 5 EGP with Quality Score 8, advertiser (B) bids 8 EGP with Quality Score 3. Who wins the impression per the Ad Rank formula?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="a"> المعلن (أ) — Ad Rank = 40 مقابل 24</label>
        <label><input type="radio" name="q1" value="b"> المعلن (ب) — لأنه بيدفع مبلغ أعلى</label>
        <label><input type="radio" name="q1" value="tie"> بيتعادلوا دايمًا في هذه الحالة</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="retarget">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">في المثال المحلول، أنهي نوع حملة حقق CPA أقل بأكتر من 7 أضعاف بنفس الميزانية؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">In the worked example, which campaign type achieved over 7x lower CPA on the same budget?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="cold"> الاستهداف البارد</label>
        <label><input type="radio" name="q2" value="retarget"> إعادة الاستهداف (Retargeting)</label>
        <label><input type="radio" name="q2" value="same"> كانا متساويين تمامًا</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ احسب Ad Rank وصمم إعلان إعادة استهداف / Calculate Ad Rank and Design a Retargeting Ad</h3>
    <div class="ar">🇪🇬 (1) عندك ثلاث معلنين: أ (مزايدة 4 جنيه، جودة 9)، ب (مزايدة 10 جنيه، جودة 2)، ج (مزايدة 6 جنيه، جودة 5). احسب Ad Rank للثلاثة وحدد الترتيب النهائي للظهور. (2) اختار منتج وهمي، وصمم إعلان إعادة استهداف واحد (نص قصير) لزائر شاف المنتج وحط في السلة بس ماشتراش، موضّحًا إزاي الإعلان ده يختلف عن إعلان استهداف بارد لنفس المنتج.</div>
    <div class="en">🇬🇧 (1) You have three advertisers: A (bid 4 EGP, quality 9), B (bid 10 EGP, quality 2), C (bid 6 EGP, quality 5). Calculate Ad Rank for all three and determine the final display order. (2) Pick a hypothetical product, and design one retargeting ad (short copy) for a visitor who viewed the product and added it to cart but didn't buy, explaining how it differs from a cold-targeting ad for the same product.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 حسبت أرقام الحملة، بس الأرقام دي معناها إيه فعليًا؟ الدرس الجاي (التحليلات) هيوريك إزاي تقرا نفس الأرقام دي (CPC، CPA، معدل التحويل) جوه لوحة تحكم حقيقية زي Google Analytics، وتفهم رحلة العميل الكاملة من أول ما شاف الإعلان لحد ما اشترى فعلًا.</div>
    <div class="en">🇬🇧 You calculated campaign numbers, but what do they actually mean in context? The next lesson (Analytics) shows you how to read these same numbers (CPC, CPA, conversion rate) inside a real dashboard like Google Analytics, and understand the customer's full journey from first seeing the ad to actually buying.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>Google Ads = نية بحث موجودة، Meta Ads = استهداف اهتمامات وسلوك.</li>
        <li>الفوز في المزاد = Bid × Quality Score، مش أعلى سعر بس — الجودة بتوفر فلوس فعليًا.</li>
        <li>إعادة الاستهداف (زوار سابقين) عادة أرخص بكتير وأعلى تحويلًا من الاستهداف البارد (جمهور جديد).</li>
        <li>CPC = تكلفة النقرة، CPA = تكلفة العميل الفعلي — CPA هو المقياس الأهم للربحية.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="email-marketing.php">← المرحلة السابقة</a>
    <a href="analytics.php">المرحلة الجاية / Next: Analytics →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
