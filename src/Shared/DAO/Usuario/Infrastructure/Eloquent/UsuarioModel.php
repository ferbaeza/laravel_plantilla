<?php

namespace Src\Shared\DAO\Usuario\Infrastructure\Eloquent;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Src\Auth\Core\Laravel\Eloquent\User;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UsuarioModel extends User
{
    use HasFactory;
    use HasUuids;

    protected string $guard_name = 'api';
    protected $table = 'users';


    protected static function newFactory()
    {
        return UserFactory::new();
    }
}
