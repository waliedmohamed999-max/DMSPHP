<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'vue';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'إطار العمل Vue.js — Front-End Developer';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">المرحلة 14 / Stage 14</span>
<h1>إطار العمل Vue.js <span class="ltr">The Vue.js Framework</span></h1>
<p class="subtitle">لو فاكر مشروع الـ To-Do List اللي بنيناه بـ JavaScript خام، فاكر إزاي كنا بنمسح ونعيد رسم القائمة كلها يدويًا كل مرة بدالة <code>render()</code>؟ Vue بياخد الفكرة دي ويعمل الجزء الممل ده أوتوماتيك، وده اسمه <b>Reactivity</b>.</p>

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
    <div class="ar">🇪🇬 تفهم فكرة الـ Reactivity الأساسية في Vue، تكتب أول تطبيق Vue بسيط باستخدام CDN من غير أي أدوات بناء، وتتعرف على <code>{{ }}</code> و<code>@click</code> و<code>v-model</code>.</div>
    <div class="en">🇬🇧 Understand Vue's core Reactivity idea, write your first simple Vue app using a CDN with no build tools, and meet <code>{{ }}</code>, <code>@click</code>, and <code>v-model</code>.</div>
</div>

<h2 id="understand">🧠 1) إضافة Vue من CDN — من غير أي تثبيت</h2>
<div class="flow-diagram">
    <div class="flow-box">Data Changes (count++)</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">Vue Detects the Change</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">Vue Updates the DOM Itself</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">Screen Reflects New Data</div>
</div>
<div class="bi-block">
    <div class="ar">🇪🇬 قارن ده بالدورة اللي كتبتها بإيدك في مشروع الـ To-Do List: هناك أنت اللي كنت بتستدعي <code>render()</code> يدويًا بعد كل تغيير. هنا Vue بيراقب الـ <code>data</code> ولما تتغيّر، بيحدّث الشاشة لوحده من غير ما تكتب سطر واحد إضافي.</div>
    <div class="en">🇬🇧 Compare this to the loop you wrote by hand in the To-Do List project: there, you manually called <code>render()</code> after every change. Here, Vue watches the <code>data</code> and updates the screen by itself the moment it changes, without you writing a single extra line.</div>
</div>
<div class="bi-block">
    <div class="ar">🇪🇬 زي Bootstrap وTailwind بالظبط، تقدر تضيف Vue بسكريبت واحد في الصفحة من غير أي تثبيت أو أدوات بناء (Build Tools) — مثالي للتعلم والتجربة السريعة. <code>createApp({...}).mount("#app")</code> بيربط تطبيق Vue بعنصر HTML معين، وأي حاجة جوّاه بقت "تحت إدارة" Vue.</div>
    <div class="en">🇬🇧 Just like Bootstrap and Tailwind, you can add Vue with a single script tag, no installation or build tools needed — perfect for learning and quick experiments. <code>createApp({...}).mount("#app")</code> attaches a Vue app to a specific HTML element, and everything inside it becomes "managed" by Vue.</div>
</div>
<pre><code>&lt;div id="app"&gt;
    &lt;p&gt;العداد: {{ count }}&lt;/p&gt;
    &lt;button @click="count++"&gt;زوّد +1&lt;/button&gt;
&lt;/div&gt;

&lt;script src="https://cdn.jsdelivr.net/npm/vue@3/dist/vue.global.js"&gt;&lt;/script&gt;
&lt;script&gt;
const { createApp } = Vue;

createApp({
    data() {
        return { count: 0 };
    }
}).mount("#app");
&lt;/script&gt;</code></pre>
<div class="bi-block">
    <div class="ar">🇪🇬 <code>{{ count }}</code> بيعرض قيمة <code>count</code> في الصفحة، و<code>@click="count++"</code> بيزوّد القيمة عند الضغط — ومن غير ما تكتب <code>querySelector</code> أو <code>textContent</code> يدوي زي قبل كده، Vue بيحدّث الشاشة لوحده لما البيانات تتغيّر. ده جوهر الـ Reactivity.</div>
    <div class="en">🇬🇧 <code>{{ count }}</code> displays <code>count</code>'s value on the page, and <code>@click="count++"</code> increments it on click — and without writing <code>querySelector</code> or <code>textContent</code> manually like before, Vue updates the screen by itself whenever the data changes. That is the essence of Reactivity.</div>
</div>
<h3>المعاينة الفعلية / Actual Rendered Output — تطبيق Vue حقيقي وشغال</h3>
<iframe class="render-box" style="height:130px" sandbox="allow-scripts" srcdoc='<html><head><script src="https://cdn.jsdelivr.net/npm/vue@3/dist/vue.global.js"><\/script><style>body{font-family:sans-serif;padding:16px;text-align:center}button{font-size:15px;padding:8px 16px;border-radius:8px;border:none;background:#42b883;color:white;cursor:pointer}p{font-size:18px;font-weight:700}</style></head><body dir="rtl"><div id="app"><p>العداد: {{ count }}</p><button @click="count++">زوّد +1</button></div><script>const{createApp}=Vue;createApp({data(){return{count:0};}}).mount("#app");<\/script></body></html>'></iframe>

<h2 id="practice">💻 2) الربط الثنائي / Two-Way Binding with v-model</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <code>v-model</code> بيربط قيمة مربع نص مباشرة بمتغير في الـ <code>data</code> — أي حرف تكتبه بيحدّث المتغير فورًا، وأي حتة تانية في الصفحة بتستخدم نفس المتغير بتتحدّث معاه في نفس اللحظة.</div>
    <div class="en">🇬🇧 <code>v-model</code> binds a text input's value directly to a <code>data</code> variable — every keystroke updates the variable instantly, and anywhere else on the page using that variable updates in that same instant.</div>
</div>
<pre><code>&lt;div id="app"&gt;
    &lt;input v-model="name" placeholder="اكتب اسمك..."&gt;
    &lt;p&gt;أهلاً، {{ name || "زائر" }}!&lt;/p&gt;
&lt;/div&gt;

&lt;script&gt;
createApp({
    data() {
        return { name: "" };
    }
}).mount("#app");
&lt;/script&gt;</code></pre>
<h3>المعاينة الفعلية / Actual Rendered Output</h3>
<iframe class="render-box" style="height:130px" sandbox="allow-scripts" srcdoc='<html><head><script src="https://cdn.jsdelivr.net/npm/vue@3/dist/vue.global.js"><\/script><style>body{font-family:sans-serif;padding:16px;text-align:center}input{font-size:15px;padding:8px;border-radius:6px;border:1px solid #ccc;text-align:center}p{font-size:18px;font-weight:700;margin-top:10px}</style></head><body dir="rtl"><div id="app"><input v-model="name" placeholder="اكتب اسمك..."><p>أهلاً، {{ name || "زائر" }}!</p></div><script>const{createApp}=Vue;createApp({data(){return{name:""};}}).mount("#app");<\/script></body></html>'></iframe>

<div class="bi-block">
    <div class="ar">🇪🇬 جرّب بنفسك: زوّد <code>&lt;p&gt;العداد × 2 = {{ count * 2 }}&lt;/p&gt;</code> جديد، أو غيّر <code>@click="count++"</code> لـ <code>@click="count--"</code>، وشوف Vue بيحدّث كل حاجة مبنية على <code>count</code> فورًا.</div>
    <div class="en">🇬🇧 Try it yourself: add a new <code>&lt;p&gt;Double = {{ count * 2 }}&lt;/p&gt;</code>, or change <code>@click="count++"</code> to <code>@click="count--"</code>, and watch Vue update everything based on <code>count</code> instantly.</div>
</div>
<div class="mini-fe-editor">
    <textarea class="fe-code" data-tab="html" spellcheck="false">&lt;script src="https://cdn.jsdelivr.net/npm/vue@3/dist/vue.global.js"&gt;&lt;/script&gt;
&lt;div id="app"&gt;
    &lt;input v-model="name" placeholder="اكتب اسمك..."&gt;
    &lt;p&gt;أهلاً، {{ name || "زائر" }}!&lt;/p&gt;
    &lt;p&gt;العداد: {{ count }}&lt;/p&gt;
    &lt;button @click="count++"&gt;زوّد +1&lt;/button&gt;
&lt;/div&gt;
&lt;script&gt;
const { createApp } = Vue;
createApp({
    data() {
        return { name: "", count: 0 };
    }
}).mount("#app");
&lt;/script&gt;</textarea>
    <iframe class="render-box mini-fe-preview" style="height:180px" sandbox="allow-scripts"></iframe>
</div>

<div class="exercise-box">
    <h3>✍️ تمرين عملي / Hands-on Exercise</h3>
    <div class="ar">🇪🇬 في <a href="../playground/index.php">محرر الكود</a>، حط سكريبت Vue من الـ CDN، وابني تطبيق بسيط: مربع نص لإضافة مهمة و<code>v-model</code> لقراءته، وزرار بيضيف النص لمصفوفة <code>tasks</code> في الـ <code>data</code> — وبعدها استخدم <code>v-for="task in tasks"</code> عشان تعرض القائمة (بدل الطريقة اليدوية اللي عملناها في مشروع JavaScript الخام).</div>
    <div class="en">🇬🇧 In the <a href="../playground/index.php">Playground</a>, add Vue from the CDN and build a simple app: a text input with <code>v-model</code>, and a button that pushes the text into a <code>tasks</code> array in <code>data</code> — then use <code>v-for="task in tasks"</code> to display the list (instead of the manual approach from the vanilla JavaScript project).</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="auto">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">في مشروع الـ To-Do List بـ JavaScript خام، كنت لازم تستدعي <code>render()</code> يدويًا بعد أي تغيير. في Vue، مين المسؤول عن تحديث الشاشة؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">In the vanilla JS To-Do List, you called <code>render()</code> manually. In Vue, what updates the screen?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="manual"> لازم تستدعي render() بنفسك برضو</label>
        <label><input type="radio" name="q1" value="auto"> Vue بيحدّث الشاشة أوتوماتيك لما الـ data تتغيّر</label>
        <label><input type="radio" name="q1" value="refresh"> لازم تعمل Refresh للصفحة</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="vmodel">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">أنهي directive اللي بتربط قيمة <code>&lt;input&gt;</code> مباشرة بمتغير في الـ <code>data</code> في الاتجاهين؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Which directive binds an <code>&lt;input&gt;</code>'s value directly to a <code>data</code> variable in both directions?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="click"> @click</label>
        <label><input type="radio" name="q2" value="vmodel"> v-model</label>
        <label><input type="radio" name="q2" value="mustache"> {{ }}</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ أعد بناء الـ To-Do List بـ Vue / Rebuild the To-Do List in Vue</h3>
    <div class="ar">🇪🇬 استخدم <a href="../playground/index.php">محرر الكود</a> (أو المحرر المصغّر فوق) وابني نسخة Vue من تطبيق قائمة المهام: مربع نص بـ <code>v-model</code>، زرار إضافة بيعمل <code>tasks.push(...)</code> على مصفوفة في الـ <code>data</code>، و<code>v-for="task in tasks"</code> لعرض القائمة — قارن كمية الكود دي بالكود اللي كتبته يدويًا في مشروع JavaScript الخام.</div>
    <div class="en">🇬🇧 Use the <a href="../playground/index.php">Playground</a> (or the mini editor above) and build a Vue version of the To-Do List app: a text input with <code>v-model</code>, an Add button that does <code>tasks.push(...)</code> on a <code>data</code> array, and <code>v-for="task in tasks"</code> to display the list — compare how much code this takes versus what you wrote by hand in the vanilla JavaScript project.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 وصلت لآخر مرحلة، وشفت الصورة كاملة: HTML للبنية، CSS للشكل، JavaScript الخام للمنطق اليدوي، وVue لأتمتة تحديث الشاشة. في مشروع حقيقي كبير، هتلاقي الأربعة دول شغالين مع بعض بالظبط زي ما شفتهم هنا — بالإضافة لـ SASS للتنظيم، Gulp/Vite للبناء، وJest للاختبار. المسار كله بنى عندك، خطوة بخطوة، فهم كل قطعة من القطع دي.</div>
    <div class="en">🇬🇧 You've reached the final stage, and seen the full picture: HTML for structure, CSS for style, vanilla JavaScript for manual logic, and Vue for automating screen updates. On a real large project, you'll find these four working together exactly as you saw here — plus SASS for organization, Gulp/Vite for building, and Jest for testing. This entire track built, step by step, an understanding of every one of these pieces.</div>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>Vue قابل للإضافة بسكريبت CDN واحد، من غير أدوات بناء، بالظبط زي Bootstrap/Tailwind.</li>
        <li>Reactivity = تغيّر البيانات بيحدّث الشاشة أوتوماتيك، من غير <code>querySelector</code> يدوي.</li>
        <li><code>{{ }}</code> لعرض قيمة، <code>@click</code> لحدث ضغطة، <code>v-model</code> لربط مربع نص ببيانات.</li>
        <li>مبروك — وصلت لآخر مرحلة في مسار Front-End Developer! 🎉</li>
    </ul>
</div>

<div class="nav-buttons">
    <a href="testing.php">← المرحلة السابقة</a>
    <a href="../index.php">لوحة الدروس / Dashboard</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
