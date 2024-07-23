<?php

namespace Tests\Src\Auth\Infrastructure\Http;

use Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\Group;
use Tests\Utils\Usuarios\UsuarioTestModel;

class LoginApiTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    #[Test]
    public function it_should_return_a_user_when_login()
    {
        $userLogin = UsuarioTestModel::admin();
        $request = [
            'name' => $userLogin->name,
            'password' => 'password'
        ];

        $response = $this->post(route('login', $request));
        $response->assertStatus(200);
        // dd($response->json());
        $response->assertJsonStructure([
            'data' => [
                'id',
                'usuario',
                'name',
                'apellidoPrimero',
                'apellidoSegundo',
                'email',
            ]
        ]);
    }

}