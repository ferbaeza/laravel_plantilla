<?php

namespace Src\Shared\Laravel\Exceptions\Base;

use RuntimeException;

abstract class CustomBaseException extends RuntimeException
{
    protected static $messages = [];

    public static function create()
    {
        /** @phpstan-ignore-next-line */
        return new static(static::$messages[static::class]);
    }

    public static function drop(mixed $mensaje = '')
    {
        $message = static::$messages[static::class];
        $finalMessage = str_replace('%s', $mensaje, $message);
        /** @phpstan-ignore-next-line */
        return new static($finalMessage);
    }
}
