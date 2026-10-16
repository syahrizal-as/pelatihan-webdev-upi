<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\TransactionController;

Route::resource('users', UserController::class);
Route::resource('books', BookController::class);
Route::resource('transactions', TransactionController::class);
Route::get('/', function () {
    return view('welcome');
});

Route::get('/tes', function () {
    return view('tes');
});

