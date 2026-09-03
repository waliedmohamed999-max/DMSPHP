<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'sass';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'تعلم SASS — Front-End Developer';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">المرحلة 10 / Stage 10</span>
<h1>تعلم SASS <span class="ltr">Learn SASS</span></h1>
<p class="subtitle">SASS لغة بتتحول لـ CSS عادي في الآخر، لكنها بتديك مزايا لغات البرمجة الحقيقية جواها: متغيرات، Nesting، وMixins — أشياء CSS العادي (لحد وقت قريب) ماكانش عنده.</p>

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
    <div class="ar">🇪🇬 تفهم إن SASS مش لغة بتشتغل في المتصفح مباشرة — لازم تتـ"ترجم" (Compile) لملف <code>.css</code> عادي الأول. وتتعلم أهم 3 مزايا: متغيرات، Nesting، وMixins.</div>
    <div class="en">🇬🇧 Understand that SASS does not run in the browser directly — it must be compiled to a regular <code>.css</code> file first. Learn its top 3 features: variables, nesting, and mixins.</div>
</div>

<h2>1) المتغيرات / Variables</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <code>$primary-color: #6c8bff;</code> بيعرّف قيمة تقدر تستخدمها في أي حتة تانية بالاسم بتاعها — لو غيّرت القيمة مرة واحدة، بتتغيّر في كل حتة استخدمتها فيها.</div>
    <div class="en">🇬🇧 <code>$primary-color: #6c8bff;</code> defines a value you can reuse anywhere by name — change it once, and it updates everywhere you used it.</div>
</div>

<h2 id="understand">🧠 2) التداخل / Nesting</h2>
<div class="flow-diagram">
    <div class="flow-box">style.scss (SASS Source)</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">sass Compiler</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">style.css (Plain CSS)</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">Browser Renders It</div>
</div>
<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ إن المتصفح مايعرفش يقرأ <code>.scss</code> أبدًا — لازم خطوة الـ Compile دي تحصل الأول (يدويًا بأمر، أو أوتوماتيك بأداة زي Gulp اللي هتشوفها بعد كده) قبل ما يوصل أي كود للمتصفح.</div>
    <div class="en">🇬🇧 Notice the browser never reads <code>.scss</code> directly — the Compile step must happen first (manually via a command, or automatically with a tool like Gulp which you'll see later) before any code reaches the browser.</div>
</div>
<div class="bi-block">
    <div class="ar">🇪🇬 في CSS العادي بتكرر اسم العنصر الأب كل مرة (<code>.card .title { }</code>). في SASS تقدر تكتب <code>.title</code> جوه <code>.card</code> مباشرة، وده بيخلي الكود أقرب لبنية الـ HTML وأسهل قراءة. <code>&amp;:hover</code> طريقة لكتابة حالة الـ hover للعنصر نفسه من غير ما تكرر اسمه.</div>
    <div class="en">🇬🇧 In plain CSS you repeat the parent selector each time (<code>.card .title { }</code>). In SASS you can nest <code>.title</code> directly inside <code>.card</code>, mirroring the HTML structure and making it more readable. <code>&amp;:hover</code> writes the element's own hover state without repeating its name.</div>
</div>

<h2>3) الـ Mixins — كود قابل لإعادة الاستخدام</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <code>@mixin</code> بيعرّف مجموعة خصائص CSS جاهزة تستدعيها في أي مكان بـ <code>@include</code> — زي دالة، لكن بترجع CSS بدل ما ترجع قيمة. مفيد جدًا لحاجات بتتكرر زي الظل (shadow) أو الحواف.</div>
    <div class="en">🇬🇧 <code>@mixin</code> defines a reusable group of CSS properties you invoke anywhere with <code>@include</code> — like a function, but it outputs CSS instead of returning a value. Great for repeated things like shadows or borders.</div>
</div>

<h2 id="practice">💻 4) شوف التحويل الفعلي / See a Real Compilation</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 الكود ده اتحوّل فعليًا باستخدام أداة <code>sass</code> الرسمية (إصدار 1.103.1) على نفس الجهاز اللي بيشغّل الدرس ده — مش مثال متخيّل، ده ناتج تشغيل حقيقي.</div>
    <div class="en">🇬🇧 The code below was genuinely compiled using the official <code>sass</code> CLI (version 1.103.1) on the machine running this lesson — not a hypothetical example, this is real compiler output.</div>
</div>
<h3>مدخل SASS / SASS Input (style.scss)</h3>
<pre><code>$primary-color: #6c8bff;
$radius: 10px;

@mixin card-shadow {
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
    border-radius: $radius;
}

.card {
    background: white;
    padding: 16px;
    @include card-shadow;

    .title {
        color: $primary-color;
        font-size: 1.2rem;
    }

    &:hover {
        @include card-shadow;
        transform: translateY(-2px);
    }
}</code></pre>
<h3>الناتج الفعلي (تم تنفيذه فعليًا بأمر <span class="ltr">sass style.scss compiled.css</span>) / Actual compiled CSS output</h3>
<div class="output-box">.card {
  background: white;
  padding: 16px;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
  border-radius: 10px;
}
.card .title {
  color: #6c8bff;
  font-size: 1.2rem;
}
.card:hover {
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
  border-radius: 10px;
  transform: translateY(-2px);
}</div>

<h3>المعاينة الفعلية للـ CSS المُترجَم / Actual Rendered Output of the Compiled CSS</h3>
<iframe class="render-box" style="height:150px" sandbox srcdoc='<html><head><style>body{font-family:sans-serif;padding:20px}.card{background:white;padding:16px;box-shadow:0 2px 8px rgba(0,0,0,0.15);border-radius:10px;max-width:220px}.card .title{color:#6c8bff;font-size:1.2rem}.card:hover{box-shadow:0 2px 8px rgba(0,0,0,0.15);border-radius:10px;transform:translateY(-2px)}</style></head><body dir="rtl"><div class="card"><div class="title">بطاقة SASS</div><p>حط الماوس فوق البطاقة وشوف تأثير الـ hover.</p></div></body></html>'></iframe>

<div class="bi-block">
    <div class="ar">🇪🇬 المتصفح مش بيفهم SASS، فمش هنقدر نشغّل <code>.scss</code> حي هنا. لكن الـ CSS المترجم اللي طلع فوق هو CSS عادي 100% — جرّب عدّله مباشرة تحت وشوف النتيجة فورًا، زي أي كود CSS عادي.</div>
    <div class="en">🇬🇧 The browser cannot understand SASS, so we can't run live <code>.scss</code> here. But the compiled CSS output above is 100% plain CSS — try editing it directly below and see the result instantly, like any regular CSS.</div>
</div>
<div class="mini-fe-editor">
    <div class="fe-tabs">
        <button class="fe-tab active" data-tab="html">HTML</button>
        <button class="fe-tab" data-tab="css">CSS</button>
    </div>
    <textarea class="fe-code" data-tab="html" spellcheck="false">&lt;div class="card"&gt;
    &lt;div class="title"&gt;بطاقة SASS&lt;/div&gt;
    &lt;p&gt;حط الماوس فوق البطاقة وشوف تأثير الـ hover.&lt;/p&gt;
&lt;/div&gt;</textarea>
    <textarea class="fe-code" data-tab="css" style="display:none" spellcheck="false">body { font-family: sans-serif; padding: 20px; }
.card {
    background: white;
    padding: 16px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.15);
    border-radius: 10px;
    max-width: 220px;
}
.card .title { color: #6c8bff; font-size: 1.2rem; }
.card:hover {
    box-shadow: 0 2px 8px rgba(0,0,0,0.15);
    border-radius: 10px;
    transform: translateY(-2px);
}</textarea>
    <iframe class="render-box mini-fe-preview" style="height:150px" sandbox></iframe>
</div>

<h2>5) مثال أعمق — Mixin بمعامل و@each / A Deeper Example: a Parameterized Mixin &amp; @each</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 الـ Mixin اللي شفناه فوق ماكانش بياخد أي مدخلات. Mixins حقيقية غالبًا بتاخد <b>معاملات (Parameters)</b> زي أي دالة برمجية — هنا <code>button-size($padding)</code> بياخد قيمة الـ padding وبيحسب منها حجم الخط والحواف الدائرية تلقائيًا. وبدل ما نكرر <code>@include</code> ثلاث مرات يدويًا لثلاث أحجام أزرار، بنستخدم <code>@each</code> عشان نلف على خريطة (Map) من الأحجام ونولّد كلاس لكل واحد أوتوماتيك.</div>
    <div class="en">🇬🇧 The mixin above took no input at all. Real mixins usually take <b>parameters</b> just like any programming function — here <code>button-size($padding)</code> takes a padding value and automatically derives the font size and rounded corners from it. And instead of manually writing <code>@include</code> three times for three button sizes, we use <code>@each</code> to loop over a Map of sizes and generate a class for each one automatically.</div>
</div>
<h3>مدخل SASS / SASS Input (style2.scss)</h3>
<pre><code>$sizes: (sm: 8px, md: 14px, lg: 22px);

@mixin button-size($padding: 10px) {
    padding: $padding;
    font-size: $padding * 0.9;
    border-radius: calc($padding / 2);
}

.btn {
    border: none;
    color: white;
    background: #6c8bff;
    cursor: pointer;

    @each $name, $pad in $sizes {
        &.btn-#{$name} {
            @include button-size($pad);
        }
    }
}</code></pre>
<h3>الناتج الفعلي (تم تنفيذه فعليًا بأمر <span class="ltr">sass style2.scss compiled2.css</span>) / Actual compiled CSS output</h3>
<div class="output-box">.btn {
  border: none;
  color: white;
  background: #6c8bff;
  cursor: pointer;
}
.btn.btn-sm {
  padding: 8px;
  font-size: 7.2px;
  border-radius: 4px;
}
.btn.btn-md {
  padding: 14px;
  font-size: 12.6px;
  border-radius: 7px;
}
.btn.btn-lg {
  padding: 22px;
  font-size: 19.8px;
  border-radius: 11px;
}</div>
<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ إزاي <code>@each $name, $pad in $sizes</code> ولّد 3 كلاسات (<code>.btn-sm</code>, <code>.btn-md</code>, <code>.btn-lg</code>) من سطر واحد بس، وكل واحد فيهم استدعى نفس الـ <code>@mixin</code> بقيمة مختلفة. لو عايز حجم رابع، تضيف سطر واحد في خريطة <code>$sizes</code> بس — من غير ما تلمس الـ <code>@each</code> أو الـ <code>@mixin</code> خالص.</div>
    <div class="en">🇬🇧 Notice how <code>@each $name, $pad in $sizes</code> generated 3 classes (<code>.btn-sm</code>, <code>.btn-md</code>, <code>.btn-lg</code>) from a single line, each invoking the same <code>@mixin</code> with a different value. Want a fourth size? Add one line to the <code>$sizes</code> map — no need to touch the <code>@each</code> or the <code>@mixin</code> at all.</div>
</div>
<h3>المعاينة الفعلية للـ CSS المُترجَم / Actual Rendered Output of the Compiled CSS</h3>
<iframe class="render-box" style="height:110px" sandbox srcdoc='<html><head><style>body{font-family:sans-serif;padding:16px;text-align:center}.btn{border:none;color:white;background:#6c8bff;cursor:pointer;margin:4px}.btn-sm{padding:8px;font-size:7.2px;border-radius:4px}.btn-md{padding:14px;font-size:12.6px;border-radius:7px}.btn-lg{padding:22px;font-size:19.8px;border-radius:11px}</style></head><body dir="rtl"><button class="btn btn-sm">صغير</button><button class="btn btn-md">متوسط</button><button class="btn btn-lg">كبير</button></body></html>'></iframe>

<div class="bi-block">
    <div class="ar">🇪🇬 عدّل مباشرة تحت (ده الـ CSS الناتج بعد الترجمة، مش الـ SASS نفسه): غيّر أرقام الـ padding أو الـ border-radius لكل كلاس وشوف تأثيرها على الأزرار الثلاثة فورًا.</div>
    <div class="en">🇬🇧 Edit directly below (this is the resulting compiled CSS, not the SASS source): change each class's padding or border-radius numbers and watch the effect on all three buttons instantly.</div>
</div>
<div class="mini-fe-editor">
    <div class="fe-tabs">
        <button class="fe-tab active" data-tab="html">HTML</button>
        <button class="fe-tab" data-tab="css">CSS</button>
    </div>
    <textarea class="fe-code" data-tab="html" spellcheck="false">&lt;button class="btn btn-sm"&gt;صغير&lt;/button&gt;
&lt;button class="btn btn-md"&gt;متوسط&lt;/button&gt;
&lt;button class="btn btn-lg"&gt;كبير&lt;/button&gt;</textarea>
    <textarea class="fe-code" data-tab="css" style="display:none" spellcheck="false">body { font-family: sans-serif; padding: 16px; text-align: center; }
.btn { border: none; color: white; background: #6c8bff; cursor: pointer; margin: 4px; }
.btn-sm { padding: 8px; font-size: 7.2px; border-radius: 4px; }
.btn-md { padding: 14px; font-size: 12.6px; border-radius: 7px; }
.btn-lg { padding: 22px; font-size: 19.8px; border-radius: 11px; }</textarea>
    <iframe class="render-box mini-fe-preview" style="height:110px" sandbox></iframe>
</div>

<div class="exercise-box">
    <h3>✍️ تمرين عملي / Hands-on Exercise</h3>
    <div class="ar">🇪🇬 لو نصّبت Node.js على جهازك، جرّب تنصّب SASS بأمر <code>npm install -g sass</code>، اكتب ملف <code>style.scss</code> فيه متغير لونين ومكسن للحواف الدائرية، وشغّله بـ <code>sass style.scss style.css</code> وشوف الملف الناتج بنفسك.</div>
    <div class="en">🇬🇧 If you have Node.js installed, try installing SASS with <code>npm install -g sass</code>, write a <code>style.scss</code> file with two color variables and a mixin for rounded corners, then compile it with <code>sass style.scss style.css</code> and inspect the output file yourself.</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="compile">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">إزاي المتصفح بيقدر يعرض ملف <code>.scss</code>؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">How does the browser end up rendering a <code>.scss</code> file?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="direct"> بيقرأه مباشرة زي أي ملف CSS</label>
        <label><input type="radio" name="q1" value="compile"> لازم يتترجم (Compile) لملف .css عادي الأول</label>
        <label><input type="radio" name="q1" value="never"> مستحيل يتعرض في متصفح خالص</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="include">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">إزاي بتستخدم <code>@mixin</code> اتعرّف قبل كده في مكان تاني من الكود؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">How do you invoke a <code>@mixin</code> defined earlier elsewhere in the code?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="call"> mixin-name()</label>
        <label><input type="radio" name="q2" value="include"> @include mixin-name</label>
        <label><input type="radio" name="q2" value="extend"> @extend mixin-name</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="each">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">في مثال الأزرار، أنهي أداة ولّدت 3 كلاسات (<code>.btn-sm</code>, <code>.btn-md</code>, <code>.btn-lg</code>) من سطر واحد بدل ما نكررهم يدويًا؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">In the buttons example, which tool generated 3 classes from one line instead of repeating them manually?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="each"> @each بيلف على خريطة $sizes</label>
        <label><input type="radio" name="q3" value="hover"> &amp;:hover</label>
        <label><input type="radio" name="q3" value="var"> متغير $primary-color</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="param">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">لو عايز تضيف حجم زرار رابع (<code>xl</code>) بـ padding مختلف، أقل تعديل ممكن هو إيه؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">To add a 4th button size (<code>xl</code>) with a different padding, what's the smallest change needed?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="rewrite"> إعادة كتابة الـ @mixin كله من الصفر</label>
        <label><input type="radio" name="q4" value="param"> إضافة سطر واحد جديد لخريطة $sizes بس</label>
        <label><input type="radio" name="q4" value="css"> تعديل الـ CSS المترجم يدويًا كل مرة</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ ترجم بمخّك / Compile It With Your Own Head</h3>
    <div class="ar">🇪🇬 من غير ما تشغّل أي أداة، خد الكود ده وحاول تكتب الـ CSS الناتج منه بنفسك على ورقة أو في المحرر المصغّر فوق: <code>.btn { $color: teal; padding: 10px; &amp;:hover { background: $color; } }</code> — إيه هو الـ selector اللي المفروض يطلع للـ hover؟</div>
    <div class="en">🇬🇧 Without running any tool, take this code and try to write out the resulting CSS yourself on paper or in the mini editor above: <code>.btn { $color: teal; padding: 10px; &:hover { background: $color; } }</code> — what selector should the hover rule compile to?</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 SASS نادرًا ما بتتكتب لوحدها في مشروع حقيقي — في مرحلة Gulp الجاية بعد Pug هتشوف إزاي أداة Task Runner بتترجم كل ملفات <code>.scss</code> لـ <code>.css</code> أوتوماتيك كل ما تحفظ، من غير ما تكتب أمر <code>sass</code> يدويًا في كل مرة.</div>
    <div class="en">🇬🇧 SASS is rarely written in isolation on a real project — in the upcoming Gulp stage (after Pug) you'll see how a Task Runner tool automatically compiles every <code>.scss</code> file to <code>.css</code> on every save, instead of you typing the <code>sass</code> command by hand every time.</div>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>SASS محتاج Compile لملف <code>.css</code> عادي قبل ما يشتغل في المتصفح.</li>
        <li>المتغيرات (<code>$var</code>) = قيمة واحدة تتكرر استخدامها في أماكن كتير.</li>
        <li>Nesting = كتابة CSS بشكل أقرب لبنية HTML، و<code>&amp;</code> للحالات زي <code>:hover</code>.</li>
        <li>Mixins (<code>@mixin</code> / <code>@include</code>) = مجموعة خصائص CSS قابلة لإعادة الاستخدام، وممكن تاخد معاملات (Parameters) زي أي دالة.</li>
        <li><code>@each $key, $val in $map</code> = يولّد كود متكرر (زي كلاسات أحجام) من خريطة واحدة بدل التكرار اليدوي.</li>
    </ul>
</div>

<div class="nav-buttons">
    <a href="frameworks.php">← المرحلة السابقة</a>
    <a href="pug.php">المرحلة الجاية / Next: Learn Pug.js →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
