<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'deploying-frontend';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'نشر موقعك للعامة — Front-End Developer';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">المرحلة 18 / Stage 18</span>
<h1>نشر موقعك للعامة <span class="ltr">Deploying Your Site Publicly</span></h1>
<p class="subtitle">بنيت موقع كامل على جهازك، لكن لحد ما ترفعه على الإنترنت، محدش هيشوفه غيرك. المرحلة دي هي الخطوة الأخيرة: تاخد ملفاتك وتخليها متاحة لأي حد في العالم عنده رابط.</p>

<div class="step-tracker">
    <a href="#read">📖 Read</a>
    <a href="#understand">🧠 Understand</a>
    <a href="#quiz">🧠 Quiz</a>
    <a href="#challenge">🛠️ Challenge</a>
    <a href="#project">🚀 Project</a>
</div>

<h2 id="read">📖 الهدف / Goal</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 تفهم معنى "موقع ثابت" (Static Site) وليه مشروعاتك في المسار ده (HTML/CSS/JS خام) مثالية للنشر المجاني، تفرّق بين النشر بربط مستودع GitHub والنشر بالسحب والإفلات المباشر، تفهم معنى "خطوة البناء" (Build Step) ومتى مش محتاجها، وتعرف تربط دومين مخصص بموقعك.</div>
    <div class="en">🇬🇧 Understand what a "Static Site" means and why your projects in this track (plain HTML/CSS/JS) are perfect for free deployment, tell apart deploying via a connected GitHub repo versus direct drag-and-drop, understand what a "Build Step" means and when you don't need one, and learn how to attach a custom domain to your site.</div>
</div>

<h2 id="understand">🧠 1) إيه هو "الموقع الثابت"؟ / What Is a Static Site?</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 موقع ثابت (Static Site) معناه إن كل الملفات اللي بيرسلها السيرفر للمتصفح (HTML، CSS، JS، الصور) جاهزة مسبقًا ومفيش أي كود بيتنفذ على السيرفر وقت الطلب — عكس موقع PHP مثلًا، اللي بيحتاج سيرفر يفهم ويشغّل كود PHP لكل طلب قبل ما يرجّع HTML. كل مشروع بنيته في المسار ده (البورتفوليو، To-Do List، تطبيقات Vue بالـ CDN) هو موقع ثابت 100%.</div>
    <div class="en">🇬🇧 A Static Site means every file the server sends the browser (HTML, CSS, JS, images) is already prepared, and no code runs on the server at request time — unlike a PHP site, which needs a server to understand and execute PHP code on every request before returning HTML. Every project you built in this track (the portfolio, the To-Do List, the Vue-via-CDN apps) is 100% a static site.</div>
</div>
<div class="bi-block">
    <div class="ar">🇪🇬 وده بالظبط سبب إن Vercel وNetlify اختيار صحيح ومناسب هنا (على عكس مسارات PHP في المنصة دي، اللي محتاجة سيرفر بيفهم PHP فعليًا): مفيش أي كود سيرفر محتاج يشتغل، فمنصات زي دي بترفع ملفاتك كما هي على شبكة توزيع محتوى (CDN) عالمية وتوصّلها للزائر مباشرة — سريع، ومجاني للمشاريع الشخصية، ومن غير أي إعداد سيرفر.</div>
    <div class="en">🇬🇧 This is exactly why Vercel and Netlify are the right, appropriate choice here (unlike the PHP tracks on this platform, which genuinely need a server that runs PHP): there's no server code that needs to execute, so platforms like these upload your files as-is to a global content delivery network (CDN) and serve them directly to visitors — fast, free for personal projects, and with zero server setup.</div>
</div>

<h2>2) طريقتان للنشر: ربط GitHub أو السحب والإفلات</h2>
<div class="flow-diagram">
    <div class="flow-box">ملفاتك على جهازك</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">طريقة 1: مستودع GitHub متصل بالمنصة</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">طريقة 2: سحب وإفلات مباشر للمجلد</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">رابط عام شغال: yourproject.netlify.app</div>
</div>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>الطريقة الأولى — ربط مستودع GitHub (الأنسب على المدى الطويل):</b> تعمل حساب على GitHub، تعمل Push لمشروعك كمستودع (Repository)، وبعدين من لوحة تحكم Vercel أو Netlify تختار "Import from GitHub" وتربط نفس المستودع. من هنا، كل مرة تعمل <code>git push</code> لتحديث جديد، المنصة بتكتشف التحديث أوتوماتيك وتعيد نشر الموقع بنفسها — من غير ما ترفع أي حاجة يدوي تاني.</div>
    <div class="en">🇬🇧 <b>Method 1 — Connecting a GitHub repo (best long-term):</b> create a GitHub account, push your project as a Repository, then from the Vercel or Netlify dashboard choose "Import from GitHub" and connect that same repo. From then on, every time you <code>git push</code> an update, the platform automatically detects it and redeploys the site itself — no manual re-upload needed.</div>
</div>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>الطريقة الثانية — السحب والإفلات المباشر (الأسرع للتجربة السريعة):</b> Netlify مشهور بميزة اسمها "Netlify Drop" — بتروح لموقعهم، وتسحب مجلد مشروعك بالكامل (اللي فيه <code>index.html</code>) وتفلته في المتصفح مباشرة. خلال ثواني بيديك رابط عام شغال. الطريقة دي مثالية لتجربة سريعة أو مشروع تعليمي، لكن مفيش ربط بـ Git، فأي تحديث محتاج تسحب وتفلت المجلد تاني من الصفر.</div>
    <div class="en">🇬🇧 <b>Method 2 — Direct drag-and-drop (fastest for a quick try):</b> Netlify has a well-known feature called "Netlify Drop" — you go to their site, drag your entire project folder (containing <code>index.html</code>) and drop it right in the browser. Within seconds you get a working public link. This is ideal for a quick experiment or a learning project, but there's no Git connection, so any update means dragging and dropping the folder again from scratch.</div>
</div>

<h2>3) خطوة البناء (Build Step) — ومتى إنت مش محتاجها</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 مواقع كتير حديثة (مبنية بـ React أو Vue مع أدوات بناء زي Vite) محتاجة "خطوة بناء" (Build Step): أمر زي <code>npm run build</code> بيحوّل كود المصدر لملفات HTML/CSS/JS نهائية جاهزة للنشر. Vercel/Netlify بيسألوك وقت الإعداد عن "Build Command" و"Publish Directory" عشان يعرفوا يشغّلوا الأمر ده تلقائيًا بعد كل Push.</div>
    <div class="en">🇬🇧 Many modern sites (built with React or Vue plus build tools like Vite) need a "Build Step": a command like <code>npm run build</code> that turns source code into final HTML/CSS/JS files ready for deployment. Vercel/Netlify ask you during setup for a "Build Command" and "Publish Directory" so they know how to run that command automatically after every push.</div>
</div>
<div class="bi-block">
    <div class="ar">🇪🇬 لكن مشروعاتك في المسار ده (HTML عادي، CSS عادي، JavaScript خام، أو حتى Vue بالـ CDN من غير أي أدوات بناء) <b>مش محتاجة أي خطوة بناء خالص</b> — ملفاتك أصلًا جاهزة للنشر زي ما هي. وقت الإعداد على Vercel أو Netlify، تسيب خانة "Build Command" فاضية، وتحدد "Publish Directory" على المجلد الرئيسي (اللي فيه <code>index.html</code> مباشرة). المنصة هترفع الملفات كما هي من غير أي تحويل.</div>
    <div class="en">🇬🇧 But your projects in this track (plain HTML, plain CSS, vanilla JavaScript, or even Vue via CDN with no build tools) <b>need no build step at all</b> — your files are already deployment-ready as they are. During setup on Vercel or Netlify, you leave the "Build Command" field empty and set "Publish Directory" to the root folder (the one containing <code>index.html</code> directly). The platform uploads the files exactly as they are, with no transformation.</div>
</div>

<h2>4) الخطوات العملية بالظبط / Step-by-Step Guide</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>على Netlify (أسرع طريقة للمبتدئين):</b></div>
    <div class="en">🇬🇧 <b>On Netlify (fastest for beginners):</b></div>
</div>
<pre><code>1. روح على netlify.com واعمل حساب مجاني (بإيميلك أو حساب GitHub).
2. من لوحة التحكم، دوس "Add new site" ثم "Deploy manually".
3. اسحب مجلد مشروعك بالكامل (اللي فيه index.html) وفلّته في المربع اللي بيظهر.
4. خلال ثواني، هتاخد رابط شغال زي: random-name-123.netlify.app
5. (اختياري) من إعدادات الموقع، غيّر الاسم لحاجة أوضح: my-portfolio.netlify.app</code></pre>
<pre><code>1. روح على vercel.com واعمل حساب مجاني (الأفضل تسجل بحساب GitHub مباشرة).
2. اعمل Push لمشروعك على مستودع GitHub لو لسه ماعملتوش.
3. من لوحة Vercel، دوس "Add New Project" واختار المستودع بتاعك.
4. Framework Preset: اختار "Other" (لموقع HTML/CSS/JS عادي)، واسيب Build Command فاضي.
5. دوس "Deploy" — خلال ثواني هتاخد رابط زي: my-portfolio.vercel.app</code></pre>
<div class="bi-block">
    <div class="ar">🇪🇬 الفرق العملي: Netlify Drop أسرع لتجربة لمرة واحدة من غير أي حساب GitHub، بينما ربط Vercel بمستودع GitHub أفضل لمشروع هتستمر تحدّثه، لأن أي <code>git push</code> جديد بينشر تلقائيًا من غير أي خطوة يدوية إضافية.</div>
    <div class="en">🇬🇧 The practical difference: Netlify Drop is faster for a one-time try with no GitHub account needed, while connecting Vercel to a GitHub repo is better for a project you'll keep updating, since every new <code>git push</code> deploys automatically with no extra manual step.</div>
</div>

<h2>5) الدومين المخصص / Custom Domains</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 الرابط المجاني اللي بتاخده (زي <code>my-portfolio.netlify.app</code>) شغال 100% ومجاني للأبد، لكن لو عايز دومين خاص بيك (زي <code>ahmed.dev</code>)، بتشتريه من مسجّل دومينات (زي Namecheap أو Google Domains)، وبعدين من إعدادات الموقع على Vercel/Netlify تدوس "Add custom domain" وتحط الدومين اللي اشتريته. المنصة هتديك سجلات DNS (زي CNAME أو A Record) تروح تحطها في لوحة تحكم مسجّل الدومين — بعد ما الـ DNS ينتشر (دقايق لساعات)، الدومين بتاعك هيشاور مباشرة على موقعك المنشور.</div>
    <div class="en">🇬🇧 The free link you get (like <code>my-portfolio.netlify.app</code>) works 100% and is free forever, but if you want your own domain (like <code>ahmed.dev</code>), you buy it from a domain registrar (like Namecheap or Google Domains), then from your site's settings on Vercel/Netlify click "Add custom domain" and enter the domain you bought. The platform gives you DNS records (like a CNAME or A Record) to add in your registrar's dashboard — once DNS propagates (minutes to hours), your domain points directly at your deployed site.</div>
</div>
<div class="bi-block">
    <div class="ar">🇪🇬 ملحوظة أمان مجانية: كلا المنصتين بتديك شهادة HTTPS (SSL) مجانية أوتوماتيك لأي دومين تربطه — مفيش أي إعداد إضافي مطلوب منك، والزوار هيشوفوا القفل الأخضر (🔒) جنب الرابط من أول لحظة.</div>
    <div class="en">🇬🇧 A free security bonus: both platforms automatically give you a free HTTPS (SSL) certificate for any domain you connect — no extra setup required from you, and visitors will see the lock icon (🔒) next to the URL from the very first moment.</div>
</div>

<div class="exercise-box">
    <h3>✍️ تمرين عملي / Hands-on Exercise</h3>
    <div class="ar">🇪🇬 خد مشروع البورتفوليو اللي بنيته في المسار ده، وانشره فعليًا: جرّب Netlify Drop الأول (الأسرع)، خد الرابط الناتج وافتحه في متصفح تاني (أو ابعته لصاحبك) للتأكد إنه شغال فعلًا على الإنترنت مش على جهازك بس.</div>
    <div class="en">🇬🇧 Take the portfolio project you built in this track and actually deploy it: try Netlify Drop first (the fastest), take the resulting link and open it in a different browser (or send it to a friend) to confirm it genuinely works on the internet, not just on your machine.</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="static">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">مشروع HTML/CSS/JS خام من غير أي سيرفر بيشغّل كود وقت الطلب، بيتسمى إيه؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">A plain HTML/CSS/JS project with no server executing code at request time is called what?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="static"> موقع ثابت (Static Site)</label>
        <label><input type="radio" name="q1" value="dynamic"> موقع ديناميكي محتاج سيرفر PHP</label>
        <label><input type="radio" name="q1" value="database"> قاعدة بيانات</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="drop">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">عايز تجرّب تنشر موقعك بسرعة من غير ما تعمل حساب GitHub أو تربط مستودع خالص. أنهي طريقة أنسب؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">You want to quickly deploy your site without creating a GitHub account or connecting any repo. Which method fits?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="git"> ربط مستودع GitHub</label>
        <label><input type="radio" name="q2" value="drop"> السحب والإفلات المباشر (زي Netlify Drop)</label>
        <label><input type="radio" name="q2" value="dns"> شراء دومين مخصص الأول</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="none">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">موقعك عبارة عن HTML وCSS وJavaScript خام بس، من غير React أو أي أداة بناء. خانة "Build Command" وقت النشر لازم تحطها إيه؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Your site is plain HTML, CSS, and vanilla JavaScript with no React or build tool. What should the "Build Command" field be?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="npm"> npm run build دايمًا</label>
        <label><input type="radio" name="q3" value="none"> فاضية — مفيش خطوة بناء مطلوبة</label>
        <label><input type="radio" name="q3" value="php"> php -S</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="dns">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">اشتريت دومين من مسجّل دومينات وعايز توصّله بموقعك المنشور على Netlify. الخطوة الأساسية اللي محتاجها؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">You bought a domain from a registrar and want to point it at your Netlify-deployed site. What's the essential step?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="rebuild"> تعيد بناء الموقع من الصفر بلغة تانية</label>
        <label><input type="radio" name="q4" value="dns"> تضيف سجلات DNS اللي Netlify بيديهالك في لوحة تحكم مسجّل الدومين</label>
        <label><input type="radio" name="q4" value="nothing"> مفيش أي خطوة، بيحصل أوتوماتيك تمامًا من غير أي إعداد</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ انشر مشروعك الكامل / Deploy Your Full Project</h3>
    <div class="ar">🇪🇬 اختار أكبر مشروع بنيته في المسار ده (زي تطبيق To-Do List الكامل بـ JavaScript، أو نسخة Vue بتاعته)، وانشره على Vercel بربط مستودع GitHub. اعمل تعديل بسيط في الكود (زي تغيير لون أو نص)، اعمل <code>git push</code>، وراقب لوحة تحكم Vercel وهي بتعيد النشر تلقائيًا خلال ثواني.</div>
    <div class="en">🇬🇧 Pick the largest project you built in this track (like the full vanilla JavaScript To-Do List, or its Vue version), and deploy it on Vercel by connecting a GitHub repo. Make a small code change (like a color or text tweak), <code>git push</code> it, and watch the Vercel dashboard automatically redeploy within seconds.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 وصلت لآخر مرحلة في مسار Front-End Developer الموسّع. من HTML الأول لغاية Vue، من Fetch API لإمكانية الوصول ولأدوات المطوّر، ولحد النشر النهائي — بنيت مسار كامل من الصفر للموقع الشغال والمنشور فعليًا على الإنترنت. الخطوة اللي بعد كده هي إنك تبني مشاريع أكبر وتكرر الدورة دي: اكتب، اختبر بـ DevTools، افحص إمكانية الوصول، وانشر.</div>
    <div class="en">🇬🇧 You've reached the final stage of the extended Front-End Developer track. From HTML at the start to Vue, from the Fetch API to accessibility and DevTools, to final deployment — you built a complete path from scratch to a real, publicly deployed working site. The next step is to build bigger projects and repeat this cycle: write, test with DevTools, audit for accessibility, and deploy.</div>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>موقع ثابت (Static Site) = ملفات HTML/CSS/JS جاهزة، من غير أي كود سيرفر — بالظبط مشروعاتك في المسار ده.</li>
        <li>نشر بالسحب والإفلات (Netlify Drop) = أسرع للتجربة. ربط مستودع GitHub = أفضل لمشروع هتستمر تحدّثه.</li>
        <li>مشروع HTML/CSS/JS عادي مش محتاج Build Command خالص — الملفات جاهزة كما هي.</li>
        <li>دومين مخصص = تشتريه من مسجّل، وتضيف سجلات DNS اللي المنصة بتديهالك. HTTPS بييجي مجاني أوتوماتيك.</li>
        <li>مبروك — وصلت لآخر مرحلة في مسار Front-End Developer الموسّع! 🎉</li>
    </ul>
</div>

<div class="nav-buttons">
    <a href="devtools-debugging.php">← المرحلة السابقة</a>
    <a href="../index.php">لوحة الدروس / Dashboard</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
