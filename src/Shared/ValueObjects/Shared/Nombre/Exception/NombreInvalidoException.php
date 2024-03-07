<?php

declare(strict_types=1);

namespace Src\Shared\ValueObjects\Shared\Nombre\Exception;

use RuntimeException;

class NombreInvalidoException extends RuntimeException
{
    public const MESSAGE = "El Nombre %s no puede ser nulo o vacio";


    public static function drop(string $nombre)
    {
        return new self(
            sprintf(self::MESSAGE, $nombre)
        );
    }
}
