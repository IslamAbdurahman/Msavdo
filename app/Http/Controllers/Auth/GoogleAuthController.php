<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    /**
     * Redirect to Google for authentication.
     */
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Handle Google callback and authenticate the user.
     */
    public function callback()
    {
        $googleUser = Socialite::driver('google')->user();

        // Find or create the user
        $user = User::updateOrCreate(
            ['email' => $googleUser->getEmail()],
            [
                'name' => $googleUser->getName(),
                'google_id' => $googleUser->getId(),
                'avatar' => $googleUser->getAvatar(),
            ]
        );

        if (!$user->hasRole('Client') && !$user->hasRole('Admin')) {
            $user->assignRole('Client');
        }

        // Log the user in
        Auth::login($user);

        // Redirect to the dashboard or home
        return redirect('/dashboard'); // Change as needed
    }
}
