<?php

namespace Src\Shared\Dao\User\Infrastructure\Eloquent;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;
use Src\Shared\Dao\Role\Infrastructure\Eloquent\RoleModel;
use Src\Shared\Dao\UsuarioHasRole\Infrastructure\Eloquent\UsuarioHasRoleModel;

class UserFactory extends Factory
{
    protected $model = UserModel::class;

    public function definition(): array
    {
        return [
            'id' => Str::uuid(),
            'nombre' => fake()->name(),
            'primer_apellido' => fake()->name(),
            'segundo_apellido' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ];
    }
}
