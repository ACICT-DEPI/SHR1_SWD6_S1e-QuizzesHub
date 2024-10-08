<?php

namespace App\Helpers;

class ApiHelper
{

    public static function getResponse($satus=200, $message=null, $data=null)
    {
        return response()->json([
            'status' => $satus,
            'message' => $message,
            'data' => $data
        ], $satus);
    }

}
