<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'flask';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'إطار العمل Flask';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">المرحلة 5 / Stage 5</span>
<h1>إطار العمل Flask <span class="ltr">The Flask Framework</span></h1>
<p class="subtitle">لو Django "بطاريات مضمّنة" جاهزة لكل حاجة، Flask عكسه تمامًا: مايكرو-فريموورك خفيف بيدّيك أساس بسيط جدًا وسيبك تختار كل حاجة تانية بنفسك. كل كود ونواتج الدرس ده اتنفذت فعليًا: <code>pip install flask</code>، تشغيل سيرفر حقيقي، وطلب صفحاته بـ <code>curl</code>.</p>

<div class="step-tracker">
    <a href="#read">📖 Read</a>
    <a href="#understand">🧠 Understand</a>
    <a href="#practice">💻 Practice</a>
    <a href="#quiz">🧠 Quiz</a>
    <a href="#challenge">🛠️ Challenge</a>
    <a href="#project">🚀 Project</a>
</div>

<h2 id="read">الهدف / Goal</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 تفهم فلسفة Flask "المايكرو-فريموورك" وإزاي تختلف عن Django، تكتب تطبيق Flask حقيقي من ملف واحد، وتشوفه بيرد على طلبات فعلية.</div>
    <div class="en">🇬🇧 Understand Flask's "micro-framework" philosophy and how it differs from Django, write a real single-file Flask app, and see it respond to real requests.</div>
</div>

<h2 id="understand">1) تثبيت Flask / Installing Flask</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 زي أي مكتبة Python، Flask بيتثبت بـ <code>pip</code>. بالمقارنة بـ Django، Flask مكتبة صغيرة جدًا — مفيش قاعدة بيانات ولا لوحة إدارة جاهزة، إنت اللي بتضيف بس اللي محتاجه.</div>
    <div class="en">🇬🇧 Like any Python library, Flask is installed with <code>pip</code>. Compared to Django, Flask is tiny — no built-in database or admin panel, you add only what you need.</div>
</div>

<pre><code>pip install flask</code></pre>
<h3>الناتج الفعلي (مُنفَّذ فعليًا) / Actual output (really executed)</h3>
<div class="output-box">Collecting flask
  Downloading flask-3.1.3-py3-none-any.whl.metadata (3.2 kB)
Collecting werkzeug&gt;=3.1.0 (from flask)
Collecting jinja2&gt;=3.1.2 (from flask)
Installing collected packages: markupsafe, itsdangerous, click, blinker, werkzeug, jinja2, flask

Successfully installed blinker-1.9.0 click-8.5.0 flask-3.1.3 itsdangerous-2.2.0 jinja2-3.1.6 markupsafe-3.0.3 werkzeug-3.1.8</div>

<h2>2) أبسط تطبيق Flask ممكن / The Simplest Possible Flask App</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 على عكس Django اللي بيحتاج مشروع كامل بهيكل مجلدات، تطبيق Flask ممكن يكون <b>ملف واحد بس</b>. <code>@app.route(...)</code> هو "Decorator" بيربط مسار (URL) بدالة بترجع الرد.</div>
    <div class="en">🇬🇧 Unlike Django which needs a full project folder structure, a Flask app can be <b>a single file</b>. <code>@app.route(...)</code> is a "Decorator" that connects a URL path to a function returning the response.</div>
</div>

<pre><code># flask_app.py
from flask import Flask

app = Flask(__name__)

@app.route("/")
def home():
    return "Hello from Flask!"

@app.route("/about")
def about():
    return "This is the about page."

if __name__ == "__main__":
    app.run(port=5099)</code></pre>

<div class="bi-block">
    <div class="ar">🇪🇬 دلوقتي نشغّل الملف ده فعليًا كسيرفر، ونطلب المسارين بـ <code>curl</code> — زي ما هتعمل بالظبط من المتصفح.</div>
    <div class="en">🇬🇧 Now we actually run this file as a server, and request both paths with <code>curl</code> — exactly like you would from a browser.</div>
</div>

<pre><code>python flask_app.py</code></pre>
<h3>الناتج الفعلي (طلبات curl حقيقية على سيرفر شغال) / Actual output (real curl requests against a running server)</h3>
<div class="output-box">$ curl http://127.0.0.1:5099/
Hello from Flask!

$ curl http://127.0.0.1:5099/about
This is the about page.</div>

<h2>3) Route Parameters وردود JSON</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 تقدر تاخد جزء من المسار كـ Parameter بوضعه بين <code>&lt;&gt;</code>، وترجع JSON مباشرة بـ <code>jsonify</code> — مفيد جدًا لبناء APIs.</div>
    <div class="en">🇬🇧 You can capture part of the path as a Parameter using <code>&lt;&gt;</code>, and return JSON directly with <code>jsonify</code> — very useful for building APIs.</div>
</div>

<pre><code>from flask import Flask, jsonify

app = Flask(__name__)

@app.route("/greet/&lt;name&gt;")
def greet(name):
    return jsonify({"message": f"Hello, {name}!"})</code></pre>
<h3>الناتج الفعلي (curl حقيقي على /greet/Waleed) / Actual output (real curl against /greet/Waleed)</h3>
<div class="output-box">$ curl http://127.0.0.1:5099/greet/Waleed
{"message":"Hello, Waleed!"}</div>

<h2 id="practice">💻 جرّب Route Function من غير سيرفر / Try a Route Function Without a Server</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 المحرر تحت مش بيعمل <code>app.run()</code> (ده بيحتاج يحجز Port فعلي، مش مناسب لمحرر مصغّر جوه صفحة). بدل كده، بيستخدم <code>app.test_request_context()</code> عشان "يوهم" Flask إن فيه طلب حقيقي جاي، وبعدين يستدعي دالة الـ Route <code>greet()</code> مباشرة زي ما بيحصل فعليًا لما حد يفتح <span class="ltr">/greet/Waleed</span>.</div>
    <div class="en">🇬🇧 The editor below doesn't call <code>app.run()</code> (that needs to bind an actual port, unsuitable for a mini in-page editor). Instead, it uses <code>app.test_request_context()</code> to make Flask believe a real request is happening, then calls the <code>greet()</code> route function directly — exactly what happens when someone visits <span class="ltr">/greet/Waleed</span>.</div>
</div>

<div class="mini-editor-wrap">
    <textarea spellcheck="false">from flask import Flask, jsonify

app = Flask(__name__)

@app.route("/greet/<name>")
def greet(name):
    return jsonify({"message": f"Hello, {name}!"})

# استدعاء الـ View function مباشرة (زي ما بيحصل لو حد عمل request لـ /greet/Waleed)
# لازم نكون جوه "application context" عشان jsonify يشتغل من غير سيرفر فعلي
with app.test_request_context():
    response = greet("Waleed")
    print(response.get_data(as_text=True))</textarea>
    <div class="mini-toolbar">
        <button class="mini-run-btn">▶ شغّل / Run</button>
        <span class="mini-status"></span>
    </div>
    <div class="output-box">— لسه متشغلش / not run yet —</div>
</div>

<h2>4) Django مقابل Flask / Django vs. Flask</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 مفيش "أفضل" مطلق — الاختيار بيعتمد على المشروع: Django مناسب لمشاريع كبيرة محتاجة قاعدة بيانات ولوحة إدارة وأمان جاهز من أول يوم. Flask مناسب لمشاريع صغيرة، APIs بسيطة، أو لما تحب تتحكم في كل تفصيلة بنفسك.</div>
    <div class="en">🇬🇧 There's no absolute "better" — it depends on the project: Django suits large projects needing a database, admin panel, and security ready from day one. Flask suits small projects, simple APIs, or when you want full control over every detail yourself.</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="route">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">إيه وظيفة <code>@app.route("/about")</code>؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What does <code>@app.route("/about")</code> do?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="import"> بيستورد مكتبة Flask</label>
        <label><input type="radio" name="q1" value="route"> بيربط مسار URL بالدالة اللي تحته</label>
        <label><input type="radio" name="q1" value="run"> بيشغّل السيرفر</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="flask">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">إمتى Flask يكون الاختيار الأنسب أكتر من Django؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">When is Flask usually a better fit than Django?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="flask"> مشروع صغير أو API بسيط عايز تتحكم في كل تفصيلة</label>
        <label><input type="radio" name="q2" value="django"> موقع كبير محتاج لوحة إدارة ومستخدمين من أول يوم</label>
        <label><input type="radio" name="q2" value="neither"> في كل الحالات من غير فرق</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ Route جديد بمنطق فعلي / A New Route With Real Logic</h3>
    <div class="ar">🇪🇬 في المحرر المصغّر فوق، زوّد Route جديدة اسمها <code>/square/&lt;int:n&gt;</code> ترجع JSON فيه مربع الرقم (استخدم <code>&lt;int:n&gt;</code> عشان Flask يحوّله لـ int أوتوماتيك). استدعيها بنفس أسلوب <code>test_request_context()</code> اللي شفته فوق بقيمة <code>n=7</code> واطبع الناتج.</div>
    <div class="en">🇬🇧 In the mini editor above, add a new route <code>/square/&lt;int:n&gt;</code> that returns JSON with the number's square (use <code>&lt;int:n&gt;</code> so Flask converts it to an int automatically). Call it the same way you saw with <code>test_request_context()</code> using <code>n=7</code> and print the result.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 دلوقتي شفت Django (بطاريات مضمّنة) وFlask (خفيف ومرن) — فكّر في فكرة بسيطة تحب تبنيها (زي API لقائمة مهام)، وحدد: هل هي أقرب لمشروع Django (محتاجة مستخدمين وقاعدة بيانات معقدة) ولا Flask (API صغير مركّز)؟ القرار ده بالظبط اللي هتاخده في أي مشروع حقيقي بعد كده.</div>
    <div class="en">🇬🇧 You've now seen Django (batteries-included) and Flask (light and flexible) — think of a simple idea you'd like to build (like a to-do list API), and decide: is it closer to a Django project (needs users and a complex database) or a Flask one (a small, focused API)? That's exactly the decision you'll make on any real project going forward.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>Flask = مايكرو-فريموورك خفيف، ممكن يكون تطبيق كامل في ملف واحد.</li>
        <li><code>@app.route(...)</code> بيربط مسار (URL) بدالة بترجع الرد.</li>
        <li><code>&lt;name&gt;</code> في المسار بيتحول لـ Parameter تستقبله الدالة.</li>
        <li><code>jsonify()</code> بيرجع رد JSON جاهز — مفيد لبناء APIs.</li>
        <li>Django لمشاريع كبيرة جاهزة من أول يوم، Flask لمرونة وتحكم أكبر في مشاريع أصغر.</li>
    </ul>
</div>

<div class="exercise-box">
    <h3>✍️ تمرين عملي / Hands-on Exercise</h3>
    <div class="ar">🇪🇬 على جهازك: اعمل <code>pip install flask</code>، واكتب ملف <code>app.py</code> فيه مسارين: <code>/</code> يرجع ترحيب، و<code>/square/&lt;int:n&gt;</code> يرجع JSON فيه مربع الرقم <code>n</code> (استخدم <code>&lt;int:n&gt;</code> عشان Flask يحوّله لـ <code>int</code> أوتوماتيك). شغّل <code>python app.py</code> وجرّب المسارين من المتصفح.</div>
    <div class="en">🇬🇧 On your machine: run <code>pip install flask</code>, and write an <code>app.py</code> with two routes: <code>/</code> returning a greeting, and <code>/square/&lt;int:n&gt;</code> returning JSON with the square of <code>n</code> (use <code>&lt;int:n&gt;</code> so Flask converts it to an <code>int</code> automatically). Run <code>python app.py</code> and try both routes from your browser.</div>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="django.php">← المرحلة السابقة</a>
    <a href="other-paths.php">المرحلة الجاية / Next: A Look at Other Python Paths →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
