<?php

namespace Src\Shared\Laravel\Console\CustomCommands\Contexto;

use Illuminate\Console\Command;
use Src\Shared\Laravel\Console\Traits\ContextTrait;
use function Laravel\Prompts\search;
use function Laravel\Prompts\select;

class SeleccionarContextos extends Command
{
    use ContextTrait;

    public const BLUE = "\033[1;34m";
    public const NO_COLOR = "\033[0m";
    public const GREEN = "\033[0;32m";
    public const RED = "\033[1;31m";

    public const EXIT_OPTION = self::RED . 'Salir';
    public const OK_OPTION = self::GREEN . 'Ok..!';
    public const CHARACTER = 'Ahora mismo te encuentras en la carpeta ';

    protected $hidden = true;
    protected $signature = 'zeta:selecciona-crea-contexto';
    protected $description = 'Selecciona el Contexto desde los ya creados en ./src/...';

    protected $question = self::BLUE . 'En que contexto desea crear la carpeta?' . self::NO_COLOR;
    protected $src = '';
    protected string $path = '';
    protected $contextoBase = 'src';


    public function handle()
    {
        $this->src = base_path() . '/' . $this->contextoBase;
        $this->path = $this->src;

        $this->mostrarOpciones();
        return Command::SUCCESS;
    }

    public function mostrarOpciones($contextoElegido = null)
    {
        if (!$contextoElegido == null) {
            $this->info('Has seleccionado: ' . $contextoElegido);
        }

        $carpetas = $this->obtenerCarpetas($contextoElegido);
        $contextoElegido = windows_os()
            ? select(
                "Selecciona la carpeta donde deseas crear la estructura de carpetas",
            $carpetas,
                scroll: 15,
            )
            : search(
                label: "Selecciona la carpeta donde deseas crear la estructura de carpetas",
                placeholder: 'Busca entre las opciones...',
                options: fn ($search) => array_values(array_filter(
                $carpetas,
                    fn ($choice) => str_contains(strtolower($choice), strtolower($search))
                )),
                scroll: 15,
            );

        if ($contextoElegido == self::EXIT_OPTION) {
            $this->info('Has seleccionado Salir!');
            return;
        }
        if ($contextoElegido == self::OK_OPTION) {
            $this->elegirNombreDelContexto();
            return;
        }
        if (str_contains($contextoElegido,self::CHARACTER)) {
            $this->warn('Has seleccionado una opcion equivocada!');
            return;
        }

        $this->contextoBase = $contextoElegido;
        $this->mostrarOpciones($contextoElegido);
    }

    private function elegirNombreDelContexto()
    {
        $this->info("Has seleccionado $this->contextoBase !");
        $question = self::BLUE . 'Escribe el nombre del contexto que deseas crear' . self::NO_COLOR;
        $nombre = $this->ask($question);
        $fullPath = $this->path . '/' . $nombre;

        $estrucuturaACrear = $this->formatearRutaCarpetas($this->src, $fullPath);
        $estructureFolderCommand = "zeta:contexto-carpetas";
        $this->call($estructureFolderCommand, ['context' => $estrucuturaACrear]);
    }

    private function obtenerCarpetas($contexto = null)
    {
        $contexto = '/'.$contexto ?? "";
        $this->path .= $contexto;
        $src = $this->path;

        $carpetas = [];
        $folders = array_filter(glob($src . '/*'), 'is_dir');
        if (count($folders) > 0) {
            foreach ($folders as $folder) {
                $nombreDeCarpeta = explode("/", $folder);
                $nombreDeCarpeta = end($nombreDeCarpeta);

                $carpetas[] = $nombreDeCarpeta;
            }
        }
        $contextoBaseFormateado = self::CHARACTER .self::BLUE . $this->contextoBase;
        array_push($carpetas, $contextoBaseFormateado);
        array_push($carpetas, self::OK_OPTION);
        array_push($carpetas, self::EXIT_OPTION);
        return $carpetas;
    }
}
