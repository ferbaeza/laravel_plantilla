<?php

namespace Src\Usuario\Infrastructure\Http\Requests;

use Src\Shared\Utils\Http\ApiRequest;

class CrearUsuarioRequest extends ApiRequest
{
    public function rules()
    {
        return [
            'nombre' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|max:255|min:5',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Email is required',
            'email.string' => 'Email must be a string',
        ];
    }
}
