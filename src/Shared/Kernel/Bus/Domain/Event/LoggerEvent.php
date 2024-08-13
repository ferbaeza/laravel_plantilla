<?php

namespace Src\Shared\Kernel\Bus\Domain\Event;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Src\Shared\Kernel\Bus\Domain\DTO\LoggerDTO;
use Illuminate\Broadcasting\InteractsWithSockets;
use Src\Shared\Kernel\Bus\Domain\Entity\BaseEvent;

class LoggerEvent extends BaseEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    public function __construct(
        public LoggerDTO $loggerDTO
    ) {
    }
}
