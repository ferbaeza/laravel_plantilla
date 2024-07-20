<?php

namespace Src\Shared\DAO\Usuario\Domain\DTO;

use Baezeta\Kernel\ValueObjects\Main\UuidValue;

class UsuarioDTO
{
    public function __construct(
        public readonly UuidValue $id,
        public readonly string $name,
        public readonly string $usuario,
        public readonly string $apellidoPrimero,
        public readonly string $apellidoSegundo,
        public readonly string $email,
    )
        {
    }
}
