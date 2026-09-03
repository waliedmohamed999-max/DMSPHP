<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'javascript';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'تعلم لغة JavaScript — Front-End Developer';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">المرحلة 5 / Stage 5</span>
<h1>تعلم لغة JavaScript <span class="ltr">Learn JavaScript</span></h1>
<p class="subtitle">HTML بنية، CSS شكل، وJavaScript هي اللي بتدّي الصفحة حياة — أي حاجة بتتحرك أو بتتغيّر أو بتستجيب لضغطة زرار، غالبًا JavaScript وراها.</p>

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
    <div class="ar">🇪🇬 تفهم المتغيرات وأنواع البيانات، تكتب دوال (Functions)، وتقدر توصل لعنصر HTML من جوه JavaScript وتغيّر فيه، وتخلي صفحتك تستجيب لضغطات المستخدم بالـ Event Listeners.</div>
    <div class="en">🇬🇧 Understand variables and data types, write Functions, reach into an HTML element from JavaScript and change it, and make your page respond to user clicks with Event Listeners.</div>
</div>

<h2>1) المتغيرات: let وconst</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <code>let</code> بيعرّف متغير ممكن تغيّر قيمته بعدين. <code>const</code> بيعرّف قيمة ثابتة مينفعش تتغيّر بعد ما تتحدد. القاعدة العملية: ابدأ دايمًا بـ <code>const</code>، واستخدم <code>let</code> بس لو فعلًا محتاج القيمة تتغيّر (زي عدّاد).</div>
    <div class="en">🇬🇧 <code>let</code> declares a variable that can be reassigned later. <code>const</code> declares a value that cannot be reassigned after it is set. Practical rule: default to <code>const</code>, and use <code>let</code> only when you genuinely need the value to change (like a counter).</div>
</div>
<pre><code>let count = 0;
const step = 1;

incBtn.addEventListener("click", function () {
    count = count + step; // count بتتغيّر، step ثابتة
    display.textContent = count;
});</code></pre>
<h3>المعاينة الفعلية / Actual Rendered Output</h3>
<iframe class="render-box" style="height:110px" sandbox="allow-scripts" srcdoc='<html><head><style>body{font-family:sans-serif;padding:16px;text-align:center}button{font-size:15px;padding:8px 16px;border-radius:8px;border:none;background:#6c8bff;color:white;cursor:pointer}span{font-size:22px;font-weight:800;margin-inline-start:12px;color:#333}</style></head><body dir="rtl"><button id="incBtn">زود +1</button><span id="display">0</span><script>let count=0;const step=1;document.getElementById("incBtn").addEventListener("click",function(){count=count+step;document.getElementById("display").textContent=count;});<\/script></body></html>'></iframe>

<h2>2) أنواع البيانات / Data Types</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 أهم الأنواع الأساسية: <code>String</code> (نص)، <code>Number</code> (رقم)، <code>Boolean</code> (صح/غلط)، <code>Array</code> (مصفوفة عناصر مرتبة)، و<code>Object</code> (كائن فيه بيانات بأسماء). الأمر <code>typeof</code> بيقولك نوع أي قيمة.</div>
    <div class="en">🇬🇧 The core types: <code>String</code>, <code>Number</code>, <code>Boolean</code>, <code>Array</code> (an ordered collection), and <code>Object</code> (named data). The <code>typeof</code> operator tells you a value's type.</div>
</div>
<pre><code>const name = "سيلا";          // String
const age = 25;                // Number
const isReady = true;          // Boolean
const skills = ["HTML", "CSS", "JS"]; // Array
const user = { name: "سيلا", age: 25 }; // Object

console.log(typeof name, typeof age, typeof isReady);</code></pre>
<h3>المعاينة الفعلية / Actual Rendered Output</h3>
<iframe class="render-box" style="height:190px" sandbox="allow-scripts" srcdoc='<html><head><style>body{font-family:sans-serif;padding:16px}button{font-size:15px;padding:8px 16px;border-radius:8px;border:none;background:#6c8bff;color:white;cursor:pointer}#out{margin-top:12px;background:#f2f2f2;border-radius:8px;padding:10px;font-family:Consolas,monospace;font-size:13px;direction:ltr;text-align:left}</style></head><body dir="rtl"><button id="checkBtn">افحص الأنواع</button><div id="out">اضغط الزرار...</div><script>const name="سيلا";const age=25;const isReady=true;const skills=["HTML","CSS","JS"];const user={name:"سيلا",age:25};document.getElementById("checkBtn").addEventListener("click",function(){const out=document.getElementById("out");out.innerHTML="name -&gt; "+typeof name+"&lt;br&gt;age -&gt; "+typeof age+"&lt;br&gt;isReady -&gt; "+typeof isReady+"&lt;br&gt;skills -&gt; "+typeof skills+" (Array)"+"&lt;br&gt;user -&gt; "+typeof user+" (Object)";});<\/script></body></html>'></iframe>

<h2>3) الدوال / Functions</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 الدالة كتلة كود بتاخد مدخلات (Parameters) وممكن ترجع نتيجة بـ <code>return</code>. بتكتبها مرة واحدة وتستخدمها كذا مرة بمدخلات مختلفة، بدل ما تكرر نفس الكود.</div>
    <div class="en">🇬🇧 A function is a reusable block of code that takes parameters and can return a result with <code>return</code>. Write it once, call it many times with different inputs instead of repeating code.</div>
</div>
<pre><code>function square(n) {
    return n * n;
}

calcBtn.addEventListener("click", function () {
    const n = Number(input.value);
    result.textContent = square(n);
});</code></pre>
<h3>المعاينة الفعلية / Actual Rendered Output</h3>
<iframe class="render-box" style="height:130px" sandbox="allow-scripts" srcdoc='<html><head><style>body{font-family:sans-serif;padding:16px;text-align:center}input{font-size:15px;padding:6px 10px;width:70px;border-radius:6px;border:1px solid #ccc;text-align:center}button{font-size:15px;padding:8px 16px;border-radius:8px;border:none;background:#35d0ba;color:white;cursor:pointer;margin-inline-start:8px}#result{font-size:22px;font-weight:800;margin-top:12px;color:#333}</style></head><body dir="rtl"><input id="numInput" type="number" value="4"><button id="calcBtn">احسب المربع</button><div id="result">-</div><script>function square(n){return n*n;}document.getElementById("calcBtn").addEventListener("click",function(){const n=Number(document.getElementById("numInput").value);document.getElementById("result").textContent=square(n);});<\/script></body></html>'></iframe>

<h2 id="understand">🧠 4) اختيار العناصر وتعديلها / DOM Selection &amp; Manipulation</h2>
<div class="flow-diagram">
    <div class="flow-box">User Clicks</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">Event Listener Fires</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">querySelector() Finds Element</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">textContent / classList Updates It</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">Browser Repaints</div>
</div>
<div class="bi-block">
    <div class="ar">🇪🇬 ده الدورة الكاملة اللي بتحصل كل مرة تشوف عنصر بيتغيّر بعد ضغطة: المستخدم بيضغط، الـ Event Listener بيتفعّل، الكود بيوصل للعنصر بـ <code>querySelector</code>، يعدّل عليه، والمتصفح بعدها بيرسم الشاشة تاني من غير أي Refresh.</div>
    <div class="en">🇬🇧 This is the full loop that happens every time you see something change after a click: the user clicks, the Event Listener fires, the code reaches the element with <code>querySelector</code>, modifies it, and the browser repaints the screen — with no page Refresh at all.</div>
</div>
<div class="bi-block">
    <div class="ar">🇪🇬 <code>document.querySelector("selector")</code> بيدوّرلك على أول عنصر يطابق الـ CSS selector اللي كتبته (زي <code>"#id"</code> أو <code>".class"</code>). بعد ما توصله، تقدر تغيّر نصه بـ <code>textContent</code>، أو تضيف/تشيل/تبدّل كلاس بـ <code>classList.add()</code> و<code>classList.toggle()</code>.</div>
    <div class="en">🇬🇧 <code>document.querySelector("selector")</code> finds the first element matching a CSS selector (like <code>"#id"</code> or <code>".class"</code>). Once you have it, change its text with <code>textContent</code>, or add/toggle a class with <code>classList.add()</code> and <code>classList.toggle()</code>.</div>
</div>
<pre><code>const box = document.querySelector("#box");
const msg = document.querySelector("#msg");

darkBtn.addEventListener("click", function () {
    box.classList.toggle("dark");
});

textBtn.addEventListener("click", function () {
    msg.textContent = "تم تغيير النص بالجافاسكريبت!";
});</code></pre>
<h3>المعاينة الفعلية / Actual Rendered Output</h3>
<iframe class="render-box" style="height:190px" sandbox="allow-scripts" srcdoc='<html><head><style>body{font-family:sans-serif;padding:16px;text-align:center}button{font-size:14px;padding:8px 14px;border-radius:8px;border:none;background:#6c8bff;color:white;cursor:pointer;margin:4px}#box{margin-top:14px;padding:20px;border-radius:10px;background:#f0f0f0;transition:.2s}#box.dark{background:#222;color:white}</style></head><body dir="rtl"><button id="darkBtn">بدّل الوضع الداكن</button><button id="textBtn">غيّر النص</button><div id="box"><p id="msg">النص الأصلي</p></div><script>const box=document.querySelector("#box");const msg=document.querySelector("#msg");document.getElementById("darkBtn").addEventListener("click",function(){box.classList.toggle("dark");});document.getElementById("textBtn").addEventListener("click",function(){msg.textContent="تم تغيير النص بالجافاسكريبت!";});<\/script></body></html>'></iframe>

<h2 id="practice">💻 5) مستمعو الأحداث / Event Listeners</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <code>addEventListener("click", function () {...})</code> بيخلي عنصر معين "يستمع" لحدث (زي ضغطة) وينفّذ كود لما يحصل. تقدر تضيف نفس المستمع لمجموعة عناصر بـ <code>querySelectorAll</code> مع <code>forEach</code>.</div>
    <div class="en">🇬🇧 <code>addEventListener("click", function () {...})</code> makes an element "listen" for an event (like a click) and run code when it happens. You can attach the same listener to a group of elements with <code>querySelectorAll</code> and <code>forEach</code>.</div>
</div>
<pre><code>const buttons = document.querySelectorAll(".color-btn");

buttons.forEach(function (btn) {
    btn.addEventListener("click", function () {
        box.style.background = btn.dataset.color;
    });
});</code></pre>
<h3>المعاينة الفعلية / Actual Rendered Output</h3>
<iframe class="render-box" style="height:170px" sandbox="allow-scripts" srcdoc='<html><head><style>body{font-family:sans-serif;padding:16px;text-align:center}button{font-size:14px;padding:8px 14px;border-radius:8px;border:none;color:white;cursor:pointer;margin:4px}#box{margin-top:14px;height:60px;border-radius:10px;background:#eee;transition:.2s}</style></head><body dir="rtl"><button class="color-btn" data-color="#6c8bff" style="background:#6c8bff">أزرق</button><button class="color-btn" data-color="#35d0ba" style="background:#35d0ba">أخضر</button><button class="color-btn" data-color="#ff6b6b" style="background:#ff6b6b">أحمر</button><div id="box"></div><script>const box=document.getElementById("box");const buttons=document.querySelectorAll(".color-btn");buttons.forEach(function(btn){btn.addEventListener("click",function(){box.style.background=btn.dataset.color;});});<\/script></body></html>'></iframe>

<div class="bi-block">
    <div class="ar">🇪🇬 جرّب بنفسك: غيّر مصفوفة الألوان في الـ JavaScript، أو زوّد زرار رابع بلون جديد في الـ HTML، وشوف إزاي نفس الكود بيتعامل معاه أوتوماتيك.</div>
    <div class="en">🇬🇧 Try it yourself: change the colors array in the JavaScript, or add a fourth button with a new color in the HTML, and see how the same code handles it automatically.</div>
</div>
<div class="mini-fe-editor">
    <div class="fe-tabs">
        <button class="fe-tab active" data-tab="html">HTML</button>
        <button class="fe-tab" data-tab="css">CSS</button>
        <button class="fe-tab" data-tab="js">JavaScript</button>
    </div>
    <textarea class="fe-code" data-tab="html" spellcheck="false">&lt;button class="color-btn" data-color="#6c8bff"&gt;أزرق&lt;/button&gt;
&lt;button class="color-btn" data-color="#35d0ba"&gt;أخضر&lt;/button&gt;
&lt;button class="color-btn" data-color="#ff6b6b"&gt;أحمر&lt;/button&gt;
&lt;div id="box"&gt;&lt;/div&gt;</textarea>
    <textarea class="fe-code" data-tab="css" style="display:none" spellcheck="false">body { font-family: sans-serif; padding: 16px; text-align: center; }
button { font-size: 14px; padding: 8px 14px; border-radius: 8px; border: none; color: white; cursor: pointer; margin: 4px; background: #6c8bff; }
#box { margin-top: 14px; height: 60px; border-radius: 10px; background: #eee; transition: .2s; }</textarea>
    <textarea class="fe-code" data-tab="js" style="display:none" spellcheck="false">const box = document.getElementById("box");
const buttons = document.querySelectorAll(".color-btn");

buttons.forEach(function (btn) {
    btn.addEventListener("click", function () {
        box.style.background = btn.dataset.color;
    });
});</textarea>
    <iframe class="render-box mini-fe-preview" style="height:170px" sandbox="allow-scripts"></iframe>
</div>

<h2>6) دوال المصفوفات: map وfilter / Array Methods: map &amp; filter</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <code>array.map(fn)</code> بيرجع مصفوفة جديدة فيها نتيجة تطبيق <code>fn</code> على كل عنصر — مفيد لما عايز "تحوّل" كل عنصر لحاجة تانية (زي حساب السعر بعد الخصم لكل منتج). <code>array.filter(fn)</code> بيرجع مصفوفة جديدة فيها بس العناصر اللي <code>fn</code> بترجعلها <code>true</code> — مفيد لما عايز "تصفّي" حسب شرط. الاتنين مابيغيروش المصفوفة الأصلية، بيرجعوا واحدة جديدة.</div>
    <div class="en">🇬🇧 <code>array.map(fn)</code> returns a new array with the result of applying <code>fn</code> to every element — useful when you want to "transform" each item (like computing each product's discounted price). <code>array.filter(fn)</code> returns a new array with only the elements where <code>fn</code> returns <code>true</code> — useful for "narrowing down" by a condition. Neither mutates the original array; both return a brand new one.</div>
</div>
<pre><code>const prices = [100, 250, 40, 600, 15];

const discounted = prices.map(p => p * 0.9);      // كل الأسعار بعد خصم 10%
const expensive = prices.filter(p => p > 100);    // بس الأسعار اللي فوق 100</code></pre>
<h3>المعاينة الفعلية / Actual Rendered Output</h3>
<iframe class="render-box" style="height:210px" sandbox="allow-scripts" srcdoc='<html><head><style>body{font-family:sans-serif;padding:16px}button{font-size:14px;padding:8px 14px;border-radius:8px;border:none;background:#6c8bff;color:white;cursor:pointer;margin-inline-end:8px}#out{margin-top:12px;background:#f2f2f2;border-radius:8px;padding:10px;font-family:Consolas,monospace;font-size:13px;direction:ltr;text-align:left}</style></head><body dir="rtl"><p>الأسعار: [100, 250, 40, 600, 15]</p><button id="mapBtn">طبّق map (خصم 10%)</button><button id="filterBtn">طبّق filter (فوق 100)</button><div id="out">اضغط زرار...</div><script>const prices=[100,250,40,600,15];document.getElementById("mapBtn").addEventListener("click",function(){const discounted=prices.map(function(p){return p*0.9;});document.getElementById("out").textContent="map -> ["+discounted.join(", ")+"]";});document.getElementById("filterBtn").addEventListener("click",function(){const expensive=prices.filter(function(p){return p>100;});document.getElementById("out").textContent="filter -> ["+expensive.join(", ")+"]";});<\/script></body></html>'></iframe>

<div class="bi-block">
    <div class="ar">🇪🇬 جرّب بنفسك: غيّر مصفوفة <code>prices</code>، أو عدّل شرط الـ <code>filter</code> من <code>p &gt; 100</code> لـ <code>p &lt; 100</code>، أو اجمع الاتنين مع بعض بـ <code>prices.filter(p =&gt; p &gt; 50).map(p =&gt; p * 0.9)</code>.</div>
    <div class="en">🇬🇧 Try it yourself: change the <code>prices</code> array, edit the <code>filter</code> condition from <code>p &gt; 100</code> to <code>p &lt; 100</code>, or chain both together with <code>prices.filter(p =&gt; p &gt; 50).map(p =&gt; p * 0.9)</code>.</div>
</div>
<div class="mini-fe-editor">
    <div class="fe-tabs">
        <button class="fe-tab active" data-tab="html">HTML</button>
        <button class="fe-tab" data-tab="css">CSS</button>
        <button class="fe-tab" data-tab="js">JavaScript</button>
    </div>
    <textarea class="fe-code" data-tab="html" spellcheck="false">&lt;p&gt;الأسعار: [100, 250, 40, 600, 15]&lt;/p&gt;
&lt;button id="mapBtn"&gt;طبّق map (خصم 10%)&lt;/button&gt;
&lt;button id="filterBtn"&gt;طبّق filter (فوق 100)&lt;/button&gt;
&lt;div id="out"&gt;اضغط زرار...&lt;/div&gt;</textarea>
    <textarea class="fe-code" data-tab="css" style="display:none" spellcheck="false">body { font-family: sans-serif; padding: 16px; }
button { font-size: 14px; padding: 8px 14px; border-radius: 8px; border: none; background: #6c8bff; color: white; cursor: pointer; margin-inline-end: 8px; }
#out { margin-top: 12px; background: #f2f2f2; border-radius: 8px; padding: 10px; font-family: Consolas, monospace; font-size: 13px; }</textarea>
    <textarea class="fe-code" data-tab="js" style="display:none" spellcheck="false">const prices = [100, 250, 40, 600, 15];

document.getElementById("mapBtn").addEventListener("click", function () {
    const discounted = prices.map(function (p) { return p * 0.9; });
    document.getElementById("out").textContent = "map -> [" + discounted.join(", ") + "]";
});

document.getElementById("filterBtn").addEventListener("click", function () {
    const expensive = prices.filter(function (p) { return p > 100; });
    document.getElementById("out").textContent = "filter -> [" + expensive.join(", ") + "]";
});</textarea>
    <iframe class="render-box mini-fe-preview" style="height:210px" sandbox="allow-scripts"></iframe>
</div>

<div class="exercise-box">
    <h3>✍️ تمرين عملي / Hands-on Exercise</h3>
    <div class="ar">🇪🇬 في <a href="../playground/index.php">محرر الكود</a>، اعمل زرار "اطلع رقم عشوائي" (استخدم <code>Math.random()</code>) بيغيّر نص عنصر <code>&lt;h2&gt;</code> برقم جديد كل ضغطة، وزرار تاني بيبدّل لون خلفية الصفحة كلها بـ <code>document.body.style.background</code>.</div>
    <div class="en">🇬🇧 In the <a href="../playground/index.php">Playground</a>, build a "Random Number" button (use <code>Math.random()</code>) that changes an <code>&lt;h2&gt;</code>'s text on every click, and a second button that changes the whole page's background using <code>document.body.style.background</code>.</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="const">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">لو عندك قيمة مش هتتغيّر أبدًا بعد ما تتحدد، بأنهي كلمة الأفضل تعرّفها؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">If a value will never change after being set, which keyword should you use?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="let"> let</label>
        <label><input type="radio" name="q1" value="const"> const</label>
        <label><input type="radio" name="q1" value="var"> var</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="find">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question"><code>document.querySelector(".card")</code> بيرجع إيه؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What does <code>document.querySelector(".card")</code> return?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="find"> أول عنصر على الصفحة عليه class اسمه card</label>
        <label><input type="radio" name="q2" value="all"> كل عناصر الصفحة اللي عليها card</label>
        <label><input type="radio" name="q2" value="css"> قاعدة CSS بتنشئ class جديد</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="map">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">عندك مصفوفة أسعار وعايز مصفوفة جديدة فيها كل سعر بعد إضافة ضريبة 15%. أنهي method الأنسب؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">You have a prices array and want a new array with 15% tax added to every price. Which method fits?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="map"> map()</label>
        <label><input type="radio" name="q3" value="filter"> filter()</label>
        <label><input type="radio" name="q3" value="typeof"> typeof</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="new">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">بعد ما تستخدم <code>prices.filter(p =&gt; p &gt; 100)</code>، إيه اللي بيحصل للمصفوفة الأصلية <code>prices</code>؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">After calling <code>prices.filter(p =&gt; p &gt; 100)</code>, what happens to the original <code>prices</code> array?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="mutate"> بتتغيّر ويتشال منها أي عنصر أصغر من 100</label>
        <label><input type="radio" name="q4" value="new"> تفضل زي ما هي — filter بيرجع مصفوفة جديدة منفصلة</label>
        <label><input type="radio" name="q4" value="empty"> بتفضى تمامًا</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ زرار "أظهر/أخفي" / Build a Show/Hide Button</h3>
    <div class="ar">🇪🇬 استخدم <a href="../playground/index.php">محرر الكود</a> (أو المحرر المصغّر فوق) واعمل زرار "أظهر التفاصيل"، لما تضغطه يظهر <code>&lt;p&gt;</code> كان مخفي بـ <code>classList.toggle</code>، ونص الزرار نفسه يتغيّر بين "أظهر التفاصيل" و"إخفاء التفاصيل" حسب الحالة.</div>
    <div class="en">🇬🇧 Use the <a href="../playground/index.php">Playground</a> (or the mini editor above) and build a "Show Details" button that reveals a hidden <code>&lt;p&gt;</code> using <code>classList.toggle</code>, with the button's own text switching between "Show Details" and "Hide Details" depending on state.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 المتغيرات، الدوال، وEvent Listeners اللي اتعلمتها هنا هي بالظبط اللبنات اللي هتبني بيها تطبيق قائمة المهام (To-Do List) الكامل في مرحلة "مشروع كامل بـ JavaScript" — وهتتمرن عليها أكتر شوية في مرحلة "التطبيق على JavaScript" الجاية مباشرة.</div>
    <div class="en">🇬🇧 The variables, functions, and Event Listeners you learned here are exactly the building blocks you'll use to build the full To-Do List app in the "Full JavaScript Project" stage — and you'll get more practice with them right in the next "JavaScript Practice" stage.</div>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li><code>let</code> = قابل للتغيير، <code>const</code> = ثابت. ابدأ بـ <code>const</code> افتراضيًا.</li>
        <li>الأنواع الأساسية: String, Number, Boolean, Array, Object.</li>
        <li>الدوال (<code>function</code>) = كود قابل لإعادة الاستخدام يرجع نتيجة بـ <code>return</code>.</li>
        <li><code>querySelector</code> يوصلك للعنصر، <code>textContent</code>/<code>classList</code> يغيّروا فيه.</li>
        <li><code>addEventListener("click", ...)</code> = خلي الصفحة تستجيب للمستخدم.</li>
    </ul>
</div>

<div class="nav-buttons">
    <a href="html-css-projects.php">← المرحلة السابقة</a>
    <a href="javascript-practice.php">المرحلة الجاية / Next: JavaScript Practice →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
