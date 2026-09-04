<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'food-restaurant';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'الطلب في مطعم';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">A2 · Elementary</span>
<h1>الطلب في مطعم <span class="ltr">Ordering at a Restaurant</span></h1>
<p class="subtitle">محاكي محادثة كامل للطلب في مطعم — من الحجز للطلب للحساب، بترجمة عربية لكل سطر.</p>

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
    <div class="ar">🇪🇬 تتدرب على محادثة مطعم كاملة من الاستقبال، للطلب، لطلب الحساب — وتتعلم تفرّق بين رد طبيعي ومهذب ورد فيه خطأ نحوي أو صياغة غريبة. وتاخد 5 كلمات جديدة مرتبطة بالمطاعم.</div>
    <div class="en">🇬🇧 Practice a full restaurant conversation from being seated, to ordering, to asking for the bill — and learn to tell a natural, polite response apart from one with a grammar mistake or an awkward phrasing. You'll also pick up 5 new restaurant-related words.</div>
</div>

<h2 id="understand">إزاي تستخدم المحاكي / How to Use the Simulator</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 هتقرا سطر من الويتر (مترجم تلقائيًا تحته بالعربي)، وبعدين هيظهرلك اختيارين لردك انت — اختار اللي تحس إنه الأصح، وهتاخد تقييم فوري (✅ أو ❌) يشرحلك السبب النحوي أو سبب قلة الأدب في الاختيار التاني.</div>
    <div class="en">🇬🇧 You'll read a line from the waiter (automatically translated under it in Arabic), then get two response options — pick the one you think is right, and get instant feedback (✅ or ❌) explaining the grammar or politeness reason behind the other option.</div>
</div>

<h2 id="practice">💬 محاكي المحادثة / Conversation Simulator</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>السيناريو:</b> انت وصاحبك واصلين مطعم عندكوا حجز، من الاستقبال للطلب لحد ما تطلبوا الحساب.</div>
    <div class="en">🇬🇧 <b>Scenario:</b> You and a friend arrive at a restaurant with a reservation, from being seated to ordering to asking for the bill.</div>
</div>

<div class="dialogue-sim" data-dialogue='[{"speaker":"other","label":"الويتر / Waiter","en":"Good evening! Do you have a reservation?","ar":"مساء الخير! عندك حجز؟"},{"speaker":"you","choices":[{"en":"Yes, a table for two under the name Ahmed.","ar":"أيوه، طاولة لشخصين باسم أحمد.","correct":true,"feedback_ar":"✅ رد كامل وواضح بيدّي كل المعلومات المطلوبة (العدد والاسم).","next":2},{"en":"No reservation I want table.","ar":"مفيش حجز عايز طاولة.","correct":false,"feedback_ar":"❌ جملة مكسورة نحويًا. الأفضل: &#39;I don&#39;t have a reservation, but could we get a table for two?&#39;","next":2}]},{"speaker":"other","label":"الويتر / Waiter","en":"Of course, right this way. Here are your menus.","ar":"أكيد، من هنا لو سمحت. اتفضل المنيو."},{"speaker":"you","choices":[{"en":"Thank you. Could we have a few minutes to decide?","ar":"شكرًا. ممكن ناخد كام دقيقة عشان نقرر؟","correct":true,"feedback_ar":"✅ طلب مهذب ومنطقي باستخدام &#39;Could we...&#39; بدل صيغة أمر.","next":4},{"en":"Give minutes we decide.","ar":"اديني دقايق نقرر.","correct":false,"feedback_ar":"❌ ترتيب كلمات غلط تمامًا وصيغة أمر بدل سؤال مهذب.","next":4}]},{"speaker":"other","label":"الويتر / Waiter","en":"Take your time. Are you ready to order, or do you have any questions about the menu?","ar":"خد وقتك. جاهزين تطلبوا، ولا عندكم أي أسئلة عن المنيو؟"},{"speaker":"you","choices":[{"en":"Yes, actually — what do you recommend?","ar":"أيوه فعلاً — بتنصح بإيه؟","correct":true,"feedback_ar":"✅ طريقة طبيعية ومهذبة لطلب اقتراح من الويتر.","next":6},{"en":"What is good?","ar":"إيه اللي كويس؟","correct":false,"feedback_ar":"❌ صحيحة نحويًا لكنها مباشرة وغريبة الصياغة — &#39;What do you recommend?&#39; أكثر طبيعية.","next":6}]},{"speaker":"other","label":"الويتر / Waiter","en":"The grilled chicken is our specialty tonight, and it comes with a side salad.","ar":"الفراخ المشوية هي طبق اليوم المميز الليلة، وبتيجي مع سلطة جانبية."},{"speaker":"you","choices":[{"en":"That sounds great. I&#39;ll have the grilled chicken, please.","ar":"ده يبان حلو. هطلب الفراخ المشوية، من فضلك.","correct":true,"feedback_ar":"✅ صيغة الطلب الصحيحة في مطعم: &#39;I&#39;ll have...&#39; + من فضلك.","next":8},{"en":"I will took the chicken.","ar":"هاخد الفراخ.","correct":false,"feedback_ar":"❌ خطأ نحوي — &#39;took&#39; فعل ماضي، ومع &#39;will&#39; لازم المصدر: &#39;I will take the chicken.&#39;","next":8}]},{"speaker":"other","label":"الويتر / Waiter","en":"Great choice! Anything to drink?","ar":"اختيار ممتاز! أي حاجة تشربوها؟"},{"speaker":"you","choices":[{"en":"Just water for me, thanks.","ar":"بس مياه ليا، شكرًا.","correct":true,"feedback_ar":"✅ رد قصير لكنه مهذب — فيه &#39;please/thanks&#39; رغم الاختصار.","next":10},{"en":"Water.","ar":"مياه.","correct":false,"feedback_ar":"❌ كلمة واحدة جافة من غير أي لباقة — إضافة &#39;thanks&#39; بسيطة كانت هتفرق.","next":10}]},{"speaker":"other","label":"الويتر / Waiter","en":"Here&#39;s your bill whenever you&#39;re ready. Was everything alright?","ar":"الحساب لما تكون جاهز. كل حاجة كانت تمام؟"},{"speaker":"you","choices":[{"en":"Yes, it was delicious. Can I pay by card?","ar":"أيوه، كان لذيذ. أقدر أدفع بالكارت؟","correct":true,"feedback_ar":"✅ رد كامل ومهذب بيجاوب على السؤال وبعدين بيسأل سؤال واضح عن الدفع.","next":12},{"en":"Yes good. Card.","ar":"أيوه كويس. كارت.","correct":false,"feedback_ar":"❌ جمل مقطعة وغير مكتملة نحويًا، الأفضل صياغة سؤال كامل ومهذب.","next":12}]}]'>
    <div class="dialogue-scenario">📍 مطعم — من الحجز للطلب للحساب / A restaurant — from booking to ordering to the bill</div>
    <div class="dialogue-log"></div>
    <div class="dialogue-choices"></div>
    <button class="dialogue-restart-btn" hidden>🔄 ابدأ من جديد / Restart</button>
</div>

<h2>مفردات المطعم / Restaurant Vocabulary</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 دوس على أي بطاقة عشان تشوف الترجمة والمثال.</div>
    <div class="en">🇬🇧 Click any card to reveal the translation and example.</div>
</div>
<div class="vocab-grid">
    <div class="vocab-card">
        <div class="vocab-card-front">
            <div class="vocab-word">Menu</div>
            <div class="vocab-pron">/ˈmɛn.juː/</div>
            <button type="button" class="speak-btn" data-text="Menu" data-rate="1">🔊 Listen</button>
        </div>
        <div class="vocab-card-back">
            <div class="vocab-ar">قائمة الطعام</div>
            <div class="vocab-example"><div class="en">Can I see the menu, please?</div><div class="ar">ممكن أشوف المنيو، من فضلك؟</div></div>
        </div>
        <div class="vocab-card-hint">👆 دوس / Tap</div>
    </div>
    <div class="vocab-card">
        <div class="vocab-card-front">
            <div class="vocab-word">Reservation</div>
            <div class="vocab-pron">/ˌrɛz.ərˈveɪ.ʃən/</div>
            <button type="button" class="speak-btn" data-text="Reservation" data-rate="1">🔊 Listen</button>
        </div>
        <div class="vocab-card-back">
            <div class="vocab-ar">حجز</div>
            <div class="vocab-example"><div class="en">I'd like to make a reservation for tonight.</div><div class="ar">حابب أعمل حجز لليلة النهاردة.</div></div>
        </div>
        <div class="vocab-card-hint">👆 دوس / Tap</div>
    </div>
    <div class="vocab-card">
        <div class="vocab-card-front">
            <div class="vocab-word">Bill</div>
            <div class="vocab-pron">/bɪl/</div>
            <button type="button" class="speak-btn" data-text="Bill" data-rate="1">🔊 Listen</button>
        </div>
        <div class="vocab-card-back">
            <div class="vocab-ar">الحساب</div>
            <div class="vocab-example"><div class="en">Can we have the bill, please?</div><div class="ar">ممكن الحساب، من فضلك؟</div></div>
        </div>
        <div class="vocab-card-hint">👆 دوس / Tap</div>
    </div>
    <div class="vocab-card">
        <div class="vocab-card-front">
            <div class="vocab-word">Waiter</div>
            <div class="vocab-pron">/ˈweɪ.tər/</div>
            <button type="button" class="speak-btn" data-text="Waiter" data-rate="1">🔊 Listen</button>
        </div>
        <div class="vocab-card-back">
            <div class="vocab-ar">الجرسون / الويتر</div>
            <div class="vocab-example"><div class="en">The waiter recommended the grilled fish.</div><div class="ar">الويتر رشّح السمك المشوي.</div></div>
        </div>
        <div class="vocab-card-hint">👆 دوس / Tap</div>
    </div>
    <div class="vocab-card">
        <div class="vocab-card-front">
            <div class="vocab-word">Recommend</div>
            <div class="vocab-pron">/ˌrɛk.əˈmɛnd/</div>
            <button type="button" class="speak-btn" data-text="Recommend" data-rate="1">🔊 Listen</button>
        </div>
        <div class="vocab-card-back">
            <div class="vocab-ar">ينصح / يقترح</div>
            <div class="vocab-example"><div class="en">What do you recommend from the menu?</div><div class="ar">بتنصح بإيه من المنيو؟</div></div>
        </div>
        <div class="vocab-card-hint">👆 دوس / Tap</div>
    </div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="table-for-two">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">لو سُألت "Do you have a reservation?" وعندك حجز فعلًا، إيه أفضل رد؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">If asked "Do you have a reservation?" and you do, what's the best response?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="table-for-two"> "Yes, a table for two under the name Ahmed."</label>
        <label><input type="radio" name="q1" value="broken"> "No reservation I want table."</label>
        <label><input type="radio" name="q1" value="silent"> متردش خالص</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="bill">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">أي كلمة معناها "الحساب"؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Which word means "the bill"?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="menu"> menu</label>
        <label><input type="radio" name="q2" value="bill"> bill</label>
        <label><input type="radio" name="q2" value="waiter"> waiter</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="will-take">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">إيه الصح: "I will ___ the chicken."؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What's correct: "I will ___ the chicken."?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="took"> took</label>
        <label><input type="radio" name="q3" value="will-take"> take</label>
        <label><input type="radio" name="q3" value="taking"> taking</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="ask-recommend">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">إزاي تسأل الويتر بشكل طبيعي عن اقتراح من المنيو؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">How do you naturally ask the waiter for a menu suggestion?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="what-is-good"> "What is good?"</label>
        <label><input type="radio" name="q4" value="ask-recommend"> "What do you recommend?"</label>
        <label><input type="radio" name="q4" value="silent"> ماتسألش خالص</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ اطلب أكلتك المفضلة / Order Your Favorite Meal</h3>
    <div class="ar">🇪🇬 اكتب على ورقة محادثة قصيرة تطلب فيها أكلتك المفضلة في مطعم متخيل — من "I'll have..." للمشروب، لطلب الحساب في الآخر بـ"Can I have the bill, please?".</div>
    <div class="en">🇬🇧 Write out a short conversation ordering your favorite meal at an imaginary restaurant — from "I'll have..." for the food, to a drink, to asking for the bill at the end with "Can I have the bill, please?".</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 اتدربت دلوقتي على محادثة كاملة في مطعم. الخطوة الجاية مش محادثة تانية — دي تمرين استماع: هتسمع محادثة طلب مشابهة وتجاوب على أسئلة فهم من غير ما تشوف النص الأول، عشان تقوي ودنك على الإنجليزي الحقيقي.</div>
    <div class="en">🇬🇧 You've now practiced a full restaurant conversation. Next isn't another dialogue — it's a listening exercise: you'll hear a similar ordering conversation and answer comprehension questions before seeing the transcript, to train your ear for real English.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>لما تطلب أكل، استخدم "I'll have..." مش "I will took...".</li>
        <li>"What do you recommend?" أطبع من "What is good?".</li>
        <li>حتى الردود القصيرة محتاجة لمسة أدب: "Just water, thanks" أحسن من "Water."</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="directions-transport.php">← المرحلة السابقة</a>
    <a href="a2-listening-1.php">المرحلة الجاية / Next: تمرين استماع - في المطعم →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
