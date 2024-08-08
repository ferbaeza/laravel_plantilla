<?php

namespace Src\Shared\Kernel\Exceptions;

use RuntimeException;

abstract class KernelBaseException extends RuntimeException
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
