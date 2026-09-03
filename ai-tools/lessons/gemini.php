<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'gemini';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'Gemini — أدوات الذكاء الاصطناعي';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">أداة 3 من 4 / Tool 3 of 4</span>
<h1>Gemini <span class="ltr">by Google</span></h1>
<p class="subtitle">مساعد جوجل — نقطة قوته الحقيقية إنه متكامل مع بحث جوجل وGoogle Workspace، وقوي جدًا في فهم الصور والفيديو، مش بس النصوص.</p>

<div class="step-tracker">
    <a href="#read">📖 Read</a>
    <a href="#understand">🧠 Understand</a>
    <a href="#quiz">🧠 Quiz</a>
    <a href="#challenge">🛠️ Challenge</a>
    <a href="#project">🚀 Project</a>
</div>

<h2 id="read">الهدف / Goal</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 تفهم إمتى Gemini يكون الاختيار الأفضل — خصوصًا لما تحتاج معلومة حديثة، أو تحلل صورة/سكرين شوت، أو تشتغل جوه Google Docs/Sheets مباشرة.</div>
    <div class="en">🇬🇧 Understand when Gemini is the best choice — especially when you need up-to-date info, need to analyze an image/screenshot, or work directly inside Google Docs/Sheets.</div>
</div>

<h2 id="understand">إيه اللي يميّزه؟ / What Makes It Different</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>تكامل مع البحث:</b> بيقدر يرجع لنتائج بحث جوجل الحية عشان يديك معلومة محدّثة (زي آخر نسخة من مكتبة أو framework)، عكس نماذج تانية بياناتها لحد تاريخ معيّن بس. <b>Google Workspace:</b> شغال جوه Docs, Sheets, Gmail مباشرة. <b>فهم صور وفيديو قوي:</b> تقدر تديله سكرين شوت لخطأ أو تصميم UI ويحلله بدقة عالية.</div>
    <div class="en">🇬🇧 <b>Search integration:</b> it can pull live Google Search results for up-to-date info (like a library's latest version), unlike models limited to a training cutoff. <b>Google Workspace:</b> works directly inside Docs, Sheets, Gmail. <b>Strong image/video understanding:</b> you can hand it a screenshot of an error or a UI design and get a detailed analysis.</div>
</div>

<h2>إزاي تستخدمه بفعالية / Using It Effectively</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 لو محتاج تعرف "إيه أحدث نسخة من PHP دلوقتي" أو أي معلومة ممكن تكون اتغيّرت، ده المكان اللي Gemini بيتميّز فيه بسبب البحث الحي. لو واجهتك رسالة خطأ في المتصفح أو محرر الكود، اعمل لها سكرين شوت وابعتها مباشرة بدل ما تكتبها يدوي — هيقراها ويحللها. ولو بتكتب توثيق أو تقرير عن مشروعك، جرّب تعمله مباشرة جوه Google Docs بمساعدته.</div>
    <div class="en">🇬🇧 If you need "what's the latest PHP version right now" or anything that might have changed recently, that's where Gemini shines thanks to live search. If you hit an error message in the browser or editor, screenshot it and send it directly instead of retyping — it reads and analyzes it. And if you're writing documentation or a project report, try drafting it directly inside Google Docs with its help.</div>
</div>

<h2>سيناريو عملي: حلّل بيانات طلبات متجرك جوه Google Sheets / Practical Scenario: Analyzing Your Store's Orders in Google Sheets</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 خلّصت مشروع <b>Online Store</b> بتاعك من مسار Full Stack، وعندك جدول Excel/CSV فيه كل الطلبات (تاريخ، منتج، سعر، محافظة العميل). صدّرت البيانات دي لـ Google Sheets — هنا Gemini بيفرق عن أي شات عادي، لإنه شغال جوه نفس الشيت مباشرة (خانة جانبية اسمها "Help me analyze" أو "Ask Gemini")، بيشوف بياناتك الفعلية من غير ما تلزق أي حاجة.</div>
    <div class="en">🇬🇧 You've finished your <b>Online Store</b> project from the Full Stack track, and have an Excel/CSV sheet of all orders (date, product, price, customer region). You exported it to Google Sheets — here Gemini differs from a plain chat tool, because it works directly inside that same sheet (a side panel called "Help me analyze" or "Ask Gemini"), seeing your actual data without you pasting anything.</div>
</div>

<div class="security-box">
    <h3>❌ برومبت ضعيف / Weak Prompt</h3>
    <div class="ar">🇪🇬 <span class="ltr">"لخّص البيانات دي"</span> — عام جدًا. هترجعلك فقرة سطحية زي "عندك مبيعات متنوعة في محافظات مختلفة" من غير أي رقم فعلي تقدر تستخدمه.</div>
    <div class="en">🇬🇧 <span class="ltr">"Summarize this data"</span> — far too general. You'll get a shallow paragraph like "you have varied sales across different regions" with no actual numbers you can use.</div>
</div>

<div class="bi-block" style="border-inline-start-color:var(--accent-2);">
    <h3 style="margin-top:0;">✅ برومبت قوي / Strong Prompt</h3>
    <div class="ar">🇪🇬 <span class="ltr">"احسبلي إجمالي المبيعات لكل محافظة في عمود C، ورتبهم تنازليًا، واقترح صيغة (Formula) أحطها في عمود جديد تحسب متوسط قيمة الطلب لكل محافظة."</span> — لاحظ إنه بيطلب نتيجة محددة (إجمالي مرتب) <b>وكمان</b> صيغة جاهزة يقدر يستخدمها مباشرة، مش وصف نصي بس. ده بالظبط نفس فكرة <code>groupby()</code> اللي شفتها في مسار Python Web، بس هنا Gemini بيبنيلك المعادلة بدل ما تكتب كود.</div>
    <div class="en">🇬🇧 <span class="ltr">"Calculate total sales per region in column C, sort them descending, and suggest a Formula I can put in a new column to compute average order value per region."</span> — notice it asks for a specific result (a sorted total) <b>and</b> a ready-to-use formula, not just a text description. This is exactly the same idea as the <code>groupby()</code> you saw in the Python Web track, except here Gemini builds you the formula instead of writing code.</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="search">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">إيه اللي بيخلي Gemini مفيد لسؤال زي "إيه أحدث نسخة من مكتبة معينة"؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What makes Gemini useful for a question like "what's the latest version of a library"?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="search"> تكامله مع نتائج بحث جوجل الحية</label>
        <label><input type="radio" name="q1" value="offline"> شغال من غير إنترنت خالص</label>
        <label><input type="radio" name="q1" value="editor"> بيشتغل جوه محرر الكود بس</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="screenshot">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">لو واجهتك رسالة خطأ في المتصفح، إيه أسرع طريقة تفهمها بيها من Gemini؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">If you hit a browser error, what's the fastest way to get Gemini to understand it?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="type"> تكتب نص الخطأ يدويًا كلمة كلمة</label>
        <label><input type="radio" name="q2" value="screenshot"> تبعتله سكرين شوت مباشرة</label>
        <label><input type="radio" name="q2" value="ignore"> تتجاهله وتكمل</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="specific">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">ليه "احسبلي إجمالي المبيعات لكل محافظة ورتبهم" أفضل من "لخّص البيانات دي" في Google Sheets؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Why is "total sales per region, sorted" better than "summarize this data" in Google Sheets?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="specific"> لإنه بيطلب نتيجة محددة وقابلة للاستخدام، مش وصف عام</label>
        <label><input type="radio" name="q3" value="short"> لإنه أقصر في عدد الكلمات</label>
        <label><input type="radio" name="q3" value="norule"> مفيش فرق، هيرجّع نفس الرد</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="noneed">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">عايز تحلل جدول بيانات موجود فعلاً جوه Google Sheets. إيه اللي بيميّز استخدام Gemini هنا عن نسخه في نافذة شات منفصلة؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">You want to analyze data already inside Google Sheets. What's different about using Gemini here vs. a separate chat window?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="noneed"> بيشوف بيانات الشيت فعليًا من غير ما تلزقها يدويًا</label>
        <label><input type="radio" name="q4" value="samepaste"> برضه لازم تلزق كل الجدول يدويًا زي أي شات تاني</label>
        <label><input type="radio" name="q4" value="worse"> بيدّي نتائج أسوأ لإنه جوه الشيت</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ ابحث عن معلومة حديثة فعليًا / Actually Look Up Something Current</h3>
    <div class="ar">🇪🇬 اسأل Gemini سؤال محتاج معلومة حديثة فعلاً (زي "إيه آخر نسخة مستقرة من PHP أو Python دلوقتي، وإيه أهم حاجة جديدة فيها؟"). قارن إجابته بمعلومة قديمة كنت عارفها، وشوف هل فرّق فعلًا إنه بيستخدم بحث حي.</div>
    <div class="en">🇬🇧 Ask Gemini a question that genuinely needs current information (like "what's the latest stable version of PHP or Python right now, and what's new in it?"). Compare its answer to something you already knew, and see whether live search actually made a difference.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 في مرة جاية تشتغل فيها على أي تمرين في مسارك الأساسي وتقابل رسالة خطأ في الـ Playground أو المتصفح، جرّب الأسلوب اللي اتعلمته هنا فعليًا: اعمل سكرين شوت وابعته لـ Gemini بدل ما تكتب الخطأ يدويًا، وقارن سرعة الحل بالطريقة القديمة.</div>
    <div class="en">🇬🇧 Next time you work on any exercise in your main track and hit an error in the Playground or browser, actually use what you learned here: screenshot it and send it to Gemini instead of retyping the error, and compare how much faster it is than the old way.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>الأقوى في: معلومات محدّثة عن طريق البحث الحي، وتحليل الصور والفيديو.</li>
        <li>مفيد جدًا لو بتشتغل أصلًا جوه Google Docs/Sheets/Gmail.</li>
        <li>ابعتله سكرين شوت للخطأ بدل ما تكتبه — بيوفر وقت وبيقرأ التفاصيل صح.</li>
        <li>جوه Google Sheets، Gemini بيشوف بياناتك فعليًا ويقترح صيغ (Formulas) جاهزة، مش بس وصف نصي.</li>
    </ul>
</div>

<div class="exercise-box">
    <h3>✍️ تمرين عملي / Hands-on Exercise</h3>
    <div class="ar">🇪🇬 اعمل سكرين شوت لأي رسالة خطأ واجهتك في محرر الكود (Playground) في أي مسار بتتعلمه، وابعتها لـ Gemini واسأله "إيه سبب الخطأ ده؟" من غير ما تكتب نص الخطأ يدويًا — قارن دقة الفهم بتاعته من الصورة بس.</div>
    <div class="en">🇬🇧 Screenshot any error message you hit in a Playground for any track you're learning, and send it to Gemini asking "what's causing this error?" without typing the error text manually — compare how accurately it understands from the image alone.</div>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="chatgpt.php">← الأداة السابقة</a>
    <a href="copilot.php">الأداة الجاية / Next: GitHub Copilot →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
