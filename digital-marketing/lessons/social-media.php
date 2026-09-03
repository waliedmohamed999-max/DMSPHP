<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'social-media';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'التسويق عبر السوشيال ميديا';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">المرحلة 4 / Stage 4</span>
<h1>التسويق عبر السوشيال ميديا <span class="ltr">Social Media Marketing</span></h1>
<p class="subtitle">النجاح في السوشيال ميديا مش عدد المتابعين — هو اختيار المنصة الصح، وشكل المحتوى المناسب لكل منصة، والانتظام، وتفاعل حقيقي مش أرقام فاضية.</p>

<div class="step-tracker">
    <a href="#read">📖 Read</a>
    <a href="#understand">🧠 Understand</a>
    <a href="#quiz">🧠 Quiz</a>
    <a href="#challenge">🛠️ Challenge</a>
    <a href="#project">🚀 Project</a>
</div>

<h2 id="read">الهدف / Goal</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 تقدر تختار المنصة المناسبة لمنتجك وجمهورك، تفهم إزاي شكل المحتوى بيختلف من منصة لمنصة، تميز بين النشر العضوي والمدفوع، تفهم فايدة جدول المحتوى (content calendar)، وتميز بين التفاعل الحقيقي والمقاييس الوهمية (vanity metrics).</div>
    <div class="en">🇬🇧 Be able to choose the right platform for your product and audience, understand how content format differs across platforms, distinguish organic from paid distribution, understand the value of a content calendar, and distinguish real engagement from vanity metrics.</div>
</div>

<h2 id="understand">اختيار المنصة الصح / Platform Selection</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 زي ما اتعلمنا في المقدمة، السؤال هو "فين جمهوري؟" مش "إيه أشهر منصة؟". كل منصة ليها طبيعة محتوى وجمهور مختلف تمامًا:</div>
</div>

<div class="recap-box">
    <h3>🗺️ خريطة المنصات / Platform Map</h3>
    <ul>
        <li><b>Instagram:</b> محتوى مرئي قوي (صور، فيديو قصير Reels) — مناسب لمنتجات الموضة، الأكل، الديكور، والجمهور الأصغر سنًا (18-34).</li>
        <li><b>Facebook:</b> جمهور أوسع سنًا وأكبر حجمًا، قوي في المجموعات (Groups) وبيع محلي مباشر — مناسب لخدمات محلية وعائلية.</li>
        <li><b>TikTok:</b> فيديو قصير ترفيهي بخوارزمية تكتشف محتوى جديد بسرعة — مناسب لمنتجات تحتاج "لحظة اكتشاف" مفاجئة وجمهور أصغر سنًا.</li>
        <li><b>LinkedIn:</b> محتوى احترافي ومهني — مناسب لخدمات B2B (شركة بتبيع لشركة تانية) وتوظيف واستشارات.</li>
        <li><b>Pinterest:</b> محتوى إلهامي بصري (تصاميم، وصفات، ديكور) بعمر طويل جدًا مقارنة بمنصات تانية — مناسب لمنتجات "تخطيط" زي الأفراح أو الديكور.</li>
    </ul>
</div>

<div class="bi-block">
    <div class="ar">🇪🇬 غلطة شائعة جدًا: محاولة تكون موجود على كل المنصات من أول يوم. ده بيوزع مجهودك ويخليك تنتج محتوى ضعيف على الكل بدل محتوى قوي على منصة أو اتنين. ابدأ بمنصة واحدة أو اتنين بالمظبوط زي ما عملنا في تمرين المقدمة، واتقنها الأول.</div>
    <div class="en">🇬🇧 A very common mistake: trying to be present on every platform from day one. That spreads your effort thin and leaves you producing weak content everywhere instead of strong content on one or two platforms. Start with exactly one or two platforms as we did in the intro exercise, and master those first.</div>
</div>

<h2>نفس المنتج، شكل مختلف لكل منصة / Same Product, Different Format per Platform</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 اختيار المنصة الصح مش كفاية — لازم تغيّر شكل المحتوى نفسه حسب سلوك المستخدم على كل منصة. مثال: تطبيق لياقة بدنية جديد بيروّج لنفسه على ثلاث منصات مختلفة، بمحتوى مختلف تمامًا في كل واحدة:</div>
</div>
<div class="output-box">📱 Instagram: Reel بعنوان "تحول 30 يوم" — فيديو قبل/بعد سريع (15 ثانية) بموسيقى ترند، متبوع بـ Carousel (سلايدات) فيها انفوجرافيك للنظام الغذائي المستخدم. بصري بالكامل، نص قليل جدًا.

💼 LinkedIn: بوست نصي من مؤسس الشركة بعنوان "ليه بنيت التطبيق ده بعد ما شركتنا القديمة فشلت في الاهتمام بصحة الموظفين" — يشارك رقم حقيقي (زي "35% من موظفينا كانوا بياخدوا إجازات مرضية بسبب الإجهاد")، نبرة احترافية وشخصية، بدون إيموجي مبالغ فيه.

🎵 TikTok: فيديو كوميدي قصير (20 ثانية) بيمثل "التمرين اللي كل حد بيقول هيعمله وميعملوش"، بنبرة ساخرة خفيفة ومتماشية مع ترند صوتي شائع، بدون أي ذكر مباشر للتطبيق إلا في آخر ثانيتين.</div>
<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ: نفس المنتج (تطبيق لياقة)، لكن Instagram احتاج بصريات نظيفة وسريعة، LinkedIn احتاج نبرة شخصية ومهنية بأرقام حقيقية، وTikTok احتاج فكاهة تتماشى مع ثقافة المنصة نفسها. نشر نفس المنشور بالظبط على التلاتة (نفس الصورة والنص) هيبان غريب وهيفشل على الأقل في منصتين من التلاتة.</div>
    <div class="en">🇬🇧 Notice: same product (fitness app), but Instagram needed clean, fast visuals, LinkedIn needed a personal, professional tone with real numbers, and TikTok needed humor that fits the platform's own culture. Posting the exact same post (same image and text) on all three would look out of place and fail on at least two of the three.</div>
</div>

<h2>نشر عضوي مقابل مدفوع / Organic vs Paid Social</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>النشر العضوي (Organic)</b> هو أي منشور بتنشره مجانًا ويوصل لمتابعينك حسب خوارزمية المنصة — مجاني لكن وصوله محدود ومتناقص باستمرار لأن المنصات بتفضّل تدفعك للإعلانات. <b>النشر المدفوع (Paid)</b> هو دفع فلوس عشان تضمن وصول المنشور لعدد أكبر أو لجمهور مستهدف بدقة (حتى لو مش بيتابعك أصلًا)، وده جسر مباشر لدرس الإعلانات المدفوعة الجاي. مثال حقيقي: صفحة عندها 2000 متابع، تنشر بوست عضوي بيوصل لـ 500 شخص بس (25% نسبة وصول — طبيعي جدًا لخوارزميات النهاردة)، لكن لما تدفع 20 دولار على نفس البوست كإعلان مستهدف (targeted)، بيوصل لـ 8000 شخص من غير المتابعين أصلًا، لأنه بيوصل لناس مهتمة بنفس الاهتمام مش بس متابعينها الحاليين.</div>
    <div class="en">🇬🇧 <b>Organic</b> posting is any free post reaching your followers per the platform's algorithm — free, but its reach is limited and constantly shrinking since platforms prefer pushing you toward ads. <b>Paid</b> posting means spending money to guarantee the post reaches a larger or precisely targeted audience (even people who don't follow you at all), and this is a direct bridge to the next Paid Ads lesson. Real example: a page with 2,000 followers posts organically and reaches only 500 people (25% reach — quite normal with today's algorithms), but spending $20 boosting that same post as a targeted ad reaches 8,000 people who don't even follow the page, because it reaches people interested in the same topic rather than only current followers.</div>
</div>

<h2>جدول المحتوى / The Content Calendar</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 جدول المحتوى هو خطة مسبقة بتحدد إيه هتنشر، فين، وإمتى — بدل ما تفكر "أنشر إيه النهاردة؟" كل يوم بطريقة عشوائية. الانتظام أهم من الكم: صفحة بتنشر 3 مرات في الأسبوع بانتظام لمدة شهر هتنمو أكتر بكتير من صفحة نشرت 10 مرات في يوم واحد وسابت الحساب شهر كامل. خوارزميات المنصات بتكافئ الانتظام لأنها بتحاول تتنبأ إذا كان الجمهور هيرجع تاني أو لأ.</div>
    <div class="en">🇬🇧 A content calendar is a pre-planned schedule of what to post, where, and when — instead of randomly asking "what should I post today?" every day. Consistency matters more than volume: a page posting 3 times a week consistently for a month will grow far more than one that posted 10 times in a single day then went silent for a month. Platform algorithms reward consistency because they're trying to predict whether the audience will keep coming back.</div>
</div>

<h2>تفاعل حقيقي مقابل مقاييس وهمية / Real Engagement vs Vanity Metrics</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 اللايك سهل جدًا — بضغطة واحدة وبدون أي تفكير. المقاييس الوهمية (vanity metrics) زي عدد اللايكات أو عدد المتابعين بتحسسك إنك ناجح بس مش دايمًا بتعكس نتيجة فعلية على البيزنس. التفاعل الحقيقي هو اللي بيتطلب مجهود من المستخدم: تعليق فيه رأي حقيقي، مشاركة (share) للمنشور مع أصحابه، أو رسالة مباشرة (DM) بيسأل فيها عن المنتج. لو عندك منشور بـ 1000 لايك و5 تعليقات، ده أضعف بكتير من منشور بـ 200 لايك و 40 تعليق و15 مشاركة و10 رسائل خاصة بتسأل عن السعر — الثاني ده جمهور فعلًا مهتم وقريب من الشراء.</div>
    <div class="en">🇬🇧 A like is very cheap — one tap, zero thought. Vanity metrics like like-count or follower-count feel like success but don't always reflect a real business outcome. Real engagement requires effort from the user: a comment with a genuine opinion, a share to their friends, or a DM asking about the product. A post with 1,000 likes and 5 comments is far weaker than a post with 200 likes, 40 comments, 15 shares, and 10 DMs asking about price — the second post has an audience that's actually interested and closer to buying.</div>
</div>

<div class="recap-box">
    <h3>🗺️ خريطة المقاييس / Metrics Map</h3>
    <ul>
        <li><b>وهمية (Vanity):</b> عدد اللايكات، عدد المتابعين الخام — سهلة، بس مش دايمًا مؤشر على مبيعات.</li>
        <li><b>حقيقية (Meaningful):</b> التعليقات ذات المعنى، المشاركات، الرسائل المباشرة، نسبة النقر لموقعك (click-through rate).</li>
        <li><b>القاعدة:</b> اسأل دايمًا "هل الرقم ده بيقرب العميل من قرار الشراء ولا بس بيخليني أحس كويس؟"</li>
    </ul>
</div>

<div class="exercise-box">
    <h3>✍️ تمرين عملي / Hands-on Exercise</h3>
    <div class="ar">🇪🇬 اختار المنتج اللي حددته في تمرين المقدمة، وابني جدول محتوى لأسبوع واحد (7 أيام) للمنصة اللي اخترتها: حدد لكل يوم نوع المحتوى (صورة/فيديو/سؤال للجمهور) وهدفه (تعريف بالمنتج، بناء ثقة، أو دعوة للشراء). بعد كده اكتب: إيه المقياس الحقيقي (مش الوهمي) اللي هتستخدمه عشان تحكم إن الأسبوع ده كان ناجح؟</div>
    <div class="en">🇬🇧 Pick the product you defined in the intro exercise, and build a 7-day content calendar for the platform you chose: for each day, define the content type (image/video/audience question) and its goal (product awareness, trust-building, or a purchase call). Then write: what meaningful (not vanity) metric would you use to judge whether that week succeeded?</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="tone">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">تطبيق اللياقة في المثال المحلول نشر نفس فكرة "التحول" بثلاث أشكال مختلفة تمامًا على Instagram وLinkedIn وTikTok. إيه السبب الرئيسي وراء الاختلاف؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">The fitness app in the worked example posted the same "transformation" idea in three completely different formats on Instagram, LinkedIn, and TikTok. What's the main reason for the difference?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="budget"> عشان الميزانية مختلفة في كل منصة</label>
        <label><input type="radio" name="q1" value="tone"> عشان كل منصة ليها ثقافة محتوى وتوقعات جمهور مختلفة</label>
        <label><input type="radio" name="q1" value="random"> مفيش سبب، كان اختيار عشوائي</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="paid">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">صفحة عندها 2000 متابع نشرت بوست عضوي وصل لـ 500 شخص بس، وبعدين دفعت 20 دولار على نفس البوست ووصل لـ 8000 شخص من غير المتابعين. النوع التاني ده بيتسمى إيه؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">A page with 2,000 followers posted organically and reached only 500 people, then paid $20 on the same post and reached 8,000 non-followers. What is that second type called?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="organic"> نشر عضوي (Organic)</label>
        <label><input type="radio" name="q2" value="paid"> نشر مدفوع (Paid)</label>
        <label><input type="radio" name="q2" value="viral"> انتشار فيروسي (Viral) طبيعي</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ صمم نفس الفكرة بثلاث أشكال مختلفة / Design the Same Idea in Three Different Formats</h3>
    <div class="ar">🇪🇬 اختار منتج وهمي (مختلف عن مثال الدرس)، واكتب فكرة منشور واحدة (نفس الرسالة الأساسية) بثلاث صيغ مختلفة تمامًا: (1) صيغة Instagram Reel بصرية قصيرة، (2) صيغة LinkedIn نصية احترافية بنبرة شخصية، (3) صيغة TikTok خفيفة أو كوميدية. اكتب جملة توضح ليه غيّرت الأسلوب في كل نسخة.</div>
    <div class="en">🇬🇧 Pick a hypothetical product (different from the lesson's example), and write one post idea (same core message) in three completely different versions: (1) a short visual Instagram Reel version, (2) a professional, personal-tone LinkedIn text version, (3) a light or comedic TikTok version. Write one sentence explaining why you changed the style in each version.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 جدول المحتوى ده ممتاز للنشر العضوي، لكنه مش القناة الوحيدة اللي بتملك بيها علاقة مباشرة مع عميلك. الدرس الجاي (البريد الإلكتروني) هيوريك قناة تانية بتملكها بالكامل من غير ما تعتمد على خوارزمية أي منصة — أهم لما عميلك يكون قريب من قرار الشراء.</div>
    <div class="en">🇬🇧 This content calendar is great for organic posting, but it isn't the only channel where you own a direct relationship with your customer. The next lesson (Email Marketing) shows you another channel you fully own without depending on any platform's algorithm — most important once your customer is close to a buying decision.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>اختيار المنصة يعتمد على طبيعة جمهورك ونوع محتواك، مش شهرة المنصة.</li>
        <li>نفس المنتج محتاج شكل محتوى مختلف لكل منصة (بصري سريع، نصي احترافي، خفيف وترند).</li>
        <li>النشر العضوي مجاني لكن محدود الوصول، والمدفوع بيضمن وصول أكبر ومستهدف — جسر لدرس الإعلانات.</li>
        <li>جدول المحتوى بيحول النشر من عشوائي لمخطط، والانتظام يفوق الكم.</li>
        <li>ركّز على التفاعل الحقيقي (تعليقات، مشاركات، رسائل) مش المقاييس الوهمية (لايكات فقط).</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="content-marketing.php">← المرحلة السابقة</a>
    <a href="email-marketing.php">المرحلة الجاية / Next: Email Marketing →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
