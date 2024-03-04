<?php

namespace Src\Shared\ValueObjects;

use Src\Shared\ValueObjects\Interfaces\CustomBaseValueObject;

class StringValueObject extends CustomBaseValueObject
{
    public function __construct(
        protected readonly string $value
    )
        {
    }

    public function value(): string
    {
        return $this->value;
    }

    public function jsonSerialize(): mixed
    {
        return $this->value;
    }
}
