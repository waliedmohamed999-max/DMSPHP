<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'content-marketing';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'تسويق المحتوى';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">المرحلة 3 / Stage 3</span>
<h1>تسويق المحتوى <span class="ltr">Content Marketing</span></h1>
<p class="subtitle">تسويق المحتوى معناه إنك تكسب انتباه وثقة عميلك بمحتوى مفيد فعلًا، قبل ما تطلب منه يشتري أي حاجة.</p>

<div class="step-tracker">
    <a href="#read">📖 Read</a>
    <a href="#understand">🧠 Understand</a>
    <a href="#quiz">🧠 Quiz</a>
    <a href="#challenge">🛠️ Challenge</a>
    <a href="#project">🚀 Project</a>
</div>

<h2 id="read">الهدف / Goal</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 تفهم الفكرة الجوهرية وراء تسويق المحتوى، تتعرف على أشكاله المختلفة وإمتى تستخدم كل شكل، تفهم استراتيجية "المحتوى الركيزة والمحتوى المتفرع" (Pillar & Cluster)، وتقدر تبني استراتيجية محتوى بسيطة بأربع خطوات: الجمهور → الموضوع → الشكل → التوزيع.</div>
    <div class="en">🇬🇧 Understand the core idea behind content marketing, learn its main formats and when to use each, understand the Pillar & Cluster content strategy, and be able to build a simple content strategy in four steps: audience → topic → format → distribution.</div>
</div>

<h2 id="understand">إيه هو تسويق المحتوى؟ / What Is Content Marketing?</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 الإعلان التقليدي بيقول "اشتري مني". تسويق المحتوى بيقول "خد الفايدة دي مجانًا الأول". الفكرة إنك تدي قيمة حقيقية (معلومة، حل لمشكلة، ترفيه) للعميل المحتمل قبل ما تطلب منه أي حاجة، عشان تبني ثقة. الشخص اللي قرألك مقال حل له مشكلة حقيقية هيثق في منتجك أكتر بكتير من حد شاف إعلان مباشر بيقولك "احنا الأفضل".</div>
    <div class="en">🇬🇧 Traditional advertising says "buy from me." Content marketing says "take this value for free first." The idea is to give real value (information, a solved problem, entertainment) to a potential customer before asking for anything, in order to build trust. Someone who read an article that solved a real problem for them will trust your product far more than someone who saw a direct ad saying "we're the best."</div>
</div>

<h2>أشكال المحتوى: إمتى تستخدم كل شكل؟ / Content Types: When to Use Each</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 المحتوى مش بس مقالات مدونة، وكل شكل ليه موقف بيتفوق فيه على غيره:</div>
</div>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>مقال مدونة (Blog Post):</b> الأفضل لما تستهدف كلمة مفتاحية معينة وعايز تظهر في نتائج بحث جوجل (SEO)، وللمواضيع اللي محتاجة شرح تفصيلي بخطوات. مثال: "دليل كامل لاختيار مقاس حذاء الجري الصح". <b>فيديو (Video):</b> الأفضل لإظهار حاجة بصريًا صعب توصيفها بالكلام (كيفية استخدام منتج، مقارنة منتجين جنب بعض)، وأعلى شكل من ناحية الاحتفاظ بالانتباه والمعلومة. مثال: فيديو "unboxing" يوضح جودة الخامة الفعلية للحذاء. <b>انفوجرافيك (Infographic):</b> الأفضل لما عندك بيانات أو خطوات كتيرة عايز تبسطها بصريًا في نظرة واحدة سريعة، ومثالي للمشاركة على السوشيال ميديا. مثال: انفوجرافيك "5 علامات إن حذاء الجري محتاج تغيير". <b>دراسة حالة (Case Study):</b> الأفضل في المرحلة المتأخرة من قرار الشراء، لما العميل مقتنع بالمشكلة لكن محتاج دليل إن الحل بيشتغل فعلًا. مثال: "إزاي ساعدنا 200 عداء يقللوا إصابات الركبة بنسبة 40%" مع أرقام وشهادات حقيقية — قوي جدًا في B2B وفي المنتجات باهظة الثمن.</div>
    <div class="en">🇬🇧 <b>Blog Post:</b> best when targeting a specific keyword for search visibility (SEO), and for topics needing detailed step-by-step explanation. Example: "The Complete Guide to Picking the Right Running Shoe Size." <b>Video:</b> best for showing something visual that's hard to describe in words (how to use a product, comparing two products side by side), and the top format for attention and information retention. Example: an unboxing video showing the shoe's actual build quality. <b>Infographic:</b> best when you have data or many steps you want to simplify visually at a glance, and ideal for social sharing. Example: an infographic on "5 Signs Your Running Shoes Need Replacing." <b>Case Study:</b> best late in the buying decision, when the customer accepts the problem but needs proof the solution actually works. Example: "How We Helped 200 Runners Reduce Knee Injuries by 40%" with real numbers and testimonials — very powerful in B2B and for expensive products.</div>
</div>

<h2>استراتيجية المحتوى الركيزة والمتفرع / Pillar &amp; Cluster Content Strategy</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 لما موقعك يكبر ويبقى عندك عشرات المقالات، محتاج تنظيم يخلي جوجل يفهم إنك "خبير" في موضوع كامل، مش بس كاتب مقالات متفرقة. استراتيجية Pillar & Cluster بتحل المشكلة دي: تكتب صفحة واحدة شاملة وطويلة اسمها <b>"المحتوى الركيزة" (Pillar Page)</b> بتغطي موضوع عريض بالكامل (زي "الدليل الشامل لبدء الجري كمبتدئ")، وبعدين تكتب مقالات أضيق وأكثر تحديدًا اسمها <b>"المحتوى المتفرع" (Cluster Content)</b> بتغطي جزئية واحدة من نفس الموضوع بعمق أكبر (زي "إزاي تتنفس صح أثناء الجري"، "أفضل وقت في اليوم للجري"). كل مقال متفرع بيعمل رابط داخلي (internal link) لصفحة الركيزة، وصفحة الركيزة بترجع تربط لكل المقالات المتفرعة.</div>
    <div class="en">🇬🇧 As your site grows to dozens of articles, you need organization that signals to Google you're an "expert" on a whole topic, not just a scattered blogger. The Pillar & Cluster strategy solves this: you write one comprehensive, long page called a <b>Pillar Page</b> covering a broad topic fully (like "The Complete Guide to Starting Running as a Beginner"), then write narrower, more specific articles called <b>Cluster Content</b> that each cover one piece of that topic in more depth (like "How to Breathe Correctly While Running," "The Best Time of Day to Run"). Every cluster article internally links back to the pillar page, and the pillar page links out to every cluster article.</div>
</div>

<div class="flow-diagram">
    <div class="flow-box">Pillar: "دليل الجري الشامل"</div>
    <div class="flow-arrow">↔</div>
    <div class="flow-box">Cluster: التنفس أثناء الجري</div>
</div>
<div class="flow-diagram">
    <div class="flow-box">Pillar: "دليل الجري الشامل"</div>
    <div class="flow-arrow">↔</div>
    <div class="flow-box">Cluster: أفضل وقت للجري</div>
</div>
<div class="flow-diagram">
    <div class="flow-box">Pillar: "دليل الجري الشامل"</div>
    <div class="flow-arrow">↔</div>
    <div class="flow-box">Cluster: اختيار مقاس الحذاء</div>
</div>
<div class="bi-block">
    <div class="ar">🇪🇬 الفايدة المزدوجة: (1) القارئ اللي عايز تفصيل دقيق (زي التنفس) بيلاقي مقال مخصص له، والقارئ اللي عايز نظرة عامة بيلاقي الـ Pillar. (2) جوجل بيشوف شبكة الروابط دي كإشارة قوية إنك "سلطة" (authority) في موضوع الجري بالكامل، مش بس مقال واحد عشوائي — وده بالظبط الرابط بين تسويق المحتوى ودرس SEO اللي فات.</div>
    <div class="en">🇬🇧 The double benefit: (1) a reader wanting precise detail (like breathing) finds a dedicated article, while a reader wanting an overview finds the Pillar. (2) Google reads this link network as a strong signal that you're an "authority" on the whole running topic, not just one random article — this is exactly the link back to last lesson's SEO.</div>
</div>

<h2>إطار عمل استراتيجية المحتوى / A Simple Content Strategy Framework</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 قبل ما تكتب أي محتوى، جاوب على أربع أسئلة بالترتيب ده: (1) الجمهور — مين بالظبط بيقرا؟ (2) الموضوع — إيه المشكلة أو السؤال اللي هحله له؟ (3) الشكل — مقال ولا فيديو ولا انفوجرافيك يناسب الموضوع ده؟ (4) التوزيع — هنشر المحتوى ده فين عشان يوصل للجمهور ده بالذات (مدونة، إيميل، سوشيال ميديا)؟</div>
    <div class="en">🇬🇧 Before writing any content, answer four questions in this order: (1) Audience — exactly who is reading? (2) Topic — what problem or question will this solve for them? (3) Format — does this topic suit an article, a video, or an infographic? (4) Distribution — where will you publish this to actually reach that specific audience (blog, email, social media)?</div>
</div>

<h2>مثال محلول: خطة محتوى لعمل صغير / Worked Example: A Content Plan for a Small Business</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 تخيل عندك بيزنس صغير بيبيع أدوات مطبخ منزلية الصنع. طبّق الإطار:</div>
</div>
<div class="output-box">1. الجمهور: ستات وشباب من 25-45 سنة بيحبوا الطبخ في البيت، مش شيفات محترفين.
2. الموضوع: "5 غلطات بتخلي الأكل يلزق في الحلة — وإزاي تتجنبها" (مشكلة حقيقية يدور عليها الجمهور ده).
3. الشكل: فيديو قصير (60-90 ثانية) بيوضح الغلطات عمليًا، لأن الجمهور بيسكرول على السوشيال ومحتاج يشوف الحل مش يقراه.
4. التوزيع: نشر على Instagram Reels + TikTok، وتحويله لمقال SEO على المدونة عنوانه "لماذا يلزق الأكل بالحلة؟" لجذب بحث جوجل كمان.</div>
<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ إن نفس المحتوى (حل مشكلة لزوق الأكل) اتحول لشكلين مختلفين (فيديو + مقال) عشان يوصل لجمهور بيستهلك المحتوى بطرق مختلفة — ده اسمه "إعادة توظيف المحتوى" (content repurposing) وبيوفر وقت ومجهود كبير.</div>
    <div class="en">🇬🇧 Notice that the same content (solving the food-sticking problem) was turned into two different formats (video + article) to reach an audience that consumes content differently — this is called "content repurposing" and saves a huge amount of time and effort.</div>
</div>

<div class="recap-box">
    <h3>🗺️ خريطة الإطار / Framework Map</h3>
    <ul>
        <li><b>الجمهور:</b> مين بالظبط، مش "الكل".</li>
        <li><b>الموضوع:</b> مشكلة حقيقية بيدور عليها الجمهور ده، مش موضوع عشوائي.</li>
        <li><b>الشكل:</b> مقال (SEO وتفصيل)، فيديو (بصري وتفاعل)، انفوجرافيك (بيانات سريعة)، دراسة حالة (إثبات وثقة).</li>
        <li><b>التوزيع:</b> المكان اللي الجمهور موجود فيه فعلًا، مش كل منصة ممكنة.</li>
        <li><b>Pillar & Cluster:</b> صفحة شاملة + مقالات متفرعة مرتبطة بروابط داخلية = سلطة موضوعية عند جوجل.</li>
    </ul>
</div>

<div class="exercise-box">
    <h3>✍️ تمرين عملي / Hands-on Exercise</h3>
    <div class="ar">🇪🇬 اختار عمل وهمي صغير (زي "محل نباتات منزلية")، وطبّق الإطار الأربعة خطوات بالكامل: حدد الجمهور بدقة، اختار مشكلة حقيقية كموضوع، حدد الشكل الأنسب، وحدد قناة التوزيع. اكتب كمان عنوان جذاب واحد للمحتوى ده.</div>
    <div class="en">🇬🇧 Pick a hypothetical small business (like "a houseplant shop"), and apply the full four-step framework: define the audience precisely, pick a real problem as the topic, choose the best-fit format, and pick a distribution channel. Also write one compelling headline for that piece of content.</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="video">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">عايز توضح لعملائك إزاي يركّبوا قطعة غيار معقدة في منتجك — إيه أنسب شكل محتوى؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">You want to show customers how to install a complex spare part in your product — which content format fits best?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="infographic"> انفوجرافيك</label>
        <label><input type="radio" name="q1" value="video"> فيديو</label>
        <label><input type="radio" name="q1" value="casestudy"> دراسة حالة</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="cluster">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">في استراتيجية Pillar & Cluster، المقال المتخصص القصير اللي بيغطي جزئية واحدة بعمق ("إزاي تتنفس أثناء الجري") بيتسمى إيه؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">In the Pillar & Cluster strategy, what is the short specialized article covering one specific piece deeply ("how to breathe while running") called?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="pillar"> Pillar Page</label>
        <label><input type="radio" name="q2" value="cluster"> Cluster Content</label>
        <label><input type="radio" name="q2" value="backlink"> Backlink</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ ابني بنية Pillar & Cluster كاملة / Build a Full Pillar &amp; Cluster Structure</h3>
    <div class="ar">🇪🇬 اختار مجال وهمي (زي "تعلم التصوير الفوتوغرافي للمبتدئين")، واكتب: (1) عنوان صفحة Pillar واحدة شاملة، (2) ثلاثة عناوين مقالات Cluster مختلفة تتفرع منها، كل واحد يغطي جزئية محددة. وضّح جملة واحدة توضح إزاي كل Cluster هيربط رجوع للـ Pillar.</div>
    <div class="en">🇬🇧 Pick a hypothetical niche (like "beginner photography"), and write: (1) one comprehensive Pillar Page title, (2) three distinct Cluster article titles branching from it, each covering one specific piece. Add one sentence explaining how each Cluster would link back to the Pillar.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 كتبت المحتوى واخترت الشكل والتوزيع — بس المحتوى وحده مش كفاية لو مفيش قناة توزيع منظمة تكبّر وصوله. الدرس الجاي (السوشيال ميديا) هيوريك إزاي تاخد نفس المحتوى ده وتوزعه صح على منصات مختلفة، كل واحدة بأسلوب مختلف.</div>
    <div class="en">🇬🇧 You wrote the content and picked format and distribution — but content alone isn't enough without an organized distribution channel to amplify its reach. The next lesson (Social Media) shows you how to take this same content and distribute it correctly across different platforms, each with its own style.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>تسويق المحتوى = كسب ثقة قبل طلب البيع، عن طريق قيمة حقيقية.</li>
        <li>الأشكال الأساسية: مقال (SEO)، فيديو (بصري)، انفوجرافيك (بيانات سريعة)، دراسة حالة (إثبات متأخر في القرار).</li>
        <li>Pillar & Cluster = صفحة شاملة + مقالات متفرعة مترابطة، تبني سلطة موضوعية عند جوجل.</li>
        <li>الإطار: الجمهور → الموضوع → الشكل → التوزيع.</li>
        <li>إعادة توظيف نفس الفكرة في أشكال مختلفة يوفر وقت ويزود الوصول.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="seo.php">← المرحلة السابقة</a>
    <a href="social-media.php">المرحلة الجاية / Next: Social Media →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
