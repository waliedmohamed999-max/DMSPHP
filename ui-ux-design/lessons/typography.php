<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'typography';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'الطباعة والخطوط';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">المرحلة 4 / Stage 4</span>
<h1>الطباعة والخطوط <span class="ltr">Typography</span></h1>
<p class="subtitle">النص مش مجرد كلام على الشاشة — اختيار الخط وحجمه وترتيبه، وحتى المسافة بين السطور وعرض العمود، بيقرروا هل الصفحة سهلة القراءة ومفهومة الأولويات، ولا كتلة كلام مربكة.</p>

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
    <div class="ar">🇪🇬 تتعرف على أساسيات دمج الخطوط (Font Pairing)، وتفهم فكرة التسلسل الهرمي النصي (Hierarchy)، وتشوف الفرق بين صفحة كل نصها بحجم واحد وصفحة فيها تسلسل واضح، وكمان تفهم إزاي ارتفاع السطر وعرض العمود بيأثروا على الراحة أثناء القراءة الطويلة.</div>
    <div class="en">🇬🇧 Learn the basics of font pairing, understand text hierarchy, see the difference between a page with one flat font size and one with clear hierarchy, and also understand how line-height and line-length affect comfort during long reading.</div>
</div>

<h2 id="understand">دمج الخطوط / Font Pairing</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 قاعدة بسيطة وآمنة: خط للعناوين وخط تاني للنص العادي، بس متشابهين في الإحساس العام. تركيبة كلاسيكية: خط Serif (له زوايا صغيرة زي Georgia) للعناوين الكبيرة يديها طابع رسمي/أنيق، مع خط Sans-serif (بسيط زي Arial) للنص العادي عشان يبقى سهل القراءة على الشاشة. استخدام أكتر من خطين-تلاتة في نفس الصفحة بيدي إحساس عدم احترافية.</div>
    <div class="en">🇬🇧 A simple safe rule: one font for headings, another for body text, but similar in overall feel. A classic pairing: a serif font (with small strokes, like Georgia) for large headings gives a formal/elegant tone, paired with a sans-serif font (simple, like Arial) for body text so it stays easy to read on screen. Using more than two or three fonts on one page feels unprofessional.</div>
</div>

<iframe class="render-box" style="height:180px" sandbox srcdoc='<html><body style="padding:16px">
<h2 style="font-family:Georgia,serif;margin:0;font-size:26px;color:#222">Design With Purpose</h2>
<p style="font-family:Arial,sans-serif;font-size:15px;color:#555;line-height:1.6;margin-top:10px">هذا مثال على دمج خط Serif في العنوان (Georgia) مع خط Sans-serif في النص العادي (Arial) — تركيبة كلاسيكية بتدي وضوح واحترافية في نفس الوقت.</p>
</body></html>'></iframe>

<h2>التسلسل الهرمي / Type Scale &amp; Hierarchy</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 لما كل النصوص في الصفحة نفس الحجم، عين القارئ مالهاش دليل يبدأ منين. الحل هو Type Scale: العنوان الرئيسي أكبر حجم بكتير (زي 32px)، العناوين الفرعية أصغر شوية (زي 20px)، والنص العادي أصغر حاجة (زي 15-16px) — الفرق في الحجم نفسه بيوصل "ابدأ من هنا" من غير ما حد يقولها.</div>
    <div class="en">🇬🇧 When all text on a page is the same size, the reader's eye has no guide on where to start. The fix is a type scale: the main heading is much larger (e.g. 32px), subheadings a bit smaller (e.g. 20px), and body text the smallest (e.g. 15-16px) — the size difference itself communicates "start here" without anyone saying it.</div>
</div>

<h3>قبل / Before — حجم واحد لكل حاجة / One flat size for everything</h3>
<iframe class="render-box" style="height:190px" sandbox srcdoc='<html><body style="font-family:Arial,sans-serif;padding:16px;font-size:15px;color:#333;line-height:1.7">
<div>مقالات المدونة</div>
<div style="margin-top:10px">كيف تبدأ في تعلم التصميم</div>
<div style="margin-top:6px">مقال بسيط بيشرح الخطوات الأولى لأي مبتدئ في مجال تصميم الواجهات وتجربة المستخدم بشكل عملي وسهل الفهم للجميع.</div>
<div style="margin-top:10px">اقرأ المزيد</div>
</body></html>'></iframe>
<h3>بعد / After — تسلسل واضح / Clear hierarchy</h3>
<iframe class="render-box" style="height:190px" sandbox srcdoc='<html><body style="font-family:Arial,sans-serif;padding:16px;color:#333">
<div style="font-size:13px;color:#888;text-transform:uppercase;letter-spacing:1px">مقالات المدونة</div>
<div style="font-size:24px;font-weight:bold;margin-top:6px;color:#111">كيف تبدأ في تعلم التصميم</div>
<div style="margin-top:8px;font-size:15px;color:#555;line-height:1.7">مقال بسيط بيشرح الخطوات الأولى لأي مبتدئ في مجال تصميم الواجهات وتجربة المستخدم بشكل عملي وسهل الفهم للجميع.</div>
<div style="margin-top:10px;font-size:14px;color:#457b9d;font-weight:bold">اقرأ المزيد ←</div>
</body></html>'></iframe>

<h2 id="practice">💻 ارتفاع السطر وعرض العمود / Line-height &amp; Line-length</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 حتى لو الخط والحجم والتسلسل كلهم صح، فقرة طويلة ممكن تتعب القارئ لسببين شائعين جدًا. الأول: <b>ارتفاع سطر ضيق</b> (Line-height قريب من 1) بيخلي السطور ملزقة في بعض فتضيع عين القارئ وهي بتنقل من سطر للتاني. الثاني: <b>عمود نص عريض جدًا</b> — لما السطر يكون طويل أوي (100+ حرف)، عين القارئ بتتوه وهي بتدور على بداية السطر اللي بعده. القاعدة العملية: ارتفاع سطر حوالي 1.5-1.7 للنص العادي، وعرض عمود حوالي 60-75 حرف كحد أقصى.</div>
    <div class="en">🇬🇧 Even with the right font, size, and hierarchy, a long paragraph can still tire the reader for two very common reasons. First: <b>tight line-height</b> (close to 1) makes lines stick together so the eye loses track moving from one line to the next. Second: <b>an overly wide text column</b> — when a line is very long (100+ characters), the eye struggles to find the start of the next line. Practical rule: a line-height around 1.5-1.7 for body text, and a column width of roughly 60-75 characters max.</div>
</div>

<h3>قبل / Before — سطور ملزقة وعمود عريض جدًا / Tight lines, overly wide column</h3>
<iframe class="render-box" style="height:190px" sandbox srcdoc='<html><body style="font-family:Arial,sans-serif;padding:16px;color:#333">
<p style="font-size:14px;line-height:1.05;max-width:100%">قابلية الاستخدام هي مدى قدرة المستخدم على إنجاز أهدافه بسهولة وكفاءة ورضا أثناء تفاعله مع منتج رقمي، وهي ركيزة أساسية في أي عملية تصميم احترافية لأنها تحدد بشكل مباشر مدى نجاح المنتج فعليًا مع المستخدمين الحقيقيين في الحياة العملية بعيدًا عن التوقعات النظرية.</p>
</body></html>'></iframe>
<h3>بعد / After — ارتفاع سطر مريح وعمود محدود العرض / Comfortable line-height, constrained column</h3>
<iframe class="render-box" style="height:190px" sandbox srcdoc='<html><body style="font-family:Arial,sans-serif;padding:16px;color:#333">
<p style="font-size:14px;line-height:1.65;max-width:340px">قابلية الاستخدام هي مدى قدرة المستخدم على إنجاز أهدافه بسهولة وكفاءة ورضا أثناء تفاعله مع منتج رقمي. هي ركيزة أساسية في أي عملية تصميم احترافية، لأنها تحدد نجاح المنتج فعليًا مع المستخدمين الحقيقيين.</p>
</body></html>'></iframe>
<div class="bi-block">
    <div class="ar">🇪🇬 لاحظ: النسخة "بعد" مش بس زودت المسافة بين السطور، هي كمان قصّرت عرض الفقرة (max-width) عشان السطر ميبقاش طويل جدًا. الاتنين مع بعض هما اللي بيدوا الإحساس بالراحة أثناء القراءة.</div>
    <div class="en">🇬🇧 Notice: the "after" version didn't just add space between lines, it also constrained the paragraph's width (max-width) so no line gets too long. Both together are what create the feeling of reading comfort.</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="scale">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">إيه اللي بيوصل للقارئ "ابدأ من هنا" من غير كلام؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What communicates "start here" to the reader without words?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="scale"> فروق حجم واضحة بين مستويات النص (Type Scale) / Clear size differences between text levels</label>
        <label><input type="radio" name="q1" value="colorful"> استخدام أكبر عدد ممكن من الألوان في النصوص / Using as many text colors as possible</label>
        <label><input type="radio" name="q1" value="font-count"> استخدام أكبر عدد ممكن من الخطوط / Using as many fonts as possible</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="both">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">فقرة نصها متعب في القراءة رغم إن الخط والحجم صح — إيه أرجح سبب؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">A paragraph is tiring to read despite the right font and size — most likely cause?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="bold"> النص مش Bold / The text isn't bold</label>
        <label><input type="radio" name="q2" value="both"> ارتفاع سطر ضيق و/أو عمود عريض جدًا / Tight line-height and/or an overly wide column</label>
        <label><input type="radio" name="q2" value="uppercase"> النص مش كله بحروف كبيرة / The text isn't all uppercase</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="exercise-box">
    <h3>✍️ تمرين عملي / Hands-on Exercise</h3>
    <div class="ar">🇪🇬 افتح أي موقع إخباري أو مدونة، وحدد 3 مستويات نصية فيه (عنوان رئيسي، عنوان فرعي، نص عادي) واكتب تقريبًا حجم كل واحد بالبكسل. هل الفرق بينهم واضح للعين ولا كلهم قريبين من بعض؟</div>
    <div class="en">🇬🇧 Open any news site or blog, and identify 3 text levels (main heading, subheading, body text) and roughly note each one's pixel size. Is the difference between them clear to the eye, or are they all close together?</div>
</div>

<div class="challenge-box">
    <h3>🛠️ أعد تنسيق مقال طويل / Reformat a Long Article</h3>
    <div class="ar">🇪🇬 خد أي فقرة طويلة (3-4 جمل) من مقال أو حتى من هذا الدرس، واكتبها مرتين: مرة بارتفاع سطر ضيق (1.1) وعرض عمود كامل الشاشة، ومرة بارتفاع سطر مريح (1.6) وعرض عمود محدود (حوالي 60-70 حرف في السطر). قارن بعينك أي نسخة أسهل في القراءة لمدة دقيقتين متواصلتين.</div>
    <div class="en">🇬🇧 Take any long paragraph (3-4 sentences) from an article or even from this lesson, and write it twice: once with tight line-height (1.1) and a full-screen-width column, and once with comfortable line-height (1.6) and a constrained column (about 60-70 characters per line). Compare with your own eyes which version is easier to read for two continuous minutes.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 قواعد الطباعة دي (Font Pairing، Type Scale، ارتفاع السطر، عرض العمود) هتتكرر في كل مشروع هتصممه من هنا لآخر المسار — خصوصًا في درس التخطيط والمسافات الجاي، اللي هيوسّع نفس فكرة "المسافة بين العناصر" من مستوى السطر لمستوى الصفحة كلها. ولما تبني بورتفوليو، أول حاجة أي مصمم محترف هيلاحظها في شغلك هي هل التسلسل الهرمي للنص واضح ولا لأ.</div>
    <div class="en">🇬🇧 These typography rules (font pairing, type scale, line-height, line-length) will keep recurring in every project you design from here to the end of the track — especially the upcoming Layout & Spacing lesson, which expands the same "spacing between elements" idea from line level to whole-page level. And when you build a portfolio, the first thing any professional designer will notice about your work is whether the text hierarchy is clear or not.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>خط للعناوين + خط تاني للنص، مش أكتر من 2-3 خطوط في الصفحة.</li>
        <li>تركيبة Serif للعناوين + Sans-serif للنص = وضوح واحترافية.</li>
        <li>Type Scale = فروق حجم واضحة بين المستويات النصية (عنوان، فرعي، عادي).</li>
        <li>حجم واحد لكل حاجة = مفيش دليل بصري لعين القارئ من فين يبدأ.</li>
        <li>ارتفاع سطر حوالي 1.5-1.7 وعرض عمود 60-75 حرف = راحة أثناء القراءة الطويلة.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="color-theory.php">← المرحلة السابقة</a>
    <a href="layout-spacing.php">المرحلة الجاية / Next: Layout &amp; Spacing →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
