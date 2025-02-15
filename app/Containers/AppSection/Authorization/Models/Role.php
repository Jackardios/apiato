<?php

namespace App\Containers\AppSection\Authorization\Models;

use Apiato\Core\Traits\FactoryLocatorTrait;
use Apiato\Core\Traits\HasResourceKeyTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Role as SpatieRole;

/**
 * App\Containers\AppSection\Authorization\Models\Role
 *
 * @property int $id
 * @property string $name
 * @property string $guard_name
 * @property string|null $display_name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Containers\AppSection\Authorization\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Containers\AppSection\User\Models\User[] $users
 * @property-read int|null $users_count
 * @method static \App\Containers\AppSection\Authorization\Data\Factories\RoleFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|Role query()
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereDisplayName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereGuardName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Role extends SpatieRole
{
    use HasResourceKeyTrait;
    use HasFactory, FactoryLocatorTrait {
        FactoryLocatorTrait::newFactory insteadof HasFactory;
    }

    protected $guard_name = 'web';

    protected $fillable = [
        'name',
        'guard_name',
        'display_name',
        'description',
    ];
}
