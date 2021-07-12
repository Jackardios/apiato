<?php

namespace App\Containers\AppSection\Authorization\Actions;

use Spatie\Permission\Models\Role;
use App\Containers\AppSection\Authorization\Tasks\DeleteRoleTask;
use App\Containers\AppSection\Authorization\UI\API\Requests\DeleteRoleRequest;
use App\Ship\Parents\Actions\Action;

class DeleteRoleAction extends Action
{
    public function run(DeleteRoleRequest $request, Role $role): void
    {
        app(DeleteRoleTask::class)->run($role);
    }
}
