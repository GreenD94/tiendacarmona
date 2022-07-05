<?php

namespace App\Traits;

use Illuminate\Http\Exceptions\HttpResponseException;

trait Responser
{

    protected function successResponse($data = null, $message = 'OK', $code = 200)
    {
        return response()->json([
            //'code'		=>	200,
            'message'   => $message,
            'data'      => $data
        ], $code);
    }

    protected function errorResponse($data = null, $message = 'Bad Request', $code = 400)
    {
        throw new HttpResponseException(response()->json([
            //'code'        =>    $code,
            'message'   => $message,
            'data'      => $data
        ], $code));
    }

    protected function failedAjaxResponse()
    {
        if (!env('AJAX_VALIDATION')) {
            return false;
        }
        if (!$this->ajax()) {
            $this->errorResponse(null, 'only ajax is accepted', 403);
        }
    }
}
