<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'security-xss';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'الأمان — 🔐 معمل: XSS';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">Stage 14 · Security</span>
<h1>🔐 معمل: XSS <span class="ltr">🔐 Lab: Cross-Site Scripting</span></h1>
<p class="subtitle">إزاي كود المستخدم بيتحول لـ JavaScript خبيث، والحل بـ htmlspecialchars(). <span class="ltr">How user input turns into malicious JavaScript, and the fix with htmlspecialchars().</span></p>

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
    <div class="ar">🇪🇬 تفهم إزاي طباعة مدخلات المستخدم مباشرة جوه صفحة HTML من غير تنضيف بتسمح لأي حد يحقن كود <code>&lt;script&gt;</code> بيتنفذ في متصفح أي شخص تاني يشوف الصفحة — ده اسمه <code>XSS (Cross-Site Scripting)</code>. تتعلم الحل: <code>htmlspecialchars()</code>.</div>
    <div class="en">🇬🇧 Understand how echoing user input directly into an HTML page without sanitizing lets anyone inject <code>&lt;script&gt;</code> code that executes in the browser of any other person viewing the page — this is called <code>XSS (Cross-Site Scripting)</code>. Then learn the fix: <code>htmlspecialchars()</code>.</div>
</div>

<h2 id="understand">🧠 الكود المعرّض للاختراق / The Vulnerable Code</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 تخيّل صفحة بترحّب بزائر باسمه جاي من <code>$_GET['name']</code> أو من حقل تعليق: <code>echo "Welcome, " . $name;</code>. لو الزائر مدخلش اسمه العادي، ودخّل بدل منه نص فيه وسم <code>&lt;script&gt;</code>، هيتطبع "زي ما هو" جوه HTML — والمتصفح مش بيفرّق بين "نص عادي" و"كود جافاسكريبت"، هيتنفذ فورًا.</div>
    <div class="en">🇬🇧 Imagine a page that welcomes a visitor by a name coming from <code>$_GET['name']</code> or a comment field: <code>echo "Welcome, " . $name;</code>. If the visitor doesn't type a normal name, and instead submits text containing a <code>&lt;script&gt;</code> tag, it gets echoed "as-is" into the HTML — and the browser cannot tell "plain text" from "JavaScript code"; it just executes it.</div>
</div>

<pre><code>&lt;?php
// المدخل ده ممكن يجي من $_GET['name'] أو من فورم تعليق — هنا ثابت عشان الديمو يبقى قابل للتنفيذ بشكل موثوق
$maliciousName = '&lt;script&gt;alert("hacked: cookie=" + document.cookie)&lt;/script&gt;';

// ⚠️ معرّض للاختراق — طباعة مباشرة من غير تنضيف
echo "Welcome, " . $maliciousName . "!";</code></pre>
<h3>الناتج الفعلي (النص الخام اللي هيتبعت للمتصفح) / Actual output (the raw text that would be sent to the browser)</h3>
<div class="output-box">Welcome, &lt;script&gt;alert("hacked: cookie=" + document.cookie)&lt;/script&gt;!</div>

<div class="security-box">
    <h3>⚠️ لو ده اتطبع في متصفح حقيقي / If this rendered in a real browser</h3>
    <div class="ar">🇪🇬 الناتج فوق ده HTML خام. لو اتحط في صفحة حقيقية، المتصفح مش هيعرض النص <code>&lt;script&gt;...&lt;/script&gt;</code> كنص — هيشغّله كأمر JavaScript فعلي. في المثال ده بيعمل <code>alert()</code> بسيط للتوضيح، لكن في هجوم حقيقي ممكن يسرق <code>document.cookie</code> (وبالتالي الجلسة/تسجيل الدخول)، يحوّل المستخدم لموقع تصيّد، أو يعدّل الصفحة بالكامل — وده بيحصل في متصفح <b>أي حد تاني</b> يفتح نفس الصفحة، مش بس اللي كتب النص.</div>
    <div class="en">🇬🇧 The output above is raw HTML. If placed in a real page, the browser will not display the text <code>&lt;script&gt;...&lt;/script&gt;</code> — it will execute it as real JavaScript. This example uses a simple <code>alert()</code> for illustration, but a real attack could steal <code>document.cookie</code> (and with it, the session/login), redirect to a phishing site, or rewrite the whole page — and this happens in the browser of <b>anyone else</b> who opens the same page, not just the person who submitted the text.</div>
</div>

<h2 id="practice">💻 الحل: htmlspecialchars() / The Fix: htmlspecialchars()</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <code>htmlspecialchars($input, ENT_QUOTES, 'UTF-8')</code> بتحوّل الحروف اللي ليها معنى خاص في HTML (<code>&lt;</code>, <code>&gt;</code>, <code>&amp;</code>, <code>"</code>, <code>'</code>) لرموز HTML مكافئة (<code>&amp;lt;</code>, <code>&amp;gt;</code>...). النتيجة: المتصفح بيعرضها كـ <b>نص عادي مقروء</b> بدل ما ينفّذها كوسم أو كود. الفلاج <code>ENT_QUOTES</code> بيحوّل علامات الاقتباس المفردة والمزدوجة كمان، وده مهم لو النص هيتحط جوه attribute زي <code>value="..."</code>.</div>
    <div class="en">🇬🇧 <code>htmlspecialchars($input, ENT_QUOTES, 'UTF-8')</code> converts characters with special meaning in HTML (<code>&lt;</code>, <code>&gt;</code>, <code>&amp;</code>, <code>"</code>, <code>'</code>) into their equivalent HTML entities (<code>&amp;lt;</code>, <code>&amp;gt;</code>...). The result: the browser displays it as <b>readable plain text</b> instead of executing it as a tag or code. The <code>ENT_QUOTES</code> flag also escapes single and double quotes, which matters if the text will be placed inside an attribute like <code>value="..."</code>.</div>
</div>

<pre><code>&lt;?php
$maliciousName = '&lt;script&gt;alert("hacked: cookie=" + document.cookie)&lt;/script&gt;';

// ✅ آمن — تنضيف قبل الطباعة في HTML
$safe = htmlspecialchars($maliciousName, ENT_QUOTES, 'UTF-8');
echo "Welcome, " . $safe . "!";</code></pre>
<h3>الناتج الفعلي (اتنفّذ فعليًا) / Actual output (really executed)</h3>
<div class="output-box">Welcome, &amp;lt;script&amp;gt;alert(&amp;quot;hacked: cookie=&amp;quot; + document.cookie)&amp;lt;/script&amp;gt;!</div>

<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ: الناتج فوق ده هو الـ HTML الخام بعد التنضيف — لو اتحط في صفحة، المتصفح هيعرض حرفيًا النص <code>&lt;script&gt;alert("hacked...")&lt;/script&gt;</code> كـ <b>كلام على الشاشة</b>، مش كوسم بيتنفذ. القاعدة: أي قيمة جاية من المستخدم لازم تعدّي على <code>htmlspecialchars()</code> وقت الطباعة جوه HTML — من غير استثناءات، حتى لو حسّيت إنها "مستبعد" تحتوي كود.</div>
    <div class="en">🇬🇧 Notice: the output above is the raw HTML after escaping — if placed in a page, the browser will literally display the text <code>&lt;script&gt;alert("hacked...")&lt;/script&gt;</code> as <b>text on screen</b>, not as an executing tag. The rule: any value coming from a user must pass through <code>htmlspecialchars()</code> when printed into HTML — no exceptions, even when you think it's "unlikely" to contain code.</div>
</div>

<div class="mini-editor-wrap">
    <textarea spellcheck="false">&lt;?php
// جرّب تغيّر $maliciousName لأي نص فيه وسوم HTML وشوف الفرق
$maliciousName = '&lt;script&gt;alert("hacked: cookie=" + document.cookie)&lt;/script&gt;';

// ✅ آمن — تنضيف قبل الطباعة في HTML
$safe = htmlspecialchars($maliciousName, ENT_QUOTES, 'UTF-8');
echo "Welcome, " . $safe . "!" . PHP_EOL;

// جرّب كمان مدخل فيه علامة اقتباس داخل attribute
$comment = 'nice post! &lt;img src=x onerror=alert(1)&gt;';
echo htmlspecialchars($comment, ENT_QUOTES, 'UTF-8') . PHP_EOL;
</textarea>
    <div class="mini-toolbar">
        <button class="mini-run-btn">▶ شغّل / Run</button>
        <span class="mini-status"></span>
    </div>
    <div class="output-box">— لسه متشغلش / not run yet —</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="reflect">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">XSS بيحصل إمتى بالظبط؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">When exactly does XSS happen?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="reflect"> لما مدخل مستخدم غير منضّف بيتطبع جوه HTML فيتنفذ كأنه كود</label>
        <label><input type="radio" name="q1" value="db"> لما قاعدة البيانات بتترك اتصال مفتوح</label>
        <label><input type="radio" name="q1" value="cookie"> لما الكوكيز بتتشفّر</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="hsc">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">إيه الدالة اللي بتمنع تنفيذ وسوم HTML/JS جاية من المستخدم؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Which function prevents user-supplied HTML/JS tags from executing?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="hsc"> htmlspecialchars()</label>
        <label><input type="radio" name="q2" value="trim"> trim()</label>
        <label><input type="radio" name="q2" value="strlen"> strlen()</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="entities">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">بعد <code>htmlspecialchars('&lt;script&gt;', ENT_QUOTES, 'UTF-8')</code>، إيه اللي بيترجع فعليًا (حسب المثال المنفّذ فوق)؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Based on the executed example above, what does <code>htmlspecialchars('&lt;script&gt;', ...)</code> actually return?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="entities"> نص فيه رموز HTML مكافئة (زي &amp;lt;script&amp;gt;) بدل الوسم نفسه</label>
        <label><input type="radio" name="q3" value="removed"> نفس الوسم بعد حذفه بالكامل من النص</label>
        <label><input type="radio" name="q3" value="same"> نفس النص كما هو من غير أي تغيير</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="quotes">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">ليه بنستخدم <code>ENT_QUOTES</code> مع <code>htmlspecialchars</code>؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Why do we pass <code>ENT_QUOTES</code> to <code>htmlspecialchars</code>?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="quotes"> عشان يحوّل علامات الاقتباس المفردة والمزدوجة كمان، وده مهم لو النص هيتحط جوه attribute</label>
        <label><input type="radio" name="q4" value="speed"> عشان يخلي الدالة أسرع في التنفيذ</label>
        <label><input type="radio" name="q4" value="sql"> عشان يمنع SQL Injection كمان</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ لاقي واصلح الثغرة / Find and Fix the Vulnerability</h3>
    <div class="ar">🇪🇬 في <a href="../playground/index.php">محرر الكود</a>: اكتب سكريبت بيمثّل صفحة تعليقات — مصفوفة فيها 3 تعليقات، واحد منهم فيه <code>&lt;script&gt;</code> أو <code>&lt;img src=x onerror=...&gt;</code>. اطبعهم الأول من غير تنضيف وشوف الناتج الخام، وبعدين لفّهم كلهم بـ <code>htmlspecialchars()</code> وقارن.</div>
    <div class="en">🇬🇧 In the <a href="../playground/index.php">Playground</a>: write a script representing a comments page — an array of 3 comments, one of them containing a <code>&lt;script&gt;</code> or <code>&lt;img src=x onerror=...&gt;</code> payload. Print them first without sanitizing and inspect the raw output, then wrap them all with <code>htmlspecialchars()</code> and compare.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 XSS بيهاجم المستخدم اللي بيشوف الصفحة — الدرس الجاي بيهاجم المستخدم اللي عنده جلسة مفتوحة بالفعل: <code>CSRF</code>. هتشوف إزاي موقع خبيث يقدر يخلي متصفحك ينفّذ إجراء (زي تحويل فلوس) باسمك من غير ما تقصد، والحماية بـ CSRF Token.</div>
    <div class="en">🇬🇧 XSS attacks the user viewing the page — the next lesson attacks a user with an already-open session: <code>CSRF</code>. You'll see how a malicious site can make your browser perform an action (like transferring money) as you, without your intent, and how a CSRF token protects against it.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li><code>XSS</code> = مدخل مستخدم بيتحول لكود JS ينفّذه المتصفح، بسبب طباعة غير منضّفة جوه HTML.</li>
        <li>الحل: <code>htmlspecialchars($input, ENT_QUOTES, 'UTF-8')</code> على أي قيمة جاية من المستخدم وقت الطباعة.</li>
        <li>القاعدة من غير استثناءات — حتى لو المدخل "شكله" غير خطير.</li>
        <li>الديمو أثبت إن نفس المدخل الخبيث بعد <code>htmlspecialchars</code> بيطبع كنص عادي، مش كوسم بيتنفذ.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="security-sql-injection.php">← الدرس السابق / Prev: 🔐 Lab: SQL Injection</a>
    <a href="security-csrf.php">الدرس الجاي / Next: 🔐 Lab: CSRF →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
