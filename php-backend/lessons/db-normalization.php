<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'db-normalization';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'التطبيع — Normalization';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">Stage 8 · Database Design</span>
<h1>التطبيع <span class="ltr">(Normalization)</span></h1>
<p class="subtitle">ليه التكرار مشكلة، و1NF/2NF/3NF بمثال حقيقي خطوة بخطوة. <span class="ltr">Why duplication is a problem, and 1NF/2NF/3NF through a real step-by-step example.</span></p>

<div class="step-tracker">
    <a href="#read">📖 Read</a>
    <a href="#understand">🧠 Understand</a>
    <a href="#lab">🗄️ Database Lab</a>
    <a href="#quiz">🧠 Quiz</a>
    <a href="#challenge">🛠️ Challenge</a>
    <a href="#project">🚀 Project</a>
</div>

<h2 id="read">📖 الهدف / Goal</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 تفهم بالظبط ليه تكرار نفس المعلومة في أكتر من صف مشكلة حقيقية (مش مجرد "أسلوب مش مرتب")، وتقدر تاخد جدول واحد فيه تكرار وتحوّله خطوة بخطوة (1NF ← 2NF ← 3NF) لمجموعة جداول منظمة كل واحدة فيها مسؤولية واحدة بس.</div>
    <div class="en">🇬🇧 Understand exactly why repeating the same fact across multiple rows is a real problem (not just "messy style"), and be able to take one duplicated table and transform it step by step (1NF → 2NF → 3NF) into a set of clean tables, each with a single responsibility.</div>
</div>

<h2 id="understand">🧠 ليه التكرار مشكلة؟ / Why Duplication Is a Problem</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 تخيل جدول <code>orders</code> واحد بيخزن بيانات العميل (اسم، إيميل، عنوان) وبيانات المنتج جوه كل صف طلب. لو نفس العميل عمل 3 طلبات، بياناته هتتكرر 3 مرات. الكود ده حقيقي وشغال فعليًا — شوف الناتج:</div>
    <div class="en">🇬🇧 Imagine a single <code>orders</code> table storing customer data (name, email, address) and product data inside every order row. If the same customer places 3 orders, their data repeats 3 times. This code is real and actually runs — see the output:</div>
</div>

<pre><code>&lt;?php
$pdo = new PDO('sqlite::memory:');
$pdo-&gt;exec('CREATE TABLE orders_flat (
    order_id INTEGER PRIMARY KEY,
    customer_name TEXT NOT NULL,
    customer_email TEXT NOT NULL,
    customer_address TEXT NOT NULL,
    product_name TEXT NOT NULL,
    product_price REAL NOT NULL,
    quantity INTEGER NOT NULL,
    order_date TEXT NOT NULL
)');

$rows = [
    [1, 'Sara Ali', 'sara@example.com', '12 Nile St, Cairo', 'Keyboard', 45.99, 1, '2024-01-05'],
    [2, 'Sara Ali', 'sara@example.com', '12 Nile St, Cairo', 'Mouse', 19.99, 2, '2024-01-18'],
    [3, 'Omar Khaled', 'omar@example.com', '5 Tahrir Sq, Cairo', 'Monitor', 149.00, 1, '2024-02-01'],
    [4, 'Sara Ali', 'sara@example.com', '12 Nile St, Cairo', 'Monitor', 149.00, 1, '2024-02-10'],
];
$stmt = $pdo-&gt;prepare('INSERT INTO orders_flat VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
foreach ($rows as $r) { $stmt-&gt;execute($r); }

foreach ($pdo-&gt;query('SELECT * FROM orders_flat ORDER BY order_id')-&gt;fetchAll(PDO::FETCH_ASSOC) as $row) {
    echo "#{$row['order_id']} {$row['customer_name']} | {$row['customer_email']} | {$row['customer_address']} | {$row['product_name']} \${$row['product_price']}" . PHP_EOL;
}</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">order_id customer_name  customer_email      customer_address    product_name price   qty  order_date
1        Sara Ali       sara@example.com    12 Nile St, Cairo   Keyboard     45.99   1    2024-01-05
2        Sara Ali       sara@example.com    12 Nile St, Cairo   Mouse        19.99   2    2024-01-18
3        Omar Khaled    omar@example.com    5 Tahrir Sq, Cairo  Monitor      149     1    2024-02-01
4        Sara Ali       sara@example.com    12 Nile St, Cairo   Monitor      149     1    2024-02-10</div>

<div class="bi-block">
    <div class="ar">🇪🇬 "Sara Ali" وإيميلها وعنوانها اتكرروا 3 مرات — نفس المعلومة بالظبط. المشاكل اللي ده بيسببها ليها اسم رسمي، Anomalies:<br>
    • <b>Update Anomaly</b>: لو Sara غيّرت عنوانها، لازم تحدّث 3 صفوف — لو نسيت واحد، بقى عندك تضارب (نفس العميل بعنوانين مختلفين!).<br>
    • <b>Insertion Anomaly</b>: مينفعش تسجل عميل جديد "مهتم" من غير ما يكون عمل طلب فعلي، لأن الجدول مبني حول الطلب مش العميل.<br>
    • <b>Deletion Anomaly</b>: لو مسحت الطلب الوحيد بتاع عميل، بتفقد بياناته بالكامل من النظام من غير قصد.</div>
    <div class="en">🇬🇧 "Sara Ali" and her email/address repeated 3 times — the exact same fact. These problems have a formal name, Anomalies:<br>
    • <b>Update Anomaly</b>: if Sara changes her address, you must update 3 rows — miss one and you now have the same customer with two different addresses.<br>
    • <b>Insertion Anomaly</b>: you can't record a new "interested" customer without an actual order, because the table is built around the order, not the customer.<br>
    • <b>Deletion Anomaly</b>: deleting a customer's only order accidentally wipes out all record of them.</div>
</div>

<h2>1NF — الصيغة الطبيعية الأولى / First Normal Form</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>1NF</b> بتطلب حاجة واحدة: كل عمود يحتوي قيمة "ذرية" (Atomic) واحدة — مش قايمة داخل نص واحد. لو عمود <code>products</code> بيخزن "Keyboard,Mouse" كنص واحد، ده مخالف لـ 1NF. الحل: صف منفصل لكل قيمة.</div>
    <div class="en">🇬🇧 <b>1NF</b> requires one thing: every column holds one atomic value — not a list packed into a single string. If a <code>products</code> column stores "Keyboard,Mouse" as one string, that violates 1NF. The fix: a separate row per value.</div>
</div>

<pre><code>&lt;?php
$rawOrders = [
    ['order_id' =&gt; 1, 'customer_name' =&gt; 'Sara Ali', 'products' =&gt; 'Keyboard,Mouse'],
    ['order_id' =&gt; 2, 'customer_name' =&gt; 'Omar Khaled', 'products' =&gt; 'Monitor'],
];

echo "-- 0NF: 'products' holds a comma-separated list (NOT atomic) --" . PHP_EOL;
foreach ($rawOrders as $row) {
    echo "order_id={$row['order_id']} customer_name={$row['customer_name']} products=\"{$row['products']}\"" . PHP_EOL;
}

echo PHP_EOL . "-- 1NF: split into one row per atomic value --" . PHP_EOL;
foreach ($rawOrders as $row) {
    foreach (explode(',', $row['products']) as $product) {
        echo "order_id={$row['order_id']} customer_name={$row['customer_name']} product=\"$product\"" . PHP_EOL;
    }
}</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">-- 0NF: 'products' holds a comma-separated list (NOT atomic) --
order_id=1 customer_name=Sara Ali products="Keyboard,Mouse"
order_id=2 customer_name=Omar Khaled products="Monitor"

-- 1NF: split into one row per atomic value --
order_id=1 customer_name=Sara Ali product="Keyboard"
order_id=1 customer_name=Sara Ali product="Mouse"
order_id=2 customer_name=Omar Khaled product="Monitor"</div>

<h2>2NF — الصيغة الطبيعية الثانية / Second Normal Form</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>2NF</b> بتضيف شرط فوق 1NF: مفيش عمود يعتمد على "جزء بس" من مفتاح مركّب (Composite Key). المشكلة دي بتظهر لما يبقى عندك جدول تفاصيل طلب (Order Items) بمفتاح <code>(order_id, product_id)</code> — لو حطيت <code>product_name</code> و<code>product_price</code> جوه نفس الجدول، هما فعليًا معتمدين على <code>product_id</code> بس، مش على <code>order_id</code> ولا على الاتنين مع بعض. ده معناه إنهم لازم يتنقلوا لجدول <code>products</code> مستقل، ويفضل في جدول الطلبات بس <code>quantity</code> (اللي فعلاً معتمد على المفتاح كله: أنهي منتج في أنهي طلب وبكام).</div>
    <div class="en">🇬🇧 <b>2NF</b> adds one requirement on top of 1NF: no column may depend on only <i>part</i> of a composite key. This shows up once you have an order-items table keyed by <code>(order_id, product_id)</code> — if <code>product_name</code> and <code>product_price</code> live in that same table, they actually depend only on <code>product_id</code>, not on <code>order_id</code> or on the full pair. That means they belong in their own <code>products</code> table, leaving only <code>quantity</code> in the line-item table (which genuinely depends on the full key: which product, in which order, and how many).</div>
</div>

<h2>3NF — الصيغة الطبيعية الثالثة / Third Normal Form</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>3NF</b> بتشيل اعتماد "غير مباشر" (Transitive Dependency): لو <code>customer_email</code> و<code>customer_address</code> بيعتمدوا على <code>customer_name</code> (أو <code>customer_id</code>)، مش على <code>order_id</code> نفسه، يبقى مكانهم مش هنا — لازم جدول <code>customers</code> منفصل. النتيجة النهائية بعد تطبيق الخطوات كلها: 3 جداول نضيفة بدل جدول واحد متكرر.</div>
    <div class="en">🇬🇧 <b>3NF</b> removes transitive dependencies: if <code>customer_email</code> and <code>customer_address</code> depend on <code>customer_name</code> (or <code>customer_id</code>), not on <code>order_id</code> itself, they don't belong here — they need their own <code>customers</code> table. The end result of applying every step: 3 clean tables instead of one repetitive one.</div>
</div>

<pre><code>&lt;?php
$pdo-&gt;exec('CREATE TABLE customers (id INTEGER PRIMARY KEY AUTOINCREMENT, name TEXT NOT NULL, email TEXT NOT NULL UNIQUE, address TEXT NOT NULL)');
$pdo-&gt;exec('CREATE TABLE products (id INTEGER PRIMARY KEY AUTOINCREMENT, name TEXT NOT NULL, price REAL NOT NULL)');
$pdo-&gt;exec('CREATE TABLE orders (id INTEGER PRIMARY KEY AUTOINCREMENT, customer_id INTEGER NOT NULL, product_id INTEGER NOT NULL, quantity INTEGER NOT NULL, order_date TEXT NOT NULL,
    FOREIGN KEY (customer_id) REFERENCES customers(id), FOREIGN KEY (product_id) REFERENCES products(id))');

// ... insert the same real-world data, but each fact stored exactly once ...

$rows = $pdo-&gt;query('
    SELECT orders.id AS order_id, customers.name AS customer_name, customers.email AS customer_email,
           products.name AS product_name, products.price AS product_price, orders.quantity, orders.order_date
    FROM orders
    JOIN customers ON customers.id = orders.customer_id
    JOIN products ON products.id = orders.product_id
    ORDER BY orders.id
')-&gt;fetchAll(PDO::FETCH_ASSOC);
foreach ($rows as $row) {
    echo "Order #{$row['order_id']}: {$row['customer_name']} ({$row['customer_email']}) bought {$row['quantity']}x {$row['product_name']} @ \${$row['product_price']} on {$row['order_date']}" . PHP_EOL;
}

$count = $pdo-&gt;query("SELECT COUNT(*) AS c FROM customers WHERE name = 'Sara Ali'")-&gt;fetch(PDO::FETCH_ASSOC);
echo "Rows in customers table for Sara Ali: {$count['c']}" . PHP_EOL;</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">--- reconstructing the exact same view via JOIN, from normalized storage ---
Order #1: Sara Ali (sara@example.com) bought 1x Keyboard @ $45.99 on 2024-01-05
Order #2: Sara Ali (sara@example.com) bought 2x Mouse @ $19.99 on 2024-01-18
Order #3: Omar Khaled (omar@example.com) bought 1x Monitor @ $149 on 2024-02-01
Order #4: Sara Ali (sara@example.com) bought 1x Monitor @ $149 on 2024-02-10

Rows in customers table for Sara Ali: 1</div>

<div class="bi-block">
    <div class="ar">🇪🇬 نفس المعلومات بالظبط اللي شفناها في الجدول المتكرر فوق، لكن دلوقتي إيميل وعنوان Sara مخزّنين مرة واحدة بس في <code>customers</code> — بغض النظر عن عدد الطلبات اللي هتعملها بعد كده. الـ <code>JOIN</code> هو اللي بيرجّع الشكل المقروء وقت الحاجة، من غير أي تكرار في التخزين.</div>
    <div class="en">🇬🇧 The exact same information we saw in the repeated table above, but now Sara's email and address are stored exactly once in <code>customers</code> — no matter how many more orders she places. The <code>JOIN</code> reconstructs the readable view on demand, with zero duplication in storage.</div>
</div>

<h2 id="lab">🗄️ معمل قواعد البيانات / Database Lab</h2>
<div class="db-lab">
    <h3>🗄️ اكتشف مشكلة التطبيع / Spot the Normalization Problem</h3>
    <div class="ar">🇪🇬 تخيل جدول <code>enrollments</code> بيسجل تسجيل الطلاب في المواد، بالأعمدة دي في صف واحد لكل تسجيل: <code>student_name</code>, <code>student_email</code>, <code>course_name</code>, <code>instructor_name</code>, <code>instructor_office</code>, <code>grade</code>.<br>
    1) لو 30 طالب مسجلين في نفس المادة، أنهي أعمدة هتتكرر 30 مرة؟<br>
    2) لو المدرّس غيّر مكتبه، كام صف هتحتاج تحدّثهم؟<br>
    3) اقترح تقسيم الجدول ده لـ <code>students</code>, <code>courses</code>, <code>enrollments</code> (كجدول Junction فيه <code>grade</code>) — واكتب جمل <code>CREATE TABLE</code> الثلاثة بنفسك.<br>
    4) بعد ما تكتبها، جرّبها فعليًا في <a href="../db-sandbox/index.php">الـ Playground</a> — شغّل كل جملة <code>CREATE TABLE</code> لوحدها (الـ Playground بينفّذ أول جملة SQL بس في كل مرة).</div>
    <div class="en">🇬🇧 Imagine an <code>enrollments</code> table recording student registrations, with these columns in one row per enrollment: <code>student_name</code>, <code>student_email</code>, <code>course_name</code>, <code>instructor_name</code>, <code>instructor_office</code>, <code>grade</code>.<br>
    1) If 30 students are enrolled in the same course, which columns repeat 30 times?<br>
    2) If the instructor's office changes, how many rows would you need to update?<br>
    3) Propose splitting this into <code>students</code>, <code>courses</code>, <code>enrollments</code> (as a junction table holding <code>grade</code>) — write the three <code>CREATE TABLE</code> statements yourself.<br>
    4) Then actually try them in the <a href="../db-sandbox/index.php">Playground</a> — run each <code>CREATE TABLE</code> statement one at a time (the Playground only executes the first SQL statement per click).</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="atomic">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">1NF بتطلب إيه بالظبط؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What does 1NF require exactly?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="atomic"> كل عمود يحتوي قيمة ذرية واحدة (مفيش قوايم داخل نص)</label>
        <label><input type="radio" name="q1" value="nokeys"> إزالة كل الـ Foreign Keys</label>
        <label><input type="radio" name="q1" value="onetable"> دمج كل الجداول في جدول واحد</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="update">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">لو غيّرت عنوان عميل وكان مكرر في 3 صفوف ونسيت تحدّث واحد منهم، إيه اسم المشكلة دي؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">If you update a customer's address (duplicated across 3 rows) and forget one, what's this problem called?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="update"> Update Anomaly</label>
        <label><input type="radio" name="q2" value="syntax"> Syntax Error</label>
        <label><input type="radio" name="q2" value="deadlock"> Deadlock</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="partial">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">2NF بتشيل أنهي نوع اعتماد؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What kind of dependency does 2NF eliminate?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="partial"> اعتماد على جزء بس من مفتاح مركّب (Partial Dependency)</label>
        <label><input type="radio" name="q3" value="transitive"> اعتماد غير مباشر (Transitive Dependency)</label>
        <label><input type="radio" name="q3" value="circular"> اعتماد دائري بين جدولين</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="transitive">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">نقل <code>customer_email</code> و<code>customer_address</code> من جدول <code>orders</code> لجدول <code>customers</code> منفصل بيطبّق أنهي صيغة؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Moving <code>customer_email</code> and <code>customer_address</code> out of <code>orders</code> into a separate <code>customers</code> table applies which normal form?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="one"> 1NF</label>
        <label><input type="radio" name="q4" value="two"> 2NF</label>
        <label><input type="radio" name="q4" value="transitive"> 3NF (إزالة الاعتماد غير المباشر)</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ طبّع الجدول المتكرر بنفسك / Normalize the Repeated Table Yourself</h3>
    <div class="ar">🇪🇬 في <a href="../db-sandbox/index.php">الـ Playground</a>: اعمل جدول <code>orders_flat</code> بنفس أعمدة المثال اللي شفته فوق وحط فيه 4 صفوف (بعميل واحد بيتكرر في صفين على الأقل)، وبعدين اعمل الجداول الثلاثة المطبّعة (<code>customers</code>, <code>products</code>, <code>orders</code>) وأدخل نفس البيانات فيها، وقارن: كام مرة اتكرر إيميل نفس العميل في كل تصميم؟</div>
    <div class="en">🇬🇧 In the <a href="../db-sandbox/index.php">Playground</a>: create an <code>orders_flat</code> table with the same columns from the example above and insert 4 rows (one customer repeated in at least 2 of them), then build the 3 normalized tables (<code>customers</code>, <code>products</code>, <code>orders</code>) and insert the same data into them — compare: how many times does the same customer's email appear in each design?</div>
</div>

<div class="exercise-box">
    <h3>✍️ تمرين إضافي / Extra Exercise</h3>
    <div class="ar">🇪🇬 في <a href="../db-sandbox/index.php">الـ Playground</a>: هل جدولي <code>users</code> و<code>posts</code> الأصليين (اللي شفتهم في درس العلاقات) فيهم أي مشكلة تطبيع؟ برّر إجابتك بالرجوع لتعريفات 1NF/2NF/3NF.</div>
    <div class="en">🇬🇧 In the <a href="../db-sandbox/index.php">Playground</a>: do the original <code>users</code> and <code>posts</code> tables (from the relationships lesson) have any normalization problems? Justify your answer against the 1NF/2NF/3NF definitions.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 دلوقتي عندك الأدوات الكاملة: تفهم العلاقات، وتعرف تشيل التكرار. في الدرس الجاي، هتستخدمهم مع بعض عشان تصمم Schema كاملة بنفسك من الصفر — Users/Posts/Comments/Categories — وتختبرها فعليًا.</div>
    <div class="en">🇬🇧 Now you have the full toolkit: understanding relationships, and knowing how to remove duplication. In the next lesson, you'll combine both to design a complete schema yourself from scratch — Users/Posts/Comments/Categories — and actually test it.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>التكرار مش مجرد "شكل مش مرتب" — بيسبب Update/Insertion/Deletion Anomalies حقيقية.</li>
        <li>1NF: قيم ذرية، مفيش قوايم جوه عمود واحد.</li>
        <li>2NF: مفيش عمود معتمد على جزء بس من مفتاح مركّب.</li>
        <li>3NF: مفيش عمود معتمد بشكل غير مباشر (عن طريق عمود تاني) بدل ما يعتمد على المفتاح الأساسي مباشرة.</li>
        <li>النتيجة: نفس المعلومات، بس كل حقيقة مخزّنة مرة واحدة، والـ JOIN بيجمعها وقت الحاجة.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="db-relationships.php">← المرحلة السابقة / Previous: Table Relationships</a>
    <a href="db-schema-design-lab.php">المرحلة الجاية / Next: Schema Design Lab →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
