<?php

namespace Src\Auth\Core\Ports\Driver;

use Src\Shared\Contrats\Response;

interface AuthLoginDriverInterface
{
    public function login(string $identidad, string $password): Response;
}
