<?php

namespace Src\Custom\Application;

use Src\Shared\Criteria\Criteria;
use Src\Custom\Domain\Interfaces\CustomInterfaceRepository;
use Src\Custom\Domain\Interfaces\CustomUsuarioInterfaceRepository;
use Src\Shared\Dao\Role\Infrastructure\Eloquent\RoleModel;
use Src\Shared\Dao\User\Infrastructure\Eloquent\UserModel;
use Src\Shared\Dao\UsuarioHasRole\Infrastructure\Eloquent\UsuarioHasRoleModel;

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

        $criteria->where('nombre', 'fer');
        $criteria->where('email', $command->getEmail());
        $criteria->with('roles');
        $usuario = $this->usuarioRepository->getEntity($criteria);
        // $usuario = $this->usuarioRepository->getCollection($criteria);
        $repo = $this->repository->save($usuario);
        return
            [
                'Usuario buscado segun Criteria' => $usuario->jsonSerialize(),
                'Resultado de todos los Usuarios' => $repo
            ];
    }
}
