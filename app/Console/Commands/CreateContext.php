<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;

class CreateContext extends Command
{
    protected array $directories = [
        'Application',
        'Domain',
        'Domain/Entity',
        'Domain/Interfaces',
        'Domain/Collection',
        'Domain/Exception',
        'Domain/Specification',
        'Infrastructure',
        'Infrastructure/Web',
        'Infrastructure/Persistence'
    ];

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:context {context}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Comando para crear la estructura de carpetas dado un contexto de la aplicación';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle($path = null)
    {
        $context = str_replace("\\", "/", $this->argument('context'));
        $path = $path ?? "";
        $rootPath = base_path() . "/src" . $path;
        $context = $this->studlyCase($context);

        if (is_dir($rootPath . "/" . $context)) {
            $this->error('La carpeta del contexto ya existe para: ' . $context);
            return false;
        }

        if (mkdir($rootPath . "/" . $context, 0755, true) === false) {
            $this->error('Error al crear la carpeta: ' . $context);
            return false;
        }

        foreach ($this->directories as $directory) {
            if (mkdir($rootPath . "/" . $context . "/" . $directory) === false) {
                $this->error('Error al crear la carpeta: ' . $context . "/" . $directory);
                return false;
            }
        }

        $this->info($context . ' creado correctamente!');
        return $context ?? 0;
    }

    private function studlyCase(string $text): string
    {
        $sources = explode("/", $text);
        foreach ($sources as $index => $value) {
            $sources[$index] = Str::studly($value);
        }

        return implode("/", $sources);
    }
}
