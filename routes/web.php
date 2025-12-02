<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        //
    })->name('dashboard');

    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    
    Route::get('/books', [BookController::class, 'index'])->name('books.collections');
});
