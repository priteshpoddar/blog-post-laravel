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
     // phpinfo();

    return view('welcome');
});


// Route::group(['middleware' => 'auth'], function () {

// 	Route::resource('blog', 'BlogController');
// });


Route::auth();

Route::resource('/home', 'HomeController');
Route::get('/fetch/image', 'ImageController@index');
Route::get('/display/image', 'ImageController@show');
