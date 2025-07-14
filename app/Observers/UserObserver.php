<?php

namespace App\Observers;

use App\Models\User\User;
use Illuminate\Support\Facades\Auth;

class UserObserver
{
    /**
     * Handle the User "created" event.
     */
    public function created(User $user): void
    {
        //
    }

    /**
     * Handle the User "updated" event.
     */
    public function updating(User $user): void
    {
        $authUser = Auth::user();

        if ($authUser && $authUser->id != $user->id) {
            if (!$authUser->hasRole('Admin')) {
                throw new \Exception('You are not allowed to access this page');
            }
        }
    }

    /**
     * Handle the User "deleted" event.
     */
    public function deleting(User $user): void
    {
        if (!Auth::user()->hasRole('Admin')) {
            throw new \Exception('You are not allowed to access this page');
        }

        $user->user_firms()->delete();

    }

    /**
     * Handle the User "restored" event.
     */
    public function restored(User $user): void
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     */
    public function forceDeleted(User $user): void
    {
        //
    }
}
