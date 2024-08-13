<?php

namespace Src\Auth\Core\Adapters\Driver;

use Src\Shared\Contrats\Response;
use Illuminate\Support\Facades\Auth;
use Src\Auth\Application\AuthLoginCommand;
use Src\Auth\Application\AuthLogoutCommand;
use Src\Auth\Domain\Response\LogoutResponse;
use Src\Shared\Kernel\Base\BaseKernelEntity;
use Src\Shared\Kernel\Laravel\Traits\LoggerTrait;
use Src\Shared\Kernel\ValueObjects\Main\UuidValue;
use Src\Auth\Core\Ports\Driver\AuthDriverInterface;
use Src\Shared\Kernel\Bus\Infrastructure\CommandBusFacade;

final class AuthAdapter extends BaseKernelEntity implements AuthDriverInterface
{
    public function __construct(
        
    )
        {
            parent::__construct();
    }
    use LoggerTrait;

    public function login(string $identidad, string $password): Response
    {
        $command = new AuthLoginCommand(identidad: $identidad, password: $password);
        return CommandBusFacade::process($command);
    }
    
    public function logout(): Response
    {
        $idUsuario = new UuidValue(auth()->id());
        $command = new AuthLogoutCommand(idUsuario: $idUsuario);
        // self::log($command);
        CommandBusFacade::process($command);
        return new LogoutResponse(id: $idUsuario);
    }
}
