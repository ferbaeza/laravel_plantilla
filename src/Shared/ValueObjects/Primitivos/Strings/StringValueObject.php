<?php

namespace Src\Shared\ValueObjects\Primitivos\Strings;

use JsonSerializable;
use Src\Shared\ValueObjects\Base\Contracts\CustomBaseValueObject;

class StringValueObject extends CustomBaseValueObject implements JsonSerializable
{
    public function __construct(
        protected readonly string $value
    ) {
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
