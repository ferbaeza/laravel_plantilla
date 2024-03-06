<?php

namespace Src\Shared\ValueObjects\Base\Contracts;

use JsonSerializable;

abstract class CustomBaseValueObject implements JsonSerializable
{
    abstract public function value(): mixed;
}
