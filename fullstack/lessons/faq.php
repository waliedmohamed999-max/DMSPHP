<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'faq';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'أهم الأسئلة — Full Stack Developer';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">المرحلة 3 / Stage 3</span>
<h1>أهم الأسئلة التي يسألها من يبدأ التعلم <span class="ltr">Common Questions Before You Start</span></h1>
<p class="subtitle">قبل ما تدخل في التفاصيل، فيه أسئلة بتتكرر مع كل حد بيبدأ — جاوبنا عليها هنا عشان تبدأ وانت مرتاح.</p>

<div class="step-tracker">
    <a href="#read">📖 Read</a>
    <a href="#understand">🧠 Understand</a>
    <a href="#quiz">🧠 Quiz</a>
    <a href="#challenge">🛠️ Challenge</a>
    <a href="#project">🚀 Project</a>
</div>

<h2 id="read">هل لازم أتعلم Front-End كامل قبل Back-End؟</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 لأ مش شرط تتقنه بالكامل، لكن لازم تعرف أساسياته (HTML/CSS/JS) قبل ما تدخل PHP — لإن أي تطبيق ويب في الآخر بيرجع HTML للمتصفح، ولازم تفهم شكل المخرجات اللي PHP بتولّدها. المسار هنا مصمم يديك الأساسيات الكافية بالترتيب الصح.</div>
    <div class="en">🇬🇧 No, you don't need to master it fully, but you need its basics (HTML/CSS/JS) before PHP — because any web app ultimately returns HTML to the browser, and you need to understand the shape of what PHP generates. This track is designed to give you just enough, in the right order.</div>
</div>

<h2 id="understand">قد إيه هياخد مني الوقت أوصل لمستوى Full Stack؟</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 مفيش رقم ثابت — بيعتمد على وقتك اليومي وعمق فهمك مش بس سرعة قراءتك. اللي بيفرق فعلًا هو "التنفيذ الفعلي" — لو بتنفذ كل تمرين بنفسك بدل ما تقرا بس، هتوصل أسرع بكتير من حد بيتفرج على شرح وبس.</div>
    <div class="en">🇬🇧 There's no fixed number — it depends on your daily time and depth of understanding, not just reading speed. What actually matters is "hands-on execution" — if you do every exercise yourself instead of just reading, you'll get there far faster than someone who only watches explanations.</div>
</div>

<div class="flow-diagram">
    <div class="flow-box">HTML/CSS</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">JavaScript</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">PHP</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">MySQL</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">مشروعين تطبيقيين</div>
</div>
<div class="bi-block">
    <div class="ar">🇪🇬 ده الترتيب اللي المسار مبني عليه — كل خطوة بتبني على اللي قبلها مباشرة. متقلقش لو حسيت إنك بطيء في خطوة معينة، المهم إنك متعدّيهاش قبل ما تفهمها كويس، مش السرعة.</div>
    <div class="en">🇬🇧 This is the order the track is built on — each step builds directly on the one before it. Don't worry if a particular step feels slow; what matters is not moving past it before you understand it, not speed.</div>
</div>

<h2>محتاج شهادة جامعية عشان أشتغل Full Stack؟</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 لأ. سوق الشغل في البرمجة بيركّز على اللي انت قادر تعمله — Portfolio بمشاريع حقيقية بتشتغل غالبًا بيفتحلك أبواب أكتر من الشهادة نفسها. المهم إنك تبني مشاريع فعلية (زي المشروعين في آخر المسار ده) وتحطهم على GitHub.</div>
    <div class="en">🇬🇧 No. The programming job market focuses on what you can actually do — a Portfolio of real, working projects often opens more doors than the degree itself. What matters is building real projects (like the two at the end of this track) and putting them on GitHub.</div>
</div>

<h2>هل لازم أحفظ كل الأكواد؟</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 لأ خالص. المبرمجين المحترفين بيرجعوا للتوثيق (Documentation) وGoogle طول الوقت. اللي محتاج تحفظه هو "المنطق" — إمتى تستخدم loop، إمتى تحتاج function، إزاي تفكّك مشكلة. التفاصيل الدقيقة (زي اسم دالة بالظبط) هتترسخ بالاستخدام المتكرر لوحدها.</div>
    <div class="en">🇬🇧 Not at all. Professional developers constantly refer back to documentation and Google. What you need to internalize is the "logic" — when to use a loop, when you need a function, how to break down a problem. Exact details (like a function's precise name) stick naturally through repeated use.</div>
</div>

<h2>أبدأ بمشروع من نفسي ولا أخلّص المسار الأول؟</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 الاتنين مع بعض أفضل حاجة. خلّص كل مرحلة، بس بعد كل جزء كبير (زي ما تخلّص الـ Front-End مثلاً) جرّب تطبّق فكرة بسيطة بنفسك من غير ما تستنى المشروع النهائي — ده بيثبّت الفهم بشكل مختلف تمامًا عن التمارين الموجّهة.</div>
    <div class="en">🇬🇧 Both together is best. Finish each stage, but after each major part (like finishing Front-End) try applying a simple idea on your own without waiting for the final project — this solidifies understanding differently than guided exercises alone.</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="portfolio">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">إيه اللي بيفتح أبواب أكتر في سوق شغل البرمجة عادةً؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What typically opens more doors in the programming job market?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="degree"> الشهادة الجامعية فقط</label>
        <label><input type="radio" name="q1" value="portfolio"> Portfolio بمشاريع حقيقية شغالة</label>
        <label><input type="radio" name="q1" value="none"> ولا واحد فيهم بيفرق</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="logic">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">إيه اللي المفروض تركّز على حفظه فعليًا؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What should you actually focus on memorizing?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="names"> أسماء الدوال بالظبط حرف حرف</label>
        <label><input type="radio" name="q2" value="logic"> المنطق: إمتى تستخدم loop أو function</label>
        <label><input type="radio" name="q2" value="nothing"> مفيش داعي تفهم حاجة، بس نسخ ولزق</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ اكتب خطتك الشخصية / Write Your Own Plan</h3>
    <div class="ar">🇪🇬 بناءً على إجاباتك هنا، اكتب خطة بسيطة لأسبوعك الجاي: كام ساعة يوميًا هتخصصها، وهتوصل لحد فين في المسار (مثلاً "أخلّص HTML وأبدأ CSS"). خزّن الخطة دي في مكان هتشوفه كل يوم، وارجعلها آخر الأسبوع تقيّم نفسك بصدق.</div>
    <div class="en">🇬🇧 Based on your answers here, write a simple plan for next week: how many hours daily you'll commit, and how far in the track you'll get (e.g. "finish HTML and start CSS"). Keep this plan somewhere you'll see daily, and revisit it at week's end to honestly assess yourself.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 كل سؤال اتجاوب عليه هنا بيوصلك لنفس النقطة: الطريق الوحيد لمشروع <b>Online Store</b> في آخر المسار هو التنفيذ الفعلي خطوة بخطوة، مش القراءة بس ولا انتظار "الوقت المثالي" للبدء.</div>
    <div class="en">🇬🇧 Every question answered here points to the same conclusion: the only path to the <b>Online Store</b> project at the end of this track is actually executing, step by step — not just reading, and not waiting for the "perfect time" to start.</div>
</div>

<div class="recap-box">
    <h3>✅ خلاصة / Bottom Line</h3>
    <ul>
        <li>ابدأ بأساسيات Front-End، مش لازم إتقان كامل قبل الانتقال لـ Back-End.</li>
        <li>الوقت مش المقياس — التنفيذ الفعلي هو اللي بيفرق.</li>
        <li>Portfolio بمشاريع حقيقية أهم من أي شهادة.</li>
        <li>افهم المنطق، متحفظش التفاصيل — هي هتيجي بالاستخدام.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="setup.php">← المرحلة السابقة</a>
    <a href="../index.php">لوحة الدروس / Dashboard</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
