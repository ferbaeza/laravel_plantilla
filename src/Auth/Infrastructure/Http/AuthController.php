<?php

namespace Src\Auth\Infrastructure\Http;


use Illuminate\Support\Facades\Auth;
use Baezeta\Kernel\Laravel\Controller\BaseController;
use Src\Auth\Infrastructure\Http\Requests\LoginRequest;

class AuthController extends BaseController
{
    public function login(LoginRequest $request)
    {
        $request->validated();

        //Service Login
        if (Auth::attempt(['email' => $request['email'], 'password' => ($request['password'])], true)) {
            $user = Auth::user();
            dd($user);

            return true;
        }
        return false;
    }

    public function logout()
    {
        return response()->json([
            'message' => 'Logout success'
        ]);
    }

}
