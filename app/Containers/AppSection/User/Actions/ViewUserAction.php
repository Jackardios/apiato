<?php

namespace App\Containers\AppSection\User\Actions;

use App\Containers\AppSection\User\Models\User;
use App\Containers\AppSection\User\UI\API\Requests\ViewUserRequest;
use App\Ship\Parents\Actions\Action;

class ViewUserAction extends Action
{
    public function run(ViewUserRequest $request, User $user): User
    {
        return $user;
    }
}
