<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'flask-database-sqlalchemy';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'Flask: قاعدة بيانات بـ SQLAlchemy';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">Flask</span>
<h1>Flask: قاعدة بيانات بـ SQLAlchemy <span class="ltr">Flask: Database with SQLAlchemy</span></h1>
<p class="subtitle">في درس <a href="flask-routing-templates.php">Routing وTemplates وForms</a> كل بياناتنا كانت في الذاكرة بس وبتختفي أول ما السكريبت يخلص. هنا هنخزّن بيانات حقيقية بـ <code>Flask-SQLAlchemy</code> — مكتبة "ORM" (Object-Relational Mapper) بتخليك تتعامل مع جداول قاعدة البيانات كأنها كلاسات Python عادية، من غير ما تكتب SQL يدوي في كل مرة.</p>

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
    <div class="ar">🇪🇬 تعرّف Model حقيقي بـ <code>db.Model</code>، تنشئ جدوله فعليًا بـ <code>db.create_all()</code>، تضيف صفوف حقيقية وتستعلم عنها بـ <code>.query.all()</code> و<code>.query.filter_by()</code> و<code>.query.filter()</code>، وتعدّل وتمسح صفوف — كل ده على قاعدة بيانات SQLite في الذاكرة (<code>sqlite:///:memory:</code>) آمنة تمامًا وبتتصفّر كل مرة تشغّل السكريبت.</div>
    <div class="en">🇬🇧 Define a real Model with <code>db.Model</code>, actually create its table with <code>db.create_all()</code>, insert real rows and query them with <code>.query.all()</code>, <code>.query.filter_by()</code>, and <code>.query.filter()</code>, then update and delete rows — all on an in-memory SQLite database (<code>sqlite:///:memory:</code>) that's completely safe and resets every time the script runs.</div>
</div>

<h2 id="understand">1) إعداد Flask-SQLAlchemy / Setting Up Flask-SQLAlchemy</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <code>pip install flask-sqlalchemy</code> بيثبّت المكتبة (وبيجيب معاها SQLAlchemy نفسها). <code>SQLALCHEMY_DATABASE_URI</code> بيحدد أي قاعدة بيانات تتصل بيها — <code>sqlite:///:memory:</code> معناها SQLite بالكامل في الـ RAM، مفيهاش أي ملف على القرص، ومناسبة جدًا للتجربة والتعلّم (بالظبط زي الـ SQLite Sandbox اللي شفته في مسار PHP Backend).</div>
    <div class="en">🇬🇧 <code>pip install flask-sqlalchemy</code> installs the library (and pulls in SQLAlchemy itself). <code>SQLALCHEMY_DATABASE_URI</code> sets which database to connect to — <code>sqlite:///:memory:</code> means SQLite entirely in RAM, no file on disk at all, which is perfect for experimenting and learning (exactly like the SQLite Sandbox you saw in the PHP Backend track).</div>
</div>

<pre><code>pip install flask-sqlalchemy</code></pre>

<h2>2) Model حقيقي وإنشاء الجدول / A Real Model and Creating the Table</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 أي كلاس بيرث من <code>db.Model</code> بيبقى جدول في قاعدة البيانات — كل <code>db.Column</code> هو عمود. <code>db.create_all()</code> بينشئ الجداول فعليًا لو مش موجودة، ولازم تتنفذ جوه <code>with app.app_context():</code> عشان SQLAlchemy يعرف يوصل لإعدادات التطبيق.</div>
    <div class="en">🇬🇧 Any class inheriting from <code>db.Model</code> becomes a database table — each <code>db.Column</code> is a column. <code>db.create_all()</code> actually creates the tables if they don't exist, and must run inside <code>with app.app_context():</code> so SQLAlchemy can reach the app's configuration.</div>
</div>

<pre><code>from flask import Flask
from flask_sqlalchemy import SQLAlchemy

app = Flask(__name__)
app.config["SQLALCHEMY_DATABASE_URI"] = "sqlite:///:memory:"
db = SQLAlchemy(app)


class Student(db.Model):
    id = db.Column(db.Integer, primary_key=True)
    name = db.Column(db.String(80), nullable=False)
    grade = db.Column(db.Integer, nullable=False)

    def __repr__(self):
        return f"&lt;Student {self.name} ({self.grade})&gt;"


with app.app_context():
    db.create_all()

    db.session.add(Student(name="Ahmed", grade=90))
    db.session.add(Student(name="Sara", grade=75))
    db.session.add(Student(name="Waleed", grade=42))
    db.session.commit()

    all_students = Student.query.all()
    print("All students:")
    for s in all_students:
        print(" -", s)

    passing = Student.query.filter(Student.grade &gt;= 50).all()
    print("\nPassing students (grade &gt;= 50):")
    for s in passing:
        print(" -", s.name, s.grade)

    one = Student.query.filter_by(name="Sara").first()
    print("\nLookup by name 'Sara':", one)

    print("\nTotal count:", Student.query.count())</code></pre>
<h3>الناتج الفعلي (استعلامات SQLAlchemy حقيقية) / Actual output (real SQLAlchemy queries)</h3>
<div class="output-box">All students:
 - &lt;Student Ahmed (90)&gt;
 - &lt;Student Sara (75)&gt;
 - &lt;Student Waleed (42)&gt;

Passing students (grade &gt;= 50):
 - Ahmed 90
 - Sara 75

Lookup by name 'Sara': &lt;Student Sara (75)&gt;

Total count: 3</div>

<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ الفرق بين <code>.filter_by(name="Sara")</code> (بحث بالمساواة على عمود بالاسم كـ Keyword Argument، أبسط وأقصر) و<code>.filter(Student.grade &gt;= 50)</code> (بيقبل أي تعبير مقارنة على العمود نفسه ككائن Python — أقوى ومرن أكتر).</div>
    <div class="en">🇬🇧 Notice the difference between <code>.filter_by(name="Sara")</code> (equality search on a column via a Keyword Argument, simpler and shorter) and <code>.filter(Student.grade &gt;= 50)</code> (accepts any comparison expression on the column as a Python object — more powerful and flexible).</div>
</div>

<h2 id="practice">3) تعديل ومسح صفوف / Updating and Deleting Rows</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 التعديل بسيط جدًا: تجيب الصف بالاستعلام، تغيّر خاصية عليه زي أي كائن Python عادي، وبعدين <code>db.session.commit()</code>. المسح مشابه: <code>db.session.delete(الصف)</code> ثم <code>commit()</code>.</div>
    <div class="en">🇬🇧 Updating is simple: fetch the row with a query, change an attribute on it like any regular Python object, then <code>db.session.commit()</code>. Deleting is similar: <code>db.session.delete(row)</code> then <code>commit()</code>.</div>
</div>

<pre><code>class Course(db.Model):
    id = db.Column(db.Integer, primary_key=True)
    title = db.Column(db.String(100), nullable=False)
    hours = db.Column(db.Integer, default=0)


with app.app_context():
    db.create_all()
    db.session.add(Course(title="Python Basics", hours=10))
    db.session.add(Course(title="Flask", hours=8))
    db.session.commit()

    # Update: find and change a row
    course = Course.query.filter_by(title="Flask").first()
    course.hours = 15
    db.session.commit()
    print("After update:", Course.query.filter_by(title="Flask").first().hours)

    # Delete: remove a row
    to_delete = Course.query.filter_by(title="Python Basics").first()
    db.session.delete(to_delete)
    db.session.commit()

    remaining = Course.query.all()
    print("Remaining courses:", [c.title for c in remaining])
    print("Count after delete:", Course.query.count())</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">After update: 15
Remaining courses: ['Flask']
Count after delete: 1</div>

<div class="bi-block">
    <div class="ar">🇪🇬 جرّب دلوقتي في المحرر المصغّر تحت — Model اسمها <code>Book</code>، بتضيف كتابين وتفلتر اللي فيهم أكتر من 300 صفحة:</div>
    <div class="en">🇬🇧 Try it now in the mini editor below — a <code>Book</code> Model, adding two books and filtering the ones over 300 pages:</div>
</div>

<div class="mini-editor-wrap">
    <textarea spellcheck="false">from flask import Flask
from flask_sqlalchemy import SQLAlchemy

app = Flask(__name__)
app.config["SQLALCHEMY_DATABASE_URI"] = "sqlite:///:memory:"
db = SQLAlchemy(app)


class Book(db.Model):
    id = db.Column(db.Integer, primary_key=True)
    title = db.Column(db.String(120), nullable=False)
    pages = db.Column(db.Integer, default=0)


with app.app_context():
    db.create_all()
    db.session.add(Book(title="Automate the Boring Stuff", pages=592))
    db.session.add(Book(title="Flask Web Development", pages=256))
    db.session.commit()

    long_books = Book.query.filter(Book.pages > 300).all()
    print("Books over 300 pages:")
    for b in long_books:
        print(" -", b.title, b.pages)

    print("Total books:", Book.query.count())</textarea>
    <div class="mini-toolbar">
        <button class="mini-run-btn">▶ شغّل / Run</button>
        <span class="mini-status"></span>
    </div>
    <div class="output-box">— لسه متشغلش / not run yet —</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="model">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">لما كلاس Python يرث من <code>db.Model</code>، إيه اللي بيبقى ليه في قاعدة البيانات؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">When a Python class inherits from <code>db.Model</code>, what does it get in the database?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="model"> جدول كامل، وكل <code>db.Column</code> فيه بيبقى عمود</label>
        <label><input type="radio" name="q1" value="row"> صف واحد بس</label>
        <label><input type="radio" name="q1" value="nothing"> مفيش علاقة، الكلاس ده Python عادي بس</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="memory">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question"><code>sqlite:///:memory:</code> بتعني إيه؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What does <code>sqlite:///:memory:</code> mean?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="file"> ملف SQLite دائم على القرص اسمه memory</label>
        <label><input type="radio" name="q2" value="memory"> قاعدة بيانات SQLite بالكامل في الـ RAM، بتختفي لما السكريبت يخلص</label>
        <label><input type="radio" name="q2" value="cloud"> قاعدة بيانات على سيرفر بعيد</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="filterby">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">إيه الفرق بين <code>.filter_by(name="Sara")</code> و<code>.filter(Student.grade &gt;= 50)</code>؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What's the difference between <code>.filter_by(name="Sara")</code> and <code>.filter(Student.grade &gt;= 50)</code>?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="filterby"> الأولى بحث مساواة بسيط بـ Keyword، والتانية بتقبل أي تعبير مقارنة على العمود</label>
        <label><input type="radio" name="q3" value="same"> نفس الحاجة بالظبط، مجرد تفضيل شخصي</label>
        <label><input type="radio" name="q3" value="delete"> الأولى بتمسح صفوف، والتانية بس بتبحث</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="commit">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">بعد ما تعدّل خاصية على صف (زي <code>course.hours = 15</code>)، إيه اللي لازم تعمله عشان التعديل يتحفظ فعليًا؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">After changing an attribute on a row (like <code>course.hours = 15</code>), what must you do to actually persist it?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="nothing"> مفيش حاجة، بيتحفظ أوتوماتيك</label>
        <label><input type="radio" name="q4" value="commit"> تستدعي <code>db.session.commit()</code></label>
        <label><input type="radio" name="q4" value="createall"> تستدعي <code>db.create_all()</code> تاني</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ متوسط صفحات الكتب / Average Book Pages</h3>
    <div class="ar">🇪🇬 في المحرر المصغّر فوق، زوّد كتاب تالت اسمه <code>"Fluent Python"</code> بـ <code>pages=800</code>. بعد كده احسب متوسط عدد الصفحات لكل الكتب الموجودة (استخدم <code>Book.query.all()</code> وList Comprehension أو حلقة عادية) واطبعه.</div>
    <div class="en">🇬🇧 In the mini editor above, add a third book called <code>"Fluent Python"</code> with <code>pages=800</code>. Then compute the average page count across all books (use <code>Book.query.all()</code> with a List Comprehension or a plain loop) and print it.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 دلوقتي عندك Model حقيقي متخزّن في قاعدة بيانات، وتقدر تضيف وتستعلم وتعدّل وتمسح. الدرس الجاي، <a href="flask-auth-project.php">مشروع: نظام تسجيل دخول بـ Flask</a>، هيستخدم بالظبط نفس المهارة دي عشان يبني Model اسمه <code>User</code> ويخزّن كلمات مرور مشفّرة، وSessions تحدد مين مسجّل دخول دلوقتي.</div>
    <div class="en">🇬🇧 You now have a real Model persisted to a database, and can add, query, update, and delete. Next up, <a href="flask-auth-project.php">Project: A Flask Authentication System</a>, uses this exact same skill to build a <code>User</code> Model storing hashed passwords, and Sessions tracking who's currently logged in.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li><code>db.Model</code> = جدول، <code>db.Column</code> = عمود، وكل ده بيتصرف كأنه كلاس Python عادي.</li>
        <li><code>db.create_all()</code> بينشئ الجداول فعليًا، ولازم يتنفذ جوه <code>with app.app_context():</code>.</li>
        <li><code>db.session.add(...)</code> ثم <code>db.session.commit()</code> = إدخال صف حقيقي.</li>
        <li><code>.query.all()</code>، <code>.query.filter_by(...)</code>، <code>.query.filter(...)</code> = استرجاع كل الصفوف، بحث بالمساواة، وبحث بتعبير مقارنة.</li>
        <li>التعديل: غيّر الخاصية ثم <code>commit()</code>. المسح: <code>db.session.delete(الصف)</code> ثم <code>commit()</code>.</li>
        <li><code>sqlite:///:memory:</code> قاعدة بيانات آمنة تمامًا للتجربة، بتتصفّر كل مرة.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="flask-routing-templates.php">← المرحلة السابقة</a>
    <a href="flask-auth-project.php">المرحلة الجاية / Next: A Flask Authentication System →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
