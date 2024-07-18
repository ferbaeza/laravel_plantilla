<?php

namespace Src\Auth\Infrastructure\Http\Requests;

use Baezeta\Kernel\Laravel\Requests\APIRequest;

class LoginRequest extends APIRequest
{
    public function rules() : array
    {
        return [
            'email' => 'bail|required|email',   
            'password' => 'bail|required',
        ];
    }
}
