<?php

namespace App\Console\Commands;

use App\Events\TestEvent;
use App\Jobs\TestJob;
use Illuminate\Console\Command;
use Src\Shared\Kernel\Bus\Infrastructure\EventDispatcher;

class Test extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        $evnt = new TestEvent('Fer', 'm@mail.com');
        TestJob::dispatch($evnt);
        event($evnt);

        return Command::SUCCESS;
        // EventDispatcher::dispatch();

        /*
        EJECUTAMOS COMANDOS DE ARTISAN PARA CREAR LAS CACHÉS DE CONFIGURACIÓN Y EVENTOS
        PARA ASÍ ACORTAR EL TIEMPO DE EJECUCIÓN DE LOS TESTS
                */
        // $commands = [
        //     'config:cache',
        //     'event:cache',
        //     // 'route:cache', // No se si es pq hay pocos tests con rutas pero de momento no compensa
        // ];

        // foreach ($commands as $command) {
        //     $output = shell_exec("php " . __DIR__ . "/../../artisan $command");
        //     // echo "$output\n";
        //     $this->call($command);
        // }
    }
}
