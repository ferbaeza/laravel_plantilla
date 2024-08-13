<?php

namespace Src\Shared\Kernel\Bus\Infrastructure;

use Src\Shared\Kernel\Bus\Domain\Entity\BusEntity;
use Src\Shared\Kernel\Middleware\EventsMiddleware;
use Src\Shared\Kernel\Bus\Domain\Entity\BusHandler;
use Src\Shared\Kernel\Bus\Infrastructure\LoggerTrait;
use Src\Shared\Kernel\Middleware\TransaccionMiddleware;


class CommandBusFacade
{
    use LoggerTrait;

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
        self::log($dto);
        return self::create()->handle($dto);
    }
}
