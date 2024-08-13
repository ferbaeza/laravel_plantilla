<?php

namespace Src\Shared\Kernel\Bus\Infrastructure\Job;


use App\Events\TestEvent;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Src\Shared\Kernel\Bus\Domain\Event\LoggerEvent;

class LoggerJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(
        public LoggerEvent $event

    ) {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Log::info('LoggerEvent handle method called');
    }
}
