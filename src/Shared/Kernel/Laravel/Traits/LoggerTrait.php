<?php

namespace Src\Shared\Kernel\Laravel\Traits;

use ReflectionClass;
use Illuminate\Support\Facades\Request;
use Src\Shared\Kernel\Query\Base\BaseQuery;
use Src\Shared\Kernel\Command\Base\BaseCommand;

trait LoggerTrait
{
    public static function log(BaseCommand | BaseQuery $useCase): void
    {
        // Crear un array con la información del log
        // $log['url'] = Request::fullUrl();
        // $log['route'] = Request::route()->uri;
        // $log['urlMethod'] = Request::method();
        // $log['user_id'] = auth()->user()->id ?? null;
        // $log['user'] = Request::user()?->toArray();
        // $log['useCase'] = get_class($useCase);
        // $log['useCaseId'] = $useCase->getIdClass()->value();
        // $log['useCaseFecha'] = $useCase->getFechaStart()->value()->format('Y-m-d H:i:s');
        dd($log);
    }

}
