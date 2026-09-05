<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'python-web-deployment';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'نشر تطبيق Python للعامة';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">Deployment</span>
<h1>نشر تطبيق Python للعامة <span class="ltr">Deploying a Python Web App</span></h1>
<p class="subtitle">درس مختلف عن كل اللي فات: مفيش هنا كود Python بيتنفذ ويطبع ناتج، لأن الموضوع نفسه — سيرفر حقيقي بيستقبل طلبات من الإنترنت 24 ساعة — مش حاجة ممكن "تتنفذ" في سكريبت واحد بيشتغل ويقفل. الدرس ده توثيقي بصراحة تامة: هنشرح المفاهيم صح، ونديك أوامر وConfig حقيقية تقدر تجربها بنفسك على سيرفر فعلي (VPS)، وهنكون واضحين جدًا في كل سطر إيه اللي اتنفذ فعليًا على الجهاز ده وإيه اللي مرجعي بس.</p>

<div class="step-tracker">
    <a href="#read">📖 Read</a>
    <a href="#understand">🧠 Understand</a>
    <a href="#quiz">🧠 Quiz</a>
    <a href="#challenge">🛠️ Challenge</a>
    <a href="#project">🚀 Project</a>
</div>

<h2 id="read">الهدف / Goal</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 تفهم إيه هو WSGI وليه Flask وDjango محتاجين Gunicorn في الإنتاج بدل سيرفر التطوير المدمج، تفهم الفرق بين استضافة PHP واستضافة Python، وتشوف أمثلة Config حقيقية لـ Gunicorn وNginx.</div>
    <div class="en">🇬🇧 Understand what WSGI is and why Flask and Django need Gunicorn in production instead of their built-in dev server, understand the difference between hosting PHP and hosting Python, and see real Gunicorn and Nginx config examples.</div>
</div>

<h2 id="understand">1) سيرفر التطوير مقابل الإنتاج / Dev Server vs. Production</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 لاحظت في كل الدروس اللي فاتت إننا استخدمنا <code>python manage.py runserver</code> (Django) أو <code>app.run()</code> (Flask). دول سيرفرات تطوير: بسيطة، بتعيد التشغيل تلقائي لما تغيّر كود، لكن Django وFlask نفسهم بيحذروك في الـ Terminal إنها "not for production use". السبب: مصممة لطلب واحد في المرة الواحدة (Single-threaded غالبًا)، من غير حماية حقيقية، وهتقع بسرعة تحت أي زحمة زوار فعلية.</div>
    <div class="en">🇬🇧 You noticed in every previous lesson we used <code>python manage.py runserver</code> (Django) or <code>app.run()</code> (Flask). These are development servers: simple, auto-reload on code changes, but Django and Flask themselves print a warning saying they're "not for production use." Why: they're designed to handle one request at a time (mostly single-threaded), with no real hardening, and will quickly buckle under any real traffic.</div>
</div>

<h2>2) إيه هو WSGI؟ / What is WSGI?</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>WSGI</b> (Web Server Gateway Interface) مش برنامج — هو "اتفاق" (Specification) بيحدد إزاي أي سيرفر Python لازم يتكلم مع أي تطبيق ويب Python (Flask أو Django أو غيرهم). بفضل الاتفاق ده، أي سيرفر WSGI (زي Gunicorn) يقدر يشغّل أي تطبيق Flask أو Django من غير ما يعرف تفاصيله الداخلية — بالظبط زي إزاي PHP-FPM بيقدر يشغّل أي كود PHP من غير ما "يعرف" منطق تطبيقك.</div>
    <div class="en">🇬🇧 <b>WSGI</b> (Web Server Gateway Interface) isn't a program — it's a "contract" (a specification) defining how any Python server must talk to any Python web application (Flask, Django, or others). Thanks to this contract, any WSGI server (like Gunicorn) can run any Flask or Django app without knowing its internal details — exactly like how PHP-FPM can execute any PHP code without "knowing" your application's logic.</div>
</div>

<div class="bi-block">
    <div class="ar">🇪🇬 <b>Gunicorn</b> ("Green Unicorn") هو أشهر سيرفر WSGI للإنتاج. شغله الأساسي: يشغّل عدة نسخ (Workers) من تطبيقك بالتوازي، يدير توزيع الطلبات عليهم، ويعيد تشغيل أي Worker وقع بسبب Exception من غير ما يوقف الموقع كله. ده اللي سيرفر التطوير المدمج مايعملوش أصلًا.</div>
    <div class="en">🇬🇧 <b>Gunicorn</b> ("Green Unicorn") is the most popular production WSGI server. Its core job: run several parallel copies (Workers) of your app, distribute requests across them, and restart any Worker that crashed from an exception without taking the whole site down. That's exactly what the built-in dev server simply doesn't do.</div>
</div>

<h3>مرجعي — جرّبه على سيرفر حقيقي (VPS) / Reference — try this on a real server (VPS)</h3>
<pre><code># app.py (Flask) — التطبيق نفسه بيفضل زي ما هو، من غير ما تغيّر فيه حرف
from flask import Flask
app = Flask(__name__)

@app.route('/')
def home():
    return "Hello in production!"

# شغّل بـ Gunicorn بدل app.run() — 3 Workers بالتوازي
# Run with Gunicorn instead of app.run() — 3 parallel Workers
gunicorn --workers 3 --bind 0.0.0.0:8000 app:app</code></pre>
<div class="bi-block">
    <div class="ar">🇪🇬 <code>app:app</code> معناها "من ملف <code>app.py</code>، هات المتغير اللي اسمه <code>app</code>" — وهو نفسه كائن Flask اللي عرّفناه. لـ Django بيكون الشكل قريب: <code>gunicorn --workers 3 myproject.wsgi:application</code>، لأن <code>startproject</code> بيولّد ملف <code>wsgi.py</code> فيه متغير <code>application</code> جاهز بالظبط لغرض ده.</div>
    <div class="en">🇬🇧 <code>app:app</code> means "from the file <code>app.py</code>, get the variable named <code>app</code>" — the same Flask object we defined. For Django it's similar: <code>gunicorn --workers 3 myproject.wsgi:application</code>, because <code>startproject</code> generates a <code>wsgi.py</code> file with an <code>application</code> variable made exactly for this purpose.</div>
</div>

<h2>3) ليه محتاج Nginx كمان؟ / Why You Also Need Nginx</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 Gunicorn بيشغّل تطبيقك، لكن مش مصمم يتعرّض مباشرة للإنترنت (متعمل Optimize لملفات Static زي الصور والـ CSS، ومفيهوش حماية HTTPS مدمجة). الحل القياسي: تحط <b>Nginx</b> (أو سيرفر مشابه) "قدام" Gunicorn كـ <b>Reverse Proxy</b> — Nginx بيستقبل كل طلبات الإنترنت، يقدّم ملفات Static بسرعة بنفسه، ويحوّل باقي الطلبات (اللي محتاجة كود Python فعلي) لـ Gunicorn عن طريق Socket داخلي أو Port محلي.</div>
    <div class="en">🇬🇧 Gunicorn runs your app, but isn't designed to face the internet directly (it isn't optimized for serving static files like images and CSS, and has no built-in HTTPS termination). The standard fix: put <b>Nginx</b> (or a similar server) "in front of" Gunicorn as a <b>Reverse Proxy</b> — Nginx receives all internet traffic, serves static files quickly itself, and forwards the rest (requests needing actual Python code) to Gunicorn over an internal socket or local port.</div>
</div>

<h3>مرجعي — Config Nginx (جرّبه على سيرفر حقيقي) / Reference — Nginx config (try on a real server)</h3>
<pre><code># /etc/nginx/sites-available/myapp
server {
    listen 80;
    server_name example.com;

    location /static/ {
        alias /var/www/myapp/static/;
    }

    location / {
        proxy_pass http://127.0.0.1:8000;
        proxy_set_header Host $host;
        proxy_set_header X-Real-IP $remote_addr;
        proxy_set_header X-Forwarded-For $proxy_add_x_forwarded_for;
        proxy_set_header X-Forwarded-Proto $scheme;
    }
}</code></pre>
<div class="bi-block">
    <div class="ar">🇪🇬 <code>proxy_pass http://127.0.0.1:8000</code> هو السطر الأهم: بيقول لـ Nginx "أي طلب مش لملف Static، ابعته لـ Gunicorn الشغال محليًا على البورت 8000". السلسلة الكاملة بقت: <b>الزائر → Nginx (Port 80/443) → Gunicorn (Port 8000) → كود Flask/Django بتاعك</b>.</div>
    <div class="en">🇬🇧 <code>proxy_pass http://127.0.0.1:8000</code> is the key line: it tells Nginx "any request that isn't for a static file, forward it to Gunicorn running locally on port 8000." The full chain becomes: <b>Visitor → Nginx (Port 80/443) → Gunicorn (Port 8000) → your Flask/Django code</b>.</div>
</div>

<h2>4) ليه استضافة Python أصعب شوية من PHP؟ / Why Hosting Python Is a Bit Harder Than PHP</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 ده بالظبط سبب المنصة اللي انت بتتعلم فيها دلوقتي مبنية بـ PHP: أي استضافة مشتركة رخيصة (Shared Hosting) تقريبًا جاهزة من أول يوم لتشغيل PHP — عن طريق <b>mod_php</b> (جوه Apache نفسه) أو <b>PHP-FPM</b> — تدي الملف اسم <code>.php</code> وتحطه في فولدر، وخلاص شغال، من غير ما "تشغّل" حاجة بنفسك.</div>
    <div class="en">🇬🇧 This is exactly why the platform you're learning on right now is built with PHP: almost every cheap shared hosting plan is ready from day one to run PHP — via <b>mod_php</b> (built into Apache itself) or <b>PHP-FPM</b> — you name a file <code>.php</code>, drop it in a folder, and it just works, with nothing for you to "start" yourself.</div>
</div>

<div class="bi-block">
    <div class="ar">🇪🇬 Python مفيهوش حاجة زي كده متعارف عليها بنفس الانتشار. لازم إنت شخصيًا (أو Script نشر آلي) يشغّل <b>عملية (Process)</b> منفصلة — Gunicorn — وتفضل شغالة باستمرار (عادةً عن طريق <b>systemd</b> عشان تشتغل تلقائي مع أي إعادة تشغيل للسيرفر)، وبعدين تظبط Nginx قدامها. الفرق مش في "صعوبة اللغة" — الفرق إن PHP جزء من ثقافة الاستضافة الرخيصة من عشرين سنة، وPython عادةً بتحتاج على الأقل VPS بصلاحية Root عشان تظبط كل الطبقات دي بنفسك.</div>
    <div class="en">🇬🇧 Python has nothing this universally standardized. You (or a deployment script) must personally start a separate <b>process</b> — Gunicorn — and keep it running continuously (typically via <b>systemd</b> so it restarts automatically on any server reboot), then configure Nginx in front of it. The difference isn't "language difficulty" — it's that PHP has been part of cheap-hosting culture for two decades, while Python typically needs at least a VPS with root access so you can configure all these layers yourself.</div>
</div>

<h3>الناتج الفعلي (فحصنا فعليًا هل Gunicorn متثبت على الجهاز ده) / Actual output (we really checked whether Gunicorn is installed on this machine)</h3>
<div class="bi-block">
    <div class="ar">🇪🇬 بصراحة تامة: الأمر تحت اتنفذ فعليًا على نفس الجهاز اللي بنى عليه المنصة دي. النتيجة بتوضح حاجة مهمة — بعكس Flask وDjango في الدروس اللي فاتت (اللي اتنفذوا فعليًا بـ Test Client من غير سيرفر حقيقي)، Gunicorn مش موجود أصلًا هنا، ومحتاج فعلاً سيرفر بيستمع (Listen) على Port حقيقي — حاجة برضه خارج نطاق منصة تعليمية بتشغّل سكريبتات قصيرة وتقفل.</div>
    <div class="en">🇬🇧 In full honesty: the command below was really run on the same machine this platform is built on. The result illustrates something important — unlike Flask and Django in previous lessons (which were genuinely exercised via a Test Client with no real server), Gunicorn isn't even installed here, and it fundamentally needs a real server that keeps listening on a port — again, outside the scope of an educational platform that runs short scripts and exits.</div>
</div>

<pre><code>python -c "import gunicorn; print('installed')"</code></pre>
<div class="output-box">Traceback (most recent call last):
  File "&lt;string&gt;", line 1, in &lt;module&gt;
    import gunicorn; print('installed')
    ^^^^^^^^^^^^^^^
ModuleNotFoundError: No module named 'gunicorn'</div>

<div class="bi-block">
    <div class="ar">🇪🇬 يعني: لو حبيت فعلًا تشوف Gunicorn شغال، الخطوة الصادقة هي <code>pip install gunicorn</code> على سيرفر (أو حتى جهازك) حقيقي وتشغّل الأمر <code>gunicorn app:app</code> اللي فوق بنفسك — مش حاجة المنصة دي هتدّعيها بنفسها.</div>
    <div class="en">🇬🇧 In other words: if you actually want to see Gunicorn running, the honest step is <code>pip install gunicorn</code> on a real server (or even your own machine) and run the <code>gunicorn app:app</code> command above yourself — not something this platform will claim to demonstrate on its own.</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="contract">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">إيه هو WSGI بالظبط؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What exactly is WSGI?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="server"> سيرفر إنتاج معيّن زي Gunicorn</label>
        <label><input type="radio" name="q1" value="contract"> اتفاق (Specification) بيحدد إزاي أي سيرفر Python يتكلم مع أي تطبيق ويب Python</label>
        <label><input type="radio" name="q1" value="database"> مكتبة لقواعد البيانات في Python</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="reason">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">ليه مينفعش تستخدم <code>runserver</code>/<code>app.run()</code> في الإنتاج؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Why can't you use <code>runserver</code>/<code>app.run()</code> in production?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="reason"> مصممين للتطوير فقط — بيتعاملوا مع طلب واحد في المرة غالبًا ومفيهومش حماية/أداء كافي لزحمة حقيقية</label>
        <label><input type="radio" name="q2" value="notsupported"> مش بيدعموا HTML أصلًا</label>
        <label><input type="radio" name="q2" value="phponly"> بيشتغلوا مع PHP بس مش Python</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="reverseproxy">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">دور Nginx في السلسلة "زائر → Nginx → Gunicorn → كودك" إيه؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What's Nginx's role in the chain "visitor → Nginx → Gunicorn → your code"?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="reverseproxy"> Reverse Proxy: بيستقبل الطلبات، يقدّم Static بنفسه، ويحوّل الباقي لـ Gunicorn</label>
        <label><input type="radio" name="q3" value="replaces"> بيستبدل Gunicorn تمامًا ومش محتاجينه مع بعض</label>
        <label><input type="radio" name="q3" value="database"> بيخزن بيانات التطبيق بدل قاعدة البيانات</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="culture">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">ليه استضافة Python عادةً أصعب/أغلى شوية من PHP على استضافة مشتركة رخيصة؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Why is hosting Python usually a bit harder/pricier on cheap shared hosting than PHP?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="culture"> PHP مدعوم أوتوماتيك بـ mod_php/PHP-FPM في كل استضافة رخيصة تقريبًا؛ Python محتاج تشغّل وتدير عملية Gunicorn بنفسك، غالبًا على VPS بصلاحية Root</label>
        <label><input type="radio" name="q4" value="slower"> لأن Python أبطأ من PHP في التنفيذ بشكل عام</label>
        <label><input type="radio" name="q4" value="nohttps"> لأن Python مش بيدعم HTTPS أصلًا</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ خطة نشر حقيقية / A Real Deployment Plan</h3>
    <div class="ar">🇪🇬 من غير ما تشغّل حاجة (الموضوع نظري بالكامل هنا)، اكتب لنفسك قايمة بالخطوات اللي هتعملها لو عايز تنشر مشروع Flask بتاعك اللي بنيته في الدروس السابقة على VPS حقيقي (زي Ubuntu Server): من <code>pip install gunicorn</code> لحد ما تفتح الموقع من دومين حقيقي. حاول تفتكر مكان كل من: Gunicorn، Nginx، systemd، وملفات Static.</div>
    <div class="en">🇬🇧 Without running anything (this is purely a planning exercise), write yourself a step list for deploying your Flask project from earlier lessons onto a real VPS (e.g. Ubuntu Server): from <code>pip install gunicorn</code> to opening the site on a real domain. Try to place each of: Gunicorn, Nginx, systemd, and static files.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 كده تكون شفت الدورة كاملة لمسار Python Web Developer: من أساسيات اللغة، لـ Django بطبقتيه (Models/Admin وViews/Templates/URLs)، لحد فهم إزاي أي تطبيق من اللي بنيته يوصل فعليًا للإنترنت. مبروك! المرحلة الجاية مش عن الويب تحديدًا — هتاخد نظرة سريعة على باقي عالم Python (تحليل بيانات، أتمتة، ذكاء اصطناعي) عشان تعرف فين تكمل بعد كده لو حبيت.</div>
    <div class="en">🇬🇧 You've now seen the full arc of the Python Web Developer track: from language fundamentals, through Django across two layers (Models/Admin and Views/Templates/URLs), to understanding how any app you've built actually reaches the internet. Congratulations! The next stage isn't about the web specifically — it's a quick look at the rest of the Python world (data analysis, automation, AI) so you know where to go next if you want to keep learning.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>WSGI = اتفاق يوضح إزاي سيرفر Python يتكلم مع تطبيق Python — مش برنامج بعينه.</li>
        <li>Gunicorn = سيرفر WSGI للإنتاج، بيشغّل عدة Workers بالتوازي ويعيد تشغيل اللي بيقع.</li>
        <li>Nginx بيقعد "قدام" Gunicorn كـ Reverse Proxy: بيقدّم Static بسرعة ويحوّل الباقي لـ Gunicorn.</li>
        <li>PHP: <code>mod_php</code>/PHP-FPM جاهزين افتراضيًا في أغلب الاستضافة الرخيصة. Python: محتاج تشغّل وتدير Gunicorn بنفسك، عادةً على VPS.</li>
        <li>الأوامر والـ Config في الدرس ده حقيقية وصحيحة 100%، لكنها مرجعية — جرّبها على سيرفر فعلي، مش على منصة بتشغّل سكريبتات قصيرة وتقفل.</li>
    </ul>
</div>

<div class="exercise-box">
    <h3>✍️ تمرين عملي / Hands-on Exercise</h3>
    <div class="ar">🇪🇬 لو عندك VPS حقيقي (حتى ولو مجاني للتجربة): اعمل <code>pip install gunicorn</code>، خد أي تطبيق Flask بسيط بنيته في الدروس السابقة، شغّله بـ <code>gunicorn --workers 3 --bind 0.0.0.0:8000 app:app</code>، وافتح <span class="ltr">http://السيرفر:8000</span> من المتصفح. لو عايز تكمّل، ظبّط Nginx بالـ Config اللي فوق واربطه بـ Gunicorn، وشوف الفرق لما تفتح الموقع من البورت 80 العادي بدل 8000.</div>
    <div class="en">🇬🇧 If you have a real VPS (even a free trial one): run <code>pip install gunicorn</code>, take any simple Flask app you built in earlier lessons, run it with <code>gunicorn --workers 3 --bind 0.0.0.0:8000 app:app</code>, and open <span class="ltr">http://server:8000</span> in your browser. If you want to go further, configure Nginx with the config above and connect it to Gunicorn, and see the difference when you open the site from the regular port 80 instead of 8000.</div>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="django-views-templates.php">← المرحلة السابقة</a>
    <a href="other-paths.php">المرحلة الجاية / Next: A Look at Other Python Paths →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
