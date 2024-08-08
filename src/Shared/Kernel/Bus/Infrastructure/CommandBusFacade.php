<?php

namespace Src\Shared\Kernel\Bus\Infrastructure;

use Src\Shared\Kernel\Bus\Domain\BusEntity;
use Src\Shared\Kernel\Bus\Domain\BusHandler;
use Src\Shared\Kernel\Middleware\EventsMiddleware;
use Src\Shared\Kernel\Middleware\TransaccionMiddleware;


class CommandBusFacade
{
    public static function create()
    {
        return new BusEntity(
            EventsMiddleware::class,
            TransaccionMiddleware::class,
            BusHandler::class
        );
    }

    public static function process($dto)
    {
        return self::create()->handle($dto);
    }
}
