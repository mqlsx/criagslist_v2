<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function show(User $currentUser, User $user)
    {
        if ($currentUser->id === 1)
            return true;
        else 
            return $currentUser->id === $user->id;
    }

    public function index(User $currentUser, User $user)
    {
        if ($currentUser->id === 1)
            return true;
        else 
            return false;
    }

    public function update(User $currentUser, User $user)
    {
        return $currentUser->id === $user->id;
    }

    public function destroy(User $currentUser, User $user)
    {
        if ($currentUser->id === 1)
            return true;
    }
}
