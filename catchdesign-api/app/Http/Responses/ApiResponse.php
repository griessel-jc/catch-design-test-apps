<?php

namespace App\Http\Responses;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Log;

class ApiResponse
{
  public static function throw($e, $message = "Something went wrong, please try again.", $code = 500)
  {
    Log::error($e);
    throw new HttpResponseException(self::sendError($message, $code));
  }

  public static function sendResponse($result, $message = '', $code = 200)
  {
    $response = [
      'success' => true,
      'data'    => $result,
      'message' => $message
    ];
    return response()->json($response, $code);
  }
  public static function sendError($message, $code = 500, $errors = [])
  {
    return response()->json([
      'success' => false,
      'message' => $message,
      'errors'  => $errors
    ], $code);
  }
}
