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
        $user = User::find(1);
        $userLogin = User::factory()->create();

        $request = [
            'email' => $userLogin->email,
            'password' => $userLogin->password
        ];

        // $request = [
        //     'email' => 'mail@mail.com',
        //     'password' => 'password'
        // ];

        $response = $this->actingAs($user)->post(route('login', $request));
        dd($response);
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data' => []
        ]);
    }

}