<?php

namespace Tests\src\Usuario\Infrastructure\Http;

use Tests\TestCase;

/**
* @group usuario
**/

class CrearUsuarioApiTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    /** @test*/
    public function deberia_crear_un_usuario_api_test()
    {
        $request =[
            'nombre' => 'Baeza',
            'email' => 'baezetacode@gmail.com',
            'password' => '100815'
        ];
        $response = $this->post(route('usuario.crearUsuario'), $request);
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data' => [
                'id',
                'nombre',
                'primerApellido',
                'segundoApellido',
                'email',
                'password'
            ],
            'success',
            'status'
        ]);
    }
}