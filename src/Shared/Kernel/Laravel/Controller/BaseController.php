<?php

namespace Src\Shared\Kernel\Laravel\Controller;

use Illuminate\Http\JsonResponse;

class BaseController extends CustomBaseController
{
    public function __construct(
    ) {
        parent::__construct();
    }

    public const OK = 200;
    public const CREATED = 201;
    public const NO_CONTENT = 204;
    public const BAD_REQUEST = 400;
    public const UNAUTHORIZED = 401;
    public const FORBIDDEN = 403;
    public const NOT_FOUND = 404;
    public const CONFLICT = 409;
    public const INTERNAL_SERVER_ERROR = 500;

    /** @phpstan-ignore-next-line */
    public function sendResponse(string $message, mixed $data = []): JsonResponse
    {
        /** @phpstan-ignore-next-line */
        $data = match (true) {
            is_array($data) || is_string($data) => $data,
            is_object($data) => $data->jsonSerialize(),
        };

        $response =[
            'data' => $data,
            'success' => true,
            'status' => self::OK,
            'message' => $message,

        ];
        /** @phpstan-ignore-next-line */
        return response()->json($response, self::OK);
    }

    /** @phpstan-ignore-next-line */
    public static function sendErrorResponse(array $errores = [], int $status = null): JsonResponse
    {
        $statusCode = $status ?? self::INTERNAL_SERVER_ERROR;
        
        $response = [
            'success' => false,
            'status' => $statusCode,
        ];

        if(!empty($errores)) {
            $response['errors'] = $errores;
        }
        /** @phpstan-ignore-next-line */
        return response()->json($response, $statusCode);
    }
}
