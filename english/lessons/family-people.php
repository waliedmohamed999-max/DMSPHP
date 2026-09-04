<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'family-people';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'العائلة ووصف الناس';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">A1 · Beginner</span>
<h1>العائلة ووصف الناس <span class="ltr">Family &amp; Describing People</span></h1>
<p class="subtitle">أفراد العائلة، ووصف الشكل والشخصية بصفات بسيطة.</p>

<div class="step-tracker">
    <a href="#read">📖 Read</a>
    <a href="#understand">🧠 Understand</a>
    <a href="#quiz">🧠 Quiz</a>
    <a href="#challenge">🛠️ Challenge</a>
    <a href="#project">🚀 Project</a>
</div>

<h2 id="read">الهدف / Goal</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 تتعلم أسامي أفراد العائلة الأساسية، وتقدر تصف حد بالشكل (طويل، قصير) أو بالشخصية (طيب، مضحك) باستخدام صفات بسيطة وجمل حقيقية.</div>
    <div class="en">🇬🇧 Learn the core family member names, and be able to describe someone's appearance (tall, short) or personality (kind, funny) using simple adjectives and real sentences.</div>
</div>

<h2 id="understand">أفراد العائلة ووصف الناس / Family &amp; Describing People</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 دوس على أي بطاقة عشان تشوف الترجمة والمثال. أول 5 بطاقات عن العائلة، والباقي صفات لوصف الشكل والشخصية.</div>
    <div class="en">🇬🇧 Click any card to reveal the translation and example. The first 5 cards are family members, the rest are adjectives for appearance and personality.</div>
</div>
<div class="vocab-grid">
    <div class="vocab-card">
        <div class="vocab-card-front">
            <div class="vocab-word">Mother / Father</div>
            <div class="vocab-pron">/ˈmʌðə/ /ˈfɑːðə/</div>
            <button type="button" class="speak-btn" data-text="Mother and Father" data-rate="1">🔊 Listen</button>
        </div>
        <div class="vocab-card-back">
            <div class="vocab-ar">الأم / الأب</div>
            <div class="vocab-example"><div class="en">My mother and father live in Alexandria.</div><div class="ar">أمي وأبويا عايشين في الإسكندرية.</div></div>
        </div>
        <div class="vocab-card-hint">👆 دوس / Tap</div>
    </div>
    <div class="vocab-card">
        <div class="vocab-card-front">
            <div class="vocab-word">Sister / Brother</div>
            <div class="vocab-pron">/ˈsɪstə/ /ˈbrʌðə/</div>
            <button type="button" class="speak-btn" data-text="Sister and Brother" data-rate="1">🔊 Listen</button>
        </div>
        <div class="vocab-card-back">
            <div class="vocab-ar">الأخت / الأخ</div>
            <div class="vocab-example"><div class="en">My sister is tall and very kind.</div><div class="ar">أختي طويلة وطيبة جدًا.</div></div>
        </div>
        <div class="vocab-card-hint">👆 دوس / Tap</div>
    </div>
    <div class="vocab-card">
        <div class="vocab-card-front">
            <div class="vocab-word">Wife / Husband</div>
            <div class="vocab-pron">/waɪf/ /ˈhʌzbənd/</div>
            <button type="button" class="speak-btn" data-text="Wife and Husband" data-rate="1">🔊 Listen</button>
        </div>
        <div class="vocab-card-back">
            <div class="vocab-ar">الزوجة / الزوج</div>
            <div class="vocab-example"><div class="en">His wife works as a doctor.</div><div class="ar">زوجته بتشتغل دكتورة.</div></div>
        </div>
        <div class="vocab-card-hint">👆 دوس / Tap</div>
    </div>
    <div class="vocab-card">
        <div class="vocab-card-front">
            <div class="vocab-word">Cousin</div>
            <div class="vocab-pron">/ˈkʌzən/</div>
            <button type="button" class="speak-btn" data-text="Cousin" data-rate="1">🔊 Listen</button>
        </div>
        <div class="vocab-card-back">
            <div class="vocab-ar">ابن/بنت العم أو الخال</div>
            <div class="vocab-example"><div class="en">My cousin visits us every summer.</div><div class="ar">ابن عمي بيزورنا كل صيف.</div></div>
        </div>
        <div class="vocab-card-hint">👆 دوس / Tap</div>
    </div>
    <div class="vocab-card">
        <div class="vocab-card-front">
            <div class="vocab-word">Grandmother / Grandfather</div>
            <div class="vocab-pron">/ˈɡrænmʌðə/ /ˈɡrænfɑːðə/</div>
            <button type="button" class="speak-btn" data-text="Grandmother and Grandfather" data-rate="1">🔊 Listen</button>
        </div>
        <div class="vocab-card-back">
            <div class="vocab-ar">الجدة / الجد</div>
            <div class="vocab-example"><div class="en">My grandfather tells great stories.</div><div class="ar">جدي بيحكي حواديت جميلة.</div></div>
        </div>
        <div class="vocab-card-hint">👆 دوس / Tap</div>
    </div>
    <div class="vocab-card">
        <div class="vocab-card-front">
            <div class="vocab-word">Tall / Short</div>
            <div class="vocab-pron">/tɔːl/ /ʃɔːt/</div>
            <button type="button" class="speak-btn" data-text="Tall and Short" data-rate="1">🔊 Listen</button>
        </div>
        <div class="vocab-card-back">
            <div class="vocab-ar">طويل / قصير</div>
            <div class="vocab-example"><div class="en">My brother is tall, but I am short.</div><div class="ar">أخويا طويل، بس أنا قصير.</div></div>
        </div>
        <div class="vocab-card-hint">👆 دوس / Tap</div>
    </div>
    <div class="vocab-card">
        <div class="vocab-card-front">
            <div class="vocab-word">Kind</div>
            <div class="vocab-pron">/kaɪnd/</div>
            <button type="button" class="speak-btn" data-text="Kind" data-rate="1">🔊 Listen</button>
        </div>
        <div class="vocab-card-back">
            <div class="vocab-ar">طيب / لطيف</div>
            <div class="vocab-example"><div class="en">Our neighbor is very kind to everyone.</div><div class="ar">جارنا طيب جدًا مع الكل.</div></div>
        </div>
        <div class="vocab-card-hint">👆 دوس / Tap</div>
    </div>
    <div class="vocab-card">
        <div class="vocab-card-front">
            <div class="vocab-word">Funny</div>
            <div class="vocab-pron">/ˈfʌni/</div>
            <button type="button" class="speak-btn" data-text="Funny" data-rate="1">🔊 Listen</button>
        </div>
        <div class="vocab-card-back">
            <div class="vocab-ar">مضحك</div>
            <div class="vocab-example"><div class="en">My little brother is really funny.</div><div class="ar">أخويا الصغير مضحك جدًا.</div></div>
        </div>
        <div class="vocab-card-hint">👆 دوس / Tap</div>
    </div>
    <div class="vocab-card">
        <div class="vocab-card-front">
            <div class="vocab-word">Friendly</div>
            <div class="vocab-pron">/ˈfrɛndli/</div>
            <button type="button" class="speak-btn" data-text="Friendly" data-rate="1">🔊 Listen</button>
        </div>
        <div class="vocab-card-back">
            <div class="vocab-ar">ودود / اجتماعي</div>
            <div class="vocab-example"><div class="en">She is friendly with all her classmates.</div><div class="ar">هي ودودة مع كل زمايلها.</div></div>
        </div>
        <div class="vocab-card-hint">👆 دوس / Tap</div>
    </div>
    <div class="vocab-card">
        <div class="vocab-card-front">
            <div class="vocab-word">Hardworking</div>
            <div class="vocab-pron">/hɑːdˈwɜːkɪŋ/</div>
            <button type="button" class="speak-btn" data-text="Hardworking" data-rate="1">🔊 Listen</button>
        </div>
        <div class="vocab-card-back">
            <div class="vocab-ar">مجتهد / شغّيل</div>
            <div class="vocab-example"><div class="en">My father is hardworking and honest.</div><div class="ar">أبويا مجتهد وأمين.</div></div>
        </div>
        <div class="vocab-card-hint">👆 دوس / Tap</div>
    </div>
</div>

<h2>جمل وصف حقيقية / Real Descriptive Sentences</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 ترتيب وصف حد بالإنجليزي بسيط: Subject + is/are + صفة. ممكن تحط أكتر من صفة مع "and".</div>
    <div class="en">🇬🇧 Describing someone in English is simple: Subject + is/are + adjective. You can add more than one adjective with "and".</div>
</div>
<div class="output-box">My sister is tall and very kind. → أختي طويلة وطيبة جدًا.
My father is hardworking and quiet. → أبويا مجتهد وهادي.
My best friend is short but very funny. → صاحبي الأقرب قصير بس مضحك جدًا.
My grandmother is friendly and generous. → جدتي ودودة وكريمة.
My cousins are tall and friendly. → أولاد عمي طوال وودودين.</div>

<h2>سؤال عن العائلة / Asking About Family</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 عشان تسأل حد عن عيلته أو عن شكل حد بتقول "Do you have any brothers or sisters?" أو "What does your sister look like?"</div>
    <div class="en">🇬🇧 To ask someone about their family or what someone looks like, you say "Do you have any brothers or sisters?" or "What does your sister look like?"</div>
</div>
<div class="output-box">Do you have any brothers or sisters? → عندك إخوات؟
Yes, I have one brother and two sisters. → أيوه، عندي أخ واحد وأختين.
What does your father look like? → أبوك شكله عامل إزاي؟
He is tall, with short hair. → هو طويل، وشعره قصير.</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="sister">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">إيه معنى "Sister"؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What does "Sister" mean?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="sister"> الأخت</label>
        <label><input type="radio" name="q1" value="brother-wrong"> الأخ</label>
        <label><input type="radio" name="q1" value="cousin-wrong"> ابن العم</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="kind">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">أي كلمة معناها "طيب"؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Which word means "kind"?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="kind"> kind</label>
        <label><input type="radio" name="q2" value="short"> short</label>
        <label><input type="radio" name="q2" value="funny"> funny</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="is-tall">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">أكمل صح: "My brother ___ tall."<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Complete correctly.</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="are-tall"> are</label>
        <label><input type="radio" name="q3" value="is-tall"> is</label>
        <label><input type="radio" name="q3" value="am-tall"> am</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="hardworking">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">أي كلمة معناها "مجتهد / شغّيل"؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Which word means "hardworking"?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="friendly"> friendly</label>
        <label><input type="radio" name="q4" value="hardworking"> hardworking</label>
        <label><input type="radio" name="q4" value="grandmother"> grandmother</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ اوصف عيلتك / Describe Your Family</h3>
    <div class="ar">🇪🇬 اكتب 4 جمل عن أفراد حقيقيين في عيلتك، كل جملة فيها اسم القرابة + صفة شكل أو شخصية (زي: "My mother is kind and hardworking.")، وترجمهم لنفسك بالعربي.</div>
    <div class="en">🇬🇧 Write 4 sentences about real members of your family, each with a family word + an appearance or personality adjective (like: "My mother is kind and hardworking."), and translate them to Arabic yourself.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 دلوقتي وانت عارف تتكلم عن عيلتك، جاي الدور على الروتين اليومي — هتتكلم عن يومك بالكامل من الصبح للمسا باستخدام المضارع البسيط.</div>
    <div class="en">🇬🇧 Now that you can talk about your family, it's time for your daily routine — you'll talk about your whole day from morning to night using Present Simple.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>أفراد العائلة: mother, father, sister, brother, wife, husband, cousin, grandmother, grandfather.</li>
        <li>صفات الشكل والشخصية: tall, short, kind, funny, friendly, hardworking.</li>
        <li>الوصف = Subject + is/are + صفة (+ and + صفة تانية).</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="numbers-time.php">← المرحلة السابقة</a>
    <a href="daily-routine.php">المرحلة الجاية / Next: الروتين اليومي →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
