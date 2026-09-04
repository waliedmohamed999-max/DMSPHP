<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'b1-listening-1';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'تمرين استماع: مكالمة هاتفية';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">B1 · Intermediate</span>
<h1>تمرين استماع: مكالمة هاتفية <span class="ltr">Listening Practice: A Phone Call</span></h1>
<p class="subtitle">اسمع مكالمة هاتفية حقيقية بين موظفة خدمة عملاء وعميل بخصوص طلب اتأخر، وجاوب على أسئلة تفصيلية. حاول تجاوب من غير ما تشوف النص المكتوب الأول.</p>

<div class="step-tracker">
    <a href="#read">📖 Read</a>
    <a href="#listen">🎧 Listen</a>
    <a href="#quiz">🧠 Quiz</a>
    <a href="#challenge">🛠️ Challenge</a>
    <a href="#project">🚀 Project</a>
</div>

<h2 id="read">الهدف / Goal</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 تتدرب على فهم الاستماع في موقف واقعي — مكالمة خدمة عملاء عن مشكلة توصيل — من غير ما تعتمد على النص المكتوب. الهدف إنك تفهم التفاصيل المهمة (رقم الطلب، سبب التأخير، والتعويض) من الصوت لوحده.</div>
    <div class="en">🇬🇧 Practice listening comprehension in a realistic situation — a customer support call about a delivery problem — without relying on the written text. The goal is to understand the key details (order number, reason for delay, and compensation) from the audio alone.</div>
</div>

<h2 id="listen">🎧 اسمع المكالمة / Listen to the Call</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 دوس "Listen" واسمع المكالمة كاملة، وحاول تفهم التفاصيل. لو صعبة، جرب السرعة البطيئة "Slow" قبل ما تدوس على "إظهار النص" وتغش.</div>
    <div class="en">🇬🇧 Press "Listen" and hear the full call, and try to understand the details. If it's difficult, try the "Slow" speed before pressing "Show Transcript" to cheat.</div>
</div>

<div class="listening-exercise">
    <p style="margin-bottom:10px;color:var(--muted);font-size:0.9rem">🎧 اسمع المكالمة، وحاول تجاوب على الأسئلة قبل ما تشوف النص المكتوب.</p>
    <div class="listening-controls">
        <button type="button" class="speak-btn" data-text="Agent: Good afternoon, customer support, this is Sarah speaking. How can I help you? Customer: Hi Sarah, I'm calling about an order that hasn't arrived. It was due three days ago. Agent: I'm sorry for the inconvenience. Could you give me your order number, please? Customer: Yes, it's 48213. Agent: Thank you. I can see it was delayed at the shipping center due to bad weather. It should arrive by tomorrow evening. Customer: Will I get anything for the delay? Agent: Since the delay was longer than 48 hours, you're eligible for a ten percent discount on your next order. Customer: That sounds fair, thank you for checking." data-rate="1">🔊 Listen</button>
        <button type="button" class="speak-btn" data-text="Agent: Good afternoon, customer support, this is Sarah speaking. How can I help you? Customer: Hi Sarah, I'm calling about an order that hasn't arrived. It was due three days ago. Agent: I'm sorry for the inconvenience. Could you give me your order number, please? Customer: Yes, it's 48213. Agent: Thank you. I can see it was delayed at the shipping center due to bad weather. It should arrive by tomorrow evening. Customer: Will I get anything for the delay? Agent: Since the delay was longer than 48 hours, you're eligible for a ten percent discount on your next order. Customer: That sounds fair, thank you for checking." data-rate="0.7">🐢 Slow</button>
        <button type="button" class="listening-transcript-toggle">📄 إظهار النص / Show Transcript</button>
    </div>
    <div class="listening-transcript" hidden>
        <div class="en">Agent: Good afternoon, customer support, this is Sarah speaking. How can I help you?
Customer: Hi Sarah, I'm calling about an order that hasn't arrived. It was due three days ago.
Agent: I'm sorry for the inconvenience. Could you give me your order number, please?
Customer: Yes, it's 48213.
Agent: Thank you. I can see it was delayed at the shipping center due to bad weather. It should arrive by tomorrow evening.
Customer: Will I get anything for the delay?
Agent: Since the delay was longer than 48 hours, you're eligible for a ten percent discount on your next order.
Customer: That sounds fair, thank you for checking.</div>
        <div class="ar">الموظفة: مساء الخير، خدمة العملاء، معاكي سارة. أقدر أساعدك إزاي؟
العميل: أهلاً سارة، بتصل بخصوص طلب لسه ماوصلش. كان المفروض يوصل من تلات أيام.
الموظفة: آسفة على الإزعاج. ممكن تدّيني رقم الطلب، من فضلك؟
العميل: أيوه، هو 48213.
الموظفة: شكرًا. باين إن الطلب اتأخر في مركز الشحن بسبب سوء الأحوال الجوية. المفروض يوصل بحلول بكرة بالليل.
العميل: هاخد حاجة مقابل التأخير؟
الموظفة: بما إن التأخير أكتر من 48 ساعة، أنت مؤهل لخصم 10% على طلبك الجاي.
العميل: ده معقول، شكرًا على المتابعة.</div>
    </div>
    <div class="listening-questions">
        <h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
        <div class="quiz-box" data-correct="late-order">
            <h3>سؤال 1 / Question 1</h3>
            <p class="quiz-question">العميل بيتصل بخصوص إيه؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What is the customer calling about?</span></p>
            <div class="quiz-options">
                <label><input type="radio" name="q1" value="late-order"> طلب لسه ماوصلش من تلات أيام</label>
                <label><input type="radio" name="q1" value="wrong-item"> منتج غلط وصله</label>
                <label><input type="radio" name="q1" value="cancel-order"> عايز يلغي طلبه</label>
            </div>
            <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
            <div class="quiz-feedback"></div>
        </div>

        <div class="quiz-box" data-correct="bad-weather">
            <h3>سؤال 2 / Question 2</h3>
            <p class="quiz-question">إيه سبب تأخير الطلب؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What caused the delay?</span></p>
            <div class="quiz-options">
                <label><input type="radio" name="q2" value="bad-weather"> سوء الأحوال الجوية عند مركز الشحن</label>
                <label><input type="radio" name="q2" value="wrong-address"> عنوان غلط</label>
                <label><input type="radio" name="q2" value="no-stock"> المنتج مش متوفر</label>
            </div>
            <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
            <div class="quiz-feedback"></div>
        </div>

        <div class="quiz-box" data-correct="ten-percent">
            <h3>سؤال 3 / Question 3</h3>
            <p class="quiz-question">إيه التعويض اللي هياخده العميل؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What compensation will the customer receive?</span></p>
            <div class="quiz-options">
                <label><input type="radio" name="q3" value="full-refund"> استرداد كامل للفلوس</label>
                <label><input type="radio" name="q3" value="ten-percent"> خصم 10% على الطلب الجاي</label>
                <label><input type="radio" name="q3" value="free-shipping"> شحن مجاني للأبد</label>
            </div>
            <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
            <div class="quiz-feedback"></div>
        </div>

        <div class="quiz-box" data-correct="tomorrow-evening">
            <h3>سؤال 4 / Question 4</h3>
            <p class="quiz-question">إمتى المفروض يوصل الطلب؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">When should the order arrive?</span></p>
            <div class="quiz-options">
                <label><input type="radio" name="q4" value="tomorrow-evening"> بكرة بالليل</label>
                <label><input type="radio" name="q4" value="today"> النهاردة</label>
                <label><input type="radio" name="q4" value="next-week"> الأسبوع الجاي</label>
            </div>
            <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
            <div class="quiz-feedback"></div>
        </div>
    </div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ اكتب مكالمتك بنفسك / Write Your Own Call</h3>
    <div class="ar">🇪🇬 اسمع المكالمة تاني، واكتب على ورقة ملخص من 3 جمل بالإنجليزي لكل حاجة حصلت (المشكلة، السبب، والحل). بعدين اخترع مشكلة مشابهة (زي منتج وصل تالف) واكتب مكالمة قصيرة زيها.</div>
    <div class="en">🇬🇧 Listen to the call again, and write a 3-sentence English summary of what happened (the problem, the cause, and the solution). Then invent a similar problem (like a product arriving damaged) and write a short call like this one.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 خلاص قويت مهارة الاستماع لمكالمات حقيقية بمفردات متوسطة. المرحلة الجاية، "البنك والخدمات"، هتاخدك لموقف حياتي جديد: فتح حساب بنكي، تحويل فلوس، والتعامل مع خدمات رسمية بالإنجليزي.</div>
    <div class="en">🇬🇧 You've now strengthened your listening skills for real calls with intermediate vocabulary. The next stage, "Banking & Services," takes you to a new life situation: opening a bank account, transferring money, and dealing with official services in English.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>الاستماع الفعّال معناه إنك تركز على التفاصيل المهمة (الأرقام، الأسباب، والحلول) مش كل كلمة.</li>
        <li>"eligible for" معناها "مؤهل / مستحق لـ" — بتتقال كتير في مواقف التعويضات والخصومات.</li>
        <li>جرب السرعة البطيئة قبل النص المكتوب — ده بيقوي أذنك أكتر من القراءة المباشرة.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="health-doctor.php">← المرحلة السابقة</a>
    <a href="banking-services.php">المرحلة الجاية / Next: البنك والخدمات →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
