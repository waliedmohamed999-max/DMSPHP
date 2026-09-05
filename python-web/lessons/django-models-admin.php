<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'django-models-admin';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'Django: Models ولوحة الإدارة';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">Django</span>
<h1>Django: Models ولوحة الإدارة <span class="ltr">Django: Models &amp; the Admin Panel</span></h1>
<p class="subtitle">في درس Django العام شفنا مقدمة سريعة عن الـ Model. هنا هندخل بعمق فعلي: نبني Model حقيقي بحقلين مختلفين، نشغّل قاعدة بيانات فعلية (في الذاكرة)، ندخل بيانات ونستعلم عنها ونعدّلها — كل ده كود Python حقيقي منفَّذ فعليًا، مش مجرد شرح. وبعدين نفهم إزاي نفس الـ Model ده بيتحول للوحة إدارة كاملة.</p>

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
    <div class="ar">🇪🇬 تبني Model حقيقي بحقول من أنواع مختلفة (نص، Boolean)، تشغّل جدول قاعدة بيانات فعلي منه، تنفّذ عليه إنشاء/قراءة/تعديل بيانات حقيقية (CRUD)، وتفهم إزاي Django بيحوّل نفس الـ Model ده للوحة إدارة كاملة من غير HTML.</div>
    <div class="en">🇬🇧 Build a real Model with fields of different types (text, Boolean), run an actual database table from it, perform real create/read/update data (CRUD) against it, and understand how Django turns that same Model into a full admin panel with zero HTML.</div>
</div>

<h2 id="understand">1) تجهيز Django من غير مشروع كامل / Bootstrapping Django Without a Full Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 عادةً Django محتاج مشروع كامل (<code>manage.py</code>، <code>settings.py</code>) عشان يشتغل. لكن فيه طريقة رسمية تانية — نفس اللي Django بيستخدمها داخليًا في الـ Tests بتاعته — هي <code>django.conf.settings.configure()</code>: تجهّز كل إعدادات Django (قاعدة البيانات، التطبيقات المسجّلة) يدويًا في سكريبت واحد، وبعدها <code>django.setup()</code> بيفعّل النظام كله. كل كود Django في الدرس ده اتنفذ فعليًا بالطريقة دي.</div>
    <div class="en">🇬🇧 Django normally needs a full project (<code>manage.py</code>, <code>settings.py</code>) to run. But there's another official technique — the same one Django uses internally for its own test suite — <code>django.conf.settings.configure()</code>: it sets up all of Django's configuration (database, registered apps) manually in a single script, then <code>django.setup()</code> activates the whole framework. Every piece of Django code in this lesson was really executed this way.</div>
</div>

<pre><code>import django
from django.conf import settings

settings.configure(
    DEBUG=True,
    DATABASES={'default': {'ENGINE': 'django.db.backends.sqlite3', 'NAME': ':memory:'}},
    INSTALLED_APPS=['django.contrib.contenttypes', 'django.contrib.auth', '__main__'],
    USE_TZ=True,
)
django.setup()</code></pre>

<div class="bi-block">
    <div class="ar">🇪🇬 <code>NAME': ':memory:'</code> معناها قاعدة بيانات SQLite بتتعمل في ذاكرة الجهاز مباشرة، من غير ملف على القرص — مثالية للتجربة والتعليم، لكن بياناتها بتختفي لما السكريبت يخلص (في مشروع حقيقي هتستخدم ملف SQLite أو PostgreSQL فعلي). <code>'__main__'</code> في <code>INSTALLED_APPS</code> معناه إن الـ Model اللي هنعرّفه في نفس السكريبت ده يتحسب "تطبيق" مسجّل عند Django.</div>
    <div class="en">🇬🇧 <code>NAME': ':memory:'</code> means an SQLite database created directly in the machine's memory, with no file on disk — perfect for learning and experimentation, but its data disappears when the script ends (a real project would use an actual SQLite file or PostgreSQL). <code>'__main__'</code> in <code>INSTALLED_APPS</code> means the Model we define in this same script counts as a registered "app" to Django.</div>
</div>

<h2>2) تعريف Model حقيقي / Defining a Real Model</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 كل Model هو كلاس Python بيرث من <code>models.Model</code>. كل Attribute فيه بيتحول لعمود في الجدول، ونوعه بيحدد نوع العمود: <code>CharField</code> = نص قصير محدود الطول، <code>BooleanField</code> = صح/خطأ. عادةً بتنشئ الجدول بأمر <code>migrate</code>، لكن هنا — من غير مشروع كامل — بنستخدم <code>connection.schema_editor()</code> عشان ننشئ الجدول يدويًا مباشرة من تعريف الكلاس.</div>
    <div class="en">🇬🇧 Every Model is a Python class inheriting from <code>models.Model</code>. Each attribute becomes a column, and its type decides the column's type: <code>CharField</code> = a length-limited short text, <code>BooleanField</code> = true/false. Normally you'd create the table with <code>migrate</code>, but here — with no full project — we use <code>connection.schema_editor()</code> to create the table directly from the class definition.</div>
</div>

<pre><code>from django.db import models

class Task(models.Model):
    title = models.CharField(max_length=200)
    is_done = models.BooleanField(default=False)

    class Meta:
        app_label = '__main__'

    def __str__(self):
        return self.title

from django.db import connection
with connection.schema_editor() as editor:
    editor.create_model(Task)

Task.objects.create(title="Learn Django Models", is_done=True)
Task.objects.create(title="Build the Admin Panel", is_done=False)
Task.objects.create(title="Deploy the project", is_done=False)

print("All tasks:")
for t in Task.objects.all():
    print(f"#{t.id}: {t.title} - done={t.is_done}")

print()
print("Only pending tasks:")
for t in Task.objects.filter(is_done=False):
    print(f"#{t.id}: {t.title}")

print()
print("Total tasks:", Task.objects.count())
done_count = Task.objects.filter(is_done=True).count()
print("Done tasks:", done_count)</code></pre>
<h3>الناتج الفعلي (مُنفَّذ فعليًا على قاعدة بيانات حقيقية) / Actual output (really executed against a real database)</h3>
<div class="output-box">All tasks:
#1: Learn Django Models - done=True
#2: Build the Admin Panel - done=False
#3: Deploy the project - done=False

Only pending tasks:
#2: Build the Admin Panel
#3: Deploy the project

Total tasks: 3
Done tasks: 1</div>

<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ <code>Task.objects.filter(is_done=False)</code> — دي بترجع بس الصفوف اللي مطابقة للشرط، من غير ما تكتب <code>WHERE</code> بنفسك. Django بيترجم <code>.filter()</code>، <code>.count()</code>، <code>.all()</code> لأوامر SQL فعلية وراء الكواليس (زي <code>SELECT * FROM task WHERE is_done = 0</code>) — الطبقة دي اسمها ORM (Object-Relational Mapper).</div>
    <div class="en">🇬🇧 Notice <code>Task.objects.filter(is_done=False)</code> — it returns only matching rows without you writing a <code>WHERE</code> clause. Django translates <code>.filter()</code>, <code>.count()</code>, <code>.all()</code> into real SQL behind the scenes (like <code>SELECT * FROM task WHERE is_done = 0</code>) — this layer is called the ORM (Object-Relational Mapper).</div>
</div>

<h2 id="practice">💻 جرّب بنفسك / Try It Yourself</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 نفس الكود اللي فوق، جاهز في المحرر تحت. جرّب تضيف Task جديدة، أو غيّر شرط الـ <code>filter()</code>، وشغّل الكود شوف الناتج بيتغيّر إزاي فعليًا.</div>
    <div class="en">🇬🇧 The exact same code from above, ready in the editor below. Try adding a new Task, or change the <code>filter()</code> condition, and run it to see the output actually change.</div>
</div>

<div class="mini-editor-wrap">
    <textarea spellcheck="false">import django
from django.conf import settings

settings.configure(
    INSTALLED_APPS=["__main__"],
    DATABASES={"default": {"ENGINE": "django.db.backends.sqlite3", "NAME": ":memory:"}},
    USE_TZ=True,
)
django.setup()

from django.db import models, connection

class Task(models.Model):
    title = models.CharField(max_length=200)
    is_done = models.BooleanField(default=False)

    class Meta:
        app_label = "__main__"

    def __str__(self):
        return self.title

with connection.schema_editor() as editor:
    editor.create_model(Task)

Task.objects.create(title="Learn Django Models", is_done=True)
Task.objects.create(title="Build the Admin Panel", is_done=False)
Task.objects.create(title="Deploy the project", is_done=False)

print("All tasks:")
for t in Task.objects.all():
    print(f"#{t.id}: {t.title} - done={t.is_done}")

print()
print("Only pending tasks:")
for t in Task.objects.filter(is_done=False):
    print(f"#{t.id}: {t.title}")

print("Total tasks:", Task.objects.count())</textarea>
    <div class="mini-toolbar">
        <button class="mini-run-btn">▶ شغّل / Run</button>
        <span class="mini-status"></span>
    </div>
    <div class="output-box">— لسه متشغلش / not run yet —</div>
</div>

<h2>3) تعديل صف موجود / Updating an Existing Row</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 عشان تعدّل صف: تجيبه بـ <code>.get()</code>، تغيّر الخاصية، وتنادي <code>.save()</code>. Django بيعمل <code>UPDATE</code> في قاعدة البيانات فعليًا، ولو جبت نفس الصف تاني من الجدول هتلاقي القيمة الجديدة محفوظة — مش بس متغيرة في الذاكرة.</div>
    <div class="en">🇬🇧 To update a row: fetch it with <code>.get()</code>, change the attribute, and call <code>.save()</code>. Django performs a real <code>UPDATE</code> against the database, and if you fetch that same row again from the table you'll find the new value actually persisted — not just changed in memory.</div>
</div>

<pre><code>t = Task.objects.create(title="Write the deployment lesson", is_done=False)
print("Before:", t.title, "-&gt; is_done =", t.is_done)

t.is_done = True
t.save()

fetched = Task.objects.get(id=t.id)
print("After:", fetched.title, "-&gt; is_done =", fetched.is_done)</code></pre>
<h3>الناتج الفعلي (مُنفَّذ فعليًا) / Actual output (really executed)</h3>
<div class="output-box">Before: Write the deployment lesson -> is_done = False
After: Write the deployment lesson -> is_done = True</div>

<h2>4) لوحة الإدارة — نفس الـ Model، واجهة كاملة / The Admin Panel — Same Model, a Full UI</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 دلوقتي الجزء الأشهر في Django: بمجرد ما تسجّل الـ Model في <code>admin.py</code>، Django بيبني تلقائيًا صفحة كاملة على <code>/admin</code> فيها: جدول بكل الصفوف، فورم إضافة/تعديل مبني تلقائيًا من نوع كل حقل (Checkbox لـ <code>BooleanField</code>، خانة نص لـ <code>CharField</code>)، بحث، وترتيب — كل ده من سطرين كود.</div>
    <div class="en">🇬🇧 Now Django's most famous feature: once you register a Model in <code>admin.py</code>, Django automatically builds a full page at <code>/admin</code> with: a table of every row, an add/edit form auto-generated from each field's type (a checkbox for <code>BooleanField</code>, a text box for <code>CharField</code>), search, and ordering — all from two lines of code.</div>
</div>

<pre><code># tasks/admin.py
from django.contrib import admin
from .models import Task

@admin.register(Task)
class TaskAdmin(admin.ModelAdmin):
    list_display = ('id', 'title', 'is_done')
    list_filter = ('is_done',)
    search_fields = ('title',)</code></pre>

<div class="bi-block">
    <div class="ar">🇪🇬 <b>ملحوظة صريحة:</b> الجزء ده (تسجيل الـ Model وتصرفات <code>TaskAdmin</code>) كود Django حقيقي وصحيح 100%، لكن عرضه فعليًا كصفحة HTML شغالة بيحتاج سيرفر Django شغّال + ملفات Static (CSS/JS بتاعة لوحة الإدارة) + مستخدم Admin مسجّل دخول — وده خارج نطاق سكريبت واحد بيتنفذ ويقفل زي أمثلة الـ Model فوق. يعني: طبقة الـ <b>Model والبيانات</b> اللي شفتها فوق اتنفذت فعليًا بالكامل، أما شكل صفحة <code>/admin</code> نفسها هنا وصف توضيحي أمين — تقدر تشوفه حقيقي 100% لو شغّلت مشروع Django كامل على جهازك (تمرين آخر الدرس).</div>
    <div class="en">🇬🇧 <b>Explicit honesty note:</b> this part (registering the Model and <code>TaskAdmin</code> options) is real, 100% correct Django code, but actually rendering it as a working HTML page needs a running Django server + static files (the admin panel's CSS/JS) + a logged-in Admin user — which is outside the scope of a single script that runs and exits, like the Model examples above. In short: the <b>Model and data layer</b> you saw above was genuinely, fully executed; the look of the <code>/admin</code> page itself here is an honest illustrative description — you can see it 100% for real if you run a full Django project on your machine (the exercise at the end of this lesson).</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="schema_editor">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">في سكريبت واحد بدون مشروع Django كامل، إيه اللي بيستخدم عشان ينشئ جدول قاعدة البيانات من الـ Model مباشرة؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">In a single script with no full Django project, what's used to create the database table directly from the Model?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="makemigrations"> <code>python manage.py makemigrations</code></label>
        <label><input type="radio" name="q1" value="schema_editor"> <code>connection.schema_editor().create_model()</code></label>
        <label><input type="radio" name="q1" value="startapp"> <code>django-admin startapp</code></label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="update">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">عشان تعدّل صف موجود فعليًا في قاعدة البيانات (مش بس في الذاكرة)، إيه الترتيب الصح؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">To actually update an existing row in the database (not just in memory), what's the right order?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="update"> تجيب الصف بـ <code>.get()</code>، تغيّر الخاصية، وتنادي <code>.save()</code></label>
        <label><input type="radio" name="q2" value="createonly"> تنادي <code>Task.objects.create()</code> تاني بنفس البيانات</label>
        <label><input type="radio" name="q2" value="printonly"> تغيّر قيمة الخاصية بس وتطبعها بـ <code>print()</code></label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="orm">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question"><code>Task.objects.filter(is_done=False)</code> بتترجم وراء الكواليس لإيه؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What does <code>Task.objects.filter(is_done=False)</code> translate to behind the scenes?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="orm"> أمر SQL فعلي (زي <code>SELECT ... WHERE is_done = 0</code>) عن طريق طبقة الـ ORM</label>
        <label><input type="radio" name="q3" value="loop"> حلقة Python عادية بتفحص كل الصفوف في الذاكرة من غير قاعدة بيانات</label>
        <label><input type="radio" name="q3" value="admin"> طلب HTTP للوحة الإدارة</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="illustrative">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">في الدرس ده، إيه اللي كان توضيحي (Illustrative) بصراحة ومش اتنفذ فعليًا، مقابل اللي اتنفذ فعليًا؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">In this lesson, what was honestly illustrative rather than really executed, versus what was really executed?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="illustrative"> إنشاء الجدول وإدخال/استعلام/تعديل البيانات اتنفذ فعليًا؛ شكل صفحة <code>/admin</code> نفسها وُصف توضيحيًا بس</label>
        <label><input type="radio" name="q4" value="reverse"> شكل صفحة <code>/admin</code> ظهر فعليًا؛ إدخال البيانات كان توضيحي بس</label>
        <label><input type="radio" name="q4" value="none"> كل حاجة في الدرس توضيحية ومفيش حاجة اتنفذت فعليًا</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ زوّد حقل وميثود جديدة / Add a Field and a New Method</h3>
    <div class="ar">🇪🇬 في المحرر المصغّر فوق، زوّد حقل <code>priority</code> (استخدم <code>models.IntegerField(default=1)</code>) لكلاس <code>Task</code>. بعد إضافة الحقل، أضف مهمتين جداد بأولويات مختلفة، ثم استخدم <code>Task.objects.filter(priority__gte=2)</code> عشان تجيب بس المهام اللي أولويتها 2 أو أكتر، واطبعها.</div>
    <div class="en">🇬🇧 In the mini editor above, add a <code>priority</code> field (use <code>models.IntegerField(default=1)</code>) to the <code>Task</code> class. After adding the field, create two new tasks with different priorities, then use <code>Task.objects.filter(priority__gte=2)</code> to fetch only tasks with priority 2 or higher, and print them.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 دلوقتي عندك Model شغال وبيانات حقيقية جواه. لكن لسه في سؤال مهم: إزاي طلب من متصفح المستخدم بيوصل أصلًا للكود ده ويرجع صفحة HTML؟ ده بالظبط موضوع الدرس الجاي — الـ Views والـ URLs والـ Templates — هنشوف فيه Client حقيقي بيبعت طلب ويستقبل رد فعلي.</div>
    <div class="en">🇬🇧 Now you have a working Model with real data inside it. But there's still an important question: how does a request from a user's browser actually reach this code and come back as an HTML page? That's exactly the next lesson's topic — Views, URLs, and Templates — where you'll see a real Client sending a request and receiving a real response.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li><code>settings.configure()</code> + <code>django.setup()</code> بيسمحوا بتشغيل Django في سكريبت واحد من غير مشروع كامل.</li>
        <li><code>connection.schema_editor().create_model()</code> بينشئ جدول فعلي من تعريف الـ Model — بديل <code>migrate</code> لسكريبت مستقل.</li>
        <li><code>.create()</code>، <code>.all()</code>، <code>.filter()</code>، <code>.get()</code>، <code>.save()</code> كلهم عمليات ORM حقيقية بتترجم لأوامر SQL فعلية.</li>
        <li>لوحة <code>/admin</code> بتتولد من نفس الـ Model بسطرين في <code>admin.py</code> — لكن عرضها كصفحة HTML شغالة محتاج سيرفر Django حقيقي، مش سكريبت مستقل.</li>
        <li>طبقة البيانات (Model) والطبقة اللي هتوصلها للمستخدم (View/Template) طبقتين منفصلتين — الدرس الجاي يغطي التانية.</li>
    </ul>
</div>

<div class="exercise-box">
    <h3>✍️ تمرين عملي / Hands-on Exercise</h3>
    <div class="ar">🇪🇬 على جهازك: كمّل من مشروع <code>mysite</code> اللي عملته في الدرس السابق. زوّد حقل <code>is_done</code> لـ Model <code>Post</code> (أو اعمل Model <code>Task</code> جديد بحقلي <code>title</code> و<code>is_done</code>)، اعمل <code>makemigrations</code> و<code>migrate</code>، سجّله في <code>admin.py</code> بنفس شكل <code>TaskAdmin</code> فوق، وشغّل <code>python manage.py runserver</code>. افتح <span class="ltr">http://127.0.0.1:8000/admin</span> وسجّل دخول بحساب <code>createsuperuser</code> — هتلاقي الـ Checkbox بتاع <code>is_done</code> وخانة البحث ظاهرين تلقائيًا، بالظبط زي ما اتوصف في الدرس.</div>
    <div class="en">🇬🇧 On your machine: continue from the <code>mysite</code> project you made in the previous lesson. Add an <code>is_done</code> field to the <code>Post</code> Model (or create a new <code>Task</code> Model with <code>title</code> and <code>is_done</code>), run <code>makemigrations</code> and <code>migrate</code>, register it in <code>admin.py</code> like <code>TaskAdmin</code> above, and run <code>python manage.py runserver</code>. Open <span class="ltr">http://127.0.0.1:8000/admin</span> and log in with a <code>createsuperuser</code> account — you'll see the <code>is_done</code> checkbox and the search box appear automatically, exactly as described in this lesson.</div>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="django.php">← المرحلة السابقة</a>
    <a href="django-views-templates.php">المرحلة الجاية / Next: Django Views, Templates &amp; URLs →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
