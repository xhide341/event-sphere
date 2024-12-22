<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Session;

class GoogleController extends Controller
{
    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            \Log::info('Google authentication attempt', [
                'email' => $googleUser->email,
                'id' => $googleUser->id
            ]);

            // First try to find user by google_id
            $user = User::where('google_id', $googleUser->id)->first();

            // If not found by google_id, try email
            if (!$user) {
                $user = User::where('email', $googleUser->email)->first();

                // If user exists but hasn't used Google before
                if ($user) {
                    // Link their Google account
                    $user->update([
                        'google_id' => $googleUser->id,
                        'avatar' => $googleUser->avatar ?? $user->avatar,
                        'avatar_type' => 'google',
                    ]);
                } else {
                    // Create new user
                    $user = User::create([
                        'name' => $googleUser->name,
                        'email' => $googleUser->email,
                        'google_id' => $googleUser->id,
                        'password' => null,
                        'role' => 'user',
                        'avatar' => $googleUser->avatar,
                        'avatar_type' => 'google',
                        'email_verified_at' => now(),
                    ]);
                }
            }

            // Update last login timestamp
            $user->update(['last_login_at' => now()]);

            // Store the Google token in the session
            Session::put('google_token', [
                'access_token' => $googleUser->token,
                'refresh_token' => $googleUser->refreshToken,
                'expires_in' => $googleUser->expiresIn,
            ]);

            Auth::login($user);

            return redirect()->route('events');
        } catch (\Exception $e) {
            \Log::error('Google authentication failed', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return redirect()->route('login')
                ->with('error', 'Google authentication failed: ' . $e->getMessage());
        }
    }
}
