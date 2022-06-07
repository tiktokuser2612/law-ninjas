<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use DB;

class SecurityController extends ResponseController
{
    function encryptdecrypt($action, $string) {
        $keys = DB::table('tbl_secret_key_iv')->first();
        $encrypt_method = "AES-256-CBC";
        $secret_key = $keys->secret_key;
        $secret_iv = $keys->secret_iv;
        $key = hash('sha256', $secret_key);
        $key = substr($key, 0, 32);
        $iv = substr(hash('sha256', $secret_iv), 0, 16);

        if($action == 'encryption'){
            $output  = base64_encode(openssl_encrypt($string, $encrypt_method, $key, 0, $iv));
        }else{
            if(empty($string)){
                $output = null;
            }else{
                $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
            }
        }
        return $output;
    }

    function getkeys(Request $request) {
        switch ($request->method()) {
            case 'POST':
                $keys = DB::table('tbl_secret_key_iv')->first();
                if(is_null($keys)){
                    return $this->senderror('Error', "secret_key or secret_iv not found");
                }
                $data['key'] = $keys->secret_key;
                $data['iv']  = $keys->secret_iv;

                return $this->sendresponse($data, 'Data retrieved successfully');
            break;
            default:
                return $this->senderror('Error', "Invalid method for service");
            break;
        }
    }

    function testing(Request $request) {

        $action = $request->action;
        $string = $request->string;
        
        return $this->encryptdecrypt($action, $string);
    }
}


