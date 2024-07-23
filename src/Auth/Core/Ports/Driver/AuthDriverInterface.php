<?php

namespace Src\Auth\Core\Ports\Driver;

use Src\Shared\Contrats\Response;

interface AuthDriverInterface
{
    public function login(string $identidad, string $password): Response;
    public function logout(): Response;
}
