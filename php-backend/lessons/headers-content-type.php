<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'headers-content-type';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'الـ Headers و Content-Type — Headers & Content-Type';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">Stage 4 · Web & HTTP</span>
<h1>الـ Headers و Content-Type <span class="ltr">Headers &amp; Content-Type</span></h1>
<p class="subtitle">إزاي السيرفر والمتصفح "بيتفاهموا" على شكل البيانات قبل ما يبعتوها. <span class="ltr">How the server and browser "agree" on the shape of the data before sending it.</span></p>

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
    <div class="ar">🇪🇬 تفهم إن الـ Headers هي "بيانات عن البيانات" (Metadata) بتتبعت مع كل طلب واستجابة — قبل الـ Body نفسه — وإن أهم Header فيهم، <code class="ltr">Content-Type</code>، هو اللي بيقول للطرف التاني "البيانات اللي جاية دي شكلها إيه" (HTML؟ JSON؟ ملف؟)، عشان يعرف يفسرها صح.</div>
    <div class="en">🇬🇧 Understand that Headers are "data about the data" (metadata) sent with every request and response — before the body itself — and that the most important one, <code class="ltr">Content-Type</code>, tells the other side "what shape this incoming data is" (HTML? JSON? A file?), so it knows how to interpret it correctly.</div>
</div>

<h2 id="understand">🧠 Content-Type: HTML مقابل JSON مقابل multipart/form-data</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 لما شفت نص الاستجابة في درس HTTP Request &amp; Response، كان فيه سطر <code class="ltr">Content-Type: text/html; charset=UTF-8</code> — ده اللي بيخلي المتصفح يعرف "دي صفحة، افسّرها كـ HTML وارسمها". لو نفس البيانات بالظبط اترسلت بـ <code class="ltr">Content-Type: application/json</code> بدل كده، المتصفح مش هيرسمها كصفحة — هيعاملها كنص JSON خام. القيمة دي بتحدد "لغة التفاهم" بين الطرفين، مش شكل البيانات الفعلي بس.</div>
    <div class="en">🇬🇧 In the HTTP Request &amp; Response lesson's response text, there was a line <code class="ltr">Content-Type: text/html; charset=UTF-8</code> — this is what tells the browser "this is a page, interpret it as HTML and render it." If the exact same bytes were sent with <code class="ltr">Content-Type: application/json</code> instead, the browser wouldn't render it as a page — it would treat it as raw JSON text. This value sets "the shared language" between both sides, not just the data's actual shape.</div>
</div>

<div class="output-box" style="overflow-x:auto;padding:0;">
<table style="width:100%;border-collapse:collapse;">
<tr style="background:var(--panel-2);"><th style="padding:10px 14px;text-align:left;border:1px solid var(--border);">Content-Type</th><th style="padding:10px 14px;text-align:left;border:1px solid var(--border);">Used for</th></tr>
<tr><td style="padding:10px 14px;border:1px solid var(--border);"><code>text/html; charset=UTF-8</code></td><td style="padding:10px 14px;border:1px solid var(--border);">A rendered web page — the browser parses tags and paints them</td></tr>
<tr><td style="padding:10px 14px;border:1px solid var(--border);"><code>application/json</code></td><td style="padding:10px 14px;border:1px solid var(--border);">A structured data response for an API — the client parses it with a JSON decoder, never renders it as a page</td></tr>
<tr><td style="padding:10px 14px;border:1px solid var(--border);"><code>multipart/form-data</code></td><td style="padding:10px 14px;border:1px solid var(--border);">A request body carrying a file upload, mixed with regular form fields — data is split into labeled "parts" with boundaries</td></tr>
</table>
</div>

<div class="bi-block">
    <div class="ar">🇪🇬 لو كودك بيطبع فعليًا JSON بس ناسي تحط <code class="ltr">header('Content-Type: application/json')</code>، الافتراضي في PHP هو <code class="ltr">text/html</code> — المتصفح أو مكتبة الـ HTTP client اللي عند المستخدم ممكن تحاول تفسّر الـ JSON كـ HTML، أو (لو كانت ذكية) تكتشف الغلط وترفض تفهمه صح. العكس أخطر: لو حطيت <code class="ltr">Content-Type: application/json</code> بس فعليًا طبعت HTML، أي كود عميل بيعمل <code class="ltr">response.json()</code> هيفشل بخطأ Parse Error — لإن اللي وصله مش JSON فعلًا رغم إن الـ Header بيقول إنه كذلك. الهيدر ده "وعد" — لو كذبت فيه، الطرف التاني بيتكسر.</div>
    <div class="en">🇬🇧 If your code actually prints JSON but forgets <code class="ltr">header('Content-Type: application/json')</code>, PHP's default is <code class="ltr">text/html</code> — the browser or the user's HTTP client library might try to interpret the JSON as HTML, or (if it's smart) detect the mismatch and refuse to parse it correctly. The reverse is worse: claim <code class="ltr">Content-Type: application/json</code> but actually print HTML, and any client code calling <code class="ltr">response.json()</code> fails with a parse error — because what arrived isn't actually JSON, despite the header's promise. This header is a "promise" — lie in it, and the other side breaks.</div>
</div>

<h2 id="practice">💻 إرسال الهيدر فعليًا / Actually Sending the Header</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 دالة <code>header()</code> في PHP بتضيف سطر Header للاستجابة اللي هترسل. الشرط الوحيد: لازم تتنادى قبل أي output فعلي (echo، مسافة، سطر جديد برا وسم <code class="ltr">?&gt;</code>) — لإن الـ Headers بتتبعت جزء أول قبل الـ Body، فلو الـ Body بدأ يتبعت PHP مش هيقدر يضيف Headers بعد كده. الكود تحت بينفذ فعليًا: بيستدعي <code>header()</code> (مفيش خطأ لإنها اتنادت الأول قبل أي echo)، وبعدين يطبع JSON حقيقي بـ <code>json_encode()</code>.</div>
    <div class="en">🇬🇧 PHP's <code>header()</code> function adds a header line to the response about to be sent. The one rule: it must be called before any actual output (an echo, a stray space, a newline outside <code class="ltr">?&gt;</code>) — because headers are sent as a first block before the body, so once the body starts streaming PHP can no longer add headers. The code below genuinely executes: it calls <code>header()</code> (no error, since it's called first, before any echo), then prints real JSON with <code>json_encode()</code>.</div>
</div>

<pre><code>&lt;?php
header('Content-Type: application/json');
echo json_encode(['ok' =&gt; true]);</code></pre>
<h3>الناتج الفعلي (الجزء اللي PHP بيطبعه في الـ Body) / Actual output (the part PHP prints into the body)</h3>
<div class="output-box">{"ok":true}</div>

<div class="bi-block">
    <div class="ar">🇪🇬 مهم توضيح حدود التجربة دي بأمانة: تشغيل الكود ده تحت CLI بيثبت إن <code>header()</code> اتنادت من غير أي خطأ (زي "headers already sent") وإن <code>json_encode()</code> فعليًا رجّعت النص الصحيح — لكن مفيش متصفح حقيقي هنا يستقبل الـ Header ده عشان نتأكد إنه وصل بالقيمة الصح. عشان نثبت ده فعليًا 100%، شغّلنا سيرفر PHP محلي حقيقي وعملنا طلب <code class="ltr">curl</code> فعلي على <code class="ltr">db-sandbox/run.php</code> بتاع نفس المنصة دي (اللي بيحط <code class="ltr">header('Content-Type: application/json')</code> في أول سطر منه)، والتقطنا الـ Headers الحقيقية اللي رجعت:</div>
    <div class="en">🇬🇧 Important to be honest about this experiment's limits: running this under CLI proves <code>header()</code> was called with no error (like "headers already sent") and that <code>json_encode()</code> genuinely returned the right text — but there's no real browser here receiving that header to confirm it arrived with the right value. To prove that 100% for real, we started a real local PHP server and made an actual <code class="ltr">curl</code> request against this platform's own <code class="ltr">db-sandbox/run.php</code> (whose first line is <code class="ltr">header('Content-Type: application/json')</code>), and captured the real headers that came back:</div>
</div>

<pre><code>$ curl -s -D - -o /dev/null -X POST -d "sql=SELECT 1" http://127.0.0.1:8952/php-backend/db-sandbox/run.php

HTTP/1.1 200 OK
Host: 127.0.0.1:8952
Date: Fri, 04 Sep 2026 19:50:12 GMT
Connection: close
X-Powered-By: PHP/8.2.12
Content-Type: application/json</code></pre>

<div class="bi-block">
    <div class="ar">🇪🇬 ده التقاط حقيقي 100% — مش نص توضيحي مكتوب مسبقًا — لسطر <code class="ltr">Content-Type: application/json</code> راجع فعليًا من سيرفر PHP حقيقي عن طريق شبكة حقيقية (Localhost). ده الدليل النهائي إن الـ Header اللي بتحطه بـ <code>header()</code> فعلًا بيوصل للعميل بالقيمة الصح.</div>
    <div class="en">🇬🇧 This is a genuinely real 100% capture — not pre-written illustrative text — of the <code class="ltr">Content-Type: application/json</code> line actually coming back from a real running PHP server over a real network (localhost). This is the final proof that the header you set with <code>header()</code> genuinely reaches the client with the right value.</div>
</div>

<div class="mini-editor-wrap">
    <textarea spellcheck="false">&lt;?php
// Try changing the Content-Type and see the label change, though only the
// echoed body (not a receiving browser) is visible in this sandbox.
header('Content-Type: application/json');
$payload = ['success' =&gt; true, 'message' =&gt; 'Data saved'];
echo json_encode($payload) . PHP_EOL;

echo "---" . PHP_EOL;

header('Content-Type: text/html; charset=UTF-8');
echo "&lt;p&gt;This part would render as a paragraph if a browser received it as text/html.&lt;/p&gt;" . PHP_EOL;</textarea>
    <div class="mini-toolbar">
        <button class="mini-run-btn">▶ شغّل / Run</button>
        <span class="mini-status"></span>
    </div>
    <div class="output-box">— لسه متشغلش / not run yet —</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="metadata">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">الـ Headers بشكل عام هي إيه بالنسبة للـ Body؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What are Headers, generally, in relation to the Body?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="metadata"> بيانات عن البيانات (Metadata) بتتبعت قبل الـ Body</label>
        <label><input type="radio" name="q1" value="same"> نفس الـ Body بس بصيغة تانية</label>
        <label><input type="radio" name="q1" value="after"> بتتبعت بعد الـ Body عشان تلخصه</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="multipart">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">فورم فيه <code class="ltr">&lt;input type="file"&gt;</code> لازم يستخدم أنهي Content-Type؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">A form with an <code class="ltr">&lt;input type="file"&gt;</code> must use which Content-Type?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="json"> application/json</label>
        <label><input type="radio" name="q2" value="multipart"> multipart/form-data</label>
        <label><input type="radio" name="q2" value="html"> text/html</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="before">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">إمتى لازم تستدعي <code>header()</code> في PHP؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">When must you call PHP's <code>header()</code>?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="before"> قبل أي output فعلي (echo أو مسافة زيادة)</label>
        <label><input type="radio" name="q3" value="after"> بعد ما تخلص كل الـ echo عادي</label>
        <label><input type="radio" name="q3" value="anytime"> في أي وقت، الترتيب مش مهم أبدًا</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="curl">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">إزاي أثبتنا في الدرس ده إن <code class="ltr">Content-Type: application/json</code> فعليًا وصل لعميل حقيقي، مش بس اتحط في الكود؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">How did this lesson prove <code class="ltr">Content-Type: application/json</code> genuinely reached a real client, not just that it was set in code?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="curl"> بتشغيل سيرفر PHP حقيقي وعمل طلب curl فعلي والتقاط الـ Headers الراجعة</label>
        <label><input type="radio" name="q4" value="assume"> بافتراض إنها هتوصل صح لإن الكود مكتوب صح</label>
        <label><input type="radio" name="q4" value="cli"> بتشغيل الكود تحت CLI بس وقراءة ناتج echo</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ اختر الـ Content-Type الصح / Pick the Right Content-Type</h3>
    <div class="ar">🇪🇬 في <a href="../playground/index.php">محرر الكود</a> (أو المحرر المصغّر فوق): اكتب دالة <code>respond(string $format, array $data): void</code> بتاخد <code class="ltr">'json'</code> أو <code class="ltr">'html'</code>، تستدعي <code>header()</code> بالـ Content-Type المناسب، وتطبع البيانات بالشكل المطابق (json_encode للـ JSON، وسطر <code class="ltr">&lt;ul&gt;&lt;li&gt;...&lt;/li&gt;&lt;/ul&gt;</code> بسيط للـ HTML).</div>
    <div class="en">🇬🇧 In the <a href="../playground/index.php">Playground</a> (or the mini editor above): write a <code>respond(string $format, array $data): void</code> function that accepts <code class="ltr">'json'</code> or <code class="ltr">'html'</code>, calls <code>header()</code> with the matching Content-Type, and prints the data in the matching shape (json_encode for JSON, a simple <code class="ltr">&lt;ul&gt;&lt;li&gt;...&lt;/li&gt;&lt;/ul&gt;</code> for HTML).</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 دلوقتي جمعت كل حاجة: الرحلة الكاملة، الـ Methods، أكواد الحالة، والـ Headers. الدرس الجاي بيحطهم كلهم مع بعض في مثال واحد متكامل — <code class="ltr">POST /login</code> بـ JSON — من الطلب اللي بيوصل لحد الاستجابة اللي بترجع، بمنطق حقيقي بيتحقق من كلمة مرور فعلية.</div>
    <div class="en">🇬🇧 You've now gathered everything: the full journey, methods, status codes, and headers. The next lesson puts them all together in one complete example — <code class="ltr">POST /login</code> with JSON — from the incoming request to the returned response, with real logic verifying an actual password.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li><code class="ltr">Content-Type</code> بيقول للطرف التاني "البيانات دي شكلها إيه" — HTML، JSON، أو multipart لرفع الملفات.</li>
        <li>ادّعاء نوع غلط في الـ Header (بينما البيانات فعليًا نوع تاني) بيكسر أي عميل بيحاول يفسّرها صح.</li>
        <li><code>header()</code> لازم تتنادى قبل أي output فعلي.</li>
        <li>تنفيذ <code>header()</code> و<code>json_encode()</code> تحت CLI بيثبت إنهم شغالين من غير أخطاء؛ إثبات وصول القيمة فعليًا للعميل محتاج طلب HTTP حقيقي — زي التقاط curl الحقيقي اللي شفناه فوق.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="http-methods-status-codes.php">← الدرس السابق / Prev: HTTP Methods &amp; Status Codes</a>
    <a href="json-login-example.php">الدرس الجاي / Next: A Complete JSON Login Example →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
