<?php

namespace App\Http\Controllers;

class AppBaseController extends Controller
{
    public function sendError($message, $code = 404)
    {
        return response()->json([
            'success' => false,
            'message' => $message,
        ], $code);
    }

    public function sendSuccess($message, $data = [])
    {
        return response()->json(array_merge([
            'success' => true,
            'message' => $message,
        ], $data));
    }
}
