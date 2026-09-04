<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'phone-calls';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'المكالمات الهاتفية';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">B1 · Intermediate</span>
<h1>المكالمات الهاتفية <span class="ltr">Phone Calls</span></h1>
<p class="subtitle">تبدأ مكالمة، تسيب رسالة صوتية، وتتعامل مع سوء الاتصال بثقة. محاكي المحادثة تحت هيحطّك في موقف حقيقي جدًا: تتصل بشركة، تستنى على الخط، يتحول اتصالك، وفي الآخر تسيب رسالة صوتية لأن الشخص المطلوب مش موجود.</p>

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
    <div class="ar">🇪🇬 تتدرب على مكالمة تليفون كاملة بالإنجليزي — من أول ما تطلب الشخص اللي عايزه، لحد ما تستنى على الخط، تتحول لقسم تاني، وفي النهاية تسيب رسالة صوتية واضحة ومنظمة لما الشخص المطلوب مش موجود.</div>
    <div class="en">🇬🇧 Practice a complete English phone call — from asking for the person you need, to holding the line, being transferred to another department, and finally leaving a clear, organized voicemail when that person isn't available.</div>
</div>

<h2 id="understand">إزاي تستخدم المحاكي / How to Use the Simulator</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 نفس فكرة المحاكيات السابقة: هتقرا سطر من الطرف التاني في المكالمة، وتختار من بين ردّين. المكالمات التليفونية صعبة لأنك مش شايف وش الشخص التاني — لازم تكون واضح ومباشر أكتر من أي وقت.</div>
    <div class="en">🇬🇧 Same idea as the previous simulators: read a line from the other side of the call, then pick one of two responses. Phone calls are hard because you can't see the other person's face — you need to be clearer and more direct than ever.</div>
</div>

<h2 id="practice">💬 محاكي المكالمة / Phone Call Simulator</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>السيناريو:</b> بتتصل بشركة BrightTech Solutions عشان تتكلم مع حد في قسم الفواتير بخصوص مشكلة في فاتورتك.</div>
    <div class="en">🇬🇧 <b>Scenario:</b> You're calling BrightTech Solutions to speak with someone in the billing department about a problem with your invoice.</div>
</div>

<div class="dialogue-sim" data-dialogue='[{"speaker": "other", "label": "موظفة الاستقبال / Receptionist", "en": "Thank you for calling BrightTech Solutions, this is Laura speaking. How can I help you?", "ar": "شكرًا لاتصالك ببرايت تك سوليوشنز، معاكي لورا. أقدر أساعدك إزاي؟"}, {"speaker": "you", "choices": [{"en": "Hi Laura, I&#39;d like to speak with someone in the billing department, please.", "ar": "أهلاً لورا، حابب أتكلم مع حد في قسم الفواتير، من فضلك.", "correct": true, "feedback_ar": "✅ رد واضح ومهذب — بيستخدم &#39;I&#39;d like to&#39; وهي صيغة مؤدبة قياسية لطلب حاجة في المكالمات الرسمية.", "next": 2}, {"en": "Give me billing department person now, quick.", "ar": "هاتلي واحد من قسم الفواتير دلوقتي، بسرعة.", "correct": false, "feedback_ar": "❌ أمر فظ ومستعجل من غير أي صيغة تهذيب — غير مناسب خالص لمكالمة رسمية مع شركة.", "next": 2}]}, {"speaker": "other", "label": "موظفة الاستقبال / Receptionist", "en": "Of course. Can you hold the line for a moment while I transfer you?", "ar": "أكيد. ممكن تفضل على الخط لحظة لحد ما أحولك؟"}, {"speaker": "you", "choices": [{"en": "Sure, no problem, I&#39;ll wait.", "ar": "أكيد، مفيش مشكلة، هستنى.", "correct": true, "feedback_ar": "✅ رد بسيط ومناسب تمامًا — الموافقة على الانتظار برد قصير ومهذب هي بالظبط المتوقع هنا.", "next": 4}, {"en": "No, I not have time for wait, hurry up.", "ar": "لأ، معنديش وقت للانتظار، استعجلي.", "correct": false, "feedback_ar": "❌ خطأ نحوي — الصح &#39;I don&#39;t have time to wait&#39;، وكمان الأسلوب حاد وغير مقبول مع موظفة بتحاول تساعدك.", "next": 4}]}, {"speaker": "other", "label": "موظفة الاستقبال / Receptionist", "en": "Thanks for holding. I&#39;m transferring you to the billing department now.", "ar": "شكرًا على انتظارك. هحولك لقسم الفواتير دلوقتي."}, {"speaker": "you", "choices": [{"en": "Thank you, I appreciate it.", "ar": "شكرًا، بقدّر ده.", "correct": true, "feedback_ar": "✅ رد قصير ودافئ — مناسب تمامًا في اللحظة اللي بتتحول فيها المكالمة.", "next": 6}, {"en": "Finally, took long enough.", "ar": "أخيرًا، خدت وقت كفاية.", "correct": false, "feedback_ar": "❌ رد ساخر وغير مهذب — الشكوى من مدة الانتظار بأسلوب زي ده بتدي انطباع سيء من غير أي داعي.", "next": 6}]}, {"speaker": "other", "label": "موظف قسم الفواتير / Billing Agent", "en": "Hello, this is Mark from Billing. I&#39;m sorry, but the account specialist you need is not available right now. Would you like to leave a voicemail?", "ar": "أهلاً، معاك مارك من قسم الفواتير. آسف، بس أخصائي الحساب اللي محتاجه مش متاح دلوقتي. حابب تسيب رسالة صوتية؟"}, {"speaker": "you", "choices": [{"en": "Yes, please, that would be great.", "ar": "أيوه، من فضلك، ده هيكون ممتاز.", "correct": true, "feedback_ar": "✅ موافقة واضحة ومهذبة — بتاخد فرصة ترك رسالة بدل ما تقفل وتفضل مش عارف رقم أو حل.", "next": 8}, {"en": "No, forget it, this company is useless.", "ar": "لأ، انسى الموضوع، الشركة دي مالهاش لازمة.", "correct": false, "feedback_ar": "❌ رد غاضب وغير بناء — بيقفل الباب على أي حل ممكن، وبيهين الموظف اللي مش غلطته أصلًا.", "next": 8}]}, {"speaker": "other", "label": "موظف قسم الفواتير / Billing Agent", "en": "Great, please leave your name, phone number, and the reason for your call after the beep.", "ar": "تمام، من فضلك سيب اسمك، رقم تليفونك، وسبب اتصالك بعد الصفارة."}, {"speaker": "you", "choices": [{"en": "Hi, this is Ahmed Farouk. My phone number is 555-0192. I&#39;m calling about an incorrect charge on my last invoice. Please call me back when possible.", "ar": "أهلاً، معاك أحمد فاروق. رقم تليفوني 555-0192. بتصل بخصوص رسوم غلط في آخر فاتورة. من فضلك اتصل بيا تاني لما تقدر.", "correct": true, "feedback_ar": "✅ رسالة صوتية ممتازة — واضحة، منظمة، وفيها كل التفاصيل الأساسية (الاسم، الرقم، السبب، وطلب معاودة الاتصال) اللي محتاجها أي حد يسمعها بعدين.", "next": 10}, {"en": "Hey it&#39;s me, call back about the money thing, bye.", "ar": "هاي أنا، اتصل تاني بخصوص موضوع الفلوس، باي.", "correct": false, "feedback_ar": "❌ رسالة غامضة وناقصة — من غير اسمك أو رقمك، مفيش طريقة إن حد يرجعلك، وكلمة &#39;the money thing&#39; مش وصف واضح للمشكلة.", "next": 10}]}, {"speaker": "other", "label": "نظام الرسائل الصوتية / Voicemail System", "en": "Your message has been recorded. Someone from our team will call you back within 24 hours. Thank you for calling BrightTech Solutions.", "ar": "تم تسجيل رسالتك. حد من فريقنا هيتصل بيك تاني خلال 24 ساعة. شكرًا لاتصالك ببرايت تك سوليوشنز."}, {"speaker": "you", "choices": [{"en": "Thank you, goodbye.", "ar": "شكرًا، مع السلامة.", "correct": true, "feedback_ar": "✅ ختام بسيط ومهذب — بينهي المكالمة بشكل احترافي بعد ما خلصت كل حاجة محتاجها.", "next": 12}, {"en": "Whatever, bye.", "ar": "أي حاجة، باي.", "correct": false, "feedback_ar": "❌ ختام جاف وغير مبالي بعد مكالمة كان فيها تعاون من الشركة معاك — رد أدفأ كان أنسب.", "next": 12}]}]'>
    <div class="dialogue-scenario">📍 مكالمة بشركة عن مشكلة في الفاتورة / Calling a company about a billing issue</div>
    <div class="dialogue-log"></div>
    <div class="dialogue-choices"></div>
    <button class="dialogue-restart-btn" hidden>🔄 ابدأ من جديد / Restart</button>
</div>

<h2>مفردات المكالمات الهاتفية / Phone Call Vocabulary</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 دوس على أي بطاقة عشان تشوف الترجمة والمثال.</div>
    <div class="en">🇬🇧 Click any card to reveal the translation and example.</div>
</div>
<div class="vocab-grid">
    <div class="vocab-card">
        <div class="vocab-card-front">
            <div class="vocab-word">Hold the line</div>
            <div class="vocab-pron">/hoʊld ðə laɪn/</div>
            <button type="button" class="speak-btn" data-text="Hold the line" data-rate="1">🔊 Listen</button>
        </div>
        <div class="vocab-card-back">
            <div class="vocab-ar">تنتظر على الخط</div>
            <div class="vocab-example"><div class="en">Can you hold the line for a moment, please?</div><div class="ar">ممكن تنتظر على الخط لحظة، من فضلك؟</div></div>
        </div>
        <div class="vocab-card-hint">👆 دوس / Tap</div>
    </div>
    <div class="vocab-card">
        <div class="vocab-card-front">
            <div class="vocab-word">Transfer</div>
            <div class="vocab-pron">/trænsˈfɜːr/</div>
            <button type="button" class="speak-btn" data-text="Transfer" data-rate="1">🔊 Listen</button>
        </div>
        <div class="vocab-card-back">
            <div class="vocab-ar">يحوّل (مكالمة)</div>
            <div class="vocab-example"><div class="en">I'm transferring you to the billing department.</div><div class="ar">هحولك لقسم الفواتير.</div></div>
        </div>
        <div class="vocab-card-hint">👆 دوس / Tap</div>
    </div>
    <div class="vocab-card">
        <div class="vocab-card-front">
            <div class="vocab-word">Voicemail</div>
            <div class="vocab-pron">/ˈvɔɪs.meɪl/</div>
            <button type="button" class="speak-btn" data-text="Voicemail" data-rate="1">🔊 Listen</button>
        </div>
        <div class="vocab-card-back">
            <div class="vocab-ar">رسالة صوتية</div>
            <div class="vocab-example"><div class="en">Please leave a voicemail after the beep.</div><div class="ar">من فضلك سيب رسالة صوتية بعد الصفارة.</div></div>
        </div>
        <div class="vocab-card-hint">👆 دوس / Tap</div>
    </div>
    <div class="vocab-card">
        <div class="vocab-card-front">
            <div class="vocab-word">Call back</div>
            <div class="vocab-pron">/kɔːl bæk/</div>
            <button type="button" class="speak-btn" data-text="Call back" data-rate="1">🔊 Listen</button>
        </div>
        <div class="vocab-card-back">
            <div class="vocab-ar">يتصل مرة أخرى</div>
            <div class="vocab-example"><div class="en">Someone will call you back within 24 hours.</div><div class="ar">حد هيتصل بيك تاني خلال 24 ساعة.</div></div>
        </div>
        <div class="vocab-card-hint">👆 دوس / Tap</div>
    </div>
    <div class="vocab-card">
        <div class="vocab-card-front">
            <div class="vocab-word">Extension</div>
            <div class="vocab-pron">/ɪkˈstɛn.ʃən/</div>
            <button type="button" class="speak-btn" data-text="Extension" data-rate="1">🔊 Listen</button>
        </div>
        <div class="vocab-card-back">
            <div class="vocab-ar">رقم تحويلة داخلي</div>
            <div class="vocab-example"><div class="en">Please dial extension 205 for the sales team.</div><div class="ar">من فضلك اطلب التحويلة 205 لفريق المبيعات.</div></div>
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
    <div class="pronunciation-word">I'd like to speak with someone in billing.</div>
    <div class="pronunciation-ipa">/aɪd laɪk tuː spiːk wɪð ˈsʌm.wʌn ɪn ˈbɪl.ɪŋ/</div>
    <div class="pronunciation-ar">حابب أتكلم مع حد في قسم الفواتير.</div>
    <div class="pronunciation-controls">
        <button type="button" class="speak-btn" data-text="I'd like to speak with someone in billing." data-rate="1">🔊 Listen</button>
        <button type="button" class="speak-btn" data-text="I'd like to speak with someone in billing." data-rate="0.6">🐢 Slow</button>
    </div>
    <div class="pronunciation-example">
        <div class="en">Hi Laura, I'd like to speak with someone in the billing department, please.</div>
        <div class="ar">أهلاً لورا، حابب أتكلم مع حد في قسم الفواتير، من فضلك.</div>
    </div>
</div>
<div class="speak-practice">
    <div class="speak-practice-target">
        <span class="en">"Could you please call me back when possible?"</span>
        <span class="ar">ممكن تتصل بيا تاني لما تقدر؟</span>
        <button type="button" class="speak-btn" data-text="Could you please call me back when possible?" data-rate="1">🔊 Listen</button>
    </div>
    <button type="button" class="speak-record-btn" data-recording="0">🎙 ابدأ التسجيل / Start Recording</button>
    <div class="speak-recording-playback"></div>
    <div class="speak-practice-status"></div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="id-like">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">إيه أكتر صيغة مهذبة لطلب حاجة في مكالمة رسمية؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Which is the most polite way to ask for something on a formal call?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="give-me"> "Give me..."</label>
        <label><input type="radio" name="q1" value="id-like"> "I'd like to speak with..."</label>
        <label><input type="radio" name="q1" value="now"> "Now, please."</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="voicemail">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">أي كلمة معناها "رسالة صوتية"؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Which word means "a recorded audio message"?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="voicemail"> voicemail</label>
        <label><input type="radio" name="q2" value="extension"> extension</label>
        <label><input type="radio" name="q2" value="transfer"> transfer</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="full-details">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">إيه أهم حاجة لازم تكون موجودة في رسالة صوتية كويسة؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What's most important in a good voicemail message?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="full-details"> اسمك، رقمك، وسبب اتصالك بوضوح</label>
        <label><input type="radio" name="q3" value="vague"> تسيب رسالة قصيرة وغامضة</label>
        <label><input type="radio" name="q3" value="hangup"> تقفل من غير ما تسيب رسالة</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="dont-have">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">إيه الصيغة الصحيحة؟ "I ___ time to wait right now."<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What's the correct form?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="not-have"> not have</label>
        <label><input type="radio" name="q4" value="dont-have"> don't have</label>
        <label><input type="radio" name="q4" value="having-not"> having not</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ اكتب رسالتك الصوتية / Write Your Own Voicemail</h3>
    <div class="ar">🇪🇬 اكتب على ورقة رسالة صوتية كاملة زي اللي في الدرس، لكن بموضوع مختلف (زي متابعة طلب شغل، أو الاستفسار عن موعد). لازم تشمل: اسمك، رقمك، سبب اتصالك، وطلب معاودة الاتصال. اقراها بصوت عالي كإنك فعلًا بتسيبها.</div>
    <div class="en">🇬🇧 Write out a complete voicemail message like the one in the lesson, but about a different topic (like following up on a job application, or asking about an appointment). Include: your name, your number, your reason for calling, and a request for a callback. Read it aloud as if you were really leaving it.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 دلوقتي تقدر تتعامل مع أي مكالمة تليفون رسمية بثقة. المرحلة الجاية، "زيارة الدكتور"، هتاخدك لموقف حياتي مهم تاني: وصف أعراضك وفهم تعليمات الدكتور بالإنجليزي.</div>
    <div class="en">🇬🇧 You can now handle any formal phone call with confidence. The next stage, "Visiting the Doctor," takes you to another important life situation: describing your symptoms and understanding a doctor's instructions in English.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>في المكالمات الرسمية، استخدم صيغ مهذبة زي "I'd like to..." و"Could you...?" بدل الأوامر المباشرة.</li>
        <li>الرسالة الصوتية الكويسة لازم تشمل: الاسم، الرقم، السبب، وطلب معاودة الاتصال.</li>
        <li>مفردات جديدة: hold the line, transfer, voicemail, call back, extension.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="hotel-travel.php">← المرحلة السابقة</a>
    <a href="health-doctor.php">المرحلة الجاية / Next: زيارة الدكتور →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
