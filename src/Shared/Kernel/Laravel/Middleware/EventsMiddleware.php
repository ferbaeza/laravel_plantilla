<?php

namespace Src\Shared\Kernel\Laravel\Middleware;

use Src\Shared\Kernel\Bus\Infrastructure\EventDispatcher;


class EventsMiddleware
{
    public function process($command, $handler)
    {
        $result =  $handler->handle($command);
        EventDispatcher::dispatch($command);
        return $result;
    }
}
