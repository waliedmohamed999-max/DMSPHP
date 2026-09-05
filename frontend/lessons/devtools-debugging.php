<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'devtools-debugging';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'أدوات المطوّر في المتصفح — Front-End Developer';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">المرحلة 17 / Stage 17</span>
<h1>أدوات المطوّر في المتصفح <span class="ltr">Browser DevTools &amp; Debugging</span></h1>
<p class="subtitle">كل مطوّر Front-End — مهما كان محترف — بيقابل باگات كل يوم. الفرق مش إنك متغلطش، الفرق إنك تعرف تفتح أدوات المطوّر (DevTools) وتلاقي الغلطة بسرعة بدل ما تتخبط عشوائي.</p>

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
    <div class="ar">🇪🇬 تفهم أهم 3 تابات في DevTools: الـ Console (رسائل وأخطاء JavaScript)، الـ Network (كل طلب بيتبعت من الصفحة)، والـ Sources (لوضع Breakpoints ومتابعة الكود سطر بسطر). وتتعلم تقرا رسالة خطأ حقيقية وتفهم بالظبط إيه اللي غلط.</div>
    <div class="en">🇬🇧 Understand the 3 most important DevTools tabs: the Console (JavaScript messages and errors), the Network tab (every request the page sends), and Sources (for setting Breakpoints and stepping through code line by line). And learn to read a real error message and understand exactly what went wrong.</div>
</div>

<h2 id="understand">🧠 1) فتح DevTools والـ Console</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 تفتح DevTools بمفتاح <kbd>F12</kbd> أو <kbd>Ctrl+Shift+I</kbd> (على Windows/Linux) في أي متصفح حديث (Chrome, Firefox, Edge). تاب الـ <b>Console</b> هو أول حاجة تشوفها غالبًا — هنا بتظهر رسائل <code>console.log()</code> اللي كتبتها بنفسك، وكمان أي خطأ JavaScript غير متوقع بيحصل في الصفحة، بلون أحمر ومعاه اسم الملف ورقم السطر بالظبط.</div>
    <div class="en">🇬🇧 Open DevTools with <kbd>F12</kbd> or <kbd>Ctrl+Shift+I</kbd> (Windows/Linux) in any modern browser (Chrome, Firefox, Edge). The <b>Console</b> tab is usually the first thing you see — it shows your own <code>console.log()</code> messages, plus any unexpected JavaScript error in the page, in red, with the exact file name and line number.</div>
</div>

<h2>2) خطأ حقيقي: ReferenceError</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 الإطار تحت فيه كود حقيقي معطوب عمدًا. اضغط الزرار وشوف إيه اللي بيحصل — مفيش نتيجة بتظهر خالص، لأن الكود بيرمي خطأ (Exception) قبل ما يوصل لسطر عرض النتيجة. افتح DevTools بلوحة مفاتيحك الحقيقية دلوقتي (مش هنا جوه الإطار، لكن على الصفحة كلها) واضغط الزرار تاني وشوف تاب الـ Console — هتلاقي رسالة حمرا حقيقية.</div>
    <div class="en">🇬🇧 The frame below contains real, intentionally broken code. Click the button and see what happens — nothing appears, because the code throws an exception before it reaches the line that displays the result. Open your real browser's DevTools now (on the actual page, not inside the frame) and click the button again while watching the Console tab — you'll see a real red error message.</div>
</div>
<pre><code>function calculateTotal(pricee) {   // لاحظ: اسم الـ Parameter اتكتب "pricee" غلط
    return price * 1.14;             // لكن هنا بنستخدم "price" — الاسم الصح مالوش تعريف
}

calcBtn.addEventListener("click", function () {
    result.textContent = calculateTotal(100);
});</code></pre>
<h3>المعاينة الفعلية / Actual Rendered Output — جرّب واضغط الزرار</h3>
<iframe class="render-box" style="height:130px" sandbox="allow-scripts" srcdoc='<html><head><style>body{font-family:sans-serif;padding:16px;text-align:center}button{font-size:15px;padding:8px 16px;border-radius:8px;border:none;background:#ff6b6b;color:white;cursor:pointer}#result{font-size:16px;margin-top:14px;color:#333;min-height:22px}</style></head><body dir="rtl"><button id="calcBtn">احسب الإجمالي (كود معطوب)</button><div id="result">لسه محسبتش حاجة...</div><script>function calculateTotal(pricee){return price*1.14;}document.getElementById("calcBtn").addEventListener("click",function(){document.getElementById("result").textContent=calculateTotal(100);});<\/script></body></html>'></iframe>
<div class="bi-block">
    <div class="ar">🇪🇬 الرسالة اللي هتشوفها في الـ Console بالظبط شكلها كده في Chrome: <code>Uncaught ReferenceError: price is not defined</code> ومعاها سطر تحتها بيقول <code>at calculateTotal (...)</code> وسطر تاني <code>at HTMLButtonElement.&lt;anonymous&gt; (...)</code> — ده اسمه Stack Trace، وبيوريك بالظبط سلسلة الدوال اللي أدت للخطأ، من الأحدث للأقدم. في Firefox الرسالة هتبقى <code>ReferenceError: price is not defined</code> بنفس المعنى.</div>
    <div class="en">🇬🇧 The message you'll see in the Console looks exactly like this in Chrome: <code>Uncaught ReferenceError: price is not defined</code>, followed by lines like <code>at calculateTotal (...)</code> and <code>at HTMLButtonElement.&lt;anonymous&gt; (...)</code> — this is called the Stack Trace, and it shows you the exact chain of function calls that led to the error, newest to oldest. In Firefox the message reads <code>ReferenceError: price is not defined</code> with the same meaning.</div>
</div>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>إزاي تقرا الرسالة دي وتصلّح الغلطة؟</b> "ReferenceError" معناه إنك بتستخدم متغير مش معرّف خالص في النطاق (Scope) ده. "price is not defined" بيقولك اسم المتغير بالظبط. تدوّر في الكود على "price" وتلاقي إن الـ Parameter اسمه فعليًا "pricee" (بحرف e زيادة) — الحل: تصلّح الاسم عشان يتطابق في المكانين.</div>
    <div class="en">🇬🇧 <b>How do you read this and fix it?</b> "ReferenceError" means you're using a variable that isn't defined at all in this scope. "price is not defined" tells you the exact variable name. You search the code for "price" and find the parameter is actually named "pricee" (an extra e) — the fix is to make the name match in both places.</div>
</div>

<h2>3) خطأ صامت: النتيجة NaN من غير أي رسالة</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 مش كل الباگات بترمي خطأ واضح في الـ Console — بعضها "صامت"، يعني الكود بيشتغل من غير ما يوقف، لكن النتيجة غلط. ده أصعب نوع باگ، وده بالظبط سبب أهمية إنك تحط <code>console.log()</code> في نقط مختلفة عشان تتابع القيم وهي بتتغيّر.</div>
    <div class="en">🇬🇧 Not every bug throws a visible Console error — some are "silent": the code keeps running without stopping, but the result is wrong. This is the harder kind of bug, and exactly why sprinkling <code>console.log()</code> at different points to track values as they change matters.</div>
</div>
<pre><code>function sumArray(arr) {
    let total = 0;
    for (let i = 0; i &lt;= arr.length; i++) {  // لاحظ &lt;= بدل &lt; — Off-by-one
        total += arr[i];                       // arr[arr.length] === undefined
    }
    return total;  // النتيجة: NaN، من غير أي خطأ في الـ Console!
}</code></pre>
<h3>المعاينة الفعلية / Actual Rendered Output</h3>
<iframe class="render-box" style="height:130px" sandbox="allow-scripts" srcdoc='<html><head><style>body{font-family:sans-serif;padding:16px;text-align:center}button{font-size:15px;padding:8px 16px;border-radius:8px;border:none;background:#ffa94d;color:white;cursor:pointer}#result{font-size:16px;margin-top:14px;color:#333;min-height:22px;font-family:Consolas,monospace}</style></head><body dir="rtl"><p style="font-size:13px;color:#666">المصفوفة: [10, 20, 30] — الناتج المتوقع: 60</p><button id="sumBtn">احسب الإجمالي (فيه Off-by-one)</button><div id="result">...</div><script>function sumArray(arr){let total=0;for(let i=0;i<=arr.length;i++){total+=arr[i];}return total;}document.getElementById("sumBtn").addEventListener("click",function(){document.getElementById("result").textContent="الناتج: "+sumArray([10,20,30]);});<\/script></body></html>'></iframe>
<div class="bi-block">
    <div class="ar">🇪🇬 اضغط الزرار — مفيش أي خطأ أحمر في الـ Console، لكن الناتج <code>NaN</code> مش <code>60</code>. السبب: الحلقة بتوصل لـ <code>i = arr.length</code> (يعني index 3 في مصفوفة طولها 3، وده خارج حدودها)، و<code>arr[3]</code> بترجع <code>undefined</code>، و<code>undefined + رقم = NaN</code>. لو حطيت <code>console.log(i, arr[i])</code> جوه الحلقة، كنت هتلاحظ القيمة <code>undefined</code> دي فورًا.</div>
    <div class="en">🇬🇧 Click the button — no red error in the Console, but the result is <code>NaN</code>, not <code>60</code>. Why: the loop reaches <code>i = arr.length</code> (index 3 in a length-3 array, out of bounds), and <code>arr[3]</code> returns <code>undefined</code>, and <code>undefined + a number = NaN</code>. If you'd added <code>console.log(i, arr[i])</code> inside the loop, you'd have spotted that <code>undefined</code> value immediately.</div>
</div>

<h2>4) Breakpoints — وقّف الكود وافحصه وهو شغال</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 بدل ما تحط <code>console.log()</code> في كل مكان مشكوك فيه، تاب <b>Sources</b> بيدّيك حل أقوى: افتح ملف الـ JavaScript بتاعك، دوس على رقم أي سطر عشان تحط عليه <b>Breakpoint</b> (نقطة توقف)، وشغّل الكود عادي. لما التنفيذ يوصل للسطر ده، المتصفح بيوقف تمامًا هناك — قبل ما ينفذه — وبيوريك في لوحة "Scope" قيمة كل متغير في اللحظة دي بالظبط.</div>
    <div class="en">🇬🇧 Instead of sprinkling <code>console.log()</code> everywhere you suspect a problem, the <b>Sources</b> tab gives you a stronger tool: open your JavaScript file, click a line number to set a <b>Breakpoint</b>, and run the code normally. When execution reaches that line, the browser pauses completely right there — before running it — and shows you every variable's value at that exact moment in a "Scope" panel.</div>
</div>
<div class="bi-block">
    <div class="ar">🇪🇬 وأنت واقف على الـ Breakpoint، عندك 3 أزرار أساسية: <b>Step Over</b> (نفّذ السطر ده وانتقل للي بعده، من غير ما تدخل جوه أي دالة بتتنادى فيه)، <b>Step Into</b> (لو السطر بينادي دالة، ادخل جواها شوف كل سطر فيها)، و<b>Step Out</b> (اخرج من الدالة الحالية وارجع للي نادتها). ده بيخليك تتابع تنفيذ الكود لحظة بلحظة بدل ما تخمّن.</div>
    <div class="en">🇬🇧 While paused at a breakpoint, you have 3 core controls: <b>Step Over</b> (run this line and move to the next, without diving into any function it calls), <b>Step Into</b> (if the line calls a function, go inside it and step through it too), and <b>Step Out</b> (exit the current function back to whoever called it). This lets you follow execution moment by moment instead of guessing.</div>
</div>

<h2>5) تاب الـ Network — راقب أي طلب بيتبعت</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 تاب <b>Network</b> بيسجّل كل طلب بتبعته الصفحة — صور، ملفات CSS/JS، وأهم حاجة: طلبات <code>fetch()</code>. افتح الـ Network tab، وارجع لدرس <a href="fetch-async-js.php">Fetch API و Async/Await</a> واضغط زرار "اجيب نكتة حقيقية" هناك (أو أي زرار Fetch)، وهتشوف طلب جديد ظاهر بالاسم <code>random_joke</code> في القائمة.</div>
    <div class="en">🇬🇧 The <b>Network</b> tab logs every request the page sends — images, CSS/JS files, and most importantly, <code>fetch()</code> calls. Open the Network tab, go back to the <a href="fetch-async-js.php">Fetch API &amp; Async/Await</a> lesson and click its "get a real joke" button (or any fetch button), and you'll see a new request named <code>random_joke</code> appear in the list.</div>
</div>
<div class="bi-block">
    <div class="ar">🇪🇬 لو دوست على الطلب ده، هتلاقي تابات فرعية مفيدة جدًا: <b>Headers</b> (الطلب اتبعت لـ URL إيه، بأنهي method زي GET، وأنهي Status Code رجع زي 200 لو نجح أو 404 لو الرابط غلط)، و<b>Response</b> (نص الرد الخام اللي رجع من السيرفر — نفس الـ JSON اللي بتاخده بعد <code>response.json()</code>)، و<b>Timing</b> (قد إيه الطلب استغرق وقت). ده بالظبط مكانك لما تشك إن مشكلة الـ fetch مش في الكود بتاعك، لكن في الرد نفسه.</div>
    <div class="en">🇬🇧 Clicking that request reveals very useful sub-tabs: <b>Headers</b> (what URL it hit, which method like GET, and what Status Code came back — 200 for success, 404 for a wrong URL), <b>Response</b> (the raw text the server sent back — the same JSON you get after <code>response.json()</code>), and <b>Timing</b> (how long the request took). This is exactly where you look when you suspect a fetch problem isn't in your code but in the response itself.</div>
</div>

<h2 id="practice">💻 دورك: صلّح الباگين بنفسك / Your Turn: Fix Both Bugs Yourself</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 قراءة رسالة الخطأ حاجة، وتصليحها بإيدك حاجة تانية. الكود تحت هو نفس الدالتين المعطوبتين اللي شفتهم فوق — لكن هنا تقدر تعدّل عليهم فعليًا. صلّح الاسم الغلط في الدالة الأولى (<code>pricee</code> → <code>price</code>)، وصلّح شرط الحلقة في الدالة التانية (<code>&lt;=</code> → <code>&lt;</code>)، ودوس "شغّل" — لو صلّحت صح، هتشوف <code>114.00</code> و<code>60</code> بدل الخطأ والـ NaN.</div>
    <div class="en">🇬🇧 Reading an error message is one thing; fixing it with your own hands is another. The code below is the same two broken functions from above — but here you can actually edit them. Fix the typo'd name in the first function (<code>pricee</code> → <code>price</code>), and fix the loop condition in the second (<code>&lt;=</code> → <code>&lt;</code>), then click "Run" — if you fixed both correctly, you'll see <code>114.00</code> and <code>60</code> instead of the error and <code>NaN</code>.</div>
</div>
<div class="mini-fe-editor">
    <div class="fe-tabs">
        <button class="fe-tab active" data-tab="html">HTML</button>
        <button class="fe-tab" data-tab="js">JS</button>
    </div>
    <textarea class="fe-code" data-tab="html" spellcheck="false">&lt;button id="fixBtn"&gt;شغّل / Run&lt;/button&gt;
&lt;div id="out1" style="margin-top:10px;font-family:Consolas,monospace"&gt;calculateTotal(100) -&gt; ...&lt;/div&gt;
&lt;div id="out2" style="margin-top:6px;font-family:Consolas,monospace"&gt;sumArray([10,20,30]) -&gt; ...&lt;/div&gt;</textarea>
    <textarea class="fe-code" data-tab="js" style="display:none" spellcheck="false">// باگ 1: صلّح اسم الـ Parameter عشان يتطابق مع اللي بيتستخدم جوه الدالة
function calculateTotal(pricee) {
    return price * 1.14;
}

// باگ 2: صلّح شرط الحلقة عشان مايتخطاش حدود المصفوفة
function sumArray(arr) {
    let total = 0;
    for (let i = 0; i <= arr.length; i++) {
        total += arr[i];
    }
    return total;
}

document.getElementById("fixBtn").addEventListener("click", function () {
    try {
        document.getElementById("out1").textContent = "calculateTotal(100) -> " + calculateTotal(100).toFixed(2);
    } catch (e) {
        document.getElementById("out1").textContent = "calculateTotal(100) -> Error: " + e.message;
    }
    document.getElementById("out2").textContent = "sumArray([10,20,30]) -> " + sumArray([10, 20, 30]);
});</textarea>
    <iframe class="render-box mini-fe-preview" style="height:150px" sandbox></iframe>
</div>
<div class="bi-block">
    <div class="ar">🇪🇬 لو لسه شايف Error أو NaN، افتح DevTools على الصفحة دي بالذات (F12) وشوف تاب الـ Console — هيوريك بالظبط نفس نوع الرسائل اللي اتعلمت تقراها فوق، على الكود بتاعك انت.</div>
    <div class="en">🇬🇧 If you still see an Error or NaN, open DevTools on this very page (F12) and check the Console tab — it'll show you exactly the kind of messages you learned to read above, on your own code this time.</div>
</div>

<div class="exercise-box">
    <h3>✍️ تمرين عملي / Hands-on Exercise</h3>
    <div class="ar">🇪🇬 افتح أي صفحة من صفحات المسار ده (زي درس Fetch) في متصفحك، افتح DevTools بـ F12، وجرّب: 1) اكتب <code>console.log("تجربة")</code> في تاب الـ Console واضغط Enter، 2) افتح تاب الـ Network وحدّث الصفحة (Refresh) وشوف كل الطلبات اللي اتبعتت، 3) افتح تاب الـ Elements ودوس على أي عنصر في الصفحة لتشوف الـ HTML بتاعه.</div>
    <div class="en">🇬🇧 Open any page from this track (like the Fetch lesson) in your real browser, open DevTools with F12, and try: 1) type <code>console.log("test")</code> in the Console tab and press Enter, 2) open the Network tab and refresh the page to see every request sent, 3) open the Elements tab and click any element on the page to see its HTML.</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="console">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">حصل خطأ JavaScript غير متوقع في صفحتك. أنهي تاب في DevTools هيوريك رسالة الخطأ الحمرا واسم الملف ورقم السطر؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">An unexpected JavaScript error occurred on your page. Which DevTools tab shows the red error message with file name and line number?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="network"> Network</label>
        <label><input type="radio" name="q1" value="console"> Console</label>
        <label><input type="radio" name="q1" value="elements"> Elements</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="undefined">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">رسالة <code>ReferenceError: price is not defined</code> بتقولك إيه بالظبط؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What does <code>ReferenceError: price is not defined</code> exactly tell you?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="undefined"> فيه استخدام لمتغير اسمه price مش معرّف خالص في النطاق ده</label>
        <label><input type="radio" name="q2" value="network"> فيه طلب شبكة فشل</label>
        <label><input type="radio" name="q2" value="type"> فيه نوع بيانات غلط (زي نص بدل رقم)</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="pause">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">إيه اللي بيحصل بالظبط لما تحط Breakpoint على سطر معيّن في تاب Sources وتشغّل الكود؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What exactly happens when you set a Breakpoint on a line in the Sources tab and run the code?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="skip"> السطر ده بيتجاهل تمامًا وميتنفذش</label>
        <label><input type="radio" name="q3" value="pause"> التنفيذ بيوقف تمامًا عند السطر ده قبل ما يتنفذ، وتقدر تفحص قيم المتغيرات</label>
        <label><input type="radio" name="q3" value="restart"> الصفحة كلها بتعمل Refresh</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="network">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">عايز تتأكد إن طلب <code>fetch()</code> بعتته الصفحة رجع فعلًا بـ Status Code 200 وتشوف الـ JSON الخام اللي رجع من السيرفر. أنهي تاب الأنسب؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">You want to confirm a <code>fetch()</code> request returned Status Code 200 and see the raw JSON the server sent back. Which tab fits?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="console"> Console فقط</label>
        <label><input type="radio" name="q4" value="network"> Network — تفتح الطلب وتشوف Headers وResponse</label>
        <label><input type="radio" name="q4" value="elements"> Elements</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ صيّد الباگ / Bug Hunt</h3>
    <div class="ar">🇪🇬 روح لأي مشروع سابق كتبته في المسار ده (To-Do List أو البورتفوليو)، افتح DevTools بـ F12، وافتح تاب الـ Console. تصفّح الصفحة واضغط على كل الأزرار — لو فيه أي خطأ أحمر ظهر، اقرا رسالته بعناية، افتح تاب الـ Sources، حط Breakpoint في السطر المذكور، وتابع القيم لحد ما تفهم السبب وتصلّحه.</div>
    <div class="en">🇬🇧 Go to any earlier project you built in this track (the To-Do List or the portfolio), open DevTools with F12, and open the Console tab. Browse the page and click every button — if any red error appears, read its message carefully, open the Sources tab, set a Breakpoint at the mentioned line, and step through the values until you understand and fix the cause.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 كل مطوّر محترف بيقعد جزء كبير من وقته في DevTools — مش لأنه ضعيف، لكن لأن ده بالظبط شكل الشغل الحقيقي. المهارة دي هتفضل معاك في أي مشروع هتبنيه بعد كده، بما فيها مرحلة "نشر موقعك للعامة" الجاية، لما تحتاج تتأكد إن موقعك المنشور شغال صح زي ما كان شغال على جهازك.</div>
    <div class="en">🇬🇧 Every professional developer spends a large chunk of their time in DevTools — not because they're weak, but because that's exactly what real work looks like. This skill will stay with you in every project you build afterward, including the next "Deploying Your Site" stage, when you need to confirm your published site works correctly just like it did on your machine.</div>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>افتح DevTools بـ F12. تاب Console = رسائل وأخطاء JavaScript، بالاسم ورقم السطر بالظبط.</li>
        <li><code>ReferenceError: x is not defined</code> = بتستخدم متغير اسمه x مش معرّف. الاسم غالبًا فيه غلطة إملائية.</li>
        <li>مش كل باگ بيرمي خطأ — بعضها صامت (زي NaN من Off-by-one)، وهنا <code>console.log()</code> بيفيد.</li>
        <li>Breakpoints في تاب Sources بتوقف الكود فعليًا وتوريك قيم المتغيرات في اللحظة دي.</li>
        <li>تاب Network بيوريك كل طلب (زي fetch): الـ URL، الـ Status Code، والرد الخام.</li>
    </ul>
</div>

<div class="nav-buttons">
    <a href="accessibility-basics.php">← المرحلة السابقة</a>
    <a href="deploying-frontend.php">المرحلة الجاية / Next: Deploying Your Site →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
