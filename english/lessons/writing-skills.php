<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'writing-skills';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'مهارات الكتابة';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">المرحلة 9 / Stage 9</span>
<h1>مهارات الكتابة <span class="ltr">Writing Skills</span></h1>
<p class="subtitle">فقرة منظمة كويسة بتوصل فكرتك أسرع من فقرة طويلة مليانة تفاصيل من غير ترتيب. هنبني فقرة سوا خطوة بخطوة.</p>

<div class="step-tracker">
    <a href="#read">📖 Read</a>
    <a href="#understand">🧠 Understand</a>
    <a href="#quiz">🧠 Quiz</a>
    <a href="#challenge">🛠️ Challenge</a>
    <a href="#project">🚀 Project</a>
</div>

<h2 id="read">الهدف / Goal</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 تتعلم هيكل الفقرة الأساسي (جملة رئيسية → جمل داعمة → خاتمة)، تشوف مثال حي لإعادة كتابة فقرة ضعيفة لفقرة قوية، وتتعرف على أشهر 3 أخطاء كتابة بيقع فيها المتحدثين بالعربية.</div>
    <div class="en">🇬🇧 Learn the core paragraph structure (topic sentence → supporting sentences → conclusion), see a live example rewriting a weak paragraph into a strong one, and learn the 3 most common writing mistakes Arabic speakers make.</div>
</div>

<h2 id="understand">هيكل الفقرة / Paragraph Structure</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 كل فقرة إنجليزية قوية بتتكون من 3 أجزاء: <b>جملة رئيسية (Topic Sentence)</b> في الأول بتقول الفكرة العامة، <b>جمل داعمة (Supporting Sentences)</b> بتفصّل وتديك أمثلة، و<b>خاتمة (Concluding Sentence)</b> بتلخّص أو تربط بالفكرة اللي جاية.</div>
    <div class="en">🇬🇧 Every strong English paragraph has 3 parts: a <b>topic sentence</b> at the start stating the general idea, <b>supporting sentences</b> that elaborate and give examples, and a <b>concluding sentence</b> that sums up or bridges to the next idea.</div>
</div>

<h2>مثال حي: قبل وبعد / Worked Example: Before &amp; After</h2>
<h3>❌ فقرة ضعيفة (غير منظمة) / Weak paragraph (unstructured)</h3>
<div class="output-box">"I learn programming. It is hard sometimes. I use PHP and I like it.
Yesterday I fix a bug it take me two hours. Programming good for future job
I think also English important for read documentation. My friend help me
sometimes with code."
→ الترجمة: "بتعلم برمجة. صعبة أحيانًا. بستخدم PHP وبحبها. امبارح أصلحت
باگ واخد مني ساعتين. البرمجة كويسة للمستقبل المهني، وأعتقد كمان إن
الإنجليزية مهمة لقراءة التوثيق. صاحبي بيساعدني أحيانًا في الكود."</div>
<div class="bi-block">
    <div class="ar">🇪🇬 المشكلة هنا: مفيش جملة رئيسية واضحة، الأفكار مبعثرة (تعلم البرمجة، الباج، الشغل، الإنجليزية، الصاحب) من غير ترابط، وفيه أخطاء قواعد كتير (fix بدل fixed، it take بدل it took، programming good بدل programming is good).</div>
    <div class="en">🇬🇧 The problem here: no clear topic sentence, scattered ideas (learning programming, the bug, the job, English, the friend) with no connection, and many grammar mistakes (fix instead of fixed, it take instead of it took, programming good instead of programming is good).</div>
</div>
<h3>✅ نفس الفقرة بعد إعادة الكتابة / Same paragraph rewritten</h3>
<div class="output-box">"Learning programming has been challenging but rewarding for me. I mainly
use PHP, and I genuinely enjoy working with it. For example, yesterday I
spent two hours fixing a tricky bug, and solving it gave me a real sense of
achievement. I believe programming skills, combined with strong English for
reading documentation, will open many career opportunities for me in the
future."
→ الترجمة: "تعلم البرمجة كان تحديًا لكنه ممتع بالنسبالي. بستخدم PHP غالبًا،
وبستمتع فعلًا بالشغل بيها. مثلًا، امبارح قضيت ساعتين بصلح باگ معقد، وحل
الباگ ده دّاني إحساس حقيقي بالإنجاز. أعتقد إن مهارات البرمجة، مع إنجليزية
قوية لقراءة التوثيق، هتفتحلي فرص مهنية كتير في المستقبل."</div>

<h3>مثال تاني: قبل وبعد / Another Example: Before &amp; After</h3>
<div class="bi-block">
    <div class="ar">🇪🇬 نفس المبدأ بينطبق على أي نوع كتابة، حتى تحديث حالة بسيط لمديرك.</div>
    <div class="en">🇬🇧 The same principle applies to any type of writing, even a simple status update to your manager.</div>
</div>
<h4>❌ قبل / Before</h4>
<div class="output-box">"The project going good. I did some work today. Bug still there I don't
no why. I will try fix tomorow maybe. thanks"
→ الترجمة: "المشروع ماشي كويس. عملت شغل شوية النهاردة. الباگ لسه موجود
مش عارف ليه. هحاول أصلحه بكرة يمكن. شكرًا"
(فقرة مربكة: جمل قصيرة مقطوعة، أخطاء إملائية ونحوية، ونبرة غير واثقة "maybe")</div>
<h4>✅ بعد / After</h4>
<div class="output-box">"The project is progressing well. Today I completed the payment
integration and started testing it. There's still one bug I haven't
identified the cause of yet, but I plan to investigate it tomorrow
morning. I'll update you as soon as I have more information."
<button type="button" class="speak-btn" data-text="The project is progressing well. Today I completed the payment integration and started testing it. There's still one bug I haven't identified the cause of yet, but I plan to investigate it tomorrow morning. I'll update you as soon as I have more information." data-rate="1">🔊 Listen to this paragraph</button>
→ الترجمة: "المشروع بيسير بشكل كويس. النهاردة خلصت دمج نظام الدفع
وبدأت أختبره. لسه فيه باگ واحد ماحددتش سببه، بس أنا مخطط أراجعه بكرة
الصبح. هحدّثك أول ما يبقى عندي معلومات أكتر."
(هنا: جملة رئيسية واضحة، تفاصيل محددة بدل "some work"، وخطة واضحة بدل "maybe")</div>

<div class="pronunciation-box">
    <div class="pronunciation-word">The project is progressing well.</div>
    <div class="pronunciation-ar">المشروع بيسير بشكل كويس.</div>
    <div class="pronunciation-controls">
        <button type="button" class="speak-btn" data-text="The project is progressing well." data-rate="1">🔊 Listen</button>
        <button type="button" class="speak-btn" data-text="The project is progressing well." data-rate="0.6">🐢 Slow</button>
    </div>
</div>
<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ التحسينات: جملة رئيسية واضحة في الأول ("Learning programming has been challenging but rewarding")، كل جملة بعدها بتدعم الفكرة دي بمثال، والخاتمة بتربط بالمستقبل. الأفعال كمان اتصلحت (spent, fixing, solving, will open).</div>
    <div class="en">🇬🇧 Notice the improvements: a clear topic sentence at the start, every following sentence supports it with an example, and the conclusion links to the future. The verbs were also fixed (spent, fixing, solving, will open).</div>
</div>

<h2>3 أخطاء كتابة شائعة / 3 Common Writing Mistakes</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>1. الجمل الطويلة المتلاصقة (Run-on Sentences):</b> ربط جمل كاملة كتير بـ"and" أو من غير أي علامة ترقيم، بدل ما تقسمها لجمل منفصلة أو تستخدم نقطة/فاصلة منقوطة.</div>
    <div class="en">🇬🇧 <b>1. Run-on Sentences:</b> chaining too many complete sentences together with "and" or no punctuation at all, instead of splitting them or using a period/semicolon.</div>
</div>
<div class="output-box">❌ "I finished the project and I tested it and I sent it to my manager and he was happy."
✅ "I finished the project and tested it. Then I sent it to my manager, and he was happy."
<button type="button" class="speak-btn" data-text="I finished the project and tested it. Then I sent it to my manager, and he was happy." data-rate="1">🔊 Listen</button>
→ الترجمة: خلصت المشروع واختبرته. بعدين بعتّه لمديري، وكان مبسوط.</div>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>2. حذف أدوات النكرة/المعرفة (a/an/the):</b> العربية مفيهاش أداة نكرة زي "a/an"، فبيتم حذفها بالغلط في الإنجليزي.</div>
    <div class="en">🇬🇧 <b>2. Missing articles (a/an/the):</b> Arabic has no indefinite article like "a/an," so it often gets dropped by mistake in English.</div>
</div>
<div class="output-box">❌ "I am developer. I built website for client."
✅ "I am a developer. I built a website for a client."
→ الترجمة: أنا مطور. بنيت موقع لعميل.</div>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>3. حروف الجر الخاطئة (Wrong Prepositions):</b> بعض الأفعال والصفات بتيجي مع حرف جر ثابت مش بالضرورة نفسه في العربي، فبيحصل خلط.</div>
    <div class="en">🇬🇧 <b>3. Wrong Prepositions:</b> some verbs and adjectives take a fixed preposition that doesn't necessarily match Arabic, causing mix-ups.</div>
</div>
<div class="output-box">❌ "I am interested about programming." / "Married with a developer." / "Good in English."
✅ "I am interested in programming." / "Married to a developer." / "Good at English."
→ الترجمة: مهتم بالبرمجة. / متجوز/ة من مطور/ة. / كويس في الإنجليزي.</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="topic">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">الجملة اللي بتفتح الفقرة وبتقول الفكرة العامة اسمها إيه؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What's the sentence that opens the paragraph and states the general idea called?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="topic"> Topic Sentence</label>
        <label><input type="radio" name="q1" value="supporting"> Supporting Sentence</label>
        <label><input type="radio" name="q1" value="random"> مفيش اسم محدد ليها</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="runon">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">جملة "I finished the project and I tested it and I sent it..." فيها إيه من عيوب الكتابة؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What writing flaw does this sentence have?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="runon"> Run-on sentence (جمل ملزّقة ببعض)</label>
        <label><input type="radio" name="q2" value="short"> قصيرة جدًا</label>
        <label><input type="radio" name="q2" value="fine"> مفيش أي مشكلة فيها</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="a-developer">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">أي صيغة صحيحة؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Which is correct?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="developer"> I am developer.</label>
        <label><input type="radio" name="q3" value="a-developer"> I am a developer.</label>
        <label><input type="radio" name="q3" value="the-developer2"> I am developer a.</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="interested-in">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">أي حرف جر صح مع "interested"؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Which preposition is correct with "interested"?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="interested-about"> interested about</label>
        <label><input type="radio" name="q4" value="interested-in"> interested in</label>
        <label><input type="radio" name="q4" value="interested-on"> interested on</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ اكتب فقرة من 5 جمل / Write a 5-Sentence Paragraph</h3>
    <div class="ar">🇪🇬 اكتب فقرة من 5 جمل عن آخر مشروع برمجي شغلت عليه: جملة رئيسية واضحة، 3 جمل داعمة بأمثلة محددة، وخاتمة. بعد ما تخلص، راجعها بنفسك: هل حطيت a/an/the في مكانها الصح؟ هل فيه جملة طويلة ملزّقة محتاجة تتقسم؟</div>
    <div class="en">🇬🇧 Write a 5-sentence paragraph about the last programming project you worked on: a clear topic sentence, 3 supporting sentences with specific examples, and a conclusion. Then review it yourself: did you place a/an/the correctly? Is there a run-on sentence that needs splitting?</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 مهارة الكتابة المنظمة دي هتفيدك جدًا في المرحلة الجاية لما تتعلم التحدث والنطق — نفس مبدأ "التنظيم قبل التفاصيل" بيتطبق لما تتكلم بثقة برضو، مش بس لما تكتب.</div>
    <div class="en">🇬🇧 This structured-writing skill will help a lot in the next stage on speaking and pronunciation — the same "structure before details" principle applies to speaking with confidence too, not just writing.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>هيكل الفقرة: Topic Sentence → Supporting Sentences → Conclusion.</li>
        <li>تجنب الجمل الطويلة الملزّقة (Run-on Sentences) — قسّمها أو استخدم علامات ترقيم.</li>
        <li>ماتنساش أدوات النكرة/المعرفة a/an/the — العربية بتحذفها بس الإنجليزية لأ.</li>
        <li>راجع حروف الجر الثابتة مع الأفعال والصفات (interested in، married to، good at).</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="reading-comprehension.php">← المرحلة السابقة</a>
    <a href="speaking-pronunciation.php">المرحلة الجاية / Next: التحدث والنطق →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
