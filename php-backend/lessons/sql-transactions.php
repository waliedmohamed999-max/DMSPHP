<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'sql-transactions';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'Transactions: BEGIN, COMMIT, ROLLBACK';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">Stage 7 · MySQL & SQL</span>
<h1>Transactions: BEGIN, COMMIT, ROLLBACK</h1>
<p class="subtitle">تحويل فلوس أو إنشاء أوردر بعناصره — لما لازم كذا عملية تنجح كلها أو تفشل كلها. <span class="ltr">Transferring money or creating an order with its items — when several operations must all succeed or all fail together.</span></p>

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
    <div class="ar">🇪🇬 تفهم إمتى محتاج تجمع كذا عملية <code>UPDATE</code>/<code>INSERT</code> في وحدة واحدة "كلها بتنجح أو كلها بترجع زي ما كانت" — زي تحويل فلوس بين حسابين. هنعمل تحويل حقيقي بـ <code>beginTransaction()</code> و<code>commit()</code>، وهنشغّل تحويل تاني هيفشل عمدًا ونستخدم <code>rollBack()</code> ونثبت فعليًا إن التغيير ما اتسجّلش.</div>
    <div class="en">🇬🇧 Understand when you need to bundle several <code>UPDATE</code>/<code>INSERT</code> operations into one unit that "all succeed or all revert together" — like transferring money between two accounts. We'll run a real transfer with <code>beginTransaction()</code> and <code>commit()</code>, then run a second transfer that deliberately fails, use <code>rollBack()</code>, and actually prove the change was never persisted.</div>
</div>

<h2 id="understand">🧠 ليه Transactions موجودة / Why Transactions Exist</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 تخيّل تحويل 150 جنيه من حساب أحمد لحساب سارة: خطوة 1 تخصم من أحمد، خطوة 2 تضيف لسارة. لو الخطوة 1 نجحت والخطوة 2 فشلت (انقطاع نت، خطأ في الكود، السيرفر وقع) — أحمد خسر 150 جنيه ومحدش استلمهم. ده بالظبط المشكلة اللي الـ <b>Transaction</b> بتحلها: <code>beginTransaction()</code> بيبدأ "منطقة آمنة"، لو كل حاجة نجحت <code>commit()</code> بيثبّت الكل مع بعض، ولو أي حاجة فشلت <code>rollBack()</code> بيرجّع كل حاجة بالظبط زي ما كانت قبل ما تبدأ — وكأن حاجة ما حصلتش خالص.</div>
    <div class="en">🇬🇧 Imagine transferring 150 from Ahmed's account to Sara's: step 1 debits Ahmed, step 2 credits Sara. If step 1 succeeds and step 2 fails (a dropped connection, a code bug, the server crashing) — Ahmed lost 150 and nobody received it. That's exactly the problem a <b>Transaction</b> solves: <code>beginTransaction()</code> opens a "safe zone"; if everything succeeds, <code>commit()</code> makes it all permanent together; if anything fails, <code>rollBack()</code> restores everything to exactly how it was before you started — as if nothing happened at all.</div>
</div>

<h2 id="practice">💻 تحويل حقيقي ناجح (Commit) / A Real Successful Transfer (Commit)</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 هنعمل جدول <code>accounts</code> جديد جوه الـ Sandbox بحسابين، ونحوّل 150 من الأول للتاني فعليًا.</div>
    <div class="en">🇬🇧 We'll create a new <code>accounts</code> table inside the sandbox with two accounts, and actually transfer 150 from the first to the second.</div>
</div>

<pre><code>&lt;?php
require __DIR__ . '/../db-sandbox/schema.php';
$pdo = build_sandbox_pdo();

$pdo->exec('CREATE TABLE accounts (id INTEGER PRIMARY KEY AUTOINCREMENT, name TEXT NOT NULL, balance REAL NOT NULL)');
$pdo->exec("INSERT INTO accounts (id, name, balance) VALUES (1, 'Ahmed Wallet', 500), (2, 'Sara Wallet', 200)");

echo "--- Before transfer ---" . PHP_EOL;
print_r($pdo->query('SELECT * FROM accounts ORDER BY id')->fetchAll(PDO::FETCH_ASSOC));

try {
    $pdo->beginTransaction();
    $pdo->prepare('UPDATE accounts SET balance = balance - ? WHERE id = ?')->execute([150, 1]);
    $pdo->prepare('UPDATE accounts SET balance = balance + ? WHERE id = ?')->execute([150, 2]);
    $pdo->commit();
    echo "Transfer committed." . PHP_EOL;
} catch (Throwable $e) {
    $pdo->rollBack();
    echo "Transfer failed: " . $e->getMessage() . PHP_EOL;
}

echo "--- After transfer ---" . PHP_EOL;
print_r($pdo->query('SELECT * FROM accounts ORDER BY id')->fetchAll(PDO::FETCH_ASSOC));</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">--- Before transfer ---
Array
(
    [0] => Array ( [id] => 1 [name] => Ahmed Wallet [balance] => 500 )
    [1] => Array ( [id] => 2 [name] => Sara Wallet [balance] => 200 )
)
Transfer committed.
--- After transfer ---
Array
(
    [0] => Array ( [id] => 1 [name] => Ahmed Wallet [balance] => 350 )
    [1] => Array ( [id] => 2 [name] => Sara Wallet [balance] => 350 )
)</div>
<div class="bi-block">
    <div class="ar">🇪🇬 رصيد أحمد نزل من 500 لـ 350 (خصم 150)، ورصيد سارة زاد من 200 لـ 350 (إضافة 150) — العمليتين اتسجّلوا مع بعض بعد <code>commit()</code>. لو أي واحدة من الاتنين فشلت قبل <code>commit()</code>، مكانش هيتسجّل ولا واحدة منهم.</div>
    <div class="en">🇬🇧 Ahmed's balance dropped from 500 to 350 (debited 150), and Sara's rose from 200 to 350 (credited 150) — both operations were persisted together after <code>commit()</code>. If either one had failed before <code>commit()</code>, neither would have been saved.</div>
</div>

<h2>الفشل الحقيقي (Rollback) / A Real Failure (Rollback)</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 دلوقتي هنحاول تحويل 1000 من حساب أحمد (اللي فيه 350 بس بعد التحويل الأول) — أكتر من رصيده. هنخصم الأول، وبعدين نتأكد إن الرصيد مبقاش سالب، ولو بقى سالب هنعمل <code>throw</code> يوقف العملية ونستخدم <code>rollBack()</code>.</div>
    <div class="en">🇬🇧 Now we'll attempt to transfer 1000 from Ahmed's account (which only has 350 after the first transfer) — more than his balance. We debit first, then check the balance isn't negative, and if it is, we <code>throw</code> to stop and use <code>rollBack()</code>.</div>
</div>

<pre><code>&lt;?php
try {
    $pdo->beginTransaction();
    $pdo->prepare('UPDATE accounts SET balance = balance - ? WHERE id = ?')->execute([1000, 1]);

    $current = $pdo->query('SELECT balance FROM accounts WHERE id = 1')->fetchColumn();
    if ($current < 0) {
        throw new RuntimeException('Insufficient funds - would go negative: ' . $current);
    }
    $pdo->prepare('UPDATE accounts SET balance = balance + ? WHERE id = ?')->execute([1000, 2]);
    $pdo->commit();
    echo "Second transfer committed." . PHP_EOL;
} catch (Throwable $e) {
    $pdo->rollBack();
    echo "Second transfer rolled back: " . $e->getMessage() . PHP_EOL;
}

echo "--- After rollback (must match the post-first-transfer state) ---" . PHP_EOL;
print_r($pdo->query('SELECT * FROM accounts ORDER BY id')->fetchAll(PDO::FETCH_ASSOC));</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">Second transfer rolled back: Insufficient funds - would go negative: -650
--- After rollback (must match the post-first-transfer state) ---
Array
(
    [0] => Array ( [id] => 1 [name] => Ahmed Wallet [balance] => 350 )
    [1] => Array ( [id] => 2 [name] => Sara Wallet [balance] => 350 )
)</div>
<div class="security-box">
    <h3>⚠️ الإثبات الحقيقي / The real proof</h3>
    <div class="ar">🇪🇬 لاحظ حاجة مهمة جدًا: قبل الـ <code>throw</code>، الخصم (<code>balance - 1000</code>) كان فعلاً اتنفّذ جوه الـ Transaction وخلّى الرصيد <code>350 - 1000 = -650</code> (شفناها في رسالة الخطأ). لكن بعد <code>rollBack()</code>، الـ <code>SELECT</code> الأخيرة رجّعت <code>350</code> بالظبط زي قبل المحاولة — يعني <code>rollBack()</code> فعلاً رجّع كل حاجة زي ما كانت، وكأن الخصم ما حصلش خالص. ده الفرق بين Transaction وعملية عادية: لو كانت دي <code>UPDATE</code> لوحدها من غير Transaction، رصيد أحمد كان هيفضل سالب فعليًا.</div>
    <div class="en">🇬🇧 Notice something crucial: before the <code>throw</code>, the debit (<code>balance - 1000</code>) had already executed inside the transaction and made the balance <code>350 - 1000 = -650</code> (visible in the error message). But after <code>rollBack()</code>, the final <code>SELECT</code> returned exactly <code>350</code> — the same as before the attempt — meaning <code>rollBack()</code> genuinely restored everything, as if the debit never happened. That's the difference from a plain operation: had this been a standalone <code>UPDATE</code> with no transaction, Ahmed's balance would actually be left negative.</div>
</div>

<div class="bi-block">
    <div class="ar">🇪🇬 جرّب بنفسك في المحرر تحت — غيّر المبلغ لأقل من الرصيد المتاح وشوف <code>commit()</code> بيتنفّذ بدل <code>rollBack()</code>.</div>
    <div class="en">🇬🇧 Try it yourself in the editor below — change the amount to less than the available balance and watch <code>commit()</code> run instead of <code>rollBack()</code>.</div>
</div>

<div class="mini-editor-wrap">
    <textarea spellcheck="false">&lt;?php
require __DIR__ . '/../db-sandbox/schema.php';
$pdo = build_sandbox_pdo();
$pdo->exec('CREATE TABLE accounts (id INTEGER PRIMARY KEY AUTOINCREMENT, name TEXT NOT NULL, balance REAL NOT NULL)');
$pdo->exec("INSERT INTO accounts (id, name, balance) VALUES (1, 'Ahmed Wallet', 500), (2, 'Sara Wallet', 200)");

$amount = 100; // جرّب تغيّرها لـ 1000 وشوف الـ rollback يحصل

try {
    $pdo->beginTransaction();
    $pdo->prepare('UPDATE accounts SET balance = balance - ? WHERE id = ?')->execute([$amount, 1]);
    $current = $pdo->query('SELECT balance FROM accounts WHERE id = 1')->fetchColumn();
    if ($current < 0) {
        throw new RuntimeException('Insufficient funds: ' . $current);
    }
    $pdo->prepare('UPDATE accounts SET balance = balance + ? WHERE id = ?')->execute([$amount, 2]);
    $pdo->commit();
    echo "Committed." . PHP_EOL;
} catch (Throwable $e) {
    $pdo->rollBack();
    echo "Rolled back: " . $e->getMessage() . PHP_EOL;
}

print_r($pdo->query('SELECT * FROM accounts ORDER BY id')->fetchAll(PDO::FETCH_ASSOC));</textarea>
    <div class="mini-toolbar">
        <button class="mini-run-btn">▶ شغّل / Run</button>
        <span class="mini-status"></span>
    </div>
    <div class="output-box">— لسه متشغلش / not run yet —</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="350">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">بعد التحويل الأول الناجح (150 من أحمد لسارة)، رصيد كل واحد بقى كام؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">After the first successful transfer (150 from Ahmed to Sara), what's each balance?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="500200"> أحمد 500، سارة 200 (متغيرش)</label>
        <label><input type="radio" name="q1" value="350"> الاتنين 350</label>
        <label><input type="radio" name="q1" value="650150"> أحمد 650، سارة 50</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="restore">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question"><code>rollBack()</code> بيعمل إيه بالظبط بعد ما تكون عملية جوه الـ Transaction اتنفذت فعلاً؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What does <code>rollBack()</code> actually do after an operation inside the transaction already executed?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="nothing"> مبيعملش حاجة — التغيير فاضل زي ما هو</label>
        <label><input type="radio" name="q2" value="restore"> بيرجّع كل حاجة زي ما كانت قبل beginTransaction</label>
        <label><input type="radio" name="q2" value="delete"> بيمسح الجدول كله</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="minus650">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">في المحاولة الفاشلة، إيه القيمة اللي شافها الكود جوه الـ Transaction قبل ما يعمل throw (وبعدين اتلغت بالكامل)؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">In the failed attempt, what value did the code see inside the transaction before throwing (and later fully discarded)?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="350"> 350</label>
        <label><input type="radio" name="q3" value="minus650"> -650</label>
        <label><input type="radio" name="q3" value="zero"> 0</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="both">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">لو التحويل فيه خطوتين (خصم + إضافة)، ونجحت الأولى وفشلت التانية من غير Transaction، إيه اللي هيحصل؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">If a transfer has two steps (debit + credit), and the first succeeds while the second fails with no Transaction, what happens?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="both"> الفلوس بتضيع — اتخصمت من حساب واتضافتش للتاني</label>
        <label><input type="radio" name="q4" value="none"> مفيش حاجة بتتغيّر أصلاً</label>
        <label><input type="radio" name="q4" value="auto"> PHP بيرجّعها أوتوماتيك من غير Transaction</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ إنشاء أوردر بعناصره / Creating an Order With Its Items</h3>
    <div class="ar">🇪🇬 في <a href="../db-sandbox/index.php">Database Playground</a>: اعمل جدولين <code>orders</code> (<code>id</code>, <code>total</code>) و<code>order_items</code> (<code>id</code>, <code>order_id</code>, <code>product_name</code>, <code>price</code>). جوه Transaction واحدة: اعمل <code>INSERT</code> للأوردر، خد <code>lastInsertId()</code>، وبعدين اعمل <code>INSERT</code> لـ 3 عناصر بيشيروا لنفس الـ <code>order_id</code>. لو حصل استثناء في أي خطوة، اعمل <code>rollBack()</code> وتأكد إن مفيش أوردر ولا عنصر واحد اتسجّل.</div>
    <div class="en">🇬🇧 In the <a href="../db-sandbox/index.php">Database Playground</a>: create two tables, <code>orders</code> (<code>id</code>, <code>total</code>) and <code>order_items</code> (<code>id</code>, <code>order_id</code>, <code>product_name</code>, <code>price</code>). Inside one transaction: <code>INSERT</code> the order, grab <code>lastInsertId()</code>, then <code>INSERT</code> 3 items referencing that same <code>order_id</code>. If any step throws, <code>rollBack()</code> and confirm neither the order nor any item was persisted.</div>
</div>

<div class="exercise-box">
    <h3>✍️ تمرين إضافي / Extra Exercise</h3>
    <div class="ar">🇪🇬 على نفس جدول <code>accounts</code> اللي بنيناه فوق، اكتب دالة <code>transfer(PDO $pdo, int $fromId, int $toId, float $amount): bool</code> بترجع <code>true</code> لو التحويل نجح و<code>false</code> لو اترفض (رصيد غير كافي)، باستخدام <code>beginTransaction</code>/<code>commit</code>/<code>rollBack</code> بالظبط زي المثال. جرّبها بمبلغ صغير (ينجح) ومبلغ أكبر من الرصيد (يترفض).</div>
    <div class="en">🇬🇧 On the same <code>accounts</code> table built above, write a <code>transfer(PDO $pdo, int $fromId, int $toId, float $amount): bool</code> function returning <code>true</code> on success and <code>false</code> when rejected (insufficient balance), using <code>beginTransaction</code>/<code>commit</code>/<code>rollBack</code> exactly like the example. Test it with a small amount (succeeds) and one larger than the balance (rejected).</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 كده خلّصنا الأساس الكامل لـ SQL و PDO — من فهم الجداول والمفاتيح، لـ SELECT/WHERE/ORDER BY، لتعديل البيانات بأمان، للتجميع والإحصائيات، للـ JOINs، للـ Prepared Statements، ولحماية عمليات مركبة بـ Transactions. الخطوة الطبيعية الجاية هي تصميم الجداول نفسها صح من الأول — إزاي تقرر العلاقات بين الجداول (One-to-One, One-to-Many, Many-to-Many) قبل ما تكتب أي CREATE TABLE. الدرس الجاي: <a href="db-relationships.php">Table Relationships</a>.</div>
    <div class="en">🇬🇧 That completes the full SQL and PDO foundation — from understanding tables and keys, through SELECT/WHERE/ORDER BY, safely changing data, grouping and statistics, JOINs, Prepared Statements, and protecting compound operations with Transactions. The natural next step is designing the tables themselves correctly from the start — how to decide relationships between tables (One-to-One, One-to-Many, Many-to-Many) before writing a single CREATE TABLE. Next lesson: <a href="db-relationships.php">Table Relationships</a>.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>Transaction = مجموعة عمليات بتتعامل كوحدة واحدة: كلها بتنجح أو كلها بترجع زي ما كانت.</li>
        <li><code>beginTransaction()</code> يبدأ المنطقة الآمنة، <code>commit()</code> يثبّت كل العمليات مع بعض بشكل دائم.</li>
        <li><code>rollBack()</code> بيرجّع كل حاجة زي ما كانت قبل البداية — حتى لو عمليات جوه الـ Transaction كانت اتنفّذت فعلاً.</li>
        <li>أثبتنا الاتنين فعليًا: تحويل ناجح غيّر الأرصدة بشكل دائم، وتحويل فاشل رجع بالظبط للحالة قبل المحاولة رغم إن الخصم كان حصل مؤقتًا.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="pdo-prepared-statements.php">← المرحلة السابقة</a>
    <a href="db-relationships.php">الدرس الجاي / Next: Table Relationships →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
