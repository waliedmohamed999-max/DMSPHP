<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'data-cleaning';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'تنظيف البيانات';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">المرحلة 3 / Stage 3</span>
<h1>تنظيف البيانات <span class="ltr">Data Cleaning</span></h1>
<p class="subtitle">البيانات الحقيقية دايمًا فيها قيم ناقصة وصفوف مكررة — قبل أي تحليل، لازم تنضّفها. دي أهم خطوة بتاخد وقت المحلل الفعلي.</p>

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
    <div class="ar">🇪🇬 تقدر تكتشف القيم الناقصة في DataFrame وتتعامل معاها (حذف أو تعويض)، تكتشف الصفوف المكررة وتشيلها، وتحوّل عمود اتقرا كنص غلط لنوعه الرقمي الصح.</div>
    <div class="en">🇬🇧 Detect missing values in a DataFrame and handle them (drop or fill), detect and remove duplicate rows, and convert a column that was wrongly read as text into its correct numeric type.</div>
</div>

<h2 id="understand">عملية التنظيف كقرارات متسلسلة / Cleaning as a Sequence of Decisions</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 تنظيف البيانات مش خطوة واحدة — هو دورة صغيرة بتتكرر لكل مشكلة تلاقيها: تكتشف المشكلة، تقرر إزاي تتعامل معاها، تنفّذ الحل (تصليح أو حذف)، وتتحقق إن الحل فعلاً نجح.</div>
    <div class="en">🇬🇧 Data cleaning isn't one step — it's a small cycle that repeats for every problem you find: detect the problem, decide how to handle it, apply the fix (repair or drop), and verify the fix actually worked.</div>
</div>

<div class="flow-diagram">
    <div class="flow-box">Detect</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">Decide</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">Fix / Drop</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">Verify</div>
</div>

<h2>1) اكتشاف القيم الناقصة / Detecting Missing Values</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 القيم الناقصة (زي عمر أو مدينة مفقودة) بتتخزن في Pandas كـ <code>NaN</code>. الدالة <code>df.isna()</code> بترجع جدول بنفس الشكل لكن بـ <code>True</code>/<code>False</code> لكل خلية. وبجمعها بـ <code>.sum()</code> بتعرف عدد القيم الناقصة في كل عمود.</div>
    <div class="en">🇬🇧 Missing values (like a missing age or city) are stored in Pandas as <code>NaN</code>. <code>df.isna()</code> returns a same-shaped table of <code>True</code>/<code>False</code> per cell. Summing it with <code>.sum()</code> tells you how many are missing per column.</div>
</div>

<pre><code>import pandas as pd
import numpy as np

data = {
    "name": ["Ali", "Sara", "Omar", "Mona", "Youssef"],
    "age": [25, np.nan, 30, 22, np.nan],
    "city": ["Cairo", "Giza", None, "Cairo", "Alexandria"],
}
df = pd.DataFrame(data)
print(df)
print()
print(df.isna())
print()
print("Missing per column:")
print(df.isna().sum())</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">      name   age        city
0      Ali  25.0       Cairo
1     Sara   NaN        Giza
2     Omar  30.0         NaN
3     Mona  22.0       Cairo
4  Youssef   NaN  Alexandria

    name    age   city
0  False  False  False
1  False   True  False
2  False  False   True
3  False  False  False
4  False   True  False

Missing per column:
name    0
age     2
city    1
dtype: int64</div>

<h2>2) التعامل مع القيم الناقصة / Handling Missing Values</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 عندك خياران أساسيان: <code>df.dropna()</code> بيشيل أي صف فيه قيمة ناقصة واحدة على الأقل (مفيد لو نسبة الفقدان صغيرة). أو <code>df.fillna(قيمة)</code> بيعوّض القيم الناقصة بقيمة محددة — زي متوسط العمود للأرقام، أو نص ثابت زي "Unknown" للنصوص.</div>
    <div class="en">🇬🇧 Two main options: <code>df.dropna()</code> removes any row with at least one missing value (fine when the missing ratio is small). Or <code>df.fillna(value)</code> replaces missing values with something specific — like the column's mean for numbers, or a fixed string like "Unknown" for text.</div>
</div>

<pre><code>print("dropna():")
print(df.dropna())
print()

print("fillna for age with mean, city with 'Unknown':")
df["age"] = df["age"].fillna(df["age"].mean())
df["city"] = df["city"].fillna("Unknown")
print(df)</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">dropna():
   name   age   city
0   Ali  25.0  Cairo
3  Mona  22.0  Cairo

fillna for age with mean, city with 'Unknown':
      name        age        city
0      Ali  25.000000       Cairo
1     Sara  25.666667        Giza
2     Omar  30.000000     Unknown
3     Mona  22.000000       Cairo
4  Youssef  25.666667  Alexandria</div>

<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ إن <code>dropna()</code> شالت 3 صفوف من أصل 5 — عشان كان في عمود age أو city ناقص فيهم. لو كنت هتحذف بس، كنت هتفقد بيانات مفيدة (زي اسم "Sara"). عشان كده <code>fillna</code> غالبًا اختيار أذكى لما نسبة الفقدان مش صغيرة جدًا.</div>
    <div class="en">🇬🇧 Notice <code>dropna()</code> removed 3 out of 5 rows — because age or city was missing in them. If you only ever dropped, you'd lose useful data (like "Sara"'s row). That's why <code>fillna</code> is often smarter when the missing ratio isn't tiny.</div>
</div>

<h2>3) اكتشاف وحذف الصفوف المكررة / Detecting &amp; Removing Duplicates</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <code>df.duplicated()</code> بترجع <code>True</code> لأي صف مطابق تمامًا لصف سابق ظهر قبله. و<code>df.drop_duplicates()</code> بتشيل الصفوف المكررة دي وتسيب أول ظهور بس.</div>
    <div class="en">🇬🇧 <code>df.duplicated()</code> returns <code>True</code> for any row that's an exact match of a row that appeared earlier. <code>df.drop_duplicates()</code> removes those duplicates, keeping only the first occurrence.</div>
</div>

<pre><code>import pandas as pd

data = {
    "name": ["Ali", "Sara", "Omar", "Ali", "Sara"],
    "age": [25, 28, 30, 25, 28],
    "city": ["Cairo", "Giza", "Cairo", "Cairo", "Giza"],
}
df = pd.DataFrame(data)
print(df)
print()
print("duplicated():")
print(df.duplicated())
print()
print("drop_duplicates():")
print(df.drop_duplicates())</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">   name  age   city
0   Ali   25  Cairo
1  Sara   28   Giza
2  Omar   30  Cairo
3   Ali   25  Cairo
4  Sara   28   Giza

duplicated():
0    False
1    False
2    False
3     True
4     True
dtype: bool

drop_duplicates():
   name  age   city
0   Ali   25  Cairo
1  Sara   28   Giza
2  Omar   30  Cairo</div>

<h2 id="practice">💻 4) عمود رقمي اتقرا كنص / A Numeric Column Read as Text</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 مشكلة كلاسيكية جدًا: لما ملف CSV فيه خلية فيها نص زي "N/A" جوه عمود المفروض يكون أرقام، Pandas بتقرا العمود كله كـ <code>str</code> (نص) بدل رقم — حتى لو باقي القيم أرقام سليمة. النتيجة: مقدرش أعمل عليه عمليات حسابية زي الجمع أو الضرب من غير ما أصلّحه الأول. الحل: <code>pd.to_numeric(العمود, errors="coerce")</code> بتحاول تحوّل كل قيمة لرقم، ولو فشلت (زي "N/A") بترجعها <code>NaN</code> بدل ما توقف البرنامج بالكامل.</div>
    <div class="en">🇬🇧 A very classic problem: when a CSV cell contains text like "N/A" inside a column that should be numbers, Pandas reads the entire column as <code>str</code> (text) instead of a number — even if the rest of the values are valid numbers. Result: you can't run arithmetic on it (sum, multiply) until you fix it first. The fix: <code>pd.to_numeric(column, errors="coerce")</code> tries to convert every value to a number, and if it fails (like "N/A") it returns <code>NaN</code> instead of crashing the whole program.</div>
</div>

<pre><code>import pandas as pd

data = {
    "name": ["Ali", "Sara", "Omar", "Mona"],
    "price": ["19.99", "25", "N/A", "40.5"],
}
df = pd.DataFrame(data)
print(df)
print()
print("dtype of price:", df["price"].dtype)

df["price_fixed"] = pd.to_numeric(df["price"], errors="coerce")
print()
print(df)
print()
print("dtype of price_fixed:", df["price_fixed"].dtype)
print("Missing after conversion:", df["price_fixed"].isna().sum())</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">   name  price
0   Ali  19.99
1  Sara     25
2  Omar    N/A
3  Mona   40.5

dtype of price: str

   name  price  price_fixed
0   Ali  19.99        19.99
1  Sara     25        25.00
2  Omar    N/A          NaN
3  Mona   40.5        40.50

dtype of price_fixed: float64
Missing after conversion: 1</div>

<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ إن العمود <code>price</code> الأصلي فضل نص (زي ما هو، عشان تحتفظ بالمصدر لو احتجته)، بينما <code>price_fixed</code> بقى <code>float64</code> فعلي — دلوقتي تقدر تعمل عليه <code>.sum()</code> أو <code>.mean()</code> بشكل صحيح. لو استخدمت <code>.astype(float)</code> بدل <code>to_numeric(errors="coerce")</code>، البرنامج كان هيوقف بخطأ عند "N/A" بدل ما يكمل.</div>
    <div class="en">🇬🇧 Notice the original <code>price</code> column stays text (kept as-is in case you need the source), while <code>price_fixed</code> becomes real <code>float64</code> — now you can correctly run <code>.sum()</code> or <code>.mean()</code> on it. If you'd used <code>.astype(float)</code> instead of <code>to_numeric(errors="coerce")</code>, the program would have crashed on "N/A" instead of continuing.</div>
</div>

<div class="bi-block">
    <div class="ar">🇪🇬 جرّب بنفسك — زوّد قيمة نصية غلط تانية (زي "unknown") في عمود الأسعار وشوف إزاي <code>to_numeric</code> بتتعامل معاها:</div>
    <div class="en">🇬🇧 Try it yourself — add another bad text value (like "unknown") to the price column and see how <code>to_numeric</code> handles it:</div>
</div>

<div class="mini-editor-wrap">
    <textarea spellcheck="false">import pandas as pd

data = {
    "name": ["Ali", "Sara", "Omar", "Mona"],
    "price": ["19.99", "25", "N/A", "40.5"],
}
df = pd.DataFrame(data)
print(df)
print()
print("dtype of price:", df["price"].dtype)

df["price_fixed"] = pd.to_numeric(df["price"], errors="coerce")
print()
print(df)
print()
print("dtype of price_fixed:", df["price_fixed"].dtype)
print("Missing after conversion:", df["price_fixed"].isna().sum())</textarea>
    <div class="mini-toolbar">
        <button class="mini-run-btn">▶ شغّل / Run</button>
        <span class="mini-status"></span>
    </div>
    <div class="output-box">— لسه متشغلش / not run yet —</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="fillna">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">لو نسبة القيم الناقصة صغيرة وعايز تحافظ على كل الصفوف، إيه الأنسب؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">If the missing ratio is small and you want to keep all rows, what's more appropriate?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="dropna"> df.dropna()</label>
        <label><input type="radio" name="q1" value="fillna"> df.fillna(...)</label>
        <label><input type="radio" name="q1" value="duplicated"> df.duplicated()</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="coerce">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">إيه اللي بيخليك تحوّل عمود نص لرقم من غير ما يوقف البرنامج لو لاقى قيمة مش قابلة للتحويل؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What lets you convert a text column to numbers without crashing on an unconvertible value?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="astype"> .astype(float) بس / .astype(float) alone</label>
        <label><input type="radio" name="q2" value="coerce"> pd.to_numeric(..., errors="coerce")</label>
        <label><input type="radio" name="q2" value="dropna"> df.dropna()</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ نضّف جدول موظفين فوضوي / Clean a Messy Employees Table</h3>
    <div class="ar">🇪🇬 في المحرر المصغّر فوق (أو <a href="../playground/index.php">الـ Playground</a>)، اعمل DataFrame لـ 6 موظفين بعمود <code>salary</code> فيه قيم نصية زي <code>["5000", "N/A", "6200", "unknown", "4800", "5000"]</code>. حوّل العمود لرقم بـ <code>to_numeric(errors="coerce")</code>، عوّض القيم الناقصة الناتجة بمتوسط الرواتب الصحيحة، وشيل أي صف مكرر بالكامل.</div>
    <div class="en">🇬🇧 In the mini editor above (or the <a href="../playground/index.php">Playground</a>), build a DataFrame for 6 employees with a <code>salary</code> column containing text values like <code>["5000", "N/A", "6200", "unknown", "4800", "5000"]</code>. Convert it to numeric with <code>to_numeric(errors="coerce")</code>, fill the resulting missing values with the mean of the valid salaries, and drop any fully duplicated row.</div>
</div>

<div class="exercise-box">
    <h3>✍️ تمرين إضافي / Extra Exercise</h3>
    <div class="ar">🇪🇬 افتح <a href="../playground/index.php">محرر الكود</a> واعمل DataFrame لـ 6 موظفين بأعمدة (اسم، راتب) — خلّي راتب موظف واحد <code>None</code>، وكرّر صف موظف تاني بالكامل. عوّض الراتب الناقص بمتوسط الرواتب، وشيل الصف المكرر.</div>
    <div class="en">🇬🇧 In the <a href="../playground/index.php">Playground</a>, create a DataFrame for 6 employees with columns (name, salary) — make one employee's salary <code>None</code>, and duplicate another employee's row entirely. Fill the missing salary with the average, and drop the duplicate row.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 مشروع التخرج فيه بالظبط نفس النوعين من المشاكل اللي اتعلمتهم هنا: قيم ناقصة في عمود <code>quantity</code> وصفوف مكررة بالكامل — وهتستخدم فيه <code>fillna()</code> و<code>drop_duplicates()</code> بالظبط زي ما اتعلمتهم دلوقتي، قبل ما تقدر تحسب أي إيراد صحيح.</div>
    <div class="en">🇬🇧 The capstone project has exactly the same two problem types you learned here: missing values in a <code>quantity</code> column and fully duplicated rows — and you'll use <code>fillna()</code> and <code>drop_duplicates()</code> there exactly as you learned now, before you can compute any correct revenue.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li><code>df.isna().sum()</code> بيديك عدد القيم الناقصة في كل عمود.</li>
        <li><code>df.dropna()</code> بيشيل صفوف ناقصة، و<code>df.fillna(...)</code> بيعوّضها بقيمة (متوسط، نص ثابت، إلخ).</li>
        <li><code>df.duplicated()</code> بيكتشف الصفوف المكررة، و<code>df.drop_duplicates()</code> بيشيلها.</li>
        <li><code>pd.to_numeric(عمود, errors="coerce")</code> بيصلّح عمود رقمي اتقرا غلط كنص، وبيحوّل أي قيمة مش قابلة للتحويل لـ <code>NaN</code>.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="python-for-data.php">← المرحلة السابقة</a>
    <a href="data-exploration.php">المرحلة الجاية / Next: الاستكشاف والتحليل الوصفي →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
