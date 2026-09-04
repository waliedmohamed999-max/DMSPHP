<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'directions-transport';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'الاتجاهات ووسائل المواصلات';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">A2 · Elementary</span>
<h1>الاتجاهات ووسائل المواصلات <span class="ltr">Directions &amp; Transport</span></h1>
<p class="subtitle">تسأل عن الطريق، تفهم الرد، وتستخدم وسائل المواصلات في بلد أجنبي — محاكي محادثة حقيقي مع شخص محلي بيوجّهك لمحطة القطر، بترجمة عربية لكل سطر.</p>

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
    <div class="ar">🇪🇬 تتدرب على السؤال عن الطريق بأدب، وفهم اتجاهات حقيقية (لف يمين/شمال، امشي على طول)، والتصرف الصح لما حد يساعدك. وتاخد 5 كلمات جديدة مرتبطة بالمواصلات.</div>
    <div class="en">🇬🇧 Practice asking for directions politely, understanding real directions (turn left/right, go straight ahead), and how to respond properly when someone helps you. You'll also pick up 5 new transport-related words.</div>
</div>

<h2 id="understand">إزاي تستخدم المحاكي / How to Use the Simulator</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 هتقرا سطر من الشخص المحلي (مترجم تلقائيًا تحته بالعربي)، وبعدين هيظهرلك اختيارين لردك انت — اختار اللي تحس إنه الأصح، وهتاخد تقييم فوري (✅ أو ❌) يشرحلك السبب النحوي أو سبب قلة الأدب في الاختيار التاني.</div>
    <div class="en">🇬🇧 You'll read a line from the local person (automatically translated under it in Arabic), then get two response options — pick the one you think is right, and get instant feedback (✅ or ❌) explaining the grammar or politeness reason behind the other option.</div>
</div>

<h2 id="practice">💬 محاكي المحادثة / Conversation Simulator</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>السيناريو:</b> انت سائح تايه في الشارع، وشخص محلي بيلاحظ ده وبييجي يساعدك توصل لمحطة القطر.</div>
    <div class="en">🇬🇧 <b>Scenario:</b> You're a tourist lost on the street, and a local person notices and comes over to help you find the train station.</div>
</div>

<div class="dialogue-sim" data-dialogue='[{"speaker":"other","label":"المحلي / Local Person","en":"Hi there! You look a little lost — can I help you?","ar":"أهلاً! باين عليك تايه شوية — أقدر أساعدك؟"},{"speaker":"you","choices":[{"en":"Yes, please. How do I get to the train station?","ar":"أيوه من فضلك. أروح إزاي لمحطة القطر؟","correct":true,"feedback_ar":"✅ سؤال صحيح ومهذب باستخدام &#39;How do I get to...&#39; — الصيغة الطبيعية لطلب الاتجاهات.","next":2},{"en":"Where train station?","ar":"فين محطة القطر؟","correct":false,"feedback_ar":"❌ ترتيب كلمات غلط وناقص فعل — الصح: &#39;Where IS the train station?&#39; أو &#39;How do I get to...&#39;","next":2}]},{"speaker":"other","label":"المحلي / Local Person","en":"It&#39;s not far. Go straight ahead for two blocks, then turn left at the bank.","ar":"مش بعيدة. امشي على طول لمسافة بلوكين، وبعدين لف شمال عند البنك."},{"speaker":"you","choices":[{"en":"Turn left at the bank, got it. Is it far from there?","ar":"لف شمال عند البنك، فهمت. بعيدة من هناك؟","correct":true,"feedback_ar":"✅ رد ذكي بيأكد إنك فهمت الاتجاهات وبعدين بيسأل سؤال متابعة منطقي.","next":4},{"en":"Left bank ok far?","ar":"شمال بنك تمام بعيد؟","correct":false,"feedback_ar":"❌ كلمات مبعثرة من غير تركيب نحوي، صعب على أي حد يفهمها.","next":4}]},{"speaker":"other","label":"المحلي / Local Person","en":"Not at all — it&#39;s right across from the bus stop. You&#39;ll see the entrance right away.","ar":"خالص — هي قصاد موقف الأتوبيس على طول. هتشوف المدخل على طول."},{"speaker":"you","choices":[{"en":"Great, thank you so much for your help!","ar":"تمام، شكرًا جزيلًا على مساعدتك!","correct":true,"feedback_ar":"✅ ختام ودود ومهذب يعبّر عن الامتنان بشكل واضح.","next":6},{"en":"Ok whatever thanks.","ar":"طيب أيا كان، شكرًا.","correct":false,"feedback_ar":"❌ نبرة غير مبالية وغير مهذبة رغم إن الشخص ساعدك فعلًا بمعلومات مفيدة.","next":6}]},{"speaker":"other","label":"المحلي / Local Person","en":"No problem! Oh, and if you need a ticket, there&#39;s a machine right at the entrance.","ar":"مفيش مشكلة! وبالمناسبة، لو محتاج تذكرة، فيه ماكينة عند المدخل على طول."},{"speaker":"you","choices":[{"en":"That&#39;s really helpful, thanks again!","ar":"ده مفيد جدًا، شكرًا مرة تانية!","correct":true,"feedback_ar":"✅ رد ممتن مناسب لمعلومة إضافية مفيدة.","next":8},{"en":"I not need that.","ar":"أنا مش محتاج ده.","correct":false,"feedback_ar":"❌ خطأ نحوي — ناقص فعل مساعد، الصح: &#39;I don&#39;t need that&#39;، وأيضًا رد غير ممتن رغم معلومة مفيدة.","next":8}]}]'>
    <div class="dialogue-scenario">📍 في الشارع — سائح تايه بيسأل عن محطة القطر / On the street — a lost tourist asks for the train station</div>
    <div class="dialogue-log"></div>
    <div class="dialogue-choices"></div>
    <button class="dialogue-restart-btn" hidden>🔄 ابدأ من جديد / Restart</button>
</div>

<h2>مفردات الاتجاهات والمواصلات / Directions &amp; Transport Vocabulary</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 دوس على أي بطاقة عشان تشوف الترجمة والمثال.</div>
    <div class="en">🇬🇧 Click any card to reveal the translation and example.</div>
</div>
<div class="vocab-grid">
    <div class="vocab-card">
        <div class="vocab-card-front">
            <div class="vocab-word">Turn left / right</div>
            <div class="vocab-pron">/tɜːrn left / raɪt/</div>
            <button type="button" class="speak-btn" data-text="Turn left, turn right" data-rate="1">🔊 Listen</button>
        </div>
        <div class="vocab-card-back">
            <div class="vocab-ar">لف شمال / يمين</div>
            <div class="vocab-example"><div class="en">Turn right at the traffic light.</div><div class="ar">لف يمين عند إشارة المرور.</div></div>
        </div>
        <div class="vocab-card-hint">👆 دوس / Tap</div>
    </div>
    <div class="vocab-card">
        <div class="vocab-card-front">
            <div class="vocab-word">Straight ahead</div>
            <div class="vocab-pron">/streɪt əˈhɛd/</div>
            <button type="button" class="speak-btn" data-text="Straight ahead" data-rate="1">🔊 Listen</button>
        </div>
        <div class="vocab-card-back">
            <div class="vocab-ar">على طول</div>
            <div class="vocab-example"><div class="en">Go straight ahead until you reach the square.</div><div class="ar">امشي على طول لحد ما توصل الميدان.</div></div>
        </div>
        <div class="vocab-card-hint">👆 دوس / Tap</div>
    </div>
    <div class="vocab-card">
        <div class="vocab-card-front">
            <div class="vocab-word">Platform</div>
            <div class="vocab-pron">/ˈplæt.fɔːrm/</div>
            <button type="button" class="speak-btn" data-text="Platform" data-rate="1">🔊 Listen</button>
        </div>
        <div class="vocab-card-back">
            <div class="vocab-ar">رصيف المحطة</div>
            <div class="vocab-example"><div class="en">The train leaves from platform 3.</div><div class="ar">القطر بيمشي من رصيف رقم 3.</div></div>
        </div>
        <div class="vocab-card-hint">👆 دوس / Tap</div>
    </div>
    <div class="vocab-card">
        <div class="vocab-card-front">
            <div class="vocab-word">Ticket</div>
            <div class="vocab-pron">/ˈtɪk.ɪt/</div>
            <button type="button" class="speak-btn" data-text="Ticket" data-rate="1">🔊 Listen</button>
        </div>
        <div class="vocab-card-back">
            <div class="vocab-ar">تذكرة</div>
            <div class="vocab-example"><div class="en">Where can I buy a ticket?</div><div class="ar">أشتري التذكرة منين؟</div></div>
        </div>
        <div class="vocab-card-hint">👆 دوس / Tap</div>
    </div>
    <div class="vocab-card">
        <div class="vocab-card-front">
            <div class="vocab-word">Bus stop</div>
            <div class="vocab-pron">/bʌs stɒp/</div>
            <button type="button" class="speak-btn" data-text="Bus stop" data-rate="1">🔊 Listen</button>
        </div>
        <div class="vocab-card-back">
            <div class="vocab-ar">موقف الأتوبيس</div>
            <div class="vocab-example"><div class="en">The bus stop is across from the bank.</div><div class="ar">موقف الأتوبيس قصاد البنك.</div></div>
        </div>
        <div class="vocab-card-hint">👆 دوس / Tap</div>
    </div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="how-do-i-get">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">إيه الصيغة الصحيحة للسؤال عن الطريق لمحطة؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What's the correct way to ask for directions to a station?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="where-train"> "Where train station?"</label>
        <label><input type="radio" name="q1" value="how-do-i-get"> "How do I get to the train station?"</label>
        <label><input type="radio" name="q1" value="station-where"> "Station where?"</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="platform">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">أي كلمة معناها "رصيف المحطة"؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Which word means "station platform"?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="ticket"> ticket</label>
        <label><input type="radio" name="q2" value="platform"> platform</label>
        <label><input type="radio" name="q2" value="bus-stop"> bus stop</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="thank-you">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">لو حد ساعدك توصل لمكان، إيه أفضل رد؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">If someone helps you get somewhere, what's the best response?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="thank-you"> "Great, thank you so much for your help!"</label>
        <label><input type="radio" name="q3" value="whatever"> "Ok whatever thanks."</label>
        <label><input type="radio" name="q3" value="nothing"> متردش خالص</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="broken">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">إيه المشكلة في جملة "Left bank ok far?"؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What's wrong with the sentence "Left bank ok far?"</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="broken"> كلمات مبعثرة من غير تركيب نحوي صحيح</label>
        <label><input type="radio" name="q4" value="fine"> مفيش أي مشكلة فيها</label>
        <label><input type="radio" name="q4" value="too-formal"> رسمية أكتر من اللازم</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ ارسم خريطتك واشرحها / Draw Your Own Map &amp; Explain It</h3>
    <div class="ar">🇪🇬 ارسم خريطة بسيطة من بيتك لأقرب محطة أتوبيس أو مترو، وبعدين اكتب الاتجاهات بالإنجليزي خطوة بخطوة زي المثال في الدرس: "Go straight ahead", "Turn left/right", "It's across from...".</div>
    <div class="en">🇬🇧 Draw a simple map from your house to the nearest bus or metro station, then write the directions in English step by step like the example in the lesson: "Go straight ahead", "Turn left/right", "It's across from...".</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 اتعلمت توصل من مكان لمكان — دلوقتي جاي موقف مختلف: الطلب في مطعم من أول الحجز لحد الحساب. المحاكي الجاي هيحطك في محادثة كاملة مع ويتر، من غير قفزات، خطوة بخطوة.</div>
    <div class="en">🇬🇧 You've learned to get from place to place — next comes a different situation: ordering at a restaurant from booking all the way to the bill. The next simulator puts you in a full conversation with a waiter, step by step, with no gaps.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>السؤال عن الاتجاهات: "How do I get to...?" مش "Where + اسم المكان" من غير فعل.</li>
        <li>اتجاهات أساسية: turn left/right, straight ahead, across from.</li>
        <li>لما حد يساعدك، رد بامتنان واضح — مش رد جاف زي "Ok whatever".</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="shopping-market.php">← المرحلة السابقة</a>
    <a href="food-restaurant.php">المرحلة الجاية / Next: الطلب في مطعم →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
