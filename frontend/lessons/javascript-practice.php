<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'javascript-practice';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'التطبيق على JavaScript — Front-End Developer';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">المرحلة 6 / Stage 6</span>
<h1>التطبيق على JavaScript <span class="ltr">JavaScript Practice</span></h1>
<p class="subtitle">مفيش طريقة تتعلم بيها JavaScript غير إنك تتمرن. هنا 6 تحديات بسيطة ومحلولة بالكامل، كل واحدة فيها كود شغال فعليًا تقدر تجربه.</p>

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
    <div class="ar">🇪🇬 تشوف أفكار JavaScript (متغيرات، دوال، DOM، Events) وهي متطبّقة في مسائل صغيرة واقعية، وتتعرف على أنماط هتستخدمها كتير جدًا في أي مشروع حقيقي.</div>
    <div class="en">🇬🇧 See JavaScript ideas (variables, functions, DOM, Events) applied to small realistic problems, and learn patterns you will reuse constantly in any real project.</div>
</div>

<h2 id="understand">🧠 تحدي 1 — عدّاد ضغطات / Click Counter</h2>
<div class="flow-diagram">
    <div class="flow-box">State (a variable)</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">Event Happens</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">State Updates</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">Display Re-reads State</div>
</div>
<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ إن كل التحديات في الصفحة دي بتتبع نفس الدورة بالظبط: عندك متغير بيمثّل "الحالة" (State) الحالية، حدث بيغيّره، وبعدين كود بيقرأ القيمة الجديدة ويحدّث الشاشة بيها. الاختلاف الوحيد بين تحدي وتاني هو نوع البيانات ونوع الحدث.</div>
    <div class="en">🇬🇧 Notice every challenge on this page follows the exact same loop: a variable represents the current "State", an event changes it, and code then reads the new value and updates the screen. The only thing that differs between challenges is the data type and the event type.</div>
</div>
<div class="bi-block">
    <div class="ar">🇪🇬 المطلوب: زرار كل ما تضغط عليه يزود رقم معروض على الشاشة. الحل: متغير <code>let</code> يخزّن العدد، وكل ضغطة تزوده وتحدّث النص المعروض.</div>
    <div class="en">🇬🇧 Goal: a button that increases a displayed number on every click. Solution: a <code>let</code> variable stores the count, and every click increments it and updates the displayed text.</div>
</div>
<pre><code>let clicks = 0;
btn.addEventListener("click", function () {
    clicks++;
    display.textContent = "ضغطت " + clicks + " مرة";
});</code></pre>
<h3>المعاينة الفعلية / Actual Rendered Output</h3>
<iframe class="render-box" style="height:100px" sandbox="allow-scripts" srcdoc='<html><head><style>body{font-family:sans-serif;padding:16px;text-align:center}button{font-size:15px;padding:10px 18px;border-radius:8px;border:none;background:#6c8bff;color:white;cursor:pointer}</style></head><body dir="rtl"><button id="btn">ضغطت 0 مرة</button><script>let clicks=0;const btn=document.getElementById("btn");btn.addEventListener("click",function(){clicks++;btn.textContent="ضغطت "+clicks+" مرة";});<\/script></body></html>'></iframe>

<h2>تحدي 2 — عدّاد حروف حي / Live Character Counter</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 المطلوب: كل ما تكتب في مربع نص، يظهرلك تحته عدد الحروف فورًا. الحل: مستمع لحدث <code>input</code> (بيحصل مع كل تعديل في الكتابة) بيقرأ <code>.value.length</code>.</div>
    <div class="en">🇬🇧 Goal: as you type into a text box, show the character count live beneath it. Solution: an <code>input</code> event listener (fires on every keystroke) reads <code>.value.length</code>.</div>
</div>
<pre><code>textarea.addEventListener("input", function () {
    counter.textContent = textarea.value.length + " حرف";
});</code></pre>
<h3>المعاينة الفعلية / Actual Rendered Output</h3>
<iframe class="render-box" style="height:150px" sandbox="allow-scripts" srcdoc='<html><head><style>body{font-family:sans-serif;padding:16px}textarea{width:100%;box-sizing:border-box;min-height:60px;font-size:14px;padding:8px;border-radius:8px;border:1px solid #ccc;font-family:sans-serif}#counter{margin-top:6px;color:#666;font-size:13px}</style></head><body dir="rtl"><textarea id="ta" placeholder="اكتب هنا..."></textarea><div id="counter">0 حرف</div><script>const ta=document.getElementById("ta");const counter=document.getElementById("counter");ta.addEventListener("input",function(){counter.textContent=ta.value.length+" حرف";});<\/script></body></html>'></iframe>

<h2>تحدي 3 — مبدّل ألوان / Button-Driven Color Changer</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 المطلوب: زرار واحد بيدور على مجموعة ألوان محددة مسبقًا في كل ضغطة. الحل: مصفوفة ألوان + متغير Index بيزيد وبيرجع للأول لما يوصل الآخر باستخدام Modulo (<code>%</code>).</div>
    <div class="en">🇬🇧 Goal: one button cycles through a preset list of colors on each click. Solution: a colors array plus an index that increments and wraps back to zero using the Modulo operator (<code>%</code>).</div>
</div>
<pre><code>const colors = ["#6c8bff", "#35d0ba", "#ff6b6b", "#ffd166"];
let i = 0;
btn.addEventListener("click", function () {
    i = (i + 1) % colors.length;
    box.style.background = colors[i];
});</code></pre>
<h3>المعاينة الفعلية / Actual Rendered Output</h3>
<iframe class="render-box" style="height:170px" sandbox="allow-scripts" srcdoc='<html><head><style>body{font-family:sans-serif;padding:16px;text-align:center}button{font-size:15px;padding:10px 18px;border-radius:8px;border:none;background:#333;color:white;cursor:pointer}#box{margin-top:14px;height:60px;border-radius:10px;background:#6c8bff;transition:.2s}</style></head><body dir="rtl"><button id="btn">غيّر اللون</button><div id="box"></div><script>const colors=["#6c8bff","#35d0ba","#ff6b6b","#ffd166"];let i=0;const box=document.getElementById("box");document.getElementById("btn").addEventListener("click",function(){i=(i+1)%colors.length;box.style.background=colors[i];});<\/script></body></html>'></iframe>

<h2>تحدي 4 — إظهار/إخفاء / Show &amp; Hide Toggle</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 المطلوب: سؤال بيتضغط فيظهر جوابه، وبيتضغط تاني فيختفي (زي قسم الأسئلة الشائعة في أي موقع). الحل: <code>classList.toggle()</code> على كلاس بيتحكم في <code>display</code>.</div>
    <div class="en">🇬🇧 Goal: click a question to reveal its answer, click again to hide it (like an FAQ accordion). Solution: <code>classList.toggle()</code> on a class that controls <code>display</code>.</div>
</div>
<pre><code>question.addEventListener("click", function () {
    answer.classList.toggle("open");
});</code></pre>
<pre><code>.answer { display: none; }
.answer.open { display: block; }</code></pre>
<h3>المعاينة الفعلية / Actual Rendered Output</h3>
<iframe class="render-box" style="height:120px" sandbox="allow-scripts" srcdoc='<html><head><style>body{font-family:sans-serif;padding:16px}#q{cursor:pointer;font-weight:700;color:#3355ff}.answer{display:none;margin-top:8px;color:#444}.answer.open{display:block}</style></head><body dir="rtl"><div id="q">▶ إيه هو الـ Front-End؟ (اضغط هنا)</div><div class="answer" id="a">هو الجزء اللي بيشوفه المستخدم ويتفاعل معاه في أي موقع أو تطبيق.</div><script>document.getElementById("q").addEventListener("click",function(){document.getElementById("a").classList.toggle("open");});<\/script></body></html>'></iframe>

<h2 id="practice">💻 تحدي 5 — آلة حاسبة بسيطة / Simple Calculator</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 المطلوب: مربعين لإدخال رقمين، وزرار يجمعهم. الحل: اقرأ القيم بـ <code>Number()</code> (عشان الـ input بيرجع نص أصلًا)، اجمعهم، واعرض الناتج.</div>
    <div class="en">🇬🇧 Goal: two input boxes and a button that adds them. Solution: read values with <code>Number()</code> (since inputs return text), add them, and display the result.</div>
</div>
<pre><code>btn.addEventListener("click", function () {
    const a = Number(input1.value);
    const b = Number(input2.value);
    result.textContent = "الناتج = " + (a + b);
});</code></pre>
<h3>المعاينة الفعلية / Actual Rendered Output</h3>
<iframe class="render-box" style="height:130px" sandbox="allow-scripts" srcdoc='<html><head><style>body{font-family:sans-serif;padding:16px;text-align:center}input{width:60px;font-size:15px;padding:6px;text-align:center;border-radius:6px;border:1px solid #ccc}button{font-size:15px;padding:8px 14px;border-radius:8px;border:none;background:#35d0ba;color:white;cursor:pointer;margin:0 6px}#result{margin-top:10px;font-weight:700;font-size:18px}</style></head><body dir="rtl"><input id="n1" type="number" value="5"> + <input id="n2" type="number" value="7"> <button id="calcBtn">=</button><div id="result">الناتج = ؟</div><script>document.getElementById("calcBtn").addEventListener("click",function(){const a=Number(document.getElementById("n1").value);const b=Number(document.getElementById("n2").value);document.getElementById("result").textContent="الناتج = "+(a+b);});<\/script></body></html>'></iframe>

<div class="bi-block">
    <div class="ar">🇪🇬 جرّب بنفسك: غيّر العملية من جمع لطرح أو ضرب، أو زوّد مربع إدخال ثالث. لاحظ إن من غير <code>Number()</code>، الجمع كان هيتحول لـ "دمج نصوص" (زي <code>"5" + "7"</code> = <code>"57"</code>).</div>
    <div class="en">🇬🇧 Try it yourself: change the operation from addition to subtraction or multiplication, or add a third input box. Notice that without <code>Number()</code>, the addition would become text concatenation (like <code>"5" + "7"</code> = <code>"57"</code>).</div>
</div>
<div class="mini-fe-editor">
    <div class="fe-tabs">
        <button class="fe-tab active" data-tab="html">HTML</button>
        <button class="fe-tab" data-tab="css">CSS</button>
        <button class="fe-tab" data-tab="js">JavaScript</button>
    </div>
    <textarea class="fe-code" data-tab="html" spellcheck="false">&lt;input id="n1" type="number" value="5"&gt; +
&lt;input id="n2" type="number" value="7"&gt;
&lt;button id="calcBtn"&gt;=&lt;/button&gt;
&lt;div id="result"&gt;الناتج = ؟&lt;/div&gt;</textarea>
    <textarea class="fe-code" data-tab="css" style="display:none" spellcheck="false">body { font-family: sans-serif; padding: 16px; text-align: center; }
input { width: 60px; font-size: 15px; padding: 6px; text-align: center; border-radius: 6px; border: 1px solid #ccc; }
button { font-size: 15px; padding: 8px 14px; border-radius: 8px; border: none; background: #35d0ba; color: white; cursor: pointer; margin: 0 6px; }
#result { margin-top: 10px; font-weight: 700; font-size: 18px; }</textarea>
    <textarea class="fe-code" data-tab="js" style="display:none" spellcheck="false">document.getElementById("calcBtn").addEventListener("click", function () {
    const a = Number(document.getElementById("n1").value);
    const b = Number(document.getElementById("n2").value);
    document.getElementById("result").textContent = "الناتج = " + (a + b);
});</textarea>
    <iframe class="render-box mini-fe-preview" style="height:130px" sandbox="allow-scripts"></iframe>
</div>

<h2>تحدي 6 — مولّد اقتباسات عشوائي / Random Quote Generator</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 المطلوب: زرار بيطلع اقتباس عشوائي من قائمة جاهزة كل ما تضغطه. الحل: مصفوفة نصوص + <code>Math.random()</code> لاختيار Index عشوائي، مع <code>Math.floor()</code> عشان نحوّله لرقم صحيح.</div>
    <div class="en">🇬🇧 Goal: a button that shows a random quote from a preset list on every click. Solution: a strings array plus <code>Math.random()</code> to pick a random index, and <code>Math.floor()</code> to round it to a whole number.</div>
</div>
<pre><code>const quotes = [
    "الكود اللي بتفهمه أهم من الكود اللي بتحفظه.",
    "كل خبير كان مبتدئ يوم من الأيام.",
    "التطبيق العملي أقوى من أي شرح نظري.",
];
btn.addEventListener("click", function () {
    const i = Math.floor(Math.random() * quotes.length);
    quoteBox.textContent = quotes[i];
});</code></pre>
<h3>المعاينة الفعلية / Actual Rendered Output</h3>
<iframe class="render-box" style="height:150px" sandbox="allow-scripts" srcdoc='<html><head><style>body{font-family:sans-serif;padding:16px;text-align:center}button{font-size:15px;padding:10px 18px;border-radius:8px;border:none;background:#6c8bff;color:white;cursor:pointer}#quoteBox{margin-top:14px;min-height:40px;color:#333;font-style:italic}</style></head><body dir="rtl"><button id="btn">اقتباس عشوائي</button><div id="quoteBox">اضغط عشان تشوف اقتباس...</div><script>const quotes=["الكود اللي بتفهمه أهم من الكود اللي بتحفظه.","كل خبير كان مبتدئ يوم من الأيام.","التطبيق العملي أقوى من أي شرح نظري."];document.getElementById("btn").addEventListener("click",function(){const i=Math.floor(Math.random()*quotes.length);document.getElementById("quoteBox").textContent=quotes[i];});<\/script></body></html>'></iframe>

<div class="exercise-box">
    <h3>✍️ تمرين عملي / Hands-on Exercise</h3>
    <div class="ar">🇪🇬 في <a href="../playground/index.php">محرر الكود</a>، ادمج تحدي "عدّاد الضغطات" مع تحدي "مبدّل الألوان": زرار واحد يزوّد رقم ويغيّر لون الخلفية في نفس الوقت. وبعدين حاول تضيف زرار "إعادة تصفير" (Reset) للعدّاد.</div>
    <div class="en">🇬🇧 In the <a href="../playground/index.php">Playground</a>, combine the "Click Counter" and "Color Changer" challenges: one button both increments a number and changes the background color at once. Then try adding a "Reset" button for the counter.</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="wrap">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">في تحدي مبدّل الألوان، إيه وظيفة عملية الـ Modulo (<code>%</code>)؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">In the Color Changer challenge, what does the Modulo operator (<code>%</code>) do?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="wrap"> بيرجّع الـ Index للصفر لما يوصل آخر المصفوفة</label>
        <label><input type="radio" name="q1" value="multiply"> بيضاعف الرقم</label>
        <label><input type="radio" name="q1" value="random"> بيطلع رقم عشوائي</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="input">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">في تحدي عدّاد الحروف الحي، أنهي حدث بيخلي العدّاد يتحدث مع كل حرف تكتبه؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">In the Live Character Counter challenge, which event updates the count with every keystroke?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="click"> click</label>
        <label><input type="radio" name="q2" value="input"> input</label>
        <label><input type="radio" name="q2" value="load"> load</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ عدّاد كلمات مباشر / Build a Live Word Counter</h3>
    <div class="ar">🇪🇬 استخدم <a href="../playground/index.php">محرر الكود</a> (أو المحرر المصغّر فوق) وطوّر تحدي "عدّاد الحروف الحي" ليعرض كمان عدد الكلمات (استخدم <code>.trim().split(" ")</code> على قيمة الـ textarea)، مع رسالة تحذير حمراء لو عدد الحروف تعدى 200.</div>
    <div class="en">🇬🇧 Use the <a href="../playground/index.php">Playground</a> (or the mini editor above) and extend the "Live Character Counter" challenge to also show a word count (use <code>.trim().split(" ")</code> on the textarea's value), plus a red warning message if the character count exceeds 200.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 الأنماط الستة اللي تمرنت عليها هنا (State + Event + Update) هي بالحرف نفس الأنماط اللي هتستخدمها كذا مرة في تطبيق قائمة المهام (To-Do List) الكامل — الأنماط الصغيرة دي هي اللبنات اللي بيتبني منها أي تطبيق JavaScript حقيقي.</div>
    <div class="en">🇬🇧 The six patterns you practiced here (State + Event + Update) are the exact same patterns you'll reuse repeatedly in the full To-Do List app — these small patterns are the building blocks any real JavaScript app is made of.</div>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>عداد الضغطات = <code>let</code> + <code>addEventListener("click")</code>.</li>
        <li>عداد الحروف الحي = حدث <code>input</code> + <code>.value.length</code>.</li>
        <li>مبدّل الألوان = مصفوفة + Index بيدور بـ <code>%</code> (Modulo).</li>
        <li>الإظهار/الإخفاء = <code>classList.toggle()</code> + CSS <code>display</code>.</li>
        <li>الآلة الحاسبة = <code>Number()</code> لتحويل نص الـ input لرقم قبل الجمع.</li>
        <li>الاقتباس العشوائي = <code>Math.random()</code> + <code>Math.floor()</code> لاختيار عنصر عشوائي من مصفوفة.</li>
    </ul>
</div>

<div class="nav-buttons">
    <a href="javascript.php">← المرحلة السابقة</a>
    <a href="js-project.php">المرحلة الجاية / Next: A Full JS Project →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
