<?php

namespace Src\Shared\ValueObjects\Interfaces;

use JsonSerializable;

abstract class CustomBaseValueObject implements JsonSerializable
{
    abstract public function value();
}
