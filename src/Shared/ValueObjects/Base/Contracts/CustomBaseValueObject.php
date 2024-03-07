<?php

namespace Src\Shared\ValueObjects\Base\Contracts;

use JsonSerializable;

abstract class CustomBaseValueObject
{
    abstract public function value(): mixed;
}
