<?php

namespace Src\Shared\ValueObjects\Shared\Nombre;

use Src\Shared\ValueObjects\Base\Contracts\CustomBaseValueObject;
use Src\Shared\ValueObjects\Shared\Nombre\Exception\NombreInvalidoException;

class NombreCapitalizadoValueObject extends CustomBaseValueObject
{
    public function __construct(
        public readonly string $nombre
    ) {
        if (empty($this->nombre) || is_null($this->nombre)) {
            throw NombreInvalidoException::drop($this->nombre);
        }
        return ucwords($this->nombre);
    }

    public function value(): mixed
    {
        return $this->nombre;
    }
}
