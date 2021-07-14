<?php

namespace App\Containers\AppSection\Authorization\UI\API\Tests\Functional;

use App\Containers\AppSection\Authorization\Tests\ApiTestCase;

/**
 * Class CreateRoleTest.
 *
 * @group authorization
 * @group api
 *
 * @author  Mahmoud Zalt <mahmoud@zalt.me>
 */
class CreateRoleTest extends ApiTestCase
{
    protected string $endpoint = 'post@api/v1/roles';

    protected array $access = [
        'roles' => '',
        'permissions' => 'manage-roles',
    ];

    public function testCreateRole(): void
    {
        $data = [
            'name' => 'manager',
            'display_name' => 'manager',
            'description' => 'he manages things',
        ];

        $response = $this->makeCall($data);

        $response->assertStatus(200);
        $responseContent = $this->getResponseContentObject();
        $this->assertEquals($data['name'], $responseContent->data->name);
    }

    public function testCreateRoleWithWrongName(): void
    {
        $data = [
            'name' => 'include Space',
            'display_name' => 'manager',
            'description' => 'he manages things',
        ];

        $response = $this->makeCall($data);

        $response->assertStatus(422);
    }
}
