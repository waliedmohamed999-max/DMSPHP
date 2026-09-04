<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'security-csrf';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'الأمان — 🔐 معمل: CSRF';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">Stage 14 · Security</span>
<h1>🔐 معمل: CSRF <span class="ltr">🔐 Lab: CSRF</span></h1>
<p class="subtitle">إزاي موقع تاني يقدر ينفّذ إجراء باسمك، والحماية بـ CSRF Token. <span class="ltr">How another site can perform an action as you, and protecting against it with a CSRF token.</span></p>

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
    <div class="ar">🇪🇬 تفهم إزاي موقع خبيث يقدر "يستغل" إن متصفحك مسجّل دخول في موقع تاني، ويخلّي المتصفح يبعت طلب (زي تحويل فلوس أو تغيير إيميل) من غير علمك — ده اسمه <code>CSRF (Cross-Site Request Forgery)</code>. تتعلم الحماية القياسية: <code>CSRF Token</code> عشوائي بيتولّد، يتخزن في الـ Session، ويتأكد منه قبل أي عملية بتغيّر حاجة.</div>
    <div class="en">🇬🇧 Understand how a malicious site can "exploit" the fact that your browser is logged into another site, making the browser send a request (like transferring money or changing an email) without your knowledge — this is called <code>CSRF (Cross-Site Request Forgery)</code>. Then learn the standard defense: a random <code>CSRF Token</code> generated, stored in the Session, and verified before any state-changing action.</div>
</div>

<h2 id="understand">🧠 إزاي الهجوم بيحصل / How the Attack Happens</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 CSRF مش عن سرقة كلمة سرك أو قراءة بياناتك — هو عن "استخدام" جلستك المفتوحة (Session) من غير علمك. المتصفح بيبعت الكوكيز الخاصة بأي موقع تلقائيًا مع أي طلب ليه، حتى لو الطلب اتولّد من صفحة مختلفة تمامًا. مفيش كود بيتنفذ هنا (زي XSS) — الهجوم مبني بالكامل على إن فورم عادي بيتبعت لموقعك، ومتصفحك (لإنه لسه فاتح جلستك) بيرفق الكوكيز أوتوماتيك.</div>
    <div class="en">🇬🇧 CSRF isn't about stealing your password or reading your data — it's about "using" your already-open session without your knowledge. A browser sends a site's cookies automatically with any request to it, even if that request originated from a completely different page. No code executes here (unlike XSS) — the attack relies entirely on an ordinary form being submitted to your site, with your browser (because your session is still open) attaching the cookies automatically.</div>
</div>

<div class="flow-diagram">
    <div class="flow-box">1) أنت مسجّل دخول في bank.com (Session نشط)</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">2) بتفتح صفحة evil-site.com في نفس المتصفح</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">3) الصفحة فيها فورم مخفي بيتبعت أوتوماتيك لـ bank.com/transfer</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">4) متصفحك بيرفق كوكيز bank.com تلقائيًا (لسه فاتح جلستك)</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">5) bank.com ينفّذ التحويل — من وجهة نظره الطلب جاي منك</div>
</div>

<div class="bi-block">
    <div class="ar">🇪🇬 <strong>ملحوظة صدق:</strong> السيناريو ده وصف لهجوم حقيقي بيحصل بين موقعين مختلفين عبر متصفح حقيقي — مش حاجة نقدر "ننفذها" جوه محرر PHP واحد في نفس السيرفر (ده يحتاج موقعين فعليين ومتصفح حقيقي). عشان كده مفيش <code>.output-box</code> هنا، وبدل منه شرح + مخطط. الجزء اللي هنجربه فعليًا هو كود توليد والتحقق من الـ Token تحت.</div>
    <div class="en">🇬🇧 <strong>Honesty note:</strong> This scenario describes a real attack that happens across two different sites through a real browser — it's not something we can "execute" inside one PHP editor on the same server (that would require two real sites and a real browser). That's why there's no <code>.output-box</code> here, just an explanation and a diagram instead. The part we'll actually run is the token generation/verification code below.</div>
</div>

<h2 id="practice">💻 الحل: CSRF Token / The Fix: CSRF Token</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 الفكرة: تولّد قيمة عشوائية يصعب تخمينها (<code>bin2hex(random_bytes(32))</code>)، تخزنها في <code>$_SESSION</code>، وتحطها كحقل مخفي في الفورم. لما الفورم يتبعت، تقارن القيمة الجاية بالقيمة المخزّنة باستخدام <code>hash_equals()</code> (مش <code>==</code> العادي، عشان تتفادى هجمات Timing Attack). موقع خبيث مش هيعرف يولّد أو يقرأ التوكن ده — لإنه مخزّن في جلستك ومش موجود في صفحته.</div>
    <div class="en">🇬🇧 The idea: generate a value that's hard to guess (<code>bin2hex(random_bytes(32))</code>), store it in <code>$_SESSION</code>, and place it as a hidden field in the form. When the form is submitted, compare the incoming value against the stored one using <code>hash_equals()</code> (not plain <code>==</code>, to avoid timing-attack style comparisons). A malicious site cannot generate or read this token — because it lives in your session, not on its own page.</div>
</div>

<pre><code>&lt;?php
// وقت عرض الفورم — نولّد توكن ونخزنه في الـ Session
$_SESSION['csrf'] = bin2hex(random_bytes(32));
echo "Generated token: " . $_SESSION['csrf'] . PHP_EOL;
echo "Token length: " . strlen($_SESSION['csrf']) . " chars" . PHP_EOL;

// وقت استلام الفورم — نقارن التوكن الجاي بالمخزّن
$submittedTokenGood = $_SESSION['csrf']; // فورم شرعي بعت نفس التوكن
$isValid = hash_equals($_SESSION['csrf'], $submittedTokenGood);
echo "Matching token check: " . ($isValid ? 'VALID (true)' : 'INVALID (false)') . PHP_EOL;

// موقع خبيث معندوش التوكن الحقيقي، فهيبعت قيمة تانية (أو فاضية)
$submittedTokenBad = bin2hex(random_bytes(32));
$isValidBad = hash_equals($_SESSION['csrf'], $submittedTokenBad);
echo "Forged token check: " . ($isValidBad ? 'VALID (true)' : 'INVALID (false)') . PHP_EOL;</code></pre>
<h3>الناتج الفعلي (اتنفّذ فعليًا — قيمة التوكن هتختلف في كل تشغيل) / Actual output (really executed — the token value differs on every run)</h3>
<div class="output-box">Generated token: fbbd816dbaa904eb9decb1791f2a0d1f8927a78dde456debfbb6f73dcaca4098
Token length: 64 chars
Matching token check: VALID (true)
Forged token check: INVALID (false)</div>

<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ: <code>Token length: 64 chars</code> ثابت دايمًا (لإن <code>random_bytes(32)</code> بترجع 32 بايت، و<code>bin2hex</code> بيحوّل كل بايت لحرفين هيكس = 64 حرف)، لكن القيمة نفسها هتكون مختلفة في كل مرة تشغّل فيها الكود — وده المطلوب بالظبط، عشان موقع خبيث مايقدرش يخمّنها.</div>
    <div class="en">🇬🇧 Notice: <code>Token length: 64 chars</code> is always constant (because <code>random_bytes(32)</code> returns 32 bytes, and <code>bin2hex</code> turns each byte into two hex characters = 64 characters), but the value itself will differ every time you run the code — which is exactly the point, so a malicious site can never guess it.</div>
</div>

<div class="mini-editor-wrap">
    <textarea spellcheck="false">&lt;?php
session_start();

// وقت عرض الفورم — نولّد توكن ونخزنه في الـ Session
$_SESSION['csrf'] = bin2hex(random_bytes(32));
echo "Generated token: " . $_SESSION['csrf'] . PHP_EOL;
echo "Token length: " . strlen($_SESSION['csrf']) . " chars" . PHP_EOL;

// وقت استلام الفورم — نقارن التوكن الجاي بالمخزّن
$submittedTokenGood = $_SESSION['csrf'];
$isValid = hash_equals($_SESSION['csrf'], $submittedTokenGood);
echo "Matching token check: " . ($isValid ? 'VALID (true)' : 'INVALID (false)') . PHP_EOL;

// موقع خبيث معندوش التوكن الحقيقي
$submittedTokenBad = bin2hex(random_bytes(32));
$isValidBad = hash_equals($_SESSION['csrf'], $submittedTokenBad);
echo "Forged token check: " . ($isValidBad ? 'VALID (true)' : 'INVALID (false)') . PHP_EOL;
</textarea>
    <div class="mini-toolbar">
        <button class="mini-run-btn">▶ شغّل / Run</button>
        <span class="mini-status"></span>
    </div>
    <div class="output-box">— لسه متشغلش / not run yet —</div>
</div>

<div class="security-box">
    <h3>⚠️ قواعد إضافية / Additional Rules</h3>
    <div class="ar">🇪🇬 اتحقق من الـ Token في أي طلب بيغيّر حاجة (POST/PUT/DELETE) — مش في GET العادي. استخدم <code>hash_equals()</code> بدل <code>==</code> أو <code>===</code> عشان المقارنة تاخد نفس الوقت بغض النظر عن مين مطابق، فيصعب استنتاج التوكن الصحيح حرف بحرف. وولّد توكن جديد بعد كل تسجيل دخول ناجح.</div>
    <div class="en">🇬🇧 Verify the token on any state-changing request (POST/PUT/DELETE) — not on ordinary GETs. Use <code>hash_equals()</code> instead of <code>==</code> or <code>===</code> so the comparison takes the same time regardless of how much matches, making it hard to infer the correct token character by character. And generate a fresh token after every successful login.</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="cookie">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">CSRF بيعتمد بشكل أساسي على إيه؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What does CSRF fundamentally rely on?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="cookie"> إن المتصفح بيبعت كوكيز الموقع تلقائيًا مع أي طلب ليه، من أي مصدر</label>
        <label><input type="radio" name="q1" value="js"> إن الموقع الخبيث بيسرق كلمة السر مباشرة</label>
        <label><input type="radio" name="q1" value="sql"> إن قاعدة البيانات مش بتستخدم Prepared Statements</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="token">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">الحماية القياسية ضد CSRF إيه؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What is the standard protection against CSRF?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="token"> توكن عشوائي مخزّن في الـ Session وبيتحقق منه قبل أي عملية</label>
        <label><input type="radio" name="q2" value="hsc"> htmlspecialchars() على كل مدخل</label>
        <label><input type="radio" name="q2" value="prepare"> Prepared Statements</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="equals">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">ليه استخدمنا <code>hash_equals()</code> بدل <code>==</code> في مقارنة التوكن؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Why did we use <code>hash_equals()</code> instead of <code>==</code> to compare the token?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="equals"> عشان المقارنة تاخد نفس الوقت دايمًا وتمنع استنتاج التوكن عن طريق قياس الزمن</label>
        <label><input type="radio" name="q3" value="fast"> عشان أسرع في الأداء بشكل عام</label>
        <label><input type="radio" name="q3" value="type"> عشان يحوّل الأنواع تلقائيًا</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="invalid">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">حسب المثال المنفّذ فوق، لما التوكن المُرسل كان مزيّف (Forged)، إيه نتيجة الفحص؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Based on the executed example above, when the submitted token was forged, what was the check result?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="valid"> VALID (true)</label>
        <label><input type="radio" name="q4" value="invalid"> INVALID (false)</label>
        <label><input type="radio" name="q4" value="error"> PHP Fatal Error</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ نظام حماية فورم / Protecting a Form</h3>
    <div class="ar">🇪🇬 في <a href="../playground/index.php">محرر الكود</a> (أو المحرر المصغّر فوق): اكتب دالة <code>generateCsrfToken(array &amp;$session): string</code> بتولّد التوكن وتخزنه، ودالة <code>verifyCsrfToken(array $session, string $submitted): bool</code> بتستخدم <code>hash_equals()</code>. جرّبها بـ 3 حالات: نفس التوكن، توكن فاضي <code>''</code>، وتوكن عشوائي مختلف — واطبع نتيجة كل حالة.</div>
    <div class="en">🇬🇧 In the <a href="../playground/index.php">Playground</a> (or the mini editor above): write a <code>generateCsrfToken(array &amp;$session): string</code> function that generates and stores the token, and a <code>verifyCsrfToken(array $session, string $submitted): bool</code> function using <code>hash_equals()</code>. Test it with 3 cases: the same token, an empty string <code>''</code>, and a different random token — and print each result.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 لحد دلوقتي أمّنّا مين بيقدر "يشوف" أو "ينفّذ" حاجة — الدرس الجاي بيأمّن حاجة أعمق: هوية المستخدم نفسه. هتتعلم إزاي تخزن كلمات المرور بأمان بـ <code>password_hash()</code>/<code>password_verify()</code>، وإزاي تحمي الـ Session من هجوم اسمه Session Fixation.</div>
    <div class="en">🇬🇧 So far we've secured who can "see" or "trigger" something — the next lesson secures something deeper: the user's identity itself. You'll learn how to store passwords safely with <code>password_hash()</code>/<code>password_verify()</code>, and how to protect the session from an attack called Session Fixation.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li><code>CSRF</code> بيستغل إن جلستك مفتوحة، مش بيسرق بياناتك أو ينفّذ كود جوه متصفحك.</li>
        <li>الهجوم بيحصل عبر موقعين مختلفين، عشان كده الديمو هنا شرح + مخطط بدل تنفيذ فعلي.</li>
        <li>الحماية: <code>CSRF Token</code> عشوائي (<code>bin2hex(random_bytes(32))</code>) مخزّن في <code>$_SESSION</code>.</li>
        <li>التحقق دايمًا بـ <code>hash_equals()</code>، وعلى كل طلب بيغيّر حاجة (POST/PUT/DELETE).</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="security-xss.php">← الدرس السابق / Prev: 🔐 Lab: Cross-Site Scripting</a>
    <a href="security-passwords-sessions.php">الدرس الجاي / Next: Password &amp; Session Security →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
