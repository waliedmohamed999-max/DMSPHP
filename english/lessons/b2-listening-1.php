<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'b2-listening-1';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'تمرين استماع: نقاش قصير';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">B2 · Upper-Intermediate</span>
<h1>تمرين استماع: نقاش قصير <span class="ltr">Listening Practice: A Short Debate</span></h1>
<p class="subtitle">اسمع نقاش بين شخصين برأيين مختلفين وحدد مين قال إيه.</p>

<div class="step-tracker">
    <a href="#read">📖 Read</a>
    <a href="#listen">🎧 Listen</a>
    <a href="#quiz">🧠 Quiz</a>
    <a href="#challenge">🛠️ Challenge</a>
    <a href="#project">🚀 Project</a>
</div>

<h2 id="read">الهدف / Goal</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 تتدرب على مهارة أهم بكتير من مجرد الفهم: إنك تسمع نقاش سريع بين شخصين وتقدر تفرّق بين رأي كل واحد فيهم وتتابع حجتهم من غير ما تشوف النص المكتوب الأول. ده بالظبط اللي بيحصل في اجتماعات العمل الحقيقية.</div>
    <div class="en">🇬🇧 Practice a skill far more important than simple comprehension: listening to a fast-moving debate between two people and being able to tell each person's opinion apart while following their argument — without reading the transcript first. This is exactly what happens in real work meetings.</div>
</div>

<h2 id="listen">🎧 اسمع النقاش / Listen to the Debate</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 عمر وليلى بيتناقشوا عن فكرة "أسبوع العمل لأربعة أيام" في فريقهم. اسمع النقاش مرة أو مرتين بسرعة عادية، وحاول تجاوب على أسئلة الفهم تحت قبل ما تدوس على "إظهار النص". لو حسيت إن السرعة صعبة، استخدم زرار "Slow".</div>
    <div class="en">🇬🇧 Omar and Laila are debating the idea of a "four-day work week" for their team. Listen once or twice at normal speed, and try to answer the comprehension questions below before revealing the transcript. If it feels too fast, use the "Slow" button.</div>
</div>

<div class="listening-exercise">
    <p style="margin-bottom:10px;color:var(--muted);font-size:0.9rem">🎧 اسمع النقاش، وحاول تجاوب على الأسئلة قبل ما تشوف النص المكتوب.</p>
    <div class="listening-controls">
        <button type="button" class="speak-btn" data-text="Omar: I really think a four-day work week would make our team more productive, not less. Laila: I understand why that sounds appealing, but I'm not convinced. Compressing five days of work into four just means more stress. Omar: That's the usual assumption, but companies that tried it actually reported fewer sick days and higher morale. Laila: Maybe for some industries, but our clients expect someone available every single day, including Fridays. Omar: Fair point, but we could rotate days off so someone is always covering for the team. Laila: Honestly, that might actually work if we plan it carefully." data-rate="1">🔊 Listen</button>
        <button type="button" class="speak-btn" data-text="Omar: I really think a four-day work week would make our team more productive, not less. Laila: I understand why that sounds appealing, but I'm not convinced. Compressing five days of work into four just means more stress. Omar: That's the usual assumption, but companies that tried it actually reported fewer sick days and higher morale. Laila: Maybe for some industries, but our clients expect someone available every single day, including Fridays. Omar: Fair point, but we could rotate days off so someone is always covering for the team. Laila: Honestly, that might actually work if we plan it carefully." data-rate="0.7">🐢 Slow</button>
        <button type="button" class="listening-transcript-toggle">📄 إظهار النص / Show Transcript</button>
    </div>
    <div class="listening-transcript" hidden>
        <div class="en">Omar: I really think a four-day work week would make our team more productive, not less.

Laila: I understand why that sounds appealing, but I'm not convinced. Compressing five days of work into four just means more stress.

Omar: That's the usual assumption, but companies that tried it actually reported fewer sick days and higher morale.

Laila: Maybe for some industries, but our clients expect someone available every single day, including Fridays.

Omar: Fair point, but we could rotate days off so someone is always covering for the team.

Laila: Honestly, that might actually work if we plan it carefully.</div>
        <div class="ar">عمر: بصراحة أعتقد إن أسبوع العمل لأربعة أيام هيخلي فريقنا أكتر إنتاجية، مش أقل.

ليلى: فاهمة ليه ده يبان جذاب، بس مش مقتنعة. إننا نضغط خمس أيام شغل في أربعة معناه ضغط أكبر بس.

عمر: ده الافتراض المعتاد، بس فيه شركات جربتها فعليًا وسجّلت أيام مرض أقل وروح معنوية أعلى.

ليلى: يمكن في بعض المجالات، بس عملاؤنا بيتوقعوا حد متاح كل يوم بالظبط، حتى يوم الجمعة.

عمر: رأي منطقي، بس ممكن نعمل تبديل لأيام الإجازة عشان يفضل حد موجود دايمًا يغطي الفريق.

ليلى: بصراحة، ده ممكن فعلًا ينجح لو خططنا له بعناية.</div>
    </div>
    <div class="listening-questions">
        <h2 id="quiz" style="margin-top:0">🧠 اختبر فهمك / Test Your Understanding</h2>
        <div class="quiz-box" data-correct="more-productive">
            <h3>سؤال 1 / Question 1</h3>
            <p class="quiz-question">إيه رأي عمر في أسبوع العمل لأربعة أيام؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What is Omar's opinion of the four-day work week?</span></p>
            <div class="quiz-options">
                <label><input type="radio" name="q1" value="more-productive"> هيخلي الفريق أكتر إنتاجية</label>
                <label><input type="radio" name="q1" value="less-productive"> هيخلي الفريق أقل إنتاجية</label>
                <label><input type="radio" name="q1" value="no-opinion"> مالوش رأي في الموضوع أصلًا</label>
            </div>
            <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
            <div class="quiz-feedback"></div>
        </div>

        <div class="quiz-box" data-correct="clients-daily">
            <h3>سؤال 2 / Question 2</h3>
            <p class="quiz-question">إيه أكبر قلق عند ليلى؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What is Laila's main concern?</span></p>
            <div class="quiz-options">
                <label><input type="radio" name="q2" value="clients-daily"> العملاء بيتوقعوا حد متاح كل يوم، حتى الجمعة</label>
                <label><input type="radio" name="q2" value="salary"> إن المرتبات هتقل</label>
                <label><input type="radio" name="q2" value="three-days"> عايزة أسبوع عمل تلات أيام بس</label>
            </div>
            <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
            <div class="quiz-feedback"></div>
        </div>

        <div class="quiz-box" data-correct="omar-said">
            <h3>سؤال 3 / Question 3 — مين قال إيه؟ / Who said this?</h3>
            <p class="quiz-question">مين قال "companies that tried it actually reported fewer sick days and higher morale"؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Who said "companies that tried it actually reported fewer sick days and higher morale"?</span></p>
            <div class="quiz-options">
                <label><input type="radio" name="q3" value="omar-said"> عمر / Omar</label>
                <label><input type="radio" name="q3" value="laila-said"> ليلى / Laila</label>
                <label><input type="radio" name="q3" value="neither"> محدش منهم قال كده</label>
            </div>
            <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
            <div class="quiz-feedback"></div>
        </div>

        <div class="quiz-box" data-correct="rotate-days">
            <h3>سؤال 4 / Question 4</h3>
            <p class="quiz-question">إيه الحل اللي اقترحه عمر في نهاية النقاش؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What solution does Omar propose at the end of the debate?</span></p>
            <div class="quiz-options">
                <label><input type="radio" name="q4" value="rotate-days"> تبديل أيام الإجازة عشان حد يفضل موجود دايمًا</label>
                <label><input type="radio" name="q4" value="cancel-idea"> إلغاء فكرة الأربعة أيام تمامًا</label>
                <label><input type="radio" name="q4" value="work-weekends"> إن الكل يشتغل في الويكند</label>
            </div>
            <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
            <div class="quiz-feedback"></div>
        </div>
    </div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ اكتب رأيك في الموضوع / Write Your Own Opinion</h3>
    <div class="ar">🇪🇬 اسمع النقاش تاني بعد ما تشوف النص، وبعدين اكتب 3-4 جمل برأيك انت الشخصي في فكرة "أسبوع العمل لأربعة أيام" — هل انت مع عمر ولا مع ليلى ولا عندك رأي تالت؟ حاول تستخدم عبارة زي "I see your point, but..." أو "On the other hand...".</div>
    <div class="en">🇬🇧 Listen to the debate again after seeing the transcript, then write 3-4 sentences with your own personal opinion on the "four-day work week" idea — do you side with Omar, with Laila, or have a third opinion? Try to use a phrase like "I see your point, but..." or "On the other hand...".</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 دلوقتي إنت قادر تتابع نقاش سريع بالسمع وتحدد مين قال إيه بدقة. المرحلة الجاية، "لغة الاجتماعات والتفاوض"، هتاخدك لمستوى أعلى: عبارات متقدمة للتفاوض على راتب أو ميزانية أو ديدلاين باحتراف — بالظبط زي المواقف اللي سمعتها هنا لكن في اجتماع حقيقي.</div>
    <div class="en">🇬🇧 You can now follow a fast-moving debate by ear and pinpoint exactly who said what. The next stage, "Meetings & Negotiation Language," takes you a level higher: advanced phrases for negotiating a salary, budget, or deadline professionally — just like the situations you heard here, but in a real meeting.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>عمر: مع أسبوع العمل لأربعة أيام لأنه بيزود الإنتاجية.</li>
        <li>ليلى: قلقانة من توفر الخدمة للعملاء كل يوم بما فيهم الجمعة.</li>
        <li>الحل المقترح: تبديل أيام الإجازة (rotating days off) عشان تغطية دايمة.</li>
        <li>مهارة الاستماع لنقاش والتفريق بين رأيين مختلفين بالسمع بس، من غير نص مكتوب.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="opinions-debates.php">← المرحلة السابقة</a>
    <a href="meetings-negotiations.php">المرحلة الجاية / Next: لغة الاجتماعات والتفاوض →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
