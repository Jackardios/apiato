<?php

namespace App\Containers\AppSection\Authorization\Traits;

use App\Containers\AppSection\Authentication\Tasks\GetAuthenticatedUserTask;
use Illuminate\Contracts\Auth\Authenticatable;

trait AuthorizationTrait
{
    public function getUser(): ?Authenticatable
    {
        return app(GetAuthenticatedUserTask::class)->run();
    }

    public function hasAdminRole(): bool
    {
        return $this->hasRole('admin');
    }
}
