<?php

namespace Src\Shared\Kernel\Utils\Primitivos;

class StringUtils
{
    public static function sinAcentos(string $cadena): string
    {
        return CharacterUtil::sinAcentos($cadena);
    }

    public static function mayusculas(string $cadena): string
    {
        return mb_strtoupper($cadena);
    }

    public static function minusculas(string $cadena): string
    {
        return mb_strtolower($cadena);
    }

    public static function soloLetras(string $cadena): string
    {
        $soloLetras = preg_replace('/[^a-zA-Z ]/', '', $cadena);
        return $soloLetras;
    }

    public static function limpiarMultiplesEspacios(string $cadena): string
    {
        return trim(preg_replace('/[\s]+/mu', ' ', $cadena));
    }

    public static function limpiarBarraBaja(string $cadena): string
    {
        return str_replace('_', ' ', $cadena);
    }

    public static function formatoBusqueda(string $cadena): string
    {
        $sinAcentos = self::sinAcentos($cadena);
        $mayusculas = self::mayusculas($sinAcentos);
        $cadenaFormateada = self::soloLetras($mayusculas);

        return $cadenaFormateada;
    }

    public static function capitalizar(string $cadena): string
    {
        $cadenaTrimeada = trim($cadena);
        $cadenaMinusculas = mb_strtolower($cadenaTrimeada, "UTF-8");
        $cadenaPascalCase = mb_convert_case($cadenaMinusculas, MB_CASE_TITLE, 'UTF-8');

        return $cadenaPascalCase;
    }

    public static function toCamelCase(string $cadena): string
    {
        $cadenaFormateada = explode(' ', str_replace(['-', '_'], ' ', $cadena));
        $studlyWords = array_map(fn ($palabra) => ucfirst($palabra), $cadenaFormateada);
        return lcfirst(implode('', $studlyWords));
    }

    public static function toPascalCase(string $cadena): string
    {
        $cadenaFormateada = explode(' ', str_replace(['-', ' '], '_', $cadena));
        $studlyWords = array_map(fn ($palabra) => mb_strtolower($palabra), $cadenaFormateada);
        return (implode('', $studlyWords));
    }
}
