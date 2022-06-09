<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\SandboxEnvironment;
use PayPalCheckoutSdk\Core\ProductionEnvironment;
use PayPalCheckoutSdk\Orders\OrdersCreateRequest;
use PayPalCheckoutSdk\Orders\OrdersCaptureRequest;
use App\Http\Controllers\FrontEnd\CheckoutController;

class PaypalController extends Controller
{
    public function paypalCheckout()
    {
        $clientId=env('PAYPAL_CLIENT_ID');
        $clientSecret=env('PAYPAL_CLIENT_SECRET');
        $payment_mode=env('PAYPAL_PAYMENT_MODE');

        if($payment_mode=='sandbox')
        {
            $environment = new SandboxEnvironment($clientId, $clientSecret);
        }else{
            $environment = new ProductionEnvironment($clientId, $clientSecret);
        }
        $client = new PayPalHttpClient($environment);

        //here getting the order_id with order details for amount and total tax any
        $amount=1000;
        $request = new OrdersCreateRequest();

        $request->prefer('return=representation');

        $request->body = [
            "intent" => "CAPTURE",
            "purchase_units" => [[
                "reference_id" => rand(66666,99999),
                "amount" => [
                    "value" => number_format($amount,2,'.',''),
                    "currency_code" => "USD"
                ]
            ]],
            "application_context" => [
                 "cancel_url" => url('paypal/payment/cancel'),
                 "return_url" => url('paypal/payment/success'),
            ] 
        ];

        try {
            // Call API with your client and get a response for your call
            $response = $client->execute($request);

            return Redirect::to($response->result->links[1]->href);
            
            // If call returns body in response, you can get the deserialized version from the result attribute of the response
            //print_r($response);
        }catch (\HttpException $ex) {
            echo $ex->statusCode;
            dd($ex->getMessage());
        }

       

    }

    public function paypalCancel()
    {
        return view('frontend.pages.paypalcancel');
    }
    public function paypalSuccess(Request $request)
    {
        $clientId=env('PAYPAL_CLIENT_ID');
        $clientSecret=env('PAYPAL_CLIENT_SECRET');
        $payment_mode=env('PAYPAL_PAYMENT_MODE');

        if($payment_mode=='sandbox')
        {
            $environment = new SandboxEnvironment($clientId, $clientSecret);
        }else{
            $environment = new ProductionEnvironment($clientId, $clientSecret);
        }

        $client = new PayPalHttpClient($environment);

        $OrdersCaptureRequest = new OrdersCaptureRequest($request->token);
        $OrdersCaptureRequest->prefer('return=representation');

        try {
            // Call API with your client and get a response for your call
            $response = $client->execute($OrdersCaptureRequest);
            $CheckoutController=new CheckoutController;
            //parameter this function $request->sessin()->get('order_if)
            return $CheckoutController->paypal_checkoutDone(json_encode($response));
            
            
        }catch (\HttpException $ex) {
            echo $ex->statusCode;
            dd($ex->getMessage());
        }
        
        return view('frontend.pages.paypalsuccess');
    }
}
