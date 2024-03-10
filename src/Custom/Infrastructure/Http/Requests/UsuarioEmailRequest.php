<?php

namespace Src\Custom\Infrastructure\Http\Requests;

use Src\Shared\Utils\Http\ApiRequest;

class 
 extends ApiRequest
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
