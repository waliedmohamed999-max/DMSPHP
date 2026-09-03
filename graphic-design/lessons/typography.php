<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'typography';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'الطباعة';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">المرحلة 4 / Stage 4</span>
<h1>الطباعة <span class="ltr">Typography</span></h1>
<p class="subtitle">الخط اللي تختاره لعلامتك التجارية بيتكلم عنك قبل ما حد يقرا كلمة واحدة فيه. هنا هنركز على شخصية الخط وتصنيفاته في سياق الهوية البصرية (شعار، تغليف، مطبوعات) مش تنسيق نصوص شاشة.</p>

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
    <div class="ar">🇪🇬 تفهم إن لكل نوع خط "شخصية" بتوحي بإحساس معين، تتعرف على تصنيفات الخط الأربعة الأساسية (Serif, Sans-serif, Script, Display) بشكل رسمي بدل ما تحكم بالعين بس، وتتعلم القاعدة الأساسية للدمج بين الخطوط في مشروع واحد من غير ما يبقى فوضى بصرية.</div>
    <div class="en">🇬🇧 Understand that every typeface has a "personality" that suggests a certain feeling, learn the four formal type classifications (Serif, Sans-serif, Script, Display) instead of judging fonts by eye alone, and learn the basic rule for pairing fonts in one project without creating visual chaos.</div>
</div>

<h2 id="understand">شخصية الخط / Font Personality</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 الخط مش مجرد وسيلة لعرض الكلام — شكله بيحمل رسالة زي الألوان بالظبط. <b>Sans-serif هندسي وعريض</b> (زي خطوط بدون زوائد بتفاصيل حادة) بيوحي بالحداثة والتكنولوجيا. <b>Serif</b> (الخط اللي له زوائد صغيرة في أطراف الحروف) بيوحي بالتقليدية، الثقة، والرسمية — تلاقيه كتير في شعارات الجرايد والبنوك القديمة. <b>خط الكتابة اليدوية (Script)</b> بيوحي بالأناقة، الشخصية، واللمسة الإنسانية — شائع في العلامات الفاخرة أو منتجات التجميل.</div>
    <div class="en">🇬🇧 A typeface isn't just a way to display words — its shape carries a message just like color does. A <b>bold geometric sans-serif</b> suggests modernity and technology. A <b>serif</b> font (with small strokes at the ends of letters) suggests tradition, trust, and formality — common in old newspaper and bank logos. A <b>script (handwriting-style) font</b> suggests elegance, personality, and a human touch — common in luxury or beauty brands.</div>
</div>

<h3>مثال بصري: نفس اسم البراند بـ3 شخصيات خط / Visual Example: Same Brand Name, 3 Font Personalities</h3>
<iframe class="render-box" style="height:200px" sandbox srcdoc='<html><body style="font-family:sans-serif;padding:16px"><div style="margin-bottom:16px"><div style="font-family:Arial,Helvetica,sans-serif;font-weight:900;font-size:28px;color:#1d3557">LUMEN TECH</div><div style="font-size:12px;color:#666">Sans-serif عريض = حداثة وتكنولوجيا</div></div><div style="margin-bottom:16px"><div style="font-family:Georgia,Times New Roman,serif;font-size:28px;color:#3a2e2e">Lumen &amp; Co.</div><div style="font-size:12px;color:#666">Serif = ثقة وتقليدية</div></div><div><div style="font-family:Brush Script MT,cursive;font-size:32px;color:#8a3b5c">Lumen</div><div style="font-size:12px;color:#666">Script = أناقة ولمسة شخصية</div></div></body></html>'></iframe>

<h2>تصنيفات الخط الأربعة / The Four Type Classifications</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 "الشخصية" اللي اتكلمنا عنها فوق إحساس عام، لكن المصممين المحترفين بيتكلموا بلغة تصنيف رسمية أدق من كده — 4 تصنيفات أساسية لازم تعرفها بالاسم: <b>Serif</b> (له زوائد صغيرة على أطراف الحروف)، <b>Sans-serif</b> (بدون أي زوائد، حروف نظيفة)، <b>Script</b> (بيحاكي خط اليد المتصل أو شبه المتصل)، و<b>Display</b> (خطوط زخرفية جريئة جدًا مصممة عشان تلفت النظر في عنوان كبير أو شعار، مش عشان تتقرأ في فقرة كاملة — لو استخدمتها في نص طويل هتتعب عين القارئ وتقل قابلية القراءة بشكل كبير).</div>
    <div class="en">🇬🇧 The "personality" discussed above is a general feeling, but professional designers speak a more precise, formal classification language — 4 core classifications you should know by name: <b>Serif</b> (small strokes at the ends of letters), <b>Sans-serif</b> (no strokes, clean letterforms), <b>Script</b> (mimics connected or semi-connected handwriting), and <b>Display</b> (very bold decorative fonts designed to grab attention in one big headline or logo — not to be read in a full paragraph; using one in long text tires the reader's eye and drastically hurts readability).</div>
</div>

<h2 id="practice">💻 مثال بصري: التصنيفات الأربعة جنب بعض / Practice: All Four Classifications Side by Side</h2>
<iframe class="render-box" style="height:260px" sandbox srcdoc='<html><body style="font-family:sans-serif;padding:16px"><div style="display:flex;flex-wrap:wrap;gap:18px"><div style="flex:1;min-width:150px"><div style="font-family:Georgia,Times New Roman,serif;font-size:24px;color:#333">Root Coffee</div><div style="font-size:11px;color:#666;margin-top:4px">Serif — تقليدي وموثوق</div></div><div style="flex:1;min-width:150px"><div style="font-family:Arial,Helvetica,sans-serif;font-size:24px;color:#333">Root Coffee</div><div style="font-size:11px;color:#666;margin-top:4px">Sans-serif — نظيف وحديث</div></div><div style="flex:1;min-width:150px"><div style="font-family:Brush Script MT,cursive;font-size:26px;color:#333">Root Coffee</div><div style="font-size:11px;color:#666;margin-top:4px">Script — إنساني وأنيق</div></div><div style="flex:1;min-width:150px"><div style="font-family:Impact,Haettenschweiler,sans-serif;font-size:26px;color:#333;letter-spacing:1px">ROOT</div><div style="font-size:11px;color:#666;margin-top:4px">Display — للفت النظر في عنوان/شعار بس، مش لفقرة كاملة</div></div></div></body></html>'></iframe>
<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ إن خط الـ Display هنا اتكتب بيه كلمة "ROOT" بس مش الجملة كلها — ده بالظبط استخدامه الصح: عنوان قصير جدًا أو شعار، أبدًا مش وصف منتج أو نص طويل.</div>
    <div class="en">🇬🇧 Notice the Display font here is only used for the short word "ROOT," not the full name — that's exactly its correct use: a very short headline or logo mark, never a product description or long text.</div>
</div>

<h2>مطابقة الخط لرسالة البراند / Matching Font to Brand Message</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 لو براند "Root Coffee" اللي اتكلمنا عنه في المرحلة اللي فاتت هدفه إنه يبان عضوي وطبيعي ودافئ، خط Sans-serif هندسي حاد جدًا هيدي إحساس بارد وصناعي يتعارض مع الرسالة، بينما خط Serif دافئ أو حتى خط بخط يد بسيط هيدعم إحساس "الحرفية والطبيعية" أكتر. القاعدة: اختار الخط زي ما تختار اللون — بناءً على الرسالة، مش بس لأنه "شكله حلو".</div>
    <div class="en">🇬🇧 If "Root Coffee" from the last stage wants to feel organic, natural, and warm, an overly sharp geometric sans-serif would feel cold and industrial, clashing with the message — while a warm serif or a simple handwriting-style font supports a sense of "craft and nature" better. Rule: choose a font the way you choose a color — based on the message, not just because "it looks nice."</div>
</div>

<h2>قاعدة الدمج: خط أو اتنين بس / The Pairing Rule: One or Two Typefaces, Max</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 أشهر غلطة عند المبتدئين هي استخدام 4 أو 5 خطوط مختلفة في نفس التصميم — ده بيخلي العين تتوه ومحدش يعرف يركز على إيه. القاعدة الذهبية: خط واحد للعناوين وخط واحد للنصوص التفصيلية (ماكسيموم اتنين لمعظم المشاريع)، والفرق بينهم يتحقق بالحجم والسمك (Bold/Regular) مش بجلب خط ثالث تمامًا. ولو قررت تستخدم خط Display في شعارك، خليه الوحيد الجريء في التصميم كله — ادمجه مع Sans-serif بسيط جدًا للنصوص، وأبدًا متجمعش خطين Display أو زخرفيين مع بعض.</div>
    <div class="en">🇬🇧 The most common beginner mistake is using 4-5 different fonts in the same design — this makes the eye lose focus and confuses the viewer. Golden rule: one typeface for headings and one for body text (max two for most projects), and create contrast between them through size and weight (bold/regular), not by adding a third completely different typeface. And if you decide to use a Display font in your logo, make it the only bold statement in the whole design — pair it with a very plain sans-serif for body text, and never combine two Display or decorative fonts together.</div>
</div>

<div class="exercise-box">
    <h3>✍️ تمرين عملي / Hands-on Exercise</h3>
    <div class="ar">🇪🇬 ارجع لنفس البراند الوهمي اللي اخترته في تمرين المرحلة اللي فاتت (نظرية الألوان). حدد: هل رسالته أقرب لـ Sans-serif عريض، Serif كلاسيكي، Script أنيق، ولا محتاج لمسة Display في الشعار بس؟ ولية؟ ثم اقترح خط تاني (Sans أو Serif بسيط) ممكن يتجمع مع اختيارك الأول للعناوين والنصوص.</div>
    <div class="en">🇬🇧 Go back to the same fictional brand you picked in the last stage's exercise (color theory). Determine: is its message closer to a bold sans-serif, a classic serif, an elegant script, or does it need a Display touch just in the logo? Why? Then suggest a second (simple sans or serif) font that could pair with your first choice for headings and body text.</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="display">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">إيه التصنيف اللي المفروض يتستخدم في عنوان قصير أو شعار بس، وميتستخدمش أبدًا في فقرة نص طويلة؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Which classification should only be used in a short headline or logo, never a long paragraph?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="sans"> Sans-serif</label>
        <label><input type="radio" name="q1" value="display"> Display</label>
        <label><input type="radio" name="q1" value="serif"> Serif</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="strokes">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">إيه اللي يميّز تصنيف Serif عن Sans-serif شكليًا؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What visually distinguishes Serif from Sans-serif?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="strokes"> الـ Serif له زوائد صغيرة على أطراف الحروف، الـ Sans-serif بدونها</label>
        <label><input type="radio" name="q2" value="color3"> الـ Serif دايمًا ملوّن والـ Sans-serif دايمًا أسود</label>
        <label><input type="radio" name="q2" value="size"> الـ Serif دايمًا أكبر حجمًا</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ صنّف واختار / Classify and Choose</h3>
    <div class="ar">🇪🇬 دوّر على 4 شعارات حقيقية تعرفها (مثلًا: شركة تقنية، بنك، ماركة عطور، وفريق رياضي أو فرقة موسيقية) وحدد تصنيف خط كل شعار منهم (Serif / Sans-serif / Script / Display). بعد كده اختار واحد بس فيهم واقترح خط "تاني" (من تصنيف مختلف) ممكن يتجمع معاه للنصوص التفصيلية، واشرح ليه الاختيار ده منطقي.</div>
    <div class="en">🇬🇧 Find 4 real logos you know (e.g. a tech company, a bank, a perfume brand, and a sports team or band) and identify each logo's font classification (Serif / Sans-serif / Script / Display). Then pick just one of them and suggest a "second" font (from a different classification) that could pair with it for body text, explaining why that choice makes sense.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 الخط اللي هتختاره هنا لبراندك الوهمي (أو لـ Root Coffee) هيترحل معانا مباشرة لمرحلة "أدوات التصميم" (هتحدد إيه الأداة والصيغة الصح لإخراج ملف الخط والشعار)، وبعدها لمرحلة الهوية البصرية اللي هتوثّق خط العناوين وخط النصوص جنب الألوان في دليل واحد نهائي.</div>
    <div class="en">🇬🇧 The font you choose here for your fictional brand (or Root Coffee) carries forward directly into the "Design Tools" stage (deciding the right tool and file format to export your logo and font), and then into the Brand Identity stage that documents your heading and body fonts alongside your colors in one final guideline.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>Sans-serif هندسي عريض = حداثة وتكنولوجيا.</li>
        <li>Serif = تقليدية، ثقة، رسمية.</li>
        <li>Script = أناقة ولمسة شخصية.</li>
        <li>Display = جريء وزخرفي — لعنوان قصير أو شعار بس، أبدًا لنص طويل.</li>
        <li>القاعدة الذهبية: خط أو اتنين بالكتير — الفرق بالحجم والسمك مش بعدد الخطوط.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="color-theory.php">← المرحلة السابقة</a>
    <a href="tools.php">المرحلة الجاية / Next: Design Tools →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
