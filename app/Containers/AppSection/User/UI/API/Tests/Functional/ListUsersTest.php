<?php

namespace App\Containers\AppSection\User\UI\API\Tests\Functional;

use App\Containers\AppSection\User\Models\User;
use App\Containers\AppSection\User\Tests\ApiTestCase;

/**
 * Class ListUsersTest.
 *
 * @group user
 * @group api
 */
class ListUsersTest extends ApiTestCase
{
    protected string $endpoint = 'get@api/v1/users';

    protected array $access = [
        'roles' => '',
        'permissions' => 'view-users',
    ];

    public function testListUsersWithAccess(): void
    {
        User::factory()->count(2)->create();

        $response = $this->makeCall();

        $response->assertStatus(200);
        $responseContent = $this->getResponseContentObject();

        $this->assertCount(4, $responseContent->data);
    }

    public function testListUsersWithoutAccess(): void
    {
        $this->getTestingUserWithoutAccess();
        User::factory()->count(2)->create();

        $response = $this->makeCall();

        $response->assertStatus(403);
        $this->assertResponseContainKeyValue([
            'message' => 'This action is unauthorized.',
        ]);
    }
}
