<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'copilot';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'GitHub Copilot — أدوات الذكاء الاصطناعي';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">أداة 4 من 4 / Tool 4 of 4</span>
<h1>GitHub Copilot <span class="ltr">by GitHub / Microsoft</span></h1>
<p class="subtitle">الأدوات التلاتة اللي فاتت كلها "شات" بتفتحه في تاب منفصل. Copilot مختلف تمامًا — بيشتغل جوه محرر الكود بتاعك نفسه، وده اللي خلاني أختاره كرابع أداة: أهم أداة ذكاء اصطناعي لمبرمج فعليًا مش عام.</p>

<div class="step-tracker">
    <a href="#read">📖 Read</a>
    <a href="#understand">🧠 Understand</a>
    <a href="#quiz">🧠 Quiz</a>
    <a href="#challenge">🛠️ Challenge</a>
    <a href="#project">🚀 Project</a>
</div>

<h2 id="read">الهدف / Goal</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 تفهم الفرق الجوهري بين مساعد "شات" ومساعد "جوه المحرر"، وتتعلم تستخدم الاقتراحات التلقائية والـ Chat بتاعه بمسؤولية من غير ما توقف عن فهم الكود اللي بتكتبه.</div>
    <div class="en">🇬🇧 Understand the fundamental difference between a "chat" assistant and an "in-editor" one, and learn to use its auto-suggestions and chat responsibly without ever stopping to understand the code you write.</div>
</div>

<h2 id="understand">إيه اللي يميّزه؟ / What Makes It Different</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>مفيش تبديل تابات:</b> وانت بتكتب كود في VS Code أو أي محرر مدعوم، بيقترحلك أسطر أو دوال كاملة تلقائيًا وانت لسه بتكتب — من غير ما تروح تفتح متصفح وتلصق سؤال. <b>بيشوف مشروعك كامل:</b> اقتراحاته بتتبني على الكود المفتوح عندك فعلاً، فبتيجي متناسقة مع أسلوبك ومكتباتك. <b>Copilot Chat:</b> جوه نفس المحرر، تقدر تسأله يشرحلك جزء كود محدد أو يكتبلك اختبارات (Tests) ليه.</div>
    <div class="en">🇬🇧 <b>No tab-switching:</b> while typing in VS Code or a supported editor, it suggests full lines or functions automatically as you type — no browser tab, no copy-pasting a question. <b>Sees your whole project:</b> suggestions are grounded in the code actually open in your editor, so they match your style and libraries. <b>Copilot Chat:</b> inside the same editor, you can ask it to explain a specific piece of code or write tests for it.</div>
</div>

<div class="security-box">
    <h3>⚠️ أهم قاعدة: راجع، متقبلش أعمى</h3>
    <div class="ar">🇪🇬 لإنه بيقترح كود جاهز فورًا، أسهل خطأ ممكن تقع فيه إنك تضغط Tab وتقبل الاقتراح من غير ما تقراه — ده بالظبط عكس هدف التعلم. الاقتراح ممكن يكون فيه ثغرة أمنية، أو نمط قديم، أو ببساطة مش الحل الأنسب لحالتك. القاعدة: <b>ماتقبلش أي اقتراح انت مش فاهمه بالكامل</b>، خصوصًا في كود بيتعامل مع باسوردات أو قواعد بيانات.</div>
    <div class="en">🇬🇧 Because it suggests ready-made code instantly, the easiest mistake is hitting Tab and accepting without reading — the exact opposite of learning. A suggestion might carry a security flaw, an outdated pattern, or simply not be the right fit for your case. Rule: <b>never accept a suggestion you don't fully understand</b>, especially in code touching passwords or databases.</div>
</div>

<h2>إزاي تستخدمه بفعالية / Using It Effectively</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 اكتب تعليق واضح (زي <code>// دالة تتحقق إن الإيميل صيغته صحيحة</code>) قبل ما تسيبه يقترح — كل ما التعليق أوضح، كل ما الاقتراح أدق. استخدم Copilot Chat عشان تسأله "اشرحلي السطر ده" على كود موجود بالفعل (بتاعك أو حتى بتاعه)، ده بيحوّله من "أداة تكتب بدالك" لـ "أداة تعلّمك".</div>
    <div class="en">🇬🇧 Write a clear comment (like <code>// function that validates an email format</code>) before letting it suggest — the clearer the comment, the more accurate the suggestion. Use Copilot Chat to ask "explain this line" on existing code (yours or its own) — that turns it from "a tool that writes for you" into "a tool that teaches you."</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="editor">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">إيه أكبر فرق بين Copilot والتلات أدوات اللي فاتوا (Claude، ChatGPT، Gemini)؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What's the biggest difference between Copilot and the previous three tools?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="free"> إنه مجاني بس</label>
        <label><input type="radio" name="q1" value="editor"> بيشتغل جوه محرر الكود نفسه وهو بتكتب</label>
        <label><input type="radio" name="q1" value="arabic"> بيفهم عربي بس هو</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="understand">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">إيه القاعدة الذهبية قبل ما تقبل اقتراح Copilot؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What's the golden rule before accepting a Copilot suggestion?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="always"> اقبل كل اقتراح على طول عشان توفر وقت</label>
        <label><input type="radio" name="q2" value="understand"> متقبلش اقتراح انت مش فاهمه بالكامل</label>
        <label><input type="radio" name="q2" value="never"> متستخدمش الاقتراحات خالص</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ اكتب تعليق، قارن، افهم / Write a Comment, Compare, Understand</h3>
    <div class="ar">🇪🇬 لو عندك Copilot متاح، افتح أي ملف تمرين قديم، امسح الحل، واكتب مكانه تعليق دقيق زي <code>// دالة تتحقق إن كلمة السر 8 أحرف على الأقل وفيها رقم</code>. شوف اقتراحه، واكتب جوه تعليق تاني: "هل فاهم السطر ده؟ آه/لأ" لكل سطر في اقتراحه — لو فيه سطر واحد "لأ"، اسأل Copilot Chat "اشرحلي السطر ده" قبل ما تقفل الملف.</div>
    <div class="en">🇬🇧 If you have Copilot available, open any old exercise file, delete the solution, and write a precise comment in its place like <code>// function that checks a password is at least 8 chars and has a number</code>. Look at its suggestion, and next to every line write "understood? yes/no" — if even one line is "no," ask Copilot Chat to "explain this line" before closing the file.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 لو عندك Copilot متاح فعليًا وبتكتب كود في مسارك الأساسي (زي تمرين PHP أو Python)، اكتب تعليق واضح قبل أي دالة جديدة هتكتبها بدل ما تكتب الكود على طول، وشوف اقتراحه — دي بالظبط العادة اللي هتفرق بين "بتنسخ كود" و"بتتعلم فعليًا" وانت بتستخدمه.</div>
    <div class="en">🇬🇧 If you actually have Copilot available and are writing code in your main track (like a PHP or Python exercise), write a clear comment before any new function instead of jumping straight to code, and see its suggestion — that habit is exactly what separates "copying code" from "actually learning" while using it.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>مختلف عن التلاتة اللي فاتوا: بيشتغل جوه محرر الكود نفسه، مش شات منفصل.</li>
        <li>تعليق واضح قبل الكود = اقتراح أدق.</li>
        <li>القاعدة الذهبية: ماتقبلش اقتراح انت مش فاهمه بالكامل — خصوصًا في كود حساس أمنيًا.</li>
        <li>استخدم Copilot Chat "اشرحلي" عشان يبقى أداة تعليم مش بس أداة إنتاج.</li>
    </ul>
</div>

<div class="exercise-box">
    <h3>✍️ تمرين عملي / Hands-on Exercise</h3>
    <div class="ar">🇪🇬 لو عندك Copilot متاح، خد تمرين قديم حليته بنفسك من مسار أساسيات البرمجة، واكتب نفس المسألة كتعليق فاضي وشوف اقتراحه. قارن حله بحلك انت — إيه المختلف؟ هل فاهم كل سطر في حله هو؟ لو مفيش سطر مش فاهمه، دور نفسك متقدمش.</div>
    <div class="en">🇬🇧 If you have Copilot available, take an old exercise you solved yourself from the Programming Fundamentals track, write the same problem as an empty comment, and see its suggestion. Compare its solution to yours — what's different? Do you understand every line of its version? If there's a line you don't understand, don't move on until you do.</div>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="gemini.php">← الأداة السابقة</a>
    <a href="../index.php">لوحة الأدوات / Dashboard</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
