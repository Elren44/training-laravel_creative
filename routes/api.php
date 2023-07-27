<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api as Api;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group([

    'middleware' => 'apiHandler',
    'namespace' => 'App\Http\Controllers',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});

Route::group(['middleware' => 'jwt.auth'], function () {
    Route::get('/postman', [\App\Http\Controllers\TestController::class, 'index']);
    Route::get('/posts', Api\IndexController::class);
    Route::get("/posts/create", Api\CreateController::class);
    Route::post("/posts", Api\StoreController::class);
    Route::get('/posts/{post}', Api\ShowController::class);
    Route::get('/posts/{post}/edit', Api\EditController::class);
    Route::patch('/posts/{post}', Api\UpdateController::class);
    Route::delete('/posts/{post}', Api\DestroyController::class);
});

