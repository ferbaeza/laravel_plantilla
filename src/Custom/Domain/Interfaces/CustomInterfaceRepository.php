<?php

namespace Src\Custom\Domain\Interfaces;

use Src\Custom\Domain\Entity\CustomEntity;

interface CustomInterfaceRepository
{
    public function save(CustomEntity $entidad): string;
}
