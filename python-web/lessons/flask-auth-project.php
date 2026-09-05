<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'flask-auth-project';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = '🚀 مشروع: نظام تسجيل دخول بـ Flask';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">Flask</span>
<h1>🚀 مشروع: نظام تسجيل دخول بـ Flask <span class="ltr">🚀 Project: A Flask Authentication System</span></h1>
<p class="subtitle">دلوقتي عندك Route فعلية بتستقبل بيانات، وModel حقيقي متخزّن في قاعدة بيانات. الدرس ده بيجمّعهم في مشروع كامل: نظام تسجيل حساب، تسجيل دخول، وتسجيل خروج حقيقي — بتشفير كلمة مرور فعلي بـ <code>werkzeug.security</code> (نفس المكتبة اللي Flask نفسه بيستخدمها)، وSession فعلية بتحدد مين مسجّل دخول دلوقتي.</p>

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
    <div class="ar">🇪🇬 تبني Model اسمه <code>User</code>، تخزّن كلمة المرور مشفّرة أبدًا مش كنص عادي بـ <code>generate_password_hash</code>/<code>check_password_hash</code>، تستخدم <code>session</code> عشان تحدد مين مسجّل دخول، وتحمي Route معينة (<code>/dashboard</code>) بحيث ميوصلهاش غير مستخدم مسجّل دخول فعلاً — كل ده متنفذ فعليًا خطوة بخطوة بـ <code>test_client</code> واحد بيحافظ على نفس الـ Session بين الطلبات (بالظبط زي متصفح حقيقي بيحتفظ بالـ Cookies).</div>
    <div class="en">🇬🇧 Build a <code>User</code> Model, store the password hashed — never as plain text — using <code>generate_password_hash</code>/<code>check_password_hash</code>, use <code>session</code> to track who's logged in, and protect a specific Route (<code>/dashboard</code>) so only a logged-in user can reach it — all actually run step-by-step with one <code>test_client</code> that keeps the same Session across requests (exactly like a real browser keeping its Cookies).</div>
</div>

<h2 id="understand">1) لماذا لا نخزّن كلمة المرور كما هي؟ / Why Never Store the Password As-Is?</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 لو قاعدة البيانات اتسرقت يومًا، وكانت كلمات المرور مخزّنة كنص عادي، كل حساباتك (وأي حساب تاني للمستخدم بنفس كلمة المرور) بيبقى مكشوف فورًا. الحل: تخزّن <b>Hash</b> — تحويل رياضي في اتجاه واحد بس (مينفعش تعكسه) لكلمة المرور. <code>werkzeug.security.generate_password_hash</code> (اللي Flask نفسه بيعتمد عليها) بتعمل الـ Hash ده، و<code>check_password_hash</code> بتقارن كلمة مرور مُدخلة بالـ Hash المخزّن من غير ما تحتاج تفك تشفيره أبدًا.</div>
    <div class="en">🇬🇧 If a database ever gets leaked, and passwords were stored as plain text, every account (and any other account the user reused that password on) is immediately exposed. The fix: store a <b>Hash</b> — a one-way mathematical transform of the password (never reversible). <code>werkzeug.security.generate_password_hash</code> (which Flask itself relies on) produces that hash, and <code>check_password_hash</code> compares an entered password against the stored hash without ever needing to decrypt anything.</div>
</div>

<h2>2) بناء الـ Model وRoutes الثلاثة / Building the Model and the Three Routes</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <code>session</code> كائن جاهز من Flask بيتصرف زي Dictionary، بس القيم فيه بتتشفّر وتتخزّن في Cookie عند المستخدم — محتاج <code>SECRET_KEY</code> عشان Flask يقدر يوقّع الـ Cookie ده ويتأكد محدش لعب فيه. <code>/register</code> بتنشئ يوزر جديد، <code>/login</code> بتتحقق من كلمة المرور وتحط <code>session["user_id"]</code>، و<code>/dashboard</code> بتتحقق الأول إن فيه <code>user_id</code> في الـ Session قبل ما ترجع أي بيانات.</div>
    <div class="en">🇬🇧 <code>session</code> is a ready-made Flask object that behaves like a Dictionary, but its values are signed and stored in a Cookie on the user's browser — it needs <code>SECRET_KEY</code> so Flask can sign that Cookie and confirm nobody tampered with it. <code>/register</code> creates a new user, <code>/login</code> verifies the password and sets <code>session["user_id"]</code>, and <code>/dashboard</code> first checks there's a <code>user_id</code> in the Session before returning any data.</div>
</div>

<pre><code>from flask import Flask, request, session, jsonify
from flask_sqlalchemy import SQLAlchemy
from werkzeug.security import generate_password_hash, check_password_hash

app = Flask(__name__)
app.config["SQLALCHEMY_DATABASE_URI"] = "sqlite:///:memory:"
app.config["SECRET_KEY"] = "sila-demo-secret-key"
db = SQLAlchemy(app)


class User(db.Model):
    id = db.Column(db.Integer, primary_key=True)
    username = db.Column(db.String(80), unique=True, nullable=False)
    password_hash = db.Column(db.String(255), nullable=False)


with app.app_context():
    db.create_all()


@app.route("/register", methods=["POST"])
def register():
    username = request.form.get("username", "").strip()
    password = request.form.get("password", "")
    if not username or not password:
        return jsonify({"error": "username and password required"}), 400
    if User.query.filter_by(username=username).first():
        return jsonify({"error": "username already taken"}), 409
    user = User(username=username, password_hash=generate_password_hash(password))
    db.session.add(user)
    db.session.commit()
    return jsonify({"message": f"User '{username}' registered"}), 201


@app.route("/login", methods=["POST"])
def login():
    username = request.form.get("username", "").strip()
    password = request.form.get("password", "")
    user = User.query.filter_by(username=username).first()
    if not user or not check_password_hash(user.password_hash, password):
        return jsonify({"error": "invalid username or password"}), 401
    session["user_id"] = user.id
    session["username"] = user.username
    return jsonify({"message": f"Welcome back, {username}!"})


@app.route("/dashboard")
def dashboard():
    if "user_id" not in session:
        return jsonify({"error": "you must log in first"}), 401
    return jsonify({"message": f"This is {session['username']}'s private dashboard"})


@app.route("/logout", methods=["POST"])
def logout():
    session.clear()
    return jsonify({"message": "Logged out successfully"})</code></pre>

<h2 id="practice">3) الرحلة الكاملة: تسجيل → دخول → صفحة محمية → خروج / The Full Journey: Register → Login → Protected Page → Logout</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 دلوقتي هنستخدم <code>client</code> واحد بس لكل الخطوات — لأن Flask's test client بيحتفظ بالـ Cookies بين الطلبات المتتالية، بالظبط زي متصفح حقيقي. هنجرّب: تسجيل حساب، محاولة دخول الصفحة المحمية قبل تسجيل الدخول (المفروض ترفض)، تسجيل دخول بكلمة مرور غلط (المفروض ترفض)، تسجيل دخول صح، دخول الصفحة المحمية (المفروض تنجح دلوقتي)، تسجيل خروج، ومحاولة دخول الصفحة المحمية تاني بعد الخروج (المفروض ترفض تاني).</div>
    <div class="en">🇬🇧 Now we use just one <code>client</code> for every step — because Flask's test client keeps Cookies between consecutive requests, exactly like a real browser. We'll try: registering, attempting the protected page before logging in (should be rejected), logging in with a wrong password (should be rejected), logging in correctly, visiting the protected page (should now succeed), logging out, and trying the protected page again after logout (should be rejected again).</div>
</div>

<pre><code>client = app.test_client()

print("1) Register 'waleed':")
r = client.post("/register", data={"username": "waleed", "password": "secret123"})
print(" ", r.status_code, r.get_data(as_text=True))

print("\n2) Try dashboard BEFORE login:")
r = client.get("/dashboard")
print(" ", r.status_code, r.get_data(as_text=True))

print("\n3) Login with WRONG password:")
r = client.post("/login", data={"username": "waleed", "password": "wrongpass"})
print(" ", r.status_code, r.get_data(as_text=True))

print("\n4) Login with CORRECT password:")
r = client.post("/login", data={"username": "waleed", "password": "secret123"})
print(" ", r.status_code, r.get_data(as_text=True))

print("\n5) Access dashboard AFTER login (same client keeps the session cookie):")
r = client.get("/dashboard")
print(" ", r.status_code, r.get_data(as_text=True))

print("\n6) Logout:")
r = client.post("/logout")
print(" ", r.status_code, r.get_data(as_text=True))

print("\n7) Access dashboard AFTER logout:")
r = client.get("/dashboard")
print(" ", r.status_code, r.get_data(as_text=True))

print("\n8) Real stored password hash looks like (never plain text):")
with app.app_context():
    u = User.query.filter_by(username="waleed").first()
    print(" ", u.password_hash[:40] + "...")</code></pre>
<h3>الناتج الفعلي (رحلة كاملة حقيقية بنفس الـ Session) / Actual output (a real end-to-end journey with the same Session)</h3>
<div class="output-box">1) Register 'waleed':
  201 {"message":"User 'waleed' registered"}

2) Try dashboard BEFORE login:
  401 {"error":"you must log in first"}

3) Login with WRONG password:
  401 {"error":"invalid username or password"}

4) Login with CORRECT password:
  200 {"message":"Welcome back, waleed!"}

5) Access dashboard AFTER login (same client keeps the session cookie):
  200 {"message":"This is waleed's private dashboard"}

6) Logout:
  200 {"message":"Logged out successfully"}

7) Access dashboard AFTER logout:
  401 {"error":"you must log in first"}

8) Real stored password hash looks like (never plain text):
  scrypt:32768:8:1$TgmleHsnh2RcF08I$faa818...</div>

<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ الـ Hash: كل مرة تشغّل <code>generate_password_hash</code> على نفس كلمة المرور هيطلع Hash مختلف شكليًا (فيه "Salt" عشوائي جواه)، ومع ذلك <code>check_password_hash</code> لسه قادرة تتحقق صح — كده حتى لو اتسرق نفس الـ Hash من قاعدتين بيانات مختلفتين، محدش يقدر يستنتج إن المستخدمين استخدموا نفس كلمة المرور.</div>
    <div class="en">🇬🇧 Notice the hash: every time you run <code>generate_password_hash</code> on the same password you'll get a visually different hash (it has a random "Salt" baked in), yet <code>check_password_hash</code> can still verify it correctly — so even if the same hash leaked from two different databases, nobody could deduce the users share a password.</div>
</div>

<div class="bi-block">
    <div class="ar">🇪🇬 جرّب دلوقتي في المحرر المصغّر تحت — نفس الفكرة بمستخدمة تانية اسمها "mona"، مع محاولة دخول بكلمة مرور غلط الأول ثم صح:</div>
    <div class="en">🇬🇧 Try it now in the mini editor below — same idea with a different user "mona", attempting a wrong password first, then the correct one:</div>
</div>

<div class="mini-editor-wrap">
    <textarea spellcheck="false">from flask import Flask, request, session, jsonify
from flask_sqlalchemy import SQLAlchemy
from werkzeug.security import generate_password_hash, check_password_hash

app = Flask(__name__)
app.config["SQLALCHEMY_DATABASE_URI"] = "sqlite:///:memory:"
app.config["SECRET_KEY"] = "demo"
db = SQLAlchemy(app)


class User(db.Model):
    id = db.Column(db.Integer, primary_key=True)
    username = db.Column(db.String(80), unique=True)
    password_hash = db.Column(db.String(255))


with app.app_context():
    db.create_all()


@app.route("/register", methods=["POST"])
def register():
    username = request.form.get("username", "")
    password = request.form.get("password", "")
    user = User(username=username, password_hash=generate_password_hash(password))
    db.session.add(user)
    db.session.commit()
    return jsonify({"message": "registered"}), 201


@app.route("/login", methods=["POST"])
def login():
    username = request.form.get("username", "")
    password = request.form.get("password", "")
    user = User.query.filter_by(username=username).first()
    if not user or not check_password_hash(user.password_hash, password):
        return jsonify({"error": "invalid credentials"}), 401
    session["username"] = user.username
    return jsonify({"message": "logged in"})


client = app.test_client()
client.post("/register", data={"username": "mona", "password": "cats123"})

r1 = client.post("/login", data={"username": "mona", "password": "wrong"})
print(r1.status_code, r1.get_data(as_text=True))

r2 = client.post("/login", data={"username": "mona", "password": "cats123"})
print(r2.status_code, r2.get_data(as_text=True))</textarea>
    <div class="mini-toolbar">
        <button class="mini-run-btn">▶ شغّل / Run</button>
        <span class="mini-status"></span>
    </div>
    <div class="output-box">— لسه متشغلش / not run yet —</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="hash">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">ليه بنستخدم <code>generate_password_hash</code> بدل ما نخزّن كلمة المرور كما هي؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Why use <code>generate_password_hash</code> instead of storing the password as-is?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="speed"> عشان تسريع الاستعلامات بس</label>
        <label><input type="radio" name="q1" value="hash"> عشان لو قاعدة البيانات اتسرقت، محدش يقدر يشوف كلمات المرور الحقيقية</label>
        <label><input type="radio" name="q1" value="short"> عشان تختصر مساحة التخزين بس</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="session">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">إزاي Route زي <code>/dashboard</code> بتعرف إن المستخدم مسجّل دخول فعلاً؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">How does a route like <code>/dashboard</code> know a user is actually logged in?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="url"> بتقرأ اسم المستخدم من الـ URL مباشرة</label>
        <label><input type="radio" name="q2" value="session"> بتتحقق إن فيه قيمة (زي <code>user_id</code>) موجودة جوه <code>session</code></label>
        <label><input type="radio" name="q2" value="hash"> بتقارن الـ Hash مباشرة في كل طلب</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="secretkey">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">إيه وظيفة <code>app.config["SECRET_KEY"]</code>؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What does <code>app.config["SECRET_KEY"]</code> do?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="db"> بيحدد اسم قاعدة البيانات</label>
        <label><input type="radio" name="q3" value="secretkey"> بيخلي Flask يوقّع بيانات الـ Session جوه الـ Cookie عشان محدش يقدر يعدّل فيها</label>
        <label><input type="radio" name="q3" value="hash2"> بيحدد نوع خوارزمية الـ Hash</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="samepass">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">لو شغّلت <code>generate_password_hash("secret123")</code> مرتين، هل هيطلع نفس الـ Hash بالظبط؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">If you run <code>generate_password_hash("secret123")</code> twice, will you get the exact same hash?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="same"> أيوه، دايمًا نفس الـ Hash بالظبط</label>
        <label><input type="radio" name="q4" value="samepass"> لأ، هيطلع Hash مختلف شكليًا (بسبب Salt عشوائي)، لكن <code>check_password_hash</code> لسه هتتحقق صح من الاتنين</label>
        <label><input type="radio" name="q4" value="error"> لأ، هيرمي Error في المرة التانية</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ منع تسجيل يوزر مكرر / Preventing a Duplicate Username</h3>
    <div class="ar">🇪🇬 في المحرر المصغّر فوق، بعد تسجيل "mona" بنجاح، جرّب تسجّلها تاني بنفس الـ <code>username</code> (بأي <code>password</code>). أضف الشرط اللي بيتحقق من <code>User.query.filter_by(username=username).first()</code> قبل الإنشاء (زي الكود الأصلي فوق) لو مش موجود، وتأكد إن الرد بيرجع كود حالة <code>409</code> (Conflict) مش <code>201</code>.</div>
    <div class="en">🇬🇧 In the mini editor above, after registering "mona" successfully, try registering her again with the same <code>username</code> (any <code>password</code>). Add the check for <code>User.query.filter_by(username=username).first()</code> before creating (like the original code above) if it's missing, and confirm the response returns status <code>409</code> (Conflict) instead of <code>201</code>.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 دلوقتي بنيت نظام تسجيل دخول كامل وآمن بـ Flask — بالظبط نفس المنطق اللي أي موقع حقيقي محتاجه. الدرس الأخير في المسار ده، <a href="flask-rest-api-project.php">مشروع: REST API بـ Flask</a>، هياخدك خطوة كمان: تبني API كاملة بـ GET/POST/DELETE بترجع JSON بس، من غير أي صفحات HTML — بالظبط زي أي Backend حقيقي بيتواصل معاه تطبيق موبايل أو واجهة React منفصلة.</div>
    <div class="en">🇬🇧 You've now built a complete, secure login system with Flask — exactly the logic any real site needs. The last lesson in this stretch, <a href="flask-rest-api-project.php">Project: A REST API with Flask</a>, takes it one step further: building a full API with GET/POST/DELETE that returns only JSON, no HTML pages — exactly like any real Backend that a mobile app or a separate React frontend talks to.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>ماتخزّنش كلمة المرور كنص عادي أبدًا — استخدم <code>generate_password_hash</code>/<code>check_password_hash</code> من <code>werkzeug.security</code>.</li>
        <li><code>session</code> كائن زي Dictionary بيتخزن موقّع في Cookie عند المستخدم، ومحتاج <code>SECRET_KEY</code>.</li>
        <li>أي Route محمية لازم تتحقق أول حاجة من وجود قيمة (زي <code>user_id</code>) جوه <code>session</code> قبل ما ترجع أي بيانات.</li>
        <li><code>test_client()</code> واحد بيحافظ على نفس الـ Cookies بين الطلبات، فتقدر تحاكي رحلة مستخدم كاملة (تسجيل → دخول → صفحة محمية → خروج).</li>
        <li>كل Hash مختلف شكليًا حتى لو من نفس كلمة المرور، بس <code>check_password_hash</code> لسه بتتحقق صح.</li>
        <li>الرد بكود حالة مناسب (<code>401</code> لدخول مرفوض، <code>409</code> ليوزر مكرر) بيخلي أي Front-End يتصرف صح.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="flask-database-sqlalchemy.php">← المرحلة السابقة</a>
    <a href="flask-rest-api-project.php">المرحلة الجاية / Next: A REST API with Flask →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
