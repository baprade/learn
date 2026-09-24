<?php

/**
 * Built by Bagas (Baprade)
 * AuthService: SOLID Service Encapsulating Google SSO & User Session Management - 29 Jul 2026
 */

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AuthService
{
    /**
     * Authenticate or Register user via Google payload array into SQLite database.
     *
     * @param array $googleUserPayload
     * @return User
     */
    public function findOrCreateGoogleUser(array $googleUserPayload): User
    {
        $email = strtolower(trim($googleUserPayload['email']));
        $name = trim($googleUserPayload['name'] ?? 'PHP Learner');
        $googleId = $googleUserPayload['sub'] ?? $googleUserPayload['id'] ?? null;
        $avatar = $googleUserPayload['picture'] ?? $googleUserPayload['avatar'] ?? null;

        $user = User::where('email', $email)->orWhere('google_id', $googleId)->first();

        if ($user) {
            $user->update([
                'name' => $name,
                'google_id' => $googleId ?: $user->google_id,
                'avatar' => $avatar ?: $user->avatar,
            ]);
        } else {
            $user = User::create([
                'name' => $name,
                'email' => $email,
                'google_id' => $googleId,
                'avatar' => $avatar,
                'password' => bcrypt(Str::random(24)),
            ]);
        }

        return $user;
    }

    /**
     * Log in user and establish secure session.
     *
     * @param User $user
     * @return void
     */
    public function login(User $user): void
    {
        Auth::login($user, true);
    }

    /**
     * Log out user and destroy session.
     *
     * @return void
     */
    public function logout(): void
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
    }
}
