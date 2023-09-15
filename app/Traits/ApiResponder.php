<?php

namespace App\Traits;

use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;

trait ApiResponder
{
    public function showAll(
        Collection | array $data = [],
        int $status_code = 200,
        string $status = 'success',
    ): JsonResponse {
        return response()->json(self::format_list($data, $status,), $status_code);
    }

    public function showOne(
        Collection | Model $data,
        int $status_code = 200,
        string $status = 'success'
    ) : JsonResponse
    {
        return response()->json(self::format_list($data, $status, $status_code));
    }

    public function sendSuccess(
        int $status_code = 200,
        string $status = 'success',
        string $message = 'Action completed with a success'
    ): JsonResponse {
        return response()->json(['status' => $status, 'status_code' => $status_code, 'message'=> $message]);
    }

    public function sendError(
        string $message = 'An unknown error occurred',
        int $status_code = 403,
        string $status = 'failure'
    ): JsonResponse {
        return response()->json([
            'data' => [
                'error' => ['message' => $message]
            ],
            'status_code' => $status_code,
            'status' => $status
        ]);
    }

    protected static function format_list(
        Collection | Model  $data,
        string $status = 'success',
        int $api_code = 100
    ): array {
        return ['data' => $data, 'status' => $status, 'api_code' => $api_code];
    }
}
