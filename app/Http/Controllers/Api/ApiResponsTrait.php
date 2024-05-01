<?php


namespace App\Http\Controllers\Api;


trait ApiResponsTrait
{
    public function apiResponse($date = null,$message = null,$status = null)
    {
        $array =[
            'data'=> $date,
            'message'=> $message,
            'status' => $status,
        ];
        return response( $array, $status);
    }
}
