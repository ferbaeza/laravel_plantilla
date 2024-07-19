<?php

namespace Src\Auth\Core\Service;

use Illuminate\Support\Facades\Auth;

class LoginService
{
    /**
     * @SuppressWarnings(PHPMD.BooleanArgumentFlag)
     */
    public function login(string $user, string $password, bool $recordar = false): bool
    {
        if (Auth::attempt(['usuario' => $user, 'password' => ($password)], $recordar)) {
            return true;
        }

        

        return false;
    }

}
