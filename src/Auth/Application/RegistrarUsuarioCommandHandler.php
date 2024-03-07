<?php

namespace Src\Auth\Application;

use Src\Auth\Application\RegistrarUsuarioCommand;
use Src\Auth\Domain\Interfaces\RegisterInterfaceRepository;

class RegistrarUsuarioCommandHandler
{
    public function __construct(
        protected RegisterInterfaceRepository $registerRepository
    ) {
    }

    public function run(RegistrarUsuarioCommand $command)
    {
        return $this->registerRepository->registrarUsuario($command);
    }
}
