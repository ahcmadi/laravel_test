<?php 
Route::group(
    [
    'namespace'  => '\Laravolt\Envi\Http\Controllers',
    'middleware' => ['web', 'auth'],
    // 'middleware' => ['web',],
    'prefix'     => 'ngomik',
    'as'         => 'ngomik::',
    ],
    function ($router) {

    	// Ngomik.com adalah sebuah platform untuk mempublikasikan komik bagi komunitas. Di ngomik.com, user bisa mempublikasikan komik, berinteraksi via komentar, dan saling mem-follow dengan user lainnya. FYI, sebuah komik bisa memiliki banyak chapter.

    	// Anda diminta untuk menuliskan deklarasi routes dalam framework Laravel, dengan daftar halaman dan fungsionalitas seperti berikut:


    	//halaman publik untuk menampilkan seluruh judul komik
    	Route::get('/', 'NgomikController@index');

    	//halaman untuk menampilkan daftar chapter dari suatu komik
    	Route::get('/ngomik/{id}/chapter', 'ChapterController@index');
    	-Route::get('/ngomik-chapter/{ngomik_id}', 'NgomikChapterController@show');

    	//halaman untuk membaca chapter komik
    	Route::get('/ngomik/{id}/chapter/{id}', 'ChapterController@show');
    	-Route::get('/ngomik-chapter/{ngomik_id}/{id}', 'NgomikChapterController@index');

    	//Halaman profil user yang terdiri dari:
    		//Halaman yang menampilkan daftar komik yang pernah diupload
    		Route::get('/ngomik/myupload', 'MyUploadController@index');
    		-Route::get('/my-ngomik', 'MyNgomikController@index');

    		//Halaman yang menampilkan daftar follower
    		Route::get('/my-follower', 'MyFollowerController@index');

    	//User bisa membuat sebuah series komik baru
    		//mengedit dan menghapus komiknya sendiri
    		Route::get('/ngomik/myseries/create', 'MySeriesController@create');
    		-Route::get('/my-series/{ngomik_id}/create', 'MyNgomikController@index@create');
    		Route::post('/ngomik/myseries', 'MySeriesController@store');
    		-Route::post('/my-series/{ngomik_id}', 'MyNgomikController@index@store');

    		//edit dan delete series komik baru : butuh id_komik
    		Route::get('/ngomik/myseries/{id}/edit', 'MySeriesController@edit');
    		-Route::get('/my-series/{ngomik_id}/{id}/edit', 'MySeriesController@edit');
    		Route::put('/ngomik/myseries/{id}', 'MySeriesController@update');
    		-Route::put('/my-series/{ngomik_id}/{id}', 'MySeriesController@update');

    		Route::delete('/ngomik/myseries/{id}', 'MySeriesController@destroy');
    		-Route::delete('/my-series/{ngomik_id}/{id}', 'MySeriesController@destroy');

    	//mengedit dan menghapus chapter
    		Route::get('/ngomik/myseries/{id}/mychapter/{id}/edit', 'MyChapterController@edit'); 
    		-Route::get('/my-ngomik-chapter/{ngomik_id}/{id}/edit', 'MyComicChapterController@edit'); 
    		Route::put('/ngomik/myseries/{id}/mychapter/{id}', 'MyChapterController@update');
    		-Route::put('/my-ngomik-chapter/{ngomik_id}/{id}/', 'MyComicChapterController@update');
    		Route::delete('/ngomik/myseries/{id}/mychapter/{id}', 'MyChapterController@destroy');
    		-Route::delete('/my-ngomik-chapter/{ngomik_id}/{id}/', 'MyComicChapterController@destroy');

    	//mem-follow user lain
    	Route::post('/follow', 'FollowController@store');

    	//meng-unfollow user lain
    	Route::delete('/follow/{id}', 'FollowController@destroy');

    	//memberikan komentar ke suatu chapter (chapter, bukan komik)
    	Route::get('/ngomik/{id}/chapter/{id}/komentar/create', 'MySeriesController@create');
    	-Route::get('/my-comment/{chapter_id}/create', 'MyCommentController@create');
    	Route::post('/ngomik/{id}/chapter/{id}/komentar', 'MySeriesController@store');
    	-Route::post('/my-comment/{chapter_id}', 'MyCommentController@store');

    	//menghapus komentarnya sendiri
    	Route::delete('/ngomik/mykometar/{id}', 'MyKomentarController@destroy');
    	-Route::delete('/my-comment/{chapter_id}/{id}', 'MyKomentarController@destroy');

    }
);