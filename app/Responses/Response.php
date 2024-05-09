<?php

namespace App\Responses;

class Response
{

    public static function Error($message, $data, $code = 500)
    {
        return response()->json([
            'status' => 0,
            'data' => $data,
            'message' => $message,
        ], $code);
    }
    public static function Success($message, $data, $code = 200)
    {
        return response()->json([
            'status' => 1,
            'data' => $data,
            'message' => $message,
        ], $code);
    }
    public static function Validation($message, $data, $code = 422)
    {
        return response()->json([
            'status' => 0,
            'data' => $data,
            'message' => $message,
        ], $code);
    }
}
