<?php

/**
 * @apiGroup           User
 * @apiName            listUsers
 * @api                {get} /api/v1/users Get All Users
 * @apiDescription     Get All Application Users (clients and admins). For all registered users "Clients" only you
 *                     can use `/clients`. And for all "Admins" only you can use `/admins`.
 *
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated User
 *
 * @apiUse             GeneralSuccessMultipleResponse
 */

use App\Containers\AppSection\User\UI\API\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::get('users', [Controller::class, 'listUsers'])
    ->name('api.users.list')
    ->middleware(['auth:api']);
