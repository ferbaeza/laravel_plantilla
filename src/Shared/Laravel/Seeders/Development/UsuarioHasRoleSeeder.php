<?php

namespace Src\Shared\Laravel\Seeders\Development;

use Illuminate\Database\Seeder;
use Src\Shared\Dao\Role\Infrastructure\Eloquent\RoleModel;
use Src\Shared\Dao\User\Infrastructure\Eloquent\UserModel;
use Src\Shared\Dao\UsuarioHasRole\Infrastructure\Eloquent\UsuarioHasRoleModel;

class UsuarioHasRoleSeeder extends Seeder
{
    public function run(): void
    {
        
        $user = UserModel::where('email','=' ,'baezacode@gmail.com')->first();
        $role = RoleModel::where('nombre', 'admin')->first();

        UsuarioHasRoleModel::factory([
            'fk_usuario_id' => $user->id,
            'fk_role_id' => $role->id,
            'usuario' => $user->nombre,
            'role' => $role->nombre,
            
        ])->create();
    }
}
