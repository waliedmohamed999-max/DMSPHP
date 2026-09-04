<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'session-vs-cookie';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'الفورمات، الجلسات، والكوكيز — Session مقابل Cookie';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">Stage 5 · Forms, Sessions & Cookies</span>
<h1>Session مقابل Cookie: امتى تستخدم كل واحدة <span class="ltr">Session vs Cookie: When to Use Each</span></h1>
<p class="subtitle">مقارنة عملية: فين تتخزن البيانات، الأمان، والاستخدام النموذجي لكل واحدة. <span class="ltr">A practical comparison: where data lives, security, and the typical use case for each.</span></p>

<div class="step-tracker">
    <a href="#read">📖 Read</a>
    <a href="#understand">🧠 Understand</a>
    <a href="#quiz">🧠 Quiz</a>
    <a href="#challenge">🛠️ Challenge</a>
    <a href="#project">🚀 Project</a>
</div>

<h2 id="read">📖 الهدف / Goal</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 الدرسين اللي فاتوا وريوك إزاي تستخدم Session وCookie لوحدهم. الدرس ده مختلف — مفيش كود جديد بينفذ، الهدف إنك تبني في دماغك قاعدة واضحة تقدر ترجع لها في أي مشروع: "البيانات دي حساسة/كبيرة؟ Session. البيانات دي بسيطة وعايزها تفضل موجودة حتى لو مفيش Session أصلًا؟ Cookie."</div>
    <div class="en">🇬🇧 The previous two lessons showed you how to use a Session and a Cookie in isolation. This lesson is different — no new code executes here; the goal is building a clear mental rule you can return to on any project: "Is this data sensitive or large? Use a Session. Is it simple and needs to persist even without a Session? Use a Cookie."</div>
</div>

<h2 id="understand">🧠 1) فين البيانات فعليًا؟ / Where Does the Data Actually Live?</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 الفرق الجوهري بين الاتنين مش في الكود اللي بتكتبه، هو في مكان التخزين. الـ <b>Session</b> بتتخزن على <b>السيرفر</b> — المتصفح بيشيل بس معرّف صغير (Session ID) جوه كوكي. الـ <b>Cookie</b> بتتخزن بالكامل جوه <b>المتصفح</b> نفسه، والسيرفر بس بيطلب من المتصفح يخزّنها ويرجّعها.</div>
    <div class="en">🇬🇧 The fundamental difference between the two isn't in the code you write, it's in where the storage lives. A <b>Session</b> is stored on the <b>server</b> — the browser only carries a small identifier (the Session ID) inside a cookie. A <b>Cookie</b> is stored entirely inside the <b>browser</b> itself, and the server just asks the browser to store and return it.</div>
</div>

<h2>2) الأمان: مرجع مقابل بيانات فعلية / Security: a Reference vs Real Data</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 ده أهم فرق أمني: الـ Session ID <b>مجرد مرجع (Reference)</b> — لوحده مفيدش حاجة للمستخدم، والبيانات الحقيقية (زي "أنت Admin؟") محفوظة بعيد عنه على السيرفر ومحدش يقدر يعدّل فيها من المتصفح. الكوكي على العكس ممكن تحمل بيانات حقيقية، وأي مستخدم يقدر <b>يشوفها ويعدّلها</b> بسهولة من إعدادات المتصفح أو أدوات المطوّر — عشان كده متخزنش حاجة حساسة (زي دور المستخدم أو صلاحياته) جوه كوكي عادية من غير توقيع أو تشفير.</div>
    <div class="en">🇬🇧 This is the most important security difference: a Session ID is <b>just a reference</b> — useless on its own, while the real data (like "are you an Admin?") is stored away from it on the server, where the user can't edit it from the browser. A cookie, by contrast, can carry real data, and any user can <b>see and edit it</b> easily from browser settings or dev tools — so never store anything sensitive (like a user's role or permissions) in a plain cookie without signing or encryption.</div>
</div>

<h2>3) الاستخدام النموذجي / Typical Use Cases</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 حالة تسجيل الدخول ("هل المستخدم ده مسجّل دخول، ومين هو؟") دايمًا في Session — بيانات حساسة، والمستخدم منعرفوش يعدّلها. أما "المستخدم بيفضّل الوضع الداكن" أو "آخر لغة اختارها" فمثالية لـ Cookie — بيانات بسيطة، مش حساسة، ومفيد تفضل موجودة حتى بعد ما الجلسة تنتهي أو المستخدم يسجّل خروج.</div>
    <div class="en">🇬🇧 Login state ("is this user logged in, and who are they?") always belongs in a Session — sensitive data the user must not be able to edit. Meanwhile "the user prefers dark mode" or "their last chosen language" is a perfect fit for a Cookie — simple, non-sensitive data that's useful to keep even after the session ends or the user logs out.</div>
</div>

<h3>جدول مقارنة / Comparison Table</h3>
<div style="overflow-x:auto">
<table class="sql-result-table">
    <thead>
        <tr>
            <th>الخاصية / Aspect</th>
            <th>Session</th>
            <th>Cookie</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>مكان التخزين / Where stored</td>
            <td>السيرفر (المتصفح شايل ID بس) / Server (browser holds only an ID)</td>
            <td>المتصفح نفسه / The browser itself</td>
        </tr>
        <tr>
            <td>ظهور البيانات للمستخدم / Visible to the user</td>
            <td>لا — البيانات الحقيقية مخفية على السيرفر / No — real data hidden on the server</td>
            <td>نعم — قابلة للقراءة والتعديل من المتصفح / Yes — readable and editable in the browser</td>
        </tr>
        <tr>
            <td>مناسب لبيانات حساسة؟ / Fit for sensitive data</td>
            <td>نعم / Yes</td>
            <td>لا، إلا بتوقيع/تشفير / No, unless signed/encrypted</td>
        </tr>
        <tr>
            <td>الحجم المعتاد / Typical size</td>
            <td>يقدر يحمل أي حجم بيانات معقول / Can hold reasonably large data</td>
            <td>صغير جدًا (~4KB تقريبًا) / Very small (~4KB)</td>
        </tr>
        <tr>
            <td>الاستمرارية / Persistence</td>
            <td>بتنتهي بانتهاء الجلسة أو timeout السيرفر / Ends with the session or server timeout</td>
            <td>ممكن تفضل شهور/سنين حسب expire / Can last months/years based on expiry</td>
        </tr>
        <tr>
            <td>مثال استخدام / Example use</td>
            <td>حالة تسجيل الدخول / Login state</td>
            <td>تفضيل الوضع الداكن / Theme preference</td>
        </tr>
    </tbody>
</table>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="session">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">فين الأفضل تخزّن "هل المستخدم ده Admin؟"؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Where is the best place to store "is this user an Admin?"</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="session"> Session — بيانات حساسة محتاجة تفضل بعيدة عن تعديل المستخدم</label>
        <label><input type="radio" name="q1" value="cookie"> Cookie — أسهل وأسرع</label>
        <label><input type="radio" name="q1" value="url"> في الـ URL</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="edit">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">الخطر الأمني الأساسي في تخزين دور المستخدم (role) جوه كوكي عادية إيه؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What's the main security risk of storing a user's role in a plain cookie?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="edit"> المستخدم يقدر يعدّلها بنفسه من المتصفح ويحاول يبقى Admin</label>
        <label><input type="radio" name="q2" value="slow"> بتبطّئ الموقع</label>
        <label><input type="radio" name="q2" value="none"> مفيش خطر خالص</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="reference">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">الكوكي اللي بتحمل Session ID فعليًا بتحمل إيه؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What does the cookie carrying a Session ID actually hold?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="reference"> مجرد مرجع (Reference) بيشاور على بيانات مخزّنة على السيرفر</label>
        <label><input type="radio" name="q3" value="fulldata"> نسخة كاملة من بيانات المستخدم</label>
        <label><input type="radio" name="q3" value="password"> كلمة مرور المستخدم مشفّرة</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="cookie">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">عايز "المستخدم يفضّل يشوف الأسعار بالجنيه" تفضل متذكّرة لمدة سنة حتى لو رجع بعد أسابيع، أنهي الأنسب؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">You want "the user prefers prices in EGP" remembered for a year even if they return after weeks — which fits best?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="session"> Session</label>
        <label><input type="radio" name="q4" value="cookie"> Cookie، لإنها ممكن تفضل موجودة لفترة طويلة جدًا حتى لو مفيش Session نشطة</label>
        <label><input type="radio" name="q4" value="none"> ولا واحدة فيهم مناسبة</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ صنّف السيناريوهات / Classify the Scenarios</h3>
    <div class="ar">🇪🇬 من غير ما تكتب كود، اكتب على ورقة (أو تعليق في الـ Playground) قرارك لكل سيناريو ولية: (1) سلة تسوق مؤقتة أثناء التصفح، (2) "تذكرني" في صفحة تسجيل الدخول لمدة 30 يوم، (3) عدد محاولات تسجيل الدخول الفاشلة، (4) لغة الموقع المفضّلة. لكل واحدة قرر: Session ولا Cookie، ولية.</div>
    <div class="en">🇬🇧 Without writing code, jot down (or comment it in the Playground) your decision for each scenario and why: (1) a temporary shopping cart while browsing, (2) "remember me" on a login page for 30 days, (3) counting failed login attempts, (4) the site's preferred language. For each, decide: Session or Cookie, and why.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 دلوقتي عندك أساس Sessions وCookies قوي — كل الفهم ده هيتستخدم بشكل مباشر لما نوصل لمرحلة الـ Authentication الكاملة، حيث الـ Session بتحفظ هوية المستخدم بعد تسجيل الدخول. لكن الأول، هنكمل مرحلة جديدة كاملة عن التعامل مع الملفات وJSON وAPIs خارجية.</div>
    <div class="en">🇬🇧 You now have a solid foundation in Sessions and Cookies — this understanding will be used directly once we reach full Authentication, where the Session stores a user's identity after login. But first, we move into a whole new stage on working with files, JSON, and external APIs.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>Session = بيانات على السيرفر، والمتصفح شايل بس Reference (ID) — مناسبة لبيانات حساسة زي حالة تسجيل الدخول.</li>
        <li>Cookie = بيانات كاملة على المتصفح، قابلة للقراءة والتعديل من المستخدم — مناسبة لتفضيلات بسيطة زي الثيم.</li>
        <li>محدش يتخزن دور أو صلاحية مستخدم جوه كوكي عادية من غير توقيع/تشفير.</li>
        <li>القاعدة السريعة: بيانات حساسة أو كبيرة → Session. تفضيل بسيط محتاج يعيش فترة طويلة → Cookie.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="cookies-basics.php">← الدرس السابق / Prev: Cookies</a>
    <a href="file-handling-uploads.php">الدرس الجاي / Next: File Handling &amp; Uploads →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
