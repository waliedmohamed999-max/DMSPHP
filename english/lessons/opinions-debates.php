<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'opinions-debates';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'التعبير عن الرأي والنقاش';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">B2 · Upper-Intermediate</span>
<h1>التعبير عن الرأي والنقاش <span class="ltr">Opinions &amp; Debates</span></h1>
<p class="subtitle">تتفق، تختلف، وتدافع عن رأيك بأدب ووضوح في أي نقاش.</p>

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
    <div class="ar">🇪🇬 تتدرب على نقاش حقيقي بين زميلين عندهم رأيين مختلفين تمامًا في موضوع الشغل من البيت مقابل المكتب — وتتعلم تفرّق بين رد بيختلف مع الرأي التاني بأدب وذكاء، ورد وقح أو هجومي حتى لو معناه "صح". الهدف مش إن رأي يكسب على التاني، الهدف إزاي تختلف من غير ما تخسر احترام الطرف التاني.</div>
    <div class="en">🇬🇧 Practice a real discussion between two colleagues who hold completely different opinions on remote work versus office work — and learn to tell a polite, thoughtful disagreement apart from a rude or dismissive one, even if the rude one happens to be "right." The goal isn't for one opinion to "win" — it's learning how to disagree without losing the other person's respect.</div>
</div>

<h2 id="understand">إزاي تستخدم المحاكي / How to Use the Simulator</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 نفس فكرة المحاكيات السابقة: هتقرا رأي زميلتك (مترجم تلقائيًا تحته)، وهيظهرلك اختيارين لردك. مهم جدًا تفهم: في النقاش ده الاتنين عندهم وجهة نظر معقولة — مفيش رأي "غلط" فعليًا. اللي بتقيّمه المحاكي هو أسلوبك في الاختلاف، مش رأيك في حد ذاته.</div>
    <div class="en">🇬🇧 Same idea as the previous simulators: you'll read your colleague's opinion (automatically translated), then get two response options. Important: in this discussion, both sides have a reasonable point — no opinion is actually "wrong." What the simulator evaluates is your style of disagreeing, not the opinion itself.</div>
</div>

<h2 id="practice">💬 محاكي النقاش / Discussion Simulator</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>السيناريو:</b> انت وياسمين، زميلتك في الشغل، بتتناقشوا وقت الغدا عن الشغل من البيت مقابل الشغل من المكتب.</div>
    <div class="en">🇬🇧 <b>Scenario:</b> You and Yasmin, your colleague, are discussing remote work versus office work over lunch.</div>
</div>

<div class="dialogue-sim" data-dialogue='[{"speaker": "other", "label": "ياسمين / Yasmin (Colleague)", "en": "Honestly, I think remote work is so much better than the office. I get so much more done at home.", "ar": "بصراحة، أعتقد إن الشغل من البيت أحسن بكتير من المكتب. بخلّص شغل أكتر بكتير وأنا في البيت."}, {"speaker": "you", "choices": [{"en": "I see your point, but I actually feel more focused in the office — the separation between home and work helps me.", "ar": "فاهم وجهة نظرك، بس أنا في الحقيقة حاسس إني أركّز أكتر في المكتب — الفصل بين البيت والشغل بيساعدني.", "correct": true, "feedback_ar": "✅ رد ممتاز — بيبدأ بالاعتراف برأيها (\"I see your point\") قبل ما يعرض رأي مختلف بأدب، وده أسلوب الاختلاف البنّاء المطلوب في أي نقاش مهني.", "next": 2}, {"en": "That&#39;s not true at all, offices are obviously better, you&#39;re wrong.", "ar": "ده مش صح خالص، المكاتب أفضل بوضوح، انت غلطان.", "correct": false, "feedback_ar": "❌ رد فظ وقاطع — \"you&#39;re wrong\" بيحوّل نقاش رأي شخصي لهجوم مباشر، وكلمة \"obviously\" بتقلل من رأيها بدل ما تناقشه باحترام.", "next": 2}]}, {"speaker": "other", "label": "ياسمين / Yasmin (Colleague)", "en": "Fair enough. But don&#39;t you think commuting every day is just a waste of time and energy?", "ar": "معقول كده. بس مش شايف إن المواصلات كل يوم مجرد إضاعة وقت وطاقة؟"}, {"speaker": "you", "choices": [{"en": "That&#39;s a fair point about the commute, though for me it&#39;s also a chance to switch mentally from home mode to work mode.", "ar": "ده رأي منطقي بخصوص المواصلات، لكن بالنسبالي هي كمان فرصة إني أبدّل ذهنيًا من وضع البيت لوضع الشغل.", "correct": true, "feedback_ar": "✅ صياغة راقية — \"that&#39;s a fair point\" بتعترف بصحة جزء من كلامها قبل ما تضيف زاوية جديدة بـ \"though\"، وده بالظبط أسلوب النقاش المتحضر.", "next": 4}, {"en": "Commuting is not waste, you just lazy and don&#39;t want leave house.", "ar": "المواصلات مش إضاعة، انتي بس كسولة ومش عايزة تسيبي البيت.", "correct": false, "feedback_ar": "❌ جملة ركيكة نحويًا (ناقصة \"are\" قبل \"lazy\" و\"to\" قبل \"leave\") وهجوم شخصي غير مبرر (\"you&#39;re just lazy\") بدل مناقشة الفكرة نفسها.", "next": 4}]}, {"speaker": "other", "label": "ياسمين / Yasmin (Colleague)", "en": "Maybe. What about team collaboration though? I feel like video calls just aren&#39;t the same as being in a room together.", "ar": "يمكن. بس إيه رأيك في التعاون الجماعي؟ حاسة إن مكالمات الفيديو مش زي التواجد في أوضة واحدة مع بعض."}, {"speaker": "you", "choices": [{"en": "On the other hand, I&#39;ve noticed some quieter teammates actually contribute more in chat than they would in a loud meeting room.", "ar": "من ناحية تانية، لاحظت إن بعض الزمايل الهادئين بيساهموا فعليًا في الشات أكتر مما كانوا هيعملوا في أوضة اجتماعات صاخبة.", "correct": true, "feedback_ar": "✅ استخدام \"on the other hand\" بشكل مثالي لتقديم زاوية مضادة بأدب، مع دليل ملموس (\"I&#39;ve noticed\") بدل مجرد رأي عام — نقاش بنّاء وقوي.", "next": 6}, {"en": "Video calls is fine, stop complaining about it all the time.", "ar": "مكالمات الفيديو كويسة، بطّلي تشتكي منها طول الوقت.", "correct": false, "feedback_ar": "❌ خطأ نحوي (\"calls is\" بدل \"calls are\" لأن الاسم جمع) وأسلوب رافض ومتعالي (\"stop complaining\") مش مناسب لمناقشة رأي مختلف.", "next": 6}]}, {"speaker": "other", "label": "ياسمين / Yasmin (Colleague)", "en": "That&#39;s actually a good point about quieter teammates, I hadn&#39;t thought of it that way. So do you think it should just be a personal choice for each employee?", "ar": "ده فعلًا رأي كويس عن الزمايل الهادئين، ما كنتش شايفة الموضوع بالشكل ده. طيب فاكر إنه المفروض يبقى اختيار شخصي لكل موظف؟"}, {"speaker": "you", "choices": [{"en": "I completely agree — a hybrid model where people choose what works best for them seems like the fairest solution.", "ar": "موافق تمامًا — نظام هجين فين كل حد يختار الأنسب له يبدو الحل الأعدل.", "correct": true, "feedback_ar": "✅ ختام ممتاز — \"I completely agree\" هنا مناسب لأنه استنتاج طبيعي بعد نقاش متوازن، ومش مجرد استسلام لرأيها من البداية.", "next": 8}, {"en": "I don&#39;t care what people think, everyone must come to office, no excuses.", "ar": "مش مهمني رأي حد، لازم الكل ييجي المكتب، من غير أعذار.", "correct": false, "feedback_ar": "❌ \"I don&#39;t care\" و\"no excuses\" أسلوب متصلب وجامد بيقفل باب النقاش تمامًا، وده عكس فكرة الدرس اللي هي الاختلاف بأدب ومرونة.", "next": 8}]}]'>
    <div class="dialogue-scenario">📍 نقاش وقت الغدا عن الشغل من البيت مقابل المكتب / A lunchtime discussion about remote work vs. office work</div>
    <div class="dialogue-log"></div>
    <div class="dialogue-choices"></div>
    <button class="dialogue-restart-btn" hidden>🔄 ابدأ من جديد / Restart</button>
</div>

<h2>مفردات النقاش / Discussion Vocabulary</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 دوس على أي بطاقة عشان تشوف الترجمة والمثال.</div>
    <div class="en">🇬🇧 Click any card to reveal the translation and example.</div>
</div>
<div class="vocab-grid">
    <div class="vocab-card">
        <div class="vocab-card-front">
            <div class="vocab-word">Agree</div>
            <div class="vocab-pron">/əˈɡriː/</div>
            <button type="button" class="speak-btn" data-text="Agree" data-rate="1">🔊 Listen</button>
        </div>
        <div class="vocab-card-back">
            <div class="vocab-ar">يوافق / يتفق</div>
            <div class="vocab-example"><div class="en">I completely agree with your point about deadlines.</div><div class="ar">موافق تمامًا على رأيك في موضوع المواعيد النهائية.</div></div>
        </div>
        <div class="vocab-card-hint">👆 دوس / Tap</div>
    </div>
    <div class="vocab-card">
        <div class="vocab-card-front">
            <div class="vocab-word">Disagree</div>
            <div class="vocab-pron">/ˌdɪs.əˈɡriː/</div>
            <button type="button" class="speak-btn" data-text="Disagree" data-rate="1">🔊 Listen</button>
        </div>
        <div class="vocab-card-back">
            <div class="vocab-ar">يختلف / لا يوافق</div>
            <div class="vocab-example"><div class="en">I respectfully disagree — I think the office works better for me.</div><div class="ar">أختلف باحترام — أعتقد إن المكتب أنسب لي.</div></div>
        </div>
        <div class="vocab-card-hint">👆 دوس / Tap</div>
    </div>
    <div class="vocab-card">
        <div class="vocab-card-front">
            <div class="vocab-word">Point of view</div>
            <div class="vocab-pron">/pɔɪnt əv vjuː/</div>
            <button type="button" class="speak-btn" data-text="Point of view" data-rate="1">🔊 Listen</button>
        </div>
        <div class="vocab-card-back">
            <div class="vocab-ar">وجهة نظر</div>
            <div class="vocab-example"><div class="en">From my point of view, a hybrid model is the fairest option.</div><div class="ar">من وجهة نظري، النظام الهجين هو الخيار الأعدل.</div></div>
        </div>
        <div class="vocab-card-hint">👆 دوس / Tap</div>
    </div>
    <div class="vocab-card">
        <div class="vocab-card-front">
            <div class="vocab-word">On the other hand</div>
            <div class="vocab-pron">/ɒn ði ˈʌð.ər hænd/</div>
            <button type="button" class="speak-btn" data-text="On the other hand" data-rate="1">🔊 Listen</button>
        </div>
        <div class="vocab-card-back">
            <div class="vocab-ar">من ناحية تانية</div>
            <div class="vocab-example"><div class="en">On the other hand, some people focus better without office noise.</div><div class="ar">من ناحية تانية، بعض الناس بيركزوا أحسن من غير ضوضاء المكتب.</div></div>
        </div>
        <div class="vocab-card-hint">👆 دوس / Tap</div>
    </div>
    <div class="vocab-card">
        <div class="vocab-card-front">
            <div class="vocab-word">I see your point</div>
            <div class="vocab-pron">/aɪ siː jɔːr pɔɪnt/</div>
            <button type="button" class="speak-btn" data-text="I see your point" data-rate="1">🔊 Listen</button>
        </div>
        <div class="vocab-card-back">
            <div class="vocab-ar">فاهم وجهة نظرك</div>
            <div class="vocab-example"><div class="en">I see your point, but I still prefer the office.</div><div class="ar">فاهم وجهة نظرك، بس لسه بفضّل المكتب.</div></div>
        </div>
        <div class="vocab-card-hint">👆 دوس / Tap</div>
    </div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="see-your-point">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">إيه أفضل طريقة تبدأ بيها لما هتختلف مع رأي حد؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What's the best way to start when you disagree with someone?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="see-your-point"> "I see your point, but..."</label>
        <label><input type="radio" name="q1" value="youre-wrong"> "You're wrong."</label>
        <label><input type="radio" name="q1" value="ignore"> تتجاهل كلامه تمامًا</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="on-the-other-hand">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">أي عبارة تستخدمها عشان تقدّم زاوية مختلفة في النقاش؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Which phrase do you use to present a different angle in a discussion?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="on-the-other-hand"> "On the other hand..."</label>
        <label><input type="radio" name="q2" value="whatever"> "Whatever."</label>
        <label><input type="radio" name="q2" value="obviously"> "Obviously you're wrong."</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="calls-are">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">إيه الصيغة الصحيحة؟ "Video calls ___ not the same as meeting in person."<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What's the correct form?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="calls-is"> is</label>
        <label><input type="radio" name="q3" value="calls-are"> are</label>
        <label><input type="radio" name="q3" value="calls-be"> be</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="both-valid">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">في نقاش زي "الشغل من البيت مقابل المكتب"، إيه الصح؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">In a discussion like "remote work vs. office," what's true?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="both-valid"> ممكن الرأيين يكونوا معقولين، والمهم أسلوب الاختلاف</label>
        <label><input type="radio" name="q4" value="one-wrong"> لازم رأي واحد يكون غلط تمامًا</label>
        <label><input type="radio" name="q4" value="avoid"> الأفضل تتجنب أي نقاش خالص</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ اكتب اختلافك الخاص / Write Your Own Disagreement</h3>
    <div class="ar">🇪🇬 اختار موضوع بسيط ممكن تختلف فيه مع صديق (زي: القطط أحسن من الكلاب، أو الشاي أحسن من القهوة)، واكتب رد بتختلف فيه بأدب مستخدم واحدة على الأقل من: "I see your point, but...", "That's a fair point, though...", "On the other hand...". اقراه بصوت عالي.</div>
    <div class="en">🇬🇧 Pick a simple topic you might disagree with a friend about (like: cats are better than dogs, or tea is better than coffee), and write a polite disagreement using at least one of: "I see your point, but...", "That's a fair point, though...", "On the other hand...". Read it aloud.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 دلوقتي تقدر تختلف مع أي حد من غير ما تخسر احترامه. المرحلة الجاية هي أول تمرين استماع من مستوى B2 — هتسمع نقاش قصير بين شخصين برأيين مختلفين، وتحدد مين قال إيه بالظبط.</div>
    <div class="en">🇬🇧 You can now disagree with anyone without losing their respect. The next stage is your first B2-level listening exercise — you'll listen to a short debate between two people with different opinions, and identify exactly who said what.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>ابدأ الاختلاف بالاعتراف بالرأي التاني: "I see your point, but..." أو "That's a fair point, though...".</li>
        <li>استخدم "On the other hand" لتقديم زاوية مختلفة بأدب.</li>
        <li>تجنّب الهجوم الشخصي ("you're wrong", "stop complaining") حتى لو حاسس إنك صح.</li>
        <li>مفردات جديدة: agree, disagree, point of view, on the other hand, I see your point.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="emergencies-safety.php">← المرحلة السابقة</a>
    <a href="b2-listening-1.php">المرحلة الجاية / Next: تمرين استماع - نقاش قصير →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
