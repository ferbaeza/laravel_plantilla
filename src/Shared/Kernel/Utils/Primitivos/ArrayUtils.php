<?php

namespace Src\Shared\Kernel\Utils\Primitivos;

class ArrayUtils
{
    protected static string $separadores = "/[,\\\\\\/]/";

    public static function toString(array $array): string
    {
        return implode(', ', array_map(
            function ($value, $key) {
                return sprintf("'%s'='%s'", $key, $value);
            },
            $array,
            array_keys($array)
        ));
    }

    public static function randomValue(array $array): mixed
    {
        $max = count($array) - 1;
        return ($array[random_int(0, $max)]);
    }

    public static function end(array|string $data): string
    {
        if (is_string($data)) {
            $temp = preg_split(self::$separadores, $data);
            return end($temp);
        }
        return end($data);
    }

}
