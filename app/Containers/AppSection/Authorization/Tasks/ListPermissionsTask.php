<?php

namespace App\Containers\AppSection\Authorization\Tasks;

use App\Containers\AppSection\Authorization\Models\Permission;
use App\Ship\Parents\Tasks\Task;

class ListPermissionsTask extends Task
{
    public function run(bool $paginated = true)
    {
        return $paginated ? Permission::paginate() : Permission::all();
    }
}
