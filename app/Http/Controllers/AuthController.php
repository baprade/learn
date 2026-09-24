<?php

namespace App\Http\Controllers;

use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    protected AuthService $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function redirectToGoogle(Request $request)
    {
        $clientId = config('services.google.client_id');
        $redirectUri = config('services.google.redirect');

        if (empty($clientId)) {
            return redirect()->route('auth.demo');
        }

        $query = http_build_query([
            'client_id' => $clientId,
            'redirect_uri' => $redirectUri,
            'response_type' => 'code',
            'scope' => 'openid profile email',
            'access_type' => 'online',
            'prompt' => 'select_account',
        ]);

        return redirect('https://accounts.google.com/o/oauth2/v2/auth?' . $query);
    }

    public function handleGoogleCallback(Request $request)
    {
        $code = $request->query('code');
        if (empty($code)) {
            return redirect()->route('home')->with('error', 'Gagal login via Google: Kode otorisasi tidak ditemukan.');
        }

        try {
            $clientId = config('services.google.client_id');
            $clientSecret = config('services.google.client_secret');
            $redirectUri = config('services.google.redirect');

            $response = Http::post('https://oauth2.googleapis.com/token', [
                'code' => $code,
                'client_id' => $clientId,
                'client_secret' => $clientSecret,
                'redirect_uri' => $redirectUri,
                'grant_type' => 'authorization_code',
            ]);

            if ($response->failed()) {
                return redirect()->route('home')->with('error', 'Gagal memproses otentikasi Google OAuth.');
            }

            $tokenData = $response->json();
            $accessToken = $tokenData['access_token'] ?? null;

            if (empty($accessToken)) {
                return redirect()->route('home')->with('error', 'Google Token tidak valid.');
            }

            $userProfileResponse = Http::withToken($accessToken)->get('https://www.googleapis.com/oauth2/v3/userinfo');

            if ($userProfileResponse->failed()) {
                return redirect()->route('home')->with('error', 'Gagal mengambil profil user dari Google.');
            }

            $googlePayload = $userProfileResponse->json();
            $user = $this->authService->findOrCreateGoogleUser($googlePayload);
            $this->authService->login($user);

            return redirect()->intended(route('home'))->with('success', 'Berhasil login sebagai ' . $user->name);
        } catch (\Throwable $e) {
            return redirect()->route('home')->with('error', 'Terjadi kesalahan sistem SSO: ' . $e->getMessage());
        }
    }

    public function devLogin(Request $request)
    {
        $mockUser = $this->authService->findOrCreateGoogleUser([
            'name' => 'Bagas (Learner)',
            'email' => 'bagasprastad@gmail.com',
            'sub' => 'google-sso-mock-12345',
            'picture' => 'https://ui-avatars.com/api/?name=Bagas+Learner&background=10b981&color=fff',
        ]);

        $this->authService->login($mockUser);

        return redirect()->back()->with('success', 'Berhasil login SSO sebagai ' . $mockUser->name);
    }

    public function logout(Request $request)
    {
        $this->authService->logout();
        return redirect()->route('home')->with('success', 'Kamu telah logout.');
    }
}
