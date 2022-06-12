<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{


    protected $dontReport = [];

    protected $dontFlash = ['current_password', 'password', 'password_confirmation'];

    public function register()
    {

        $this->renderable(function (Throwable $exception, $request) {

            if (Str::contains($request->path(), 'api')) {

                if ($exception instanceof ValidationException) {
                    return response()->json(['status' => false, 'message' => 'Please fill all required fields', 'data' => $exception->validator->errors()->all()], 200);
                }

                if ($exception instanceof NotFoundHttpException) {
                    return response()->json(['status' => false, 'message' => 'Page not found', 'data' => $exception->getMessage()], 200);
                }

                return response()->json(['status' => false, 'message' => 'something went wrong', 'data' => $exception->getMessage()], 200);
            }

            //            dd($exception->getMessage());
            if ($exception instanceof ValidationException) {
                return Redirect::back()->withErrors($exception->validator)->withInput();
            }
        });
    }

    public function getUserIpAddr()
    {
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if (isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if (isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if (isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if (isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }
}
