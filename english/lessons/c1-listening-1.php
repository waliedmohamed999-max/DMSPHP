<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'c1-listening-1';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'تمرين استماع: اجتماع عمل';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">C1 · Advanced / Professional</span>
<h1>تمرين استماع: اجتماع عمل <span class="ltr">Listening Practice: A Work Meeting</span></h1>
<p class="subtitle">اسمع مقطع اجتماع عمل بمفردات متقدمة وجاوب على أسئلة استنتاجية — آخر محطة في المسار العملي كله.</p>

<div class="step-tracker">
    <a href="#read">📖 Read</a>
    <a href="#listen">🎧 Listen</a>
    <a href="#quiz">🧠 Quiz</a>
    <a href="#challenge">🛠️ Challenge</a>
    <a href="#project">🚀 Project</a>
</div>

<h2 id="read">الهدف / Goal</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 تسمع مقطع من اجتماع متابعة مشروع حقيقي بين مديرة منتج ومطور، فيه مفردات شائعة جدًا في أي شركة تقنية عالمية (blocker, on track, circle back, scope creep)، وتجاوب على أسئلة فهم بعضها بيطلب منك تستنتج مش بس تفتكر كلام حرفي.</div>
    <div class="en">🇬🇧 Listen to an excerpt from a real project status meeting between a product manager and a developer, packed with vocabulary that's extremely common in any global tech company (blocker, on track, circle back, scope creep), and answer comprehension questions — some of which ask you to infer meaning, not just recall exact words.</div>
</div>

<h2>مفردات لازم تعرفها قبل ما تسمع / Vocabulary to Know Before You Listen</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 المقطع هيستخدم المصطلحات دي من غير أي شرح إضافي — بالظبط زي ما بيحصل في اجتماع شغل حقيقي. اقراها كويس قبل ما تدوس Listen.</div>
    <div class="en">🇬🇧 The clip uses these terms with no extra explanation — exactly like a real work meeting. Read them carefully before you press Listen.</div>
</div>
<div class="output-box">on track → ماشي حسب الخطة، مفيش تأخير
blocker → عائق بيمنعك تكمل شغلك لحد ما يتحل
circle back (to something) → ترجع لموضوع معين تاني بعدين
scope creep → توسّع تدريجي وغير معلن في نطاق المهمة عن المتفق عليه أصلًا</div>

<h2 id="listen">🎧 استمع / Listen</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 اسمع المقطع مرة أو مرتين وحاول تفهم الفكرة العامة الأول، وبعدين دوّر على التفاصيل. متفتحش النص المكتوب غير بعد ما تحاول تجاوب على الأسئلة.</div>
    <div class="en">🇬🇧 Listen once or twice and try to grasp the general idea first, then hunt for the details. Don't open the transcript until you've tried answering the questions.</div>
</div>

<div class="listening-exercise">
    <p style="margin-bottom:10px;color:var(--muted);font-size:0.9rem">🎧 اسمع مقطع الاجتماع، وحاول تجاوب على الأسئلة قبل ما تشوف النص المكتوب.</p>
    <div class="listening-controls">
        <button type="button" class="speak-btn" data-text="Maria: Okay, let's do a quick status check before we wrap up. Tom, where are we on the payment module? Tom: We're mostly on track. The core integration is done, but I hit a blocker yesterday — the sandbox API keeps timing out, so I couldn't finish testing refunds. Maria: Got it. Is that something you can resolve today, or should we circle back to it tomorrow? Tom: I'll ping the vendor's support team now, but I'd honestly rather circle back tomorrow once I hear from them. Maria: Fair enough. One more thing — marketing asked for two extra fields on the checkout form. I want to flag that as scope creep before we quietly absorb it into this sprint." data-rate="1">🔊 Listen</button>
        <button type="button" class="speak-btn" data-text="Maria: Okay, let's do a quick status check before we wrap up. Tom, where are we on the payment module? Tom: We're mostly on track. The core integration is done, but I hit a blocker yesterday — the sandbox API keeps timing out, so I couldn't finish testing refunds. Maria: Got it. Is that something you can resolve today, or should we circle back to it tomorrow? Tom: I'll ping the vendor's support team now, but I'd honestly rather circle back tomorrow once I hear from them. Maria: Fair enough. One more thing — marketing asked for two extra fields on the checkout form. I want to flag that as scope creep before we quietly absorb it into this sprint." data-rate="0.7">🐢 Slow</button>
        <button type="button" class="listening-transcript-toggle">📄 إظهار النص / Show Transcript</button>
    </div>
    <div class="listening-transcript" hidden>
        <div class="en">Maria: Okay, let's do a quick status check before we wrap up. Tom, where are we on the payment module?<br><br>Tom: We're mostly on track. The core integration is done, but I hit a blocker yesterday — the sandbox API keeps timing out, so I couldn't finish testing refunds.<br><br>Maria: Got it. Is that something you can resolve today, or should we circle back to it tomorrow?<br><br>Tom: I'll ping the vendor's support team now, but I'd honestly rather circle back tomorrow once I hear from them.<br><br>Maria: Fair enough. One more thing — marketing asked for two extra fields on the checkout form. I want to flag that as scope creep before we quietly absorb it into this sprint.</div>
        <div class="ar">ماريا: طيب، خلينا نعمل متابعة سريعة قبل ما نقفل الاجتماع. توم، إحنا فين في موديول الدفع؟<br><br>توم: إحنا في الأغلب ماشيين حسب الخطة. التكامل الأساسي خلص، بس واجهت عائق (blocker) إمبارح — الـ API بتاع بيئة الاختبار فضل يقطع الاتصال، فمقدرتش أخلص اختبار عمليات الاسترجاع.<br><br>ماريا: تمام، فاهمة. ده حاجة تقدر تحلها النهاردة، ولا نرجعلها بكرة؟<br><br>توم: هبعت رسالة لفريق دعم المورّد دلوقتي، بس بصراحة أفضل نرجع للموضوع بكرة لما أسمع ردهم.<br><br>ماريا: تمام معايا. حاجة كمان — التسويق طلب حقلين إضافيين في فورم الدفع. عايزة أنبّه إن ده "توسّع في النطاق" (scope creep) قبل ما نستوعبه في السبرنت ده بهدوء.</div>
    </div>
    <h3 id="quiz" style="margin-top:24px">🧠 اختبر فهمك / Test Your Understanding</h3>
    <div class="listening-questions">
        <div class="quiz-box" data-correct="sandbox-api">
            <h3>سؤال 1 / Question 1</h3>
            <p class="quiz-question">إيه اللي منع توم من إنهاء اختبار عمليات الاسترجاع (refunds)؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What stopped Tom from finishing refund testing?</span></p>
            <div class="quiz-options">
                <label><input type="radio" name="lq1" value="sandbox-api"> الـ sandbox API فضل يقطع الاتصال</label>
                <label><input type="radio" name="lq1" value="forgot"> نسي يكتب الاختبارات أصلًا</label>
                <label><input type="radio" name="lq1" value="marketing-changed"> التسويق غيّر المتطلبات فجأة</label>
            </div>
            <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
            <div class="quiz-feedback"></div>
        </div>

        <div class="quiz-box" data-correct="extra-fields">
            <h3>سؤال 2 / Question 2</h3>
            <p class="quiz-question">إيه اللي عايزة ماريا تنبّه عليه كـ"scope creep"؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What does Maria want to flag as "scope creep"?</span></p>
            <div class="quiz-options">
                <label><input type="radio" name="lq2" value="extra-fields"> حقلين إضافيين في فورم الدفع طلبهم التسويق</label>
                <label><input type="radio" name="lq2" value="vendor-delay"> تأخير فريق دعم المورّد في الرد</label>
                <label><input type="radio" name="lq2" value="api-bug"> خطأ برمجي جديد في موديول الدفع</label>
            </div>
            <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
            <div class="quiz-feedback"></div>
        </div>

        <div class="quiz-box" data-correct="waiting-on-vendor">
            <h3>سؤال 3 / Question 3 <span class="ltr" style="color:var(--muted);font-size:0.75em">(استنتاجي / Inference)</span></h3>
            <p class="quiz-question">ليه توم فضّل يرجع للموضوع بكرة بدل ما يحاول يحله النهاردة، مع إن المقطع مايقولش ده صراحةً؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Why does Tom prefer to circle back tomorrow instead of resolving it today, even though the clip doesn't say this directly?</span></p>
            <div class="quiz-options">
                <label><input type="radio" name="lq3" value="waiting-on-vendor"> لأن حل المشكلة معتمد على رد فريق دعم المورّد، مش على مجهوده لوحده</label>
                <label><input type="radio" name="lq3" value="not-important"> لأنه شايف إن المشكلة مش مهمة أصلًا</label>
                <label><input type="radio" name="lq3" value="maria-ordered"> لأن ماريا هي اللي طلبت منه كده مباشرة</label>
            </div>
            <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
            <div class="quiz-feedback"></div>
        </div>

        <div class="quiz-box" data-correct="surfaces-openly">
            <h3>سؤال 4 / Question 4 <span class="ltr" style="color:var(--muted);font-size:0.75em">(استنتاجي / Inference)</span></h3>
            <p class="quiz-question">من طريقة ماريا في إثارة موضوع حقول الدفع الإضافية، إيه اللي نقدر نستنتجه عن أسلوبها في إدارة نطاق المشروع؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">From how Maria raises the extra checkout fields, what can you infer about her approach to managing project scope?</span></p>
            <div class="quiz-options">
                <label><input type="radio" name="lq4" value="surfaces-openly"> بتفضّل تطرح أي توسّع في النطاق للنقاش علنًا بدل ما تخليه يتسرب من غير ملاحظة</label>
                <label><input type="radio" name="lq4" value="rejects-marketing"> بترفض أي طلب من التسويق بشكل تلقائي دايمًا</label>
                <label><input type="radio" name="lq4" value="not-a-concern"> مش شايفة إن توسّع النطاق مشكلة أصلًا في المشروع ده</label>
            </div>
            <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
            <div class="quiz-feedback"></div>
        </div>
    </div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ اكتب متابعة الاجتماع / Write the Meeting Follow-up</h3>
    <div class="ar">🇪🇬 تخيل إنك توم، واكتب رسالة Slack قصيرة لماريا بعد الاجتماع بتلخص فيها: (1) حالة الـblocker وإيه اللي هتعمله بخصوصه، و(2) رأيك في طلب حقول الدفع الإضافية. استخدم على الأقل مصطلحين من الأربعة اللي اتعلمتهم في الدرس ده (on track, blocker, circle back, scope creep).</div>
    <div class="en">🇬🇧 Imagine you're Tom, and write a short Slack follow-up to Maria after the meeting summarizing: (1) the status of the blocker and what you'll do about it, and (2) your take on the extra checkout fields request. Use at least two of the four terms you learned in this lesson (on track, blocker, circle back, scope creep).</div>
</div>

<h2 id="project">🚀 المشروع: خاتمة المسار / Project: Track Capstone</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 مبروك! 🎉 الدرس ده هو آخر محطة في مسار اللغة الإنجليزية بسيلا بالكامل — سواء المسار الأساسي (Core Path) من الأبجدية لحد المقابلات الشخصية والتحضير للاختبارات، أو المسار العملي (Practical Track) اللي عديت فيه على 19 موقف حياتي وتمرين استماع، من "الأرقام والوقت" البسيطة لحد اجتماع عمل متقدم بمفردات زي blocker وscope creep. دلوقتي معاك أدوات القراءة والكتابة والاستماع والمحادثة مجتمعة في مكان واحد. مشروعك الأخير: خد اجتماع أو مكالمة شغل حقيقية (حتى لو بالعربي في شغلك الحالي)، وتخيل نفس المحادثة بالإنجليزي — لاحظ كام مصطلح من اللي اتعلمتهم في المسارين هتستخدمه فعلًا. وبعدين طبّق كل ده يوميًا: اقرا التوثيق التقني بالإنجليزي مباشرة، اكتب مراجعات الكود ورسائل الـPull Request بالإنجليزي، وماتترددش تدخل اجتماع أو مقابلة شغل بالإنجليزي بثقة. وصلت لآخر الطريق — بس ده أول يوم في استخدامه فعليًا.</div>
    <div class="en">🇬🇧 Congratulations! 🎉 This lesson is the final stop of the entire Sila English Language track — both the Core Path, from the alphabet all the way to job interviews and test prep, and the Practical Track, where you worked through 19 real-life situations and listening exercises, from simple "Numbers & Time" all the way to an advanced work meeting full of terms like blocker and scope creep. You now have reading, writing, listening, and speaking tools working together in one place. Your final project: take a real work meeting or call (even one in Arabic from your current job), and imagine that same conversation in English — notice how many terms from both tracks you'd genuinely use. Then put it into practice daily: read technical documentation directly in English, write your code reviews and pull request descriptions in English, and walk into any English-language meeting or interview with confidence. You've reached the end of the road — but this is only day one of actually using it.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>مفردات اجتماعات متقدمة: on track, blocker, circle back, scope creep.</li>
        <li>فهم الاستماع الاستنتاجي معناه تفهم "ليه" الشخص قال كذا، مش بس "إيه" اللي قاله حرفيًا.</li>
        <li>هنا يكتمل مسار اللغة الإنجليزية بسيلا بالكامل — المسار الأساسي والمسار العملي معًا.</li>
        <li>الخطوة الجاية مش درس تاني — هي إنك تستخدم كل ده فعليًا في شغلك اليومي.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="code-review-english.php">← المرحلة السابقة</a>
    <a href="../index.php">لوحة الدروس / Dashboard</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
