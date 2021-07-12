<?php

namespace App\Containers\AppSection\User\Tasks;

use App\Containers\AppSection\User\Models\User;
use App\Ship\Parents\Tasks\Task;

class CountUsersTask extends Task
{
    public function run(): int
    {
        return User::count();
    }
}
