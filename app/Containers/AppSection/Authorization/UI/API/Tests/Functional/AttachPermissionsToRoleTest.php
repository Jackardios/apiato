<?php

namespace App\Containers\AppSection\Authorization\UI\API\Tests\Functional;

use App\Containers\AppSection\Authorization\Models\Permission;
use App\Containers\AppSection\Authorization\Models\Role;
use App\Containers\AppSection\Authorization\Tests\ApiTestCase;

/**
 * Class AttachPermissionsToRoleTest.
 *
 * @group authorization
 * @group api
 *
 * @author  Mahmoud Zalt <mahmoud@zalt.me>
 */
class AttachPermissionsToRoleTest extends ApiTestCase
{
    protected string $endpoint = 'post@api/v1/permissions/attach';

    protected array $access = [
        'roles' => '',
        'permissions' => 'manage-roles',
    ];

    public function testAttachSinglePermissionToRole(): void
    {
        $roleA = Role::factory()->create();
        $permissionA = Permission::factory()->create();
        $data = [
            'role_id' => $roleA->getKey(),
            'permissions_ids' => $permissionA->getKey(),
        ];

        $response = $this->makeCall($data);

        $response->assertStatus(200);
        $responseContent = $this->getResponseContentObject();
        $this->assertEquals($roleA['name'], $responseContent->data->name);
        $this->assertDatabaseHas(config('permission.table_names.role_has_permissions'), [
            'permission_id' => $permissionA->id,
            'role_id' => $roleA->id
        ]);
    }

    public function testAttachMultiplePermissionToRole(): void
    {
        $roleA = Role::factory()->create();
        $permissionA = Permission::factory()->create();
        $permissionB = Permission::factory()->create();
        $data = [
            'role_id' => $roleA->getKey(),
            'permissions_ids' => [$permissionA->getKey(), $permissionB->getKey()]
        ];

        $response = $this->makeCall($data);

        $response->assertStatus(200);
        $this->assertDatabaseHas(config('permission.table_names.role_has_permissions'), [
            'permission_id' => $permissionA->id,
            'permission_id' => $permissionB->id,
            'role_id' => $roleA->id
        ]);
    }
}
