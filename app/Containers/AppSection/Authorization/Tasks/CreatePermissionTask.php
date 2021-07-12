<?php

namespace App\Containers\AppSection\Authorization\Tasks;

use App\Containers\AppSection\Authorization\Models\Permission;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreatePermissionTask extends Task
{
    public function run(string $name, ?string $displayName = null, ?string $group = null, ?string $description = null): Permission
    {
        app()['cache']->forget('spatie.permission.cache');

        try {
            $permission = Permission::create([
                'name' => $name,
                'description' => $description,
                'display_name' => $displayName,
                'group' => $group,
                'guard_name' => 'web',
            ]);
        } catch (Exception $exception) {
            throw new CreateResourceFailedException();
        }

        return $permission;
    }
}
