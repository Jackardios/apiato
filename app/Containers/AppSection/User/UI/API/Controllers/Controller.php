<?php

namespace App\Containers\AppSection\User\UI\API\Controllers;

use App\Containers\AppSection\User\Actions\DeleteUserAction;
use App\Containers\AppSection\User\Actions\ViewUserAction;
use App\Containers\AppSection\User\Actions\ForgotPasswordAction;
use App\Containers\AppSection\User\Actions\ListUsersAction;
use App\Containers\AppSection\User\Actions\GetAuthenticatedUserAction;
use App\Containers\AppSection\User\Actions\RegisterUserAction;
use App\Containers\AppSection\User\Actions\ResetPasswordAction;
use App\Containers\AppSection\User\Actions\UpdateUserAction;
use App\Containers\AppSection\User\Models\User;
use App\Containers\AppSection\User\UI\API\Requests\CreateAdminRequest;
use App\Containers\AppSection\User\UI\API\Requests\DeleteUserRequest;
use App\Containers\AppSection\User\UI\API\Requests\ViewUserRequest;
use App\Containers\AppSection\User\UI\API\Requests\ForgotPasswordRequest;
use App\Containers\AppSection\User\UI\API\Requests\ListUsersRequest;
use App\Containers\AppSection\User\UI\API\Requests\GetAuthenticatedUserRequest;
use App\Containers\AppSection\User\UI\API\Requests\RegisterUserRequest;
use App\Containers\AppSection\User\UI\API\Requests\ResetPasswordRequest;
use App\Containers\AppSection\User\UI\API\Requests\UpdateUserRequest;
use App\Containers\AppSection\User\UI\API\Transformers\UserPrivateProfileTransformer;
use App\Containers\AppSection\User\UI\API\Transformers\UserTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class Controller extends ApiController
{
    public function registerUser(RegisterUserRequest $request): array
    {
        $registeredUser = app(RegisterUserAction::class)->run($request);
        return $this->transform($registeredUser, UserTransformer::class);
    }

    public function updateUser(UpdateUserRequest $request, User $user): array
    {
        $updatedUser = app(UpdateUserAction::class)->run($request, $user);
        return $this->transform($updatedUser, UserTransformer::class);
    }

    public function deleteUser(DeleteUserRequest $request, User $user): JsonResponse
    {
        app(DeleteUserAction::class)->run($request, $user);
        return $this->noContent();
    }

    public function listUsers(ListUsersRequest $request): array
    {
        $users = app(ListUsersAction::class)->run($request);
        return $this->transform($users, UserTransformer::class);
    }

    public function viewUser(ViewUserRequest $request, User $user): array
    {
        $user = app(ViewUserAction::class)->run($request, $user);
        return $this->transform($user, UserTransformer::class);
    }

    public function getAuthenticatedUser(GetAuthenticatedUserRequest $request): array
    {
        $user = app(GetAuthenticatedUserAction::class)->run($request);
        return $this->transform($user, UserPrivateProfileTransformer::class);
    }

    public function resetPassword(ResetPasswordRequest $request): JsonResponse
    {
        app(ResetPasswordAction::class)->run($request);
        return $this->noContent(204);
    }

    public function forgotPassword(ForgotPasswordRequest $request): JsonResponse
    {
        app(ForgotPasswordAction::class)->run($request);
        return $this->noContent(202);
    }
}
