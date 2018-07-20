
<?php
use Laravolt\Envi\Http\Controllers\CobaController;

// dd(new CobaController());
Route::group(
    [
    'namespace'  => '\Laravolt\Envi\Http\Controllers',
    'middleware' => ['web', 'auth'],
    'prefix'     => 'envi',
    'as'         => 'envi::',
    ],
    function ($router) {
    	$router->get('test', function ()
    	{
    		// exit('test route');
    		return view('envi::test');
    	} );
    	// dd($router);
        $router->get('coba', array(
            'as' => 'show',
            'uses' => 'CobaController@index',
        ));

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
