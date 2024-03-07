<?php

namespace Src\Shared\Bus\Shared\Domain\Middleware;

use Src\Shared\Bus\Shared\Domain\Entity\EventDispatcher;
use Src\Shared\Bus\Shared\Domain\Interfaces\MiddlewareInterface;

class EventsMiddleware implements MiddlewareInterface
{
    public function process($command, $handler)
    {
        $result =  $handler->handle($command);
        EventDispatcher::dispatch($command);
        return $result;
    }
}
