<?php

/**
 * Built by Bagas (Baprade)
 * Day 1: Base Data Services & Structured FAQ Array - 26 Jul 2026
 */

namespace App\Services;

class LandingDataService
{
    /**
     * Get Featured Enterprise Project data.
     */
    public function getFeaturedProject(): array
    {
        return [
            'name' => 'KAKAP CSIRT (Computer Security Incident Response Team)',
            'url' => 'https://kakap-csirt.plecoenergy.co.id/',
            'type_id' => 'Enterprise Security System & Incident Response',
            'type_en' => 'Enterprise Security System & Incident Response',
            'desc_id' => 'Sistem resmi Computer Security Incident Response Team untuk penanganan dan pencegahan insiden siber enterprise. Dibangun dengan standar arsitektur SOLID tinggi & keamanan ketat.',
            'desc_en' => 'Official Computer Security Incident Response Team system engineered for enterprise threat prevention, security advisories, and incident management.',
            'highlights_id' => ['Arsitektur SOLID', 'Security Hardened', 'High Availability', 'Enterprise Level'],
            'highlights_en' => ['SOLID Architecture', 'Security Hardened', 'High Availability', 'Enterprise Grade'],
        ];
    }

    /**
     * Get Hyper Care features list.
     */
    public function getHyperCareFeatures(): array
    {
        return [
            [
                'title_id' => 'Monitoring & Bugfix Kilat',
                'title_en' => '24/7 Monitoring & Rapid Bugfix',
                'category_id' => 'Hyper Care 3 Bulan',
                'category_en' => '3 Months Hyper Care',
                'desc_id' => 'If something goes wrong, basically tinggal hit WhatsApp aja. Fast response & langsung di-fix on the spot.',
                'desc_en' => 'Should any issue arise, simply reach out via WhatsApp for rapid on-the-spot technical resolution.',
                'icon' => 'shield-check',
                'highlights_id' => ['Respon WA Fast', 'Garansi Anti Down', 'Patch Security'],
                'highlights_en' => ['Fast WA Response', 'Uptime Guarantee', 'Security Patches'],
            ],
            [
                'title_id' => 'Backup Data & Cloud Restore',
                'title_en' => 'Automated Backup & Cloud Restore',
                'category_id' => 'Keamanan Aset',
                'category_en' => 'Asset Security',
                'desc_id' => 'Database & seluruh source code kamu dibackup rutin. Literally aset digital kamu safe & sound.',
                'desc_en' => 'Automated cloud backups for database and source files, ensuring your digital assets remain safe.',
                'icon' => 'database',
                'highlights_id' => ['Cloud Backup', 'Restore Instan', 'Data Protection'],
                'highlights_en' => ['Cloud Backups', 'Instant Restore', 'Data Integrity'],
            ],
            [
                'title_id' => 'Akses cPanel & Database Request',
                'title_en' => 'cPanel & Database Access on Request',
                'category_id' => 'Transparansi Full',
                'category_en' => '100% Transparency',
                'desc_id' => 'Honestly ga dikunci-kunci. Kalo kamu request/butuh akses cPanel, Hosting, atau Database langsung diserahin full.',
                'desc_en' => 'No lock-ins. Full access credentials to cPanel, Hosting server, and Database are granted upon your request.',
                'icon' => 'key',
                'highlights_id' => ['Akses cPanel Full', 'Database Credential', 'Bebas Lock-in'],
                'highlights_en' => ['Full cPanel Access', 'Database Credentials', 'Zero Vendor Lock-in'],
            ],
            [
                'title_id' => 'Setup Domain & Minor Updates',
                'title_en' => 'Domain Setup & Content Support',
                'category_id' => 'Dukungan Teknis',
                'category_en' => 'Technical Support',
                'desc_id' => 'Bantu setup domain, SSL, DNS, sampe ganti text/gambar ringan so far effortless banget.',
                'desc_en' => 'Full assistance with domain configuration, SSL certificates, DNS setup, and minor content updates.',
                'icon' => 'headset',
                'highlights_id' => ['Setup Domain & SSL', 'Revisi Konten Ringan', 'Konsultasi Free'],
                'highlights_en' => ['Domain & SSL Setup', 'Minor Copy Adjustments', 'Free Consultation'],
            ],
        ];
    }

    /**
     * Get FAQs list.
     */
    public function getFaqs(): array
    {
        return [
            [
                'q_id' => 'Gimana standar arsitektur kodingan yang dipake Bagas (SOLID Principles)?',
                'q_en' => 'What code architecture standards do you follow (SOLID Principles)?',
                'a_id' => 'Honestly gw ngedepanin prinsip SOLID (Single Responsibility, Open-Closed, Liskov, Interface Segregation, & Dependency Inversion). Kodingan jadi super rapi, modular, gampang di-maintain, & tidak berantakan.',
                'a_en' => 'Every application is written adhering strictly to SOLID Principles. This guarantees maintainable, modular, clean, and extensible code structure.'
            ],
            [
                'q_id' => 'Kenapa aplikasi internal & web kantor tidak semuanya di-publish di public GitHub?',
                'q_en' => 'Why aren\'t all enterprise internal applications published on public GitHub?',
                'a_id' => 'Because project enterprise, sistem kantor internal, & sistem keamanan siber (seperti KAKAP CSIRT) sifatnya proprietary license & terikat NDA ketat demi menjaga kerahasiaan data & keamanan infrastruktur klien.',
                'a_en' => 'Enterprise-grade internal applications and cybersecurity platforms (such as KAKAP CSIRT) operate under proprietary licensing and strict NDAs to protect sensitive infrastructure and data.'
            ],
            [
                'q_id' => 'Bisa dapet akses cPanel atau Database langsung ga bro?',
                'q_en' => 'Can I request full cPanel and Database access for my project?',
                'a_id' => 'Bisa banget! Honestly gw ga pernah ngunci-ngunci akses aset client. Kalo kamu butuh/request kredensial cPanel, Hosting, atau Database, langsung diserahin full buat kamu.',
                'a_en' => 'Yes, absolutely. I practice zero vendor lock-in. Full access credentials for your cPanel, Hosting server, and Database are delivered directly to you upon request.'
            ],
            [
                'q_id' => 'Gimana alur kerjanya which is kalo mau mulai project bro?',
                'q_en' => 'How does the workflow work if I want to initiate a project?',
                'a_id' => 'Basically simple banget bro! Tinggal kirim pesan via WA, spill kebutuhan/brief web kamu, and then gw langsung eksekusi kodingannya.',
                'a_en' => 'It is straightforward! Contact me directly via WhatsApp, share your project requirements, and we will initiate development right away.'
            ],
            [
                'q_id' => 'What is Free 3 Months Hyper Care Support literally?',
                'q_en' => 'What is included in the Free 3 Months Hyper Care Support?',
                'a_id' => 'So far, beres launch web kamu ga ditinggal gitu aja. Gw jagain 3 bulan free buat backup data, security patch, bugfix, & maintenance ringan.',
                'a_en' => 'You receive 3 full months of complimentary post-launch support covering performance monitoring, cloud backups, security updates, and technical maintenance.'
            ],
            [
                'q_id' => 'Bisa liat track record or experience Bagas di mana bro?',
                'q_en' => 'Where can I review Bagas\' experience and track record?',
                'a_id' => 'Kamu bisa visit website personal gw at https://www.baprade.my.id/ dan cek sistem live enterprise KAKAP CSIRT di https://kakap-csirt.plecoenergy.co.id/',
                'a_en' => 'You can explore my full professional experience on my personal site at https://www.baprade.my.id/ and inspect the live enterprise system KAKAP CSIRT at https://kakap-csirt.plecoenergy.co.id/'
            ],
        ];
    }
}
