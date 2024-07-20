<?php

namespace Src\Auth\Core\Laravel\Http;


use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Src\Auth\Core\Ports\Driver\AuthLoginDriverInterface;
use Baezeta\Kernel\Laravel\Response\ApiResponse;
use Baezeta\Kernel\Laravel\Controller\BaseController;
use Src\Auth\Core\Laravel\Http\Requests\LoginRequest;

class AuthController extends BaseController
{
    public function __construct(
        public readonly AuthLoginDriverInterface $loginInterface
    )
        {
            parent::__construct();
    }
    public function login(LoginRequest $request): JsonResponse
    {
        $request->validated();
        $reponse = $this->loginInterface->login(identidad: $request->name, password: $request->password);
        return $this->sendResponse('Login success',$reponse);
    }

    public function logout(): JsonResponse
    {
        // Auth::logout();
        return ApiResponse::success(message: "Logout success", data: []);
    }

}
