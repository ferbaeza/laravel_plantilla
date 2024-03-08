<?php

namespace Src\Auth\Application;

class LoginUsuarioCommand
{
    public function __construct(
        public readonly string $email,
        public readonly string $password,
    ) {
    }
}
