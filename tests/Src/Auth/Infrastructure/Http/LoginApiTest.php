<?php

namespace Tests\Src\Auth\Infrastructure\Http;

use Tests\TestCase;

class LoginApiTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    /** @test*/
    public function it_should_return_a_token_when_user_login()
    {
        $request = [
            'email' => 'mail@mail.com',
            'password' => 'password'
        ];
        dd(route('login'), $request);
        $response = $this->postJson(route('login'), $request);
        $response->assertStatus(200);
        $response->assertJsonStructure(['token']);
    }

}