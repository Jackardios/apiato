<?php

namespace App\Containers\AppSection\User\Tasks;

use App\Containers\AppSection\User\Models\User;
use App\Ship\Parents\Tasks\Task;

class ListUsersTask extends Task
{
    public function __construct()
    {
        $query = User::query();
    }

    public function run(?bool $paginated = false)
    {
        return User::paginate();
    }

    public function runAll()
    {
        return User::all();
    }

}
