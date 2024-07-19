<?php

namespace Src\Auth\Core\Adapters;

use Baezeta\Kernel\Bus\Infrastructure\CommandBusFacade;
use Src\Shared\Contrats\Response;
use Src\Auth\Application\AuthLoginCommand;
use Src\Auth\Core\Ports\AuthLoginPortInterface;

class AuthLoginAdapter implements AuthLoginPortInterface
{
    public function login(string $user, string $password): Response
    {
        $command = new AuthLoginCommand(credenciales : $user, password: $password);
        return CommandBusFacade::process($command);
    }

}
