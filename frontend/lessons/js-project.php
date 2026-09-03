<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'js-project';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'مشروع كامل بـ JavaScript فقط — Front-End Developer';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">المرحلة 7 / Stage 7</span>
<h1>مشروع كامل بـ JavaScript فقط <span class="ltr">A Full Vanilla JavaScript Project</span></h1>
<p class="subtitle">دلوقتي هنبني تطبيق حقيقي من غير أي framework: قائمة مهام (To-Do List) — تضيف مهمة، تعلّمها كمخلّصة، وتمسحها. تطبيق بسيط لكنه بيلخّص كل حاجة اتعلمتها في مرحلة JavaScript.</p>

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
    <div class="ar">🇪🇬 تبني تطبيق كامل من الصفر: HTML للبنية، CSS للشكل، وJavaScript لكل المنطق (إضافة، حذف، تعليم كمخلّص) — وتفهم إزاي البيانات (المهام) بتتخزن في مصفوفة وبتتعاد رسمتها (Re-render) على الشاشة كل ما تتغيّر.</div>
    <div class="en">🇬🇧 Build a complete app from scratch: HTML for structure, CSS for style, and JavaScript for all the logic (add, delete, mark done) — and understand how data (tasks) is stored in an array and re-rendered to the screen whenever it changes.</div>
</div>

<h2 id="understand">🧠 الفكرة العامة / The Approach</h2>
<div class="flow-diagram">
    <div class="flow-box">User Action (add/click/✕)</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">Update the tasks Array</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">Call render()</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">Screen Rebuilt From Array</div>
</div>
<div class="bi-block">
    <div class="ar">🇪🇬 هنخزّن كل المهام في مصفوفة JavaScript (<code>let tasks = []</code>)، كل مهمة عبارة عن Object فيه <code>text</code> و<code>done</code>. أي عملية (إضافة/حذف/تعليم) بتعدّل على المصفوفة الأول، وبعدها بتستدعي دالة <code>render()</code> واحدة بتمسح الـ HTML القديم وتعيد رسم القائمة من جديد بالكامل من المصفوفة — ده النمط الأساسي اللي كل تطبيقات JavaScript الحديثة (React, Vue) مبنية عليه.</div>
    <div class="en">🇬🇧 All tasks live in a JavaScript array (<code>let tasks = []</code>), each task an object with <code>text</code> and <code>done</code>. Every operation (add/delete/toggle) updates the array first, then calls one <code>render()</code> function that clears the old HTML and redraws the entire list from the array — this is the core pattern every modern JavaScript app (React, Vue) is built on.</div>
</div>

<h2 id="practice">💻 1) الـ HTML</h2>
<pre><code>&lt;div class="todo-app"&gt;
    &lt;h2&gt;قائمة مهامي&lt;/h2&gt;
    &lt;div class="todo-input"&gt;
        &lt;input type="text" id="taskInput" placeholder="اكتب مهمة جديدة..."&gt;
        &lt;button id="addBtn"&gt;إضافة&lt;/button&gt;
    &lt;/div&gt;
    &lt;ul id="taskList"&gt;&lt;/ul&gt;
&lt;/div&gt;</code></pre>

<h2>2) الـ CSS</h2>
<pre><code>.todo-app { max-width: 340px; font-family: sans-serif; }
.todo-input { display: flex; gap: 8px; margin-bottom: 14px; }
.todo-input input { flex: 1; padding: 8px; border-radius: 6px; border: 1px solid #ccc; }
.todo-input button { padding: 8px 14px; border: none; border-radius: 6px; background: #6c8bff; color: white; cursor: pointer; }
#taskList { list-style: none; padding: 0; display: flex; flex-direction: column; gap: 8px; }
#taskList li { display: flex; align-items: center; justify-content: space-between; background: #f5f5f5; padding: 8px 12px; border-radius: 6px; }
#taskList li.done span { text-decoration: line-through; color: #999; }
#taskList li .remove-btn { background: none; border: none; color: #ff6b6b; cursor: pointer; font-size: 16px; }</code></pre>

<h2>3) الـ JavaScript</h2>
<pre><code>let tasks = [];

function render() {
    taskList.innerHTML = "";
    tasks.forEach(function (task, index) {
        const li = document.createElement("li");
        if (task.done) li.classList.add("done");

        const span = document.createElement("span");
        span.textContent = task.text;
        span.addEventListener("click", function () {
            task.done = !task.done;
            render();
        });

        const removeBtn = document.createElement("button");
        removeBtn.className = "remove-btn";
        removeBtn.textContent = "✕";
        removeBtn.addEventListener("click", function () {
            tasks.splice(index, 1);
            render();
        });

        li.appendChild(span);
        li.appendChild(removeBtn);
        taskList.appendChild(li);
    });
}

addBtn.addEventListener("click", function () {
    const text = taskInput.value.trim();
    if (text === "") return;
    tasks.push({ text: text, done: false });
    taskInput.value = "";
    render();
});</code></pre>
<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ <code>document.createElement()</code> — طريقة تانية لبناء عناصر HTML من JavaScript بدل ما تكتبهم كنص جاهز، مفيدة لما العدد مش معروف مسبقًا (زي عدد المهام هنا).</div>
    <div class="en">🇬🇧 Notice <code>document.createElement()</code> — another way to build HTML elements from JavaScript instead of writing ready-made text, useful when the count is not known ahead of time (like the number of tasks here).</div>
</div>

<h3>المعاينة الفعلية / Actual Rendered Output — التطبيق كامل وشغال</h3>
<iframe class="render-box" style="height:360px" sandbox="allow-scripts" srcdoc='<html><head><style>body{font-family:sans-serif;padding:16px;margin:0}.todo-app{max-width:340px}.todo-input{display:flex;gap:8px;margin-bottom:14px}.todo-input input{flex:1;padding:8px;border-radius:6px;border:1px solid #ccc}.todo-input button{padding:8px 14px;border:none;border-radius:6px;background:#6c8bff;color:white;cursor:pointer}#taskList{list-style:none;padding:0;display:flex;flex-direction:column;gap:8px}#taskList li{display:flex;align-items:center;justify-content:space-between;background:#f5f5f5;padding:8px 12px;border-radius:6px}#taskList li.done span{text-decoration:line-through;color:#999}#taskList li .remove-btn{background:none;border:none;color:#ff6b6b;cursor:pointer;font-size:16px}</style></head><body dir="rtl"><div class="todo-app"><h2>قائمة مهامي</h2><div class="todo-input"><input type="text" id="taskInput" placeholder="اكتب مهمة جديدة..."><button id="addBtn">إضافة</button></div><ul id="taskList"></ul></div><script>let tasks=[{text:"تعلم HTML و CSS",done:true},{text:"تعلم JavaScript",done:false}];const taskList=document.getElementById("taskList");const taskInput=document.getElementById("taskInput");const addBtn=document.getElementById("addBtn");function render(){taskList.innerHTML="";tasks.forEach(function(task,index){const li=document.createElement("li");if(task.done)li.classList.add("done");const span=document.createElement("span");span.textContent=task.text;span.addEventListener("click",function(){task.done=!task.done;render();});const removeBtn=document.createElement("button");removeBtn.className="remove-btn";removeBtn.textContent="✕";removeBtn.addEventListener("click",function(){tasks.splice(index,1);render();});li.appendChild(span);li.appendChild(removeBtn);taskList.appendChild(li);});}addBtn.addEventListener("click",function(){const text=taskInput.value.trim();if(text==="")return;tasks.push({text:text,done:false});taskInput.value="";render();});render();<\/script></body></html>'></iframe>
<div class="bi-block">
    <div class="en">🇬🇧 Try it: type a task and click "إضافة" (Add), click a task's text to mark it done (strikethrough), and click ✕ to remove it. Two sample tasks are pre-loaded so you can try toggling/removing immediately.</div>
</div>

<div class="bi-block">
    <div class="ar">🇪🇬 دلوقتي جرّب الكود نفسه في محرر حي — بدّل بين تبويبات HTML وCSS وJavaScript، عدّل أي سطر، وشوف التطبيق بيتحدث فورًا.</div>
    <div class="en">🇬🇧 Now try the exact same code in a live editor — switch between the HTML, CSS, and JavaScript tabs, edit any line, and watch the app update instantly.</div>
</div>
<div class="mini-fe-editor">
    <div class="fe-tabs">
        <button class="fe-tab active" data-tab="html">HTML</button>
        <button class="fe-tab" data-tab="css">CSS</button>
        <button class="fe-tab" data-tab="js">JavaScript</button>
    </div>
    <textarea class="fe-code" data-tab="html" spellcheck="false">&lt;div class="todo-app"&gt;
    &lt;h2&gt;قائمة مهامي&lt;/h2&gt;
    &lt;div class="todo-input"&gt;
        &lt;input type="text" id="taskInput" placeholder="اكتب مهمة جديدة..."&gt;
        &lt;button id="addBtn"&gt;إضافة&lt;/button&gt;
    &lt;/div&gt;
    &lt;ul id="taskList"&gt;&lt;/ul&gt;
&lt;/div&gt;</textarea>
    <textarea class="fe-code" data-tab="css" style="display:none" spellcheck="false">body { font-family: sans-serif; padding: 16px; margin: 0; }
.todo-app { max-width: 340px; }
.todo-input { display: flex; gap: 8px; margin-bottom: 14px; }
.todo-input input { flex: 1; padding: 8px; border-radius: 6px; border: 1px solid #ccc; }
.todo-input button { padding: 8px 14px; border: none; border-radius: 6px; background: #6c8bff; color: white; cursor: pointer; }
#taskList { list-style: none; padding: 0; display: flex; flex-direction: column; gap: 8px; }
#taskList li { display: flex; align-items: center; justify-content: space-between; background: #f5f5f5; padding: 8px 12px; border-radius: 6px; }
#taskList li.done span { text-decoration: line-through; color: #999; }
#taskList li .remove-btn { background: none; border: none; color: #ff6b6b; cursor: pointer; font-size: 16px; }</textarea>
    <textarea class="fe-code" data-tab="js" style="display:none" spellcheck="false">let tasks = [{ text: "تعلم HTML و CSS", done: true }, { text: "تعلم JavaScript", done: false }];
const taskList = document.getElementById("taskList");
const taskInput = document.getElementById("taskInput");
const addBtn = document.getElementById("addBtn");

function render() {
    taskList.innerHTML = "";
    tasks.forEach(function (task, index) {
        const li = document.createElement("li");
        if (task.done) li.classList.add("done");

        const span = document.createElement("span");
        span.textContent = task.text;
        span.addEventListener("click", function () {
            task.done = !task.done;
            render();
        });

        const removeBtn = document.createElement("button");
        removeBtn.className = "remove-btn";
        removeBtn.textContent = "✕";
        removeBtn.addEventListener("click", function () {
            tasks.splice(index, 1);
            render();
        });

        li.appendChild(span);
        li.appendChild(removeBtn);
        taskList.appendChild(li);
    });
}

addBtn.addEventListener("click", function () {
    const text = taskInput.value.trim();
    if (text === "") return;
    tasks.push({ text: text, done: false });
    taskInput.value = "";
    render();
});

render();</textarea>
    <iframe class="render-box mini-fe-preview" style="height:330px" sandbox="allow-scripts"></iframe>
</div>

<div class="exercise-box">
    <h3>✍️ تمرين عملي / Hands-on Exercise</h3>
    <div class="ar">🇪🇬 انسخ الكود الثلاثي (HTML/CSS/JS) في <a href="../playground/index.php">محرر الكود</a> وضيف عليه: عدّاد بيقول "باقي X مهام"، وزرار "امسح المخلّص كله" بيشيل كل المهام اللي <code>done</code> بتاعتها true.</div>
    <div class="en">🇬🇧 Copy the three code blocks (HTML/CSS/JS) into the <a href="../playground/index.php">Playground</a> and add: a counter showing "X tasks remaining", and a "Clear Completed" button that removes every task where <code>done</code> is true.</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="splice">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">أنهي method بتستخدم عشان تشيل مهمة من مصفوفة <code>tasks</code> حسب مكانها (index)؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Which method removes a task from the <code>tasks</code> array by its index?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="push"> push()</label>
        <label><input type="radio" name="q1" value="splice"> splice()</label>
        <label><input type="radio" name="q1" value="pop"> shift()</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="render">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">بعد ما نضيف أو نمسح مهمة من المصفوفة، إيه اللي بيرسم القائمة تاني على الشاشة؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">After adding or removing a task from the array, what redraws the list on screen?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="reload"> إعادة تحميل الصفحة تلقائيًا</label>
        <label><input type="radio" name="q2" value="render"> استدعاء دالة render() اللي بتمسح وتعيد بناء الـ HTML</label>
        <label><input type="radio" name="q2" value="css"> CSS لوحده</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ فلتر "المتبقي فقط" / Build an "Active Only" Filter</h3>
    <div class="ar">🇪🇬 استخدم <a href="../playground/index.php">محرر الكود</a> (أو المحرر المصغّر فوق) وزوّد زرار "أظهر المتبقي فقط" بيستخدم <code>tasks.filter(t =&gt; !t.done)</code> جوه <code>render()</code> عشان يعرض بس المهام اللي لسه مش خلصانة، مع زرار "أظهر الكل" يرجّع القائمة كاملة.</div>
    <div class="en">🇬🇧 Use the <a href="../playground/index.php">Playground</a> (or the mini editor above) and add a "Show Active Only" button that uses <code>tasks.filter(t => !t.done)</code> inside <code>render()</code> to show only unfinished tasks, plus a "Show All" button that restores the full list.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 التطبيق ده هو أهم جسر في المسار كله: نمط "غيّر البيانات، ثم أعد رسم الشاشة كلها" اللي بنيته هنا يدويًا بـ <code>render()</code> هو بالحرف نفس فكرة الـ Reactivity في Vue.js اللي هتشوفها في آخر مرحلة — الفرق إن Vue بيعمل الجزء الممل ده أوتوماتيك بدل ما تكتبه بنفسك.</div>
    <div class="en">🇬🇧 This app is the most important bridge in the whole track: the "change the data, then redraw the whole screen" pattern you built manually here with <code>render()</code> is exactly the same idea as Vue.js's Reactivity, which you'll meet in the final stage — the difference is Vue automates that tedious part instead of you writing it by hand.</div>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>البيانات في مصفوفة (<code>tasks</code>)، والشاشة دايمًا بتتبني منها بدالة <code>render()</code> واحدة.</li>
        <li>إضافة = <code>push()</code> على المصفوفة. حذف = <code>splice()</code>. تعديل = تغيير خاصية الـ Object مباشرة.</li>
        <li><code>document.createElement()</code> لبناء عناصر ديناميكيًا بعدد غير معروف مسبقًا.</li>
        <li>ده بالظبط نفس فكرة "الحالة (State) بتحدد الشاشة" في React وVue، لكن بأدوات JavaScript الخام.</li>
    </ul>
</div>

<div class="nav-buttons">
    <a href="javascript-practice.php">← المرحلة السابقة</a>
    <a href="responsive.php">المرحلة الجاية / Next: Responsive Design →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
