<?php

namespace Src\Auth\Application;

use Src\Auth\Application\LoginUsuarioCommand;
use Src\Auth\Domain\Interfaces\AuthUsuarioInterfaceRepository;

class LoginUsuarioCommandHandler
{
    public function __construct(
        protected AuthUsuarioInterfaceRepository $usuarioRepository,
    ) {
    }

    public function run(LoginUsuarioCommand $command)
    {
        return $this->usuarioRepository->loginUsuario($command);
    }
}
