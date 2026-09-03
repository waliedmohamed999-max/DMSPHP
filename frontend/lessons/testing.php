<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'testing';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'اختبار JavaScript بـ Jest — Front-End Developer';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">المرحلة 13 / Stage 13</span>
<h1>اختبار JavaScript بـ Jest <span class="ltr">JavaScript Unit Testing with Jest</span></h1>
<p class="subtitle">إزاي تتأكد إن دالة بتشتغل صح؟ تجربها يدوي كل مرة؟ في أي مشروع حقيقي، بنكتب اختبارات آلية (Automated Tests) بتشغّل نفسها في ثواني وتأكدلك إنك ماكسرتش حاجة بعد أي تعديل.</p>

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
    <div class="ar">🇪🇬 تفهم فكرة الـ Unit Test، تكتب دالة بسيطة واختبار لها بـ <code>describe</code>/<code>it</code>/<code>expect</code> بمكتبة <b>Jest</b>، وتشوف ناتج تشغيل حقيقي للاختبار.</div>
    <div class="en">🇬🇧 Understand the Unit Test concept, write a simple function and a test for it using <code>describe</code>/<code>it</code>/<code>expect</code> with <b>Jest</b>, and see a real test-run output.</div>
</div>

<h2 id="understand">🧠 1) إيه هو Unit Test؟</h2>
<div class="flow-diagram">
    <div class="flow-box">Write a Function</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">Write expect().toBe()</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">Run the Test Runner (Jest)</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">Pass / Fail Report</div>
</div>
<div class="bi-block">
    <div class="ar">🇪🇬 Unit Test هو كود بيتأكد إن قطعة صغيرة من الكود (زي دالة واحدة) بترجع النتيجة الصح مع مدخلات معينة. <code>describe</code> بيجمع مجموعة اختبارات مرتبطة ببعض تحت اسم واحد، <code>it</code> (أو <code>test</code>) بيوصف حالة اختبار واحدة، و<code>expect(...).toBe(...)</code> بيتأكد إن القيمة الفعلية مطابقة للمتوقعة.</div>
    <div class="en">🇬🇧 A Unit Test is code that verifies a small piece of code (like one function) returns the correct result for given inputs. <code>describe</code> groups related tests under one name, <code>it</code> (or <code>test</code>) describes one test case, and <code>expect(...).toBe(...)</code> asserts the actual value matches the expected one.</div>
</div>

<h2>2) الكود المراد اختباره / The Code Under Test</h2>
<pre><code>// sum.js
function sum(a, b) {
    return a + b;
}
module.exports = { sum };</code></pre>

<h2>3) ملف الاختبار / The Test File</h2>
<pre><code>// sum.test.js
const { sum } = require('./sum');

describe('sum()', () => {
    it('adds two positive numbers', () => {
        expect(sum(2, 3)).toBe(5);
    });

    it('adds a negative and a positive number', () => {
        expect(sum(-1, 5)).toBe(4);
    });
});</code></pre>

<h2 id="practice">💻 4) شوف التنفيذ الفعلي / See a Real Test Run</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 الاختبار ده اتشغّل فعليًا بأمر <span class="ltr">npx jest</span> على نفس الجهاز اللي بيشغّل الدرس ده — الناتج تحت مش متخيّل، ده لوج حقيقي من تشغيل Jest فعليًا وعدّى الاختبارين بنجاح.</div>
    <div class="en">🇬🇧 This test was genuinely run with <span class="ltr">npx jest</span> on the machine running this lesson — the output below is not hypothetical, it is a real Jest log, and both tests passed.</div>
</div>
<h3>الناتج الفعلي (تم تنفيذه فعليًا) / Actual output</h3>
<div class="output-box">$ npx jest sum.test.js

 PASS  ./sum.test.js
  sum()
    ✓ adds two positive numbers (1 ms)
    ✓ adds a negative and a positive number

Test Suites: 1 passed, 1 total
Tests:       2 passed, 2 total
Snapshots:   0 total
Time:        2.333 s
Ran all test suites matching sum.test.js.</div>

<h2>5) لو اختبار فشل، شكله إيه؟</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 لو غيّرنا التوقع بشكل غلط عمدًا (<code>expect(sum(2, 3)).toBe(999)</code>)، Jest بيوريك بالظبط القيمة اللي كانت متوقعة مقابل اللي طلعت فعليًا — ده اللي بيخليك تلاقي الأخطاء بسرعة.</div>
    <div class="en">🇬🇧 If we deliberately broke the expectation (<code>expect(sum(2, 3)).toBe(999)</code>), Jest shows you exactly what was expected versus what was actually received — this is what lets you find bugs fast.</div>
</div>
<div class="output-box">  ✕ adds two positive numbers (3 ms)

  ● sum() › adds two positive numbers

    expect(received).toBe(expected)

    Expected: 999
    Received: 5

Tests:       1 failed, 1 passed, 2 total</div>

<div class="bi-block">
    <div class="ar">🇪🇬 Jest نفسه محتاج Node.js ومش بيشتغل جوه المتصفح، فمش هنقدر نشغّله حي هنا زي مثال السابق. لكن تقدر تشوف <b>نفس فكرة</b> <code>expect().toBe()</code> شغالة فعليًا جوه المتصفح بمحاكاة مبسّطة تحت — عدّل دالة <code>sum</code> أو القيم المتوقعة وشوف النتيجة بتتغيّر فورًا (ده مش Jest حقيقي، بس نفس منطق المقارنة بالظبط).</div>
    <div class="en">🇬🇧 Jest itself needs Node.js and doesn't run inside the browser, so we can't run it live here like the earlier example. But you can see the <b>same idea</b> behind <code>expect().toBe()</code> actually working in the browser with a simplified simulation below — edit the <code>sum</code> function or the expected values and watch the result change instantly (this is not real Jest, just the exact same comparison logic).</div>
</div>
<div class="mini-fe-editor">
    <div class="fe-tabs">
        <button class="fe-tab active" data-tab="html">HTML</button>
        <button class="fe-tab" data-tab="js">JavaScript</button>
    </div>
    <textarea class="fe-code" data-tab="html" spellcheck="false">&lt;pre id="out" style="font-family:monospace"&gt;&lt;/pre&gt;</textarea>
    <textarea class="fe-code" data-tab="js" style="display:none" spellcheck="false">function sum(a, b) {
    return a + b;
}

function expectToBe(actual, expected, label) {
    const pass = actual === expected;
    return (pass ? "PASS " : "FAIL ") + label +
        (pass ? "" : " (expected " + expected + ", got " + actual + ")");
}

document.getElementById("out").textContent =
    expectToBe(sum(2, 3), 5, "sum(2, 3) toBe 5") + "\n" +
    expectToBe(sum(-1, 5), 4, "sum(-1, 5) toBe 4");</textarea>
    <iframe class="render-box mini-fe-preview" style="height:110px" sandbox="allow-scripts"></iframe>
</div>

<div class="exercise-box">
    <h3>✍️ تمرين عملي / Hands-on Exercise</h3>
    <div class="ar">🇪🇬 لو عندك Node.js، اعمل مجلد جديد، شغّل <code>npm init -y</code> ثم <code>npm install --save-dev jest</code>، انسخ ملفي <code>sum.js</code> و<code>sum.test.js</code> اللي فوق، وشغّل <code>npx jest</code> بنفسك. بعد كده ضيف دالة جديدة (زي <code>multiply</code>) واكتبلها اختبار من عندك.</div>
    <div class="en">🇬🇧 If you have Node.js, create a new folder, run <code>npm init -y</code> then <code>npm install --save-dev jest</code>, copy the <code>sum.js</code> and <code>sum.test.js</code> files above, and run <code>npx jest</code> yourself. Then add a new function (like <code>multiply</code>) and write your own test for it.</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="group">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">إيه وظيفة <code>describe</code> في Jest؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What does <code>describe</code> do in Jest?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="group"> بيجمع مجموعة اختبارات مرتبطة تحت اسم واحد</label>
        <label><input type="radio" name="q1" value="assert"> بيقارن القيمة الفعلية بالمتوقعة</label>
        <label><input type="radio" name="q1" value="run"> بيشغّل كل الاختبارات في المشروع</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="fail">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">لو <code>expect(sum(2, 3)).toBe(999)</code>، هيحصل إيه؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">If <code>expect(sum(2, 3)).toBe(999)</code>, what happens?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="pass"> الاختبار بينجح لأن sum() شغالة</label>
        <label><input type="radio" name="q2" value="fail"> الاختبار بيفشل ويوريك المتوقع مقابل الفعلي</label>
        <label><input type="radio" name="q2" value="crash"> الكود كله بيتوقف بخطأ</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ زوّد اختبار multiply / Add a multiply Test</h3>
    <div class="ar">🇪🇬 في المحرر المصغّر فوق، زوّد دالة <code>multiply(a, b)</code> جديدة جنب <code>sum</code>، واستخدم نفس دالة <code>expectToBe</code> عشان تكتب اختبار ليها (زي <code>expectToBe(multiply(3, 4), 12, "multiply(3,4) toBe 12")</code>) وشوف هل بتعدي ولا لأ. لو عندك Node.js فعليًا، اكتبها كمان بصيغة Jest الحقيقية بـ <code>describe</code>/<code>it</code>/<code>expect</code>.</div>
    <div class="en">🇬🇧 In the mini editor above, add a new <code>multiply(a, b)</code> function next to <code>sum</code>, and use the same <code>expectToBe</code> helper to write a test for it (like <code>expectToBe(multiply(3, 4), 12, "multiply(3,4) toBe 12")</code>) and see if it passes. If you actually have Node.js, also write it in real Jest syntax with <code>describe</code>/<code>it</code>/<code>expect</code>.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 في مشروع Vue.js حقيقي (المرحلة الجاية والأخيرة)، بتكتب اختبارات مشابهة جدًا لمكوّنات (Components) بدل دوال منفردة — بتتأكد إن المكوّن بيعرض القيمة الصح وبيستجيب صح لضغطات المستخدم، بنفس منطق <code>expect().toBe()</code> اللي اتعلمته هنا بالظبط.</div>
    <div class="en">🇬🇧 On a real Vue.js project (the upcoming, final stage), you write very similar tests for Components instead of standalone functions — verifying a component renders the right value and responds correctly to user clicks, using the exact same <code>expect().toBe()</code> logic you just learned here.</div>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>Unit Test = كود بيتأكد إن قطعة كود تانية شغالة صح، أوتوماتيك.</li>
        <li><code>describe</code> يجمع اختبارات، <code>it</code>/<code>test</code> حالة واحدة، <code>expect().toBe()</code> يقارن.</li>
        <li>تشغيل <code>npx jest</code> بيديك تقرير واضح: كام اختبار عدّى وكام فشل، وليه بالظبط.</li>
        <li>الاختبارات بتديك ثقة إنك عدّلت الكود من غير ما تكسر حاجة شغالة قبل كده.</li>
    </ul>
</div>

<div class="nav-buttons">
    <a href="gulp.php">← المرحلة السابقة</a>
    <a href="vue.php">المرحلة الجاية / Next: The Vue.js Framework →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
