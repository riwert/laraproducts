<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can manage the category.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function manage(User $user)
    {
        return $user->isAdmin();
    }
}
