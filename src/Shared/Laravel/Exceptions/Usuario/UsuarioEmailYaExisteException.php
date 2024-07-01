<?php

namespace Src\Shared\Laravel\Exceptions\Usuario;

class UsuarioEmailYaExisteException extends UsuarioBaseException
{
    const BODY = 'El email %s ya existe';
}
