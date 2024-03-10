<?php

namespace Src\Shared\Laravel\Exceptions\Usuario;

class EmailUsuarioYaVerificadoException extends UsuarioBaseException
{
    const BODY = 'El email ya ha sido verificado';
}
