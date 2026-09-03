<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'chatgpt';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'ChatGPT — أدوات الذكاء الاصطناعي';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">أداة 2 من 4 / Tool 2 of 4</span>
<h1>ChatGPT <span class="ltr">by OpenAI</span></h1>
<p class="subtitle">الأداة الأشهر والأوسع انتشارًا، وأكبر مجتمع استخدام — مثالية كرفيق تعلّم عام: شرح مفاهيم، توليد أفكار، وبناء خطة مذاكرة.</p>

<div class="step-tracker">
    <a href="#read">📖 Read</a>
    <a href="#understand">🧠 Understand</a>
    <a href="#quiz">🧠 Quiz</a>
    <a href="#challenge">🛠️ Challenge</a>
    <a href="#project">🚀 Project</a>
</div>

<h2 id="read">الهدف / Goal</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 تفهم فين ChatGPT بيبقى الاختيار الأنسب — خصوصًا في التعلم العام وتنظيم أفكارك — وتتعلم تستخدم مزاياه زي الـ Custom GPTs وتحليل البيانات بفعالية.</div>
    <div class="en">🇬🇧 Understand where ChatGPT fits best — especially general learning and organizing your thinking — and learn to use features like Custom GPTs and data analysis effectively.</div>
</div>

<h2 id="understand">إيه اللي يميّزه؟ / What Makes It Different</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>أكبر مجتمع ومصادر:</b> لو واجهت مشكلة استخدام، غالبًا هتلاقي حد شرحها قبل كده. <b>Custom GPTs:</b> نسخ مخصصة لمهام معينة (زي مساعد مراجعة سيرة ذاتية، أو مدرّب لغة) تقدر تستخدمها أو تعمل واحدة بنفسك. <b>تحليل بيانات وملفات (Code Interpreter):</b> بيقدر يشغّل كود Python فعليًا جواه عشان يحلل ملف Excel أو CSV ويطلعلك رسم بياني.</div>
    <div class="en">🇬🇧 <b>Largest community and resources:</b> if you hit a usage question, someone has likely already explained it. <b>Custom GPTs:</b> purpose-built versions for specific tasks (a résumé reviewer, a language coach) that you can use or build yourself. <b>Data analysis (Code Interpreter):</b> it can actually run Python internally to analyze an Excel/CSV file and produce a chart.</div>
</div>

<h2>إزاي تستخدمه بفعالية / Using It Effectively</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 لما تتعلم مفهوم جديد (زي OOP أو Recursion)، متكتفيش بسؤال "إيه هو X" — اطلب "اشرحلي X بمثال بسيط جدًا، وبعدين مثال أعقد شوية". لو تايه في خطة تعلّمك، اطلب "اعملّي خطة أسبوعين لإتقان الموضوع ده بالترتيب". استخدم المحادثة نفسها للمتابعة بدل ما تبدأ سؤال جديد كل مرة — السياق بيتراكم ويحسّن الإجابات.</div>
    <div class="en">🇬🇧 When learning a new concept (like OOP or Recursion), don't just ask "what is X" — ask "explain X with a very simple example, then a slightly harder one." If you're lost on a study plan, ask for "a two-week plan to master this topic, in order." Keep following up in the same conversation instead of starting fresh each time — accumulated context improves answers.</div>
</div>

<h2>الأوامر المخصصة (Custom Instructions) — إعداد مرة واحدة يفرق في كل محادثة</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 فيه فرق مهم بين <b>Custom GPTs</b> (بوتات منفصلة لمهمة معينة، زي ما شفت فوق) و<b>Custom Instructions</b> — إعداد موجود في صفحة الإعدادات (Settings) بتاعتك بيسألك سؤالين: "عايزني أعرف إيه عنك؟" و"عايزني أرد إزاي؟". أي حاجة تكتبها هنا بتتطبق أوتوماتيك على <b>كل محادثة جديدة</b> تفتحها، من غير ما تكررها.</div>
    <div class="en">🇬🇧 There's an important difference between <b>Custom GPTs</b> (separate bots for a specific task, as seen above) and <b>Custom Instructions</b> — a Settings-page feature that asks two questions: "what should I know about you?" and "how should I respond?" Anything you write there applies automatically to <b>every new conversation</b> you start, without repeating it.</div>
</div>

<div class="bi-block">
    <div class="ar">🇪🇬 مثال لسيلا: تقدر تكتب في "عايزني أعرف إيه عنك؟" حاجة زي <span class="ltr">"بتعلّم برمجة على منصة Sila، مستواي مبتدئ في PHP وPython، وعربيّتي المصرية"</span>، وفي "عايزني أرد إزاي؟" حاجة زي <span class="ltr">"اشرح بأمثلة كود قصيرة، ومتديش الحل كامل على طول — وجّهني للتفكير الأول"</span>. من ساعتها، كل رد جديد هيراعي ده تلقائيًا من غير ما تكتبه في كل سؤال.</div>
    <div class="en">🇬🇧 A Sila-relevant example: under "what should I know about you?" you could write <span class="ltr">"I'm learning programming on the Sila platform, beginner level in PHP and Python"</span>, and under "how should I respond?" something like <span class="ltr">"explain with short code examples, and don't give the full solution right away — nudge me to think first."</span> From then on, every new reply respects that automatically without retyping it each time.</div>
</div>

<h2>قبل وبعد: طلب خطة مذاكرة / Before &amp; After: Requesting a Study Plan</h2>
<div class="security-box">
    <h3>❌ برومبت ضعيف / Weak Prompt</h3>
    <div class="ar">🇪🇬 <span class="ltr">"علمني PHP"</span> — سؤال عام جدًا. ChatGPT هيرجّعلك مقدمة عامة ممكن تكون مش مناسبة لمستواك أو للترتيب اللي بتتعلم بيه أصلًا في مسارك.</div>
    <div class="en">🇬🇧 <span class="ltr">"Teach me PHP"</span> — far too general. ChatGPT will return a generic overview that may not match your level or the order you're actually learning in your track.</div>
</div>

<div class="bi-block" style="border-inline-start-color:var(--accent-2);">
    <h3 style="margin-top:0;">✅ برومبت قوي / Strong Prompt</h3>
    <div class="ar">🇪🇬 <span class="ltr">"خلّصت مرحلة Front-End في مسار Full Stack على Sila وهدخل PHP دلوقتي. اعملّي خطة أسبوعين يوم بيوم، تبدأ بالمتغيرات والحلقات، وتوصل لحد فورم بيتحقق من بياناته — بافتراض إني بخصص ساعة يوميًا بس."</span> — لاحظ إنه محدد: نقطة البداية، الهدف النهائي، والوقت المتاح.</div>
    <div class="en">🇬🇧 <span class="ltr">"I finished the Front-End stage of the Full Stack track on Sila and am starting PHP now. Build me a day-by-day two-week plan, starting with variables and loops, ending at a form that validates its data — assuming I have one hour daily."</span> — notice it's specific: starting point, end goal, and available time.</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="gpts">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">إيه فايدة الـ Custom GPTs؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What are Custom GPTs useful for?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="gpts"> نسخة مخصصة لمهمة معينة بدل الإعداد كل مرة</label>
        <label><input type="radio" name="q1" value="faster"> يخلوا الرد أسرع دايمًا</label>
        <label><input type="radio" name="q1" value="images"> يرسموا صور فقط</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="context">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">ليه الأفضل تكمّل في نفس المحادثة بدل ما تبدأ محادثة جديدة كل مرة؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Why is it better to continue the same conversation instead of starting a new one each time?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="context"> السياق المتراكم بيحسّن دقة الإجابات</label>
        <label><input type="radio" name="q2" value="cost"> عشان يكون أرخص دايمًا</label>
        <label><input type="radio" name="q2" value="norule"> مفيش فرق حقيقي</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="everychat">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">إيه الفرق الجوهري بين Custom GPT وCustom Instructions؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What's the core difference between a Custom GPT and Custom Instructions?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="same"> مفيش فرق، الاتنين نفس الحاجة بالظبط</label>
        <label><input type="radio" name="q3" value="everychat"> Custom GPT بوت منفصل لمهمة واحدة، وCustom Instructions إعداد بيتطبق على كل محادثة جديدة عادية</label>
        <label><input type="radio" name="q3" value="paidonly"> Custom Instructions بس للحسابات المدفوعة، وCustom GPTs مجانية للكل</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="specific">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">ليه "اعملّي خطة أسبوعين تبدأ من كذا لحد كذا بساعة يوميًا" أفضل من "علمني PHP"؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Why is "build me a two-week plan from X to Y with an hour daily" better than "teach me PHP"?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="specific"> لإنه بيحدد نقطة البداية والهدف والوقت المتاح، فالخطة بتتصمم على مقاسك</label>
        <label><input type="radio" name="q4" value="shorter"> لإنه أقصر في عدد الحروف</label>
        <label><input type="radio" name="q4" value="samejob"> بيرجع نفس النتيجة بالظبط، مفيش فرق</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ خطة أسبوعين فعلية / Build a Real Two-Week Plan</h3>
    <div class="ar">🇪🇬 اختار أضعف موضوع عندك في المسار اللي بتتعلمه دلوقتي، واطلب من ChatGPT "اعملّي خطة أسبوعين مفصّلة يوم بيوم لإتقان الموضوع ده، وابدأ بأسهل جزء". احفظ الخطة، والتزم بيوم 1 منها فعليًا النهاردة قبل ما تقفل الدرس ده.</div>
    <div class="en">🇬🇧 Pick your weakest topic in the track you're currently learning, and ask ChatGPT for "a detailed day-by-day two-week plan to master this topic, starting with the easiest part." Save the plan, and actually follow Day 1 of it today before closing this lesson.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 في درسك الجاي على مسارك الأساسي، لو قابلت مفهوم جديد ومحسّش إنك فاهمه 100%، متكملش على طول — افتح ChatGPT واطلب "اشرحلي المفهوم ده بـ 3 مستويات (لطفل، لمبتدئ، لمحترف)" قبل ما تتقدم للجزء اللي بعده في الدرس.</div>
    <div class="en">🇬🇧 In your next lesson on your main track, if you hit a new concept and don't feel 100% confident about it, don't just move on — open ChatGPT and ask for "3 levels of explanation (for a kid, a beginner, a professional)" before advancing to the next part of the lesson.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>الأقوى في: التعلم العام، الشرح متعدد المستويات، وتنظيم خطط المذاكرة.</li>
        <li>Custom GPTs بتديك نسخة مخصصة لمهمة معينة بدل الإعداد المتكرر.</li>
        <li>كمّل في نفس المحادثة بدل ما تبدأ من الصفر كل مرة — السياق مهم.</li>
        <li>Custom Instructions (في الإعدادات) بتتطبق أوتوماتيك على كل محادثة جديدة، من غير ما تكررها كل مرة.</li>
        <li>برومبت فيه نقطة بداية + هدف + وقت متاح بيرجّعلك خطة مصممة على مقاسك، مش عامة.</li>
    </ul>
</div>

<div class="exercise-box">
    <h3>✍️ تمرين عملي / Hands-on Exercise</h3>
    <div class="ar">🇪🇬 اختار مفهوم لسه مش فاهمه كويس من أي مسار في سيلا، واطلب من ChatGPT يشرحه بـ 3 مستويات: لطفل عمره 10 سنين، لمبتدئ في البرمجة، ولمبرمج محترف. شوف إزاي الشرح بيتغيّر ويديك زوايا مختلفة لنفس الفكرة.</div>
    <div class="en">🇬🇧 Pick a concept you don't fully understand yet from any Sila track, and ask ChatGPT to explain it at 3 levels: to a 10-year-old, to a programming beginner, and to a professional developer. See how the explanation shifts and gives you different angles on the same idea.</div>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="claude.php">← الأداة السابقة</a>
    <a href="gemini.php">الأداة الجاية / Next: Gemini →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
