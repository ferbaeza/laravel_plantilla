<?php

namespace Src\Shared\Kernel\Exceptions\ValueObjects;


class EmailInvalidoException extends ValueObjectException
{
    public const MESSAGE = "El email %s no cumple el formato";
}
