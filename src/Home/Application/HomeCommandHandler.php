<?php

namespace Src\Home\Application;

use Src\Home\Domain\Entity\HomeEntity;
use Src\Home\Domain\Interfaces\HomeInterfaceRepository;

class HomeCommandHandler
{
    public function __construct(
        protected readonly HomeInterfaceRepository $homeInterfaceRepository
    )
        {
    }
    public function run(HomeCommand $command)
    {
        $saludo = $this->homeInterfaceRepository->hello();
        // dd($saludo);
        return HomeEntity::fromCommand($command, $saludo);
    }

}
