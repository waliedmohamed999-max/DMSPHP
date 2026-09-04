<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'banking-services';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'البنك والخدمات';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">B2 · Upper-Intermediate</span>
<h1>البنك والخدمات <span class="ltr">Banking &amp; Services</span></h1>
<p class="subtitle">تفتح حساب، تحول فلوس، وتتعامل مع خدمات حكومية أو بنكية بالإنجليزي.</p>

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
    <div class="ar">🇪🇬 تتدرب على موقف بنكي حقيقي كامل — من فتح حساب توفير لعمل تحويل دولي — وتتعلم تفرّق بين رد واضح ومهذب يديك الخدمة اللي عايزها، ورد مقطّع أو فيه خطأ نحوي ممكن يلخبط الموظف أو يدّي انطباع سيء. كمان هتاخد مفردات بنكية أساسية هتحتاجها في أي بنك في أي بلد.</div>
    <div class="en">🇬🇧 Practice a complete, realistic bank scenario — from opening a savings account to setting up an international transfer — and learn to tell a clear, polite response apart from a broken or grammatically-flawed one that could confuse the clerk or leave a bad impression. You'll also pick up essential banking vocabulary you'll need at any bank, anywhere.</div>
</div>

<h2 id="understand">إزاي تستخدم المحاكي / How to Use the Simulator</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 نفس فكرة المحاكيات اللي جربتها قبل كده: هتقرا سطر من موظف البنك (مترجم تلقائيًا تحته بالعربي)، وبعدين هيظهرلك اختيارين لردك انت. اختار اللي تحس إنه الأصح، وهتاخد تقييم فوري (✅ أو ❌) يشرحلك السبب بالظبط — سواء غلطة نحوية أو مشكلة في الأدب أو الوضوح.</div>
    <div class="en">🇬🇧 Same idea as the simulators you've tried before: you'll read a line from the bank clerk (automatically translated under it in Arabic), then get two response options. Pick the one you think is right, and get instant feedback (✅ or ❌) explaining exactly why — whether it's a grammar mistake or a politeness or clarity problem.</div>
</div>

<h2 id="practice">💬 محاكي البنك / Bank Simulator</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>السيناريو:</b> رحت لفرع بنك عشان تفتح حساب توفير جديد، وهتحتاج كمان تظبط تحويل فلوس دولي لأخوك.</div>
    <div class="en">🇬🇧 <b>Scenario:</b> You've gone to a bank branch to open a new savings account, and you'll also need to set up an international money transfer to your brother.</div>
</div>

<div class="dialogue-sim" data-dialogue='[{"speaker": "other", "label": "موظف البنك / Bank Clerk", "en": "Good morning, welcome to First National Bank. How can I help you today?", "ar": "صباح الخير، أهلاً بيك في بنك فيرست ناشونال. أقدر أساعدك في إيه النهاردة؟"}, {"speaker": "you", "choices": [{"en": "Good morning. I&#39;d like to open a savings account, please.", "ar": "صباح الخير. حابب أفتح حساب توفير، من فضلك.", "correct": true, "feedback_ar": "✅ طلب واضح ومهذب باستخدام \"I&#39;d like to\" — بالظبط الصيغة المناسبة لطلب خدمة في بنك.", "next": 2}, {"en": "I want account. Bank account. Now.", "ar": "عايز حساب. حساب بنكي. دلوقتي.", "correct": false, "feedback_ar": "❌ جملة مقطعة وغير مهذبة، وناقصة أداة النكرة \"an\" قبل \"account\" — والأهم إنها بتوحي بإلحاح غير لائق مع موظف الخدمة.", "next": 2}]}, {"speaker": "other", "label": "موظف البنك / Bank Clerk", "en": "Of course. Could you tell me, would you like to make an initial deposit today, and do you have your ID with you?", "ar": "أكيد. ممكن تقولّي، هل حابب تعمل إيداع مبدئي النهاردة، ومعاك إثبات الهوية؟"}, {"speaker": "you", "choices": [{"en": "Yes, I have my ID here, and I&#39;d like to deposit 2,000 pounds to open the account.", "ar": "أيوه، معايا إثبات الهوية هنا، وحابب أودّع 2000 جنيه لفتح الحساب.", "correct": true, "feedback_ar": "✅ رد كامل ومباشر بيجاوب على السؤالين المطروحين، ومستخدم فعل \"deposit\" صح كفعل مضارع بسيط بعد \"I&#39;d like to\".", "next": 4}, {"en": "ID yes. Money I give later maybe.", "ar": "الهوية أيوه. الفلوس هديها بعدين يمكن.", "correct": false, "feedback_ar": "❌ صياغة مكسورة نحويًا ومبهمة — \"maybe\" في سياق مالي رسمي بتدي انطباع غير جاد، والأفضل تحديد رقم أو تقول \"I&#39;ll deposit later\" بوضوح.", "next": 4}]}, {"speaker": "other", "label": "موظف البنك / Bank Clerk", "en": "Perfect, that all looks in order. While you&#39;re here, is there anything else I can help you with?", "ar": "تمام، كل حاجة سليمة. وانت هنا، فيه حاجة تانية أقدر أساعدك فيها؟"}, {"speaker": "you", "choices": [{"en": "Actually, yes — I also need to set up an international transfer to my brother next week.", "ar": "في الحقيقة أيوه — محتاج كمان أظبط تحويل دولي لأخويا الأسبوع الجاي.", "correct": true, "feedback_ar": "✅ استخدام \"actually\" هنا بيربط الفكرة بسلاسة، والجملة كاملة وواضحة عن حاجة مستقبلية محددة بزمن المستقبل البسيط (need to set up).", "next": 6}, {"en": "No no is okay bye.", "ar": "لأ لأ تمام باي.", "correct": false, "feedback_ar": "❌ رد ركيك نحويًا (\"is okay\" بدل \"it&#39;s okay\") وقاطع للمحادثة فجأة رغم إن الموظف عرض مساعدة إضافية بأدب.", "next": 6}]}, {"speaker": "other", "label": "موظف البنك / Bank Clerk", "en": "No problem. What&#39;s the maximum amount you&#39;re planning to transfer, and to which country?", "ar": "مفيش مشكلة. إيه أقصى مبلغ ناوي تحوّله، ولأي بلد؟"}, {"speaker": "you", "choices": [{"en": "I&#39;m planning to transfer around 500 dollars to the United States.", "ar": "ناوي أحوّل حوالي 500 دولار للولايات المتحدة.", "correct": true, "feedback_ar": "✅ إجابة محددة وسليمة نحويًا — \"I&#39;m planning to\" مضارع مستمر صحيح للتعبير عن نية مستقبلية قريبة.", "next": 8}, {"en": "Not sure. Much money. USA I think.", "ar": "مش متأكد. فلوس كتير. أمريكا أعتقد.", "correct": false, "feedback_ar": "❌ ثلاث جمل مقطوعة بلا أفعال ولا تراكيب واضحة — في موقف مالي زي التحويل، الموظف محتاج أرقام ومعلومات دقيقة مش تخمين.", "next": 8}]}, {"speaker": "other", "label": "موظف البنك / Bank Clerk", "en": "Got it. There&#39;s a small transfer fee of 15 dollars — is that acceptable to you?", "ar": "تمام. فيه رسوم تحويل بسيطة 15 دولار — ده مقبول بالنسبالك؟"}, {"speaker": "you", "choices": [{"en": "Yes, that&#39;s fine. Could you also tell me how long the transfer usually takes?", "ar": "أيوه، تمام كده. ممكن تقولّي كمان التحويل بياخد قد إيه عادةً؟", "correct": true, "feedback_ar": "✅ موافقة واضحة ومتبوعة بسؤال متابعة ذكي — \"Could you also tell me\" صيغة مهذبة ومثالية لطلب معلومة إضافية.", "next": 10}, {"en": "15 dollar too much no.", "ar": "15 دولار كتير قوي لأ.", "correct": false, "feedback_ar": "❌ رفض مباغت وغير مهذب بجملة ناقصة (المفروض \"15 dollars\" بالجمع، و\"that&#39;s too much\" كصياغة كاملة) — الاعتراض على رسوم لازم يتقال بلباقة أكتر.", "next": 10}]}, {"speaker": "other", "label": "موظف البنك / Bank Clerk", "en": "It usually takes two to three business days. I&#39;ll email you the confirmation once everything is set up.", "ar": "بياخد عادةً من يومين لتلات أيام عمل. هبعتلك التأكيد بالإيميل أول ما كل حاجة تتظبط."}, {"speaker": "you", "choices": [{"en": "That sounds great, thank you so much for all your help today.", "ar": "ده ممتاز، شكرًا جزيلًا على كل مساعدتك النهاردة.", "correct": true, "feedback_ar": "✅ ختام دافئ ومهني — \"thank you so much for all your help\" أسلوب راقٍ لإنهاء تعامل بنكي بامتنان حقيقي.", "next": 12}, {"en": "Ok whatever, send email.", "ar": "طيب أيًا كان، ابعت الإيميل.", "correct": false, "feedback_ar": "❌ \"whatever\" كلمة فظة تمامًا هنا وبتدي انطباع عدم اهتمام أو استخفاف بمجهود الموظف، حتى لو الطلب نفسه (إرسال الإيميل) منطقي.", "next": 12}]}]'>
    <div class="dialogue-scenario">📍 فتح حساب وتحويل دولي في فرع بنك / Opening an account and an international transfer at a bank branch</div>
    <div class="dialogue-log"></div>
    <div class="dialogue-choices"></div>
    <button class="dialogue-restart-btn" hidden>🔄 ابدأ من جديد / Restart</button>
</div>

<h2>مفردات البنك / Banking Vocabulary</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 دوس على أي بطاقة عشان تشوف الترجمة والمثال.</div>
    <div class="en">🇬🇧 Click any card to reveal the translation and example.</div>
</div>
<div class="vocab-grid">
    <div class="vocab-card">
        <div class="vocab-card-front">
            <div class="vocab-word">Account</div>
            <div class="vocab-pron">/əˈkaʊnt/</div>
            <button type="button" class="speak-btn" data-text="Account" data-rate="1">🔊 Listen</button>
        </div>
        <div class="vocab-card-back">
            <div class="vocab-ar">حساب (بنكي)</div>
            <div class="vocab-example"><div class="en">I opened a savings account last week.</div><div class="ar">فتحت حساب توفير الأسبوع اللي فات.</div></div>
        </div>
        <div class="vocab-card-hint">👆 دوس / Tap</div>
    </div>
    <div class="vocab-card">
        <div class="vocab-card-front">
            <div class="vocab-word">Deposit</div>
            <div class="vocab-pron">/dɪˈpɒz.ɪt/</div>
            <button type="button" class="speak-btn" data-text="Deposit" data-rate="1">🔊 Listen</button>
        </div>
        <div class="vocab-card-back">
            <div class="vocab-ar">إيداع / يودع فلوس</div>
            <div class="vocab-example"><div class="en">I&#39;d like to deposit 2,000 pounds today.</div><div class="ar">حابب أودّع 2000 جنيه النهاردة.</div></div>
        </div>
        <div class="vocab-card-hint">👆 دوس / Tap</div>
    </div>
    <div class="vocab-card">
        <div class="vocab-card-front">
            <div class="vocab-word">Withdraw</div>
            <div class="vocab-pron">/wɪðˈdrɔː/</div>
            <button type="button" class="speak-btn" data-text="Withdraw" data-rate="1">🔊 Listen</button>
        </div>
        <div class="vocab-card-back">
            <div class="vocab-ar">يسحب فلوس</div>
            <div class="vocab-example"><div class="en">Can I withdraw cash from this ATM?</div><div class="ar">أقدر أسحب فلوس من الصراف الآلي ده؟</div></div>
        </div>
        <div class="vocab-card-hint">👆 دوس / Tap</div>
    </div>
    <div class="vocab-card">
        <div class="vocab-card-front">
            <div class="vocab-word">Transfer</div>
            <div class="vocab-pron">/trænsˈfɜːr/</div>
            <button type="button" class="speak-btn" data-text="Transfer" data-rate="1">🔊 Listen</button>
        </div>
        <div class="vocab-card-back">
            <div class="vocab-ar">تحويل / يحوّل فلوس</div>
            <div class="vocab-example"><div class="en">I need to transfer money to my brother abroad.</div><div class="ar">محتاج أحوّل فلوس لأخويا برّه البلد.</div></div>
        </div>
        <div class="vocab-card-hint">👆 دوس / Tap</div>
    </div>
    <div class="vocab-card">
        <div class="vocab-card-front">
            <div class="vocab-word">Balance</div>
            <div class="vocab-pron">/ˈbæl.əns/</div>
            <button type="button" class="speak-btn" data-text="Balance" data-rate="1">🔊 Listen</button>
        </div>
        <div class="vocab-card-back">
            <div class="vocab-ar">رصيد الحساب</div>
            <div class="vocab-example"><div class="en">Could you check my account balance, please?</div><div class="ar">ممكن تشوف رصيد حسابي، من فضلك؟</div></div>
        </div>
        <div class="vocab-card-hint">👆 دوس / Tap</div>
    </div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="id-like">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">إيه أفضل طريقة تطلب بيها فتح حساب في البنك؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What's the best way to ask to open a bank account?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="id-like"> "I&#39;d like to open a savings account, please."</label>
        <label><input type="radio" name="q1" value="i-want"> "I want account. Now."</label>
        <label><input type="radio" name="q1" value="silent"> ما تقولش حاجة وتستنى</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="deposit">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">أي كلمة معناها "يودّع فلوس في حسابه"؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Which word means "to put money into your account"?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="withdraw"> withdraw</label>
        <label><input type="radio" name="q2" value="deposit"> deposit</label>
        <label><input type="radio" name="q2" value="balance"> balance</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="planning-to">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">إيه الصيغة الصحيحة؟ "I ___ transfer around 500 dollars."<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What's the correct form?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="planning-to"> am planning to</label>
        <label><input type="radio" name="q3" value="plan-to-wrong"> planning</label>
        <label><input type="radio" name="q3" value="plans"> plans</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="balance">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">لو عايز تعرف المبلغ الموجود في حسابك، هتسأل عن إيه؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">If you want to know how much money is in your account, what do you ask about?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="transfer"> transfer</label>
        <label><input type="radio" name="q4" value="balance"> balance</label>
        <label><input type="radio" name="q4" value="withdraw-wrong"> withdraw</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ اكتب موقفك البنكي / Write Your Own Bank Situation</h3>
    <div class="ar">🇪🇬 اكتب على ورقة محادثة قصيرة بينك وبين موظف بنك تطلب فيها سحب فلوس أو الاستفسار عن رصيدك، مستخدم على الأقل 3 كلمات من مفردات الدرس (account, deposit, withdraw, transfer, balance). اقراها بصوت عالي كإنك فعلًا في البنك.</div>
    <div class="en">🇬🇧 Write a short conversation between you and a bank clerk asking to withdraw money or check your balance, using at least 3 words from this lesson's vocabulary (account, deposit, withdraw, transfer, balance). Read it aloud as if you were really at the bank.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 دلوقتي تقدر تتعامل مع أي موقف بنكي بثقة. المرحلة الجاية، "حالات الطوارئ"، هتاخدك لمهارة أهم بكتير — عبارات ممكن تنقذلك يوم كامل لو احتجتها فعلًا في موقف طارئ.</div>
    <div class="en">🇬🇧 You can now handle any banking situation with confidence. The next stage, "Emergencies & Safety," takes you to an even more important skill — phrases that could save your whole day if you ever really need them in an emergency.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>استخدم "I&#39;d like to..." لطلب خدمة بنكية بأدب بدل أوامر مقطّعة.</li>
        <li>"I&#39;m planning to..." (مضارع مستمر) للتعبير عن نية مستقبلية قريبة، زي التحويل.</li>
        <li>مفردات جديدة: account, deposit, withdraw, transfer, balance.</li>
        <li>لما تعترض على حاجة (زي رسوم)، اعمل ده بلباقة مش برفض جاف.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="b1-listening-1.php">← المرحلة السابقة</a>
    <a href="emergencies-safety.php">المرحلة الجاية / Next: حالات الطوارئ →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
