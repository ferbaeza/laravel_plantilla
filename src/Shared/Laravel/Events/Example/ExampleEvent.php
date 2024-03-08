<?php

namespace Src\Shared\Laravel\Events\Example;

class ExampleEvent
{
    public function __construct(
        public readonly string $id
    ) {
    }
}
