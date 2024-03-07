<?php

namespace Src\Shared\Bus\Shared\Domain\Entity;

class EventDispatcher
{
    public static function dispatch($command)
    {
        dd($command);
    }
}
