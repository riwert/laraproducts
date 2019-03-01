<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can modify the account.
     *
     * @param  \App\User  $user
     * @param  \App\User  $account
     * @return mixed
     */
    public function modify(User $user, User $account)
    {
        return $user->id == $account->id;
    }
}
