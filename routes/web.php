<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\BoardController;

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

Route::get('user/login',[TaskController::class,'login']);
Route::get('user/signUp',[TaskController::class,'signUp']);
Route::post('user/signUp-user',[TaskController::class,'signUpUser'])->name('signUp-user');
Route::post('user/login-user',[TaskController::class,'loginUser'])->name('login-user');
