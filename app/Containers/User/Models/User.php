<?php

namespace App\Containers\User\Models;

use App\Containers\Authorization\Traits\AuthenticationTrait;
use App\Containers\Authorization\Traits\AuthorizationTrait;
use App\Ship\Parents\Models\UserModel;
use Illuminate\Notifications\Notifiable;

class User extends UserModel
{
    use AuthorizationTrait;
    use AuthenticationTrait;
    use Notifiable;

    protected $table = 'users';

    protected $fillable = [
        'name',
        'email',
        'password',
        'device',
        'platform',
        'gender',
        'birth',
        'social_provider',
        'social_token',
        'social_refresh_token',
        'social_expires_in',
        'social_token_secret',
        'social_id',
        'social_avatar',
        'social_avatar_original',
        'social_nickname',
        'confirmed',
        'is_admin',
    ];

    protected $casts = [
        'is_admin' => 'boolean',
        'confirmed' => 'boolean',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
