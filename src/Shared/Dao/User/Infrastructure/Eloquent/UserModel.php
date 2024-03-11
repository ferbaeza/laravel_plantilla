<?php

namespace Src\Shared\Dao\User\Infrastructure\Eloquent;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Src\Shared\Dao\UsuarioHasRole\Infrastructure\Eloquent\UsuarioHasRoleModel;

class UserModel extends Authenticatable
{
    use HasUuids;
    use HasApiTokens;
    use HasFactory;
    use Notifiable;

    protected $table = 'usuarios';

    protected static function newFactory()
    {
        return UserFactory::new();
    }

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function roles()
    {
        return $this->hasMany(UsuarioHasRoleModel::class, 'fk_usuario_id', 'id');
    }
}
