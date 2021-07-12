<?php

namespace App\Containers\AppSection\Authorization\Actions;

use App\Containers\AppSection\Authorization\Tasks\ListPermissionsTask;
use App\Ship\Parents\Actions\Action;

class ListPermissionsAction extends Action
{
    public function run()
    {
        return app(ListPermissionsTask::class)->run();
    }
}
