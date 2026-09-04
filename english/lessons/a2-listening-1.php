<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'a2-listening-1';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'تمرين استماع: في المطعم';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">A2 · Elementary</span>
<h1>تمرين استماع: في المطعم <span class="ltr">Listening Practice: At the Restaurant</span></h1>
<p class="subtitle">اسمع محادثة طلب في مطعم وجاوب على أسئلة فهم أصعب شوية — حاول تجاوب قبل ما تشوف النص المكتوب.</p>

<div class="step-tracker">
    <a href="#read">📖 Read</a>
    <a href="#listen">🎧 Listen</a>
    <a href="#quiz">🧠 Quiz</a>
    <a href="#challenge">🛠️ Challenge</a>
    <a href="#project">🚀 Project</a>
</div>

<h2 id="read">الهدف / Goal</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 تتدرب على فهم محادثة إنجليزي حقيقية بالسمع بس، من غير ما تعتمد على القراءة — مهارة أساسية عشان تفهم الناس فعلًا لما تتكلم معاك مش لما تقرا كلامها. المحادثة دي في مطعم، أصعب شوية من أول تمرين استماع في المسار.</div>
    <div class="en">🇬🇧 Practice understanding a real English conversation by listening only, without relying on reading — an essential skill for actually understanding people when they speak, not just when they write. This conversation is in a restaurant, slightly harder than your first listening exercise in the track.</div>
</div>

<h2 id="listen">🎧 استمع للمحادثة / Listen to the Conversation</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 دوس "Listen" واسمع المحادثة كاملة بسرعة عادية. لو حسيت إنها سريعة، دوس "Slow" وهتسمعها ببطء أكتر. حاول تجاوب على الأسئلة تحت قبل ما تدوس "Show Transcript".</div>
    <div class="en">🇬🇧 Press "Listen" to hear the full conversation at normal speed. If it feels fast, press "Slow" to hear it more slowly. Try to answer the questions below before pressing "Show Transcript".</div>
</div>

<div class="listening-exercise">
    <p style="margin-bottom:10px;color:var(--muted);font-size:0.9rem">🎧 اسمع المحادثة، وحاول تجاوب على الأسئلة قبل ما تشوف النص المكتوب.</p>
    <div class="listening-controls">
        <button type="button" class="speak-btn" data-text="Waiter: Good evening! Table for how many? Customer: Just two, please. Do you have a table near the window? Waiter: Yes, right this way. Here is the menu. Customer: Thanks. A glass of orange juice for me, and water for my friend. Waiter: Are you ready to order, or do you need more time? Customer: We are ready. We will have the grilled fish with a side of rice. Waiter: Excellent choice. It will be ready in about fifteen minutes. Customer: Perfect, thank you very much." data-rate="1">🔊 Listen</button>
        <button type="button" class="speak-btn" data-text="Waiter: Good evening! Table for how many? Customer: Just two, please. Do you have a table near the window? Waiter: Yes, right this way. Here is the menu. Customer: Thanks. A glass of orange juice for me, and water for my friend. Waiter: Are you ready to order, or do you need more time? Customer: We are ready. We will have the grilled fish with a side of rice. Waiter: Excellent choice. It will be ready in about fifteen minutes. Customer: Perfect, thank you very much." data-rate="0.7">🐢 Slow</button>
        <button type="button" class="listening-transcript-toggle">📄 إظهار النص / Show Transcript</button>
    </div>
    <div class="listening-transcript" hidden>
        <div class="en">Waiter: Good evening! Table for how many?
Customer: Just two, please. Do you have a table near the window?
Waiter: Yes, right this way. Here is the menu.
Customer: Thanks. A glass of orange juice for me, and water for my friend.
Waiter: Are you ready to order, or do you need more time?
Customer: We are ready. We will have the grilled fish with a side of rice.
Waiter: Excellent choice. It will be ready in about fifteen minutes.
Customer: Perfect, thank you very much.</div>
        <div class="ar">الويتر: مساء الخير! طاولة لكام شخص؟
الزبون: شخصين بس، من فضلك. عندكم طاولة جنب الشباك؟
الويتر: أيوه، من هنا لو سمحت. اتفضل المنيو.
الزبون: شكرًا. كوب عصير برتقال ليا، ومياه لصاحبي.
الويتر: جاهزين تطلبوا، ولا محتاجين وقت أكتر؟
الزبون: جاهزين. هناخد السمك المشوي مع طبق رز جانبي.
الويتر: اختيار ممتاز. هيكون جاهز خلال حوالي خمستاشر دقيقة.
الزبون: تمام، شكرًا جزيلًا.</div>
    </div>
    <div class="listening-questions">
        <h2 id="quiz">🧠 أسئلة الفهم / Comprehension Questions</h2>
        <div class="quiz-box" data-correct="two">
            <h3>سؤال 1 / Question 1</h3>
            <p class="quiz-question">لكام شخص طلب الزبون الطاولة؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">How many people is the table for?</span></p>
            <div class="quiz-options">
                <label><input type="radio" name="q1" value="one"> شخص واحد / One</label>
                <label><input type="radio" name="q1" value="two"> شخصين / Two</label>
                <label><input type="radio" name="q1" value="four"> أربعة أشخاص / Four</label>
            </div>
            <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
            <div class="quiz-feedback"></div>
        </div>

        <div class="quiz-box" data-correct="juice-water">
            <h3>سؤال 2 / Question 2</h3>
            <p class="quiz-question">إيه المشروبات اللي طلبوها؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What drinks did they order?</span></p>
            <div class="quiz-options">
                <label><input type="radio" name="q2" value="juice-water"> عصير برتقال ومياه / Orange juice and water</label>
                <label><input type="radio" name="q2" value="tea-coffee"> شاي وقهوة / Tea and coffee</label>
                <label><input type="radio" name="q2" value="soda"> صودا / Soda</label>
            </div>
            <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
            <div class="quiz-feedback"></div>
        </div>

        <div class="quiz-box" data-correct="fish-rice">
            <h3>سؤال 3 / Question 3</h3>
            <p class="quiz-question">إيه الأكل اللي طلبوه؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What food did they order?</span></p>
            <div class="quiz-options">
                <label><input type="radio" name="q3" value="chicken"> فراخ مشوية / Grilled chicken</label>
                <label><input type="radio" name="q3" value="fish-rice"> سمك مشوي مع رز / Grilled fish with rice</label>
                <label><input type="radio" name="q3" value="salad"> سلطة بس / Just a salad</label>
            </div>
            <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
            <div class="quiz-feedback"></div>
        </div>

        <div class="quiz-box" data-correct="fifteen">
            <h3>سؤال 4 / Question 4</h3>
            <p class="quiz-question">الأكل هيكون جاهز خلال كام دقيقة؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">How many minutes until the food is ready?</span></p>
            <div class="quiz-options">
                <label><input type="radio" name="q4" value="five"> خمس دقايق / Five</label>
                <label><input type="radio" name="q4" value="fifteen"> خمستاشر دقيقة / Fifteen</label>
                <label><input type="radio" name="q4" value="thirty"> ثلاثين دقيقة / Thirty</label>
            </div>
            <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
            <div class="quiz-feedback"></div>
        </div>
    </div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ سجّل نفسك وانت بتمثل المحادثة / Record Yourself Acting It Out</h3>
    <div class="ar">🇪🇬 اقرا النص بصوت عالي مرتين — مرة دور الويتر ومرة دور الزبون — بعد ما تكشف النص. حاول تقلد نفس نبرة الصوت اللي سمعتها في زر "Listen". ده بيقوّي نطقك وودنك مع بعض.</div>
    <div class="en">🇬🇧 Read the transcript aloud twice — once as the waiter and once as the customer — after revealing it. Try to copy the same tone you heard from the "Listen" button. This trains your pronunciation and your ear together.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 دلوقتي قويت ودنك على مواقف يومية بسيطة. المرحلة الجاية هتاخدك لموقف سفر حقيقي: حجز فندق وإجراءات المطار — من أهم المواقف اللي هتقابلها لو سافرت فعلًا.</div>
    <div class="en">🇬🇧 You've now trained your ear on simple daily situations. The next stage takes you to a real travel scenario: hotel booking and airport procedures — one of the most important situations you'll face if you actually travel.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>حاول تفهم من السياق العام قبل ما تعتمد على كل كلمة لوحدها.</li>
        <li>سماع الجملة أكتر من مرة (وبسرعة بطيئة لو احتجت) بيحسّن الفهم كتير.</li>
        <li>مقارنة إجاباتك بالنص المكتوب بعدين بتوريك بالظبط فين كانت نقطة الصعوبة.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="food-restaurant.php">← المرحلة السابقة</a>
    <a href="hotel-travel.php">المرحلة الجاية / Next: الفندق والسفر →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
