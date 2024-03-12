<?php

namespace Tests\src\Custom\Infrastructure;

use Tests\TestCase;
use Src\Shared\Dao\User\Infrastructure\Eloquent\UserModel;
use Src\Shared\Laravel\Exceptions\Usuario\UserNoExisteException;
use Src\Shared\ValueObjects\Shared\UuidValue\Entity\UuidValue;

class UsusarioByEmailCommandHandlerApiTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function getUsusarioByEmailApiTest()
    {
        $usuario = UserModel::factory([
            'id' => UuidValue::create(),
            'email' => 'baezacode@gmail.com'
        ])->create();

        UserModel::factory()->count(10)->create();

        $response = $this->get("/api/custom/getUsusarioByEmail/$usuario->email");
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data' => [
                'Usuario buscado segun Criteria' => [
                    'nombre',
                    'email'
                ],
                'Resultado de todos los Usuarios'
            ],
            "success",
            "status"
        ]);
    }

    /** @test */
    public function body()
    {
        $usuario = UserModel::factory([
            'email' => 'baezacode@gmail.com'
        ])->create();

        $email = [
            'email' => $usuario->email
        ];
        $response = $this->post('/api/custom/body', $email);
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data' => [
                'Usuario buscado segun Criteria' => [
                    'nombre',
                    'email'
                ],
                'Resultado de todos los Usuarios'
            ],
            "success",
            "status"
        ]);
    }
}
