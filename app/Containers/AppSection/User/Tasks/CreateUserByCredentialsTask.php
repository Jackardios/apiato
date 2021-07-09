<?php

namespace App\Containers\AppSection\User\Tasks;

use App\Containers\AppSection\User\Data\Repositories\UserRepository;
use App\Containers\AppSection\User\Models\User;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;
use Illuminate\Support\Facades\Hash;

class CreateUserByCredentialsTask extends Task
{
    protected UserRepository $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(
        string $email,
        string $password,
        string $name = null
    ): User
    {
        try {
            // create new user
            $user = $this->repository->create([
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
