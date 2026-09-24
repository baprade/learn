<?php

/**
 * Built by Bagas (Baprade)
 * Day 2: Learn Controller & Challenge Evaluator Routes - 27 Jul 2026
 */

namespace App\Http\Controllers;

use App\Services\ChallengeService;
use App\Services\CodeEvaluatorService;
use App\Services\SeoService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LearnController extends Controller
{
    protected ChallengeService $challengeService;
    protected CodeEvaluatorService $evaluatorService;
    protected SeoService $seoService;

    /**
     * Constructor Dependency Injection following SOLID principles.
     */
    public function __construct(
        ChallengeService $challengeService,
        CodeEvaluatorService $evaluatorService,
        SeoService $seoService
    ) {
        $this->challengeService = $challengeService;
        $this->evaluatorService = $evaluatorService;
        $this->seoService = $seoService;
    }

    /**
     * Display main learning platform home page with challenge listing (Public preview allowed).
     */
    public function index()
    {
        $seo = config('learn_seo');
        $challenges = $this->challengeService->getAll();
        $jsonLd = $this->seoService->generateJsonLd();

        return view('index', compact('seo', 'challenges', 'jsonLd'));
    }

    /**
     * Display individual interactive challenge page (Public preview allowed).
     *
     * @param string $slug
     */
    public function show(string $slug)
    {
        $seo = config('learn_seo');
        $challenge = $this->challengeService->findBySlug($slug);

        if (!$challenge) {
            abort(404, 'Challenge tidak ditemukan.');
        }

        $jsonLd = $this->seoService->generateJsonLd($challenge);

        return view('challenge', compact('seo', 'challenge', 'jsonLd'));
    }

    /**
     * Run and evaluate user code submission via POST API endpoint (Google SSO Login Required).
     *
     * @param Request $request
     * @param string $slug
     */
    public function evaluate(Request $request, string $slug)
    {
        // 1. Google SSO Authentication Guard for Code Execution
        if (!Auth::check()) {
            return response()->json([
                'status' => 'unauthenticated',
                'message' => 'Silakan Login dengan Google terlebih dahulu untuk mengeksekusi & menguji kodingan kamu.',
                'passed_count' => 0,
                'total_count' => 0,
                'results' => [],
                'execution_time_ms' => 0,
            ], 401);
        }

        try {
            $validated = $request->validate([
                'code' => 'required|string|max:5000',
            ]);

            $challenge = $this->challengeService->findBySlug($slug);

            if (!$challenge) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Challenge tidak ditemukan.',
                    'passed_count' => 0,
                    'total_count' => 0,
                    'results' => [],
                    'execution_time_ms' => 0,
                ], 404);
            }

            $evaluation = $this->evaluatorService->evaluate($validated['code'], $challenge['test_cases']);

            return response()->json($evaluation);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Kodingan tidak boleh kosong (maksimal 5000 karakter).',
                'passed_count' => 0,
                'total_count' => 0,
                'results' => [],
                'execution_time_ms' => 0,
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Terjadi kesalahan sistem: ' . $e->getMessage(),
                'passed_count' => 0,
                'total_count' => 0,
                'results' => [],
                'execution_time_ms' => 0,
            ]);
        }
    }

    /**
     * Generate dynamic sitemap.xml for learn.baprade.my.id.
     */
    public function sitemap()
    {
        $baseUrl = config('learn_seo.canonical_url', 'https://learn.baprade.my.id/');
        $now = now()->toAtomString();
        $challenges = $this->challengeService->getAll();

        $xml = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">';
        
        // Homepage URL
        $xml .= '<url>';
        $xml .= '<loc>' . htmlspecialchars($baseUrl) . '</loc>';
        $xml .= '<lastmod>' . $now . '</lastmod>';
        $xml .= '<changefreq>daily</changefreq>';
        $xml .= '<priority>1.0</priority>';
        $xml .= '</url>';

        // Challenge URLs
        foreach ($challenges as $ch) {
            $xml .= '<url>';
            $xml .= '<loc>' . htmlspecialchars(rtrim($baseUrl, '/') . '/challenge/' . $ch['slug']) . '</loc>';
            $xml .= '<lastmod>' . $now . '</lastmod>';
            $xml .= '<changefreq>weekly</changefreq>';
            $xml .= '<priority>0.8</priority>';
            $xml .= '</url>';
        }

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
        $baseUrl = config('learn_seo.canonical_url', 'https://learn.baprade.my.id/');
        $content = "User-agent: *\nAllow: /\n\nSitemap: " . rtrim($baseUrl, '/') . "/sitemap.xml\n";

        return response($content, 200, [
            'Content-Type' => 'text/plain',
        ]);
    }
}
