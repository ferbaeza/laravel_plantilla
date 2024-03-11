<?php

namespace Src\Custom\Domain\Entity;

use Src\Shared\Laravel\Entity\CustomBaseEntity;

class RouteEntity extends CustomBaseEntity
{
    const HOST = 'http://desarrollo2.zataca.com/';

    public function __construct(
        public readonly string $nombre,
        public readonly string $metodo,
    ) {
    }

    public function jsonSerialize(): mixed
    {
        return [
            'nombre' => self::HOST . $this->nombre,
        ];
    }
}
