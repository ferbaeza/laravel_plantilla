<?php

namespace Src\Auth\Infrastructure\Datasource;

use Src\Auth\Domain\Interfaces\AuthInterfaceRepository;

class AuthRepository implements AuthInterfaceRepository
{
    public function hello(): string
    {
        return 'Hello World & %s from the Home repository!';
    }
}
