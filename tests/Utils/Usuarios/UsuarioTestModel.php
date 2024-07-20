<?php

namespace Tests\Utils\Usuarios;

use Src\Auth\Core\Laravel\Eloquent\UserSeeder;
use Src\Shared\DAO\Usuario\Infrastructure\Eloquent\UsuarioModel;

class UsuarioTestModel
{

    public static function admin()
    {
        return UsuarioModel::where('email', UserSeeder::ADMIN_EMAIL)->first();
    }

}
