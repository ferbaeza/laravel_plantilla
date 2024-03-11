<?php

namespace Src\Shared\Dao\Role\Infrastructure\Eloquent;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoleFactory extends Factory
{
    protected $model = RoleModel::class;

    public function definition(): array
    {
        return [
            'id' => Str::uuid(),
            'nombre' => fake()->name(),
        ];
    }
}
