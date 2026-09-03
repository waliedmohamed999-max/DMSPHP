<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'pug';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'تعلم Pug.js — Front-End Developer';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">المرحلة 11 / Stage 11</span>
<h1>تعلم Pug.js <span class="ltr">Learn Pug.js</span></h1>
<p class="subtitle">Pug طريقة مختصرة لكتابة HTML: من غير أقواس مدببة ولا وسوم إغلاق، بس بالمسافات البادئة (Indentation) — ومعاها مزايا برمجية زي حلقات التكرار والشروط جوه الكتابة نفسها.</p>

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
    <div class="ar">🇪🇬 تفهم إن Pug هو <b>Template Engine</b> — يعني بيتحوّل (Compile) لـ HTML عادي في النهاية، تمامًا زي SASS بيتحول لـ CSS. تتعلم أساسيات الصيغة: الإزاحة بدل الوسوم، و<code>each</code> للتكرار، و<code>if</code> للشرط.</div>
    <div class="en">🇬🇧 Understand that Pug is a <b>Template Engine</b> — it compiles down to plain HTML, exactly like SASS compiles to CSS. Learn the basics: indentation instead of tags, <code>each</code> for loops, and <code>if</code> for conditions.</div>
</div>

<h2>1) الصيغة الأساسية / Basic Syntax</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 مفيش <code>&lt;</code> ولا <code>&gt;</code> ولا وسوم إغلاق. اسم الوسم لوحده في بداية السطر، والمسافة البادئة (Indentation) هي اللي بتحدد إن العنصر جوه عنصر تاني. النص بعد اسم الوسم مباشرة بيبقى محتواه.</div>
    <div class="en">🇬🇧 No <code>&lt;</code>, no <code>&gt;</code>, no closing tags. Just the tag name at the start of a line, and indentation determines nesting. Text right after the tag name becomes its content.</div>
</div>

<h2 id="understand">🧠 2) التكرار والشرط / Loops &amp; Conditions</h2>
<div class="flow-diagram">
    <div class="flow-box">page.pug (Pug Source)</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">Pug Compiler</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">page.html (Plain HTML)</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">Browser Renders It</div>
</div>
<div class="bi-block">
    <div class="ar">🇪🇬 <code>each item in [...]</code> بيكرر السطر اللي جواه لكل عنصر في المصفوفة — مفيد جدًا بدل ما تكتب <code>&lt;li&gt;</code> كذا مرة يدوي. <code>if</code> بيتحكم في ظهور جزء من الصفحة حسب شرط، بالظبط زي أي لغة برمجة.</div>
    <div class="en">🇬🇧 <code>each item in [...]</code> repeats the line inside it for every array element — much better than writing <code>&lt;li&gt;</code> repeatedly by hand. <code>if</code> controls whether part of the page appears, exactly like any programming language.</div>
</div>

<h2 id="practice">💻 3) شوف التحويل الفعلي / See a Real Compilation</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 المثال ده اتحوّل فعليًا باستخدام <code>pug-cli</code> على نفس الجهاز اللي بيشغّل الدرس ده — الناتج تحت مش متخيّل، ده ملف HTML حقيقي طلع من أمر <span class="ltr">pug page.pug --pretty</span>.</div>
    <div class="en">🇬🇧 This example was genuinely compiled using <code>pug-cli</code> on the machine running this lesson — the output below is not hypothetical, it is a real HTML file produced by <span class="ltr">pug page.pug --pretty</span>.</div>
</div>
<h3>مدخل Pug / Pug Input (page.pug)</h3>
<pre><code>doctype html
html(lang="ar" dir="rtl")
    head
        title صفحة Pug
    body
        h1 أهلاً بيك
        ul
            each item in ['HTML', 'CSS', 'JavaScript']
                li= item
        if true
            p هذه الفقرة اتكتبت بشرط if في Pug</code></pre>
<h3>الناتج الفعلي (تم تنفيذه فعليًا بأمر <span class="ltr">pug page.pug --pretty</span>) / Actual compiled HTML output</h3>
<div class="output-box">&lt;!DOCTYPE html&gt;
&lt;html lang="ar" dir="rtl"&gt;
  &lt;head&gt;
    &lt;title&gt;صفحة Pug&lt;/title&gt;
  &lt;/head&gt;
  &lt;body&gt;
    &lt;h1&gt;أهلاً بيك&lt;/h1&gt;
    &lt;ul&gt;
      &lt;li&gt;HTML&lt;/li&gt;
      &lt;li&gt;CSS&lt;/li&gt;
      &lt;li&gt;JavaScript&lt;/li&gt;
    &lt;/ul&gt;
    &lt;p&gt;هذه الفقرة اتكتبت بشرط if في Pug&lt;/p&gt;
  &lt;/body&gt;
&lt;/html&gt;</div>

<h3>المعاينة الفعلية للـ HTML المُترجَم / Actual Rendered Output of the Compiled HTML</h3>
<iframe class="render-box" style="height:170px" sandbox srcdoc='<html lang="ar" dir="rtl"><head><title>صفحة Pug</title><style>body{font-family:sans-serif;padding:14px}</style></head><body><h1>أهلاً بيك</h1><ul><li>HTML</li><li>CSS</li><li>JavaScript</li></ul><p>هذه الفقرة اتكتبت بشرط if في Pug</p></body></html>'></iframe>

<div class="bi-block">
    <div class="ar">🇪🇬 المتصفح مايفهمش صيغة Pug نفسها، فمش هنقدر نشغّل <code>.pug</code> حي هنا. لكن الـ HTML الناتج فوق هو HTML عادي 100% — جرّب عدّله مباشرة تحت (زوّد <code>&lt;li&gt;</code> جديد زي ما كان <code>each</code> هيعمل) وشوف النتيجة فورًا.</div>
    <div class="en">🇬🇧 The browser can't understand Pug's own syntax, so we can't run live <code>.pug</code> here. But the resulting HTML above is 100% plain HTML — try editing it directly below (add a new <code>&lt;li&gt;</code>, just like <code>each</code> would generate) and see the result instantly.</div>
</div>
<div class="mini-fe-editor">
    <textarea class="fe-code" data-tab="html" spellcheck="false">&lt;h1&gt;أهلاً بيك&lt;/h1&gt;
&lt;ul&gt;
    &lt;li&gt;HTML&lt;/li&gt;
    &lt;li&gt;CSS&lt;/li&gt;
    &lt;li&gt;JavaScript&lt;/li&gt;
&lt;/ul&gt;
&lt;p&gt;هذه الفقرة اتكتبت بشرط if في Pug&lt;/p&gt;</textarea>
    <iframe class="render-box mini-fe-preview" style="height:170px" sandbox></iframe>
</div>

<div class="exercise-box">
    <h3>✍️ تمرين عملي / Hands-on Exercise</h3>
    <div class="ar">🇪🇬 لو عندك Node.js، جرّب <code>npm install -g pug-cli</code>، اكتب ملف <code>card.pug</code> بيستخدم <code>each</code> عشان يطلع 3 بطاقات من مصفوفة أسماء، وشغّله بـ <code>pug card.pug</code> وشوف ملف الـ HTML الناتج.</div>
    <div class="en">🇬🇧 If you have Node.js, try <code>npm install -g pug-cli</code>, write a <code>card.pug</code> file that uses <code>each</code> to output 3 cards from a names array, then compile it with <code>pug card.pug</code> and inspect the resulting HTML file.</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="indentation">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">إيه اللي بيحدد إن عنصر جوه عنصر تاني في Pug، بدل الأقواس المدببة؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">In Pug, what determines nesting instead of angle brackets?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="indentation"> المسافة البادئة / Indentation</label>
        <label><input type="radio" name="q1" value="brackets"> أقواس معقوفة { }</label>
        <label><input type="radio" name="q1" value="semicolons"> فواصل منقوطة ;</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="each">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">إيه الكلمة اللي بتكرر سطر لكل عنصر في مصفوفة في Pug؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Which keyword repeats a line for every element in an array in Pug?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="if"> if</label>
        <label><input type="radio" name="q2" value="each"> each</label>
        <label><input type="radio" name="q2" value="doctype"> doctype</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ ترجم بمخّك / Compile It With Your Own Head</h3>
    <div class="ar">🇪🇬 من غير ما تشغّل أي أداة، خد كود Pug ده واكتب الـ HTML الناتج منه بنفسك (على ورقة أو في المحرر المصغّر فوق): سطر <code>ul</code>، وجواه (بإزاحة) <code>each name in ['Ali', 'Sara']</code>، وجواه (بإزاحة أكبر) <code>li= name</code> — كام <code>&lt;li&gt;</code> المفروض يطلع، وبإيه جواه؟</div>
    <div class="en">🇬🇧 Without running any tool, take this Pug code and write out the resulting HTML yourself (on paper or in the mini editor above): a line <code>ul</code>, then indented under it <code>each name in ['Ali', 'Sara']</code>, then further indented <code>li= name</code> — how many <code>&lt;li&gt;</code> elements should result, and with what content?</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 Pug نادرًا ما بتتشغل يدويًا بأمر واحد في مشروع حقيقي — هي بتتضاف كخطوة جوه Task Runner زي Gulp (المرحلة الجاية بالظبط)، فبتتحول لـ HTML أوتوماتيك كل ما تحفظ ملف <code>.pug</code>، بالظبط زي SASS.</div>
    <div class="en">🇬🇧 Pug is rarely run manually with a single command on a real project — it gets added as a step inside a Task Runner like Gulp (exactly the next stage), so it compiles to HTML automatically every time you save a <code>.pug</code> file, just like SASS.</div>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>Pug = Template Engine بيتحوّل (Compile) لـ HTML عادي.</li>
        <li>الإزاحة (Indentation) بتحل محل الأقواس المدببة ووسوم الإغلاق.</li>
        <li><code>each ... in [...]</code> للتكرار، <code>if</code> للشرط — مزايا برمجية حقيقية جوه كتابة HTML.</li>
    </ul>
</div>

<div class="nav-buttons">
    <a href="sass.php">← المرحلة السابقة</a>
    <a href="gulp.php">المرحلة الجاية / Next: Learn Gulp.js →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
