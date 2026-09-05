<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'django-views-templates';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'Django: Views وTemplates وURLs';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">Django</span>
<h1>Django: Views وTemplates وURLs <span class="ltr">Django: Views, Templates &amp; URLs</span></h1>
<p class="subtitle">في الدرس اللي فات بنينا Model وبيانات حقيقية. هنا هنغلق الدايرة: نشوف إزاي طلب حقيقي من متصفح المستخدم بيوصل لكود Django (View)، يمر على <code>urls.py</code>، وممكن يستخدم Template عشان يرجّع صفحة HTML كاملة. كل حاجة هنا اتنفذت فعليًا بـ <code>django.test.Client</code> — أداة Django الرسمية لمحاكاة طلبات HTTP حقيقية من غير ما تحتاج سيرفر شغّال فعليًا.</p>

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
    <div class="ar">🇪🇬 تكتب View حقيقية وتربطها بـ URL فعلي عن طريق <code>path()</code>، تبعتلها طلب حقيقي بـ <code>django.test.Client</code> وتشوف الرد الفعلي (Status Code + Body)، وتعرض بيانات ديناميكية جوه HTML حقيقي عن طريق Django Templates.</div>
    <div class="en">🇬🇧 Write a real View and wire it to a real URL with <code>path()</code>, send it a real request with <code>django.test.Client</code> and see the actual response (status code + body), and render dynamic data inside real HTML using Django Templates.</div>
</div>

<h2 id="understand">1) View بسيطة + URL + طلب فعلي / A Simple View + URL + a Real Request</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 الـ View دالة بتاخد <code>request</code> وترجع <code>response</code> — زي ما شفنا في نظرة Django العامة. الجديد هنا: بدل ما نشغّل سيرفر فعلي بـ <code>runserver</code> ونطلبه بـ <code>curl</code>، هنستخدم <code>django.test.Client</code>: كائن بيحاكي متصفح، وبيبعت طلب فعلي يمر على نفس دورة حياة Django كاملة (Routing → View → Response) من غير ما يحتاج Socket شبكة أو Port فعلي مفتوح.</div>
    <div class="en">🇬🇧 A View is a function that takes a <code>request</code> and returns a <code>response</code> — as seen in the Django overview. What's new here: instead of running a real server with <code>runserver</code> and hitting it with <code>curl</code>, we use <code>django.test.Client</code>: an object that simulates a browser and sends a real request through Django's full request/response cycle (Routing → View → Response) with no actual network socket or open port needed.</div>
</div>

<pre><code>import django
from django.conf import settings

settings.configure(
    DEBUG=True,
    ROOT_URLCONF=__name__,
    ALLOWED_HOSTS=['testserver'],
    USE_TZ=True,
    SECRET_KEY='sandbox-test-key',
)
django.setup()

from django.http import HttpResponse
from django.urls import path

def home(request):
    return HttpResponse("Hello from a real Django view!")

def greet(request, name):
    return HttpResponse(f"Hello, {name}! This came from a URL parameter.")

urlpatterns = [
    path('', home, name='home'),
    path('greet/&lt;str:name&gt;/', greet, name='greet'),
]

from django.test import Client
client = Client()

response = client.get('/')
print("GET / -&gt; status:", response.status_code)
print("Body:", response.content.decode())

print()

response2 = client.get('/greet/Waleed/')
print("GET /greet/Waleed/ -&gt; status:", response2.status_code)
print("Body:", response2.content.decode())

print()

response3 = client.get('/does-not-exist/')
print("GET /does-not-exist/ -&gt; status:", response3.status_code)</code></pre>
<h3>الناتج الفعلي (طلب Client حقيقي مر فعليًا على Routing كامل) / Actual output (a real Client request that really went through full routing)</h3>
<div class="output-box">GET / -> status: 200
Body: Hello from a real Django view!

GET /greet/Waleed/ -> status: 200
Body: Hello, Waleed! This came from a URL parameter.

Not Found: /does-not-exist/
GET /does-not-exist/ -> status: 404</div>

<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ حاجتين: أولًا <code>ROOT_URLCONF=__name__</code> — بيقول لـ Django "هات <code>urlpatterns</code> من نفس السكريبت ده". ثانيًا <code>&lt;str:name&gt;</code> جوه <code>path()</code> — ده "URL Converter"، بياخد الجزء ده من الرابط، يتأكد إنه نص، ويبعته للـ View كـ Parameter مباشرة (<code>name</code>) بدل ما تستخرجه يدوي زي <code>$_GET</code> في PHP. وسطر <code>Not Found: /does-not-exist/</code> ده سجل حقيقي من Django نفسه (مش من كودنا) بيوضح إنه فعلاً دوّر ولقيش الرابط.</div>
    <div class="en">🇬🇧 Notice two things: first, <code>ROOT_URLCONF=__name__</code> tells Django "load <code>urlpatterns</code> from this same script." Second, <code>&lt;str:name&gt;</code> inside <code>path()</code> is a "URL Converter" — it captures that part of the URL, verifies it's text, and passes it straight to the View as a parameter (<code>name</code>) instead of you extracting it manually like PHP's <code>$_GET</code>. And the <code>Not Found: /does-not-exist/</code> line is a genuine log line from Django itself (not our code) confirming it really searched and didn't find that route.</div>
</div>

<h2 id="practice">💻 جرّب بنفسك / Try It Yourself</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 نفس كود الـ View والـ URL فوق، جاهز في المحرر تحت. جرّب تضيف <code>path()</code> جديد بـ View تانية، أو غيّر الـ URL Converter لـ <code>&lt;int:...&gt;</code> وابعتله رقم بدل نص.</div>
    <div class="en">🇬🇧 The same View and URL code from above, ready in the editor below. Try adding a new <code>path()</code> with another View, or change the URL Converter to <code>&lt;int:...&gt;</code> and send it a number instead of text.</div>
</div>

<div class="mini-editor-wrap">
    <textarea spellcheck="false">import django
from django.conf import settings

settings.configure(
    ROOT_URLCONF="__main__",
    ALLOWED_HOSTS=["testserver"],
    USE_TZ=True,
    SECRET_KEY="sandbox-test-key",
)
django.setup()

from django.http import HttpResponse
from django.urls import path

def home(request):
    return HttpResponse("Hello from a real Django view!")

def greet(request, name):
    return HttpResponse(f"Hello, {name}! This came from a URL parameter.")

def double(request, number):
    return HttpResponse(f"Double of {number} is {number * 2}")

urlpatterns = [
    path("", home, name="home"),
    path("greet/<str:name>/", greet, name="greet"),
    path("double/<int:number>/", double, name="double"),
]

from django.test import Client
client = Client()

print(client.get("/").content.decode())
print(client.get("/greet/Sara/").content.decode())
print(client.get("/double/21/").content.decode())</textarea>
    <div class="mini-toolbar">
        <button class="mini-run-btn">▶ شغّل / Run</button>
        <span class="mini-status"></span>
    </div>
    <div class="output-box">— لسه متشغلش / not run yet —</div>
</div>

<h2>2) Templates — HTML حقيقي بمتغيرات حقيقية / Templates — Real HTML with Real Variables</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 أغلب الـ Views الحقيقية مش بترجع نص عادي زي فوق — بترجع صفحة HTML كاملة فيها بيانات متغيرة. Django بيعمل ده بلغة قوالب اسمها Django Template Language: <code>{{ متغير }}</code> لعرض قيمة، و<code>{% for %}</code> / <code>{% if %}</code> لمنطق العرض. <code>Template</code> بياخد النص، و<code>Context</code> بيديله القيم.</div>
    <div class="en">🇬🇧 Most real Views don't return plain text like above — they return a full HTML page with dynamic data. Django does this with a template language called the Django Template Language: <code>{{ variable }}</code> displays a value, and <code>{% for %}</code> / <code>{% if %}</code> handle display logic. <code>Template</code> takes the text, and <code>Context</code> supplies the values.</div>
</div>

<pre><code>from django.template import Template, Context

template_str = """
&lt;h1&gt;Welcome, {{ username }}!&lt;/h1&gt;
&lt;p&gt;You have {{ task_count }} task{{ task_count|pluralize }} left.&lt;/p&gt;
&lt;ul&gt;
{% for task in tasks %}
    &lt;li{% if task.done %} class="done"{% endif %}&gt;{{ task.title }}&lt;/li&gt;
{% endfor %}
&lt;/ul&gt;
"""

t = Template(template_str)
c = Context({
    "username": "Waleed",
    "task_count": 2,
    "tasks": [
        {"title": "Learn Django templates", "done": True},
        {"title": "Deploy the app", "done": False},
    ],
})

rendered = t.render(c)
print(rendered)</code></pre>
<h3>الناتج الفعلي (Template حقيقي اتفسّر وترجم لـ HTML) / Actual output (a real Template parsed and rendered to HTML)</h3>
<div class="output-box">&lt;h1&gt;Welcome, Waleed!&lt;/h1&gt;
&lt;p&gt;You have 2 tasks left.&lt;/p&gt;
&lt;ul&gt;

    &lt;li class="done"&gt;Learn Django templates&lt;/li&gt;

    &lt;li&gt;Deploy the app&lt;/li&gt;

&lt;/ul&gt;</div>

<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ <code>{{ task_count|pluralize }}</code> — الـ <code>|</code> ده اسمه "Filter"، بيعدّل طريقة عرض القيمة (هنا بيضيف <code>s</code> لو العدد أكتر من واحد، فبيطبع "tasks" مش "task"). ولاحظ إن <code>task.done</code> بيشتغل من غير أقواس زي دالة — Django بيفهم لوحده إنه Dictionary Key أو Object Attribute.</div>
    <div class="en">🇬🇧 Notice <code>{{ task_count|pluralize }}</code> — the <code>|</code> is called a "Filter," it adjusts how a value is displayed (here, it adds an <code>s</code> when the count is more than one, printing "tasks" not "task"). Also notice <code>task.done</code> works with no function-call parentheses — Django figures out on its own whether it's a Dictionary key or an Object attribute.</div>
</div>

<h2>3) View + Template مع بعض عن طريق Client / A View + Template Together via Client</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 دلوقتي نجمع الاتنين: View بترجّع Template متفسّر فعليًا، والكل بيمر على <code>Client</code> زي ما هيحصل بالظبط لما مستخدم حقيقي يفتح المتصفح.</div>
    <div class="en">🇬🇧 Now let's combine both: a View that returns a genuinely rendered Template, all going through <code>Client</code> exactly as it would when a real user opens their browser.</div>
</div>

<pre><code>TASK_LIST_TEMPLATE = """&lt;h1&gt;{{ username }}'s Tasks&lt;/h1&gt;
&lt;ul&gt;
{% for task in tasks %}&lt;li{% if task.done %} class="done"{% endif %}&gt;{{ task.title }}&lt;/li&gt;
{% endfor %}&lt;/ul&gt;"""

def task_list(request):
    tasks = [
        {"title": "Learn views", "done": True},
        {"title": "Learn templates", "done": True},
        {"title": "Ship the project", "done": False},
    ]
    html = Template(TASK_LIST_TEMPLATE).render(Context({
        "username": "Waleed",
        "tasks": tasks,
    }))
    return HttpResponse(html)

urlpatterns = [
    path('tasks/', task_list, name='task_list'),
]

client = Client()
response = client.get('/tasks/')
print("GET /tasks/ -&gt; status:", response.status_code)
print("Content-Type:", response.headers['Content-Type'])
print()
print(response.content.decode())</code></pre>
<h3>الناتج الفعلي (طلب حقيقي مر على View رجّعت Template متفسّر) / Actual output (a real request through a View returning a rendered Template)</h3>
<div class="output-box">GET /tasks/ -> status: 200
Content-Type: text/html; charset=utf-8

&lt;h1&gt;Waleed's Tasks&lt;/h1&gt;
&lt;ul&gt;
&lt;li class="done"&gt;Learn views&lt;/li&gt;
&lt;li class="done"&gt;Learn templates&lt;/li&gt;
&lt;li&gt;Ship the project&lt;/li&gt;
&lt;/ul&gt;</div>

<div class="bi-block">
    <div class="ar">🇪🇬 في مشروع Django حقيقي مش هتكتب الـ Template كنص جوه Python كده — هتحطه في ملف <code>.html</code> منفصل جوه فولدر <code>templates/</code>، وتستخدم <code>render(request, 'tasks/list.html', context)</code> بدل <code>Template()</code>/<code>Context()</code> اليدوي. النتيجة النهائية (HTML بمتغيرات متفسّرة) هي نفسها بالظبط — إحنا هنا بس بنشيل الحاجة لملفات منفصلة عشان يشتغل في سكريبت واحد.</div>
    <div class="en">🇬🇧 In a real Django project you wouldn't write the Template as an inline Python string like this — you'd put it in a separate <code>.html</code> file inside a <code>templates/</code> folder, and use <code>render(request, 'tasks/list.html', context)</code> instead of manual <code>Template()</code>/<code>Context()</code>. The final result (HTML with interpolated variables) is exactly the same — here we just drop the need for separate files so it runs in one script.</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="client">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">إيه اللي استخدمناه في الدرس ده عشان نبعت طلب HTTP حقيقي لـ View من غير سيرفر فعلي شغّال على Port؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What did we use in this lesson to send a real HTTP request to a View without an actual server running on a port?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="curl"> <code>curl</code> من الـ Terminal</label>
        <label><input type="radio" name="q1" value="client"> <code>django.test.Client</code></label>
        <label><input type="radio" name="q1" value="admin"> لوحة الإدارة <code>/admin</code></label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="converter">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">في <code>path('greet/&lt;str:name&gt;/', greet)</code>، إيه دور <code>&lt;str:name&gt;</code>؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">In <code>path('greet/&lt;str:name&gt;/', greet)</code>, what does <code>&lt;str:name&gt;</code> do?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="converter"> بيلتقط جزء من الرابط كنص، ويبعته كـ Parameter مباشرة للـ View</label>
        <label><input type="radio" name="q2" value="template"> بيحدد اسم ملف الـ Template اللي هيتعرض</label>
        <label><input type="radio" name="q2" value="model"> بيعرّف Model جديد اسمه <code>name</code></label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="filter">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">في <code>{{ task_count|pluralize }}</code>، إيه اسم <code>|pluralize</code>؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">In <code>{{ task_count|pluralize }}</code>, what is <code>|pluralize</code> called?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="filter"> Template Filter — بيعدّل طريقة عرض القيمة</label>
        <label><input type="radio" name="q3" value="view"> View جديدة</label>
        <label><input type="radio" name="q3" value="urlparam"> URL Parameter</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="samehtml">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">إيه الفرق الفعلي بين استخدام <code>Template()</code>/<code>Context()</code> يدوي هنا واستخدام <code>render()</code> مع ملف <code>.html</code> منفصل في مشروع حقيقي؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What's the real difference between using manual <code>Template()</code>/<code>Context()</code> here and <code>render()</code> with a separate <code>.html</code> file in a real project?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="samehtml"> النتيجة النهائية (HTML متفسّر) نفس الفكرة بالظبط — الفرق مكان تخزين نص الـ Template بس</label>
        <label><input type="radio" name="q4" value="different"> <code>render()</code> بيرجع بيانات مختلفة تمامًا عن الـ HTML</label>
        <label><input type="radio" name="q4" value="nofilters"> <code>Template()</code> اليدوي معندهوش Filters ولا Tags زي <code>{% for %}</code></label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ View جديدة بـ URL Parameter ورقم / A New View with a Numeric URL Parameter</h3>
    <div class="ar">🇪🇬 في المحرر المصغّر فوق، أضف View اسمها <code>task_detail</code> على المسار <code>tasks/&lt;int:task_id&gt;/</code>، تستقبل <code>task_id</code> وترجع <code>HttpResponse</code> بنص فيه رقم المهمة (زي <code>f"Task #{task_id}"</code>). ابعتلها طلب بـ <code>Client</code> على <code>/tasks/2/</code> واطبع الـ status code والمحتوى.</div>
    <div class="en">🇬🇧 In the mini editor above, add a View called <code>task_detail</code> on the path <code>tasks/&lt;int:task_id&gt;/</code>, receiving <code>task_id</code> and returning an <code>HttpResponse</code> with text containing the task number (like <code>f"Task #{task_id}"</code>). Send it a request with <code>Client</code> on <code>/tasks/2/</code> and print the status code and content.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 دلوقتي شفت الدايرة كاملة: Model (البيانات) → View (المنطق) → Template (العرض) → URL (الربط) → Client/Browser (الطلب والرد). آخر سؤال باقي مش عن كتابة كود Django تاني، لكن عن حاجة عملية بحتة: إزاي تاخد المشروع ده من جهازك وتحطه شغال على الإنترنت فعليًا لناس تانية تستخدمه؟ ده موضوع الدرس الجاي والأخير في المسار.</div>
    <div class="en">🇬🇧 You've now seen the full loop: Model (data) → View (logic) → Template (presentation) → URL (wiring) → Client/Browser (request and response). One question remains — not more Django code, but a purely practical one: how do you take this project from your machine and put it live on the internet for other people to use? That's the topic of the final lesson in this track.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li><code>django.test.Client</code> بيبعت طلبات HTTP حقيقية بتمر على Routing/View/Response كامل من غير سيرفر شغّال فعليًا.</li>
        <li><code>path('route/&lt;type:name&gt;/', view)</code> بيربط رابط بدالة View، والـ Converter (زي <code>str</code>، <code>int</code>) بيستخرج ويتحقق من جزء الرابط تلقائيًا.</li>
        <li>Django Template Language: <code>{{ var }}</code> لعرض قيمة، <code>{% for %}</code>/<code>{% if %}</code> لمنطق العرض، <code>|filter</code> لتعديل طريقة العرض.</li>
        <li><code>Template(نص).render(Context(بيانات))</code> بيرجع HTML حقيقي متفسّر بالكامل — نفس فكرة <code>render()</code> في مشروع حقيقي مع ملف <code>.html</code> منفصل.</li>
        <li>View حقيقية تقدر ترجّع Template متفسّر جوه <code>HttpResponse</code>، وده اللي المستخدم شايفه فعليًا في متصفحه.</li>
    </ul>
</div>

<div class="exercise-box">
    <h3>✍️ تمرين عملي / Hands-on Exercise</h3>
    <div class="ar">🇪🇬 على جهازك: في مشروع <code>mysite</code>، اعمل فولدر <code>templates/blog/</code> جواه ملف <code>list.html</code> فيه <code>{% for post in posts %}</code> بيعرض عنوان كل Post. في <code>views.py</code> اكتب View بتجيب <code>Post.objects.all()</code> وترجع <code>render(request, 'blog/list.html', {'posts': posts})</code>، واربطها في <code>urls.py</code> بمسار <code>posts/</code>. شغّل السيرفر وافتح <span class="ltr">http://127.0.0.1:8000/posts/</span> — هتشوف بيانات قاعدة البيانات الحقيقية ظاهرة في صفحة HTML فعلية.</div>
    <div class="en">🇬🇧 On your machine: in the <code>mysite</code> project, create a <code>templates/blog/</code> folder with a <code>list.html</code> file containing <code>{% for post in posts %}</code> displaying each Post's title. In <code>views.py</code>, write a View that fetches <code>Post.objects.all()</code> and returns <code>render(request, 'blog/list.html', {'posts': posts})</code>, and wire it in <code>urls.py</code> to a <code>posts/</code> path. Run the server and open <span class="ltr">http://127.0.0.1:8000/posts/</span> — you'll see real database data rendered in an actual HTML page.</div>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="django-models-admin.php">← المرحلة السابقة</a>
    <a href="python-web-deployment.php">المرحلة الجاية / Next: Deploying a Python Web App →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
