<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'tenses-past-future';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'الأزمنة: الماضي والمستقبل';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">المرحلة 6 / Stage 6</span>
<h1>الأزمنة: الماضي والمستقبل <span class="ltr">Tenses: Past &amp; Future</span></h1>
<p class="subtitle">نفس منطق "البسيط مقابل المستمر" اللي اتعلمته في المضارع، هيتكرر هنا في الماضي — وهتضيف له طرق التعبير عن المستقبل.</p>

<div class="step-tracker">
    <a href="#read">📖 Read</a>
    <a href="#understand">🧠 Understand</a>
    <a href="#quiz">🧠 Quiz</a>
    <a href="#challenge">🛠️ Challenge</a>
    <a href="#project">🚀 Project</a>
</div>

<h2 id="read">الهدف / Goal</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 تفهم الفرق بين الماضي البسيط والماضي المستمر، وتتعلم 3 طرق مختلفة للتعبير عن المستقبل (will / going to / المضارع المستمر) ومتى بالظبط تستخدم كل واحدة.</div>
    <div class="en">🇬🇧 Understand the difference between Past Simple and Past Continuous, and learn 3 different ways to express the future (will / going to / Present Continuous) and exactly when to use each.</div>
</div>

<h2 id="understand">الماضي البسيط: حدث خلص / Past Simple: A Finished Event</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 بنستخدم الماضي البسيط لحدث بدأ وخلص تمامًا في وقت محدد في الماضي. الأفعال المنتظمة بتاخد "-ed" (worked)، لكن فيه أفعال شاذة (Irregular Verbs) بتتغير شكلها تمامًا (go → went, write → wrote).</div>
    <div class="en">🇬🇧 We use Past Simple for an event that started and completely finished at a specific point in the past. Regular verbs take "-ed" (worked), but irregular verbs change form entirely (go → went, write → wrote).</div>
</div>
<div class="output-box">✅ I worked on this project yesterday. → اشتغلت على المشروع ده امبارح. (خلص)
<button type="button" class="speak-btn" data-text="I worked on this project yesterday." data-rate="1">🔊 Listen</button>
✅ She wrote three emails this morning. → هي كتبت 3 إيميلات النهاردة الصبح. (خلص)
✅ We went to the meeting at 10 AM. → روحنا الاجتماع الساعة 10 الصبح. (خلص، لحظة محددة)
✅ He deployed the update last night. → هو رفع التحديث امبارح بالليل. (خلص)
✅ They didn't finish the testing phase on time. → هما ماخلصوش مرحلة الاختبار في الميعاد. (نفي في الماضي البسيط)
✅ I forgot to commit my changes before leaving. → نسيت أعمل commit للتعديلات قبل ما أمشي. (فعل شاذ: forgot)</div>

<h2>الماضي المستمر: حدث كان مستمر لما حصل حاجة تانية / Past Continuous</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 بنستخدم الماضي المستمر (was/were + verb-ing) لحدث كان "شغّال" في فترة معينة في الماضي، غالبًا لما حدث تاني (أقصر) قاطعه.</div>
    <div class="en">🇬🇧 We use Past Continuous (was/were + verb-ing) for an event that was "in progress" during a period in the past, often interrupted by a shorter event.</div>
</div>
<div class="output-box">✅ I was coding when the internet went down.
    → كنت بكتب كود لما النت فجأة قُطع. (الحدث الأطول مستمر، الأقصر قاطعه)
✅ They were testing the app at 9 PM last night.
    → كانوا بيختبروا التطبيق الساعة 9 بالليل امبارح.
✅ While she was reviewing the code, she found a bug.
    → وهي بتراجع الكود، لقت باگ.
✅ I was talking to a client when the call dropped.
    → كنت بتكلم مع عميل لما المكالمة اتقطعت فجأة.</div>
<h3>❌ خطأ شائع / Common mistake</h3>
<div class="output-box">❌ "I coded when the internet went down." → غير واضح: الاتنين بالبسيط، مش واضح إيه اللي كان مستمر.</div>
<h3>✅ الصح / Correct</h3>
<div class="output-box">✅ I was coding when the internet went down. → كنت بكتب كود لما النت اتقطع.
    (Continuous للحدث الطويل، Simple للحدث المفاجئ اللي قاطعه)</div>

<div class="pronunciation-box">
    <div class="pronunciation-word">I was coding when the internet went down.</div>
    <div class="pronunciation-ar">كنت بكتب كود لما النت فجأة قُطع.</div>
    <div class="pronunciation-controls">
        <button type="button" class="speak-btn" data-text="I was coding when the internet went down." data-rate="1">🔊 Listen</button>
        <button type="button" class="speak-btn" data-text="I was coding when the internet went down." data-rate="0.6">🐢 Slow</button>
    </div>
</div>

<h2>المستقبل: 3 طرق مختلفة / The Future: 3 Different Forms</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 الإنجليزية مفيهاش "زمن مستقبل" واحد بس — فيه 3 طرق شائعة، وكل واحدة ليها استخدام مختلف: <b>will</b> لقرار لحظي أو توقع عام، <b>going to</b> لخطة اتقررت قبل كده، و<b>المضارع المستمر</b> لموعد مؤكد ومرتب بالفعل (زي حجز أو اجتماع في الأجندة).</div>
    <div class="en">🇬🇧 English doesn't have just one "future tense" — there are 3 common forms, each with a different use: <b>will</b> for a spontaneous decision or general prediction, <b>going to</b> for a plan already decided, and <b>Present Continuous</b> for a confirmed, already-arranged appointment (like a booking or a meeting on the calendar).</div>
</div>
<div class="output-box">will (قرار لحظي / توقع عام):
  "The phone is ringing — I'll answer it." → التليفون بيرن — هرد عليه. (قرار في اللحظة)
  "I think it will rain tomorrow." → أعتقد إنها هتمطر بكرة. (توقع)

going to (خطة اتقررت قبل كده):
  "I'm going to start a new course next month." → هبدأ كورس جديد الشهر الجاي. (اتقررت بالفعل)
  <button type="button" class="speak-btn" data-text="I'm going to start a new course next month." data-rate="1">🔊 Listen</button>
  "We're going to launch the app in June." → هنطلق التطبيق في يونيو.

Present Continuous (موعد مؤكد ومرتب):
  "I'm meeting the client at 3 PM tomorrow." → عندي اجتماع مع العميل الساعة 3 بكرة. (موعد في الأجندة فعلًا)
  "We're presenting the demo on Friday." → هنعرض الديمو يوم الجمعة.</div>
<div class="bi-block">
    <div class="ar">🇪🇬 مثال عملي يوضح الفرق: لو حد سألك "هل هتخلص المشروع الأسبوع ده؟" ورد فعلك اللحظي هو "أيوه هخلصه" من غير خطة مسبقة، تقول "I will finish it." لكن لو كنت مخطط لده من زمان ومرتبه في جدولك، تقول "I'm going to finish it this week" أو حتى "I'm finishing it this week" لو الموعد مؤكد ومحدد فعلًا.</div>
    <div class="en">🇬🇧 A practical example showing the difference: if someone asks "Will you finish the project this week?" and your spontaneous reaction with no prior plan is "yes, I will," say "I will finish it." But if you've been planning this for a while and it's on your schedule, say "I'm going to finish it this week" or even "I'm finishing it this week" if the timing is confirmed and fixed.</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="was-coding">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">أكمل صح: "I ___ when the internet went down."<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Complete correctly.</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="coded"> coded</label>
        <label><input type="radio" name="q1" value="was-coding"> was coding</label>
        <label><input type="radio" name="q1" value="code"> code</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="will">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">التليفون بيرن، وقررت في اللحظة ديه ترد. أي صيغة أنسب؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">The phone is ringing and you decide right now to answer. Which form fits?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="will"> I'll answer it. (will)</label>
        <label><input type="radio" name="q2" value="going-to"> I'm going to answer it. (خطة قديمة)</label>
        <label><input type="radio" name="q2" value="simple"> I answer it. (Present Simple)</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="going-to">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">أي صيغة أنسب لخطة اتقررت بالفعل من شهر: "We ___ launch the app in June."<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Which fits a plan decided a month ago?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="will"> will</label>
        <label><input type="radio" name="q3" value="going-to"> are going to</label>
        <label><input type="radio" name="q3" value="past"> launched</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="ed">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">الفعل المنتظم في الماضي البسيط بياخد إيه غالبًا؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What does a regular verb usually take in Past Simple?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="ing"> -ing</label>
        <label><input type="radio" name="q4" value="ed"> -ed</label>
        <label><input type="radio" name="q4" value="s"> -s</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ 3 جمل ماضي + 3 جمل مستقبل / 3 Past + 3 Future Sentences</h3>
    <div class="ar">🇪🇬 اكتب 3 جمل عن حاجة عملتها امبارح (استخدم Past Simple)، وجملة واحدة فيها حدث قاطع حدث تاني (استخدم Past Continuous + Simple زي المثال). بعدين اكتب 3 جمل عن خططك الأسبوع الجاي، كل واحدة بصيغة مستقبل مختلفة (will, going to, Present Continuous).</div>
    <div class="en">🇬🇧 Write 3 sentences about something you did yesterday (Past Simple), plus one sentence with an event interrupting another (Past Continuous + Simple, like the example). Then write 3 sentences about your plans for next week, each using a different future form (will, going to, Present Continuous).</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 اتقنت دلوقتي كل الأزمنة الأساسية. المرحلة الجاية هتاخدك لمهارة مختلفة تمامًا: بناء المفردات — إزاي تحفظ كلمات جديدة فعلًا تفضل في دماغك، مش تتنسى بعد يومين.</div>
    <div class="en">🇬🇧 You've now mastered all the core tenses. The next stage takes you to a completely different skill: vocabulary building — how to learn new words that actually stick, instead of forgetting them after two days.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>Past Simple = حدث خلص تمامًا (I worked yesterday).</li>
        <li>Past Continuous = حدث كان مستمر وقاطعه حدث تاني (I was coding when...).</li>
        <li>will = قرار لحظي أو توقع عام.</li>
        <li>going to = خطة اتقررت قبل كده.</li>
        <li>Present Continuous للمستقبل = موعد مؤكد ومرتب فعلًا.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="tenses-present.php">← المرحلة السابقة</a>
    <a href="vocabulary-building.php">المرحلة الجاية / Next: بناء المفردات →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
