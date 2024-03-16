<?php

namespace Src\Shared\Laravel\Console\Constants;

class CarpetasDeContextoConstanst
{
    const APPLICATION = 'Application';
    const DOMAIN = 'Domain';
    const COLLECTION = 'Collection';
    const ENTITY = 'Entity';
    const EXCEPTION = 'Exception';
    const INTERFACES = 'Interfaces';
    const INFRASTRUCTURE = 'Infrastructure';
    const BINDINGS = 'Bindings';
    const DATASOURCE = 'Datasource';
    const HTTP = 'Http';

    public static function carpetas()
    {
        return [
            self::APPLICATION,
            self::DOMAIN,
            self::COLLECTION,
            self::ENTITY,
            self::EXCEPTION,
            self::INTERFACES,
            self::INFRASTRUCTURE,
            self::BINDINGS,
            self::DATASOURCE,
            self::HTTP,
        ];
    }
}
