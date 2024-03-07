<?php

namespace Src\Auth\Infrastructure\Http\Requests;

use Src\Shared\Utils\Http\ApiRequest;

class RegistrarUsuarioRequest extends ApiRequest
{
    public function rules()
    {
        return [
            'email' => 'required|email',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Email is required',
            'email.string' => 'Email must be a string',
        ];
    }

    public function email()
    {
        return $this['email'];
    }
}
