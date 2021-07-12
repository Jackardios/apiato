<?php

namespace App\Containers\AppSection\User\Tasks;

use App\Containers\AppSection\User\Models\User;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteUserTask extends Task
{
    public function run(User $user): ?bool
    {
        try {
            return $user->delete();
        } catch (Exception $exception) {
            throw new DeleteResourceFailedException();
        }
    }
}
