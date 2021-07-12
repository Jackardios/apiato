<?php

namespace App\Containers\AppSection\User\Tasks;

use App\Containers\AppSection\User\Models\User;
use App\Ship\Parents\Tasks\Task;

class ListUsersTask extends Task
{
    public function run(bool $paginated = true)
    {
        return $paginated ? User::paginate() : User::all();
    }
}
