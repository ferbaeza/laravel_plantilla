<?php

namespace Src\Usuario\Infrastructure\Http;

use Src\Shared\Utils\Http\ApiResponse;
use Src\Usuario\Application\CrearUsuarioCommand;
use Src\Shared\Laravel\Controller\BaseController;
use Src\Shared\Bus\CommandBus\Infrastructure\CommandBusFacade;
use Src\Usuario\Infrastructure\Http\Requests\CrearUsuarioRequest;

class UsuarioController extends BaseController
{
    public function crearUsuario(CrearUsuarioRequest $request)
    {
        $command = new CrearUsuarioCommand(nombre: $request['nombre'], primerApellido: $request['primerApellido'], segundoApellido: $request['segundoApellido'], email: $request['email'], password: $request['password']);
        $data = CommandBusFacade::process($command);
        return ApiResponse::json(content: $data, status: ApiResponse::ESTADO_200_OK);
    }
}
