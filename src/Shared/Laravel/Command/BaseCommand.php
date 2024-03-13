<?php

namespace Src\Shared\Laravel\Command;

abstract class BaseCommand
{
    // protected string $id;
    protected $fecha;

    public function __construct()
    {
        $this->fecha = now();
    }
}
