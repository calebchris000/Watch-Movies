<?php

namespace App\Traits;

use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Nette\Utils\Json;

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

    public function sendCount(int $count = 1)
    {
        return response()->json(
            self::format_list(['delete count'=> $count])
        );
    }

    protected static function format_list(
        Collection |array | Model | Json  $data,
        string $status = 'success',
        int $status_code = 200
    ): array {
        return ['data' => $data, 'status' => $status, 'status_code' => $status_code];
    }
}
