<?php

namespace App\Containers\AppSection\Authorization\Actions;

use App\Containers\AppSection\Authorization\Models\Permission;
use App\Containers\AppSection\Authorization\UI\API\Requests\ViewPermissionRequest;
use App\Ship\Parents\Actions\Action;

class ViewPermissionAction extends Action
{
    public function run(ViewPermissionRequest $request, Permission $permission): Permission
    {
        return $permission;
    }
}
