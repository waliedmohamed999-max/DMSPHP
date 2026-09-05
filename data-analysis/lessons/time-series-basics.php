<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'time-series-basics';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'أساسيات السلاسل الزمنية';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">المرحلة 9 / Stage 9</span>
<h1>أساسيات السلاسل الزمنية <span class="ltr">Time Series Basics</span></h1>
<p class="subtitle">بيانات مرتبطة بالوقت — اتجاهات، موسمية، ومتوسطات متحركة بـ Pandas. لما البيانات مرتبة بالتاريخ، بيبقى عندك أسئلة تانية تمامًا: هل في اتجاه صاعد؟ إيه الاتجاه العام لو استبعدنا التذبذب اليومي؟</p>

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
    <div class="ar">🇪🇬 تبني DataFrame بفهرس زمني حقيقي (<code>DatetimeIndex</code>)، تجمّع البيانات اليومية لأسابيع بـ <code>resample()</code>، تحسب متوسط متحرك بـ <code>rolling()</code> عشان تشيل التذبذب اليومي وتشوف الاتجاه العام، وتقارن بين نص الفترة الأول والتاني عشان تثبت وجود اتجاه صاعد أو نازل بالأرقام مش بالعين بس.</div>
    <div class="en">🇬🇧 Build a DataFrame with a real time index (<code>DatetimeIndex</code>), aggregate daily data into weeks with <code>resample()</code>, compute a rolling average with <code>rolling()</code> to remove daily noise and see the overall trend, and compare the first half of the period to the second half to prove a rising or falling trend with numbers, not just by eye.</div>
</div>

<h2 id="understand">1) بيانات مرتبة بالوقت مع اتجاه وتشويش / Time-Indexed Data with a Trend and Noise</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 هنبني بيانات زيارات موقع يومية لمدة 90 يوم. عشان تكون واقعية، مش هنكتبها يدويًا رقم رقم — هنولّدها ببرمجية: اتجاه صاعد ثابت من 100 لـ 250 زيارة (<code>np.linspace</code>) زائد تشويش عشوائي (<code>np.random.normal</code>) يمثّل التذبذب الطبيعي بين الأيام. استخدام <code>np.random.seed(42)</code> بيضمن إن نفس الأرقام "العشوائية" تطلع كل مرة تشغّل الكود — عشان الناتج يبقى قابل لإعادة الإنتاج بالظبط.</div>
    <div class="en">🇬🇧 We'll build 90 days of daily website-visit data. To be realistic, we won't type numbers one by one — we'll generate it: a steady upward trend from 100 to 250 visits (<code>np.linspace</code>) plus random noise (<code>np.random.normal</code>) representing natural day-to-day fluctuation. Using <code>np.random.seed(42)</code> guarantees the same "random" numbers come out every time you run the code — so the output is exactly reproducible.</div>
</div>

<pre><code>import pandas as pd
import numpy as np

np.random.seed(42)

n_days = 90
dates = pd.date_range(start="2024-01-01", periods=n_days, freq="D")
trend = np.linspace(100, 250, n_days)
noise = np.random.normal(loc=0, scale=15, size=n_days)
visits = (trend + noise).round().astype(int)
visits = np.clip(visits, 0, None)

df = pd.DataFrame({"date": dates, "visits": visits})
df = df.set_index("date")

print("First 10 rows:")
print(df.head(10).to_string())
print()
print("Last 5 rows:")
print(df.tail(5).to_string())
print()
print("Index type:", type(df.index))
print("Shape:", df.shape)</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">First 10 rows:
            visits
date
2024-01-01     107
2024-01-02     100
2024-01-03     113
2024-01-04     128
2024-01-05     103
2024-01-06     105
2024-01-07     134
2024-01-08     123
2024-01-09     106
2024-01-10     123

Last 5 rows:
            visits
date
2024-03-26     236
2024-03-27     259
2024-03-28     252
2024-03-29     240
2024-03-30     258

Index type: <class 'pandas.DatetimeIndex'>
Shape: (90, 1)</div>

<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ إن <code>date</code> بقى Index مش عمود عادي — ده اللي بيخلي <code>resample()</code> و<code>rolling()</code> شغّالين، لأنهم محتاجين يعرفوا "ترتيب زمني" واضح. ولاحظ كمان إن الزيارات في أول 10 أيام حوالين 100-130، وفي آخر 5 أيام حوالين 236-259 — الاتجاه الصاعد ظاهر، بس فيه تذبذب واضح كمان (128 يوم 4 وبعدها 103 يوم 5).</div>
    <div class="en">🇬🇧 Notice <code>date</code> became the Index, not a regular column — that's what makes <code>resample()</code> and <code>rolling()</code> work, since they need a clear "time order" to operate on. Also notice visits in the first 10 days hover around 100-130, and in the last 5 days around 236-259 — the upward trend is visible, but there's also clear noise (128 on day 4, then 103 on day 5).</div>
</div>

<h2>2) التجميع الأسبوعي / Weekly Resampling</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <code>df["visits"].resample("W").sum()</code> بتجمّع البيانات اليومية في مجموعات أسبوعية وتجمع القيم داخل كل أسبوع. ده بيقلل عدد النقاط ("90 يوم" بيبقى "13 أسبوع تقريبًا") وبيسهّل شوف الاتجاه العام من غير غرق في تفاصيل كل يوم.</div>
    <div class="en">🇬🇧 <code>df["visits"].resample("W").sum()</code> groups the daily data into weekly buckets and sums the values within each week. This reduces the number of points ("90 days" becomes "about 13 weeks") and makes it easier to see the overall trend without drowning in daily detail.</div>
</div>

<pre><code>print("Weekly resample (sum) - first 6 weeks:")
weekly = df["visits"].resample("W").sum()
print(weekly.head(6).to_string())</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">Weekly resample (sum) - first 6 weeks:
date
2024-01-07     790
2024-01-14     791
2024-01-21     844
2024-01-28     941
2024-02-04    1069
2024-02-11    1101
Freq: W-SUN</div>

<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ الاتجاه الصاعد باين بوضوح أكتر دلوقتي على المستوى الأسبوعي: 790 → 791 → 844 → 941 → 1069 → 1101. التذبذب اليومي اختفى تقريبًا لما جمعنا القيم في مجموعات أكبر.</div>
    <div class="en">🇬🇧 Notice the upward trend is now much clearer at the weekly level: 790 → 791 → 844 → 941 → 1069 → 1101. The daily noise almost disappeared once we aggregated values into bigger buckets.</div>
</div>

<h2 id="practice">💻 3) المتوسط المتحرك / The Rolling Average</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <code>rolling(7).mean()</code> بتحسب متوسط كل 7 أيام متتالية وتحركه يوم بيوم — أول 6 قيم بترجع <code>NaN</code> لأنه لسه مفيش 7 أيام كفاية للحساب. النتيجة خط أنعم بكتير من البيانات الخام، وده أفضل طريقة تشوف بيها "الاتجاه الحقيقي" من غير ما التذبذب اليومي يشوّش عليك — نفس فكرة الفرق بين المتوسط والقيم الفردية اللي اتعلمتها في أساسيات الإحصاء.</div>
    <div class="en">🇬🇧 <code>rolling(7).mean()</code> computes the average of each consecutive 7-day window and slides it forward day by day — the first 6 values return <code>NaN</code> because there aren't yet 7 days to compute from. The result is a much smoother line than the raw data, and it's the best way to see the "real trend" without daily noise distracting you — the same idea as the mean-vs-individual-values distinction from Statistics Basics.</div>
</div>

<pre><code>print("7-day rolling average - first 12 days:")
df["rolling_7"] = df["visits"].rolling(7).mean()
print(df.head(12).to_string())</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">7-day rolling average - first 12 days:
            visits   rolling_7
date
2024-01-01     107         NaN
2024-01-02     100         NaN
2024-01-03     113         NaN
2024-01-04     128         NaN
2024-01-05     103         NaN
2024-01-06     105         NaN
2024-01-07     134  112.857143
2024-01-08     123  115.142857
2024-01-09     106  116.000000
2024-01-10     123  117.428571
2024-01-11     110  114.857143
2024-01-12     112  116.142857</div>

<h2>4) إثبات الاتجاه بالأرقام / Proving the Trend with Numbers</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 النظر للرسم أو للجدول ممكن يخدعك أو يكون شخصي. الطريقة الأدق: تقسم الفترة نصين وتقارن متوسط كل نص. لو النص التاني أعلى بشكل واضح، ده دليل رقمي على اتجاه صاعد حقيقي مش مجرد تذبذب عشوائي.</div>
    <div class="en">🇬🇧 Looking at a chart or table can be misleading or subjective. The more precise approach: split the period into two halves and compare each half's mean. If the second half is clearly higher, that's numeric proof of a real upward trend, not just random noise.</div>
</div>

<pre><code>mid = len(df) // 2
first_half = df["visits"].iloc[:mid]
second_half = df["visits"].iloc[mid:]

print("First-half mean visits:", first_half.mean())
print("Second-half mean visits:", second_half.mean())
print("Difference (second - first):", second_half.mean() - first_half.mean())
print("Percent increase:", round((second_half.mean() - first_half.mean()) / first_half.mean() * 100, 1), "%")</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">First-half mean visits: 133.88888888888889
Second-half mean visits: 213.2
Difference (second - first): 79.3111111111111
Percent increase: 59.2 %</div>

<div class="bi-block">
    <div class="ar">🇪🇬 نص الفترة التاني متوسطه أعلى من الأول بـ 59.2% تقريبًا — رقم واضح ومحدد نقدر نقوله لصاحب القرار بدل جملة عامة زي "شكل الزيارات بتزيد". ده بالظبط الفرق بين "أنا حاسس إن في اتجاه" و"أنا مثبت إن في اتجاه بالأرقام".</div>
    <div class="en">🇬🇧 The second half's mean is about 59.2% higher than the first half — a clear, specific number we can report to a decision-maker instead of a vague statement like "visits seem to be growing." This is exactly the difference between "I feel there's a trend" and "I've proven there's a trend with numbers."</div>
</div>

<h2>5) رسم الاتجاه مع المتوسط المتحرك / Charting the Trend with the Rolling Average</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 زي ما اتعلمنا في درس تصور البيانات، خط رسم بياني واحد بيوضّح الفكرة أسرع من أي جدول أرقام. هنا رسمنا الزيارات اليومية الخام (باهتة) فوق بعض المتوسط المتحرك لـ 7 أيام (خط واضح وأنعم) عشان تشوف بعينك إزاي الخط الأنعم بيفضح الاتجاه الصاعد اللي كان مختفي وسط التذبذب اليومي.</div>
    <div class="en">🇬🇧 As learned in Data Visualization, one chart communicates the idea faster than any table of numbers. Here we plotted the raw daily visits (faded) underneath the 7-day rolling average (a clear, smooth line) so you can see with your own eyes how the smoother line reveals the upward trend that was hidden inside the daily noise.</div>
</div>

<pre><code>import matplotlib
matplotlib.use("Agg")
import matplotlib.pyplot as plt

plt.figure(figsize=(6, 4), dpi=80)
plt.plot(df.index, df["visits"], color="#7c9cff", alpha=0.5, label="Daily visits")
plt.plot(df.index, df["rolling_7"], color="#62d9a8", linewidth=2, label="7-day rolling avg")
plt.title("Website Visits with 7-Day Rolling Average")
plt.xlabel("Date")
plt.ylabel("Visits")
plt.legend()
plt.tight_layout()
plt.savefig("chart_timeseries.png")</code></pre>

<h3>الناتج الفعلي / Actual output</h3>
<img class="render-box" alt="Line chart of daily website visits with a 7-day rolling average overlay showing a clear upward trend" src="data:image/png;base64,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WTs/QRAEoW+Sm5urGpp0B3q9AFN8da9UQRAEoW+TlpaG7oK4oAVBEATBB4gAC4IgCIIP6PUu6JbgRBHpxikQ84g2QRCEzqbPCjAni3ACiHn8mCBQfGNiYtTYuM6YuiMIgoC+LsAUX47v4oB5sXgEDS/I2NOY81bNg80FQRA6moC+6nbmDy3Fl/NxBUHj7++vhrNzqD2/J2IFC4LQWfRJH5uO+YrlK7hCfy8kN0AQhM6kTwpwb2bjxo1qDJkgCILQvRH/azdhy5YtSjxpfYWHh6sxYt7GILleYGCgWue///2vSiK64447OuzYzNv35jUbNmxQHchGjhzZYccgCEL3ocEOrNgMJMYCQ1N8fTQ9F7GAuwnvvfcebr/9drz55pt44IEHMH36dMyePRt79uxpcd3169fj999/77Rj82b75tf85z//wSeffNJpxyMIgm+prDZuxeVtF/Df9wJFZejTiAXcjTjiiCPwwgsvqPsVFRW4/PLLcdZZZ+HXX39VbmValkwao2U8adIkx3q8T+vTTGlpqRrMzSHjGgokk88mTpzo9NqSkhIsW7bM6bW0yNkvldu2bn/NmjUqS7i+vh6zZs1SA8z1a3JycrBt2zbVb5UXFePHj8fo0aNdriMIQs+kvMr4v7qNVZzllUB2PlBWCRw0inkXnl9fWwfsywf6RQKRYeg1iAXcTQkLC8OTTz6JlStXYteuXUo833rrLbz66qs455xzcNlllzleS7fzhx9+6LQ+3djXXnutyubVXH311UogXe2L2zNb29dff73jsXn73Oa5556L1157TR1PVlaW02tYwsOLhbVr16rlmzZtcruOIAg9EwpoewS4ssb4v7QCKCn3TvB3ZgEFpehViAUM4LedhjulswgNBiYOa9sgidjYWDVM4tRTT8WUKVOUoJWVleGaa65Bfn6+KqVyBctnKLjPP/88HnroISXgfP2RRx7Z7LW0qs877zwl7n/961+RkZGh9nP88cc3e+1nn32GJUuWYMSIES73O2HCBJx00klISkrCbbfdpp679dZbPa4jCELPtIDr64G6eiDAv3XrV5l+bzNzgegI7/YXEYJehVjA3bxbF93DbBjy+OOPq7jwU089hXfeeUe5cvfv3+9x/SuuuEJZnNzOc889p6xad1x66aVKgHUMlxar1a1NKKozZ85UbmTGqisrGy+FPdCWdQRB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eb0e9zl69Gh7UlKSfenSpc32ef3116vtLlmyxO35uduH/pwTEhLsEydOVL8tzzzzjNvtXHXVVerz4t+o9XdQ/03rv9uXX37Z5TaWL19uHzNmjH3kyJH22NhY+xlnnGGvqalRyxoaGuxnnnmmOmd+rrNnz7aXl5e3uJ5m37596m+Jv3fu8LSPjtrOxo0b1XvAz23atGn29tBjBHj//v32f//73+qNIffdd5991qxZ6j6f4wf35ptvqscffvihesznPa2n+eqrr+yXXHKJ+oK5E2BP+zDDPwJPAuxuOx988IH9t99+U89RQIODg+233367evzTTz+pLwzFiuufeuqp9n/84x+O9c3r8UvF8zVzwQUX2B988EGPAuxpHxr+kbQkwJ5eSwHme+wNPF7+SJFPPvlE/cDo95rH9uc//1nd37x5s/ph4UVGS+uRHTt22A8//HD7H/7wB48C3J59tLSdL774wvGDWl9fr/7AeUwkJydHCcrvv/+uHnPdc845R93/+eefndbjOdx4441O+6OQP/zwwx4FuL37sML9uBNg8uyzz6p96gu0sLAw9V6QBx54QAk+90WBo0h///33La5HuD9eANxxxx0eBdjTPvj5cduEnym/s59//rnX2/noo4/UcerP/4QTTlAXwhoK+2uvvabuUxh5Icz1c3NzndZ76KGH7DNmzHDa37fffqv+dvk37UmA3e2DPPfccw4h4wV9YmKivSVc/Q5ScPg33RJvvfWWfevWrep+SUmJej/feecd9XjRokXKUODzvFCcP3++/emnn25xPfPfEr/fnoTT0z46ejv8nrRXgHtMDJiuwiuvvNLh4ho9erTj/u7du5Ub58wzz1SPTznlFOTn5yu3rKf1CF0uf/3rX/HYY4953L+nfbQGd9uhG0O7Q+jeortOH+eXX36JU089Ff369VPPXXbZZfjss8/UMj5vXm/QoEFO5/fRRx8pV9L8+fM9HpenfXQk9fX12LBhg3JxeuJ//ud/HC45fmbWY7388svVfbqG6Ob+/vvvW1yvoaEB11xzDRYuXAh/f3+P+2/rPrzZDt3XRx55pHqO7l1z557vvvtOueX1drmu/hwOOeQQp/VGjhzp9FnTTcj1r7vuOo/H1J59tBa6drk97T6m6zIsLMzpu33JJZeoffF7yr8LfSxXX321o4uddT3y5z//WZ2rpzBCS/s4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">

<div class="bi-block">
    <div class="ar">🇪🇬 الصورة دي مش رسمة تعليمية — هي ناتج فعلي لتنفيذ الكود اللي فوق بمكتبة Matplotlib الحقيقية. لاحظ الخط الباهت (الزيارات اليومية) بيتذبذب صعود ونزول باستمرار، بينما الخط الأخضر السميك (المتوسط المتحرك) بيطلع بثبات من حوالين 110 لحوالين 250 — بالظبط الاتجاه اللي أثبتناه بالأرقام فوق.</div>
    <div class="en">🇬🇧 This image isn't a mockup — it's the real output of running the code above with actual Matplotlib. Notice the faded line (daily visits) keeps jittering up and down, while the thick green line (rolling average) climbs steadily from around 110 to around 250 — exactly the trend we proved with numbers above.</div>
</div>

<div class="bi-block">
    <div class="ar">🇪🇬 جرّب بنفسك — غيّر حجم النافذة في <code>rolling()</code> من 7 لـ 14 يوم وشوف إزاي الخط بيبقى أنعم، أو غيّر <code>scale</code> في <code>np.random.normal</code> لرقم أكبر وشوف إزاي التشويش بيزيد:</div>
    <div class="en">🇬🇧 Try it yourself — change the <code>rolling()</code> window from 7 to 14 days and see how much smoother the line gets, or change <code>scale</code> in <code>np.random.normal</code> to a bigger number and see how the noise increases:</div>
</div>

<div class="mini-editor-wrap">
    <textarea spellcheck="false">import pandas as pd
import numpy as np

np.random.seed(42)
n_days = 90
dates = pd.date_range(start="2024-01-01", periods=n_days, freq="D")
trend = np.linspace(100, 250, n_days)
noise = np.random.normal(loc=0, scale=15, size=n_days)
visits = np.clip((trend + noise).round().astype(int), 0, None)
df = pd.DataFrame({"date": dates, "visits": visits}).set_index("date")

df["rolling_7"] = df["visits"].rolling(7).mean()
df["rolling_14"] = df["visits"].rolling(14).mean()

print(df.tail(10).to_string())
print()
mid = len(df) // 2
print("First-half mean:", df["visits"].iloc[:mid].mean())
print("Second-half mean:", df["visits"].iloc[mid:].mean())</textarea>
    <div class="mini-toolbar">
        <button class="mini-run-btn">▶ شغّل / Run</button>
        <span class="mini-status"></span>
    </div>
    <div class="output-box">— لسه متشغلش / not run yet —</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="datetimeindex">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">إيه اللي لازم يكون عمود التاريخ عشانه عشان <code>resample()</code> و<code>rolling()</code> يشتغلوا؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What does the date column need to be for <code>resample()</code> and <code>rolling()</code> to work?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="string"> نص عادي / A plain string</label>
        <label><input type="radio" name="q1" value="datetimeindex"> Index من نوع DatetimeIndex / A DatetimeIndex</label>
        <label><input type="radio" name="q1" value="int"> رقم صحيح / An integer</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="sum_weekly">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">إيه اللي بيعمله <code>df["visits"].resample("W").sum()</code>؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What does <code>df["visits"].resample("W").sum()</code> do?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="sum_weekly"> بيجمع القيم اليومية في مجموعات أسبوعية / Sums daily values into weekly buckets</label>
        <label><input type="radio" name="q2" value="drop"> بيشيل الأسابيع الناقصة / Drops incomplete weeks</label>
        <label><input type="radio" name="q2" value="sort"> بيرتب البيانات تصاعديًا / Sorts the data ascending</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="nan_start">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">ليه أول 6 قيم في عمود <code>rolling(7).mean()</code> طلعت <code>NaN</code>؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Why are the first 6 values in a <code>rolling(7).mean()</code> column <code>NaN</code>?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="missing_data"> لأن فيه بيانات ناقصة في الأصل / Because the original data has missing values</label>
        <label><input type="radio" name="q3" value="nan_start"> لسه مفيش 7 أيام كفاية عشان يتحسب المتوسط / There aren't yet 7 days available to compute the average</label>
        <label><input type="radio" name="q3" value="error"> ده خطأ لازم يتصلح / It's a bug that needs fixing</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="halves">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">إيه أدق طريقة تثبت بيها اتجاه صاعد بالأرقام بدل ما تعتمد على النظر للرسم بس؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What's the more precise way to prove an upward trend with numbers instead of relying only on looking at a chart?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="halves"> تقارن متوسط نص الفترة الأول بمتوسط النص التاني / Compare the first half's mean to the second half's mean</label>
        <label><input type="radio" name="q4" value="last_value"> تقارن أول قيمة بآخر قيمة بس / Compare only the first value to the last value</label>
        <label><input type="radio" name="q4" value="max"> تشوف أعلى قيمة في السلسلة / Look at the maximum value in the series</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ حلّل اتجاه مبيعات شهرين / Analyze a Two-Month Sales Trend</h3>
    <div class="ar">🇪🇬 في المحرر المصغّر فوق (أو <a href="../playground/index.php">الـ Playground</a>)، اعمل <code>pd.date_range</code> لـ 60 يوم، ولّد مبيعات يومية باتجاه <b>نازل</b> هالمرة (استخدم <code>np.linspace(300, 150, 60)</code> زائد تشويش)، احسب المتوسط المتحرك لـ 7 أيام، وقارن متوسط أول 30 يوم بمتوسط آخر 30 يوم عشان تثبت الاتجاه النازل بالأرقام.</div>
    <div class="en">🇬🇧 In the mini editor above (or the <a href="../playground/index.php">Playground</a>), create a <code>pd.date_range</code> for 60 days, generate daily sales with a <b>downward</b> trend this time (use <code>np.linspace(300, 150, 60)</code> plus noise), compute a 7-day rolling average, and compare the first 30 days' mean to the last 30 days' mean to prove the downward trend with numbers.</div>
</div>

<div class="exercise-box">
    <h3>✍️ تمرين إضافي / Extra Exercise</h3>
    <div class="ar">🇪🇬 افتح <a href="../playground/index.php">محرر الكود</a> وكرّر نفس بيانات الزيارات في الدرس، بس جرّب <code>resample("M").mean()</code> بدل <code>"W"</code> لتجميع شهري، واطبع النتيجة. اكتب جملة توضّح إمتى تختار تجميع أسبوعي وإمتى تختار شهري.</div>
    <div class="en">🇬🇧 In the <a href="../playground/index.php">Playground</a>, repeat the same visits data from the lesson, but try <code>resample("M").mean()</code> instead of <code>"W"</code> for monthly aggregation, and print the result. Write a sentence explaining when you'd choose weekly aggregation versus monthly.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 دلوقتي عندك كل الأدوات اللي محتاجها: تنضّف بيانات فوضوية، وتحلّل بيانات مرتبة زمنيًا لاكتشاف اتجاهات حقيقية بالأرقام والرسم. في مشروع التخرج الجاي هتدمج كل حاجة اتعلمتها في المسار ده — من التحميل والتنظيف للاستكشاف والتصوير والإحصاء — في قصة تحليل واحدة متكاملة من البيانات الخام للاستنتاج النهائي.</div>
    <div class="en">🇬🇧 You now have all the tools you need: cleaning messy data, and analyzing time-ordered data to detect real trends with numbers and charts. In the upcoming capstone project you'll combine everything you learned in this track — from loading and cleaning to exploration, visualization, and statistics — into one complete analysis story from raw data to a final conclusion.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>بيانات السلاسل الزمنية محتاجة <code>DatetimeIndex</code> حقيقي عشان <code>resample()</code> و<code>rolling()</code> يشتغلوا.</li>
        <li><code>resample("W").sum()</code> (أو أي وحدة زمنية تانية) بيجمّع بيانات يومية لمجموعات أكبر ويقلل التذبذب.</li>
        <li><code>rolling(N).mean()</code> بيحسب متوسط متحرك بيتحرك مع البيانات — أول N-1 قيمة بتبقى NaN، والنتيجة خط أنعم بيوضّح الاتجاه الحقيقي.</li>
        <li>لإثبات اتجاه بالأرقام، قارن متوسط أول نص الفترة بمتوسط تاني نص — مش مجرد النظر للرسم.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="messy-real-world-data.php">← المرحلة السابقة</a>
    <a href="capstone-analysis.php">المرحلة الجاية / Next: مشروع تحليل بيانات كامل →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
