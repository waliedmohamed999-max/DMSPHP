<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'python-for-data';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'Python لتحليل البيانات: أساسيات Pandas';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">المرحلة 2 / Stage 2</span>
<h1>Python لتحليل البيانات: أساسيات Pandas <span class="ltr">Pandas Basics</span></h1>
<p class="subtitle"><b>Pandas</b> هي المكتبة اللي بتحوّل Python لأداة تحليل بيانات حقيقية — بتتعامل مع الجداول (زي Excel) بس بكود بدل الماوس.</p>

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
    <div class="ar">🇪🇬 تفهم إيه هو الـ DataFrame، تقدر تنشئ واحد من بيانات عندك أو من ملف CSV، وتختار أعمدة وصفوف محددة منه حسب شرط.</div>
    <div class="en">🇬🇧 Understand what a DataFrame is, create one from your own data or a CSV file, and select specific columns/rows based on a condition.</div>
</div>

<h2 id="understand">1) الـ DataFrame — الجدول الأساسي في Pandas</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 الـ <b>DataFrame</b> هو جدول بيانات (صفوف وأعمدة) — زي شيت Excel بس تقدر تتحكم فيه بالكود. بتبنيه غالبًا من <code>dict</code> بايثون عادي، فيه كل مفتاح بيبقى اسم عمود.</div>
    <div class="en">🇬🇧 A <b>DataFrame</b> is a data table (rows and columns) — like an Excel sheet, but controlled through code. You typically build one from a plain Python <code>dict</code>, where each key becomes a column name.</div>
</div>

<pre><code>import pandas as pd

data = {
    "product": ["Keyboard", "Mouse", "Monitor", "Webcam"],
    "price": [45.99, 19.99, 199.99, 39.99],
    "units_sold": [120, 300, 45, 80],
}
df = pd.DataFrame(data)
print(df)
print()
print("Shape:", df.shape)
print("Columns:", list(df.columns))</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">    product   price  units_sold
0  Keyboard   45.99         120
1     Mouse   19.99         300
2   Monitor  199.99          45
3    Webcam   39.99          80

Shape: (4, 3)
Columns: ['product', 'price', 'units_sold']</div>

<div class="bi-block">
    <div class="ar">🇪🇬 <code>df.shape</code> بيديك (عدد الصفوف, عدد الأعمدة) — أول حاجة يعملها أي محلل بيانات لما يفتح ملف جديد، عشان يعرف حجم البيانات اللي هيتعامل معاها.</div>
    <div class="en">🇬🇧 <code>df.shape</code> gives you (rows, columns) — the first thing any data analyst checks when opening a new file, to know the size of the data they're working with.</div>
</div>

<h2>2) اختيار أعمدة وصفوف / Selecting Columns &amp; Rows</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 تقدر تجيب عمود واحد بـ <code>df["اسم_العمود"]</code>. وتقدر تفلتر الصفوف بشرط، زي <code>df[df["price"] > 30]</code> — بترجع بس الصفوف اللي السعر فيها أكبر من 30. وتقدر تضيف عمود جديد محسوب من أعمدة تانية مباشرة.</div>
    <div class="en">🇬🇧 Get one column with <code>df["column_name"]</code>. Filter rows with a condition, like <code>df[df["price"] > 30]</code> — returns only rows where price exceeds 30. You can also add a new computed column directly from other columns.</div>
</div>

<pre><code>print(df["product"])
print()
print(df[df["price"] > 30])
print()
df["revenue"] = df["price"] * df["units_sold"]
print(df[["product", "revenue"]])</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">0    Keyboard
1       Mouse
2     Monitor
3      Webcam
Name: product, dtype: str

    product   price  units_sold
0  Keyboard   45.99         120
2   Monitor  199.99          45
3    Webcam   39.99          80

    product  revenue
0  Keyboard  5518.80
1     Mouse  5997.00
2   Monitor  8999.55
3    Webcam  3199.20</div>

<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ إن <code>df["revenue"] = ...</code> عملت العملية الحسابية على كل صف في العمودين مرة واحدة، من غير أي loop يدوي — دي أهم فايدة في Pandas: عمليات على عمود كامل بسطر واحد.</div>
    <div class="en">🇬🇧 Notice <code>df["revenue"] = ...</code> performed the calculation across every row of both columns at once, with no manual loop — this is Pandas' key benefit: whole-column operations in a single line.</div>
</div>

<h2 id="practice">💻 3) قراءة بيانات من CSV / Reading Data from a CSV Source</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 في الواقع نادرًا ما هتكتب البيانات يدويًا كـ <code>dict</code> — غالبًا هتيجي من ملف <code>.csv</code>. الدالة <code>pd.read_csv("file.csv")</code> بتقرأ الملف مباشرة وتحوّله لـ DataFrame. عشان نجرب المفهوم من غير ما نحتاج نرفع ملف فعلي، هنستخدم <code>io.StringIO</code> عشان نحاكي "ملف" في الذاكرة — بس الدالة <code>pd.read_csv</code> نفسها بالظبط زي اللي هتستخدمها مع ملف حقيقي.</div>
    <div class="en">🇬🇧 In reality you'll rarely type data by hand as a <code>dict</code> — it usually comes from a <code>.csv</code> file. <code>pd.read_csv("file.csv")</code> reads the file directly into a DataFrame. To try the concept without needing to upload a real file, we use <code>io.StringIO</code> to simulate an in-memory "file" — but <code>pd.read_csv</code> itself is exactly what you'd use with a real file.</div>
</div>

<pre><code>import pandas as pd
import io

csv_text = """product,price,units_sold
Keyboard,45.99,120
Mouse,19.99,300
Monitor,199.99,45
Webcam,39.99,80"""

df = pd.read_csv(io.StringIO(csv_text))
print(df)
print()
print("dtypes:")
print(df.dtypes)
print()
print("Total revenue:", (df["price"] * df["units_sold"]).sum())</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">    product   price  units_sold
0  Keyboard   45.99         120
1     Mouse   19.99         300
2   Monitor  199.99          45
3    Webcam   39.99          80

dtypes:
product           str
price         float64
units_sold      int64
dtype: object

Total revenue: 23714.55</div>

<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ إن <code>read_csv</code> عرفت لوحدها إن <code>price</code> أرقام عشرية و<code>units_sold</code> أرقام صحيحة — من غير ما تحدد النوع يدويًا. ده بيحصل غالبًا صح، لكن مش دايمًا (هنشوف مشكلة كلاسيكية في الدرس الجاي "تنظيف البيانات" لما عمود رقمي بيتقرأ كنص).</div>
    <div class="en">🇬🇧 Notice <code>read_csv</code> figured out on its own that <code>price</code> is decimal and <code>units_sold</code> is an integer — without you specifying the type manually. This usually works correctly, but not always (we'll see a classic case in the next lesson, "Data Cleaning," where a numeric column gets read as text).</div>
</div>

<div class="bi-block">
    <div class="ar">🇪🇬 جرّب بنفسك — عدّل نص الـ CSV تحت (زوّد صف منتج جديد، أو غيّر الأسعار) وشغّله عشان تشوف الناتج بيتغيّر إزاي:</div>
    <div class="en">🇬🇧 Try it yourself — edit the CSV text below (add a new product row, or change the prices) and run it to see the output update:</div>
</div>

<div class="mini-editor-wrap">
    <textarea spellcheck="false">import pandas as pd
import io

csv_text = """product,price,units_sold
Keyboard,45.99,120
Mouse,19.99,300
Monitor,199.99,45
Webcam,39.99,80"""

df = pd.read_csv(io.StringIO(csv_text))
print(df)
print()
print("dtypes:")
print(df.dtypes)
print()
print("Total revenue:", (df["price"] * df["units_sold"]).sum())</textarea>
    <div class="mini-toolbar">
        <button class="mini-run-btn">▶ شغّل / Run</button>
        <span class="mini-status"></span>
    </div>
    <div class="output-box">— لسه متشغلش / not run yet —</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="dict">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">غالبًا بتبني DataFrame يدويًا من إيه نوع بيانات بايثون؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">You typically build a DataFrame manually from which Python data type?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="dict"> dict</label>
        <label><input type="radio" name="q1" value="set"> set</label>
        <label><input type="radio" name="q1" value="string"> string واحد / a single string</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="read_csv">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">إيه الدالة اللي بتحوّل ملف CSV مباشرة لـ DataFrame؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Which function turns a CSV file directly into a DataFrame?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="read_csv"> pd.read_csv()</label>
        <label><input type="radio" name="q2" value="dataframe"> pd.DataFrame() بس / pd.DataFrame() alone</label>
        <label><input type="radio" name="q2" value="open"> open()</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ حوّل CSV لتقرير / Turn a CSV into a Report</h3>
    <div class="ar">🇪🇬 في المحرر المصغّر فوق (أو <a href="../playground/index.php">الـ Playground</a>)، اكتب نص CSV جديد لـ 5 كتب بأعمدة (title, price, pages)، اقرأه بـ <code>pd.read_csv(io.StringIO(...))</code>، وأضف عمود <code>price_per_page</code> يحسب السعر لكل صفحة (<code>price / pages</code>). اطبع الكتاب صاحب أعلى <code>price_per_page</code> باستخدام <code>sort_values</code>.</div>
    <div class="en">🇬🇧 In the mini editor above (or the <a href="../playground/index.php">Playground</a>), write a new CSV text for 5 books with columns (title, price, pages), read it with <code>pd.read_csv(io.StringIO(...))</code>, and add a <code>price_per_page</code> column computing price divided by pages. Print the book with the highest <code>price_per_page</code> using <code>sort_values</code>.</div>
</div>

<div class="exercise-box">
    <h3>✍️ تمرين إضافي / Extra Exercise</h3>
    <div class="ar">🇪🇬 افتح <a href="../playground/index.php">محرر الكود</a> واعمل DataFrame لـ 5 طلاب بأعمدة (اسم، درجة). أضف عمود <code>passed</code> يحسب <code>True</code> لو الدرجة ≥ 50، واطبع بس الطلاب الناجحين.</div>
    <div class="en">🇬🇧 In the <a href="../playground/index.php">Playground</a>, create a DataFrame for 5 students with columns (name, score). Add a <code>passed</code> column computing <code>True</code> if the score is ≥ 50, and print only the passing students.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 مشروع التخرج بيبدأ بالظبط بنفس الخطوة اللي اتعلمتها هنا: بناء DataFrame وفهم شكله الأساسي (<code>shape</code>, <code>columns</code>, <code>dtypes</code>) قبل أي تحليل. الفرق إن هناك البيانات هتيجي جاهزة زي لو اتقرت من CSV، وفيها مشاكل حقيقية (قيم ناقصة وتكرار) هتتعامل معاها في الخطوة اللي بعد كده.</div>
    <div class="en">🇬🇧 The capstone project starts with exactly this same step: building a DataFrame and understanding its basic shape (<code>shape</code>, <code>columns</code>, <code>dtypes</code>) before any analysis. The difference is the data there arrives pre-loaded as if read from a CSV, with real problems (missing values and duplicates) you'll handle in the next step.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>DataFrame = جدول بيانات، بيتبني غالبًا من <code>dict</code>.</li>
        <li><code>df.shape</code> و<code>df.columns</code> = أول حاجة تفحصها في أي بيانات جديدة.</li>
        <li><code>df[شرط]</code> بتفلتر الصفوف، و<code>df["عمود_جديد"] = ...</code> بتضيف عمود محسوب على كل الصفوف مرة واحدة.</li>
        <li><code>pd.read_csv(...)</code> = الطريقة الحقيقية اللي هتقرا بيها بيانات من ملف CSV.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="intro.php">← المرحلة السابقة</a>
    <a href="data-cleaning.php">المرحلة الجاية / Next: تنظيف البيانات →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
