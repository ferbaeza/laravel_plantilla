<?php

namespace Src\Shared\Bus\QueryBus\Infrastructure;

use Src\Shared\Bus\QueryBus\Domain\QueryBus;
use Src\Shared\Bus\Shared\Domain\Entity\CommandQueryHandler;

class QueryBusFacade
{
    public static function create(): QueryBus
    {
        return (new QueryBus(
            /** este debe ser el ultimo middleware que invoca al caso de uso */
            CommandQueryHandler::class
        ));
    }

    public static function process($request)
    {
        return self::create()->handle($request);
    }
}
