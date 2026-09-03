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
