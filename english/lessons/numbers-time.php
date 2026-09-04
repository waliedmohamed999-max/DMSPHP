<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'numbers-time';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'الأرقام والوقت والتاريخ';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">A1 · Beginner</span>
<h1>الأرقام والوقت والتاريخ <span class="ltr">Numbers, Time &amp; Dates</span></h1>
<p class="subtitle">عد الأرقام، قول الساعة، والأيام والشهور — أساس أي محادثة يومية.</p>

<div class="step-tracker">
    <a href="#read">📖 Read</a>
    <a href="#understand">🧠 Understand</a>
    <a href="#quiz">🧠 Quiz</a>
    <a href="#challenge">🛠️ Challenge</a>
    <a href="#project">🚀 Project</a>
</div>

<h2 id="read">الهدف / Goal</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 تحفظ الأرقام من 1 لـ 20، تقدر تقول الساعة صح (الساعة كام؟)، وتتعرف على أيام الأسبوع والشهور — دي كلها حاجات هتستخدمها في كل محادثة يومية تقريبًا.</div>
    <div class="en">🇬🇧 Memorize numbers 1-20, learn to tell the time correctly ("What time is it?"), and get familiar with the days of the week and months — things you'll use in almost every daily conversation.</div>
</div>

<h2 id="understand">الأرقام من 1 إلى 20 / Numbers 1-20</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 دي أول 20 رقم لازم تحفظهم عن ظهر قلب. لاحظ إن الأرقام من 13 لـ 19 بتنتهي بـ "-teen"، والأرقام العشرية (20, 30...) بتنتهي بـ "-ty".</div>
    <div class="en">🇬🇧 These are the first 20 numbers you must know by heart. Notice numbers 13-19 end in "-teen", and the tens (20, 30...) end in "-ty".</div>
</div>
<div class="output-box">1 one → واحد
2 two → اتنين
3 three → تلاتة
4 four → أربعة
5 five → خمسة
6 six → ستة
7 seven → سبعة
8 eight → تمانية
9 nine → تسعة
10 ten → عشرة
11 eleven → حداشر
12 twelve → اتناشر
13 thirteen → تلتاشر
14 fourteen → أربعتاشر
15 fifteen → خمستاشر
16 sixteen → ستاشر
17 seventeen → سبعتاشر
18 eighteen → تمنتاشر
19 nineteen → تسعتاشر
20 twenty → عشرين</div>

<h2>قول الساعة / Telling the Time</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 عشان تسأل عن الوقت بتقول "What time is it?"، والرد بيتكون من الساعة والدقيقة. الطريقة الأسهل للمبتدئين إنك تقول الساعة الأول وبعدين الدقيقة (زي "three fifteen")، لكن فيه كمان طريقة تقليدية بتستخدم "past" و"to".</div>
    <div class="en">🇬🇧 To ask for the time you say "What time is it?", and the answer is the hour plus the minutes. The simplest way for beginners is hour-then-minutes (like "three fifteen"), but there's also a traditional way using "past" and "to".</div>
</div>
<div class="output-box">What time is it? → الساعة كام؟
It's three o'clock. → الساعة تلاتة بالظبط.
It's half past four. → الساعة أربعة ونص.
It's a quarter to nine. → الساعة تسعة إلا ربع.
It's a quarter past six. → الساعة ستة وربع.
It's ten past two. → الساعة اتنين وعشرة.
It's twenty to eleven. → الساعة حداشر إلا عشرين.</div>

<h2>مفردات الوقت / Time Expressions</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 دوس على أي بطاقة عشان تشوف الترجمة والمثال.</div>
    <div class="en">🇬🇧 Click any card to reveal the translation and example.</div>
</div>
<div class="vocab-grid">
    <div class="vocab-card">
        <div class="vocab-card-front">
            <div class="vocab-word">O'clock</div>
            <div class="vocab-pron">/əˈklɒk/</div>
            <button type="button" class="speak-btn" data-text="O'clock" data-rate="1">🔊 Listen</button>
        </div>
        <div class="vocab-card-back">
            <div class="vocab-ar">بالظبط (مع الساعة الكاملة)</div>
            <div class="vocab-example"><div class="en">The meeting starts at five o'clock.</div><div class="ar">الاجتماع بيبدأ الساعة خمسة بالظبط.</div></div>
        </div>
        <div class="vocab-card-hint">👆 دوس / Tap</div>
    </div>
    <div class="vocab-card">
        <div class="vocab-card-front">
            <div class="vocab-word">Half past</div>
            <div class="vocab-pron">/hɑːf pɑːst/</div>
            <button type="button" class="speak-btn" data-text="Half past" data-rate="1">🔊 Listen</button>
        </div>
        <div class="vocab-card-back">
            <div class="vocab-ar">والنص</div>
            <div class="vocab-example"><div class="en">I wake up at half past six.</div><div class="ar">بصحى الساعة ستة ونص.</div></div>
        </div>
        <div class="vocab-card-hint">👆 دوس / Tap</div>
    </div>
    <div class="vocab-card">
        <div class="vocab-card-front">
            <div class="vocab-word">Quarter to</div>
            <div class="vocab-pron">/ˈkwɔːtə tuː/</div>
            <button type="button" class="speak-btn" data-text="Quarter to" data-rate="1">🔊 Listen</button>
        </div>
        <div class="vocab-card-back">
            <div class="vocab-ar">إلا ربع</div>
            <div class="vocab-example"><div class="en">It's a quarter to eight.</div><div class="ar">الساعة تمانية إلا ربع.</div></div>
        </div>
        <div class="vocab-card-hint">👆 دوس / Tap</div>
    </div>
    <div class="vocab-card">
        <div class="vocab-card-front">
            <div class="vocab-word">Quarter past</div>
            <div class="vocab-pron">/ˈkwɔːtə pɑːst/</div>
            <button type="button" class="speak-btn" data-text="Quarter past" data-rate="1">🔊 Listen</button>
        </div>
        <div class="vocab-card-back">
            <div class="vocab-ar">وربع</div>
            <div class="vocab-example"><div class="en">Lunch is at a quarter past one.</div><div class="ar">الغدا الساعة واحدة وربع.</div></div>
        </div>
        <div class="vocab-card-hint">👆 دوس / Tap</div>
    </div>
    <div class="vocab-card">
        <div class="vocab-card-front">
            <div class="vocab-word">A.M. / P.M.</div>
            <div class="vocab-pron">/eɪ ɛm/ /piː ɛm/</div>
            <button type="button" class="speak-btn" data-text="A M and P M" data-rate="1">🔊 Listen</button>
        </div>
        <div class="vocab-card-back">
            <div class="vocab-ar">صباحًا / مساءً</div>
            <div class="vocab-example"><div class="en">The class starts at 9 a.m.</div><div class="ar">المحاضرة بتبدأ الساعة 9 الصبح.</div></div>
        </div>
        <div class="vocab-card-hint">👆 دوس / Tap</div>
    </div>
    <div class="vocab-card">
        <div class="vocab-card-front">
            <div class="vocab-word">Morning</div>
            <div class="vocab-pron">/ˈmɔːnɪŋ/</div>
            <button type="button" class="speak-btn" data-text="Morning" data-rate="1">🔊 Listen</button>
        </div>
        <div class="vocab-card-back">
            <div class="vocab-ar">الصباح</div>
            <div class="vocab-example"><div class="en">I study English in the morning.</div><div class="ar">بذاكر إنجليزي في الصباح.</div></div>
        </div>
        <div class="vocab-card-hint">👆 دوس / Tap</div>
    </div>
    <div class="vocab-card">
        <div class="vocab-card-front">
            <div class="vocab-word">Afternoon</div>
            <div class="vocab-pron">/ˌɑːftəˈnuːn/</div>
            <button type="button" class="speak-btn" data-text="Afternoon" data-rate="1">🔊 Listen</button>
        </div>
        <div class="vocab-card-back">
            <div class="vocab-ar">بعد الضهر</div>
            <div class="vocab-example"><div class="en">We have a meeting in the afternoon.</div><div class="ar">عندنا اجتماع بعد الضهر.</div></div>
        </div>
        <div class="vocab-card-hint">👆 دوس / Tap</div>
    </div>
    <div class="vocab-card">
        <div class="vocab-card-front">
            <div class="vocab-word">Evening</div>
            <div class="vocab-pron">/ˈiːvnɪŋ/</div>
            <button type="button" class="speak-btn" data-text="Evening" data-rate="1">🔊 Listen</button>
        </div>
        <div class="vocab-card-back">
            <div class="vocab-ar">المسا</div>
            <div class="vocab-example"><div class="en">I relax in the evening.</div><div class="ar">بارتاح في المسا.</div></div>
        </div>
        <div class="vocab-card-hint">👆 دوس / Tap</div>
    </div>
</div>

<h2>الأيام والشهور / Days &amp; Months</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 أيام الأسبوع والشهور دايمًا بتتكتب بحرف كبير في الأول (Capital Letter) في الإنجليزية، حتى لو مش في أول الجملة.</div>
    <div class="en">🇬🇧 Days of the week and months are always capitalized in English, even in the middle of a sentence.</div>
</div>
<div class="output-box">Monday → الاتنين
Tuesday → التلات
Wednesday → الأربع
Thursday → الخميس
Friday → الجمعة
Saturday → السبت
Sunday → الحد</div>
<div class="output-box">January → يناير
February → فبراير
March → مارس
April → أبريل
May → مايو
June → يونيو
July → يوليو
August → أغسطس
September → سبتمبر
October → أكتوبر
November → نوفمبر
December → ديسمبر</div>
<div class="bi-block">
    <div class="ar">🇪🇬 مثال كامل: "My birthday is in December." يعني "عيد ميلادي في ديسمبر." ولاحظ استخدام "in" مع الشهور، مش "at" أو "on".</div>
    <div class="en">🇬🇧 Full example: "My birthday is in December." Notice we use "in" with months, not "at" or "on".</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="thirteen">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">إيه رقم "13" بالإنجليزي؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What is "13" in English?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="thirty"> thirty</label>
        <label><input type="radio" name="q1" value="thirteen"> thirteen</label>
        <label><input type="radio" name="q1" value="three"> three</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="quarter-to-nine">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">"الساعة تسعة إلا ربع" بالإنجليزي؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">How do you say "8:45" the traditional way?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="quarter-past-nine"> It's a quarter past nine.</label>
        <label><input type="radio" name="q2" value="quarter-to-nine"> It's a quarter to nine.</label>
        <label><input type="radio" name="q2" value="half-past-nine"> It's half past nine.</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="wednesday">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">إيه معنى "Wednesday"؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What does "Wednesday" mean?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="wednesday"> الأربع</label>
        <label><input type="radio" name="q3" value="tuesday-wrong"> التلات</label>
        <label><input type="radio" name="q3" value="thursday-wrong"> الخميس</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="in-december">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">أكمل صح: "My birthday is ___ December."<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Complete correctly.</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="at-december"> at</label>
        <label><input type="radio" name="q4" value="on-december"> on</label>
        <label><input type="radio" name="q4" value="in-december"> in</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ اكتب جدول يومك / Write Your Day's Schedule</h3>
    <div class="ar">🇪🇬 اكتب 5 مواعيد من يومك بصيغة "It's ___ o'clock" أو "at ___" (زي: "I wake up at seven o'clock." و"I have lunch at half past one.")، واقرأهم بصوت عالي.</div>
    <div class="en">🇬🇧 Write 5 times from your day using "It's ___ o'clock" or "at ___" (like: "I wake up at seven o'clock." and "I have lunch at half past one."), and read them out loud.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 دلوقتي وانت عارف الأرقام والوقت، جاي الدور على أفراد العائلة ووصف الناس — هتقدر تقول "أختي بتصحى الساعة سبعة" وأنت فاهم كل كلمة فيها.</div>
    <div class="en">🇬🇧 Now that you know numbers and time, it's time for family members and describing people — you'll be able to say "My sister wakes up at seven" and understand every word in it.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>الأرقام 1-20، وملاحظة "-teen" و"-ty".</li>
        <li>قول الساعة: o'clock, half past, quarter to/past.</li>
        <li>أيام الأسبوع والشهور بحرف كبير دايمًا.</li>
        <li>نستخدم "in" مع الشهور (in December).</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <span></span>
    <a href="family-people.php">المرحلة الجاية / Next: العائلة ووصف الناس →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
