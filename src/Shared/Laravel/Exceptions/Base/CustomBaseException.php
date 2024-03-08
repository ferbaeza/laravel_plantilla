<?php

namespace Src\Shared\Laravel\Exceptions\Base;

use RuntimeException;

class CustomBaseException extends RuntimeException
{
    protected static $messages = [];

    public static function create()
    {
        return new self(static::$messages[static::class]);
    }
}
