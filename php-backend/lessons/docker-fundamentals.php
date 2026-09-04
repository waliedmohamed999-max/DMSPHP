<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'docker-fundamentals';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'أساسيات Docker — Docker Fundamentals';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">Stage 16 · Deployment &amp; DevOps Basics</span>
<h1>أساسيات Docker <span class="ltr">Docker Fundamentals</span></h1>
<p class="subtitle">Container, Image, Dockerfile — ومشروع PHP + MySQL جوه Docker. <span class="ltr">Container, image, Dockerfile — and a PHP + MySQL project inside Docker.</span></p>

<div class="step-tracker">
    <a href="#read">📖 Read</a>
    <a href="#understand">🧠 Understand</a>
    <a href="#quiz">🧠 Quiz</a>
    <a href="#challenge">🛠️ Challenge</a>
    <a href="#project">🚀 Project</a>
</div>

<h2 id="read">📖 الهدف / Goal</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 آخر درس في المسار: تفهم Container, Image, Dockerfile, Port, Volume, Network, وEnvironment Variables، وتشوف مثال <code>docker-compose.yml</code> + <code>Dockerfile</code> حقيقي وصحيح لمشروع PHP + MySQL — نفس التنبيه الصريح كدروس Git وLinux: تشغيل Docker نفسه مش قابل للتنفيذ جوه الـ Sandbox بتاع PHP هنا (Docker محتاج محرّك Containers على مستوى نظام التشغيل، مش حاجة PHP CLI ممكن يشغّلها). الملفات تحت مكتوبة بدقة عالية عشان تشتغل فعليًا لو نسختها على جهازك، لكن اتكتبت كمرجع، مش اتنفذت هنا.</div>
    <div class="en">🇬🇧 The final lesson in the track: understand Container, Image, Dockerfile, Port, Volume, Network, and Environment Variables, and see a real, correct <code>docker-compose.yml</code> + <code>Dockerfile</code> example for a PHP + MySQL project — the same honest note as the Git and Linux lessons: running Docker itself can't be executed inside this platform's PHP sandbox (Docker needs an OS-level container engine, not something PHP CLI can run). The files below are written with real care so they'd actually work if you copied them to your own machine, but they're presented as reference, not something executed here.</div>
</div>

<h2 id="understand">🧠 المفاهيم الأساسية / Core Concepts</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>Image (صورة):</b> "قالب" جاهز للقراءة فقط، فيه نظام تشغيل مصغّر + PHP + كل الإعدادات اللي محتاجها تطبيقك — بيتبني مرة من <code>Dockerfile</code>. <b>Container (حاوية):</b> نسخة "شغالة فعليًا" من الـ Image — زي ما الفرق بين كلاس (Image) وObject (Container) في OOP. تقدر تشغّل نفس الـ Image في 5 Containers منفصلين. <b>Dockerfile:</b> ملف نصي بيوصف خطوة بخطوة إزاي تُبنى الـ Image (ابدأ من PHP، ثبّت الإضافات، انسخ الكود). <b>Port:</b> زي ما شفت في درس Linux — الرقم اللي الـ Container بيسمع منه، وبيتربط بـ Port على جهازك عشان توصله من المتصفح. <b>Volume:</b> مساحة تخزين بتفضل موجودة حتى لو الـ Container اتمسح — أساسية لبيانات MySQL، لأن بيانات الـ Container نفسه بتضيع لو اتمسح. <b>Network:</b> شبكة داخلية بتخلي الـ Containers (زي app وdb) يكلموا بعض بالاسم (<code>db</code>) بدل IP ثابت. <b>Environment Variables:</b> نفس الفكرة اللي شفتها في درس Deployment — بتتحط في <code>docker-compose.yml</code> بدل ما تتكتب جوه الكود.</div>
    <div class="en">🇬🇧 <b>Image:</b> a read-only "template" containing a minimal OS + PHP + everything your app needs — built once from a <code>Dockerfile</code>. <b>Container:</b> an actually-running instance of an Image — like the class (Image) vs. object (Container) distinction in OOP. You can run the same Image as 5 separate Containers. <b>Dockerfile:</b> a text file describing, step by step, how to build the Image (start from PHP, install extensions, copy the code). <b>Port:</b> as seen in the Linux lesson — the number a Container listens on, mapped to a port on your machine so a browser can reach it. <b>Volume:</b> storage that survives even if the Container is deleted — essential for MySQL data, since a Container's own data is lost when it's removed. <b>Network:</b> an internal network letting Containers (like app and db) talk to each other by name (<code>db</code>) instead of a fixed IP. <b>Environment Variables:</b> the same idea from the Deployment lesson — set in <code>docker-compose.yml</code> instead of hardcoded in code.</div>
</div>

<div class="flow-diagram">
    <div class="flow-box">Dockerfile</div>
    <div class="flow-arrow">↓ docker build</div>
    <div class="flow-box">Image (PHP + your code, read-only template)</div>
    <div class="flow-arrow">↓ docker compose up</div>
    <div class="flow-box">Running Containers (app + db)</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">Identical behavior on any machine</div>
</div>

<h2>مثال حقيقي: PHP + MySQL / A Real Example: PHP + MySQL</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 الملفين تحت هيشغّلوا Task Manager بتاعك بـ Apache/PHP في Container، وMySQL في Container تاني، متربطين ببعض بشبكة داخلية — بأمر واحد بس: <code>docker compose up</code>.</div>
    <div class="en">🇬🇧 The two files below run your Task Manager with Apache/PHP in one Container and MySQL in another, connected via an internal network — with a single command: <code>docker compose up</code>.</div>
</div>

<pre><code># Dockerfile
FROM php:8.2-apache

# Install the PHP extensions the app needs to talk to MySQL
RUN docker-php-ext-install pdo pdo_mysql mysqli

# Copy the project into the web root
COPY . /var/www/html/

# Apache/PHP must own the files it serves, and mod_rewrite is needed
# for a router-style front controller (index.php handling every URL)
RUN chown -R www-data:www-data /var/www/html \
    && a2enmod rewrite

EXPOSE 80</code></pre>

<pre><code># docker-compose.yml
services:
  app:
    build: .
    container_name: task-manager-app
    ports:
      - "8080:80"
    volumes:
      - ./:/var/www/html
    environment:
      DB_HOST: db
      DB_NAME: task_manager
      DB_USER: root
      DB_PASSWORD: secret
    depends_on:
      - db
    networks:
      - app-network

  db:
    image: mysql:8.0
    container_name: task-manager-db
    restart: always
    environment:
      MYSQL_DATABASE: task_manager
      MYSQL_ROOT_PASSWORD: secret
    ports:
      - "3306:3306"
    volumes:
      - db-data:/var/lib/mysql
    networks:
      - app-network

volumes:
  db-data:

networks:
  app-network:
    driver: bridge</code></pre>

<div class="bi-block">
    <div class="ar">🇪🇬 نقط مهمة في الملف ده، مش زخرفة: <code>depends_on: [db]</code> بيخلي Docker يشغّل <code>db</code> قبل <code>app</code>. <code>environment: DB_HOST: db</code> — لاحظ إن القيمة اسم الـ Service (<code>db</code>) مش <code>localhost</code>، لإن الـ Network الداخلية بتخلي الاسم ده يتحل لعنوان الـ Container صح. <code>volumes: db-data:/var/lib/mysql</code> بيضمن إن بيانات MySQL متتمسحش لو اتوقف الـ Container أو اتعمله rebuild — من غيرها، كل بياناتك بتضيع أول ما تعمل <code>docker compose down</code>. و<code>ports: "8080:80"</code> معناها: أي طلب على <code>localhost:8080</code> بتاع جهازك بيتوجّه لـ Port 80 جوه الـ Container.</div>
    <div class="en">🇬🇧 Important details here, not decoration: <code>depends_on: [db]</code> makes Docker start <code>db</code> before <code>app</code>. <code>environment: DB_HOST: db</code> — notice the value is the Service name (<code>db</code>), not <code>localhost</code>, because the internal Network resolves that name to the Container's address correctly. <code>volumes: db-data:/var/lib/mysql</code> ensures MySQL's data survives a Container stop or rebuild — without it, all your data disappears the moment you run <code>docker compose down</code>. And <code>ports: "8080:80"</code> means any request to <code>localhost:8080</code> on your machine is forwarded to Port 80 inside the Container.</div>
</div>

<p class="ltr" style="color:var(--muted);font-size:0.85em">Reference config to try locally — not executed by this lesson. Save both files in your project root, then run <code>docker compose up --build</code> and visit <code>http://localhost:8080</code>.</p>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="container">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">إيه الفرق بين Image وContainer؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What's the difference between an Image and a Container?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="same"> مفيش فرق، نفس الحاجة باسمين</label>
        <label><input type="radio" name="q1" value="container"> Image قالب للقراءة فقط، Container نسخة شغالة فعليًا منه (زي Class وObject)</label>
        <label><input type="radio" name="q1" value="reverse"> Container هو القالب، Image هو النسخة الشغالة</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="volume">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">في مثال docker-compose.yml فوق، إيه اللي بيمنع بيانات MySQL من الضياع لو اتعمل <code>docker compose down</code>؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">In the docker-compose.yml example, what prevents MySQL's data from being lost on <code>docker compose down</code>?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="volume"> الـ Volume (db-data:/var/lib/mysql)</label>
        <label><input type="radio" name="q2" value="port"> ports: "3306:3306"</label>
        <label><input type="radio" name="q2" value="restart"> restart: always</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="dbname">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">ليه <code>DB_HOST</code> في مثال docker-compose.yml فوق قيمته <code>db</code> مش <code>localhost</code>؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Why is <code>DB_HOST</code> set to <code>db</code>, not <code>localhost</code>, in the docker-compose.yml example?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="dbname"> عشان الـ Network الداخلية بتحل اسم الـ Service (db) لعنوان الـ Container الصح</label>
        <label><input type="radio" name="q3" value="typo"> ده غلطة كتابية لازم تتصلح لـ localhost</label>
        <label><input type="radio" name="q3" value="random"> الاسم مش مهم، أي اسم هيشتغل</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="illustrative">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">ليه الدرس ده معملش <code>docker compose up</code> فعليًا زي ما دروس PHP التانية بتشغّل الكود فعليًا؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Why doesn't this lesson actually run <code>docker compose up</code> the way other PHP lessons actually run code?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="illustrative"> Docker محتاج محرّك Containers على مستوى نظام التشغيل، مش حاجة PHP CLI يقدر يشغّلها جوه الـ Sandbox</label>
        <label><input type="radio" name="q4" value="difficult"> عشان صعب اقتصاديًا</label>
        <label><input type="radio" name="q4" value="unnecessary"> عشان Docker مش مهم فعليًا في مشاريع PHP</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ شغّل المثال فعليًا على جهازك / Actually Run the Example on Your Machine</h3>
    <div class="ar">🇪🇬 لو عندك Docker Desktop مثبّت: انسخ الـ <code>Dockerfile</code> و<code>docker-compose.yml</code> فوق في مجلد مشروع Task Manager بتاعك، شغّل <code>docker compose up --build</code>، وافتح <code>http://localhost:8080</code>. لاحظ إزاي مشروعك بقى شغال بنفس الطريقة بالظبط زي أي جهاز تاني هيشغّل نفس الملفين.</div>
    <div class="en">🇬🇧 If you have Docker Desktop installed: copy the <code>Dockerfile</code> and <code>docker-compose.yml</code> above into your Task Manager project folder, run <code>docker compose up --build</code>, and open <code>http://localhost:8080</code>. Notice how your project now runs identically to how it would on any other machine running the same two files.</div>
</div>

<div class="exercise-box">
    <h3>✍️ تمرين إضافي / Extra Exercise</h3>
    <div class="ar">🇪🇬 عدّل الـ <code>docker-compose.yml</code> فوق تضيف Service ثالثة اسمها <code>phpmyadmin</code> (Image: <code>phpmyadmin/phpmyadmin</code>) على Port <code>8081</code>، متصلة بنفس <code>app-network</code>، عشان تقدر تدير قاعدة بيانات MySQL من المتصفح.</div>
    <div class="en">🇬🇧 Modify the <code>docker-compose.yml</code> above to add a third Service called <code>phpmyadmin</code> (Image: <code>phpmyadmin/phpmyadmin</code>) on Port <code>8081</code>, connected to the same <code>app-network</code>, so you can manage the MySQL database from a browser.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 بكده خلصت مسار "بنية نظيفة و MVC" (Stage 12) ومسار "النشر و DevOps" (Stage 16) بالكامل: من فصل المسؤوليات، لبناء Router، لمبادئ الكود النظيف، لإعادة هيكلة مشروع حقيقي، لـ Git، Linux، رحلة النشر، وDocker. الخطوة الطبيعية الجاية هي "تصميم الأنظمة" — إزاي تخطط لمشروع يستحمل آلاف المستخدمين، مش بس يشتغل صح لمستخدم واحد. المسار ده موجود فعلًا في المنصة: ابدأ بـ <a href="stage11.php">تصميم الأنظمة لمهندسي الـ Backend</a>.</div>
    <div class="en">🇬🇧 With this, you've completed both "Clean Architecture & MVC" (Stage 12) and "Deployment & DevOps Basics" (Stage 16): separating concerns, building a Router, clean code principles, refactoring a real project, Git, Linux, the deployment journey, and Docker. The natural next step is System Design — planning for a project that can handle thousands of users, not just work correctly for one. That track already exists on this platform: start with <a href="stage11.php">System Design for Backend Engineers</a>.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>Image = قالب للقراءة فقط، Container = نسخة شغالة فعليًا منه.</li>
        <li>Dockerfile يوصف بناء الـ Image، docker-compose.yml يشغّل أكتر من Container مع بعض (زي app وdb).</li>
        <li>Volume يحافظ على البيانات (زي MySQL)، Network يخلي الـ Containers تتكلم بالاسم، Port يربط الداخل بالخارج.</li>
        <li>كل الأمثلة هنا مرجع صحيح للاستخدام على جهازك — مش منفذة داخل هذه المنصة، بنفس صراحة دروس Git وLinux.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="deployment-flow.php">← المرحلة السابقة</a>
    <a href="../index.php">الرئيسية / Home →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
