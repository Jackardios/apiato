<?php

/**
 * @apiGroup           User
 * @apiName            viewUser
 * @api                {get} /api/v1/users/:id Find User
 * @apiDescription     Find a user by its ID
 *
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated User
 *
 * @apiUse             UserSuccessSingleResponse
 */

use App\Containers\AppSection\User\UI\API\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::get('users/{user}', [Controller::class, 'viewUser'])
    ->name('api.users.view')
    ->middleware(['auth:api']);
