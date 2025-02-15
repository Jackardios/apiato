<?php

namespace App\Containers\AppSection\User\Tasks;

use App\Containers\AppSection\User\Models\User;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;
use Illuminate\Support\Facades\Hash;

class CreateUserByCredentialsTask extends Task
{
    public function run(
        string $email,
        string $password,
        string $name = null
    ): User
    {
        try {
            // create new user
            $user = User::create([
                'password' => Hash::make($password),
                'email' => $email,
                'name' => $name,
            ]);

        } catch (Exception $e) {
            throw new CreateResourceFailedException();
        }

        return $user;
    }
}
