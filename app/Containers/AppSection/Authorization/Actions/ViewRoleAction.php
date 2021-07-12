<?php

namespace App\Containers\AppSection\Authorization\Actions;

use App\Containers\AppSection\Authorization\Exceptions\RoleNotFoundException;
use App\Containers\AppSection\Authorization\Models\Role;
use App\Containers\AppSection\Authorization\Tasks\FindRoleTask;
use App\Containers\AppSection\Authorization\UI\API\Requests\ViewRoleRequest;
use App\Ship\Parents\Actions\Action;

class ViewRoleAction extends Action
{
    public function run(ViewRoleRequest $request, Role $role): Role
    {
        return $role;
    }
}
