<?php

namespace Src\Shared\Laravel\Console\Traits;

use Src\Shared\Utils\Strings\StringsUtil;

trait ContextTrait
{
    public function nombreFormateado(string $nombre): string
    {
        return StringsUtil::palabraCapitalizada($nombre);
    }
    
    public function isFolder($name)
    {
        return is_dir($name);
    }
}
