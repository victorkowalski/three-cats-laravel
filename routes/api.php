<?php

use Illuminate\Http\Request;

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
/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/
Route::middleware('auth:email')->group(function () {

        Route::get('/index', 'Api\TestController@index');

});

Route::middleware('cors')->group(function () {

    Route::group(['prefix' => 'users'], function () {
        Route::post('/register', 'Api\RegisterController@register');
        Route::post('/authenticate', 'Api\LoginController@login');
        
    });
});

//Route::group(['prefix' => 'api'], function () {
//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/products-search/{q}', 'ProductsController@search');
Route::post('/products', 'ProductsController@create');
//});
