<?php

namespace Src\Auth\Core\Ports;

use Src\Shared\Contrats\Response;

interface AuthLoginPortInterface
{
    public function login(string $user, string $password): Response;
}
