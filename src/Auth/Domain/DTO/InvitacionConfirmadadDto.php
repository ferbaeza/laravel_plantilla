<?php

namespace Src\Auth\Domain\DTO;

class InvitacionConfirmadadDto
{
    public function __construct(
        public bool $estado,
        public readonly string $email,
    ) {
    }
}
