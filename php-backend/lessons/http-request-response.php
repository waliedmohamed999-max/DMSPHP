<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'http-request-response';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'طلب واستجابة HTTP — HTTP Request & Response';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">Stage 4 · Web & HTTP</span>
<h1>طلب واستجابة HTTP <span class="ltr">HTTP Request &amp; Response</span></h1>
<p class="subtitle">إيه اللي بيحصل بالظبط من لحظة ما تكتب URL وتدوس Enter لحد ما الصفحة تظهر. <span class="ltr">What actually happens from the moment you type a URL and hit Enter until the page appears.</span></p>

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
    <div class="ar">🇪🇬 تفهم رحلة الطلب الكاملة — من متصفح المستخدم لحد PHP على السيرفر ورجوعها تاني — كخطوات محددة ومسمّاة، مش كصندوق أسود. وتشوف إزاي PHP بتمثّل جزء بسيط بس مهم من الرحلة دي: استقبال بيانات الطلب ومعالجتها وإرسال استجابة.</div>
    <div class="en">🇬🇧 Understand the full request journey — from the user's browser to PHP on the server and back — as concrete, named steps, not a black box. And see how PHP represents one small but crucial part of that journey: receiving request data, processing it, and sending a response.</div>
</div>

<h2 id="understand">🧠 الرحلة الكاملة / The Full Journey</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 لما تكتب <code class="ltr">https://example.com/login</code> في المتصفح وتدوس Enter، بيحصل تسلسل خطوات قبل ما تشوف أي حاجة على الشاشة. مفيش خطوة من دول بتحصل جوه PHP — كلها بتحصل قبل ما PHP يشتغل أصلًا أو بعد ما يخلص، لكن لازم تفهمها عشان تفهم فين بالظبط PHP بيدخل في الصورة.</div>
    <div class="en">🇬🇧 When you type <code class="ltr">https://example.com/login</code> into the browser and hit Enter, a sequence of steps happens before anything appears on screen. None of these steps happen inside PHP — they all happen before PHP ever runs, or after it finishes — but you need to understand them to see exactly where PHP fits into the picture.</div>
</div>

<div class="flow-diagram">
    <div class="flow-box">1. DNS Lookup<br><span class="ltr" style="font-size:0.8em">example.com → 93.184.216.34</span></div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">2. TCP Connection<br><span class="ltr" style="font-size:0.8em">3-way handshake to port 443/80</span></div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">3. HTTP Request Sent<br><span class="ltr" style="font-size:0.8em">GET /login HTTP/1.1 + headers</span></div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">4. Server Processes<br><span class="ltr" style="font-size:0.8em">Apache/Nginx hands off to PHP</span></div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">5. HTTP Response Sent<br><span class="ltr" style="font-size:0.8em">HTTP/1.1 200 OK + HTML body</span></div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">6. Browser Renders<br><span class="ltr" style="font-size:0.8em">parses HTML, paints the page</span></div>
</div>

<div class="bi-block">
    <div class="ar">🇪🇬 <b>1) DNS Lookup:</b> المتصفح مش بيعرف يبعت حاجة لاسم زي <code>example.com</code> — لازم يحوّله لعنوان IP الأول. بيسأل خادم DNS "إيه الـ IP بتاع example.com؟" ويرجعله رقم زي <code class="ltr">93.184.216.34</code>. <b>2) TCP Connection:</b> المتصفح بيفتح اتصال حقيقي مع السيرفر على الـ IP ده (بروتوكول TCP، عن طريق "3-way handshake": SYN → SYN-ACK → ACK) — ده قناة اتصال، مش الطلب نفسه لسه. <b>3) HTTP Request:</b> على القناة دي، المتصفح بيبعت نص فعلي زي اللي هتشوفه تحت. <b>4) Server Processes:</b> سيرفر الويب (Apache/Nginx) بيستلم النص ده، بيشوف إنه لازم يشغّل PHP للمسار ده، وPHP بيملأ السوبر جلوبالز (<code>$_SERVER</code>, <code>$_GET</code>, <code>$_POST</code>...) من الطلب ده ويشغّل كودك. <b>5) HTTP Response:</b> اللي كودك بيطبعه (echo, HTML) بيتحول لنص استجابة زي اللي هتشوفه تحت، وبيترسل راجع على نفس الاتصال. <b>6) Browser Renders:</b> المتصفح بياخد النص ده، يفهم إنه HTML، يبني منه DOM ويرسمه على الشاشة.</div>
    <div class="en">🇬🇧 <b>1) DNS Lookup:</b> the browser can't send anything to a name like <code>example.com</code> — it must resolve it to an IP address first. It asks a DNS server "what's the IP for example.com?" and gets back something like <code class="ltr">93.184.216.34</code>. <b>2) TCP Connection:</b> the browser opens a real connection to that IP (the TCP protocol, via a "3-way handshake": SYN → SYN-ACK → ACK) — this is a communication channel, not the request itself yet. <b>3) HTTP Request:</b> over that channel, the browser sends actual text like what you'll see below. <b>4) Server Processes:</b> the web server (Apache/Nginx) receives that text, decides this path should run PHP, and PHP populates the superglobals (<code>$_SERVER</code>, <code>$_GET</code>, <code>$_POST</code>...) from that request and runs your code. <b>5) HTTP Response:</b> whatever your code outputs (echo, HTML) becomes response text like what you'll see below, sent back over the same connection. <b>6) Browser Renders:</b> the browser takes that text, recognizes it as HTML, builds a DOM from it, and paints it on screen.</div>
</div>

<h3>نص الطلب الحقيقي كما يُرسل فعليًا / The real request text, exactly as sent on the wire</h3>
<pre><code>GET /login HTTP/1.1
Host: example.com
User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64)
Accept: text/html,application/xhtml+xml
Accept-Language: en-US,en;q=0.9
Connection: keep-alive
</code></pre>

<h3>نص الاستجابة الحقيقي كما يُرسل فعليًا / The real response text, exactly as sent back</h3>
<pre><code>HTTP/1.1 200 OK
Date: Fri, 04 Sep 2026 19:50:12 GMT
Content-Type: text/html; charset=UTF-8
Content-Length: 118
Connection: keep-alive

&lt;!doctype html&gt;
&lt;html&gt;
&lt;head&gt;&lt;title&gt;Login&lt;/title&gt;&lt;/head&gt;
&lt;body&gt;
    &lt;form method="post" action="/login"&gt;...&lt;/form&gt;
&lt;/body&gt;
&lt;/html&gt;
</code></pre>

<div class="bi-block">
    <div class="ar">🇪🇬 البلوكين دول مش ناتج تشغيل كود — دول بس نص توضيحي (illustrative) بيوريك شكل الطلب والاستجابة الحقيقيين على مستوى بروتوكول HTTP، اللي عادة المتصفح بيتعامل معاه من وراك من غير ما تشوفه (إلا لو فتحت أدوات المطور → Network في المتصفح). لكن اللي PHP فعلًا بيتعامل معاه هو النتيجة النهائية لتفسير النص ده: قيم جاهزة في <code>$_SERVER</code>.</div>
    <div class="en">🇬🇧 Those two blocks aren't the output of running code — they're just illustrative text showing what the real request and response look like at the HTTP protocol level, which the browser normally handles for you invisibly (unless you open DevTools → Network). What PHP actually deals with is the end result of parsing that text: ready-made values in <code>$_SERVER</code>.</div>
</div>

<h2 id="practice">💻 من نص الطلب لـ $_SERVER في PHP / From Request Text to PHP's $_SERVER</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 لما سيرفر ويب حقيقي (زي Apache) يستقبل الطلب اللي فوق، هو اللي بيملأ <code>$_SERVER['REQUEST_METHOD']</code>، <code>$_SERVER['REQUEST_URI']</code>، <code>$_SERVER['HTTP_HOST']</code> وغيرها — من نص الطلب نفسه. تحت PHP CLI مفيش طلب حقيقي وصل خالص، فمفيش حد ملأ القيم دي؛ عشان نوضّح الفكرة، هنملأها إحنا يدويًا بالضبط زي ما كانت هتتملى من الطلب فوق، ونقرأها تاني — ده محاكاة (Simulation) واضحة، مش طلب حقيقي.</div>
    <div class="en">🇬🇧 When a real web server (like Apache) receives the request above, it is the one that populates <code>$_SERVER['REQUEST_METHOD']</code>, <code>$_SERVER['REQUEST_URI']</code>, <code>$_SERVER['HTTP_HOST']</code>, and others — from the request text itself. Under PHP CLI, no real request ever arrived, so nothing populated those values; to make the idea concrete, we set them manually here exactly as they would have been set from the request above, then read them back — this is a clearly labeled simulation, not a real request.</div>
</div>

<pre><code>&lt;?php
// Simulating values a real HTTP request would populate in $_SERVER — hardcoded
// stand-ins here since PHP CLI has no incoming HTTP request to populate them from.
$_SERVER['REQUEST_METHOD'] = 'GET';
$_SERVER['REQUEST_URI'] = '/login';
$_SERVER['HTTP_HOST'] = 'example.com';
$_SERVER['HTTP_USER_AGENT'] = 'Mozilla/5.0 (simulated)';
$_SERVER['SERVER_PROTOCOL'] = 'HTTP/1.1';

echo "Method: " . $_SERVER['REQUEST_METHOD'] . PHP_EOL;
echo "URI: " . $_SERVER['REQUEST_URI'] . PHP_EOL;
echo "Host header: " . $_SERVER['HTTP_HOST'] . PHP_EOL;
echo "Protocol: " . $_SERVER['SERVER_PROTOCOL'] . PHP_EOL;
echo "Reconstructed URL: http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . PHP_EOL;</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">Method: GET
URI: /login
Host header: example.com
Protocol: HTTP/1.1
Reconstructed URL: http://example.com/login</div>

<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ إن آخر سطر بيبني نفس رابط <code>example.com/login</code> اللي كتبته في المتصفح من الأول — بس دلوقتي مبني من مكونات منفصلة جاية من الطلب: الـ Host والـ URI. في مشروع حقيقي تحت Apache/Nginx، السطور اللي فوق كانت هتشتغل من غير ما تحتاج تحط القيم دي بنفسك — السيرفر هو اللي بيحطها.</div>
    <div class="en">🇬🇧 Notice the last line rebuilds the same <code>example.com/login</code> URL you originally typed into the browser — but now assembled from separate components that came from the request: the Host and the URI. In a real project under Apache/Nginx, the lines above would work without you setting those values yourself — the server sets them.</div>
</div>

<div class="mini-editor-wrap">
    <textarea spellcheck="false">&lt;?php
// Simulating values a real HTTP request would populate in $_SERVER
$_SERVER['REQUEST_METHOD'] = 'POST';
$_SERVER['REQUEST_URI'] = '/login';
$_SERVER['HTTP_HOST'] = 'example.com';
$_SERVER['HTTP_USER_AGENT'] = 'Mozilla/5.0 (simulated)';
$_SERVER['SERVER_PROTOCOL'] = 'HTTP/1.1';

echo "Method: " . $_SERVER['REQUEST_METHOD'] . PHP_EOL;
echo "URI: " . $_SERVER['REQUEST_URI'] . PHP_EOL;
echo "Host header: " . $_SERVER['HTTP_HOST'] . PHP_EOL;
echo "Reconstructed URL: http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . PHP_EOL;

// Try changing REQUEST_METHOD to 'POST' or REQUEST_URI to '/register' and re-run</textarea>
    <div class="mini-toolbar">
        <button class="mini-run-btn">▶ شغّل / Run</button>
        <span class="mini-status"></span>
    </div>
    <div class="output-box">— لسه متشغلش / not run yet —</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="dns">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">أول خطوة بتحصل لما تكتب <code class="ltr">https://example.com/login</code> وتدوس Enter، إيه هي؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What's the very first step that happens when you type <code>https://example.com/login</code> and hit Enter?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="dns"> DNS Lookup — تحويل example.com لعنوان IP</label>
        <label><input type="radio" name="q1" value="php"> تشغيل كود PHP على السيرفر</label>
        <label><input type="radio" name="q1" value="render"> رسم الصفحة في المتصفح</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="server">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">مين اللي فعليًا بيملأ <code>$_SERVER['REQUEST_METHOD']</code> في مشروع حقيقي تحت Apache/Nginx؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Who actually populates <code>$_SERVER['REQUEST_METHOD']</code> in a real project under Apache/Nginx?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="server"> سيرفر الويب، من نص الطلب اللي وصله فعليًا</label>
        <label><input type="radio" name="q2" value="dev"> المطوّر لازم يكتبها يدويًا في كل سكريبت</label>
        <label><input type="radio" name="q2" value="browser"> المتصفح بيحطها مباشرة في ملف PHP</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="afterdns">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">حسب مخطط الخطوات فوق، الـ TCP Connection بتحصل امتى بالنسبة للـ DNS Lookup؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Per the step diagram above, when does the TCP Connection happen relative to the DNS Lookup?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="afterdns"> بعد DNS Lookup — لازم تعرف الـ IP الأول عشان تفتح اتصال عليه</label>
        <label><input type="radio" name="q3" value="beforedns"> قبل DNS Lookup</label>
        <label><input type="radio" name="q3" value="samestep"> نفس الخطوة بالظبط</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="simulated">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">في مثال <code>$_SERVER</code> اللي شغّلناه فوق تحت CLI، القيم اللي طبعناها جت منين؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">In the <code>$_SERVER</code> example we ran above under CLI, where did the printed values actually come from?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="simulated"> إحنا حطيناها يدويًا في الكود عشان نحاكي طلب حقيقي — مفيش طلب فعلي وصل</label>
        <label><input type="radio" name="q4" value="realreq"> من طلب HTTP حقيقي وصل لسكريبت PHP ده</label>
        <label><input type="radio" name="q4" value="database"> من قاعدة بيانات محفوظ فيها إعدادات السيرفر</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ اعرض تفاصيل طلب متخيّل / Display a Simulated Request's Details</h3>
    <div class="ar">🇪🇬 في <a href="../playground/index.php">محرر الكود</a> (أو المحرر المصغّر فوق): حاكي طلب <code class="ltr">POST /register</code> بحط <code>$_SERVER['REQUEST_METHOD'] = 'POST'</code> و<code>$_SERVER['REQUEST_URI'] = '/register'</code> يدويًا، واكتب دالة <code>describeRequest(): string</code> بترجع جملة زي <code class="ltr">"POST request to /register"</code> باستخدام قيم <code>$_SERVER</code> بس.</div>
    <div class="en">🇬🇧 In the <a href="../playground/index.php">Playground</a> (or the mini editor above): simulate a <code class="ltr">POST /register</code> request by manually setting <code>$_SERVER['REQUEST_METHOD'] = 'POST'</code> and <code>$_SERVER['REQUEST_URI'] = '/register'</code>, and write a <code>describeRequest(): string</code> function that returns a sentence like <code class="ltr">"POST request to /register"</code> using only <code>$_SERVER</code> values.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 دلوقتي عارف شكل الرحلة كاملة والـ Method اللي جوه الطلب — بس مش كل الـ Methods بتتصرف بنفس الشكل، ومش كل استجابة بترجع 200 OK. الدرس الجاي هياخدك في تفاصيل الـ Methods المختلفة (GET/POST/PUT/PATCH/DELETE) وأشهر أكواد الحالة اللي السيرفر بيرجعها، ومعنى كل واحد فيهم فعليًا.</div>
    <div class="en">🇬🇧 Now you know the full journey and what the Method inside a request looks like — but not every method behaves the same way, and not every response comes back as 200 OK. The next lesson dives into the different methods (GET/POST/PUT/PATCH/DELETE) and the most common status codes a server sends back, and what each one really means.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>الرحلة الكاملة: DNS Lookup → TCP Connection → HTTP Request → Server Processes (PHP) → HTTP Response → Browser Renders.</li>
        <li>الطلب والاستجابة هما نص واضح بيتبعت على الشبكة — سطر أول (Method/URI أو Status) وHeaders واختياريًا Body.</li>
        <li>PHP بيدخل بس في خطوة "Server Processes" — بيقرأ الطلب اللي وصله عن طريق <code>$_SERVER</code> وسوبر جلوبالز تانية، وبيطبع الاستجابة.</li>
        <li>تحت CLI، مفيش طلب حقيقي وصل، فأي قيم <code>$_SERVER</code> بنستخدمها هنا محاكاة يدوية موضّحة، مش بيانات جاية فعليًا من الشبكة.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="../index.php">← المرحلة السابقة</a>
    <a href="http-methods-status-codes.php">الدرس الجاي / Next: HTTP Methods &amp; Status Codes →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
