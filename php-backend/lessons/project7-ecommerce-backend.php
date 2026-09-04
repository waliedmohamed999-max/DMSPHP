<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'project7-ecommerce-backend';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = '🚀 مشروع 7: E-Commerce Backend';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">Stage 18 · Projects</span>
<h1>🚀 مشروع 7: E-Commerce Backend <span class="ltr">🚀 Project 7: E-Commerce Backend</span></h1>
<p class="subtitle">منتجات، عربة تسوق، وأوردرات — بـ Transaction حقيقية تحافظ على تناسق المخزون.</p>

<div class="step-tracker">
    <a href="#read">📖 Read</a>
    <a href="#understand">🧠 Understand</a>
    <a href="#practice">💻 Practice</a>
    <a href="#quiz">🧠 Quiz</a>
    <a href="#challenge">🛠️ Challenge</a>
    <a href="#project">🚀 Project</a>
</div>

<h2 id="read">📖 الهدف / Goal</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 لما مستخدم يعمل أوردر بمنتجين مختلفين، لازم يحصل 3 حاجات مع بعض: يتسجل الأوردر، تتسجل تفاصيله (Order Items)، وينقص المخزون (Stock) لكل منتج. المشكلة: لو حصل خطأ في نص الطريق (منتج خلص من المخزون مثلًا)، مينفعش نسيب بعض العمليات دي حصلت وبعضها لأ — ده هيسيب البيانات في حالة متناقضة (أوردر متسجل بس المخزون منقصش، أو العكس). الحل هو <b>Database Transaction</b>: تجميع كذا عملية كتابة في وحدة واحدة "كل حاجة أو ولا حاجة" (All-or-Nothing).</div>
    <div class="en">🇬🇧 When a user places an order with several products, three things must happen together: the order row is created, its line items are created, and each product's stock is decremented. The problem: if something fails midway (a product ran out of stock, say), you can't let some of these happen and not others — that leaves the data in an inconsistent state (an order recorded but stock never decremented, or vice versa). The fix is a <b>database transaction</b>: grouping several writes into one all-or-nothing unit.</div>
</div>

<h2 id="understand">🧠 المواصفات المطلوبة / Requirements</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 النظام لازم يحقق النقط دي:</div>
</div>
<div class="recap-box">
    <h3>📋 قائمة المتطلبات / Checklist</h3>
    <ul>
        <li>Schema من 3 جداول: <code>products</code> (id, name, price, stock)، <code>orders</code> (id, user_id, status, created_at)، <code>order_items</code> (id, order_id, product_id, quantity, price_at_purchase).</li>
        <li><code>placeOrder($pdo, $userId, $items): array</code> — تتحقق إن كل منتج فيه مخزون كافي، تنشئ الأوردر، تنشئ سطوره، وتنقص المخزون — <b>كل ده جوه Transaction واحدة</b>.</li>
        <li>لو أي منتج مخزونه مش كافي، لازم <code>rollBack()</code> يشتغل ولا حاجة تتسجل خالص — لا أوردر، لا سطور، لا نقصان مخزون.</li>
        <li><code>applyCoupon($total, $code): float</code> — كوبونات خصم حقيقية، وكود غير موجود يرجّع نفس الإجمالي زي ما هو.</li>
    </ul>
</div>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>ملاحظة عن قاعدة البيانات:</b> جداول المتجر (<code>products</code>, <code>orders</code>, <code>order_items</code>) مش موجودة في الـ Sandbox الأساسية، فهنبنيها إحنا من الصفر جوه سكريبت المشروع، فوق نفس <code>build_sandbox_pdo()</code> اللي استخدمناها في مشاريع تانية — تمامًا زي أي مشروع حقيقي بيضيف جداول جديدة لقاعدة بيانات قائمة.</div>
    <div class="en">🇬🇧 <b>A note on the database:</b> the store tables (<code>products</code>, <code>orders</code>, <code>order_items</code>) don't exist in the base sandbox, so we build them ourselves inside the project script, on top of the same <code>build_sandbox_pdo()</code> used in other projects — exactly like a real project adding new tables to an existing database.</div>
</div>

<h2 id="practice">💻 التنفيذ / Implementation</h2>

<h3>1) الـ Schema والبيانات الأولية / Schema &amp; seed data</h3>
<pre><code>&lt;?php
require __DIR__ . '/../db-sandbox/schema.php';
$pdo = build_sandbox_pdo();

$pdo->exec('
    CREATE TABLE products (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        name TEXT NOT NULL,
        price REAL NOT NULL,
        stock INTEGER NOT NULL
    )
');
$pdo->exec('
    CREATE TABLE orders (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        user_id INTEGER NOT NULL,
        status TEXT NOT NULL,
        created_at TEXT NOT NULL
    )
');
$pdo->exec('
    CREATE TABLE order_items (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        order_id INTEGER NOT NULL,
        product_id INTEGER NOT NULL,
        quantity INTEGER NOT NULL,
        price_at_purchase REAL NOT NULL,
        FOREIGN KEY (order_id) REFERENCES orders(id),
        FOREIGN KEY (product_id) REFERENCES products(id)
    )
');

$seed = [
    ['Mechanical Keyboard', 45.00, 20],
    ['Wireless Mouse', 19.99, 35],
    ['27" Monitor', 210.00, 8],
    ['USB-C Hub', 24.50, 50],
    ['Webcam 1080p', 32.00, 3],
];
$stmt = $pdo->prepare('INSERT INTO products (name, price, stock) VALUES (?, ?, ?)');
foreach ($seed as $p) {
    $stmt->execute($p);
}

foreach ($pdo->query('SELECT id, name, price, stock FROM products') as $row) {
    echo "#{$row['id']} {$row['name']} - \${$row['price']} - stock: {$row['stock']}" . PHP_EOL;
}</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">#1 Mechanical Keyboard - $45 - stock: 20
#2 Wireless Mouse - $19.99 - stock: 35
#3 27" Monitor - $210 - stock: 8
#4 USB-C Hub - $24.5 - stock: 50
#5 Webcam 1080p - $32 - stock: 3</div>

<h3>2) <code>placeOrder()</code> — الأوردر الناجح / A successful order</h3>
<div class="bi-block">
    <div class="ar">🇪🇬 <code>beginTransaction()</code> بتفتح "منطقة آمنة" — أي <code>INSERT</code>/<code>UPDATE</code> بعدها مش هيتثبّت في القاعدة نهائيًا غير لما نستدعي <code>commit()</code>. جوه الـ Loop، بنتحقق من المخزون <b>قبل</b> ما نعمل أي حاجة، ولو المخزون كفاية بنعمل <code>INSERT</code> لسطر الأوردر وبعدها <code>UPDATE</code> ينقص المخزون. لو أي خطوة رمت Exception، الـ <code>catch</code> بيستدعي <code>rollBack()</code> اللي بيلغي كل حاجة اتعملت من بداية الـ Transaction — كأنها مبقتش حصلت أصلًا.</div>
    <div class="en">🇬🇧 <code>beginTransaction()</code> opens a "safe zone" — any <code>INSERT</code>/<code>UPDATE</code> after it isn't permanently committed to the database until we call <code>commit()</code>. Inside the loop, we check stock <b>before</b> doing anything, and if there's enough, we insert the order-item row and then <code>UPDATE</code> to decrement stock. If any step throws, the <code>catch</code> calls <code>rollBack()</code>, which undoes everything done since the transaction started — as if none of it ever happened.</div>
</div>

<pre><code>&lt;?php
function placeOrder(PDO $pdo, int $userId, array $items): array {
    $pdo->beginTransaction();
    try {
        $orderStmt = $pdo->prepare('INSERT INTO orders (user_id, status, created_at) VALUES (?, ?, ?)');
        $orderStmt->execute([$userId, 'pending', date('Y-m-d')]);
        $orderId = (int) $pdo->lastInsertId();

        foreach ($items as $item) {
            $productStmt = $pdo->prepare('SELECT id, price, stock FROM products WHERE id = ?');
            $productStmt->execute([$item['product_id']]);
            $product = $productStmt->fetch(PDO::FETCH_ASSOC);

            if (!$product) {
                throw new RuntimeException("Product #{$item['product_id']} does not exist.");
            }
            if ($product['stock'] < $item['quantity']) {
                throw new RuntimeException(
                    "Not enough stock for product #{$item['product_id']}: requested {$item['quantity']}, only {$product['stock']} in stock."
                );
            }

            $itemStmt = $pdo->prepare(
                'INSERT INTO order_items (order_id, product_id, quantity, price_at_purchase) VALUES (?, ?, ?, ?)'
            );
            $itemStmt->execute([$orderId, $product['id'], $item['quantity'], $product['price']]);

            $updateStmt = $pdo->prepare('UPDATE products SET stock = stock - ? WHERE id = ?');
            $updateStmt->execute([$item['quantity'], $product['id']]);
        }

        $pdo->prepare('UPDATE orders SET status = ? WHERE id = ?')->execute(['confirmed', $orderId]);
        $pdo->commit();
        return ['ok' => true, 'order_id' => $orderId];
    } catch (RuntimeException $e) {
        $pdo->rollBack();
        return ['ok' => false, 'error' => $e->getMessage()];
    }
}

$before = $pdo->query('SELECT id, stock FROM products WHERE id IN (1,3)')->fetchAll(PDO::FETCH_KEY_PAIR);
echo "Stock BEFORE -> Keyboard(#1): {$before[1]}, Monitor(#3): {$before[3]}" . PHP_EOL;

$result = placeOrder($pdo, 2, [
    ['product_id' => 1, 'quantity' => 3],
    ['product_id' => 3, 'quantity' => 1],
]);
echo "placeOrder() result: " . json_encode($result) . PHP_EOL;

$after = $pdo->query('SELECT id, stock FROM products WHERE id IN (1,3)')->fetchAll(PDO::FETCH_KEY_PAIR);
echo "Stock AFTER  -> Keyboard(#1): {$after[1]}, Monitor(#3): {$after[3]}" . PHP_EOL;</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">Stock BEFORE -> Keyboard(#1): 20, Monitor(#3): 8
placeOrder() result: {"ok":true,"order_id":1}
Stock AFTER  -> Keyboard(#1): 17, Monitor(#3): 7</div>
<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ الأرقام بالظبط: طلبنا 3 Keyboards فنقص المخزون من 20 لـ 17، وطلبنا Monitor واحد فنقص من 8 لـ 7 — نقصان حقيقي، مش تمثيلي، اتثبّت في القاعدة بعد <code>commit()</code>.</div>
    <div class="en">🇬🇧 Notice the exact numbers: we ordered 3 keyboards, so stock dropped from 20 to 17, and 1 monitor, so it dropped from 8 to 7 — a real decrement, committed to the database after <code>commit()</code>.</div>
</div>

<h3>3) إثبات الـ Rollback: طلب أكبر من المخزون / Proving the rollback: over-ordering</h3>
<div class="bi-block">
    <div class="ar">🇪🇬 دلوقتي هنجرب أوردر فيه سطرين: سطر أول صحيح (Mouse بكمية متاحة)، وسطر تاني غلط (Webcam بكمية 10 رغم إن المخزون 3 بس). المتوقع: الدالة تكتشف المشكلة في السطر التاني وتعمل <code>rollBack()</code> — ومهم جدًا نثبت إن السطر الأول "الصحيح" <b>مبقاش مطبّق هو كمان</b>، لإن الـ Transaction كلها بترجع لورا مع بعض.</div>
    <div class="en">🇬🇧 Now we try an order with two lines: a valid one first (Mouse, available quantity), then an invalid one (Webcam, quantity 10 when stock is only 3). Expected: the function detects the problem on the second line and calls <code>rollBack()</code> — and crucially, we prove the "valid" first line is <b>not applied either</b>, because the whole transaction rolls back together.</div>
</div>

<pre><code>&lt;?php
$ordersBefore = (int) $pdo->query('SELECT COUNT(*) FROM orders')->fetchColumn();
$webcamStockBefore = $pdo->query('SELECT stock FROM products WHERE id = 5')->fetchColumn();
echo "Orders in table before attempt: $ordersBefore" . PHP_EOL;
echo "Webcam(#5) stock before attempt: $webcamStockBefore" . PHP_EOL;

$failResult = placeOrder($pdo, 3, [
    ['product_id' => 2, 'quantity' => 2],   // valid line, would succeed on its own
    ['product_id' => 5, 'quantity' => 10],  // invalid: only 3 in stock
]);
echo "placeOrder() result: " . json_encode($failResult) . PHP_EOL;

$ordersAfter = (int) $pdo->query('SELECT COUNT(*) FROM orders')->fetchColumn();
$webcamStockAfter = $pdo->query('SELECT stock FROM products WHERE id = 5')->fetchColumn();
$mouseStockAfter = $pdo->query('SELECT stock FROM products WHERE id = 2')->fetchColumn();
echo "Orders in table after attempt: $ordersAfter (unchanged = rollback worked)" . PHP_EOL;
echo "Webcam(#5) stock after attempt: $webcamStockAfter (unchanged)" . PHP_EOL;
echo "Mouse(#2) stock after attempt: $mouseStockAfter (unchanged, even though its own line was valid)" . PHP_EOL;

$orphanItems = (int) $pdo->query('SELECT COUNT(*) FROM order_items')->fetchColumn();
echo "Total order_items rows in the whole table: $orphanItems" . PHP_EOL;</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">Orders in table before attempt: 1
Webcam(#5) stock before attempt: 3
placeOrder() result: {"ok":false,"error":"Not enough stock for product #5: requested 10, only 3 in stock."}
Orders in table after attempt: 1 (unchanged = rollback worked)
Webcam(#5) stock after attempt: 3 (unchanged)
Mouse(#2) stock after attempt: 35 (unchanged, even though its own line was valid)
Total order_items rows in the whole table: 2</div>
<div class="bi-block">
    <div class="ar">🇪🇬 ده الإثبات الحقيقي: عدد الأوردرات فضل 1 (مفيش أوردر جديد اتسجل رغم إن السطر بتاع الـ Mouse كان صحيح)، مخزون الـ Webcam فضل 3 (مفيش نقصان جزئي)، ومخزون الـ Mouse فضل 35 (مش 33 رغم إنه كان جزء "صحيح" من الأوردر). <code>order_items</code> فيها بس الصفين بتوع الأوردر الناجح الأول — مفيش أي صف تسرّب من المحاولة الفاشلة. ده معنى "All-or-Nothing" فعليًا، مش نظريًا بس.</div>
    <div class="en">🇬🇧 This is the real proof: the order count stayed at 1 (no new order was recorded even though the Mouse line was valid), the Webcam stock stayed at 3 (no partial decrement), and the Mouse stock stayed at 35 (not 33, even though it was a "valid" part of the order). <code>order_items</code> holds only the two rows from the earlier successful order — nothing leaked from the failed attempt. This is what "all-or-nothing" means in practice, not just in theory.</div>
</div>

<h3>4) <code>applyCoupon()</code> — كوبونات خصم / Discount coupons</h3>
<div class="bi-block">
    <div class="ar">🇪🇬 دالة بسيطة ومستقلة عن قاعدة البيانات: خريطة من كود الكوبون لدالة حساب الخصم. <code>SAVE10</code> بتاخد 10% من الإجمالي، <code>FLAT20</code> بتاخد 20 دولار ثابتة (مع <code>max(0, ...)</code> عشان الإجمالي ميبقاش سالب لو كان أصلًا أقل من 20). أي كود مش موجود في الخريطة بيرجّع الإجمالي زي ما هو من غير أي تغيير.</div>
    <div class="en">🇬🇧 A simple function, independent of the database: a map from coupon code to a discount calculation. <code>SAVE10</code> takes 10% off the total, <code>FLAT20</code> takes a flat $20 off (with <code>max(0, ...)</code> so the total can't go negative if it was already under 20). Any code not in the map returns the total unchanged.</div>
</div>

<pre><code>&lt;?php
function applyCoupon(float $total, string $code): float {
    $coupons = [
        'SAVE10'  => fn($t) => $t * 0.90,       // 10% off
        'FLAT20'  => fn($t) => max(0, $t - 20), // $20 flat off
    ];
    if (!isset($coupons[$code])) {
        return $total;
    }
    return round($coupons[$code]($total), 2);
}

$total = 150.00;
echo "Total: \$$total" . PHP_EOL;
echo "applyCoupon($total, 'SAVE10')  -> " . applyCoupon($total, 'SAVE10') . " (10% off)" . PHP_EOL;
echo "applyCoupon($total, 'FLAT20')  -> " . applyCoupon($total, 'FLAT20') . " (\$20 flat off)" . PHP_EOL;
echo "applyCoupon($total, 'FAKECODE') -> " . applyCoupon($total, 'FAKECODE') . " (invalid code, total unchanged)" . PHP_EOL;</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">Total: $150
applyCoupon(150, 'SAVE10')  -> 135 (10% off)
applyCoupon(150, 'FLAT20')  -> 130 ($20 flat off)
applyCoupon(150, 'FAKECODE') -> 150 (invalid code, total unchanged)</div>

<div class="bi-block">
    <div class="ar">🇪🇬 جرّب بنفسك في المحرر المصغّر تحت — زوّد كود كوبون جديد بنسبة خصم مختلفة، أو غيّر قيمة السلة، وشوف الناتج.</div>
    <div class="en">🇬🇧 Try it yourself in the mini editor below — add a new coupon code with a different discount, or change the cart total, and see the result.</div>
</div>

<div class="mini-editor-wrap">
    <textarea spellcheck="false">&lt;?php
function applyCoupon(float $total, string $code): float {
    $coupons = [
        'SAVE10' => fn($t) => $t * 0.90,
        'FLAT20' => fn($t) => max(0, $t - 20),
        'SAVE25' => fn($t) => $t * 0.75, // جرّب تضيف كود جديد زي ده
    ];
    if (!isset($coupons[$code])) {
        return $total;
    }
    return round($coupons[$code]($total), 2);
}

$cart = 80.00;
foreach (['SAVE10', 'FLAT20', 'SAVE25', 'NOTREAL'] as $code) {
    echo "applyCoupon($cart, '$code') -> " . applyCoupon($cart, $code) . PHP_EOL;
}</textarea>
    <div class="mini-toolbar">
        <button class="mini-run-btn">▶ شغّل / Run</button>
        <span class="mini-status"></span>
    </div>
    <div class="output-box">— لسه متشغلش / not run yet —</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="rollback">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">لو منتج في الأوردر مخزونه مش كافي، إيه اللي بيحصل جوه <code>placeOrder()</code>؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">If a product in the order has insufficient stock, what happens inside <code>placeOrder()</code>?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="partial"> بيكمل باقي المنتجات ويتجاهل ده بس</label>
        <label><input type="radio" name="q1" value="rollback"> بترمي Exception يتمسك بـ catch وتستدعي rollBack() فتلغي كل حاجة</label>
        <label><input type="radio" name="q1" value="negative"> بينقص المخزون لرقم سالب ويكمل عادي</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="unchanged">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">في مثال الـ Rollback فوق، مخزون الـ Mouse (السطر "الصحيح") فضل قد إيه بعد فشل الأوردر؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">In the rollback example above, what did the Mouse's stock (the "valid" line) remain after the order failed?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="thirtythree"> 33، لإن سطره كان صحيح فاتطبق</label>
        <label><input type="radio" name="q2" value="unchanged"> 35، بدون أي تغيير، لإن الـ Transaction كلها اتلغت مع بعض</label>
        <label><input type="radio" name="q2" value="zero"> 0</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="unchangedtotal">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">حسب المثال فوق، <code>applyCoupon(150, 'FAKECODE')</code> بترجع إيه؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Per the example above, what does <code>applyCoupon(150, 'FAKECODE')</code> return?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="zero"> 0</label>
        <label><input type="radio" name="q3" value="unchangedtotal"> 150، الإجمالي زي ما هو من غير أي خصم</label>
        <label><input type="radio" name="q3" value="error"> Exception</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="allornothing">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">إيه أهمية إن <code>INSERT</code> الأوردر و<code>UPDATE</code> المخزون يكونوا جوه نفس الـ Transaction؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Why does it matter that the order's <code>INSERT</code> and the stock's <code>UPDATE</code> live inside the same transaction?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="speed"> عشان الكود يشتغل أسرع بس</label>
        <label><input type="radio" name="q4" value="allornothing"> عشان يضمنوا "كل حاجة أو ولا حاجة" — مفيش حالة نص متسجلة</label>
        <label><input type="radio" name="q4" value="notimportant"> مفيش فرق حقيقي، ممكن ينفصلوا</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ إلغاء أوردر / Cancel an Order</h3>
    <div class="ar">🇪🇬 في <a href="../playground/index.php">محرر الكود</a>: ابني الفكرة العكسية بالظبط لـ <code>placeOrder()</code> — دالة <code>cancelOrder(PDO $pdo, int $orderId): array</code> جوه Transaction برضه: تجيب كل <code>order_items</code> بتاعة الأوردر، ترجع كمية كل منتج تاني لعمود <code>stock</code> (يعني <code>UPDATE products SET stock = stock + ?</code>)، وتغيّر حالة الأوردر لـ <code>'cancelled'</code>. لو الأوردر مش موجود أصلًا أو ملغي بالفعل، لازم ترجع خطأ واضح من غير ما تلمس أي مخزون.</div>
    <div class="en">🇬🇧 In the <a href="../playground/index.php">Playground</a>: build the exact inverse of <code>placeOrder()</code> — a <code>cancelOrder(PDO $pdo, int $orderId): array</code> function, also inside a transaction: fetch all the order's <code>order_items</code>, add each product's quantity back to its <code>stock</code> column (<code>UPDATE products SET stock = stock + ?</code>), and mark the order's status as <code>'cancelled'</code>. If the order doesn't exist or is already cancelled, it should return a clear error without touching any stock.</div>
</div>

<h2 id="project">🚀 اللي بعد كده / What Comes Next</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 دلوقتي عندك 5 لبنات أساسية: آلة حاسبة، فورم Validation، نظام Authentication، Blog Backend بعلاقات حقيقية، وE-Commerce Backend بـ Transactions حقيقية. المرحلة الجاية هي <a href="capstone.php">مشروع التخرج (Capstone Project)</a> اللي بيجمع كل المهارات دي مع بعض — Authentication + CRUD + Routing + أمان — في REST API واحد متكامل. لو عدّيت المشروعين دول بنجاح، يبقى أنت جاهز فعلاً لمشروع التخرج.</div>
    <div class="en">🇬🇧 You now have 5 fundamental building blocks: a calculator, form validation, an authentication system, a Blog Backend with real relationships, and an E-Commerce Backend with real transactions. The next stage is the <a href="capstone.php">Capstone Project</a>, which brings all of this together — authentication, CRUD, routing, and security — into one complete REST API. If you've completed these two projects, you're genuinely ready for the capstone.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>Transaction = تجميع كذا عملية كتابة في وحدة "كل حاجة أو ولا حاجة" بـ <code>beginTransaction()</code>/<code>commit()</code>/<code>rollBack()</code>.</li>
        <li>لازم تتحقق من المخزون <b>قبل</b> أي كتابة، ولو فشل أي منتج جوه الـ Loop، الـ <code>rollBack()</code> بيلغي كل حاجة اتعملت من بداية الـ Transaction، حتى السطور اللي كانت "صحيحة".</li>
        <li>إثبات نجاح الـ Rollback بيكون بـ SELECT فعلية بعد المحاولة الفاشلة — تتأكد إن العدّادات والمخزون فضلوا زي ما كانوا بالظبط.</li>
        <li><code>applyCoupon()</code> دالة بسيطة مستقلة عن القاعدة، وكود غير معروف بيرجّع نفس الإجمالي من غير تغيير.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="project5-blog-backend.php">← مشروع 5 / Blog Backend</a>
    <a href="capstone.php">مشروع التخرج / Next: Capstone Project →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
