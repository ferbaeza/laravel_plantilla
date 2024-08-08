<?php

namespace Src\Shared\Kernel\Laravel\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Symfony\Component\HttpFoundation\Response;
use Src\Shared\Kernel\Laravel\Response\ApiResponse;
use Illuminate\Http\Exceptions\HttpResponseException;

/** @phpstan-ignore-next-line */
abstract class APIRequest extends FormRequest
{
    /**
     * Determine if user authorized to make this request
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * If validator fails return the exception in json form
     * @param Validator $validator
     * @return array
     */
    protected function failedValidation(Validator $validator)
    {
        $errores = $validator->errors()->getMessages();
        $errorMessages = [];
        foreach ($errores as $campo => $rules) {
            foreach ($rules as $rule) {
                $errorMessages[] = [
                    'mensaje' => $rule,
                    'field' => $campo
                ];
            }
        }
        /** @phpstan-ignore-next-line */
        throw new HttpResponseException(ApiResponse::error(null, $errorMessages, Response::HTTP_UNPROCESSABLE_ENTITY));
    }

    abstract public function rules(): array;
}
