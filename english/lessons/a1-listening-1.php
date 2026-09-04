<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'a1-listening-1';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'تمرين استماع: تعارف بسيط';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">A1 · Beginner</span>
<h1>تمرين استماع: تعارف بسيط <span class="ltr">Listening Practice: A Simple Introduction</span></h1>
<p class="subtitle">اسمع مقطع قصير وجاوب أسئلة فهم — أول تمرين استماع في المسار.</p>

<div class="step-tracker">
    <a href="#read">📖 Read</a>
    <a href="#listen">🎧 Listen</a>
    <a href="#quiz">🧠 Quiz</a>
    <a href="#challenge">🛠️ Challenge</a>
    <a href="#project">🚀 Project</a>
</div>

<h2 id="read">الهدف / Goal</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 أول تمرين استماع حقيقي في المسار. الهدف إنك تسمع حد بيقدم نفسه بجمل بسيطة اتعلمتها قبل كده (الروتين، العائلة، الأرقام) وتفهم المعلومات الأساسية من غير ما تشوف النص المكتوب الأول.</div>
    <div class="en">🇬🇧 Your first real listening exercise on this track. The goal is to hear someone introduce themselves using simple sentences you've already learned (routine, family, numbers) and understand the key facts before seeing the written text.</div>
</div>

<h2 id="listen">🎧 استمع / Listen</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 اسمع المقطع مرتين على الأقل بالسرعة العادية، وحاول تجاوب على الأسئلة تحت من غير ما تفتح النص. لو اتعبت، استخدم زرار "🐢 Slow" للسرعة البطيئة، وبعد المحاولة افتح النص وقارن.</div>
    <div class="en">🇬🇧 Listen to the clip at least twice at normal speed, and try to answer the questions below without opening the transcript. If it's hard, use the "🐢 Slow" button for slower speed, and after trying, open the transcript to compare.</div>
</div>

<div class="listening-exercise">
    <p style="margin-bottom:10px;color:var(--muted);font-size:0.9rem">🎧 اسمع المقطع، وحاول تجاوب على الأسئلة قبل ما تشوف النص المكتوب.</p>
    <div class="listening-controls">
        <button type="button" class="speak-btn" data-text="Hi, my name's Laila. I'm twenty-four years old, and I'm from Cairo. I'm a nurse, and I work at a big hospital downtown. In my free time, I love reading books and going for long walks in the park. Right now, I live with my sister in a small apartment near the river. I'm really happy with my life here." data-rate="1">🔊 Listen</button>
        <button type="button" class="speak-btn" data-text="Hi, my name's Laila. I'm twenty-four years old, and I'm from Cairo. I'm a nurse, and I work at a big hospital downtown. In my free time, I love reading books and going for long walks in the park. Right now, I live with my sister in a small apartment near the river. I'm really happy with my life here." data-rate="0.7">🐢 Slow</button>
        <button type="button" class="listening-transcript-toggle">📄 إظهار النص / Show Transcript</button>
    </div>
    <div class="listening-transcript" hidden>
        <div class="en">Hi, my name's Laila. I'm twenty-four years old, and I'm from Cairo. I'm a nurse, and I work at a big hospital downtown. In my free time, I love reading books and going for long walks in the park. Right now, I live with my sister in a small apartment near the river. I'm really happy with my life here.</div>
        <div class="ar">أهلاً، اسمي ليلى. عندي أربعة وعشرين سنة، وأنا من القاهرة. أنا ممرضة، وباشتغل في مستشفى كبير وسط البلد. في وقت فراغي، بحب أقرا كتب وأمشي مشاوير طويلة في الحديقة. دلوقتي، عايشة مع أختي في شقة صغيرة قريبة من النهر. أنا مبسوطة جدًا بحياتي هنا.</div>
    </div>
    <div class="listening-questions">
        <h3 id="quiz" style="margin-top:0">🧠 اختبر فهمك / Test Your Understanding</h3>
        <div class="quiz-box" data-correct="laila">
            <h3>سؤال 1 / Question 1</h3>
            <p class="quiz-question">إيه اسم البنت في المقطع؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What is the woman's name?</span></p>
            <div class="quiz-options">
                <label><input type="radio" name="q1" value="laila"> Laila</label>
                <label><input type="radio" name="q1" value="sara"> Sara</label>
                <label><input type="radio" name="q1" value="mona"> Mona</label>
            </div>
            <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
            <div class="quiz-feedback"></div>
        </div>

        <div class="quiz-box" data-correct="twenty-four">
            <h3>سؤال 2 / Question 2</h3>
            <p class="quiz-question">عندها كام سنة؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">How old is she?</span></p>
            <div class="quiz-options">
                <label><input type="radio" name="q2" value="twenty"> 20</label>
                <label><input type="radio" name="q2" value="twenty-four"> 24</label>
                <label><input type="radio" name="q2" value="forty"> 40</label>
            </div>
            <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
            <div class="quiz-feedback"></div>
        </div>

        <div class="quiz-box" data-correct="nurse">
            <h3>سؤال 3 / Question 3</h3>
            <p class="quiz-question">بتشتغل إيه؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What is her job?</span></p>
            <div class="quiz-options">
                <label><input type="radio" name="q3" value="teacher"> Teacher</label>
                <label><input type="radio" name="q3" value="nurse"> Nurse</label>
                <label><input type="radio" name="q3" value="doctor"> Doctor</label>
            </div>
            <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
            <div class="quiz-feedback"></div>
        </div>

        <div class="quiz-box" data-correct="sister">
            <h3>سؤال 4 / Question 4</h3>
            <p class="quiz-question">عايشة مع مين؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Who does she live with?</span></p>
            <div class="quiz-options">
                <label><input type="radio" name="q4" value="mother"> Her mother</label>
                <label><input type="radio" name="q4" value="sister"> Her sister</label>
                <label><input type="radio" name="q4" value="alone"> Alone</label>
            </div>
            <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
            <div class="quiz-feedback"></div>
        </div>
    </div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ سجّل نفسك بتتعرف / Record Yourself Introducing Yourself</h3>
    <div class="ar">🇪🇬 اكتب مقطع زي مقطع ليلى بس بمعلوماتك انت: اسمك، سنك، شغلك أو دراستك، هوايتك، وفين عايش. اقراه بصوت عالي كذا مرة لحد ما تحسه طبيعي.</div>
    <div class="en">🇬🇧 Write a passage like Laila's but with your own details: your name, age, job or studies, hobby, and where you live. Read it out loud a few times until it feels natural.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 خلاص خلّصت أول 4 دروس في المسار العملي. جاي دلوقتي موقف حقيقي جدًا: التسوق والأسعار — هتتعلم تسأل عن السعر والمقاس واللون وتتفاهم مع أي بائع.</div>
    <div class="en">🇬🇧 You've finished the first 4 lessons of the practical track. Next up is a very real-life situation: Shopping & Prices — you'll learn to ask about price, size, and color, and communicate with any shopkeeper.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>الاستماع الفعّال = تحاول تفهم الأول من غير نص، وبعدين تراجع بالنص.</li>
        <li>السرعة البطيئة (🐢 Slow) مفيدة جدًا وانت بتبدأ في الاستماع.</li>
        <li>معلومات أساسية زي الاسم والسن والشغل والمكان بتتكرر في كل تعارف حقيقي.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="daily-routine.php">← المرحلة السابقة</a>
    <a href="shopping-market.php">المرحلة الجاية / Next: التسوق والأسعار →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
