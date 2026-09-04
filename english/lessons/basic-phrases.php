<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'basic-phrases';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'عبارات أساسية للمحادثة اليومية';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">المرحلة 3 / Stage 3</span>
<h1>عبارات أساسية للمحادثة اليومية <span class="ltr">Basic Everyday Phrases</span></h1>
<p class="subtitle">دلوقتي هتاخد أول "أدوات شغل" حقيقية: عبارات هتستخدمها من أول محادثة، سواء في مقابلة شغل، اجتماع أونلاين، أو مجرد رسالة على Slack.</p>

<div class="step-tracker">
    <a href="#read">📖 Read</a>
    <a href="#understand">🧠 Understand</a>
    <a href="#quiz">🧠 Quiz</a>
    <a href="#challenge">🛠️ Challenge</a>
    <a href="#project">🚀 Project</a>
</div>

<h2 id="read">الهدف / Goal</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 تتعلم التحية الرسمية وغير الرسمية، تتعرف على نفسك وتسأل عن حد تاني، وتحفظ العبارات الأساسية اللي هتحتاجها يوميًا: طلب مساعدة، الشكر، والأسئلة البسيطة.</div>
    <div class="en">🇬🇧 Learn formal and informal greetings, introduce yourself and ask about someone else, and pick up the essential phrases you'll need daily: asking for help, saying thanks, and simple questions.</div>
</div>

<h2 id="understand">التحية: رسمي مقابل غير رسمي / Greetings: Formal vs Informal</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 الإنجليزية بتفرّق بوضوح بين موقف رسمي (شغل، عميل، اجتماع أول مرة) وموقف غير رسمي (صحاب، زملاء قريبين). استخدام عبارة غير رسمية في موقف رسمي ممكن تبان "قليلة أدب" من غير ما تقصد.</div>
    <div class="en">🇬🇧 English clearly distinguishes a formal situation (work, a client, a first-time meeting) from an informal one (friends, close colleagues). Using an informal phrase in a formal setting can come across as impolite without you meaning it.</div>
</div>
<div class="output-box">رسمي / Formal:
  "Good morning. How are you today?" → صباح الخير. إزيك النهاردة؟
  "It's a pleasure to meet you." → تشرفت بمعرفتك.
  "Good afternoon, Mr. Smith." → مساء الخير يا مستر سميث.

غير رسمي / Informal:
  "Hey! What's up?" → هاي! أخبارك إيه؟
  "Hi, how's it going?" → هاي، عامل إيه؟
  "Hey man, good to see you!" → يا صاحبي، عظيم إني شفتك!</div>
<h3>❌ خطأ شائع في السياق / Common context mistake</h3>
<div class="output-box">❌ "Hey what's up" لعميل جديد في أول إيميل رسمي. → (غير مناسب: ده أسلوب صحابي مش عمل)
❌ "Good afternoon, how do you do, Sir" لصاحبك في الشات. → (غير مناسب: رسمي جدًا لموقف عادي مع صاحبك)</div>
<h3>✅ الصح حسب الموقف / Correct for the situation</h3>
<div class="output-box">✅ عميل/رسمي: "Good morning, I hope you're doing well." → صباح الخير، أتمنى تكون بخير.
✅ صاحب/غير رسمي: "Hey! How's it going?" → هاي! عامل إيه؟</div>

<h2>التعارف / Introductions</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 أشهر جملة تعارف هي "What's your name?" والرد عليها "My name is..." أو ببساطة "I'm...". وبعد ما تعرف حد جديد، بنقول "Nice to meet you" (تشرفنا) — ورد المجاملة عليها بيكون "Nice to meet you too."</div>
    <div class="en">🇬🇧 The most common introduction question is "What's your name?" with the reply "My name is..." or simply "I'm...". After meeting someone new, we say "Nice to meet you" — and the polite reply is "Nice to meet you too."</div>
</div>
<div class="output-box">A: Hi, I'm Ahmed. What's your name?     → هاي، أنا أحمد. إيه اسمك؟
B: Hi Ahmed, I'm Sara. Nice to meet you!  → هاي أحمد، أنا سارة. تشرفنا!
A: Nice to meet you too, Sara. Where are you from?  → تشرفنا برضو يا سارة. انتي منين؟
B: I'm from Cairo. What do you do?        → أنا من القاهرة. بتشتغلي إيه؟
A: I'm a web developer.                    → أنا مطور مواقع.</div>
<h3>❌ خطأ شائع / Common mistake</h3>
<div class="output-box">❌ "What is your name?" ثم الرد "My name Ahmed." → المفروض: "My name is Ahmed." (ناقص فعل to be)
❌ "I from Cairo." → المفروض: "I am from Cairo." (ناقص am)</div>
<h3>✅ الصح / Correct</h3>
<div class="output-box">✅ "My name is Ahmed." أو "I'm Ahmed." → اسمي أحمد.
✅ "I am from Cairo." أو "I'm from Cairo." → أنا من القاهرة.</div>

<h2>عبارات أساسية يومية / Essential Daily Phrases</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 دي مجموعة صغيرة هتستخدمها كل يوم تقريبًا: طلب المساعدة، الشكر، الاعتذار، والأسئلة الأساسية (فين، إمتى، إزاي)، بالإضافة لعبارات السؤال عن الاتجاهات وطلب الأكل. دوس على أي بطاقة عشان تشوف الترجمة والمثال.</div>
    <div class="en">🇬🇧 This is a small set you'll use almost every day: asking for help, saying thanks, apologizing, the basic question words, plus asking for directions and ordering food. Tap any card to see the translation and example.</div>
</div>
<div class="vocab-grid">
    <div class="vocab-card">
        <div class="vocab-card-front">
            <div class="vocab-word">Can you help me, please?</div>
            <div class="vocab-pron">/kæn juː hɛlp miː pliːz/</div>
        </div>
        <div class="vocab-card-back">
            <div class="vocab-ar">ممكن تساعدني من فضلك؟</div>
            <div class="vocab-example"><div class="en">Can you help me, please? This form isn't submitting.</div><div class="ar">ممكن تساعدني من فضلك؟ الفورم مش بيتبعت.</div></div>
        </div>
        <div class="vocab-card-hint">👆 دوس / Tap</div>
    </div>
    <div class="vocab-card">
        <div class="vocab-card-front">
            <div class="vocab-word">Could you explain that again?</div>
            <div class="vocab-pron">/kʊd juː ɪkˈspleɪn ðæt əˈɡɛn/</div>
        </div>
        <div class="vocab-card-back">
            <div class="vocab-ar">ممكن توضح ده تاني؟</div>
            <div class="vocab-example"><div class="en">Sorry, could you explain that again more slowly?</div><div class="ar">آسف، ممكن توضح ده تاني بس أبطأ شوية؟</div></div>
        </div>
        <div class="vocab-card-hint">👆 دوس / Tap</div>
    </div>
    <div class="vocab-card">
        <div class="vocab-card-front">
            <div class="vocab-word">Thank you so much!</div>
            <div class="vocab-pron">/θæŋk juː soʊ mʌtʃ/</div>
        </div>
        <div class="vocab-card-back">
            <div class="vocab-ar">شكرًا جزيلًا!</div>
            <div class="vocab-example"><div class="en">Thank you so much for your help today.</div><div class="ar">شكرًا جزيلًا على مساعدتك النهاردة.</div></div>
        </div>
        <div class="vocab-card-hint">👆 دوس / Tap</div>
    </div>
    <div class="vocab-card">
        <div class="vocab-card-front">
            <div class="vocab-word">You're welcome.</div>
            <div class="vocab-pron">/jɔːr ˈwɛlkəm/</div>
        </div>
        <div class="vocab-card-back">
            <div class="vocab-ar">العفو (رد على الشكر)</div>
            <div class="vocab-example"><div class="en">"Thanks a lot!" — "You're welcome."</div><div class="ar">"شكرًا جدًا!" — "العفو."</div></div>
        </div>
        <div class="vocab-card-hint">👆 دوس / Tap</div>
    </div>
    <div class="vocab-card">
        <div class="vocab-card-front">
            <div class="vocab-word">Where is the bathroom?</div>
            <div class="vocab-pron">/wɛr ɪz ðə ˈbæθruːm/</div>
        </div>
        <div class="vocab-card-back">
            <div class="vocab-ar">فين الحمام؟</div>
            <div class="vocab-example"><div class="en">Excuse me, where is the bathroom?</div><div class="ar">لو سمحت، فين الحمام؟</div></div>
        </div>
        <div class="vocab-card-hint">👆 دوس / Tap</div>
    </div>
    <div class="vocab-card">
        <div class="vocab-card-front">
            <div class="vocab-word">How much does it cost?</div>
            <div class="vocab-pron">/haʊ mʌtʃ dʌz ɪt kɒst/</div>
        </div>
        <div class="vocab-card-back">
            <div class="vocab-ar">بكام ده؟ / تكلفته كام؟</div>
            <div class="vocab-example"><div class="en">How much does it cost to renew the domain?</div><div class="ar">تجديد الدومين بكام؟</div></div>
        </div>
        <div class="vocab-card-hint">👆 دوس / Tap</div>
    </div>
    <div class="vocab-card">
        <div class="vocab-card-front">
            <div class="vocab-word">Excuse me, how do I get to...?</div>
            <div class="vocab-pron">/ɪkˈskjuːz miː haʊ duː aɪ ɡɛt tuː/</div>
        </div>
        <div class="vocab-card-back">
            <div class="vocab-ar">لو سمحت، أروح إزاي لـ...؟ (طلب اتجاهات)</div>
            <div class="vocab-example"><div class="en">Excuse me, how do I get to the train station?</div><div class="ar">لو سمحت، أروح إزاي لمحطة القطر؟</div></div>
        </div>
        <div class="vocab-card-hint">👆 دوس / Tap</div>
    </div>
    <div class="vocab-card">
        <div class="vocab-card-front">
            <div class="vocab-word">Go straight, then turn left.</div>
            <div class="vocab-pron">/ɡoʊ streɪt ðɛn tɜːrn lɛft/</div>
        </div>
        <div class="vocab-card-back">
            <div class="vocab-ar">امشي على طول، وبعدين لف شمال. (رد على سؤال اتجاهات)</div>
            <div class="vocab-example"><div class="en">Go straight, then turn left at the pharmacy.</div><div class="ar">امشي على طول، وبعدين لف شمال عند الصيدلية.</div></div>
        </div>
        <div class="vocab-card-hint">👆 دوس / Tap</div>
    </div>
    <div class="vocab-card">
        <div class="vocab-card-front">
            <div class="vocab-word">Could I have the menu, please?</div>
            <div class="vocab-pron">/kʊd aɪ hæv ðə ˈmɛnjuː pliːz/</div>
        </div>
        <div class="vocab-card-back">
            <div class="vocab-ar">ممكن آخد المنيو من فضلك؟ (طلب أكل)</div>
            <div class="vocab-example"><div class="en">Could I have the menu, please? We're ready to order.</div><div class="ar">ممكن آخد المنيو من فضلك؟ إحنا جاهزين نطلب.</div></div>
        </div>
        <div class="vocab-card-hint">👆 دوس / Tap</div>
    </div>
    <div class="vocab-card">
        <div class="vocab-card-front">
            <div class="vocab-word">I'd like to order a coffee, please.</div>
            <div class="vocab-pron">/aɪd laɪk tuː ˈɔːrdər ə ˈkɒfi pliːz/</div>
        </div>
        <div class="vocab-card-back">
            <div class="vocab-ar">عايز أطلب قهوة من فضلك. (طلب أكل/شرب)</div>
            <div class="vocab-example"><div class="en">I'd like to order a coffee and a sandwich, please.</div><div class="ar">عايز أطلب قهوة وساندوتش من فضلك.</div></div>
        </div>
        <div class="vocab-card-hint">👆 دوس / Tap</div>
    </div>
</div>
<h3>❌ خطأ شائع / Common mistake</h3>
<div class="output-box">❌ "Where the bathroom?" → المفروض: "Where is the bathroom?" (ناقص فعل to be: is)
❌ "How much this cost?" → المفروض: "How much does this cost?" (ترتيب غلط، محتاج does)</div>
<h3>✅ الصح / Correct</h3>
<div class="output-box">✅ "Where is the bathroom?" → فين الحمام؟
✅ "How much does this cost?" → ده بكام؟</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="whats-up">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">أي عبارة دي "غير رسمية" (Informal)؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Which phrase is informal?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="whats-up"> Hey! What's up?</label>
        <label><input type="radio" name="q1" value="pleasure"> It's a pleasure to meet you.</label>
        <label><input type="radio" name="q1" value="good-morning"> Good morning, how are you today?</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="name-is">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">إيه الرد الصحيح على "What's your name?"<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What's the correct reply to "What's your name?"</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="name-ahmed"> My name Ahmed.</label>
        <label><input type="radio" name="q2" value="name-is"> My name is Ahmed.</label>
        <label><input type="radio" name="q2" value="ahmed-name"> Ahmed my name.</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="nice-too">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">حد قالك "Nice to meet you" — إيه الرد المناسب؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Someone said "Nice to meet you" — what's the right reply?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="nice-too"> Nice to meet you too.</label>
        <label><input type="radio" name="q3" value="thanks"> Thanks a lot for the help.</label>
        <label><input type="radio" name="q3" value="whats-up2"> What's up?</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="where-is">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">أي صيغة صح لسؤال عن مكان الحمام؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Which is the correct way to ask where the bathroom is?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="where-bathroom"> Where the bathroom?</label>
        <label><input type="radio" name="q4" value="where-is"> Where is the bathroom?</label>
        <label><input type="radio" name="q4" value="bathroom-where"> Bathroom where is?</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ اكتب حوار من 6 أسطر / Write a 6-Line Dialogue</h3>
    <div class="ar">🇪🇬 اكتب حوار تخيلي من 6 أسطر بينك وبين زميل جديد في الشغل: يبدأ بتحية رسمية، تعارف بالاسم، سؤال عن الشغل، ورد بالشكر في الآخر. راجع كل جملة: هل فيها فعل to be لو محتاجة؟ هل استخدمت العبارة المناسبة للموقف الرسمي؟</div>
    <div class="en">🇬🇧 Write an imaginary 6-line dialogue between you and a new colleague at work: start with a formal greeting, introduce names, ask about their job, and close with a thank-you. Review each line: does it have a "to be" verb where needed? Did you use a phrase appropriate for a formal setting?</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 العبارات اللي اتعلمتها هنا هي "مفردات جاهزة"، لكن المرحلة الجاية هتدّيك الأساس اللي يخليك تبني جمل جديدة بنفسك من غير ما تحفظ كل عبارة — هتفهم إزاي الجملة الإنجليزية بتتركب من جوه.</div>
    <div class="en">🇬🇧 The phrases you learned here are "ready-made vocabulary," but the next stage gives you the foundation to build new sentences yourself instead of memorizing every phrase — you'll understand how an English sentence is structured from the inside.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>فرّق بين التحية الرسمية (Good morning, Nice to meet you) وغير الرسمية (Hey, What's up).</li>
        <li>التعارف: "What's your name?" → "My name is... / I'm..." → "Nice to meet you too."</li>
        <li>محتاج فعل to be إجباري: "Where is the bathroom?" مش "Where the bathroom?"</li>
        <li>عبارات المساعدة والشكر جزء أساسي من أي محادثة يومية.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="alphabet-pronunciation.php">← المرحلة السابقة</a>
    <a href="grammar-basics.php">المرحلة الجاية / Next: أساسيات القواعد →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
