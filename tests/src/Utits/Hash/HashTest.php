<?php

namespace Tests\src\Utits\Hash;

use Tests\TestCase;
use Illuminate\Support\Facades\Hash;

/**
* @group utils
* @group hash
**/

class HashTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    /** @test*/
    public function password_hash()
    {
        $password = 'password';
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $this->assertTrue(password_verify($password, $hashedPassword));
    }

    /** @test*/
    public function it_should_return_hashed_password_using_Hash()
    {
        $password = 'password';
        $hashedPassword = Hash::make($password);
        $this->assertTrue(Hash::check($password, $hashedPassword));
    }

}