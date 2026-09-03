<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'tools';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'أدوات التصميم';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">المرحلة 5 / Stage 5</span>
<h1>أدوات التصميم <span class="ltr">Design Tools</span></h1>
<p class="subtitle">مفيش "أداة واحدة أحسن من الكل" — كل أداة اتصممت لنوع شغل مختلف. اختيار الأداة الغلط بيضيع وقتك، حتى لو كنت مصمم ممتاز. وكمان مفيش "صيغة ملف واحدة تصلح لكل حاجة" — تصدير الملف بالصيغة الغلط ممكن يخرب مشروع كامل عند الطباعة.</p>

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
    <div class="ar">🇪🇬 تفهم الفرق الحقيقي بين Canva، Photoshop، وIllustrator، وتتعلم أساسيات صيغ الملفات اللي أي مصمم لازم يعرفها: الفرق بين Vector وRaster، وإمتى تحتاج CMYK بدل RGB — عشان تختار الأداة والصيغة الصح من أول مرة بدل ما تكتشف المشكلة بعد ما الشغل يتطبع غلط.</div>
    <div class="en">🇬🇧 Understand the real difference between Canva, Photoshop, and Illustrator, and learn the file-format basics every designer must know: the difference between vector and raster, and when you need CMYK instead of RGB — so you pick the right tool and format from the start instead of discovering the problem after work gets printed wrong.</div>
</div>

<h2 id="understand">Canva — السرعة والقوالب / Speed and Templates</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 Canva أداة أونلاين مبنية على القوالب الجاهزة (Templates) — بتسحب عناصر جاهزة وتظبطها بدل ما تبني من الصفر. مثالية للمبتدئين، ولإنتاج محتوى سوشيال ميديا بسرعة (بوستات إنستجرام، ستوريز، بانرات بسيطة). عيبها: تحكم محدود في التفاصيل الدقيقة، وأي حد تقريبًا بيستخدم نفس القوالب فبتلاقي تصاميم متشابهة على النت.</div>
    <div class="en">🇬🇧 Canva is a web tool built around ready-made templates — you drag prebuilt elements and adjust them instead of building from scratch. Ideal for beginners and for producing social media content fast (Instagram posts, stories, simple banners). Downside: limited control over fine details, and since nearly everyone uses the same templates, designs often look similar across the internet.</div>
</div>

<h2>Photoshop — تحرير الصور والرسم النقطي / Photo Editing and Raster Graphics</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 Photoshop أداة احترافية لتحرير الصور (Raster/Bitmap) — يعني بتشتغل بكسل بكسل. تستخدمه لما شغلك يتضمن: ريتاتش وتعديل صور فوتوغرافية، دمج صور، تأثيرات ضوء وظل معقدة، أو تصميمات تعتمد على صور حقيقية (إعلانات منتجات، بوسترات فيها صور أشخاص). عيبها الأساسي: أي تصميم فيه Photoshop لو كبّرته كتير (Scale up) هيفقد جودته لأنه مبني على بكسلات ثابتة.</div>
    <div class="en">🇬🇧 Photoshop is a professional tool for editing raster/bitmap images — it works pixel by pixel. Use it when your work involves: retouching and editing photographs, compositing images, complex light/shadow effects, or designs relying on real photos (product ads, posters with people in them). Its main limitation: any Photoshop design, if scaled up too much, loses quality because it's built on fixed pixels.</div>
</div>

<h2>Illustrator — الرسم المتجهي واللوجوهات / Vector Graphics and Logos</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 Illustrator أداة احترافية للرسم المتجهي (Vector) — بتشتغل بمعادلات رياضية للخطوط والأشكال بدل بكسلات، فتقدر تكبّر أي تصميم لحجم أي بوستر ضخم من غير ما يفقد أي جودة. عشان كده هي الأداة الأساسية لتصميم الشعارات (Logos)، الأيقونات، والرسوم التوضيحية (Illustrations) اللي لازم تتطبع بأحجام مختلفة جدًا — من بطاقة عمل لبانر شارع.</div>
    <div class="en">🇬🇧 Illustrator is a professional vector graphics tool — it works with mathematical equations for lines and shapes instead of pixels, so you can scale any design up to a huge poster size without losing quality. That's why it's the go-to tool for designing logos, icons, and illustrations that need to be printed at very different sizes — from a business card to a street banner.</div>
</div>

<h2>إزاي تختار الأداة الصح / How to Pick the Right Tool</h2>
<div class="recap-box">
    <h3>🗺️ خريطة القرار / Decision Map</h3>
    <ul>
        <li><b>عندك بوست سوشيال ميديا لازم يطلع دلوقتي:</b> Canva.</li>
        <li><b>عندك صورة منتج محتاجة تعديل وتركيب وإضاءة:</b> Photoshop.</li>
        <li><b>عندك شعار أو أيقونة هيتطبع في أحجام كتير مختلفة:</b> Illustrator.</li>
        <li><b>مشروع هوية بصرية كامل:</b> غالبًا هتحتاج الاتنين — Illustrator للشعار، Photoshop لو فيه صور فوتوغرافية في المواد التسويقية.</li>
    </ul>
</div>

<h2>أساسيات صيغ الملفات / File Format Basics</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 كل أداة من التلاتة بتصدّر ملفاتها بصيغ معينة، وفهم الفرق ده أهم من إتقان أي برنامج — لأن غلطة في الصيغة ممكن تخرب مشروع كامل. الملفات بتتقسم لنوعين: <b>متجهية (Vector)</b> — زي <code>.ai</code> (ملف Illustrator الأصلي، قابل للتعديل) و<code>.svg</code> (ملف متجهي خفيف للويب) — مبنية على معادلات رياضية فبتكبر لأي حجم من غير ما تفقد جودتها، عشان كده هي الصيغة الصح للشعارات والأيقونات. <b>نقطية (Raster)</b> — زي <code>.psd</code> (ملف Photoshop الأصلي بالطبقات)، <code>.png</code> (نقطي بيدعم الشفافية، مناسب لعناصر ويب)، و<code>.jpg</code> (نقطي مضغوط بدون شفافية، مناسب للصور الفوتوغرافية عشان حجمه أصغر) — مبنية على بكسلات ثابتة، فلو كبّرتها كتير هتظهر "مسننة" أو ضبابية.</div>
    <div class="en">🇬🇧 All three tools export files in specific formats, and understanding this matters more than mastering any single program — a format mistake can ruin an entire project. Files split into two types: <b>Vector</b> — like <code>.ai</code> (Illustrator's native, editable file) and <code>.svg</code> (a lightweight vector format for the web) — built on mathematical equations, so they scale to any size without losing quality, making them the right choice for logos and icons. <b>Raster</b> — like <code>.psd</code> (Photoshop's native layered file), <code>.png</code> (raster with transparency support, good for web elements), and <code>.jpg</code> (compressed raster with no transparency, good for photos since its file size is smaller) — built on fixed pixels, so scaling them up too much makes them look jagged or blurry.</div>
</div>

<h2 id="practice">💻 مثال بصري: Vector مقابل Raster عند التكبير / Practice: Vector vs. Raster When Scaled Up</h2>
<iframe class="render-box" style="height:220px" sandbox srcdoc='<html><body style="font-family:sans-serif;padding:16px;display:flex;gap:30px;align-items:center;justify-content:center"><div style="text-align:center"><div style="width:120px;height:120px;border-radius:50%;background:#2d4a34;margin:0 auto"></div><div style="margin-top:8px;font-size:13px;color:#333"><b>Vector (.svg/.ai)</b><br>حواف ناعمة أي حجم<br>always crisp, any size</div></div><div style="text-align:center"><div style="width:120px;height:120px;margin:0 auto;display:grid;grid-template-columns:repeat(10,1fr);grid-template-rows:repeat(10,1fr)"><div style="grid-column:4/8;grid-row:1/2;background:#2d4a34"></div><div style="grid-column:3/9;grid-row:2/3;background:#2d4a34"></div><div style="grid-column:2/10;grid-row:3/8;background:#2d4a34"></div><div style="grid-column:3/9;grid-row:8/9;background:#2d4a34"></div><div style="grid-column:4/8;grid-row:9/10;background:#2d4a34"></div></div><div style="margin-top:8px;font-size:13px;color:#333"><b>Raster (.png/.jpg)</b><br>حواف مسننة عند التكبير<br>jagged edges when scaled up</div></div></body></html>'></iframe>

<h2>الطباعة (CMYK) مقابل الشاشة (RGB) / Print (CMYK) vs. Screen (RGB)</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 غلطة كلاسيكية عند المبتدئين: تصميم بروشور بألوان زاهية على الشاشة، وبعد الطباعة الألوان بتطلع "باهتة" أو مختلفة تمامًا. السبب: الشاشات بتعرض الضوء بنظام <b>RGB</b> (أحمر، أخضر، أزرق) اللي بيقدر يعرض ألوان زاهية جدًا لأنه ضوء مباشر. أما الطابعات فبتخلط حبر بنظام <b>CMYK</b> (سماوي، ماجنتا، أصفر، أسود) اللي مداه اللوني أضيق. القاعدة: أي شغل هيتطبع (بروشور، بطاقة عمل، بوستر) لازم يتصمم من الأول بنظام CMYK ويتصدّر <code>.pdf</code> (بيحافظ على جودة الطباعة والخطوط)، وأي شغل هيتعرض بس على شاشة (سوشيال ميديا، موقع) يفضل RGB وصيغة <code>.png</code>/<code>.jpg</code>.</div>
    <div class="en">🇬🇧 A classic beginner mistake: designing a brochure with vivid colors on screen, then after printing the colors look "washed out" or completely different. Why: screens display light using <b>RGB</b> (Red, Green, Blue), which can show very vivid colors because it's direct light. Printers mix ink using <b>CMYK</b> (Cyan, Magenta, Yellow, Black), which has a narrower color range. Rule: anything getting printed (brochure, business card, poster) should be designed in CMYK from the start and exported as <code>.pdf</code> (preserves print quality and fonts), while anything shown only on a screen (social media, website) should stay RGB, exported as <code>.png</code>/<code>.jpg</code>.</div>
</div>

<div class="recap-box">
    <h3>🗺️ خريطة قرار الصيغة / Format Decision Map</h3>
    <ul>
        <li><b>شعار هيتحط على موقع وبانر شارع كمان:</b> Vector — <code>.ai</code> للتعديل، <code>.svg</code> للويب.</li>
        <li><b>صورة منتج هتتنزل على إنستجرام:</b> Raster RGB — <code>.jpg</code> (أو <code>.png</code> لو محتاج شفافية).</li>
        <li><b>بروشور هيتبعت لمطبعة:</b> CMYK، 300 DPI، يتصدّر <code>.pdf</code>.</li>
        <li><b>أيقونة شفافة لموقع:</b> Raster — <code>.png</code> (بيدعم الشفافية عكس .jpg).</li>
    </ul>
</div>

<div class="exercise-box">
    <h3>✍️ تمرين عملي / Hands-on Exercise</h3>
    <div class="ar">🇪🇬 اكتب قائمة بـ5 مهام تصميم مختلفة ممكن حد يطلبها منك (مثلًا: "غيّر خلفية صورة منتج"، "صمم شعار لشركة ناشئة"، "اعمل بوست تهنئة بمناسبة"). قدام كل مهمة، حدد الأداة الأنسب (Canva / Photoshop / Illustrator) واكتب سبب سطر واحد ليه هي الأنسب.</div>
    <div class="en">🇬🇧 Write a list of 5 different design tasks someone might ask you for (e.g. "change a product photo's background", "design a startup logo", "make a greeting post for an occasion"). Next to each task, name the most suitable tool (Canva / Photoshop / Illustrator) and write a one-line reason why.</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="vector">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">شعار هيتطبع في حجم بطاقة عمل وكمان في حجم بانر شارع ضخم — أي نوع ملف الأنسب؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">A logo will be printed at business-card size and also a huge street banner — which file type fits best?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="raster"> Raster زي .jpg</label>
        <label><input type="radio" name="q1" value="vector"> Vector زي .ai أو .svg</label>
        <label><input type="radio" name="q1" value="either"> أي واحد فيهم، مفيش فرق</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="cmyk">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">هتصمم بروشور هيتبعت لمطبعة فعلية — إيه نظام الألوان الصح تصمم بيه من الأول؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">You're designing a brochure that will go to an actual print shop — which color mode should you design in from the start?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="rgb"> RGB لأنه بيدي ألوان أزهى</label>
        <label><input type="radio" name="q2" value="cmyk"> CMYK لأنه نظام الحبر اللي المطبعة هتستخدمه فعليًا</label>
        <label><input type="radio" name="q2" value="none"> مفيش فرق بين النظامين للطباعة</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ اختار الأداة والصيغة الصح / Pick the Right Tool and Format</h3>
    <div class="ar">🇪🇬 خد نفس قائمة الخمس مهام اللي كتبتها في التمرين فوق، وزوّد قدام كل مهمة عمودين إضافيين: (1) نوع الملف الأنسب لمخرجها (Vector أم Raster؟ ولو Raster إيه امتداده)، (2) نظام الألوان الأنسب (RGB أم CMYK؟) بناءً على هل المخرج للشاشة ولا للطباعة.</div>
    <div class="en">🇬🇧 Take the same list of 5 tasks you wrote in the exercise above, and add two more columns next to each: (1) the most suitable file type for its output (vector or raster? if raster, which extension), (2) the most suitable color mode (RGB or CMYK?) based on whether the output is for screen or print.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 القرارات اللي اتعلمتها هنا — الأداة الصح، Vector للشعار، وRGB أو CMYK حسب الاستخدام — هي بالظبط اللي هتحتاجها وإحنا بنبني دليل هوية "Root Coffee" في المرحلة الجاية: الشعار هيتصدّر Vector عشان يتحط على كل حاجة من الكوب لبانر المحل، والمواد التسويقية هتتقسم بوضوح بين نسخة RGB للسوشيال ميديا ونسخة CMYK للتغليف المطبوع.</div>
    <div class="en">🇬🇧 The decisions you learned here — the right tool, vector for the logo, and RGB vs. CMYK depending on use — are exactly what you'll need while building the "Root Coffee" brand guideline in the next stage: the logo gets exported as vector so it works from a cup to a shop banner, and marketing materials split clearly between an RGB version for social media and a CMYK version for printed packaging.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>Canva: سرعة وقوالب — ممتاز للمبتدئين والسوشيال ميديا.</li>
        <li>Photoshop: تحرير صور (Raster) — ريتاتش، دمج صور، تأثيرات.</li>
        <li>Illustrator: رسم متجهي (Vector) — شعارات وأيقونات قابلة للتكبير بلا فقدان جودة.</li>
        <li>Vector (.ai/.svg) يكبر بلا فقدان جودة، Raster (.psd/.png/.jpg) بيتسنن أو يترمّض عند التكبير الزيادة.</li>
        <li>الشاشة = RGB، الطباعة = CMYK وتصدير .pdf — الخلط بينهم بيخرب ألوان المطبوعات.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="typography.php">← المرحلة السابقة</a>
    <a href="branding.php">المرحلة الجاية / Next: Brand Identity →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
