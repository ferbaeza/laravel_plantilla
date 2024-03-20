<?php

namespace Src\Shared\Laravel\Console\CustomCommands\Contexto;

use Illuminate\Console\Command;
use Src\Shared\Laravel\Console\Traits\ContextTrait;

class CrearContexto extends Command
{
    use ContextTrait;

    public const BLUE = "\033[1;34m";
    public const NO_COLOR = "\033[0m";
    public const GREENLIGHT = "\033[1;32m";


    protected $hidden = false;
    protected $signature = 'zeta:laravel-contexto {context?}';
    protected $description = self::BLUE . 'Comando para crear un nuevo' . self::GREENLIGHT . ' contexto' . self::BLUE . ' en la estructura de carpetas de la aplicación' . self::NO_COLOR;


    protected $isFullContext = false;
    protected array $separadores = ["\\", "/", ".", " ", "_", "-"];

    public function handle()
    {
        $context = $this->argument('context');

        if (($context == null)) {
            $estructureCommand = 'zeta:selecciona-crea-contexto';
            $this->call($estructureCommand);
            return $context ?? 0;
        } else {
            $context = $this->nombreFormateado($context);
            $estructureFolderCommand = 'zeta:contexto-carpetas';
            $this->call($estructureFolderCommand, ['context' => $context]);
            return $context ?? 0;
        }
        $this->info($context . ' Pasado correctamente!');
        return $context ?? 0;
    }
}
