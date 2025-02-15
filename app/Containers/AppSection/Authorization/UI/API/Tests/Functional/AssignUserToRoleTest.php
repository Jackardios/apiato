<?php

namespace App\Containers\AppSection\Authorization\UI\API\Tests\Functional;

use App\Containers\AppSection\Authorization\Models\Role;
use App\Containers\AppSection\Authorization\Tests\ApiTestCase;
use App\Containers\AppSection\User\Models\User;
use Illuminate\Support\Arr;

/**
 * Class AssignUserToRoleTest.
 *
 * @group authorization
 * @group api
 *
 * @author  Mahmoud Zalt <mahmoud@zalt.me>
 */
class AssignUserToRoleTest extends ApiTestCase
{
    protected string $endpoint = 'post@api/v1/roles/assign?include=roles';

    protected array $access = [
        'roles' => '',
        'permissions' => 'assign-roles',
    ];

    public function testAssignUserToRole(): void
    {
        $randomUser = User::factory()->create();
        $role = Role::factory()->create();
        $data = [
            'roles_ids' => [$role->getKey()],
            'user_id' => $randomUser->getKey(),
        ];

        $response = $this->makeCall($data);

        $response->assertStatus(200);
        $responseContent = $this->getResponseContentObject();
        $this->assertEquals($data['user_id'], $responseContent->data->id);
        $this->assertEquals($data['roles_ids'][0], $responseContent->data->roles->data[0]->id);
    }

    public function testAssignUserToManyRoles(): void
    {
        $randomUser = User::factory()->create();
        $role1 = Role::factory()->create();
        $role2 = Role::factory()->create();
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
