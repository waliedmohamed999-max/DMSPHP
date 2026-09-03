<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'gulp';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'تعلم Gulp.js — Front-End Developer';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">المرحلة 12 / Stage 12</span>
<h1>تعلم Gulp.js <span class="ltr">Learn Gulp.js</span></h1>
<p class="subtitle">كل ما مشروعك يكبر، بتلاقي نفسك بتعمل نفس الخطوات المملة يدوي كل مرة: ضغط CSS، دمج ملفات، تصغير صور. Gulp بيخليك تكتب الخطوات دي مرة واحدة كـ "مهام" (Tasks) وبعدين تشغّلها بأمر واحد.</p>

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
    <div class="ar">🇪🇬 تفهم فكرة Task Runner، وتقرأ <code>gulpfile.js</code> بسيط بيضغط ملف CSS، وتعرف الفرق بين ملفات المصدر (Source) وملفات الإنتاج (Dist/Build) في أي مشروع احترافي.</div>
    <div class="en">🇬🇧 Understand the Task Runner concept, read a simple <code>gulpfile.js</code> that minifies a CSS file, and know the difference between Source files and Dist/Build files in any professional project.</div>
</div>

<h2 id="understand">🧠 1) إيه هو Task Runner؟</h2>
<div class="flow-diagram">
    <div class="flow-box">src('src/css/style.css')</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">.pipe(cleanCSS())</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">.pipe(rename())</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">dest('dist/css')</div>
</div>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>Gulp</b> أداة بتشتغل بـ Node.js، وبتخليك تكتب "مهمة" (Task) — مجموعة خطوات على ملفاتك — مرة واحدة في كود، بدل ما تعملها يدويًا في كل مرة. المهمة بتاخد ملفات من مجلد (مثلًا <code>src/</code>)، تعالجها، وتحطها في مجلد تاني (مثلًا <code>dist/</code>).</div>
    <div class="en">🇬🇧 <b>Gulp</b> is a Node.js tool that lets you write a "Task" — a set of steps over your files — once in code, instead of doing it manually every time. A task takes files from a folder (e.g. <code>src/</code>), processes them, and writes them to another folder (e.g. <code>dist/</code>).</div>
</div>
<div class="bi-block">
    <div class="ar">🇪🇬 ملحوظة: تشغيل Gulp الفعلي بيحتاج بيئة Node.js وتثبيت حزم كتير، فمش هينفّذ هنا مباشرة — الجزء ده هنعرضه كمثال توضيحي واضح (Terminal Transcript) بدل معاينة حية، بالظبط زي أمثلة Docker وCI/CD في مسار الـ Backend.</div>
    <div class="en">🇬🇧 Note: actually running Gulp requires a Node.js environment and installing several packages, so it will not execute live here — this section is shown as a clearly-labeled illustrative Terminal Transcript instead of a live preview, exactly like the Docker and CI/CD examples in the Backend track.</div>
</div>

<h2 id="practice">💻 2) مثال — ضغط ملف CSS</h2>
<pre><code>// gulpfile.js
const { src, dest } = require('gulp');
const cleanCSS = require('gulp-clean-css');
const rename = require('gulp-rename');

function minifyCSS() {
    return src('src/css/style.css')
        .pipe(cleanCSS())
        .pipe(rename({ suffix: '.min' }))
        .pipe(dest('dist/css'));
}

exports.minifyCSS = minifyCSS;
exports.default = minifyCSS;</code></pre>
<h3>مثال توضيحي (Terminal Transcript) — تشغيل الأمر / Illustrative example — running the command</h3>
<div class="output-box">$ npx gulp minifyCSS

[12:04:21] Using gulpfile ~/project/gulpfile.js
[12:04:21] Starting 'minifyCSS'...
[12:04:21] Finished 'minifyCSS' after 38 ms

src/css/style.css   →   dist/css/style.min.css
   14.2 KB          →   9.6 KB   (32% smaller)</div>
<div class="bi-block">
    <div class="ar">🇪🇬 <code>src()</code> بيقرأ الملف المصدر، <code>.pipe()</code> بيمرره على خطوة معالجة (زي <code>cleanCSS()</code> اللي بتشيل المسافات والتعليقات)، و<code>dest()</code> بيحفظ النتيجة في مجلد الإنتاج. بنفس الطريقة تقدر تعمل مهام لدمج ملفات JS، تصغير صور، أو تحويل SASS لـ CSS أوتوماتيك.</div>
    <div class="en">🇬🇧 <code>src()</code> reads the source file, <code>.pipe()</code> passes it through a processing step (like <code>cleanCSS()</code>, which strips whitespace and comments), and <code>dest()</code> saves the result to the output folder. The same way, you can build tasks to bundle JS files, compress images, or auto-convert SASS to CSS.</div>
</div>

<div class="bi-block">
    <div class="ar">🇪🇬 محرر HTML/CSS/JS المصغّر اللي شفته في دروس تانية مش مناسب هنا — Gulp أداة Node.js محتاجة تثبيت حزم فعلي على جهازك، مش حاجة بتتشغل جوه المتصفح. لو عايز تجرب حاجة HTML/CSS/JS حية، استخدم <a href="../playground/index.php">محرر الكود الكامل</a> بدل كده. الممارسة الحقيقية هنا هي إنك "تتبّع" الأنبوب (Pipeline) بعينيك وتفهمه.</div>
    <div class="en">🇬🇧 The mini HTML/CSS/JS editor used in other lessons doesn't fit here — Gulp is a Node.js tool that needs real packages installed on your machine, not something that runs inside a browser. If you want to try live HTML/CSS/JS, use the <a href="../playground/index.php">full Playground</a> instead. The real practice here is tracing the pipeline with your own eyes and understanding it.</div>
</div>

<div class="exercise-box">
    <h3>✍️ تمرين عملي / Hands-on Exercise</h3>
    <div class="ar">🇪🇬 لو حابب تجرب فعليًا: اعمل مجلد مشروع جديد، شغّل <code>npm init -y</code> ثم <code>npm install --save-dev gulp gulp-clean-css gulp-rename</code>، انسخ الـ <code>gulpfile.js</code> اللي فوق، وحط أي ملف CSS في <code>src/css/</code>، وشغّل <code>npx gulp minifyCSS</code> وشوف الملف المضغوط بنفسك في <code>dist/css/</code>.</div>
    <div class="en">🇬🇧 If you want to try it for real: create a new project folder, run <code>npm init -y</code> then <code>npm install --save-dev gulp gulp-clean-css gulp-rename</code>, copy the <code>gulpfile.js</code> above, put any CSS file in <code>src/css/</code>, and run <code>npx gulp minifyCSS</code> to see the minified file yourself in <code>dist/css/</code>.</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="middle">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">في <code>src().pipe(cleanCSS()).pipe(rename()).dest()</code>، فين بالظبط بتحصل خطوة "المعالجة" (ضغط الملف)؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">In <code>src().pipe(cleanCSS()).pipe(rename()).dest()</code>, where exactly does the "processing" (minifying) step happen?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="start"> في src() نفسها</label>
        <label><input type="radio" name="q1" value="middle"> جوه أول .pipe()</label>
        <label><input type="radio" name="q1" value="end"> في dest() نفسها</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="dist">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">أنهي مجلد المفروض يحتوي الملفات المعالجة الجاهزة للإنتاج، مش الملفات الأصلية؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Which folder should hold the processed, production-ready files, not the originals?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="src"> src/</label>
        <label><input type="radio" name="q2" value="dist"> dist/</label>
        <label><input type="radio" name="q2" value="node_modules"> node_modules/</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ اكتب Task تاني بنفسك / Write a Second Task Yourself</h3>
    <div class="ar">🇪🇬 من غير ما تشغّلها لو مفيش عندك Node.js، اكتب (على ورقة أو في أي محرر نصوص) دالة <code>concatJS</code> جديدة في نفس الـ <code>gulpfile.js</code> بتاخد ملفين JS من <code>src/js/</code>، تدمجهم بمكتبة <code>gulp-concat</code>، وتحطهم في <code>dist/js/bundle.js</code> — إيه شكل الـ <code>.pipe()</code> اللي هتحتاجه؟</div>
    <div class="en">🇬🇧 Even without running it if you don't have Node.js, write (on paper or in any text editor) a new <code>concatJS</code> function in the same <code>gulpfile.js</code> that takes two JS files from <code>src/js/</code>, merges them with the <code>gulp-concat</code> package, and outputs to <code>dist/js/bundle.js</code> — what would the <code>.pipe()</code> chain look like?</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 دلوقتي شوف الصورة الكاملة: في مشروع Front-End احترافي حقيقي، بتكتب الصفحات بـ Pug، الشكل بـ SASS، وGulp (أو أداة زي Vite حديثًا) بيربط الاتنين — بيترجم كل ملفات <code>.pug</code> لـ HTML وكل ملفات <code>.scss</code> لـ CSS مضغوط أوتوماتيك كل ما تحفظ، وبعدين في مرحلة الاختبار (Testing) الجاية، Jest بيتأكد إن منطق الـ JavaScript شغال صح قبل ما ترفع أي حاجة. الأربع مراحل دي (Pug, SASS, Gulp, Testing) مع بعض هي "خط الإنتاج" الحقيقي.</div>
    <div class="en">🇬🇧 Now see the full picture: on a real professional Front-End project, you write pages in Pug, styling in SASS, and Gulp (or a modern tool like Vite) ties them together — automatically compiling every <code>.pug</code> file to HTML and every <code>.scss</code> file to minified CSS on every save, and then in the upcoming Testing stage, Jest verifies the JavaScript logic actually works before you ship anything. These four stages (Pug, SASS, Gulp, Testing) together are the real "production pipeline".</div>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>Gulp = Task Runner بيؤتمت الخطوات المتكررة (ضغط، دمج، تصغير) بدل تنفيذها يدويًا.</li>
        <li><code>src()</code> → <code>.pipe()</code> → <code>dest()</code> = القراءة، المعالجة، ثم الحفظ.</li>
        <li>الفصل بين <code>src/</code> (ملفاتك الأصلية) و<code>dist/</code> (الناتج النهائي المضغوط) = ممارسة أساسية في أي مشروع احترافي.</li>
    </ul>
</div>

<div class="nav-buttons">
    <a href="pug.php">← المرحلة السابقة</a>
    <a href="testing.php">المرحلة الجاية / Next: JavaScript Unit Testing →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
