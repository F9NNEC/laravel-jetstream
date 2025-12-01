<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Auth;
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
        if (Auth::user()->role === 'admin') {
            return view('admin.dashboard');
        } else {
            return view('user.dashboard');
        }
    })->name('dashboard');

    Route::get('/books', [BookController::class, 'index'])->name('books.collections');
});
