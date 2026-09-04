<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'daily-routine';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'الروتين اليومي';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">A1 · Beginner</span>
<h1>الروتين اليومي <span class="ltr">Daily Routine</span></h1>
<p class="subtitle">تتكلم عن يومك من الصبح للمسا باستخدام المضارع البسيط بثقة.</p>

<div class="step-tracker">
    <a href="#read">📖 Read</a>
    <a href="#understand">🧠 Understand</a>
    <a href="#quiz">🧠 Quiz</a>
    <a href="#challenge">🛠️ Challenge</a>
    <a href="#project">🚀 Project</a>
</div>

<h2 id="read">الهدف / Goal</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 تقدر تحكي يومك بالكامل من لحظة ما تصحى لحد ما تنام، باستخدام المضارع البسيط صح، وتتجنب أشهر غلطة نحوية في الشخص الثالث (he/she/it).</div>
    <div class="en">🇬🇧 Be able to narrate your whole day from waking up to sleeping, using Present Simple correctly, and avoid the most common third-person (he/she/it) grammar mistake.</div>
</div>

<h2 id="understand">يوم كامل بالمضارع البسيط / A Full Day in Present Simple</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 المضارع البسيط بنستخدمه عشان نتكلم عن عادات وروتين بيتكرر كل يوم. لاحظ: مع "I/you/we/they" الفعل بيفضل زي ما هو، لكن مع "he/she/it" لازم تضيف "-s" أو "-es" في آخر الفعل.</div>
    <div class="en">🇬🇧 We use Present Simple to talk about habits and routines that repeat every day. Notice: with "I/you/we/they" the verb stays as-is, but with "he/she/it" you must add "-s" or "-es" to the end of the verb.</div>
</div>
<div class="output-box">I wake up at seven o'clock. → بصحى الساعة سبعة.
I have breakfast at half past seven. → بفطر الساعة سبعة ونص.
I go to work at eight o'clock. → باروح الشغل الساعة تمانية.
I have lunch at one o'clock. → باتغدى الساعة واحدة.
I go home at five o'clock. → بارجع البيت الساعة خمسة.
I sleep at eleven o'clock. → بانام الساعة حداشر.</div>

<div class="bi-block">
    <div class="ar">🇪🇬 ونفس الجمل دي، بس عن شخص تاني (Third Person)، هتلاحظ إضافة "-s" في آخر كل فعل.</div>
    <div class="en">🇬🇧 The same sentences, but about someone else (third person) — notice the "-s" added to the end of each verb.</div>
</div>
<div class="output-box">She wakes up at seven o'clock. → هي بتصحى الساعة سبعة.
<button type="button" class="speak-btn" data-text="She wakes up at seven o'clock." data-rate="1">🔊 Listen</button>
She has breakfast at half past seven. → هي بتفطر الساعة سبعة ونص.
He goes to work at eight o'clock. → هو بيروح الشغل الساعة تمانية.
He has lunch at one o'clock. → هو بيتغدى الساعة واحدة.
She goes home at five o'clock. → هي بترجع البيت الساعة خمسة.
<button type="button" class="speak-btn" data-text="She goes home at five o'clock." data-rate="1">🔊 Listen</button>
He sleeps at eleven o'clock. → هو بينام الساعة حداشر.</div>
<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ إن "have" بتتحول لـ "has" و"go" بتتحول لـ "goes" مع الشخص الثالث — دول استثناءات مش مجرد إضافة "-s" بسيطة.</div>
    <div class="en">🇬🇧 Notice "have" becomes "has" and "go" becomes "goes" with third person — these are irregular forms, not just a simple "-s".</div>
</div>

<h2>غلطة شائعة: نسيان "-s" / Common Mistake: Forgetting the "-s"</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 أشهر غلطة بيقع فيها المتحدثين بالعربية في المضارع البسيط هي نسيان "-s" مع he/she/it، لإن العربي مش بيحتاج تغيير زي ده في نفس الصيغة.</div>
    <div class="en">🇬🇧 The most common mistake Arabic speakers make in Present Simple is forgetting the "-s" with he/she/it, because Arabic doesn't need this kind of change in the equivalent form.</div>
</div>
<h3>❌ خطأ شائع / Common mistake</h3>
<div class="output-box">❌ She go to work at 8. → المفروض: هي بتروح الشغل الساعة 8.</div>
<h3>✅ الصح / Correct</h3>
<div class="output-box">✅ She goes to work at 8. → هي بتروح الشغل الساعة 8.</div>

<div class="pronunciation-box">
    <div class="pronunciation-word">She goes to work at 8.</div>
    <div class="pronunciation-ar">هي بتروح الشغل الساعة 8.</div>
    <div class="pronunciation-controls">
        <button type="button" class="speak-btn" data-text="She goes to work at 8." data-rate="1">🔊 Listen</button>
        <button type="button" class="speak-btn" data-text="She goes to work at 8." data-rate="0.6">🐢 Slow</button>
    </div>
</div>

<h2>روتين صديقي أحمد / My Friend Ahmed's Routine</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 مثال كامل بيربط كل الجمل مع بعض في فقرة واحدة عن شخص تالت.</div>
    <div class="en">🇬🇧 A full example connecting all the sentences into one paragraph about a third person.</div>
</div>
<div class="output-box">Ahmed wakes up at six thirty. He has breakfast quickly, and then he goes to work at eight o'clock. He has lunch with his colleagues at one o'clock. In the evening, he goes home at six o'clock, and he sleeps at midnight.
→ أحمد بيصحى الساعة ستة ونص. بيفطر بسرعة، وبعدين بيروح الشغل الساعة تمانية. بياخد غداه مع زمايله الساعة واحدة. في المسا، بيرجع البيت الساعة ستة، وبينام الساعة اتناشر بالليل.</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="goes">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">إيه الصيغة الصحيحة؟ "She ___ to work at 8."<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What's the correct form?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="go"> go</label>
        <label><input type="radio" name="q1" value="goes"> goes</label>
        <label><input type="radio" name="q1" value="going"> going</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="has">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">إيه الصيغة الصحيحة؟ "He ___ breakfast at seven."<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What's the correct form?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="have"> have</label>
        <label><input type="radio" name="q2" value="haves"> haves</label>
        <label><input type="radio" name="q2" value="has"> has</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="wake-up">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">إيه معنى "wake up"؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What does "wake up" mean?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="wake-up"> يصحى</label>
        <label><input type="radio" name="q3" value="sleep-wrong"> ينام</label>
        <label><input type="radio" name="q3" value="eat-wrong"> ياكل</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="goes-correct">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">أي جملة صح؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Which sentence is correct?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="go-wrong"> She go to work at 8.</label>
        <label><input type="radio" name="q4" value="goes-correct"> She goes to work at 8.</label>
        <label><input type="radio" name="q4" value="going-wrong"> She going to work at 8.</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ احكي يومك / Narrate Your Day</h3>
    <div class="ar">🇪🇬 اكتب فقرة من 6 جمل بتحكي فيها يومك الحقيقي بالمضارع البسيط (من وقت الصحيان لوقت النوم)، وبعدين اكتب نفس الفقرة بس عن صديق أو أخ (Third Person) وراجع كل فعل: هل ضفت "-s" أو "-es" صح؟</div>
    <div class="en">🇬🇧 Write a 6-sentence paragraph narrating your real day in Present Simple (from waking up to sleeping), then rewrite the same paragraph about a friend or sibling (Third Person) and check each verb: did you add "-s" or "-es" correctly?</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 كل الجمل اللي كتبتها عن يومك دلوقتي هتفيدك في أول تمرين استماع في المسار — هتسمع حد بيقدم نفسه ويحكي عن حياته، وهتفهم كل كلمة لإنك اتدربت على نفس النوع من الجمل.</div>
    <div class="en">🇬🇧 All the sentences you wrote about your day will help you in the track's first listening exercise — you'll hear someone introducing themselves and talking about their life, and you'll understand every word because you've practiced the same kind of sentences.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>المضارع البسيط بيتستخدم للعادات والروتين اليومي.</li>
        <li>مع he/she/it لازم تضيف "-s" أو "-es" آخر الفعل.</li>
        <li>"have" بتتحول لـ "has"، و"go" بتتحول لـ "goes" مع الشخص الثالث.</li>
        <li>❌ "She go to work" → ✅ "She goes to work".</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="family-people.php">← المرحلة السابقة</a>
    <a href="a1-listening-1.php">المرحلة الجاية / Next: تمرين استماع: تعارف بسيط →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
