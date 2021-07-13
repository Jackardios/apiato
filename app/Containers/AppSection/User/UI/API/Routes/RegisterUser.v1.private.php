<?php

/**
 * @apiGroup           User
 * @apiName            registerUser
 * @api                {post} /api/v1/register Register user
 * @apiDescription     Register users
 *
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiParam           {String}  email
 * @apiParam           {String}  password
 * @apiParam           {String}  [name]
 *
 * @apiUse             UserSuccessSingleResponse
 */

use App\Containers\AppSection\User\UI\API\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::post('/users', [Controller::class, 'registerUser'])
    ->name('api.users.create');
