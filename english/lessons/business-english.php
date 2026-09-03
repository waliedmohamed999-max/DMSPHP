<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'business-english';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'إنجليزي بيئة العمل';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">المرحلة 11 / Stage 11</span>
<h1>إنجليزي بيئة العمل <span class="ltr">Business English</span></h1>
<p class="subtitle">إيميل مهني كويس واجتماع تقدر تشارك فيه بثقة — دول أول حاجتين هتحتاجهم فعليًا في أي شغل عن بُعد أو شركة عالمية.</p>

<div class="step-tracker">
    <a href="#read">📖 Read</a>
    <a href="#understand">🧠 Understand</a>
    <a href="#quiz">🧠 Quiz</a>
    <a href="#challenge">🛠️ Challenge</a>
    <a href="#project">🚀 Project</a>
</div>

<h2 id="read">الهدف / Goal</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 تتعلم إزاي تكتب إيميل مهني كامل من الصفر (عنوان، تحية، متن، ختام)، وتحفظ 5 عبارات أساسية هتحتاجها في أي اجتماع شغل بالإنجليزي.</div>
    <div class="en">🇬🇧 Learn how to write a complete professional email from scratch (subject, greeting, body, sign-off), and pick up 5 essential phrases you'll need in any work meeting.</div>
</div>

<h2 id="understand">إيميل مهني كامل: مثال عملي / A Full Professional Email: Worked Example</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 الإيميل المهني له هيكل ثابت: عنوان واضح ومباشر (Subject)، تحية مناسبة (Greeting)، متن منظم في فقرات قصيرة (Body)، وختام مهذب (Sign-off). خليك دايمًا مباشر وواضح — الإيميلات المهنية مش المكان المناسب للإطالة.</div>
    <div class="en">🇬🇧 A professional email has a fixed structure: a clear, direct subject line, an appropriate greeting, a body organized into short paragraphs, and a polite sign-off. Always be direct and clear — professional emails are not the place for long-windedness.</div>
</div>
<div class="output-box">Subject: Request for Extended Deadline — Landing Page Project

Dear Ms. Johnson,

I hope this email finds you well.

I am writing to request a short extension for the landing page project,
currently due this Friday. I have completed the main layout and content
sections, but I need two more days to finish thorough testing across
different browsers to ensure everything works smoothly.

Would it be possible to move the deadline to next Monday? I want to make
sure I deliver high-quality, well-tested work.

Thank you for your understanding. Please let me know if you have any
questions.

Best regards,
Ahmed Hassan</div>
<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ: العنوان بيقول بالظبط عن إيه الإيميل من غير ما تفتحه (مش "Question" أو "Hello" بس)، "I hope this email finds you well" جملة افتتاحية مهذبة شائعة جدًا، والمتن بيشرح المشكلة والحل المقترح في فقرتين قصيرتين بس.</div>
    <div class="en">🇬🇧 Notice: the subject says exactly what the email is about without opening it (not just "Question" or "Hello"), "I hope this email finds you well" is a very common polite opener, and the body explains the problem and proposed solution in just two short paragraphs.</div>
</div>
<h3>❌ إيميل ضعيف / Weak email</h3>
<div class="output-box">Subject: Hi

hey i cant finish the project on friday i need more time can you give me
monday instead thanks</div>
<h3>✅ نفس الفكرة بشكل مهني / Same idea, professional</h3>
<div class="output-box">Subject: Request for Extended Deadline — Landing Page Project

Dear Ms. Johnson, I am writing to request a short extension... (زي المثال فوق)</div>

<h2>عبارات أساسية في الاجتماعات / Essential Meeting Phrases</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 في أي اجتماع شغل، مش لازم تتكلم كتير — لازم تعرف تقول اللي عايزه بوضوح ولباقة. دي 5 عبارات هتستخدمها كتير جدًا.</div>
    <div class="en">🇬🇧 In any work meeting, you don't need to talk a lot — you need to say what you mean clearly and politely. Here are 5 phrases you'll use constantly.</div>
</div>
<div class="output-box">1. "Could you clarify what you mean by...?"
   (لو مش فاهم نقطة معينة كويس)

2. "I'd like to add something here."
   (لو عايز تضيف رأي أو معلومة)

3. "Sorry to interrupt, but..."
   (لو محتاج تقاطع بأدب)

4. "Just to confirm, we agreed on...?"
   (لو عايز تتأكد من قرار اتاخد)

5. "I'll follow up on that by email."
   (لو حاجة محتاجة متابعة بعد الاجتماع)</div>
<div class="bi-block">
    <div class="ar">🇪🇬 استخدام عبارات زي "Could you clarify" بدل "What?" بس، بيدي انطباع احترافي فورًا — حتى لو مستواك في الإنجليزي لسه متوسط.</div>
    <div class="en">🇬🇧 Using phrases like "Could you clarify" instead of just "What?" gives an immediately professional impression — even if your English level is still intermediate.</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="clear-subject">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">إيه المفروض يكون عليه عنوان الإيميل المهني (Subject)؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What should a professional email subject be?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="hi"> "Hi" بس من غير أي تفاصيل</label>
        <label><input type="radio" name="q1" value="clear-subject"> واضح ومباشر بيقول موضوع الإيميل</label>
        <label><input type="radio" name="q1" value="empty"> يترك فاضي، مش مهم</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="clarify">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">لو مش فاهم نقطة في الاجتماع، إيه العبارة الأنسب؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">If you don't understand a point in the meeting, which phrase fits?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="what"> "What?"</label>
        <label><input type="radio" name="q2" value="clarify"> "Could you clarify what you mean by...?"</label>
        <label><input type="radio" name="q2" value="silent"> تسكت وماتسألش خالص</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="best-regards">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">أي ختام إيميل مهني مناسب؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Which is an appropriate professional email sign-off?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="bye"> "bye bye"</label>
        <label><input type="radio" name="q3" value="best-regards"> "Best regards,"</label>
        <label><input type="radio" name="q3" value="nothing"> من غير أي ختام أصلًا</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="add">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">عبارة "I'd like to add something here" بتستخدم إمتى؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">When do you use "I'd like to add something here"?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="add"> لما عايز تضيف رأي أو معلومة في الاجتماع</label>
        <label><input type="radio" name="q4" value="leave"> لما عايز تسيب الاجتماع فورًا</label>
        <label><input type="radio" name="q4" value="disagree-only"> بس لما عايز ترفض كل حاجة اتقالت</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ اكتب إيميل حقيقي / Write a Real Email</h3>
    <div class="ar">🇪🇬 اكتب إيميل مهني كامل (عنوان، تحية، متن من فقرتين، ختام) تطلب فيه من "مدير مشروع تخيلي" مراجعة كود كتبته. استخدم نفس هيكل المثال في الدرس. راجع: هل العنوان واضح؟ هل استخدمت جملة افتتاحية مهذبة؟</div>
    <div class="en">🇬🇧 Write a complete professional email (subject, greeting, two-paragraph body, sign-off) asking an imaginary project manager to review code you wrote. Use the same structure as the lesson's example. Review: is the subject clear? Did you use a polite opener?</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 دلوقتي معاك إنجليزية بيئة العمل الأساسية. المرحلة الأخيرة قبل الاحتراف الكامل هتاخدك لأعمق مستوى: الإنجليزية التقنية للمبرمجين — قراءة توثيق حقيقي ومصطلحات برمجة هتقابلها كل يوم في شغلك.</div>
    <div class="en">🇬🇧 You now have essential workplace English. The final stage before full mastery takes you to the deepest level: Technical English for Developers — reading real documentation and programming terms you'll meet every day at work.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>الإيميل المهني: عنوان واضح → تحية → متن قصير منظم → ختام مهذب.</li>
        <li>"I hope this email finds you well" جملة افتتاحية شائعة ومهذبة.</li>
        <li>5 عبارات اجتماعات أساسية: clarify, add, interrupt politely, confirm, follow up.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="speaking-pronunciation.php">← المرحلة السابقة</a>
    <a href="technical-english.php">المرحلة الجاية / Next: الإنجليزية التقنية →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
