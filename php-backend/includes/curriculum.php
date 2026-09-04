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
];
