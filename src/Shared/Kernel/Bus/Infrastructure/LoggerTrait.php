<?php

namespace Src\Shared\Kernel\Bus\Infrastructure;

use Illuminate\Support\Facades\Request;
use Src\Shared\Kernel\Query\Base\BaseQuery;
use Src\Shared\Kernel\Bus\Domain\DTO\LoggerDTO;
use Src\Shared\Kernel\Command\Base\BaseCommand;
use Src\Shared\Kernel\Bus\Domain\DTO\UserLoggerDTO;
use Src\Shared\Kernel\Bus\Domain\Event\LoggerEvent;

trait LoggerTrait
{
    public static function log(BaseCommand | BaseQuery $useCase): void
    {
        // Crear un array con la información del log
        $userData = Request::user()?->toArray();
        $dto = new LoggerDTO(
            url: Request::fullUrl(),
            route: Request::route()->uri,
            urlMethod: Request::method(),
            userId: auth()->user()->id ?? null,
            user: new UserLoggerDTO(
                id: $userData['id'] ?? null,
                name: $userData['name'] ?? null,
                usuario: $userData['usuario'] ?? null,
                apellidoPrimero: $userData['apellido_primero'] ?? null,
                apellidoSegundo: $userData['apellido_segundo'] ?? null,
                email: $userData['email'] ?? null,
            ),
            useCase: get_class($useCase),
            useCaseId: $useCase->getIdClass()->value(),
            useCaseFecha:$useCase->getFechaStart()->value()->format('Y-m-d H:i:s')
        );
        event(new LoggerEvent($dto));

        // EventDispatcher::publish(new LoggerEvent($dto));
        // dump($dto);
    }

}
