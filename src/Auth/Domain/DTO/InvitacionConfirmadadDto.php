<?php

namespace Src\Auth\Domain\DTO;

class InvitacionConfirmadadDto
{
    public function __construct(
        public bool $estado,
        public readonly string $email,
    ) {
    }

    public static function create(string $email): self
    {
        return new self(
            estado: true,
            email: $email
        );
    }
}
