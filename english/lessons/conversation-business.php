<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'conversation-business';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'محادثة تفاعلية: مقابلة شغل';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">المرحلة 11 / Stage 11</span>
<h1>محادثة تفاعلية: مقابلة شغل <span class="ltr">Interactive Conversation: Job Interview</span></h1>
<p class="subtitle">دلوقتي معاك إنجليزية بيئة العمل — وقت أهم اختبار عملي: مقابلة شخصية حقيقية لوظيفة Junior Back-End Developer. المحاكي ده أطول وأصعب من محاكي "التعارف" اللي جربته قبل كده، وهيحطّك في أسئلة مقابلات حقيقية بأجوبة قوية وأجوبة فيها مشاكل نحوية أو احترافية.</p>

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
    <div class="ar">🇪🇬 تتدرب على مقابلة شغل حقيقية بالإنجليزي من أولها لآخرها — من "احكيلي عن نفسك" لحد سؤالك انت في الآخر — وتتعلم تفرّق بين رد احترافي قوي ورد فيه خطأ نحوي أو "red flag" بيضر فرصتك، مع مفردات جديدة مخصوصة لعالم المقابلات.</div>
    <div class="en">🇬🇧 Practice a complete, real job interview in English from start to finish — from "tell me about yourself" to your own closing question — and learn to tell a strong, professional answer apart from one with a grammar mistake or an interview red flag, plus new vocabulary specific to interviews.</div>
</div>

<h2 id="understand">تذكير سريع / Quick Reminder</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 نفس فكرة المحاكي اللي جربته في درس "التعارف": هتقرا سؤال المحاور، تختار من بين ردّين، وتاخد تقييم فوري يشرحلك ليه الرد صح أو غلط. المرة دي المحادثة أطول (6 أسئلة بدل 4) والأسئلة أصعب وأقرب لواقع مقابلات الشغل الحقيقية.</div>
    <div class="en">🇬🇧 Same idea as the simulator from the "Introductions" lesson: read the interviewer's question, pick one of two responses, get instant feedback explaining why. This time the conversation is longer (6 questions instead of 4) and closer to a real job interview.</div>
</div>

<h2 id="practice">💬 محاكي المقابلة / Interview Simulator</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>السيناريو:</b> انت في مقابلة شخصية لوظيفة Junior Back-End Developer، وقاعد قدام المحاور اللي هيسألك أسئلة المقابلة الكلاسيكية.</div>
    <div class="en">🇬🇧 <b>Scenario:</b> You're in a job interview for a Junior Back-End Developer position, sitting across from the interviewer asking you the classic interview questions.</div>
</div>

<div class="dialogue-sim" data-dialogue='[{"speaker":"other","label":"المحاور / Interviewer","en":"Good morning! Thanks for coming in. Please, have a seat. So, tell me a little about yourself.","ar":"صباح الخير! شكرًا إنك جيت. اتفضل، اقعد. طيب، احكيلي شوية عن نفسك."},{"speaker":"you","choices":[{"en":"Good morning, thank you for having me. I&#39;m a Back-End developer with two years of experience building web applications with PHP and MySQL, and I&#39;m passionate about writing clean, reliable code.","ar":"صباح الخير، شكرًا لدعوتي. أنا مطور Back-End عندي سنتين خبرة في بناء تطبيقات ويب بلغة PHP وMySQL، وشغوف بكتابة كود نضيف وموثوق.","correct":true,"feedback_ar":"✅ إجابة قوية ومركزة — بتفتح بشكر مهذب، وبتلخص خبرتك ومهاراتك في جملتين واضحتين، وده بالظبط اللي المقابلة الشخصية عايزاه من سؤال مفتوح زي ده.","next":2},{"en":"Umm, I don&#39;t know, I just like computers and stuff since I was a kid.","ar":"امم، مش عارف، أنا بس بحب الكمبيوتر وكده من وأنا صغير.","correct":false,"feedback_ar":"❌ رد غامض وغير مهني — &#39;I don&#39;t know&#39; و&#39;stuff&#39; بيدوا انطباع إنك مش متجهز للمقابلة، والمفروض ترد بمعلومات محددة عن خبرتك ومهاراتك مش مشاعر عامة.","next":2}]},{"speaker":"other","label":"المحاور / Interviewer","en":"Great. What Back-End technologies have you worked with, and can you tell me about a project you&#39;re proud of?","ar":"تمام. إيه تقنيات الـ Back-End اللي اشتغلت بيها، وممكن تحكيلي عن مشروع انت فخور بيه؟"},{"speaker":"you","choices":[{"en":"I have worked mainly with PHP and MySQL. Last year, I built a task-management system from scratch, including user authentication and a REST API for the front-end team.","ar":"اشتغلت غالبًا بـ PHP وMySQL. السنة اللي فاتت بنيت نظام إدارة مهام من الصفر، شامل تسجيل دخول المستخدمين وواجهة برمجية (API) لفريق الـ Front-End.","correct":true,"feedback_ar":"✅ صياغة صحيحة بزمن المضارع التام (Present Perfect: &#39;I have worked&#39;) عشان تتكلم عن خبرة سابقة مستمرة الأثر، ومثال محدد وملموس بيثبت كلامك — بالظبط اللي المحاور عايز يسمعه.","next":4},{"en":"I working with PHP sometimes, and I know some stuff about databases too.","ar":"أنا بشتغل بـ PHP أحيانًا، وعارف حاجات عن قواعد البيانات كمان.","correct":false,"feedback_ar":"❌ فيه خطأ نحوي واضح — &#39;I working&#39; ناقصها الفعل المساعد (الصح: I have been working أو I work)، وكلمة &#39;stuff&#39; كمان غير مهنية وغامضة في مقابلة شغل تقنية.","next":4}]},{"speaker":"other","label":"المحاور / Interviewer","en":"Why do you want to work here, and why should we hire you over other candidates?","ar":"ليه عايز تشتغل هنا، وليه نختارك انت من بين المتقدمين التانيين؟"},{"speaker":"you","choices":[{"en":"I&#39;m genuinely excited about the products your team builds, and I believe my hands-on PHP experience and eagerness to learn would let me contribute from day one.","ar":"أنا متحمس فعلًا للمنتجات اللي فريقكم بيبنيها، وأعتقد إن خبرتي العملية في PHP ورغبتي في التعلّم هتخليني أقدر أساهم من أول يوم.","correct":true,"feedback_ar":"✅ إجابة مقنعة ومهنية — بتربط اهتمامك الحقيقي بالشركة بمهاراتك المحددة، من غير ما تبالغ أو تقلل من نفسك.","next":6},{"en":"Honestly, I just need any job right now, so I&#39;ll take whatever you offer.","ar":"بصراحة، أنا محتاج أي شغلانة دلوقتي، فهاخد أي حاجة هتعرضوها.","correct":false,"feedback_ar":"❌ ده &#39;red flag&#39; كلاسيكي في المقابلات — بيوحي إنك مش مهتم بالدور أو بالشركة تحديدًا وإنك هتسيب الشغل أول ما تلاقي حاجة تانية، حتى لو الجملة سليمة نحويًا.","next":6}]},{"speaker":"other","label":"المحاور / Interviewer","en":"Can you tell me about a weakness of yours, and how you&#39;re working to improve it?","ar":"ممكن تحكيلي عن نقطة ضعف عندك، وإزاي بتحاول تحسّنها؟"},{"speaker":"you","choices":[{"en":"I used to struggle with estimating deadlines accurately, so I started breaking tasks into smaller pieces and tracking my time, which has made my estimates much more realistic.","ar":"كنت بواجه صعوبة في تقدير المواعيد النهائية بدقة، فبدأت أقسّم المهام لأجزاء أصغر وأتابع وقتي، وده خلى تقديراتي أكتر واقعية.","correct":true,"feedback_ar":"✅ إجابة ذكية وصادقة — بتذكر نقطة ضعف حقيقية بس مش كارثية، وبتركّز أكتر على الخطوة العملية اللي اتخذتها عشان تتحسن، مش بس على المشكلة نفسها.","next":8},{"en":"I don&#39;t really have any weaknesses, I&#39;m good at everything I do.","ar":"مش حاسس إن عندي نقط ضعف، أنا كويس في كل حاجة بعملها.","correct":false,"feedback_ar":"❌ رد غير واقعي وبيدي انطباع غرور بدل ثقة — كل مرشح عنده نقاط للتحسين، وإنكارها كاملة &#39;red flag&#39; بيدل على غياب الوعي الذاتي (self-awareness).","next":8}]},{"speaker":"other","label":"المحاور / Interviewer","en":"How do you handle teamwork, especially when the whole team is under a tight deadline?","ar":"إزاي بتتعامل مع الشغل الجماعي، خصوصًا لما الفريق كله يكون تحت ضغط ميعاد نهائي ضيّق؟"},{"speaker":"you","choices":[{"en":"I communicate early if I&#39;m falling behind, and I try to take on extra tasks from teammates who are overloaded, since I believe teamwork means sharing responsibility for the deadline.","ar":"بحاول أبلّغ بدري لو حاسس إني متأخر، وباخد مهام إضافية من زمايلي لو حد منهم متحمل زيادة، لأني مؤمن إن الشغل الجماعي معناه إننا نتقاسم المسؤولية عن الميعاد النهائي.","correct":true,"feedback_ar":"✅ إجابة ناضجة — بتوضح تواصل استباقي (proactive communication) ومسؤولية مشتركة، وهما بالظبط اللي بيميز عضو فريق كويس تحت الضغط.","next":10},{"en":"I prefer to work alone always, I don&#39;t really like depending on other people.","ar":"بفضّل أشتغل لوحدي دايمًا، مش بحب أعتمد على ناس تانية.","correct":false,"feedback_ar":"❌ &#39;red flag&#39; واضح لدور بيتطلب شغل جماعي — كلمة &#39;always&#39; بتخلي الرد متطرف وغير مرن، وبتدي انطباع إنك مش هتتعاون مع الفريق وقت الضغط.","next":10}]},{"speaker":"other","label":"المحاور / Interviewer","en":"That&#39;s great to hear, thank you. Last question — do you have any questions for us?","ar":"جميل جدًا، شكرًا. سؤال أخير — عندك أي أسئلة تحب تسألهالنا؟"},{"speaker":"you","choices":[{"en":"Yes, actually — could you tell me more about what a typical week looks like for the Back-End team, and what a new hire&#39;s first project would be?","ar":"أيوه، فعلًا — ممكن تحكيلي أكتر عن شكل الأسبوع العادي لفريق الـ Back-End، وإيه أول مشروع ممكن يتكلف بيه موظف جديد؟","correct":true,"feedback_ar":"✅ سؤال ذكي بيقفل المقابلة بقوة — بيدل على اهتمام حقيقي بالدور اليومي، وهو بالظبط النوع من الأسئلة اللي المحاورين بيحبوا يسمعوه في النهاية.","next":12},{"en":"No, not really, I think you covered everything.","ar":"لأ، مش فاكر، أعتقد إنكم غطيتوا كل حاجة.","correct":false,"feedback_ar":"❌ فرصة ضايعة — عدم سؤال أي حاجة في نهاية المقابلة بيوحي بعدم اهتمام كافٍ بالدور، وغالبًا المحاورين بيتوقعوا سؤال واحد على الأقل.","next":12}]}]'>
    <div class="dialogue-scenario">📍 مقابلة شخصية لوظيفة Junior Back-End Developer / A personal interview for a Junior Back-End Developer role</div>
    <div class="dialogue-log"></div>
    <div class="dialogue-choices"></div>
    <button class="dialogue-restart-btn" hidden>🔄 ابدأ من جديد / Restart</button>
</div>

<h2>مفردات المقابلات الشخصية / Job Interview Vocabulary</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 دوس على أي بطاقة عشان تشوف الترجمة والمثال.</div>
    <div class="en">🇬🇧 Click any card to reveal the translation and example.</div>
</div>
<div class="vocab-grid">
    <div class="vocab-card">
        <div class="vocab-card-front">
            <div class="vocab-word">Strength</div>
            <div class="vocab-pron">/streŋθ/</div>
        </div>
        <div class="vocab-card-back">
            <div class="vocab-ar">نقطة قوة / ميزة</div>
            <div class="vocab-example"><div class="en">One of my strengths is solving bugs quickly under pressure.</div><div class="ar">من نقط قوتي إني بحل الأخطاء البرمجية بسرعة تحت الضغط.</div></div>
        </div>
        <div class="vocab-card-hint">👆 دوس / Tap</div>
    </div>
    <div class="vocab-card">
        <div class="vocab-card-front">
            <div class="vocab-word">Weakness</div>
            <div class="vocab-pron">/ˈwiːk.nəs/</div>
        </div>
        <div class="vocab-card-back">
            <div class="vocab-ar">نقطة ضعف</div>
            <div class="vocab-example"><div class="en">I mentioned time estimation as a weakness I&#39;m actively improving.</div><div class="ar">ذكرت تقدير الوقت كنقطة ضعف بحاول أحسّنها فعليًا.</div></div>
        </div>
        <div class="vocab-card-hint">👆 دوس / Tap</div>
    </div>
    <div class="vocab-card">
        <div class="vocab-card-front">
            <div class="vocab-word">Responsibility</div>
            <div class="vocab-pron">/rɪˌspɒn.səˈbɪl.ə.ti/</div>
        </div>
        <div class="vocab-card-back">
            <div class="vocab-ar">مسؤولية</div>
            <div class="vocab-example"><div class="en">My main responsibility was maintaining the company&#39;s internal API.</div><div class="ar">مسؤوليتي الأساسية كانت صيانة الـ API الداخلي للشركة.</div></div>
        </div>
        <div class="vocab-card-hint">👆 دوس / Tap</div>
    </div>
    <div class="vocab-card">
        <div class="vocab-card-front">
            <div class="vocab-word">Deadline</div>
            <div class="vocab-pron">/ˈded.laɪn/</div>
        </div>
        <div class="vocab-card-back">
            <div class="vocab-ar">ميعاد نهائي</div>
            <div class="vocab-example"><div class="en">We met the project deadline by splitting the tasks between the team.</div><div class="ar">حققنا الميعاد النهائي للمشروع بتقسيم المهام بين الفريق.</div></div>
        </div>
        <div class="vocab-card-hint">👆 دوس / Tap</div>
    </div>
    <div class="vocab-card">
        <div class="vocab-card-front">
            <div class="vocab-word">Teamwork</div>
            <div class="vocab-pron">/ˈtiːm.wɜːk/</div>
        </div>
        <div class="vocab-card-back">
            <div class="vocab-ar">العمل الجماعي</div>
            <div class="vocab-example"><div class="en">Good teamwork means sharing responsibility when a deadline is tight.</div><div class="ar">الشغل الجماعي الكويس معناه تقاسم المسؤولية لما الميعاد النهائي يكون ضيّق.</div></div>
        </div>
        <div class="vocab-card-hint">👆 دوس / Tap</div>
    </div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="have-worked">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">إيه الصيغة الصحيحة؟ "I ___ with PHP and MySQL for two years."<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What's the correct form?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="working"> working</label>
        <label><input type="radio" name="q1" value="have-worked"> have worked</label>
        <label><input type="radio" name="q1" value="work-since"> work since</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="weakness">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">أي كلمة معناها "نقطة ضعف"؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Which word means "a point you need to improve"?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="strength"> strength</label>
        <label><input type="radio" name="q2" value="weakness"> weakness</label>
        <label><input type="radio" name="q2" value="deadline"> deadline</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="no-weaknesses">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">لو المحاور سألك عن نقط ضعفك، إيه أسوأ رد ممكن تقوله؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">If the interviewer asks about your weaknesses, what's the worst possible response?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="realistic"> تذكر نقطة ضعف حقيقية وخطوة بتحسّنها بيها</label>
        <label><input type="radio" name="q3" value="no-weaknesses"> "I don&#39;t really have any weaknesses."</label>
        <label><input type="radio" name="q3" value="ask-back"> تسأل توضيح عن السؤال لو مش فاهمه</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="ask-question">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">إيه أفضل حاجة تعملها لما المحاور يسألك "Do you have any questions for us?"<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What's the best thing to do when asked "Do you have any questions for us?"</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="say-no"> "No, not really."</label>
        <label><input type="radio" name="q4" value="ask-question"> تسأل سؤال ذكي عن الدور أو الفريق</label>
        <label><input type="radio" name="q4" value="ask-salary"> تسأل عن المرتب فورًا من غير أي سؤال تاني</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ اكتب ردّك الحقيقي / Write Your Own Real Answer</h3>
    <div class="ar">🇪🇬 اكتب على ورقة إجابتك انت الحقيقية لسؤال "Why should we hire you?" باستخدام خلفيتك ومهاراتك الفعلية (حتى لو لسه بتتعلم). حاول تستخدم زمن المضارع التام (Present Perfect) زي "I have learned..." أو "I have built...". اقراها بصوت عالي كإنك فعلًا في المقابلة.</div>
    <div class="en">🇬🇧 Write out your own real answer to "Why should we hire you?" using your actual background and skills (even if you're still learning). Try to use the Present Perfect tense, like "I have learned..." or "I have built...". Read it aloud as if you were really in the interview.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 المحاكي ده هو التطبيق العملي الحقيقي لكل حاجة اتعلمتها في "إنجليزي بيئة العمل" — كتابة الإيميل، عبارات الاجتماعات، وثقة المحادثة كلهم اجتمعوا هنا في موقف حياتك المهنية. المرحلة الجاية، "الإنجليزية التقنية للمبرمجين"، هتديك آخر أداة ناقصاك: قراءة توثيق حقيقي بثقة — عشان تبقى جاهز تمامًا لما تدور على فرصة شغل فعلية وتستخدم ثقة المقابلة دي في أرض الواقع.</div>
    <div class="en">🇬🇧 This simulator is the real practical application of everything you learned in "Business English" — email writing, meeting phrases, and conversational confidence all come together here in a real career moment. The next stage, "Technical English for Developers," gives you the last missing tool: reading real documentation with confidence — so you're fully ready to take this interview-level confidence and use it when actually job-hunting.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>استخدم المضارع التام (Present Perfect: "I have worked...") للكلام عن خبرة سابقة أثرها مستمر لحد دلوقتي.</li>
        <li>تجنّب الردود الغامضة (stuff, I don&#39;t know) والردود اللي هي "red flags" زي "I don&#39;t have any weaknesses" أو "I prefer to work alone always".</li>
        <li>اقفل المقابلة دايمًا بسؤال ذكي — ده بيدل على اهتمام حقيقي بالدور.</li>
        <li>مفردات جديدة: strength, weakness, responsibility, deadline, teamwork.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="business-english.php">← المرحلة السابقة</a>
    <a href="technical-english.php">المرحلة الجاية / Next: الإنجليزية التقنية →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
