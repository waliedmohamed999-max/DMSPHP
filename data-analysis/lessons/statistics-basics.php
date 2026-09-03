<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'statistics-basics';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'أساسيات الإحصاء';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">المرحلة 7 / Stage 7</span>
<h1>أساسيات الإحصاء <span class="ltr">Statistics Basics</span></h1>
<p class="subtitle">المتوسط لوحده ممكن يخدعك. لازم تعرف كمان "إحصاء التشتت" — إزاي البيانات موزّعة حوالين المتوسط ده، وإزاي قيمة متطرفة واحدة ممكن تشوّهه بالكامل.</p>

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
    <div class="ar">🇪🇬 تحسب المتوسط والوسيط والمنوال والانحراف المعياري يدويًا لفهم المنطق، وبعدين بـ <code>statistics</code> و<code>pandas</code>، وتفهم ليه الانحراف المعياري مهم جدًا في تفسير البيانات، وليه القيم المتطرفة (Outliers) بتأثر على المتوسط أكتر بكتير من الوسيط.</div>
    <div class="en">🇬🇧 Compute mean, median, mode, and standard deviation manually to build intuition, then with <code>statistics</code> and <code>pandas</code>, understand why standard deviation matters for interpreting data, and why extreme values (outliers) affect the mean far more than the median.</div>
</div>

<h2 id="understand">1) المتوسط والوسيط والمنوال / Mean, Median, and Mode</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>المتوسط (Mean)</b> = مجموع القيم ÷ عددها. <b>الوسيط (Median)</b> = القيمة النصية لما ترتب البيانات (أو متوسط أوسط قيمتين لو العدد زوجي). <b>المنوال (Mode)</b> = القيمة الأكتر تكرارًا. هنحسبهم الأول يدويًا على درجات 10 طلاب.</div>
    <div class="en">🇬🇧 <b>Mean</b> = sum of values ÷ count. <b>Median</b> = the middle value once sorted (or the average of the two middle values if the count is even). <b>Mode</b> = the most frequent value. Let's compute them manually first on 10 students' scores.</div>
</div>

<pre><code>scores = [55, 60, 62, 65, 70, 70, 72, 78, 90, 95]

n = len(scores)
manual_mean = sum(scores) / n
print("Manual mean:", manual_mean)

sorted_scores = sorted(scores)
mid = n // 2
manual_median = (sorted_scores[mid - 1] + sorted_scores[mid]) / 2
print("Manual median:", manual_median)

manual_variance = sum((x - manual_mean) ** 2 for x in scores) / n
manual_std = manual_variance ** 0.5
print("Manual variance (population):", manual_variance)
print("Manual std dev (population):", manual_std)</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">Manual mean: 71.7
Manual median: 70.0
Manual variance (population): 147.81
Manual std dev (population): 12.157713600837948</div>

<div class="bi-block">
    <div class="ar">🇪🇬 <b>Variance (التباين)</b> هو متوسط مربع الفرق بين كل قيمة والمتوسط. بنرفعه تربيع عشان الفروق السالبة ما تلغيش الموجبة. <b>Standard Deviation (الانحراف المعياري)</b> هو جذر التباين — بيرجعنا لنفس وحدة القياس الأصلية (درجة، جنيه، إلخ) عشان يبقى قابل للتفسير.</div>
    <div class="en">🇬🇧 <b>Variance</b> is the average squared difference between each value and the mean — squaring prevents negative differences from cancelling positive ones. <b>Standard deviation</b> is the square root of variance, bringing it back to the original unit (score, dollars, etc.) so it's interpretable.</div>
</div>

<h2>2) بنفس الحسابات جاهزة / The Same Calculations, Built-in</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 مفيش داعي تحسب كل ده يدويًا في الشغل الفعلي — Python فيها موديول <code>statistics</code> مدمج، وPandas بتوفّر نفس الحاجة كـ methods على أي عمود. لاحظ إن <code>statistics.stdev</code> و<code>pandas.std()</code> بيستخدموا <b>sample</b> std dev (تقسيم على n-1) مش population std dev (تقسيم على n) — عشان كده القيمة مختلفة شوية عن حسابنا اليدوي فوق.</div>
    <div class="en">🇬🇧 You don't need to compute all this manually at work — Python has a built-in <code>statistics</code> module, and Pandas offers the same as methods on any column. Note that <code>statistics.stdev</code> and <code>pandas.std()</code> use <b>sample</b> std dev (divide by n-1), not population std dev (divide by n) — that's why the value differs slightly from our manual calculation above.</div>
</div>

<pre><code>import statistics as st
print("statistics.mean:", st.mean(scores))
print("statistics.median:", st.median(scores))
print("statistics.mode:", st.mode(scores))
print("statistics.pstdev (population):", st.pstdev(scores))
print("statistics.stdev (sample):", st.stdev(scores))

import pandas as pd
s = pd.Series(scores)
print("pandas mean:", s.mean())
print("pandas median:", s.median())
print("pandas std (sample, ddof=1):", s.std())
print("pandas describe():")
print(s.describe())</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">statistics.mean: 71.7
statistics.median: 70.0
statistics.mode: 70
statistics.pstdev (population): 12.157713600837948
statistics.stdev (sample): 12.815355372885035

pandas mean: 71.7
pandas median: 70.0
pandas std (sample, ddof=1): 12.815355372885035
pandas describe():
count    10.000000
mean     71.700000
std      12.815355
min      55.000000
25%      62.750000
50%      70.000000
75%      76.500000
max      95.000000
dtype: float64</div>

<h2>3) ليه الانحراف المعياري مهم؟ / Why Standard Deviation Matters</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 خد فريقين درجاتهم متوسطها متطابق تمامًا (71) — بس شوف الفرق في الانحراف المعياري. الفريق الأول ثابت جدًا حوالين المتوسط، والفريق التاني متذبذب جدًا. لو حكمت بس بالمتوسط، هتفتكر إن الفريقين "نفس الأداء" — وده غلط تمامًا.</div>
    <div class="en">🇬🇧 Take two teams whose score means are exactly identical (71) — but look at the standard deviation difference. Team A is very consistent around the mean, while Team B swings wildly. If you judged only by the mean, you'd think both teams "perform the same" — which is completely wrong.</div>
</div>

<pre><code>import statistics as st

team_a = [68, 70, 71, 72, 74]   # consistent
team_b = [40, 55, 71, 88, 101]  # inconsistent

print("Team A mean:", st.mean(team_a))
print("Team A std dev (population):", st.pstdev(team_a))
print()
print("Team B mean:", st.mean(team_b))
print("Team B std dev (population):", st.pstdev(team_b))</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">Team A mean: 71
Team A std dev (population): 2.0

Team B mean: 71
Team B std dev (population): 21.93627133311402</div>

<div class="bi-block">
    <div class="ar">🇪🇬 الفريق A انحرافه المعياري 2 بس — يعني كل الدرجات قريبة جدًا من 71. الفريق B انحرافه 21.9 تقريبًا — يعني في تشتت كبير (درجات من 40 لـ 101). القرار العملي: الفريق A أداؤه <b>موثوق ومتوقع</b>، والفريق B أداؤه <b>غير مستقر</b> حتى لو المتوسط واحد. ده بالظبط السبب في إن محلل البيانات محترف ميحكمش بالمتوسط لوحده أبدًا.</div>
    <div class="en">🇬🇧 Team A's std dev is just 2 — meaning every score is very close to 71. Team B's is about 21.9 — a huge spread (scores from 40 to 101). The practical takeaway: Team A's performance is <b>reliable and predictable</b>, while Team B's is <b>volatile</b>, even though the mean is identical. This is exactly why a professional data analyst never judges by the mean alone.</div>
</div>

<h2 id="practice">💻 4) القيم المتطرفة: المتوسط مقابل الوسيط / Outliers: Mean vs Median</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 مشكلة تانية غير التشتت: قيمة متطرفة واحدة بس (Outlier) ممكن "تسحب" المتوسط بعيد خالص عن الصورة الحقيقية لباقي البيانات، بينما الوسيط بيفضل شبه ثابت لأنه مش بيهتم إلا بترتيب القيم. المثال الكلاسيكي: راتب مدير تنفيذي واحد وسط رواتب موظفين عاديين.</div>
    <div class="en">🇬🇧 A different problem from spread: a single extreme value (an outlier) can "pull" the mean far away from the real picture of the rest of the data, while the median stays nearly unchanged because it only cares about the order of values. The classic example: one executive's salary among a group of regular employee salaries.</div>
</div>

<pre><code>import statistics as st

salaries = [4000, 4200, 4100, 4300, 4150, 4400, 50000]

print("Mean with outlier:", st.mean(salaries))
print("Median with outlier:", st.median(salaries))

salaries_no_outlier = salaries[:-1]
print()
print("Mean without outlier:", st.mean(salaries_no_outlier))
print("Median without outlier:", st.median(salaries_no_outlier))</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">Mean with outlier: 10735.714285714286
Median with outlier: 4200

Mean without outlier: 4191.666666666667
Median without outlier: 4175.0</div>

<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ الفرق الضخم: المتوسط قفز من ~4192 لـ ~10736 (زيادة أكتر من الضعف!) بمجرد إضافة راتب واحد متطرف، بينما الوسيط فضل تقريبًا نفسه (4175 مقابل 4200) — لأنه مش بيتأثر إلا بموقع القيمة في الترتيب مش بحجمها. لو قلت لصاحب الشركة "متوسط الرواتب 10736 جنيه"، الرقم ده مضلّل تمامًا ومبيمثلش أي موظف حقيقي في الجدول. الوسيط هنا تمثيل أصدق بكتير للـ"موظف النموذجي".</div>
    <div class="en">🇬🇧 Notice the huge difference: the mean jumped from ~4192 to ~10736 (more than double!) just by adding one extreme salary, while the median stayed almost the same (4175 vs 4200) — because it only cares about a value's position in the order, not its size. If you told the company owner "the average salary is 10736," that number would be completely misleading and wouldn't represent any real employee in the table. The median here is a far more honest representation of the "typical employee."</div>
</div>

<div class="bi-block">
    <div class="ar">🇪🇬 جرّب بنفسك — غيّر قيمة الراتب المتطرف (زودها أو قلّلها) وشوف إزاي المتوسط بيتحرك بعنف بينما الوسيط بالكاد بيتحرك:</div>
    <div class="en">🇬🇧 Try it yourself — change the extreme salary's value (raise or lower it) and see how violently the mean moves while the median barely budges:</div>
</div>

<div class="mini-editor-wrap">
    <textarea spellcheck="false">import statistics as st

salaries = [4000, 4200, 4100, 4300, 4150, 4400, 50000]

print("Mean with outlier:", st.mean(salaries))
print("Median with outlier:", st.median(salaries))

salaries_no_outlier = salaries[:-1]
print()
print("Mean without outlier:", st.mean(salaries_no_outlier))
print("Median without outlier:", st.median(salaries_no_outlier))</textarea>
    <div class="mini-toolbar">
        <button class="mini-run-btn">▶ شغّل / Run</button>
        <span class="mini-status"></span>
    </div>
    <div class="output-box">— لسه متشغلش / not run yet —</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="mean">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">أي مقياس بيتأثر أكتر بقيمة متطرفة واحدة (Outlier)؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Which measure is more affected by a single outlier?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="mean"> المتوسط / The mean</label>
        <label><input type="radio" name="q1" value="median"> الوسيط / The median</label>
        <label><input type="radio" name="q1" value="both"> الاتنين بنفس القدر / Both equally</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="ddof1">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">إيه الفرق بين <code>statistics.pstdev</code> و<code>statistics.stdev</code>؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What's the difference between <code>statistics.pstdev</code> and <code>statistics.stdev</code>?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="ddof1"> stdev بتقسم على n-1 (عينة)، pstdev بتقسم على n (مجتمع) / stdev divides by n-1 (sample), pstdev by n (population)</label>
        <label><input type="radio" name="q2" value="same"> مفيش فرق، نفس الناتج دايمًا / No difference, always the same result</label>
        <label><input type="radio" name="q2" value="mean"> stdev بتحسب المتوسط، pstdev بتحسب الوسيط / stdev computes the mean, pstdev computes the median</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ افحص أسعار عقارات فيها قيمة شاذة / Audit House Prices with an Outlier</h3>
    <div class="ar">🇪🇬 في المحرر المصغّر فوق (أو <a href="../playground/index.php">الـ Playground</a>)، اعمل قائمة أسعار لـ 7 شقق في نفس الحي، خليهم كلهم متقاربين ماعدا شقة واحدة "قصر" بسعر أعلى بكتير من الباقي. احسب المتوسط والوسيط للقائمة كاملة، وبعدين بدون القصر، واكتب جملة توضّح أنهي مقياس (متوسط أو وسيط) يمثّل "سعر الشقة النموذجي في الحي" بشكل أصدق.</div>
    <div class="en">🇬🇧 In the mini editor above (or the <a href="../playground/index.php">Playground</a>), create a list of prices for 7 apartments in the same neighborhood, keeping them all close except for one "mansion" priced far higher than the rest. Compute the mean and median for the full list, then without the mansion, and write a sentence explaining which measure (mean or median) more honestly represents "the typical apartment price in the neighborhood."</div>
</div>

<div class="exercise-box">
    <h3>✍️ تمرين إضافي / Extra Exercise</h3>
    <div class="ar">🇪🇬 افتح <a href="../playground/index.php">محرر الكود</a> واعمل قائمتين بدرجات حرارة أسبوعين مختلفين بنفس المتوسط لكن تشتت مختلف. احسب المتوسط والانحراف المعياري لكل قائمة بـ <code>statistics</code> واكتب جملة توضّح الفرق العملي بينهم.</div>
    <div class="en">🇬🇧 In the <a href="../playground/index.php">Playground</a>, create two lists of temperatures for two different weeks with the same mean but different spread. Compute the mean and standard deviation for each with <code>statistics</code> and write a sentence explaining the practical difference between them.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 مشروع التخرج بيستخدم بالظبط نفس الفكرة: عوّضنا القيم الناقصة في عمود الكمية بـ <code>median()</code> مش <code>mean()</code> — قرار مبني مباشرة على اللي اتعلمته هنا، إن الوسيط أكتر أمانًا لو فيه احتمال وجود قيم متطرفة في البيانات.</div>
    <div class="en">🇬🇧 The capstone project uses exactly this idea: we filled missing values in the quantity column with <code>median()</code> rather than <code>mean()</code> — a decision built directly on what you learned here, that the median is safer when outliers might exist in the data.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>المتوسط = مجموع ÷ عدد. الوسيط = القيمة النصية. المنوال = الأكتر تكرارًا.</li>
        <li>الانحراف المعياري بيقيس مدى تشتت البيانات حوالين المتوسط.</li>
        <li><code>statistics.pstdev</code> = انحراف المجتمع (÷n)، <code>statistics.stdev</code> و<code>pandas.std()</code> = انحراف العينة (÷n-1).</li>
        <li>متوسطان متطابقان ممكن يخفوا فرق ضخم في التشتت — دايمًا افحص الانحراف المعياري.</li>
        <li>قيمة متطرفة واحدة بتشوّه المتوسط بشدة، لكن بالكاد بتأثر على الوسيط — لكده الوسيط أحيانًا أصدق تمثيلًا للبيانات "النموذجية".</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="sql-for-analysis.php">← المرحلة السابقة</a>
    <a href="capstone-analysis.php">المرحلة الجاية / Next: مشروع تحليل بيانات كامل →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
