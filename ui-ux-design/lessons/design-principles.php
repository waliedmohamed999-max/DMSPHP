<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'design-principles';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'مبادئ التصميم الأساسية';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">المرحلة 2 / Stage 2</span>
<h1>مبادئ التصميم الأساسية <span class="ltr">Core Design Principles</span></h1>
<p class="subtitle">4 مبادئ بسيطة، لو طبّقتهم صح، هتحوّل أي تصميم من "مبعثر" لـ "واضح ومريح للعين" — من غير ما تحتاج أي أداة تصميم متقدمة أصلًا.</p>

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
    <div class="ar">🇪🇬 تتعرف على 4 مبادئ أساسية (التباين، المحاذاة، التكرار، التقارب) وتشوف بعينك الفرق بين تصميم قبل وبعد تطبيقهم، وتشوف كمان إزاي الأربعة بيشتغلوا مع بعض في نفس التصميم في نفس الوقت.</div>
    <div class="en">🇬🇧 Learn 4 core principles (Contrast, Alignment, Repetition, Proximity) and see with your own eyes the difference between a design before and after applying them, and also see how all four work together in the same design at once.</div>
</div>

<h2 id="understand">1) التباين / Contrast</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 التباين بيخلي العين تعرف "إيه الأهم هنا؟" فورًا — لون، حجم، أو سمك خط مختلف للعنصر المهم. من غير تباين، كل حاجة بتتساوى في الأهمية وده بيتعب العين.</div>
    <div class="en">🇬🇧 Contrast tells the eye "what matters most here?" instantly — a different color, size, or weight for the important element. Without contrast, everything looks equally important, which tires the eye.</div>
</div>

<h3>قبل / Before</h3>
<iframe class="render-box" style="height:110px" sandbox srcdoc='<html><body style="font-family:sans-serif;padding:16px"><div style="color:#888;font-size:14px">عرض خاص: خصم 50% على كل المنتجات اليوم فقط</div><div style="color:#888;font-size:14px;margin-top:8px">اطلب الآن</div></body></html>'></iframe>
<h3>بعد / After</h3>
<iframe class="render-box" style="height:130px" sandbox srcdoc='<html><body style="font-family:sans-serif;padding:16px"><div style="color:#333;font-size:14px">عرض خاص: خصم 50% على كل المنتجات اليوم فقط</div><button style="margin-top:10px;background:#e63946;color:white;border:none;padding:10px 24px;border-radius:6px;font-size:16px;font-weight:bold">اطلب الآن</button></body></html>'></iframe>

<h2>2) المحاذاة / Alignment</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 العناصر اللي مش محاذية على خط واحد (Grid) بتدي إحساس عدم دقة حتى لو محتواها كويس. المحاذاة بتخلي التصميم يحس إنه "مصمّم بعناية".</div>
    <div class="en">🇬🇧 Elements not aligned to a common line (grid) feel imprecise, even with good content. Alignment makes a design feel "carefully crafted."</div>
</div>

<h3>قبل / Before</h3>
<iframe class="render-box" style="height:130px" sandbox srcdoc='<html><body style="font-family:sans-serif;padding:16px"><div style="margin-right:10px">الاسم: وليد</div><div style="margin-right:60px;margin-top:8px">الإيميل: waleed@test.com</div><div style="margin-right:25px;margin-top:8px">الهاتف: 0100000000</div></body></html>'></iframe>
<h3>بعد / After</h3>
<iframe class="render-box" style="height:130px" sandbox srcdoc='<html><body style="font-family:sans-serif;padding:16px"><div style="display:grid;grid-template-columns:80px 1fr;row-gap:8px"><span>الاسم:</span><span>وليد</span><span>الإيميل:</span><span>waleed@test.com</span><span>الهاتف:</span><span>0100000000</span></div></body></html>'></iframe>

<h2>3) التكرار / Repetition</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 تكرار نفس الأنماط (نفس شكل العناوين، نفس مسافات الكروت) بيخلي المستخدم يتعلم "شكل" الموقع بسرعة، فيقدر يتنقل فيه بثقة من غير ما يفكر.</div>
    <div class="en">🇬🇧 Repeating the same patterns (same heading style, same card spacing) lets the user quickly learn the site's "shape," so they can navigate it confidently without thinking.</div>
</div>

<h3>قبل / Before</h3>
<iframe class="render-box" style="height:150px" sandbox srcdoc='<html><body style="font-family:sans-serif;padding:16px;display:flex;gap:10px"><div style="border:2px solid #333;padding:12px;border-radius:0"><b>Card 1</b></div><div style="border:1px dashed #999;padding:18px;border-radius:12px;background:#f0f0f0"><b>Card 2</b></div><div style="border:3px solid #555;padding:8px;border-radius:20px"><b>Card 3</b></div></body></html>'></iframe>
<h3>بعد / After</h3>
<iframe class="render-box" style="height:150px" sandbox srcdoc='<html><body style="font-family:sans-serif;padding:16px;display:flex;gap:10px"><div style="border:1px solid #ddd;padding:14px;border-radius:8px"><b>Card 1</b></div><div style="border:1px solid #ddd;padding:14px;border-radius:8px"><b>Card 2</b></div><div style="border:1px solid #ddd;padding:14px;border-radius:8px"><b>Card 3</b></div></body></html>'></iframe>

<h2>4) التقارب / Proximity</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 العناصر المرتبطة منطقيًا (زي عنوان المنتج وسعره) لازم تكون قريبة من بعض بصريًا — المسافة نفسها بتوصل معلومة "دول مع بعض" من غير ما تحتاج تكتبها.</div>
    <div class="en">🇬🇧 Logically related elements (like a product's title and price) should be visually close together — the spacing itself communicates "these belong together" without needing to say so.</div>
</div>

<h3>قبل / Before</h3>
<iframe class="render-box" style="height:140px" sandbox srcdoc='<html><body style="font-family:sans-serif;padding:16px"><div>لوحة مفاتيح ميكانيكية</div><div style="margin-top:40px">$45.99</div><div style="margin-top:5px">متوفر في المخزون</div></body></html>'></iframe>
<h3>بعد / After</h3>
<iframe class="render-box" style="height:140px" sandbox srcdoc='<html><body style="font-family:sans-serif;padding:16px"><div style="font-weight:bold">لوحة مفاتيح ميكانيكية</div><div style="margin-top:2px;color:#e63946;font-size:18px">$45.99</div><div style="margin-top:16px;color:#2a9d8f">متوفر في المخزون</div></body></html>'></iframe>

<h2 id="practice">💻 الأربعة مع بعض / All Four Principles Together</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 في الواقع، المبادئ الأربعة بتشتغل مع بعض في نفس اللحظة، مش كل واحد لوحده. شوف المثال ده: نفس كارت المنتج، مرة وهو بياخد المبادئ الأربعة كلها غلط في نفس الوقت، ومرة وهي مطبّقة صح كلها مع بعض.</div>
    <div class="en">🇬🇧 In reality, all four principles work together at the same moment, not one at a time. See this example: the same product card, once getting all four principles wrong at the same time, and once with all four applied correctly together.</div>
</div>

<h3>قبل / Before — الأربعة مبادئ غلط في نفس الوقت / All four wrong at once</h3>
<iframe class="render-box" style="height:220px" sandbox srcdoc='<html><body style="font-family:sans-serif;padding:16px;background:#fafafa">
<div style="border:1px solid #ccc;padding:10px">
<div style="color:#999;font-size:14px">سماعة رأس لاسلكية</div>
<div style="color:#999;font-size:14px;margin-top:30px;margin-right:20px">$89.99</div>
<div style="color:#999;font-size:13px;margin-top:2px">متوفرة الآن</div>
<button style="margin-top:6px;background:#eee;color:#999;border:1px solid #ccc;padding:8px 14px;border-radius:0">أضف للسلة</button>
</div>
<div style="border:2px dashed #aaa;padding:16px;margin-top:14px;border-radius:16px">
<div style="color:#999;font-size:14px">سماعة رأس سلكية</div>
<div style="color:#999;font-size:14px;margin-top:30px;margin-right:5px">$39.99</div>
<div style="color:#999;font-size:13px;margin-top:2px">متوفرة الآن</div>
<button style="margin-top:6px;background:#eee;color:#999;border:3px solid #555;padding:4px 10px;border-radius:20px">أضف للسلة</button>
</div>
</body></html>'></iframe>
<h3>بعد / After — الأربعة مبادئ صح مع بعض / All four right together</h3>
<iframe class="render-box" style="height:220px" sandbox srcdoc='<html><body style="font-family:sans-serif;padding:16px;background:#fafafa">
<div style="display:flex;gap:14px">
<div style="flex:1;border:1px solid #e0e0e0;border-radius:10px;padding:14px">
<div style="font-weight:bold;color:#222;font-size:14px">سماعة رأس لاسلكية</div>
<div style="color:#e63946;font-size:17px;font-weight:bold;margin-top:4px">$89.99</div>
<div style="color:#2a9d8f;font-size:12px;margin-top:2px">متوفرة الآن</div>
<button style="margin-top:10px;background:#e63946;color:white;border:none;padding:8px 14px;border-radius:8px;font-weight:bold;width:100%">أضف للسلة</button>
</div>
<div style="flex:1;border:1px solid #e0e0e0;border-radius:10px;padding:14px">
<div style="font-weight:bold;color:#222;font-size:14px">سماعة رأس سلكية</div>
<div style="color:#e63946;font-size:17px;font-weight:bold;margin-top:4px">$39.99</div>
<div style="color:#2a9d8f;font-size:12px;margin-top:2px">متوفرة الآن</div>
<button style="margin-top:10px;background:#e63946;color:white;border:none;padding:8px 14px;border-radius:8px;font-weight:bold;width:100%">أضف للسلة</button>
</div>
</div>
</body></html>'></iframe>
<div class="bi-block">
    <div class="ar">🇪🇬 في النسخة "بعد": التباين واضح (السعر بلون مختلف وأكبر)، المحاذاة موحدة (نفس الشكل بالظبط للكارتين)، التكرار متسق (نفس الحدود والزوايا والألوان)، والتقارب صح (السعر والحالة قريبين من العنوان، والزرار في الآخر بعيد شوية لأنه فعل مختلف).</div>
    <div class="en">🇬🇧 In the "after" version: contrast is clear (the price is a different, larger color), alignment is unified (both cards share the exact same shape), repetition is consistent (same borders, corners, and colors), and proximity is correct (the price and status sit near the title, while the button sits a bit apart since it's a different action).</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="contrast">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">أي مبدأ بيجاوب سؤال "إيه أهم عنصر هنا؟"<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Which principle answers "what's the most important element here?"</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="contrast"> التباين / Contrast</label>
        <label><input type="radio" name="q1" value="repetition"> التكرار / Repetition</label>
        <label><input type="radio" name="q1" value="proximity"> التقارب / Proximity</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="proximity">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">في كارت منتج، لو السعر بعيد جدًا عن اسم المنتج بمسافة كبيرة، أي مبدأ اتخالف؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">If a price sits far from the product name, which principle is broken?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="alignment"> المحاذاة / Alignment</label>
        <label><input type="radio" name="q2" value="proximity"> التقارب / Proximity</label>
        <label><input type="radio" name="q2" value="contrast"> التباين / Contrast</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="exercise-box">
    <h3>✍️ تمرين عملي / Hands-on Exercise</h3>
    <div class="ar">🇪🇬 افتح أي صفحة ويب عشوائية، وحاول تلاقي مثال واحد لكل مبدأ من الأربعة (تباين، محاذاة، تكرار، تقارب) مطبّق فيها فعليًا. لو لقيت واحد ناقص أو مطبّق غلط، اكتب إزاي كنت هتصلحه.</div>
    <div class="en">🇬🇧 Open any random web page, and try to find one example of each of the four principles (contrast, alignment, repetition, proximity) actually applied. If you find one missing or poorly applied, write how you'd fix it.</div>
</div>

<div class="challenge-box">
    <h3>🛠️ أعد تصميم كارت الأسعار / Redesign a Pricing Card</h3>
    <div class="ar">🇪🇬 تخيل كارت "خطة اشتراك" فيه: عنوان الخطة وسعرها بنفس الحجم وبينهم مسافة كبيرة، حدود الكارت مختلفة عن باقي كروت الموقع، وكل النصوص بلون رمادي واحد فمافيش حاجة واضحة إنها الأهم. اكتب خطوة بخطوة إزاي هتصلح الكارت ده باستخدام المبادئ الأربعة (أنهي عنصر هيبقى بتباين أعلى؟ هتقرّب إيه من إيه؟ هتوحّد الشكل مع باقي الكروت إزاي؟).</div>
    <div class="en">🇬🇧 Imagine a "subscription plan" card where the plan name and price are the same size with a big gap between them, the card's border differs from the site's other cards, and all text is the same gray so nothing signals importance. Write step by step how you'd fix this card using the four principles (which element gets higher contrast? what will you bring closer together? how will you unify its shape with other cards?).</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 المبادئ الأربعة دي مش درس منفصل هتنساه — هي العدسة اللي هتشوف بيها كل درس جاي في المسار: نظرية الألوان (الفصل 3) هي تطبيق عملي للتباين، الطباعة (الفصل 4) هي تطبيق للتباين والتكرار مع بعض، والتخطيط والمسافات (الفصل 5) هو تطبيق مباشر للتقارب والمحاذاة. ولما توصل لدرس "أدوات التصميم والعمل في المجال"، أي مشروع بورتفوليو هتعمله هيتحكم فيه نجاحك في تطبيق المبادئ الأربعة دي بشكل متسق.</div>
    <div class="en">🇬🇧 These four principles aren't a lesson you'll forget — they're the lens you'll view every upcoming lesson through: Color Theory (Stage 3) is a practical application of contrast, Typography (Stage 4) applies contrast and repetition together, and Layout & Spacing (Stage 5) directly applies proximity and alignment. And when you reach "Tools & Careers," any portfolio project you build will be judged largely on how consistently you applied these same four principles.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>التباين = يوضّح إيه الأهم فورًا.</li>
        <li>المحاذاة = تخلي التصميم يحس إنه دقيق ومقصود.</li>
        <li>التكرار = يبني ثقة المستخدم في التنقل.</li>
        <li>التقارب = المسافة نفسها بتوصل علاقة بين العناصر من غير كلام.</li>
        <li>في تصميم حقيقي، الأربعة بيشتغلوا مع بعض في نفس اللحظة، مش كل واحد لوحده.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="intro.php">← المرحلة السابقة</a>
    <a href="color-theory.php">المرحلة الجاية / Next: Color Theory →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
