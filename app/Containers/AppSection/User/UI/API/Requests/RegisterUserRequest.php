<?php

namespace App\Containers\AppSection\User\UI\API\Requests;

use App\Containers\AppSection\User\Models\User;
use App\Ship\Parents\Requests\Request;

class RegisterUserRequest extends Request
{
    /**
     * Defining the URL parameters (`/stores/999/items`) allows applying
     * validation rules on them and allows accessing them like request data.
     */
    protected array $urlParameters = [
        //
    ];

    public function rules(): array
    {
        return [
            'email' => 'required|email|max:40|unique:users,email',
            'password' => 'required|min:6|max:30',
            'name' => 'required|min:2|max:50',
        ];
    }

    public function authorize(): bool
    {
        return $this->user()->can('create', User::class);
    }
}
