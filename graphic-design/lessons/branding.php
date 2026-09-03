<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'branding';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'الهوية البصرية';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">المرحلة 6 / Stage 6</span>
<h1>الهوية البصرية <span class="ltr">Brand Identity</span></h1>
<p class="subtitle">دلوقتي هنجمّع كل حاجة اتعلمناها — عناصر التصميم، الألوان، والخطوط — في مثال واحد متكامل: بناء شعار ودليل هوية بصرية بسيط لعلامة تجارية وهمية.</p>

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
    <div class="ar">🇪🇬 تتعرف على أنواع الشعارات الأربعة وتفهم إمتى تستخدم كل نوع، وتفهم إزاي تدمج عناصر التصميم، الألوان، والخطوط في نظام واحد متسق (دليل الهوية البصرية)، بدل ما يبقى كل تصميم للبراند مختلف عن التاني.</div>
    <div class="en">🇬🇧 Learn the four logo types and when to use each one, and understand how to combine design elements, colors, and typography into one consistent system (a brand guideline), instead of every design for the brand looking different from the last.</div>
</div>

<h2 id="understand">أنواع الشعارات الأربعة / The Four Logo Types</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 قبل ما تصمم أي شعار، لازم تقرر نوعه — القرار ده بيبني على قد إيه اسم البراند معروف وسهل النطق. <b>شعار كلمة (Wordmark)</b>: اسم البراند نفسه بخط مميز، من غير أيقونة (زي Google أو Coca-Cola) — يناسب اسم قصير وسهل التذكر. <b>شعار حرفي (Lettermark)</b>: بس الحروف الأولى من الاسم (زي IBM أو HBO) — يناسب اسم طويل صعب يتكتب كل مرة كامل. <b>شعار رمزي/أيقوني (Pictorial Mark)</b>: أيقونة بس من غير نص (زي تفاحة Apple أو عصفور تويتر) — خطير جدًا لبراند جديد لأن محدش هيعرف يربط الأيقونة بالاسم أو المنتج غير لو البراند مشهور بالفعل. <b>شعار مركب (Combination Mark)</b>: أيقونة + اسم مع بعض (زي Adidas أو Burger King) — الأكتر أمانًا لبراند جديد، لأنه بيقدّم الأيقونة وفي نفس الوقت بيقول الاسم بوضوح.</div>
    <div class="en">🇬🇧 Before designing any logo, you must decide its type — this depends on how well-known and easy to say the brand name already is. <b>Wordmark</b>: the brand name itself in a distinctive typeface, no icon (like Google or Coca-Cola) — fits a short, memorable name. <b>Lettermark</b>: just the initials (like IBM or HBO) — fits a long name that's tedious to write out fully every time. <b>Pictorial mark</b>: an icon alone with no text (like Apple's apple or Twitter's bird) — quite risky for a new brand, since nobody can connect the icon to the name or product unless the brand is already famous. <b>Combination mark</b>: icon + name together (like Adidas or Burger King) — the safest choice for a new brand, since it introduces the icon while still clearly stating the name.</div>
</div>

<h3>مثال بصري: أربع أنواع لنفس براند "Root Coffee" / Visual Example: Four Types for the Same "Root Coffee" Brand</h3>
<iframe class="render-box" style="height:260px" sandbox srcdoc='<html><body style="font-family:sans-serif;padding:16px;background:#fbf8f3"><div style="display:flex;flex-wrap:wrap;gap:16px"><div style="flex:1;min-width:150px;text-align:center"><div style="font-family:Georgia,serif;font-weight:bold;font-size:20px;color:#2d4a34;padding:14px 0">Root Coffee</div><div style="font-size:11px;color:#666">Wordmark<br>اسم فقط بخط مميز</div></div><div style="flex:1;min-width:150px;text-align:center"><div style="width:64px;height:64px;border-radius:50%;background:#2d4a34;color:#f4ede2;display:flex;align-items:center;justify-content:center;font-weight:bold;font-size:22px;margin:0 auto">RC</div><div style="font-size:11px;color:#666;margin-top:6px">Lettermark<br>الحروف الأولى بس</div></div><div style="flex:1;min-width:150px;text-align:center"><div style="width:60px;height:60px;background:#2d4a34;border-radius:0 100% 0 100%;margin:0 auto"></div><div style="font-size:11px;color:#666;margin-top:6px">Pictorial Mark<br>أيقونة بس، من غير نص</div></div><div style="flex:1;min-width:150px;text-align:center"><div style="display:flex;align-items:center;justify-content:center;gap:8px"><div style="width:36px;height:36px;background:#2d4a34;border-radius:0 100% 0 100%"></div><div style="font-family:Georgia,serif;font-weight:bold;font-size:16px;color:#2d4a34">Root Coffee</div></div><div style="font-size:11px;color:#666;margin-top:6px">Combination Mark<br>أيقونة + اسم مع بعض</div></div></div></body></html>'></iframe>
<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ إن الأيقونة الرمزية (Pictorial Mark) في العمود التالت لوحدها معندهاش أي معنى واضح لحد شاف البراند لأول مرة — عكس الشعار المركب في آخر عمود اللي بيوضح الاسم والأيقونة مع بعض. عشان كده Root Coffee (براند جديد) هيختار على الأرجح Combination Mark، ويسيب الـ Pictorial Mark وحدها كأيقونة تطبيق أو خلفية بعد ما يبقى معروف بما فيه الكفاية.</div>
    <div class="en">🇬🇧 Notice the pictorial mark in the third column carries no clear meaning to someone seeing the brand for the first time — unlike the combination mark in the last column, which shows both the icon and the name together. That's why Root Coffee (a new brand) would most likely choose a combination mark, saving the pictorial mark alone for an app icon or background pattern once it's recognizable enough on its own.</div>
</div>

<h2>ليه محتاجين دليل هوية بصرية؟ / Why a Brand Guideline?</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 لو كل شخص هيصمم للبراند (أنت النهارده، مصمم تاني بعد سنة، فريق تسويق) اختار ألوان وخطوط مختلفة كل مرة، البراند هيفقد "شخصيته" وهيبقى غير قابل للتعرف عليه. دليل الهوية البصرية هو "كتاب القواعد" اللي بيضمن إن أي حد يصمم للبراند ده، في أي وقت، هيطلع بشكل متسق.</div>
    <div class="en">🇬🇧 If everyone who designs for the brand (you today, a different designer next year, the marketing team) picks different colors and fonts each time, the brand loses its "personality" and becomes unrecognizable. A brand guideline is the "rulebook" that ensures anyone designing for this brand, at any time, produces a consistent look.</div>
</div>

<h2 id="practice">💻 مثال متكامل: بناء هوية "Root Coffee" / Practice: Building the "Root Coffee" Identity</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 هنكمّل على نفس براند القهوة العضوية اللي استخدمناه في مرحلتي الألوان والخطوط، باستخدام Combination Mark اللي اخترناه فوق. رسالة البراند: طبيعي، دافئ، صديق للأرض. بنجمع كل القرارات اللي اتخدت قبل كده في دليل واحد.</div>
    <div class="en">🇬🇧 We'll continue with the same organic coffee brand used in the color and typography stages, using the combination mark we chose above. Brand message: natural, warm, earth-friendly. We now gather all the earlier decisions into one guideline.</div>
</div>

<iframe class="render-box" style="height:420px" sandbox srcdoc='<html><body style="font-family:sans-serif;padding:20px;background:#fbf8f3;color:#333"><div style="font-weight:bold;font-size:16px;margin-bottom:14px;color:#2d4a34">دليل هوية Root Coffee — Brand Guideline</div><div style="display:flex;gap:20px;flex-wrap:wrap"><div style="flex:1;min-width:150px"><div style="background:#2d4a34;color:#f4ede2;padding:18px;border-radius:10px;text-align:center;font-size:20px;font-weight:bold">Root Coffee</div><div style="font-size:11px;margin-top:6px;color:#666">الشعار الأساسي / Primary Logo</div></div><div style="flex:1;min-width:150px"><div style="background:#f4ede2;color:#2d4a34;padding:18px;border-radius:10px;text-align:center;font-size:20px;font-weight:bold;border:2px solid #2d4a34">Root Coffee</div><div style="font-size:11px;margin-top:6px;color:#666">النسخة الفاتحة / Light Version</div></div></div><div style="margin-top:18px;font-size:13px;font-weight:bold;color:#2d4a34">الألوان / Colors</div><div style="display:flex;gap:8px;margin-top:6px"><div style="width:50px;height:50px;background:#2d4a34;border-radius:6px"></div><div style="width:50px;height:50px;background:#8a5a3b;border-radius:6px"></div><div style="width:50px;height:50px;background:#f4ede2;border:1px solid #ccc;border-radius:6px"></div></div><div style="font-size:11px;margin-top:4px;color:#666">أساسي #2D4A34 — ثانوي #8A5A3B — محايد #F4EDE2</div><div style="margin-top:18px;font-size:13px;font-weight:bold;color:#2d4a34">الخطوط / Typography</div><div style="font-family:Georgia,serif;font-size:18px;margin-top:4px">Root Coffee — عنوان بخط Serif دافئ</div><div style="font-family:Arial,sans-serif;font-size:13px;color:#555">نص تفصيلي بخط Sans-serif بسيط وواضح للقراءة</div></body></html>'></iframe>

<h2>قواعد استخدام الشعار / Logo Usage Rules</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 جزء أساسي من أي دليل هوية هو تحديد "المسموح والممنوع" في استخدام الشعار، عشان محدش يشوّه البراند بدون قصد. مسموح: استخدام النسخة الغامقة على خلفية فاتحة والعكس، ترك مسافة فارغة كافية حول الشعار. ممنوع: تغيير ألوان الشعار عشوائيًا، تضييق أو تمديد الشعار بشكل غير متناسب، وضعه على خلفية بلون قريب جدًا منه بحيث يختفي التباين.</div>
    <div class="en">🇬🇧 A core part of any guideline is defining what's allowed and forbidden when using the logo, so nobody distorts the brand unintentionally. Allowed: using the dark version on a light background and vice versa, leaving enough clear space around the logo. Forbidden: randomly changing the logo's colors, stretching or squishing it disproportionately, placing it on a background color too close to it so contrast disappears.</div>
</div>

<div class="exercise-box">
    <h3>✍️ تمرين عملي / Hands-on Exercise</h3>
    <div class="ar">🇪🇬 ارجع للبراند الوهمي اللي بنيته في تمريني الألوان والخطوط (المرحلتين اللي فاتوا). اكتب دليل هوية مصغّر له يتضمن: (1) نوع الشعار المناسب له من الأربعة (Wordmark / Lettermark / Pictorial / Combination) ولية، (2) لون أساسي وثانوي ومحايد بأكواد Hex تقريبية، (3) خط للعناوين وخط للنصوص، (4) قاعدة واحدة "مسموح" وقاعدة واحدة "ممنوع" لاستخدام شعاره.</div>
    <div class="en">🇬🇧 Go back to the fictional brand you built in the color and typography exercises (the last two stages). Write a mini brand guideline for it including: (1) which of the four logo types fits it best and why, (2) a primary, secondary, and neutral color with approximate hex codes, (3) a heading font and a body font, (4) one "allowed" rule and one "forbidden" rule for using its logo.</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="pictorial">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">أي نوع شعار يعتمد على إن الجمهور يكون عارف البراند بالفعل، عشان أيقونة بدون نص تفضل واضحة المعنى؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Which logo type relies on the audience already knowing the brand, so a text-free icon still reads clearly?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="wordmark"> Wordmark</label>
        <label><input type="radio" name="q1" value="pictorial"> Pictorial Mark</label>
        <label><input type="radio" name="q1" value="combination"> Combination Mark</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="combination2">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">إيه أأمن نوع شعار لبراند جديد لسه محدش عارفه؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What's the safest logo type for a brand new to the market that nobody knows yet?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="pictorial2"> Pictorial Mark لوحدها</label>
        <label><input type="radio" name="q2" value="combination2"> Combination Mark — أيقونة واسم مع بعض</label>
        <label><input type="radio" name="q2" value="none"> مفيش فرق، أي نوع هيشتغل بنفس الكفاءة</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ برنامج تصميم موجز / Design Brief Recommendation</h3>
    <div class="ar">🇪🇬 عميلين جدد جوك: (1) اسمه "Nourhan Elgendy Financial Advisory Services" — اسم طويل جدًا صعب يتكتب كل مرة، (2) اسمه "Byte" — تطبيق تقني وعايز يوصل عالميًا زي Apple وNike بعد سنين. لكل عميل، اقترح نوع الشعار الأنسب من الأربعة، واكتب سطرين توضح ليه.</div>
    <div class="en">🇬🇧 Two new clients approach you: (1) named "Nourhan Elgendy Financial Advisory Services" — a very long name tedious to write out every time, (2) named "Byte" — a tech app that wants to go global like Apple and Nike after some years. For each client, recommend the most fitting logo type from the four, and write two lines explaining why.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 دليل الهوية اللي بنيته هنا هو "المنتج النهائي" لكل حاجة اتعلمتها في المسار — عناصر التصميم، الألوان، الخطوط، وأدوات التصميم. المرحلة الجاية والأخيرة (العمل كمصمم جرافيك) هتوريك إزاي تحوّل مهارة بناء هوية زي دي لمصدر دخل حقيقي، سواء عن طريق عمل حر أو وظيفة ثابتة.</div>
    <div class="en">🇬🇧 The guideline you built here is the "final product" of everything you learned in this track — design elements, colors, typography, and design tools. The next and final stage (Graphic Design Careers) shows you how to turn a skill like building this guideline into real income, whether through freelancing or full-time work.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>4 أنواع شعارات: Wordmark (اسم فقط)، Lettermark (حروف أولى)، Pictorial Mark (أيقونة فقط)، Combination Mark (أيقونة + اسم — الأأمن لبراند جديد).</li>
        <li>دليل الهوية البصرية = كتاب قواعد يضمن اتساق البراند مهما اختلف المصمم.</li>
        <li>يتضمن: نوع الشعار ونسخه، الألوان بأكواد دقيقة، الخطوط المعتمدة.</li>
        <li>قواعد استخدام الشعار (مسموح/ممنوع) تحمي البراند من التشويه.</li>
        <li>الهوية القوية = تجميع متسق لعناصر التصميم + الألوان + الخطوط، مش عناصر منفصلة.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="tools.php">← المرحلة السابقة</a>
    <a href="careers.php">المرحلة الجاية / Next: Graphic Design Careers →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
