<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'tools';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'أدوات المطوّر — Command Line و Git/GitHub';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">أدوات المطوّر / Developer Tools</span>
<h1>Command Line و Git/GitHub <span class="ltr">Essential Developer Tools</span></h1>
<p class="subtitle">قبل ما نغوص في PHP نفسها، محتاج أداتين هتستخدمهم كل يوم طول حياتك المهنية: التيرمينال (Command Line)، وGit عشان تحفظ تاريخ مشروعك وترفعه على GitHub. من غيرهم مش هتقدر تشتغل مع أي فريق حقيقي.</p>

<div class="step-tracker">
    <a href="#read">📖 Read</a>
    <a href="#understand">🧠 Understand</a>
    <a href="#practice">💻 Practice</a>
    <a href="#quiz">🧠 Quiz</a>
    <a href="#challenge">🛠️ Challenge</a>
    <a href="#project">🚀 Project</a>
</div>

<h2 id="read">📖 الهدف / Goal</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 تتحرك في نظام الملفات من التيرمينال بدل الماوس، وتفهم مبدأ التحكم بالإصدارات (Version Control) وتستخدم أوامر Git الأساسية، وترفع مشروعك على GitHub وتتعامل مع الفروع.</div>
    <div class="en">🇬🇧 Navigate the filesystem from the terminal instead of a mouse, understand Version Control and use core Git commands, and push your project to GitHub while working with branches.</div>
</div>

<h2 id="understand">🧠 1) أساسيات التيرمينال / Command Line Basics</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 التيرمينال بيخليك تتحكم في جهازك بأوامر نصية بدل الضغط بالماوس — أسرع وأدق، وأي سيرفر حقيقي بتتعامل معه هيبقى من غير واجهة رسومية أصلًا. الأوامر الأساسية بتختلف شوية بين Windows (PowerShell/CMD) وLinux/Mac، لكن المفهوم واحد.</div>
    <div class="en">🇬🇧 The terminal lets you control your machine with text commands instead of clicking — faster and more precise, and any real server you'll work on has no graphical interface at all. Core commands differ slightly between Windows (PowerShell/CMD) and Linux/Mac, but the concept is the same.</div>
</div>

<pre><code># Linux / Mac                    # Windows (PowerShell)
pwd                               # Get-Location   (فين أنا دلوقتي)
ls                                # Get-ChildItem / ls   (محتويات المجلد)
cd projects                       # cd projects     (ادخل مجلد)
mkdir my-app                      # mkdir my-app    (اعمل مجلد جديد)
cp file.php backup.php            # copy file.php backup.php
mv old.php new.php                # Rename-Item old.php new.php
cat file.php                      # Get-Content file.php   (اعرض محتوى ملف)
rm file.php                       # Remove-Item file.php   (احذف ملف)</code></pre>
<h3>مثال جلسة فعلية / Example session</h3>
<div class="output-box">$ pwd
/c/Users/Waleed/projects

$ mkdir task-manager
$ cd task-manager
$ pwd
/c/Users/Waleed/projects/task-manager</div>

<div class="bi-block">
    <div class="ar">🇪🇬 مش لازم تحفظ كل الأوامر من أول مرة — اللي مهم دلوقتي إنك تتعود تفتح التيرمينال بدل ما تدور على الملف بالماوس، وباقي الأوامر هتترسخ بالاستخدام.</div>
    <div class="en">🇬🇧 You don't need to memorize every command right away — what matters now is building the habit of reaching for the terminal instead of hunting for a file with the mouse; the rest sticks with practice.</div>
</div>

<h2>2) ليه Git؟ / Why Version Control</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 من غير Git، لو غيّرت كود وكسرت حاجة، مفيش طريقة سهلة ترجع للنسخة اللي كانت شغالة. <b>Git</b> بياخد "صورة" (Commit) من مشروعك في كل نقطة مهمة، فتقدر ترجع لأي نقطة قبل كده، تشوف مين غيّر إيه وإمتى، وتشتغل إنت وزمايلك على نفس المشروع من غير ما تدوسوا على شغل بعض.</div>
    <div class="en">🇬🇧 Without Git, if you change code and break something, there's no easy way back to the working version. <b>Git</b> takes a "snapshot" (Commit) of your project at every meaningful point, so you can return to any earlier point, see who changed what and when, and work alongside teammates on the same project without stepping on each other's work.</div>
</div>

<h2>3) أوامر Git الأساسية / Core Git Commands</h2>
<div class="flow-diagram">
    <div class="flow-box">Working Directory</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">git add</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">Staging Area</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">git commit</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">Local Repository</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">git push → GitHub</div>
</div>
<div class="bi-block">
    <div class="ar">🇪🇬 كل تعديل بيعمل رحلة بالترتيب ده: بتعدّل ملف في مجلد المشروع، <code>git add</code> بيحطه في "منطقة التجهيز" (Staging)، <code>git commit</code> بياخد صورة دائمة منه في المستودع المحلي، و<code>git push</code> يرفعها لـ GitHub. مفيش خطوة بتتخطى التانية.</div>
    <div class="en">🇬🇧 Every change makes this exact journey: you edit a file in the project folder, <code>git add</code> moves it to the Staging Area, <code>git commit</code> takes a permanent snapshot in the local repository, and <code>git push</code> uploads it to GitHub. No step skips the one before it.</div>
</div>
<pre><code>git init                          # حوّل المجلد الحالي لمستودع Git
git status                        # شوف إيه اللي اتغيّر ولسه متسجلش
git add file.php                  # جهّز ملف معيّن للـ commit
git add .                         # جهّز كل التعديلات
git commit -m "Add login page"    # سجّل "صورة" بالتعديلات دي مع رسالة توضيحية
git log --oneline                 # شوف تاريخ كل الـ commits</code></pre>
<h3>مثال جلسة فعلية / Example session</h3>
<div class="output-box">$ git init
Initialized empty Git repository in task-manager/.git/

$ git status
Untracked files:
  index.php
  config.php

$ git add .
$ git commit -m "Initial commit: basic routing setup"
[main (root-commit) a1b2c3d] Initial commit: basic routing setup
 2 files changed, 34 insertions(+)

$ git log --oneline
a1b2c3d Initial commit: basic routing setup</div>

<div class="bi-block">
    <div class="ar">🇪🇬 عادة كويسة: اعمل <code>commit</code> صغير وواضح المعنى بعد كل خطوة منطقية (مش بعد كل سطر، ومش بعد يوم كامل شغل) — ورسالة الـ commit تشرح "ليه" مش بس "إيه".</div>
    <div class="en">🇬🇧 Good habit: make small, meaningful commits after each logical step (not after every line, not after a full day's work) — and write commit messages explaining "why," not just "what."</div>
</div>

<h2>4) الفروع / Branches</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 الـ <b>Branch</b> بيخليك تطوّر ميزة جديدة أو تصلّح Bug في "نسخة موازية" من الكود، من غير ما تلمس النسخة الأساسية (<code>main</code>) اللي شغالة فعليًا. لما تخلّص وتتأكد إن كل حاجة تمام، بتدمج (<code>merge</code>) الفرع في <code>main</code>.</div>
    <div class="en">🇬🇧 A <b>Branch</b> lets you develop a new feature or fix a bug in a "parallel copy" of the code, without touching the live <code>main</code> version. Once you're done and confident everything works, you <code>merge</code> the branch back into <code>main</code>.</div>
</div>

<pre><code>git branch feature-login          # اعمل فرع جديد
git checkout feature-login        # انتقل للفرع ده
git switch feature-login          # نفس الفكرة (أمر أحدث)
# ... تعديلات + commits على الفرع ...
git checkout main                 # ارجع للفرع الأساسي
git merge feature-login           # ادمج التعديلات في main</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">$ git switch feature-login
Switched to a new branch 'feature-login'

$ git commit -m "Add login form validation"
[feature-login e5f6a7b] Add login form validation

$ git checkout main
Switched to branch 'main'

$ git merge feature-login
Updating a1b2c3d..e5f6a7b
Fast-forward
 login.php | 12 ++++++++++++</div>

<h2>5) GitHub — النسخة السحابية من مشروعك / GitHub</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 Git بيشتغل على جهازك بس. <b>GitHub</b> موقع بيستضيف نسخة من مستودع الـ Git بتاعك على الإنترنت — بيبقى Backup آمن، وطريقة تشارك بيها الكود مع فريق أو صاحب عمل، وأساس أي Portfolio حقيقي.</div>
    <div class="en">🇬🇧 Git works locally on your machine. <b>GitHub</b> is a site that hosts a copy of your Git repository online — a safe backup, a way to share code with a team or employer, and the foundation of any real Portfolio.</div>
</div>

<pre><code>git remote add origin https://github.com/username/task-manager.git
git push -u origin main           # ارفع الكود لأول مرة
git push                          # أي رفع بعد كده
git pull                          # اسحب أي تعديلات جديدة من GitHub
git clone https://github.com/username/task-manager.git   # حمّل مشروع موجود بالفعل</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">$ git push -u origin main
Enumerating objects: 6, done.
Writing objects: 100% (6/6), 1.2 KiB | 1.2 MiB/s, done.
To https://github.com/username/task-manager.git
 * [new branch]      main -> main
Branch 'main' set up to track 'origin/main'.</div>

<div class="bi-block">
    <div class="ar">🇪🇬 لما تشتغل مع فريق، مبتعملش <code>push</code> مباشر على <code>main</code> عادة — بتعمل فرع، وترفعه، وتفتح <b>Pull Request</b> (طلب دمج) على GitHub، وزمايلك بيراجعوا الكود قبل ما يتدمج. ده أساس أي عمل جماعي احترافي.</div>
    <div class="en">🇬🇧 When working with a team, you typically don't push directly to <code>main</code> — you push a branch and open a <b>Pull Request</b> on GitHub, and teammates review the code before it's merged. This is the foundation of any professional team workflow.</div>
</div>

<h2>6) لما الدمج يفشل: حل Merge Conflict / When Merging Fails: Resolving a Conflict</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 مثال الـ <code>merge</code> اللي شفته فوق كان "Fast-forward" — سهل لإن <code>main</code> ماتغيّرش من وقت ما عملت الفرع. لكن الأكتر واقعية: زميلك عدّل نفس السطر بالظبط في <code>main</code> وانت عدّلته في فرعك. Git مش هيعرف يقرر مين الصح، فهيوقّف الدمج ويسيبلك تحل التعارض يدويًا.</div>
    <div class="en">🇬🇧 The <code>merge</code> example above was a "Fast-forward" — easy because <code>main</code> hadn't changed since you branched. More realistic: a teammate edited the exact same line on <code>main</code> while you edited it on your branch. Git can't decide who's right, so it halts the merge and leaves you to resolve the conflict manually.</div>
</div>
<pre><code>git checkout main
git merge feature-pricing</code></pre>
<h3>مثال جلسة فعلية (تعارض حقيقي) / Example session (real conflict)</h3>
<div class="output-box">$ git merge feature-pricing
Auto-merging config.php
CONFLICT (content): Merge conflict in config.php
Automatic merge failed; fix conflicts and then commit the result.

$ cat config.php
&lt;&lt;&lt;&lt;&lt;&lt;&lt; HEAD
$taxRate = 0.15; // main: ضريبة جديدة اتحطت هنا
=======
$taxRate = 0.10; // feature-pricing: نسخة الفرع
&gt;&gt;&gt;&gt;&gt;&gt;&gt; feature-pricing

$ nano config.php   # (أو أي محرر) امسح العلامات واختر/ادمج القيمة الصح يدويًا

$ git add config.php
$ git commit -m "Merge feature-pricing, resolve tax rate conflict"
[main 9f1a2c3] Merge feature-pricing, resolve tax rate conflict</div>
<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ العلامات <code>&lt;&lt;&lt;&lt;&lt;&lt;&lt; HEAD</code> / <code>=======</code> / <code>&gt;&gt;&gt;&gt;&gt;&gt;&gt; feature-pricing</code> — دي مش جزء من الكود، Git بيحطها يدويًا في الملف عشان يوريك بالظبط فين التعارض، وإيه القيمة من <code>main</code> وإيه القيمة من فرعك. شغلك إنك تفتح الملف، تمسح العلامات دي كلها، وتسيب القيمة الصح بس (أو دمج الاتنين لو منطقي)، وبعدين <code>git add</code> + <code>git commit</code> عادي عشان تقفل الدمج.</div>
    <div class="en">🇬🇧 Notice the markers <code>&lt;&lt;&lt;&lt;&lt;&lt;&lt; HEAD</code> / <code>=======</code> / <code>&gt;&gt;&gt;&gt;&gt;&gt;&gt; feature-pricing</code> — not real code, Git inserts them into the file to show exactly where the conflict is, and which value came from <code>main</code> vs. your branch. Your job: open the file, remove all the markers, keep only the correct value (or merge both if it makes sense), then <code>git add</code> + <code>git commit</code> normally to finish the merge.</div>
</div>

<h2 id="practice">💻 جرّب فكرة الـ Commits بنفسك / Try the Commit Idea Yourself</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 مينفعش نشغّل أوامر Terminal حقيقية جوه المتصفح، لكن نقدر نحاكي بالظبط نفس فكرة الـ Commits والـ History بكلاس PHP بسيط — عدّل الرسايل أو ضيف commit جديد وشغّله شوف الـ log بيتغيّر إزاي.</div>
    <div class="en">🇬🇧 We can't run real Terminal commands inside the browser, but we can simulate the exact idea of Commits and History with a simple PHP class — tweak the messages or add a new commit and run it to see the log change.</div>
</div>

<div class="mini-editor-wrap">
    <textarea spellcheck="false">&lt;?php
// محاكاة بسيطة لفكرة Git — مش أوامر حقيقية، لكنها بتوضح فكرة الـ Commits والـ History بمنطق PHP فعلي
class MiniGitRepo {
    private array $commits = [];
    private array $staged = [];

    public function add(string $file): void {
        $this->staged[] = $file;
    }

    public function commit(string $message): string {
        if (empty($this->staged)) {
            return "nothing to commit, working tree clean";
        }
        $hash = substr(md5($message . count($this->commits)), 0, 7);
        $this->commits[] = ['hash' => $hash, 'message' => $message, 'files' => $this->staged];
        $this->staged = [];
        return "[main $hash] $message";
    }

    public function log(): void {
        foreach (array_reverse($this->commits) as $c) {
            echo "{$c['hash']} {$c['message']}" . PHP_EOL;
        }
    }
}

$repo = new MiniGitRepo();
$repo->add('index.php');
$repo->add('config.php');
echo $repo->commit('Initial commit: basic routing setup') . PHP_EOL;

$repo->add('login.php');
echo $repo->commit('Add login form validation') . PHP_EOL;

echo PHP_EOL . "git log --oneline:" . PHP_EOL;
$repo->log();</textarea>
    <div class="mini-toolbar">
        <button class="mini-run-btn">▶ شغّل / Run</button>
        <span class="mini-status"></span>
    </div>
    <div class="output-box">— لسه متشغلش / not run yet —</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="staging">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">أمر <code>git add file.php</code> بيعمل إيه بالظبط؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What exactly does <code>git add file.php</code> do?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="commit"> بيسجل صورة دائمة من الملف / Permanently records a snapshot</label>
        <label><input type="radio" name="q1" value="staging"> بيحط الملف في منطقة التجهيز (Staging) قبل الـ commit</label>
        <label><input type="radio" name="q1" value="push"> بيرفع الملف على GitHub مباشرة</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="isolate">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">ليه بنعمل <code>branch</code> جديد بدل ما نعدّل على <code>main</code> مباشرة؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Why create a new branch instead of editing <code>main</code> directly?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="isolate"> عشان تطوّر ميزة/تصلّح باگ بمعزل عن النسخة الشغالة فعليًا</label>
        <label><input type="radio" name="q2" value="speed"> عشان الأوامر تشتغل أسرع</label>
        <label><input type="radio" name="q2" value="required"> Git مبيشتغلش أصلًا من غير branches</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="markers">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">لما تفتح ملف فيه Merge Conflict وتلاقي <code>&lt;&lt;&lt;&lt;&lt;&lt;&lt; HEAD</code> و<code>=======</code> و<code>&gt;&gt;&gt;&gt;&gt;&gt;&gt; feature-pricing</code>، إيه الصح تعمله؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Opening a conflicted file and seeing <code>&lt;&lt;&lt;&lt;&lt;&lt;&lt; HEAD</code>, <code>=======</code>, and <code>&gt;&gt;&gt;&gt;&gt;&gt;&gt; feature-pricing</code> — what's the right move?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="commit"> تعمل <code>git commit</code> على طول من غير ما تلمس الملف</label>
        <label><input type="radio" name="q3" value="markers"> تمسح العلامات، تختار/تدمج القيمة الصح، بعدين <code>git add</code> ثم <code>git commit</code></label>
        <label><input type="radio" name="q3" value="delete"> تمسح الملف كله وتبدأ من الصفر</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="samechange">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">ليه حصل Merge Conflict في مثال <code>config.php</code> فوق ولم يحصل في مثال <code>login.php</code> اللي قبله (Fast-forward)؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Why did a Merge Conflict happen in the <code>config.php</code> example but not the earlier <code>login.php</code> one (Fast-forward)?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="samechange"> لإن main والفرع عدّلوا نفس السطر بالظبط، وGit مايعرفش يختار مين الصح</label>
        <label><input type="radio" name="q4" value="filesize"> لإن config.php حجمه أكبر</label>
        <label><input type="radio" name="q4" value="random"> صدفة، الحاجتين ليهم نفس الاحتمال دايمًا</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ زوّد Branch على المحاكي / Add Branching to the Simulator</h3>
    <div class="ar">🇪🇬 في المحرر فوق، زوّد على كلاس <code>MiniGitRepo</code> خاصية <code>$currentBranch</code> (تبدأ بقيمة <code>"main"</code>)، وmethod اسمها <code>switchBranch(string $name)</code> تغيّرها، وخلّي <code>log()</code> يطبع اسم الفرع الحالي جنب كل commit.</div>
    <div class="en">🇬🇧 In the editor above, add a <code>$currentBranch</code> property to <code>MiniGitRepo</code> (defaulting to <code>"main"</code>), a <code>switchBranch(string $name)</code> method that changes it, and make <code>log()</code> print the current branch name next to each commit.</div>
</div>

<div class="exercise-box">
    <h3>✍️ تمرين إضافي / Extra Exercise</h3>
    <div class="ar">🇪🇬 اعمل مجلد جديد من التيرمينال، حوّله لمستودع Git بـ <code>git init</code>، اعمل ملف <code>index.php</code> بسيط واعمله <code>commit</code>. اعمل فرع اسمه <code>feature-about</code>، ضيف فيه صفحة جديدة، وادمجه في <code>main</code>. لو عندك حساب GitHub، اعمل مستودع فاضي وارفع المشروع عليه بـ <code>git push</code>.</div>
    <div class="en">🇬🇧 Create a new folder from the terminal, turn it into a Git repository with <code>git init</code>, create a simple <code>index.php</code> and commit it. Create a branch called <code>feature-about</code>, add a new page in it, and merge it into <code>main</code>. If you have a GitHub account, create an empty repository and push the project to it with <code>git push</code>.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 من أول سطر كود هتكتبه في مشروع Task Manager (الـ Capstone) لحد آخر نسخة تسلّمها، هتستخدم Git عشان تحفظ تاريخ التطوير خطوة بخطوة، وترفع المشروع على GitHub كجزء من الـ Portfolio بتاعك.</div>
    <div class="en">🇬🇧 From the first line of code you write in the Capstone Task Manager to the final version you submit, you'll use Git to record your development history step by step, and push the project to GitHub as part of your Portfolio.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>Command Line = تحكّم في الملفات بأوامر نصية، أساسي لأي شغل سيرفر حقيقي.</li>
        <li>Git = تاريخ كامل لمشروعك عن طريق <code>commit</code>s، وترجع لأي نقطة قبل كده وقت ما تحتاج.</li>
        <li><code>add</code> → <code>commit</code> → <code>log</code> هي الدورة الأساسية اليومية.</li>
        <li>Branches (<code>branch</code>/<code>switch</code>/<code>merge</code>) = تطوير ميزة بمعزل عن <code>main</code> الشغال فعليًا.</li>
        <li>GitHub = نسخة سحابية + Backup + Pull Requests للعمل الجماعي والـ Portfolio.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="stage0.php">← المرحلة السابقة</a>
    <a href="stage1.php">المرحلة الجاية / Next: PHP Fundamentals →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
