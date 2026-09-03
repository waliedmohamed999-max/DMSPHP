<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'setup';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'الأدوات والإعدادات — Front-End Developer';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">المرحلة 1 / Stage 1</span>
<h1>الأدوات والإعدادات <span class="ltr">Tools &amp; Setup</span></h1>
<p class="subtitle">قبل ما نكتب أول سطر HTML، خلّينا نجهّز المكان اللي هتشتغل فيه، ونرد على أهم الأسئلة اللي غالبًا في بالك دلوقتي.</p>

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
    <div class="ar">🇪🇬 تجهّز محرر كود مناسب، تتعرف على أهم اختصار هتستخدمه في حياتك كـ Front-End Developer (أدوات المطور في المتصفح)، وتبطّل قلق من كام سؤال شائع بيقلق أي مبتدئ.</div>
    <div class="en">🇬🇧 Set up a proper code editor, meet the single most-used tool in a Front-End Developer's life (browser DevTools), and put a few common beginner worries to rest.</div>
</div>

<h2>المحرر الموصى بيه / Recommended Editor</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 استخدم <b>Visual Studio Code</b> — مجاني وأشهر محرر في مجال الويب حاليًا. بعد ما تنزّله، ركّب الإضافتين دول من تبويب Extensions (المربعات الأربعة في الشريط الجانبي):</div>
    <div class="en">🇬🇧 Use <b>Visual Studio Code</b> — free, and the most widely used editor in web development today. After installing it, add these two extensions from the Extensions tab (the four squares icon in the sidebar):</div>
</div>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>Live Server</b>: بتشغّل صفحتك في المتصفح على سيرفر محلي صغير، وبتحدّث المعاينة أوتوماتيك كل ما تحفظ الملف — هتوفرلك مئات المرات اللي هتضغط فيها Refresh يدوي. <b>Prettier</b>: بينسّق الكود بتاعك تلقائيًا (مسافات، فواصل) عشان يبقى مرتب ومقروء زي أي مشروع احترافي.</div>
    <div class="en">🇬🇧 <b>Live Server</b>: runs your page on a small local server and auto-refreshes the preview every time you save — saves you hundreds of manual refreshes. <b>Prettier</b>: automatically formats your code (spacing, indentation) so it stays clean and readable like any professional project.</div>
</div>

<h2 id="understand">🧠 أدوات المطور في المتصفح / Browser DevTools</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 دوس <code>F12</code> أو دوس يمين على أي صفحة واختار "Inspect" — هيفتحلك DevTools. تبويب <b>Elements</b> بيوريك بنية الـ HTML الفعلية للصفحة والـ CSS المطبّق على كل عنصر، وتقدر تعدّل فيهم مباشرة (بشكل مؤقت، للتجربة بس) وتشوف النتيجة فورًا. تبويب <b>Console</b> بيوريك أخطاء الـ JavaScript ورسايل <code>console.log()</code> اللي هنستخدمها كتير في مرحلة الـ JavaScript.</div>
    <div class="en">🇬🇧 Press <code>F12</code> or right-click any page and choose "Inspect" to open DevTools. The <b>Elements</b> tab shows the page's actual HTML structure and the CSS applied to each element — you can edit them live (temporarily, for experimenting) and see the result instantly. The <b>Console</b> tab shows JavaScript errors and <code>console.log()</code> messages, which we'll use a lot in the JavaScript stage.</div>
</div>
<div class="bi-block">
    <div class="ar">🇪🇬 عادة يومية هتعملها آلاف المرات: تشوف حاجة في تصميم موقع عجباك؟ دوس يمين → Inspect، وشوف إزاي عملوها بالظبط.</div>
    <div class="en">🇬🇧 A daily habit you'll do thousands of times: see something in a site's design you like? Right-click → Inspect, and see exactly how it was built.</div>
</div>

<div class="flow-diagram">
    <div class="flow-box">Write Code</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">Save File</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">Live Server Refreshes</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">Inspect in DevTools</div>
</div>
<div class="bi-block">
    <div class="ar">🇪🇬 دورة العمل اليومية اللي هتكررها آلاف المرات: تكتب كود، تحفظ، Live Server بيحدّث المتصفح لوحده، وبعدين تفتح DevTools تتأكد إن الشكل زي ما متوقع أو تصلّح حاجة. كل مرحلة جاية في المسار هتستخدم نفس الدورة دي بالظبط.</div>
    <div class="en">🇬🇧 The daily workflow you'll repeat thousands of times: write code, save, Live Server auto-refreshes the browser, then you open DevTools to confirm it looks right or fix something. Every stage ahead in this track uses exactly this same loop.</div>
</div>

<h2>أسئلة شائعة / FAQ</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>هل لازم أحفظ كل الأكواد؟</b> لأ. حتى المحترفين بيرجعوا للتوثيق (Documentation) وبيدوروا على جوجل كل يوم تقريبًا. اللي مهم إنك تفهم الفكرة، مش تحفظ الصيغة.</div>
    <div class="en">🇬🇧 <b>Do I need to memorize all the code?</b> No. Even professionals check documentation and search Google almost every day. What matters is understanding the idea, not memorizing the syntax.</div>
</div>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>كودي مش شكله زي اللي في الدرس بالظبط، ده طبيعي؟</b> أكيد طبيعي — طالما النتيجة النهائية بتشتغل صح، اختلاف ترتيب السطور أو أسامي الكلاسات مش مشكلة أبدًا. مفيش "طريقة واحدة صح" في أغلب الأحيان.</div>
    <div class="en">🇬🇧 <b>My code does not look exactly like the lesson's — is that normal?</b> Completely normal. As long as the final result works correctly, differences in line order or class names are not a problem. There is rarely only one "correct" way.</div>
</div>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>هل لازم أتعلم بترتيب المسار ده بالظبط؟</b> أيوه مستحسن، لأن كل مرحلة مبنية على اللي قبلها (خصوصًا HTML قبل CSS قبل JavaScript)، بس مفيش مشكلة ترجع لمرحلة قديمة تراجعها وقت ما تحتاج.</div>
    <div class="en">🇬🇧 <b>Do I have to follow this track's order exactly?</b> Yes, it is recommended, since each stage builds on the previous one (especially HTML before CSS before JavaScript) — but it is fine to revisit an earlier stage to review whenever you need to.</div>
</div>

<h2>أخطاء شائعة للمبتدئين في المحرر / Common Beginner Editor Mistakes</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 قبل ما تكمل، خد بالك من 5 أخطاء بتضيع وقت أي مبتدئ ساعات في حلها لأنها مش واضحة من رسالة الخطأ:</div>
    <div class="en">🇬🇧 Before moving on, watch for 5 mistakes that waste beginners hours simply because the symptom doesn't point clearly at the cause:</div>
</div>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>1) امتداد الملف غلط:</b> لو سميت الملف <code>index.html.txt</code> أو <code>style.css.html</code> (Windows أحيانًا بيخبي الامتداد الحقيقي)، هتفتحه في المتصفح ويطلعلك كود نصي بدل صفحة. فعّل "إظهار امتدادات الملفات" في إعدادات الويندوز عشان تتأكد.</div>
    <div class="en">🇬🇧 <b>1) Wrong file extension:</b> naming a file <code>index.html.txt</code> or <code>style.css.html</code> (Windows sometimes hides the real extension) makes the browser show raw text instead of a page. Turn on "show file extensions" in Windows settings to always see the truth.</div>
</div>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>2) نسيان الحفظ قبل الـ Refresh:</b> عدّلت الكود بس نسيت <code>Ctrl+S</code>؟ المتصفح هيعرض النسخة القديمة، وهتفتكر إن كودك "مش شغال" مع إنه شغال فعلاً. Live Server بيقلل المشكلة دي كتير لأنه بيحفظ ويحدّث تلقائيًا، لكن لسه المحرر نفسه محتاج تحفظ الملف الأول.</div>
    <div class="en">🇬🇧 <b>2) Forgetting to save before refreshing:</b> edit the code but skip <code>Ctrl+S</code>, and the browser still shows the old version — making working code look "broken". Live Server reduces this a lot, but the editor still needs the file saved first.</div>
</div>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>3) فتح الملف بالضغط المزدوج بدل Live Server:</b> فتح <code>index.html</code> مباشرة من الملفات بيدّيك رابط زي <code>file:///C:/...</code> بدل <code>http://127.0.0.1:...</code> — بعض المزايا (زي <code>fetch()</code> في JavaScript) بتتوقف عن الشغل على <code>file://</code>. استخدم Live Server دايمًا بدل الفتح المباشر.</div>
    <div class="en">🇬🇧 <b>3) Double-clicking the file instead of using Live Server:</b> opening <code>index.html</code> directly gives a <code>file:///C:/...</code> address instead of <code>http://127.0.0.1:...</code> — some features (like JavaScript's <code>fetch()</code>) silently stop working on <code>file://</code>. Always use Live Server instead of opening the file directly.</div>
</div>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>4) وسم مش مقفول أو تعشيش (Nesting) غلط:</b> نسيان <code>&lt;/div&gt;</code> أو قفل وسم قبل الوسم اللي جواه، ممكن يكسر شكل الصفحة كلها بعد النقطة دي. لو الصفحة "اتكسرت" فجأة بعد سطر معين، ده أول مكان تدور فيه.</div>
    <div class="en">🇬🇧 <b>4) An unclosed tag or wrong nesting:</b> a missing <code>&lt;/div&gt;</code>, or closing an outer tag before an inner one, can visually break everything after that point. If the page suddenly "breaks" after a certain line, that's the first place to look.</div>
</div>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>5) مسار (Path) الملف غلط:</b> <code>href="style.css"</code> بيدور على الملف في نفس مجلد صفحة الـ HTML بالظبط — لو الـ CSS في مجلد فرعي (<code>css/style.css</code>) أو فوق بمجلد (<code>../style.css</code>)، لازم تكتب المسار صح وإلا التنسيق مش هيتطبق خالص من غير أي رسالة خطأ واضحة.</div>
    <div class="en">🇬🇧 <b>5) A wrong file path:</b> <code>href="style.css"</code> looks for the file in the exact same folder as the HTML page — if the CSS lives in a subfolder (<code>css/style.css</code>) or a parent folder (<code>../style.css</code>), the path must match exactly, or the styling silently fails to apply with no clear error message.</div>
</div>

<h2 id="practice">💻 جرّب التعديل الحي / Try Live Editing</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 قبل ما نغوص في HTML وCSS بالتفصيل في المراحل الجاية، جرّب حس التعديل الحي اللي هتستخدمه طول المسار: غيّر أي نص جوه الكود تحت، وشوف المعاينة بتتحدث فورًا من غير ما تضغط أي زرار — بالظبط زي إضافة Live Server.</div>
    <div class="en">🇬🇧 Before diving into HTML and CSS in detail in the coming stages, get a feel for the live-editing you'll use throughout this track: change any text in the code below and watch the preview update instantly with no button to press — exactly like the Live Server extension.</div>
</div>
<div class="mini-fe-editor">
    <p class="mini-fe-label">HTML — عدّل النص وشوف النتيجة / edit the text and watch it update</p>
    <textarea class="fe-code" data-tab="html" spellcheck="false">&lt;h1&gt;أهلاً بيك في مسار Front-End!&lt;/h1&gt;
&lt;p&gt;غيّر النص ده وشوف المعاينة بتتحدث فورًا، من غير ما تضغط أي زرار.&lt;/p&gt;</textarea>
    <iframe class="render-box mini-fe-preview" style="height:120px" sandbox></iframe>
</div>

<div class="exercise-box">
    <h3>✍️ تمرين عملي / Hands-on Exercise</h3>
    <div class="ar">🇪🇬 نزّل VS Code، ركّب الإضافتين Live Server وPrettier، وبعدين افتح أي صفحة ويب (حتى جوجل!) ودوس <code>F12</code> وجرّب تفتح تبويب Elements وتعدّل نص أي عنصر مؤقتًا عشان تتعرف على الأداة.</div>
    <div class="en">🇬🇧 Install VS Code, add the Live Server and Prettier extensions, then open any webpage (even Google!), press <code>F12</code>, and try opening the Elements tab and temporarily editing some element's text to get familiar with the tool.</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="f12">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">أنهي اختصار بيفتح أدوات المطور (DevTools) في المتصفح؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Which shortcut opens the browser's DevTools?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="f5"> F5</label>
        <label><input type="radio" name="q1" value="f12"> F12</label>
        <label><input type="radio" name="q1" value="ctrls"> Ctrl+S</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="refresh">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">إضافة Live Server في VS Code بتعمل إيه بالظبط؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What does the Live Server extension actually do?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="minify"> بتضغط ملفات CSS</label>
        <label><input type="radio" name="q2" value="refresh"> بتحدّث المتصفح أوتوماتيك عند الحفظ</label>
        <label><input type="radio" name="q2" value="compile"> بتترجم SASS لـ CSS</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="ext">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">عدّلت في <code>index.html</code> وضغطت حفظ، لكن Live Server مش بيحدّث التصميم الجديد خالص. إيه أرجح سبب؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">You saved a change to <code>index.html</code> but Live Server never shows the new styling. What's the likeliest cause?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="devtools"> DevTools لازم يتقفل الأول</label>
        <label><input type="radio" name="q3" value="ext"> الملف اتسمى بامتداد غلط زي .html.txt فمحتواه مش بيتفسر كصفحة</label>
        <label><input type="radio" name="q3" value="f12"> لازم تدوس F12 قبل كل حفظ</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="direct">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">فتحت صفحتك بالضغط المزدوج عليها من مجلد الملفات (مش بـ Live Server)، ولاحظت إن كود JavaScript اللي بيجيب بيانات بـ <code>fetch()</code> مش شغال. ليه؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">You opened your page by double-clicking it (not via Live Server), and your <code>fetch()</code> JavaScript stopped working. Why?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="direct"> العنوان بقى file:// بدل http://، وده بيوقف بعض مزايا JavaScript</label>
        <label><input type="radio" name="q4" value="corrupt"> الملف اتلف من الضغط المزدوج</label>
        <label><input type="radio" name="q4" value="editor"> لازم تستخدم محرر تاني غير VS Code</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ جهّز بيئة شغلك الحقيقية / Set Up Your Real Workspace</h3>
    <div class="ar">🇪🇬 نزّل VS Code فعليًا وركّب Live Server وPrettier، اعمل ملف <code>index.html</code> فاضي وافتحه بـ Live Server، وبعدين افتح أي موقع حقيقي عجبك تصميمه ودوس Inspect على 3 عناصر مختلفة فيه — اكتب لنفسك أسماء الـ tags والـ classes اللي لاحظتها.</div>
    <div class="en">🇬🇧 Actually install VS Code and add Live Server and Prettier, create an empty <code>index.html</code> and open it with Live Server, then open any real site whose design you like and Inspect 3 different elements in it — jot down the tag names and classes you notice.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 الأدوات اللي جهّزتها هنا (VS Code، Live Server، DevTools) هي بالظبط اللي هتفتحها وتستخدمها في كل مرحلة جاية — من أول صفحة HTML بسيطة، لحد ما تبني وتصحّح مشروع الـ To-Do List الكامل بـ JavaScript الخام في مرحلة "مشروع كامل بـ JavaScript".</div>
    <div class="en">🇬🇧 The tools you just set up (VS Code, Live Server, DevTools) are exactly what you'll keep opening at every stage ahead — from your first simple HTML page, all the way to building and debugging the full vanilla-JavaScript To-Do List project later in the track.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>المحرر الموصى بيه: <span class="ltr">VS Code</span> + إضافتي <span class="ltr">Live Server</span> و<span class="ltr">Prettier</span>.</li>
        <li><code>F12</code> أو Inspect يفتح أدوات المطور (DevTools).</li>
        <li>تبويب Elements = بنية HTML/CSS الفعلية. تبويب Console = أخطاء ورسايل JavaScript.</li>
        <li>مفيش داعي تحفظ كل حاجة — الفهم أهم من الحفظ، وجوجل صاحبك طول الطريق.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <span></span>
    <a href="html.php">المرحلة الجاية / Next: Learn HTML →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
