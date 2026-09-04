<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'alphabet-pronunciation';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'الحروف والنطق الأساسي';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">المرحلة 2 / Stage 2</span>
<h1>الحروف والنطق الأساسي <span class="ltr">Alphabet &amp; Basic Pronunciation</span></h1>
<p class="subtitle">قبل الكلمات والجمل، لازم تفهم أصوات الإنجليزية الأساسية — وتحديدًا الأصوات اللي مش موجودة في العربية، عشان متقعش في أخطاء بتتكرر لسنين لو محدش نبّهك ليها بدري.</p>

<div class="step-tracker">
    <a href="#read">📖 Read</a>
    <a href="#understand">🧠 Understand</a>
    <a href="#quiz">🧠 Quiz</a>
    <a href="#challenge">🛠️ Challenge</a>
    <a href="#project">🚀 Project</a>
</div>

<h2 id="read">الهدف / Goal</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 تتعرف على الحروف الـ26 وأصوات الحركات (Vowels) والصوامت (Consonants) الأساسية، وتكتشف الأصوات اللي مش موجودة في العربية أصلًا — عشان تعرف تحط عليها تركيز إضافي من أول يوم بدل ما تتعلمها غلط وتتعود عليها.</div>
    <div class="en">🇬🇧 Learn the 26 letters and the core vowel and consonant sounds, and discover which sounds don't exist in Arabic at all — so you can focus on them from day one instead of learning them wrong and getting used to the mistake.</div>
</div>

<h2 id="understand">الحروف والأصوات / Letters and Sounds</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 الإنجليزية فيها 26 حرف، لكن عدد الأصوات (Phonemes) أكبر من كده بكتير — لإن نفس الحرف ممكن يتنطق بطرق مختلفة (زي حرف "a" في cat وcake وcar)، وأصوات تانية بتتكوّن من حرفين ملتصقين زي "th" و"sh" و"ch". الحركات الأساسية هي: a, e, i, o, u — وكل واحدة ليها نطق "قصير" ونطق "طويل".</div>
    <div class="en">🇬🇧 English has 26 letters, but far more sounds (phonemes) — the same letter can be pronounced differently (like "a" in cat, cake, and car), and some sounds come from letter pairs like "th", "sh", and "ch". The core vowels are a, e, i, o, u — each with a "short" and a "long" pronunciation.</div>
</div>
<div class="output-box">a → short: cat /kæt/ (قطة) — long: cake /keɪk/ (كيكة)
e → short: bed /bɛd/ (سرير) — long: he /hiː/ (هو)
i → short: sit /sɪt/ (يجلس) — long: time /taɪm/ (وقت)
o → short: hot /hɒt/ (حار) — long: go /goʊ/ (يذهب)
u → short: cup /kʌp/ (كوب) — long: use /juːz/ (يستخدم)
a → short: man /mæn/ (رجل) — long: name /neɪm/ (اسم)
i → short: fish /fɪʃ/ (سمكة) — long: five /faɪv/ (خمسة)</div>

<h2>غلطة 1: الفرق بين /p/ و/b/</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 العربية مفيهاش صوت /p/ أصلًا — كل حرف "p" بيتنطق غالبًا "ب" بالغلط. الفرق الحقيقي: /p/ صوت "منفوخ" بهواء بيخرج من غير ما تحرك حبال صوتك، و/b/ صوت "مجهور" بتستخدم فيه حبالك الصوتية من أول لحظة. جرب تحط ورقة قدام بقك وانطق "pen" — المفروض الورقة تتحرك من الهوا. لو نطقتها "ben"، الورقة مش هتتحرك.</div>
    <div class="en">🇬🇧 Arabic has no /p/ sound at all — a "p" often gets pronounced as "b" by mistake. The real difference: /p/ is a "puff" sound with a burst of air and no vocal cord vibration, while /b/ vibrates your vocal cords from the first instant. Try holding a piece of paper in front of your mouth and saying "pen" — it should flutter from the air burst. If you say "ben" instead, the paper won't move.</div>
</div>
<h3>❌ لخبطة شائعة / Common confusion</h3>
<div class="output-box">❌ "I have a big broblem." → المقصود: "عندي مشكلة كبيرة." (النطق الصح problem مش broblem)
❌ "Please open the ben." → المقصود: "افتح القلم من فضلك." (pen القلم، مش اسم Ben)
❌ "I baid the bill." → المقصود: "دفعت الفاتورة." (paid وليس baid)</div>
<h3>✅ النطق الصح / Correct pronunciation</h3>
<div class="output-box">✅ pen /pɛn/ (قلم)  ≠  Ben /bɛn/ (اسم علم)
✅ pack /pæk/ (يحزم / عبوة)  ≠  back /bæk/ (ضهر / يرجع)
✅ cap /kæp/ (قبعة)  ≠  cab /kæb/ (تاكسي)
✅ pit /pɪt/ (حفرة)  ≠  bit /bɪt/ (جزء صغير)
✅ pin /pɪn/ (دبوس)  ≠  bin /bɪn/ (سلة مهملات)</div>

<h2>غلطة 2: الفرق بين /v/ و/f/</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 العربية كمان مفيهاش صوت /v/ — كتير من المتعلمين بينطقوا كل "v" كأنها "f". الفرق: /v/ صوت "مجهور" (حبالك الصوتية بتهتز، حط إيدك على رقبتك هتحس باهتزاز)، و/f/ صوت "مهموس" (من غير اهتزاز). جرب "van" و"fan" — لازم يبانوا مختلفين تمامًا.</div>
    <div class="en">🇬🇧 Arabic also has no /v/ sound — many learners pronounce every "v" as "f". The difference: /v/ is voiced (your vocal cords vibrate — put your hand on your throat and feel it), while /f/ is voiceless (no vibration). Try "van" and "fan" — they should sound completely different.</div>
</div>
<h3>❌ خطأ شائع / Common mistake</h3>
<div class="output-box">❌ "I lofe programming." → المقصود: "بحب البرمجة." (love وليس lofe)
❌ "Ferry good." → المقصود: "كويس جدًا." (Very good — مش Ferry/عبّارة)
❌ "I have fife files." → المقصود: "معايا خمس ملفات." (five وليس fife)</div>
<h3>✅ الصح / Correct</h3>
<div class="output-box">✅ love /lʌv/ (يحب)  ≠  laugh /læf/ (يضحك)
✅ very /ˈvɛri/ (جدًا)  ≠  ferry /ˈfɛri/ (عبّارة)
✅ five /faɪv/ (خمسة)  ≠  fife /faɪf/ (آلة نفخ موسيقية)
✅ vote /voʊt/ (يصوّت)  ≠  fought /fɔːt/ (تشاجر — ماضي fight)
✅ van /væn/ (فان/عربية نقل)  ≠  fan /fæn/ (مروحة / مُعجَب)</div>

<h2>غلطة 3: صوت "th" (θ / ð)</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 صوت "th" غريب على أغلب اللغات، وبيتنطق غلط كـ"س" أو "ز" أو "ت" أو "د". فيه نوعين: "th" المهموسة زي في think (لسانك بين سنانك، هواء من غير اهتزاز)، و"th" المجهورة زي في this (نفس وضع اللسان، لكن مع اهتزاز حبالك الصوتية).</div>
    <div class="en">🇬🇧 The "th" sound is unusual across most languages, and often gets replaced with "s", "z", "t", or "d". There are two types: voiceless "th" as in think (tongue between teeth, air with no vibration), and voiced "th" as in this (same tongue position, but with vocal cord vibration).</div>
</div>
<h3>❌ خطأ شائع / Common mistake</h3>
<div class="output-box">❌ "I sink so." → المقصود: "أعتقد كده." (think وليس sink/يغرق)
❌ "Ze book is on ze table." → المقصود: "الكتاب على الطاولة." (The وليس Ze)
❌ "Free things." → المقصود: "تلات حاجات." (Three وليس Free/مجاني)</div>
<h3>✅ الصح / Correct</h3>
<div class="output-box">✅ think /θɪŋk/ (يعتقد) — مهموسة، مش sink /sɪŋk/ (يغرق / حوض)
✅ the, this, that /ð/ (أدوات تعريف/إشارة) — مجهورة، مش ze
✅ three /θriː/ (ثلاثة) — مش free /friː/ (مجاني/حر)
✅ thanks /θæŋks/ (شكرًا) — مش tanks /tæŋks/ (دبابات)
✅ bath /bæθ/ (حمام/بانيو) — مش bat /bæt/ (خفاش/مضرب)</div>

<h2>غلطة 4: إضافة حركة زيادة قبل الكلمة</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 العربية بتستنكر بدء الكلمة بحرفين ساكنين ورا بعض، فالمخ العربي بيميل يضيف حركة قصيرة قبل الكلمة تلقائيًا. عشان كده "student" بتتقال أحيانًا "istudent"، و"school" بتتقال "eschool". الإنجليزية عادي جدًا تبدأ الكلمة بحرفين ساكنين زي st, sp, sc, sm — من غير أي حركة زيادة قبلهم.</div>
    <div class="en">🇬🇧 Arabic phonology resists starting a word with two consonants in a row, so the Arabic-trained ear tends to automatically add a short vowel before the word. That's why "student" sometimes becomes "istudent", and "school" becomes "eschool". English is perfectly fine starting a word with consonant clusters like st, sp, sc, sm — with no extra vowel before them.</div>
</div>
<h3>❌ خطأ شائع / Common mistake</h3>
<div class="output-box">❌ "Istudent" needs a "ischolarship." → المقصود: "الطالب محتاج منحة دراسية."
❌ "Espeak slowly, please." → المقصود: "اتكلم ببطء من فضلك."
❌ "Estop the car!" → المقصود: "وقّف العربية!"</div>
<h3>✅ الصح / Correct</h3>
<div class="output-box">✅ Student needs a scholarship. → الطالب محتاج منحة دراسية.
✅ Speak slowly, please. → اتكلم ببطء من فضلك.
✅ Stop the car! → وقّف العربية!
✅ Stay calm and small steps forward. → خليك هادي وامشي خطوات صغيرة.
✅ Smile and stay confident. → ابتسم وخليك واثق من نفسك.</div>

<h2>بطاقات مراجعة الأصوات / Sound Review Flashcards</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 دوس على أي بطاقة عشان تراجع الكلمة ونطقها ومعناها ومثال عليها.</div>
    <div class="en">🇬🇧 Tap any card to review the word, its pronunciation, meaning, and an example.</div>
</div>
<div class="vocab-grid">
    <div class="vocab-card">
        <div class="vocab-card-front">
            <div class="vocab-word">Pen</div>
            <div class="vocab-pron">/pɛn/</div>
        </div>
        <div class="vocab-card-back">
            <div class="vocab-ar">قلم</div>
            <div class="vocab-example"><div class="en">Can I borrow your pen for a second?</div><div class="ar">ممكن أستلف قلمك ثانية واحدة؟</div></div>
        </div>
        <div class="vocab-card-hint">👆 دوس / Tap</div>
    </div>
    <div class="vocab-card">
        <div class="vocab-card-front">
            <div class="vocab-word">Very</div>
            <div class="vocab-pron">/ˈvɛri/</div>
        </div>
        <div class="vocab-card-back">
            <div class="vocab-ar">جدًا</div>
            <div class="vocab-example"><div class="en">This lesson is very useful.</div><div class="ar">الدرس ده مفيد جدًا.</div></div>
        </div>
        <div class="vocab-card-hint">👆 دوس / Tap</div>
    </div>
    <div class="vocab-card">
        <div class="vocab-card-front">
            <div class="vocab-word">Think</div>
            <div class="vocab-pron">/θɪŋk/</div>
        </div>
        <div class="vocab-card-back">
            <div class="vocab-ar">يعتقد / يفكر</div>
            <div class="vocab-example"><div class="en">I think this code has a bug.</div><div class="ar">أعتقد إن الكود ده فيه باگ.</div></div>
        </div>
        <div class="vocab-card-hint">👆 دوس / Tap</div>
    </div>
    <div class="vocab-card">
        <div class="vocab-card-front">
            <div class="vocab-word">Three</div>
            <div class="vocab-pron">/θriː/</div>
        </div>
        <div class="vocab-card-back">
            <div class="vocab-ar">ثلاثة</div>
            <div class="vocab-example"><div class="en">I have three tasks left today.</div><div class="ar">فاضللي ثلاث مهام النهاردة.</div></div>
        </div>
        <div class="vocab-card-hint">👆 دوس / Tap</div>
    </div>
    <div class="vocab-card">
        <div class="vocab-card-front">
            <div class="vocab-word">Student</div>
            <div class="vocab-pron">/ˈstuː.dənt/</div>
        </div>
        <div class="vocab-card-back">
            <div class="vocab-ar">طالب</div>
            <div class="vocab-example"><div class="en">She is a student at a coding bootcamp.</div><div class="ar">هي طالبة في معسكر تدريب برمجي.</div></div>
        </div>
        <div class="vocab-card-hint">👆 دوس / Tap</div>
    </div>
    <div class="vocab-card">
        <div class="vocab-card-front">
            <div class="vocab-word">Speak</div>
            <div class="vocab-pron">/spiːk/</div>
        </div>
        <div class="vocab-card-back">
            <div class="vocab-ar">يتكلم</div>
            <div class="vocab-example"><div class="en">Could you speak more slowly, please?</div><div class="ar">ممكن تتكلم أبطأ شوية من فضلك؟</div></div>
        </div>
        <div class="vocab-card-hint">👆 دوس / Tap</div>
    </div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="p">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">أي صوت مش موجود في العربية أصلًا وبيتلخبط عادة مع /b/؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Which sound doesn't exist in Arabic and is often confused with /b/?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="p"> /p/</label>
        <label><input type="radio" name="q1" value="m"> /m/</label>
        <label><input type="radio" name="q1" value="k"> /k/</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="voiced">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">إيه الفرق الحقيقي بين /v/ و/f/؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What's the real difference between /v/ and /f/?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="voiced"> /v/ فيها اهتزاز في حبال الصوت، /f/ لأ</label>
        <label><input type="radio" name="q2" value="same"> مفيش فرق، بينطقوا نفس الصوت</label>
        <label><input type="radio" name="q2" value="length"> الفرق في طول الكلمة بس</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="think">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">النطق الصحيح لكلمة "think" هو إيه؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What's the correct pronunciation of "think"?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="sink"> زي "sink" بالظبط</label>
        <label><input type="radio" name="q3" value="think"> بصوت "th" مهموس، اللسان بين السنان</label>
        <label><input type="radio" name="q3" value="tink"> زي "tink" بحرف T عادي</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="no-vowel">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">إيه الصح لما تنطق كلمة "student"؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What's correct when pronouncing "student"?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="no-vowel"> تبدأ بـ"st" مباشرة من غير حركة زيادة قبلها</label>
        <label><input type="radio" name="q4" value="add-i"> تضيف "i" قبلها فتبقى "istudent"</label>
        <label><input type="radio" name="q4" value="add-e"> تضيف "e" قبلها فتبقى "estudent"</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ قايم النطق: 10 أزواج كلمات / Minimal Pairs Practice</h3>
    <div class="ar">🇪🇬 اكتب الأزواج دي على ورقة، وانطقهم بصوت عالي واحد واحد مع وقفة بينهم: pen/قلم ↔ ben/اسم علم، van/فان ↔ fan/مروحة، think/يعتقد ↔ sink/حوض، pack/يحزم ↔ back/ضهر، very/جدًا ↔ ferry/عبّارة، cap/قبعة ↔ cab/تاكسي، three/ثلاثة ↔ free/مجاني، cup/كوب ↔ cub/شبل، safe/آمن ↔ save/يحفظ. لو معاك حد، اطلب منه يسمعك ويقولك هو سمع أنهي كلمة في كل زوج.</div>
    <div class="en">🇬🇧 Write these pairs down and say them out loud one by one with a pause between: pen/ben, van/fan, think/sink, pack/back, very/ferry, cap/cab, three/free, cup/cub, safe/save. If someone's with you, ask them to tell you which word in each pair they heard.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 دلوقتي وانت واعي بأصعب أصوات الإنجليزية على الأذن العربية، جاهز تبدأ تستخدمها في عبارات حقيقية — المرحلة الجاية هتديك أول جمل ومحادثات كاملة تتمرن بيها على النطق ده في سياق طبيعي.</div>
    <div class="en">🇬🇧 Now that you're aware of the hardest English sounds for an Arabic-trained ear, you're ready to start using them in real phrases — the next stage gives you your first complete sentences and dialogues to practice this pronunciation in natural context.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>/p/ و/b/: /p/ نفخة هوا من غير اهتزاز، /b/ فيها اهتزاز فورًا.</li>
        <li>/v/ و/f/: /v/ مجهورة (اهتزاز)، /f/ مهموسة (من غير اهتزاز).</li>
        <li>"th" (θ/ð): اللسان بين السنان، مش "س" ولا "ز" ولا "ت".</li>
        <li>متضفش حركة زيادة قبل كلمات زي student وschool وspeak.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="intro.php">← المرحلة السابقة</a>
    <a href="basic-phrases.php">المرحلة الجاية / Next: عبارات أساسية →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
