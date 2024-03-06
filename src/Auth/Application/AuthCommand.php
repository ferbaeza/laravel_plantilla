<?php

namespace Src\Auth\Application;

class AuthCommand
{
    public function __construct(
        public readonly string $nombre
    ) {
    }
}
