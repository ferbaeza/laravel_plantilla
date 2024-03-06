<?php

namespace Src\Auth\Infrastructure\Http;

use App\Models\User;
use Illuminate\Support\Str;
use Src\Auth\Application\AuthCommand;
use Src\Shared\Utils\Http\ApiResponse;
use Src\Shared\Controller\BaseController;
use Src\Auth\Application\AuthCommandHandler;
use Src\Shared\Dao\User\Infrastructure\Eloquent\UserModel;
use Src\Auth\Infrastructure\Http\Requests\CrearUsuarioRequest;
use Src\Auth\Infrastructure\Http\Requests\RegistrarUsuarioRequest;
use Src\Shared\ValueObjects\Shared\UuidValue\Entity\UuidValue;

class AuthController extends BaseController
{
    public function __construct(
        protected AuthCommandHandler $handler,
    ) {
    }

    public function crearUsuario(CrearUsuarioRequest $request)
    {
        // dd(UuidValue::create()->value());
        $user = UserModel::create([
            'id' => UuidValue::create()->value(),
            'nombre' => $request['nombre'],
            'email' => $request['email'],
            'password' => $request['password'],

        ]);
        $data =
            [
                'message' => 'Usuario creado con exito',
                'status' => '200',
                'data' => $user,
                'uuid' => $user->id,
                'token' => $user->createToken('api_token')->plainTextToken
            ];

        // $command = new AuthCommand($request);
        // $data = $this->handler->run($command);
        return ApiResponse::json(content: $data, status: ApiResponse::ESTADO_200_OK);
    }

    public function registrarUsuario(RegistrarUsuarioRequest $request)
    {
        $data = ['message' => 'Bye Bye World!'];
        return ApiResponse::json(content: $data, status: ApiResponse::ESTADO_200_OK);
    }
}
