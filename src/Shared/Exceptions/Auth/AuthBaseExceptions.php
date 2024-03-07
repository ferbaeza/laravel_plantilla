<?php

namespace Src\Shared\Exceptions\Auth;

use Src\Shared\Exceptions\Base\CustomBaseException;

class AuthBaseExceptions extends CustomBaseException
{
    protected static $messages = [
        AuthTokenNoExisteException::class => 'El token no existe',
    ];
}
