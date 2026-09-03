<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'copywriting';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'الكتابة الإعلانية المقنعة';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">المرحلة 8 / Stage 8</span>
<h1>الكتابة الإعلانية المقنعة <span class="ltr">Persuasive Copywriting</span></h1>
<p class="subtitle">إعلان بميزانية ضخمة وكلام ضعيف هيفشل. إعلان بميزانية صغيرة وكلام مقنع ممكن يبيع أكتر بكتير.</p>

<div class="step-tracker">
    <a href="#read">📖 Read</a>
    <a href="#understand">🧠 Understand</a>
    <a href="#quiz">🧠 Quiz</a>
    <a href="#challenge">🛠️ Challenge</a>
    <a href="#project">🚀 Project</a>
</div>

<h2 id="read">الهدف / Goal</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 تفهم الفرق الجوهري بين الخصائص (Features) والفوائد (Benefits) وتقدر تحول أي خاصية لجملة مقنعة، تتعرف على صيغ عناوين جاهزة ومجربة، تفهم إطار AIDA بدقة وتقدر تطبقه في إعلان كامل، وتتعرف على مكونات دعوة الفعل (Call-to-Action) القوية.</div>
    <div class="en">🇬🇧 Understand the fundamental difference between Features and Benefits and be able to turn any feature into a persuasive sentence, learn proven headline formulas, understand the AIDA framework precisely and apply it in a full ad, and learn what makes a strong call-to-action.</div>
</div>

<h2 id="understand">الخصائص مقابل الفوائد / Features vs Benefits</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>الخاصية (Feature)</b> هي حقيقة تقنية عن المنتج — إيه اللي المنتج عنده أو بيعمله. <b>الفايدة (Benefit)</b> هي النتيجة اللي العميل فعليًا هيحس بيها في حياته بسبب الخاصية دي. الغلطة الأشهر في الكتابة الإعلانية إنك تسرد خصائص وتفترض إن العميل هيربطها بنفسه بفايدة — لكن العميل مش بيشتري "Bluetooth 5.3"، هو بيشتري "أسمع أغانيا من غير ما أقلق من قطع الاتصال وأنا بجري". القاعدة العملية: لكل خاصية، اسأل "وبعدين؟ ده هيفرق إيه في يوم العميل الفعلي؟" لحد ما توصل لإحساس أو نتيجة ملموسة.</div>
    <div class="en">🇬🇧 A <b>Feature</b> is a technical fact about the product — what it has or does. A <b>Benefit</b> is the outcome the customer actually feels in their life because of that feature. The most common copywriting mistake is listing features and assuming the customer will connect the dots to a benefit themselves — but a customer doesn't buy "Bluetooth 5.3," they buy "listening to my music while running without worrying about it cutting out." The practical rule: for every feature, ask "so what? what does this actually change in the customer's real day?" until you reach a tangible feeling or outcome.</div>
</div>

<h2>مثال محلول: تحويل قائمة خصائص لكلام يبيع / Worked Example: Converting a Feature List into Benefit-Driven Copy</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 المنتج: سماعات أذن لاسلكية. قائمة الخصائص التقنية زي ما هي مكتوبة في أي مواصفات تقنية، وتحويلها لكلام مقنع:</div>
</div>
<div class="output-box">❌ خاصية: Bluetooth 5.3
✅ فايدة: "اتصال ثابت حتى وانت بتجري في الشارع — من غير قطع مفاجئ يبوظ تركيزك."

❌ خاصية: بطارية تدوم 30 ساعة
✅ فايدة: "اشحنها الأحد، وانساها لحد الأحد اللي بعده — أسبوع كامل من المشاوير من غير ما تدور على شاحن."

❌ خاصية: مقاومة للماء IPX4
✅ فايدة: "اتمرن في الجيم أو تحت المطر من غير أي قلق — العرق والرذاذ مش هيبوظوها."

❌ خاصية: إلغاء ضوضاء نشط (ANC)
✅ فايدة: "اقفل صوت المترو أو الشارع، وخش في أغانيك أو مكالمتك من غير أي تشتيت."</div>
<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ النمط في كل تحويلة: الخاصية بتوصف "المنتج"، والفايدة بتوصف "حياة العميل بعد ما يستخدم المنتج". العميل مش خبير تقني غالبًا ومش هيقدر يترجم "IPX4" بنفسه لـ"أقدر أتمرن تحتها"، فشغلانتك ككاتب إعلاني إنك تعمل الترجمة دي بدل ما تتوقع منه يعملها.</div>
    <div class="en">🇬🇧 Notice the pattern in every conversion: the feature describes "the product," the benefit describes "the customer's life after using the product." The customer usually isn't a technical expert and won't translate "IPX4" into "I can work out in it" themselves — your job as a copywriter is to do that translation for them, not expect them to.</div>
</div>

<h2>إطار AIDA / The AIDA Framework</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 AIDA هو اختصار لأربع مراحل نفسية بيمر بيها أي شخص قبل ما يشتري، ولازم إعلانك يمر بيها بنفس الترتيب: <b>Attention (انتباه)</b> — أول جملة أو صورة لازم توقف السكرول، عادة بمشكلة أو سؤال أو رقم صادم. <b>Interest (اهتمام)</b> — تفاصيل تخلي القارئ يكمل، غالبًا بشرح المشكلة بدقة تخليه يحس "ده أنا بالظبط". <b>Desire (رغبة)</b> — هنا بتحول من "فهمت المشكلة" إلى "عايز الحل ده"، بإظهار الفايدة الملموسة (مش خاصية المنتج) وإثبات اجتماعي (مراجعات، أرقام). <b>Action (فعل)</b> — دعوة واضحة ومحددة تخلي القارئ يتصرف فورًا.</div>
    <div class="en">🇬🇧 AIDA stands for four psychological stages everyone passes through before buying, and your ad must move through them in the same order: <b>Attention</b> — the first line or image must stop the scroll, usually with a problem, question, or striking number. <b>Interest</b> — details that make the reader keep going, usually by describing the problem precisely enough that they think "that's exactly me." <b>Desire</b> — this is where "I understand the problem" turns into "I want this solution," by showing tangible benefit (not product features) plus social proof (reviews, numbers). <b>Action</b> — a clear, specific call that makes the reader act now.</div>
</div>

<div class="flow-diagram">
    <div class="flow-box">Attention</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">Interest</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">Desire (Benefit + Proof)</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">Action (CTA)</div>
</div>

<h2>مثال محلول: إعلان كامل بإطار AIDA / Worked Example: A Full Ad Using AIDA</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 تخيل بتبيع "دورة أونلاين لتعلم Excel للمحاسبين"، وطبقنا الإطار خطوة بخطوة:</div>
</div>
<div class="output-box">🔴 Attention:
"لسه بتقضي 3 ساعات كل شهر تعمل تقارير Excel يدويًا؟"

🟠 Interest:
"معظم المحاسبين بيضيعوا وقت كبير في مهام ممكن تتعمل في دقايق باستخدام صيغ ودوال بسيطة زي VLOOKUP وPivot Tables — بس محدش علّمهم إزاي."

🟡 Desire:
"دورة 'إكسل للمحاسبين' هتوريك خطوة بخطوة إزاي تبني تقرير شهري كامل في أقل من 20 دقيقة بدل 3 ساعات. أكتر من 1,200 محاسب خدوا الدورة، وتقييمها 4.8 من 5."

🟢 Action:
"احجز مكانك دلوقتي بخصم 30% لأول 50 مسجل فقط — العرض بينتهي الجمعة."</div>
<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ إزاي كل مرحلة بتبني على اللي قبلها: بدأنا بمشكلة محددة (وقت ضايع)، شرحنا سببها، أظهرنا الفايدة الملموسة (3 ساعات → 20 دقيقة) مع إثبات اجتماعي (1200 محاسب + تقييم)، وختمنا بدعوة محددة بموعد نهائي (urgency) يدفع للفعل فورًا بدل التأجيل.</div>
    <div class="en">🇬🇧 Notice how each stage builds on the last: we opened with a specific problem (wasted time), explained its cause, showed a tangible benefit (3 hours → 20 minutes) with social proof (1,200 accountants + rating), and closed with a specific call with a deadline (urgency) that pushes action instead of delay.</div>
</div>

<h2>صيغ العناوين الجاهزة / Proven Headline Formulas</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 مرحلة Attention في AIDA بتعتمد بشكل كبير على العنوان، وفيه صيغ مجربة بتشتغل في أغلب المجالات بدل ما تخترع من الصفر كل مرة: <b>صيغة الأرقام</b> — أرقام بتوحي بمحتوى منظم وقابل للتنفيذ ("7 طرق..."، "في 5 دقايق بس"). <b>صيغة السؤال</b> — بتخلي القارئ يجاوب في دماغه فورًا وتشد انتباهه لو السؤال يمسه شخصيًا. <b>صيغة كيفية العمل (How-to)</b> — بتوعد بحل عملي مباشر لمشكلة واضحة.</div>
    <div class="en">🇬🇧 AIDA's Attention stage relies heavily on the headline, and there are proven formulas that work across most industries instead of reinventing from scratch every time: <b>Number formula</b> — numbers suggest organized, actionable content ("7 ways to...", "in just 5 minutes"). <b>Question formula</b> — makes the reader answer in their head instantly, grabbing attention if the question hits close to home. <b>How-to formula</b> — promises a direct practical solution to a clear problem.</div>
</div>

<div class="output-box">لنفس دورة إكسل للمحاسبين، ثلاث صيغ عناوين مختلفة:

🔢 صيغة الأرقام:
"7 دوال Excel هتوفرلك 3 ساعات كل شهر كمحاسب"

❓ صيغة السؤال:
"لسه بتحسب تقاريرك الشهرية يدويًا في 2024؟"

🛠️ صيغة كيفية العمل:
"إزاي تبني تقرير محاسبي كامل في 20 دقيقة بدل 3 ساعات"</div>
<div class="bi-block">
    <div class="ar">🇪🇬 الثلاثة عناوين بتوصل نفس الوعد الأساسي (وفر وقت في التقارير الشهرية)، لكن بأسلوب نفسي مختلف: الأرقام بتوحي بمحتوى محدد وقابل للقياس، السؤال بيحط القارئ في موقف دفاعي خفيف يخليه يكمل قراءة، والـ how-to بيوعد بخطوات عملية مباشرة. اختيار الصيغة بيعتمد على جمهورك: جمهور بيحب حلول سريعة يفضل الأرقام، جمهور بيحس بالمشكلة فعلًا يستجيب للسؤال.</div>
    <div class="en">🇬🇧 All three headlines deliver the same core promise (save time on monthly reports), but with a different psychological angle: numbers suggest specific, measurable content, the question puts the reader in a mildly defensive spot that makes them keep reading, and the how-to promises direct practical steps. Which formula to pick depends on your audience: an audience that likes quick fixes prefers numbers, an audience that already feels the problem responds to the question.</div>
</div>

<h2>دعوة الفعل القوية / What Makes a Strong Call-to-Action</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 دعوة الفعل الضعيفة عامة وغامضة زي "اضغط هنا" أو "تعرف أكتر" — معندهاش فايدة واضحة ولا سبب يستعجل القارئ. دعوة الفعل القوية لازم تكون: (1) <b>محددة</b> — تقول بالظبط إيه اللي هيحصل (زي "احجز مكانك" مش "اضغط هنا")، (2) <b>قليلة الاحتكاك</b> — خطوة واحدة بسيطة، مش نموذج طويل معقد، (3) <b>مبنية على فايدة</b> — تربط الفعل بنتيجة يحس بيها القارئ ("وفّر 30%" أفضل من "اشترِ الآن"). مقارنة: "اضغط هنا" ضعيفة جدًا لأنها معندهاش أي سياق أو فايدة. "احجز مكانك بخصم 30% قبل الجمعة" قوية لأنها محددة، فيها فايدة واضحة، وفيها إلحاح زمني حقيقي.</div>
    <div class="en">🇬🇧 A weak CTA is generic and vague like "click here" or "learn more" — it has no clear benefit and no reason to hurry. A strong CTA must be: (1) <b>specific</b> — it states exactly what will happen ("reserve your seat" not "click here"), (2) <b>low-friction</b> — one simple step, not a long complicated form, (3) <b>benefit-driven</b> — it ties the action to an outcome the reader feels ("save 30%" beats "buy now"). Comparison: "click here" is very weak because it carries no context or benefit. "Reserve your seat with 30% off before Friday" is strong because it's specific, carries a clear benefit, and has genuine time urgency.</div>
</div>

<div class="recap-box">
    <h3>🗺️ خريطة AIDA / AIDA Map</h3>
    <ul>
        <li><b>خصائص مقابل فوائد:</b> الخاصية توصف المنتج، الفايدة توصف حياة العميل بعد استخدامه — دايمًا اسأل "وبعدين؟".</li>
        <li><b>صيغ العناوين:</b> أرقام (منظم وقابل للقياس)، سؤال (يشد انتباه شخصي)، كيفية العمل (وعد بخطوات عملية).</li>
        <li><b>Attention:</b> أوقف السكرول بمشكلة أو سؤال أو رقم صادم.</li>
        <li><b>Interest:</b> فصّل المشكلة عشان القارئ يحس "ده أنا".</li>
        <li><b>Desire:</b> فايدة ملموسة + إثبات اجتماعي، مش خصائص المنتج.</li>
        <li><b>Action:</b> دعوة محددة، قليلة الاحتكاك، مبنية على فايدة — مع إلحاح حقيقي لو ممكن.</li>
    </ul>
</div>

<div class="exercise-box">
    <h3>✍️ تمرين عملي / Hands-on Exercise</h3>
    <div class="ar">🇪🇬 اختار منتج وهمي مختلف عن مثال الدرس، واكتب إعلان كامل بإطار AIDA (جملة أو اتنين لكل مرحلة)، مع دعوة فعل نهائية تحقق الشروط التلاتة (محددة، قليلة الاحتكاك، مبنية على فايدة).</div>
    <div class="en">🇬🇧 Pick a hypothetical product different from the lesson's example, and write a full ad using AIDA (one or two sentences per stage), ending with a call-to-action that meets all three conditions (specific, low-friction, benefit-driven).</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="benefit">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">جملة "اشحنها الأحد، وانساها لحد الأحد اللي بعده" بتوصف إيه بالظبط؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">The line "charge it Sunday, forget about it until next Sunday" describes what exactly?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="feature"> خاصية تقنية (30 ساعة بطارية)</label>
        <label><input type="radio" name="q1" value="benefit"> فايدة ملموسة في حياة العميل</label>
        <label><input type="radio" name="q1" value="cta"> دعوة فعل (Call-to-Action)</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="numbers">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">عنوان "7 دوال Excel هتوفرلك 3 ساعات كل شهر" بيستخدم أنهي صيغة عنوان؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">The headline "7 Excel functions that will save you 3 hours a month" uses which headline formula?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="question"> صيغة السؤال</label>
        <label><input type="radio" name="q2" value="numbers"> صيغة الأرقام</label>
        <label><input type="radio" name="q2" value="howto"> صيغة كيفية العمل فقط</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ من خصائص لفايدة، ومن فايدة لثلاث عناوين / From Features to Benefits, and From Benefits to Three Headlines</h3>
    <div class="ar">🇪🇬 اختار منتج وهمي (مختلف عن السماعات ودورة الإكسل)، واكتب قائمة من 3 خصائص تقنية له، وحوّل كل واحدة لجملة فايدة مثل المثال المحلول بالظبط (خاصية ❌ / فايدة ✅). بعد كده اكتب 3 عناوين لنفس المنتج، واحد لكل صيغة (أرقام، سؤال، كيفية العمل).</div>
    <div class="en">🇬🇧 Pick a hypothetical product (different from the earbuds and the Excel course), and write a list of 3 technical features for it, converting each into a benefit sentence exactly like the worked example (feature ❌ / benefit ✅). Then write 3 headlines for the same product, one per formula (numbers, question, how-to).</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 كل تمرين عملته في المسار ده لحد دلوقتي (عنوان SEO، خطة محتوى، جدول سوشيال، سلسلة إيميل، حملة إعلانية، وإعلان AIDA) هو مادة خام حقيقية لبناء Portfolio. الدرس الأخير (العمل في التسويق) هيوريك إزاي تجمع كل ده في مكان واحد يقنع صاحب عمل أو عميل محتمل — حتى لو معندكش عملاء حقيقيين لسه.</div>
    <div class="en">🇬🇧 Every exercise you've done in this track so far (an SEO title, a content plan, a social calendar, an email sequence, an ad campaign, and an AIDA ad) is real raw material for building a portfolio. The final lesson (Careers) shows you how to gather all of it in one place that convinces an employer or potential client — even with zero real clients yet.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>الخاصية توصف المنتج، الفايدة توصف نتيجة ملموسة في حياة العميل — دايمًا ترجم الأولى للتانية.</li>
        <li>صيغ عناوين مجربة: أرقام، سؤال، كيفية العمل — كلها توصل نفس الوعد بأساليب نفسية مختلفة.</li>
        <li>AIDA = Attention → Interest → Desire → Action، بالترتيب ده بالظبط.</li>
        <li>الفايدة الملموسة والإثبات الاجتماعي هما اللي بيحولوا الاهتمام لرغبة فعلية.</li>
        <li>دعوة الفعل القوية: محددة، قليلة الاحتكاك، ومبنية على فايدة.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="analytics.php">← المرحلة السابقة</a>
    <a href="careers.php">المرحلة الجاية / Next: Careers →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
