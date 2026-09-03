<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'grammar-basics';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'أساسيات القواعد: تركيب الجملة';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">المرحلة 4 / Stage 4</span>
<h1>أساسيات القواعد: تركيب الجملة <span class="ltr">Grammar Basics: Sentence Structure</span></h1>
<p class="subtitle">قبل ما تتعلم أي زمن أو قاعدة معقدة، لازم تفهم الهيكل الأساسي اللي كل جملة إنجليزية مبنية عليه.</p>

<div class="step-tracker">
    <a href="#read">📖 Read</a>
    <a href="#understand">🧠 Understand</a>
    <a href="#quiz">🧠 Quiz</a>
    <a href="#challenge">🛠️ Challenge</a>
    <a href="#project">🚀 Project</a>
</div>

<h2 id="read">الهدف / Goal</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 تتعرف على أجزاء الكلام الأساسية (Parts of Speech)، وتفهم ترتيب الجملة الإنجليزية الثابت (Subject-Verb-Object)، وتقدر تصحح أشهر أخطاء الترتيب اللي بيقع فيها المتحدثين بالعربية.</div>
    <div class="en">🇬🇧 Learn the core parts of speech, understand English's fixed sentence order (Subject-Verb-Object), and be able to fix the most common word-order mistakes Arabic speakers make.</div>
</div>

<h2 id="understand">أجزاء الكلام الأساسية / Core Parts of Speech</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 كل جملة إنجليزية بتتكون من مجموعة "أدوار" ثابتة: <b>Noun</b> (اسم — شخص/شيء/مكان: book, Ahmed, Cairo)، <b>Verb</b> (فعل — الحدث نفسه: run, is, write)، <b>Adjective</b> (صفة — بتوصف الاسم: big, fast, blue)، و<b>Adverb</b> (ظرف — بيوصف الفعل: quickly, well, always).</div>
    <div class="en">🇬🇧 Every English sentence is built from fixed "roles": a <b>Noun</b> (person/thing/place: book, Ahmed, Cairo), a <b>Verb</b> (the action itself: run, is, write), an <b>Adjective</b> (describes the noun: big, fast, blue), and an <b>Adverb</b> (describes the verb: quickly, well, always).</div>
</div>

<h2>الترتيب الثابت: Subject → Verb → Object</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 أهم فرق جوهري عن العربية: الإنجليزية لغة "ترتيب صارم" — الفاعل لازم يجي قبل الفعل، والفعل قبل المفعول به، تقريبًا من غير استثناءات في الجمل العادية. العربية أكتر مرونة (ممكن تقول "أكل أحمد التفاحة" أو "أحمد أكل التفاحة")، لكن الإنجليزية مش كده.</div>
    <div class="en">🇬🇧 A key fundamental difference from Arabic: English is a "strict word-order" language — the subject must come before the verb, and the verb before the object, almost without exception in ordinary sentences. Arabic is more flexible with word order, but English isn't.</div>
</div>

<h3>❌ ترتيب خاطئ (تفكير بالعربي) / Wrong order (Arabic-influenced)</h3>
<div class="output-box">❌ "Book Ahmed reads."
❌ "Fast runs he."
❌ "The apple ate Sara."</div>
<h3>✅ الترتيب الصحيح (Subject → Verb → Object) / Correct order</h3>
<div class="output-box">✅ Ahmed reads a book.       (Subject: Ahmed, Verb: reads, Object: a book)
✅ He runs fast.              (Subject: He, Verb: runs, Adverb: fast)
✅ Sara ate the apple.        (Subject: Sara, Verb: ate, Object: the apple)</div>
<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ في "He runs fast" إن الـ Adverb (fast) جه بعد الفعل مش قبله — دي نقطة تانية مهمة: الظروف غالبًا بتيجي في الآخر أو قبل الفعل مباشرة، مش في أول الجملة زي ما ممكن نميل نعمل بالعربي.</div>
    <div class="en">🇬🇧 Notice in "He runs fast" the adverb (fast) comes after the verb, not before — another important point: adverbs usually come at the end or right before the verb, not at the start of the sentence as we might be tempted to do influenced by Arabic.</div>
</div>

<h2>غلطة شائعة: نسيان فعل "الكينونة" (to be)</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 العربية بتسمحلك تقول "أحمد مبرمج" من غير أي فعل ربط. الإنجليزية محتاجة فعل <code>to be</code> (is/am/are) إجباري في الجملة، حتى لو مفيش "فعل حقيقي" بالمعنى العربي.</div>
    <div class="en">🇬🇧 Arabic lets you say "Ahmed [a] programmer" with no linking verb at all. English requires a mandatory <code>to be</code> verb (is/am/are) in the sentence, even when there's no "real action" in the Arabic sense.</div>
</div>

<h3>❌ خطأ شائع / Common mistake</h3>
<div class="output-box">❌ "Ahmed programmer."
❌ "The weather cold today."
❌ "I happy."</div>
<h3>✅ الصح / Correct</h3>
<div class="output-box">✅ Ahmed is a programmer.
✅ The weather is cold today.
✅ I am happy.</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="sara-ate">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">أي الجمل دي بترتيب Subject-Verb-Object الصحيح؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Which sentence has correct Subject-Verb-Object order?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="apple-ate"> The apple ate Sara.</label>
        <label><input type="radio" name="q1" value="sara-ate"> Sara ate the apple.</label>
        <label><input type="radio" name="q1" value="ate-sara"> Ate Sara the apple.</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="is">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">أكمل الجملة صح: "The weather ___ cold today."<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Complete correctly.</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="empty"> (من غير أي كلمة)</label>
        <label><input type="radio" name="q2" value="is"> is</label>
        <label><input type="radio" name="q2" value="do"> do</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="adverb">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">كلمة "quickly" في "She types quickly" بتمثّل إيه؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What part of speech is "quickly" here?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="noun"> Noun</label>
        <label><input type="radio" name="q3" value="adverb"> Adverb</label>
        <label><input type="radio" name="q3" value="adjective"> Adjective</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="strict">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">إيه أهم فرق بين ترتيب الجملة في الإنجليزي والعربي حسب الدرس؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What's the key word-order difference between English and Arabic per this lesson?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="strict"> الإنجليزية صارمة في الترتيب، العربية أكتر مرونة</label>
        <label><input type="radio" name="q4" value="same"> نفس الترتيب بالظبط في اللغتين</label>
        <label><input type="radio" name="q4" value="no-order"> مفيش ترتيب أصلًا في أي لغة</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ صحّح 5 جمل / Fix 5 Sentences</h3>
    <div class="ar">🇪🇬 اكتب 5 جمل بالعربي في دماغك الأول عن يومك (زي "أنا تعبان النهاردة")، وترجمها للإنجليزي مع مراعاة الترتيب الصحيح وفعل <code>to be</code> لو محتاجة. راجع كل جملة: هل الفاعل قبل الفعل؟ هل حطيت <code>is/am/are</code> لو مفيش فعل حقيقي؟</div>
    <div class="en">🇬🇧 Think of 5 sentences in Arabic about your day (like "I'm tired today"), and translate them to English while respecting correct word order and adding a <code>to be</code> verb where needed. Review each: is the subject before the verb? Did you add <code>is/am/are</code> when there's no real action verb?</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 ترتيب الجملة اللي اتعلمته هنا هو الأساس اللي المرحلتين الجايين (الأزمنة) هيتبنوا عليه — مش هتقدر تتعلم "المضارع المستمر" صح من غير ما تكون فاهم فين بالظبط يجي الفعل في الجملة.</div>
    <div class="en">🇬🇧 The sentence order you learned here is the foundation the next two stages (tenses) build on — you can't correctly learn "Present Continuous" without first knowing exactly where the verb belongs in a sentence.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>أجزاء الكلام الأساسية: Noun, Verb, Adjective, Adverb.</li>
        <li>ترتيب الجملة الإنجليزية ثابت: Subject → Verb → Object.</li>
        <li>فعل <code>to be</code> (is/am/are) إجباري حتى لو مفيش "فعل حقيقي" بالمعنى العربي.</li>
        <li>الظروف (Adverbs) غالبًا بعد الفعل، مش في أول الجملة.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="basic-phrases.php">← المرحلة السابقة</a>
    <a href="tenses-present.php">المرحلة الجاية / Next: أزمنة المضارع →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
