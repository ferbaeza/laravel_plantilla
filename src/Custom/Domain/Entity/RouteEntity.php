<?php

namespace Src\Custom\Domain\Entity;

use Src\Shared\Laravel\Entity\CustomBaseEntity;

class RouteEntity extends CustomBaseEntity
{
    public function __construct(
        public readonly string $nombre,
    ) {
    }
}
