<?php

namespace Src\Shared\Dao\Zeta\Infrastructure\Bindings;

use Src\Shared\Dao\Zeta\Infrastructure\Datasource\ZetaBaseRepository;
use Src\Shared\Dao\Zeta\Domain\Interfaces\ZetaBaseRepositoryInterface;

class ZetaBaseRegisterBindings
{
    public static function singletons(): array
    {
        return [
            ZetaBaseRepositoryInterface::class => ZetaBaseRepository::class,
        ];
    }
}
