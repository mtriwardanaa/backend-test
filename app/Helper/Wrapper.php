<?php

namespace App\Helper;

use Illuminate\Http\JsonResponse;

/**
 * Summary of Wrapper
 * @author PutrimakIslan
 * @copyright (c) 2022
 */
class Wrapper
{
    /**
     * Summary of errorFetch
     * @param \Throwable $th
     * @param int $status
     * @return JsonResponse
     */
    public static function errorFetch(\Throwable $th)
    {
        $httpCode = 500;
        $message = [$th->getMessage()];

        $class = get_class($th);
        if ($class == 'Laravel\Passport\Exceptions\OAuthServerException') {
            $httpCode = $th->getPrevious()->getHttpStatusCode();
        }

        if ($class == 'Illuminate\Auth\AuthenticationException') {
            $httpCode = 401;
        }

        if ($class == 'Illuminate\Validation\ValidationException') {
            $httpCode = 400;
        }

        if ($class == 'Symfony\Component\HttpKernel\Exception\NotFoundHttpException') {
            $httpCode = 404;
            array_push($message, 'Route not found, please check again!!!');
        }

        if ($class == 'BadMethodCallException') {
            $httpCode = 501;
            array_push($message, 'Controller name not found, please report!!!');
        }

        return self::error(
            $message,
            $httpCode,
        );
    }
    /**
     * Summary of error
     * @param mixed $message
     * @param mixed $code
     * @param mixed $status
     * @return \Illuminate\Http\JsonResponse
     */
    public static function error(mixed $message, int $httpCode): JsonResponse
    {
        $message = gettype($message) == 'array' ? $message : [$message];
        $set = [
            'status'   => false,
            'data'     => null,
            'httpCode' => $httpCode,
        ];

        $set['messages'] = $message;
        return response()->json($set, $httpCode);
    }

    /**
     * Summary of data
     * @param mixed $message
     * @param mixed $code
     * @param mixed $status
     * @return \Illuminate\Http\JsonResponse
     */
    public static function data(mixed $data, string $message, int $httpCode = 200)
    {
        $data = [
            'status'   => true,
            'data'     => $data,
            'messages' => [$message],
            'httpCode' => $httpCode,
        ];

        return response()->json($data, $httpCode);
    }
}
