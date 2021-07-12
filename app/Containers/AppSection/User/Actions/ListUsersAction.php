<?php

namespace App\Containers\AppSection\User\Actions;

use App\Containers\AppSection\User\Tasks\ListUsersTask;
use App\Ship\Parents\Actions\Action;

class ListUsersAction extends Action
{
    public function run()
    {
        return app(ListUsersTask::class)->run();
    }
}
