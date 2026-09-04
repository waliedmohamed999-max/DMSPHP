<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'git-github-basics';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'Git و GitHub: الأساسيات — Git & GitHub Basics';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">Stage 16 · Deployment &amp; DevOps Basics</span>
<h1>Git و GitHub: الأساسيات <span class="ltr">Git &amp; GitHub Basics</span></h1>
<p class="subtitle">init, add, commit, branch, push — إزاي تتحكم في نسخ مشروعك من غير ما تخاف تكسره. <span class="ltr">init, add, commit, branch, push — controlling your project's versions without fear of breaking it.</span></p>

<div class="step-tracker">
    <a href="#read">📖 Read</a>
    <a href="#understand">🧠 Understand</a>
    <a href="#quiz">🧠 Quiz</a>
    <a href="#challenge">🛠️ Challenge</a>
    <a href="#project">🚀 Project</a>
</div>

<h2 id="read">📖 الهدف / Goal</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 تفهم أهم أوامر Git اللي هتستخدمها كل يوم، ومفاهيم Repository/Commit/Branch/Pull Request/.gitignore/README. ملاحظة مهمة وصريحة: منصة الدروس دي بتشغّل PHP فعليًا وتوريك ناتج حقيقي 100% في كل درس تاني — لكن تشغيل أوامر Git (اللي بتتعامل مع نظام ملفات ومستودع حقيقي) مش قابل للتنفيذ الآمن جوه الـ Sandbox بتاع PHP هنا. عشان كده، الأوامر والنواتج تحت "توضيحية" (Illustrative) — يعني شكل حقيقي ودقيق لما هيحصل، لكن اتكتبت يدويًا مش نتجت من تشغيل فعلي، وهنقولها لك بوضوح كل مرة.</div>
    <div class="en">🇬🇧 Learn the Git commands you'll use daily, and the Repository/Commit/Branch/Pull Request/.gitignore/README concepts. An important, honest note: this platform runs real PHP and shows you 100% real output in every other lesson — but running Git commands (which operate on a real filesystem and repository) isn't something that can be safely executed inside this platform's PHP sandbox. So the commands and outputs below are "illustrative" — an accurate, realistic shape of what you'd see, but manually written rather than produced by an actual run, and we'll say so clearly every time.</div>
</div>

<h2 id="understand">🧠 المفاهيم الأساسية / Core Concepts</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>Repository (مستودع):</b> مجلد مشروعك بعد ما Git يبدأ "يتابعه" — بيحتفظ بتاريخ كل تعديل حصل فيه. <b>Commit:</b> "لقطة" محفوظة لحالة الملفات في لحظة معينة، مع رسالة بتوضح إيه اللي اتغيّر وليه. <b>Branch:</b> خط تطوير منفصل — بتقدر تجرب حاجة جديدة على <code>branch</code> بدون ما تأثر على النسخة المستقرة (غالبًا <code>main</code>). <b>Pull Request (PR):</b> على GitHub، طلب رسمي إنك تدمج تعديلات فرع في فرع تاني — بيديك فرصة لمراجعة الكود قبل الدمج. <b>.gitignore:</b> ملف بيقول لـ Git "متتبعش الملفات دي" (زي <code>vendor/</code> أو <code>.env</code>). <b>README:</b> أول ملف بيشوفه أي حد يفتح المشروع — بيشرح إيه هو ده وإزاي تشغّله.</div>
    <div class="en">🇬🇧 <b>Repository:</b> your project folder once Git starts "tracking" it — it retains the full history of every change. <b>Commit:</b> a saved "snapshot" of the files' state at a moment in time, with a message explaining what changed and why. <b>Branch:</b> a separate line of development — you can try something new on a branch without affecting the stable version (usually <code>main</code>). <b>Pull Request (PR):</b> on GitHub, a formal request to merge one branch's changes into another — giving you a chance to review code before merging. <b>.gitignore:</b> a file that tells Git "don't track these" (like <code>vendor/</code> or <code>.env</code>). <b>README:</b> the first file anyone sees when they open the project — explaining what it is and how to run it.</div>
</div>

<h2>الأوامر الأساسية / The Core Commands</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 كل مثال تحت فيه الأمر الحقيقي، وناتج توضيحي لشكله المتوقع — جرّبهم بنفسك في تيرمينال حقيقي (بعد ما تثبّت Git) عشان تشوف نتيجتك أنت.</div>
    <div class="en">🇬🇧 Every example below has the real command, with an illustrative expected shape — try them yourself in a real terminal (after installing Git) to see your own results.</div>
</div>

<pre><code>git init</code></pre>
<p class="ltr" style="color:var(--muted);font-size:0.85em">Typical output (illustrative — run this yourself in a real terminal to see your own):</p>
<div class="output-box">Initialized empty Git repository in /home/waleed/my-project/.git/</div>
<div class="bi-block">
    <div class="ar">🇪🇬 بيحوّل مجلد عادي لـ Git Repository — بيعمل مجلد مخفي <code>.git</code> بيحتفظ فيه بكل التاريخ.</div>
    <div class="en">🇬🇧 Turns a normal folder into a Git Repository — creates a hidden <code>.git</code> folder that holds the entire history.</div>
</div>

<pre><code>git status</code></pre>
<p class="ltr" style="color:var(--muted);font-size:0.85em">Typical output (illustrative — run this yourself in a real terminal to see your own):</p>
<div class="output-box">On branch main
Changes not staged for commit:
  (use "git add &lt;file&gt;..." to update what will be committed)
        modified:   index.php

Untracked files:
  (use "git add &lt;file&gt;..." to include in what will be committed)
        config.php</div>
<div class="bi-block">
    <div class="ar">🇪🇬 أهم أمر هتستخدمه — بيوريك حالة كل ملف: اتعدّل ولسه مش Staged، جديد ومش متتبّع، أو Staged وجاهز لـ commit.</div>
    <div class="en">🇬🇧 The command you'll use most — shows every file's state: modified but not staged, new and untracked, or staged and ready to commit.</div>
</div>

<pre><code>git add index.php
git add .        # كل الملفات المتغيّرة / all changed files</code></pre>
<p class="ltr" style="color:var(--muted);font-size:0.85em">Typical output (illustrative — run this yourself in a real terminal to see your own):</p>
<div class="output-box">(no output on success — check with `git status` to confirm files moved to "Changes to be committed")</div>

<pre><code>git commit -m "Add user registration validation"</code></pre>
<p class="ltr" style="color:var(--muted);font-size:0.85em">Typical output (illustrative — run this yourself in a real terminal to see your own):</p>
<div class="output-box">[main a1b2c3d] Add user registration validation
 2 files changed, 34 insertions(+), 5 deletions(-)</div>
<div class="bi-block">
    <div class="ar">🇪🇬 <code>-m</code> بتحدد رسالة الـ commit مباشرة. الرسالة الكويسة بتشرح "ليه"، مش بس "إيه" — زي المثال فوق، مش "تعديلات" أو "fix".</div>
    <div class="en">🇬🇧 <code>-m</code> sets the commit message directly. A good message explains "why", not just "what" — like the example above, not "changes" or "fix".</div>
</div>

<pre><code>git log</code></pre>
<p class="ltr" style="color:var(--muted);font-size:0.85em">Typical output (illustrative — run this yourself in a real terminal to see your own):</p>
<div class="output-box">commit a1b2c3d4e5f6789012345678901234567890abcd
Author: Waleed &lt;waleed@example.com&gt;
Date:   Thu Sep 3 14:20:11 2026 +0200

    Add user registration validation

commit 9f8e7d6c5b4a321098765432109876543210fedc
Author: Waleed &lt;waleed@example.com&gt;
Date:   Wed Sep 2 09:05:44 2026 +0200

    Initial commit</div>

<pre><code>git branch feature-login
git checkout feature-login
# أو في خطوة واحدة / or in one step:
git checkout -b feature-login</code></pre>
<p class="ltr" style="color:var(--muted);font-size:0.85em">Typical output (illustrative — run this yourself in a real terminal to see your own):</p>
<div class="output-box">Switched to a new branch 'feature-login'</div>
<div class="bi-block">
    <div class="ar">🇪🇬 <code>git branch</code> بيعمل فرع جديد، <code>git checkout</code> بينقلك ليه. الفرع بيخليك تجرب ميزة كاملة (زي نظام تسجيل دخول) من غير ما تأثر على <code>main</code> المستقرة — لو الميزة فشلت، تقدر تمسح الفرع وترجع زي الأول.</div>
    <div class="en">🇬🇧 <code>git branch</code> creates a new branch, <code>git checkout</code> switches to it. A branch lets you try a whole feature (like a login system) without touching the stable <code>main</code> — if the feature fails, you can just delete the branch and nothing changed.</div>
</div>

<pre><code>git checkout main
git merge feature-login</code></pre>
<p class="ltr" style="color:var(--muted);font-size:0.85em">Typical output (illustrative — run this yourself in a real terminal to see your own):</p>
<div class="output-box">Updating a1b2c3d..7f6e5d4
Fast-forward
 login.php | 42 ++++++++++++++++++++++++++++++++++++++++++
 1 file changed, 42 insertions(+)</div>
<div class="bi-block">
    <div class="ar">🇪🇬 <code>merge</code> بيدمج تعديلات فرع تاني جوه الفرع الحالي. "Fast-forward" معناها إن مفيش تعارض — <code>main</code> ماتغيرش من ساعة ما عملت الفرع، فـ Git بس بيحرّك المؤشر قدام.</div>
    <div class="en">🇬🇧 <code>merge</code> brings another branch's changes into the current one. "Fast-forward" means there was no conflict — <code>main</code> hadn't changed since you branched off, so Git just moves the pointer forward.</div>
</div>

<pre><code>git pull origin main</code></pre>
<p class="ltr" style="color:var(--muted);font-size:0.85em">Typical output (illustrative — run this yourself in a real terminal to see your own):</p>
<div class="output-box">From github.com:waleed/my-project
 * branch            main       -> FETCH_HEAD
Updating 7f6e5d4..b2c1a09
Fast-forward
 README.md | 3 +++
 1 file changed, 3 insertions(+)</div>

<pre><code>git push origin main</code></pre>
<p class="ltr" style="color:var(--muted);font-size:0.85em">Typical output (illustrative — run this yourself in a real terminal to see your own):</p>
<div class="output-box">Enumerating objects: 7, done.
Counting objects: 100% (7/7), done.
Writing objects: 100% (4/4), 512 bytes | 512.00 KiB/s, done.
To github.com:waleed/my-project.git
   a1b2c3d..7f6e5d4  main -> main</div>
<div class="bi-block">
    <div class="ar">🇪🇬 <code>pull</code> بيجيب تعديلات من GitHub لجهازك، <code>push</code> بيرفع تعديلاتك ليه. العادة الصحية: اعمل <code>pull</code> قبل ما تبدأ شغل، وقبل أي <code>push</code>، عشان تتجنب تعارضات لما شغّالين تانيين على نفس المشروع.</div>
    <div class="en">🇬🇧 <code>pull</code> fetches changes from GitHub to your machine, <code>push</code> uploads yours to it. The healthy habit: <code>pull</code> before starting work, and before every <code>push</code>, to avoid conflicts when others work on the same project.</div>
</div>

<h2>.gitignore و README / .gitignore &amp; README</h2>
<pre><code># .gitignore
/vendor/
.env
*.log
/node_modules/</code></pre>
<div class="bi-block">
    <div class="ar">🇪🇬 لو <code>.env</code> فيه باسورد قاعدة بيانات حقيقي واترفع على GitHub بالغلط، أي حد يقدر يشوف المستودع (حتى لو عام) هيشوف السر ده. <code>.gitignore</code> بيمنع Git من تتبّع الملف من الأساس — <b>لكن</b> لو الملف اترفع قبل ما تضيفه لـ <code>.gitignore</code>، لازم تشيله من التاريخ كمان، مش بس تضيفه دلوقتي.</div>
    <div class="en">🇬🇧 If <code>.env</code> holds a real database password and gets pushed to GitHub by mistake, anyone who can see the repository (even a public one) sees that secret. <code>.gitignore</code> stops Git from tracking the file in the first place — <b>but</b> if the file was already pushed before adding it to <code>.gitignore</code>, you must also remove it from history, not just ignore it going forward.</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="commit">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">إيه هو الـ Commit بالظبط؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What exactly is a Commit?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="commit"> لقطة محفوظة لحالة الملفات في لحظة معينة، مع رسالة توضيحية</label>
        <label><input type="radio" name="q1" value="branch"> خط تطوير منفصل عن main</label>
        <label><input type="radio" name="q1" value="repo"> مجلد المشروع نفسه</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="gitignore">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">عايز <code>.env</code> ميترفعش على GitHub خالص — إيه الحل؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">You want <code>.env</code> never pushed to GitHub — what's the fix?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="gitignore"> تضيفه في .gitignore قبل أي commit يشمله</label>
        <label><input type="radio" name="q2" value="branch"> تحطه في فرع منفصل</label>
        <label><input type="radio" name="q2" value="rename"> تغيّر اسمه لـ env.txt</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="branch">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">عايز تجرب ميزة تسجيل دخول جديدة من غير ما تأثر على نسخة الموقع الشغالة (main) — إيه الأداة المناسبة؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">You want to try a new login feature without affecting the live version (main) — which tool fits?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="branch"> Branch منفصل</label>
        <label><input type="radio" name="q3" value="commit"> Commit إضافي على main</label>
        <label><input type="radio" name="q3" value="pull"> git pull</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="illustrative">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">النواتج اللي شفتها في الدرس ده (زي ناتج git push) — إيه طبيعتها الحقيقية؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">The outputs you saw in this lesson (like the git push output) — what's their real nature?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="illustrative"> توضيحية — شكل حقيقي ودقيق، لكن مكتوبة يدويًا مش نتيجة تشغيل فعلي هنا</label>
        <label><input type="radio" name="q4" value="executed"> اتشغلت فعليًا جوه هذه المنصة زي أمثلة PHP التانية</label>
        <label><input type="radio" name="q4" value="random"> عشوائية ومفيهاش قيمة تعليمية</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ أول Repository حقيقي / Your First Real Repository</h3>
    <div class="ar">🇪🇬 على جهازك (مش هنا في المنصة): اعمل مجلد جديد، شغّل <code>git init</code>، اكتب ملف <code>README.md</code> فيه سطرين عن مشروعك، اعمل <code>git add .</code> ثم <code>git commit -m "Initial commit"</code>. بعد كده اعمل حساب على GitHub، اعمل Repository جديد، وارفع مشروعك بـ <code>git remote add origin ...</code> و<code>git push -u origin main</code>.</div>
    <div class="en">🇬🇧 On your own machine (not here on the platform): create a new folder, run <code>git init</code>, write a <code>README.md</code> with two lines about your project, run <code>git add .</code> then <code>git commit -m "Initial commit"</code>. Then create a GitHub account, make a new Repository, and push your project with <code>git remote add origin ...</code> and <code>git push -u origin main</code>.</div>
</div>

<div class="exercise-box">
    <h3>✍️ تمرين إضافي / Extra Exercise</h3>
    <div class="ar">🇪🇬 على مشروع Task Manager بتاعك، اعمل فرع اسمه <code>feature-search</code>، ضيف عليه تعديل بسيط (زي تعليق أو دالة فاضية)، اعمل commit، وارجع لـ main وادمج الفرع بـ <code>git merge feature-search</code>.</div>
    <div class="en">🇬🇧 On your Task Manager project, create a branch called <code>feature-search</code>, add a small change to it (like a comment or an empty function), commit it, then switch back to main and merge the branch with <code>git merge feature-search</code>.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 كل تعديل في مشروع Task Manager من هنا وطالع المفروض يتحفظ بـ Git — مش بس عشان "تعمل نسخة احتياطية"، لكن عشان أي خطوة نشر حقيقية (زي CI/CD اللي شفتها في المسار الاحترافي) بتبدأ من مستودع Git منظم. الدرس الجاي هيوريك الأساسيات اللي هتحتاجها على السيرفر نفسه بعد ما ترفع الكود.</div>
    <div class="en">🇬🇧 Every change to the Task Manager from here on should be saved with Git — not just as a "backup", but because any real deployment step (like the CI/CD you saw in the professional track) starts from an organized Git repository. The next lesson covers the basics you'll need on the server itself once the code is pushed.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>Repository = مشروع بيتتبعه Git. Commit = لقطة محفوظة مع رسالة. Branch = خط تطوير منفصل.</li>
        <li>الدورة اليومية: <code>status</code> → <code>add</code> → <code>commit</code> → <code>push</code>، و<code>pull</code> قبل ما تبدأ شغل.</li>
        <li><code>.gitignore</code> بيمنع تتبّع ملفات حساسة زي <code>.env</code> — لازم يتحط من الأول.</li>
        <li>كل الأوامر والنواتج هنا توضيحية 100% (Illustrative) — جرّبها بنفسك في تيرمينال حقيقي.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="mvc-refactor-project.php">← المرحلة السابقة</a>
    <a href="linux-basics-backend.php">المرحلة الجاية / Next: Linux Basics →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
