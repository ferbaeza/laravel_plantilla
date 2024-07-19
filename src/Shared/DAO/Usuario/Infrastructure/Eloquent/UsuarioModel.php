<?php

namespace Src\Shared\DAO\Usuario\Infrastructure\Eloquent;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UsuarioModel extends User
{
    use HasFactory;

    protected string $guard_name = 'api';
    protected $table = 'users';


    protected static function newFactory()
    {
        // return UserFactory::new();
    }
}
