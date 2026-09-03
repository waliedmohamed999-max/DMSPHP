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
    <div class="ar">🇪🇬 تطبّق مهارة القراءة اللي اتعلمتها على مقطع توثيق حقيقي (API Docs)، وتحفظ قاموس من 10 مصطلحات برمجية إنجليزية هتقابلها في أي مسار برمجي بسيلا (زي PHP، JavaScript، أو قواعد البيانات).</div>
    <div class="en">🇬🇧 Apply the reading skills you've learned to a real documentation excerpt (API Docs), and learn a glossary of 10 programming terms you'll meet in any Sila programming track (PHP, JavaScript, or databases).</div>
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
<div class="bi-block">
    <div class="ar">🇪🇬 دلوقتي هنمشي على النص كلمة كلمة زي متعلم إنجليزي: <b>"Creates"</b> = بينشئ (present simple، حقيقة عن السلوك). <b>"Required"</b> = إجباري — لو "yes" لازم تبعته، لو "no" اختياري. <b>"Defaults to"</b> = بياخد القيمة دي تلقائيًا لو محددتش حاجة. <b>"idempotent"</b> كلمة تقنية جديدة — من السياق: "نفس الطلب في نفس الـ5 دقايق" يبان إنها معناها "نفس النتيجة حتى لو كررت الطلب".</div>
    <div class="en">🇬🇧 Now let's walk through the text like an English learner: <b>"Creates"</b> = it creates (present simple, a fact about behavior). <b>"Required"</b> = mandatory — "yes" means you must send it, "no" means optional. <b>"Defaults to"</b> = automatically takes this value if you don't specify one. <b>"idempotent"</b> is a new technical word — from context ("same request within 5 minutes") it clearly means "same result even if you repeat the request."</div>
</div>

<h2>قاموس المصطلحات البرمجية / Programming Terms Glossary</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 دي كلمات هتقابلها كتير جدًا في أي مسار برمجي، توثيق، أو في كلام زملائك في الشغل — وأغلبها مش هتلاقيها في قاموس عادي بنفس المعنى التقني.</div>
    <div class="en">🇬🇧 These are words you'll meet constantly in any programming track, documentation, or your colleagues' conversation — most of them won't appear in a regular dictionary with this technical meaning.</div>
</div>
<div class="output-box">1. deprecated       — متروك/قديم: لسه شغال بس مش المفروض تستخدمه، هيتشال قريب.
2. boilerplate      — كود متكرر: كود ثابت لازم تكتبه في كل مشروع من غير تفكير كبير.
3. under the hood   — تحت السطح: إزاي الحاجة شغالة فعليًا من جوه، مش بس شكلها من بره.
4. edge case        — حالة نادرة: موقف غير متوقع/نادر ممكن يكسر الكود لو مش متعامل معاه.
5. refactor         — إعادة هيكلة: تعيد كتابة الكود بشكل أنضف من غير ما تغيّر سلوكه.
6. legacy code      — كود قديم: كود قديم لسه شغال، غالبًا صعب التعامل معاه أو فهمه.
7. verbose          — مطوّل: كود أو رسالة بتدي تفاصيل كتير أكتر من اللازم.
8. syntax sugar     — "سكر" في الصياغة: طريقة كتابة أسهل لنفس الحاجة، من غير تغيير في المنطق.
9. race condition   — تسابق: خطأ بيحصل لما عمليتين بيحصلوا في نفس الوقت وبيأثروا على بعض بشكل غير متوقع.
10. breaking change — تغيير كاسر: تحديث بيكسر كود شغال قبل كده لو حد استخدم النسخة الجديدة.</div>
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
    <div class="ar">🇪🇬 افتح توثيق رسمي حقيقي لأي تقنية بتتعلمها في سيلا (PHP، JavaScript، MySQL...)، ودوّر على 3 من المصطلحات العشرة اللي اتعلمتها النهاردة (أو مصطلحات جديدة)، واكتب جملة توضح استخدامهم في السياق ده.</div>
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
        <li>10 مصطلحات أساسية: deprecated, boilerplate, under the hood, edge case, refactor, legacy code, verbose, syntax sugar, race condition, breaking change.</li>
        <li>عامل مصطلحات البرمجة زي "مجموعة موضوعية" وراجعها بنفس جدول المراجعة المتباعدة.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="business-english.php">← المرحلة السابقة</a>
    <a href="test-prep-careers.php">المرحلة الجاية / Next: التحضير للاختبارات والمسار المهني →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
