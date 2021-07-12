<?php

namespace App\Containers\AppSection\Authorization\UI\API\Controllers;

use App\Containers\AppSection\Authorization\Actions\AssignUserToRoleAction;
use App\Containers\AppSection\Authorization\Actions\AttachPermissionsToRoleAction;
use App\Containers\AppSection\Authorization\Actions\CreateRoleAction;
use App\Containers\AppSection\Authorization\Actions\DeleteRoleAction;
use App\Containers\AppSection\Authorization\Actions\DetachPermissionsFromRoleAction;
use App\Containers\AppSection\Authorization\Actions\ViewPermissionAction;
use App\Containers\AppSection\Authorization\Actions\ViewRoleAction;
use App\Containers\AppSection\Authorization\Actions\ListPermissionsAction;
use App\Containers\AppSection\Authorization\Actions\ListRolesAction;
use App\Containers\AppSection\Authorization\Actions\RevokeUserFromRoleAction;
use App\Containers\AppSection\Authorization\Actions\SyncPermissionsOnRoleAction;
use App\Containers\AppSection\Authorization\Actions\SyncUserRolesAction;
use App\Containers\AppSection\Authorization\Models\Permission;
use App\Containers\AppSection\Authorization\Models\Role;
use App\Containers\AppSection\Authorization\UI\API\Requests\AssignUserToRoleRequest;
use App\Containers\AppSection\Authorization\UI\API\Requests\AttachPermissionToRoleRequest;
use App\Containers\AppSection\Authorization\UI\API\Requests\CreateRoleRequest;
use App\Containers\AppSection\Authorization\UI\API\Requests\DeleteRoleRequest;
use App\Containers\AppSection\Authorization\UI\API\Requests\DetachPermissionToRoleRequest;
use App\Containers\AppSection\Authorization\UI\API\Requests\ViewPermissionRequest;
use App\Containers\AppSection\Authorization\UI\API\Requests\ViewRoleRequest;
use App\Containers\AppSection\Authorization\UI\API\Requests\ListPermissionsRequest;
use App\Containers\AppSection\Authorization\UI\API\Requests\ListRolesRequest;
use App\Containers\AppSection\Authorization\UI\API\Requests\RevokeUserFromRoleRequest;
use App\Containers\AppSection\Authorization\UI\API\Requests\SyncPermissionsOnRoleRequest;
use App\Containers\AppSection\Authorization\UI\API\Requests\SyncUserRolesRequest;
use App\Containers\AppSection\Authorization\UI\API\Transformers\PermissionTransformer;
use App\Containers\AppSection\Authorization\UI\API\Transformers\RoleTransformer;
use App\Containers\AppSection\User\UI\API\Transformers\UserTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class Controller extends ApiController
{
    public function listPermissions(ListPermissionsRequest $request): array
    {
        $permissions = app(ListPermissionsAction::class)->run();
        return $this->transform($permissions, PermissionTransformer::class);
    }

    public function viewPermission(ViewPermissionRequest $request, Permission $permission): array
    {
        $permission = app(ViewPermissionAction::class)->run($request, $permission);
        return $this->transform($permission, PermissionTransformer::class);
    }

    public function listRoles(ListRolesRequest $request): array
    {
        $roles = app(ListRolesAction::class)->run();
        return $this->transform($roles, RoleTransformer::class);
    }

    public function viewRole(ViewRoleRequest $request, Role $role): array
    {
        $role = app(ViewRoleAction::class)->run($request, $role);
        return $this->transform($role, RoleTransformer::class);
    }

    public function assignUserToRole(AssignUserToRoleRequest $request): array
    {
        $user = app(AssignUserToRoleAction::class)->run($request);
        return $this->transform($user, UserTransformer::class);
    }

    public function syncUserRoles(SyncUserRolesRequest $request): array
    {
        $user = app(SyncUserRolesAction::class)->run($request);
        return $this->transform($user, UserTransformer::class);
    }

    public function deleteRole(DeleteRoleRequest $request, Role $role): JsonResponse
    {
        app(DeleteRoleAction::class)->run($request, $role);
        return $this->noContent();
    }

    public function revokeRoleFromUser(RevokeUserFromRoleRequest $request): array
    {
        $user = app(RevokeUserFromRoleAction::class)->run($request);
        return $this->transform($user, UserTransformer::class);
    }

    public function attachPermissionToRole(AttachPermissionToRoleRequest $request): array
    {
        $role = app(AttachPermissionsToRoleAction::class)->run($request);
        return $this->transform($role, RoleTransformer::class);
    }

    public function syncPermissionOnRole(SyncPermissionsOnRoleRequest $request): array
    {
        $role = app(SyncPermissionsOnRoleAction::class)->run($request);
        return $this->transform($role, RoleTransformer::class);
    }

    public function detachPermissionFromRole(DetachPermissionToRoleRequest $request): array
    {
        $role = app(DetachPermissionsFromRoleAction::class)->run($request);
        return $this->transform($role, RoleTransformer::class);
    }

    public function createRole(CreateRoleRequest $request): array
    {
        $role = app(CreateRoleAction::class)->run($request);
        return $this->transform($role, RoleTransformer::class);
    }
}
