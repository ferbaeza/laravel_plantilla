<?php

namespace Src\Home\Application;

class HomeCommand
{
    public function __construct(
        public readonly string $nombre
    ) {
    }
}
