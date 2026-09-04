<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'rest-api-authentication-concepts';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'مفاهيم مصادقة الـ API: Session, Token, JWT';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">Stage 13 · REST API Development</span>
<h1>مفاهيم مصادقة الـ API: Session, Token, JWT <span class="ltr">API Authentication Concepts: Session, Token, JWT</span></h1>
<p class="subtitle">ليه API غالبًا بيحتاج طريقة مصادقة مختلفة عن موقع عادي، ومفهوم JWT من غير ما تستخدمه أعمى. <span class="ltr">Why an API usually needs a different auth approach than a regular site, and the JWT concept before you ever use it blindly.</span></p>

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
    <div class="ar">🇪🇬 في درس Sessions اللي فات، تعلمت إن السيرفر بيحتفظ بحالة تسجيل الدخول جوه Session، والمتصفح بيبعت الـ Session ID أوتوماتيك في Cookie. الطريقة دي ممتازة لموقع بيتصفحه إنسان بمتصفح، لكنها بتتعقّد لما العميل يبقى تطبيق موبايل، أو سكريبت، أو سيرفر تاني بيكلّم الـ API — مفيش "متصفح" يحتفظ بـ Cookies. الدرس ده بيوضّح 4 طرق: Session-based (لما مناسبة)، API Keys، Bearer Tokens، ومفهوم JWT (بدون تنفيذه من الصفر).</div>
    <div class="en">🇬🇧 In the earlier Sessions lesson, you learned the server keeps login state in a Session, and the browser automatically sends the Session ID in a Cookie. That's great for a site browsed by a human in a browser, but it gets awkward when the client is a mobile app, a script, or another server talking to your API — there's no "browser" holding onto cookies. This lesson clarifies four approaches: Session-based (when it fits), API Keys, Bearer Tokens, and the JWT concept (without implementing it from scratch).</div>
</div>

<h2 id="understand">🧠 1) Session-based Auth — لما تكون مناسبة / When It Fits</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 لو الـ API بتاعك بيستخدمه بس فرونت-إند الموقع نفسه (JavaScript بتاعك بيعمل <code>fetch</code> لنفس الدومين)، فـ Session-based Auth (اللي اتعلمتها بالفعل) شغالة كويس جدًا: المستخدم بيسجّل دخول، الكوكي بترجع مع كل طلب أوتوماتيك، والسيرفر بيتأكد من الـ Session. مفيش داعي لأي حاجة إضافية.</div>
    <div class="en">🇬🇧 If your API is consumed only by your own site's frontend (your JavaScript doing <code>fetch</code> to the same domain), Session-based Auth (which you already learned) works great: the user logs in, the cookie rides along with every request automatically, and the server checks the Session. Nothing extra is needed.</div>
</div>
<div class="bi-block">
    <div class="ar">🇪🇬 المشكلة بتظهر لما عميل تاني غير المتصفح يحتاج يستخدم نفس الـ API — تطبيق موبايل ملوش "كوكي جار" زي المتصفح، وسكريبت خارجي (زي شركة تانية بتنادي API بتاعك) مش هيسجّل دخول بفورم HTML. هنا بيبقى محتاج آلية تانية.</div>
    <div class="en">🇬🇧 The problem shows up when a client other than a browser needs the same API — a mobile app has no "browser cookie jar", and an external script (say, another company calling your API) isn't going to log in through an HTML form. That's where a different mechanism is needed.</div>
</div>

<h2>2) API Keys — مفتاح ثابت للتطبيقات / A Fixed Key for Applications</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>API Key</b> نص ثابت (زي <code>sk_live_7f2a9c1d4e</code>) بيتولّد للمطوّر مرة واحدة، وبيبعته مع كل طلب في Header اسمه غالبًا <code>Authorization</code> أو <code>X-API-Key</code>. السيرفر بيقارنه بنسخة مخزّنة (في قاعدة بيانات عادةً)، ولو مطابق، الطلب مسموح. مفيد لتحديد "مين التطبيق ده" أكتر من "مين المستخدم" — زي التفرقة بين طلبات شركة أ وشركة ب بتنادي نفس الـ API.</div>
    <div class="en">🇬🇧 An <b>API Key</b> is a fixed string (like <code>sk_live_7f2a9c1d4e</code>) generated once for a developer, sent with every request in a header usually named <code>Authorization</code> or <code>X-API-Key</code>. The server compares it against a stored copy (usually in a database), and if it matches, the request is allowed. It's more about identifying "which application is this" than "which user" — like telling company A's requests apart from company B's on the same API.</div>
</div>
<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ استخدام <code>hash_equals()</code> بدل <code>===</code> في المقارنة تحت — دالة PHP مصممة خصيصًا عشان تقارن نصين في زمن ثابت (Constant-Time Comparison)، فمنعًا لهجوم Timing Attack اللي ممكن يخمّن المفتاح حرف بحرف من فروق دقيقة في وقت الاستجابة.</div>
    <div class="en">🇬🇧 Notice the use of <code>hash_equals()</code> instead of <code>===</code> in the comparison below — a PHP function specifically designed to compare two strings in constant time, preventing a Timing Attack that could guess the key character-by-character from tiny differences in response time.</div>
</div>

<pre><code>&lt;?php
function checkApiKey(string $providedKey, string $storedKey): array
{
    if (!hash_equals($storedKey, $providedKey)) {
        return ['error' =&gt; ['code' =&gt; 'UNAUTHORIZED', 'message' =&gt; 'Invalid API key.']];
    }
    return ['data' =&gt; ['message' =&gt; 'Access granted.']];
}

$storedKey = 'sk_live_7f2a9c1d4e';

// simulating header: Authorization: Bearer sk_live_7f2a9c1d4e
echo json_encode(checkApiKey('sk_live_7f2a9c1d4e', $storedKey), JSON_PRETTY_PRINT) . PHP_EOL;

// simulating header: Authorization: Bearer wrong-key-123
echo json_encode(checkApiKey('wrong-key-123', $storedKey), JSON_PRETTY_PRINT);</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">{
    "data": {
        "message": "Access granted."
    }
}
{
    "error": {
        "code": "UNAUTHORIZED",
        "message": "Invalid API key."
    }
}</div>
<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ إن رد الخطأ هنا بنفس الشكل بالظبط اللي ثبّتناه في الدرس اللي فات (<code>error.code</code> / <code>error.message</code>) — الاتساق ده بيمتد لكل حاجة بترجع من الـ API، حتى أخطاء المصادقة.</div>
    <div class="en">🇬🇧 Notice the error response here uses the exact same shape locked in last lesson (<code>error.code</code> / <code>error.message</code>) — that consistency extends to everything the API returns, including authentication errors.</div>
</div>

<h2 id="practice">💻 3) Bearer Tokens — مفهوم الـ Header / The Header Concept</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>Bearer Token</b> مش تقنية مختلفة جذريًا عن API Key من ناحية الآلية — هو برضو نص بيتبعت في Header، لكن الاصطلاح المتفق عليه (RFC 6750) هو الشكل: <code>Authorization: Bearer &lt;token&gt;</code>. كلمة "Bearer" (حامل) معناها "أي حد يحمل التوكن ده يتعامل معاملة صاحبه" — يعني التوكن نفسه هو إثبات الهوية، من غير ما يتبعت اسم مستخدم أو باسورد مع كل طلب.</div>
    <div class="en">🇬🇧 A <b>Bearer Token</b> isn't a fundamentally different mechanism from an API Key — it's still a string sent in a header, but the agreed convention (RFC 6750) is the form: <code>Authorization: Bearer &lt;token&gt;</code>. "Bearer" means "whoever holds this token is treated as its owner" — the token itself is the proof of identity, without sending a username or password on every request.</div>
</div>
<pre><code>GET /api/products HTTP/1.1
Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkpvaG4gRG9lIiwiaWF0IjoxNTE2MjM5MDIyfQ.SflKxwRJSMeKKF2QT4fwpMeJf36POk6yJV_adQssw5c</code></pre>
<div class="bi-block">
    <div class="ar">🇪🇬 عادةً التوكن ده بيتولّد لما المستخدم يسجّل دخول (بيبعت Username/Password مرة واحدة على endpoint زي <code>POST /api/login</code>)، والسيرفر بيرجّع توكن ليه مدة صلاحية، والعميل يخزّنه ويبعته مع كل طلب بعد كده — بدل الاعتماد على Cookie زي الـ Session.</div>
    <div class="en">🇬🇧 This token is typically generated when the user logs in (sending Username/Password once to an endpoint like <code>POST /api/login</code>), the server returns a token with an expiry, and the client stores it and sends it with every subsequent request — instead of relying on a cookie the way Sessions do.</div>
</div>

<h2>4) مفهوم JWT — من غير تنفيذه من الصفر / The JWT Concept — Without Implementing It Yourself</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 تنويه صريح قبل ما نكمل: <b>مش هنبني توليد أو تحقق JWT من الصفر هنا</b>. التحقق من التوقيع (Signature Verification) لازم مكتبة تشفير موثوقة (زي <code>firebase/php-jwt</code>) بتستخدم HMAC أو RSA بشكل صحيح — كتابته يدويًا سهل جدًا تعمله غلط بطريقة بتفتح ثغرة أمنية خطيرة. اللي هنعمله هنا: نفهم الشكل، ونفكّ تشفير الأجزاء اللي مش سرية (Header وPayload)، ونوضّح ليه الجزء التالت (Signature) هو اللي بيمنع التلاعب.</div>
    <div class="en">🇬🇧 An explicit note before we continue: <b>we are not building JWT generation or verification from scratch here</b>. Signature verification requires a trusted crypto library (like <code>firebase/php-jwt</code>) using HMAC or RSA correctly — hand-rolling it is very easy to get wrong in a way that opens a serious security hole. What we do here: understand the shape, decode the non-secret parts (Header and Payload), and explain why the third part (Signature) is what prevents tampering.</div>
</div>
<div class="bi-block">
    <div class="ar">🇪🇬 JWT (JSON Web Token) عبارة عن 3 أجزاء متفصلة بنقطة: <code>header.payload.signature</code>. الـ <code>header</code> والـ <code>payload</code> مجرد JSON متكوّد بـ Base64URL — <b>مش مشفّر</b>، أي حد يقدر يفكّه ويقراه، حتى من غير مفتاح سري. اللي بيمنع حد من تغيير الـ payload (زي تغيير <code>"role": "user"</code> لـ <code>"role": "admin"</code>) هو الـ <code>signature</code>: توقيع مبني من الـ header + payload + مفتاح سري السيرفر بيعرفه بس. لو أي حرف اتغيّر في الـ payload، التوقيع هيبقى مش مطابق، والسيرفر هيرفضه.</div>
    <div class="en">🇬🇧 A JWT (JSON Web Token) is 3 parts separated by dots: <code>header.payload.signature</code>. The <code>header</code> and <code>payload</code> are just Base64URL-encoded JSON — <b>not encrypted</b>, anyone can decode and read them, even without any secret key. What prevents someone from tampering with the payload (like changing <code>"role": "user"</code> to <code>"role": "admin"</code>) is the <code>signature</code>: a signature built from the header + payload + a secret key only the server knows. If even one character in the payload changes, the signature no longer matches, and the server rejects it.</div>
</div>

<div class="bi-block">
    <div class="ar">🇪🇬 التوكن اللي هنحلله ده هو <b>المثال العام الشهير من توثيق jwt.io نفسها</b> — مش سر حقيقي ولا مرتبط بأي حساب. هنستخدم <code>base64_decode()</code> فعليًا (بعد تحويل Base64URL لـ Base64 عادي) عشان نشوف جوه الـ Header وPayload بالظبط، بدون أي مكتبة JWT:</div>
    <div class="en">🇬🇧 The token we'll dissect here is <b>the well-known public example from jwt.io's own documentation</b> — not a real secret, not tied to any account. We'll actually use <code>base64_decode()</code> (after converting Base64URL to regular Base64) to see exactly what's inside the Header and Payload, without any JWT library:</div>
</div>

<pre><code>&lt;?php
$exampleJwt = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkpvaG4gRG9lIiwiaWF0IjoxNTE2MjM5MDIyfQ.SflKxwRJSMeKKF2QT4fwpMeJf36POk6yJV_adQssw5c';

[$headerB64, $payloadB64, $signature] = explode('.', $exampleJwt);

function base64UrlDecode(string $data): string
{
    $data = strtr($data, '-_', '+/');
    $padded = str_pad($data, strlen($data) % 4 === 0 ? strlen($data) : strlen($data) + (4 - strlen($data) % 4), '=');
    return base64_decode($padded);
}

echo "Header:  " . base64UrlDecode($headerB64) . PHP_EOL;
echo "Payload: " . base64UrlDecode($payloadB64) . PHP_EOL;
echo "Signature (opaque, cannot be decoded to plaintext): " . $signature . PHP_EOL;</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">Header:  {"alg":"HS256","typ":"JWT"}
Payload: {"sub":"1234567890","name":"John Doe","iat":1516239022}
Signature (opaque, base64url, cannot be decoded to plaintext): SflKxwRJSMeKKF2QT4fwpMeJf36POk6yJV_adQssw5c</div>
<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ إن الـ Header بيقول نوع الخوارزمية (<code>HS256</code>) ونوع التوكن (<code>JWT</code>)، والـ Payload فيه بيانات المستخدم (<code>sub</code> = Subject/الـ id، <code>name</code>، <code>iat</code> = Issued At بالـ Unix Timestamp). أما الـ Signature، فعلى عكس الاتنين التانيين، مش JSON متكودة — دي خرج دالة تشفير (HMAC-SHA256 هنا)، مفيش طريقة "تفك تشفيرها" لإنها مش متشفّرة أصلًا، هي ببساطة بصمة رياضية بتتحقق منها مكتبة تشفير بمقارنتها بنسخة معاد حسابها من الـ Header/Payload + السر — وده بالظبط الجزء اللي محتاج مكتبة موثوقة، مش كود مكتوب يدويًا.</div>
    <div class="en">🇬🇧 Notice the Header states the algorithm (<code>HS256</code>) and token type (<code>JWT</code>), and the Payload holds user data (<code>sub</code> = Subject/id, <code>name</code>, <code>iat</code> = Issued At as a Unix timestamp). The Signature, unlike the other two, isn't encoded JSON — it's the output of a cryptographic function (HMAC-SHA256 here); there's no way to "decode" it back because it was never encoded, it's simply a mathematical fingerprint a crypto library verifies by comparing it to a freshly recomputed one from the Header/Payload + secret — and that's exactly the part that needs a trusted library, not hand-rolled code.</div>
</div>

<div class="bi-block">
    <div class="ar">🇪🇬 جرّب تفكيك JWT مختلف بنفسك تحت (لسه مثال عام، مش سر حقيقي).</div>
    <div class="en">🇬🇧 Try decoding a different JWT yourself below (still a public example, not a real secret).</div>
</div>

<div class="mini-editor-wrap">
    <textarea spellcheck="false">&lt;?php
function base64UrlDecode(string $data): string
{
    $data = strtr($data, '-_', '+/');
    $padded = str_pad($data, strlen($data) % 4 === 0 ? strlen($data) : strlen($data) + (4 - strlen($data) % 4), '=');
    return base64_decode($padded);
}

// A different well-known public example JWT (still not a real secret):
$exampleJwt = 'eyJhbGciOiJIUzI1NiJ9.eyJsb2dnZWRJbkFzIjoiYWRtaW4iLCJpYXQiOjE0MjI3Nzk2Mzh9.gzSraSYS8EXBxLN_oWnFSRgCzcmJmMjLiuyu5CSpyHI';
[$headerB64, $payloadB64, $signature] = explode('.', $exampleJwt);

echo "Header:  " . base64UrlDecode($headerB64) . PHP_EOL;
echo "Payload: " . base64UrlDecode($payloadB64) . PHP_EOL;
echo "Signature is opaque and NOT decoded here — verifying it needs a real crypto library." . PHP_EOL;</textarea>
    <div class="mini-toolbar">
        <button class="mini-run-btn">▶ شغّل / Run</button>
        <span class="mini-status"></span>
    </div>
    <div class="output-box">— لسه متشغلش / not run yet —</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="notencrypted">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">الـ Header والـ Payload في JWT محميين إزاي؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">How are a JWT's Header and Payload protected?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="notencrypted"> مش محميين من القراءة أصلًا — أي حد يفك تشفيرهم بـ Base64، الحماية بس من التلاعب عن طريق الـ Signature</label>
        <label><input type="radio" name="q1" value="encrypted"> متشفّرين بمفتاح سري، محدش يقدر يقراهم غير السيرفر</label>
        <label><input type="radio" name="q1" value="hidden"> مخفيين تمامًا جوه الـ Signature</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="hashequals">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">في مثال <code>checkApiKey</code>، ليه استخدمنا <code>hash_equals()</code> بدل <code>===</code>؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">In the <code>checkApiKey</code> example, why use <code>hash_equals()</code> instead of <code>===</code>?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="faster"> أسرع في التنفيذ</label>
        <label><input type="radio" name="q2" value="hashequals"> بيقارن في زمن ثابت، فبيمنع Timing Attack يخمّن المفتاح حرف بحرف</label>
        <label><input type="radio" name="q2" value="types"> بيسمح بمقارنة نص برقم</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="library">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">ليه الدرس ماعملش تحقق فعلي من توقيع JWT من الصفر؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Why didn't this lesson implement real JWT signature verification from scratch?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="hard"> لإنه صعب جدًا يتفهم مفهوميًا</label>
        <label><input type="radio" name="q3" value="library"> لإنه محتاج مكتبة تشفير موثوقة — كتابته يدويًا سهل يتعمل غلط بطريقة تفتح ثغرة أمنية</label>
        <label><input type="radio" name="q3" value="slow"> لإنه بطيء جدًا وقت التنفيذ</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="bearer">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">الشكل القياسي (RFC 6750) لبعت توكن في Header إيه؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What's the standard (RFC 6750) form for sending a token in a header?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="bearer"> <code>Authorization: Bearer &lt;token&gt;</code></label>
        <label><input type="radio" name="q4" value="cookie"> <code>Cookie: token=&lt;token&gt;</code></label>
        <label><input type="radio" name="q4" value="query"> <code>?token=&lt;token&gt;</code> في الـ URL دايمًا</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ Middleware تحقق بسيط / A Simple Auth-Check Middleware</h3>
    <div class="ar">🇪🇬 في <a href="../playground/index.php">محرر الكود</a> (أو المحرر المصغّر فوق): اكتب دالة <code>requireApiKey(?string $providedKey, string $storedKey): array</code> بترجع <code>errorResponse('UNAUTHORIZED', 'Missing API key.')</code> لو <code>$providedKey</code> كان <code>null</code>، وترجع نتيجة <code>checkApiKey</code> العادية لو مش <code>null</code>. جرّبها بـ <code>null</code> وبمفتاح صحيح وغلط.</div>
    <div class="en">🇬🇧 In the <a href="../playground/index.php">Playground</a> (or the mini editor above): write a <code>requireApiKey(?string $providedKey, string $storedKey): array</code> function that returns <code>errorResponse('UNAUTHORIZED', 'Missing API key.')</code> when <code>$providedKey</code> is <code>null</code>, and otherwise returns the normal <code>checkApiKey</code> result. Test it with <code>null</code>, a correct key, and a wrong key.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 كده خلّصت مرحلة "بناء REST API" كاملة: من مبادئ التصميم، لأول API CRUD حقيقي، للـ Pagination/Filtering/Sorting، لشكل موحّد للأخطاء، ولمفاهيم المصادقة الأربعة. المسار هيكمل بعد كده لمشاريع أكبر بتجمع كل المهارات دي مع بعض في تطبيقات حقيقية أعقد.</div>
    <div class="en">🇬🇧 That completes the full "REST API Development" stage: from design principles, to your first real CRUD API, through Pagination/Filtering/Sorting, a consistent error shape, and all four authentication concepts. The track continues from here into larger projects that combine all these skills together in more advanced, real applications.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>Session-based Auth مناسب لما العميل هو فرونت-إند نفس الموقع؛ مش عملي لعملاء تانيين (موبايل، سكريبتات).</li>
        <li>API Key: نص ثابت بيحدد التطبيق/المطوّر، لازم يتقارن بـ <code>hash_equals()</code> مش <code>===</code>.</li>
        <li>Bearer Token: نفس فكرة إرسال نص في Header، بس بصيغة موحّدة <code>Authorization: Bearer &lt;token&gt;</code> (RFC 6750).</li>
        <li>JWT = <code>header.payload.signature</code> — الاتنين الأولانيين Base64 عادي (يتقرا بدون سر)، والـ Signature هو اللي بيمنع التلاعب، ولازم مكتبة تشفير موثوقة للتحقق منه، مش كود مكتوب يدويًا.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="rest-error-responses.php">← الدرس السابق / Prev: API Error Responses</a>
    <a href="../index.php">الرئيسية / Home →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
