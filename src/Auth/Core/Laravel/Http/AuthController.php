<?php

namespace Src\Auth\Core\Laravel\Http;


use Illuminate\Http\JsonResponse;
use Src\Auth\Core\Ports\Driver\AuthDriverInterface;
use Src\Shared\Kernel\Laravel\Response\ApiResponse;
use Src\Auth\Core\Laravel\Http\Requests\LoginRequest;
use Src\Shared\Kernel\Laravel\Controller\BaseController;

class AuthController extends BaseController
{
    public function __construct(
        public readonly AuthDriverInterface $authInterface
    )
        {
            parent::__construct();
    }
    public function login(LoginRequest $request): JsonResponse
    {
        $request->validated();
        $reponse = $this->authInterface->login(identidad: $request->name, password: $request->password);
        return $this->sendResponse('Login success',$reponse);
    }

    public function logout(): JsonResponse
    {
        $reponse = $this->authInterface->logout();

        return ApiResponse::success(message: "Logout success", data: $reponse);
    }

}
