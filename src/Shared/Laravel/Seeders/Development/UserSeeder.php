<?php

namespace Src\Shared\Laravel\Seeders\Development;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Src\Shared\Dao\User\Infrastructure\Eloquent\UserModel;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            'nombre' => 'Fernando',
            'primer_apellido' => 'Baeza',
            'segundo_apellido' => 'Hurtado',
            'email' => 'baezacode@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
        ];
        $user = UserModel::factory($data)->create();
    }
}
