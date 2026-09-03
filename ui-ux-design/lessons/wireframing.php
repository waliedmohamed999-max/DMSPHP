<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'wireframing';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'الـ Wireframing والنماذج الأولية';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">المرحلة 6 / Stage 6</span>
<h1>الـ Wireframing والنماذج الأولية <span class="ltr">Wireframing &amp; Prototyping</span></h1>
<p class="subtitle">قبل ما تفتح أي أداة تصميم وتختار لون أو خط، لازم تعرف "إيه اللي هيتحط فين" — وده بالظبط شغل الـ Wireframe، وهو مجرد محطة واحدة في رحلة أطول من الفكرة لحد المنتج القابل للتفاعل.</p>

<div class="step-tracker">
    <a href="#read">📖 Read</a>
    <a href="#understand">🧠 Understand</a>
    <a href="#practice">💻 Practice</a>
    <a href="#quiz">🧠 Quiz</a>
    <a href="#challenge">🛠️ Challenge</a>
    <a href="#project">🚀 Project</a>
</div>

<h2 id="read">الهدف / Goal</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 تفهم إيه هو الـ Wireframe (نموذج منخفض الدقة)، تشوف الفرق بينه وبين التصميم النهائي بعينك، تفهم ليه المصممين بيبدأوا بشكل متعمد بأقل دقة ممكنة، وتتعرف على كل مستويات الدقة اللي بيمر بيها أي مشروع من الفكرة لحد النموذج التفاعلي.</div>
    <div class="en">🇬🇧 Understand what a wireframe is (a low-fidelity model), see the difference between it and a final design with your own eyes, understand why designers deliberately start with the lowest possible fidelity, and learn every fidelity level a project passes through from idea to interactive prototype.</div>
</div>

<h2 id="understand">إيه هو الـ Wireframe؟ / What Is a Wireframe?</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 الـ Wireframe هو رسم "هيكلي" بسيط للصفحة — مربعات رمادية وخطوط ونصوص placeholder زي [LOGO] أو [صورة رئيسية] — من غير أي ألوان حقيقية أو صور أو خطوط نهائية. هدفه إنه يجاوب سؤال واحد بس: "العناصر دي هتترتب إزاي؟" مش "هتبقى شكلها إيه؟".</div>
    <div class="en">🇬🇧 A wireframe is a simple structural sketch of a page — grey boxes, lines, and placeholder text like [LOGO] or [HERO IMAGE] — with no real colors, images, or final fonts. Its only goal is to answer one question: "how will these elements be arranged?" not "what will they look like?"</div>
</div>

<h3>Wireframe منخفض الدقة / Low-fidelity Wireframe</h3>
<iframe class="render-box" style="height:260px" sandbox srcdoc='<html><body style="font-family:Arial,sans-serif;padding:14px;background:#fafafa">
<div style="display:flex;justify-content:space-between;align-items:center;background:#e0e0e0;padding:10px;border:1px dashed #999">
<span style="color:#666;font-size:12px">[LOGO]</span>
<span style="color:#666;font-size:12px">[NAV: الرئيسية | من نحن | تواصل]</span>
</div>
<div style="background:#d8d8d8;border:1px dashed #999;height:70px;margin-top:8px;display:flex;align-items:center;justify-content:center;color:#666;font-size:13px">[HERO IMAGE]</div>
<div style="background:#e0e0e0;border:1px dashed #999;height:24px;margin-top:8px;display:flex;align-items:center;justify-content:center;color:#666;font-size:12px">[عنوان رئيسي]</div>
<div style="display:flex;gap:8px;margin-top:8px">
<div style="flex:1;background:#e8e8e8;border:1px dashed #999;height:50px;display:flex;align-items:center;justify-content:center;color:#777;font-size:11px">[BOX 1]</div>
<div style="flex:1;background:#e8e8e8;border:1px dashed #999;height:50px;display:flex;align-items:center;justify-content:center;color:#777;font-size:11px">[BOX 2]</div>
<div style="flex:1;background:#e8e8e8;border:1px dashed #999;height:50px;display:flex;align-items:center;justify-content:center;color:#777;font-size:11px">[BOX 3]</div>
</div>
<div style="background:#ccc;border:1px dashed #999;height:22px;margin-top:8px;width:100px;display:flex;align-items:center;justify-content:center;color:#555;font-size:11px">[زرار]</div>
</body></html>'></iframe>

<h3>النسخة النهائية المصممة / The Finished Styled Version</h3>
<iframe class="render-box" style="height:270px" sandbox srcdoc='<html><body style="font-family:Tahoma,sans-serif;padding:0;margin:0">
<div style="display:flex;justify-content:space-between;align-items:center;background:#1d3557;padding:14px 18px">
<span style="color:white;font-weight:bold">سيلا</span>
<span style="color:#cfe0f5;font-size:13px">الرئيسية &nbsp; من نحن &nbsp; تواصل</span>
</div>
<div style="background:linear-gradient(135deg,#457b9d,#1d3557);height:80px;display:flex;align-items:center;justify-content:center;color:white;font-weight:bold;font-size:15px">تعلم البرمجة والتصميم مجانًا</div>
<div style="text-align:center;font-weight:bold;font-size:16px;margin-top:14px;color:#222">ابدأ رحلتك دلوقتي</div>
<div style="display:flex;gap:10px;padding:0 16px;margin-top:12px">
<div style="flex:1;background:#f1faee;border-radius:8px;padding:10px;text-align:center;font-size:12px;color:#333">📘 دروس PHP</div>
<div style="flex:1;background:#f1faee;border-radius:8px;padding:10px;text-align:center;font-size:12px;color:#333">🎨 تصميم UI/UX</div>
<div style="flex:1;background:#f1faee;border-radius:8px;padding:10px;text-align:center;font-size:12px;color:#333">🚀 مشاريع عملية</div>
</div>
<div style="text-align:center;margin-top:16px">
<button style="background:#e63946;color:white;border:none;padding:10px 26px;border-radius:8px;font-weight:bold">سجل الآن</button>
</div>
</body></html>'></iframe>

<h2>ليه نبدأ بأقل دقة؟ / Why Start Low-fidelity?</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 لو بدأت بتصميم نهائي ملوّن ومفصّل من أول خطوة، وبعدين اكتشفت إن ترتيب العناصر غلط، هتكون ضيعت وقت كبير في تفاصيل هتتغير أو تتشال. الـ Wireframe بيخليك تختبر الهيكل والتدفق بسرعة، تاخد رأي زملاءك أو العميل عليه، وتصلح المشاكل الكبيرة (ترتيب، أولويات) قبل ما تستثمر وقت في التفاصيل البصرية (ألوان، خطوط، صور) اللي أسهل بكتير إنك تغيرها لاحقًا.</div>
    <div class="en">🇬🇧 If you start with a fully colored, detailed final design from step one, then discover the element order is wrong, you have wasted significant time on details that will change or get removed. A wireframe lets you test structure and flow quickly, get feedback from teammates or a client, and fix big problems (ordering, priorities) before investing time in visual details (colors, fonts, images) that are much easier to change later.</div>
</div>

<h2 id="practice">💻 مستويات الدقة / Fidelity Levels</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 "منخفض الدقة" و"نهائي" مش الاختيارين الوحيدين — أي مشروع احترافي بيمر بأربع محطات متتالية، كل واحدة بتضيف تفصيل جديد فوق اللي قبلها:</div>
    <div class="en">🇬🇧 "Low-fidelity" and "final" aren't the only two options — any professional project passes through four sequential stations, each adding a new layer of detail on top of the last:</div>
</div>

<div class="flow-diagram">
    <div class="flow-box">Sketch (رسم يدوي)</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">Low-fi Wireframe</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">High-fi Mockup</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">Prototype (تفاعلي)</div>
</div>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>Sketch</b>: رسم سريع بقلم على ورقة أو Whiteboard، دقايق معدودة، هدفه توليد أفكار كتير بسرعة. <b>Low-fi Wireframe</b>: نفس فكرة الرسم بس منظّمة رقميًا بمربعات ونصوص placeholder (زي اللي شفته فوق). <b>High-fi Mockup</b>: التصميم بالألوان والخطوط والصور النهائية، لكنه لسه صورة ثابتة مش قابلة للنقر. <b>Prototype</b>: نفس الـ High-fi Mockup بس بروابط تفاعلية فعلية — تضغط على زرار "سجل الآن" فعليًا يوديك لشاشة تانية، عشان تختبر الإحساس الحقيقي قبل ما مطور يكتب سطر كود واحد.</div>
    <div class="en">🇬🇧 <b>Sketch</b>: a quick pen drawing on paper or a whiteboard, a few minutes, aimed at generating many ideas fast. <b>Low-fi Wireframe</b>: the same sketching idea but organized digitally with boxes and placeholder text (like you saw above). <b>High-fi Mockup</b>: the design with final colors, fonts, and images, but still a static image, not clickable. <b>Prototype</b>: the same high-fi mockup but with real interactive links — clicking "Sign Up Now" actually takes you to another screen, so you can test the real feel before a single line of code is written.</div>
</div>

<h3>قبل / Before — رسم أولي بالقلم / A rough pen sketch</h3>
<iframe class="render-box" style="height:170px" sandbox srcdoc='<html><body style="font-family:cursive;padding:16px;background:#fffef8">
<div style="border:2px solid #333;height:20px;display:flex;align-items:center;padding:0 6px;font-size:11px;transform:rotate(-0.4deg)">شعار ---- روابط التنقل</div>
<div style="border:2px dashed #333;height:40px;margin-top:6px;display:flex;align-items:center;justify-content:center;font-size:11px;transform:rotate(0.3deg)">X صورة رئيسية X</div>
<div style="border:2px solid #333;height:16px;width:70px;margin-top:8px;font-size:10px;display:flex;align-items:center;justify-content:center;transform:rotate(-0.5deg)">زرار؟</div>
</body></html>'></iframe>
<h3>بعد / After — Wireframe رقمي منظم / An organized digital wireframe</h3>
<iframe class="render-box" style="height:170px" sandbox srcdoc='<html><body style="font-family:Arial,sans-serif;padding:16px;background:#fafafa">
<div style="background:#e0e0e0;border:1px solid #ccc;height:24px;display:flex;align-items:center;padding:0 8px;font-size:12px;color:#666">[LOGO] — [NAV LINKS]</div>
<div style="background:#d8d8d8;border:1px solid #ccc;height:50px;margin-top:8px;display:flex;align-items:center;justify-content:center;font-size:12px;color:#666">[HERO IMAGE]</div>
<div style="background:#ccc;border:1px solid #999;height:20px;width:90px;margin-top:8px;font-size:11px;display:flex;align-items:center;justify-content:center;color:#555">[زرار: سجل]</div>
</body></html>'></iframe>
<div class="bi-block">
    <div class="ar">🇪🇬 الفرق بين المرحلتين: الـ Sketch بيقولك "الفكرة عمومًا كده"، أما الـ Wireframe الرقمي فبيقولك "المربعات دي هتبقى بنفس النسب والمحاذاة دي بالظبط" — درجة دقة أعلى، لكن لسه من غير ألوان أو صور حقيقية.</div>
    <div class="en">🇬🇧 The difference between the two: the sketch says "the idea, roughly." The digital wireframe says "these boxes will have exactly these proportions and alignment" — a higher level of precision, but still with no real colors or images.</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="arrangement">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">إيه السؤال اللي الـ Wireframe بيجاوب عليه؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What question does a wireframe answer?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="arrangement"> إزاي هترتب العناصر / How will the elements be arranged</label>
        <label><input type="radio" name="q1" value="colors"> إيه هي الألوان النهائية / What are the final colors</label>
        <label><input type="radio" name="q1" value="fonts"> إيه هو الخط المستخدم / What font is used</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="prototype">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">أي مستوى دقة هو أول محطة تقدر تضغط فيها على زرار فعليًا ويوديك لشاشة تانية؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Which fidelity level is the first where you can actually click a button and navigate to another screen?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="sketch"> Sketch</label>
        <label><input type="radio" name="q2" value="prototype"> Prototype</label>
        <label><input type="radio" name="q2" value="lowfi"> Low-fi Wireframe</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="exercise-box">
    <h3>✍️ تمرين عملي / Hands-on Exercise</h3>
    <div class="ar">🇪🇬 على ورقة أو في أي أداة رسم بسيطة، ارسم Wireframe منخفض الدقة لصفحة "ملفي الشخصي" في تطبيق سوشيال ميديا — استخدم مربعات و placeholder نصوص زي [صورة البروفايل] و [اسم المستخدم] بس، من غير أي ألوان.</div>
    <div class="en">🇬🇧 On paper or in any simple drawing tool, sketch a low-fidelity wireframe of a "My Profile" page in a social media app — use boxes and placeholder text like [PROFILE PHOTO] and [USERNAME] only, with no colors.</div>
</div>

<div class="challenge-box">
    <h3>🛠️ اعبر بمستويات الدقة الأربعة / Move Through All Four Fidelity Levels</h3>
    <div class="ar">🇪🇬 اختار شاشة بسيطة (زي شاشة "نسيت كلمة المرور"). ارسمها 4 مرات متتالية بنفس ترتيب المحطات: (1) Sketch بقلم في أقل من دقيقتين، (2) Low-fi Wireframe بمربعات رمادية منظمة، (3) وصف نصي لكيف هتبقى شكل High-fi Mockup (الألوان، الخط، الصور)، (4) اكتب جملة توضح إيه اللي هيتحول لتفاعلي في مرحلة الـ Prototype (مثلًا: الضغط على "إرسال" يوري رسالة تأكيد). الهدف إنك تحس بالفرق العملي بين كل محطة ومحطة.</div>
    <div class="en">🇬🇧 Pick a simple screen (like "Forgot Password"). Draw it 4 times following the same station order: (1) a pen sketch in under two minutes, (2) a low-fi wireframe with organized grey boxes, (3) a text description of how the high-fi mockup would look (colors, font, images), (4) a sentence describing what becomes interactive at the prototype stage (e.g. clicking "Send" shows a confirmation message). The goal is to genuinely feel the practical difference between each station.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 كل حاجة اتعلمتها في المسار لحد دلوقتي (مبادئ التصميم، الألوان، الطباعة، المسافات) بتتحط فعليًا في مرحلة الـ High-fi Mockup — الـ Wireframe بيحدد "فين"، والدروس اللي فاتت بتحدد "إزاي هيبان". وفي درس قابلية الاستخدام الجاي، هتتعلم إزاي تختبر نفس الشاشات دي مع مستخدمين حقيقيين قبل ما تستثمر وقت في بناء Prototype متكامل.</div>
    <div class="en">🇬🇧 Everything you've learned in the track so far (design principles, color, typography, spacing) actually gets applied at the high-fi mockup stage — the wireframe decides "where," and the earlier lessons decide "how it looks." In the upcoming Usability lesson, you'll learn how to test these same screens with real users before investing time in building a full prototype.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>Wireframe = هيكل بس (بدون ألوان/صور نهائية)، بيجاوب "الترتيب إيه؟" مش "الشكل إيه؟".</li>
        <li>البدء منخفض الدقة بيسمح بتعديل سريع قبل استثمار وقت في التفاصيل البصرية.</li>
        <li>التعديل على مربع رمادي أسرع بكتير من التعديل على تصميم نهائي متكامل.</li>
        <li>4 مستويات دقة متتالية: Sketch → Low-fi Wireframe → High-fi Mockup → Prototype.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="layout-spacing.php">← المرحلة السابقة</a>
    <a href="usability.php">المرحلة الجاية / Next: Usability →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
