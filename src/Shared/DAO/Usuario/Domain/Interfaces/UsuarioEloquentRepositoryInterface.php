<?php

namespace Src\Shared\DAO\Usuario\Domain\Interfaces;

use Baezeta\Kernel\Criteria\Criteria;

interface UsuarioEloquentRepositoryInterface
{
    public function getEntity(Criteria $criteria);
}
