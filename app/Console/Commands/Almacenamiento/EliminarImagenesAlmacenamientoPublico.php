<?php

namespace App\Console\Commands\Shared\Almacenamiento;

use Illuminate\Console\Command;
use Src\Shared\Bus\CommandBus\Infrastructure\CommandBusFacade;
use Src\Shared\Almacenamiento\Publico\Application\BorrarImagenesCommand;

class EliminarImagenesAlmacenamientoPublico extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'almacenamiento:eliminarImagenes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Eliminar las Imagenes del almacenamiento Publico que no estan en uso en la aplicacion';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        CommandBusFacade::process(new BorrarImagenesCommand());
    }
}
