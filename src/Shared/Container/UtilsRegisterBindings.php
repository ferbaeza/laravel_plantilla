<?php

declare(strict_types=1);

namespace Src\Shared\Utils\Foundation\Container;

/**
 * Registro de Interfaces en el Contenedor para el módulo Utils
 */
class UtilsRegisterBindings
{
    /**
     * Register with bind method
     *
     * @return array
     */
    public static function binds(): array
    {
        return [];
    }

    /**
     * Register singletons
     *
     * @return array
     */
    public static function singletons(): array
    {
        return [];
    }
}
