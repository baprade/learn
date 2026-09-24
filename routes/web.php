<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LearnController;
use App\Http\Controllers\AuthController;

Route::get('/', [LearnController::class, 'index'])->name('home');
Route::get('/challenge/{slug}', [LearnController::class, 'show'])->name('challenge.show');
Route::post('/challenge/{slug}/run', [LearnController::class, 'evaluate'])->name('challenge.run');

// Google SSO Authentication
Route::get('/auth/google', [AuthController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('/auth/google/callback', [AuthController::class, 'handleGoogleCallback'])->name('auth.google.callback');
Route::get('/auth/demo-login', [AuthController::class, 'devLogin'])->name('auth.demo');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// SEO
Route::get('/sitemap.xml', [LearnController::class, 'sitemap'])->name('sitemap');
Route::get('/robots.txt', [LearnController::class, 'robots'])->name('robots');
