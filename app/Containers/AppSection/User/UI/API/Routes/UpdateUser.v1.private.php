<?php

/**
 * @apiGroup           User
 * @apiName            updateUser
 * @api                {patch} /v1/users/:id Update User
 *
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated User
 *
 * @apiParam           {String}  [password]
 * @apiParam           {String}  [name]
 * @apiParam           {String="male,female,unspecified"}  [gender]
 * @apiParam           {String}  [birth] format: Ymd / e.g. 20151015
 *
 * @apiUse             UserSuccessSingleResponse
 */

use App\Containers\AppSection\User\UI\API\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::patch('users/{id}', [Controller::class, 'updateUser'])
    ->name('api.users.update')
    ->middleware(['auth:api']);
