<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'reading-comprehension';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'القراءة والفهم';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">المرحلة 8 / Stage 8</span>
<h1>القراءة والفهم <span class="ltr">Reading Comprehension</span></h1>
<p class="subtitle">مش لازم تفهم كل كلمة عشان تفهم نص — الدرس ده هيوريك إزاي تقرا بذكاء أسرع وتستنتج بدل ما تدور في القاموس كل ثانية.</p>

<div class="step-tracker">
    <a href="#read">📖 Read</a>
    <a href="#understand">🧠 Understand</a>
    <a href="#quiz">🧠 Quiz</a>
    <a href="#challenge">🛠️ Challenge</a>
    <a href="#project">🚀 Project</a>
</div>

<h2 id="read">الهدف / Goal</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 تفرّق بين تقنيتين مختلفتين للقراءة (Skimming وScanning)، تتعلم إزاي تستنتج معنى كلمة جديدة من السياق من غير قاموس، وتاخد استراتيجية خاصة لقراءة التوثيق التقني (Documentation).</div>
    <div class="en">🇬🇧 Distinguish between two different reading techniques (Skimming and Scanning), learn how to infer a new word's meaning from context without a dictionary, and get a specific strategy for reading technical documentation.</div>
</div>

<h2 id="understand">Skimming مقابل Scanning</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>Skimming</b> (التصفح السريع) هو إنك تقرا بسرعة عشان تاخد فكرة عامة عن النص كله — بتركز على العناوين، أول جملة في كل فقرة، والكلمات المميزة (bold/italic). <b>Scanning</b> (المسح الدقيق) هو إنك تدور على معلومة محددة (رقم، اسم، تاريخ) من غير ما تقرا كل حاجة — عينك بتتحرك بسرعة على الصفحة لحد ما تلاقي اللي تدور عليه.</div>
    <div class="en">🇬🇧 <b>Skimming</b> is reading quickly to get the general idea of a whole text — focusing on headings, the first sentence of each paragraph, and highlighted words (bold/italic). <b>Scanning</b> is searching for a specific piece of information (a number, a name, a date) without reading everything — your eyes move fast across the page until you find what you're looking for.</div>
</div>
<div class="output-box">Skimming مثال / Example use:
  عندك مقال طويل عن "React vs Vue" وعايز تعرف بس هل المقال مع React ولا مع Vue.
  اقرا العنوان + أول جملة في كل فقرة + الخلاصة في الآخر — كفاية جدًا.

Scanning مثال / Example use:
  عندك صفحة توثيق طويلة، وعايز تعرف بس "إيه اسم الـ parameter اللي بيحدد الـ timeout".
  متقراش الصفحة كلها — امسح بعينك على كلمة "timeout" لحد ما تلاقيها.</div>

<h2>استنتاج معنى كلمة من السياق / Inferring Meaning from Context</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 مش كل كلمة جديدة محتاجة قاموس. غالبًا الجملة اللي حوالين الكلمة بتديك تلميحات كافية لتخمين معناها. الطريقة: اقرا الجملة كلها، شوف الكلمات اللي حواليها بتوصف إيه، وحاول تحط معنى منطقي بدل الكلمة وشوف هل الجملة لسه منطقية.</div>
    <div class="en">🇬🇧 Not every new word needs a dictionary. Often the surrounding sentence gives enough clues to guess its meaning. The method: read the whole sentence, see what the words around it are describing, and try substituting a logical meaning to see if the sentence still makes sense.</div>
</div>
<div class="output-box">فقرة مثال / Example paragraph:
<button type="button" class="speak-btn" data-text="The new intern was quite meticulous with her code reviews. She caught three bugs that everyone else had missed, checking every single line twice before approving a pull request." data-rate="1">🔊 Listen to this paragraph</button>

"The new intern was quite meticulous with her code reviews — she caught
three bugs that everyone else had missed, checking every single line
twice before approving a pull request."
→ الترجمة: "المتدربة الجديدة كانت دقيقة جدًا في مراجعات الكود بتاعتها — لقت
تلات أخطاء فات على الكل، وكانت بتراجع كل سطر مرتين قبل ما توافق على طلب الدمج."

كلمة "meticulous" جديدة؟ خد التلميحات:
  - "caught three bugs that everyone else had missed" → دقيقة جدًا
  - "checking every single line twice" → بتراجع كل حاجة مرتين
  → الاستنتاج: meticulous = دقيق جدًا / حريص على التفاصيل (careful, detail-oriented)
  (المعنى الحقيقي: extremely careful and precise — بالظبط زي ما استنتجنا!)</div>

<h3>تدريب إضافي: استنتج كلمة تانية / Extra Practice: Infer Another Word</h3>
<div class="output-box">فقرة تانية / Another paragraph:

"After migrating to the new framework, the application became far more
robust — it kept running smoothly even when the server received ten
times its normal traffic, and it recovered automatically whenever a
single request failed."
→ الترجمة: "بعد الانتقال للـ framework الجديد، التطبيق بقى أكتر متانةً بكتير —
فضل شغّال بسلاسة حتى لما السيرفر استقبل 10 أضعاف حركة المرور العادية، وكان
بيتعافى تلقائيًا كل ما طلب واحد يفشل."

كلمة "robust" جديدة؟ خد التلميحات:
  - "kept running smoothly... ten times its normal traffic" → قادر يتحمل ضغط عالي
  - "recovered automatically whenever a single request failed" → بيتعافى من الأخطاء لوحده
  → الاستنتاج: robust = قوي ومتين / يتحمل الضغط والأخطاء (strong and resilient)
  (المعنى الحقيقي: able to withstand difficult conditions — بالظبط زي ما استنتجنا!)</div>

<div class="pronunciation-box">
    <div class="pronunciation-word">robust</div>
    <div class="pronunciation-ipa">/rəʊˈbʌst/</div>
    <div class="pronunciation-ar">قوي ومتين / يتحمل الضغط والأخطاء</div>
    <div class="pronunciation-controls">
        <button type="button" class="speak-btn" data-text="robust" data-rate="1">🔊 Listen</button>
        <button type="button" class="speak-btn" data-text="robust" data-rate="0.6">🐢 Slow</button>
    </div>
</div>
<h3>❌ عادة ضعيفة / Weak habit</h3>
<div class="output-box">❌ تقف عند كل كلمة جديدة وتفتح القاموس فورًا، فتخسر تركيزك وسرعتك في القراءة.</div>
<h3>✅ عادة قوية / Strong habit</h3>
<div class="output-box">✅ كمل القراءة، خمّن المعنى من السياق، واكتب الكلمة على جنب. لو اتكررت كتير، وقتها دوّر عليها في القاموس.</div>

<h2>قراءة التوثيق التقني / Reading Technical Documentation</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 التوثيق التقني (Documentation) له طابع خاص: جمل قصيرة ومباشرة، مصطلحات ثابتة بتتكرر (زي "parameter", "return value", "endpoint")، وأمثلة كود بتوضح الكلام أكتر من أي شرح لغوي. الاستراتيجية الأفضل: اقرا العنوان أولاً، بعدين شوف مثال الكود لو موجود قبل ما تقرا الشرح بالتفصيل — الكود غالبًا بيوضحلك المعنى قبل ما تحتاج تفهم كل كلمة.</div>
    <div class="en">🇬🇧 Technical documentation has a specific style: short, direct sentences, fixed recurring terms (like "parameter", "return value", "endpoint"), and code examples that often clarify more than the prose. The best strategy: read the heading first, then look at the code example (if any) before reading the detailed explanation — the code often clarifies the meaning before you need to understand every word.</div>
</div>
<div class="output-box">مثال توثيق / Documentation example:

"The `timeout` parameter (optional, default: 30) specifies the maximum
number of seconds to wait for a response before the request fails."
→ الترجمة: "الـ parameter بتاع timeout (اختياري، القيمة الافتراضية: 30)
بيحدد أقصى عدد ثواني للانتظار قبل ما الطلب يفشل."

استراتيجية القراءة:
  1. العنوان/الكلمة المفتاحية: timeout parameter
  2. لو فيه كود: getResponse(timeout=45) → دلوقتي فاهم إن الرقم ده بالثواني
  3. الشرح التفصيلي بقى سهل لإنك فاهم السياق من الكود الأول</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="skim">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">عايز تعرف الفكرة العامة من مقال طويل بسرعة، أي تقنية تستخدم؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Which technique fits getting the general idea of a long article fast?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="skim"> Skimming</label>
        <label><input type="radio" name="q1" value="scan"> Scanning</label>
        <label><input type="radio" name="q1" value="translate"> ترجمة كل كلمة أول بأول</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="scan">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">عايز تدور على "اسم الـ parameter" في صفحة توثيق طويلة بسرعة، أي تقنية؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Which technique fits finding a specific parameter name fast?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="skim"> Skimming</label>
        <label><input type="radio" name="q2" value="scan"> Scanning</label>
        <label><input type="radio" name="q2" value="skip"> تسيب الصفحة كلها من غير قراءة</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="careful">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">في مثال الفقرة، إيه معنى "meticulous" اللي استنتجناه من السياق؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What did we infer "meticulous" means from context?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="careful"> دقيق جدًا / حريص على التفاصيل</label>
        <label><input type="radio" name="q3" value="lazy"> كسول ومهمل</label>
        <label><input type="radio" name="q3" value="fast"> سريع بس مش دقيق</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="code-first">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">إيه الاستراتيجية المقترحة لقراءة التوثيق التقني حسب الدرس؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What's the suggested strategy for reading technical docs?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="code-first"> شوف مثال الكود الأول لو موجود، هيوضحلك المعنى قبل الشرح التفصيلي</label>
        <label><input type="radio" name="q4" value="ignore-code"> تجاهل أي كود وركّز على الشرح النصي بس</label>
        <label><input type="radio" name="q4" value="translate-all"> ترجم كل جملة كلمة كلمة قبل ما تكمل</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ استنتج 3 كلمات من سياق حقيقي / Infer 3 Words from Real Context</h3>
    <div class="ar">🇪🇬 افتح أي صفحة توثيق إنجليزية لمكتبة أو أداة بتستخدمها في سيلا. دوّر على 3 كلمات مش عارفها، وقبل ما تفتح القاموس، اكتب تخمينك لمعناها بناءً على الجملة اللي حواليها بس. بعدين افتح القاموس وقارن — قد إيه كان تخمينك قريب؟</div>
    <div class="en">🇬🇧 Open any English documentation page for a library or tool you use in Sila. Find 3 words you don't know, and before opening a dictionary, write your guess of their meaning based only on the surrounding sentence. Then check a dictionary and compare — how close was your guess?</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 مهارة الاستنتاج والقراءة السريعة اللي اتعلمتها هنا هي بالظبط اللي هتستخدمها في الكتابة كمان — المرحلة الجاية هتوريك إزاي تنظّم أفكارك في فقرة مكتوبة واضحة، مش بس تفهم اللي بتقراه.</div>
    <div class="en">🇬🇧 The inference and fast-reading skills you learned here are exactly what you'll use in writing too — the next stage shows you how to organize your ideas into a clear written paragraph, not just understand what you read.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>Skimming = فكرة عامة بسرعة. Scanning = معلومة محددة بسرعة.</li>
        <li>استنتج معنى الكلمة من السياق قبل ما تفتح القاموس.</li>
        <li>في التوثيق التقني، شوف مثال الكود الأول — بيوضح المعنى قبل الشرح.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="vocabulary-building.php">← المرحلة السابقة</a>
    <a href="writing-skills.php">المرحلة الجاية / Next: مهارات الكتابة →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
