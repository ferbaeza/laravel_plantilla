<?php

namespace Src\Shared\Laravel\Console\CustomCommands\Dao;

use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Src\Shared\Laravel\Console\Traits\ContextTrait;

class CreateDaoContext extends Command
{
    use ContextTrait;

    public const BLUE = "\033[1;34m";
    public const NO_COLOR = "\033[0m";


    protected $signature = 'z-plantilla:dao {context}';
    protected $description = 'Crear la estructura de carpetas para el' . self::BLUE . ' contexto' . self::NO_COLOR . ' del Modelo en la carpeta ./src/Shared/Dao';

    protected static $template = '/src/Shared/Laravel/Console/CustomCommands/Dao/templates';
    // protected static $template = '/app/Console/Commands/Dao/templates';
    protected array $directories = [
        'Domain',
        'Domain/Entity',
        'Domain/Interfaces',
        'Domain/Collection',
        'Infrastructure',
        'Infrastructure/Bindings',
        'Infrastructure/Datasource'
    ];

    protected array $domain = [
        'Domain/Entity',
        'Domain/Interfaces',
        'Domain/Collection',
    ];

    protected array $infrastructure = [
        'Infrastructure/Bindings',
        'Infrastructure/Datasource',
        'Infrastructure/Eloquent',
    ];

    public static string $binding = "Bindings";
    public static string $persistence = "Datasource";
    public static string $interface = "Interfaces";


    private static string $rootPath = "/Shared/Dao";
    // protected string $namespaceTemplate = "App\Console\Commands\Dao\\templates";
    protected string $namespaceTemplate = 'Src\Shared\Laravel\Console\CustomCommands\Dao\\templates';
    protected string $namespaceDataBase = "Src\Shared\Dao";

    public function handle()
    {
        // $path = self::$rootPath;
        $context = str_replace("\\", "/", $this->argument('context'));

        $finalPath = (base_path() . "/src" . self::$rootPath . "/" . $context);
        $this->crearDirectorio($finalPath);
        $this->crearSubDirectorios($finalPath);

        $this->comprobarContextoModulo($context);
        $this->template($finalPath, $context);

        $this->info($context . ' Creado correctamente!');
        return $context;
    }

    private function comprobarContextoModulo($context)
    {
        if (count(explode('/', $context)) > 1) {
            return (end(explode('/', $context)));
        }
        return $context;
    }

    private function template(string $finalPath, string $context): void
    {
        foreach ($this->domain as $folder) {
            if (is_dir($finalPath . '/' . $folder)) {
                list($parentFolder, $tipo) = explode('/', $folder);
                $this->crearFichero($finalPath . '/' . $folder, $parentFolder, $tipo, $context);
            };
        }
        foreach ($this->infrastructure as $folder) {
            if (is_dir($finalPath . '/' . $folder)) {
                list($parentFolder, $tipo) = explode('/', $folder);
                $this->crearFichero($finalPath . '/' . $folder, $parentFolder, $tipo, $context);
            };
        }
    }

    private function crearFichero(string $finalPathModificado, string $parentFolder, string $tipo, string $context)
    {
        $prefijo = self::nombreTemplate($tipo);
        $file = (self::templateResource($prefijo));
        $template = file_get_contents($file);
        $tempTemplate = Str::of($template)->replace($this->namespaceTemplate, "$this->namespaceDataBase\\$context\\$parentFolder\\$tipo");
        $finalTemplate = Str::of($tempTemplate)->replace('Context', $context);

        if ($tipo === self::$persistence) {
            $finalTemplate = Str::of($finalTemplate)->replace("$this->namespaceDataBase\\$context\Infrastructure\Datasource\\$context" . "BaseRepositoryInterface", "$this->namespaceDataBase\\$context\Domain\Interfaces\\$context" . "BaseRepositoryInterface");
        }

        $nombreClase = self::nombreClase($context, $tipo);
        file_put_contents("$finalPathModificado/$nombreClase.php", $finalTemplate);
    }

    public static function templateResource(string $tipo): string
    {
        return base_path() . self::$template . '/' . $tipo . '.php';
    }

    public static function nombreClase(string $context, string $tipo): string
    {
        if ($tipo === self::$binding) {
            return $context . 'BaseRegisterBindings';
        }
        if ($tipo === self::$persistence) {
            return $context . 'BaseRepository';
        }
        if ($tipo === self::$interface) {
            return $context . 'BaseRepositoryInterface';
        }
        return $context . 'Base' . $tipo;
    }

    public static function nombreTemplate(string $tipo): string
    {
        if ($tipo === self::$binding) {
            return 'ContextBaseRegisterBindings';
        }
        if ($tipo === self::$persistence) {
            return 'ContextBaseRepository';
        }
        if ($tipo === self::$interface) {
            return 'ContextBaseRepositoryInterface';
        }
        return "ContextBase$tipo";
    }
}
