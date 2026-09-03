<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'intro';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'مقدمة: خطة رحلتك في اللغة الإنجليزية';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">المرحلة 1 / Stage 1</span>
<h1>مقدمة: خطة رحلتك في اللغة الإنجليزية <span class="ltr">Your English Roadmap</span></h1>
<p class="subtitle">قبل ما تبدأ حفظ كلمات أو قواعد، لازم تعرف بالظبط فين انت دلوقتي، وفين هتوصل، وإزاي.</p>

<div class="step-tracker">
    <a href="#read">📖 Read</a>
    <a href="#understand">🧠 Understand</a>
    <a href="#quiz">🧠 Quiz</a>
    <a href="#challenge">🛠️ Challenge</a>
    <a href="#project">🚀 Project</a>
</div>

<h2 id="read">الهدف / Goal</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 تفهم ليه الإنجليزية أهم مهارة إضافية لمسارك المهني في التقنية، تتعرف على مستويات اللغة العالمية (CEFR) عشان تعرف تقيس تقدمك، وتحط خطة واقعية لنفسك.</div>
    <div class="en">🇬🇧 Understand why English is the single most valuable extra skill for a tech career, learn the global CEFR levels so you can measure your progress, and set a realistic plan for yourself.</div>
</div>

<h2 id="understand">ليه الإنجليزية بالذات؟ / Why English Specifically?</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 مش موضوع "لغة أجنبية" بس — الإنجليزية هي لغة التوثيق الرسمي (Documentation) لكل لغة برمجة تقريبًا، لغة الـ Stack Overflow وGitHub، ولغة أغلب فرص الشغل عن بُعد. مبرمج ممتاز بإنجليزية ضعيفة هيفضل محتاج حد يترجمله رسائل الخطأ والمصادر الرسمية، ومبرمج متوسط بإنجليزية قوية هيتعلم أسرع من أي حد تاني لإنه قادر يوصل لأي مصدر في الدنيا مباشرة.</div>
    <div class="en">🇬🇧 It's not just "a foreign language" — English is the documentation language for nearly every programming language, the language of Stack Overflow and GitHub, and the language of most remote job opportunities. An excellent programmer with weak English will always need someone to translate error messages and official resources, while an average programmer with strong English will learn faster than anyone else because they can reach any resource in the world directly.</div>
</div>

<h2>مستويات اللغة العالمية (CEFR) / The Global CEFR Levels</h2>
<div class="recap-box">
    <h3>🗺️ خريطة المستويات / Level Map</h3>
    <ul>
        <li><b>A1 – A2 (مبتدئ):</b> عبارات أساسية، تعارف، طلبات بسيطة.</li>
        <li><b>B1 – B2 (متوسط):</b> تقدر تتابع محادثة، تقرا مقال، وتكتب إيميل بسيط.</li>
        <li><b>C1 – C2 (متقدم):</b> تقدر تقرا توثيق تقني معقد وتشتغل بالإنجليزية بثقة كاملة.</li>
    </ul>
</div>
<div class="bi-block">
    <div class="ar">🇪🇬 المسار ده هياخدك تدريجيًا من أساسيات A1/A2 لحد إنجليزية تقنية ومهنية تقارب B2/C1 — كافية جدًا لأي وظيفة تقنية أو عمل حر عن بُعد.</div>
    <div class="en">🇬🇧 This track takes you gradually from A1/A2 basics to technical and professional English around B2/C1 — plenty for any tech job or remote freelance work.</div>
</div>

<h2>خطة واقعية / A Realistic Plan</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 أكبر غلطة بيقع فيها المتعلمين إنهم يحاولوا "يتقنوا" اللغة قبل ما يستخدموها. الأصح: ابدأ تستخدم اللي اتعلمته من أول درس — لو اتعلمت 10 كلمات جديدة، جرب تكتب بيهم جملة حقيقية. لو خلصت درس عن الأزمنة، جرب تقرا commit message أو error message حقيقي وشوف قد إيه فهمته.</div>
    <div class="en">🇬🇧 The biggest mistake learners make is trying to "master" the language before using it. The right approach: start using what you learn from lesson one — if you learned 10 new words, try writing a real sentence with them. If you finished a lesson on tenses, try reading a real commit message or error message and see how much you understand.</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="documentation">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">إيه أكتر حاجة بتخلي الإنجليزية مهمة جدًا للمبرمج تحديدًا؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What makes English especially important for a programmer specifically?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="documentation"> التوثيق الرسمي ومصادر التعلم كلها بالإنجليزية غالبًا</label>
        <label><input type="radio" name="q1" value="fashion"> عشان موضة بس</label>
        <label><input type="radio" name="q1" value="none"> مفيش داعي أصلًا للمبرمج</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="b2">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">أي مستوى CEFR غالبًا كافي لوظيفة تقنية عن بُعد؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Which CEFR level is usually enough for a remote tech job?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="a1"> A1</label>
        <label><input type="radio" name="q2" value="b2"> حوالي B2 وما فوق</label>
        <label><input type="radio" name="q2" value="none"> مفيش مستوى كافي أبدًا</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="use">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">إيه الاستراتيجية الأصح لتعلم اللغة حسب الدرس ده؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What's the correct strategy for learning the language per this lesson?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="wait"> تستنى تتقن كل حاجة الأول قبل ما تستخدمها</label>
        <label><input type="radio" name="q3" value="use"> تستخدم اللي اتعلمته فورًا في مواقف حقيقية</label>
        <label><input type="radio" name="q3" value="memorize"> تحفظ قاموس كامل من غير استخدام</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="stackoverflow">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">أي من دول مثال على مصدر تقني بيحتاج إنجليزية كويسة؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Which of these is an example of a technical resource needing good English?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="stackoverflow"> Stack Overflow والتوثيق الرسمي</label>
        <label><input type="radio" name="q4" value="none1"> مفيش أي مصدر تقني محتاج إنجليزي</label>
        <label><input type="radio" name="q4" value="none2"> برامج الأوفيس بس</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ قيّم مستواك الحالي / Assess Your Current Level</h3>
    <div class="ar">🇪🇬 افتح أي رسالة خطأ (Error Message) طويلة من مشروع برمجي اتعلمته في سيلا، واقرأها بالكامل من غير ترجمة. اكتب على ورقة: كام كلمة فهمتها بالسياق، وكام كلمة محتجت تدور عليها. النتيجة دي هي "نقطة البداية" الحقيقية بتاعتك.</div>
    <div class="en">🇬🇧 Open any long error message from a programming project you learned in Sila, and read it fully without translation. Write down: how many words you understood from context, and how many you needed to look up. That's your real starting point.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 المسار ده هيبني عليك تدريجيًا لحد ما توصل لمرحلة "الإنجليزية التقنية للمبرمجين"، فين هتطبّق كل حاجة اتعلمتها على قراءة توثيق حقيقي ومصطلحات برمجة — بالظبط الهدف اللي بدأنا بيه النهاردة.</div>
    <div class="en">🇬🇧 This track builds up progressively until you reach "Technical English for Developers," where you'll apply everything you learned to real documentation and programming terminology — exactly the goal we started with today.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>الإنجليزية = مفتاح الوصول المباشر لكل مصادر البرمجة العالمية.</li>
        <li>مستويات CEFR (A1-C2) بتديك مقياس واضح لتقدمك.</li>
        <li>استخدم اللغة من أول درس، متستناش "تتقنها" الأول.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <span></span>
    <a href="alphabet-pronunciation.php">المرحلة الجاية / Next: الحروف والنطق →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
