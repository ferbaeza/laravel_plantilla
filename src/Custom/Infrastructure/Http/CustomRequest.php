<?php

namespace Src\Custom\Infrastructure\Http;

use Src\Shared\Utils\Http\ApiRequest;

class CustomRequest extends ApiRequest
{
    public function rules()
    {
        return [
            'nombre' => 'required|string|max:255|min:3',
            'edad' => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'Nombre is required',
            'nombre.string' => 'Nombre must be a string',
        ];
    }
}
