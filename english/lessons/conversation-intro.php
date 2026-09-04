<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'conversation-intro';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'محادثة تفاعلية: التعارف والحياة اليومية';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">المرحلة 10 / Stage 10</span>
<h1>محادثة تفاعلية: التعارف والحياة اليومية <span class="ltr">Interactive Conversation: Introductions</span></h1>
<p class="subtitle">خلاص اتعلمت القواعد والأزمنة والنطق — دلوقتي وقت التطبيق الحقيقي. محاكي المحادثة تحت بيحطّك في موقف حقيقي، وانت بتختار ردك، وبتاخد تقييم فوري على كل اختيار — وكل سطر فيه ترجمته العربية جنبه مباشرة.</p>

<div class="step-tracker">
    <a href="#read">📖 Read</a>
    <a href="#understand">🧠 Understand</a>
    <a href="#practice">💬 Practice</a>
    <a href="#quiz">🧠 Quiz</a>
    <a href="#challenge">🛠️ Challenge</a>
    <a href="#project">🚀 Project</a>
</div>

<h2 id="read">الهدف / Goal</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 تتدرب على محادثة تعارف حقيقية في بيئة عمل، تتعلم تفرّق بين رد طبيعي ومهذب ورد جاف أو فيه خطأ نحوي، وتاخد مفردات جديدة مرتبطة بالسياق نفسه.</div>
    <div class="en">🇬🇧 Practice a real introduction conversation in a workplace setting, learn to tell a natural, polite response apart from a dry or grammatically-wrong one, and pick up new vocabulary tied to the same context.</div>
</div>

<h2 id="understand">إزاي تستخدم المحاكي / How to Use the Simulator</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 هتقرا سطر من الطرف التاني في المحادثة (مترجم تلقائيًا تحته بالعربي)، وبعدين هيظهرلك اختيارين لردك انت — اختار اللي تحس إنه الأصح، وهتاخد تقييم فوري (✅ أو ❌) يشرحلك ليه. متتوترش من اختيار غلط — الهدف إنك تتعلم من الفرق.</div>
    <div class="en">🇬🇧 You'll read a line from the other side of the conversation (automatically translated under it in Arabic), then you'll get two response options — pick the one you think is right, and get instant feedback (✅ or ❌) explaining why. Don't stress about a wrong pick — the goal is learning from the difference.</div>
</div>

<h2 id="practice">💬 محاكي المحادثة / Conversation Simulator</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>السيناريو:</b> أول يوم ليك في الشغل، وواحدة من زمايلك الجداد بتيجي تتعرف عليك.</div>
    <div class="en">🇬🇧 <b>Scenario:</b> Your first day at work, and a new colleague comes over to introduce herself.</div>
</div>

<div class="dialogue-sim" data-dialogue='[{"speaker":"other","label":"زميل / Colleague","en":"Hi! You must be the new developer. I&#39;m Sarah.","ar":"أهلاً! لازم تكون المطور الجديد. أنا سارة."},{"speaker":"you","choices":[{"en":"Hi Sarah, nice to meet you. I&#39;m Ahmed.","ar":"أهلاً سارة، سعيد بلقائك. أنا أحمد.","correct":true,"feedback_ar":"✅ رد طبيعي ومهذب جدًا — بالظبط اللي المتوقع تقوله.","next":2},{"en":"Yes. What do you want?","ar":"أيوه. عايزة إيه؟","correct":false,"feedback_ar":"❌ رد جاف وغير ودود، ممكن يدّي انطباع سيء في أول يوم.","next":2}]},{"speaker":"other","label":"زميل / Colleague","en":"Nice to meet you too, Ahmed! Where are you from?","ar":"سعيدة بلقائك برضو يا أحمد! انت منين؟"},{"speaker":"you","choices":[{"en":"I&#39;m from Cairo, Egypt.","ar":"أنا من القاهرة، مصر.","correct":true,"feedback_ar":"✅ رد بسيط ومباشر — تمام تمام.","next":4},{"en":"Why do you want to know?","ar":"ليه عايزة تعرفي؟","correct":false,"feedback_ar":"❌ رد دفاعي وغريب في محادثة ودية بسيطة.","next":4}]},{"speaker":"other","label":"زميل / Colleague","en":"Nice! So, what do you usually work on?","ar":"جميل! طيب، بتشتغل على إيه عادةً؟"},{"speaker":"you","choices":[{"en":"I mainly work on Back-End development with PHP.","ar":"بشتغل غالبًا على تطوير الـ Back-End بلغة PHP.","correct":true,"feedback_ar":"✅ إجابة واضحة ومهنية، وبتستخدم المضارع البسيط صح مع كلمة &#39;mainly&#39;.","next":6},{"en":"I working on many things.","ar":"أنا بشتغل حاجات كتير.","correct":false,"feedback_ar":"❌ خطأ نحوي — ناقص &#39;am&#39; (الصح: I am working)، والأفضل هنا المضارع البسيط: I work.","next":6}]},{"speaker":"other","label":"زميل / Colleague","en":"Great, welcome to the team! Let me know if you need any help.","ar":"تمام، أهلاً بيك في الفريق! قولّي لو احتجت أي مساعدة."},{"speaker":"you","choices":[{"en":"Thank you so much, I really appreciate it!","ar":"شكرًا جزيلًا، بجد بقدّر ده!","correct":true,"feedback_ar":"✅ ختام ودود ومهذب للمحادثة — ممتاز.","next":8},{"en":"Ok bye.","ar":"طيب باي.","correct":false,"feedback_ar":"❌ مفاجئ وجاف بعد عرض مساعدة لطيف — رد أدفأ كان أنسب.","next":8}]}]'>
    <div class="dialogue-scenario">📍 أول يوم في الشغل — زميلة جديدة بتتعرف عليك / First day at work — a new colleague introduces herself</div>
    <div class="dialogue-log"></div>
    <div class="dialogue-choices"></div>
    <button class="dialogue-restart-btn" hidden>🔄 ابدأ من جديد / Restart</button>
</div>

<h2>مفردات من المحادثة / Vocabulary from the Conversation</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 دوس على أي بطاقة عشان تشوف الترجمة والمثال.</div>
    <div class="en">🇬🇧 Click any card to reveal the translation and example.</div>
</div>
<div class="vocab-grid">
    <div class="vocab-card">
        <div class="vocab-card-front">
            <div class="vocab-word">Colleague</div>
            <div class="vocab-pron">/ˈkɒl.iːɡ/</div>
            <button type="button" class="speak-btn" data-text="Colleague" data-rate="1">🔊 Listen</button>
        </div>
        <div class="vocab-card-back">
            <div class="vocab-ar">زميل / زميلة في الشغل</div>
            <div class="vocab-example"><div class="en">My colleague helped me with the bug.</div><div class="ar">زميلي ساعدني في حل الباگ.</div></div>
        </div>
        <div class="vocab-card-hint">👆 دوس / Tap</div>
    </div>
    <div class="vocab-card">
        <div class="vocab-card-front">
            <div class="vocab-word">Mainly</div>
            <div class="vocab-pron">/ˈmeɪn.li/</div>
            <button type="button" class="speak-btn" data-text="Mainly" data-rate="1">🔊 Listen</button>
        </div>
        <div class="vocab-card-back">
            <div class="vocab-ar">غالبًا / بشكل أساسي</div>
            <div class="vocab-example"><div class="en">I mainly use PHP for Back-End work.</div><div class="ar">بستخدم PHP غالبًا في شغل الـ Back-End.</div></div>
        </div>
        <div class="vocab-card-hint">👆 دوس / Tap</div>
    </div>
    <div class="vocab-card">
        <div class="vocab-card-front">
            <div class="vocab-word">Appreciate</div>
            <div class="vocab-pron">/əˈpriː.ʃi.eɪt/</div>
            <button type="button" class="speak-btn" data-text="Appreciate" data-rate="1">🔊 Listen</button>
        </div>
        <div class="vocab-card-back">
            <div class="vocab-ar">يقدّر (شيء حصل له)</div>
            <div class="vocab-example"><div class="en">I really appreciate your help.</div><div class="ar">بجد بقدّر مساعدتك.</div></div>
        </div>
        <div class="vocab-card-hint">👆 دوس / Tap</div>
    </div>
    <div class="vocab-card">
        <div class="vocab-card-front">
            <div class="vocab-word">Team</div>
            <div class="vocab-pron">/tiːm/</div>
            <button type="button" class="speak-btn" data-text="Team" data-rate="1">🔊 Listen</button>
        </div>
        <div class="vocab-card-back">
            <div class="vocab-ar">فريق العمل</div>
            <div class="vocab-example"><div class="en">Welcome to the team!</div><div class="ar">أهلاً بيك في الفريق!</div></div>
        </div>
        <div class="vocab-card-hint">👆 دوس / Tap</div>
    </div>
</div>

<h2>🔊 استمع وتمرّن / Listen &amp; Practice</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 اسمع الجملة الأهم في الدرس ده بسرعة عادية أو بطيئة، وبعدين جرب تسجل نفسك وانت بتقولها — التسجيل بيفضل في متصفحك بس، ومتترفعش لأي سيرفر خالص.</div>
    <div class="en">🇬🇧 Listen to this lesson's key phrase at normal or slow speed, then try recording yourself saying it — the recording stays in your browser only and is never uploaded anywhere.</div>
</div>
<div class="pronunciation-box">
    <div class="pronunciation-word">Nice to meet you.</div>
    <div class="pronunciation-ipa">/naɪs tə miːt juː/</div>
    <div class="pronunciation-ar">سعيد بلقائك</div>
    <div class="pronunciation-controls">
        <button type="button" class="speak-btn" data-text="Nice to meet you." data-rate="1">🔊 Listen</button>
        <button type="button" class="speak-btn" data-text="Nice to meet you." data-rate="0.6">🐢 Slow</button>
    </div>
    <div class="pronunciation-example">
        <div class="en">Nice to meet you too, Ahmed!</div>
        <div class="ar">سعيدة بلقائك برضو يا أحمد!</div>
    </div>
</div>
<div class="speak-practice">
    <div class="speak-practice-target">
        <span class="en">"Hi, nice to meet you. I'm Ahmed."</span>
        <span class="ar">أهلاً، سعيد بلقائك. أنا أحمد.</span>
        <button type="button" class="speak-btn" data-text="Hi, nice to meet you. I'm Ahmed." data-rate="1">🔊 Listen</button>
    </div>
    <button type="button" class="speak-record-btn" data-recording="0">🎙 ابدأ التسجيل / Start Recording</button>
    <div class="speak-recording-playback"></div>
    <div class="speak-practice-status"></div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="am-working">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">إيه الصيغة الصحيحة؟ "I ___ on many things."<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What's the correct form?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="working"> working</label>
        <label><input type="radio" name="q1" value="am-working"> am working</label>
        <label><input type="radio" name="q1" value="works"> works on</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="mainly">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">أي كلمة معناها "غالبًا / بشكل أساسي"؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Which word means "mostly/primarily"?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="mainly"> mainly</label>
        <label><input type="radio" name="q2" value="colleague"> colleague</label>
        <label><input type="radio" name="q2" value="team"> team</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="polite">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">لو حد سألك "Where are you from?" في محادثة ودية، إيه أفضل رد؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">If someone asks "Where are you from?" in a friendly chat, what's the best response?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="polite"> رد بسيط ومباشر بمكانك</label>
        <label><input type="radio" name="q3" value="defensive"> "Why do you want to know?"</label>
        <label><input type="radio" name="q3" value="ignore"> تتجاهل السؤال</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="appreciate-it">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">إزاي تشكر حد بشكل دافئ بعد عرض مساعدة؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">How do you warmly thank someone after they offer help?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="ok-bye"> "Ok bye."</label>
        <label><input type="radio" name="q4" value="appreciate-it"> "Thank you so much, I really appreciate it!"</label>
        <label><input type="radio" name="q4" value="silent"> متردش خالص</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ اكتب محادثتك بنفسك / Write Your Own Conversation</h3>
    <div class="ar">🇪🇬 اكتب على ورقة محادثة تعارف زي دي لكن بمعلوماتك انت الحقيقية: اسمك، بلدك، وإيه اللي بتشتغل عليه فعلًا. اقراها بصوت عالي لنفسك — ده أول خطوة حقيقية للثقة في التحدث.</div>
    <div class="en">🇬🇧 Write out an introduction conversation like this one, but with your own real details: your name, your country, and what you actually work on. Read it aloud to yourself — that's the first real step toward speaking confidence.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 المحاكي ده هو أول تجربة ليك — بعد "إنجليزي بيئة العمل" هتلاقي محاكي أصعب وأكمل لمقابلة شغل حقيقية، هتستخدم فيه كل حاجة اتعلمتها هنا في موقف أهم بكتير.</div>
    <div class="en">🇬🇧 This simulator is your first taste — after "Business English" you'll find a harder, fuller simulator for a real job interview, where you'll use everything you learned here in a much higher-stakes situation.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>المحادثة الحقيقية = ردود طبيعية ومهذبة، مش ترجمة حرفية من العربي.</li>
        <li>المضارع البسيط بيحتاج فعل مساعد صح (am/is/are + ing) للمضارع المستمر.</li>
        <li>الود والامتنان (thank you, appreciate) بيفرقوا كتير في الانطباع الأول.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="speaking-pronunciation.php">← المرحلة السابقة</a>
    <a href="business-english.php">المرحلة الجاية / Next: إنجليزي بيئة العمل →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
