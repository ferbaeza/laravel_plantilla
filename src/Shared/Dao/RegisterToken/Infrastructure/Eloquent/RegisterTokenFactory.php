<?php

namespace Src\Shared\Dao\RegisterToken\Infrastructure\Eloquent;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class RegisterTokenFactory extends Factory
{
    protected $model = RegisterTokenModel::class;

    public function definition(): array
    {
        return [
            'id' => Str::uuid(),
            'email' => fake()->unique()->safeEmail(),
            'token' => fake()->linuxPlatformToken(),
        ];
    }
}
