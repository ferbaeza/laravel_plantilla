<?php

namespace Src\Shared\Laravel\Console\CustomCommands\Dao\templates;

// namespace App\Console\Commands\Dao\templates;

use Src\Shared\Dao\Context\Infrastructure\Datasource\ContextBaseRepository;
use Src\Shared\Dao\Context\Domain\Interfaces\ContextBaseRepositoryInterface;

class ContextBaseRegisterBindings
{
    public static function singletons(): array
    {
        return [
            /** @phpstan-ignore-next-line */
            ContextBaseRepositoryInterface::class => ContextBaseRepository::class,
        ];
    }
}
