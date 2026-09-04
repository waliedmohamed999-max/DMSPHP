<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'security-file-upload';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'الأمان — أمان رفع الملفات';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">Stage 14 · Security</span>
<h1>أمان رفع الملفات <span class="ltr">File Upload Security</span></h1>
<p class="subtitle">MIME Validation, Extension Validation, Random Filenames, أماكن التخزين الآمنة. <span class="ltr">MIME validation, extension validation, random filenames, and safe storage locations.</span></p>

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
    <div class="ar">🇪🇬 تفهم إن رفع الملفات من أخطر النقاط في أي موقع لو اتعامل معاها بسذاجة — ليه متعتمدش على امتداد الملف أو على <code>$_FILES['x']['type']</code> لوحدهم، إزاي تتحقق من نوع الملف الحقيقي بـ <code>finfo_file()</code>، وإزاي تولّد اسم ملف عشوائي آمن وتخزنه بره الـ Web Root.</div>
    <div class="en">🇬🇧 Understand that file uploads are one of the most dangerous surfaces on any site if handled naively — why you shouldn't rely on the file extension or <code>$_FILES['x']['type']</code> alone, how to check a file's real type with <code>finfo_file()</code>, and how to generate a safe random filename and store it outside the web root.</div>
</div>

<h2 id="understand">🧠 ليه تثق في الامتداد أو $_FILES['type'] خطأ / Why Trusting the Extension or $_FILES['type'] Is Wrong</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 كل بيانات فورم الرفع (اسم الملف، الامتداد، وحتى <code>$_FILES['x']['type']</code>) جايه من <b>المتصفح</b> — يعني من المستخدم نفسه، ومهاجم بسيط يقدر يغيّرها بأي أداة (زي DevTools أو Postman) قبل ما تتبعت. ملف اسمه <code>shell.php</code> ممكن يتبعت وهو مسمّى <code>photo.jpg.php</code> أو حتى <code>photo.jpg</code> بمحتوى PHP خالص جواه، وميحصلش أي فرق في اسم الملف أو النوع المُعلن.</div>
    <div class="en">🇬🇧 All upload form data (the filename, the extension, and even <code>$_FILES['x']['type']</code>) comes from the <b>browser</b> — meaning from the user themselves, and any basic attacker can change it with a tool like DevTools or Postman before it's sent. A file named <code>shell.php</code> can be sent renamed as <code>photo.jpg.php</code> or even <code>photo.jpg</code> while its actual content is pure PHP code — and nothing about the declared filename or type would reveal that.</div>
</div>

<div class="security-box">
    <h3>⚠️ ملحوظة صدق / Honesty Note</h3>
    <div class="ar">🇪🇬 اختبار سلوك <code>$_FILES</code> الحقيقي بيحتاج فورم HTML حقيقي بيبعت طلب <code>multipart/form-data</code> من متصفح فعلي — ده مش حاجة تقدر تحصل جوه محرر كود PHP بيشغّل سكريبت واحد بمعزل. عشان كده الجزء ده معلّم "Expected output" بدل <code>.output-box</code> فعلي. أما توليد اسم ملف عشوائي، فده كود PHP عادي بالكامل — وهنشغّله فعليًا تحت.</div>
    <div class="en">🇬🇧 Testing real <code>$_FILES</code> behavior requires an actual HTML form sending a <code>multipart/form-data</code> request from a real browser — that's not something achievable inside a PHP editor running one isolated script. That's why this part is labeled "Expected output" instead of a real <code>.output-box</code>. Generating a random filename, on the other hand, is plain PHP code — and we'll actually run that below.</div>
</div>

<pre><code>&lt;?php
// ⚠️ معرّض للاختراق — بيثق في بيانات جاية من المتصفح
$claimedType = $_FILES['avatar']['type'];       // المتصفح بيبعتها، ممكن تتزوّر بسهولة
$ext = strtolower(pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION)); // اسم الملف نفسه جاي من المستخدم

if ($claimedType === 'image/jpeg' || $ext === 'jpg') {
    move_uploaded_file($_FILES['avatar']['tmp_name'], __DIR__ . '/uploads/' . $_FILES['avatar']['name']);
    echo "Uploaded!";
}
// خطر: لو مهاجم بعت ملف PHP حقيقي مسمّى avatar.jpg وزوّر $_FILES['avatar']['type']
// ليبقى "image/jpeg"، الشرط ده هيعدّي عادي، والملف هيتخزن باسمه الأصلي جوه مجلد ممكن يكون متاح على الويب.</code></pre>
<h3>الناتج المتوقع (مش منفّذ — محتاج طلب HTTP حقيقي بملف مرفوع) / Expected output (not executed — requires a real HTTP request with an uploaded file)</h3>
<div class="output-box">Uploaded!
&lt;-- لكن الملف ده فعليًا كود PHP قابل للتنفيذ، مش صورة، لإن التحقق اعتمد بس على بيانات جاية من المتصفح --&gt;</div>

<h2 id="practice">💻 الحل: MIME حقيقي + امتداد + اسم عشوائي / The Fix: Real MIME + Extension + Random Name</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 الحل الصحيح فيه 4 طبقات: (1) <code>finfo_file()</code> بيفتح الملف فعليًا ويقرا محتواه عشان يحدد نوعه الحقيقي (مش بيثق في اسم أو ادعاء)، (2) قايمة بيضاء (Whitelist) للامتدادات المسموحة، (3) اسم ملف عشوائي تمامًا بـ <code>bin2hex(random_bytes(16))</code> عشان محدش يقدر يخمّن أو يفرض اسم فيه مسار خطير، و(4) تخزين الملفات في مجلد <b>بره</b> الـ Web Root عشان حتى لو ملف خبيث اتخزن، محدش يقدر يطلبه مباشرة من المتصفح وينفّذه.</div>
    <div class="en">🇬🇧 The correct fix has 4 layers: (1) <code>finfo_file()</code> actually opens the file and reads its content to determine its real type (never trusting a name or a claim), (2) an extension whitelist, (3) a fully random filename via <code>bin2hex(random_bytes(16))</code> so no one can guess or force a dangerous path/name, and (4) storing files <b>outside</b> the web root so even if a malicious file gets stored, no one can request it directly from the browser and have it execute.</div>
</div>

<pre><code>&lt;?php
$allowedExtensions = ['jpg', 'jpeg', 'png', 'pdf'];
$allowedMimeTypes = ['image/jpeg', 'image/png', 'application/pdf'];

function safeStoredName(string $originalName, array $allowedExtensions): ?string
{
    $ext = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));
    if (!in_array($ext, $allowedExtensions, true)) {
        return null;
    }
    return bin2hex(random_bytes(16)) . '.' . $ext;
}

$uploads = ['photo.jpg', 'resume.PDF', 'evil.php.jpg', 'malware.exe'];

foreach ($uploads as $original) {
    $stored = safeStoredName($original, $allowedExtensions);
    if ($stored === null) {
        echo "$original -&gt; REJECTED (extension not allowed)" . PHP_EOL;
    } else {
        echo "$original -&gt; $stored" . PHP_EOL;
    }
}</code></pre>
<h3>الناتج الفعلي (اتنفّذ فعليًا — الأسماء هتختلف في كل تشغيل) / Actual output (really executed — names differ on every run)</h3>
<div class="output-box">photo.jpg -> 5327d2f64075450ef48eab535ac0eaca.jpg
resume.PDF -> dfd774d0bfaddd6cd2ab46d27d7fe2ef.pdf
evil.php.jpg -> 3e947b6ab96228f61245cef53e142594.jpg
malware.exe -> REJECTED (extension not allowed)</div>

<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ: <code>evil.php.jpg</code> عدّى فحص الامتداد (لإن الامتداد الأخير <code>jpg</code> فعلاً مسموح) — ده بالظبط ليه فحص الامتداد وحده <b>مش كافي</b>؛ لازم يترافق دايمًا مع فحص <code>finfo_file()</code> على المحتوى الحقيقي للملف قبل ما تقبله نهائيًا.</div>
    <div class="en">🇬🇧 Notice: <code>evil.php.jpg</code> passed the extension check (because its last extension <code>jpg</code> is indeed allowed) — this is exactly why extension checking alone is <b>not enough</b>; it must always be paired with a <code>finfo_file()</code> check on the file's real content before you accept it at all.</div>
</div>

<div class="bi-block">
    <div class="ar">🇪🇬 <code>finfo_file()</code> نفسها كمان قابلة للتنفيذ محليًا لو عندنا ملف حقيقي على القرص. المثال ده بيكتب ملف اسمه <code>fake_upload.jpg</code> لكن محتواه كود PHP، ويثبت إن الفحص الحقيقي بالمحتوى بيكتشف الحقيقة بعكس النوع اللي "بيدّعيه" اسم الملف.</div>
    <div class="en">🇬🇧 <code>finfo_file()</code> itself is also runnable locally when we have a real file on disk. This example writes a file named <code>fake_upload.jpg</code> whose actual content is PHP code, and proves that a real content-based check reveals the truth, unlike what the filename "claims".</div>
</div>

<pre><code>&lt;?php
$fakeImage = __DIR__ . '/fake_upload.jpg';
file_put_contents($fakeImage, "&lt;?php echo 'not actually an image'; ?&gt;");

$claimedType = 'image/jpeg'; // زي ما المتصفح كان هيبعته في $_FILES['x']['type']
$finfo = finfo_open(FILEINFO_MIME_TYPE);
$realType = finfo_file($finfo, $fakeImage);
finfo_close($finfo);

echo "Filename: " . basename($fakeImage) . PHP_EOL;
echo "Client-claimed type (untrustworthy): $claimedType" . PHP_EOL;
echo "Real detected type (finfo_file, content-based): $realType" . PHP_EOL;
var_dump($realType === 'image/jpeg');

unlink($fakeImage);</code></pre>
<h3>الناتج الفعلي (اتنفّذ فعليًا) / Actual output (really executed)</h3>
<div class="output-box">Filename: fake_upload.jpg
Client-claimed type (untrustworthy): image/jpeg
Real detected type (finfo_file, content-based): text/x-php
bool(false)</div>

<div class="bi-block">
    <div class="ar">🇪🇬 الاسم بيقول <code>.jpg</code>، والنوع "المُعلن" بيقول <code>image/jpeg</code> — لكن الفحص الحقيقي بالمحتوى كشف إنه <code>text/x-php</code> فعليًا. لو الكود كان بيثق في الاسم أو الادعاء بس، كان هيقبل ملف PHP كامل على إنه صورة.</div>
    <div class="en">🇬🇧 The name says <code>.jpg</code>, and the "claimed" type says <code>image/jpeg</code> — but the real content-based check revealed it's actually <code>text/x-php</code>. If the code had trusted only the name or the claim, it would have accepted a full PHP file as an image.</div>
</div>

<div class="bi-block">
    <div class="ar">🇪🇬 جرّب توليد اسم ملف عشوائي بنفسك في المحرر تحت — عدّل قايمة الامتدادات أو أسماء الملفات وشوف الناتج.</div>
    <div class="en">🇬🇧 Try generating a random filename yourself in the editor below — tweak the extension list or filenames and see the result.</div>
</div>

<div class="mini-editor-wrap">
    <textarea spellcheck="false">&lt;?php
// ✅ آمن — Whitelist للامتداد + اسم ملف عشوائي غير قابل للتخمين
$allowedExtensions = ['jpg', 'jpeg', 'png', 'pdf'];

function safeStoredName(string $originalName, array $allowedExtensions): ?string
{
    $ext = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));
    if (!in_array($ext, $allowedExtensions, true)) {
        return null;
    }
    return bin2hex(random_bytes(16)) . '.' . $ext;
}

$uploads = ['photo.jpg', 'resume.PDF', 'evil.php.jpg', 'malware.exe'];

foreach ($uploads as $original) {
    $stored = safeStoredName($original, $allowedExtensions);
    echo $stored === null
        ? "$original -&gt; REJECTED (extension not allowed)" . PHP_EOL
        : "$original -&gt; $stored" . PHP_EOL;
}
</textarea>
    <div class="mini-toolbar">
        <button class="mini-run-btn">▶ شغّل / Run</button>
        <span class="mini-status"></span>
    </div>
    <div class="output-box">— لسه متشغلش / not run yet —</div>
</div>

<div class="security-box">
    <h3>⚠️ التخزين بره الـ Web Root / Storing Outside the Web Root</h3>
    <div class="ar">🇪🇬 حتى لو كل الفحوصات فوق اتعملت صح، خزّن الملفات المرفوعة في مجلد <b>بره</b> نطاق الـ Web Root (مش جوه <code>public_html</code> أو <code>htdocs</code> مباشرة) — وقدّم الملف بعدين عن طريق سكريبت PHP بيتحقق من الصلاحيات الأول، بدل ما يبقى الملف متاح بلينك مباشر. كده حتى ملف خبيث اتخزن غلط، محدش يقدر يطلبه من المتصفح وينفّذه كسكريبت.</div>
    <div class="en">🇬🇧 Even if every check above passes, store uploaded files in a folder <b>outside</b> the web root (not directly inside <code>public_html</code> or <code>htdocs</code>) — and serve the file later through a PHP script that checks permissions first, instead of the file being reachable by a direct link. This way, even a malicious file that slipped through cannot be requested by the browser and executed as a script.</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="browser">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">ليه متثقش في <code>$_FILES['x']['type']</code> لوحدها؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Why shouldn't you trust <code>$_FILES['x']['type']</code> alone?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="browser"> لإنها قيمة جاية من المتصفح/المستخدم وسهل تتزوّر</label>
        <label><input type="radio" name="q1" value="slow"> لإنها بطيئة في الحساب</label>
        <label><input type="radio" name="q1" value="deprecated"> لإنها Deprecated في PHP 8</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="finfo">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">إيه الدالة اللي بتحدد نوع الملف الحقيقي من محتواه؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Which function determines a file's real type from its content?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="finfo"> finfo_file()</label>
        <label><input type="radio" name="q2" value="pathinfo"> pathinfo()</label>
        <label><input type="radio" name="q2" value="basename"> basename()</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="rejected">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">حسب الديمو المنفّذ فوق، إيه اللي حصل لملف <code>malware.exe</code>؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Based on the executed demo above, what happened to <code>malware.exe</code>?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="rejected"> اتّرفض لإن امتداده مش في الـ Whitelist</label>
        <label><input type="radio" name="q3" value="renamed"> اتخزّن باسم عشوائي زي أي ملف تاني</label>
        <label><input type="radio" name="q3" value="crash"> سبب PHP Fatal Error</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="outside">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">ليه بنخزّن الملفات المرفوعة بره الـ Web Root؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Why do we store uploaded files outside the web root?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="outside"> عشان لو ملف خبيث اتخزن غلط، محدش يقدر يطلبه مباشرة وينفّذه</label>
        <label><input type="radio" name="q4" value="space"> عشان يوفّر مساحة تخزين</label>
        <label><input type="radio" name="q4" value="speed"> عشان يسرّع رفع الملفات</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ لاقي واصلح الثغرة / Find and Fix the Vulnerability</h3>
    <div class="ar">🇪🇬 في <a href="../playground/index.php">محرر الكود</a>: اكتب دالة <code>validateUpload(string $tempFilePath, string $originalName, array $allowedExtensions, array $allowedMimeTypes): array</code> بترجع <code>['ok' => bool, 'reason' => string, 'storedName' => ?string]</code>. لازم تتحقق من الامتداد <b>و</b> من <code>finfo_file()</code> على <code>$tempFilePath</code> معًا، وتولّد اسم عشوائي فقط لو الاتنين عدّوا. جرّبها بملف نصي مسمّى <code>fake.jpg</code> واتأكد إنها بترفضه.</div>
    <div class="en">🇬🇧 In the <a href="../playground/index.php">Playground</a>: write a <code>validateUpload(string $tempFilePath, string $originalName, array $allowedExtensions, array $allowedMimeTypes): array</code> function returning <code>['ok' => bool, 'reason' => string, 'storedName' => ?string]</code>. It must check the extension <b>and</b> run <code>finfo_file()</code> on <code>$tempFilePath</code> together, generating a random name only if both pass. Test it with a text file named <code>fake.jpg</code> and confirm it gets rejected.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 لحد دلوقتي شفنا خمس ثغرات مختلفة وحلولها. الدرس الأخير في مرحلة الأمان بيربط كل حاجة اتعلمناها بفكرة واحدة: إمتى بالظبط تحتاج <code>Validation</code> (رفض المدخل الغلط) وإمتى تحتاج <code>Sanitization</code> (تنظيف المدخل) — والفرق اللي كتير من المطورين بيلخبطوه.</div>
    <div class="en">🇬🇧 So far we've seen five different vulnerabilities and their fixes. The final lesson in the Security stage ties everything together with one idea: exactly when you need <code>Validation</code> (rejecting bad input) versus when you need <code>Sanitization</code> (cleaning input) — the distinction many developers confuse.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>اسم الملف والامتداد و<code>$_FILES['x']['type']</code> كلهم بيانات جاية من المستخدم — متثقش فيهم لوحدهم.</li>
        <li><code>finfo_file()</code> بيفحص المحتوى الحقيقي للملف، مش الاسم أو الادعاء.</li>
        <li>Whitelist للامتدادات المسموحة + اسم ملف عشوائي بـ <code>bin2hex(random_bytes(16))</code>.</li>
        <li>خزّن الملفات بره الـ Web Root وقدّمها عن طريق سكريبت يتحقق من الصلاحيات.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="security-passwords-sessions.php">← الدرس السابق / Prev: Password &amp; Session Security</a>
    <a href="security-validation-vs-sanitization.php">الدرس الجاي / Next: Validation vs Sanitization →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
