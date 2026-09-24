<?php

namespace App\Services;

class AuthService
{
    public function findOrCreateGoogleUser(array $googlePayload)
    {
        $email = $googlePayload['email'] ?? null;
        $googleId = $googlePayload['sub'] ?? null;
        $name = $googlePayload['name'] ?? 'Learner';
        $avatar = $googlePayload['picture'] ?? null;

        if (empty($email)) {
            throw new \InvalidArgumentException('Google payload tidak memiliki email.');
        }

        $user = \App\Models\User::where('email', $email)->first();

        if ($user) {
            $user->update([
                'google_id' => $googleId ?? $user->google_id,
                'avatar' => $avatar ?? $user->avatar,
            ]);
            return $user;
        }

        return \App\Models\User::create([
            'name' => $name,
            'email' => $email,
            'google_id' => $googleId,
            'avatar' => $avatar,
            'password' => null,
            'email_verified_at' => now(),
        ]);
    }

    public function login(\App\Models\User $user): void
    {
        \Illuminate\Support\Facades\Auth::login($user, true);
    }

    public function logout(): void
    {
        \Illuminate\Support\Facades\Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
    }
}
