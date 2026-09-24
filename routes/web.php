<?php

/**
 * Built by Bagas (Baprade)
 * Day 1: Learn Baprade Routing & SSO Auth Endpoints - 26 Jul 2026
 */

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LearnController;
use App\Http\Controllers\AuthController;

// Main Learning Platform Dashboard (Public preview)
Route::get('/', [LearnController::class, 'index'])->name('home');

// Interactive Challenge Workspace (Public preview)
Route::get('/challenge/{slug}', [LearnController::class, 'show'])->name('challenge.show');

// Dynamic Code Execution & Test Case Evaluator Endpoint
Route::post('/challenge/{slug}/run', [LearnController::class, 'evaluate'])->name('challenge.run');

// Google SSO Authentication Routes
Route::get('/auth/google', [AuthController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('/auth/google/callback', [AuthController::class, 'handleGoogleCallback'])->name('auth.google.callback');
Route::get('/auth/demo-login', [AuthController::class, 'devLogin'])->name('auth.demo');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// SEO Utilities
Route::get('/sitemap.xml', [LearnController::class, 'sitemap'])->name('sitemap');
Route::get('/robots.txt', [LearnController::class, 'robots'])->name('robots');
