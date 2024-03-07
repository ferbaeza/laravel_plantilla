<?php

namespace Src\Shared\Utils\Strings;

use Symfony\Component\HttpFoundation\Exception\JsonException;

class StringUtil
{
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
