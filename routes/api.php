<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BackEnd\Api\AuthController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//api_login routes....

Route::post('/login',[AuthController::class,'login']);
Route::post('/register',[AuthController::class,'register']);

//getting logedin user
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//logout route
Route::middleware('auth:sanctum')->post('/logout', function (Request $request) {
    $request->user()->currentAccessToken()->delete();
});



