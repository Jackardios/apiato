<?php

namespace App\Containers\AppSection\Authorization\UI\API\Tests\Functional;

use App\Containers\AppSection\Authorization\Models\Role;
use App\Containers\AppSection\Authorization\Tests\ApiTestCase;
use App\Containers\AppSection\User\Models\User;
use Illuminate\Support\Arr;

/**
 * Class SyncUserRolesTest.
 *
 * @group authorization
 * @group api
 *
 * @author  Mahmoud Zalt <mahmoud@zalt.me>
 */
class SyncUserRolesTest extends ApiTestCase
{
    protected string $endpoint = 'post@api/v1/roles/sync?include=roles';

    protected array $access = [
        'roles' => '',
        'permissions' => 'assign-roles',
    ];

    public function testSyncMultipleRolesOnUser(): void
    {
        $role1 = Role::factory()->create(['display_name' => '111']);
        $role2 = Role::factory()->create(['display_name' => '222']);
        $randomUser = User::factory()->create();
        $randomUser->assignRole($role1);
        $data = [
            'roles_ids' => [
                $role1->getKey(),
                $role2->getKey(),
            ],
            'user_id' => $randomUser->getKey(),
        ];

        $response = $this->makeCall($data);

        $response->assertStatus(200);
        $responseContent = $this->getResponseContentObject();
        $this->assertTrue(count($responseContent->data->roles->data) > 1);
        $roleIds = Arr::pluck($responseContent->data->roles->data, 'id');
        $this->assertContains($data['roles_ids'][0], $roleIds);
        $this->assertContains($data['roles_ids'][1], $roleIds);
    }
}
