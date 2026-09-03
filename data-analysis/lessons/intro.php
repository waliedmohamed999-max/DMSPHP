<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'intro';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'مقدمة في تحليل البيانات';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">المرحلة 1 / Stage 1</span>
<h1>مقدمة في تحليل البيانات <span class="ltr">Intro to Data Analysis</span></h1>
<p class="subtitle">تحليل البيانات مش "فتح Excel ونشوف الأرقام" — هو عملية منظمة تبدأ بسؤال واضح، وتنتهي بقرار مبني على دليل مش على إحساس.</p>

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
    <div class="ar">🇪🇬 تفهم إيه هو تحليل البيانات، ومراحل العملية الكاملة من السؤال للقرار، وتعرف إيه الفرق بين "بيانات" و"معلومة" و"قرار".</div>
    <div class="en">🇬🇧 Understand what data analysis is, the full process from question to decision, and the difference between "data," "information," and "a decision."</div>
</div>

<h2 id="understand">إيه هو تحليل البيانات؟ / What Is Data Analysis?</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 تحليل البيانات هو عملية فحص وتنظيف وتحويل بيانات خام (أرقام، نصوص، تواريخ) لاستخراج معلومة مفيدة تساعد في اتخاذ قرار. الفرق بين البيانات الخام والمعلومة: 1000 صف "تاريخ البيع، المنتج، السعر" هي بيانات خام. "المبيعات زادت 20% في الشتاء" هي معلومة.</div>
    <div class="en">🇬🇧 Data analysis is the process of examining, cleaning, and transforming raw data (numbers, text, dates) to extract useful information that supports a decision. The difference between raw data and information: 1000 rows of "sale date, product, price" is raw data. "Sales increased 20% in winter" is information.</div>
</div>

<div class="bi-block">
    <div class="ar">🇪🇬 <b>ملحوظة سريعة:</b> "تحليل البيانات" (Data Analysis) مش نفس حاجة "علم البيانات" (Data Science). الفرق الأساسي إن تحليل البيانات بيركّز على وصف وتفسير اللي حصل فعلاً (زي "إيه المبيعات الشهر ده؟")، بينما علم البيانات بيضيف عليها التنبؤ ببناء نماذج رياضية (زي "هل المبيعات هتزيد الشهر الجاي؟"). هنشرح الفرق ده بالتفصيل الكامل في آخر درس بالمسار.</div>
    <div class="en">🇬🇧 <b>Quick note:</b> "Data Analysis" isn't the same as "Data Science." The core difference: data analysis focuses on describing and explaining what already happened (like "what were this month's sales?"), while data science adds prediction through mathematical models (like "will sales rise next month?"). We'll cover this difference in full depth in the track's last lesson.</div>
</div>

<h2>مراحل عملية التحليل / The Analysis Process</h2>
<div class="flow-diagram">
    <div class="flow-box">Question</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">Collect</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">Clean</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">Explore</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">Visualize</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">Decide</div>
</div>
<div class="recap-box">
    <h3>🗺️ من السؤال للقرار / From Question to Decision</h3>
    <ul>
        <li><b>1. اسأل سؤال واضح:</b> "ليه المبيعات نازلة الشهر ده؟" مش "خلينا نشوف البيانات".</li>
        <li><b>2. اجمع البيانات:</b> من قاعدة بيانات، ملف Excel، أو API.</li>
        <li><b>3. نظّف البيانات:</b> تعامل مع القيم الناقصة والمكررة (هنتعلمها بالتفصيل في مرحلة "تنظيف البيانات").</li>
        <li><b>4. حلّل واستكشف:</b> ابحث عن أنماط واتجاهات (مرحلة "الاستكشاف والتحليل الوصفي").</li>
        <li><b>5. تصوّر بيانيًا:</b> حوّل الأرقام لرسم بياني يوصّل الرسالة بسرعة.</li>
        <li><b>6. اتخذ قرار:</b> النتيجة النهائية اللي كل الخطوات فاتت كانت بتخدمها.</li>
    </ul>
</div>

<h2 id="practice">💻 طبّق الفكرة / Apply the Idea</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 هنستخدم <b>Python</b> مع مكتبة <b>Pandas</b> (متخصصة في التعامل مع الجداول والبيانات) و<b>Matplotlib</b> (للرسم البياني) — أدوات حقيقية بيستخدمها محللين البيانات في الشغل الفعلي، مش أدوات تعليمية مبسّطة. كل كود في المسار ده بيتنفذ فعليًا وتشوف نتيجته الحقيقية.</div>
    <div class="en">🇬🇧 We'll use <b>Python</b> with the <b>Pandas</b> library (specialized for tabular data) and <b>Matplotlib</b> (for charting) — real tools actual data analysts use at work, not simplified teaching tools. Every code example in this track runs for real and you see its actual output.</div>
</div>

<div class="exercise-box">
    <h3>✍️ تمرين عملي / Hands-on Exercise</h3>
    <div class="ar">🇪🇬 فكّر في قرار بسيط بتاخده يوميًا (زي "أروح الشغل بالعربية ولا بالمواصلات؟") وحوّله لعملية تحليل بيانات مصغّرة: إيه السؤال؟ إيه البيانات اللي محتاجها (وقت، تكلفة، زحمة)؟ إزاي هتوصل لقرار منها؟</div>
    <div class="en">🇬🇧 Think of a simple decision you make daily (like "drive to work or take transit?") and turn it into a mini data-analysis process: what's the question? What data would you need (time, cost, traffic)? How would you reach a decision from it?</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="information">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">إيه المصطلح اللي بيوصف الجملة دي: "المبيعات زادت 20% في الشتاء"؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What term describes the sentence: "Sales increased 20% in winter"?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="raw"> بيانات خام / Raw data</label>
        <label><input type="radio" name="q1" value="information"> معلومة / Information</label>
        <label><input type="radio" name="q1" value="collection"> جمع بيانات / Data collection</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="scientist">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">مين اللي بيركّز أكتر على التنبؤ بإيه اللي هيحصل في المستقبل (باستخدام نماذج رياضية)؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Who focuses more on predicting what will happen next (using mathematical models)?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="analyst"> Data Analyst</label>
        <label><input type="radio" name="q2" value="scientist"> Data Scientist</label>
        <label><input type="radio" name="q2" value="none"> ولا واحد فيهم / Neither</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ صمّم عملية تحليل لقرار شراء / Design an Analysis Process for a Purchase Decision</h3>
    <div class="ar">🇪🇬 تخيّل إنك عايز تقرر تشتري لابتوب جديد ولا لأ. اكتب على الورق (أو في ملف نصي) الخطوات الست كاملة (سؤال → جمع → تنظيف → تحليل → تصوير → قرار) مطبّقة على القرار ده بالتحديد: إيه بالظبط البيانات اللي هتجمعها (سعر، مواصفات، تقييمات)، وإزاي هتعرف لو فيها بيانات "وسخة" (زي تقييم مزيّف أو سعر قديم)، وإزاي هتوصل لقرار نهائي مبني على أرقام مش على "حس".</div>
    <div class="en">🇬🇧 Imagine deciding whether to buy a new laptop. Write out the full six steps (question → collect → clean → explore → visualize → decide) applied to this exact decision: what data would you gather (price, specs, reviews), how would you spot "dirty" data (like a fake review or outdated price), and how you'd reach a final decision grounded in numbers rather than gut feeling.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 الست خطوات اللي شفتها هنا مش نظرية بس — هي بالظبط الهيكل اللي مبني عليه مشروع التخرج في المسار ده ("مشروع تحليل بيانات كامل"). هناك هتشوف نفس الدورة (تحميل → تنظيف → استكشاف → تصوير → استنتاج) متطبقة بالكامل على بيانات مبيعات حقيقية، بكود Python فعلي في كل خطوة.</div>
    <div class="en">🇬🇧 The six steps you just saw aren't just theory — they're exactly the structure the track's capstone project ("Full Data Analysis Project") is built on. There, you'll see the same cycle (load → clean → explore → visualize → conclude) fully applied to real sales data, with actual Python code at every step.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>تحليل البيانات = تحويل بيانات خام لمعلومة تدعم قرار.</li>
        <li>العملية: سؤال → جمع → تنظيف → تحليل → تصوير → قرار.</li>
        <li>هنستخدم أدوات حقيقية (Python, Pandas, Matplotlib) بتنفيذ فعلي طول المسار.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <span></span>
    <a href="python-for-data.php">المرحلة الجاية / Next: Python وPandas →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
