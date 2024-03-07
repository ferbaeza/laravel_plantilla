<?php

namespace Src\Auth\Domain\DTO;

class UrlRegistroDto
{
    public function __construct(
        public readonly string $url,
        public readonly string $token,
    ) {
    }

    public static function create(string $token): self
    {
        return new self(
            url: config('app.auth.invitacion') . "/$token",
            token: $token
        );
    }
}
