<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'data-exploration';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'الاستكشاف والتحليل الوصفي';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">المرحلة 4 / Stage 4</span>
<h1>الاستكشاف والتحليل الوصفي <span class="ltr">Exploratory Data Analysis</span></h1>
<p class="subtitle">بعد ما تنضّف البيانات، الخطوة الجاية إنك "تتكلم" معاها — تسأل أسئلة زي "مين أعلى فئة مبيعات؟" وتخليها ترد بالأرقام.</p>

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
    <div class="ar">🇪🇬 تقدر تلخّص أي DataFrame بـ <code>describe()</code>، تعدّ تكرار القيم بـ <code>value_counts()</code>، تجمّع البيانات حسب فئة بـ <code>groupby</code>، ترتّب النتائج بـ <code>sort_values</code>، وتفحص العلاقة بين عمودين رقميين بـ <code>corr()</code>.</div>
    <div class="en">🇬🇧 Summarize any DataFrame with <code>describe()</code>, count value frequencies with <code>value_counts()</code>, group data by category with <code>groupby</code>, order results with <code>sort_values</code>, and check the relationship between two numeric columns with <code>corr()</code>.</div>
</div>

<h2 id="understand">1) نظرة سريعة بـ describe() / Quick Overview with describe()</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <code>df.describe()</code> بيديك ملخص إحصائي فوري لكل الأعمدة الرقمية دفعة واحدة: العدد، المتوسط، الانحراف المعياري، الحد الأدنى والأقصى، والأرباع (25%، 50%، 75%). أول أمر يشغّله أي محلل على بيانات جديدة.</div>
    <div class="en">🇬🇧 <code>df.describe()</code> gives an instant statistical summary of every numeric column at once: count, mean, standard deviation, min/max, and quartiles (25%, 50%, 75%). The first command any analyst runs on new data.</div>
</div>

<pre><code>import pandas as pd

data = {
    "product": ["Laptop", "Mouse", "Keyboard", "Monitor", "Headset", "Webcam", "Laptop", "Mouse"],
    "category": ["Electronics", "Accessories", "Accessories", "Electronics", "Accessories", "Electronics", "Electronics", "Accessories"],
    "price": [750.0, 15.0, 25.0, 200.0, 40.0, 30.0, 720.0, 18.0],
    "units_sold": [10, 150, 90, 25, 60, 45, 8, 130],
}
df = pd.DataFrame(data)
df["revenue"] = df["price"] * df["units_sold"]
print(df)
print()
print("describe():")
print(df.describe())</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">    product     category  price  units_sold  revenue
0    Laptop  Electronics  750.0          10   7500.0
1     Mouse  Accessories   15.0         150   2250.0
2  Keyboard  Accessories   25.0          90   2250.0
3   Monitor  Electronics  200.0          25   5000.0
4   Headset  Accessories   40.0          60   2400.0
5    Webcam  Electronics   30.0          45   1350.0
6    Laptop  Electronics  720.0           8   5760.0
7     Mouse  Accessories   18.0         130   2340.0

describe():
           price  units_sold      revenue
count    8.00000     8.00000     8.000000
mean   224.75000    64.75000  3606.250000
std    320.81893    53.94905  2189.924575
min     15.00000     8.00000  1350.000000
25%     23.25000    21.25000  2250.000000
50%     35.00000    52.50000  2370.000000
75%    330.00000   100.00000  5190.000000
max    750.00000   150.00000  7500.000000</div>

<h2>2) تكرار القيم بـ value_counts() / Counting Frequencies with value_counts()</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <code>df["عمود"].value_counts()</code> بتعدّ كام مرة كل قيمة ظهرت في العمود ده — أسرع طريقة تعرف بيها توزيع فئة نصية (زي "كام منتج في كل فئة؟") من غير ما تحتاج <code>groupby</code> كامل.</div>
    <div class="en">🇬🇧 <code>df["column"].value_counts()</code> counts how many times each value appears in that column — the fastest way to see a categorical distribution (like "how many products per category?") without needing a full <code>groupby</code>.</div>
</div>

<pre><code>print("value_counts of category:")
print(df["category"].value_counts())
print()
print("correlation matrix (numeric columns):")
print(df[["price", "units_sold", "revenue"]].corr())</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">value_counts of category:
category
Electronics    4
Accessories    4
Name: count, dtype: int64

correlation matrix (numeric columns):
               price  units_sold   revenue
price       1.000000   -0.722796  0.926555
units_sold -0.722796    1.000000 -0.692866
revenue     0.926555   -0.692866  1.000000</div>

<div class="bi-block">
    <div class="ar">🇪🇬 <code>df[["price","units_sold","revenue"]].corr()</code> بتحسب <b>معامل الارتباط (Correlation Coefficient)</b> بين كل زوج أعمدة رقمية — قيمة من -1 لـ 1. لاحظ إن <code>price</code> و<code>units_sold</code> علاقتهم <b>-0.72</b> (ارتباط سلبي قوي): كل ما السعر يعلى، الكمية المباعة تقل — منطقي تمامًا. أما <code>price</code> و<code>revenue</code> فعلاقتهم <b>0.93</b> (ارتباط إيجابي قوي جدًا): المنتجات الغالية هي اللي بتجيب أعلى إيراد رغم إنها بتتباع أقل. معامل الارتباط بيوريك اتجاه وقوة العلاقة، لكنه <b>مش دليل على سببية</b> — علاقة قوية مش معناها إن عمود سبب في التاني.</div>
    <div class="en">🇬🇧 <code>df[["price","units_sold","revenue"]].corr()</code> computes the <b>correlation coefficient</b> between every pair of numeric columns — a value from -1 to 1. Notice <code>price</code> and <code>units_sold</code> have <b>-0.72</b> (strong negative correlation): as price rises, units sold falls — perfectly logical. Meanwhile <code>price</code> and <code>revenue</code> have <b>0.93</b> (very strong positive correlation): expensive products bring the highest revenue despite selling fewer units. Correlation shows the direction and strength of a relationship, but it is <b>not proof of causation</b> — a strong relationship doesn't mean one column caused the other.</div>
</div>

<h2 id="practice">💻 3) التجميع بـ groupby / Grouping with groupby</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <code>df.groupby("category")</code> بيقسّم الصفوف حسب قيمة العمود المحدد، وبعدين تقدر تطبّق عملية تجميع (sum، mean، count...) على كل مجموعة. <code>.agg(...)</code> بيدّيك تحكم أدق: كل عمود جديد بيتحسب من عمود وعملية مختلفين مع بعض.</div>
    <div class="en">🇬🇧 <code>df.groupby("category")</code> splits rows by the given column's value, then you apply an aggregation (sum, mean, count...) to each group. <code>.agg(...)</code> gives finer control: each new column is computed from a different source column and operation.</div>
</div>

<pre><code>print("groupby category -> sum revenue & units:")
print(df.groupby("category")[["revenue", "units_sold"]].sum())
print()

print("groupby category -> agg mean price, sum revenue, count:")
summary = df.groupby("category").agg(
    avg_price=("price", "mean"),
    total_revenue=("revenue", "sum"),
    num_products=("product", "count"),
)
print(summary)
print()

print("sort_values by revenue descending:")
print(df.sort_values("revenue", ascending=False)[["product", "revenue"]])</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">groupby category -> sum revenue & units:
             revenue  units_sold
category
Accessories   9240.0         430
Electronics  19610.0          88

groupby category -> agg mean price, sum revenue, count:
             avg_price  total_revenue  num_products
category
Accessories       24.5         9240.0             4
Electronics      425.0        19610.0             4

sort_values by revenue descending:
    product  revenue
0    Laptop   7500.0
6    Laptop   5760.0
3   Monitor   5000.0
4   Headset   2400.0
7     Mouse   2340.0
1     Mouse   2250.0
2  Keyboard   2250.0
5    Webcam   1350.0</div>

<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ التناقض المثير: <b>Electronics</b> باعت وحدات أقل بكتير (88 مقابل 430) بس جابت إيراد أعلى تقريبًا الضعف (19610 مقابل 9240) — لأن سعر القطعة أعلى بكتير. ده بالظبط نوع الاستنتاج اللي groupby بيكشفه بسرعة، ونفس الاستنتاج اللي شفناه فوق في مصفوفة الارتباط.</div>
    <div class="en">🇬🇧 Notice the interesting contrast: <b>Electronics</b> sold far fewer units (88 vs 430) but brought in almost double the revenue (19610 vs 9240) — because the per-item price is much higher. That's exactly the kind of insight groupby surfaces quickly, and the same conclusion we saw above in the correlation matrix.</div>
</div>

<div class="bi-block">
    <div class="ar">🇪🇬 جرّب بنفسك — غيّر عمود التجميع من <code>"category"</code> لـ <code>"product"</code> وشوف الفرق في الملخص:</div>
    <div class="en">🇬🇧 Try it yourself — change the grouping column from <code>"category"</code> to <code>"product"</code> and see the difference in the summary:</div>
</div>

<div class="mini-editor-wrap">
    <textarea spellcheck="false">import pandas as pd

data = {
    "product": ["Laptop", "Mouse", "Keyboard", "Monitor", "Headset", "Webcam", "Laptop", "Mouse"],
    "category": ["Electronics", "Accessories", "Accessories", "Electronics", "Accessories", "Electronics", "Electronics", "Accessories"],
    "price": [750.0, 15.0, 25.0, 200.0, 40.0, 30.0, 720.0, 18.0],
    "units_sold": [10, 150, 90, 25, 60, 45, 8, 130],
}
df = pd.DataFrame(data)
df["revenue"] = df["price"] * df["units_sold"]

print("value_counts of category:")
print(df["category"].value_counts())
print()
print("correlation matrix (numeric columns):")
print(df[["price", "units_sold", "revenue"]].corr())</textarea>
    <div class="mini-toolbar">
        <button class="mini-run-btn">▶ شغّل / Run</button>
        <span class="mini-status"></span>
    </div>
    <div class="output-box">— لسه متشغلش / not run yet —</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="value_counts">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">إيه أسرع طريقة تعرف بيها كام مرة كل فئة اتكررت في عمود نصي؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What's the fastest way to see how many times each category repeats in a text column?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="describe"> df.describe()</label>
        <label><input type="radio" name="q1" value="value_counts"> df["عمود"].value_counts()</label>
        <label><input type="radio" name="q1" value="corr"> df.corr()</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="causation">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">لو معامل الارتباط بين عمودين كان 0.93، إيه اللي مينفعش تستنتجه؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">If the correlation coefficient between two columns is 0.93, what can't you conclude?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="strong"> إن فيه علاقة قوية بينهم / That there's a strong relationship</label>
        <label><input type="radio" name="q2" value="causation"> إن عمود سبب في التاني بالتأكيد / That one column definitely causes the other</label>
        <label><input type="radio" name="q2" value="positive"> إن العلاقة موجبة (بيزيدوا مع بعض) / That the relationship is positive</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ استكشف بيانات طلاب / Explore a Students Dataset</h3>
    <div class="ar">🇪🇬 في المحرر المصغّر فوق (أو <a href="../playground/index.php">الـ Playground</a>)، اعمل DataFrame لـ 8 طلاب بأعمدة (اسم، ساعات_مذاكرة، الدرجة). استخدم <code>.corr()</code> عشان تشوف قوة العلاقة بين ساعات المذاكرة والدرجة، واستخدم <code>value_counts()</code> على عمود جديد <code>تقدير</code> ("ممتاز"/"جيد"/"مقبول") تحسبه بنفسك من الدرجة.</div>
    <div class="en">🇬🇧 In the mini editor above (or the <a href="../playground/index.php">Playground</a>), build a DataFrame for 8 students with columns (name, hours_studied, score). Use <code>.corr()</code> to see how strongly study hours relate to score, and use <code>value_counts()</code> on a new <code>grade</code> column ("Excellent"/"Good"/"Pass") you compute yourself from the score.</div>
</div>

<div class="exercise-box">
    <h3>✍️ تمرين إضافي / Extra Exercise</h3>
    <div class="ar">🇪🇬 افتح <a href="../playground/index.php">محرر الكود</a> واعمل DataFrame لمصروفات شهرية بأعمدة (فئة: "أكل"/"مواصلات"/"ترفيه"، مبلغ). استخدم <code>groupby</code> عشان تعرف مجموع المصروفات لكل فئة، ورتّبها تنازليًا بـ <code>sort_values</code>.</div>
    <div class="en">🇬🇧 In the <a href="../playground/index.php">Playground</a>, create a DataFrame of monthly expenses with columns (category: "food"/"transport"/"entertainment", amount). Use <code>groupby</code> to find the total spent per category, and sort it descending with <code>sort_values</code>.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 مشروع التخرج بيستخدم <code>describe()</code> و<code>groupby().agg(...)</code> و<code>sort_values</code> بالظبط زي ما اتعلمتهم هنا، عشان يوصل لإجابة سؤال العميل: "أي منتج بيجيب أكبر إيراد؟" — هتشوف نفس الأنماط، بس على بيانات مبيعات كافيه حقيقية.</div>
    <div class="en">🇬🇧 The capstone project uses <code>describe()</code>, <code>groupby().agg(...)</code>, and <code>sort_values</code> exactly as you learned here, to answer the client's question: "which product brings in the most revenue?" — you'll see the same patterns, applied to real coffee-shop sales data.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li><code>df.describe()</code> = ملخص إحصائي فوري لكل الأعمدة الرقمية.</li>
        <li><code>df["عمود"].value_counts()</code> = عدد تكرار كل قيمة في عمود نصي.</li>
        <li><code>df.groupby("عمود").sum()/.mean()/.count()</code> = تجميع حسب فئة، و<code>.agg(...)</code> = تجميعات متعددة ومسمّاة في نفس الوقت.</li>
        <li><code>df.sort_values("عمود", ascending=False)</code> = ترتيب تنازلي.</li>
        <li><code>df[[أعمدة]].corr()</code> = قوة واتجاه العلاقة بين أعمدة رقمية (من -1 لـ 1) — لكنها مش دليل على سببية.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="data-cleaning.php">← المرحلة السابقة</a>
    <a href="data-visualization.php">المرحلة الجاية / Next: تصور البيانات →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
