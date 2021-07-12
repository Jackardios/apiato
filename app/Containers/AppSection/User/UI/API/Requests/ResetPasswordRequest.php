<?php

namespace App\Containers\AppSection\User\UI\API\Requests;

use App\Ship\Parents\Requests\Request;

class ResetPasswordRequest extends Request
{
    /**
     * Defining the URL parameters (e.g, `/user/{id}`) allows applying
     * validation rules on them and allows accessing them like request data.
     */
    protected array $urlParameters = [
        'token',
        'email',
        'password',
    ];

    public function rules(): array
    {
        return [
            'token' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|min:6|max:255',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
