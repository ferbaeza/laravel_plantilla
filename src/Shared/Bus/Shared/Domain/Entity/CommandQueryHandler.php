<?php

namespace Src\Shared\Bus\Shared\Domain\Entity;

use Src\Shared\Bus\Shared\Domain\Interfaces\MiddlewareInterface;

class CommandQueryHandler implements MiddlewareInterface
{
    public function process($request, $handler)
    {
        $handler->handle($request);
        $handlerClass = get_class($request) . 'Handler';
        $casoUso = app()->make($handlerClass);
        return $casoUso->run($request);
    }
}
