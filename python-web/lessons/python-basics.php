<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'python-basics';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'أساسيات لغة Python';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">المرحلة 2 / Stage 2</span>
<h1>أساسيات لغة Python <span class="ltr">Python Fundamentals</span></h1>
<p class="subtitle">Python من أسهل لغات البرمجة قراءة في الدنيا — بناء الجملة فيها قريب جدًا من الإنجليزي العادي. هنغطي هنا كل حاجة محتاجها قبل ما تدخل على Django أو Flask.</p>

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
    <div class="ar">🇪🇬 تكتب وتشغّل كود Python فعلي، وتتعلم المتغيرات، الأنواع، هياكل التحكم، القوائم، والدوال — الأساس اللي أي إطار عمل Python هيتبني عليه بعد كده.</div>
    <div class="en">🇬🇧 Write and run real Python code, and learn variables, types, control structures, lists, and functions — the foundation any Python framework will build on later.</div>
</div>

<h2 id="understand">1) أول برنامج / Your First Program</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <code>print()</code> بتطبع حاجة على الشاشة. أي سطر بيبدأ بـ <code>#</code> هو تعليق، الكمبيوتر بيتجاهله. لاحظ: مفيش <code>&lt;?php</code> ولا فاصلة منقوطة في آخر السطر زي PHP — Python بسيطة كده.</div>
    <div class="en">🇬🇧 <code>print()</code> outputs to the screen. Any line starting with <code>#</code> is a comment, ignored by the computer. Notice: no <code>&lt;?php</code> tag and no semicolons at line-ends like PHP — Python keeps it this simple.</div>
</div>

<pre><code># ده أول برنامج ليا
print("Hello, Python World!")</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">Hello, Python World!</div>

<h2 id="practice">2) المتغيرات والأنواع / Variables &amp; Types</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 المتغير في Python بيتعمل مباشرة من غير أي رمز قبله (زي <code>$</code> في PHP). النوع بيتحدد أوتوماتيك من القيمة، وتقدر تعرفه بدالة <code>type()</code>.</div>
    <div class="en">🇬🇧 A variable in Python is created directly with no prefix symbol (unlike PHP's <code>$</code>). The type is inferred automatically, and you can check it with <code>type()</code>.</div>
</div>

<pre><code>name = "Waleed"
age = 25
height = 1.78
is_learning = True

print(f"Name: {name}")
print(f"Age: {age}, type: {type(age).__name__}")
print(f"Height: {height}, type: {type(height).__name__}")
print(f"Learning: {is_learning}")</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">Name: Waleed
Age: 25, type: int
Height: 1.78, type: float
Learning: True</div>

<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ <code>f"..."</code> — دي "f-string"، بتخليك تحط متغيرات جوه النص مباشرة بين قوسين معقوصين <code>{}</code>، زي الـ Interpolation في PHP بالظبط.</div>
    <div class="en">🇬🇧 Notice <code>f"..."</code> — an "f-string" lets you embed variables directly inside text using curly braces <code>{}</code>, exactly like PHP's interpolation.</div>
</div>

<div class="bi-block">
    <div class="ar">🇪🇬 جرّب الكود ده بنفسك في المحرر تحت — غيّر القيم وشوف النوع بيتغيّر إزاي تلقائيًا:</div>
    <div class="en">🇬🇧 Try this code yourself in the editor below — change the values and see the type update automatically:</div>
</div>

<div class="mini-editor-wrap">
    <textarea spellcheck="false">name = "Waleed"
age = 25
height = 1.78
is_learning = True

print(f"Name: {name}")
print(f"Age: {age}, type: {type(age).__name__}")
print(f"Height: {height}, type: {type(height).__name__}")
print(f"Learning: {is_learning}")</textarea>
    <div class="mini-toolbar">
        <button class="mini-run-btn">▶ شغّل / Run</button>
        <span class="mini-status"></span>
    </div>
    <div class="output-box">— لسه متشغلش / not run yet —</div>
</div>

<h2>3) هياكل التحكم / Control Structures</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 أهم اختلاف في Python عن أي لغة تانية: مفيش أقواس <code>{}</code> لتحديد بداية ونهاية الكود جوه <code>if</code> أو الحلقات — بدل كده، Python بتستخدم <b>المسافة البادئة (Indentation)</b> نفسها كجزء من قواعد اللغة. لازم تكون دقيق جدًا فيها.</div>
    <div class="en">🇬🇧 The biggest difference from any other language: no <code>{}</code> braces mark the start/end of an <code>if</code> or loop body — instead, Python uses <b>indentation itself</b> as part of the language's syntax rules. You must be precise with it.</div>
</div>

<pre><code>age = 20

if age >= 18:
    print("Adult")
else:
    print("Minor")

for i in range(1, 6):
    print(f"Counting: {i}")</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">Adult
Counting: 1
Counting: 2
Counting: 3
Counting: 4
Counting: 5</div>

<div class="bi-block">
    <div class="ar">🇪🇬 <code>range(1, 6)</code> بيولّد أرقام من 1 لحد 5 (6 مستثناة) — نفس فكرة <code>for ($i=1; $i&lt;6; $i++)</code> في PHP بس بشكل أبسط.</div>
    <div class="en">🇬🇧 <code>range(1, 6)</code> generates numbers from 1 to 5 (6 is excluded) — the same idea as PHP's <code>for ($i=1; $i&lt;6; $i++)</code>, just simpler to write.</div>
</div>

<h2>4) القوائم / Lists</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 الـ <code>List</code> في Python هي مقابل الـ Array في PHP. <code>enumerate()</code> بتديك الترتيب مع كل عنصر. الـ <b>List Comprehension</b> (<code>[تعبير for عنصر in قائمة]</code>) طريقة مختصرة جدًا تبني بيها قايمة جديدة من قايمة موجودة، بديل عن <code>array_map</code>/<code>array_filter</code> في PHP.</div>
    <div class="en">🇬🇧 A Python <code>List</code> is the equivalent of a PHP Array. <code>enumerate()</code> gives you the index alongside each element. A <b>List Comprehension</b> (<code>[expression for item in list]</code>) is a very concise way to build a new list from an existing one — Python's answer to PHP's <code>array_map</code>/<code>array_filter</code>.</div>
</div>

<pre><code>fruits = ["apple", "banana", "mango"]
for i, fruit in enumerate(fruits, start=1):
    print(f"{i}) {fruit}")

prices = [10, 25, 40, 55]
with_tax = [round(p * 1.14, 2) for p in prices]
expensive = [p for p in prices if p > 20]

print("With tax:", with_tax)
print("Expensive (>20):", expensive)
print("Count:", len(prices))</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">1) apple
2) banana
3) mango
With tax: [11.4, 28.5, 45.6, 62.7]
Expensive (>20): [25, 40, 55]
Count: 4</div>

<div class="bi-block">
    <div class="ar">🇪🇬 جرّب List Comprehension بنفسك — غيّر قايمة <code>prices</code> أو شرط الفلترة (<code>p > 20</code>) وشوف الناتج بيتغيّر:</div>
    <div class="en">🇬🇧 Try List Comprehension yourself — change the <code>prices</code> list or the filter condition (<code>p > 20</code>) and watch the output change:</div>
</div>

<div class="mini-editor-wrap">
    <textarea spellcheck="false">fruits = ["apple", "banana", "mango"]
for i, fruit in enumerate(fruits, start=1):
    print(f"{i}) {fruit}")

prices = [10, 25, 40, 55]
with_tax = [round(p * 1.14, 2) for p in prices]
expensive = [p for p in prices if p > 20]

print("With tax:", with_tax)
print("Expensive (>20):", expensive)
print("Count:", len(prices))</textarea>
    <div class="mini-toolbar">
        <button class="mini-run-btn">▶ شغّل / Run</button>
        <span class="mini-status"></span>
    </div>
    <div class="output-box">— لسه متشغلش / not run yet —</div>
</div>

<h2>5) الدوال / Functions</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <code>def</code> بتعرّف دالة. تقدر تحدد نوع كل Parameter ونوع الـ Return (Type Hints) بالظبط زي PHP الحديثة. الـ <code>lambda</code> هي مقابل الـ Arrow Function (<code>fn</code>) في PHP — دالة قصيرة من غير اسم.</div>
    <div class="en">🇬🇧 <code>def</code> defines a function. You can type-hint each Parameter and the Return type just like modern PHP. <code>lambda</code> is Python's equivalent of PHP's Arrow Function (<code>fn</code>) — a short, unnamed function.</div>
</div>

<pre><code>def greet(name: str, greeting: str = "Hello") -> str:
    return f"{greeting}, {name}!"

print(greet("Waleed"))
print(greet("Sara", "Welcome"))

square = lambda n: n * n
print("Square of 5:", square(5))</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">Hello, Waleed!
Welcome, Sara!
Square of 5: 25</div>

<h2>6) القواميس (Dictionaries) — مسألة محلولة / A Solved Problem</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 الـ <code>Dictionary</code> في Python هي مقابل الـ Associative Array في PHP (<code>['key' => 'value']</code>) — بتخزن قيم مربوطة بمفاتيح (Keys) بدل ترتيب رقمي زي الـ List. دلوقتي هنحل مسألة حقيقية بيها: <b>احسب عدد تكرار كل كلمة في جملة</b> — مسألة كلاسيكية بتظهر كتير في تمارين البرمجة ومقابلات الشغل.</div>
    <div class="en">🇬🇧 A <code>Dictionary</code> in Python is the equivalent of PHP's associative array (<code>['key' => 'value']</code>) — it stores values tied to keys instead of numeric order like a List. Let's solve a real problem with it: <b>count how many times each word appears in a sentence</b> — a classic exercise that shows up often in coding practice and job interviews.</div>
</div>

<div class="bi-block">
    <div class="ar">🇪🇬 الفكرة: نقسّم الجملة لكلمات بـ <code>.split()</code>، وبعدين لكل كلمة نستخدم <code>dict.get(key, default)</code> — بترجع قيمة المفتاح لو موجود، أو قيمة افتراضية (هنا <code>0</code>) لو لسه مش موجود، فنقدر نزوّد العداد من غير ما نتحقق يدويًا "هل المفتاح ده موجود ولا لأ".</div>
    <div class="en">🇬🇧 The idea: split the sentence into words with <code>.split()</code>, then for each word use <code>dict.get(key, default)</code> — it returns the key's value if it exists, or a default (here <code>0</code>) if it doesn't yet, so we can increment the counter without manually checking "does this key exist."</div>
</div>

<pre><code>def word_frequency(sentence: str) -&gt; dict:
    words = sentence.lower().split()
    counts = {}
    for word in words:
        counts[word] = counts.get(word, 0) + 1
    return counts

sentence = "the cat sat on the mat the cat ran"
result = word_frequency(sentence)
print(result)

for word, count in result.items():
    print(f"{word}: {count}")

most_common = max(result, key=result.get)
print(f"Most common word: '{most_common}' ({result[most_common]} times)")</code></pre>
<h3>الناتج الفعلي / Actual output</h3>
<div class="output-box">{'the': 3, 'cat': 2, 'sat': 1, 'on': 1, 'mat': 1, 'ran': 1}
the: 3
cat: 2
sat: 1
on: 1
mat: 1
ran: 1
Most common word: 'the' (3 times)</div>

<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ <code>max(result, key=result.get)</code> — طريقة قصيرة جدًا تلاقي بيها المفتاح اللي قيمته أكبر واحدة في الـ Dictionary، من غير ما تعمل loop يدوي تقارن فيه بنفسك.</div>
    <div class="en">🇬🇧 Notice <code>max(result, key=result.get)</code> — a very concise way to find the key with the highest value in a Dictionary, without writing a manual comparison loop yourself.</div>
</div>

<div class="mini-editor-wrap">
    <textarea spellcheck="false">def word_frequency(sentence: str) -> dict:
    words = sentence.lower().split()
    counts = {}
    for word in words:
        counts[word] = counts.get(word, 0) + 1
    return counts

sentence = "the cat sat on the mat the cat ran"
result = word_frequency(sentence)
print(result)

for word, count in result.items():
    print(f"{word}: {count}")

most_common = max(result, key=result.get)
print(f"Most common word: '{most_common}' ({result[most_common]} times)")</textarea>
    <div class="mini-toolbar">
        <button class="mini-run-btn">▶ شغّل / Run</button>
        <span class="mini-status"></span>
    </div>
    <div class="output-box">— لسه متشغلش / not run yet —</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="indent">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">إيه اللي بيحدد بداية ونهاية جسم الـ <code>if</code> أو الحلقة في Python؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What marks the start/end of an <code>if</code> or loop body in Python?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="braces"> الأقواس <code>{}</code></label>
        <label><input type="radio" name="q1" value="indent"> المسافة البادئة (Indentation)</label>
        <label><input type="radio" name="q1" value="semicolon"> الفاصلة المنقوطة <code>;</code></label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="comprehension">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">إيه اسم <code>[p * 2 for p in prices]</code> في Python؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What is <code>[p * 2 for p in prices]</code> called in Python?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="lambda"> Lambda Function</label>
        <label><input type="radio" name="q2" value="comprehension"> List Comprehension</label>
        <label><input type="radio" name="q2" value="dict"> Dictionary</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="get">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">في <code>counts.get(word, 0)</code>، إيه اللي بيرجع لو <code>word</code> مش موجود في الـ Dictionary لسه؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">In <code>counts.get(word, 0)</code>, what's returned if <code>word</code> isn't in the Dictionary yet?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="error"> بيرمي خطأ (Error) على طول</label>
        <label><input type="radio" name="q3" value="get"> القيمة الافتراضية اللي حطيتها، وهي <code>0</code> هنا</label>
        <label><input type="radio" name="q3" value="none"> بيرجع <code>None</code> دايمًا مهما كانت القيمة الافتراضية</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="assoc">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">عايز تخزن بيانات طالب: اسمه ودرجته ومادته، وتوصل لكل قيمة باسمها مش برقم ترتيبها. إيه الأنسب؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">You want to store a student's name, grade, and subject, accessing each by name not position. What's the right structure?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="list"> List عادية <code>["Ahmed", 90, "Math"]</code></label>
        <label><input type="radio" name="q4" value="assoc"> Dictionary <code>{"name": "Ahmed", "grade": 90, "subject": "Math"}</code></label>
        <label><input type="radio" name="q4" value="lambda"> Lambda function</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ دالة فرز طلاب / A Student-Sorting Function</h3>
    <div class="ar">🇪🇬 في المحرر المصغّر فوق (أو <a href="../playground/index.php">الـ Playground</a>)، اكتب دالة <code>passing_students(scores: list) -> list</code> تاخد قايمة درجات وترجع List Comprehension فيها بس الدرجات اللي <code>&gt;= 50</code>. بعد كده استخدم <code>len()</code> عشان تطبع عدد الطلاب الناجحين من إجمالي عدد الطلاب.</div>
    <div class="en">🇬🇧 In the mini editor above (or the <a href="../playground/index.php">Playground</a>), write a function <code>passing_students(scores: list) -> list</code> that takes a list of scores and returns a List Comprehension of only scores <code>&gt;= 50</code>. Then use <code>len()</code> to print the number of passing students out of the total.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 كل حاجة اتعلمتها هنا — المتغيرات، الـ Lists، والدوال — هي بالظبط اللي هتشوفها جوه <code>models.py</code> و<code>views.py</code> في Django، وجوه دوال الـ Routes في Flask بعد كده. الفرق إن Django وFlask بيغلّفوا نفس المفاهيم دي في بنية جاهزة للويب.</div>
    <div class="en">🇬🇧 Everything you learned here — variables, Lists, and functions — is exactly what you'll see inside Django's <code>models.py</code> and <code>views.py</code>, and inside Flask's route functions next. Django and Flask just wrap these same concepts in a ready-made web structure.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>مفيش رمز قبل اسم المتغير، والنوع بيتحدد أوتوماتيك — تفحصه بـ <code>type()</code>.</li>
        <li>الـ Indentation (المسافة البادئة) جزء من قواعد اللغة نفسها، مش تنسيق اختياري.</li>
        <li>Lists = مقابل Arrays، وList Comprehension بديل مختصر لـ <code>array_map</code>/<code>array_filter</code>.</li>
        <li>الدوال (<code>def</code>) بتدعم Type Hints، و<code>lambda</code> = دالة قصيرة من غير اسم.</li>
        <li>Dictionary = مفاتيح وقيم (زي Associative Array في PHP)، و<code>.get(key, default)</code> بيتجنب أخطاء "المفتاح مش موجود".</li>
        <li>الأساس ده هو نفسه اللي Django وFlask هيتبنوا عليه في المراحل الجاية.</li>
    </ul>
</div>

<div class="exercise-box">
    <h3>✍️ تمرين عملي / Hands-on Exercise</h3>
    <div class="ar">🇪🇬 افتح <a href="../playground/index.php">محرر الكود</a> واكتب دالة <code>is_even(number: int) -> bool</code> ترجع <code>True</code> لو الرقم زوجي (استخدم <code>%</code>). بعد كده اعمل List Comprehension تجيب كل الأرقام الزوجية من قايمة <code>[1, 2, 3, 4, 5, 6, 7, 8]</code>.</div>
    <div class="en">🇬🇧 In the <a href="../playground/index.php">Playground</a>, write a function <code>is_even(number: int) -> bool</code> returning <code>True</code> for even numbers (use <code>%</code>). Then write a List Comprehension to get all even numbers from <code>[1, 2, 3, 4, 5, 6, 7, 8]</code>.</div>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="setup.php">← المرحلة السابقة</a>
    <a href="django.php">المرحلة الجاية / Next: The Django Framework →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
