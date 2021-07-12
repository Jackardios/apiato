<?php

namespace App\Containers\AppSection\User\Tasks;

use App\Containers\AppSection\User\Models\User;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindUserByEmailTask extends Task
{
    public function run(string $email): User
    {
        try {
            return User::where('email', $email)->first();
        } catch (Exception $e) {
            throw new NotFoundException();
        }
    }
}
