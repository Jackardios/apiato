<?php

namespace App\Containers\AppSection\User\UI\API\Tests\Functional;

use App\Containers\AppSection\User\Models\User;
use App\Containers\AppSection\User\Tests\ApiTestCase;

/**
 * Class ViewUsersTest.
 *
 * @group user
 * @group api
 */
class ViewUserTest extends ApiTestCase
{
    protected string $endpoint = 'get@api/v1/users/{id}';

    protected array $access = [
        'roles' => '',
        'permissions' => 'view-users',
    ];

    public function testViewExistingUser(): void
    {
        $user = $this->getTestingUserWithoutAccess();

        $response = $this->injectId($user->id)->makeCall();

        $response->assertStatus(200);
        $responseContent = $this->getResponseContentObject();
        self::assertEquals($user->name, $responseContent->data->name);
    }

    public function testViewAnotherExistingUser(): void
    {
        $anotherUser = User::factory()->create();

        $response = $this->injectId($anotherUser->id)->makeCall();

        $response->assertStatus(200);
        $responseContent = $this->getResponseContentObject();
        self::assertEquals($anotherUser->name, $responseContent->data->name);
    }

    public function testViewAnotherExistingUserWithoutAccess(): void
    {
        $this->getTestingUserWithoutAccess();
        $anotherUser = User::factory()->create();

        $response = $this->injectId($anotherUser->id)->makeCall();

        $response->assertStatus(403);
    }

    public function testViewAnotherNotExistingUser(): void
    {
        $fakeUserId = 7777;

        $response = $this->injectId($fakeUserId)->makeCall();

        $response->assertStatus(404);
    }

    public function testViewFilteredUserResponse(): void
    {
        $user = $this->getTestingUser();

        $response = $this->injectId($user->id)->endpoint($this->endpoint . '?filter=email;name')->makeCall();

        $response->assertStatus(200);
        $responseContent = $this->getResponseContentObject();

        self::assertEquals($user->name, $responseContent->data->name);
        self::assertEquals($user->email, $responseContent->data->email);
        self::assertNotContains('id', json_decode($response->getContent(), true));
    }

    public function testViewUserWithRelation(): void
    {
        $user = $this->getTestingUser();

        $response = $this->injectId($user->id)->endpoint($this->endpoint . '?include=roles')->makeCall();

        $response->assertStatus(200);
        $responseContent = $this->getResponseContentObject();

        self::assertEquals($user->email, $responseContent->data->email);
        self::assertNotNull($responseContent->data->roles);
    }
}
