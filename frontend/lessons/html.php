<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'html';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'تعلم لغة HTML — Front-End Developer';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">المرحلة 2 / Stage 2</span>
<h1>تعلم لغة HTML <span class="ltr">Learn HTML</span></h1>
<p class="subtitle">لبدأ حياتك في مجال الـ Web لازم تتعلم لغة بنية الصفحات — HTML — سواء هتبقى Designer أو Developer، مفيش استغناء عنها. المرحلة الجاية (CSS) هتاخد نفس العناصر اللي هتتعلمها هنا وتدّيها الشكل.</p>

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
    <div class="ar">🇪🇬 تكتب صفحة HTML كاملة وصحيحة البنية، تستخدم أهم العناصر (نصوص، روابط، صور، قوائم، فورمات)، وتفهم <code>div</code> و<code>span</code> و<code>class</code>/<code>id</code> — لإنهم أساس أي تنسيق هتعمله بـ CSS بعد كده.</div>
    <div class="en">🇬🇧 Write a complete, correctly-structured HTML page, use the most important elements (text, links, images, lists, forms), and understand <code>div</code>, <code>span</code>, and <code>class</code>/<code>id</code> — the foundation of any styling you'll do with CSS next.</div>
</div>

<h2>مين بيعمل إيه: HTML مقابل CSS مقابل JavaScript</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>HTML</b> = البنية والمحتوى (إيه اللي موجود). <b>CSS</b> = الشكل (ألوان، مسافات، تخطيط) — ده موضوع المرحلة الجاية بالظبط. <b>JavaScript</b> = التفاعل والسلوك (إيه اللي بيحصل لما تضغط أو تكتب). كل مرحلة في المسار هتركّز على واحدة بس في كل مرة.</div>
    <div class="en">🇬🇧 <b>HTML</b> = structure and content. <b>CSS</b> = appearance (colors, spacing, layout) — exactly the next stage's topic. <b>JavaScript</b> = interactivity and behavior. Each stage in this track focuses on exactly one at a time.</div>
</div>

<h2 id="understand">🧠 1) بنية صفحة HTML الأساسية</h2>
<div class="flow-diagram">
    <div class="flow-box">&lt;!DOCTYPE html&gt;</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">&lt;html&gt;</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">&lt;head&gt; (meta, title)</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">&lt;body&gt; (visible content)</div>
</div>
<div class="bi-block">
    <div class="ar">🇪🇬 المتصفح بيقرأ ملف HTML بالترتيب ده بالظبط من فوق لتحت: أول حاجة <code>&lt;!DOCTYPE html&gt;</code> بيقول للمتصفح "ده HTML5 حديث"، بعدين <code>&lt;html&gt;</code> بيلف كل حاجة، جواه <code>&lt;head&gt;</code> (معلومات عن الصفحة، مش ظاهرة للمستخدم) ثم <code>&lt;body&gt;</code> (كل حاجة ظاهرة فعليًا في الصفحة).</div>
    <div class="en">🇬🇧 The browser reads an HTML file top to bottom in exactly this order: first <code>&lt;!DOCTYPE html&gt;</code> tells the browser "this is modern HTML5", then <code>&lt;html&gt;</code> wraps everything, inside it <code>&lt;head&gt;</code> (page metadata, not visible to the user) then <code>&lt;body&gt;</code> (everything actually visible on the page).</div>
</div>
<pre><code>&lt;!DOCTYPE html&gt;
&lt;html lang="ar" dir="rtl"&gt;
&lt;head&gt;
    &lt;meta charset="UTF-8"&gt;
    &lt;title&gt;بورتفوليو وليد&lt;/title&gt;
&lt;/head&gt;
&lt;body&gt;
    &lt;h1&gt;وليد محمد&lt;/h1&gt;
    &lt;p&gt;مصمم وواجهات ويب Front-End Developer.&lt;/p&gt;
&lt;/body&gt;
&lt;/html&gt;</code></pre>
<h3>المعاينة الفعلية / Actual Rendered Output</h3>
<iframe class="render-box" style="height:110px" sandbox srcdoc='<!DOCTYPE html><html><head><meta charset="UTF-8"></head><body style="font-family:sans-serif;direction:rtl;margin:12px"><h1 style="margin:0 0 8px">وليد محمد</h1><p style="margin:0">مصمم وواجهات ويب Front-End Developer.</p></body></html>'></iframe>

<h2>2) العناصر الأساسية</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <code>&lt;h1&gt;</code> لحد <code>&lt;h6&gt;</code> عناوين بترتيب أهمية. <code>&lt;p&gt;</code> فقرة. <code>&lt;a href="..."&gt;</code> رابط. <code>&lt;img src="..." alt="..."&gt;</code> صورة. <code>&lt;ul&gt;</code>/<code>&lt;ol&gt;</code> قوائم، وكل عنصر جواها <code>&lt;li&gt;</code>.</div>
    <div class="en">🇬🇧 <code>&lt;h1&gt;</code>-<code>&lt;h6&gt;</code> are headings by importance. <code>&lt;p&gt;</code> is a paragraph. <code>&lt;a href="..."&gt;</code> a link. <code>&lt;img src="..." alt="..."&gt;</code> an image. <code>&lt;ul&gt;</code>/<code>&lt;ol&gt;</code> are lists, each item in <code>&lt;li&gt;</code>.</div>
</div>

<pre><code>&lt;h2&gt;مهاراتي&lt;/h2&gt;
&lt;ul&gt;
    &lt;li&gt;HTML &amp; CSS&lt;/li&gt;
    &lt;li&gt;JavaScript&lt;/li&gt;
    &lt;li&gt;Figma&lt;/li&gt;
&lt;/ul&gt;
&lt;p&gt;شوف &lt;a href="#"&gt;أعمالي السابقة&lt;/a&gt;.&lt;/p&gt;</code></pre>
<h3>المعاينة الفعلية / Actual Rendered Output</h3>
<iframe class="render-box" style="height:170px" sandbox srcdoc='<html><body style="font-family:sans-serif;direction:rtl;margin:12px"><h2 style="margin:0 0 6px">مهاراتي</h2><ul><li>HTML &amp; CSS</li><li>JavaScript</li><li>Figma</li></ul><p>شوف <a href="#">أعمالي السابقة</a>.</p></body></html>'></iframe>

<h2>3) الـ div وspan — أساس أي تنسيق لاحق</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <code>&lt;div&gt;</code> صندوق عام بياخد سطر كامل (Block) بيستخدم يجمع عناصر مع بعض عشان تنسّقها كمجموعة. <code>&lt;span&gt;</code> نفس الفكرة بس جوه السطر (Inline) لتنسيق جزء من نص بس. الـ <code>class</code> بتدّي اسم لمجموعة عناصر تنسّقهم كلهم بنفس القاعدة في CSS، والـ <code>id</code> بتدّي اسم فريد لعنصر واحد بس. النقطتين دول أهم حاجة هتستخدمها في مرحلة CSS.</div>
    <div class="en">🇬🇧 <code>&lt;div&gt;</code> is a generic block-level box used to group elements together for styling as a unit. <code>&lt;span&gt;</code> is the same idea but inline, for styling part of a text run. A <code>class</code> names a group of elements to style with one CSS rule; an <code>id</code> names exactly one unique element. These two are the most important things you'll use in the CSS stage.</div>
</div>

<pre><code>&lt;div class="card"&gt;
    &lt;h3&gt;Card 1&lt;/h3&gt;
    &lt;p&gt;نص &lt;span class="highlight"&gt;مهم&lt;/span&gt; جوه الفقرة.&lt;/p&gt;
&lt;/div&gt;</code></pre>
<h3>المعاينة الفعلية / Actual Rendered Output</h3>
<iframe class="render-box" style="height:130px" sandbox srcdoc='<html><body style="font-family:sans-serif;direction:rtl;margin:12px"><div style="border:1px solid #ccc;border-radius:8px;padding:10px;max-width:220px"><h3 style="margin:0 0 6px">Card 1</h3><p style="margin:0">نص <span style="background:#ffe58a">مهم</span> جوه الفقرة.</p></div></body></html>'></iframe>

<h2>4) الفورمات / Forms</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 الفورم بيخلي المستخدم يبعت بيانات — أساسي في أي صفحة "تواصل معنا" أو تسجيل. <code>&lt;label&gt;</code> بتوصف الحقل، و<code>&lt;input&gt;</code> بأنواعها المختلفة بتستقبل المدخل.</div>
    <div class="en">🇬🇧 A form lets the user submit data — essential in any "Contact Us" or sign-up page. <code>&lt;label&gt;</code> describes a field, and <code>&lt;input&gt;</code> types receive the actual input.</div>
</div>

<pre><code>&lt;form&gt;
    &lt;label for="email"&gt;الإيميل:&lt;/label&gt;
    &lt;input type="email" id="email" name="email"&gt;
    &lt;button type="submit"&gt;اشترك&lt;/button&gt;
&lt;/form&gt;</code></pre>
<h3>المعاينة الفعلية / Actual Rendered Output</h3>
<iframe class="render-box" style="height:110px" sandbox srcdoc='<html><body style="font-family:sans-serif;direction:rtl;margin:12px"><form><label for="email">الإيميل:</label> <input type="email" id="email" name="email"> <button type="submit">اشترك</button></form></body></html>'></iframe>

<h2>5) العناصر الدلالية / Semantic HTML</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 محترف الـ Front-End بيستخدم <code>&lt;header&gt;</code>, <code>&lt;nav&gt;</code>, <code>&lt;main&gt;</code>, <code>&lt;section&gt;</code>, <code>&lt;footer&gt;</code> بدل <code>&lt;div&gt;</code> عشوائي — بتوضح معنى كل جزء، وده بيفرق كتير في الـ SEO وسهولة الوصول (Accessibility)، وهما نقطتين أي صاحب عمل هيسألك عليهم.</div>
    <div class="en">🇬🇧 A Front-End professional uses <code>&lt;header&gt;</code>, <code>&lt;nav&gt;</code>, <code>&lt;main&gt;</code>, <code>&lt;section&gt;</code>, <code>&lt;footer&gt;</code> instead of random <code>&lt;div&gt;</code>s — it clarifies meaning, and matters a lot for SEO and Accessibility, two things any employer will ask about.</div>
</div>

<h2>6) مثال أعمق: article وaside / A Deeper Example: article &amp; aside</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <code>&lt;article&gt;</code> بيلف محتوى مستقل بذاته وله معنى كامل حتى لو اتنقل لصفحة تانية لوحده — زي مقال مدونة أو منشور. <code>&lt;aside&gt;</code> بيلف محتوى جانبي مرتبط بس مش أساسي — زي معلومات عن الكاتب أو "مقالات ذات صلة". الفرق عن <code>&lt;section&gt;</code>: section بتقسّم صفحة واحدة لأجزاء مترابطة، بينما article قايم بذاته تمامًا.</div>
    <div class="en">🇬🇧 <code>&lt;article&gt;</code> wraps self-contained content that would still make sense on its own page — like a blog post. <code>&lt;aside&gt;</code> wraps related but secondary content — like an author bio or "related posts". The difference from <code>&lt;section&gt;</code>: a section divides one page into connected parts, while an article stands completely on its own.</div>
</div>
<pre><code>&lt;article&gt;
    &lt;h2&gt;ليه Semantic HTML مهم؟&lt;/h2&gt;
    &lt;p&gt;لأنه بيوضح معنى كل جزء لمحركات البحث وقارئات الشاشة.&lt;/p&gt;
&lt;/article&gt;
&lt;aside&gt;
    &lt;h3&gt;عن الكاتب&lt;/h3&gt;
    &lt;p&gt;وليد محمد — مطوّر Front-End.&lt;/p&gt;
&lt;/aside&gt;</code></pre>
<h3>المعاينة الفعلية / Actual Rendered Output</h3>
<iframe class="render-box" style="height:200px" sandbox srcdoc='<html><body style="font-family:sans-serif;direction:rtl;margin:12px;display:flex;gap:14px"><article style="flex:2;border:1px solid #ccc;border-radius:8px;padding:12px"><h2 style="margin:0 0 6px;font-size:17px">ليه Semantic HTML مهم؟</h2><p style="margin:0">لأنه بيوضح معنى كل جزء لمحركات البحث وقارئات الشاشة.</p></article><aside style="flex:1;background:#f2f2f2;border-radius:8px;padding:12px"><h3 style="margin:0 0 6px;font-size:15px">عن الكاتب</h3><p style="margin:0;font-size:13px">وليد محمد — مطوّر Front-End.</p></aside></body></html>'></iframe>
<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ في المعاينة: الـ article ياخد المساحة الأكبر لأنه المحتوى الأساسي، والـ aside جنبه بخلفية مختلفة عشان يبان إنه معلومة إضافية مش جزء من المقال نفسه.</div>
    <div class="en">🇬🇧 Notice in the preview: the article takes the larger space since it's the primary content, and the aside sits beside it with a different background to signal it's supplementary, not part of the article itself.</div>
</div>

<h2 id="practice">💻 جرّب بنفسك / Practice</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 المحرر تحت فيه هيكل HTML بسيط جاهز — عدّل عليه مباشرة (زوّد عنصر <code>&lt;li&gt;</code> جديد، غيّر النصوص، حط <code>&lt;span&gt;</code> جوه فقرة) وشوف النتيجة بتتحدث فورًا من غير أي زرار Run.</div>
    <div class="en">🇬🇧 The editor below has a small ready HTML skeleton — edit it directly (add a new <code>&lt;li&gt;</code>, change the text, wrap part of a paragraph in a <code>&lt;span&gt;</code>) and watch the result update instantly, no Run button needed.</div>
</div>
<div class="mini-fe-editor">
    <textarea class="fe-code" data-tab="html" spellcheck="false">&lt;header&gt;
    &lt;h1&gt;وليد محمد&lt;/h1&gt;
&lt;/header&gt;
&lt;main&gt;
    &lt;section&gt;
        &lt;h2&gt;مهاراتي&lt;/h2&gt;
        &lt;ul&gt;
            &lt;li&gt;HTML&lt;/li&gt;
            &lt;li&gt;CSS&lt;/li&gt;
            &lt;li&gt;JavaScript&lt;/li&gt;
        &lt;/ul&gt;
    &lt;/section&gt;
    &lt;section&gt;
        &lt;p&gt;تقدر تحط &lt;span&gt;نص مميز&lt;/span&gt; جوه أي فقرة.&lt;/p&gt;
    &lt;/section&gt;
&lt;/main&gt;
&lt;footer&gt;
    &lt;p&gt;جميع الحقوق محفوظة&lt;/p&gt;
&lt;/footer&gt;</textarea>
    <iframe class="render-box mini-fe-preview" style="height:220px" sandbox></iframe>
</div>

<div class="exercise-box">
    <h3>✍️ تمرين عملي / Hands-on Exercise</h3>
    <div class="ar">🇪🇬 افتح <a href="../playground/index.php">محرر الكود</a> واعمل هيكل صفحة بورتفوليو بسيطة: <code>&lt;header&gt;</code> فيه اسمك، <code>&lt;nav&gt;</code> بروابط (عني، مهاراتي، تواصل)، <code>&lt;main&gt;</code> فيه <code>&lt;section&gt;</code> لكل جزء (مهاراتك كقائمة، وفورم تواصل)، و<code>&lt;footer&gt;</code>. سيب الشكل عادي — هنديله شكل جميل في مرحلة CSS الجاية.</div>
    <div class="en">🇬🇧 In the <a href="../playground/index.php">Playground</a>, build a simple portfolio page skeleton: a <code>&lt;header&gt;</code> with your name, a <code>&lt;nav&gt;</code> with links (About, Skills, Contact), a <code>&lt;main&gt;</code> containing a <code>&lt;section&gt;</code> per part (a skills list, a contact form), and a <code>&lt;footer&gt;</code>. Leave it unstyled — the next CSS stage will make it look great.</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="block">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">إيه الفرق الأساسي بين <code>&lt;div&gt;</code> و<code>&lt;span&gt;</code>؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What is the key difference between <code>&lt;div&gt;</code> and <code>&lt;span&gt;</code>?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="samething"> مفيش فرق، نفس الحاجة بالظبط</label>
        <label><input type="radio" name="q1" value="block"> div صندوق كامل السطر (Block)، span جوه السطر (Inline)</label>
        <label><input type="radio" name="q1" value="onlycss"> div بس اللي بيقبل CSS</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="one">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">كام عنصر في الصفحة ممكن يكون عليهم نفس الـ <code>id</code>؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">How many elements on a page can share the same <code>id</code>?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="one"> واحد بس / Exactly one</label>
        <label><input type="radio" name="q2" value="many"> أي عدد / Any number</label>
        <label><input type="radio" name="q2" value="two"> اتنين بالظبط / Exactly two</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="article">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">عندك منشور مدونة كامل هيكون منطقي لو اتنقل لصفحته الخاصة لوحده. أنهي وسم أنسب يلفّه؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">You have a full blog post that would still make sense on its own dedicated page. Which tag best wraps it?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="aside"> aside</label>
        <label><input type="radio" name="q3" value="article"> article</label>
        <label><input type="radio" name="q3" value="span"> span</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="form">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">عايز تعمل حقل بريد إلكتروني بمتصفح يتحقق من صيغته تلقائيًا (وجود @ مثلًا) من غير JavaScript. إيه الأنسب؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">You want an email field the browser validates automatically (checks for an @, say) with no JavaScript. What's the right choice?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="text"> &lt;input type="text"&gt;</label>
        <label><input type="radio" name="q4" value="form"> &lt;input type="email"&gt;</label>
        <label><input type="radio" name="q4" value="span"> &lt;span&gt;</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ ابني هيكل صفحة "عني" كامل / Build a Complete "About Me" Skeleton</h3>
    <div class="ar">🇪🇬 استخدم <a href="../playground/index.php">محرر الكود</a> (أو المحرر المصغّر فوق) وابني صفحة HTML كاملة صحيحة البنية (من <code>&lt;!DOCTYPE html&gt;</code> لحد <code>&lt;/html&gt;</code>) فيها: <code>&lt;header&gt;</code> باسمك، <code>&lt;nav&gt;</code> بـ3 روابط، <code>&lt;main&gt;</code> فيه قسمين <code>&lt;section&gt;</code> (نبذة عنك كفقرة، وقائمة مهاراتك بـ<code>&lt;ul&gt;</code>)، فورم تواصل بسيط، و<code>&lt;footer&gt;</code>. سيب الشكل عادي تمامًا.</div>
    <div class="en">🇬🇧 Use the <a href="../playground/index.php">Playground</a> (or the mini editor above) and build a complete, correctly-structured HTML page (from <code>&lt;!DOCTYPE html&gt;</code> to <code>&lt;/html&gt;</code>) with: a <code>&lt;header&gt;</code> with your name, a <code>&lt;nav&gt;</code> with 3 links, a <code>&lt;main&gt;</code> containing two <code>&lt;section&gt;</code>s (an about-you paragraph, and a skills <code>&lt;ul&gt;</code>), a simple contact form, and a <code>&lt;footer&gt;</code>. Leave it completely unstyled.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 هيكل الصفحة اللي بنيته هنا هو نفسه اللي هتاخده بالظبط لمرحلة CSS الجاية عشان تدّيله شكل، وبعد كده لمرحلة "تصاميم وتطبيقات على HTML + CSS" — البطاقات والـ Navbar اللي هتشوفها هناك مبنية من نفس عناصر HTML اللي اتعلمتها هنا بالظبط (div, nav, ul, section).</div>
    <div class="en">🇬🇧 The page skeleton you built here is exactly what you'll carry into the next CSS stage to style, then into "HTML + CSS Practice Projects" — the cards and Navbar you'll see there are built from the exact same HTML elements you just learned (div, nav, ul, section).</div>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>HTML = البنية، CSS = الشكل (المرحلة الجاية)، JavaScript = السلوك.</li>
        <li>عناصر أساسية: <code>h1-h6</code>, <code>p</code>, <code>a</code>, <code>img</code>, <code>ul/ol/li</code>.</li>
        <li><code>div</code>/<code>span</code> + <code>class</code>/<code>id</code> = أساس أي تنسيق CSS جاي.</li>
        <li>الفورمات (<code>form</code>, <code>input</code>, <code>label</code>) لاستقبال بيانات المستخدم.</li>
        <li>العناصر الدلالية (<code>header/nav/main/section/footer</code>) = كود احترافي، أفضل لـ SEO وAccessibility.</li>
    </ul>
</div>

<div class="nav-buttons">
    <a href="setup.php">← المرحلة السابقة</a>
    <a href="css.php">المرحلة الجاية / Next: Learn CSS →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
