<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\WithFaker;
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
            'id' => Str::uuid(),
            'nombre' => $this->faker->name,
            'apellido_primero' => $this->faker->firstName,
            'apellido_segundo' => $this->faker->lastName,
            'email' => $this->faker->email,
            'password' => Hash::make('password'),
        ];
    }
}
