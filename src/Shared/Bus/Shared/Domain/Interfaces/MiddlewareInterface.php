<?php

namespace Src\Shared\Bus\Shared\Domain\Interfaces;

interface MiddlewareInterface
{
    public function process($request, $handler);
}
