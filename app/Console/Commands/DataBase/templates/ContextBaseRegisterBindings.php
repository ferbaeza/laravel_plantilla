<?php

namespace App\Console\Commands\Shared\DataBase\templates;

use Src\Shared\Database\Context\Infrastructure\Persistence\ContextBaseRepository;
use Src\Shared\Database\Context\Domain\Interfaces\ContextBaseRepositoryInterface;

class ContextBaseRegisterBindings
{
    public static function singletons(): array
    {
        return [
            ContextBaseRepositoryInterface::class => ContextBaseRepository::class,
        ];
    }
}
