<?php

namespace Src\Custom\Application;

class CustomUseCaseCommand
{
    public function __construct(
        public readonly string $nombre,
        public readonly ?int $edad,
    ) {
    }
}