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
        $key = random_bytes(SODIUM_CRYPTO_SECRETBOX_KEYBYTES);
        $nonce = random_bytes(SODIUM_CRYPTO_SECRETBOX_NONCEBYTES);
        $ciphertext = sodium_crypto_secretbox($password, $nonce, $key);

        $expected = sodium_crypto_secretbox_open($ciphertext, $nonce, $key);


        $value = \openssl_encrypt(
            true ? serialize($password) : $password,
            strtolower('aes-128-cbc'),
            config('app.key'),
            0,
            config('app.iv'),
            $tag
        );
        dd($value, openssl_decrypt(
            $value,
            strtolower('aes-128-cbc'),
            config('app.key'),
            0,
            config('app.iv'),
            $tag
        ), $ciphertext, $expected);


        $hashedPassword = Hash::make($password);
        $this->assertTrue(Hash::check($password, $hashedPassword));
    }

}