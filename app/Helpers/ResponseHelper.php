<?php

namespace App\Helpers;

use Illuminate\Http\JsonResponse;

class ResponseHelper
{
    /**
     * @param $data
     * @param int $code
     * @param string $message
     * @param array $errors
     * @param array $header
     * @return JsonResponse
     */
    public static function json($data, int $code, $message = '', $errors = [], $header = []): JsonResponse
    {
        $response = ['result' => $data, 'message' => $message, 'errors' => $errors];
        return response()->json($response, $code, $header);
    }
}
