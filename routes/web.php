<?php

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
// use Laravolt\Envi\ServiceProvider;
Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', function () {
	// dd(env('DB_CONNECTION'));
    return view('home');
});
// Route::get('/test', ['uses' => 'TestController@index']);
// Route::resource('/report', 'ReportsController');
