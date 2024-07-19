<?php

namespace Src\Auth\Core\Adapters\Driver;

use Src\Shared\Contrats\Response;
use Src\Auth\Application\AuthLoginCommand;
use Src\Auth\Core\Ports\Driver\AuthLoginDriverInterface;
use Baezeta\Kernel\Bus\Infrastructure\CommandBusFacade;

final class AuthLoginAdapter implements AuthLoginDriverInterface
{
    public function login(string $identidad, string $password): Response
    {
        $command = new AuthLoginCommand(identidad: $identidad, password: $password);
        return CommandBusFacade::process($command);
    }
}
