<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'color-theory';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'نظرية الألوان للمصمم';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">المرحلة 3 / Stage 3</span>
<h1>نظرية الألوان للمصمم <span class="ltr">Color Theory for Designers</span></h1>
<p class="subtitle">اللون مش ديكور — هو رسالة نفسية بتوصل لعقل الجمهور قبل ما يقرأ كلمة واحدة. هنا هنتكلم عن اختيار لوحة ألوان لعلامة تجارية (شعار، تغليف، مطبوعات) مش شاشة تطبيق.</p>

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
    <div class="ar">🇪🇬 تفهم إزاي كل لون بيوحي بإحساس نفسي معين، تتعلم إزاي تبني لوحة ألوان متكاملة لعلامة تجارية، وتتعرف على أشهر 3 أنظمة تناغم لوني (Color Harmony) تستخدمها أي أداة أو مصمم محترف بدل ما تختار ألوان عشوائية "بتعجبك".</div>
    <div class="en">🇬🇧 Understand how each color psychologically suggests a certain feeling, learn how to build a complete color palette for a brand, and learn the 3 most common color harmony schemes any professional tool or designer uses instead of picking colors randomly because "you like them."</div>
</div>

<h2 id="understand">سيكولوجية اللون في العلامات التجارية / Color Psychology in Branding</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 لما تشوف شعار بنك بلون أزرق غامق، أو علبة منتج عضوي بلون أخضر، ده مش صدفة — كل لون له ارتباطات نفسية متعارف عليها عالميًا (مع اختلافات ثقافية بسيطة). الأخضر = طبيعة، صحة، استدامة. الأزرق = ثقة، أمان، احترافية. الأحمر = طاقة، شهية، إلحاح. الأصفر = تفاؤل، حيوية، تنبيه. البنفسجي = فخامة، إبداع. الأسود/الرمادي = فخامة، جدية، بساطة.</div>
    <div class="en">🇬🇧 When you see a bank logo in dark blue, or an organic product box in green, that's not a coincidence — every color has universally recognized psychological associations (with some cultural variation). Green = nature, health, sustainability. Blue = trust, safety, professionalism. Red = energy, appetite, urgency. Yellow = optimism, vibrancy, alertness. Purple = luxury, creativity. Black/gray = elegance, seriousness, simplicity.</div>
</div>

<h2>إزاي تبني لوحة ألوان لعلامة تجارية / Building a Brand Palette</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 اللوحة الناجحة عادة بتتكون من: <b>لون أساسي مسيطر</b> (بيظهر في الشعار وأغلب المواد، وبيحمل الرسالة النفسية الرئيسية)، <b>لون أو اتنين ثانويين/مكملين</b> (لإبراز عناصر معينة زي الأزرار أو العروض)، و<b>ألوان محايدة</b> (أبيض، رمادي، بيج) للخلفيات والتوازن عشان التصميم ميبقاش "صارخ" كله ألوان قوية.</div>
    <div class="en">🇬🇧 A successful palette usually has: <b>one dominant primary color</b> (appears in the logo and most materials, carrying the main psychological message), <b>one or two secondary/accent colors</b> (to highlight specific elements like buttons or offers), and <b>neutral colors</b> (white, gray, beige) for backgrounds and balance so the design isn't overwhelmingly loud.</div>
</div>

<h3>مثال: بناء لوحة لعلامة قهوة صديقة للبيئة / Example: Palette for an Eco-Friendly Coffee Brand</h3>
<div class="bi-block">
    <div class="ar">🇪🇬 لنفترض عندنا براند اسمه "Root Coffee" بيبيع قهوة عضوية ومستدامة. الرسالة اللي عايزين نوصّلها: طبيعي، دافئ، وصديق للأرض. القرار: لون أساسي أخضر غامق (طبيعة واستدامة)، لون ثانوي بني دافئ (يرمز لحبوب البن والدفء)، ولون محايد بيج/كريمي (خلفيات ناعمة تدي إحساس عضوي طبيعي بدل الأبيض الصناعي البارد).</div>
    <div class="en">🇬🇧 Say we have a brand called "Root Coffee" selling organic, sustainable coffee. The message we want: natural, warm, and earth-friendly. The decision: a dark green primary (nature and sustainability), a warm brown secondary (evokes coffee beans and warmth), and a beige/cream neutral (soft backgrounds that feel organic rather than cold industrial white).</div>
</div>

<iframe class="render-box" style="height:220px" sandbox srcdoc='<html><body style="font-family:sans-serif;padding:16px;background:#f4ede2"><div style="font-weight:bold;color:#2d4a34;font-size:14px;margin-bottom:10px">Root Coffee — لوحة الألوان</div><div style="display:flex;gap:10px"><div style="text-align:center"><div style="width:70px;height:70px;background:#2d4a34;border-radius:8px"></div><div style="font-size:11px;margin-top:4px;color:#333">أساسي<br>#2D4A34</div></div><div style="text-align:center"><div style="width:70px;height:70px;background:#8a5a3b;border-radius:8px"></div><div style="font-size:11px;margin-top:4px;color:#333">ثانوي<br>#8A5A3B</div></div><div style="text-align:center"><div style="width:70px;height:70px;background:#f4ede2;border:1px solid #ccc;border-radius:8px"></div><div style="font-size:11px;margin-top:4px;color:#333">محايد<br>#F4EDE2</div></div></div><div style="margin-top:16px;background:#2d4a34;color:#f4ede2;padding:14px;border-radius:8px;display:flex;justify-content:space-between;align-items:center"><b>Root Coffee</b><span style="background:#8a5a3b;color:white;padding:6px 14px;border-radius:6px;font-size:13px">اطلب الآن</span></div></body></html>'></iframe>

<h2>أنظمة التناغم اللوني / Color Harmony Schemes</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 لوحة الألوان اللي شفناها فوق مبنية على نظام تناغم اسمه "متكامل" (Complementary)، بس ده مش النظام الوحيد. أدوات زي Adobe Color وCanva بتبني اقتراحاتها على 3 أنظمة أساسية مبنية على "عجلة الألوان" (Color Wheel): <b>متكامل (Complementary)</b> — لونين متقابلين تمامًا على العجلة، بيديوا أقوى تباين ممكن. <b>متجاور (Analogous)</b> — 3 ألوان جنب بعض على العجلة، بيديوا انسجام هادئ لأنهم قريبين من بعض. <b>ثلاثي (Triadic)</b> — 3 ألوان متباعدة بالتساوي على العجلة (كل 120 درجة)، بيديوا حيوية وتوازن لكن لازم حذر عشان ميبقاش صارخ.</div>
    <div class="en">🇬🇧 The palette we saw above is built on a harmony scheme called "complementary," but it's not the only one. Tools like Adobe Color and Canva base their suggestions on 3 core schemes built on the "color wheel": <b>Complementary</b> — two colors directly opposite each other on the wheel, giving the strongest possible contrast. <b>Analogous</b> — 3 colors sitting next to each other on the wheel, giving calm harmony because they're close together. <b>Triadic</b> — 3 colors spaced evenly apart (every 120°), giving vibrancy and balance, but needing care so it doesn't look too loud.</div>
</div>

<h2 id="practice">💻 مثال بصري: الثلاث أنظمة على Root Coffee / Practice: The 3 Schemes Applied to Root Coffee</h2>
<iframe class="render-box" style="height:280px" sandbox srcdoc='<html><body style="font-family:sans-serif;padding:16px;background:#fff"><div style="display:flex;gap:14px;flex-wrap:wrap"><div style="flex:1;min-width:160px"><div style="font-weight:bold;font-size:12px;margin-bottom:6px;color:#333">متكامل Complementary</div><div style="display:flex;gap:4px"><div style="width:36px;height:36px;background:#2d4a34;border-radius:4px"></div><div style="width:36px;height:36px;background:#b5502f;border-radius:4px"></div></div><div style="margin-top:8px;background:#2d4a34;color:#fff;padding:6px 10px;border-radius:6px;font-size:11px;display:flex;justify-content:space-between;align-items:center"><span>Root Coffee</span><span style="background:#b5502f;padding:2px 8px;border-radius:4px;font-size:10px">خصم 20%</span></div><div style="font-size:10px;color:#666;margin-top:4px">تباين قوي — للفتة عرض مؤقت</div></div><div style="flex:1;min-width:160px"><div style="font-weight:bold;font-size:12px;margin-bottom:6px;color:#333">متجاور Analogous</div><div style="display:flex;gap:4px"><div style="width:36px;height:36px;background:#2d4a4a;border-radius:4px"></div><div style="width:36px;height:36px;background:#2d4a34;border-radius:4px"></div><div style="width:36px;height:36px;background:#4a4a2d;border-radius:4px"></div></div><div style="margin-top:8px;background:#2d4a34;color:#fff;padding:6px 10px;border-radius:6px;font-size:11px;display:flex;justify-content:space-between;align-items:center"><span>Root Coffee</span><span style="background:#2d4a4a;padding:2px 8px;border-radius:4px;font-size:10px">عضوي</span></div><div style="font-size:10px;color:#666;margin-top:4px">انسجام هادئ — يناسب رسالة البراند الطبيعية</div></div><div style="flex:1;min-width:160px"><div style="font-weight:bold;font-size:12px;margin-bottom:6px;color:#333">ثلاثي Triadic</div><div style="display:flex;gap:4px"><div style="width:36px;height:36px;background:#2d4a34;border-radius:4px"></div><div style="width:36px;height:36px;background:#b5722f;border-radius:4px"></div><div style="width:36px;height:36px;background:#5a3d5c;border-radius:4px"></div></div><div style="margin-top:8px;background:#2d4a34;color:#fff;padding:6px 10px;border-radius:6px;font-size:11px;display:flex;justify-content:space-between;align-items:center"><span>Root Coffee</span><span style="background:#5a3d5c;padding:2px 8px;border-radius:4px;font-size:10px">إصدار محدود</span></div><div style="font-size:10px;color:#666;margin-top:4px">حيوي وملفت — خطر تعارض مع الهدوء العضوي</div></div></div></body></html>'></iframe>
<div class="bi-block">
    <div class="ar">🇪🇬 الثلاثة أنظمة بيحافظوا على نفس الأخضر الأساسي، بس بيغيروا اللون المرافق ليه: المتكامل مثالي كـ"إشارة انتباه" مؤقتة (زي لافتة خصم) لأنه أقوى تباين ممكن. المتجاور هو الأنسب لهوية Root Coffee الدائمة لأنه بيحافظ على الهدوء العضوي المطلوب. الثلاثي ممكن يستخدم في تغليف إصدار محدود (Limited Edition) عشان يلفت نظر في الرف، لكن استخدامه في الهوية الأساسية هيتعارض مع رسالة "الهدوء الطبيعي".</div>
    <div class="en">🇬🇧 All three schemes keep the same core green but change its companion color: complementary is ideal as a temporary "attention signal" (like a discount banner) because it's the strongest possible contrast. Analogous is the best fit for Root Coffee's permanent identity because it preserves the organic calm the brand needs. Triadic could work on a limited-edition package to stand out on a shelf, but using it in the core identity would clash with the "natural calm" message.</div>
</div>

<h2>ليه اللوحة العشوائية بتفشل / Why a Random Palette Fails</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 لو استخدمنا نفس البراند "Root Coffee" بس بألوان وردي فسفوري وأزرق نيون (ألوان مش موجودة أصلًا على أي نظام تناغم منطقي مع الأخضر الأساسي)، هيبقى فيه تضارب واضح بين الألوان والرسالة — الجمهور هيحس بحاجة "صناعية وصاخبة" بدل "طبيعية وهادئة"، حتى لو الشعار واللوجو نفسهم حلوين فنيًا. الاختيار الصح مش عن "الألوان الجميلة" لوحدها، لكن عن التناسق مع رسالة البراند ومع نظام تناغم واضح.</div>
    <div class="en">🇬🇧 If we used the same "Root Coffee" brand but with neon pink and electric blue (colors that don't even sit on any logical harmony with the core green), there'd be a clear clash between the colors and the message — the audience would feel something "artificial and loud" instead of "natural and calm," even if the logo itself is artistically nice. The right choice isn't about "pretty colors" alone, but about consistency with the brand's message and a clear harmony scheme.</div>
</div>

<div class="exercise-box">
    <h3>✍️ تمرين عملي / Hands-on Exercise</h3>
    <div class="ar">🇪🇬 اختار علامة تجارية وهمية من نوع مختلف تمامًا (مثلًا: صالة رياضية للملاكمة، أو متجر ألعاب أطفال). حدد: (1) الرسالة النفسية اللي عايز البراند يوصّلها، (2) لون أساسي واحد وليه، (3) لون ثانوي واحد وليه، (4) لون محايد وليه. اكتب الأسباب مش بس الأسماء.</div>
    <div class="en">🇬🇧 Pick a completely different fictional brand (e.g. a boxing gym, or a children's toy store). Determine: (1) the psychological message the brand should convey, (2) one primary color and why, (3) one secondary color and why, (4) one neutral color and why. Write the reasoning, not just the color names.</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="analogous">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">أي نظام تناغم لوني الأنسب للهوية الدائمة لبراند زي Root Coffee اللي عايز يوصّل هدوء وطبيعية؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Which harmony scheme best fits a brand like Root Coffee that wants to convey calm and nature?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="analogous"> متجاور (Analogous) — ألوان قريبة من بعض على العجلة</label>
        <label><input type="radio" name="q1" value="triadic"> ثلاثي (Triadic) — لأنه الأكتر حيوية</label>
        <label><input type="radio" name="q1" value="random"> أي ألوان تعجبني شخصيًا</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="opposite">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">إيه تعريف نظام "التكامل" (Complementary) على عجلة الألوان؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What defines the "complementary" scheme on the color wheel?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="adjacent"> ألوان جنب بعض على العجلة</label>
        <label><input type="radio" name="q2" value="opposite"> لونين متقابلين تمامًا على العجلة، بأقوى تباين ممكن</label>
        <label><input type="radio" name="q2" value="three-even"> 3 ألوان متباعدة بالتساوي كل 120 درجة</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ ابنِ 3 لوحات لبراندك / Build 3 Palettes for Your Brand</h3>
    <div class="ar">🇪🇬 ارجع للبراند الوهمي اللي بنيته في التمرين فوق. ابنِ 3 نسخ من لوحته: نسخة بنظام متكامل، نسخة متجاورة، ونسخة ثلاثية (اكتب أسماء الألوان أو أكواد Hex تقريبية للثلاثة). في الآخر، حدد أي نسخة الأنسب كهوية دائمة للبراند، وأي نسخة ممكن تستخدمها بس في عرض أو مناسبة مؤقتة، ولية.</div>
    <div class="en">🇬🇧 Go back to the fictional brand from the exercise above. Build 3 versions of its palette: a complementary version, an analogous version, and a triadic version (name the colors or give approximate hex codes for all three). Finally, decide which version fits best as the permanent identity, and which one you'd only use for a temporary promotion or occasion, and why.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 اللوحة اللي هتختارها هنا (الأساسي، الثانوي، والمحايد لـ Root Coffee أو لبراندك الوهمي) هي بالظبط اللي هتترحل معانا لمرحلة الطباعة (هتختار خط يتماشى مع نفس الإحساس)، ثم لمرحلة الهوية البصرية اللي هتجمّع الألوان والخطوط في دليل واحد متكامل.</div>
    <div class="en">🇬🇧 The palette you choose here (primary, secondary, and neutral for Root Coffee or your own fictional brand) is exactly what carries forward into the Typography stage (you'll pick a font matching the same feeling), and then into the Brand Identity stage that gathers colors and fonts into one complete guideline.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>كل لون له رسالة نفسية: أخضر = طبيعة، أزرق = ثقة، أحمر = طاقة/إلحاح... إلخ.</li>
        <li>لوحة ناجحة = لون أساسي مسيطر + لون أو اتنين ثانويين + ألوان محايدة للتوازن.</li>
        <li>3 أنظمة تناغم: متكامل (تباين قوي)، متجاور (انسجام هادئ)، ثلاثي (حيوية متوازنة لكن أخطر استخدامًا).</li>
        <li>اختيار اللون قرار استراتيجي مبني على رسالة البراند ونظام تناغم واضح، مش ذوق شخصي.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="design-elements.php">← المرحلة السابقة</a>
    <a href="typography.php">المرحلة الجاية / Next: Typography →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
