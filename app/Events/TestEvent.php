<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;
use Src\Shared\Kernel\Bus\Domain\BaseEvent;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class TestEvent extends BaseEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    public function __construct(
        public readonly string $name,
        public readonly string $email,
    )
    {
    }
}
