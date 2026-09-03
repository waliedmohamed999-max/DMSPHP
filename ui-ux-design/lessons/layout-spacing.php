<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'layout-spacing';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'التخطيط والمسافات';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">المرحلة 5 / Stage 5</span>
<h1>التخطيط والمسافات <span class="ltr">Layout &amp; Spacing</span></h1>
<p class="subtitle">الفراغ في التصميم مش "مساحة ضايعة" — هو أداة تصميمية بنفس أهمية اللون والخط، وأنظمة الشبكة (Grid) هي اللي بتخلي أي تخطيط يحس إنه منظم بدل ما يكون عشوائي.</p>

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
    <div class="ar">🇪🇬 تفهم ليه الفراغ الأبيض (Whitespace) مهم وتشوف تأثيره بعينك، تتعرف على فكرة نظام الأعمدة (Grid) وإزاي بيرتب المحتوى بشكل منطقي، وتتعلم قاعدة عملية اسمها "شبكة الثمانية بكسل" بتخلي كل قرارات المسافات في التصميم متسقة من غير تخمين.</div>
    <div class="en">🇬🇧 Understand why whitespace matters and see its effect with your own eyes, learn about column grid systems and how they organize content logically, and learn a practical rule called the "8-point grid" that makes every spacing decision in a design consistent instead of guessed.</div>
</div>

<h2 id="understand">الفراغ الأبيض / Whitespace</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 كتير من المبتدئين بيحسوا إن الفراغ لازم يتملي بحاجة، فبيحشروا كل العناصر جنب بعض. لكن الفراغ بيدي العين "مساحة تتنفس فيها" وبيخلي كل عنصر ياخد أهميته لوحده. تصميم فيه مسافات كافية بيحس أفخم وأسهل في القراءة، حتى لو المحتوى نفسه ما اتغيرش.</div>
    <div class="en">🇬🇧 Many beginners feel whitespace must be filled with something, so they cram every element together. But whitespace gives the eye "room to breathe" and lets each element carry its own weight. A design with enough spacing feels more premium and easier to read, even if the content itself has not changed.</div>
</div>

<h3>قبل / Before — تصميم مزدحم / Cramped layout</h3>
<iframe class="render-box" style="height:170px" sandbox srcdoc='<html><body style="font-family:Tahoma,sans-serif;padding:4px;font-size:14px;line-height:1.2">
<div style="border:1px solid #ccc;padding:4px">
<b>لوحة التحكم</b><span style="margin-inline-start:6px">آخر تحديث: اليوم</span>
<div>عدد الطلبات: 128<span style="margin-inline-start:6px">المبيعات: 4500 ج.م</span><span style="margin-inline-start:6px">العملاء الجدد: 12</span></div>
<button style="margin-top:2px">عرض التفاصيل</button><button style="margin-inline-start:4px">تصدير التقرير</button>
</div>
</body></html>'></iframe>
<h3>بعد / After — مساحة تتنفس فيها / Breathing room</h3>
<iframe class="render-box" style="height:230px" sandbox srcdoc='<html><body style="font-family:Tahoma,sans-serif;padding:24px;font-size:14px;color:#333">
<div style="border:1px solid #e5e5e5;border-radius:10px;padding:22px">
<div style="font-weight:bold;font-size:17px">لوحة التحكم</div>
<div style="color:#888;font-size:13px;margin-top:4px">آخر تحديث: اليوم</div>
<div style="display:flex;gap:28px;margin-top:18px">
<div>عدد الطلبات<div style="font-weight:bold;font-size:16px;margin-top:4px">128</div></div>
<div>المبيعات<div style="font-weight:bold;font-size:16px;margin-top:4px">4500 ج.م</div></div>
<div>العملاء الجدد<div style="font-weight:bold;font-size:16px;margin-top:4px">12</div></div>
</div>
<div style="margin-top:20px;display:flex;gap:10px">
<button style="padding:8px 16px;border-radius:6px;border:1px solid #ccc;background:white">عرض التفاصيل</button>
<button style="padding:8px 16px;border-radius:6px;border:none;background:#457b9d;color:white">تصدير التقرير</button>
</div>
</div>
</body></html>'></iframe>

<h2>أنظمة الشبكة / Grid Systems</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 نظام الشبكة بيقسم الصفحة لأعمدة وهمية (شائع: 12 عمود) عشان كل العناصر تتحاذى مع بعض بشكل منطقي بدل ما توضع بمقاسات عشوائية. عمليًا في CSS بتقدر تعمل ده بسهولة باستخدام Grid أو Flexbox.</div>
    <div class="en">🇬🇧 A grid system divides the page into invisible columns (commonly 12) so all elements align logically instead of being placed at random sizes. In practice, CSS makes this easy with Grid or Flexbox.</div>
</div>

<iframe class="render-box" style="height:210px" sandbox srcdoc='<html><body style="font-family:Tahoma,sans-serif;padding:16px">
<div style="display:grid;grid-template-columns:repeat(3,1fr);gap:14px">
<div style="background:#f1faee;border:1px solid #cde;border-radius:8px;padding:14px;text-align:center">
<div style="font-size:20px">📦</div>
<div style="margin-top:6px;font-weight:bold">منتج 1</div>
<div style="color:#888;font-size:13px">120 ج.م</div>
</div>
<div style="background:#f1faee;border:1px solid #cde;border-radius:8px;padding:14px;text-align:center">
<div style="font-size:20px">👟</div>
<div style="margin-top:6px;font-weight:bold">منتج 2</div>
<div style="color:#888;font-size:13px">250 ج.م</div>
</div>
<div style="background:#f1faee;border:1px solid #cde;border-radius:8px;padding:14px;text-align:center">
<div style="font-size:20px">🎒</div>
<div style="margin-top:6px;font-weight:bold">منتج 3</div>
<div style="color:#888;font-size:13px">180 ج.م</div>
</div>
</div>
<div style="margin-top:10px;color:#888;font-size:12px">grid-template-columns: repeat(3, 1fr)</div>
</body></html>'></iframe>

<h2 id="practice">💻 شبكة الثمانية بكسل / The 8-point Grid</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 مشكلة شائعة جدًا عند المبتدئين: كل مسافة (Padding, Margin, Gap) بتتحدد بالعين وبالتخمين — مرة 13px، مرة 22px، مرة 7px. النتيجة إحساس عدم اتساق حتى لو مفيش حد يقدر يحدد بالظبط ليه. الحل هو <b>مقياس مسافات ثابت (Spacing Scale)</b>: تختار وحدة أساسية زي 8px، وكل مسافة في التصميم لازم تكون من مضاعفاتها فقط (8، 16، 24، 32، 40...). ده بيخلي كل العناصر "تحس متناسقة" مع بعض تلقائيًا، وبيسهّل شغل المطور اللي هيحوّل التصميم لكود لأنه مش محتاج يخمّن أرقام عشوائية.</div>
    <div class="en">🇬🇧 A very common beginner problem: every spacing value (padding, margin, gap) is decided by eye and guesswork — 13px here, 22px there, 7px somewhere else. The result feels inconsistent even if no one can pinpoint exactly why. The fix is a <b>fixed spacing scale</b>: pick a base unit like 8px, and every spacing value in the design must be a multiple of it only (8, 16, 24, 32, 40...). This makes all elements "feel consistent" with each other automatically, and makes a developer's job easier when turning the design into code, since they never have to guess random numbers.</div>
</div>

<h3>قبل / Before — مسافات عشوائية / Random spacing values</h3>
<iframe class="render-box" style="height:190px" sandbox srcdoc='<html><body style="font-family:Tahoma,sans-serif;padding:11px">
<div style="border:1px solid #e0e0e0;border-radius:6px;padding:7px">
<div style="font-weight:bold;font-size:15px">بطاقة المستخدم</div>
<div style="margin-top:19px;color:#555;font-size:13px">وليد محمد</div>
<div style="margin-top:3px;color:#888;font-size:12px">مصمم واجهات</div>
<button style="margin-top:13px;padding:6px 17px;border-radius:5px;border:1px solid #999;background:#eee">عرض الملف</button>
</div>
</body></html>'></iframe>
<h3>بعد / After — كل مسافة من مضاعفات 8px / Every value a multiple of 8px</h3>
<iframe class="render-box" style="height:190px" sandbox srcdoc='<html><body style="font-family:Tahoma,sans-serif;padding:16px">
<div style="border:1px solid #e0e0e0;border-radius:8px;padding:16px">
<div style="font-weight:bold;font-size:16px">بطاقة المستخدم</div>
<div style="margin-top:16px;color:#555;font-size:14px">وليد محمد</div>
<div style="margin-top:8px;color:#888;font-size:12px">مصمم واجهات</div>
<button style="margin-top:16px;padding:8px 24px;border-radius:8px;border:1px solid #999;background:#eee">عرض الملف</button>
</div>
</body></html>'></iframe>
<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ: النسخة "بعد" مش بس بتستخدم مسافات أكبر — هي بتستخدم مسافات <b>من نفس العائلة</b> (8، 16، 24) بدل أرقام مبعثرة (7، 19، 3، 13، 17). ده الفرق الحقيقي بين "تصميم منظم" و"تصميم فيه مسافات كتير بس عشوائية".</div>
    <div class="en">🇬🇧 Notice: the "after" version doesn't just use bigger spacing — it uses spacing <b>from the same family</b> (8, 16, 24) instead of scattered numbers (7, 19, 3, 13, 17). That's the real difference between "an organized design" and "a design with lots of spacing that's still random."</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="breathe">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">إيه الفايدة الأساسية من الفراغ الأبيض (Whitespace)؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What's the main benefit of whitespace?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="waste"> مساحة ضايعة لازم تتقلل قد ما تقدر / Wasted space to minimize as much as possible</label>
        <label><input type="radio" name="q1" value="breathe"> بتدي العين مساحة تتنفس وتوضّح أهمية كل عنصر / Gives the eye room to breathe and clarifies each element's importance</label>
        <label><input type="radio" name="q1" value="decoration"> مجرد زينة بصرية من غير فايدة وظيفية / Just visual decoration with no functional benefit</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="multiple">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">في نظام شبكة الثمانية بكسل، أي قيمة مسافة صح؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">In an 8-point grid system, which spacing value is correct?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="random"> 13px لأنها قريبة من 8 و16 / 13px because it's close to 8 and 16</label>
        <label><input type="radio" name="q2" value="multiple"> 24px لأنها من مضاعفات 8 / 24px because it's a multiple of 8</label>
        <label><input type="radio" name="q2" value="odd"> 7px عشان تختلف عن باقي العناصر / 7px to make it different from other elements</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="exercise-box">
    <h3>✍️ تمرين عملي / Hands-on Exercise</h3>
    <div class="ar">🇪🇬 افتح موقع تسوق إلكتروني، وحاول تحدد عدد أعمدة الشبكة اللي بتترتب بيها المنتجات (2، 3، 4 أعمدة؟). لاحظ إزاي المسافة بين المنتجات ثابتة في كل مكان — ده مش صدفة، ده نظام شبكة متبع بدقة.</div>
    <div class="en">🇬🇧 Open an e-commerce site, and try to identify the number of grid columns its products are arranged in (2, 3, 4 columns?). Notice how the spacing between products is consistent everywhere — that is not an accident, it is a grid system followed precisely.</div>
</div>

<div class="challenge-box">
    <h3>🛠️ رتّب مسافات كارت إشعار / Fix a Notification Card's Spacing</h3>
    <div class="ar">🇪🇬 تخيل كارت إشعار فيه: أيقونة، عنوان، نص وصفي، وزرار "تجاهل" — كل المسافات بينهم متفاوتة وعشوائية (زي 5px، 18px، 9px، 27px). أعد كتابة نفس الكارت باستخدام مقياس مسافات مبني على وحدة 8px بس (8، 16، 24، 32). اكتب جنب كل مسافة قديمة، القيمة الجديدة اللي هتستبدلها بيها ولماذا اخترتها.</div>
    <div class="en">🇬🇧 Imagine a notification card with: an icon, a title, a description, and a "Dismiss" button — all spacing between them is inconsistent and random (like 5px, 18px, 9px, 27px). Rewrite the same card using a spacing scale based only on an 8px unit (8, 16, 24, 32). Next to each old spacing value, write the new value you'd replace it with and why you chose it.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 مقياس المسافات الثابت (8-point grid) هيكون أساس أي Wireframe هتبنيه في الدرس الجاي — لما تحط مربعات وخطوط تقريبية، هتلاقي نفسك بتفكر بنفس الوحدات (8، 16، 24) بدل أرقام عشوائية من غير ما تحس. وأي بورتفوليو محترف بيتقيّم جزئيًا على إذا كانت مسافاته متسقة عبر كل الشاشات ولا لأ.</div>
    <div class="en">🇬🇧 The fixed spacing scale (8-point grid) will be the foundation of any wireframe you build in the next lesson — when placing rough boxes and lines, you'll find yourself thinking in the same units (8, 16, 24) instead of random numbers without even noticing. And any professional portfolio is judged partly on whether its spacing stays consistent across every screen or not.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>الفراغ الأبيض مش مساحة ضايعة — هو أداة توضيح وراحة بصرية.</li>
        <li>تصميم مزدحم يتعب العين، تصميم بمسافات كافية يحس أفخم وأسهل.</li>
        <li>نظام الشبكة (Grid) بيحاذي العناصر بشكل منطقي بدل العشوائية.</li>
        <li>CSS Grid و Flexbox أدوات عملية لتطبيق أنظمة الشبكة مباشرة.</li>
        <li>مقياس مسافات ثابت (8px وأمثالها) = اتساق تلقائي بدل تخمين كل مسافة.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="typography.php">← المرحلة السابقة</a>
    <a href="wireframing.php">المرحلة الجاية / Next: Wireframing →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
