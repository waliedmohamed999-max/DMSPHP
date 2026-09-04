<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'json-notes-api-project';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'الملفات، JSON، والـ APIs — 🚀 مشروع: JSON Notes API';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">Stage 6 · Files, JSON & APIs</span>
<h1>🚀 مشروع: JSON Notes API <span class="ltr">🚀 Project: JSON Notes API</span></h1>
<p class="subtitle">API صغير حقيقي لملاحظات مخزّنة في ملف JSON — CRUD كامل من غير قاعدة بيانات. <span class="ltr">A real small API for notes stored in a JSON file — full CRUD without a database.</span></p>

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
    <div class="ar">🇪🇬 هتجمع كل حاجة اتعلمتها في المرحلة دي (fopen/fwrite للملفات، json_encode/json_decode) في مشروع واحد حقيقي: API بسيط لإدارة ملاحظات (Notes)، بدون أي قاعدة بيانات — كل البيانات بتتخزن في ملف <code>notes_demo.json</code> واحد. هتبني وتشغّل فعليًا: <code>addNote()</code>, <code>listNotes()</code>, و<code>deleteNote()</code>.</div>
    <div class="en">🇬🇧 You'll bring together everything from this stage (fopen/fwrite for files, json_encode/json_decode) into one real project: a simple API for managing Notes, with no database at all — all data lives in a single <code>notes_demo.json</code> file. You'll build and genuinely run: <code>addNote()</code>, <code>listNotes()</code>, and <code>deleteNote()</code>.</div>
</div>

<div class="bi-block">
    <div class="ar">🇪🇬 <strong>ملحوظة عن الملف:</strong> ملف <code>notes_demo.json</code> اتعمل فعليًا تحت <code>php-backend/sandbox/</code> وقت كتابة الدرس ده، اتشغلت عليه كل الخطوات تحت بالترتيب، والناتج المعروض حقيقي 100%. بعد كده اتمسح الملف كجزء من تنظيف الملفات المؤقتة — نفس الانضباط المتبع في باقي دروس المرحلة دي. لو شغّلت نفس الكود بنفسك، هيتعمل ملف جديد عندك بنفس الطريقة بالظبط.</div>
    <div class="en">🇬🇧 <strong>Note about the file:</strong> the <code>notes_demo.json</code> file was actually created under <code>php-backend/sandbox/</code> while writing this lesson, every step below ran against it in order, and the output shown is 100% real. It was then deleted afterward as part of temp-file cleanup — the same discipline used in the rest of this stage's lessons. If you run the same code yourself, it will create a fresh file for you the exact same way.</div>
</div>

<h2 id="understand">🧠 1) دوال القراءة والكتابة الأساسية / The Core Read/Write Functions</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 كل عملية في الـ API (إضافة، عرض، حذف) بترجع في النهاية لدالتين بسيطتين: <code>readNotes()</code> اللي بتقرا الملف وتفكّ الـ JSON لمصفوفة، و<code>writeNotes()</code> اللي بتاخد المصفوفة وتحوّلها JSON وتكتبها في الملف. باقي الدوال (add/list/delete) بس بتعدّل المصفوفة وسط العمليتين دول.</div>
    <div class="en">🇬🇧 Every operation in the API (add, list, delete) ultimately comes down to two simple functions: <code>readNotes()</code>, which reads the file and decodes its JSON into an array, and <code>writeNotes()</code>, which takes the array and encodes it back to JSON in the file. The other functions (add/list/delete) just modify the array between those two operations.</div>
</div>

<pre><code>&lt;?php
$file = __DIR__ . '/notes_demo.json';

function readNotes(string $file): array {
    if (!file_exists($file)) return [];
    $data = json_decode(file_get_contents($file), true);
    return is_array($data) ? $data : [];
}

function writeNotes(string $file, array $notes): void {
    file_put_contents($file, json_encode($notes, JSON_PRETTY_PRINT));
}

function addNote(string $file, string $text): array {
    $notes = readNotes($file);
    $nextId = 1;
    foreach ($notes as $n) {
        if ($n['id'] >= $nextId) $nextId = $n['id'] + 1;
    }
    $notes[] = ['id' => $nextId, 'text' => $text];
    writeNotes($file, $notes);
    return $notes;
}

function listNotes(string $file): array {
    return readNotes($file);
}

function deleteNote(string $file, int $id): array {
    $notes = readNotes($file);
    $notes = array_values(array_filter($notes, fn($n) => $n['id'] !== $id));
    writeNotes($file, $notes);
    return $notes;
}</code></pre>

<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ في <code>addNote</code> إننا بنحسب <code>$nextId</code> بإننا نلاقي أكبر ID موجود ونزوّد واحد عليه، مش بس <code>count($notes) + 1</code> — لإن لو حذفنا ملاحظة في النص، <code>count</code> هيقل، وممكن نكرر ID اتحذف قبل كده. وفي <code>deleteNote</code>، استخدمنا <code>array_values()</code> بعد <code>array_filter</code> عشان نعيد ترقيم مفاتيح المصفوفة من 0 تاني (وإلا JSON هيطلع Object مش Array لو المفاتيح بقت متقطعة).</div>
    <div class="en">🇬🇧 Notice in <code>addNote</code> we compute <code>$nextId</code> by finding the largest existing ID and adding one, not just <code>count($notes) + 1</code> — because if a note was deleted in between, <code>count</code> would drop, risking reusing an ID that was already deleted. And in <code>deleteNote</code>, we use <code>array_values()</code> after <code>array_filter</code> to re-index the array's keys back from 0 (otherwise the JSON would come out as an Object, not an Array, once the keys become non-sequential).</div>
</div>

<h2 id="practice">💻 2) تشغيل الـ CRUD كامل بالترتيب / Running Full CRUD in Order</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 هنشغّل دلوقتي: إضافة ملاحظتين، عرض القايمة، حذف واحدة، وعرض القايمة تاني عشان نثبت إنها اتشالت فعلًا. كل خطوة بتطبع محتوى الملف الحقيقي بعدها مباشرة — مفيش أي خطوة متخيّلة هنا.</div>
    <div class="en">🇬🇧 We'll now run: adding two notes, listing them, deleting one, and listing again to prove it's really gone. Every step prints the file's real content right after it — nothing here is imagined.</div>
</div>

<pre><code>echo "1) addNote('Buy milk')" . PHP_EOL;
addNote($file, 'Buy milk');
echo file_get_contents($file) . PHP_EOL;

echo "2) addNote('Finish PHP lesson')" . PHP_EOL;
addNote($file, 'Finish PHP lesson');
echo file_get_contents($file) . PHP_EOL;

echo "3) listNotes()" . PHP_EOL;
print_r(listNotes($file));

echo "4) deleteNote(1)" . PHP_EOL;
deleteNote($file, 1);
echo file_get_contents($file) . PHP_EOL;

echo "5) listNotes() again - proving note 1 is gone" . PHP_EOL;
print_r(listNotes($file));</code></pre>
<h3>الناتج الفعلي (اتنفّذ فعليًا بالترتيب، ملف الديمو اتمسح بعدها) / Actual output (really executed in order, demo file cleaned up after)</h3>
<div class="output-box">1) addNote('Buy milk')
[
    {
        "id": 1,
        "text": "Buy milk"
    }
]

2) addNote('Finish PHP lesson')
[
    {
        "id": 1,
        "text": "Buy milk"
    },
    {
        "id": 2,
        "text": "Finish PHP lesson"
    }
]

3) listNotes()
Array
(
    [0] => Array
        (
            [id] => 1
            [text] => Buy milk
        )

    [1] => Array
        (
            [id] => 2
            [text] => Finish PHP lesson
        )

)

4) deleteNote(1)
[
    {
        "id": 2,
        "text": "Finish PHP lesson"
    }
]

5) listNotes() again - proving note 1 is gone
Array
(
    [0] => Array
        (
            [id] => 2
            [text] => Finish PHP lesson
        )

)</div>

<div class="bi-block">
    <div class="ar">🇪🇬 في خطوة 5، لاحظ إن الملاحظة اللي كان <code>id => 1</code> (Buy milk) اختفت تمامًا من القايمة، والملاحظة التانية (<code>id => 2</code>) فضلت زي ما هي — الحذف كان دقيق ومحدد، مش مسح للملف كله وإعادة كتابته من الصفر.</div>
    <div class="en">🇬🇧 In step 5, notice the note with <code>id => 1</code> (Buy milk) is completely gone from the list, while the other note (<code>id => 2</code>) stayed exactly as it was — the deletion was precise and targeted, not a full wipe-and-rewrite of the file.</div>
</div>

<div class="mini-editor-wrap">
    <textarea spellcheck="false">&lt;?php
$file = __DIR__ . '/mini_notes.json';

function readNotes(string $file): array {
    if (!file_exists($file)) return [];
    $data = json_decode(file_get_contents($file), true);
    return is_array($data) ? $data : [];
}
function writeNotes(string $file, array $notes): void {
    file_put_contents($file, json_encode($notes, JSON_PRETTY_PRINT));
}
function addNote(string $file, string $text): array {
    $notes = readNotes($file);
    $nextId = 1;
    foreach ($notes as $n) { if ($n['id'] >= $nextId) $nextId = $n['id'] + 1; }
    $notes[] = ['id' => $nextId, 'text' => $text];
    writeNotes($file, $notes);
    return $notes;
}

addNote($file, 'Try the mini editor');
addNote($file, 'Add a second note');
echo file_get_contents($file) . PHP_EOL;

unlink($file); // cleanup
echo "Cleaned up: " . var_export(!file_exists($file), true) . PHP_EOL;</textarea>
    <div class="mini-toolbar">
        <button class="mini-run-btn">▶ شغّل / Run</button>
        <span class="mini-status"></span>
    </div>
    <div class="output-box">— لسه متشغلش / not run yet —</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="two">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">في خطوة 3 (<code>listNotes</code>) المنفّذة فوق، كام ملاحظة كانت موجودة؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">In step 3 (<code>listNotes</code>) executed above, how many notes existed?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="one"> ملاحظة واحدة</label>
        <label><input type="radio" name="q1" value="two"> ملاحظتين (Buy milk, Finish PHP lesson)</label>
        <label><input type="radio" name="q1" value="zero"> مفيش ولا ملاحظة</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="maxid">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">ليه <code>addNote</code> بتحسب <code>$nextId</code> من أكبر ID موجود، مش من <code>count($notes) + 1</code>؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Why does <code>addNote</code> compute <code>$nextId</code> from the largest existing ID, not <code>count($notes) + 1</code>?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="maxid"> عشان لو اتحذفت ملاحظة قبل كده، count هيقل وممكن يتكرر ID محذوف</label>
        <label><input type="radio" name="q2" value="fast"> عشان أسرع في الأداء</label>
        <label><input type="radio" name="q2" value="required"> PHP بتجبرك على كده</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="values">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question"><code>array_values()</code> بعد <code>array_filter()</code> في <code>deleteNote</code> بتعمل إيه بالظبط؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What does <code>array_values()</code> after <code>array_filter()</code> in <code>deleteNote</code> exactly do?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="values"> تعيد ترقيم مفاتيح المصفوفة من 0 تاني، عشان json_encode يطلعها Array مش Object</label>
        <label><input type="radio" name="q3" value="sort"> ترتب الملاحظات أبجديًا</label>
        <label><input type="radio" name="q3" value="dup"> تعمل نسخة مكررة من كل ملاحظة</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="gone">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">بعد <code>deleteNote(1)</code> في المثال فوق، إيه اللي ظهر في <code>listNotes()</code> الأخيرة؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">After <code>deleteNote(1)</code> above, what appeared in the final <code>listNotes()</code>?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="both"> الملاحظتين لسه موجودين</label>
        <label><input type="radio" name="q4" value="gone"> بس ملاحظة "Finish PHP lesson" (id 2)، وملاحظة id 1 اختفت</label>
        <label><input type="radio" name="q4" value="empty"> القايمة بقت فاضية تمامًا</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ إضافة updateNote() / Adding updateNote()</h3>
    <div class="ar">🇪🇬 في <a href="../playground/index.php">محرر الكود</a>: أضف دالة رابعة <code>updateNote(string $file, int $id, string $newText): array</code> بتدوّر على الملاحظة بالـ <code>id</code>، تغيّر نص <code>text</code> بتاعها، وتعيد كتابة الملف. جرّبها على الملاحظات اللي أضفتها، واطبع <code>listNotes()</code> قبل وبعد التعديل عشان تثبت إن التحديث اتنفذ فعلًا.</div>
    <div class="en">🇬🇧 In the <a href="../playground/index.php">Playground</a>: add a fourth function <code>updateNote(string $file, int $id, string $newText): array</code> that finds the note by <code>id</code>, changes its <code>text</code>, and rewrites the file. Test it on notes you've added, printing <code>listNotes()</code> before and after to prove the update genuinely happened.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 مبروك — خلّصت مرحلة كاملة عن الملفات، JSON، وAPIs خارجية، وشفت إزاي API صغير بيتبني بمنطق CRUD حقيقي من غير أي قاعدة بيانات. الخطوة الجاية في المسار هي مرحلة "تطبيق CRUD كامل" (Task Management System) — هتاخد نفس منطق Create/Read/Update/Delete اللي شفته هنا، وتبنيه بقاعدة بيانات MySQL حقيقية عبر PDO بدل ملف JSON، مع بحث، فلترة، وترقيم صفحات.</div>
    <div class="en">🇬🇧 Congratulations — you've completed a full stage on files, JSON, and external APIs, and seen how a small API is built on real CRUD logic without any database. The next stage on the track is the "CRUD Application" stage (a Task Management System) — you'll take this same Create/Read/Update/Delete logic and rebuild it against a real MySQL database via PDO instead of a JSON file, adding search, filtering, and pagination.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>الـ API كامل مبني على دالتين أساسيتين: <code>readNotes()</code> (decode) و<code>writeNotes()</code> (encode + كتابة الملف).</li>
        <li><code>addNote</code> بتولّد ID جديد آمن من أكبر ID موجود، مش من عدد العناصر.</li>
        <li><code>deleteNote</code> بتستخدم <code>array_filter</code> + <code>array_values</code> عشان تشيل عنصر وتحافظ على شكل JSON Array صحيح.</li>
        <li>شغّلنا الأربع خطوات فعليًا بالترتيب على ملف JSON حقيقي وأثبتنا إن الحذف بيشتغل، مش مجرد وصف نظري.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="consuming-external-apis.php">← الدرس السابق / Prev: Consuming External APIs</a>
    <a href="../index.php">المرحلة الجاية / Next stage →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
