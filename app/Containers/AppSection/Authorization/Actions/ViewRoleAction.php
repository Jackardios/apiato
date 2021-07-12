<?php

namespace App\Containers\AppSection\Authorization\Actions;

use Spatie\Permission\Models\Role;
use App\Containers\AppSection\Authorization\UI\API\Requests\ViewRoleRequest;
use App\Ship\Parents\Actions\Action;

class ViewRoleAction extends Action
{
    public function run(ViewRoleRequest $request, Role $role): Role
    {
        return $role;
    }
}
