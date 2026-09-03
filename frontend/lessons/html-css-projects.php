<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'html-css-projects';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = '4 تصاميم وتطبيقات على HTML + CSS — Front-End Developer';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">المرحلة 4 / Stage 4</span>
<h1>تصاميم وتطبيقات على HTML + CSS <span class="ltr">HTML + CSS Practice Projects</span></h1>
<p class="subtitle">مفيش نظرية جديدة هنا — دلوقتي عندك HTML لبناء البنية وCSS للشكل، وهنوظفهم مع بعض في تصميمين حقيقيين بتشوفهم في أي موقع فعلي: بطاقة سعر (Pricing Card)، وشريط تنقل (Navbar).</p>

<div class="step-tracker">
    <a href="#read">📖 Read</a>
    <a href="#understand">🧠 Understand</a>
    <a href="#practice">💻 Practice</a>
    <a href="#quiz">🧠 Quiz</a>
    <a href="#challenge">🛠️ Challenge</a>
    <a href="#project">🚀 Project</a>
</div>

<h2 id="read">📖 الهدف / Goal</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 تشوف إزاي HTML وCSS بيتظافروا لبناء مكوّنات (Components) حقيقية بتتكرر في كل موقع تقريبًا، وتتمرن على قراءة وتفكيك كود جاهز — مهارة هتحتاجها كتير في الشغل الحقيقي.</div>
    <div class="en">🇬🇧 See how HTML and CSS work together to build real Components that appear on almost every site, and practice reading and breaking down existing code — a skill you will need a lot in real work.</div>
</div>

<h2 id="understand">🧠 مشروع 1 — بطاقة سعر / Pricing Card</h2>
<div class="flow-diagram">
    <div class="flow-box">HTML Skeleton</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">Add Classes</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">Flexbox Layout + Gap</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">Shadow + Radius Polish</div>
</div>
<div class="bi-block">
    <div class="ar">🇪🇬 كده هي الخطوات اللي بيتبني بيها أي مكوّن (Component) حقيقي تقريبًا: تكتب الـ HTML الخام الأول من غير تفكير في الشكل، تحط عليه classes بأسامي منطقية، ترتب العناصر بـ Flexbox، وآخر حاجة تضيف اللمسات الجمالية (ظل، حواف دائرية، انتقالات).</div>
    <div class="en">🇬🇧 This is roughly how almost every real Component gets built: write the raw HTML first without thinking about looks, add classes with sensible names, arrange things with Flexbox, and only at the end add the aesthetic touches (shadow, rounded corners, transitions).</div>
</div>
<div class="bi-block">
    <div class="ar">🇪🇬 استخدمنا <code>div</code> واحد يجمع كل حاجة، Flexbox بعمود (<code>flex-direction: column</code>) لترتيب العناصر فوق بعض، وGap للمسافات بدل margins متفرقة. لاحظ <code>box-shadow</code> لإحساس العمق، و<code>border-radius</code> للحواف الدائرية.</div>
    <div class="en">🇬🇧 One <code>div</code> wraps everything, Flexbox in column direction (<code>flex-direction: column</code>) stacks the pieces, and Gap replaces scattered margins. Notice <code>box-shadow</code> for a sense of depth, and <code>border-radius</code> for rounded corners.</div>
</div>
<pre><code>&lt;div class="price-card"&gt;
    &lt;span class="plan-name"&gt;الخطة الاحترافية&lt;/span&gt;
    &lt;div class="price"&gt;199 &lt;small&gt;جنيه / شهر&lt;/small&gt;&lt;/div&gt;
    &lt;ul class="features"&gt;
        &lt;li&gt;✔ مساحة تخزين غير محدودة&lt;/li&gt;
        &lt;li&gt;✔ دعم فني على مدار الساعة&lt;/li&gt;
        &lt;li&gt;✔ تقارير أسبوعية&lt;/li&gt;
    &lt;/ul&gt;
    &lt;button class="btn-subscribe"&gt;اشترك الآن&lt;/button&gt;
&lt;/div&gt;</code></pre>
<pre><code>.price-card {
    display: flex;
    flex-direction: column;
    gap: 14px;
    max-width: 260px;
    padding: 28px 24px;
    background: white;
    border-radius: 14px;
    box-shadow: 0 8px 24px rgba(0,0,0,0.12);
    font-family: sans-serif;
    text-align: center;
}
.plan-name { color: #888; font-size: 14px; letter-spacing: 1px; }
.price { font-size: 34px; font-weight: 800; color: #222; }
.price small { font-size: 14px; font-weight: 400; color: #888; }
.features { list-style: none; padding: 0; margin: 0; text-align: right; color: #444; line-height: 2; }
.btn-subscribe {
    background: #6c8bff;
    color: white;
    border: none;
    padding: 12px;
    border-radius: 8px;
    font-size: 15px;
    font-weight: 700;
    cursor: pointer;
}</code></pre>
<h3>المعاينة الفعلية / Actual Rendered Output</h3>
<iframe class="render-box" style="height:340px" sandbox srcdoc='<html><head><style>body{background:#eef0f5;padding:20px;margin:0;display:flex;justify-content:center}.price-card{display:flex;flex-direction:column;gap:14px;max-width:260px;padding:28px 24px;background:white;border-radius:14px;box-shadow:0 8px 24px rgba(0,0,0,0.12);font-family:sans-serif;text-align:center}.plan-name{color:#888;font-size:14px;letter-spacing:1px}.price{font-size:34px;font-weight:800;color:#222}.price small{font-size:14px;font-weight:400;color:#888}.features{list-style:none;padding:0;margin:0;text-align:right;color:#444;line-height:2}.btn-subscribe{background:#6c8bff;color:white;border:none;padding:12px;border-radius:8px;font-size:15px;font-weight:700;cursor:pointer}</style></head><body dir="rtl"><div class="price-card"><span class="plan-name">الخطة الاحترافية</span><div class="price">199 <small>جنيه / شهر</small></div><ul class="features"><li>✔ مساحة تخزين غير محدودة</li><li>✔ دعم فني على مدار الساعة</li><li>✔ تقارير أسبوعية</li></ul><button class="btn-subscribe">اشترك الآن</button></div></body></html>'></iframe>

<h2 id="practice">💻 مشروع 2 — شريط تنقل / Navbar with Logo</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 العنصر الدلالي <code>&lt;nav&gt;</code> بيحتوي على شعار (نص أو صورة) وقائمة روابط. Flexbox هنا مع <code>justify-content: space-between</code> بيحط الشعار في طرف والروابط في الطرف التاني، و<code>align-items: center</code> بيحاذيهم رأسيًا في المنتصف.</div>
    <div class="en">🇬🇧 The semantic <code>&lt;nav&gt;</code> element holds a logo (text or image) and a link list. Flexbox with <code>justify-content: space-between</code> pushes the logo to one edge and the links to the other, and <code>align-items: center</code> vertically centers them.</div>
</div>
<pre><code>&lt;nav class="navbar"&gt;
    &lt;span class="logo"&gt;🎨 سيلا&lt;/span&gt;
    &lt;ul class="nav-links"&gt;
        &lt;li&gt;&lt;a href="#"&gt;الرئيسية&lt;/a&gt;&lt;/li&gt;
        &lt;li&gt;&lt;a href="#"&gt;الدورات&lt;/a&gt;&lt;/li&gt;
        &lt;li&gt;&lt;a href="#"&gt;تواصل معنا&lt;/a&gt;&lt;/li&gt;
    &lt;/ul&gt;
&lt;/nav&gt;</code></pre>
<pre><code>.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: #1e2230;
    padding: 14px 26px;
}
.logo { color: white; font-weight: 800; font-size: 18px; }
.nav-links {
    display: flex;
    gap: 22px;
    list-style: none;
    margin: 0;
    padding: 0;
}
.nav-links a {
    color: #cdd3e6;
    text-decoration: none;
    font-size: 15px;
}
.nav-links a:hover { color: #7c9cff; }</code></pre>
<h3>المعاينة الفعلية / Actual Rendered Output</h3>
<iframe class="render-box" style="height:80px" sandbox srcdoc='<html><head><style>body{margin:0;font-family:sans-serif}.navbar{display:flex;justify-content:space-between;align-items:center;background:#1e2230;padding:14px 26px}.logo{color:white;font-weight:800;font-size:18px}.nav-links{display:flex;gap:22px;list-style:none;margin:0;padding:0}.nav-links a{color:#cdd3e6;text-decoration:none;font-size:15px}.nav-links a:hover{color:#7c9cff}</style></head><body dir="rtl"><nav class="navbar"><span class="logo">🎨 سيلا</span><ul class="nav-links"><li><a href="#">الرئيسية</a></li><li><a href="#">الدورات</a></li><li><a href="#">تواصل معنا</a></li></ul></nav></body></html>'></iframe>

<div class="bi-block">
    <div class="ar">🇪🇬 جرّب بنفسك في المحرر تحت: غيّر <code>justify-content</code>، غيّر ألوان الخلفية، أو زوّد رابط رابع في <code>&lt;ul class="nav-links"&gt;</code> وشوف إزاي Flexbox بيرتبه أوتوماتيك.</div>
    <div class="en">🇬🇧 Try it yourself in the editor below: change <code>justify-content</code>, change the background colors, or add a fourth link to <code>&lt;ul class="nav-links"&gt;</code> and see how Flexbox arranges it automatically.</div>
</div>
<div class="mini-fe-editor">
    <div class="fe-tabs">
        <button class="fe-tab active" data-tab="html">HTML</button>
        <button class="fe-tab" data-tab="css">CSS</button>
    </div>
    <textarea class="fe-code" data-tab="html" spellcheck="false">&lt;nav class="navbar"&gt;
    &lt;span class="logo"&gt;🎨 سيلا&lt;/span&gt;
    &lt;ul class="nav-links"&gt;
        &lt;li&gt;&lt;a href="#"&gt;الرئيسية&lt;/a&gt;&lt;/li&gt;
        &lt;li&gt;&lt;a href="#"&gt;الدورات&lt;/a&gt;&lt;/li&gt;
        &lt;li&gt;&lt;a href="#"&gt;تواصل معنا&lt;/a&gt;&lt;/li&gt;
    &lt;/ul&gt;
&lt;/nav&gt;</textarea>
    <textarea class="fe-code" data-tab="css" style="display:none" spellcheck="false">body { margin: 0; font-family: sans-serif; }
.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: #1e2230;
    padding: 14px 26px;
}
.logo { color: white; font-weight: 800; font-size: 18px; }
.nav-links {
    display: flex;
    gap: 22px;
    list-style: none;
    margin: 0;
    padding: 0;
}
.nav-links a {
    color: #cdd3e6;
    text-decoration: none;
    font-size: 15px;
}
.nav-links a:hover { color: #7c9cff; }</textarea>
    <iframe class="render-box mini-fe-preview" style="height:90px" sandbox></iframe>
</div>

<h2>مشروع 3 — بطاقة اقتباس عميل / Testimonial Quote Card</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 مكوّن ثالث بتشوفه في أي صفحة هبوط (Landing Page): بطاقة اقتباس من عميل راضٍ. الفكرة نفسها من مشروع 1: <code>div</code> يجمع كل حاجة، لكن هنا نستخدم <code>border-inline-start</code> (حد جانبي واحد بس) بدل الحدود الأربعة، وهي طريقة شائعة جدًا لتمييز الاقتباسات.</div>
    <div class="en">🇬🇧 A third component you'll see on almost every landing page: a happy-customer testimonial card. Same idea as Project 1: one <code>div</code> wraps everything, but here we use <code>border-inline-start</code> (a single side border) instead of all four — a very common way to visually mark a quote.</div>
</div>
<pre><code>&lt;div class="testimonial"&gt;
    &lt;p class="quote"&gt;"المنصة دي غيّرت طريقة تعلّمي تمامًا — كل درس فيه تطبيق فعلي."&lt;/p&gt;
    &lt;div class="author"&gt;
        &lt;span class="author-name"&gt;منى سعيد&lt;/span&gt;
        &lt;span class="author-role"&gt;طالبة Front-End&lt;/span&gt;
    &lt;/div&gt;
&lt;/div&gt;</code></pre>
<pre><code>.testimonial {
    max-width: 320px;
    padding: 20px 24px;
    background: #f7f8fc;
    border-inline-start: 4px solid #6c8bff;
    border-radius: 6px;
    font-family: sans-serif;
}
.quote { font-style: italic; color: #333; margin: 0 0 12px; line-height: 1.7; }
.author { display: flex; flex-direction: column; }
.author-name { font-weight: 700; color: #222; }
.author-role { font-size: 13px; color: #888; }</code></pre>
<h3>المعاينة الفعلية / Actual Rendered Output</h3>
<iframe class="render-box" style="height:170px" sandbox srcdoc='<html><head><style>body{background:#eef0f5;margin:0;padding:20px;display:flex;justify-content:center}.testimonial{max-width:320px;padding:20px 24px;background:#f7f8fc;border-inline-start:4px solid #6c8bff;border-radius:6px;font-family:sans-serif}.quote{font-style:italic;color:#333;margin:0 0 12px;line-height:1.7}.author{display:flex;flex-direction:column}.author-name{font-weight:700;color:#222}.author-role{font-size:13px;color:#888}</style></head><body dir="rtl"><div class="testimonial"><p class="quote">"المنصة دي غيّرت طريقة تعلّمي تمامًا — كل درس فيه تطبيق فعلي."</p><div class="author"><span class="author-name">منى سعيد</span><span class="author-role">طالبة Front-End</span></div></div></body></html>'></iframe>

<div class="bi-block">
    <div class="ar">🇪🇬 جرّب بنفسك: غيّر <code>border-inline-start</code> للون تاني، أو حوّله لـ <code>border: 1px solid #ddd;</code> عادي وشوف الفرق في الإحساس البصري، أو زوّد <code>&lt;img&gt;</code> دائرية صغيرة جنب اسم الكاتب.</div>
    <div class="en">🇬🇧 Try it yourself: change the <code>border-inline-start</code> color, or swap it for a regular <code>border: 1px solid #ddd;</code> and notice the different visual feel, or add a small circular <code>&lt;img&gt;</code> next to the author's name.</div>
</div>
<div class="mini-fe-editor">
    <div class="fe-tabs">
        <button class="fe-tab active" data-tab="html">HTML</button>
        <button class="fe-tab" data-tab="css">CSS</button>
    </div>
    <textarea class="fe-code" data-tab="html" spellcheck="false">&lt;div class="testimonial"&gt;
    &lt;p class="quote"&gt;"المنصة دي غيّرت طريقة تعلّمي تمامًا."&lt;/p&gt;
    &lt;div class="author"&gt;
        &lt;span class="author-name"&gt;منى سعيد&lt;/span&gt;
        &lt;span class="author-role"&gt;طالبة Front-End&lt;/span&gt;
    &lt;/div&gt;
&lt;/div&gt;</textarea>
    <textarea class="fe-code" data-tab="css" style="display:none" spellcheck="false">body { background: #eef0f5; margin: 0; padding: 20px; font-family: sans-serif; }
.testimonial {
    max-width: 320px;
    padding: 20px 24px;
    background: #f7f8fc;
    border-inline-start: 4px solid #6c8bff;
    border-radius: 6px;
}
.quote { font-style: italic; color: #333; margin: 0 0 12px; line-height: 1.7; }
.author { display: flex; flex-direction: column; }
.author-name { font-weight: 700; color: #222; }
.author-role { font-size: 13px; color: #888; }</textarea>
    <iframe class="render-box mini-fe-preview" style="height:170px" sandbox></iframe>
</div>

<div class="exercise-box">
    <h3>✍️ تمرين عملي / Hands-on Exercise</h3>
    <div class="ar">🇪🇬 خد الكودين دول في <a href="../playground/index.php">محرر الكود</a> وادمجهم في صفحة واحدة (الـ Navbar فوق، وبطاقة السعر في النص)، وبعدين جرّب تعمل نسخة تانية من بطاقة السعر بألوان وأسعار مختلفة جنب بعض بـ Flexbox.</div>
    <div class="en">🇬🇧 In the <a href="../playground/index.php">Playground</a>, combine both examples into one page (Navbar on top, pricing card in the middle), then try building a second pricing card with different colors/prices next to the first one using Flexbox.</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="column">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">إيه قيمة <code>flex-direction</code> اللي استخدمناها عشان نرتب عناصر بطاقة السعر فوق بعض عموديًا؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Which <code>flex-direction</code> value stacks the Pricing Card's items vertically?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="row"> row</label>
        <label><input type="radio" name="q1" value="column"> column</label>
        <label><input type="radio" name="q1" value="center"> center</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="between">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">في الـ Navbar، أنهي خاصية حطت الشعار في طرف والروابط في الطرف التاني؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">In the Navbar, which property pushed the logo to one edge and the links to the other?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="center"> align-items: center</label>
        <label><input type="radio" name="q2" value="between"> justify-content: space-between</label>
        <label><input type="radio" name="q2" value="gap"> gap</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="side">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">في بطاقة الاقتباس، إيه اللي استخدمناه بدل ما نحط حد على الأربع جهات؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">In the Testimonial card, what did we use instead of a border on all four sides?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="none"> مفيش حدود خالص</label>
        <label><input type="radio" name="q3" value="side"> border-inline-start لحد جانبي واحد بس</label>
        <label><input type="radio" name="q3" value="shadow"> box-shadow بديل عن الحدود</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="reuse">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">بطاقة السعر، الـ Navbar، وبطاقة الاقتباس التلاتة مبنيين بنفس الفكرة الأساسية. إيه هي؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">The Pricing Card, Navbar, and Testimonial card all share the same core idea. What is it?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="reuse"> عنصر يجمع كل حاجة + Flexbox للترتيب + لمسات جمالية أخيرة</label>
        <label><input type="radio" name="q4" value="grid"> لازم Grid دايمًا في أي مكوّن</label>
        <label><input type="radio" name="q4" value="js"> لازم JavaScript عشان يظهروا صح</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ اعمل صفحة هبوط صغيرة / Build a Small Landing Page</h3>
    <div class="ar">🇪🇬 في <a href="../playground/index.php">محرر الكود</a>، ادمج الـ Navbar فوق صفحة فيها 3 بطاقات سعر جنب بعض (Basic, Pro, Enterprise) بألوان وأسعار مختلفة باستخدام Flexbox أو Grid — خلي بطاقة الـ "Pro" أكبر شوية أو بحدود مميزة عشان تبرز.</div>
    <div class="en">🇬🇧 In the <a href="../playground/index.php">Playground</a>, combine the Navbar on top of a page with 3 pricing cards side by side (Basic, Pro, Enterprise) with different colors/prices using Flexbox or Grid — make the "Pro" card slightly larger or have a distinct border so it stands out.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 البطاقة والـ Navbar اللي بنيتهم هنا لسه ثابتين (Static) — الزرار "اشترك الآن" ماعندوش أي وظيفة فعلية. في مرحلة JavaScript الجاية هتبدأ تدّي حياة لنفس المكوّنات دي (زرار بيعمل حاجة فعلًا لما تضغطه)، ولحد ما توصل لمرحلة "مشروع كامل بـ JavaScript" هتبني تطبيق تفاعلي كامل بنفس أسلوب البناء اللي اتعلمته هنا بالظبط.</div>
    <div class="en">🇬🇧 The card and Navbar you built here are still static — the "Subscribe Now" button does not actually do anything yet. In the upcoming JavaScript stage you'll start bringing these exact components to life (a button that actually does something when clicked), and by the time you reach the "Full JavaScript Project" stage you'll build a complete interactive app using this exact same building approach.</div>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>بطاقة السعر = Flexbox عمودي (<code>flex-direction: column</code>) + <code>gap</code> + <code>box-shadow</code>.</li>
        <li>Navbar = <code>&lt;nav&gt;</code> + Flexbox أفقي مع <code>justify-content: space-between</code>.</li>
        <li>معظم مكوّنات الويب اللي بتشوفها كل يوم مبنية من نفس الأدوات اللي اتعلمتها بالظبط: div/nav/ul + Flexbox + ألوان وخطوط.</li>
    </ul>
</div>

<div class="nav-buttons">
    <a href="css.php">← المرحلة السابقة</a>
    <a href="javascript.php">المرحلة الجاية / Next: Learn JavaScript →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
