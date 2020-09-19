<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    //

    protected $response = [
        'application' => 'intership-study-case-program',
        'author' => 'Muhammad Irva',
    ];

    public function responseSuccess($data= NULL, $message = 'Successfully', $statusCode = 200) {
        $this->response['code'] = $statusCode;
        $this->response['status'] = TRUE;
        $this->response['message'] = $message;

        if($data) {
            $this->response['data'] = $data;
        }

        return response()->json($this->response, $statusCode);
    }

    public function responseError($data= NULL, $message = 'Bad Request', $statusCode = 400) {
        $this->response['status'] = false;
        $this->response['message'] = $message;
        $this->response['status_code'] = $statusCode;

        return response()->json($this->response, $statusCode);
    }
}
