<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'fetch-async-js';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'Fetch API و Async/Await — Front-End Developer';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">المرحلة 15 / Stage 15</span>
<h1>Fetch API و Async/Await <span class="ltr">The Fetch API &amp; Async/Await</span></h1>
<p class="subtitle">لحد دلوقتي كل الكود اللي كتبته كان بيشتغل فورًا، سطر بعد سطر. لكن إيه اللي بيحصل لما تحتاج تجيب بيانات من سيرفر بعيد ممكن ياخد ثانية أو ثانيتين؟ الصفحة مش هتستنى واقفة — وده بالظبط اللي هتفهمه هنا.</p>

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
    <div class="ar">🇪🇬 تفهم الفرق بين الكود المتزامن (Synchronous) وغير المتزامن (Asynchronous)، تتعرف على الـ <code>Promise</code> وإزاي بيمثّل "نتيجة هتوصل بعدين"، تكتب <code>async</code>/<code>await</code>، وتستخدم <code>fetch()</code> فعليًا عشان تجيب بيانات حقيقية من الإنترنت من غير ما تعمل Refresh للصفحة.</div>
    <div class="en">🇬🇧 Understand the difference between Synchronous and Asynchronous code, meet the <code>Promise</code> and how it represents "a result that will arrive later," write <code>async</code>/<code>await</code>, and actually use <code>fetch()</code> to pull real data from the internet without a page refresh.</div>
</div>

<h2>1) متزامن مقابل غير متزامن / Synchronous vs Asynchronous</h2>
<div class="flow-diagram">
    <div class="flow-box">console.log("1")</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">setTimeout(..., 1000) — بيتأجل، الكود مكمّل</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">console.log("2") — بيتنفذ فورًا</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">... بعد ثانية: كود setTimeout بينفذ</div>
</div>
<div class="bi-block">
    <div class="ar">🇪🇬 JavaScript عادةً بينفذ الكود سطر بسطر، وكل سطر بيستنى اللي قبله يخلص — ده اسمه <b>Synchronous</b>. لكن بعض العمليات (زي جلب بيانات من الإنترنت، أو الانتظار لثانية بـ <code>setTimeout</code>) بتاخد وقت مش معروف بالظبط، فـ JavaScript بيبعتها "على جنب" ويكمل باقي الكود فورًا من غير ما يستناها — ده اسمه <b>Asynchronous</b>. لما نتيجة العملية دي توصل، الكود اللي بيتعامل معاها بيتنفذ وقتها.</div>
    <div class="en">🇬🇧 JavaScript normally runs code line by line, each line waiting for the one before it to finish — that's <b>Synchronous</b>. But some operations (fetching data from the internet, or waiting with <code>setTimeout</code>) take an unpredictable amount of time, so JavaScript sends them "aside" and keeps running the rest of the code immediately without waiting — that's <b>Asynchronous</b>. When that operation's result finally arrives, the code handling it runs then.</div>
</div>
<pre><code>console.log("1");

setTimeout(function () {
    console.log("3 (بعد ثانية)");
}, 1000);

console.log("2");

// الترتيب الفعلي في الـ Console: 1 ثم 2 ثم 3 — مش 1 ثم 3 ثم 2!</code></pre>
<div class="bi-block">
    <div class="ar">🇪🇬 لو الكود ده كان Synchronous بالكامل، كنا هنشوف 1 ثم 3 ثم 2 (لأن الصفحة كانت هتقف تستنى الثانية كاملة). لكن بما إنه Asynchronous، JavaScript ماوقفش عند <code>setTimeout</code> — كمّل على طول لسطر <code>console.log("2")</code>، وبعدين لما الثانية خلصت رجع نفّذ كود الـ <code>setTimeout</code>. جرب الترتيب ده بنفسك في المحرر المصغّر تحت.</div>
    <div class="en">🇬🇧 If this were fully synchronous, we'd see 1 then 3 then 2 (the page would freeze for the full second). But because it's asynchronous, JavaScript didn't stop at <code>setTimeout</code> — it moved straight on to <code>console.log("2")</code>, then came back to run the <code>setTimeout</code> code once the second passed. Try this ordering yourself in the mini editor below.</div>
</div>
<div class="mini-fe-editor">
    <div class="fe-tabs">
        <button class="fe-tab active" data-tab="html">HTML</button>
        <button class="fe-tab" data-tab="css">CSS</button>
        <button class="fe-tab" data-tab="js">JS</button>
    </div>
    <textarea class="fe-code" data-tab="html" spellcheck="false">&lt;button id="runBtn"&gt;شغّل الكود&lt;/button&gt;
&lt;div id="log"&gt;&lt;/div&gt;</textarea>
    <textarea class="fe-code" data-tab="css" style="display:none" spellcheck="false">body { font-family: sans-serif; padding: 16px; }
button { font-size: 14px; padding: 8px 16px; border-radius: 8px; border: none; background: #6c8bff; color: white; cursor: pointer; }
#log { margin-top: 12px; background: #f2f2f2; border-radius: 8px; padding: 10px; font-family: Consolas, monospace; font-size: 13px; min-height: 60px; white-space: pre-line; }</textarea>
    <textarea class="fe-code" data-tab="js" style="display:none" spellcheck="false">document.getElementById("runBtn").addEventListener("click", function () {
    const log = document.getElementById("log");
    log.textContent = "";
    function write(line) {
        log.textContent += line + "\n";
    }
    write("1");
    setTimeout(function () {
        write("3 (بعد ثانية)");
    }, 1000);
    write("2");
});</textarea>
    <iframe class="render-box mini-fe-preview" style="height:170px" sandbox="allow-scripts"></iframe>
</div>

<h2 id="understand">🧠 2) الـ Promise — نتيجة هتوصل بعدين</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 الـ <code>Promise</code> هو كائن (Object) بيمثّل "وعد" بنتيجة هتوصل في المستقبل — إما نجاح (<code>resolve</code>) أو فشل (<code>reject</code>). بدل ما تكتب كود جوه الـ <code>setTimeout</code> نفسه، بتلف العملية غير المتزامنة جوه <code>Promise</code>، وتستخدم <code>.then()</code> عشان تقول "لما تخلص بنجاح، اعمل كذا".</div>
    <div class="en">🇬🇧 A <code>Promise</code> is an object representing a "promise" of a future result — either success (<code>resolve</code>) or failure (<code>reject</code>). Instead of writing code directly inside <code>setTimeout</code>, you wrap the async operation in a <code>Promise</code>, then use <code>.then()</code> to say "when it succeeds, do this."</div>
</div>
<pre><code>function getUserName() {
    return new Promise(function (resolve) {
        setTimeout(function () {
            resolve("أحمد"); // نجحت العملية بعد ثانية ونص
        }, 1500);
    });
}

loadBtn.addEventListener("click", function () {
    status.textContent = "جاري التحميل...";
    getUserName().then(function (name) {
        status.textContent = "تم! الاسم: " + name;
    });
});</code></pre>
<h3>المعاينة الفعلية / Actual Rendered Output — جرّب اضغط الزرار</h3>
<iframe class="render-box" style="height:130px" sandbox="allow-scripts" srcdoc='<html><head><style>body{font-family:sans-serif;padding:16px;text-align:center}button{font-size:15px;padding:8px 16px;border-radius:8px;border:none;background:#6c8bff;color:white;cursor:pointer}#status{font-size:17px;font-weight:700;margin-top:14px;color:#333;min-height:24px}</style></head><body dir="rtl"><button id="loadBtn">اطلب البيانات</button><div id="status">اضغط الزرار...</div><script>function getUserName(){return new Promise(function(resolve){setTimeout(function(){resolve("أحمد");},1500);});}document.getElementById("loadBtn").addEventListener("click",function(){var status=document.getElementById("status");status.textContent="جاري التحميل...";getUserName().then(function(name){status.textContent="تم! الاسم: "+name;});});<\/script></body></html>'></iframe>
<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ: النص بيتغيّر لـ "جاري التحميل..." فورًا لحظة الضغط، والصفحة تفضل تستجيب طول ثانية ونص الانتظار دي (جرب تحرك الماوس أو تضغط أي حاجة تانية جوه الإطار — مفيش تجمّد). بعد ثانية ونص بالظبط، الـ Promise بيعمل <code>resolve</code> وكود الـ <code>.then()</code> بيتنفذ.</div>
    <div class="en">🇬🇧 Notice: the text changes to "Loading..." immediately on click, and the page stays responsive during that 1.5 second wait (try moving your mouse or clicking elsewhere in the frame — nothing freezes). After exactly 1.5 seconds, the Promise calls <code>resolve</code> and the <code>.then()</code> code runs.</div>
</div>

<h2 id="practice">💻 3) async/await — نفس الفكرة بشكل أوضح</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <code>async</code>/<code>await</code> مش تقنية مختلفة عن الـ Promises — هو بس شكل كتابة أوضح وأقرب للكود المتزامن العادي. تحط <code>async</code> قبل الدالة، وجوّاها تحط <code>await</code> قبل أي حاجة بترجع <code>Promise</code> — الكود هيوقف عند السطر ده (من غير ما يجمّد الصفحة كلها) لحد ما الـ Promise يخلص، وبعدين يكمل للسطر اللي بعده.</div>
    <div class="en">🇬🇧 <code>async</code>/<code>await</code> isn't a different technology from Promises — it's just clearer syntax that reads like normal synchronous code. You put <code>async</code> before a function, and inside it <code>await</code> before anything that returns a <code>Promise</code> — that line pauses (without freezing the whole page) until the Promise settles, then moves to the next line.</div>
</div>
<pre><code>function getUserName() {
    return new Promise(function (resolve) {
        setTimeout(function () { resolve("أحمد"); }, 1500);
    });
}

loadBtn.addEventListener("click", async function () {
    status.textContent = "جاري التحميل...";
    const name = await getUserName(); // بيوقف هنا لحد ما الـ Promise يخلص
    status.textContent = "تم! الاسم: " + name;
});</code></pre>
<h3>المعاينة الفعلية / Actual Rendered Output — نفس النتيجة، كتابة أوضح</h3>
<iframe class="render-box" style="height:130px" sandbox="allow-scripts" srcdoc='<html><head><style>body{font-family:sans-serif;padding:16px;text-align:center}button{font-size:15px;padding:8px 16px;border-radius:8px;border:none;background:#35d0ba;color:white;cursor:pointer}#status{font-size:17px;font-weight:700;margin-top:14px;color:#333;min-height:24px}</style></head><body dir="rtl"><button id="loadBtn">اطلب البيانات (async/await)</button><div id="status">اضغط الزرار...</div><script>function getUserName(){return new Promise(function(resolve){setTimeout(function(){resolve("أحمد");},1500);});}document.getElementById("loadBtn").addEventListener("click",async function(){var status=document.getElementById("status");status.textContent="جاري التحميل...";const name=await getUserName();status.textContent="تم! الاسم: "+name;});<\/script></body></html>'></iframe>

<h2>4) Fetch API — بيانات حقيقية من الإنترنت</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <code>fetch(url)</code> بيبعت طلب HTTP حقيقي لأي عنوان، ويرجع <code>Promise</code>. لما السيرفر يرد، بتستخدم <code>response.json()</code> (وهي كمان بترجع <code>Promise</code>) عشان تحوّل الرد النصي لكائن JavaScript فعلي تقدر تشتغل عليه.</div>
    <div class="en">🇬🇧 <code>fetch(url)</code> sends a real HTTP request to any address and returns a <code>Promise</code>. When the server replies, you use <code>response.json()</code> (which also returns a <code>Promise</code>) to turn the text response into an actual JavaScript object you can work with.</div>
</div>
<div class="bi-block">
    <div class="ar">🇪🇬 ملحوظة مهمة عن الأمان: مش أي API هتقدر تطلبها من أي صفحة. المتصفح بيطبّق سياسة اسمها <b>CORS</b> (Cross-Origin Resource Sharing) — السيرفر لازم يسمح صراحة (بـ Header اسمه <code>Access-Control-Allow-Origin</code>) إن مصادر تانية تقرأ ردّه. لو حاولت تعمل <code>fetch</code> لـ API ملوش الإذن ده، هتشوف خطأ CORS في الـ Console من غير ما الطلب يوصل أصلًا للكود بتاعك. الـ API اللي هنستخدمه هنا (official-joke-api) فاتح ده صراحة، فالطلب هيشتغل فعليًا وأنت بتقرا الدرس.</div>
    <div class="en">🇬🇧 An important security note: you can't just fetch any API from any page. Browsers enforce a policy called <b>CORS</b> (Cross-Origin Resource Sharing) — the server must explicitly allow it (via an <code>Access-Control-Allow-Origin</code> header) for other origins to read its response. If you try to fetch an API without that permission, you'll see a CORS error in the Console before the response ever reaches your code. The API used here (official-joke-api) explicitly allows this, so the request below genuinely works as you read.</div>
</div>
<pre><code>async function loadJoke() {
    status.textContent = "جاري التحميل...";
    const response = await fetch("https://official-joke-api.appspot.com/random_joke");
    const data = await response.json();
    status.textContent = data.setup + " — " + data.punchline;
}

jokeBtn.addEventListener("click", loadJoke);</code></pre>
<h3>المعاينة الفعلية / Actual Rendered Output — طلب Fetch حقيقي لسيرفر خارجي</h3>
<iframe class="render-box" style="height:150px" sandbox="allow-scripts" srcdoc='<html><head><style>body{font-family:sans-serif;padding:16px;text-align:center}button{font-size:15px;padding:8px 16px;border-radius:8px;border:none;background:#ff9f43;color:white;cursor:pointer}#status{font-size:15px;font-weight:600;margin-top:14px;color:#333;min-height:40px;direction:ltr}</style></head><body dir="rtl"><button id="jokeBtn">اجيب نكتة حقيقية</button><div id="status">اضغط الزرار...</div><script>async function loadJoke(){var status=document.getElementById("status");status.textContent="جاري التحميل...";try{const response=await fetch("https://official-joke-api.appspot.com/random_joke");const data=await response.json();status.textContent=data.setup+" — "+data.punchline;}catch(err){status.textContent="فشل الطلب (اتأكد من اتصال الإنترنت): "+err.message;}}document.getElementById("jokeBtn").addEventListener("click",loadJoke);<\/script></body></html>'></iframe>
<div class="bi-block">
    <div class="ar">🇪🇬 كل ضغطة بتجيب نكتة عشوائية جديدة فعليًا من سيرفر official-joke-api.appspot.com — مفيش أي بيانات مزيفة هنا، ده طلب شبكة حقيقي بيتبعت من المتصفح بتاعك دلوقتي. لو النت عندك واقع أو الخدمة نزلت، هتشوف رسالة الخطأ اللي كتبناها في الـ <code>catch</code> بدل ما الصفحة تتجمد أو تدي خطأ غامض.</div>
    <div class="en">🇬🇧 Every click genuinely fetches a new random joke from the official-joke-api.appspot.com server — nothing here is faked, this is a real network request being sent by your browser right now. If your connection is down or the service is unreachable, you'll see the error message we wrote in the <code>catch</code> block instead of the page freezing or throwing an unclear error.</div>
</div>

<div class="bi-block">
    <div class="ar">🇪🇬 جرّب بنفسك: غيّر العنوان لـ <code>data.setup</code> لوحدها من غير الـ punchline، أو زوّد زرار "تاني" واعمل عداد لعدد مرات الضغط جنب النكتة.</div>
    <div class="en">🇬🇧 Try it yourself: change it to show <code>data.setup</code> alone without the punchline, or add a second counter next to the joke that tracks how many times you've clicked.</div>
</div>
<div class="mini-fe-editor">
    <div class="fe-tabs">
        <button class="fe-tab active" data-tab="html">HTML</button>
        <button class="fe-tab" data-tab="js">JS</button>
    </div>
    <textarea class="fe-code" data-tab="html" spellcheck="false">&lt;button id="jokeBtn"&gt;اجيب نكتة&lt;/button&gt;
&lt;div id="status" style="margin-top:12px;font-family:sans-serif"&gt;اضغط الزرار...&lt;/div&gt;</textarea>
    <textarea class="fe-code" data-tab="js" style="display:none" spellcheck="false">async function loadJoke() {
    const status = document.getElementById("status");
    status.textContent = "جاري التحميل...";
    try {
        const response = await fetch("https://official-joke-api.appspot.com/random_joke");
        const data = await response.json();
        status.textContent = data.setup + " — " + data.punchline;
    } catch (err) {
        status.textContent = "فشل الطلب: " + err.message;
    }
}

document.getElementById("jokeBtn").addEventListener("click", loadJoke);</textarea>
    <iframe class="render-box mini-fe-preview" style="height:150px" sandbox="allow-scripts"></iframe>
</div>

<div class="exercise-box">
    <h3>✍️ تمرين عملي / Hands-on Exercise</h3>
    <div class="ar">🇪🇬 في <a href="../playground/index.php">محرر الكود</a>، اعمل صفحة فيها زرار "نكتة جديدة" بيستخدم <code>fetch</code> على نفس الـ API، وزوّد فوقه عداد بسيط بيقول "عدد النكت اللي شفتها: X" وبيزيد واحد كل مرة تجيب نكتة جديدة بنجاح.</div>
    <div class="en">🇬🇧 In the <a href="../playground/index.php">Playground</a>, build a page with a "New Joke" button using <code>fetch</code> on the same API, plus a simple counter above it that says "Jokes seen: X" and increments by one every time a joke loads successfully.</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="later">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">كود <code>setTimeout</code> اتنفذ، لكن الكود اللي بعده في نفس الدالة اشتغل فورًا من غير استنى. ده سلوك أنهي نوع؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">A <code>setTimeout</code> call runs, but the code right after it executes immediately without waiting. What kind of behavior is this?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="sync"> Synchronous — لازم الكل يستنى بعضه</label>
        <label><input type="radio" name="q1" value="later"> Asynchronous — العملية اتبعتت على جنب والكود كمّل</label>
        <label><input type="radio" name="q1" value="error"> ده خطأ في الكود</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="future">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">الـ <code>Promise</code> بيمثّل إيه بالظبط؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What does a <code>Promise</code> actually represent?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="future"> نتيجة هتوصل بعدين — إما نجاح أو فشل</label>
        <label><input type="radio" name="q2" value="value"> قيمة جاهزة فورًا زي أي متغير عادي</label>
        <label><input type="radio" name="q2" value="function"> دالة عادية بترجع نص</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="await">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">جوه دالة معرّفة بـ <code>async</code>، أنهي كلمة بتخلي الكود يستنى نتيجة الـ Promise قبل ما يكمل للسطر اللي بعده؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Inside an <code>async</code> function, which keyword pauses execution until a Promise settles before moving to the next line?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="return"> return</label>
        <label><input type="radio" name="q3" value="await"> await</label>
        <label><input type="radio" name="q3" value="then"> then (بدون await)</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="cors">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">حاولت تعمل <code>fetch</code> لـ API معيّن وشفت خطأ في الـ Console بيمنع الرد من الوصول لكودك رغم إن الطلب نفسه راح للسيرفر. الاحتمال الأقوى؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">You tried fetching an API and got a Console error blocking the response from reaching your code, even though the request itself reached the server. Most likely cause?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="typo"> غلطة إملائية في اسم الدالة fetch</label>
        <label><input type="radio" name="q4" value="cors"> السيرفر مش مسموح له بـ Access-Control-Allow-Origin لمصدرك — مشكلة CORS</label>
        <label><input type="radio" name="q4" value="internet"> مفيش إنترنت خالص</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ صفحة نكت مع حالة تحميل وخطأ / A Joke Page with Loading &amp; Error States</h3>
    <div class="ar">🇪🇬 استخدم <a href="../playground/index.php">محرر الكود</a> (أو المحرر المصغّر فوق) وابني نسخة أكمل: زرار "نكتة جديدة"، نص "جاري التحميل..." بيظهر لحد ما الرد يوصل، وزرار الحصول على النكتة يتعطّل (<code>disabled</code>) طول فترة التحميل عشان تمنع المستخدم من الضغط كذا مرة قبل ما الرد الأول يوصل.</div>
    <div class="en">🇬🇧 Use the <a href="../playground/index.php">Playground</a> (or the mini editor above) and build a fuller version: a "New Joke" button, a "Loading..." message shown until the response arrives, and the button disabled (<code>disabled</code>) during loading to prevent the user from clicking multiple times before the first response arrives.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 كل موقع حقيقي تقريبًا بيحتاج يجيب بيانات من سيرفر — سواء نكت، منتجات، أو تعليقات مستخدمين. اللي اتعلمته هنا (Promise، async/await، وfetch) هو بالظبط الأساس اللي هتحتاجه في مرحلة "أدوات المطوّر" الجاية عشان تفهم إيه اللي بيحصل في الـ Network Tab لما طلب زي ده يتبعت.</div>
    <div class="en">🇬🇧 Almost every real website needs to fetch data from a server — jokes, products, or user comments. What you learned here (Promise, async/await, and fetch) is exactly the foundation you'll need in the next "Browser DevTools" stage to understand what the Network tab shows when a request like this is sent.</div>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>Synchronous = كل سطر يستنى اللي قبله. Asynchronous = عمليات بتتبعت "على جنب" والكود بيكمل.</li>
        <li><code>Promise</code> = كائن بيمثّل نتيجة هتوصل بعدين، إما <code>resolve</code> (نجاح) أو <code>reject</code> (فشل).</li>
        <li><code>async</code>/<code>await</code> = نفس فكرة الـ Promise، بس بشكل كتابة أوضح وأقرب للكود العادي.</li>
        <li><code>fetch(url)</code> بيبعت طلب HTTP حقيقي، و<code>response.json()</code> بيحوّل الرد لكائن JavaScript.</li>
        <li>CORS = سياسة أمان بتمنع أي صفحة من قراءة رد أي API إلا لو السيرفر سمح صراحة.</li>
    </ul>
</div>

<div class="nav-buttons">
    <a href="vue.php">← المرحلة السابقة</a>
    <a href="accessibility-basics.php">المرحلة الجاية / Next: Accessibility Basics →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
