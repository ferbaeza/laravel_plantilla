<?php

namespace Src\Shared\Laravel\Console\CustomCommands\Contexto;

use Illuminate\Console\Command;
use Src\Shared\Laravel\Console\Traits\ContextTrait;

class CreateFolderContext extends Command
{
    use ContextTrait;

    protected $signature = 'zeta:contexto-carpetas {context}';
    protected $description = 'Comando para crear la estructura de carpetas dado un contexto de la aplicación';
    protected $isFullContext = false;
    protected array $separadores = ["\\", "/", ".", " ", "_", "-"];
    protected $currentPath;
    
    public function handle($path = null)
    {
        $context = $this->argument('context');
        $rootPath = base_path() . "/src" .'/';
        $this->currentPath = $rootPath;

        foreach ($this->separadores as $separador) {
            if(str_contains($context, $separador)){
                $this->isFullContext = true;
                $folders = explode($separador, $context);
                $this->comprobarDirectorios($folders);
            }
        }
        $this->crearSubDirectorios($this->currentPath);
        $this->info($context . ' Pasado correctamente!');
        return $context ?? 0;

    }
    private function comprobarDirectorios(array $carpetas)
    {
        $numeroDeCarpetas = count($carpetas)-1;

        foreach ($carpetas as $key => $folder) {
            $nombreDeCarpeta = $this->nombreFormateado($folder);
            $existeYaLaCarpetaDelContexto = $this->isFolder($this->currentPath.$nombreDeCarpeta);
            // dd($carpetas, $nombreDeCarpeta, $existeYaLaCarpetaDelContexto);

            if($existeYaLaCarpetaDelContexto){
                // dump($this->currentPath.$nombreDeCarpeta);
                $this->currentPath = $this->currentPath . "/" . $nombreDeCarpeta.'/';
                continue;
            }

            if ($existeYaLaCarpetaDelContexto and $key == $numeroDeCarpetas) {
                $this->error('La carpeta del contexto ya existe para: ' . $nombreDeCarpeta);
                return false;
            }
            if(!$existeYaLaCarpetaDelContexto){
                $this->crearCarpeta($this->currentPath, $nombreDeCarpeta);
            }
        }
    }

    public function crearCarpeta(string $rootPath, string $nombreDeCarpeta)
    {
        if ($this->crearDirectorio($rootPath . "/" . $nombreDeCarpeta)){
            $this->info('Carpeta creada correctamente: ' . $nombreDeCarpeta);
            $this->currentPath = $rootPath . "/" . $nombreDeCarpeta;
        }
    }
}
