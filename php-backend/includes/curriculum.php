<?php
// Full curriculum definition — single source of truth for the dashboard and lesson pages.
// Each entry carries `stage` (a number for grouping/ordering on the dashboard) and
// `skill` (one of: php, mysql, oop, apis, security, architecture, deployment — used
// by the dashboard's skills-breakdown panel). The original 16 stage-slot files keep
// their original keys/URLs untouched; new stages/lessons are additive.
return [
    'html' => [
        'title_ar' => 'أساسيات HTML',
        'title_en' => 'HTML Foundations',
        'desc_ar'  => 'بنية صفحة ويب، العناصر الأساسية، الفورمات، والجداول — قبل ما تكتب أي PHP.',
        'desc_en'  => 'Web page structure, core elements, forms, and tables — before writing any PHP.',
        'stage' => 1, 'stage_title_ar' => 'أساسيات الـ Backend', 'stage_title_en' => 'Backend Foundations', 'skill' => 'php',
    ],
    'stage0' => [
        'title_ar' => 'تجهيز البيئة',
        'title_en' => 'Environment Setup',
        'desc_ar'  => 'تثبيت PHP، فهم CLI مقابل Web Server، تجهيز المحرر.',
        'desc_en'  => 'Installing PHP, CLI vs Web Server, editor setup.',
        'stage' => 1, 'stage_title_ar' => 'أساسيات الـ Backend', 'stage_title_en' => 'Backend Foundations', 'skill' => 'php',
    ],
    'tools' => [
        'title_ar' => 'أدوات المطوّر: Command Line و Git/GitHub',
        'title_en' => 'Developer Tools: CLI & Git/GitHub',
        'desc_ar'  => 'أوامر التيرمينال الأساسية، Git للتحكم بالإصدارات، ورفع مشروعك على GitHub.',
        'desc_en'  => 'Essential terminal commands, Git for version control, and pushing your project to GitHub.',
        'stage' => 1, 'stage_title_ar' => 'أساسيات الـ Backend', 'stage_title_en' => 'Backend Foundations', 'skill' => 'deployment',
    ],
    'stage1' => [
        'title_ar' => 'أساسيات اللغة',
        'title_en' => 'PHP Fundamentals',
        'desc_ar'  => 'Variables, Types, Control Structures, Arrays, Strings, Functions.',
        'desc_en'  => 'Variables, Types, Control Structures, Arrays, Strings, Functions.',
        'stage' => 2, 'stage_title_ar' => 'أساسيات لغة PHP', 'stage_title_en' => 'PHP Fundamentals', 'skill' => 'php',
    ],
    'stage2' => [
        'title_ar' => 'البرمجة الكائنية',
        'title_en' => 'OOP in PHP',
        'desc_ar'  => 'Classes, Inheritance, Interfaces, Traits, Exceptions.',
        'desc_en'  => 'Classes, Inheritance, Interfaces, Traits, Exceptions.',
        'stage' => 11, 'stage_title_ar' => 'البرمجة الكائنية', 'stage_title_en' => 'Object-Oriented PHP', 'skill' => 'oop',
    ],
    'stage3' => [
        'title_ar' => 'PHP كـ Backend حقيقي',
        'title_en' => 'Web Fundamentals',
        'desc_ar'  => 'HTTP, Forms, Sessions, Cookies, File Upload, XSS/CSRF.',
        'desc_en'  => 'HTTP, Forms, Sessions, Cookies, File Upload, XSS/CSRF.',
        'stage' => 4, 'stage_title_ar' => 'الويب و HTTP', 'stage_title_en' => 'Web & HTTP', 'skill' => 'php',
    ],
    'stage4' => [
        'title_ar' => 'قواعد البيانات',
        'title_en' => 'Databases with PHP',
        'desc_ar'  => 'PDO, Prepared Statements, CRUD كامل، Transactions.',
        'desc_en'  => 'PDO, Prepared Statements, full CRUD, Transactions.',
        'stage' => 7, 'stage_title_ar' => 'MySQL و SQL', 'stage_title_en' => 'MySQL & SQL', 'skill' => 'mysql',
    ],
    'stage5' => [
        'title_ar' => 'بناء Backend منظم',
        'title_en' => 'Architecture (MVC & REST)',
        'desc_ar'  => 'MVC, Routing من الصفر, REST API, Authentication حقيقي.',
        'desc_en'  => 'MVC, Routing from scratch, REST API, real Authentication.',
        'stage' => 12, 'stage_title_ar' => 'بنية نظيفة و MVC', 'stage_title_en' => 'Clean Architecture & MVC', 'skill' => 'architecture',
    ],
    'stage6' => [
        'title_ar' => 'أدوات ومستوى احترافي',
        'title_en' => 'Professional Level',
        'desc_ar'  => 'Composer, .env, Logging, مقدمة Laravel, PHPUnit, Deployment.',
        'desc_en'  => 'Composer, .env, Logging, Laravel intro, PHPUnit, Deployment.',
        'stage' => 16, 'stage_title_ar' => 'النشر و DevOps', 'stage_title_en' => 'Deployment & DevOps Basics', 'skill' => 'deployment',
    ],
    'capstone' => [
        'title_ar' => 'مشروع التخرج',
        'title_en' => 'Capstone Project',
        'desc_ar'  => 'مشروع Backend كامل: Auth, CRUD, Database, API, أمان.',
        'desc_en'  => 'A full Backend project: Auth, CRUD, Database, API, security.',
        'stage' => 18, 'stage_title_ar' => 'المشاريع', 'stage_title_en' => 'Projects', 'skill' => 'architecture',
    ],

    // --- المسار الاحترافي: من "جاهز للشغل" لـ "محترف عالمي" ---
    'stage7' => [
        'title_ar' => 'أنماط التصميم والكود النظيف',
        'title_en' => 'Design Patterns & Clean Code',
        'desc_ar'  => 'SOLID, Dependency Injection, Repository, Factory, Strategy.',
        'desc_en'  => 'SOLID, Dependency Injection, Repository, Factory, Strategy.',
        'stage' => 12, 'stage_title_ar' => 'بنية نظيفة و MVC', 'stage_title_en' => 'Clean Architecture & MVC', 'skill' => 'architecture',
    ],
    'stage8' => [
        'title_ar' => 'اختبارات متقدمة وجودة الكود',
        'title_en' => 'Advanced Testing & Quality',
        'desc_ar'  => 'Unit vs Integration, Mocking, TDD, Static Analysis.',
        'desc_en'  => 'Unit vs Integration, Mocking, TDD, Static Analysis.',
        'stage' => 15, 'stage_title_ar' => 'اختبار، تصحيح، وأداء', 'stage_title_en' => 'Testing, Debugging & Performance', 'skill' => 'architecture',
    ],
    'stage9' => [
        'title_ar' => 'الأداء والتخزين المؤقت',
        'title_en' => 'Performance & Caching',
        'desc_ar'  => 'Redis/Memcached, Query Optimization, Queues, Profiling.',
        'desc_en'  => 'Redis/Memcached, Query Optimization, Queues, Profiling.',
        'stage' => 15, 'stage_title_ar' => 'اختبار، تصحيح، وأداء', 'stage_title_en' => 'Testing, Debugging & Performance', 'skill' => 'mysql',
    ],
    'stage10' => [
        'title_ar' => 'DevOps والنشر الاحترافي',
        'title_en' => 'DevOps & Deployment',
        'desc_ar'  => 'Docker, CI/CD Pipelines, Zero-downtime Deploys, Monitoring.',
        'desc_en'  => 'Docker, CI/CD Pipelines, Zero-downtime Deploys, Monitoring.',
        'stage' => 16, 'stage_title_ar' => 'النشر و DevOps', 'stage_title_en' => 'Deployment & DevOps Basics', 'skill' => 'deployment',
    ],
    'stage11' => [
        'title_ar' => 'تصميم الأنظمة لمهندسي الـ Backend',
        'title_en' => 'System Design for Backend Engineers',
        'desc_ar'  => 'Scalability, Load Balancing, Message Queues, API Gateway.',
        'desc_en'  => 'Scalability, Load Balancing, Message Queues, API Gateway.',
        'stage' => 17, 'stage_title_ar' => 'أساسيات تصميم الأنظمة', 'stage_title_en' => 'System Design Basics', 'skill' => 'architecture',
    ],
    'stage12' => [
        'title_ar' => 'الاستمرارية والاحتراف العالمي',
        'title_en' => 'Staying World-Class',
        'desc_ar'  => 'Open Source, قراءة كود الأطر, System Design Interviews.',
        'desc_en'  => 'Open Source, reading framework internals, System Design Interviews.',
        'stage' => 17, 'stage_title_ar' => 'أساسيات تصميم الأنظمة', 'stage_title_en' => 'System Design Basics', 'skill' => 'architecture',
    ],

    // ============================================================
    // NEW — Stage 8: Database Design (relationships, normalization, schema design)
    // ============================================================
    'db-relationships' => [
        'title_ar' => 'العلاقات بين الجداول',
        'title_en' => 'Table Relationships',
        'desc_ar'  => 'One-to-One, One-to-Many, Many-to-Many — وإزاي تعرف تختار الصح.',
        'desc_en'  => 'One-to-one, one-to-many, many-to-many — and how to know which one you need.',
        'stage' => 8, 'stage_title_ar' => 'تصميم قواعد البيانات', 'stage_title_en' => 'Database Design', 'skill' => 'mysql',
    ],
    'db-normalization' => [
        'title_ar' => 'التطبيع (Normalization)',
        'title_en' => 'Normalization',
        'desc_ar'  => 'ليه التكرار مشكلة، و1NF/2NF/3NF بمثال حقيقي خطوة بخطوة.',
        'desc_en'  => 'Why duplication is a problem, and 1NF/2NF/3NF through a real step-by-step example.',
        'stage' => 8, 'stage_title_ar' => 'تصميم قواعد البيانات', 'stage_title_en' => 'Database Design', 'skill' => 'mysql',
    ],
    'db-schema-design-lab' => [
        'title_ar' => '🗄️ معمل: صمّم Schema بلوج',
        'title_en' => '🗄️ Lab: Design a Blog Schema',
        'desc_ar'  => 'تصمّم Users/Posts/Comments/Categories بنفسك، وتختبر الـ Schema فعليًا في الـ SQL Playground.',
        'desc_en'  => 'Design Users/Posts/Comments/Categories yourself, and test the schema for real in the SQL Playground.',
        'stage' => 8, 'stage_title_ar' => 'تصميم قواعد البيانات', 'stage_title_en' => 'Database Design', 'skill' => 'mysql',
    ],

    // ============================================================
    // NEW — Stage 14: Security (mandatory, dedicated — was previously just a
    // subsection of stage3). Every lab uses REAL executable PHP.
    // ============================================================
    'security-sql-injection' => [
        'title_ar' => '🔐 معمل: SQL Injection',
        'title_en' => '🔐 Lab: SQL Injection',
        'desc_ar'  => 'كود حقيقي معرّض للاختراق، تشوف الهجوم بنفسك، وتصلحه بـ Prepared Statements.',
        'desc_en'  => 'Real vulnerable code, see the attack happen yourself, then fix it with Prepared Statements.',
        'stage' => 14, 'stage_title_ar' => 'الأمان', 'stage_title_en' => 'Security', 'skill' => 'security',
    ],
    'security-xss' => [
        'title_ar' => '🔐 معمل: XSS',
        'title_en' => '🔐 Lab: Cross-Site Scripting',
        'desc_ar'  => 'إزاي كود المستخدم بيتحول لـ JavaScript خبيث، والحل بـ htmlspecialchars().',
        'desc_en'  => 'How user input turns into malicious JavaScript, and the fix with htmlspecialchars().',
        'stage' => 14, 'stage_title_ar' => 'الأمان', 'stage_title_en' => 'Security', 'skill' => 'security',
    ],
    'security-csrf' => [
        'title_ar' => '🔐 معمل: CSRF',
        'title_en' => '🔐 Lab: CSRF',
        'desc_ar'  => 'إزاي موقع تاني يقدر ينفّذ إجراء باسمك، والحماية بـ CSRF Token.',
        'desc_en'  => 'How another site can perform an action as you, and protecting against it with a CSRF token.',
        'stage' => 14, 'stage_title_ar' => 'الأمان', 'stage_title_en' => 'Security', 'skill' => 'security',
    ],
    'security-passwords-sessions' => [
        'title_ar' => 'أمان كلمات المرور والجلسات',
        'title_en' => 'Password & Session Security',
        'desc_ar'  => 'password_hash/verify, Session Fixation, Session Regeneration, Secure Cookies.',
        'desc_en'  => 'password_hash/verify, session fixation, session regeneration, secure cookies.',
        'stage' => 14, 'stage_title_ar' => 'الأمان', 'stage_title_en' => 'Security', 'skill' => 'security',
    ],
    'security-file-upload' => [
        'title_ar' => 'أمان رفع الملفات',
        'title_en' => 'File Upload Security',
        'desc_ar'  => 'MIME Validation, Extension Validation, Random Filenames, أماكن التخزين الآمنة.',
        'desc_en'  => 'MIME validation, extension validation, random filenames, and safe storage locations.',
        'stage' => 14, 'stage_title_ar' => 'الأمان', 'stage_title_en' => 'Security', 'skill' => 'security',
    ],
    'security-validation-vs-sanitization' => [
        'title_ar' => 'Validation مقابل Sanitization',
        'title_en' => 'Validation vs Sanitization',
        'desc_ar'  => 'الفرق اللي كتير من المطورين بيلخبطوه — ومتى تحتاج كل واحد فيهم.',
        'desc_en'  => 'The distinction many developers confuse — and when you need each one.',
        'stage' => 14, 'stage_title_ar' => 'الأمان', 'stage_title_en' => 'Security', 'skill' => 'security',
    ],

    // ============================================================
    // NEW — Debugging Lab (part of Stage 15: Testing, Debugging & Performance)
    // ============================================================
    'debugging-lab' => [
        'title_ar' => '🐛 معمل التصحيح',
        'title_en' => '🐛 Debugging Lab',
        'desc_ar'  => '5 أنواع Bugs حقيقية (Syntax, Logic, Type, SQL, Validation) — تلاقيها، تفهمها، تصلحها، تختبرها.',
        'desc_en'  => '5 real bug types (syntax, logic, type, SQL, validation) — find, understand, fix, and test each one.',
        'stage' => 15, 'stage_title_ar' => 'اختبار، تصحيح، وأداء', 'stage_title_en' => 'Testing, Debugging & Performance', 'skill' => 'php',
    ],

    // ============================================================
    // NEW — Stage 18: Projects (progressive ladder). capstone.php above is
    // the Final Project; these are the earlier rungs.
    // ============================================================
    'project1-cli-calculator' => [
        'title_ar' => '🚀 مشروع 1: آلة حاسبة CLI',
        'title_en' => '🚀 Project 1: PHP CLI Calculator',
        'desc_ar'  => 'أول مشروع حقيقي — آلة حاسبة تشتغل من التيرمينال، تطبّق عليها فنكشنز ومعالجة أخطاء.',
        'desc_en'  => 'Your first real project — a calculator that runs from the terminal, applying functions and error handling.',
        'stage' => 18, 'stage_title_ar' => 'المشاريع', 'stage_title_en' => 'Projects', 'skill' => 'php',
    ],
    'project2-contact-form' => [
        'title_ar' => '🚀 مشروع 2: فورم تواصل',
        'title_en' => '🚀 Project 2: Contact Form',
        'desc_ar'  => 'فورم حقيقي بـ Validation كامل، حماية من الأخطاء الشائعة، ورسائل خطأ واضحة.',
        'desc_en'  => 'A real form with full validation, protection against common mistakes, and clear error messages.',
        'stage' => 18, 'stage_title_ar' => 'المشاريع', 'stage_title_en' => 'Projects', 'skill' => 'php',
    ],
    'project3-auth-system' => [
        'title_ar' => '🚀 مشروع 3: نظام تسجيل دخول',
        'title_en' => '🚀 Project 3: Authentication System',
        'desc_ar'  => 'Register/Login/Logout حقيقي بـ password_hash وSessions — بداية كل مشروع Backend فيه مستخدمين.',
        'desc_en'  => 'Real Register/Login/Logout with password_hash and Sessions — the start of every Backend project with users.',
        'stage' => 18, 'stage_title_ar' => 'المشاريع', 'stage_title_en' => 'Projects', 'skill' => 'security',
    ],

    // ============================================================
    // ROUND 2 — NEW: Stage 3 (PHP Intermediate)
    // ============================================================
    'array-string-functions' => [
        'title_ar' => 'دوال متقدمة على المصفوفات والنصوص',
        'title_en' => 'Advanced Array & String Functions',
        'desc_ar'  => 'array_reduce, usort, array_column, sprintf, وأشهر الدوال اللي بتوفّر عليك loops يدوية.',
        'desc_en'  => 'array_reduce, usort, array_column, sprintf, and the functions that save you manual loops.',
        'stage' => 3, 'stage_title_ar' => 'PHP متوسط', 'stage_title_en' => 'PHP Intermediate', 'skill' => 'php',
    ],
    'closures-callbacks' => [
        'title_ar' => 'Closures و Callbacks',
        'title_en' => 'Closures & Callbacks',
        'desc_ar'  => 'إزاي دالة "تتذكر" متغيرات من بيئتها بـ use()، ومتى تستخدم Callback بدل تكرار كود.',
        'desc_en'  => 'How a function "remembers" variables from its environment with use(), and when a callback beats duplicated code.',
        'stage' => 3, 'stage_title_ar' => 'PHP متوسط', 'stage_title_en' => 'PHP Intermediate', 'skill' => 'php',
    ],
    'type-declarations' => [
        'title_ar' => 'Type Declarations: Nullable و Union Types',
        'title_en' => 'Type Declarations: Nullable & Union Types',
        'desc_ar'  => '?string, int|string, وليه التصريح بالأنواع بيمنع فئة كاملة من الأخطاء بدري.',
        'desc_en'  => '?string, int|string, and why type declarations catch a whole class of bugs early.',
        'stage' => 3, 'stage_title_ar' => 'PHP متوسط', 'stage_title_en' => 'PHP Intermediate', 'skill' => 'php',
    ],
    'custom-exceptions' => [
        'title_ar' => 'استثناءات مخصصة',
        'title_en' => 'Custom Exceptions',
        'desc_ar'  => 'تبني هيكل Exceptions خاص بمشروعك بدل الاعتماد على رسائل عامة.',
        'desc_en'  => 'Building your own exception hierarchy instead of relying on generic messages.',
        'stage' => 3, 'stage_title_ar' => 'PHP متوسط', 'stage_title_en' => 'PHP Intermediate', 'skill' => 'php',
    ],
    'namespaces-autoloading' => [
        'title_ar' => 'Namespaces و Autoloading',
        'title_en' => 'Namespaces & Autoloading',
        'desc_ar'  => 'ليه محتاج Namespaces في مشروع فيه ملفات كتير، ومبدأ الـ Autoloading من غير Composer.',
        'desc_en'  => 'Why you need namespaces once a project has many files, and the idea behind autoloading without Composer.',
        'stage' => 3, 'stage_title_ar' => 'PHP متوسط', 'stage_title_en' => 'PHP Intermediate', 'skill' => 'php',
    ],

    // ============================================================
    // ROUND 2 — NEW: Stage 5 (Forms, Sessions & Cookies)
    // ============================================================
    'forms-registration-login' => [
        'title_ar' => 'بناء فورم تسجيل ودخول حقيقي',
        'title_en' => 'Building a Real Registration & Login Form',
        'desc_ar'  => 'من الـ HTML للـ $_POST لمنطق التحقق — فورم تسجيل كامل خطوة بخطوة.',
        'desc_en'  => 'From HTML to $_POST to validation logic — a complete registration form, step by step.',
        'stage' => 5, 'stage_title_ar' => 'الفورمات، الجلسات، والكوكيز', 'stage_title_en' => 'Forms, Sessions & Cookies', 'skill' => 'php',
    ],
    'sessions-basics' => [
        'title_ar' => 'الجلسات (Sessions)',
        'title_en' => 'Sessions',
        'desc_ar'  => '$_SESSION, session_start(), وإزاي السيرفر "بيفتكر" مستخدم عبر أكتر من طلب.',
        'desc_en'  => '$_SESSION, session_start(), and how the server "remembers" a user across multiple requests.',
        'stage' => 5, 'stage_title_ar' => 'الفورمات، الجلسات، والكوكيز', 'stage_title_en' => 'Forms, Sessions & Cookies', 'skill' => 'php',
    ],
    'cookies-basics' => [
        'title_ar' => 'الكوكيز (Cookies)',
        'title_en' => 'Cookies',
        'desc_ar'  => 'setcookie(), قراءة $_COOKIE، وحذف كوكي فعليًا.',
        'desc_en'  => 'setcookie(), reading $_COOKIE, and actually deleting a cookie.',
        'stage' => 5, 'stage_title_ar' => 'الفورمات، الجلسات، والكوكيز', 'stage_title_en' => 'Forms, Sessions & Cookies', 'skill' => 'php',
    ],
    'session-vs-cookie' => [
        'title_ar' => 'Session مقابل Cookie: امتى تستخدم كل واحدة',
        'title_en' => 'Session vs Cookie: When to Use Each',
        'desc_ar'  => 'مقارنة عملية: فين تتخزن البيانات، الأمان، والاستخدام النموذجي لكل واحدة.',
        'desc_en'  => 'A practical comparison: where data lives, security, and the typical use case for each.',
        'stage' => 5, 'stage_title_ar' => 'الفورمات، الجلسات، والكوكيز', 'stage_title_en' => 'Forms, Sessions & Cookies', 'skill' => 'php',
    ],

    // ============================================================
    // ROUND 2 — NEW: Stage 6 (Files, JSON & APIs)
    // ============================================================
    'file-handling-uploads' => [
        'title_ar' => 'التعامل مع الملفات والرفع',
        'title_en' => 'File Handling & Uploads',
        'desc_ar'  => 'fopen/fwrite/fread، و$_FILES، وأساسيات رفع ملف بأمان.',
        'desc_en'  => 'fopen/fwrite/fread, $_FILES, and the basics of a safe file upload.',
        'stage' => 6, 'stage_title_ar' => 'الملفات، JSON، والـ APIs', 'stage_title_en' => 'Files, JSON & APIs', 'skill' => 'php',
    ],
    'json-encode-decode' => [
        'title_ar' => 'JSON Encode و Decode',
        'title_en' => 'JSON Encode & Decode',
        'desc_ar'  => 'json_encode/json_decode، والفرق بين array وobject لما تفكّ JSON.',
        'desc_en'  => 'json_encode/json_decode, and the array-vs-object difference when decoding JSON.',
        'stage' => 6, 'stage_title_ar' => 'الملفات، JSON، والـ APIs', 'stage_title_en' => 'Files, JSON & APIs', 'skill' => 'apis',
    ],
    'consuming-external-apis' => [
        'title_ar' => 'استهلاك APIs خارجية',
        'title_en' => 'Consuming External APIs',
        'desc_ar'  => 'file_get_contents وcURL لطلب بيانات من API خارجي، ومعالجة أخطاء الشبكة.',
        'desc_en'  => 'file_get_contents and cURL to request data from an external API, and handling network errors.',
        'stage' => 6, 'stage_title_ar' => 'الملفات، JSON، والـ APIs', 'stage_title_en' => 'Files, JSON & APIs', 'skill' => 'apis',
    ],
    'json-notes-api-project' => [
        'title_ar' => '🚀 مشروع: JSON Notes API',
        'title_en' => '🚀 Project: JSON Notes API',
        'desc_ar'  => 'API صغير حقيقي لملاحظات مخزّنة في ملف JSON — CRUD كامل من غير قاعدة بيانات.',
        'desc_en'  => 'A real small API for notes stored in a JSON file — full CRUD without a database.',
        'stage' => 6, 'stage_title_ar' => 'الملفات، JSON، والـ APIs', 'stage_title_en' => 'Files, JSON & APIs', 'skill' => 'apis',
    ],

    // ============================================================
    // ROUND 2 — NEW: Stage 9 (CRUD Application — Task Management System)
    // ============================================================
    'crud-planning-setup' => [
        'title_ar' => 'تخطيط مشروع Task Management',
        'title_en' => 'Planning the Task Management Project',
        'desc_ar'  => 'المتطلبات، تصميم جداول Users/Tasks/Categories، وهيكل الملفات قبل أول سطر كود.',
        'desc_en'  => 'Requirements, designing the Users/Tasks/Categories tables, and file structure before the first line of code.',
        'stage' => 9, 'stage_title_ar' => 'تطبيق CRUD كامل', 'stage_title_en' => 'CRUD Application', 'skill' => 'mysql',
    ],
    'crud-create-read' => [
        'title_ar' => 'CRUD: Create و Read',
        'title_en' => 'CRUD: Create & Read',
        'desc_ar'  => 'إضافة Task جديدة وعرض القايمة — حقيقي بـ PDO ضد الـ Sandbox.',
        'desc_en'  => 'Adding a new task and listing them — real, with PDO against the sandbox.',
        'stage' => 9, 'stage_title_ar' => 'تطبيق CRUD كامل', 'stage_title_en' => 'CRUD Application', 'skill' => 'mysql',
    ],
    'crud-update-delete' => [
        'title_ar' => 'CRUD: Update و Delete',
        'title_en' => 'CRUD: Update & Delete',
        'desc_ar'  => 'تعديل حالة Task (خلصت/لسه) وحذفها — مع التأكد إن المستخدم بيعدّل مهامه هو بس.',
        'desc_en'  => 'Updating a task\'s status (done/pending) and deleting it — while making sure a user only edits their own tasks.',
        'stage' => 9, 'stage_title_ar' => 'تطبيق CRUD كامل', 'stage_title_en' => 'CRUD Application', 'skill' => 'mysql',
    ],
    'crud-search-filter-pagination' => [
        'title_ar' => 'بحث، فلترة، وترقيم الصفحات',
        'title_en' => 'Search, Filter & Pagination',
        'desc_ar'  => 'LIKE للبحث، WHERE للفلترة حسب الفئة، وLIMIT/OFFSET لتقسيم النتائج على صفحات.',
        'desc_en'  => 'LIKE for search, WHERE for filtering by category, and LIMIT/OFFSET to split results into pages.',
        'stage' => 9, 'stage_title_ar' => 'تطبيق CRUD كامل', 'stage_title_en' => 'CRUD Application', 'skill' => 'mysql',
    ],
    'crud-validation' => [
        'title_ar' => 'التحقق من صحة بيانات CRUD',
        'title_en' => 'CRUD Validation',
        'desc_ar'  => 'منع Task فاضية، تواريخ غلط، وفئات مش موجودة — قبل ما توصل لقاعدة البيانات أصلًا.',
        'desc_en'  => 'Preventing empty tasks, invalid dates, and non-existent categories — before they ever reach the database.',
        'stage' => 9, 'stage_title_ar' => 'تطبيق CRUD كامل', 'stage_title_en' => 'CRUD Application', 'skill' => 'mysql',
    ],

    // ============================================================
    // ROUND 2 — NEW: Stage 10 (Authentication & Authorization)
    // Builds on top of project3-auth-system.php's basic register/login.
    // ============================================================
    'auth-registration-deep-dive' => [
        'title_ar' => 'تسجيل مستخدم جديد بأمان — تعمّق',
        'title_en' => 'Secure Registration — a Deep Dive',
        'desc_ar'  => 'فحص إيميل مكرر، قوة كلمة المرور، وتأكيد الباسورد — أبعد من التسجيل الأساسي.',
        'desc_en'  => 'Duplicate-email checks, password strength, and password confirmation — beyond the basic register flow.',
        'stage' => 10, 'stage_title_ar' => 'المصادقة والتفويض', 'stage_title_en' => 'Authentication & Authorization', 'skill' => 'security',
    ],
    'auth-login-sessions' => [
        'title_ar' => 'تسجيل الدخول وربطه بالجلسة',
        'title_en' => 'Login & Wiring It to a Session',
        'desc_ar'  => 'بعد password_verify() الناجح، إزاي تحفظ هوية المستخدم في $_SESSION لباقي الطلبات.',
        'desc_en'  => 'After a successful password_verify(), how to store the user\'s identity in $_SESSION for the rest of their requests.',
        'stage' => 10, 'stage_title_ar' => 'المصادقة والتفويض', 'stage_title_en' => 'Authentication & Authorization', 'skill' => 'security',
    ],
    'auth-roles-permissions' => [
        'title_ar' => 'الأدوار والصلاحيات (Roles & Permissions)',
        'title_en' => 'Roles & Permissions',
        'desc_ar'  => 'من "مسجّل دخول؟" لـ "مسموحله يعمل إيه؟" — Authentication مقابل Authorization.',
        'desc_en'  => 'From "are you logged in?" to "what are you allowed to do?" — Authentication vs Authorization.',
        'stage' => 10, 'stage_title_ar' => 'المصادقة والتفويض', 'stage_title_en' => 'Authentication & Authorization', 'skill' => 'security',
    ],
    'auth-admin-user-dashboards' => [
        'title_ar' => '🚀 مشروع: لوحات تحكم Admin و User',
        'title_en' => '🚀 Project: Admin & User Dashboards',
        'desc_ar'  => 'صفحتين مختلفتين حسب الدور، وحماية صفحة الـ Admin من مستخدم عادي بيحاول يدخلها بالرابط المباشر.',
        'desc_en'  => 'Two different pages based on role, and protecting the admin page from a regular user hitting its URL directly.',
        'stage' => 10, 'stage_title_ar' => 'المصادقة والتفويض', 'stage_title_en' => 'Authentication & Authorization', 'skill' => 'security',
    ],

    // ============================================================
    // ROUND 2 — NEW: Stage 13 (REST API Development)
    // ============================================================
    'rest-principles' => [
        'title_ar' => 'مبادئ REST',
        'title_en' => 'REST Principles',
        'desc_ar'  => 'Resources، Endpoints، وHTTP Verbs — إزاي تصمم API يفهمه أي مطور من أول نظرة.',
        'desc_en'  => 'Resources, endpoints, and HTTP verbs — designing an API any developer understands at a glance.',
        'stage' => 13, 'stage_title_ar' => 'بناء REST API', 'stage_title_en' => 'REST API Development', 'skill' => 'apis',
    ],
    'rest-products-api-project' => [
        'title_ar' => '🚀 مشروع: REST API لمنتجات',
        'title_en' => '🚀 Project: A Products REST API',
        'desc_ar'  => 'GET/POST/PUT/DELETE حقيقيين على /api/products — الـ API الأول اللي تبنيه من الصفر.',
        'desc_en'  => 'Real GET/POST/PUT/DELETE on /api/products — the first API you build from scratch.',
        'stage' => 13, 'stage_title_ar' => 'بناء REST API', 'stage_title_en' => 'REST API Development', 'skill' => 'apis',
    ],
    'rest-pagination-filtering-sorting' => [
        'title_ar' => 'Pagination, Filtering, و Sorting في APIs',
        'title_en' => 'Pagination, Filtering & Sorting in APIs',
        'desc_ar'  => '?page=2&sort=price&category=books — إزاي تصمم Query Parameters نضيفة ومفيدة.',
        'desc_en'  => '?page=2&sort=price&category=books — designing clean, useful query parameters.',
        'stage' => 13, 'stage_title_ar' => 'بناء REST API', 'stage_title_en' => 'REST API Development', 'skill' => 'apis',
    ],
    'rest-error-responses' => [
        'title_ar' => 'استجابات الأخطاء في APIs',
        'title_en' => 'API Error Responses',
        'desc_ar'  => 'شكل موحّد لأي خطأ (404, 422, 500)، بدل رسائل مختلفة كل مرة.',
        'desc_en'  => 'A consistent shape for every error (404, 422, 500), instead of a different message every time.',
        'stage' => 13, 'stage_title_ar' => 'بناء REST API', 'stage_title_en' => 'REST API Development', 'skill' => 'apis',
    ],
    'rest-api-authentication-concepts' => [
        'title_ar' => 'مفاهيم مصادقة الـ API: Session, Token, JWT',
        'title_en' => 'API Authentication Concepts: Session, Token, JWT',
        'desc_ar'  => 'ليه API غالبًا بيحتاج طريقة مصادقة مختلفة عن موقع عادي، ومفهوم JWT من غير ما تستخدمه أعمى.',
        'desc_en'  => 'Why an API usually needs a different auth approach than a regular site, and the JWT concept before you ever use it blindly.',
        'stage' => 13, 'stage_title_ar' => 'بناء REST API', 'stage_title_en' => 'REST API Development', 'skill' => 'apis',
    ],
];
