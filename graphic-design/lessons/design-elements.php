<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'design-elements';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'عناصر التصميم';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">المرحلة 2 / Stage 2</span>
<h1>عناصر التصميم <span class="ltr">Elements of Design</span></h1>
<p class="subtitle">قبل ما تفكر في أي برنامج تصميم، لازم تعرف اللبنات الأساسية اللي أي تصميم — شعار، بوستر، أو حتى منشور سوشيال ميديا — متكوّن منها: الخط، الشكل، اللون، الملمس، الفراغ، والكتلة.</p>

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
    <div class="ar">🇪🇬 تتعرف على 6 عناصر بصرية أساسية، وتفهم إزاي كل عنصر فيهم لوحده بيقدر يغيّر "الإحساس" اللي التصميم بيوصّله، حتى من غير ما تغيّر المحتوى نفسه.</div>
    <div class="en">🇬🇧 Learn 6 fundamental visual elements, and understand how each one on its own can change the "feeling" a design communicates, even without changing the content itself.</div>
</div>

<h2 id="understand">1) الخط / Line</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 الخط مش بس "أداة رسم" — اتجاهه وسمكه بيوصّلوا إحساس. خطوط أفقية بتوحي بالهدوء والاستقرار، خطوط مايلة (Diagonal) بتوحي بالحركة والطاقة، وخطوط رفيعة أنيقة مقابل خطوط سميكة قوية بتغيّر شخصية التصميم كله.</div>
    <div class="en">🇬🇧 A line isn't just a "drawing tool" — its direction and weight communicate feeling. Horizontal lines suggest calm and stability, diagonal lines suggest movement and energy, and thin elegant lines vs. thick bold ones change the whole personality of a design.</div>
</div>

<h2>2) الشكل / Shape</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 الأشكال الحادة والزاوية (مثلثات، مربعات بزوايا حادة) بتوحي بالحداثة، القوة، أو حتى العدوانية — تلاقيها كتير في شعارات التكنولوجيا والرياضة. الأشكال الدائرية والناعمة بتوحي بالود، الأمان، والمرح — تلاقيها كتير في شعارات الأطفال والصحة.</div>
    <div class="en">🇬🇧 Sharp, angular shapes (triangles, hard-edged squares) suggest modernity, strength, or even aggression — common in tech and sports logos. Round, soft shapes suggest friendliness, safety, and playfulness — common in children's and health-related logos.</div>
</div>

<h3>مثال بصري: نفس الاسم، شكلين مختلفين / Visual Example: Same Name, Two Shape Languages</h3>
<iframe class="render-box" style="height:150px" sandbox srcdoc='<html><body style="font-family:sans-serif;padding:16px;display:flex;gap:24px;align-items:center"><div style="text-align:center"><div style="width:90px;height:90px;background:#1d3557;clip-path:polygon(50% 0,100% 100%,0 100%);margin:0 auto;display:flex;align-items:flex-end;justify-content:center;padding-bottom:12px"><span style="color:white;font-weight:bold;font-size:22px">A</span></div><div style="margin-top:6px;color:#333;font-size:13px">حاد = قوة وحداثة</div></div><div style="text-align:center"><div style="width:90px;height:90px;background:#e29578;border-radius:50%;margin:0 auto;display:flex;align-items:center;justify-content:center"><span style="color:white;font-weight:bold;font-size:22px">A</span></div><div style="margin-top:6px;color:#333;font-size:13px">دائري = ود وأمان</div></div></body></html>'></iframe>

<h2>3) اللون / Color</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 اللون هو أقوى عنصر بصري في التأثير على المشاعر بسرعة — هنتكلم عنه بالتفصيل في المرحلة الجاية، بس المهم دلوقتي إنك تعرف إن اللون مش اختيار شخصي ("أنا بحب الأزرق") لازم يكون قرار مبني على الرسالة اللي عايز توصّلها.</div>
    <div class="en">🇬🇧 Color is the strongest visual element for quickly influencing emotion — we'll cover it in detail next stage, but for now, know that color isn't a personal choice ("I like blue") — it should be a decision based on the message you want to communicate.</div>
</div>

<h2>4) الملمس / Texture</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 الملمس هو الإحساس البصري بسطح المادة — ورق خشن، معدن لامع، قماش ناعم — حتى لو التصميم رقمي بالكامل ومفيهوش لمس فعلي. تصميم بملمس خشن أو "متآكل" (Grunge) بيوحي بالأصالة والقِدَم، وتصميم بسطح ناعم ولامع (Gradient ناعم، ظلال خفيفة) بيوحي بالفخامة والحداثة.</div>
    <div class="en">🇬🇧 Texture is the visual sense of a surface — rough paper, shiny metal, soft fabric — even in a fully digital design with no actual touch involved. A rough or "grunge" texture suggests authenticity and age, while a smooth, glossy surface (soft gradients, subtle shadows) suggests luxury and modernity.</div>
</div>

<h2>5) الفراغ / Space</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 الفراغ (وخصوصًا "الفراغ السلبي" Negative Space) هو المساحة الفاضية حوالين وبين العناصر — وهو مش "مساحة ضايعة"، هو عنصر تصميم فعلي بيستخدم عشان يوجّه العين ويدي العناصر المهمة "مساحة تتنفس فيها". تصميم مزحوم بعناصر من غير فراغ كافي بيحس المشاهد إنه "خانق" ومرهق للعين، حتى لو كل عنصر لوحده شكله حلو. أشهر مثال عالمي على استخدام الفراغ السلبي بذكاء هو شعار FedEx اللي فيه سهم مخفي بين حرفي E وx.</div>
    <div class="en">🇬🇧 Space (especially "negative space") is the empty area around and between elements — and it isn't "wasted space," it's an actual design element used to guide the eye and give important elements room to breathe. A design crammed with elements and no breathing room feels suffocating and tiring to look at, even if each element looks fine on its own. The most famous global example of clever negative space use is the FedEx logo, which hides an arrow between the letters E and x.</div>
</div>

<h3>مثال بصري: نفس المحتوى، بفراغ وبدونه / Visual Example: Same Content, With and Without Space</h3>
<iframe class="render-box" style="height:180px" sandbox srcdoc='<html><body style="font-family:sans-serif;padding:10px;display:flex;gap:16px"><div style="flex:1;background:#eee;padding:2px"><div style="background:#333;color:white;padding:2px;font-size:11px">Root Coffee</div><div style="font-size:10px;padding:1px">قهوة عضوية 100% من مزارع محلية مستدامة</div><div style="font-size:10px;padding:1px;background:#8a5a3b;color:white">اطلب الآن</div><div style="font-size:9px;padding:1px">شحن مجاني فوق 200ج</div></div><div style="flex:1;background:#fff;padding:16px;border:1px solid #ddd"><div style="font-weight:bold;color:#2d4a34;margin-bottom:10px">Root Coffee</div><div style="font-size:12px;color:#555;margin-bottom:14px">قهوة عضوية 100% من مزارع محلية مستدامة</div><div style="background:#8a5a3b;color:white;display:inline-block;padding:6px 16px;border-radius:6px;font-size:12px">اطلب الآن</div></div></body></html>'></iframe>
<div class="bi-block">
    <div class="ar">🇪🇬 الجانب الأيسر مزحوم بعناصر ملتصقة ببعض من غير فراغ — العين مش عارفة تركز فين. الجانب الأيمن نفس المحتوى بالظبط، بس بفراغ كافي حوالين كل عنصر، فبيحس المشاهد بالراحة والوضوح فورًا.</div>
    <div class="en">🇬🇧 The left side is crammed with elements touching each other with no breathing room — the eye doesn't know where to focus. The right side has the exact same content, but with enough space around each element, so the viewer feels comfort and clarity instantly.</div>
</div>

<h2>6) الكتلة (الشكل ثلاثي الأبعاد) / Form</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 لازم متلخبطش بين "الشكل" (Shape) و"الكتلة" (Form): الشكل ثنائي الأبعاد — دايرة، مربع، مثلث مسطح على الورقة. الكتلة هي إحساس العمق والحجم الثلاثي الأبعاد اللي بيتحقق غالبًا بالظل والإضاءة (Gradient أو Shadow)، حتى لو التصميم في الأساس مسطح على شاشة ثنائية الأبعاد. استخدام الكتلة بيدي إحساس بالواقعية والملمس المادي، بينما الشكل المسطح بيدي إحساس بسيط وحديث (Flat Design).</div>
    <div class="en">🇬🇧 Don't confuse "shape" with "form": a shape is two-dimensional — a circle, square, or triangle flat on the page. Form is the sense of depth and three-dimensional volume, usually achieved with shading and light (gradients or shadows), even though the design itself sits flat on a 2D screen. Using form gives a sense of realism and physical texture, while a flat shape gives a simple, modern feel (flat design).</div>
</div>

<h2 id="practice">💻 مثال بصري: شكل مسطح مقابل كتلة / Practice: Flat Shape vs. Form</h2>
<iframe class="render-box" style="height:150px" sandbox srcdoc='<html><body style="font-family:sans-serif;padding:16px;display:flex;gap:24px;align-items:center"><div style="text-align:center"><div style="width:80px;height:80px;background:#2d4a34;border-radius:50%;margin:0 auto"></div><div style="margin-top:6px;color:#333;font-size:13px">شكل مسطح (Shape)<br>Flat 2D shape</div></div><div style="text-align:center"><div style="width:80px;height:80px;border-radius:50%;margin:0 auto;background:radial-gradient(circle at 32% 28%, #6b9c78, #2d4a34 60%, #16281b 100%);box-shadow:6px 10px 14px rgba(0,0,0,0.35)"></div><div style="margin-top:6px;color:#333;font-size:13px">كتلة (Form)<br>3D-feeling form</div></div></body></html>'></iframe>
<div class="bi-block">
    <div class="ar">🇪🇬 نفس الدايرة بالظبط، بس التدرج اللوني والظل في الكرة اليمين بيخلوا العين تحس بحجم وعمق حقيقيين — ده الفرق العملي بين "شكل" و"كتلة" في أي تصميم لوجو أو أيقونة.</div>
    <div class="en">🇬🇧 The exact same circle, but the gradient and shadow on the right sphere make the eye perceive real volume and depth — that's the practical difference between "shape" and "form" in any logo or icon design.</div>
</div>

<div class="exercise-box">
    <h3>✍️ تمرين عملي / Hands-on Exercise</h3>
    <div class="ar">🇪🇬 اختار اسم علامة تجارية وهمية (مثلًا "نوفا" لمنتجات تقنية). ارسم بالورقة والقلم (أو حتى وصف كتابي) شكلين مختلفين للشعار: واحد باستخدام خطوط وأشكال حادة، وواحد باستخدام خطوط وأشكال دائرية ناعمة. اكتب: أي واحد يناسب "نوفا" كعلامة تقنية أكتر، وليه؟</div>
    <div class="en">🇬🇧 Pick a fictional brand name (e.g. "Nova" for tech products). Sketch on paper (or even just describe in writing) two different logo directions: one using sharp lines and angular shapes, one using soft rounded lines and shapes. Write down which one fits "Nova" as a tech brand better, and why?</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="breathe">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">إيه وظيفة "الفراغ السلبي" (Negative Space) في التصميم؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What's the function of negative space in a design?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="waste"> مساحة ضايعة يفضل ملؤها بعناصر زيادة</label>
        <label><input type="radio" name="q1" value="breathe"> يوجّه العين ويدي العناصر المهمة مساحة تتنفس فيها</label>
        <label><input type="radio" name="q1" value="color"> بديل عن اختيار الألوان</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="depth">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">إيه الفرق بين "الشكل" (Shape) و"الكتلة" (Form)؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What's the difference between shape and form?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="same"> مفيش فرق، نفس المعنى بالظبط</label>
        <label><input type="radio" name="q2" value="depth"> الشكل مسطح ثنائي الأبعاد، والكتلة تضيف إحساس عمق وحجم ثلاثي الأبعاد</label>
        <label><input type="radio" name="q2" value="color2"> الكتلة بس بتستخدم الألوان الغامقة</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ صمّم بطاقة منتج بفراغ صح / Design a Product Card With Proper Space</h3>
    <div class="ar">🇪🇬 خد أي منتج وهمي (اسم + سعر + وصف قصير + زرار "اطلب الآن") واكتب وصف تخطيطي (Layout) بالكلام لبطاقة منتج تستخدم فراغ كافي حوالين كل عنصر (زي المثال اللي فوق). بعد كده، أضف تفصيلة واحدة تستخدم "الكتلة" (ظل أو تدرج) على الزرار عشان يحس المستخدم إنه قابل للضغط.</div>
    <div class="en">🇬🇧 Take any fictional product (name + price + short description + "Order Now" button) and write a layout description for a product card that uses proper breathing space around each element (like the example above). Then add one detail using "form" (a shadow or gradient) on the button so the user feels it's clickable.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 كل العناصر الستة اللي اتعلمتها هنا — الخط، الشكل، اللون، الملمس، الفراغ، والكتلة — هي بالظبط اللي هتشوفها مجمّعة في مثال "Root Coffee" اللي هنبنيه خطوة بخطوة في المراحل الجاية، ووصولًا لمرحلة الهوية البصرية (Branding) اللي هتجمّع كل حاجة في دليل واحد متكامل.</div>
    <div class="en">🇬🇧 All six elements you learned here — line, shape, color, texture, space, and form — are exactly what you'll see assembled in the "Root Coffee" example we'll build step by step over the coming stages, culminating in the Brand Identity stage that ties everything into one complete guideline.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>الخط: اتجاهه وسمكه يوصّلوا حركة أو هدوء.</li>
        <li>الشكل: حاد = قوة وحداثة، دائري = ود وأمان.</li>
        <li>اللون: أقوى عنصر تأثيرًا على المشاعر (تفصيل في المرحلة الجاية).</li>
        <li>الملمس: خشن = أصالة، ناعم/لامع = فخامة وحداثة.</li>
        <li>الفراغ: مش مساحة ضايعة — يوجّه العين ويدي العناصر مساحة تتنفس فيها.</li>
        <li>الكتلة: تضيف إحساس عمق وحجم (بالظل/التدرج) فوق الشكل المسطح العادي.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="intro.php">← المرحلة السابقة</a>
    <a href="color-theory.php">المرحلة الجاية / Next: Color Theory for Designers →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
