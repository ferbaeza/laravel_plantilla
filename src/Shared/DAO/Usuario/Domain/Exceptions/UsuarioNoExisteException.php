<?php

namespace Src\Shared\DAO\Usuario\Domain\Exceptions;

class UsuarioNoExisteException extends UsuarioBaseExceptions
{
    public const MENSAJE = 'El Usuario %s no existe';
}
