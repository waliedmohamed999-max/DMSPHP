<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'technical-english';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'الإنجليزية التقنية للمبرمجين';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">المرحلة 12 / Stage 12</span>
<h1>الإنجليزية التقنية للمبرمجين <span class="ltr">Technical English for Developers</span></h1>
<p class="subtitle">هنا بنقفل الدايرة اللي بدأنا بيها في أول درس: تقرا توثيق حقيقي بثقة، وتفهم مصطلحات هتقابلها كل يوم في أي مسار برمجي في سيلا.</p>

<div class="step-tracker">
    <a href="#read">📖 Read</a>
    <a href="#understand">🧠 Understand</a>
    <a href="#quiz">🧠 Quiz</a>
    <a href="#challenge">🛠️ Challenge</a>
    <a href="#project">🚀 Project</a>
</div>

<h2 id="read">الهدف / Goal</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 تطبّق مهارة القراءة اللي اتعلمتها على مقطع توثيق حقيقي (API Docs)، وتحفظ قاموس من 12 مصطلح برمجي إنجليزي هتقابلها في أي مسار برمجي بسيلا (زي PHP، JavaScript، أو قواعد البيانات).</div>
    <div class="en">🇬🇧 Apply the reading skills you've learned to a real documentation excerpt (API Docs), and learn a glossary of 12 programming terms you'll meet in any Sila programming track (PHP, JavaScript, or databases).</div>
</div>

<h2 id="understand">قراءة توثيق حقيقي: مثال API / Reading Real Documentation: An API Example</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 هنقرا سوا مقطع من توثيق API متخيّل (زي اللي هتلاقيه لمكتبة حقيقية)، ونطبّق استراتيجية "الكود الأول ثم الشرح" اللي اتعلمناها في درس القراءة.</div>
    <div class="en">🇬🇧 Let's read together an excerpt from a fictional API's documentation (similar to what you'd find for a real library), applying the "code first, then explanation" strategy from the reading lesson.</div>
</div>
<div class="output-box">## POST /api/users

Creates a new user account.

### Request Body

| Field    | Type   | Required | Description                          |
|----------|--------|----------|---------------------------------------|
| email    | string | yes      | The user's unique email address.      |
| password | string | yes      | Minimum 8 characters.                 |
| role     | string | no       | Defaults to "member" if omitted.      |

### Example

```
POST /api/users
{
  "email": "sara@example.com",
  "password": "s3cur3pass",
  "role": "admin"
}
```

### Response

Returns `201 Created` on success, or `409 Conflict` if the email is
already registered. This endpoint is idempotent for identical requests
sent within a 5-minute window.</div>
<div class="output-box">الترجمة / Translation:

POST /api/users → بينشئ حساب مستخدم جديد.

Request Body (متن الطلب):
  email    (نص، إجباري)  → إيميل المستخدم الفريد.
  password (نص، إجباري)  → 8 أحرف على الأقل.
  role     (نص، اختياري) → القيمة الافتراضية "member" لو ماحددتش حاجة.

Response (الرد):
  بيرجع 201 Created لو العملية نجحت، أو 409 Conflict لو الإيميل مسجل
  قبل كده. الـ endpoint ده idempotent — نفس النتيجة حتى لو كررت نفس
  الطلب خلال 5 دقايق.</div>
<div class="bi-block">
    <div class="ar">🇪🇬 دلوقتي هنمشي على النص كلمة كلمة زي متعلم إنجليزي: <b>"Creates"</b> = بينشئ (present simple، حقيقة عن السلوك). <b>"Required"</b> = إجباري — لو "yes" لازم تبعته، لو "no" اختياري. <b>"Defaults to"</b> = بياخد القيمة دي تلقائيًا لو محددتش حاجة. <b>"idempotent"</b> كلمة تقنية جديدة — من السياق: "نفس الطلب في نفس الـ5 دقايق" يبان إنها معناها "نفس النتيجة حتى لو كررت الطلب".</div>
    <div class="en">🇬🇧 Now let's walk through the text like an English learner: <b>"Creates"</b> = it creates (present simple, a fact about behavior). <b>"Required"</b> = mandatory — "yes" means you must send it, "no" means optional. <b>"Defaults to"</b> = automatically takes this value if you don't specify one. <b>"idempotent"</b> is a new technical word — from context ("same request within 5 minutes") it clearly means "same result even if you repeat the request."</div>
</div>

<h2>قاموس المصطلحات البرمجية / Programming Terms Glossary</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 دي كلمات هتقابلها كتير جدًا في أي مسار برمجي، توثيق، أو في كلام زملائك في الشغل — وأغلبها مش هتلاقيها في قاموس عادي بنفس المعنى التقني. دوس على أي بطاقة عشان تشوف التعريف والمثال.</div>
    <div class="en">🇬🇧 These are words you'll meet constantly in any programming track, documentation, or your colleagues' conversation — most of them won't appear in a regular dictionary with this technical meaning. Tap any card to see the definition and example.</div>
</div>
<div class="vocab-grid">
    <div class="vocab-card">
        <div class="vocab-card-front">
            <div class="vocab-word">Deprecated</div>
            <div class="vocab-pron">/ˌdɛp.rɪˈkeɪ.tɪd/</div>
        </div>
        <div class="vocab-card-back">
            <div class="vocab-ar">متروك/قديم: لسه شغال بس مش المفروض تستخدمه، هيتشال قريب.</div>
            <div class="vocab-example"><div class="en">This function is deprecated; use `fetchUser()` instead.</div><div class="ar">الدالة دي متروكة؛ استخدم `fetchUser()` بدالها.</div></div>
        </div>
        <div class="vocab-card-hint">👆 دوس / Tap</div>
    </div>
    <div class="vocab-card">
        <div class="vocab-card-front">
            <div class="vocab-word">Boilerplate</div>
            <div class="vocab-pron">/ˈbɔɪ.lər.pleɪt/</div>
        </div>
        <div class="vocab-card-back">
            <div class="vocab-ar">كود متكرر: كود ثابت لازم تكتبه في كل مشروع من غير تفكير كبير.</div>
            <div class="vocab-example"><div class="en">This template removes most of the boilerplate for new projects.</div><div class="ar">القالب ده بيشيل أغلب الكود المتكرر في المشاريع الجديدة.</div></div>
        </div>
        <div class="vocab-card-hint">👆 دوس / Tap</div>
    </div>
    <div class="vocab-card">
        <div class="vocab-card-front">
            <div class="vocab-word">Under the hood</div>
            <div class="vocab-pron">/ˈʌndər ðə hʊd/</div>
        </div>
        <div class="vocab-card-back">
            <div class="vocab-ar">تحت السطح: إزاي الحاجة شغالة فعليًا من جوه، مش بس شكلها من بره.</div>
            <div class="vocab-example"><div class="en">Under the hood, the framework compiles this into plain JavaScript.</div><div class="ar">تحت السطح، الفريمورك بيحوّل ده لجافاسكريبت عادي.</div></div>
        </div>
        <div class="vocab-card-hint">👆 دوس / Tap</div>
    </div>
    <div class="vocab-card">
        <div class="vocab-card-front">
            <div class="vocab-word">Edge case</div>
            <div class="vocab-pron">/ɛdʒ keɪs/</div>
        </div>
        <div class="vocab-card-back">
            <div class="vocab-ar">حالة نادرة: موقف غير متوقع/نادر ممكن يكسر الكود لو مش متعامل معاه.</div>
            <div class="vocab-example"><div class="en">We forgot to handle the edge case of an empty file upload.</div><div class="ar">نسينا نتعامل مع حالة رفع ملف فاضي.</div></div>
        </div>
        <div class="vocab-card-hint">👆 دوس / Tap</div>
    </div>
    <div class="vocab-card">
        <div class="vocab-card-front">
            <div class="vocab-word">Refactor</div>
            <div class="vocab-pron">/riːˈfæk.tər/</div>
        </div>
        <div class="vocab-card-back">
            <div class="vocab-ar">إعادة هيكلة: تعيد كتابة الكود بشكل أنضف من غير ما تغيّر سلوكه.</div>
            <div class="vocab-example"><div class="en">We refactored the checkout module to make it easier to test.</div><div class="ar">أعدنا هيكلة موديول الدفع عشان يبقى أسهل في الاختبار.</div></div>
        </div>
        <div class="vocab-card-hint">👆 دوس / Tap</div>
    </div>
    <div class="vocab-card">
        <div class="vocab-card-front">
            <div class="vocab-word">Legacy code</div>
            <div class="vocab-pron">/ˈlɛg.ə.si koʊd/</div>
        </div>
        <div class="vocab-card-back">
            <div class="vocab-ar">كود قديم: لسه شغال، غالبًا صعب التعامل معاه أو فهمه.</div>
            <div class="vocab-example"><div class="en">Maintaining legacy code takes more patience than writing new features.</div><div class="ar">صيانة الكود القديم محتاجة صبر أكتر من كتابة ميزات جديدة.</div></div>
        </div>
        <div class="vocab-card-hint">👆 دوس / Tap</div>
    </div>
    <div class="vocab-card">
        <div class="vocab-card-front">
            <div class="vocab-word">Verbose</div>
            <div class="vocab-pron">/vɜːrˈboʊs/</div>
        </div>
        <div class="vocab-card-back">
            <div class="vocab-ar">مطوّل: كود أو رسالة بتدي تفاصيل كتير أكتر من اللازم.</div>
            <div class="vocab-example"><div class="en">The error log is too verbose to read quickly.</div><div class="ar">سجل الأخطاء مطوّل جدًا وصعب تقراه بسرعة.</div></div>
        </div>
        <div class="vocab-card-hint">👆 دوس / Tap</div>
    </div>
    <div class="vocab-card">
        <div class="vocab-card-front">
            <div class="vocab-word">Syntax sugar</div>
            <div class="vocab-pron">/ˈsɪn.tæks ˈʃʊg.ər/</div>
        </div>
        <div class="vocab-card-back">
            <div class="vocab-ar">"سكر" في الصياغة: طريقة كتابة أسهل لنفس الحاجة، من غير تغيير في المنطق.</div>
            <div class="vocab-example"><div class="en">Arrow functions are just syntax sugar for regular functions here.</div><div class="ar">الـ arrow functions هنا مجرد صياغة أسهل لنفس الدوال العادية.</div></div>
        </div>
        <div class="vocab-card-hint">👆 دوس / Tap</div>
    </div>
    <div class="vocab-card">
        <div class="vocab-card-front">
            <div class="vocab-word">Race condition</div>
            <div class="vocab-pron">/reɪs kənˈdɪʃ.ən/</div>
        </div>
        <div class="vocab-card-back">
            <div class="vocab-ar">تسابق: خطأ بيحصل لما عمليتين بيحصلوا في نفس الوقت ويأثروا على بعض بشكل غير متوقع.</div>
            <div class="vocab-example"><div class="en">The bug only appears under a race condition when two users save at once.</div><div class="ar">الباگ بيظهر بس في حالة تسابق لما مستخدمين اتنين يحفظوا في نفس اللحظة.</div></div>
        </div>
        <div class="vocab-card-hint">👆 دوس / Tap</div>
    </div>
    <div class="vocab-card">
        <div class="vocab-card-front">
            <div class="vocab-word">Breaking change</div>
            <div class="vocab-pron">/ˈbreɪkɪŋ tʃeɪndʒ/</div>
        </div>
        <div class="vocab-card-back">
            <div class="vocab-ar">تغيير كاسر: تحديث بيكسر كود شغال قبل كده لو حد استخدم النسخة الجديدة.</div>
            <div class="vocab-example"><div class="en">Renaming this parameter is a breaking change for existing users.</div><div class="ar">تغيير اسم الـ parameter ده تغيير كاسر بالنسبة للمستخدمين الحاليين.</div></div>
        </div>
        <div class="vocab-card-hint">👆 دوس / Tap</div>
    </div>
    <div class="vocab-card">
        <div class="vocab-card-front">
            <div class="vocab-word">Hardcoded</div>
            <div class="vocab-pron">/ˈhɑːrdˌkoʊ.dɪd/</div>
        </div>
        <div class="vocab-card-back">
            <div class="vocab-ar">مثبّت يدويًا في الكود: قيمة مكتوبة ثابتة جوه الكود بدل ما تيجي من إعدادات قابلة للتغيير.</div>
            <div class="vocab-example"><div class="en">The API key was hardcoded, which is a security risk.</div><div class="ar">مفتاح الـ API كان مثبّت في الكود مباشرة، وده خطر أمني.</div></div>
        </div>
        <div class="vocab-card-hint">👆 دوس / Tap</div>
    </div>
    <div class="vocab-card">
        <div class="vocab-card-front">
            <div class="vocab-word">Callback</div>
            <div class="vocab-pron">/ˈkɔːl.bæk/</div>
        </div>
        <div class="vocab-card-back">
            <div class="vocab-ar">دالة استدعاء: دالة بتتبعت كـ parameter عشان تتنفذ بعد ما عملية معينة تخلص.</div>
            <div class="vocab-example"><div class="en">Pass a callback that runs once the file finishes uploading.</div><div class="ar">ابعت دالة استدعاء تتنفذ لما الملف يخلص رفع.</div></div>
        </div>
        <div class="vocab-card-hint">👆 دوس / Tap</div>
    </div>
</div>
<div class="bi-block">
    <div class="ar">🇪🇬 لو رجعت لدرس "بناء المفردات"، فاكر مبدأ "المجموعات الموضوعية"؟ دي بالظبط مجموعة موضوعية جاهزة — راجعها بنفس جدول Day 1 / Day 3 / Day 7 اللي اتعلمته هناك.</div>
    <div class="en">🇬🇧 Remember the "themed word sets" idea from the Vocabulary Building lesson? This is exactly a ready-made themed set — review it with the same Day 1 / Day 3 / Day 7 schedule you learned there.</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="same-result">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">من سياق مثال التوثيق، كلمة "idempotent" معناها إيه؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">From the documentation example's context, what does "idempotent" mean?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="same-result"> نفس النتيجة حتى لو كررت نفس الطلب</label>
        <label><input type="radio" name="q1" value="slow"> العملية بطيئة جدًا</label>
        <label><input type="radio" name="q1" value="error"> دايمًا بترجع خطأ</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="deprecated">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">أي مصطلح معناه "لسه شغال بس مش المفروض تستخدمه، هيتشال قريب"؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Which term means "still works but shouldn't be used, will be removed soon"?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="deprecated"> deprecated</label>
        <label><input type="radio" name="q2" value="verbose"> verbose</label>
        <label><input type="radio" name="q2" value="boilerplate"> boilerplate</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="race">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">"race condition" بيوصف إيه؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What does "race condition" describe?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="race"> خطأ من عمليتين بيحصلوا في نفس الوقت ويأثروا على بعض</label>
        <label><input type="radio" name="q3" value="fast"> كود سريع جدًا بلا مشاكل</label>
        <label><input type="radio" name="q3" value="ui"> تصميم واجهة المستخدم</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="optional">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">في جدول الـ API، لو "Required" = "no" لحقل معين، ده معناه إيه؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">If "Required" = "no" for a field, what does that mean?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="optional"> الحقل اختياري، ممكن متبعتوش</label>
        <label><input type="radio" name="q4" value="mandatory"> الحقل إجباري ولازم تبعته</label>
        <label><input type="radio" name="q4" value="deprecated2"> الحقل متروك ومش هيشتغل خالص</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ اقرا توثيق حقيقي من مساراتك في سيلا / Read Real Docs from Your Sila Tracks</h3>
    <div class="ar">🇪🇬 افتح توثيق رسمي حقيقي لأي تقنية بتتعلمها في سيلا (PHP، JavaScript، MySQL...)، ودوّر على 3 من الـ12 مصطلح اللي اتعلمتها النهاردة (أو مصطلحات جديدة)، واكتب جملة توضح استخدامهم في السياق ده.</div>
    <div class="en">🇬🇧 Open real official documentation for any technology you learn in Sila (PHP, JavaScript, MySQL...), find 3 of the ten terms you learned today (or new ones), and write a sentence explaining how they're used in that context.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 وصلت لبالظبط الهدف اللي بدأنا بيه في أول درس في المسار ده — تقدر دلوقتي تقرا توثيق حقيقي بثقة. المرحلة الأخيرة هتوريك إزاي تحوّل المهارة دي لفرص حقيقية: اختبارات عالمية زي IELTS/TOEFL، وفرص شغل عن بُعد بتتطلب إنجليزية قوية.</div>
    <div class="en">🇬🇧 You've reached exactly the goal we set out for in this track's first lesson — you can now read real documentation with confidence. The final stage shows you how to turn this skill into real opportunities: global tests like IELTS/TOEFL, and remote job opportunities that require strong English.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>استراتيجية قراءة التوثيق: الجدول/الكود الأول، بعدين الشرح النصي.</li>
        <li>12 مصطلح أساسي: deprecated, boilerplate, under the hood, edge case, refactor, legacy code, verbose, syntax sugar, race condition, breaking change, hardcoded, callback.</li>
        <li>عامل مصطلحات البرمجة زي "مجموعة موضوعية" وراجعها بنفس جدول المراجعة المتباعدة.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="conversation-business.php">← المرحلة السابقة</a>
    <a href="test-prep-careers.php">المرحلة الجاية / Next: التحضير للاختبارات والمسار المهني →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
