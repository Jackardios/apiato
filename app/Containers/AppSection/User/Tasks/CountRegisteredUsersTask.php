<?php

namespace App\Containers\AppSection\User\Tasks;

use App\Containers\AppSection\User\Models\User;
use App\Ship\Parents\Tasks\Task;

class CountRegisteredUsersTask extends Task
{
    public function run(): int
    {
        return User::withEmail()->count();
    }
}
