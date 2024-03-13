<?php

namespace App\Console\Commands\Shared\DataBase;

use Illuminate\Support\Str;
use App\Console\Commands\CreateContext;
use Src\Shared\Utils\Foundation\StringUtils;

class CreateDataBaseContext extends CreateContext
{
    protected $signature = 'create:database {context}';
    protected $description = 'Comando para crear la estructura de carpetas y sus clases contexto del Shared/DataBase';
    protected static $template = '/app/Console/Commands/Shared/DataBase/templates';

    protected array $directories = [
        'Domain',
        'Domain/Entity',
        'Domain/Interfaces',
        'Domain/Collection',
        'Infrastructure',
        'Infrastructure/Laravel',
        'Infrastructure/Persistence'
    ];

    protected array $domain = [
        'Domain/Entity',
        'Domain/Interfaces',
        'Domain/Collection',
    ];

    protected array $infrastructure = [
        'Infrastructure/Laravel',
        'Infrastructure/Persistence'
    ];

    public static string $binding = "Laravel";
    public static string $persistence = "Persistence";
    public static string $interface = "Interfaces";


    private static string $rootPath = "/Shared/Database";
    protected string $namespaceTemplate = "App\Console\Commands\Shared\DataBase\\templates";
    protected string $namespaceDataBase = "Src\Shared\Database";

    public function handle($path = null)
    {
        $path = self::$rootPath;

        $context = parent::handle($path);
        $finalPath = (base_path() . "/src" . $path . "/" . $context);
        $this->comprobarContextoModulo($context);
        $this->template($finalPath, $context);
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
            $finalTemplate = Str::of($finalTemplate)->replace("$this->namespaceDataBase\\$context\Infrastructure\Persistence\\$context" . "BaseRepositoryInterface", "$this->namespaceDataBase\\$context\Domain\Interfaces\\$context" . "BaseRepositoryInterface");
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
