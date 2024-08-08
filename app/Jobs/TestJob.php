<?php

namespace App\Jobs;

use App\Events\TestEvent;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class TestJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(
        public TestEvent $event

    )
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Log::info('TestJob handle method called');
    }
}
