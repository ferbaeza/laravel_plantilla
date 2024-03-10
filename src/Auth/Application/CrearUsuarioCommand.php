<?php

namespace Src\Auth\Application;

class CrearUsuarioCommand
{
    public function __construct(
        public readonly string $nombre,
        public readonly ?string $primerApellido,
        public readonly ?string $segundoApellido,
        public readonly string $email,
        public readonly string $password,
    ) {
    }
}
