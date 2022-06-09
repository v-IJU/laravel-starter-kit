<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BackEnd\HomeController;
use App\Http\Controllers\BackEnd\RoleController;
use App\Http\Controllers\BackEnd\UserController;
use App\Http\Controllers\BackEnd\ProfileController;
use App\Http\Controllers\BackEnd\SiteuserController;
use App\Http\Controllers\Backend\MailconfigController;
use App\Http\Controllers\BackEnd\PermissionController;
use App\Http\Controllers\BackEnd\NotificationController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//frontend routes
require __DIR__.'/frontend.php';


require __DIR__.'/front_auth.php';


//admin routes
Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'App\Http\Controllers\BackEnd\LanguageController@switchLang']);
Route::group(['middleware' => ['auth']],function(){

	Route::get('Administrator/dashboard', [HomeController::class, 'Home'])->name('administrator.dashboard');
	Route::get('Administrator/logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);
	});

Route::group(['prefix' => 'siteuser', 'middleware' => ['auth','permission']],function(){

	Route::get('/list',[SiteuserController::class,'index'])->name('siteuser.index');
	Route::get('/edit/{id}',[SiteuserController::class,'edit'])->name('siteuser.edit');
	Route::get('/addsiteuser',[SiteuserController::class,'create'])->name('siteuser.create');

	Route::any('/userdata',[SiteuserController::class,'getsiteuserdata'])->name('getsiteuser_data');
	Route::get('/statuschange',[SiteuserController::class,'statuschange'])->name('statuschange.siteuser');
});

Route::group(['prefix'=>'adminuser','middleware'=>['auth','permission']],function(){
	Route::resource('user',UserController::class);
});
Route::any('/destroy/{id}',[SiteuserController::class,'destroy'])->name('destroy.siteuser');

Route::group(['prefix'=>'admin','middleware'=>['auth','permission']],function(){
	Route::resource('role',RoleController::class);

	Route::get('rolluserdata',[RoleController::class,'getrolluser_data'])->name('role.getrolluser_data');

	Route::resource('permission',PermissionController::class);
	Route::any('getpermissiondata',[PermissionController::class,'getpermissionData'])->name('getpermissionData');
	
});

//notifications
Route::group(['prefix'=>'admin','middleware'=>['auth','permission']],function(){
	Route::get('readnotifications',[NotificationController::class,'readnotification'])->name('readnotification');
});
Route::get('sample',[RoleController::class,'sample'])->name('sample');
Route::get('export',[RoleController::class,'export'])->name('export.excel');


//mail config
Route::group(['prefix'=>'mailconfiguration','middleware'=>['auth','permission'],'as'=>'mailconfig.'],function(){

	Route::get('view', [MailconfigController::class, 'index'])->name('view');
	Route::post('update/{id}', [MailconfigController::class, 'update'])->name('update');

});

//lfm config

Route::group(['prefix'=>'lfm','middleware'=>['auth','permission'],'as'=>'lfm.'],function(){

	Route::get('view', [MailconfigController::class, 'lfmview'])->name('view');

});

//profile

Route::group(['prefix'=>'profile','middleware'=>['auth']],function(){

	Route::resource('user', ProfileController::class);

});
require __DIR__.'/auth.php';
