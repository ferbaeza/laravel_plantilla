<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Src\Shared\Laravel\Console\CustomCommands\Dao\CreateDaoContext;
use Src\Shared\Laravel\Console\CustomCommands\Contexto\CrearContexto;
use Src\Shared\Laravel\Console\CustomCommands\Contexto\CreateFolderContext;
use Src\Shared\Laravel\Console\CustomCommands\Contexto\SeleccionarContextos;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        CreateDaoContext::class,
        CrearContexto::class,
        CreateFolderContext::class,
        SeleccionarContextos::class,

    ];



    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
