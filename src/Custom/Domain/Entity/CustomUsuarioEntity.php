<?php

namespace Src\Custom\Domain\Entity;

use Src\Shared\Utils\Strings\StringsUtil;
use Src\Shared\Laravel\Entity\CustomBaseEntity;
use Src\Custom\Application\CustomUseCaseCommand;

class CustomUsuarioEntity extends CustomBaseEntity
{
    public function __construct(
        public readonly string $nombre,
        public readonly string $email,
    ) {
    }
}
