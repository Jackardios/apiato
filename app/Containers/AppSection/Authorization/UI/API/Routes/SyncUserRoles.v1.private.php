<?php

/**
 * @apiGroup           RolePermission
 * @apiName            syncUserRoles
 * @api                {post} /api/v1/roles/sync Sync User Roles
 * @apiDescription     You can use this endpoint instead of `roles/assign` & `roles/revoke`.
 *                     The sync endpoint will override all existing user roles with the new
 *                     one sent to this endpoint.
 *
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated User
 *
 * @apiParam           {Number} user_id User ID
 * @apiParam           {Array} roles_ids Role ID or Array of Roles ID's
 *
 * @apiUse             UserSuccessSingleResponse
 */

use App\Containers\AppSection\Authorization\UI\API\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::post('roles/sync', [Controller::class, 'syncUserRoles'])
    ->name('api.roles.sync')
    ->middleware(['auth:api']);
