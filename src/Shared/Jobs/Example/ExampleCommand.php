<?php

namespace Src\Shared\Jobs\Example;

class ExampleCommand
{
    public function __construct(
        private string $id
    ) {
    }
}
