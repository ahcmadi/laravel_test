
<?php
use Laravolt\Envi\Http\Controllers\CobaController;

// dd(new CobaController());
Route::group(
    [
    'namespace'  => '\Laravolt\Envi\Http\Controllers',
    'middleware' => ['web', 'auth'],
    // 'middleware' => ['web',],
    'prefix'     => 'envi',
    'as'         => 'envi::',
    ],
    function ($router) {
    	$router->get('/', function ()
    	{
    		// exit('test route');
    		return view('envi::test');
    	} );
    	// dd($router);
        // $router->resource('/', array(
        //     'as' => 'show',
        //     'uses' => 'EnviController@index',
        // ));
        Route::resource('/setup', 'EnviController');
        // $router->get('/', array(
        //     'as' => 'show',
        //     'uses' => 'EnviController@index',
        // ));
        // $router->post('save', array(
        //     'as' => 'save',
        //     'uses' => 'EnviController@save',
        // ));

        // Route::post('/', array(
        //     'as' => 'store',
        //     'uses' => 'RkaklController@store',
        // ));
    
        // Route::resource('tabel-rkakl', 'TabelRkaklController')->only(['index']);

        // Route::get('getChilds', array(
        //     'as' => 'getChilds',
        //     'uses' => 'TabelRkaklController@getChilds',
        // ));
    }
);
