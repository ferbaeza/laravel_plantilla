<?php

namespace Src\Custom\Application;

use Src\Custom\Domain\Entity\CustomEntity;
use Src\Custom\Domain\Interfaces\CustomInterfaceRepository;

class CustomUseCaseCommandHandler
{
    public function __construct(
        protected CustomInterfaceRepository $repository
    ) {
    }


    public function run(CustomUseCaseCommand $command)
    {
        $entity = CustomEntity::fromCommand($command);
        $repo = $this->repository->save($entity);
        return
            [
                'entity' => $entity->jsonSerialize(),
                'message' => $repo
            ];
    }
}
