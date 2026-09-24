<?php

/**
 * Built by Bagas (Baprade)
 * Day 2: Multilingual Support & SOLID Controller Separation - 27 Jul 2026
 */

namespace App\Http\Controllers;

use App\Services\LandingDataService;
use App\Services\WhatsAppService;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    protected LandingDataService $dataService;
    protected WhatsAppService $waService;

    /**
     * Dependency Injection following SOLID principles (DIP & SRP).
     */
    public function __construct(LandingDataService $dataService, WhatsAppService $waService)
    {
        $this->dataService = $dataService;
        $this->waService = $waService;
    }

    /**
     * Display the Single Page landing page with bilingual ID/EN Jaksel & APAC support.
     */
    public function index()
    {
        $seo = config('seo');
        $featuredProject = $this->dataService->getFeaturedProject();
        $hyperCareFeatures = $this->dataService->getHyperCareFeatures();
        $faqs = $this->dataService->getFaqs();

        // Construct JSON-LD Schema (PRIVACY PROTECTED: No raw phone number exposed to search crawlers)
        $graph = [
            [
                '@type' => 'ProfessionalService',
                '@id' => config('seo.canonical_url') . '#organization',
                'name' => config('seo.site_name'),
                'url' => config('seo.canonical_url'),
                'image' => config('seo.og_image'),
                'description' => config('seo.description'),
                'email' => config('seo.email'),
                'address' => [
                    '@type' => 'PostalAddress',
                    'addressLocality' => config('seo.address.city'),
                    'addressCountry' => 'ID',
                ],
                'sameAs' => array_merge(
                    array_values(config('seo.socials', [])),
                    [config('seo.personal_site'), config('seo.kakap_csirt_site')]
                ),
            ],
            [
                '@type' => 'WebSite',
                '@id' => config('seo.canonical_url') . '#website',
                'url' => config('seo.canonical_url'),
                'name' => config('seo.site_name'),
                'publisher' => [
                    '@id' => config('seo.canonical_url') . '#organization',
                ],
                'inLanguage' => ['id-ID', 'en-US'],
            ],
        ];

        $jsonLd = json_encode([
            '@context' => 'https://schema.org',
            '@graph' => $graph,
        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

        return view('landing', compact('seo', 'faqs', 'hyperCareFeatures', 'featuredProject', 'jsonLd'));
    }

    /**
     * Generate dynamic sitemap.xml.
     */
    public function sitemap()
    {
        $baseUrl = config('seo.canonical_url', 'https://jasa.baprade.my.id/');
        $now = now()->toAtomString();

        $xml = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">';
        $xml .= '<url>';
        $xml .= '<loc>' . htmlspecialchars($baseUrl) . '</loc>';
        $xml .= '<lastmod>' . $now . '</lastmod>';
        $xml .= '<changefreq>weekly</changefreq>';
        $xml .= '<priority>1.0</priority>';
        $xml .= '</url>';
        $xml .= '</urlset>';

        return response($xml, 200, [
            'Content-Type' => 'application/xml',
        ]);
    }

    /**
     * Generate dynamic robots.txt.
     */
    public function robots()
    {
        $baseUrl = config('seo.canonical_url', 'https://jasa.baprade.my.id/');
        $content = "User-agent: *\nAllow: /\n\nSitemap: " . rtrim($baseUrl, '/') . "/sitemap.xml\n";

        return response($content, 200, [
            'Content-Type' => 'text/plain',
        ]);
    }

    /**
     * Handle contact form submission and redirect to WhatsApp dynamically.
     */
    public function sendContact(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:100',
            'email' => 'nullable|email|max:100',
            'layanan' => 'required|string',
            'pesan' => 'required|string|max:1000',
        ]);

        $text = "Halo Bagas, mau diskusi project / web development nih:\n\n";
        $text .= "Nama / Name: " . $validated['nama'] . "\n";
        if (!empty($validated['email'])) {
            $text .= "Email: " . $validated['email'] . "\n";
        }
        $text .= "Kebutuhan / Service: " . $validated['layanan'] . "\n";
        $text .= "Pesan / Brief: " . $validated['pesan'] . "\n\n";
        $text .= "Let's connect & discuss via WhatsApp!";

        $redirectUrl = $this->waService->buildUrl($text);

        if ($request->wantsJson()) {
            return response()->json([
                'status' => 'success',
                'redirect_url' => $redirectUrl,
            ]);
        }

        return redirect()->away($redirectUrl);
    }
}
