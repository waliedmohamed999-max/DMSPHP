<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'online-store-project';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'تطبيق عملي: متجر إلكتروني — Full Stack Developer';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">مشروع تطبيقي 2 / Project 2</span>
<h1>متجر إلكتروني (Online Store) <span class="ltr">Practical Project</span></h1>
<p class="subtitle">مشروع التخرج الفعلي لمسار Full Stack — يجمع كل حاجة اتعلمتها في الجزئين: واجهة متجاوبة بـ HTML/CSS/JS، وBack-End حقيقي بـ PHP وMySQL. مفيش درس جديد هنا، المطلوب إنك تبني.</p>

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
    <div class="ar">🇪🇬 تبني متجر إلكتروني بسيط لكن كامل: عرض منتجات من قاعدة بيانات، سلة مشتريات تفاعلية بـ JavaScript، تسجيل دخول حقيقي، وحفظ الطلبات في قاعدة البيانات. ده المشروع اللي يثبت إنك فعلاً Full Stack Developer.</div>
    <div class="en">🇬🇧 Build a simple but complete online store: display products from a database, an interactive JavaScript shopping cart, real authentication, and orders saved to the database. This is the project that proves you're actually a Full Stack Developer.</div>
</div>

<h2 id="understand">المواصفات المطلوبة / Requirements</h2>
<div class="recap-box">
    <h3>📋 قائمة المتطلبات / Checklist</h3>
    <ul>
        <li><b>عرض المنتجات</b> — صفحة رئيسية بتجيب المنتجات من جدول <code>products</code> في MySQL وتعرضهم في كروت متجاوبة (Grid/Flexbox). <span class="ltr">(CSS + MySQL stages)</span></li>
        <li><b>سلة مشتريات بـ JavaScript</b> — زرار "أضف للسلة" على كل منتج، وعداد وإجمالي بيتحدثوا فورًا من غير Reload، مخزّنين في <code>localStorage</code> عشان يفضلوا موجودين لو المستخدم قفل الصفحة. <span class="ltr">(JavaScript stage)</span></li>
        <li><b>تسجيل حساب ودخول حقيقي</b> — باسورد مخزّن بـ <code>password_hash()</code>، وجلسة (<code>$_SESSION</code>) بعد الدخول. <span class="ltr">(PHP stage)</span></li>
        <li><b>إتمام الطلب (Checkout)</b> — المستخدم المسجل دخول بس يقدر "يأكد الطلب"، والطلب بمحتوياته يتخزن في جدول <code>orders</code> مربوط بـ <code>user_id</code>. <span class="ltr">(MySQL + PHP)</span></li>
        <li><b>حالة اختبار قبول: مخزون غير كافٍ</b> — لو المستخدم طلب كمية أكبر من المتاح في المخزون (حتى لو كان متاح وقت ما فتح الصفحة وبعدين حد تاني اشترى الكمية دي)، الـ Checkout لازم يرفض السطر ده تحديدًا برسالة واضحة (زي "متاح بس 2 قطعة") من غير ما يفشل الطلب كله لو فيه منتجات تانية سليمة في نفس السلة.</li>
        <li><b>تصميم متجاوب</b> — الموقع يشتغل ويبان كويس على الموبايل والديسكتوب. <span class="ltr">(Responsive stage)</span></li>
        <li><b>أمان أساسي</b> — <code>htmlspecialchars()</code> لأي بيانات مستخدم بتتعرض، وPrepared Statements لكل استعلام قاعدة بيانات.</li>
    </ul>
</div>

<h2>هيكل المشروع المقترح / Suggested Structure</h2>
<pre><code>online-store/
├── config.php               // اتصال PDO بقاعدة البيانات
├── index.php                 // الصفحة الرئيسية: عرض المنتجات
├── register.php / login.php  // تسجيل حساب ودخول
├── cart.js                   // منطق السلة (localStorage)
├── checkout.php              // معالجة تأكيد الطلب
├── style.css
└── database/
    └── schema.sql             // CREATE TABLE users, products, orders, order_items</code></pre>

<h2>مثال: تحديث السلة بـ JavaScript / Example: Updating the Cart</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 السلة نفسها منطقها كله في المتصفح (JavaScript) — مفيش داعي تكلم السيرفر كل مرة تضيف منتج، وده بيخلي التجربة سريعة. السيرفر بيتكلم بس وقت "تأكيد الطلب" النهائي.</div>
    <div class="en">🇬🇧 The cart's own logic lives entirely in the browser (JavaScript) — no need to talk to the server every time an item is added, keeping the experience fast. The server is only involved at final "checkout."</div>
</div>

<pre><code>function addToCart(productId, name, price) {
    const cart = JSON.parse(localStorage.getItem('cart') || '[]');
    cart.push({ id: productId, name, price });
    localStorage.setItem('cart', JSON.stringify(cart));
    updateCartUI();
}

function updateCartUI() {
    const cart = JSON.parse(localStorage.getItem('cart') || '[]');
    const total = cart.reduce((sum, item) => sum + item.price, 0);
    document.getElementById('cart-count').textContent = cart.length;
    document.getElementById('cart-total').textContent = total.toFixed(2);
}</code></pre>

<h2>أمثلة Endpoints / Example Endpoints</h2>
<pre><code>GET    /index.php          → يعرض كل المنتجات (JOIN مع فئاتهم لو موجودة)
POST   /register.php       { "email": "...", "password": "..." }
POST   /login.php          { "email": "...", "password": "..." }
POST   /checkout.php       { "items": [{"product_id":1,"qty":2}, ...] }
                            → لازم يكون فيه Session مستخدم فعّالة</code></pre>

<div class="security-box">
    <h3>⚠️ راجع قبل التسليم / Final Checklist</h3>
    <div class="ar">🇪🇬
        <ul>
            <li>هل أي مستخدم يقدر يعمل Checkout من غير ما يكون مسجل دخول؟ (لازم متمنّعش)</li>
            <li>هل السعر بتاع المنتج بيتحسب في الـ Back-End من قاعدة البيانات، ولا بتثق في رقم جاي من المتصفح؟ (لازم من قاعدة البيانات دايمًا — المستخدم ممكن يعدّل السعر من الـ JavaScript نفسه)</li>
            <li>كل استعلام SQL بيستخدم Prepared Statements؟</li>
        </ul>
    </div>
</div>

<h2 id="practice">تطبيق عملي: حساب السعر في الـ Back-End / Practice: Computing Price on the Back-End</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 عشان تثبّت نقطة الأمان اللي فوق، المحرر تحت بيحاكي نفس فكرة <code>checkout.php</code> — كتالوج منتجات ثابت (بدل جدول MySQL) وسلة فيها "سعر مزوّر" جاي كأنه من الـ JavaScript. لاحظ إن الكود بيتجاهل السعر ده تمامًا ويحسب من الكتالوج بس.</div>
    <div class="en">🇬🇧 To reinforce the security point above, the editor below simulates the same idea as <code>checkout.php</code> — a fixed product catalog (instead of a MySQL table) and a cart containing a "forged price" as if it came from JavaScript. Notice the code ignores that price entirely and computes only from the catalog.</div>
</div>

<div class="mini-editor-wrap">
    <textarea spellcheck="false">&lt;?php
class ProductCatalog {
    private array $products = [
        1 => ['name' => 'Keyboard', 'price' => 45.99],
        2 => ['name' => 'Mouse', 'price' => 19.99],
        3 => ['name' => 'Monitor', 'price' => 129.99],
    ];
    public function price(int $id): ?float {
        return $this->products[$id]['price'] ?? null;
    }
    public function name(int $id): ?string {
        return $this->products[$id]['name'] ?? null;
    }
}

function checkout(ProductCatalog $catalog, array $cartItems): array {
    $total = 0;
    $lines = [];
    foreach ($cartItems as $item) {
        // السعر بيتحسب من الـ Catalog (السيرفر)، مش من اللي جاي في الطلب نفسه
        $realPrice = $catalog->price($item['product_id']);
        if ($realPrice === null) {
            continue;
        }
        $lineTotal = $realPrice * $item['qty'];
        $total += $lineTotal;
        $lines[] = $catalog->name($item['product_id']) . " x{$item['qty']} = " . number_format($lineTotal, 2);
    }
    return ['lines' => $lines, 'total' => number_format($total, 2)];
}

$catalog = new ProductCatalog();

// المتصفح ممكن يحاول يبعت سعر مزوّر (0.01)، بس إحنا بنتجاهله تمامًا
$cart = [
    ['product_id' => 1, 'qty' => 2, 'price' => 0.01],
    ['product_id' => 3, 'qty' => 1, 'price' => 0.01],
];

print_r(checkout($catalog, $cart));</textarea>
    <div class="mini-toolbar">
        <button class="mini-run-btn">▶ شغّل / Run</button>
        <span class="mini-status"></span>
    </div>
    <div class="output-box">— لسه متشغلش / not run yet —</div>
</div>

<h2>حالة اختبار قبول إضافية: مخزون غير كافٍ / Extra Acceptance Test: Insufficient Stock</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 سيناريو واقعي جدًا: مستخدم فتح صفحة المنتج ولقى "5 متاحة"، بس قبل ما يعمل Checkout بلحظات، مستخدم تاني اشترى 4 منهم. الطلب اللي وصل للسيرفر بيطلب كمية أكبر من المتاح <b>فعليًا دلوقتي</b> في قاعدة البيانات. لازم الـ <code>checkout()</code> يتحقق من المخزون الحقيقي وقت التنفيذ (مش وقت ما الصفحة اتحمّلت)، ويرفض بس السطر ده تحديدًا برسالة واضحة — من غير ما يفشل باقي عناصر السلة السليمة.</div>
    <div class="en">🇬🇧 A very realistic scenario: a user opens a product page and sees "5 available," but moments before they check out, another user buys 4 of them. The request reaching the server now asks for more than what's <b>actually available right now</b> in the database. <code>checkout()</code> must verify real stock at execution time (not page-load time), and reject only that specific line with a clear message — without failing the rest of the valid cart items.</div>
</div>

<div class="mini-editor-wrap">
    <textarea spellcheck="false">&lt;?php
class ProductCatalog {
    private array $products = [
        1 => ['name' => 'Keyboard', 'price' => 45.99, 'stock' => 3],
        2 => ['name' => 'Mouse', 'price' => 19.99, 'stock' => 0],
        3 => ['name' => 'Monitor', 'price' => 129.99, 'stock' => 5],
    ];
    public function price(int $id): ?float {
        return $this->products[$id]['price'] ?? null;
    }
    public function name(int $id): ?string {
        return $this->products[$id]['name'] ?? null;
    }
    public function stock(int $id): ?int {
        return $this->products[$id]['stock'] ?? null;
    }
}

function checkout(ProductCatalog $catalog, array $cartItems): array {
    $total = 0;
    $lines = [];
    $errors = [];
    foreach ($cartItems as $item) {
        $realPrice = $catalog->price($item['product_id']);
        $available = $catalog->stock($item['product_id']);
        if ($realPrice === null) {
            continue;
        }
        // حالة اختبار القبول: المخزون الفعلي أقل من الكمية المطلوبة
        if ($available < $item['qty']) {
            $errors[] = $catalog->name($item['product_id']) . ": المتاح بس $available قطعة، مش {$item['qty']}.";
            continue;
        }
        $lineTotal = $realPrice * $item['qty'];
        $total += $lineTotal;
        $lines[] = $catalog->name($item['product_id']) . " x{$item['qty']} = " . number_format($lineTotal, 2);
    }
    return ['lines' => $lines, 'total' => number_format($total, 2), 'errors' => $errors];
}

$catalog = new ProductCatalog();

// المستخدم طلب 2 كيبورد (متاح)، وماوس واحد (المخزون نفد)، و10 شاشات (المتاح 5 بس)
$cart = [
    ['product_id' => 1, 'qty' => 2],
    ['product_id' => 2, 'qty' => 1],
    ['product_id' => 3, 'qty' => 10],
];

print_r(checkout($catalog, $cart));</textarea>
    <div class="mini-toolbar">
        <button class="mini-run-btn">▶ شغّل / Run</button>
        <span class="mini-status"></span>
    </div>
    <div class="output-box">— لسه متشغلش / not run yet —</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="catalog">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">لو المتصفح بعت سعر منتج مزوّر جوه طلب الـ Checkout، منين المفروض السيرفر ياخد السعر الحقيقي؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">If the browser sends a forged product price in a checkout request, where should the server get the real price from?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="request"> من نفس الطلب اللي بعته المتصفح</label>
        <label><input type="radio" name="q1" value="catalog"> من قاعدة البيانات / الكتالوج على السيرفر</label>
        <label><input type="radio" name="q1" value="localstorage"> من localStorage بتاع المستخدم</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="hash">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">إزاي المفروض تتحقق من باسورد المستخدم وقت تسجيل الدخول؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">How should you verify a user's password at login?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="equal"> مقارنة نص عادي بـ <code>==</code></label>
        <label><input type="radio" name="q2" value="hash"> <code>password_verify()</code> ضد الـ Hash المخزّن</label>
        <label><input type="radio" name="q2" value="md5"> مقارنة بـ <code>md5()</code></label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="onlythat">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">سلة فيها 3 منتجات، واحد منهم بس نفد مخزونه. إيه أصح تصرف للـ Checkout؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">A cart has 3 products, only one of which is out of stock. What's the correct Checkout behavior?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="failall"> يرفض الطلب كله حتى لو المنتجين التانيين متاحين</label>
        <label><input type="radio" name="q3" value="onlythat"> يرفض بس المنتج اللي نفد ويكمل الباقي، مع رسالة واضحة</label>
        <label><input type="radio" name="q3" value="ignore"> يتجاهل المشكلة ويأكد الطلب بكل حاجة فيه</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="realtime">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">ليه المخزون لازم يتفحص وقت تنفيذ الـ Checkout مش وقت ما المستخدم فتح صفحة المنتج؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Why must stock be checked at checkout execution time, not when the user opened the product page?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="realtime"> لإن مستخدم تاني ممكن يكون اشترى نفس المنتج في الفترة بين الاتنين</label>
        <label><input type="radio" name="q4" value="speed"> عشان الصفحة تحمل أسرع بس</label>
        <label><input type="radio" name="q4" value="norule"> مفيش فرق حقيقي بين الاتنين</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ المهمة / The Task</h3>
    <div class="ar">🇪🇬 ابني المشروع كامل بالمواصفات فوق. ابدأ بجدول المنتجات وعرضها، بعدين السلة، بعدين التسجيل والدخول، وأخيرًا الـ Checkout. اختبر كل جزء لوحده قبل ما تربطه بالتالي.</div>
    <div class="en">🇬🇧 Build the full project to the spec above. Start with the products table and display, then the cart, then registration/login, then checkout. Test each part on its own before wiring it to the next.</div>
</div>

<h2 id="project">🚀 الخطوة الجاية / What's Next</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 المشروع ده مش "نهاية" — هو الدليل العملي اللي هتحتاجه في أي مقابلة شغل. ارفعه على GitHub بـ <code>README</code> واضح، وحطّه في Portfolio بتاعك جنب مشروع Contact Form. لو فاكر أول درس في المسار (معنى Full Stack Developer)، ده بالظبط اللي كان بيتكلم عنه: "توصيل فكرة كاملة من الصفر لمنتج شغال بمفردك".</div>
    <div class="en">🇬🇧 This project isn't an "ending" — it's the practical proof you'll need in any job interview. Push it to GitHub with a clear <code>README</code>, and add it to your Portfolio alongside the Contact Form project. If you remember the track's first lesson (What is a Full Stack Developer), this is exactly what it described: "taking an idea from zero to a working product on your own."</div>
</div>

<div class="recap-box">
    <h3>🏁 مبروك / Congratulations</h3>
    <div class="ar">🇪🇬 لو المشروع ده شغّال بالكامل، يبقى بنيت تطبيق ويب حقيقي بمفردك من الواجهة لقاعدة البيانات — ده بالظبط تعريف الـ Full Stack Developer. حطّه على GitHub وضيفه لـ Portfolio بتاعك.</div>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="contact-form-project.php">← المرحلة السابقة</a>
    <a href="../index.php">لوحة الدروس / Dashboard</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
