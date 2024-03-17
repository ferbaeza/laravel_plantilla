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
        $this->info($context . ' Pasado correctamente!');
        return $context ?? 0;
    }
}
