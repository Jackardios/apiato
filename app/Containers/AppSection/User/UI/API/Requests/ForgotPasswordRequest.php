<?php

namespace App\Containers\AppSection\User\UI\API\Requests;

use App\Ship\Parents\Requests\Request;

class ForgotPasswordRequest extends Request
{
    /**
     * Defining the URL parameters (e.g, `/user/{id}`) allows applying
     * validation rules on them and allows accessing them like request data.
     */
    protected array $urlParameters = [
        //
    ];

    public function rules(): array
    {
        return [
            'email' => 'required|email|max:255',
            'reseturl' => 'required|max:255',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
