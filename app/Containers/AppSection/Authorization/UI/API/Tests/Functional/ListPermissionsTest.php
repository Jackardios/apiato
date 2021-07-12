<?php

namespace App\Containers\AppSection\Authorization\UI\API\Tests\Functional;

use App\Containers\AppSection\Authorization\Tests\ApiTestCase;

/**
 * Class ListPermissionsTest.
 *
 * @group authorization
 * @group api
 *
 * @author  Mahmoud Zalt <mahmoud@zalt.me>
 */
class ListPermissionsTest extends ApiTestCase
{
    protected string $endpoint = 'get@api/v1/permissions';

    protected array $access = [
        'roles' => '',
        'permissions' => 'manage-roles',
    ];

    public function testListPermissions(): void
    {
        $response = $this->makeCall();

        $response->assertStatus(200);
        $responseContent = $this->getResponseContentObject();
        self::assertTrue(count($responseContent->data) > 0);
    }
}
