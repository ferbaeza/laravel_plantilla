<?php

namespace App\Console\Commands\Shared\DataBase\templates;

use JsonSerializable;

class ContextBaseEntity implements JsonSerializable
{
    public function __construct(
        public readonly string $id,
        public readonly string $nombre,
    ) {
    }

    public function jsonSerialize(): mixed
    {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
        ];
    }
}
