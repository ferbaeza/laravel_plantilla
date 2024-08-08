<?php

namespace Tests\Src\Shared\Kernel\Collection;

class Usuario
{
    public function __construct(
        public readonly string $name,
        public readonly string $email,
        public readonly int $edad,
    )
        {
    }

}
