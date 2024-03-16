<?php

namespace Src\Shared\Dao\Zeta\Domain\Entity;

use JsonSerializable;

class ZetaBaseEntity implements JsonSerializable
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
