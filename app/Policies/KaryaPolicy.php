<?php

namespace App\Policies;

use App\User;
use App\Karya;
use Auth;
use Illuminate\Auth\Access\HandlesAuthorization;

class KaryaPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function update(User $user, Karya $karya)
    {
        return Auth::user()->id == $karya->user_id;
    }
}