<?php

namespace Src\Shared\Kernel\Bus\Domain\DTO;

final readonly class UserLoggerDTO
{
    public function __construct(
        public string $id,
        public string $name,
        public string $usuario,
        public ?string $apellidoPrimero,
        public ?string $apellidoSegundo,
        public string $email,
    )
        {
    }

}
