<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Session\TokenMismatchException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Exception|Throwable $exception)
    {
        if ($this->isHttpException($exception)) {
            if ($exception instanceof MethodNotAllowedHttpException) {
                return redirect()->route('exception.404');
            }
            if ($exception->getStatusCode() == 404) {
                return redirect()->route('exception.404');
            }
            if ($exception->getStatusCode() == 403) {
                return redirect()->route('exception.403');
            }
            if ($exception->getStatusCode() == 500) {
                return redirect()->route('exception.500');
            }
            if ($exception instanceof TokenMismatchException) {
                return redirect()->route('exception.500');
            }
        }
        return parent::render($request, $exception);
    }
}
