<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'health-doctor';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'زيارة الدكتور';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">B1 · Intermediate</span>
<h1>زيارة الدكتور <span class="ltr">Visiting the Doctor</span></h1>
<p class="subtitle">محاكي محادثة لوصف الأعراض وفهم تعليمات الدكتور في عيادة أو مستشفى. هتتعلم إزاي تشرح إيه اللي حاسس بيه بدقة، تجاوب على أسئلة الدكتورة المتابعة، وتفهم روشتتك صح.</p>

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
    <div class="ar">🇪🇬 تتدرب على زيارة كاملة للدكتور بالإنجليزي — من وصف الأعراض الأولى، لحد الإجابة على أسئلة الدكتورة المتابعة عن المدة والحساسية، لحد فهم الروشتة والتعليمات الصح.</div>
    <div class="en">🇬🇧 Practice a complete doctor's visit in English — from describing your initial symptoms, to answering the doctor's follow-up questions about duration and allergies, to correctly understanding your prescription and instructions.</div>
</div>

<h2 id="understand">إزاي تستخدم المحاكي / How to Use the Simulator</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 نفس فكرة المحاكيات السابقة: هتقرا سؤال الدكتورة، وتختار من بين ردّين. الدقة هنا مهمة جدًا — رد غامض زي "I have pain everywhere" مش كفاية للدكتور يشخصك صح، لازم تكون محدد.</div>
    <div class="en">🇬🇧 Same idea as the previous simulators: read the doctor's question, then pick one of two responses. Precision matters a lot here — a vague answer like "I have pain everywhere" isn't enough for a doctor to diagnose you correctly; you need to be specific.</div>
</div>

<h2 id="practice">💬 محاكي زيارة الدكتور / Doctor Visit Simulator</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>السيناريو:</b> رايح للدكتورة بسبب صداع والتهاب في الزور من كام يوم، وهي هتسألك أسئلة عشان تشخص المشكلة صح.</div>
    <div class="en">🇬🇧 <b>Scenario:</b> You're visiting the doctor because of a headache and sore throat you've had for a few days, and she's going to ask you questions to correctly diagnose the problem.</div>
</div>

<div class="dialogue-sim" data-dialogue='[{"speaker": "other", "label": "الدكتورة / Doctor", "en": "Good morning, please have a seat. What brings you in today?", "ar": "صباح الخير، اتفضل اقعد. إيه اللي جابك النهاردة؟"}, {"speaker": "you", "choices": [{"en": "Good morning, doctor. I&#39;ve had a bad headache and a sore throat since yesterday.", "ar": "صباح الخير يا دكتورة. عندي صداع شديد والتهاب في الزور من امبارح.", "correct": true, "feedback_ar": "✅ رد واضح ومنظم — بيستخدم Present Perfect (I&#39;ve had) صح للتعبير عن عرض مستمر من وقت معين لحد دلوقتي، وبيحدد الأعراض بدقة.", "next": 2}, {"en": "I have pain, everywhere, since long time, I don&#39;t know.", "ar": "عندي وجع، في كل حتة، من زمان، مش عارف.", "correct": false, "feedback_ar": "❌ إجابة غامضة قوي وغير مفيدة للدكتورة — &#39;everywhere&#39; و&#39;since long time&#39; مش دقيقين، والدكتورة محتاجة تفاصيل محددة عشان تشخص صح.", "next": 2}]}, {"speaker": "other", "label": "الدكتورة / Doctor", "en": "I see. How long exactly have you had the headache — is it constant, or does it come and go?", "ar": "فاهمة. الصداع من إمتى بالظبط — مستمر، ولا بييجي ويروح؟"}, {"speaker": "you", "choices": [{"en": "It&#39;s been about two days, and it&#39;s pretty much constant, especially in the evening.", "ar": "من حوالي يومين، ومستمر تقريبًا طول الوقت، خصوصًا بالليل.", "correct": true, "feedback_ar": "✅ إجابة دقيقة ومفيدة — بتحدد المدة والنمط (مستمر / بيزيد بالليل)، وده بالظبط اللي بيساعد الدكتورة تشخص صح.", "next": 4}, {"en": "Maybe two day, maybe more, I not sure really.", "ar": "يمكن يومين، يمكن أكتر، مش متأكد فعلًا.", "correct": false, "feedback_ar": "❌ خطأ نحوي — &#39;two day&#39; لازم تبقى جمع &#39;two days&#39;، وكمان الإجابة مترددة جدًا وناقصة تفاصيل عن نمط الصداع.", "next": 4}]}, {"speaker": "other", "label": "الدكتورة / Doctor", "en": "Okay. Do you have any other symptoms, like a cough, fever, or nausea?", "ar": "تمام. عندك أي أعراض تانية، زي كحة، سخونية، أو غثيان؟"}, {"speaker": "you", "choices": [{"en": "Yes, I felt a bit feverish last night, but no cough or nausea.", "ar": "أيوه، حسيت إني عندي سخونية بسيطة امبارح بالليل، بس مفيش كحة أو غثيان.", "correct": true, "feedback_ar": "✅ رد دقيق ومفيد — بيجاوب على كل جزء من السؤال بوضوح (فيه حمى بسيطة، مفيش كحة أو غثيان).", "next": 6}, {"en": "Cough no, fever no, nausea no, nothing, I healthy.", "ar": "كحة لأ، سخونية لأ، غثيان لأ، مفيش حاجة، أنا سليم.", "correct": false, "feedback_ar": "❌ خطأ نحوي — &#39;I healthy&#39; ناقص فعل الكينونة (الصح: I am healthy)، وده متناقض كمان مع إنه جاي للدكتور بسبب أعراض واضحة.", "next": 6}]}, {"speaker": "other", "label": "الدكتورة / Doctor", "en": "Let me check your temperature... yes, you have a mild fever, 38 degrees. Are you allergic to any medication?", "ar": "خليني أشوف درجة حرارتك... أيوه، عندك سخونية بسيطة، 38 درجة. عندك حساسية من أي دواء؟"}, {"speaker": "you", "choices": [{"en": "No, I&#39;m not allergic to anything, as far as I know.", "ar": "لأ، معنديش حساسية من أي حاجة، على حد علمي.", "correct": true, "feedback_ar": "✅ إجابة واضحة ومباشرة لسؤال طبي مهم جدًا — بتفتح الباب للدكتورة تصف الدواء المناسب بأمان.", "next": 8}, {"en": "Allergic? I no understand this word, skip it.", "ar": "حساسية؟ مش فاهم الكلمة دي، سيبها.", "correct": false, "feedback_ar": "❌ خطر جدًا — تجاهل سؤال عن الحساسية من الأدوية ممكن يسبب مشكلة صحية حقيقية؛ الأصح إنك تسأل توضيح للكلمة بدل ما تتجاهلها.", "next": 8}]}, {"speaker": "other", "label": "الدكتورة / Doctor", "en": "Good. It looks like a mild throat infection with a slight fever. I&#39;ll prescribe some painkillers and rest for a few days.", "ar": "تمام. يبدو إنه التهاب بسيط في الزور مع سخونية خفيفة. هوصفلك مسكنات وراحة لكام يوم."}, {"speaker": "you", "choices": [{"en": "Thank you, doctor. How should I take the painkillers, and how often?", "ar": "شكرًا يا دكتورة. آخد المسكنات إزاي، وكل قد إيه؟", "correct": true, "feedback_ar": "✅ سؤال متابعة ذكي وعملي — بيتأكد من جرعة الدواء بدل ما يفترض ويغلط في الاستخدام.", "next": 10}, {"en": "Painkiller, I take how many I want, no problem right?", "ar": "المسكن، آخده كام ما حبيت، مفيش مشكلة صح؟", "correct": false, "feedback_ar": "❌ افتراض خطير وغلط — أخد جرعة زيادة من أي دواء من غير تعليمات دقيقة ممكن يضر بدل ما ينفع، والسؤال المفروض يكون عن الجرعة الصحيحة.", "next": 10}]}, {"speaker": "other", "label": "الدكتورة / Doctor", "en": "Take one tablet every eight hours after food, and drink plenty of fluids. Come back if you don&#39;t feel better in three days.", "ar": "خد قرص كل تمن ساعات بعد الأكل، واشرب سوائل كتير. ارجعلي لو محسيتش بتحسن خلال تلات أيام."}, {"speaker": "you", "choices": [{"en": "Got it, thank you so much for your help, doctor.", "ar": "تمام، شكرًا جزيلًا على مساعدتك يا دكتورة.", "correct": true, "feedback_ar": "✅ ختام مهذب ودافئ — بيأكد إنه فاهم التعليمات وبيشكر الدكتورة بشكل مناسب.", "next": 12}, {"en": "Ok fine whatever, I go now.", "ar": "طيب تمام أي حاجة، همشي دلوقتي.", "correct": false, "feedback_ar": "❌ ختام جاف وغير مهذب بعد ما الدكتورة شرحت تعليمات مهمة لصحتك — رد فيه شكر كان أنسب بكتير.", "next": 12}]}]'>
    <div class="dialogue-scenario">📍 زيارة عيادة بسبب صداع والتهاب في الزور / A clinic visit for a headache and sore throat</div>
    <div class="dialogue-log"></div>
    <div class="dialogue-choices"></div>
    <button class="dialogue-restart-btn" hidden>🔄 ابدأ من جديد / Restart</button>
</div>

<h2>مفردات زيارة الدكتور / Doctor Visit Vocabulary</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 دوس على أي بطاقة عشان تشوف الترجمة والمثال.</div>
    <div class="en">🇬🇧 Click any card to reveal the translation and example.</div>
</div>
<div class="vocab-grid">
    <div class="vocab-card">
        <div class="vocab-card-front">
            <div class="vocab-word">Symptom</div>
            <div class="vocab-pron">/ˈsɪmp.təm/</div>
            <button type="button" class="speak-btn" data-text="Symptom" data-rate="1">🔊 Listen</button>
        </div>
        <div class="vocab-card-back">
            <div class="vocab-ar">عرض (مرضي)</div>
            <div class="vocab-example"><div class="en">Describe your symptoms to the doctor as clearly as you can.</div><div class="ar">اشرح أعراضك للدكتور بأكبر وضوح ممكن.</div></div>
        </div>
        <div class="vocab-card-hint">👆 دوس / Tap</div>
    </div>
    <div class="vocab-card">
        <div class="vocab-card-front">
            <div class="vocab-word">Prescription</div>
            <div class="vocab-pron">/prɪˈskrɪp.ʃən/</div>
            <button type="button" class="speak-btn" data-text="Prescription" data-rate="1">🔊 Listen</button>
        </div>
        <div class="vocab-card-back">
            <div class="vocab-ar">روشتة / وصفة طبية</div>
            <div class="vocab-example"><div class="en">The doctor gave me a prescription for antibiotics.</div><div class="ar">الدكتور ديني روشتة لمضاد حيوي.</div></div>
        </div>
        <div class="vocab-card-hint">👆 دوس / Tap</div>
    </div>
    <div class="vocab-card">
        <div class="vocab-card-front">
            <div class="vocab-word">Appointment</div>
            <div class="vocab-pron">/əˈpɔɪnt.mənt/</div>
            <button type="button" class="speak-btn" data-text="Appointment" data-rate="1">🔊 Listen</button>
        </div>
        <div class="vocab-card-back">
            <div class="vocab-ar">موعد (طبي)</div>
            <div class="vocab-example"><div class="en">I have a doctor's appointment tomorrow morning.</div><div class="ar">عندي موعد دكتور بكرة الصبح.</div></div>
        </div>
        <div class="vocab-card-hint">👆 دوس / Tap</div>
    </div>
    <div class="vocab-card">
        <div class="vocab-card-front">
            <div class="vocab-word">Fever</div>
            <div class="vocab-pron">/ˈfiː.vər/</div>
            <button type="button" class="speak-btn" data-text="Fever" data-rate="1">🔊 Listen</button>
        </div>
        <div class="vocab-card-back">
            <div class="vocab-ar">سخونية / حمى</div>
            <div class="vocab-example"><div class="en">She has a mild fever and a slight headache.</div><div class="ar">عندها سخونية بسيطة وصداع خفيف.</div></div>
        </div>
        <div class="vocab-card-hint">👆 دوس / Tap</div>
    </div>
    <div class="vocab-card">
        <div class="vocab-card-front">
            <div class="vocab-word">Painkiller</div>
            <div class="vocab-pron">/ˈpeɪnˌkɪl.ər/</div>
            <button type="button" class="speak-btn" data-text="Painkiller" data-rate="1">🔊 Listen</button>
        </div>
        <div class="vocab-card-back">
            <div class="vocab-ar">مسكن ألم</div>
            <div class="vocab-example"><div class="en">Take one painkiller every eight hours after food.</div><div class="ar">خد مسكن واحد كل تمن ساعات بعد الأكل.</div></div>
        </div>
        <div class="vocab-card-hint">👆 دوس / Tap</div>
    </div>
</div>

<h2>🔊 استمع وتمرّن / Listen &amp; Practice</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 اسمع الجملة الأهم في الدرس ده بسرعة عادية أو بطيئة، وبعدين جرب تسجل نفسك وانت بتقولها.</div>
    <div class="en">🇬🇧 Listen to this lesson's key phrase at normal or slow speed, then try recording yourself saying it.</div>
</div>
<div class="pronunciation-box">
    <div class="pronunciation-word">I've had a headache since yesterday.</div>
    <div class="pronunciation-ipa">/aɪv hæd ə ˈhɛd.eɪk sɪns ˈjɛs.tər.deɪ/</div>
    <div class="pronunciation-ar">عندي صداع من امبارح.</div>
    <div class="pronunciation-controls">
        <button type="button" class="speak-btn" data-text="I've had a headache since yesterday." data-rate="1">🔊 Listen</button>
        <button type="button" class="speak-btn" data-text="I've had a headache since yesterday." data-rate="0.6">🐢 Slow</button>
    </div>
    <div class="pronunciation-example">
        <div class="en">I've had a bad headache and a sore throat since yesterday.</div>
        <div class="ar">عندي صداع شديد والتهاب في الزور من امبارح.</div>
    </div>
</div>
<div class="speak-practice">
    <div class="speak-practice-target">
        <span class="en">"I'm not allergic to anything, as far as I know."</span>
        <span class="ar">معنديش حساسية من أي حاجة، على حد علمي.</span>
        <button type="button" class="speak-btn" data-text="I'm not allergic to anything, as far as I know." data-rate="1">🔊 Listen</button>
    </div>
    <button type="button" class="speak-record-btn" data-recording="0">🎙 ابدأ التسجيل / Start Recording</button>
    <div class="speak-recording-playback"></div>
    <div class="speak-practice-status"></div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="ive-had">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">إيه الصيغة الصحيحة؟ "I ___ a headache since yesterday."<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What's the correct form?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="have"> have</label>
        <label><input type="radio" name="q1" value="ive-had"> 've had</label>
        <label><input type="radio" name="q1" value="having"> having</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="prescription">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">أي كلمة معناها "روشتة / وصفة طبية"؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Which word means "a doctor's written order for medicine"?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="symptom"> symptom</label>
        <label><input type="radio" name="q2" value="prescription"> prescription</label>
        <label><input type="radio" name="q2" value="appointment"> appointment</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="specific">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">لو الدكتور سألك عن أعراضك، إيه أفضل نوع رد؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">If the doctor asks about your symptoms, what's the best type of answer?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="specific"> رد محدد ودقيق (المدة، النوع، الشدة)</label>
        <label><input type="radio" name="q3" value="vague"> "I don't know, everywhere."</label>
        <label><input type="radio" name="q3" value="skip"> تتجاهل السؤال</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="ask-dosage">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">لو مش متأكد من جرعة الدواء، إيه أفضل حاجة تعملها؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">If you're unsure about your medication dosage, what's the best thing to do?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="ask-dosage"> تسأل الدكتورة عن الجرعة الصحيحة بالظبط</label>
        <label><input type="radio" name="q4" value="guess"> تاخد اللي انت حاسس إنه مناسب</label>
        <label><input type="radio" name="q4" value="skip-medicine"> متاخدش الدواء خالص من غير ما تقول للدكتورة</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ اكتب زيارتك بنفسك / Write Your Own Visit</h3>
    <div class="ar">🇪🇬 اكتب على ورقة محادثة زيارة دكتور زي دي، لكن باختراع أعراض مختلفة (زي ألم في المعدة أو كحة). استخدم Present Perfect (I've had...) لوصف مدة العرض، وحدد التفاصيل بدقة زي ما اتعلمت في الدرس.</div>
    <div class="en">🇬🇧 Write out a doctor's visit conversation like this one, but invent different symptoms (like a stomach ache or a cough). Use Present Perfect (I've had...) to describe how long the symptom has lasted, and be as specific as you learned in this lesson.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 دلوقتي عندك أدوات وصف الصحة والأعراض بدقة. المرحلة الجاية، "تمرين استماع: مكالمة هاتفية"، هتختبر فهمك للاستماع في موقف مشابه — مكالمة حقيقية بين موظف وعميل من غير ما تختار ردود، بس تسمع وتفهم.</div>
    <div class="en">🇬🇧 You now have the tools to describe health and symptoms precisely. The next stage, "Listening Practice: A Phone Call," tests your listening comprehension in a similar situation — a realistic call between an employee and a customer, where you just listen and understand instead of choosing responses.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>استخدم Present Perfect ("I've had...") لوصف عرض بدأ في الماضي ولسه مستمر.</li>
        <li>كل ما كانت إجابتك للدكتور محددة أكتر (المدة، النمط، الشدة)، كل ما كان التشخيص أدق.</li>
        <li>مفردات جديدة: symptom, prescription, appointment, fever, painkiller.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="phone-calls.php">← المرحلة السابقة</a>
    <a href="b1-listening-1.php">المرحلة الجاية / Next: تمرين استماع - مكالمة هاتفية →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
