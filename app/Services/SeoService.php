<?php

/**
 * Built by Bagas (Baprade)
 * Day 2: God-Level SEO Structured Data Generator (Course, LearningResource, TechArticle) - 27 Jul 2026
 */

namespace App\Services;

class SeoService
{
    /**
     * Generate Schema.org JSON-LD structured data for Learn Baprade.
     *
     * @param array|null $challenge
     * @return string
     */
    public function generateJsonLd(?array $challenge = null): string
    {
        $baseUrl = config('learn_seo.canonical_url', 'https://learn.baprade.my.id/');

        $graph = [
            [
                '@type' => 'WebSite',
                '@id' => $baseUrl . '#website',
                'url' => $baseUrl,
                'name' => config('learn_seo.site_name'),
                'description' => config('learn_seo.description'),
                'inLanguage' => ['id-ID', 'en-US'],
            ],
            [
                '@type' => 'Course',
                '@id' => $baseUrl . '#course',
                'name' => 'Belajar Coding PHP Pemula & Interactive Code Sandbox',
                'description' => 'Kursus & platform latihan belajar coding PHP pemula terlengkap secara gratis dari nol. Melatih logic, syntax, array, OOP, dan SOLID principles.',
                'provider' => [
                    '@type' => 'Person',
                    'name' => 'Bagas (Baprade)',
                    'url' => config('learn_seo.personal_site'),
                ],
                'hasCourseInstance' => [
                    '@type' => 'CourseInstance',
                    'courseMode' => 'online',
                    'courseWorkload' => 'PT10H',
                ],
            ]
        ];

        if ($challenge) {
            $graph[] = [
                '@type' => 'LearningResource',
                '@id' => $baseUrl . 'challenge/' . $challenge['slug'] . '#resource',
                'name' => $challenge['title_id'] . ' - Belajar Coding PHP Pemula',
                'description' => $challenge['description_id'],
                'learningResourceType' => 'Interactive Coding Exercise',
                'educationalLevel' => $challenge['difficulty'],
                'educationalUse' => 'Practice Coding',
                'inLanguage' => 'id-ID',
                'author' => [
                    '@type' => 'Person',
                    'name' => 'Bagas (Baprade)',
                    'url' => config('learn_seo.personal_site'),
                ]
            ];
        }

        return json_encode([
            '@context' => 'https://schema.org',
            '@graph' => $graph,
        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }
}
