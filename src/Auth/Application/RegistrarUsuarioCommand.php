<?php

namespace Src\Auth\Application;

class RegistrarUsuarioCommand
{
    public function __construct(
        public readonly string $email
    ) {
    }
}
