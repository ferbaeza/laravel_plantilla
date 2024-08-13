<?php

namespace App\Providers;

use App\Events\TestEvent;
use App\Listeners\TestListener;
use Illuminate\Support\ServiceProvider;
use Src\Shared\Kernel\Bus\Domain\Event\LoggerEvent;
use Src\Shared\Kernel\Bus\Infrastructure\Listener\LoggerListener;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        TestEvent::class => [
            TestListener::class,
        ],
        LoggerEvent::class => [
            LoggerListener::class,
        ],
    ];


    public function register(): void
    {
    }

    public function boot(): void
    {
        //
    }
}
