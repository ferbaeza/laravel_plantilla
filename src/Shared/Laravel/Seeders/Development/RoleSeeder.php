<?php

namespace Src\Shared\Laravel\Seeders\Development;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Src\Shared\Dao\Role\Domain\Enums\RoleEnums;
use Src\Shared\Dao\Role\Infrastructure\Eloquent\RoleModel;
use Src\Shared\Dao\User\Infrastructure\Eloquent\UserModel;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $roles = RoleEnums::cases();
        // dd($roles);
        foreach ($roles as $role) {
            RoleModel::factory([
                'nombre' => $role->value,
            ])->create();
        }
    }
}
