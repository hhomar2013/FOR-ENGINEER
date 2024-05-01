<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Paytabscom\Laravel_paytabs\Facades\paypage;
class Paytab extends Controller
{
    public function create()
    {
        $language= app()->getLocale();
        $return='';
        $callback='';
        $same_as_billing=1;
        $cart_id=1;
        $cart_amount = 50;
        $cart_description =null;
        $name = "Omar Mahgoub";
        $email ="Omar@gmail.com";
        $phone = "01121593101";
        $street1 ="Omar";
        $city ="Cairo";
        $state = "Cairo";
        $country ="EGY";
        $zip ="0020";
        $ip="192.168.1.20";
        $pay = paypage::sendPaymentCode('all')
            ->sendTransaction('sale')
            ->sendCart($cart_id, $cart_amount, $cart_description)
            ->sendCustomerDetails($name, $email, $phone, $street1, $city, $state, $country, $zip, $ip)
            ->sendShippingDetails($same_as_billing, $name = null, $email = null, $phone = null, $street1= null, $city = null, $state = null, $country = null, $zip = null, $ip = null)
            ->sendHideShipping(false)
            ->sendURLs($return, $callback)
            ->sendLanguage($language)
            ->sendFramed(false)
            ->create_pay_page(); // to initiate payment page
            return $pay;
    }
}
