<?php

namespace Src\Custom\Application;

use Src\Custom\Domain\Entity\CustomEntity;
use Src\Custom\Domain\Interfaces\CustomInterfaceRepository;

class CustomUseCaseHandler
{
    public function __construct(
        protected CustomInterfaceRepository $repository
    )
        {
    }


    public function run(CustomUseCase $command)
    {
        $entity = CustomEntity::fromCommand($command->name);
        $repo = $this->repository->save($entity);
        return 
        [
            'entity' => $entity->jsonSerialize(), 
            'message' => $repo
        ];
    }
}
