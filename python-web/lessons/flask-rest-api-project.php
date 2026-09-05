<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'flask-rest-api-project';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = '🚀 مشروع: REST API بـ Flask';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">Flask</span>
<h1>🚀 مشروع: REST API بـ Flask <span class="ltr">🚀 Project: A REST API with Flask</span></h1>
<p class="subtitle">جمّعنا لحد دلوقتي Routes، Templates، قاعدة بيانات، وSessions. الدرس الأخير في مسار Flask ده هيجمّع كل حاجة في مشروع REST API حقيقي بالكامل: مورد <code>/api/tasks</code> بعمليات <code>GET</code> (قايمة وعنصر واحد)، <code>POST</code> (إنشاء)، و<code>DELETE</code> (مسح) — بترجع JSON بس، بالظبط زي أي API حقيقي هتبنيه في شغلك.</p>

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
    <div class="ar">🇪🇬 تبني API كاملة لمورد <code>Task</code> (مهمة) مدعومة بـ SQLAlchemy، فيها كل عمليات REST الأساسية: قايمة كل المهام، مهمة واحدة بالـ id، إنشاء مهمة جديدة، ومسح مهمة — وتتأكد إن كل عملية بترجع كود حالة HTTP الصحيح (<code>200</code>، <code>201</code>، <code>400</code>، <code>404</code>) بالظبط زي أي API إنتاجي حقيقي.</div>
    <div class="en">🇬🇧 Build a complete API for a <code>Task</code> resource backed by SQLAlchemy, covering all the core REST operations: listing all tasks, one task by id, creating a new task, and deleting one — and confirm each operation returns the correct HTTP status code (<code>200</code>, <code>201</code>, <code>400</code>, <code>404</code>) exactly like any real production API.</div>
</div>

<div class="bi-block">
    <div class="ar">🇪🇬 <b>الجسر لمسار Backend:</b> ده بالظبط نفس منطق REST اللي اتعلمته قبل كده في مسار PHP Backend — نفس الأفعال (<code>GET</code>/<code>POST</code>/<code>DELETE</code>)، نفس فكرة "مورد" له مسار ثابت (<code>/api/tasks</code>) ومسار فرعي بالـ id (<code>/api/tasks/1</code>)، ونفس أكواد الحالة (<code>200</code>, <code>201</code>, <code>404</code>). الفرق الوحيد هنا إن الكود Python بدل PHP، و<code>jsonify()</code> بدل <code>json_encode()</code> — المفهوم واحد بالظبط.</div>
    <div class="en">🇬🇧 <b>The bridge to the Backend track:</b> this is exactly the same REST logic you learned earlier in the PHP Backend track — the same verbs (<code>GET</code>/<code>POST</code>/<code>DELETE</code>), the same idea of a "resource" with a fixed path (<code>/api/tasks</code>) and an id-based sub-path (<code>/api/tasks/1</code>), and the same status codes (<code>200</code>, <code>201</code>, <code>404</code>). The only difference here is Python instead of PHP, and <code>jsonify()</code> instead of <code>json_encode()</code> — the concept is identical.</div>
</div>

<h2 id="understand">1) الـ Model وGET (قايمة وعنصر واحد) / The Model and GET (List and Single Item)</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 هنضيف <code>to_dict()</code> على الـ Model عشان نحوّل الكائن لـ Dictionary بسيط جاهز لـ <code>jsonify()</code>. <code>db.session.get(Model, id)</code> هي الطريقة الحديثة (بدل <code>Model.query.get(id)</code> القديمة) لجلب صف بمفتاحه الأساسي — بترجع <code>None</code> لو مش موجود، فنقدر نرجّع <code>404</code> بدل ما نخلي التطبيق يطيح.</div>
    <div class="en">🇬🇧 We add a <code>to_dict()</code> method to the Model to turn the object into a plain Dictionary ready for <code>jsonify()</code>. <code>db.session.get(Model, id)</code> is the modern way (replacing the older <code>Model.query.get(id)</code>) to fetch a row by its primary key — it returns <code>None</code> if missing, so we can return <code>404</code> instead of letting the app crash.</div>
</div>

<pre><code>from flask import Flask, request, jsonify
from flask_sqlalchemy import SQLAlchemy

app = Flask(__name__)
app.config["SQLALCHEMY_DATABASE_URI"] = "sqlite:///:memory:"
db = SQLAlchemy(app)


class Task(db.Model):
    id = db.Column(db.Integer, primary_key=True)
    title = db.Column(db.String(120), nullable=False)
    done = db.Column(db.Boolean, default=False)

    def to_dict(self):
        return {"id": self.id, "title": self.title, "done": self.done}


with app.app_context():
    db.create_all()


@app.route("/api/tasks", methods=["GET"])
def list_tasks():
    tasks = Task.query.all()
    return jsonify([t.to_dict() for t in tasks])


@app.route("/api/tasks/&lt;int:task_id&gt;", methods=["GET"])
def get_task(task_id):
    task = db.session.get(Task, task_id)
    if task is None:
        return jsonify({"error": "task not found"}), 404
    return jsonify(task.to_dict())</code></pre>

<h2>2) POST للإنشاء وDELETE للمسح / POST to Create and DELETE to Remove</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 لما API بتستقبل JSON (مش فورم HTML عادي)، بنستخدم <code>request.get_json(silent=True)</code> بدل <code>request.form</code> — <code>silent=True</code> بترجع <code>None</code> بدل ما ترمي Error لو الـ Body مش JSON صحيح. إنشاء صف جديد بينجح بيرجع <code>201</code> (Created) مش <code>200</code> العادية — الفرق مهم عشان أي Front-End يعرف إن مورد جديد اتعمل فعلاً.</div>
    <div class="en">🇬🇧 When an API receives JSON (not a regular HTML form), we use <code>request.get_json(silent=True)</code> instead of <code>request.form</code> — <code>silent=True</code> returns <code>None</code> instead of raising an Error if the body isn't valid JSON. A successful creation returns <code>201</code> (Created), not a plain <code>200</code> — the difference matters so any Front-End knows a new resource was actually made.</div>
</div>

<pre><code>@app.route("/api/tasks", methods=["POST"])
def create_task():
    data = request.get_json(silent=True) or {}
    title = data.get("title", "").strip()
    if not title:
        return jsonify({"error": "title is required"}), 400
    task = Task(title=title)
    db.session.add(task)
    db.session.commit()
    return jsonify(task.to_dict()), 201


@app.route("/api/tasks/&lt;int:task_id&gt;", methods=["DELETE"])
def delete_task(task_id):
    task = db.session.get(Task, task_id)
    if task is None:
        return jsonify({"error": "task not found"}), 404
    db.session.delete(task)
    db.session.commit()
    return jsonify({"message": f"task {task_id} deleted"})</code></pre>

<h2 id="practice">3) اختبار الـ API الكامل بـ test_client / Testing the Full API with test_client</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 هنستخدم <code>client.get(...)</code>، <code>client.post(..., json={...})</code> (لاحظ <code>json=</code> مش <code>data=</code> — بتضبط <code>Content-Type</code> تلقائيًا وتحوّل الـ Dictionary لـ JSON)، و<code>client.delete(...)</code> عشان نغطي كل العمليات ونشوف الأكواد والردود الحقيقية.</div>
    <div class="en">🇬🇧 We'll use <code>client.get(...)</code>, <code>client.post(..., json={...})</code> (note <code>json=</code> not <code>data=</code> — it sets the <code>Content-Type</code> automatically and converts the Dictionary to JSON), and <code>client.delete(...)</code> to cover every operation and see the real codes and responses.</div>
</div>

<pre><code>client = app.test_client()

print("1) GET /api/tasks (empty list at first):")
r = client.get("/api/tasks")
print(" ", r.status_code, r.get_data(as_text=True))

print("\n2) POST /api/tasks -> create 'Learn Flask':")
r = client.post("/api/tasks", json={"title": "Learn Flask"})
print(" ", r.status_code, r.get_data(as_text=True))

print("\n3) POST /api/tasks -> create 'Build REST API':")
r = client.post("/api/tasks", json={"title": "Build REST API"})
print(" ", r.status_code, r.get_data(as_text=True))

print("\n4) GET /api/tasks (now has 2 items):")
r = client.get("/api/tasks")
print(" ", r.status_code, r.get_data(as_text=True))

print("\n5) GET /api/tasks/1 (single task):")
r = client.get("/api/tasks/1")
print(" ", r.status_code, r.get_data(as_text=True))

print("\n6) GET /api/tasks/999 (does not exist):")
r = client.get("/api/tasks/999")
print(" ", r.status_code, r.get_data(as_text=True))

print("\n7) DELETE /api/tasks/1:")
r = client.delete("/api/tasks/1")
print(" ", r.status_code, r.get_data(as_text=True))

print("\n8) GET /api/tasks after delete (only 1 left):")
r = client.get("/api/tasks")
print(" ", r.status_code, r.get_data(as_text=True))

print("\n9) POST /api/tasks with no title (validation error):")
r = client.post("/api/tasks", json={})
print(" ", r.status_code, r.get_data(as_text=True))</code></pre>
<h3>الناتج الفعلي (JSON حقيقي من API شغالة فعليًا) / Actual output (real JSON from a genuinely working API)</h3>
<div class="output-box">1) GET /api/tasks (empty list at first):
  200 []

2) POST /api/tasks -&gt; create 'Learn Flask':
  201 {"done":false,"id":1,"title":"Learn Flask"}

3) POST /api/tasks -&gt; create 'Build REST API':
  201 {"done":false,"id":2,"title":"Build REST API"}

4) GET /api/tasks (now has 2 items):
  200 [{"done":false,"id":1,"title":"Learn Flask"},{"done":false,"id":2,"title":"Build REST API"}]

5) GET /api/tasks/1 (single task):
  200 {"done":false,"id":1,"title":"Learn Flask"}

6) GET /api/tasks/999 (does not exist):
  404 {"error":"task not found"}

7) DELETE /api/tasks/1:
  200 {"message":"task 1 deleted"}

8) GET /api/tasks after delete (only 1 left):
  200 [{"done":false,"id":2,"title":"Build REST API"}]

9) POST /api/tasks with no title (validation error):
  400 {"error":"title is required"}</div>

<div class="bi-block">
    <div class="ar">🇪🇬 جرّب دلوقتي في المحرر المصغّر تحت — إضافة عملية <code>PUT</code> (تحديث) لمورد الـ Tasks، وهي الجزء الوحيد اللي كان ناقص من عمليات REST الأربعة (GET/POST/PUT/DELETE):</div>
    <div class="en">🇬🇧 Try it now in the mini editor below — adding a <code>PUT</code> (update) operation to the Tasks resource, the one missing piece from the four REST operations (GET/POST/PUT/DELETE):</div>
</div>

<div class="mini-editor-wrap">
    <textarea spellcheck="false">from flask import Flask, request, jsonify
from flask_sqlalchemy import SQLAlchemy

app = Flask(__name__)
app.config["SQLALCHEMY_DATABASE_URI"] = "sqlite:///:memory:"
db = SQLAlchemy(app)


class Task(db.Model):
    id = db.Column(db.Integer, primary_key=True)
    title = db.Column(db.String(120), nullable=False)
    done = db.Column(db.Boolean, default=False)

    def to_dict(self):
        return {"id": self.id, "title": self.title, "done": self.done}


with app.app_context():
    db.create_all()


@app.route("/api/tasks/<int:task_id>", methods=["PUT"])
def update_task(task_id):
    task = db.session.get(Task, task_id)
    if task is None:
        return jsonify({"error": "task not found"}), 404
    data = request.get_json(silent=True) or {}
    if "done" in data:
        task.done = bool(data["done"])
    db.session.commit()
    return jsonify(task.to_dict())


client = app.test_client()
with app.app_context():
    t = Task(title="Write tests")
    db.session.add(t)
    db.session.commit()

r = client.put("/api/tasks/1", json={"done": True})
print(r.status_code, r.get_data(as_text=True))

r2 = client.put("/api/tasks/999", json={"done": True})
print(r2.status_code, r2.get_data(as_text=True))</textarea>
    <div class="mini-toolbar">
        <button class="mini-run-btn">▶ شغّل / Run</button>
        <span class="mini-status"></span>
    </div>
    <div class="output-box">— لسه متشغلش / not run yet —</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="created">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">لما <code>POST /api/tasks</code> تنجح في إنشاء مهمة جديدة، إيه كود الحالة الصح اللي المفروض ترجعه؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">When <code>POST /api/tasks</code> successfully creates a new task, what's the correct status code to return?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="ok200"> <code>200</code> زي أي رد ناجح</label>
        <label><input type="radio" name="q1" value="created"> <code>201</code> Created — عشان يوضّح إن مورد جديد اتعمل فعلاً</label>
        <label><input type="radio" name="q1" value="nocontent"> <code>204</code> No Content</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="getjson">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">لما API بتستقبل بيانات JSON بدل فورم HTML عادي، منين بتقرأها؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">When an API receives JSON data instead of a regular HTML form, where do you read it from?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="requestform"> <code>request.form.get(...)</code></label>
        <label><input type="radio" name="q2" value="getjson"> <code>request.get_json(silent=True)</code></label>
        <label><input type="radio" name="q2" value="urlparam"> من الـ URL مباشرة</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="notfound">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question"><code>db.session.get(Task, task_id)</code> بترجع <code>None</code>. إيه الرد الصح اللي المفروض الـ Route ترجعه؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em"><code>db.session.get(Task, task_id)</code> returns <code>None</code>. What should the route correctly return?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="crash"> تسيب التطبيق يطيح بـ Error 500</label>
        <label><input type="radio" name="q3" value="notfound"> <code>(jsonify({"error": "task not found"}), 404)</code></label>
        <label><input type="radio" name="q3" value="empty200"> <code>200</code> برد فاضي</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="samelogic">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">إيه العلاقة بين REST API بـ Flask هنا وREST API اللي اتعلمته في مسار PHP Backend؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What's the relationship between this Flask REST API and the REST API you learned in the PHP Backend track?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="unrelated"> مفيش علاقة، مفاهيم مختلفة تمامًا</label>
        <label><input type="radio" name="q4" value="samelogic"> نفس منطق REST بالظبط (الأفعال، المسارات، أكواد الحالة)، لغة برمجة مختلفة بس</label>
        <label><input type="radio" name="q4" value="phponly"> REST بتشتغل بـ PHP بس، مش بـ Python</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ فلترة المهام المنجزة / Filtering Completed Tasks</h3>
    <div class="ar">🇪🇬 في المحرر المصغّر فوق، زوّد Route اسمها <code>/api/tasks/done</code> بـ <code>methods=["GET"]</code> ترجع بس المهام اللي <code>done == True</code> (استخدم <code>Task.query.filter_by(done=True).all()</code>). جرّبها بـ <code>client.get("/api/tasks/done")</code> بعد ما تحدّث مهمة بـ <code>PUT</code> لـ <code>done=True</code>، وتأكد إن الرد فيه المهمة دي بس.</div>
    <div class="en">🇬🇧 In the mini editor above, add a Route called <code>/api/tasks/done</code> with <code>methods=["GET"]</code> that returns only tasks where <code>done == True</code> (use <code>Task.query.filter_by(done=True).all()</code>). Test it with <code>client.get("/api/tasks/done")</code> after updating a task to <code>done=True</code> via <code>PUT</code>, and confirm the response contains only that task.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 كده اتعلمت Flask من الصفر لحد مشروع API كامل: Routing، Templates، قاعدة بيانات، تسجيل دخول آمن، وREST API. المرحلة الجاية بتاخدك لعالم تاني تمامًا من عالم Python للويب: <a href="django.php">Django</a> — الفريموورك "بطاريات مضمّنة" اللي بيدّيك قاعدة بيانات ولوحة إدارة وأمان جاهزين من أول يوم، عكس فلسفة Flask المرنة اللي شفتها هنا. هتلاقي فيه نفس المفاهيم (Models، Views، Routes) لكن بأسلوب مختلف تمامًا في التنظيم.</div>
    <div class="en">🇬🇧 You've now learned Flask from scratch through a complete API project: Routing, Templates, a database, secure login, and a REST API. The next stage takes you to a whole different corner of Python for the web: <a href="django.php">Django</a> — the "batteries-included" framework that hands you a database, admin panel, and security ready from day one, the opposite philosophy from the flexible Flask you saw here. You'll find the same concepts (Models, Views, Routes) but organized in a very different way.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>مورد REST بيتاح بمسار ثابت (<code>/api/tasks</code>) ومسار فرعي بالـ id (<code>/api/tasks/&lt;int:id&gt;</code>).</li>
        <li><code>request.get_json(silent=True)</code> لقراءة بيانات JSON، مش <code>request.form</code>.</li>
        <li>إنشاء ناجح = <code>201</code>، طلب ناجح عادي = <code>200</code>، مورد مش موجود = <code>404</code>، بيانات غلط = <code>400</code>.</li>
        <li><code>db.session.get(Model, id)</code> الطريقة الحديثة لجلب صف بمفتاحه الأساسي، وبترجع <code>None</code> لو مش موجود.</li>
        <li><code>to_dict()</code> على الـ Model بتحوّله لـ Dictionary جاهز لـ <code>jsonify()</code>.</li>
        <li>نفس منطق REST اللي اتعلمته في مسار PHP Backend — لغة مختلفة بس المفهوم واحد.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="flask-auth-project.php">← المرحلة السابقة</a>
    <a href="django.php">المرحلة الجاية / Next: The Django Framework →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
