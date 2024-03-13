<?php

namespace Src\Shared\Eventos\Custom;

use Src\Shared\Laravel\Events\BaseEvent;

class CustomExampleEvent extends BaseEvent
{
    public function __construct(
        public readonly string $id
    ) {
    }
}
