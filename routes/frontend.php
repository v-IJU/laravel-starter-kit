<?php

use App\Http\Controllers\FrontEnd\WebController;
use App\Http\Controllers\FrontEnd\BlogController;
use App\Http\Controllers\FrontEnd\PaypalController;
use App\Http\Controllers\FrontEnd\CheckoutController;







Route::get('/', function () {
    return view('frontend.welcome');
});

//web routes
Route::get('/dashboard',[WebController::class,'index'])->middleware(['frontend'])->name('dashboard');

//web blog routes
Route::group(['middleware' => ['frontend']],function(){

	Route::resource('blog',BlogController::class);
});
Route::group(['middleware' => ['frontend'],'as'=>'order.'],function(){

	Route::post('ordercheckout',[CheckoutController::class,'checkoutOrder'])->name('checkout');
	Route::get('paypal/payment/cancel',[PaypalController::class,'paypalCancel'])->name('paypalcancel');
	Route::get('paypal/payment/success',[PaypalController::class,'paypalSuccess'])->name('paypalsuccess');
});

