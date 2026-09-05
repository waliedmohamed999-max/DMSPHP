<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'accessibility-basics';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'أساسيات إمكانية الوصول — Front-End Developer';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">المرحلة 16 / Stage 16</span>
<h1>أساسيات إمكانية الوصول <span class="ltr">Accessibility (a11y) Basics</span></h1>
<p class="subtitle">مش كل زوّار موقعك بيستخدموا ماوس، ومش كل حد بيقدر يشوف الشاشة بوضوح. لو موقعك مبني صح، هيشتغل مع لوحة المفاتيح بس، ومع قارئ الشاشة (Screen Reader)، ومع كل المستخدمين — من غير أي تعديل إضافي.</p>

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
    <div class="ar">🇪🇬 تفهم ليه HTML الدلالي (Semantic HTML) مهم، تعرف الفرق العملي بين <code>&lt;div&gt;</code> و<code>&lt;button&gt;</code> من ناحية إمكانية الوصول، تتعرف على <code>alt</code> النصوص البديلة، وتفهم أساسيات الـ ARIA وإزاي تستخدمها لما HTML العادي مش كفاية.</div>
    <div class="en">🇬🇧 Understand why Semantic HTML matters, know the practical accessibility difference between a <code>&lt;div&gt;</code> and a <code>&lt;button&gt;</code>, meet <code>alt</code> text, and learn ARIA basics for when plain HTML alone isn't enough.</div>
</div>

<h2>1) HTML الدلالي / Semantic HTML</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 HTML الدلالي معناه استخدام العنصر اللي معناه فعلًا بيطابق دوره: <code>&lt;nav&gt;</code> لقائمة التنقل، <code>&lt;main&gt;</code> للمحتوى الرئيسي، <code>&lt;button&gt;</code> لأي حاجة قابلة للضغط، <code>&lt;header&gt;</code>/<code>&lt;footer&gt;</code> لرأس وذيل الصفحة. المتصفح وقارئ الشاشة بيفهموا العناصر دي أوتوماتيك ويديوا المستخدم أدوات تنقل مبنية عليها (زي "اقفز للمحتوى الرئيسي" أو "اسرد كل الأزرار في الصفحة").</div>
    <div class="en">🇬🇧 Semantic HTML means using the element whose meaning actually matches its role: <code>&lt;nav&gt;</code> for navigation, <code>&lt;main&gt;</code> for the primary content, <code>&lt;button&gt;</code> for anything clickable, <code>&lt;header&gt;</code>/<code>&lt;footer&gt;</code> for the page's head and foot. Browsers and screen readers understand these elements automatically and give users navigation tools built on them (like "jump to main content" or "list every button on this page").</div>
</div>
<div class="bi-block">
    <div class="ar">🇪🇬 المقابل: لو بنيت كل حاجة بـ <code>&lt;div&gt;</code> بس (زرار، رابط، عنوان)، الصفحة ممكن تبان بصريًا مظبوطة، لكن قارئ الشاشة مش هيفهم إن الـ <code>&lt;div&gt;</code> ده "زرار" — هيقراه كـ نص عادي بس، ومستخدم لوحة المفاتيح مش هيقدر يوصله بـ <kbd>Tab</kbd> أصلًا. ده مش تفصيلة صغيرة — ده الفرق بين موقع يشتغل للجميع وموقع يقفل باب في وش ناس كتير.</div>
    <div class="en">🇬🇧 The flip side: if you build everything with just <code>&lt;div&gt;</code> (a button, a link, a heading), the page might look correct visually, but a screen reader won't understand that this <code>&lt;div&gt;</code> is a "button" — it'll just read it as plain text, and a keyboard user won't even be able to reach it with <kbd>Tab</kbd>. This isn't a small detail — it's the difference between a site that works for everyone and one that shuts the door on many people.</div>
</div>

<h2 id="understand">🧠 2) Div وهمي مقابل زرار حقيقي — جرّب بلوحة المفاتيح</h2>
<div class="flow-diagram">
    <div class="flow-box">Tab من لوحة المفاتيح</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">&lt;div onclick&gt; — متجاهَل، مش Focusable</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">&lt;button&gt; — بياخد Focus، شغال بـ Enter/Space</div>
</div>
<div class="bi-block">
    <div class="ar">🇪🇬 جرّب الإطار تحت: اضغط جوّاه بالماوس مرة واحدة (عشان يبقى هو المُركَّز)، وبعدين اضغط <kbd>Tab</kbd> بلوحة المفاتيح كذا مرة. هتلاحظ إن الـ Focus بيتنقّل للزرار الحقيقي وبيدوّر عليه إطار واضح (Focus Ring)، أما الـ "زرار" المبني بـ <code>&lt;div&gt;</code> فمش بياخد Focus خالص — لأنه أصلًا مش عنصر تفاعلي في نظر المتصفح، حتى لو شكله زي الزرار بالظبط.</div>
    <div class="en">🇬🇧 Try the frame below: click inside it once with your mouse (so it has focus), then press <kbd>Tab</kbd> on your keyboard a few times. Notice the focus moves to the real button and draws a clear focus ring around it, while the <code>&lt;div&gt;</code>-based "button" never receives focus at all — because the browser doesn't consider it an interactive element, even though it looks exactly like a button.</div>
</div>
<pre><code>&lt;!-- زرار وهمي: شكله زرار بس مش شغال بلوحة المفاتيح --&gt;
&lt;div class="fake-btn" onclick="doThing()"&gt;احفظ&lt;/div&gt;

&lt;!-- زرار حقيقي: Focusable تلقائيًا، وبيشتغل بـ Enter وSpace من غير أي كود إضافي --&gt;
&lt;button onclick="doThing()"&gt;احفظ&lt;/button&gt;</code></pre>
<h3>المعاينة الفعلية / Actual Rendered Output — اضغط جوّه ثم Tab</h3>
<iframe class="render-box" style="height:200px" sandbox="allow-scripts" srcdoc='<html><head><style>body{font-family:sans-serif;padding:16px}p{color:#666;font-size:13px;margin-top:0}.fake-btn,button{display:inline-block;background:#6c8bff;color:white;padding:10px 18px;border-radius:8px;border:none;cursor:pointer;font-size:14px;margin-inline-end:10px}#msg{margin-top:14px;font-weight:700;min-height:22px;color:#333}</style></head><body dir="rtl"><p>1) دوس هنا بالماوس، 2) دوس Tab كذا مرة، 3) جرب Enter/Space على العنصر اللي عليه Focus.</p><div class="fake-btn" id="fakeBtn">حفظ (div وهمي)</div><button id="realBtn">حفظ (button حقيقي)</button><div id="msg">...</div><script>var msg=document.getElementById("msg");document.getElementById("fakeBtn").addEventListener("click",function(){msg.textContent="اشتغل بالماوس بس — جرب توصله بـ Tab، مش هيحصل!";});document.getElementById("realBtn").addEventListener("click",function(){msg.textContent="اشتغل! ده شغال بالماوس وبالكيبورد (Tab ثم Enter أو Space) على حد سواء.";});<\/script></body></html>'></iframe>
<div class="bi-block">
    <div class="ar">🇪🇬 السبب التقني: المتصفح بيدّي <code>&lt;button&gt;</code>، <code>&lt;a href&gt;</code>، <code>&lt;input&gt;</code> وعناصر تانية قليلة خاصية "Focusable" ودعم لوحة مفاتيح تلقائي، لأنها عناصر HTML الدلالية المخصصة للتفاعل. الـ <code>&lt;div&gt;</code> عنصر عام مالوش أي معنى دلالي، فمحتاج تضيفله يدويًا <code>tabindex="0"</code> وكود لوحة مفاتيح وخاصية <code>role="button"</code> عشان يتقارب من سلوك الزرار الحقيقي — وده مجهود إضافي من غير أي فايدة، لما تقدر تستخدم <code>&lt;button&gt;</code> من الأول.</div>
    <div class="en">🇬🇧 The technical reason: browsers give <code>&lt;button&gt;</code>, <code>&lt;a href&gt;</code>, <code>&lt;input&gt;</code>, and a few other elements automatic focusability and keyboard support, because these are semantic HTML elements meant for interaction. A <code>&lt;div&gt;</code> is a generic element with no semantic meaning, so you'd have to manually add <code>tabindex="0"</code>, keyboard-handling code, and a <code>role="button"</code> just to approximate real button behavior — extra work for no benefit, when you could just use <code>&lt;button&gt;</code> from the start.</div>
</div>

<h2 id="practice">💻 3) نصوص alt البديلة / Alt Text</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 كل <code>&lt;img&gt;</code> لازم يكون معاه <code>alt</code>. لو الصورة معلوماتية (شعار، صورة منتج، رسم بياني)، الـ <code>alt</code> لازم يوصفها وصف مفيد. لو الصورة زخرفية بحتة ومالهاش معنى (خط فاصل، خلفية)، تسيب <code>alt=""</code> فاضي عمدًا عشان قارئ الشاشة يتخطاها بدل ما يقرا اسم ملف مالوش معنى.</div>
    <div class="en">🇬🇧 Every <code>&lt;img&gt;</code> needs an <code>alt</code>. If the image carries information (a logo, a product photo, a chart), the <code>alt</code> should meaningfully describe it. If the image is purely decorative (a divider line, a background flourish), leave <code>alt=""</code> intentionally empty so screen readers skip it instead of reading a meaningless filename.</div>
</div>
<h3>المعاينة الفعلية / Actual Rendered Output — الصورتين مكسورتين عمدًا (src وهمي)</h3>
<iframe class="render-box" style="height:200px" sandbox srcdoc='<html><head><style>body{font-family:sans-serif;padding:16px}.row{margin-bottom:16px}img{border:1px dashed #ccc;min-height:40px;min-width:60px}p{font-size:13px;color:#666;margin:6px 0 0}</style></head><body dir="rtl"><div class="row"><img src="does-not-exist-1.jpg" alt=""><p>⬆ <code>alt=""</code> فاضي — قارئ الشاشة بيتخطاها تمامًا، والمتصفح مبيحطش نص بديل جنب أيقونة الكسر.</p></div><div class="row"><img src="does-not-exist-2.jpg" alt="شعار Sila: دائرة زرقاء فيها الحرف S بخط أبيض"><p>⬆ <code>alt</code> وصفي — حتى لو الصورة معلقة أو المستخدم مكفوف، هيعرف بالظبط الصورة دي إيه.</p></div></body></html>'></iframe>
<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ إن الصورتين هنا اتعملتلهم مسار وهمي عمدًا عشان يفشلوا في التحميل (زي ما بيحصل مع أي صورة بطيئة أو رابط باظ)، عشان توضح الفرق. المتصفح بيعرض نص الـ <code>alt</code> مكان الصورة الفاشلة، وقارئ الشاشة بيعتمد على نفس النص ده — بغضّ النظر إن الصورة اتحمّلت ولا لأ.</div>
    <div class="en">🇬🇧 Notice both images were intentionally pointed at a fake path so they fail to load (like any slow image or broken link) to make the difference visible. Browsers display the <code>alt</code> text in place of the failed image, and screen readers rely on that same text — regardless of whether the image ever loaded.</div>
</div>

<h2>4) ARIA — لما HTML العادي مش كفاية</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 ARIA (Accessible Rich Internet Applications) عبارة عن مجموعة خصائص HTML (زي <code>aria-label</code>، <code>aria-expanded</code>، <code>aria-hidden</code>) بتضيف معلومات إضافية لقارئ الشاشة لما HTML الدلالي العادي مش كفاية — مثلًا زرار "طيّ/فتح" قسم معيّن. القاعدة الذهبية: <b>استخدم HTML الدلالي أولًا، وARIA بس لما محتاج فعلًا</b> — ARIA غلط أسوأ من عدم وجود ARIA خالص.</div>
    <div class="en">🇬🇧 ARIA (Accessible Rich Internet Applications) is a set of HTML attributes (like <code>aria-label</code>, <code>aria-expanded</code>, <code>aria-hidden</code>) that add extra information for screen readers when plain semantic HTML isn't enough — for example, a button that expands or collapses a section. The golden rule: <b>reach for semantic HTML first, and use ARIA only when you actually need it</b> — wrong ARIA is worse than no ARIA at all.</div>
</div>
<pre><code>&lt;button id="toggleBtn" aria-expanded="false" aria-controls="panel"&gt;
    إظهار التفاصيل ▾
&lt;/button&gt;
&lt;div id="panel" hidden&gt;هنا التفاصيل المخفية...&lt;/div&gt;

&lt;script&gt;
toggleBtn.addEventListener("click", function () {
    const isOpen = toggleBtn.getAttribute("aria-expanded") === "true";
    toggleBtn.setAttribute("aria-expanded", String(!isOpen));
    panel.hidden = isOpen;
});
&lt;/script&gt;</code></pre>
<div class="bi-block">
    <div class="ar">🇪🇬 <code>aria-expanded="true/false"</code> بيقول لقارئ الشاشة إن الزرار ده بيتحكم في عنصر ممكن يتفتح أو يتقفل، وحالته دلوقتي إيه. <code>aria-controls="panel"</code> بيربط الزرار بالعنصر اللي بيتحكم فيه. المستخدم اللي بيشوف الشاشة بيعتمد على الشكل البصري (السهم بيتقلب، القسم بيظهر)، والمستخدم اللي بيسمع قارئ شاشة بيعتمد على نفس المعلومة دي منطوقة.</div>
    <div class="en">🇬🇧 <code>aria-expanded="true/false"</code> tells a screen reader that this button controls something that can open or close, and what its current state is. <code>aria-controls="panel"</code> links the button to the element it controls. A sighted user relies on the visual cue (the arrow flips, the section appears), and a screen reader user relies on the same information spoken aloud.</div>
</div>
<h3>المعاينة الفعلية / Actual Rendered Output — زرار ARIA حقيقي وشغال</h3>
<iframe class="render-box" style="height:150px" sandbox="allow-scripts" srcdoc='<html><head><style>body{font-family:sans-serif;padding:16px}button{background:#35d0ba;color:white;border:none;padding:10px 18px;border-radius:8px;cursor:pointer;font-size:14px}#panel{margin-top:12px;background:#f2f2f2;border-radius:8px;padding:12px;font-size:14px}</style></head><body dir="rtl"><button id="toggleBtn" aria-expanded="false" aria-controls="panel">إظهار التفاصيل ▾</button><div id="panel" hidden>هنا التفاصيل المخفية — قارئ الشاشة قال "expanded" لما فتحت، و"collapsed" لما قفلت.</div><script>var toggleBtn=document.getElementById("toggleBtn");var panel=document.getElementById("panel");toggleBtn.addEventListener("click",function(){var isOpen=toggleBtn.getAttribute("aria-expanded")==="true";toggleBtn.setAttribute("aria-expanded",String(!isOpen));panel.hidden=isOpen;toggleBtn.textContent=isOpen?"إظهار التفاصيل ▾":"إخفاء التفاصيل ▴";});<\/script></body></html>'></iframe>
<div class="bi-block">
    <div class="ar">🇪🇬 جرّب بنفسك: اضغط الزرار كذا مرة وشوف <code>aria-expanded</code> بيتبدّل بين <code>true</code> و<code>false</code> (افتح أدوات المطوّر وشوف الـ Attribute بيتغيّر فعليًا في الـ Elements tab)، ونص الزرار بيتغيّر معاه بين "إظهار" و"إخفاء".</div>
    <div class="en">🇬🇧 Try it yourself: click the button a few times and watch <code>aria-expanded</code> flip between <code>true</code> and <code>false</code> (open DevTools and watch the attribute actually change in the Elements tab), with the button's own text switching between "Show" and "Hide".</div>
</div>
<div class="mini-fe-editor">
    <div class="fe-tabs">
        <button class="fe-tab active" data-tab="html">HTML</button>
        <button class="fe-tab" data-tab="js">JS</button>
    </div>
    <textarea class="fe-code" data-tab="html" spellcheck="false">&lt;button id="toggleBtn" aria-expanded="false" aria-controls="panel"&gt;
    إظهار الشروط ▾
&lt;/button&gt;
&lt;div id="panel" hidden style="margin-top:10px;background:#eee;padding:10px;border-radius:6px"&gt;
    الشروط والأحكام الكاملة هنا...
&lt;/div&gt;</textarea>
    <textarea class="fe-code" data-tab="js" style="display:none" spellcheck="false">const toggleBtn = document.getElementById("toggleBtn");
const panel = document.getElementById("panel");

toggleBtn.addEventListener("click", function () {
    const isOpen = toggleBtn.getAttribute("aria-expanded") === "true";
    toggleBtn.setAttribute("aria-expanded", String(!isOpen));
    panel.hidden = isOpen;
    toggleBtn.textContent = isOpen ? "إظهار الشروط ▾" : "إخفاء الشروط ▴";
});</textarea>
    <iframe class="render-box mini-fe-preview" style="height:150px" sandbox="allow-scripts"></iframe>
</div>

<div class="exercise-box">
    <h3>✍️ تمرين عملي / Hands-on Exercise</h3>
    <div class="ar">🇪🇬 في <a href="../playground/index.php">محرر الكود</a>، ارجع لمشروع البورتفوليو بتاعك وافحصه: هل الـ Navigation جوه <code>&lt;nav&gt;</code>؟ هل كل الأزرار <code>&lt;button&gt;</code> حقيقية؟ هل كل الصور معاها <code>alt</code> مناسب؟ صلّح أي حاجة ناقصة.</div>
    <div class="en">🇬🇧 In the <a href="../playground/index.php">Playground</a>, go back to your portfolio project and audit it: is your navigation inside a <code>&lt;nav&gt;</code>? Are all your buttons real <code>&lt;button&gt;</code> elements? Does every image have a proper <code>alt</code>? Fix anything missing.</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="no">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">عملت زرار بـ <code>&lt;div onclick="..."&gt;</code> من غير <code>tabindex</code>. المستخدم اللي بيستخدم لوحة المفاتيح بس، هل يقدر يوصله بـ Tab؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">You built a button with <code>&lt;div onclick="..."&gt;</code> and no <code>tabindex</code>. Can a keyboard-only user reach it with Tab?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="yes"> أيوه، أي عنصر عليه onclick بيبقى Focusable أوتوماتيك</label>
        <label><input type="radio" name="q1" value="no"> لأ، الـ div عنصر عام مش Focusable افتراضيًا</label>
        <label><input type="radio" name="q1" value="sometimes"> بس في متصفح Chrome</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="empty">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">عندك صورة زخرفية بحتة (خط فاصل) مالهاش أي معنى معلوماتي. إيه الأنسب لـ <code>alt</code>؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">You have a purely decorative image (a divider line) with no informational meaning. What's the right <code>alt</code>?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="filename"> alt="divider-line-2023-final.jpg"</label>
        <label><input type="radio" name="q2" value="empty"> alt="" فاضي عمدًا</label>
        <label><input type="radio" name="q2" value="skip"> تمسح الـ alt خالص من العنصر</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="state">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">زرار بيفتح ويقفل قسم في الصفحة. أنهي خاصية ARIA بتوصف حالته الحالية (مفتوح ولا مقفول) لقارئ الشاشة؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">A button opens and closes a section. Which ARIA attribute describes its current state (open or closed) to a screen reader?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="hidden"> aria-hidden</label>
        <label><input type="radio" name="q3" value="state"> aria-expanded</label>
        <label><input type="radio" name="q3" value="label"> aria-label فقط</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="semantic">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">القاعدة الذهبية في استخدام ARIA إيه؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What's the golden rule for using ARIA?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="always"> حط ARIA على كل عنصر عشان تضمن إمكانية الوصول</label>
        <label><input type="radio" name="q4" value="semantic"> استخدم HTML الدلالي أولًا، وARIA بس لما محتاج فعلًا</label>
        <label><input type="radio" name="q4" value="never"> متستخدمش ARIA خالص، هي قديمة</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ قائمة أسئلة شائعة قابلة للطي / An Accessible FAQ Accordion</h3>
    <div class="ar">🇪🇬 استخدم <a href="../playground/index.php">محرر الكود</a> (أو المحرر المصغّر فوق) وابني قائمة أسئلة شائعة (FAQ): 3 أسئلة، كل واحد زرار حقيقي بـ <code>aria-expanded</code> بيفتح ويقفل إجابته. اختبر النتيجة بلوحة المفاتيح بس (من غير ماوس خالص) وتأكد إنك تقدر توصل لكل الأسئلة بـ Tab وتفتحها بـ Enter.</div>
    <div class="en">🇬🇧 Use the <a href="../playground/index.php">Playground</a> (or the mini editor above) and build a FAQ accordion: 3 questions, each a real button with <code>aria-expanded</code> that opens and closes its answer. Test the result using only your keyboard (no mouse at all) and confirm you can reach every question with Tab and open it with Enter.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 إمكانية الوصول مش مرحلة إضافية تضيفها في الآخر — هي عادة بتتبني من أول سطر HTML بتكتبه. كل مشروع عملته في المسار ده (البورتفوليو، To-Do List، بطاقات Vue) ممكن ترجعله دلوقتي وتفحصه بنفس المعايير اللي اتعلمتها هنا. في مرحلة "أدوات المطوّر" الجاية، هتتعلم تستخدم الـ Console والـ Elements tab عشان تكتشف مشاكل زي دي بنفسك.</div>
    <div class="en">🇬🇧 Accessibility isn't an extra stage you bolt on at the end — it's a habit built from the first line of HTML you write. Every project in this track (the portfolio, the To-Do List, the Vue cards) can now be revisited and audited against what you learned here. In the next "Browser DevTools" stage, you'll learn to use the Console and Elements tab to catch issues like these yourself.</div>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>HTML الدلالي (<code>&lt;nav&gt;</code>, <code>&lt;main&gt;</code>, <code>&lt;button&gt;</code>) بيدّي معنى ووظيفة أوتوماتيك للمتصفح وقارئ الشاشة.</li>
        <li><code>&lt;div onclick&gt;</code> مش Focusable ومش شغال بلوحة المفاتيح — استخدم <code>&lt;button&gt;</code> دايمًا لأي عنصر قابل للضغط.</li>
        <li>كل <code>&lt;img&gt;</code> يحتاج <code>alt</code>: وصف مفيد للصور المعلوماتية، أو <code>alt=""</code> فاضي عمدًا للصور الزخرفية.</li>
        <li>ARIA (زي <code>aria-expanded</code>) بتضيف معلومة لقارئ الشاشة لما HTML العادي مش كفاية — لكنها مكمّلة، مش بديلة عن HTML الدلالي.</li>
    </ul>
</div>

<div class="nav-buttons">
    <a href="fetch-async-js.php">← المرحلة السابقة</a>
    <a href="devtools-debugging.php">المرحلة الجاية / Next: Browser DevTools →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
