<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'clean-code-principles';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'مبادئ الكود النظيف — Clean Code Principles';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">Stage 12 · Clean Architecture &amp; MVC</span>
<h1>مبادئ الكود النظيف: DRY, KISS, YAGNI <span class="ltr">Clean Code Principles</span></h1>
<p class="subtitle">أسماء واضحة، دوال صغيرة، ومتلخبطش نفسك — الفرق بين Spaghetti Code وكود منظم. <span class="ltr">Clear names, small functions, don't repeat yourself — the difference between spaghetti code and a structured application.</span></p>

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
    <div class="ar">🇪🇬 تتعرف على 3 مبادئ عملية بتحكم قرارات يومية وانت بتكتب كود: DRY (متكررش نفسك)، KISS (خليه بسيط)، وYAGNI (متبنيش حاجة مش محتاجها دلوقتي). ملاحظة: مبادئ SOLID الخمسة (زي Single Responsibility وDependency Inversion) مشروحة بعمق في <a href="stage7.php">درس أنماط التصميم والكود النظيف</a> — الدرس ده بيكمّله بمبادئ تانية بتفرق يوميًا، مش بيكرره.</div>
    <div class="en">🇬🇧 Learn 3 practical principles that guide everyday coding decisions: DRY (don't repeat yourself), KISS (keep it simple), and YAGNI (don't build what you don't need yet). Note: the 5 SOLID principles (like Single Responsibility and Dependency Inversion) are covered in depth in the <a href="stage7.php">Design Patterns &amp; Clean Code lesson</a> — this lesson complements it with different, everyday-impact principles, not a repeat of it.</div>
</div>

<h2 id="understand">🧠 DRY — Don't Repeat Yourself</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 لما نفس منطق التحقق (أو أي منطق) يتكرر في أكتر من دالة، أي تعديل عليه (زي تشديد شرط الإيميل) لازم يتعمل في كل نسخة — ولو نسيت واحدة، هيبقى عندك سلوك مختلف من غير ما تقصد. الحل: تستخرج المنطق المتكرر لدالة واحدة، وكل حتة تانية تناديها.</div>
    <div class="en">🇬🇧 When the same validation (or any) logic is duplicated across multiple functions, any change to it (like tightening the email rule) must be made in every copy — and if you miss one, you get inconsistent behavior by accident. The fix: extract the duplicated logic into one function, and have everything else call it.</div>
</div>

<pre><code>&lt;?php
// ---------- BEFORE: duplicated validation logic ----------
function validateRegistrationBefore(string $name, string $email): array
{
    $errors = [];
    if (trim($name) === '') {
        $errors[] = 'Name is required.';
    } elseif (strlen($name) < 2) {
        $errors[] = 'Name must be at least 2 characters.';
    }
    if (trim($email) === '') {
        $errors[] = 'Email is required.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Email is invalid.';
    }
    return $errors;
}

function validateProfileUpdateBefore(string $name, string $email): array
{
    $errors = [];
    if (trim($name) === '') {
        $errors[] = 'Name is required.';
    } elseif (strlen($name) < 2) {
        $errors[] = 'Name must be at least 2 characters.';
    }
    if (trim($email) === '') {
        $errors[] = 'Email is required.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Email is invalid.';
    }
    return $errors;
}

// ---------- AFTER: one shared function ----------
function validateNameAndEmail(string $name, string $email): array
{
    $errors = [];
    if (trim($name) === '') {
        $errors[] = 'Name is required.';
    } elseif (strlen($name) < 2) {
        $errors[] = 'Name must be at least 2 characters.';
    }
    if (trim($email) === '') {
        $errors[] = 'Email is required.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Email is invalid.';
    }
    return $errors;
}

function validateRegistrationAfter(string $name, string $email): array
{
    return validateNameAndEmail($name, $email);
}

function validateProfileUpdateAfter(string $name, string $email): array
{
    return validateNameAndEmail($name, $email);
}

$cases = [
    ['', 'not-an-email'],
    ['A', 'sara@example.com'],
    ['Sara Ali', 'sara@example.com'],
];

echo "--- BEFORE (duplicated) ---" . PHP_EOL;
foreach ($cases as $c) {
    echo "registration: " . json_encode(validateRegistrationBefore($c[0], $c[1])) . PHP_EOL;
    echo "profile:      " . json_encode(validateProfileUpdateBefore($c[0], $c[1])) . PHP_EOL;
}

echo PHP_EOL . "--- AFTER (shared function, same behavior) ---" . PHP_EOL;
foreach ($cases as $c) {
    echo "registration: " . json_encode(validateRegistrationAfter($c[0], $c[1])) . PHP_EOL;
    echo "profile:      " . json_encode(validateProfileUpdateAfter($c[0], $c[1])) . PHP_EOL;
}</code></pre>
<h3 id="practice">💻 الناتج الفعلي (تم تنفيذه فعليًا) / Actual output (really executed)</h3>
<div class="output-box">--- BEFORE (duplicated) ---
registration: ["Name is required.","Email is invalid."]
profile:      ["Name is required.","Email is invalid."]
registration: ["Name must be at least 2 characters."]
profile:      ["Name must be at least 2 characters."]
registration: []
profile:      []

--- AFTER (shared function, same behavior) ---
registration: ["Name is required.","Email is invalid."]
profile:      ["Name is required.","Email is invalid."]
registration: ["Name must be at least 2 characters."]
profile:      ["Name must be at least 2 characters."]
registration: []
profile:      []

--- Identical behavior check ---
Before and After produce identical results.</div>
<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ إن النتائج مطابقة تمامًا بين النسختين — الـ AFTER معملتش أي فرق في السلوك، بس دلوقتي فيه نسخة واحدة بس من منطق التحقق. لو محتاج تضيف قاعدة جديدة (زي "الاسم متضمنش أرقام")، هتضيفها في <code>validateNameAndEmail()</code> مرة واحدة، وهتنعكس أوتوماتيك على التسجيل وتحديث البروفايل مع بعض.</div>
    <div class="en">🇬🇧 Notice the results are exactly identical between both versions — the AFTER made no behavior difference, but now there's exactly one copy of the validation logic. Need a new rule (like "name can't contain digits")? You'd add it once in <code>validateNameAndEmail()</code>, and it automatically applies to both registration and profile updates.</div>
</div>

<h2>KISS — Keep It Simple, Stupid</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 كود "أذكى" مش دايمًا كود أحسن. الـ ternary المتداخلة تحت بترجع نفس نتيجة الـ if/else بالظبط — بس محتاجة تركيز كبير عشان تفهمها من أول قراءة، خصوصًا لما تتلف على نفسها 3 مرات. الـ if/else واضح فورًا: "لو كذا، وإلا لو كذا، وإلا كذا."</div>
    <div class="en">🇬🇧 "Cleverer" code isn't always better code. The nested ternary below returns exactly the same result as the if/else — but demands real effort to parse on first read, especially nested 3 levels deep. The if/else is immediately obvious: "if this, else if that, else this."</div>
</div>

<pre><code>&lt;?php
// ---------- Overcomplicated: nested ternaries ----------
function shippingLabelTernary(float $total, bool $isMember): string
{
    return $total >= 100
        ? ($isMember ? 'Free shipping (member bonus)' : 'Free shipping')
        : ($total >= 50
            ? ($isMember ? 'Discounted shipping (member)' : 'Discounted shipping')
            : ($isMember ? 'Standard shipping (member)' : 'Standard shipping'));
}

// ---------- Clear: if/else doing the same thing ----------
function shippingLabelIfElse(float $total, bool $isMember): string
{
    if ($total >= 100) {
        return $isMember ? 'Free shipping (member bonus)' : 'Free shipping';
    }

    if ($total >= 50) {
        return $isMember ? 'Discounted shipping (member)' : 'Discounted shipping';
    }

    return $isMember ? 'Standard shipping (member)' : 'Standard shipping';
}

$cases = [
    [120.00, false], [120.00, true],
    [75.00, false],  [75.00, true],
    [20.00, false],  [20.00, true],
];

echo "--- Nested ternary version ---" . PHP_EOL;
foreach ($cases as $c) {
    echo "total={$c[0]}, member=" . ($c[1] ? 'yes' : 'no') . " -> " . shippingLabelTernary($c[0], $c[1]) . PHP_EOL;
}

echo PHP_EOL . "--- if/else version ---" . PHP_EOL;
foreach ($cases as $c) {
    echo "total={$c[0]}, member=" . ($c[1] ? 'yes' : 'no') . " -> " . shippingLabelIfElse($c[0], $c[1]) . PHP_EOL;
}</code></pre>
<h3>الناتج الفعلي (تم تنفيذه فعليًا) / Actual output (really executed)</h3>
<div class="output-box">--- Nested ternary version ---
total=120, member=no -> Free shipping
total=120, member=yes -> Free shipping (member bonus)
total=75, member=no -> Discounted shipping
total=75, member=yes -> Discounted shipping (member)
total=20, member=no -> Standard shipping
total=20, member=yes -> Standard shipping (member)

--- if/else version ---
total=120, member=no -> Free shipping
total=120, member=yes -> Free shipping (member bonus)
total=75, member=no -> Discounted shipping
total=75, member=yes -> Discounted shipping (member)
total=20, member=no -> Standard shipping
total=20, member=yes -> Standard shipping (member)

--- Same output check ---
Both versions return identical results.</div>
<div class="bi-block">
    <div class="ar">🇪🇬 نفس المدخلات، نفس المخرجات بالظبط في الاتنين — الفرق مش في "إيه اللي بيحصل" لكن في "قد إيه سهل تفهم إيه اللي بيحصل". لو زميل جديد فتح <code>shippingLabelTernary</code> بعد 6 شهور، هياخد وقت يفكّك الأقواس. <code>shippingLabelIfElse</code> واضحة من أول نظرة، وأسهل تضيفلها شرط رابع من غير ما تلخبط باقي السطر.</div>
    <div class="en">🇬🇧 Same inputs, exact same outputs for both — the difference isn't "what happens" but "how easily you can tell what happens." A new teammate opening <code>shippingLabelTernary</code> six months later needs real time to untangle the parentheses. <code>shippingLabelIfElse</code> is clear at a glance, and adding a fourth condition is easy without tangling the rest of the line.</div>
</div>

<h2>YAGNI — You Aren't Gonna Need It</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 YAGNI بيقول: مبنيش قدرة أو Abstraction عشان "ممكن تحتاجها بكرة" — ابنيها لما فعلًا تحتاجها. مثال واقعي جدًا: مشروعك بيبعت إيميلات ترحيب بس، وقررت تبني "نظام Plugins" كامل — Interface اسمه <code>NotificationChannel</code>، وFactory بتختار القناة، وConfig بيحدد أي قنوات مفعّلة — كل ده عشان "يمكن يوم نضيف SMS أو Push Notifications". النتيجة: كود أكتر بمرات من اللي محتاجه فعليًا، تعقيد إضافي في فهمه وصيانته، ومفيش حتى استخدام تاني غير الإيميل.</div>
    <div class="en">🇬🇧 YAGNI says: don't build a capability or abstraction "because you might need it tomorrow" — build it when you actually need it. A very real example: your project only sends welcome emails, but you decide to build a full "plugin system" — a <code>NotificationChannel</code> Interface, a Factory that picks the channel, and config to toggle which channels are enabled — all because "maybe one day we'll add SMS or Push Notifications." The result: far more code than you actually need, extra complexity to understand and maintain, and there's still no second implementation using any of it.</div>
</div>
<div class="bi-block">
    <div class="ar">🇪🇬 الفرق بين ده وبين Strategy Pattern في <a href="stage7.php">درس أنماط التصميم</a>: هناك كان فيه فعلًا أكتر من طريقة دفع حقيقية (Credit Card, PayPal) بتحتاج تتبدّل وقت التشغيل — الـ Abstraction كانت بتحل مشكلة موجودة فعلًا. هنا، مفيش غير قناة إشعار واحدة حقيقية، فالـ Abstraction بتحل مشكلة لسه مش موجودة. القاعدة العملية: ابني الـ Interface لما يبقى عندك ثاني تنفيذ حقيقي محتاجه، مش قبل كده.</div>
    <div class="en">🇬🇧 The difference from the Strategy Pattern in the <a href="stage7.php">Design Patterns lesson</a>: there, multiple real payment methods (Credit Card, PayPal) genuinely needed to be swappable at runtime — the abstraction solved a problem that already existed. Here, there's only ever been one real notification channel, so the abstraction solves a problem that doesn't exist yet. The practical rule: build the Interface once you have a real second implementation that needs it, not before.</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="dry">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">في مثال DRY فوق، إيه اللي اتغيّر في السلوك بعد استخراج <code>validateNameAndEmail()</code>؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">In the DRY example above, what changed in behavior after extracting <code>validateNameAndEmail()</code>?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="dry"> لا حاجة — النتائج مطابقة تمامًا، بس بقى فيه نسخة واحدة من المنطق</label>
        <label><input type="radio" name="q1" value="faster"> بقى أسرع بشكل ملحوظ</label>
        <label><input type="radio" name="q1" value="stricter"> بقى أكتر صرامة في التحقق</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="kiss">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">لو الاتنين (ternary وif/else) بيرجعوا نفس النتيجة بالظبط، إيه فايدة اختيار if/else؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">If both (ternary and if/else) return exactly the same result, what's the benefit of choosing if/else?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="kiss"> أوضح للقراءة والصيانة، حتى لو نفس النتيجة بالظبط</label>
        <label><input type="radio" name="q2" value="speed"> بيشتغل أسرع فعليًا</label>
        <label><input type="radio" name="q2" value="required"> PHP بيمنع ternary متداخلة في نسخ حديثة</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="yagni">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">مشروع بيبعت إيميلات ترحيب بس، وبنى "نظام Plugins" كامل لقنوات إشعار (SMS، Push) معملهاش حد لسه — ده مثال على مخالفة أنهي مبدأ؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">A project only sends welcome emails, but built a full plugin system for notification channels (SMS, Push) nobody uses yet — which principle does this violate?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="dry"> DRY</label>
        <label><input type="radio" name="q3" value="kiss"> KISS</label>
        <label><input type="radio" name="q3" value="yagni"> YAGNI</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="strategy">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">إيه اللي بيفرّق مثال YAGNI (Plugin system لقناة واحدة) عن Strategy Pattern الحقيقي في درس أنماط التصميم؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What distinguishes the YAGNI example (a plugin system for one channel) from the real Strategy Pattern in the Design Patterns lesson?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="strategy"> Strategy Pattern كان بيحل مشكلة موجودة فعلًا (أكتر من طريقة دفع حقيقية)، مش مشكلة متخيّلة</label>
        <label><input type="radio" name="q4" value="none"> مفيش فرق، الاتنين نفس الغلطة</label>
        <label><input type="radio" name="q4" value="speed"> Strategy Pattern أسرع في التنفيذ</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ لاقي التكرار وصلّحه / Find and Fix the Duplication</h3>
    <div class="ar">🇪🇬 في <a href="../playground/index.php">محرر الكود</a>، اكتب دالتين: <code>canCheckoutAsGuest(float $total)</code> و<code>canCheckoutAsMember(float $total)</code> — كل واحدة بتتحقق من نفس الشرط (<code>$total > 0</code> و<code>$total < 10000</code>) بمنطق متكرر. بعدين استخرج المنطق لدالة واحدة <code>isValidCheckoutTotal(float $total): bool</code> واستخدمها في الاتنين، وتأكد إن النتيجة نفسها قبل وبعد.</div>
    <div class="en">🇬🇧 In the <a href="../playground/index.php">Playground</a>, write two functions: <code>canCheckoutAsGuest(float $total)</code> and <code>canCheckoutAsMember(float $total)</code> — each checking the same condition (<code>$total > 0</code> and <code>$total < 10000</code>) with duplicated logic. Then extract the logic into one <code>isValidCheckoutTotal(float $total): bool</code> function and use it in both, confirming identical results before and after.</div>
</div>

<div class="exercise-box">
    <h3>✍️ تمرين إضافي / Extra Exercise</h3>
    <div class="ar">🇪🇬 دوّر في مشروع Task Manager (Capstone) بتاعك على أي ternary متداخلة أو أي منطق تحقق متكرر، وطبّق عليهم DRY وKISS بنفس الطريقة اللي شفتها هنا.</div>
    <div class="en">🇬🇧 Look through your Task Manager (Capstone) project for any nested ternaries or duplicated validation logic, and apply DRY and KISS to them the same way you saw here.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 دلوقتي عندك MVC (فصل المسؤوليات)، Router (توجيه الطلبات)، ومبادئ الكود النظيف (DRY/KISS/YAGNI) — كل عناصر مشروع إعادة الهيكلة الجاي جاهزة. المشروع الجاي هياخدك خطوة بخطوة تطبّق الثلاثة دول مع بعض على كود متلخبط حقيقي.</div>
    <div class="en">🇬🇧 You now have MVC (separation of concerns), a Router (request dispatching), and clean code principles (DRY/KISS/YAGNI) — every ingredient for the next refactoring project is in place. The next project walks you through applying all three together on real tangled code.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>DRY = استخرج المنطق المتكرر لمكان واحد — أي تعديل عليه ينعكس في كل مكان بيستخدمه.</li>
        <li>KISS = الحل الأوضح أحسن من "الأذكى"، حتى لو نفس النتيجة بالظبط.</li>
        <li>YAGNI = ابنِ الـ Abstraction لما يبقى عندك احتياج حقيقي، مش "احتمال مستقبلي".</li>
        <li>مبادئ SOLID الخمسة موجودة بالتفصيل في <a href="stage7.php">درس أنماط التصميم والكود النظيف</a>.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="building-a-router.php">← المرحلة السابقة</a>
    <a href="mvc-refactor-project.php">المرحلة الجاية / Next: Refactoring into MVC →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
