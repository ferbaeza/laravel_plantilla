<?php

namespace Src\Shared\Laravel\Console\CustomCommands\Contexto;

use Illuminate\Console\Command;
use Src\Shared\Laravel\Console\Traits\ContextTrait;

class CrearContexto extends Command
{
    use ContextTrait;

    protected $signature = 'zeta:crear-contexto {context?}';
    protected $description = 'Comando para crear un nuevo Contexto o Carpeta en la estructura de carpetas de la aplicación';
    protected $isFullContext = false;
    protected array $separadores = ["\\", "/", ".", " ", "_", "-"];

    public function handle($path = null)
    {
        $context = $this->argument('context');

        if (($context == null) || (empty($context))) {
            $estructureCommand = 'zeta:contexto-from-choices';
            $this->call($estructureCommand);
            return $context ?? 0;
        } else {
            $context = $this->nombreFormateado($context);
            // dd($context);
            $estructureFolderCommand = 'zeta:contexto-carpetas';
            $this->call($estructureFolderCommand, ['context' => $context]);
            return $context ?? 0;
        }



        // foreach ($this->separadores as $separador) {
        //     if(str_contains($context, $separador)){
        //         $this->isFullContext = true;
        //         $folders = explode($separador, $context);
        //         $this->comprobarDirectorios($folders);
        //     }
        // }
        $this->info($context . ' Pasado correctamente!');
        return $context ?? 0;
    }
    // private function comprobarDirectorios(array $carpetas)
    // {
    //     $rootPath = base_path() . "/src" .'/';
    //     $numeroDeCarpetas = count($carpetas)-1;

    //     foreach ($carpetas as $key => $folder) {
    //         $nombreDeCarpeta = $this->nombreFormateado($folder);
    //         $existeYaLaCarpetaDelContexto = $this->isFolder($rootPath.$nombreDeCarpeta);
    //         // dd($existeYaLaCarpetaDelContexto, $rootPath . $nombreDeCarpeta, $numeroDeCarpetas, $carpetas);
    //         if ($existeYaLaCarpetaDelContexto and $key == $numeroDeCarpetas) {
    //             $this->error('La carpeta del contexto ya existe para: ' . $nombreDeCarpeta);
    //             return false;
    //         }
    //     }
    //     // return is_dir($dir);
    // }

    // private function obtenerCarpetas($contexto = null)
    // {
    //     $carpetas = [];
    //     $carpetas['exit'] = "Salir";

    //     $contexto = '/'.$contexto ?? "";
    //     $src = base_path() . "/src" . $contexto;
    //     $folders = array_filter(glob($src . '/*'), 'is_dir');
    //     if (count($folders) > 0) {
    //         foreach ($folders as $folder) {
    //             $carpetas[] = str_replace($src . "/", "", $folder);
    //         }
    //     }
    //     return $carpetas;
    // }

    public function old()
    {
        // dd($context);
        // $context = str_replace("\\", "/", $this->argument('context'));
        // $path = $path ?? "";
        // $rootPath = base_path() . "/src" . $path;
        // $context = $this->studlyCase($context);

        // if (is_dir($rootPath . "/" . $context)) {
        //     $this->error('La carpeta del contexto ya existe para: ' . $context);
        //     return false;
        // }

        // if (mkdir($rootPath . "/" . $context, 0755, true) === false) {
        //     $this->error('Error al crear la carpeta: ' . $context);
        //     return false;
        // }

        // foreach ($this->directories as $directory) {
        //     if (mkdir($rootPath . "/" . $context . "/" . $directory) === false) {
        //         $this->error('Error al crear la carpeta: ' . $context . "/" . $directory);
        //         return false;
        //     }
        // }

        // $this->info($context . ' creado correctamente!');
        // return $context ?? 0;
    }
}
