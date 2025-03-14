<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Response as FacadesResponse;

class UserPolicy
{


    /**
     * Determine whether the user can update the model.
     */
    public function userUpdate(User $user, User $model): bool
    {
        return  $user->is($model) ;
    }
}
