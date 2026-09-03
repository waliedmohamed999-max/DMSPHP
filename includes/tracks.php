<?php
// Registry of learning tracks shown on the Sila home page, grouped by 'section'.
// To add a new track later: drop its lesson tool in its own folder,
// then add one entry here — the home page picks it up automatically.

$phpCurriculum = require __DIR__ . '/../php-backend/includes/curriculum.php';
$fundamentalsCurriculum = require __DIR__ . '/../fundamentals/includes/curriculum.php';
$frontendCurriculum = require __DIR__ . '/../frontend/includes/curriculum.php';
$fullstackCurriculum = require __DIR__ . '/../fullstack/includes/curriculum.php';
$pythonCurriculum = require __DIR__ . '/../python-web/includes/curriculum.php';
$aiToolsCurriculum = require __DIR__ . '/../ai-tools/includes/curriculum.php';
$marketingCurriculum = require __DIR__ . '/../digital-marketing/includes/curriculum.php';
$dataCurriculum = require __DIR__ . '/../data-analysis/includes/curriculum.php';
$uxCurriculum = require __DIR__ . '/../ui-ux-design/includes/curriculum.php';
$graphicCurriculum = require __DIR__ . '/../graphic-design/includes/curriculum.php';

return [
    // --- قسم البرمجة / Programming ---
    [
        'key'         => 'fundamentals',
        'section'     => 'programming',
        'icon'        => '🧩',
        'title_ar'    => 'مسار أساسيات البرمجة',
        'title_en'    => 'Programming Fundamentals',
        'tagline_ar'  => 'التأسيس قبل ما تختار مسارك',
        'tagline_en'  => 'Foundations before you pick a track',
        'desc_ar'     => 'التفكير المنطقي وحل المشكلات، وأساسيات البرمجة المستقلة عن أي مجال معيّن — نقطة انطلاق قبل ما تختار تخصصك، من غير أي خبرة سابقة.',
        'stage_count' => count($fundamentalsCurriculum),
        'status'      => 'available',
        'url'         => 'fundamentals/index.php',
    ],
    [
        'key'         => 'frontend',
        'section'     => 'programming',
        'icon'        => '🎨',
        'title_ar'    => 'مسار Front-End Developer',
        'title_en'    => 'Front-End Developer',
        'tagline_ar'  => 'استعد للإبحار في رحلة التعلم',
        'tagline_en'  => 'Get ready to set sail',
        'desc_ar'     => 'HTML, CSS, JavaScript، وصولاً لأطر العمل الحديثة (Bootstrap, Tailwind, Vue) وأدوات الاحتراف زي SASS وGulp.',
        'stage_count' => count($frontendCurriculum),
        'status'      => 'available',
        'url'         => 'frontend/index.php',
    ],
    [
        'key'         => 'php-backend',
        'section'     => 'programming',
        'icon'        => '🐘',
        'title_ar'    => 'مسار الـ PHP Back-End Developer',
        'title_en'    => 'PHP Back-End Developer',
        'tagline_ar'  => 'من الصفر إلى الاحتراف العالمي',
        'tagline_en'  => 'From zero to world-class',
        'desc_ar'     => 'منهج كامل بالتنفيذ الفعلي: HTML، أساسيات اللغة، OOP، قواعد بيانات، بنية Backend منظمة (MVC/REST)، وصولاً لمسار احترافي: Design Patterns, اختبارات, أداء, DevOps, وSystem Design.',
        'stage_count' => count($phpCurriculum),
        'status'      => 'available',
        'url'         => 'php-backend/index.php',
    ],
    [
        'key'         => 'ai-tools',
        'section'     => 'programming',
        'icon'        => '🤖',
        'title_ar'    => 'مسار أدوات الذكاء الاصطناعي',
        'title_en'    => 'AI Tools',
        'tagline_ar'  => 'استخدمها كمساعد، مش بديل عن الفهم',
        'tagline_en'  => 'Use them as an assistant, not a shortcut',
        'desc_ar'     => 'أربع أدوات ذكاء اصطناعي (Claude, ChatGPT, Gemini, GitHub Copilot)، كل واحدة بأسلوبها ونقاط قوتها، وإزاي تستخدمها بفعالية في رحلة تعلّمك.',
        'stage_count' => count($aiToolsCurriculum),
        'status'      => 'available',
        'url'         => 'ai-tools/index.php',
    ],
    [
        'key'         => 'fullstack',
        'section'     => 'programming',
        'icon'        => '🧱',
        'title_ar'    => 'مسار Full Stack Developer',
        'title_en'    => 'Full Stack Developer',
        'tagline_ar'  => 'Front-End + Back-End في مسار واحد',
        'tagline_en'  => 'Front-End + Back-End in one track',
        'desc_ar'     => 'دمج مسارات الـ Front-End والـ PHP Back-End في مسار واحد متكامل، مع مشاريع تطبيقية (Contact Form, Online Store) تجمع بينهم.',
        'stage_count' => count($fullstackCurriculum),
        'status'      => 'available',
        'url'         => 'fullstack/index.php',
    ],
    [
        'key'         => 'python-web',
        'section'     => 'programming',
        'icon'        => '🐍',
        'title_ar'    => 'مسار Python Web Developer',
        'title_en'    => 'Python Web Developer',
        'tagline_ar'  => 'أساسيات بايثون بتنفيذ فعلي',
        'tagline_en'  => 'Python fundamentals with real execution',
        'desc_ar'     => 'أساسيات بايثون بالتنفيذ الفعلي، ثم بناء تطبيقات ويب حقيقية بفريمووركات زي Django وFlask.',
        'stage_count' => count($pythonCurriculum),
        'status'      => 'available',
        'url'         => 'python-web/index.php',
    ],

    // --- قسم المهارات الرقمية / Digital Skills ---
    [
        'key'         => 'digital-marketing',
        'section'     => 'digital',
        'icon'        => '📣',
        'title_ar'    => 'مسار التسويق الإلكتروني',
        'title_en'    => 'Digital Marketing',
        'tagline_ar'  => 'من الصفر لخطة تسويق حقيقية',
        'tagline_en'  => 'From zero to a real marketing plan',
        'desc_ar'     => 'SEO، تسويق المحتوى والسوشيال ميديا، الإعلانات المدفوعة، التحليلات، والكتابة الإعلانية — أساس أي عمل تسويقي حقيقي.',
        'stage_count' => count($marketingCurriculum),
        'status'      => 'available',
        'url'         => 'digital-marketing/index.php',
    ],
    [
        'key'         => 'data-analysis',
        'section'     => 'digital',
        'icon'        => '📊',
        'title_ar'    => 'مسار تحليل البيانات',
        'title_en'    => 'Data Analysis',
        'tagline_ar'  => 'بيانات حقيقية، تحليل فعلي',
        'tagline_en'  => 'Real data, real analysis',
        'desc_ar'     => 'Python وPandas لتنظيف وتحليل البيانات، تصور بياني حقيقي، أساسيات الإحصاء، وSQL — كل ده بالتنفيذ الفعلي.',
        'stage_count' => count($dataCurriculum),
        'status'      => 'available',
        'url'         => 'data-analysis/index.php',
    ],
    [
        'key'         => 'ui-ux-design',
        'section'     => 'digital',
        'icon'        => '🧭',
        'title_ar'    => 'مسار تصميم UX/UI',
        'title_en'    => 'UI/UX Design',
        'tagline_ar'  => 'صمم واجهات الناس تفهمها من غير تفكير',
        'tagline_en'  => 'Design interfaces people understand instantly',
        'desc_ar'     => 'الفرق بين UX وUI، مبادئ التصميم، نظرية الألوان، الطباعة، الـ Wireframing، واختبار قابلية الاستخدام.',
        'stage_count' => count($uxCurriculum),
        'status'      => 'available',
        'url'         => 'ui-ux-design/index.php',
    ],
    [
        'key'         => 'graphic-design',
        'section'     => 'digital',
        'icon'        => '🖌️',
        'title_ar'    => 'مسار التصميم الجرافيكي',
        'title_en'    => 'Graphic Design',
        'tagline_ar'  => 'من عناصر التصميم للهوية البصرية',
        'tagline_en'  => 'From design elements to brand identity',
        'desc_ar'     => 'عناصر التصميم، نظرية الألوان والطباعة، أدوات التصميم (Canva/Photoshop/Illustrator)، وبناء هوية بصرية كاملة.',
        'stage_count' => count($graphicCurriculum),
        'status'      => 'available',
        'url'         => 'graphic-design/index.php',
    ],
];
