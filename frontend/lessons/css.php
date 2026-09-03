<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'css';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'تعلم لغة CSS — Front-End Developer';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">المرحلة 3 / Stage 3</span>
<h1>تعلم لغة CSS <span class="ltr">Learn CSS</span></h1>
<p class="subtitle">دي أهم مرحلة في المسار كله. HTML بتحدد إيه اللي موجود، لكن CSS هي اللي بتحدد شكله — ألوان، مسافات، وترتيب العناصر على الصفحة. هنا هتقعد أطول وقت وهتتمرن أكتر حاجة.</p>

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
    <div class="ar">🇪🇬 تفهم الـ Selectors وإزاي CSS بيقرر أي قاعدة تنطبق على أنهي عنصر، تفهم Box Model كويس (مساحة كل عنصر بتتحسب إزاي)، تتحكم في الألوان والخطوط، وتقدر تعمل تخطيطات (Layouts) احترافية بـ Flexbox وGrid.</div>
    <div class="en">🇬🇧 Understand Selectors and how CSS decides which rule applies to which element, deeply understand the Box Model (how an element's space is calculated), control colors and typography, and build professional layouts with Flexbox and Grid.</div>
</div>

<h2>1) طريقة ربط CSS بالصفحة</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 أشهر طريقة (والأفضل) إنك تعمل ملف <code>style.css</code> منفصل، وتربطه في الـ <code>&lt;head&gt;</code> بـ <code>&lt;link&gt;</code>. كده الكود منظم والملف نفسه ممكن يتستخدم في أكتر من صفحة.</div>
    <div class="en">🇬🇧 The most common (and best) way is a separate <code>style.css</code> file linked in the <code>&lt;head&gt;</code> with <code>&lt;link&gt;</code>. This keeps the code organized, and the same file can be reused across multiple pages.</div>
</div>
<pre><code>&lt;head&gt;
    &lt;link rel="stylesheet" href="style.css"&gt;
&lt;/head&gt;</code></pre>

<h2>2) الـ Selectors — اختيار العنصر اللي هتنسّقه</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>Element selector</b> بيختار كل عنصر من نوع معين: <code>p { }</code>. <b>Class selector</b> بيبدأ بنقطة وبيختار أي عنصر عليه الـ <code>class</code> ده: <code>.highlight { }</code>. <b>ID selector</b> بيبدأ بـ <code>#</code> وبيختار عنصر واحد بس عليه الـ <code>id</code> ده: <code>#header { }</code>.</div>
    <div class="en">🇬🇧 An <b>element selector</b> targets every element of a type: <code>p { }</code>. A <b>class selector</b> starts with a dot and targets any element with that <code>class</code>: <code>.highlight { }</code>. An <b>ID selector</b> starts with <code>#</code> and targets exactly one element with that <code>id</code>: <code>#header { }</code>.</div>
</div>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>Specificity (الأولوية):</b> لو أكتر من قاعدة بتنطبق على نفس العنصر، الأقوى بيكسب — الترتيب من الأضعف للأقوى: Element &lt; Class &lt; ID. يعني لو <code>p</code> بيقول أحمر و<code>#title</code> بيقول أزرق، ولو نفس العنصر ID بتاعه <code>title</code>، هيبقى أزرق.</div>
    <div class="en">🇬🇧 <b>Specificity:</b> when multiple rules target the same element, the stronger one wins — from weakest to strongest: Element &lt; Class &lt; ID. So if <code>p</code> says red and <code>#title</code> says blue, and that element's id is <code>title</code>, it will be blue.</div>
</div>
<pre><code>p { color: gray; }
.highlight { color: orange; }
#title { color: #3355ff; }</code></pre>
<pre><code>&lt;p&gt;نص عادي&lt;/p&gt;
&lt;p class="highlight"&gt;نص مميز&lt;/p&gt;
&lt;p id="title" class="highlight"&gt;العنوان — الـ ID بيكسب&lt;/p&gt;</code></pre>
<h3>المعاينة الفعلية / Actual Rendered Output</h3>
<iframe class="render-box" style="height:110px" sandbox srcdoc='<html><head><style>p { color: gray; font-family: sans-serif; margin: 4px 12px; } .highlight { color: orange; } #title { color: #3355ff; }</style></head><body dir="rtl"><p>نص عادي</p><p class="highlight">نص مميز</p><p id="title" class="highlight">العنوان — الـ ID بيكسب</p></body></html>'></iframe>

<h2 id="understand">🧠 3) نموذج الصندوق / The Box Model</h2>
<div class="flow-diagram">
    <div class="flow-box">Content</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">Padding</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">Border</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">Margin</div>
</div>
<div class="bi-block">
    <div class="ar">🇪🇬 كل عنصر HTML هو عمليًا صندوق مكوّن من 4 طبقات من جوه لبرة: <b>Content</b> (المحتوى نفسه)، <b>Padding</b> (مسافة داخلية بين المحتوى والحد)، <b>Border</b> (الحد نفسه)، و<b>Margin</b> (مسافة خارجية بين العنصر والعناصر اللي حواليه). فهم الترتيب ده أهم حاجة في التحكم بالمسافات.</div>
    <div class="en">🇬🇧 Every HTML element is essentially a box made of 4 layers from inside out: <b>Content</b>, <b>Padding</b> (inner space between content and border), <b>Border</b> itself, and <b>Margin</b> (outer space between the element and its neighbors). Understanding this order is key to controlling spacing.</div>
</div>
<pre><code>.box {
    margin: 16px;
    border: 4px solid #fb8c00;
    padding: 16px;
    background: #90caf9;
}</code></pre>
<h3>المعاينة الفعلية / Actual Rendered Output</h3>
<iframe class="render-box" style="height:230px" sandbox srcdoc='<html><body style="font-family:sans-serif;padding:12px"><div style="background:#ffe0b2;display:inline-block;padding:24px"><div style="font-size:11px;color:#e65100;margin-bottom:4px;font-weight:bold">MARGIN</div><div style="background:#ffcc80;border:4px solid #fb8c00;padding:16px"><div style="font-size:11px;color:#e65100;margin-bottom:4px;font-weight:bold">BORDER</div><div style="background:#c5e1a5;padding:16px"><div style="font-size:11px;color:#33691e;margin-bottom:4px;font-weight:bold">PADDING</div><div style="background:#90caf9;padding:14px;text-align:center;font-weight:bold;border-radius:4px">CONTENT</div></div></div></div></body></html>'></iframe>

<h2>4) الألوان والخطوط / Colors &amp; Typography</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 الألوان بتتكتب بعدة طرق: اسم (<code>red</code>)، هيكس (<code>#3355ff</code>)، أو <code>rgb(51, 85, 255)</code>. للخطوط أهم خصائص: <code>font-family</code> (نوع الخط، مع بديل احتياطي زي <code>sans-serif</code>)، <code>font-size</code>، <code>font-weight</code> (سُمك الخط)، و<code>line-height</code> (تباعد الأسطر لسهولة القراءة).</div>
    <div class="en">🇬🇧 Colors can be written several ways: a name (<code>red</code>), hex (<code>#3355ff</code>), or <code>rgb(51, 85, 255)</code>. Key typography properties: <code>font-family</code> (with a fallback like <code>sans-serif</code>), <code>font-size</code>, <code>font-weight</code>, and <code>line-height</code> (for readable spacing between lines).</div>
</div>
<pre><code>.title {
    font-family: "Tahoma", sans-serif;
    font-size: 28px;
    font-weight: 700;
    color: #3355ff;
}
.text {
    font-size: 15px;
    line-height: 1.8;
    color: #444;
}</code></pre>
<h3>المعاينة الفعلية / Actual Rendered Output</h3>
<iframe class="render-box" style="height:130px" sandbox srcdoc='<html><body style="padding:12px" dir="rtl"><div style="font-family:Tahoma,sans-serif;font-size:28px;font-weight:700;color:#3355ff">عنوان بخط سميك وكبير</div><p style="font-size:15px;line-height:1.8;color:#444;font-family:sans-serif">نص عادي بمسافة أسطر مريحة للقراءة — لاحظ الفرق في التباعد بين السطر ده والتاني.</p></body></html>'></iframe>

<h2 id="practice">💻 5) Flexbox — ترتيب العناصر في صف أو عمود</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <code>display: flex;</code> بيحوّل العنصر لحاوية Flex، وكل العناصر جواه بتترتب في صف واحد تلقائيًا. <code>justify-content</code> بيتحكم في التوزيع الأفقي (زي <code>space-between</code>، <code>center</code>)، و<code>align-items</code> بيتحكم في المحاذاة الرأسية (زي <code>center</code>)، و<code>gap</code> بيدّي مسافة ثابتة بين العناصر من غير ما تحتاج margin يدوي.</div>
    <div class="en">🇬🇧 <code>display: flex;</code> turns an element into a Flex container, and its children line up in a row automatically. <code>justify-content</code> controls horizontal distribution (e.g. <code>space-between</code>, <code>center</code>), <code>align-items</code> controls vertical alignment (e.g. <code>center</code>), and <code>gap</code> adds fixed spacing between items without manual margins.</div>
</div>
<pre><code>.cards {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 14px;
}
.card {
    flex: 1;
    background: #6c8bff;
    color: white;
    padding: 24px;
    text-align: center;
    border-radius: 10px;
}</code></pre>
<h3>المعاينة الفعلية / Actual Rendered Output</h3>
<iframe class="render-box" style="height:150px" sandbox srcdoc='<html><body style="font-family:sans-serif;padding:14px;margin:0"><div style="display:flex;justify-content:space-between;align-items:center;gap:14px"><div style="flex:1;background:#6c8bff;color:white;padding:24px;text-align:center;border-radius:10px">1</div><div style="flex:1;background:#6c8bff;color:white;padding:36px 24px;text-align:center;border-radius:10px">2</div><div style="flex:1;background:#6c8bff;color:white;padding:16px 24px;text-align:center;border-radius:10px">3</div></div></body></html>'></iframe>

<div class="bi-block">
    <div class="ar">🇪🇬 جرّب بنفسك: غيّر <code>justify-content</code> لـ <code>center</code> أو <code>flex-end</code>، أو زوّد <code>&lt;div class="card"&gt;4&lt;/div&gt;</code> جديدة في الـ HTML، أو غيّر <code>gap</code> وشوف الفرق فورًا في المعاينة تحت.</div>
    <div class="en">🇬🇧 Try it yourself: change <code>justify-content</code> to <code>center</code> or <code>flex-end</code>, add a new <code>&lt;div class="card"&gt;4&lt;/div&gt;</code> in the HTML, or change <code>gap</code> and watch the difference instantly in the preview below.</div>
</div>
<div class="mini-fe-editor">
    <div class="fe-tabs">
        <button class="fe-tab active" data-tab="html">HTML</button>
        <button class="fe-tab" data-tab="css">CSS</button>
    </div>
    <textarea class="fe-code" data-tab="html" spellcheck="false">&lt;div class="cards"&gt;
    &lt;div class="card"&gt;1&lt;/div&gt;
    &lt;div class="card"&gt;2&lt;/div&gt;
    &lt;div class="card"&gt;3&lt;/div&gt;
&lt;/div&gt;</textarea>
    <textarea class="fe-code" data-tab="css" style="display:none" spellcheck="false">body { font-family: sans-serif; padding: 14px; margin: 0; }
.cards {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 14px;
}
.card {
    flex: 1;
    background: #6c8bff;
    color: white;
    padding: 24px;
    text-align: center;
    border-radius: 10px;
}</textarea>
    <iframe class="render-box mini-fe-preview" style="height:180px" sandbox></iframe>
</div>

<h2>6) CSS Grid — تخطيطات ثنائية الأبعاد</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 Flexbox ممتاز لصف أو عمود واحد، لكن <code>display: grid;</code> بيديك تحكم في صفوف وأعمدة مع بعض. <code>grid-template-columns: repeat(3, 1fr)</code> يعني اعمل 3 أعمدة، كل واحد ياخد نفس المساحة (<code>1fr</code> = جزء واحد من المساحة المتاحة).</div>
    <div class="en">🇬🇧 Flexbox is great for a single row or column, but <code>display: grid;</code> gives you control over rows and columns together. <code>grid-template-columns: repeat(3, 1fr)</code> means 3 equal-width columns (<code>1fr</code> = one fraction of the available space).</div>
</div>
<pre><code>.grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 12px;
}
.grid div {
    background: #35d0ba;
    color: white;
    padding: 20px;
    text-align: center;
    border-radius: 8px;
}</code></pre>
<h3>المعاينة الفعلية / Actual Rendered Output</h3>
<iframe class="render-box" style="height:180px" sandbox srcdoc='<html><body style="font-family:sans-serif;padding:14px;margin:0"><div style="display:grid;grid-template-columns:repeat(3,1fr);gap:12px"><div style="background:#35d0ba;color:white;padding:20px;text-align:center;border-radius:8px">1</div><div style="background:#35d0ba;color:white;padding:20px;text-align:center;border-radius:8px">2</div><div style="background:#35d0ba;color:white;padding:20px;text-align:center;border-radius:8px">3</div><div style="background:#35d0ba;color:white;padding:20px;text-align:center;border-radius:8px">4</div><div style="background:#35d0ba;color:white;padding:20px;text-align:center;border-radius:8px">5</div><div style="background:#35d0ba;color:white;padding:20px;text-align:center;border-radius:8px">6</div></div></body></html>'></iframe>

<h2>7) Flexbox مقابل Grid — أنهي تستخدم إمتى؟ / Flexbox vs Grid — When to Use Which</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 نفس هدف التخطيط ممكن يتحل بالاتنين أحيانًا، لكن الفرق الجوهري: Flexbox بيفكر في <b>بُعد واحد</b> (صف أو عمود) وبيوزّع المساحة حسب محتوى كل عنصر، أما Grid بيفكر في <b>بُعدين مع بعض</b> (صفوف وأعمدة) وبيدّيك تحكم دقيق في المكان بالظبط. تحت نفس التخطيط (بطاقة صورة + عنوان + وصف) اتعمل مرتين — مرة Flexbox ومرة Grid — عشان تشوف الفرق في الكود بعينك.</div>
    <div class="en">🇬🇧 The same layout goal can sometimes be solved with either, but the core difference: Flexbox thinks in <b>one dimension</b> (a row or a column) and sizes items based on their content, while Grid thinks in <b>two dimensions at once</b> (rows and columns together) and gives you precise placement control. Below, the exact same layout (image + title + description card) is built twice — once with Flexbox, once with Grid — so you can see the code difference yourself.</div>
</div>
<div style="display:flex;gap:14px;flex-wrap:wrap">
    <div style="flex:1;min-width:260px">
        <h3 style="font-size:15px">Flexbox — عمود واحد (column)</h3>
        <pre><code>.card {
    display: flex;
    flex-direction: column;
    gap: 8px;
}</code></pre>
        <iframe class="render-box" style="height:150px" sandbox srcdoc='<html><body style="font-family:sans-serif;padding:10px;margin:0"><div style="display:flex;flex-direction:column;gap:8px;max-width:180px;border:1px solid #ddd;border-radius:8px;padding:12px"><div style="background:#6c8bff;height:60px;border-radius:6px"></div><b>عنوان البطاقة</b><p style="margin:0;font-size:13px;color:#555">وصف قصير للبطاقة هنا.</p></div></body></html>'></iframe>
    </div>
    <div style="flex:1;min-width:260px">
        <h3 style="font-size:15px">Grid — صفوف محددة (rows)</h3>
        <pre><code>.card {
    display: grid;
    grid-template-rows: auto auto 1fr;
    gap: 8px;
}</code></pre>
        <iframe class="render-box" style="height:150px" sandbox srcdoc='<html><body style="font-family:sans-serif;padding:10px;margin:0"><div style="display:grid;grid-template-rows:auto auto 1fr;gap:8px;max-width:180px;border:1px solid #ddd;border-radius:8px;padding:12px"><div style="background:#35d0ba;height:60px;border-radius:6px"></div><b>عنوان البطاقة</b><p style="margin:0;font-size:13px;color:#555">وصف قصير للبطاقة هنا.</p></div></body></html>'></iframe>
    </div>
</div>
<div class="bi-block">
    <div class="ar">🇪🇬 النتيجة البصرية هنا متطابقة تقريبًا — وده بالظبط المغزى: لعمود بسيط زي ده، Flexbox أبسط وأقل كود. لكن لو عايز تتحكم في عرض عمود بعينه (زي Sidebar ثابت العرض جنب محتوى مرن)، أو محتاج عناصر تتصاطف في صفوف وأعمدة مع بعض بدقة (زي شبكة صور معرض)، Grid هو الأنسب. القاعدة العملية: <b>صف/عمود واحد بسيط ← Flexbox</b>، <b>شبكة ثنائية الأبعاد أو تخطيط صفحة كامل ← Grid</b>.</div>
    <div class="en">🇬🇧 The visual result here is nearly identical — that's exactly the point: for a simple column like this, Flexbox is simpler and needs less code. But when you need precise control over a specific column's width (like a fixed-width sidebar next to flexible content), or elements that align in rows and columns together with precision (like an image gallery grid), Grid is the better fit. Practical rule: <b>a single simple row/column → Flexbox</b>, <b>a two-dimensional grid or a whole-page layout → Grid</b>.</div>
</div>

<div class="exercise-box">
    <h3>✍️ تمرين عملي / Hands-on Exercise</h3>
    <div class="ar">🇪🇬 افتح <a href="../playground/index.php">محرر الكود</a> وارجع لهيكل البورتفوليو اللي عملته في مرحلة HTML: حط عليه ألوان وخطوط، اعمل الـ <code>nav</code> بتاعك صف أفقي بـ Flexbox و<code>gap</code>، واعمل قسم "مهاراتي" شبكة (Grid) من 2 أو 3 أعمدة بدل قائمة عادية.</div>
    <div class="en">🇬🇧 In the <a href="../playground/index.php">Playground</a>, go back to the portfolio skeleton from the HTML stage: add colors and fonts, make your <code>nav</code> a horizontal row using Flexbox and <code>gap</code>, and turn the "Skills" section into a 2 or 3 column Grid instead of a plain list.</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="id">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">لو <code>.highlight</code> بيقول اللون برتقالي و<code>#title</code> بيقول اللون أزرق على نفس العنصر، هيبقى لونه إيه؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">If <code>.highlight</code> says orange and <code>#title</code> says blue on the same element, what wins?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="class"> برتقالي، لأن الـ class مكتوب الأول</label>
        <label><input type="radio" name="q1" value="id"> أزرق، لأن الـ ID أقوى من الـ class</label>
        <label><input type="radio" name="q1" value="both"> الاتنين مع بعض</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="padding">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">في نموذج الصندوق (Box Model)، أنهي طبقة موجودة مباشرة حوالين المحتوى (Content) قبل الحد (Border)؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">In the Box Model, which layer sits directly around the Content, before the Border?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="margin"> Margin</label>
        <label><input type="radio" name="q2" value="padding"> Padding</label>
        <label><input type="radio" name="q2" value="border"> Border نفسه</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="grid">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">عايز تعمل شبكة معرض صور: 4 أعمدة و3 صفوف بالظبط، وكل صورة تاخد مكانها بدقة. أنهي أداة أنسب؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">You need a photo gallery: exactly 4 columns and 3 rows, each photo precisely placed. Which tool fits best?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="flex"> Flexbox، لأنه أبسط دايمًا</label>
        <label><input type="radio" name="q3" value="grid"> Grid، لأنه بيتحكم في صفوف وأعمدة مع بعض</label>
        <label><input type="radio" name="q3" value="margin"> Margins يدوية بس</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="flex">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">عايز صف واحد بسيط من الأزرار يتوسط أفقيًا، من غير أي تعقيد. أنهي الأنسب؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">You need one simple horizontal row of buttons, centered, nothing fancy. Which is the better fit?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="flex"> Flexbox — بُعد واحد، كود أقل</label>
        <label><input type="radio" name="q4" value="grid"> Grid دايمًا أفضل حتى لصف واحد</label>
        <label><input type="radio" name="q4" value="none"> مفيش فرق أبدًا بينهم</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ صمّم بطاقة بروفايل / Design a Profile Card</h3>
    <div class="ar">🇪🇬 استخدم <a href="../playground/index.php">محرر الكود</a> (أو المحرر المصغّر فوق) وابني بطاقة بروفايل: صندوق بـ Flexbox عمودي (<code>flex-direction: column</code>)، فيه اسم ووظيفة ووصف قصير، بـ <code>padding</code>، <code>border-radius</code>، و<code>box-shadow</code>. بعدين زوّد 3 بطاقات جنب بعض بـ CSS Grid من 3 أعمدة.</div>
    <div class="en">🇬🇧 Use the <a href="../playground/index.php">Playground</a> (or the mini editor above) and build a profile card: a box using column Flexbox (<code>flex-direction: column</code>) with a name, role, and short bio, styled with <code>padding</code>, <code>border-radius</code>, and <code>box-shadow</code>. Then place 3 of them side by side using a 3-column CSS Grid.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 كل حاجة اتعلمتها هنا (Selectors، Box Model، Flexbox، Grid) هي بالظبط الأدوات اللي هتبني بيها بطاقة السعر والـ Navbar الحقيقيين في مرحلة "تصاميم وتطبيقات على HTML + CSS" الجاية.</div>
    <div class="en">🇬🇧 Everything you learned here (Selectors, Box Model, Flexbox, Grid) is exactly the toolset you'll use to build the real Pricing Card and Navbar in the next "HTML + CSS Practice Projects" stage.</div>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>Selectors: Element &lt; Class &lt; ID في قوة الأولوية (Specificity).</li>
        <li>Box Model: Content ثم Padding ثم Border ثم Margin.</li>
        <li>الألوان: name / hex / rgb. الخطوط: <code>font-family</code>, <code>font-size</code>, <code>font-weight</code>, <code>line-height</code>.</li>
        <li>Flexbox: <code>display:flex</code> + <code>justify-content</code> + <code>align-items</code> + <code>gap</code> لصف/عمود واحد.</li>
        <li>Grid: <code>display:grid</code> + <code>grid-template-columns</code> لتخطيطات صفوف وأعمدة معًا.</li>
    </ul>
</div>

<div class="nav-buttons">
    <a href="html.php">← المرحلة السابقة</a>
    <a href="html-css-projects.php">المرحلة الجاية / Next: HTML + CSS Projects →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
