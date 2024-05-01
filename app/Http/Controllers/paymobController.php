<?php

namespace App\Http\Controllers;

use Alaa\Paymob\Paymob;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use mysql_xdevapi\Exception;


class paymobController extends Controller
{



    public function create()
    {

        Paymob::setConfig([
            "api_key" => "ZXlKMGVYQWlPaUpLVjFRaUxDSmhiR2NpT2lKSVV6VXhNaUo5LmV5SmpiR0Z6Y3lJNklrMWxjbU5vWVc1MElpd2libUZ0WlNJNkltbHVhWFJwWVd3aUxDSndjbTltYVd4bFgzQnJJam94T0RjNU5EbDkua1M1cXlSdnNSeWpaQXluRU11STZ6Qk1wRW8tcllzRTZvTVhRWVR5T2lYZG9Kd3hBczAwVi1SQWRhMmk4OGdtQVNhV29TZEVZT3lpOFRaWmRMeVBJbVE=" ,
            "card_integration"  => "2177589",
            "wallet_integration"  => "3739318",
            "default_iframe"  => "392381",
        ]);

        $amount_cents = 1500 * 100;
        $billing_data = [
            'first_name'=>"Omar" ,
            'last_name'=>"mahgoub",
            'phone_number'=>'01128094004' ,
            'email'=>'hhomar2013@gmail.com',
            'street'=>'NA',
            'building'=>'NA',
            'floor'=>'NA',
            'apartment'=>'NA',
            'city'=>'NA',
            'country'=>'NA'
        ];
        $mobile = '01099499139';




        try {
            $submit = Paymob::card($amount_cents,$billing_data);
        }catch (\Exception $e){
            return  $e;
    }
       return redirect($submit['url']);

    }


}
