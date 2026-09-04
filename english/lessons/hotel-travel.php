<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'hotel-travel';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'الفندق والسفر';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">B1 · Intermediate</span>
<h1>الفندق والسفر <span class="ltr">Hotel &amp; Travel</span></h1>
<p class="subtitle">محاكي محادثة لحجز فندق وإجراءات المطار — أهم موقف سفر هتقابله. هتتعامل مع موظف استقبال، هتحل مشكلة في الحجز، وهتسأل عن الإفطار والواي فاي وميعاد الخروج زي أي مسافر حقيقي.</p>

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
    <div class="ar">🇪🇬 تتدرب على تسجيل الدخول في فندق بحجز مسبق، تتعلم تتعامل مع مشكلة غير متوقعة في الحجز (زي غلطة في نوع الأوضة) بأدب واحترافية، وتسأل الأسئلة العملية اللي أي مسافر محتاجها: الإفطار، الواي فاي، وميعاد الخروج.</div>
    <div class="en">🇬🇧 Practice checking into a hotel with an existing reservation, learn to handle an unexpected complication (like a room-type mix-up) politely and professionally, and ask the practical questions every traveler needs: breakfast, Wi-Fi, and checkout time.</div>
</div>

<h2 id="understand">إزاي تستخدم المحاكي / How to Use the Simulator</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 نفس فكرة المحاكيات اللي جربتها قبل كده: هتقرا سطر من موظف الاستقبال (مترجم تلقائيًا تحته بالعربي)، وبعدين هتختار من بين ردّين. المرة دي هتواجه تعقيد حقيقي — الحجز مش زي ما كنت متوقع — وهتشوف إزاي ترد بثقة وأدب من غير ما تتوتر.</div>
    <div class="en">🇬🇧 Same idea as the simulators you've tried before: read a line from the receptionist (automatically translated under it), then pick one of two responses. This time you'll face a real complication — the reservation isn't what you expected — and you'll see how to respond with confidence and politeness without getting flustered.</div>
</div>

<h2 id="practice">💬 محاكي الفندق / Hotel Simulator</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>السيناريو:</b> وصلت لفندقك بعد رحلة طويلة، وعندك حجز مسبق أونلاين، ودلوقتي هتسجل دخولك.</div>
    <div class="en">🇬🇧 <b>Scenario:</b> You've arrived at your hotel after a long trip, you have an existing online reservation, and now you're checking in.</div>
</div>

<div class="dialogue-sim" data-dialogue='[{"speaker": "other", "label": "موظف الاستقبال / Receptionist", "en": "Good evening, welcome to the Grand Nile Hotel. Do you have a reservation with us?", "ar": "مساء الخير، أهلاً بيك في فندق جراند نايل. عندك حجز عندنا؟"}, {"speaker": "you", "choices": [{"en": "Good evening. Yes, I have a reservation under the name Ahmed Farouk.", "ar": "مساء الخير. أيوه، عندي حجز باسم أحمد فاروق.", "correct": true, "feedback_ar": "✅ رد واضح ومباشر — بتأكد إن عندك حجز وبتديله الاسم على طول من غير لف ودوران.", "next": 2}, {"en": "Yes I have room, my name is Ahmed.", "ar": "أيوه عندي أوضة، اسمي أحمد.", "correct": false, "feedback_ar": "❌ خطأ نحوي — الصح &#39;a reservation&#39; مش &#39;room&#39; لوحدها هنا، وناقصة أداة النكرة &#39;a&#39; قبل reservation، والجملة مقتضبة أكتر من اللازم لأول تعامل مع الاستقبال.", "next": 2}]}, {"speaker": "other", "label": "موظف الاستقبال / Receptionist", "en": "Let me check... I see your reservation, but it&#39;s actually for a single room, not a double. Is that going to be a problem?", "ar": "خليني أتأكد... لاقيت حجزك، بس هو فعليًا لأوضة مفردة، مش دبل. هل ده هيبقى مشكلة؟"}, {"speaker": "you", "choices": [{"en": "Actually, I booked a double room online. Could you please check again or offer an upgrade?", "ar": "في الحقيقة، أنا حجزت أوضة دبل أونلاين. ممكن تتأكد تاني أو تعرض علي ترقية؟", "correct": true, "feedback_ar": "✅ رد ممتاز — بيوضح المشكلة بأدب من غير ما يبقى عدواني، وبيسأل عن حل عملي (upgrade) بدل ما يشتكي بس.", "next": 4}, {"en": "No problem, whatever, single is fine I guess.", "ar": "معلش، أي حاجة، مفردة تمام أظن.", "correct": false, "feedback_ar": "❌ رد سلبي وغير واضح — بتستسلم فورًا من غير ما توضح إنك حجزت حاجة مختلفة، وده ممكن يخليك تدفع أو تنام في أوضة أصغر من غير داعي.", "next": 4}]}, {"speaker": "other", "label": "موظف الاستقبال / Receptionist", "en": "I&#39;m sorry for the confusion. We do have a double room available — there&#39;s a small extra charge of 15 dollars per night. Would that work for you?", "ar": "آسف على اللخبطة. عندنا أوضة دبل متاحة — فيه فرق بسيط 15 دولار في الليلة. ده هيكون مناسب؟"}, {"speaker": "you", "choices": [{"en": "Yes, that works for me. Thank you for sorting it out.", "ar": "أيوه، ده مناسب. شكرًا إنك حليت الموضوع.", "correct": true, "feedback_ar": "✅ رد إيجابي ومهذب — بتوافق على الحل وبتشكر الموظف، وده بيخلي التعامل يمشي بسلاسة.", "next": 6}, {"en": "Fifteen dollar is too much money, no way.", "ar": "خمستاشر دولار كتير قوي، مستحيل.", "correct": false, "feedback_ar": "❌ خطأ نحوي — &#39;dollar&#39; لازم تكون جمع &#39;dollars&#39; بعد رقم أكبر من واحد، وكمان الأسلوب فظ وحاد أكتر من اللازم لمبلغ بسيط.", "next": 6}]}, {"speaker": "other", "label": "موظف الاستقبال / Receptionist", "en": "Perfect, here is your key card. Breakfast is complimentary and served from 7 to 10 AM in the main restaurant. Is there anything else you&#39;d like to know?", "ar": "تمام، اتفضل كارت الأوضة. الإفطار مجاني وبيتقدم من 7 لحد 10 الصبح في المطعم الرئيسي. فيه حاجة تانية حابب تعرفها؟"}, {"speaker": "you", "choices": [{"en": "Yes, actually — could you tell me the Wi-Fi password, please?", "ar": "أيوه، فعلًا — ممكن تقولي باسورد الواي فاي، من فضلك؟", "correct": true, "feedback_ar": "✅ رد طبيعي ومهذب — بيستخدم &#39;could you&#39; كأسلوب مؤدب للطلب، وهو سؤال شائع جدًا في أي فندق.", "next": 8}, {"en": "Give me internet password now.", "ar": "هاتلي باسورد النت دلوقتي.", "correct": false, "feedback_ar": "❌ أمر مباشر وغير مهذب من غير &#39;please&#39; أو صيغة سؤال، ده مناسب أكتر لصديق مش لموظف استقبال في أول تعامل.", "next": 8}]}, {"speaker": "other", "label": "موظف الاستقبال / Receptionist", "en": "Of course, the password is printed on the card in your room. One last thing — what time would you like your checkout to be?", "ar": "أكيد، الباسورد مطبوع على الكارت اللي في أوضتك. حاجة أخيرة — تحب توقيت خروجك يكون إمتى؟"}, {"speaker": "you", "choices": [{"en": "Standard checkout is fine, but could you remind me what time that is?", "ar": "وقت الخروج العادي تمام، بس ممكن تفكرني هو إمتى؟", "correct": true, "feedback_ar": "✅ رد ذكي — بيقبل الوضع العادي بس بيتأكد من التفاصيل بدل ما يفترض ويتفاجئ بعدين.", "next": 10}, {"en": "I don&#39;t know, whenever, not important for me.", "ar": "مش عارف، إمتى ما كان، مش مهم بالنسبالي.", "correct": false, "feedback_ar": "❌ رد لا مبالي وغامض — عدم تحديد ميعاد الخروج ممكن يسبب مشكلة فعلية زي فلوس إضافية لو خرجت متأخر.", "next": 10}]}, {"speaker": "other", "label": "موظف الاستقبال / Receptionist", "en": "Checkout time is 12 PM. If you need a late checkout, just call the front desk in the morning. Enjoy your stay!", "ar": "وقت الخروج الساعة 12 الضهر. لو محتاج تتأخر شوية، اتصل بالاستقبال الصبح. إقامة سعيدة!"}, {"speaker": "you", "choices": [{"en": "Thank you so much for your help, have a good evening.", "ar": "شكرًا جزيلًا على مساعدتك، أمسية سعيدة.", "correct": true, "feedback_ar": "✅ ختام مهذب ودافئ — أفضل طريقة تنهي بيها أي تعامل خدمي بشكل احترافي.", "next": 12}, {"en": "Ok whatever, bye.", "ar": "طيب أي حاجة، باي.", "correct": false, "feedback_ar": "❌ ختام جاف وغير مهذب بعد ما الموظف حل مشكلتك وساعدك — رد أدفأ كان أنسب بكتير.", "next": 12}]}]'>
    <div class="dialogue-scenario">📍 تسجيل الدخول في فندق بعد حجز مسبق / Checking into a hotel with an existing reservation</div>
    <div class="dialogue-log"></div>
    <div class="dialogue-choices"></div>
    <button class="dialogue-restart-btn" hidden>🔄 ابدأ من جديد / Restart</button>
</div>

<h2>مفردات الفندق والسفر / Hotel &amp; Travel Vocabulary</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 دوس على أي بطاقة عشان تشوف الترجمة والمثال.</div>
    <div class="en">🇬🇧 Click any card to reveal the translation and example.</div>
</div>
<div class="vocab-grid">
    <div class="vocab-card">
        <div class="vocab-card-front">
            <div class="vocab-word">Reservation</div>
            <div class="vocab-pron">/ˌrɛz.ərˈveɪ.ʃən/</div>
            <button type="button" class="speak-btn" data-text="Reservation" data-rate="1">🔊 Listen</button>
        </div>
        <div class="vocab-card-back">
            <div class="vocab-ar">حجز</div>
            <div class="vocab-example"><div class="en">I made a reservation for two nights.</div><div class="ar">عملت حجز لليلتين.</div></div>
        </div>
        <div class="vocab-card-hint">👆 دوس / Tap</div>
    </div>
    <div class="vocab-card">
        <div class="vocab-card-front">
            <div class="vocab-word">Check-in / Check-out</div>
            <div class="vocab-pron">/ˈtʃɛk.ɪn/ /ˈtʃɛk.aʊt/</div>
            <button type="button" class="speak-btn" data-text="Check-in and check-out" data-rate="1">🔊 Listen</button>
        </div>
        <div class="vocab-card-back">
            <div class="vocab-ar">تسجيل الوصول / تسجيل المغادرة</div>
            <div class="vocab-example"><div class="en">Check-in is at 2 PM and check-out is at 12 PM.</div><div class="ar">تسجيل الوصول الساعة 2 الضهر وتسجيل المغادرة الساعة 12.</div></div>
        </div>
        <div class="vocab-card-hint">👆 دوس / Tap</div>
    </div>
    <div class="vocab-card">
        <div class="vocab-card-front">
            <div class="vocab-word">Receptionist</div>
            <div class="vocab-pron">/rɪˈsɛp.ʃən.ɪst/</div>
            <button type="button" class="speak-btn" data-text="Receptionist" data-rate="1">🔊 Listen</button>
        </div>
        <div class="vocab-card-back">
            <div class="vocab-ar">موظف/ة استقبال</div>
            <div class="vocab-example"><div class="en">The receptionist gave me my key card.</div><div class="ar">موظف الاستقبال ديني كارت الأوضة.</div></div>
        </div>
        <div class="vocab-card-hint">👆 دوس / Tap</div>
    </div>
    <div class="vocab-card">
        <div class="vocab-card-front">
            <div class="vocab-word">Luggage</div>
            <div class="vocab-pron">/ˈlʌɡ.ɪdʒ/</div>
            <button type="button" class="speak-btn" data-text="Luggage" data-rate="1">🔊 Listen</button>
        </div>
        <div class="vocab-card-back">
            <div class="vocab-ar">الأمتعة / الشنط</div>
            <div class="vocab-example"><div class="en">Can you help me with my luggage, please?</div><div class="ar">ممكن تساعدني في شيل الشنط، من فضلك؟</div></div>
        </div>
        <div class="vocab-card-hint">👆 دوس / Tap</div>
    </div>
    <div class="vocab-card">
        <div class="vocab-card-front">
            <div class="vocab-word">Complimentary</div>
            <div class="vocab-pron">/ˌkɒm.plɪˈmɛn.tər.i/</div>
            <button type="button" class="speak-btn" data-text="Complimentary" data-rate="1">🔊 Listen</button>
        </div>
        <div class="vocab-card-back">
            <div class="vocab-ar">مجاني (كخدمة إضافية)</div>
            <div class="vocab-example"><div class="en">Breakfast is complimentary for all hotel guests.</div><div class="ar">الإفطار مجاني لكل نزلاء الفندق.</div></div>
        </div>
        <div class="vocab-card-hint">👆 دوس / Tap</div>
    </div>
</div>

<h2>🔊 استمع وتمرّن / Listen &amp; Practice</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 اسمع الجملة الأهم في الدرس ده بسرعة عادية أو بطيئة، وبعدين جرب تسجل نفسك وانت بتقولها.</div>
    <div class="en">🇬🇧 Listen to this lesson's key phrase at normal or slow speed, then try recording yourself saying it.</div>
</div>
<div class="pronunciation-box">
    <div class="pronunciation-word">Could you check that again, please?</div>
    <div class="pronunciation-ipa">/kʊd juː tʃɛk ðæt əˈɡɛn pliːz/</div>
    <div class="pronunciation-ar">ممكن تتأكد تاني، من فضلك؟</div>
    <div class="pronunciation-controls">
        <button type="button" class="speak-btn" data-text="Could you check that again, please?" data-rate="1">🔊 Listen</button>
        <button type="button" class="speak-btn" data-text="Could you check that again, please?" data-rate="0.6">🐢 Slow</button>
    </div>
    <div class="pronunciation-example">
        <div class="en">Actually, I booked a double room online. Could you please check again?</div>
        <div class="ar">في الحقيقة، أنا حجزت أوضة دبل أونلاين. ممكن تتأكد تاني؟</div>
    </div>
</div>
<div class="speak-practice">
    <div class="speak-practice-target">
        <span class="en">"I have a reservation under the name Ahmed Farouk."</span>
        <span class="ar">عندي حجز باسم أحمد فاروق.</span>
        <button type="button" class="speak-btn" data-text="I have a reservation under the name Ahmed Farouk." data-rate="1">🔊 Listen</button>
    </div>
    <button type="button" class="speak-record-btn" data-recording="0">🎙 ابدأ التسجيل / Start Recording</button>
    <div class="speak-recording-playback"></div>
    <div class="speak-practice-status"></div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="a-reservation">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">إيه الصيغة الصحيحة؟ "I have ___ under the name Ahmed."<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What's the correct form?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="room"> room</label>
        <label><input type="radio" name="q1" value="a-reservation"> a reservation</label>
        <label><input type="radio" name="q1" value="reservations-since"> reservations since</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="complimentary">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">أي كلمة معناها "مجاني كخدمة إضافية"؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Which word means "free as an included service"?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="complimentary"> complimentary</label>
        <label><input type="radio" name="q2" value="luggage"> luggage</label>
        <label><input type="radio" name="q2" value="reservation"> reservation</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="polite-upgrade">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">لو الفندق حجزلك أوضة غلط عن اللي طلبتها، إيه أفضل رد؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">If the hotel booked you the wrong room, what's the best response?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="polite-upgrade"> توضح المشكلة بأدب وتسأل عن حل</label>
        <label><input type="radio" name="q3" value="give-up"> توافق فورًا وتسكت</label>
        <label><input type="radio" name="q3" value="shout"> تتكلم بحدة مع الموظف</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="fifteen-dollars">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">إيه الصيغة الصحيحة؟ "The extra charge is ___ per night."<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What's the correct form?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="fifteen-dollar"> fifteen dollar</label>
        <label><input type="radio" name="q4" value="fifteen-dollars"> fifteen dollars</label>
        <label><input type="radio" name="q4" value="fifteen-dollaring"> fifteen dollaring</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ اكتب موقفك بنفسك / Write Your Own Situation</h3>
    <div class="ar">🇪🇬 اكتب على ورقة محادثة تسجيل دخول في فندق زي دي، لكن اختلق مشكلة مختلفة (زي أوضة مش نضيفة، أو مفيش إطلالة على البحر اللي طلبتها). اكتب ردّك المهذب والاحترافي، واقراه بصوت عالي.</div>
    <div class="en">🇬🇧 Write out a hotel check-in conversation like this one, but invent a different problem (like an unclean room, or a missing sea view you requested). Write your polite, professional response, and read it aloud.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 خلاص عرفت تتعامل مع أي موقف في الفندق. المرحلة الجاية، "المكالمات الهاتفية"، هتاخدك لمهارة سفر وشغل تانية أساسية: إزاي تبدأ مكالمة تليفون، تستنى على الخط، وتسيب رسالة صوتية بثقة.</div>
    <div class="en">🇬🇧 You can now handle any hotel situation. The next stage, "Phone Calls," takes you to another essential travel and work skill: how to start a phone call, hold the line, and leave a voicemail with confidence.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>لما تواجه مشكلة في حجزك، وضّح الموقف بأدب واسأل عن حل بدل ما تستسلم أو تتعصب.</li>
        <li>"Could you...?" و"Would that work for you?" صيغ مؤدبة أساسية في أي تعامل خدمي.</li>
        <li>مفردات جديدة: reservation, check-in/check-out, receptionist, luggage, complimentary.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="a2-listening-1.php">← المرحلة السابقة</a>
    <a href="phone-calls.php">المرحلة الجاية / Next: المكالمات الهاتفية →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
