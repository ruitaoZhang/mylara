<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Prophecy\Exception\Doubler\MethodNotFoundException;

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
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        \Log::error('异常请求链接：' . url()->current());
        \Log::error('异常请求数据：' . json_encode($request->all(), JSON_UNESCAPED_UNICODE));
        \Log::error('错误信息：' . $exception->getMessage());
        \Log::error('错误行号：' . $exception->getLine());
        \Log::error('错误文件：' . $exception->getFile());

        //捕获抛出的异常进行处理
        if ($exception instanceof MethodNotFoundException){
            $message = $exception->getMessage();
//            $message = 123;
            return response()->view('401', ["message" => $message]);

        }
        return parent::render($request, $exception);
    }
}
