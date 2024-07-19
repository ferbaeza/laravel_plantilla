<?php

namespace Tests\Src\Auth\Infrastructure\Http;

use Tests\TestCase;
use App\Models\User;

class LoginApiTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    /** @test*/
    public function it_should_return_a_token_when_user_login()
    {
        $userLogin = User::find(1);

        $request = [
            'name' => $userLogin->name,
            'password' => 'password'
        ];

        $response = $this->post(route('login', $request));
        dd($response->json());
        $response->dd();
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data' => []
        ]);
    }

}