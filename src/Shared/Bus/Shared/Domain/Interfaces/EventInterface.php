<?php

namespace Src\Shared\Bus\Shared\Domain\Interfaces;

interface EventInterface
{
    public function dispatch($request, $handler);
}
