<?php

namespace Src\Auth\Application;

use Src\Auth\Application\CrearUsuarioCommand;
use Src\Auth\Domain\Interfaces\UsuarioInterfaceRepository;

class CrearUsuarioCommandHandler
{
    public function __construct(
        protected readonly UsuarioInterfaceRepository $usuarioRepository
    ) {
    }
    public function run(CrearUsuarioCommand $command)
    {
        $user = $this->usuarioRepository->crearUsuario($command);
        return $user->jsonSerialize();
    }
}
