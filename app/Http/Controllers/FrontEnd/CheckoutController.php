<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\FrontEnd\PaypalController;

class CheckoutController extends Controller
{
    public function checkoutOrder(Request $request)
    {
        if($request->payment=='paypal')
        {
            $paypal=new PaypalController;
            return $paypal->paypalCheckout();
        }
       
    }

    public function paypal_checkoutDone($payment)
    {
        //here pass order id also an find order update payment status here
        //and send mail confirmation
        dd("from paypal response",$payment);
    }
}
