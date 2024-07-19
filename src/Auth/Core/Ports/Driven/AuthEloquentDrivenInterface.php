<?php

namespace Src\Auth\Core\Ports\Driven;

use Baezeta\Kernel\Criteria\Criteria;

interface AuthEloquentDrivenInterface
{
    public function obtenerUsuario(Criteria $criteria);
}
