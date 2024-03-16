<?php

namespace Src\Shared\Utils\Strings;

use Symfony\Component\HttpFoundation\Exception\JsonException;

class StringsUtil
{
    public static function palabraCapitalizada(string $value): string
    {
        $minusculas = self::minusculas($value);
        return ucfirst($minusculas);
    }

    public static function mayusculas(string $value): string
    {
        return strtoupper($value);
    }

    public static function minusculas(string $value): string
    {
        return strtolower($value);
    }

    public static function capitalize(string $value): string
    {
        return ucwords($value);
    }

    public static function token(int $length = 24): string
    {
        return bin2hex(random_bytes($length));
    }

    public static function eliminarEspacios(string $cadena): string
    {
        return trim(preg_replace('/\s+/mu', '', $cadena));
    }

    public static function minusculasSinEspacios(string $cadena): string
    {
        return self::minusculas(self::eliminarEspacios($cadena));
    }

    public static function toCamelCase(string $cadena): string
    {
        $cadenaFormateada = explode(' ', str_replace(['-', '_'], ' ', $cadena));
        $studlyWords = array_map(fn ($palabra) => ucfirst($palabra), $cadenaFormateada);
        return lcfirst(implode('', $studlyWords));
    }

    /**
     * Determina si es un json if a given value is valid JSON.
     *
     * @param  mixed  $value
     * @return bool
     */
    public static function isJson($value)
    {
        if (!is_string($value)) {
            return false;
        }

        if (function_exists('json_validate')) {
            return json_validate($value, 512);
        }

        try {
            json_decode($value, true, 512, JSON_THROW_ON_ERROR);
        } catch (JsonException) {
            return false;
        }

        return true;
    }
}
