<?php

namespace Src\Shared\Laravel\Exceptions\Usuario;

use Src\Shared\Laravel\Exceptions\Base\CustomBaseException;

class UsuarioBaseException extends CustomBaseException
{
    protected static $messages = [
        EmailUsuarioYaVerificadoException::class => EmailUsuarioYaVerificadoException::BODY,
    ];
}
