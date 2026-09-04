<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'cookies-basics';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'الفورمات، الجلسات، والكوكيز — الكوكيز (Cookies)';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">Stage 5 · Forms, Sessions & Cookies</span>
<h1>الكوكيز (Cookies) <span class="ltr">Cookies</span></h1>
<p class="subtitle">setcookie(), قراءة $_COOKIE، وحذف كوكي فعليًا. <span class="ltr">setcookie(), reading $_COOKIE, and actually deleting a cookie.</span></p>

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
    <div class="ar">🇪🇬 الكوكي (Cookie) هي قطعة بيانات صغيرة السيرفر بيطلب من المتصفح يخزّنها هو (مش السيرفر)، وترجع تلقائيًا مع كل طلب جاي لنفس الموقع. عكس الـ Session، الكوكي بتعيش على جهاز المستخدم، ومفيدة لحاجات بسيطة زي "المستخدم بيفضّل الوضع الداكن" — حاجة مش حساسة ومحتاجة تفضل موجودة حتى لو السيرفر معملش أي حاجة تانية.</div>
    <div class="en">🇬🇧 A cookie is a small piece of data the server asks the browser to store on its own side, which comes back automatically with every future request to the same site. Unlike a Session, a cookie lives on the user's device, and is useful for simple things like "the user prefers dark mode" — something not sensitive that should persist even if the server does nothing else.</div>
</div>

<h2 id="understand">🧠 1) إنشاء كوكي / Creating a Cookie</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <code>setcookie(name, value, expire)</code> بتضيف Header اسمه <code>Set-Cookie</code> للاستجابة، وعشان كده لازم تتنادى قبل أي طباعة (بالظبط زي <code>session_start()</code>). الوقت (<code>time() + 3600</code> مثلًا) بيحدد امتى الكوكي تنتهي — لو معملتش <code>expire</code> خالص، الكوكي بتتمسح لما المتصفح يتقفل (Session Cookie).</div>
    <div class="en">🇬🇧 <code>setcookie(name, value, expire)</code> adds a <code>Set-Cookie</code> header to the response, so it must be called before any output (exactly like <code>session_start()</code>). The time (e.g. <code>time() + 3600</code>) sets when the cookie expires — with no <code>expire</code> at all, it's a session cookie that disappears when the browser closes.</div>
</div>

<pre><code>&lt;?php
// setcookie() must run BEFORE any output - just like session_start().
$setResult = setcookie('theme', 'dark', time() + 3600);
$deleteResult = setcookie('theme', '', time() - 3600); // delete by expiring in the past

echo "setcookie('theme', 'dark', ...) returned: " . var_export($setResult, true) . PHP_EOL;
echo "setcookie('theme', '', time()-3600) [delete] returned: " . var_export($deleteResult, true) . PHP_EOL;
echo "headers_sent() after both calls: " . var_export(headers_sent(), true) . PHP_EOL;</code></pre>
<h3>الناتج الفعلي (اتنفّذ فعليًا في CLI) / Actual output (really executed under CLI)</h3>
<div class="output-box">setcookie('theme', 'dark', ...) returned: true
setcookie('theme', '', time()-3600) [delete] returned: true
headers_sent() after both calls: true</div>

<div class="bi-block">
    <div class="ar">🇪🇬 <strong>ملحوظة صدق مهمة:</strong> <code>setcookie()</code> هنا فعليًا اتنفّذت ورجعت <code>true</code> من غير خطأ — ده حقيقي. لكن <code>true</code> معناها بس "الـ Header اتضاف بنجاح للاستجابة"، مش "المتصفح خزّن الكوكي فعلًا" — ده محتاج متصفح حقيقي يستقبل الاستجابة دي. عشان كده PHP CLI (اللي بيشغل الأمثلة دي) معندوش مفهوم "متصفح"، فمش هنقدر نتأكد من التخزين الفعلي من غيره.</div>
    <div class="en">🇬🇧 <strong>Important honesty note:</strong> <code>setcookie()</code> genuinely ran here and returned <code>true</code> with no error — that's real. But <code>true</code> only means "the header was successfully queued onto the response", not "the browser actually stored the cookie" — that requires a real browser receiving this response. PHP CLI (which runs these examples) has no concept of a "browser", so we can't verify the actual storage without one.</div>
</div>

<h2 id="practice">💻 2) قراءة الكوكي في طلب لاحق / Reading a Cookie on a Later Request</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 في طلب حقيقي لاحق، المتصفح هيبعت الكوكي أوتوماتيك في Header اسمه <code>Cookie</code>، وPHP هتحطها جاهزة جوه <code>$_COOKIE['theme']</code>. عشان مفيش متصفح حقيقي هنا، هنحط مصفوفة يدوية بنفس الشكل بالظبط اللي كان المفروض يبعتها متصفح حقيقي — دي محاكاة واضحة، مش نتيجة حقيقية من شبكة.</div>
    <div class="en">🇬🇧 On a real later request, the browser automatically sends the cookie in a <code>Cookie</code> header, and PHP puts it ready inside <code>$_COOKIE['theme']</code>. Since there's no real browser here, we set a manual array in exactly the shape a real browser would have sent — this is a clearly labeled simulation, not a genuine network result.</div>
</div>

<pre><code>&lt;?php
// Simulated: what $_COOKIE would look like on a LATER request from a real
// browser, once it had actually received and stored the 'Set-Cookie' header.
$_COOKIE = ['theme' => 'dark'];
echo "Simulated \$_COOKIE['theme'] on the NEXT request: " . $_COOKIE['theme'] . PHP_EOL;</code></pre>
<h3>الناتج الفعلي لتنفيذ الأسطر دي (بعد المحاكاة اليدوية) / Actual output of these lines (after the manual simulation)</h3>
<div class="output-box">Simulated $_COOKIE['theme'] on the NEXT request: dark</div>

<div class="bi-block">
    <div class="ar">🇪🇬 <strong>السلوك المتوقع في متصفح حقيقي (مش قابل للتحقق عبر CLI):</strong> لو شغّلت السكريبت الأول فعليًا في متصفح، تسجّل الكوكي، وبعدين تفتح صفحة تانية في نفس الموقع، هتلاقي <code>$_COOKIE['theme']</code> فعلًا موجودة بقيمة <code>'dark'</code> من غير ما تحتاج تحطها يدويًا — لإن المتصفح بيبعتها أوتوماتيك.</div>
    <div class="en">🇬🇧 <strong>Expected behavior in a real browser (not verifiable via CLI):</strong> if you ran the first script for real in a browser, it would store the cookie, and opening another page on the same site would genuinely have <code>$_COOKIE['theme']</code> equal to <code>'dark'</code> with no manual assignment needed — because the browser sends it automatically.</div>
</div>

<h2>3) حذف كوكي / Deleting a Cookie</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 مفيش دالة اسمها <code>deletecookie()</code> — الطريقة القياسية إنك تنادي <code>setcookie()</code> تاني بنفس الاسم، بقيمة فاضية، وبتاريخ انتهاء في الماضي (<code>time() - 3600</code> مثلًا). المتصفح لما يستقبل ده، بيمسح الكوكي من عنده فورًا. وده بالظبط اللي عملناه فوق في نفس المثال الأول.</div>
    <div class="en">🇬🇧 There is no <code>deletecookie()</code> function — the standard approach is calling <code>setcookie()</code> again with the same name, an empty value, and an expiry time in the past (e.g. <code>time() - 3600</code>). When a browser receives this, it removes the cookie immediately. That's exactly what we already did above in the first example.</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="device">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">الكوكي فعليًا بتتخزن فين؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Where is a cookie actually stored?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="device"> على جهاز المستخدم (المتصفح)</label>
        <label><input type="radio" name="q1" value="server"> على السيرفر فقط</label>
        <label><input type="radio" name="q1" value="db"> في قاعدة بيانات دايمًا</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="before">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question"><code>setcookie()</code> لازم تتنادى إمتى؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">When must <code>setcookie()</code> be called?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="before"> قبل أي طباعة (Output) في الصفحة</label>
        <label><input type="radio" name="q2" value="after"> بعد أي طباعة، مش فارقة</label>
        <label><input type="radio" name="q2" value="never"> بس من جوه Session</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="past">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">إزاي تحذف كوكي اسمها <code>theme</code>؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">How do you delete a cookie named <code>theme</code>?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="unset"> unset($_COOKIE['theme']) بس، وده كفاية</label>
        <label><input type="radio" name="q3" value="past"> setcookie('theme', '', time() - 3600)</label>
        <label><input type="radio" name="q3" value="null"> setcookie('theme', null)</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="browser">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">ليه معتمدناش على CLI عشان نتأكد إن الكوكي "اتخزنت فعلًا"؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Why couldn't we rely on CLI to confirm the cookie was "actually stored"?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="browser"> لإن التخزين الفعلي بيحصل جوه متصفح حقيقي، وCLI معندوش متصفح</label>
        <label><input type="radio" name="q4" value="php"> لإن PHP CLI مش بيدعم setcookie() خالص</label>
        <label><input type="radio" name="q4" value="perm"> بسبب صلاحيات الملفات فقط</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ دالة تفضيلات مستخدم / A User Preferences Helper</h3>
    <div class="ar">🇪🇬 في <a href="../playground/index.php">محرر الكود</a>: اكتب دالة <code>getPreferredLanguage(array $cookies): string</code> بتاخد مصفوفة تحاكي <code>$_COOKIE</code>، وترجع <code>$cookies['lang']</code> لو موجودة، أو <code>'ar'</code> كقيمة افتراضية لو مش موجودة. جرّبها بمصفوفة فيها <code>lang</code> ومصفوفة فاضية.</div>
    <div class="en">🇬🇧 In the <a href="../playground/index.php">Playground</a>: write a <code>getPreferredLanguage(array $cookies): string</code> function that takes an array simulating <code>$_COOKIE</code> and returns <code>$cookies['lang']</code> if set, or <code>'ar'</code> as a default otherwise. Test it with an array that has <code>lang</code> and an empty one.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 دلوقتي شفت الـ Session (بيانات على السيرفر) والـ Cookie (بيانات على المتصفح) لوحدهم — الدرس الجاي بيحطهم جنب بعض ويقارن بينهم بشكل مباشر: امتى تستخدم كل واحدة، وليه الفرق ده مهم للأمان.</div>
    <div class="en">🇬🇧 You've now seen Sessions (server-side data) and Cookies (browser-side data) separately — the next lesson puts them side by side and compares them directly: when to use each, and why that difference matters for security.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>الكوكي بيانات صغيرة بتتخزن على جهاز المستخدم، وبترجع أوتوماتيك مع كل طلب لنفس الموقع.</li>
        <li><code>setcookie()</code> لازم تتنادى قبل أي طباعة، وبترجع <code>true</code> لما تنجح في إضافة الـ Header.</li>
        <li>حذف الكوكي = <code>setcookie()</code> تاني بقيمة فاضية وتاريخ انتهاء في الماضي.</li>
        <li>التخزين الفعلي والاسترجاع التلقائي بيحصلوا في متصفح حقيقي — CLI بيثبت إن الكود بيتنفذ صح، مش أكتر.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="sessions-basics.php">← الدرس السابق / Prev: Sessions</a>
    <a href="session-vs-cookie.php">الدرس الجاي / Next: Session vs Cookie →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
