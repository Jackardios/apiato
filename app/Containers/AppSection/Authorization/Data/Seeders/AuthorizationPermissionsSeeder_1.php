<?php

namespace App\Containers\AppSection\Authorization\Data\Seeders;

use App\Containers\AppSection\Authorization\Tasks\CreatePermissionTask;
use App\Ship\Parents\Seeders\Seeder;

class AuthorizationPermissionsSeeder_1 extends Seeder
{
    public function run(): void
    {
        // Default Permissions ----------------------------------------------------------
        $createPermissionTask = app(CreatePermissionTask::class);
        $createPermissionTask->run(
            'manage-roles',
            'Управление ролями',
            'roles',
            'Просмотр, создание, изменение и удаление любых ролей и прикрепление к ним любых прав доступа.',
        );
        $createPermissionTask->run(
            'assign-roles',
            'Назначение ролей',
            'roles',
            'Назначение ролей пользователям',
        );
    }
}
