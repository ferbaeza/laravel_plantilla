<?php

namespace Src\Usuario\Domain\Entity;

use Src\Shared\ValueObjects\Shared\UuidValue\Entity\UuidValue;

class UsuarioNuevoEntity
{
    public function __construct(
        public UuidValue $id,
        public string $nombre,
        public ?string $primerApellido,
        public ?string $segundoApellido,
        public string $email,
        public string $password,
    ) {
    }

}
