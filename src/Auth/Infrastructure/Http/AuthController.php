<?php

namespace Src\Auth\Infrastructure\Http;


use Baezeta\Kernel\Laravel\Controller\BaseController;

class AuthController extends BaseController
{
    public function login()
    {
        return response()->json([
            'message' => 'Login success'
        ]);
    }

    public function logout()
    {
        return response()->json([
            'message' => 'Logout success'
        ]);
    }

}
