<?php

namespace Src\Shared\Utils\Http;

use Illuminate\Foundation\Http\FormRequest;

abstract class ApiRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    abstract public function rules();

}
