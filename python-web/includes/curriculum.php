<?php
// Full curriculum definition for the Python Web Developer track.
// 'external' entries point directly at the matching lesson in another track
// instead of duplicating content — paths are relative to this track's lessons/ folder.
return [
    'setup' => [
        'title_ar' => 'الأدوات والإعدادات',
        'title_en' => 'Tools & Setup',
        'desc_ar'  => 'تثبيت Python، اختيار المحرر، وأهم الأسئلة قبل ما تبدأ.',
        'desc_en'  => 'Installing Python, choosing an editor, and common questions before you start.',
    ],
    'python-basics' => [
        'title_ar' => 'أساسيات لغة Python',
        'title_en' => 'Python Fundamentals',
        'desc_ar'  => 'المتغيرات، الأنواع، هياكل التحكم، القوائم، والدوال — بالتنفيذ الفعلي.',
        'desc_en'  => 'Variables, types, control structures, lists, and functions — with real execution.',
    ],
    'frontend-essentials' => [
        'title_ar' => 'اللي محتاجه من مسار Front-End',
        'title_en' => 'What You Need from Front-End',
        'desc_ar'  => 'مش محتاج المسار كامل — بس HTML + CSS + JS عشان تقدر تبني واجهة أي تطبيق Python.',
        'desc_en'  => 'You don\'t need the whole track — just HTML + CSS + JS to build any Python app\'s interface.',
        'external' => '../frontend/index.php',
    ],
    'django' => [
        'title_ar' => 'إطار العمل Django',
        'title_en' => 'The Django Framework',
        'desc_ar'  => 'أشهر إطار عمل Python لبناء مواقع كاملة بسرعة وبأمان.',
        'desc_en'  => 'Python\'s most popular framework for building full sites quickly and securely.',
    ],
    'django-models-admin' => [
        'title_ar' => 'Django: Models ولوحة الإدارة',
        'title_en' => 'Django: Models & the Admin Panel',
        'desc_ar'  => 'تصميم جداول قاعدة البيانات بكلاسات Python، ولوحة إدارة جاهزة من غير ما تكتب سطر HTML.',
        'desc_en'  => 'Designing database tables as Python classes, and a ready admin panel without writing a line of HTML.',
    ],
    'django-views-templates' => [
        'title_ar' => 'Django: Views وTemplates وURLs',
        'title_en' => 'Django: Views, Templates & URLs',
        'desc_ar'  => 'إزاي طلب المستخدم بيوصل لكود Django ويرجع صفحة HTML حقيقية.',
        'desc_en'  => 'How a user\'s request reaches Django code and comes back as a real HTML page.',
    ],
    'flask' => [
        'title_ar' => 'إطار العمل Flask',
        'title_en' => 'The Flask Framework',
        'desc_ar'  => 'إطار عمل خفيف ومرن لبناء تطبيقات وAPIs بـ Python.',
        'desc_en'  => 'A lightweight, flexible framework for building apps and APIs with Python.',
    ],
    'flask-routing-templates' => [
        'title_ar' => 'Flask: Routing وTemplates وForms',
        'title_en' => 'Flask: Routing, Templates & Forms',
        'desc_ar'  => 'تعريف مسارات (Routes)، عرض صفحات بـ Jinja2، واستقبال بيانات فورم حقيقية.',
        'desc_en'  => 'Defining routes, rendering pages with Jinja2, and receiving real form data.',
    ],
    'flask-database-sqlalchemy' => [
        'title_ar' => 'Flask: قاعدة بيانات بـ SQLAlchemy',
        'title_en' => 'Flask: Database with SQLAlchemy',
        'desc_ar'  => 'تخزين واسترجاع بيانات حقيقية من غير ما تكتب SQL يدوي في كل مرة.',
        'desc_en'  => 'Storing and retrieving real data without writing raw SQL every time.',
    ],
    'flask-auth-project' => [
        'title_ar' => '🚀 مشروع: نظام تسجيل دخول بـ Flask',
        'title_en' => '🚀 Project: A Flask Authentication System',
        'desc_ar'  => 'Register/Login/Logout حقيقي بـ Flask وSessions وتشفير كلمة المرور.',
        'desc_en'  => 'Real Register/Login/Logout with Flask, Sessions, and password hashing.',
    ],
    'flask-rest-api-project' => [
        'title_ar' => '🚀 مشروع: REST API بـ Flask',
        'title_en' => '🚀 Project: A REST API with Flask',
        'desc_ar'  => 'GET/POST/PUT/DELETE حقيقيين بـ Flask، بالظبط بمنطق REST اللي اتعلمته في مسار الـ Backend.',
        'desc_en'  => 'Real GET/POST/PUT/DELETE with Flask, using the same REST logic from the Backend track.',
    ],
    'python-web-deployment' => [
        'title_ar' => 'نشر تطبيق Python للعامة',
        'title_en' => 'Deploying a Python Web App',
        'desc_ar'  => 'WSGI/Gunicorn، الفرق عن سيرفر التطوير المدمج، وليه استضافة Python أصعب شوية من PHP.',
        'desc_en'  => 'WSGI/Gunicorn, the difference from the built-in dev server, and why hosting Python is a bit harder than PHP.',
    ],
    'other-paths' => [
        'title_ar' => 'نظرة عامة على المسارات الأخرى',
        'title_en' => 'A Look at Other Python Paths',
        'desc_ar'  => 'Python مش بس ويب — نظرة سريعة على تحليل البيانات والأتمتة والذكاء الاصطناعي.',
        'desc_en'  => 'Python isn\'t just web — a quick look at data analysis, automation, and AI.',
    ],
];
