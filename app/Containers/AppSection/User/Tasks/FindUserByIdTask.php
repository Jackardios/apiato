<?php

namespace App\Containers\AppSection\User\Tasks;

use App\Containers\AppSection\User\Models\User;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindUserByIdTask extends Task
{
    public function run($userId): User
    {
        try {
            $user = User::find($userId);
        } catch (Exception $e) {
            throw new NotFoundException();
        }

        return $user;
    }
}
