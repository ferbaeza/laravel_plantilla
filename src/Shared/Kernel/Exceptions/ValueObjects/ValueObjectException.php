<?php

namespace Src\Shared\Kernel\Exceptions\ValueObjects;

use Src\Shared\Kernel\Exceptions\BaseException;


class ValueObjectException extends BaseException
{
    protected static $messages = [
        UuidException::class => UuidException::MESSAGE,
        EmailInvalidoException::class => EmailInvalidoException::MESSAGE,
    ];
}
