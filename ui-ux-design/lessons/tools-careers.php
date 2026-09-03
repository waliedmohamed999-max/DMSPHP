<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'tools-careers';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'أدوات التصميم والعمل في المجال';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">المرحلة 8 / Stage 8</span>
<h1>أدوات التصميم والعمل في المجال <span class="ltr">Tools &amp; Careers</span></h1>
<p class="subtitle">دلوقتي وأنت عارف الأساسيات، محتاج تعرف بإيه المصممين بيشتغلوا فعليًا في السوق، وإيه المسارات الوظيفية المتاحة قدامك، وإزاي تبني أول بورتفوليو بخطوات عملية.</p>

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
    <div class="ar">🇪🇬 تتعرف على Figma كأداة معيار الصناعة وليه بتُستخدم كده، تعرف أهم المسارات الوظيفية في مجال UX/UI بمهامها اليومية الفعلية، تتعلم إزاي تعمل اختبار الخمس ثواني عمليًا خطوة بخطوة، وتاخد نصيحة عملية لبناء أول بورتفوليو ليك.</div>
    <div class="en">🇬🇧 Learn about Figma as the industry-standard tool and why it is used this way, know the main career paths in UX/UI with their actual daily tasks, learn how to actually run a 5-second test step by step, and get practical advice for building your first portfolio.</div>
</div>

<h2 id="understand">Figma — أداة الصناعة المعيارية / The Industry-standard Tool</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 Figma هي الأداة الأشهر عالميًا لعمل كل حاجة من أول Wireframe منخفض الدقة، لغاية تصميم عالي الدقة (High-fidelity) بالألوان والخطوط النهائية، لغاية النماذج التفاعلية (Prototypes) اللي بتحاكي إزاي التطبيق هيتحرك فعليًا (زرار يفتح شاشة تانية مثلًا). ميزتها الأساسية إنها شغالة على المتصفح مباشرة وبتسمح لأكتر من مصمم يشتغلوا على نفس الملف في نفس الوقت (زي Google Docs بس للتصميم) — ده بيسهّل التعاون مع فريق المطورين والمنتج جدًا.</div>
    <div class="en">🇬🇧 Figma is the world's most popular tool for doing everything from a low-fidelity wireframe, to a high-fidelity design with final colors and fonts, to interactive prototypes that simulate how the app will actually behave (a button opening another screen, for example). Its key advantage is that it runs directly in the browser and lets multiple designers work on the same file at once (like Google Docs, but for design) — which makes collaborating with developers and product teams much easier.</div>
</div>

<iframe class="render-box" style="height:190px" sandbox srcdoc='<html><body style="font-family:Arial,sans-serif;padding:0;background:#2c2c34">
<div style="display:flex;height:190px">
<div style="width:40px;background:#232329;display:flex;flex-direction:column;align-items:center;padding-top:10px;gap:10px;color:#999;font-size:14px">
<span>▢</span><span>✎</span><span>T</span><span>◎</span>
</div>
<div style="width:110px;background:#28282f;padding:10px 8px;color:#ccc;font-size:11px">
<div style="color:#888;margin-bottom:6px">Layers</div>
<div>📄 Homepage</div>
<div style="margin-inline-start:10px;margin-top:4px">▭ Header</div>
<div style="margin-inline-start:10px;margin-top:4px">▭ Hero</div>
<div style="margin-inline-start:10px;margin-top:4px">▭ Cards</div>
</div>
<div style="flex:1;display:flex;align-items:center;justify-content:center">
<div style="width:140px;height:100px;background:white;border-radius:6px;box-shadow:0 4px 14px rgba(0,0,0,0.4)"></div>
</div>
</div>
</body></html>'></iframe>

<h2>المسارات الوظيفية ومهامها اليومية / Career Paths &amp; Daily Tasks</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 مجال UX/UI مش وظيفة واحدة — فيه تخصصات مختلفة، ولكل واحد يوم عمل مختلف فعليًا:</div>
    <div class="en">🇬🇧 UX/UI is not one job — there are different specializations, and each has a genuinely different working day:</div>
</div>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>UX Researcher</b>: يومه بيتضمن جدولة وإجراء مقابلات مع مستخدمين حقيقيين، تصميم أسئلة استبيان محايدة (من غير ما توحي بالإجابة)، مراقبة جلسات اختبار قابلية استخدام وتدوين الملاحظات، وفي الآخر تلخيص كل ده في تقرير بالمشاكل الأهم يقدمه للفريق. <b>UI Designer</b>: يومه بيتضمن اختيار وتنظيم مكتبة الألوان والخطوط (Design System)، بناء شاشات عالية الدقة في Figma، ومراجعة تفاصيل دقيقة زي المسافات وحالات الزرار (عادي، Hover، معطّل). <b>Product Designer</b>: يومه بيتضمن اجتماعات مع فريق المنتج والمطورين لتحديد أولويات الميزات، رسم Wireframes سريعة لأفكار جديدة، واتخاذ قرارات موازنة بين "الأفضل للمستخدم" و"الممكن تقنيًا وتجاريًا". <b>UX Writer</b>: يومه بيتضمن كتابة ومراجعة كل نص في الواجهة (رسائل الخطأ، نصوص الأزرار، الإشعارات)، واختبار هل النص مفهوم من أول قراءة أو محتاج تبسيط.</div>
    <div class="en">🇬🇧 <b>UX Researcher</b>: their day includes scheduling and running interviews with real users, designing neutral survey questions (that don't hint at the answer), observing usability test sessions and taking notes, and finally summarizing all of it into a report of top issues for the team. <b>UI Designer</b>: their day includes curating a color and font library (a design system), building high-fidelity screens in Figma, and reviewing fine details like spacing and button states (default, hover, disabled). <b>Product Designer</b>: their day includes meetings with product and engineering teams to prioritize features, sketching quick wireframes for new ideas, and making trade-off calls between "best for the user" and "technically and commercially feasible." <b>UX Writer</b>: their day includes writing and reviewing every interface text (error messages, button copy, notifications), and testing whether the text is understood on first read or needs simplifying.</div>
</div>

<h2>بناء بورتفوليو / Building a Portfolio</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 أسهل طريقة تبدأ بيها بورتفوليو وإنت مبتدئ: اختار تطبيق أو موقع موجود فعلًا وعندك فيه مشاكل استخدام واضحة، وأعد تصميمه (Redesign) كمشروع شخصي. وثّق خطوتين: "المشكلة" (ليه التصميم القديم صعب أو مربك — استخدم المبادئ اللي اتعلمتها زي التباين والتسلسل الهرمي) و"الحل" (إيه اللي غيرته وليه، مش بس "غيرت الألوان" لكن "غيرت الألوان عشان أوصل تباين أوضح بين الزرار الأساسي والثانوي"). المشاريع دي بتوري تفكيرك، مش بس شغلك النهائي.</div>
    <div class="en">🇬🇧 The easiest way to start a portfolio as a beginner: pick an existing app or site with clear usability problems, and redesign it as a personal project. Document two parts: "the problem" (why the old design is hard or confusing — using principles you learned like contrast and hierarchy) and "the solution" (what you changed and why, not just "I changed the colors" but "I changed the colors to achieve clearer contrast between the primary and secondary button"). These projects show your thinking, not just your final output.</div>
</div>

<iframe class="render-box" style="height:150px" sandbox srcdoc='<html><body style="font-family:Tahoma,sans-serif;padding:16px">
<div style="font-weight:bold;color:#111;font-size:14px">مثال بورتفوليو: إعادة تصميم شاشة تسجيل الدخول</div>
<div style="display:flex;gap:16px;margin-top:10px">
<div style="flex:1;background:#fff3f3;border-inline-start:3px solid #e63946;padding:8px;border-radius:6px;font-size:12px;color:#333">المشكلة: حقول النموذج غير محاذية، وزرار الدخول لونه باهت وسط الصفحة.</div>
<div style="flex:1;background:#f1faee;border-inline-start:3px solid #2a9d8f;padding:8px;border-radius:6px;font-size:12px;color:#333">الحل: محاذاة الحقول على شبكة واحدة، وزرار بلون تباين واضح.</div>
</div>
</body></html>'></iframe>

<h2 id="practice">💻 المسارات ومهامها بصريًا + اختبار الخمس ثواني عمليًا / Career Paths Visualized + The 5-second Test in Practice</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 وصف وظيفة عام ("مصمم UI/UX مطلوب") بيسيب المبتدئ مش فاهم هيعمل إيه فعليًا يوميًا. المقارنة تحت بتوضح الفرق بين وصف عام مبهم ووصف واضح بمهام يومية حقيقية.</div>
    <div class="en">🇬🇧 A generic job description ("UI/UX Designer wanted") leaves a beginner not knowing what they'll actually do day to day. The comparison below shows the difference between a vague generic description and a clear one with real daily tasks.</div>
</div>

<h3>قبل / Before — وصف وظيفة مبهم / Vague job description</h3>
<iframe class="render-box" style="height:110px" sandbox srcdoc='<html><body style="font-family:Tahoma,sans-serif;padding:16px;color:#555;font-size:13px">
<div style="font-weight:bold">مطلوب: مصمم UI/UX</div>
<div style="margin-top:6px">يجيد استخدام أدوات التصميم ولديه حس إبداعي عالي.</div>
</body></html>'></iframe>
<h3>بعد / After — مهام يومية واضحة / Clear daily tasks</h3>
<iframe class="render-box" style="height:180px" sandbox srcdoc='<html><body style="font-family:Tahoma,sans-serif;padding:16px;color:#333;font-size:13px">
<div style="font-weight:bold;color:#111">مطلوب: UI Designer — المهام اليومية</div>
<ul style="margin-top:8px;padding-inline-start:18px;line-height:1.8">
<li>بناء شاشات عالية الدقة في Figma من Wireframe جاهز</li>
<li>مراجعة تفاصيل: مسافات، حالات الزرار (Hover/معطّل)</li>
<li>الحفاظ على اتساق مكتبة الألوان والخطوط (Design System)</li>
<li>مراجعة التصميم مع فريق المطورين قبل التسليم</li>
</ul>
</body></html>'></iframe>

<div class="bi-block">
    <div class="ar">🇪🇬 <b>إزاي تعمل اختبار الخمس ثواني فعليًا؟</b> خطوات بسيطة: (1) جهّز صورة أو رابط للشاشة اللي عايز تختبرها، (2) اطلب من شخص (صديق يكفي، مش لازم يكون خبير تصميم) ينظر لها لمدة 5 ثواني بالظبط — استخدم مؤقت فعلي عشان متطولش، (3) اقفل الصورة أو حوّل الشاشة فورًا، (4) اسأل 2-3 أسئلة فقط: "الصفحة دي بتاعة إيه؟"، "إيه أول حاجة لفتت نظرك؟"، "لو هتعمل حاجة واحدة هنا، هتعمل إيه؟"، (5) كرر مع 3-5 أشخاص مختلفين وسجّل الإجابات المتكررة — لو أغلبهم ماقدروش يجاوبوا السؤال الأول بوضوح، الرسالة الأساسية للتصميم مش واضحة كفاية.</div>
    <div class="en">🇬🇧 <b>How do you actually run a 5-second test?</b> Simple steps: (1) prepare an image or link of the screen you want to test, (2) ask someone (a friend is enough, they don't need to be a design expert) to look at it for exactly 5 seconds — use a real timer so you don't run long, (3) immediately close the image or switch the screen away, (4) ask only 2-3 questions: "what is this page about?", "what caught your attention first?", "if you could do one thing here, what would it be?", (5) repeat with 3-5 different people and record the recurring answers — if most of them can't clearly answer the first question, the design's core message isn't clear enough.</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="researcher">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">أي مسار وظيفي بيقضي جزء كبير من يومه في إجراء مقابلات ومراقبة اختبارات المستخدمين؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Which career path spends much of its day conducting interviews and observing user tests?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="researcher"> UX Researcher</label>
        <label><input type="radio" name="q1" value="ui"> UI Designer</label>
        <label><input type="radio" name="q1" value="writer"> UX Writer</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="timer">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">في اختبار الخمس ثواني، أول خطوة عملية بعد تجهيز الشاشة؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">In a 5-second test, what's the first practical step after preparing the screen?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="ask-many"> تسأل الشخص 10 أسئلة تفصيلية / Ask the person 10 detailed questions</label>
        <label><input type="radio" name="q2" value="timer"> تورّيه الشاشة لمدة 5 ثواني بالظبط بمؤقت فعلي / Show the screen for exactly 5 seconds with a real timer</label>
        <label><input type="radio" name="q2" value="explain"> تشرحله الشاشة الأول قبل ما يشوفها / Explain the screen to them before they see it</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="exercise-box">
    <h3>✍️ تمرين عملي / Hands-on Exercise</h3>
    <div class="ar">🇪🇬 اختار شاشة واحدة بسيطة من تطبيق بتستخدمه وفيها مشكلة استخدام واضحة (زي شاشة تسجيل دخول أو نموذج تواصل). اكتب فقرتين قصار: "المشكلة" و"الحل المقترح" باستخدام أي 3 مبادئ اتعلمتها في المسار ده (تباين، محاذاة، تسلسل هرمي، تناسق لوني، إلخ).</div>
    <div class="en">🇬🇧 Pick one simple screen from an app you use that has a clear usability problem (like a login screen or contact form). Write two short paragraphs: "the problem" and "the proposed solution" using any 3 principles you learned in this track (contrast, alignment, hierarchy, color harmony, etc).</div>
</div>

<div class="challenge-box">
    <h3>🛠️ نفّذ اختبار خمس ثواني حقيقي / Run a Real 5-second Test</h3>
    <div class="ar">🇪🇬 نفّذ اختبار الخمس ثواني بالخطوات المذكورة فوق على الصفحة الرئيسية لأي مشروع Redesign عملته في هذا المسار (أو أي موقع تختاره). اسأل 3 أشخاص مختلفين على الأقل، ودوّن إجاباتهم كاملة. بعد كده اكتب: هل النتائج كانت متشابهة ولا متضاربة؟ لو الرسالة مش واضحة، إيه أول تعديل بصري (مش نصي) هتعمله عشان تحسّنها — استخدم مبدأ من مبادئ التصميم أو الطباعة اللي اتعلمتها؟</div>
    <div class="en">🇬🇧 Run the 5-second test with the steps above on the homepage of any redesign project you made in this track (or any site you choose). Ask at least 3 different people, and record their full answers. Then write: were the results consistent or conflicting? If the message isn't clear, what's the first visual (not textual) change you'd make to improve it — using a design or typography principle you learned?</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 وصلت لنهاية المسار — دلوقتي عندك كل الأدوات المفاهيمية (UX/UI، المبادئ الأربعة، الألوان، الطباعة، المسافات، الـ Wireframing، قابلية الاستخدام) عشان تبني مشروع بورتفوليو حقيقي من الصفر: اختار مشكلة استخدام حقيقية، وثّقها، ارسم Wireframe لها، صمم حل بمبادئ واضحة، واختبره باختبار الخمس ثواني على ناس حقيقية قبل ما تعتبره خلاص. المشروع ده هو اللي هيوريك ويوري أي حد تاني إنك فعلًا فاهم المجال، مش بس حافظ تعريفاته.</div>
    <div class="en">🇬🇧 You've reached the end of the track — you now have every conceptual tool (UX/UI, the four principles, color, typography, spacing, wireframing, usability) to build a real portfolio project from scratch: pick a real usability problem, document it, sketch a wireframe for it, design a solution with clear principles, and test it with a 5-second test on real people before calling it done. This project is what will show you and anyone else that you genuinely understand the field, not just memorized its definitions.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>Figma = المعيار الصناعي لـ Wireframes وتصميم عالي الدقة والنماذج التفاعلية والتعاون الجماعي.</li>
        <li>المسارات: UX Researcher (مقابلات وملاحظات)، UI Designer (شاشات عالية الدقة وDesign System)، Product Designer (أولويات وموازنات)، UX Writer (نصوص الواجهة).</li>
        <li>اختبار الخمس ثواني عمليًا: مؤقت فعلي، سؤالين-تلاتة بس، تكراره مع عدة أشخاص، ومقارنة الإجابات.</li>
        <li>أفضل بداية بورتفوليو: إعادة تصميم شاشة موجودة مع توثيق "المشكلة" و"الحل" بوضوح.</li>
        <li>خلصت المسار! رجّع وطبّق كل المبادئ دي مع بعض في مشروع حقيقي.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="usability.php">← المرحلة السابقة</a>
    <a href="../index.php">لوحة الدروس / Dashboard</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
