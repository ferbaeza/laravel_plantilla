<?php

namespace App\Console\Commands\Dao\templates;

use Src\Shared\Dao\Context\Infrastructure\Datasource\ContextBaseRepository;
use Src\Shared\Dao\Context\Domain\Interfaces\ContextBaseRepositoryInterface;

class ContextBaseRegisterBindings
{
    public static function singletons(): array
    {
        return [
            ContextBaseRepositoryInterface::class => ContextBaseRepository::class,
        ];
    }
}
