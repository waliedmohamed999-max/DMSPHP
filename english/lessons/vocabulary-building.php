<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'vocabulary-building';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'بناء المفردات';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">المرحلة 7 / Stage 7</span>
<h1>بناء المفردات <span class="ltr">Vocabulary Building</span></h1>
<p class="subtitle">حفظ كلمات مش مشكلة — المشكلة إنها بتتنسى بعد يومين. الدرس ده هيوريك ليه، وإزاي تخليها تفضل عالقة فعلًا.</p>

<div class="step-tracker">
    <a href="#read">📖 Read</a>
    <a href="#understand">🧠 Understand</a>
    <a href="#quiz">🧠 Quiz</a>
    <a href="#challenge">🛠️ Challenge</a>
    <a href="#project">🚀 Project</a>
</div>

<h2 id="read">الهدف / Goal</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 تفهم ليه "الحفظ في يوم واحد" (Cramming) بيفشل غالبًا، وتتعلم فكرة المراجعة المتباعدة (Spaced Repetition)، وتتعرف على "عائلات الكلمات" (Word Families) عشان كل كلمة تتعلمها تديك 3-4 كلمات مجانًا.</div>
    <div class="en">🇬🇧 Understand why cramming usually fails, learn the idea of Spaced Repetition, and discover Word Families — so every word you learn gives you 3-4 more words for free.</div>
</div>

<h2 id="understand">ليه الحفظ في يوم واحد بيفشل؟ / Why Cramming Fails</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 لما تحفظ 50 كلمة في يوم واحد، دماغك بيحطهم في "ذاكرة قصيرة المدى" — وبعد ساعات لساعتين بتبدأ تتنسى بمعدل سريع جدًا (ظاهرة اسمها "منحنى النسيان"). المفتاح مش "تذاكر أكتر"، لكن "تراجع في أوقات متباعدة": بعد يوم، بعد 3 أيام، بعد أسبوع. كل مرة بتراجع فيها، الكلمة بتترسخ أكتر في الذاكرة طويلة المدى.</div>
    <div class="en">🇬🇧 When you memorize 50 words in one day, your brain stores them in short-term memory — and within hours you start forgetting at a fast rate (a phenomenon called the "forgetting curve"). The key isn't "studying more," it's "reviewing at spaced intervals": after 1 day, after 3 days, after a week. Each review cements the word further into long-term memory.</div>
</div>
<div class="output-box">جدول مراجعة بسيط / A simple review schedule:
  اليوم اللي اتعلمت فيه الكلمة (Day 0): اتعلمها لأول مرة
  Day 1: راجعها تاني (مراجعة سريعة، 2 دقيقة)
  Day 3: راجعها تالت مرة
  Day 7: راجعها رابع مرة
  Day 21: مراجعة أخيرة — دلوقتي هي في ذاكرتك طويلة المدى</div>
<h3>❌ إستراتيجية ضعيفة / Weak strategy</h3>
<div class="output-box">❌ حفظ 100 كلمة في ليلة واحدة قبل الامتحان، من غير أي مراجعة بعدها.</div>
<h3>✅ إستراتيجية قوية / Strong strategy</h3>
<div class="output-box">✅ تعلم 10 كلمات جديدة يوميًا + راجع كلمات الأيام اللي فاتت (1، 3، 7، 21 يوم) — كمية أقل، لكن بتترسخ فعلًا.</div>

<h2>عائلات الكلمات / Word Families</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 كتير من الكلمات الإنجليزية بتيجي في "عائلة" واحدة: نفس الجذر، لكن بصيغ مختلفة (اسم، فعل، صفة، ظرف). لو اتعلمت كلمة واحدة من العائلة كويس، تقدر تستنتج الباقي بسهولة.</div>
    <div class="en">🇬🇧 Many English words come in a "family": same root, different forms (noun, verb, adjective, adverb). Learn one word in the family well, and you can often work out the rest.</div>
</div>
<div class="output-box">decide (فعل / verb) → قرر
decision (اسم / noun) → قرار
decisive (صفة / adjective) → حاسم
decisively (ظرف / adverb) → بحسم

develop (فعل) → طوّر       →  development (اسم) → تطوير      →  developer (اسم/شخص) → مطوّر
create (فعل) → أنشأ         →  creation (اسم) → إنشاء         →  creative (صفة) → مبدع
succeed (فعل) → نجح         →  success (اسم) → نجاح           →  successful (صفة) → ناجح</div>
<div class="bi-block">
    <div class="ar">🇪🇬 لما تقابل كلمة جديدة زي "developer"، اسأل نفسك: إيه الفعل اللي جاية منه؟ (develop)، وإيه الاسم المجرد؟ (development). ده بيوفر عليك وقت حفظ كبير.</div>
    <div class="en">🇬🇧 When you meet a new word like "developer," ask yourself: what's the verb it comes from? (develop), and what's the abstract noun? (development). This saves a lot of memorization time.</div>
</div>

<h2>مثال عملي: بناء مجموعة كلمات لموضوع واحد / Worked Example: A Themed Word Set</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 بدل ما تتعلم كلمات عشوائية، ابني مجموعات حوالين موضوع محدد هتحتاجه فعلًا. مثال: موضوع "مقابلة شغل" (Job Interview).</div>
    <div class="en">🇬🇧 Instead of learning random words, build sets around a specific theme you'll actually need. Example: the theme "Job Interview."</div>
</div>
<div class="output-box">مجموعة "مقابلة شغل" / "Job Interview" set:
  candidate       (n.)  المرشح للوظيفة
  strength        (n.)  نقطة قوة
  weakness        (n.)  نقطة ضعف
  experience      (n.)  خبرة
  qualification   (n.)  مؤهل
  salary          (n.)  راتب
  responsibility  (n.)  مسؤولية
  I'm confident that I'm a strong candidate for this role.
  My main strength is problem-solving; a weakness I'm working on is public speaking.</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="spaced">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">إيه اللي بيخلي الكلمات ترسخ في الذاكرة طويلة المدى حسب الدرس؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What cements words into long-term memory per this lesson?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="cram"> حفظ عدد كبير جدًا في يوم واحد بس</label>
        <label><input type="radio" name="q1" value="spaced"> المراجعة على فترات متباعدة (Spaced Repetition)</label>
        <label><input type="radio" name="q1" value="ignore"> تجاهل المراجعة تمامًا بعد أول مرة</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="decision">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">إيه صيغة الاسم (Noun) من فعل "decide"؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What's the noun form of "decide"?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="decisive"> decisive</label>
        <label><input type="radio" name="q2" value="decision"> decision</label>
        <label><input type="radio" name="q2" value="decidedly"> decidedly</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="candidate">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">أي كلمة دي من مجموعة "مقابلة شغل" وتعني "المرشح للوظيفة"؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Which word from the "job interview" set means "the applicant"?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="candidate"> candidate</label>
        <label><input type="radio" name="q3" value="salary"> salary</label>
        <label><input type="radio" name="q3" value="weakness"> weakness</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="root">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">الفايدة الأساسية من "عائلات الكلمات" (Word Families) إيه؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What's the main benefit of word families?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="root"> تعلم كلمة واحدة بيديك 3-4 كلمات تانية من نفس الجذر</label>
        <label><input type="radio" name="q4" value="random"> مفيش أي علاقة بين الكلمات في نفس العائلة</label>
        <label><input type="radio" name="q4" value="grammar"> بتساعد بس في القواعد مش المفردات</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ ابني مجموعة كلمات خاصة بمجالك / Build Your Own Themed Set</h3>
    <div class="ar">🇪🇬 اختار موضوع مرتبط بمسارك في سيلا (زي "Web Development" أو "Databases")، واكتب 8 كلمات مرتبطة بيه مع الترجمة. بعد كده اختار كلمة واحدة منهم وابحث عن عائلتها الكاملة (فعل/اسم/صفة). حط تذكير في تليفونك تراجع القايمة دي بعد يوم، وبعد 3 أيام، وبعد أسبوع.</div>
    <div class="en">🇬🇧 Pick a theme related to your Sila track (like "Web Development" or "Databases"), and write 8 related words with translations. Then pick one word and find its full word family (verb/noun/adjective). Set a phone reminder to review this list after 1 day, 3 days, and 1 week.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 دلوقتي معاك استراتيجية حفظ كلمات فعالة. المرحلة الجاية هتوريك إزاي تستخدم مفرداتك دي في القراءة — استراتيجيات فهم النصوص، وإزاي تستنتج معنى كلمة جديدة من غير ما تفتح القاموس كل مرة.</div>
    <div class="en">🇬🇧 You now have an effective word-learning strategy. The next stage shows you how to apply that vocabulary to reading — comprehension strategies, and inferring a new word's meaning without opening a dictionary every time.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>الحفظ في يوم واحد بيفشل بسبب "منحنى النسيان" — المراجعة المتباعدة (Day 1, 3, 7, 21) هي الحل.</li>
        <li>عائلات الكلمات (Word Families) بتديك 3-4 كلمات من جذر واحد.</li>
        <li>تعلم كلمات في "مجموعات موضوعية" (زي مقابلة الشغل) أكفأ من كلمات عشوائية.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="tenses-past-future.php">← المرحلة السابقة</a>
    <a href="reading-comprehension.php">المرحلة الجاية / Next: القراءة والفهم →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
