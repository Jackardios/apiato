<?php

namespace App\Containers\AppSection\User\UI\API\Tests\Functional;

use App\Containers\AppSection\User\Tests\ApiTestCase;

/**
 * Class RegisterUserTest.
 *
 * @group user
 * @group api
 */
class RegisterUserTest extends ApiTestCase
{
    protected string $endpoint = 'post@api/v1/users';

    protected array $access = [
        'roles' => '',
        'permissions' => 'create-users',
    ];

    public function testRegisterNewUserWithCredentials(): void
    {
        $data = [
            'email' => 'apiato@mail.test',
            'name' => 'Apiato',
            'password' => 'secretpass',
        ];

        $response = $this->makeCall($data);

        $response->assertStatus(200);
        $this->assertResponseContainKeyValue([
            'email' => $data['email'],
            'name' => $data['name'],
        ]);
        $responseContent = $this->getResponseContentObject();
        $this->assertNotEmpty($responseContent->data);
        $this->assertDatabaseHas('users', ['email' => $data['email']]);
    }

    public function testRegisterExistingUser(): void
    {
        $userDetails = [
            'email' => 'apiato@mail.test',
            'name' => 'Apiato',
            'password' => 'secret',
        ];

        $this->getTestingUser($userDetails);

        $data = [
            'email' => $userDetails['email'],
            'name' => $userDetails['name'],
            'password' => $userDetails['password'],
        ];

        $response = $this->makeCall($data);

        $response->assertStatus(422);
        $this->assertValidationErrorContain([
            'email' => 'The email has already been taken.',
        ]);
    }

    public function testRegisterNewUserWithoutEmail(): void
    {
        $data = [
            'name' => 'Apiato',
            'password' => 'secret',
        ];

        $response = $this->makeCall($data);

        $response->assertStatus(422);
        // assert response contain the correct message
        $this->assertValidationErrorContain([
            'email' => 'The email field is required.',
        ]);
    }

    public function testRegisterNewUserWithoutName(): void
    {
        $data = [
            'email' => 'apiato@mail.test',
            'password' => 'secret',
        ];

        $response = $this->makeCall($data);

        $response->assertStatus(422);
        $this->assertValidationErrorContain([
            'name' => 'The name field is required.',
        ]);
    }

    public function testRegisterNewUserWithoutPassword(): void
    {
        $data = [
            'email' => 'apiato@mail.test',
            'name' => 'Apiato',
        ];

        $response = $this->makeCall($data);

        $response->assertStatus(422);
        $this->assertValidationErrorContain([
            'password' => 'The password field is required.',
        ]);
    }

    public function testRegisterNewUserWithInvalidEmail(): void
    {
        $data = [
            'email' => 'missing-at.test',
            'name' => 'Apiato',
            'password' => 'secret',
        ];

        $response = $this->makeCall($data);

        $response->assertStatus(422);
        $this->assertValidationErrorContain([
            'email' => 'The email must be a valid email address.',
        ]);
    }
}
