<?php

namespace Src\Shared\Events\Example;

class ExampleEvent
{
    public function __construct(
        public readonly string $id
    ) {
    }
}
