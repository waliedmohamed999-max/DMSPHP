<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'setup';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'الأدوات والإعدادات';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">المرحلة 1 / Stage 1</span>
<h1>الأدوات والإعدادات <span class="ltr">Tools &amp; Setup</span></h1>
<p class="subtitle">قبل ما تكتب أي سطر Python، لازم تتأكد إن اللغة متثبتة صح على جهازك، وتفهم دور <code>pip</code> والـ Virtual Environments — الأساس اللي أي مشروع Python حقيقي (بما فيه Django وFlask بعد كده) بيتبني عليه.</p>

<div class="step-tracker">
    <a href="#read">📖 Read</a>
    <a href="#understand">🧠 Understand</a>
    <a href="#quiz">🧠 Quiz</a>
    <a href="#challenge">🛠️ Challenge</a>
    <a href="#project">🚀 Project</a>
</div>

<h2 id="read">الهدف / Goal</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 تتأكد إن Python متثبت، تفهم إيه هو <code>pip</code> ودوره في تثبيت المكتبات، وتتعلم إزاي تعمل Virtual Environment معزول لكل مشروع عشان المكتبات ما تتعاركش مع بعض.</div>
    <div class="en">🇬🇧 Confirm Python is installed, understand what <code>pip</code> is and its role in installing libraries, and learn how to create an isolated Virtual Environment per project so libraries don't clash.</div>
</div>

<h2 id="understand">1) التأكد من تثبيت Python / Checking Python Is Installed</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 افتح الـ Terminal (أو CMD / PowerShell على ويندوز) واكتب الأمر ده. لو ظهر رقم إصدار، يبقى Python متثبت وجاهز. النسخة اللي شغالة فعليًا على السيرفر بتاع المنصة دي هي اللي ظاهرة في الناتج تحت — تم تنفيذها فعليًا مش نسخ ولزق.</div>
    <div class="en">🇬🇧 Open your Terminal (or CMD / PowerShell on Windows) and run this command. If a version number appears, Python is installed and ready. The output below is the real version running on this platform's server — actually executed, not copy-pasted.</div>
</div>

<pre><code>python --version</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">Python 3.14.0</div>

<div class="bi-block">
    <div class="ar">🇪🇬 لو ظهرت رسالة زي <code>'python' is not recognized</code>، يبقى Python مش متثبت أو مش مضاف لمتغير <code>PATH</code>. الحل: نزّل النسخة من <span class="ltr">python.org</span> وأثناء التثبيت فعّل الاختيار <span class="ltr">"Add Python to PATH"</span>.</div>
    <div class="en">🇬🇧 If you see a message like <code>'python' is not recognized</code>, Python isn't installed or isn't on your <code>PATH</code>. Fix: download it from <span class="ltr">python.org</span> and check <span class="ltr">"Add Python to PATH"</span> during installation.</div>
</div>

<div class="bi-block">
    <div class="ar">🇪🇬 بدل ما تفتح Terminal بره المنصة، جرّب نفس الفكرة دلوقتي جوه المحرر المصغّر تحت — الكود ده بيطبع نسخة Python وبيئة التشغيل بنفس الطريقة اللي <code>python --version</code> بتعملها، بس من جوه كود Python نفسه (بمكتبة <code>sys</code>):</div>
    <div class="en">🇬🇧 Instead of opening a Terminal outside the platform, try the same idea right now in the mini editor below — this code prints the Python version and runtime the same way <code>python --version</code> does, but from inside Python code itself (via the <code>sys</code> module):</div>
</div>

<div class="mini-editor-wrap">
    <textarea spellcheck="false">import sys
print(f"Python version: {sys.version}")
print(f"Running on: {sys.platform}")</textarea>
    <div class="mini-toolbar">
        <button class="mini-run-btn">▶ شغّل / Run</button>
        <span class="mini-status"></span>
    </div>
    <div class="output-box">— لسه متشغلش / not run yet —</div>
</div>

<h2>2) pip — مدير المكتبات / The Package Manager</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <code>pip</code> بييجي مع Python أوتوماتيك، ودوره تحميل وتثبيت أي مكتبة جاهزة تحتاجها (زي Django أو Flask بعد كده) — مقابل <code>composer</code> في PHP بالظبط.</div>
    <div class="en">🇬🇧 <code>pip</code> ships with Python automatically, and its job is downloading and installing any ready-made library you need (like Django or Flask later) — the exact equivalent of PHP's <code>composer</code>.</div>
</div>

<pre><code>pip --version</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">pip 25.2 from C:\Python314\Lib\site-packages\pip (python 3.14)</div>

<div class="bi-block">
    <div class="ar">🇪🇬 وعشان تثبت مكتبة معينة، بتكتب <code>pip install اسم_المكتبة</code>. هنستخدم الأمر ده فعليًا لما نوصل لمراحل Django وFlask.</div>
    <div class="en">🇬🇧 To install a specific library, you run <code>pip install library_name</code>. We'll use this for real once we reach the Django and Flask stages.</div>
</div>

<pre><code>pip install flask</code></pre>
<h3>الناتج الفعلي (مُنفَّذ فعليًا) / Actual output (really executed)</h3>
<div class="output-box">Collecting flask
  Downloading flask-3.1.3-py3-none-any.whl.metadata (3.2 kB)
Collecting werkzeug&gt;=3.1.0 (from flask)
  Downloading werkzeug-3.1.8-py3-none-any.whl.metadata (4.0 kB)
Collecting jinja2&gt;=3.1.2 (from flask)
  Downloading jinja2-3.1.6-py3-none-any.whl.metadata (2.9 kB)
Installing collected packages: markupsafe, itsdangerous, click, blinker, werkzeug, jinja2, flask

Successfully installed blinker-1.9.0 click-8.5.0 flask-3.1.3 itsdangerous-2.2.0 jinja2-3.1.6 markupsafe-3.0.3 werkzeug-3.1.8</div>

<h2>3) Virtual Environments — بيئة معزولة لكل مشروع</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 المشكلة: لو مشروعين على جهازك محتاجين نسختين مختلفتين من نفس المكتبة، هتتعارك مع بعض لو ثبّتهم على مستوى الجهاز كله. الحل: <b>Virtual Environment (venv)</b> — مجلد معزول بمكتباته الخاصة لكل مشروع، مش هيأثر ولا يتأثر بأي مشروع تاني. ده تقريبًا مقابل مجلد <code>vendor/</code> في مشاريع PHP لكن بيشمل نسخة Python نفسها كمان.</div>
    <div class="en">🇬🇧 The problem: if two projects on your machine need different versions of the same library, installing everything system-wide causes conflicts. The fix: a <b>Virtual Environment (venv)</b> — an isolated folder with its own libraries per project, unaffected by and not affecting any other project. It's roughly PHP's <code>vendor/</code> folder, except it also isolates the Python interpreter itself.</div>
</div>

<pre><code># إنشاء بيئة اسمها venv جوه مجلد مشروعك
python -m venv venv</code></pre>
<h3>الناتج الفعلي (مُنفَّذ فعليًا) / Actual output (really executed)</h3>
<div class="output-box">(الأمر بينفذ من غير أي ناتج على الشاشة — بس بيطلعلك مجلد venv/ فيه Python وpip منسوخين جواه)
(The command runs with no console output — but it creates a venv/ folder containing its own copies of Python and pip.)</div>

<div class="bi-block">
    <div class="ar">🇪🇬 بعد الإنشاء، لازم "تفعّل" البيئة عشان أي أمر <code>python</code> أو <code>pip</code> بعد كده يستخدم النسخة اللي جوه <code>venv/</code> مش نسخة الجهاز العامة. الأمر مختلف حسب نظام التشغيل والـ Terminal:</div>
    <div class="en">🇬🇧 After creating it, you must "activate" the environment so any <code>python</code> or <code>pip</code> command afterward uses the copy inside <code>venv/</code>, not the machine's global copy. The command differs by OS and terminal:</div>
</div>

<pre><code># ويندوز — Command Prompt (CMD)
venv\Scripts\activate

# ويندوز — PowerShell
venv\Scripts\Activate.ps1

# macOS / Linux — bash/zsh
source venv/bin/activate</code></pre>
<h3>الناتج الفعلي (شكل الـ Terminal بعد التفعيل) / What the terminal looks like after activating</h3>
<div class="output-box">(venv) C:\projects\my_app&gt;</div>

<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ ظهور <code>(venv)</code> في بداية السطر — ده تأكيد إن البيئة شغالة. من دلوقتي أي <code>pip install</code> هيتحط جوه مجلد <code>venv/</code> بس، مش على الجهاز كله. عشان تطفي البيئة، اكتب <code>deactivate</code>.</div>
    <div class="en">🇬🇧 Notice <code>(venv)</code> appearing at the start of the line — confirmation the environment is active. From now on, any <code>pip install</code> goes only into the <code>venv/</code> folder, not system-wide. To turn it off, run <code>deactivate</code>.</div>
</div>

<div class="exercise-box">
    <h3>✍️ تمرين عملي / Hands-on Exercise</h3>
    <div class="ar">🇪🇬 افتح الـ Terminal بتاعك، اعمل مجلد مشروع جديد، وجواه شغّل <code>python -m venv venv</code> ثم فعّلها بالأمر المناسب لجهازك. تأكد إن <code>(venv)</code> ظهرت في بداية السطر. (المحرر جوه <a href="../playground/index.php">الـ Playground</a> هنا في المنصة مخصص لتشغيل كود Python مباشرة من غير الحاجة لـ venv — الـ venv مهم في مشاريعك الحقيقية على جهازك.)</div>
    <div class="en">🇬🇧 Open your terminal, make a new project folder, and inside it run <code>python -m venv venv</code> then activate it with the command matching your machine. Confirm <code>(venv)</code> appears at the start of the line. (This platform's <a href="../playground/index.php">Playground</a> is for running Python code directly without needing a venv — venvs matter for your real projects on your own machine.)</div>
</div>

<h2>أشهر أخطاء pip install وإزاي تقراها / Common pip install Errors &amp; How to Read Them</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <code>pip install</code> بيفشل مع كل مبتدئ في مرحلة ما — الفرق بين اللي بيستسلم واللي بيكمل هو إنك تقرأ الرسالة صح بدل ما تنسخها في جوجل على طول من غير فهم.</div>
    <div class="en">🇬🇧 <code>pip install</code> fails for every beginner at some point — the difference between giving up and moving forward is reading the message correctly instead of just pasting it into Google without understanding it.</div>
</div>

<div class="security-box">
    <h3>⚠️ الخطأ 1: <span class="ltr">'pip' is not recognized</span></h3>
    <div class="ar">🇪🇬 معناه <code>pip</code> مش مضاف لمتغير <code>PATH</code> بتاع ويندوز — نفس مشكلة <code>python</code> اللي شرحناها فوق بالظبط. <b>الحل الأسرع اللي بيشتغل دايمًا:</b> استخدم <code>python -m pip install اسم_المكتبة</code> بدل <code>pip install</code> مباشرة — لإنك بتطلب من Python نفسه (اللي متأكد إنه شغال) يشغّل وحدة <code>pip</code> الداخلية بتاعته.</div>
    <div class="en">🇬🇧 Means <code>pip</code> isn't on Windows' <code>PATH</code> — the exact same issue as <code>python</code> explained above. <b>The fastest fix that always works:</b> use <code>python -m pip install library_name</code> instead of <code>pip install</code> directly — you're asking Python itself (which you know works) to run its own internal <code>pip</code> module.</div>
</div>

<div class="security-box">
    <h3>⚠️ الخطأ 2: <span class="ltr">Could not find a version that satisfies the requirement</span></h3>
    <div class="ar">🇪🇬 غالبًا سبب بسيط: <b>غلطة إملائية</b> في اسم المكتبة (زي <code>flsk</code> بدل <code>flask</code>)، أو المكتبة مش بتدعم نسخة Python اللي عندك (نادر مع نسخ Python الحديثة). أول حاجة تتأكد منها: راجع الإملاء حرف حرف، وابحث باسم المكتبة الرسمي على <span class="ltr">pypi.org</span>.</div>
    <div class="en">🇬🇧 Usually a simple cause: a <b>typo</b> in the library name (like <code>flsk</code> instead of <code>flask</code>), or the library doesn't support your Python version (rare with modern Python). First thing to check: review the spelling letter by letter, and search the official library name on <span class="ltr">pypi.org</span>.</div>
</div>

<div class="security-box">
    <h3>⚠️ الخطأ 3: <span class="ltr">PermissionError: [WinError 5] Access is denied</span></h3>
    <div class="ar">🇪🇬 بتحاول تثبت مكتبة في مجلد Python العام بدون صلاحية إدارية. <b>الحل الصح مش "شغّل كـ Administrator"</b> — الحل الصح إنك تستخدم <b>Virtual Environment</b> بالظبط زي ما اتعلمت فوق، لإنه بيثبت المكتبات جوه مجلد مشروعك بس، مش في مجلدات النظام اللي محتاجة صلاحيات.</div>
    <div class="en">🇬🇧 You're trying to install into Python's global folder without admin rights. <b>The correct fix isn't "run as Administrator"</b> — it's using a <b>Virtual Environment</b>, exactly as you learned above, since it installs libraries only inside your project folder, not system directories that require elevated permissions.</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="pip">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">إيه اللي بيقابل <code>composer</code> بتاع PHP في عالم Python؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What is Python's equivalent of PHP's <code>composer</code>?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="venv"> venv</label>
        <label><input type="radio" name="q1" value="pip"> pip</label>
        <label><input type="radio" name="q1" value="django"> Django</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="isolate">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">ليه بنستخدم Virtual Environment (venv) لكل مشروع؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Why use a Virtual Environment (venv) per project?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="faster"> عشان يخلي Python يشتغل أسرع</label>
        <label><input type="radio" name="q2" value="isolate"> عشان يعزل مكتبات كل مشروع عن التاني</label>
        <label><input type="radio" name="q2" value="required"> عشان Python متطلبه إجباري عشان يشتغل أصلًا</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="module">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">ظهرتلك رسالة <span class="ltr">'pip' is not recognized</span>. إيه أسرع حل بديل تجربه؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">You see <span class="ltr">'pip' is not recognized</span>. What's the fastest alternative to try?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="reinstall"> تمسح Python كله وتثبته تاني فورًا</label>
        <label><input type="radio" name="q3" value="module"> تستخدم <code>python -m pip install اسم_المكتبة</code> بدل <code>pip install</code></label>
        <label><input type="radio" name="q3" value="ignore"> تتجاهل الخطأ وتكمل عادي</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="venvfix">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">ظهرلك <span class="ltr">PermissionError: Access is denied</span> وانت بتعمل <code>pip install</code>. إيه أصح حل؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">You get <span class="ltr">PermissionError: Access is denied</span> during <code>pip install</code>. What's the correct fix?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="admin"> تشغّل الـ Terminal دايمًا كـ Administrator من هنا وطول عمرك</label>
        <label><input type="radio" name="q4" value="venvfix"> تعمل وتفعّل Virtual Environment وتثبت جواه</label>
        <label><input type="radio" name="q4" value="delete"> تمسح مجلد Python بالكامل</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ جهّز أول بيئة عمل حقيقية / Set Up Your First Real Environment</h3>
    <div class="ar">🇪🇬 على جهازك (مش على المنصة): اعمل مجلد اسمه <code>sila-python</code>، جواه شغّل <code>python -m venv venv</code> وفعّلها، وبعدين <code>pip install flask</code>. اكتب <code>pip list</code> وتأكد إن <code>flask</code> ظاهرة في القايمة، وإن مفيش أي مكتبة تانية غيرها وتوابعها — ده معناه إنك فعلاً بتشتغل جوه بيئة معزولة مش الجهاز كله.</div>
    <div class="en">🇬🇧 On your own machine (not the platform): create a folder called <code>sila-python</code>, inside it run <code>python -m venv venv</code> and activate it, then <code>pip install flask</code>. Run <code>pip list</code> and confirm <code>flask</code> appears with only its own dependencies — proof you're working inside an isolated environment, not system-wide.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 نفس الـ <code>venv</code> وnفس أمر <code>pip install</code> اللي اتعلمتهم هنا هما بالظبط اللي هتستخدمهم بعد مرحلتين لما تثبّت Django وFlask فعليًا وتشغّل مشاريع حقيقية بيهم. لو الخطوة دي واضحة، الباقي هيبقى تفاصيل فوقها.</div>
    <div class="en">🇬🇧 The same <code>venv</code> and <code>pip install</code> you just learned are exactly what you'll use two stages from now to actually install Django and Flask and run real projects with them. Get this step solid, and everything after is just details built on top.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li><code>python --version</code> بيتأكد إن Python متثبت ويطلعلك رقم الإصدار.</li>
        <li><code>pip</code> = مدير المكتبات بتاع Python، مقابل <code>composer</code> في PHP.</li>
        <li><code>pip install اسم_المكتبة</code> بيحمل ويثبت أي مكتبة جاهزة.</li>
        <li>Virtual Environment (<code>venv</code>) = بيئة معزولة لكل مشروع عشان المكتبات ما تتعاركش.</li>
        <li>على ويندوز: <code>venv\Scripts\activate</code> — على macOS/Linux: <code>source venv/bin/activate</code>.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <span></span>
    <a href="python-basics.php">المرحلة الجاية / Next: Python Fundamentals →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
