<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'test-prep-careers';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'التحضير للاختبارات والمسار المهني';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">المرحلة 13 / Stage 13 — الأخيرة / Final</span>
<h1>التحضير للاختبارات والمسار المهني <span class="ltr">Test Prep &amp; Career Path</span></h1>
<p class="subtitle">آخر محطة في المسار: إزاي تحوّل كل اللي اتعلمته في الـ12 مرحلة اللي فاتت لشهادة رسمية أو فرصة شغل عن بُعد فعلية.</p>

<div class="step-tracker">
    <a href="#read">📖 Read</a>
    <a href="#understand">🧠 Understand</a>
    <a href="#quiz">🧠 Quiz</a>
    <a href="#challenge">🛠️ Challenge</a>
    <a href="#project">🚀 Project</a>
</div>

<h2 id="read">الهدف / Goal</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 تاخد نظرة عملية على اختبارات IELTS وTOEFL العالمية (بيقيسوا إيه، ومعنى الدرجة/الباند)، وتفهم إزاي إنجليزية قوية بتفتحلك فرص شغل عن بُعد حقيقية — مش مجرد ميزة إضافية في الـCV.</div>
    <div class="en">🇬🇧 Get a practical overview of the global IELTS and TOEFL tests (what they measure, what the score/band means), and understand how strong English opens real remote job opportunities — not just a nice-to-have on your CV.</div>
</div>

<h2 id="understand">نظرة على IELTS وTOEFL / IELTS &amp; TOEFL Overview</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 IELTS وTOEFL أشهر اختبارين عالميين لقياس مستوى الإنجليزية، بيستخدموا للدراسة بالخارج أو بعض فرص الشغل الرسمية. الاتنين بيقيسوا 4 مهارات: Listening, Reading, Writing, Speaking.</div>
    <div class="en">🇬🇧 IELTS and TOEFL are the most well-known global English proficiency tests, used for studying abroad or some formal job opportunities. Both measure 4 skills: Listening, Reading, Writing, and Speaking.</div>
</div>
<div class="output-box">IELTS:
  الدرجة من 1 إلى 9 (Band Score). Band 6 ≈ متوسط جيد (B2 تقريبًا)،
  Band 7-8 ≈ متقدم (C1)، Band 9 ≈ إتقان كامل (نادر حتى للناطقين الأصليين).
  أغلب الجامعات والشركات بتطلب Band 6.5 - 7 كحد أدنى.

TOEFL iBT:
  الدرجة من 0 إلى 120 (30 لكل مهارة من الأربعة).
  100+ ≈ مستوى متقدم قوي (يقارب IELTS Band 7-7.5).
  80-99 ≈ مستوى جيد يفتح أغلب الفرص الأكاديمية والمهنية.</div>
<div class="bi-block">
    <div class="ar">🇪🇬 مبروك على وصولك للمستوى ده من المسار — الأساسيات اللي بنيتها في الدروس السابقة (القواعد، المفردات، القراءة، الكتابة) هي بالظبط المهارات اللي الاختبارات دي بتقيسها، فأنت أقرب لجاهزيتها مما تتوقع.</div>
    <div class="en">🇬🇧 Congratulations on reaching this point in the track — the foundations you built in previous lessons (grammar, vocabulary, reading, writing) are exactly the skills these tests measure, so you're closer to being ready than you might think.</div>
</div>

<h2>إزاي الإنجليزية بتفتح فرص شغل عن بُعد / How English Unlocks Remote Jobs</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 لما تشوف إعلان وظيفة عن بُعد بيقول "Fluent English required"، ده مش شرط شكلي — ده معناه عملي: هتحتاج تكتب رسائل واضحة على Slack، تشارك في اجتماعات فيديو، وتقرا/تكتب توثيق تقني، كل ده من غير مترجم أو مساعدة. الشركة بتقيس ده غالبًا في مقابلة شخصية بالإنجليزي أو تاسك كتابي بسيط.</div>
    <div class="en">🇬🇧 When you see a remote job posting saying "Fluent English required," that's not a formality — it has a practical meaning: you'll need to write clear Slack messages, participate in video meetings, and read/write technical documentation, all without a translator or help. Companies usually test this through an English-language interview or a short written task.</div>
</div>
<div class="output-box">مثال إعلان وظيفة حقيقي / Real job posting example:

"We are a fully remote team spread across 12 countries. Fluent English
(written and spoken) is required, as all documentation, code reviews,
and daily stand-ups are conducted in English."

معنى "Fluent English required" هنا عمليًا:
  1. تقدر تكتب Pull Request description واضح بالإنجليزي.
  2. تقدر تتابع Daily Stand-up وتشارك فيه بصوتك.
  3. تقدر تفهم Code Review comments وترد عليها بوضوح.
  4. تقدر تكتب رسالة Slack مهذبة ومباشرة لو محتاج مساعدة.</div>
<div class="bi-block">
    <div class="ar">🇪🇬 الخبر الكويس: مش لازم تكون "Native-level" أو حتى C2 — أغلب الشركات فعليًا بتقصد مستوى B2 قوي (زي اللي بنيته في المسار ده): تقدر توصل فكرتك بوضوح، تفهم وتُفهم، حتى لو فيه أخطاء بسيطة أحيانًا.</div>
    <div class="en">🇬🇧 The good news: you don't need to be "native-level" or even C2 — most companies actually mean a solid B2 level (like the one you've built in this track): you can express your ideas clearly, understand and be understood, even with occasional small mistakes.</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="four-skills">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">IELTS وTOEFL بيقيسوا كام مهارة، وإيه هي؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">How many skills do IELTS and TOEFL measure?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="two"> اتنين بس: القراءة والكتابة</label>
        <label><input type="radio" name="q1" value="four-skills"> أربعة: Listening, Reading, Writing, Speaking</label>
        <label><input type="radio" name="q1" value="grammar-only"> القواعد بس من غير أي حاجة تانية</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="nine">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">درجة IELTS بتتقاس من كام لكام (Band Score)؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What's the IELTS band score range?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="hundred"> من 0 إلى 100</label>
        <label><input type="radio" name="q2" value="nine"> من 1 إلى 9</label>
        <label><input type="radio" name="q2" value="ten"> من 1 إلى 10</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="practical">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">"Fluent English required" في إعلان شغل عن بُعد بتعني إيه عمليًا حسب الدرس؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What does "Fluent English required" mean practically per this lesson?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="native-only"> لازم تكون متحدث أصلي بالظبط، مفيش استثناء</label>
        <label><input type="radio" name="q3" value="practical"> تقدر تكتب/تتكلم بوضوح في الاجتماعات والتوثيق والشات اليومي</label>
        <label><input type="radio" name="q3" value="irrelevant"> جملة شكلية مالهاش أي معنى عملي</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="b2">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">حسب الدرس، إيه المستوى اللي أغلب الشركات فعليًا بتقصده بكلمة "Fluent"؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What level do most companies actually mean by "Fluent"?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="b2"> مستوى B2 قوي، مش بالضرورة C2 أو Native</label>
        <label><input type="radio" name="q4" value="a1"> مستوى A1 المبتدئ بس</label>
        <label><input type="radio" name="q4" value="native-required"> لازم تكون Native بالظبط ولا حاجة أقل</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ حلل إعلان وظيفة حقيقي / Analyze a Real Job Posting</h3>
    <div class="ar">🇪🇬 افتح موقع وظائف عن بُعد (زي RemoteOK أو WeWorkRemotely) ودوّر على إعلان لوظيفة برمجة بيطلب "Fluent English" أو "Excellent English communication skills". اكتب: إيه المهام اللي هتحتاج فيها إنجليزي فعليًا (اجتماعات؟ توثيق؟ دعم عملاء؟)، وقيّم بصراحة: أنت جاهز لأي جزء منها دلوقتي بعد المسار ده؟</div>
    <div class="en">🇬🇧 Open a remote job site (like RemoteOK or WeWorkRemotely) and find a programming job posting requiring "Fluent English" or "Excellent English communication skills." Write down: which tasks will actually need English (meetings? documentation? customer support?), and honestly assess: which parts are you ready for now, after this track?</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 وصلت لآخر مرحلة في مسار اللغة الإنجليزية بسيلا! دلوقتي مبنياك جاهز — القواعد، المفردات، القراءة، الكتابة، والإنجليزية التقنية والمهنية كلها في إيدك. مشروعك القادم: طبّق كل ده بشكل يومي في مساراتك البرمجية الأخرى بسيلا — اقرا التوثيق بالإنجليزي مباشرة، واكتب رسائل الـ Commit والـ Pull Request بالإنجليزي من دلوقتي.</div>
    <div class="en">🇬🇧 You've reached the final stage of Sila's English Language track! You're now equipped — grammar, vocabulary, reading, writing, and professional/technical English are all in your hands. Your next project: apply all of this daily across your other Sila programming tracks — read documentation directly in English, and write your commit messages and pull request descriptions in English starting now.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>IELTS (Band 1-9) وTOEFL (0-120) بيقيسوا Listening, Reading, Writing, Speaking.</li>
        <li>Band 6.5-7 أو TOEFL 80-100 كافيين لأغلب الفرص الأكاديمية والمهنية.</li>
        <li>"Fluent English required" في وظائف عن بُعد = تقدر تتواصل بوضوح في التوثيق والاجتماعات والشات اليومي.</li>
        <li>مش لازم تكون Native — مستوى B2 قوي زي اللي بنيته هنا كافي جدًا.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="technical-english.php">← المرحلة السابقة</a>
    <a href="../index.php">لوحة الدروس / Dashboard</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
