<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

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
        /*
        EJECUTAMOS COMANDOS DE ARTISAN PARA CREAR LAS CACHÉS DE CONFIGURACIÓN Y EVENTOS
        PARA ASÍ ACORTAR EL TIEMPO DE EJECUCIÓN DE LOS TESTS
                */
        $commands = [
            'config:cache',
            'event:cache',
            // 'route:cache', // No se si es pq hay pocos tests con rutas pero de momento no compensa
        ];

        foreach ($commands as $command) {
            $output = shell_exec("php " . __DIR__ . "/../../artisan $command");
            // echo "$output\n";
            $this->call($command);
        }
            }
}
