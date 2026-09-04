<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'json-encode-decode';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'الملفات، JSON، والـ APIs — JSON Encode و Decode';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">Stage 6 · Files, JSON & APIs</span>
<h1>JSON Encode و Decode <span class="ltr">JSON Encode &amp; Decode</span></h1>
<p class="subtitle">json_encode/json_decode، والفرق بين array وobject لما تفكّ JSON. <span class="ltr">json_encode/json_decode, and the array-vs-object difference when decoding JSON.</span></p>

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
    <div class="ar">🇪🇬 JSON (JavaScript Object Notation) هو التنسيق القياسي اللي بيتبادل بيه السيرفرات والـ APIs البيانات مع بعض. هتتعلم تحوّل مصفوفة PHP لنص JSON بـ <code>json_encode</code>، ترجعها مصفوفة PHP تاني بـ <code>json_decode</code>، وتفهم الفرق بين استقبالها كـ <code>array</code> عادية أو ككائن <code>stdClass</code>.</div>
    <div class="en">🇬🇧 JSON (JavaScript Object Notation) is the standard format servers and APIs exchange data in. You'll learn to turn a PHP array into a JSON string with <code>json_encode</code>, turn it back into a PHP array with <code>json_decode</code>, and understand the difference between receiving it as a plain <code>array</code> or as a <code>stdClass</code> object.</div>
</div>

<h2 id="understand">🧠 1) json_encode: من PHP لـ JSON / json_encode: From PHP to JSON</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <code>json_encode($array)</code> بتاخد مصفوفة (أو أي قيمة PHP) وترجع نص JSON مكافئ ليها. مصفوفة Associative (مفاتيح نصية) بتتحول لـ JSON Object (بين <code>{}</code>)، ومصفوفة Indexed (مفاتيح رقمية متتالية من 0) بتتحول لـ JSON Array (بين <code>[]</code>).</div>
    <div class="en">🇬🇧 <code>json_encode($array)</code> takes an array (or any PHP value) and returns an equivalent JSON string. An associative array (string keys) turns into a JSON object (<code>{}</code>), and an indexed array (sequential numeric keys from 0) turns into a JSON array (<code>[]</code>).</div>
</div>

<pre><code>&lt;?php
$user = ['name' => 'Sara', 'age' => 28, 'active' => true];
$json = json_encode($user);
echo "json_encode result:" . PHP_EOL;
echo $json . PHP_EOL;</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">json_encode result:
{"name":"Sara","age":28,"active":true}</div>

<h2 id="practice">💻 2) json_decode: array مقابل object / json_decode: array vs object</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <code>json_decode($json, true)</code> بالـ <code>true</code> الثانية بترجع مصفوفة PHP عادية (Associative Array) — تقدر توصل لعناصرها بـ <code>$data['name']</code>. من غير الـ <code>true</code>، <code>json_decode($json)</code> بترجع كائن من نوع <code>stdClass</code> — تقدر توصل لعناصره بـ <code>$data->name</code> (بسهم بدل أقواس). الاتنين نفس البيانات، بس شكل الوصول ليها مختلف.</div>
    <div class="en">🇬🇧 <code>json_decode($json, true)</code> with that second <code>true</code> returns a plain PHP associative array — access its elements with <code>$data['name']</code>. Without the <code>true</code>, <code>json_decode($json)</code> returns a <code>stdClass</code> object — access its properties with <code>$data->name</code> (arrow instead of brackets). Same data, different access style.</div>
</div>

<pre><code>&lt;?php
$asArray = json_decode($json, true);
echo "json_decode(\$json, true) -> array:" . PHP_EOL;
var_dump($asArray);
echo "Access as array: " . $asArray['name'] . PHP_EOL;

$asObject = json_decode($json);
echo "json_decode(\$json) -> stdClass object:" . PHP_EOL;
var_dump($asObject);
echo "Access as object: " . $asObject->name . PHP_EOL;</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">json_decode($json, true) -> array:
array(3) {
  ["name"]=>
  string(4) "Sara"
  ["age"]=>
  int(28)
  ["active"]=>
  bool(true)
}
Access as array: Sara
json_decode($json) -> stdClass object:
object(stdClass)#1 (3) {
  ["name"]=>
  string(4) "Sara"
  ["age"]=>
  int(28)
  ["active"]=>
  bool(true)
}
Access as object: Sara</div>

<div class="bi-block">
    <div class="ar">🇪🇬 معظم الكود بيفضّل <code>json_decode($json, true)</code> (Array) لإنها أسهل في التعامل معاها مع دوال زي <code>array_map</code> أو <code>foreach</code> العادي — لكن لو شغال بمكتبة أو API بترجّع <code>stdClass</code> افتراضيًا، الوصول بالسهم <code>-&gt;</code> عادي تمامًا وشغال بنفس الطريقة.</div>
    <div class="en">🇬🇧 Most code prefers <code>json_decode($json, true)</code> (array) because it's easier to work with using functions like <code>array_map</code> or a plain <code>foreach</code> — but if you're working with a library or API that returns <code>stdClass</code> by default, arrow access <code>-&gt;</code> works perfectly fine the same way.</div>
</div>

<h2>3) مثال متداخل: مستخدم بمصفوفة Tags / Nested Example: a User with a Tags Array</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 JSON بيدعم التداخل (Nesting) — Object جوه Object، أو Array جوه Object. المثال ده بيعرض مستخدم عنده مصفوفة "tags"، ويستخدم <code>JSON_PRETTY_PRINT</code> عشان يطبع JSON بشكل منسّق سهل القراءة (مفيد للتصحيح، مش مطلوب في استجابة API حقيقية).</div>
    <div class="en">🇬🇧 JSON supports nesting — an object inside an object, or an array inside an object. This example shows a user with a "tags" array, and uses <code>JSON_PRETTY_PRINT</code> to print nicely formatted, readable JSON (useful for debugging, not required in a real API response).</div>
</div>

<pre><code>&lt;?php
$userWithTags = [
    'name' => 'Omar',
    'age' => 31,
    'tags' => ['php', 'mysql', 'apis'],
];
$nestedJson = json_encode($userWithTags, JSON_PRETTY_PRINT);
echo "Nested example, json_encode with JSON_PRETTY_PRINT:" . PHP_EOL;
echo $nestedJson . PHP_EOL;

$decodedNested = json_decode($nestedJson, true);
echo "First tag after decode: " . $decodedNested['tags'][0] . PHP_EOL;
echo "Tag count: " . count($decodedNested['tags']) . PHP_EOL;</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">Nested example, json_encode with JSON_PRETTY_PRINT:
{
    "name": "Omar",
    "age": 31,
    "tags": [
        "php",
        "mysql",
        "apis"
    ]
}
First tag after decode: php
Tag count: 3</div>

<div class="mini-editor-wrap">
    <textarea spellcheck="false">&lt;?php
$product = [
    'title' => 'Keyboard',
    'price' => 25.5,
    'in_stock' => true,
    'sizes' => ['S', 'M', 'L'],
];

$json = json_encode($product, JSON_PRETTY_PRINT);
echo $json . PHP_EOL;

$decoded = json_decode($json, true);
echo "Price: " . $decoded['price'] . PHP_EOL;
echo "First size: " . $decoded['sizes'][0] . PHP_EOL;</textarea>
    <div class="mini-toolbar">
        <button class="mini-run-btn">▶ شغّل / Run</button>
        <span class="mini-status"></span>
    </div>
    <div class="output-box">— لسه متشغلش / not run yet —</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="string">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question"><code>json_encode(['a' => 1])</code> بترجع إيه؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What does <code>json_encode(['a' => 1])</code> return?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="array"> مصفوفة PHP</label>
        <label><input type="radio" name="q1" value="string"> نص (string) هو {"a":1}</label>
        <label><input type="radio" name="q1" value="object"> كائن stdClass</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="brackets">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">لو استخدمت <code>json_decode($json, true)</code>، إزاي توصل لعنصر اسمه <code>name</code>؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">With <code>json_decode($json, true)</code>, how do you access an element named <code>name</code>?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="brackets"> $data['name']</label>
        <label><input type="radio" name="q2" value="arrow"> $data->name</label>
        <label><input type="radio" name="q2" value="get"> $data.get('name')</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="stdclass">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question"><code>json_decode($json)</code> من غير الـ <code>true</code> بترجع نوع إيه؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What type does <code>json_decode($json)</code> return without the <code>true</code>?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="array"> array</label>
        <label><input type="radio" name="q3" value="stdclass"> stdClass object</label>
        <label><input type="radio" name="q3" value="string"> string</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="php">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">حسب المثال المتداخل المنفّذ فوق، إيه أول عنصر في <code>tags</code> بعد الـ decode؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Based on the nested example executed above, what's the first element in <code>tags</code> after decoding?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="mysql"> mysql</label>
        <label><input type="radio" name="q4" value="php"> php</label>
        <label><input type="radio" name="q4" value="apis"> apis</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ تحويل مصفوفة منتجات / Converting an Array of Products</h3>
    <div class="ar">🇪🇬 في <a href="../playground/index.php">محرر الكود</a> (أو المحرر المصغّر فوق): اعمل مصفوفة من 3 منتجات (كل واحد اسم وسعر وقائمة tags)، حوّلها لـ JSON بـ <code>JSON_PRETTY_PRINT</code>، وبعدين فكّها تاني بـ <code>json_decode($json, true)</code> واطبع اسم كل منتج مع أول tag ليه باستخدام <code>foreach</code>.</div>
    <div class="en">🇬🇧 In the <a href="../playground/index.php">Playground</a> (or the mini editor above): build an array of 3 products (each with a name, price, and tags list), convert it to JSON with <code>JSON_PRETTY_PRINT</code>, then decode it back with <code>json_decode($json, true)</code> and print each product's name with its first tag using a <code>foreach</code>.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 JSON مش بس لتخزين بيانات محلي — هو اللغة اللي بتتكلم بيها APIs خارجية على الإنترنت. الدرس الجاي هيوريك إزاي تطلب بيانات من API حقيقي خارج السيرفر بتاعك، وتفكّ الـ JSON اللي بيرجعه بنفس <code>json_decode</code> اللي اتعلمناه هنا.</div>
    <div class="en">🇬🇧 JSON isn't just for local data storage — it's the language external APIs on the internet speak. The next lesson shows you how to request data from a real external API outside your own server, and decode the JSON it returns using the same <code>json_decode</code> you learned here.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li><code>json_encode()</code> بتحوّل مصفوفة/قيمة PHP لنص JSON — Associative تبقى Object، Indexed تبقى Array.</li>
        <li><code>json_decode($json, true)</code> بترجع مصفوفة PHP، و<code>json_decode($json)</code> بترجع كائن stdClass.</li>
        <li>الوصول للبيانات: <code>['key']</code> للمصفوفة، <code>-&gt;key</code> للكائن.</li>
        <li><code>JSON_PRETTY_PRINT</code> مفيدة للقراءة والتصحيح، والتداخل (arrays جوه objects) مدعوم بالكامل.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="file-handling-uploads.php">← الدرس السابق / Prev: File Handling &amp; Uploads</a>
    <a href="consuming-external-apis.php">الدرس الجاي / Next: Consuming External APIs →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
