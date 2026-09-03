<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'stage12';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'المرحلة 12 — الاستمرارية والاحتراف العالمي';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">المسار الاحترافي — المرحلة الأخيرة / Final Stage</span>
<h1>الاستمرارية والاحتراف العالمي <span class="ltr">Staying World-Class</span></h1>
<p class="subtitle">مفيش "خلصت" في البرمجة — فيه بس "بقيت جاهز تكمل لوحدك". المرحلة دي مش عن مفهوم تقني جديد، هي عن العادات اللي بتفرّق بين مبرمج توقف عند شهادة، ومبرمج بيبقى أفضل كل سنة.</p>

<div class="step-tracker">
    <a href="#read">📖 Read</a>
    <a href="#understand">🧠 Understand</a>
    <a href="#practice">💻 Practice</a>
    <a href="#quiz">🧠 Quiz</a>
    <a href="#challenge">🛠️ Challenge</a>
    <a href="#project">🚀 Project</a>
</div>

<h2 id="read">📖 الهدف / Goal</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 تاخد عادات وأدوات تخليك تكمل تتعلم لوحدك بعد ما تخلص الأداة دي: قراءة كود حقيقي، المساهمة في مشاريع مفتوحة المصدر، متابعة تطور اللغة، والاستعداد لمقابلات الشغل الكبيرة (System Design Interviews).</div>
    <div class="en">🇬🇧 Build the habits and tools that let you keep learning on your own after finishing this tool: reading real code, contributing to open source, following the language's evolution, and preparing for serious job interviews (System Design Interviews).</div>
</div>

<h2 id="understand">🧠 اقرأ كود المحترفين / Read Real-World Code</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 أسرع طريقة تتعلم بيها بعد المستوى ده مش دورة جديدة — هي إنك تفتح كود مكتبة أو framework بتستخدمه وتقرا إزاي هما عملوه. جرّب تفتح كود مكتبة زي <code>Monolib</code> أو حتى Laravel نفسه على GitHub، ودوّر على الكلاس اللي بيعمل حاجة انت فاهمها (زي Router)، وشوف تنفيذهم بالظبط.</div>
    <div class="en">🇬🇧 The fastest way to grow past this point isn't another course — it's opening a library or framework you already use and reading how they built it. Try opening a library like <code>Monolog</code> or even Laravel itself on GitHub, find a class doing something you already understand (like a Router), and study their exact implementation.</div>
</div>

<h2>ساهم في مشاريع مفتوحة المصدر / Contribute to Open Source</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 أول مساهمة مش لازم تكون feature كبيرة — ممكن تكون تصحيح خطأ إملائي في التوثيق، أو إصلاح Bug بسيط اتعلّم عليه "Good first issue" على GitHub. الفايدة الحقيقية مش الكود نفسه، هي إنك بتتعامل مع Code Review حقيقي من مبرمجين محترفين، وده بيعلّمك أسرع من أي حاجة تانية.</div>
    <div class="en">🇬🇧 Your first contribution doesn't need to be a big feature — it could be fixing a typo in documentation, or a small bug labeled "Good first issue" on GitHub. The real value isn't the code itself — it's going through a real Code Review from experienced engineers, which teaches you faster than almost anything else.</div>
</div>

<h2>ابنِ Portfolio حقيقي / Build a Real Portfolio</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 مشروع Task Manager اللي بنيته في الـ Capstone هو بداية كويسة، بس Portfolio قوي محتاج 2-3 مشاريع مختلفة بتوضح مهارات مختلفة (واحد فيه Real-time features، واحد فيه Payment integration، واحد Open source ساهمت فيه). حط كل مشروع على GitHub بـ README واضح يشرح إيه اللي بناه وليه.</div>
    <div class="en">🇬🇧 The Task Manager you built in the Capstone is a good start, but a strong Portfolio needs 2-3 different projects showing different skills (one with Real-time features, one with Payment integration, one Open source contribution). Put each project on GitHub with a clear README explaining what it does and why.</div>
</div>

<h2>الاستعداد لمقابلات System Design</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 وظائف الـ Backend المتقدمة (Senior فما فوق) بتختبرك على تصميم أنظمة، مش حفظ syntax. المرحلة اللي فاتت (System Design) هي أساس ده — تدرّب على أسئلة زي "صمم نظام زي Twitter" أو "صمم URL shortener"، وركّز على السؤال الصح: "ليه اخترت ده؟" مش بس "هعمل إيه؟".</div>
    <div class="en">🇬🇧 Senior+ Backend roles test system design, not syntax memorization. The previous stage (System Design) is the foundation — practice questions like "design a system like Twitter" or "design a URL shortener," focusing on the right question: "why did I choose this?" not just "what will I build?"</div>
</div>

<h2>ابقَ محدّث / Stay Current</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 PHP بتتطور كل سنة (نسخة جديدة كل سنة تقريبًا). تابع الـ Changelog الرسمي، وجرّب أي ميزة جديدة في مشروع صغير بمجرد ما تتنزل — ده أسهل بكتير من إنك تتعلم 5 نسخ مرة واحدة بعد سنين.</div>
    <div class="en">🇬🇧 PHP evolves roughly once a year. Follow the official Changelog, and try any new feature in a small project as soon as it lands — this is far easier than trying to catch up on 5 versions at once years later.</div>
</div>

<h2 id="practice">💻 تتبّع عاداتك بنفسك / Track Your Own Habits</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 نفس فكرة قايمة العادات تحت، لكن بكود PHP فعلي — مصفوفة associative بتمثّل كل عادة وهل عملتها ولا لأ، وحساب نسبة الإنجاز أوتوماتيك. عدّل القيم لـ <code>true</code>/<code>false</code> حسب حالتك فعليًا وشغّله.</div>
    <div class="en">🇬🇧 The same idea as the checklist below, but as real PHP — an associative array representing each habit and whether you've done it, with the completion percentage computed automatically. Change the values to <code>true</code>/<code>false</code> to match your actual status and run it.</div>
</div>

<div class="mini-editor-wrap">
    <textarea spellcheck="false">&lt;?php
// متعقّب بسيط لعادات "الاحتراف المستمر" — نفس فكرة الـ Checklist فوق، لكن كـ PHP فعلي
$habits = [
    'قرأت كود مكتبة حقيقية هذا الأسبوع' => true,
    'بحثت عن good first issue' => false,
    'بدأت مشروع جديد هذا الفصل' => true,
    'تدربت على سؤال System Design' => false,
];

$done = array_filter($habits);
$percent = round((count($done) / count($habits)) * 100);

foreach ($habits as $habit => $isDone) {
    echo ($isDone ? '✅' : '⬜') . " $habit" . PHP_EOL;
}
echo PHP_EOL . "التقدم: $percent%" . PHP_EOL;</textarea>
    <div class="mini-toolbar">
        <button class="mini-run-btn">▶ شغّل / Run</button>
        <span class="mini-status"></span>
    </div>
    <div class="output-box">— لسه متشغلش / not run yet —</div>
</div>

<div class="recap-box">
    <h3>📋 عادات المحترف العالمي / World-Class Habits Checklist</h3>
    <ul>
        <li>افتح كود مكتبة حقيقية كل أسبوع واقرا جزء منه.</li>
        <li>ابحث عن "Good first issue" في مشروع مفتوح المصدر بتستخدمه وساهم فيه.</li>
        <li>اعمل مشروع جديد كل 2-3 شهور يعلّمك حاجة مكنتش عارفها.</li>
        <li>تدرّب على سؤال System Design واحد كل أسبوعين.</li>
        <li>تابع الـ RFCs والـ Changelog بتاع PHP.</li>
    </ul>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="review">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">حسب المرحلة دي، إيه القيمة الحقيقية لأول مساهمة في Open Source (حتى لو تصحيح خطأ إملائي)؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What's the real value of a first Open Source contribution, even a typo fix?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="fame"> الشهرة على GitHub</label>
        <label><input type="radio" name="q1" value="review"> المرور بـ Code Review حقيقي من مبرمجين محترفين</label>
        <label><input type="radio" name="q1" value="money"> فلوس مباشرة من المشروع</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="why">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">مقابلات System Design للوظائف المتقدمة بتركّز على إيه أكتر؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What do System Design interviews for senior roles focus on most?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="syntax"> حفظ syntax لغة معيّنة</label>
        <label><input type="radio" name="q2" value="why"> السبب وراء كل قرار تصميم ("ليه اخترت ده؟")</label>
        <label><input type="radio" name="q2" value="speed"> سرعة الكتابة بس</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ زوّد عادة جديدة على المتعقّب / Add a New Habit to the Tracker</h3>
    <div class="ar">🇪🇬 في المحرر فوق، زوّد عادة خامسة اسمها "راجعت الـ Portfolio بتاعي" على مصفوفة <code>$habits</code>، وزوّد على الكود سطر يطبع رسالة مختلفة لو النسبة وصلت 100% (زي "🎉 كل العادات دي الأسبوع!").</div>
    <div class="en">🇬🇧 In the editor above, add a fifth habit, "Reviewed my Portfolio", to the <code>$habits</code> array, and add a line that prints a special message if the percentage reaches 100% (like "🎉 All habits this week!").</div>
</div>

<div class="exercise-box">
    <h3>🎓 المهمة الأخيرة / The Final Task</h3>
    <div class="ar">🇪🇬 روح دلوقتي على GitHub، دوّر على مشروع PHP مفتوح المصدر بتستخدمه أو بيعجبك، وابحث في الـ Issues عن حاجة اسمها "good first issue". اقرا الكود المتعلق بيها، وحاول تحل مشكلة واحدة — حتى لو بسيطة. ده أول خطوة فعلية بعد الأداة دي.</div>
    <div class="en">🇬🇧 Go to GitHub right now, find an open-source PHP project you use or like, and search its Issues for a "good first issue" label. Read the related code, and try to solve one — even a small one. This is your first real step beyond this tool.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 مشروع Task Manager متخلصش لما تسلّمه — كل عادة اتعلمتها هنا بتنطبق عليه: راجع الكود بتاعك بعد شهر وشوف إيه اللي هتحسّنه، افتح لمساهمات لو نشرته Open Source، وحدّثه كل ما تتعلم مفهوم جديد. المشروع ده أول حاجة في الـ Portfolio بتاعك، مش آخر حاجة.</div>
    <div class="en">🇬🇧 The Task Manager doesn't end when you submit it — every habit you learned here applies to it: revisit your own code after a month and see what you'd improve, open it to contributions if you publish it as Open Source, and update it as you learn new concepts. This project is the first thing in your Portfolio, not the last.</div>
</div>

<div class="recap-box">
    <h3>🏆 وصلت / You've Arrived</h3>
    <div class="ar">🇪🇬 من "تجهيز البيئة" لحد هنا، عدّيت على: أساسيات اللغة، OOP، الويب والأمان، قواعد البيانات، بنية Backend منظمة (MVC/REST)، أدوات احترافية، Design Patterns، اختبارات متقدمة، أداء، DevOps، وتصميم أنظمة. الأداة خلصت اللي عليها — الباقي عليك: استمر تبني، تقرا، وتخطئ وتتعلم. كده فعلًا انت في طريقك لمحترف عالمي.</div>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="stage11.php">← المرحلة السابقة</a>
    <a href="../index.php">لوحة الدروس / Dashboard</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
