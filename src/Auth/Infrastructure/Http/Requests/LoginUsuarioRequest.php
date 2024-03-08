<?php

namespace Src\Auth\Infrastructure\Http\Requests;

use Src\Shared\Utils\Http\ApiRequest;

class LoginUsuarioRequest extends ApiRequest
{
    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required',
        ];
    }
}
