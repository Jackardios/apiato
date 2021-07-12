<?php

namespace App\Containers\AppSection\Authorization\Actions;

use App\Containers\AppSection\Authorization\Tasks\ListRolesTask;
use App\Ship\Parents\Actions\Action;

class ListRolesAction extends Action
{
    public function run()
    {
        return app(ListRolesTask::class)->run();
    }
}
