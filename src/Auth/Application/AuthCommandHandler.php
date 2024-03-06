<?php

namespace Src\Auth\Application;

use Src\Auth\Application\AuthCommand;
use Src\Auth\Domain\Entity\AuthEntity;
use Src\Auth\Domain\Interfaces\AuthInterfaceRepository;

class AuthCommandHandler
{
    public function __construct(
        protected readonly AuthInterfaceRepository $homeInterfaceRepository
    ) {
    }
    public function run(AuthCommand $command)
    {
        $saludo = $this->homeInterfaceRepository->hello();
        // dd($saludo);
        return AuthEntity::fromCommand($command, $saludo);
    }
}
