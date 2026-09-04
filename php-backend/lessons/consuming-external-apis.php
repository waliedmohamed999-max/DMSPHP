<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'consuming-external-apis';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'الملفات، JSON، والـ APIs — استهلاك APIs خارجية';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">Stage 6 · Files, JSON & APIs</span>
<h1>استهلاك APIs خارجية <span class="ltr">Consuming External APIs</span></h1>
<p class="subtitle">file_get_contents وcURL لطلب بيانات من API خارجي، ومعالجة أخطاء الشبكة. <span class="ltr">file_get_contents and cURL to request data from an external API, and handling network errors.</span></p>

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
    <div class="ar">🇪🇬 كتير من المشاريع الحقيقية محتاجة تطلب بيانات من خدمة خارجية — API طقس، API عملات، أو أي خدمة تانية. هتتعلم طريقتين: <code>file_get_contents()</code> البسيطة، وcURL الأقوى والأكثر تحكمًا (Timeout, Headers, وغيرها)، وإزاي تتعامل مع فشل الطلب بأمان بدل ما السكريبت يقع بالكامل.</div>
    <div class="en">🇬🇧 Many real projects need to request data from an external service — a weather API, a currency API, or any other service. You'll learn two approaches: the simple <code>file_get_contents()</code>, and the more powerful, more controllable cURL (timeouts, headers, etc.), and how to handle a failed request safely instead of the whole script crashing.</div>
</div>

<h2 id="understand">🧠 1) طلب فعلي بـ file_get_contents / A Real Request with file_get_contents</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <strong>ملحوظة صدق:</strong> جربنا فعليًا في بيئة التشغيل دي هل فيه وصول حقيقي للإنترنت من PHP، باستخدام <code>@file_get_contents()</code> على API عام مجاني (<code>official-joke-api.appspot.com</code>). النتيجة: <strong>الاتصال فعلاً نجح</strong> ورجّع بيانات حقيقية — عشان كده الناتج تحت مش تخمين، هو استجابة حقيقية جاية من الإنترنت وقت كتابة الدرس. لاحظ إن النكتة نفسها بتختلف في كل مرة تشغّل فيها الكود (الـ API بيرجّع نكتة عشوائية)، لكن شكل الاستجابة وبنيتها ثابتة.</div>
    <div class="en">🇬🇧 <strong>Honesty note:</strong> we genuinely tested, in this runtime environment, whether PHP has real internet access, using <code>@file_get_contents()</code> against a free public API (<code>official-joke-api.appspot.com</code>). Result: <strong>the connection actually succeeded</strong> and returned real data — so the output below isn't a guess, it's a genuine response fetched from the internet while writing this lesson. Note the joke itself differs every time you run the code (the API returns a random joke), but the response's shape and structure stay constant.</div>
</div>

<pre><code>&lt;?php
$url = 'https://official-joke-api.appspot.com/random_joke';
$context = stream_context_create(['http' => ['timeout' => 5]]);
$response = @file_get_contents($url, false, $context);

if ($response === false) {
    echo "Request failed." . PHP_EOL;
} else {
    echo "Raw response body:" . PHP_EOL;
    echo $response . PHP_EOL;

    $joke = json_decode($response, true);
    echo "Decoded and used:" . PHP_EOL;
    echo "Setup: " . $joke['setup'] . PHP_EOL;
    echo "Punchline: " . $joke['punchline'] . PHP_EOL;
}</code></pre>
<h3>الناتج الفعلي (طلب شبكة حقيقي، اتنفذ وقت كتابة الدرس) / Actual output (a real network request, executed while writing this lesson)</h3>
<div class="output-box">Raw response body:
{"type":"general","setup":"Can a kangaroo jump higher than the Empire State Building?","punchline":"Of course. The Empire State Building can't jump.","id":80}

Decoded and used:
Setup: Can a kangaroo jump higher than the Empire State Building?
Punchline: Of course. The Empire State Building can't jump.</div>

<div class="bi-block">
    <div class="ar">🇪🇬 <strong>لو شغّلت الكود ده على السيرفر بتاعك وفشل (رجّع <code>false</code>):</strong> ده غالبًا معناه إن outbound network access محجوب على السيرفر ده (شائع في بيئات استضافة مقيّدة أو Sandboxes)، مش إن الكود غلط. الحل النموذجي وقتها إنك تتأكد إن <code>allow_url_fopen</code> مفعّلة في <code>php.ini</code>، أو تستخدم cURL بدل <code>file_get_contents</code> لإنه أحيانًا بيدي رسائل خطأ أوضح.</div>
    <div class="en">🇬🇧 <strong>If you run this on your own server and it fails (returns <code>false</code>):</strong> that usually means outbound network access is blocked on that server (common in restricted hosting or sandboxes), not that the code is wrong. The typical fix is confirming <code>allow_url_fopen</code> is enabled in <code>php.ini</code>, or using cURL instead of <code>file_get_contents</code>, since it often gives clearer error messages.</div>
</div>

<h2 id="practice">💻 2) نفس الطلب بـ cURL ومعالجة الأخطاء / The Same Request with cURL and Error Handling</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 cURL بيدّيك تحكم أكتر: تقدر تحدد <code>CURLOPT_TIMEOUT</code>، تضيف Headers مخصصة، وتفحص <code>curl_errno()</code> عشان تعرف بالظبط نوع الخطأ (Timeout؟ DNS فشل؟ الاتصال اتقطع؟) بدل ما تعرف بس إن الطلب "فشل" من غير تفاصيل.</div>
    <div class="en">🇬🇧 cURL gives you more control: you can set <code>CURLOPT_TIMEOUT</code>, add custom headers, and inspect <code>curl_errno()</code> to know exactly what kind of error happened (timeout? DNS failure? connection dropped?) instead of just knowing the request "failed" with no detail.</div>
</div>

<pre><code>&lt;?php
$ch = curl_init('https://official-joke-api.appspot.com/random_joke');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 5);
$result = curl_exec($ch);
$errno = curl_errno($ch);
$error = curl_error($ch);
curl_close($ch);

echo "curl errno: $errno, error: " . ($error ?: '(none)') . PHP_EOL;
echo "curl result: " . var_export($result, true) . PHP_EOL;</code></pre>
<h3>الناتج الفعلي (اتنفذ فعليًا بنفس البيئة) / Actual output (really executed in the same environment)</h3>
<div class="output-box">curl errno: 0, error: (none)
curl result: '{"type":"general","setup":"Why did the coffee file a police report?","punchline":"It got mugged.","id":319}'</div>

<div class="bi-block">
    <div class="ar">🇪🇬 <code>curl errno: 0</code> معناها "مفيش خطأ" — لو الشبكة كانت محجوبة، كنا هنشوف رقم خطأ مختلف (زي 6 لـ "Couldn't resolve host" أو 28 لـ "Timeout"). دايمًا افحص <code>curl_errno($ch)</code> قبل ما تفترض إن <code>$result</code> فيها بيانات صحيحة.</div>
    <div class="en">🇬🇧 <code>curl errno: 0</code> means "no error" — if the network were blocked, we'd see a different error number (like 6 for "Couldn't resolve host" or 28 for "Timeout"). Always check <code>curl_errno($ch)</code> before assuming <code>$result</code> holds valid data.</div>
</div>

<h2>3) لما الشبكة تكون محجوبة فعلًا: كود صحيح لسه مفيد / When the Network Really Is Blocked: Correct Code Is Still Useful</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 حتى لو بيئة معيّنة بتمنع الاتصال الخارجي، الكود اللي بيبني الطلب لسه صح وهيشتغل عادي على سيرفر عادي مسموحله بالإنترنت. المهم إنك دايمًا تكتب <code>if ($response === false)</code> (أو تفحص <code>curl_errno</code>) بدل ما تفترض النجاح — كده الكود بيفضل شغال حتى لو الشبكة وقعت مؤقتًا.</div>
    <div class="en">🇬🇧 Even if a particular environment blocks outbound access, the code that builds the request is still correct and will work fine on a normal server allowed to reach the internet. The important part is always writing <code>if ($response === false)</code> (or checking <code>curl_errno</code>) instead of assuming success — that way your code keeps working even if the network drops temporarily.</div>
</div>

<pre><code>&lt;?php
$response = @file_get_contents('https://api.example.com/data');
if ($response === false) {
    // Never let a network failure crash the whole page.
    $data = null;
    echo "Could not reach the external API right now." . PHP_EOL;
} else {
    $data = json_decode($response, true);
    echo "Got " . count($data) . " item(s) from the API." . PHP_EOL;
}</code></pre>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="false">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question"><code>file_get_contents()</code> بترجع إيه لو الطلب فشل؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What does <code>file_get_contents()</code> return if the request fails?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="null"> null دايمًا</label>
        <label><input type="radio" name="q1" value="false"> false</label>
        <label><input type="radio" name="q1" value="throw"> بترمي Exception إجباري</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="worked">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">حسب الدرس، هل الوصول الحقيقي للإنترنت اشتغل في بيئة كتابة الدرس دي؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">According to the lesson, did real internet access work in the environment this lesson was written in?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="worked"> نعم، الاتصال نجح فعليًا ورجّع بيانات حقيقية</label>
        <label><input type="radio" name="q2" value="blocked"> لا، كان محجوب تمامًا</label>
        <label><input type="radio" name="q2" value="unknown"> الدرس ماجربش خالص</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="errno">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">إزاي تعرف بالتحديد نوع خطأ الشبكة اللي حصل مع cURL؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">How do you know the specific kind of network error that happened with cURL?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="errno"> curl_errno($ch) و curl_error($ch)</label>
        <label><input type="radio" name="q3" value="var_dump"> var_dump($ch) بس</label>
        <label><input type="radio" name="q3" value="none"> مفيش طريقة، cURL دايمًا بيصمت</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="crash">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">لو ماكتبتش <code>if ($response === false)</code> وحصل فشل شبكة، إيه المتوقع؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">If you skip <code>if ($response === false)</code> and a network failure happens, what's likely?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="crash"> محاولة استخدام false كأنه نص/JSON صحيح، وده هيسبب أخطاء لاحقة (زي json_decode(false))</label>
        <label><input type="radio" name="q4" value="fine"> مفيش أي مشكلة، PHP بتتعامل معاها تلقائيًا</label>
        <label><input type="radio" name="q4" value="retry"> PHP بتعيد المحاولة أوتوماتيك</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ دالة طلب آمنة / A Safe Request Function</h3>
    <div class="ar">🇪🇬 في <a href="../playground/index.php">محرر الكود</a>: اكتب دالة <code>fetchJoke(): ?array</code> بتستخدم <code>@file_get_contents()</code> على نفس الـ API، وترجع مصفوفة الـ decode لو نجحت أو <code>null</code> لو فشلت — من غير ما تخلي أي Warning يوقف السكريبت. جرّبها واطبع النتيجة، وجرّب كمان تغيّر الـ URL لدومين غير موجود عشان تشوف حالة الفشل بنفسك.</div>
    <div class="en">🇬🇧 In the <a href="../playground/index.php">Playground</a>: write a <code>fetchJoke(): ?array</code> function that uses <code>@file_get_contents()</code> on the same API, returning the decoded array on success or <code>null</code> on failure — without letting any warning stop the script. Test it and print the result, then also try changing the URL to a non-existent domain to see the failure case yourself.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 دلوقتي عارف تجيب بيانات من الإنترنت وتفكّها بـ JSON. الخطوة الأخيرة في المرحلة دي هي مشروع صغير حقيقي: API كامل لملاحظات (Notes) مخزّنة في ملف JSON بدل قاعدة بيانات — هتشوف <code>fopen/fwrite</code> وJSON وهم بيشتغلوا مع بعض في نظام CRUD كامل.</div>
    <div class="en">🇬🇧 You now know how to fetch data from the internet and decode its JSON. The final step in this stage is a real small project: a full Notes API backed by a JSON file instead of a database — you'll see <code>fopen/fwrite</code> and JSON working together in a complete CRUD system.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li><code>file_get_contents($url)</code> طريقة بسيطة لطلب بيانات، وبترجع <code>false</code> عند الفشل.</li>
        <li>cURL بيدّي تحكم أكتر (timeout, headers) وتفاصيل خطأ أوضح عبر <code>curl_errno()</code>.</li>
        <li>الوصول الحقيقي للإنترنت اشتغل فعليًا في بيئة كتابة الدرس، فالنتايج المعروضة استجابات حقيقية.</li>
        <li>دايمًا افحص فشل الطلب صراحةً قبل ما تستخدم النتيجة — مش كل بيئة بتسمح بالاتصال الخارجي.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="json-encode-decode.php">← الدرس السابق / Prev: JSON Encode &amp; Decode</a>
    <a href="json-notes-api-project.php">الدرس الجاي / Next: 🚀 Project: JSON Notes API →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
