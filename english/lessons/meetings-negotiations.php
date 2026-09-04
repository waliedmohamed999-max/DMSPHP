<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'meetings-negotiations';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'لغة الاجتماعات والتفاوض';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">C1 · Advanced / Professional</span>
<h1>لغة الاجتماعات والتفاوض <span class="ltr">Meetings &amp; Negotiation Language</span></h1>
<p class="subtitle">عبارات متقدمة للتفاوض على راتب أو ميزانية أو ديدلاين باحتراف — من غير ما تبدو ضعيف ولا عدواني.</p>

<div class="step-tracker">
    <a href="#read">📖 Read</a>
    <a href="#understand">🧠 Understand</a>
    <a href="#practice">💬 Practice</a>
    <a href="#quiz">🧠 Quiz</a>
    <a href="#challenge">🛠️ Challenge</a>
    <a href="#project">🚀 Project</a>
</div>

<h2 id="read">الهدف / Goal</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 تتعلم إزاي تفتح تفاوض، ترفض طلب بأدب من غير ما تقول "لأ" بشكل جاف، تقترح حل وسط، وتقفل الاتفاق بثقة — من خلال محاكي محادثة كامل لتفاوض حقيقي على ديدلاين وميزانية مع عميل. كل ده مع مفردات تفاوض متقدمة هتستخدمها في أي اجتماع مصيري.</div>
    <div class="en">🇬🇧 Learn how to open a negotiation, decline a request politely without a flat "no," propose a compromise, and close a deal with confidence — through a full conversation simulator based on a real deadline-and-budget negotiation with a client. Plus advanced negotiation vocabulary you'll use in any high-stakes meeting.</div>
</div>

<h2 id="understand">أعمدة التفاوض الاحترافي / The Pillars of Professional Negotiation</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 أي تفاوض ناجح في الشغل بيقوم على 4 مبادئ: (1) اعترف بوجهة نظر الطرف التاني الأول قبل ما ترد، (2) اقترح حل محدد بدل ما ترفض بس، (3) اربط أي تنازل بحاجة في المقابل، (4) اقفل الاتفاق دايمًا بملخص مكتوب وخطوة تالية واضحة. العبارات اللي هتتعلمها النهارده مبنية بالظبط على المبادئ دي.</div>
    <div class="en">🇬🇧 Every successful workplace negotiation rests on 4 principles: (1) acknowledge the other side's point before you respond, (2) propose something concrete instead of just refusing, (3) tie any concession to something in return, (4) always close with a written summary and a clear next step. The phrases you'll learn today are built exactly around these principles.</div>
</div>
<div class="output-box">عبارات مفتاحية للتفاوض / Key negotiation phrases

"I'd like to propose..." → حابب أقترح...
   (لفتح اقتراح محدد بدل ما تسأل سؤال مفتوح غامض)

"Would you be open to...?" → تكون موافق لو...؟
   (لطرح تنازل من غير ما تفرضه كأمر واقع)

"That's a fair point, but..." → ده كلام معقول، بس...
   (تعترف بوجهة النظر التانية قبل ما تختلف معاها)

"Let's find a middle ground." → خلينا نلاقي حل وسط.
   (لما الطرفين بعيدين عن بعض وعايزين يقربوا)

"That's more than I can approve on my end." → ده أكتر من اللي أقدر أوافق عليه من ناحيتي.
   (رفض مهذب بيسيب الباب مفتوح لحل بديل)</div>

<h2 id="practice">💬 محاكي التفاوض / Negotiation Simulator</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>السيناريو:</b> انت مسؤول مشروع (Project Lead) بتتفاوض مع عميل قلقان من تأخير موعد الإطلاق. المطلوب: تقترح تمديد الديدلاين، توضح السبب بدون دفاعية، وتوصل لاتفاق يرضي الطرفين على الوقت والميزانية.</div>
    <div class="en">🇬🇧 <b>Scenario:</b> You're a project lead negotiating with a client who's worried about a slipping launch date. Your goal: propose a deadline extension, explain the reason without being defensive, and reach an agreement on both timeline and budget that works for both sides.</div>
</div>

<div class="dialogue-sim" data-dialogue='[{"speaker": "other", "label": "العميل / Client", "en": "Thanks for making time today. I&#39;ll be honest — I&#39;m concerned we&#39;re not going to hit the March 15th launch date, and I need to understand why before I take this upstairs.", "ar": "شكرًا إنك لاقيت وقت النهارده. هكون صريح معاك — قلقان إننا مش هنقدر نلحق موعد الإطلاق يوم 15 مارس، وعايز أفهم السبب قبل ما أرفع الموضوع فوق."}, {"speaker": "you", "choices": [{"en": "I understand the concern, and I want to be upfront with you as well. Given where we are, I&#39;d like to propose pushing the launch to March 29th so we can deliver something we&#39;re both confident in.", "ar": "فاهم القلق، وحابب أكون صريح معاك برضه. بالنظر لموقفنا الحالي، حابب أقترح تأجيل الإطلاق لـ29 مارس عشان نقدر نسلّم حاجة إحنا الاتنين واثقين فيها.", "correct": true, "feedback_ar": "✅ رد قوي — بيبدأ بالتعاطف مع قلق العميل، وبعدين يستخدم عبارة تفاوض احترافية &#39;I&#39;d like to propose&#39; عشان يطرح حل محدد بدل ما يدافع بس.", "next": 2}, {"en": "Well, it&#39;s not really our fault, there were a lot of unexpected issues, so there&#39;s not much we can do about the date.", "ar": "يعني، مش غلطتنا فعليًا، كانت فيه مشاكل مش متوقعة كتير، فمفيش حاجة تقريبًا نقدر نعملها في الموعد.", "correct": false, "feedback_ar": "❌ رد دفاعي وسلبي — بيلقي اللوم من غير ما يقترح أي حل، وعبارة &#39;not much we can do&#39; بتوحي إنك مش متحكم في الموقف، وده انطباع سيء في تفاوض شغل.", "next": 2}]}, {"speaker": "other", "label": "العميل / Client", "en": "I appreciate the honesty, but a two-week slip affects our own marketing schedule. Can you walk me through what&#39;s actually driving this delay?", "ar": "بقدّر صراحتك، بس تأجيل أسبوعين هيأثر على جدول التسويق بتاعنا. ممكن توضحلي إيه اللي فعليًا بيسبب التأخير ده؟"}, {"speaker": "you", "choices": [{"en": "Absolutely. Roughly a third of the extra time comes from three new features your team added to the scope last month — the rest is buffer for proper QA, which I don&#39;t want to cut.", "ar": "أكيد. حوالي تلت الوقت الإضافي سببه 3 مميزات جديدة فريقكم ضافها للنطاق الشهر اللي فات — والباقي وقت احتياطي لاختبار جودة صحيح، ومش حابب أختصره.", "correct": true, "feedback_ar": "✅ إجابة دقيقة ومحترفة — بتشرح السبب بأرقام وحقائق (scope creep) من غير لوم مباشر، وبتوضح إن وقت الـQA مش رفاهية.", "next": 4}, {"en": "Honestly, I&#39;m not 100% sure, my team just told me we need more time.", "ar": "بصراحة، مش متأكد 100%، فريقي بس قالّي إحنا محتاجين وقت أكتر.", "correct": false, "feedback_ar": "❌ رد غير مقنع خالص — عدم معرفتك بسبب التأخير في مشروعك بيهز ثقة العميل فيك كليًا كمسؤول عن المشروع.", "next": 4}]}, {"speaker": "other", "label": "العميل / Client", "en": "That&#39;s fair — the added features were on us. But if we agree to two extra weeks, I&#39;ll need something in return for the marketing delay this causes us.", "ar": "ده منطقي — المميزات الإضافية كانت غلطتنا. بس لو اتفقنا على أسبوعين زيادة، هحتاج حاجة في المقابل عشان تأخير التسويق اللي ده هيسببهولنا."}, {"speaker": "you", "choices": [{"en": "That&#39;s a fair point. Would you be open to us covering the cost of an extra round of QA at no charge, in exchange for the extra two weeks?", "ar": "ده كلام معقول. تكون موافق لو إحنا غطينا تكلفة جولة اختبار جودة إضافية من غير أي مقابل مادي، مقابل الأسبوعين الإضافيين دول؟", "correct": true, "feedback_ar": "✅ استخدام مثالي لعبارة &#39;That&#39;s a fair point&#39; و&#39;Would you be open to...&#39; — بتعترف بوجهة نظر الطرف التاني وتقترح تنازل ملموس بدل ما ترفض أو توافق بدون شرط.", "next": 6}, {"en": "I mean, two weeks isn&#39;t really a big deal, you&#39;ll just have to adjust your marketing plan somehow.", "ar": "يعني، أسبوعين مش موضوع كبير أوي، وهتضطروا تعدلوا خطة التسويق بتاعتكم بشكل ما.", "correct": false, "feedback_ar": "❌ رد يقلل من مشكلة العميل الحقيقية ومايقترحش أي حل — كده بتخلي العميل يحس إن مشكلته مش مهمة، وده بيضعف علاقة الشغل.", "next": 6}]}, {"speaker": "other", "label": "العميل / Client", "en": "I like that direction, but free QA alone doesn&#39;t offset the marketing costs. Could we also lock in a 10% discount on this phase&#39;s invoice?", "ar": "عجبني الاتجاه ده، بس اختبار الجودة المجاني لوحده مش هيعوض تكاليف التسويق. ممكن كمان نتفق على خصم 10% على فاتورة المرحلة دي؟"}, {"speaker": "you", "choices": [{"en": "A 10% discount is more than I can approve on my end, but let&#39;s find a middle ground — I can offer 5%, combined with the free QA round and a dedicated point of contact for daily updates.", "ar": "خصم 10% أكتر من اللي أقدر أوافق عليه من ناحيتي، بس خلينا نلاقي حل وسط — أقدر أعرض 5%، مع جولة الاختبار المجانية، وشخص مخصص يبعتلكم تحديثات يومية.", "correct": true, "feedback_ar": "✅ تفاوض احترافي ممتاز — يرفض الطلب بأدب من غير ما يقول &#39;لأ&#39; بس، ويستخدم &#39;let&#39;s find a middle ground&#39; عشان يقدّم بديل متوازن بدل ما يفقد كل الأوراق.", "next": 8}, {"en": "Fine, 10% works, whatever keeps you happy.", "ar": "تمام، 10% تمام، أي حاجة تخليك مبسوط.", "correct": false, "feedback_ar": "❌ استسلام سريع وغير مدروس — الموافقة الفورية من غير أي تفاوض بتضيع قيمة حقيقية على شركتك، وبتدي انطباع إنك مستعد توافق على أي طلب.", "next": 8}]}, {"speaker": "other", "label": "العميل / Client", "en": "5% and the free QA round, plus daily updates — I can work with that. Let&#39;s put it in writing so both teams are aligned.", "ar": "5% مع جولة الاختبار المجانية، وتحديثات يومية — أقدر أتعامل مع ده. خلينا نكتبه رسميًا عشان الفريقين يبقوا متفقين."}, {"speaker": "you", "choices": [{"en": "Sounds good. I&#39;ll send a written summary by end of day today, confirming the March 29th date, the 5% adjustment, and the daily update schedule.", "ar": "تمام. هبعتلك ملخص مكتوب النهارده قبل آخر اليوم، بيأكد موعد 29 مارس، وتعديل الـ5%، وجدول التحديثات اليومية.", "correct": true, "feedback_ar": "✅ إغلاق قوي واحترافي — بيلخص كل بند اتفقتم عليه بوضوح، وبيحدد وقت تسليم محدد (end of day) وده أساسي في أي تفاوض شغل.", "next": 10}, {"en": "Ok cool, I&#39;ll get to it eventually, no worries.", "ar": "تمام كويس، هعمل الموضوع في يوم من الأيام، متقلقش.", "correct": false, "feedback_ar": "❌ رد غير مهني وغامض — &#39;eventually&#39; مفيهاش أي التزام بوقت محدد، وده ممكن يخلي العميل يحس إن الاتفاق مش هيتنفذ فعليًا.", "next": 10}]}, {"speaker": "other", "label": "العميل / Client", "en": "Perfect, I&#39;ll wait for that email. Thanks for working through this with me — I feel a lot more confident about the timeline now.", "ar": "ممتاز، هستنى الإيميل ده. شكرًا إنك اتفاوضت معايا على الموضوع ده — دلوقتي حاسس بثقة أكبر بكتير في الجدول الزمني."}, {"speaker": "you", "choices": [{"en": "Thank you for being flexible on this — I&#39;ll make sure the whole team delivers on these new terms. Talk soon.", "ar": "شكرًا إنك كنت مرن في الموضوع ده — هتأكد إن الفريق كله يلتزم بالشروط الجديدة دي. نتكلم قريب.", "correct": true, "feedback_ar": "✅ ختام احترافي ودافئ — بيقفل الاتفاق بامتنان صادق والتزام واضح بالتنفيذ، وده بيبني ثقة طويلة المدى مع العميل.", "next": 12}, {"en": "Yeah, sure, hopefully it works out this time.", "ar": "أيوه، تمام، يارب يمشي الحال المرة دي.", "correct": false, "feedback_ar": "❌ ختام ضعيف الثقة — كلمة &#39;hopefully&#39; بتوحي بعدم يقين وبتهز الثقة اللي بنيتها طول التفاوض، بعكس الالتزام الواضح المطلوب في الختام.", "next": 12}]}]'>
    <div class="dialogue-scenario">📍 تفاوض على ديدلاين وميزانية مع عميل / Negotiating a deadline and budget with a client</div>
    <div class="dialogue-log"></div>
    <div class="dialogue-choices"></div>
    <button class="dialogue-restart-btn" hidden>🔄 ابدأ من جديد / Restart</button>
</div>

<h2>مفردات التفاوض / Negotiation Vocabulary</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 دوس على أي بطاقة عشان تشوف الترجمة والمثال.</div>
    <div class="en">🇬🇧 Tap any card to reveal the translation and example.</div>
</div>
<div class="vocab-grid">
    <div class="vocab-card">
        <div class="vocab-card-front">
            <div class="vocab-word">Compromise</div>
            <div class="vocab-pron">/ˈkɒm.prə.maɪz/</div>
        </div>
        <div class="vocab-card-back">
            <div class="vocab-ar">حل وسط / تنازل متبادل</div>
            <div class="vocab-example"><div class="en">We reached a compromise: a shorter deadline extension in exchange for a discounted rate.</div><div class="ar">وصلنا لحل وسط: تمديد أقصر للديدلاين مقابل سعر مخفّض.</div></div>
        </div>
        <div class="vocab-card-hint">👆 دوس / Tap</div>
    </div>
    <div class="vocab-card">
        <div class="vocab-card-front">
            <div class="vocab-word">Deadline</div>
            <div class="vocab-pron">/ˈded.laɪn/</div>
        </div>
        <div class="vocab-card-back">
            <div class="vocab-ar">ميعاد نهائي</div>
            <div class="vocab-example"><div class="en">Could we push the deadline back by two weeks to allow for proper testing?</div><div class="ar">ممكن نأجل الديدلاين أسبوعين عشان نسمح بوقت اختبار كافي؟</div></div>
        </div>
        <div class="vocab-card-hint">👆 دوس / Tap</div>
    </div>
    <div class="vocab-card">
        <div class="vocab-card-front">
            <div class="vocab-word">Budget</div>
            <div class="vocab-pron">/ˈbʌdʒ.ɪt/</div>
        </div>
        <div class="vocab-card-back">
            <div class="vocab-ar">ميزانية</div>
            <div class="vocab-example"><div class="en">The extra QA round will need to come out of the existing budget, not a new one.</div><div class="ar">جولة الاختبار الإضافية هتحتاج تتغطى من الميزانية الحالية، مش ميزانية جديدة.</div></div>
        </div>
        <div class="vocab-card-hint">👆 دوس / Tap</div>
    </div>
    <div class="vocab-card">
        <div class="vocab-card-front">
            <div class="vocab-word">Leverage</div>
            <div class="vocab-pron">/ˈliː.vər.ɪdʒ/</div>
        </div>
        <div class="vocab-card-back">
            <div class="vocab-ar">أوراق ضغط / نقطة قوة في التفاوض</div>
            <div class="vocab-example"><div class="en">Having an alternative vendor ready gave us real leverage in the price negotiation.</div><div class="ar">وجود مورّد بديل جاهز دّانا أوراق ضغط حقيقية في التفاوض على السعر.</div></div>
        </div>
        <div class="vocab-card-hint">👆 دوس / Tap</div>
    </div>
    <div class="vocab-card">
        <div class="vocab-card-front">
            <div class="vocab-word">Counter-offer</div>
            <div class="vocab-pron">/ˈkaʊn.tər ˌɒf.ər/</div>
        </div>
        <div class="vocab-card-back">
            <div class="vocab-ar">عرض مضاد</div>
            <div class="vocab-example"><div class="en">Instead of accepting the first number, she made a counter-offer of 5% instead of 10%.</div><div class="ar">بدل ما توافق على الرقم الأول، قدّمت عرض مضاد بـ5% بدل 10%.</div></div>
        </div>
        <div class="vocab-card-hint">👆 دوس / Tap</div>
    </div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="propose">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">أي عبارة أنسب لفتح اقتراح تفاوض محدد؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Which phrase best opens a specific negotiation proposal?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="whatever"> "Whatever you think is best."</label>
        <label><input type="radio" name="q1" value="propose"> "I'd like to propose..."</label>
        <label><input type="radio" name="q1" value="no-way"> "No way, that's impossible."</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="fair-point">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">إيه العبارة اللي بتعترف بوجهة نظر الطرف التاني قبل ما تختلف معاها؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Which phrase acknowledges the other side's point before disagreeing?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="fair-point"> "That's a fair point, but..."</label>
        <label><input type="radio" name="q2" value="wrong"> "You're completely wrong."</label>
        <label><input type="radio" name="q2" value="ignore"> تتجاهل كلامه وتكمل في اقتراحك</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="counter-offer">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">لما ترفض رقم مقترح وتقترح رقم تاني بدله، ده بيتسمى إيه؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What is it called when you reject a proposed number and suggest another instead?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="leverage"> Leverage</label>
        <label><input type="radio" name="q3" value="counter-offer"> Counter-offer</label>
        <label><input type="radio" name="q3" value="deadline"> Deadline</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="written-summary">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">حسب الدرس، إزاي المفروض تقفل أي تفاوض ناجح؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">According to the lesson, how should any successful negotiation be closed?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="verbal-only"> اتفاق شفهي بس من غير أي متابعة</label>
        <label><input type="radio" name="q4" value="written-summary"> ملخص مكتوب بالبنود المتفق عليها ووقت محدد للمتابعة</label>
        <label><input type="radio" name="q4" value="say-hopefully"> تقول "hopefully it works out" وتخلص الموضوع</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ اكتب تفاوضك الخاص / Write Your Own Negotiation</h3>
    <div class="ar">🇪🇬 تخيل إنك بتتفاوض مع مديرك على زيادة راتب أو على نطاق مهمة (scope) مبالغ فيه. اكتب 4 جمل حقيقية باستخدام على الأقل 3 من العبارات الخمسة اللي اتعلمتها ("I'd like to propose...", "Would you be open to...?", "That's a fair point, but...", "Let's find a middle ground", "That's more than I can approve on my end"). اقراها بصوت عالي كإنك فعلًا في الاجتماع.</div>
    <div class="en">🇬🇧 Imagine you're negotiating a raise with your manager, or pushing back on an unreasonable scope increase. Write 4 real sentences using at least 3 of the five phrases you learned today ("I'd like to propose...", "Would you be open to...?", "That's a fair point, but...", "Let's find a middle ground", "That's more than I can approve on my end"). Read them aloud as if you were really in the meeting.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 تفاوض الديدلاين والميزانية اللي تدربت عليه دلوقتي بيحصل غالبًا مكتوب، مش بس بالكلام — على شكل تعليق مراجعة كود، رسالة Pull Request، أو رد على Slack. المرحلة الجاية، "الإنجليزية في مراجعة الكود والتواصل التقني"، هتاخدك بالظبط لنفس مهارة التوازن بين الوضوح والاحترافية، بس في التواصل التقني المكتوب اليومي مع فريقك.</div>
    <div class="en">🇬🇧 The deadline-and-budget negotiation you just practiced often happens in writing, not just out loud — as a code review comment, a pull request message, or a Slack reply. The next lesson, "English for Code Reviews & Technical Communication," takes you to exactly that same balance of clarity and professionalism, but in the daily written technical communication with your team.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>اعترف بوجهة نظر الطرف التاني الأول ("That's a fair point, but...") قبل ما تختلف معاها.</li>
        <li>اقترح حل محدد ("I'd like to propose...") بدل ما ترفض أو توافق من غير أي بديل.</li>
        <li>اربط أي تنازل بحاجة في المقابل، واستخدم "Let's find a middle ground" لما الطرفين بعيدين.</li>
        <li>اقفل أي اتفاق بملخص مكتوب ووقت تسليم محدد — مش بجملة غامضة زي "hopefully."</li>
        <li>مفردات جديدة: compromise, deadline, budget, leverage, counter-offer.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="b2-listening-1.php">← المرحلة السابقة</a>
    <a href="code-review-english.php">المرحلة الجاية / Next: الإنجليزية في مراجعة الكود →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
