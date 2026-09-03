<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'sql-for-analysis';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'SQL لتحليل البيانات';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">المرحلة 6 / Stage 6</span>
<h1>SQL لتحليل البيانات <span class="ltr">SQL for Analysis</span></h1>
<p class="subtitle">مش كل البيانات بتيجي في ملف Excel — غالبًا هتكون متخزنة في قاعدة بيانات، وSQL هي اللغة اللي بتسحبها بيها.</p>

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
    <div class="ar">🇪🇬 تفهم وتكتب استعلامات <code>SELECT</code>، <code>WHERE</code>، <code>GROUP BY</code>، <code>ORDER BY</code>، وتفهم الفرق بين <code>INNER JOIN</code> و<code>LEFT JOIN</code> لسحب وتلخيص بيانات من قاعدة بيانات.</div>
    <div class="en">🇬🇧 Understand and write <code>SELECT</code>, <code>WHERE</code>, <code>GROUP BY</code>, <code>ORDER BY</code> queries, and understand the difference between <code>INNER JOIN</code> and <code>LEFT JOIN</code> to pull and summarize data from a database.</div>
</div>

<div class="bi-block">
    <div class="ar">🇪🇬 <b>ملحوظة:</b> الاستعلامات في الدرس ده اتنفذت فعليًا على قاعدة بيانات SQLite حقيقية (باستخدام مكتبة <code>sqlite3</code> المدمجة في Python، من غير أي تنصيب إضافي) — مش مجرد أمثلة نظرية.</div>
    <div class="en">🇬🇧 <b>Note:</b> the queries in this lesson were actually executed against a real SQLite database (using Python's built-in <code>sqlite3</code> module, no extra install needed) — not just theoretical examples.</div>
</div>

<h2 id="understand">1) جدول البيانات / The Data Table</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 عندنا جدول <code>sales</code> فيه المنتج والفئة والسعر ورقم العميل، وجدول <code>customers</code> فيه اسم كل عميل. ده تمامًا زي الجداول اللي هتشتغل عليها في أي قاعدة بيانات حقيقية.</div>
    <div class="en">🇬🇧 We have a <code>sales</code> table with product, category, price, and customer id, and a <code>customers</code> table with each customer's name. This mirrors exactly the kind of tables you'd work with in a real database.</div>
</div>

<pre><code>CREATE TABLE sales (
    id INTEGER PRIMARY KEY,
    product TEXT,
    category TEXT,
    price REAL,
    customer_id INTEGER
);

CREATE TABLE customers (
    id INTEGER PRIMARY KEY,
    name TEXT
);

-- sales: (1,'Laptop','Electronics',750.0,1), (2,'Mouse','Accessories',15.0,2),
--        (3,'Keyboard','Accessories',25.0,1), (4,'Monitor','Electronics',200.0,3),
--        (5,'Headset','Accessories',40.0,2), (6,'Webcam','Electronics',30.0,3)
-- customers: (1,'Ali'), (2,'Sara'), (3,'Omar')</code></pre>

<h2>2) SELECT وWHERE / SELECT and WHERE</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <code>SELECT عمود1, عمود2 FROM جدول</code> بتختار أعمدة محددة من جدول. و<code>WHERE شرط</code> بتفلتر الصفوف اللي بترجع — زي <code>df[شرط]</code> في Pandas بالظبط.</div>
    <div class="en">🇬🇧 <code>SELECT col1, col2 FROM table</code> picks specific columns from a table. <code>WHERE condition</code> filters which rows come back — exactly like <code>df[condition]</code> in Pandas.</div>
</div>

<pre><code>SELECT product, price
FROM sales
WHERE price > 30;</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">('Laptop', 750.0)
('Monitor', 200.0)
('Headset', 40.0)</div>

<h2>3) GROUP BY وORDER BY / GROUP BY and ORDER BY</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <code>GROUP BY عمود</code> بتجمّع الصفوف حسب قيمة العمود ده (زي <code>groupby</code> في Pandas)، وبتقدر تستخدم <code>SUM()</code>، <code>COUNT()</code>، <code>AVG()</code> عليها. و<code>ORDER BY عمود DESC</code> بترتّب النتيجة تنازليًا.</div>
    <div class="en">🇬🇧 <code>GROUP BY column</code> groups rows by that column's value (like Pandas' <code>groupby</code>), and you can apply <code>SUM()</code>, <code>COUNT()</code>, <code>AVG()</code> to it. <code>ORDER BY column DESC</code> sorts the result descending.</div>
</div>

<pre><code>SELECT category, SUM(price) AS total_price, COUNT(*) AS num_items
FROM sales
GROUP BY category
ORDER BY total_price DESC;</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">('Electronics', 980.0, 3)
('Accessories', 80.0, 3)</div>

<h2 id="practice">💻 4) INNER JOIN مقابل LEFT JOIN / INNER JOIN vs LEFT JOIN</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 البيانات الحقيقية غالبًا موزّعة على جداول متعددة. <code>JOIN</code> (وده اختصار لـ <code>INNER JOIN</code>) بيربط جدولين بعمود مشترك، لكنه بيرجّع بس الصفوف اللي ليها تطابق في <b>الجدولين معًا</b>. لو عميل موجود في جدول <code>customers</code> بس معندوش ولا عملية بيع في <code>sales</code>، هيتشال من النتيجة تمامًا. أما <code>LEFT JOIN</code> فبيرجّع <b>كل صفوف الجدول الشمال</b> (هنا <code>customers</code>) حتى لو معاهاش تطابق، وبيحط <code>NULL</code> في أعمدة الجدول اليمين اللي معندهاش بيانات.</div>
    <div class="en">🇬🇧 Real data is often spread across multiple tables. <code>JOIN</code> (shorthand for <code>INNER JOIN</code>) links two tables on a shared column, but returns only rows that match in <b>both tables</b>. If a customer exists in <code>customers</code> but has no sale in <code>sales</code>, they're dropped from the result entirely. <code>LEFT JOIN</code> instead returns <b>every row from the left table</b> (here <code>customers</code>) even without a match, filling the right table's columns with <code>NULL</code> where there's no data.</div>
</div>

<pre><code>-- customers now also has Omar (id=3) who never bought anything.
-- sales: (1,'Laptop',customer_id=1), (2,'Mouse',customer_id=2)

-- INNER JOIN: Omar disappears completely
SELECT customers.name, sales.product
FROM customers
JOIN sales ON customers.id = sales.customer_id;

-- LEFT JOIN: Omar still appears, with a NULL product
SELECT customers.name, sales.product
FROM customers
LEFT JOIN sales ON customers.id = sales.customer_id;</code></pre>
<h3>الناتج الفعلي (بتنفيذ Python sqlite3 حقيقي) / Actual output (real Python sqlite3 execution)</h3>
<div class="output-box">INNER JOIN (only matching rows):
('Ali', 'Laptop')
('Sara', 'Mouse')

LEFT JOIN (all customers, even without sales):
('Ali', 'Laptop')
('Sara', 'Mouse')
('Omar', None)</div>

<div class="bi-block">
    <div class="ar">🇪🇬 ده بالظبط الفرق العملي المهم: لو محلل بيانات عايز يعرف "كل العملاء وكام عملية شراهم" علشان مثلًا يستهدف العملاء اللي معندهمش شراء بعرض ترويجي، لازم يستخدم <code>LEFT JOIN</code> — لأن <code>INNER JOIN</code> كان هيخفي عمر (Omar) تمامًا وكأنه مش موجود، رغم إنه عميل مسجل فعلاً.</div>
    <div class="en">🇬🇧 That's exactly the practically important difference: if an analyst wants to know "all customers and how many purchases each made" — say, to target customers with zero purchases with a promotion — they must use <code>LEFT JOIN</code>. <code>INNER JOIN</code> would have hidden Omar entirely, as if he didn't exist, even though he's a real registered customer.</div>
</div>

<div class="bi-block">
    <div class="ar">🇪🇬 الكود الفعلي اللي شغّل المثال فوق كان بايثون <code>sqlite3</code> — جرّبه بنفسك تحت، وضيف عميل تاني معندوش مبيعات وشوف الفرق بين الاتنين:</div>
    <div class="en">🇬🇧 The actual code that ran the example above was Python <code>sqlite3</code> — try it yourself below, and add another customer with no sales to see the difference between the two:</div>
</div>

<div class="mini-editor-wrap">
    <textarea spellcheck="false">import sqlite3

conn = sqlite3.connect(":memory:")
cur = conn.cursor()
cur.execute("CREATE TABLE sales (id INTEGER PRIMARY KEY, product TEXT, customer_id INTEGER)")
cur.execute("CREATE TABLE customers (id INTEGER PRIMARY KEY, name TEXT)")
cur.executemany("INSERT INTO sales VALUES (?, ?, ?)", [
    (1, "Laptop", 1),
    (2, "Mouse", 2),
    (3, "Keyboard", None),
])
cur.executemany("INSERT INTO customers VALUES (?, ?)", [
    (1, "Ali"),
    (2, "Sara"),
    (3, "Omar"),
])
conn.commit()

print("INNER JOIN (only matching rows):")
for row in cur.execute("""
    SELECT customers.name, sales.product
    FROM customers
    JOIN sales ON customers.id = sales.customer_id
"""):
    print(row)

print()
print("LEFT JOIN (all customers, even without sales):")
for row in cur.execute("""
    SELECT customers.name, sales.product
    FROM customers
    LEFT JOIN sales ON customers.id = sales.customer_id
"""):
    print(row)

conn.close()</textarea>
    <div class="mini-toolbar">
        <button class="mini-run-btn">▶ شغّل / Run</button>
        <span class="mini-status"></span>
    </div>
    <div class="output-box">— لسه متشغلش / not run yet —</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="left">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">عايز تعرف كل العملاء حتى اللي معندهمش أي عملية شراء — إيه نوع الـ JOIN المناسب؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">You want all customers, even those with zero purchases — which JOIN type fits?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="inner"> INNER JOIN</label>
        <label><input type="radio" name="q1" value="left"> LEFT JOIN</label>
        <label><input type="radio" name="q1" value="where"> WHERE بس / WHERE alone</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="drop">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">إيه اللي بيحصل لعميل معندوش أي مبيعات لو استخدمت INNER JOIN بينه وبين جدول المبيعات؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What happens to a customer with no sales when you use INNER JOIN against the sales table?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="null"> بيظهر مع NULL في عمود المنتج / Appears with NULL in the product column</label>
        <label><input type="radio" name="q2" value="drop"> بيختفي تمامًا من النتيجة / Disappears entirely from the result</label>
        <label><input type="radio" name="q2" value="error"> الاستعلام بيوقف بخطأ / The query errors out</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ لاقي العملاء اللي معندهمش مشتريات / Find Customers with No Purchases</h3>
    <div class="ar">🇪🇬 في المحرر المصغّر فوق (أو <a href="../playground/index.php">الـ Playground</a>)، عدّل الكود عشان يضيف عميل رابع اسمه "Youssef" معندوش أي صف في جدول <code>sales</code>. شغّل الاستعلامين (INNER وLEFT) وقارن، وبعدين عدّل استعلام الـ LEFT JOIN بشرط <code>WHERE sales.product IS NULL</code> عشان يطلعلك بس أسماء العملاء اللي معندهمش أي مشتريات.</div>
    <div class="en">🇬🇧 In the mini editor above (or the <a href="../playground/index.php">Playground</a>), edit the code to add a fourth customer named "Youssef" with no row in the <code>sales</code> table. Run both queries (INNER and LEFT) and compare, then modify the LEFT JOIN query with a <code>WHERE sales.product IS NULL</code> condition so it returns only the names of customers with zero purchases.</div>
</div>

<div class="exercise-box">
    <h3>✍️ تمرين إضافي / Extra Exercise</h3>
    <div class="ar">🇪🇬 اكتب استعلام SQL (على الورق أو في الملاحظات) يسحب من جدول <code>sales</code> بس المنتجات في فئة "Electronics"، ويرتبها من الأعلى سعر للأقل بـ <code>ORDER BY price DESC</code>.</div>
    <div class="en">🇬🇧 Write a SQL query (on paper or in notes) that pulls from the <code>sales</code> table only products in the "Electronics" category, ordered highest price first with <code>ORDER BY price DESC</code>.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 مشروع التخرج بيعتمد على Pandas مباشرة مش SQL، لكن نفس منطق <code>GROUP BY</code> اللي اتعلمته هنا هو المنطق اللي وراء <code>groupby()</code> في Pandas — لو البيانات يومًا ما جت من قاعدة بيانات حقيقية بدل ملف، هتستخدم بالظبط استعلامات زي اللي اتعلمتها هنا لسحبها الأول.</div>
    <div class="en">🇬🇧 The capstone project relies on Pandas directly rather than SQL, but the same <code>GROUP BY</code> logic you learned here is exactly the logic behind Pandas' <code>groupby()</code>. If the data ever came from a real database instead of a file, you'd use queries just like these to pull it first.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li><code>SELECT عمود FROM جدول WHERE شرط</code> = اختيار وفلترة صفوف.</li>
        <li><code>GROUP BY عمود</code> مع <code>SUM()/COUNT()/AVG()</code> = تجميع حسب فئة.</li>
        <li><code>ORDER BY عمود DESC/ASC</code> = ترتيب النتيجة.</li>
        <li><code>INNER JOIN</code> = بس الصفوف المتطابقة في الجدولين. <code>LEFT JOIN</code> = كل صفوف الجدول الشمال حتى لو من غير تطابق (بـ NULL للناقص).</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="data-visualization.php">← المرحلة السابقة</a>
    <a href="statistics-basics.php">المرحلة الجاية / Next: أساسيات الإحصاء →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
