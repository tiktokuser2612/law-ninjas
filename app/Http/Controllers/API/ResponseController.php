<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ResponseController extends Controller
{
    public function sendresponse($data, $message){
        
        $response = [
            'success' => 'true',
            'data' => $data,
            'message' => $message,
        ];

        header( 'Content-Type: application/json; charset=utf-8' );
        header('HTTP/1.1 200 OK', true, 200);
        echo $val= str_replace('\\/', '/', json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
        die();
    }
    public function pagination($data,$paginate,$message)
    {
        $response = 
        [
           'success' => 'true',
           'data' => $data,
           'message' => $message,

           'page_limit' => $paginate['page_limit'],
           'page_number' => $paginate['page_number'],
           'total_data' => $paginate['total_business'],
           'total_pages' =>$paginate['total_pages'],
        ];
       header( 'Content-Type: application/json; charset=utf-8' );
        header('HTTP/1.1 200 OK', true, 200);
        echo $val= str_replace('\\/', '/', json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
        die();
    }

    public function senderror($message, $errorMessage){

        $response = [
            'success' => 'false',
            'message' => $message,
            'errorMessage' => $errorMessage,
        ];

        header( 'Content-Type: application/json; charset=utf-8' );
        header('HTTP/1.1 200 OK', true, 200);
        echo $val= str_replace('\\/', '/', json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
        die();
    }

    public function sendarrayresponse($data=[], $message){
        
        $response = [
            'success' => 'true',
            'data' => $data,
            'message' => $message,
        ];

        header( 'Content-Type: application/json; charset=utf-8' );
        header('HTTP/1.1 200 OK', true, 200);
        echo $val= str_replace('\\/', '/', json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
        die();
    }
}
