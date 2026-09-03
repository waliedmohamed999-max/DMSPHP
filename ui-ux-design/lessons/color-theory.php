<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'color-theory';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'نظرية الألوان';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">المرحلة 3 / Stage 3</span>
<h1>نظرية الألوان <span class="ltr">Color Theory</span></h1>
<p class="subtitle">الألوان مش اختيار عشوائي ولا مسألة ذوق بس — فيه قواعد بتخلي مجموعة ألوان "تحس مظبوطة" جنب بعض، وفيه دلالات نفسية بتأثر على قرار المستخدم من غير ما ياخد باله، وفيه كمان قاعدة تقنية صارمة اسمها إمكانية الوصول لازم تلتزم بيها.</p>

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
    <div class="ar">🇪🇬 تفهم عجلة الألوان الأساسية، تشوف الفرق بين تناسق لوني كويس وسيء بعينك، تتعرف على إزاي الألوان بتوصل معاني نفسية زي التحذير أو التأكيد، وتفهم ليه بعض تركيبات الألوان مرفوضة تقنيًا حتى لو شكلها حلو (Accessibility / WCAG).</div>
    <div class="en">🇬🇧 Understand the basic color wheel, see the difference between good and bad color harmony with your own eyes, learn how colors communicate psychological meaning like warning or confirmation, and understand why some color combinations are technically rejected even if they look nice (Accessibility / WCAG).</div>
</div>

<h2 id="understand">عجلة الألوان / The Color Wheel</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 الألوان الأساسية (Primary) هي الأحمر والأصفر والأزرق — مينفعش تتكوّن من خلط ألوان تانية. لما تخلط اتنين أساسيين مع بعض بتطلع الألوان الثانوية (Secondary): أحمر+أصفر=برتقالي، أصفر+أزرق=أخضر، أزرق+أحمر=بنفسجي. والألوان المتكاملة (Complementary) هي اللي بتبقى مقابلة لبعض في العجلة، زي الأزرق والبرتقالي — لما تحطهم جنب بعض بيدوا أعلى تباين ممكن.</div>
    <div class="en">🇬🇧 Primary colors are red, yellow, and blue — they cannot be made by mixing other colors. Mixing two primaries gives secondary colors: red+yellow=orange, yellow+blue=green, blue+red=purple. Complementary colors sit opposite each other on the wheel, like blue and orange — placing them together gives the highest possible contrast.</div>
</div>

<iframe class="render-box" style="height:190px" sandbox srcdoc='<html><body style="font-family:Tahoma,sans-serif;padding:16px">
<div style="display:flex;gap:24px;flex-wrap:wrap">
<div>
<div style="font-size:12px;color:#555;margin-bottom:6px">أساسية / Primary</div>
<div style="display:flex;gap:6px">
<div style="width:44px;height:44px;background:#e63946;border-radius:6px"></div>
<div style="width:44px;height:44px;background:#f4d35e;border-radius:6px"></div>
<div style="width:44px;height:44px;background:#457b9d;border-radius:6px"></div>
</div>
</div>
<div>
<div style="font-size:12px;color:#555;margin-bottom:6px">ثانوية / Secondary</div>
<div style="display:flex;gap:6px">
<div style="width:44px;height:44px;background:#f4a261;border-radius:6px"></div>
<div style="width:44px;height:44px;background:#2a9d8f;border-radius:6px"></div>
<div style="width:44px;height:44px;background:#9b5de5;border-radius:6px"></div>
</div>
</div>
<div>
<div style="font-size:12px;color:#555;margin-bottom:6px">متكاملة / Complementary</div>
<div style="display:flex;gap:6px">
<div style="width:44px;height:44px;background:#264653;border-radius:6px"></div>
<div style="width:44px;height:44px;background:#e76f51;border-radius:6px"></div>
</div>
</div>
</div>
</body></html>'></iframe>

<h2>التناسق اللوني / Color Harmony</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 استخدام ألوان كتير عشوائية من كل حتة في العجلة بيدي إحساس فوضى وعدم احتراف. الحل إنك تختار لوحة ألوان محدودة (Palette) — لون أساسي، لون تكميلي، ولون أو اتنين محايدين (رمادي، أبيض) — وتلتزم بيهم في كل مكان.</div>
    <div class="en">🇬🇧 Using many random colors from all over the wheel feels chaotic and unprofessional. The fix is a limited palette — one main color, one accent color, and one or two neutrals (gray, white) — used consistently everywhere.</div>
</div>

<h3>قبل / Before</h3>
<iframe class="render-box" style="height:170px" sandbox srcdoc='<html><body style="font-family:Tahoma,sans-serif;padding:16px;background:#fef9ff">
<div style="background:#ff00ff;border:3px solid #00ff00;border-radius:14px;padding:16px;max-width:280px">
<div style="color:#ffff00;font-weight:bold;font-size:16px">عرض اليوم!</div>
<div style="color:#ff8800;margin-top:6px">خصم كبير على كل المنتجات</div>
<button style="margin-top:10px;background:#00bfff;color:#ff0000;border:2px solid #222;padding:8px 18px;border-radius:4px">اشتري الآن</button>
</div>
</body></html>'></iframe>
<h3>بعد / After</h3>
<iframe class="render-box" style="height:170px" sandbox srcdoc='<html><body style="font-family:Tahoma,sans-serif;padding:16px;background:#f7f7fb">
<div style="background:#ffffff;border:1px solid #e0e0ec;border-radius:14px;padding:16px;max-width:280px;box-shadow:0 2px 8px rgba(0,0,0,0.06)">
<div style="color:#1d3557;font-weight:bold;font-size:16px">عرض اليوم!</div>
<div style="color:#555;margin-top:6px">خصم كبير على كل المنتجات</div>
<button style="margin-top:10px;background:#e63946;color:white;border:none;padding:8px 18px;border-radius:6px;font-weight:bold">اشتري الآن</button>
</div>
</body></html>'></iframe>

<h2>دلالات الألوان النفسية / Color Psychology</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 المستخدم بيتعلم من تجربته في الحياة إن ألوان معينة بتعني حاجات معينة: الأحمر = خطر أو تحذير أو إلغاء، الأخضر = نجاح أو تأكيد أو "تمام"، الأزرق = ثقة وهدوء (عشان كده بيتستخدم كتير في تطبيقات البنوك)، الأصفر/البرتقالي = تنبيه بدون خطر شديد. لو استخدمت الألوان دي بعكس المتوقع، هتلخبط المستخدم حتى لو التصميم شكله حلو.</div>
    <div class="en">🇬🇧 Users learn from real life that certain colors carry meaning: red = danger, warning, or cancel; green = success, confirmation, or "okay"; blue = trust and calm (which is why banking apps use it heavily); yellow/orange = caution without severe danger. Using these colors against expectation confuses the user even if the design looks nice.</div>
</div>

<h3>قبل / Before — الألوان معكوسة / Colors reversed</h3>
<iframe class="render-box" style="height:150px" sandbox srcdoc='<html><body style="font-family:Tahoma,sans-serif;padding:16px"><div style="margin-bottom:10px;color:#333">تم حفظ التغييرات بنجاح</div><button style="background:#e63946;color:white;border:none;padding:9px 20px;border-radius:6px;font-weight:bold">تأكيد الحفظ</button><button style="background:#2a9d8f;color:white;border:none;padding:9px 20px;border-radius:6px;font-weight:bold;margin-inline-start:10px">حذف الحساب نهائيًا</button></body></html>'></iframe>
<h3>بعد / After — الألوان متوافقة مع توقع المستخدم / Colors match expectation</h3>
<iframe class="render-box" style="height:150px" sandbox srcdoc='<html><body style="font-family:Tahoma,sans-serif;padding:16px"><div style="margin-bottom:10px;color:#2a9d8f;font-weight:bold">✔ تم حفظ التغييرات بنجاح</div><button style="background:#2a9d8f;color:white;border:none;padding:9px 20px;border-radius:6px;font-weight:bold">تأكيد الحفظ</button><button style="background:#e63946;color:white;border:none;padding:9px 20px;border-radius:6px;font-weight:bold;margin-inline-start:10px">حذف الحساب نهائيًا</button></body></html>'></iframe>

<h2 id="practice">💻 التباين اللوني وإمكانية الوصول / Color Contrast &amp; Accessibility (WCAG Basics)</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 مش كل تباين لوني "بيريح العين" فعليًا — فيه معيار عالمي اسمه WCAG بيحدد نسبة تباين دنيا لازم تكون موجودة بين لون النص وخلفيته عشان يقدر يقرأه ناس ضعف نظرهم بسيط أو بيشوفوا في إضاءة قوية على الموبايل. القاعدة العملية البسيطة: نص فاتح على خلفية فاتحة، أو نص غامق شوية على خلفية غامقة، هيبقى صعب القراءة حتى لو "شكله شيك ومينيمال". النص العادي محتاج نسبة تباين لا تقل عن 4.5:1 تقريبًا مقابل خلفيته.</div>
    <div class="en">🇬🇧 Not every color pairing that "looks nice" actually rests the eye — there's a global standard called WCAG that sets a minimum contrast ratio required between text color and its background so people with mild vision impairment, or anyone viewing a phone in bright light, can still read it. The simple practical rule: light text on a light background, or slightly-dark text on a dark background, will be hard to read no matter how "sleek and minimal" it looks. Body text needs a contrast ratio of roughly at least 4.5:1 against its background.</div>
</div>

<h3>قبل / Before — تباين ضعيف جدًا / Very low contrast</h3>
<iframe class="render-box" style="height:150px" sandbox srcdoc='<html><body style="font-family:Tahoma,sans-serif;padding:16px;background:#f0f0f0">
<div style="font-size:15px;font-weight:bold;color:#cfcfcf">تنبيه هام لكل المستخدمين</div>
<div style="margin-top:8px;color:#d4d4d4;font-size:13px;line-height:1.6">من فضلك راجع بيانات حسابك قبل يوم 30 من هذا الشهر لتجنب إيقاف الخدمة مؤقتًا.</div>
<button style="margin-top:10px;background:#e0e0e0;color:#c8c8c8;border:none;padding:8px 18px;border-radius:6px">مراجعة الآن</button>
</body></html>'></iframe>
<h3>بعد / After — تباين متوافق مع WCAG / WCAG-compliant contrast</h3>
<iframe class="render-box" style="height:150px" sandbox srcdoc='<html><body style="font-family:Tahoma,sans-serif;padding:16px;background:#f0f0f0">
<div style="font-size:15px;font-weight:bold;color:#1a1a1a">تنبيه هام لكل المستخدمين</div>
<div style="margin-top:8px;color:#3a3a3a;font-size:13px;line-height:1.6">من فضلك راجع بيانات حسابك قبل يوم 30 من هذا الشهر لتجنب إيقاف الخدمة مؤقتًا.</div>
<button style="margin-top:10px;background:#1d3557;color:#ffffff;border:none;padding:8px 18px;border-radius:6px;font-weight:bold">مراجعة الآن</button>
</body></html>'></iframe>
<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ: النسختين بيستخدموا تقريبًا نفس التركيب (خلفية رمادية فاتحة، نص، زرار) — الفرق الوحيد هو درجة غمقان الألوان. أدوات زي Figma وإضافات المتصفح فيها "Contrast Checker" بيديك النسبة الدقيقة رقميًا قبل ما تسلم أي تصميم.</div>
    <div class="en">🇬🇧 Notice: both versions use almost the same structure (light gray background, text, button) — the only difference is how dark the colors are. Tools like Figma and browser extensions have a "Contrast Checker" that gives you the exact numeric ratio before you ship any design.</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="complementary">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">أي نوع ألوان بيدي أعلى تباين ممكن لما تحطهم جنب بعض؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Which color type gives the highest possible contrast when placed together?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="primary"> الألوان الأساسية / Primary</label>
        <label><input type="radio" name="q1" value="complementary"> الألوان المتكاملة / Complementary</label>
        <label><input type="radio" name="q1" value="secondary"> الألوان الثانوية / Secondary</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="checker">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">أفضل طريقة تتأكد بيها إن نص فاتح على خلفية فاتحة مقروء فعلًا للجميع؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Best way to confirm light text on a light background is actually readable for everyone?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="eye"> تشوفه بعينك على شاشتك وتحكم / Just look at it on your own screen</label>
        <label><input type="radio" name="q2" value="checker"> تستخدم أداة Contrast Checker وتتأكد من نسبة WCAG / Use a Contrast Checker tool and confirm the WCAG ratio</label>
        <label><input type="radio" name="q2" value="ask"> تسأل زميل واحد رأيه / Ask one colleague's opinion</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="exercise-box">
    <h3>✍️ تمرين عملي / Hands-on Exercise</h3>
    <div class="ar">🇪🇬 اختار موقع أو تطبيق بتستخدمه، وحدد: إيه اللون الأساسي بتاعه؟ إيه لون التحذير/الخطأ؟ إيه لون النجاح/التأكيد؟ هل الألوان دي متوافقة مع اللي إحنا اتكلمنا عنه، ولا فيه لخبطة؟</div>
    <div class="en">🇬🇧 Pick an app or website you use, and identify: what is its main color? Its warning/error color? Its success/confirmation color? Do these match what we discussed, or is there confusion?</div>
</div>

<div class="challenge-box">
    <h3>🛠️ أصلح لوحة ألوان غير متوافقة / Fix a Non-compliant Palette</h3>
    <div class="ar">🇪🇬 صمم (على ورقة أو Figma) شاشة "رسالة خطأ" فيها 3 عناصر: عنوان الخطأ، نص توضيحي، وزرار "حاول مرة أخرى". ابدأ بمحاولة عمدًا: نص رمادي فاتح على خلفية بيضاء (تباين ضعيف). بعدين صلّحه بنفسك باستخدام لون أحمر غامق مناسب لدلالة الخطأ ونص غامق كفاية للقراءة، وتأكد إن زرار "حاول مرة أخرى" واضح تمامًا. اكتب أسفل التصميم: "قبل: تباين تقريبي X، بعد: تباين تقريبي Y" حتى بتقدير تقريبي بعينك.</div>
    <div class="en">🇬🇧 Design (on paper or Figma) an "error message" screen with 3 elements: error title, explanatory text, and a "Try Again" button. Start by deliberately using light gray text on a white background (low contrast). Then fix it yourself using a suitably dark red for the error meaning and text dark enough to read, making sure the "Try Again" button is fully clear. Write below the design: "Before: approx. contrast X, After: approx. contrast Y" — even as a rough eyeballed estimate.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 إمكانية الوصول (Accessibility) مش تفصيلة اختيارية تسيبها لآخر لحظة — هي معيار أساسي هيتقيّم بيه أي مشروع بورتفوليو تعمله (درس "أدوات التصميم والعمل في المجال")، وهيفضل يرجع معاك في كل قرار لوني هتاخده لحد ما توصل لدرس قابلية الاستخدام (Usability) اللي هيبني على نفس فكرة "التصميم لازم يشتغل مع كل مستخدم حقيقي، مش بس يبان حلو في العرض".</div>
    <div class="en">🇬🇧 Accessibility isn't an optional detail to leave for last — it's a core standard any portfolio project you build (the "Tools & Careers" lesson) will be judged on, and it will keep resurfacing in every color decision you make until you reach the Usability lesson, which builds on the same idea: "a design must work for every real user, not just look good in a presentation."</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>عجلة الألوان: أساسية → ثانوية → متكاملة (أعلى تباين).</li>
        <li>لوحة ألوان محدودة وملتزم بيها = تناسق، ألوان عشوائية كتير = فوضى.</li>
        <li>أحمر = تحذير/خطر، أخضر = نجاح/تأكيد، أزرق = ثقة، أصفر/برتقالي = تنبيه.</li>
        <li>استخدام لون بعكس دلالته المتوقعة بيلخبط المستخدم حتى لو التصميم جميل.</li>
        <li>WCAG = معيار تباين إلزامي بين النص وخلفيته، لازم تتحقق منه بأداة، مش بعينك بس.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="design-principles.php">← المرحلة السابقة</a>
    <a href="typography.php">المرحلة الجاية / Next: Typography →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
