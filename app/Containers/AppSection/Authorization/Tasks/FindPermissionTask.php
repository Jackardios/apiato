<?php

namespace App\Containers\AppSection\Authorization\Tasks;

use App\Containers\AppSection\Authorization\Models\Permission;
use App\Ship\Parents\Tasks\Task;

class FindPermissionTask extends Task
{
    public function run($permissionNameOrId): Permission
    {
        $query = is_numeric($permissionNameOrId) ? ['id' => $permissionNameOrId] : ['name' => $permissionNameOrId];

        return Permission::where($query)->first();
    }
}
