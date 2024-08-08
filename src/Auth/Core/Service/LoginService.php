<?php

namespace Src\Auth\Core\Service;

use Illuminate\Support\Facades\Auth;
use Src\Shared\Kernel\Utils\Primitivos\StringUtils;

class LoginService
{
    /**
     * @SuppressWarnings(PHPMD.BooleanArgumentFlag)
     */
    public function loginByEmail(string $identidad, string $password, bool $recordar = false): bool
    {
        if (Auth::attempt(['email' => StringUtils::minusculas($identidad), 'password' => ($password)], $recordar)) {
            return true;
        }
        return false;
    }

    /**
     * @SuppressWarnings(PHPMD.BooleanArgumentFlag)
     */
    public function loginByName(string $identidad, string $password, bool $recordar = false): bool
    {
        if (Auth::attempt(['name' => StringUtils::capitalizar($identidad), 'password' => ($password)], $recordar)) {
            return true;
        }
        return false;
    }

}
