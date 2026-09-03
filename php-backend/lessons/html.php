<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'html';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'أساسيات HTML — قبل ما تبدأ';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">الأساس الأول / Foundation</span>
<h1>أساسيات HTML <span class="ltr">HTML Foundations</span></h1>
<p class="subtitle">الأداة دي مبنية من الصفر الحقيقي — حتى لو معندكش أي خلفية ويب قبل كده. قبل ما نكتب سطر PHP واحد، لازم تعرف تكتب صفحة HTML بسيطة، لإن PHP في الآخر بترجع HTML للمتصفح.<br>
<span class="ltr">This tool starts from true zero — even with no prior web background. Before writing a single line of PHP, you need to know how to write a basic HTML page, because PHP ultimately returns HTML to the browser.</span></p>

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
    <div class="ar">🇪🇬 تفهم إيه هو HTML ودوره بالظبط، تكتب صفحة ويب كاملة ببنية صحيحة، تستخدم أهم العناصر (نصوص، روابط، صور، قوائم)، وتبني فورم بسيط — لإن الفورمات هي أساس أي تفاعل بين المستخدم وPHP لاحقًا.</div>
    <div class="en">🇬🇧 Understand what HTML is and its exact role, write a complete page with correct structure, use the most important elements (text, links, images, lists), and build a basic form — since forms are the foundation of any user-PHP interaction later.</div>
</div>

<h2 id="understand">🧠 HTML مش PHP ولا CSS / HTML is Not PHP or CSS</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 3 لغات مختلفة بيشتغلوا مع بعض في أي صفحة ويب، وكل واحدة ليها دور واحد بس: <b>HTML</b> = البنية والمحتوى (إيه اللي موجود في الصفحة). <b>CSS</b> = الشكل (ألوان، مسافات، تنسيق). <b>PHP</b> (أو JavaScript) = المنطق والسلوك (إيه اللي بيحصل ولإيه). الأداة دي هتركز على HTML كأساس، وPHP هو اللي هيولّد لك HTML ديناميكي حسب البيانات.</div>
    <div class="en">🇬🇧 3 different languages work together on any web page, each with exactly one job: <b>HTML</b> = structure and content (what's on the page). <b>CSS</b> = appearance (colors, spacing, styling). <b>PHP</b> (or JavaScript) = logic and behavior (what happens and why). This tool focuses on HTML as the foundation — PHP will later generate dynamic HTML based on data.</div>
</div>

<h2>1) بنية صفحة HTML الأساسية / Basic Page Structure</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 كل صفحة HTML لازم تبدأ بـ <code>&lt;!DOCTYPE html&gt;</code> (بيقول للمتصفح "ده HTML حديث"). بعدها عنصر <code>&lt;html&gt;</code> بيحتوي كل حاجة، وجواه قسمين: <code>&lt;head&gt;</code> (معلومات عن الصفحة مش ظاهرة للمستخدم، زي العنوان والترميز) و<code>&lt;body&gt;</code> (المحتوى الظاهر فعليًا).</div>
    <div class="en">🇬🇧 Every HTML page starts with <code>&lt;!DOCTYPE html&gt;</code> (tells the browser "this is modern HTML"). Then an <code>&lt;html&gt;</code> element wraps everything, containing two parts: <code>&lt;head&gt;</code> (page info not shown to the user, like the title and encoding) and <code>&lt;body&gt;</code> (the actual visible content).</div>
</div>

<pre><code>&lt;!DOCTYPE html&gt;
&lt;html lang="ar" dir="rtl"&gt;
&lt;head&gt;
    &lt;meta charset="UTF-8"&gt;
    &lt;title&gt;صفحتي الأولى&lt;/title&gt;
&lt;/head&gt;
&lt;body&gt;
    &lt;h1&gt;أهلاً بيك في أول صفحة HTML&lt;/h1&gt;
    &lt;p&gt;ده أول باراجراف بكتبه في حياتي.&lt;/p&gt;
&lt;/body&gt;
&lt;/html&gt;</code></pre>
<h3>المعاينة الفعلية / Actual Rendered Output</h3>
<iframe class="render-box" style="height:110px" sandbox srcdoc='<!DOCTYPE html><html><head><meta charset="UTF-8"><title>صفحتي الأولى</title></head><body style="font-family:sans-serif;direction:rtl;margin:12px"><h1 style="margin:0 0 8px">أهلاً بيك في أول صفحة HTML</h1><p style="margin:0">ده أول باراجراف بكتبه في حياتي.</p></body></html>'></iframe>

<h2>2) العناصر الأساسية / Core Elements</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <code>&lt;h1&gt;</code> لحد <code>&lt;h6&gt;</code> عناوين بترتيب أهمية (h1 الأهم). <code>&lt;p&gt;</code> فقرة نص. <code>&lt;a href="..."&gt;</code> رابط. <code>&lt;img src="..." alt="..."&gt;</code> صورة (الـ <code>alt</code> ضروري لذوي الإعاقة البصرية ولمحركات البحث). <code>&lt;ul&gt;</code>/<code>&lt;ol&gt;</code> قوائم غير مرقمة/مرقمة، وكل عنصر جواها <code>&lt;li&gt;</code>.</div>
    <div class="en">🇬🇧 <code>&lt;h1&gt;</code> through <code>&lt;h6&gt;</code> are headings by importance (h1 = most important). <code>&lt;p&gt;</code> is a paragraph. <code>&lt;a href="..."&gt;</code> is a link. <code>&lt;img src="..." alt="..."&gt;</code> is an image (<code>alt</code> matters for screen readers and search engines). <code>&lt;ul&gt;</code>/<code>&lt;ol&gt;</code> are unordered/ordered lists, each item wrapped in <code>&lt;li&gt;</code>.</div>
</div>

<pre><code>&lt;h1&gt;وليد محمد&lt;/h1&gt;
&lt;h2&gt;مطوّر PHP Backend&lt;/h2&gt;
&lt;p&gt;بتعلّم البرمجة عن طريق &lt;a href="https://php.net"&gt;موقع PHP الرسمي&lt;/a&gt;.&lt;/p&gt;

&lt;h3&gt;المهارات:&lt;/h3&gt;
&lt;ul&gt;
    &lt;li&gt;PHP&lt;/li&gt;
    &lt;li&gt;MySQL&lt;/li&gt;
    &lt;li&gt;Git&lt;/li&gt;
&lt;/ul&gt;</code></pre>
<h3>المعاينة الفعلية / Actual Rendered Output</h3>
<iframe class="render-box" style="height:220px" sandbox srcdoc='<html><body style="font-family:sans-serif;direction:rtl;margin:12px"><h1 style="margin:4px 0">وليد محمد</h1><h2 style="margin:4px 0;color:#444">مطوّر PHP Backend</h2><p>بتعلّم البرمجة عن طريق <a href="https://php.net">موقع PHP الرسمي</a>.</p><h3 style="margin:8px 0 4px">المهارات:</h3><ul><li>PHP</li><li>MySQL</li><li>Git</li></ul></body></html>'></iframe>

<h2 id="practice">💻 3) الفورمات — الأهم لأي Backend Developer / Forms</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 الفورم هو الطريقة اللي المستخدم بيبعت بيها بيانات للسيرفر — وده بالظبط اللي هيستقبله PHP بـ <code>$_POST</code> أو <code>$_GET</code> لاحقًا. <code>&lt;form method="post" action="handle.php"&gt;</code> بتحدد إزاي وفين تتبعت البيانات. كل حقل إدخال بيبقى <code>&lt;input&gt;</code> بنوع مختلف (<code>text</code>, <code>email</code>, <code>password</code>, <code>checkbox</code>, <code>radio</code>), و<code>&lt;label&gt;</code> بيوصف الحقل عشان يبقى واضح وقابل للوصول (Accessibility).</div>
    <div class="en">🇬🇧 A form is how a user sends data to the server — exactly what PHP will later receive via <code>$_POST</code> or <code>$_GET</code>. <code>&lt;form method="post" action="handle.php"&gt;</code> defines how and where data is sent. Each input field is an <code>&lt;input&gt;</code> of a specific type (<code>text</code>, <code>email</code>, <code>password</code>, <code>checkbox</code>, <code>radio</code>), and <code>&lt;label&gt;</code> describes the field for clarity and accessibility.</div>
</div>

<pre><code>&lt;form method="post" action="handle.php"&gt;
    &lt;label for="name"&gt;الاسم:&lt;/label&gt;
    &lt;input type="text" id="name" name="name" required&gt;

    &lt;label for="email"&gt;الإيميل:&lt;/label&gt;
    &lt;input type="email" id="email" name="email" required&gt;

    &lt;label for="msg"&gt;الرسالة:&lt;/label&gt;
    &lt;textarea id="msg" name="message"&gt;&lt;/textarea&gt;

    &lt;label&gt;&lt;input type="checkbox" name="subscribe"&gt; اشتراك في النشرة&lt;/label&gt;

    &lt;button type="submit"&gt;إرسال&lt;/button&gt;
&lt;/form&gt;</code></pre>
<h3>المعاينة الفعلية (فورم شغّال بصريًا) / Actual Rendered Output</h3>
<iframe class="render-box" style="height:260px" sandbox srcdoc='<html><body style="font-family:sans-serif;direction:rtl;margin:12px"><form><div style="margin-bottom:8px"><label for="name">الاسم:</label><br><input type="text" id="name" name="name" required></div><div style="margin-bottom:8px"><label for="email">الإيميل:</label><br><input type="email" id="email" name="email" required></div><div style="margin-bottom:8px"><label for="msg">الرسالة:</label><br><textarea id="msg" name="message" rows="2"></textarea></div><div style="margin-bottom:8px"><label><input type="checkbox" name="subscribe"> اشتراك في النشرة</label></div><button type="submit">إرسال</button></form></body></html>'></iframe>

<div class="bi-block">
    <div class="ar">🇪🇬 الفورم ده لسه مش متصل بحاجة — لو ضغطت "إرسال" مش هيحصل شيء لإن مفيش سيرفر خلف <code>handle.php</code>. لما نوصل لمرحلة "PHP كـ Backend حقيقي"، هنكتب <code>handle.php</code> نفسه ونستقبل فيه البيانات دي فعليًا.</div>
    <div class="en">🇬🇧 This form isn't wired to anything yet — clicking "Submit" does nothing because there's no server behind <code>handle.php</code>. When we reach "PHP as a Real Backend," we'll write <code>handle.php</code> itself and actually receive this data.</div>
</div>

<h2>4) الجداول / Tables</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <code>&lt;table&gt;</code> بتستخدم لعرض بيانات في صفوف وأعمدة — زي قايمة منتجات جاية من قاعدة بيانات. <code>&lt;tr&gt;</code> صف، <code>&lt;th&gt;</code> عنوان عمود، <code>&lt;td&gt;</code> خلية بيانات عادية.</div>
    <div class="en">🇬🇧 <code>&lt;table&gt;</code> displays data in rows and columns — like a product list from a database. <code>&lt;tr&gt;</code> is a row, <code>&lt;th&gt;</code> is a column header, <code>&lt;td&gt;</code> is a regular data cell.</div>
</div>

<pre><code>&lt;table border="1"&gt;
    &lt;tr&gt;
        &lt;th&gt;المنتج&lt;/th&gt;
        &lt;th&gt;السعر&lt;/th&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
        &lt;td&gt;لوحة مفاتيح&lt;/td&gt;
        &lt;td&gt;$45.99&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
        &lt;td&gt;ماوس&lt;/td&gt;
        &lt;td&gt;$19.99&lt;/td&gt;
    &lt;/tr&gt;
&lt;/table&gt;</code></pre>
<h3>المعاينة الفعلية / Actual Rendered Output</h3>
<iframe class="render-box" style="height:140px" sandbox srcdoc='<html><body style="font-family:sans-serif;direction:rtl;margin:12px"><table border="1" style="border-collapse:collapse"><tr><th style="padding:4px 10px">المنتج</th><th style="padding:4px 10px">السعر</th></tr><tr><td style="padding:4px 10px">لوحة مفاتيح</td><td style="padding:4px 10px">$45.99</td></tr><tr><td style="padding:4px 10px">ماوس</td><td style="padding:4px 10px">$19.99</td></tr></table></body></html>'></iframe>

<h2>5) عناصر البنية الدلالية / Semantic HTML</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 بدل ما تحط كل حاجة في <code>&lt;div&gt;</code> عادي، فيه عناصر بتوصف "معنى" الجزء: <code>&lt;header&gt;</code> رأس الصفحة، <code>&lt;nav&gt;</code> قايمة تنقل، <code>&lt;main&gt;</code> المحتوى الرئيسي، <code>&lt;section&gt;</code> قسم منطقي، <code>&lt;footer&gt;</code> تذييل. الفايدة: كود أوضح، وأفضل لمحركات البحث وذوي الإعاقة البصرية.</div>
    <div class="en">🇬🇧 Instead of wrapping everything in a plain <code>&lt;div&gt;</code>, semantic elements describe a section's meaning: <code>&lt;header&gt;</code>, <code>&lt;nav&gt;</code>, <code>&lt;main&gt;</code>, <code>&lt;section&gt;</code>, <code>&lt;footer&gt;</code>. Benefit: clearer code, and better for search engines and screen readers.</div>
</div>

<pre><code>&lt;header&gt;&lt;h1&gt;موقعي&lt;/h1&gt;&lt;/header&gt;
&lt;nav&gt;&lt;a href="#"&gt;الرئيسية&lt;/a&gt; | &lt;a href="#"&gt;تواصل&lt;/a&gt;&lt;/nav&gt;
&lt;main&gt;
    &lt;section&gt;&lt;p&gt;محتوى الصفحة الرئيسي هنا.&lt;/p&gt;&lt;/section&gt;
&lt;/main&gt;
&lt;footer&gt;&lt;p&gt;كل الحقوق محفوظة © 2026&lt;/p&gt;&lt;/footer&gt;</code></pre>
<h3>المعاينة الفعلية / Actual Rendered Output</h3>
<iframe class="render-box" style="height:190px" sandbox srcdoc='<html><body style="font-family:sans-serif;direction:rtl;margin:0"><header style="background:#eee;padding:10px"><h1 style="margin:0;font-size:18px">موقعي</h1></header><nav style="padding:8px 10px;background:#f7f7f7"><a href="#">الرئيسية</a> | <a href="#">تواصل</a></nav><main style="padding:10px"><section><p style="margin:0">محتوى الصفحة الرئيسي هنا.</p></section></main><footer style="background:#eee;padding:8px 10px;font-size:13px">كل الحقوق محفوظة © 2026</footer></body></html>'></iframe>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="img">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">أنهي عنصر لازم يكون له <code>alt</code> attribute عشان يبقى واضح لذوي الإعاقة البصرية ومحركات البحث؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Which element must carry an <code>alt</code> attribute for accessibility and SEO?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="p"> <code>&lt;p&gt;</code></label>
        <label><input type="radio" name="q1" value="img"> <code>&lt;img&gt;</code></label>
        <label><input type="radio" name="q1" value="a"> <code>&lt;a&gt;</code></label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="nav">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">عايز تعمل قايمة روابط للتنقل بين صفحات الموقع (الرئيسية، تواصل...)، أنهي عنصر دلالي (Semantic) الأنسب؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Which semantic element best wraps a site's navigation links?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="div"> <code>&lt;div&gt;</code></label>
        <label><input type="radio" name="q2" value="table"> <code>&lt;table&gt;</code></label>
        <label><input type="radio" name="q2" value="nav"> <code>&lt;nav&gt;</code></label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ ابني صفحة Portfolio كاملة / Build a Full Portfolio Page</h3>
    <div class="ar">🇪🇬 وسّع فكرة <code>profile.html</code> تحت: لفّها ببنية دلالية كاملة (<code>header</code> فيه اسمك، <code>nav</code> بروابط وهمية، <code>main</code> يحتوي الباقي، <code>footer</code> فيه حقوق النشر)، وضيف جوه الـ <code>main</code> جدول <code>&lt;table&gt;</code> بعنوانه "مشاريعي" فيه عمودين: اسم المشروع والتقنية المستخدمة، لـ 3 صفوف على الأقل.</div>
    <div class="en">🇬🇧 Extend the <code>profile.html</code> idea below: wrap it in full semantic structure (a <code>header</code> with your name, a <code>nav</code> with placeholder links, a <code>main</code> holding the rest, a <code>footer</code> with a copyright line), and add a "My Projects" <code>&lt;table&gt;</code> inside <code>main</code> with two columns (project name, tech used) and at least 3 rows.</div>
</div>

<div class="exercise-box">
    <h3>✍️ تمرين إضافي / Extra Exercise</h3>
    <div class="ar">🇪🇬 اعمل ملف <code>profile.html</code> فيه: عنوان باسمك، صورة (أو رابط صورة)، فقرة بسيطة عنك، قايمة <code>&lt;ul&gt;</code> بمهاراتك، وفورم بسيط في الآخر فيه اسم وإيميل ورسالة وزرار إرسال. افتح الملف مباشرة في المتصفح وشوف الشكل.</div>
    <div class="en">🇬🇧 Create a <code>profile.html</code> file with: a heading with your name, an image (or image link), a short paragraph about yourself, a <code>&lt;ul&gt;</code> list of your skills, and a simple form at the end with name, email, message, and a submit button. Open the file directly in your browser and see the result.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 HTML مش هيختفي بعد المرحلة دي — أي رد بيرجعه PHP في الآخر هو HTML (أو JSON). لما توصل لمشروع التخرج (Task Manager)، هتحتاج بالظبط نفس العناصر دي: فورم لإضافة مهمة جديدة، وجدول أو قايمة لعرض المهام الحالية، ومكونات دلالية تنظم الصفحة.</div>
    <div class="en">🇬🇧 HTML doesn't disappear after this stage — anything PHP ultimately returns is HTML (or JSON). When you reach the Capstone Task Manager, you'll need exactly these elements: a form to add a new task, a table or list to display existing tasks, and semantic elements organizing the page.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>HTML = البنية والمحتوى، CSS = الشكل، PHP/JS = المنطق — 3 أدوار منفصلة.</li>
        <li>كل صفحة: <code>&lt;!DOCTYPE html&gt;</code> → <code>&lt;html&gt;</code> → <code>&lt;head&gt;</code> (غير ظاهر) + <code>&lt;body&gt;</code> (ظاهر).</li>
        <li>عناصر أساسية: <code>h1-h6</code>, <code>p</code>, <code>a</code>, <code>img</code>, <code>ul/ol/li</code>.</li>
        <li>الفورمات (<code>form</code>, <code>input</code>, <code>label</code>, <code>textarea</code>) هي أساس أي تفاعل مع PHP لاحقًا.</li>
        <li><code>table</code> لعرض بيانات في صفوف/أعمدة، والعناصر الدلالية (<code>header/nav/main/footer</code>) لكود أوضح.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <span></span>
    <a href="stage0.php">المرحلة الجاية / Next: Environment Setup →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
