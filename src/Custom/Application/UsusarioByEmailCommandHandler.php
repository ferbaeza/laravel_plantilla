<?php

namespace Src\Custom\Application;

use Src\Shared\Criteria\Criteria;
use Src\Custom\Domain\Interfaces\CustomInterfaceRepository;
use Src\Custom\Domain\Interfaces\CustomUsuarioInterfaceRepository;

class UsusarioByEmailCommandHandler
{
    public function __construct(
        protected CustomInterfaceRepository $repository,
        protected CustomUsuarioInterfaceRepository $usuarioRepository
    ) {
    }


    public function run(UsusarioByEmailCommand $command)
    {
        $criteria = new Criteria();
        $criteria->with('roles');
        $usuario = $this->usuarioRepository->getEntity($criteria);

        dd($usuario);

        $repo = $this->repository->save($usuario);
        return
            [
                'Usuario buscado segun Criteria' => $usuario->jsonSerialize(),
                'Resultado de todos los Usuarios' => $repo
            ];
    }
}
