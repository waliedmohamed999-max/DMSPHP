<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'claude';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'Claude — أدوات الذكاء الاصطناعي';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">أداة 1 من 4 / Tool 1 of 4</span>
<h1>Claude <span class="ltr">by Anthropic</span></h1>
<p class="subtitle">مساعد ذكاء اصطناعي بيتميز بالتفكير الخطوة بخطوة والتعامل مع أكواد وملفات كبيرة — من أقوى الأدوات لو بتشتغل على مشروع برمجي حقيقي مش بس بتسأل سؤال سريع.</p>

<div class="step-tracker">
    <a href="#read">📖 Read</a>
    <a href="#understand">🧠 Understand</a>
    <a href="#quiz">🧠 Quiz</a>
    <a href="#challenge">🛠️ Challenge</a>
    <a href="#project">🚀 Project</a>
</div>

<h2 id="read">الهدف / Goal</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 تفهم إمتى Claude يكون الاختيار الأفضل من بين الأدوات الأربعة، وتتعلم إزاي تستخدمه بفعالية في مراجعة الكود، فهم مشروع مش عارفه، والتفكير في تصميم حل قبل ما تكتبه.</div>
    <div class="en">🇬🇧 Understand when Claude is the best choice among the four tools, and learn how to use it effectively for code review, understanding an unfamiliar project, and thinking through a design before writing it.</div>
</div>

<h2 id="understand">إيه اللي يميّزه؟ / What Makes It Different</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>سياق طويل جدًا:</b> تقدر تلصق ملف كامل أو أكتر من ملف مرة واحدة وهو يفهمهم مع بعض، بدل ما تقطّع الكود على أجزاء صغيرة. <b>تفكير منطقي دقيق:</b> بيميل يشرح "ليه" قبل "إيه"، وده مفيد جدًا وانت بتتعلم. <b>أدوات فعلية (Agentic):</b> نسخة زي Claude Code بتقدر فعليًا تفتح ملفات وتشغّل أوامر وتعدّل كود بنفسها، مش بس ترد بنص.</div>
    <div class="en">🇬🇧 <b>Very long context:</b> you can paste a whole file or several files at once and it reasons about them together, instead of chopping code into tiny pieces. <b>Careful reasoning:</b> it tends to explain "why" before "what," which is great while you're learning. <b>Agentic tools:</b> a version like Claude Code can actually open files, run commands, and edit code itself — not just reply with text.</div>
</div>

<h2>إزاي تستخدمه بفعالية / Using It Effectively</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 لما يكون عندك خطأ، متبعتش بس رسالة الخطأ لوحدها — الصق الكود المحيط بيه كمان وقوله إيه اللي كنت متوقعه يحصل. لو عايز تفهم مشروع جديد، اطلب منه "افهم الملف ده وقولي الفكرة العامة قبل التفاصيل". ولو بتصمم حل لمشكلة، اسأله "إيه أكتر من طريقة أقدر أحل بيها ده، ومميزات وعيوب كل واحدة؟" قبل ما تطلب الكود مباشرة.</div>
    <div class="en">🇬🇧 When you hit an error, don't just send the error message alone — paste the surrounding code too and say what you expected to happen. To understand a new project, ask it to "understand this file and give me the big picture before the details." When designing a solution, ask "what are a few ways to solve this, and the trade-offs of each?" before asking for code directly.</div>
</div>

<h2>سيناريو عملي: راجع مشروع Online Store بتاعك مع Claude / Practical Scenario: Reviewing Your Online Store Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 خلّصت مشروع <b>Online Store</b> (آخر مشروع في مسار Full Stack) وعايز رأي خارجي قبل ما ترفعه على Portfolio. الفرق بين برومبت ضعيف وبرومبت قوي هنا مش شكلي — بيغيّر نوعية الملاحظات اللي هترجعلك تمامًا.</div>
    <div class="en">🇬🇧 You've finished the <b>Online Store</b> project (the final Full Stack project) and want a second opinion before adding it to your Portfolio. The difference between a weak and a strong prompt here isn't cosmetic — it completely changes the quality of feedback you get back.</div>
</div>

<div class="security-box">
    <h3>❌ برومبت ضعيف / Weak Prompt</h3>
    <div class="ar">🇪🇬 <span class="ltr">"راجع الكود ده"</span> + لصق ملف <code>checkout.php</code> كامل من غير أي سياق. المشكلة: Claude مش عارف انت قلقان على إيه بالظبط — أمان؟ تنظيم الكود؟ أداء؟ من غير توجيه، هيرجّعلك ملاحظات عامة سطحية، غالبًا هتركّز على تنسيق وأسماء متغيرات بدل مشاكل حقيقية.</div>
    <div class="en">🇬🇧 <span class="ltr">"Review this code"</span> + pasting the full <code>checkout.php</code> file with no context. The problem: Claude doesn't know what you actually care about — security? code organization? performance? Without direction, you get generic, shallow feedback, often focused on formatting and variable names instead of real issues.</div>
</div>

<div class="bi-block" style="border-inline-start-color:var(--accent-2);">
    <h3 style="margin-top:0;">✅ برومبت قوي / Strong Prompt</h3>
    <div class="ar">🇪🇬 <span class="ltr">"ده ملف checkout.php من مشروع Online Store بتاعي (PHP + MySQL). عايزك تراجعه بالتحديد على 3 حاجات: (1) هل السعر بيتحسب من قاعدة البيانات مش من طلب المستخدم؟ (2) هل كل استعلام SQL بيستخدم Prepared Statements؟ (3) هل فيه تحقق إن المستخدم عامل تسجيل دخول قبل ما يكمل الطلب؟ قسّم ردك لـ: أخطاء لازم تتصلح، وتحسينات اختيارية."</span> — لاحظ إن السؤال ده مبني بالظبط على نقط الأمان اللي اتعلمتها في مشروع Online Store نفسه.</div>
    <div class="en">🇬🇧 <span class="ltr">"This is checkout.php from my Online Store project (PHP + MySQL). Review it specifically for 3 things: (1) is the price computed from the database, not the user's request? (2) does every SQL query use Prepared Statements? (3) is there a check that the user is logged in before completing an order? Split your answer into: must-fix bugs, and optional improvements."</span> — notice this question is built directly on the security checkpoints you learned in the Online Store project itself.</div>
</div>

<div class="bi-block">
    <div class="ar">🇪🇬 ليه القوي أفضل بالظبط؟ لإنه بيحدد (أ) السياق (المشروع وتقنياته)، (ب) نقاط تركيز محددة مبنية على مخاطر حقيقية اتعلمتها، و(ج) شكل الرد المطلوب. النتيجة: مراجعة تشبه Code Review حقيقي في شركة، مش رأي عام.</div>
    <div class="en">🇬🇧 Why is the strong one better exactly? Because it specifies (a) context (the project and its stack), (b) specific focus points grounded in real risks you learned, and (c) the format wanted. Result: a review that resembles a real company Code Review, not a generic opinion.</div>
</div>

<div class="bi-block">
    <div class="ar">🇪🇬 <b>ميزة إضافية مفيدة هنا: Claude Projects.</b> بدل ما تلصق سياق مشروعك من الأول في كل محادثة جديدة، تقدر تعمل "Project" وترفعله ملفات مشروعك مرة واحدة (أو تكتب تعليمات ثابتة زي "ده مشروع Sila Full Stack، ركّز دايمًا على الأمان أولاً") — وكل محادثة جديدة جوه الـ Project دي بتفتكر السياق ده أوتوماتيك.</div>
    <div class="en">🇬🇧 <b>A useful related feature: Claude Projects.</b> Instead of re-pasting your project's context in every new conversation, you can create a "Project," upload your project's files to it once (or set standing instructions like "this is a Sila Full Stack project, always focus on security first") — and every new conversation inside that Project automatically remembers that context.</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="context">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">إيه اللي بيميّز Claude في التعامل مع مشروع كبير فيه أكتر من ملف؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What makes Claude stand out when working with a large multi-file project?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="context"> بيقدر ياخد سياق طويل (ملفات كتيرة مرة واحدة)</label>
        <label><input type="radio" name="q1" value="images"> بيرسم صور بس</label>
        <label><input type="radio" name="q1" value="offline"> بيشتغل من غير إنترنت</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="alternatives">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">إيه أفضل سؤال تسأله لـ Claude قبل ما تطلب كود جاهز لمشكلة تصميم؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What's the best question to ask Claude before requesting ready-made code for a design problem?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="write"> "اكتبلي الكود دلوقتي"</label>
        <label><input type="radio" name="q2" value="alternatives"> "إيه أكتر من طريقة أقدر أحل بيها ده، ومميزات وعيوب كل واحدة؟"</label>
        <label><input type="radio" name="q2" value="nothing"> مفيش داعي تسأل، خليه يكتب على طول</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="specific">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">ليه برومبت "راجع checkout.php وركّز على: هل السعر بيتحسب من قاعدة البيانات؟" أفضل من "راجع الكود ده"؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Why is "review checkout.php, focus on: is the price computed from the database?" better than "review this code"?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="specific"> لإنه بيحدد نقطة خطر حقيقية، فبيوجّه Claude لملاحظات عميقة بدل ملاحظات شكلية</label>
        <label><input type="radio" name="q3" value="shorter"> لإنه أقصر في عدد الكلمات بس</label>
        <label><input type="radio" name="q3" value="norule"> مفيش فرق حقيقي بين الاتنين</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="projects">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">عايز تفتح كذا محادثة عن نفس مشروع Online Store من غير ما تعيد شرح السياق كل مرة. إيه ميزة Claude المناسبة؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">You want multiple conversations about the same Online Store project without re-explaining context each time. Which Claude feature fits?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="projects"> Projects — رفع ملفات وتعليمات ثابتة يفتكرها كل محادثة جديدة جواها</label>
        <label><input type="radio" name="q4" value="newchat"> تفتح محادثة جديدة من الصفر كل مرة وتلصق كل حاجة تاني</label>
        <label><input type="radio" name="q4" value="nofeature"> مفيش حل لده، لازم تكرر السياق كل مرة</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ Code Review فعلي دلوقتي / Do a Real Code Review Right Now</h3>
    <div class="ar">🇪🇬 افتح محادثة جديدة مع Claude، والصق فيها آخر تمرين كتبته في أي مسار في سيلا (لو معندكش، خد أي كود من درس خلّصته). اطلب بالظبط: "راجع الكود ده زي Code Review حقيقي في شركة — قسّم ملاحظاتك لـ (أخطاء لازم تتصلح) و(تحسينات اختيارية)". لازم تخرج من التمرين ده بقائمة فعلية مكتوبة من الاتنين.</div>
    <div class="en">🇬🇧 Open a new conversation with Claude and paste your latest exercise from any Sila track (or any code from a finished lesson if you don't have one). Ask exactly: "Review this like a real company Code Review — split your notes into (must-fix bugs) and (optional improvements)." You must come out of this with an actual written list of both.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 مش لازم تستنى مشكلة كبيرة عشان تستخدم Claude — في درسك الجاي في مسارك الأساسي (PHP Back-End أو Python Web أو غيره)، قبل ما تنقل للدرس اللي بعده، افتح Claude والصق آخر تمرين عملته واسأله "فهمتني صح ولا فيه حاجة ناقصاني؟". خليها عادة ثابتة بعد كل درس، مش استخدام لمرة واحدة بس.</div>
    <div class="en">🇬🇧 You don't need to wait for a big problem to use Claude — in your next lesson on your main track (PHP Back-End, Python Web, or whichever), before moving to the lesson after it, open Claude and paste your latest exercise, asking "did I understand this correctly, or is something missing?" Make it a standing habit after every lesson, not a one-time use.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>الأقوى في: مراجعة كود، فهم مشاريع كبيرة، والتفكير خطوة بخطوة في تصميم الحل.</li>
        <li>الصق سياق كامل (كود + رسالة خطأ + توقعك) بدل جملة واحدة مقتضبة.</li>
        <li>اسأل عن "الطرق البديلة" قبل ما تطلب كود جاهز، عشان تتعلم مش بس تنسخ.</li>
        <li>برومبت قوي = سياق + نقاط تركيز محددة + شكل الرد المطلوب — مش مجرد "راجع الكود ده".</li>
        <li>Projects بتفتكر سياق مشروعك (ملفات وتعليمات ثابتة) في كل محادثة جديدة جواها.</li>
    </ul>
</div>

<div class="exercise-box">
    <h3>✍️ تمرين عملي / Hands-on Exercise</h3>
    <div class="ar">🇪🇬 خد أي درس من مسار PHP Back-End خلّصته، والصق كود التمرين بتاعك، واطلب من Claude "راجع الكود ده زي Code Review حقيقي — إيه اللي كنت أقدر أعمله أحسن؟" وشوف الفرق بين ده وبين مجرد سؤال "الكود ده صح ولا لأ؟".</div>
    <div class="en">🇬🇧 Take any lesson you finished in the PHP Back-End track, paste your exercise code, and ask Claude to "review this like a real Code Review — what could I have done better?" Notice the difference from just asking "is this code correct?"</div>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <span></span>
    <a href="chatgpt.php">الأداة الجاية / Next: ChatGPT →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
