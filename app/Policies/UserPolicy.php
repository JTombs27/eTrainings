<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function create(User $user)
    {
        return $user->email == "admin@admin.com";
    }

    public function canDeleteUser(User $user)
    {
        return $user->permissions()->where('id', 3)->exists();
    }

   
}
