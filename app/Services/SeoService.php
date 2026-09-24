<?php

namespace App\Services;

class SeoService
{
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
                'name' => 'Belajar Coding PHP & SQL Interaktif',
                'description' => 'Platform latihan interaktif PHP & SQL dari nol. Melatih logic, syntax, query database, array, OOP, dan arsitektur modular.',
                'provider' => [
                    '@type' => 'Person',
                    'name' => 'Bagas (Baprade)',
                    'url' => config('learn_seo.personal_site'),
                ],
                'hasCourseInstance' => [
                    '@type' => 'CourseInstance',
                    'courseMode' => 'online',
                ],
            ]
        ];

        if ($challenge) {
            $graph[] = [
                '@type' => 'LearningResource',
                '@id' => $baseUrl . 'challenge/' . $challenge['slug'] . '#resource',
                'name' => $challenge['title_id'],
                'description' => $challenge['summary_id'] ?? $challenge['title_id'],
                'learningResourceType' => 'Interactive Coding Exercise',
                'educationalLevel' => $challenge['difficulty'],
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
