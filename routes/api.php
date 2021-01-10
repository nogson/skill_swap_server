<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

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

Route::group(['middleware' => 'auth:api'], function () {
    Route::post('/user/logout', 'App\Http\Controllers\UserController@logout');
    Route::get('/user', 'App\Http\Controllers\UserController@show');
    Route::post('/user/{id}', 'App\Http\Controllers\UserController@update');
    Route::post('/user/imageUpload', 'App\Http\Controllers\UserController@imageUpload');
});


Route::post('/user', 'App\Http\Controllers\AuthController@store');
Route::get('/categories', 'App\Http\Controllers\CategoryController@index');
Route::get('/category/{id}/user', 'App\Http\Controllers\CategoryController@users');
Route::get('/skills', 'App\Http\Controllers\SkillController@index');
