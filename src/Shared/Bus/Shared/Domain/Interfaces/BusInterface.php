<?php

namespace Src\Shared\Bus\Shared\Domain\Interfaces;

interface BusInterface
{
    public function handle($request);
}
