<?php

namespace App\Containers\AppSection\Authorization\Tasks;

use App\Containers\AppSection\Authorization\Models\Role;
use App\Ship\Parents\Tasks\Task;

class ListRolesTask extends Task
{
    public function run(bool $paginated = true)
    {
        return $paginated ? Role::paginate() : Role::all();
    }
}
