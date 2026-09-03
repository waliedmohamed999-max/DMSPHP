<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'responsive';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'تصميم متجاوب بدون إطار عمل — Front-End Developer';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">المرحلة 8 / Stage 8</span>
<h1>تصميم متجاوب بدون إطار عمل <span class="ltr">Responsive Design from Scratch</span></h1>
<p class="subtitle">"Responsive" يعني إن نفس الصفحة تتصرف كويس على أي حجم شاشة — من موبايل صغير لشاشة ديسكتوب كبيرة — من غير ما تحتاج تعمل صفحتين منفصلتين.</p>

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
    <div class="ar">🇪🇬 تفهم Media Queries عشان تغيّر التنسيق حسب عرض الشاشة، وتفهم الوحدات النسبية (<code>%</code>, <code>vw</code>, <code>rem</code>) عشان تتجنب الأحجام الثابتة اللي بتتكسر على شاشات مختلفة.</div>
    <div class="en">🇬🇧 Understand Media Queries to change styling based on screen width, and understand relative units (<code>%</code>, <code>vw</code>, <code>rem</code>) to avoid fixed sizes that break on different screens.</div>
</div>

<h2 id="understand">🧠 1) Media Queries — تنسيق حسب عرض الشاشة</h2>
<div class="flow-diagram">
    <div class="flow-box">Browser Checks Screen Width</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">Width Matches @media Condition?</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">Apply Rules Inside It</div>
</div>
<div class="bi-block">
    <div class="ar">🇪🇬 <code>@media (max-width: 600px) { ... }</code> بيقول لـ CSS: "طبّق القواعد دي بس لو عرض الشاشة 600px أو أقل". بكده تقدر تعمل تخطيط (صفوف Flexbox مثلًا) على الشاشات الكبيرة، ويتحول لعمود واحد تلقائيًا على الموبايل.</div>
    <div class="en">🇬🇧 <code>@media (max-width: 600px) { ... }</code> tells CSS: "apply these rules only when the screen is 600px wide or less". This lets a Flexbox row layout on large screens automatically collapse into a single column on mobile.</div>
</div>

<h2>2) الوحدات النسبية / Relative Units</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <code>%</code> نسبة من العنصر الأب. <code>vw</code> نسبة من عرض الشاشة كلها (<code>1vw</code> = 1% من عرض الـ viewport) — مفيدة لعناوين بتكبر وتصغر مع الشاشة. <code>rem</code> نسبة من حجم خط العنصر الجذر (<code>html</code>)، مفيدة عشان كل أحجام النصوص تكبر مع بعض لو المستخدم غيّر إعداد حجم الخط في المتصفح.</div>
    <div class="en">🇬🇧 <code>%</code> is relative to the parent element. <code>vw</code> is relative to the entire viewport width (<code>1vw</code> = 1% of viewport width) — useful for headings that scale with the screen. <code>rem</code> is relative to the root (<code>html</code>) font size, useful so all text sizes scale together if the user changes their browser's font-size setting.</div>
</div>

<h2 id="practice">💻 3) شوف الفرق بعينك / See the Difference Live</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 نفس ملف HTML+CSS بالظبط هنعرضه دلوقتي جوه Iframe عرضه 375px (زي شاشة موبايل)، وبعدين جوه Iframe عرضه 800px (زي شاشة ديسكتوب) — عشان تشوف بعينك إزاي نفس الكود بيتصرف مختلف حسب العرض، من غير ما نغيّر سطر واحد.</div>
    <div class="en">🇬🇧 The exact same HTML+CSS file is shown below inside a 375px-wide iframe (like a mobile screen), then inside an 800px-wide iframe (like a desktop screen) — so you can see with your own eyes how the identical code behaves differently based on width, without changing a single line.</div>
</div>
<pre><code>&lt;div class="cards"&gt;
    &lt;div class="card"&gt;1&lt;/div&gt;
    &lt;div class="card"&gt;2&lt;/div&gt;
    &lt;div class="card"&gt;3&lt;/div&gt;
&lt;/div&gt;
&lt;h2 class="hero-text"&gt;عنوان متجاوب&lt;/h2&gt;</code></pre>
<pre><code>.cards {
    display: flex;
    gap: 12px;
}
.card {
    flex: 1;
    background: #6c8bff;
    color: white;
    padding: 20px;
    text-align: center;
    border-radius: 8px;
}
.hero-text {
    font-size: 6vw;      /* بيكبر ويصغر مع عرض الشاشة */
    text-align: center;
}

/* من غير الـ media query، الكروت كانت هتفضل صف واحد وتتزنق على الموبايل */
@media (max-width: 600px) {
    .cards { flex-direction: column; }
}</code></pre>

<h3>المعاينة على عرض موبايل — 375px / Mobile width preview</h3>
<iframe class="render-box" style="width:375px;height:340px" sandbox srcdoc='<html><head><style>body{font-family:sans-serif;margin:0;padding:16px;box-sizing:border-box}.cards{display:flex;gap:12px}.card{flex:1;background:#6c8bff;color:white;padding:20px;text-align:center;border-radius:8px}.hero-text{font-size:6vw;text-align:center}@media (max-width:600px){.cards{flex-direction:column}}</style></head><body dir="rtl"><div class="cards"><div class="card">1</div><div class="card">2</div><div class="card">3</div></div><h2 class="hero-text">عنوان متجاوب</h2></body></html>'></iframe>

<h3>المعاينة على عرض تابلت — 768px / Tablet width preview</h3>
<iframe class="render-box" style="width:768px;height:210px" sandbox srcdoc='<html><head><style>body{font-family:sans-serif;margin:0;padding:16px;box-sizing:border-box}.cards{display:flex;gap:12px}.card{flex:1;background:#6c8bff;color:white;padding:20px;text-align:center;border-radius:8px}.hero-text{font-size:6vw;text-align:center}@media (max-width:600px){.cards{flex-direction:column}}</style></head><body dir="rtl"><div class="cards"><div class="card">1</div><div class="card">2</div><div class="card">3</div></div><h2 class="hero-text">عنوان متجاوب</h2></body></html>'></iframe>

<h3>المعاينة على عرض ديسكتوب — 800px / Desktop width preview</h3>
<iframe class="render-box" style="width:800px;height:230px" sandbox srcdoc='<html><head><style>body{font-family:sans-serif;margin:0;padding:16px;box-sizing:border-box}.cards{display:flex;gap:12px}.card{flex:1;background:#6c8bff;color:white;padding:20px;text-align:center;border-radius:8px}.hero-text{font-size:6vw;text-align:center}@media (max-width:600px){.cards{flex-direction:column}}</style></head><body dir="rtl"><div class="cards"><div class="card">1</div><div class="card">2</div><div class="card">3</div></div><h2 class="hero-text">عنوان متجاوب</h2></body></html>'></iframe>
<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ الثلاثة مع بعض: نفس ملف الـ HTML/CSS بالظبط في الثلاثة. عند 375px الكروت بقت عمود واحد (بسبب الـ Media Query) والعنوان أصغر (بسبب <code>vw</code>). عند 768px (تابلت) — العرض بقى أعلى من نقطة الـ <code>600px</code> اللي حددناها في الـ <code>@media</code>، فالكروت رجعت صف واحد بالفعل رغم إن الشاشة لسه مش ديسكتوب كامل. عند 800px الصف بقى أوسع والعنوان أكبر شوية بفضل <code>vw</code>. الدرس المهم هنا: نقطة التوقف (Breakpoint) اللي اخترتها (<code>600px</code>) هي اللي بتحدد فعليًا وقت التبديل، مش حجم الشاشة الفعلي (موبايل/تابلت/ديسكتوب) — ولو التابلت كان بعرض أصغر من 600px كان هياخد تخطيط الموبايل بدل كده.</div>
    <div class="en">🇬🇧 Compare all three: it is the exact same HTML/CSS file. At 375px the cards stack into one column (the Media Query) and the heading is smaller (<code>vw</code>). At 768px (tablet) the width is already above our <code>600px</code> breakpoint, so the cards are already back to a single row even though this isn't a full desktop screen. At 800px the row is a bit wider and the heading slightly bigger thanks to <code>vw</code>. The key lesson: the breakpoint you choose (<code>600px</code>) is what actually decides when the layout switches, not the device category (mobile/tablet/desktop) — if the tablet were narrower than 600px, it would get the mobile layout instead.</div>
</div>

<div class="bi-block">
    <div class="ar">🇪🇬 جرّب بنفسك: عدّل رقم <code>600px</code> في الـ <code>@media</code>، أو غيّر <code>6vw</code> لقيمة تانية، وشوف تأثير التغيير على المعاينة (عرضها ثابت هنا، لكن جرّب برضو تصغّر نافذة المتصفح نفسه وأنت في محرر الكود الكامل).</div>
    <div class="en">🇬🇧 Try it yourself: change the <code>600px</code> number in the <code>@media</code> rule, or change <code>6vw</code> to a different value, and see the effect (this preview has a fixed width, but also try shrinking your actual browser window while in the full Playground).</div>
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
&lt;/div&gt;
&lt;h2 class="hero-text"&gt;عنوان متجاوب&lt;/h2&gt;</textarea>
    <textarea class="fe-code" data-tab="css" style="display:none" spellcheck="false">body { font-family: sans-serif; margin: 0; padding: 16px; box-sizing: border-box; }
.cards { display: flex; gap: 12px; }
.card { flex: 1; background: #6c8bff; color: white; padding: 20px; text-align: center; border-radius: 8px; }
.hero-text { font-size: 6vw; text-align: center; }

@media (max-width: 600px) {
    .cards { flex-direction: column; }
}</textarea>
    <iframe class="render-box mini-fe-preview" style="height:260px" sandbox></iframe>
</div>

<div class="exercise-box">
    <h3>✍️ تمرين عملي / Hands-on Exercise</h3>
    <div class="ar">🇪🇬 ارجع لبطاقة السعر (Pricing Card) اللي عملتها في مرحلة المشاريع، وحطها جوه Iframe (أو جرب في محرر الكود وصغّر نافذة المتصفح يدويًا) وأضفلها <code>@media (max-width: 500px)</code> بيقلل الـ padding وحجم الخط عشان تناسب شاشة صغيرة.</div>
    <div class="en">🇬🇧 Go back to the Pricing Card from the projects stage, and add <code>@media (max-width: 500px)</code> that reduces its padding and font size so it fits a small screen — test by manually shrinking your browser window in the Playground.</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="below">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question"><code>@media (max-width: 600px)</code> بتطبّق القواعد جواها إمتى؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">When does <code>@media (max-width: 600px)</code> apply its rules?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="above"> لما الشاشة أعرض من 600px</label>
        <label><input type="radio" name="q1" value="below"> لما الشاشة 600px أو أقل</label>
        <label><input type="radio" name="q1" value="always"> دايمًا بغض النظر عن العرض</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="viewport">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">الوحدة <code>vw</code> نسبة لإيه بالظبط؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What exactly is the <code>vw</code> unit relative to?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="parent"> العنصر الأب</label>
        <label><input type="radio" name="q2" value="viewport"> عرض الشاشة (viewport) كله</label>
        <label><input type="radio" name="q2" value="root"> حجم خط عنصر html</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="breakpoint">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">تابلت عرضه 768px مع <code>@media (max-width: 600px)</code>. هل هيتطبق تخطيط العمود الواحد عليه؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">A 768px-wide tablet with <code>@media (max-width: 600px)</code> — does the single-column layout apply to it?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="yes"> أيوه، لأنه تابلت مش ديسكتوب</label>
        <label><input type="radio" name="q3" value="breakpoint"> لأ، لأن 768px أكبر من نقطة التوقف 600px</label>
        <label><input type="radio" name="q3" value="always"> أيوه دايمًا بغض النظر عن العرض</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="device">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">إيه اللي بيحدد فعليًا وقت تبديل التخطيط في Responsive Design؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What actually decides when a layout switches in Responsive Design?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="device"> نوع الجهاز نفسه (موبايل/تابلت/ديسكتوب)</label>
        <label><input type="radio" name="q4" value="breakpoint"> نقطة التوقف (Breakpoint) المحددة في الـ @media، بغض النظر عن نوع الجهاز</label>
        <label><input type="radio" name="q4" value="browser"> اسم المتصفح المستخدَم</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ خلّي بطاقة البروفايل متجاوبة / Make the Profile Card Responsive</h3>
    <div class="ar">🇪🇬 ارجع لبطاقة البروفايل اللي عملتها في مرحلة CSS، وأضفلها <code>@media (max-width: 480px)</code> بتقلل الـ padding، تصغّر حجم الخط، وتحوّل أي Grid من 3 أعمدة لعمود واحد. جرّب في <a href="../playground/index.php">محرر الكود</a> وصغّر نافذة المتصفح فعليًا للتأكد.</div>
    <div class="en">🇬🇧 Go back to the Profile Card you built in the CSS stage, and add <code>@media (max-width: 480px)</code> that reduces padding, shrinks the font size, and turns any 3-column Grid into a single column. Test it in the <a href="../playground/index.php">Playground</a> by actually shrinking your browser window.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 فهم Media Queries والوحدات النسبية من الصفر هو اللي هيخليك تفهم إزاي أطر العمل زي Bootstrap وTailwind بيعملوا الـ Responsive Design جاهز أوتوماتيك في مرحلة "أطر العمل" الجاية — هتشوف نفس الأفكار دي بس متغلفة في classes جاهزة بدل ما تكتبها بنفسك.</div>
    <div class="en">🇬🇧 Understanding Media Queries and relative units from scratch is exactly what lets you understand how frameworks like Bootstrap and Tailwind provide Responsive Design out of the box in the next "Frameworks" stage — you'll see these same ideas, just wrapped in ready-made classes instead of writing them yourself.</div>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li><code>@media (max-width: Xpx) { ... }</code> = قواعد CSS تتفعّل بس تحت عرض معين.</li>
        <li><code>%</code> نسبة من الأب، <code>vw</code> نسبة من عرض الشاشة، <code>rem</code> نسبة من خط العنصر الجذر.</li>
        <li>أفضل طريقة تتأكد إن تصميمك متجاوب فعلًا: جرّبه على أعراض مختلفة فعليًا (زي الـ Iframes اللي فوق أو تصغير نافذة المتصفح).</li>
    </ul>
</div>

<div class="nav-buttons">
    <a href="js-project.php">← المرحلة السابقة</a>
    <a href="frameworks.php">المرحلة الجاية / Next: Frameworks →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
