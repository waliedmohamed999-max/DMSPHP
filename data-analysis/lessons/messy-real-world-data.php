<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'messy-real-world-data';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'التعامل مع بيانات فوضوية حقيقية';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">المرحلة 8 / Stage 8</span>
<h1>التعامل مع بيانات فوضوية حقيقية <span class="ltr">Working with Real-World Messy Data</span></h1>
<p class="subtitle">قيم ناقصة، تكرار، وأعمدة مختلطة الأنواع — تحدي أصعب وأقرب لواقع الشغل. البيانات الحقيقية نادرًا ما فيها مشكلة واحدة بس — عادة بتيجي كلها مع بعض في نفس الجدول.</p>

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
    <div class="ar">🇪🇬 في درس تنظيف البيانات اتعلمت <code>dropna</code> و<code>fillna</code> و<code>duplicated</code> على بيانات بسيطة نسبيًا. هنا هنشتغل على جدول أوردرات فيه <b>4 مشاكل حقيقية شغالة مع بعض في نفس الوقت</b>: قيم ناقصة "مقنّعة" (زي نص "N/A" مش NaN فعلي)، عمود مبالغ فيه فواصل آلاف كنص، أسماء عملاء متكررة بس بحروف كبيرة/صغيرة ومسافات مختلفة، وتواريخ بصيغ مختلفة تمامًا في نفس العمود. هتتعلم تكتشف كل مشكلة، تصلّحها بالترتيب الصح، وتتحقق إن الحل نجح فعلاً.</div>
    <div class="en">🇬🇧 In Data Cleaning you learned <code>dropna</code>, <code>fillna</code>, and <code>duplicated</code> on relatively simple data. Here we'll work on an orders table with <b>4 real problems happening at once</b>: "disguised" missing values (a literal text "N/A" instead of a real NaN), a numeric column with text thousands separators, repeated customer names in different casing/whitespace, and dates in completely different formats in the same column. You'll learn to detect each problem, fix it in the right order, and verify the fix actually worked.</div>
</div>

<h2 id="understand">1) جدول أوردرات فوضوي فعلي / A Genuinely Messy Orders Table</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 خد الجدول ده — 10 أوردرات فيهم كل مشاكل البيانات الحقيقية سوا: عمود <code>amount</code> فيه أرقام كنص وفيها فواصل آلاف ("1,200") وكمان قيمة "N/A"، عمود <code>quantity</code> فيه قيمة ناقصة فعلية (NaN)، عمود <code>customer</code> فيه نفس الاسم بأشكال مختلفة، وعمود <code>order_date</code> فيه 3 صيغ تاريخ مختلفة. لاحظ في الناتج تحت: <code>isna().sum()</code> بيقول إن عمود <code>amount</code> فيه قيمة ناقصة واحدة بس — مع إن فيه كمان "N/A" كنص! ده لأن Pandas بتشوف "N/A" كـ <b>نص عادي</b> مش كقيمة ناقصة حقيقية، إلا لو قلتلها كده بوضوح.</div>
    <div class="en">🇬🇧 Take this table — 10 orders with every real-data problem at once: an <code>amount</code> column with numbers stored as text with thousands separators ("1,200") plus a literal "N/A", a <code>quantity</code> column with a genuine missing value (NaN), a <code>customer</code> column with the same name in different shapes, and an <code>order_date</code> column with 3 different date formats. Notice in the output below: <code>isna().sum()</code> reports only one missing value in <code>amount</code> — even though there's also a text "N/A" in there! That's because Pandas treats "N/A" as <b>plain text</b>, not a real missing value, unless you explicitly tell it otherwise.</div>
</div>

<pre><code>import pandas as pd
import numpy as np

data = {
    "customer": ["Ahmed Hassan", "ahmed hassan", "Sara Ali", "Mona Youssef",
                 "Ahmed Hassan ", "Omar Khaled", "SARA ALI", "Mona youssef",
                 "Youssef Adel", "Omar Khaled"],
    "amount": ["1,200", "1200", "850", None,
               "2,400", "999", "850", "3,100",
               "N/A", "999"],
    "quantity": [3, 3, np.nan, 2, 5, 1, 2, 6, 4, 1],
    "order_date": ["2024-01-15", "01/15/2024", "2024-02-03", "15-Jan-2024",
                   "2024-02-20", "02/28/2024", "03-Mar-2024", "2024-03-10",
                   "10/03/2024", "2024-01-15"],
}
df = pd.DataFrame(data)
print(df.to_string())
print()
print("dtypes:")
print(df.dtypes)
print()
print("isna().sum():")
print(df.isna().sum())</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">        customer amount  quantity   order_date
0   Ahmed Hassan  1,200       3.0   2024-01-15
1   ahmed hassan   1200       3.0   01/15/2024
2       Sara Ali    850       NaN   2024-02-03
3   Mona Youssef    NaN       2.0  15-Jan-2024
4  Ahmed Hassan   2,400       5.0   2024-02-20
5    Omar Khaled    999       1.0   02/28/2024
6       SARA ALI    850       2.0  03-Mar-2024
7   Mona youssef  3,100       6.0   2024-03-10
8   Youssef Adel    N/A       4.0   10/03/2024
9    Omar Khaled    999       1.0   2024-01-15

dtypes:
customer          str
amount            str
quantity      float64
order_date        str
dtype: object

isna().sum():
customer      0
amount        1
quantity      1
order_date    0
dtype: int64</div>

<h2>2) القيمة الناقصة المقنّعة والفاصلة الألفية / The Disguised Missing Value and the Thousands Separator</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 قبل ما نقدر نحول <code>amount</code> لرقم، لازم نحل مشكلتين جواه: (1) النص "N/A" لازم يتحول لـ <code>NaN</code> حقيقي أولًا بـ <code>.replace("N/A", np.nan)</code> — <code>to_numeric</code> هيحوّله لـ NaN لوحده كمان، لكن استبداله يدويًا بيخليك واعي إنه موجود بدل ما يختفي بصمت. (2) الفاصلة الألفية جوه "1,200" لازم تتشال بـ <code>str.replace(",", "")</code> قبل <code>pd.to_numeric</code> — لو سبتها، <code>to_numeric</code> هيفشل يحولها ويرجّعها NaN برضو، فهتفقد قيمة صحيحة كان المفروض تتحسب.</div>
    <div class="en">🇬🇧 Before we can convert <code>amount</code> to a number, we must solve two things inside it: (1) the text "N/A" must first become a real <code>NaN</code> via <code>.replace("N/A", np.nan)</code> — <code>to_numeric</code> would coerce it to NaN anyway, but replacing it explicitly makes you aware it exists instead of it silently disappearing. (2) the thousands separator inside "1,200" must be stripped with <code>str.replace(",", "")</code> before <code>pd.to_numeric</code> — if you skip it, <code>to_numeric</code> will fail to parse it and also return NaN, silently losing a value that should have counted.</div>
</div>

<pre><code>print("Step A: 'N/A' string still counted as text, not missing:")
print("isna() on amount before replace:", df["amount"].isna().sum())
print()

df["amount"] = df["amount"].replace("N/A", np.nan)
print("Step B: after replacing literal 'N/A' text with real NaN:")
print("isna() on amount after replace:", df["amount"].isna().sum())
print()

print("Step C: strip thousands separators, then convert to numeric:")
df["amount_clean"] = df["amount"].str.replace(",", "", regex=False)
df["amount_clean"] = pd.to_numeric(df["amount_clean"], errors="coerce")
print(df[["customer", "amount", "amount_clean"]].to_string())
print()
print("dtype of amount_clean:", df["amount_clean"].dtype)
print("Missing in amount_clean:", df["amount_clean"].isna().sum())</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">Step A: 'N/A' string still counted as text, not missing:
isna() on amount before replace: 1

Step B: after replacing literal 'N/A' text with real NaN:
isna() on amount after replace: 2

Step C: strip thousands separators, then convert to numeric:
        customer amount  amount_clean
0   Ahmed Hassan  1,200        1200.0
1   ahmed hassan   1200        1200.0
2       Sara Ali    850         850.0
3   Mona Youssef    NaN           NaN
4  Ahmed Hassan   2,400        2400.0
5    Omar Khaled    999         999.0
6       SARA ALI    850         850.0
7   Mona youssef  3,100        3100.0
8   Youssef Adel    NaN           NaN
9    Omar Khaled    999         999.0

dtype of amount_clean: float64
Missing in amount_clean: 2</div>

<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ إن عدد القيم الناقصة قفز من 1 لـ 2 بعد الاستبدال — دي كانت مشكلة "مختبئة" هتفوتك تمامًا لو اكتفيت بـ <code>isna().sum()</code> الأول من غير ما تفحص القيم النصية الفريدة في العمود (<code>df["amount"].unique()</code>) للتأكد مفيش نصوص تانية بتمثل "مفقود" زي "N/A" أو "none" أو "-".</div>
    <div class="en">🇬🇧 Notice the missing count jumped from 1 to 2 after the replace — this was a "hidden" problem you'd completely miss if you only trusted the first <code>isna().sum()</code> without checking the column's unique text values (<code>df["amount"].unique()</code>) to make sure no other text stands in for "missing", like "N/A", "none", or "-".</div>
</div>

<h2>3) التكرار المقنّع: نفس العميل بأشكال مختلفة / Disguised Duplicates: The Same Customer, Different Shapes</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <code>df.duplicated()</code> (من درس تنظيف البيانات) بتكتشف بس الصفوف المتطابقة <b>تمامًا</b>. لكن "Ahmed Hassan"، "ahmed hassan"، و"Ahmed Hassan " (بمسافة زيادة) هي نفس العميل فعليًا، لكنها 3 نصوص مختلفة تمامًا بالنسبة لـ Pandas — فلو عملت <code>groupby("customer")</code> من غير تنضيف، هتاخد نتيجة غلط: العميل الواحد هيتقسّم لعدة صفوف منفصلة بدل ما يتجمّع في صف واحد.</div>
    <div class="en">🇬🇧 <code>df.duplicated()</code> (from Data Cleaning) only detects rows that are <b>exactly</b> identical. But "Ahmed Hassan", "ahmed hassan", and "Ahmed Hassan " (with a trailing space) are the same real customer, yet 3 completely different strings to Pandas — so grouping by <code>customer</code> without cleaning gives a wrong result: one customer gets split across several separate rows instead of being aggregated into one.</div>
</div>

<pre><code>print("Step D: groupby BEFORE normalizing customer names (WRONG totals):")
print(df.groupby("customer")["amount_clean"].sum().to_string())
print()
print("Number of 'distinct' customers before cleaning:", df["customer"].nunique())
print()

df["customer_clean"] = df["customer"].str.strip().str.lower()
print("Step E: groupby AFTER normalizing (strip + lower) - correct totals:")
print(df.groupby("customer_clean")["amount_clean"].sum().to_string())
print()
print("Number of distinct customers after cleaning:", df["customer_clean"].nunique())</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">Step D: groupby BEFORE normalizing customer names (WRONG totals):
customer
Ahmed Hassan     1200.0
Ahmed Hassan     2400.0
Mona Youssef        0.0
Mona youssef     3100.0
Omar Khaled      1998.0
SARA ALI          850.0
Sara Ali          850.0
Youssef Adel        0.0
ahmed hassan     1200.0

Number of 'distinct' customers before cleaning: 9

Step E: groupby AFTER normalizing (strip + lower) - correct totals:
customer_clean
ahmed hassan    4800.0
mona youssef    3100.0
omar khaled     1998.0
sara ali        1700.0
youssef adel       0.0

Number of distinct customers after cleaning: 5</div>

<div class="bi-block">
    <div class="ar">🇪🇬 قبل التنضيف Pandas "شافت" 9 عملاء مختلفين بدل 5 حقيقيين — و"Ahmed Hassan" اتقسّم لـ 3 صفوف منفصلة بإجمالي مبعتر بدل ما يظهر إجماليه الحقيقي 4800. <code>str.strip()</code> بتشيل المسافات الزيادة من الأول والآخر، و<code>str.lower()</code> بتوحّد حالة الحروف — الاتنين مع بعض بيحلّوا المشكلة دي بسطر واحد.</div>
    <div class="en">🇬🇧 Before cleaning, Pandas "saw" 9 different customers instead of the real 5 — and "Ahmed Hassan" was split across 3 separate rows with a scattered total instead of showing their true total of 4800. <code>str.strip()</code> removes extra leading/trailing whitespace, and <code>str.lower()</code> unifies letter casing — together they solve this in one line.</div>
</div>

<h2 id="practice">💻 4) صيغ تواريخ مختلطة في نفس العمود / Mixed Date Formats in the Same Column</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 المشكلة الرابعة: عمود <code>order_date</code> فيه 3 صيغ مختلفة تمامًا — "2024-01-15" (ISO)، "01/15/2024" (شهر/يوم/سنة)، و"15-Jan-2024" (يوم-اسم شهر-سنة). <code>pd.to_datetime(العمود, format="mixed")</code> بتحاول تخمّن الصيغة المناسبة لكل قيمة على حدة بدل ما تفرض صيغة واحدة على العمود كله. لاحظ التحذير المهم في القيمة الأخيرة "10/03/2024": مفيش أي خطأ أو NaT، لكن Pandas فسّرتها كـ "أكتوبر 3" (شهر=10، يوم=03) — لو المصدر الأصلي كان بيقصد "3 أكتوبر" بصيغة يوم/شهر، النتيجة هتبقى غلط بصمت من غير أي تحذير. الصيغ الغامضة بتحتاج معرفة بمصدر البيانات، مش بس كود.</div>
    <div class="en">🇬🇧 The fourth problem: the <code>order_date</code> column has 3 completely different formats — "2024-01-15" (ISO), "01/15/2024" (month/day/year), and "15-Jan-2024" (day-month name-year). <code>pd.to_datetime(column, format="mixed")</code> tries to guess the right format for each value individually instead of forcing one format on the whole column. Notice the important warning in the last value "10/03/2024": there's no error or NaT, but Pandas interpreted it as "October 3" (month=10, day=03) — if the original source meant day/month order ("3 October"), the result would be silently wrong with no warning at all. Ambiguous formats need knowledge of the data source, not just code.</div>
</div>

<pre><code>order_date = ["2024-01-15", "01/15/2024", "2024-02-03", "15-Jan-2024",
              "2024-02-20", "02/28/2024", "03-Mar-2024", "2024-03-10",
              "10/03/2024", "2024-01-15"]
dates_df = pd.DataFrame({"order_date": order_date})

dates_df["date_parsed"] = pd.to_datetime(dates_df["order_date"], format="mixed", errors="coerce")
print(dates_df.to_string())
print()
print("dtype:", dates_df["date_parsed"].dtype)
print("Failed to parse (NaT count):", dates_df["date_parsed"].isna().sum())</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">    order_date date_parsed
0   2024-01-15  2024-01-15
1   01/15/2024  2024-01-15
2   2024-02-03  2024-02-03
3  15-Jan-2024  2024-01-15
4   2024-02-20  2024-02-20
5   02/28/2024  2024-02-28
6  03-Mar-2024  2024-03-03
7   2024-03-10  2024-03-10
8   10/03/2024  2024-10-03
9   2024-01-15  2024-01-15

dtype: datetime64[us]
Failed to parse (NaT count): 0</div>

<h2>5) كل الخطوات مع بعض / Putting It All Together</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 دلوقتي نطبّق الأربع إصلاحات على نفس الجدول الأصلي بالترتيب: تصليح <code>amount</code> (N/A → NaN، شيل الفاصلة، حوّل لرقم)، توحيد <code>customer</code> (strip + lower + title)، تعويض <code>quantity</code> الناقصة بالوسيط (زي ما اتعلمنا في أساسيات الإحصاء — أكتر أمانًا من المتوسط)، وتحويل <code>order_date</code> لتاريخ حقيقي. النتيجة: جدول نضيف بالكامل تقدر تحسب عليه إيراد صحيح لكل عميل.</div>
    <div class="en">🇬🇧 Now we apply all four fixes to the original table in order: fix <code>amount</code> (N/A → NaN, strip the separator, convert to number), normalize <code>customer</code> (strip + lower + title), fill missing <code>quantity</code> with the median (as learned in Statistics Basics — safer than the mean), and convert <code>order_date</code> to a real date. Result: a fully clean table you can compute correct per-customer revenue from.</div>
</div>

<pre><code>df["amount"] = df["amount"].replace("N/A", np.nan)
df["amount"] = pd.to_numeric(df["amount"].str.replace(",", "", regex=False), errors="coerce")

df["customer"] = df["customer"].str.strip().str.lower().str.title()

df["quantity"] = df["quantity"].fillna(df["quantity"].median())

df["order_date"] = pd.to_datetime(df["order_date"], format="mixed", errors="coerce")

df["amount"] = df["amount"].fillna(df["amount"].median())

print("Final cleaned DataFrame:")
print(df.to_string())
print()
print("Final revenue per customer:")
print(df.groupby("customer")["amount"].sum().to_string())</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">Final cleaned DataFrame:
       customer  amount  quantity order_date
0  Ahmed Hassan  1200.0       3.0 2024-01-15
1  Ahmed Hassan  1200.0       3.0 2024-01-15
2      Sara Ali   850.0       3.0 2024-02-03
3  Mona Youssef  1099.5       2.0 2024-01-15
4  Ahmed Hassan  2400.0       5.0 2024-02-20
5   Omar Khaled   999.0       1.0 2024-02-28
6      Sara Ali   850.0       2.0 2024-03-03
7  Mona Youssef  3100.0       6.0 2024-03-10
8  Youssef Adel  1099.5       4.0 2024-10-03
9   Omar Khaled   999.0       1.0 2024-01-15

Final revenue per customer:
customer
Ahmed Hassan    4800.0
Mona Youssef    4199.5
Omar Khaled     1998.0
Sara Ali        1700.0
Youssef Adel    1099.5</div>

<div class="bi-block">
    <div class="ar">🇪🇬 جرّب بنفسك — زوّد قيمة نصية تانية بتمثل "مفقود" في عمود amount (زي "unknown" أو "-") وشوف هل <code>to_numeric(errors="coerce")</code> بيمسكها صح، وجرّب كمان تضيف عميل بحروف كبيرة كلها زي "OMAR KHALED" وشوف هل التنضيف بيدمجه مع "Omar Khaled" الأصلي:</div>
    <div class="en">🇬🇧 Try it yourself — add another text value that stands for "missing" in the amount column (like "unknown" or "-") and see whether <code>to_numeric(errors="coerce")</code> catches it correctly, and also try adding a customer in all caps like "OMAR KHALED" and see whether the cleaning merges it with the original "Omar Khaled":</div>
</div>

<div class="mini-editor-wrap">
    <textarea spellcheck="false">import pandas as pd
import numpy as np

data = {
    "customer": ["Ahmed Hassan", "ahmed hassan", "Sara Ali", "Mona Youssef",
                 "Ahmed Hassan ", "Omar Khaled", "SARA ALI", "Mona youssef",
                 "Youssef Adel", "Omar Khaled", "OMAR KHALED"],
    "amount": ["1,200", "1200", "850", None,
               "2,400", "999", "850", "3,100",
               "N/A", "999", "unknown"],
}
df = pd.DataFrame(data)
df["amount"] = df["amount"].replace("N/A", np.nan)
df["amount_clean"] = pd.to_numeric(df["amount"].str.replace(",", "", regex=False), errors="coerce")
df["customer_clean"] = df["customer"].str.strip().str.lower()

print(df[["customer", "customer_clean", "amount", "amount_clean"]].to_string())
print()
print("Missing amounts after cleaning:", df["amount_clean"].isna().sum())
print("Distinct customers after cleaning:", df["customer_clean"].nunique())</textarea>
    <div class="mini-toolbar">
        <button class="mini-run-btn">▶ شغّل / Run</button>
        <span class="mini-status"></span>
    </div>
    <div class="output-box">— لسه متشغلش / not run yet —</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="text">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">ليه <code>df.isna().sum()</code> ماكانتش هتكتشف "N/A" كنص كقيمة ناقصة؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Why doesn't <code>df.isna().sum()</code> detect the text "N/A" as missing?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="bug"> ده Bug في Pandas / It's a bug in Pandas</label>
        <label><input type="radio" name="q1" value="text"> "N/A" نص عادي مش NaN حقيقي إلا لو استبدلته / "N/A" is plain text, not a real NaN unless replaced</label>
        <label><input type="radio" name="q1" value="numeric"> isna() بتشتغل بس على أعمدة رقمية / isna() only works on numeric columns</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="strip_comma">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">إيه اللي لازم تعمله قبل <code>pd.to_numeric()</code> عشان "1,200" تتحول لـ 1200.0 صح؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What must you do before <code>pd.to_numeric()</code> so "1,200" correctly becomes 1200.0?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="nothing"> لا حاجة، to_numeric بتفهمها لوحدها / Nothing, to_numeric understands it automatically</label>
        <label><input type="radio" name="q2" value="strip_comma"> تشيل الفاصلة بـ str.replace(",", "") الأول / Strip the comma with str.replace(",", "") first</label>
        <label><input type="radio" name="q2" value="dropna"> تعمل dropna() على العمود / Run dropna() on the column</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="casing">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">ليه <code>groupby("customer")</code> شافت 9 عملاء بدل 5 قبل التنضيف؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Why did <code>groupby("customer")</code> see 9 customers instead of 5 before cleaning?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="casing"> اختلاف حالة الحروف والمسافات الزيادة خلّى نفس الاسم يبان كنصوص مختلفة / Casing differences and extra whitespace made the same name look like different strings</label>
        <label><input type="radio" name="q3" value="missing_ids"> عشان فيه أرقام عملاء ناقصة / Because customer IDs were missing</label>
        <label><input type="radio" name="q3" value="wrong_column"> عشان groupby اتعمل على عمود غلط / Because groupby was run on the wrong column</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="silent">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">إيه الخطر في تفسير Pandas لتاريخ غامض زي "10/03/2024" بـ <code>format="mixed"</code>؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What's the risk in Pandas interpreting an ambiguous date like "10/03/2024" with <code>format="mixed"</code>?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="crash"> البرنامج هيوقف بخطأ / The program will crash</label>
        <label><input type="radio" name="q4" value="silent"> ممكن تتفسّر غلط (شهر/يوم معكوسين) من غير أي تحذير أو NaT / It could be parsed wrong (month/day swapped) with no warning or NaT at all</label>
        <label><input type="radio" name="q4" value="string"> هتفضل نص ومش هتتحول خالص / It will stay text and never convert</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ نضّف جدول مبيعات فوضوي بالكامل / Fully Clean a Messy Sales Table</h3>
    <div class="ar">🇪🇬 في المحرر المصغّر فوق (أو <a href="../playground/index.php">الـ Playground</a>)، اعمل DataFrame لـ 8 عمليات بيع بعمود <code>price</code> فيه قيم زي <code>["2,500", "N/A", "1,800", "3,000", "unknown", "2,500", "4,200", "1,800"]</code> وعمود <code>seller</code> فيه اسم بائع واحد متكرر بأشكال مختلفة زي <code>["Nour Adel", "nour adel ", "NOUR ADEL", ...]</code>. حوّل <code>price</code> لرقم مع معالجة كل القيم النصية غير الصالحة، وحد أسماء البائعين، واحسب إجمالي المبيعات الصحيح لكل بائع.</div>
    <div class="en">🇬🇧 In the mini editor above (or the <a href="../playground/index.php">Playground</a>), build a DataFrame for 8 sales with a <code>price</code> column containing values like <code>["2,500", "N/A", "1,800", "3,000", "unknown", "2,500", "4,200", "1,800"]</code> and a <code>seller</code> column with one seller's name repeated in different shapes like <code>["Nour Adel", "nour adel ", "NOUR ADEL", ...]</code>. Convert <code>price</code> to numbers handling every invalid text value, normalize the seller names, and compute the correct total sales per seller.</div>
</div>

<div class="exercise-box">
    <h3>✍️ تمرين إضافي / Extra Exercise</h3>
    <div class="ar">🇪🇬 افتح <a href="../playground/index.php">محرر الكود</a> واعمل عمود تواريخ فيه 5 تواريخ بصيغ مختلفة (ISO، يوم/شهر/سنة، واسم شهر مكتوب). استخدم <code>pd.to_datetime(..., format="mixed")</code> واطبع النتيجة، وحدد أي تاريخ فيها غامض (ممكن يتفسّر بأكتر من طريقة) واكتب جملة توضّح ليه.</div>
    <div class="en">🇬🇧 In the <a href="../playground/index.php">Playground</a>, create a date column with 5 dates in different formats (ISO, day/month/year, and a written month name). Use <code>pd.to_datetime(..., format="mixed")</code> and print the result, then identify which date is ambiguous (could be parsed more than one way) and write a sentence explaining why.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 المهارات دي — اكتشاف قيم ناقصة "متنكرة" في نص عادي، وتوحيد نصوص شبه متطابقة قبل التجميع — هي بالظبط اللي بيعمله محلل بيانات محترف كـ"تدقيق" قبل ما يثق في أي جدول جديد، بما فيه بيانات مشروع التخرج القادم. وبعد ما اتقنت تنضيف بيانات فوضوية على مستوى الصف والعمود، الخطوة الجاية هي نوع تاني من التحديات: بيانات مرتبة زمنيًا — هتشوف إزاي تكتشف اتجاه صاعد أو نازل عبر الوقت باستخدام Pandas.</div>
    <div class="en">🇬🇧 These skills — catching missing values "disguised" as plain text, and normalizing near-identical strings before aggregating — are exactly what a professional data analyst does as an "audit" before trusting any new table, including the upcoming capstone project's data. Now that you've mastered cleaning messy data at the row and column level, the next challenge is a different kind: time-ordered data — you'll see how to detect a rising or falling trend over time using Pandas.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>قيم "مفقودة" ممكن تتخبى كنص عادي زي "N/A" أو "unknown" — <code>isna()</code> ما بتكتشفهاش لوحدها، لازم <code>.replace(...)</code> أولًا.</li>
        <li>الفاصلة الألفية في أرقام مكتوبة كنص ("1,200") لازم تتشال بـ <code>str.replace(",", "")</code> قبل <code>pd.to_numeric()</code>.</li>
        <li>اختلاف حالة الحروف والمسافات الزيادة بيخلي نفس القيمة تبان كتكرارات مختلفة في <code>groupby</code> — الحل: <code>str.strip().str.lower()</code>.</li>
        <li><code>pd.to_datetime(عمود, format="mixed", errors="coerce")</code> بيفسّر كل قيمة تاريخ حسب صيغتها، لكن التواريخ الغامضة (زي 10/03/2024) ممكن تتفسّر غلط من غير أي تحذير.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="statistics-basics.php">← المرحلة السابقة</a>
    <a href="time-series-basics.php">المرحلة الجاية / Next: أساسيات السلاسل الزمنية →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
