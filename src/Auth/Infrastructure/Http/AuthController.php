<?php

namespace Src\Auth\Infrastructure\Http;

use App\Models\User;
use Faker\Core\Uuid;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Src\Auth\Application\CrearUsuarioCommand;
use Src\Shared\Utils\Http\ApiResponse;
use Src\Shared\Controller\BaseController;
use Src\Auth\Application\CrearUsuarioCommandHandler;
use Src\Auth\Application\InvitacionValidadaQuery;
use Src\Auth\Application\RegistrarUsuarioCommand;
use Src\Shared\Bus\QueryBus\Infrastructure\QueryBusFacade;
use Src\Shared\Dao\User\Infrastructure\Eloquent\UserModel;
use Src\Auth\Infrastructure\Http\Requests\CrearUsuarioRequest;
use Src\Shared\Bus\CommandBus\Infrastructure\CommandBusFacade;
use Src\Shared\ValueObjects\Shared\UuidValue\Entity\UuidValue;
use Src\Auth\Infrastructure\Http\Requests\RegistrarUsuarioRequest;

class AuthController extends BaseController
{
    public function __construct(
        protected CrearUsuarioCommandHandler $handler,
    ) {
    }

    public function crearUsuario(CrearUsuarioRequest $request)
    {
        $command = new CrearUsuarioCommand(
            nombre: $request['nombre'],
            email: $request['email'],
            password: $request['password'],
        );
        $data = CommandBusFacade::process($command);
        // dd('controller', $data);
        return ApiResponse::json(content: $data, status: ApiResponse::ESTADO_200_OK);
    }

    public function invitacionUsuario(string $token)
    {
        $query = new InvitacionValidadaQuery($token);
        $data = QueryBusFacade::process($query);
        return ApiResponse::json(content: $data, status: ApiResponse::ESTADO_200_OK);
    }

    public function registrarUsuario(RegistrarUsuarioRequest $request)
    {
        $command = new RegistrarUsuarioCommand($request->email());
        $data = CommandBusFacade::process($command);
        return ApiResponse::json(content: $data, status: ApiResponse::ESTADO_200_OK);
    }
}
