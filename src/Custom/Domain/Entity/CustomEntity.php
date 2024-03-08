<?php

namespace Src\Custom\Domain\Entity;

use Nette\Utils\Strings;
use Src\Shared\Utils\Strings\StringsUtil;
use Src\Custom\Application\CustomUseCaseCommand;

class CustomEntity implements \JsonSerializable
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

    public function jsonSerialize(): mixed
    {
        return get_object_vars($this);
    }
}
