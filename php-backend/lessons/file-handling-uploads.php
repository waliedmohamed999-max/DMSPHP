<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'file-handling-uploads';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'الملفات، JSON، والـ APIs — التعامل مع الملفات والرفع';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">Stage 6 · Files, JSON & APIs</span>
<h1>التعامل مع الملفات والرفع <span class="ltr">File Handling &amp; Uploads</span></h1>
<p class="subtitle">fopen/fwrite/fread، و$_FILES، وأساسيات رفع ملف بأمان. <span class="ltr">fopen/fwrite/fread, $_FILES, and the basics of a safe file upload.</span></p>

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
    <div class="ar">🇪🇬 تتعلم إزاي تكتب وتقرأ ملف من القرص مباشرة بـ PHP باستخدام <code>fopen</code>/<code>fwrite</code>/<code>fread</code>/<code>fclose</code>، وتفهم هيكل <code>$_FILES</code> اللي بيوصل لما مستخدم يرفع ملف من فورم، وتكتب منطق تحقق حقيقي يرفض ملف كبير جدًا أو بامتداد خطر قبل ما تقبله.</div>
    <div class="en">🇬🇧 Learn how to write and read a file directly from disk in PHP using <code>fopen</code>/<code>fwrite</code>/<code>fread</code>/<code>fclose</code>, understand the <code>$_FILES</code> structure that arrives when a user uploads a file from a form, and write real validation logic that rejects a file that's too large or has a dangerous extension before accepting it.</div>
</div>

<h2 id="understand">🧠 1) القراءة والكتابة الأساسية / Basic Reading &amp; Writing</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <code>fopen($path, $mode)</code> بتفتح ملف وترجع "مقبض" (Handle) بتستخدمه في باقي الدوال. الوضع <code>'w'</code> بيفتح للكتابة (وبيمسح المحتوى القديم لو الملف موجود)، و<code>'r'</code> بيفتح للقراءة فقط. لازم تقفل الملف دايمًا بـ <code>fclose()</code> بعد ما تخلص، عشان تحرر الموارد وتضمن إن البيانات اتكتبت فعليًا على القرص.</div>
    <div class="en">🇬🇧 <code>fopen($path, $mode)</code> opens a file and returns a "handle" you use with the other functions. Mode <code>'w'</code> opens for writing (and erases any existing content), while <code>'r'</code> opens for reading only. Always close the file with <code>fclose()</code> when done, to free resources and make sure the data was actually flushed to disk.</div>
</div>

<pre><code>&lt;?php
$path = __DIR__ . '/demo_notes.txt';

$handle = fopen($path, 'w');
fwrite($handle, "Line 1: Hello from fwrite\n");
fwrite($handle, "Line 2: PHP file handling works\n");
fclose($handle);
echo "Wrote file: " . basename($path) . " (" . filesize($path) . " bytes)" . PHP_EOL;

$handle = fopen($path, 'r');
$contents = fread($handle, filesize($path));
fclose($handle);
echo "Read back contents:" . PHP_EOL;
echo $contents;

unlink($path); // cleanup - this is a temp demo file
echo "File exists after unlink(): " . var_export(file_exists($path), true) . PHP_EOL;</code></pre>
<h3>الناتج الفعلي (اتنفّذ فعليًا، والملف اتمسح بعدها) / Actual output (really executed, file cleaned up after)</h3>
<div class="output-box">Wrote file: demo_notes.txt (58 bytes)
Read back contents:
Line 1: Hello from fwrite
Line 2: PHP file handling works
File exists after unlink(): false</div>

<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ إننا استخدمنا <code>filesize($path)</code> كعدد البايتات اللي نقراها بـ <code>fread</code> — لو الملف كبير جدًا، الأفضل تقرأه على أجزاء (Chunks) بدل ما تحمّله كله في الذاكرة مرة واحدة. وفي الديمو ده، مسحنا الملف بـ <code>unlink()</code> فورًا بعد ما استخدمناه — نظافة الملفات المؤقتة عادة كويسة، مش بس في الدروس.</div>
    <div class="en">🇬🇧 Notice we used <code>filesize($path)</code> as the byte count to <code>fread</code> — for a very large file, it's better to read it in chunks instead of loading it all into memory at once. In this demo, we deleted the file with <code>unlink()</code> right after using it — cleaning up temp files is generally good practice, not just for lessons.</div>
</div>

<div class="mini-editor-wrap">
    <textarea spellcheck="false">&lt;?php
$path = __DIR__ . '/mini_demo.txt';

$handle = fopen($path, 'w');
fwrite($handle, "Testing the mini editor!\n");
fclose($handle);

$contents = file_get_contents($path);
echo "Contents: " . $contents;

unlink($path);
echo "Cleaned up: " . var_export(!file_exists($path), true) . PHP_EOL;</textarea>
    <div class="mini-toolbar">
        <button class="mini-run-btn">▶ شغّل / Run</button>
        <span class="mini-status"></span>
    </div>
    <div class="output-box">— لسه متشغلش / not run yet —</div>
</div>

<h2 id="practice">💻 2) هيكل $_FILES والتحقق منه / The $_FILES Structure &amp; Validating It</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 لما مستخدم يرفع ملف من فورم فيه <code>&lt;input type="file" name="avatar"&gt;</code> و<code>enctype="multipart/form-data"</code>، PHP بتملى <code>$_FILES['avatar']</code> بمصفوفة فيها: <code>name</code> (اسم الملف الأصلي)، <code>type</code> (MIME Type اللي بعته المتصفح — ممكن يتزوّر فمتوثقش فيه لوحده)، <code>tmp_name</code> (مكان الملف المؤقت على السيرفر)، <code>error</code> (كود الخطأ، <code>UPLOAD_ERR_OK</code> = 0 يعني تمام)، و<code>size</code> (الحجم بالبايت).</div>
    <div class="en">🇬🇧 When a user uploads a file from a form with <code>&lt;input type="file" name="avatar"&gt;</code> and <code>enctype="multipart/form-data"</code>, PHP fills <code>$_FILES['avatar']</code> with an array containing: <code>name</code> (the original filename), <code>type</code> (the MIME type the browser claims — it can be spoofed, so don't trust it alone), <code>tmp_name</code> (the temp file location on the server), <code>error</code> (an error code, <code>UPLOAD_ERR_OK</code> = 0 means fine), and <code>size</code> (size in bytes).</div>
</div>

<div class="bi-block">
    <div class="ar">🇪🇬 <strong>ملحوظة صدق:</strong> رفع ملف حقيقي (Multipart Upload) بيحتاج طلب HTTP حقيقي من متصفح بفورم فعلي — محرر الكود ده ملوش الإمكانية دي. عشان كده هنحاكي <code>$_FILES</code> بمصفوفة يدوية بنفس الشكل بالظبط اللي PHP كانت هتملّاه بعد رفع حقيقي — لكن دالة التحقق نفسها (بتفحص الحجم والامتداد) بتتنفذ فعليًا وبنتائج حقيقية.</div>
    <div class="en">🇬🇧 <strong>Honesty note:</strong> a real file upload (multipart) needs a real HTTP request from a browser with an actual form — this code editor can't do that. So we simulate <code>$_FILES</code> with a manual array in exactly the shape PHP would have filled after a real upload — but the validation function itself (checking size and extension) genuinely executes, with real results.</div>
</div>

<pre><code>&lt;?php
function validateUpload(array $file, int $maxBytes, array $allowedExt): array {
    $errors = [];
    if ($file['error'] !== UPLOAD_ERR_OK) {
        $errors[] = "Upload error code: {$file['error']}";
        return $errors;
    }
    if ($file['size'] > $maxBytes) {
        $errors[] = "File too large: {$file['size']} bytes (max $maxBytes)";
    }
    $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    if (!in_array($ext, $allowedExt, true)) {
        $errors[] = "Extension '.$ext' not allowed";
    }
    return $errors;
}

// Simulating exactly what PHP would populate $_FILES['avatar'] with
$simulatedFiles = [
    'Case 1: valid jpg' => [
        'name' => 'photo.jpg', 'type' => 'image/jpeg',
        'tmp_name' => '/tmp/phpA1B2C3', 'error' => UPLOAD_ERR_OK, 'size' => 240000,
    ],
    'Case 2: too large' => [
        'name' => 'movie.jpg', 'type' => 'image/jpeg',
        'tmp_name' => '/tmp/phpD4E5F6', 'error' => UPLOAD_ERR_OK, 'size' => 9000000,
    ],
    'Case 3: bad extension' => [
        'name' => 'script.php', 'type' => 'application/x-php',
        'tmp_name' => '/tmp/phpG7H8I9', 'error' => UPLOAD_ERR_OK, 'size' => 2000,
    ],
];

foreach ($simulatedFiles as $label => $file) {
    echo "=== $label ===" . PHP_EOL;
    $errors = validateUpload($file, 2 * 1024 * 1024, ['jpg', 'jpeg', 'png', 'gif']);
    if (empty($errors)) {
        echo "Result: ACCEPTED" . PHP_EOL;
    } else {
        echo "Result: REJECTED" . PHP_EOL;
        foreach ($errors as $e) echo " - $e" . PHP_EOL;
    }
}</code></pre>
<h3>الناتج الفعلي (منطق التحقق اتنفذ فعليًا) / Actual output (the validation logic really executed)</h3>
<div class="output-box">=== Case 1: valid jpg ===
Result: ACCEPTED
=== Case 2: too large ===
Result: REJECTED
 - File too large: 9000000 bytes (max 2097152)
=== Case 3: bad extension ===
Result: REJECTED
 - Extension '.php' not allowed</div>

<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ إننا اعتمدنا على امتداد الملف (<code>pathinfo(..., PATHINFO_EXTENSION)</code>) مش على <code>$file['type']</code> — لإن الـ MIME Type اللي المتصفح بيبعته ممكن يتزوّر بسهولة (حد يقدر يسمي ملف <code>evil.php</code> ويقول إنه <code>image/jpeg</code>). في مشروع حقيقي، كان المفروض كمان نتحقق من محتوى الملف فعليًا (زي <code>getimagesize()</code> لو متوقع صورة) مش بس اسمه.</div>
    <div class="en">🇬🇧 Notice we relied on the file's extension (<code>pathinfo(..., PATHINFO_EXTENSION)</code>) rather than <code>$file['type']</code> — because the browser-reported MIME type can be spoofed easily (someone can name a file <code>evil.php</code> and claim it's <code>image/jpeg</code>). In a real project, you'd also verify the file's actual content (e.g. <code>getimagesize()</code> for an expected image), not just its name.</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="close">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">ليه لازم تنادي <code>fclose()</code> بعد <code>fopen()</code>؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Why must you call <code>fclose()</code> after <code>fopen()</code>?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="close"> عشان تحرر الموارد وتضمن إن البيانات اتكتبت فعليًا على القرص</label>
        <label><input type="radio" name="q1" value="speed"> عشان يخلي الكود يشتغل أسرع بس، مش أكتر</label>
        <label><input type="radio" name="q1" value="required"> مش لازم أصلًا، PHP بتقفل الملف لوحدها فورًا</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="reject">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">حسب Case 2 المنفّذ فوق (9,000,000 بايت والحد الأقصى 2,097,152)، إيه النتيجة؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Based on Case 2 executed above (9,000,000 bytes, max 2,097,152), what's the result?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="accept"> ACCEPTED</label>
        <label><input type="radio" name="q2" value="reject"> REJECTED - File too large</label>
        <label><input type="radio" name="q2" value="error"> Fatal Error</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="spoof">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">ليه معتمدناش على <code>$file['type']</code> وحده للتحقق من نوع الملف؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Why didn't we rely on <code>$file['type']</code> alone to validate file type?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="spoof"> لإن المتصفح هو اللي بيحدده، وممكن يتزوّر بسهولة</label>
        <label><input type="radio" name="q3" value="slow"> لإنه بيبطّئ الكود</label>
        <label><input type="radio" name="q3" value="notexist"> لإنه مش موجود أصلًا في $_FILES</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="ok">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question"><code>UPLOAD_ERR_OK</code> بتساوي كام، ومعناها إيه؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What does <code>UPLOAD_ERR_OK</code> equal, and what does it mean?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="ok"> 0 - الرفع تم من غير أي خطأ</label>
        <label><input type="radio" name="q4" value="one"> 1 - الرفع فشل دايمًا</label>
        <label><input type="radio" name="q4" value="null"> null - معناها لسه محددش</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ سجل رفع ملفات (Log File) / An Upload Log</h3>
    <div class="ar">🇪🇬 في <a href="../playground/index.php">محرر الكود</a>: استخدم <code>fopen($path, 'a')</code> (وضع الإضافة Append) عشان تكتب سطر جديد في ملف <code>upload_log.txt</code> في كل مرة ملف "يتقبل" في مصفوفة <code>$simulatedFiles</code> من المثال فوق (مش هتحذفه في النهاية، بلاش، امسحه بـ <code>unlink()</code> بعد ما تشوف النتيجة). اطبع محتوى الملف في الآخر بـ <code>file_get_contents</code>.</div>
    <div class="en">🇬🇧 In the <a href="../playground/index.php">Playground</a>: use <code>fopen($path, 'a')</code> (append mode) to write a new line into an <code>upload_log.txt</code> file every time a file is "accepted" from the <code>$simulatedFiles</code> array above. Print the file's contents at the end with <code>file_get_contents</code>, then clean it up with <code>unlink()</code>.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 دلوقتي تقدر تكتب وتقرأ ملفات نصية عادية — الخطوة الجاية إنك تتعلم تنسيق البيانات القياسي اللي بيتبادله السيرفرات وAPIs مع بعض: JSON. هتحوّل مصفوفات PHP لـ JSON والعكس، وتفهم الفرق بين استقبالها كـ array أو object.</div>
    <div class="en">🇬🇧 You can now write and read plain text files — the next step is learning the standard data format servers and APIs exchange with each other: JSON. You'll convert PHP arrays to JSON and back, and understand the difference between receiving it as an array or an object.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li><code>fopen/fwrite/fread/fclose</code> بتتيح التحكم المباشر في ملفات على القرص، ولازم تقفل الملف دايمًا بعد الاستخدام.</li>
        <li><code>$_FILES</code> بتحمل <code>name/type/tmp_name/error/size</code> لكل ملف مرفوع من فورم <code>multipart/form-data</code>.</li>
        <li>اتحقق دايمًا من الحجم والامتداد (مش من <code>type</code> المتصفح وحده) قبل قبول أي ملف مرفوع.</li>
        <li>رفع ملف حقيقي محتاج طلب HTTP فعلي، فمحاكينا <code>$_FILES</code> يدويًا مع تنفيذ حقيقي لمنطق التحقق.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="session-vs-cookie.php">← الدرس السابق / Prev: Session vs Cookie</a>
    <a href="json-encode-decode.php">الدرس الجاي / Next: JSON Encode &amp; Decode →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
