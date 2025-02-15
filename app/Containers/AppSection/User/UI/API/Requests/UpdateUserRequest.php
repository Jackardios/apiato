<?php

namespace App\Containers\AppSection\User\UI\API\Requests;

use App\Ship\Parents\Requests\Request;

class UpdateUserRequest extends Request
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
            'password' => 'min:6|max:40',
            'name' => 'min:2|max:50',
        ];
    }

    public function authorize(): bool
    {
        $user = $this->route('user');
        return $user && $this->user()->can('update', $user);
    }
}
