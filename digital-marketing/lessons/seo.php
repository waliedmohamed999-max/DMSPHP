<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'seo';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'تحسين محركات البحث (SEO)';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">المرحلة 2 / Stage 2</span>
<h1>تحسين محركات البحث <span class="ltr">Search Engine Optimization</span></h1>
<p class="subtitle">SEO هو الطريقة اللي تخليك تظهر في نتائج جوجل الأولى من غير ما تدفع قرش واحد لإعلان — بس بيحتاج وقت وصبر وترتيب صح: كلمة مفتاحية، بنية تقنية سليمة، محتوى منظم، وسمعة خارجية.</p>

<div class="step-tracker">
    <a href="#read">📖 Read</a>
    <a href="#understand">🧠 Understand</a>
    <a href="#quiz">🧠 Quiz</a>
    <a href="#challenge">🛠️ Challenge</a>
    <a href="#project">🚀 Project</a>
</div>

<h2 id="read">الهدف / Goal</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 تفهم عملية اختيار الكلمة المفتاحية الصح، تتعرف على أساسيات SEO التقني (سرعة الموقع، توافق الموبايل، خريطة الموقع)، تفهم إزاي تنظم محتوى صفحتك بعناوين فرعية وروابط داخلية، وتقدر تكتب عنوان صفحة ووصف ميتا (meta description) بشكل صح، مع فهم دور الباك لينكس.</div>
    <div class="en">🇬🇧 Understand the process of picking the right keyword, learn technical SEO basics (site speed, mobile-friendliness, sitemaps), understand how to structure a page with subheadings and internal links, and be able to write a page title and meta description that genuinely work — plus understand the role of backlinks.</div>
</div>

<h2 id="understand">بحث الكلمات المفتاحية / Keyword Research</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 قبل ما تكتب أي كلمة على صفحتك، لازم تعرف بالظبط إيه اللي الناس بتكتبه في جوجل. عملية بحث الكلمات المفتاحية بتقارن بين كل كلمة مرشحة على ثلاث معايير: <b>حجم البحث (Search Volume)</b> — كام مرة بيتكتب البحث ده شهريًا؟ <b>النية (Intent)</b> — هل الشخص بيدور على معلومة بس (informational)، ولا بيقارن بين خيارات (navigational)، ولا جاهز يشتري دلوقتي (transactional)؟ <b>المنافسة (Competition)</b> — كام موقع تاني بيحاول يتصدر لنفس الكلمة، وقد إيه قوتهم؟</div>
    <div class="en">🇬🇧 Before writing a single word on your page, you need to know exactly what people type into Google. Keyword research compares every candidate keyword on three criteria: <b>Search Volume</b> — how many times is this query typed monthly? <b>Intent</b> — is the person just looking for information (informational), comparing options (navigational), or ready to buy right now (transactional)? <b>Competition</b> — how many other sites are trying to rank for the same keyword, and how strong are they?</div>
</div>

<h2>مثال محلول: اختيار بين كلمتين مرشحتين / Worked Example: Choosing Between Two Candidate Keywords</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 نفس متجر أحذية الجري بتاعنا، وعنده كلمتين مرشحتين يبدأ بيهم:</div>
</div>
<div class="output-box">الكلمة أ: "أحذية رياضية"
   حجم البحث: ~50,000 بحث شهريًا
   النية: غامضة — ممكن حد بيدور على أحذية كورة أو جيم أو جري، مش واضح هيشتري إيه
   المنافسة: عالية جدًا — مواقع عملاقة زي Amazon وNike متصدرة من سنين

الكلمة ب: "أحذية جري رجالي مقاس 43"
   حجم البحث: ~700 بحث شهريًا فقط
   النية: واضحة جدًا وشرائية (transactional) — الشخص عارف بالظبط عايز إيه
   المنافسة: منخفضة — قلة من المتاجر المحلية بيستهدفوا الكلمة دي بالتحديد</div>
<div class="bi-block">
    <div class="ar">🇪🇬 القرار الصح هنا هو البدء بالكلمة (ب) رغم إن حجم البحث أقل بكتير. ليه؟ لأن (1) فرصتك تتصدر جوجل فعليًا أعلى بكتير بسبب المنافسة المنخفضة — تصدر لكلمة (أ) ممكن ياخد سنين ومجهود ضخم، (2) نسبة تحويل الزوار لمشترين هتكون أعلى بكتير لأن النية شرائية واضحة. الاستراتيجية الذكية: تبدأ بكلمات طويلة ومحددة (long-tail keywords) زي (ب) عشان تكسب زوار وثقة عند جوجل بسرعة، وبعدين تدريجيًا تستهدف كلمات أعم زي (أ) بعد ما موقعك يكبر ويكتسب سلطة (authority).</div>
    <div class="en">🇬🇧 The right call here is to start with keyword (B) despite its much smaller search volume. Why? Because (1) your actual chance of ranking is far higher thanks to the low competition — ranking for keyword (A) could take years and huge effort, (2) the visitor-to-buyer conversion rate will be much higher since the intent is clearly transactional. The smart strategy: start with long-tail keywords like (B) to earn traffic and trust with Google quickly, then gradually target broader keywords like (A) once your site has grown and earned authority.</div>
</div>

<h2>SEO الداخلي (On-page) / On-page SEO</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 On-page SEO هو كل حاجة بتتحكم فيها جوه صفحتك نفسها: عنوان الصفحة (title tag)، العناوين الفرعية (H1, H2)، مكان الكلمة المفتاحية في النص، ووصف الميتا. جوجل بيقرأ الـ title tag كأهم إشارة على "الصفحة دي عن إيه"، فلازم يحتوي على الكلمة المفتاحية الأساسية بشكل طبيعي، مش محشور.</div>
    <div class="en">🇬🇧 On-page SEO is everything you control inside your own page: the title tag, subheadings (H1, H2), where the keyword appears in the text, and the meta description. Google reads the title tag as the strongest signal of "what this page is about," so it needs to contain your primary keyword naturally — not stuffed in.</div>
</div>

<h2>مثال محلول: عنوان صفحة ضعيف مقابل قوي / Worked Example: Bad vs Good Title Tag</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 تخيل عندك متجر أونلاين بيبيع أحذية جري في مصر. قارن العنوانين دول:</div>
</div>
<div class="output-box">❌ Bad: "الصفحة الرئيسية | متجرنا"
✅ Good: "أحذية جري رجالي أصلية في مصر — توصيل خلال 48 ساعة | [اسم المتجر]"</div>
<div class="bi-block">
    <div class="ar">🇪🇬 ليه الثاني أفضل؟ (1) فيه الكلمة اللي العميل فعلًا بيبحث بيها "أحذية جري رجالي مصر" — العنوان الأول معندوش أي كلمة بحث حقيقية. (2) فيه وعد واضح (توصيل 48 ساعة) بيزود نسبة الضغط (CTR) لما يظهر في نتائج البحث. (3) اسم المتجر في الآخر مش الأول، عشان جوجل والعميل يشوفوا "إيه المنتج" قبل "مين البائع". العنوان "الصفحة الرئيسية" ده كارثة SEO شائعة جدًا — جوجل مش هيقدر يربطه بأي بحث حقيقي.</div>
    <div class="en">🇬🇧 Why is the second one better? (1) It contains the actual phrase a customer searches, "men's running shoes Egypt" — the first title has zero real search terms in it. (2) It includes a clear promise (48-hour delivery) which raises click-through rate (CTR) when it shows in results. (3) The store name comes last, not first, so Google and the customer see "what" before "who." "Home Page" as a title is an extremely common SEO disaster — Google can't map it to any real search query.</div>
</div>

<h2>وصف الميتا (Meta Description) / Meta Description</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 وصف الميتا مش عامل ترتيب مباشر عند جوجل (يعني مش بيرفعك في النتائج)، لكنه بيأثر جدًا على نسبة الضغط، لأنه النص اللي بيظهر تحت العنوان في نتائج البحث. لازم يكون حوالي 150-160 حرف، ويحتوي على فايدة واضحة + دعوة لفعل (call to action) بسيطة، زي: "اكتشف تشكيلة أحذية الجري الأصلية بأسعار تنافسية، وتوصيل مجاني للطلبات فوق 500 جنيه."</div>
    <div class="en">🇬🇧 The meta description is not a direct ranking factor (it won't push you up in results), but it heavily affects click-through rate, since it's the text shown under the title in search results. Keep it around 150-160 characters, with a clear benefit plus a simple call to action, e.g.: "Discover our authentic running shoe collection at competitive prices, with free delivery on orders over 500 EGP."</div>
</div>

<h2>أساسيات SEO التقني / Technical SEO Basics</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 مفيش فايدة من أفضل كلمة مفتاحية وأحسن عنوان لو موقعك بطيء أو متعطل على الموبايل — جوجل بيعاقب المواقع دي بترتيب أقل، والزوار أنفسهم بيسيبوا الصفحة قبل ما تفتح. أربع نقاط أساسية:</div>
</div>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>سرعة الموقع (Page Speed):</b> جوجل بيقيس فعليًا "قد إيه صفحتك بتفتح بسرعة وقد إيه العناصر بتستقر بسرعة من غير ما تقفز" (مقاييس اسمها Core Web Vitals). صفحة بتاخد أكتر من 3 ثواني عشان تفتح بيسيبها أكتر من نص الزوار من غير ما يكملوا. <b>توافق الموبايل (Mobile-friendliness):</b> جوجل بيفهرس (indexing) نسخة الموبايل من موقعك أولًا، مش نسخة الديسكتوب — يعني لو موقعك مش متجاوب (responsive) على الموبايل، ترتيبك بيتأثر حتى لو نسخة الديسكتوب ممتازة. <b>خريطة الموقع (XML Sitemap):</b> ملف بسيط بيسرد كل صفحات موقعك عشان يسهّل على محركات البحث تكتشفها كلها، بدل ما تعتمد بس على الروابط بينهم. مهم جدًا للمواقع الكبيرة أو الجديدة اللي لسه معندهاش باك لينكس كتير توصلها. <b>ملف robots.txt:</b> ملف نصي بيقول لمحركات البحث "ادخل هنا" أو "متدخلش هنا" — مثلًا بتمنع جوجل من فهرسة صفحة تسجيل الدخول أو لوحة التحكم الإدارية، عشان توفر "ميزانية الزحف" (crawl budget) للصفحات المهمة فعلًا.</div>
    <div class="en">🇬🇧 <b>Page Speed:</b> Google literally measures "how fast your page loads and how quickly elements settle without jumping around" (metrics called Core Web Vitals). A page taking over 3 seconds to load loses more than half its visitors before it even finishes. <b>Mobile-friendliness:</b> Google indexes your mobile version first, not the desktop version — so if your site isn't responsive on mobile, your ranking suffers even if the desktop version is excellent. <b>XML Sitemap:</b> a simple file listing every page on your site, making it easier for search engines to discover all of them instead of relying only on the links between pages. Crucial for large or new sites that don't yet have many backlinks pointing to them. <b>robots.txt file:</b> a text file telling search engines "come in here" or "don't come in here" — for example, blocking Google from indexing your login page or admin panel, saving your "crawl budget" for pages that actually matter.</div>
</div>
<div class="output-box"># مثال ملف robots.txt بسيط / Example robots.txt file
User-agent: *
Disallow: /admin/
Disallow: /login/
Allow: /

Sitemap: https://example.com/sitemap.xml</div>

<h2>بنية المحتوى: العناوين والروابط الداخلية / Content Structure: Headers &amp; Internal Linking</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 جوجل بيقرأ صفحتك زي جدول محتويات كتاب: <b>H1</b> واحد بس في الصفحة (عادة عنوان المقال نفسه)، وتحته <b>H2</b> لكل قسم رئيسي، وتحت كل H2 ممكن <b>H3</b> لتفاصيل فرعية. الترتيب ده بيساعد جوجل يفهم أهمية كل جزء، وبيساعد القارئ يلاقي اللي محتاجه بسرعة بدل ما يقرا كل حاجة. أما <b>الروابط الداخلية (Internal Linking)</b> فمعناها إنك تربط بين صفحات موقعك ببعضها — مقال عن "إزاي تختار مقاس الحذاء الصح" ممكن يربط لصفحة منتج "أحذية جري رجالي"، وده بينقل جزء من "ثقة" الصفحة الأقوى للصفحة الأضعف، وكمان بيخلي الزائر يقضي وقت أطول في موقعك بدل ما يسيبه بعد صفحة واحدة.</div>
    <div class="en">🇬🇧 Google reads your page like a book's table of contents: one <b>H1</b> per page (usually the article's own title), then an <b>H2</b> for each main section, and under each H2 an optional <b>H3</b> for sub-details. This hierarchy helps Google understand each part's importance, and helps readers find what they need fast instead of reading everything. <b>Internal Linking</b> means connecting your own pages to each other — an article on "how to pick the right shoe size" can link to a "men's running shoes" product page, which passes some of the stronger page's "trust" to the weaker one, and also keeps the visitor on your site longer instead of leaving after one page.</div>
</div>

<div class="flow-diagram">
    <div class="flow-box">Keyword Research</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">On-page (Title, H1-H3, Meta)</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">Technical SEO (Speed, Mobile, Sitemap)</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">Internal Linking</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">Off-page (Backlinks)</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">Ranking</div>
</div>
<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ إن الترتيب ده مش عشوائي: مفيش فايدة من باك لينكس قوية لصفحة كلماتها المفتاحية غلط، ومفيش فايدة من عنوان ممتاز لصفحة بطيئة، ومفيش فايدة من صفحة سريعة من غير روابط داخلية تساعد جوجل يكتشف باقي موقعك.</div>
    <div class="en">🇬🇧 Notice this order isn't arbitrary: strong backlinks are wasted on a page targeting the wrong keyword, a great title is wasted on a slow page, and a fast page is wasted without internal links helping Google discover the rest of your site.</div>
</div>

<h2>SEO الخارجي (Off-page) / Off-page SEO</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 Off-page SEO هو كل حاجة بتحصل خارج موقعك بس بتأثر على ترتيبك — أهمها الباك لينكس (backlinks): روابط من مواقع تانية بترجع لموقعك. جوجل بيشوف الباك لينك كـ"صوت ثقة" — لو موقع معروف ومحترم عمل لينك لصفحتك، ده معناه صفحتك تستاهل تتصدق. مش كل الباك لينكس متساوية: لينك من موقع أخبار كبير أقوى بكتير من 100 لينك من مواقع سبام رخيصة، والأخيرة ممكن كمان تضر ترتيبك.</div>
    <div class="en">🇬🇧 Off-page SEO is everything happening outside your site that still affects your ranking — most importantly backlinks: links from other websites pointing to yours. Google treats a backlink as a "vote of trust" — if a well-known, respected site links to your page, that signals your page deserves credibility. Not all backlinks are equal: one link from a major news site outweighs 100 links from cheap spam sites, and the latter can actually hurt your ranking.</div>
</div>

<div class="recap-box">
    <h3>🗺️ خريطة On-page مقابل Off-page مقابل تقني / On-page vs Off-page vs Technical Map</h3>
    <ul>
        <li><b>بحث الكلمات:</b> حجم البحث + النية + المنافسة — نقطة الانطلاق قبل أي حاجة تانية.</li>
        <li><b>On-page:</b> عنوان الصفحة، العناوين الفرعية (H1-H3)، مكان الكلمة المفتاحية، وصف الميتا — كلها تحت تحكمك المباشر.</li>
        <li><b>تقني (Technical):</b> سرعة الموقع، توافق الموبايل، خريطة الموقع، robots.txt — الأساس اللي كل حاجة تانية بتقف عليه.</li>
        <li><b>الروابط الداخلية:</b> تربط صفحاتك ببعض وتنقل الثقة والزوار بينها.</li>
        <li><b>Off-page:</b> الباك لينكس، ذكر اسم علامتك التجارية في مواقع تانية، مراجعات العملاء الخارجية — تعتمد على سمعتك خارج موقعك.</li>
    </ul>
</div>

<div class="exercise-box">
    <h3>✍️ تمرين عملي / Hands-on Exercise</h3>
    <div class="ar">🇪🇬 اختار منتج وهمي (زي "دورة أونلاين لتعلم الجيتار للمبتدئين")، واكتب: (1) عنوان صفحة (title tag) لا يزيد عن 60 حرف يحتوي على كلمة مفتاحية واقعية، (2) وصف ميتا من 150-160 حرف فيه فايدة واضحة ودعوة لفعل. وضّح ليه اخترت الكلمات دي بالذات.</div>
    <div class="en">🇬🇧 Pick a hypothetical product (like "an online beginner guitar course"), and write: (1) a title tag under 60 characters containing a realistic keyword, (2) a 150-160 character meta description with a clear benefit and call to action. Explain why you chose those specific words.</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="b">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">متجر جديد بيدور على أول كلمة مفتاحية يبدأ بيها. عنده كلمة (أ) حجم بحث ضخم ومنافسة عالية جدًا من مواقع عملاقة، وكلمة (ب) حجم بحث صغير لكن نية شرائية واضحة ومنافسة منخفضة. إيه الأنسب للبداية؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">A new store is picking its first keyword: (A) huge volume but very high competition from giant sites, (B) small volume but clear buying intent and low competition. Which is the better start?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="a"> الكلمة (أ) دايمًا، لأن الحجم أهم حاجة</label>
        <label><input type="radio" name="q1" value="b"> الكلمة (ب)، لأن فرصة التصدر أعلى والنية الشرائية أوضح</label>
        <label><input type="radio" name="q1" value="neither"> ولا واحدة، لازم تدفع إعلانات فقط</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="sitemap">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">إيه وظيفة ملف XML Sitemap؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What is the job of an XML sitemap file?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="sitemap"> يسرد كل صفحات الموقع عشان يسهّل على محركات البحث اكتشافها</label>
        <label><input type="radio" name="q2" value="speed"> يخلي الموقع يفتح أسرع</label>
        <label><input type="radio" name="q2" value="design"> يتحكم في تصميم الصفحة على الموبايل</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ قارن كلمتين مفتاحيتين واختار الفائزة / Compare Two Keywords and Pick a Winner</h3>
    <div class="ar">🇪🇬 اختار منتج وهمي مختلف عن مثال الدرس، واخترع رقمين واقعيين لكلمتين مرشحتين (كلمة عامة بحجم بحث كبير ومنافسة عالية، وكلمة طويلة ومحددة بحجم أصغر ومنافسة أقل). اكتب النية المرجحة لكل كلمة (informational / transactional)، وحدد أنهي كلمة هتبدأ بيها ولماذا — بنفس أسلوب المثال المحلول بالظبط. بعد كده اكتب سطر واحد من محتوى robots.txt يمنع فهرسة صفحة "سلة التسوق" لموقعك.</div>
    <div class="en">🇬🇧 Pick a hypothetical product different from the lesson's example, and invent realistic numbers for two candidate keywords (a broad one with high volume and high competition, and a long-tail one with smaller volume and lower competition). Write the likely intent for each (informational / transactional), and decide which one you'd start with and why — following the worked example's exact style. Then write one robots.txt line blocking your site's "shopping cart" page from being indexed.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 الكلمة المفتاحية اللي اخترتها هنا مش نهاية القصة — هي بداية الدرس الجاي. تسويق المحتوى (Content Marketing) هيوريك إزاي تبني مقال أو فيديو كامل حوالين نفس الكلمة دي، بدل ما تكتفي بعنوان ووصف ميتا بس.</div>
    <div class="en">🇬🇧 The keyword you picked here isn't the end of the story — it's the start of the next lesson. Content Marketing shows you how to build a full article or video around that exact keyword, instead of stopping at just a title and meta description.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>بحث الكلمات المفتاحية = حجم البحث + النية + المنافسة، وابدأ غالبًا بكلمات طويلة ومحددة (long-tail).</li>
        <li>On-page SEO = تحت تحكمك (العنوان، العناوين الفرعية، مكان الكلمة المفتاحية، الميتا).</li>
        <li>SEO التقني = سرعة الموقع، توافق الموبايل، خريطة الموقع (sitemap)، وملف robots.txt.</li>
        <li>بنية المحتوى = H1 واحد، H2/H3 للأقسام، وروابط داخلية تربط صفحاتك ببعض.</li>
        <li>Off-page SEO = سمعتك خارج موقعك، وأهمها الباك لينكس من مواقع موثوقة.</li>
        <li>وصف الميتا مش عامل ترتيب لكنه بيرفع نسبة الضغط.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="intro.php">← المرحلة السابقة</a>
    <a href="content-marketing.php">المرحلة الجاية / Next: Content Marketing →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
