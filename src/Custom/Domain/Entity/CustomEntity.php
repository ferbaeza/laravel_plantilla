<?php

namespace Src\Custom\Domain\Entity;

use Src\Shared\Utils\Strings\StringsUtil;
use Src\Shared\Laravel\Entity\CustomBaseEntity;
use Src\Custom\Application\CustomUseCaseCommand;

class CustomEntity extends CustomBaseEntity
{
    public function __construct(
        public readonly string $nombre,
        public readonly ?int $edad,
    ) {
    }

    public static function fromCommand(CustomUseCaseCommand $command)
    {
        return new self(StringsUtil::capitalize($command->nombre), $command->edad);
    }
}
