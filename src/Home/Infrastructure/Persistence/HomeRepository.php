<?php

namespace Src\Home\Infrastructure\Persistence;

use Src\Home\Domain\Interfaces\HomeInterfaceRepository;

class HomeRepository implements HomeInterfaceRepository
{
    public function hello(): string
    {
        return 'Hello World & %s from the Home repository!' ;
    }
}
