<?php

namespace Src\Shared\Kernel\Exceptions\ValueObjects;

use Src\Shared\Kernel\Exceptions\KernelBaseException;


class ValueObjectException extends KernelBaseException
{
    protected static $messages = [
        UuidException::class => UuidException::MESSAGE,
        EmailInvalidoException::class => EmailInvalidoException::MESSAGE,
    ];
}
