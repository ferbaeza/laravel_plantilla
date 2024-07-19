<?php

namespace Src\Auth\Core\Laravel\Http\Requests;

use Baezeta\Kernel\Laravel\Requests\APIRequest;

class LoginRequest extends APIRequest
{
    public function rules() : array
    {
        return [
            'name' => 'bail|required|string',
            'password' => 'bail|required',
        ];
    }
}
