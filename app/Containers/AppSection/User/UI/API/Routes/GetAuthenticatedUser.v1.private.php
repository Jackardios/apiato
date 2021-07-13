<?php

/**
 * @apiGroup           User
 * @apiName            getAuthenticatedUser
 *
 * @api                {GET} /api/v1/user/profile Find Logged in User data (Profile Information)
 * @apiDescription     Find the user details of the logged in user from its Token. (without specifying his ID)
 *
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated User
 *
 * @apiUse             UserSuccessSingleResponse
 */

use App\Containers\AppSection\User\UI\API\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::get('user/profile', [Controller::class, 'getAuthenticatedUser'])
    ->name('api.user.profile')
    ->middleware(['auth:api']);
