<?php

namespace Src\Auth\Infrastructure\Http;

use App\Models\User;
use Faker\Core\Uuid;
use Illuminate\Support\Facades\Hash;
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
        $userModel = new UserModel();
        $userModel->id = UuidValue::id();
        $userModel->nombre = $request['nombre'];
        $userModel->email = $request['email'];
        $userModel->password = Hash::make($request['password']);
        $userModel->save();

        dd($userModel->id, UuidValue::id());

        $data =
            [
                'message' => 'Usuario creado con exito',
                'status' => '200',
                'data' => $userModel,
                'uuid' => $userModel->id,
                'token' => $userModel->createToken('api_token')->plainTextToken
            ];

        // $command = new AuthCommand($request);
        // $data = $this->handler->run($command);
        return ApiResponse::json(content: $data, status: ApiResponse::ESTADO_200_OK);
    }

    public function registrarUsuario(RegistrarUsuarioRequest $request)
    {
        $request->validated();
        $data = ['message' => 'Bye Bye World!'];
        return ApiResponse::json(content: $data, status: ApiResponse::ESTADO_200_OK);
    }
}
