<?php

namespace Src\Shared\DAO\Usuario\Infrastructure\Eloquent;

use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\WithFaker;
use Baezeta\Kernel\ValueObjects\Main\UuidValue;
use Baezeta\Kernel\Utils\Primitivos\StringUtils;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    use WithFaker;
    protected $model = UsuarioModel::class;


    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->name;
        return [
            'id' => UuidValue::create(),
            'name' => StringUtils::capitalizar($name),
            'usuario' => StringUtils::minusculas($name),
            'apellido_primero' => $this->faker->firstName,
            'apellido_segundo' => $this->faker->lastName,
            'email' => $this->faker->email,
            'password' => Hash::make('password'),
        ];
    }
}
