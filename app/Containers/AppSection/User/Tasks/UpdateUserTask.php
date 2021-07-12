<?php

namespace App\Containers\AppSection\User\Tasks;

use App\Containers\AppSection\User\Models\User;
use App\Ship\Exceptions\InternalErrorException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Hash;

class UpdateUserTask extends Task
{
    public function run(array $userData, User $user): User
    {
        if (empty($userData)) {
            throw new UpdateResourceFailedException('appSection@user::exceptions.inputs-empty');
        }

        try {
            // hash password if exist (before updating user)
            if (array_key_exists('password', $userData)) {
                $userData['password'] = Hash::make($userData['password']);
            }

            $user->update($userData);
        } catch (ModelNotFoundException $exception) {
            throw new NotFoundException('appSection@user::exceptions.user-not-found');
        } catch (Exception $exception) {
            throw new InternalErrorException();
        }

        return $user;
    }
}
