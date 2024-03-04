<?php

namespace Src\Custom\Domain\Entity;

use Nette\Utils\Strings;
use Src\Shared\Utils\Strings\StringUtil;

class CustomEntity implements \JsonSerializable
{
    public function __construct(
        public readonly string $name,
        public readonly int $age,
    )
        {
    }

    public static function fromCommand(string $name)
    {
        return new self(StringUtil::capitalize($name), 40);
    }

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }


}
