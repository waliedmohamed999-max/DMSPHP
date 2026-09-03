<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'django';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'إطار العمل Django';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">المرحلة 4 / Stage 4</span>
<h1>إطار العمل Django <span class="ltr">The Django Framework</span></h1>
<p class="subtitle">Django أشهر إطار عمل Python لبناء مواقع كاملة بسرعة — فيه كل حاجة جاهزة تقريبًا (قاعدة بيانات، لوحة تحكم إدارية، نظام مستخدمين) من أول يوم. كل الأمثلة والنواتج في الدرس ده اتنفذت فعليًا: <code>pip install django</code>، إنشاء مشروع حقيقي، تشغيل سيرفره، وطلب صفحة منه فعليًا.</p>

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
    <div class="ar">🇪🇬 تفهم فكرة Django وبنيته (MTV)، تعرف الفرق بين <code>models.py</code> و<code>views.py</code> و<code>urls.py</code>، وتشوف مشروع Django حقيقي شغال وبيرد على طلب فعلي.</div>
    <div class="en">🇬🇧 Understand Django's idea and architecture (MTV), know the difference between <code>models.py</code>, <code>views.py</code>, and <code>urls.py</code>, and see a real Django project actually running and responding to a real request.</div>
</div>

<h2 id="understand">1) تثبيت Django وإنشاء مشروع / Installing Django &amp; Starting a Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 Django مش جزء من Python الأساسية — لازم تتثبت بـ <code>pip</code> زي أي مكتبة تانية. بعد التثبيت، أمر <code>django-admin startproject</code> بينشئلك هيكل مشروع كامل جاهز للشغل.</div>
    <div class="en">🇬🇧 Django isn't part of core Python — it's installed with <code>pip</code> like any other library. After installing, <code>django-admin startproject</code> generates a complete, ready-to-run project skeleton.</div>
</div>

<pre><code>pip install django</code></pre>
<h3>الناتج الفعلي (مُنفَّذ فعليًا) / Actual output (really executed)</h3>
<div class="output-box">Collecting django
  Downloading django-6.1.1-py3-none-any.whl.metadata (3.9 kB)
Collecting asgiref&gt;=3.9.1 (from django)
Collecting sqlparse&gt;=0.5.0 (from django)
Downloading django-6.1.1-py3-none-any.whl (8.4 MB)
Installing collected packages: tzdata, sqlparse, asgiref, django

Successfully installed asgiref-3.12.1 django-6.1.1 sqlparse-0.6.0 tzdata-2026.3</div>

<pre><code>django-admin startproject demo</code></pre>
<h3>الناتج الفعلي (هيكل المشروع الناتج) / Actual output (resulting project structure)</h3>
<div class="output-box">demo/
├── manage.py
└── demo/
    ├── __init__.py
    ├── settings.py
    ├── urls.py
    ├── asgi.py
    └── wsgi.py</div>

<h2>2) بنية MTV — Model / Template / View</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 Django مبني على نمط اسمه <b>MTV</b> (شبيه بـ MVC اللي ممكن تكون سمعت عنه): <b>Model</b> بيمثل جدول قاعدة البيانات وبيتعامل مع البيانات، <b>Template</b> هو ملف الـ HTML اللي بيظهر للمستخدم، و<b>View</b> هي الدالة اللي بتستقبل الطلب، تجيب البيانات من الـ Model، وتقرر أي Template يترجع. الـ <code>urls.py</code> هو اللي بيوصل كل رابط (URL) بالـ View المسؤولة عنه.</div>
    <div class="en">🇬🇧 Django is built on a pattern called <b>MTV</b> (similar to MVC, which you may have heard of): a <b>Model</b> represents a database table and handles data, a <b>Template</b> is the HTML file shown to the user, and a <b>View</b> is the function that receives the request, fetches data from the Model, and decides which Template to return. <code>urls.py</code> connects each URL to the View responsible for it.</div>
</div>

<pre><code># blog/models.py — تعريف جدول Post في قاعدة البيانات
from django.db import models

class Post(models.Model):
    title = models.CharField(max_length=200)
    body = models.TextField()
    created_at = models.DateTimeField(auto_now_add=True)

    def __str__(self):
        return self.title</code></pre>

<div class="bi-block">
    <div class="ar">🇪🇬 كل خاصية في الـ Model (زي <code>title</code>، <code>body</code>) بتتحول أوتوماتيك لعمود في جدول قاعدة البيانات. Django بيبني أوامر SQL دي لوحده — مش محتاج تكتبها يدوي، بس تعمل "Migration".</div>
    <div class="en">🇬🇧 Each Model field (like <code>title</code>, <code>body</code>) automatically becomes a database column. Django generates the SQL for this itself — you don't write it by hand, you just create a "Migration".</div>
</div>

<pre><code>python manage.py makemigrations blog</code></pre>
<h3>الناتج الفعلي (مُنفَّذ فعليًا) / Actual output (really executed)</h3>
<div class="output-box">Migrations for 'blog':
  blog\migrations\0001_initial.py
    + Create model Post</div>

<pre><code>python manage.py migrate blog</code></pre>
<h3>الناتج الفعلي (مُنفَّذ فعليًا) / Actual output (really executed)</h3>
<div class="output-box">Operations to perform:
  Apply all migrations: blog
Running migrations:
  Applying blog.0001_initial... OK</div>

<div class="bi-block">
    <div class="ar">🇪🇬 وبعد ما الجدول اتعمل فعليًا، لما نضيف Post ونستعلم عنه من كود Python عادي، Django بيرجع لنا Object حقيقي — مش نص خام زي استعلام SQL يدوي.</div>
    <div class="en">🇬🇧 Once the table really exists, when we add a Post and query it from plain Python code, Django hands back a real Object — not raw text like a manual SQL query.</div>
</div>

<pre><code>from blog.models import Post

Post.objects.create(title="Hello Django", body="My first post")

for p in Post.objects.all():
    print(f"#{p.id}: {p.title} - {p.body}")</code></pre>
<h3>الناتج الفعلي (مُنفَّذ فعليًا على قاعدة بيانات حقيقية) / Actual output (really executed against a real database)</h3>
<div class="output-box">#1: Hello Django - My first post</div>

<h2 id="practice">💻 جرّب Django بنفسك بدون مشروع كامل / Try Django Yourself, No Full Project Needed</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 المحرر تحت مش محتاج <code>manage.py</code> ولا ملفات مشروع منفصلة — بيعمل <code>django.conf.settings.configure()</code> يدوي عشان يجهّز Django في سكريبت واحد، وبيستخدم قاعدة بيانات SQLite "في الذاكرة" (<code>:memory:</code>) بدل ملف حقيقي. النتيجة: نفس فكرة <code>Post.objects.create()</code> و<code>Post.objects.all()</code> اللي فوق، لكن شغالة فعليًا وقابلة للتعديل هنا مباشرة.</div>
    <div class="en">🇬🇧 The editor below doesn't need <code>manage.py</code> or separate project files — it calls <code>django.conf.settings.configure()</code> manually to set Django up in a single script, using an in-memory SQLite database (<code>:memory:</code>) instead of a real file. The result: the same <code>Post.objects.create()</code> and <code>Post.objects.all()</code> idea from above, but actually running and editable right here.</div>
</div>

<div class="mini-editor-wrap">
    <textarea spellcheck="false">import django
from django.conf import settings

settings.configure(
    INSTALLED_APPS=["__main__"],
    DATABASES={"default": {"ENGINE": "django.db.backends.sqlite3", "NAME": ":memory:"}},
)
django.setup()

from django.db import models, connection

class Post(models.Model):
    title = models.CharField(max_length=200)
    body = models.TextField()

    class Meta:
        app_label = "__main__"

    def __str__(self):
        return self.title

with connection.schema_editor() as editor:
    editor.create_model(Post)

Post.objects.create(title="Hello Django", body="My first post")
Post.objects.create(title="Second Post", body="Testing the mini editor")

for p in Post.objects.all():
    print(f"#{p.id}: {p.title} - {p.body}")</textarea>
    <div class="mini-toolbar">
        <button class="mini-run-btn">▶ شغّل / Run</button>
        <span class="mini-status"></span>
    </div>
    <div class="output-box">— لسه متشغلش / not run yet —</div>
</div>

<h2>3) الـ View والـ URL — الرد على طلب فعلي</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 الـ View أبسط حاجة ممكن تتخيلها: دالة بتاخد <code>request</code> وترجع <code>response</code>. الـ <code>urls.py</code> بيربط المسار (زي <code>/</code>) بالدالة دي.</div>
    <div class="en">🇬🇧 A View is as simple as it gets: a function that takes a <code>request</code> and returns a <code>response</code>. <code>urls.py</code> connects a path (like <code>/</code>) to that function.</div>
</div>

<pre><code># demo/views.py
from django.http import HttpResponse

def home(request):
    return HttpResponse("Hello from Django!")</code></pre>

<pre><code># demo/urls.py
from django.contrib import admin
from django.urls import path
from demo.views import home

urlpatterns = [
    path('admin/', admin.site.urls),
    path('', home, name='home'),
]</code></pre>

<div class="bi-block">
    <div class="ar">🇪🇬 دلوقتي نشغّل سيرفر التطوير بتاع Django فعليًا، ونطلب الصفحة الرئيسية بـ <code>curl</code> — زي ما هتعمل بالظبط لما تفتح المتصفح على مشروعك.</div>
    <div class="en">🇬🇧 Now we start Django's real development server, and request the home page with <code>curl</code> — exactly like opening your browser on your project.</div>
</div>

<pre><code>python manage.py runserver 127.0.0.1:5098</code></pre>
<h3>الناتج الفعلي (طلب curl حقيقي على السيرفر الشغال) / Actual output (a real curl request against the running server)</h3>
<div class="output-box">$ curl http://127.0.0.1:5098/
Hello from Django!</div>

<h2>4) لوحة الإدارة الجاهزة / The Built-in Admin Panel</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 من أشهر مميزات Django: لوحة إدارة كاملة (<code>/admin</code>) بتتولد أوتوماتيك من الـ Models بتاعتك، تقدر منها تضيف/تعدل/تمسح بيانات من غير ما تكتب ولا سطر HTML. تكفي سطرين في <code>admin.py</code>.</div>
    <div class="en">🇬🇧 One of Django's most famous features: a full admin panel (<code>/admin</code>) auto-generated from your Models, letting you add/edit/delete data without writing a single line of HTML. Just two lines in <code>admin.py</code>.</div>
</div>

<pre><code># blog/admin.py
from django.contrib import admin
from .models import Post

admin.site.register(Post)</code></pre>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="view">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">في نمط MTV، مين المسؤول عن استقبال الطلب وتقرير أي Template يترجع؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">In the MTV pattern, what receives the request and decides which Template to return?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="model"> Model</label>
        <label><input type="radio" name="q1" value="template"> Template</label>
        <label><input type="radio" name="q1" value="view"> View</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="migrate">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">أي أمر بينفذ التغييرات فعليًا على قاعدة البيانات؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Which command actually applies changes to the database?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="makemigrations"> makemigrations</label>
        <label><input type="radio" name="q2" value="migrate"> migrate</label>
        <label><input type="radio" name="q2" value="runserver"> runserver</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ زوّد Model جديد / Add a New Model</h3>
    <div class="ar">🇪🇬 في المحرر المصغّر فوق، زوّد Model جديد اسمه <code>Comment</code> فيه حقلين: <code>post_title</code> (نص) و<code>text</code> (نص طويل). اعمله <code>editor.create_model()</code> زي <code>Post</code> بالظبط، وأضف تعليقين مرتبطين بعنوان أول Post، واطبعهم كلهم.</div>
    <div class="en">🇬🇧 In the mini editor above, add a new <code>Comment</code> Model with two fields: <code>post_title</code> (text) and <code>text</code> (long text). Create its table with <code>editor.create_model()</code> just like <code>Post</code>, add two comments referencing the first Post's title, and print them all.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 Django أو Flask؟ مش لازم تختار واحد بس. مشاريع حقيقية كتير بتستخدم Django لأجزاء المشروع الكبيرة (المستخدمين، لوحة الإدارة) وFlask لـ Microservice صغير بيعمل مهمة واحدة بسرعة. في الدرس الجاي هتشوف Flask، وفي الآخر هتقدر تقارن العملي بينهم وتقرر إمتى تستخدم كل واحد.</div>
    <div class="en">🇬🇧 Django or Flask? You don't have to pick just one. Many real projects use Django for the big parts (users, admin panel) and a small Flask microservice for one fast, focused job. Next lesson covers Flask, and by the end you'll be able to compare them practically and decide when to reach for each.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>Django = إطار عمل "بطاريات مضمّنة" (batteries-included) — قاعدة بيانات، مستخدمين، لوحة إدارة، كله جاهز.</li>
        <li>MTV: <b>Model</b> (البيانات) + <b>Template</b> (الواجهة) + <b>View</b> (المنطق اللي بيربط بينهم).</li>
        <li><code>makemigrations</code> يولّد أوامر SQL من الـ Model، و<code>migrate</code> بينفذها فعليًا على قاعدة البيانات.</li>
        <li><code>urls.py</code> بيربط كل رابط بدالة View مسؤولة عنه.</li>
        <li>لوحة <code>/admin</code> بتتولد أوتوماتيك من الـ Models — من غير ما تكتب HTML.</li>
    </ul>
</div>

<div class="exercise-box">
    <h3>✍️ تمرين عملي / Hands-on Exercise</h3>
    <div class="ar">🇪🇬 على جهازك: اعمل <code>pip install django</code> ثم <code>django-admin startproject mysite</code>. جوه المشروع اعمل تطبيق بـ <code>python manage.py startapp blog</code>، عرّف Model اسمه <code>Post</code> فيه <code>title</code> و<code>body</code>، اعمل <code>makemigrations</code> و<code>migrate</code>، وسجّله في <code>admin.py</code>. شغّل <code>python manage.py runserver</code> وافتح <span class="ltr">http://127.0.0.1:8000/admin</span> في المتصفح — هتلاقي لوحة إدارة كاملة اتبنت من غير ما تكتب أي HTML.</div>
    <div class="en">🇬🇧 On your machine: run <code>pip install django</code> then <code>django-admin startproject mysite</code>. Inside it, create an app with <code>python manage.py startapp blog</code>, define a <code>Post</code> Model with <code>title</code> and <code>body</code>, run <code>makemigrations</code> and <code>migrate</code>, and register it in <code>admin.py</code>. Run <code>python manage.py runserver</code> and open <span class="ltr">http://127.0.0.1:8000/admin</span> in your browser — you'll find a full admin panel built with zero HTML written by you.</div>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="python-basics.php">← المرحلة السابقة</a>
    <a href="flask.php">المرحلة الجاية / Next: The Flask Framework →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
