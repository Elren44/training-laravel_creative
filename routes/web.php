<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AuthController;
use \App\Http\Controllers\PostController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get("/login", [AuthController::class, 'login']);

Route::get("/posts", [PostController::class, "index"]);
Route::get("/posts/create", [PostController::class, "create"]);
Route::get("/posts/update", [PostController::class, "update"]);
Route::get("/posts/delete", [PostController::class, "delete"]);
Route::get("/posts/first_or_create", [PostController::class, "firstOrCreate"]);
Route::get("/posts/update_or_create", [PostController::class, "updateOrCreate"]);
