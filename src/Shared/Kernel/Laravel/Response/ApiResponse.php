<?php

namespace Src\Shared\Kernel\Laravel\Response;

use Illuminate\Http\JsonResponse;

class ApiResponse
{
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
    public static function success(string $message, mixed $data = [], int $status = null): JsonResponse
    {
        /** @phpstan-ignore-next-line */
        $data = match (true) {
            is_array($data) || is_string($data) => $data,
            is_object($data) => $data->jsonSerialize(),
        };
        /** @phpstan-ignore-next-line */
        return response()->json([
            'message' => $message,
            'data' => $data
        ], $status ?? self::OK);
    }

    /** @phpstan-ignore-next-line */
    public static function error(string | null $message = null, array $errores = [], int $status = null): JsonResponse
    {
        /** @phpstan-ignore-next-line */
        return response()->json([
            'message' => $message,
            'data' => $errores
        ], $status ?? self::INTERNAL_SERVER_ERROR);
    }
}
