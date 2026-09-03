<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'careers';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'العمل في تحليل البيانات';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">المرحلة 9 / Stage 9</span>
<h1>العمل في تحليل البيانات <span class="ltr">Data Analysis Careers</span></h1>
<p class="subtitle">خلّصت المسار — مبروك! دلوقتي السؤال المهم: إيه اللي بعد كده؟ وإيه الفرق بين "Data Analyst" و"Data Scientist"؟</p>

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
    <div class="ar">🇪🇬 تفهم الفرق الحقيقي بين Data Analyst وData Scientist بأمثلة شغل ملموسة، وتعرف أنهي مشروع من المسار ده يثبت جاهزيتك لوظيفة Analyst فعليًا.</div>
    <div class="en">🇬🇧 Understand the real difference between a Data Analyst and a Data Scientist through concrete work examples, and know which project from this track proves you're ready for an Analyst role.</div>
</div>

<h2 id="understand">Data Analyst مقابل Data Scientist / Analyst vs Scientist</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 الفرق الأساسي مش في "مين أذكى" — الفرق في <b>نوع السؤال</b> اللي كل واحد بيجاوب عليه:</div>
    <div class="en">🇬🇧 The core difference isn't "who's smarter" — it's the <b>type of question</b> each one answers:</div>
</div>

<div class="recap-box">
    <h3>📊 Data Analyst</h3>
    <ul>
        <li><b>السؤال:</b> "إيه اللي حصل؟" و"ليه حصل؟" — تحليل وصفي وتشخيصي (Descriptive &amp; Diagnostic Analysis).</li>
        <li><b>الشغل اليومي:</b> تقارير دورية، Dashboards، استعلامات SQL، تنظيف بيانات، تواصل مع فرق العمل عشان يفهموا الأرقام.</li>
        <li><b>الأدوات:</b> SQL، Excel، Python/Pandas، أدوات تصوير بيانات زي Power BI أو Tableau.</li>
        <li><b>خلفية رياضية مطلوبة:</b> إحصاء وصفي أساسي — مش محتاج رياضيات متقدمة أو Machine Learning غالبًا.</li>
    </ul>
</div>

<div class="bi-block">
    <div class="ar">🇪🇬 <b>مثال ليوم شغل حقيقي لـ Analyst:</b> فريق التسويق باعتلك طلب: "معدل التحويل (conversion rate) نزل الأسبوع اللي فات في صفحة الهبوط الجديدة — اعرف ليه". تفتح Google Analytics وتكتب استعلام SQL على قاعدة بيانات الطلبات، تقارن بيانات الأسبوعين ببعض بـ <code>groupby</code> و<code>value_counts()</code> (بالظبط زي ما اتعلمت في مرحلة الاستكشاف)، تلاقي إن 60% من الزيارات جايه من الموبايل وصفحة الهبوط مش متوافقة معاه كويس، تعمل رسم Bar Chart يوضّح الفرق بين الأجهزة، وتكتب تقرير قصير وترفعه في اجتماع الفريق الصبح.</div>
    <div class="en">🇬🇧 <b>A concrete day-in-the-life example for an Analyst:</b> the marketing team sends a request: "conversion rate dropped last week on the new landing page — find out why." You open Google Analytics and write a SQL query against the orders database, compare the two weeks' data with <code>groupby</code> and <code>value_counts()</code> (exactly as you learned in the Exploration lesson), find that 60% of visits come from mobile and the landing page isn't mobile-friendly, build a Bar Chart showing the device split, and write a short report to present in tomorrow's team meeting.</div>
</div>

<div class="recap-box">
    <h3>🔬 Data Scientist</h3>
    <ul>
        <li><b>السؤال:</b> "إيه اللي هيحصل؟" و"إزاي نأتمت القرار ده؟" — تحليل تنبؤي ووصفي متقدم (Predictive &amp; Prescriptive Analysis).</li>
        <li><b>الشغل اليومي:</b> بناء نماذج Machine Learning، تجارب A/B متقدمة، هندسة ميزات (Feature Engineering)، أحيانًا نشر نماذج في الإنتاج.</li>
        <li><b>الأدوات:</b> Python (Scikit-learn, TensorFlow/PyTorch)، SQL، إحصاء تطبيقي متقدم، أحيانًا هندسة برمجيات وClouds.</li>
        <li><b>خلفية رياضية مطلوبة:</b> إحصاء متقدم، احتمالات، جبر خطي، وأساسيات Machine Learning — عمق رياضي أكبر بكتير من الـ Analyst.</li>
    </ul>
</div>

<div class="bi-block">
    <div class="ar">🇪🇬 <b>مثال ليوم شغل حقيقي لـ Scientist:</b> فريق المنتج طالب نظام يتنبأ بمين هيلغي اشتراكه (churn) الشهر الجاي. تجمع بيانات سلوك آلاف العملاء التاريخية، تعمل Feature Engineering (زي عدد مرات تسجيل الدخول، مدة آخر جلسة، عدد التذاكر اللي فتحها للدعم الفني)، تدرب نموذج Machine Learning (زي Logistic Regression أو Random Forest)، تقيس دقته على بيانات ماشافهاش قبل كده، وبعدين تنشره كـ API يستخدمه فريق التسويق يوميًا يستهدف بيه العملاء دول بعروض احتفاظ قبل ما يمشوا فعلاً.</div>
    <div class="en">🇬🇧 <b>A concrete day-in-the-life example for a Scientist:</b> the product team asks for a system predicting who will cancel their subscription (churn) next month. You gather months of historical customer behavior, do Feature Engineering (login frequency, last-session duration, support-ticket count), train a Machine Learning model (like Logistic Regression or Random Forest), measure its accuracy on data it's never seen, then deploy it as an API the marketing team uses daily to target those customers with retention offers before they actually leave.</div>
</div>

<div class="bi-block">
    <div class="ar">🇪🇬 ملحوظة مهمة: كل المهارات اللي اتعلمتها في المسار ده (Pandas، تنظيف البيانات، SQL، الإحصاء الأساسي، التصوير البياني) هي <b>الأساس المشترك</b> بين المسارين. لو عايز تكمل لـ Data Scientist، الخطوة الجاية هي تتعلم إحصاء أعمق وMachine Learning — مش إنك تبدأ من الصفر.</div>
    <div class="en">🇬🇧 Important note: everything you learned in this track (Pandas, data cleaning, SQL, basic statistics, visualization) is the <b>shared foundation</b> between both paths. If you want to move toward Data Scientist, the next step is deeper statistics and Machine Learning — not starting from scratch.</div>
</div>

<h2 id="practice">💻 إزاي تبدأ بورتفوليو / How to Start a Portfolio</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 أفضل دليل على مهاراتك مش شهادة — هو مشروع حقيقي تقدر تشرحه. الخطوات:</div>
    <div class="en">🇬🇧 The best proof of your skills isn't a certificate — it's a real project you can explain. The steps:</div>
</div>

<div class="recap-box">
    <h3>🗺️ خطوات بناء أول مشروع بورتفوليو / Steps to Your First Portfolio Project</h3>
    <ul>
        <li><b>1. اختر بيانات عامة حقيقية:</b> مواقع زي Kaggle أو بيانات حكومية مفتوحة فيها آلاف الداتاسيتس المجانية.</li>
        <li><b>2. اسأل سؤال واضح قبل ما تفتح الكود:</b> "إيه العوامل اللي بتأثر في X؟" مش "خلينا نحلل البيانات دي".</li>
        <li><b>3. طبّق نفس الدورة اللي اتعلمتها:</b> تحميل → تنظيف → استكشاف → تصوير → استنتاج (بالظبط زي المشروع الختامي في المرحلة اللي فاتت).</li>
        <li><b>4. اكتب تقرير قصير أو Notebook:</b> يشرح السؤال، الخطوات، والاستنتاج بلغة يفهمها شخص مش تقني.</li>
        <li><b>5. انشره:</b> على GitHub أو مدونة شخصية — ده اللي أصحاب الشغل بيدوروا عليه فعليًا.</li>
    </ul>
</div>

<div class="exercise-box">
    <h3>✍️ تمرين عملي / Hands-on Exercise</h3>
    <div class="ar">🇪🇬 اختر داتاسيت عام (من Kaggle أو أي مصدر مفتوح) في موضوع يهمك (رياضة، أفلام، اقتصاد...)، واكتب سؤال تحليلي واحد واضح عنه. ابدأ تخطط إزاي هتطبّق عليه دورة التحليل الكاملة اللي اتعلمتها في المسار ده.</div>
    <div class="en">🇬🇧 Pick a public dataset (from Kaggle or any open source) on a topic you care about (sports, movies, economics...), and write one clear analytical question about it. Start planning how you'd apply the full analysis cycle you learned in this track to it.</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="analyst">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">مين المسؤول الأساسي عن كتابة تقرير أسبوعي يشرح "ليه المبيعات نزلت الأسبوع ده"؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Who's primarily responsible for a weekly report explaining "why did sales drop this week"?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="analyst"> Data Analyst</label>
        <label><input type="radio" name="q1" value="scientist"> Data Scientist</label>
        <label><input type="radio" name="q1" value="neither"> ولا واحد فيهم بالظبط / Neither, typically</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="cycle">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">إيه أهم حاجة تثبتها في أول مشروع بورتفوليو؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What's the most important thing to prove in your first portfolio project?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="cycle"> تطبيق دورة تحليل كاملة من السؤال للاستنتاج / Applying a full analysis cycle from question to conclusion</label>
        <label><input type="radio" name="q2" value="ml"> بناء نموذج Machine Learning معقّد / Building a complex Machine Learning model</label>
        <label><input type="radio" name="q2" value="size"> حجم البيانات الكبير بس / Just the size of the dataset</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ اكتب Elevator Pitch لنفسك / Write Your Own Elevator Pitch</h3>
    <div class="ar">🇪🇬 اكتب فقرة من 3-4 جمل بتقدّم بيها نفسك في مقابلة شغل لوظيفة Data Analyst فريش (Junior)، مستخدمًا مصطلحات حقيقية اتعلمتها في المسار ده (Pandas، تنظيف بيانات، groupby، SQL، الانحراف المعياري). اذكر مشروع واحد محدد (زي مشروع التخرج بتاع الكافيه) كدليل ملموس، مش بس "بحب البيانات".</div>
    <div class="en">🇬🇧 Write a 3-4 sentence pitch introducing yourself in a Junior Data Analyst interview, using real terms you learned in this track (Pandas, data cleaning, groupby, SQL, standard deviation). Mention one specific project (like the coffee-shop capstone) as concrete evidence, not just "I love data."</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 أنهي مشروع من المسار ده يثبت جاهزيتك لوظيفة Analyst فعليًا؟ إجابة واضحة: <b>مشروع تحليل بيانات كامل (Capstone)</b>. ليه بالتحديد؟ لأنه الوحيد اللي بيغطي الدورة الكاملة اللي أي Data Analyst بيطبّقها يوميًا في شغله الحقيقي: بيانات فيها مشاكل حقيقية (قيم ناقصة وتكرار) → تنظيف موثّق بقرارات واضحة (ليه استخدمت median مش mean) → استكشاف بـ groupby وdescribe() → رسم بياني بمكتبة حقيقية → استنتاج نهائي مكتوب بلغة واضحة لصاحب القرار. لما تبني بورتفوليو، ابدأ بمشروع بنفس الشكل ده بالظبط — سؤال واحد واضح، بيانات حقيقية، ودورة كاملة موثّقة من الأول للآخر.</div>
    <div class="en">🇬🇧 Which project from this track best proves you're ready for an Analyst role? Clear answer: the <b>Capstone Data Analysis Project</b>. Why specifically? Because it's the only one covering the full cycle a real Data Analyst applies every day at work: data with real problems (missing values, duplicates) → documented cleaning with clear decisions (why you used median, not mean) → exploration with groupby and describe() → a real chart with a real library → a final conclusion written clearly for a decision-maker. When you build your own portfolio, start with a project shaped exactly like it — one clear question, real data, and a fully documented cycle from start to finish.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>Data Analyst = يوصف ويشخّص "إيه حصل وليه"، Data Scientist = يتنبأ "إيه هيحصل" بأدوات رياضية أعمق.</li>
        <li>المهارات اللي اتعلمتها في المسار ده هي الأساس المشترك للمسارين.</li>
        <li>أفضل دليل على مهاراتك = مشروع بورتفوليو حقيقي على بيانات عامة، منشور وموثّق.</li>
        <li>مشروع التخرج (Capstone) هو أفضل نموذج تتبع شكله لأول مشروع بورتفوليو ليك.</li>
    </ul>
</div>

<div class="bi-block">
    <div class="ar">🇪🇬 🎉 مبروك على إتمام مسار تحليل البيانات كامل! أنت دلوقتي شفت وطبّقت — بتنفيذ فعلي مش نظري — كل حاجة من أساسيات Pandas لغاية مشروع تحليل متكامل. الخطوة الجاية بايدك.</div>
    <div class="en">🇬🇧 🎉 Congratulations on completing the full Data Analysis track! You've now seen and applied — with real execution, not theory — everything from Pandas basics to a complete analysis project. The next step is yours.</div>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="capstone-analysis.php">← المرحلة السابقة</a>
    <a href="../index.php">لوحة الدروس / Dashboard</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
