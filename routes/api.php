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
    Route::get('/loginUser', 'App\Http\Controllers\UserController@showMe');
    Route::post('/user/{id}', 'App\Http\Controllers\UserController@update');
    Route::post('/user/imageUpload', 'App\Http\Controllers\UserController@imageUpload');
    Route::post('/message', 'App\Http\Controllers\MessageController@store');
    Route::get('/getMessageUsers', 'App\Http\Controllers\MessageController@users');
    Route::get('/getMessages/{id}', 'App\Http\Controllers\MessageController@index');
});


Route::post('/user', 'App\Http\Controllers\AuthController@store');
Route::get('/user/{id}', 'App\Http\Controllers\UserController@show');
Route::get('/category', 'App\Http\Controllers\CategoryController@index');
Route::get('/category/{id}/user', 'App\Http\Controllers\CategoryController@users');
Route::get('/skills', 'App\Http\Controllers\SkillController@index');
Route::get('/category/{id}/skills', 'App\Http\Controllers\SkillController@skills');
Route::get('/category/{id}/users', 'App\Http\Controllers\SkillController@categoryUsers');
Route::get('/skill/{id}/users', 'App\Http\Controllers\SkillController@skillUsers');
Route::post('/skills/users', 'App\Http\Controllers\SkillController@skillsUsers');

