<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'tenses-present';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'الأزمنة: المضارع';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">المرحلة 5 / Stage 5</span>
<h1>الأزمنة: المضارع <span class="ltr">Tenses: Present Simple &amp; Continuous</span></h1>
<p class="subtitle">من أكتر الأخطاء انتشارًا عند المتحدثين بالعربية: خلط المضارع البسيط بالمستمر. الدرس ده هيخليك تفرّق بينهم بثقة تامة.</p>

<div class="step-tracker">
    <a href="#read">📖 Read</a>
    <a href="#understand">🧠 Understand</a>
    <a href="#quiz">🧠 Quiz</a>
    <a href="#challenge">🛠️ Challenge</a>
    <a href="#project">🚀 Project</a>
</div>

<h2 id="read">الهدف / Goal</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 تفهم إمتى تستخدم المضارع البسيط (Present Simple) وإمتى تستخدم المضارع المستمر (Present Continuous)، وتتجنب أشهر غلطة بيقع فيها المتحدثين بالعربية: استخدام البسيط لحاجة بتحصل دلوقتي بالظبط.</div>
    <div class="en">🇬🇧 Understand when to use Present Simple and when to use Present Continuous, and avoid the most common mistake Arabic speakers make: using Simple for something happening right now.</div>
</div>

<h2 id="understand">المضارع البسيط: عادات وحقائق / Present Simple: Habits &amp; Facts</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 بنستخدم المضارع البسيط لحاجتين بس: عادة متكررة (بتحصل غالبًا، مش دلوقتي بالظبط)، أو حقيقة ثابتة. الفعل بياخد "s" مع he/she/it: "I work" لكن "She works".</div>
    <div class="en">🇬🇧 We use Present Simple for two things only: a repeated habit (happens generally, not this exact moment), or a fixed fact. The verb takes an "s" with he/she/it: "I work" but "She works".</div>
</div>
<div class="output-box">✅ I work at a software company. → بشتغل في شركة برمجيات. (حقيقة/وظيفتي بشكل عام)
<button type="button" class="speak-btn" data-text="I work at a software company." data-rate="1">🔊 Listen</button>
✅ She works every day from 9 to 5. → هي بتشتغل كل يوم من 9 لـ5. (عادة متكررة)
✅ Water boils at 100°C. → المياه بتغلي عند 100 درجة مئوية. (حقيقة علمية ثابتة)
✅ He drinks coffee every morning. → هو بيشرب قهوة كل صباح. (عادة)
✅ We usually deploy new updates on Sundays. → إحنا عادةً بنرفع تحديثات جديدة يوم الأحد. (عادة متكررة في الشغل)
✅ My brother doesn't like fast food. → أخويا مش بيحب الأكل السريع. (حقيقة/تفضيل ثابت)
✅ The sun rises in the east. → الشمس بتشرق من الشرق. (حقيقة ثابتة)</div>

<h2>المضارع المستمر: حاجة بتحصل دلوقتي / Present Continuous: Happening Now</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 بنستخدم المضارع المستمر (am/is/are + verb-ing) لحاجة بتحصل في اللحظة دي بالظبط، أو حاجة مؤقتة بتحصل حوالين الفترة دي (مش بالضرورة في هالثانية بالظبط).</div>
    <div class="en">🇬🇧 We use Present Continuous (am/is/are + verb-ing) for something happening at this exact moment, or something temporary happening around this period (not necessarily this exact second).</div>
</div>
<div class="output-box">✅ I am working right now, can I call you later? → بشتغل دلوقتي بالظبط، أقدر أكلمك بعدين؟
<button type="button" class="speak-btn" data-text="I am working right now, can I call you later?" data-rate="1">🔊 Listen</button>
✅ She is studying English this month. → هي بتذاكر إنجليزي الشهر ده. (مؤقت، مش عادة دايمة)
✅ Look! It is raining outside. → بص! بتمطر برة دلوقتي.
✅ They are building a new feature this week. → هما بيبنوا ميزة جديدة الأسبوع ده.
✅ I am reviewing your pull request now. → براجع طلب الدمج بتاعك دلوقتي.
✅ We are still waiting for the client's reply. → لسه بننتظر رد العميل. (حالة مستمرة حاليًا)</div>

<h2>الغلطة الكلاسيكية: البسيط بدل المستمر</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 العربية مبتفرقش بوضوح بين "بشتغل" (عادة) و"بشتغل دلوقتي" (حاليًا) — الفعل نفسه بيتقال بنفس الصيغة. عشان كده أشهر غلطة عند المتحدثين بالعربية إنهم يستخدموا المضارع البسيط لحاجة بتحصل فعلًا دلوقتي، بدل المستمر.</div>
    <div class="en">🇬🇧 Arabic doesn't clearly distinguish "I work" (habit) from "I'm working" (currently) — the same verb form covers both. That's why the classic Arabic-speaker mistake is using Present Simple for something actually happening right now, instead of Continuous.</div>
</div>
<h3>❌ خطأ شائع (Present Simple غلط) / Common mistake</h3>
<div class="output-box">❌ "I work on this bug right now, wait a minute." → المفروض: I am working... (باشتغل على الباگ ده دلوقتي، استنى دقيقة)
❌ "She writes an email at the moment, she'll join soon." → المفروض: She is writing... (بتكتب إيميل حاليًا، هتنضم قريب)
❌ "Look, he codes something on his laptop." → المفروض: he is coding... (بص، هو بيكتب كود على اللابتوب دلوقتي)</div>
<h3>✅ الصح (Present Continuous) / Correct</h3>
<div class="output-box">✅ I am working on this bug right now, wait a minute. → باشتغل على الباگ ده دلوقتي، استنى دقيقة.
✅ She is writing an email at the moment, she'll join soon. → بتكتب إيميل حاليًا، هتنضم قريب.
✅ Look, he is coding something on his laptop. → بص، هو بيكتب كود على اللابتوب دلوقتي.</div>
<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ كلمات زي "right now", "at the moment", "look!" — دي إشارات قوية إن اللي بيتقال بيحصل دلوقتي بالظبط، يعني المفروض تستخدم معاها المستمر مش البسيط.</div>
    <div class="en">🇬🇧 Notice words like "right now", "at the moment", "look!" — these are strong signals that something is happening this exact moment, meaning you should use Continuous, not Simple.</div>
</div>

<div class="pronunciation-box">
    <div class="pronunciation-word">I work at a software company. / I am working right now.</div>
    <div class="pronunciation-ar">بشتغل في شركة برمجيات. (عادة) / بشتغل دلوقتي بالظبط. (مستمر)</div>
    <div class="pronunciation-controls">
        <button type="button" class="speak-btn" data-text="I work at a software company. I am working right now." data-rate="1">🔊 Listen</button>
        <button type="button" class="speak-btn" data-text="I work at a software company. I am working right now." data-rate="0.6">🐢 Slow</button>
    </div>
</div>

<h2>كلمات مساعدة تدلّك على الزمن الصح / Signal Words</h2>
<div class="output-box">Present Simple:  always (دايمًا), usually (عادةً), often (غالبًا), sometimes (أحيانًا), never (أبدًا), every day/week (كل يوم/أسبوع)
Present Continuous:  now (دلوقتي), right now (دلوقتي بالظبط), at the moment (حاليًا), currently (في الوقت الحالي), look! (بص!), listen! (اسمع!)</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="is-working">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">أكمل صح: "She ___ on a new project right now."<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Complete correctly.</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="works"> works</label>
        <label><input type="radio" name="q1" value="is-working"> is working</label>
        <label><input type="radio" name="q1" value="work"> work</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="boils">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">أكمل صح: "Water ___ at 100°C." (حقيقة ثابتة)<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Complete correctly (fixed fact).</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="is-boiling"> is boiling</label>
        <label><input type="radio" name="q2" value="boils"> boils</label>
        <label><input type="radio" name="q2" value="boil"> boil</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="signal-now">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">أي كلمة دي إشارة على المضارع المستمر مش البسيط؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Which word signals Continuous, not Simple?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="always"> always</label>
        <label><input type="radio" name="q3" value="signal-now"> right now</label>
        <label><input type="radio" name="q3" value="never"> never</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="habit">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">ليه غلطة "I work on this bug right now" غلط حسب الدرس؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Per this lesson, why is that sentence wrong?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="habit"> لإن "right now" بتدل على حاجة حاليًا، محتاجة Continuous مش Simple</label>
        <label><input type="radio" name="q4" value="spelling"> لإن فيها خطأ إملائي في كلمة bug</label>
        <label><input type="radio" name="q4" value="fine"> مفيش غلط فيها أصلًا</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ صحّح 5 جمل / Fix 5 Sentences</h3>
    <div class="ar">🇪🇬 اكتب 5 جمل عن يومك النهاردة، 3 منها عادات ثابتة (استخدم Present Simple) و2 حاجات بتحصل دلوقتي بالظبط وانت بتكتب (استخدم Present Continuous). راجع كل جملة: هل حطيت "s" مع he/she/it في البسيط؟ هل حطيت am/is/are صح في المستمر؟</div>
    <div class="en">🇬🇧 Write 5 sentences about your day today: 3 fixed habits (use Present Simple) and 2 things happening at this exact moment as you write (use Present Continuous). Review each: did you add "s" with he/she/it in Simple? Did you use am/is/are correctly in Continuous?</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 بعد ما اتقنت المضارع، المرحلة الجاية هتاخدك للماضي والمستقبل — وهتلاقي إن نفس منطق "البسيط مقابل المستمر" بيتكرر هناك، فهيبقى أسهل بكتير لإنك فاهم الفكرة الأساسية من دلوقتي.</div>
    <div class="en">🇬🇧 Now that you've mastered the present, the next stage takes you to past and future — you'll find the same "Simple vs Continuous" logic repeats there, so it'll be much easier since you already understand the core idea.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>Present Simple = عادة متكررة أو حقيقة ثابتة (I work, water boils).</li>
        <li>Present Continuous = بيحصل دلوقتي بالظبط أو مؤقت (I am working now).</li>
        <li>كلمات زي "right now" و"at the moment" = استخدم Continuous.</li>
        <li>كلمات زي "always" و"usually" و"never" = استخدم Simple.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="grammar-basics.php">← المرحلة السابقة</a>
    <a href="tenses-past-future.php">المرحلة الجاية / Next: الماضي والمستقبل →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
