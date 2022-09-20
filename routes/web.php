<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SwipeController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Http\Controllers\UserController;
 
Route::get('/users', [UserController::class, 'index']);
Route::get('/users/create/{name}', [UserController::class, 'createuser']);
Route::get('/', function () {
    return view('welcome');
});
Route::get('/swipeleft/userA={id}&userB={id2}',[SwipeController::class,'swipeleft']);
Route::get('/swiperight/userA={id}&userB={id2}',[SwipeController::class,'swiperight']);