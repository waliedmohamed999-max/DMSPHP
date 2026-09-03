<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'other-paths';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'نظرة عامة على المسارات الأخرى';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">المرحلة 6 / Stage 6</span>
<h1>نظرة عامة على المسارات الأخرى <span class="ltr">A Look at Other Python Paths</span></h1>
<p class="subtitle">وصلت لآخر مرحلة في مسار Python Web Developer — مبروك! بس Python نفسها أكبر بكتير من الويب بس. الدرس ده مش هيعلّمك حاجة جديدة بالتفصيل، بس هيديك فكرة سريعة عن باقي عالم Python عشان تعرف فين تدوّر لو حبيت تكمل بعد كده.</p>

<div class="step-tracker">
    <a href="#read">📖 Read</a>
    <a href="#understand">🧠 Understand</a>
    <a href="#quiz">🧠 Quiz</a>
    <a href="#challenge">🛠️ Challenge</a>
    <a href="#project">🚀 Project</a>
</div>

<h2 id="read">الهدف / Goal</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 تاخد فكرة عامة (مش تفصيلية) عن أشهر استخدامات Python بره الويب: تحليل البيانات، الأتمتة والسكريبتات، والذكاء الاصطناعي — عشان توسّع نظرتك للغة اللي اتعلمتها.</div>
    <div class="en">🇬🇧 Get a general (not detailed) idea of Python's most popular uses outside the web: data analysis, automation/scripting, and AI — to broaden your view of the language you just learned.</div>
</div>

<h2 id="understand">1) تحليل البيانات / Data Analysis</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 Python هي اللغة الأكثر استخدامًا في عالم تحليل البيانات، بفضل مكتبات زي <code>pandas</code> (تنظيم وتحليل جداول بيانات ضخمة) و<code>numpy</code> (عمليات رياضية سريعة على مصفوفات أرقام). لو شغلك هيكون في تحليل مبيعات، أو تقارير، أو أي حاجة فيها أرقام كتير، دي هي الأدوات المعتمدة عالميًا.</div>
    <div class="en">🇬🇧 Python is the most widely used language for data analysis, thanks to libraries like <code>pandas</code> (organizing and analyzing huge data tables) and <code>numpy</code> (fast math operations on number arrays). If your work involves sales analysis, reports, or anything number-heavy, these are the globally standard tools.</div>
</div>

<pre><code># مثال توضيحي فقط — يحتاج pip install pandas
import pandas as pd

data = {"product": ["Laptop", "Phone", "Tablet"], "sales": [120, 340, 90]}
df = pd.DataFrame(data)
print(df.sort_values("sales", ascending=False))</code></pre>

<h2>2) الأتمتة والسكريبتات / Automation &amp; Scripting</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 Python ممتازة في كتابة سكريبتات صغيرة توفّر وقتك: إعادة تسمية مئات الملفات دفعة واحدة، سحب بيانات من موقع (Web Scraping)، أو جدولة مهمة تتكرر كل يوم. المكتبات القياسية اللي بتيجي مع Python نفسها (زي <code>os</code> و<code>shutil</code>) كفاية لمعظم المهام دي من غير ما تثبت أي حاجة إضافية.</div>
    <div class="en">🇬🇧 Python excels at small time-saving scripts: batch-renaming hundreds of files, scraping data from a website, or scheduling a task that repeats daily. Python's own standard library (like <code>os</code> and <code>shutil</code>) covers most of these without installing anything extra.</div>
</div>

<pre><code># مثال توضيحي فقط
import os

for filename in os.listdir("photos"):
    if filename.endswith(".jpeg"):
        new_name = filename.replace(".jpeg", ".jpg")
        os.rename(f"photos/{filename}", f"photos/{new_name}")</code></pre>

<h2>3) الذكاء الاصطناعي / AI &amp; Machine Learning</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 السبب الرئيسي لشهرة Python الهائلة النهاردة: كل أدوات الذكاء الاصطناعي الكبرى (TensorFlow، PyTorch، ومكتبات التعامل مع نماذج اللغة الكبيرة زي اللي بتشغّل هذه المنصة) مبنية بـ Python أو بتوفر واجهة Python أساسية ليها. لو حابب تدخل مجال الذكاء الاصطناعي مستقبلًا، أساسيات Python اللي اتعلمتها هنا هي بالظبط نقطة البداية.</div>
    <div class="en">🇬🇧 The main reason for Python's massive popularity today: every major AI tool (TensorFlow, PyTorch, and the libraries used to work with large language models like the ones powering this platform) is built in Python or offers Python as its primary interface. If you want to move into AI later, the Python fundamentals you learned here are exactly the starting point.</div>
</div>

<pre><code># مثال توضيحي فقط — يحتاج pip install torch
import torch

x = torch.tensor([1.0, 2.0, 3.0])
y = x * 2
print(y)  # tensor([2., 4., 6.])</code></pre>

<div class="bi-block">
    <div class="ar">🇪🇬 الدرس ده مقصود يكون قصير — الهدف بس إنك تعرف إن الأساسيات اللي اتعلمتها في المتغيرات، القوائم، والدوال هي نفسها المستخدمة في كل المجالات دي. التعمق فيها موضوع مسارات لوحدها.</div>
    <div class="en">🇬🇧 This lesson is deliberately short — the point is just that the fundamentals you learned (variables, lists, functions) are the same ones used across all these fields. Going deep into any of them is a track of its own.</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="pandas">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">أي مكتبة هي الأشهر لتنظيم وتحليل جداول بيانات ضخمة في Python؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Which library is most popular for organizing and analyzing huge data tables in Python?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="flask"> Flask</label>
        <label><input type="radio" name="q1" value="pandas"> pandas</label>
        <label><input type="radio" name="q1" value="django"> Django</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="python">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">إيه اللغة الأساسية اللي بتوفر واجهة لمعظم أدوات الذكاء الاصطناعي الكبرى زي TensorFlow وPyTorch؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What's the primary language behind most major AI tools like TensorFlow and PyTorch?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="php"> PHP</label>
        <label><input type="radio" name="q2" value="python"> Python</label>
        <label><input type="radio" name="q2" value="js"> JavaScript</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ اختار مسارك الجاي / Pick Your Next Direction</h3>
    <div class="ar">🇪🇬 من التلات مجالات اللي شفتها (تحليل بيانات، أتمتة، ذكاء اصطناعي)، اختار واحد شدّك أكتر، وابحث عن "أول مشروع بسيط" فيه (زي: سكريبت يعيد تسمية ملفاتك، أو تحليل ملف Excel فيه مصروفاتك الشخصية بـ pandas). اكتب فقرة قصيرة بإيه اللي عايز تحققه بيه.</div>
    <div class="en">🇬🇧 From the three areas you saw (data analysis, automation, AI), pick the one that pulls you most, and search for a "first simple project" in it (like: a script that renames your files, or analyzing a personal-expenses Excel file with pandas). Write a short paragraph on what you want to achieve with it.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 مهما كان اختيارك الجاي، هتحتاج نفس أساسيات المتغيرات والـ Lists والدوال اللي اتعلمتها في المرحلة 2 من المسار ده — ومهما اخترت، دايمًا تقدر ترجع لمسار Python Web Developer ده وتطبّق اللي اتعلمته في مشروع Django أو Flask فعلي.</div>
    <div class="en">🇬🇧 Whatever you choose next, you'll need the same variable, List, and function fundamentals you learned in Stage 2 of this track — and whatever you pick, you can always come back to this Python Web Developer track and apply what you learned in an actual Django or Flask project.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li><code>pandas</code> و<code>numpy</code> = أدوات Python المعتمدة لتحليل البيانات.</li>
        <li>مكتبة Python القياسية كفاية لمعظم مهام الأتمتة والسكريبتات اليومية.</li>
        <li>Python هي اللغة الأساسية لأدوات الذكاء الاصطناعي الكبرى زي TensorFlow وPyTorch.</li>
        <li>الأساسيات اللي اتعلمتها في المسار ده (متغيرات، قوائم، دوال) هي نفسها المستخدمة في كل هذه المجالات.</li>
        <li>مبروك — خلّصت مسار Python Web Developer كامل! 🎉</li>
    </ul>
    <p class="ar" style="margin-top:14px;">🇪🇬 لو حابب تكمل استكشاف البرمجة، سيلا فيها مسارات تانية كتير غير Python — من تطوير الويب بلغات تانية لحد الذكاء الاصطناعي. اكتشفها من هنا: <a href="../../index.php">مسارات سيلا / Sila Tracks</a>.</p>
    <p class="en" style="color:var(--muted);">🇬🇧 If you'd like to keep exploring programming, Sila has many other tracks besides Python — from web development in other languages to AI. Discover them here: <a href="../../index.php">Sila Tracks</a>.</p>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="flask.php">← المرحلة السابقة</a>
    <a href="../index.php">لوحة الدروس / Dashboard</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
