<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home-admin', 'HomeController@indexadmin');

Route::get('web/input-report', 'ControllerInputReport@NewReportButton');
Route::post('web/input-report', 'ControllerInputReport@SubmitReportButton');

Route::get('web/display-report', 'ControllerDisplayReport@LoadDatabase');
Route::get('web/validate-report/{id}', 'ControllerDisplayReport@ValidateReport');

Route::get('web/modify-account', 'ControllerModifyAccount@PilihUser');
Route::get('web/modify-account/{id}', 'ControllerModifyAccount@EditUser');
Route::post('web/modify-account/{id}', 'ControllerModifyAccount@SaveToDB');

Route::get('web/add-account', 'ControllerAddAccount@AddUser');
Route::post('web/add-account', 'ControllerAddAccount@SaveToDB');

Route::get('web/logout', function() {
	Auth::logout();
	return view('home');
});