<?php

namespace Src\Auth\Core\Laravel\Http;


use Illuminate\Support\Facades\Auth;
use Src\Auth\Core\Ports\AuthLoginPortInterface;
use Baezeta\Kernel\Laravel\Response\ApiResponse;
use Baezeta\Kernel\Laravel\Controller\BaseController;
use Src\Auth\Core\Laravel\Http\Requests\LoginRequest;

class AuthController extends BaseController
{
    public function __construct(
        public readonly AuthLoginPortInterface $loginInterface
    )
        {
    }
    public function login(LoginRequest $request)
    {
        $request->validated();
        $reponse = $this->loginInterface->login($request->email, $request->password);

        return ApiResponse::success(message: "", data: $reponse);
    }

    public function logout()
    {
        return response()->json([
            'message' => 'Logout success'
        ]);
    }

}
