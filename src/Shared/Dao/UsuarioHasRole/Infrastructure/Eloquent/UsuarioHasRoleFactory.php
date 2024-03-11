<?php

namespace Src\Shared\Dao\UsuarioHasRole\Infrastructure\Eloquent;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;
use Src\Shared\Dao\Role\Infrastructure\Eloquent\RoleModel;
use Src\Shared\Dao\User\Infrastructure\Eloquent\UserModel;

class UsuarioHasRoleFactory extends Factory
{
    protected $model = UsuarioHasRoleModel::class;

    public function definition(): array
    {
        return [
            'id' => Str::uuid(),
            'fk_usuario_id' => UserModel::factory()->new(),
            'fk_role_id' => RoleModel::factory()->new(),
        ];
    }
}