<?php

namespace App\Containers\AppSection\Authorization\UI\API\Tests\Functional;

use App\Containers\AppSection\Authorization\Tests\ApiTestCase;

/**
 * Class ListRolesTest.
 *
 * @group authorization
 * @group api
 *
 * @author  Mahmoud Zalt <mahmoud@zalt.me>
 */
class ListRolesTest extends ApiTestCase
{
    protected string $endpoint = 'get@api/v1/roles';

    protected array $access = [
        'roles' => '',
        'permissions' => 'manage-roles',
    ];

    public function testListRoles(): void
    {
        $this->getTestingUser();

        $response = $this->makeCall();

        $response->assertStatus(200);
        $responseContent = $this->getResponseContentObject();
        $this->assertTrue(count($responseContent->data) > 0);
    }
}
