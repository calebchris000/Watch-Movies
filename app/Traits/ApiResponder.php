<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;

trait ApiResponder
{
    public function showAll(
        Collection | array $data = [],
        int $code = 200,
        string $status = 'success',
        int $api_code = 100
    ): JsonResponse {
        return response()->json(self::format_list($data, $status, $api_code), $code);
    }

    protected static function format_list(
        Collection | array  $data = [],
        string $status = 'success',
        int $api_code = 100
    ) {
        return ['data' => $data, 'status' => $status, 'api_code' => $api_code];
    }
}
