<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'frameworks';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'أطر العمل: Bootstrap وTailwind — Front-End Developer';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">المرحلة 9 / Stage 9</span>
<h1>أطر العمل: Bootstrap وTailwind <span class="ltr">Frameworks: Bootstrap &amp; Tailwind</span></h1>
<p class="subtitle">دلوقتي وانت فاهم CSS كويس، هتشوف إزاي أطر العمل الجاهزة بتوفرلك وقت كبير — بدل ما تكتب كل تنسيق من الصفر، بتستخدم كلاسات أو مكوّنات جاهزة ومُختبرة.</p>

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
    <div class="ar">🇪🇬 تفهم الفرق بين فلسفة Bootstrap (مكوّنات جاهزة الشكل زي أزرار وكروت) وفلسفة Tailwind (كلاسات صغيرة لكل خاصية CSS تجمعها بنفسك)، وتقدر تستخدم الاتنين في أمثلة حقيقية.</div>
    <div class="en">🇬🇧 Understand the difference between Bootstrap's philosophy (ready-styled components like buttons and cards) and Tailwind's philosophy (tiny utility classes per CSS property that you compose yourself), and use both in real examples.</div>
</div>

<h2 id="understand">🧠 1) Bootstrap — مكوّنات جاهزة</h2>
<div class="flow-diagram">
    <div class="flow-box">Add CDN &lt;link&gt;</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">Use Ready Classes (.card, .btn)</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">Polished Result — No Custom CSS</div>
</div>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>Bootstrap</b> بيديك مكوّنات كاملة الشكل زي <code>.btn</code>, <code>.card</code>, <code>.container</code> — بتحطهم وهما شكلهم جاهز واحترافي على طول. بتضيفه بـ CDN: رابط CSS في الـ <code>&lt;head&gt;</code>، وممكن رابط JS لو محتاج مكوّنات تفاعلية (Modals, Dropdowns).</div>
    <div class="en">🇬🇧 <b>Bootstrap</b> gives you fully-styled components like <code>.btn</code>, <code>.card</code>, <code>.container</code> — you drop them in and they already look polished and professional. You add it via CDN: a CSS link in <code>&lt;head&gt;</code>, plus optionally a JS link for interactive components (Modals, Dropdowns).</div>
</div>
<pre><code>&lt;head&gt;
    &lt;link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"&gt;
&lt;/head&gt;
&lt;body&gt;
    &lt;div class="card" style="width: 16rem;"&gt;
        &lt;div class="card-body"&gt;
            &lt;h5 class="card-title"&gt;بطاقة Bootstrap&lt;/h5&gt;
            &lt;p class="card-text"&gt;مكوّن جاهز الشكل من غير ما تكتب CSS بنفسك.&lt;/p&gt;
            &lt;button class="btn btn-primary"&gt;اضغط هنا&lt;/button&gt;
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/body&gt;</code></pre>
<h3>المعاينة الفعلية / Actual Rendered Output</h3>
<iframe class="render-box" style="height:200px" sandbox="allow-scripts" srcdoc='<html><head><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"><style>body{padding:16px}</style></head><body><div class="card" style="width:16rem;"><div class="card-body"><h5 class="card-title">بطاقة Bootstrap</h5><p class="card-text">مكوّن جاهز الشكل من غير ما تكتب CSS بنفسك.</p><button class="btn btn-primary">اضغط هنا</button></div></div></body></html>'></iframe>
<div class="bi-block">
    <div class="en">🇬🇧 This preview loads the real Bootstrap 5.3.3 CSS from jsDelivr's CDN in your own browser, exactly like a live website would.</div>
</div>

<h2 id="practice">💻 2) Tailwind — كلاسات مساعدة (Utility Classes)</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>Tailwind</b> فلسفته مختلفة: مفيش مكوّنات جاهزة، بس عندك كلاس صغير لكل خاصية CSS (<code>bg-blue-500</code> للخلفية، <code>p-4</code> للـ padding، <code>rounded-lg</code> للحواف) وبتجمعهم على العنصر عشان توصل للشكل اللي عايزه. مرونة أعلى، لكن HTML بيبقى فيه كلاسات أكتر.</div>
    <div class="en">🇬🇧 <b>Tailwind</b> has a different philosophy: no ready-made components, just a tiny class per CSS property (<code>bg-blue-500</code> for background, <code>p-4</code> for padding, <code>rounded-lg</code> for corners) that you combine on an element to build the look you want. More flexible, but the HTML carries more classes.</div>
</div>
<pre><code>&lt;head&gt;
    &lt;script src="https://cdn.tailwindcss.com"&gt;&lt;/script&gt;
&lt;/head&gt;
&lt;body&gt;
    &lt;div class="max-w-xs bg-white shadow-lg rounded-xl p-5"&gt;
        &lt;h3 class="text-lg font-bold text-slate-800"&gt;بطاقة Tailwind&lt;/h3&gt;
        &lt;p class="text-slate-500 text-sm mt-1"&gt;كل خاصية شكل عبارة عن كلاس صغير منفصل.&lt;/p&gt;
        &lt;button class="mt-3 bg-teal-500 hover:bg-teal-600 text-white px-4 py-2 rounded-lg"&gt;
            اضغط هنا
        &lt;/button&gt;
    &lt;/div&gt;
&lt;/body&gt;</code></pre>
<h3>المعاينة الفعلية / Actual Rendered Output</h3>
<iframe class="render-box" style="height:190px" sandbox="allow-scripts" srcdoc='<html><head><script src="https://cdn.tailwindcss.com"><\/script><style>body{padding:16px;font-family:sans-serif}</style></head><body><div class="max-w-xs bg-white shadow-lg rounded-xl p-5"><h3 class="text-lg font-bold text-slate-800">بطاقة Tailwind</h3><p class="text-slate-500 text-sm mt-1">كل خاصية شكل عبارة عن كلاس صغير منفصل.</p><button class="mt-3 bg-teal-500 hover:bg-teal-600 text-white px-4 py-2 rounded-lg">اضغط هنا</button></div></body></html>'></iframe>
<div class="bi-block">
    <div class="en">🇬🇧 This preview loads Tailwind's real Play CDN script, which compiles the utility classes to CSS live in your browser.</div>
</div>

<div class="bi-block">
    <div class="ar">🇪🇬 جرّب بنفسك: غيّر <code>bg-teal-500</code> لـ <code>bg-rose-500</code>، أو <code>rounded-xl</code> لـ <code>rounded-full</code>، أو زوّد <code>text-center</code> — كل كلاس بيتحكم في حاجة واحدة بس، ولاحظ إزاي الـ CDN بيترجمها لحظيًا كل ما تغيّر الكود.</div>
    <div class="en">🇬🇧 Try it yourself: change <code>bg-teal-500</code> to <code>bg-rose-500</code>, or <code>rounded-xl</code> to <code>rounded-full</code>, or add <code>text-center</code> — each class controls exactly one thing, and notice how the CDN compiles them live every time you edit.</div>
</div>
<div class="mini-fe-editor">
    <textarea class="fe-code" data-tab="html" spellcheck="false">&lt;script src="https://cdn.tailwindcss.com"&gt;&lt;/script&gt;
&lt;div class="max-w-xs bg-white shadow-lg rounded-xl p-5"&gt;
    &lt;h3 class="text-lg font-bold text-slate-800"&gt;بطاقة Tailwind&lt;/h3&gt;
    &lt;p class="text-slate-500 text-sm mt-1"&gt;كل خاصية شكل عبارة عن كلاس صغير منفصل.&lt;/p&gt;
    &lt;button class="mt-3 bg-teal-500 hover:bg-teal-600 text-white px-4 py-2 rounded-lg"&gt;
        اضغط هنا
    &lt;/button&gt;
&lt;/div&gt;</textarea>
    <iframe class="render-box mini-fe-preview" style="height:200px" sandbox="allow-scripts"></iframe>
</div>

<h2>3) مثال أعمق — Navbar متجاوب بـ Bootstrap / A Deeper Example: A Responsive Bootstrap Navbar</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 فاكر الـ Navbar اللي بنيته بإيدك بـ Flexbox في مرحلة المشاريع؟ Bootstrap بيديك نفس الفكرة، لكن مع تجاوب (Responsive) جاهز من غير ما تكتب <code>@media</code> بنفسك: كلاس <code>navbar-expand-sm</code> بيخلي الروابط صف أفقي بداية من عرض 576px، وتحت كده بيتحولوا تلقائيًا لقائمة همبرغر (☰) قابلة للطي — الزرار ده بيشتغل بمكتبة Bootstrap JS اللي بنضيفها من CDN كمان.</div>
    <div class="en">🇬🇧 Remember the Navbar you built by hand with Flexbox in the Projects stage? Bootstrap gives you the same idea, but with responsiveness built in — no <code>@media</code> needed: the <code>navbar-expand-sm</code> class keeps links in a horizontal row from 576px width upward, and automatically collapses them into a hamburger (☰) menu below that — that toggle button is powered by Bootstrap's JS, also loaded from a CDN.</div>
</div>
<pre><code>&lt;link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"&gt;

&lt;nav class="navbar navbar-expand-sm navbar-dark bg-dark"&gt;
    &lt;div class="container-fluid"&gt;
        &lt;a class="navbar-brand" href="#"&gt;🎨 سيلا&lt;/a&gt;
        &lt;button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navMenu"&gt;
            &lt;span class="navbar-toggler-icon"&gt;&lt;/span&gt;
        &lt;/button&gt;
        &lt;div class="collapse navbar-collapse" id="navMenu"&gt;
            &lt;ul class="navbar-nav ms-auto"&gt;
                &lt;li class="nav-item"&gt;&lt;a class="nav-link" href="#"&gt;الرئيسية&lt;/a&gt;&lt;/li&gt;
                &lt;li class="nav-item"&gt;&lt;a class="nav-link" href="#"&gt;الدورات&lt;/a&gt;&lt;/li&gt;
                &lt;li class="nav-item"&gt;&lt;a class="nav-link" href="#"&gt;تواصل معنا&lt;/a&gt;&lt;/li&gt;
            &lt;/ul&gt;
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/nav&gt;

&lt;script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"&gt;&lt;/script&gt;</code></pre>
<h3>المعاينة على عرض موبايل — 380px (مطوية) / Mobile width — 380px (collapsed)</h3>
<iframe class="render-box" style="width:380px;height:70px" sandbox="allow-scripts" srcdoc='<html><head><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"></head><body><nav class="navbar navbar-expand-sm navbar-dark bg-dark"><div class="container-fluid"><a class="navbar-brand" href="#">🎨 سيلا</a><button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu"><span class="navbar-toggler-icon"></span></button><div class="collapse navbar-collapse" id="navMenu"><ul class="navbar-nav ms-auto"><li class="nav-item"><a class="nav-link" href="#">الرئيسية</a></li><li class="nav-item"><a class="nav-link" href="#">الدورات</a></li><li class="nav-item"><a class="nav-link" href="#">تواصل معنا</a></li></ul></div></div></nav><script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"><\/script></body></html>'></iframe>

<h3>المعاينة على عرض أوسع — 700px (مبسوطة) / Wider — 700px (expanded)</h3>
<iframe class="render-box" style="width:700px;height:70px" sandbox="allow-scripts" srcdoc='<html><head><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"></head><body><nav class="navbar navbar-expand-sm navbar-dark bg-dark"><div class="container-fluid"><a class="navbar-brand" href="#">🎨 سيلا</a><button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu"><span class="navbar-toggler-icon"></span></button><div class="collapse navbar-collapse" id="navMenu"><ul class="navbar-nav ms-auto"><li class="nav-item"><a class="nav-link" href="#">الرئيسية</a></li><li class="nav-item"><a class="nav-link" href="#">الدورات</a></li><li class="nav-item"><a class="nav-link" href="#">تواصل معنا</a></li></ul></div></div></nav><script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"><\/script></body></html>'></iframe>
<div class="bi-block">
    <div class="ar">🇪🇬 نفس ملف الـ HTML بالظبط في الاثنين — الفرق الوحيد هو عرض الـ Iframe. عند 380px (أضيق من 576px) Bootstrap طوى الروابط جوه زرار الهمبرغر (☰) لوحده. عند 700px (أوسع من 576px) رجعوا صف أفقي كامل — كل ده من كلاس <code>navbar-expand-sm</code> واحد، من غير ما تكتب سطر <code>@media</code> واحد بنفسك. ده بالظبط الفرق بين إنك تكتب Responsive Design من الصفر (زي المرحلة السابقة) وإنك تاخده جاهز من framework.</div>
    <div class="en">🇬🇧 It is the exact same HTML file in both — only the iframe's width differs. At 380px (narrower than 576px) Bootstrap collapsed the links behind the hamburger (☰) on its own. At 700px (wider than 576px) they're back to a full horizontal row — all from one <code>navbar-expand-sm</code> class, with zero <code>@media</code> rules written by you. This is exactly the difference between writing Responsive Design from scratch (previous stage) and getting it ready-made from a framework.</div>
</div>

<div class="exercise-box">
    <h3>✍️ تمرين عملي / Hands-on Exercise</h3>
    <div class="ar">🇪🇬 في <a href="../playground/index.php">محرر الكود</a>، اعمل نفس بطاقة السعر (Pricing Card) اللي بنيتها بنفسك من قبل، مرة بكلاسات Bootstrap الجاهزة (<code>card</code>, <code>btn</code>)، ومرة تانية بكلاسات Tailwind (<code>rounded-xl</code>, <code>shadow-lg</code>, <code>bg-*</code>) — عشان تحس بالفرق بنفسك.</div>
    <div class="en">🇬🇧 In the <a href="../playground/index.php">Playground</a>, rebuild the Pricing Card you made earlier once using Bootstrap's ready classes (<code>card</code>, <code>btn</code>), and once using Tailwind utility classes (<code>rounded-xl</code>, <code>shadow-lg</code>, <code>bg-*</code>) — to feel the difference yourself.</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="bootstrap">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">أنهي framework بيديك مكوّنات كاملة الشكل زي <code>.card</code> و<code>.btn</code> جاهزين على طول؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Which framework gives you fully-styled ready components like <code>.card</code> and <code>.btn</code>?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="bootstrap"> Bootstrap</label>
        <label><input type="radio" name="q1" value="tailwind"> Tailwind</label>
        <label><input type="radio" name="q1" value="both"> ولا واحد فيهم</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="utility">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">فلسفة Tailwind قائمة على إيه بالظبط؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What is Tailwind's philosophy exactly based on?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="components"> مكوّنات كاملة الشكل جاهزة</label>
        <label><input type="radio" name="q2" value="utility"> كلاس صغير منفصل لكل خاصية CSS تجمعهم بنفسك</label>
        <label><input type="radio" name="q2" value="js"> مكتبة JavaScript فقط بدون CSS</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="collapse">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">Navbar بكلاس <code>navbar-expand-sm</code> بتتفتح على شاشة عرضها 400px بس. هيظهر إزاي؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">A Navbar with <code>navbar-expand-sm</code> opens on a 400px-wide screen. How does it appear?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="row"> صف أفقي كامل زي الديسكتوب</label>
        <label><input type="radio" name="q3" value="collapse"> مطوي جوه زرار همبرغر (☰)، لأن العرض أقل من نقطة توقف sm (576px)</label>
        <label><input type="radio" name="q3" value="hidden"> يختفي تمامًا من الصفحة</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="nomedia">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">إيه اللي وفّره عليك Bootstrap في الـ Navbar المتجاوب اللي شفته، مقارنة بمرحلة Responsive Design السابقة؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What did Bootstrap save you from writing in the responsive Navbar, compared to the previous Responsive Design stage?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="html"> كتابة أي HTML خالص</label>
        <label><input type="radio" name="q4" value="nomedia"> كتابة قواعد @media بنفسك — كلاس navbar-expand-sm عملها جاهزة</label>
        <label><input type="radio" name="q4" value="colors"> اختيار الألوان بس</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ ابني تنبيه (Alert) بكل framework / Build an Alert With Each Framework</h3>
    <div class="ar">🇪🇬 في <a href="../playground/index.php">محرر الكود</a> (أو المحرر المصغّر فوق للجزء الخاص بـ Tailwind)، ابني صندوق تنبيه (Alert) بلون تحذيري مرة بكلاسات Bootstrap الجاهزة (<code>alert</code>, <code>alert-warning</code>)، ومرة بكلاسات Tailwind (<code>bg-yellow-100</code>, <code>border</code>, <code>text-yellow-800</code>, <code>rounded-lg</code>, <code>p-4</code>).</div>
    <div class="en">🇬🇧 In the <a href="../playground/index.php">Playground</a> (or the mini editor above for the Tailwind part), build a warning-colored Alert box once using Bootstrap's ready classes (<code>alert</code>, <code>alert-warning</code>), and once using Tailwind classes (<code>bg-yellow-100</code>, <code>border</code>, <code>text-yellow-800</code>, <code>rounded-lg</code>, <code>p-4</code>).</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 في مشاريع حقيقية غالبًا مش بتستخدم Bootstrap أو Tailwind "زي ما هما" — بتخصصهم أو تنظّم متغيراتك (ألوان، أحجام) بلغة زي SASS، اللي هي موضوع المرحلة الجاية بالظبط.</div>
    <div class="en">🇬🇧 In real projects you rarely use Bootstrap or Tailwind exactly as-is — you customize them or organize your own variables (colors, sizes) with a language like SASS, which is exactly the next stage's topic.</div>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>Bootstrap = مكوّنات جاهزة الشكل (<code>.btn</code>, <code>.card</code>) — سريع، لكن أقل مرونة في التخصيص.</li>
        <li>Tailwind = كلاسات صغيرة لكل خاصية CSS تجمعها بنفسك — مرن جدًا، لكن HTML أطول.</li>
        <li>الاتنين بيتضافوا عادة بـ CDN: رابط <code>&lt;link&gt;</code> لـ Bootstrap، وسكريبت <code>&lt;script&gt;</code> لـ Tailwind.</li>
        <li><code>navbar-expand-sm</code> (أو md/lg) بيدّي Navbar متجاوب جاهز من غير كتابة @media بنفسك.</li>
        <li>معرفة CSS الأساسية (اللي اتعلمتها) هي اللي هتخليك تفهم وتتحكم في أي framework منهم صح.</li>
    </ul>
</div>

<div class="nav-buttons">
    <a href="responsive.php">← المرحلة السابقة</a>
    <a href="sass.php">المرحلة الجاية / Next: Learn SASS →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
