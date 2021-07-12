<?php

namespace App\Containers\AppSection\User\Actions;

use App\Containers\AppSection\User\Models\User;
use App\Containers\AppSection\User\Tasks\DeleteUserTask;
use App\Containers\AppSection\User\UI\API\Requests\DeleteUserRequest;
use App\Ship\Parents\Actions\Action;

class DeleteUserAction extends Action
{
    public function run(DeleteUserRequest $request, User $user): void
    {
        app(DeleteUserTask::class)->run($user);
    }
}
