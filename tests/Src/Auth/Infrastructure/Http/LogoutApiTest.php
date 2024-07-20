<?php

namespace Tests\Src\Auth\Infrastructure\Http;

use Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;
use Tests\Utils\Usuarios\UsuarioTestModel;



class LogoutApiTest extends TestCase
{
    #[Test]
    public function logout()
    {
        $userLogin = UsuarioTestModel::admin();
        $response = $this->actingAs($userLogin)->post(route('logout'));
        $response->assertStatus(200);
    }
}
