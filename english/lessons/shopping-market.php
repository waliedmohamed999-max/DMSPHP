<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'shopping-market';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'التسوق والأسعار';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">A2 · Elementary</span>
<h1>التسوق والأسعار <span class="ltr">Shopping &amp; Prices</span></h1>
<p class="subtitle">تسأل عن السعر، المقاس، واللون، وتتفاهم مع البائع في أي محل — محاكي محادثة حقيقي جواك محل ملابس، بترجمة عربية لكل سطر.</p>

<div class="step-tracker">
    <a href="#read">📖 Read</a>
    <a href="#understand">🧠 Understand</a>
    <a href="#practice">💬 Practice</a>
    <a href="#quiz">🧠 Quiz</a>
    <a href="#challenge">🛠️ Challenge</a>
    <a href="#project">🚀 Project</a>
</div>

<h2 id="read">الهدف / Goal</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 تتدرب على محادثة تسوق حقيقية جوا محل ملابس — تسأل عن السعر والمقاس واللون، تطلب تجربة القطعة، وحتى تحاول تاخد خصم بأدب. وتاخد 5 كلمات جديدة مرتبطة بالتسوق.</div>
    <div class="en">🇬🇧 Practice a real shopping conversation inside a clothing shop — ask about price, size, and color, ask to try something on, and even try to get a polite discount. You'll also pick up 5 new shopping-related words.</div>
</div>

<h2 id="understand">إزاي تستخدم المحاكي / How to Use the Simulator</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 هتقرا سطر من البائع (مترجم تلقائيًا تحته بالعربي)، وبعدين هيظهرلك اختيارين لردك انت — اختار اللي تحس إنه الأصح، وهتاخد تقييم فوري (✅ أو ❌) يشرحلك ليه بالظبط. كل رد غلط بيوضحلك السبب النحوي أو سبب قلة الأدب فيه.</div>
    <div class="en">🇬🇧 You'll read a line from the shopkeeper (automatically translated under it in Arabic), then get two response options — pick the one you think is right, and get instant feedback (✅ or ❌) that explains exactly why. Every wrong option shows you the specific grammar or politeness reason it's wrong.</div>
</div>

<h2 id="practice">💬 محاكي المحادثة / Conversation Simulator</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>السيناريو:</b> انت جوا محل ملابس بتدور على جاكيت، والبائع بييجي يساعدك.</div>
    <div class="en">🇬🇧 <b>Scenario:</b> You're inside a clothing shop looking for a jacket, and the shopkeeper comes over to help.</div>
</div>

<div class="dialogue-sim" data-dialogue='[{"speaker":"other","label":"البائع / Shopkeeper","en":"Welcome! Are you looking for anything in particular today?","ar":"أهلاً! بتدور على حاجة معينة النهاردة؟"},{"speaker":"you","choices":[{"en":"Yes, how much is this jacket?","ar":"أيوه، بكام الجاكيت ده؟","correct":true,"feedback_ar":"✅ سؤال صحيح نحويًا وواضح لمعرفة السعر — فعل السؤال &#39;is&#39; في مكانه الصح.","next":2},{"en":"How much this jacket?","ar":"بكام الجاكيت ده؟","correct":false,"feedback_ar":"❌ خطأ نحوي — ناقص فعل السؤال. الصح: &#39;How much IS this jacket?&#39;","next":2}]},{"speaker":"other","label":"البائع / Shopkeeper","en":"It&#39;s 450 pounds. It&#39;s on sale this week.","ar":"بـ450 جنيه. عليه خصم الأسبوع ده."},{"speaker":"you","choices":[{"en":"Do you have this in a medium size?","ar":"عندك ده مقاس ميديم؟","correct":true,"feedback_ar":"✅ سؤال مهذب باستخدام &#39;Do you have&#39; — الصيغة الطبيعية للسؤال عن توفر مقاس.","next":4},{"en":"Give me medium.","ar":"اديني ميديم.","correct":false,"feedback_ar":"❌ صيغة أمر مباشر وفظ في محل — ينقصها أدب زي &#39;Could I have...&#39; أو &#39;Do you have...&#39;","next":4}]},{"speaker":"other","label":"البائع / Shopkeeper","en":"Yes, we have it in medium and large. What color would you like?","ar":"أيوه، عندنا ميديم ولارج. عايز أي لون؟"},{"speaker":"you","choices":[{"en":"I&#39;d like the blue one, please.","ar":"حابب اللون الأزرق، من فضلك.","correct":true,"feedback_ar":"✅ رد مهذب وكامل باستخدام &#39;I&#39;d like&#39; بدل كلمة واحدة جافة.","next":6},{"en":"Blue.","ar":"أزرق.","correct":false,"feedback_ar":"❌ كلمة واحدة بس — رد جاف جدًا لمحادثة بيع، الأفضل جملة كاملة ومهذبة.","next":6}]},{"speaker":"other","label":"البائع / Shopkeeper","en":"Here you go. Would you like to try it on before you decide?","ar":"اتفضل. حابب تقيسه قبل ما تقرر؟"},{"speaker":"you","choices":[{"en":"Yes, please. Where&#39;s the fitting room?","ar":"أيوه من فضلك. فين غرفة القياس؟","correct":true,"feedback_ar":"✅ رد طبيعي ومنطقي — تجربة الملابس قبل الشراء دايمًا فكرة صح.","next":8},{"en":"No need, I trust you.","ar":"مفيش داعي، أنا واثق فيك.","correct":false,"feedback_ar":"❌ رد غير منطقي في موقف تسوق حقيقي — من غير تجربة ممكن ياخد مقاس غلط.","next":8}]},{"speaker":"other","label":"البائع / Shopkeeper","en":"It looks great on you! Since you&#39;re buying two items, I can give you a 10% discount.","ar":"شكله جميل عليك! وبما إنك هتشتري قطعتين، أقدر أديك خصم 10%."},{"speaker":"you","choices":[{"en":"That&#39;s very kind, thank you! I&#39;ll pay by card.","ar":"ده لطف كبير منك، شكرًا! هدفع بالكارت.","correct":true,"feedback_ar":"✅ رد ممتن وواضح، وبيحدد طريقة الدفع بشكل مباشر ومهذب.","next":10},{"en":"Ok give discount more.","ar":"طيب اديني خصم أكتر.","correct":false,"feedback_ar":"❌ خطأ نحوي (الصح: &#39;Can you give me a bigger discount?&#39;) وطلب زيادة فظ بعد عرض كريم بالفعل.","next":10}]}]'>
    <div class="dialogue-scenario">📍 محل ملابس — بتدور على جاكيت / A clothing shop — you're looking for a jacket</div>
    <div class="dialogue-log"></div>
    <div class="dialogue-choices"></div>
    <button class="dialogue-restart-btn" hidden>🔄 ابدأ من جديد / Restart</button>
</div>

<h2>مفردات التسوق / Shopping Vocabulary</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 دوس على أي بطاقة عشان تشوف الترجمة والمثال.</div>
    <div class="en">🇬🇧 Click any card to reveal the translation and example.</div>
</div>
<div class="vocab-grid">
    <div class="vocab-card">
        <div class="vocab-card-front">
            <div class="vocab-word">Price</div>
            <div class="vocab-pron">/praɪs/</div>
            <button type="button" class="speak-btn" data-text="Price" data-rate="1">🔊 Listen</button>
        </div>
        <div class="vocab-card-back">
            <div class="vocab-ar">السعر</div>
            <div class="vocab-example"><div class="en">What's the price of this shirt?</div><div class="ar">إيه سعر القميص ده؟</div></div>
        </div>
        <div class="vocab-card-hint">👆 دوس / Tap</div>
    </div>
    <div class="vocab-card">
        <div class="vocab-card-front">
            <div class="vocab-word">Size</div>
            <div class="vocab-pron">/saɪz/</div>
            <button type="button" class="speak-btn" data-text="Size" data-rate="1">🔊 Listen</button>
        </div>
        <div class="vocab-card-back">
            <div class="vocab-ar">المقاس</div>
            <div class="vocab-example"><div class="en">Do you have a bigger size?</div><div class="ar">عندك مقاس أكبر؟</div></div>
        </div>
        <div class="vocab-card-hint">👆 دوس / Tap</div>
    </div>
    <div class="vocab-card">
        <div class="vocab-card-front">
            <div class="vocab-word">Discount</div>
            <div class="vocab-pron">/ˈdɪs.kaʊnt/</div>
            <button type="button" class="speak-btn" data-text="Discount" data-rate="1">🔊 Listen</button>
        </div>
        <div class="vocab-card-back">
            <div class="vocab-ar">خصم</div>
            <div class="vocab-example"><div class="en">Is there a discount on this item?</div><div class="ar">فيه خصم على القطعة دي؟</div></div>
        </div>
        <div class="vocab-card-hint">👆 دوس / Tap</div>
    </div>
    <div class="vocab-card">
        <div class="vocab-card-front">
            <div class="vocab-word">Try on</div>
            <div class="vocab-pron">/traɪ ɒn/</div>
            <button type="button" class="speak-btn" data-text="Try on" data-rate="1">🔊 Listen</button>
        </div>
        <div class="vocab-card-back">
            <div class="vocab-ar">يقيس / يجرب الملابس</div>
            <div class="vocab-example"><div class="en">Can I try this on, please?</div><div class="ar">ممكن أقيس ده، من فضلك؟</div></div>
        </div>
        <div class="vocab-card-hint">👆 دوس / Tap</div>
    </div>
    <div class="vocab-card">
        <div class="vocab-card-front">
            <div class="vocab-word">Fitting room</div>
            <div class="vocab-pron">/ˈfɪt.ɪŋ ruːm/</div>
            <button type="button" class="speak-btn" data-text="Fitting room" data-rate="1">🔊 Listen</button>
        </div>
        <div class="vocab-card-back">
            <div class="vocab-ar">غرفة القياس</div>
            <div class="vocab-example"><div class="en">The fitting room is at the back of the shop.</div><div class="ar">غرفة القياس في آخر المحل.</div></div>
        </div>
        <div class="vocab-card-hint">👆 دوس / Tap</div>
    </div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="how-much-is">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">إيه الصيغة الصحيحة للسؤال عن السعر؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What's the correct way to ask about a price?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="how-much-this"> How much this jacket?</label>
        <label><input type="radio" name="q1" value="how-much-is"> How much is this jacket?</label>
        <label><input type="radio" name="q1" value="jacket-how-much"> Jacket how much?</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="discount">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">أي كلمة معناها "خصم"؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Which word means "discount"?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="price"> price</label>
        <label><input type="radio" name="q2" value="discount"> discount</label>
        <label><input type="radio" name="q2" value="size"> size</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="polite-request">
    <h3>سؤال 3 / Question 3</h3>
    <p class="quiz-question">لو البائع عرض عليك تجرب القطعة، إيه أفضل رد؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">If the shopkeeper offers you a fitting room, what's the best response?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q3" value="polite-request"> "Yes, please. Where's the fitting room?"</label>
        <label><input type="radio" name="q3" value="no-need"> "No need, I trust you."</label>
        <label><input type="radio" name="q3" value="ignore"> تتجاهل العرض</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="give-me">
    <h3>سؤال 4 / Question 4</h3>
    <p class="quiz-question">أي جملة فيها قلة أدب في محل بيع؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Which sentence is impolite in a shop?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q4" value="give-me"> "Give me medium."</label>
        <label><input type="radio" name="q4" value="do-you-have"> "Do you have this in a medium size?"</label>
        <label><input type="radio" name="q4" value="id-like"> "I'd like the blue one, please."</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ محادثتك في السوبر ماركت / Your Own Supermarket Conversation</h3>
    <div class="ar">🇪🇬 اكتب على ورقة محادثة تسوق زي دي، بس في سوبر ماركت بدل محل ملابس — اسأل عن سعر منتج، واسأل لو فيه عرض أو خصم عليه. استخدم "How much is...?" و"Is there a discount on...?".</div>
    <div class="en">🇬🇧 Write out a shopping conversation like this one, but in a supermarket instead of a clothing shop — ask about a product's price, and ask if there's an offer or discount on it. Use "How much is...?" and "Is there a discount on...?".</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 اتعلمت تتفاهم في محل — دلوقتي جاي موقف مختلف تمامًا: تسأل عن الطريق وتستخدم المواصلات في بلد أجنبي. المحادثة الجاية هتحطك في نفس الموقف مع محلي بيساعدك توصل لمحطة القطر.</div>
    <div class="en">🇬🇧 You've learned to get by in a shop — next comes a completely different situation: asking for directions and using transport in a foreign country. The next lesson puts you in that exact scenario with a local helping you reach the train station.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>السؤال عن السعر: "How much IS...?" — لازم فعل السؤال، مش "How much this...?".</li>
        <li>الطلبات المهذبة بتبدأ بـ "I'd like..." أو "Do you have...?" مش أوامر مباشرة.</li>
        <li>جرب الملابس دايمًا قبل الشراء، واستخدم "Can I try this on?".</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="a1-listening-1.php">← المرحلة السابقة</a>
    <a href="directions-transport.php">المرحلة الجاية / Next: الاتجاهات ووسائل المواصلات →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
