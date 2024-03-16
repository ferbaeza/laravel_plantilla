<?php

namespace App\Console\Commands;

use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Src\Shared\Utils\Strings\StringsUtil;
use Src\Shared\Laravel\Console\Traits\ContextTrait;

class CreateFullContext extends Command
{
    use ContextTrait;

    protected $signature = 'zeta:full-context {context}';
    protected $description = 'Comando para crear la estructura de carpetas dado un contexto de la aplicación';
    protected $isFullContext = false;

    public function handle($path = null)
    {

        $context = $this->argument('context');
        $separadores =[ "\\", "/", ".", " ", "_", "-"];
        foreach ($separadores as $separador) {
            if(str_contains($context, $separador)){
                $this->isFullContext = true;
                $folders = explode($separador, $context);
                $this->comprobarDirectorios($folders);
            }
        }
        if(!$this->isFullContext){
            $question = "En que contexto desea crear la carpeta?";
            $carpetas = $this->obtenerCarpetas();
            $contextoElegido =$this->choice($question, $carpetas);
            
            $capetasContexto = $this->obtenerCarpetas($contextoElegido);
            $contextoElegido = $this->choice($question, $capetasContexto, $contextoElegido);
            dd($contextoElegido, $capetasContexto);
        }


        $this->info($context . ' Pasado correctamente!');
        return $context ?? 0;
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
    private function comprobarDirectorios(array $carpetas)
    {
        $rootPath = base_path() . "/src" .'/';
        $numeroDeCarpetas = count($carpetas)-1;

        // if (is_dir($rootPath . "/" . $context)) {

        foreach ($carpetas as $key => $folder) {
            $nombreDeCarpeta = $this->nombreFormateado($folder);
            $existeYaLaCarpetaDelContexto = $this->isFolder($rootPath.$nombreDeCarpeta);


            // dd($existeYaLaCarpetaDelContexto, $rootPath . $nombreDeCarpeta, $numeroDeCarpetas, $carpetas);
            if ($existeYaLaCarpetaDelContexto and $key == $numeroDeCarpetas) {
                $this->error('La carpeta del contexto ya existe para: ' . $nombreDeCarpeta);
                return false;
            }
        }
        // return is_dir($dir);
    }

    private function obtenerCarpetas($contexto = null)
    {
        $carpetas = [];

        $contexto = '/'.$contexto ?? "";
        $src = base_path() . "/src" . $contexto;
        $folders = array_filter(glob($src . '/*'), 'is_dir');
        if (count($folders) > 0) {
            foreach ($folders as $folder) {
                $carpetas[] = str_replace($src . "/", "", $folder);
            }
        }
        return $carpetas;
    }


}
