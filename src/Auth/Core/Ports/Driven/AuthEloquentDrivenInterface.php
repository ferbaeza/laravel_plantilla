<?php

namespace Src\Auth\Core\Ports\Driven;

use Src\Shared\Kernel\Criteria\Criteria;


interface AuthEloquentDrivenInterface
{
    public function obtenerUsuario(Criteria $criteria);
}
