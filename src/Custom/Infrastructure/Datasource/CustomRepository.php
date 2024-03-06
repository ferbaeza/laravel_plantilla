<?php

namespace Src\Custom\Infrastructure\Datasource;

use Src\Custom\Domain\Entity\CustomEntity;
use Src\Custom\Domain\Interfaces\CustomInterfaceRepository;

class CustomRepository implements CustomInterfaceRepository
{
    public function save(CustomEntity $entidad): string
    {
        /**Repository to save a get Data */
        return "Data saved: " . $entidad->jsonSerialize();
    }
}
