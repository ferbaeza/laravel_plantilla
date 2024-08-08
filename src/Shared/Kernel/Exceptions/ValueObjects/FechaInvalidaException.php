<?php

namespace Src\Shared\Kernel\Exceptions\ValueObjects;


class FechaInvalidaException extends ValueObjectException
{
    public const MESSAGE = "La fecha %s no cumple el formato";
}
