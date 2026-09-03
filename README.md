# 🔷 Sila — for Learning Programming

**سيلا** منصة تعليم برمجة ومهارات رقمية عملية، ثنائية اللغة (عربي/إنجليزي)، مبنية بـ PHP خالص من غير أي framework — الفكرة الأساسية: **تتعلم بالتنفيذ الفعلي مش بالحفظ**. كل درس فيه كود بيتشغل حقيقي على السيرفر، مش أمثلة نظرية أو نتائج متخيّلة.

> A bilingual (Arabic/English), hands-on programming & digital-skills education platform built in plain PHP with no framework. The core idea: **learn by real execution, not memorization**. Every lesson runs real code on the server — nothing theoretical, nothing fabricated.

---

## 📚 الأقسام والمسارات / Sections & Tracks

المنصة مقسّمة لـ **3 أقسام**، فيهم **11 مسار** و **121 مرحلة تعليمية** إجمالًا:

### 💻 قسم البرمجة / Programming

| المسار | المراحل | المحرك | الوصف |
|---|---|---|---|
| 🧩 أساسيات البرمجة | 14 | PHP حقيقي | التفكير المنطقي، حل المشكلات، والأساسيات المستقلة عن أي لغة معينة |
| 🎨 Front-End Developer | 14 | محرر HTML/CSS/JS حي | من HTML/CSS للـ JavaScript وأطر العمل الحديثة (Bootstrap, Tailwind, Vue) |
| 🐘 PHP Back-End Developer | 16 | PHP حقيقي | من الصفر لمستوى احترافي: OOP, MVC, قواعد بيانات, DevOps, System Design |
| 🧱 Full Stack Developer | 21 | PHP + محرر HTML/CSS/JS | دمج Front-End وBack-End، مع مشاريع تطبيقية كاملة |
| 🐍 Python Web Developer | 6 | Python حقيقي | أساسيات بايثون، ثم Django وFlask |
| 🤖 أدوات الذكاء الاصطناعي | 4 | — | Claude, ChatGPT, Gemini, GitHub Copilot — إزاي تستخدمهم بفعالية |

### 🚀 قسم المهارات الرقمية / Digital Skills

| المسار | المراحل | المحرك | الوصف |
|---|---|---|---|
| 📣 التسويق الإلكتروني | 9 | — | SEO, تسويق المحتوى, السوشيال ميديا, إعلانات مدفوعة, تحليلات |
| 📊 تحليل البيانات | 9 | Python + Pandas حقيقي | تنظيف وتحليل البيانات، رسوم بيانية حقيقية، SQL، إحصاء |
| 🧭 تصميم UX/UI | 8 | معاينات HTML/CSS حية | مبادئ التصميم، الألوان، الطباعة، Wireframing، قابلية الاستخدام |
| 🖌️ التصميم الجرافيكي | 7 | معاينات HTML/CSS حية | عناصر التصميم، نظرية الألوان، الهوية البصرية |

### 🌍 قسم اللغات / Languages

| المسار | المراحل | المحرك | الوصف |
|---|---|---|---|
| 🇬🇧 اللغة الإنجليزية | 13 | — | من الصفر: القواعد، المفردات، الكتابة، والتحدث — وصولاً لإنجليزية بيئة العمل والإنجليزية التقنية للمبرمجين |

---

## ✨ المميزات الأساسية / Key Features

- **تنفيذ فعلي حقيقي** — كل مسار فيه كود بيتشغل، مش أمثلة نظرية:
  - مسارات PHP بتشغّل الكود عن طريق `proc_open` بينادي على `php-cli` الحقيقي على السيرفر
  - مسارات Python (Python Web, تحليل البيانات) بتشغّل كود Python حقيقي (فيه Pandas وMatplotlib فعليًا) بنفس الطريقة
  - مسار Front-End فيه محرر HTML/CSS/JS حي بيحدّث معاينة `iframe` فورًا وأنت بتكتب — تنفيذ حقيقي في المتصفح نفسه، من غير أي سيرفر
- **شرح ثنائي اللغة** — كل مفهوم متشرح بالعربي والإنجليزي جنب بعض
- **هيكل درس موحّد** — كل درس ماشي على نفس الترتيب:
  <br>`📖 Read → 🧠 Understand → 💻 Practice → 🧠 Quiz → 🛠️ Challenge → 🚀 Project`
  - **Quiz تفاعلي** بأسئلة اختيار من متعدد وتصحيح فوري بـ JavaScript
  - **Challenge** منفصل بصريًا عن التمرين العادي — مهمة عملية ملموسة
  - **زرار "Complete Lesson"** بيتحسب فعليًا في نسبة تقدمك بالمسار
- **تتبع تقدم لكل مسار** — كل مسار له `progress.json` خاص بيه، وشريط تقدم في لوحته
- **إعادة استخدام ذكية** — مسار Full Stack وPython Web بيربطوا مباشرة بمحتوى مسارات تانية (HTML من Front-End، PHP من Back-End) بدل تكرار نفس المحتوى

---

## 🏗️ البنية التقنية / Technical Architecture

مفيش أي framework — PHP خام، HTML/CSS/JS خام، من غير أي build step أو dependency خارجية.

### هيكل كل مسار (Track)

```
<track-name>/
├── includes/
│   ├── curriculum.php    # مصدر الحقيقة الوحيد: قائمة المراحل بعناوينها ووصفها
│   ├── header.php        # الهيدر المشترك (شعار المسار + نافيجيشن)
│   ├── footer.php        # الفوتر + JavaScript المشترك (quiz, complete-lesson, mini-editor)
│   ├── style.css         # التصميم الكامل (Dark theme)
│   └── progress.php      # قراءة/كتابة تقدم المستخدم
├── data/
│   └── progress.json     # تقدم المستخدم الفعلي (يتخزن محليًا، مفيش قاعدة بيانات)
├── lessons/
│   └── *.php             # كل درس ملف مستقل
├── playground/            # (لو المسار فيه تنفيذ كود)
│   ├── index.php          # واجهة المحرر
│   └── run.php            # محرك التنفيذ الفعلي (proc_open)
├── sandbox/                # ملفات مؤقتة وقت التنفيذ (فاضي غالبًا، بيتنضف أوتوماتيك)
├── index.php               # لوحة الدروس (Dashboard) بتاعة المسار
└── toggle_progress.php     # Endpoint بسيط لتحديث التقدم
```

### الصفحة الرئيسية (جذر المشروع)

```
/
├── includes/
│   ├── tracks.php     # قائمة كل المسارات مقسّمة بـ 'section' (programming / digital)
│   ├── header.php      # هيدر المنصة العام
│   └── footer.php
├── assets/
│   └── style.css       # تصميم الصفحة الرئيسية
└── index.php            # الصفحة الرئيسية — بتعرض كل قسم ومساراته
```

### إزاي التنفيذ الفعلي شغال

- **PHP**: `playground/run.php` بيكتب الكود في ملف مؤقت جوه `sandbox/`، وبينادي على `php-cli` (مش `php-httpd`) عن طريق `proc_open`، وبيرجّع الـ `stdout`/`stderr` الحقيقيين كـ JSON، مع timeout للحماية من الـ infinite loops.
- **Python**: نفس الفكرة بالظبط، بس بينادي على `python` (متأكد إنه شغال ومعاه Pandas/Matplotlib/Django/Flask متثبتين).
- **HTML/CSS/JS**: مفيش سيرفر خالص — محرر بـ 3 تابات (HTML/CSS/JS) بيبني `srcdoc` لـ `<iframe>` مباشرة في المتصفح، وبيتحدث تلقائي مع كل تعديل (debounced).

---

## 🔒 ملاحظات أمان مهمة / Security Notes

الأداة دي بتنفّذ كود المستخدم فعليًا على السيرفر — ده أساس فكرتها، لكنه معناه إنها **تنفيذ كود عن بُعد (RCE) بتصميم**. لو ناوي تنشرها للعامة، لازم تفهم بالظبط إيه اللي بيحميك وإيه اللي لأ:

**محركات PHP** (`php-backend`, `fundamentals`, `fullstack`) محمية بـ 3 طبقات حقيقية:
- `disable_functions` بتتبعت لمحرك PHP نفسه وقت التشغيل (`exec`, `shell_exec`, `system`, `proc_open`, `putenv`, `symlink`... إلخ) — دي حماية على مستوى المفسّر نفسه، مش regex سهل تتلف عليه.
- `open_basedir` بيمنع أي قراءة/كتابة لملفات برة مجلد الـ `sandbox` بتاع المسار.
- Rate limiting بسيط (20 تشغيلة/دقيقة لكل IP) + حد أقصى لحجم الناتج (200KB) لمنع إغراق الذاكرة/القرص.

**محركات Python** (`python-web`, `data-analysis`) أضعف بطبيعتها — Python مفيهاش حاجة زي `disable_functions`/`open_basedir` على مستوى المفسّر. الحماية الموجودة:
- قايمة حظر نصية (regex) على `os`, `subprocess`, `socket`, `eval`, `exec`, `open`... إلخ — **ده رادع مش ضمان**، ممكن يتلف عليه بتقنيات تشفير/تركيب نصوص.
- نفس الـ Rate limiting وحد الناتج.
- **ملحوظ:** كتابة ملف بمسار مطلق (زي `matplotlib.savefig("/etc/x")`) مش ممنوعة تقنيًا، ومكتبات تالتة زي matplotlib بتكتب ملفات من غير ما تستخدم `open()` في كود المستخدم نفسه، فمينفعش تعتمد على الـ blocklist وحدها.

**لو عايز تنشر فعليًا للعامة وتفضّل حاسس بالأمان:** أضمن حل هو تشغيل كل تنفيذ كود جوه Container منفصل (Docker) بموارد محدودة ومن غير أي صلاحية شبكة — ده محتاج VPS بصلاحية root، مش هيشتغل من كود PHP لوحده.

---

## 🚀 النشر للعامة / Deploying Publicly

### ❌ Vercel ومنصات الـ Serverless مش هيشتغلوا

Vercel، Netlify، وأي منصة Serverless مبنية لـ Next.js/Node/Static من الأساس — **مفيهاش PHP runtime خالص**، وحتى لو كان فيه، فكرة `proc_open` بتشغّل ملف تنفيذي (php-cli/python) دي بالظبط اللي منصات الـ Serverless بتمنعها أمنيًا. المشروع ده محتاج سيرفر تقليدي (Apache/Nginx + PHP-FPM أو mod_php) شغال باستمرار.

### ⚠️ استضافة مشتركة (Shared Hosting) — محتاج تتأكد الأول

معظم الاستضافات المشتركة الرخيصة (Hostinger, Namecheap, Bluehost العادية...) **بتقفل `proc_open`/`exec` افتراضيًا** على كل حساباتها كإجراء أمني عام — مش حاجة تقدر تفعّلها بنفسك من غير دعم فني، لأنها مضبوطة في `php.ini` بتاع السيرفر كله. لو اشتريت استضافة وطلع `proc_open` مقفول، الـ Playgrounds كلها (PHP وPython) هتفشل بصمت.

**قبل ما تشتري أي استضافة، اتأكد من:**
1. إنها بتسمح بـ `proc_open` (اسأل الدعم الفني صراحة، أو دور في وثائقهم عن "shell access" أو "exec functions")
2. إن عندها Python CLI متاح ومعاه إمكانية تثبيت pip packages (لمسار Python وتحليل البيانات)

استضافات زي **A2 Hosting** أو **InterServer** بتسمح غالبًا بـ SSH وexec على الباقات الأعلى، لكن ده بيختلف حسب الخطة والوقت.

### ✅ الخيار الأضمن: VPS رخيص

لو عايز تضمن إن الـ Playgrounds تشتغل 100%، أرخص طريق مضمون هو **VPS بسعر قريب من الاستضافة المشتركة** (Hetzner ~€4، Contabo ~€5، DigitalOcean/Linode من $5) — بتديك root access كامل، تقدر تركّب PHP وPython وتتحكم في كل حاجة بنفسك، وده أضمن بكتير من "أتمنى إن الاستضافة المشتركة تسمح".

خطوات النشر على VPS (باختصار):
```bash
sudo apt update && sudo apt install apache2 php php-cli php-sqlite3 python3 python3-pip
pip3 install pandas matplotlib flask django
git clone https://github.com/waliedmohamed999-max/DMSPHP.git /var/www/html/dmsphp
sudo chown -R www-data:www-data /var/www/html/dmsphp
# فعّل mod_rewrite واضبط VirtualHost على مجلد المشروع
```

---

## 🚀 التشغيل محليًا / Running Locally

المشروع مبني عشان يشتغل على **XAMPP** (Apache + PHP)، واختياريًا Python لو عايز تجرب مسارات Python/تحليل البيانات.

1. حمّل [XAMPP](https://www.apachefriends.org/) وثبّته.
2. حط المشروع كامل جوه `htdocs/` (أو استنسخه فيها مباشرة):
   ```bash
   git clone https://github.com/waliedmohamed999-max/DMSPHP.git
   ```
3. شغّل Apache من لوحة تحكم XAMPP.
4. افتح المتصفح على:
   ```
   http://localhost/DMSPHP/
   ```
5. **(اختياري)** لتشغيل مسارات Python (Python Web، تحليل البيانات) بمحتواها الكامل، لازم يكون عندك Python متثبت ومعاه:
   ```bash
   pip install pandas matplotlib numpy flask django
   ```

مفيش قاعدة بيانات مطلوبة — تتبع التقدم بيتخزن في ملفات JSON بسيطة جوه `data/` بتاعة كل مسار.

---

## ➕ إضافة مسار جديد / Adding a New Track

1. اعمل مجلد جديد بنفس هيكل أي مسار موجود (انسخ أبسط مسار زي `ai-tools/` كنقطة بداية).
2. عرّف مراحل المسار في `includes/curriculum.php` (مصفوفة `key => [title_ar, title_en, desc_ar, desc_en]`).
3. اكتب درس واحد على الأقل في `lessons/` بنفس القالب الموحد (شوف أي درس موجود كمرجع — كله بنفس البنية: `step-tracker`, `bi-block`, `quiz-box`, `challenge-box`, `complete-lesson`).
4. سجّل المسار في `includes/tracks.php` بالجذر (حدد `section`: `programming` أو `digital`).
5. لو المسار محتاج تنفيذ كود، اعمل `playground/` بنفس نمط أي مسار PHP/Python موجود.

المراحل اللي لسه معملهاش ملف في `lessons/` بتظهر تلقائيًا بعلامة "قريبًا" في لوحة المسار — مفيش داعي تعدّل حاجة تانية.

---

## 🧱 فلسفة التصميم / Design Philosophy

- **لا فبركة** — أي "ناتج فعلي" ظاهر في درس اتشغّل فعليًا وتم التحقق منه، مش متخيّل أو مكتوب تخمينًا.
- **إعادة استخدام بدل التكرار** — أي مفهوم موجود في مسار، المسارات التانية اللي محتاجاه بتربط له مباشرة بدل ما تعيد كتابته.
- **العربي أولًا** — الشرح الأساسي بالعربي المصري، والإنجليزي جنبه للمصطلحات والقراءة الموازية.

---

<div dir="rtl">

صُمم وطُوّر كـ **Sila for Learning Programming**.

</div>
