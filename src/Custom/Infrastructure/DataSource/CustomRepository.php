<?php

namespace Src\Custom\Infrastructure\DataSource;

use Src\Custom\Domain\Interfaces\CustomInterfaceRepository;

class CustomRepository implements CustomInterfaceRepository
{
    public function save()
    {
        /**Repository to save a get Data */
        return 'Data saved';
    }

}
