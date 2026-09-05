<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'flask-routing-templates';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'Flask: Routing وTemplates وForms';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">Flask</span>
<h1>Flask: Routing وTemplates وForms <span class="ltr">Flask: Routing, Templates &amp; Forms</span></h1>
<p class="subtitle">في درس <a href="flask.php">إطار العمل Flask</a> شفت مسارات بسيطة بترجع نص أو JSON. هنا هنتعمق أكتر: Route بمعامل حقيقي، صفحة HTML كاملة بـ Jinja2 فيها متغيرات و<code>if</code> و<code>for</code>، واستقبال فورم بـ <code>POST</code> — كل ده متنفذ فعليًا بـ <code>app.test_client()</code>.</p>

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
    <div class="ar">🇪🇬 تكتب Routes حقيقية فيها Parameters من الـ URL، ترندر صفحة HTML بـ Jinja2 (متغيرات، شرط، وحلقة تكرار)، وتستقبل بيانات فورم حقيقية بـ <code>POST</code> — وتشوف كل ده شغال فعليًا عن طريق <code>app.test_client()</code> بدل ما تشغّل سيرفر حقيقي.</div>
    <div class="en">🇬🇧 Write real Routes with URL Parameters, render an HTML page with Jinja2 (variables, a condition, and a loop), and receive real form data via <code>POST</code> — and see all of it actually working through <code>app.test_client()</code> instead of running a real server.</div>
</div>

<h2 id="understand">1) Route Parameter حقيقي / A Real Route Parameter</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 لما تحط جزء من المسار بين <code>&lt;&gt;</code> زي <code>&lt;name&gt;</code>، Flask بيستقطعه من الـ URL ويبعته كـ Argument للدالة تحته مباشرة — من غير ما تحتاج تفكّكه يدويًا. وعشان نجرّب Routes من غير سيرفر شغال فعليًا على Port، هنستخدم <code>app.test_client()</code>: بيبني كائن يقدر يبعت طلبات حقيقية (<code>GET</code>، <code>POST</code>، ...) لتطبيق Flask ويرجّعلك رد حقيقي بالظبط زي متصفح أو <code>curl</code>.</div>
    <div class="en">🇬🇧 When you put part of the path between <code>&lt;&gt;</code> like <code>&lt;name&gt;</code>, Flask extracts it from the URL and passes it as an argument straight to the function below it — no manual parsing needed. And to try Routes without actually binding a server to a Port, we use <code>app.test_client()</code>: it builds an object that can send real requests (<code>GET</code>, <code>POST</code>, ...) to a Flask app and gives back a real response, exactly like a browser or <code>curl</code> would.</div>
</div>

<pre><code>from flask import Flask, render_template_string

app = Flask(__name__)

@app.route("/")
def home():
    return "Welcome to Sila Flask!"

@app.route("/user/&lt;name&gt;")
def user_profile(name):
    return f"Profile page for: {name}"

client = app.test_client()

r1 = client.get("/")
print(r1.status_code, r1.get_data(as_text=True))

r2 = client.get("/user/Waleed")
print(r2.status_code, r2.get_data(as_text=True))</code></pre>
<h3>الناتج الفعلي (مُنفَّذ فعليًا بـ test_client) / Actual output (really run via test_client)</h3>
<div class="output-box">200 Welcome to Sila Flask!
200 Profile page for: Waleed</div>

<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ إن الرد رقمين: كود الحالة (<code>200</code> = "تم بنجاح") ونص الرد. ده بالظبط اللي هيحصل لو فتحت المسارين دول من متصفحك على تطبيق شغّال فعليًا.</div>
    <div class="en">🇬🇧 Notice the response has two parts: the status code (<code>200</code> = "OK") and the response text. This is exactly what would happen if you opened both paths in your browser against a running app.</div>
</div>

<h2>2) قوالب Jinja2: متغيرات، وشرط، وحلقة / Jinja2 Templates: Variables, a Condition, and a Loop</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <code>render_template_string()</code> بتاخد نص HTML فيه صياغة Jinja2 وترجعه بعد ما تستبدل المتغيرات وتنفّذ المنطق جواه. <code>{{ متغير }}</code> بتطبع قيمة، <code>{% if %}...{% endif %}</code> بتعمل شرط، و<code>{% for %}...{% endfor %}</code> بتعمل حلقة — كلهم بنفس صياغة الأقواس المعقوصة المزدوجة أو الفاصلة-النسبة المئوية. (في مشروع حقيقي هتحط الـ HTML ده في ملف منفصل جوه مجلد <code>templates/</code> وتستخدم <code>render_template()</code> بدل <code>render_template_string()</code> — هنا بنستخدم النسخة اللي بتاخد نص مباشر عشان كل حاجة تفضل في ملف واحد نقدر ننفذه.)</div>
    <div class="en">🇬🇧 <code>render_template_string()</code> takes an HTML string with Jinja2 syntax and returns it after substituting variables and running the logic inside it. <code>{{ variable }}</code> prints a value, <code>{% if %}...{% endif %}</code> makes a condition, and <code>{% for %}...{% endfor %}</code> makes a loop — all with the same double-curly-brace / curly-percent syntax. (In a real project you'd put this HTML in a separate file under a <code>templates/</code> folder and use <code>render_template()</code> instead of <code>render_template_string()</code> — here we use the string version so everything stays runnable from one file.)</div>
</div>

<pre><code>from flask import Flask, render_template_string

app = Flask(__name__)

PAGE = """
&lt;h1&gt;Hello, {{ name }}!&lt;/h1&gt;
&lt;p&gt;You are {{ age }} years old.&lt;/p&gt;
{% if age &gt;= 18 %}
&lt;p&gt;Status: Adult&lt;/p&gt;
{% else %}
&lt;p&gt;Status: Minor&lt;/p&gt;
{% endif %}
&lt;ul&gt;
{% for course in courses %}
&lt;li&gt;{{ loop.index }}) {{ course }}&lt;/li&gt;
{% endfor %}
&lt;/ul&gt;
"""

@app.route("/profile/&lt;name&gt;")
def profile(name):
    return render_template_string(
        PAGE, name=name, age=25, courses=["Python", "Flask", "SQLAlchemy"]
    )

client = app.test_client()
r = client.get("/profile/Waleed")
print(r.status_code)
print(r.get_data(as_text=True))</code></pre>
<h3>الناتج الفعلي (HTML حقيقي راجع من Jinja2) / Actual output (real HTML returned by Jinja2)</h3>
<div class="output-box">200

&lt;h1&gt;Hello, Waleed!&lt;/h1&gt;
&lt;p&gt;You are 25 years old.&lt;/p&gt;

&lt;p&gt;Status: Adult&lt;/p&gt;

&lt;ul&gt;

&lt;li&gt;1) Python&lt;/li&gt;

&lt;li&gt;2) Flask&lt;/li&gt;

&lt;li&gt;3) SQLAlchemy&lt;/li&gt;

&lt;/ul&gt;</div>

<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ <code>loop.index</code> — متغير جاهز جوه أي <code>{% for %}</code> بيديك ترتيب العنصر بادئًا من 1، من غير ما تحتاج <code>enumerate()</code> يدويًا زي Python العادي.</div>
    <div class="en">🇬🇧 Notice <code>loop.index</code> — a built-in variable inside any <code>{% for %}</code> that gives you the item's position starting at 1, without needing a manual <code>enumerate()</code> like plain Python.</div>
</div>

<h2 id="practice">3) استقبال فورم بـ POST / Receiving a Form with POST</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 أي Route محتاجة تستقبل بيانات فورم لازم تحدد <code>methods=["POST"]</code> صراحة (Flask افتراضيًا بيقبل <code>GET</code> بس). القيم بتوصل عن طريق <code>request.form.get(...)</code>، ولو التحقق فشل بترجع <code>Tuple</code> فيه الرد وكود حالة HTTP مناسب.</div>
    <div class="en">🇬🇧 Any Route that needs to receive form data must explicitly set <code>methods=["POST"]</code> (Flask only accepts <code>GET</code> by default). Values arrive via <code>request.form.get(...)</code>, and if validation fails it returns a <code>Tuple</code> with the response and an appropriate HTTP status code.</div>
</div>

<pre><code>from flask import Flask, request, jsonify

app = Flask(__name__)

@app.route("/greet", methods=["POST"])
def greet():
    name = request.form.get("name", "").strip()
    if not name:
        return jsonify({"error": "name is required"}), 400
    return jsonify({"message": f"Hello, {name}! Welcome to Flask forms."})

client = app.test_client()

r1 = client.post("/greet", data={"name": "Sara"})
print(r1.status_code, r1.get_data(as_text=True))

r2 = client.post("/greet", data={"name": ""})
print(r2.status_code, r2.get_data(as_text=True))</code></pre>
<h3>الناتج الفعلي (POST حقيقي بـ test_client) / Actual output (real POST via test_client)</h3>
<div class="output-box">200 {"message":"Hello, Sara! Welcome to Flask forms."}

400 {"error":"name is required"}</div>

<div class="bi-block">
    <div class="ar">🇪🇬 جرّب دلوقتي في المحرر المصغّر تحت — الكود بيعمل Route لعرض قايمة تسوّق بـ Jinja2 (فيه <code>{% for %}</code> و<code>{% if %}</code>)، وRoute تانية بـ <code>POST</code> بتستقبل عنصر جديد. شغّله وشوف الناتج الحقيقي:</div>
    <div class="en">🇬🇧 Try it now in the mini editor below — the code has a Route rendering a shopping list with Jinja2 (using <code>{% for %}</code> and <code>{% if %}</code>), and a second <code>POST</code> Route receiving a new item. Run it and see the real output:</div>
</div>

<div class="mini-editor-wrap">
    <textarea spellcheck="false">from flask import Flask, render_template_string, request

app = Flask(__name__)

PAGE = """
<h2>Shopping List</h2>
<ul>
{% for item in items %}
<li>{{ loop.index }}. {{ item }}</li>
{% endfor %}
</ul>
{% if items|length == 0 %}
<p>The list is empty.</p>
{% endif %}
"""

@app.route("/list")
def show_list():
    return render_template_string(PAGE, items=["Milk", "Eggs", "Bread"])

@app.route("/list/add", methods=["POST"])
def add_item():
    item = request.form.get("item", "")
    return f"Added: {item}"

client = app.test_client()

r1 = client.get("/list")
print(r1.status_code)
print(r1.get_data(as_text=True))

r2 = client.post("/list/add", data={"item": "Cheese"})
print(r2.status_code, r2.get_data(as_text=True))</textarea>
    <div class="mini-toolbar">
        <button class="mini-run-btn">▶ شغّل / Run</button>
        <span class="mini-status"></span>
    </div>
    <div class="output-box">— لسه متشغلش / not run yet —</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="testclient">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">إيه وظيفة <code>app.test_client()</code>؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What does <code>app.test_client()</code> do?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="deploy"> بينشر التطبيق على الإنترنت</label>
        <label><input type="radio" name="q1" value="testclient"> بيبني كائن يقدر يبعت طلبات حقيقية للتطبيق ويرجع ردود حقيقية من غير سيرفر فعلي على Port</label>
        <label><input type="radio" name="q1" value="db"> بيتصل بقاعدة البيانات</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="loopindex">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">جوه <code>{% for course in courses %}</code>، إيه اللي بيديك ترتيب العنصر بادئًا من 1؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Inside <code>{% for course in courses %}</code>, what gives you the item's position starting at 1?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="courseindex"> <code>course.index</code></label>
        <label><input type="radio" name="q2" value="loopindex"> <code>loop.index</code></label>
        <label><input type="radio" name="q2" value="enumerate"> لازم <code>enumerate()</code> يدوي زي Python العادي</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="methods">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">عايز Route تستقبل بيانات فورم بـ <code>POST</code>. إيه اللي لازم تحدده في <code>@app.route(...)</code>؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">You want a Route to receive form data via <code>POST</code>. What must you specify in <code>@app.route(...)</code>?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="nothing"> مفيش حاجة، Flask بيقبل POST تلقائيًا</label>
        <label><input type="radio" name="q3" value="methods"> <code>methods=["POST"]</code> صراحة</label>
        <label><input type="radio" name="q3" value="form"> <code>form=True</code></label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="stringfile">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">إيه الفرق العملي بين <code>render_template_string()</code> و<code>render_template()</code>؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What's the practical difference between <code>render_template_string()</code> and <code>render_template()</code>?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="samething"> مفيش فرق، نفس الحاجة بالظبط</label>
        <label><input type="radio" name="q4" value="stringfile"> الأولى بتاخد HTML كنص Python مباشر، والتانية بتقرأ ملف من مجلد <code>templates/</code></label>
        <label><input type="radio" name="q4" value="speed"> الأولى أسرع في الإنتاج (Production)</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ فورم تسجيل بتحقق حقيقي / A Signup Form With Real Validation</h3>
    <div class="ar">🇪🇬 في المحرر المصغّر فوق، زوّد Route اسمها <code>/signup</code> بـ <code>methods=["POST"]</code> تستقبل <code>email</code> و<code>age</code> من <code>request.form</code>. لو الإيميل مفيهوش <code>@</code> أو العمر أقل من 13، رجّع <code>(jsonify({"error": ...}), 400)</code>. جرّبها بـ <code>client.post("/signup", data={...})</code> مرة ببيانات صحيحة ومرة ببيانات غلط، واطبع الناتجين.</div>
    <div class="en">🇬🇧 In the mini editor above, add a Route called <code>/signup</code> with <code>methods=["POST"]</code> that reads <code>email</code> and <code>age</code> from <code>request.form</code>. If the email lacks an <code>@</code> or the age is under 13, return <code>(jsonify({"error": ...}), 400)</code>. Test it with <code>client.post("/signup", data={...})</code> once with valid data and once with invalid data, printing both results.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 دلوقتي عندك Routes بتستقبل بيانات وترجع صفحات حقيقية — بس كل بياناتنا لسه في الذاكرة بس (الـ <code>courses</code>، الـ <code>items</code>) وبتختفي أول ما السكريبت يخلص. الدرس الجاي، <a href="flask-database-sqlalchemy.php">Flask: قاعدة بيانات بـ SQLAlchemy</a>، هيوريك إزاي تخزن نفس البيانات دي في قاعدة بيانات حقيقية وترجعها تاني وقت ما تحب.</div>
    <div class="en">🇬🇧 You now have Routes that receive data and return real pages — but all our data still lives only in memory (the <code>courses</code>, the <code>items</code>) and disappears the moment the script ends. Next up, <a href="flask-database-sqlalchemy.php">Flask: Database with SQLAlchemy</a>, shows you how to store that same data in a real database and get it back whenever you want.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li><code>&lt;name&gt;</code> في المسار بيوصل كـ Argument مباشر للدالة تحت الـ Route.</li>
        <li><code>app.test_client()</code> بيبني كائن يبعت طلبات <code>GET</code>/<code>POST</code> حقيقية من غير سيرفر فعلي على Port.</li>
        <li><code>render_template_string()</code> بترندر HTML فيه صياغة Jinja2: <code>{{ متغير }}</code>، <code>{% if %}</code>، <code>{% for %}</code>.</li>
        <li><code>loop.index</code> بيديك ترتيب العنصر جوه أي <code>{% for %}</code> بادئًا من 1.</li>
        <li>أي Route بتستقبل فورم لازم <code>methods=["POST"]</code>، والقيم بتوصل بـ <code>request.form.get(...)</code>.</li>
        <li>الرفض بيرجع <code>Tuple</code> فيه الرد وكود حالة HTTP (زي <code>400</code>) عشان أي Front-End يفرّق بين النجاح والفشل.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="flask.php">← المرحلة السابقة</a>
    <a href="flask-database-sqlalchemy.php">المرحلة الجاية / Next: Database with SQLAlchemy →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
