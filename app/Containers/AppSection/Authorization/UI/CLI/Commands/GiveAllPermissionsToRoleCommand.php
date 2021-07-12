<?php

namespace App\Containers\AppSection\Authorization\UI\CLI\Commands;

use App\Containers\AppSection\Authorization\Exceptions\RoleNotFoundException;
use App\Containers\AppSection\Authorization\Tasks\FindRoleTask;
use App\Containers\AppSection\Authorization\Tasks\ListPermissionsTask;
use App\Ship\Parents\Commands\ConsoleCommand;

class GiveAllPermissionsToRoleCommand extends ConsoleCommand
{
    protected $signature = 'apiato:permissions:toRole {role}';

    protected $description = 'Give all system Permissions to a specific Role.';

    /**
     * @throws RoleNotFoundException
     */
    public function handle(): void
    {
        $roleName = $this->argument('role');

        $allPermissions = app(ListPermissionsTask::class)->run(false);

        $role = app(FindRoleTask::class)->run($roleName);

        if (!$role) {
            throw new RoleNotFoundException("Role $roleName is not found!");
        }

        $role->syncPermissions($allPermissionsNames = $allPermissions->pluck('name')->toArray());

        $this->info('Gave the Role (' . $roleName . ') the following Permissions: ' . implode(' - ',
                $allPermissionsNames) . '.');
    }
}
