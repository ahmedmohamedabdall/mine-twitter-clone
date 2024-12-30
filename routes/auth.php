<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware'=>'guest'],function(){
Route::get('/register', [AuthController::class, 'register'])->name('register');

Route::post('/user/store', [AuthController::class, 'store'])->name('user.store');

Route::get('/login', [AuthController::class, 'login'])->name('login');

Route::post('/user/authenticate', [AuthController::class, 'authenticate'])->name('user.authenticate');


});
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');