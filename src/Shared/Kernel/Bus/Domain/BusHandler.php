<?php

namespace Src\Shared\Kernel\Bus\Domain;

use Illuminate\Container\Container;

class BusHandler
{
    public function process($request, $handler)
    {
        $handler->handle($request);

        $class = get_class($request) . 'Handler';
        $casoUso = Container::getInstance()->make($class);

        return $casoUso->run($request);
    }

}
