<?php

namespace Src\Shared\Kernel\Exceptions\ValueObjects;


class UuidException extends ValueObjectException
{
    public const MESSAGE = "El UUID %s no cumple el formato";
}
