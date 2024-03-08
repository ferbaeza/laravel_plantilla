<?php

namespace Src\Shared\Laravel\Jobs\Example;

class ExampleCommand
{
    public function __construct(
        private string $id
    ) {
    }
}
