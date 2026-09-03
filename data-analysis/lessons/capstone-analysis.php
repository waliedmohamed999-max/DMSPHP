<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'capstone-analysis';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'مشروع تحليل بيانات كامل';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">المرحلة 8 / Stage 8</span>
<h1>مشروع تحليل بيانات كامل <span class="ltr">Capstone Data Analysis Project</span></h1>
<p class="subtitle">دلوقتي هنطبّق كل حاجة اتعلمناها في مسار واحد كامل: من بيانات خام لغاية استنتاج مبني على دليل — بالظبط زي ما بيحصل في الشغل الفعلي.</p>

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
    <div class="ar">🇪🇬 تشوف وتطبّق دورة تحليل بيانات كاملة: تحميل → تنظيف → استكشاف → تصوير → إحصاء → استنتاج، على بيانات مبيعات كافيه صغيرة — بتطبيق كل مفهوم اتعلمته في المسار ده في قصة واحدة متصلة.</div>
    <div class="en">🇬🇧 See and apply a full data-analysis cycle: load → clean → explore → visualize → measure → conclude, on a small coffee-shop sales dataset — applying every concept you learned in this track in one connected story.</div>
</div>

<h2 id="understand">السيناريو / The Scenario</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 عندك بيانات مبيعات كافيه صغير لمدة أسبوعين: اليوم، المنتج، السعر، والكمية المباعة. صاحب الكافيه عايز يعرف: <b>أي منتج بيجيب أكبر إيراد؟</b> البيانات — زي أي بيانات حقيقية — فيها قيم ناقصة وصفوف مكررة.</div>
    <div class="en">🇬🇧 You have two weeks of a small coffee shop's sales data: day, product, price, and quantity sold. The owner wants to know: <b>which product brings in the most revenue?</b> The data — like any real data — has missing values and duplicate rows.</div>
</div>

<h2 id="practice">💻 1) تحميل البيانات / Load</h2>
<pre><code>import pandas as pd
import numpy as np

data = {
    "day": ["Mon", "Mon", "Tue", "Tue", "Wed", "Wed", "Thu", "Thu", "Fri", "Fri",
            "Sat", "Sat", "Sun", "Sun", "Mon", "Tue", "Sat", "Sat"],
    "product": ["Coffee", "Croissant", "Coffee", "Tea", "Coffee", "Croissant",
                "Tea", "Coffee", "Coffee", "Croissant", "Coffee", "Tea",
                "Coffee", "Croissant", "Coffee", "Coffee", "Coffee", "Coffee"],
    "price": [3.5, 2.5, 3.5, 3.0, 3.5, 2.5, 3.0, 3.5, 3.5, 2.5, 3.5, 3.0, 3.5, 2.5, 3.5, 3.5, 3.5, 3.5],
    "quantity": [40, 25, np.nan, 18, 45, 22, 15, 50, 60, 30, 70, 20, 35, np.nan, 42, 38, 70, 70],
}
df = pd.DataFrame(data)
print(df)
print("Shape:", df.shape)</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">    day    product  price  quantity
0   Mon     Coffee    3.5      40.0
1   Mon  Croissant    2.5      25.0
2   Tue     Coffee    3.5       NaN
3   Tue        Tea    3.0      18.0
4   Wed     Coffee    3.5      45.0
5   Wed  Croissant    2.5      22.0
6   Thu        Tea    3.0      15.0
7   Thu     Coffee    3.5      50.0
8   Fri     Coffee    3.5      60.0
9   Fri  Croissant    2.5      30.0
10  Sat     Coffee    3.5      70.0
11  Sat        Tea    3.0      20.0
12  Sun     Coffee    3.5      35.0
13  Sun  Croissant    2.5       NaN
14  Mon     Coffee    3.5      42.0
15  Tue     Coffee    3.5      38.0
16  Sat     Coffee    3.5      70.0
17  Sat     Coffee    3.5      70.0
Shape: (18, 4)</div>

<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ فيه قيمتين ناقصتين في عمود <code>quantity</code> (الصفين 2 و13)، وثلاث صفوف متطابقة تمامًا يوم السبت لمنتج Coffee (الصفوف 10، 16، 17) — دي بالظبط المشاكل اللي هنتعامل معاها في خطوة التنظيف.</div>
    <div class="en">🇬🇧 Notice two missing values in the <code>quantity</code> column (rows 2 and 13), and three fully identical rows on Saturday for Coffee (rows 10, 16, 17) — exactly the problems we'll handle in the cleaning step.</div>
</div>

<h2>2) تنظيف البيانات / Clean</h2>
<pre><code>print("Missing values per column:")
print(df.isna().sum())
print("Duplicated rows:", df.duplicated().sum())

df["quantity"] = df["quantity"].fillna(df["quantity"].median())
df = df.drop_duplicates().reset_index(drop=True)
print("After fillna(median) and drop_duplicates, shape:", df.shape)

df["revenue"] = df["price"] * df["quantity"]</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">Missing values per column:
day         0
product     0
price       0
quantity    2
dtype: int64
Duplicated rows: 2

After fillna(median) and drop_duplicates, shape: (16, 4)</div>

<div class="bi-block">
    <div class="ar">🇪🇬 عوّضنا الكميات الناقصة بالوسيط (أكثر أمانًا من المتوسط لو فيه قيم متطرفة)، وشلنا الصفوف المكررة (رجع العدد من 18 لـ 16 صف). دلوقتي البيانات جاهزة للاستكشاف.</div>
    <div class="en">🇬🇧 We filled missing quantities with the median (safer than the mean when outliers exist), and removed duplicate rows (count dropped from 18 to 16). The data is now ready for exploration.</div>
</div>

<h2>3) الاستكشاف والتجميع / Explore &amp; Aggregate</h2>
<pre><code>print(df.describe())
summary = df.groupby("product").agg(
    total_revenue=("revenue", "sum"),
    total_quantity=("quantity", "sum"),
    avg_price=("price", "mean"),
).sort_values("total_revenue", ascending=False)
print(summary)</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">           price   quantity     revenue
count  16.000000  16.000000   16.000000
mean    3.156250  36.750000  119.718750
std     0.436606  15.163553   59.651758
min     2.500000  15.000000   45.000000
25%     2.875000  24.250000   61.875000
50%     3.500000  38.500000  127.750000
75%     3.500000  42.750000  149.625000
max     3.500000  70.000000  245.000000

           total_revenue  total_quantity  avg_price
product
Coffee            1466.5           419.0        3.5
Croissant          290.0           116.0        2.5
Tea                159.0            53.0        3.0</div>

<h2>4) التصوير البياني / Visualize</h2>
<pre><code>import matplotlib
matplotlib.use("Agg")
import matplotlib.pyplot as plt

summary_rev = df.groupby("product")["revenue"].sum().sort_values(ascending=False)

plt.figure(figsize=(6, 4), dpi=80)
plt.bar(summary_rev.index, summary_rev.values, color=["#7c9cff", "#62d9a8", "#ff6b6b"])
plt.title("Total Revenue by Product")
plt.xlabel("Product")
plt.ylabel("Revenue ($)")
plt.tight_layout()
plt.savefig("cap_chart.png")</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<img class="render-box" alt="Bar chart of total revenue by product: Coffee, Croissant, Tea" src="data:image/png;base64,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">

<h2>5) الإحصاء: هل الإيراد اليومي مستقر؟ / Statistics: Is Daily Revenue Stable?</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 الرسم البياني وريّنا مين المنتج المسيطر، بس مسؤولية المحلل ماتوقفش هنا — لازم كمان يعرف: هل الإيراد اليومي ثابت ولا متذبذب؟ هنا بنرجع لمفاهيم مرحلة "أساسيات الإحصاء": نجمع الإيراد لكل يوم بـ <code>groupby</code>، ونحسب المتوسط والوسيط والانحراف المعياري عليه.</div>
    <div class="en">🇬🇧 The chart showed us the dominant product, but the analyst's job doesn't stop there — we also need to know: is daily revenue stable or volatile? Here we return to the "Statistics Basics" concepts: group revenue per day with <code>groupby</code>, then compute the mean, median, and standard deviation over it.</div>
</div>

<pre><code>daily_revenue = df.groupby("day")["revenue"].sum()
print(daily_revenue)
print()
print("Mean daily revenue:", round(daily_revenue.mean(), 2))
print("Median daily revenue:", round(daily_revenue.median(), 2))
print("Std dev of daily revenue:", round(daily_revenue.std(), 2))</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">day
Fri    285.0
Mon    349.5
Sat    305.0
Sun    220.0
Thu    220.0
Tue    323.5
Wed    212.5
Name: revenue, dtype: float64

Mean daily revenue: 273.64
Median daily revenue: 285.0
Std dev of daily revenue: 56.04</div>

<div class="bi-block">
    <div class="ar">🇪🇬 المتوسط (273.64) والوسيط (285.0) قريبين من بعض — مؤشر إن مفيش يوم متطرف بيشوّه الصورة. والانحراف المعياري (56.04) نسبةً للمتوسط يعتبر معقول (حوالي 20%)، يعني الإيراد اليومي متذبذب شوية لكن مش بشكل خطير أو غير متوقع. لو كان الانحراف المعياري ضخم بالمقارنة بالمتوسط، كان ده إنذار إن في أيام أداؤها ضعيف جدًا محتاجة تحقيق منفصل — بالظبط زي فريق B في مثال مرحلة الإحصاء.</div>
    <div class="en">🇬🇧 The mean (273.64) and median (285.0) are close to each other — a sign no single extreme day is distorting the picture. The standard deviation (56.04) relative to the mean is reasonable (about 20%), meaning daily revenue fluctuates somewhat but not alarmingly or unpredictably. If the standard deviation were huge relative to the mean, that would flag days performing very poorly that need separate investigation — exactly like Team B in the Statistics lesson's example.</div>
</div>

<div class="bi-block">
    <div class="ar">🇪🇬 جرّب بنفسك — شغّل الكود ده على البيانات بعد التنظيف وشوف إزاي القيم بتتغيّر لو غيّرت الكمية المباعة يوم معين:</div>
    <div class="en">🇬🇧 Try it yourself — run this on the cleaned data and see how the values change if you edit the quantity sold on a given day:</div>
</div>

<div class="mini-editor-wrap">
    <textarea spellcheck="false">import pandas as pd
import numpy as np

data = {
    "day": ["Mon", "Mon", "Tue", "Tue", "Wed", "Wed", "Thu", "Thu", "Fri", "Fri",
            "Sat", "Sat", "Sun", "Sun", "Mon", "Tue", "Sat", "Sat"],
    "product": ["Coffee", "Croissant", "Coffee", "Tea", "Coffee", "Croissant",
                "Tea", "Coffee", "Coffee", "Croissant", "Coffee", "Tea",
                "Coffee", "Croissant", "Coffee", "Coffee", "Coffee", "Coffee"],
    "price": [3.5, 2.5, 3.5, 3.0, 3.5, 2.5, 3.0, 3.5, 3.5, 2.5, 3.5, 3.0, 3.5, 2.5, 3.5, 3.5, 3.5, 3.5],
    "quantity": [40, 25, np.nan, 18, 45, 22, 15, 50, 60, 30, 70, 20, 35, np.nan, 42, 38, 70, 70],
}
df = pd.DataFrame(data)
df["quantity"] = df["quantity"].fillna(df["quantity"].median())
df = df.drop_duplicates().reset_index(drop=True)
df["revenue"] = df["price"] * df["quantity"]

daily_revenue = df.groupby("day")["revenue"].sum()
print(daily_revenue)
print()
print("Mean daily revenue:", round(daily_revenue.mean(), 2))
print("Median daily revenue:", round(daily_revenue.median(), 2))
print("Std dev of daily revenue:", round(daily_revenue.std(), 2))</textarea>
    <div class="mini-toolbar">
        <button class="mini-run-btn">▶ شغّل / Run</button>
        <span class="mini-status"></span>
    </div>
    <div class="output-box">— لسه متشغلش / not run yet —</div>
</div>

<h2>6) الاستنتاج / Conclusion</h2>
<div class="recap-box">
    <h3>📌 استنتاج مبني على البيانات / Data-Driven Conclusion</h3>
    <div class="ar">🇪🇬 <b>Coffee</b> هو المنتج المسيطر: جاب 1466.5 دولار (حوالي 76% من إجمالي الإيراد) و419 وحدة مباعة — بفارق كبير عن Croissant (290 دولار) وTea (159 دولار). التوصية العملية: التركيز التسويقي والمخزون لازم يكون على Coffee، وممكن يتفكر في عروض على Croissant وTea لرفع مبيعاتهم بدل ما يفضلوا في الترتيب الأخير.</div>
    <div class="en">🇬🇧 <b>Coffee</b> is the dominant product: it brought in $1466.5 (about 76% of total revenue) across 419 units sold — far ahead of Croissant ($290) and Tea ($159). The practical recommendation: marketing focus and inventory should prioritize Coffee, while considering promotions on Croissant and Tea to lift their sales instead of leaving them at the bottom.</div>
</div>

<div class="exercise-box">
    <h3>✍️ تمرين عملي / Hands-on Exercise</h3>
    <div class="ar">🇪🇬 افتح <a href="../playground/index.php">محرر الكود</a> وطبّق نفس الدورة (تحميل → تنظيف → استكشاف → تصوير → استنتاج) على بيانات مختلفة من عندك — زي مصروفاتك الشخصية لشهر، أو درجات مادة دراسية. اكتب في الآخر جملة استنتاج واحدة مبنية على الأرقام الفعلية.</div>
    <div class="en">🇬🇧 In the <a href="../playground/index.php">Playground</a>, apply the same cycle (load → clean → explore → visualize → conclude) to your own different data — like a month of personal expenses, or grades in a subject. Finish with one conclusion sentence grounded in the actual numbers.</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="median">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">ليه استخدمنا <code>median()</code> مش <code>mean()</code> لتعويض الكمية الناقصة في خطوة التنظيف؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Why did we use <code>median()</code> instead of <code>mean()</code> to fill the missing quantity in the cleaning step?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="median"> أكثر أمانًا لو فيه قيم متطرفة محتملة / Safer if outliers might exist</label>
        <label><input type="radio" name="q1" value="faster"> لأنه أسرع في الحساب / Because it's faster to compute</label>
        <label><input type="radio" name="q1" value="random"> مفيش سبب محدد / No particular reason</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="coffee">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">حسب التحليل الكامل، أنهي منتج المفروض ياخد أولوية في التسويق والمخزون؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Based on the full analysis, which product should get priority in marketing and inventory?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="coffee"> Coffee</label>
        <label><input type="radio" name="q2" value="croissant"> Croissant</label>
        <label><input type="radio" name="q2" value="tea"> Tea</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ حلّل يوم إضافي / Analyze One More Day</h3>
    <div class="ar">🇪🇬 في المحرر المصغّر فوق (أو <a href="../playground/index.php">الـ Playground</a>)، ضيف يوم "Sun" تاني ببيانات مبيعات ضعيفة جدًا (زي كمية 2 بس) لعمل يوم متطرف بشكل متعمد. أعد حساب المتوسط والوسيط والانحراف المعياري للإيراد اليومي، واكتب جملة توضّح إزاي الانحراف المعياري ارتفع بشكل ملحوظ بسبب اليوم الشاذ ده — بالظبط زي مبدأ القيم المتطرفة اللي اتعلمته في مرحلة الإحصاء.</div>
    <div class="en">🇬🇧 In the mini editor above (or the <a href="../playground/index.php">Playground</a>), add another "Sun" entry with very weak sales (like quantity 2) to deliberately create an outlier day. Recompute the mean, median, and standard deviation of daily revenue, and write a sentence explaining how the standard deviation rose noticeably because of this anomalous day — exactly the outlier principle you learned in the Statistics lesson.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 المشروع ده مش خطوة إضافية بعد المسار — هو <b>القالب</b> اللي المفروض تبني عليه أول مشروع بورتفوليو ليك. لو استبدلت بيانات الكافيه ببيانات حقيقية من Kaggle، ونفس الأسئلة (نظّف، استكشف، صوّر، احسب إحصاء، استنتج)، هتكون عملت مشروع تحليل بيانات كامل يقدر يتشاف في سيرتك الذاتية. الدرس الجاي والأخير هيوريك بالظبط ليه المشروع ده تحديدًا أقوى دليل على جاهزيتك.</div>
    <div class="en">🇬🇧 This project isn't an extra step after the track — it's the <b>template</b> your first portfolio project should be built on. Swap the coffee-shop data for real data from Kaggle, ask the same questions (clean, explore, visualize, compute statistics, conclude), and you'll have a complete data-analysis project worth showing on your resume. The next and final lesson will show you exactly why this project specifically is the strongest proof of your readiness.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>دورة التحليل الكاملة: تحميل → تنظيف → استكشاف → تصوير → إحصاء → استنتاج.</li>
        <li>كل خطوة بتبني على اللي قبلها — بيانات نضيفة = تحليل موثوق = استنتاج صح.</li>
        <li>الاستنتاج النهائي لازم يكون جملة واضحة مبنية على أرقام حقيقية، مش انطباع عام.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="statistics-basics.php">← المرحلة السابقة</a>
    <a href="careers.php">المرحلة الجاية / Next: العمل في تحليل البيانات →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
