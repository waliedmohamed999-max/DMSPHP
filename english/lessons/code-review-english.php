<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'code-review-english';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'الإنجليزية في مراجعة الكود والتواصل التقني';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">C1 · Advanced / Professional</span>
<h1>الإنجليزية في مراجعة الكود والتواصل التقني <span class="ltr">English for Code Reviews &amp; Technical Communication</span></h1>
<p class="subtitle">إزاي تكتب تعليق مراجعة كود واضح ومهذب، ورسالة Pull Request، ورد على Slack باحترافية.</p>

<div class="step-tracker">
    <a href="#read">📖 Read</a>
    <a href="#understand">🧠 Understand</a>
    <a href="#quiz">🧠 Quiz</a>
    <a href="#challenge">🛠️ Challenge</a>
    <a href="#project">🚀 Project</a>
</div>

<h2 id="read">الهدف / Goal</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 تتعلم إزاي تكتب تعليق مراجعة كود بيوضح المشكلة والحل من غير ما يبان قاسي أو شخصي، إزاي تكتب وصف Pull Request كامل بيسهّل على زمايلك يفهموا ويوافقوا على شغلك بسرعة، وإزاي تفضّل رسالة Slack مهذبة ومباشرة لما تكون محتاج مساعدة أو معطّل (blocked).</div>
    <div class="en">🇬🇧 Learn how to write a code review comment that explains the problem and the fix without sounding harsh or personal, how to write a full pull request description that helps your teammates understand and approve your work quickly, and how to write a polite, direct Slack message when you need help or are blocked.</div>
</div>

<h2 id="understand">تعليق مراجعة كود: قاسي مقابل بنّاء / Code Review Comments: Harsh vs. Constructive</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 تعليق المراجعة الكويس بيركّز على الكود مش على الشخص، بيشرح "ليه" مش بس "إيه"، وبيقترح حل بدل ما يكتفي بالنقد. لاحظ الفرق بين المثالين دول على نفس الملاحظة في مراجعة Pull Request.</div>
    <div class="en">🇬🇧 A good review comment focuses on the code, not the person, explains "why" and not just "what," and suggests a fix instead of just criticizing. Notice the difference between these two comments on the same observation in a pull request review.</div>
</div>
<h3>❌ تعليق قاسي وغامض / Harsh &amp; vague comment</h3>
<div class="output-box">This function is a mess. Why would you write it like this? Please fix it.
→ الترجمة: الدالة دي فوضى. ليه كتبتها كده أصلًا؟ من فضلك اصلحها.</div>
<h3>✅ تعليق بنّاء ومحدد / Constructive &amp; specific comment</h3>
<div class="output-box">This function currently fetches the user twice — once on line 12 and
again on line 27. Could we store the result in a variable after the
first call and reuse it? That should also shave a query off every
request to this endpoint.
→ الترجمة: الدالة دي حاليًا بتجيب بيانات المستخدم مرتين — مرة في سطر
12 ومرة تانية في سطر 27. ممكن نخزّن النتيجة في متغير بعد أول استدعاء
ونعيد استخدامها؟ ده كمان هيوفر استعلام واحد من كل طلب لنقطة النهاية دي.</div>
<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ: النسخة الاحترافية بتذكر أرقام سطور محددة (concrete)، بتسأل "Could we...?" بدل ما تأمر، وبتشرح الفايدة العملية من التغيير (توفير استعلام) بدل ما تحكم على جودة الكود بشكل عام.</div>
    <div class="en">🇬🇧 Notice: the professional version cites specific line numbers, asks "Could we...?" instead of issuing a command, and explains the practical benefit of the change (saving a query) instead of passing judgment on the code's overall quality.</div>
</div>

<h3>عبارات إضافية لمراجعة الكود / Extra Code Review Phrases</h3>
<div class="output-box">"Nit: consider renaming this to `userCount` for clarity."
→ ملاحظة بسيطة (مش مانعة للدمج): ممكن نغيّر الاسم لـ`userCount` عشان يبقى أوضح.

"This looks good overall — just one blocking concern below before I approve."
→ الشغل ده كويس بشكل عام — بس فيه ملاحظة واحدة مانعة للدمج قبل ما أوافق.

"Can you add a test case for the empty-input scenario?"
→ ممكن تضيف حالة اختبار (test case) لسيناريو الإدخال الفارغ؟</div>

<h2>وصف Pull Request احترافي / A Professional Pull Request Description</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 وصف الـPull Request الكويس بيسهّل على المراجع يفهم "إيه اللي اتغيّر وليه" من غير ما يفتح كل ملف. الهيكل الشائع: عنوان مختصر ومباشر، قسم "What" و"Why"، وقسم "How to test".</div>
    <div class="en">🇬🇧 A good pull request description makes it easy for a reviewer to understand "what changed and why" without opening every file. The common structure: a short, direct title, a "What" and "Why" section, and a "How to test" section.</div>
</div>
<div class="output-box">Title: Fix duplicate user-fetch query on the profile endpoint

## What
Removes a redundant database call in `UserController::show()` that was
fetching the same user record twice per request.

## Why
Profiling showed this endpoint issuing 2 identical queries on every
call, adding roughly 40ms of unnecessary latency under load. Caching
the result in a local variable after the first fetch removes the
duplicate entirely.

## How to test
1. Pull this branch and run `php artisan serve`.
2. Hit `GET /api/users/1` and check the query log — you should now see
   a single `SELECT` for the user record instead of two.
3. Existing tests in `UserControllerTest.php` still pass unchanged.</div>
<div class="output-box">الترجمة الكاملة / Full translation:

العنوان: إصلاح تكرار استعلام جلب المستخدم في نقطة نهاية الملف الشخصي

## إيه اللي اتغيّر (What)
بيشيل استدعاء قاعدة بيانات زائد في `UserController::show()` كان بيجيب
نفس سجل المستخدم مرتين في كل طلب.

## ليه (Why)
تحليل الأداء أظهر إن نقطة النهاية دي بتنفذ استعلامين متطابقين في كل
استدعاء، وده بيضيف تقريبًا 40 ملي ثانية تأخير غير ضروري تحت الضغط.
تخزين النتيجة في متغير محلي بعد أول جلب بيشيل التكرار تمامًا.

## إزاي تختبر (How to test)
1. اسحب الفرع ده وشغّل `php artisan serve`.
2. نفّذ طلب `GET /api/users/1` وشوف سجل الاستعلامات — المفروض دلوقتي
   تشوف استعلام `SELECT` واحد بس بدل اتنين.
3. الاختبارات الموجودة في `UserControllerTest.php` لسه شغالة من غير أي تغيير.</div>

<h2>رسالة Slack: مباشرة بس مهذبة / A Slack Message: Direct but Polite</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 لما تكون معطّل (blocked) في مهمة، المفروض تبلّغ فريقك بسرعة ووضوح — بس من غير ما تبان محبط أو تلقي اللوم. لاحظ الفرق بين الرسالتين دول لنفس الموقف.</div>
    <div class="en">🇬🇧 When you're blocked on a task, you should flag it to your team quickly and clearly — without sounding frustrated or placing blame. Notice the difference between these two messages for the same situation.</div>
</div>
<h3>❌ رسالة فظة جدًا / Overly blunt message</h3>
<div class="output-box">the staging API is still down, nobody fixed it, I can't do anything
until someone deals with this
→ الترجمة: الـ API بتاع الـ staging لسه واقع، محدش صلحه، مش هقدر أعمل
حاجة لحد ما حد يتعامل مع الموضوع ده</div>
<h3>✅ رسالة مهنية / Professional message</h3>
<div class="output-box">Hi team, quick heads-up — I'm blocked on the checkout task because the
staging API has been returning 500s since this morning. @sara, could
you take a look when you get a chance, or point me to whoever owns
that service? Happy to help debug in the meantime.
→ الترجمة: مرحبًا يا فريق، تنبيه سريع — أنا معطّل في مهمة الدفع
(checkout) لأن الـ API بتاع staging بيرجّع أخطاء 500 من الصبح. @sara،
ممكن تشوفي الموضوع لما تفضى، أو توجهيني لمين المسؤول عن الخدمة دي؟
مبسوط أساعد في تشخيص المشكلة لحد ما تتحل.</div>
<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ: النسخة الاحترافية بتحدد المشكلة بدقة (staging API + 500s + من إمتى)، بتوجّه الطلب لشخص محدد (@sara)، وبتقفل بعرض مساعدة إيجابي بدل ما تسيب رسالة إحباط بس.</div>
    <div class="en">🇬🇧 Notice: the professional version pins down the problem precisely (staging API + 500s + since when), directs the request to a specific person (@sara), and closes with a positive offer to help instead of leaving just a frustrated message.</div>
</div>

<h2>مفردات مراجعة الكود / Code Review Vocabulary</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 دوس على أي بطاقة عشان تشوف الترجمة والمثال.</div>
    <div class="en">🇬🇧 Tap any card to reveal the translation and example.</div>
</div>
<div class="vocab-grid">
    <div class="vocab-card">
        <div class="vocab-card-front">
            <div class="vocab-word">Nit-pick</div>
            <div class="vocab-pron">/ˈnɪt.pɪk/</div>
        </div>
        <div class="vocab-card-back">
            <div class="vocab-ar">ملاحظة بسيطة غير جوهرية</div>
            <div class="vocab-example"><div class="en">Just a nit-pick, but could we rename this variable to something more descriptive?</div><div class="ar">مجرد ملاحظة بسيطة، بس ممكن نغيّر اسم المتغير ده لحاجة أوضح؟</div></div>
        </div>
        <div class="vocab-card-hint">👆 دوس / Tap</div>
    </div>
    <div class="vocab-card">
        <div class="vocab-card-front">
            <div class="vocab-word">Blocker</div>
            <div class="vocab-pron">/ˈblɒk.ər/</div>
        </div>
        <div class="vocab-card-back">
            <div class="vocab-ar">عائق مانع للتقدم</div>
            <div class="vocab-example"><div class="en">The missing API key is a blocker — I can't deploy until it's added.</div><div class="ar">مفتاح الـ API الناقص عائق مانع — مش هقدر أنشر لحد ما يتضاف.</div></div>
        </div>
        <div class="vocab-card-hint">👆 دوس / Tap</div>
    </div>
    <div class="vocab-card">
        <div class="vocab-card-front">
            <div class="vocab-word">LGTM</div>
            <div class="vocab-pron">/ɛl dʒiː tiː ɛm/</div>
        </div>
        <div class="vocab-card-back">
            <div class="vocab-ar">اختصار "Looks Good To Me" — يعني موافقة على المراجعة</div>
            <div class="vocab-example"><div class="en">LGTM — just fix the typo in the comment and this is ready to merge.</div><div class="ar">موافق — بس اصلح الخطأ الإملائي في التعليق وده يبقى جاهز للدمج.</div></div>
        </div>
        <div class="vocab-card-hint">👆 دوس / Tap</div>
    </div>
    <div class="vocab-card">
        <div class="vocab-card-front">
            <div class="vocab-word">Merge conflict</div>
            <div class="vocab-pron">/mɜːrdʒ ˈkɒn.flɪkt/</div>
        </div>
        <div class="vocab-card-back">
            <div class="vocab-ar">تعارض دمج بين نسختين من الكود</div>
            <div class="vocab-example"><div class="en">You'll need to resolve a merge conflict in config.php before this can be merged.</div><div class="ar">هتحتاج تحل تعارض دمج في config.php قبل ما ده يتدمج.</div></div>
        </div>
        <div class="vocab-card-hint">👆 دوس / Tap</div>
    </div>
    <div class="vocab-card">
        <div class="vocab-card-front">
            <div class="vocab-word">Refactor</div>
            <div class="vocab-pron">/riːˈfæk.tər/</div>
        </div>
        <div class="vocab-card-back">
            <div class="vocab-ar">إعادة هيكلة الكود من غير تغيير سلوكه</div>
            <div class="vocab-example"><div class="en">This works fine, but it might be worth a refactor once we have time.</div><div class="ar">ده شغال كويس، بس ممكن يستاهل إعادة هيكلة لما يبقى فيه وقت.</div></div>
        </div>
        <div class="vocab-card-hint">👆 دوس / Tap</div>
    </div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="specific-why">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">إيه اللي بيميّز تعليق مراجعة الكود البنّاء عن القاسي؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What distinguishes a constructive review comment from a harsh one?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="general-criticism"> نقد عام على جودة الكود بشكل شامل</label>
        <label><input type="radio" name="q1" value="specific-why"> يذكر تفاصيل محددة، يشرح "ليه"، ويقترح حل</label>
        <label><input type="radio" name="q1" value="just-fix"> يكتفي بجملة "fix it" من غير أي تفاصيل</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="what-why-test">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">إيه الأقسام الشائعة في وصف Pull Request احترافي؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What are the common sections in a professional pull request description?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="what-why-test"> What, Why, وHow to test</label>
        <label><input type="radio" name="q2" value="title-only"> عنوان بس من غير أي تفاصيل</label>
        <label><input type="radio" name="q2" value="apology"> اعتذار طويل عن أي تأخير</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="lgtm">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">اختصار "LGTM" معناه إيه في مراجعة الكود؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What does "LGTM" mean in a code review?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="lgtm"> "Looks Good To Me" — موافقة على المراجعة</label>
        <label><input type="radio" name="q3" value="blocker-meaning"> رفض قاطع للـPull Request</label>
        <label><input type="radio" name="q3" value="merge-conflict-meaning"> تعارض دمج لازم يتحل الأول</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="specific-and-offer-help">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">لما تبلّغ فريقك إنك معطّل (blocked) على Slack، إيه أفضل أسلوب؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">When flagging a blocker to your team on Slack, what's the best approach?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="vent-only"> تكتب رسالة إحباط عامة من غير تفاصيل ولا اسم شخص محدد</label>
        <label><input type="radio" name="q4" value="specific-and-offer-help"> تحدد المشكلة بدقة، توجه الطلب لشخص محدد، وتعرض المساعدة</label>
        <label><input type="radio" name="q4" value="stay-silent"> تسكت وتستنى لحد ما حد يلاحظ المشكلة لوحده</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ اكتب مراجعة ووصف PR حقيقيين / Write a Real Review and PR Description</h3>
    <div class="ar">🇪🇬 اختار ملف كود كتبته انت فعلًا (حتى لو تمرين بسيط)، واكتب: (1) تعليق مراجعة بنّاء زي لو زميل بيراجعلك حاجة فيه، بيحدد سطر أو جزء معين ويقترح تحسين، و(2) وصف Pull Request كامل بنفس هيكل "What / Why / How to test" لأي تعديل عملته أو ممكن تعمله على الملف ده.</div>
    <div class="en">🇬🇧 Pick a code file you've actually written (even a simple exercise), and write: (1) a constructive review comment as if a colleague were reviewing something in it, citing a specific line or part and suggesting an improvement, and (2) a full pull request description using the same "What / Why / How to test" structure for a real or hypothetical change to that file.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 دلوقتي تقدر تكتب وتقرا التواصل التقني اليومي بثقة — مراجعات كود، أوصاف Pull Request، ورسائل Slack. المهارة الأخيرة الناقصة هي الاستماع: فهم اجتماع عمل حقيقي بمفردات متقدمة من غير ما تعتمد على النص المكتوب. الدرس الجاي، "تمرين استماع: اجتماع عمل"، هو آخر محطة في المسار العملي كله.</div>
    <div class="en">🇬🇧 You can now confidently write and read daily technical communication — code reviews, pull request descriptions, and Slack messages. The one missing skill is listening: understanding a real work meeting with advanced vocabulary without relying on a written transcript. The next lesson, "Listening Practice: A Work Meeting," is the final stop of the entire practical track.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>تعليق مراجعة الكود الكويس: يذكر تفاصيل محددة، يشرح "ليه"، ويقترح حل — مش نقد عام.</li>
        <li>وصف Pull Request الكامل: What (إيه اللي اتغيّر)، Why (ليه)، How to test (إزاي تختبر).</li>
        <li>رسالة Slack عن عائق (blocker): تحدد المشكلة بدقة، توجّه الطلب لشخص محدد، وتعرض المساعدة.</li>
        <li>مفردات جديدة: nit-pick, blocker, LGTM, merge conflict, refactor.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="meetings-negotiations.php">← المرحلة السابقة</a>
    <a href="c1-listening-1.php">المرحلة الجاية / Next: تمرين استماع - اجتماع عمل →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
