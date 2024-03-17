<?php

namespace Src\Shared\Laravel\Console\CustomCommands\Dao\templates;
// namespace App\Console\Commands\Dao\templates;

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
