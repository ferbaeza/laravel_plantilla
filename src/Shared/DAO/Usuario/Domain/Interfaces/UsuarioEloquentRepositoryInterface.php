<?php

namespace Src\Shared\DAO\Usuario\Domain\Interfaces;

use Src\Shared\Kernel\Criteria\Criteria;


interface UsuarioEloquentRepositoryInterface
{
    public function getEntity(Criteria $criteria);
}
