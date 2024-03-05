<?php

namespace Src\Shared\Utils\Http;

use Exception;
use Illuminate\Http\JsonResponse;

class ApiResponse
{
    protected const ERROR_TYPE = 'Error en la respuesta API, el error debe ser un array que contenga un array por cada error. Ejemplo: [["campo1" => "valor1", "campo2" => "valor2"],["campo11" => "valor11"]]';
    protected const ERROR_CODIGO_ESTADO_200 = 'Error en la respuesta API, el código de estado no puede ser 200 y tener errores. Quizás deberías usar el campo data para enviar esta información o modificar el estado para indicar su error';
    protected const ERROR_CODIGO_ESTADO = 'Error en la respuesta API, el código de estado debe ser 200, 400, 401, 404, 405 o 500';
    protected const ERROR_MALFORMED_RESPONSE = 'Respuesta API mal formada';
    protected const STATUS_CODE = [200, 400, 401, 403, 404, 405, 422, 500]; 

    public const ESTADO_200_OK = 200;
    public const ESTADO_400_ERROR = 400;
    public const ESTADO_401_NO_AUTORIZADO = 401;
    public const ESTADO_404_RECURSO_NO_ENCONTRADO = 404;
    public const ESTADO_405_ACCION_NO_PERMITIDA = 405;


    /**
     * Metodo para retornar una respuesta json estandarizada
     *
     * @param mixed $content
     * @param array $errors
     * @param integer $status
     * @return JsonResponse
     */
    public static function json($content = null, int $status = 200, array $errors = []): JsonResponse
    {
        static::comprobarError($errors);
        static::comprobarStatus($errors, $status);
        
        $errors =['count' => count($errors), 'errors' => []];

        $response = [
            'data' => $content,
            'success' => true,
            'status' => $status
        ];

        return response()->json($response, $status);
    }


    /**
     * Comprobamos que el estado no es 200 cuando hay errores
     *
     * @param array $errors
     * @param integer $status
     * @return void
     */
    protected static function comprobarStatus(array $errors, int $status): void
    {
        if (empty($errors) === false && $status === 200) {
            throw new Exception(self::ERROR_CODIGO_ESTADO_200);
        }

        if (in_array($status, self::STATUS_CODE) === false) {
            throw new Exception(self::ERROR_CODIGO_ESTADO);
        }
    }

    /**
     * Comprobamos que el campo errors es un array que contiene arrays
     *
     * @param array $errors
     * @return void
     */
    protected static function comprobarError(array $errors): void
    {
        foreach ($errors as $error) {
            if (is_array($error) === false) {
                throw new Exception(self::ERROR_TYPE);
            }

            foreach ($error as $valor) {
                if (is_array($valor) === true) {
                    throw new Exception(self::ERROR_TYPE);
                }
            }
        }
    }

}
