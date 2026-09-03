<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'usability';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'قابلية الاستخدام واختبار المستخدم';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">المرحلة 7 / Stage 7</span>
<h1>قابلية الاستخدام واختبار المستخدم <span class="ltr">Usability &amp; User Testing</span></h1>
<p class="subtitle">التصميم ممكن يبان جميل جدًا في عينك كمصمم، وبرضو يفشل تمامًا مع المستخدم الحقيقي — الحل الوحيد إنك تختبره مع ناس حقيقية، مش إنك تسأل رأيهم بس، وإنك تصمم من الأول بطريقة بتمنع الأخطاء قبل ما تحصل.</p>

<div class="step-tracker">
    <a href="#read">📖 Read</a>
    <a href="#understand">🧠 Understand</a>
    <a href="#practice">💻 Practice</a>
    <a href="#quiz">🧠 Quiz</a>
    <a href="#challenge">🛠️ Challenge</a>
    <a href="#project">🚀 Project</a>
</div>

<h2 id="read">الهدف / Goal</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 تفهم إيه هو اختبار قابلية الاستخدام الحقيقي، تتعرف على "اختبار الخمس ثواني"، تفهم قانون جاكوب (Jakob's Law) وليه كسر توقعات المستخدم بيضر حتى لو كان "إبداع"، وتتعرف على مبدأين أساسيين من مبادئ نيلسون: منع الأخطاء وردود الفعل الفورية.</div>
    <div class="en">🇬🇧 Understand what real usability testing is, learn the "5-second test," understand Jakob's Law — why breaking user expectations hurts usability even when it is meant as "creativity" — and learn two core Nielsen heuristics: error prevention and immediate feedback.</div>
</div>

<h2 id="understand">اختبار قابلية الاستخدام / Usability Testing</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 الغلطة الشائعة إنك تسأل الناس "إيه رأيك في التصميم؟" — الناس بتجامل أو بتقول رأي مش دقيق. اختبار قابلية الاستخدام الحقيقي هو إنك تدي حد مهمة محددة ("حاول تشتري منتج بسعر أقل من 100 جنيه") وتراقبه بصمت وهو بيحاول ينفذها من غير ما تساعده. المشاكل اللي هيقابلها فعليًا (يدور، يتلخبط، يضغط غلط) أهم بكتير من أي رأي لفظي.</div>
    <div class="en">🇬🇧 A common mistake is asking people "what do you think of the design?" — people are polite or give inaccurate opinions. Real usability testing means giving someone a specific task ("try to buy a product under 100 EGP") and silently watching them attempt it without helping. The problems they actually hit (searching, getting confused, clicking the wrong thing) matter far more than any verbal opinion.</div>
</div>

<h2>اختبار الخمس ثواني / The 5-second Test</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 تقنية بسيطة: تورّي حد الصفحة لمدة 5 ثواني بس، وبعدين تسأله "الصفحة دي بتاعة إيه؟". لو مقدرش يجاوب بوضوح، ده معناه إن الرسالة الأساسية مش واضحة كفاية بصريًا — والمستخدم الحقيقي عادة عنده أقل من 5 ثواني قبل ما يقرر يفضل ولا يمشي.</div>
    <div class="en">🇬🇧 A simple technique: show someone a page for only 5 seconds, then ask "what is this page about?" If they cannot answer clearly, the core message is not visually clear enough — a real visitor usually has less than 5 seconds before deciding to stay or leave.</div>
</div>

<h3>قبل / Before — رسالة غير واضحة / Unclear message</h3>
<iframe class="render-box" style="height:150px" sandbox srcdoc='<html><body style="font-family:Tahoma,sans-serif;padding:16px;text-align:center">
<div style="font-size:15px;color:#333">مرحبًا بكم</div>
<div style="display:flex;justify-content:center;gap:8px;margin-top:10px">
<div style="width:60px;height:36px;background:#eee;border-radius:4px"></div>
<div style="width:60px;height:36px;background:#eee;border-radius:4px"></div>
<div style="width:60px;height:36px;background:#eee;border-radius:4px"></div>
</div>
<div style="margin-top:10px;font-size:13px;color:#999">اكتشف. تواصل. انطلق.</div>
</body></html>'></iframe>
<h3>بعد / After — واضح خلال ثواني / Clear within seconds</h3>
<iframe class="render-box" style="height:150px" sandbox srcdoc='<html><body style="font-family:Tahoma,sans-serif;padding:16px;text-align:center">
<div style="font-size:19px;font-weight:bold;color:#111">احجز موعدك عند الدكتور في دقيقتين</div>
<div style="margin-top:6px;color:#666;font-size:13px">أكتر من 500 عيادة متاحة في مدينتك الآن</div>
<button style="margin-top:12px;background:#457b9d;color:white;border:none;padding:9px 24px;border-radius:6px;font-weight:bold">احجز موعد</button>
</body></html>'></iframe>

<h2>قانون جاكوب / Jakob's Law</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 المستخدمين بيقضوا معظم وقتهم في مواقع وتطبيقات تانية غير بتاعتك، وده بيبني عندهم توقعات ثابتة: أيقونة عربة التسوق فوق يمين أو شمال، زرار "رجوع" في مكان معين، شعار الموقع بيودي للصفحة الرئيسية. لو غيّرت الأماكن دي "عشان تكون مميز"، المستخدم مش هيدور بفضول — هيتلخبط ويحس إن الموقع صعب، لأن مخه اتعوّد على نمط تاني.</div>
    <div class="en">🇬🇧 Users spend most of their time on other sites and apps, which builds fixed expectations: a cart icon top-right or top-left, a "back" button in a certain place, a logo that leads home. If you move these "to be unique," the user will not explore with curiosity — they will get confused and feel the site is hard, because their brain is trained on a different pattern.</div>
</div>

<h3>قبل / Before — كسر التوقع / Breaking expectation</h3>
<iframe class="render-box" style="height:120px" sandbox srcdoc='<html><body style="font-family:Tahoma,sans-serif;padding:0">
<div style="display:flex;justify-content:space-between;align-items:center;background:#222;padding:12px 16px">
<span style="color:#eee;font-size:16px">🛒</span>
<span style="color:white;font-weight:bold">متجري</span>
<span style="color:#eee;font-size:13px">الرئيسية | المنتجات</span>
</div>
<div style="padding:14px;color:#666;font-size:12px">أيقونة السلة اتحطت في مكان غير متوقع خالص لأي زائر جديد.</div>
</body></html>'></iframe>
<h3>بعد / After — متوافق مع التوقع / Matches expectation</h3>
<iframe class="render-box" style="height:120px" sandbox srcdoc='<html><body style="font-family:Tahoma,sans-serif;padding:0">
<div style="display:flex;justify-content:space-between;align-items:center;background:#222;padding:12px 16px">
<span style="color:white;font-weight:bold">متجري</span>
<span style="color:#eee;font-size:13px">الرئيسية | المنتجات</span>
<span style="color:#eee;font-size:16px">🛒</span>
</div>
<div style="padding:14px;color:#666;font-size:12px">أيقونة السلة في المكان المعتاد اللي كل المستخدمين متعودين عليه.</div>
</body></html>'></iframe>

<h2 id="practice">💻 منع الأخطاء والتغذية الراجعة / Error Prevention &amp; Feedback</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 اتنين من أهم مبادئ نيلسون العشرة في قابلية الاستخدام: <b>منع الأخطاء (Error Prevention)</b> — بدل ما تسيب المستخدم يعمل غلطة وتصلحها بعدين برسالة خطأ، صمم الواجهة من الأول بحيث الغلطة صعب تحصل أصلًا (زي رسالة تأكيد قبل حذف حاجة مهمة نهائيًا). و<b>ردود الفعل الفورية (Visibility of System Status)</b> — المستخدم لازم يعرف دايمًا إيه اللي بيحصل: هل الطلب اتبعت ولا لسه بيتحمّل؟ لو ضغط زرار ومفيش أي رد فعل بصري، هيفتكر إن التطبيق "متعلّق" ويضغط تاني، وده ممكن يسبب مشاكل زي إرسال نفس الطلب مرتين.</div>
    <div class="en">🇬🇧 Two of Nielsen's ten most important usability heuristics: <b>Error Prevention</b> — instead of letting the user make a mistake and fixing it afterward with an error message, design the interface from the start so the mistake is hard to make in the first place (like a confirmation message before permanently deleting something important). And <b>Visibility of System Status</b> — the user must always know what's happening: was the order sent, or is it still loading? If they click a button and see no visual reaction, they'll think the app "froze" and click again, which can cause problems like submitting the same order twice.</div>
</div>

<h3>قبل / Before — بدون تأكيد ولا حالة تحميل / No confirmation, no loading state</h3>
<iframe class="render-box" style="height:160px" sandbox srcdoc='<html><body style="font-family:Tahoma,sans-serif;padding:16px">
<div style="font-weight:bold;color:#222">إدارة الحساب</div>
<button style="margin-top:14px;background:#e63946;color:white;border:none;padding:9px 20px;border-radius:6px">حذف الحساب نهائيًا</button>
<div style="margin-top:10px;color:#999;font-size:12px">(الضغط على الزرار بيحذف الحساب فورًا من غير أي سؤال تأكيد)</div>
</body></html>'></iframe>
<h3>بعد / After — تأكيد قبل الحذف وحالة تحميل واضحة / Confirmation before deletion, clear loading state</h3>
<iframe class="render-box" style="height:190px" sandbox srcdoc='<html><body style="font-family:Tahoma,sans-serif;padding:16px">
<div style="font-weight:bold;color:#222">إدارة الحساب</div>
<button style="margin-top:14px;background:#e63946;color:white;border:none;padding:9px 20px;border-radius:6px">حذف الحساب نهائيًا</button>
<div style="margin-top:14px;border:1px solid #e0e0e0;border-radius:8px;padding:12px;background:#fff8f8">
<div style="font-size:13px;color:#333">⚠ هل أنت متأكد؟ هذا الإجراء لا يمكن التراجع عنه.</div>
<div style="margin-top:8px;display:flex;gap:8px">
<button style="background:#e63946;color:white;border:none;padding:6px 14px;border-radius:6px;font-size:12px">نعم، احذف</button>
<button style="background:#eee;color:#333;border:1px solid #ccc;padding:6px 14px;border-radius:6px;font-size:12px">إلغاء</button>
</div>
<div style="margin-top:10px;color:#888;font-size:12px">⏳ جاري الحذف...</div>
</div>
</body></html>'></iframe>
<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ: النسخة "بعد" بتمنع الغلطة (تأكيد قبل الحذف النهائي) وكمان بتوضح حالة النظام (⏳ جاري الحذف...) عشان المستخدم يعرف إن الطلب اتنفذ ومش محتاج يضغط تاني.</div>
    <div class="en">🇬🇧 Notice: the "after" version prevents the mistake (confirmation before permanent deletion) and also shows system status (⏳ deleting...) so the user knows the request is being processed and doesn't need to click again.</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="observe">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">إيه هو اختبار قابلية الاستخدام الحقيقي؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What is real usability testing?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="ask"> تسأل الناس "إيه رأيك في التصميم؟" / Asking people "what do you think of the design?"</label>
        <label><input type="radio" name="q1" value="observe"> تراقب حد بيحاول ينفذ مهمة محددة من غير مساعدة / Watching someone attempt a specific task without help</label>
        <label><input type="radio" name="q1" value="survey"> عمل استبيان أونلاين لعدد كبير من الناس / Running an online survey for a large number of people</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="confirm">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">إيه أفضل تطبيق لمبدأ "منع الأخطاء" قبل حذف حساب مستخدم نهائيًا؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What's the best application of "error prevention" before permanently deleting a user account?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="instant"> حذف الحساب فورًا بمجرد الضغط على الزرار / Delete instantly on button click</label>
        <label><input type="radio" name="q2" value="confirm"> إظهار رسالة تأكيد توضح إن الإجراء لا يمكن التراجع عنه / Show a confirmation message explaining the action can't be undone</label>
        <label><input type="radio" name="q2" value="hide"> إخفاء زرار الحذف تمامًا / Hide the delete button entirely</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="exercise-box">
    <h3>✍️ تمرين عملي / Hands-on Exercise</h3>
    <div class="ar">🇪🇬 اطلب من صديق ينظر لصفحة رئيسية لموقع أو تطبيق (اختره إنت) لمدة 5 ثواني بس، وبعدين اقفلها واسأله: "الصفحة دي بتاعة إيه بالظبط؟". قارن إجابته بالرسالة اللي الموقع فعلًا بيحاول يوصلها.</div>
    <div class="en">🇬🇧 Ask a friend to look at a homepage of a site or app (your choice) for only 5 seconds, then close it and ask: "what exactly is this page about?" Compare their answer to the message the site is actually trying to convey.</div>
</div>

<div class="challenge-box">
    <h3>🛠️ راجع شاشة "إرسال نموذج" / Audit a "Submit Form" Screen</h3>
    <div class="ar">🇪🇬 اختار أي فورم بتستخدمه (تسجيل حساب، نموذج تواصل، إلخ)، واملأه فعليًا مع مراقبة نفسك وأنت بتضغط زرار الإرسال. اسأل: هل ظهر أي رد فعل فوري (تحميل، رسالة نجاح)؟ لو فيه بيانات حساسة أو إجراء لا يمكن التراجع عنه، هل طلب تأكيد؟ اكتب تقرير قصير بالمشاكل اللي لاحظتها من زاوية "منع الأخطاء" و"ردود الفعل الفورية"، واقترح حل لكل مشكلة.</div>
    <div class="en">🇬🇧 Pick any form you use (sign-up, contact form, etc.), actually fill it out while watching yourself click submit. Ask: did any immediate feedback appear (loading, success message)? If there's sensitive data or an irreversible action, did it ask for confirmation? Write a short report on the problems you noticed from the "error prevention" and "immediate feedback" angle, and suggest a fix for each.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 قابلية الاستخدام هي المحك النهائي لأي مشروع بورتفوليو (درس "أدوات التصميم والعمل في المجال" الجاي) — "المشكلة" اللي هتكتبها في أي مشروع Redesign غالبًا هتكون مشكلة قابلية استخدام اكتشفتها بنفس الطريقة اللي اتعلمتها هنا: اختبار خمس ثواني، أو ملاحظة كسر لتوقع مألوف، أو غياب تأكيد قبل إجراء خطير.</div>
    <div class="en">🇬🇧 Usability is the final test for any portfolio project (the upcoming "Tools & Careers" lesson) — the "problem" you'll write in any redesign project will often be a usability problem you discovered the same way you learned here: a 5-second test, noticing a broken familiar expectation, or a missing confirmation before a risky action.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>اختبار قابلية الاستخدام = مراقبة مستخدم حقيقي وهو بينفذ مهمة، مش سؤاله عن رأيه.</li>
        <li>اختبار الخمس ثواني = هل الرسالة الأساسية واضحة بصريًا بسرعة؟</li>
        <li>قانون جاكوب = المستخدم بيتوقع نفس الأنماط اللي اتعود عليها في مواقع تانية.</li>
        <li>كسر التوقعات المألوفة "عشان التميز" بيضر قابلية الاستخدام غالبًا.</li>
        <li>منع الأخطاء = صمم بحيث يصعب حدوث الغلطة أصلًا، مش تصلحها بعد ما تحصل.</li>
        <li>ردود الفعل الفورية = المستخدم لازم يعرف دايمًا إيه اللي بيحصل في النظام.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="wireframing.php">← المرحلة السابقة</a>
    <a href="tools-careers.php">المرحلة الجاية / Next: Tools &amp; Careers →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
