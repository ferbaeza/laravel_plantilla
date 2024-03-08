<?php

namespace Src\Auth\Infrastructure\Http;

use Src\Shared\Utils\Http\ApiResponse;
use Src\Auth\Application\CrearUsuarioCommand;
use Src\Auth\Application\LoginUsuarioCommand;
use Src\Auth\Application\InvitacionValidadaQuery;
use Src\Auth\Application\RegistrarUsuarioCommand;
use Src\Shared\Laravel\Controller\BaseController;
use Src\Shared\Bus\QueryBus\Infrastructure\QueryBusFacade;
use Src\Auth\Infrastructure\Http\Requests\CrearUsuarioRequest;
use Src\Auth\Infrastructure\Http\Requests\LoginUsuarioRequest;
use Src\Shared\Bus\CommandBus\Infrastructure\CommandBusFacade;
use Src\Auth\Infrastructure\Http\Requests\RegistrarUsuarioRequest;

class AuthController extends BaseController
{
    public function loginUsuario(LoginUsuarioRequest $request)
    {
        $command = new LoginUsuarioCommand(email:$request['email'], password: $request['password']);
        $data = CommandBusFacade::process($command);
        return ApiResponse::json(content: $data, status: ApiResponse::ESTADO_200_OK);
    }

    public function crearUsuario(CrearUsuarioRequest $request)
    {
        $command = new CrearUsuarioCommand(nombre: $request['nombre'], email: $request['email'], password: $request['password']);
        $data = CommandBusFacade::process($command);
        return ApiResponse::json(content: $data, status: ApiResponse::ESTADO_200_OK);
    }

    public function invitacionUsuario(string $token)
    {
        $query = new InvitacionValidadaQuery(token: $token);
        $data = QueryBusFacade::process($query);
        return ApiResponse::json(content: $data, status: ApiResponse::ESTADO_200_OK);
    }

    public function registrarUsuario(RegistrarUsuarioRequest $request)
    {
        $command = new RegistrarUsuarioCommand(email: $request->email());
        $data = CommandBusFacade::process($command);
        return ApiResponse::json(content: $data, status: ApiResponse::ESTADO_200_OK);
    }
    
    public function test()
    {
        $data = ['message' => 'welcome'];
        return ApiResponse::json(content: $data, status: ApiResponse::ESTADO_200_OK);
    }
}
