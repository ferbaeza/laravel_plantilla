<?php

namespace Src\Shared\Laravel\Console\Traits;

use Src\Shared\Utils\Strings\StringsUtil;
use Src\Shared\Laravel\Console\Constants\CarpetasDeContextoConstanst;

trait ContextTrait
{
    public const BLUE = "\033[1;34m";

    public function blue()
    {
        return self::BLUE;
    }

    public function nombreFormateado(string $nombre): string
    {
        return StringsUtil::palabraCapitalizada($nombre);
    }

    public function isFolder($name)
    {
        return is_dir($name);
    }

    public function formatearRutaCarpetas(string $rutaSrc, string $ruta): string
    {
        $esNecesarioFormateo = str_contains($ruta, "//");
        if ($esNecesarioFormateo) {
            $estrucuturaACrear = str_replace($rutaSrc . '//', " ", $ruta);
            $estrucuturaACrear = trim($estrucuturaACrear);
            return $estrucuturaACrear;
        }
    }

    public function crearDirectorio(string $path): bool
    {
        if (mkdir($path, 0755, true) === false) {
            $this->error('Error al crear la carpeta: ' . $path);
            return false;
        }
        return true;
    }

    public function crearSubDirectorios(string $path): bool
    {
        foreach (CarpetasDeContextoConstanst::carpetas() as $value) {
            if (mkdir($path . '/' . $value, 0755, true) === false) {
                $this->error('Error al crear la carpeta: ' . $path);
                return false;
            }
        }
        return true;
    }
}
