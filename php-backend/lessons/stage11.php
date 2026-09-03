<?php
require __DIR__ . '/../includes/progress.php';
$stageKey = 'stage11';
$isDone = !empty(load_progress()[$stageKey]);

$page_title = 'المرحلة 11 — تصميم الأنظمة';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<span class="badge">المسار الاحترافي — المرحلة 11 / Stage 11</span>
<h1>تصميم الأنظمة لمهندسي الـ Backend <span class="ltr">System Design for Backend Engineers</span></h1>
<p class="subtitle">لحد دلوقتي بنينا مشاريع بتشتغل على سيرفر واحد. لو التطبيق كبر لمليون مستخدم، سيرفر واحد مش هيكفي. هنا مش هنكتب كود كتير — هنبني "خريطة تفكير" لإزاي الأنظمة الكبيرة بتتصمم.</p>

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
    <div class="ar">🇪🇬 تفهم الفرق بين التوسع الرأسي والأفقي، دور الـ Load Balancer، إزاي طوابير الرسائل (Message Queues) بتفصل الأنظمة عن بعض، وإيه هو الـ API Gateway و Rate Limiting.</div>
    <div class="en">🇬🇧 Understand vertical vs horizontal scaling, the role of a Load Balancer, how Message Queues decouple systems, and what an API Gateway and Rate Limiting are.</div>
</div>

<h2 id="understand">🧠 التوسع الرأسي مقابل الأفقي / Vertical vs Horizontal Scaling</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 <b>Vertical Scaling:</b> تكبّر السيرفر نفسه (رامات وبروسيسور أقوى) — سهل بس ليه سقف، وسيرفر واحد يفضل نقطة فشل واحدة. <b>Horizontal Scaling:</b> تضيف سيرفرات تانية بدل ما تكبّر واحد — أعقد شوية بس ملهوش سقف تقريبًا، ولو سيرفر وقع الباقي شغال.</div>
    <div class="en">🇬🇧 <b>Vertical Scaling:</b> make the single server bigger (more RAM/CPU) — simple, but has a ceiling, and remains a single point of failure. <b>Horizontal Scaling:</b> add more servers instead of enlarging one — more complex, but scales almost without limit, and if one server dies, the rest keep running.</div>
</div>

<h2>Load Balancer — توزيع الحمل</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 لو عندك أكتر من سيرفر (Horizontal Scaling)، محتاج حد يوزّع الطلبات الجاية عليهم بالتساوي — ده دور الـ <b>Load Balancer</b>. المستخدم بيبعت لعنوان واحد، والـ Load Balancer بيقرر يبعت الطلب ده لأي سيرفر من اللي شغالين.</div>
    <div class="en">🇬🇧 If you have multiple servers (Horizontal Scaling), something must distribute incoming requests evenly across them — that's the <b>Load Balancer</b>'s job. The user hits one address, and the Load Balancer decides which live server handles each request.</div>
</div>

<div class="flow-diagram">
    <div class="flow-box">Client Request</div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">Load Balancer</div>
    <div class="flow-arrow">↓ distributes to any live instance</div>
    <div class="flow-box">App1 / App2 / App3<br><span class="ltr" style="font-size:0.8em">3 copies of the same app</span></div>
    <div class="flow-arrow">↓</div>
    <div class="flow-box">Database<br><span class="ltr" style="font-size:0.8em">usually shared, or Replicated for reads</span></div>
</div>

<h2>Message Queues — فصل الأنظمة عن بعض</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 اتعلمنا Queue بسيط بـ Redis في المرحلة اللي فاتت. في نظام كبير، أدوات زي <b>RabbitMQ</b> أو <b>Kafka</b> بتخلي أنظمة مختلفة (خدمة الطلبات، خدمة الإيميلات، خدمة الفواتير) تتكلم مع بعض بدون ما تعرف تفاصيل بعض — نظام بيبعت "حدث" (Event) زي "طلب جديد اتعمل"، والأنظمة المهتمة بتستقبله وتتصرف.</div>
    <div class="en">🇬🇧 We learned a simple Redis-backed Queue last stage. At larger scale, tools like <b>RabbitMQ</b> or <b>Kafka</b> let separate systems (orders service, email service, billing service) talk without knowing each other's internals — one system publishes an "Order Created" Event, and interested systems consume it and react.</div>
</div>

<pre><code>Order Service ──publishes──▶ "order.created" event
                                    │
                 ┌──────────────────┼──────────────────┐
                 ▼                  ▼                  ▼
         Email Service      Billing Service     Inventory Service
      (sends confirmation)  (charges card)    (reduces stock)</code></pre>
<div class="bi-block">
    <div class="ar">🇪🇬 الفايدة: لو خدمة الفواتير وقعت، خدمة الإيميلات لسه هتشتغل عادي — الأنظمة مستقلة عن بعض، عكس لو كل حاجة كانت في function calls مباشرة جوه بعضها.</div>
    <div class="en">🇬🇧 The benefit: if the Billing service goes down, the Email service keeps working fine — the systems are independent, unlike if everything were direct function calls into each other.</div>
</div>

<h2 id="practice">💻 API Gateway &amp; Rate Limiting</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 لو نظامك مقسّم لعدة خدمات صغيرة (Microservices)، الـ <b>API Gateway</b> بيبقى الباب الوحيد اللي العميل بيتكلم معاه، وهو اللي بيوجّه كل request للخدمة المسؤولة، وبيطبّق حاجات مشتركة زي التحقق من الهوية و<b>Rate Limiting</b> (منع مستخدم واحد إنه يبعت آلاف الطلبات في ثانية ويطيّح السيرفر).</div>
    <div class="en">🇬🇧 If your system is split into several small services (Microservices), the <b>API Gateway</b> is the single door clients talk to — it routes each request to the responsible service, and enforces shared concerns like authentication and <b>Rate Limiting</b> (stopping a single user from firing thousands of requests per second and taking down the server).</div>
</div>

<pre><code>&lt;?php
// مثال Rate Limiting بسيط باستخدام Redis
$key = 'rate:' . $userId;
$requests = $redis->incr($key);
if ($requests === 1) {
    $redis->expire($key, 60); // نافذة دقيقة واحدة
}
if ($requests > 100) {
    http_response_code(429);
    echo json_encode(['error' => 'Too many requests, slow down.']);
    exit;
}</code></pre>
<h3>الناتج الفعلي (بعد 101 طلب في دقيقة) / Actual output</h3>
<div class="output-box">HTTP 429 {"error":"Too many requests, slow down."}</div>

<div class="bi-block">
    <div class="ar">🇪🇬 عشان نجرب المبدأ من غير Redis حقيقي، الكود تحت بيحاكي نفس الفكرة بمصفوفة PHP عادية بتعدّ الطلبات لكل مستخدم — جرّب تغيّر الحد الأقصى أو عدد الطلبات وشوف مين بيتوقف.</div>
    <div class="en">🇬🇧 To try the principle without real Redis, the code below simulates the same idea with a plain PHP array counting requests per user — try changing the limit or the number of requests and see who gets stopped.</div>
</div>

<div class="mini-editor-wrap">
    <textarea spellcheck="false">&lt;?php
// محاكاة Rate Limiting بمصفوفة PHP عادية بدل Redis
class FakeRateLimiter {
    private array $counts = [];
    public function hit(string $userId, int $limitPerWindow): bool {
        $this->counts[$userId] = ($this->counts[$userId] ?? 0) + 1;
        return $this->counts[$userId] &lt;= $limitPerWindow;
    }
}

$limiter = new FakeRateLimiter();
for ($i = 1; $i &lt;= 5; $i++) {
    $allowed = $limiter->hit('user_1', 3);
    echo "Request $i: " . ($allowed ? "allowed" : "429 Too many requests") . PHP_EOL;
}</textarea>
    <div class="mini-toolbar">
        <button class="mini-run-btn">▶ شغّل / Run</button>
        <span class="mini-status"></span>
    </div>
    <div class="output-box">— لسه متشغلش / not run yet —</div>
</div>

<h2>Monolith مقابل Microservices</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 كل مشاريعنا لحد دلوقتي كانت <b>Monolith</b> — تطبيق واحد فيه كل المنطق. ده مناسب لمعظم المشاريع فعلًا. <b>Microservices</b> (تقسيم لخدمات صغيرة مستقلة) بيفيد لما فريق كبير بيشتغل على أجزاء مختلفة، أو لما جزء معين محتاج يتوسع لوحده — لكنه بيجيب تعقيد إضافي (شبكة، مراقبة، نشر) مش لازم تدفعه غير لو محتاجه فعلًا.</div>
    <div class="en">🇬🇧 Every project we've built so far has been a <b>Monolith</b> — one application containing all the logic. This is the right choice for most projects. <b>Microservices</b> (splitting into small independent services) helps when a large team works on different parts, or one part needs to scale independently — but it brings extra complexity (networking, monitoring, deployment) you shouldn't pay for unless you actually need it.</div>
</div>

<h2 id="quiz">🧠 اختبر فهمك / Test Your Understanding</h2>
<div class="quiz-box" data-correct="horizontal">
    <h3>سؤال 1 / Question 1</h3>
    <p class="quiz-question">تضيف سيرفرات جديدة بدل ما تكبّر سيرفر واحد — ده أنهي نوع توسع؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">Adding new servers instead of enlarging one — which type of scaling is this?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q1" value="vertical"> Vertical Scaling</label>
        <label><input type="radio" name="q1" value="horizontal"> Horizontal Scaling</label>
        <label><input type="radio" name="q1" value="caching"> Caching</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<div class="quiz-box" data-correct="decouple">
    <h3>سؤال 2 / Question 2</h3>
    <p class="quiz-question">الفايدة الأساسية من استخدام Message Queue (زي RabbitMQ) بين خدمة الطلبات وخدمة الفواتير إيه؟<br><span class="ltr" style="color:var(--muted);font-size:0.85em">What's the main benefit of a Message Queue between the orders and billing services?</span></p>
    <div class="quiz-options">
        <label><input type="radio" name="q2" value="decouple"> لو خدمة وقعت، التانية لسه شغالة — الأنظمة مستقلة</label>
        <label><input type="radio" name="q2" value="faster"> بتخلي قاعدة البيانات أسرع أوتوماتيك</label>
        <label><input type="radio" name="q2" value="required"> PHP مبيشتغلش من غيرها</label>
    </div>
    <button class="quiz-check-btn">تحقق من الإجابة / Check Answer</button>
    <div class="quiz-feedback"></div>
</div>

<h2 id="challenge">🛠️ Challenge</h2>
<div class="challenge-box">
    <h3>🛠️ Rate Limiter بحد مختلف لكل مستخدم / A Rate Limiter with Per-User Limits</h3>
    <div class="ar">🇪🇬 في المحرر فوق، جرّب <code>FakeRateLimiter</code> مع مستخدمين مختلفين (<code>user_1</code> بحد 3، <code>user_2</code> بحد 10) في نفس التشغيلة، وتأكد إن عداد كل مستخدم مستقل عن التاني.</div>
    <div class="en">🇬🇧 In the editor above, try <code>FakeRateLimiter</code> with two different users (<code>user_1</code> with a limit of 3, <code>user_2</code> with a limit of 10) in the same run, and confirm each user's counter is independent of the other's.</div>
</div>

<div class="exercise-box">
    <h3>✍️ تمرين إضافي / Extra Exercise</h3>
    <div class="ar">🇪🇬 من غير ما تكتب كود ولا سطر: ارسم (على ورقة أو أي أداة رسم) تصميم نظام لتطبيق توصيل طلبات بيستحمل مليون مستخدم — حدد فين الـ Load Balancer، فين هتحتاج Caching، وإمتى هتستخدم Queue بدل ما تنفذ حاجة فورًا.</div>
    <div class="en">🇬🇧 Without writing a single line of code: sketch (on paper or any drawing tool) a system design for a food-delivery app serving a million users — mark where the Load Balancer sits, where you'd add Caching, and when you'd use a Queue instead of executing something immediately.</div>
</div>

<h2 id="project">🚀 المشروع / Project</h2>
<div class="bi-block">
    <div class="ar">🇪🇬 Task Manager بتاعك النهاردة سيرفر واحد، وده تمام لغرض التعلم. لكن لو افترضت إنه هيستخدمه مليون شخص: فين هتحط Load Balancer؟ هل هتحتاج Queue لإشعارات المهام؟ التفكير في الأسئلة دي هو بالظبط اللي بيميّز مهندس Backend محترف.</div>
    <div class="en">🇬🇧 Your Task Manager runs on one server today, which is fine for learning. But imagine a million people used it: where would you put a Load Balancer? Would task notifications need a Queue? Thinking through these questions is exactly what distinguishes a professional Backend engineer.</div>
</div>

<div class="recap-box">
    <h3>✅ ملخص سريع / Recap</h3>
    <ul>
        <li>Vertical Scaling = سيرفر أقوى، Horizontal Scaling = سيرفرات أكتر.</li>
        <li>Load Balancer = بيوزّع الطلبات على عدة سيرفرات.</li>
        <li>Message Queues (RabbitMQ/Kafka) = بتفصل الأنظمة عن بعض عن طريق أحداث بدل استدعاء مباشر.</li>
        <li>API Gateway = باب واحد للخدمات، وRate Limiting بيحمي من إساءة الاستخدام.</li>
        <li>ابدأ بـ Monolith، ومتروحش لـ Microservices غير لو عندك سبب حقيقي.</li>
    </ul>
</div>

<div class="complete-lesson">
    <button class="complete-btn" data-stage="<?= $stageKey ?>" data-done="<?= $isDone ? '1' : '0' ?>">
        <?= $isDone ? '✓ الدرس مكتمل / Lesson Completed' : '✓ Complete Lesson' ?>
    </button>
</div>

<div class="nav-buttons">
    <a href="stage10.php">← المرحلة السابقة</a>
    <a href="stage12.php">المرحلة الجاية / Next: الاحتراف العالمي →</a>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
