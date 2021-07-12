<?php

namespace App\Containers\AppSection\Authorization\Tasks;

use App\Containers\AppSection\Authorization\Models\Role;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteRoleTask extends Task
{
    public function run(Role $role): ?bool
    {
        try {
            return $role->delete();
        } catch (Exception $exception) {
            throw new DeleteResourceFailedException();
        }
    }
}
