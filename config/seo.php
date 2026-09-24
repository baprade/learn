<?php

return [
    'site_name' => env('SEO_SITE_NAME', 'Jasa Pembuatan Website by Bagas | Baprade'),
    'title' => env('SEO_TITLE', 'Web Development & Hyper Care Support | Bagas (Baprade)'),
    'description' => env('SEO_DESCRIPTION', 'Jasa pembuatan website & web app custom pake Laravel SSR berstandar SOLID Principles. Experience membangun portal enterprise KAKAP CSIRT & internal web apps.'),
    'keywords' => env('SEO_KEYWORDS', 'jasa pembuatan website, web developer indonesia, web developer apac, laravel ssr development, bagas web developer, baprade, kakap csirt, solid principles, proprietary web app'),
    'canonical_url' => env('APP_URL', 'https://jasa.baprade.my.id/'),
    'personal_site' => 'https://www.baprade.my.id/',
    'kakap_csirt_site' => 'https://kakap-csirt.plecoenergy.co.id/',
    'og_image' => env('SEO_OG_IMAGE', 'https://jasa.baprade.my.id/images/og-image.jpg'),
    'author' => 'Bagas (Baprade)',
    'whatsapp' => env('CONTACT_WHATSAPP', '6281283141448'),
    'email' => env('CONTACT_EMAIL', 'bagasprastad@gmail.com'),
    'address' => [
        'city' => env('CONTACT_CITY', 'Jabodetabek'),
        'country' => 'Indonesia (Open for APAC Region)',
    ],
    'socials' => [
        'instagram' => 'https://instagram.com/baprade',
        'github' => 'https://github.com/baprade',
        'linkedin' => 'https://linkedin.com/in/baprade',
    ],
    'services' => [
        [
            'id' => 'landing',
            'icon' => 'zap',
            'title_id' => 'Landing Page High Conversion',
            'title_en' => 'High-Converting Landing Page',
            'desc_id' => 'Which is super clean, fast, & effortless. Cocok banget buat narik leads atau Meta & Google Ads.',
            'desc_en' => 'Sleek, fast, & conversion-focused. Perfect for campaign launches, leads generation, and paid ads.',
        ],
        [
            'id' => 'company',
            'icon' => 'building',
            'title_id' => 'Company Profile & Enterprise Web',
            'title_en' => 'Corporate & Enterprise Web Profile',
            'desc_id' => 'Tampilan profil bisnis & portal perusahaan profesional berarsitektur SOLID biar client makin confident.',
            'desc_en' => 'Professional web presence built on SOLID principles to build authority for global & enterprise clients.',
        ],
        [
            'id' => 'custom',
            'icon' => 'code-2',
            'title_id' => 'Custom Web App Laravel SSR (SOLID)',
            'title_en' => 'Custom Web App (Laravel SSR & SOLID)',
            'desc_id' => 'Sistem kustom pake Laravel SSR & SOLID Principles. Bebas request fitur rumit & arsitektur enterprise.',
            'desc_en' => 'Enterprise web applications built on Laravel SSR and SOLID code structure for maximum scalability.',
        ],
        [
            'id' => 'support',
            'icon' => 'shield-check',
            'title_id' => '3 Months Free Hyper Care Support',
            'title_en' => '3 Months Free Hyper Care Support',
            'desc_id' => 'Honestly gausah worry. Free 3 bulan monitoring, backup, security patch, & full cPanel/DB access on request.',
            'desc_en' => 'Completely risk-free with 3 months of complimentary monitoring, backups, patches, & full cPanel/DB access on request.',
        ],
    ],
];
