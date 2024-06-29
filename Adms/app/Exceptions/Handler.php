<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class Handler extends ExceptionHandler
{
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    public function render($request, Throwable $exception)
    {
        if($exception instanceof UnauthorizedHttpException){
            return response()->json(['error' => $exception->getMessage()], 401);
            
        }

        if ($exception instanceof TokenExpiredException) {
            return response()->json(['error' => 'Token has expired'], 401);
        } elseif ($exception instanceof TokenInvalidException) {
            return response()->json(['error' => 'Token is invalid'], 401);
        } elseif ($exception instanceof JWTException) {
            return response()->json(['error' => 'Token is not provided'], 401);
        } elseif ($exception instanceof UnauthorizedHttpException && $exception->getPrevious() instanceof TokenExpiredException) {
            return response()->json(['error' => 'Token has expired and cannot be refreshed'], 401);
        }

        return parent::render($request, $exception);
    }
}
