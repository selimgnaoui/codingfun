<?php
use GuzzleHttp\Client;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|


Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/', 'HomeController@showWelcomepage');

Route::post('/', 'HomeController@submitform');

Route::get('/displayall', 'HomeController@displayall');

Route::get('/radiussearch', 'HomeController@radiussearch');
Route::post('/radiussearch', 'HomeController@radiussearch');
$this->app->singleton('App\Classes\Crudfunction', function ($app) {
    return new \App\Library\Classes\Crudfunction(env('ENDPOINT'),new GuzzleHttp\Client(),env('RADIUSSEARCH'));

});