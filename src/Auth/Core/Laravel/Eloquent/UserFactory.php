<?php

namespace Src\Auth\Core\Laravel\Eloquent;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\WithFaker;
use Src\Shared\Kernel\ValueObjects\Main\UuidValue;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    use WithFaker;
    protected $model = User::class;


    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => UuidValue::create(),
            'name' => $this->faker->name,
            'apellido_primero' => $this->faker->firstName,
            'apellido_segundo' => $this->faker->lastName,
            'email' => $this->faker->email,
            'password' => Hash::make('password'),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
