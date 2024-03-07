<?php

namespace Src\Shared\Bus\CommandBus\Infrastructure;

use Src\Shared\Bus\CommandBus\Domain\CommandBus;
use Src\Shared\Bus\Shared\Domain\Entity\CommandQueryHandler;
use Src\Shared\Bus\Shared\Domain\Middleware\TransactionMiddleware;

class CommandBusFacade
{
    public static function create(): CommandBus
    {
        return (new CommandBus(
            TransactionMiddleware::class,
            /** este debe ser el ultimo middleware que invoca al caso de uso */
            CommandQueryHandler::class
        ));
    }

    public static function process($request)
    {
        return self::create()->handle($request);
    }
}
