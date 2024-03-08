<?php

namespace Src\Auth\Application;

use Src\Auth\Application\LoginUsuarioCommand;
use Src\Auth\Domain\Interfaces\UsuarioInterfaceRepository;

class LoginUsuarioCommandHandler
{
    public function __construct(
        protected UsuarioInterfaceRepository $usuarioRepository,
    ) {
    }

    public function run(LoginUsuarioCommand $command)
    {
        return $this->usuarioRepository->loginUsuario($command);
    }
}
