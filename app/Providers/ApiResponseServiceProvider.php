<?php


namespace App\Providers;


use Carbon\Laravel\ServiceProvider;
use Illuminate\Support\Facades\Response;

class ApiResponseServiceProvider extends ServiceProvider
{
    /**
     * response macro
     *
     * @return void
     */
    public function boot()
    {
        // success
        Response::macro('success', function ($data = [], $extraData = []) {
            return response()->json([
                'success'  => true,
                'response' => $data,
                'extra'    => $extraData
            ]);
        });

        // error（画面側でエラー処理させる）
        Response::macro('error', function ($errMsg = '', array $errors = []) {
            return response()->json([
                'success'  => false,
                'errMsg'   => $errMsg,
                'errors'   => $errors
            ]);
        });

        // error
        Response::macro('fatalError', function ($errMsg, array $errors = [], $status = ResponseStatus::HTTP_INTERNAL_SERVER_ERROR) {
            return response()->json([
                'success'  => false,
                'status'   => $status,
                'errMsg'   => $errMsg,
                'errors'   => $errors
            ], $status);
        });
    }
}
