<?php

namespace Src\Custom\Application;

use Src\Shared\Criteria\Criteria;
use Src\Custom\Domain\Interfaces\CustomInterfaceRepository;
use Src\Custom\Domain\Interfaces\CustomUsuarioInterfaceRepository;

class CustomUseCaseCommandHandler
{
    public function __construct(
        protected CustomInterfaceRepository $repository,
        protected CustomUsuarioInterfaceRepository $usuarioRepository
    ) {
    }


    public function run(CustomUseCaseCommand $command)
    {
        $criteria = new Criteria();
        $criteria->where('email', $command->email);
        $criteria->where('segundo_apellido', 'Test');
        $usuario = $this->usuarioRepository->getEntity($criteria);

        $repo = $this->repository->save($usuario);
        return
            [
            'Usuario buscado segun Criteria' => $usuario->jsonSerialize(),
            'Resultado de todos los Usuarios' => $repo
            ];
    }
}
