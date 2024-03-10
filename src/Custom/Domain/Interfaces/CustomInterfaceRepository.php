<?php

namespace Src\Custom\Domain\Interfaces;

use Src\Custom\Domain\Entity\CustomUsuarioEntity;

interface CustomInterfaceRepository
{
    public function save(CustomUsuarioEntity $entidad);
}
