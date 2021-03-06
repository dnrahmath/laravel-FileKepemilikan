<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});



Route::prefix('auth')->group(function(){
    Route::post('login','AuthController@login');
    Route::post('register', 'AuthController@register');
    Route::group(['middleware' => 'auth:api'], function(){
        Route::get('user', 'AuthController@profile');

        //Route::post('file-simpan', 'userFileKepemilikanController@store');
        //Route::put('file-update', 'userFileKepemilikanController@update');
        Route::resource('file-crud', 'userFileKepemilikanController');

        Route::get('logout', 'AuthController@logout');
    });
    
});
