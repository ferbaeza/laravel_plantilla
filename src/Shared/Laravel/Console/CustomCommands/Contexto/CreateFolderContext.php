<?php

namespace Src\Shared\Laravel\Console\CustomCommands\Contexto;

use Illuminate\Console\Command;
use Src\Shared\Laravel\Console\Traits\ContextTrait;

class CreateFolderContext extends Command
{
    use ContextTrait;

    protected $hidden = true;
    protected $signature = 'zeta:contexto-carpetas {context}';
    protected $description = 'Crea una estructura de carpetas, separadores disponibles "\ / . - _ " ejemplo: user.admin.gestion';

    protected $isFullContext = false;
    protected array $separadores = ["\\", "/", ".", " ", "_", "-"];
    protected $currentPath;
    protected array $carpetasFormatedas = [];
    protected array $folders = [];

    public function handle()
    {
        $context = $this->argument('context');
        $rootPath = base_path() . "/src" . '/';
        $this->currentPath = $rootPath;
        foreach ($this->separadores as $separador) {
            if (str_contains($context, $separador)) {
                $this->isFullContext = true;
                $this->folders = explode($separador, $context);
            }
        }
        if (!$this->isFullContext) {
            $this->folders[] = $context;
        }

        $crearDirectoriosContexto = $this->comprobarDirectorios($this->folders);
        if (!$crearDirectoriosContexto) {
            return 1;
        }

        $crearSubDirectorios = $this->crearSubDirectorios($this->currentPath);
        if (!$crearSubDirectorios) {
            return 1;
        }
        $contextoFormateado = implode('/', $this->carpetasFormatedas);
        $this->info($contextoFormateado . ' creado correctamente!');
        return 0;
    }
    private function comprobarDirectorios(array $carpetas)
    {
        $numeroDeCarpetas = count($carpetas) - 1;

        foreach ($carpetas as $key => $folder) {
            $nombreDeCarpeta = $this->nombreFormateado($folder);
            $this->carpetasFormatedas[] = $nombreDeCarpeta;
            $existeYaLaCarpetaDelContexto = $this->isFolder($this->currentPath . $nombreDeCarpeta);

            if ($existeYaLaCarpetaDelContexto and $key == $numeroDeCarpetas) {
                $ruta = $this->formatearRutaCarpetas(base_path() . '/src', $this->currentPath);
                $this->warn("La carpeta -> $nombreDeCarpeta ya existe en la ruta : $ruta");
            }
            if ($existeYaLaCarpetaDelContexto) {
                $this->currentPath = $this->currentPath . "/" . $nombreDeCarpeta . '/';
                continue;
            }

            if (!$existeYaLaCarpetaDelContexto) {
                $crearCarpetas = $this->crearCarpeta($this->currentPath, $nombreDeCarpeta);
                if (!$crearCarpetas) {
                    return false;
                }
            }
        }
        return true;
    }

    public function crearCarpeta(string $rootPath, string $nombreDeCarpeta)
    {
        if ($this->crearDirectorio($rootPath . "/" . $nombreDeCarpeta)) {
            $this->info('Carpeta creada correctamente: ' . $nombreDeCarpeta);
            $this->currentPath = $rootPath . "/" . $nombreDeCarpeta;
            return true;
        }
        return false;
    }
}
