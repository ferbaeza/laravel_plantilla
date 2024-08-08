<?php

namespace Src\Auth\Core\Adapters\Driver;

use Src\Shared\Contrats\Response;
use Illuminate\Support\Facades\Auth;
use Src\Auth\Application\AuthLoginCommand;
use Src\Auth\Domain\Response\LogoutResponse;
use Src\Shared\Kernel\ValueObjects\Main\UuidValue;
use Src\Auth\Core\Ports\Driver\AuthDriverInterface;
use Src\Shared\Kernel\Bus\Infrastructure\CommandBusFacade;

final class AuthAdapter implements AuthDriverInterface
{
    public function login(string $identidad, string $password): Response
    {
        $command = new AuthLoginCommand(identidad: $identidad, password: $password);
        return CommandBusFacade::process($command);
    }

    public function logout(): Response
    {
        $idUsuario = auth()->id();
        Auth::guard('api')->logout();
        return new LogoutResponse(id: new UuidValue($idUsuario));
    }
}
