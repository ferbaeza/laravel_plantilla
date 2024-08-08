<?php

namespace Src\Auth\Core\Adapters\Driven;

use Src\Shared\Kernel\Criteria\Criteria;
use Src\Auth\Core\Ports\Driven\AuthEloquentDrivenInterface;
use Src\Shared\DAO\Usuario\Domain\Interfaces\UsuarioEloquentRepositoryInterface;

final class AuthEloquentAdapter implements AuthEloquentDrivenInterface
{
    public function __construct(
        public readonly UsuarioEloquentRepositoryInterface $usuarioEloquentRepository
    )
        {
    }
    public function obtenerUsuario(Criteria $criteria)
    {
        return $this->usuarioEloquentRepository->getEntity(criteria : $criteria);
    }

}
