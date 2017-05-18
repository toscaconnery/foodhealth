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

Route::get('/home', 'HomeController@index');

Route::get('input-report', 'ControllerInputReport@NewReportButton');
Route::post('input-report', 'ControllerInputReport@SubmitReportButton');

Route::get('display-report', 'ControllerDisplayReport@LoadDatabase');

Route::get('modify-account', 'ControllerModifyAccount@EditUser');
Route::post('modify-account', 'ControllerModifyAccount@SaveToDB');

Route::get('logout', function() {
	Auth::logout();
	return view('home');
});