<?php

namespace Src\Shared\Laravel\Console\CustomCommands\Contexto;

use Illuminate\Console\Command;
use Src\Shared\Laravel\Console\Traits\ContextTrait;

class SeleccionarContextosOld extends Command
{
    use ContextTrait;

    public const BLUE = "\033[1;34m";
    public const NO_COLOR = "\033[0m";


    public const EXIT_OPTION = 'Pulsa 0 para poder Salir';
    public const CHARACTER = '##';

    protected $hidden = true;
    protected $signature = 'zeta:selecciona-crea-contexto-old';
    protected $description = 'Selecciona el Contexto desde los ya creados en ./src/...';

    protected $question = self::BLUE . 'En que contexto desea crear la carpeta?' . self::NO_COLOR;
    protected $src = '';
    protected $path = '';
    protected $contextoBase = 'src';


    public function handle()
    {
        $this->src = base_path() . '/' . $this->contextoBase;
        $this->path = $this->src;
        $this->mostrarOpciones();

        return 0;
    }

    public function mostrarOpciones($contextoElegido = null)
    {
        if (!$contextoElegido === null) {
            $this->info('Has seleccionado: ' . $contextoElegido);
            $this->path = $this->path . '/' . $contextoElegido;
        }

        $carpetas = $this->obtenerCarpetas($contextoElegido);
        $contextoElegido = $this->choice($this->question, $carpetas);


        if ($contextoElegido == self::EXIT_OPTION) {
            $this->info('Has seleccionado Salir!');
            return;
        }

        if (str_contains(self::CHARACTER, $contextoElegido)) {
            $this->warn('Has seleccionado una opcion equivocada!');
            return;
        }

        if ($contextoElegido == $this->contextoBase) {
            $this->info("Has seleccionado $this->contextoBase !");
            $nombre = $this->ask('Escribe el nombre del contexto');
            $fullPath = $this->path . '/' . $nombre;

            $estrucuturaACrear = $this->formatearRutaCarpetas($this->src, $fullPath);

            $estructureFolderCommand = "zeta:contexto-carpetas";
            $this->call($estructureFolderCommand, ['context' => $estrucuturaACrear]);
        } else {
            $this->contextoBase = $contextoElegido;
            $this->mostrarOpciones($contextoElegido);
        }
    }


    private function obtenerCarpetas($contexto = null)
    {
        $carpetas = [];
        $carpetas[0] = self::EXIT_OPTION;
        $carpetas[] = self::CHARACTER;

        $contexto = '/' . $contexto ?? "";
        $this->path .= $contexto;
        $src = $this->path;

        $folders = array_filter(glob($src . '/*'), 'is_dir');
        if (count($folders) > 0) {
            foreach ($folders as $folder) {
                $nombreDeCarpeta = explode("/", $folder);
                $nombreDeCarpeta = end($nombreDeCarpeta);

                $carpetas[] = $nombreDeCarpeta;
            }
        }
        array_push($carpetas, self::CHARACTER . ' Estas en la carpeta ' . self::BLUE . $this->contextoBase . self::NO_COLOR . ' pulsa esta opcion para crear un nuevo contexto');
        array_push($carpetas, $this->contextoBase);
        return $carpetas;
    }
}
